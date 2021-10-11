<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/shop', [ProductController::class, 'index'])->name('shop');
Route::get('/shop/create', [ProductController::class, 'create'])->name('product_create');
Route::get('/shop/{product:title}', [ProductController::class, 'show'])->name('product_show');
Route::post('/shop/create', [ProductController::class, 'store'])->name('product_store');

Route::get('/basket', [OrderController::class, 'show'])->name('order_show');
Route::post('/basket/toggle/{product}', [OrderController::class, 'toggleProduct'])->name('order_toggle');
Route::get('/basket/checkout', [OrderController::class, 'create'])->name('order_create');
Route::post('/basket/checkout/review', [OrderController::class, 'review'])->name('order_review');
Route::get('/basket/checkout/payment', [OrderController::class, 'payment'])->name('order_payment');
Route::post('/basket/checkout/purchase', [OrderController::class, 'purchase'])->name('order_purchase');

Route::get('/basket/set', [OrderController::class, 'set']);