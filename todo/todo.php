  <?php
// Include file config.php
include "config.php";

// Jalankan query
$hasil = mysqli_query($mysqli, "SELECT * FROM tbtodo");

// Cek apakah query berhasil
if (!$hasil) {
    die("Query error: " . mysqli_error($mysqli));
}

// Tampilkan pesan sukses/gagal
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
<table border="1" class="table table-bordered teks-putih">
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
    if ($hasil) {
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
    } else {
        echo "<tr><td colspan='5'>Tidak ada data.</td></tr>";
    }
    ?>
  </tbody>
</table>