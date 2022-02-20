<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>PERPUSTAKAAN</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
  <?php
  if (isset($_GET['id'])) {
  }
  include "../config.php";
  $id = $_GET['id'];
  $sql = mysqli_query($mysqli, "SELECT * FROM tb_petugas WHERE idPetugas='$id'");
  while ($data = mysqli_fetch_array($sql)) {
    $id = $data['idPetugas'];
    $nama = $data['nama'];
    $user = $data['username'];
    $pass = $data['password'];
  }
  ?>
  <div class="container">
    <div class="row vh-100 d-flex justify-content-center align-items-center">
      <div class="col-md-7 col-lg-5">
        <div class="card-body">
          <h3 class="mb-5 mt-3 text-center text-primary">Edit Data</h3>
          <form action="edit.php" method="post">
            <div class="mb-3">
              <label class="form-label">Nama</label>
              <input type="hidden" class="form-control" name="id" value="<?php echo $id ?>">
              <input type="text" class="form-control" name="nama" value="<?php echo $nama ?>">
            </div>
            <div class="mb-3">
              <label class="form-label">Username</label>
              <input type="text" class="form-control" name="user" value="<?php echo $user ?>">
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <input type="password" class="form-control" name="pass" value="<?php echo $pass ?>">
            </div>
            <div class="d-grid gap-2">
              <input class="btn btn-primary" type="submit" name="Submit" value="Simpan">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php
  if (isset($_POST['Submit'])) {
    $uid = $_POST['id'];
    $unama = $_POST['nama'];
    $uuser = $_POST['user'];
    $upass = $_POST['pass'];

    include "../config.php";

    $result = mysqli_query($mysqli, "UPDATE tb_petugas SET nama='$unama', username='$uuser', password='$upass' WHERE idPetugas='$uid'");
    if (!$result) {
      header("location:index.php?pesan=gagal");
    } else {
      header("location:index.php?pesan=update");
    }
  }
  ?>
</body>

</html>