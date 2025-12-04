<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Basket;
use App\Models\Orders;
use App\Models\Order_Items;
use Carbon\Carbon;

class OrdersController extends Controller
{
    public function placeOrder(Request $request){
        $user = auth()->user();

        $basket = Basket::with('items.product')->where('user_id', $user->id)->first();

        if (!$basket || $basket->items->isEmpty()) {
            return redirect()->route('basket.index')->with('error', 'Your basket is empty.');
        }

        $order = DB::transaction(function () use ($basket, $user) {

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
            }

            $basket->items()->delete();
            $basket->delete();

            return $order;
        });

        return redirect()->route('orders.confirmation', $order->order_id);
    }


    public function confirmation($orderId){
        $order = Orders::with('items.product')->where('order_id', $orderId)->firstOrFail();

        if ($order->user_id !== auth()->id()) {
            abort(403);
        }

        return view('orders.confirmation', compact('order'));
    }
}
