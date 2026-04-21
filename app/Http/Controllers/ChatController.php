<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\ChatImage;
use App\Models\Listing;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index($user_id, $listing_id)
    {
        $receiver = User::findOrFail($user_id);
        $listing  = Listing::with('images')->findOrFail($listing_id);

        Chat::where('sender_id', $user_id)
            ->where('receiver_id', auth()->id())
            ->where('listing_id', $listing_id)
            ->whereNull('read_at')
            ->update(['read_at' => now()]);

        return view('chat.index', compact('receiver', 'listing'));
    }

    public function messages($user_id, $listing_id)
    {
        Chat::where('sender_id', $user_id)
            ->where('receiver_id', auth()->id())
            ->where('listing_id', $listing_id)
            ->whereNull('read_at')
            ->update(['read_at' => now()]);

        $messages = Chat::where(function ($q) use ($user_id, $listing_id) {
                $q->where('sender_id', auth()->id())
                  ->where('receiver_id', $user_id)
                  ->where('listing_id', $listing_id);
            })
            ->orWhere(function ($q) use ($user_id, $listing_id) {
                $q->where('sender_id', $user_id)
                  ->where('receiver_id', auth()->id())
                  ->where('listing_id', $listing_id);
            })
            ->with('images')
            ->orderBy('created_at', 'asc')
            ->get();

        return view('chat.messages', compact('messages'));
    }

    public function send(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'listing_id'  => 'required|exists:listings,id',
            'message'     => 'nullable|string|max:1000',
            'images.*'    => 'nullable|image|mimes:jpg,jpeg,png,gif|max:4096',
        ]);
        
        if (!$request->message && !$request->hasFile('images')) {
            return response()->json(['status' => 'error', 'message' => 'Pesan atau gambar wajib diisi'], 422);
        }

        
        $chat = Chat::create([
            'sender_id'   => auth()->id(),
            'receiver_id' => $request->receiver_id,
            'listing_id'  => $request->listing_id,
            'message'     => $request->message ?? '',
            'image'       => null, 
        ]);

        
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('chat-images', 'public');
                ChatImage::create([
                    'chat_id' => $chat->id,
                    'image_path' => $imagePath,
                ]);
            }
        }

        return response()->json(['status' => 'success']);
    }
    
    public function inbox()
    {
        $userId = auth()->id();
        $allChats = Chat::where('sender_id', $userId)
            ->orWhere('receiver_id', $userId)
            ->with(['sender', 'receiver', 'listing.images', 'images'])
            ->latest()
            ->get();
        $chats = $allChats->groupBy(function ($chat) use ($userId) {
            $otherUser = $chat->sender_id == $userId
                ? $chat->receiver_id
                : $chat->sender_id;
            return $otherUser . '_' . $chat->listing_id;
        });
        return view('chat.inbox', compact('chats'));
    }
}