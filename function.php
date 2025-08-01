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

    function hapusdata($id) {
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id = $id");
    return mysqli_affected_rows($koneksi);
    }

    function ubahdata($data, $id)
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

        $query = "UPDATE mahasiswa SET nama='$nama', nim='$nim', jurusan='$jurusan', nohp='$nohp', foto='$foto' WHERE id=$id";
        
        mysqli_query($koneksi, $query);

        return mysqli_affected_rows($koneksi);
    }

    function register($data)
    {
        global $koneksi;

        $username = stripcslashes($data["username"]);
        $password1 = $data["password1"];
        $password2 = $data["password2"];

        $query = "SELECT * FROM user WHERE username = '$username'";

        $usernameCheck = mysqli_query($koneksi, $query);

        if(mysqli_num_rows($usernameCheck) > 0)
        {
            return "Username sudah terdaftar!";
        }

        if(!preg_match('/^[a-zA-Z0-9.-_]+$/',$username))
        {
            return "Username hanya boleh mengandung huruf, angka, titik, strip, dan garis bawah!";
        }

        if($password1 !== $password2)
        {
            return "Konfirmasi password tidak sesuai!";
        }

        $encrypt_pass = password_hash($password1, PASSWORD_DEFAULT);

        $query_insert = "INSERT INTO user (username, password) VALUES ('$username', '$encrypt_pass')";

        if( mysqli_query($koneksi, $query_insert))
        {
            return "Register Berhasil";
        }
        else
        {
            return "Register Gagal: " . mysqli_error($koneksi);
        } 
    }

    