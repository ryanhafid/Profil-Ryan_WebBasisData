<?php
session_start();


if (isset($_SESSION["peternak"])) {
    header("Location: peternak/index.php");
} else if (isset($_SESSION["penjual"])) {
    header("Location: penjual/index.php");
} else if (isset($_SESSION["admin"])) {
    header("Location: admin/index.php");
} else {
    header("Location: logout.php");
    exit;
}
