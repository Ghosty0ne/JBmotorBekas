<x-app-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&display=swap');

        .profile-edit * {
            font-family: 'Outfit', sans-serif;
        }

        .form-input {
            border: 1.5px solid #e2e8f0;
            border-radius: 12px;
            padding: 10px 16px;
            width: 100%;
            font-size: 0.875rem;
            transition: border-color 0.2s, box-shadow 0.2s;
            outline: none;
            background: white;
        }

        .form-input:focus {
            border-color: #2563EB;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .form-label {
            display: block;
            font-size: 0.75rem;
            font-weight: 600;
            color: #64748b;
            margin-bottom: 6px;
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }

        .section-card {
            background: white;
            border-radius: 20px;
            padding: 24px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.06);
            border: 1px solid #f1f5f9;
            margin-bottom: 16px;
        }
    </style>

    <div class="profile-edit min-h-screen bg-slate-100 py-8">
        <div class="max-w-lg mx-auto px-4">
            <div class="mb-6">
                <a href="{{ route('profile') }}"
                    class="inline-flex items-center gap-1.5 text-blue-600 text-sm font-medium hover:underline">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Kembali
                </a>
                <h1 class="text-2xl font-extrabold text-gray-900 mt-2">Edit Profil</h1>
            </div>

            @if(session('status') === 'profile-updated')
                <div
                    class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl mb-4 text-sm flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Profil berhasil diperbarui!
                </div>

            @endif
            @if($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-xl mb-4 text-sm">
                    @foreach($errors->all() as $e) <div>• {{ $e }}</div> @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf @method('PATCH')
                <div class="section-card">
                    <h2 class="font-bold text-gray-800 mb-4">Foto Profil</h2>
                    <div class="flex items-center gap-5">
                        <div class="relative">
                            @if($user->avatar)
                                <img id="avatar-preview" src="{{ asset('storage/' . $user->avatar) }}"
                                    class="w-20 h-20 rounded-2xl object-cover border-2 border-blue-100">
                            @else
                                <img id="avatar-preview"
                                    src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&size=80&background=2563EB&color=fff&bold=true"
                                    class="w-20 h-20 rounded-2xl border-2 border-blue-100">
                            @endif
                            <label
                                class="absolute -bottom-1 -right-1 w-6 h-6 bg-blue-600 rounded-full flex items-center justify-center cursor-pointer shadow-md hover:bg-blue-700 transition-colors">
                                <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                                <input type="file" name="avatar" accept="image/*" class="sr-only"
                                    onchange="previewAvatar(this)">
                            </label>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800 text-sm">{{ $user->name }}</p>
                            <p class="text-xs text-gray-400 mt-0.5">Klik ikon pensil untuk ganti foto</p>
                            <p class="text-xs text-gray-400">JPG, PNG — maks 2MB</p>
                        </div>
                    </div>
                </div>

                <div class="section-card">
                    <h2 class="font-bold text-gray-800 mb-4">Informasi Akun</h2>
                    <div class="space-y-4">
                        <div>
                            <label class="form-label">Nama *</label>
                            <input type="text" name="name" class="form-input" value="{{ old('name', $user->name) }}">
                        </div>
                        <div>
                            <label class="form-label">Email *</label>
                            <input type="email" name="email" class="form-input"
                                value="{{ old('email', $user->email) }}">
                        </div>
                        <div>
                            <label class="form-label">No. HP</label>
                            <input type="text" name="phone" class="form-input" placeholder="081234567890"
                                value="{{ old('phone', $user->phone) }}">
                        </div>
                        <div>
                            <label class="form-label">Bio</label>
                            <textarea name="bio" rows="3" class="form-input resize-none"
                                placeholder="Ceritakan sedikit tentang dirimu...">{{ old('bio', $user->bio) }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="flex gap-3">
                    <a href="{{ route('profile') }}"
                        class="w-1/3 text-center border border-gray-300 rounded-xl py-3 text-sm font-medium hover:bg-gray-100 transition-colors">
                        Batal
                    </a>
                    <button type="submit"
                        class="w-2/3 bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl font-bold text-sm transition-colors shadow-md">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script>
        function previewAvatar(input) {
            if (input.files?.[0]) {
                const reader = new FileReader();
                reader.onload = e => { document.getElementById('avatar-preview').src = e.target.result; };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</x-app-layout>