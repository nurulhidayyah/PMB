<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\RekamMedis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserPasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.pasien.index', [
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
        $validatedData = $request->validate([
            'nik' => 'required|max:13|min:13|unique:pasiens',
            'nama_pasien' => 'required|max:255',
            'umur' => 'required|max:255',
            'jenis_kelamin' => 'required|max:255',
            'no_hp' => 'required|max:255',
            'alamat' => 'required|max:255'
        ]);

        Pasien::create($validatedData);
        return redirect('/user/pasien')->with('success', 'Tambah Pasien Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function show(Pasien $pasien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function edit(Pasien $pasien)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pasien $pasien)
    {
        $validatedData = $request->validate([
            'nik' => 'required|max:13|min:13|unique:pasiens',
            'nama_pasien' => 'required|max:255',
            'umur' => 'required|max:255',
            'jenis_kelamin' => 'required|max:255',
            'no_hp' => 'required|max:255',
            'alamat' => 'required|max:255'
        ]);

        Pasien::where('id', $pasien->id)->update($validatedData);
        return redirect('/user/pasien')->with('success', 'Ubah Pasien Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pasien $pasien)
    {
        Pasien::destroy($pasien->id);
        DB::table('rekam_medis')->where('pasien_id', $pasien->id)->delete();
        DB::table('rekam_medis_bersalins')->where('pasien_id', $pasien->id)->delete();
        DB::table('rekam_medis_k_b_s')->where('pasien_id', $pasien->id)->delete();
        DB::table('rekam_medis_imunisasis')->where('pasien_id', $pasien->id)->delete();
        DB::table('rekam_medis_balitas')->where('pasien_id', $pasien->id)->delete();
        DB::table('rekam_medis_kehamilans')->where('pasien_id', $pasien->id)->delete();
        DB::table('rekam_medis_nifas')->where('pasien_id', $pasien->id)->delete();
        return redirect('/user/pasien')->with('success', 'Pasien berhasil dihapus!');
    }
}