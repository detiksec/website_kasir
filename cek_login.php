<?php
include "config/koneksi.php";

$user = $_POST['username'];
$pass = ($_POST['password']);
$akses = $_POST['role'];

$login = mysqli_query($koneksi,"SELECT * FROM tb_user where username = '$user' and password = '$pass' and role='$akses'");
$cek = mysqli_num_rows($login);

if($cek > 0){
    $data = mysqli_fetch_assoc($login);
    if($data['role'] == 'Admin'){
        session_start();
        $_SESSION['UserID'] = $data['UserID'];
        $_SESSION['role'] = 'Admin';
        header("Location:admin/index.php");
    } else if ($data['role'] == 'Petugas') {
        session_start();
        $_SESSION['UserID'] = $data['UserID'];
        $_SESSION['role'] = 'Petugas';
        header("Location:petugas/index.php");
    }
} else {
  header("location:index.php?pesan=gagal");
}