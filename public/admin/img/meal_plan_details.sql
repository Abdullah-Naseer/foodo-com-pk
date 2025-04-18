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
-- Table structure for table `meal_plan_details`
--

CREATE TABLE `meal_plan_details` (
  `id` bigint UNSIGNED NOT NULL,
  `meal_plan_id` bigint UNSIGNED NOT NULL,
  `menu_id` bigint UNSIGNED NOT NULL,
  `day` enum('Mon','Tue','Wed','Thu','Fri','Sat','Sun') COLLATE utf8mb4_unicode_ci NOT NULL,
  `week` tinyint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meal_plan_details`
--

INSERT INTO `meal_plan_details` (`id`, `meal_plan_id`, `menu_id`, `day`, `week`, `created_at`, `updated_at`, `deleted_at`, `deleted_by`) VALUES
(1, 2, 90, 'Mon', 1, '2025-01-16 08:20:57', '2025-01-16 08:20:57', NULL, NULL),
(2, 2, 91, 'Tue', 1, '2025-01-16 08:20:57', '2025-01-16 08:20:57', NULL, NULL),
(3, 2, 95, 'Wed', 1, '2025-01-16 08:20:57', '2025-01-16 08:20:57', NULL, NULL),
(4, 2, 100, 'Thu', 1, '2025-01-16 08:20:57', '2025-01-16 08:20:57', NULL, NULL),
(5, 2, 106, 'Fri', 1, '2025-01-16 08:20:57', '2025-01-16 08:20:57', NULL, NULL),
(6, 2, 108, 'Mon', 2, '2025-01-16 08:20:57', '2025-01-16 08:20:57', NULL, NULL),
(7, 2, 104, 'Tue', 2, '2025-01-16 08:20:57', '2025-01-16 08:20:57', NULL, NULL),
(8, 2, 101, 'Wed', 2, '2025-01-16 08:20:57', '2025-01-16 08:20:57', NULL, NULL),
(9, 2, 98, 'Thu', 2, '2025-01-16 08:20:57', '2025-01-16 08:20:57', NULL, NULL),
(10, 2, 95, 'Fri', 2, '2025-01-16 08:20:57', '2025-01-16 08:20:57', NULL, NULL),
(11, 2, 100, 'Mon', 3, '2025-01-16 08:20:57', '2025-01-16 08:20:57', NULL, NULL),
(12, 2, 105, 'Tue', 3, '2025-01-16 08:20:57', '2025-01-16 08:20:57', NULL, NULL),
(13, 2, 106, 'Wed', 3, '2025-01-16 08:20:57', '2025-01-16 08:20:57', NULL, NULL),
(14, 2, 99, 'Thu', 3, '2025-01-16 08:20:57', '2025-01-16 08:20:57', NULL, NULL),
(15, 2, 96, 'Fri', 3, '2025-01-16 08:20:57', '2025-01-16 08:20:57', NULL, NULL),
(16, 2, 100, 'Mon', 4, '2025-01-16 08:20:57', '2025-01-16 08:20:57', NULL, NULL),
(17, 2, 98, 'Tue', 4, '2025-01-16 08:20:57', '2025-01-16 08:20:57', NULL, NULL),
(18, 2, 95, 'Wed', 4, '2025-01-16 08:20:57', '2025-01-16 08:20:57', NULL, NULL),
(19, 2, 92, 'Thu', 4, '2025-01-16 08:20:57', '2025-01-16 08:20:57', NULL, NULL),
(20, 2, 90, 'Fri', 4, '2025-01-16 08:20:57', '2025-01-16 08:20:57', NULL, NULL),
(21, 7, 94, 'Mon', 1, '2025-01-17 08:02:05', '2025-01-17 08:02:05', NULL, NULL),
(22, 7, 92, 'Tue', 1, '2025-01-17 08:02:05', '2025-01-17 08:02:05', NULL, NULL),
(23, 7, 90, 'Wed', 1, '2025-01-17 08:02:05', '2025-01-17 08:02:05', NULL, NULL),
(24, 7, 106, 'Thu', 1, '2025-01-17 08:02:06', '2025-01-17 08:02:06', NULL, NULL),
(25, 7, 108, 'Fri', 1, '2025-01-17 08:02:06', '2025-01-17 08:02:06', NULL, NULL),
(26, 7, 102, 'Mon', 2, '2025-01-17 08:02:06', '2025-01-17 08:02:06', NULL, NULL),
(27, 7, 103, 'Tue', 2, '2025-01-17 08:02:06', '2025-01-17 08:02:06', NULL, NULL),
(28, 7, 104, 'Wed', 2, '2025-01-17 08:02:06', '2025-01-17 08:02:06', NULL, NULL),
(29, 7, 106, 'Thu', 2, '2025-01-17 08:02:06', '2025-01-17 08:02:06', NULL, NULL),
(30, 7, 105, 'Fri', 2, '2025-01-17 08:02:06', '2025-01-17 08:02:06', NULL, NULL),
(31, 7, 103, 'Mon', 3, '2025-01-17 08:02:06', '2025-01-17 08:02:06', NULL, NULL),
(32, 7, 101, 'Tue', 3, '2025-01-17 08:02:06', '2025-01-17 08:02:06', NULL, NULL),
(33, 7, 100, 'Wed', 3, '2025-01-17 08:02:06', '2025-01-17 08:02:06', NULL, NULL),
(34, 7, 98, 'Thu', 3, '2025-01-17 08:02:06', '2025-01-17 08:02:06', NULL, NULL),
(35, 7, 96, 'Fri', 3, '2025-01-17 08:02:06', '2025-01-17 08:02:06', NULL, NULL),
(36, 7, 96, 'Mon', 4, '2025-01-17 08:02:06', '2025-01-17 08:02:06', NULL, NULL),
(37, 7, 95, 'Tue', 4, '2025-01-17 08:02:06', '2025-01-17 08:02:06', NULL, NULL),
(38, 7, 94, 'Wed', 4, '2025-01-17 08:02:06', '2025-01-17 08:02:06', NULL, NULL),
(39, 7, 92, 'Thu', 4, '2025-01-17 08:02:06', '2025-01-17 08:02:06', NULL, NULL),
(40, 7, 91, 'Fri', 4, '2025-01-17 08:02:06', '2025-01-17 08:02:06', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `meal_plan_details`
--
ALTER TABLE `meal_plan_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meal_plan_details_meal_plan_id_foreign` (`meal_plan_id`),
  ADD KEY `meal_plan_details_menu_id_foreign` (`menu_id`),
  ADD KEY `meal_plan_details_deleted_by_foreign` (`deleted_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `meal_plan_details`
--
ALTER TABLE `meal_plan_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `meal_plan_details`
--
ALTER TABLE `meal_plan_details`
  ADD CONSTRAINT `meal_plan_details_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `meal_plan_details_meal_plan_id_foreign` FOREIGN KEY (`meal_plan_id`) REFERENCES `meal_plans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `meal_plan_details_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
