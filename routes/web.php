<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminBeritaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\AdminWisataController;
use App\Models\Product;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ==================================================
// GRUP 1: RUTE PUBLIK (Bisa diakses siapa saja)
// ==================================================
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/produk', [HomeController::class, 'produk'])->name('produk.index');
Route::get('/produk/{product}', [ProductController::class, 'show'])->name('produk.show');
Route::get('/wisata', [WisataController::class, 'index'])->name('wisata.index');
Route::get('/wisata/{wisata}', [WisataController::class, 'show'])->name('wisata.show');
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{berita:slug}', [BeritaController::class, 'show'])->name('berita.show');


// ==================================================
// GRUP 2: RUTE AUTENTIKASI (Untuk pengguna yang sudah login)
// ==================================================
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        return view('dashboard');
    })->middleware(['verified'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// ==================================================
// GRUP 3: RUTE ADMIN (Hanya bisa diakses oleh admin)
// ==================================================
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    
    Route::get('/dashboard', function () {
        $productCount = Product::count(); 
        return view('admin.dashboard', compact('productCount'));
    })->name('dashboard');

    // Produk admin
    Route::resource('produk', AdminProductController::class)
          ->parameters(['produk' => 'product']);

    // Berita admin
    Route::resource('berita', AdminBeritaController::class)
      ->parameters(['berita' => 'berita']); 
    // Wisata admin
    Route::resource('wisata', AdminWisataController::class)
      ->parameters(['wisata' => 'wisata']);


});


require __DIR__.'/auth.php';