<?php
    include_once 'view/header.php';
    
    function form($placeholder, $label, $name){
        ?>
            <div class="form-group">
                <label><?php echo $label ?></label>
                <input type="text" class="form-control" placeholder="<?php echo $placeholder ?>" name="<?php echo $name ?>">
            </div>
        <?php
    }
?>
<div class="container">    
    <div class="panel-group">
        <div class="panel panel-default">
            <div class="panel-heading">Input Kendaraan</div>
            <div class="panel-body"> 
                <form action="action_input_kendaraan.php?method=update" method="POST">                    
                    <div class="row">
                        <div class="col-md-6">
                            <?php
                                form('Input No Kendaraan', 'Tanda No Kendaraan', 'noKendaraan');
                                form('Input Pemilik', 'Pemilik', 'pemilik');
                                form('Input Alamat', 'Alamat', 'alamat');
                                form('Input Merk', 'Merk', 'merk');
                                form('Input Warna', 'Warna', 'warnaKendaraan');
                            ?>
                        </div>
                        <div class="col-md-6">
                            <?php
                                form('Input Tipe', 'Tipe', 'tipe');
                                form('Input Tahun Pembuatan', 'Tahun Pembuatan', 'thnPembuatan');
                                form('Input Dokumen Kendaraan', 'Dokumen Kendaraan', 'dokumenKendaraan');
                                form('Input No Mesin', 'No Mesin', 'noMesin');
                                form('Input No Chasis', 'No Chasis', 'noChasis');
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan Data</button>&nbsp;
                        <button class="btn btn-default"><a href="data_kendaraan.php">Kembali</a></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php    
    include_once 'view/footer.php';
?>