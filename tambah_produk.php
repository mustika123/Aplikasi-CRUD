<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk</title>
    <!-- Bootstrap 5.3.2-->
    <link rel="stylesheet" href="style_edit.css">
</head>
<body>
    <h1>Tambah Produk</h1>
    <div class="container">
        <form action="proses_tambah_produk.php" method="POST" enctype="multipart/form-data">
        ID Produk: <input type="text" name="ID_Produk" required><br>
        Nama Produk: <input type="text" name="nama_produk" required><br>
        Deskripsi: <textarea name="deskripsi"></textarea><br>
        Stok: <input type="number" name="stok" required><br>
        Harga: <input type="text" name="harga" required><br>
        Gambar: <input type="file" name="gambar" required><br>
        <input type="submit" value="Tambah" class="custom-button">
    </form>
    </div>
</body>
</html>
