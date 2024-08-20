<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route non protégée pour la page de profil
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

// Afficher le profil d'un utilisateur
Route::get('/profiles/{id}', [ProfileController::class, 'show'])->name('profile.show');

// Routes protégées par le middleware auth
Route::middleware('auth')->group(function () {
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/posts/create', [PostController::class, 'create'])->name('createPost');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.editPost');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.updatePost');

require __DIR__.'/auth.php';
