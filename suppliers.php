<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include "conn.php";

// Check login
if (!isset($_SESSION['username'])) {
    header("Location: index.php?page=login");
    exit();
}
?>

<table class="data-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Supplier</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Email</th>
            <th>Action</th>
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
                    <td>{$row['email']}</td>
                    <td>
                        <a href='edit_supplier.php?id={$row['id_supplier']}' class='btn-edit'>Edit</a>
                        <a href='delete_supplier.php?id={$row['id_supplier']}' class='btn-delete' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                    </td>
                </tr>";
        }
    } else {
        echo "<tr><td colspan='6' style='text-align:center;'>No suppliers found.</td></tr>";
    }
    ?>
    </tbody>
</table>
