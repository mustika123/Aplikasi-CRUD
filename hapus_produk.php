<?php
include 'koneksi.php';

if (isset($_GET['ID_Produk'])) {
    $ID_Produk = $_GET['ID_Produk'];
    $query = "DELETE FROM produk WHERE ID_Produk = '$ID_Produk'";


    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
} else {
    echo "ID produk tidak valid.";
}
?>
