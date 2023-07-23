<?php

namespace App\Http\Controllers;

use App\Services\KendaraanService;
use Exception;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    /**
     * @var KendaraanService
     */
    protected $kendaraanService;

    /**
     * KendaraanController constructor.
     * @param KendaraanService $kendaraanService
     */
    public function __construct(KendaraanService $kendaraanService)
    {
        $this->kendaraanService = $kendaraanService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = ['status' => 200];
        try {
            $result['data'] = $this->kendaraanService->getAllKendaraanData();
        } catch (Exception $ex) {
            $result = [
                'status' => 500,
                'error' => $ex->getMessage(),
            ];
        }
        return response()->json($result, $result['status']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $result = [
            'status' => 404,
            'error' => 'view currently unavailable',
        ];
        return response()->json($result, $result['status']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only([
            'jenis_kendaraan',
            'tahun_keluaran',
            'warna',
            'harga',
            'mesin',
            'tipe_suspensi',
            'tipe_transmisi',
            'kapasitas_penumpang',
            'tipe',
        ]);
        $result = ['status' => 200];
        try {
            $result['data'] = $this->kendaraanService->saveKendaraanData($data);
        } catch (Exception $ex) {
            $result = [
                'status' => 500,
                'error' => $ex->getMessage(),
            ];
        }
        return response()->json($result, $result['status']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = ['status' => 200];
        try {
            $result['data'] = $this->kendaraanService->getByIdKendaraanData($id);
        } catch (Exception $ex) {
            $result = [
                'status' => 500,
                'error' => $ex->getMessage(),
            ];
        }
        return response()->json($result, $result['status']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result = [
            'status' => 404,
            'error' => 'view currently unavailable',
        ];
        return response()->json($result, $result['status']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->only([
            'jenis_kendaraan',
            'tahun_keluaran',
            'warna',
            'harga',
            'mesin',
            'tipe_suspensi',
            'tipe_transmisi',
            'kapasitas_penumpang',
            'tipe',
        ]);
        $result = ['status' => 200];
        try {
            $result['data'] = $this->kendaraanService->updateKendaraanData($data, $id);
        } catch (Exception $ex) {
            $result = [
                'status' => 500,
                'error' => $ex->getMessage(),
            ];
        }
        return response()->json($result, $result['status']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = ['status' => 200];
        try {
            $result['data'] = $this->kendaraanService->deleteKendaraanData($id);
        } catch (Exception $ex) {
            $result = [
                'status' => 500,
                'error' => $ex->getMessage(),
            ];
        }
        return response()->json($result, $result['status']);
    }
}
