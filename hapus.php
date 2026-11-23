<?php
include 'koneksi.php';

$id = (int) $_GET['id'];

$sql = "DELETE FROM users WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    header("Location: index.php?pesan=Data berhasil dihapus!");
} else {
    header("Location: index.php?pesan=Gagal menghapus data!");
}
exit;
?>