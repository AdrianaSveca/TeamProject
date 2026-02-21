<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * This model represents the Categories table. It defines the category attributes.
 */
class Categories extends Model
{
    protected $table = 'Categories';
    protected $primaryKey = 'category_id';

    protected $fillable = [
        'category_name',
        'category_description'
    ];
}
