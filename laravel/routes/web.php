<?php
// This is the main web routes file for the Laravel application, defining all the routes for public pages, user dashboard, admin dashboard, product management, order processing, and quiz functionality.

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
use App\Http\Controllers\OrderTrackingController;

// --- Team's Public Pages ---
Route::get('/', function () { return view('home'); });
Route::get('/shop', function () { return view('shop'); });
Route::get('/quiz', function () { return view('quiz'); });
Route::get('/about', function () { return view('about'); });
Route::get('/joinus', function () { return view('JoinUs'); });
Route::get('/contact', [ContactsController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactsController::class, 'store'])->name('contact.submit');
Route::get('/contact/thank-you', [ContactsController::class, 'showThankYou'])->name('contact.thankyou');
Route::get('/faq', function () { return view('faq'); })->name('faq');
Route::get('/shop', [ProductsController::class, 'index'])->name('shop.index');
Route::get('/products/{id}', [ProductsController::class, 'show'])->name('products.show');

// Public track order (order ID + email)
Route::get('/track-order', [OrderTrackingController::class, 'showForm'])->name('track-order.form');
Route::post('/track-order', [OrderTrackingController::class, 'lookup'])->name('track-order.lookup');

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

    Route::get('/dashboard/track-order', [DashboardController::class, 'trackOrderForm'])->name('dashboard.track-order');
    Route::post('/dashboard/track-order', [DashboardController::class, 'trackOrderLookup'])->name('dashboard.track-order.lookup');
});


// Routes for basket and order management, accessible only to authenticated users.
Route::middleware(['auth'])->group(function () {
    Route::post('/basket/add', [BasketController::class, 'add'])->name('basket.add');
    Route::get('/basket', [BasketController::class, 'index'])->name('basket.index');

    Route::post('/basket/update', [BasketController::class, 'updateQuantity'])->name('basket.update');
    Route::post('/basket/remove', [BasketController::class, 'removeItem'])->name('basket.remove');


    Route::get('/checkout', [OrdersController::class, 'checkout'])->name('checkout');
    Route::post('/checkout/apply-discount', [OrdersController::class, 'applyDiscount'])->name('checkout.apply-discount');
    Route::get('/checkout/remove-discount', [OrdersController::class, 'removeDiscount'])->name('checkout.remove-discount');
    Route::post('/orders/place', [OrdersController::class, 'placeOrder'])->name('orders.place');
    Route::get('/orders/{order}/confirmation', [OrdersController::class, 'confirmation'])->name('orders.confirmation');
    Route::get('/dashboard/orders/{id}', [DashboardController::class, 'showOrder'])->name('dashboard.order-details');
});

// Admin routes, accessible only to users with the 'admin' role.
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/discount-codes', [AdminController::class, 'discountCodes'])->name('admin.discount-codes');
    Route::post('/admin/discount-codes', [AdminController::class, 'storeDiscountCode'])->name('admin.discount-codes.store');
    Route::delete('/admin/discount-codes/{id}', [AdminController::class, 'destroyDiscountCode'])->name('admin.discount-codes.destroy');
    
    // Product management routes
    Route::get('/admin/products', [AdminController::class, 'products'])->name('admin.products');
    Route::get('/admin/products/create', [AdminController::class, 'createProduct'])->name('admin.products.create');
    Route::post('/admin/products', [AdminController::class, 'storeProduct'])->name('admin.products.store');
    Route::get('/admin/products/{id}/edit', [AdminController::class, 'editProduct'])->name('admin.products.edit');
    Route::put('/admin/products/{id}', [AdminController::class, 'updateProduct'])->name('admin.products.update');
    Route::delete('/admin/products/{id}', [AdminController::class, 'destroyProduct'])->name('admin.products.destroy');
    
    // Order management routes
    Route::get('/admin/orders', [AdminController::class, 'orders'])->name('admin.orders');
    Route::get('/admin/orders/{id}', [AdminController::class, 'orderDetails'])->name('admin.order-details');
    Route::post('/admin/orders/{id}/status', [AdminController::class, 'updateOrderStatus'])->name('admin.orders.update-status');
    
    // User management routes
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/admin/users/create', [AdminController::class, 'createUser'])->name('admin.users.create');
    Route::post('/admin/users', [AdminController::class, 'storeUser'])->name('admin.users.store');
    Route::get('/admin/users/{id}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');
    Route::put('/admin/users/{id}', [AdminController::class, 'updateUser'])->name('admin.users.update');
    Route::delete('/admin/users/{id}', [AdminController::class, 'destroyUser'])->name('admin.users.destroy');
});

// Profile management routes for authenticated users. (Change user profile details, delete account etc.)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




require __DIR__.'/auth.php';