<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratPindahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_pindah', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nik');
            $table->bigInteger('no_kk');
            $table->text('alamat_tujuan');
            $table->integer('rt_tujuan');
            $table->integer('rw_tujuan');
            $table->string('desa_tujuan', 15);
            $table->string('kecamatan_tujuan', 15);
            $table->string('kabupaten_tujuan', 15);
            $table->string('provinsi_tujuan', 20);
            $table->integer('kode_pos_tujuan');
            $table->boolean('status')->default(0);
            $table->foreign('nik')->references('nik')->on('anggota_keluarga');
            $table->foreign('no_kk')->references('no_kk')->on('anggota_kk');
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
        Schema::dropIfExists('surat_pindah');
    }
}
