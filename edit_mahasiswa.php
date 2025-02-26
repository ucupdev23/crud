<?php
include 'koneksi.php';

$id = $_GET['id'];

// $sql = "SELECT * FROM mahasiswa WHERE id =$id";
// $result = $conn->query($sql);
// $data = $result->fetch_assoc();

$sql = "SELECT mahasiswa.*, jurusan.*
        FROM mahasiswa 
        JOIN jurusan ON mahasiswa.jurusan_id = jurusan.jurusan_id 
        WHERE mahasiswa.id = $id";
$result = $conn->query($sql);
$data = $result->fetch_assoc();

$query_jurusan = "SELECT jurusan_id, nama_jurusan FROM jurusan";
$result_jurusan = $conn->query($query_jurusan);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
</head>

<body>
    <h2>Edit Data Mahasiswa</h2>
    <form action="proses_edit.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
        <label>Nama:</label>
        <input type="text" name="nama" value="<?php echo $data['nama']; ?>"><br>
        <label>NIM:</label>
        <input type="text" name="nim" value="<?php echo $data['nim']; ?>"><br>
        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $data['email']; ?>"><br>
        <label>Nomor:</label>
        <input type="text" name="nomor" value="<?php echo $data['nomor']; ?>"><br>
        <label>Jurusan:</label>
        <!-- <input type="text" name="jurusan" value="<?php echo $data['jurusan']; ?>"><br> -->
        <select name="jurusan" required>
            <option value="">Pilih Jurusan</option>
            <?php while ($row = $result_jurusan->fetch_assoc()) : ?>
                <option value="<?= $row['jurusan_id']; ?>"
                    <?= ($row['jurusan_id'] == $data['jurusan_id']) ? 'selected' : ''; ?>>
                    <?= $row['nama_jurusan']; ?>
                </option>
            <?php endwhile; ?>
        </select><br>
        <input type="submit" value="Simpan">
        <a href="index.php">Kembali</a>
    </form>
    </form>
</body>

</html>