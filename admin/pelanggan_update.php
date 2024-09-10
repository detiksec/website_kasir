<?php
include"../config/koneksi.php";
$PelangganID = $_POST['id_pelanggan'];
$NamaPelanggan = $_POST['nm_pelanggan'];
$Alamat = $_POST['alamat'];
$NomorTelepon = $_POST['no_hp'];

mysqli_query($koneksi, "UPDATE tb_pelanggan set NamaPelanggan = '$NamaPelanggan', Alamat = '$Alamat',
NomorTelepon = '$NomorTelepon' where PelangganID = '$PelangganID'");



header("location:pelanggan_data.php");