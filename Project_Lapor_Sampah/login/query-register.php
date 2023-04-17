<?php 
    session_start();
    include "../inc-koneksi.php";

    if(isset($_POST['daftar'])){
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $level = "user";
    
    $cek_user = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");
    $cek_user_login = mysqli_num_rows($cek_user);

    if($cek_user_login > 0){
        echo "<script>
            alert('Username Telah Terdaftar');
            window.location : 'register.php';
        </script>";
    }elseif($nama == ""){
        echo "<script>
        alert('Anda Belum Memasukkan Nama Lengkap');
        window.location : 'register.php';
    </script>";
    }elseif($username == ""){
        echo "<script>
        alert('Anda Belum Memasukkan username');
        window.location : 'register.php';
    </script>";
    }elseif($email == ""){
        echo "<script>
        alert('Anda Belum Memasukkan email anda');
        window.location : 'register.php';
    </script>";
    }elseif($password == ""){
        echo "<script>
        alert('Anda Belum Memasukkan email anda');
        window.location : 'register.php';
    </script>";
    }
    }else{
        mysqli_query($koneksi, "INSERT INTO user VALUE('','$username','$password','$nama','$email','','$level')");
        echo "<script>
            alert('Register Berhasil');
            window.location = 'index-login.php';
        </script>";
    }
?>