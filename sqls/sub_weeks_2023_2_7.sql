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

-- Dumping structure for table stack_fitbird.subscribe_weeks
CREATE TABLE IF NOT EXISTS `subscribe_weeks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` bigint(20) unsigned NOT NULL,
  `data` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subscribe_weeks_customer_id_foreign` (`customer_id`),
  CONSTRAINT `subscribe_weeks_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE
)
 ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table stack_fitbird.subscribe_weeks: ~0 rows (approximately)
/*!40000 ALTER TABLE `subscribe_weeks` DISABLE KEYS */;
INSERT IGNORE INTO `subscribe_weeks` (`id`, `customer_id`, `data`, `created_at`, `updated_at`) VALUES
	(1, 27, '{"1": {"1": {"exe_array": [], "is_completed": false}, "2": {"exe_array": [], "is_completed": false}, "3": {"exe_array": [], "is_completed": false}, "4": {"exe_array": [], "is_completed": false}, "5": {"exe_array": [], "is_completed": false}, "6": {"exe_array": [], "is_completed": false}, "7": {"exe_array": [], "is_completed": false}}, "2": {"1": {"exe_array": [], "is_completed": false}, "2": {"exe_array": [], "is_completed": false}, "3": {"exe_array": [], "is_completed": false}, "4": {"exe_array": [], "is_completed": false}, "5": {"exe_array": [], "is_completed": false}, "6": {"exe_array": [], "is_completed": false}, "7": {"exe_array": [], "is_completed": false}}, "3": {"1": {"exe_array": [], "is_completed": false}, "2": {"exe_array": [], "is_completed": false}, "3": {"exe_array": [], "is_completed": false}, "4": {"exe_array": [], "is_completed": false}, "5": {"exe_array": [], "is_completed": false}, "6": {"exe_array": [], "is_completed": false}, "7": {"exe_array": [], "is_completed": false}}, "4": {"1": {"exe_array": [], "is_completed": false}, "2": {"exe_array": [], "is_completed": false}, "3": {"exe_array": [], "is_completed": false}, "4": {"exe_array": [], "is_completed": false}, "5": {"exe_array": [], "is_completed": false}, "6": {"exe_array": [], "is_completed": false}, "7": {"exe_array": [], "is_completed": false}}}', '2023-02-06 14:10:57', '2023-02-06 14:10:57'),
	(2, 118, '{"1": {"1": {"exe_array": [], "is_completed": false}, "2": {"exe_array": [], "is_completed": false}, "3": {"exe_array": [], "is_completed": false}, "4": {"exe_array": [], "is_completed": false}, "5": {"exe_array": [], "is_completed": false}, "6": {"exe_array": [], "is_completed": false}, "7": {"exe_array": [], "is_completed": false}}, "2": {"1": {"exe_array": [], "is_completed": false}, "2": {"exe_array": [], "is_completed": false}, "3": {"exe_array": [], "is_completed": false}, "4": {"exe_array": [], "is_completed": false}, "5": {"exe_array": [], "is_completed": false}, "6": {"exe_array": [], "is_completed": false}, "7": {"exe_array": [], "is_completed": false}}, "3": {"1": {"exe_array": [], "is_completed": false}, "2": {"exe_array": [], "is_completed": false}, "3": {"exe_array": [], "is_completed": false}, "4": {"exe_array": [], "is_completed": false}, "5": {"exe_array": [], "is_completed": false}, "6": {"exe_array": [], "is_completed": false}, "7": {"exe_array": [], "is_completed": false}}, "4": {"1": {"exe_array": [], "is_completed": false}, "2": {"exe_array": [], "is_completed": false}, "3": {"exe_array": [], "is_completed": false}, "4": {"exe_array": [], "is_completed": false}, "5": {"exe_array": [], "is_completed": false}, "6": {"exe_array": [], "is_completed": false}, "7": {"exe_array": [], "is_completed": false}}}', '2023-02-06 14:12:00', '2023-02-06 14:12:00'),
	(3, 149, '{"1": {"1": {"exe_array": [], "is_completed": false}, "2": {"exe_array": [], "is_completed": false}, "3": {"exe_array": [], "is_completed": false}, "4": {"exe_array": [], "is_completed": false}, "5": {"exe_array": [], "is_completed": false}, "6": {"exe_array": [], "is_completed": false}, "7": {"exe_array": [], "is_completed": false}}, "2": {"1": {"exe_array": [], "is_completed": false}, "2": {"exe_array": [], "is_completed": false}, "3": {"exe_array": [], "is_completed": false}, "4": {"exe_array": [], "is_completed": false}, "5": {"exe_array": [], "is_completed": false}, "6": {"exe_array": [], "is_completed": false}, "7": {"exe_array": [], "is_completed": false}}, "3": {"1": {"exe_array": [], "is_completed": false}, "2": {"exe_array": [], "is_completed": false}, "3": {"exe_array": [], "is_completed": false}, "4": {"exe_array": [], "is_completed": false}, "5": {"exe_array": [], "is_completed": false}, "6": {"exe_array": [], "is_completed": false}, "7": {"exe_array": [], "is_completed": false}}, "4": {"1": {"exe_array": [], "is_completed": false}, "2": {"exe_array": [], "is_completed": false}, "3": {"exe_array": [], "is_completed": false}, "4": {"exe_array": [], "is_completed": false}, "5": {"exe_array": [], "is_completed": false}, "6": {"exe_array": [], "is_completed": false}, "7": {"exe_array": [], "is_completed": false}}}', '2023-02-07 08:13:30', '2023-02-07 08:13:30');
/*!40000 ALTER TABLE `subscribe_weeks` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
