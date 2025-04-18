-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 17, 2025 at 12:14 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food`
--

-- --------------------------------------------------------

--
-- Table structure for table `meal_plans`
--

CREATE TABLE `meal_plans` (
  `id` bigint UNSIGNED NOT NULL,
  `menu_type_id` bigint UNSIGNED NOT NULL,
  `customer_id` bigint UNSIGNED NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `persons` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_address` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `status` enum('pending','in-progress','completed','cancelled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meal_plans`
--

INSERT INTO `meal_plans` (`id`, `menu_type_id`, `customer_id`, `company`, `phone`, `persons`, `delivery_address`, `start_date`, `status`, `created_at`, `updated_at`, `deleted_at`, `deleted_by`) VALUES
(1, 1, 1, 'Bonner and Haley Plc30', '03035991735', '30', 'Veniam sunt repreh', '2025-01-17', 'pending', '2025-01-16 07:46:17', '2025-01-16 07:46:17', NULL, NULL),
(2, 1, 1, 'IPS', '03035991735', '1200', 'adfadsf', '2025-01-17', 'pending', '2025-01-16 08:20:57', '2025-01-16 08:20:57', NULL, NULL),
(3, 1, 1, 'Ruiz Hatfield Associates', '03035991735', '73', 'Harum dignissimos re', '2025-01-16', 'pending', '2025-01-16 08:33:07', '2025-01-16 08:33:07', NULL, NULL),
(4, 1, 1, 'Ruiz Hatfield Associates', '03035991735', '73', 'Harum dignissimos re', '2025-01-16', 'pending', '2025-01-16 08:33:15', '2025-01-16 08:33:15', NULL, NULL),
(5, 1, 1, 'Ruiz Hatfield Associates', '03035991735', '73', 'Harum dignissimos re', '2025-01-16', 'completed', '2025-01-16 08:34:42', '2025-01-16 08:35:54', NULL, NULL),
(6, 2, 4, 'IPS', '03035991735', '120', 'adsfas', '2025-01-30', 'pending', '2025-01-16 08:41:03', '2025-01-16 08:41:03', NULL, NULL),
(7, 1, 2, 'IPS2', '03035991735', '121', 'IPS2', '2025-01-18', 'pending', '2025-01-17 08:02:05', '2025-01-17 08:04:28', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `meal_plans`
--
ALTER TABLE `meal_plans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meal_plans_menu_type_id_foreign` (`menu_type_id`),
  ADD KEY `meal_plans_customer_id_foreign` (`customer_id`),
  ADD KEY `meal_plans_deleted_by_foreign` (`deleted_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `meal_plans`
--
ALTER TABLE `meal_plans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `meal_plans`
--
ALTER TABLE `meal_plans`
  ADD CONSTRAINT `meal_plans_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `meal_plans_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `meal_plans_menu_type_id_foreign` FOREIGN KEY (`menu_type_id`) REFERENCES `menu_types` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
