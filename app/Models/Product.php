<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'product_short_description',
        'product_long_description',
        'product_price',
        'product_category_name',
        'product_subcategory_name',
        'product_subcategory_id',
        'product_category_id',
        'product_image',
        'product_qty',
        'slug',
    ];
}
