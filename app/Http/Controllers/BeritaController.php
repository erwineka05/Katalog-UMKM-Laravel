<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->paginate(9);
        return view('berita.index', compact('beritas'));
    }

    public function show(Berita $berita)
    {
        return view('berita.show', compact('berita'));
    }
}