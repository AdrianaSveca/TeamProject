<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ratings extends Model
{
    protected $table = 'Ratings';
    protected $primaryKey = 'rating_id';

    protected $fillable = [
        'user_id',
        'product_id',
        'rating',
        'rating_comment',
        'rating_date'
    ];

    protected $casts = [
        'rating'      => 'decimal:2',
        'approved'    => 'boolean',
        'rating_date' => 'datetime'
    ];
}
