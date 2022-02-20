<?php include("../config.php"); ?>

<!DOCTYPE html>
<html>

<head>
    <title>Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    if (isset($_GET['pesan'])) {
        $pesan = $_GET['pesan'];
        if ($pesan == "input") {
            echo "<div class='alert alert-success alert-dismissible' role='alert'>Data Berhasil di Input!
			<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
        } else if ($pesan == "update") {
            echo "<div class='alert alert-success alert-dismissible' role='alert'>Data Berhasil di Update!
			<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
        } else if ($pesan == "delete") {
            echo "<div class='alert alert-success alert-dismissible' role='alert'>Data Behasil di Delete!
			<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
        } else if ($pesan == "gagal") {
            echo "<div class='alert alert-warning alert-dismissible' role='alert'>Action Failed!
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }
    }
    ?>
    <h3 align="center">Data Buku</h3>
    <table class="table table-striped table-hover" border="1">
        <tr>
            <td colspan="3" align="center">
                <a class="tombol" href="tambahkan_buku.php">+ Tambah Data Baru</a>
            </td>
            <td colspan="8" align="right">
                <form action="list_buku.php" method="post">
                    <input type="text" name="cr" placeholder="Judul">
                    <input class="btn btn-primary" type="submit" name="cari" value="Cari">
                </form>
            </td>
        </tr>
        <tr align="center">
            <th>No</th>
            <th>Gambar</th>
            <th>ID Buku</th>
            <th>Judul</th>
            <th>Pengarang</th>
            <th>Penerbit</th>
            <th>Tahun Terbit</th>
            <th>Stok</th>
            <th>Harga</th>
            <th>Sinopsis</th>
            <th>Opsi</th>
        </tr>
        <?php
        $batas = 5;
        $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
        $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;
        $previous = $halaman - 1;
        $next = $halaman + 1;

        $data = mysqli_query($mysqli, "select * from tb_buku");
        $jumlah_data = mysqli_num_rows($data);
        $total_halaman = ceil($jumlah_data / $batas);

        $nomor = $halaman_awal + 1;

        if (isset($_POST['cari'])) {
            $jdl = $_POST['cr'];
            if ($idm != "") {
                $sql = "SELECT * FROM tb_buku where judul like '%$jdl%' limit $halaman_awal, $batas";
                $query = mysqli_query($mysqli, $sql);
            } else {
                $sql = "SELECT * FROM tb_buku limit $halaman_awal, $batas";
                $query = mysqli_query($mysqli, $sql);
            }
        } else {
            $sql = "SELECT * FROM tb_buku limit $halaman_awal, $batas";
            $query = mysqli_query($mysqli, $sql);
        }
        $nomor = 1;

        while ($buku = mysqli_fetch_array($query)) {
        ?>
            <tr>
                <td><?php echo $nomor++; ?></td>
                <td><?php echo $buku['gambar'] ?></td>
                <td><?php echo $buku['idBuku'] ?></td>
                <td><?php echo $buku['judul'] ?></td>
                <td><?php echo $buku['pengarang'] ?></td>
                <td><?php echo $buku['penerbit'] ?></td>
                <td><?php echo $buku['tahunTerbit'] ?></td>
                <td><?php echo $buku['stok'] ?></td>
                <td><?php echo $buku['harga'] ?></td>
                <td><?php echo $buku['sinopsis'] ?></td>
                <td>
                    <a class="edit" href="edit_buku.php?id=<?php echo $buku['idBuku']; ?>">Edit</a> |
                    <a class="hapus" href="hapus_buku.php?id=<?php echo $buku['idBuku']; ?>">Hapus</a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <nav>
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link" <?php if ($halaman > 1) {
                                            echo "href='?halaman=$previous'";
                                        } ?>>Previous</a>
            </li>
            <?php
            for ($x = 1; $x <= $total_halaman; $x++) {
                if ($x != $halaman) {
                    echo "<li class='page-item'><a class='page-link' href='?halaman=$x'>$x</a></li>";
                } else {
                    echo "<li class='page-item active'><a class='page-link' href='#'>$x </a></li>";
                }
            }
            ?>
            <li class="page-item">
                <a class="page-link" <?php if ($halaman < $total_halaman) {
                                            echo "href='?halaman=$next'";
                                        } ?>>Next</a>
            </li>
        </ul>
    </nav>
</body>

</html>