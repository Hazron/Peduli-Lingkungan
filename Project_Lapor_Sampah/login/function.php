<?php 
function tampil_data(){
    global $koneksi;
    $sql = "SELECT * FROM lapor";
    $result = mysqli_query($koneksi, $sql);
    return $result;
}

function tampil_data_user(){
    global $koneksi;
    $sql = "SELECT * FROM lapor WHERE username='$_SESSION[username]'";
    $result = mysqli_query($koneksi, $sql);
    return $result;
}

function hapus_data(){
    global $koneksi;
    if(isset($_GET['id_lapor'])){
        mysqli_query($koneksi, "DELETE FROM lapor WHERE id_lapor='$_GET[id_lapor]'");
        echo "Data Telah Dihapus";
        echo "<meta http-equiv=refresh content=2;URL='From-Lapor-Admin.php'>";
    }
}

//FUNCTION UPDATE DATA STATUS
function update_status($data){
    global $koneksi;
    $id = $data['id_lapor'];
    $status = $_POST['status'];

    mysqli_query($koneksi, "UPDATE lapor SET status='$status' WHERE id_lapor='$id'");
    return mysqli_affected_rows($koneksi);
};

function upload_file(){
    $namaFile   = $_FILES['pict']['name'];
    $ukuranFile = $_FILES['pict']['size'];
    $error      = $_FILES['pict']['error'];
    $tmpName    = $_FILES['pict']['tmp_name'];

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

    move_uploaded_file($tmpName, 'C:\xampp\htdocs\Project_Lapor_Sampah\assets');
    return $namaFileBaru;
}

function upload_file_petugas(){
    $namaFile   = $_FILES['pict_after']['name'];
    $ukuranFile = $_FILES['pict_after']['size'];
    $error      = $_FILES['pict_after']['error'];
    $tmpName    = $_FILES['pict_after']['tmp_name'];

    $extentionValid = ['jpg', 'jpeg', 'png'];
    $extentionFile  = explode('.', $namaFile);
    $extentionFile  = strtolower(end($extentionFile));
    
    if(!in_array($extentionFile, $extentionValid)){
        echo "<script>
        alert('Anda Harus Memasukkan Bukti Foto Dari Petugas') ;
        document.location.href = 'Form-Lapor-Petugas.php';
        </script>";
        die();

    } if($ukuranFile > 2048000){
        echo "<script> 
        alert('Ukuran File Maksimal 2MB');
        document.location.href = 'Form-Lapor-Petugas.php';
        </script>";
        die();
    }

    $namaFileBaruAfter = uniqid();
    $namaFileBaruAfter .= '.';
    $namaFileBaruAfter .= $extentionFile;

    move_uploaded_file($tmpName, 'C:\xampp\htdocs\Project_Lapor_Sampah\assets\img'. $namaFileBaruAfter);
    return $namaFileBaruAfter;
}
?>
