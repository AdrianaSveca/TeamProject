<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    protected $table = 'Basket';
    protected $primaryKey = 'basket_id';

    protected $fillable = [
        'user_id',
        'admin_id'
    ];

    protected $casts = [
        'basket_date' => 'datetime'
    ];
}
