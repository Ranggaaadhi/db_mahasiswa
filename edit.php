<?php
include 'config.php';

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id='$id'");
$row = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $jurusan = $_POST['jurusan'];
    $angkatan = $_POST['angkatan'];

    mysqli_query($conn, "UPDATE mahasiswa SET 
        nama='$nama', nim='$nim', jurusan='$jurusan', angkatan='$angkatan' WHERE id='$id'");
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Mahasiswa</title>
</head>
<body>
  <h2>Edit Data Mahasiswa</h2>

  <form method="post">
    <label>Nama:</label><br>
    <input type="text" name="nama" value="<?= $row['nama'] ?>" required><br>

    <label>NIM:</label><br>
    <input type="text" name="nim" value="<?= $row['nim'] ?>" required><br>

    <label>Jurusan:</label><br>
    <input type="text" name="jurusan" value="<?= $row['jurusan'] ?>"><br>

    <label>Angkatan:</label><br>
    <input type="number" name="angkatan" value="<?= $row['angkatan'] ?>"><br><br>

    <button type="submit" name="update">Perbarui</button>
    <a href="index.php">Batal</a>
  </form>
</body>
</html>