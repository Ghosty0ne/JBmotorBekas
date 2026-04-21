<x-app-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&display=swap');

        .page-wrap * {
            font-family: 'Outfit', sans-serif;
        }

        .hero-section {
<<<<<<< HEAD
            background: linear-gradient(135deg, #4c1d95 0%, #7c3aed 100%);
=======
            background: linear-gradient(135deg, 
>>>>>>> 91c9b62eef1e7d271b5d76301b57237376479849
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
<<<<<<< HEAD
            background: #f1f5f9;
=======
            background: 
>>>>>>> 91c9b62eef1e7d271b5d76301b57237376479849
            clip-path: ellipse(55% 100% at 50% 100%);
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(12px);
            border: 1.5px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(124, 58, 237, 0.15);
        }

        .stat-icon {
<<<<<<< HEAD
            background: linear-gradient(135deg, #7c3aed 0%, #a855f7 100%);
=======
            background: linear-gradient(135deg, 
>>>>>>> 91c9b62eef1e7d271b5d76301b57237376479849
            box-shadow: 0 8px 20px rgba(124, 58, 237, 0.3);
        }

        .table-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .table-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .status-badge {
            transition: all 0.2s ease;
        }

        .status-badge:hover {
            transform: scale(1.05);
        }

        .action-btn {
            transition: all 0.2s ease;
        }

        .action-btn:hover {
            transform: translateY(-1px);
        }
    </style>

    <div class="page-wrap min-h-screen bg-slate-100">
        <div class="hero-section pb-16 pt-10 px-6 relative">
            <div class="max-w-4xl mx-auto relative z-10 text-center">
                <div class="inline-flex items-center gap-2 bg-white/10 text-white/80 text-xs font-medium px-3 py-1.5 rounded-full mb-5 border border-white/20">
                    🛡️ Admin Dashboard
                </div>
                <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-3 leading-tight tracking-tight">
                    Kelola Platform Motor Bekas
                </h1>
                <p class="text-purple-200 text-base mb-8">
                    Monitor laporan, kelola user, dan jaga keamanan komunitas
                </p>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 -mt-2 pb-12">
            @if (session('success'))
                <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-6 py-4 rounded-2xl flex items-center gap-3">
                    <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            @endif

            <!-- Statistics -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="stat-card rounded-2xl p-6">
                    <div class="flex items-center gap-4">
                        <div class="stat-icon w-12 h-12 rounded-2xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-purple-600 text-sm font-semibold uppercase tracking-wide">Total Laporan</p>
                            <p class="text-3xl font-extrabold text-gray-900 mt-1">{{ $totalReports }}</p>
                        </div>
                    </div>
                </div>

                <div class="stat-card rounded-2xl p-6">
                    <div class="flex items-center gap-4">
                        <div class="stat-icon w-12 h-12 rounded-2xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-purple-600 text-sm font-semibold uppercase tracking-wide">Pending Review</p>
                            <p class="text-3xl font-extrabold text-gray-900 mt-1">{{ $pendingReports->count() }}</p>
                        </div>
                    </div>
                </div>

                <div class="stat-card rounded-2xl p-6">
                    <div class="flex items-center gap-4">
                        <div class="stat-icon w-12 h-12 rounded-2xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-purple-600 text-sm font-semibold uppercase tracking-wide">User Terblokir</p>
                            <p class="text-3xl font-extrabold text-gray-900 mt-1">{{ $blockedUsersCount }}</p>
                        </div>
                        <a href="{{ route('admin.blocked-users') }}" class="text-purple-600 hover:text-purple-700 text-sm font-semibold">
                            Lihat Detail →
                        </a>
                    </div>
                </div>
            </div>

            <!-- Pending Reports Section -->
            <div class="table-card rounded-2xl overflow-hidden mb-8">
                <div class="bg-gradient-to-r from-purple-600 to-purple-700 px-6 py-4">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-bold text-white flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                            </svg>
                            Laporan Pending Review ({{ $pendingReports->count() }})
                        </h3>
                    </div>
                </div>

                @if ($pendingReports->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Pelapor
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        User Dilaporkan
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Alasan
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Waktu
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($pendingReports as $report)
                                    <tr class="hover:bg-purple-50 transition-colors">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                                                    <span class="text-xs font-bold text-blue-600">{{ strtoupper(substr($report->reporter->name, 0, 1)) }}</span>
                                                </div>
                                                <div>
                                                    <div class="text-sm font-medium text-gray-900">{{ $report->reporter->name }}</div>
                                                    <div class="text-xs text-gray-500">{{ $report->reporter->email }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="w-8 h-8 bg-red-100 rounded-full flex items-center justify-center mr-3">
                                                    <span class="text-xs font-bold text-red-600">{{ strtoupper(substr($report->reportedUser->name, 0, 1)) }}</span>
                                                </div>
                                                <div>
                                                    <div class="text-sm font-medium text-gray-900">{{ $report->reportedUser->name }}</div>
                                                    <div class="text-xs text-gray-500">{{ $report->reportedUser->email }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="status-badge inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-orange-100 text-orange-800">
                                                {{ ucfirst(str_replace('_', ' ', $report->reason)) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $report->created_at->diffForHumans() }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="{{ route('admin.view-report', $report) }}" class="action-btn inline-flex items-center px-4 py-2 bg-purple-600 text-white text-sm font-medium rounded-lg hover:bg-purple-700">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                </svg>
                                                Review
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="p-12 text-center">
                        <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Tidak ada laporan pending</h3>
                        <p class="text-gray-500">Semua laporan sudah direview. Bagus!</p>
                    </div>
                @endif
            </div>

            <!-- Recently Reviewed Reports -->
            @if ($reviewedReports->count() > 0)
                <div class="table-card rounded-2xl overflow-hidden">
                    <div class="bg-gradient-to-r from-green-600 to-green-700 px-6 py-4">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-bold text-white flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Laporan Terakhir Direview
                            </h3>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        User Dilaporkan
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Direview Oleh
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Waktu Review
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($reviewedReports as $report)
                                    <tr class="hover:bg-green-50 transition-colors">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center mr-3">
                                                    <span class="text-xs font-bold text-gray-600">{{ strtoupper(substr($report->reportedUser->name, 0, 1)) }}</span>
                                                </div>
                                                <div>
                                                    <div class="text-sm font-medium text-gray-900">{{ $report->reportedUser->name }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @php
                                                $statusColors = [
                                                    'reviewed' => 'bg-blue-100 text-blue-800',
                                                    'rejected' => 'bg-gray-100 text-gray-800',
                                                    'action_taken' => 'bg-red-100 text-red-800',
                                                ];
                                            @endphp
                                            <span class="status-badge inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold {{ $statusColors[$report->status] ?? 'bg-gray-100 text-gray-800' }}">
                                                {{ ucfirst(str_replace('_', ' ', $report->status)) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $report->reviewedBy->name ?? '-' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $report->reviewed_at?->diffForHumans() }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
