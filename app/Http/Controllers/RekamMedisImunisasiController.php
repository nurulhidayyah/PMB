<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\RekamMedisImunisasi;
use Illuminate\Http\Request;

class RekamMedisImunisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.imunisasi.index', [
            'imunisasis' => RekamMedisImunisasi::all(),
            'pasiens' => Pasien::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pasien_id' => 'required|max:255',
            'nama_anak' => 'required|max:255',
            'berat_badan' => 'required|max:255',
            'tinggi_badan' => 'required|max:255',
            'tekanan_darah' => 'required|max:255',
            'jenis_imunisasi' => 'required|max:255',
            'keterangan' => 'required|max:255'
        ]);

        RekamMedisImunisasi::create($validatedData);
        return redirect('/user/rekam_medis/imunisasi')->with('success', 'Tambah Rekam Medis Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RekamMedisImunisasi  $rekamMedisImunisasi
     * @return \Illuminate\Http\Response
     */
    public function show(RekamMedisImunisasi $rekamMedisImunisasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RekamMedisImunisasi  $rekamMedisImunisasi
     * @return \Illuminate\Http\Response
     */
    public function edit(RekamMedisImunisasi $rekamMedisImunisasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RekamMedisImunisasi  $rekamMedisImunisasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RekamMedisImunisasi $rekamMedisImunisasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RekamMedisImunisasi  $rekamMedisImunisasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(RekamMedisImunisasi $rekamMedisImunisasi)
    {
        //
    }
}
