<!-- File ini berisi koneksi dengan database yang telah di import ke phpMyAdmin kalian -->


<?php
// Buatlah variable untuk connect ke database yang telah di import ke phpMyAdmin
$host = "localhost:3306";
$username  = "root";
$password = "";
$database = "db_modul3_wad";
// 
  
// Buatlah perkondisian jika tidak bisa terkoneksi ke database maka akan mengeluarkan errornya
$connect = mysqli_connect($host, $username, $password, $database);
if (mysqli_connect_errno()) {
    echo "Koneksi Gagal: " . mysqli_connect_error();
    exit();
  }
// 
?>