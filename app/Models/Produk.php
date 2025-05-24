<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    /** @use HasFactory<\Database\Factories\ProdukFactory> */
    use HasFactory;

    protected $table = 'produk';
    protected $fillable = [
        'name',
        'description',
        'kategori_id',
        'price',
        'image',
        'imagebg_produk',
        'image_logo',
        'link_aplikasi',
        'link_tutorial',
        'badge_color',
        'pain_description',
        'gain_description',
        'solution_description',
        'pain_points',
        'gain_points',
        'solution_points',
    ];
    protected $casts = [
        'price' => 'double',
            'pain_points' => 'array',
    'gain_points' => 'array',
    'solution_points' => 'array',
    ];
    protected $attributes = [
        'description' => null,
        'price' => 0,
        'image' => null,
        'imagebg_produk' => null,
        'image_logo' => null,
        'badge_color' => null,
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    protected $appends = [
        'formatted_price',
    ];
    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'produk_id');
    }
}
