<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Models\Banner;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController; // Added this use statement

Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.authenticate');
});
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout')->middleware('auth');

Route::get('/', function () {
    $banners = collect();

    try {
        if (Schema::hasTable('banners')) {
            $banners = Banner::query()
                ->where('is_active', true)
                ->orderBy('sort_order')
                ->orderByDesc('id')
                ->get();
        }
    } catch (QueryException $exception) {
        $banners = collect();
    }

    return view('website.index', compact('banners'));
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

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('admin.auth')->group(function () {
        Route::get('/dashboard', [AdminAuthController::class, 'dashboard'])->name('dashboard');
        Route::resource('categories', CategoryController::class);
        Route::resource('brands', BrandController::class);
        Route::resource('banners', BannerController::class)->except(['show']);
        Route::resource('products', ProductController::class)->except(['show']);
        Route::get('/carts', [CartController::class, 'index'])->name('carts.index');
        Route::get('/orders', function() { return view('admin.order.index'); })->name('orders.index');
        Route::get('/orders/tracking', function() { return view('admin.order.tracking'); })->name('orders.tracking');
        Route::get('/sliders', function() { return view('admin.slider.index'); })->name('sliders.index');
        Route::get('/sliders/create', function() { return view('admin.slider.create'); })->name('sliders.create');
        Route::get('/coupons', function() { return view('admin.coupon.index'); })->name('coupons.index');
        Route::get('/coupons/create', function() { return view('admin.coupon.create'); })->name('coupons.create');
        Route::get('/users', function() { return view('admin.user.index'); })->name('users.index');
        Route::get('/settings', function() { return view('admin.settings.index'); })->name('settings.index');
    });
});
