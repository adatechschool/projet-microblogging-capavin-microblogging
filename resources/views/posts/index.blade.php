<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Accueil') }}
        </h2>
    </x-slot>
@foreach($posts as $post)
    <h1> {{$post->title}}</h1>
    <img src={{$post->picture_url}} alt={{$post->title}}>
<p> 
    {{$post->content}}
</p>
<a href="{{ route('posts.editPost', $post->id) }}" class="btn btn-primary">Modifier</a>
@endforeach
</x-app-layout>