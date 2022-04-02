<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('users')->insert([
            'nama' => 'Nendy',
            'username' => 'nendy02',
            'password' => Hash::make('nen0209'),
            'email' => 'nendy099@gmail.com',
            'jenis_kelamin' => 'Laki - Laki',
            'nomer_telepon' => '082257583258',
            'jalan' => 'Jl. Jendral Ahmad Yani',
            'nomor' => '115',
            'id_kecamatan' => 1,
            'id_kabupaten' => 1,
            'rule' => 'Pemilik',
        ]);

        DB::table('users')->insert([
            'nama' => 'Rani Milea',
            'username' => 'mileani1',
            'password' => Hash::make('rani1509'),
            'email' => 'mileani@gmail.com',
            'jenis_kelamin' => 'Perempuan',
            'nomer_telepon' => '081233256789',
            'jalan' => 'Jl. Hayam Wuruk',
            'nomor' => '9',
            'id_kecamatan' => 1,
            'id_kabupaten' => 1,
        ]);
    }
}
