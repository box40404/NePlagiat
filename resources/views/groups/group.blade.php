<x-base>
    <x-slot:title>
        {{ $group->name }}
    </x-slot:title>

    <h1> {{ $group->name }} </h1>

    <p> Описание: {{ $group->description }} </p>
    <p> Тэги: {{ $group->tags }} </p>
    <p> Посты: </p>

        @foreach($group->posts as $post)
            <ul>
                <li> {{ $post->text }} </li>
                <li> {{ $post->likes }} лайков </li>
                <li> {{ $post->comments }} commentov </li>
                <li> {{ $post->reposts }} repostov </li>
            </ul>
        @endforeach

</x-base>