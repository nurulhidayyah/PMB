<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\RekamMedisBalita;
use Illuminate\Http\Request;

class AdminRekamMedisBalitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.balita.index', [
            'balitas' => RekamMedisBalita::all(),
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
     * @param  \App\Models\RekamMedisBalita  $rekamMedisBalita
     * @return \Illuminate\Http\Response
     */
    public function show(RekamMedisBalita $rekamMedisBalita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RekamMedisBalita  $rekamMedisBalita
     * @return \Illuminate\Http\Response
     */
    public function edit(RekamMedisBalita $rekamMedisBalita)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RekamMedisBalita  $rekamMedisBalita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RekamMedisBalita $rekamMedisBalita)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RekamMedisBalita  $rekamMedisBalita
     * @return \Illuminate\Http\Response
     */
    public function destroy(RekamMedisBalita $rekamMedisBalita)
    {
        //
    }
}
