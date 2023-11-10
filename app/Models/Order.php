<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{

    protected $fillable = [
        'order_id', 
        'product_name',
        'product_price',
        'quantity',
        'order',
        'total',
        'order_type',
        'product_category',
        'product_status',
        'payment_status',
    ];

    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Order.php
public function products()
{
    return $this->belongsToMany(Product::class);
}

    
}
