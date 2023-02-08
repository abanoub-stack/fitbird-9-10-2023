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

-- Dumping structure for table stack_fitbird.training_sections
CREATE TABLE IF NOT EXISTS `training_sections` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table stack_fitbird.training_sections: ~3 rows (approximately)
/*!40000 ALTER TABLE `training_sections` DISABLE KEYS */;
INSERT IGNORE INTO `training_sections` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Warm Up', '2023-02-08 13:03:11', '2023-02-08 13:16:34'),
	(4, 'Primary Workout', '2023-02-08 13:16:29', '2023-02-08 13:16:29'),
	(5, 'Post Main Workout', '2023-02-08 13:16:58', '2023-02-08 13:16:58');
/*!40000 ALTER TABLE `training_sections` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
