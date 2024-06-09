<?php

namespace App\Livewire;

use App\Events\MessageSent;
use App\Models\Chat;
use App\Models\ChatMessage;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Layout;


class PrivateChat extends Component
{
    public $userId;

    public $messageContent;
    public Chat $chat;


    public function mount($chatId)
    {
        $this->userId = Auth::id();

        $this->chat = Chat::with(['messages', 'messages.user'])->find($chatId);
    }

    public function sendMessage()
    {
        MessageSent::dispatch($this->chat, $this->userId);
    }


    public function getListeners()
    {
        return [
            "echo-private:chat.{$this->chat->id},MessageSent" => 'storeMessage',
        ];
    }

    
    public function storeMessage($event)
    {
        if ($event['userId'] === $this->userId){
            $chatMessage = new ChatMessage;

            $chatMessage->chat_id = $this->chat->id;
            $chatMessage->user_id = $this->userId;
            $chatMessage->content = $this->messageContent;
    
            $chatMessage->save();

            $this->messageContent = '';
        }
    }

    #[Layout('components.base')]
    public function render()
    {
        return view('livewire.private-chat');
    }
}
