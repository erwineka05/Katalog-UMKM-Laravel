<?php

namespace App\Http\Controllers;

use App\Models\Wisata; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str; 

class AdminWisataController extends Controller
{
    /**
     * Menampilkan daftar semua tempat wisata.
     */
    public function index()
    {
        $wisatas = Wisata::latest()->paginate(10); 
        return view('admin.wisata.index', compact('wisatas'));
    }

    /**
     * Menampilkan formulir untuk membuat tempat wisata baru
     */
    public function create()
    {
        return view('admin.wisata.create');
    }

    /**
     * Menyimpan tempat wisata baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi input 
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'youtube_url' => 'nullable|url', 
        ]);

        $imagePath = null;
    
        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('images/wisata', 'public');
        }

        Wisata::create([
            'nama' => $validated['nama'],
            'deskripsi' => $validated['deskripsi'],
            'gambar_url' => $imagePath,
            'youtube_url' => $validated['youtube_url'],
        ]);

        return redirect()->route('admin.wisata.index')->with('success', 'Tempat wisata berhasil ditambahkan.');
    }

    /**
     * Menampilkan formulir untuk mengedit tempat wisata.
     */
    public function edit(Wisata $wisata)
    {
        return view('admin.wisata.edit', compact('wisata'));
    }

    /**
     * Memperbarui tempat wisata di database.
     */
    public function update(Request $request, Wisata $wisata)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
            'youtube_url' => 'nullable|url',
        ]);

        $imagePath = $wisata->gambar_url; 
        if ($request->hasFile('gambar')) {
            if ($wisata->gambar_url) {
                Storage::disk('public')->delete($wisata->gambar_url);
            }
            $imagePath = $request->file('gambar')->store('images/wisata', 'public');
        }

        $wisata->update([
            'nama' => $validated['nama'],
            'deskripsi' => $validated['deskripsi'],
            'gambar_url' => $imagePath,
            'youtube_url' => $validated['youtube_url'], 
        ]);

        return redirect()->route('admin.wisata.index')->with('success', 'Tempat wisata berhasil diperbarui.');
    }

    /**
     * Menghapus tempat wisata dari database.
     */
    public function destroy(Wisata $wisata)
    {
        
        if ($wisata->gambar_url) {
            Storage::disk('public')->delete($wisata->gambar_url);
        }
        
        $wisata->delete();

        return redirect()->route('admin.wisata.index')->with('success', 'Tempat wisata berhasil dihapus.');
    }
}