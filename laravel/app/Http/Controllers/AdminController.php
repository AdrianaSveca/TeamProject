<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\DiscountCode;
use App\Models\Orders;
use App\Models\Products;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * In this function we display the admin dashboard with overview statistics, recent orders, and quick links to manage the site.
     */
    public function index(): View
    {
        // Calculate overview statistics
        $totalOrders = Orders::count();
        $totalRevenue = Orders::sum('order_total');
        $totalUsers = User::where('role', '!=', 'admin')->orWhereNull('role')->count();
        $totalProducts = Products::count();
        $pendingOrders = Orders::where('order_status', 'Pending')->count();
        $activeDiscountCodes = DiscountCode::where('active', true)->count();

        // Calculate KPIs
        $averageOrderValue = $totalOrders > 0 ? $totalRevenue / $totalOrders : 0;
        $ordersThisMonth = Orders::whereMonth('order_date', now()->month)
            ->whereYear('order_date', now()->year)
            ->count();
        $revenueThisMonth = Orders::whereMonth('order_date', now()->month)
            ->whereYear('order_date', now()->year)
            ->sum('order_total');
        $lowStockProducts = Products::where('product_stock_level', '<', 10)->count();
        $shippedOrders = Orders::where('order_status', 'Shipped')->count();
        $deliveredOrders = Orders::where('order_status', 'Delivered')->count();
        $newUsersThisMonth = User::where('role', '!=', 'admin')
            ->orWhereNull('role')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();

        // Get recent orders (last 5 orders with user info and items)
        $recentOrders = Orders::with(['user', 'items.product'])
            ->latest('order_date')
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalOrders',
            'totalRevenue',
            'totalUsers',
            'totalProducts',
            'pendingOrders',
            'activeDiscountCodes',
            'recentOrders',
            'averageOrderValue',
            'ordersThisMonth',
            'revenueThisMonth',
            'lowStockProducts',
            'shippedOrders',
            'deliveredOrders',
            'newUsersThisMonth'
        ));
    }

    /**
     * In this function we display the discount codes management page. We list all existing codes and show a form to create a new one.
     */
    public function discountCodes(): View
    {
        $codes = DiscountCode::orderBy('created_at', 'desc')->get();
        return view('admin.discount-codes', compact('codes'));
    }

    /**
     * In this function we store a new discount code. The code is validated and saved to the database (code, type, value, optional min order, validity dates, usage limit, and active flag).
     */
    public function storeDiscountCode(Request $request): RedirectResponse
    {
        $request->validate([
            'code'       => 'required|string|max:64|unique:discount_codes,code',
            'type'       => 'required|in:percent,fixed',
            'value'      => 'required|numeric|min:0',
            'min_order'  => 'nullable|numeric|min:0',
            'valid_from' => 'nullable|date',
            'valid_until'=> 'nullable|date|after_or_equal:valid_from',
            'usage_limit'=> 'nullable|integer|min:1',
            'active'     => 'boolean',
        ]);

        $value = $request->type === 'percent' ? min((float) $request->value, 100) : (float) $request->value;

        DiscountCode::create([
            'code'       => strtoupper($request->code),
            'type'       => $request->type,
            'value'      => $value,
            'min_order'  => $request->filled('min_order') ? $request->min_order : null,
            'valid_from' => $request->filled('valid_from') ? $request->valid_from : null,
            'valid_until'=> $request->filled('valid_until') ? $request->valid_until : null,
            'usage_limit'=> $request->filled('usage_limit') ? $request->usage_limit : null,
            'active'     => $request->boolean('active', true),
        ]);

        return redirect()->route('admin.discount-codes')->with('status', 'Discount code created.');
    }

    /**
     * In this function we delete a discount code by ID and redirect back to the discount codes list.
     */
    public function destroyDiscountCode(int $id): RedirectResponse
    {
        $code = DiscountCode::findOrFail($id);
        $code->delete();
        return redirect()->route('admin.discount-codes')->with('status', 'Discount code removed.');
    }

    /**
     * In this function we display all products for admin management. We list all products with their details (name, price, stock, category).
     */
    public function products(): View
    {
        $products = Products::with('category')->orderBy('product_id', 'desc')->get();
        return view('admin.products', compact('products'));
    }

    /**
     * In this function we display all orders for admin management. We can filter by status if provided in the request.
     */
    public function orders(Request $request): View
    {
        $query = Orders::with(['user', 'items.product'])->latest('order_date');
        
        if ($request->has('status') && $request->status) {
            $query->where('order_status', $request->status);
        }
        
        $orders = $query->paginate(15);
        return view('admin.orders', compact('orders'));
    }

    /**
     * In this function we display the details of a specific order for admin review (order items, customer info, status, total).
     */
    public function orderDetails(int $id): View
    {
        $order = Orders::with(['user', 'items.product'])->findOrFail($id);
        return view('admin.order-details', compact('order'));
    }

    /**
     * In this function we display all users for admin management. We list all users with their details (name, email, role, registration date).
     */
    public function users(): View
    {
        $users = User::orderBy('id', 'desc')->get();
        return view('admin.users', compact('users'));
    }

    /**
     * In this function we display the form to create a new product.
     */
    public function createProduct(): View
    {
        $categories = \App\Models\Categories::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * In this function we store a new product. The product data is validated and saved to the database.
     */
    public function storeProduct(Request $request): RedirectResponse
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_description' => 'required|string',
            'product_price' => 'required|numeric|min:0',
            'product_stock_level' => 'required|integer|min:0',
            'category_id' => 'required|exists:Categories,category_id',
            'product_image' => 'nullable|string|max:255',
        ]);

        Products::create([
            'product_name' => $request->product_name,
            'product_description' => $request->product_description,
            'product_price' => $request->product_price,
            'product_stock_level' => $request->product_stock_level,
            'category_id' => $request->category_id,
            'product_image' => $request->product_image ?? null,
        ]);

        return redirect()->route('admin.products')->with('status', 'Product created successfully.');
    }

    /**
     * In this function we display the form to edit an existing product.
     */
    public function editProduct(int $id): View
    {
        $product = Products::findOrFail($id);
        $categories = \App\Models\Categories::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * In this function we update an existing product. The product data is validated and updated in the database.
     */
    public function updateProduct(Request $request, int $id): RedirectResponse
    {
        $product = Products::findOrFail($id);

        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_description' => 'required|string',
            'product_price' => 'required|numeric|min:0',
            'product_stock_level' => 'required|integer|min:0',
            'category_id' => 'required|exists:Categories,category_id',
            'product_image' => 'nullable|string|max:255',
        ]);

        $product->update([
            'product_name' => $request->product_name,
            'product_description' => $request->product_description,
            'product_price' => $request->product_price,
            'product_stock_level' => $request->product_stock_level,
            'category_id' => $request->category_id,
            'product_image' => $request->product_image ?? $product->product_image,
        ]);

        return redirect()->route('admin.products')->with('status', 'Product updated successfully.');
    }

    /**
     * In this function we delete a product by ID and redirect back to the products list.
     */
    public function destroyProduct(int $id): RedirectResponse
    {
        $product = Products::findOrFail($id);
        $product->delete();
        return redirect()->route('admin.products')->with('status', 'Product deleted successfully.');
    }

    /**
     * In this function we update the status of an order (Pending, Shipped, Delivered).
     */
    public function updateOrderStatus(Request $request, int $id): RedirectResponse
    {
        $request->validate([
            'order_status' => 'required|in:Pending,Shipped,Delivered',
        ]);

        $order = Orders::findOrFail($id);
        $order->update(['order_status' => $request->order_status]);

        return redirect()->route('admin.order-details', $id)->with('status', 'Order status updated successfully.');
    }

    /**
     * In this function we display the form to create a new user.
     */
    public function createUser(): View
    {
        return view('admin.users.create');
    }

    /**
     * In this function we store a new user. The user data is validated and saved to the database.
     */
    public function storeUser(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'nullable|in:admin,customer',
            'dob' => 'nullable|date',
            'gender' => 'nullable|string',
            'phone' => 'nullable|string|max:20',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Hash::make($request->password),
            'role' => $request->role ?? 'customer',
            'dob' => $request->dob ?? null,
            'gender' => $request->gender ?? null,
            'phone' => $request->phone ?? null,
        ]);

        return redirect()->route('admin.users')->with('status', 'User created successfully.');
    }

    /**
     * In this function we display the form to edit an existing user.
     */
    public function editUser(int $id): View
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * In this function we update an existing user. The user data is validated and updated in the database.
     */
    public function updateUser(Request $request, int $id): RedirectResponse
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'nullable|in:admin,customer',
            'dob' => 'nullable|date',
            'gender' => 'nullable|string',
            'phone' => 'nullable|string|max:20',
        ]);

        $updateData = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role ?? $user->role,
            'dob' => $request->dob ?? $user->dob,
            'gender' => $request->gender ?? $user->gender,
            'phone' => $request->phone ?? $user->phone,
        ];

        if ($request->filled('password')) {
            $updateData['password'] = \Hash::make($request->password);
        }

        $user->update($updateData);

        return redirect()->route('admin.users')->with('status', 'User updated successfully.');
    }

    /**
     * In this function we delete a user by ID and redirect back to the users list.
     */
    public function destroyUser(int $id): RedirectResponse
    {
        $user = User::findOrFail($id);
        // Prevent deleting yourself
        if ($user->id === Auth::id()) {
            return redirect()->route('admin.users')->with('error', 'You cannot delete your own account.');
        }
        $user->delete();
        return redirect()->route('admin.users')->with('status', 'User deleted successfully.');
    }
}