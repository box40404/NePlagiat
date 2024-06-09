<div class="container">
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

        <!-- More messages can be added here -->
    </div>
    <div class="compose-message">
        <textarea placeholder="Write a message..." class="message-input" wire:model="messageContent"></textarea>
        <button class="send-button" wire:click="sendMessage">Send</button>
    </div>
</div>