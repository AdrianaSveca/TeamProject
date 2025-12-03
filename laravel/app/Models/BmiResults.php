<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BmiResults extends Model
{
    // Because the table name has capitals
    protected $table = 'BMI_Results';

    protected $fillable = [
        'name',
        'min_score',
        'max_score',
        'advice',
    ];

    public function products()
    {
        return $this->belongsToMany(Products::class, 'BMI_Result_Products', 'product_id', 'bmi_result_id');
    }
}
