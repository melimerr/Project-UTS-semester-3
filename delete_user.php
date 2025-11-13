<?php
include "conn.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $delete = mysqli_query($conn, "DELETE FROM users WHERE id='$id'");

    if ($delete) {
        echo "<script>alert('User deleted successfully!'); window.location='index.php?page=user';</script>";
    } else {
        echo "Failed to delete user: " . mysqli_error($conn);
    }
} else {
    echo "No ID provided.";
}
?>
