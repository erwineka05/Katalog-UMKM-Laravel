<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg-px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Selamat datang di Panel Admin!
                </div>

                <div class="mt-6 p-6 bg-white border border-gray-200 rounded-lg shadow">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Jumlah Produk</h5>
                        <p class="font-normal text-gray-700 text-4xl">{{ $productCount }}</p>
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>