<?php

use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('/');

Route::get('/kiosk', function () {
    return view('kiosk');
})->name('kiosk');

Route::get('/cart', function () {
    return view('cart');
})->name('cart');


Route::get('/order', function () {
    return view('orderType');
})->name('orderType');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


// Products 
Route::get('donmono', [ProductsController::class, 'index'])->name('donmono');
Route::get('/qrPayment', [ProductsController::class, 'qrPayment'])->name('qrPayment');
Route::get('/successOrder', [ProductsController::class, 'successOrder'])->name('successOrder');
Route::get('addToCart/{id}', [ProductsController::class, 'store'])->name('addToCart');
Route::get('/remove-from-cart/{id}', [ProductsController::class, 'destroy'])->name('cart.remove');
Route::post('/create-order', [ProductsController::class, 'createOrder'])->name('create.order');
Route::get('/order/{orderID}', [ProductsController::class, 'showOrder'])->name('order');




