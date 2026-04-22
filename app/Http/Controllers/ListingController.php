<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use App\Models\Favorite;
use App\Models\ListingImage;
use App\Models\Comment;

class ListingController extends Controller
{
    public function index(Request $request)
    {
        $query = Listing::with(['images', 'favorites']);

        if ($request->search) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->category) {
            $query->where('category', $request->category);
        }

        $listings = $query->latest()->paginate(10);

        $favoriteIds = auth()->check()
            ? Favorite::where('user_id', auth()->id())->pluck('listing_id')->toArray()
            : [];

        return view('listing.index', compact('listings', 'favoriteIds'));
    }

    public function create()
    {
        return view('listing.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'category'    => 'required|string',
            'price'       => 'required|numeric',
            'year'        => 'required|numeric',
            'engine_cc'   => 'required|numeric',
            'mileage'     => 'required|numeric',
            'description' => 'required|string',
            'location'    => 'required|string',
            'images.*'    => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $listing = Listing::create([
            'title'       => $request->title,
            'price'       => $request->price,
            'year'        => $request->year,
            'mileage'     => $request->mileage,
            'engine_cc'   => $request->engine_cc,
            'location'    => $request->location,
            'category'    => $request->category,
            'description' => $request->description,
            'user_id'     => auth()->id(),
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $uploaded = cloudinary()->upload($image->getRealPath(), [
                    'folder' => 'jbmotorbekas/listings'
                ]);
                ListingImage::create([
                    'listing_id' => $listing->id,
                    'image'      => $uploaded->getSecurePath(),
                ]);
            }
        }

        return redirect()->route('listing.index');
    }

    public function show($id)
    {
        $listing = Listing::with(['user', 'images', 'favorites'])->findOrFail($id);

        $comments = Comment::where('listing_id', $id)
            ->with('user')
            ->latest()
            ->get();

        $favoriteIds = auth()->check()
            ? Favorite::where('user_id', auth()->id())->pluck('listing_id')->toArray()
            : [];

        return view('listing.show', compact('listing', 'comments', 'favoriteIds'));
    }

    public function edit($id)
    {
        $listing = Listing::with('images')->findOrFail($id);

        if ($listing->user_id !== auth()->id()) {
            abort(403);
        }

        return view('listing.edit', compact('listing'));
    }

    public function update(Request $request, $id)
    {
        $listing = Listing::findOrFail($id);

        if ($listing->user_id !== auth()->id()) {
            abort(403);
        }

        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'category'    => 'required|string',
            'price'       => 'required|numeric',
            'year'        => 'required|numeric',
            'engine_cc'   => 'required|numeric',
            'mileage'     => 'required|numeric',
            'description' => 'required|string',
            'location'    => 'required|string',
            'images.*'    => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $listing->update($validated);

        if ($request->hasFile('images')) {
            $listing->images()->delete();

            foreach ($request->file('images') as $image) {
                $uploaded = cloudinary()->upload($image->getRealPath(), [
                    'folder' => 'jbmotorbekas/listings'
                ]);
                ListingImage::create([
                    'listing_id' => $listing->id,
                    'image'      => $uploaded->getSecurePath(),
                ]);
            }
        }

        return redirect()->route('listing.show', $listing->id)
            ->with('success', 'Listing berhasil diupdate!');
    }

    public function destroy($id)
    {
        $listing = Listing::findOrFail($id);

        if ($listing->user_id !== auth()->id()) {
            abort(403);
        }

        $listing->delete();

        return redirect()->route('listing.index');
    }

    public function like($id)
    {
        if (!auth()->check()) {
            return response()->json(['status' => 'unauthorized'], 401);
        }

        $like = Favorite::where('user_id', auth()->id())
            ->where('listing_id', $id)
            ->first();

        if ($like) {
            $like->delete();
            return response()->json(['status' => 'unliked']);
        } else {
            Favorite::create([
                'user_id'    => auth()->id(),
                'listing_id' => $id,
            ]);
            return response()->json(['status' => 'liked']);
        }
    }

    public function comment(Request $request, $id)
    {
        if (!auth()->check()) return back();

        $request->validate([
            'content' => 'required|string|max:500',
        ]);

        Comment::create([
            'user_id'    => auth()->id(),
            'listing_id' => $id,
            'content'    => $request->content,
        ]);

        return back();
    }
}
