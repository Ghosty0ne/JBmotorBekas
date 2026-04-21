<x-app-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&display=swap');

        .profile-page * {
            font-family: 'Outfit', sans-serif;
        }

        .menu-item {
            transition: background 0.15s;
        }

        .menu-item:hover {
            background: #f8fafc;
        }

        .stat-box {
            background: #f1f5f9;
            border: 1px solid #e2e8f0
            border-radius: 14px;
            padding: 14px;
            text-align: center;
        }
    </style>

    <div class="profile-page min-h-screen bg-slate-100 py-8">
        <div class="max-w-lg mx-auto px-4">
            <div class="bg-white rounded-2xl shadow-sm overflow-hidden mb-4 border border-gray-100">
                <div class="h-28 relative" style="background: linear-gradient(135deg, #0f172a, #1e3a8a, #0284c7);">
                    <div class="absolute inset-0 opacity-10"
                        style="background-image: url('data:image/svg+xml,%3Csvg width=\'30\' height=\'30\' viewBox=\'0 0 30 30\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'%23fff\'%3E%3Ccircle cx=\'1\' cy=\'1\' r=\'1\'/%3E%3C/g%3E%3C/svg%3E'); background-size: 20px;">
                    </div>
                </div>

                <div class="px-6 pb-6">
                    <div class="flex items-end justify-between -mt-12 mb-4 relative z-10">
                        @if(auth()->user()->avatar)
                            <img src="{{ asset('storage/' . auth()->user()->avatar) }}"
                                class="w-24 h-24 rounded-2xl object-cover border-4 border-white shadow-lg">
                        @else
                            <div
                                class="w-24 h-24 rounded-2xl border-4 border-white shadow-lg bg-blue-600 text-white flex items-center justify-center font-extrabold text-3xl">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </div>
                        @endif
                        <a href="{{ route('profile.edit') }}"
                            class="mb-1 flex items-center gap-1.5 bg-white border border-gray-200 hover:border-blue-400 text-gray-700 hover:text-blue-600 text-sm font-medium px-4 py-2 rounded-xl transition-colors shadow-sm">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Edit Profil
                        </a>
                    </div>

                    <h2 class="text-xl font-extrabold text-gray-900">{{ auth()->user()->name }}</h2>
                    <p class="text-gray-500 text-sm mt-0.5">{{ auth()->user()->email }}</p>
                    @if(auth()->user()->phone)
                        <p class="text-gray-500 text-sm mt-0.5 flex items-center gap-1">
                            <svg class="w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            {{ auth()->user()->phone }}
                        </p>
                    @endif
                    @if(auth()->user()->bio)
                        <p class="text-gray-600 text-sm mt-3 leading-relaxed border-t border-gray-100 pt-3">
                            {{ auth()->user()->bio }}</p>
                    @endif
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm overflow-hidden border border-gray-100">
                <a href="{{ route('my.listing') }}"
                    class="menu-item flex items-center gap-4 p-4 border-b border-gray-50">
                    <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center text-blue-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="font-semibold text-gray-800 text-sm">Iklan Saya</p>
                        <p class="text-xs text-gray-400">Kelola motor yang kamu jual</p>
                    </div>
                    <svg class="w-4 h-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>

                <a href="{{ route('favorites') }}"
                    class="menu-item flex items-center gap-4 p-4 border-b border-gray-50">
                    <div class="w-10 h-10 bg-red-100 rounded-xl flex items-center justify-center text-red-500">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="font-semibold text-gray-800 text-sm">Favorit</p>
                        <p class="text-xs text-gray-400">Motor yang kamu suka</p>
                    </div>
                    <svg class="w-4 h-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>

                <a href="{{ route('chat.inbox') }}"
                    class="menu-item flex items-center gap-4 p-4 border-b border-gray-50">
                    <div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center text-green-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                    </div>

                    <div class="flex-1">
                        <p class="font-semibold text-gray-800 text-sm">Pesan</p>
                        <p class="text-xs text-gray-400">Inbox percakapan kamu</p>
                    </div>
                    @if(isset($unreadCount) && $unreadCount > 0)
                        <span
                            class="bg-red-500 text-white text-xs font-bold px-2 py-0.5 rounded-full">{{ $unreadCount }}</span>
                    @else
                        <svg class="w-4 h-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    @endif
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="menu-item w-full flex items-center gap-4 p-4">
                        <div class="w-10 h-10 bg-red-50 rounded-xl flex items-center justify-center text-red-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                        </div>
                        <div class="text-left">
                            <p class="font-semibold text-red-500 text-sm">Keluar</p>
                            <p class="text-xs text-gray-400">Logout dari akun</p>
                        </div>
                    </button>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>