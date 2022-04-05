<?php
session_start();
require '../function.php';

if (!isset($_SESSION["penjual"])) {
    header("Location: ../logout.php");
    exit;
}
// ambil data di URL
$id = $_GET["id"];

// query data kondisi_kandang berdasarkan id nya
$kdg = query("SELECT * FROM kondisi_kandang WHERE id=$id")[0];
// cek apakah tombol submit ditekan apa belum
if (isset($_POST["submit"])) {

    // cek apakah data berhasil diubah atau tidak
    if (ubah($_POST) > 0) {
        echo "
        <script>
            alert('data Berhasil Diubahkan');
            document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('data GAGAL Diubahkan');
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
    <title>Ubah Data Kandang</title>
    <link rel="stylesheet" href="bootstrap-4.4.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: blanchedalmond;
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


    <h1 class="text-center m-3">Ubah Data Mahasiswa</h1>


    <!-- Formulir Ubah Data Kondisi Kandang -->
    <section>
        <div class="container col-sm-5">

            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $kdg["id"]; ?> ">
                <input type="hidden" name="gambarLama" value="<?= $kdg["gambar"]; ?> ">
                <div class="form-group">
                    <!-- for harus nyambung dengan id -->
                    <label for="kd_peternak">Kode Peternak</label>
                    <input type="text" class="form-control " name="kd_peternak" id="kd_peternak" required value="<?= $kdg["kd_peternak"]; ?> ">
                </div>
                <div class="form-group">
                    <label for="tgl">Tanggal</label>
                    <input type="date" class="form-control" name="tgl" id="tgl" required value="<?= $kdg["tgl"]; ?>"">
                </div>
                <div class=" form-group">
                    <label for="waktu">Waktu</label>
                    <input type="time" class="form-control " name="waktu" id="waktu" required value="<?= $kdg["waktu"]; ?>">
                </div>
                <div class=" form-group">
                    <label for="suhu_1">Suhu 1</label>
                    <input type="text" class="form-control " name="suhu_1" id="suhu_1" required value="<?= $kdg["suhu_1"]; ?>">
                </div>
                <div class=" form-group">
                    <label for="kelembapan_1">Kelembapan 1</label>
                    <input type="text" class="form-control " name="kelembapan_1" id="kelembapan_1" required value="<?= $kdg["kelembapan_1"]; ?>">
                </div>
                <div class=" form-group">
                    <label for="suhu_2">Suhu 2</label>
                    <input type="text" class="form-control " name="suhu_2" id="suhu_2" required value="<?= $kdg["suhu_2"]; ?>">
                </div>
                <div class=" form-group">
                    <label for="kelembapan_2">Kelembapan 2</label>
                    <input type="text" class="form-control " name="kelembapan_2" id="kelembapan_2" required value="<?= $kdg["kelembapan_2"]; ?>">
                </div>
                <div class=" form-group">
                    <label for="suhu_3">Suhu 3</label>
                    <input type="text" class="form-control " name="suhu_3" id="suhu_3" required value="<?= $kdg["suhu_3"]; ?>">
                </div>
                <div class=" form-group">
                    <label for="kelembapan_3">Kelembapan 3</label>
                    <input type="text" class="form-control " name="kelembapan_3" id="kelembapan_3" required value="<?= $kdg["kelembapan_3"]; ?>">
                </div>
                <div class=" form-group">
                    <label for="jml_ayam">Jumlah Ayam</label>
                    <input type="text" class="form-control " name="jml_ayam" id="jml_ayam" required value="<?= $kdg["jml_ayam"]; ?>">
                </div>
                <div class=" form-group">

                    <label for="gambar">Gambar :</label> <br>
                    <img src="img/ayam/<?= $kdg['gambar']; ?>" width="200px"> <br>
                    <input type="file" lass="form-control" name="gambar" id="gambar">
                </div>
                <button type="submit" class="btn btn-dark" name="submit">Ubah Data</button>
            </form>
        </div>
    </section>



</body>

</html>