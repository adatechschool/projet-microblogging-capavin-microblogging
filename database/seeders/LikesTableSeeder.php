<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Like;
use App\Models\Likes;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Récupérer tous les utilisateurs et les posts
        $users = User::all();
        $posts = Post::all();

        // Parcourir les utilisateurs et les posts pour créer des likes
        foreach ($users as $user) {
            foreach ($posts as $post) {
                // Créer un like pour chaque combinaison utilisateur-post
                Likes::create([
                    'user_id' => $user->id,
                    'post_id' => $post->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
