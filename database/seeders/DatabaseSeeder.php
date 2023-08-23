<?php

namespace Database\Seeders;

use App\Models\Obat;
use App\Models\Pasien;
use App\Models\Penanganan;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'nama' => 'admin',
            'email' => 'admin@gmail.com',
            'phone' => '081298021608',
            'password' => Hash::make('123'),
            'role_id' => 1
        ]);

        User::create([
            'nama' => 'Kepala',
            'email' => 'kepala@gmail.com',
            'phone' => '081298021608',
            'password' => Hash::make('123'),
            'role_id' => 2
        ]);

        User::create([
            'nama' => 'Muhammad Ade Romadoni',
            'email' => 'ade@gmail.com',
            'phone' => '081298021608',
            'password' => Hash::make('123'),
            'role_id' => 3
        ]);

        UserRole::create([
            'role' => 'Administrator'
        ]);
        UserRole::create([
            'role' => 'Kepala PMB'
        ]);
        UserRole::create([
            'role' => 'Bidan'
        ]);

        Pasien::create([
            'nik' => '1234567890123',
            'nama_pasien' => 'Cailin',
            'no_hp' => '081298021608',
            'umur' => '21',
            'jenis_kelamin' => 'perempuan',
            'alamat' => 'petir',
        ]);

        Pasien::create([
            'nik' => '1234567890143',
            'nama_pasien' => 'Ade',
            'no_hp' => '081298021608',
            'umur' => '21',
            'jenis_kelamin' => 'Laki-Laki',
            'alamat' => 'petir',
        ]);

        Pasien::create([
            'nik' => '1234567890213',
            'nama_pasien' => 'Xio',
            'no_hp' => '081398021708',
            'umur' => '8',
            'jenis_kelamin' => 'perempuan',
            'alamat' => 'cilegon',
        ]);

        Obat::create([
            'nama_obat' => 'Parasetamol',
            'jenis_obat' => 'Tablet',
            'harga' => '15000',
            'stok' => '20',
            'expire_date' => '2718316800',
        ]);

        Obat::create([
            'nama_obat' => 'CDR',
            'jenis_obat' => 'Tablet',
            'harga' => '30000',
            'stok' => '20',
            'expire_date' => '2718316800',
        ]);

        Obat::create([
            'nama_obat' => 'OBH',
            'jenis_obat' => 'Sirup',
            'harga' => '15000',
            'stok' => '20',
            'expire_date' => '2718316800',
        ]);

        Penanganan::create([
            'nama_layanan' => 'Umum',
            'harga' => '20000',

        ]);

        Penanganan::create([
            'nama_layanan' => 'Balita',
            'harga' => '15000',
        ]);

        Penanganan::create([
            'nama_layanan' => 'Nifas',
            'harga' => '25000',
        ]);
    }
}
