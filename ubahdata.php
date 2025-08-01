<?php

    require 'function.php';
    $id = $_GET["id"]; // Ambil ID dari URL
    $mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];



    if (isset($_POST["submit"])) {
        
       
        
        if (ubahdata($_POST, $id) > 0) 
        {
            echo "
            <script>
                alert('Data berhasil diubah!');
                document.location.href = '../datamahasiswa.php';
            </script>
            ";
        } 
        else {
            echo "
            <script>
                alert('Data gagal diubah!');
                document.location.href = '../ubahdata.php';
            </script> " . mysqli_error($koneksi);
        }
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1 align="center">Ubah Data Mahasiswa</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" required value="<?= $mhs ["nama"]?>"><br>

        <label for="nim">NIM:</label>
        <input type="text" name="nim" id="nim" required value="<?= $mhs ["nim"]?>"><br>

        <label for="jurusan">Jurusan:</label>
        <input type="text" name="jurusan" id="jurusan" required value="<?= $mhs ["jurusan"]?>"><br>

        <label for="nohp">No. HP:</label>
        <input type="text" name="nohp" id="nohp" required value="<?= $mhs ["nohp"]?>"><br>

        <label for="foto">Foto:</label>
        <input type="file" name="foto" id="foto" accept=".jpg, .jpeg, .png"><br>

        <button type="submit" name="submit">Ubah Data</button>
    </form>
    
</body>
</html>