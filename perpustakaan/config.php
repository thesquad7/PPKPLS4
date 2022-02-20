<?php
$Host = 'localhost';
$Name = 'db_perpus';
$Username = 'root';
$Password = '';
$mysqli = mysqli_connect($Host, $Username, $Password, $Name);
if (!$mysqli) {
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}
