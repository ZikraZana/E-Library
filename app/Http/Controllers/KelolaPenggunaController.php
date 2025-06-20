<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class KelolaPenggunaController extends Controller
{
    public function index()
    {
        $pengguna = User::all();
        return view('admins.kelolapengguna.kelolapengguna', compact('pengguna'));
    }

    public function create()
    {
        return view('admins.kelolapengguna.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:kelolapengguna,email',
            'no_hp' => 'nullable|string|max:20',
        ]);

        dd($request->all());
        User::create($request->all());

        return redirect()->route('kelolapengguna.index')->with('success', 'Pengguna berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        try {
            $pengguna = User::findOrFail($id);
            $pengguna->delete();

            return redirect()->route('kelolapengguna.index')
                ->with('success', 'Pengguna berhasil dihapus.');
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() === '23000') {
                // Foreign key constraint violation
                return redirect()->route('kelolapengguna.index')
                    ->with('error', 'Pengguna tidak dapat dihapus karena memiliki data terkait.');
            }

            return redirect()->route('kelolapengguna.index')
                ->with('error', 'Terjadi kesalahan saat menghapus pengguna.');
        }
    }


    // Jika tidak digunakan, bisa dikosongkan
    public function show($id) {}
    public function edit($id) {}
    public function update(Request $request, $id) {}
}
