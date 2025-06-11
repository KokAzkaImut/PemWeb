<?php

    $koneksi = mysqli_connect ("localhost:3307","root","","pemweb");

    if (! $koneksi) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    $query = "SELECT * FROM mahasiswa";
    $result = mysqli_query($koneksi, $query);   /// Object

    /// ambil data dai result

    $mhs = mysqli_fetch_assoc($result);  /// Array Asosiatif
    /// mysqli_fetch_assoc() untuk mengambil data sebagai array asosiatif
    /// mysqli_fetch_row() untuk mengambil data sebagai array numerik
    /// mysqli_fetch_array() untuk mengambil data sebagai array asosiatif dan numerik
    /// mysqli_fetch_object() untuk mengambil data sebagai objek

    var_dump($mhs);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATA MAHASISWA</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <nav align="center">
        <a href="index.php">HOME</a> | 
        <a href="profile.php">PROFILE</a> |
        <a href="about.php">ABOUT US</a> |
        <a href="login.php">LOGIN</a>
    </nav>

    <h1 align="center">DATA MAHASISWA INFORMATIKA 2023 KELAS B</h1>
    <table border="1" cellspacing="0" cellpadding="10px" align="center">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Nim</th>
            <th>Jurusan</th>
            <th>No.HP</th>
        </tr>
    </table>
    
</body>
</html>