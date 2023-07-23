<?php

namespace App\Repositories;

use App\Models\Kendaraan;

class KendaraanRepository
{
    /**
     * @var Kendaraan
     */
    protected $kendaraan;

    /**
     * KendaraanRepository constructor.
     * @param Kendaraan $kendaraan
     */
    public function __construct(Kendaraan $kendaraan)
    {
        $this->kendaraan = $kendaraan;
    }

    public function getAllKendaraan()
    {
        return $this->kendaraan->get();
    }

    public function getByIdKendaraan($id)
    {
        return $this->kendaraan->where('_id', $id)->get();
    }

    public function saveKendaraan($data)
    {
        $kendaraan = new $this->kendaraan;
        $kendaraan->jenis_kendaraan = $data['jenis_kendaraan'];
        $kendaraan->tahun_keluaran = $data['tahun_keluaran'];
        $kendaraan->warna = $data['warna'];
        $kendaraan->harga = $data['harga'];
        $kendaraan->mesin = $data['mesin'] ?: null;
        $kendaraan->tipe_suspensi = $data['tipe_suspensi'] ?: null;
        $kendaraan->tipe_transmisi = $data['tipe_transmisi'] ?: null;
        $kendaraan->kapasitas_penumpang = $data['kapasitas_penumpang'] ?: null;
        $kendaraan->tipe = $data['tipe'] ?: null;
        $kendaraan->save();
        return $kendaraan->fresh();
    }

    public function updateKendaraan($data, $id)
    {
        $kendaraan = $this->kendaraan->find($id);
        $kendaraan->jenis_kendaraan = $data['jenis_kendaraan'];
        $kendaraan->tahun_keluaran = $data['tahun_keluaran'];
        $kendaraan->warna = $data['warna'];
        $kendaraan->harga = $data['harga'];
        $kendaraan->mesin = $data['mesin'] ?: null;
        $kendaraan->tipe_suspensi = $data['tipe_suspensi'] ?: null;
        $kendaraan->tipe_transmisi = $data['tipe_transmisi'] ?: null;
        $kendaraan->kapasitas_penumpang = $data['kapasitas_penumpang'] ?: null;
        $kendaraan->tipe = $data['tipe'] ?: null;
        $kendaraan->update();
        return $kendaraan;
    }

    public function deleteKendaraan($id)
    {
        $kendaraan = $this->kendaraan->find($id);
        $kendaraan->delete();
        return $kendaraan;
    }
}
