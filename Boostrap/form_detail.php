<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Detail Data</title>
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
            border: 2px solid black;
            width: 570px;
            padding: 10px 20px 10px 20px;
            display: inline-block;
        }
        
        .container {
            display: flex;
        }

        .container div {
            display: flex;
        }
        .card img{
            width: 350px;
            height: 500px;
            padding: 10px ;
            border-radius: 20px;
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

        $TampilData = $model->DetailData($nik);

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

    <section >
        <div class="card" style="width: 56%;">
            <div class="container">
                <img src="bukti/<?php echo $TampilData['bukti']?>" alt="">
                <div style="display: block; padding: 20px;">
                    <div class="card" style="width: 100%;">
                    <h1 style="font-weight: 600; text-align: center;"><?php echo $TampilData['nik'] ?></h1>
                    </div>
                    <table style="width: 100%; height: 80%; margin-top: 10px;">
                        <tr>
                            <th>Nama</th>
                            <td>:</td>
                            <td><?php echo $TampilData['nama'] ?></td>
                        </tr>
                        <tr>
                            <th>Umur</th>
                            <td>:</td>
                            <td><?php echo $TampilData['umur'] ?></td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td>:</td>
                            <td><?php echo $TampilData['nama'] ?></td>
                        </tr>
                        <tr>
                            <th>Riwayat Penyakir</th>
                            <td>:</td>
                            <td><?php echo $TampilData['riwayat_penyakit'] ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td>:</td>
                            <td><?php echo $TampilData['tanggal'] ?></td>
                        </tr>
                        <tr>
                            <th>Jenis Vaksin</th>
                            <td>:</td>
                            <td><?php echo $TampilData['jenis_vaksin'] ?></td>
                        </tr>
                        <tr>
                            <th>Biaya</th>
                            <td>:</td>
                            <td><?php echo $TampilData['biaya'] ?></td>
                        </tr> 
                    </table>
                </div>
            </div>
        </div>
        <a href="kesehatan.php" type="button" class="btn btn-primary">Kembalii</a>
    </section>
    
</body>
</html>