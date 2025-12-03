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
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::get('/shop', [ProductsController::class, 'index'])->name('shop.index');
Route::get('/products/{id}', [ProductsController::class, 'show'])->name('products.show');

Route::middleware(['auth'])->group(function () {
    Route::post('/basket/add', [BasketController::class, 'add'])->name('basket.add');
    Route::get('/basket', [BasketController::class, 'index'])->name('basket.index');

    Route::post('/basket/update', [BasketController::class, 'updateQuantity'])->name('basket.update');
    Route::post('/basket/remove', [BasketController::class, 'removeItem'])->name('basket.remove');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
    
    Route::get('/dashboard/orders/active', [DashboardController::class, 'activeOrders'])->name('dashboard.active-orders');
    Route::get('/dashboard/orders/history', [DashboardController::class, 'orderHistory'])->name('dashboard.order-history');

    Route::get('/dashboard/chatbot', function () { return view('dashboard.chatbot'); })->name('dashboard.chatbot');
});

require __DIR__.'/auth.php';