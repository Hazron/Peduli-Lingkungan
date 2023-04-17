<?php 
    session_start();
    include "../inc-koneksi.php";

    if(isset($_POST['submit'])){
        $nama = $_POST['nama'];
        $username = $_SESSION['username'];
        $notelp = $_POST['notelp'];
        $alamat = $_POST['alamat'];
        $pict = upload_file();
        $tanggal = date("Y-m-d");
        $keterangan = $_POST['keterangan'];
        $status = "PROSES";
        

        $cek_lapor = mysqli_query($koneksi, "SELECT * FROM lapor WHERE nama='$nama'");
        $cek_lapor_regis = mysqli_num_rows($cek_lapor);

        if($nama == ""){
            echo "<script>alert('Laporan Ditolak, Anda Belum Memasukkan Nama');window.location = 'lapor.php';</script>";
        } elseif($notelp == ""){
            echo "<script>alert('Laporan Ditolak, Anda Belum Memasukkan Nomor Telepon');window.location = 'lapor.php';</script>";
        } elseif($alamat == ""){
            echo "<script>alert('Laporan Ditolak, Anda Belum Memasukkan alamat');window.location = 'lapor.php';</script>";
        } elseif($pict == ""){
            echo "<script>alert('Laporan Ditolak, Anda Belum Memasukkan Foto');window.location = 'lapor.php';</script>";
        } elseif($keterangan == ""){
            echo "<script>alert('Laporan Ditolak, Anda Belum Memasukkan Keterangan');window.location = 'lapor.php';</script>";
        } 
        
        else{
            mysqli_query($koneksi, "INSERT INTO lapor VALUE('','$username','$nama','$tanggal','$alamat','$keterangan','$pict','','$status','$notelp')");
            echo "<script>
                alert('Laporan Telah Diterima, Terima Kasih telah membantu untuk jambi lebih bersih');
                window.location = 'lapor.php';
            </script>";
        }
    }
    
    function upload_file(){
        $namaFile   = $_FILES['pict']['name'];
        $ukuranFile = $_FILES['pict']['size'];
        $error      = $_FILES['pict']['error'];
        $tmpName    = $_FILES['pict']['tmp_name'];

        //FOR EXTENTION IMAGE
        $extentionValid = ['jpg', 'jpeg', 'png'];
        $extentionFile  = explode('.', $namaFile);
        $extentionFile  = strtolower(end($extentionFile));
        
        if(!in_array($extentionFile, $extentionValid)){
            echo "<script>
            alert('Format Tidak Valid') ;
            document.location.href = 'lapor.php';
            </script>";
            die();

        } if($ukuranFile > 2048000){
            echo "<script> 
            alert('Ukuran File Maksimal 2MB');
            document.location.href = 'lapor.php';
            </script>";
            die();
        }

        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $extentionFile;

        move_uploaded_file($tmpName, 'C:\xampp\htdocs\Project_Lapor_Sampah\assets\img'. $namaFileBaru);
        return $namaFileBaru;
    }
?>