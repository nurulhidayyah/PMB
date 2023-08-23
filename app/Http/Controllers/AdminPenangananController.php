<?php

namespace App\Http\Controllers;

use App\Models\Penanganan;
use Illuminate\Http\Request;

class AdminPenangananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.penanganan.index', [
            'penanganans' => Penanganan::all()
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
            'nama_layanan' => 'required|max:255',
            'harga' => 'required|max:255',
        ]);

        Penanganan::create($validatedData);
        return redirect('/admin/penanganan')->with('success', 'Tambah Layanan Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penanganan  $penanganan
     * @return \Illuminate\Http\Response
     */
    public function show(Penanganan $penanganan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penanganan  $penanganan
     * @return \Illuminate\Http\Response
     */
    public function edit(Penanganan $penanganan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penanganan  $penanganan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penanganan $penanganan)
    {
        $validatedData = $request->validate([
            'nama_layanan' => 'required|max:255',
            'harga' => 'required|max:255',
        ]);

        Penanganan::where('id', $penanganan->id)->update($validatedData);
        return redirect('/admin/penanganan')->with('success', 'Update Penanganan Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penanganan  $penanganan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penanganan $penanganan)
    {
        Penanganan::destroy($penanganan->id);

        return redirect('/admin/penanganan')->with('success', 'Penanganan berhasil dihapus!');
    }
}
