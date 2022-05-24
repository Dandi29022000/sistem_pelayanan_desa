<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnggotaKeluarga extends Model
{
    protected $table = 'anggota_keluarga';
    protected $primaryKey = 'nik';
    public $timestamps = false;

    protected $fillable = [
        'nik',
        'nama',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'pendidikan',
        'jenis_pekerjaan',
        'status_pernikahan',
        'status_keluarga',
        'kewarganegaraan',
        'foto',
    ];

    public function user(){
        return $this->hasMany(User::class);
    }

    public function anggotaKK(){
        return $this->hasMany(AnggotaKK::class);
    }
    
    public function suratKematian(){
        return $this->hasMany(SuratKematian::class);
    }
}
