<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Edit Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <!-- MENGHUBUNGKAN DENGAN CSS -->
    <link href="css/styles.css" rel="stylesheet" />

    <style>
        section{
            width: auto;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
        }

        .card {
            background-color: #fff;
            border-radius: 15px;
            width: 570px;
            padding: 10px 20px 10px 20px;
            display: inline-block;
        }
    </style>
</head>
<body>
    <?php 
    //INISIASI
    include_once 'koneksi.php';
    include_once 'model.php';

    //MEMBUAT OBJEK BARU
    $model = new Model($koneksi);

    if (isset($_GET['nik'])) {
        $nik = $_GET['nik'];

        $TampilData = $model->AmbilDataByNik($nik);

        if ($TampilData) {
            if (isset($_POST['submit'])) {
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
                $ekstensi = array('jpg', 'jpeg', 'png'); //JENIS FILE YANG DIPERBOLEHKAN
                $max_ukuran = 1028000; //UKURAN FOTO (satuan : bit)
                $directori = 'bukti/';

                //PENGECEKAN UPLOAD FOTO
                //CEK APAKAH JENIS FILE TERMASUK DALAM FILE YANG DIPERBOLEHKAN
                if (in_array($ekstensi_foto, $ekstensi)) {
                    //CEK UKURAN FOTO APAKAH KURANG DARI MAX FOTO
                    if ($ukuran_foto < $max_ukuran) {

                        //UPLOAD FOTO
                        move_uploaded_file($tmp_name, $directori . $nama_foto);

                        // Memperbarui data peserta
                        $update = $model->UpdatePeserta($nama, $nik, $umur, $jk, $rp, $tanggal, $jv, $biaya, $nama_foto);

                        if ($update) {
                            header("location:kesehatan.php");
                        }
                    }
                }
            }
        }
    }


    ?>


    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="kesehatan.php">SIPENDUK</a>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><hr class="dropdown-divider" /></li>
                    <li><a class="dropdown-item" href="#!">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <section>
        <div class="card">
            <form action="" method="POST" name="editform" enctype="multipart/form-data">
                <?php 
                foreach ($TampilData as $x)
                ?>
                <div class="mb-3">
                    <label for="in_nama" class="form-label">Nama Lengkap</label>
                    <input name="nama" type="text" class="form-control" id="in_nama" value="<?php echo $x['nama'] ?>">
                </div>
                <div class="mb-3">
                    <label for="in_nik" class="form-label">NIK</label>
                    <input name="nik" type="text" class="form-control" id="in_nik" maxlength="16" onchange="Validasi()" value="<?php echo $x['nik'] ?>" readonly>
                </div>
                <div class="mb-3" style="display: flex; gap: 20px; width: 100%;" >
                    <div style="width: 100%;">
                        <label class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="" class="form-select">
                            <option value="Laki - Laki" <?php echo ($x['jenis_kelamin'] == 'Laki - Laki') ? 'selected' : ''; ?>>Laki - Laki</option>
                            <option value="Perempuan" <?php echo ($x['jenis_kelamin'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                        </select>
                    </div>
                    <div style="width: 100%;">
                        <label for="in_umur" class="form-label">Umur</label>
                        <input name="umur" type="number" class="form-control" id="in_umur" value="<?php echo $x['umur'] ?>">
                    </div>
                </div>
                <div class="mb-3" >
                    <label class="form-label">Riwayat Penyakit</label>
                    <input name="riwayat_penyakit" type="text" class="form-control" id="in_riwayat" value="<?php echo $x['riwayat_penyakit'] ?>">
                </div>
                <div style="display: flex; gap: 20px; width: 100%;">
                    <div class="mb-3" style="width: 100%;">
                        <label class="form-label">Tanggal</label>
                        <input name="tanggal" type="date" class="form-control" id="in_tanggal" value="<?php echo $x['tanggal'] ?>" >
                    </div>
                    <div class="mb-3" style="width: 100%;" >
                        <label class="form-label">Jenis Vaksin</label>
                        <!-- INI YANG NANTI AKAN MERUBAH BIAYA PADA TEXT JAVASCRIPT (onchange) -->
                        <select name="jenis_vaksin" id="in_vaksin" class="form-select" onchange="Biayanya()">
                            <option value="Boster" <?php echo ($x['jenis_vaksin'] == 'Boster') ? 'selected' : ''; ?>>Boster</option>
                            <option value="Sinovac" <?php echo ($x['jenis_vaksin'] == 'Sinovac') ? 'selected' : ''; ?>>Sinovac</option>
                            <option value="Moderna" <?php echo ($x['jenis_vaksin'] == 'Moderna') ? 'selected' : ''; ?>>Moderna</option>
                            <option value="AstraZeneca" <?php echo ($x['jenis_vaksin'] == 'AstraZeneca') ? 'selected' : ''; ?>>AstraZeneca</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="in_biaya" class="form-label">Biaya</label>
                    <input name="biaya" type="number" class="form-control" id="in_biaya" readonly value="<?php echo $x['biaya'] ?>">
                </div>
                <div class="mb-3">
                    <label for="bukti" class="form-label">Bukti</label>
                    <input name="bukti" type="file" class="form-control" id="bukti" readonly>
                </div>
                <div style="padding-left: 75%;">
                    <button type="submit" name="submit" class="btn btn-primary" style="width: 130px; margin-top: 10px;">Edit</button>
                </div>
            </form>
        </div>
    </section>

    <script>
        function Biayanya(){
                // (document.(id form).(id input / select).value)
                var js_vaksin = document.editform.in_vaksin.value;
                var umur =document.editform.in_umur.value;
                var biaya = 0;
                var diskon = 0;
                var total_bayar

                if(js_vaksin == "Boster"){
                    biaya = 200000;
                }
                else if(js_vaksin == "Sinovac"){
                    biaya = 150000;
                }
                else if (js_vaksin == "Moderna"){
                    biaya = 300000;
                }
                else if (js_vaksin == "AstraZeneca"){
                    biaya = 250000;
                }
                else{
                    biaya = 10000;
                }

                if (umur <= 10){
                    diskon = 100;
                }
                else if(umur > 10 && umur <= 25){
                    diskon = 20;
                }
                else{
                    diskon = 50;
                }

                total_bayar = biaya - (biaya * diskon /100) ;

                document.editform.in_biaya.value = total_bayar;
            }

            function Validasi(){
                var nik = document.editform.in_nik.value;

                if(nik.length != 16){
                    window.alert("NIK tidak valid!!")
                }
            }
    </script>
</body>
</html>