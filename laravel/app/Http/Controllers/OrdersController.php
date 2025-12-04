<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Basket;
use App\Models\Orders;

class OrdersController extends Controller
{
    /**
     * In this function we show the checkout page.
     */
    public function checkout()
    {

        $user = Auth::user();

        // Retrieve the user's basket with items and associated products
        $basket = Basket::with('items.product')->where('user_id', $user->id)->first();

        if (!$basket || $basket->items->isEmpty()) { // If basket is empty, redirect back
            return redirect()->route('basket.index')->with('error', 'Your basket is empty.');
        }

        // Check for stock issues
        $hasStockIssues = $basket->items->contains(fn($item) => $item->basket_item_quantity > $item->product->product_stock_level);

        if ($hasStockIssues) {
            return redirect()->route('basket.index')->with('error', 'Some items exceed available stock. Please adjust quantities.');
        }

        return view('orders.checkout', compact('basket'));
    }

    /**
     * This function places the order based on the user's basket.
     */
    public function placeOrder(Request $request)
    {
        $user = Auth::user();

        $basket = Basket::with('items.product')->where('user_id', $user->id)->first();

        if (!$basket || $basket->items->isEmpty()) {
            return redirect()->route('basket.index')->with('error', 'Your basket is empty.');
        }

        $order = DB::transaction(function () use ($basket, $user) { // Start transaction

            foreach ($basket->items as $item) {
                if ($item->basket_item_quantity > $item->product->product_stock_level) {
                    throw new \Exception("Not enough stock for {$item->product->product_name}");
                }
            }

            $order = Orders::create([ // Create new order
                'user_id' => $user->id,
                'order_total' => $basket->items->sum(fn($i) => $i->basket_item_quantity * $i->basket_item_price),
                'order_status' => 'Pending',
                'order_address' => $user->address ?? 'No address provided',
                'days_until_delivery' => null,
                'order_date' => now(),
            ]);

            foreach ($basket->items as $item) { // Create order items and update stock
                $order->items()->create([
                    'product_id' => $item->product_id,
                    'order_item_quantity' => $item->basket_item_quantity,
                    'order_item_price' => $item->basket_item_price,
                    'order_item_status' => 'Purchased',
                ]);

                $item->product->decrement('product_stock_level', $item->basket_item_quantity); // Decrement stock level of the product
            }

            $basket->items()->delete();
            $basket->delete();

            return $order;
        });

        return redirect()->route('orders.confirmation', $order->order_id);
    }

    /**
     * Show order confirmation page.
     */
    public function confirmation($orderId)
    {
        $order = Orders::with('items.product')->where('order_id', $orderId)->firstOrFail();

        if ($order->user_id !== Auth::id()) { // Ensure the order belongs to the logged-in user
            abort(403);
        }

        return view('orders.confirmation', compact('order'));
    }
}
