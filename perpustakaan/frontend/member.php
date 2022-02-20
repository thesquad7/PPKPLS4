<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management Perpustakaan</title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php
    session_start();
    $id = $_SESSION['id'];
    ?>
    <header>
        <div class='pembagi-head'>
            <div style="flex-grow: 8">
                <h1 class="title">PERPUSTAKAAN</h1>
            </div>
            <div>
                <nav>
                    <table class="nav_tabel">
                        <tr>
                            <td><a class="Anav" href="member.php">Beranda</a></td>
                            <td><a class="Anav" href="../riwayatPeminjaman.php" target="Section" style="text-decoration: none;">Riwayat Peminjaman</a></td>
                            <td><a class="Anav" href="../logout.php" style="text-decoration: none;">Logout</a></td>
                        </tr>
                    </table>
                </nav>
            </div>
        </div>
    </header>
    <article id="connect">

        <div id="Section"><iframe src="../Buku/melihatBuku.php" frameborder="0" width="100%" height="604" name="Section"></iframe> </div>

    </article>
    <script src="js.js"></script>
</body>

</html>