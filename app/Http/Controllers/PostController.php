<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Affiche la liste des posts.
     */
    public function index(Request $request): View
    {   
        // Récupère tous les posts avec les utilisateurs associés
        $posts= Post::with('user')->latest()->get();


        return view('dashboard', ['posts' => $posts]);

    }
    
    /**
     * Affiche le formulaire d'édition.
     */
    public function edit(Request $request): View
    {
        return view('post.edit', ['user' => $request->user()]);
    }
};
