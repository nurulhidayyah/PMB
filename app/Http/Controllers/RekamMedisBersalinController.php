<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\RekamMedisBersalin;
use Illuminate\Http\Request;

class RekamMedisBersalinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.bersalin.index', [
            'bersalins' => RekamMedisBersalin::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.bersalin.create', [
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
            'berat_bayi' => 'required|max:255',
            'diagnosa' => 'required|max:255',
            'keterangan' => 'required|max:255',
        ]);

        $validatedData['tp'] = strtotime($request->tp);
        $validatedData['hppt'] = strtotime($request->hppt);
        RekamMedisBersalin::create($validatedData);
        return redirect('/user/rekam_medis/bersalin')->with('success', 'Tambah Rekam Medis Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RekamMedisBersalin  $rekamMedisBersalin
     * @return \Illuminate\Http\Response
     */
    public function show(RekamMedisBersalin $rekamMedisBersalin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RekamMedisBersalin  $rekamMedisBersalin
     * @return \Illuminate\Http\Response
     */
    public function edit(RekamMedisBersalin $rekamMedisBersalin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RekamMedisBersalin  $rekamMedisBersalin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RekamMedisBersalin $rekamMedisBersalin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RekamMedisBersalin  $rekamMedisBersalin
     * @return \Illuminate\Http\Response
     */
    public function destroy(RekamMedisBersalin $rekamMedisBersalin)
    {
        //
    }
}
