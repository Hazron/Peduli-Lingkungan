<?php 
$hostname = "localhost";
$database = "pl-db";
$username = "root";
$password = "";

$koneksi = mysqli_connect($hostname, $username, $password, $database);
 
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
?>