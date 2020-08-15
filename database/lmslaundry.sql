-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2020 at 10:00 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lmslaundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `lms_invoice`
--

CREATE TABLE `lms_invoice` (
  `id_invoice` int(11) NOT NULL,
  `periode` varchar(10) DEFAULT NULL,
  `no_invoice` varchar(100) DEFAULT NULL,
  `kode_order` varchar(20) DEFAULT NULL,
  `total_pembayaran` int(10) DEFAULT NULL,
  `users_id` int(10) DEFAULT NULL,
  `pelanggan_name` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lms_invoice`
--

INSERT INTO `lms_invoice` (`id_invoice`, `periode`, `no_invoice`, `kode_order`, `total_pembayaran`, `users_id`, `pelanggan_name`, `created_at`, `updated_at`, `status`) VALUES
(1, '082020', '8L0408082020', '8L0408', 49000, 1, 'yusuf', '2020-08-11 17:47:51', '2020-08-11 17:47:51', 1),
(2, '082020', 'T01508082020', 'T01508', 36000, 1, 'yusuf', '2020-08-15 19:37:48', '2020-08-15 19:37:48', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lms_orders`
--

CREATE TABLE `lms_orders` (
  `id_orders` int(5) NOT NULL,
  `periode` varchar(10) DEFAULT NULL,
  `kode_orders` varchar(10) DEFAULT NULL,
  `users_id` varchar(10) DEFAULT NULL,
  `nama_pelanggan` varchar(100) DEFAULT NULL,
  `jenis_order` varchar(100) DEFAULT NULL,
  `harga_satuan` int(10) DEFAULT 0,
  `qty` int(3) DEFAULT 0,
  `total_harga` int(10) DEFAULT NULL,
  `laundry_type` varchar(50) DEFAULT NULL,
  `delivery_order` varchar(10) DEFAULT NULL,
  `status_order` int(3) DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `admin_name` varchar(50) DEFAULT NULL,
  `rak` char(3) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lms_orders`
--

INSERT INTO `lms_orders` (`id_orders`, `periode`, `kode_orders`, `users_id`, `nama_pelanggan`, `jenis_order`, `harga_satuan`, `qty`, `total_harga`, `laundry_type`, `delivery_order`, `status_order`, `created_at`, `updated_at`, `admin_name`, `rak`) VALUES
(1, '08-2020', '8L0408', '1', 'yusuf', 'Jaket/ Sweater', 8000, 1, 8000, 'SATUAN', 'JEMPUT', 4, '2020-08-04 23:13:38', '2020-08-04 23:13:38', NULL, NULL),
(2, '08-2020', '8L0408', '1', 'yusuf', 'Jaket Kulit', 15000, 2, 30000, 'SATUAN', 'JEMPUT', 4, '2020-08-04 23:13:38', '2020-08-04 23:13:38', NULL, NULL),
(3, '08-2020', '8L0408', '1', 'yusuf', 'Selimut Tebal', 11000, 1, 11000, 'SATUAN', 'JEMPUT', 4, '2020-08-04 23:13:38', '2020-08-04 23:13:38', NULL, NULL),
(4, '08-2020', 'T01508', '1', 'yusuf', 'Cuci + Gosok + Harum / kg', 6000, 6, 36000, 'KILOAN', 'ANTAR', 3, '2020-08-16 02:36:54', '2020-08-16 02:36:54', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lms_services`
--

CREATE TABLE `lms_services` (
  `id_services` int(4) NOT NULL,
  `jenis` varchar(225) NOT NULL,
  `harga` int(7) NOT NULL,
  `diskom` int(3) DEFAULT NULL,
  `after_diskon` int(7) DEFAULT NULL,
  `code` int(2) NOT NULL COMMENT '1 Satuan 2 kiloan',
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `status_services` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lms_services`
--

INSERT INTO `lms_services` (`id_services`, `jenis`, `harga`, `diskom`, `after_diskon`, `code`, `created_at`, `updated_at`, `status_services`) VALUES
(1, 'Jaket/ Sweater', 8000, 0, 0, 1, '2019-03-21', '2019-09-03', 1),
(2, 'Jaket Kulit', 15000, 0, 0, 1, '2019-03-21', '0000-00-00', 1),
(3, 'Bad Cover Besar', 15000, 0, 0, 1, '2019-03-21', '0000-00-00', 1),
(4, 'Bad Cover Sedang', 13000, 0, 0, 1, '2019-03-21', '0000-00-00', 1),
(5, 'Bad Cover Kecil', 11000, 0, 0, 1, '2019-03-21', '0000-00-00', 1),
(6, 'Selimut Tebal', 11000, 0, 0, 1, '2019-03-21', '0000-00-00', 1),
(7, 'Selimut Tipis', 9000, 0, 0, 1, '2019-03-21', '0000-00-00', 1),
(8, 'Sprei Besar', 10000, 0, 0, 1, '2019-03-21', '0000-00-00', 1),
(9, 'Sprei Single', 8000, 0, 0, 1, '2019-03-21', '0000-00-00', 1),
(10, 'Handuk Besar', 7000, 0, 0, 1, '2019-03-21', '0000-00-00', 1),
(11, 'Handuk Kecil', 6000, 0, 0, 1, '2019-03-21', '0000-00-00', 1),
(12, 'Kasur Lantai', 30000, 0, 0, 1, '2019-03-21', '0000-00-00', 1),
(13, 'Karpet Tebal / M2', 7500, 0, 0, 1, '2019-03-21', '0000-00-00', 1),
(14, 'Karpet Tipis / M2 ', 6500, 0, 0, 1, '2019-03-21', '0000-00-00', 1),
(15, 'Gordyn Tebal / M2', 3500, 0, 0, 1, '2019-03-21', '0000-00-00', 1),
(16, 'Gordyn Tipis / M2  / vitrase', 2500, 0, 0, 1, '2019-03-21', '0000-00-00', 1),
(17, 'Taplak Meja Besar', 7000, 0, 0, 1, '2019-03-21', '0000-00-00', 1),
(18, 'Taplak Meja Kecil', 6000, 0, 0, 1, '2019-03-21', '0000-00-00', 1),
(19, 'Cuci + Gosok + Harum / kg', 6000, 0, 0, 2, '2019-03-21', '0000-00-00', 1),
(20, 'Gosok + Harum / kg', 4000, 0, 0, 2, '2019-03-21', '0000-00-00', 1),
(21, 'SANDAL JEPIT', 5000, NULL, NULL, 1, '2019-07-12', '2019-07-12', 1),
(22, 'SANDAL JEPIT', 5000, NULL, NULL, 1, '2019-07-12', '2019-09-03', 0),
(23, 'SANDAL JEPIT', 5000, NULL, NULL, 1, '2019-07-12', '2019-09-03', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `noreg` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access` int(2) NOT NULL DEFAULT 5 COMMENT '0:Not Active 1:Administrator 2:Services 3:dry clean 4:kasir 5:user',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fullname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_ktp` bigint(20) DEFAULT NULL,
  `no_hp` bigint(20) DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `noreg`, `name`, `access`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `fullname`, `alamat`, `no_ktp`, `no_hp`, `status`) VALUES
(1, NULL, 'yusuf', 1, 'yusuf7789@gmail.com', NULL, '$2y$10$3Nja2gHwUvGVy04YtPl4..KX8MClso3OI/YzIV4H4ceEj.7M9EzS6', NULL, '2020-08-04 08:00:04', '2020-08-04 08:00:04', 'Yusuf Hanafi', 'Perum BCK Blok C11 No.15 Cibeber Cilegon', 123456789070789, 87771520079, NULL),
(2, NULL, 'administrator', 1, 'admin@lmslaundry.com', NULL, '$2y$10$yDKyTB6iITRyj6zNsKUDQeOYYpAUKDzY3qDhhAcNbbumLLZYsc4o2', NULL, '2020-08-15 12:59:14', '2020-08-15 12:59:14', 'administrator', 'Cilegon', 1234567, 87771520444, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lms_invoice`
--
ALTER TABLE `lms_invoice`
  ADD PRIMARY KEY (`id_invoice`);

--
-- Indexes for table `lms_orders`
--
ALTER TABLE `lms_orders`
  ADD PRIMARY KEY (`id_orders`);

--
-- Indexes for table `lms_services`
--
ALTER TABLE `lms_services`
  ADD PRIMARY KEY (`id_services`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lms_invoice`
--
ALTER TABLE `lms_invoice`
  MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lms_orders`
--
ALTER TABLE `lms_orders`
  MODIFY `id_orders` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lms_services`
--
ALTER TABLE `lms_services`
  MODIFY `id_services` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
