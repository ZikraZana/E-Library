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
        return view('admins.kelolabuku.kelolabuku', compact('buku'));
    }

    // Menyimpan buku baru
    public function store(Request $request)
    {
        $request->validate(
            [
                'no_katalog' => 'required|unique:daftar_buku,no_katalog',
                'judul_buku' => 'required',
                'penulis' => 'required',
                'penerbit' => 'required',
                'kategori' => 'required',
                'jumlah_buku' => 'required|integer',
                'cover_buku' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            ],
            [
                'no_katalog.required' => 'No Katalog harus diisi.',
                'no_katalog.unique' => 'No Katalog sudah ada.',
                'judul_buku.required' => 'Judul Buku harus diisi.',
                'penulis.required' => 'Penulis harus diisi.',
                'penerbit.required' => 'Penerbit harus diisi.',
                'kategori.required' => 'Kategori harus diisi.',
                'jumlah_buku.required' => 'Jumlah Buku harus diisi.',
                'jumlah_buku.integer' => 'Jumlah Buku harus berupa angka.',
                'cover_buku.required' => 'Cover Buku harus diisi.',
                'cover_buku.image' => 'Cover Buku harus berupa gambar.',
                'cover_buku.mimes' => 'Cover Buku harus berupa gambar dengan format JPG, JPEG, atau PNG.',
                'cover_buku.max' => 'Ukuran Cover Buku tidak boleh lebih dari 2MB.'
            ]
        );
        // Simpan file cover
        $coverPath = $request->file('cover_buku')->store('cover_buku', 'public');

        DaftarBuku::create([
            'no_katalog' => $request->no_katalog,
            'judul_buku' => $request->judul_buku,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'kategori' => $request->kategori,
            'jumlah_buku' => $request->jumlah_buku,
            'cover_buku' => $coverPath,
        ]);

        return redirect()->route('admins.kelolabuku.index')->with('success', 'Buku berhasil ditambahkan.');
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
            'no_katalog',
            'judul_buku',
            'penulis',
            'penerbit',
            'kategori',
            'jumlah_buku'
        ]);

        if ($request->hasFile('cover_buku')) {
            $data['cover_buku'] = $request->file('cover_buku')->store('cover_buku', 'public');
        }

        $buku->update($data);

        return redirect()->route('admins.kelolabuku.index')->with('success', 'Buku berhasil diperbarui.');
    }

    // Menghapus buku
    public function destroy($id)
    {
        $buku = DaftarBuku::findOrFail($id);
        $buku->delete();

        return redirect()->route('admins.kelolabuku.index')->with('success', 'Buku berhasil dihapus.');
    }


    //Menampilkan card buku untuk user dan guest
    public function tampilDataBukuDaftarBuku()
    {
        $daftarbuku = DaftarBuku::all();
        return view('users.daftarbuku.index', compact('daftarbuku'));
    }
    public function tampilDataBukuHome(Request $request)
    {
        $search = $request->input('search');
        $kategori = $request->input('kategori');

        $query = DaftarBuku::query();

        if ($search) {
            $query->where('judul_buku', 'like', '%' . $search . '%');
        }

        if ($kategori) {
            $query->where('kategori', $kategori);
        }

        $daftarbuku = $query->get(); // <- Gunakan hasil query builder

        return view('users.home.index', compact('daftarbuku'));
    }
}
