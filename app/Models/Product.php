<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'product_id',
        'product_name',
        'product_price',
        'product_stock',
        'product_description',
        'product_image',
        'product_classification',
        'product_expiration',
        'product_status',
    ];

    use HasFactory;

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    
    public function order()
{
    return $this->belongsTo(Order::class);
}

}
