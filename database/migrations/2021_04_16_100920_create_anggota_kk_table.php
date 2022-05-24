<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotaKkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota_kk', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('no_kk');
            $table->bigInteger('nik');
            $table->foreign('no_kk')->references('no_kk')->on('kartu_keluarga');
            $table->foreign('nik')->references('nik')->on('anggota_keluarga');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anggota_kk');
    }
}
