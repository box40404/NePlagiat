<x-base>
    <x-slot:styles>
        @vite('resources/css/chats/chat-list.css')
        @vite('resources/css/components/sidebar.css')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    </x-slot>

   
    <div class="container">
      <x-sidebar />
        <main class="main-content">
            <section class="chat-list">
                <h2>Chat List</h2>
                @foreach ($chats as $chat)
                    <div class="chat-item">
                        <img src="user-avatar.jpg" alt="User Avatar">
                        <div class="chat-info">
                            <a href="{{ route('chat', ['chatId' => $chat->id]) }}"> <p class="chat-name">Friend Name</p> </a>
                            <p class="last-message">Last message text here</p>
                        </div>
                    </div>
                @endforeach
            </section>
        </main>
    </div>
 
</x-base>