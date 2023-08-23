<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\RekamMedisImunisasi;
use Illuminate\Http\Request;

class AdminRekamMedisImunisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.imunisasi.index', [
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
        //
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
