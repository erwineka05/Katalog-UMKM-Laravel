<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Tempat Wisata') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 text-gray-900">
                    
                    @if ($errors->any())
                        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                            {{-- ... (kode untuk menampilkan error) ... --}}
                        </div>
                    @endif

                    <form action="{{ route('admin.wisata.update', $wisata) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') 
                        
                        {{-- Nama --}}
                        <div class="mb-4">
                            <label for="nama" class="block font-medium text-sm text-gray-700">Nama Tempat Wisata</label>
                            <input type="text" name="nama" id="nama" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('nama', $wisata->nama) }}" required>
                        </div>

                        {{-- Deskripsi --}}
                        <div class="mb-4">
                            <label for="deskripsi" class="block font-medium text-sm text-gray-700">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" rows="10" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>{{ old('deskripsi', $wisata->deskripsi) }}</textarea>
                        </div>

                        {{-- Upload Gambar --}}
                        <div class="mb-6">
                            <label class="block font-medium text-sm text-gray-700">Gambar Saat Ini</label>
                            @if($wisata->gambar_url)
                                <img src="{{ asset('storage/' . $wisata->gambar_url) }}" alt="{{ $wisata->nama }}" class="h-32 object-cover rounded-md mt-2">
                            @else
                                <p class="text-sm text-gray-500 mt-2">Tidak ada gambar.</p>
                            @endif
                            
                            <label for="gambar" class="block font-medium text-sm text-gray-700 mt-4">Ganti Gambar (Opsional)</label>
                            <input type="file" name="gambar" id="gambar" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
                        </div>
                        
                        <div class="flex items-center justify-end mt-8">
                            <a href="{{ route('admin.wisata.index') }}" class="text-gray-600 hover:text-gray-900 mr-4">Batal</a>
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