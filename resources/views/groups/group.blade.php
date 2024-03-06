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
                <li> {{ $post->comments_amount }} commentov </li>
                <li> {{ $post->reposts }} repostov </li>           
            <p> Комменты </p>
            @foreach($post->comments as $comment)
                <ul>
                    <li> {{ $comment->text }} </li>
                </ul>
            @endforeach
            </ul>
            <hr>
        @endforeach

</x-base>