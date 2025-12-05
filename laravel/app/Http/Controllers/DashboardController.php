<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
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
}