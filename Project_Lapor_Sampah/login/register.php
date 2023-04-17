<?php
include '../inc-koneksi.php'; 
	?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peduli Lingkungan</title>
    <link rel="stylesheet" href="style-login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- STYLE -->
    <style>
      
    </style>
</head>
<body>
  <!--Navigasi Bar-->
    
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
              <a class="navbar-brand" href="../index.php" style="font-size: 25px; color: white;">PEDULI LINGKUNGAN</a>
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
    

    <!--Main Menu-->
    <main>
      <section class="vh-100">
        <div class="container-fluid h-custom">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
              <img src="../gmbr/bglgn.png"
                class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">

              <form  action="cek-register.php" method="POST">
                <!-- Nama Lengkap input -->
                <h1>Form Register</h1> 
                <div class="form-outline mb-4">
                  <input type="nama" id="form3Example3" class="form-control form-control-lg"
                    placeholder="Masukkan Nama Lengkap Anda" name="nama">
                  <label class="form-label" for="form3Example3">Nama Lengkap</label>
                </div>
                <!--Username Input-->
                <div class="form-outline mb-4">
                  <input type="username" id="form3Example3" class="form-control form-control-lg"
                    placeholder="Masukkan Username Baru Anda" name="username">
                  <label class="form-label" for="form3Example3">Username Untuk Login</label>
                </div>    
                <!-- EMAIL INPUT -->
                <div class="form-outline mb-3">
                  <input type="email" id="form3Example4" class="form-control form-control-lg"
                    placeholder="Masukkan Email Anda" name="email">
                  <label class="form-label" for="form3Example4">Email</label>
                </div>
                <!-- Password input -->
                <div class="form-outline mb-3">
                  <input type="password" id="form3Example4" class="form-control form-control-lg"
                    placeholder="Masukkan Password Anda" name="password">
                  <label class="form-label" for="form3Example4">Password</label>
                </div>
                <div class="text-center text-lg-start mt-4 pt-2">
                  <button type="submit" class="btn btn-primary btn-lg"
                    style="padding-left: 2.5rem; padding-right: 2.5rem;" id="btnlgn" name="daftar">DAFTAR</button>
                </div>
                <p class="small fw-bold mt-2 pt-1 mb-0">Sudah Memiliki Akun?<a href="index-login.php"
                      class="link-danger">Kembali</a></p>

              </form>
            </div>
          </div>
        </div>
        <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
          <!-- Copyright -->
          <div class="text-white mb-3 mb-md-0">
            Copyright © 2022. All rights reserved.
          </div>
          <!-- Copyright -->
        </div>
      </section>
    </main>
</body>
</html>