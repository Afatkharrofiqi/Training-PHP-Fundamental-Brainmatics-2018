<?php
    include_once 'config.php';
    
    function connect($localhost, $user, $pass, $database){
        $link = mysqli_connect($localhost, $user, $pass, $database);
        if (!$link) {
            return die("Koneksi dengan database gagal: " . mysqli_connect_errno() . " - " . mysqli_connect_error());
        }else{
            return $link;
        }
    }

    $link = connect('localhost','root','','ranmor_master_new');
    $koneksi1 = connect("$s1", "$user1", "$pass1", "$db1");
    $koneksi2 = connect("$s2", "$user2", "$pass2", "$db2");
    $koneksi3 = connect("$s3", "$user3", "$pass3", "$db3");
?>