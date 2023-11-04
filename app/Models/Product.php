<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'product_id',
        'product_name',
        'product_price',
        'product_quantity',
        'product_description',
        'product_image',
        'product_classification',
        'product_expiration',
        'product_status',
    ];

    use HasFactory;
}
