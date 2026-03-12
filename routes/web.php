<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('website.index');
})->name('home');

Route::get('/shop', function () {
    return view('website.shop');
})->name('shop');

Route::get('/cart', function () {
    return view('website.cart');
})->name('cart');

Route::get('/about', function () {
    return view('website.about');
})->name('about');

Route::get('/contact', function () {
    return view('website.contact');
})->name('contact');

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.authenticate');

    Route::middleware('admin.auth')->group(function () {
        Route::get('/dashboard', [AdminAuthController::class, 'dashboard'])->name('admin.dashboard');
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
        Route::resource('categories', CategoryController::class);
    });
});
