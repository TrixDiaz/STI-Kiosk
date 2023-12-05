<?php

use App\Http\Controllers\CashierController;
use App\Livewire\KioskProducts;
use App\Livewire\KioskPage;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SessionController;
use App\Livewire\KioskAddons;
use App\Livewire\KioskDonmono;
use App\Livewire\KioskIppin;
use App\Livewire\KioskKushiyaki;
use App\Livewire\KioskMakisushi;
use App\Livewire\KioskMen;
use App\Livewire\KioskNigirizushi;
use App\Livewire\KioskOchazuke;
use App\Livewire\KioskRamen;
use App\Livewire\KioskSalad;
use App\Livewire\KioskSashimi;
use App\Livewire\KioskTempura;
use App\Livewire\KioskYakizakana;
use App\Livewire\KioskZensai;
use App\Livewire\PosDonmono;

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
// Kiosk Livewire 
Route::get('/Kiosk', KioskPage::class)->name('kiosk');
Route::get('/Donmono', KioskDonmono::class)->name('donmono');
Route::get('/Ippin', KioskIppin::class)->name('ippin');
Route::get('/kushiyaki', KioskKushiyaki::class)->name('kushiyaki');
Route::get('/makizushi', KioskMakisushi::class)->name('makizushi');
Route::get('/men', KioskMen::class)->name('men');
Route::get('/nigirizushi', KioskNigirizushi::class)->name('nigirizushi');
Route::get('/ochazuke', KioskOchazuke::class)->name('ochazuke');
Route::get('/ramen', KioskRamen::class)->name('ramen');
Route::get('/salad', KioskSalad::class)->name('salad');
Route::get('/sashimi', KioskSashimi::class)->name('sashimi');
Route::get('/tempura', KioskTempura::class)->name('tempura');
Route::get('/yakizakana', KioskYakizakana::class)->name('yakizakana');
Route::get('/zensai', KioskZensai::class)->name('zensai');
Route::get('/addons', KioskAddons::class)->name('addons');

// Cashier
Route::get('/pos-donmono', PosDonmono::class)->name('pos.donmono');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        $orders = [];
        $queues = [];
        $serves = DB::table('serves')->get();
        // Retrieve unique order IDs from both 'orders' and 'queues' tables
        $uniqueOrderIDs = DB::table('orders')
            ->select('order_id')
            ->distinct()
            ->get();
        $uniqueQueueIDs = DB::table('queues')
            ->select('order_id')
            ->distinct()
            ->get();
        // Function to retrieve order/queue info based on the table and order ID
        function getOrderInfo($table, $order_id): Collection
        {
            return DB::table($table)
                ->select('id', 'order_id', 'product_name', 'product_image', 'product_price', 'quantity', 'total', 'order_type', 'payment_status', 'created_at')
                ->where('order_id', $order_id)
                ->get();
        }
        // Process orders
        foreach ($uniqueOrderIDs as $order) {
            $orderInfo = getOrderInfo('orders', $order->order_id);
            $orders[] = [
                'id' => $orderInfo->isEmpty() ? null : $orderInfo->first()->id,
                'order_id' => $order->order_id,
                'order_info' => $orderInfo,
                'order_type' => $orderInfo->isEmpty() ? null : $orderInfo->first()->order_type,
                'payment_status' => $orderInfo->isEmpty() ? null : $orderInfo->first()->payment_status,
                'total' => $orderInfo->isEmpty() ? null : $orderInfo->first()->total,
                'created_at' => $orderInfo->isEmpty() ? null : Carbon::parse($orderInfo->first()->created_at),
            ];
        }
        // Process queues
        foreach ($uniqueQueueIDs as $queue) {
            $queueInfo = getOrderInfo('queues', $queue->order_id);
            $queues[] = [
                'order_id' => $queue->order_id,
                'order_info' => $queueInfo,
                'order_type' => $queueInfo->isEmpty() ? null : $queueInfo->first()->order_type,
                'payment_status' => $queueInfo->isEmpty() ? null : $queueInfo->first()->payment_status,
                'total' => $queueInfo->isEmpty() ? null : $queueInfo->first()->total,
                'created_at' => $queueInfo->isEmpty() ? null : Carbon::parse($queueInfo->first()->created_at),
            ];
        }
        return view('dashboard', compact('orders', 'queues', 'serves'));
    })->name('dashboard');
});

Route::controller(ProductsController::class)->group(function () {
    Route::get('queue', 'queue')->name('queue');
    Route::get('/prepare-order/{order_id}', 'prepareOrder')->name('prepare.order');
    Route::post('/serve/{order}', 'orderServe')->name('order.serve');
    Route::post('/serving/{order}', 'serving')->name('serving');
    Route::delete('/serve/{serve}', 'destroyServe')->name('serve.destroy');
});

Route::controller(SessionController::class)->group(function () {
    Route::get('/', 'start')->name('/');
    Route::get('cart', 'cart')->name('cart');
    Route::get('add-to-cart/{id}', 'addToCart')->name('add_to_cart');
    Route::patch('update-cart', 'update')->name('update_cart');
    Route::delete('remove-from-cart', 'remove')->name('remove_from_cart');
    Route::post('/create-order', 'createOrder')->name('create.order');
    Route::get('/receipt/{orderID}', 'showReceipt')->name('receipt');
    Route::get('/QRreceipt/{orderID}', 'QRshowReceipt')->name('QRreceipt');
    Route::get('/qrCode', 'qrCode')->name('qrCode');
    Route::get('/qrPayment', 'qrPayment')->name('qrPayment');
    Route::get('/success-order/{total?}', 'successOrder')->name('successOrder');
});

Route::controller(CashierController::class)->group(function () {
    Route::get('pos-add-to-cart/{id}', 'posAddToCart')->name('posAddToCart');
    Route::get('posCart', 'posCart')->name('posCart');
    Route::patch('pos-update-cart', 'posUpdate')->name('pos_update_cart');
    Route::delete('pos-remove-from-cart', 'posRemove')->name('pos_remove_from_cart');
    Route::post('/pos-create-order', 'posCreateOrder')->name('pos_create.order');
    Route::get('/pos-receipt/{orderID}', 'posShowReceipt')->name('pos_receipt');
    Route::get('/posQrCode', 'posQrCode')->name('posQrCode');
    Route::get('/pos-qrPayment', 'posQrPayment')->name('posQrPayment');
    Route::get('/pos-success-order/{total?}', 'posSuccessOrder')->name('posSuccessOrder');
    Route::delete('/orders/{order}', 'moveToQueueAndDelete')->name('orders.move-to-queue');
    Route::delete('/clear', 'clear')->name('clear');
});
