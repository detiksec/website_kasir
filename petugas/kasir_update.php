<?php
include"../config/koneksi.php";
$UserID = $_POST ['id_user'];
$NamaUser = $_POST['nm_user'];
$Username = $_POST['username'];
$Password = $_POST['password'];
$Role = $_POST['role'];

mysqli_query($koneksi, "UPDATE tb_user set NamaUser = '$NamaUser', username = '$Username', password = '$Password', role = '$Role' where UserID = '$UserID'");
header("location:kasir_data.php");