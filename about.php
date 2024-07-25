<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Me</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        body{
            justify-content: center;
            align-items: center;
        }
        .card img{
            width: 350px;
            height: 500px;
            padding: 10px;
            border-radius: 20px;
        }

        .identitas{
            padding: 10px 20px 20px 40px;
        }
        
        .sosial-media{
            display: flex;
            margin-top: 25%;
            gap: 10px;
            justify-content: end;
            padding-top: 10px;
        }

        .sosial-media i{
            font-size: 24px; 
            color: black;
        }

        

    </style>
</head>
<body>
    <nav>
        <div style="display: flex; justify-content: center; align-items: center;">
            <h1 style="margin-right: 50px;">JWD</h1> 
            <div style="gap: 0; margin-left: -40px;">
                <p style="margin: 0; padding: 0; line-height: 1;">Junior Web</p> 
                <p style="margin: 0; padding: 0; line-height: 1;">Development</p>
            </div>
        </div>
        <div style="margin-left: 20%;">
            <ul>
                <a href="home.php">Home</a>
                <a href="https://github.com/Yusuf-Naufal">Contack</a>
                <a href="about.php">About Me</a>
            </ul>
        </div>
    </nav>
    
    <section style="display: flex;">
        <div class="card" style="width: 80%;">
            <div style="display: flex">
                <img src="assets/profile.jpg" style="object-fit: cover;">
                <div class="identitas">
                    <h1 style="font-weight: 600;">Yusuf Naufal Zuhdi</h1>
                    <p>Mahasiswa semester 4 yang sedang mengikuti pelatihan Junior Web Development yang diadakan oleh Vocational School Graduate Academy dan dilaksanakan
                        di Politeknik Negeri Cilacap pada tanggal 22 - 26 Juni 2024
                    </p>
                    <div>
                        <table style="width: 100%;">
                            <tr>
                                <th>Alamat</th>
                                <td>:</td>
                                <td>Tamab Patra Indah Blok H No.20</td>
                            </tr>
                            <tr>
                                <th>Hobi</th>
                                <td>:</td>
                                <td>Menabung, Sholat, Mengaji</td>
                            </tr>
                            <tr>
                                <th>Skill</th>
                                <td>:</td>
                                <td>Main Badminton, Exp Liner</td>
                            </tr>
                            <tr>
                                <th>Harapan</th>
                                <td>:</td>
                                <td>Semoga mendapatkan sertifikat dan dinyatakan kompeten</td>
                            </tr>
                        </table>
                    </div>
                    <div class="sosial-media">
                        <p>Contact me : </p>
                        <a href="https://www.instagram.com/boiezs/"><i class="bi bi-instagram"></i></a>
                        <a href="https://www.tiktok.com/@nopall1541"><i class="bi bi-tiktok"></i></a>
                        <a href="mailto:nopalnopal54@gmail.com"><i class="bi bi-envelope-at-fill"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>
</html>