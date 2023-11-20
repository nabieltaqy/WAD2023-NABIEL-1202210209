<!-- File ini berisi koneksi dengan database MySQL -->
<?php 

// (1) Buatlah variable untuk connect ke database yang telah di import ke phpMyAdmin
$servername="localhost";
$username="root";
$dbname = "wad_modul4";
$password="";
$conn=new mysqli($servername, $username,  $password, $dbname);
// 

// (2) Buatlah perkondisian untuk menampilkan pesan error ketika database gagal terkoneksi
if ($conn->connect_error) {
    die ("Connection Failed: " . $conn->connect_error);
}else {

    echo "Connected Succesfully";
}
// 
 
?>