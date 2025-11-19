<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'Orders';
    protected $primaryKey = 'order_id';

    protected $fillable = [
        'user_id',
        'admin_id',
        'order_total',
        'order_status',
        'order_address',
        'days_until_delivery'
    ];

    protected $casts = [
        'order_total'          => 'decimal:2',
        'order_status'         => 'string',
        'days_until_delivery'  => 'integer',
        'order_date'           => 'datetime'
    ];
}
