<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
    protected $fillable = ['order_id', 'product_name', 'product_price', 'quantity', 'total', 'order_type', 'product_category', 'payment_status', 'session_id','name','change',];

    use HasFactory;
}
