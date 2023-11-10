<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = ['product_id', 'product_name', 'product_image', 'product_status'];

    use HasFactory;

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // Product.php
public function orders()
{
    return $this->belongsToMany(Order::class);
}

   

}
