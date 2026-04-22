<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">
    @forelse($listings as $listing)
        <div class="listing-card bg-white rounded-2xl overflow-hidden shadow-sm">
            <a href="{{ route('listing.show', $listing->id) }}" class="block relative overflow-hidden"
                style="height:180px;">
                @if($listing->images->count())
                    <img src="{{ $listing->images->first()->image }}"
                        class="card-img w-full h-full object-cover">
                @else
                    <div class="no-image-placeholder w-full h-full flex flex-col items-center justify-center">
                        <span class="text-4xl mb-1">🏍️</span>
                        <span class="text-xs text-blue-400 font-medium">Belum ada foto</span>
                    </div>
                @endif
                <div class="absolute top-3 left-3">
                    <span
                        class="text-[11px] font-bold px-2.5 py-1 rounded-full bg-white/90 backdrop-blur-sm text-blue-700 shadow-sm border border-white/60">
                        {{ $listing->category }}
                    </span>
                </div>
                @if($listing->favorites->count() > 0)
                    <div
                        class="absolute top-3 right-3 bg-white/90 backdrop-blur-sm rounded-full px-2 py-1 flex items-center gap-1 shadow-sm">
                        <span class="text-xs">❤️</span>
                        <span class="text-[11px] font-bold text-gray-700">{{ $listing->favorites->count() }}</span>
                    </div>
                @endif
            </a>
            <div class="p-4">
                <a href="{{ route('listing.show', $listing->id) }}" class="block">
                    <p class="text-blue-600 font-extrabold text-lg leading-none mb-1">
                        Rp {{ number_format($listing->price) }}
                    </p>
                    <h2 class="font-bold text-gray-800 text-sm leading-snug mb-2.5 line-clamp-2" style="min-height:2.5rem;">
                        {{ $listing->title }}
                    </h2>
                    <div class="flex flex-wrap gap-1.5 mb-2.5">
                        <span class="stat-chip">📅 {{ $listing->year }}</span>
                        <span class="stat-chip">⚙️ {{ $listing->engine_cc }}cc</span>
                        <span class="stat-chip">🛣️ {{ number_format($listing->mileage) }} km</span>
                    </div>
                    <p class="text-xs text-gray-400 font-medium truncate">📍 {{ $listing->location }}</p>
                </a>
                @auth
                    @if(auth()->id() != $listing->user_id)
                        <a href="{{ route('chat.index', [$listing->user_id, $listing->id]) }}"
                            class="chat-btn mt-3 flex items-center justify-center gap-1.5 text-white text-xs font-bold py-2.5 rounded-xl w-full">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                            Chat Penjual
                        </a>
                    @else
                        <a href="{{ route('listing.edit', $listing->id) }}"
                            class="mt-3 flex items-center justify-center gap-1.5 text-yellow-700 text-xs font-bold py-2.5 rounded-xl w-full bg-yellow-50 border border-yellow-200 hover:bg-yellow-100 transition-colors">
                            ✏️ Edit Iklan
                        </a>
                    @endif
                @endauth
                @guest
                    <a href="{{ route('login') }}"
                        class="mt-3 flex items-center justify-center text-xs font-bold py-2.5 rounded-xl w-full bg-gray-50 border border-gray-200 text-gray-500 hover:bg-gray-100 transition-colors">
                        Login untuk Chat
                    </a>
                @endguest
            </div>
        </div>
    @empty
        <div class="col-span-full py-20 text-center">
            <div class="text-6xl mb-4">🔍</div>
            <p class="text-gray-700 font-bold text-lg">Tidak ada motor ditemukan</p>
            <p class="text-gray-400 text-sm mt-1">Coba kata kunci atau kategori lain</p>
            @auth
                <a href="{{ route('listing.create') }}"
                    class="inline-block mt-5 bg-blue-600 text-white text-sm font-bold px-6 py-3 rounded-xl hover:bg-blue-700 transition-colors">
                    + Posting Motor Sekarang
                </a>
            @endauth
        </div>
    @endforelse
</div>

@if($listings->hasPages())
    <div class="mt-8 flex justify-center">{{ $listings->links() }}</div>
@endif