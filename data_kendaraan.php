<?php
    include_once 'view/header.php';
?>
<main role="main" class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>Data Kendaraan</h4>
        </div>
        <div class="panel-body">
            <?php            
                $cek = isset($_SESSION['status']);

                // pesan berhasil
                if($cek && $_SESSION['status'] == 'insert_sukses'){                    
                    echo "<br><div class='alert alert-success' role='alert'>Data kendaraan sukses dimasukkan</div>";
                }elseif($cek && $_SESSION['status'] == 'insert_gagal'){                    
                    echo "<br><div class='alert alert-warning' role='alert'>Data kendaraan gagal dimasukkan</div>";
                }

                // pesan hapus
                if($cek && $_SESSION['status'] == 'hapus_sukses'){                    
                    echo "<br><div class='alert alert-success' role='alert'>Data sukses dihapus</div>";
                }elseif($cek && $_SESSION['status'] == 'hapus_gagal'){                    
                    echo "<br><div class='alert alert-warning' role='alert'>Data gagal dihapus</div>";
                }

                // pesan hapus
                if($cek && $_SESSION['status'] == 'update_sukses'){                    
                    echo "<br><div class='alert alert-success' role='alert'>Data kendaraan sukses diubah</div>";
                }elseif($cek && $_SESSION['status'] == 'update_gagal'){
                    echo "<br><div class='alert alert-warning' role='alert'>Data kendaraan gagal diubah</div>";
                }
                
                unset($_SESSION['status']);
            ?>            
            <div class="float-right">
                <a href="input_kendaraan.php" class="btn btn-primary">
                    Tambah Kendaraan
                </a>   
            </div>            
            <div class="table-responsive">    
                <table class="table table-bordered table-striped table-hover" data-pagination="true" data-search="true" data-toggle="table" data-sort-name="pemilik" data-sort-order="asc" data-page-list="[3, 5, 10, 25, 50, 100]" data-page-size="3" data-show-export="true" data-export-types="['excel','pdf','xlsx','doc']" data-icons-prefix="fa fa-print">
                    <thead class="thead-dark">
                        <tr>
                            <th colspan="10" data-align="center">DATA KENDARAAN</th><th></th>
                        </tr>
                        <tr align="center">
                            <th class="align-middle" data-field="noKendaraan" data-sortable="true">No Kendaraan</th>
                            <th class="align-middle" data-field="pemilik" data-sortable="true">Pemilik</th>
                            <th class="align-middle" data-field="alamat" data-sortable="true">Alamat</th>
                            <th class="align-middle" data-field="merk" data-sortable="true">Merk</th>
                            <th class="align-middle" data-field="warnaKendaraan" data-sortable="true">Warna</th>
                            <th class="align-middle" data-field="tipe" data-sortable="true">Tipe</th>
                            <th class="align-middle" data-field="thnPembuatan" data-sortable="true">Thn Pembuatan</th>
                            <th class="align-middle" data-field="dokumenKendaraan" data-sortable="true">Dok Kendaraan</th>
                            <th class="align-middle" data-field="noMesin" data-sortable="true">No Mesin</th>
                            <th class="align-middle" data-field="noChasis" data-sortable="true">No Chasis</th>
                            <th data-field="operasi" data-tableexport-display="none">Operasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $hasil = mysqli_query($link, "SELECT * FROM kendaraan");
                            while ($row = mysqli_fetch_assoc($hasil)) {
                                echo "<tr>
                                        <td>" . $row['noKendaraan'] . "</td><td>" . $row['pemilik'] . "</td><td>" . $row['alamat'] . "</td><td>" . $row['merk'] . "</td>
                                        <td>" . $row['warnaKendaraan'] . "</td><td>" . $row['tipe'] . "</td><td>" . $row['thnPembuatan'] . "</td><td>" . $row['dokumenKendaraan'] . "</td>
                                        <td>" . $row['noMesin'] . "</td><td>" . $row['noChasis'] . "</td>
                                        <td data-tableexport-display=\"none\"><a class='btn btn-success' href='editKendaraan.php?key=$row[id_kendaraan]'>Edit</a>
                                        <a class='btn btn-danger' href='action_input_kendaraan.php?key=$row[id_kendaraan]'>Hapus</a></td>
                                    </tr>";
                            }
                        ?>
                    </tbody>              
                </table>
            </div>         
        </div>
    </div>
</main>
<?php
    include_once 'view/footer.php';
?>