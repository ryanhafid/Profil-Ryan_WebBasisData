<?php
session_start();
// memanggil file function.php
require 'function.php';
date_default_timezone_set('Asia/Jakarta');

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

// ti fungsi
function logout($data)
{
    global $conn;
    $_SESSION['login'] == "";
    $ldate = date('Y-m-d H:i:s', time());

    $username = $_GET["username"];
    // query insert data
    $query = "UPDATE user SET 
            last_login = '$ldate'
        WHERE username = '" . $_SESSION['login'] . "' 
            ";
    mysqli_query($conn, "$query");
    return mysqli_affected_rows($conn);
}
// functions

$password = $_GET["password"];

// query data user berdasarkan password nya
$kdg = query("SELECT * FROM user WHERE password=$password")[0];
// cek apakah tombol submit ditekan apa belum
var_dump($_POST);
if (isset($_POST["submit"])) {

    // cek apakah data berhasil diubah atau tpasswordak
    if (ubah($_POST) > 0) {
        echo "
        <script>
            alert('LOGOUT BERHASIL');
        </script>
        ";
    } else {
        echo "
        <script>
            alert('GAGAL LOGOUT');
        </script>
        ";
    }
}



$_SESSION = [];
session_unset();
session_destroy();

setcookie('id', '', time() - 3600);
setcookie('ryan', '', time() - 3600);

header("Location: login.php");
exit;
