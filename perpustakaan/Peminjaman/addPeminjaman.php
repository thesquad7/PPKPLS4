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
  session_start();
  $idp = $_SESSION['id'];
  date_default_timezone_set('Asia/Jakarta');
  ?>
  <div class="container">
    <div class="row vh-100 d-flex justify-content-center align-items-center">
      <div class="col-md-7 col-lg-5">
        <div class="card-body">
          <h3 class="mb-5 mt-3 text-center text-primary">Tambah Data</h3>
          <form action="addPeminjaman.php" method="post">
            <div class="mb-3">
              <label class="form-label">ID Buku</label>
              <input type="text" class="form-control" name="idbuku">
            </div>
            <div class="mb-3">
              <label class="form-label">ID Member</label>
              <input type="text" class="form-control" name="idmember">
            </div>
            <div class="mb-3">
              <label class="form-label">Tanggal Peminjaman</label>
              <input type="text" class="form-control" name="tglpinjam" value="<?php echo date('l, d-m-Y  h:i:s a'); ?>" readonly>
            </div>
            <div class="d-grid gap-2">
              <input class="btn btn-primary" type="submit" name="Submit" value="Tambah">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php
  if (isset($_POST['Submit'])) {
    $idbuku = $_POST['idbuku'];
    $idmember = $_POST['idmember'];
    $jumlah = 1;
    $tgl = $_POST['tglpinjam'];
    $keterangan = "Belum dikembalikan";
    include_once("../config.php");
    $sql = mysqli_query($mysqli, "SELECT*FROM tb_buku where idBuku='$idbuku'");
    if ($sql) {
      $hasil = mysqli_fetch_array($sql);
      if (($hasil['stok'] - $jumlah) < 0) {
        echo "<div class='alert alert-warning alert-dismissible' role='alert'>Stok Tidak Cukup
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
      } else if (($hasil['stok'] - $jumlah) >= 0) {
        $sql1 = mysqli_query($mysqli, "UPDATE tb_buku set stok=stok-1 where idBuku='$idbuku'");
        $result = mysqli_query($mysqli, "INSERT INTO tb_peminjaman(idBuku,idMember,idPetugas,tanggalPeminjaman,keterangan) VALUES('$idbuku','$idmember','$idp','$tgl','$keterangan')");
        if (!$result) {
          header("location:indexPeminjaman.php?pesan=gagal");
        } else {
          header("location:indexPeminjaman.php?pesan=input");
        }
      }
    }
  }
  ?>
</body>

</html>