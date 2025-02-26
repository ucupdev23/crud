<?php
include 'koneksi.php';

$sql = "SELECT * FROM mahasiswa INNER JOIN jurusan ON mahasiswa.jurusan_id = jurusan.jurusan_id";
$result = $conn->query($sql);

$sqlJurusan = "SELECT * FROM jurusan";
$resultJurusan = $conn->query($sqlJurusan);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
</head>

<body>
    <h2>Data Mahasiswa</h2>
    <a href="tambah_mahasiswa.php">Tambah Data</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Email</th>
            <th>Nomor</th>
            <th>Jurusan</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['nim']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['nomor']; ?></td>
                <td><?php echo $row['nama_jurusan']; ?></td>
                <td>
                    <a href="edit_mahasiswa.php?id=<?php echo $row['id']; ?>">Edit</a>
                    <a href="hapus_mahasiswa.php?id=<?php echo $row['id']; ?>">Hapus</a>
                </td>
            </tr>
        <?php } ?>
    </table>

</body>

</html>

<?php $conn->close(); ?>