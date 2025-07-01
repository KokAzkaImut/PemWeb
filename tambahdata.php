<?php

    require 'function.php';

    if (isset($_POST["submit"])) {
        $nama = $_POST["nama"];
        $nim = $_POST["nim"];
        $jurusan = $_POST["jurusan"];
        $nohp = $_POST["nohp"];
        
        // Proses upload foto
        
        // Query untuk memasukkan data ke database
       
        
        if (tambahmahasiswa($_POST) > 0) 
        {
            echo "
            <script>
                alert('Data berhasil ditambahkan!');
                document.location.href = 'datamahasiswa.php';
            </script>
            ";
        } 
        else {
            echo "
            <script>
                alert('Data gagal ditambahkan!');
                document.location.href = 'tambahdata.php';
            </script> " . mysqli_error($koneksi);
        }
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1 align="center">Tambah Data Mahasiswa</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" required><br>

        <label for="nim">NIM:</label>
        <input type="text" name="nim" id="nim" required><br>

        <label for="jurusan">Jurusan:</label>
        <input type="text" name="jurusan" id="jurusan" required><br>

        <label for="nohp">No. HP:</label>
        <input type="text" name="nohp" id="nohp" required><br>

        <label for="foto">Foto:</label>
        <input type="file" name="foto" id="foto" accept=".jpg, .jpeg, .png"><br>

        <button type="submit" name="submit">Tambah Data</button>
    </form>
    
</body>
</html>