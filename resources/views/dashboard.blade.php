<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @auth
        <x-logged-in-message />
    @endauth

    {{-- resources/views/dashboard.blade.php --}}
    <x-posts :posts="$posts" />

</x-app-layout>
