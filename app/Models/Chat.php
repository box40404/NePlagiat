<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    public function members()
    {
        return $this->hasMany(ChatMember::class);
    }

    public function messages()
    {
        return $this->hasMany(ChatMessage::class);
    }
}
