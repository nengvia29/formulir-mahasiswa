<?php
include 'koneksi.php';

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT foto FROM formulir WHERE id=$id");
$data = mysqli_fetch_assoc($query);
unlink("uploads/" . $data['foto']);

$query = "DELETE FROM formulir WHERE id=$id";
mysqli_query($koneksi, $query);

header("Location: index.php");
?>
