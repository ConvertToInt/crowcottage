<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StripeController;

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
Route::get('/shop/{product:title}/checkout', [ProductController::class, 'checkout'])->name('product_checkout');
Route::post('/shop/{product:title}/checkout', [ProductController::class, 'purchase'])->name('product_purchase');
Route::get('/shop/{product:title}', [ProductController::class, 'show'])->name('product_show');

Route::post('/shop/create', [ProductController::class, 'store'])->name('product_store');

Route::get('stripe', [StripeController::class, 'stripe']);
Route::post('stripe', [StripeController::class, 'stripePost'])->name('stripe.post');
