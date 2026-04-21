<style>
    @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700;800&display=swap');

    nav * {
        font-family: 'Outfit', sans-serif;
    }

    .nav-link {
        position: relative;
        transition: color 0.2s;
    }

    .nav-link::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 0;
        height: 2px;
        background: 
        transition: width 0.25s ease;
        border-radius: 2px;
    }

    .nav-link:hover::after {
        width: 100%;
    }

    .notif-pulse::before {
        content: '';
        position: absolute;
        inset: -3px;
        border-radius: 50%;
        background: 
        opacity: 0;
        animation: pulse-ring 1.8s ease-out infinite;
    }

    @keyframes pulse-ring {
        0% {
            transform: scale(0.8);
            opacity: 0.6;
        }

        100% {
            transform: scale(1.8);
            opacity: 0;
        }
    }

    .nav-btn-primary {
        background: linear-gradient(135deg, 
        transition: transform 0.15s, box-shadow 0.15s;
        box-shadow: 0 2px 10px rgba(37, 99, 235, 0.35);
    }

    .nav-btn-primary:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 16px rgba(37, 99, 235, 0.45);
    }

    .logo-text {
        background: linear-gradient(135deg, 
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    
        transition: transform 0.3s ease, opacity 0.3s ease;
        transform: translateY(-8px);
        opacity: 0;
        pointer-events: none;
    }

    
        transform: translateY(0);
        opacity: 1;
        pointer-events: auto;
    }
</style>

<nav class="bg-white/90 backdrop-blur-md sticky top-0 z-50 border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="flex items-center justify-between h-16">

            <a href="{{ route('listing.index') }}" class="flex items-center gap-2.5 flex-shrink-0">
                <div class="w-8 h-8 bg-blue-600 rounded-xl flex items-center justify-center shadow-md shadow-blue-200">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M5 11h14v2H5zm-2 4h18v2H3zm4-8h10v2H7z" />
                    </svg>
                </div>
                <span class="logo-text font-bold text-xl tracking-tight">JBmotorBekas</span>
            </a>

            <div class="hidden md:flex items-center gap-6">
                <a href="{{ route('listing.index') }}"
                    class="nav-link text-sm font-medium text-gray-600 hover:text-blue-600 pb-0.5">Jelajahi</a>
                @auth
                    <a href="{{ route('listing.create') }}"
                        class="nav-link text-sm font-medium text-gray-600 hover:text-blue-600 pb-0.5">Jual Motor</a>
                @endauth
            </div>

            <div class="hidden md:flex items-center gap-3">
                @auth
                    <a href="{{ route('chat.inbox') }}"
                        class="relative w-9 h-9 rounded-xl flex items-center justify-center text-gray-500 hover:text-blue-600 hover:bg-blue-50 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                        @if($unreadCount > 0)
                            <span
                                class="notif-pulse absolute -top-0.5 -right-0.5 w-4 h-4 bg-red-500 text-white text-[10px] font-bold rounded-full flex items-center justify-center">
                                {{ $unreadCount > 9 ? '9+' : $unreadCount }}
                            </span>
                        @endif
                    </a>
                    <div class="w-px h-5 bg-gray-200"></div>
                    <div class="relative" id="profile-dropdown-wrap">
                        <button onclick="toggleProfileDropdown()"
                            class="flex items-center gap-2 rounded-xl px-3 py-1.5 hover:bg-gray-50 transition-colors">
                            <div
                                class="w-7 h-7 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-xs">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </div>
                            <span
                                class="text-sm font-medium text-gray-700 max-w-[100px] truncate">{{ auth()->user()->name }}</span>
                            <svg class="w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div id="profile-dropdown"
                            class="absolute right-0 top-full mt-2 w-48 bg-white rounded-2xl shadow-xl border border-gray-100 py-1.5 z-50 hidden">
                            <a href="{{ route('profile') }}"
                                class="flex items-center gap-2.5 px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                Profil Saya
                            </a>
                            <a href="{{ route('my.listing') }}"
                                class="flex items-center gap-2.5 px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                                Iklan Saya
                            </a>
                            <a href="{{ route('favorites') }}"
                                class="flex items-center gap-2.5 px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                                Favorit
                            </a>
                            @if(auth()->user()->isAdmin())
                                <div class="border-t border-gray-100 my-1"></div>
                                <a href="{{ route('admin.dashboard') }}"
                                    class="flex items-center gap-2.5 px-4 py-2.5 text-sm text-purple-600 hover:bg-purple-50 transition-colors">
                                    <svg class="w-4 h-4 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                    </svg>
                                    Administrator Menu
                                </a>
                            @endif
                            <div class="border-t border-gray-100 my-1"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="w-full flex items-center gap-2.5 px-4 py-2.5 text-sm text-red-500 hover:bg-red-50 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                    Keluar
                                </button>
                            </form>
                        </div>
                    </div>
                    <a href="{{ route('listing.create') }}"
                        class="nav-btn-primary text-white text-sm font-semibold px-4 py-2 rounded-xl">+ Posting</a>
                @endauth
                @guest
                    <a href="{{ route('login') }}"
                        class="text-sm font-medium text-gray-600 hover:text-blue-600 transition-colors">Masuk</a>
                    <a href="{{ route('register') }}"
                        class="nav-btn-primary text-white text-sm font-semibold px-4 py-2 rounded-xl">Daftar</a>
                @endguest
            </div>

            <div class="flex md:hidden items-center gap-2">
                @auth
                    <a href="{{ route('chat.inbox') }}"
                        class="relative w-9 h-9 flex items-center justify-center text-gray-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                        @if($unreadCount > 0)
                            <span
                                class="absolute -top-0.5 -right-0.5 w-4 h-4 bg-red-500 text-white text-[10px] font-bold rounded-full flex items-center justify-center">
                                {{ $unreadCount > 9 ? '9+' : $unreadCount }}
                            </span>
                        @endif
                    </a>
                @endauth
                <button onclick="toggleMobileMenu()" id="hamburger-btn"
                    class="w-9 h-9 flex flex-col items-center justify-center gap-1.5 rounded-xl hover:bg-gray-50 transition-colors">
                    <span class="ham-line w-5 h-0.5 bg-gray-600 rounded transition-all duration-300"></span>
                    <span class="ham-line w-5 h-0.5 bg-gray-600 rounded transition-all duration-300"></span>
                    <span class="ham-line w-4 h-0.5 bg-gray-600 rounded transition-all duration-300"></span>
                </button>
            </div>
        </div>

        <div id="mobile-menu" class="md:hidden pb-4">
            <div class="flex flex-col gap-1 pt-2 border-t border-gray-100">
                <a href="{{ route('listing.index') }}"
                    class="px-4 py-3 text-sm font-medium text-gray-700 rounded-xl hover:bg-gray-50">🏠 Jelajahi
                    Motor</a>
                @auth
                    <a href="{{ route('listing.create') }}"
                        class="px-4 py-3 text-sm font-medium text-gray-700 rounded-xl hover:bg-gray-50">➕ Jual Motor</a>
                    <a href="{{ route('profile') }}"
                        class="px-4 py-3 text-sm font-medium text-gray-700 rounded-xl hover:bg-gray-50">👤 Profil —
                        {{ auth()->user()->name }}</a>
                    <a href="{{ route('my.listing') }}"
                        class="px-4 py-3 text-sm font-medium text-gray-700 rounded-xl hover:bg-gray-50">📋 Iklan Saya</a>
                    <a href="{{ route('favorites') }}"
                        class="px-4 py-3 text-sm font-medium text-gray-700 rounded-xl hover:bg-gray-50">❤️ Favorit</a>
                    <form method="POST" action="{{ route('logout') }}" class="px-4 pt-1">
                        @csrf
                        <button type="submit" class="w-full text-left py-3 text-sm font-medium text-red-500">🚪
                            Keluar</button>
                    </form>
                @endauth
                @guest
                    <a href="{{ route('login') }}"
                        class="px-4 py-3 text-sm font-medium text-gray-700 rounded-xl hover:bg-gray-50">Masuk</a>
                    <a href="{{ route('register') }}"
                        class="mx-4 py-3 text-sm font-semibold text-white text-center nav-btn-primary rounded-xl block">Daftar</a>
                @endguest
            </div>
        </div>
    </div>
</nav>

<script>
    function toggleProfileDropdown() {
        document.getElementById('profile-dropdown').classList.toggle('hidden');
    }
    document.addEventListener('click', function (e) {
        const wrap = document.getElementById('profile-dropdown-wrap');
        if (wrap && !wrap.contains(e.target)) {
            document.getElementById('profile-dropdown')?.classList.add('hidden');
        }
    });
    let mobileOpen = false;
    function toggleMobileMenu() {
        mobileOpen = !mobileOpen;
        document.getElementById('mobile-menu').classList.toggle('open', mobileOpen);
        const lines = document.querySelectorAll('.ham-line');
        if (mobileOpen) {
            lines[0].style.transform = 'translateY(8px) rotate(45deg)';
            lines[1].style.opacity = '0';
            lines[2].style.transform = 'translateY(-8px) rotate(-45deg)';
            lines[2].style.width = '1.25rem';
        } else {
            lines.forEach(l => { l.style.transform = ''; l.style.opacity = ''; });
            lines[2].style.width = '1rem';
        }
    }
</script>