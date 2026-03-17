<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;

class ProductsController extends Controller
{
    public function store(Request $request, $id = null)
    {

        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_description' => 'required|string',
            'product_price' => 'required|numeric',
            'category_id' => 'required|exists:Categories,category_id',
            'product_stock_level' => 'required|int',
            'product_image' => 'nullable|image|max:2048', // Optional image upload
        ]);

        if($id) {
            $product = Products::findOrFail($id);
        } else {
            $product = new Products();
        }

        $product->product_name = $request->product_name;
        $product->product_description = $request->product_description;
        $product->product_price = $request->product_price;
        $product->category_id = $request->category_id;
        $product->product_stock_level = $request->product_stock_level;

        if ($request->hasFile('product_image')) {
            
            $imageName = time() . '.' . $request->product_image->extension();

            $request->product_image->move(public_path('products'), $imageName);

            $product->product_image = 'products/' . $imageName; // Store image path
        }

        $product->save();

        return redirect()->route('admin.products')->with('success', $id ? 'Product updated successfully.' : 'Product created successfully.');



        $imageName = time() . '.' . $request->product_image->extension();

        $request->product_image->move(public_path('products'), $imageName);

        
        Products::create([
            'product_name' => $request->product_name,
            'product_description' => $request->product_description,
            'product_price' => $request->product_price,
            'category_id' => $request->category_id,
            'product_image' => 'products/' . $imageName, // Store image path
        ]);

        return redirect()->route('admin.products')->with('success', 'Product created successfully.');
    }

    /** 
     * Display a listing of products with optional filtering and sorting.
    */
    public function index(Request $request)
    {
        $query = Products::query();

        // Search by product name or description
        if ($request->filled('search')) {
            $search = $request->input('search');

            $query->where(function($q) use ($search) {
                $q->where('product_name', 'like', "%{$search}%")
                  ->orWhere('product_description', 'like', "%{$search}%");
            });
        }

        // Filter by category
        if ($request->filled('category')) {
            $query->where('category_id', $request->input('category'));
        }

        // Filter by maximum price
        if ($request->filled('max_price')) {
            $query->where('product_price', '<=', $request->input('max_price'));
        }

        // Sorting
        if ($request->has('sort')) {

            if ($request->sort == 'price_low') {
                $query->orderBy('product_price', 'asc');

            } elseif ($request->sort == 'price_high') {
                $query->orderBy('product_price', 'desc');

            } else {
                $query->orderBy('created_at', 'desc');
            }
        }

        $products = $query->paginate(12);

        $categories = Categories::all();

        return view('shop', compact('products', 'categories'));
    }

    /** 
     * Display a specific product with reviews
    */
   public function show(Request $request, $product_id)
{
    $product = Products::with('reviews','variants')
        ->where('product_id', $product_id)
        ->firstOrFail();

    $fromAdmin = $request->has('admin') || ($request->header('referer') && str_contains($request->header('referer'), '/admin/products'));

    return view('products.show', compact('product', 'fromAdmin'));
}

}