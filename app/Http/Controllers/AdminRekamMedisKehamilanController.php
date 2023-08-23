<?php

namespace App\Http\Controllers;

use App\Models\RekamMedisKehamilan;
use Illuminate\Http\Request;

class AdminRekamMedisKehamilanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.kehamilan.index', [
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
     * @param  \App\Models\RekamMedisKehamilan  $rekamMedisKehamilan
     * @return \Illuminate\Http\Response
     */
    public function show(RekamMedisKehamilan $rekamMedisKehamilan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RekamMedisKehamilan  $rekamMedisKehamilan
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
     * @param  \App\Models\RekamMedisKehamilan  $rekamMedisKehamilan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RekamMedisKehamilan $rekamMedisKehamilan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RekamMedisKehamilan  $rekamMedisKehamilan
     * @return \Illuminate\Http\Response
     */
    public function destroy(RekamMedisKehamilan $rekamMedisKehamilan)
    {
        //
    }
}
