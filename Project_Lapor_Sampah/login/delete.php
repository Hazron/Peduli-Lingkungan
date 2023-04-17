<?php 
    include "../inc-koneksi.php";
    $id = $_GET['id_lapor'];
    $query = mysqli_query($koneksi, "DELETE FROM lapor WHERE id_lapor='$id'");
    header('location: Form-Lapor-Admin.php');
?>