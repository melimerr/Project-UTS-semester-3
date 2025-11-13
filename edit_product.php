<?php
include "conn.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data produk berdasarkan ID
    $query = mysqli_query($conn, "SELECT * FROM products WHERE id_product='$id'");
    $data = mysqli_fetch_assoc($query);

    if (!$data) {
        echo "Produk tidak ditemukan!";
        exit;
    }
}

if (isset($_POST['update'])) {
    $nama_product = $_POST['nama_product'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $update = mysqli_query($conn, "UPDATE products 
                                   SET nama_product='$nama_product',
                                       kategori='$kategori',
                                       harga='$harga',
                                       stok='$stok'
                                   WHERE id_product='$id'");

    if ($update) {
        echo "<script>alert('Produk berhasil diperbarui!'); window.location='index.php?page=product';</script>";
    } else {
        echo "Gagal memperbarui produk: " . mysqli_error($conn);
    }
}
?>

<link rel="stylesheet" href="style.css">
<div class="page-container">
    <h2>Edit Produk</h2>
    <form method="POST">
        <label>Nama product:</label>
        <input type="text" name="nama_product" value="Sabun Lifebuoy" required>

        <label>Kategori:</label>
        <input type="text" name="kategori" value="Kebutuhan Rumah" required>

        <label>Harga:</label>
        <input type="number" name="harga" value="8000" required>

        <label>stok:</label>
        <input type="number" name="stok" value="50" required>

        <button type="submit" name="update">Simpan Perubahan</button>
    </form>
</div>
