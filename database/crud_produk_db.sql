-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2025 at 05:08 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud_produk_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `tanggal_input` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `kategori`, `harga`, `stok`, `tanggal_input`) VALUES
(20, 'keyboard rgb ', 'Elektronik', 700000, 122, '2025-01-08'),
(21, 'Produk 1', 'Elektronik', 100000, 10, '2025-01-01'),
(22, 'Produk 2', 'Fashion', 150000, 15, '2025-01-02'),
(23, 'Produk 3', 'Kesehatan', 75000, 20, '2025-01-03'),
(24, 'Produk 4', 'Makanan', 25000, 30, '2025-01-04'),
(25, 'Produk 5', 'Olahraga', 300000, 5, '2025-01-05'),
(26, 'Produk 6', 'Elektronik', 500000, 8, '2025-01-06'),
(27, 'Produk 7', 'Fashion', 120000, 12, '2025-01-07'),
(28, 'Produk 8', 'Kesehatan', 85000, 18, '2025-01-08'),
(29, 'Produk 9', 'Makanan', 15000, 50, '2025-01-09'),
(30, 'Produk 10', 'Olahraga', 250000, 20, '2025-01-10'),
(31, 'Produk 11', 'Elektronik', 200000, 6, '2025-01-11'),
(32, 'Produk 12', 'Fashion', 180000, 16, '2025-01-12'),
(33, 'Produk 13', 'Kesehatan', 65000, 25, '2025-01-13'),
(34, 'Produk 14', 'Makanan', 18000, 40, '2025-01-14'),
(35, 'Produk 15', 'Olahraga', 270000, 10, '2025-01-15'),
(36, 'Produk 16', 'Elektronik', 400000, 7, '2025-01-16'),
(37, 'Produk 17', 'Fashion', 110000, 14, '2025-01-17'),
(38, 'Produk 18', 'Kesehatan', 95000, 22, '2025-01-18'),
(39, 'Produk 19', 'Makanan', 22000, 35, '2025-01-19'),
(40, 'Produk 20', 'Olahraga', 320000, 13, '2025-01-20'),
(41, 'Produk 21', 'Elektronik', 550000, 9, '2025-01-21'),
(42, 'Produk 22', 'Fashion', 160000, 18, '2025-01-22'),
(43, 'Produk 23', 'Kesehatan', 80000, 28, '2025-01-23'),
(44, 'Produk 24', 'Makanan', 27000, 45, '2025-01-24'),
(45, 'Produk 25', 'Olahraga', 350000, 12, '2025-01-25'),
(46, 'Produk 26', 'Elektronik', 600000, 5, '2025-01-26'),
(47, 'Produk 27', 'Fashion', 190000, 20, '2025-01-27'),
(48, 'Produk 28', 'Kesehatan', 78000, 30, '2025-01-28'),
(49, 'Produk 29', 'Makanan', 17000, 55, '2025-01-29'),
(50, 'Produk 30', 'Olahraga', 360000, 15, '2025-01-30'),
(51, 'Produk 31', 'Elektronik', 650000, 4, '2025-01-31'),
(52, 'Produk 32', 'Fashion', 140000, 10, '2025-02-01'),
(53, 'Produk 33', 'Kesehatan', 87000, 12, '2025-02-02'),
(54, 'Produk 34', 'Makanan', 30000, 60, '2025-02-03'),
(55, 'Produk 35', 'Olahraga', 380000, 8, '2025-02-04'),
(56, 'Produk 36', 'Elektronik', 700000, 3, '2025-02-05'),
(57, 'Produk 37', 'Fashion', 130000, 25, '2025-02-06'),
(58, 'Produk 38', 'Kesehatan', 69000, 17, '2025-02-07'),
(59, 'Produk 39', 'Makanan', 21000, 70, '2025-02-08'),
(60, 'Produk 40', 'Olahraga', 400000, 14, '2025-02-09'),
(61, 'Produk 41', 'Elektronik', 750000, 6, '2025-02-10'),
(62, 'Produk 42', 'Fashion', 110000, 20, '2025-02-11'),
(63, 'Produk 43', 'Kesehatan', 95000, 23, '2025-02-12'),
(64, 'Produk 44', 'Makanan', 16000, 75, '2025-02-13'),
(65, 'Produk 45', 'Olahraga', 420000, 10, '2025-02-14'),
(66, 'Produk 46', 'Elektronik', 800000, 7, '2025-02-15'),
(67, 'Produk 47', 'Fashion', 170000, 15, '2025-02-16'),
(68, 'Produk 48', 'Kesehatan', 90000, 19, '2025-02-17'),
(69, 'Produk 49', 'Makanan', 23000, 65, '2025-02-18'),
(70, 'Produk 50', 'Olahraga', 440000, 18, '2025-02-19'),
(71, 'Produk 51', 'Elektronik', 850000, 5, '2025-02-20'),
(72, 'Produk 52', 'Fashion', 120000, 10, '2025-02-21'),
(73, 'Produk 53', 'Kesehatan', 73000, 25, '2025-02-22'),
(74, 'Produk 54', 'Makanan', 24000, 40, '2025-02-23'),
(75, 'Produk 55', 'Olahraga', 460000, 12, '2025-02-24'),
(76, 'Produk 56', 'Elektronik', 900000, 4, '2025-02-25'),
(77, 'Produk 57', 'Fashion', 150000, 18, '2025-02-26'),
(78, 'Produk 58', 'Kesehatan', 67000, 30, '2025-02-27'),
(79, 'Produk 59', 'Makanan', 28000, 50, '2025-02-28'),
(80, 'Produk 60', 'Olahraga', 480000, 20, '2025-03-01'),
(81, 'Produk 61', 'Elektronik', 950000, 6, '2025-03-02'),
(82, 'Produk 62', 'Fashion', 140000, 12, '2025-03-03'),
(83, 'Produk 63', 'Kesehatan', 82000, 22, '2025-03-04'),
(84, 'Produk 64', 'Makanan', 19000, 65, '2025-03-05'),
(85, 'Produk 65', 'Olahraga', 500000, 10, '2025-03-06'),
(86, 'Produk 66', 'Elektronik', 1000000, 8, '2025-03-07'),
(87, 'Produk 67', 'Fashion', 130000, 16, '2025-03-08'),
(88, 'Produk 68', 'Kesehatan', 75000, 24, '2025-03-09'),
(89, 'Produk 69', 'Makanan', 27000, 55, '2025-03-10'),
(90, 'Produk 70', 'Olahraga', 520000, 14, '2025-03-11'),
(91, 'Produk 71', 'Elektronik', 1050000, 5, '2025-03-12'),
(92, 'Produk 72', 'Fashion', 160000, 20, '2025-03-13'),
(93, 'Produk 73', 'Kesehatan', 68000, 28, '2025-03-14'),
(94, 'Produk 74', 'Makanan', 25000, 60, '2025-03-15'),
(95, 'Produk 75', 'Olahraga', 540000, 13, '2025-03-16'),
(96, 'Produk 76', 'Elektronik', 1100000, 7, '2025-03-17'),
(97, 'Produk 77', 'Fashion', 170000, 18, '2025-03-18'),
(98, 'Produk 78', 'Kesehatan', 72000, 20, '2025-03-19'),
(99, 'Produk 79', 'Makanan', 30000, 50, '2025-03-20'),
(100, 'Produk 80', 'Olahraga', 560000, 15, '2025-03-21'),
(101, 'Produk 81', 'Elektronik', 1150000, 6, '2025-03-22'),
(102, 'Produk 82', 'Fashion', 180000, 12, '2025-03-23'),
(103, 'Produk 83', 'Kesehatan', 69000, 26, '2025-03-24'),
(104, 'Produk 84', 'Makanan', 21000, 70, '2025-03-25'),
(105, 'Produk 85', 'Olahraga', 580000, 10, '2025-03-26'),
(106, 'Produk 86', 'Elektronik', 1200000, 5, '2025-03-27'),
(107, 'Produk 87', 'Fashion', 190000, 15, '2025-03-28'),
(108, 'Produk 88', 'Kesehatan', 73000, 22, '2025-03-29'),
(109, 'Produk 89', 'Makanan', 23000, 60, '2025-03-30'),
(110, 'Produk 90', 'Olahraga', 600000, 8, '2025-03-31'),
(111, 'Produk 91', 'Elektronik', 1250000, 4, '2025-04-01'),
(112, 'Produk 92', 'Fashion', 130000, 17, '2025-04-02'),
(113, 'Produk 93', 'Kesehatan', 78000, 23, '2025-04-03'),
(114, 'Produk 94', 'Makanan', 25000, 65, '2025-04-04'),
(116, 'Produk 96', 'Elektronik', 1300000, 6, '2025-04-06'),
(117, 'Produk 97', 'Fashion', 140000, 18, '2025-04-07'),
(118, 'Produk 98', 'Kesehatan', 80000, 20, '2025-04-08'),
(119, 'Produk 99', 'Makanan', 27000, 55, '2025-04-09'),
(120, 'Produk 100', 'Olahraga', 640000, 10, '2025-04-10'),
(122, 'stick ps 3', 'Elektronik', 20000, 13, '2025-01-08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`) VALUES
(1, 'rifki', '$2y$10$JE9hV58R9FRxxvY4P3klnOQ9Ly.iwfPDv1ZSHhgMeD8DRRFTQ6vSm'),
(2, 'lita', '$2y$10$WpkykHKD/p5pIi0q9hgQGOU5zAYAD0Xi4pT7SNXVwFhy3wfea4sLG'),
(3, 'Rifki Eko Satrio', '$2y$10$Br4sKk9wfcp3LORf0D/c4e6KnGdu7JQLEedVIneXtKSMbA4VPrUM.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
