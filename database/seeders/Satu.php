<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Satu extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('anggota_keluarga')->insert([
            'nik'       => '3574012401010003',
            'nama'      => 'Auzan',
            'jenis_kelamin' => 'L',
            'tempat_lahir'  => 'Probolinggo',
            'tanggal_lahir' => '2000-03-15',
            'agama'         => 'Islam',
            'pendidikan'    => 'SMA',
            'jenis_pekerjaan'   => 'Mahasiswa',
            'status_pernikahan' => 'Belum Kawin',
            'status_keluarga'   => 'Anak',
            'kewarganegaraan'   => 'Indonesia',
        ]);

        DB::table('kartu_keluarga')->insert([
            'no_kk' => '3574011234567890',
            'nik_kepala' => '3574012401010003',
            'alamat' => 'Jl. Merapi Gg. 2 No. 26',
            'rt' => '11',
            'rw' => '02',
            'desa' => 'Triwung Lor',
            'kecamatan' => 'Kademangan',
            'kabupaten' => 'Probolinggo',
            'provinsi' => 'Jawa Timur',
            'kode_pos' => '67223',
        ]);

        DB::table('anggota_kk')->insert([
            'no_kk' => '3574011234567890',
            'nik'       => '3574012401010003',

        ]);

        DB::table('users')->insert([
            'email' => 'pram@pram.com',
            'password' => Hash::make('pramudya123'),
            'nik' => '3574012401010003',
            'remember_token' => Str::random(),
        ]);
    }
}
