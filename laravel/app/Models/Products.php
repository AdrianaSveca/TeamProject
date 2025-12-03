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

    // Connection to Categories model
    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id', 'category_id');
    }

     public function bmiResults()
    {
        return $this->belongsToMany(BmiResults::class, 'BMI_Result_Products', 'product_id', 'bmi_result_id');
    }
}
