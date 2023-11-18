<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{
    protected $fillable = [
        'order_id', 
        'product_name',
        'product_price',
        'product_image',
        'quantity',
        'order',
        'total',
        'name',
        'order_type',
        'product_category',
        'payment_status',
        'product_status',
        'change',
        'session_id',
        'created_at',
        'updated_at',
    ];

    use HasFactory;
}
