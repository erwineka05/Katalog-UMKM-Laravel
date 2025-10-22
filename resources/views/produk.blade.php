<x-layout>

    <main class="container mx-auto px-6 py-12">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900">Produk Kami</h1>
            <p class="text-gray-600 mt-2">Temukan koleksi Produk terbaik kami.</p>
        </div>

        <div class="mb-12 max-w-2xl mx-auto">
            <form action="{{ url('/produk') }}" method="GET">
                <div class="relative">
                    <input 
                        type="text" 
                        name="search" 
                        placeholder="Cari Produk disini.." 
                        class="w-full py-3 px-5 pr-12 text-gray-700 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-green-500"
                        value="{{ $keyword }}"
                    >
                    <button type="submit" class="absolute top-1/2 right-3 -translate-y-1/2 p-2 bg-green-600 text-white rounded-full hover:bg-green-700">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </button>
                </div>
            </form>
        </div>

        @if ($products->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @foreach ($products as $product)
                <div class="group relative bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="w-full aspect-square md:h-80 overflow-hidden">
                        @if($product->images->isNotEmpty())
                        <img src="{{ asset('storage/' . $product->images->first()->image_url) }}" alt="{{ $product->name }}" class="w-full h-96 object-cover transform group-hover:scale-110 transition-transform duration-300">
                        @else
                        <img src="https://via.placeholder.com/400x480.png?text=Gambar+Belum+Tersedia" alt="{{ $product->name }}" class="w-full h-96 object-cover">
                        @endif
                    </div>
    
            <div class="p-6 border-t border-gray-200">
                <h3 class="font-semibold text-gray-800 h-12">
                    <a href="{{ route('produk.show', $product) }}">
                        <span class="absolute inset-0" aria-hidden="true"></span>
                        {{ $product->name }}
                    </a>
                </h3>
            <div class="flex justify-between items-center mt-4">
                <div>
                    <span class="text-sm text-gray-500">Mulai Dari</span>
                    <p class="font-bold text-lg text-gray-900">Rp{{ number_format($product->price) }}</p>
                </div>
                <span class="text-sm font-semibold text-green-600 group-hover:underline">Lihat Detail &rarr;</span>
            </div>
        </div>
    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-16">
                <h2 class="text-2xl font-semibold text-gray-700">Produk Tidak Ditemukan</h2>
                <p class="text-gray-500 mt-2">Maaf, produk yang Anda cari dengan kata kunci "{{ $keyword }}" tidak tersedia.</p>
            </div>
        @endif
    </main>

</x-layout>