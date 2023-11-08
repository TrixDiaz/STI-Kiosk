<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{

    protected $fillable = [
        'product_id',
        'product_name',
        'product_stock',
        'product_image',
        'product_classification',
        'product_expiration',
        'product_status',
    ];

    use HasFactory;
}
