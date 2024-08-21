<div class="mt-4 py-12 max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div>
        @foreach($posts as $post)
            <div class="mb-8">
                <div class="flex justify-between items-center">
                    <h1 class="text-lg font-bold">{{ $post->title }}</h1>
                    <h2 class="text-sm text-gray-600">de <a href="{{ route('profile.show', $post->user->id) }}" >{{ $post->user->name }}</a></h2>
                </div>


                
                {{-- Conteneur relatif pour l'image et le texte --}}
                <div class="relative group">
                    {{-- Affichage de l'image associée au post --}}
                    <img src="{{ $post->picture_url }}" alt="{{ $post->title }}" class="w-full mx-auto my-4">

                    {{-- Affichage du contenu du post --}}
                    <div class="absolute inset-0 flex items-center justify-center bg-white bg-opacity-75 opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                        <p class="p-4">{{ $post->content }}</p>
                    </div>                
                </div>    
                {{-- Verifie si l'utilisateur connecté est l'auteur du post --}}
                @if(auth()->user() && auth()->user()->id === $post->user->id)
                <a href="{{ route('posts.editPost', $post->id) }}" class="btn btn-primary">Modifier</a>
           @endif
            </div>
        @endforeach
    </div>
</div>
