<?php
	include_once 'view/header.php';
?>
<main role="main" class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>Cetak Harian</h4>
        </div>
        <div class="panel-body">
            <form action="action_cetak.php" method="POST">
                <div class="form-group">
                    <label class="col-md-2">Pilih Data : </label>
                    <select class="form-control" name="data">
                        <option value="kendaraan">Kendaraan</option>
                        <option value="pengemudi">Pengemudi</option>
                        <option value="dokumenranmor">Ranmor</option>
                        <option value="dokumenranmor_join">Ranmor dengan Pengemudi dan Kendaraan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="col-md-2">Tanggal : </label>
                    <input class="col-md-8 form-control" type="date" name="waktu">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Export Excel</button>
                </div>            
            </form>
        </div>
    </div>    
</main>
<?php
	include_once 'view/footer.php';
?>