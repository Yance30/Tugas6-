<?php
include 'config.php';
$nama   = $_POST['nama'];
$email   = $_POST['email'];
$alamat = $_POST['alamat'];

$conn->query("INSERT INTO mahasiswa (nama, email, alamat) VALUES ('$nama', '$email', '$alamat')");
header("Location: index.php");