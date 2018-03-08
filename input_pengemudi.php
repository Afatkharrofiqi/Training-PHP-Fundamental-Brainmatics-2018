<?php
	include_once 'view/header.php';
	function form($placeholder, $label, $name){
        ?>
            <div class="form-group">
                <label><?= $label ?></label>
                <input type="text" class="form-control" placeholder="<?= $placeholder ?>" name="<?= $name ?>">
            </div>
        <?php
    }
?>
<main role="main" class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>Input Pengemudi</h4>
        </div>
        <div class="panel-body">
            <form action="action_input_pengemudi.php?method=insert" method="POST">
                <?php
                	form('Input No Paspor', 'No Paspor', 'noPaspor');
                	form('Input Pengemudi', 'Pengemudi', 'pengemudi');
                	form('Input SIM', 'SIM', 'sim');
                	form('Input Kebangsaan', 'Kebangsaan', 'kebangsaan');
                ?>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan Data</button>&nbsp;
                    <a href="data_pengemudi.php" class="btn btn-default">Kembali</a>
                </div>
            </form>
        </div>
    </div>    
</main>
<?php	
    include_once 'view/footer.php';
?>