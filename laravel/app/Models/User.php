<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // REMOVED: protected $table = 'Users'; (Laravel automatically finds 'users')
    // REMOVED: protected $primaryKey = 'user_id'; (Laravel automatically finds 'id')

    protected $fillable = [
        'name',          // Was user_name
        'email',         // Was user_email
        'password',      // Was user_password
        'dob',           // Was user_dob
        'gender',        // Was user_gender
        'phone',         // Was user_phone
        'role',          // The new Admin/Customer switch
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
}