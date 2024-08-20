<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="title">Titre :</label>
        <input type="text" name="title" id="title" required>
    </div>
    <div>
        <label for="content">Contenu :</label>
        <textarea name="content" id="content" required></textarea>
    </div>
    <div>
        <label for="picture_url">URL de l'image :</label>
        <input type="text" name="picture_url" id="picture_url" required>
    </div>
    <div>
        <button type="submit">Créer le post</button>
    </div>
</form>
</x-app-layout>

