<?php
$host     = "localhost";
$user     = "root";
$password = "";         // kosong jika pakai XAMPP default
$database = "db_crud";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>