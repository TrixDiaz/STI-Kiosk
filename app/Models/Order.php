<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = [
        'order_id',
        'product_name',
        'product_price',
        'product_image',
        'product_classification',
        'product_status',
    ];

    use HasFactory;


    
}
