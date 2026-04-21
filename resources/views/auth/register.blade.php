<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - JBmotorBekas</title>
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
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/svg%3E");
        }

        .register-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .register-card:hover {
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

        .register-btn {
<<<<<<< HEAD
            background: linear-gradient(135deg, #dc2626, #b91c1c);
=======
            background: linear-gradient(135deg, 
>>>>>>> 91c9b62eef1e7d271b5d76301b57237376479849
            transition: all 0.2s ease;
            box-shadow: 0 4px 14px rgba(220, 38, 38, 0.3);
        }

        .register-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(220, 38, 38, 0.4);
        }

        .login-link {
            transition: all 0.2s ease;
        }

        .login-link:hover {
<<<<<<< HEAD
            color: #dc2626;
=======
            color: 
>>>>>>> 91c9b62eef1e7d271b5d76301b57237376479849
        }

        .password-strength {
            transition: all 0.2s ease;
        }

        .password-strength.weak {
<<<<<<< HEAD
            color: #ef4444;
        }

        .password-strength.medium {
            color: #f59e0b;
        }

        .password-strength.strong {
            color: #22c55e#dc2626;
=======
            color: 
        }

        .password-strength.medium {
            color: 
        }

        .password-strength.strong {
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
                🎉 Bergabung Sekarang
            </div>
            <h1 class="text-5xl md:text-6xl font-extrabold text-white mb-4 leading-tight tracking-tight">
                Bergabung dengan
            </h1>
            <h1 class="text-5xl md:text-6xl font-extrabold text-white mb-4 leading-tight tracking-tight">
                JBmotorBekas
            </h1>
            <p class="text-red-200 text-lg mb-8 leading-relaxed">
                Mulai perjalanan Anda dalam jual beli motor bekas yang aman dan terpercaya
            </p>
            <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                <div class="flex items-center justify-center gap-3 text-white/90">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    <span class="font-semibold">Komunitas Terpercaya</span>
                </div>
                <p class="text-white/80 text-sm mt-2">Bergabung dengan ribuan pengguna yang sudah mempercayai platform kami</p>
            </div>
        </div>
    </div>

    <!-- RIGHT SIDE - REGISTER FORM -->
    <div class="flex items-center justify-center p-6">
        <div class="w-full max-w-md">
            <div class="register-card rounded-2xl p-8">
                <!-- Header -->
                <div class="text-center mb-8">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-red-100 rounded-full mb-4">
                        <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                        </svg>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-2">Buat Akun Baru</h2>
                    <p class="text-gray-600">Isi data Anda untuk bergabung dengan komunitas kami</p>
                </div>

                <!-- Error Messages -->
                @if ($errors->any())
                    <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl">
                        <div class="flex items-center gap-2 mb-1">
                            <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                            </svg>
                            <span class="font-semibold">Pendaftaran Gagal</span>
                        </div>
                        <ul class="list-disc list-inside ml-7 text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Register Form -->
                <form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf

                    <!-- Name Field -->
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                            Nama Lengkap <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input id="name" type="text" name="name" value="{{ old('name') }}"
                                class="input-field w-full px-4 py-3 rounded-xl text-gray-900 placeholder-gray-500 focus:outline-none"
                                placeholder="Masukkan nama lengkap Anda" required autofocus>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                        </div>
                        @error('name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email Field -->
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input id="email" type="email" name="email" value="{{ old('email') }}"
                                class="input-field w-full px-4 py-3 rounded-xl text-gray-900 placeholder-gray-500 focus:outline-none"
                                placeholder="Masukkan email aktif Anda" required>
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

                    <!-- Phone Field -->
                    <div>
                        <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">
                            Nomor HP <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input id="phone" type="text" name="phone" value="{{ old('phone') }}"
                                class="input-field w-full px-4 py-3 rounded-xl text-gray-900 placeholder-gray-500 focus:outline-none"
                                placeholder="Contoh: 081234567890" required>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                            </div>
                        </div>
                        @error('phone')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password Field -->
                    <div>
                        <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                            Password <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input id="password" type="password" name="password"
                                class="input-field w-full px-4 py-3 rounded-xl text-gray-900 placeholder-gray-500 focus:outline-none"
                                placeholder="Minimal 8 karakter" required>
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

                    <!-- Confirm Password Field -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-2">
                            Konfirmasi Password <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input id="password_confirmation" type="password" name="password_confirmation"
                                class="input-field w-full px-4 py-3 rounded-xl text-gray-900 placeholder-gray-500 focus:outline-none"
                                placeholder="Ulangi password Anda" required>
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

                    <!-- Register Button -->
                    <button type="submit" class="register-btn w-full text-white font-bold py-4 px-6 rounded-xl text-center flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                        </svg>
                        Buat Akun
                    </button>
                </form>

                <!-- Login Link -->
                <div class="mt-8 text-center">
                    <p class="text-gray-600">
                        Sudah punya akun?
                        <a href="{{ route('login') }}" class="login-link font-bold text-red-600 hover:text-red-700 ml-1">
                            Masuk Sekarang
                        </a>
                    </p>
                </div>

                <!-- Terms & Privacy -->
                <div class="mt-6 bg-gray-50 border border-gray-200 rounded-xl p-4">
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-gray-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div>
                            <h4 class="font-semibold text-gray-900 mb-1">Syarat & Ketentuan</h4>
                            <p class="text-sm text-gray-700">Dengan mendaftar, Anda menyetujui <a href="#" class="text-red-600 hover:underline">Syarat Layanan</a> dan <a href="#" class="text-red-600 hover:underline">Kebijakan Privasi</a> kami.</p>
                        </div>
                    </div>
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

    
    const lengthCheck = document.getElementById('length-check');
    const letterCheck = document.getElementById('letter-check');
    const numberCheck = document.getElementById('number-check');

    if (lengthCheck) lengthCheck.className = checks.length ? 'w-2 h-2 rounded-full bg-green-500' : 'w-2 h-2 rounded-full bg-gray-300';
    if (letterCheck) letterCheck.className = checks.letter ? 'w-2 h-2 rounded-full bg-green-500' : 'w-2 h-2 rounded-full bg-gray-300';
    if (numberCheck) numberCheck.className = checks.number ? 'w-2 h-2 rounded-full bg-green-500' : 'w-2 h-2 rounded-full bg-gray-300';

    
    if (checks.length) strength++;
    if (checks.letter) strength++;
    if (checks.number) strength++;

    const strengthElement = document.getElementById('password-strength');
    const strengthText = document.getElementById('strength-text');

    if (password.length === 0) {
        if (strengthElement) strengthElement.className = 'mt-2 text-sm opacity-0 transition-opacity';
        return;
    }

    if (strengthElement) {
        strengthElement.className = 'mt-2 text-sm opacity-100 transition-opacity password-strength';

        if (strength < 2) {
            strengthElement.classList.add('weak');
            if (strengthText) strengthText.textContent = 'Lemah';
        } else if (strength === 2) {
            strengthElement.classList.add('medium');
            if (strengthText) strengthText.textContent = 'Sedang';
        } else {
            strengthElement.classList.add('strong');
            if (strengthText) strengthText.textContent = 'Kuat';
        }
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