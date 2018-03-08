<?php
    include_once 'view/header.php';
    if (isset($_GET['key'])) {
        $key    = $_GET['key'];
        $result = mysqli_query($link, "SELECT * FROM kendaraan WHERE id_kendaraan='$key'");
        $hasil  = mysqli_fetch_assoc($result);
    } else {
        $hasil = null;
    }
?>
   <main role="main" class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Edit Kendaraan dengan No Kendaraan <?= $hasil['noKendaraan']?></h4>
            </div>        
            <div class="panel-body">
                <form action="action_input_kendaraan.php?method=update" method="POST">
                    <input type="hidden" name="key" value="<?= $key ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label >Tanda No Kendaraan</label>
                                <input type="text" class="form-control" placeholder="Input No Kendaraan" name="noKendaraan" value="<?= $hasil['noKendaraan'] ?>" >
                            </div>
                            <div class="form-group">
                                <label >Pemilik</label>
                                <input type="text" class="form-control" placeholder="Input Pemilik" name="pemilik" value="<?= $hasil['pemilik'] ?>" >
                            </div>
                            <div class="form-group">
                                <label >Alamat</label>
                                <input type="text" class="form-control" placeholder="Input Alamat" name="alamat" value="<?= $hasil['alamat'] ?>" >
                            </div>
                            <div class="form-group">
                                <label >Merk</label>
                                <input type="text" class="form-control" placeholder="Input Merk" name="merk" value="<?= $hasil['merk'] ?>" >
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Warna</label>
                                <input type="text" class="form-control" placeholder="Input Warna" name="warnaKendaraan" value="<?= $hasil['warnaKendaraan'] ?>" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label >Tipe</label>
                                <input type="text" class="form-control" placeholder="Input Tipe" name="tipe" value="<?= $hasil['tipe'] ?>" >
                            </div>
                            <div class="form-group">
                                <label >Tahun Pembuatan</label>
                                <input type="text" class="form-control" placeholder="Input Tahun Pembuatan" name="thnPembuatan" value="<?= $hasil['thnPembuatan'] ?>" >
                            </div>
                            <div class="form-group">
                                <label >Dokumen Kendaraan</label>
                                <input type="text" class="form-control" placeholder="Input Dokumen Kendaraan" name="dokumenKendaraan" value="<?= $hasil['dokumenKendaraan'] ?>" >
                            </div>
                            <div class="form-group">
                                <label >No Mesin</label>
                                <input type="text" class="form-control" placeholder="Input No Mesin" name="noMesin" value="<?= $hasil['noMesin'] ?>" >
                            </div>
                            <div class="form-group">
                                <label >No Chasis</label>
                                <input type="text" class="form-control" placeholder="Input No Chasis" name="noChasis" value="<?= $hasil['noChasis'] ?>" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan Data</button>&nbsp;
                        <a href="data_kendaraan.php" class="btn btn-default">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>    
   </main>