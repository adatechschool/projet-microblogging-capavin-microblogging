<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier son post') }}
        </h2>
    </x-slot>

    <div>
    <!-- Do what you can, with what you have, where you are. - Theodore Roosevelt -->
        <div class="min-h-screen flex flex-col justify-center items-center sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

            <form method="POST" action="{{ route('posts.updatePost', $post->id) }}">
        @csrf
        @method('PUT')
            <div class="mb-4">
                                <x-input-label for="titre" :value="__('Titre')" />
                                {{-- <label for="title" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">Title:</label> --}}
                                <x-text-input id="titre" class="block mt-1 w-full" type="text" name="titre" value="{{ $post->title }}" required autofocus autocomplete="titre" />
                                {{-- <input type="text" name="title" id="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required> --}}
                            </div>

                            <div class="mb-4">
                                {{-- <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Content:</label> --}}
                                <x-input-label for="content" :value="__('Légende')" />
                                <textarea name="content" id="content" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" required>{{ $post->content }}</textarea>
                            </div>
                            
                            <div class="mb-4">
                                {{-- <label for="picture_url" class="block text-gray-700 text-sm font-bold mb-2">Picture URL:</label> --}}
                                <x-input-label for="picture_url" :value="__('URL de l\'image')" />
                                {{-- <input type="url" name="picture_url" id="picture_url" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required> --}}
                                <x-text-input id="picture_url" class="block mt-1 w-full" type="text" name="picture_url" value="{{ $post->picture_url }} required />
                            </div>

                            <x-primary-button class="ms-4">
                                {{ __('Enregistrer les modifications') }}</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>