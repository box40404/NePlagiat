<x-base>
    <x-slot:title>
        Профиль
    </x-slot:title>

    <x-slot:styles>
        @vite('resources/css/account/profile.css')
    </x-slot:styles>


    <div class="container">
        <div class="profile-header">
            <img src="storage\groups\4\posts\img\71yGudXO3y9avT7JdX3zoYt5m8TaCwhL9p897OTD.jpg" alt="User Avatar" class="avatar">
            <h1 class="username">John Doe</h1>
            <p class="user-bio">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sit amet felis id lacus consectetur venenatis. Ut lacinia dui vitae est fermentum, vel luctus magna ullamcorper.</p>
        </div>
        <div class="profile-info">
            <h2>Profile Information</h2>
            <ul>
                <li><strong>Email:</strong> john@example.com</li>
                <li><strong>Location:</strong> New York, USA</li>
                <li><strong>Joined:</strong> January 1, 2022</li>
            </ul>
        </div>
    </div>
    

    <x-slot:scripts>

    </x-slot:scripts>
</x-base>