<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'address',
        'price',
        'phone_number',
        'image_url', 
        'is_featured', 
    ];

    /**
     * Mendapatkan gambar produk.
     */
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
    public function socialLinks()
    {
    return $this->hasMany(ProductSocialLink::class);
}
}
