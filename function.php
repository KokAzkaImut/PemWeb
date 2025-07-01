<?php

    $koneksi = mysqli_connect ("localhost:3307","root","","pemweb");

    if (! $koneksi) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    function query($query)
    {
        global $koneksi;
        $result = mysqli_query($koneksi, $query);  

        $rows= [];
        while ($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    function tambahmahasiswa($data)
    {
        global $koneksi;

        $nama = $data["nama"];
        $nim = $data["nim"];
        $jurusan = $data["jurusan"];
        $nohp = $data["nohp"];
        if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
            $foto = $_FILES['foto']['name'];
            move_uploaded_file($_FILES['foto']['tmp_name'], 'image/' . $foto);
        } else {
            $foto = null; // Atau bisa diisi dengan foto default
        }


        $query = "INSERT INTO mahasiswa (nama, nim, jurusan, nohp, foto) VALUES ('$nama', '$nim', '$jurusan', '$nohp', '$foto')";
        
        mysqli_query($koneksi, $query);

        return mysqli_affected_rows($koneksi);
        
    }

    function hapusdata($id)
    {
        global $koneksi;
        $query = "DELETE FROM mahasiswa WHERE id = $id";
        mysqli_query($koneksi, $query);

        return mysqli_affected_rows($koneksi);
    }
    