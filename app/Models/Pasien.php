<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function rekam_medis()
    {
        return $this->hasMany(RekamMedis::class);
    }

    public function rekam_medis_bersalin()
    {
        return $this->hasMany(RekamMedisBersalin::class);
    }

    public function rekam_medis_kb()
    {
        return $this->hasMany(RekamMedisKB::class);
    }

    public function rekam_medis_imunisasi()
    {
        return $this->hasMany(RekamMedisImunisasi::class);
    }

    public function rekam_medis_balita()
    {
        return $this->hasMany(RekamMedisImunisasi::class);
    }

    public function rekam_medis_kehamilan()
    {
        return $this->hasMany(RekamMedisKehamilan::class);
    }

    public function rekam_medis_nifas()
    {
        return $this->hasMany(RekamMedisNifas::class);
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
