<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>DATA PEMINJAMAN</title>
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
		} else if ($pesan == "edit") {
			echo "<div class='alert alert-success alert-dismissible' role='alert'>Data Berhasil di Update!
			<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
		} else if ($pesan == "hilang") {
			echo "<div class='alert alert-success alert-dismissible' role='alert'>Data Behasil di Update!
			<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
		} else if ($pesan == "gagal") {
			echo "<div class='alert alert-warning alert-dismissible' role='alert'>Action Failed!
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
		}
	}
	?>

	<h3 align="center">Data Peminjaman</h3>
	<table class="table table-striped table-hover">
		<tr>
			<td colspan="2" align="center">
				<a class="tombol" href="addPeminjaman.php">+ Tambah Data Baru</a>
			</td>
			<td colspan="2" align="center">
				<a href="../exportLaporan.php">Export Excel</a>
			</td>
			<td colspan="4" align="right">
				<form action="indexPeminjaman.php" method="post">
					<input type="text" name="cr1" placeholder="ID Member">
					<input type="text" name="cr2" placeholder="ID Buku">
					<input class="btn btn-primary" type="submit" name="cari" value="Cari">
				</form>
			</td>
		</tr>
		<tr>
			<th>No</th>
			<th>Judul</th>
			<th>Nama Member</th>
			<th>Nama Petugas</th>
			<th>Tanggal Peminjaman</th>
			<th>Tanggal Pengembalian</th>
			<th>Keterangan</th>
			<th>Opsi</th>
		</tr>
		<?php
		include "../config.php";

		$batas = 5;
		$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
		$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;
		$previous = $halaman - 1;
		$next = $halaman + 1;

		$data = mysqli_query($mysqli, "select * from tb_peminjaman");
		$jumlah_data = mysqli_num_rows($data);
		$total_halaman = ceil($jumlah_data / $batas);

		$nomor = $halaman_awal + 1;

		if (isset($_POST['cari'])) {
			$idm = $_POST['cr1'];
			$idb = $_POST['cr2'];
			if ($idm != "" || $idb != "") {
				$sql = mysqli_query($mysqli, "SELECT * FROM tb_peminjaman p join tb_member m on p.idMember=m.idMember join tb_buku b on p.idBuku=b.idBuku join tb_petugas pt on p.idPetugas=pt.idPetugas where p.idBuku like '%$idb%' and p.idMember like '%$idm%' limit $halaman_awal, $batas");
			} else {
				$sql = mysqli_query($mysqli, "SELECT * FROM tb_peminjaman p join tb_member m on p.idMember=m.idMember join tb_buku b on p.idBuku=b.idBuku join tb_petugas pt on p.idPetugas=pt.idPetugas limit $halaman_awal, $batas");
			}
		} else {
			$sql = mysqli_query($mysqli, "SELECT * FROM tb_peminjaman p join tb_member m on p.idMember=m.idMember join tb_buku b on p.idBuku=b.idBuku join tb_petugas pt on p.idPetugas=pt.idPetugas limit $halaman_awal, $batas");
		}
		$nomor = 1;
		while ($data = mysqli_fetch_array($sql)) {
		?>
			<tr>
				<td><?php echo $nomor++; ?></td>
				<td><?php echo $data['judul']; ?></td>
				<td><?php echo $data['namaMember']; ?></td>
				<td><?php echo $data['nama']; ?></td>
				<td><?php echo $data['tanggalPeminjaman']; ?></td>
				<td><?php echo $data['tanggalPengembalian']; ?></td>
				<td><?php echo $data['keterangan']; ?></td>
				<td>
					<a href="editPeminjaman.php?id=<?php echo $data['idPeminjaman']; ?>&idb=<?php echo $data['idBuku']; ?>&&status=kembali">Kembalikan</a> |
					<a href="editPeminjaman.php?id=<?php echo $data['idPeminjaman']; ?>&status=hilang">Hilang</a>
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