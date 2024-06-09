<x-base>
    <x-slot:title>
        ГРуппы
    </x-slot:title>

    <x-slot:styles>
        @vite('resources/css/groups/index.css')
        @vite('resources/css/components/sidebar.css')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    </x-slot:styles>


    <div class="container">
        <x-sidebar />

        <main class="main-content">
            <section class="search-bar">
                <input type="text" id="search-input" placeholder="Search for groups...">
                <button id="search-btn"><i class="fas fa-search"></i></button>
            </section>
            <section class="group-list">
                <h2>Groups</h2>
                @foreach ($groups as $group)
                    <div class="group">
                        <img src="{{$group->img}}" alt="Group Avatar" class="group-avatar">
                        <div class="group-info">
                            <a href="{{ route('group_page', ['id' => $group->id]) }}"> <h3 class="group-name">{{$group->name}}</h3> </a>
                            <p class="group-tags">{{$group->tags}}</p>
                            <p class="group-members">{{$group->followers}}</p>
                        </div>
                    </div>
                @endforeach
            </section>

            <h3> <a href="{{ Route('create_group') }}"> Создать группу </a> </h3>
            
        </main>
    </div>


    <x-slot:scripts>
        @vite('resources/js/search-groups.js')
    </x-slot:scripts>

</x-base>