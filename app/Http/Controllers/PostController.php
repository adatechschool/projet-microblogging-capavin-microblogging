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
    public function edit(Request $request): View
    {
        return view('post.edit', ['user' => $request->user()]);
    }
};
