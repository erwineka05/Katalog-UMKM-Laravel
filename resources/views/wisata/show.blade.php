<x-layout>
    <x-slot:title>{{ $wisata->nama }}</x-slot:title>

    <main class="container mx-auto px-6 py-12">
        <div class="max-w-4xl mx-auto bg-white p-6 md:p-8 rounded-lg shadow-md">

            <div class="text-sm text-gray-500 mb-4">
                <a href="{{ url('/') }}" class="hover:text-green-600">Home</a> / 
                <a href="{{ route('wisata.index') }}" class="hover:text-green-600">Wisata</a> /
                <span class="truncate">{{ $wisata->nama }}</span>
            </div>

            <h1 class="text-4xl font-extrabold text-gray-900 mb-6">{{ $wisata->nama }}</h1>

            @if($wisata->gambar_url)
                <div class="w-full aspect-video rounded-lg shadow-lg overflow-hidden mb-8">
                    <img src="{{ asset('storage/' . $wisata->gambar_url) }}" alt="{{ $wisata->nama }}" class="w-full h-full object-cover">
                </div>
            @endif

            <div class="prose max-w-none text-gray-800 leading-relaxed">
                <p>{!! nl2br(e($wisata->deskripsi)) !!}</p>
            </div>

            <div class="mt-12 pt-6 border-t">
                <a href="{{ route('wisata.index') }}" class="inline-flex items-center text-green-600 hover:text-green-800 font-semibold">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali ke Daftar Wisata
                </a>
            </div>

        </div>
    </main>
</x-layout>