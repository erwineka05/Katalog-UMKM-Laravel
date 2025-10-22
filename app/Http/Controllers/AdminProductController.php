<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    /**
     * Menampilkan daftar semua produk.
     */
    public function index()
    {
        $products = Product::with('images')->latest()->paginate(10);
        return view('admin.produk.index', compact('products'));
    }

    /**
     * Menampilkan formulir untuk membuat produk baru.
     */
    public function create()
    {
        return view('admin.produk.create');
    }

    /**
     * Menyimpan produk baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'address' => 'nullable|string',
            'price' => 'required|integer',
            'phone_number' => 'nullable|string',
            'images' => 'required|array',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'social_links' => 'nullable|array',
            'social_links.*.platform' => 'required_with:social_links.*.url|string',
            'social_links.*.url' => 'required_with:social_links.*.platform|url',
        ]);

        $product = Product::create($request->except('images', 'social_links'));

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imageFile) {
                $imagePath = $imageFile->store('images/products', 'public');
                $product->images()->create(['image_url' => $imagePath]);
            }
        }

        // storaage link media sosial
        if ($request->has('social_links')) {
            foreach ($request->social_links as $linkData) {
                if (!empty($linkData['url'])) {
                    $product->socialLinks()->create($linkData);
                }
            }
        }

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Menampilkan formulir untuk mengedit produk.
     */
    public function edit(Product $product)
    {
        return view('admin.produk.edit', compact('product'));
    }

    /**
     * Memperbarui produk di database.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'address' => 'nullable|string',
            'price' => 'required|integer',
            'phone_number' => 'nullable|string',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'social_links' => 'nullable|array',
            'social_links.*.platform' => 'required_with:social_links.*.url|string',
            'social_links.*.url' => 'required_with:social_links.*.platform|url',
        ]);

        // Update data produk 
        $product->update($request->except('images', 'social_links'));

        if ($request->hasFile('images')) {
            foreach ($product->images as $oldImage) {
                Storage::disk('public')->delete($oldImage->image_url);
                $oldImage->delete();
            }
            foreach ($request->file('images') as $imageFile) {
                $imagePath = $imageFile->store('images/products', 'public');
                $product->images()->create(['image_url' => $imagePath]);
            }
        }

        $product->socialLinks()->delete();
        if ($request->has('social_links')) {
            foreach ($request->social_links as $linkData) {
                if (!empty($linkData['url'])) {
                    $product->socialLinks()->create($linkData);
                }
            }
        }

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Menghapus produk dari database.
     */
    public function destroy(Product $product)
{
    
    foreach ($product->images as $image) {
        Storage::disk('public')->delete($image->image_url);
    }

    $product->delete();

    return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil dihapus.');
}
}