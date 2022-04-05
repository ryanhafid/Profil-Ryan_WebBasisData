<?php
session_start();
// memanggil file function.php
require '../function.php';

if (!isset($_SESSION["peternak"])) {
    header("Location: ../logout.php");
    exit;
}

// cek apakah tombol submit sudah ditekan apa belum
if (isset($_POST["submit"])) {
    // cek apakah data berhasil di dambahlan atau tidak
    if (tambah($_POST) > 0) {
        echo "
        <script>
            alert('data Berhasil Ditambahkan');
            document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('data GAGAL Ditambahkan');
            document.location.href = 'index.php';
        </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
    <link rel="stylesheet" href="../bootstrap-4.4.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: burlywood;
        }
    </style>
</head>

<body>
    <div class="spinner">
        <div class="spinner-grow text-warning"></div>
        <div class="spinner-grow text-primary"></div>
        <div class="spinner-grow text-success"></div>
        <br>
        <span>Tunggu Sebentar</span>
    </div>
    <h1 class="judul text-center text-primary mb-5">TAMBAH KONDISI KANDANG</h1>
    <!-- Formulir Tambah Data Kondisi Kandang -->
    <section>
        <div class="container col-sm-5 text-white">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <!-- for harus nyambung dengan id -->
                    <label for="kd_peternak">Kode Peternak</label>
                    <input type="text" class="form-control " name="kd_peternak" id="kd_peternak">
                </div>
                <div class="form-group">
                    <label for="suhu_1">Suhu 1</label>
                    <input type="number" class="form-control " name="suhu_1" id="suhu_1">
                </div>
                <div class="form-group">
                    <label for="kelembapan_1">Kelembapan 1</label>
                    <input type="number" class="form-control " name="kelembapan_1" id="kelembapan_1">
                </div>
                <div class="form-group">
                    <label for="suhu_2">Suhu 2</label>
                    <input type="number" class="form-control " name="suhu_2" id="suhu_2">
                </div>
                <div class="form-group">
                    <label for="kelembapan_2">Kelembapan 2</label>
                    <input type="number" class="form-control " name="kelembapan_2" id="kelembapan_2">
                </div>
                <div class="form-group">
                    <label for="suhu_3">Suhu 3</label>
                    <input type="number" class="form-control " name="suhu_3" id="suhu_3">
                </div>
                <div class="form-group">
                    <label for="kelembapan_3">Kelembapan 3</label>
                    <input type="number" class="form-control " name="kelembapan_3" id="kelembapan_3">
                </div>


                <div class="form-group">
                    <label for="jml_ayam">Jumlah Ayam</label>
                    <input type="number" class="form-control " name="jml_ayam" id="jml_ayam">
                </div>
                <div class="form-group">
                    <label for="gambar">Gambar</label>
                    <input type="file" class="form-control-file " name="gambar" id="gambar">
                </div>

                <button type="submit" class="btn btn-dark" name="submit">Tambah Data</button>
            </form>

        </div>
    </section>




</body>

</html>