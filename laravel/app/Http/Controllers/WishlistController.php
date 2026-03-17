<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WishlistItem;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{

    public function add(Request $request)
    {
        WishlistItem::firstOrCreate([
            'user_id' => Auth::id(),
            'product_id' => $request->product_id
        ]);

        return back()->with('success','Added to wishlist');
    }

    public function remove(Request $request)
    {
        WishlistItem::where('user_id',Auth::id())
            ->where('product_id',$request->product_id)
            ->delete();

        return back();
    }

    public function index()
    {
        $items = WishlistItem::with('product.variants')
            ->where('user_id',Auth::id())
            ->get();

        return view('wishlist',compact('items'));
    }

}