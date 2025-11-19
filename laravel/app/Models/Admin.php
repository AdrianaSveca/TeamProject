<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;
    
    protected $table = 'Admin';
    protected $primaryKey = 'admin_id';

    protected $fillable = [
        'admin_name',
        'admin_email',
        'admin_password'
    ];

    protected $hidden = [
        'admin_password',
        'remember_token'
    ];

    protected function casts(): array
    {
        return [
            'admin_password' => 'hashed'
        ];
    }
}