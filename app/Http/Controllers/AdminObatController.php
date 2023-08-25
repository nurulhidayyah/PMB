<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class AdminObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;

        // Query untuk mencari obat berdasarkan nama obat, jenis obat, expire date, id, dan harga
        $obats = Obat::where('nama_obat', 'LIKE', "%$search%")
            ->orWhere('jenis_obat', 'LIKE', "%$search%")
            ->orWhere('expire_date', 'LIKE', "%$search%")
            ->orWhere('id', 'LIKE', "%$search%")
            ->orWhere('harga', 'LIKE', "%$search%")->paginate(10);

        // Mengatur opsi pagination agar nomor halaman meneruskan dari halaman pertama
        $obats->appends(['search' => $search]);

        return view('admin.obat.index', compact('obats'));
    }




    //     return view('admin.obat.index', [
    //         'obats' => Obat::all()
    //     ]);
    // }

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
            'nama_obat' => 'required|max:255',
            'jenis_obat' => 'required|max:255',
            'harga' => 'required|max:255',
            'stok' => 'required|max:255',
            'expire_date' => 'required|max:255'
        ]);

        $validatedData['expire_date'] = strtotime($request->expire_date);

        Obat::create($validatedData);
        return redirect('/admin/obat')->with('success', 'Tambah Obat Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function show(Obat $obat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function edit(Obat $obat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Obat $obat)
    {
        $validatedData = $request->validate([
            'nama_obat' => 'required|max:255',
            'jenis_obat' => 'required|max:255',
            'harga' => 'required|max:255',
            'stok' => 'required|max:255',
            'expire_date' => 'required|max:255'
        ]);

        $validatedData['expire_date'] = strtotime($request->expire_date);

        Obat::where('id', $obat->id)->update($validatedData);
        return redirect('/admin/obat')->with('success', 'Tambah Obat Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Obat $obat)
    {
        Obat::destroy($obat->id);

        return redirect('/admin/obat')->with('success', 'Obat berhasil dihapus!');
    }
}
