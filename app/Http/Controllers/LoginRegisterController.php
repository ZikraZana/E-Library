<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('loginregister.index');
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'nama_lengkap' => 'required',
            'nomor_hp' => 'required|min:12',
            'password' => 'required|min:8',
        ], [
            'email.required' => 'Email harus diisi!',
            'email.email' => 'Email tidak valid!',
            'email.unique' => 'Email sudah terdaftar!',
            'nama_lengkap.required' => 'Nama lengkap harus diisi!',
            'nomor_hp.required' => 'Nomor HP harus diisi!',
            'nomor_hp.min' => 'Nomor HP minimal 12 karakter!',
            'password.required' => 'Password harus diisi!',
            'password.min' => 'Password minimal 8 karakter!',
        ]);
        

        User::insert([
            'email' => $request->email,
            'nama_lengkap' => $request->nama_lengkap,
            'nomor_hp' => $request->nomor_hp,
            'password' => $request->password
        ]);

        return redirect()->route('loginregister.index');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
