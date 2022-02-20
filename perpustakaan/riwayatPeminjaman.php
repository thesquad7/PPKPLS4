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
	session_start();
	$idm = $_SESSION['id'];
	?>

	<h3 align="center">Riwayat Peminjaman</h3>
	<table class="table table-striped table-hover">
		<tr>
			<td colspan="8" align="right">
				<form action="indexPeminjaman.php" method="post">
					<input type="text" name="cr1" placeholder="ID Buku">
					<input type="text" name="cr2" placeholder="Judul">
					<input type="submit" name="cari" value="Cari">
				</form>
			</td>
		</tr>
		<tr>
			<th>No</th>
			<th>Judul</th>
			<th>Tanggal Peminjaman</th>
			<th>Tanggal Pengembalian</th>
			<th>Keterangan</th>
		</tr>
		<?php
		include "config.php";

		$batas = 1;
		$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
		$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;
		$previous = $halaman - 1;
		$next = $halaman + 1;

		$data = mysqli_query($mysqli, "select * from tb_peminjaman where idMember ='$idm'");
		$jumlah_data = mysqli_num_rows($data);
		$total_halaman = ceil($jumlah_data / $batas);

		$nomor = $halaman_awal + 1;

		if (isset($_POST['cari'])) {
			$jdl = $_POST['cr1'];
			$idb = $_POST['cr2'];
			if ($jdl != "" || $idb != "") {
				$sql = mysqli_query($mysqli, "SELECT * FROM tb_peminjaman p join tb_member m on p.idMember=m.idMember join tb_buku b on p.idBuku=b.idBuku join tb_petugas pt on p.idPetugas=pt.idPetugas where p.idMember='$idm' and p.idBuku like '%$idb%' and p.judul like '%$jdl%' limit $halaman_awal, $batas");
			} else {
				$sql = mysqli_query($mysqli, "SELECT * FROM tb_peminjaman p join tb_member m on p.idMember=m.idMember join tb_buku b on p.idBuku=b.idBuku join tb_petugas pt on p.idPetugas=pt.idPetugas where p.idMember='$idm' limit $halaman_awal, $batas");
			}
		} else {
			$sql = mysqli_query($mysqli, "SELECT * FROM tb_peminjaman p join tb_member m on p.idMember=m.idMember join tb_buku b on p.idBuku=b.idBuku join tb_petugas pt on p.idPetugas=pt.idPetugas where p.idMember='$idm' limit $halaman_awal, $batas");
		}
		$nomor = 1;
		while ($data = mysqli_fetch_array($sql)) {
		?>
			<tr>
				<td><?php echo $nomor++; ?></td>
				<td><?php echo $data['judul']; ?></td>
				<td><?php echo $data['tanggalPeminjaman']; ?></td>
				<td><?php echo $data['tanggalPengembalian']; ?></td>
				<td><?php echo $data['keterangan']; ?></td>
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