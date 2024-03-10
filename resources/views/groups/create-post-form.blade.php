<x-base>
    <x-slot:title>
        создать пост
    </x-slot:title>

    <x-slot:style>
        @vite('resources/css/create-post.css')
    </x-slot:style>

    <section class="add-post-container">
        <h2>Add a New Post</h2>
        <form id="add-post-form" enctype="multipart/form-data" action="{{ Route('create_post_handler', ['id' => $group_id]) }}" method="post">
            @csrf
            <div class="form-group">
                <label for="post-content">Content:</label>
                <textarea id="post-content" name="text" rows="4" required></textarea>
            </div>
            <div class="file-upload">
                <label for="file-input">
                    <i class="fas fa-camera"></i>
                </label>
                <input type="file" id="file-input" name="img[]" multiple>
                <div class="selected-photo" id="selected-photos"></div>
            </div>

            <button type="submit">Submit</button>
        </form>
    </section>

</x-base>