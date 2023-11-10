<?php

use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
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


Route::get('/cart', function () {
    return view('cart');
})->name('cart');

Route::get('/order', function () {
    return view('orderType');
})->name('orderType');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        // Retrieve all data from the "queue" and "serve" tables
        $queues = DB::table('queues')->get();
        $serves = DB::table('serves')->get();

        $uniqueOrderIDs = DB::table('orders')
            ->select('order_id')
            ->distinct()
            ->get();

        $orders = [];

        foreach ($uniqueOrderIDs as $order) {
            $orderInfo = DB::table('orders')
                ->select('product_name', 'quantity', 'order_type')
                ->where('order_id', $order->order_id)
                ->get();

            $orderType = $orderInfo->first()->order_type;

            $orders[] = [
                'order_id' => $order->order_id,
                'order_info' => $orderInfo,
                'order_type' => $orderType,
            ];
        }

        return view('dashboard', compact('orders','queues','serves'));
    })->name('dashboard');
});

// Get Method
Route::get('/prepare-order/{order_id}', [ProductsController::class, 'prepareOrder'])->name('prepare.order');
Route::get('/successOrder', [ProductsController::class, 'successOrder'])->name('successOrder');
Route::get('addToCart/{id}', [ProductsController::class, 'store'])->name('addToCart');
Route::get('/remove-from-cart/{id}', [ProductsController::class, 'destroy'])->name('cart.remove');
Route::get('/order/{orderID}', [ProductsController::class, 'showOrder'])->name('order');

Route::get('/qrPayment', [ProductsController::class, 'qrPayment'])->name('qrPayment');
// Route::get('/', [ProductsController::class, 'start'])->name('/');
// Route::get('/kiosk', [ProductsController::class, 'kiosk'])->name('kiosk');
// Route::get('queue', [ProductsController::class, 'queue'])->name('queue');
// Route::get('/donmono', [ProductsController::class, 'index'])->name('donmono');

// Post Method
Route::post('/serve/{order}', [ProductsController::class, 'orderServe'])->name('order.serve');
Route::post('/serving/{order}', [ProductsController::class, 'serving'])->name('serving');
Route::post('/create-order', [ProductsController::class, 'createOrder'])->name('create.order');
// Delete Method
Route::delete('/serve/{serve}', [ProductsController::class, 'destroyServe'])->name('serve.destroy');

Route::controller(ProductsController::class)->group(function () {
//    Get post
    Route::get('/','start')->name('/');
    Route::get('/kiosk','kiosk')->name('kiosk');   
    Route::get('/queue','queue')->name('queue');   
// Product Routes
    Route::get('/donmono','index')->name('donmono');   
   
 });