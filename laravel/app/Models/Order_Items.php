<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_Items extends Model
{
    protected $table = 'Order_Items';
    public $incrementing = false;
    protected $primaryKey = ['order_id', 'product_id'];
    protected $keyType = 'int';


    protected $fillable = [
        'order_id',
        'product_id',
        'order_item_quantity',
        'order_item_price',
        'order_item_status'
    ];

    protected $casts = [
        'order_item_quantity' => 'integer',
        'order_item_price'    => 'decimal:2',
        'order_item_status'   => 'string'
    ];

    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id', 'product_id');
    }
}
