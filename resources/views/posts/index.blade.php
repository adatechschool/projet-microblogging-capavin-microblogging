
    @foreach($posts as $post)
    <h1> {{$post->title}}</h1> <h2>de {{$post->user->name}}<h2>
    <img src={{$post->picture_url}} alt={{$post->title}}>
<p>
   
    {{$post->content}}
</p>
@endforeach
