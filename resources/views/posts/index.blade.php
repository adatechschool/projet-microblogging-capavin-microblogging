
    @foreach($posts as $post)
    <h1> {{$post->title}}</h1>
    <img src={{$post->picture_url}} alt={{$post->title}}>
<p>
    {{$post->content}}
</p>
@endforeach
