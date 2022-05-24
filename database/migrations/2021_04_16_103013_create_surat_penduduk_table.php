<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratPendudukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_penduduk', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nik');
            $table->bigInteger('no_kk');
            $table->string('nama', 50);
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('tempat_lahir', 50);
            $table->date('tanggal_lahir');
            $table->string('agama', 10);
            $table->string('jenis_pekerjaan', 20);
            $table->string('kewarganegaraan', 20);
            $table->text('alamat');
            $table->integer('rt');
            $table->integer('rw');
            $table->string('desa', 15);
            $table->string('kecamatan', 15);
            $table->string('kabupaten', 15);
            $table->string('provinsi', 20);
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
        Schema::dropIfExists('surat_penduduk');
    }
}
