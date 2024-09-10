<?php
include"../config/koneksi.php";

$NamaProduk = $_POST['nm_produk'];
$Harga = $_POST['harga'];
$Stok = $_POST['stok'];

mysqli_query($koneksi, "INSERT INTO tb_produk values ('', '$NamaProduk', '$Harga', '$Stok')");

header("location:produk_data.php");