<x-app-layout>
<div class="flex bg-gray-50 overflow-hidden" style="height: calc(100vh - 64px);">

    <div class="w-full md:w-80 border-r bg-white flex-shrink-0 flex flex-col"
         id="sidebar" :class="activeChatId ? 'hidden md:flex' : 'flex'">

        <div class="p-4 border-b flex-shrink-0">
            <h2 class="font-bold text-gray-800 text-lg">Pesan</h2>
            <p class="text-xs text-gray-400">{{ auth()->user()->name }}</p>
        </div>

        <div class="flex-1 overflow-y-auto min-h-0">
            @forelse($chats as $key => $messages)
                @php
                    $last    = $messages->sortBy('created_at')->last();
                    $user    = $last->sender_id == auth()->id() ? $last->receiver : $last->sender;
                    $listing = $last->listing;
                    $unread  = $messages->where('receiver_id', auth()->id())
                                        ->whereNull('read_at')->count();
                    $isOnline = $user->last_seen && $user->last_seen->diffInMinutes(now()) < 5;
                @endphp

                <div onclick="openChat({{ $user->id }}, {{ $last->listing_id }}, '{{ addslashes($user->name) }}', '{{ $user->last_seen ? $user->last_seen->diffForHumans() : '' }}', {{ $isOnline ? 'true' : 'false' }}, '{{ $user->avatar ? asset('storage/' . $user->avatar) : '' }}')"
                    class="chat-item p-4 border-b cursor-pointer hover:bg-blue-50 transition flex gap-3 items-start"
                    data-key="{{ $user->id }}_{{ $last->listing_id }}">
                    <div class="relative flex-shrink-0">
                        @if($user->avatar)
                            <img src="{{ asset('storage/' . $user->avatar) }}"
                                class="w-11 h-11 rounded-full object-cover border-2 border-gray-100">
                        @else
                            <div class="w-11 h-11 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-sm">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>
                        @endif
                        @if($isOnline)
                            <span class="absolute bottom-0 right-0 w-3 h-3 bg-green-400 rounded-full border-2 border-white"></span>
                        @endif
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex justify-between items-center">
                            <span class="font-semibold text-sm text-gray-800 truncate">{{ $user->name }}</span>
                            <span class="text-xs text-gray-400 flex-shrink-0 ml-1">{{ $last->created_at->format('H:i') }}</span>
                        </div>

                        @if($listing)
                            <p class="text-xs text-blue-500 truncate mt-0.5">🏍️ {{ $listing->title }}</p>
                        @endif

                        <div class="flex justify-between items-center mt-0.5">
                            <p class="text-xs text-gray-400 truncate">
                                {{ $last->sender_id == auth()->id() ? 'Kamu: ' : '' }}
                                @if($last->images->count() > 0)
                                    📷 {{ $last->images->count() }} foto{{ $last->message ? ' + ' . substr($last->message, 0, 30) : '' }}
                                @elseif($last->image)
                                    📷 Foto{{ $last->message ? ' + ' . substr($last->message, 0, 30) : '' }}
                                @else
                                    {{ $last->message }}
                                @endif
                            </p>
                            @if($unread > 0)
                                <span class="bg-blue-600 text-white text-[10px] font-bold px-1.5 py-0.5 rounded-full flex-shrink-0 ml-1">
                                    {{ $unread }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-16 text-gray-400">
                    <div class="text-4xl mb-3">💬</div>
                    <p class="text-sm">Belum ada percakapan</p>
                </div>
            @endforelse
        </div>
    </div>
    <div class="flex-1 flex flex-col min-w-0 min-h-0">
        <div id="chat-placeholder" class="flex-1 flex flex-col items-center justify-center text-gray-400">
            <div class="text-6xl mb-4">💬</div>
            <p class="font-semibold text-gray-600">Pilih percakapan</p>
            <p class="text-sm mt-1">Klik chat di sebelah kiri untuk mulai</p>
        </div>
        <div id="chat-area" class="flex-1 flex flex-col min-h-0 hidden">
            <div class="bg-white border-b px-5 py-3 flex items-center gap-3 flex-shrink-0">
                <button onclick="closeChat()" class="md:hidden text-gray-500 mr-1">←</button>
                <div class="relative flex-shrink-0">
                    <img id="header-avatar-img" src="" class="w-10 h-10 rounded-full object-cover border-2 border-gray-100 hidden">
                    <div id="header-avatar-letter"
                        class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-sm">
                        ?
                    </div>
                    <span id="header-online-dot" class="hidden absolute bottom-0 right-0 w-3 h-3 bg-green-400 rounded-full border-2 border-white"></span>
                </div>
                <div class="flex-1 min-w-0">
                    <p id="header-name" class="font-semibold text-gray-800 text-sm"></p>
                    <p id="header-status" class="text-xs text-gray-400"></p>
                </div>
                <a id="header-listing-link" href="#"
                    class="hidden text-xs bg-blue-50 text-blue-600 px-3 py-1.5 rounded-full hover:bg-blue-100 transition">
                    Lihat Iklan
                </a>
            </div>
            <div id="chat-box" class="flex-1 overflow-y-auto p-5 bg-gray-50 space-y-1 min-h-0">
            </div>
            <div id="inbox-image-preview" class="hidden bg-white border-b border-gray-200 p-3 rounded-t-3xl flex gap-2 overflow-x-auto" style="min-height: 72px;"></div>
            <div class="bg-white border-t p-4 flex gap-2 items-end flex-shrink-0">
                <input type="text" id="msg-input"
                    class="flex-1 border border-gray-200 rounded-2xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-blue-500 outline-none transition"
                    placeholder="Ketik pesan...">
                <label for="inbox-image-input" class="bg-gray-200 hover:bg-gray-300 text-gray-700 p-2.5 rounded-2xl cursor-pointer transition flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </label>
                <input type="file" id="inbox-image-input" multiple accept="image/*" class="hidden" onchange="handleInboxImageSelection(this)">
                <button onclick="sendMessage()"
                    class="bg-blue-600 hover:bg-blue-700 text-white p-2.5 rounded-2xl transition flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>

<script>
let receiverId       = null;
let listingId        = null;
let pollTimer        = null;
let isInitialLoad    = false;
let inboxSelectedFiles = [];

function handleInboxImageSelection(input) {
    const files = Array.from(input.files);
    
    
    if (inboxSelectedFiles.length + files.length > 10) {
        alert('Maksimal 10 gambar untuk setiap pesan');
        files.splice(10 - inboxSelectedFiles.length);
    }

    inboxSelectedFiles = inboxSelectedFiles.concat(files);
    updateInboxPreview();
}

function updateInboxPreview() {
    const preview = document.getElementById('inbox-image-preview');
    preview.innerHTML = '';

    if (inboxSelectedFiles.length === 0) {
        preview.classList.add('hidden');
        return;
    }

    preview.classList.remove('hidden');

    inboxSelectedFiles.forEach((file, index) => {
        const reader = new FileReader();
        reader.onload = (e) => {
            const wrapper = document.createElement('div');
            wrapper.className = 'relative rounded-2xl overflow-hidden border border-gray-200 bg-gray-100 w-20 h-20 flex-shrink-0';
            wrapper.innerHTML = `
                <img src="${e.target.result}" alt="Preview" class="w-full h-full object-cover">
                <button type="button" onclick="removeInboxImage(${index})" class="absolute top-1 right-1 bg-black bg-opacity-50 text-white rounded-full p-1 hover:bg-opacity-80">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            `;
            preview.appendChild(wrapper);
        };
        reader.readAsDataURL(file);
    });
}

function removeInboxImage(index) {
    inboxSelectedFiles.splice(index, 1);
    updateInboxPreview();
    document.getElementById('inbox-image-input').value = '';
}

function openChat(userId, listId, userName, lastSeen, isOnline, avatarUrl) {
    receiverId    = userId;
    listingId     = listId;
    isInitialLoad = true;

    const imgEl    = document.getElementById('header-avatar-img');
    const letterEl = document.getElementById('header-avatar-letter');
    const dot      = document.getElementById('header-online-dot');

    if (avatarUrl) {
        imgEl.src = avatarUrl;
        imgEl.classList.remove('hidden');
        letterEl.classList.add('hidden');
    } else {
        imgEl.classList.add('hidden');
        letterEl.classList.remove('hidden');
        letterEl.innerText = userName.charAt(0).toUpperCase();
    }

    isOnline ? dot.classList.remove('hidden') : dot.classList.add('hidden');

    document.getElementById('header-name').innerText   = userName;
    document.getElementById('header-status').innerText = isOnline
        ? '● Online'
        : (lastSeen ? 'Terakhir aktif ' + lastSeen : '');
    document.getElementById('header-status').className = isOnline
        ? 'text-xs text-green-500 font-medium'
        : 'text-xs text-gray-400';

    const listingLink = document.getElementById('header-listing-link');
    listingLink.href  = `/listing/${listId}`;
    listingLink.classList.remove('hidden');

    document.querySelectorAll('.chat-item').forEach(el => {
        el.classList.remove('bg-blue-50', 'border-l-4', 'border-blue-600');
    });
    const activeItem = document.querySelector(`[data-key="${userId}_${listId}"]`);
    if (activeItem) activeItem.classList.add('bg-blue-50', 'border-l-4', 'border-blue-600');

    document.getElementById('chat-placeholder').classList.add('hidden');
    document.getElementById('chat-area').classList.remove('hidden');

    loadMessages();
    if (pollTimer) clearInterval(pollTimer);
    pollTimer = setInterval(loadMessages, 3000);
}

function closeChat() {
    document.getElementById('chat-placeholder').classList.remove('hidden');
    document.getElementById('chat-area').classList.add('hidden');
    receiverId = null;
    listingId  = null;
    if (pollTimer) clearInterval(pollTimer);
}

function loadMessages() {
    if (!receiverId || !listingId) return;

    fetch(`/chat/messages/${receiverId}/${listingId}`)
        .then(res => res.text())
        .then(html => {
            const box = document.getElementById('chat-box');
            const shouldScroll = isInitialLoad || (box.scrollHeight - box.scrollTop - box.clientHeight) < 60;
            box.innerHTML = html;
            if (shouldScroll) box.scrollTop = box.scrollHeight;
            isInitialLoad = false;

            const badge = document.querySelector(`[data-key="${receiverId}_${listingId}"] .bg-blue-600`);
            if (badge) badge.remove();
        });
}

function sendMessage() {
    const input = document.getElementById('msg-input');
    const msg   = input.value.trim();
    if (!msg && inboxSelectedFiles.length === 0 || !receiverId || !listingId) return;

    input.value    = '';
    input.disabled = true;

    const formData = new FormData();
    formData.append('receiver_id', receiverId);
    formData.append('listing_id', listingId);
    formData.append('message', msg);
    
    
    inboxSelectedFiles.forEach(file => {
        formData.append('images[]', file);
    });

    fetch('/chat/send', {
        method : 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: formData
    })
    .then(response => {
        if (!response.ok) throw new Error('Send failed');
        return response.json();
    })
    .then(data => {
        if (data.status === 'success') {
            input.disabled = false;
            input.focus();
            inboxSelectedFiles = [];
            document.getElementById('inbox-image-input').value = '';
            updateInboxPreview();
            loadMessages();
        } else {
            alert(data.message || 'Gagal mengirim pesan');
            input.disabled = false;
        }
    })
    .catch(err => {
        console.error('Error:', err);
        alert('Terjadi kesalahan saat mengirim pesan');
        input.disabled = false;
    });
}

document.getElementById('msg-input').addEventListener('keydown', function(e) {
    if (e.key === 'Enter' && !e.shiftKey) {
        e.preventDefault();
        sendMessage();
    }
});
</script>
</x-app-layout>