<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * In this model representing the Basket_Items table, we define the relationships
 * to the Products and Basket models. Each basket item belongs to a single product
 * and a single basket. The model also specifies the table name, primary key settings,
 * fillable attributes, and casts for certain fields.
 */
class Basket_Items extends Model
{
    protected $table = 'Basket_Items';

    protected $primaryKey = null;
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = [
        'basket_id',
        'product_id',
        'basket_item_quantity',
        'basket_item_price'
    ];

    protected $casts = [
        'basket_item_quantity' => 'integer',
        'basket_item_price'    => 'decimal:2'
    ];

    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id', 'product_id');
    }

    public function basket()
    {
        return $this->belongsTo(Basket::class, 'basket_id', 'basket_id');
    }
}
