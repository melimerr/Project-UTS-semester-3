<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include "conn.php";

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    header("Location: index.php?page=login");
    exit();
}

// Tambah Produk 
if (isset($_POST['tambah_produk'])) {
    $nama_product = mysqli_real_escape_string($conn, $_POST['nama_produk']);
    $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
    $harga = mysqli_real_escape_string($conn, $_POST['harga']);
    $stok = mysqli_real_escape_string($conn, $_POST['stok']);

    $query = "INSERT INTO products (nama_product, kategori, harga, stok) 
              VALUES ('$nama_product', '$kategori', '$harga', '$stok')";

    if (mysqli_query($conn, $query)) {
        $message = "Produk berhasil ditambahkan!";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}
?>

<!-- Header -->
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
</div>

<?php if (isset($message)) echo "<p style='color:green;'>$message</p>"; ?>

<!-- Tabel Produk -->
 <h2 style="margin: 0; align: center;">Daftar Product</h2>
<table class="data-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Produk</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Stok</th>
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                <th>Action</th>
            <?php endif; ?>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM products ORDER BY id_product ASC";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['id_product']}</td>
                        <td>{$row['nama_product']}</td>
                        <td>{$row['kategori']}</td>
                        <td>Rp " . number_format($row['harga'], 0, ',', '.') . "</td>
                        <td>{$row['stok']}</td>";

                if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
                    echo "<td>
                            <a href='edit_product.php?id={$row['id_product']}' class='btn-edit'>Edit</a>
                            <a href='delete_product.php?id={$row['id_product']}' class='btn-delete' onclick='return confirm(\"Apakah Anda yakin ingin menghapus produk ini?\")'>Delete</a>
                          </td>";
                }

                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6' style='text-align:center;'>Tidak ada data produk.</td></tr>";
        }
        ?>
    </tbody>
</table>

<?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
<!-- Form Tambah Produk -->
<form method="POST" style="margin-top:25px; background:#f8f9fa; padding:15px; border-radius:10px; display:inline-block;">
    <h3 style="margin-bottom:10px;">Tambah Produk Baru</h3>
    <input type="text" name="nama_produk" placeholder="Nama Produk" required style="padding:5px; margin:5px;">
    <input type="text" name="kategori" placeholder="Kategori" required style="padding:5px; margin:5px;">
    <input type="number" name="harga" placeholder="Harga (Rp)" required style="padding:5px; margin:5px; width:110px;">
    <input type="number" name="stok" placeholder="Stok" required style="padding:5px; margin:5px; width:70px;">
    <button type="submit" name="tambah_produk" style="background:#28a745; color:white; border:none; padding:6px 12px; border-radius:5px;">Tambah</button>
</form>
<?php endif; ?>