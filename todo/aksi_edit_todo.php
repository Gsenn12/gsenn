
<?php
include "../config.php";
$id=$_POST['id'];
$tugas=$_POST['tugas'];
$jangkawaktu=$_POST['jangkawaktu'];
$keterangan=$_POST['keterangan'];
$sql ="update tbtodo set
 tugas='$tugas',
 jangkawaktu='$jangkawaktu',
 keterangan='$keterangan'
 where id='$id'";
 //echo $sql;
mysqli_query($mysqli,$sql);
$r=mysqli_affected_rows($mysqli);
if ($r > 0) {
	header("location:http:/todolist_ilham/index.php?halaman=todo&pesan_edit=berhasil");
}else{
	header("location:http:/todolist_ilham/index.php?halaman=todo&pesan_edit=Gagal");
}
?>