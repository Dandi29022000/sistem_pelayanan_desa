<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKelahiran extends Model
{
    use HasFactory;

    protected $table = 'surat_kelahiran';
    public $timestamps = false;

    protected $fillable = [
        'waktu_lahir',
        'tempat_lahir',
        'nama_anak',
        'jenis_kelamin',
        'golongan_darah',
        'agama',
        'anak_ke',
        'nik_ibu',
        'nik_ayah'
    ];

    protected $dates = [
        'waktu_lahir',
    ];

    public function ortu(){
        return $this->belongsTo(AnggotaKeluarga::class, 'nik', 'nik');
    }
}
