<?php
session_start();
// memanggil file function.php
require '../function.php';

if (!isset($_SESSION["admin"])) {
    header("Location: ../logout.php");
    exit;
}


$username = $_GET["username"];

if (hapusadmin($username) > 0) {
    echo "
    <script>
        alert('data Berhasil Dihapuskan');
        document.location.href = 'index.php';
    </script>
    ";
} else {
    echo "
    <script>
        alert('data GAGAL Dihapuskan');
        document.location.href = 'index.php';
    </script>";
}
