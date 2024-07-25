<?php
//KONEKSI KE DATABASE BISA MENGGUNAKAN INI
$koneksi = mysqli_connect("localhost", "root", "", "kependudukan");

// Check connection
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal : " . mysqli_connect_error();
}

?>