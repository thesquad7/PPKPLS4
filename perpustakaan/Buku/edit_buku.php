<!DOCTYPE html>
<html>

<head>
    <title>Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    if (isset($_GET['id'])) {
    }
    include "../config.php";
    $id = $_GET['id'];
    $sql = mysqli_query($mysqli, "SELECT * FROM tb_buku WHERE idBuku='$id'");
    while ($buku = mysqli_fetch_array($sql)) {
        $gambar = $buku['gambar'];
        $id = $buku['idBuku'];
        $judul = $buku['judul'];
        $pengarang = $buku['pengarang'];
        $penerbit = $buku['penerbit'];
        $tahunTerbit = $buku['tahunTerbit'];
        $stok = $buku['stok'];
        $harga = $buku['harga'];
        $sinopsis = $buku['sinopsis'];
    }
    ?>
    <div class="container">
        <div class="row vh-100 d-flex justify-content-center align-items-center">
            <div class="col-md-7 col-lg-5">
                <div class="card-body">
                    <h3 class="mb-5 mt-3 text-center text-primary">Edit Buku</h3>
                    <form action="proses_edit.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="judul">Gambar : </label>
                            <input type="file" class="form-control" name="filegambar" id="filegambar" />
                            <label style="color: red"> Please Reupload The Image!! </label>
                        </div>
                        <div class="mb-3">
                            <label for="judul">Judul : </label>
                            <input type="hidden" class="form-control" name="id" value="<?php echo $id ?>">
                            <input type="text" class="form-control" name="judul" value="<?php echo $judul ?>" />
                        </div>
                        <div class=" mb-3">
                            <label for="pengarang">Pengarang : </label>
                            <input type="text" class="form-control" name="pengarang" value="<?php echo $pengarang ?>" />
                        </div>
                        <div class=" mb-3">
                            <label for="penerbit">Penerbit :</label>
                            <input type="text" class="form-control" name="penerbit" value="<?php echo $penerbit ?> " />
                        </div>
                        <div class=" mb-3">
                            <label for="tahunTerbit">Tahun Terbit:</label>
                            <input type="text" class="form-control" name="tahunTerbit" value="<?php echo $tahunTerbit ?>" />
                        </div>
                        <div class=" mb-3">
                            <label for="harga">Stok:</label>
                            <input type="number" class="form-control" name="stok" value="<?php echo $stok ?>" />
                        </div>
                        <div class=" mb-3">
                            <label for="harga">Harga:</label>
                            <input type="number" class="form-control" name="harga" value="<?php echo $harga ?>" />
                        </div>
                        <div class="mb-3">
                            <label for="sinopsis">Sinopsis:</label>
                            <input type="text" class="form-control" name="sinopsis" value="<?php echo $sinopsis ?>" />
                        </div>
                        <div class="d-grid gap-2">
                            <input class="btn btn-primary" type="submit" name="tambahkan" value="Edit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>