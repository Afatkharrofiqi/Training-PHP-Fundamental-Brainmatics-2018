<?php
include_once 'C:\xampp\htdocs\ranmor4\control\koneksi.php';

$db = mysqli_query($koneksi1, "SHOW TABLES FROM $db1");
$p  = 1;

while ($line = mysqli_fetch_row($db)) {
    $data = implode("", $line);
    echo "<pre>";
    print_r($data);
    echo "<br />$p<br />";
    $ambil1 = mysqli_query($koneksi3, "SELECT status FROM status1$data");
    $cek1   = mysqli_fetch_assoc($ambil);
    $ambil2 = mysqli_query($koneksi3, "SELECT status FROM status2$data");
    $cek2   = mysqli_fetch_assoc($ambil);
    if (isset($cek1['status']) && isset($cek2['status'])) {
        $table1 = mysqli_query($koneksi3, "CREATE TEMPORARY TABLE temp_tb1$p SELECT * FROM $db3.$tab1$data;");
        $table1 = mysqli_query($koneksi3, "ALTER TABLE temp_tb1$p DROP id;");
        $table1 = mysqli_query($koneksi3, "ALTER TABLE temp_tb1$p DROP id_kendaraan;");
        $table1 = mysqli_query($koneksi3, "ALTER TABLE temp_tb1$p DROP id_pengemudi;");
        $table1 = mysqli_query($koneksi3, "SELECT * FROM temp_tb1$p;");
        $table2 = mysqli_query($koneksi3, "CREATE TEMPORARY TABLE temp_tb2$p SELECT * FROM $db3.$tab2$data;");
        $table2 = mysqli_query($koneksi3, "ALTER TABLE temp_tb2$p DROP id;");
        $table2 = mysqli_query($koneksi3, "ALTER TABLE temp_tb2$p DROP id_kendaraan;");
        $table2 = mysqli_query($koneksi3, "ALTER TABLE temp_tb2$p DROP id_pengemudi;");
        $table2 = mysqli_query($koneksi3, "SELECT * FROM temp_tb2$p;");
        $table3 = mysqli_query($koneksi3, "CREATE TEMPORARY TABLE temp_tb3$p SELECT * FROM $db3.$data;");
        $table3 = mysqli_query($koneksi3, "ALTER TABLE temp_tb3$p DROP id;");
        $table3 = mysqli_query($koneksi3, "ALTER TABLE temp_tb3$p DROP id_kendaraan;");
        $table3 = mysqli_query($koneksi3, "ALTER TABLE temp_tb3$p DROP id_pengemudi;");
        $table3 = mysqli_query($koneksi3, "SELECT * FROM temp_tb3$p;");
        ++$p;
        $jumlahm  = mysqli_num_rows($table3);
        $jumlahl1 = mysqli_num_rows($table1);
        $jumlahl2 = mysqli_num_rows($table2);
        for ($i = 0; $i < $jumlahm; $i++) {
            $mas[$i] = mysqli_fetch_assoc($table3);
        }
        
        for ($i = 0; $i < $jumlahl1; $i++) {
            $loc1[$i] = mysqli_fetch_assoc($table1);
        }
        
        for ($i = 0; $i < $jumlahl2; $i++) {
            $loc2[$i] = mysqli_fetch_assoc($table2);
        }
        
        echo "<br /><br />--------------------DARI DATA $data--------------<br /><br />";
        echo "<pre>";
        echo "Data Server 3<br />";
        print_r($mas);
        echo "<br /><br />Data Server 1<br />";
        print_r($loc1);
        echo "<br /><br />Data Server 2<br />";
        print_r($loc2);
        echo "<br /><br />PART 1<br />";
        $part = array_unique(array_merge_recursive($loc1, $loc2), SORT_REGULAR);
        print_r($part);
        echo "<br /><br />Hasil<br />";
        $end = array_unique(array_merge_recursive($mas, $part), SORT_REGULAR);
        print_r($end);
        $mas   = null;
        $loc1  = null;
        $loc2  = null;
        $hapus = mysqli_query($koneksi3, "TRUNCATE $db3.$data");
        if ($hapus) {
            echo "<br />Data Sukses Dihapus<br />";
        } else {
            die("<br />Query gagal dijalankan: " . mysqli_errno($koneksi3) . " - " . mysqli_error($koneksi3));
        }
        
        foreach ($end as $key => $value) {
            $ubah = implode("', '", $end[$key]);
            print_r($ubah);
            echo "<br />";
            $kirim = mysqli_query($koneksi3, "INSERT INTO $db3.$data VALUES ('NULL', '$ubah')");
            if ($kirim) {
                echo "<br />Data Sukses Dimasukkan<br />";
            } else {
                die("<br />Query gagal dijalankan: " . mysqli_errno($koneksi3) . " - " . mysqli_error($koneksi3));
            }
        }
    } else {
        echo "<br />DATA BELUM SELESAI";
    }
    
    $db = mysqli_query($koneksi1, "SHOW TABLES FROM $db1");
    while ($line = mysqli_fetch_row($db)) {
        $data = implode("", $line);
        echo "<pre>";
        print_r($data);
        $table3  = mysqli_query($koneksi3, "SELECT * FROM $db3.$data;");
        $jumlahm = mysqli_num_rows($table3);
        for ($i = 0; $i < $jumlahm; $i++) {
            $mas[$i] = mysqli_fetch_assoc($table3);
        }
        
        print_r($mas);
        $hapus = mysqli_query($koneksi1, "TRUNCATE $db1.$data");
        if ($hapus) {
            echo "<br />Data Sukses Dihapus<br />";
        } else {
            die("<br />Query gagal dijalankan: " . mysqli_errno($koneksi1) . " - " . mysqli_error($koneksi1));
        }
        
        foreach ($mas as $key => $value) {
            $ubah = implode("', '", $mas[$key]);
            print_r($ubah);
            echo "<br />";
            $kirim = mysqli_query($koneksi1, "INSERT INTO $db1.$data VALUES ('$ubah')");
            if ($kirim) {
                echo "<br />Data Sukses Dimasukkan<br />";
            } else {
                die("<br />Query gagal dijalankan: " . mysqli_errno($koneksi1) . " - " . mysqli_error($koneksi1));
            }
        }
    }
    
    $db = mysqli_query($koneksi2, "SHOW TABLES FROM $db2");
    while ($line = mysqli_fetch_row($db)) {
        $data = implode("", $line);
        echo "<pre>";
        print_r($data);
        $table3  = mysqli_query($koneksi3, "SELECT * FROM $db3.$data;");
        $jumlahm = mysqli_num_rows($table3);
        for ($i = 0; $i < $jumlahm; $i++) {
            $mas[$i] = mysqli_fetch_assoc($table3);
        }
        
        print_r($mas);
        $hapus = mysqli_query($koneksi2, "TRUNCATE $db2.$data");
        if ($hapus) {
            echo "<br />Data Sukses Dihapus<br />";
        } else {
            die("<br />Query gagal dijalankan: " . mysqli_errno($koneksi2) . " - " . mysqli_error($koneksi2));
        }
        
        foreach ($mas as $key => $value) {
            $ubah = implode("', '", $mas[$key]);
            print_r($ubah);
            echo "<br />";
            $kirim = mysqli_query($koneksi2, "INSERT INTO $db2.$data VALUES ('$ubah')");
            if ($kirim) {
                echo "<br />Data Sukses Dimasukkan<br />";
            } else {
                die("<br />Query gagal dijalankan: " . mysqli_errno($koneksi2) . " - " . mysqli_error($koneksi2));
            }
        }
    }
}

?>