<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Berita;
use App\Models\Wisata;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::where('is_featured', true)
                               ->inRandomOrder()
                               ->take(3)
                               ->get();
        $otherProducts = Product::where('is_featured', false)
                                ->inRandomOrder()
                                ->take(6)
                                ->get();
                                
        $latestBeritas = Berita::latest()->take(3)->get();
        $latestWisatas = Wisata::inRandomOrder()->take(3)->get();
        return view('home', [
            'featuredProducts' => $featuredProducts,
            'otherProducts' => $otherProducts,
            'latestBeritas' => $latestBeritas,
            'latestWisatas' => $latestWisatas
        ]);
    }
    
    public function produk(Request $request)
    {
        $keyword = $request->input('search');
        $query = Product::query();
        if ($keyword) {
            $query->where('name', 'like', '%' . $keyword . '%');
        }
        
        $products = $query->inRandomOrder()->paginate(30);

        $products = $query->get();
        return view('produk', [
            'products' => $products,
            'keyword' => $keyword
        ]);
    }
}
