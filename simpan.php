<?php
include('koneksi.php');

$nama = $_POST['nama'];
$tahun_ajaran = $_POST['tahun_ajaran'];
$jurusan = $_POST['jurusan'];
$IPK = $_POST['IPK'];

// Cek apakah file foto ada
if (isset($_FILES['foto']['name'])) {
    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    $fotoPath = "uploads/" . $foto;

    // Pindahkan foto ke folder uploads
    if (move_uploaded_file($tmp, $fotoPath)) {
        $query = "INSERT INTO formulir (nama, tahun_ajaran, jurusan, IPK, foto) VALUES ('$nama', '$tahun_ajaran', '$jurusan', '$IPK', '$foto')";
        if (mysqli_query($koneksi, $query)) {
            header("Location: index.php");
        } else {
            echo "Gagal menyimpan data: " . mysqli_error($koneksi);
        }
    } else {
        echo "Gagal mengunggah foto.";
    }
} else {
    echo "Foto tidak ditemukan.";
}
?>
