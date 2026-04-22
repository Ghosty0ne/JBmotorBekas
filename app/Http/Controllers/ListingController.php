<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Favorite;
use App\Models\Listing;
use App\Models\ListingImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ListingController extends Controller
{
    private function uploadToCloudinary($filePath)
    {
        $cloudName = env('CLOUDINARY_CLOUD_NAME');
        $apiKey = env('CLOUDINARY_API_KEY');
        $apiSecret = env('CLOUDINARY_API_SECRET');
        $timestamp = time();
        $folder = 'jbmotorbekas/listings';

        $signature = sha1("folder={$folder}&timestamp={$timestamp}{$apiSecret}");

        $response = Http::attach(
            'file', file_get_contents($filePath), basename($filePath)
        )->post("https://api.cloudinary.com/v1_1/{$cloudName}/image/upload", [
            'api_key' => $apiKey,
            'timestamp' => $timestamp,
            'signature' => $signature,
            'folder' => $folder,
        ]);

        return $response->json()['secure_url'] ?? null;
    }

    public function index(Request $request)
    {
        $query = Listing::with(['images', 'favorites']);

        if ($request->search) {
            $query->where('title', 'like', '%'.$request->search.'%');
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
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'price' => 'required|numeric',
            'year' => 'required|numeric',
            'engine_cc' => 'required|numeric',
            'mileage' => 'required|numeric',
            'description' => 'required|string',
            'location' => 'required|string',
            'images.*' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $listing = Listing::create([
            'title' => $request->title,
            'price' => $request->price,
            'year' => $request->year,
            'mileage' => $request->mileage,
            'engine_cc' => $request->engine_cc,
            'location' => $request->location,
            'category' => $request->category,
            'description' => $request->description,
            'user_id' => auth()->id(),
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $url = $this->uploadToCloudinary($image->getRealPath());
                if ($url) {
                    ListingImage::create([
                        'listing_id' => $listing->id,
                        'image' => $url,
                    ]);
                }
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
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'price' => 'required|numeric',
            'year' => 'required|numeric',
            'engine_cc' => 'required|numeric',
            'mileage' => 'required|numeric',
            'description' => 'required|string',
            'location' => 'required|string',
            'images.*' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $listing->update($validated);

        if ($request->hasFile('images')) {
            $listing->images()->delete();

            foreach ($request->file('images') as $image) {
                $url = $this->uploadToCloudinary($image->getRealPath());
                if ($url) {
                    ListingImage::create([
                        'listing_id' => $listing->id,
                        'image' => $url,
                    ]);
                }
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
        if (! auth()->check()) {
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
                'user_id' => auth()->id(),
                'listing_id' => $id,
            ]);

            return response()->json(['status' => 'liked']);
        }
    }

    public function getComments($id)
    {
        $comments = Comment::where('listing_id', $id)
            ->with('user')
            ->latest()
            ->get();

        return response()->json($comments->map(function ($c) {
            return [
                'id' => $c->id,
                'content' => $c->content,
                'time' => $c->created_at->diffForHumans(),
                'user' => ['name' => $c->user->name],
            ];
        }));
    }

    public function comment(Request $request, $id)
    {
        if (! auth()->check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $request->validate([
            'content' => 'required|string|max:500',
        ]);

        $comment = Comment::create([
            'user_id' => auth()->id(),
            'listing_id' => $id,
            'content' => $request->content,
        ]);

        $comment->load('user');

        return response()->json($comment);
    }
}
