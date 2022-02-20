<?php
//koneksi kedatabase
include "config.php";

// nama file
$filename = "data pinjaman-" . date('Ymd') . ".xls";

//header info for browser
header("Content-Type: application/vnd-ms-excel");
header('Content-Disposition: attachment; filename="' . $filename . '";');

//menampilkan data sebagai array dari tabel produk
$out = array();
$sql = mysqli_query($mysqli, "SELECT b.judul as 'Judul',m.namaMember as 'Nama Member',pt.nama as 'Petugas',p.tanggalPeminjaman as 'Tanggal Peminjaman',p.tanggalPengembalian as 'Tanggal Pengembalian',p.keterangan as 'Keterangan' FROM tb_peminjaman p join tb_member m on p.idMember=m.idMember join tb_buku b on p.idBuku=b.idBuku join tb_petugas pt on p.idPetugas=pt.idPetugas");
while ($data = mysqli_fetch_assoc($sql))
    $out[] = $data;
$show_coloumn = false;
foreach ($out as $record) {
    if (!$show_coloumn) {
        //menampilkan nama kolom di baris pertama
        echo implode("\t", array_keys($record)) . "\n";
        $show_coloumn = true;
    }
    // looping data dari database
    echo implode("\t", array_values($record)) . "\n";
}
exit;
