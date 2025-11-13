<?php
include "conn.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $delete = mysqli_query($conn, "DELETE FROM products WHERE id_product='$id'");

    if ($delete) {
        echo "<script>alert('Produk berhasil dihapus!'); window.location='index.php?page=product';</script>";
    } else {
        echo "Gagal menghapus produk: " . mysqli_error($conn);
    }
} else {
    echo "ID tidak ditemukan.";
}
?>
