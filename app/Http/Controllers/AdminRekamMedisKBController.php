<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\RekamMedisKB;
use Illuminate\Http\Request;

class AdminRekamMedisKBController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.kb.index', [
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
        //
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
