<?php
session_start();
if (isset($_SESSION['username'])) {
    $user = $_SESSION['username'];
} else {
    header("Location: login.php");
}

function setActiveAttribute($namafile) {
    echo strpos($_SERVER['PHP_SELF'], '' . "$namafile" . '.php') ? 'active' : '';
}

function listing($namafile, $icon, $nama) {
    ?>
    <li class="nav-item <?php setActiveAttribute($namafile) ?>">
        <a class="nav-link" href="<?php echo '' . $namafile . '.php' ?>">
            <i class="fas <?php echo $icon ?>"></i> <?php echo $nama ?> </a>
    </li>
    <?php
}
?>
<!DOCTYPE html>
<html>
    <head>		
        <title>Database Ranmor</title>
        <!-- Icon -->
        <link rel="icon" href="asset\icon.png">
        <!-- Bootstrap table -->
        <link rel="stylesheet" type="text/css" href="asset\bootstrap-table.min.css">
        <!-- Bootstrap core CSS -->		
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="asset\bootstrap-3.3.7\css\bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="asset\bootstrap-3.3.7\css\bootstrap-theme.min.css">
        <!-- Latest compiled and minified JavaScript -->
        <script src="asset\bootstrap-3.3.7\css\bootstrap.min.js"></script>
        <!-- Script fontawesome -->
        <script src="asset\fontawesome-5.0.6\all.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">Database Ranmor</a>
                </div>				
                <ul class="nav navbar-nav">
                    <?php
                    listing('index', 'fa-home', 'Home');
                    listing('data_kendaraan', 'fa-car', 'Data Kendaraan');
                    listing('data_pengemudi', 'fa-id-card', 'Data Pengemudi');
                    listing('data_ranmor', 'fa-list', 'Database Ranmor');
                    listing('cetak', 'fa-file', 'Cetak');
                    ?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item active">
                        <a href="" class="nav-link"><i class="fas fa-user"></i> <?php echo ucfirst($user); ?></a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </li>
                </ul>				
            </div>      		      		
        </nav>
