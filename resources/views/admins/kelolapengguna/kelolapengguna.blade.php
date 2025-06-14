@extends('admins.layouts.layout')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">📘 Kelola Pengguna</h2>

    <!-- Tabel Pengguna -->
    <table class="table table-bordered table-striped">
      <thead class="table-primary">
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Email</th>
          <th>No Handphone</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @if ($pengguna->count() > 0)
          @foreach ($pengguna as $index => $item)
          <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->no_hp }}</td>
            <td>
              <form action="{{ route('kelolapengguna.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
              </form>
            </td>
          </tr>
          @endforeach
        @else
          <tr>
            <td colspan="5" class="text-center">Tidak ada data pengguna.</td>
          </tr>
        @endif
      </tbody>
    </table>
</div>
@endsection
