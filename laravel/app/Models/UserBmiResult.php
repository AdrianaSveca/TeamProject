<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserBmiResult extends Model
{
    protected $fillable = [
    'user_id',
    'bmi',
    'bmi_category',
    'maintenance_calories',
    'goal_calories',
    'protein',
    'fat',
    'carbs',
    'training_plan'
];
}
