<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProductVariant;

/**
 * This model represents the Products table.
 * It defines the attributes and relationships associated with a product.
 */
class Products extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'product_id';


    protected $fillable = [
    'product_name',
    'product_description',
    'product_price',
    'product_image',
    'product_stock_level',
    'category_id',
    'flavours',
    'directions',
    'ingredients',
    'nutrition',
    'faqs'
    ];

    // Connection to Categories model
    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id', 'category_id');
    }

     public function bmiResults()
    {
        return $this->belongsToMany(BmiResults::class, 'BMI_Result_Products', 'product_id', 'bmi_result_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'product_id', 'product_id');
    }

    public function variants()
    {
        return $this->hasMany(ProductVariant::class, 'product_id', 'product_id');
    }
}

