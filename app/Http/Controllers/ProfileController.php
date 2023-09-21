<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use App\Models\Comment;



class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function show($id)
    {
        $profile = User::findOrFail($id);
        return view('profiles.show', compact('profile'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'profile_picture' => 'required|image|max:2048',
        ]);

        $filename = $request->file('profile_picture')->store('profiles', 'public');

        $user = Auth::user();
        $user->profile_picture = $filename;
        $user->save();

        return redirect()->back()->with('message', 'Profile picture updated!');
    }

    public function kensaku($area = null)
    {
        if ($area == 'すべて' || $area == null) {
            $users = User::all();
        } else {
            $users = User::where('area', $area)->get();
        }

        return view('kensaku', ['users' => $users, 'selectedArea' => $area]);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $request->user()->id,
            'picture' => 'nullable|image|max:2048',
            'explain' => 'nullable|string|max:300',
            'area' => 'nullable|in:east,west,islands',
            'sns' => 'nullable|string|max:100',
        ]);

        if ($request->hasFile('picture')) {
            $oldPicture = $request->user()->picture;
            if ($oldPicture) {
                Storage::delete('public/' . $oldPicture);
            }

            $path = $request->file('picture')->store('public/profiles');
            $validatedData['picture'] = str_replace('public/', '', $path);
        }

        $request->user()->fill($validatedData);

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
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function rokomitoukou($userId)
    {
        $profile = User::findOrFail($userId);
        return view('rokomitoukou', ['userId' => $userId, 'profile' => $profile]);
    }

    public function rokomimiru($userId)
    {
        if (!auth()->check() && $userId == 'guest') {
            $profile = User::where('email', 'guest@example.com')->first();
        } else {
            $profile = User::findOrFail($userId);
        }

        return view('rokomimiru', ['userId' => $userId, 'profile' => $profile]);
    }

   
}
