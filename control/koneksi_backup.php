<?php
include_once 'control/config.php';
$koneksi1 = mysqli_connect("$s1","$user1","$pass1","$db1");
	if(!$koneksi1){
		die ("Koneksi dengan database gagal: ".mysqli_connect_errno()." - ".mysqli_connect_error());
	}
$koneksi2 = mysqli_connect("$s2","$user2","$pass2","$db2");
if(!$koneksi2){
	die ("Koneksi dengan database gagal: ".mysqli_connect_errno()." - ".mysqli_connect_error());
}
$koneksi3 = mysqli_connect("$s3","$user3","$pass3","$db3");
if(!$koneksi3){
	die ("Koneksi dengan database gagal: ".mysqli_connect_errno()." - ".mysqli_connect_error());
}

?>