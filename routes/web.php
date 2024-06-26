<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DateController;
use App\Models\Product;

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
    $products = Product::get();

    return view ('home', [
        'products'=>$products
    ]);
})->name('home');

Route::get('/alecgalloway', function () {
    return view('alec');
})->name('alec');

Route::get('/terms', function () {
    return view('tac');
})->name('tac');

Route::get('/shop', [ProductController::class, 'index'])->name('shop');
Route::get('/shop/{product:title}', [ProductController::class, 'show'])->name('product_show');

Route::get('/classes', [ClassesController::class, 'index'])->name('classes');
Route::get('/classes/date/availability', [ClassesController::class, 'check_availability'])->name('check_spaces');

Route::post('/classes/booking', [BookingController::class, 'create'])->name('booking_create');
Route::post('/classes/booking/review', [BookingController::class, 'review'])->name('booking_review');
Route::post('/classes/booking/payment', [BookingController::class, 'payment'])->name('booking_payment');
Route::post('/classes/booking/purchase', [BookingController::class, 'stripe_request'])->name('booking_purchase');

Route::get('/basket', [BasketController::class, 'show'])->name('basket_show');
Route::get('/basket/total', [Controller::class, 'get_total_price'])->name('get_total_price');
Route::get('/basket/toggle/{product}', [BasketController::class, 'product_toggle'])->name('product_toggle');
Route::get('/basket/remove/{product}', [BasketController::class, 'remove_from_basket'])->name('product_remove');
Route::get('/basket/add/{product}', [BasketController::class, 'add_to_basket'])->name('product_add');

Route::get('/basket/checkout', [OrderController::class, 'create'])->name('order_create');
Route::post('/basket/checkout/review', [OrderController::class, 'review'])->name('order_review');
Route::post('/basket/checkout/payment', [OrderController::class, 'payment'])->name('order_payment');
Route::post('/basket/checkout/purchase', [OrderController::class, 'stripe_request'])->name('order_purchase');

Route::get('/contact', [ContactController::class, 'create'])->name('contact_create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact_store');

Route::group(['middleware' => ['admin']], function()
{
    Route::get('/admin', [AdminController::class, 'panel'])->name('admin_panel');

    Route::get('/admin/products', [AdminController::class, 'products_index'])->name('admin_products');
    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('product_create');
    Route::post('/admin/products/create', [ProductController::class, 'store'])->name('product_store');
    Route::delete('/admin/product/{product}/delete', [ProductController::class, 'delete'])->name('product_delete');

    Route::get('/admin/classes', [AdminController::class, 'classes_index'])->name('admin_classes');
    Route::get('/admin/classes/create', [ClassesController::class, 'create'])->name('class_create');
    Route::post('/admin/classes/create', [ClassesController::class, 'store'])->name('class_store');
    Route::delete('/admin/classes/{class}/delete', [ClassesController::class, 'delete'])->name('class_delete');
    Route::post('/admin/classes/date/toggle', [DateController::class, 'toggle'])->name('date_toggle');

    Route::get('/admin/bookings', [AdminController::class, 'bookings_index'])->name('admin_bookings');
    Route::get('/admin/bookings/date', [BookingController::class, 'bookings_date'])->name('bookings_date');

    Route::get('/admin/orders', [AdminController::class, 'orders_index'])->name('admin_orders');
    Route::get('/admin/order/{order}/shipping', [AdminController::class, 'shipping_charge'])->name('shipping_charge');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
