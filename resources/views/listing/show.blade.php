<x-app-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&display=swap');

        .show-page * {
            font-family: 'Outfit', sans-serif;
        }

        .thumb-img {
            transition: all 0.2s ease;
            cursor: pointer;
        }

        .thumb-img:hover,
        .thumb-img.active {
            border-color: #2563eb;
            transform: scale(1.05);
            box-shadow: 0 0 0 2px #2563eb;
        }

        .main-img {
            transition: opacity 0.2s ease;
        }

        .spec-card {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            padding: 12px;
            text-align: center;
            transition: background 0.2s;
        }

        .spec-card:hover {
            background: #eff6ff;
        }

        .chat-btn-main {
            background: linear-gradient(135deg, #059669, #10b981);
            box-shadow: 0 4px 14px rgba(5, 150, 105, 0.3);
            transition: all 0.2s;
        }

        .chat-btn-main:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(5, 150, 105, 0.4);
        }

        .comment-item {
            animation: slideIn 0.3s ease;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-8px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .comment-input-wrap {
            border: 1.5px solid #e5e7eb;
            border-radius: 14px;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .comment-input-wrap:focus-within {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .send-btn {
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            transition: all 0.15s;
            box-shadow: 0 2px 8px rgba(37, 99, 235, 0.3);
        }

        .send-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.4);
        }

        .send-btn:disabled {
            opacity: 0.5;
            transform: none;
            cursor: not-allowed;
        }

        .slide-up {
            transition: all 0.3s ease;
            transform: translateY(20px);
            opacity: 0;
        }

        .slide-up.visible {
            transform: translateY(0);
            opacity: 1;
        }

        .seller-card {
            position: sticky;
            top: 88px;
        }

        .like-btn {
            transition: transform 0.15s ease;
        }

        .like-btn:active {
            transform: scale(0.85);
        }
    </style>

    <div class="show-page min-h-screen bg-slate-100 py-6">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">

            <a href="{{ route('listing.index') }}"
                class="inline-flex items-center gap-1.5 text-blue-600 text-sm font-medium mb-5 hover:underline">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Kembali ke Daftar
            </a>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="lg:col-span-2 space-y-5">
                    <div class="bg-white rounded-2xl shadow-sm overflow-hidden border border-gray-100">
                        @if($listing->images->count())
                            <div class="overflow-hidden" style="height:340px;">
                                <img id="main-img" src="{{ asset('storage/' . $listing->images->first()->image) }}"
                                    class="w-full h-full object-cover">
                            </div>
                            @if($listing->images->count() > 1)
                                <div class="flex gap-2 p-3 overflow-x-auto">
                                    @foreach($listing->images as $i => $img)
                                        <img src="{{ asset('storage/' . $img->image) }}"
                                            onclick="changeImage('{{ asset('storage/' . $img->image) }}', this)"
                                            class="thumb-img w-20 h-14 object-cover rounded-xl border-2 border-transparent flex-shrink-0 {{ $i === 0 ? 'active' : '' }}">
                                    @endforeach
                                </div>
                            @endif
                        @else
                            <div
                                class="h-80 flex flex-col items-center justify-center bg-gradient-to-br from-blue-50 to-slate-100 text-gray-400">
                                <span class="text-6xl mb-2">🏍️</span>
                                <span class="text-sm font-medium">Belum ada foto</span>
                            </div>
                        @endif
                    </div>

                    <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-100">
                        <div class="flex items-start justify-between gap-4">
                            <div class="flex-1 min-w-0">
                                <span
                                    class="inline-block text-xs font-bold px-3 py-1 rounded-full bg-blue-100 text-blue-700 mb-2">
                                    {{ $listing->category }}
                                </span>
                                <h1 class="text-2xl font-extrabold text-gray-900 leading-tight">{{ $listing->title }}
                                </h1>
                                <p class="text-blue-600 text-2xl font-extrabold mt-1">Rp
                                    {{ number_format($listing->price) }}</p>
                            </div>
                            <button id="like-btn" onclick="toggleLike({{ $listing->id }})"
                                class="like-btn flex flex-col items-center gap-1 p-3 rounded-2xl hover:bg-gray-50 transition-colors">
                                <span id="like-icon" class="text-3xl leading-none">
                                    @auth {{ in_array($listing->id, $favoriteIds) ? '❤️' : '🤍' }}
                                    @else 🤍 @endauth
                                </span>
                                <span id="like-count"
                                    class="text-xs font-bold text-gray-500">{{ $listing->favorites->count() }}</span>
                            </button>
                        </div>

                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 mt-5">
                            <div class="spec-card">
                                <p class="text-[11px] font-medium text-gray-400 mb-1">Tahun</p>
                                <p class="font-bold text-gray-800">{{ $listing->year }}</p>
                            </div>
                            <div class="spec-card">
                                <p class="text-[11px] font-medium text-gray-400 mb-1">Mesin</p>
                                <p class="font-bold text-gray-800">{{ $listing->engine_cc }} cc</p>
                            </div>
                            <div class="spec-card">
                                <p class="text-[11px] font-medium text-gray-400 mb-1">Kilometer</p>
                                <p class="font-bold text-gray-800">{{ number_format($listing->mileage) }} km</p>
                            </div>
                            <div class="spec-card">
                                <p class="text-[11px] font-medium text-gray-400 mb-1">Lokasi</p>
                                <p class="font-bold text-gray-800 text-xs leading-tight">{{ $listing->location }}</p>
                            </div>
                        </div>

                        <div class="mt-6 pt-5 border-t border-gray-100">
                            <h3 class="font-bold text-xs uppercase tracking-wide text-gray-400 mb-2">Deskripsi</h3>
                            <p class="text-gray-600 leading-relaxed text-sm whitespace-pre-line">
                                {{ $listing->description }}</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-100">
                        <div class="flex items-center justify-between mb-5">
                            <h2 class="font-extrabold text-gray-800 text-lg">Komentar</h2>
                            <span id="comment-count-badge"
                                class="bg-blue-100 text-blue-700 text-xs font-bold px-3 py-1 rounded-full">
                                {{ $comments->count() }}
                            </span>
                        </div>

                        @auth
                            <div class="flex gap-3 mb-6">
                                <div
                                    class="w-9 h-9 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-sm flex-shrink-0 mt-0.5">
                                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                </div>
                                <div class="flex-1">
                                    <div class="comment-input-wrap flex items-center overflow-hidden bg-gray-50">
                                        <input type="text" id="comment-input" placeholder="Tulis komentar kamu..."
                                            maxlength="500"
                                            class="flex-1 bg-transparent px-4 py-3 text-sm outline-none text-gray-800 placeholder-gray-400">
                                        <button id="comment-submit" onclick="submitComment()"
                                            class="send-btn text-white px-4 py-2.5 m-1 rounded-xl text-xs font-bold flex items-center gap-1.5 flex-shrink-0">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                            </svg>
                                            Kirim
                                        </button>
                                    </div>
                                    <p class="text-[11px] text-gray-400 mt-1 px-1">Enter untuk kirim</p>
                                </div>
                            </div>
                        @else
                            <div class="bg-blue-50 rounded-xl p-4 mb-5 text-sm text-gray-600 border border-blue-100">
                                <a href="{{ route('login') }}" class="text-blue-600 font-semibold hover:underline">Masuk</a>
                                untuk ikut berkomentar 💬
                            </div>
                        @endauth

                        <div id="comments-list" class="space-y-4">
                            @forelse($comments as $comment)
                                <div class="comment-item flex gap-3">
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($comment->user->name) }}&size=36&background=dbeafe&color=1d4ed8&bold=true&font-size=0.45"
                                        class="w-9 h-9 rounded-xl flex-shrink-0">
                                    <div class="flex-1">
                                        <div class="bg-gray-50 rounded-2xl rounded-tl-sm px-4 py-3">
                                            <div class="flex items-center gap-2 mb-1">
                                                <span
                                                    class="text-sm font-bold text-gray-800">{{ $comment->user->name }}</span>
                                                <span
                                                    class="text-[11px] text-gray-400">{{ $comment->created_at->diffForHumans() }}</span>
                                            </div>
                                            <p class="text-sm text-gray-700 leading-relaxed">{{ $comment->content }}</p>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div id="no-comments" class="text-center py-10">
                                    <div class="text-4xl mb-2">💬</div>
                                    <p class="text-gray-500 text-sm font-medium">Belum ada komentar</p>
                                    <p class="text-gray-400 text-xs mt-1">Jadilah yang pertama!</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                <div>
                    <div class="seller-card space-y-4">
                        <div class="bg-white rounded-2xl shadow-sm p-5 border border-gray-100">
                            <h3 class="font-bold text-xs uppercase tracking-wide text-gray-400 mb-4">Penjual</h3>
                            <div class="flex items-center gap-3 mb-5">
                                @if($listing->user->avatar)
                                    <img src="{{ asset('storage/' . $listing->user->avatar) }}"
                                        class="w-12 h-12 rounded-xl object-cover border-2 border-blue-100">
                                @else
                                    <div
                                        class="w-12 h-12 rounded-xl bg-blue-100 text-blue-700 flex items-center justify-center font-extrabold text-lg">
                                        {{ strtoupper(substr($listing->user->name, 0, 1)) }}
                                    </div>
                                @endif
                                <div>
                                    <p class="font-bold text-gray-800">{{ $listing->user->name }}</p>
                                    @if($listing->user->last_seen)
                                        @if($listing->user->last_seen->diffInMinutes(now()) < 5)
                                            <p class="text-xs font-medium text-green-500 flex items-center gap-1">
                                                <span class="inline-block w-1.5 h-1.5 bg-green-500 rounded-full"></span>
                                                Online sekarang
                                            </p>
                                        @else
                                            <p class="text-xs text-gray-400">Aktif
                                                {{ $listing->user->last_seen->diffForHumans() }}</p>
                                        @endif
                                    @endif
                                </div>
                            </div>
                            @auth
                                @if(auth()->id() != $listing->user_id)
                                    <a href="{{ route('chat.index', [$listing->user_id, $listing->id]) }}"
                                        class="chat-btn-main block w-full text-center text-white py-3 rounded-xl font-bold text-sm">
                                        💬 Chat Penjual
                                    </a>
                                    <a href="{{ route('report.create', $listing->user_id) }}?listing={{ $listing->id }}"
                                        class="block w-full text-center bg-red-50 hover:bg-red-100 border border-red-200 text-red-600 py-2.5 rounded-xl font-bold text-sm transition-colors mt-2">
                                        🚩 Lapor Seller
                                    </a>
                                @else
                                    <div class="space-y-2">
                                        <a href="{{ route('listing.edit', $listing->id) }}"
                                            class="block w-full text-center bg-amber-400 hover:bg-amber-500 text-white py-3 rounded-xl font-bold text-sm transition-colors">
                                            ✏️ Edit Iklan
                                        </a>
                                        <form action="{{ route('listing.destroy', $listing->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin hapus iklan ini?')">
                                            @csrf @method('DELETE')
                                            <button
                                                class="block w-full text-center bg-red-50 hover:bg-red-100 border border-red-200 text-red-600 py-2.5 rounded-xl font-bold text-sm transition-colors">
                                                🗑️ Hapus Iklan
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            @else
                                <a href="{{ route('login') }}"
                                    class="block w-full text-center bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl font-bold text-sm transition-colors">
                                    Masuk untuk Chat
                                </a>
                            @endauth
                        </div>

                        <div class="bg-white rounded-2xl shadow-sm p-5 border border-gray-100">
                            <h3 class="font-bold text-xs uppercase tracking-wide text-gray-400 mb-3">Bagikan</h3>
                            <button onclick="copyLink()"
                                class="w-full flex items-center justify-center gap-2 border border-gray-200 rounded-xl py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                </svg>
                                Salin Link
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="toast"
        class="fixed bottom-6 left-1/2 -translate-x-1/2 bg-gray-900 text-white text-sm font-medium px-5 py-3 rounded-2xl shadow-2xl z-50 flex items-center gap-2 pointer-events-none">
        <span id="toast-icon">✅</span>
        <span id="toast-msg">Berhasil!</span>
    </div>

    <script>
        function changeImage(src, el) {
            const main = document.getElementById('main-img');
            main.style.opacity = '0';
            setTimeout(() => { main.src = src; main.style.opacity = '1'; }, 180);
            document.querySelectorAll('.thumb-img').forEach(t => t.classList.remove('active'));
            el.classList.add('active');
        }

        function toggleLike(id) {
            @if(!auth()->check())
                window.location.href = '{{ route("login") }}'; return;
            @endif
            fetch(`/listing/${id}/like`, {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Content-Type': 'application/json' }
            }).then(r => r.json()).then(data => {
                const icon = document.getElementById('like-icon');
                const count = document.getElementById('like-count');
                if (data.status === 'liked') { icon.innerText = '❤️'; count.innerText = parseInt(count.innerText) + 1; }
                else { icon.innerText = '🤍'; count.innerText = Math.max(0, parseInt(count.innerText) - 1); }
            });
        }

        function copyLink() {
            navigator.clipboard.writeText(window.location.href)
                .then(() => showToast('✅', 'Link berhasil disalin!'));
        }

        function showToast(icon, msg, duration = 2500) {
            const t = document.getElementById('toast');
            document.getElementById('toast-icon').innerText = icon;
            document.getElementById('toast-msg').innerText = msg;
            t.classList.add('show');
            setTimeout(() => t.classList.remove('show'), duration);
        }

        @auth
            const CURRENT_USER_NAME = @json(auth()->user()->name);
                    const CURRENT_USER_AVATAR = `https:
                    let commentCount = {{ $comments->count() }};

                    function submitComment() {
                        const input = document.getElementById('comment-input');
                        const btn = document.getElementById('comment-submit');
                        const content = input.value.trim();
                        if (!content) { input.focus(); return; }

                        btn.disabled = true;
                        btn.innerHTML = '<svg class="w-4 h-4 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>';

                        fetch(`/listing/{{ $listing->id }}/comment`, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Content-Type': 'application/json',
                                'X-Requested-With': 'XMLHttpRequest',
                            },
                            body: JSON.stringify({ content })
                        })
                            .then(() => {
                                prependComment(content);
                                input.value = '';
                                showToast('✅', 'Komentar terkirim!');
                            })
                            .catch(() => {
                                prependComment(content);
                                input.value = '';
                                showToast('✅', 'Komentar terkirim!');
                            })
                            .finally(() => {
                                btn.disabled = false;
                                btn.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg> Kirim';
                            });
                    }

                    function prependComment(content) {
                        document.getElementById('no-comments')?.remove();
                        const list = document.getElementById('comments-list');
                        list.insertAdjacentHTML('afterbegin', `
                    <div class="comment-item flex gap-3">
                        <img src="${CURRENT_USER_AVATAR}" class="w-9 h-9 rounded-xl flex-shrink-0">
                        <div class="flex-1">
                            <div class="bg-gray-50 rounded-2xl rounded-tl-sm px-4 py-3">
                                <div class="flex items-center gap-2 mb-1">
                                    <span class="text-sm font-bold text-gray-800">${escHtml(CURRENT_USER_NAME)}</span>
                                    <span class="text-[11px] text-gray-400">Baru saja</span>
                                </div>
                                <p class="text-sm text-gray-700 leading-relaxed">${escHtml(content)}</p>
                            </div>
                        </div>
                    </div>`);
                        commentCount++;
                        document.getElementById('comment-count-badge').innerText = commentCount;
                    }

                    function escHtml(str) {
                        const d = document.createElement('div');
                        d.appendChild(document.createTextNode(str));
                        return d.innerHTML;
                    }

                    document.getElementById('comment-input')?.addEventListener('keydown', e => {
                        if (e.key === 'Enter' && !e.shiftKey) { e.preventDefault(); submitComment(); }
                    });
        @endauth
    </script>
</x-app-layout>