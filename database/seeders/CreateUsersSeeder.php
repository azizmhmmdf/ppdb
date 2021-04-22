<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name'=>'Admin',
                'email'=>'admin@gmail.com',
                'nisn'=>'1',
                'jk'=>'laki',
                'tempat_lahir'=>'bogor',
                'tanggal_lahir'=>'2003-09-10',
                'alamat'=>'purwakarta',
                'no_hp'=>'081384242232',
                'asal_sekolah'=>'smp 1 purwakarta',
                'tahun_lulus'=>'2015',
                'agama'=>'islam',
                'jurusan'=>'rpl',
                'is_admin'=>'1',
                'password'=> bcrypt('00000000'),

            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
