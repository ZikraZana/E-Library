<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;



class LoginRegisterController extends Controller
{

    public function index()
    {
        return view('loginregister.index');
    }

    // Proses Register
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
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

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput()
                ->with('open_register_tab', true); // ⬅️ Flag yang akan kita pakai di view
        }

        User::insert([
            'email' => $request->email,
            'nama_lengkap' => $request->nama_lengkap,
            'nomor_hp' => $request->nomor_hp,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('login');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }



    // Proses Login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/home');
        }
        return back()->withErrors([
            'login' => 'Email atau password salah!',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/loginregister');
    }
}
