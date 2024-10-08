<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;


class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        if ($request->user()) {
            $user = $request->user();
        } else {
            $user = null; // Ou créez un utilisateur par défaut si nécessaire
        }

        return view('profile.edit', compact('user'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    /**
     * Show the public profile of a user.
     */
    public function show($id): View
    {
        $user = User::with('posts')->findOrFail($id);

        return view('profile.show', compact('user'));
    }
/**
     * Add the biography  of a user.
     */
    public function editBiography(User $user)
    {
        return view('profile.edit-biography', compact('user'));
    }

    public function updateBiography(Request $request, User $user)
    {
        $request->validate([
            'biography' => 'required|string|max:255',
        ]);

        $user->biography = $request->input('biography');
        $user->save();

        return redirect()->route('profile.show', $user->id)->with('success', 'Biography updated successfully.');
}
}