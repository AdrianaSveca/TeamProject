<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        // 1. Start the query
        $query = Products::query();

        // 2. Search Logic (Matches name or description)
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

        // 4. Price Filter
        if ($request->filled('max_price')) {
            $query->where('product_price', '<=', $request->input('max_price'));
        }

        // 5. Sorting
        if ($request->has('sort')) {
            if ($request->sort == 'price_low') {
                $query->orderBy('product_price', 'asc');
            } elseif ($request->sort == 'price_high') {
                $query->orderBy('product_price', 'desc');
            } else {
                $query->orderBy('created_at', 'desc'); // Default: Newest first
            }
        }

        // 6. Get Data (12 products per page)
        $products = $query->paginate(12);
        
        // Get categories for the sidebar
        $categories = Categories::all();

        return view('shop', compact('products', 'categories'));
    }

    public function show($id){
        $product = Products::findorFail($id);

        return view('products.show', compact('product'));
    }
}