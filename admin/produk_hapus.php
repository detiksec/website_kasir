<?php
include"../config/koneksi.php";

$ProdukID = $_GET['ProdukID'];

mysqli_query($koneksi, "DELETE from tb_produk where ProdukID = '$ProdukID'");

header("location:produk_data.php");

