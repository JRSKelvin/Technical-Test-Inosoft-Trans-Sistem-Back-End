<?php

namespace App\Http\Controllers;

use App\Services\PenjualanService;
use Exception;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    /**
     * @var penjualanService
     */
    protected $penjualanService;

    /**
     * PenjualanController constructor.
     * @param PenjualanService $penjualanService
     */
    public function __construct(PenjualanService $penjualanService)
    {
        $this->penjualanService = $penjualanService;
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
            $result['data'] = $this->penjualanService->getAllPenjualanData();
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
            'id_kendaraan',
            'nama_pelanggan',
            'tanggal_jual',
        ]);
        $result = ['status' => 200];
        try {
            $result['data'] = $this->penjualanService->savePenjualanData($data);
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
            $result['data'] = $this->penjualanService->getByIdPenjualanData($id);
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
            'id_kendaraan',
            'nama_pelanggan',
            'tanggal_jual',
        ]);
        $result = ['status' => 200];
        try {
            $result['data'] = $this->penjualanService->updatePenjualanData($data, $id);
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
            $result['data'] = $this->penjualanService->deletePenjualanData($id);
        } catch (Exception $ex) {
            $result = [
                'status' => 500,
                'error' => $ex->getMessage(),
            ];
        }
        return response()->json($result, $result['status']);
    }
}
