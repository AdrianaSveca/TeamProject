<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BMI extends Model
{
    protected $table = 'BMI';
    protected $primaryKey = 'bmi_id';

    protected $fillable = [
        'user_id',
        'admin_id',
        'bmi_height',
        'bmi_weight'
    ];

    protected $casts = [
        'bmi_height' => 'decimal:2',
        'bmi_weight' => 'decimal:2',
        'bmi_result' => 'decimal:2',
        'bmi_date'   => 'datetime'
    ];
}
