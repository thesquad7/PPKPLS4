<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perpustakaan</title>
    <link rel="stylesheet" href="css/melihatBuku23.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li>
                    <form action="melihatBuku.php" method="post">
                        <input class="button kanan" type="submit" name="cari" value="Search">
                        <input class="search kanan" type="text" name="cr" placeholder="Search">
                    </form>
                </li>
            </ul>
        </nav>
    </header>
    <main>
        <?php
        include "../config.php";
        if (isset($_POST['cari'])) {
            $m = $_POST['cr'];
            if ($m != "") {
                $sql = mysqli_query($mysqli, "SELECT * FROM tb_buku where judul like '%$m%'");
            } else {
                $sql = mysqli_query($mysqli, "SELECT * FROM tb_buku");
            }
        } else {
            $sql = mysqli_query($mysqli, "SELECT * FROM tb_buku");
        }
        while ($data = mysqli_fetch_array($sql)) {
        ?>
            <table class="card" cellspacing="0" cellpadding="">
                <tbody>
                    <tr>
                        <td class="" rowspan="10"> <img src="assets/image/<?php echo $data['gambar'] ?>"></td>
                        <td>
                            <h1 class="card3"><?php echo $data['judul'] ?></h1>
                            <h5 class="card3"><?php echo $data['pengarang'] ?></h5>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5 class="card3"><?php echo $data['penerbit'] ?></h5>
                            <h4 class="card3"><?php echo $data['tahunTerbit'] ?></h4>
                        </td>
                    </tr>
                    <tr>
                        <td class="card4">
                            <p><?php echo $data['sinopsis'] ?></p>
                        </td>
                    </tr>
                </tbody>
            </table>
        <?php } ?>
    </main>

</body>

</html>