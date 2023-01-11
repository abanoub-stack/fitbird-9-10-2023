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


-- Dumping database structure for fitbird
CREATE DATABASE IF NOT EXISTS `fitbird` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `fitbird`;

-- Dumping structure for table fitbird.addresses
CREATE TABLE IF NOT EXISTS `addresses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `line1` text COLLATE utf8mb4_unicode_ci,
  `line2` text COLLATE utf8mb4_unicode_ci,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fitbird.addresses: ~0 rows (approximately)
/*!40000 ALTER TABLE `addresses` DISABLE KEYS */;
/*!40000 ALTER TABLE `addresses` ENABLE KEYS */;

-- Dumping structure for table fitbird.admin_notifications
CREATE TABLE IF NOT EXISTS `admin_notifications` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `admin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `readed` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fitbird.admin_notifications: ~0 rows (approximately)
/*!40000 ALTER TABLE `admin_notifications` DISABLE KEYS */;
INSERT IGNORE INTO `admin_notifications` (`id`, `admin`, `message`, `created_at`, `updated_at`, `readed`) VALUES
	(1, 'admin', 'Logged In Successfully', '2023-01-09 12:47:28', '2023-01-09 12:47:28', NULL);
/*!40000 ALTER TABLE `admin_notifications` ENABLE KEYS */;

-- Dumping structure for table fitbird.android_metadata
CREATE TABLE IF NOT EXISTS `android_metadata` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fitbird.android_metadata: ~0 rows (approximately)
/*!40000 ALTER TABLE `android_metadata` DISABLE KEYS */;
/*!40000 ALTER TABLE `android_metadata` ENABLE KEYS */;

-- Dumping structure for table fitbird.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fitbird.categories: ~0 rows (approximately)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Dumping structure for table fitbird.complete_workouts
CREATE TABLE IF NOT EXISTS `complete_workouts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `workout_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `calories` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `todays_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_exercise` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fitbird.complete_workouts: ~0 rows (approximately)
/*!40000 ALTER TABLE `complete_workouts` DISABLE KEYS */;
/*!40000 ALTER TABLE `complete_workouts` ENABLE KEYS */;

-- Dumping structure for table fitbird.credit_cards
CREATE TABLE IF NOT EXISTS `credit_cards` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `card_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exp_month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exp_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cvc` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fitbird.credit_cards: ~0 rows (approximately)
/*!40000 ALTER TABLE `credit_cards` DISABLE KEYS */;
/*!40000 ALTER TABLE `credit_cards` ENABLE KEYS */;

-- Dumping structure for table fitbird.customers
CREATE TABLE IF NOT EXISTS `customers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('male','female','choose') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'choose',
  `workout_intensity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `exercise_days` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `access_token` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_subcribed` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `subscription_type` enum('month','six_months','year') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'month',
  `subscription_started_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subscription_finished_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `customers_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fitbird.customers: ~0 rows (approximately)
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;

-- Dumping structure for table fitbird.customer_notifications
CREATE TABLE IF NOT EXISTS `customer_notifications` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `readed` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fitbird.customer_notifications: ~0 rows (approximately)
/*!40000 ALTER TABLE `customer_notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `customer_notifications` ENABLE KEYS */;

-- Dumping structure for table fitbird.customer_subscribtion
CREATE TABLE IF NOT EXISTS `customer_subscribtion` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `customer_stripe_charge_id` int(11) DEFAULT NULL,
  `stripe_customer_id` int(11) DEFAULT NULL,
  `duration` enum('day','week','month','year') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'month',
  `approviation_status` enum('pending','accepted','canceled','finished') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `started_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `finishes_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fitbird.customer_subscribtion: ~0 rows (approximately)
/*!40000 ALTER TABLE `customer_subscribtion` DISABLE KEYS */;
/*!40000 ALTER TABLE `customer_subscribtion` ENABLE KEYS */;

-- Dumping structure for table fitbird.customworkouts
CREATE TABLE IF NOT EXISTS `customworkouts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `categoty_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `calories` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cycle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intervaltime` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totalexercise` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gif` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fitbird.customworkouts: ~0 rows (approximately)
/*!40000 ALTER TABLE `customworkouts` DISABLE KEYS */;
/*!40000 ALTER TABLE `customworkouts` ENABLE KEYS */;

-- Dumping structure for table fitbird.exercises
CREATE TABLE IF NOT EXISTS `exercises` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `repeat_count` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cat_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `calories` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gif` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT NULL,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fitbird.exercises: ~0 rows (approximately)
/*!40000 ALTER TABLE `exercises` DISABLE KEYS */;
/*!40000 ALTER TABLE `exercises` ENABLE KEYS */;

-- Dumping structure for table fitbird.exercise_categories
CREATE TABLE IF NOT EXISTS `exercise_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cat_icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fitbird.exercise_categories: ~0 rows (approximately)
/*!40000 ALTER TABLE `exercise_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `exercise_categories` ENABLE KEYS */;

-- Dumping structure for table fitbird.exercise_package
CREATE TABLE IF NOT EXISTS `exercise_package` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `exercise_id` bigint(20) DEFAULT NULL,
  `package_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fitbird.exercise_package: ~0 rows (approximately)
/*!40000 ALTER TABLE `exercise_package` DISABLE KEYS */;
/*!40000 ALTER TABLE `exercise_package` ENABLE KEYS */;

-- Dumping structure for table fitbird.exercise_sets
CREATE TABLE IF NOT EXISTS `exercise_sets` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `exercise_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fitbird.exercise_sets: ~0 rows (approximately)
/*!40000 ALTER TABLE `exercise_sets` DISABLE KEYS */;
/*!40000 ALTER TABLE `exercise_sets` ENABLE KEYS */;

-- Dumping structure for table fitbird.exercise_steps
CREATE TABLE IF NOT EXISTS `exercise_steps` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `exercise_id` int(11) DEFAULT NULL,
  `step` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fitbird.exercise_steps: ~0 rows (approximately)
/*!40000 ALTER TABLE `exercise_steps` DISABLE KEYS */;
/*!40000 ALTER TABLE `exercise_steps` ENABLE KEYS */;

-- Dumping structure for table fitbird.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fitbird.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table fitbird.history_payments
CREATE TABLE IF NOT EXISTS `history_payments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `date_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fitbird.history_payments: ~0 rows (approximately)
/*!40000 ALTER TABLE `history_payments` DISABLE KEYS */;
/*!40000 ALTER TABLE `history_payments` ENABLE KEYS */;

-- Dumping structure for table fitbird.home_categories
CREATE TABLE IF NOT EXISTS `home_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tot_exercise` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `calories` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fitbird.home_categories: ~0 rows (approximately)
/*!40000 ALTER TABLE `home_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `home_categories` ENABLE KEYS */;

-- Dumping structure for table fitbird.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fitbird.migrations: ~39 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT IGNORE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_05_03_000002_create_subscriptions_table', 1),
	(4, '2019_05_03_000003_create_subscription_items_table', 1),
	(5, '2019_08_19_000000_create_failed_jobs_table', 1),
	(6, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(7, '2022_11_09_175025_create_android_metadata_table', 1),
	(8, '2022_11_09_175255_create_categories_table', 1),
	(9, '2022_11_09_175420_create_complete_workouts_table', 1),
	(10, '2022_11_09_175558_create_customworkouts_table', 1),
	(11, '2022_11_09_175821_create_exercises_table', 1),
	(12, '2022_11_09_180002_create_exercise_sets_table', 1),
	(13, '2022_11_09_180127_create_exercise_steps_table', 1),
	(14, '2022_11_09_180226_create_ex_categories_table', 1),
	(15, '2022_11_09_180333_create_home_categories_table', 1),
	(16, '2022_11_09_180500_create_notifications_table', 1),
	(17, '2022_11_09_180611_create_settings_table', 1),
	(18, '2022_11_09_180658_create_tokandata_table', 1),
	(19, '2022_11_10_164930_add_column_to_categories_table', 1),
	(20, '2022_11_10_184823_add_column_to_exercises_table', 1),
	(21, '2022_11_13_082550_add_role_column_to_users_table', 1),
	(22, '2022_11_13_110557_create_admin_notifications_table', 1),
	(23, '2022_11_13_111647_add_readed_column_to_admin_notifications_table', 1),
	(24, '2022_11_14_081511_create_customers_table', 1),
	(25, '2022_11_14_081818_create_packages_table', 1),
	(26, '2022_11_14_110833_create_exercise_package_table', 1),
	(27, '2022_11_14_141208_add_access_token_to_customers_table', 1),
	(28, '2022_11_14_143029_add_password_column_to_customers_table', 1),
	(29, '2022_11_15_112249_create_stripe_customers_table', 1),
	(30, '2022_11_15_113356_create_stripe_charges_table', 1),
	(31, '2022_11_16_081850_create_customer_subscribtion_table', 1),
	(32, '2022_11_16_091357_add_status_column_to_subscriptions_table', 1),
	(33, '2022_11_16_114115_add_email_column_to_customers_table', 1),
	(34, '2022_11_16_114632_create_addresses_table', 1),
	(35, '2022_11_16_133252_create_credit_cards_table', 1),
	(36, '2022_11_17_102210_create_customer_notifications_table', 1),
	(37, '2022_11_17_123037_create_prices_table', 1),
	(38, '2022_12_04_093526_add_column_to_customers_table', 1),
	(39, '2022_12_13_110907_create_history_payments_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table fitbird.notifications
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `android_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ios_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fitbird.notifications: ~0 rows (approximately)
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
INSERT IGNORE INTO `notifications` (`id`, `android_key`, `ios_key`, `created_at`, `updated_at`) VALUES
	(1, '', '', '2023-01-09 12:47:13', '2023-01-09 12:47:13');
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;

-- Dumping structure for table fitbird.packages
CREATE TABLE IF NOT EXISTS `packages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` bigint(20) unsigned DEFAULT NULL,
  `category_id` bigint(20) unsigned DEFAULT NULL,
  `exercise_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fitbird.packages: ~0 rows (approximately)
/*!40000 ALTER TABLE `packages` DISABLE KEYS */;
/*!40000 ALTER TABLE `packages` ENABLE KEYS */;

-- Dumping structure for table fitbird.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fitbird.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table fitbird.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fitbird.personal_access_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Dumping structure for table fitbird.prices
CREATE TABLE IF NOT EXISTS `prices` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `price` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fitbird.prices: ~0 rows (approximately)
/*!40000 ALTER TABLE `prices` DISABLE KEYS */;
/*!40000 ALTER TABLE `prices` ENABLE KEYS */;

-- Dumping structure for table fitbird.settings
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fitbird.settings: ~0 rows (approximately)
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;

-- Dumping structure for table fitbird.stripe_charges
CREATE TABLE IF NOT EXISTS `stripe_charges` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'usd',
  `stripe_customer_id` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fitbird.stripe_charges: ~0 rows (approximately)
/*!40000 ALTER TABLE `stripe_charges` DISABLE KEYS */;
/*!40000 ALTER TABLE `stripe_charges` ENABLE KEYS */;

-- Dumping structure for table fitbird.stripe_customers
CREATE TABLE IF NOT EXISTS `stripe_customers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exp_month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exp_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cvc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fitbird.stripe_customers: ~0 rows (approximately)
/*!40000 ALTER TABLE `stripe_customers` DISABLE KEYS */;
/*!40000 ALTER TABLE `stripe_customers` ENABLE KEYS */;

-- Dumping structure for table fitbird.subscriptions
CREATE TABLE IF NOT EXISTS `subscriptions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('pending','approved','canceled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`id`),
  UNIQUE KEY `subscriptions_stripe_id_unique` (`stripe_id`),
  KEY `subscriptions_user_id_stripe_status_index` (`user_id`,`stripe_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fitbird.subscriptions: ~0 rows (approximately)
/*!40000 ALTER TABLE `subscriptions` DISABLE KEYS */;
/*!40000 ALTER TABLE `subscriptions` ENABLE KEYS */;

-- Dumping structure for table fitbird.subscription_items
CREATE TABLE IF NOT EXISTS `subscription_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `subscription_id` bigint(20) unsigned NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `subscription_items_subscription_id_stripe_price_unique` (`subscription_id`,`stripe_price`),
  UNIQUE KEY `subscription_items_stripe_id_unique` (`stripe_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fitbird.subscription_items: ~0 rows (approximately)
/*!40000 ALTER TABLE `subscription_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `subscription_items` ENABLE KEYS */;

-- Dumping structure for table fitbird.tokandata
CREATE TABLE IF NOT EXISTS `tokandata` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `delivery_boyid` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fitbird.tokandata: ~0 rows (approximately)
/*!40000 ALTER TABLE `tokandata` DISABLE KEYS */;
/*!40000 ALTER TABLE `tokandata` ENABLE KEYS */;

-- Dumping structure for table fitbird.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` enum('ADMIN','SUPER_ADMIN') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ADMIN',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fitbird.users: ~0 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT IGNORE INTO `users` (`id`, `name`, `email`, `currency`, `password`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
	(1, 'admin', 'admin@gmail.com', 'EG', '$2y$10$vc.bjN0M6gzQI5yQ.BIqlOMhIyv5WKqL8Kryjg4Eg8ASwh53pcQlm', NULL, NULL, '2023-01-09 12:47:13', '2023-01-09 12:47:13', 'SUPER_ADMIN');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
