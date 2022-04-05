<?php
session_start();
// memanggil file function.php
require '../function.php';

if (!isset($_SESSION["peternak"])) {
    header("Location: ../logout.php");
    exit;
}


$id = $_GET["id"];

if (hapus($id) > 0) {
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
