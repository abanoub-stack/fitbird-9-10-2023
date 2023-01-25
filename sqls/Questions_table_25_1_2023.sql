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

-- Dumping structure for table stack_fitbird.questions
CREATE TABLE IF NOT EXISTS `questions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `type` enum('field','area','single','multiple') COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `choice_number` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table stack_fitbird.questions: ~10 rows (approximately)
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT IGNORE INTO `questions` (`id`, `title`, `description`, `type`, `body`, `created_at`, `updated_at`, `choice_number`) VALUES
	(24, 'What is the file that the server waits it to run the project ?', 'it\'s the the start point of start', 'single', '["28", "30", "31"]', '2023-01-09 15:51:58', '2023-01-22 10:46:36', 3),
	(25, 'How Old Are You ?', NULL, 'field', NULL, '2023-01-09 15:53:22', '2023-01-22 11:09:23', NULL),
	(26, 'What is your gender ?', NULL, 'single', '["Male", "Female"]', '2023-01-10 09:47:15', '2023-01-17 08:41:09', 2),
	(27, 'What is your fav icon?', NULL, 'multiple', '["home", "about us", "contact us"]', '2023-01-10 09:58:45', '2023-01-22 11:27:37', 5),
	(28, 'How To Lose Your Weight ?', NULL, 'area', NULL, '2023-01-11 09:51:11', '2023-01-11 09:51:11', NULL),
	(29, 'Who Are You ?', NULL, 'area', NULL, '2023-01-17 14:12:30', '2023-01-17 14:13:07', NULL),
	(31, 'What is Ajax ?', 'describe ajax', 'area', NULL, '2023-01-17 14:14:19', '2023-01-17 14:16:38', NULL),
	(32, 'Ask me ?', NULL, 'field', NULL, '2023-01-22 10:41:27', '2023-01-22 10:41:40', NULL),
	(33, 'How many days in the month ?', 'choose one choice', 'single', '["29", "30", "31"]', '2023-01-22 10:44:49', '2023-01-22 11:06:34', 3),
	(34, '1+1 = ... ?', 'solve the equation', 'single', '["0", "1", "2", "3", "4"]', '2023-01-22 11:10:44', '2023-01-22 11:10:55', 5),
	(38, '60', '12', 'single', '["59+1", "69+2", "36+6"]', '2023-01-25 08:51:35', '2023-01-25 08:51:47', 3);
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
