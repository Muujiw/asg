<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'user_id',
        'subject',
        'message',
        'response', 
        'is_resolved',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
