<?php

namespace App\Repositories;

use App\Models\Penjualan;

class PenjualanRepository
{
    /**
     * @var Penjualan
     */
    protected $penjualan;

    /**
     * PenjualanRepository constructor.
     * @param Penjualan $penjualan
     */
    public function __construct(Penjualan $penjualan)
    {
        $this->penjualan = $penjualan;
    }

    public function getAllPenjualan()
    {
        return $this->penjualan->get();
    }

    public function getByIdPenjualan($id)
    {
        return $this->penjualan->where('_id', $id)->get();
    }

    public function savePenjualan($data)
    {
        $penjualan = new $this->penjualan;
        $penjualan->id_kendaraan = $data['id_kendaraan'];
        $penjualan->nama_pelanggan = $data['nama_pelanggan'];
        $penjualan->tanggal_jual = $data['tanggal_jual'];
        $penjualan->save();
        return $penjualan->fresh();
    }

    public function updatePenjualan($data, $id)
    {
        $penjualan = $this->penjualan->find($id);
        $penjualan->id_kendaraan = $data['id_kendaraan'];
        $penjualan->nama_pelanggan = $data['nama_pelanggan'];
        $penjualan->tanggal_jual = $data['tanggal_jual'];
        $penjualan->update();
        return $penjualan;
    }

    public function deletePenjualan($id)
    {
        $penjualan = $this->penjualan->find($id);
        $penjualan->delete();
        return $penjualan;
    }
}
