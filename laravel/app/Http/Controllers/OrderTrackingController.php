<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Orders;

/**
 * This controller handles public order tracking. Anyone can enter an order ID and email to see the order status without logging in.
 */
class OrderTrackingController extends Controller
{
    /**
     * In this function we show the public track order form (order ID and email fields).
     */
    public function showForm(): View
    {
        return view('track-order', ['order' => null, 'error' => null]);
    }

    /**
     * In this function we look up the order by order ID and email. If found, we show the order status. If not found, we show a single generic message for privacy (we do not reveal whether the order exists or the email was wrong).
     */
    public function lookup(Request $request): View
    {
        $request->validate([
            'order_id' => 'required|integer',
            'email'    => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();
        $order = $user
            ? $user->orders()->with('items.product')->where('order_id', $request->order_id)->first()
            : null;

        if (!$order) {
            return view('track-order', [
                'order' => null,
                'error' => 'We couldn\'t find an order with that Order ID and email. Please check and try again.',
            ]);
        }

        return view('track-order', ['order' => $order, 'error' => null]);
    }
}
