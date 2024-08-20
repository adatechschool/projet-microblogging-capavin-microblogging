<div>
    <!-- Do what you can, with what you have, where you are. - Theodore Roosevelt -->
    <form method="POST" action="{{ route('posts.updatePost', $post->id) }}">
    @csrf
    @method('PUT')

    <div class="mb-4">
                            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                            <input type="text" name="title" id="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>

                        <div class="mb-4">
                            <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Content:</label>
                            <textarea name="content" id="content" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required></textarea>
                        </div>
                        
                        <div class="mb-4">
                            <label for="picture_url" class="block text-gray-700 text-sm font-bold mb-2">Picture URL:</label>
                            <input type="url" name="picture_url" id="picture_url" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>

    <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
</form>
</div>
