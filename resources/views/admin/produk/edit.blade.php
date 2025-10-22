<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Produk: ') . $product->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 text-gray-900">
                    
                    @if ($errors->any())
                        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                            <strong class="font-bold">Oops!</strong>
                            <ul class="list-disc list-inside mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- PERBAIKAN: Menggunakan variabel $product --}}
                    <form action="{{ route('admin.produk.update', $product) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-4">
                            <label for="name" class="block font-medium text-sm text-gray-700">Nama Produk</label>
                            <input type="text" name="name" id="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('name', $product->name) }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block font-medium text-sm text-gray-700">Deskripsi</label>
                            <textarea name="description" id="description" rows="5" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('description', $product->description) }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="address" class="block font-medium text-sm text-gray-700">Alamat UMKM/Lokasi Produk</label>
                            <textarea name="address" id="address" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('address', $product->address) }}"</textarea>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="mb-4">
                                <label for="price" class="block font-medium text-sm text-gray-700">Harga</label>
                                <input type="number" name="price" id="price" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('price', $product->price) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="phone_number" class="block font-medium text-sm text-gray-700">No. Telepon/WA Pemilik</label>
                                <input type="text" name="phone_number" id="phone_number" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('phone_number', $product->phone_number) }}">
                            </div>
                        </div>

                        <div class="mb-6">
                            <label class="block font-medium text-sm text-gray-700">Gambar Produk Saat Ini</label>
                            <div class="flex flex-wrap gap-4 mt-2">
                                @forelse($product->images as $image)
                                    <img src="{{ asset('storage/' . $image->image_url) }}" class="h-20 w-20 object-cover rounded-md">
                                @empty
                                    <p class="text-sm text-gray-500">Tidak ada gambar.</p>
                                @endforelse
                            </div>
                            <label for="images" class="block font-medium text-sm text-gray-700 mt-4">Ganti Gambar (Pilih gambar baru untuk mengganti semua gambar lama)</label>
                            <input type="file" name="images[]" id="images" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100" multiple>
                        </div>

                        <div 
                            x-data="{ 
                                socialLinks: {{ $product->socialLinks->map(fn($link) => ['platform' => $link->platform, 'url' => $link->url])->toJson() }},
                                addNewLink() { this.socialLinks.push({ platform: 'Instagram', url: '' }); },
                                removeLink(index) { this.socialLinks.splice(index, 1); }
                            }"
                            class="mt-6 pt-6 border-t"
                        >
                            <label class="block text-gray-700 font-bold mb-2">Link Media Sosial Produk</label>
                            <template x-for="(link, index) in socialLinks" :key="index">
                                <div class="flex items-center space-x-2 mb-2 p-2 border rounded-md">
                                    <div class="w-1/3">
                                        <label class="text-xs text-gray-600">Platform</label>
                                        <select :name="`social_links[${index}][platform]`" class="w-full text-sm border-gray-300 rounded-md shadow-sm" :value="link.platform">
                                            <option value="Instagram">Instagram</option>
                                            <option value="TikTok">TikTok</option>
                                            <option value="Facebook">Facebook</option>
                                            <option value="YouTube">YouTube</option>
                                        </select>
                                    </div>
                                    <div class="flex-1">
                                        <label class="text-xs text-gray-600">URL Lengkap</label>
                                        <input type="url" :name="`social_links[${index}][url]`" :value="link.url" class="w-full text-sm border-gray-300 rounded-md shadow-sm" placeholder="https://...">
                                    </div>
                                    <button @click.prevent="removeLink(index)" class="self-end p-2 bg-red-500 text-white rounded-md hover:bg-red-600">&times;</button>
                                </div>
                            </template>
                            <button @click.prevent="addNewLink()" class="mt-2 text-sm text-blue-600 hover:underline">+ Tambah Link Lain</button>
                        </div>
                        
                        <div class="flex items-center justify-end mt-8">
                            <a href="{{ route('admin.produk.index') }}" class="text-gray-600 hover:text-gray-900 mr-4">Batal</a>
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
