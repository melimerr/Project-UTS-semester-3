<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Cek login
if (!isset($_SESSION['username'])) {
    header("Location: index.php?page=login");
    exit();
}

$username = htmlspecialchars($_SESSION['username']);
$role = $_SESSION['role']; // 'admin' atau 'user'
?>

<div class="welcome-card">
    <?php
    if($role == 'admin') {
        echo "<h2>Selamat datang, Admin $username! 💼</h2>";
        echo "<p>Anda dapat mengelola produk, supplier, dan user hari ini.</p>";
    } else {
        echo "<h2>Selamat datang, $username! 🛒</h2>";
        echo "<p>Lihat produk terbaru dan promo hari ini.</p>";
    }
    ?>
</div>

<style>
.welcome-card {
    background: linear-gradient(-45deg, #4a90e2, #50e3c2, #f5a623, #f8e71c);
    background-size: 400% 400%;
    animation: gradientBG 15s ease infinite;
    padding: 30px 40px;
    border-radius: 15px;
    color: white;
    text-align: center;
    font-family: Arial, sans-serif;
    box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    margin-bottom: 30px;
}
.welcome-card h2 {
    margin: 0 0 10px 0;
    font-size: 32px;
}
.welcome-card p {
    margin: 0;
    font-size: 18px;
}
@keyframes gradientBG {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}
</style>
