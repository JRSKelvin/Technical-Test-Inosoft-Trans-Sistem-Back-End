<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKendaraanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kendaraan', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_kendaraan');
            $table->string('tahun_keluaran');
            $table->string('warna');
            $table->string('harga');
            $table->string('mesin');
            $table->string('tipe_suspensi');
            $table->string('tipe_transmisi');
            $table->string('kapasitas_penumpang');
            $table->string('tipe');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kendaraan');
    }
}
