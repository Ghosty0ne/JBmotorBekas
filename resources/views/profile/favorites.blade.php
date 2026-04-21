<x-app-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&display=swap');

        .favorites-page * {
            font-family: 'Outfit', sans-serif;
        }

        .fav-card {
            transition: transform 0.2s, box-shadow 0.2s;
            border: 1px solid 
        }

        .fav-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 16px 32px rgba(0, 0, 0, 0.08);
        }

        .fav-card .card-img {
            transition: transform 0.35s ease;
        }

        .fav-card:hover .card-img {
            transform: scale(1.04);
        }
    </style>

    <div class="favorites-page min-h-screen bg-slate-100 py-8">
        <div class="max-w-5xl mx-auto px-4">

            <div class="mb-6">
                <a href="{{ route('profile') }}"
                    class="inline-flex items-center gap-1 text-blue-600 text-sm font-medium hover:underline">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Profil
                </a>
                <h1 class="text-2xl font-extrabold text-gray-900 mt-1">Motor Favorit</h1>
                <p class="text-gray-500 text-sm">{{ $favorites->count() }} motor yang kamu suka</p>
            </div>

            @if($favorites->count() == 0)
                <div class="bg-white rounded-2xl shadow-sm p-16 text-center border border-gray-100">
                    <div class="text-6xl mb-4">❤️</div>
                    <h3 class="text-lg font-bold text-gray-600">Belum ada favorit</h3>
                    <p class="text-gray-400 text-sm mt-1">Like motor yang kamu suka dari halaman utama</p>
                    <a href="{{ route('listing.index') }}"
                        class="mt-5 inline-block bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-bold text-sm transition-colors">
                        Jelajahi Motor
                    </a>
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">
                    @foreach($favorites as $fav)
                        @if($fav->listing)
                            <div class="fav-card bg-white rounded-2xl overflow-hidden shadow-sm">
                                <a href="{{ route('listing.show', $fav->listing->id) }}" class="block relative overflow-hidden"
                                    style="height:180px;">
                                    @if($fav->listing->images->count())
                                        <img src="{{ asset('storage/' . $fav->listing->images->first()->image) }}"
                                            class="card-img w-full h-full object-cover">
                                    @else
                                        <div
                                            class="w-full h-full bg-gradient-to-br from-blue-50 to-slate-100 flex items-center justify-center text-4xl">
                                            🏍️</div>
                                    @endif
                                    <div class="absolute top-3 left-3">
                                        <span
                                            class="text-[11px] font-bold px-2.5 py-1 rounded-full bg-white/90 text-blue-700 shadow-sm">
                                            {{ $fav->listing->category }}
                                        </span>
                                    </div>
                                    <div
                                        class="absolute top-3 right-3 bg-red-500 text-white w-7 h-7 rounded-full flex items-center justify-center shadow-md">
                                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                        </svg>
                                    </div>
                                </a>
                                <div class="p-4">
                                    <p class="text-blue-600 font-extrabold text-base">Rp {{ number_format($fav->listing->price) }}
                                    </p>
                                    <h2 class="font-bold text-gray-800 truncate mt-0.5 text-sm">{{ $fav->listing->title }}</h2>
                                    <p class="text-xs text-gray-400 mt-1">{{ number_format($fav->listing->mileage) }} km ·
                                        {{ $fav->listing->year }}</p>
                                    <p class="text-xs text-gray-400 truncate mt-0.5">📍 {{ $fav->listing->location }}</p>

                                    <div class="flex gap-2 mt-3 pt-3 border-t border-gray-100">
                                        <a href="{{ route('listing.show', $fav->listing->id) }}"
                                            class="flex-1 text-center bg-blue-600 hover:bg-blue-700 text-white text-xs py-2 rounded-xl font-bold transition-colors">
                                            Lihat Detail
                                        </a>
                                        @if(auth()->id() != $fav->listing->user_id)
                                            <a href="{{ route('chat.index', [$fav->listing->user_id, $fav->listing->id]) }}"
                                                class="flex-1 text-center bg-green-500 hover:bg-green-600 text-white text-xs py-2 rounded-xl font-bold transition-colors">
                                                💬 Chat
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>