<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Listing;
use App\Models\Favorite;

class ProfileController extends Controller
{

    public function index(): View
    {
        return view('profile.index', [
            'user' => Auth::user()
        ]);
    }

    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        $user->fill($request->validated());

        $user->phone = $request->phone;
        $user->bio = $request->bio;
        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $path;
        }

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('profile')->with('status', 'profile-updated');
    }

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

    public function myListing()
    {
        $listings = Listing::where('user_id', auth()->id())
            ->with('images')
            ->latest()
            ->get();

        return view('profile.my-listing', compact('listings'));
    }
    public function myFavorite()
    {
        $favorites = Favorite::where('user_id', auth()->id())
            ->with('listing.images')
            ->latest()
            ->get();

        return view('profile.favorites', compact('favorites'));
    }
}