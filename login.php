<link href="asset\bootstrap-3.3.7\css\bootstrap.min.css" rel="stylesheet">
<!-- <link href="asset\bootstrap-3.3.7\css\floating-labels.css" rel="stylesheet"> -->
<link rel="icon" href="https://www.shareicon.net/download/2016/07/21/799548_people_512x512.png">
<title>Database Ranmor</title>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-4  col-md-offset-4">
            <div class="panel-body">
                <form action="proses.php" method="POST" class="form-signin">
                    <div class="text-center mb-4">
                        <img class="mb-4" src="asset\icon.png" alt="" width="72" height="72">
                    </div>
                    <h3 align="center">LOGIN DATABASE RANMOR</h3>
                    <?php
                        session_start();
                        if (isset($_SESSION['pesan'])) {
                            echo "<div class='alert alert-danger' role='alert'>".$_SESSION['pesan']."</div>";
                            session_destroy();
                        }
                    ?>
                    <div class="form-label-group">
                        <input type="text" id="inputUser" class="form-control"  name="username" placeholder="Username" required autofocus>
                        <label for="inputUser">Username</label>
                    </div>
                    <div class="form-label-group">
                        <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
                        <label for="inputPassword">Password</label>
                    </div>
                    <div class="form-label-group">
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
  </body>