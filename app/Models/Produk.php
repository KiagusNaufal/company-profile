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
        'badge_color'
    ];
    protected $casts = [
        'price' => 'double',
    ];
    protected $attributes = [
        'description' => null,
        'price' => 0,
        'image' => null,
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
}
