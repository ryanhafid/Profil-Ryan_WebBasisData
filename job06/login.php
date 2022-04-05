<?php
session_start();
require 'function.php';

// cek sesi
if (isset($_SESSION["peternak"])) {
    header("Location: peternak/index.php");
} else if (isset($_SESSION["penjual"])) {
    header("Location: penjual/index.php");
} else if (isset($_SESSION["admin"])) {
    header("Location: admin/index.php");
} else {
}


// cek cookie
if (isset($_COOKIE["id"]) && isset($_COOKIE['ryan'])) {
    $id = $_COOKIE["id"];
    $ryan = $_COOKIE['ryan'];

    // ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
    $data = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if ($ryan === hash('sha256', $data['username'])) {
        $_SESSION['login'] = true;
    }
}

// waktu
date_default_timezone_set('Asia/Jakarta'); // change according timezone
$currentTime = date('d-m-Y h:i:s A', time());



// if (isset($_SESSION["login"])) {
//     header("Location: index.php");
//     exit;
// }

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    //memeriksa hasil dari query, keluarannya adalah integer 0 apabila tidak ditemukan data
    $num = mysqli_num_rows($result);
    // num nilai nya 1 jika ada username di database
    $fetch = mysqli_fetch_row($result);
    // fetch array (12) {[0] => string} eusi we kabeh
    $data = mysqli_fetch_assoc($result);

    // cek username
    if ($num === 0) {
        echo
            "<div class='alert alert-danger alert-dismissible' role='alert'>
             <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span> Silahkan Cek Username dan Password Anda.
            </div>";
    } else {
        // cek password
        if (password_verify($password, $fetch[1])) {
            // login multi level user
            // jika user login sebagai penjual
            if ($fetch[2] == "peternak") {
                // buat sesi login dan username
                $_SESSION['username'] = $username;
                $_SESSION['id_grup'] = "peternak";
                $_SESSION["login"] = true;
                $_SESSION["peternak"] = true;

                // cek remember me
                if (isset($_POST['remember'])) {
                    // buat cookie
                    setcookie('id', $data['id'], time() + 60);
                    setcookie('ryan', hash('sha256', $data['username']), time() + 60);
                }

                echo
                    "<div class='alert alert-danger alert-dismissible' role='alert'>
                <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span> SELAMAT DATANG
                </div>";
                // alihkan ke halaman peternak
                header('location:peternak/index.php');

                // jika user login sebagai penjual
            } else if ($fetch[2] == "penjual") {
                $_SESSION['username'] = $username;
                $_SESSION['id_grup'] = "penjual";
                $_SESSION["login"] = true;
                $_SESSION["penjual"] = true;


                // cek remember me
                if (isset($_POST['remember'])) {
                    // buat cookie
                    setcookie('id', $data['id'], time() + 60);
                    setcookie('ryan', hash('sha256', $data['username']), time() + 60);
                }

                echo
                    "<div class='alert alert-danger alert-dismissible' role='alert'>
                <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span> SELAMAT DATANG
                </div>";
                header('location:penjual/index.php');

                // jika user login sebagai admin
            } else if ($fetch[2] == 'admin') {
                $_SESSION['username'] = $username;
                $_SESSION['id_grup'] = "admin";
                $_SESSION["login"] = true;
                $_SESSION["admin"] = true;


                // cek remember me
                if (isset($_POST['remember'])) {
                    // buat cookie
                    setcookie('id', $data['id'], time() + 60);
                    setcookie('ryan', hash('sha256', $data['username']), time() + 60);
                }

                echo
                    "<div class='alert alert-danger alert-dismissible' role='alert'>
                <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span> SELAMAT DATANG
                </div>";
                header('location:admin/index.php');
            } else {
                echo '<div class="alert alert-danger">Upss...!!! Login gagal. Silahkan hubungi admin</div>';
            }
        } else {
            echo '<div class="alert alert-danger">Silahkan Cek Username dan Password Anda.</div>';
        }
    }
    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" href="bootstrap-4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <style>
        body {
            background-color: #00bfff;
        }

        .R {
            background-image: linear-gradient(#00A2E9, white);
        }

        .scroll_up {
            bottom: 20px;
            right: 20px;
        }

        .scroll_up a {
            bottom: 20px;
            right: 20px;
        }

        .scroll_up :active {
            -webkit-transform: translateY(10px);
            transform: translateY(10px);
        }
    </style>
</head>

<body">
    <div class="spinner">
        <div class="spinner-grow text-warning"></div>
        <div class="spinner-grow text-primary"></div>
        <div class="spinner-grow text-success"></div>
        <br>
        <span>Tunggu Sebentar</span>
    </div>
    <h1 class="judul text-center text-white mb-5">HALAMAN LOGIN</h1>

    <?php if (isset($error)) : ?>
        <p style="color: red; font-style:italic">username / password salaha</p>
    <?php endif; ?>

    <!-- formulir login -->
    <!-- for harus nyambung dengan id -->

    <section class="formulir_login">
        <div class="container col-lg-4 text-white">
            <form class="R bg-primary p-5 " action="" method="post">
                <div class="thumbnail">
                    <center><img src="img/R2.gif" height="100" /></center>
                </div>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input autofocus type="text" class="form-control " name="username" id="username" placeholder="masukan username anda" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="masukan password anda">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" name="remember" class="form-check-input" id="remember">
                    <label class="form-check-label" for="remember">Remember me</label>
                </div>
                <button type="submit" class="btn btn-primary btn-block" name="login"><i class="fas fa-sign-in-alt"></i> Login</button>
                <a href="registrasi.php" class="btn btn-success btn-block"><i class="fas fa-user-plus"></i> Registrasi</a>
            </form>

        </div>
    </section>















    <!-- FOOTER HANDAP -->
    <section>
        <div class="bg-warning m-0">
            <div class="hubungi mt-4 text-center">
                <h4 id="kontak">Kontak : </h4>
                <a class="ig" href="https://instagram.com/ryanhafid" target="_blank"> <img src="../img/instagram-btn.svg" target="_blank" alt="instagram" title="instagram" height="30px"></a>
                <a class="yt" href="http://www.youtube.com/c/RyanHafidAlvieHamdi" target="_blank"><img src="../img/youtube-btn.svg" target="_blank" alt="youtube" title="youtube" height="30px"></a>
                <a class="wa" href="https://api.whatsapp.com/send?phone=6281312721640&text=Assalamu'alaikum%0AKak%0ARyan%0A" target="_blank"><img src="../img/whatsapp.svg" target=" _blank" alt="whatsapp" title="whatsapp" height="30px"></a>
                <a class="fb" href="https://www.facebook.com/ryan.h.hamdi" target="_blank"><img src="../img/facebook-btn.svg" target="_blank" alt="facebook" title="facebook" height="30px"></a>
                <a class="tw" href="https://twitter.com/ryan_hafid11" target="_blank"> <img src="../img/twitter-btn.svg" target="_blank" alt="twitter" title="twitter" height="30px"></a>
            </div>
            <a class="scroll_up position-fixed page-scroll" href='#header' title='Back to Top'><img src='../img/scroll_up.png' alt="scroll_up" height="30px" /></a>

            <div class="container text-center p-3">
                <span class="text-center"> Copyright &copy; <?= date('Y') ?> Ryan Hafid Alvie Hamdi </span>
            </div>
        </div>
    </section>
    <!-- FOOTER HANDAP -->










    </body>

</html>