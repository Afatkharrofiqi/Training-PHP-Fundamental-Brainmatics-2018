<?php
include_once 'control/koneksi.php';
$db = mysqli_query($koneksi2, "SHOW TABLES FROM $db2");

while ($line=mysqli_fetch_row($db)) {
	 $data=implode("", $line);
	 echo "<pre>";
	 print_r($data);		

	$table3 = mysqli_query($koneksi3, "SELECT * FROM $db3.$data;");
	$jumlahm = mysqli_num_rows($table3);
	for ($i=0; $i <$jumlahm ; $i++) {
			$mas[$i]=mysqli_fetch_assoc($table3);
		}
	print_r($mas);
	$hapus = mysqli_query($koneksi3, "TRUNCATE $db2.$data");
	if ($hapus) {
			echo "<br>Data Sukses Dihapus<br>";
		} else {
			die ("<br>Query gagal dijalankan: ".mysqli_errno($koneksi2)." - ".mysqli_error($koneksi2));
		}
	foreach ($mas as $key => $value) {
		 	$ubah=implode("', '", $mas[$key]);
			print_r($ubah);
			echo "<br>";

			$kirim = mysqli_query($koneksi2, "INSERT INTO $db2.$data VALUES ('$ubah')");
		if ($kirim) {
			echo "<br>Data Sukses Dimasukkan<br>";
		} else {
			die ("<br>Query gagal dijalankan: ".mysqli_errno($koneksi2)." - ".mysqli_error($koneksi2));
		}	
	}
}
?>