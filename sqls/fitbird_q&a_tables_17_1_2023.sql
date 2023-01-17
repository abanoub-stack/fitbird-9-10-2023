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

-- Dumping structure for table stack_fitbird.answers
CREATE TABLE IF NOT EXISTS `answers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `question_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `body` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `answers_question_id_foreign` (`question_id`),
  KEY `answers_user_id_foreign` (`user_id`),
  CONSTRAINT `answers_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `answers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table stack_fitbird.answers: ~2 rows (approximately)
/*!40000 ALTER TABLE `answers` DISABLE KEYS */;
INSERT IGNORE INTO `answers` (`id`, `question_id`, `user_id`, `body`, `created_at`, `updated_at`) VALUES
	(1, 24, 148, '["home"]', '2023-01-11 11:50:05', '2023-01-17 08:42:49'),
	(7, 26, 148, '["Male"]', '2023-01-15 10:29:09', '2023-01-17 08:45:48'),
	(8, 25, 148, '["23"]', '2023-01-15 10:36:18', '2023-01-17 08:45:21'),
	(9, 27, 148, '["home", "contact us"]', '2023-01-17 08:46:29', '2023-01-17 08:46:29'),
	(10, 28, 148, '["By doing exercises every day"]', '2023-01-17 09:06:49', '2023-01-17 09:06:49');
/*!40000 ALTER TABLE `answers` ENABLE KEYS */;

-- Dumping structure for table stack_fitbird.questions
CREATE TABLE IF NOT EXISTS `questions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('field','area','single','multiple') COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `choice_number` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table stack_fitbird.questions: ~4 rows (approximately)
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT IGNORE INTO `questions` (`id`, `title`, `type`, `body`, `created_at`, `updated_at`, `choice_number`) VALUES
	(24, 'What is the file that the server waits it to run the project ?', 'single', '["home", "about", "12"]', '2023-01-09 15:51:58', '2023-01-11 10:32:24', 3),
	(25, 'How Old Are You ?', 'field', NULL, '2023-01-09 15:53:22', '2023-01-17 08:41:40', 0),
	(26, 'What is your gender ?', 'single', '["Male", "Female"]', '2023-01-10 09:47:15', '2023-01-17 08:41:09', 2),
	(27, 'What is your fav icon?', 'multiple', '["home", "about us", "contact us"]', '2023-01-10 09:58:45', '2023-01-17 08:41:21', 3),
	(28, 'How To Lose Your Weight ?', 'area', NULL, '2023-01-11 09:51:11', '2023-01-11 09:51:11', NULL);
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
