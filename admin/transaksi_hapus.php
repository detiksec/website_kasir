<?php
include "../config/koneksi.php";


//Menangkap data ID yang dikirim
$ProdukID = $_GET['ProdukID'];
$PenjualanID = $_GET['PenjualanID'];

//Menghitung Stok terbaru
$jml_stok = mysqli_query($koneksi,"SELECT JumlahProduk from detailpenjualan where ProdukID='$ProdukID' AND PenjualanID='$PenjualanID'");
$jml = mysqli_fetch_assoc($jml_stok);
$stok = mysqli_query($koneksi, "SELECT Stok from produk where ProdukID='$ProdukID'");
$s = mysqli_fetch_assoc($stok);

//Penjumlahan
$up_stok = implode($s) + implode($jml);

//update stok
mysqli_query($koneksi,"Update produk SET Stok = '$up_stok' where ProdukID = '$ProdukID'");

//menghapus data dari detailpenjualan
mysqli_query($koneksi,"DELETE FROM detailpenjualan where ProdukID='$ProdukID' AND PenjualanID='$PenjualanID'");

header("location:transaksi_tambah.php");
