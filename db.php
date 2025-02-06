<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'dbtodo_ilham';

// Koneksi ke database
$mysqli = new mysqli($host, $user, $password, $dbname);

// Cek koneksi
if ($mysqli->connect_error) {
    die("Koneksi gagal: " . $mysqli->connect_error);
}
?>
