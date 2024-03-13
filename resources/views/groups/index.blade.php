<x-base>
    <x-slot:title>
        ГРуппы
    </x-slot:title>

    <x-slot:styles>
        @vite('resources/css/app.css')
    </x-slot:styles>

    <h1>Группы</h1>

    <ul>
        @foreach($groups as $group)
            <li> <a href="/groups/{{$group->id}}"> {{ $group->name }} </a> </li>
        @endforeach
    </ul>

    
    <h3> <a href="{{ Route('create_group') }}"> Создать группу </a> </h3>

    <x-slot:scripts>
        
    </x-slot:scripts>

</x-base>