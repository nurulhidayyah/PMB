<?php

namespace Database\Seeders;

use App\Models\Obat;
use App\Models\Pasien;
use App\Models\Penanganan;
use App\Models\RekamMedis;
use App\Models\RekamMedisBalita;
use App\Models\RekamMedisBersalin;
use App\Models\RekamMedisImunisasi;
use App\Models\RekamMedisKB;
use App\Models\RekamMedisKehamilan;
use App\Models\RekamMedisNifas;
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
            'id' => '1',
            'nik' => '1234567890123',
            'nama_pasien' => 'Cailin',
            'no_hp' => '081298021608',
            'umur' => '21',
            'jenis_kelamin' => 'perempuan',
            'alamat' => 'petir',
        ]);

        Pasien::create([
            'id' => '2',
            'nik' => '1234567890143',
            'nama_pasien' => 'Ade',
            'no_hp' => '081298021608',
            'umur' => '21',
            'jenis_kelamin' => 'Laki-Laki',
            'alamat' => 'petir',
        ]);

        Pasien::create([
            'id' => '3',
            'nik' => '1234577890213',
            'nama_pasien' => 'Putri',
            'no_hp' => '081398021708',
            'umur' => '8',
            'jenis_kelamin' => 'perempuan',
            'alamat' => 'cilegon',
        ]);
        Pasien::create([
            'id' => '4',
            'nik' => '1234267890213',
            'nama_pasien' => 'Agus',
            'no_hp' => '081398021708',
            'umur' => '8',
            'jenis_kelamin' => 'laki-Laki',
            'alamat' => 'cilegon',
        ]);
        Pasien::create([
            'id' => '5',
            'nik' => '1237567890213',
            'nama_pasien' => 'Nurul',
            'no_hp' => '081398021708',
            'umur' => '8',
            'jenis_kelamin' => 'laki-Laki',
            'alamat' => 'cilegon',
        ]);
        Pasien::create([
            'id' => '6',
            'nik' => '1234067890213',
            'nama_pasien' => 'Satria',
            'no_hp' => '081398021708',
            'umur' => '8',
            'jenis_kelamin' => 'laki-Laki',
            'alamat' => 'cilegon',
        ]);

        Obat::create([
            'nama_obat' => 'Novagesic',
            'jenis_obat' => 'Tablet',
            'harga' => '15000',
            'stok' => '10',
            'expire_date' => '2718316800',
        ]);

        Obat::create([
            'nama_obat' => 'Hufagesic',
            'jenis_obat' => 'Tablet',
            'harga' => '15000',
            'stok' => '10',
            'expire_date' => '2718316800',
        ]);

        Obat::create([
            'nama_obat' => 'Yusimoc',
            'jenis_obat' => 'Tablet',
            'harga' => '20000',
            'stok' => '9',
            'expire_date' => '2718316800',
        ]);

        Obat::create([
            'nama_obat' => 'Caviplec',
            'jenis_obat' => 'Tablet',
            'harga' => '15000',
            'stok' => '8',
            'expire_date' => '2718316800',
        ]);
        Obat::create([
            'nama_obat' => 'grantusif',
            'jenis_obat' => 'tablet',
            'harga' => '15000',
            'stok' => '7',
            'expire_date' => '2718316800',
        ]);
        Obat::create([
            'nama_obat' => 'Vitamol',
            'jenis_obat' => 'sirup',
            'harga' => '20000',
            'stok' => '14',
            'expire_date' => '2718316800',
        ]);
        Obat::create([
            'nama_obat' => 'Omemox',
            'jenis_obat' => 'sirup',
            'harga' => '20000',
            'stok' => '12',
            'expire_date' => '2718316800',
        ]);

        Obat::create([
            'nama_obat' => 'Multiflex',
            'jenis_obat' => 'sirup',
            'harga' => '20000',
            'stok' => '11',
            'expire_date' => '2718316800',
        ]);
        Obat::create([
            'nama_obat' => 'Gastrucid',
            'jenis_obat' => 'sirup',
            'harga' => '20000',
            'stok' => '9',
            'expire_date' => '2718316800',
        ]);
        Obat::create([
            'nama_obat' => 'Pasaba',
            'jenis_obat' => 'sirup',
            'harga' => '20000',
            'stok' => '10',
            'expire_date' => '2718316800',
        ]);
        Obat::create([
            'nama_obat' => 'Andalan',
            'jenis_obat' => 'pen',
            'harga' => '20000',
            'stok' => '10',
            'expire_date' => '2718316800',
        ]);
        Obat::create([
            'nama_obat' => 'Siclopen',
            'jenis_obat' => 'suntik',
            'harga' => '20000',
            'stok' => '7',
            'expire_date' => '2718316800',
        ]);
        Obat::create([
            'nama_obat' => 'Kondom',
            'jenis_obat' => 'Kontrasepsi',
            'harga' => '20000',
            'stok' => '2',
            'expire_date' => '2718316800',
        ]);
        Obat::create([
            'nama_obat' => 'Inpus Nacl',
            'jenis_obat' => 'Inpus',
            'harga' => '30000',
            'stok' => '8',
            'expire_date' => '2718316800',
        ]);
        Obat::create([
            'nama_obat' => 'Bundavin',
            'jenis_obat' => 'tablet',
            'harga' => '15000',
            'stok' => '10',
            'expire_date' => '2718316800',
        ]);
        Obat::create([
            'nama_obat' => 'Asam Folat',
            'jenis_obat' => 'tablet',
            'harga' => '15000',
            'stok' => '10',
            'expire_date' => '2718316800',
        ]);
        Obat::create([
            'nama_obat' => 'Calcium-D',
            'jenis_obat' => 'sirup',
            'harga' => '20000',
            'stok' => '15',
            'expire_date' => '2718316800',
        ]);
        Obat::create([
            'nama_obat' => 'Sangobion',
            'jenis_obat' => 'tablet',
            'harga' => '15000',
            'stok' => '10',
            'expire_date' => '2718316800',
        ]);
        Penanganan::create([
            'nama_layanan' => 'Umum',
            'harga' => '20000',
        ]);

        Penanganan::create([
            'nama_layanan' => 'Balita',
            'harga' => '20000',
        ]);

        Penanganan::create([
            'nama_layanan' => 'Nifas',
            'harga' => '50000',
        ]);

        Penanganan::create([
            'nama_layanan' => 'bersalin',
            'harga' => '50000',
        ]);

        Penanganan::create([
            'nama_layanan' => 'Kehamilan',
            'harga' => '50000',
        ]);

        Penanganan::create([
            'nama_layanan' => 'Bersalin',
            'harga' => '50000',
        ]);

        Penanganan::create([
            'nama_layanan' => 'KB',
            'harga' => '15000',
        ]);
        RekamMedisKB::create([
            'pasien_id' => '1',
            'nama_pasangan' => 'cailin',
            'keterangan' => '-',
            'tanggal_pemasangan' => '1703203200',
            'jenis_kb' => 'Kondom',
            'jumlah_anak' => '2',
        ]);
        RekamMedisKB::create([
            'pasien_id' => '2',
            'nama_pasangan' => 'Ade',
            'keterangan' => '-',
            'tanggal_pemasangan' => '1703203200',
            'jenis_kb' => 'implan',
            'jumlah_anak' => '2',
        ]);
        RekamMedisBersalin::create([
            'pasien_id' => '3',
            'berat_badan' => '80kg',
            'tinggi_badan' => '160cm',
            'tekanan_darah' => '110/80',
            'uk' => '37mg',
            'prest' => 'Kepala',
            'tp' => '1703203200',
            'hppt' => '1708203200',
            'gravida' => 'G1p040',
            'lila' => '-',
            'djj' => '140',
            'tfu' => '-',
            'berat_bayi' => '37 minggu',
            'diagnosa' => '-',
            'keterangan' => 'lahir dengan Selamat',
        ]);
        RekamMedisBersalin::create([
            'pasien_id' => '1',
            'berat_badan' => '80kg',
            'tinggi_badan' => '160cm',
            'tekanan_darah' => '110/80',
            'uk' => '37mg',
            'prest' => 'Kepala',
            'tp' => '1703203200',
            'hppt' => '1708203200',
            'gravida' => 'G1p040',
            'lila' => '-',
            'djj' => '140',
            'tfu' => '-',
            'berat_bayi' => '37 minggu',
            'diagnosa' => '-',
            'keterangan' => 'lahir dengan Selamat',
        ]);
        RekamMedisKehamilan::create([
            'pasien_id' => '1',
            'berat_badan' => '80kg',
            'tinggi_badan' => '160cm',
            'tekanan_darah' => '110/80',
            'uk' => '5 minggu',
            'prest' => 'Kepala',
            'tp' => '1703203200',
            'hppt' => '1708203200',
            'gravida' => 'G1p040',
            'lila' => '-',
            'djj' => '140',
            'tfu' => '-',
            'diagnosa' => '-',
            'keterangan' => 'ayi Tumbuh dalam kandungan dengan sehat',
        ]);
        RekamMedisKehamilan::create([
            'pasien_id' => '3',
            'berat_badan' => '80kg',
            'tinggi_badan' => '160cm',
            'tekanan_darah' => '110/80',
            'uk' => '8 minggu',
            'prest' => 'Kepala',
            'tp' => '1703203200',
            'hppt' => '1708203200',
            'gravida' => 'G1p040',
            'lila' => '-',
            'djj' => '140',
            'tfu' => '-',
            'diagnosa' => '-',
            'keterangan' => 'Bayi Tumbuh dalam kandungan dengan sehat',
        ]);
        RekamMedis::create([
            'pasien_id' => '2',
            'berat_badan' => '70 kg',
            'tinggi_badan' => '160 cm',
            'tekanan_darah' => '110/80',
            'diagnosa' => 'Panas',
            'keterangan' => '-',
        ]);
        RekamMedis::create([
            'pasien_id' => '3',
            'berat_badan' => '70 kg',
            'tinggi_badan' => '150 cm',
            'tekanan_darah' => '110/80',
            'diagnosa' => 'Flu',
            'keterangan' => '-',
        ]);
        RekamMedis::create([
            'pasien_id' => '1',
            'berat_badan' => '60 kg',
            'tinggi_badan' => '160cm',
            'tekanan_darah' => '110/90',
            'diagnosa' => 'Cacar',
            'keterangan' => '-',
        ]);
        RekamMedis::create([
            'pasien_id' => '5',
            'berat_badan' => '70 kg',
            'tinggi_badan' => '170 cm',
            'tekanan_darah' => '110/80',
            'diagnosa' => 'Muntaber',
            'keterangan' => '-',
        ]);

        RekamMedisImunisasi::create([
            'pasien_id' => '1',
            'nama_anak' => 'Udin',
            'berat_badan' => '20 kg',
            'tinggi_badan' => '80 cm',
            'tekanan_darah' => '110/90',
            'jenis_imunisasi' => 'campak',
            'keterangan' => '-',
        ]);
        RekamMedisImunisasi::create([
            'pasien_id' => '6',
            'nama_anak' => 'Asep',
            'berat_badan' => '20 kg',
            'tinggi_badan' => '80 cm',
            'tekanan_darah' => '110/90',
            'jenis_imunisasi' => 'campak',
            'keterangan' => '-',
        ]);
        RekamMedisImunisasi::create([
            'pasien_id' => '3',
            'nama_anak' => 'anin',
            'berat_badan' => '30 kg',
            'tinggi_badan' => '80 cm',
            'tekanan_darah' => '110/90',
            'jenis_imunisasi' => 'campak',
            'keterangan' => '-',
        ]);
        RekamMedisBalita::create([
            'pasien_id' => '3',
            'nama_balita' => 'ucup',
            'berat_badan' => '30 kg',
            'tinggi_badan' => '80 cm',
            'tekanan_darah' => '110/90',
            'diagnosa' => 'demam',
            'keterangan' => '-',
        ]);
        RekamMedisBalita::create([
            'pasien_id' => '5',
            'nama_balita' => 'Nina',
            'berat_badan' => '30 kg',
            'tinggi_badan' => '80 cm',
            'tekanan_darah' => '110/90',
            'diagnosa' => 'demam',
            'keterangan' => '-',
        ]);
        RekamMedisBalita::create([
            'pasien_id' => '1',
            'nama_balita' => 'udin',
            'berat_badan' => '30 kg',
            'tinggi_badan' => '80 cm',
            'tekanan_darah' => '110/90',
            'diagnosa' => 'cacar',
            'keterangan' => '-',
        ]);
        RekamMedisNifas::create([
            'pasien_id' => '2',
            'berat_badan' => '70 kg',
            'tinggi_badan' => '160 cm',
            'tekanan_darah' => '110/80',
            'periode' => '2 minggu',
            'diagnosa' => 'Panas',
            'keterangan' => '-',
        ]);
        RekamMedisNifas::create([
            'pasien_id' => '1',
            'berat_badan' => '60 kg',
            'tinggi_badan' => '160cm',
            'tekanan_darah' => '110/90',
            'periode' => '2 minggu',
            'diagnosa' => 'Cacar',
            'keterangan' => '-',
        ]);
    }
}
