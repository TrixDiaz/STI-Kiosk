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
        'product_price',
        'product_image',
        'product_expiration',
        'product_category',
        'product_status',
    ];

    use HasFactory;
    use SoftDeletes;

    
}
