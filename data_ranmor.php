<?php
include_once 'view/header.php';
?>
<main role="main" class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading">        
            <h4>Data Kendaraan Bermotor</h4>
        </div>
        <div class="panel-body">
            <?php 
                $cek = isset($_SESSION['status']);

                // pesan berhasil
                if($cek && $_SESSION['status'] == 'insert_sukses'){                    
                    echo "<br><div class='alert alert-success' role='alert'>Data ranmor sukses dimasukkan</div>";
                }elseif($cek && $_SESSION['status'] == 'insert_gagal'){                    
                    echo "<br><div class='alert alert-warning' role='alert'>Data ranmor gagal dimasukkan</div>";
                }

                // pesan hapus
                if($cek && $_SESSION['status'] == 'hapus_sukses'){                    
                    echo "<br><div class='alert alert-success' role='alert'>Data sukses dihapus</div>";
                }elseif($cek && $_SESSION['status'] == 'hapus_gagal'){                    
                    echo "<br><div class='alert alert-warning' role='alert'>Data gagal dihapus</div>";
                }

                // pesan hapus
                if($cek && $_SESSION['status'] == 'update_sukses'){                    
                    echo "<br><div class='alert alert-success' role='alert'>Data ranmor sukses diubah</div>";
                }elseif($cek && $_SESSION['status'] == 'update_gagal'){
                    echo "<br><div class='alert alert-warning' role='alert'>Data ranmor gagal diubah</div>";
                }
                
                unset($_SESSION['status']);                
            ?>
            <div class="float-right">
                <a href="input_ranmor.php" class="btn btn-primary">
                    Input Ranmor
                </a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" data-pagination="true" data-search="true" data-toggle="table" data-sort-name="pemilik" data-sort-order="asc" data-page-list="[3, 5, 10, 25, 50, 100]" data-page-size="3" data-show-export="true" data-export-types="['excel','pdf','xlsx','doc']" data-icons-prefix="fa fa-print">
                    <thead class="thead-dark">
                        <tr align="center">
                            <th class="align-middle" data-field="jenisKegiatan" data-sortable="true">Jenis Kegiatan</th>
                            <th class="align-middle" data-field="noDok" data-sortable="true">No Dokumen</th>
                            <th class="align-middle" data-field="tglDok" data-sortable="true">Tgl Dokumen</th>
                            <th class="align-middle" data-field="noPaspor" data-sortable="true">No Paspor</th>
                            <th class="align-middle" data-field="noKendaraan" data-sortable="true">No Kendaraan</th>
                            <th class="align-middle" data-field="noSKKomjen" data-sortable="true">No SK Komjen</th>
                            <th class="align-middle" data-field="tglSKKomjen" data-sortable="true">Tgl SK Komjen</th>
                            <th class="align-middle" data-field="batasWaktu" data-sortable="true">Batas Waktu</th>
                            <th class="align-middle" data-field="noDNTT" data-sortable="true">No DNTT</th>
                            <th class="align-middle" data-field="tglDNTT" data-sortable="true">Tgl DNTT</th>
                            <th class="align-middle" data-field="tglMasuk" data-sortable="true">Tgl Masuk</th>
                            <th class="align-middle" data-field="pelMasuk" data-sortable="true">Pelabuhan Masuk</th>
                            <th class="align-middle" data-field="tglKeluar" data-sortable="true">Tgl Keluar</th>
                            <th class="align-middle" data-field="pelKeluar" data-sortable="true">Pelabuhan Keluar</th>
                            <th class="align-middle" data-field="pemeriksaDok" data-sortable="true">Pemeriksa Dokumen 1</th>
                            <th class="align-middle" data-field="pemeriksaDok2" data-sortable="true">Pemeriksa Dokumen 2</th>
                            <th class="align-middle" data-field="pemeriksaFisik" data-sortable="true">Pemeriksa Fisik 1</th>
                            <th class="align-middle" data-field="pemeriksaFisik2" data-sortable="true">Pemeriksa Fisik 2</th>
                            <th class="align-middle" data-field="status" data-sortable="true">Status</th>
                            <th data-field="operasi" data-tableexport-display="none">Operasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $hasil = mysqli_query($link, "SELECT * FROM dokumenranmor");
                            while ($row = mysqli_fetch_assoc($hasil)) {
                                echo "<tr>
                                        <td>" . $row['jenisKegiatan'] . "</td><td>" . $row['noDok'] . "</td><td>" . $row['tglDok'] . "</td><td>" . $row['noPaspor'] . "</td>
                                        <td>" . $row['noKendaraan'] . "</td><td>" . $row['noSKKomjen'] . "</td><td>" . $row['tglSKKomjen'] . "</td><td>" . $row['batasWaktu'] . "</td>
                                        <td>" . $row['noDNTT'] . "</td><td>" . $row['tglDNTT'] . "</td><td>" . $row['tglMasuk'] . "</td><td>" . $row['pelMasuk'] . "</td>
                                        <td>" . $row['tglKeluar'] . "</td><td>" . $row['pelKeluar'] . "</td><td>" . $row['pemeriksaDok'] . "</td><td>" . $row['pemeriksaDok2'] . "</td>
                                        <td>" . $row['pemeriksaFisik'] . "</td><td>" . $row['pemeriksaFisik2'] . "</td><td>" . $row['status'] . "</td>
                                        <td data-tableexport-display='none'><a class='btn btn-success' href='editRanmor.php?key=$row[noDok]'>Edit</a>
                                        <a class='btn btn-danger' href='action_input_ranmor.php?key=$row[noDok]'>Hapus</a></td>
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