<?php
session_start();
// memanggil file function.php
require '../function.php';

// wakut
date_default_timezone_set('Asia/Jakarta'); // change according timezone
$currentTime = date('d-m-Y h:i:s A', time());


if (!isset($_SESSION["peternak"])) {
    header("Location: ../logout.php");
    exit;
}
// if (!isset($_SESSION["peternak"])) {
//     header("Location: login.php");
//     exit;
// }
$kondisi_kandang = query("SELECT * FROM kondisi_kandang");

// tombol cari ditekan
if (isset($_POST["cari"])) {
    $kondisi_kandang = cari($_POST["keyword"]);
}
$last_modified = filemtime("index.php");


print("Last Modified ");

print(date("m/j/y H:i", $last_modified));
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman PETERNAK</title>
    <link rel="stylesheet" href="../bootstrap-4.4.1/css/bootstrap.min.css">
    <!-- pemanggilan jquery sebelum script yang kita buat -->
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/script.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <style>
        th,
        td {
            font-size: 15px
        }
    </style>
</head>

<body>
    <a href="../logout.php" class="logout m-3"><button type="submit" class="btn btn-primary" name="logout">Logout</button></a>

    <h1 class="text-center m-3">PETERNAK KONDISI KANDANG AYAM</h1>

    <section class="kondisikandang">
        <div class="container">
            <a href="tambah.php" class="tambah">Tambah data</a>
            <br><br>
            <form action="" method="post" class="mb-2">
                <input type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian" autocomplete="off" id="keyword">
                <button type="submit" name="cari" id="tombol-cari">Cari </button>
                <img src="../img/loader.gif" class="loader" width="30px" style="display: none; position: absolute">
            </form>
        </div>
        <div class="table-responsive text-center col-sm-12" id="container">
            <table border="1" cellpadding="10" cellspacing="0">
                <tr class="bg-dark text-white">
                    <th>No.</th>
                    <th>Kode Peternak</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Suhu 1</th>
                    <th>Kelembapan 1</th>
                    <th>Suhu 2</th>
                    <th>Kelembapan 2</th>
                    <th>Suhu 3</th>
                    <th>Kelembapan 3</th>
                    <th>Jumlah Ayam</th>
                    <th>Foto Ayam</th>
                    <th>Aksi</th>
                </tr>

                <?php $i = 1; ?>
                <?php foreach ($kondisi_kandang as $row) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $row["kd_peternak"]; ?></td>
                        <td><?= $row["tgl"]; ?></td>
                        <td><?= $row["waktu"]; ?></td>
                        <td><?= $row["suhu_1"]; ?></td>
                        <td><?= $row["kelembapan_1"]; ?></td>
                        <td><?= $row["suhu_2"]; ?></td>
                        <td><?= $row["kelembapan_2"]; ?></td>
                        <td><?= $row["suhu_3"]; ?></td>
                        <td><?= $row["kelembapan_3"]; ?></td>
                        <td><?= $row["jml_ayam"]; ?></td>
                        <td><img src="../img/ayam/<?= $row["gambar"]; ?> " width="150px" alt=gambar> </td>
                        <td>
                            <a href="ubah.php?id=<?= $row["id"]; ?>"> <i class="fas fa-edit"></i></a> ||
                            <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Apa anda yakin ingin menghapusnya?'); "><i class="fas fa-trash-alt"></i></a>
                    </tr>
                    <?php $i++ ?>
                <?php endforeach; ?>

            </table>
        </div>

    </section>

    <!-- simpen jquery sebelum script kita -->

</body>

</html>