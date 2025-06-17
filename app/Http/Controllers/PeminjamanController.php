<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\DaftarBuku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Models\KelolaPengguna;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    // Menampilkan semua data peminjaman
    public function index()
    {
        $peminjaman = Peminjaman::with(['user', 'buku'])->get();
        $pengguna = User::all();
        $buku = DaftarBuku::all();
        $peminjaman = Peminjaman::all();
        return view('admins.kelolapinjam.kelolapinjam', compact('peminjaman', 'pengguna', 'buku'));
    }

    // Menampilkan form tambah peminjaman
    public function create()
    {
        $pengguna = User::all();
        $buku = DaftarBuku::all();
        return view('admins.kelolapinjam.create', compact('pengguna', 'buku'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'buku_id' => 'required|exists:daftar_buku,id',
            'tanggal_peminjaman' => 'required|date',
            'tanggal_pengembalian' => 'required|date|after_or_equal:tanggal_peminjaman',
            'status' => 'required|string',
        ], [
            'user_id.required' => 'ID pengguna harus diisi',
            'user_id.exists' => 'ID pengguna tidak valid',
            'buku_id.required' => 'ID buku harus diisi',
            'buku_id.exists' => 'ID buku tidak valid',
            'tanggal_peminjaman.required' => 'Tanggal peminjaman harus diisi',
            'tanggal_peminjaman.date' => 'Format tanggal peminjaman tidak valid',
            'tanggal_pengembalian.required' => 'Tanggal pengembalian harus diisi',
            'tanggal_pengembalian.date' => 'Format tanggal pengembalian tidak valid',
            'tanggal_pengembalian.after_or_equal' => 'Tanggal pengembalian harus setelah atau sama dengan tanggal peminjaman',
            'status.required' => 'Status harus diisi',
            'status.string' => 'Status harus berupa teks'
        ]);
        Peminjaman::create($request->all());


        $buku = DaftarBuku::findOrFail($request->buku_id);
        if ($buku->jumlah_buku > 0) {
            $buku->decrement('jumlah_buku');
        } else {
            return redirect()->back()->with('error', 'Buku tidak tersedia');
        }

        return redirect()->route('admins.kelolapinjam.index')->with('success', 'Data peminjaman berhasil ditambahkan.');
    }

    public function indexUser($id)
    {
        $peminjaman = Peminjaman::with(['user', 'buku'])
            ->where('user_id', $id)
            ->get();
        $pengguna = User::find($id);
        $buku = DaftarBuku::where('id', $id)->first();
        if ($buku->jumlah_buku == 0) {
            return redirect()->back()->with('buku_habis', 'Buku tidak tersedia');
        }
        return view('users.peminjaman.peminjaman', compact('peminjaman', 'pengguna', 'buku'));
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'buku_id' => 'required|exists:daftar_buku,id',
            'tanggal_peminjaman' => 'required|date|after_or_equal:today',
            'tanggal_pengembalian' => 'required|date|after_or_equal:tanggal_peminjaman',
        ], [
            'user_id.required' => 'ID pengguna harus diisi',
            'user_id.exists' => 'ID pengguna tidak valid',
            'buku_id.required' => 'ID buku harus diisi',
            'buku_id.exists' => 'ID buku tidak valid',
            'tanggal_peminjaman.required' => 'Tanggal peminjaman harus diisi',
            'tanggal_peminjaman.date' => 'Format tanggal peminjaman tidak valid',
            'tanggal_peminjaman.after_or_equal' => 'Tanggal peminjaman harus hari ini atau setelahnya',
            'tanggal_pengembalian.required' => 'Tanggal pengembalian harus diisi',
            'tanggal_pengembalian.date' => 'Format tanggal pengembalian tidak valid',
            'tanggal_pengembalian.after_or_equal' => 'Tanggal pengembalian harus setelah atau sama dengan tanggal peminjaman'
        ]);

        Peminjaman::create($request->all());
        $buku = DaftarBuku::findOrFail($request->buku_id);
        if ($buku->jumlah_buku > 0) {
            $buku->decrement('jumlah_buku');
        } else {
            return redirect()->back()->with('error', 'Buku tidak tersedia');
        }

        return redirect()->route('peminjaman.storeUser')->with('success', 'Peminjaman berhasil dikonfirmasi.');
    }

    public function riwayatUser()
    {
        $peminjaman = Peminjaman::with('buku')
            ->get();

        return view('users.historiuser.historiuser', compact('peminjaman'));
    }


    // Menampilkan detail satu peminjaman
    public function show($id)
    {
        $peminjaman = Peminjaman::with(['user', 'buku'])->findOrFail($id);
        return view('admins.kelolapinjam.show', compact('peminjaman'));
    }

    // Update data peminjaman
    public function update(Request $request, $id)
    {

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