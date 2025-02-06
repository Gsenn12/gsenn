<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tabel Todo List</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome untuk ikon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <style>
    /* Custom CSS */
    .teks-putih {
      color: white;
    }
    .table {
      width: 100%;
      margin-bottom: 1rem;
      color: white;
      background-color: #343a40; /* Warna gelap untuk tabel */
    }
    .table th, .table td {
      padding: 12px;
      text-align: center;
    }
    .table-hover tbody tr:hover {
      background-color: #495057; /* Warna hover */
      transition: background-color 0.3s ease;
    }
    .btn {
      margin: 2px;
    }
    /* Animasi saat tabel muncul */
    .animate-table {
      animation: fadeInUp 1s ease;
    }
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>
<body class="bg-dark">
  <div class="container mt-4">
    <?php 
    if (isset($_GET['pesan_berhasil_tambah'])) {
      echo '
      <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Berhasil ditambah!</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      ';
    }

    if (isset($_GET['pesan_edit'])) {
      ?>
      <div class="alert alert-<?php echo $_GET['pesan_edit']=='berhasil'?'success':'danger' ;?> alert-dismissible fade show" role="alert">
      <strong><?php echo $_GET['pesan_edit']=='berhasil'?'Berhasil':'Gagal' ;?> diedit!</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php
    }

    if (isset($_GET['pesan_hapus'])) {
      ?>
      <div class="alert alert-<?php echo $_GET['pesan_hapus']=='berhasil'?'danger':'danger' ;?> alert-dismissible fade show" role="alert">
      <strong><?php echo $_GET['pesan_hapus']=='berhasil'?'Berhasil':'Gagal' ;?> dihapus!</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php
    }
    ?>

    <h2 class="teks-putih">Tabel Todo List</h2>

    <!-- Button trigger modal -->
    <button style="float: right;" type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
      <i class="fa fa-plus"></i> Tambah
    </button>
    <br>
    <br>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5 text-body" id="exampleModalLabel">Tambah Tugas</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form method="POST" action="todo/aksi_tambah_todo.php">
            <div class="modal-body">
              <div class="mb-3">
                <label class="form-label text-body">Tugas</label>
                <input type="text" class="form-control" placeholder="Tugas" name="tugas">
              </div>
              <div class="mb-3">
                <label class="form-label text-body">Jangka Waktu</label>
                <input type="date" class="form-control" name="jangkawaktu">
              </div>
              <div class="mb-3">
                <label class="form-label text-body">Keterangan</label>
                <select class="form-control" name="keterangan">
                  <option>Belum selesai</option>
                  <option>Selesai</option>
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Table -->
    <table border="1" class="table table-bordered teks-putih animate-table">
      <thead>
        <tr>
          <th>No</th>
          <th>Tugas</th>
          <th>Jangka Waktu</th>
          <th>Keterangan</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        while ($row = mysqli_fetch_array($hasil)) {
          echo "<tr>
            <td>$no</td>
            <td>$row[tugas]</td>
            <td>$row[jangkawaktu]</td>
            <td>$row[keterangan]</td>
            <td>
              <a class='btn btn-warning btn-sm fa fa-pencil' href='index.php?halaman=edit_todo&id=$row[id]'> Edit</a>
              <a class='btn btn-danger btn-sm fa fa-trash' href='todo/aksi_hapus_todo.php?id=$row[id]' onclick='return confirm(\"Apakah anda yakin akan menghapusnya?\")'> Hapus</a>
            </td>
          </tr>";
          $no++;
        }
        ?>
      </tbody>
    </table>
  </div>

  <!-- Bootstrap JS dan dependencies -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>