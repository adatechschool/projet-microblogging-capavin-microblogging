<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Likes;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
class LikesController extends Controller
{
    // Action pour liker un post
    public function likes(Post $post)
    {
        // Vérifier si l'utilisateur a déjà liké le post
        $like = Likes::where('user_id', Auth::id())->where('post_id', $post->id)->first();
        if (!$like) {
            // Créer un nouveau like
            Likes::create([
                'user_id' => Auth::id(),
                'post_id' => $post->id,
            ]);
        }
        // Rediriger vers la page des posts
        return redirect()->route('posts.index');
    }
    // Action pour annuler un like
    public function unlike(Post $post)
    {
        // Trouver le like de l'utilisateur pour ce post
        $like = Likes::where('user_id', Auth::id())->where('post_id', $post->id)->first();
        if ($like) {
            // Supprimer le like
            $like->delete();
        }
        // Rediriger vers la page des posts
        return redirect()->route('posts.index');
    }
}