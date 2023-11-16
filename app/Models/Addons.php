<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addons extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'product_name', 'product_image', 'product_status'];

}
