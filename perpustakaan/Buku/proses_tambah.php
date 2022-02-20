<?php

include("../config.php");

if (isset($_POST['tambahkan'])) {

    $gambar = $_POST['gambar'];
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahunTerbit = $_POST['tahunTerbit'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $sinopsis = $_POST['sinopsis'];

    $tempdir = "assets/image/";
    if (!file_exists($tempdir))
        mkdir($tempdir, 0755);
    //gambar akan di simpan di folder gambar
    $target_path = $tempdir . basename($_FILES['filegambar']['name']);
    $nama_gambar = $_FILES['filegambar']['name'];

    $sql = "INSERT INTO tb_buku(gambar, judul, pengarang, penerbit, tahunTerbit, stok, harga, sinopsis) VALUE ('$nama_gambar','$judul', '$pengarang', '$penerbit', '$tahunTerbit', '$stok', '$harga', '$sinopsis')";
    $query = mysqli_query($mysqli, $sql);

    if ($query && move_uploaded_file($_FILES['filegambar']['tmp_name'], $target_path)) {
        header('Location: index.php?status=input');
    } else {
        header('Location: index.php?status=gagal');
    }
} else {
    die("Akses dilarang...");
}
