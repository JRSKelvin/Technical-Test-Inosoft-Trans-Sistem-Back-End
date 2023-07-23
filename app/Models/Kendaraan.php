<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;
    protected $table = 'Kendaraan';
    protected $fillable = [
        'jenis_kendaraan',
        'tahun_keluaran',
        'warna',
        'harga',
    ];
}

class Mobil extends Kendaraan
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->mergeFillable([
            'mesin',
            'tipe_suspensi',
            'tipe_transmisi',
        ]);
    }
}

class Motor extends Kendaraan
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->mergeFillable([
            'mesin',
            'kapasitas_penumpang',
            'tipe',
        ]);
    }
}
