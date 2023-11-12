<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supplier extends Model
{
    protected $fillable = [
        'name',
        'email',
        'product_name',
        'contact',
        'company',
        'status',
    ];

    use HasFactory;

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
