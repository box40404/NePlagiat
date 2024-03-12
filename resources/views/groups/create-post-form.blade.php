<x-base>
    <x-slot:title>
        создать пост
    </x-slot:title>

    <x-slot:styles>
        @vite('resources/css/create-post.css')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    </x-slot:styles>

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

    <x-slot:scripts>
        @vite('resources/js/media-preview.js')
    </x-slot:scripts>

</x-base>