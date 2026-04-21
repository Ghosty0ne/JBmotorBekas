<x-app-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&display=swap');

        .my-listing-page * {
            font-family: 'Outfit', sans-serif;
        }

        .listing-card {
            transition: transform 0.2s, box-shadow 0.2s;
            border: 1px solid #e5e7eb;
        }

        .listing-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 16px 32px rgba(0, 0, 0, 0.08);
        }
    </style>

    <div class="my-listing-page min-h-screen bg-slate-100 py-8">
        <div class="max-w-5xl mx-auto px-4">

            <div class="flex items-center justify-between mb-6">
                <div>
                    <a href="{{ route('profile') }}"
                        class="inline-flex items-center gap-1 text-blue-600 text-sm font-medium hover:underline">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                        Profil
                    </a>
                    <h1 class="text-2xl font-extrabold text-gray-900 mt-1">Iklan Saya</h1>
                    <p class="text-gray-500 text-sm">{{ $listings->count() }} motor dipasarkan</p>
                </div>

            </div>

            @if($listings->count() == 0)
                <div class="bg-white rounded-2xl shadow-sm p-16 text-center border border-gray-100">
                    <div class="text-6xl mb-4">📦</div>
                    <h3 class="text-lg font-bold text-gray-600">Belum ada iklan</h3>
                    <p class="text-gray-400 text-sm mt-1">Pasang iklan motormu sekarang!</p>
                    <a href="{{ route('listing.create') }}"
                        class="mt-5 inline-block bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-bold text-sm transition-colors">
                        + Buat Postingan
                    </a>
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                    @foreach($listings as $listing)
                        <div class="listing-card bg-white rounded-2xl overflow-hidden shadow-sm">
                            <div class="relative overflow-hidden" style="height:180px;">
                                @if($listing->images->count())
                                    <img src="{{ asset('storage/' . $listing->images->first()->image) }}"
                                        class="w-full h-full object-cover">
                                @else
                                    <div
                                        class="w-full h-full bg-gradient-to-br from-blue-50 to-slate-100 flex items-center justify-center text-4xl">
                                        🏍️</div>
                                @endif
                                <div class="absolute top-3 left-3">
                                    <span
                                        class="text-[11px] font-bold px-2.5 py-1 rounded-full bg-white/90 text-blue-700 shadow-sm">
                                        {{ $listing->category }}
                                    </span>
                                </div>
                            </div>
                            <div class="p-4">
                                <p class="text-blue-600 font-extrabold text-base">Rp {{ number_format($listing->price) }}</p>
                                <h2 class="font-bold text-gray-800 truncate mt-0.5">{{ $listing->title }}</h2>
                                <p class="text-xs text-gray-400 mt-1">
                                    {{ number_format($listing->mileage) }} km · {{ $listing->year }} · 📍
                                    {{ $listing->location }}
                                </p>
                                <div class="flex items-center gap-3 text-xs text-gray-400 mt-2">
                                    <span class="flex items-center gap-1">❤️ {{ $listing->favorites->count() }}</span>
                                    <span class="flex items-center gap-1">💬 {{ $listing->comments->count() }}</span>
                                </div>
                                <div class="flex gap-2 mt-3 pt-3 border-t border-gray-100">
                                    <a href="{{ route('listing.show', $listing->id) }}"
                                        class="flex-1 text-center bg-gray-100 hover:bg-gray-200 text-gray-700 text-xs py-2 rounded-xl font-medium transition-colors">
                                        Lihat
                                    </a>
                                    <a href="{{ route('listing.edit', $listing->id) }}"
                                        class="flex-1 text-center bg-amber-400 hover:bg-amber-500 text-white text-xs py-2 rounded-xl font-medium transition-colors">
                                        Edit
                                    </a>
                                    <form action="{{ route('listing.destroy', $listing->id) }}" method="POST"
                                        onsubmit="return confirm('Hapus iklan ini?')">
                                        @csrf @method('DELETE')
                                        <button
                                            class="bg-red-50 hover:bg-red-100 border border-red-200 text-red-500 text-xs px-3 py-2 rounded-xl font-medium transition-colors">
                                            🗑️
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>