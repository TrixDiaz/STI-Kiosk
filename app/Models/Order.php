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
        'product_image',
        'product_classification',
        'product_status',
        'payment_status',
    ];

    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
