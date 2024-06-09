<x-slot:styles>
    @vite('resources/css/chats/private-chat.css')
    @vite('resources/css/components/sidebar.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</x-slot:styles>
<div class="container">
    <x-sidebar />
<div class="chat-container">
    <div class="messages-header">
        <h1>Private Messages</h1>
        <input type="text" placeholder="Search messages..." class="search-input">
    </div>
    <div class="message-list">
        @foreach ($chat->messages as $message)
            <div wire:key="{{ $message->id }}">
                <div class="message">
                    <img src="{{ $message->user->avatar }}" alt="User Avatar" class="avatar">
                    <div class="message-content">
                        <h2 class="sender">{{$message->user->name}}</h2>
                        <p class="message-text">{{$message->content}}</p>
                        <p class="timestamp">1 hour ago</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="compose-message">
        <textarea placeholder="Write a message..." class="message-input" wire:model="messageContent"></textarea>
        <button class="send-button" wire:click="sendMessage">Send</button>
    </div>
</div>
</div>