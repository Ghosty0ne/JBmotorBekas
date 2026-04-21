<x-app-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&display=swap');

        .page-wrap * {
            font-family: 'Outfit', sans-serif;
        }

        .hero-section {
            background: linear-gradient(135deg, 
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            inset: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .hero-section::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            right: 0;
            height: 60px;
            background: 
            clip-path: ellipse(55% 100% at 50% 100%);
        }

        .search-bar {
            background: rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(12px);
            border: 1.5px solid rgba(255, 255, 255, 0.2);
            transition: all 0.2s;
        }

        .search-bar:focus-within {
            background: rgba(255, 255, 255, 0.18);
            border-color: rgba(255, 255, 255, 0.5);
        }

        .category-pill {
            transition: all 0.2s ease;
            border: 1.5px solid 
            font-weight: 500;
            font-size: 0.8rem;
            white-space: nowrap;
        }

        .category-pill:hover {
            border-color: 
            color: 
            background: 
            transform: translateY(-1px);
        }

        .category-pill.active {
            background: 
            border-color: 
            color: white;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
            transform: translateY(-1px);
        }

        .listing-card {
            transition: transform 0.22s ease, box-shadow 0.22s ease;
            border: 1px solid 
        }

        .listing-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .listing-card .card-img {
            transition: transform 0.4s ease;
        }

        .listing-card:hover .card-img {
            transform: scale(1.04);
        }

        .stat-chip {
            background: 
            border: 1px solid 
            font-size: 0.7rem;
            font-weight: 600;
            color: 
            padding: 3px 8px;
            border-radius: 20px;
        }

        .chat-btn {
            background: linear-gradient(135deg, 
            transition: all 0.15s;
            box-shadow: 0 2px 8px rgba(5, 150, 105, 0.25);
        }

        .chat-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 14px rgba(5, 150, 105, 0.35);
        }

        .no-image-placeholder {
            background: linear-gradient(135deg, 
        }

        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>

    <div class="page-wrap min-h-screen bg-slate-100">
        <div class="hero-section pb-16 pt-10 px-6 relative">
            <div class="max-w-4xl mx-auto relative z-10 text-center">
                <div
                    class="inline-flex items-center gap-2 bg-white/10 text-white/80 text-xs font-medium px-3 py-1.5 rounded-full mb-5 border border-white/20">
                    🔥 Ribuan motor tersedia hari ini
                </div>
                <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-3 leading-tight tracking-tight">
                    Temukan Motor Impianmu
                </h1>
                <p class="text-blue-200 text-base mb-8">
                    Jual beli motor bekas terpercaya, harga terbaik, langsung dari pemilik
                  </p>
                <div class="search-bar flex items-center gap-3 max-w-xl mx-auto rounded-2xl px-5 py-3">
                    <svg class="w-5 h-5 text-white/60 flex-shrink-0" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <input type="text" id="search" placeholder="Cari merek, model, atau lokasi..."
                        value="{{ request('search') }}"
                        class="flex-1 bg-transparent text-white placeholder-white/50 text-sm font-medium outline-none">
                    @auth
                        <a href="{{ route('listing.create') }}"
                            class="flex-shrink-0 bg-white text-blue-700 text-xs font-bold px-4 py-2 rounded-xl hover:bg-blue-50 transition-colors">
                            + Posting
                        </a>
                    @endauth
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 -mt-2 pb-12">

            <div class="flex gap-2.5 mb-8 overflow-x-auto pb-1 hide-scrollbar">
                <button onclick="filterCategory('')" data-cat=""
                    class="category-pill px-4 py-2 rounded-full bg-white {{ !request('category') ? 'active' : '' }}">
                    ⚡ Semua
                </button>
                @foreach (['Sport' => '🏁', 'Touring' => '🛣️', 'Cruiser' => '🤠', 'Classic' => '🏛️', 'Matic' => '🛵'] as $cat => $icon)
                    <button onclick="filterCategory('{{ $cat }}')" data-cat="{{ $cat }}"
                        class="category-pill px-4 py-2 rounded-full bg-white {{ request('category') == $cat ? 'active' : '' }}">
                        {{ $icon }} {{ $cat }}
                    </button>
                @endforeach
            </div>

            <div class="flex items-center mb-5">
                <p class="text-sm font-medium text-gray-500">
                    Menampilkan <span class="text-gray-800 font-semibold">{{ $listings->total() }}</span> motor
                </p>
            </div>

            <div id="listing-container" style="transition: opacity 0.2s ease;">
                @include('listing.partials.list')
            </div>
        </div>
    </div>

    <script>
        let timeout = null;
        let currentCategory = "{{ request('category') }}";
        const searchInput = document.getElementById('search');

        function fetchData() {
            const container = document.getElementById('listing-container');
            container.style.opacity = '0.5';
            fetch(`/listing?search=${encodeURIComponent(searchInput.value)}&category=${encodeURIComponent(currentCategory)}`)
                .then(r => r.text())
                .then(html => {
                    const doc = new DOMParser().parseFromString(html, 'text/html');
                    const content = doc.getElementById('listing-container')?.innerHTML;
                    if (content) container.innerHTML = content;
                    container.style.opacity = '1';
                })
                .catch(() => { container.style.opacity = '1'; });
        }

        searchInput.addEventListener('input', () => {
            clearTimeout(timeout);
            timeout = setTimeout(fetchData, 380);
        });

        function filterCategory(cat) {
            currentCategory = cat;
            fetchData();
            document.querySelectorAll('.category-pill').forEach(b =>
                b.classList.toggle('active', b.dataset.cat === cat)
            );
        }
    </script>
</x-app-layout>