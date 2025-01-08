<?php
include 'koneksi.php';

if (isset($_POST['id_produk'])) {
    $id_produk = $_POST['id_produk'];

    $query = "DELETE FROM produk WHERE id_produk = '$id_produk'";

    if (mysqli_query($conn, $query)) {
        echo "Produk berhasil dihapus!";
    } else {
        echo "Gagal menghapus produk: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
