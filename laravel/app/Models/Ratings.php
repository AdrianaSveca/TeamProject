<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Model representsing the Ratings table.
 * It defines the attributes and relationships associated with a rating.
 */
class Ratings extends Model
{
    protected $table = 'ratings';
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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id', 'product_id');
    }
}
