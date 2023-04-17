<?php
    session_start();
    include("../inc-koneksi.php");

 
	// cek apakah yang mengakses halaman ini sudah login dan menyesuaikan level 
  if($_SESSION['level']==""){
    echo "<script>
        alert('Anda Belum Login!!!') ;
        document.location.href = 'index-login.php';
        </script>";
  }    
	if($_SESSION['level']=="petugas"){
    echo "<script>
        alert('Anda Bukan Admin!!!') ;
        document.location.href = 'hal-petugas.php';
        </script>";
	}
  if($_SESSION['level']=="user"){
		echo "<script>
    alert('Anda Bukan Admin!!!') ;
    document.location.href = 'lapor.php';
    </script>";
	}
    //ambil data total
    $get1 = mysqli_query($koneksi, "SELECT * FROM lapor");
    $count1 = mysqli_num_rows($get1); //hitung seluruh kolom
  
    //
    $get2 = mysqli_query($koneksi, "SELECT * FROM lapor WHERE status_lapor='PROSES'");
    $count2 = mysqli_num_rows($get2); //hitung seluruh kolom
  
    //
    $get3 = mysqli_query($koneksi, "SELECT * FROM lapor WHERE status_lapor='SELESAI'");
    $count3 = mysqli_num_rows($get3); //hitung seluruh kolom
?>


<!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="../login/style-hal-adm.css">
        <title>Form Admin</title>
        <!-- bootstrap 5 css -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css"integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK"crossorigin="anonymous"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"/>
        </style>
      </head>

      <body style="background-color: #f0fae6;">
      <nav class="navbar navbar-expand-lg" style="background-color: #54B435 ;">
            <div class="container-fluid">
            <img src="../gmbr/logo.jpg" width="70px;" class="logo">
              <a class="navbar-brand" href="#" style="font-size: 25px; color: white; margin-left: 10px; font-weight: bold;">PEDULI LINGKUNGAN</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                  <a class="nav-link active" aria-current="page" href="#">Beranda</a>
                  <a class="nav-link" href="#">Contact</a>
                  <a class="nav-link" href="#">Cara Kerja</a>
                </div>
              </div>
            </div>
          </nav>
        <div>
          <div class="sidebar p-4" id="sidebar"style="background-color: #54B435;">
            <h4 class="mb-5 text-white">Admin Peduli Lingkungan</h4>
            <li>
              <a class="text-white" href="#">
                <i class="bi bi-house mr-2"></i>
                Dashboard
              </a>
            </li>
            </li>
            <li>
                <a href="Form-Lapor-Admin.php" class="text-white">
                    <i class="bi bi-door-closed mr-2">
                         Daftar Laporan</i>
                </a>
            </li>
            <!--LOGOUT-->
            <li>
                <a href="../logout.php" class="text-white">
                    <i class="bi bi-door-closed mr-2">
                         LogOut</i>
                </a>
            </li>
          </div>
        </div>
        <section class="p-4" id="main-content">
          <button class="btn btn-primary" id="button-toggle">
            <i class="bi bi-list"></i>
          </button>
          <div class="card mt-5">
            <div class="card-body">
              <h4>Dashboard</h4>
              <p>
                Tugas Admin adalah Pemeriksa Laporan Masuk Di Database
              </p>
            </div>
          </div>
          <br>
          <div class="row justify-content-around">
              <div class="col-sm-3">
                <div class="card bg-info h-100">
                  <div class="card-body">
                    <h2 class="card-title">TOTAL : <?= $count1; ?> </h2> <!--JUMLAH DATA LAPOR YANG MASUK DI DATABASE-->
                    <p class="card-text">Jumlah Data Masuk</p>
                    <a href="#" class="btn btn-primary">More Info</a>
                  </div>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="card bg-success h-100">
                  <div class="card-body">
                    <h2 class="card-title"> TOTAL :  <?= $count2; ?> </h2>
                    <p class="card-text">Laporan Proses Petugas</p>
                    <a href="#" class="btn btn-primary">More Info</a>
                  </div>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="card bg-warning text-white h-100">
                  <div class="card-body">
                    <h2 class="card-title"> TOTAL : <?= $count3; ?></h2>
                    <p class="card-text">Laporan Selesai</p>
                    <a href="#" class="btn btn-primary">More Info</a>
                  </div>
                </div>
              </div>
            </div>
            
        </section>
      </body>
      <script src="script.js"></script>
    </html>
    