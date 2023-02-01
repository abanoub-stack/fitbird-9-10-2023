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

-- Dumping structure for table stack_fitbird.free_exercises
CREATE TABLE IF NOT EXISTS `free_exercises` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `repeat_count` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cat_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `calories` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gif` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT NULL,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table stack_fitbird.free_exercises: ~2 rows (approximately)
/*!40000 ALTER TABLE `free_exercises` DISABLE KEYS */;
INSERT IGNORE INTO `free_exercises` (`id`, `name`, `image`, `repeat_count`, `url`, `cat_name`, `timee`, `calories`, `gif`, `is_deleted`, `deleted_at`, `category_id`, `created_at`, `updated_at`) VALUES
	(1, 'Bi0.', 'exercises/3R8eBgIRHKQWgrlptCnDoaKqmeTMKOjJW3pPTE7N.jpg', '1', 'https://www.youtube.com/watch?v=hWv-8KmHTHM&ab_channel=JoachimPettersson', 'total body exercises', '30', '20', NULL, 0, NULL, 1, '2023-02-01 13:21:15', '2023-02-01 13:46:57'),
	(2, 'Free Exe Test', 'exercises/Z4HC4JV01CgXk8b7A24Wagg7YSlSmf4N6gwPlzm4.png', '5', 'https://www.youtube.com/watch?v=hWv-8KmHTHM&ab_channel=JoachimPettersson', 'Shea Carver', '30', '200', NULL, 0, NULL, 37, '2023-02-01 13:30:03', '2023-02-01 13:31:44');
/*!40000 ALTER TABLE `free_exercises` ENABLE KEYS */;

-- Dumping structure for table stack_fitbird.free_exercise_steps
CREATE TABLE IF NOT EXISTS `free_exercise_steps` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `free_exercise_id` int(11) DEFAULT NULL,
  `step` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table stack_fitbird.free_exercise_steps: ~1 rows (approximately)
/*!40000 ALTER TABLE `free_exercise_steps` DISABLE KEYS */;
INSERT IGNORE INTO `free_exercise_steps` (`id`, `free_exercise_id`, `step`, `created_at`, `updated_at`) VALUES
	(2, 2, 'had laklas d sakldn asdas', '2023-02-01 13:46:27', '2023-02-01 13:46:27'),
	(3, 2, '+65+ad ;amda kld', '2023-02-01 13:46:35', '2023-02-01 13:46:35');
/*!40000 ALTER TABLE `free_exercise_steps` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
