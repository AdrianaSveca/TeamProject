<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Basket;
use App\Models\Basket_Items;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * The controller for managing the shopping basket.
 */
class BasketController extends Controller
{

    /**
     * Display the user's basket.
     */
    public function index()
    {
        $basket = Basket::with('items.product')
                        ->where('user_id', Auth::id())
                        ->first();

        return view('basket', compact('basket'));
    }


    /**
     * Add a product to the user's basket.
     */
    public function add(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to add items to your basket.');
        }

        $request->validate([
            'product_id' => 'required|exists:Products,product_id',
            'variant_id' => 'required|exists:product_variants,id',
            'quantity' => 'required|integer|min:1',
            'flavour' => 'nullable|string'
        ]);

        $userId = Auth::id();

        $product = Products::findOrFail($request->product_id);

        $variant = DB::table('product_variants')
                        ->where('id', $request->variant_id)
                        ->first();

        $basket = Basket::firstOrCreate(
            ['user_id' => $userId],
            ['basket_date' => now()]
        );

        // Look for existing item with SAME product + size + flavour
        $itemQuery = $basket->items()
            ->where('product_id', $product->product_id)
            ->where('variant_id', $request->variant_id);

        if ($request->filled('flavour')) {
            $itemQuery->where('flavour', $request->flavour);
        } else {
            $itemQuery->whereNull('flavour');
        }

        $basketItem = $itemQuery->first();


        if ($basketItem) {

            $newQty = min(
                $basketItem->basket_item_quantity + $request->quantity,
                $product->product_stock_level
            );

            $updateQuery = DB::table('Basket_Items')
                ->where('basket_id', $basket->basket_id)
                ->where('product_id', $product->product_id)
                ->where('variant_id', $request->variant_id);

            if ($request->filled('flavour')) {
                $updateQuery->where('flavour', $request->flavour);
            } else {
                $updateQuery->whereNull('flavour');
            }

            $updateQuery->update([
                'basket_item_quantity' => $newQty,
                'basket_item_price' => $variant->price,
                'updated_at' => now(),
            ]);

        } else {

            $basket->items()->create([
                'product_id' => $product->product_id,
                'variant_id' => $request->variant_id,
                'basket_item_quantity' => min($request->quantity, $product->product_stock_level),
                'basket_item_price' => $variant->price,
                'flavour' => $request->flavour
            ]);

        }

        return redirect()->back()->with('success', 'Product added to basket!');
    }



    /**
     * Update basket quantity
     */
    public function updateQuantity(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:Products,product_id',
            'variant_id' => 'required|exists:product_variants,id',
            'flavour' => 'nullable|string',
            'action' => 'required|in:increase,decrease',
        ]);

        $basket = Basket::where('user_id', Auth::id())->first();

        if ($basket) {

            $itemQuery = $basket->items()
                ->where('product_id', $request->product_id)
                ->where('variant_id', $request->variant_id);

            if ($request->filled('flavour')) {
                $itemQuery->where('flavour', $request->flavour);
            } else {
                $itemQuery->whereNull('flavour');
            }

            $item = $itemQuery->first();

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

                $updateQuery = DB::table('Basket_Items')
                    ->where('basket_id', $basket->basket_id)
                    ->where('product_id', $request->product_id)
                    ->where('variant_id', $request->variant_id);

                if ($request->filled('flavour')) {
                    $updateQuery->where('flavour', $request->flavour);
                } else {
                    $updateQuery->whereNull('flavour');
                }

                $updateQuery->update([
                    'basket_item_quantity' => $newQuantity,
                    'updated_at' => now(),
                ]);
            }
        }

        return back();
    }



    /**
     * Remove an item from the basket
     */
    public function removeItem(Request $request)
{
    DB::table('Basket_Items')
        ->where('basket_item_id', $request->basket_item_id)
        ->delete();

    return back()->with('success', 'Item removed from basket.');
}

}