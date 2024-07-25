<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

        <!-- MENGHUBUNGKAN DENGAN CSS -->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body class="sb-nav-fixed">
        <?php 
        //MELAKUKAN PEMANGGILAN KONEKSI DAN MODEL
        include_once 'koneksi.php';
        include_once 'model.php';

        //MEMBUAT OBJEK BARU
        $model = new Model($koneksi);

        //MENYIMPAN HASIL QUERY PADA VARIABEL "data,total,anak"
        $data = $model->TampilSemua();
        $total = $model->TotalPeserta();
        $anak = $model->TotalAnak();
        $sehat = $model->TidakSakit();
        $vaksin = $model->VaksinTerbanyak();

        ?>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">SIPENDUK</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
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
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="../home.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Home
                            </a>
                            <div class="sb-sidenav-menu-heading">Data Kependudukan</div>
                            <a class="nav-link" href="#">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Kesehatan
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Data Peserta Vaksin</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Data peserta vaksin kota Cilacap</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6" >
                                <div class="card bg-primary text-white mb-4" style="height: 70%; align-items: center; display: felx;">
                                    <div >Jumlah Peserta</div>
                                    <div class="number"><?php echo $total ?></div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4" style="height: 70%; align-items: center;">
                                    <div >Anak - Anak</div>
                                    <div class="number"><?php echo $anak ?></div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4" style="height: 70%; align-items: center;">
                                    <div>Tidak Ada Riwayat</div>
                                    <div class="number"><?php echo $sehat ?></div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4" style="height: 70%; align-items: center;">
                                    <div>Jenis vaksin</div>
                                    <div><?php echo $vaksin ?></div>
                                </div>
                            </div>
                        </div>

                        <div style="display: flex; gap: 20px; margin: -5px 0px 20px 0px">
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" >
                                Tambah Peserta
                            </button>
                            <button class="btn btn-secondary" onclick="ConfirmDownload()">Cetak</button>
                        </div>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Peserta Vaksin
                            </div>
                            <div class="card-body">
                                <table class="table table-striped" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>NIK</th>
                                            <th>Umur</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Riwayat Penyakit</th>
                                            <th>Tanggal</th>
                                            <th>Jenis Vaksin</th>
                                            <th>Biaya</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            foreach($data as $x){
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $no++?>
                                                    </td>
                                                    <td>
                                                        <?php echo $x['nama']?>
                                                    </td>
                                                    <td>
                                                        <?php echo $x['nik']?>
                                                    </td>
                                                    <td>
                                                        <?php echo $x['umur']?>
                                                    </td>
                                                    <td>
                                                        <?php echo $x['jenis_kelamin']?>
                                                    </td>
                                                    <td>
                                                        <?php echo $x['riwayat_penyakit']?>
                                                    </td>
                                                    <td>
                                                        <?php echo $x['tanggal']?>
                                                    </td>
                                                    <td>
                                                        <?php echo $x['jenis_vaksin']?>
                                                    </td>
                                                    <td>
                                                        <?php echo $x['biaya']?>
                                                    </td>
                                                    <td>
                                                        <a href="form_detail.php?nik=<?php echo $x['nik']; ?>" class="btn btn-primary"><i class="bi bi-eye-fill" style="color: white;"></i></i></a>
                                                        <a href="form_edit.php?nik=<?php echo $x['nik']; ?>" class="btn btn-warning"><i class="bi bi-pencil-fill" style="color: white;"></i></a>
                                                        <a onclick="return confirm('Apakah Data Akan dihapus?')" 
                                                            href="proses_hapus.php?nik=<?php echo $x['nik']; ?>" class="btn btn-danger"><i class="bi bi-trash" style="color: white;"></i></a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Peserta</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form name="tambah_peserta" action="proses_tambah.php" method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="in_nama" class="form-label">Nama Lengkap</label>
                                    <input name="nama" type="text" class="form-control" id="in_nama">
                                </div>
                                <div class="mb-3">
                                    <label for="in_nik" class="form-label">NIK</label>
                                    <input name="nik" type="text" class="form-control" id="in_nik" maxlength="16" onchange="Validasi()">
                                </div>
                                <div class="mb-3" style="display: flex; gap: 20px; width: 100%;" >
                                    <div style="width: 100%;">
                                        <label class="form-label">Jenis Kelamin</label>
                                        <select name="jenis_kelamin" id="" class="form-select">
                                            <option value="Laki - Laki">Laki - Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div style="width: 100%;">
                                        <label for="in_umur" class="form-label">Umur</label>
                                        <input name="umur" type="number" class="form-control" id="in_umur">
                                    </div>
                                </div>
                                <div class="mb-3" >
                                    <label class="form-label">Riwayat Penyakit</label>
                                    <input name="riwayat_penyakit" type="text" class="form-control" id="in_riwayat" placeholder="jika tidak punya ketik 'Tidak ada'">
                                </div>
                                <div style="display: flex; gap: 20px; width: 100%;">
                                    <div class="mb-3" style="width: 100%;">
                                        <label class="form-label">Tanggal</label>
                                        <input name="tanggal" type="date" class="form-control" id="in_tanggal" value="<?php echo date('Y-m-d')?>">
                                    </div>
                                    <div class="mb-3" style="width: 100%;" >
                                        <label class="form-label">Jenis Vaksin</label>
                                        <!-- INI YANG NANTI AKAN MERUBAH BIAYA PADA TEXT JAVASCRIPT (onchange) -->
                                        <select name="jenis_vaksin" id="in_vaksin" class="form-select" onchange="Biayanya()">
                                            <option value="Boster">Boster</option>
                                            <option value="Sinovac">Sinovac</option>
                                            <option value="Moderna">Moderna</option>
                                            <option value="AstraZeneca">AstraZeneca</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="in_biaya" class="form-label">Biaya</label>
                                    <input name="biaya" type="number" class="form-control" id="in_biaya" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="bukti" class="form-label">Bukti</label>
                                    <input name="bukti" type="file" class="form-control" id="bukti" readonly>
                                </div>
                                <div style="padding-left: 80%;">
                                    <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <script>
            function Biayanya(){
                // (document.(id form).(id input / select).value)
                var js_vaksin = document.tambah_peserta.in_vaksin.value;
                var umur =document.tambah_peserta.in_umur.value;
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

                document.tambah_peserta.in_biaya.value = total_bayar;
            }

            function Validasi(){
                var nik = document.tambah_peserta.in_nik.value;

                if(nik.length != 16){
                    window.alert("NIK tidak valid!!")
                }
            }

            function ConfirmDownload() {
                if (confirm('Convert To Excel?')) {
                    window.location.href = 'export_excel.php';
                }
            }
        </script>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/jdatatables-simple-demo.js"></script>
    </body>
</html>
