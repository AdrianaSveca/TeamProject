<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';

    protected $fillable = [
        'product_id',
        'name',
        'email',
        'rating',
        'review'
    ];

    /**
     * Review belongs to a product
     */
    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id', 'product_id');
    }
}