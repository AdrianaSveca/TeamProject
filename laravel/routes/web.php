<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoriesController;
use App\Models\Products;
use App\Models\Categories;
use App\Http\Controllers\BasketController;

// --- Team's Public Pages ---
Route::get('/', function () { return view('home'); });
Route::get('/shop', function () { return view('shop'); });
Route::get('/quiz', function () { return view('quiz'); });
Route::get('/about', function () { return view('about'); });
Route::get('/joinus', function () { return view('JoinUs'); });
Route::get('/contact', function () { return view('contact'); });
Route::get('/basket', function () { return view('basket'); });

// --- Customer Dashboard (Protected) ---
Route::get('/dashboard', function () {
    return view('dashboard'); // This view comes with Breeze
})->middleware(['auth', 'verified'])->name('dashboard');

// --- Admin Dashboard (Protected) ---
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

// --- User Profile Features (Password change, etc.) ---
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
    
    // Updated Routes using the Controller
    Route::get('/dashboard/orders/active', [DashboardController::class, 'activeOrders'])->name('dashboard.active-orders');
    Route::get('/dashboard/orders/history', [DashboardController::class, 'orderHistory'])->name('dashboard.order-history');

    Route::get('/dashboard/chatbot', function () { return view('dashboard.chatbot'); })->name('dashboard.chatbot');
});

// --- REQUIRED: Loads the Login/Register routes ---
require __DIR__.'/auth.php';