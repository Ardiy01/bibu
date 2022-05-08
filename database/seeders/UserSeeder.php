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
            'id_kecamatan' => 196,
            'id_kabupaten' => 9,
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
            'id_kecamatan' => 196,
            'id_kabupaten' => 9,
        ]);

        DB::table('users')->insert([
            'nama' => 'Sarah Gibson',
            'username' => 'sargib44',
            'password' => Hash::make('gip098'),
            'email' => 'sargipcans@gmail.com',
            'jenis_kelamin' => 'Perempuan',
            'nomer_telepon' => '085465556345',
            'jalan' => 'Jl. Hasan Asari ',
            'nomor' => '5',
            'id_kecamatan' => 191,
            'id_kabupaten' => 9,
        ]);

        DB::table('users')->insert([
            'nama' => 'Gangga Muhammad',
            'username' => 'gagaa17',
            'password' => Hash::make('angga177'),
            'email' => 'gangga17@gmail.com',
            'jenis_kelamin' => 'Laki - Laki',
            'nomer_telepon' => '089124562420',
            'jalan' => 'Jl. Kalimantan',
            'nomor' => '37',
            'id_kecamatan' => 198,
            'id_kabupaten' => 9,
        ]);

        DB::table('users')->insert([
            'nama' => 'Karin Amel',
            'username' => 'amel20',
            'password' => Hash::make('karina2'),
            'email' => 'karin20@gmail.com',
            'jenis_kelamin' => 'Perempuan',
            'nomer_telepon' => '085279381046',
            'jalan' => 'Jl. Ahmad Yani',
            'nomor' => '48',
            'id_kecamatan' => 210,
            'id_kabupaten' => 10,
        ]);

        DB::table('users')->insert([
            'nama' => 'Nanda Ratu',
            'username' => 'nanda95',
            'password' => Hash::make('ratu1995'),
            'email' => 'nandaratu@gmail.com',
            'jenis_kelamin' => 'Perempuan',
            'nomer_telepon' => '082334629373',
            'jalan' => 'Jl. Karimata',
            'nomor' => '29',
            'id_kecamatan' => 198,
            'id_kabupaten' => 9,
        ]);

        DB::table('users')->insert([
            'nama' => 'Amelia Harsyi',
            'username' => 'ameliasyi',
            'password' => Hash::make('harsyicu'),
            'email' => 'amelia91@yahoo.co.id',
            'jenis_kelamin' => 'Perempuan',
            'nomer_telepon' => '085327914710',
            'jalan' => 'Jl. Hayam Wuruk',
            'nomor' => '40',
            'id_kecamatan' => 196,
            'id_kabupaten' => 9,
        ]);

        DB::table('users')->insert([
            'nama' => 'Bagus Boby',
            'username' => 'boby35',
            'password' => Hash::make('boob1'),
            'email' => 'bagusbob@yahoo.co.id',
            'jenis_kelamin' => 'Laki - Laki',
            'nomer_telepon' => '081631471949',
            'jalan' => 'Jl. Jaksa Agung Suprapto',
            'nomor' => '1',
            'id_kecamatan' => 210,
            'id_kabupaten' => 10,
        ]);

        DB::table('users')->insert([
            'nama' => 'Reinaldi Pitaloka',
            'username' => 'pitaa00',
            'password' => Hash::make('naldi00'),
            'email' => 'reinaldi@gmail.com',
            'jenis_kelamin' => 'Perempuan',
            'nomer_telepon' => '083291482641',
            'jalan' => 'Jl. Jawa',
            'nomor' => '8',
            'id_kecamatan' => 198,
            'id_kabupaten' => 9,
        ]);

        DB::table('users')->insert([
            'nama' => 'Sekar Dyah',
            'username' => 'sekar88',
            'password' => Hash::make('sek6765'),
            'email' => 'dyah67@gmail.com',
            'jenis_kelamin' => 'Perempuan',
            'nomer_telepon' => '082362841791',
            'jalan' => 'Jl. Gajah Mada',
            'nomor' => '44',
            'id_kecamatan' => 370,
            'id_kabupaten' => 18,
        ]);

        DB::table('users')->insert([
            'nama' => 'Dayu Auliyah',
            'username' => 'dayua67',
            'password' => Hash::make('dayul665'),
            'email' => 'auliak88@gmail.com',
            'jenis_kelamin' => 'Perempuan',
            'nomer_telepon' => '082333213719',
            'jalan' => 'Jl. Brawijaya Selatan',
            'nomor' => '8',
            'id_kecamatan' => 196,
            'id_kabupaten' => 9,
        ]);

        DB::table('users')->insert([
            'nama' => 'Widy Astria',
            'username' => 'astret99',
            'password' => Hash::make('widy0209'),
            'email' => 'tuti3421@gmail.com',
            'jenis_kelamin' => 'Perempuan',
            'nomer_telepon' => '083627197314',
            'jalan' => 'Jl. Sumatra ',
            'nomor' => '12',
            'id_kecamatan' => 198,
            'id_kabupaten' => 9,
        ]);


    }
}
