<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BmiResultProducts extends Model
{
    protected $table = 'BMI_Result_Products';

    protected $fillable = [
        'bmi_result_id',
        'product_id',
    ];
}
