<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;
    protected $table = 'Penjualan';
    protected $fillable = [
        'id_kendaraan',
        'nama_pelanggan',
        'tanggal_jual',
    ];
}
