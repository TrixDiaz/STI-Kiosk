<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class CashierController extends Controller
{
    public function moveToQueueAndDelete(Order $order)
{
    $order->moveToQueueAndDelete();

  // Redirect to the dashboard view
  return redirect()->route('dashboard')->with('success', 'Order moved to queue successfully.');
}

}
