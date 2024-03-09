<x-base>
    <x-slot:title>
        создать пост
    </x-slot:title>

    <section class="add-post-container">
        <h2>Add a New Post</h2>
        <form id="add-post-form" action="{{ Route('create_post_handler', ['id' => $group_id]) }}" method="post">
            @csrf
            <div class="form-group">
                <label for="post-content">Content:</label>
                <textarea id="post-content" name="text" rows="4" required></textarea>
            </div>
            <button type="submit">Submit</button>
        </form>
    </section>

</x-base>