<x-layout>

    <main class="container mx-auto px-6 py-12">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900">Destinasi Wisata</h1>
            <p class="text-gray-600 mt-2">Selamat datang di portal eduwisata Umbulharjo. Temukan pengalaman belajar yang menyenangkan di eduwisata Umbulharjo</p>
        </div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    @forelse ($daftar_wisata as $item)
        <a href="{{ route('wisata.show', $item) }}" class="group block bg-white rounded-lg shadow-md overflow-hidden flex flex-col hover:shadow-xl transition-shadow duration-300">
            <div class="w-full aspect-video overflow-hidden">
                @if($item->gambar_url)
                    <img src="{{ asset('storage/' . $item->gambar_url) }}" alt="{{ $item->nama }}" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-300">
                @else
                    {{-- Placeholder --}}
                @endif
            </div>
            <div class="p-6 flex flex-col flex-grow">
                <h3 class="font-bold text-xl text-gray-900 mb-2">{{ $item->nama }}</h3>
                <p class="text-gray-700 text-sm flex-grow">
                    {{ Illuminate\Support\Str::limit($item->deskripsi, 150) }}
                </p>
                
                <span class="mt-4 text-sm font-semibold text-green-600 group-hover:underline self-start">Lihat Detail →</span>
            </div>
        </a>
    @empty
        <p class="text-center text-gray-500 md:col-span-2 lg:col-span-3">Belum ada data wisata yang ditambahkan.</p>
    @endforelse
</div>
    </main>

</x-layout>
