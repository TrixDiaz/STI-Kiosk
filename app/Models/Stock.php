<?php

namespace App\Models;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stock extends Model
{
    protected $fillable = ['product_id', 'product_name', 'product_stock', 'product_image', 'product_price', 'product_expiration', 'product_category', 'product_status'];

    use HasFactory;
    use SoftDeletes;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function orders()
{
    return $this->hasMany(Order::class);
}
}
