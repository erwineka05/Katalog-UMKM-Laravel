<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str; 

class Berita extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'content',
        'image_url',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($berita) {
            $berita->slug = Str::slug($berita->title);
        });
    }
}