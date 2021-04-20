<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'nisn' => '999',
            'jk' => 'laki',
            'tempat_lahir' => 'bogor',
            'tanggal_lahir' => '2003-09-10',
            'alamat' => 'purwakarta',
            'no_hp' => '081384242232',
            'asal_sekolah' => 'smp 1 pwk',
            'tahun_lulus' => '2016',
            'agama' => 'islam',
            'jurusan' => 'rpl',
            'is_admin' => '1',
            'password' => Hash::make('password'),
        ]);
    }
}
