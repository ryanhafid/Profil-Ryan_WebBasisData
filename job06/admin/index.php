<?php
session_start();
// memanggil file function.php
require '../function.php';

// wakut
date_default_timezone_set('Asia/Jakarta'); // change according timezone
$currentTime = date('d-m-Y h:i:s A', time());




if (!isset($_SESSION["admin"])) {
    header("Location: ../logout.php");
    exit;
}
$user = query("SELECT * FROM user");

// tombol cari ditekan
if (isset($_POST["cari"])) {
    $user = cari($_POST["keyword"]);
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

    <h1 class="text-center m-3">DATA USER WEB INI</h1>

    <section class="tabeluser">
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
                    <th>Username</th>
                    <th>Password</th>
                    <th>Id Grup</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Kota</th>
                    <th>Telepon</th>
                    <th>Email</th>
                    <th>Last Login</th>
                    <th>Create Login</th>
                    <th>Stok</th>
                    <th>Harga<br>(Rp) </th>
                    <th>Aksi</th>
                </tr>

                <?php $i = 1; ?>
                <?php foreach ($user as $row) : ?>
                    <tr>
                        <td class="text-center"><?= $i; ?></td>
                        <td><?= $row["username"]; ?></td>
                        <td class="text-center"><?= "***"; ?></td>
                        <td><?= $row["id_grup"]; ?></td>
                        <td><?= $row["nama"]; ?></td>
                        <td><?= $row["alamat"]; ?></td>
                        <td><?= $row["kota"]; ?></td>
                        <td><?= $row["telepon"]; ?></td>
                        <td><?= $row["email"]; ?></td>
                        <td><?= $row["last_login"]; ?></td>
                        <td><?= $row["create_login"]; ?></td>
                        <td><?= $row["stok"]; ?></td>
                        <td><?= $row["harga"]; ?></td>
                        <td>
                            <a href="ubah.php?id=<?= $row["username"]; ?>"> <i class="fas fa-edit"></i></a> ||
                            <a href="hapus.php?id=<?= $row["username"]; ?>" onclick="return confirm('Apa anda yakin ingin menghapusnya?'); "><i class="fas fa-trash-alt"></i></a>
                    </tr>
                    <?php $i++ ?>
                <?php endforeach; ?>

            </table>
        </div>

    </section>

    <h1>Ryan</h1>
    <!-- simpen jquery sebelum script kita -->

</body>

</html>