<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;

class ChatsController extends Controller
{
    public function showChatList()
    {
        $chats = Chat::all();
        
        return view('chats.chat-list', ['chats' => $chats]);
    }
}
