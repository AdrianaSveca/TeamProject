<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * User model representing users in the application.
 * Defines user attributes and relationships.
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 
        'email',      
        'password',   
        'dob',      
        'gender',       
        'phone',         
        'role',          
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'dob' => 'date',
        ];
    }

    // Relationship: User has many Orders
    public function orders(): HasMany
    {
        return $this->hasMany(\App\Models\Orders::class, 'user_id');
    }
}