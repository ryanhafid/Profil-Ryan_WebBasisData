<?php
// memanggil file function.php
session_start();
require 'function.php';


if (isset($_SESSION["peternak"])) {
    header("Location: peternak/index.php");
} else if (isset($_SESSION["penjual"])) {
    header("Location: penjual/index.php");
} else if (isset($_SESSION["admin"])) {
    header("Location: admin/index.php");
} else {
}


// cek apakah tombol submit sudah ditekan apa belum
if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo "<script>
            alert('Registrasi Berhasil');
        </script>";
        header("Location: logout.php");
    } else {
        echo mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="bootstrap-4.4.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: cornflowerblue;
        }

        label {
            display: block;
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
    <h1 class="judul text-center text-white mb-5">HALAMAN REGISTRASI</h1>

    <!-- Formulir Registrasi -->
    <section>
        <div class="container col-sm-6 text-white">
            <form action="" method="post">
                <div class="form-group">
                    <!-- for harus nyambung dengan id -->
                    <label for="username">Username</label>
                    <input type="text" class="form-control " name="username" id="username" placeholder="masukan username anda" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="masukan password anda" required>
                </div>
                <div class="form-group">
                    <label for="password2">Konfirmasi Password</label>
                    <input type="password" class="form-control" name="password2" id="password2" placeholder="masukan password anda" required>
                </div>
                <fieldset class="form-group">
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
                    <input type="text" class="form-control " name="nama" id="nama" placeholder="masukan nama anda" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control " name="alamat" id="alamat" placeholder="masukan alamat anda" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="kota">Kota</label>
                    <input type="text" class="form-control " name="kota" id="kota" placeholder="masukan kota anda" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="telepon">Nomor Telepon</label>
                    <input type="number" minlength="9" class="form-control " name="telepon" id="telepon" placeholder="masukan telepon anda" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control " name="email" id="email" placeholder="masukan email anda" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="stok">Stok</label>
                    <input type="number" class="form-control " name="stok" id="stok" placeholder="masukan stok yang tersedia" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="text" class="form-control " name="harga" id="harga" placeholder="masukan harga" autocomplete="off" required>
                </div>


                <button type="submit" class="btn btn-dark" name="register">Register</button>
            </form>

        </div>
    </section>

    <section>
        <div class="container">
            <p class="text-center">SUDAH PUNYA AKUN | <a href="login.php" class="bg-white text-dark text-center">LOGIN</a></p>
        </div>
    </section>


</body>

</html>