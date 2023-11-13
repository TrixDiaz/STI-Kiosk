<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stock extends Model
{

    protected $fillable = [
        'product_id',
        'product_name',
        'product_stock',
        'product_image',
        'product_price',
        'product_expiration',
        'product_category',
        'product_status',
    ];

    use HasFactory;
    use SoftDeletes;

    public function product()
{
    return $this->belongsTo(Product::class);
}
}
