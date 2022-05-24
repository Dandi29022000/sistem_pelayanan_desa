<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratPindah extends Model
{
    use HasFactory;

    protected $table = 'surat_pindah';

    protected $fillable = [
        'nik',
        'no_kk',
        'alamat_tujuan',
        'rt_tujuan',
        'rw_tujuan',
        'desa_tujuan',
        'kecamatan_tujuan',
        'kabupaten_tujuan',
        'provinsi_tujuan',
        'kode_pos_tujuan',
    ];

    public function keluarga(){
        return $this->belongsTo(AnggotaKeluarga::class, 'nik', 'nik');
    }

    public function kartukeluarga(){
        return $this->belongsTo(KartuKeluarga::class, 'no_kk', 'no_kk');
    }
}
