<?php
include 'koneksi.php';

$sql = "SELECT * FROM jurusan";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
</head>

<body>
    <h2>Tambah Data Mahasiswa</h2>
    <form action="proses_tambah.php" method="POST">
        <label>Nama:</label>
        <input type="text" name="nama" required><br>

        <label>NIM:</label>
        <input type="number" name="nim" required><br>

        <label>Email:</label>
        <input type="email" name="email" required><br>

        <label>Nomor:</label>
        <input type="number" name="nomor" required><br>

        <label>Jurusan:</label>
        <!-- <input type="text" name="jurusan" required><br> -->
        <select name="jurusan" required>
            <option value="">Pilih Jurusan</option>
            <?php while ($row = $result->fetch_assoc()) : ?>
                <option value="<?= $row['jurusan_id']; ?>"><?= $row['nama_jurusan']; ?></option>
            <?php endwhile; ?>
        </select><br>

        <input type="submit" value="Tambah">
    </form>
</body>

</html>