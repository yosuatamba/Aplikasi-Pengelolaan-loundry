<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= base_url('assets/img/logo-light-head.png'); ?>">
        <link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.min.css'); ?>">
    <title>Masuk | ZeroLaundry</title>
</head>
<body>

    <form action="<?= base_url().'login/ceklogin' ?>" method="post">
    <div class="card position-absolute top-50 start-50 translate-middle" style="width: 30rem;">
        <div class="card-body">
            <div class="text-center">
                
            <img class="mb-4" src="assets/img/logo-dark.png" alt="" width="70%" />
            <h3 class="card-title text-center">Masuk</h3>
            </div>
            <?php 
    
        if(isset($_GET['alert'])){
            if($_GET['alert']=="gagal"){
                echo "<div class='alert alert-danger fw-bold text-center'>Maaf! Username dan Password salah</div>";
            }
            if($_GET['alert']=="belum_login"){
                echo "<div class='alert alert-danger fw-bold text-center'>Anda Harus Login</div>";
            }
            if($_GET['alert']=="logout"){
                echo "<div class='alert alert-success fw-bold text-center'>Anda Telah Logout</div>";
            }
        }

            ?>

                <label class="form-label">Username</label>
                <input type="username" class="form-control" id="inputUsername" name="username" placeholder="Masukkan Username" autocomplete="off" autofocus required>
                <label class="form-label">Password</label>
                <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Masukkan Password" required>
                <br>
                <input class="btn btn-primary" type="submit" value="Submit">
            </form>
        </div>
    </div>

    <script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>

</body>
</html>