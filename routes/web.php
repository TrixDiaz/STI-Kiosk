<?php

use App\Livewire\Cart;
use App\Livewire\Ramen;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

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
});

Route::get('/kiosk', function () {
    return view('kiosk');
})->name('kiosk');

Route::get('/order', function () {
    return view('order.order');
})->name('order');

Route::get('/ramen', Ramen::class)->name('ramen');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
