<?php
include 'koneksi.php';

if (isset($_GET['id_produk'])) {
    $id_produk = $_GET['id_produk'];
    $query = "SELECT * FROM produk WHERE id_produk = '$id_produk'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);
        echo json_encode($product);
    } else {
        echo json_encode([]);
    }

    mysqli_close($conn);
}
?>
