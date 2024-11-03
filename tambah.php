<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $tahun_ajaran = $_POST['tahun_ajaran'];
    $jurusan = $_POST['jurusan'];
    $IPK = $_POST['IPK'];
    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    $fotoPath = "uploads/" . $foto;

    if (move_uploaded_file($tmp, $fotoPath)) {
        $query = "INSERT INTO formulir (nama, tahun_ajaran, jurusan, IPK, foto) VALUES ('$nama', '$tahun_ajaran', '$jurusan', '$IPK', '$foto')";
        mysqli_query($koneksi, $query);
        header("Location: index.php");
    } else {
        echo "Gagal mengunggah foto.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Produk</title>
</head>
<body>
    <h2>Tambah Data [🤑]</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label>Nama:</label><br>
        <input type="text" name="nama" required><br>
        <label>Tahun Ajaran:</label><br>
        <input type="number" name="tahun_ajaran" required><br>
        <label>Jurusan:</label><br>
        <input type="text" name="jurusan" required><br>
        <label>IPK:</label><br>
        <input type="number" name="IPK" required><br>
        <label>Foto:</label><br>
        <input type="file" name="foto" required><br><br>
        <button type="submit" name="submit">Simpan</button>
    </form>
</body>
</html>
