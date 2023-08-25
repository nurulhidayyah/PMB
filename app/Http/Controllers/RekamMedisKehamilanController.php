<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\RekamMedisKehamilan;
use Illuminate\Http\Request;

class RekamMedisKehamilanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.kehamilan.index', [
            'kehamilans' => RekamMedisKehamilan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.kehamilan.create', [
            'pasiens' => Pasien::all()
        ]);
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
            'berat_badan' => 'required|max:255',
            'tinggi_badan' => 'required|max:255',
            'tekanan_darah' => 'required|max:255',
            'uk' => 'required|max:255',
            'prest' => 'required|max:255',
            'tp' => 'required|max:255',
            'hppt' => 'required|max:255',
            'gravida' => 'required|max:255',
            'lila' => 'required|max:255',
            'djj' => 'required|max:255',
            'tfu' => 'required|max:255',
            'diagnosa' => 'required|max:255',
            'keterangan' => 'required|max:255',
        ]);
        $validatedData['tp'] = strtotime($request->tp);
        $validatedData['hppt'] = strtotime($request->hppt);
        RekamMedisKehamilan::create($validatedData);
        return redirect('/user/rekam_medis/kehamilan')->with('success', 'Tambah Rekam Medis Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RekamMediKehamilan  $rekamMediKehamilan
     * @return \Illuminate\Http\Response
     */
    public function show(RekamMedisKehamilan $rekamMedisKehamilan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RekamMedisKehamilan  $rekamMediKehamilan
     * @return \Illuminate\Http\Response
     */
    public function edit(RekamMedisKehamilan $rekamMedisKehamilan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RekamMedisehamilan  $rekamMediKehamilan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RekamMedisKehamilan $rekamMedisKehamilan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RekamMedisKehamilan  $rekamMediKehamilan
     * @return \Illuminate\Http\Response
     */
    public function destroy(RekamMedisKehamilan $rekamMedisKehamilan)
    {
        //
    }
}
