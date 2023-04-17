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
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"/>
    <link rel="stylesheet" href="./stylestatus.css?v=<?php echo time();?>">
</head>
<body style="background-color: #f0fae6;">
    <nav class="navbar navbar-expand-lg" style="background-color: #54B435 ;" id="navbar">
            <div class="container-fluid">
            <img src="../gmbr/logo.jpg" width="70px;" class="logo">
              <a class="navbar-brand" href="#" style="font-size: 25px; color: white;">PEDULI LINGKUNGAN</a>
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

        <section class="p-3" id="main-content">
          <button class="btn btn-primary" id="button-toggle" style="position: fixed; margin-top: 90px;" >
            <i class="bi bi-list"></i>
          </button>

          <!--HALAMAN STATUS-->
          <table class='tabel-user'>
          <h2 style="margin-left: 100px; margin-top: 95px;">LAPORAN ANDA</h2>
          <?php 
          $no = 1;
            $result = tampil_data_user();          
                if($result){
                  if(mysqli_num_rows($result) > 0){ 
                    ?>
          <table class='table'>
             <thead class="table-dark">
                <tr>
                 <th scope='col'>#</th>
                 <th scope='col'>Nama</th>
                 <th scope='col'>Tanggal</th>
                 <th scope='col'>Alamat</th>
                 <th scope='col'>Status</th>
                 <th scope='col'>Nomor Telepon</th>
                 <th scope='col'>More</th>
                 </tr>
              </thead>
              <?php
              //MENAMPILKAN QUERY LAPOR BERDASARKAN USERNAME LOGIN
              $query = mysqli_query($koneksi, "SELECT * FROM lapor ORDER BY username");
              while($row=mysqli_fetch_array($result)){ 
                ?>
              <tbody>
                <tr>
                  <th scope='row'></th>
                  <td><?=$row['nama']?></td>
                  <td><?=$row['tanggal_lapor']?></td>
                  <td><?=$row['alamat']?></td>
                  <td><?=$row['status_lapor']?></td>
                  <td><?=$row['notelp']?></td>

                  <td>
                    <button type='button' class='btn btn-info' data-bs-toggle="modal" data-bs-target="#exampleModal<?= $row['id_lapor']?>">MORE</button>
                    <button type='button' class='btn btn-danger'>DELETE</button>
                  </td>
               </tr>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal<?= $row['id_lapor']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Lapor</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-sm-4">
                            Nama Pelapor <br>
                            Alamat Sampah <br>
                            Tanggal <br>
                            Keterangan <br>
                            Status <br>
                            Foto <br>
                          </div>
                          <div class="col-sm-8">
                            : <?= $row['nama'] ?><br>
                            : <?= $row['alamat']?> <br>
                            : <?= $row['tanggal_lapor']?> <br>
                            : <?= $row['keterangan']?> <br>
                            : <?= $row['status_lapor']?> <br>
                          </div>
                          <div class="gmbr">
                          <img src="../assets/img<?= $row['pict']; ?>"width="500"> <br>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
               <!-- ==============  PENUTUP QUERY =============== -->
                <?php } ?>     
              <?php 
              }else{
                echo "ANDA BELUM MELAPOR";
               }
              echo"</tbody>";
              echo "</table>";
              ?>
              <?php
            mysqli_free_result($result);
          }

?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="script.js"></script>
</html>