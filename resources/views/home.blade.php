<x-layout>

    <main>
        <section class="container mx-auto px-6 py-16">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="text-center md:text-left">
                    <span class="text-green-600 font-semibold tracking-wider uppercase">#KATALOG PRODUK</span>
                    <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mt-2">Serba - Serbi Buah Tangan <span class="text-green-600">Umbulharjo</span></h1>
                    <p class="mt-4 text-gray-600 text-lg">Mendukung pelaku usaha, melestarikan budaya, dan menghadirkan buah tangan terbaik dari lereng Merapi. Dari kuliner, fashion hingga kerajinan tangan, setiap produk menyimpan cerita khas Umbulharjo</p>
                    <a href="{{ url('/produk') }}" class="mt-8 inline-block bg-gray-800 text-white px-8 py-3 rounded-md font-semibold text-lg hover:bg-gray-900">Lihat Produk</a>
                </div>
                <div class="mt-8 md:mt-0">
                    <img src="{{ asset('images/products/umkm.jpg') }}" alt="Model Baju Muslim" class="rounded-lg shadow-xl w-full h-full object-cover">
                </div>
            </div>
        </section>

        <section class="py-20">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">Produk Kami</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4 md:gap-8">
                @foreach ($otherProducts as $product)
                    <div class="group relative bg-white rounded-lg shadow-md overflow-hidden flex flex-col">
                        <a href="{{ route('produk.show', $product) }}" class="block">
                            <div class="w-full aspect-square md:h-80 overflow-hidden">
                                
                                @if($product->images->isNotEmpty())
                                    <img src="{{ asset('storage/' . $product->images->first()->image_url) }}" alt="{{ $product->name }}" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-300">
                                @else
                                    <img src="https://via.placeholder.com/400x300.png?text=Gambar+Belum+Tersedia" alt="{{ $product->name }}" class="w-full h-full object-cover">
                                @endif
                            </div>
                        </a>
                        <div class="p-6 border-t border-gray-200 flex flex-col flex-grow">
                            <h3 class="font-semibold text-gray-800">
                                <a href="{{ route('produk.show', $product) }}"><span class="absolute inset-0"></span>{{ $product->name }}</a>
                            </h3>
                            <div class="mt-auto pt-4">
                                <div>
                                    <span class="text-sm text-gray-500">Mulai Dari</span>
                                    <p class="font-bold text-lg text-gray-900">Rp{{ number_format($product->price) }}</p>
                                </div>
                                    <span class="block mt-2 text-sm font-semibold text-green-600 group-hover:underline">Lihat Detail</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center mt-12">
                 <a href="{{ url('/produk') }}" class="px-8 py-3 border-2 border-gray-800 text-gray-800 font-semibold rounded-md hover:bg-gray-800 hover:text-white transition-colors">Lihat Semua Produk</a>
            </div>
        </div>
    </section>

    <section class="py-20 bg-white"> 
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">Jelajahi Eduwisata <span class="text-green-600">Umbulharjo</span></h2>
            @if ($latestWisatas->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($latestWisatas as $wisata)
                        <a href="{{ route('wisata.show', $wisata) }}" class="group block bg-white rounded-lg shadow-md overflow-hidden flex flex-col hover:shadow-xl transition-shadow duration-300">
                            <div class="w-full aspect-video overflow-hidden">
                                @if($wisata->gambar_url)
                                    <img src="{{ asset('storage/' . $wisata->gambar_url) }}" alt="{{ $wisata->nama }}" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-300">
                                @else
                                    <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    </div>
                                @endif
                            </div>
                            <div class="p-6 flex flex-col flex-grow">
                                <h3 class="font-bold text-lg text-gray-900 mb-2">{{ $wisata->nama }}</h3>
                                <p class="text-gray-700 text-sm flex-grow">
                                    {{ Illuminate\Support\Str::limit($wisata->deskripsi, 100) }}
                                </p>
                                <span class="mt-4 text-sm font-semibold text-green-600 group-hover:underline self-start">Lihat Detail →</span>
                            </div>
                        </a>
                    @endforeach
                </div>

                <div class="text-center mt-12">
                     <a href="{{ route('wisata.index') }}" class="px-8 py-3 border-2 border-gray-800 text-gray-800 font-semibold rounded-md hover:bg-gray-800 hover:text-white transition-colors">
                        Lihat Semua Wisata
                    </a>
                </div>
            @else
                <p class="text-center text-gray-500">Data wisata belum tersedia.</p>
            @endif
        </div>
    </section>
    
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">Berita Terbaru</h2>
            
            @if ($latestBeritas->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($latestBeritas as $berita)
                        <div class="group relative bg-white rounded-lg shadow-md overflow-hidden flex flex-col">
                            <a href="{{ route('berita.show', $berita) }}" class="block">
                                <div class="w-full aspect-video overflow-hidden">
                                    <img src="{{ asset('storage/' . $berita->image_url) }}" alt="{{ $berita->title }}" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-300">
                                </div>
                            </a>
                            <div class="p-6 flex flex-col flex-grow">
                                <h3 class="font-semibold text-lg text-gray-900">
                                    <a href="{{ route('berita.show', $berita) }}">
                                        <span class="absolute inset-0" aria-hidden="true"></span>
                                        {{ $berita->title }}
                                    </a>
                                </h3>
                                <p class="mt-2 text-sm text-gray-600 flex-grow">
                                    {{ Illuminate\Support\Str::limit(strip_tags($berita->content), 80) }}
                                </p>
                                <div class="mt-4 text-xs text-gray-500">
                                    {{ $berita->created_at->format('d M Y') }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Tombol Lihat Semua Berita --}}
                <div class="text-center mt-12">
                     <a href="{{ route('berita.index') }}" class="px-8 py-3 border-2 border-gray-800 text-gray-800 font-semibold rounded-md hover:bg-gray-800 hover:text-white transition-colors">
                        Lihat Semua Berita
                    </a>
                </div>
            @else
                <p class="text-center text-gray-500">Belum ada berita yang diterbitkan.</p>
            @endif
        </div>
    </section>
    </main>

</x-layout>