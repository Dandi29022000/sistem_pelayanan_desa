<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('anggota_keluarga')->insert([
            'nik'       => 1,
            'nama'      => 'admin',
            'jenis_kelamin' => 'L',
            'tempat_lahir'  => '-',
            'tanggal_lahir' => '1970-01-01',
            'agama'         => '-',
            'pendidikan'    => 'Perguruan Tinggi',
            'jenis_pekerjaan'   => 'admin',
            'status_pernikahan' => 'Kawin',
            'status_keluarga'   => 'Kepala Keluarga',
            'kewarganegaraan'   => 'Indonesia',
            'foto'              => '/images/user.jpg',
        ]);
        DB::table('users')->insert([
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin123'),
            'nik' => '1',
            'remember_token' => Str::random(),
        ]);
    }
}
