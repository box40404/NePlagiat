<x-base>
    <x-slot:title>
        ГРуппы
    </x-slot:title>

    <x-slot:style>
        @vite('resources/css/app.css')
    </x-slot:style>

    <h1>Группы</h1>

    <ul>
        @foreach($groups as $group)
            <li> <a href="/groups/{{$group->id}}"> {{ $group->name }} </a> </li>
        @endforeach
    </ul>

    
    <h3> <a href="{{ Route('create_group') }}"> Создать группу </a> </h3>

</x-base>