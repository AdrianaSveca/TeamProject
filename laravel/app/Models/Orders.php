<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function items(): HasMany
    {
        return $this->hasMany(Order_Items::class, 'order_id', 'order_id');
    }
}
