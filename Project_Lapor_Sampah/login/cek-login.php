<?php 

// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include '../inc-koneksi.php';
 
// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = md5($_POST['password']);
$err = "";

 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from admin where username='$username' and password='$password'");


// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

$login_user = mysqli_query($koneksi, "select * from user where username='$username' and password='$password'");

$cekk = mysqli_num_rows($login_user);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
    
	
	$data = mysqli_fetch_assoc($login);
	
 
	// cek jika user login sebagai admin
	if($data['level']=="admin"){
 
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:hal-admin.php");
 
	// cek jika user login sebagai pegawai
	}else if($data['level']=="petugas"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "petugas";
		// alihkan ke halaman dashboard pegawai
		header("location:hal-petugas.php");
 
	// cek jika user login sebagai pengurus
	}
}
else{
	header("location:index-login.php");
}
	if($cekk > 0){
		$data2 = mysqli_fetch_assoc($login_user);

			if($data2['level']=="user"){
				$_SESSION['username'] = $username;
				$_SESSION['level'] = "user";
				header("location:lapor.php");
			}else{
				header("location:index-login.php");
			}
	}
?>