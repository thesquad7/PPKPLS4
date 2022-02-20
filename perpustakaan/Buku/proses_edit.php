<?php

include("../config.php");

if (isset($_POST['tambahkan'])) {
    $id = $_POST['id'];
    $gambar = $_POST['gambar'];
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahunTerbit = $_POST['tahunTerbit'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];
    $sinopsis = $_POST['sinopsis'];

    $tempdir = "assets/image/";
    if (!file_exists($tempdir))
        mkdir($tempdir, 0755);
    //gambar akan di simpan di folder gambar
    $target_path = $tempdir . basename($_FILES['filegambar']['name']);
    $nama_gambar = $_FILES['filegambar']['name'];

    $sql = "UPDATE tb_buku set gambar='$nama_gambar', judul='$judul', pengarang='$pengarang', penerbit='$penerbit', tahunTerbit='$tahunTerbit', stok='$stok', harga='$harga', sinopsis='$sinopsis' where idBuku='$id'";
    $query = mysqli_query($mysqli, $sql);

    if ($query && move_uploaded_file($_FILES['filegambar']['tmp_name'], $target_path)) {
        header('Location: index.php?pesan=update');
    } else {
        header('Location: index.php?pesan=gagal');
    }
} else {
    die("Akses dilarang...");
}
