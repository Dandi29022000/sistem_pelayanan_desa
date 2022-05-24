<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKematian extends Model
{
    use HasFactory;

    protected $table = 'surat_kematian';

    protected $fillable = [
        'nik',
        'no_kk',
        'tanggal_meninggal',
        'penyebab_meninggal',
        'tempat_meninggal',
    ];

    protected $date = [
        'tanggal_meninggal',
    ];

    public function keluarga(){
        return $this->belongsTo(AnggotaKeluarga::class, 'nik', 'nik');
    }
}
