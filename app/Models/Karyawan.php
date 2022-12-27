<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'karyawan';
    const CREATED_AT = null;
    const UPDATED_AT = null;

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'nama',
        'gender',
        'sandi'
    ];

    public function penjualan()
    {
        return $this->hasMany(Penjualan::class);
    }
}
