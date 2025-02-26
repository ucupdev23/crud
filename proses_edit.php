<?php
include 'koneksi.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$nim = $_POST['nim'];
$email = $_POST['email'];
$nomor = $_POST['nomor'];
$jurusan_id = $_POST['jurusan'];

$sql = "UPDATE mahasiswa SET nama='$nama', nim='$nim', email='$email', nomor='$nomor', jurusan_id='$jurusan_id' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
