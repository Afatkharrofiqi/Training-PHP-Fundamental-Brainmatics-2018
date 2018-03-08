<?php
include_once 'control/koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];
$cari = mysqli_query($link, "SELECT * FROM login WHERE username='$username' AND password='$password'");
$cek = mysqli_num_rows($cari);
if ($cek!=0) {
	$hasil = mysqli_fetch_assoc($cari);
	session_start();
	$_SESSION['username']=$username;
	header("Location: index.php");
} else {
	session_start();
	$_SESSION['pesan']="Gagal Login";
	header("Location: login.php");
}
?>