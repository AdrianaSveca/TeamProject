<!-- This is the main web routes file for the Laravel application, defining all the routes for public pages, user dashboard, admin dashboard, product management, order processing, and quiz functionality. -->
<?php

use App\Http\Controllers\ContactsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\QuizController;
use App\Models\Products;
use App\Models\Categories;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\WishlistController;

// --- Team's Public Pages ---
Route::get('/', function () { return view('home'); });
Route::get('/shop', function () { return view('shop'); });
Route::get('/quiz', function () { return view('quiz'); });
Route::get('/about', function () { return view('about'); });
Route::get('/joinus', function () { return view('JoinUs'); });
Route::get('/contact', [ContactsController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactsController::class, 'store'])->name('contact.submit');
Route::get('/contact/thank-you', [ContactsController::class, 'showThankYou'])->name('contact.thankyou');
Route::get('/shop', [ProductsController::class, 'index'])->name('shop.index');
Route::get('/products/{id}', [ProductsController::class, 'show'])->name('products.show');

// --- Quiz Routes ---
Route::get('/quiz', [App\Http\Controllers\QuizController::class, 'index'])->name('quiz.index');
Route::post('/quiz', [QuizController::class, 'submit'])->name('quiz.submit');
Route::get('/quiz/results', [App\Http\Controllers\QuizController::class, 'showResults'])->name('quiz.results');

// In this section, we define routes that are only accessible to authenticated and verified users. We have the viewing of the dashboard, active orders, order history, and a chatbot feature.
Route::middleware(['auth', 'verified'])->group(function () {
    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::get('/dashboard/orders/active', [DashboardController::class, 'activeOrders'])->name('dashboard.active-orders');
    Route::get('/dashboard/orders/history', [DashboardController::class, 'orderHistory'])->name('dashboard.order-history');

    Route::get('/dashboard/chatbot', function () { 
        return view('dashboard.chatbot'); 
    })->name('dashboard.chatbot');
});


// Routes for basket and order management, accessible only to authenticated users.
Route::middleware(['auth'])->group(function () {
    Route::post('/basket/add', [BasketController::class, 'add'])->name('basket.add');
    Route::get('/basket', [BasketController::class, 'index'])->name('basket.index');

    Route::post('/basket/update', [BasketController::class, 'updateQuantity'])->name('basket.update');
    Route::post('/basket/remove', [BasketController::class, 'removeItem'])->name('basket.remove');


    Route::get('/checkout', [OrdersController::class, 'checkout'])->name('checkout');
    Route::post('/orders/place', [OrdersController::class, 'placeOrder'])->name('orders.place');
    Route::get('/orders/{order}/confirmation', [OrdersController::class, 'confirmation'])->name('orders.confirmation');
    Route::get('/dashboard/orders/{id}', [DashboardController::class, 'showOrder'])->name('dashboard.order-details');
});

// Admin routes, accessible only to users with the 'admin' role.
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

// Profile management routes for authenticated users. (Change user profile details, delete account etc.)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::post('/wishlist/{product}', [WishlistController::class, 'store'])->name('wishlist.store');
    Route::delete('/wishlist/{product}', [WishlistController::class, 'destroy'])->name('wishlist.destroy');
});




require __DIR__.'/auth.php';