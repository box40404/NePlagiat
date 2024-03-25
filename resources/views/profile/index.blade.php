<x-base>
    <x-slot:title>
        Профиль
    </x-slot:title>

    <x-slot:styles>
        @vite('resources/css/account/profile.css')
    </x-slot:styles>


    <div class="container">
        <div class="profile-header">
            <livewire:upload-user-avatar :user="$user" />
            <h1 class="username">{{$user->name}}</h1>
            <p class="user-bio">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sit amet felis id lacus consectetur venenatis. Ut lacinia dui vitae est fermentum, vel luctus magna ullamcorper.</p>
        </div>
        <div class="profile-info">
            <h2>Profile Information</h2>
            <ul>
                <li><strong>Email:</strong> {{$user->email}}</li>
                <li><strong>Location:</strong> New York, USA</li>
                <li><strong>Joined:</strong> {{$user->created_at}}</li>
            </ul>
        </div>
    </div>
    
</x-base>