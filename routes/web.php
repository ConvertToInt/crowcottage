<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\ContactController;

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

Route::get('/alecgalloway', function () {
    return view('alec');
})->name('alec');

Route::get('/hire', function () {
    return view('hire');
})->name('hire');

Route::get('/shop', [ProductController::class, 'index'])->name('shop');
Route::get('/shop/create', [ProductController::class, 'create'])->name('product_create');
Route::get('/shop/{product:title}', [ProductController::class, 'show'])->name('product_show');
Route::post('/shop/create', [ProductController::class, 'store'])->name('product_store');

Route::get('/basket', [BasketController::class, 'show'])->name('basket_show');
Route::post('/basket/toggle/{product}', [BasketController::class, 'toggleProduct'])->name('toggle_product');
Route::get('/basket/checkout', [OrderController::class, 'create'])->name('order_create');
Route::post('/basket/checkout/review', [OrderController::class, 'review'])->name('order_review');
Route::post('/basket/checkout/payment', [OrderController::class, 'payment'])->name('order_payment');
Route::post('/basket/checkout/purchase', [OrderController::class, 'stripe_request'])->name('order_purchase');

Route::get('/contact', [ContactController::class, 'create'])->name('contact_create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact_store');