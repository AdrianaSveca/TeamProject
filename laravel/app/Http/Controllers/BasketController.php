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

        return view('basket', compact('basket')); // Return basket view
    }

    /**
     * Add a product to the user's basket.
     */
    public function add(Request $request)
    {
        if (!Auth::check()) { // Ensure user is authenticated
            return redirect()->route('login')->with('error', 'Please login to add items to your basket.'); // If not, login
        }

        $request->validate([ // Validate input
            'product_id' => 'required|exists:Products,product_id',
            'quantity' => 'required|integer|min:1'
        ]);

        $userId = Auth::id();
        $product = Products::findOrFail($request->product_id); // Get product details

        $basket = Basket::firstOrCreate( // If user has no basket, create one...
            ['user_id' => $userId],
            ['basket_date' => now()]
        );

        $basketItem = $basket->items() // Here it checks if item already in basket
            ->where('product_id', $product->product_id)
            ->first();

        if ($basketItem) { // If item exists, update quantity
            $newQty = min(
                $basketItem->basket_item_quantity + $request->quantity,
                $product->product_stock_level
            );

            DB::table('Basket_Items') // Update existing item quantity
                ->where('basket_id', $basket->basket_id)
                ->where('product_id', $product->product_id)
                ->update([
                    'basket_item_quantity' => $newQty,
                    'basket_item_price' => $product->product_price,
                    'updated_at' => now(),
                ]);

        } else { // If item not in basket, create new entry
            $basket->items()->create([
                'product_id' => $product->product_id,
                'basket_item_quantity' => min($request->quantity, $product->product_stock_level),
                'basket_item_price' => $product->product_price,
            ]);
        }

        return redirect()->back()->with('success', 'Product added to basket!'); // Redirect back with success message
    }

    /**
     * Update the quantity of a specific item in the basket.
     */
    public function updateQuantity(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:Products,product_id',
            'action' => 'required|in:increase,decrease', // Action must be either increase or decrease
        ]);

        $userId = Auth::id(); // User ID
        $basket = Basket::where('user_id', $userId)->first(); // Basket related to user (user ID)

        if ($basket) { // If user already has a basket, then proceed with updating quantity of item.
            $item = $basket->items()->where('product_id', $request->product_id)->first();
            $product = Products::find($request->product_id);

            if ($item && $product) { // If item exists in basket, update quantity
                $newQuantity = $item->basket_item_quantity;

                if ($request->action === 'increase') { // Increase quantity
                    if ($newQuantity < $product->product_stock_level) {
                        $newQuantity++;
                    } else {
                        return back()->with('error', 'Sorry, no more stock available.');
                    }
                } elseif ($request->action === 'decrease') { // Decrease quantity
                    if ($newQuantity > 1) {
                        $newQuantity--;
                    }
                }

                DB::table('Basket_Items') // Update the quantity in the database
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

    /**
     * Remove an item from the basket.
     */
    public function removeItem(Request $request)
    {
        $request->validate([ // Here we validate the product ID
            'product_id' => 'required|exists:Products,product_id',
        ]);

        $userId = Auth::id();
        $basket = Basket::where('user_id', $userId)->first();

        if ($basket) { // If basket exists, delete the item
            DB::table('Basket_Items')
                ->where('basket_id', $basket->basket_id)
                ->where('product_id', $request->product_id)
                ->delete();
        }

        return back()->with('success', 'Item removed from basket.');
    }
}