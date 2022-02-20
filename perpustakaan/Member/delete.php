<?php
include '../config.php';
$id = $_GET['id'];
$sql = mysqli_query($mysqli, "DELETE FROM tb_member WHERE idMember=$id");
if ($sql) {
    header("location:index.php?pesan=delete");
} else {
    header("location:index.php?pesan=gagal");
}
