<x-app-layout>
    <div class="min-h-screen bg-gray-100 py-10">
        <div class="max-w-4xl mx-auto bg-white p-8 rounded-2xl shadow">
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Edit Motor</h2>
                <p class="text-gray-500 text-sm">Update informasi motor kamu</p>
            </div>
            @if ($errors->any())
                <div class="bg-red-100 text-red-600 p-4 mb-6 rounded-lg">
                    <ul class="text-sm">
                        @foreach ($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('listing.update', $listing->id) }}" enctype="multipart/form-data" class="space-y-5">
                @csrf
                @method('PUT')
                <div>
                    <label class="text-sm text-gray-600">Nama Motor</label>
                    <input type="text" name="title" value="{{ $listing->title }}"
                        class="border rounded-lg px-4 py-2 w-full focus:ring-2 focus:ring-blue-500 outline-none">
                </div>

                <div>
                    <label class="text-sm text-gray-600">Kategori</label>
                    <select name="category"
                        class="border rounded-lg px-4 py-2 w-full focus:ring-2 focus:ring-blue-500 outline-none">
                        @foreach (['Sport','Touring','Cruiser','Classic','Matic'] as $cat)
                            <option value="{{ $cat }}" {{ $listing->category == $cat ? 'selected' : '' }}>
                                {{ $cat }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="text-sm text-gray-600">Harga</label>
                        <input type="number" name="price" value="{{ $listing->price }}"
                            class="border rounded-lg px-4 py-2 w-full focus:ring-2 focus:ring-blue-500 outline-none">
                    </div>
                    <div>
                        <label class="text-sm text-gray-600">Tahun</label>
                        <input type="number" name="year" value="{{ $listing->year }}"
                            class="border rounded-lg px-4 py-2 w-full focus:ring-2 focus:ring-blue-500 outline-none">
                    </div>
                    <div>
                        <label class="text-sm text-gray-600">CC</label>
                        <input type="number" name="engine_cc" value="{{ $listing->engine_cc }}"
                            class="border rounded-lg px-4 py-2 w-full focus:ring-2 focus:ring-blue-500 outline-none">
                    </div>
                    <div>
                        <label class="text-sm text-gray-600">Kilometer</label>
                        <input type="number" name="mileage" value="{{ $listing->mileage }}"
                            class="border rounded-lg px-4 py-2 w-full focus:ring-2 focus:ring-blue-500 outline-none">
                    </div>
                </div>

                <div>
                    <label class="text-sm text-gray-600">Deskripsi</label>
                    <textarea name="description" rows="4"
                        class="border rounded-lg px-4 py-2 w-full focus:ring-2 focus:ring-blue-500 outline-none">{{ $listing->description }}</textarea>
                </div>

                <div>
                    <label class="text-sm text-gray-600">Lokasi</label>
                    <input type="text" name="location" value="{{ $listing->location }}"
                        class="border rounded-lg px-4 py-2 w-full focus:ring-2 focus:ring-blue-500 outline-none">
                </div>

                @if($listing->images->count())
                    <div>
                        <label class="text-sm text-gray-600">Foto Saat Ini</label>
                        <div class="flex gap-2 mt-2 flex-wrap">
                            @foreach($listing->images as $img)
                                <img src="{{ asset('storage/' . $img->image) }}"
                                    class="w-28 h-20 object-cover rounded-lg border">
                            @endforeach
                        </div>
                    </div>
                @endif

                <div>
                    <label class="text-sm text-gray-600">Ganti Foto (opsional)</label>
                    <input type="file" name="images[]" multiple
                        class="border rounded-lg px-4 py-2 w-full">
                    <p class="text-xs text-gray-400 mt-1">Upload foto baru untuk mengganti yang lama</p>
                </div>

                <div class="flex gap-3 pt-4">
                    <a href="{{ route('listing.show', $listing->id) }}"
                        class="w-1/3 text-center border rounded-lg py-2 hover:bg-gray-100">
                        Kembali
                    </a>
                    <button type="submit"
                        class="w-2/3 bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg shadow transition">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>