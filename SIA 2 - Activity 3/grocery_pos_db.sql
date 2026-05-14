-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2026 at 09:44 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grocery_pos_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_03_28_085142_create_products_table', 2),
(5, '2026_03_28_085750_create_products_table', 3),
(6, '2026_03_28_093503_create_orders_table', 3),
(7, '2026_03_28_093756_create_order_items_table', 3),
(8, '2026_03_29_023303_create_orders_table', 4),
(9, '2026_03_29_031515_create_orders_table', 5),
(10, '2026_03_29_031521_create_order_items_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `cash` decimal(8,2) DEFAULT NULL,
  `change` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `total`, `cash`, `change`, `created_at`, `updated_at`) VALUES
(1, 11.00, NULL, NULL, '2026-03-28 19:18:45', '2026-03-28 19:18:45'),
(2, 11.00, NULL, NULL, '2026-03-28 19:21:37', '2026-03-28 19:21:37'),
(3, 11.00, NULL, NULL, '2026-03-28 19:23:19', '2026-03-28 19:23:19'),
(4, 11.00, NULL, NULL, '2026-03-28 19:29:37', '2026-03-28 19:29:37'),
(5, 11.00, NULL, NULL, '2026-03-28 19:34:37', '2026-03-28 19:34:37'),
(7, 99.00, NULL, NULL, '2026-03-28 19:36:51', '2026-03-28 19:36:51'),
(8, 11.00, NULL, NULL, '2026-03-28 19:37:29', '2026-03-28 19:37:29'),
(9, 66.00, NULL, NULL, '2026-03-28 19:44:42', '2026-03-28 19:44:42'),
(10, 22.00, NULL, NULL, '2026-03-28 19:47:12', '2026-03-28 19:47:12'),
(13, 11.00, 100.00, 89.00, '2026-03-29 02:28:40', '2026-03-29 02:28:40'),
(14, 11.00, 100.00, 89.00, '2026-04-01 17:18:03', '2026-04-01 17:18:03'),
(15, 22.00, 100.00, 78.00, '2026-04-01 17:24:01', '2026-04-01 17:24:01'),
(16, 100.00, 1000.00, 900.00, '2026-04-01 17:25:44', '2026-04-01 17:25:44'),
(17, 100.00, 1000.00, 900.00, '2026-04-01 17:30:40', '2026-04-01 17:30:40'),
(19, 100.00, 100.00, 0.00, '2026-04-01 18:21:19', '2026-04-01 18:21:19'),
(20, 11.00, 200.00, 189.00, '2026-04-01 18:57:38', '2026-04-01 18:57:38'),
(21, 700.00, 1000.00, 300.00, '2026-04-01 19:51:10', '2026-04-01 19:51:10'),
(22, 8.00, 20.00, 12.00, '2026-05-13 18:54:24', '2026-05-13 18:54:24');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_name`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 'Christian', 1, 11.00, '2026-03-28 19:18:45', '2026-03-28 19:18:45'),
(2, 2, 'Christian', 1, 11.00, '2026-03-28 19:21:37', '2026-03-28 19:21:37'),
(3, 3, 'Christian', 1, 11.00, '2026-03-28 19:23:19', '2026-03-28 19:23:19'),
(4, 4, 'Christian', 1, 11.00, '2026-03-28 19:29:37', '2026-03-28 19:29:37'),
(5, 5, 'Christian', 1, 11.00, '2026-03-28 19:34:37', '2026-03-28 19:34:37'),
(9, 7, 'Christian', 4, 11.00, '2026-03-28 19:36:51', '2026-03-28 19:36:51'),
(10, 7, 'Christian', 3, 11.00, '2026-03-28 19:36:51', '2026-03-28 19:36:51'),
(11, 7, 'Christian', 2, 11.00, '2026-03-28 19:36:51', '2026-03-28 19:36:51'),
(12, 8, 'Christian', 1, 11.00, '2026-03-28 19:37:29', '2026-03-28 19:37:29'),
(13, 9, 'Christian', 6, 11.00, '2026-03-28 19:44:42', '2026-03-28 19:44:42'),
(14, 10, 'Christian', 2, 11.00, '2026-03-28 19:47:12', '2026-03-28 19:47:12'),
(17, 13, 'Christian', 1, 11.00, '2026-03-29 02:28:41', '2026-03-29 02:28:41'),
(18, 14, 'Christian', 1, 11.00, '2026-04-01 17:18:03', '2026-04-01 17:18:03'),
(19, 15, 'Christian', 2, 11.00, '2026-04-01 17:24:01', '2026-04-01 17:24:01'),
(20, 16, 'Christian Papong Caturan', 1, 100.00, '2026-04-01 17:25:44', '2026-04-01 17:25:44'),
(21, 17, 'Christian Papong Caturan', 1, 100.00, '2026-04-01 17:30:40', '2026-04-01 17:30:40'),
(25, 19, 'Christian Papong Caturan', 1, 100.00, '2026-04-01 18:21:19', '2026-04-01 18:21:19'),
(26, 20, 'Christian', 1, 11.00, '2026-04-01 18:57:38', '2026-04-01 18:57:38'),
(27, 21, 'Christian Papong Caturan', 7, 100.00, '2026-04-01 19:51:10', '2026-04-01 19:51:10'),
(28, 22, 'shampoo', 1, 8.00, '2026-05-13 18:54:24', '2026-05-13 18:54:24');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `supplier` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `quantity`, `price`, `supplier`, `image`, `created_at`, `updated_at`) VALUES
(6, 'katol', 'Dessert', 100, 20.00, 'sandra', 'products/PgxSWoTFs68HrKK1yGop5M2P7WK7Qg2pnA4eb4O3.png', '2026-05-13 00:27:35', '2026-05-13 00:27:35'),
(7, 'shampoo', 'shampoo', 99, 8.00, 'chynna', 'products/zdGExD6J7decfpyggXqfaPHtMlgiMZOxxhhwUhty.png', '2026-05-13 18:42:28', '2026-05-13 18:54:24');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('3qyJSwXvHSlmWEOUhNmLCSaZ44gFf9X7JYQYhG6d', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTlByVnNuSXhoc3RmQnJHMm1lQVpxUXcyNFM5SEVzZThQOGpOU2xoSCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWN0cyI7czo1OiJyb3V0ZSI7czoxNDoicHJvZHVjdHMuaW5kZXgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1778727314),
('lwjjleSFIcSVXo061N5vJhq5kUPaNjggBb22hEHo', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVjczSjJPT09OWkFBVjgwVzJ2UUZkRjBpUk9IaUNseTk4VVVobW9NRiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo5OiJwb3MuaW5kZXgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1778744615);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
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
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
