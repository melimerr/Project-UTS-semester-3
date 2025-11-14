-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2025 at 05:09 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_users`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL,
  `nama_product` varchar(100) NOT NULL,
  `kategori` varchar(50) DEFAULT NULL,
  `harga` decimal(10,2) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `id_supplier` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_product`, `nama_product`, `kategori`, `harga`, `stok`, `id_supplier`) VALUES
(1, 'Indomie Goreng 85g', 'Makanan Instan', 3500.00, 115, 1),
(2, 'Aqua Botol 600ml', 'Minuman', 4000.00, 200, 1),
(3, 'SilverQueen Cokelat 58g', 'Snack', 12500.00, 60, 1),
(4, 'Beras Ramos 5kg', 'Sembako', 78000.00, 30, 1),
(5, 'Lifebuoy Sabun Cair 450ml', 'Perawatan Diri', 22000.00, 45, 1),
(6, 'Pepsodent Pasta Gigi 190g', 'Perawatan Diri', 17000.00, 79, 1),
(7, 'Downy Pewangi 720ml', 'Kebutuhan Rumah', 25000.00, 50, 1),
(8, 'ABC Kecap Manis 275ml', 'Bumbu Dapur', 15000.00, 70, 1),
(9, 'Tisu Paseo 250s', 'Kebutuhan Rumah', 18000.00, 90, 1),
(10, 'Kopi Kapal Api 65g', 'Minuman', 9000.00, 109, 1),
(11, 'Nescafe Vanilla 30ml', 'Minuman', 8000.00, 40, 1),
(16, 'Sosis Kenzler', 'Makanan', 8000.00, 48, 1),
(17, 'Indomie Ayam Bawang', 'Makanan', 3500.00, 109, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(100) NOT NULL,
  `alamat` text DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id_supplier`, `nama_supplier`, `alamat`, `telepon`, `email`) VALUES
(1, 'PT Indofood CBP Sukses Makmur Tbk', 'Jl. Sudirman No. 88, Jakarta Pusat', '021-5551235', 'info@indofood.co.id'),
(2, 'PT Tirta Investama (Danone Aqua)', 'Jl. Raya Bogor Km. 26, Cibinong', '021-87912345', 'cs@aqua.co.id'),
(3, 'PT Mayora Indah Tbk', 'Jl. Tomang Raya No. 21, Jakarta Barat', '021-5671234', 'info@mayora.co.id'),
(4, 'PT Wilmar Nabati Indonesia', 'Jl. Pulau Batam No. 5, Medan', '061-7781234', 'marketing@wilmar.co.id'),
(5, 'PT Unilever Indonesia Tbk', 'Jl. BSD Boulevard Barat, Tangerang', '021-8081234', 'contact@unilever.co.id'),
(6, 'PT P&G Home Products Indonesia', 'Jl. Raya Bogor Km. 29, Jakarta Timur', '021-87781234', 'service@pg.com'),
(7, 'PT Wings Surya', 'Jl. Embong Malang No. 60, Surabaya', '031-5321234', 'info@wingscorp.com'),
(8, 'PT ABC President Indonesia', 'Jl. Raya Cibitung KM. 48, Bekasi', '021-8901234', 'cs@abcpresident.co.id'),
(9, 'PT Sinar Sosro', 'Jl. Raya Bekasi Timur KM. 18, Jakarta Timur', '021-4681234', 'info@sosro.com'),
(10, 'PT Fajar Paper Supplier', 'Jl. Industri Raya No. 8, Karawang', '021-8981234', 'sales@fajarpaper.co.id');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id_transaction` int(2) NOT NULL,
  `total` int(10) NOT NULL,
  `transaction_date_and_time` date NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id_transaction`, `total`, `transaction_date_and_time`, `id_user`) VALUES
(1, 24000, '2025-11-14', 4),
(5, 8000, '2025-11-14', 4),
(6, 8000, '2025-11-14', 4),
(7, 8000, '2025-11-14', 4),
(8, 8000, '2025-11-14', 4),
(9, 8000, '2025-11-14', 4),
(10, 8000, '2025-11-14', 4),
(11, 8000, '2025-11-14', 3);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_detail`
--

CREATE TABLE `transaction_detail` (
  `id_detail` int(11) NOT NULL,
  `subtotal` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `id_cashier` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `id_transaction` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction_detail`
--

INSERT INTO `transaction_detail` (`id_detail`, `subtotal`, `quantity`, `id_cashier`, `id_product`, `id_transaction`) VALUES
(1, 3500, 1, 4, 17, 0),
(2, 8000, 1, 4, 16, 5),
(3, 8000, 1, 4, 16, 6),
(4, 8000, 1, 4, 16, 7),
(5, 8000, 1, 4, 16, 8),
(6, 8000, 1, 4, 16, 9),
(7, 8000, 1, 4, 16, 10),
(8, 8000, 1, 3, 16, 11);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(2, 'Meli Merliani', 'melimeliani654@gmail.com', '$2y$10$DUA.uO13hPT0FUcU8kXfGOvuaIfsxmaQILOOyFCQo3fHa88/PZ4HG', 'admin'),
(3, 'Meli', 'melimeliani654@gmail.com', '$2y$10$/1si82gUccRC/930hfCpDejIZKAl5Y6uhXHJBcmAKcRcf.E3VNGBi', 'user'),
(4, 'Siti Nurhalimah', 'halimah24@gmail.com', '$2y$10$5piBS4L0oxs6U6FZBRgqued30sWOMWa3A4e10RX4t4q3XiqinIMD6', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `idx_supplier` (`id_supplier`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id_transaction`),
  ADD KEY `transaction_ibfk_1` (`id_user`);

--
-- Indexes for table `transaction_detail`
--
ALTER TABLE `transaction_detail`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `detail_ibfk_1` (`id_product`),
  ADD KEY `detail2_ibfk_1` (`id_transaction`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id_transaction` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `transaction_detail`
--
ALTER TABLE `transaction_detail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_supplier`) REFERENCES `suppliers` (`id_supplier`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `transaction_detail`
--
ALTER TABLE `transaction_detail`
  ADD CONSTRAINT `detail2_ibfk_1` FOREIGN KEY (`id_transaction`) REFERENCES `transaction` (`id_transaction`),
  ADD CONSTRAINT `detail_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
