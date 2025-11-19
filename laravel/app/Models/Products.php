<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'Products';
    protected $primaryKey = 'product_id';


    protected $fillable = [
    'product_name',
    'product_description',
    'product_price',
    'product_image',
    'product_stock_level',
    'category_id'
    ];
}
