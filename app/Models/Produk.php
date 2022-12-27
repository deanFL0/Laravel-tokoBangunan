<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';
    const CREATED_AT = null;
    const UPDATED_AT = null;

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'produk',
        'harga',
        'stok'
    ];

    public function penjualanHasProduk()
    {
        return $this->hasMany(PenjualanHasProduk::class);
    }

}
