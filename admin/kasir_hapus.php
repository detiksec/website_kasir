<?php
include"../config/koneksi.php";

$UserID = $_GET['UserID'];

mysqli_query($koneksi, "DELETE from tb_user where UserID = '$UserID'");

header("location:kasir_data.php");

