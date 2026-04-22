<x-app-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&display=swap');

        .page-wrap * {
            font-family: 'Outfit', sans-serif;
        }

        .hero-section {
            background: linear-gradient(135deg, #dc2626 0%, #ef4444 60%, #f87171 100%);
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
            background: #f1f5f9;
            clip-path: ellipse(55% 100% at 50% 100%);
        }

        .report-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .report-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 40px rgba(220, 38, 38, 0.15);
        }

        .reason-option {
            transition: all 0.2s ease;
            border: 2px solid #e5e7eb;
        }

        .reason-option:hover {
            border-color: #dc2626;
            background: #fef2f2;
        }

        .reason-option.selected {
            border-color: #dc2626;
            background: #dc2626;
            color: white;
        }

        .submit-btn {
            background: linear-gradient(135deg, #dc2626, #ef4444);
            transition: all 0.2s ease;
            box-shadow: 0 4px 14px rgba(220, 38, 38, 0.3);
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(220, 38, 38, 0.4);
        }

        .cancel-btn {
            transition: all 0.2s ease;
        }

        .cancel-btn:hover {
            transform: translateY(-1px);
        }
    </style>

    <div class="page-wrap min-h-screen bg-slate-100">
        <div class="hero-section pb-16 pt-10 px-6 relative">
            <div class="max-w-4xl mx-auto relative z-10 text-center">
                <div class="inline-flex items-center gap-2 bg-white/10 text-white/80 text-xs font-medium px-3 py-1.5 rounded-full mb-5 border border-white/20">
                    🚨 Laporan User
                </div>
                <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-3 leading-tight tracking-tight">
                    Laporkan Pelanggaran
                </h1>
                <p class="text-red-200 text-base mb-8">
                    Bantu kami menjaga komunitas tetap aman dan nyaman untuk semua pengguna
                </p>
            </div>
        </div>

        <div class="max-w-2xl mx-auto px-4 sm:px-6 -mt-2 pb-12">
            <div class="report-card rounded-2xl p-8">
                @if (session('error'))
                    <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-6 py-4 rounded-2xl flex items-center gap-3">
                        <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                        </svg>
                        <span class="font-medium">{{ session('error') }}</span>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-6 py-4 rounded-2xl">
                        <div class="flex items-center gap-3 mb-2">
                            <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                            </svg>
                            <span class="font-semibold">Ada kesalahan dalam form:</span>
                        </div>
                        <ul class="list-disc list-inside ml-8">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- User Info Card -->
                <div class="bg-red-50 border border-red-200 rounded-2xl p-6 mb-8">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900">Anda melaporkan user:</h3>
                            <p class="text-lg font-bold text-red-600">{{ $reportedUser->name }}</p>
                            <p class="text-sm text-gray-600">{{ $reportedUser->email }}</p>
                        </div>
                    </div>
                </div>

                <form action="{{ route('report.store') }}" method="POST" class="space-y-8">
                    @csrf

                    <input type="hidden" name="reported_user_id" value="{{ $reportedUser->id }}">
                    <input type="hidden" name="listing_id" value="{{ request()->query('listing') }}">

                    <!-- Reason Selection -->
                    <div>
                        <label class="block text-lg font-semibold text-gray-900 mb-4">
                            Alasan Pelaporan <span class="text-red-500">*</span>
                        </label>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <label class="reason-option rounded-xl p-4 cursor-pointer flex items-center gap-3 selected" data-value="harassment">
                                <input type="radio" name="reason" value="harassment" class="sr-only" required>
                                <div class="w-5 h-5 border-2 border-current rounded-full flex items-center justify-center">
                                    <div class="w-3 h-3 bg-current rounded-full hidden checkmark"></div>
                                </div>
                                <div>
                                    <div class="font-semibold">Pelecehan / Intimidasi</div>
                                    <div class="text-sm opacity-80">Perilaku yang mengancam atau melecehkan</div>
                                </div>
                            </label>

                            <label class="reason-option rounded-xl p-4 cursor-pointer flex items-center gap-3" data-value="spam">
                                <input type="radio" name="reason" value="spam" class="sr-only">
                                <div class="w-5 h-5 border-2 border-current rounded-full flex items-center justify-center">
                                    <div class="w-3 h-3 bg-current rounded-full hidden checkmark"></div>
                                </div>
                                <div>
                                    <div class="font-semibold">Spam</div>
                                    <div class="text-sm opacity-80">Konten yang tidak relevan atau berulang</div>
                                </div>
                            </label>

                            <label class="reason-option rounded-xl p-4 cursor-pointer flex items-center gap-3" data-value="inappropriate_content">
                                <input type="radio" name="reason" value="inappropriate_content" class="sr-only">
                                <div class="w-5 h-5 border-2 border-current rounded-full flex items-center justify-center">
                                    <div class="w-3 h-3 bg-current rounded-full hidden checkmark"></div>
                                </div>
                                <div>
                                    <div class="font-semibold">Konten Tidak Pantas</div>
                                    <div class="text-sm opacity-80">Konten yang melanggar norma atau aturan</div>
                                </div>
                            </label>

                            <label class="reason-option rounded-xl p-4 cursor-pointer flex items-center gap-3" data-value="fraud">
                                <input type="radio" name="reason" value="fraud" class="sr-only">
                                <div class="w-5 h-5 border-2 border-current rounded-full flex items-center justify-center">
                                    <div class="w-3 h-3 bg-current rounded-full hidden checkmark"></div>
                                </div>
                                <div>
                                    <div class="font-semibold">Penipuan / Fraud</div>
                                    <div class="text-sm opacity-80">Kegiatan yang mencurigakan atau penipuan</div>
                                </div>
                            </label>

                            <label class="reason-option rounded-xl p-4 cursor-pointer flex items-center gap-3 col-span-full" data-value="other">
                                <input type="radio" name="reason" value="other" class="sr-only">
                                <div class="w-5 h-5 border-2 border-current rounded-full flex items-center justify-center">
                                    <div class="w-3 h-3 bg-current rounded-full hidden checkmark"></div>
                                </div>
                                <div>
                                    <div class="font-semibold">Lainnya</div>
                                    <div class="text-sm opacity-80">Pelanggaran lainnya yang tidak tercantum di atas</div>
                                </div>
                            </label>
                        </div>
                        @error('reason')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Image Upload -->
                    <div>
                        <label class="block text-lg font-semibold text-gray-900 mb-3">
                            Tambahkan Gambar / Bukti
                        </label>
                        <div class="mb-4">
                            <label for="images" class="flex items-center justify-center gap-3 w-full px-6 py-8 border-2 border-dashed border-gray-300 rounded-xl cursor-pointer hover:border-red-500 hover:bg-red-50 transition-all">
                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                                <div class="text-center">
                                    <p class="text-lg font-semibold text-gray-700">Klik atau seret gambar di sini</p>
                                    <p class="text-sm text-gray-500">Format: JPEG, PNG, GIF (Max 5MB per gambar)</p>
                                </div>
                                <input id="images" type="file" name="images[]" multiple accept="image/*" class="hidden" onchange="handleImageSelection(this)">
                            </label>
                            <p class="text-sm text-gray-500 mt-2">Opsional - Anda bisa menambahkan hingga 10 gambar sebagai bukti</p>
                        </div>

                        <!-- Image Preview -->
                        <div id="imagePreviewContainer" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3 mb-4"></div>

                        @error('images.*')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror

                        <input type="hidden" id="imageCount" value="0">
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-lg font-semibold text-gray-900 mb-3">
                            Deskripsi / Penjelasan
                        </label>
                        <textarea id="description" name="description" rows="5" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 resize-none transition-all" placeholder="Jelaskan detail pelaporan Anda dengan lengkap. Semakin detail informasi yang Anda berikan, semakin mudah admin untuk menindaklanjuti laporan Anda."></textarea>
                        <p class="text-sm text-gray-500 mt-2">Opsional, namun sangat membantu untuk proses review</p>
                        @error('description')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-200">
                        <button type="submit" class="submit-btn text-white font-bold py-4 px-8 rounded-xl text-center flex-1 flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                            </svg>
                            Kirim Laporan
                        </button>
                        <a href="{{ request()->query('listing') ? route('listing.show', ['listing' => request()->query('listing')]) : route('listing.index') }}" class="cancel-btn bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold py-4 px-8 rounded-xl text-center flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            Batal
                        </a>
                    </div>
                </form>

                <!-- Info Section -->
                <div class="mt-8 bg-blue-50 border border-blue-200 rounded-2xl p-6">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-blue-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div>
                            <h4 class="font-semibold text-blue-900 mb-2">Informasi Penting</h4>
                            <ul class="text-sm text-blue-800 space-y-1">
                                <li>• Laporan yang tidak valid atau spam dapat mengakibatkan akun Anda dibatasi</li>
                                <li>• Admin akan meninjau laporan Anda dalam 24-48 jam</li>
                                <li>• Anda akan mendapat notifikasi jika ada tindak lanjut</li>
                                <li>• Privasi Anda akan dijaga dengan baik</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let selectedFiles = [];

        function handleImageSelection(input) {
            const files = Array.from(input.files);
            
            // Limit to 10 images
            if (selectedFiles.length + files.length > 10) {
                alert('Maksimal 10 gambar yang dapat diunggah');
                files.splice(10 - selectedFiles.length);
            }

            selectedFiles = selectedFiles.concat(files);
            updateImagePreview();
        }

        function updateImagePreview() {
            const container = document.getElementById('imagePreviewContainer');
            container.innerHTML = '';

            selectedFiles.forEach((file, index) => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const div = document.createElement('div');
                    div.className = 'relative group';
                    div.innerHTML = `
                        <div class="relative w-full aspect-square bg-gray-200 rounded-lg overflow-hidden">
                            <img src="${e.target.result}" alt="Preview ${index}" class="w-full h-full object-cover">
                            <button type="button" class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-50 transition-all flex items-center justify-center opacity-0 group-hover:opacity-100" onclick="removeImage(${index})">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                            </button>
                        </div>
                        <p class="text-xs text-gray-600 mt-1 truncate">${file.name}</p>
                        <p class="text-xs text-gray-500">${(file.size / 1024 / 1024).toFixed(2)} MB</p>
                    `;
                    container.appendChild(div);
                };
                reader.readAsDataURL(file);
            });

            document.getElementById('imageCount').value = selectedFiles.length;
        }

        function removeImage(index) {
            selectedFiles.splice(index, 1);
            updateImagePreview();
            
            // Reset the file input
            const fileInput = document.getElementById('images');
            const dataTransfer = new DataTransfer();
            selectedFiles.forEach(file => dataTransfer.items.add(file));
            fileInput.files = dataTransfer.files;
        }

        // Handle drag and drop
        const fileInput = document.getElementById('images');
        const label = fileInput.parentElement;

        label.addEventListener('dragover', (e) => {
            e.preventDefault();
            label.classList.add('border-red-500', 'bg-red-50');
        });

        label.addEventListener('dragleave', () => {
            label.classList.remove('border-red-500', 'bg-red-50');
        });

        label.addEventListener('drop', (e) => {
            e.preventDefault();
            label.classList.remove('border-red-500', 'bg-red-50');
            
            const files = Array.from(e.dataTransfer.files).filter(file => file.type.startsWith('image/'));
            
            if (files.length > 0) {
                // Update the file input with dropped files
                const dataTransfer = new DataTransfer();
                selectedFiles.forEach(file => dataTransfer.items.add(file));
                files.forEach(file => dataTransfer.items.add(file));
                
                const combinedFiles = Array.from(dataTransfer.files);
                if (combinedFiles.length > 10) {
                    alert('Maksimal 10 gambar yang dapat diunggah');
                    selectedFiles = combinedFiles.slice(0, 10);
                } else {
                    selectedFiles = combinedFiles;
                }
                
                fileInput.files = dataTransfer.files;
                updateImagePreview();
            }
        });

        // Handle reason selection
        document.querySelectorAll('.reason-option').forEach(option => {
            option.addEventListener('click', function() {
                // Remove selected class from all options
                document.querySelectorAll('.reason-option').forEach(opt => {
                    opt.classList.remove('selected');
                    opt.querySelector('.checkmark').classList.add('hidden');
                });

                // Add selected class to clicked option
                this.classList.add('selected');
                this.querySelector('.checkmark').classList.remove('hidden');

                // Check the radio button
                this.querySelector('input[type="radio"]').checked = true;
            });
        });

        // Set default selection
        document.querySelector('.reason-option').click();
    </script>
</x-app-layout>
