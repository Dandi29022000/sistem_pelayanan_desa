<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaKK extends Model
{
    use HasFactory;

    protected $table = 'anggota_kk';
    public $timestamps = false;

    protected $fillable = [
        'no_kk',
        'nik',
    ];

    public function keluarga(){
        return $this->belongsTo(AnggotaKeluarga::class, 'nik', 'nik');
    }

    public function kartukeluarga(){
        return $this->belongsTo(KartuKeluarga::class, 'no_kk', 'no_kk');
    }
}
