<?php
session_start();

//INISIASI
include_once 'koneksi.php';
include_once 'model.php';

//MEMBUAT MODEL BARU 
$model = new Model($koneksi);

if(isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $nik = $_POST['nik'];
    $umur = $_POST['umur'];
    $jk = $_POST['jenis_kelamin'];
    $rp = $_POST['riwayat_penyakit'];
    $tanggal = $_POST['tanggal'];
    $jv = $_POST['jenis_vaksin'];
    $biaya = $_POST['biaya'];


    //PROSES UPLOAD BUKTI FOTO
    $nama_foto = $_FILES['bukti']['name']; //MENGAMBIL NAMA FILE (NAMA.jpg)
    $explode_foto = explode('.', $nama_foto); //UNTUK MEMISAHKAN NAMA.jpg -> (NAMA)|(jpg)
    $ekstensi_foto = $explode_foto[1]; //MENGAMBIL (jpg) dari 'explode_foto'

    $ukuran_foto = $_FILES['bukti']['size']; //MENGAMBI UKURAN FOTO
    $tmp_name = $_FILES['bukti']['tmp_name']; //NAMA SEMENTARA
    $ekstensi = array('jpg','jpeg','png'); //JENIS FILE YANG DIPERBOLEHKAN
    $max_ukuran = 1028000; //UKURAN FOTO (satuan : bit)
    $directori = 'bukti/';
    

    //PENGECEKAN UPLOAD FOTO
    //CEK APAKAH JENIS FILE TERMASUK DALAM FILE YANG DIPERBOLEHKAN
    if(in_array($ekstensi_foto, $ekstensi)){
        //CEK UKURAN FOTO APAKAH KURANG DARI MAX FOTO
        if($ukuran_foto < $max_ukuran){
            
            //UPLOAD FOTO
            move_uploaded_file($tmp_name, $directori.$nama_foto);

            $tambah = $model->TambahPeserta($nama,$nik,$umur,$jk,$rp,$tanggal,$jv,$biaya,$nama_foto);

            if($tambah){
                header("location:kesehatan.php");
            }
        }
    } 
}
?>