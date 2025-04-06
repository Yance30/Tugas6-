<?php
include 'config.php';

$id     = $_POST['id'];
$nama   = $_POST['nama'];
$email    = $_POST['email'];
$alamat = $_POST['alamat'];

$conn->query("UPDATE mahasiswa SET nama='$nama', email='$email', alamat='$alamat' WHERE id=$id");
header("Location: index.php");