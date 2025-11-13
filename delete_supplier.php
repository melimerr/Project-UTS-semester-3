<?php
include "conn.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $delete = "DELETE FROM suppliers WHERE id_supplier = $id";

    if (mysqli_query($conn, $delete)) {
        echo "<script>alert('Data supplier berhasil dihapus!'); window.location='index.php?page=supplier';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data supplier!'); window.location='index.php?page=supplier';</script>";
    }
}
?>
