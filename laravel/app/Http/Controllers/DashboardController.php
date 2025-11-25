<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{

    // 1. Active Orders (Pending or Shipped)
    public function activeOrders(): View
    {
        $user = Auth::user();

        $orders = $user->orders()
            ->whereIn('order_status', ['Pending', 'Shipped'])
            ->latest('order_date') // Sort by newest
            ->get();

        return view('dashboard.active-orders', compact('orders'));
    }

    // 2. Order History (Delivered)
    public function orderHistory(): View
    {
        $user = Auth::user();
        $orders = $user->orders()
            ->where('order_status', 'Delivered')
            ->latest('order_date')
            ->get();

        return view('dashboard.order-history', compact('orders'));
    }
}
