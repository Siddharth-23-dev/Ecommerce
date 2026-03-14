<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController; // Added this use statement

Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.authenticate');
});
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout')->middleware('auth');

Route::get('/', function () {
    return view('website.index');
})->name('home');

Route::get('/shop', function () {
    return view('website.shop');
})->name('shop');

Route::get('/product', function () {
    return view('website.product');
})->name('product');

Route::get('/cart', function () {
    return view('website.cart');
})->name('cart');

Route::get('/checkout', function () {
    return view('website.checkout');
})->name('checkout');

Route::get('/about', function () {
    return view('website.about');
})->name('about');

Route::get('/contact', function () {
    return view('website.contact');
})->name('contact');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [\App\Http\Controllers\UserController::class, 'dashboard'])->name('user.dashboard');
});

Route::prefix('admin')->group(function () {
    Route::middleware('admin.auth')->group(function () {
        Route::get('/dashboard', [AdminAuthController::class, 'dashboard'])->name('admin.dashboard');
        Route::resource('categories', CategoryController::class);
        Route::get('/products', function() { return view('admin.product.index'); })->name('admin.products.index');
        Route::get('/products/create', function() { return view('admin.product.create'); })->name('admin.products.create');
        Route::get('/brands', function() { return view('admin.brand.index'); })->name('admin.brands.index');
        Route::get('/brands/create', function() { return view('admin.brand.create'); })->name('admin.brands.create');
        Route::get('/orders', function() { return view('admin.order.index'); })->name('admin.orders.index');
        Route::get('/orders/tracking', function() { return view('admin.order.tracking'); })->name('admin.orders.tracking');
        Route::get('/sliders', function() { return view('admin.slider.index'); })->name('admin.sliders.index');
        Route::get('/sliders/create', function() { return view('admin.slider.create'); })->name('admin.sliders.create');
        Route::get('/coupons', function() { return view('admin.coupon.index'); })->name('admin.coupons.index');
        Route::get('/coupons/create', function() { return view('admin.coupon.create'); })->name('admin.coupons.create');
        Route::get('/users', function() { return view('admin.user.index'); })->name('admin.users.index');
        Route::get('/settings', function() { return view('admin.settings.index'); })->name('admin.settings.index');
    });
});
