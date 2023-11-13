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
        // Retrieve all data from the "queue" and "serve" tables
        $serves = DB::table('serves')->get();

        $uniqueOrderIDs = DB::table('orders')
            ->select('order_id')
            ->distinct()
            ->get();

        $uniqueQueueIDs = DB::table('queues')
        ->select('order_id')
        ->distinct()
        ->get();

        $orders = [];
        $queues = [];

        foreach ($uniqueOrderIDs as $order) {
            $orderInfo = DB::table('orders')
            ->select('order_id', 'product_name', 'product_price', 'quantity', 'total', 'order_type', 'payment_status','created_at')
            ->where('order_id', $order->order_id)
            ->get();        

            $orderType = $orderInfo->first()->order_type;
            $payment_status = $orderInfo->first()->payment_status;
            $total = $orderInfo->first()->total;
            $created_at = \Carbon\Carbon::parse($orderInfo->first()->created_at)->diffForHumans();

            $orders[] = [
                'order_id' => $order->order_id,
                'order_info' => $orderInfo,
                'order_type' => $orderType,
                'payment_status' => $payment_status,
                'total' => $total,
                'created_at' => $created_at,
            ];
        }

        foreach ($uniqueQueueIDs as $queue) {
            $queueInfo = DB::table('queues')
            ->select('order_id', 'product_name', 'product_price', 'quantity', 'total', 'order_type', 'payment_status','created_at')
            ->where('order_id', $queue->order_id)
            ->get();        

            $QueueorderType = $queueInfo->first()->order_type;
            $Queuepayment_status = $queueInfo->first()->payment_status;
            $Queuetotal = $queueInfo->first()->total;
            $Queuecreated_at = \Carbon\Carbon::parse($queueInfo->first()->created_at)->diffForHumans();

            $queues[] = [
                'order_id' => $queue->order_id,
                'order_info' => $queueInfo,
                'order_type' => $QueueorderType,
                'payment_status' => $Queuepayment_status,
                'total' => $Queuetotal,
                'created_at' => $Queuecreated_at,
            ];
        }

        return view('dashboard', compact('orders','queues','serves'));
    })->name('dashboard');
});

Route::controller(ProductsController::class)->group(function () { 
    Route::get('queue', 'queue')->name('queue');
  
 
  
    Route::get('/prepare-order/{order_id}','prepareOrder')->name('prepare.order');
    
   
   
    Route::post('/serve/{order}', 'orderServe')->name('order.serve');
    Route::post('/serving/{order}','serving')->name('serving');
    
    Route::delete('/serve/{serve}','destroyServe')->name('serve.destroy');

    // Product Routes
    Route::get('/donmono','donmono')->name('donmono'); 
    Route::get('/ippin','ippin')->name('ippin');   
    Route::get('/kushiyaki','kushiyaki')->name('kushiyaki'); 
    Route::get('/makizushi','makizushi')->name('makizushi'); 
    Route::get('/men','men')->name('men'); 
    Route::get('/nigirizushi','nigirizushi')->name('nigirizushi'); 
    Route::get('/ochazuke','ochazuke')->name('ochazuke'); 
    Route::get('/ramen','ramen')->name('ramen'); 
    Route::get('/salad','salad')->name('salad'); 
    Route::get('/sashimi','sashimi')->name('sashimi'); 
    Route::get('/tempura','tempura')->name('tempura'); 
    Route::get('/yakizakana','yakizakana')->name('yakizakana'); 
    Route::get('/zensai','zensai')->name('zensai'); 
});



Route::controller(SessionController::class)->group(function () {  
    Route::get('/', 'start')->name('/');  
    Route::get('kiosk', 'kiosk')->name('kiosk');
    Route::get('cart', 'cart')->name('cart');
    Route::get('add-to-cart/{id}','addToCart')->name('add_to_cart');
    Route::patch('update-cart', 'update')->name('update_cart');
    Route::delete('remove-from-cart','remove')->name('remove_from_cart');
    Route::post('/create-order', 'createOrder')->name('create.order');
    Route::get('/receipt/{orderID}','showReceipt')->name('receipt');
    Route::get('/qrCode','qrCode')->name('qrCode');
    Route::get('/qrPayment','qrPayment')->name('qrPayment');
    Route::get('/success-order/{total?}','successOrder')->name('successOrder');
});
