<?php
include"../config/koneksi.php";

$NamaUser = $_POST['nm_user'];
$Username = $_POST['username'];
$Password= $_POST['password'];
$Role = "Petugas";

mysqli_query($koneksi, "INSERT INTO tb_user values ('', '$NamaUser', '$Username', '$Password', '$Role')");

header("location:kasir_data.php");