<?php
include_once 'control/koneksi.php';
session_start();
if (isset($_GET['method']) && $_GET['method'] == 'insert'){    
    $ubah = implode("', '", $_POST);	    
    $date = date("Y-m-d");
    $kirim = mysqli_query($link, "INSERT INTO dokumenranmor (jenisKegiatan, noDok, tglDok, noSKKomjen, tglSKKomjen, batasWaktu, noDNTT, tglDNTT, pemeriksaDok, pemeriksaDok2, status, pemeriksaFisik, pemeriksaFisik2, noPaspor, noKendaraan, tglMasuk, pelMasuk, tglKeluar, pelKeluar, waktu) VALUES ('$ubah', '$date')");
    if ($kirim) {
        $_SESSION['status'] = "insert_sukses";
        header('Location: data_ranmor.php');
    } else {
        $_SESSION['status'] = "insert_gagal";
        header('Location: data_ranmor.php');        
    }    
}elseif(isset($_GET['key'])){
    $key         = $_GET['key'];
    $query       = "DELETE FROM dokumenranmor WHERE noDok='$key'";
    $hasil_query = mysqli_query($link, $query);
    if ($hasil_query) {
        $_SESSION['status'] = "hapus_sukses";
        header('location:data_ranmor.php');
    } else {
        $_SESSION['status'] = "hapus_gagal";
        header('location:data_ranmor.php');
    }
    mysqli_close($link);
}elseif(isset($_GET['method']) && $_GET['method'] == 'update'){
    $jenisKegiatan  = $_POST['jenisKegiatan'];
    $noDok          = $_POST['noDok'];
    $tglDok         = $_POST['tglDok'];
    $noSKKomjen     = $_POST['noSKKomjen'];
    $batasWaktu     = $_POST['batasWaktu'];
    $noDNTT         = $_POST['tglDNTT'];
    $tglDNTT        = $_POST['tglDNTT'];
    $pemeriksaDok   = $_POST['pemeriksaDok'];
    $pemeriksaDok2  = $_POST['pemeriksaDok2'];
    $status         = $_POST['status'];
    $pemeriksaFisik = $_POST['pemeriksaFisik2'];
    $noPaspor       = $_POST['noPaspor'];
    $noKendaraan    = $_POST['noKendaraan'];
    $tglMasuk       = $_POST['tglMasuk'];
    $pelMasuk       = $_POST['pelMasuk'];
    $tglKeluar      = $_POST['tglKeluar'];
    $pelKeluar      = $_POST['pelKeluar'];
    $key            = $_POST['key'];    
    $query          = "UPDATE dokumenranmor SET jenisKegiatan = '$jenisKegiatan', noDok = '$noDok', noSKKomjen = '$noSKKomjen', batasWaktu = '$batasWaktu', noDNTT = '$noDNTT', tglDNTT = '$tglDNTT', pemeriksaDok = '$pemeriksaDok', pemeriksaDok2 = '$pemeriksaDok2', status = '$status', pemeriksaFisik = '$pemeriksaFisik', noPaspor = '$noPaspor', noKendaraan = '$noKendaraan' , tglMasuk = '$tglMasuk', pelMasuk = '$pelMasuk' , tglKeluar = '$tglKeluar', pelKeluar = '$pelKeluar' WHERE id='$key'";
    $hasil_query    = mysqli_query($link, $query);   
    if ($hasil_query) {
        $_SESSION['status'] = "update_sukses";
        header('Location: data_ranmor.php');        
    } else {        
        $_SESSION['status'] = "update_gagal";
        header('Location: data_ranmor.php');        
    }
    mysqli_close($link);
}
?>