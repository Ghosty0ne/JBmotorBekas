<x-app-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&display=swap');

        .page-wrap * {
            font-family: 'Outfit', sans-serif;
        }

        .hero-section {
            background: linear-gradient(135deg, #4c1d95 0%, #7c3aed 100%);
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

        .detail-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .detail-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 40px rgba(220, 38, 38, 0.15);
        }

        .status-badge {
            transition: all 0.2s ease;
        }

        .user-card {
            background: linear-gradient(135deg, #f8fafc, #e2e8f0);
            border: 1px solid #e2e8f0
            transition: all 0.2s ease;
        }

        .user-card:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .review-form {
            background: #f8fafc;
            border: 1px solid #e5e7eb
            transition: all 0.2s ease;
        }

        .review-form:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .submit-btn {
            background: linear-gradient(135deg, #dc2626, #b91c1c);
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

        .back-btn {
            background: linear-gradient(135deg, #6b7280, #4b5563);
            transition: all 0.2s ease;
            box-shadow: 0 4px 14px rgba(107, 114, 128, 0.3);
        }

        .back-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(107, 114, 128, 0.4);
        }
    </style>

    <div class="page-wrap min-h-screen bg-slate-100">
        <div class="hero-section pb-16 pt-10 px-6 relative">
            <div class="max-w-4xl mx-auto relative z-10 text-center">
                <div class="inline-flex items-center gap-2 bg-white/10 text-white/80 text-xs font-medium px-3 py-1.5 rounded-full mb-5 border border-white/20">
                    📋 Detail Laporan
                </div>
                <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-3 leading-tight tracking-tight">
                    Review Laporan User
                </h1>
                <p class="text-red-200 text-base mb-8">
                    Tinjau dan ambil tindakan terhadap laporan pelanggaran
                </p>
            </div>
        </div>

        <div class="max-w-4xl mx-auto px-4 sm:px-6 -mt-2 pb-12">
            <div class="detail-card rounded-2xl p-8">
                <!-- Header with Back Button -->
                <div class="flex items-center justify-between mb-8">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-gray-900">Detail Laporan</h2>
                            <p class="text-gray-600">ID: 
                        </div>
                    </div>
                    <a href="{{ route('admin.dashboard') }}" class="back-btn text-white font-bold py-3 px-6 rounded-xl flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali ke Dashboard
                    </a>
                </div>

                <!-- Status Badge -->
                <div class="mb-8">
                    @php
                        $statusConfig = [
                            'pending' => ['bg' => 'bg-yellow-100', 'text' => 'text-yellow-800', 'icon' => '⏳', 'label' => 'Menunggu Review'],
                            'reviewed' => ['bg' => 'bg-blue-100', 'text' => 'text-blue-800', 'icon' => '👁️', 'label' => 'Sudah Direview'],
                            'rejected' => ['bg' => 'bg-gray-100', 'text' => 'text-gray-800', 'icon' => '❌', 'label' => 'Ditolak'],
                            'action_taken' => ['bg' => 'bg-red-100', 'text' => 'text-red-800', 'icon' => '⚡', 'label' => 'Tindakan Diambil'],
                        ];
                        $status = $statusConfig[$report->status] ?? $statusConfig['pending'];
                    @endphp
                    <div class="status-badge inline-flex items-center gap-2 {{ $status['bg'] }} {{ $status['text'] }} px-4 py-2 rounded-full text-sm font-semibold">
                        <span class="text-lg">{{ $status['icon'] }}</span>
                        {{ $status['label'] }}
                    </div>
                </div>

                <!-- User Information Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div class="user-card rounded-xl p-6">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Pelapor</h4>
                                <p class="text-sm text-gray-600">User yang membuat laporan</p>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <p class="text-lg font-bold text-gray-900">{{ $report->reporter->name }}</p>
                            <p class="text-sm text-gray-600">{{ $report->reporter->email }}</p>
                            <p class="text-xs text-gray-500">Bergabung: {{ $report->reporter->created_at->format('d M Y') }}</p>
                        </div>
                    </div>

                    <div class="user-card rounded-xl p-6">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">User Dilaporkan</h4>
                                <p class="text-sm text-gray-600">Target pelaporan</p>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <p class="text-lg font-bold text-gray-900">{{ $report->reportedUser->name }}</p>
                            <p class="text-sm text-gray-600">{{ $report->reportedUser->email }}</p>
                            <div class="flex items-center gap-2">
                                <p class="text-xs text-gray-500">Bergabung: {{ $report->reportedUser->created_at->format('d M Y') }}</p>
                                @if ($report->reportedUser->is_blocked)
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                        🔒 TERBLOKIR
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Report Details -->
                <div class="bg-gray-50 border border-gray-200 rounded-xl p-6 mb-8">
                    <h3 class="text-lg font-bold text-gray-900 mb-6 flex items-center gap-2">
                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Detail Laporan
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h4 class="text-sm font-semibold text-gray-600 mb-2">Alasan Pelaporan</h4>
                            <p class="text-base font-medium text-gray-900">{{ ucfirst(str_replace('_', ' ', $report->reason)) }}</p>
                        </div>

                        <div>
                            <h4 class="text-sm font-semibold text-gray-600 mb-2">Tanggal Laporan</h4>
                            <p class="text-base text-gray-900">{{ $report->created_at->format('d M Y H:i') }}</p>
                        </div>
                    </div>

                    @if ($report->description)
                        <div class="mt-6">
                            <h4 class="text-sm font-semibold text-gray-600 mb-2">Deskripsi Lengkap</h4>
                            <div class="bg-white border border-gray-200 rounded-lg p-4">
                                <p class="text-gray-900 whitespace-pre-wrap">{{ $report->description }}</p>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Report Images -->
                @if ($report->images->count() > 0)
                    <div class="bg-gray-50 border border-gray-200 rounded-xl p-6 mb-8">
                        <h3 class="text-lg font-bold text-gray-900 mb-6 flex items-center gap-2">
                            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            Bukti Gambar ({{ $report->images->count() }} Gambar)
                        </h3>

                        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                            @foreach ($report->images as $image)
                                <div class="group relative aspect-square bg-gray-200 rounded-lg overflow-hidden cursor-pointer" onclick="openImageModal('{{ Storage::url($image->image_path) }}')">
                                    <img src="{{ Storage::url($image->image_path) }}" alt="Report image" class="w-full h-full object-cover group-hover:scale-110 transition-transform">
                                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-50 transition-all flex items-center justify-center">
                                        <svg class="w-6 h-6 text-white opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM13 13H7"></path>
                                        </svg>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Review Information (if already reviewed) -->
                @if ($report->reviewed_at)
                    <div class="bg-blue-50 border border-blue-200 rounded-xl p-6 mb-8">
                        <h3 class="text-lg font-bold text-blue-900 mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Informasi Review
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <p class="text-sm font-semibold text-blue-800">Direview oleh:</p>
                                <p class="text-base text-blue-900 font-medium">{{ $report->reviewedBy->name }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-blue-800">Tanggal Review:</p>
                                <p class="text-base text-blue-900">{{ $report->reviewed_at->format('d M Y H:i') }}</p>
                            </div>
                        </div>
                        @if ($report->admin_notes)
                            <div>
                                <p class="text-sm font-semibold text-blue-800 mb-2">Catatan Admin:</p>
                                <div class="bg-white border border-blue-200 rounded-lg p-3">
                                    <p class="text-blue-900 whitespace-pre-wrap">{{ $report->admin_notes }}</p>
                                </div>
                            </div>
                        @endif
                    </div>
                @endif

                <!-- Review Form (only if status is pending) -->
                @if ($report->status === 'pending')
                    <div class="review-form rounded-xl p-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-6 flex items-center gap-2">
                            <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            Proses Laporan
                        </h3>

                        <form action="{{ route('admin.review-report', $report) }}" method="POST" class="space-y-6">
                            @csrf

                            <div>
                                <label for="status" class="block text-lg font-semibold text-gray-900 mb-3">
                                    Status Laporan <span class="text-red-500">*</span>
                                </label>
                                <select id="status" name="status" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all" required onchange="handleStatusChange()">
                                    <option value="">-- Pilih Status --</option>
                                    <option value="reviewed">✅ Direview (Tidak Perlu Tindakan)</option>
                                    <option value="rejected">❌ Ditolak (Laporan Invalid)</option>
                                    <option value="action_taken">⚡ Ambil Tindakan</option>
                                </select>
                                @error('status')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Action Selection (only shown when status === action_taken) -->
                            <div id="actionSection" class="hidden space-y-3">
                                <label for="action" class="block text-lg font-semibold text-gray-900">
                                    Tindakan Terhadap Akun <span class="text-red-500">*</span>
                                </label>
                                <select id="action" name="action" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all">
                                    <option value="">-- Pilih Tindakan --</option>
                                    <option value="block">🔒 Blokir Akun</option>
                                    <option value="delete">🗑️ Hapus Akun</option>
                                </select>
                                @error('action')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                                <div class="bg-red-50 border border-red-200 rounded-lg p-4">
                                    <div class="flex items-start gap-2">
                                        <svg class="w-5 h-5 text-red-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                                        </svg>
                                        <div>
                                            <p class="text-sm font-semibold text-red-800">Peringatan Penting</p>
                                            <p class="text-sm text-red-700 mt-1">Jika memilih "Hapus Akun", akun dan semua data terkait akan dihapus secara permanen dan tidak dapat dikembalikan!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label for="admin_notes" class="block text-lg font-semibold text-gray-900 mb-3">
                                    Catatan Admin <span class="text-amber-500">ℹ️ Akan dilihat oleh user</span>
                                </label>
                                <textarea id="admin_notes" name="admin_notes" rows="4" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 resize-none transition-all" placeholder="Tuliskan alasan keputusan Anda. Pesan ini akan terlihat oleh user jika akun diblokir atau dihapus..."></textarea>
                                <p class="text-xs text-gray-500 mt-2">Contoh: 'Melanggar kebijakan privasi dengan membagikan data pribadi pengguna' atau 'Konten yang diunggah tidak sesuai dengan standar komunitas'</p>
                                @error('admin_notes')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-200">
                                <button type="submit" class="submit-btn text-white font-bold py-4 px-8 rounded-xl text-center flex-1 flex items-center justify-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Simpan & Proses
                                </button>
                                <a href="{{ route('admin.dashboard') }}" class="cancel-btn bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold py-4 px-8 rounded-xl text-center flex items-center justify-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    Batal
                                </a>
                            </div>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        function handleStatusChange() {
            const status = document.getElementById('status').value;
            const actionSection = document.getElementById('actionSection');
            const actionSelect = document.getElementById('action');

            if (status === 'action_taken') {
                actionSection.classList.remove('hidden');
                actionSection.classList.add('animate-fade-in');
                actionSelect.required = true;
            } else {
                actionSection.classList.add('hidden');
                actionSelect.required = false;
                actionSelect.value = '';
            }
        }

        
        const style = document.createElement('style');
        style.textContent = `
            .animate-fade-in {
                animation: fadeIn 0.3s ease-in-out;
            }
            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(-10px); }
                to { opacity: 1; transform: translateY(0); }
            }
        `;
        document.head.appendChild(style);
    </script>

    <!-- Image Modal -->
    <div id="imageModal" class="hidden fixed inset-0 bg-black bg-opacity-75 z-50 flex items-center justify-center p-4" onclick="closeImageModal(event)">
        <div class="relative max-w-4xl w-full" onclick="event.stopPropagation()">
            <button onclick="closeImageModal()" class="absolute -top-10 right-0 text-white hover:text-gray-300">
                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </button>
            <img id="modalImage" src="" alt="Full size image" class="w-full h-auto rounded-lg">
        </div>
    </div>

    <script>
        function openImageModal(src) {
            const modal = document.getElementById('imageModal');
            const img = document.getElementById('modalImage');
            img.src = src;
            modal.classList.remove('hidden');
        }

        function closeImageModal(event) {
            if (event && event.target.id !== 'imageModal') return;
            document.getElementById('imageModal').classList.add('hidden');
        }

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') closeImageModal();
        });
    </script>
</x-app-layout>
