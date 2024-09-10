<?php
$koneksi = mysqli_connect('localhost','root', '', 'web_kasir_abel');

if(mysqli_connect_errno()){
    echo "Koneksi Gagal:" . mysqli_connect_errno();
}