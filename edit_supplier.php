<?php
include "conn.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data supplier berdasarkan ID
    $query = "SELECT * FROM suppliers WHERE id_supplier = $id";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
}

if (isset($_POST['update'])) {
    $nama = $_POST['nama_supplier'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $email = $_POST['email'];

    // Update data
    $update = "UPDATE suppliers SET 
                nama_supplier='$nama',
                alamat='$alamat',
                telepon='$telepon',
                email='$email'
                WHERE id_supplier=$id";

    if (mysqli_query($conn, $update)) {
        echo "<script>alert('Data supplier berhasil diperbarui!'); window.location='index.php?page=supplier';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data!');</script>";
    }
}
?>

<link rel="stylesheet" href="style.css">
<div class="page-container">
    <h2>Edit Supplier</h2>
    <form method="POST">
        <label>Nama Supplier:</label>
        <input type="text" name="nama_supplier" value="<?= $data['nama_supplier']; ?>" required>

        <label>Alamat:</label>
        <input type="text" name="alamat" value="<?= $data['alamat']; ?>" required>

        <label>Telepon:</label>
        <input type="text" name="telepon" value="<?= $data['telepon']; ?>" required>

        <label>Email:</label>
        <input type="email" name="email" value="<?= $data['email']; ?>" required>

        <button type="submit" name="update">Update</button>
    </form>
</div>
