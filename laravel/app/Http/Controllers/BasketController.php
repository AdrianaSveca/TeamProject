<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Basket;
use App\Models\Basket_Items;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BasketController extends Controller
{
    public function index()
    {
        $basket = Basket::with('items.product')
                        ->where('user_id', Auth::id())
                        ->first();

        return view('basket', compact('basket'));
    }

    public function add(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to add items to your basket.');
        }

        $request->validate([
            'product_id' => 'required|exists:Products,product_id',
            'quantity' => 'required|integer|min:1'
        ]);

        $userId = Auth::id();
        $product = Products::findOrFail($request->product_id);

        $basket = Basket::firstOrCreate(
            ['user_id' => $userId],
            ['basket_date' => now()]
        );

        $basketItem = $basket->items()
            ->where('product_id', $product->product_id)
            ->first();

        if ($basketItem) {
            $newQty = min(
                $basketItem->basket_item_quantity + $request->quantity,
                $product->product_stock_level
            );

            DB::table('Basket_Items')
                ->where('basket_id', $basket->basket_id)
                ->where('product_id', $product->product_id)
                ->update([
                    'basket_item_quantity' => $newQty,
                    'basket_item_price' => $product->product_price,
                    'updated_at' => now(),
                ]);

        } else {
            $basket->items()->create([
                'product_id' => $product->product_id,
                'basket_item_quantity' => min($request->quantity, $product->product_stock_level),
                'basket_item_price' => $product->product_price,
            ]);
        }

        return redirect()->back()->with('success', 'Product added to basket!');
    }


        public function updateQuantity(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:Products,product_id',
            'action' => 'required|in:increase,decrease',
        ]);

        $userId = Auth::id();
        $basket = Basket::where('user_id', $userId)->first();

        if ($basket) {
            $item = $basket->items()->where('product_id', $request->product_id)->first();
            $product = Products::find($request->product_id);

            if ($item && $product) {
                $newQuantity = $item->basket_item_quantity;

                if ($request->action === 'increase') {
                    if ($newQuantity < $product->product_stock_level) {
                        $newQuantity++;
                    } else {
                        return back()->with('error', 'Sorry, no more stock available.');
                    }
                } elseif ($request->action === 'decrease') {
                    if ($newQuantity > 1) {
                        $newQuantity--;
                    }
                }

                DB::table('Basket_Items')
                    ->where('basket_id', $basket->basket_id)
                    ->where('product_id', $request->product_id)
                    ->update([
                        'basket_item_quantity' => $newQuantity,
                        'updated_at' => now(),
                    ]);
            }
        }

        return back();
    }

    public function removeItem(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:Products,product_id',
        ]);

        $userId = Auth::id();
        $basket = Basket::where('user_id', $userId)->first();

        if ($basket) {
            DB::table('Basket_Items')
                ->where('basket_id', $basket->basket_id)
                ->where('product_id', $request->product_id)
                ->delete();
        }

        return back()->with('success', 'Item removed from basket.');
    }
}