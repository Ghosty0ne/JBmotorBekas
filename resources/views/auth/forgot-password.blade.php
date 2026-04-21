<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - JBmotorBekas</title>
    @vite('resources/css/app.css')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&display=swap');

        * {
            font-family: 'Outfit', sans-serif;
        }

        .hero-section {
<<<<<<< HEAD
            background: linear-gradient(135deg, #dc2626 0%, #991b1b 100%);
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

        .forgot-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .forgot-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 40px rgba(220, 38, 38, 0.15);
        }

        .input-field {
            transition: all 0.2s ease;
<<<<<<< HEAD
            border: 2px solid #fca5a5;
        }

        .input-field:focus {
            border-color: #dc2626;
=======
            border: 2px solid 
        }

        .input-field:focus {
            border-color: 
>>>>>>> 91c9b62eef1e7d271b5d76301b57237376479849
            box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.1);
        }

        .submit-btn {
<<<<<<< HEAD
            background: linear-gradient(135deg, #dc2626, #b91c1c);
=======
            background: linear-gradient(135deg, 
>>>>>>> 91c9b62eef1e7d271b5d76301b57237376479849
            transition: all 0.2s ease;
            box-shadow: 0 4px 14px rgba(220, 38, 38, 0.3);
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(220, 38, 38, 0.4);
        }

        .back-link {
            transition: all 0.2s ease;
        }

        .back-link:hover {
<<<<<<< HEAD
            color: #dc2626;
=======
            color: 
>>>>>>> 91c9b62eef1e7d271b5d76301b57237376479849
        }
    </style>
</head>
<body class="bg-slate-100 min-h-screen">

<div class="min-h-screen grid grid-cols-1 lg:grid-cols-2">
    <!-- LEFT SIDE - HERO -->
    <div class="hero-section hidden lg:flex items-center justify-center relative">
        <div class="max-w-lg text-center relative z-10 px-8">
            <div class="inline-flex items-center gap-2 bg-white/10 text-white/80 text-xs font-medium px-3 py-1.5 rounded-full mb-6 border border-white/20">
                🔐 Reset Password
            </div>
            <h1 class="text-5xl md:text-6xl font-extrabold text-white mb-4 leading-tight tracking-tight">
                Lupa Password?
            </h1>
            <p class="text-red-200 text-lg mb-8 leading-relaxed">
                Jangan khawatir! Masukkan email Anda dan kami akan kirim link reset password
            </p>
            <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                <div class="flex items-center justify-center gap-3 text-white/90">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    <span class="font-semibold">Cek Email Anda</span>
                </div>
                <p class="text-white/80 text-sm mt-2">Link reset akan dikirim dalam 1-2 menit</p>
            </div>
        </div>
    </div>

    <!-- RIGHT SIDE - FORGOT PASSWORD FORM -->
    <div class="flex items-center justify-center p-6">
        <div class="w-full max-w-md">
            <div class="forgot-card rounded-2xl p-8">
                <!-- Header -->
                <div class="text-center mb-8">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-red-100 rounded-full mb-4">
                        <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path>
                        </svg>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-2">Reset Password</h2>
                    <p class="text-gray-600">Masukkan email Anda untuk menerima link reset password</p>
                </div>

                <!-- Status Message -->
                @if (session('status'))
                    <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl flex items-center gap-2">
                        <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>{{ session('status') }}</span>
                    </div>
                @endif

                <!-- Error Messages -->
                @if ($errors->any())
                    <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl">
                        <div class="flex items-center gap-2 mb-1">
                            <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                            </svg>
                            <span class="font-semibold">Terjadi Kesalahan</span>
                        </div>
                        <ul class="list-disc list-inside ml-7 text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Forgot Password Form -->
                <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
                    @csrf

                    <!-- Email Field -->
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input id="email" type="email" name="email" value="{{ old('email') }}"
                                class="input-field w-full px-4 py-3 rounded-xl text-gray-900 placeholder-gray-500 focus:outline-none"
                                placeholder="Masukkan email yang terdaftar" required autofocus>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                </svg>
                            </div>
                        </div>
                        @error('email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="submit-btn w-full text-white font-bold py-4 px-6 rounded-xl text-center flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                        </svg>
                        Kirim Link Reset
                    </button>
                </form>

                <!-- Back to Login Link -->
                <div class="mt-8 text-center">
                    <a href="{{ route('login') }}" class="back-link font-semibold text-gray-600 hover:text-red-600 flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali ke Login
                    </a>
                </div>

                <!-- Info Section -->
                <div class="mt-6 bg-blue-50 border border-blue-200 rounded-xl p-4">
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-blue-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div>
                            <h4 class="font-semibold text-blue-900 mb-1">Informasi</h4>
                            <ul class="text-sm text-blue-800 space-y-1">
                                <li>• Link reset akan dikirim ke email Anda</li>
                                <li>• Link berlaku selama 60 menit</li>
                                <li>• Periksa folder spam jika tidak menemukan email</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>