<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Chatbot table.
 */
class Chatbot extends Model
{
    protected $table = 'Chatbot';
    protected $primaryKey = 'chatbot_id';

    protected $fillable = [
        'user_id',
        'admin_id',
        'chatbot_user_message'
    ];

    protected $casts = [
        'chatbot_date' => 'datetime'
    ];
}
