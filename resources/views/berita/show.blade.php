<x-layout>
    <x-slot:title>{{ $berita->title }}</x-slot:title>

    <main class="container mx-auto px-6 py-12">
        <div class="max-w-4xl mx-auto">
            
            <div class="text-sm text-gray-500 mb-4">
                <a href="{{ url('/') }}" class="hover:text-green-600">Home</a> / 
                <a href="{{ url('/berita') }}" class="hover:text-green-600">Berita</a> /
                <span class="truncate">{{ $berita->title }}</span>
            </div>

            <h1 class="text-4xl font-extrabold text-gray-900 mb-4">{{ $berita->title }}</h1>
            
            <p class="text-gray-500 text-sm mb-6">Diterbitkan pada: {{ $berita->created_at->format('l, d F Y') }}</p>

            <div class="w-full aspect-video rounded-lg shadow-lg overflow-hidden mb-8">
                <img src="{{ asset('storage/' . $berita->image_url) }}" alt="{{ $berita->title }}" class="w-full h-full object-cover">
            </div>

            <div class="prose max-w-none text-gray-800 leading-relaxed">
                <p>{!! nl2br(e($berita->content)) !!}</p>
            </div>

            <div class="mt-12">
                <a href="{{ route('berita.index') }}" class="inline-flex items-center text-green-600 hover:text-green-800 font-semibold">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali ke Daftar Berita
                </a>
            </div>

        </div>
    </main>
</x-layout>