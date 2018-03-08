<?php
include_once 'control/koneksi.php';
$db = mysqli_query($koneksi2, "SHOW TABLES FROM $db2");
echo "<pre>";
print_r($db);
echo "<br/>";
while ($line = mysqli_fetch_row($db)) {
    $data = implode("", $line);
    echo "<pre>";
    // print_r($line);
    // print_r($data);    
    
    $table = mysqli_query($koneksi2, "SELECT * FROM $db2." . $line[0]);     
    $hapus = mysqli_query($koneksi3, "DELETE FROM $db3.$tab2$data"); //temp2dokumenranmor    
    while ($line = mysqli_fetch_row($table)) {
        echo "<pre>";
        array_shift($line);
        print_r($line);
        $ubah = implode("', '", $line);
        print_r($ubah);
        exit;
        $kirim = mysqli_query($koneksi3, "INSERT INTO $db3.$tab2$data VALUES ('NULL','$ubah')");
        if ($kirim) {
            echo "<br>Data Sukses Dimasukkan kedalam temporary pada server utama<br>";
        } else {
            echo "<br>Query gagal dijalankan: " . mysqli_errno($koneksi3) . " - " . mysqli_error($koneksi3);
        }
    }
    
    $selesai = mysqli_query($koneksi3, "INSERT INTO status2$data values ('selesai')");
    if ($selesai) {
        echo "<br>Selesai telah dibuat";
    } else {
        echo "<br>Query gagal";
    }
}
?>