<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "crud_gc");

// Mengecek koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Formulir</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="nav-corp">
        <p class="nav-corp-out">Corp Korporet</p>
    </div>
    <div class="container">
        <h2>Data Formulir</h2>
        <a href="tambah.php" class="btn-primary">Tambah Data</a>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tahun Ajaran</th>
                    <th>Jurusan</th>
                    <th>IPK</th>
                    <th>Foto</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = mysqli_query($koneksi, "SELECT * FROM formulir");
                $no = 1;
                while ($row = mysqli_fetch_assoc($query)) :
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row['nama']; ?></td>
                        <td><?= $row['tahun_ajaran']; ?></td>
                        <td><?= $row['jurusan']; ?></td>
                        <td><?= $row['IPK']; ?></td>
                        <td>
                            <?php if (!empty($row['foto']) && file_exists("uploads/" . $row['foto'])): ?>
                                <img src="uploads/<?= $row['foto']; ?>" width="100">
                            <?php else: ?>
                                <span>Gambar tidak ditemukan</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="edit.php?id=<?= $row['id']; ?>" class="btn-warning">Edit</a>
                            <a href="hapus.php?id=<?= $row['id']; ?>" class="btn-danger" onclick="return confirm('Yakin ingin menghapus data ini 🤨?')">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
