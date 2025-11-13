<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['username'])) {
    header("Location: index.php?page=login");
    exit();
}

// Batasi akses hanya untuk admin
if ($_SESSION['role'] !== 'admin') {
    echo "<script>alert('Akses ditolak! Halaman ini hanya untuk admin.'); window.location='index.php?page=dashboard';</script>";
    exit();
}
?>


// Cek apakah ada parameter ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Jalankan query dan cek error
    $query = "SELECT * FROM users WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }

    // Cek apakah data user ditemukan
    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
    } else {
        die("User dengan ID tersebut tidak ditemukan.");
    }
} else {
    die("Parameter ID tidak ditemukan di URL.");
}

// Proses update data
if (isset($_POST['update'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];

    $updateQuery = "UPDATE users SET 
        username = '$username',
        email = '$email',
        WHERE id_user = '$id'";

    if (mysqli_query($conn, $updateQuery)) {
        echo "<script>alert('Data user berhasil diperbarui'); window.location='user.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data: " . mysqli_error($conn) . "');</script>";
    }
}
?>
<link rel="stylesheet" href="style.css">
<div class="page-container">
<h2>Edit User</h2>
<form method="POST">
    <label>Username</label>
    <input type="text" name="username" value="<?= htmlspecialchars($user['username']) ?>" required>

    <label>Email</label>
    <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>

    <button type="submit" name="update" class="btn-edit">Update</button>
</form>
