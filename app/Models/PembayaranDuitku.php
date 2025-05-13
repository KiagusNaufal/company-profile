<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembayaranDuitku extends Model
{
    use HasFactory;

    protected $table = 'pembayaran_duitku';
    protected $primaryKey = 'merchant_order_id';
    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $fillable = [
        'merchant_order_id',
        'reference',
        'payment_method',
        'transaction_response',
        'callback_response',
        'status'
    ];
    
    protected $casts = [
        'transaction_response' => 'array',
        'callback_response' => 'array',
    ];
    
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    
    protected $attributes = [
        'reference' => null,
        'payment_method' => null,
        'transaction_response' => null,
        'callback_response' => null,
        'status' => null,
    ];
    
    public function pembayaran()
    {
        return $this->belongsTo(Pembayaran::class, 'merchant_order_id', 'merchant_order_id');
    }
}
