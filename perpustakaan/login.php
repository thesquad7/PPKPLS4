<!DOCTYPE html>
<html>

<head>
    <title>PERPUSTAKAAN</title>
    <meta charset="UTF-8">
    <title>Management Perpustakaan</title>
    <link rel="stylesheet" href="frontend/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <div class='pembagi-head'>
            <div style="flex-grow: 8">
                <h1 class="title">PERPUSTAKAAN</h1>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row vh-100 d-flex justify-content-center align-items-center">
            <div class="col-md-7 col-lg-5">
                <div class="card-body">
                    <h3 class="mb-5 mt-3 text-center text-primary">LOGIN</h3>
                    <form action="login.php" method="post">
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" name="user">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="pass">
                        </div>
                        <div class="mb-3">
                            <select class="form-select" name="akses">
                                <option value="member">Member</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                        <div class="d-grid gap-2">
                            <input class="btn btn-primary" type="submit" name="Submit" value="Login">
                            <a class="tombol" href='./frontend/index.php' align="center">Kembali</a>
                        </div>
                    </form>
                    </br>
                    <?php
                    session_start();
                    if (isset($_POST['Submit'])) {
                        $user = $_POST['user'];
                        $pass = $_POST['pass'];
                        $akses = $_POST['akses'];

                        include_once("config.php");
                        $result;
                        if ($akses == "member") {
                            $result = mysqli_query($mysqli, "SELECT*FROM tb_member where username='$user' and password='$pass'");
                        } else {
                            $result = mysqli_query($mysqli, "SELECT*FROM tb_petugas where username='$user' and password='$pass'");
                        }
                        $hasil = mysqli_fetch_array($result);
                        if ($hasil != null) {
                            if ($akses == "member") {
                                header("location: frontend/member.php");
                                $_SESSION['id'] = $hasil['idMember'];
                            } else {
                                header("location: frontend/petugas.php");
                                $_SESSION['id'] = $hasil['idPetugas'];
                            }
                        } else {
                            echo "<div class='alert alert-danger alert-dismissible' role='alert'>Login Failed!
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>