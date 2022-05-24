<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KartuKeluarga extends Model
{
    use HasFactory;

    protected $table = 'kartu_keluarga';
    protected $primaryKey = 'no_kk';

    protected $fillable = [
        'no_kk',
        'nik_kepala',
        'alamat',
        'rt',
        'rw',
        'desa',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'kode_pos',
    ];

    public function anggotaKK(){
        return $this->hasMany(AnggotaKK::class);
    }
}
