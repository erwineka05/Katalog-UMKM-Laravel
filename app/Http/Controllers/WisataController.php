<?php

namespace App\Http\Controllers;

use App\Models\Wisata; 
use Illuminate\Http\Request;

class WisataController extends Controller
{
    public function index()
    {

        $daftar_wisata = Wisata::latest()->get(); 
        return view('wisata.index', ['daftar_wisata' => $daftar_wisata]);
    }
    public function show(Wisata $wisata)
    {
        return view('wisata.show', compact('wisata'));
    }
}