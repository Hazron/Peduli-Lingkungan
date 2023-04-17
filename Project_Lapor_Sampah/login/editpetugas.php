<?php 
    include "../inc-koneksi.php";
    include "./function.php";
    if(isset($_POST['uupdate'])){
      $pict_after = upload_file_petugas();
       $update = mysqli_query($koneksi, "UPDATE lapor SET pict_after='$pict_after', status_lapor = '$_POST[status_lapor]' WHERE id_lapor = '$_POST[id_lapor]'");   
 
     if($update){
        echo "<script>
        alert('UPDATE STATUS LAPOR TELAH BERHASIL');
        window.location = 'Form-Lapor-Petugas.php';
    </script>";
     }else {
        echo "<script>
        alert('GAGAL');
        window.location = 'Form-Lapor-Petugas.php';
    </script>";
     }
   }
?>