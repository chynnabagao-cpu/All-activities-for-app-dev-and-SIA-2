-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2026 at 09:38 AM
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
-- Database: `act5_laravel_integration`
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

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-admin_news', 'a:0:{}', 1776935935),
('laravel-cache-admin_weather_Hinunangan', 'a:13:{s:5:\"coord\";a:2:{s:3:\"lon\";d:125.1985;s:3:\"lat\";d:10.3965;}s:7:\"weather\";a:1:{i:0;a:4:{s:2:\"id\";i:803;s:4:\"main\";s:6:\"Clouds\";s:11:\"description\";s:13:\"broken clouds\";s:4:\"icon\";s:3:\"04d\";}}s:4:\"base\";s:8:\"stations\";s:4:\"main\";a:8:{s:4:\"temp\";d:31.21;s:10:\"feels_like\";d:36.38;s:8:\"temp_min\";d:31.21;s:8:\"temp_max\";d:31.21;s:8:\"pressure\";i:1005;s:8:\"humidity\";i:64;s:9:\"sea_level\";i:1005;s:10:\"grnd_level\";i:989;}s:10:\"visibility\";i:10000;s:4:\"wind\";a:3:{s:5:\"speed\";d:1.69;s:3:\"deg\";i:103;s:4:\"gust\";d:1.39;}s:6:\"clouds\";a:1:{s:3:\"all\";i:83;}s:2:\"dt\";i:1778743483;s:3:\"sys\";a:3:{s:7:\"country\";s:2:\"PH\";s:7:\"sunrise\";i:1778707077;s:6:\"sunset\";i:1778752397;}s:8:\"timezone\";i:28800;s:2:\"id\";i:1711596;s:4:\"name\";s:10:\"Hinunangan\";s:3:\"cod\";i:200;}', 1778744086),
('laravel-cache-admin_weather_london', 'a:13:{s:5:\"coord\";a:2:{s:3:\"lon\";d:-0.1257;s:3:\"lat\";d:51.5085;}s:7:\"weather\";a:1:{i:0;a:4:{s:2:\"id\";i:803;s:4:\"main\";s:6:\"Clouds\";s:11:\"description\";s:13:\"broken clouds\";s:4:\"icon\";s:3:\"04d\";}}s:4:\"base\";s:8:\"stations\";s:4:\"main\";a:8:{s:4:\"temp\";d:9.91;s:10:\"feels_like\";d:7.84;s:8:\"temp_min\";d:7.95;s:8:\"temp_max\";d:10.61;s:8:\"pressure\";i:1025;s:8:\"humidity\";i:85;s:9:\"sea_level\";i:1025;s:10:\"grnd_level\";i:1021;}s:10:\"visibility\";i:10000;s:4:\"wind\";a:2:{s:5:\"speed\";d:4.12;s:3:\"deg\";i:80;}s:6:\"clouds\";a:1:{s:3:\"all\";i:75;}s:2:\"dt\";i:1777186851;s:3:\"sys\";a:5:{s:4:\"type\";i:2;s:2:\"id\";i:2075535;s:7:\"country\";s:2:\"GB\";s:7:\"sunrise\";i:1777178529;s:6:\"sunset\";i:1777230851;}s:8:\"timezone\";i:3600;s:2:\"id\";i:2643743;s:4:\"name\";s:6:\"London\";s:3:\"cod\";i:200;}', 1777187892),
('laravel-cache-caturanchristian1@gmail.com|127.0.0.1', 'i:1;', 1776565762),
('laravel-cache-caturanchristian1@gmail.com|127.0.0.1:timer', 'i:1776565762;', 1776565762),
('laravel-cache-openmeteo_london', 'a:11:{s:8:\"latitude\";d:51.505753;s:9:\"longitude\";d:0.12904358;s:17:\"generationtime_ms\";d:0.34415721893310547;s:18:\"utc_offset_seconds\";i:3600;s:8:\"timezone\";s:13:\"Europe/London\";s:21:\"timezone_abbreviation\";s:5:\"GMT+1\";s:9:\"elevation\";d:3;s:21:\"current_weather_units\";a:7:{s:4:\"time\";s:7:\"iso8601\";s:8:\"interval\";s:7:\"seconds\";s:11:\"temperature\";s:3:\"°C\";s:9:\"windspeed\";s:4:\"km/h\";s:13:\"winddirection\";s:1:\"%\";s:6:\"is_day\";s:0:\"\";s:11:\"weathercode\";s:8:\"wmo code\";}s:15:\"current_weather\";a:7:{s:4:\"time\";s:16:\"2026-04-19T00:15\";s:8:\"interval\";i:900;s:11:\"temperature\";d:11.5;s:9:\"windspeed\";d:12.6;s:13:\"winddirection\";i:332;s:6:\"is_day\";i:0;s:11:\"weathercode\";i:2;}s:11:\"daily_units\";a:5:{s:4:\"time\";s:7:\"iso8601\";s:18:\"temperature_2m_max\";s:3:\"°C\";s:18:\"temperature_2m_min\";s:3:\"°C\";s:29:\"precipitation_probability_max\";s:1:\"%\";s:11:\"weathercode\";s:8:\"wmo code\";}s:5:\"daily\";a:5:{s:4:\"time\";a:3:{i:0;s:10:\"2026-04-19\";i:1;s:10:\"2026-04-20\";i:2;s:10:\"2026-04-21\";}s:18:\"temperature_2m_max\";a:3:{i:0;d:15.5;i:1;d:12.6;i:2;d:12.8;}s:18:\"temperature_2m_min\";a:3:{i:0;d:7.7;i:1;d:7.1;i:2;d:5.7;}s:29:\"precipitation_probability_max\";a:3:{i:0;i:3;i:1;i:8;i:2;i:14;}s:11:\"weathercode\";a:3:{i:0;i:3;i:1;i:51;i:2;i:3;}}}', 1776556533),
('laravel-cache-posts_limit_6', 'a:6:{i:0;a:4:{s:6:\"userId\";i:1;s:2:\"id\";i:1;s:5:\"title\";s:74:\"sunt aut facere repellat provident occaecati excepturi optio reprehenderit\";s:4:\"body\";s:158:\"quia et suscipit\nsuscipit recusandae consequuntur expedita et cum\nreprehenderit molestiae ut ut quas totam\nnostrum rerum est autem sunt rem eveniet architecto\";}i:1;a:4:{s:6:\"userId\";i:1;s:2:\"id\";i:2;s:5:\"title\";s:12:\"qui est esse\";s:4:\"body\";s:206:\"est rerum tempore vitae\nsequi sint nihil reprehenderit dolor beatae ea dolores neque\nfugiat blanditiis voluptate porro vel nihil molestiae ut reiciendis\nqui aperiam non debitis possimus qui neque nisi nulla\";}i:2;a:4:{s:6:\"userId\";i:1;s:2:\"id\";i:3;s:5:\"title\";s:59:\"ea molestias quasi exercitationem repellat qui ipsa sit aut\";s:4:\"body\";s:164:\"et iusto sed quo iure\nvoluptatem occaecati omnis eligendi aut ad\nvoluptatem doloribus vel accusantium quis pariatur\nmolestiae porro eius odio et labore et velit aut\";}i:3;a:4:{s:6:\"userId\";i:1;s:2:\"id\";i:4;s:5:\"title\";s:20:\"eum et est occaecati\";s:4:\"body\";s:190:\"ullam et saepe reiciendis voluptatem adipisci\nsit amet autem assumenda provident rerum culpa\nquis hic commodi nesciunt rem tenetur doloremque ipsam iure\nquis sunt voluptatem rerum illo velit\";}i:4;a:4:{s:6:\"userId\";i:1;s:2:\"id\";i:5;s:5:\"title\";s:18:\"nesciunt quas odio\";s:4:\"body\";s:147:\"repudiandae veniam quaerat sunt sed\nalias aut fugiat sit autem sed est\nvoluptatem omnis possimus esse voluptatibus quis\nest aut tenetur dolor neque\";}i:5;a:4:{s:6:\"userId\";i:1;s:2:\"id\";i:6;s:5:\"title\";s:34:\"dolorem eum magni eos aperiam quia\";s:4:\"body\";s:194:\"ut aspernatur corporis harum nihil quis provident sequi\nmollitia nobis aliquid molestiae\nperspiciatis et ea nemo ab reprehenderit accusantium quas\nvoluptate dolores velit et doloremque molestiae\";}}', 1777187391),
('laravel-cache-weather_Hinunangan', 'a:13:{s:5:\"coord\";a:2:{s:3:\"lon\";d:125.1985;s:3:\"lat\";d:10.3965;}s:7:\"weather\";a:1:{i:0;a:4:{s:2:\"id\";i:804;s:4:\"main\";s:6:\"Clouds\";s:11:\"description\";s:15:\"overcast clouds\";s:4:\"icon\";s:3:\"04d\";}}s:4:\"base\";s:8:\"stations\";s:4:\"main\";a:8:{s:4:\"temp\";d:30.18;s:10:\"feels_like\";d:34.98;s:8:\"temp_min\";d:30.18;s:8:\"temp_max\";d:30.18;s:8:\"pressure\";i:1008;s:8:\"humidity\";i:68;s:9:\"sea_level\";i:1008;s:10:\"grnd_level\";i:992;}s:10:\"visibility\";i:10000;s:4:\"wind\";a:3:{s:5:\"speed\";d:4.18;s:3:\"deg\";i:48;s:4:\"gust\";d:4.99;}s:6:\"clouds\";a:1:{s:3:\"all\";i:100;}s:2:\"dt\";i:1777186215;s:3:\"sys\";a:3:{s:7:\"country\";s:2:\"PH\";s:7:\"sunrise\";i:1777152207;s:6:\"sunset\";i:1777197025;}s:8:\"timezone\";i:28800;s:2:\"id\";i:1711596;s:4:\"name\";s:10:\"Hinunangan\";s:3:\"cod\";i:200;}', 1777186816);

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
(4, '2026_04_18_131959_create_personal_access_tokens_table', 1),
(5, '2026_04_18_132526_add_role_to_users_table', 2),
(6, '2026_04_18_133735_create_personal_access_tokens_table', 3);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
('wQIrhOMqiN4x2KyLjhX2Rr7J3E9t3oOij2fMGjGv', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiM0tGb1dqaUVmcE9hN0picGMyUjdLWnVJSDlpeVVIa3VHSm9lUFNZZiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1778737492),
('YXeFjgTXoPjcL1VbS1DQKeZMvZ6SX0pmhMs0JZ7i', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSG94WGU0Umt3eTJBYXgxRWJQd2k1SXhiTzJyZVgzRlRVQWtPT1pVbSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo3OiJ3ZWxjb21lIjt9fQ==', 1778744008);

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(6, 'admin chyn', 'chyn@gmail.com', NULL, '$2y$12$9y.OAyvRn2AhLkqT0M1fuOqlxUmWojNP7.rb050YWRGm9Ynioadma', NULL, '2026-04-18 18:45:50', '2026-04-22 17:19:36', 'admin'),
(7, 'user chyn', 'userchyn@gmail.com', NULL, '$2y$12$9nHPW2qF7CM96l84oskJseks8.UroWvoN9BFknFVRv803kQg.9zwu', NULL, '2026-04-22 17:20:32', '2026-04-22 17:20:32', 'user'),
(9, 'user', 'user@gmail.com', NULL, '$2y$12$aGJ2dOVBFbstHNYOWBYQ9.GGdmSH79NkCrpTDKhGngudPCY2kGowq', NULL, '2026-05-13 22:17:41', '2026-05-13 22:17:41', 'user'),
(10, 'admin', 'admin@gmail.com', NULL, '$2y$12$HeatMzIdfPlJoK9VVl6vnOVQSiQssVipAlX3J4xTHu4ntCXPd2Vne', NULL, '2026-05-13 22:21:38', '2026-05-13 22:21:38', 'admin');

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  ADD KEY `personal_access_tokens_expires_at_index` (`expires_at`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
