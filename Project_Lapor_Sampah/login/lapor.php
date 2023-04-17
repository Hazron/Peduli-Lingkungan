<?php
    session_start();
    include "../inc-koneksi.php";
    include "function.php";
    if($_SESSION['level']==""){
      echo "<script>
          alert('Anda Belum Login!!!') ;
          document.location.href = 'index-login.php';
          </script>";
    }    
    if($_SESSION['level']=="admin"){
      echo "<script>
          alert('Anda Bukan User!!!') ;
          document.location.href = 'hal-admin.php';
          </script>";
    }
    if($_SESSION['level']=="petugas"){
      echo "<script>
      alert('Anda Bukan User!!!') ;
      document.location.href = 'hal-petugas.php';
      </script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="laporcss.css">
    <title>Peduli Lingkungan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"/>

</head>
<body>
</head>
<body style="background-color: #f0fae6;">
<nav class="navbar navbar-expand-lg" style="background-color: #54B435 ;" id="navbar">
            <div class="container-fluid">
              <img src="../gmbr/logo.jpg" width="70px;" class="logo">
              <a class="navbar-brand" href="#" style="font-size: 25px; color: white;"> PEDULI LINGKUNGAN</a>
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
          <div class="sidebar p-4" id="sidebar">
            <h4 class="mb-5 text-white">Selamat Datang <?php echo $_SESSION['username'];?></h4>
            <li>
            <!--Dashboard-->
              <a class="text-white" href="lapor.php">
                <i class="bi bi-house mr-2"></i>
                Lapor Sampah
              </a>
            </li>
            </li>
            <!-- Cek Status -->
            <li>
                <a href="status.php" class="text-white">
                    <i class="bi bi-door-closed mr-2">
                         Cek Status</i>
                </a>
            </li>
            <!-- Status Anda-->
            <li>
                <a href="status_user.php" class="text-white">
                    <i class="bi bi-door-closed mr-2">
                         Cek Status Laporan Anda</i>
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
          <button class="btn bg-success" id="button-toggle" style="position: fixed; margin-top: 80px;" >
            <i class="bi bi-list"></i>
          </button>
        
        <!-- Form Lapor -->
        <form  action="cek-daftar-lapor.php" method="POST" enctype="multipart/form-data">
        <table>
        <div class="container h-50" id="form">
            <div class="row d-flex justify-content-center align-items-center h-50">
            <div class="col-xl-7">
                <h1 class="text-black mb-4">Form Lapor</h1>
                <div class="card" style="border-radius: 15px;">
                <div class="card-body">

                    <!--NAMA LENGKAP-->
                    <div class="row align-items-center pt-4 pb-3">
                    <div class="col-md-3 ps-5">
                        <h6 class="mb-0">Nama Lengkap</h6>
                    </div>
                    <div class="col-md-9 pe-5">
                        <input type="text" class="form-control form-control-lg" name="nama" value="">
                    </div>
                    </div>

                    <!--NOMOR TELEPON-->
                    <hr class="mx-n3">
                    <div class="row align-items-center py-3">
                    <div class="col-md-3 ps-5">
                        <h6 class="mb-0">Nomor Telepon</h6>
                    </div>
                    <div class="col-md-9 pe-5">
                        <input type="text" class="form-control form-control-lg" name="notelp">
                    </div>
                    </div>

                    <!--ALAMAT-->
                    <hr class="mx-n3">
                    <div class="row align-items-center py-3">
                    <div class="col-md-3 ps-5">
                        <h6 class="mb-0">Alamat</h6>
                    </div>
                    <div class="col-md-9 pe-5">
                        <textarea class="form-control" rows="3" placeholder="Masukkan Alamat" name="alamat"></textarea>
                    </div>
                    </div>

                    <!--KETERANGAN-->
                    <hr class="mx-n3">
                    <div class="row align-items-center pt-4 pb-3">
                    <div class="col-md-3 ps-5">
                        <h6 class="mb-0">Keterangan</h6>
                    </div>
                    <div class="col-md-9 pe-5">
                        <textarea class="form-control" rows="3" placeholder="Masukkan Keterangan" name="keterangan"></textarea>
                    </div>
                    </div>

                    <hr class="mx-n3">
                    <div class="row align-items-center py-3">
                    <div class="col-md-3 ps-5">
                        <h6 class="mb-0">Upload Foto</h6>
                    </div>
                    <div class="col-md-9 pe-5">
                        <input class="form-control form-control-lg" id="formFileLg" type="file" name="pict">
                        <div class="small text-muted mt-2">Upload Foto</div>
                    </div>
                    </div>
                    
                    <hr class="mx-n3">
                    <div class="px-5 py-4">
                    <button type="submit" class="btn btn-primary btn-lg" name="submit">Kirim</button>
                    </div>
                  
                </div>
                </div>
            </div>
            </div>
        </div>
        </table>
        </form>
    </section>
</body>
<script src="script.js"></script>
</html>