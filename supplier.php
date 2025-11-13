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

// --- Tambah Supplier ---
if (isset($_POST['tambah_supplier'])) {
    $nama_supplier = mysqli_real_escape_string($conn, $_POST['nama_supplier']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    $telepon = mysqli_real_escape_string($conn, $_POST['telepon']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $query = "INSERT INTO suppliers (nama_supplier, alamat, telepon, email) 
              VALUES ('$nama_supplier', '$alamat', '$telepon', '$email')";

    if (mysqli_query($conn, $query)) {
        $message_supplier = "Supplier berhasil ditambahkan!";
    } else {
        $message_supplier = "Error: " . mysqli_error($conn);
    }
}
?>
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
</div>

<!-- Tabel Supplier -->
 <h2 style="margin: 0; align: center;">Daftar Supplier</h2>
<table class="data-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Supplier</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Email</th>
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                <th>Action</th>
            <?php endif; ?>
        </tr>
    </thead>
    <tbody>
    <?php
    $query = "SELECT * FROM suppliers ORDER BY id_supplier ASC";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$row['id_supplier']}</td>
                    <td>{$row['nama_supplier']}</td>
                    <td>{$row['alamat']}</td>
                    <td>{$row['telepon']}</td>
                    <td>{$row['email']}</td>";

            if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
                echo "<td>
                        <a href='edit_supplier.php?id={$row['id_supplier']}' class='btn-edit'>Edit</a>
                        <a href='delete_supplier.php?id={$row['id_supplier']}' class='btn-delete' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                      </td>";
            }

            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6' style='text-align:center;'>No suppliers found.</td></tr>";
    }
    ?>
    </tbody>
</table>

<!-- Pesan -->
<?php if (isset($message_supplier)) echo "<p style='color:green;'>$message_supplier</p>"; ?>

<!-- Form Tambah Supplier (style sama dengan form produk) -->
<?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
<form method="POST" style="margin-top:25px; background:#f8f9fa; padding:15px; border-radius:10px; display:inline-block;">
    <h3 style="margin-bottom:10px;">Tambah Supplier Baru</h3>
    <input type="text" name="nama_supplier" placeholder="Nama Supplier" required style="padding:5px; margin:5px;">
    <input type="text" name="alamat" placeholder="Alamat" required style="padding:5px; margin:5px;">
    <input type="text" name="telepon" placeholder="Telepon" required style="padding:5px; margin:5px; width:120px;">
    <input type="email" name="email" placeholder="Email" style="padding:5px; margin:5px; width:150px;">
    <button type="submit" name="tambah_supplier" style="background:#28a745; color:white; border:none; padding:6px 12px; border-radius:5px;">Tambah</button>
</form>
<?php endif; ?>
