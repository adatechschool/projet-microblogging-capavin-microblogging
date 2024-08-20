
    @foreach($posts as $post)
    <h1> {{$post->title}}</h1> 
    <h2>de {{$post->user->name}}<h2>
    <h2>de {{ $post->user ? $post->user->name : 'Utilisateur inconnu' }}</h2> <!-- Gérer le cas où l'utilisateur est null -->
    <img src={{$post->picture_url}} alt={{$post->title}}>
<p>
   
    {{$post->content}}
</p>
@endforeach
