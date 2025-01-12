<?php

$host = 'localhost';
$nama = 'root';
$pass = '';
$db = 'beritateknologi';

$koneksi = mysqli_connect($host, $nama, $pass, $db);

// Cek koneksi
if (!$koneksi) {
    die('Koneksi gagal: ' . mysqli_connect_error());
}

// Jika koneksi berhasil, kamu bisa menghapus echo jika tidak ingin menampilkan apa-apa
// echo 'Koneksi berhasil'; // Optional: hanya untuk testing

?>

