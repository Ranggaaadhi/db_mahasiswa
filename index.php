<!-- #Commit 2: Tambah komentar untuk pengujian commit -->

<?php
include 'config.php';

// Tambah data
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $jurusan = $_POST['jurusan'];
    $angkatan = $_POST['angkatan'];

    if ($nama != "" && $nim != "") {
        $query = "INSERT INTO mahasiswa (nama, nim, jurusan, angkatan)
                  VALUES ('$nama', '$nim', '$jurusan', '$angkatan')";
        mysqli_query($conn, $query);
        header("Location: index.php");
        exit;
    } else {
        echo "<script>alert('Nama dan NIM wajib diisi!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>CRUD Data Mahasiswa</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 30px; background: #f9f9f9; }
    table { width: 100%; border-collapse: collapse; margin-top: 20px; }
    th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
    th { background: #eee; }
    form { background: white; padding: 20px; border-radius: 8px; width: 400px; }
    input, select { width: 100%; padding: 8px; margin: 5px 0; }
    button { padding: 8px 12px; }
  </style>
</head>
<body>

<h2>📘 Data Mahasiswa</h2>

<form method="post" action="">
  <label>Nama Mahasiswa:</label>
  <input type="text" name="nama" required>

  <label>NIM:</label>
  <input type="text" name="nim" required>

  <label>Jurusan:</label>
  <input type="text" name="jurusan">

  <label>Angkatan:</label>
  <input type="number" name="angkatan">

  <button type="submit" name="simpan">Simpan</button>
</form>

<hr>

<h3>Daftar Mahasiswa</h3>

<table>
  <tr>
    <th>No</th>
    <th>Nama</th>
    <th>NIM</th>
    <th>Jurusan</th>
    <th>Angkatan</th>
    <th>Aksi</th>
  </tr>

  <?php
  $no = 1;
  $data = mysqli_query($conn, "SELECT * FROM mahasiswa ORDER BY dibuat_pada DESC");
  while ($row = mysqli_fetch_assoc($data)) {
      echo "<tr>
              <td>$no</td>
              <td>{$row['nama']}</td>
              <td>{$row['nim']}</td>
              <td>{$row['jurusan']}</td>
              <td>{$row['angkatan']}</td>
              <td>
                <a href='edit.php?id={$row['id']}'>Edit</a> |
                <a href='delete.php?id={$row['id']}' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a>
              </td>
            </tr>";
      $no++;
  }
  ?>
</table>

</body>
</html>