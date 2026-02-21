<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\BMI;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class DashboardController extends Controller
{
    //  Main Dashboard for users
    public function index(): View
    {
        /** @var \App\Models\User $user */
        $user = Auth::user(); // Get the logged-in user
        
        // Here we gather additional data for the dashboardn (info for the cards)
        $activeCount = $user->orders()
            ->whereIn('order_status', ['Pending', 'Shipped'])
            ->count();

        $lastOrder = $user->orders()
            ->latest('order_date')
            ->first();

        $lastBMI = BMI::where('user_id', $user->id)
            ->latest('bmi_date')
            ->first();

       return view('dashboard', [
            'user' => $user,
            'activeCount' => $activeCount,
            'lastOrder' => $lastOrder,
            'lastBMI' => $lastBMI,
            'mustVerifyEmail' => $user instanceof MustVerifyEmail,
            'status' => session('status'),
        ]);
    }

    // Active Orders
    public function activeOrders(): View
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $orders = $user->orders()
            ->whereIn('order_status', ['Pending', 'Shipped'])
            ->latest('order_date')
            ->get();

        return view('dashboard.active-orders', compact('orders'));
    }

    //  Order History
    public function orderHistory(): View
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $orders = $user->orders()
            ->where('order_status', 'Delivered')
            ->latest('order_date')
            ->get();

        return view('dashboard.order-history', compact('orders'));
    }

    public function showOrder($id): View
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        // Find the order securely (must belong to user)
        $order = $user->orders()
            ->with('items.product') // Eager load items and their product details
            ->where('order_id', $id)
            ->firstOrFail();

        return view('orderdetails', compact('order'));
    }

    // Track Order (dashboard): user enters their order ID to jump to that order’s details
    /**
     * In this function we show the track order form inside the dashboard. The user enters their order ID; we pass any error message from session (e.g. after a failed lookup).
     */
    public function trackOrderForm(Request $request): View
    {
        $order = null;
        $error = $request->session()->get('track_order_error');
        $request->session()->forget('track_order_error');
        return view('dashboard.track-order', compact('order', 'error'));
    }

    /**
     * In this function we look up the order by ID for the logged-in user. If the order belongs to them, we redirect to the order details page. If not found, we redirect back to the track order form with an error message.
     */
    public function trackOrderLookup(Request $request): RedirectResponse|View
    {
        $request->validate(['order_id' => 'required|integer']);

        /** @var \App\Models\User $user */
        $user = Auth::user();
        $order = $user->orders()->where('order_id', $request->order_id)->first();

        if ($order) {
            return redirect()->route('dashboard.order-details', $order->order_id);
        }

        return redirect()->route('dashboard.track-order')->with('track_order_error', 'We couldn\'t find an order with that ID for your account.');
    }
}