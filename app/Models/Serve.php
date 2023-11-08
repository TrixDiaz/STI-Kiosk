<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serve extends Model
{
    protected $fillable = [
        'order_id',
        'product_status',
    ];
    
    use HasFactory;
}
