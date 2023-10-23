<?php
include 'koneksi.php';

$ID_Produk = $_POST['ID_Produk'];
$nama_produk = $_POST['nama_produk'];
$deskripsi = $_POST['deskripsi'];
$stok = $_POST['stok'];
$harga = $_POST['harga'];

$gambar = $_FILES['gambar']['name'];
$gambar_temp = $_FILES['gambar']['tmp_name'];
$folder = "img/"; 

move_uploaded_file($gambar_temp, $folder . $gambar);

$query = "INSERT INTO produk (ID_Produk, nama_produk, deskripsi, stok, harga, gambar) VALUES ('$ID_Produk','$nama_produk', '$deskripsi', $stok, $harga, '$gambar')";

if (mysqli_query($koneksi, $query)) {
    header("Location: index.php");
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
}

mysqli_close($koneksi);
?>
