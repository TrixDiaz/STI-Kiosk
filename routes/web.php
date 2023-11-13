<?php

use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\View\Components\KioskLayout;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\KioskController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SessionController;

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
        function getOrderInfo($table, $order_id)
        {
            return DB::table($table)
                ->select('order_id', 'product_name', 'product_price', 'quantity', 'total', 'order_type', 'payment_status', 'created_at')
                ->where('order_id', $order_id)
                ->get();
        }

        // Process orders
        foreach ($uniqueOrderIDs as $order) {
            $orderInfo = getOrderInfo('orders', $order->order_id);

            $orders[] = [
                'order_id' => $order->order_id,
                'order_info' => $orderInfo,
                'order_type' => $orderInfo->isEmpty() ? null : $orderInfo->first()->order_type,
                'payment_status' => $orderInfo->isEmpty() ? null : $orderInfo->first()->payment_status,
                'total' => $orderInfo->isEmpty() ? null : $orderInfo->first()->total,
                'created_at' => $orderInfo->isEmpty() ? null : \Carbon\Carbon::parse($orderInfo->first()->created_at)->diffForHumans(),
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
                'created_at' => $queueInfo->isEmpty() ? null : \Carbon\Carbon::parse($queueInfo->first()->created_at)->diffForHumans(),
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

    // Product Routes
    Route::get('/donmono', 'donmono')->name('donmono');
    Route::get('/ippin', 'ippin')->name('ippin');
    Route::get('/kushiyaki', 'kushiyaki')->name('kushiyaki');
    Route::get('/makizushi', 'makizushi')->name('makizushi');
    Route::get('/men', 'men')->name('men');
    Route::get('/nigirizushi', 'nigirizushi')->name('nigirizushi');
    Route::get('/ochazuke', 'ochazuke')->name('ochazuke');
    Route::get('/ramen', 'ramen')->name('ramen');
    Route::get('/salad', 'salad')->name('salad');
    Route::get('/sashimi', 'sashimi')->name('sashimi');
    Route::get('/tempura', 'tempura')->name('tempura');
    Route::get('/yakizakana', 'yakizakana')->name('yakizakana');
    Route::get('/zensai', 'zensai')->name('zensai');
});

Route::controller(SessionController::class)->group(function () {
    Route::get('/', 'start')->name('/');
    Route::get('kiosk', 'kiosk')->name('kiosk');
    Route::get('cart', 'cart')->name('cart');
    Route::get('add-to-cart/{id}', 'addToCart')->name('add_to_cart');
    Route::patch('update-cart', 'update')->name('update_cart');
    Route::delete('remove-from-cart', 'remove')->name('remove_from_cart');
    Route::post('/create-order', 'createOrder')->name('create.order');
    Route::get('/receipt/{orderID}', 'showReceipt')->name('receipt');
    Route::get('/qrCode', 'qrCode')->name('qrCode');
    Route::get('/qrPayment', 'qrPayment')->name('qrPayment');
    Route::get('/success-order/{total?}', 'successOrder')->name('successOrder');
});
