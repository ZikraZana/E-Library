<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Kelola Daftar Buku</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
  <div class="container mt-5">
    <h2 class="text-center mb-4">📚 Kelola Daftar Buku</h2>

    <div class="mb-3 text-end">
      <a href="profileadmin.html" class="btn btn-secondary">Kembali ke Profile</a>
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bukuModal">+ Tambah Buku</button>
    </div>

    <table class="table table-bordered table-hover" id="bukuTable">
      <thead class="table-success">
        <tr>
          <th>No</th>
          <th>Judul Buku</th>
          <th>Penulis</th>
          <th>Kategori</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>Algoritma dan Pemrograman</td>
          <td>R. Abdul</td>
          <td>Informatika</td>
          <td>
            <button class="btn btn-warning btn-sm btn-edit">Edit</button>
            <button class="btn btn-danger btn-sm btn-hapus">Hapus</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  <!-- Modal Tambah/Edit Buku -->
  <div class="modal fade" id="bukuModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <form id="formBuku">
          <div class="modal-header">
            <h5 class="modal-title" id="modalTitle">Tambah Buku</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <input type="hidden" id="editIndex" />
            <div class="mb-3">
              <label for="judul" class="form-label">Judul Buku</label>
              <input type="text" class="form-control" id="judul" required />
            </div>
            <div class="mb-3">
              <label for="penulis" class="form-label">Penulis</label>
              <input type="text" class="form-control" id="penulis" required />
            </div>
            <div class="mb-3">
              <label for="kategori" class="form-label">Kategori</label>
              <input type="text" class="form-control" id="kategori" required />
            </div>
            <div class="mb-3">
              <label for="informasi" class="form-label">Informasi (Opsional)</label>
              <input type="text" class="form-control" id="kategori" required />
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const bukuTable = document.getElementById("bukuTable").querySelector("tbody");
    const bukuModal = new bootstrap.Modal(document.getElementById("bukuModal"));
    const form = document.getElementById("formBuku");
    const judul = document.getElementById("judul");
    const penulis = document.getElementById("penulis");
    const kategori = document.getElementById("kategori");
    const editIndex = document.getElementById("editIndex");

    // Tambah/Edit Buku
    form.addEventListener("submit", function (e) {
      e.preventDefault();

      const data = [judul.value, penulis.value, kategori.value];
      if (editIndex.value === "") {
        const no = bukuTable.rows.length + 1;
        const newRow = bukuTable.insertRow();
        newRow.innerHTML = `
          <td>${no}</td>
          <td>${data[0]}</td>
          <td>${data[1]}</td>
          <td>${data[2]}</td>
          <td>
            <button class="btn btn-warning btn-sm btn-edit">Edit</button>
            <button class="btn btn-danger btn-sm btn-hapus">Hapus</button>
          </td>`;
      } else {
        const row = bukuTable.rows[editIndex.value];
        row.cells[1].innerText = data[0];
        row.cells[2].innerText = data[1];
        row.cells[3].innerText = data[2];
        editIndex.value = "";
      }

      form.reset();
      bukuModal.hide();
    });

    // Edit atau Hapus
    bukuTable.addEventListener("click", function (e) {
      const target = e.target;
      const row = target.closest("tr");

      if (target.classList.contains("btn-edit")) {
        document.getElementById("modalTitle").textContent = "Edit Buku";
        editIndex.value = row.rowIndex - 1;
        judul.value = row.cells[1].textContent;
        penulis.value = row.cells[2].textContent;
        kategori.value = row.cells[3].textContent;
        bukuModal.show();
      }

      if (target.classList.contains("btn-hapus")) {
        if (confirm("Yakin ingin menghapus buku ini?")) {
          row.remove();
          // Re-number rows
          for (let i = 0; i < bukuTable.rows.length; i++) {
            bukuTable.rows[i].cells[0].textContent = i + 1;
          }
        }
      }
    });
  </script>
</body>
</html>
