<?php
session_start();

//INISIASI
include_once 'koneksi.php';
include_once 'model.php';

//MEMBUAT MODEL BARU 
$model = new Model($koneksi);

if(isset($_GET['nik'])){
    $nik = $_GET['nik'];

    $hapus = $model->HapusPeserta($nik);

    if($hapus){
        header("location:kesehatan.php");
    }
}
?>