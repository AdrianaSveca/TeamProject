<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * This model represents the BMI table in the database.
 * It defines the attributes associated with a BMI record.
 */
class BMI extends Model
{
    use HasFactory;

    protected $table = 'BMI';
    protected $primaryKey = 'bmi_id'; 

    protected $fillable = [
        'user_id',
        'bmi_height',
        'bmi_weight',
        'bmi_result',
        'bmi_feedback',
        'bmi_date',
    ];
}