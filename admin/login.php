<?php
session_start();
include "koneksi.php";

if(isset($_POST['login'])) {
    $username = mysqli_real_escape_string($koneksi, trim($_POST['username']));
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    $sql = mysqli_query($koneksi, "SELECT * FROM admins WHERE username='$username'");
    $row = mysqli_fetch_assoc($sql);

    if ($row && $password == $row['password']) {
		$_SESSION['username'] = $username;
		echo "<script>alert('Anda berhasil login'); window.location.href='dashboard.php';</script>";
	} else {
		echo "<script>alert('Username atau password Anda salah. Silahkan Login Kembali'); window.location.href='index.php';</script>";
	}
}
?>
