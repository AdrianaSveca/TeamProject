<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Basket;
use App\Models\Orders;

class OrdersController extends Controller
{
    public function checkout()
    {
        $user = auth()->user();

        $basket = Basket::with('items.product')->where('user_id', $user->id)->first();

        if (!$basket || $basket->items->isEmpty()) {
            return redirect()->route('basket.index')->with('error', 'Your basket is empty.');
        }

        $hasStockIssues = $basket->items->contains(fn($item) => $item->basket_item_quantity > $item->product->product_stock_level);

        if ($hasStockIssues) {
            return redirect()->route('basket.index')->with('error', 'Some items exceed available stock. Please adjust quantities.');
        }

        return view('orders.checkout', compact('basket'));
    }

    public function placeOrder(Request $request)
    {
        $user = auth()->user();

        $basket = Basket::with('items.product')->where('user_id', $user->id)->first();

        if (!$basket || $basket->items->isEmpty()) {
            return redirect()->route('basket.index')->with('error', 'Your basket is empty.');
        }

        $order = DB::transaction(function () use ($basket, $user) {

            foreach ($basket->items as $item) {
                if ($item->basket_item_quantity > $item->product->product_stock_level) {
                    throw new \Exception("Not enough stock for {$item->product->product_name}");
                }
            }

            $order = Orders::create([
                'user_id' => $user->id,
                'order_total' => $basket->items->sum(fn($i) => $i->basket_item_quantity * $i->basket_item_price),
                'order_status' => 'Pending',
                'order_address' => $user->address ?? 'No address provided',
                'days_until_delivery' => null,
                'order_date' => now(),
            ]);

            foreach ($basket->items as $item) {
                $order->items()->create([
                    'product_id' => $item->product_id,
                    'order_item_quantity' => $item->basket_item_quantity,
                    'order_item_price' => $item->basket_item_price,
                    'order_item_status' => 'Purchased',
                ]);

                $item->product->decrement('product_stock_level', $item->basket_item_quantity);
            }

            $basket->items()->delete();
            $basket->delete();

            return $order;
        });

        return redirect()->route('orders.confirmation', $order->order_id);
    }

    public function confirmation($orderId)
    {
        $order = Orders::with('items.product')->where('order_id', $orderId)->firstOrFail();

        if ($order->user_id !== auth()->id()) {
            abort(403);
        }

        return view('orders.confirmation', compact('order'));
    }
}
