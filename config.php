<?php
//KONEKSI KE DATABASE BISA MENGGUNAKAN INI
class database{
    var $host ="localhost";
    var $username = "root";
    var $password = "";
    var $db = "kependudukan";
    var $koneksi;

    function getKoneksi(){
        $this->koneksi = mysqli_connect($this->host,$this->username,$this->password,$this->db);
        if (!$this->koneksi){
            die("Koneksi Database Gagal : ".mysqli_connect_error());
        }
        return $this->koneksi;
    }
}