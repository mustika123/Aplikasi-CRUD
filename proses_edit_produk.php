<?php
include 'koneksi.php';

if (isset($_POST['ID_Produk'])) {
    $ID_Produk = $_POST['ID_Produk'];
    $nama_produk = $_POST['nama_produk'];
    $deskripsi = $_POST['deskripsi'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];

    $query_get_produk = "SELECT gambar FROM produk WHERE ID_Produk = '$ID_Produk'";
    $result_get_produk = mysqli_query($koneksi, $query_get_produk);

    if ($result_get_produk && mysqli_num_rows($result_get_produk) == 1) {
        $row = mysqli_fetch_assoc($result_get_produk);

        if ($_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
            $gambar = $_FILES['gambar']['name'];
            $file_tmp = $_FILES['gambar']['tmp_name'];
            $lokasi_gambar = 'img/' . $gambar;
            move_uploaded_file($file_tmp, $lokasi_gambar);
        } else {
            // Jika tidak ada file yang diunggah, gunakan gambar yang sudah ada dalam database
            $gambar = $row['gambar'];
        }
    }



    $query = "UPDATE produk SET nama_produk = '$nama_produk', deskripsi = '$deskripsi', stok = $stok, harga = $harga, gambar = '$gambar' WHERE ID_Produk = '$ID_Produk'";
    
    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
} else {
    echo "Data tidak valid.";
}
?>
