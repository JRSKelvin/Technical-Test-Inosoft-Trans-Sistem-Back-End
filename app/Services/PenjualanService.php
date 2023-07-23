<?php

namespace App\Services;

use App\Repositories\PenjualanRepository;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class PenjualanService
{
    /**
     * @var $penjualanRepository
     */
    protected $penjualanRepository;

    /**
     * PenjualanService constructor.
     * @param PenjualanRepository $penjualanRepository
     */
    public function __construct(PenjualanRepository $penjualanRepository)
    {
        $this->penjualanRepository = $penjualanRepository;
    }

    public function getAllPenjualanData()
    {
        return $this->penjualanRepository->getAllPenjualan();
    }

    public function getByIdPenjualanData($id)
    {
        return $this->penjualanRepository->getByIdPenjualan($id);
    }

    public function savePenjualanData($data)
    {
        $validator = Validator::make($data, [
            'id_kendaraan' => 'required',
            'nama_pelanggan' => 'required',
            'tanggal_jual' => 'required',
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }
        $result = $this->penjualanRepository->savePenjualan($data);
        return $result;
    }

    public function updatePenjualanData($data, $id)
    {
        $validator = Validator::make($data, [
            'id_kendaraan' => 'required',
            'nama_pelanggan' => 'required',
            'tanggal_jual' => 'required',
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }
        try {
            $result = $this->penjualanRepository->updatePenjualan($data, $id);
        } catch (Exception $ex) {
            Log::info($ex->getMessage());
            throw new InvalidArgumentException('unable to update data');
        }
        return $result;
    }

    public function deletePenjualanData($id)
    {
        try {
            $result = $this->penjualanRepository->deletePenjualan($id);
        } catch (Exception $ex) {
            Log::info($ex->getMessage());
            throw new InvalidArgumentException('unable to delete data');
        }
        return $result;
    }
}
