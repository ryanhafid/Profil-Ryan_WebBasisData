<?php
session_start();
require '../function.php';

if (!isset($_SESSION["penjual"])) {
    header("Location: ../logout.php");
    exit;
}
// if (!isset($_SESSION["penjual"])) {
//     header("Location: login.php");
//     exit;
// }

$transaksi = query("SELECT * FROM transaksi");

// tombol cari ditekan
if (isset($_POST["cari"])) {
    $transaksi = cari($_POST["keyword"]);
}
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
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

    <h1 class="text-center m-3">TRANSAKSI</h1>

    <section class="kondisikandang">
        <div class="container">
            <a href="tambah.php" class="tambah">Tambah data</a>
            <br><br>
            <form action="" method="post" class="mb-2">
                <input type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian" autocomplete="off" id="keyword">
                <button type="submit" name="cari" id="tombol-cari">Cari </button>
                <img src="img/loader.gif" class="loader" width="30px" style="display: none; position: absolute">
            </form>
        </div>
        <div class="table-responsive text-center col-sm-12" id="container">
            <table border="1" cellpadding="10" cellspacing="0">
                <tr class="bg-dark text-white">
                    <th>No.</th>
                    <th>Kode Peternak</th>
                    <th>Kode Penjual</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>
                <?php $i = 1; ?>
                <?php foreach ($transaksi as $row) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $row["kd_peternak"]; ?></td>
                        <td><?= $row["kd_penjual"]; ?></td>
                        <td><?= $row["tgl"]; ?></td>
                        <td><?= $row["waktu"]; ?></td>
                        <td><?= $row["jml"]; ?></td>
                        <td><?= $row["harga"]; ?></td>
                        <td><?= $row["total"]; ?></td>
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