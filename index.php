<?php
include 'koneksi.php';

$keyword = '';

$products_per_page = 10;

if (isset($_POST['cari'])) {
    $keyword = $_POST['keyword'];
    $query = "SELECT * FROM produk WHERE nama_produk LIKE '%$keyword%'";
} else {
    
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    
    $offset = ($page - 1) * $products_per_page;
    $query = "SELECT * FROM produk LIMIT $offset, $products_per_page";
}

$result = mysqli_query($koneksi, $query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Website Toko ABC</title>
    <!-- Bootstrap 5.3.2-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- link rel="stylesheet" href="style.css" -->
</head>
<body>
    <div class="container">
        <h1 class="mt-4"> Data Produk </h1>
        <figure>
        <blockquote class="blockquote">
            <p>Berisi data yang telah disimpan di database</p>
        </blockquote>
        <figcaption class="blockquote-footer">
            CRUD <cite title="Source Title">create read update delete</cite>
        </figcaption>
        </figure>
        <div class="float-start">
            <a href="tambah_produk.php" type="button" class="btn btn-primary">Tambah Data</a>
        </div>
        <br>
        <div class="float-end">
            <form action="" method="POST">
                <input type="text" name="keyword" value="<?= $keyword; ?>" placeholder="Cari Nama / Kode Produk">
                <input type="submit" name="cari" value="Cari">
            </form>
        </div>
        <br>
        <br>
      
            <div class="table-responsive" class="float-none">
                <table class="table align-middle table-bordered table-hover">
                    <thead>
                    <tr>
                        <th><center>ID Produk</center></th>
                        <th><center>Nama Produk</center></th>
                        <th><center>Deskripsi</center></th>
                        <th><center>Stok</center></th>
                        <th><center>Harga </center></th>
                        <th><center>Gambar</center></th>
                        <th><center>Aksi</center></th>
                    </tr>
                    </thead>
                    <tbody>
                        
                         <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                            <tr>
                                <td><?= $row['ID_Produk']; ?></td>
                                <td><?= $row['nama_produk']; ?></td>
                                <td><?= $row['deskripsi']; ?></td>
                                <td><?= $row['stok']; ?></td>
                                <td><?= $row['harga']; ?></td>
                                <td>
                                    <?php if (file_exists("img/" . $row['gambar'])) : ?>
                                        <img src="img/<?= $row['gambar']; ?>" style="width:150px">
                                    <?php else : ?>
                                        Gambar tidak ditemukan
                                    <?php endif; ?>
                                </td>    
                                
                                    <td><center>
                                        <a href="edit_produk.php?ID_Produk=<?= $row['ID_Produk'];?>" type="button" class="btn btn-success btn-sm">Ubah</a>
                                        <a href= "hapus_produk.php?ID_Produk=<?= $row['ID_Produk'];?>" type="button" class="btn btn-danger btn-sm">Hapus</a>
                                        </center>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    
                    </tbody>
                </table>
            </div>
            

   
    </body>
</html>