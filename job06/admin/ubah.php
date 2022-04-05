<?php
session_start();
// memanggil file function.php
require '../function.php';

if (!isset($_SESSION["admin"])) {
    header("Location: ../logout.php");
    exit;
}
// ambil data di URL
$username = $_GET["id"];

// query data user berdasarkan username nya
$usr = query("SELECT * FROM user WHERE username='$username'")[0];
// cek apakah tombol submit ditekan apa belum

if (isset($_POST["submit"])) {

    // cek apakah data berhasil diubah atau tidak
    if (ubahadmin($_POST) > 0) {
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
    <title>Ubah Data USER</title>
    <link rel="stylesheet" href="../bootstrap-4.4.1/css/bootstrap.min.css">
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


    <!-- Formulir Ubah Data Kondisi USER -->
    <section>
        <div class="container col-sm-5">

            <form action="" method="post">
                <div class="form-group">
                    <div class="form-group">
                        <!-- for harus nyambung dengan id -->
                        <label for="username">Username</label>
                        <input type="" class="form-control " name="username" id="username" required value="<?= $usr["username"]; ?>" disabled>
                    </div>
                    <div class=" form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" value="<?= $usr["password"]; ?>">
                    </div>
                    <div class=" form-group">
                        <label for="password2">Konfirmasi Password</label>
                        <input type="password" class="form-control" name="password2" id="password2" value="<?= $usr["password"]; ?>">
                    </div>
                    <fieldset class=" form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-3 pt-0">Sebagai </legend>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="id_grup" id="id_grup" value="peternak" checked>
                                    <label class="form-check-label" for="id_grup">
                                        peternak
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="id_grup" id="id_grup" value="penjual">
                                    <label class="form-check-label" for="id_grup">
                                        penjual
                                    </label>
                                </div>

                            </div>
                        </div>
                    </fieldset>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control " name="nama" id="nama" required value="<?= $usr["nama"]; ?>">
                    </div>
                    <div class=" form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control " name="alamat" id="alamat" required value="<?= $usr["alamat"]; ?>">
                    </div>
                    <div class=" form-group">
                        <label for="kota">Kota</label>
                        <input type="text" class="form-control " name="kota" id="kota" required value="<?= $usr["kota"]; ?>">
                    </div>
                    <div class=" form-group">
                        <label for="telepon">Nomor Telepon</label>
                        <input type="number" minlength="9" class="form-control " name="telepon" id="telepon" required value="<?= $usr["telepon"]; ?>" </div> <div class=" form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control " name="email" id="email" required value="<?= $usr["email"]; ?>">
                    </div>
                    <div class=" form-group">
                        <label for="stok">Stok</label>
                        <input type="number" class="form-control " name="stok" id="stok" required value="<?= $usr["stok"]; ?>">
                    </div>
                    <div class=" form-group">
                        <label for="harga">Harga</label>
                        <input type="text" class="form-control " name="harga" id="harga" required value="<?= $usr["harga"]; ?>">
                    </div>
                    <button type=" submit" class="btn btn-dark" name="submit">Ubah Data</button>
            </form>
        </div>
    </section>



</body>

</html>