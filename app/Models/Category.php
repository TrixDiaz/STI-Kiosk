<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{

    protected $fillable = [
        'product_name',
        'product_category',
    ];

    use HasFactory;
    use SoftDeletes;
}
