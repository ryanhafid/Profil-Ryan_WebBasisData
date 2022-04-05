<?php
require '../function.php';


$keyword = $_GET["keyword"];

$query = "SELECT * FROM kondisi_kandang
WHERE
kd_peternak LIKE '%$keyword%' OR
tgl LIKE '%$keyword%' OR
waktu LIKE '%$keyword%' OR
suhu_1 LIKE '%$keyword%' OR
kelembapan_1 LIKE '%$keyword%' OR
suhu_2 LIKE '%$keyword%' OR
kelembapan_2 LIKE '%$keyword%' OR
suhu_3 LIKE '%$keyword%' OR
kelembapan_3 LIKE '%$keyword%' OR
jml_ayam LIKE '%$keyword%' 

";
$kondisi_kandang = query($query);


?>
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
                <a href="ubah.php?id=<?= $row["id"]; ?>">ubah</a> ||
                <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Apa anda yakin ingin menghapusnya?'); ">hapus</a>
        </tr>
        <?php $i++ ?>
    <?php endforeach; ?>

</table>