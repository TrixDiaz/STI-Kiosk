<?php

use App\Models\User;
use App\Livewire\Men;
use App\Livewire\Cart;
use App\Models\Product;
use App\Livewire\Donmono;
use App\Livewire\Kushiyaki;
use App\Livewire\Makizushi;
use App\Livewire\Ippinryori;
use App\Livewire\Nigirizushi;
use App\Livewire\Ochazuke;
use App\Livewire\Ramen;
use App\Livewire\Salad;
use App\Livewire\Sashimi;
use App\Livewire\Tempura;
use App\Livewire\Yakizakana;
use App\Livewire\Zensai;
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

Route::get('/cart', function () {
    return view('cart');
})->name('cart');

Route::get('/order', function () {
    return view('order.order');
})->name('order');

Route::get('/Donmono', Donmono::class)->name('donmono');
Route::get('/Ippin-Ryori', Ippinryori::class)->name('ippin');
Route::get('/Kushiyaki', Kushiyaki::class)->name('kushiyaki');
Route::get('/Makizushi', Makizushi::class)->name('makizushi');
Route::get('/Men', Men::class)->name('men');
Route::get('/Nigirizushi', Nigirizushi::class)->name('nigirizushi');
Route::get('/Ochazuke', Ochazuke::class)->name('ochazuke');
Route::get('/Ramen', Ramen::class)->name('ramen');
Route::get('/Salad', Salad::class)->name('salad');
Route::get('/Sashimi', Sashimi::class)->name('sashimi');
Route::get('/Tempura', Tempura::class)->name('tempura');
Route::get('/Yakizakana', Yakizakana::class)->name('yakizakana');
Route::get('/Zensai', Zensai::class)->name('zensai');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
