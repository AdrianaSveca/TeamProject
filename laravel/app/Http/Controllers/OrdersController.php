<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Basket;
use App\Models\Orders;
use App\Models\DiscountCode;

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

        // Calculate subtotal and check for any applied discount code in session
        $subtotal = $basket->items->sum(fn($i) => $i->basket_item_quantity * $i->basket_item_price);
        $discountAmount = 0;
        $appliedDiscount = null;
        if (Session::has('discount_code_id')) {
            $code = DiscountCode::find(Session::get('discount_code_id'));
            if ($code && $code->isValidFor((float) $subtotal)) {
                $appliedDiscount = $code;
                $discountAmount = $code->discountAmount((float) $subtotal);
            } else {
                Session::forget(['discount_code_id', 'discount_amount']);
            }
        }
        if ($appliedDiscount && !Session::has('discount_amount')) {
            Session::put('discount_amount', $discountAmount);
        } elseif (Session::has('discount_amount') && $appliedDiscount) {
            $discountAmount = (float) Session::get('discount_amount');
        }

        return view('orders.checkout', compact('basket', 'subtotal', 'discountAmount', 'appliedDiscount'));
    }

    /**
     * In this function we apply a discount code at checkout. The code is validated and stored in session so the checkout view can show the reduced total.
     */
    public function applyDiscount(Request $request)
    {
        $user = Auth::user();
        $basket = Basket::with('items.product')->where('user_id', $user->id)->first();
        if (!$basket || $basket->items->isEmpty()) {
            return redirect()->route('checkout')->with('discount_error', 'Your basket is empty.');
        }

        $request->validate(['discount_code' => 'required|string|max:64']);
        $code = DiscountCode::where('code', strtoupper(trim($request->discount_code)))->first();
        $subtotal = $basket->items->sum(fn($i) => $i->basket_item_quantity * $i->basket_item_price);

        if (!$code) {
            return redirect()->route('checkout')->with('discount_error', 'That discount code was not found.');
        }
        if (!$code->isValidFor((float) $subtotal)) {
            return redirect()->route('checkout')->with('discount_error', 'That code is not valid for this order (check minimum order or expiry).');
        }

        $discountAmount = $code->discountAmount((float) $subtotal);
        Session::put('discount_code_id', $code->id);
        Session::put('discount_amount', $discountAmount);
        return redirect()->route('checkout')->with('status', 'Discount applied.');
    }

    /**
     * In this function we remove the applied discount from session and redirect the user back to the checkout page.
     */
    public function removeDiscount()
    {
        Session::forget(['discount_code_id', 'discount_amount']);
        return redirect()->route('checkout');
    }

    /**
     * This function places the order based on the user's basket. If a discount code was applied in session, we validate it again, reduce the order total, and record the discount on the order.
     */
    public function placeOrder(Request $request)
    {
        $user = Auth::user();

        $basket = Basket::with('items.product')->where('user_id', $user->id)->first();

        if (!$basket || $basket->items->isEmpty()) {
            return redirect()->route('basket.index')->with('error', 'Your basket is empty.');
        }

        // Re-validate applied discount and compute final order total
        $subtotal = $basket->items->sum(fn($i) => $i->basket_item_quantity * $i->basket_item_price);
        $discountAmount = 0;
        $discountCode = null;
        if (Session::has('discount_code_id')) {
            $discountCode = DiscountCode::find(Session::get('discount_code_id'));
            if ($discountCode && $discountCode->isValidFor((float) $subtotal)) {
                $discountAmount = (float) Session::get('discount_amount', $discountCode->discountAmount((float) $subtotal));
            }
        }
        $orderTotal = max(0, $subtotal - $discountAmount);

        $order = DB::transaction(function () use ($basket, $user, $orderTotal, $discountAmount, $discountCode) { // Start transaction

            foreach ($basket->items as $item) {
                if ($item->basket_item_quantity > $item->product->product_stock_level) {
                    throw new \Exception("Not enough stock for {$item->product->product_name}");
                }
            }

            if ($discountCode) {
                $discountCode->increment('times_used'); // Increment usage count for the discount code
            }

            $order = Orders::create([ // Create new order
                'user_id' => $user->id,
                'order_total' => $orderTotal,
                'order_discount' => $discountAmount,
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

        Session::forget(['discount_code_id', 'discount_amount']); // Clear discount from session after order is placed
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
