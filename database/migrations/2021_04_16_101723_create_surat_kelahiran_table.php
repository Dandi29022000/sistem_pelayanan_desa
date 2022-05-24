<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratKelahiranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_kelahiran', function (Blueprint $table) {
            $table->id();
            $table->date('waktu_lahir');
            $table->string('tempat_lahir', 20);
            $table->string('nama_anak', 50);
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->enum('golongan_darah', ['A', 'B', 'O', 'AB']);
            $table->string('agama', 10);
            $table->integer('anak_ke');
            $table->bigInteger('nik_ibu');
            $table->bigInteger('nik_ayah');
            $table->boolean('status')->default(0);
            $table->timestamps();
            $table->foreign('nik_ibu')->references('nik')->on('anggota_keluarga');
            $table->foreign('nik_ayah')->references('nik')->on('anggota_keluarga');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surat_kelahiran');
    }
}
