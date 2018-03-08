<?php
    include_once 'view/header.php';
?>
<main role="main" class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>Data Pengemudi</h4>
        </div>
        <div class="panel-body">
            <?php 
                $cek = isset($_SESSION['status']);

                // pesan berhasil
                if($cek && $_SESSION['status'] == 'insert_sukses'){                    
                    echo "<br><div class='alert alert-success' role='alert'>Data pengemudi sukses dimasukkan</div>";
                }elseif($cek && $_SESSION['status'] == 'insert_gagal'){                    
                    echo "<br><div class='alert alert-warning' role='alert'>Data pengemudi gagal dimasukkan</div>";
                }

                // pesan hapus
                if($cek && $_SESSION['status'] == 'hapus_sukses'){                    
                    echo "<br><div class='alert alert-success' role='alert'>Data sukses dihapus</div>";
                }elseif($cek && $_SESSION['status'] == 'hapus_gagal'){                    
                    echo "<br><div class='alert alert-warning' role='alert'>Data gagal dihapus</div>";
                }

                // pesan hapus
                if($cek && $_SESSION['status'] == 'update_sukses'){                    
                    echo "<br><div class='alert alert-success' role='alert'>Data pengemudi sukses diubah</div>";
                }elseif($cek && $_SESSION['status'] == 'update_gagal'){
                    echo "<br><div class='alert alert-warning' role='alert'>Data pengemudi gagal diubah</div>";
                }
                
                unset($_SESSION['status']);                
            ?>
            <div class="float-right">
                <a href="input_pengemudi.php" class="btn btn-primary">
                    Tambah Pengemudi
                </a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" data-pagination="true" data-search="true" data-toggle="table" data-sort-name="pemilik" data-sort-order="asc" data-page-list="[3, 5, 10, 25, 50, 100]" data-page-size="3" data-show-export="true" data-export-types="['excel','pdf','xlsx','doc']" data-icons-prefix="fa fa-print">
                    <thead class="thead-dark">
                        <tr>
                            <th colspan="4" data-align="center">DATA PENGEMUDI</th><th></th>
                        </tr>
                        <tr align="center">
                            <th class="align-middle" data-field="noPaspor" data-sortable="true">No Paspor</th>
                            <th class="align-middle" data-field="pengemudi" data-sortable="true">Pengemudi</th>
                            <th class="align-middle" data-field="sim" data-sortable="true">SIM</th>
                            <th class="align-middle" data-field="kebangsaan" data-sortable="true">Kebangsaan</th>
                            <th data-field="operasi" data-tableexport-display="none">Operasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $hasil = mysqli_query($link, "SELECT * FROM pengemudi");
                            while ($row = mysqli_fetch_assoc($hasil)) {
                                echo "<tr>
                                    <td>" . $row['noPaspor'] . "</td><td>" . $row['pengemudi'] . "</td>
                                    <td>" . $row['sim'] . "</td><td>" . $row['kebangsaan'] . "</td>
                                    <td><a class='btn btn-success' href='editPengemudi.php?key=$row[id_pengemudi]'>Edit</a>
                                    <a class='btn btn-danger' href='action_input_pengemudi.php?key=$row[id_pengemudi]'>Hapus</a></td>
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