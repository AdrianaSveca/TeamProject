<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Email_Promotions extends Model
{
    protected $table = 'Email_Promotions';
    protected $primaryKey = 'email_id';

    protected $fillable = [
        'user_id',
        'admin_id',
        'email_subject',
        'email_body'
    ];

    protected $casts = [
        'email_sent_time' => 'datetime',
        'email_status'    => 'string'
    ];
}
