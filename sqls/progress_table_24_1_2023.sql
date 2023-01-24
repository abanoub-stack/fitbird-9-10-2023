-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for stack_fitbird
CREATE DATABASE IF NOT EXISTS `stack_fitbird` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `stack_fitbird`;

-- Dumping structure for table stack_fitbird.progress
CREATE TABLE IF NOT EXISTS `progress` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` bigint(20) unsigned NOT NULL,
  `progress_date` timestamp NOT NULL,
  `calories` decimal(8,4) NOT NULL,
  `workouts` int(11) NOT NULL,
  `seconds` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `progress_customer_id_foreign` (`customer_id`),
  CONSTRAINT `progress_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table stack_fitbird.progress: ~23 rows (approximately)
/*!40000 ALTER TABLE `progress` DISABLE KEYS */;
INSERT IGNORE INTO `progress` (`id`, `customer_id`, `progress_date`, `calories`, `workouts`, `seconds`, `created_at`, `updated_at`) VALUES
	(1, 149, '2023-01-22 08:39:00', 500.5000, 10, 3600, '2023-01-23 08:39:00', '2023-01-23 08:39:00'),
	(3, 149, '2023-01-23 09:28:51', 1520.0000, 10, 3600, '2023-01-23 09:09:13', '2023-01-23 09:28:51'),
	(4, 149, '2023-01-24 09:31:26', 1250.0000, 10, 3600, '2023-01-23 09:31:26', '2023-01-23 09:31:26'),
	(5, 149, '2023-01-25 09:31:45', 2100.3000, 10, 3600, '2023-01-23 09:31:45', '2023-01-23 09:31:45'),
	(7, 149, '2023-01-26 10:18:16', 600.5000, 10, 3600, '2023-01-23 09:48:03', '2023-01-23 10:18:16'),
	(13, 68, '2023-01-22 08:39:00', 500.5000, 10, 3600, '2023-01-23 08:39:00', '2023-01-23 08:39:00'),
	(14, 68, '2023-01-23 09:28:51', 1000.0000, 10, 3600, '2023-01-23 09:09:13', '2023-01-23 09:28:51'),
	(15, 68, '2023-01-24 09:31:26', 750.0000, 10, 3600, '2023-01-23 09:31:26', '2023-01-23 09:31:26'),
	(16, 68, '2023-01-25 09:31:45', 301.0000, 10, 3600, '2023-01-23 09:31:45', '2023-01-23 09:31:45'),
	(17, 68, '2023-01-26 10:18:16', 210.0000, 10, 3600, '2023-01-23 09:48:03', '2023-01-23 10:18:16'),
	(19, 142, '2023-01-23 09:28:51', 1000.0000, 10, 3600, '2023-01-23 09:09:13', '2023-01-23 09:28:51'),
	(20, 142, '2023-01-24 09:31:26', 1000.0000, 10, 3600, '2023-01-23 09:31:26', '2023-01-23 09:31:26'),
	(21, 142, '2023-01-25 09:31:45', 1000.0000, 10, 3600, '2023-01-23 09:31:45', '2023-01-23 09:31:45'),
	(23, 125, '2023-01-22 08:39:00', 700.0000, 10, 3600, '2023-01-23 08:39:00', '2023-01-23 08:39:00'),
	(24, 125, '2023-01-23 09:28:51', 3004.0000, 10, 3600, '2023-01-23 09:09:13', '2023-01-23 09:28:51'),
	(25, 125, '2023-01-24 09:31:26', 1000.0000, 10, 3600, '2023-01-23 09:31:26', '2023-01-23 09:31:26'),
	(26, 125, '2023-01-25 09:31:45', 1500.0000, 10, 3600, '2023-01-23 09:31:45', '2023-01-23 09:31:45'),
	(27, 125, '2023-01-26 10:18:16', 521.0000, 10, 3600, '2023-01-23 09:48:03', '2023-01-23 10:18:16'),
	(28, 56, '2023-01-23 10:18:16', 594.0000, 10, 3600, '2023-01-23 09:48:03', '2023-01-23 10:18:16'),
	(29, 56, '2023-01-22 10:18:16', 201.0000, 10, 3600, '2023-01-23 09:48:03', '2023-01-23 10:18:16'),
	(30, 56, '2023-01-24 10:18:16', 350.0000, 10, 3600, '2023-01-23 09:48:03', '2023-01-23 10:18:16'),
	(31, 56, '2023-01-25 10:18:16', 1000.0000, 10, 3600, '2023-01-23 09:48:03', '2023-01-23 10:18:16'),
	(32, 149, '2023-01-27 10:18:16', 1000.0000, 10, 3600, '2023-01-23 09:48:03', '2023-01-23 10:18:16');
/*!40000 ALTER TABLE `progress` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
