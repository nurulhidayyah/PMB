<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\Pasien;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;

class AdminPenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pengguna.index', [
            'users' => User::where('role_id', '!=', 1)->get(),
            'user_role' => UserRole::all()
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
            'nama' => 'required|max:255',
            'email' => ['required', 'unique:users', 'email'],
            'phone' => 'required|min:10',
            'password' => 'required|min:3|max:255',
            'role_id' => 'required'
        ]);

        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        return redirect('/admin/pengguna')->with('success', 'Tambah Pengguna Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'phone' => 'required|min:10',
            'password' => 'required|min:3|max:255',
            'role_id' => 'required'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::where('id', $request->id)->update($validatedData);

        return redirect('/admin/pengguna')->with('success', 'Pengguna berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Request $request)
    {
        if ($request->oldImage) {
            Storage::delete($request->oldImage);
        }

        // // Hapus transaksi yang terkait dengan pengguna
        // $user->transaksis()->delete();

        // Hapus pengguna
        User::destroy($request->id);

        return redirect('/admin/pengguna')->with('success', 'Pengguna dan transaksi terkait berhasil dihapus!');
    }
}
