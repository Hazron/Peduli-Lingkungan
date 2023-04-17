<?php 
    include "../inc-koneksi.php";
    if(isset($_GET['id_lapor'])){
        $id_lapor = $_GET['id_lapor'];
    }else{
        die("Error. No ID there");
    }
    $query = mysqli_query($koneksi, "SELECT * FROM lapor WHERE id_lapor='$id_lapor'");
    while ($row=mysqli_fetch_array($query)) {        
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>detail laporan</h2>
    <table>
        <tr>
            <td>Nama</td>
            <td> : <?php echo $row['nama']?></td>
        </tr>
        <tr>
            <td>Tanggal Lapor</td>
            <td> : <?php echo $row['tanggal_lapor']?></td>
        </tr>
        <tr>
            <td>Alamat Penumpukan Sampah</td>
            <td> : <?php echo $row['alamat']?></td>
        </tr>
        <tr>
            <td>Keterangan</td>
            <td> : <?php echo $row['keterangan']?></td>
        </tr>
        <tr>
            <td>Nomor Telepon</td>
            <td> : <?php echo $row['notelp']?></td>
        </tr>
        <tr>
            <td>Status Laporan</td>
            <td> : <?php echo $row['status_lapor']?></td>
        </tr>
        <tr>
            <td>Foto Kejadian</td>
            <td> : <img src="../assets/img<?= $row['pict']; ?>" width="300"></td>
        </tr>
        <?php } ?>
    </table>
    <a href="status.php">Kembali</a>
</body>
</html>