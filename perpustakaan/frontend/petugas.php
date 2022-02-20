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
    <header>
        <div class='pembagi-head'>
            <div style="flex-grow: 8">
                <h1 class="title">PERPUSTAKAAN</h1>
            </div>
            <div>
                <nav>
                    <table class="nav_tabel">
                        <tr>
                            <td><a href="../logout.php" style="text-decoration: none;">Logout</a></td>
                        </tr>
                    </table>
                </nav>
            </div>
        </div>
    </header>
    <div class="w3-sidebar w3-bar-block w3-light-grey w3-card" style="width:15%">
        <a class="w3-bar-item w3-button" href="../Member/index.php" target="Section">Member</a>
        <a class="w3-bar-item w3-button" href="../Peminjaman/indexPeminjaman.php" target="Section">Peminjaman</a>
        <a class="w3-bar-item w3-button" href="../Buku/index.php" target="Section">Buku</a>
        <a class="w3-bar-item w3-button" href="../Petugas/index.php" target="Section">Petugas</a>
    </div>
    <!-- isi data Section pada bagian ini-->
    <div style="margin-left:15%">
        <div class="w3-container">
            <div id="Section"><iframe frameborder="0" width="100%" height="604" name="Section"></iframe> </div>
        </div>
    </div>
    <!-- ini batas section-->
    </div>

</body>

</html>