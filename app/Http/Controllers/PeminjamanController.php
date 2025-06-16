<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\DaftarBuku;
use App\Models\User;
use App\Models\KelolaPengguna;

class PeminjamanController extends Controller
{
    // Menampilkan semua data peminjaman
    public function index()
    {
        $peminjaman = Peminjaman::with(['user', 'buku'])->get();
        $pengguna = User::all();
        $buku = DaftarBuku::all();
        return view('admins.kelolapinjam.kelolapinjam', compact('peminjaman', 'pengguna', 'buku'));
    }

    // Menampilkan form tambah peminjaman
    public function create()
    {
        $pengguna = User::all();
        $buku = DaftarBuku::all();
        return view('admins.kelolapinjam.create', compact('pengguna', 'buku'));
    }

    // Menyimpan data peminjaman baru
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'buku_id' => 'required|exists:daftar_buku,id',
            'tanggal_peminjaman' => 'required|date',
            'tanggal_pengembalian' => 'required|date|after_or_equal:tanggal_peminjaman',
            'status' => 'required|string',
        ]);

        Peminjaman::create($request->all());

        return redirect()->route('admins.kelolapinjam.index')->with('success', 'Data peminjaman berhasil ditambahkan.');
    }

    // Menampilkan detail satu peminjaman
    public function show($id)
    {
        $peminjaman = Peminjaman::with(['user', 'buku'])->findOrFail($id);
        return view('admins.kelolapinjam.show', compact('peminjaman'));
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $users = User::all();
        $buku = DaftarBuku::all();
        return view('admins.kelolapinjam.edit', compact('peminjaman', 'pengguna', 'buku'));
    }

    // Update data peminjaman
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'buku_id' => 'required|exists:daftar_buku,id',
            'tanggal_peminjaman' => 'required|date',
            'tanggal_pengembalian' => 'required|date|after_or_equal:tanggal_peminjaman',
            'status' => 'required|string',
        ]);

        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->update($request->all());
        $peminjaman->status = $request->status;
        $peminjaman->save();

        return redirect()->route('admins.kelolapinjam.index')->with('success', 'Data peminjaman berhasil diperbarui.');
    }

    // Menghapus data peminjaman
    public function destroy($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->delete();

        return redirect()->route('admins.kelolapinjam.index')->with('success', 'Data peminjaman berhasil dihapus.');
    }
}

