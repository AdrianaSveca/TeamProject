<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;

class ProductsController extends Controller
{
        public function index(Request $request)
    {
        $query = Products::query();

        // 2. Search Filter
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('product_name', 'like', "%{$search}%")
                  ->orWhere('product_description', 'like', "%{$search}%");
            });
        }

        // 3. Category Filter
        if ($request->filled('category')) {
            $query->where('category_id', $request->input('category'));
        }

        // 4. Get the results
        $products = $query->get();

        // 5. Get categories for the dropdown
        $categories = Categories::all();

        return view('shop', compact('products', 'categories'));
    }

    /**
     * Display a specific product.
     */
    public function show($id)
    {
        // Find product by ID
        $product = Products::where('product_id', $id)->firstOrFail();

        // Determine stock status
        $stockLevel = $product->product_stock_level > 0 ? 'In Stock' : 'Out of Stock';

        return view('products.show', compact('product', 'stockLevel'));
    }
}
