<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailTransaksi;
use App\Models\Obat;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Validator;

class DetailTransaksiController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'transaksi_id' => 'required|exists:transaksis,id',
            'obat_id' => 'required|exists:obats,id',
            'quantity' => 'required|integer|min:1',
            'harga' => 'required|numeric|min:0',
        ], [
            'quantity.min' => 'Jumlah obat yang ditambahkan harus lebih dari 0.',
            'harga.min' => 'Harga obat harus non-negatif.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $transaksi = Transaksi::find($request->input('transaksi_id'));

        if (!$transaksi) {
            return redirect()->back()->with('error', 'Transaksi tidak ditemukan.');
        }

        // Pastikan stok cukup sebelum menyimpan
        $obat = Obat::find($request->input('obat_id'));
        if (!$obat || $obat->stok < $request->input('quantity')) {
            return redirect()->back()->with('error', 'Stok obat tidak mencukupi.');
        }

        // Mengurangi stok obat
        $obat->stok -= $request->input('quantity');
        $obat->save();

        $detailTransaksi = DetailTransaksi::create([
            'transaksi_id' => $transaksi->id,
            'obat_id' => $request->input('obat_id'),
            'quantity' => $request->input('quantity'),
            'harga' => $request->input('harga'),
        ]);

        return redirect()->back()->with('success', 'Detail transaksi berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $detailTransaksi = DetailTransaksi::find($id);

        if (!$detailTransaksi) {
            return redirect()->back()->with('error', 'Detail transaksi tidak ditemukan.');
        }

        // Mengembalikan stok obat saat menghapus detail transaksi
        $obat = Obat::find($detailTransaksi->obat_id);
        $obat->stok += $detailTransaksi->quantity;
        $obat->save();

        $detailTransaksi->delete();

        return redirect()->back()->with('success', 'Detail transaksi berhasil dihapus.');
    }
}
