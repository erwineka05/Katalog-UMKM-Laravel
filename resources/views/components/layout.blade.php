<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Umbulharjo</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display.swap" rel="stylesheet">

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>

    <style> body { font-family: 'Poppins', sans-serif; } </style>
</head>
<body class="bg-white">

    <header x-data="{ sidebarOpen: false }" class="bg-white shadow-sm sticky top-0 z-50">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="{{ url('/') }}" class="flex items-center"> 
                <img src="{{ asset('images/icons/logo.png') }}" alt="Katalog UMKM Logo" class="h-10 mr-2"> 
                <span class="text-2xl font-bold text-gray-800">KaliKuning<span class="bg-green-600 text-white text-xs font-semibold px-2 py-1 rounded-full ml-1">Brand</span></span> 
            </a>
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ url('/') }}" class="text-gray-600 hover:text-green-600">Home</a>
                <a href="{{ url('/produk') }}" class="text-gray-600 hover:text-green-600">Produk Kami</a>
                <a href="{{ url('/wisata') }}" class="text-gray-600 hover:text-green-600">Eduwisata</a>
                <a href="{{ url('/berita') }}" class="text-gray-600 hover:text-green-600">Berita</a>
            </div>
            <a href="https://wa.me/6287731728778?text=Halo%20saya%20ingin%20bertanya%20tentang%20produk%20KaliKuning%20Brand"
            target="_blank" class="hidden md:block bg-green-600 text-white px-5 py-2 rounded-md font-semibold hover:bg-green-700">Kontak Kami</a>
            
            <div class="md:hidden">
                <button @click="sidebarOpen = true" class="text-gray-800">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                </button>
            </div>
        </nav>

        <div x-show="sidebarOpen" @click.away="sidebarOpen = false" class="fixed inset-0 bg-black bg-opacity-50 z-50 md:hidden" x-transition:enter="transition-opacity ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-in duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
            <div class="fixed top-0 left-0 h-full w-64 bg-white shadow-lg p-6" x-show="sidebarOpen" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full">
                <div class="flex justify-between items-center mb-8">
                    <div class="text-xl font-bold text-gray-800">Menu</div>
                    <button @click="sidebarOpen = false">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>
                <nav class="flex flex-col space-y-4">
                    <a href="{{ url('/') }}" class="text-gray-700 hover:bg-gray-100 p-2 rounded">Home</a>
                    <a href="{{ url('/produk') }}" class="text-gray-700 hover:bg-gray-100 p-2 rounded">Produk Kami</a>
                    <a href="{{ url('/wisata') }}" class="text-gray-700 hover:bg-gray-100 p-2 rounded">Eduwisata</a>
                    <a href="{{ url('/berita') }}" class="text-gray-700 hover:bg-gray-100 p-2 rounded">Berita</a>
                    <a href="https://wa.me/6287731728778?text=Halo%20saya%20ingin%20bertanya%20tentang%20produk%20KaliKuning%20Brand"
                    target="_blank" class="mt-4 bg-green-600 text-white text-center px-5 py-2 rounded-md font-semibold hover:bg-green-700">Kontak Kami</a>
                </nav>
            </div>
        </div>
    </header>

    <main>
        {{ $slot }}
    </main>
    
    <footer class="bg-slate-800 text-gray-300">
    <div class="container mx-auto px-6 py-12">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            
            <div>
                <h2 class="text-3xl font-bold text-white mb-2">KaliKuning <span class="text-green-600">Brand</span></h2>
                <p class="text-gray-400 mb-6">Pusat informasi digital oleh-oleh Umbulharjo, Cangkringan, Sleman</p>
                
                <div class="space-y-4">
                    <div class="flex items-start">
                        <svg class="w-5 h-5 mt-1 mr-4 text-green-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <a href="https://www.google.com/maps?q=Jl.+Kaliurang+KM+23,+Umbulharjo,+Cangkringan,+Sleman,+Yogyakarta"target="_blank"
                        class="hover:text-green-400 hover:underline">
                        Jl. Kaliurang KM 23, Umbulharjo, Cangkringan, Sleman, Yogyakarta</a>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-4 text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.894 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.886-.001 2.269.655 4.505 1.782 6.574l-1.06 3.877 3.96-1.042z"></path></svg>
                        <a href="https://wa.me/6287731728778" target="_blank" class="hover:text-green-400 hover:underline">
                            +62 877-3172-8778
                        </a>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-4 text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.85s-.011 3.584-.069 4.85c-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07s-3.584-.012-4.85-.07c-3.252-.148-4.771-1.691-4.919-4.919-.058-1.265-.069-1.645-.069-4.85s.011-3.584.069-4.85c.149-3.225 1.664-4.771 4.919-4.919 1.266-.057 1.644-.07 4.85-.07zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948s.014 3.667.072 4.947c.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072s3.667-.014 4.947-.072c4.358-.2 6.78-2.618 6.98-6.98.059-1.281.073-1.689.073-4.948s-.014-3.667-.072-4.947c-.2-4.358-2.618-6.78-6.98-6.98-1.281-.059-1.689-.073-4.948-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.162 6.162 6.162 6.162-2.759 6.162-6.162-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4s1.791-4 4-4 4 1.79 4 4-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44 1.441-.645 1.441-1.44-.645-1.44-1.441-1.44z"></path></svg>
                        <a href="https://instagram.com/kalikuningbrand" 
                            target="_blank"
                            class="hover:text-green-400 hover:underline">
                            @kalikuningbrand
                        </a>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-4 text-green-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        <a href="mailto:info@katalogumbulharjo.com" class="hover:text-green-400 hover:underline">
                            Kalikuningbrandumbulharjo@gmail.com
                        </a>
                    </div>
                </div>
            </div>

            <div class="w-full h-80">
                <iframe 
                    width="100%" 
                    height="100%" 
                    frameborder="0" 
                    scrolling="no" 
                    marginheight="0" 
                    marginwidth="0" 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3139.6506178290733!2d110.43212787457448!3d-7.626076537881657!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a6756620ffefd%3A0xb56a2f80ff9e6fc0!2sPemerintah%20Kalurahan%20Umbulharjo!5e1!3m2!1sid!2sid!4v1759239974321!5m2!1sid!2sid" 
                    class="rounded-lg shadow-lg">
                </iframe>
            </div>
        </div>
    </div>
</footer>

<div class="bg-slate-900 text-gray-400 text-center text-sm py-4">
    &copy; {{ date('Y') }} KaliKuning Brand. All Rights Reserved.
</div>
</body>
</html>