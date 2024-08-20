<!-- resources/views/profile/show.blade.php -->

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
                    <p class="mt-1 text-sm text-gray-600">
                        {{ $user->biography ?? 'No biography provided.' }}
                    </p>
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
