<x-base>
    <x-slot:title>
        {{ $group->name }}
    </x-slot:title>

    <h1> {{ $group->name }} </h1>

    <p> Описание: {{ $group->description }} </p>
    <p> Тэги: {{ $group->tags }} </p>
    <p> Посты: </p>         <a href="{{ Route('create_post', ['id' => $group->id]) }}" > <h3> Создать пост </h3> </a>

        @foreach($group->posts as $post)
            <ul>
                <li> {{ $post->text }} </li>
                <li> {{ $post->likes }} лайков </li>
                <li> {{ $post->comments_amount }} commentov </li>
                <li> {{ $post->reposts }} repostov </li>           
            <p> Комменты </p>
            <form action="{{ Route('create_comment', ['group_id' => $group->id, 'post_id' => $post->id]) }}" method="post">
                @csrf
                <input type="text" name="text" placeholder="text">
                <input type="submit" value="=>">
            </form>
            @foreach($post->comments as $comment)
                <ul>
                    <li> {{ $comment->text }} </li>
                </ul>
            @endforeach
            </ul>
            <hr>
        @endforeach


</x-base>