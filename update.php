<?php
include('koneksi.php');

$id = $_POST['id'];
$nama = $_POST['nama'];
$tahun_ajaran = $_POST['tahun_ajaran'];
$jurusan = $_POST['jurusan'];
$IPK = $_POST['IPK'];

$foto = $_FILES['foto']['name'];
if ($foto != "") {
    $tmp = $_FILES['foto']['tmp_name'];
    $fotoPath = "uploads/" . $foto;
    move_uploaded_file($tmp, $fotoPath);
    $query = "UPDATE formulir SET nama='$nama', tahun_ajaran='$tahun_ajaran', jurusan='$jurusan', IPK='$IPK', foto='$foto' WHERE id='$id'";
} else {
    $query = "UPDATE formulir SET nama='$nama', tahun_ajaran='$tahun_ajaran', jurusan='$jurusan', IPK='$IPK' WHERE id='$id'";
}

if (mysqli_query($koneksi, $query)) {
    header("Location: index.php");
} else {
    echo "Gagal memperbarui data: " . mysqli_error($koneksi);
}
?>
