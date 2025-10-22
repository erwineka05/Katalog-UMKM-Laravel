<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductImage; // <-- Jangan lupa import model baru

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Menghapus data lama agar tidak duplikat setiap kali seeding
        Product::query()->delete();
        ProductImage::query()->delete();

        // --- PRODUK UNGGULAN 1 ---
        $product1 = Product::create([
            'name' => 'Atasan Batik Terbaru Kantor Blus Batik',
            'price' => 190000,
            'is_featured' => true,
            'description' => "Atasan batik ini terbuat dari bahan katun poliester yang tahan lama dan mudah dirawat. Dengan ukuran M, L, dan XL, kebaya ini dilengkapi dengan resleting di bagian depan yang memudahkan saat mengenakan dan melepas. Desain yang elegan membuatnya cocok untuk acara formal maupun non-formal."
        ]);

        // Tambahkan beberapa gambar untuk produk 1
        $product1->images()->createMany([
            ['image_url' => 'images/products/unggulan2.jpg'],
            ['image_url' => 'images/products/detail1-b.jpg'], // Gambar tambahan 1
            ['image_url' => 'images/products/detail1-c.jpg'], // Gambar tambahan 2
        ]);


        // --- PRODUK UNGGULAN 2 ---
        $product2 = Product::create([
            'name' => 'Rok Batik Terbaru Kantor Blus Batik XL',
            'price' => 125000,
            'is_featured' => true,
            'description' => "Rok batik modern dengan desain elegan, cocok untuk acara formal maupun kasual di kantor."
        ]);

        // Tambahkan beberapa gambar untuk produk 2
        $product2->images()->createMany([
            ['image_url' => 'images/products/unggulan1.jpg'],
            // Jika hanya punya satu gambar, cukup isi satu
        ]);


        // --- PRODUK LAINNYA 1 ---
        $product3 = Product::create([
            'name' => 'Baju Gamis Terbaru Dress Muslim Syari Maroon M',
            'price' => 190000,
            'is_featured' => false,
            'description' => "Gamis syari warna maroon dengan bahan premium yang nyaman dan tidak panas. Tersedia dalam berbagai ukuran."
        ]);

        // Tambahkan beberapa gambar untuk produk 3
        $product3->images()->createMany([
            ['image_url' => 'images/products/lainnya2.jpg'],
            ['image_url' => 'images/products/detail3-b.jpg'],
        ]);

        // ... Lanjutkan untuk produk-produk lainnya dengan pola yang sama ...
    }
}

