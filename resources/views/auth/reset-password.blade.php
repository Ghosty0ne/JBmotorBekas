<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - JBmotorBekas</title>
    @vite('resources/css/app.css')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&display=swap');

        * {
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

        .reset-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .reset-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 40px rgba(220, 38, 38, 0.15);
        }

        .input-field {
            transition: all 0.2s ease;
            border: 2px solid 
        }

        .input-field:focus {
            border-color: 
            box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.1);
        }

        .reset-btn {
            background: linear-gradient(135deg, 
            transition: all 0.2s ease;
            box-shadow: 0 4px 14px rgba(220, 38, 38, 0.3);
        }

        .reset-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(220, 38, 38, 0.4);
        }

        .back-link {
            transition: all 0.2s ease;
        }

        .back-link:hover {
            color: 
        }

        .password-strength {
            transition: all 0.2s ease;
        }

        .password-strength.weak {
            color: 
        }

        .password-strength.medium {
            color: 
        }

        .password-strength.strong {
            color: 
        }
    </style>
</head>
<body class="bg-slate-100 min-h-screen">

<div class="min-h-screen grid grid-cols-1 lg:grid-cols-2">
    <!-- LEFT SIDE - HERO -->
    <div class="hero-section hidden lg:flex items-center justify-center relative">
        <div class="max-w-lg text-center relative z-10 px-8">
            <div class="inline-flex items-center gap-2 bg-white/10 text-white/80 text-xs font-medium px-3 py-1.5 rounded-full mb-6 border border-white/20">
                🔐 Buat Password Baru
            </div>
            <h1 class="text-5xl md:text-6xl font-extrabold text-white mb-4 leading-tight tracking-tight">
                Password Baru
            </h1>
            <p class="text-red-200 text-lg mb-8 leading-relaxed">
                Buat password yang kuat dan aman untuk akun Anda
            </p>
            <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                <div class="flex items-center justify-center gap-3 text-white/90">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="font-semibold">Password Aman</span>
                </div>
                <p class="text-white/80 text-sm mt-2">Minimal 8 karakter dengan kombinasi huruf dan angka</p>
            </div>
        </div>
    </div>

    <!-- RIGHT SIDE - RESET PASSWORD FORM -->
    <div class="flex items-center justify-center p-6">
        <div class="w-full max-w-md">
            <div class="reset-card rounded-2xl p-8">
                <!-- Header -->
                <div class="text-center mb-8">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-red-100 rounded-full mb-4">
                        <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path>
                        </svg>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-2">Reset Password</h2>
                    <p class="text-gray-600">Buat password baru untuk akun Anda</p>
                </div>

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

                <!-- Reset Password Form -->
                <form method="POST" action="{{ route('password.store') }}" class="space-y-6">
                    @csrf

                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <!-- Email Address -->
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}"
                                class="input-field w-full px-4 py-3 rounded-xl text-gray-900 placeholder-gray-500 focus:outline-none"
                                placeholder="Masukkan email Anda" required autofocus autocomplete="username">
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

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                            Password Baru <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input id="password" type="password" name="password"
                                class="input-field w-full px-4 py-3 rounded-xl text-gray-900 placeholder-gray-500 focus:outline-none"
                                placeholder="Minimal 8 karakter" required autocomplete="new-password">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                        </div>
                        <div id="password-strength" class="mt-2 text-sm opacity-0 transition-opacity">Kekuatan password: <span id="strength-text"></span></div>
                        @error('password')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-2">
                            Konfirmasi Password <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input id="password_confirmation" type="password" name="password_confirmation"
                                class="input-field w-full px-4 py-3 rounded-xl text-gray-900 placeholder-gray-500 focus:outline-none"
                                placeholder="Ulangi password baru" required autocomplete="new-password">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                        @error('password_confirmation')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Reset Button -->
                    <button type="submit" class="reset-btn w-full text-white font-bold py-4 px-6 rounded-xl text-center flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                        </svg>
                        Reset Password
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

                <!-- Password Requirements -->
                <div class="mt-6 bg-gray-50 border border-gray-200 rounded-xl p-4">
                    <h4 class="font-semibold text-gray-900 mb-2 flex items-center gap-2">
                        <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Syarat Password
                    </h4>
                    <ul class="text-sm text-gray-700 space-y-1">
                        <li class="flex items-center gap-2">
                            <span id="length-check" class="w-2 h-2 rounded-full bg-gray-300"></span>
                            Minimal 8 karakter
                        </li>
                        <li class="flex items-center gap-2">
                            <span id="letter-check" class="w-2 h-2 rounded-full bg-gray-300"></span>
                            Mengandung huruf
                        </li>
                        <li class="flex items-center gap-2">
                            <span id="number-check" class="w-2 h-2 rounded-full bg-gray-300"></span>
                            Mengandung angka
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

function checkPasswordStrength(password) {
    let strength = 0;
    let checks = {
        length: password.length >= 8,
        letter: /[a-zA-Z]/.test(password),
        number: /\d/.test(password)
    };

    
    document.getElementById('length-check').className = checks.length ? 'w-2 h-2 rounded-full bg-green-500' : 'w-2 h-2 rounded-full bg-gray-300';
    document.getElementById('letter-check').className = checks.letter ? 'w-2 h-2 rounded-full bg-green-500' : 'w-2 h-2 rounded-full bg-gray-300';
    document.getElementById('number-check').className = checks.number ? 'w-2 h-2 rounded-full bg-green-500' : 'w-2 h-2 rounded-full bg-gray-300';

    
    if (checks.length) strength++;
    if (checks.letter) strength++;
    if (checks.number) strength++;

    const strengthElement = document.getElementById('password-strength');
    const strengthText = document.getElementById('strength-text');

    if (password.length === 0) {
        strengthElement.className = 'mt-2 text-sm opacity-0 transition-opacity';
        return;
    }

    strengthElement.className = 'mt-2 text-sm opacity-100 transition-opacity password-strength';

    if (strength < 2) {
        strengthElement.classList.add('weak');
        strengthText.textContent = 'Lemah';
    } else if (strength === 2) {
        strengthElement.classList.add('medium');
        strengthText.textContent = 'Sedang';
    } else {
        strengthElement.classList.add('strong');
        strengthText.textContent = 'Kuat';
    }
}


document.getElementById('password').addEventListener('input', function() {
    checkPasswordStrength(this.value);
});


document.getElementById('password_confirmation').addEventListener('input', function() {
    const password = document.getElementById('password').value;
    const confirm = this.value;

    if (confirm.length > 0) {
        if (password === confirm) {
            this.classList.remove('border-red-300');
            this.classList.add('border-green-300');
        } else {
            this.classList.remove('border-green-300');
            this.classList.add('border-red-300');
        }
    } else {
        this.classList.remove('border-red-300', 'border-green-300');
    }
});
</script>

</body>
</html>
