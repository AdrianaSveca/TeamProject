<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * This model represents the Basket table in the database.
 * It defines the relationships and attributes associated with a basket.
 */
class Basket extends Model
{
    protected $table = 'Basket';
    protected $primaryKey = 'basket_id';

    protected $fillable = [
        'user_id',
        'admin_id',
        'basket_date'
    ];

    protected $casts = [
        'basket_date' => 'datetime'
    ];

    public function items()
    {
        return $this->hasMany(Basket_Items::class, 'basket_id', 'basket_id');
    }
}
