<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DaftarBuku;

class DaftarBukuController extends Controller
{
    // Menampilkan semua buku
    public function index()
    {
        $buku = DaftarBuku::all();
        return view('daftar_buku.index', compact('buku'));
    }

    // Menampilkan form tambah buku
    public function create()
    {
        return view('daftar_buku.create');
    }

    // Menyimpan buku baru
    public function store(Request $request)
    {
        $request->validate([
            'no_katalog' => 'required|unique:daftar_buku,no_katalog',
            'judul_buku' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'kategori' => 'required',
            'jumlah_buku' => 'required|integer',
            'cover_buku' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Simpan file cover
        $coverPath = $request->file('cover_buku')->store('covers', 'public');

        DaftarBuku::create([
            'no_katalog' => $request->no_katalog,
            'judul_buku' => $request->judul_buku,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'kategori' => $request->kategori,
            'jumlah_buku' => $request->jumlah_buku,
            'cover_buku' => $coverPath,
        ]);

        return redirect()->route('daftar_buku.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    // Menampilkan detail buku
    public function show($id)
    {
        $buku = DaftarBuku::findOrFail($id);
        return view('daftar_buku.show', compact('buku'));
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $buku = DaftarBuku::findOrFail($id);
        return view('daftar_buku.edit', compact('buku'));
    }

    // Update data buku
    public function update(Request $request, $id)
    {
        $buku = DaftarBuku::findOrFail($id);

        $request->validate([
            'no_katalog' => 'required|unique:daftar_buku,no_katalog,' . $id,
            'judul_buku' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'kategori' => 'required',
            'jumlah_buku' => 'required|integer',
            'cover_buku' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only([
            'no_katalog', 'judul_buku', 'penulis', 'penerbit', 'kategori', 'jumlah_buku'
        ]);

        if ($request->hasFile('cover_buku')) {
            $data['cover_buku'] = $request->file('cover_buku')->store('covers', 'public');
        }

        $buku->update($data);

        return redirect()->route('daftar_buku.index')->with('success', 'Buku berhasil diperbarui.');
    }

    // Menghapus buku
    public function destroy($id)
    {
        $buku = DaftarBuku::findOrFail($id);
        $buku->delete();

        return redirect()->route('daftar_buku.index')->with('success', 'Buku berhasil dihapus.');
    }
}
