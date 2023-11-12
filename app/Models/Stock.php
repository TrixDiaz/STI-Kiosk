<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stock extends Model
{

    protected $fillable = [
        'product_id',
        'product_name',
        'product_stock',
        'product_image',
        'product_price',
        'product_expiration',
        'payment_status',
        'product_category',
    ];

    use HasFactory;
    use SoftDeletes;

    
}
