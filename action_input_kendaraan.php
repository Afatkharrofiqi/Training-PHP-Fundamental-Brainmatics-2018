<?php
include_once 'control/koneksi.php';
session_start();
if (isset($_GET['method']) && $_GET['method'] == 'insert'){    
    $ubah = implode("', '", $_POST);    
    $date = date("Y-m-d");
    $kirim = mysqli_query($link, "INSERT INTO kendaraan (noKendaraan, pemilik, alamat, merk, warnaKendaraan, tipe, thnPembuatan, dokumenKendaraan, noMesin, noChasis, waktu) VALUES ('$ubah', '$date')");    
    if ($kirim) {        
        $_SESSION['status'] = "insert_sukses";
        header('Location: data_kendaraan.php');
    } else {
        $_SESSION['status'] = "insert_gagal";
        header('Location: data_kendaraan.php');        
    }
}elseif(isset($_GET['key'])){
    $key = $_GET['key'];
    $query       = "DELETE FROM kendaraan WHERE id_kendaraan='$key'";    
    $hasil_query = mysqli_query($link, $query);
    if ($hasil_query) {
        $_SESSION['status'] = "hapus_sukses";
        header('Location: data_kendaraan.php');        
    } else {
        $_SESSION['status'] = "hapus_gagal";
        header('Location: data_kendaraan.php');        
    }
    mysqli_close($link);
}elseif(isset($_GET['method']) && $_GET['method'] == 'update'){
    $noKendaraan      = $_POST['noKendaraan'];
    $pemilik          = $_POST['pemilik'];
    $alamat           = $_POST['alamat'];
    $merk             = $_POST['merk'];
    $warnaKendaraan   = $_POST['warnaKendaraan'];
    $tipe             = $_POST['tipe'];
    $thnPembuatan     = $_POST['thnPembuatan'];
    $dokumenKendaraan = $_POST['dokumenKendaraan'];
    $noMesin          = $_POST['noMesin'];
    $noChasis         = $_POST['noChasis'];
    $key              = $_POST['key'];
    $query            = "UPDATE kendaraan SET noKendaraan = '$noKendaraan', pemilik = '$pemilik', alamat = '$alamat', merk = '$merk', warnaKendaraan = '$warnaKendaraan', tipe = '$tipe', thnPembuatan = '$thnPembuatan', dokumenKendaraan = '$dokumenKendaraan', noMesin = '$noMesin', noChasis = '$noChasis' WHERE id_kendaraan='$key'";
    $hasil_query      = mysqli_query($link, $query);
    if ($hasil_query) {
        $_SESSION['status'] = "update_sukses";
        header('Location: data_kendaraan.php');        
    } else {        
        $_SESSION['status'] = "update_gagal";
        header('Location: data_kendaraan.php');        
    }
    mysqli_close($link);
}


?>