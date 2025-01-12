<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  // Hapus data admin
  $sql = "DELETE FROM artikel WHERE id=$id";
  if (mysqli_query($koneksi, $sql)) {
    echo "Artikel berhasil dihapus!";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
  }

  // Kembali ke halaman admin
  header("Location: artikel.php");
}
?>
