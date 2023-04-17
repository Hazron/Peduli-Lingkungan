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
	if($_SESSION['level']=="petugas"){
    echo "<script>
        alert('Anda Bukan Admin!!!') ;
        document.location.href = 'hal-admin.php';
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
  $get2 = mysqli_query($koneksi, "SELECT * FROM lapor WHERE status_lapor='SELESAI'");
  $count3 = mysqli_num_rows($get1); //hitung seluruh kolom
  

?>
<!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="../login/style-hal-adm.css">
        <title>Form Admin</title>
        <!-- bootstrap 5 css -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css"integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK"crossorigin="anonymous"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"/>
        <style>
          .tabel{
            margin-left: 35px;
          }
          .sidebar{
            margin-top: 91px;
          }
        </style>
      </head>
      <nav class="navbar navbar-expand-lg" style="background-color: #54B435; position: fixed;" id="navbar">
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
      <body style="background-color: #f0fae6;">
        <div>
          <div class="sidebar p-4" id="sidebar">
            <h4 class="mb-5 text-white">Admin Peduli Lingkungan</h4>
            <li>
              <a class="text-white" href="hal-admin.php">
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
          <button class="btn btn-primary" id="button-toggle" style="margin-top: 90px;">
            <i class="bi bi-list"></i>
          </button>
            <!--halaman tabel-->
            <?php 
            //FUNCTION TAMPIL_DATA
            $result = tampil_data();          
                if($result){
                  if(mysqli_num_rows($result) > 0){ 
                    ?>
                <div class="tabel">
                  <h1 style="margin-top: 20px;">Data-Data Lapor Sampah</h1>
                    <table class='table'>
                      <thead class='table-dark'>
                        <tr>
                          <th scope='col'>#</th>
                      <th scope='col'>Nama</th>
                      <th scope='col'>Tanggal</th>
                      <th scope='col'>Alamat</th>
                      <th scope='col'>Action</th>
                      <th scope='col'>Action</th>
                      <th scope='col'>More</th>
                      </tr>
                    </thead> 
                   <?php while($row=mysqli_fetch_array($result)){
                    ?>
                    <tbody>
                      <tr>
                        <th scope='row'></th>
                        <td><?=$row['nama']?></td>
                        <td><?=$row['tanggal_lapor']?></td>
                        <td><?=$row['alamat']?></td>
                        <td><?=$row['status_lapor']?> <td>
                        <a href="edit.php?id_lapor=<?= $row['id_lapor'];?>" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#ubahModal<?=$row['id_lapor'];?>"> Edit</a>
                        <a href='delete.php?id_lapor=<?= $row['id_lapor'];?><button type='button' class='btn btn-danger deleteb' id='deleteb'>Hapus</a></button>
                        </td>
                        
                        <td><button type='button' class='btn btn-info' data-bs-toggle="modal" data-bs-target="#exampleModal<?= $row['id_lapor']?>">More</button></td>
              <!-- ============ EDIT DATA MODAL START ============ -->
              <!-- Modal -->
                <div class="modal fade" id="ubahModal<?=$row['id_lapor'];?>" tabindex="-1" role="dialog" aria-labelledby="ubahModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="ubahModalLabel">Ubah Status Laporan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form action="edit.php" method="POST">
                          <input type="hidden" name="id_lapor" name="id_lapor" value="<?= $row['id_lapor']; ?>">
                        
                          <select class="form-select" aria-label="Default select example" for="status_lapor" name="status_lapor">
                            <option value="PROSES" id="status_lapor">PROSES</option>
                            <option value="SELESAI"id="status_lapor">SELESAI</option>
                          </select>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="update">Update</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>   
              </tr>
              <!-- ============ EDIT DATA MODAL END ============ -->

              <!-- ============ VIEW DATA MODAL START ============ -->
              <div class="modal fade" id="exampleModal<?= $row['id_lapor']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Lapor</h1>
                        <button type="button" class="btn-close" dat-bs-dismiss="modal" aria-label="Close"></button>
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
                          <img src="../assets/img<?= $row['pict'];?>" width="5000px;"> <br>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- ============ VIEW DATA MODAL END ============ -->

                <!-- =================== BATAS WHILE RESULT ==================== -->
                <?php
                    }
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
                ?>
                </div>
              </section>
                <?php } 
                ?>
                <!-- ============================ UPDATE STATUS LAPOR PHP ============================ -->
            </body>
      <!-- ============= JAVASCRIPT =============-->
      <script src="script.js"></script> 
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
      <script src="../dist/jquery-3.6.1.min.js"></script>
      <script src="../dist/sweetalert2.all.min.js"></script>
      <script>
        //for delete
         $('.deleteb').on('click', function(e){
          e.preventDefault();
          const href = $(this).attr('href')

          Swal.fire({
            title : 'Apakah Anda Yakin Menghapus Laporan itu?',
            text : 'Data tersebut akan terhapus',
            type : 'warning',
            showCancelButton: true,
            confirmButtonColor : '#3085d6',
            cancelButtonColor : '#d33',
            confirmButtontext : 'Delete Record',
          }).then((result) => {
              if(result.value){
                document.location.href = href;
              }
          })
         })
         const flashdata = $('.flash-data').data('flashdata')
         if(flashdata){
          Swal.fire({
            title: 'Sukses',
            Text: 'Menghapus Lapor Telah Terhapus',
            type: 'success',

          })
         }
      </script>
      <script>
        $(document).on("click", "#tombolUbah", function(){
          let id = $(this).data('id_lapor');
          let status = $(this).data('status');

          $("#id_lapor").val('id_lapor');
          $(".modal-body #status").val('status');
        });
      </script>
      <!--
      <script>
        var text = "";
         text = text + "Nama        : ", " 
         text = text + "Tanngal     : ", "  
         text = text + "Alamat      : ", "  
         text = text + "Keterangan  : ", "  
         text = text + "Status      : ", "  
        $('#more').on('click', function(m){
          m.preventDefault();
          const href =$(this).attr('href')
          Swal.fire({
            title       : 'Data Lengkap Lapor',
            html        : text, 
            imageUrl    : 'https://unsplash.it/400/200',
            imageWidth  : 400,
            imageHeight : 200,
            imageAlt    : 'Custom image',
          }).then((result) => {
              if(result.value){
                document.location.href = href;
              }
          })
        })
      </script>
      -->

      <!-- =============== UPDATE STATUS LAPORAN =============== -->
    </html>