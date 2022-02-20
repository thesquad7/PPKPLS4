<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>PERPUSTAKAAN</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
  <div class="container">
    <div class="row vh-100 d-flex justify-content-center align-items-center">
      <div class="col-md-7 col-lg-5">
        <div class="card-body">
          <h3 class="mb-5 mt-3 text-center text-primary">Tambah Data</h3>
          <form action="add.php" method="post">
            <div class="mb-3">
              <label class="form-label">Nama</label>
              <input type="text" class="form-control" name="nama">
            </div>
            <div class="mb-3">
              <label class="form-label">Username</label>
              <input type="text" class="form-control" name="user">
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <input type="password" class="form-control" name="pass">
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
    $nama = $_POST['nama'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    include_once("../config.php");

    $result = mysqli_query($mysqli, "INSERT INTO tb_petugas(nama,username,password) 
    VALUES('$nama','$user','$pass')");
    if ($result) {
      header("location:index.php?pesan=input");
    } else {
      header("location:index.php?pesan=gagal");
    }
  }
  ?>
</body>

</html>