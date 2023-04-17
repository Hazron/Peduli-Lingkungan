<?php 
    include "../inc-koneksi.php";
    if(isset($_POST['update'])){
      $pict_after = upload_file_petugas();
       $update = mysqli_query($koneksi, "UPDATE lapor SET status_lapor = '$_POST[status_lapor]' WHERE id_lapor = '$_POST[id_lapor]'");        
     if($update){
        echo "<script>
        alert('UPDATE STATUS LAPOR TELAH BERHASIL');
        window.location = 'Form-Lapor-Admin.php';
    </script>";
     }else {
        echo "<script>
        alert('GAGAL');
        window.location = 'Form-Lapor-Admin.php';
    </script>";
     }
   }
?>