<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $user->name }}'s Profile
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h3 class="text-lg font-medium text-gray-900">
                        Biography
                    </h3>
                    <p class="mt-1 text-sm text-gray-600" id="biography-text">
                        {{ $user->biography ?? 'No biography provided.' }}
                    </p>
                    @if(auth()->user() && auth()->user()->id === $user->id)
                        <x-primary-button id="edit-biography-button" class="mt-4">
                            {{ __('Modifier') }}
                        </x-primary-button>
                        <form id="biography-form" action="{{ route('profile.updateBiography', $user->id) }}" method="POST" style="display: none;">
                            @csrf
                            <textarea id="biography-input" name="biography" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ $user->biography ?? '' }}</textarea>
                            @error('biography')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <x-primary-button type="submit" class="mt-4">
                                {{ __('Enregistrer les modifications') }}
                            </x-primary-button>
                        </form>
                    @endif
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h3 class="text-lg font-medium text-gray-900">
                        Posts
                    </h3>
                    @forelse ($user->posts as $post)
                        <div class="mt-4">
                            <h4 class="text-md font-semibold text-gray-800">{{ $post->title }}</h4>
                            <img src="{{ $post->picture_url }}" alt="{{ $post->title }}" class="w-full h-auto mt-2">
                            <p class="mt-2 text-sm text-gray-600">{{ $post->content }}</p>
                        </div>
                    @empty
                        <p class="mt-1 text-sm text-gray-600">No posts available.</p>
                    @endforelse
                    @if(auth()->user() && auth()->user()->id === $user->id)
                        <a href="{{ route('posts.editPost', $post->id) }}" class="btn btn-primary mt-4">
                            <x-primary-button class="ms-4">
                                {{ __('Modifier') }}
                            </x-primary-button>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('edit-biography-button').addEventListener('click', function() {
            document.getElementById('biography-text').style.display = 'none';
            document.getElementById('edit-biography-button').style.display = 'none';
            document.getElementById('biography-form').style.display = 'block';
        });
    </script>
</x-app-layout>
