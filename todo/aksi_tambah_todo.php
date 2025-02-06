<?php
session_start();
include "../config.php";

$user_id = $_SESSION['user_id'];
$tugas = $_POST['tugas'];
$jangkawaktu = $_POST['jangkawaktu'];
$keterangan = $_POST['keterangan'];

$query = "INSERT INTO tbtodo (user_id, tugas, jangkawaktu, keterangan) VALUES (?, ?, ?, ?)";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("isss", $user_id, $tugas, $jangkawaktu, $keterangan);

if ($stmt->execute()) {
    header("Location: ../index.php?pesan_berhasil_tambah=true");
} else {
    echo "Error: " . $mysqli->error;
}
?>
