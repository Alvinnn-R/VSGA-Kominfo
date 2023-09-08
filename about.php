<?php
// view_images.php
include 'includes/auth.php';
include 'includes/db_config.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>About</title>
    <link rel="stylesheet" href="assets/bootstrap.min.css">
</head>

<body>
    <?php include 'includes/nav.php'; ?>
    <div class="container mt-5">
        <div class="card">
            <h5 class="card-header text-bold">About BPSDMP
            </h5>
            <div class="card-body">
                <h5 class="card-title">Balai Pengembangan Sumber Daya Manusia dan Penelitian Komunikasi dan Informatika Surabaya
                    Badan Penelitian dan Pengembangan Sumber Daya Manusia - Kementerian Komunikasi dan Informatika Republik Indonesia</h5>
                <p class="card-text">Alamat: Jl. Raya Ketajen No.36, Ketajen, Kec. Gedangan, Kabupaten Sidoarjo, Jawa Timur 61254
                    Telepon: (031) 8011944
                    Provinsi: Jawa Timur</p>
                <a href="#" class="btn btn-primary">Kontak</a>
            </div>
        </div>
    </div>
</body>

</html>