<x-base>
    <x-slot:title>
        ГРуппы
    </x-slot:title>

    <h1>Группы</h1>

    <ul>
        @foreach($groups as $group)
            <li> <a href="/groups/{{$group->id}}"> {{ $group->name }} </a> </li>
        @endforeach
    </ul>
</x-base>