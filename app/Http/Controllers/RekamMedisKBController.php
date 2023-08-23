<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\RekamMedisKB;
use Illuminate\Http\Request;

class RekamMedisKBController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.kb.index', [
            'kbs' => RekamMedisKB::all(),
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
            'nama_pasangan' => 'required|max:255',
            'jenis_kb' => 'required|max:255',
            'tanggal_pemasangan' => 'required|max:255',
            'jumlah_anak' => 'required|max:255',
            'keterangan' => 'required|max:255'
        ]);

        $validatedData['tanggal_pemasangan'] = strtotime($request->tanggal_pemasangan);

        RekamMedisKB::create($validatedData);
        return redirect('/user/rekam_medis/kb')->with('success', 'Tambah Rekam Medis Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RekamMedisKB  $rekamMedisKB
     * @return \Illuminate\Http\Response
     */
    public function show(RekamMedisKB $rekamMedisKB)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RekamMedisKB  $rekamMedisKB
     * @return \Illuminate\Http\Response
     */
    public function edit(RekamMedisKB $rekamMedisKB)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RekamMedisKB  $rekamMedisKB
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RekamMedisKB $rekamMedisKB)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RekamMedisKB  $rekamMedisKB
     * @return \Illuminate\Http\Response
     */
    public function destroy(RekamMedisKB $rekamMedisKB)
    {
        //
    }
}
