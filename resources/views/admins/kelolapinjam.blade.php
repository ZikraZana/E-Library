<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Kelola Peminjaman Buku</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
  <div class="container mt-5">
    <h2 class="text-center mb-4">📘 Kelola Peminjaman Buku</h2>

    <div class="mb-3 text-end">
      <a href="profileadmin.html" class="btn btn-secondary">Kembali ke Profile</a>
    </div>

    <!-- Form Tambah Peminjaman -->
    <div class="card mb-4">
      <div class="card-body">
        <h5 class="card-title">Tambah Peminjaman</h5>
        <div class="row g-3">
          <div class="col-md-3">
            <input type="text" id="inputNama" class="form-control" placeholder="Nama Peminjam" required />
          </div>
          <div class="col-md-3">
            <input type="text" id="inputJudul" class="form-control" placeholder="Judul Buku" required />
          </div>
          <div class="col-md-3">
            <input type="date" id="inputTanggal" class="form-control" required />
          </div>
          <div class="col-md-3">
            <input type="number" id="inputDurasi" class="form-control" placeholder="Durasi (hari)" min="1" required />
          </div>
          <div class="col-md-12 text-end">
            <button class="btn btn-primary mt-2" id="btnTambah">Tambah Peminjaman</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Tabel Peminjaman -->
    <table class="table table-bordered table-striped">
      <thead class="table-primary">
        <tr>
          <th>No</th>
          <th>Nama Peminjam</th>
          <th>Judul Buku</th>
          <th>Tanggal Pinjam</th>
          <th>Tanggal Pengembalian</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody id="pinjamTable">
        <tr>
          <td>1</td>
          <td>Siti Aisyah</td>
          <td>Pemrograman Web</td>
          <td>01 Juni 2025</td>
          <td>08 Juni 2025</td>
          <td><span class="badge bg-warning">Dipinjam</span></td>
          <td><button class="btn btn-success btn-sm btn-konfirmasi">Konfirmasi Pengembalian</button></td>
        </tr>
        <tr>
          <td>2</td>
          <td>Ahmad Fadli</td>
          <td>Sistem Basis Data</td>
          <td>28 Mei 2025</td>
          <td>04 Juni 2025</td>
          <td><span class="badge bg-success">Dikembalikan</span></td>
          <td><button class="btn btn-secondary btn-sm" disabled>Selesai</button></td>
        </tr>
      </tbody>
    </table>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      function attachKonfirmasiHandler(button) {
        button.addEventListener("click", function () {
          const row = this.closest("tr");
          row.querySelector("td:nth-child(6) .badge").textContent = "Dikembalikan";
          row.querySelector("td:nth-child(6) .badge").className = "badge bg-success";
          this.className = "btn btn-secondary btn-sm";
          this.textContent = "Selesai";
          this.disabled = true;
        });
      }

      // Pasang event untuk tombol yang sudah ada
      document.querySelectorAll(".btn-konfirmasi").forEach(attachKonfirmasiHandler);

      // Tambah data
      document.getElementById("btnTambah").addEventListener("click", function () {
        const nama = document.getElementById("inputNama").value.trim();
        const judul = document.getElementById("inputJudul").value.trim();
        const tanggalPinjam = document.getElementById("inputTanggal").value;
        const durasi = parseInt(document.getElementById("inputDurasi").value);

        if (!nama || !judul || !tanggalPinjam || !durasi || durasi < 1) {
          alert("Mohon isi semua kolom dengan benar.");
          return;
        }

        const tanggalPengembalian = hitungTanggalPengembalian(tanggalPinjam, durasi);
        const tabel = document.getElementById("pinjamTable");
        const no = tabel.rows.length + 1;

        const newRow = tabel.insertRow();
        newRow.innerHTML = `
          <td>${no}</td>
          <td>${nama}</td>
          <td>${judul}</td>
          <td>${formatTanggalIndo(tanggalPinjam)}</td>
          <td>${formatTanggalIndo(tanggalPengembalian)}</td>
          <td><span class="badge bg-warning">Dipinjam</span></td>
          <td><button class="btn btn-success btn-sm btn-konfirmasi">Konfirmasi Pengembalian</button></td>
        `;

        attachKonfirmasiHandler(newRow.querySelector(".btn-konfirmasi"));

        // Reset form
        document.getElementById("inputNama").value = "";
        document.getElementById("inputJudul").value = "";
        document.getElementById("inputTanggal").value = "";
        document.getElementById("inputDurasi").value = "";
      });

      function hitungTanggalPengembalian(tanggal, durasiHari) {
        const date = new Date(tanggal);
        date.setDate(date.getDate() + durasiHari);
        return date.toISOString().split("T")[0]; // yyyy-mm-dd
      }

      function formatTanggalIndo(tgl) {
        const bulanIndo = [
          "Januari", "Februari", "Maret", "April", "Mei", "Juni",
          "Juli", "Agustus", "September", "Oktober", "November", "Desember"
        ];
        const [tahun, bulan, tanggal] = tgl.split("-");
        return `${tanggal} ${bulanIndo[parseInt(bulan) - 1]} ${tahun}`;
      }
    });
  </script>
</body>
</html>
