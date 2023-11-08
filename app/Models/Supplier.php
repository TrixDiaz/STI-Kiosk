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
        'company',
        'product',
        'contact',
        'status',
    ];

    use HasFactory;

    public function products()
    {
        return $this->hasMany(Product::class); // Adjust this based on your actual relationship.
    }
}
