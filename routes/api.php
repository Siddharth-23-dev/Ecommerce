<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\AuthController;
use \App\Http\Controllers\Api\CategoryController;
use \App\Http\Controllers\Api\BrandController;
use \App\Http\Controllers\Api\CartController;
use \App\Http\Controllers\Api\HomeController;
use \App\Http\Controllers\Api\ProductController;

Route::post('/login', [AuthController::class, 'login']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('api.auth');

Route::get('/categories', [CategoryController::class, 'index']);

Route::get('/brands', [BrandController::class,'index']);
Route::get('/brand', [BrandController::class,'index']);

Route::get('/product', [ProductController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);

Route::middleware('api.auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index']);
    Route::post('/cart', [CartController::class, 'store']);
    Route::delete('/cart/clear', [CartController::class, 'clear']);
    Route::match(['put', 'patch'], '/cart/{cart}', [CartController::class, 'update']);
    Route::delete('/cart/{cart}', [CartController::class, 'destroy']);
});



