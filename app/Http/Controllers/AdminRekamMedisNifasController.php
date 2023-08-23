<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\RekamMedisNifas;
use Illuminate\Http\Request;

class AdminRekamMedisNifasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.nifas.index', [
            'nifass' => RekamMedisNifas::all(),
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
     * @param  \App\Models\RekamMedisNifas  $rekamMedisNifas
     * @return \Illuminate\Http\Response
     */
    public function show(RekamMedisNifas $rekamMedisNifas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RekamMedisNifas  $rekamMedisNifas
     * @return \Illuminate\Http\Response
     */
    public function edit(RekamMedisNifas $rekamMedisNifas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RekamMedisNifas  $rekamMedisNifas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RekamMedisNifas $rekamMedisNifas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RekamMedisNifas  $rekamMedisNifas
     * @return \Illuminate\Http\Response
     */
    public function destroy(RekamMedisNifas $rekamMedisNifas)
    {
        //
    }
}
