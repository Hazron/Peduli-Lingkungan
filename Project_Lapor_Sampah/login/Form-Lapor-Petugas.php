<?php
    session_start();
    include("../inc-koneksi.php");
    include "function.php";
	// cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['level']==""){
		echo "<script>
        alert('Anda Belum Login!!!') ;
        document.location.href = 'index-login.php';
        </script>";
	}    
	if($_SESSION['level']=="admin"){
    echo "<script>
        alert('Anda Bukan Petugas!!!') ;
        document.location.href = 'hal-admin.php';
        </script>";
	}
  if($_SESSION['level']=="user"){
		echo "<script>
    alert('Anda Bukan Petugas!!!') ;
    document.location.href = 'lapor.php';
    </script>";
	}
?>

<!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="./stylee.css">
        <title>Form Admin</title>
        <!-- bootstrap 5 css -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css"integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK"crossorigin="anonymous"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"/>
      </head>


      <body style="background-color: #f0fae6;">
      <nav class="navbar navbar-expand-lg" style="background-color: #54B435;" id="navbar">
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
          <div class="sidebar p-4" id="sidebar">
            <h4 class="mb-5 text-white">Petugas Peduli Lingkungan</h4>
            <li>
              <a class="text-white" href="hal-petugas.php">
                <i class="bi bi-house mr-2"></i>
                Dashboard
              </a>
            </li>
            </li>

            <li>
                <a href="Form-Lapor-Petugas.php" class="text-white">
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
          <div class="tabel">
          <button class="btn btn-primary" id="button-toggle">
            <i class="bi bi-list"></i>
          </button>
            <h1>Data-Data Lapor Sampah</h1>
            <!--halaman tabel-->
            <?php 
            $result = tampil_data();
                if($result){
                  if(mysqli_num_rows($result) > 0){ ?>
         <table class='table'>
             <thead class="table-dark">
                <tr>
                 <th scope='col'>#</th>
                 <th scope='col'>Nama</th>
                 <th scope='col'>Tanggal</th>
                 <th scope='col'>Alamat</th>
                 <th scope='col'>Status</th>
                 <th scope='col'>Action</th>
                 <th scope='col'>More</th>
                </tr>
              </thead>
              <?php 
              while($row=mysqli_fetch_array($result)){ ?>
              <tbody>
                <tr>
                  <th scope='row'></th>
                  <td><?=$row['nama']?></td>
                  <td><?=$row['tanggal_lapor']?></td>
                  <td><?=$row['alamat']?></td>
                  <td><?=$row['status_lapor']?></td>
                  
                  <td><a href="editpetugas.php?id_lapor=<?= $row['id_lapor'];?>" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#ubahModal<?=$row['id_lapor'];?>"> Edit</a></td>
                  <td><button type='button' class='btn btn-info' data-bs-toggle="modal" data-bs-target="#exampleModal<?= $row['id_lapor']?>">More</button></td>

                </tr>
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
                            Nomor Telepon <br>
                            Status <br>
                            Foto <br>
                          </div>
                          <div class="col-sm-8">
                            : <?= $row['nama']?> <br>
                            : <?= $row['alamat']?> <br>
                            : <?= $row['tanggal_lapor']?> <br>
                            : <?= $row['keterangan']?> <br>
                            : <?= $row['notelp']?> <br>
                            : <?= $row['status_lapor']?> <br>
                          </div>
                          <img src="../assets/img<?= $row['pict'] ?>"> <br>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="modal fade" id="ubahModal<?=$row['id_lapor'];?>" tabindex="-1" role="dialog" aria-labelledby="ubahModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="ubahModalLabel">Ubah Status Laporan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form action="editpetugas.php" method="POST" enctype="multipart/form-data">
                          <input type="hidden" name="id_lapor" name="id_lapor" value="<?= $row['id_lapor']; ?>">
                        
                          <select class="form-select" aria-label="Default select example" for="status_lapor" name="status_lapor">
                            <option value="PROSES" id="status_lapor">PROSES</option>
                            <option value="SELESAI"id="status_lapor">SELESAI</option>
                          </select>
                          <br>
                          <input class="form-control form-control-lg" id="formFileLg" type="file" name="pict_after" for="pict_after">
                          <p>Petugas Harus meinput foto setelah mengangkut sampah dalam keadaan bersih</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="uupdate">Update</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>   
              </tr>
              <?php } 
              ?>
              </tbody>
            </table>
            <?php 
            mysqli_free_result($result);
          }else{
            echo "Data masing kosong";
           }
          }else{
            echo "Terjadi kesalahan. Coba lagi nanti".mysqli_error($koneksi);
           }
           mysqli_close($koneksi);
?>
          </div>
        </section>
      </body>
        <script script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <script src="script.js"></script>
    </html>
    