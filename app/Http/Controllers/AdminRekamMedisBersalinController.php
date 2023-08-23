<?php

namespace App\Http\Controllers;

use App\Models\RekamMedisBersalin;
use Illuminate\Http\Request;

class AdminRekamMedisBersalinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.bersalin.index', [
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
