<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\QuizController;
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

Route::get('/shop', [ProductsController::class, 'index'])->name('shop.index');
Route::get('/products/{id}', [ProductsController::class, 'show'])->name('products.show');
Route::post('/basket/add', [BasketController::class, 'add'])->name('basket.add');

// --- Quiz Routes ---
Route::get('/quiz', [App\Http\Controllers\QuizController::class, 'index'])->name('quiz.index');
Route::post('/quiz', [QuizController::class, 'submit'])->name('quiz.submit');
Route::get('/quiz/results', [App\Http\Controllers\QuizController::class, 'showResults'])->name('quiz.results');


Route::middleware(['auth', 'verified'])->group(function () {
    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::get('/dashboard/orders/active', [DashboardController::class, 'activeOrders'])->name('dashboard.active-orders');
    Route::get('/dashboard/orders/history', [DashboardController::class, 'orderHistory'])->name('dashboard.order-history');

    Route::get('/dashboard/chatbot', function () { 
        return view('dashboard.chatbot'); 
    })->name('dashboard.chatbot');
});


// --- Admin Dashboard ---
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});


// --- User Profile Features ---
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';