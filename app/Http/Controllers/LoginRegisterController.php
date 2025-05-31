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
        return view('users.loginregister.index');
    }

    // Proses Register
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email',
            'nama_lengkap' => 'required',
            'nomor_hp' => 'required|min:12',
            'new_password' => 'required|min:8',
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

        if ($request->new_password != $request->confirm_password) {
            return back()
                ->withErrors(['confirm_password' => 'Konfirmasi password tidak sesuai!'])
                ->withInput()
                ->with('open_register_tab', true);
        }

        User::insert([
            'email' => $request->email,
            'nama_lengkap' => $request->nama_lengkap,
            'nomor_hp' => $request->nomor_hp,
            'password' => Hash::make($request->new_password)
        ]);

        return redirect()->route('login');
    }


    // Proses Login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email_login' => ['required', 'email'],
            'password_login' => ['required'],
        ], [
                'email_login.required' => 'Email harus diisi!',
                'email_login.email' => 'Email tidak valid!',
                'password_login.required' => 'Password harus diisi!',
            ]
        );

        if (Auth::attempt(['email' => $credentials['email_login'], 'password' => $credentials['password_login']])) {
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
