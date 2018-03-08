<?php
include_once 'C:\xampp\htdocs\ranmor4\control\koneksi.php';
$db = mysqli_query($koneksi1, "SHOW TABLES FROM $db1");

while ($line = mysqli_fetch_row($db)) {
    $data = implode("", $line);
    echo "<pre>";
    print_r($data);
    
    $table = mysqli_query($koneksi1, "SELECT * FROM $db1." . $data);
    $hapus = mysqli_query($koneksi3, "DELETE FROM $db3.$tab1$data");
    while ($line = mysqli_fetch_assoc($table)) {
        echo "<pre>";
        array_shift($line);
        print_r($line);
        $ubah = implode("', '", $line);
        print_r($ubah);
        
        $kirim = mysqli_query($koneksi3, "INSERT INTO $db3.$tab1$data VALUES ('NULL','$ubah')");
        if ($kirim) {
            echo "<br>Data Sukses Dimasukkan<br>";
        } else {
            echo "<br>Query gagal dijalankan: " . mysqli_errno($koneksi3) . " - " . mysqli_error($koneksi3);
        }
    }
    
    $selesai = mysqli_query($koneksi3, "INSERT INTO status1$data values ('selesai')");
    if ($selesai) {
        echo "<br>selesai telah di buat";
    } else {
        echo "<br>Query gagal";
    }
}
?>