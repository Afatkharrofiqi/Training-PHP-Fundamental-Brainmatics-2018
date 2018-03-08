<?php
include_once 'control/koneksi.php';
session_start();
if (isset($_GET['method']) && $_GET['method'] == 'insert'){    
    $ubah = implode("', '", $_POST);	    
    $date = date("Y-m-d");
    $kirim = mysqli_query($link, "INSERT INTO pengemudi (noPaspor, pengemudi, sim, kebangsaan, waktu) VALUES ('$ubah', '$date')");
    if ($kirim) {
        $_SESSION['status'] = "insert_sukses";
        header('Location: data_pengemudi.php');
    } else {
        $_SESSION['status'] = "insert_gagal";
        header('Location: data_pengemudi.php');
        die("<br><div class='alert alert-danger' role='alert'>" . mysqli_errno($link) . " - " . mysqli_error($link) . "</div>");
    }    
}elseif(isset($_GET['key'])){
    $key         = $_GET['key'];
    $query       = "DELETE FROM pengemudi WHERE id_pengemudi='$key'";
    $hasil_query = mysqli_query($link, $query);
    if ($hasil_query) {
        $_SESSION['status'] = "hapus_sukses";
        header('Location: data_pengemudi.php');        
    } else {
        $_SESSION['status'] = "hapus_gagal";
        header('Location: data_pengemudi.php');        
    }
    mysqli_close($link);
}elseif(isset($_GET['method']) && $_GET['method'] == 'update'){
    $noPaspor    = $_POST['noPaspor'];
    $pengemudi   = $_POST['pengemudi'];
    $kebangsaan  = $_POST['kebangsaan'];
    $sim         = $_POST['sim'];
    $key         = $_POST['key'];
    $query       = "UPDATE pengemudi SET noPaspor = '$noPaspor', pengemudi = '$pengemudi', pengemudi = '$pengemudi', kebangsaan = '$kebangsaan' WHERE id_pengemudi='$key'";
    $hasil_query = mysqli_query($link, $query);    
    if ($hasil_query) {
        $_SESSION['status'] = "update_sukses";
        header('Location: data_pengemudi.php');        
    } else {        
        $_SESSION['status'] = "update_gagal";
        header('Location: data_pengemudi.php');        
    }
    mysqli_close($link);
}


?>