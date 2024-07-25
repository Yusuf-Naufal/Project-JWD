<?php
session_start();

//INISIASI
include_once 'koneksi.php';
include_once 'model.php';

//MEMBUAT MODEL BARU 
$model = new Model($koneksi);


if(isset($_GET['nik'])){
    $nik = $_GET['nik'];

    $TampilData = $model->AmbilDataByNik($nik);

    if($TampilData){
        if(isset($_POST['submit'])){
            $nama = $_POST['nama'];
            $nik = $_POST['nik'];
            $umur = $_POST['umur'];
            $jk = $_POST['jenis_kelamin'];
            $rp = $_POST['riwayat_penyakit'];
            $tanggal = $_POST['tanggal'];
            $jv = $_POST['jenis_vaksin'];
            $biaya = $_POST['biaya'];
            $bukti = $_POST['bukti'];

            // Memperbarui data peserta
            $update = $model->UpdatePeserta($nama, $nik, $umur, $jk, $rp, $tanggal, $jv, $biaya, $bukti);

            if($update){
                header("location:kesehatan.php");
            }
        }
    }
    
}
?>