<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  // Hapus data admin
  $sql = "DELETE FROM galeri WHERE id=$id";
  if (mysqli_query($koneksi, $sql)) {
    echo "Galeri berhasil dihapus!";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
  }

  // Kembali ke halaman admin
  header("Location: galeri.php");
}
?>