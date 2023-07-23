<?php

namespace App\Services;

use App\Repositories\KendaraanRepository;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class KendaraanService
{
    /**
     * @var $kendaraanRepository
     */
    protected $kendaraanRepository;

    /**
     * KendaraanService constructor.
     * @param KendaraanRepository $kendaraanRepository
     */
    public function __construct(KendaraanRepository $kendaraanRepository)
    {
        $this->kendaraanRepository = $kendaraanRepository;
    }

    public function getAllKendaraanData()
    {
        return $this->kendaraanRepository->getAllKendaraan();
    }

    public function getByIdKendaraanData($id)
    {
        return $this->kendaraanRepository->getByIdKendaraan($id);
    }

    public function saveKendaraanData($data)
    {
        $validator = Validator::make($data, [
            'jenis_kendaraan' => 'required',
            'tahun_keluaran' => 'required',
            'warna' => 'required',
            'harga' => 'required',
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }
        $result = $this->kendaraanRepository->saveKendaraan($data);
        return $result;
    }

    public function updateKendaraanData($data, $id)
    {
        $validator = Validator::make($data, [
            'jenis_kendaraan' => 'required',
            'tahun_keluaran' => 'required',
            'warna' => 'required',
            'harga' => 'required',
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }
        try {
            $result = $this->kendaraanRepository->updateKendaraan($data, $id);
        } catch (Exception $ex) {
            Log::info($ex->getMessage());
            throw new InvalidArgumentException('unable to update data');
        }
        return $result;
    }

    public function deleteKendaraanData($id)
    {
        try {
            $result = $this->kendaraanRepository->deleteKendaraan($id);
        } catch (Exception $ex) {
            Log::info($ex->getMessage());
            throw new InvalidArgumentException('unable to delete data');
        }
        return $result;
    }
}
