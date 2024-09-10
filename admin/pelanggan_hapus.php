<?php
include"../config/koneksi.php";

$PelangganID = $_GET['PelangganID'];

mysqli_query($koneksi, "DELETE from tb_pelanggan where PelangganID = '$PelangganID'");

header("location:pelanggan_data.php");

