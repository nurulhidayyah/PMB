<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Pasien;
use App\Models\RekamMedis;
use App\Models\RekamMedisBalita;
use App\Models\RekamMedisBersalin;
use App\Models\RekamMedisImunisasi;
use App\Models\RekamMedisKB;
use App\Models\RekamMedisKehamilan;
use App\Models\RekamMedisNifas;
use App\Models\Transaksi;
use Barryvdh\DomPDF\Facade\Pdf;

class Exportpdf extends Controller
{
    public function cetakStruk($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $pdf = Pdf::loadView('user.struk.struk', [
            'transaksi' => $transaksi,
        ])->setPaper([0, 0, 326, 426], 'portrait'); // Ganti ukuran [lebar, tinggi] sesuai kebutuhan
        return $pdf->stream();
    }

    public function kartu(Pasien $pasien)
    {
        $pdf = Pdf::loadView('kartu.kartu_pasien', [
            'data' => $pasien,
        ])->setPaper('a4', 'potrait');
        return $pdf->stream();
    }

    public function laporan()
    {
        $data = DetailTransaksi::with('transaksi')->get();
        $pdf = Pdf::loadView('admin.laporan.transaksi', [
            'transaksis' => $data,
        ])->setPaper('a4', 'landscape');
        return $pdf->stream();
    }

    public function rekamMedis()
    {
        $data = RekamMedis::all();
        $pdf = Pdf::loadView('laporan.umum', [
            'umums' => $data,
        ])->setPaper('a4', 'potrait');
        return $pdf->stream();
    }

    public function rekamMedisBersalin()
    {
        $data = RekamMedisBersalin::all();
        $pdf = Pdf::loadView('laporan.bersalin', [
            'bersalins' => $data,
        ])->setPaper('a4', 'potrait');
        return $pdf->stream();
    }

    public function rekamMedisKB()
    {
        $data = RekamMedisKB::all();
        $pdf = Pdf::loadView('laporan.kb', [
            'kbs' => $data,
        ])->setPaper('a4', 'potrait');
        return $pdf->stream();
    }

    public function rekamMedisImunisasi()
    {
        $data = RekamMedisImunisasi::all();
        $pdf = Pdf::loadView('laporan.imunisasi', [
            'imunisasis' => $data,
        ])->setPaper('a4', 'potrait');
        return $pdf->stream();
    }

    public function rekamMedisBalita()
    {
        $data = RekamMedisBalita::all();
        $pdf = Pdf::loadView('laporan.balita', [
            'balitas' => $data,
        ])->setPaper('a4', 'potrait');
        return $pdf->stream();
    }

    public function rekamMedisKehamilan()
    {
        $data = RekamMedisKehamilan::all();
        $pdf = Pdf::loadView('laporan.kehamilan', [
            'kehamilans' => $data,
        ])->setPaper('a4', 'potrait');
        return $pdf->stream();
    }

    public function rekamMedisNifas()
    {
        $data = RekamMedisNifas::all();
        $pdf = Pdf::loadView('laporan.nifas', [
            'nifass' => $data,
        ])->setPaper('a4', 'potrait');
        return $pdf->stream();
    }
}
