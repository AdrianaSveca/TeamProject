<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;

class ProductsController extends Controller
{

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
    public function show($product_id)
    {
        $product = Products::with('reviews','variants')
            ->where('product_id', $product_id)
            ->firstOrFail();

        return view('products.show', compact('product'));
    }

}