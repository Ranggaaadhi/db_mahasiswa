// Commit 4: Tambah catatan perubahan di delete.php
<?php
include 'config.php';

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM mahasiswa WHERE id='$id'");

header("Location: index.php");
exit;
?>