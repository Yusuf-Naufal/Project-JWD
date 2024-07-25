<?php
class Model
{
    private $koneksi;

    public function __construct($db){
        $this->koneksi = $db;
    }

    //MENAMPILKAN SEMUA DATA PADA DATABASE
    public function TampilSemua()
    {
        $Query = "SELECT * FROM peserta";
        $hasil = mysqli_query($this->koneksi, $Query);
        return $hasil;
    }

    //MENAMBAH DATA PESERTA
    public function TambahPeserta($nama,$nik,$umur,$jk,$rp,$tanggal,$jv,$biaya,$bukti)
    {
        $Query = "INSERT INTO peserta (nama,nik, umur, jenis_kelamin, riwayat_penyakit, tanggal, jenis_vaksin, biaya, bukti)
        VALUES ('$nama','$nik','$umur','$jk','$rp','$tanggal','$jv','$biaya','$bukti')";
        $hasil = mysqli_query($this->koneksi, $Query);

        if($hasil){
            return true;
        }else {
            return false;
        }
    }

    //MENGHAPUS DATA PESERTA
    public function HapusPeserta($nik){
        $Query = "DELETE FROM peserta WHERE nik = '$nik'";
        $hasil = mysqli_query($this->koneksi, $Query);

        if($hasil){
            return true;
        }else {
            return false;
        }
    }

    //AMBIL DATA PESERTA BY NIK 
    public function AmbilDataByNik($nik){
        $Query = "SELECT * FROM peserta WHERE nik = '$nik'";
        $hasil = mysqli_query($this->koneksi, $Query);
        return $hasil;
    }

    //MENAMPILKAN DETAIL DATA PESERTA
    public function DetailData($nik){
        $Query = "SELECT * FROM peserta WHERE nik = '$nik'";
        $hasil = mysqli_query($this->koneksi, $Query);
        return mysqli_fetch_assoc($hasil);;
    }

    //UPDATE DATA PESERTA
    public function UpdatePeserta($nama,$nik,$umur,$jk,$rp,$tanggal,$jv,$biaya,$bukti){
        $Query = "UPDATE peserta SET nama = '$nama', umur = '$umur', jenis_kelamin = '$jk',
                 riwayat_penyakit = '$rp', tanggal = '$tanggal', jenis_vaksin = '$jv', biaya = '$biaya', bukti = '$bukti' 
                 WHERE nik = '$nik'";
        $hasil = mysqli_query($this->koneksi, $Query);
        if ($hasil) {
            return true;
        } else {
            return false;
        }
    }






    //TOTAL PESERTA 
    public function TotalPeserta()
    {
        $Query = "SELECT COUNT(*) AS total FROM peserta";
        $hasil = mysqli_query($this->koneksi, $Query);
        //MENGEMBALIKAN HASIL SEBAGAI ARRAY ASOSIATIF 
        $total = mysqli_fetch_assoc($hasil);
        return $total['total'];
    }

    //TOTAL ANAK - ANAK
    public function TotalAnak(){
        $Query = "SELECT COUNT(*) AS total FROM peserta WHERE umur < 25";
        $hasil = mysqli_query($this->koneksi, $Query);
        //MENGEMBALIKAN HASIL SEBAGAI ARRAY ASOSIATIF 
        $total = mysqli_fetch_assoc($hasil);
        return $total['total'];
    }

    //TOTAL YANG TIDAK MEMILIKI RIWAYAT PENYAKIT
    public function TidakSakit(){
        $Query = "SELECT COUNT(*) AS total FROM peserta WHERE riwayat_penyakit = 'Tidak ada'";
        $hasil = mysqli_query($this->koneksi, $Query);
        //MENGEMBALIKAN HASIL SEBAGAI ARRAY ASOSIATIF 
        $total = mysqli_fetch_assoc($hasil);
        return $total['total'];
    }

    //MENAMPILKAN JENIS VAKSIN TERBANYAK YANG DIGUNAKAN
    public function VaksinTerbanyak(){
        $Query = "SELECT jenis_vaksin FROM peserta GROUP BY jenis_vaksin ORDER BY COUNT(*) DESC LIMIT 1";
        $hasil = mysqli_query($this->koneksi, $Query);
        //MENGEMBALIKAN HASIL SEBAGAI ARRAY ASOSIATIF 
        $nama = mysqli_fetch_assoc($hasil);
        return $nama['jenis_vaksin'];
    } 



}

?>