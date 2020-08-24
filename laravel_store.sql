-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2020 at 01:58 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_customer`
--

CREATE TABLE `account_customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_customer`
--

INSERT INTO `account_customer` (`id`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'john@gmail.com', '$2y$10$o6nJGY0S6YAfCz4iUwwN.e4ZsIJFbxp/WAU/NMMnIyvf44L9ZBqT6', '2020-07-19 01:35:42', '2020-07-19 01:35:42'),
(2, 'maya@gmail.com', '$2y$10$Qy.EVoFkAtbA2inDP4hgvezkogOInyPCoPyzkvxMLQRvYEr0ocLem', '2020-07-19 01:55:03', '2020-07-19 01:55:03'),
(3, 'shani@gmail.com', '$2y$10$F6W2YvyE92bc2stBMWyCb.CkUNeLmzfoafXLdt1c7twNAy.96L25O', '2020-07-19 01:55:47', '2020-07-19 01:55:47'),
(4, 'raditha@gmail.com', '$2y$10$0BNxqhQzbzm6j7PP2TFIjuhtKGyx4SjTfDzI.w0EFVol5vCEf5/FS', '2020-07-19 05:38:14', '2020-07-19 05:38:14'),
(5, 'pamela@gmail.com', '$2y$10$PcaYqGqjLUPotESgZF5eGu/MVorAwYSowA10yMNbqVNBKboGlCXQe', '2020-07-19 05:41:08', '2020-07-19 05:41:08');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(10) UNSIGNED NOT NULL,
  `brand_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_code`, `brand_name`, `brand_logo`, `created_at`, `updated_at`) VALUES
(1, 'asus', 'Asus', '1594741082-asus-logo.png', '2020-07-12 20:23:35', '2020-07-14 08:38:02'),
(3, 'intel', 'Intel', '1594741413-intel-logo.png', '2020-07-12 20:25:34', '2020-07-14 08:43:33'),
(4, 'samsung', 'Samsung', '1594741427-samsung-logo.png', '2020-07-14 08:01:22', '2020-07-14 08:43:47'),
(5, 'zotac', 'Zotac', '1594741442-zotac-logo.png', '2020-07-14 08:07:35', '2020-07-14 08:44:02'),
(7, 'logitech', 'Logitech', '1594742054-logitech-logo.png', '2020-07-14 08:54:14', '2020-07-14 08:54:14'),
(8, 'razer', 'Razer', '1594743280-razer-logo.png', '2020-07-14 09:14:40', '2020-07-14 09:14:40'),
(9, 'amd ryzen', 'Amd Ryzen', '1595853200-amd ryzen-logo.png', '2020-07-27 05:33:20', '2020-07-27 05:33:20');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `created_at`, `updated_at`) VALUES
(3, 'Laptop', '2020-07-12 20:21:15', '2020-07-16 03:02:29'),
(5, 'Headphone', NULL, '2020-07-14 22:10:51'),
(8, 'Mousepad', '2020-07-16 01:28:04', '2020-07-16 01:28:04'),
(11, 'Monitor', '2020-07-16 01:48:29', '2020-07-17 00:32:34'),
(12, 'Mouse', '2020-07-19 10:35:31', '2020-07-19 10:35:31'),
(13, 'Processor', '2020-07-26 05:43:05', '2020-07-26 05:43:05');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `account_customer_id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `account_customer_id`, `first_name`, `last_name`, `sex`, `phone_number`, `address`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 1, 'John', 'Muller', 'M', '0823712371236', 'Jl. Gatot subroto', '1594994966-free-profile-photo-whatsapp-4.png', NULL, '2020-07-17 07:09:26'),
(2, 2, 'Maya', 'Erica', 'F', '087123612367', 'Jl. Sudirman no 87', NULL, NULL, NULL),
(5, 3, 'Shani', 'Indira', 'F', '08127317237', 'Jl. Pademangan', '1594995089-shani.jpg', '2020-07-17 07:11:29', '2020-07-17 07:11:29'),
(6, 4, 'Raditha', 'Amalia', 'F', '08762351232', NULL, NULL, '2020-07-19 05:38:14', '2020-07-19 05:38:14'),
(7, 5, 'Pamela', 'Safitri', 'F', '087827261523', NULL, NULL, '2020-07-19 05:41:08', '2020-07-19 05:41:08');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_07_13_023147_create_products_table', 1),
(4, '2020_07_13_023203_create_categories_table', 1),
(5, '2020_07_13_023218_create_brands_table', 1),
(6, '2020_07_17_073359_create_customer_table', 2),
(7, '2020_07_19_071240_create_account_customer_tabel', 3),
(8, '2020_07_21_131115_create_orders_table', 4),
(9, '2020_07_21_131140_create_orders_detail_table', 4),
(10, '2020_07_27_101313_create_product_picture', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE `orders_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_stock` int(10) NOT NULL,
  `product_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_pict` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `brand_id`, `category_id`, `product_price`, `product_stock`, `product_desc`, `product_pict`, `created_at`, `updated_at`) VALUES
(36, 'Amd Ryzenn 7', 9, 13, 7000000, 20, 'Processor baru', NULL, '2020-07-27 05:33:53', '2020-07-27 05:33:53'),
(37, 'Mouse Gaming Logitech', 7, 12, 350000, 20, 'Mouse Gaming', NULL, '2020-07-27 20:01:42', '2020-07-27 20:01:42');

-- --------------------------------------------------------

--
-- Table structure for table `product_picture`
--

CREATE TABLE `product_picture` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_pict` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_picture`
--

INSERT INTO `product_picture` (`id`, `product_id`, `product_pict`, `created_at`, `updated_at`) VALUES
(15, 36, '1595853233-title.jpg', '2020-07-27 05:33:53', '2020-07-27 05:33:53'),
(16, 36, '1595853233-ryzen7.jpg', '2020-07-27 05:33:53', '2020-07-27 05:33:53'),
(17, 37, '1595905302-1594916598-mouse-logitech.jpg', '2020-07-27 20:01:42', '2020-07-27 20:01:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'fahrie', 'admin', 'fahrie@gmail.com', NULL, '$2y$10$sFHQADDbbJnSwjgi1rlkRerGcNgKhbjvdgjqUVZCw6lLsQ1P7wBU2', '6avvpYnGivgJZXSFWO5xO1c9vwHTr3h3EgkNxNoGN65WLSzEL3u3OyMHmJos', '2020-07-14 00:15:01', '2020-07-14 00:15:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_customer`
--
ALTER TABLE `account_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_picture`
--
ALTER TABLE `product_picture`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `account_customer`
--
ALTER TABLE `account_customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `product_picture`
--
ALTER TABLE `product_picture`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
