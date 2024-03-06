<x-base>
    <x-slot:title>
        Создать группу
    </x-slot:title>

    <form action="{{ Route('create_group_handler') }}" method="post">
        @csrf
        <label for="name">
            Название
            <p> <input type="text" name="name"> </p>
        </label>

        <label for="description">
            Описание
            <p> <input type="text" name="description"> </p>
        </label>

        <label for="tags">
            Тэги
            <p> <input type="text" name="tags"> </p>
        </label>

        <p> <input type="submit" value="Создать"> </p>
    </form>
</x-base>