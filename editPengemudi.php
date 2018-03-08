<?php
include_once 'view/header.php';
if (isset($_GET['key'])) {
    $key    = $_GET['key'];
    $result = mysqli_query($link, "SELECT * FROM pengemudi WHERE id_pengemudi='$key'");
    $hasil  = mysqli_fetch_assoc($result);
} else {
    $hasil = null;
}

?>
<main role="main" class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>Edit Pengemudi dengan No Passpor <?= $hasil['noPaspor']?></h4>
        </div>        
        <div class="panel-body">
            <form action="action_input_pengemudi.php?method=update" method="POST">
                <input type="hidden" name="key" value="<?= $key ?>">
                <div class="form-group">
                    <label>No Paspor</label>
                    <input type="text" class="form-control" placeholder="Input No Paspor" name="noPaspor" value="<?= $hasil['noPaspor'] ?>" required>
                </div>
                <div class="form-group">
                    <label>Pengemudi</label>
                    <input type="text" class="form-control" placeholder="Input Pengemudi" name="pengemudi" value="<?= $hasil['pengemudi'] ?>" required>
                </div>
                <div class="form-group">
                    <label>SIM</label>
                    <input type="text" class="form-control" placeholder="Input SIM" name="sim" value="<?= $hasil['sim'] ?>" required>
                </div>
                <div class="form-group">
                    <label>Kebangsaan</label>
                    <input type="text" class="form-control" placeholder="Input Kebangsaan" name="kebangsaan" value="<?= $hasil['kebangsaan'] ?>" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan Data</button>&nbsp;
                    <a href="data_pengemudi.php" class="btn btn-default">Kembali</a>
                </div>
            </form>
        </div>
     </div>  
</main>