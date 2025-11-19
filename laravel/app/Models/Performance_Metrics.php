<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Performance_Metrics extends Model
{
    protected $table = 'Performance_Metrics';
    protected $primaryKey = 'metric_id';

    protected $fillable = [
        'user_id',
        'admin_id',
        'fully_loaded_time_s',
        'error_rate'
    ];
    
    protected $casts = [
        'fully_loaded_time_s' => 'decimal:2',
        'error_rate'          => 'decimal:2'
    ];
}
