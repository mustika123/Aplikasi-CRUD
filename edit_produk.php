<?php
include 'koneksi.php';

if (isset($_GET['ID_Produk'])) {
    $ID_Produk = mysqli_real_escape_string($koneksi, $_GET['ID_Produk']);
    $query = "SELECT * FROM produk WHERE ID_Produk = '$ID_Produk'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Edit Produk</title>
            <link rel="stylesheet" href="style_edit.css">
        </head>
        <body>
            <div class="container">
                <h1>Edit Produk</h1>
                <form action="proses_edit_produk.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="ID_Produk" value="<?= $row['ID_Produk']; ?>">
                    <label for="nama_produk">Nama Produk</label>
                    <input type="text" name="nama_produk" value="<?= $row['nama_produk']; ?>" required>
                    
                    <label for="deskripsi">Deskripsi</label>
                    <textarea name="deskripsi"><?= $row['deskripsi']; ?></textarea>
                    
                    <label for="stok">Stok</label>
                    <input type="number" name="stok" value="<?= $row['stok']; ?>" required>
                    
                    <label for="harga">Harga</label>
                    <input type="text" name="harga" value="<?= $row['harga']; ?>" required>


                    <label for="gambar">Gambar</label>
                    <img src="img/<?= $row['gambar']; ?>" alt="Gambar Produk" style="width:150px">
                    <input type="file" name="gambar">

                    
                    <button type="submit">Simpan Perubahan</button>
                </form>
            </div>
        </body>
        </html>
        <?php
    } else {
        echo "Produk tidak ditemukan.";
    }
} else {
    echo "ID produk tidak valid.";
}
?>
