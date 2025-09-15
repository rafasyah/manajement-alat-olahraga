<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alat extends Model
{
    protected $fillable = [
        'nomor',
        'nama_barang',
        'status_barang',
        'gambar_barang',
        'jumlah_barang',
    ];
}
