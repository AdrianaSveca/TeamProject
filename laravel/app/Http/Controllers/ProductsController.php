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

        if ($request->filled('search')) { // Search by product name or description
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('product_name', 'like', "%{$search}%")
                  ->orWhere('product_description', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category')) { // Filter by category
            $query->where('category_id', $request->input('category'));
        }

        if ($request->filled('max_price')) { // Filter by maximum price
            $query->where('product_price', '<=', $request->input('max_price'));
        }

        if ($request->has('sort')) { // Sort products
            if ($request->sort == 'price_low') {
                $query->orderBy('product_price', 'asc');
            } elseif ($request->sort == 'price_high') {
                $query->orderBy('product_price', 'desc');
            } else {
                $query->orderBy('created_at', 'desc');
            }
        }

        $products = $query->paginate(12); // Page size set to 12
        
        $categories = Categories::all();

        return view('shop', compact('products', 'categories'));
    }

    /** 
     * Display the details of a specific product.
    */
    public function show(Request $request, $id){
        $product = Products::findorFail($id); // Find product or fail
        $fromAdmin = $request->has('admin') || $request->header('referer') && str_contains($request->header('referer'), '/admin/products');

        return view('products.show', compact('product', 'fromAdmin'));
    }
}