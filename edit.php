<?php
include 'koneksi.php';

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM formulir WHERE id=$id");
$data = mysqli_fetch_assoc($query);

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $tahun_ajaran = $_POST['tahun_ajaran'];
    $jurusan = $_POST['jurusan'];
    $IPK = $_POST['IPK'];
    
    if (!empty($_FILES['foto']['name'])) {
        $foto = $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];
        move_uploaded_file($tmp, "uploads/$foto");
    } else {
        $foto = $data['foto'];
    }

    $query = "UPDATE formulir SET nama='$nama', tahun_ajaran='$tahun_ajaran', jurusan='$jurusan', IPK='$IPK', foto='$foto' WHERE id=$id";
    mysqli_query($koneksi, $query);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data</title>
</head>
<body>
    <h2>Edit Data Formulir [😎]</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label>Nama:</label><br>
        <input type="text" name="nama" value="<?= $data['nama']; ?>" required><br>
        <label>Tahun Ajaran:</label><br>
        <input type="number" name="tahun_ajaran" value="<?= $data['tahun_ajaran']; ?>" required><br>
        <label>Jurusan:</label><br>
        <input type="text" name="jurusan" value="<?= $data['jurusan']; ?>" required><br>
        <label>IPK:</label><br>
        <input type="number" name="IPK" value="<?= $data['IPK']; ?>" required><br>
        <label>Foto:</label><br>
        <input type="file" name="foto"><br><br>
        <img src="uploads/<?= $data['foto']; ?>" width="100"><br><br>
        <button type="submit" name="submit">Update</button>
    </form>
</body>
</html>
