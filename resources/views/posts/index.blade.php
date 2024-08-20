
    @foreach($posts as $post)
<<<<<<< HEAD
    {{-- h1 : le titre // h2 : post est relié à la table users et à sa colonne name --}}
    <h1> {{$post->title}}</h1><h2>de {{ $post->user->name }}</h2>
=======
    <h1> {{$post->title}}</h1> 
    <h2>de {{$post->user->name}}<h2>
    <h2>de {{ $post->user ? $post->user->name : 'Utilisateur inconnu' }}</h2> <!-- Gérer le cas où l'utilisateur est null -->
>>>>>>> 7e67c1c3b164b133ad6eac24260fa877dc8acfbe
    <img src={{$post->picture_url}} alt={{$post->title}}>
<p>
   
    {{$post->content}}
</p>
@endforeach
