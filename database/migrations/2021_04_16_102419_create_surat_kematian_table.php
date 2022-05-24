<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratKematianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_kematian', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nik');
            $table->bigInteger('no_kk');
            $table->date('tanggal_meninggal');
            $table->text('penyebab_meninggal');
            $table->string('tempat_meninggal', 20);
            $table->foreign('nik')->references('nik')->on('anggota_keluarga');
            $table->foreign('no_kk')->references('no_kk')->on('anggota_kk');
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('surat_kematian');
    }
}
