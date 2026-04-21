<x-app-layout>
<style>
@import url('https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&display=swap');
.form-page * { font-family: 'Outfit', sans-serif; }
.form-input {
<<<<<<< HEAD
    border: 1.5px solid #e5e7eb;
    padding: 10px 16px; width: 100%; font-size: 0.875rem;
    transition: border-color 0.2s, box-shadow 0.2s; outline: none;
}
.form-input:focus { border-color: #2563eb; box-shadow: 0 0 0 3px rgba(37,99,235,0.1); }
.form-label { display: block; font-size: 0.8rem; font-weight: 600; color: #374151; margin-bottom: 6px; }
.section-card { background: white; border-radius: 20px; padding: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.06); border: 1px solid #e5e7eb; }
.submit-btn {
    background: linear-gradient(135deg, #2563eb, #1d4ed8);
=======
    border: 1.5px solid 
    padding: 10px 16px; width: 100%; font-size: 0.875rem;
    transition: border-color 0.2s, box-shadow 0.2s; outline: none;
}
.form-input:focus { border-color: 
.form-label { display: block; font-size: 0.8rem; font-weight: 600; color: 
.section-card { background: white; border-radius: 20px; padding: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.06); border: 1px solid 
.submit-btn {
    background: linear-gradient(135deg, 
>>>>>>> 91c9b62eef1e7d271b5d76301b57237376479849
    box-shadow: 0 4px 14px rgba(37,99,235,0.35);
    transition: all 0.2s;
}
.submit-btn:hover { transform: translateY(-1px); box-shadow: 0 6px 20px rgba(37,99,235,0.45); }
</style>

<div class="form-page min-h-screen bg-slate-100 py-8">
<div class="max-w-2xl mx-auto px-4">
    <div class="mb-6">
        <a href="{{ route('listing.index') }}" class="inline-flex items-center gap-1.5 text-blue-600 text-sm font-medium hover:underline">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            Kembali
        </a>
        <h1 class="text-2xl font-extrabold text-gray-900 mt-2">Jual Motor</h1>
        <p class="text-gray-500 text-sm mt-0.5">Isi detail motor yang ingin kamu jual</p>
    </div>
    @if($errors->any())
    <div class="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-xl mb-4 text-sm">
        @foreach($errors->all() as $e) <div>• {{ $e }}</div> @endforeach
    </div>
    @endif
    <form method="POST" action="{{ route('listing.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="section-card">
            <h2 class="font-bold text-gray-800 mb-4 flex items-center gap-2">
                <span class="w-6 h-6 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center text-xs font-bold">1</span>
                Informasi Motor
            </h2>
            <div class="space-y-4">
                <div>
                    <label class="form-label">Nama Motor *</label>
                    <input type="text" name="title" class="form-input" placeholder="Contoh: Honda CB150R 2022" value="{{ old('title') }}">
                </div>
                <div>
                    <label class="form-label">Kategori *</label>
                    <select name="category" class="form-input bg-white">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach(['Sport','Touring','Cruiser','Classic','Matic'] as $cat)
                            <option value="{{ $cat }}" {{ old('category') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="section-card">
            <h2 class="font-bold text-gray-800 mb-4 flex items-center gap-2">
                <span class="w-6 h-6 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center text-xs font-bold">2</span>
                Spesifikasi
            </h2>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="form-label">Harga (Rp) *</label>
                    <input type="number" name="price" class="form-input" placeholder="25000000" value="{{ old('price') }}">
                </div>
                <div>
                    <label class="form-label">Tahun *</label>
                    <input type="number" name="year" class="form-input" placeholder="2022" value="{{ old('year') }}">
                </div>
                <div>
                    <label class="form-label">Kapasitas Mesin (cc) *</label>
                    <input type="number" name="engine_cc" class="form-input" placeholder="150" value="{{ old('engine_cc') }}">
                </div>
                <div>
                    <label class="form-label">Kilometer *</label>
                    <input type="number" name="mileage" class="form-input" placeholder="12000" value="{{ old('mileage') }}">
                </div>
            </div>
        </div>

        <div class="section-card">
            <h2 class="font-bold text-gray-800 mb-4 flex items-center gap-2">
                <span class="w-6 h-6 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center text-xs font-bold">3</span>
                Detail & Lokasi
            </h2>
            <div class="space-y-4">
                <div>
                    <label class="form-label">Deskripsi *</label>
                    <textarea name="description" rows="4" class="form-input resize-none" placeholder="Jelaskan kondisi motor, kelengkapan, riwayat servis...">{{ old('description') }}</textarea>
                </div>
                <div>
                    <label class="form-label">Lokasi *</label>
                    <input type="text" name="location" class="form-input" placeholder="Contoh: Jakarta Selatan" value="{{ old('location') }}">
                </div>
            </div>
        </div>

        <div class="section-card">
            <h2 class="font-bold text-gray-800 mb-4 flex items-center gap-2">
                <span class="w-6 h-6 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center text-xs font-bold">4</span>
                Foto Motor
            </h2>
            <label class="block w-full border-2 border-dashed border-gray-200 rounded-xl p-8 text-center cursor-pointer hover:border-blue-400 hover:bg-blue-50/50 transition-colors">
                <div class="text-3xl mb-2">📷</div>
                <p class="text-sm font-medium text-gray-600">Klik untuk pilih foto</p>
                <p class="text-xs text-gray-400 mt-1">JPG, PNG — bisa lebih dari 1</p>
                <input type="file" name="images[]" multiple accept="image/*" class="sr-only" onchange="previewImages(this)">
            </label>
            <div id="image-preview" class="flex gap-2 mt-3 flex-wrap"></div>
        </div>

        <div class="flex gap-3">
            <a href="{{ route('listing.index') }}"
                class="w-1/3 text-center border border-gray-300 rounded-xl py-3 text-sm font-medium hover:bg-gray-100 transition-colors">
                Batal
            </a>
            <button type="submit"
                class="submit-btn w-2/3 text-white py-3 rounded-xl font-bold text-sm">
                🚀 Posting Iklan
            </button>
        </div>
    </form>
</div>
</div>

<script>
function previewImages(input) {
    const preview = document.getElementById('image-preview');
    preview.innerHTML = '';
    Array.from(input.files).forEach(file => {
        const reader = new FileReader();
        reader.onload = e => {
            const img = document.createElement('img');
            img.src = e.target.result;
            img.className = 'w-20 h-16 object-cover rounded-xl border-2 border-blue-200';
            preview.appendChild(img);
        };
        reader.readAsDataURL(file);
    });
}
</script>

</x-app-layout>