<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * This model represents the BMI_Result_Products table in the database.
 * It defines the attributes associated with BMI result products.
 */
class BmiResultProducts extends Model
{
    protected $table = 'BMI_Result_Products';

    protected $fillable = [
        'bmi_result_id',
        'product_id',
    ];
}
