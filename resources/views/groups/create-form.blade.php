<x-base>
    <x-slot:title>
        Создать группу
    </x-slot:title>

    <x-slot:styles>
        @vite('resources/css/groups/create-group.css')
    </x-slot:styles>

    <div class="container">
        <h1>Create Group</h1>
        <form action="{{ route('create_group_handler') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="group-name">Group Name:</label>
                <input type="text" id="group-name" name="name" required>
            </div>
            <div class="form-group">
                <label for="group-description">Group Description:</label>
                <textarea id="group-description" name="description" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="group-tags">Group Tags:</label>
                <input type="text" id="group-tags" name="tags" placeholder="Enter tags">
            </div>
            <div class="form-group">
                <label for="group-photo">Group Photo:</label>
                <input type="file" id="group-photo" name="img" accept="image/*" required>
            </div>
            <button type="submit">Create Group</button>
        </form>
    </div>

    <x-slot:scripts>

    </x-slot:scripts>

</x-base>