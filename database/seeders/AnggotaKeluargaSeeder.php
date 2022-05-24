<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class AnggotaKeluargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for($i = 0; $i<100; $i++){
            $no_kk = $faker->unique()->numberBetween(3574000000000000, 3574000000100000);
            for($j = 0; $j < $faker->numberBetween(2,5); $j++){
                $nik = $faker->unique()->numberBetween(3574012401010000, 3574012401019000);
                if($j == 0){
                    DB::table('anggota_keluarga')->insert([
                        'nik'       => $nik,
                        'nama'      => $faker->name('male'),
                        'jenis_kelamin' => 'L',
                        'tempat_lahir'  => $faker->city,
                        'tanggal_lahir' => $faker->date('Y-m-d', '2003-07-30'),
                        'agama'         => $faker->randomElement(['Islam', 'Kristen', 'Hindu', 'Buddha']),
                        'pendidikan'    => $faker->randomElement(['SD', 'SMP', 'SMA', 'Perguruan Tinggi']),
                        'jenis_pekerjaan'   => $faker->jobTitle,
                        'status_pernikahan' => 'Kawin',
                        'status_keluarga'   => 'Kepala Keluarga',
                        'kewarganegaraan'   => 'Indonesia',
                        'foto'              => '/images/user.jpg',
                    ]);
                    DB::table('kartu_keluarga')->insert([
                        'no_kk' => $no_kk,
                        'nik_kepala' => $nik,
                        'alamat' => $faker->streetAddress(),
                        'rt' => $faker->numberBetween(1,100),
                        'rw' => $faker->numberBetween(1,100),
                        'desa' => $faker->citySuffix(),
                        'kecamatan' => $faker->citySuffix(),
                        'kabupaten' => 'Lumajang',
                        'provinsi' => 'Jawa Timur',
                        'kode_pos' => $faker->postcode(),
                    ]);
                    DB::table('users')->insert([
                        'email' => $faker->email(),
                        'password' => Hash::make('user1234'),
                        'nik' => $nik,
                        'remember_token' => Str::random(),
                    ]);
                    
                } elseif($j == 1){
                    DB::table('anggota_keluarga')->insert([
                        'nik'       => $nik,
                        'nama'      => $faker->name('female'),
                        'jenis_kelamin' => 'P',
                        'tempat_lahir'  => $faker->city,
                        'tanggal_lahir' => $faker->date('Y-m-d', '2003-07-30'),
                        'agama'         => $faker->randomElement(['Islam', 'Kristen', 'Hindu', 'Buddha']),
                        'pendidikan'    => $faker->randomElement(['SD', 'SMP', 'SMA', 'Perguruan Tinggi']),
                        'jenis_pekerjaan'   => $faker->jobTitle,
                        'status_pernikahan' => 'Kawin',
                        'status_keluarga'   => 'Istri',
                        'kewarganegaraan'   => 'Indonesia',
                        'foto'              => '/images/user.jpg',
                    ]);
                } else {
                    DB::table('anggota_keluarga')->insert([
                        'nik'       => $nik,
                        'nama'      => $faker->name,
                        'jenis_kelamin' => $faker->randomElement(['L', 'P']),
                        'tempat_lahir'  => $faker->city,
                        'tanggal_lahir' => $faker->date('Y-m-d', '2003-07-30'),
                        'agama'         => $faker->randomElement(['Islam', 'Kristen', 'Hindu', 'Buddha']),
                        'pendidikan'    => $faker->randomElement(['SD', 'SMP', 'SMA', 'Perguruan Tinggi']),
                        'jenis_pekerjaan'   => $faker->jobTitle,
                        'status_pernikahan' => 'Belum Kawin',
                        'status_keluarga'   => 'Anak',
                        'kewarganegaraan'   => 'Indonesia',
                        'foto'              => '/images/user.jpg',
                    ]);
                }

                DB::table('anggota_kk')->insert([
                    'nik' => $nik,
                    'no_kk' => $no_kk,
                ]);
            }
        }
    }
}
