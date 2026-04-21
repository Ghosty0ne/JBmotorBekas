@use('Carbon\Carbon')

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

        .detail-card {
            background: rgba(255, 255, 255, 0.95);
            border: 1px solid rgba(220, 38, 38, 0.1);
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: 0.75rem;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .status-pending {
            background: 
            color: 
        }

        .status-reviewed {
            background: 
            color: 
        }

        .status-rejected {
            background: 
            color: 
        }

        .status-action_taken {
            background: 
            color: 
        }
    </style>

    <div class="page-wrap min-h-screen bg-slate-100">
        <div class="hero-section pb-16 pt-10 px-6 relative">
            <div class="max-w-4xl mx-auto relative z-10 text-center">
                <div class="inline-flex items-center gap-2 bg-white/10 text-white/80 text-xs font-medium px-3 py-1.5 rounded-full mb-5 border border-white/20">
                    📋 Detail Laporan
                </div>
                <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-3 leading-tight tracking-tight">
                    Detail Laporan
                </h1>
                <p class="text-red-200 text-base">
                    Informasi lengkap tentang laporan pelanggaran
                </p>
            </div>
        </div>

        <div class="max-w-4xl mx-auto px-4 sm:px-6 -mt-2 pb-12">
            <div class="detail-card rounded-2xl p-8 shadow-lg">
                <!-- Status Section -->
                <div class="mb-8 flex items-center justify-between flex-wrap gap-4">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Status Laporan</h2>
                        <span class="status-badge status-{{ $report->status }}">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            @if ($report->status === 'pending')
                                Sedang Ditinjau
                            @elseif ($report->status === 'reviewed')
                                Telah Ditinjau
                            @elseif ($report->status === 'rejected')
                                Ditolak
                            @else
                                Tindakan Diambil
                            @endif
                        </span>
                    </div>
                    <div class="text-right">
                        <p class="text-sm text-gray-600 mb-1">Dibuat pada:</p>
                        <p class="text-lg font-semibold text-gray-900">{{ $report->created_at->format('d M Y H:i') }}</p>
                    </div>
                </div>

                <hr class="my-8 border-gray-200">

                <!-- Report Details -->
                <div class="grid md:grid-cols-2 gap-8 mb-8">
                    <!-- Reporter Info -->
                    <div>
                        <h3 class="text-sm font-semibold text-gray-600 uppercase tracking-wider mb-4">Pelapor</h3>
                        <div class="bg-blue-50 rounded-lg p-4 border border-blue-200">
                            <p class="font-semibold text-gray-900">{{ $report->reporter->name }}</p>
                            <p class="text-sm text-gray-600">{{ $report->reporter->email }}</p>
                        </div>
                    </div>

                    <!-- Reported User Info -->
                    <div>
                        <h3 class="text-sm font-semibold text-gray-600 uppercase tracking-wider mb-4">User Terlaporkan</h3>
                        <div class="bg-red-50 rounded-lg p-4 border border-red-200">
                            <p class="font-semibold text-gray-900">{{ $report->reportedUser->name }}</p>
                            <p class="text-sm text-gray-600">{{ $report->reportedUser->email }}</p>
                        </div>
                    </div>
                </div>

                <!-- Reason -->
                <div class="mb-8">
                    <h3 class="text-sm font-semibold text-gray-600 uppercase tracking-wider mb-3">Alasan Laporan</h3>
                    <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                        <p class="text-gray-900 capitalize">
                            @switch($report->reason)
                                @case('harassment')
                                    🚨 Pelecehan / Intimidasi
                                @break
                                @case('spam')
                                    📨 Spam
                                @break
                                @case('inappropriate_content')
                                    🚫 Konten Tidak Pantas
                                @break
                                @case('fraud')
                                    🔍 Penipuan / Fraud
                                @break
                                @default
                                    ❓ Lainnya
                            @endswitch
                        </p>
                    </div>
                </div>

                <!-- Description -->
                @if ($report->description)
                    <div class="mb-8">
                        <h3 class="text-sm font-semibold text-gray-600 uppercase tracking-wider mb-3">Deskripsi</h3>
                        <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                            <p class="text-gray-900 whitespace-pre-wrap">{{ $report->description }}</p>
                        </div>
                    </div>
                @endif

                <!-- Images -->
                @if ($report->images->count() > 0)
                    <div class="mb-8">
                        <h3 class="text-sm font-semibold text-gray-600 uppercase tracking-wider mb-3">Bukti Gambar ({{ $report->images->count() }} Gambar)</h3>
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

                <!-- Admin Notes (if reviewed) -->
                @if ($report->admin_notes && (auth()->user()->isAdmin() || auth()->id() === $report->reporter_id))
                    <div class="mb-8">
                        <h3 class="text-sm font-semibold text-gray-600 uppercase tracking-wider mb-3">Catatan Admin</h3>
                        <div class="bg-green-50 rounded-lg p-4 border border-green-200">
                            <p class="text-gray-900 whitespace-pre-wrap">{{ $report->admin_notes }}</p>
                            <p class="text-xs text-gray-600 mt-3">Ditinjau oleh: {{ $report->reviewedBy->name ?? 'N/A' }}</p>
                            <p class="text-xs text-gray-600">Tanggal: {{ $report->reviewed_at?->format('d M Y H:i') ?? 'N/A' }}</p>
                        </div>
                    </div>
                @endif

                <!-- Back Button -->
                <div class="pt-6 border-t border-gray-200">
                    <a href="{{ route('listing.index') }}" class="inline-flex items-center gap-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold py-3 px-6 rounded-xl transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>

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
