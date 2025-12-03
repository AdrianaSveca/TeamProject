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

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('product_name', 'like', "%{$search}%")
                  ->orWhere('product_description', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category')) {
            $query->where('category_id', $request->input('category'));
        }

        if ($request->filled('max_price')) {
            $query->where('product_price', '<=', $request->input('max_price'));
        }

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

    public function show($id){
        $product = Products::findorFail($id);

        return view('products.show', compact('product'));
    }
}