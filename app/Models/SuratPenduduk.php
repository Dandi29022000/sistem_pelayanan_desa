<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratPenduduk extends Model
{
    use HasFactory;

    protected $table = "surat_penduduk";

    protected $fillable = [
        'nik',
        'no_kk',
        'nama',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'jenis_pekerjaan',
        'kewarganegaraan',
        'alamat',
        'rt',
        'rw',
        'desa',
        'kecamatan',
        'kabupaten',
        'provinsi',
    ];

    protected $date = [
        'tanggal_lahir'
    ];

    public function keluarga(){
        return $this->belongsTo(AnggotaKeluarga::class, 'nik', 'nik');
    }

    public function kartukeluarga(){
        return $this->belongsTo(KartuKeluarga::class, 'no_kk', 'no_kk');
    }
}
