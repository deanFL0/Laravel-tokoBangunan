<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenjualanHasProduk extends Model
{
    protected $table = 'penjualan_has_produk';
    const CREATED_AT = null;
    const UPDATED_AT = null;

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'penjualan_id',
        'produk_id',
        'qty',
        'harga'
    ];

    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class);
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
