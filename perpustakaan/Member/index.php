<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>CRUD DENGAN PHP</title>
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
	<h3 align="center">Data Member</h3>
	<table class="table table-striped table-hover">
		<tr>
			<td colspan="2" align="center">
				<a class="tombol" href="add.php">+ Tambah Data Baru</a>
			</td>
			<td colspan="4" align="right">
				<form action="index.php" method="post">
					<input type="text" name="cr" placeholder="ID Member">
					<input class="btn btn-primary" type="submit" name="cari" value="Cari">
				</form>
			</td>
		</tr>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>Telephone</th>
			<th>Username</th>
			<th>Opsi</th>
		</tr>
		<?php
		include "../config.php";

		$batas = 5;
		$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
		$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;
		$previous = $halaman - 1;
		$next = $halaman + 1;

		$data = mysqli_query($mysqli, "select * from tb_member");
		$jumlah_data = mysqli_num_rows($data);
		$total_halaman = ceil($jumlah_data / $batas);

		$nomor = $halaman_awal + 1;

		if (isset($_POST['cari'])) {
			$idm = $_POST['cr'];
			if ($idm != "") {
				$sql = mysqli_query($mysqli, "SELECT * FROM tb_member where idMember='$idm' limit $halaman_awal, $batas");
			} else {
				$sql = mysqli_query($mysqli, "SELECT * FROM tb_member limit $halaman_awal, $batas");
			}
		} else {
			$sql = mysqli_query($mysqli, "SELECT * FROM tb_member limit $halaman_awal, $batas");
		}
		$nomor = 1;
		while ($data = mysqli_fetch_array($sql)) {
		?>
			<tr>
				<td><?php echo $nomor++; ?></td>
				<td><?php echo $data['namaMember']; ?></td>
				<td><?php echo $data['alamat']; ?></td>
				<td><?php echo $data['telepon']; ?></td>
				<td><?php echo $data['username']; ?></td>
				<td>
					<a class="edit" href="edit.php?id=<?php echo $data['idMember']; ?>">Edit</a> |
					<a class="hapus" href="delete.php?id=<?php echo $data['idMember']; ?>">Hapus</a>
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