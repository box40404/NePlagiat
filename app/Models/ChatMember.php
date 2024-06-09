<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMember extends Model
{
    use HasFactory;

    public function user() // название важно, не user возможно не работает 
    {
        return $this->belongsTo(User::class);
    }
}
