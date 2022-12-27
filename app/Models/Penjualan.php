<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table = 'penjualan';
    const CREATED_AT = null;
    const UPDATED_AT = null;

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'tgl',
        'karyawan_id'
    ];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }

    public function penjualanHasProduk()
    {
        return $this->hasMany(PenjualanHasProduk::class);
    }
}
