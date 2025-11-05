<x-layout>

    <main class="container mx-auto px-6 py-12">
        <div class="grid md:grid-cols-3 gap-12">
            <div class="md:col-span-2">
                <div class="text-sm text-gray-500 mb-4">
                    <a href="{{ url('/') }}" class="hover:text-green-600">Home</a> / 
                    <a href="{{ url('/produk') }}" class="hover:text-green-600">Produk Kami</a> /
                    <span>{{ $product->name }}</span>
                </div>

                <h1 class="text-3xl font-bold text-gray-900 mb-6">{{ $product->name }}</h1>

                <div x-data="{
                        images: {{ $product->images->pluck('image_url')->toJson() }},
                        activeIndex: 0,
                        get activeImage() { return this.images[this.activeIndex] }
                    }" 
                     class="mb-8">
                    
                    <div class="relative mb-4">
                        
                        <img :src="`{{ asset('storage') }}/${activeImage}`" alt="{{ $product->name }}" class="w-full h-auto max-h-[500px] object-cover rounded-lg shadow-md">
                        
                        <div class="absolute inset-0 flex items-center justify-between px-4">
                            <button @click="activeIndex = (activeIndex === 0) ? images.length - 1 : activeIndex - 1" class="bg-white/50 text-gray-800 rounded-full p-2 hover:bg-white focus:outline-none">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                            </button>
                            <button @click="activeIndex = (activeIndex === images.length - 1) ? 0 : activeIndex + 1" class="bg-white/50 text-gray-800 rounded-full p-2 hover:bg-white focus:outline-none">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </button>
                        </div>
                    </div>

                    <div class="grid grid-cols-5 gap-2">
                        <template x-for="(image, index) in images">
                            <div @click="activeIndex = index" 
                                 :class="{ 'border-2 border-green-600': activeIndex === index }"
                                 class="cursor-pointer rounded p-1">
                                <img :src="`{{ asset('storage') }}/${image}`" alt="Thumbnail" class="w-full aspect-square object-cover rounded">
                            </div>
                        </template>
                    </div>
                </div>
                <div class="prose max-w-none text-gray-700">

                </div>
                @if($product->address)
                <div class="prose max-w-none text-gray-700 mb-8">
                    <h3 class="font-semibold text-xl mb-4 border-b pb-2">Lokasi Produk Kami</h3>
                    <p class="flex items-start not-prose"> 
                        <svg class="w-5 h-5 mt-1 mr-3 text-gray-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <span>{!! nl2br(e($product->address)) !!}</span>
                    </p>
                </div>
                @endif

                <div class="prose max-w-none text-gray-700">
                    <h3 class="font-semibold text-xl mb-4 border-b pb-2">Deskripsi Produk</h3>
                    {{-- {!! !!} baris baru (\n) di-render sebagai <br> --}}
                    <p>{!! nl2br(e($product->description)) !!}</p>
                </div>
            </div>

            <div class="md:col-span-1">
                <div class="bg-gray-50 p-6 rounded-lg shadow-md sticky top-28">
                    <h2 class="text-xl font-semibold text-gray-800 border-b pb-3">Harga & Cara Order</h2>
                    <p class="text-xs text-gray-500 mt-3">Silahkan hubungi CS kami untuk melakukan pemesanan.</p>
                    
                    <div class="my-4">
                        <span class="text-3xl font-bold text-gray-900">Rp{{ number_format($product->price) }}</span>
                    </div>

                    @php
                        $whatsappNumber = $product->phone_number ?? env('WHATSAPP_NUMBER', '6287731728778');
                        $message = "Halo, saya tertarik dengan produk '" . $product->name . "'";
                        $whatsappUrl = "https://wa.me/" . $whatsappNumber . "?text=" . urlencode($message);
                    @endphp
                    <a href="{{ $whatsappUrl }}" target="_blank" class="w-full inline-flex items-center justify-center bg-green-600 text-white font-semibold py-3 rounded-md hover:bg-green-700">
                        <img src="{{ asset('images/icons/whatsapp.svg') }}" alt="WhatsApp" class="w-5 h-5 mr-2">
                        Pesan via WhatsApp
                    </a>
                    @if($product->socialLinks->isNotEmpty())
                    
                    <div class="mt-6 pt-4 border-t">
                        <h4 class="font-semibold text-gray-800 mb-3">Kunjungi Media Sosial Produk Kami</h4>
                        <div class="flex space-x-3">
                            @foreach ($product->socialLinks as $link)
                            <a href="{{ $link->url }}" target="_blank" title="{{ $link->platform }}" 
                            class="w-10 h-10 flex items-center justify-center rounded-full text-white 
                            @if($link->platform == 'Instagram') bg-pink-500 hover:bg-pink-600 @endif
                            @if($link->platform == 'TikTok') bg-black hover:bg-gray-800 @endif
                            @if($link->platform == 'Facebook') bg-blue-600 hover:bg-blue-700 @endif
                            @if($link->platform == 'YouTube') bg-red-600 hover:bg-red-700 @endif">
                    
                            @if($link->platform == 'Instagram')
                                <img src="{{ asset('images/icons/instagram.svg') }}" alt="Instagram" class="w-6 h-6">
                            @elseif($link->platform == 'TikTok')
                                <img src="{{ asset('images/icons/tiktok.svg') }}" alt="TikTok" class="w-6 h-6">
                            @elseif($link->platform == 'Facebook')
                                <img src="{{ asset('images/icons/facebook.svg') }}" alt="Facebook" class="w-6 h-6">
                            @elseif($link->platform == 'YouTube')
                                <img src="{{ asset('images/icons/youtube.svg') }}" alt="YouTube" class="w-6 h-6">
                            @else
                                <span class="font-bold text-lg">{{ substr($link->platform, 0, 1) }}</span>
                            @endif
                            </a>
                             @endforeach
                        </div>
                    </div>
                @endif

                    <ul class="text-sm text-gray-600 mt-6 space-y-2">
                        <li class="flex items-center"><svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>Produk Tersedia (Ready Stock)</li>
                        <li class="flex items-center"><svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>Pesan Langsung via WhatsApp</li>
                        <li class="flex items-center"><svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>Oleh-oleh khas Umbulharjo</li>
                    </ul>

                    <div class="mt-6 pt-4 border-t">
                        <h4 class="font-semibold text-gray-800 mb-3">Bagikan Produk Ini</h4>
                        @php
                            $shareUrl = url()->current();
                            $shareText = "Lihat produk menarik ini: " . $product->name;
                        @endphp
                        <div class="flex space-x-3">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($shareUrl) }}" target="_blank" class="w-10 h-10 flex items-center justify-center rounded-full bg-blue-600 text-white hover:bg-blue-700">
                                <img src="{{ asset('images/icons/facebook.svg') }}" alt="Facebook" class="w-6 h-6">
                            </a>
                            <a href="https://api.whatsapp.com/send?text={{ urlencode($shareText . ' ' . $shareUrl) }}" target="_blank" class="w-10 h-10 flex items-center justify-center rounded-full bg-green-500 text-white hover:bg-green-600">
                                <img src="{{ asset('images/icons/whatsapp.svg') }}" alt="Whatsapp" class="w-6 h-6">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
</x-layout>