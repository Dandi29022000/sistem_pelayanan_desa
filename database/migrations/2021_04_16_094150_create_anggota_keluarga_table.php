<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotaKeluargaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota_keluarga', function (Blueprint $table) {
            $table->bigInteger('nik')->primary();
            $table->string('nama', 50);
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('tempat_lahir', 50);
            $table->date('tanggal_lahir');
            $table->string('agama', 10);
            $table->enum('pendidikan', ['SD', 'SMP', 'SMA', 'Perguruan Tinggi']); 
            $table->string('jenis_pekerjaan', 20);
            $table->enum('status_pernikahan', ['Kawin', 'Belum Kawin']);
            $table->enum('status_keluarga', ['Kepala Keluarga', 'Istri', 'Anak']);
            $table->string('kewarganegaraan', 20);
            $table->string('foto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anggota_keluarga');
    }
}
