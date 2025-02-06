<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "dbtodo_ilham";

$mysqli = new mysqli($host, $user, $password, $database);

// Periksa koneksi
if ($mysqli->connect_error) {
    die("Koneksi gagal: " . $mysqli->connect_error);
}
?>
