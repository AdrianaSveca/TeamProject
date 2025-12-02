<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

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