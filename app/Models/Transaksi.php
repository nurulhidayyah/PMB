<?php

// app/Models/Transaksi.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $guarded = ['id'];

    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksi::class);
    }
    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'pasien_id');
    }

    public function penanganan()
    {
        return $this->belongsTo(Penanganan::class, 'penanganan_id');
    }
}
