<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';
    protected $fillable = [
        'produk_id',
        'merchant_order_id',
        'nominal',
        'status',
        'customer_email',
        'customer_name',
        'customer_phone'
    ];

    protected $casts = [
        'nominal' => 'double'
    ];

    public function pembayaranSerialNumber()
    {
        return $this->hasMany(SerialNumber::class, 'pembayaran_id', 'id');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

    public function duitkuPayment()
    {
        return $this->hasOne(PembayaranDuitku::class, 'merchant_order_id', 'merchant_order_id');
    }
}
