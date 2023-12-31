<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\PenjualanController;
use App\Http\Middleware\EnsureTokenIsValid;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/register', [AuthController::class, 'register']);
Route::get('/kendaraan', [KendaraanController::class, 'index'])->middleware([EnsureTokenIsValid::class]);
Route::get('/penjualan', [PenjualanController::class, 'index'])->middleware([EnsureTokenIsValid::class]);
Route::resource('/kendaraan', KendaraanController::class)->middleware([EnsureTokenIsValid::class]);
Route::resource('/penjualan', PenjualanController::class)->middleware([EnsureTokenIsValid::class]);
