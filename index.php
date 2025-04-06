<?php
include 'config.php';

$editMode = false;
$dataEdit = ['id' => '', 'nama' => '', 'email' => '', 'alamat' => ''];

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $result = $conn->query("SELECT * FROM mahasiswa WHERE id = $id");
    $dataEdit = $result->fetch_assoc();
    $editMode = true;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
</head>
<body>

<h3>Form Input Mahasiswa</h3>
<form action="<?= $editMode ? 'tambah.php' : 'login.php' ?>" method="post">
    <?php if ($editMode): ?>
        <input type="hidden" name="id" value="<?= $dataEdit['id'] ?>">
    <?php endif; ?>
    Nama: <input type="text" name="nama" value="<?= $dataEdit['nama'] ?>"><br><br>
    EMAIL: <input type="text" name="email" value="<?= $dataEdit['email'] ?>"><br><br>
    Alamat: <input type="text" name="alamat" value="<?= $dataEdit['alamat'] ?>"><br><br>
    <button type="submit"><?= $editMode ? 'Update' : 'Simpan' ?></button>
</form>

<hr>

<h3>Daftar Mahasiswa</h3>
<table border="1" cellpadding="10">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>EMAIL</th>
        <th>Alamat</th>
        <th>Aksi</th>
    </tr>
    <?php
    $result = $conn->query("SELECT * FROM mahasiswa");
    $no = 1;
    while($row = $result->fetch_assoc()):
    ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $row['nama'] ?></td>
        <td><?= $row['email'] ?></td>
        <td><?= $row['alamat'] ?></td>
        <td>
            <a href="index.php?edit=<?= $row['id'] ?>">Edit</a> |
            <a href="hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

</body>
</html>