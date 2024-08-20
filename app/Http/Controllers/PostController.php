<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Post;

class PostController extends Controller
{
    public function index(Request $request): View{
        $posts= Post::all();


        return view('posts.index', compact('posts'));

    }
    public function create(): View
    {
        return view('posts.createPost');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100',
            'content' => 'required',
            'picture_url' => 'required|url|max:2048',
        ]);

        Post::create([
            'user_id' => auth()->id(),
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'picture_url' => $request->input('picture_url'),
        ]);

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }
    public function edit(Post $post)
    {
        return view('posts.editPost', compact('post'));
    }

    public function update(Request $request, Post $post)
{
    $request->validate([
        'title' => 'required|max:100',
        'content' => 'required',
        'picture_url' => 'required|url|max:2048',
    ]);

    $post->update($request->all());

    return redirect()->route('posts.index')->with('success', 'Post modifié avec succès.');
}
};
