<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKartuKeluargaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kartu_keluarga', function (Blueprint $table) {
            $table->bigInteger('no_kk')->primary();
            $table->bigInteger('nik_kepala');
            $table->text('alamat');
            $table->integer('rt');
            $table->integer('rw');
            $table->string('desa', 15);
            $table->string('kecamatan', 15);
            $table->string('kabupaten', 15);
            $table->string('provinsi', 20);
            $table->integer('kode_pos');
            $table->foreign('nik_kepala')->references('nik')->on('anggota_keluarga');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kartu_keluarga');
    }
}
