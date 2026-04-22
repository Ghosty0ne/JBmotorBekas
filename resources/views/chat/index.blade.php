<x-app-layout>
    <div class="min-h-screen bg-gray-50 py-6">
        <div class="max-w-3xl mx-auto px-4">
            <a href="{{ route('listing.show', $listing->id) }}"
                class="inline-flex items-center gap-1 text-blue-600 text-sm mb-4 hover:underline">
                ← Kembali ke Iklan
            </a>

            <div class="bg-white rounded-2xl shadow-sm p-4 flex gap-4 mb-4">
                @if($listing->images->count())
                    <img src="{{ $listing->images->first()->image }}"
                        class="w-20 h-16 object-cover rounded-xl flex-shrink-0">
                @else
                    <div class="w-20 h-16 bg-gray-100 rounded-xl flex items-center justify-center text-2xl flex-shrink-0">
                        🏍️
                    </div>
                @endif
                <div>
                    <p class="font-bold text-gray-800">{{ $listing->title }}</p>
                    <p class="text-blue-600 font-bold">Rp {{ number_format($listing->price) }}</p>
                    <p class="text-xs text-gray-400 mt-0.5">📍 {{ $listing->location }}</p>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm overflow-hidden flex flex-col" style="height: 70vh;">
                <div class="px-5 py-4 border-b flex items-center gap-3 bg-gray-50 flex-shrink-0">
                    @if($receiver->avatar)
                        <img src="{{ asset('storage/' . $receiver->avatar) }}" class="w-10 h-10 rounded-full object-cover">
                    @else
                        <div
                            class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-sm">
                            {{ strtoupper(substr($receiver->name, 0, 1)) }}
                        </div>
                    @endif
                    <div>
                        <p class="font-semibold text-gray-800 text-sm">{{ $receiver->name }}</p>
                        @if($receiver->last_seen)
                            @if($receiver->last_seen->diffInMinutes(now()) < 5)
                                <p class="text-xs text-green-500">● Online sekarang</p>
                            @else
                                <p class="text-xs text-gray-400">Aktif {{ $receiver->last_seen->diffForHumans() }}</p>
                            @endif
                        @endif
                    </div>
                </div>

                <div id="chat-box" class="flex-1 overflow-y-auto p-5 bg-gray-50 space-y-1 min-h-0">
                    <p class="text-center text-gray-400 text-sm py-4">Memuat pesan...</p>
                </div>

                <div id="image-preview" class="flex gap-2 flex-wrap mb-3 bg-white p-2 rounded-lg hidden"></div>

                <div class="border-t p-4 flex gap-2 items-end bg-white flex-shrink-0">
                    <form id="chat-form" class="flex gap-2 w-full">
                        @csrf
                        <input type="hidden" id="receiver_id" value="{{ $receiver->id }}">
                        <input type="hidden" id="listing_id" value="{{ $listing->id }}">
                        <input type="text" id="message"
                            class="flex-1 border border-gray-200 rounded-2xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-blue-500 outline-none transition"
                            placeholder="Ketik pesan...">
                        <label for="image-input" class="bg-gray-200 hover:bg-gray-300 text-gray-700 p-2.5 rounded-2xl cursor-pointer transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                        </label>
                        <input type="file" id="image-input" multiple accept="image/*" class="hidden" onchange="handleImageSelection(this)">
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white p-2.5 rounded-2xl transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <script>
        let pollTimer = null;
        let isInitialLoad = true;
        let selectedFiles = [];

        function loadChat() {
            fetch(`/chat/messages/{{ $receiver->id }}/{{ $listing->id }}`)
                .then(res => res.text())
                .then(html => {
                    const box = document.getElementById('chat-box');
                    const shouldScroll = isInitialLoad || (box.scrollHeight - box.scrollTop - box.clientHeight) < 60;
                    box.innerHTML = html;
                    if (shouldScroll) box.scrollTop = box.scrollHeight;
                    isInitialLoad = false;
                });
        }

        function handleImageSelection(input) {
            const files = Array.from(input.files);
            
            // Limit to 10 images
            if (selectedFiles.length + files.length > 10) {
                alert('Maksimal 10 gambar untuk setiap pesan');
                files.splice(10 - selectedFiles.length);
            }

            selectedFiles = selectedFiles.concat(files);
            updateImagePreview();
        }

        function updateImagePreview() {
            const preview = document.getElementById('image-preview');
            preview.innerHTML = '';

            if (selectedFiles.length === 0) {
                preview.classList.add('hidden');
                return;
            }

            preview.classList.remove('hidden');

            selectedFiles.forEach((file, index) => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const div = document.createElement('div');
                    div.className = 'relative';
                    div.innerHTML = `
                        <div class="relative w-16 h-16 bg-gray-200 rounded-lg overflow-hidden">
                            <img src="${e.target.result}" alt="Preview" class="w-full h-full object-cover">
                            <button type="button" class="absolute inset-0 bg-black bg-opacity-0 hover:bg-opacity-50 transition flex items-center justify-center opacity-0 hover:opacity-100" onclick="removeImage(${index})">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    `;
                    preview.appendChild(div);
                };
                reader.readAsDataURL(file);
            });
        }

        function removeImage(index) {
            selectedFiles.splice(index, 1);
            updateImagePreview();
            document.getElementById('image-input').value = '';
        }

        document.getElementById('chat-form').addEventListener('submit', function (e) {
            e.preventDefault();
            const input = document.getElementById('message');
            const msg = input.value.trim();
            
            if (!msg && selectedFiles.length === 0) return;

            const submitBtn = this.querySelector('button[type="submit"]');
            submitBtn.disabled = true;
            input.disabled = true;

            const formData = new FormData();
            formData.append('receiver_id', document.getElementById('receiver_id').value);
            formData.append('listing_id', document.getElementById('listing_id').value);
            formData.append('message', msg);
            
            // Add all selected images
            selectedFiles.forEach(file => {
                formData.append('images[]', file);
            });

            fetch('/chat/send', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: formData
            }).then(response => {
                if (!response.ok) throw new Error('Send failed');
                return response.json();
            }).then(data => {
                if (data.status === 'success') {
                    input.value = '';
                    input.disabled = false;
                    submitBtn.disabled = false;
                    input.focus();
                    selectedFiles = [];
                    updateImagePreview();
                    loadChat();
                } else {
                    alert(data.message || 'Gagal mengirim pesan');
                    input.disabled = false;
                    submitBtn.disabled = false;
                }
            }).catch(err => {
                console.error('Error:', err);
                alert('Terjadi kesalahan saat mengirim pesan');
                input.disabled = false;
                submitBtn.disabled = false;
            });
        });

        document.getElementById('message').addEventListener('keydown', function (e) {
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault();
                document.getElementById('chat-form').dispatchEvent(new Event('submit'));
            }
        });

        loadChat();
        pollTimer = setInterval(loadChat, 3000);
    </script>
</x-app-layout>