<?php
include 'koneksi.php';

if (isset($_POST['editId'])) {
    $id_produk = $_POST['editId'];
    $nama_produk = $_POST['nama_produk'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $query = "UPDATE produk SET nama_produk = '$nama_produk', kategori = '$kategori', harga = '$harga', stok = '$stok' WHERE id_produk = '$id_produk'";

    if (mysqli_query($conn, $query)) {
        echo "Produk berhasil diperbarui!";
    } else {
        echo "Gagal memperbarui produk: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
