<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Basket_Items extends Model
{
    protected $table = 'Basket_Items';
    public $incrementing = false;
    protected $primaryKey = ['basket_id', 'product_id'];
    protected $keyType = 'int';


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
}
