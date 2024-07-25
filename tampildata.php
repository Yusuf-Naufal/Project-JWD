<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" name="formtampil" onsubmit="return TampilData()">
        <input type="text" name="nama" id="in_nama" placeholder="Masukkan nama">
        <input type="text" name="nomor" id="in_nomor" placeholder="Masukkan nomor">
        <input type="date" name="tanggal" id="in_tanggal">
        <select name="jenis_kelamin" id="in_jenis_kelamin">
            <option value="laki-laki">Laki-laki</option>
            <option value="perempuan">Perempuan</option>
        </select>
        <button type="submit">Tampil</button>
    </form>

    <script>
        function TampilData() {
            var nama = document.getElementById('in_nama').value;
            var nomor = document.getElementById('in_nomor').value;
            var tanggal = document.getElementById('in_tanggal').value;
            var jenis_kelamin = document.getElementById('in_jenis_kelamin').value;

            window.alert("Nama: " + nama + "\nNomor: " + nomor + "\nTanggal: " + tanggal + "\nJenis Kelamin: " + jenis_kelamin);

            // Mencegah pengiriman formulir
            return false;
        }
    </script>
</body>
</html>
