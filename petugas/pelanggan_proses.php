<?php
include"../config/koneksi.php";

$NamaPelanggan = $_POST['nm_pelanggan'];
$Alamat = $_POST['alamat'];
$NomorTelepon = $_POST['no_hp'];

mysqli_query($koneksi, "INSERT INTO tb_pelanggan values ('', '$NamaPelanggan', '$Alamat', '$NomorTelepon')");

header("location:pelanggan_data.php");