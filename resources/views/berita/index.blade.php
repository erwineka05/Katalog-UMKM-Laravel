<x-layout>
    <x-slot:title>Berita Terkini</x-slot:title>

    <main class="container mx-auto px-6 py-12">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900">Berita & Informasi</h1>
            <p class="text-gray-600 mt-2">Dapatkan informasi terbaru seputar kegiatan dan perkembangan di Umbulharjo.</p>
        </div>

        @if ($beritas->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($beritas as $berita)
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
                            {{-- Menampilkan ringkasan konten --}}
                            <p class="mt-2 text-sm text-gray-600 flex-grow">
                                {{ Illuminate\Support\Str::limit($berita->content, 100) }}
                            </p>
                            <div class="mt-4 text-xs text-gray-500">
                                Diterbitkan pada {{ $berita->created_at->format('d M Y') }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-16">
                {{ $beritas->links() }}
            </div>
        @else
            <div class="text-center py-16">
                <h2 class="text-2xl font-semibold text-gray-700">Belum Ada Berita</h2>
                <p class="text-gray-500 mt-2">Saat ini belum ada berita yang diterbitkan. Silakan kembali lagi nanti.</p>
            </div>
        @endif
    </main>
</x-layout>