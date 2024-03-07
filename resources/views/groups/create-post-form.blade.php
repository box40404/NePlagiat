<x-base>
    <x-slot:title>
        создать пост
    </x-slot:title>

    <form action="{{ Route('create_post_handler', ['id' => $group_id]) }}" method="post">
        @csrf
        <input type="text" name="text" placeholder="text">
        <input type="submit" value="создать">
    </form>
</x-base>