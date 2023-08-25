<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\Penanganan;
use App\Models\Transaksi;
use App\Models\Obat;
use App\Models\DetailTransaksi;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = DetailTransaksi::with('transaksi')->get();

        return view('/admin/report/transaksi', [
            'transaksis' => $transaksis,
        ]);
    }


    public function cetakStruk($id)
    {
        $transaksi = Transaksi::findOrFail($id); // Ganti Transaksi dengan model yang sesuai

        return view('user.transaksi.struk.cetak-struk', compact('transaksi'));
    }


    public function create(Request $request)
    {
        $pasiens = Pasien::all();
        $penanganans = Penanganan::all();
        $obats = Obat::all();

        $search = $request->search;
        $transaksis = Transaksi::whereHas('pasien', function ($query) use ($search) {
            $query->where('nama_pasien', 'LIKE', "%$search%")
                ->orWhere('nik', 'LIKE', "%$search%");
        })
            ->orWhereHas('penanganan', function ($query) use ($search) {
                $query->where('nama_layanan', 'LIKE', "%$search%");
            })
            ->orWhere('total_biaya', 'LIKE', "%$search%")
            ->orWhere('pembayaran', 'LIKE', "%$search%")
            ->orWhere('kembalian', 'LIKE', "%$search%")->paginate(5);


        // 10 transaksi per halaman

        return view('user.transaksi.create', compact('pasiens', 'penanganans', 'obats', 'transaksis'));
    }




    public function store(Request $request)
    {
        // Mendapatkan informasi pengguna yang sedang aktif
        $user = Auth::user();
        $daftar_obat = json_decode($request->input('daftar_obat'), true);
        $customMessages = [
            'pembayaran.required' => 'Pembayaran harus diisi.',
            'id' => 'Nama Pasien Pembayaran harus diisi.',
            'tanggal' => 'Tanggal harus diisi.',
            'total_biaya' => 'Masukan Daftar Obat dan Layanan Agar terisisi.',
            'pembayaran' => 'Pembayaran harus setidaknya sejumlah total biaya.',
            'kembalian' => 'Kembalian tidak boleh lebih besar dari pembayaran.',
            'daftar_obat.*.id.exists' => 'Obat yang dipilih tidak valid.',
            'daftar_obat.*.harga.min' => 'Harga obat harus setidaknya 0.',
            // Tambahkan aturan validasi lainnya dan pesan kustom di sini...
        ];
        $validatedData = $request->validate([
            'pasien_id' => 'required|exists:pasiens,id',
            'penanganan_id' => 'required|exists:penanganans,id',
            'total_biaya' => 'required|numeric|min:0',
            'tanggal' => 'required',
            'pembayaran' => 'required|numeric|min:' . $request->input('total_biaya'),
            'kembalian' => 'required|numeric|min:0|lte:pembayaran',
            'daftar_obat.*.id' => 'required|exists:obats,id',
            'daftar_obat.*.nama_obat' => 'required',
            'daftar_obat.*.harga' => 'required|numeric|min:0',
            'daftar_obat.*.quantity' => 'required|integer|min:1',

        ], $customMessages);

        // Simpan transaksi ke database
        $transaksi = new Transaksi();
        $transaksi->pasien_id = $request->input('pasien_id');
        $transaksi->user_id = $user->id; // Mengisi kolom user_id dengan ID pengguna yang sedang aktif
        $transaksi->penanganan_id = $request->input('penanganan_id');
        $transaksi->tanggal = $request->input('tanggal');
        $transaksi->total_biaya = $request->input('total_biaya');
        $transaksi->pembayaran = $request->input('pembayaran');
        $transaksi->kembalian = $request->input('kembalian');
        $transaksi->save();

        // Simpan daftar obat terkait transaksi ke dalam tabel detail_transaksi
        foreach ($daftar_obat as $obatData) {
            $detailTransaksi = new DetailTransaksi();
            $detailTransaksi->transaksi_id = $transaksi->id;
            $detailTransaksi->obat_id = $obatData['id'];
            $detailTransaksi->nama_obat = $obatData['nama_obat'];
            $detailTransaksi->harga = $obatData['harga'];
            $detailTransaksi->quantity = $obatData['quantity'];
            $detailTransaksi->save();
        }

        return redirect()->route('user.transaksi.create')->with('success', 'Transaksi berhasil disimpan.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
