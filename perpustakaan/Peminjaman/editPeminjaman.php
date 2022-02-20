<?php
include '../config.php';
$id = $_GET['id'];
$idb = $_GET['idb'];
$status = $_GET['status'];
date_default_timezone_set('Asia/Jakarta');
$tgl = date('l, d-m-Y  h:i:s a');
$sql = mysqli_query($mysqli, "SELECT * FROM tb_peminjaman p join tb_buku b on p.idBuku=b.idBuku WHERE idPeminjaman='$id'");
if ($sql) {
    $hasil = mysqli_fetch_array($sql);
    $harga = $hasil['harga'];
    echo "<p>alert($harga)</p>";
}
if ($status == "kembali") {
    $sql = mysqli_query($mysqli, "UPDATE tb_Peminjaman SET tanggalPengembalian='$tgl',keterangan='dikembalikan' WHERE idPeminjaman='$id'");
    $sql1 = mysqli_query($mysqli, "UPDATE tb_buku set stok=stok+1 where idBuku='$idb'");
    if ($sql) {
        header("location:indexPeminjaman.php?pesan=kembali");
    } else {
        header("location:indexPeminjaman.php?pesan=gagal");
    }
} else if ($status == "hilang") {
    $sql = mysqli_query($mysqli, "UPDATE tb_Peminjaman SET tanggalPengembalian='$tgl',keterangan='hilang, ganti rugi: Rp.$harga' WHERE idPeminjaman='$id'");
    if ($sql) {
        header("location:indexPeminjaman.php?pesan=hilang");
    } else {
        header("location:indexPeminjaman.php?pesan=gagal");
    }
}
