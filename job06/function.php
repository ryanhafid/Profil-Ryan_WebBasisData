<?php
// konekasi ke database
$servername = "localhost";
$username = "root";
$password = "sandinya0101ya";
$dbname = "peternakan_ayam";
// Sambungkan ke database
$conn = mysqli_connect("$servername", "$username", "$password", "$dbname");

// Check connection
if (!$conn) {
    die("TIDAK TERHUBUNG KE DATABASE: " . mysqli_connect_error());
}

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    global $conn;
    $kd_peternak = htmlspecialchars($data["kd_peternak"]);
    $suhu_1 = htmlspecialchars($data["suhu_1"]);
    $kelembapan_1 = htmlspecialchars($data["kelembapan_1"]);
    $suhu_2 = htmlspecialchars($data["suhu_2"]);
    $kelembapan_2 = htmlspecialchars($data["kelembapan_2"]);
    $suhu_3 = htmlspecialchars($data["suhu_3"]);
    $kelembapan_3 = htmlspecialchars($data["kelembapan_3"]);
    $jml_ayam = htmlspecialchars($data["jml_ayam"]);
    // Upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    // query insert data
    $query = "INSERT INTO kondisi_kandang
            VALUES
            ('', '$kd_peternak', CURDATE(), CURTIME() , '$suhu_1', '$kelembapan_1', '$suhu_2', '$kelembapan_2', 
            '$suhu_3', '$kelembapan_3', '$jml_ayam', '$gambar' )
            ";
    mysqli_query($conn, "$query");
    return mysqli_affected_rows($conn);
}

// UPLOAD
function upload()
{

    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gamabr yg diupload
    if ($error === 4) {
        echo "
        <script>
            alert('Pilih Gambar Terlebih Dahulu');
            document.location.href = '';
        </script>";
        return false;
    }

    // cek apakah yg diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'gif'];
    // explode utk memecah sebuah stirng jadi array
    $ekstensiGambar = explode('.', $namaFile);
    // strtolower utk mengubah string jadi kecil semua 
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "
        <script>
            alert('Yang Anda Upload bukan gambar');
        </script>";
        return false;
    }

    // cek jika ukurannyateralalu besar dalam byte
    if ($ukuranFile > 1000000) {
        echo "
        <script>
            alert('Ukuran gambar teralu besar');
        </script>";
        return false;
    }

    // lolos cek, gambar siap diupload
    $waktukirim = date("YmdHis");
    // generate nama gambar baru

    $namaFileBaru = 'ayam';
    $namaFileBaru .= $waktukirim;
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../img/ayam/' . $namaFileBaru);

    return $namaFileBaru;
}



function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM kondisi_kandang WHERE id =$id");
    return mysqli_affected_rows($conn);
}



function ubah($data)
{
    global $conn;
    $id = $data["id"];
    $kd_peternak = htmlspecialchars($data["kd_peternak"]);
    $suhu_1 = htmlspecialchars($data["suhu_1"]);
    $kelembapan_1 = htmlspecialchars($data["kelembapan_1"]);
    $suhu_2 = htmlspecialchars($data["suhu_2"]);
    $kelembapan_2 = htmlspecialchars($data["kelembapan_2"]);
    $suhu_3 = htmlspecialchars($data["suhu_3"]);
    $kelembapan_3 = htmlspecialchars($data["kelembapan_3"]);
    $jml_ayam = htmlspecialchars($data["jml_ayam"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // cek apakah user pilih gambar baru atau tidak
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    // query insert data
    $query = "UPDATE kondisi_kandang SET
            kd_peternak = '$kd_peternak',
            tgl = CURDATE(),
            waktu = CURTIME(),
            suhu_1 = '$suhu_1',
            kelembapan_1 = '$kelembapan_1',
            suhu_2 = '$suhu_2',
            kelembapan_2 = '$kelembapan_2',
            suhu_3 = '$suhu_3',
            kelembapan_3 = '$kelembapan_3',
            jml_ayam = '$jml_ayam',
            gambar = '$gambar'
        WHERE id = $id 
            ";
    mysqli_query($conn, "$query");

    return mysqli_affected_rows($conn);
}



function cari($keyword)
{
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
    return query($query);
}

function registrasi($data)
{
    global $conn;
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    $id_grup = $data["id_grup"];
    $nama = htmlspecialchars($data["nama"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $kota = htmlspecialchars($data["kota"]);
    $telepon = htmlspecialchars($data["telepon"]);
    $email = htmlspecialchars($data["email"]);
    $stok = htmlspecialchars($data["stok"]);
    $harga = htmlspecialchars($data["harga"]);


    // cek username sdh ada atau belum
    $result =    mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('username yang dipilih sudah terdaftar!')
        </script>";
        return false;
    }

    // cek konfirmasi password
    if ($password !== $password2) {
        echo " <script>
            alert('konfirmasi password tidak sesuai!');
        </script>";
        return false;
    }

    // enkripsi password
    // md5() password_hash
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user baru ke database
    mysqli_query($conn, "INSERT INTO user VALUES ('$username', '$password', '$id_grup', '$nama', '$alamat', '$kota', '$telepon', '$email', '', NOW() , '$stok', '$harga' )");

    return mysqli_affected_rows($conn);
}


// FOLDER ADMIN
function tambahadmin($data)
{
    global $conn;
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    $id_grup = $data["id_grup"];
    $nama = htmlspecialchars($data["nama"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $kota = htmlspecialchars($data["kota"]);
    $telepon = htmlspecialchars($data["telepon"]);
    $email = htmlspecialchars($data["email"]);
    $stok = htmlspecialchars($data["stok"]);
    $harga = htmlspecialchars($data["harga"]);


    // cek username sdh ada atau belum
    $result =    mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('username yang dipilih sudah terdaftar!')
        </script>";
        return false;
    }

    // cek konfirmasi password
    if ($password !== $password2) {
        echo " <script>
            alert('konfirmasi password tidak sesuai!');
        </script>";
        return false;
    }

    // enkripsi password
    // md5() password_hash
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user baru ke database
    mysqli_query($conn, "INSERT INTO user VALUES ('$username', '$password', '$id_grup', '$nama', '$alamat', '$kota', '$telepon', '$email', '', NOW() , '$stok', '$harga' )");

    return mysqli_affected_rows($conn);
}

function ubahadmin($data)
{
    global $conn;
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    $id_grup = $data["id_grup"];
    $nama = htmlspecialchars($data["nama"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $kota = htmlspecialchars($data["kota"]);
    $telepon = htmlspecialchars($data["telepon"]);
    $email = htmlspecialchars($data["email"]);
    $stok = htmlspecialchars($data["stok"]);
    $harga = htmlspecialchars($data["harga"]);


    $result =    mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");


    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('username yang dipilih sudah terdaftar!')
        </script>";
        return false;
    }

    // cek konfirmasi password
    if ($password !== $password2) {
        echo " <script>
            alert('konfirmasi password tidak sesuai!');
        </script>";
        return false;
    }

    // enkripsi password
    // md5() password_hash
    $password = password_hash($password, PASSWORD_DEFAULT);


    // query insert data
    $query = "UPDATE user SET
            password = '$password',
            id_grup = '$id_grup',
            nama = '$nama',
            alamat = '$alamat',
            kota = '$kota',
            telepon = '$telepon',
            email = '$email',
            last_login = NOW(),
            stok = '$stok',
            harga = '$harga'
        WHERE username = $username 
            ";
    mysqli_query($conn, "$query");

    return mysqli_affected_rows($conn);
}


function hapusadmin($username)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM user WHERE username =$username");
    return mysqli_affected_rows($conn);
}
