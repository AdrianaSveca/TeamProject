<?php


namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        $products = auth()->user()->wishlistProducts()->get();

        return view('wishlist.index', compact('products'));
    }

    // route: POST /wishlist/{product}
    public function store(Products $product)
    {
        auth()->user()->wishlistProducts()->syncWithoutDetaching([$product->product_id]);

        return back();
    }

    // route: delete /wishlist/{product}
    public function destroy(Products $product)
    {
        auth()->user()->wishlistProducts()->detach($product->product_id);

        return back();
    }
}