<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - JBmotorBekas</title>
    @vite('resources/css/app.css')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&display=swap');

        * {
            font-family: 'Outfit', sans-serif;
        }

        .hero-section {
            background: linear-gradient(135deg, #dc2626 0%, #991b1b 100%);
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            inset: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .login-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .login-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 40px rgba(220, 38, 38, 0.15);
        }

        .input-field {
            transition: all 0.2s ease;
            border: 2px solid #fca5a5;
        }

        .input-field:focus {
            border-color: #dc2626;
            box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.1);
        }

        .login-btn {
            background: linear-gradient(135deg, #dc2626, #b91c1c);
            transition: all 0.2s ease;
            box-shadow: 0 4px 14px rgba(220, 38, 38, 0.3);
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(220, 38, 38, 0.4);
        }

        .register-link {
            transition: all 0.2s ease;
        }

        .register-link:hover {
            color: #dc2626;
        }

        .forgot-link {
            transition: all 0.2s ease;
        }

        .forgot-link:hover {
            color: #dc2626;
        }
    </style>
</head>
<body class="bg-slate-100 min-h-screen">

<div class="min-h-screen grid grid-cols-1 lg:grid-cols-2">
    <!-- LEFT SIDE - HERO -->
    <div class="hero-section hidden lg:flex items-center justify-center relative">
        <div class="max-w-lg text-center relative z-10 px-8">
            <div class="inline-flex items-center gap-2 bg-white/10 text-white/80 text-xs font-medium px-3 py-1.5 rounded-full mb-6 border border-white/20">
                🚀 Selamat Datang
            </div>
            <h1 class="text-5xl md:text-6xl font-extrabold text-white mb-4 leading-tight tracking-tight">
                JBmotorBekas
            </h1>
            <p class="text-red-200 text-lg mb-8 leading-relaxed">
                Temukan motor impianmu di platform terpercaya untuk jual beli motor bekas
            </p>
            <div class="flex items-center justify-center gap-6 text-white/80">
                <div class="text-center">
                    <div class="text-2xl font-bold text-white">10K+</div>
                    <div class="text-sm">Motor Terjual</div>
                </div>
                <div class="text-center">
                    <div class="text-2xl font-bold text-white">50K+</div>
                    <div class="text-sm">User Aktif</div>
                </div>
                <div class="text-center">
                    <div class="text-2xl font-bold text-white">4.8★</div>
                    <div class="text-sm">Rating</div>
                </div>
            </div>
        </div>
    </div>

    <!-- RIGHT SIDE - LOGIN FORM -->
    <div class="flex items-center justify-center p-6">
        <div class="w-full max-w-md">
            <div class="login-card rounded-2xl p-8">
                <!-- Header -->
                <div class="text-center mb-8">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-red-100 rounded-full mb-4">
                        <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                        </svg>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-2">Masuk Akun</h2>
                    <p class="text-gray-600">Masukkan kredensial Anda untuk melanjutkan</p>
                </div>

                <!-- Error Messages -->
                @if ($errors->any())
                    @if ($errors->has('admin_message'))
                        <!-- Admin Block/Delete Message -->
                        <div class="mb-6 bg-red-50 border-2 border-red-300 text-red-800 px-6 py-4 rounded-xl">
                            <div class="flex items-start gap-3 mb-3">
                                <svg class="w-6 h-6 text-red-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4v.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <div>
                                    <p class="font-bold text-lg">Akun Anda Tidak Bisa Digunakan</p>
                                    <p class="text-sm mt-1">{{ $errors->first('email') }}</p>
                                </div>
                            </div>
                            @if ($errors->has('admin_message'))
                                <div class="bg-white/50 rounded-lg p-4 mt-4 border-l-4 border-red-500">
                                    <p class="text-sm font-semibold mb-1">Pesan dari Administrator:</p>
                                    <p class="text-sm text-gray-700">{{ $errors->first('admin_message') }}</p>
                                </div>
                            @endif
                            <p class="text-xs mt-4 text-red-700">Jika merasa ini adalah kesalahan, hubungi tim support kami</p>
                        </div>
                    @else
                        <!-- Regular Error Messages -->
                        <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl">
                            <div class="flex items-center gap-2 mb-1">
                                <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                                </svg>
                                <span class="font-semibold">Login Gagal</span>
                            </div>
                            <ul class="list-disc list-inside ml-7 text-sm">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                @endif

                <!-- Success Message -->
                @if (session('status'))
                    <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl flex items-center gap-2">
                        <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>{{ session('status') }}</span>
                    </div>
                @endif

                <!-- Login Form -->
                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email Field -->
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input id="email" type="email" name="email" value="{{ old('email') }}"
                                class="input-field w-full px-4 py-3 rounded-xl text-gray-900 placeholder-gray-500 focus:outline-none"
                                placeholder="Masukkan email Anda" required autofocus>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Password Field -->
                    <div>
                        <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                            Password <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input id="password" type="password" name="password"
                                class="input-field w-full px-4 py-3 rounded-xl text-gray-900 placeholder-gray-500 focus:outline-none"
                                placeholder="Masukkan password Anda" required>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center justify-between">
                        <label class="flex items-center">
                            <input type="checkbox" name="remember" class="rounded border-gray-300 text-red-600 focus:ring-red-500">
                            <span class="ml-2 text-sm text-gray-600">Ingat saya</span>
                        </label>
                        <a href="{{ route('password.request') }}" class="forgot-link text-sm font-semibold text-gray-600 hover:text-red-600">
                            Lupa Password?
                        </a>
                    </div>

                    <!-- Login Button -->
                    <button type="submit" class="login-btn w-full text-white font-bold py-4 px-6 rounded-xl text-center flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                        </svg>
                        Masuk
                    </button>
                </form>

                <!-- Register Link -->
                <div class="mt-8 text-center">
                    <p class="text-gray-600">
                        Belum punya akun?
                        <a href="{{ route('register') }}" class="register-link font-bold text-red-600 hover:text-red-700 ml-1">
                            Daftar Sekarang
                        </a>
                    </p>
                </div>

                <!-- Forgot Email Link -->
                <div class="mt-4 text-center">
                    <a href="{{ route('forgot.email') }}" class="forgot-link text-sm text-gray-500 hover:text-red-600">
                        Lupa Email yang Terdaftar?
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

document.addEventListener('DOMContentLoaded', function() {
    
});
</script>

</body>
</html>