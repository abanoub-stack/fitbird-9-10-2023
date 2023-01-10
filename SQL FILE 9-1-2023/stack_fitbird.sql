-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 09, 2023 at 12:58 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stack_fitbird`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `line1` text DEFAULT NULL,
  `line2` text DEFAULT NULL,
  `postal_code` varchar(255) DEFAULT NULL,
  `state` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `customer_id`, `city`, `country`, `line1`, `line2`, `postal_code`, `state`, `created_at`, `updated_at`) VALUES
(14, 1, 'Alexandria', 'EG', 'Seyouf Shamaa', 'Dawaran El Matafy', '2214', 'Alex', '2022-11-16 14:53:40', '2022-11-16 14:53:40'),
(17, 17, 'Alexandria', 'EG', 'ElSeyouf Shamaa', 'dawaran el matafy', '2241', 'Alex', '2022-11-16 12:55:40', '2022-11-16 12:55:40'),
(18, 18, 'Alexandria', 'EG', 'hanoviel', 'dawaran el hanovell', '2245', 'agamy', '2022-11-17 08:48:39', '2022-11-17 08:48:39'),
(19, 19, 'Alexandria', 'EG', 'hanoviel', 'dawaran el hanovell', '2245', 'agamy', '2022-11-17 08:53:43', '2022-11-17 08:53:43'),
(20, 20, 'Alexandria', 'EG', 'hanoviel', 'dawaran el hanovell', '2245', 'agamy', '2022-11-20 10:34:55', '2022-11-20 10:34:55'),
(21, 21, 'Alexandria', 'EG', 'hanoviel', 'dawaran el hanovell', '2245', 'agamy', '2022-11-20 10:36:09', '2022-11-20 10:36:09'),
(22, 22, 'Alexandria', 'EG', 'hanoviel', 'dawaran el hanovell', '2245', 'agamy', '2022-11-20 10:36:51', '2022-11-20 10:36:51'),
(23, 23, 'Alexandria', 'EG', 'hanoviel', 'dawaran el hanovell', '2245', 'agamy', '2022-11-20 10:36:53', '2022-11-20 10:36:53'),
(24, 24, 'Alexandria', 'EG', 'hanoviel', 'dawaran el hanovell', '2245', 'agamy', '2022-11-20 10:37:01', '2022-11-20 10:37:01'),
(25, 25, 'Alexandria', 'EG', 'hanoviel', 'dawaran el hanovell', '2245', 'agamy', '2022-11-20 10:38:29', '2022-11-20 10:38:29'),
(26, 26, 'Alexandria', 'EG', 'hanoviel', 'dawaran el hanovell', '2245', 'agamy', '2022-11-20 10:38:34', '2022-11-20 10:38:34'),
(27, 27, 'Alexandria', 'EG', 'hanoviel', 'dawaran el hanovell', '2245', 'agamy', '2022-11-20 10:38:38', '2022-11-20 10:38:38'),
(28, 28, 'Alexandria', 'EG', 'hanoviel', 'dawaran el hanovell', '2245', 'agamy', '2022-11-20 10:40:20', '2022-11-20 10:40:20'),
(29, 29, 'Alexandria', 'EG', 'hanoviel', 'dawaran el hanovell', '2245', 'agamy', '2022-11-20 10:40:32', '2022-11-20 10:40:32'),
(30, 30, 'Alexandria', 'EG', 'hanoviel', 'dawaran el hanovell', '2245', 'agamy', '2022-11-20 10:41:16', '2022-11-20 10:41:16'),
(31, 31, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-20 10:51:22', '2022-11-20 10:51:22'),
(32, 32, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-20 10:52:08', '2022-11-20 10:52:08'),
(33, 33, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-20 10:53:55', '2022-11-20 10:53:55'),
(34, 34, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-20 10:54:07', '2022-11-20 10:54:07'),
(35, 35, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-20 10:54:13', '2022-11-20 10:54:13'),
(36, 36, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-20 10:54:43', '2022-11-20 10:54:43'),
(37, 37, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-20 10:54:49', '2022-11-20 10:54:49'),
(38, 38, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-20 10:54:52', '2022-11-20 10:54:52'),
(39, 39, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-20 10:55:10', '2022-11-20 10:55:10'),
(40, 40, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-20 10:55:12', '2022-11-20 10:55:12'),
(41, 41, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-20 10:55:20', '2022-11-20 10:55:20'),
(42, 42, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-20 10:55:24', '2022-11-20 10:55:24'),
(43, 43, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-20 10:56:02', '2022-11-20 10:56:02'),
(44, 44, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-20 11:01:17', '2022-11-20 11:01:17'),
(45, 45, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-20 11:02:11', '2022-11-20 11:02:11'),
(46, 46, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-20 11:02:46', '2022-11-20 11:02:46'),
(47, 47, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-20 11:03:12', '2022-11-20 11:03:12'),
(48, 48, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-20 11:09:11', '2022-11-20 11:09:11'),
(49, 49, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-20 11:09:21', '2022-11-20 11:09:21'),
(50, 50, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-20 11:09:28', '2022-11-20 11:09:28'),
(51, 51, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-20 11:09:32', '2022-11-20 11:09:32'),
(52, 52, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-20 11:09:44', '2022-11-20 11:09:44'),
(53, 53, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-20 11:09:47', '2022-11-20 11:09:47'),
(54, 54, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-20 11:13:57', '2022-11-20 11:13:57'),
(55, 55, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-20 11:29:05', '2022-11-20 11:29:05'),
(56, 90, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-23 13:17:30', '2022-11-23 13:17:30'),
(57, 91, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-23 13:18:38', '2022-11-23 13:18:38'),
(58, 94, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-23 13:19:27', '2022-11-23 13:19:27'),
(59, 95, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-23 13:19:40', '2022-11-23 13:19:40'),
(60, 96, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-23 13:19:50', '2022-11-23 13:19:50'),
(61, 98, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-23 13:20:42', '2022-11-23 13:20:42'),
(62, 99, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-23 13:23:34', '2022-11-23 13:23:34'),
(63, 100, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-23 13:34:26', '2022-11-23 13:34:26'),
(64, 101, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-23 13:35:40', '2022-11-23 13:35:40'),
(65, 102, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-23 13:36:26', '2022-11-23 13:36:26'),
(66, 103, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-23 13:36:31', '2022-11-23 13:36:31'),
(67, 104, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-23 13:38:52', '2022-11-23 13:38:52'),
(68, 105, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-23 13:40:07', '2022-11-23 13:40:07'),
(69, 106, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-23 14:45:43', '2022-11-23 14:45:43'),
(70, 107, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-24 09:42:07', '2022-11-24 09:42:07'),
(71, 108, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-24 12:04:07', '2022-11-24 12:04:07'),
(72, 109, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-24 12:08:18', '2022-11-24 12:08:18'),
(73, 110, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-24 12:23:13', '2022-11-24 12:23:13'),
(74, 111, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-24 12:49:45', '2022-11-24 12:49:45'),
(75, 112, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-24 13:58:51', '2022-11-24 13:58:51'),
(76, 113, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-26 12:41:46', '2022-11-26 12:41:46'),
(77, 114, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-27 07:29:45', '2022-11-27 07:29:45'),
(78, 115, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-27 08:44:42', '2022-11-27 08:44:42'),
(79, 116, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-27 09:04:08', '2022-11-27 09:04:08'),
(80, 117, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-27 09:39:37', '2022-11-27 09:39:37'),
(81, 118, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-27 13:17:29', '2022-11-27 13:17:29'),
(82, 119, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-27 13:18:37', '2022-11-27 13:18:37'),
(83, 120, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-27 13:22:45', '2022-11-27 13:22:45'),
(84, 121, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-27 13:24:28', '2022-11-27 13:24:28'),
(85, 122, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-27 13:32:55', '2022-11-27 13:32:55'),
(86, 123, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-27 13:35:44', '2022-11-27 13:35:44'),
(87, 124, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-27 13:47:43', '2022-11-27 13:47:43'),
(88, 125, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-27 14:02:48', '2022-11-27 14:02:48'),
(89, 126, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-27 15:43:36', '2022-11-27 15:43:36'),
(90, 127, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-03 12:36:33', '2022-12-03 12:36:33'),
(91, 128, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-27 07:15:30', '2022-12-27 07:15:30'),
(92, 129, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-27 07:18:48', '2022-12-27 07:18:48'),
(93, 130, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-27 09:27:03', '2022-12-27 09:27:03'),
(94, 131, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-27 11:37:00', '2022-12-27 11:37:00'),
(95, 132, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-27 13:55:34', '2022-12-27 13:55:34'),
(96, 133, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-27 14:43:12', '2022-12-27 14:43:12'),
(97, 134, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-27 14:49:25', '2022-12-27 14:49:25'),
(98, 135, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-27 14:57:10', '2022-12-27 14:57:10'),
(99, 136, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-27 14:59:02', '2022-12-27 14:59:02'),
(100, 137, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-27 15:26:28', '2022-12-27 15:26:28'),
(101, 138, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-27 19:33:39', '2022-12-27 19:33:39'),
(102, 139, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-27 20:34:34', '2022-12-27 20:34:34'),
(103, 140, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-28 07:22:01', '2022-12-28 07:22:01'),
(104, 141, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-28 10:04:04', '2022-12-28 10:04:04'),
(105, 142, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-28 10:25:05', '2022-12-28 10:25:05'),
(106, 143, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-28 13:42:05', '2022-12-28 13:42:05'),
(107, 144, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-31 22:45:24', '2022-12-31 22:45:24'),
(108, 145, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-02 18:06:08', '2023-01-02 18:06:08'),
(109, 146, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-02 18:07:36', '2023-01-02 18:07:36'),
(110, 147, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-04 10:05:56', '2023-01-04 10:05:56'),
(111, 148, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-07 09:17:47', '2023-01-07 09:17:47');

-- --------------------------------------------------------

--
-- Table structure for table `admin_notifications`
--

CREATE TABLE `admin_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `readed` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_notifications`
--

INSERT INTO `admin_notifications` (`id`, `admin`, `message`, `created_at`, `updated_at`, `readed`) VALUES
(262, 'Admin', 'Logged In Successfully', '2022-12-27 15:17:59', '2022-12-27 15:17:59', NULL),
(263, 'Admin', 'Logged In Successfully', '2022-12-28 08:57:18', '2022-12-28 08:57:18', NULL),
(264, 'Admin', 'Logged In Successfully', '2022-12-28 08:57:18', '2022-12-28 08:57:18', NULL),
(265, 'Admin', 'Logged In Successfully', '2022-12-30 13:22:02', '2022-12-30 13:22:02', NULL),
(266, 'Admin', 'Logged In Successfully', '2023-01-01 11:15:01', '2023-01-01 11:15:01', NULL),
(267, 'Admin', 'Logged In Successfully', '2023-01-01 11:33:40', '2023-01-01 11:33:40', NULL),
(268, 'Admin', 'Logged In Successfully', '2023-01-04 08:44:47', '2023-01-04 08:44:47', NULL),
(269, 'Admin', 'Logged In Successfully', '2023-01-08 10:37:41', '2023-01-08 10:37:41', NULL),
(270, 'Admin', 'Updated Profile Information', '2023-01-08 10:41:48', '2023-01-08 10:41:48', NULL),
(271, 'Admin', 'Added Exercise test', '2023-01-08 10:44:16', '2023-01-08 10:44:16', NULL),
(272, 'Admin', 'Edited Exercise test', '2023-01-08 10:45:57', '2023-01-08 10:45:57', NULL),
(273, 'Admin', 'Edited Exercise test', '2023-01-08 10:47:20', '2023-01-08 10:47:20', NULL),
(278, 'Admin', 'Logged Out Successfully', '2023-01-08 10:53:36', '2023-01-08 10:53:36', NULL),
(279, 'Admin', 'Logged In Successfully', '2023-01-09 11:14:19', '2023-01-09 11:14:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `android_metadata`
--

CREATE TABLE `android_metadata` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` text DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`, `description`, `level`, `icon`) VALUES
(1, 'total body exercises', '2020-03-25 04:35:09', '2020-03-25 04:35:09', 'This is a beginner friendly version of the workout. We have replaced the harder exercises with alternatives that should be easier to perform.', 'total body exercises', 'categories/CWVw1rtAcwPYbLiLTrCJTMHFzx7NUuLGnG0g58Q4.png'),
(2, 'lower body exercises', '2020-03-25 04:35:09', '2020-03-25 04:35:09', 'This is a beginner friendly version of the workout. We have replaced the harder exercises with alternatives that should be easier to perform.', 'lower body exercises', 'categories/CWVw1rtAcwPYbLiLTrCJTMHFzx7NUuLGnG0g58Q4.png'),
(3, 'upper body exercises', '2020-03-25 04:35:09', '2020-03-25 04:35:09', 'This is a beginner friendly version of the workout. We have replaced the harder exercises with alternatives that should be easier to perform.', 'upper body exercises', 'categories/CWVw1rtAcwPYbLiLTrCJTMHFzx7NUuLGnG0g58Q4.png'),
(4, 'core exercises', '2020-03-25 04:35:09', '2020-03-25 04:35:09', 'This is a beginner friendly version of the workout. We have replaced the harder exercises with alternatives that should be easier to perform.', 'core exercises', 'categories/CWVw1rtAcwPYbLiLTrCJTMHFzx7NUuLGnG0g58Q4.png'),
(35, 'Beginner', '2022-11-21 09:45:10', '2022-12-27 08:32:08', 'This is a beginner friendly version of the workout. We have replaced the harder exercises with alternatives that should be easier to perform.', 'Beginner', 'categories/CWVw1rtAcwPYbLiLTrCJTMHFzx7NUuLGnG0g58Q4.png'),
(36, 'Lucius Stephenson', '2022-11-21 09:55:20', '2022-11-21 12:03:53', 'Dolor voluptas est q', 'Dolor voluptas est q', 'categories/cfIwqaoZrGTXMWVU51pxOCew5jsocx8tZi1UipnH.png'),
(37, 'Shea Carver', '2022-11-21 09:55:33', '2022-11-21 12:03:47', 'Qui ratione repellen', 'Qui ratione repellen', 'categories/3TBHW5gGfIfknNmAOAbawnRrCRsoupEaXPDUAqcM.png'),
(38, 'Classic', '2022-11-21 09:55:49', '2022-12-27 08:00:34', 'Scientifically proven to improve health and fitness.', 'Classic', 'categories/IZy7jwlPq6JTPVbcgXy5NUf4GZ6O50Zj1GbgRc9T.png'),
(39, 'Abs', '2022-11-21 09:59:50', '2022-12-27 08:00:20', 'Want washboard abs? This is the workout for you. A short workout that targets every part of your abs.', 'Abs', 'categories/YBoJ3BlF1fksRYcGZAJqGR0yNVaxiADBBydv2prX.png'),
(40, 'Sweat', '2022-11-21 10:00:05', '2022-12-27 08:00:05', 'High intensity workout that will get your heart rate up and make you sweat. Workout less but lose more!', 'Sweat', 'categories/gwcWlX5Kmp4lyVet9dlbwVQrvsOpTSHWibCcKxVj.png'),
(41, 'Tabata', '2022-11-21 10:02:46', '2022-12-27 07:59:47', 'A tabata inspired workout that includes a warmup and cooldown. Although short, this workout is intense. Make sure you are physically fit before attempting.', 'Tabata', 'categories/Bo6kMfuD4EDeMZHyY6fx04bIq4KPteeqAqvMuK1z.png'),
(42, 'Complete', '2022-11-23 09:44:11', '2022-12-27 07:59:28', 'This is classic workout, but done 3 times in a row. Doing this complete workout will help you hit the doctor recommended 20 minute of exercise a day for better health', 'Complete', 'categories/pF5UA8sE3hbxCxQNb9lr48LkWnS6ykYcSQSYtUQG.png');

-- --------------------------------------------------------

--
-- Table structure for table `complete_workouts`
--

CREATE TABLE `complete_workouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `workout_name` varchar(255) DEFAULT NULL,
  `current_time` varchar(255) DEFAULT NULL,
  `total_time` varchar(255) DEFAULT NULL,
  `calories` varchar(255) DEFAULT NULL,
  `todays_date` varchar(255) DEFAULT NULL,
  `day` varchar(255) DEFAULT NULL,
  `month` varchar(255) DEFAULT NULL,
  `total_exercise` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `workout_intensity` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `height` varchar(255) DEFAULT NULL,
  `exercise_days` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stripe_id` varchar(255) DEFAULT NULL,
  `pm_type` varchar(255) DEFAULT NULL,
  `pm_last_four` varchar(4) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `access_token` varchar(128) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `is_subscribed` enum('1','0') NOT NULL DEFAULT '0',
  `subscription_type` enum('month','three_months','six_months','year') NOT NULL DEFAULT 'month',
  `subscription_started_at` varchar(255) DEFAULT NULL,
  `subscription_finished_at` varchar(255) DEFAULT NULL,
  `is_subscription_finished` enum('1','0') DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone`, `gender`, `workout_intensity`, `age`, `height`, `exercise_days`, `created_at`, `updated_at`, `stripe_id`, `pm_type`, `pm_last_four`, `trial_ends_at`, `access_token`, `password`, `email`, `is_subscribed`, `subscription_type`, `subscription_started_at`, `subscription_finished_at`, `is_subscription_finished`) VALUES
(1, 'test', '+201285821487', 'male', 'lol xd', '22', '180', '5', '2022-11-14 08:26:11', '2022-12-04 09:55:58', 'tok_1M42vUBu7p8TSIxJx25iXJIe', NULL, NULL, NULL, 'LRR8jJIuAT5gzT6n283KoYNGmcK844MjQwR2tTIgGM6NW7muxxdgpTK0QBNOLx15TuZzQGxAQiCK3fg1CVNmOdd34Axn75qbKdXDOeyzfY4HaaJD8SA9n68SIj1V9F94', '$2y$10$KRvJDncf0PJ6wJ9pmgziFucmcr5a1WExOyOcp1WrqhpIICqO73a7e', 'customer1@gmail.com', '1', 'month', '2022-12-04 11:55:58', '2023-01-04 11:55:58', '0'),
(17, 'real', '+201285821487', 'male', 'Good', '25', '175', '5', '2022-11-16 12:55:40', '2022-12-13 10:43:30', 'tok_1M4nyhBu7p8TSIxJV57ddFBW', NULL, NULL, NULL, 'kf3xYIxPzrF8WCEJ5GmY8SPHioJTZR47Gg08mFYyHWfN90FNQlPmxPp0o1aaOHujKjkKF8dNrJo4HvQHhiJAq14VYs0IfHqhAfLeXvc6wmfOp15lceIzzWknmZddbcKV', '$2y$10$wR/vtUfTwmthOUCvFjiZ4ulmYgvf3IWZV2uhn7dkw2cgEKeVNQvc2', 'reala@gmail.com', '1', 'month', '2022-12-13 12:43:30', '2023-01-13 12:43:30', '0'),
(18, 'test2 User', '01254532588', 'female', 'kkk', '25', '160', '4', '2022-11-17 08:48:39', '2022-12-13 09:22:53', NULL, NULL, NULL, NULL, 'YjV0iaKHbsMoGtVS94EiwgdZgTQ7IQYysTXVKQEE8hac2OF1V0yuKigSHnsG7q6gsnY5si4kEpVlm8OOqsQGavh7UCkUfcLPQdfaMAsW0GwZNw9SdXdgPcIRDhGtBQdm', '$2y$10$IXg4x7D/eee6UeH2CE.zBudhzAyO/qIXKGZzdd6WesoWfkOKUpAx6', 'test2@gmail.com', '1', 'month', '2022-12-13 11:22:53', '2023-01-13 11:22:53', '0'),
(20, 'test2 User', '01254532588', 'female', 'kkks', '25', '160', '4', '2022-11-20 10:34:55', '2022-12-13 09:23:09', NULL, NULL, NULL, NULL, 've9sHiXSbXA9ioWDp9NEMJrcQp9DKl8dZtiKGxsuFi0hCPh3DUGzYjkR2e80zMo7lr95bzzNwnOSpgWxaNqKBj3yDmjkolQP689neIpSQdIjsygDhtH4dz6FjfcbAN6R', '1', 'test2@gmail.coma', '1', 'month', '2022-12-13 11:23:09', '2023-01-13 11:23:09', '0'),
(21, 'test2 User', '01254532588', 'female', 'kkks', '25', '160', '4', '2022-11-20 10:36:09', '2022-11-20 10:36:09', NULL, NULL, NULL, NULL, 'UxqqLmGK1fROHyHlHnIlLlhzpU6a6YoaHtMrT3VH8mbdzMltI89gn5NcCH9ZMYffOw6MmbIFWXlHqFWNSbEIlaxwEn5bxzCgLe2oKADQAeiQA2Rse7j9HGtdfkXoFI36', '1', NULL, '0', 'month', NULL, NULL, '0'),
(22, 'test2 User', '01254532588', 'female', 'kkks', '25', '160', '4', '2022-11-20 10:36:51', '2022-11-20 10:36:51', NULL, NULL, NULL, NULL, 'fYw1zwvQ05uNkLQ4vgaVLlZ1kuZ3XfAnkE3gYM8pbkkshgiNt3NljpZDVDieZLbQyoysKs1ziSDhWYpyCuq9qchC36YKXLRnhhuBMNmVAmYHMPlX6cyulLrdfCUtMlh7', '1', NULL, '0', 'month', NULL, NULL, '0'),
(23, 'test2 User', '01254532588', 'female', 'kkks', '25', '160', '4', '2022-11-20 10:36:53', '2022-11-20 10:36:53', NULL, NULL, NULL, NULL, '2uFoz47daBSd8XNkBD9TPL2zEyYWjpJfzaYvk9pu4BgfG9BNUMAPBkrDsdsEYXtW6yAWbNGHf2XT1ipqX7OJIeCybEKNihrUuahIKPPCFoFwfF1Uepf4rGn09dL67uJv', '1', NULL, '0', 'month', NULL, NULL, '0'),
(24, 'test2 User', '01254532588', 'female', 'kkks', '25', '160', '4', '2022-11-20 10:37:01', '2022-11-20 10:37:01', NULL, NULL, NULL, NULL, 'jK1uS88GK40XufQTi4yJ7JQRtfRzdJkntxvjZaeDU2la7HHgpUu4kF10IDtyuSYDJ655HPCRG7WQ78T7acjUmGQAAG02Sl0mjiI21E4bJqMCsWnbTxQtx7hWXyJUKhVj', '1', NULL, '0', 'month', NULL, NULL, '0'),
(25, 'test2 User', '01254532588', 'female', 'kkks', '25', '160', '4', '2022-11-20 10:38:28', '2022-11-20 10:38:28', NULL, NULL, NULL, NULL, 'ra4DPu1L1Xr8sX5wUbs2U4ilKefZlpDBytuI3NL4U7SLwMCSeQUcuSEoEFvOogziCAy9FYgWMGgQe2LnYQo3qBoEVI9UCOdsQupPvO2RVlSMcrfGpXKl6EbCej8zhubF', '1', NULL, '0', 'month', NULL, NULL, '0'),
(26, 'test2 User', '01254532588', 'female', 'kkks', '25', '160', '4', '2022-11-20 10:38:34', '2022-11-20 10:38:34', NULL, NULL, NULL, NULL, 'QSIcdPKI624ThrBV795EKfAGxY5sUwWGHbHgiNMtziM5GyXdmiksCmZyKazDlDS2misbkAsRUBOCM0fLr8lFXsZ7AvQoPzsPAFFTDDAbHTjhlcXgQPC0iHvEl6HYsOO8', '1', NULL, '0', 'month', NULL, NULL, '0'),
(27, 'test2 User', '01254532588', 'female', 'kkks', '25', '160', '4', '2022-11-20 10:38:38', '2022-11-20 10:38:38', NULL, NULL, NULL, NULL, 'OCCmVQ3Jmyf6QvUP03KAVadTvNKNc27JtMVS9jcKylkELqz0Vp87MsyEV8SyknT6U7RQGHAIauWFpu1Xi4Y3JKKwnMrMVDZwUgjN3ZEuwfnlJ0yelQYB7loUJYNHmOdM', '1', NULL, '0', 'month', NULL, NULL, '0'),
(28, 'test2 User', '01254532588', 'female', 'kkks', '25', '160', '4', '2022-11-20 10:40:20', '2022-11-20 10:40:20', NULL, NULL, NULL, NULL, 'Abyg6ERffIYEPMUqP7am8s8aX3YCNX7gNuRO0mJ2dydspUQuq7ElEQE59K5UXOFB1DX45Qz8AkO3RJNz3F44vKxhp31FD3GaoFNedg4ir8clvOYPLMOrXJnNQRMMBqKk', '1', NULL, '0', 'month', NULL, NULL, '0'),
(29, 'test2 User', '01254532588', 'female', 'kkks', '25', '160', '4', '2022-11-20 10:40:32', '2022-12-04 09:54:37', NULL, NULL, NULL, NULL, 'kexhlaxCqwA31t7EXDe0WNyL6jMFbkkbOv6dbAxzw8i7Lq2f7ts5YGrrmdJoJBhKIbMl04TkObb8X38WYvFzGP2oRLBTEfD5WDPWpIM4a8ywl67Pfw7IY2CSeQlpJM66', '1', NULL, '0', 'year', '2022-12-04 11:54:18', '2023-12-04 11:54:18', '0'),
(30, 'test2 User', '01254532588', 'female', 'kkks', '25', '160', '4', '2022-11-20 10:41:16', '2022-11-20 10:41:16', NULL, NULL, NULL, NULL, 'IQq6qBI1TUoY7KaHQfk0AtJbd4Vv66323I5Izhixi6iL50erCLe0GbZOhpb7sSccnkhN4aSopzrdUT4yv9q6zndwkaaj7at60g6DJIO4nIqOQrJOu3PofRowTnAWfiQV', '1', NULL, '0', 'month', NULL, NULL, '0'),
(31, 'test', '124544656', 'male', 'icijacjsaci', '33', '159', '4', '2022-11-20 10:51:22', '2022-11-20 10:51:22', NULL, NULL, NULL, NULL, 'c7MzolxNCGXV6nJhJD3Qifco11lafG4J8c5bGEyk69SFC6VgUxDrUly9z28mU1izXwYEg6gb4aahXJwPSBFwr8qrrtYowWRN76o8TJT0LCmTt4ridADlSC41yTDF9CJm', '1', NULL, '0', 'month', NULL, NULL, '0'),
(32, 'test', '124544656', 'male', 'icijacjsaci', '33', '159', '4', '2022-11-20 10:52:08', '2022-11-20 10:52:08', NULL, NULL, NULL, NULL, 'KhlaE6kTQjR4eiTnbUOe6DMcZMfkhxx7zsnEbrT2yCVccO9RoVqEi0owKO417dLTWd6DIuXXr4hesOeEFClvxptK3pfhc4twMrl4Gl9rQXInwIRQz0sqhc53g5ieL791', '1', NULL, '0', 'month', NULL, NULL, '0'),
(33, 'test', '124544656', 'male', 'icijacjsaci', '33', '159', '4', '2022-11-20 10:53:55', '2022-11-20 10:53:55', NULL, NULL, NULL, NULL, 'fSlWaPp4FjNtNW4q5ADy9XLifCuZNtvuNu4U2TWNrsJEV1RVVXHbJf74N4jvSegifFAeB8xrVuPeVD1bZnOwDS30ey2BR2pd8K2bw4vZPexEfS974R5YcONCiNu7Vqxg', '1', NULL, '0', 'month', NULL, NULL, '0'),
(34, 'test', '124544656', 'male', 'icijacjsaci', '33', '159', '4', '2022-11-20 10:54:07', '2022-11-20 10:54:07', NULL, NULL, NULL, NULL, 'Pl5LV6x6F1sUkbsvX1t0Y6jOAVapq5TYFVWfo1wKqiyBE8FLvEJaBgOGLuOTvEKCfG9MwaklpaXRs1WdsudmURuyiRfY9I9Eke54kZCNxJfBT9OkN5X95sZHt6H1Z4m5', '1', NULL, '0', 'month', NULL, NULL, '0'),
(35, 'test', '124544656', 'male', 'icijacjsaci', '33', '159', '4', '2022-11-20 10:54:13', '2022-11-20 10:54:13', NULL, NULL, NULL, NULL, 'ZFLAovuVfV8u0CyzqZQl0oWYh3xz9v1RxH2U7eXi0fSpEskLaeLjyyLrq4Y8VVS6alxQR6gbXvk46kxrCbbN3LXevoeBsAUdH6tV47tTfcGnTDDmrVw7JG3IIoAA1vPY', '1', NULL, '0', 'month', NULL, NULL, '0'),
(36, 'test', '124544656', 'male', 'icijacjsaci', '33', '159', '4', '2022-11-20 10:54:43', '2022-11-20 10:54:43', NULL, NULL, NULL, NULL, 'ZHwK8fFzwqa1Q75Tr15ee5xQcd68DrVZEX14JofUwzwR0AmFlnKZK5Yx46fhRqqfB6B91muaHH6DdjK5lFqDYT0cGYd0gyXzNqaLonoV9GJ5luHPLq9I1bzfmuO5Mubu', '1', NULL, '0', 'month', NULL, NULL, '0'),
(37, 'test', '124544656', 'male', 'icijacjsaci', '33', '159', '4', '2022-11-20 10:54:49', '2022-11-20 10:54:49', NULL, NULL, NULL, NULL, 'vvjjpHoKLXvYJM3mkp9WVfOVEEk2zBIJrBOcksFdKq8mqlaMnOU0qsd1Snl5XlOetaae36jK5oe0ybzacij0EGosKbSffMApPPjRV0KSb15lH6r25EBS8Bgnen8fEk4F', '1', NULL, '0', 'month', NULL, NULL, '0'),
(38, 'test', '124544656', 'male', 'icijacjsaci', '33', '159', '4', '2022-11-20 10:54:52', '2022-11-20 10:54:52', NULL, NULL, NULL, NULL, 'O5bXFAFRlrE3v8X79CqImmxtkgSeUy8xlrZyaeoxLmORC2w5JxL9NBxg2Juqme2tBX5BDtgugfD9JUXrts7y4EPCj59AsrO0sFH7NgYYaHXWh281VTG3Fa8OJc5MLsR6', '1', NULL, '0', 'month', NULL, NULL, '0'),
(39, 'test', '124544656', 'male', 'icijacjsaci', '33', '159', '4', '2022-11-20 10:55:10', '2022-11-20 10:55:10', NULL, NULL, NULL, NULL, 'wVVWcjrvjDXNYqT6Rn2hak1VUpgfteG39BM9xRr3rM26TwRptCHC0DE73YCLgTX3FjXKpjiHhcJljeNHPfjmvJUn7BXO0MVYANcs4xURrqztGzC6iX1D6nhVr2Y2miSJ', '1', NULL, '0', 'month', NULL, NULL, '0'),
(40, 'test', '124544656', 'male', 'icijacjsaci', '33', '159', '4', '2022-11-20 10:55:12', '2022-11-20 10:55:12', NULL, NULL, NULL, NULL, 'iAYg43Nvh2ENr8DPl2CewMAfAlelN7HHrMkx3ZgPrjfJVujpNq3ipQDZMLYsqLi45oTiUaKtEr82u3Etv3FwraCRciz6YVNJMQvxYu4bGfuG6PRY5d5XhXaRr6oUbyJr', '1', NULL, '0', 'month', NULL, NULL, '0'),
(41, 'test', '124544656', 'male', 'icijacjsaci', '33', '159', '4', '2022-11-20 10:55:20', '2022-11-20 10:55:20', NULL, NULL, NULL, NULL, 'HftI64SAvSJAJjOlHtdoHxkrVPm0nLCURfspnDucDLp9uVxCOeZuvlJuJcxYm0eWi96d2MSzgySzSeBe6Ez5vtGyHEJve81MiFiOvua7Pe6bpfezLBiHiG2eesQ52uOM', '1', NULL, '0', 'month', NULL, NULL, '0'),
(42, 'test', '124544656', 'male', 'icijacjsaci', '33', '159', '4', '2022-11-20 10:55:24', '2022-11-20 10:55:24', NULL, NULL, NULL, NULL, 'cwX3IYTTOMpyxyHM6PgZE8RHZWlSnukEfiDel7vd6Vc0TC1dC0CoXDMuDlNEthX1EUSjRhenTICi9rVq75LciKRh31Y2wcMedjH11aVnRxdxuJYpEVi0FrE7fQ8aKV5T', '1', NULL, '0', 'month', NULL, NULL, '0'),
(43, 'test', '124544656', 'male', 'icijacjsaci', '33', '159', '4', '2022-11-20 10:56:02', '2022-11-20 10:56:02', NULL, NULL, NULL, NULL, '898rlP6K4eAZgHPdwaY6TAHCnNA4n0nvKVw3GKpwm8xGiJMUZWKquLJ7Lbthyhl6uGfSMv98RBHPGtYkKCSu5agvXw11QQasGTjRM5i0LeCVKffHwZYh4HLaz4TVp25y', '1', NULL, '0', 'month', NULL, NULL, '0'),
(44, 'test', '124544656', 'male', 'icijacjsaci', '33', '159', '4', '2022-11-20 11:01:17', '2022-11-20 11:01:17', NULL, NULL, NULL, NULL, 'yHTBOn9QNZwVFZRYS3L8QVNZXM4EQl3jfiBlgJ57EWMjTYdlKtrjVB3NzrI4m2GLaThzgsSrGppuQBWdbMe6bVa0Iihhp6Zrswoe1rdKcfxjL0r5XbmHg1zGxZTPbExY', '1', NULL, '0', 'month', NULL, NULL, '0'),
(45, 'test', '124544656', 'male', 'icijacjsaci', '33', '159', '4', '2022-11-20 11:02:11', '2022-11-20 11:02:11', NULL, NULL, NULL, NULL, 'SrRBKuKgvO4asoWazQGkbSg5OxX0CjUbibRZIzkTw2VkWUjSf5isVR0gqCS1rcgdEr8C7VdVAfiLDyJZysZeldxgvBoy6FTRhk9zeeIn1nl7XPKyGfOxV4DGFAje84gg', '1', NULL, '0', 'month', NULL, NULL, '0'),
(46, 'test', '124544656', 'male', 'icijacjsaci', '33', '159', '4', '2022-11-20 11:02:46', '2022-11-20 11:02:46', NULL, NULL, NULL, NULL, '5cCUHMz09VFh70HDBPELyHi2awNbdvousjFFr6OdTFkAaxCTgIvW8bvfZLSfd13C1rD3PXAlP17h1FieAjs2vsIBEYU49BzKVTD59hdoSsDNgn9sUYAk5InoAOb8R3zB', '1', NULL, '0', 'month', NULL, NULL, '0'),
(47, 'test', '124544656', 'male', 'icijacjsaci', '33', '159', '4', '2022-11-20 11:03:12', '2022-11-20 11:03:12', NULL, NULL, NULL, NULL, '3qqEyaj7Q7o4t6bgcLZNs7VvMZql14lPjzRGLB8YfU3BF3mz108DTIeqCofnUNtNtJ5554dI13COEcdJeITWp9KsHiqDLLaaHTtNddrOhWpnEikifAE4nGykxhogEXsw', '1', NULL, '0', 'month', NULL, NULL, '0'),
(48, 'test', '124544656', 'male', 'icijacjsaci', '33', '159', '4', '2022-11-20 11:09:11', '2022-11-20 11:09:11', NULL, NULL, NULL, NULL, 'YNpg5OVykPVKvpPYjVQfbSwKdYYSpfGty9YHo2bCCr494zGTLsM1kMcuuqwyb7PJdAf7B8z3LqHoNdPqWRLjBGzpWpoiwBBtyknhYUMZu92DRHZgEkhvj1SVO2dsPJEB', '1', NULL, '0', 'month', NULL, NULL, '0'),
(49, 'test', '124544656', 'male', 'icijacjsaci', '33', '159', '4', '2022-11-20 11:09:21', '2022-11-20 11:09:21', NULL, NULL, NULL, NULL, 'gS8gE9kxZ8X2necalzMTOtNx5V9YbNyWSxmm0eXCfp2fcpjr8CRyE1PJG74RXIr69vosGmt2dVsEGp0sizpjKpEXmkA919hsNvGZYCKKUsSFeqRa2e8M9oTWhhY8R6Xm', '1', NULL, '0', 'month', NULL, NULL, '0'),
(50, 'test', '124544656', 'male', 'icijacjsaci', '33', '159', '4', '2022-11-20 11:09:28', '2022-11-20 11:09:28', NULL, NULL, NULL, NULL, 'oTNRmdfrrqCgetXtd35iO5f29Tu3a3Y1SGuESGIV1JNKNGk4bbltaXh2qSsC1vcfnikjJ5anXKfTaww1iw666pu80bRnxVYQ3cn1ninlwPgMrHlhOCgYnYUbXQogbzcR', '1', NULL, '0', 'month', NULL, NULL, '0'),
(51, 'test', '124544656', 'male', 'icijacjsaci', '33', '159', '4', '2022-11-20 11:09:32', '2022-11-20 11:09:32', NULL, NULL, NULL, NULL, 'lQB9msJUyBv4zDU4h7I5tuINlT1DMwKpXUZd5Nj62D2WpK2R431moPwXUg22HiknpAU6QziBGqS1W2HT3J4fwhNoL1gABTZJ88wsqgaGFEQx7MJmn8ImUbWyi4MAmQBz', '1', NULL, '0', 'month', NULL, NULL, '0'),
(52, 'test', '124544656', 'male', 'icijacjsaci', '33', '159', '4', '2022-11-20 11:09:43', '2022-11-20 11:09:43', NULL, NULL, NULL, NULL, 'pzdaz4brpSYWA3gj1ZXUKDdS2Bwc1z6Omt2bfoNy1xuTIHzrj8Z40OGccl5eJEjZGrGnN1gUdTu7oFAugV6SpZrjI7exCP8jyBhTwejqp9xkmqQKQsbGBn3zZ94cXHkW', '1', NULL, '0', 'month', NULL, NULL, '0'),
(53, 'test', '124544656', 'male', 'icijacjsaci', '33', '159', '4', '2022-11-20 11:09:47', '2022-11-20 11:09:47', NULL, NULL, NULL, NULL, 'tyVDTMDae9FyxUAqwDs6Nvo2LAAQLk9JdbsGdpLEkpCkHQZQevRuo2eJ7bJDE1Ov66OIyQA7iMebR1QRhrFhNOkp5PzoYvhmLkKMr8otpOAMnNsefhuJwbb0I7Wwym9a', '1', NULL, '0', 'month', NULL, NULL, '0'),
(54, 'test', '124544656', 'male', 'icijacjsaci', '33', '159', '4', '2022-11-20 11:13:57', '2022-11-20 11:13:57', NULL, NULL, NULL, NULL, 'f3MFYr1cxdaNNAvhL5RCDSxobvkWfrtwIhx8QnjaAv0LlulK2RPCEv7we2tA8zkIcb7oRcMwsVARxRZX9Cl9di4atVOiv5ES7MFPgaXyNxMtKzscPRCDQBpLljOoRKzJ', '1', NULL, '0', 'month', NULL, NULL, '0'),
(55, 'test', '124544656', 'male', 'icijacjsaci', '33', '159', '4', '2022-11-20 11:29:05', '2022-11-20 11:29:05', NULL, NULL, NULL, NULL, 'aTJv7ckscDNCOe5X3pIHZhtapdTONtWvOfUDBHxiFaMk6qkzxoWqvPHNpvqShm4vj6EDHsNMmkIyN06F53lHN4dOKNRFYQgdxalIcWJCQcLjzuS9DOvNa5RyFGNLVzmG', '1', NULL, '0', 'month', NULL, NULL, '0'),
(56, 'ahmed', '01285821487', 'male', 'Lmao XXD', '26', '165', '5', '2022-11-20 18:43:57', '2022-11-20 18:43:57', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'month', NULL, NULL, '0'),
(57, 'ahmed', '01285821487', 'male', 'Lmao XXD', '26', '165', '5', '2022-11-20 18:44:37', '2022-11-20 18:44:37', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'month', NULL, NULL, '0'),
(58, 'ahmed', '6786789678', 'male', 'jkbas', '22', '170', '3', '2022-11-20 21:21:09', '2022-11-20 21:21:09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'month', NULL, NULL, '0'),
(59, 'Test Api Abdulrhman', '01285821487', 'male', 'Lol XD', '25', '178', '7', '2022-11-20 21:22:32', '2022-11-20 21:22:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'month', NULL, NULL, '0'),
(60, 'Test Api Abdulrhman', '01285821487', 'male', 'LMAO XXD', '25', '178', '2-5', '2022-11-20 21:37:05', '2022-11-20 21:37:05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'month', NULL, NULL, '0'),
(61, 'Test Api Abdulrhman', '01285821487', 'male', 'LMAO XXD', '25', '178', '2-5', '2022-11-20 21:37:44', '2022-11-20 21:37:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'month', NULL, NULL, '0'),
(62, 'gkjbfuihg', '124567', 'male', '234', '23', '155', '44', '2022-11-21 10:04:18', '2022-11-21 10:04:18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'month', NULL, NULL, '0'),
(63, 'gkjbfuihg', '124567', 'female', '234', '23', '155', '44', '2022-11-21 10:09:07', '2022-11-21 10:09:07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'month', NULL, NULL, '0'),
(64, NULL, NULL, 'female', NULL, NULL, NULL, NULL, '2022-11-21 10:10:05', '2022-11-21 10:10:05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'month', NULL, NULL, '0'),
(65, 'fsheu', '682656', 'Female', 'Moderate', '15', '170', '2-3 times in week', '2022-11-21 10:14:12', '2022-11-21 10:14:12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'month', NULL, NULL, '0'),
(66, 'gshdh', '8484646', 'Female', 'Low', '15', '170', '2-3 times in week', '2022-11-21 10:17:00', '2022-11-21 10:17:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'month', NULL, NULL, '0'),
(67, 'tshdgh', '659588', 'Female', 'Low', '15', '170', '2-3 times in week', '2022-11-21 10:24:54', '2022-11-21 10:24:54', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'month', NULL, NULL, '0'),
(68, 'feysh', '5454646', 'Male', 'Low', '15', '170', '2-3 times in week', '2022-11-21 10:28:09', '2022-11-21 10:28:09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'month', NULL, NULL, '0'),
(69, 'gshdh', '54646568', 'Female', 'Low', '15', '170', '2-3 times in week', '2022-11-21 10:33:22', '2022-11-21 10:33:22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'month', NULL, NULL, '0'),
(70, 'yehhe', '82856', 'Female', 'Low', '15', '170', '2-3 times in week', '2022-11-21 10:37:29', '2022-11-21 10:37:29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'month', NULL, NULL, '0'),
(71, 'gegeh', '5484659', 'Female', 'Low', '15', '170', '2-3 times in week', '2022-11-21 10:46:20', '2022-11-21 10:46:20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'month', NULL, NULL, '0'),
(72, 'y3heh', '626566', 'Female', 'Low', '15', '170', '2-3 times in week', '2022-11-21 10:47:18', '2022-11-21 10:47:18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'month', NULL, NULL, '0'),
(73, 'teydy', '5485656', 'Female', 'Low', '15', '170', '2-3 times in week', '2022-11-21 10:52:03', '2022-11-21 10:52:03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'month', NULL, NULL, '0'),
(74, 'hdhdh', '65656643', 'Male', 'Low', '15', '170', '2-3 times in week', '2022-11-21 10:58:27', '2022-11-21 10:58:27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'month', NULL, NULL, '0'),
(75, 'tygy', '558522', 'Male', 'Low', '15', '170', '2-3 times in week', '2022-11-21 11:00:15', '2022-11-21 11:00:15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'month', NULL, NULL, '0'),
(76, 'tyuf', '5556', 'Female', 'Low', '15', '170', '2-3 times in week', '2022-11-22 04:37:06', '2022-11-22 04:37:06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'month', NULL, NULL, '0'),
(77, 'nada', '123456878', 'Female', 'Low', '15', '170', '2-3 times in week', '2022-11-22 06:50:37', '2022-11-22 06:50:37', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'month', NULL, NULL, '0'),
(78, 'rt', '2585822', 'Male', 'Low', '15', '170', '2-3 times in week', '2022-11-22 07:35:03', '2022-11-22 07:35:03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'month', NULL, NULL, '0'),
(79, '6f6g6', '2828282', 'Female', 'Low', '15', '170', '2-3 times in week', '2022-11-22 07:44:27', '2022-11-22 07:44:27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'month', NULL, NULL, '0'),
(80, 'dghh', '828287228', 'Female', 'Low', '15', '170', '2-3 times in week', '2022-11-22 09:19:06', '2022-11-22 09:19:06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'month', NULL, NULL, '0'),
(81, 'zfadyz', '01011141478', 'Male', 'Low', '15', '170', '2-3 times in week', '2022-11-22 10:20:51', '2022-11-22 10:20:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'month', NULL, NULL, '0'),
(82, 'jssjsjj', '313131', 'Male', 'Low', '15', '170', '2-3 times in week', '2022-11-22 10:22:18', '2022-11-22 10:22:18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'month', NULL, NULL, '0'),
(83, 'gshsh', '2154850', 'Female', 'Low', '15', '170', '2-3 times in week', '2022-11-22 10:28:34', '2022-11-22 10:28:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'month', NULL, NULL, '0'),
(84, 'hg', '7', 'Male', 'Low', '15', '170', '2-3 times in week', '2022-11-22 10:38:45', '2022-11-22 10:38:45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'month', NULL, NULL, '0'),
(85, 'tgugu', '828282', 'Female', 'Low', '15', '170', '2-3 times in week', '2022-11-22 10:40:42', '2022-11-22 10:40:42', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'month', NULL, NULL, '0'),
(86, 'mahmoud', '01094034584', 'Male', 'Low', '25', '180', '2-3 times in week', '2022-11-22 13:43:54', '2022-12-27 09:49:21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'six_months', '2022-12-27 10:49:21', '2023-06-27 10:49:21', '0'),
(87, 'fodi', '4664', 'Male', 'Low', '15', '170', '2-3 times in week', '2022-11-22 18:35:04', '2022-11-22 18:35:04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'month', NULL, NULL, '0'),
(88, 'gsge', '64543', 'Female', 'Low', '15', '170', '2-3 times in week', '2022-11-23 08:18:24', '2022-11-23 08:18:24', NULL, NULL, NULL, NULL, '1234', NULL, NULL, '0', 'month', NULL, NULL, '0'),
(89, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-23 13:09:42', '2022-11-23 13:09:42', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'month', NULL, NULL, '0'),
(90, 'ascscs', 'sca', 'asc', 'cas', 'sca', 'csa', 'cas', '2022-11-23 13:17:30', '2022-11-23 13:17:30', NULL, NULL, NULL, NULL, 'sukwxm53QOfGfPsYma43JvmLC56Cb9NV0k69okWDzmX4pCJJOl6vS2N22FFcWbkTuxoQBvFLZdDb6MO7MsRJiXbyYbBUvarfPd2xR9OYPbOpyvDxIiYrwO2xp1wek4NR', '1', 'a@a.com', '0', 'month', NULL, NULL, '0'),
(91, 'ascscs', 'sca', 'asc', 'cas', 'sca', 'csa', 'cas', '2022-11-23 13:18:38', '2022-11-23 13:18:38', NULL, NULL, NULL, NULL, 'ztIpUj7mZWLbnXLGd1rXIin7FknstNmtrNog0kotBQIjuCfYKczhGwYaLiz5kTkCQ2C42eR5xP2O1VKOpe0YsCyEyG99J1AJBuIz7H40a98MV9A7AmItw3Vy4Kae7Odi', '1', 'a@a.coma', '0', 'month', NULL, NULL, '0'),
(92, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-23 13:18:58', '2022-11-23 13:18:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'month', NULL, NULL, '0'),
(93, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-23 13:19:10', '2022-11-23 13:19:10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'month', NULL, NULL, '0'),
(94, 'ascscs', 'sca', 'asc', 'cas', 'sca', 'csa', 'cas', '2022-11-23 13:19:27', '2022-11-23 13:19:27', NULL, NULL, NULL, NULL, 'CckxqD9YeYwu4NRoD4XYDFEn4bhkt7bj23DThGOmzCBpb3lwj1gaZJlkyHZiqdPGR3sh2btddaVR8PP6PmijEay0XJ8qTbb0oWWjtztAdMM6oLjLMddXYxcD3BlGC5PR', '1', NULL, '0', 'month', NULL, NULL, '0'),
(95, 'ascscs', 'sca', 'asc', 'cas', 'sca', 'csa', 'cas', '2022-11-23 13:19:40', '2022-11-23 13:19:40', NULL, NULL, NULL, NULL, 'WAkRfiZaxo3uIvR5FF3QG8UttL4uLGMpqHe9bssJymGfNYGsbmWWwgtKh6GJb6hE88yIPQpeDfhUosoVjhPXIzOXCtP6KCpHaIx0TgGm8jtcTghY3gSeR0BOQDxx8M3R', '1', 'a@a.comas', '0', 'month', NULL, NULL, '0'),
(96, 'ascscs', 'sca', 'asc', 'cas', 'sca', 'csa', 'cas', '2022-11-23 13:19:50', '2022-11-23 13:19:50', NULL, NULL, NULL, NULL, '0yJukCcHFsWMcvjm8SC1UXIznMFvTADbYO4VaS3f6BBtg5rEpqCz565axGZQO8t9fynUYgpbJyKeovAPiMtLOBiW2S6adCfhbG0oapKH4y2YJKP04h6nvh68hS9m4iDz', '1', 'a@a.comsa', '0', 'month', NULL, NULL, '0'),
(97, 'nada', '1234567', 'male', 'eeee', '23', '45', 'wegre', '2022-11-23 13:20:15', '2022-11-23 13:20:15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'month', NULL, NULL, '0'),
(98, 'nada', '1234567', 'male', 'eeee', '23', '45', 'wegre', '2022-11-23 13:20:42', '2022-11-23 13:20:42', NULL, NULL, NULL, NULL, 'qNecDaA1TKtGI9uhhRzka9UKTXsVGH2pH9OC4p1LvaNZeM6wQ9FwzIYHIOwYukZe7b8KFf4brRGWy2VgWRUWJrEIZutJBPm4w9VvhwohnMBWfBlEcxQ4kGk1a6dYP7yN', '1', NULL, '0', 'month', NULL, NULL, '0'),
(99, 'ascscs', 'sca', 'asc', 'cas', 'sca', 'csa', 'cas', '2022-11-23 13:23:34', '2022-11-23 13:23:34', NULL, NULL, NULL, NULL, 'Y4Q8k7R8rvqEpDNH035ZkuqTWWgOawd31YaU1Q0QNBYaTtXCP3OvzVqxCLUomHYUhwMggHEsHDhBsHziapHATSY9S9JS6teA5j4m1bccB2G6vYon74fw7UnFCHhNuB2p', '$2y$10$2OiyITlKmeWfj.vjc1.yLuozoZECXSQaQ5RTmvqHC8xnVGctA4PNy', 'a@a.casc', '0', 'month', NULL, NULL, '0'),
(100, 'ascscs', 'sca', 'asc', 'cas', 'sca', 'csa', 'cas', '2022-11-23 13:34:26', '2022-11-23 13:34:26', NULL, NULL, NULL, NULL, 'rhEy6Xq8a5vLu9v2p7jQ1vpCYbOseB5N7hGVGPBTo03QcslpKhBbff13Pk8e2BX9e8QFQ9Tuj8GZBp3FqrRximGsqfnAICk3M3jdbc9BcRV9xTR1f2LTlo0MWVDz2gG5', '$2y$10$qOmoOIZtGI2AkTI7vD5Pau0AY.zDRrTPKnSy92w7JBUyi4RM9L7yS', 'a@a.cascs', '0', 'month', NULL, NULL, '0'),
(101, 'nada', '1234567', 'male', 'eeee', '23', '45', 'wegre', '2022-11-23 13:35:40', '2022-11-23 13:35:40', NULL, NULL, NULL, NULL, 'vmVcIM9CRHwx4HRwQskCMo3CvrknjO4fBSWtDmoZGkwjBIZ3AxCXh8wBeoljtM0AnBikYe62Irqg87qWswVfr6JsCus9ILUoE7UxWyOrno08ToqqoDfA7OckP8narFjV', '$2y$10$iQjZpry8c16noz87u0yXPuOr3BPXIm5lafQs/V3EEY3R8urQgP0M6', NULL, '0', 'month', NULL, NULL, '0'),
(102, 'nada', '1234567', 'male', 'eeee', '23', '45', 'wegre', '2022-11-23 13:36:26', '2022-11-23 13:36:26', NULL, NULL, NULL, NULL, 'ElsadO5Pi15YRr0xR55JGM9IWImDP071Sjub9DsP7K6Fvmow82qXrKD803pkiSqUOMN0B6O68aa6dYCcMkOs2tmvFcwObVsOSt1MJD4mu6kwhbSH1NKs4H4Bw6nHcHr3', '$2y$10$KjdbOltStbLaeOmKpYp4rul6eF1gCiltA3OS0MA1wVv/IyRIHFNza', NULL, '0', 'month', NULL, NULL, '0'),
(103, 'nada', '1234567', 'male', 'eeee', '23', '45', 'wegre', '2022-11-23 13:36:31', '2022-11-23 13:36:31', NULL, NULL, NULL, NULL, 'LeFtuoScL4pmiDcSvzNaxWklR4YW9wSYxlbcYpUnbVpfL9Do0OsWoM5bld6ElEbVP7jwbINtLjKnPhj6iKIpHeJwO8BI4X4eTR12Gj6WQb7g6Sbm25TnOYnW773JsnrP', '$2y$10$dO.PTFflk5oeIWxAa2JEpuoctqWc98d2Xs2pnVUOgq1asQZH0Vuae', NULL, '0', 'month', NULL, NULL, '0'),
(104, 'gshsh', '5484646', 'Male', 'Low', '15', '170', '2-3 times in week', '2022-11-23 13:38:52', '2022-11-23 13:38:52', NULL, NULL, NULL, NULL, '4mRfFWDvrS8ggtotJEDReraJpyNeY05GkpGxR3trpqCUMQFAiSw618UgZJF9BoQTEaPkKX2hOli0MViRUhJfkF210l9Qqf1UcahPjAdObq3OvODJjEHCdNt1cD5JHbx4', '$2y$10$4S8AgTCRm4Kiw8byzO.Axu9r5aq0QofWTFqR2m4FIVuFgFIIJyOyy', NULL, '0', 'month', NULL, NULL, '0'),
(105, 'gggg', '5454646', 'Male', 'Low', '15', '170', '2-3 times in week', '2022-11-23 13:40:07', '2022-11-23 13:40:07', NULL, NULL, NULL, NULL, '1xfwrWxvigqcMbPIg1UIBZyABW4zsoOrnFWQoPOba0JQA0LS0uzbA2CZwR3eRuHUc7mWJPUnmW0YzVxOlnDjm7iNFk5oVquTu8gpb0uo4ycoh48fbmW6XLLKVIZ5Du4H', '$2y$10$7PrCOBugxkZrisxpWeMD5.mGgNH6gmVQvLqDfPNp4IGbjm1WwVn.e', NULL, '0', 'month', NULL, NULL, '0'),
(106, 'salma', '12345678', 'Female', 'Low', '15', '170', '2-3 times in week', '2022-11-23 14:45:43', '2022-11-23 14:45:43', NULL, NULL, NULL, NULL, '8tmKanbP16U4zDi4ZLVo6ms22q7FdCGcnixtOukTtw9nowNx6kxCvTkIs7n9emTBG5jEZZ59YZSczEMbwEGUIVLMAKWrNLdToARd3MrzEygkgkFyaLAqY3ShrSw3E5e6', '$2y$10$my6F1ZypvU6arooKGHUvmeMK6esiS9jj40huOt/1/Izei2RS7n9.G', NULL, '0', 'month', NULL, NULL, '0'),
(107, 'mahmoud', '01094034584', 'Male', 'Low', '15', '170', '2-3 times in week', '2022-11-24 09:42:07', '2022-12-27 12:15:21', NULL, NULL, NULL, NULL, 'hlq47AjcfqKOnXjUyqLqyQF5FbdgXtmggZRfOniLTfKS5AmeOTiZXU1R5qmQjvV6FYEKsq05AeeoptJZMuIL3nVec9GFhkgOseuDhwsTANaX1DKHucyhWiRMiG25SQcv', '$2y$10$SPmJTUhIqCGHICwwFZrUve/M9bqE/T.lo5z5L3Qrul/qYbDOjKrhG', NULL, '1', 'three_months', '2022-12-27 01:15:21', '2023-03-27 01:15:21', '0'),
(108, 'nada', '123456', 'Female', 'Low', '15', '170', '2-3 times in week', '2022-11-24 12:04:07', '2022-11-24 12:04:07', NULL, NULL, NULL, NULL, 'XZEtU5Ko7P3bolEMrVZU7gGZv7No1AXXtPYmKYJ8iY5SveYSE7gP19FyIJCVtd9gdyaV26U0TKxFbRbQuJO5bg57ZI3UZNshEOVLjEhokcAwXv5hjKDS6hKd02hIXhUK', '$2y$10$XrU09upg9ojlWZgYECIUpOCnwt./qzPZEI1uEobRVT8ZEyyoly3Wa', NULL, '0', 'month', NULL, NULL, '0'),
(109, 'yuvug', '838353', 'Female', 'Low', '15', '170', '2-3 times in week', '2022-11-24 12:08:18', '2022-11-24 12:08:18', NULL, NULL, NULL, NULL, 'HSxVG1cJ10gxxA0wq7DNx9uTVomsTCyxEsXgzhhLnrTAkTeiBEBF1caqCMD8CXlpjlmAkdqaSS9u1wvY08wpsR8tcP5IXJ3GEsHlrnl8N2nXrTyBI0dKxJXXf01MTmUT', '$2y$10$OSCggWognsNrIagAgL1sceHGBaXdnnHLEGEkEXn0uRw/gKDp4KMMm', NULL, '0', 'month', NULL, NULL, '0'),
(110, 'cufuf7', '5353538', 'Female', 'Low', '15', '170', '2-3 times in week', '2022-11-24 12:23:13', '2022-11-24 12:23:13', NULL, NULL, NULL, NULL, 'RJL5cZflOVJqivcTZ7Sa9GjctYxPLSEvBsBaW3VRQjfZvJ6smx4E5qE5yB59HbH18kHtHYCONg21UVdNIq9XmLUsnHLMPRjCYzl078lleAWLJVrw5UwvlUZhzazlhkfK', '$2y$10$Tb.1NwACdRz0gTcymvH90unpl2duQQJWX67RkEOJqriUfUhMUflDq', NULL, '0', 'month', NULL, NULL, '0'),
(111, 'erggh', '123456', 'Female', 'Low', '15', '170', '2-3 times in week', '2022-11-24 12:49:45', '2022-11-24 12:49:45', NULL, NULL, NULL, NULL, 'IWLetKywJfgqXbZEkfEO3zsXvl5VvGRxA5FJwQSe1rFEOxdZnnKkEebAFGWmdlhjsboULHM7J3BdkGupu9CbMBXrJUFBT1lttVqs43uWmumbo076v9HmOvsv2qmWegDR', '$2y$10$hHmAAm2f.scf79AKk8bz3uV/HKQxhQq0HWeb4awVK8TZ4G.dRLHsW', NULL, '0', 'month', NULL, NULL, '0'),
(112, 'ggjf', '12345', 'Female', 'Low', '15', '170', '2-3 times in week', '2022-11-24 13:58:51', '2022-11-24 13:58:51', NULL, NULL, NULL, NULL, 'Gvh2vwRraw34u832zWZaRKtUNa79yb2zoBJiiCVz8xCaWM8B5Okuzfwe2NPYhzLPvCb7LrrGNkvL8vNnmJqedDbJH2HHh9cgacYInSTlzFdk8sWasKAfe1DexT67KZOj', '$2y$10$mhwyOB8iGpPiCX7NFt903uZ/bzxtz2zRaJ7PbcwGk02e8iGs2q8X6', NULL, '0', 'month', NULL, NULL, '0'),
(113, 'nada', '123456879', 'Female', 'Low', '15', '170', '2-3 times in week', '2022-11-26 12:41:46', '2022-12-04 09:48:08', NULL, NULL, NULL, NULL, 'e5sSzATC2rxzbl80x705Pn5kNSdqinhbo5ry7FxpGB7zcS5zC37xwZ7OSBX7u5vSWGDM62qkIaszcfQzGEbsdkB30ItAcLVh3aFwWbemIaPIDj4LSfFt1py2xlZ2hQ8E', '$2y$10$ZlAxfzfoXQ9Av2ej5HqcKuMStUNZkI2eSo9UxKz1zOAHtjqq0TVsy', NULL, '0', 'three_months', '2022-12-04 10:54:27', '2023-03-04 10:54:27', '0'),
(114, 'nada', '1235588', 'Female', 'Low', '15', '170', '2-3 times in week', '2022-11-27 07:29:45', '2022-11-27 07:29:45', NULL, NULL, NULL, NULL, 'i0z9IS1SpF9GfJxJxy6ty0vOwyaLpbRHyzenXEEl6hcHVxy4VezfVb0qBS3gs6l3MEm7gd1xpIec3EtTXT1mX28ex4WaLseC6bY0aaxXoihsYexsSS9mafAvDvJXeiFi', '$2y$10$HTDwV.DuhowTQJjubDhR7.bULE6tnjC3ztWAkugGnwK2IKfVOPHQG', NULL, '0', 'month', NULL, NULL, '0'),
(115, 'nada', '81616288', 'Female', 'Low', '15', '170', '2-3 times in week', '2022-11-27 08:44:42', '2022-11-27 08:44:42', NULL, NULL, NULL, NULL, 'kaxAbFf8Qx7Hq5fEkPXryIqX79LsUHpDaqFO9MWllVJulBEyIZEPVto6wvrJgQAb5iceQG4ndV0W87GcaA9423wKDVbeuX9mu5ycxMLySe2v2aUjlT8taMa7sBTP3Utd', '$2y$10$fchgnl5KUHjaD4pp804k2.QrV/IFVvUg67ZXm4LuN9ZCP.2QvRO3a', 'nada@gmail.com', '0', 'month', NULL, NULL, '0'),
(116, 'yeheg', '659958', 'Female', 'Low', '15', '170', '2-3 times in week', '2022-11-27 09:04:08', '2022-12-04 09:50:09', NULL, NULL, NULL, NULL, 'lGs7m7NkbxjQdw1NcMFDUJK36rFgARkv5OPnmvWF6D5TevWtoi38fZ5PVdAGwFzlFJTVe65Ff9cRCGcrTTDVaulsvWR1ogdum537Hhg2gmS3FRp3tWZ9BPXbv1d21gUQ', '$2y$10$ZXNLBzNVinltR8rfyUmRDOWIbJchG.bC7h5gFQcRPAg9Mlw5TrX.e', 'nsdawael45@gmail.com', '0', 'six_months', '2022-12-04 11:48:54', '2023-12-04 11:48:54', '0'),
(117, 'nada', '1234567', 'male', '123', '23', '170', '3', '2022-11-27 09:39:37', '2022-11-27 09:39:37', NULL, NULL, NULL, NULL, 'moHKfhmYushWGTNmB9uCKhdi0nuQMdEK4dnC5Kf3A1U7uoUiQj49RqI1WeGz6HrrSHZItjucV56igRzyHEbSPkTrTfg3HLxHi557uOPeQvxYR8nDFdzIP9Pf9cvFOQJw', '$2y$10$IKqvAHm3WGW4eeidISKaMe41iRRXTnUNK.L.zPMf4ixGFvUU54nWi', 'nada1@gmail.com', '0', 'month', NULL, NULL, '0'),
(118, 'eslam', '01201742999', 'Male', 'Low', '15', '170', '2-3 times in week', '2022-11-27 13:17:29', '2022-11-27 13:17:29', NULL, NULL, NULL, NULL, 'z0Jl9RTnTBv5OSWkal5XvdvcpFHCdZ5t0pO3DVc8EFNBiylcftba90KJLwjMtxuNVHXFzf7oPLE91sJWO4VEWbzhgbKV8sBCVavKe1xYql7aaWeAUuR6MtEYJYFwA5Qm', '$2y$10$Ln4k1E9vTAvuXtx3A3fOfO.tQopAm.n8Eja3Wlc3e7O/v4.RKHiUi', 'eslam.rali@gmail.com', '0', 'month', NULL, NULL, '0'),
(119, 'hsgsv', '64959', 'Female', 'Low', '15', '170', '2-3 times in week', '2022-11-27 13:18:37', '2022-11-27 13:18:37', NULL, NULL, NULL, NULL, 'bvd2ArXkQ926SKSwadMzAw2xE9iFOfN5EI68HsZWiiwuQAtMkEJ2KxtyWz59kPGrxZY3lkoIKJ70k1Kc4nARoZaHuuO4hqJ3ZpOe5r3GZIO6hEIOd7uYcjYPcQHA0r83', '$2y$10$XlOo9sUQmRNxzkPSgwYkSeY3pzOMI.sFj.cNPXEszvC5gudHy1fuG', 'nadadd@gmail.com', '0', 'month', NULL, NULL, '0'),
(120, 'gsheu', '95959', 'Female', 'Low', '15', '170', '2-3 times in week', '2022-11-27 13:22:45', '2022-11-27 13:22:45', NULL, NULL, NULL, NULL, 'i7h07ysU6edHmqmkHmXwnHDHQEG9JoSuVZko16hvsYszZuJ9kpvKe69OVcXgoyrjKl3vUAB45KRWYBKJAVpbveeS1IsS63ooMn7bne1uUNFEf70kujTGBTMimxb2y6G9', '$2y$10$wGDt6D7O45372zMXBAZaJu/vXRD3kHYxZDrNX/u9AxpoOl5qRoSYC', 'nadabb@gmail.com', '0', 'month', NULL, NULL, '0'),
(121, 'nada', '1234567', 'male', '123', '23', '170', '3', '2022-11-27 13:24:28', '2022-12-04 09:47:57', NULL, NULL, NULL, NULL, '8uXAps7RvFxbQuBoMm5gQONqvxi4t8Y9OhRXpGSVP7NELuHKPZAkoy4aUsQ7HxH4w2OGEbXNHzbu2fFvPpAPfcDiPOsvWj99PsXBzSagmaQmI2FTIAjKwQBmyKYeaW5u', '$2y$10$iMZpXserpYbjlnhu3B75feyqsTSIgS/2JAHIW2njpASGExxiWWkHO', 'nada14@gmail.com', '0', 'six_months', '2022-12-04 11:47:08', '2023-12-04 11:47:08', '0'),
(122, 'nada', '0484656', 'Female', 'Low', '15', '170', '2-3 times in week', '2022-11-27 13:32:54', '2022-11-27 13:32:54', NULL, NULL, NULL, NULL, 'F3BESw73GNagxMGKgF4exiZm92BVhtXduWiqOWxt0efW1vrLTJORZZ4lNt4KoSf8ttYIImnzKkLPpDX40H6DGYFLSdExdTzbWMjCG5JIIWxtY2TP0FdUmSesFZoGja0O', '$2y$10$T1UWq78Tnze.toCX0jH9mO.vgwaNVEfsNETVic9X4fZIjJ6V12KHW', 'nada33@gmail.com', '0', 'month', NULL, NULL, '0'),
(123, 'gshdh', '8464646', 'Female', 'Low', '15', '170', '2-3 times in week', '2022-11-27 13:35:44', '2022-11-27 13:35:44', NULL, NULL, NULL, NULL, 'q5pVsiCnqNLdqmuRYl0UrzNfuWP57tyx4mqoCQsL58SrGe7hVKtAaak2KZEt1zHnj1IG5icAWBsbDRKQsDdCD0JTuAFMh6FRr59yFN2EE2iWUtmsX4zLN7mRE4iSqDLX', '$2y$10$MT0GO1.z9J8equOj2zNcM.qqoL6X.J3ylTekXQTyzEOp/ocptK7dm', 'gg@gmail.com', '0', 'month', NULL, NULL, '0'),
(124, 'gwgeg', '6495950', 'Female', 'Low', '15', '170', '2-3 times in week', '2022-11-27 13:47:43', '2022-11-27 13:47:43', NULL, NULL, NULL, NULL, 'ay2To1rKhDXaC6MdA6XVWs4dn8M2yZsApB5FR1ugk3Yq3qaOzOuv8WeKY4E9ADr21eyFbQAQm510a6mjP80MkbwwPAjDszXGSrU1WW09kIkAyyaVKuFFzfzvtgK3PK8R', '$2y$10$mIvKpbr2ShHvDaNYgtRtMOMQchlVpPajg46ungU3LOA2ajvtwxrvC', 'rer@gmail.com', '0', 'month', NULL, NULL, '0'),
(125, 'eslam', '_#737388', 'Female', 'Low', '15', '170', '2-3 times in week', '2022-11-27 14:02:48', '2022-11-27 14:02:48', NULL, NULL, NULL, NULL, 'vq1WhwKzK3qbyFVYKh9rOPoSe6to7JawkMo4vrjxM92GCrism7HyUGox5y4rbyDH1a7yPeBEjFrl1aWLdgiNXE0EKlh894X539cQdOxDcpE9gMRk2EzaO4uuIyT11kpk', '$2y$10$5uEGvBZwY/yAp6f7O8pO1uQjxNsVEXVjeb5r3WaA.doAur41l/69m', 'eslam@gmail.com', '0', 'month', NULL, NULL, '0'),
(126, 'mahmoud', '01033508305', 'Male', 'Low', '15', '170', '2-3 times in week', '2022-11-27 15:43:36', '2022-12-04 09:54:48', NULL, NULL, NULL, NULL, 'mjsly7lukt3qKMZkw4XDeIazIn4fjKDIubJq1AOwchhMuTMCyF9qiHQEDmO3yeXizJXkPmBtxOuUOf40WOeotZgYPejB4yUzfNlam8cTwBoZvoUfaExuKkUWmWK1pmDX', '$2y$10$OzYKeBpLmHJfA58SpCWZGOqTpjhW8y8CuqS7TN8K.DhQlec3Jb/jW', 'alrashidi.div.1@gmail.com', '1', 'three_months', '2022-12-04 11:53:54', '2023-03-04 11:53:54', '0'),
(127, 'zzzz', '3214324235', 'male', 'lorem', '12', '123', '2 - 3 days', '2022-12-03 12:36:33', '2022-12-04 09:56:53', NULL, NULL, NULL, NULL, NULL, '$2y$10$ehvq48D7aeCqWI/mtaTxc.zf0iQyX8DryBSgcsy0u30YKFuk9X30O', NULL, '1', 'six_months', '2022-12-04 11:56:53', '2023-06-04 11:56:53', '0'),
(128, 'test', '01285821487', 'Male', 'High', '18', '170', 'All 7 days', '2022-12-27 07:15:30', '2022-12-27 13:48:05', NULL, NULL, NULL, NULL, '8Wrsgnt7t7un03hKJXDwnCueQW9HqkutjlUfNJh7LMcY1xE5R9Acq8648VupxSQEzO7zWj5uoI3ONeUGHnuvBpejsqakKUKr4rJazCQyrikGRPyduGGxJQnmFcFLvTji', '$2y$10$2WEhy.6yZP.ddUTom2fL4OjkmITW6PIkZ.ryiQJhjcxYLInegzgpW', 'test@a.com', '1', 'year', '2022-12-27 02:48:05', '2023-12-27 02:48:05', '0'),
(129, 'yyyyyyyyyyy', '123456798', 'Male', 'Low', '21', '175', '5 days in week', '2022-12-27 07:18:48', '2022-12-27 11:35:38', NULL, NULL, NULL, NULL, 'owqreGO52M2nSRQHWpMXfHgNHHrq0UXa5kWQFuOqHsidHN0lCzGFYXxsT3LHW4SoU1jZCuNSVGoNWK94kIXEPB79dYEtNWErvIp1Bq6Rx7dPSHNWhjiy5NP2LCFlgQ97', '$2y$10$E6TVJnuu5DhG2bp3srp4P.CvYYFXMh1rPYzQk7bj1rhgsyhg70ZRK', 'aaa@a.a', '1', 'three_months', '2022-12-27 08:19:04', '2023-03-27 08:19:04', '0'),
(130, 'neww', '5182020', 'Male', 'Low', '15', '170', '2-3 times in week', '2022-12-27 09:27:03', '2022-12-27 11:36:14', NULL, NULL, NULL, NULL, 'fVkSvUGHnBZUDwk6G09XdfppPPGyVZGgotoETQcC7534uiNPalIRdiGzTYXV76pfpIFkUdjlcko3AeJZ7molhb3HP0Gb4mcddCn3dzcqsNaWML2dSwyZ5gSi7gmZSWbg', '$2y$10$htYPZBtF9k2l.ZPPZ6OUbOxzYlDbRyHLv1mjNXPl4sHC/sOov6M3G', 'new@gmail.com', '1', 'year', '2022-12-27 12:23:53', '2023-12-27 12:23:53', '0'),
(131, 'marawan', '01285821487', 'Male', 'Moderate', '22', '173', 'All 7 days', '2022-12-27 11:37:00', '2022-12-27 13:42:17', NULL, NULL, NULL, NULL, 'T6DA5Lcw5O8YDDT60gtO4wJGvPKPqqjqO3l56HlEOp55TJtulsi5qnItyIz1Pfk2svqXijd0wrLfWpDtCosMVK8KLgigKOWn2IO6ivWCqXnOBTcpXf4kJRQYMt8h4n5h', '$2y$10$ZGQwsFZnpeVgFvaiJi.Pw.GwGaTIxe1b0gmNKjS2oQhPJuCcGYi6a', 'd@d.com', '1', 'three_months', '2022-12-27 01:26:30', '2023-03-27 01:26:30', '0'),
(132, 'nada', '01285821487', 'Female', 'High', '26', '183', 'All 7 days', '2022-12-27 13:55:34', '2022-12-27 14:23:28', NULL, NULL, NULL, NULL, 'LGJtUzSvokQlPIwoeLiODqZ0HwH4FWjfRSJFENwtNjAbwrZ075IG86QMT8bKInfBLrsSP33V96zyKnEf6iJZOXJ4l4A2FA1Ms5tWQP8AdZaC1LVhUTuyjl7nhE4mk5Gh', '$2y$10$o/fzmAQM8mPr7bOqzxTdpOwQmibhbNlfc8XMfsec5tDqV4Ho.jk4C', 'n@n.n', '1', 'month', '2022-12-27 03:23:28', '2023-01-27 03:23:28', '0'),
(133, 'ttttt', '012345678', 'Male', 'Low', '15', '170', '2-3 times in week', '2022-12-27 14:43:12', '2022-12-27 14:45:47', NULL, NULL, NULL, NULL, '42R5FD2TfIxkyK8b15Bwl9sggAJTpiwTxvOe5MZ9qzO22IA8r1NVLEueKkTG0hitm4bef4w7AJ4Wdl7CbvaI6PHfmPuO1rSkteUEbjeY0CihZz74zAEHSGAx76lI0qaH', '$2y$10$YUogqcAWrj7/WARPWUOQb.OHtiJscjcQ8tc7JvJOIqfOwQlsrTFNy', 'tt@gmail.com', '1', 'month', '2022-12-27 03:45:47', '2023-01-27 03:45:47', '0'),
(134, 'acsc', '14323412432', 'Male', 'Low', '15', '170', '2-3 times in week', '2022-12-27 14:49:25', '2022-12-27 14:49:25', NULL, NULL, NULL, NULL, 'iW7LQ0arGWNCoQYTHt0XSwuWySFZIctMcaVTHFpPFiUcQ8YL9ChssYL5CXRs0SduWyzcrCDZVIb7k9Qk7NrMWSyUwDC1tI9zeyRCVTeIubm3pSizXWt65h5ypsjPuiIx', '$2y$10$AZ57Q7DhwVHqjtVA.Rlgd.gMqrNGqGYBsutR2KuiIyKE/vqGCQula', 'w@w.w', '0', 'month', NULL, NULL, '0'),
(135, 'ffffff', '1224546870', 'Male', 'Low', '15', '170', '2-3 times in week', '2022-12-27 14:57:10', '2022-12-27 14:57:10', NULL, NULL, NULL, NULL, 'cEbgPjVXLsyDjwoVSKzP7b9QOc3chm6DhPKZF32MZNnE88VCo9gNX5jMlHHHuhMQG4bsklf6cmFg8cacXrmKvljaKouaaYNkYl0gt8eRWAMnSGMLOvvLKrIeViYQlWJU', '$2y$10$98A9yJoVWvSijJMdxNIWd.jj0TxmvZj03J831gsJEg7Z5ZUaCwmOa', 'fff@gmail.com', '0', 'month', NULL, NULL, '0'),
(136, 'yegeh', '52828', 'Male', 'Low', '15', '170', '2-3 times in week', '2022-12-27 14:59:02', '2022-12-27 15:00:02', NULL, NULL, NULL, NULL, 'XuCzsA8CJUc6i7MIAEwSUSPb8DKegS7csHzR1VD4Ev7TWO2MClKkOifldYQzU0h8WRN9hwNpbhdXjZg10O12nnndxQQJuHmOQKn9hEPEh3xzrRZG5p00CmjiErMuAMNQ', '$2y$10$QkvGNvU7.dJh3XHh.L.Q5.7ZxkBqH2JEsWmBqUsxBrM8Mg42llNRO', 'yyyy@gmail.com', '1', 'year', '2022-12-27 04:00:02', '2023-12-27 04:00:02', '0'),
(137, 'aban', '01011141478', 'Male', 'Low', '15', '170', '2-3 times in week', '2022-12-27 15:26:28', '2022-12-27 15:26:28', NULL, NULL, NULL, NULL, 'vC7CF4rpzOZHNHMh79H7MWnqtdhOpmJhLVMnwwMXXw0UvWNBTvdcnMdOw7xubfdzWCrCd0Zx9XcOulztMqYI3zyTf5MVQMn7ICPKutmQKjH1vDI71ViPkp9gB1YpzJ0m', '$2y$10$zVV1WrMnom//wSZZqvjF3.TiyuKhv4Cak6LaiXwzNpCHKXYkkOVsy', 'stackdeans@gmail.com', '0', 'month', NULL, NULL, '0'),
(138, 'Omar', '0508446760', 'Male', 'Moderate', '25', '184', '2-3 times in week', '2022-12-27 19:33:39', '2022-12-27 19:33:39', NULL, NULL, NULL, NULL, 'ef9d81fBKWzUWzcRpT0nYGRWcRYH9TlUj2opO4JbhOR5C1Druj2iihoRKMBqG0QVVGmxDZoyl7hBHU12raWJdzqec5BB25GPwFHg6ewKf526tjMDge6ZPhwblApFSWxu', '$2y$10$HrHvcMhXNUWOBVyMTqsGXeDEPV/AeczvKbULc2gnCVijUgFs4gUue', 'omar.przemoo@gmail.com', '0', 'month', NULL, NULL, '0'),
(139, 'xxccc', '1234580', 'Male', 'Low', '18', '172', '2-3 times in week', '2022-12-27 20:34:34', '2022-12-27 20:34:34', NULL, NULL, NULL, NULL, 'kFbiZza9rAq7bjEm2B9NRKFDEoS10o803t1aW1ADgOswdZmY6Di78yBbMYCs1F0NnsjzdlDtYdqeTB5qC4lLeBUY4TtRqioCeKw3X8eV7AjWmzv5Ld4uFzwRPqJso1yJ', '$2y$10$EWlmQWgnd6WGI4x8wzeGfO0aEjr9MO0LtQxIaYyAZKPsNbFgaPA62', 'xx@gmail.com', '0', 'month', NULL, NULL, '0'),
(140, 'fffff', '123456789', 'Male', 'Low', '15', '170', '2-3 times in week', '2022-12-28 07:22:01', '2022-12-28 08:59:33', NULL, NULL, NULL, NULL, 'uvJPbmcEAF7AYGDVxbebA0wOaNHgOaLR83VPvBqvWeRWJLMHaZZ5vDIrOaje84LMBwbUbZl6aFz4bXurWOYXz9vorCLru5kOEv6R4rXrfG3iSnbgEmm3R29RGXFbniqy', '$2y$10$eXq8Pw..lRioItrQ63Hzz.EOZ5hk0HLsOONA6K/8FB/nhsGV296pq', 'jjj@j.com', '1', 'month', '2022-12-28 09:59:33', '2023-01-28 09:59:33', '0'),
(141, 'iiii', '12345678', 'Male', 'Low', '15', '170', '2-3 times in week', '2022-12-28 10:04:04', '2022-12-28 10:04:35', NULL, NULL, NULL, NULL, 'o6TThukMDQkttTp5moGC9yqwM1M3051LcIZtMOa22Lr7kOPJhEVuOtg4Kxu4Ex7QrUC4jGgdto0NAm3cqolniRUAf2VNBSxggJsEM7rWQoTAGnGaKHX3cbIiLsBPeyMR', '$2y$10$5hMma6K9JrtfqDsskBHMFuv/35Y0lbSUjobvCDxUvUhZn/qHsvwFW', 'ii@gmail.com', '1', 'three_months', '2022-12-28 11:04:35', '2023-03-28 11:04:35', '0'),
(142, 'abanob', '01289949582', 'Male', 'Moderate', '25', '174', '2-3 times in week', '2022-12-28 10:25:05', '2022-12-28 10:25:05', NULL, NULL, NULL, NULL, 'cRszfQ4Xo7QIOHlLU2ToLt3TnOnUVdZOknBx3C09GVvxTnSLtftQaqmxFLbJ1javhFOWbhD5bgE10vymJ9ppstp8vPxfwRGNdKzOJTSC7HQirJU7BxvdSM1ZR4UN6nEm', '$2y$10$yMbVJ1Zc3XlQh5M5B5P/VeJ37xJ65E7GRSIwtGXp4CaLKwkML.oNG', 'abanobgerges1997@gmail.com', '0', 'month', NULL, NULL, '0'),
(143, 'omar', '6454848', 'Male', 'Low', '26', '175', '5 days in week', '2022-12-28 13:42:05', '2022-12-28 13:42:05', NULL, NULL, NULL, NULL, 'KmcufpTiB95PRbsNRYBzfvaFvYFbuq3TgSD69dctBLU4AT9PMUpwx2rxPMZsJBuO2ocqCYcRSoKKG4ARoxCjMAaCFewvMItuDPplXRKD2Hbm7a6rHnei1EfIPBtjvRtI', '$2y$10$KlbIxckcaQHRqJofWCZF6.rVcFBZHiDjlpHgKGa9wFSkWUian15Q6', 'miro5000@yahoo.com', '0', 'month', NULL, NULL, '0'),
(144, 'wiroo', '01011608927', 'Male', 'Moderate', '25', '177', '5 days in week', '2022-12-31 22:45:24', '2022-12-31 22:45:24', NULL, NULL, NULL, NULL, '5bXRjzTbU8YQiuchlaAsGdKmPNiQAUBYVHlNXVQABR1b6Js9QPQCL2e0wgOff2KKtRAYmnwJcQS2WRgmfLR35FqA9pLwkEYx54PNWRcvfIoIgtM36bcQ9uR6Zf1ibn4M', '$2y$10$6yiJOfMQdHz4.ypeRpUlWeXGxLpGCsLcBenNCAZvES6PAPc4bKyza', 'digimedweb@gmail.com', '0', 'month', NULL, NULL, '0'),
(145, 'hd job fif Guido', '02587569855', 'Male', 'Moderate', '15', '172', 'All 7 days', '2023-01-02 18:06:08', '2023-01-08 10:39:26', NULL, NULL, NULL, NULL, 'sn58MrXFQyndnHd7qUngtaAsEVpUUrajKuro2i72NFjY2TDhFAfHxU6juDn56rPpIgxPeNq3vS63frt8z6QOd0wEHx1NCBW00lsgjvxK86wpx2EwDXFprSCImMwDylza', '$2y$10$YW/i3HjKf5Av3/jU1MFI6.W4Hf28D8gdTEMJrC1GhfQF.vtk2olLy', 'rr@r.r', '0', 'year', '2023-01-08 11:36:09', '2024-01-08 11:36:09', '0'),
(146, 'ggggggg', '679484653', 'Male', 'Low', '15', '170', '2-3 times in week', '2023-01-02 18:07:36', '2023-01-02 18:07:36', NULL, NULL, NULL, NULL, 'um6ANtRrRr1iGzFUaWrCGy2A7WXJVjsYwLhinfLxrDYOU3F9QKRhjLMwOWB7DuMKkcOdf38ea0nIoYvlyC5yPrVERg4hZgG8hSphxBht2pKyVmxABiU8e7X0Yj56Adg3', '$2y$10$StHXjAaQUr4seKgbAYAoQunUx0EpVDgGoQvBDfGnvOvZaBNZem.Cm', 'a@a.a', '0', 'month', NULL, NULL, '0'),
(147, 'boni', '01284902397', 'Male', 'Low', '23', '170', '2-3 times in week', '2023-01-04 10:05:56', '2023-01-04 10:05:56', NULL, NULL, NULL, NULL, 'Y4W3gzXd1S9ZGe9j3fYxmxylbWNQM2vt0T1oZ9b27KWshaziVzTXp2Gz36Ah0TPhGeo3FkdWsFZuRUeZW68O1S1iBBKWj2lx5A7y14cNl72V22caPzZBAnBB90L0wc8h', '$2y$10$QC0l01WmpEwYoVlkIMzCwORzFShmSJcJJwGeZlLNGzc9xuo7UqPA2', 'abanob.ayad.2015@gmail.com', '0', 'month', NULL, NULL, '0'),
(148, 'mkjgff', '01019662004', 'Male', 'Moderate', '24', '170', '5 days in week', '2023-01-07 09:17:47', '2023-01-07 09:17:47', NULL, NULL, NULL, NULL, 'YZqSDoGI8T5EeRE423aqrhfdiWoAbwcsXuwwrwQRPfg5k2HwhOdPr9eRvJ39ofU0ocS5YgBBBLnGyss6MDWwNKDXGKg2CaiVfdRC8TZkXMBOfMv1V0sRrz2Acf6L4Ne1', '$2y$10$hMAwPJyQAlhcIBq4HschiuhV93LQ4BieIwAV6Qv9JhJrg81NfJCwK', 'mkjgffrxgdw@gmail.com', '0', 'month', NULL, NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `customer_notifications`
--

CREATE TABLE `customer_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `readed` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_notifications`
--

INSERT INTO `customer_notifications` (`id`, `user`, `message`, `readed`, `created_at`, `updated_at`) VALUES
(498, 'tt@gmail.com', 'added address in registration', '0', '2022-12-27 14:43:12', '2022-12-27 14:43:12'),
(499, 'w@w.w', 'added address in registration', '0', '2022-12-27 14:49:25', '2022-12-27 14:49:25'),
(500, 'fff@gmail.com', 'added address in registration', '0', '2022-12-27 14:57:10', '2022-12-27 14:57:10'),
(501, 'yyyy@gmail.com', 'added address in registration', '0', '2022-12-27 14:59:02', '2022-12-27 14:59:02'),
(502, 'stackdeans@gmail.com', 'added address in registration', '0', '2022-12-27 15:26:28', '2022-12-27 15:26:28'),
(503, 'omar.przemoo@gmail.com', 'added address in registration', '0', '2022-12-27 19:33:39', '2022-12-27 19:33:39'),
(504, 'xx@gmail.com', 'added address in registration', '0', '2022-12-27 20:34:34', '2022-12-27 20:34:34'),
(505, 'jjj@j.com', 'added address in registration', '0', '2022-12-28 07:22:01', '2022-12-28 07:22:01'),
(506, 'ii@gmail.com', 'added address in registration', '0', '2022-12-28 10:04:04', '2022-12-28 10:04:04'),
(507, 'abanobgerges1997@gmail.com', 'added address in registration', '0', '2022-12-28 10:25:05', '2022-12-28 10:25:05'),
(508, 'miro5000@yahoo.com', 'added address in registration', '0', '2022-12-28 13:42:05', '2022-12-28 13:42:05'),
(509, 'digimedweb@gmail.com', 'added address in registration', '1', '2022-12-31 22:45:24', '2023-01-08 10:52:43'),
(510, 'rr@r.r', 'added address in registration', '1', '2023-01-02 18:06:08', '2023-01-08 10:52:40'),
(511, 'a@a.a', 'added address in registration', '0', '2023-01-02 18:07:36', '2023-01-02 18:07:36'),
(512, 'abanob.ayad.2015@gmail.com', 'added address in registration', '0', '2023-01-04 10:05:56', '2023-01-04 10:05:56'),
(513, 'mkjgffrxgdw@gmail.com', 'added address in registration', '1', '2023-01-07 09:17:47', '2023-01-08 10:52:38');

-- --------------------------------------------------------

--
-- Table structure for table `customer_subscribtion`
--

CREATE TABLE `customer_subscribtion` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `customer_stripe_charge_id` int(11) DEFAULT NULL,
  `stripe_customer_id` int(11) DEFAULT NULL,
  `duration` enum('day','week','month','year') NOT NULL DEFAULT 'month',
  `approviation_status` enum('pending','accepted','canceled','finished') NOT NULL DEFAULT 'pending',
  `started_at` varchar(255) DEFAULT NULL,
  `finishes_at` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customworkouts`
--

CREATE TABLE `customworkouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categoty_id` varchar(255) DEFAULT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `calories` varchar(255) DEFAULT NULL,
  `cycle` varchar(255) DEFAULT NULL,
  `intervaltime` varchar(255) DEFAULT NULL,
  `totalexercise` varchar(255) DEFAULT NULL,
  `gif` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exercises`
--

CREATE TABLE `exercises` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `repeat_count` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `cat_name` varchar(255) DEFAULT NULL,
  `timee` varchar(255) DEFAULT NULL,
  `calories` varchar(255) DEFAULT NULL,
  `gif` varchar(255) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT NULL,
  `deleted_at` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exercises`
--

INSERT INTO `exercises` (`id`, `name`, `image`, `repeat_count`, `url`, `cat_name`, `timee`, `calories`, `gif`, `is_deleted`, `deleted_at`, `created_at`, `updated_at`, `category_id`) VALUES
(8, 'High Knees Running In Place', 'Menuitem_1641806741.gif', '2', 'https://www.youtube.com/watch?v=QPfOZ0e30xg', 'Total Body Exercise', '60', '4', NULL, 0, NULL, '2022-01-10 08:25:41', '2022-01-10 08:25:41', 1),
(9, 'Standing Bicycle Crunch', 'exercise_1617099547.gif', '4', 'https://www.youtube.com/watch?v=c_6ut4ifXZ8', 'Total Body Exercise', '55', '4', NULL, 0, NULL, '2022-01-10 08:25:41', '2022-01-10 08:25:41', 1),
(10, 'Jumping Jack', 'exercise_1617099597.gif', '4', 'https://www.youtube.com/watch?v=c4DAnQ6DtF8', 'Total Body Exercise', '50', '4', NULL, 0, NULL, '2022-01-10 08:25:41', '2022-01-10 08:25:41', 1),
(11, 'Squat', 'exercise_1617099705.gif', '5', 'https://www.youtube.com/watch?v=YaXPRqUwItQ', 'Lowwer Body Exercise', '30', '5', NULL, 0, NULL, '2022-01-10 08:25:41', '2022-01-10 08:25:41', 1),
(12, 'Wall Sit', 'exercise_1617099776.gif', '2', 'https://www.youtube.com/watch?v=-0Q7Lds7B8A', 'Lowwer Body Exercise', '40', '4', NULL, 0, NULL, '2022-01-10 08:25:41', '2022-01-10 08:25:41', 1),
(13, 'Step Jack', 'exercise_1617099838.gif', '4', 'https://www.youtube.com/watch?v=JHdVMkRBuRA', 'Upper Body Exercise', '60', '4', NULL, 0, NULL, '2022-01-10 08:25:41', '2022-01-10 08:25:41', 1),
(14, 'Half Squat', 'exercise_1617100004.gif', '3', 'https://www.youtube.com/watch?v=jtZciPEaYzo', 'Lowwer Body Exercise', '25', '5', NULL, 0, NULL, '2022-01-10 08:25:41', '2022-01-10 08:25:41', 1),
(15, 'Push Up', 'exercise_1617100085.gif', '10', 'https://www.youtube.com/watch?v=IODxDxX7oi4', 'Total Body Exercise', '50', '5', NULL, 0, NULL, '2022-01-10 08:25:41', '2022-01-10 08:25:41', 1),
(16, 'Hand Release Push-Up', 'exercise_1617100151.gif', '4', 'https://www.youtube.com/watch?v=oX7339XfbSM', 'Total Body Exercise', '50', '5', NULL, 0, NULL, '2022-01-10 08:25:41', '2022-01-10 08:25:41', 1),
(17, 'Push-Ups with Rotation', 'Menuitem_1641806798.gif', '10', 'https://www.youtube.com/watch?v=SIXuGSOL3_8', 'Total Body Exercise', '40', '5', NULL, 0, NULL, '2022-01-10 08:25:41', '2022-01-10 08:25:41', 1),
(18, 'Knee Push-Up', 'exercise_1617100275.gif', '3', 'https://www.youtube.com/watch?v=EgIMk-PZwo0', 'Total Body Exercise', '30', '5', NULL, 0, NULL, '2022-01-10 08:25:41', '2022-01-10 08:25:41', 1),
(19, 'Tricep Dip', 'exercise_1617100297.gif', '2', 'https://www.youtube.com/watch?v=6kALZikXxLc', 'Lowwer Body Exercise', '30', '4', NULL, 0, NULL, '2022-01-10 08:25:41', '2022-01-10 08:25:41', 1),
(20, 'Plank', 'exercise_1617100411.gif', '1', 'https://www.youtube.com/watch?v=F-nQ_KJgfCY', 'Core Exercise', '50', '4', NULL, 0, NULL, '2022-01-10 08:25:41', '2022-01-10 08:25:41', 1),
(21, 'Lying Triceps Lift', 'exercise_1617100586.gif', '3', 'https://www.youtube.com/watch?v=ZnJLnzZ-CZQ', 'Total Body Exercise', '30', '5', NULL, 0, NULL, '2022-01-10 08:25:41', '2022-01-10 08:25:41', 1),
(22, 'Side Plank (Left)', 'exercise_1617100593.gif', '3', 'https://www.youtube.com/watch?v=K2VljzCC16g', 'Core Exercise', '50', '5', NULL, 0, NULL, '2022-01-10 08:25:41', '2022-01-10 08:25:41', 1),
(23, 'Side Plank (Right)', 'exercise_1617100683.gif', '3', 'https://www.youtube.com/watch?v=9Q0D6xAyrOI', 'Core Exercise', '50', '5', NULL, 0, NULL, '2022-01-10 08:25:41', '2022-01-10 08:25:41', 1),
(24, 'Abdominal Crunch', 'exercise_1617100782.gif', '4', 'https://www.youtube.com/watch?v=_M2Etme-tfE', 'Core Exercise', '40', '4', NULL, 0, NULL, '2022-01-10 08:25:41', '2022-01-10 08:25:41', 1),
(25, 'Full Plank ', 'Menuitem_1617100982.gif', '3', 'https://www.youtube.com/watch?v=3jAi2meNaQY', 'Total Body Exercise', '40', '4', NULL, 0, NULL, '2022-01-10 08:25:41', '2022-01-10 08:25:41', 1),
(26, 'Step Up', 'exercise_1617100862.gif', '10', 'https://www.youtube.com/watch?v=WCFCdxzFBa4', 'Lowwer Body Exercise', '50', '5', NULL, 0, NULL, '2022-01-10 08:25:41', '2022-01-10 08:25:41', 1),
(27, 'Lunge (Left)', 'exercise_1617101034.gif', '3', 'https://www.youtube.com/watch?v=wrwwXE_x-pQ', 'Lowwer Body Exercise', '50', '5', NULL, 0, NULL, '2022-01-10 08:25:41', '2022-01-10 08:25:41', 1),
(28, 'Big Arm Circle', 'exercises/gEoaJUXz7r5LO18HvgTGOhUKs2XIPVIeMDe6mpfA.gif', '61', 'https://www.youtube.com/watch?v=WzjGLFTItoI', 'Alma Gilmore', '40', '13', NULL, 0, NULL, '2022-11-21 09:45:43', '2022-12-27 08:35:42', 35),
(29, 'Mountain Climber', 'exercises/uh6ap6RGrzby13FLTr5MxULnaFyjCp2J1kU5Lob5.gif', '9', 'https://www.youtube.com/watch?v=WzjGLFTItoI', 'Alma Gilmore', '17', '26', NULL, 0, NULL, '2022-11-21 09:54:32', '2022-12-27 08:35:25', 35),
(30, 'Plank With Leg Lift', 'exercises/JjvcstykvLPD4llwC04bh3yNleNOEd0sfiYWhzzS.gif', '74', 'https://www.youtube.com/watch?v=WzjGLFTItoI', 'Alma Gilmore', '35', '37', NULL, 0, NULL, '2022-11-21 09:54:46', '2022-12-27 08:35:15', 35),
(31, 'V-Sit', 'exercises/j3XAi3YFEO9GyuT8lF66phAXlTYIxC2xnnSDTNEb.gif', '78', 'https://www.youtube.com/watch?v=WzjGLFTItoI', 'Alma Gilmore', '94', '97', NULL, 0, NULL, '2022-11-21 09:54:59', '2022-12-27 08:35:05', 35),
(32, 'Single Leg V-Up', 'exercises/1izwxuGiDCVYF4ExLtKzr5K4oCH2KEvw06YYzqVb.gif', '31', 'https://www.youtube.com/watch?v=WzjGLFTItoI', 'Daniel Dickerson', '59', '8', NULL, 0, NULL, '2022-11-21 10:03:13', '2022-12-27 08:34:52', 40),
(33, 'Single Hip Extension (Left)', 'exercises/Q2jGIHRkRrb9PKNKhEcDVxWFBJbM4GJlJshfnVsH.gif', '18', 'https://www.youtube.com/watch?v=WzjGLFTItoI', 'Cora Chan', '93', '27', NULL, 0, NULL, '2022-11-21 10:03:37', '2022-12-27 08:34:42', 41),
(34, 'Single Hip Extension (Right)', 'exercises/1lpSAKX2CXhnbsFYwTj0OUFLf6ZygV5Z2ku7Q7XV.gif', '28', 'https://www.youtube.com/watch?v=WzjGLFTItoI', 'Darius Albert', '7', '62', NULL, 0, NULL, '2022-11-21 12:15:20', '2022-12-27 08:34:31', 38),
(35, 'Squat Jump', 'exercises/XWnzPRTKMNwWDn1eS2ZzvaFhyTahFAs1780W75hc.gif', '61', 'https://www.youtube.com/watch?v=WzjGLFTItoI', 'Alma Gilmore', '62', '93', NULL, 0, NULL, '2022-11-21 12:15:29', '2022-12-27 08:34:17', 35),
(36, 'Standing Bicycle Crunch', 'exercises/10XGs2bV312IAtP9Xry7c3gJEhWyb5Plos6Hd1YW.gif', '87', 'https://www.youtube.com/watch?v=WzjGLFTItoI', 'Darius Albert', '13', '91', NULL, 0, NULL, '2022-11-21 12:15:39', '2022-12-27 08:34:01', 38),
(37, 'Total Body Exercise', 'exercises/RxxVOmaRXItYuDTIJYH6h7rtFHHLmnZcWTYi04I6.gif', '85', 'https://www.youtube.com/watch?v=WzjGLFTItoI', 'Shea Carver', '9', '17', NULL, 0, NULL, '2022-11-21 12:15:48', '2022-12-27 08:33:49', 38),
(38, 'Vertical Leg Crunch', 'exercises/hHPhHQPd2NjE8Be6HyhCTnPq8ILw4hqyEmJTUlMJ.gif', '77', 'https://www.youtube.com/watch?v=WzjGLFTItoI', 'Daniel Dickerson', '33', '82', NULL, 0, NULL, '2022-11-21 12:15:56', '2022-12-27 08:33:23', 40),
(39, 'Shuffle Side Squat', 'exercise_1617102229.gif', '3', 'https://www.youtube.com/watch?v=VmUrNI_SVJg', 'Total Body Exercise', '45', '5', NULL, 0, NULL, '2022-01-10 08:25:41', '2022-01-10 08:25:41', 1),
(40, 'Big Arm Circle', 'exercise_1617102378.gif', '5', 'https://www.youtube.com/watch?v=ADczvidTnWs', 'Total Body Exercise', '30', '5', NULL, 0, NULL, '2022-01-10 08:25:41', '2022-01-10 08:25:41', 1),
(41, 'Flutter Kick', 'exercise_1617102465.gif', '10', 'https://www.youtube.com/watch?v=eEG9uXjx4vQ', 'Total Body Exercise', '50', '5', NULL, 0, NULL, '2022-01-10 08:25:41', '2022-01-10 08:25:41', 1),
(42, 'Standing Side Bend', 'exercise_1617102552.gif', '5', 'https://www.youtube.com/watch?v=DmgZlywAlIg', 'Upper Body Exercise', '55', '5', NULL, 0, NULL, '2022-01-10 08:25:41', '2022-01-10 08:25:41', 1),
(43, 'Front Thigh Stretch (Left)', 'exercise_1617102740.gif', '4', 'https://www.youtube.com/watch?v=BhQimqvU1tM', 'Core Exercise', '45', '5', NULL, 0, NULL, '2022-01-10 08:25:41', '2022-01-10 08:25:41', 1),
(44, 'Front Thigh Stretch (Right)', 'Menuitem_1632999618.gif', '4', 'https://www.youtube.com/watch?v=QVYRUZ-k9HQ', 'Lowwer Body Exercise', '40', '5', NULL, 0, NULL, '2022-01-10 08:25:41', '2022-01-10 08:25:41', 1),
(45, 'Mountain Climber', 'exercise_1617103568.gif', '2', 'https://www.youtube.com/watch?v=nmwgirgXLYM', 'Total Body Exercise', '50', '5', NULL, 0, NULL, '2022-01-10 08:25:41', '2022-01-10 08:25:41', 1),
(46, 'Plank With Leg Lift', 'exercise_1617103644.gif', '3', 'https://www.youtube.com/watch?v=whRaAg0tYC8', 'Total Body Exercise', '60', '5', NULL, 0, NULL, '2022-01-10 08:25:41', '2022-01-10 08:25:41', 1),
(47, 'V-Sit', 'exercise_1617103751.gif', '2', 'https://www.youtube.com/watch?v=emyOfFK2S8o', 'Total Body Exercise', '35', '5', NULL, 0, NULL, '2022-01-10 08:25:41', '2022-01-10 08:25:41', 1),
(48, 'Single Leg V-Up', 'exercise_1617103854.gif', '4', 'https://www.youtube.com/watch?v=Iefe83rf6Wk', 'Upper Body Exercise', '25', '15', NULL, 0, NULL, '2022-01-10 08:25:41', '2022-01-10 08:25:41', 1),
(49, 'Single Hip Extension (Left)', 'exercise_1617103942.gif', '4', 'https://www.youtube.com/watch?v=ynLvGO09y_s', 'Total Body Exercise', '45', '4', NULL, 0, NULL, '2022-01-10 08:25:41', '2022-01-10 08:25:41', 1),
(51, 'Single Hip Extension (Right)', 'Menuitem_1641806956.gif', '4', 'https://www.youtube.com/watch?v=ynLvGO09y_s', 'Total Body Exercise', '20', '5', NULL, 0, NULL, '2022-01-10 08:25:41', '2022-01-10 08:25:41', 1),
(52, 'Squat Jump', 'Menuitem_1641806930.gif', '5', 'https://www.youtube.com/watch?v=MgwWbDeOYcw', 'Lowwer Body Exercise', '50', '5', NULL, 0, NULL, '2022-01-10 08:25:41', '2022-01-10 08:25:41', 1),
(54, 'Standing Bicycle Crunch', 'Menuitem_1641806903.gif', '4', 'https://www.youtube.com/watch?v=8lsAXzvVHrc', 'Total Body Exercise', '40', '4', NULL, 0, NULL, '2022-01-10 08:25:41', '2022-01-10 08:25:41', 1),
(55, 'Bicycle Kick', 'Menuitem_1641806886.gif', '4', 'https://www.youtube.com/watch?v=UZZhuJACZJM', 'Total Body Exercise', '20', '5', NULL, 0, NULL, '2022-01-10 08:25:41', '2022-01-10 08:25:41', 1),
(56, 'Vertical Leg Crunch', 'Menuitem_1641806864.gif', '4', 'https://www.youtube.com/watch?v=hE68VjfGl2E', 'Total Body Exercise', '20', '5', NULL, 0, NULL, '2022-01-10 08:25:41', '2022-01-10 08:25:41', 1),
(60, 'Lunge (Right)', 'exercise_1617101156.gif', '3', 'https://www.youtube.com/watch?v=wrwwXE_x-pQ', 'Lowwer Body Exercise', '50', '5', NULL, 0, NULL, '2022-01-10 08:25:41', '2022-01-10 08:25:41', 1),
(61, 'Side Plank (Left)', 'exercise_1617101224.gif', '3', 'https://www.youtube.com/watch?v=XeN4pEZZJNI', 'Total Body Exercise', '45', '5', NULL, 0, NULL, '2022-01-10 08:25:41', '2022-01-10 08:25:41', 1),
(62, 'Side Plank (Right)', 'exercise_1617101377.gif', '3', 'https://www.youtube.com/watch?v=x4WhdDx2QSg', 'Total Body Exercise', '55', '4', NULL, 0, NULL, '2022-01-10 08:25:41', '2022-01-10 08:25:41', 1),
(63, 'Half Wall Sit', 'exercise_1617101487.gif', '2', 'https://www.youtube.com/watch?v=y-wV4Venusw', 'Lowwer Body Exercise', '60', '5', NULL, 0, NULL, '2022-01-10 08:25:41', '2022-01-10 08:25:41', 1),
(64, 'Standing Hip Circle', 'exercise_1617101597.gif', '3', 'https://www.youtube.com/watch?v=yFi1FDOFXq0', 'Lowwer Body Exercise', '50', '5', NULL, 0, NULL, '2022-01-10 08:25:41', '2022-01-10 08:25:41', 1),
(65, 'High Knee Walking In Place', 'exercise_1617101726.gif', '3', 'https://www.youtube.com/watch?v=HJP4dj-uLIY', 'Lowwer Body Exercise', '20', '4', NULL, 0, NULL, '2022-01-10 08:25:41', '2022-01-10 08:25:41', 1),
(66, 'Flutter Kick Squat', 'exercise_1617101763.gif', '2', 'https://www.youtube.com/watch?v=8zJh1tGtldU', 'Total Body Exercise', '60', '15', NULL, 0, NULL, '2022-01-10 08:25:41', '2022-01-10 08:25:41', 1),
(67, 'High Knees Running in Place', 'exercise_1617101927.gif', '10', 'https://www.youtube.com/watch?v=QPfOZ0e30xg', 'Lowwer Body Exercise', '50', '5', NULL, 0, NULL, '2022-01-10 08:25:41', '2022-01-10 08:25:41', 1),
(68, 'Side Leg Raise (Left)', 'exercise_1617101935.gif', '3', 'https://www.youtube.com/watch?v=izV5th7AQHM', 'Lowwer Body Exercise', '55', '4', NULL, 0, NULL, '2022-01-10 08:25:41', '2022-01-10 08:25:41', 1),
(69, 'Side Leg Raise (Right)', 'exercise_1617102009.gif', '4', 'https://www.youtube.com/watch?v=izV5th7AQHM', 'Lowwer Body Exercise', '30', '5', NULL, 0, NULL, '2022-01-10 08:25:41', '2022-01-10 08:25:41', 1),
(70, 'Squat Thrust', 'exercise_1617102032.gif', '2', 'https://www.youtube.com/watch?v=F1kVWDpH6co', 'Total Body Exercise', '40', '5', NULL, 0, NULL, '2022-01-10 08:25:41', '2022-01-10 08:25:41', 1),
(71, 'test', 'exercises/lNWgqhltPrAtErgQ4w0y7EHSOGun4VlWijTok3Qp.gif', '3', 'https://www.youtube.com/watch?v=NMSOpenaNRM', 'lower body exercises', '22', '60', NULL, 0, NULL, '2023-01-08 10:44:16', '2023-01-08 10:48:10', 2);

-- --------------------------------------------------------

--
-- Table structure for table `exercise_categories`
--

CREATE TABLE `exercise_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_icon` varchar(255) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exercise_categories`
--

INSERT INTO `exercise_categories` (`id`, `cat_icon`, `cat_name`, `level`, `description`, `is_deleted`, `created_at`, `updated_at`) VALUES
(56, 'category_1640669420.png', 'Beginner', 'Beginner', ' This is a beginner friendly version of the workout. We have replaced the harder exercises with alternatives that should be easier to perform.', 0, NULL, NULL),
(57, 'category_1640669407.png', 'Classic', 'Classic', ' Scientifically proven to improve health and fitness.', 0, NULL, NULL),
(58, 'category_1628664741.png', 'Abs', 'Abs', ' Want washboard abs? This is the workout for you. A short workout that targets every part of your abs.', 0, NULL, NULL),
(59, 'category_1628664711.png', 'Sweat', 'Sweat', ' High intensity workout that will get your heart rate up and make you sweat. Workout less but lose more!', 0, NULL, NULL),
(60, 'category_1640669391.png', 'Tabata', 'Tabata', ' A tabata inspired workout that includes a warmup and cooldown. Although short, this workout is intense. Make sure you are physically fit before attempting.', 0, NULL, NULL),
(61, 'category_1640669379.png', 'Complete', 'Complete', ' This is classic workout, but done 3 times in a row. Doing this complete workout will help you hit the doctor recommended 20 minute of exercise a day for better health', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `exercise_package`
--

CREATE TABLE `exercise_package` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exercise_id` bigint(20) DEFAULT NULL,
  `package_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exercise_package`
--

INSERT INTO `exercise_package` (`id`, `exercise_id`, `package_id`, `created_at`, `updated_at`) VALUES
(1, 7, 25, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `exercise_packages`
--

CREATE TABLE `exercise_packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exercise_id` int(11) DEFAULT NULL,
  `package_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exercise_sets`
--

CREATE TABLE `exercise_sets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `exercise_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exercise_sets`
--

INSERT INTO `exercise_sets` (`id`, `category_id`, `exercise_id`, `created_at`, `updated_at`) VALUES
(20, 41, 29, '2022-11-22 13:03:19', '2022-11-22 13:03:19');

-- --------------------------------------------------------

--
-- Table structure for table `exercise_steps`
--

CREATE TABLE `exercise_steps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exercise_id` int(11) DEFAULT NULL,
  `step` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exercise_steps`
--

INSERT INTO `exercise_steps` (`id`, `exercise_id`, `step`, `created_at`, `updated_at`) VALUES
(1, 6, 'Natus officia proide', '2022-11-10 21:39:30', '2022-11-10 21:39:30'),
(2, 6, 'Tenetur id atque exp', '2022-11-10 21:39:35', '2022-11-10 21:39:35'),
(3, 6, 'Rerum fuga Aliquip', '2022-11-10 21:40:11', '2022-11-10 21:40:11'),
(4, 6, 'Veniam quibusdam se', '2022-11-10 21:40:16', '2022-11-10 21:40:16'),
(5, 6, 'Temporibus quisquam000000000000', '2022-11-10 21:40:20', '2022-11-10 23:17:40'),
(6, 5, 'Culpa qui cum deleni', '2022-11-10 21:40:27', '2022-11-10 21:40:27'),
(7, 4, 'Qui fuga Alias quia', '2022-11-10 21:40:36', '2022-11-10 21:40:36'),
(8, 4, 'Eius facilis molesti', '2022-11-10 21:40:40', '2022-11-14 11:47:36'),
(9, 3, 'In repudiandae nobis', '2022-11-10 21:40:48', '2022-11-10 21:40:48'),
(10, 2, 'Et itaque fugiat do', '2022-11-10 21:40:57', '2022-11-10 21:40:57'),
(11, 2, 'In alias dolorum per', '2022-11-10 21:41:02', '2022-11-10 21:41:02'),
(12, 2, 'Dolore consequatur', '2022-11-10 21:41:06', '2022-11-10 21:41:06'),
(13, 1, 'Numquam beatae imped', '2022-11-10 21:41:15', '2022-11-10 21:41:15'),
(14, 1, 'Dolor labore reicien', '2022-11-10 21:41:19', '2022-11-10 21:41:19'),
(16, 15, 'Labore aliquip id vo', '2022-11-13 08:58:14', '2022-11-13 08:58:14'),
(17, 15, 'Minus vel magni labo', '2022-11-13 08:58:19', '2022-11-13 08:58:19'),
(20, 13, 'Nulla ad quis sed la', '2022-11-13 08:58:42', '2022-11-13 08:58:42'),
(21, 13, 'Natus et ut laudanti', '2022-11-13 08:58:50', '2022-11-13 08:58:50'),
(22, 13, 'aaaaaaaaaaaaaaaaaaaaaaaaaa', '2022-11-20 16:40:03', '2022-11-20 16:40:03'),
(23, 38, 'Dolor ipsa inventor', '2022-11-21 12:57:16', '2022-11-21 12:57:16'),
(24, 38, 'Voluptates beatae ve', '2022-11-21 12:57:20', '2022-11-21 12:57:20'),
(25, 38, 'Molestiae quo ullamc', '2022-11-21 12:57:24', '2022-11-21 12:57:24'),
(26, 38, 'Id ratione et corrup', '2022-11-21 12:57:28', '2022-11-21 12:57:28'),
(27, 37, 'Laborum eum sit aut', '2022-11-21 12:57:35', '2022-11-21 12:57:35'),
(28, 37, 'Magna dolorem qui er', '2022-11-21 12:57:39', '2022-11-21 12:57:39'),
(29, 37, 'Aut neque quae molli', '2022-11-21 12:57:43', '2022-11-21 12:57:43'),
(30, 36, 'Porro ab vitae ea vi', '2022-11-21 12:57:50', '2022-11-21 12:57:50'),
(31, 35, 'Vel aut irure volupt', '2022-11-21 12:57:57', '2022-11-21 12:57:57'),
(32, 35, 'Ut laborum cupiditat', '2022-11-21 12:58:01', '2022-11-21 12:58:01'),
(33, 34, 'Deserunt aliquid sed', '2022-11-21 12:58:11', '2022-11-21 12:58:11'),
(34, 33, 'Perspiciatis magni', '2022-11-21 12:58:19', '2022-11-21 12:58:19'),
(35, 32, 'Sequi nostrum irure', '2022-11-21 12:58:26', '2022-11-21 12:58:26'),
(36, 31, 'Ratione anim ad labo', '2022-11-21 12:58:36', '2022-11-21 12:58:36'),
(37, 30, 'Adipisicing eum magn', '2022-11-21 12:58:44', '2022-11-21 12:58:44'),
(38, 30, 'Delectus magnam dol', '2022-11-21 12:58:48', '2022-11-21 12:58:48'),
(39, 29, 'Dolorum dolorem expl', '2022-11-21 12:58:55', '2022-11-21 12:58:55'),
(40, 28, 'At minima nulla aliq', '2022-11-21 12:59:04', '2022-11-21 12:59:04'),
(41, 49, 'Lay your stomach on the ball. Your legs will hang off the back of the ball. Put your hands on the ground in front of the ball', '2021-03-31 02:22:00', '2021-03-31 02:22:00'),
(42, 49, 'Using your lower back and glutes, pull your legs off the ground as high as they’ll go while keeping your core engaged and in contact with the ball', '2021-03-31 02:22:00', '2021-03-31 02:22:00'),
(43, 49, 'Slowly lower back down to the starting position.', '2021-03-31 02:22:00', '2021-03-31 02:22:00'),
(44, 49, 'Complete 3 sets of 10 reps.', '2021-03-31 02:22:00', '2021-03-31 02:22:00'),
(45, 48, 'Lay on the ground with your back flat to the ground and your arms and legs pointing straight up', '2021-03-31 02:23:12', '2021-03-31 02:23:12'),
(46, 48, 'At the same time, slowly lower your legs towards the ground. Make sure to keep your back flat to the ground—this is super important to maintain good form', '2021-03-31 02:23:12', '2021-03-31 02:23:12'),
(47, 48, 'As soon as you feel your back start to want to come off of the ground, hold that position. Your legs should be slightly off the ground (see photo). If you can’t get that close to the ground, keep practicing and you’ll get there with time', '2021-03-31 02:23:12', '2021-03-31 02:23:12'),
(48, 48, 'Raise your arms above your head so that you end up in a banana-like position.', '2021-03-31 02:23:12', '2021-03-31 02:23:12'),
(49, 46, 'Sit down on the ground with legs straight out.', '2021-03-31 02:24:39', '2021-03-31 02:24:39'),
(50, 46, 'Lift your legs up so that they are at a 45 degree angle with the floor.', '2021-03-31 02:24:39', '2021-03-31 02:24:39'),
(51, 46, 'Lean your torso back till it also is at a 45 degree angle.', '2021-03-31 02:24:39', '2021-03-31 02:24:39'),
(52, 46, 'Hold your arms out in front of you so they are parallel with your legs.', '2021-03-31 02:24:39', '2021-03-31 02:24:39'),
(53, 46, 'Hold this position for the desired time.', '2021-03-31 02:24:39', '2021-03-31 02:24:39'),
(57, 45, 'Get down on the floor on your hands and knees. Extend your legs out behind you, balancing on the balls and toes. Place your hands directly under your shoulders with your fingers facing forward and slightly outward. Keep your core engaged by squeezing your stomach muscles. Your body should be in a straight line from your crown to your heels.', '2021-03-31 02:27:46', '2021-03-31 02:27:46'),
(58, 45, ' Lift one foot and begin bending the knee as you pull it up between the front of your body and the floor. Bring the knee forward in one smooth, controlled motion. Don’t let either of your knees sag or come into contact with the floor. Once you’ve raised your knee as far as you can, contract and hold your abs briefly but forcefully.', '2021-03-31 02:27:46', '2021-03-31 02:27:46'),
(59, 45, 'Relax your midsection and push your knee back toward your other foot slowly. Straight your leg and set your foot back on the ground behind you. Then, bring the other knee forward, moving fluidly and squeezing your abs.', '2021-03-31 02:27:46', '2021-03-31 02:27:46'),
(60, 45, 'Return your leg to the floor behind you and begin pulling the opposite knee up once more. Repeat this motion until you get comfortable with it. That’s it! Do as many mountain climbers as you can before you tire out, and try to increase the number over time. This exercise makes a welcome addition to any strength and conditioning workout', '2021-03-31 02:27:46', '2021-03-31 02:27:46'),
(61, 44, 'Slide your right hand down your right leg, palm extended toward your toes.', '2021-03-31 02:29:19', '2021-03-31 02:29:19'),
(62, 44, 'Grab your right foot with your right hand, if you are capable. If not, stretch your hand as far down your leg as it will', '2021-03-31 02:29:19', '2021-03-31 02:29:19'),
(63, 44, 'Reach your left hand over your head and down toward your right foot.', '2021-03-31 02:29:19', '2021-03-31 02:29:19'),
(64, 44, 'Hold this position for 4-5 deep breaths before slowly letting your left arm go, bringing up your torso', '2021-03-31 02:29:19', '2021-03-31 02:29:19'),
(65, 44, 'Repeat with the other leg.', '2021-03-31 02:29:19', '2021-03-31 02:29:19'),
(66, 43, 'Begin by standing with your feet together and your arms by your sides. Drop your shoulders and fix your gaze straight in front of you. Move your weight onto your left foot.', '2021-03-31 02:30:51', '2021-03-31 02:30:51'),
(67, 43, 'Bend your right knee and kick your right heel up towards your right glute muscle. Use your right hand to grab and support your right ankle. Allow your left hand to remain by your side, or use it to help you balance by placing it squarely on your left hip.', '2021-03-31 02:30:51', '2021-03-31 02:30:51'),
(68, 43, 'Move your right hip forward and your right knee back behind you. Try to keep your right knee squarely under your right hip while still keeping your right and left hips facing forward', '2021-03-31 02:30:51', '2021-03-31 02:30:51'),
(69, 42, 'Stand tall and place your feet and legs together. Relax your shoulder away from your ears and gaze forward.', '2021-03-31 02:32:51', '2021-03-31 02:32:51'),
(70, 42, 'Reach both arms overhead and interlace your fingers while leaving your index fingers extended and pointed toward the ceiling; this grip is known as a steeple grip in yoga.', '2021-03-31 02:32:51', '2021-03-31 02:32:51'),
(71, 42, 'Align your biceps with your ears.', '2021-03-31 02:32:51', '2021-03-31 02:32:51'),
(72, 42, 'Squeeze your inner thighs and activate your core for balance.', '2021-03-31 02:32:51', '2021-03-31 02:32:51'),
(73, 42, 'Take a breath in and gently bend your body to the right on your exhale. Lengthen from your left hips through your ribs. Pull your left arm over to the right side of the room.', '2021-03-31 02:32:51', '2021-03-31 02:32:51'),
(74, 41, ' Grasp a wall of the pool, a lane marker, or another stationary object that allows you to extend your body in the water behind it. Hold your arms out straight from the wall, with the rest of your body as horizontal as possible in the water.', '2021-03-31 02:34:07', '2021-03-31 02:34:07'),
(75, 41, 'Push one leg down in the water. Flex the hip of one leg slightly to push the leg down', '2021-03-31 02:34:07', '2021-03-31 02:34:07'),
(76, 41, 'Repeat with the opposite leg. Let the first leg float up in the water while you repeat the same kick with the opposite leg', '2021-03-31 02:34:07', '2021-03-31 02:34:07'),
(77, 41, 'Continue alternating legs to kick. Keep kicking one leg down while the other floats up, and increasing the speed until you are alternating quickly.', '2021-03-31 02:34:07', '2021-03-31 02:34:07'),
(78, 40, 'Start by swinging both arms behind you then bring them forward into a circular motion. Try to make them as big as you can and do so in a safe range of motion.', '2021-03-31 02:35:06', '2021-03-31 02:35:06'),
(79, 40, 'After completing forward circles be sure to perform them backward as well', '2021-03-31 02:35:06', '2021-03-31 02:35:06'),
(80, 40, '', '2021-03-31 02:35:06', '2021-03-31 02:35:06'),
(84, 70, 'Start by getting into a raised plank position, but resting on your hands instead of your forearms.', '2021-03-31 02:37:09', '2021-03-31 02:37:09'),
(85, 70, 'Make sure your body is in a straight line (Head, shoulders, hips, knees and toes), your shoulders are pushed', '2021-03-31 02:37:09', '2021-03-31 02:37:09'),
(86, 70, 'Breathe in, then breathe out as you jump your feet forwards so they land as close to your hands as you can get', '2021-03-31 02:37:09', '2021-03-31 02:37:09'),
(87, 70, 'Breathe in as you jump your feet back out to the start position, holding your core tight and making sure your', '2021-03-31 02:37:09', '2021-03-31 02:37:09'),
(88, 69, 'Lie on your right side and position the side of your right foot as well as your bottom elbow on the ground.', '2021-03-31 02:38:54', '2021-03-31 02:38:54'),
(89, 69, 'Slowly lift your hips so that your shoulders, ankles, and hips are in line. It is your starting position.', '2021-03-31 02:38:54', '2021-03-31 02:38:54'),
(90, 69, 'Now brace your core and keep your torso stable. Lift your top leg and avoid bending your knee', '2021-03-31 02:38:54', '2021-03-31 02:38:54'),
(91, 69, 'Return to the initial position', '2021-03-31 02:38:54', '2021-03-31 02:38:54'),
(92, 69, 'Do the desired number of sets and reps on each side.', '2021-03-31 02:38:54', '2021-03-31 02:38:54'),
(93, 68, 'From Makarasana (Crocodile Pose), inhale and turn towards the left side balancing the body on the left elbow supporting', '2021-03-31 02:40:13', '2021-03-31 02:40:13'),
(94, 68, 'Inhale and raise the right leg up holding the right toe with the right hand and stretch the leg and bring it towards you', '2021-03-31 02:40:13', '2021-03-31 02:40:13'),
(95, 68, 'Inhale to loosen the grip at the toes with your hands, exhale to stretch further engaging the core muscles', '2021-03-31 02:40:13', '2021-03-31 02:40:13'),
(96, 68, 'Remain in this posture for about 6 breaths, controlling the breathing process while maintaining the body in balance.', '2021-03-31 02:40:13', '2021-03-31 02:40:13'),
(97, 68, 'Release and relax', '2021-03-31 02:40:13', '2021-03-31 02:40:13'),
(98, 67, 'Stand on a flat surface & Begin jogging, lifting the knees high enough for your comfort level.', '2021-03-31 02:41:23', '2021-03-31 02:41:23'),
(99, 67, 'Then lift your knees to hip level but keep the core tight to support your back.', '2021-03-31 02:41:23', '2021-03-31 02:41:23'),
(100, 67, 'In advanced version, hold your hands straight at hip level and try to touch the knees to your hands.', '2021-03-31 02:41:23', '2021-03-31 02:41:23'),
(101, 67, 'Make sure to bring the knees towards your hands instead of reaching the hands to the knees!', '2021-03-31 02:41:23', '2021-03-31 02:41:23'),
(102, 66, 'Lie down on your back and place your hands under your glutes', '2021-03-31 02:42:33', '2021-03-31 02:42:33'),
(103, 66, 'Keep your legs straight and raise your heels off the ground so they are roughly three inches off the ground.', '2021-03-31 02:42:33', '2021-03-31 02:42:33'),
(104, 66, 'Next, simply raise your right foot up several inches and then as you lower it down, raise your left foot up.', '2021-03-31 02:42:33', '2021-03-31 02:42:33'),
(105, 66, 'Alternate back and forth in a \"fluttering\" motion.', '2021-03-31 02:42:33', '2021-03-31 02:42:33'),
(106, 65, 'Stand tall with arms at your side and feet shoulder-width apart.', '2021-03-31 02:43:31', '2021-03-31 02:43:31'),
(107, 65, 'Begin exercise by raising your left knee up toward your chest as high as you can. Step forward as you lower leg', '2021-03-31 02:43:31', '2021-03-31 02:43:31'),
(108, 65, 'Repeat with right knee, alternating back and forth while walking.', '2021-03-31 02:43:31', '2021-03-31 02:43:31'),
(109, 64, 'Find your balance on one leg by engaging your core and keeping a soft bend in the knee of the weighted leg.', '2021-03-31 02:45:05', '2021-03-31 02:45:05'),
(110, 64, 'Once balanced raise the non-weight knee to 90 degrees.', '2021-03-31 02:45:05', '2021-03-31 02:45:05'),
(111, 64, 'Then keeping your foot pointed at the ground rotate your hip open so your knee points to the side.', '2021-03-31 02:45:05', '2021-03-31 02:45:05'),
(112, 64, 'Finally rotate your hip so your knee points down to the ground and your foot to the back.', '2021-03-31 02:45:05', '2021-03-31 02:45:05'),
(113, 64, 'Bring your knee back up to 90 and follow the same steps.', '2021-03-31 02:45:05', '2021-03-31 02:45:05'),
(114, 64, 'Repeat 5 times then reverse the steps, working hip rotation in the opposite direction.', '2021-03-31 02:45:05', '2021-03-31 02:45:05'),
(115, 63, ' Measure the area where the half (knee) wall will be located', '2021-03-31 02:46:24', '2021-03-31 02:46:24'),
(116, 63, 'Use the framing gun to nail the studs to the top and bottom plates. Space the studs 16\" apart', '2021-03-31 02:46:24', '2021-03-31 02:46:24'),
(117, 63, 'Using a utility knife, cut the 1/2\" drywall to fit the half wall. Secure the drywall to the studs with the screw', '2021-03-31 02:46:24', '2021-03-31 02:46:24'),
(118, 62, 'Lie on your side on an exercise ma', '2021-03-31 02:48:04', '2021-03-31 02:48:04'),
(119, 62, 'Fully extend your legs with one resting on top of the other', '2021-03-31 02:48:04', '2021-03-31 02:48:04'),
(120, 62, 'Fully extend the top arm down the side of your body', '2021-03-31 02:48:04', '2021-03-31 02:48:04'),
(121, 62, 'Bend the arm at floor level to 90 degrees. Your upper arm should be parallel to your body,', '2021-03-31 02:48:04', '2021-03-31 02:48:04'),
(122, 62, '', '2021-03-31 02:48:04', '2021-03-31 02:48:04'),
(123, 61, 'Lie on your left side propped up on your left elbow and forearm, shoulders stacked over your elbow, legs stacked on top.', '2021-03-31 02:49:43', '2021-03-31 02:49:43'),
(124, 61, 'Raise your hips so that your body forms a straight line from head to heels. This is the starting position', '2021-03-31 02:49:43', '2021-03-31 02:49:43'),
(125, 61, 'Keeping your core braced and your glutes engaged, slowly lower your left hip, tapping it gently on the floor.', '2021-03-31 02:49:43', '2021-03-31 02:49:43'),
(126, 61, 'Reverse the move, returning to side plank position.', '2021-03-31 02:49:43', '2021-03-31 02:49:43'),
(127, 61, 'Repeat for reps, then switch sides, performing equal reps on each.', '2021-03-31 02:49:43', '2021-03-31 02:49:43'),
(128, 60, 'Start by performing a basic lunge with your right leg lunging forward.', '2021-03-31 02:51:15', '2021-03-31 02:51:15'),
(129, 60, 'After your right leg is lunged forward in front and you’re feeling stable, use your core to twist your torso', '2021-03-31 02:51:15', '2021-03-31 02:51:15'),
(130, 60, 'Twist your torso back to the center. Step back to standing with your right leg.', '2021-03-31 02:51:15', '2021-03-31 02:51:15'),
(131, 60, 'Switch legs and lunge forward with your left leg, and, once stabilized, twist to the left this time', '2021-03-31 02:51:15', '2021-03-31 02:51:15'),
(132, 27, 'Stand straight with your feet shoulder-width apart, shoulders relaxed, and palms together', '2021-03-31 02:53:01', '2021-03-31 02:53:01'),
(133, 27, 'Lift your right leg off the floor and place it wide apart, as shown in the image', '2021-03-31 02:53:01', '2021-03-31 02:53:01'),
(134, 27, 'Flex your right knee, keep your spine straight, and lower your body to the right', '2021-03-31 02:53:01', '2021-03-31 02:53:01'),
(135, 27, 'Get back to the starting position', '2021-03-31 02:53:01', '2021-03-31 02:53:01'),
(136, 27, 'Flex your left knee, keep your spine straight, and lower your body to the left. Make sure your right leg', '2021-03-31 02:53:01', '2021-03-31 02:53:01'),
(137, 26, 'Step up with the right foot, pressing through the heel to straighten your right leg.', '2021-03-31 02:54:41', '2021-03-31 02:54:41'),
(138, 26, 'Bring the left foot to meet your right foot on top of the step.', '2021-03-31 02:54:41', '2021-03-31 02:54:41'),
(139, 26, 'Bend your right knee and step down with the left foot.', '2021-03-31 02:54:41', '2021-03-31 02:54:41'),
(140, 26, 'Bring the right foot down to meet the left foot on the ground.', '2021-03-31 02:54:41', '2021-03-31 02:54:41'),
(141, 26, 'Repeat this for a specific number of repetitions, then lead with the left foot and repeat the same number of repetitions. A beginner may opt to do this for a set amount of time (one minute, for example), instead of a set number of reps.', '2021-03-31 02:54:41', '2021-03-31 02:54:41'),
(142, 25, 'Start on your hands and knees. If you are new to yoga or not especially flexible, prepare yourself', '2021-03-31 02:55:47', '2021-03-31 02:55:47'),
(143, 25, 'Push your seat to your heels. Keeping your hands in the same place, push your seat back towards', '2021-03-31 02:55:47', '2021-03-31 02:55:47'),
(144, 25, 'Get into plank pose. From child’s pose, inhale and hinge forward at your hips back onto your hands', '2021-03-31 02:55:47', '2021-03-31 02:55:47'),
(145, 25, 'Roll your body to the right. Exhale and roll your body to the right while lifting your right arm', '2021-03-31 02:55:47', '2021-03-31 02:55:47'),
(146, 24, 'Lie down on the floor on your back and bend your knees, placing your hands behind your head or across your chest', '2021-03-31 02:56:46', '2021-03-31 02:56:46'),
(147, 24, 'Pull your belly button towards your spine in preparation for the movement.', '2021-03-31 02:56:46', '2021-03-31 02:56:46'),
(148, 24, 'Slowly contract your abdominals, bringing your shoulder blades about 1 or 2 inches off the floor.', '2021-03-31 02:56:46', '2021-03-31 02:56:46'),
(149, 23, 'Lie on your side on an exercise mat.', '2021-03-31 02:57:51', '2021-03-31 02:57:51'),
(150, 23, 'Fully extend your legs with one resting on top of the other.', '2021-03-31 02:57:52', '2021-03-31 02:57:52'),
(151, 23, 'Fully extend the top arm down the side of your body.', '2021-03-31 02:57:52', '2021-03-31 02:57:52'),
(152, 22, 'Lie on your side on an exercise mat.', '2021-03-31 02:58:55', '2021-03-31 02:58:55'),
(153, 22, 'Fully extend your legs with one resting on top of the other.', '2021-03-31 02:58:55', '2021-03-31 02:58:55'),
(154, 22, 'Fully extend the top arm down the side of your body.', '2021-03-31 02:58:55', '2021-03-31 02:58:55'),
(155, 21, 'Place the head of the bench close to the cable pulley.', '2021-03-31 03:01:19', '2021-03-31 03:01:19'),
(156, 21, 'Attach a straight bar to the lowest notch on the cable system.', '2021-03-31 03:01:19', '2021-03-31 03:01:19'),
(157, 21, 'Lie on the bench so that your head is close to the bar', '2021-03-31 03:01:19', '2021-03-31 03:01:19'),
(158, 21, 'Grab the bar with both hands positioned about shoulder-width apart.', '2021-03-31 03:01:19', '2021-03-31 03:01:19'),
(159, 21, 'Keeping your elbows pointed toward the ceiling and close to your sides, extend your forearms by flexing your triceps.', '2021-03-31 03:01:19', '2021-03-31 03:01:19'),
(160, 21, 'Lower the bar to your forehead or behind your head until you feel a stretch in the triceps, and repeat.', '2021-03-31 03:01:19', '2021-03-31 03:01:19'),
(161, 20, 'Start on your hands and knees. If you are new to yoga or not especially flexible, prepare yourself ', '2021-03-31 03:02:50', '2021-03-31 03:02:50'),
(162, 20, 'Push your seat to your heels. Keeping your hands in the same place, push your seat back towards', '2021-03-31 03:02:50', '2021-03-31 03:02:50'),
(163, 20, 'Get into plank pose. From child’s pose, inhale and hinge forward at your hips back onto your hands', '2021-03-31 03:02:50', '2021-03-31 03:02:50'),
(164, 20, 'Roll your body to the right. Exhale and roll your body to the right while lifting your right arm', '2021-03-31 03:02:50', '2021-03-31 03:02:50'),
(165, 19, 'Sit on the edge of a sturdy chair or bench', '2021-03-31 03:04:42', '2021-03-31 03:04:42'),
(166, 19, 'Scoot your buttocks off the chair, supporting yourself with your hands. Driving your weight into the palms of your hands and the soles of your', '2021-03-31 03:04:42', '2021-03-31 03:04:42'),
(167, 19, 'Lower yourself by bending your elbows back until they reach a 90-degree angle. Engage your triceps as you dip down so that your lowering motion', '2021-03-31 03:04:42', '2021-03-31 03:04:42'),
(168, 19, 'Straighten your elbows fully to lift yourself back up. Pause for 1-2 seconds at the bottom of your dip to make sure your motions are in-control.', '2021-03-31 03:04:42', '2021-03-31 03:04:42'),
(169, 19, 'Repeat 5-7 times. If you are a beginner, start by building your strength rather than going all-out with tricep dips', '2021-03-31 03:04:42', '2021-03-31 03:04:42'),
(170, 18, 'Assume a standard push-up position. Next, get down on your knees instead of placing your weight on your feet.', '2021-03-31 03:05:43', '2021-03-31 03:05:43'),
(171, 18, 'Your body now should look like a check mark, with your feet crossed behind you, knees to head forming a straight', '2021-03-31 03:05:43', '2021-03-31 03:05:43'),
(172, 17, 'Start out on the mat in a push-up positions, hands and feet on the floor with your body off the mat', '2021-03-31 03:06:46', '2021-03-31 03:06:46'),
(173, 17, 'Perform a push-up by lowering your body to the mat and extending your self back up off the mat', '2021-03-31 03:06:46', '2021-03-31 03:06:46'),
(174, 17, 'Now rotate your body to the right by lifting your right arm off the mat and pointing it at the ceiling', '2021-03-31 03:06:46', '2021-03-31 03:06:46'),
(175, 17, 'Return your right hand to the mat, back into push-up position and then perform a push-up', '2021-03-31 03:06:46', '2021-03-31 03:06:46'),
(176, 16, 'Get down on the ground and place your palms flat on the floor at chest level', '2021-03-31 03:08:15', '2021-03-31 03:08:15'),
(177, 16, 'Make your body into a plank so that your toes and hands are only touching the ground (push-up position)', '2021-03-31 03:08:15', '2021-03-31 03:08:15'),
(178, 16, 'Bend at the elbows and lower your chest all the way to the ground', '2021-03-31 03:08:15', '2021-03-31 03:08:15'),
(179, 16, 'Lift both hands off the floor, place them back on the ground, and then push yourself back up', '2021-03-31 03:08:15', '2021-03-31 03:08:15'),
(180, 16, 'This completes one repetition', '2021-03-31 03:08:15', '2021-03-31 03:08:15'),
(181, 15, 'Learning Push Up Basics. Assume a face-down prone position on the floor. Keep your feet together.', '2021-03-31 03:09:20', '2021-03-31 03:09:20'),
(182, 15, 'Doing a Standard Push Up. Get down on the ground', '2021-03-31 03:09:20', '2021-03-31 03:09:20'),
(183, 15, ' Trying Advanced Push Ups. Do clap push ups.', '2021-03-31 03:09:20', '2021-03-31 03:09:20'),
(184, 15, 'Making Push Ups Easier. Push up from your knees.', '2021-03-31 03:09:20', '2021-03-31 03:09:20'),
(185, 14, 'Bending your legs, push your butt back to a 45-degree angle', '2021-03-31 03:10:23', '2021-03-31 03:10:23'),
(186, 14, 'Extend your arms straight in front of you.\r\n', '2021-03-31 03:10:23', '2021-03-31 03:10:23'),
(187, 14, 'Pause for a second, then slowly raise your body back up by pushing through your heels.', '2021-03-31 03:10:23', '2021-03-31 03:10:23'),
(188, 13, 'Stand up straight, hold your arms at your sides, and stand with your feet shoulder-width apart.', '2021-03-31 03:11:26', '2021-03-31 03:11:26'),
(189, 13, 'Jump and extend your arms overhead. With your feet shoulder width apart, slightly bend your knees so you can hop.', '2021-03-31 03:11:26', '2021-03-31 03:11:26'),
(190, 13, 'Extend your legs. As you jump, open your legs wider than shoulder width as you lift your arms overhead.', '2021-03-31 03:11:26', '2021-03-31 03:11:26'),
(191, 13, 'Land in the starting position. After jumping in the air, gently land in the first position with arms at your sides', '2021-03-31 03:11:26', '2021-03-31 03:11:26'),
(192, 12, 'Stand with your back pressing against a wall.', '2021-03-31 03:12:27', '2021-03-31 03:12:27'),
(193, 12, 'Slide downward into a squat position by moving your feet forward until your knees make a 90-degree angle', '2021-03-31 03:12:27', '2021-03-31 03:12:27'),
(194, 12, 'Hold this move as long as you can.', '2021-03-31 03:12:27', '2021-03-31 03:12:27'),
(195, 11, 'Get Into Position. With the barbell sitting at around shoulder height on the rack pins', '2021-03-31 03:13:44', '2021-03-31 03:13:44'),
(196, 11, 'Brace Your Body', '2021-03-31 03:13:44', '2021-03-31 03:13:44'),
(197, 11, 'Take Your Stance', '2021-03-31 03:13:44', '2021-03-31 03:13:44'),
(198, 11, 'Squat Down', '2021-03-31 03:13:44', '2021-03-31 03:13:44'),
(199, 11, 'Rise', '2021-03-31 03:13:44', '2021-03-31 03:13:44'),
(200, 10, 'Stand upright with your legs together, arms at your sides.', '2021-03-31 03:14:59', '2021-03-31 03:14:59'),
(201, 10, 'Bend your knees slightly, and jump into the air.', '2021-03-31 03:14:59', '2021-03-31 03:14:59'),
(202, 10, 'As you jump, spread your legs to be about shoulder-width apart. Stretch your arms out and over your head.', '2021-03-31 03:14:59', '2021-03-31 03:14:59'),
(203, 10, 'Jump back to starting position.', '2021-03-31 03:14:59', '2021-03-31 03:14:59'),
(204, 10, '', '2021-03-31 03:14:59', '2021-03-31 03:14:59'),
(205, 9, 'Lie flat on the floor with your lower back pressed to the ground and knees bent. Your feet should be on the floor and your hands are behind your head.', '2021-03-31 03:17:30', '2021-03-31 03:17:30'),
(206, 9, 'Contract your core muscles, drawing in your abdomen to stabilize your spine.', '2021-03-31 03:17:30', '2021-03-31 03:17:30'),
(207, 9, 'With your hands gently holding your head, pull your shoulder blades back and slowly raise your knees to about a 90-degree angle, lifting your feet from the floor.', '2021-03-31 03:17:30', '2021-03-31 03:17:30'),
(208, 9, 'Exhale and slowly, at first, go through a bicycle pedal motion, bringing one knee up towards your armpit while straightening the other leg, keeping both elevated higher than your hips.', '2021-03-31 03:17:30', '2021-03-31 03:17:30'),
(209, 9, 'Rotate your torso so you can touch your elbow to the opposite knee as it comes up.', '2021-03-31 03:17:30', '2021-03-31 03:17:30'),
(210, 9, 'Alternate to twist to the other side while drawing that knee towards your armpit and the other leg extended until your elbow touches the alternate knee.', '2021-03-31 03:17:30', '2021-03-31 03:17:30'),
(211, 9, 'Aim for 12 to 20 repetitions and three sets.\r\n', '2021-03-31 03:17:30', '2021-03-31 03:17:30'),
(212, 8, 'Stand on a flat surface & Begin jogging, lifting the knees high enough for your comfort level.', '2021-03-31 03:18:37', '2021-03-31 03:18:37'),
(213, 8, 'Then lift your knees to hip level but keep the core tight to support your back', '2021-03-31 03:18:37', '2021-03-31 03:18:37'),
(214, 8, 'In advanced version, hold your hands straight at hip level and try to touch the knees to your hands.', '2021-03-31 03:18:37', '2021-03-31 03:18:37'),
(215, 8, 'Make sure to bring the knees towards your hands instead of reaching the hands to the knees!', '2021-03-31 03:18:37', '2021-03-31 03:18:37'),
(216, 8, 'Repeat the above steps to further perform this exercise.', '2021-03-31 03:18:37', '2021-03-31 03:18:37'),
(217, 47, 'Start by assuming a pushup position and keep your hands at a shoulder-width Make sure that your shoulders, hips, and the ankles line up together. It is your initial position.', '2021-08-10 12:42:23', '2021-08-10 12:42:23'),
(218, 47, 'Brace your abs and raise the right leg off the floor until it is at your hip height. Pause for a second or two before lowering your leg to the original position.', '2021-08-10 12:42:23', '2021-08-10 12:42:23'),
(219, 47, 'Now lift your left leg and follow the same steps.', '2021-08-10 12:42:23', '2021-08-10 12:42:23'),
(220, 47, 'sd', '2021-08-10 12:42:23', '2021-08-10 12:42:23'),
(221, 39, 'Keep your weight on the balls of our feet and change sideways directions as needed.', '2021-08-16 11:15:22', '2021-08-16 11:15:22'),
(222, 56, 'Lie down on your back. Raise legs up so that they are perpendicular to the floor (legs should be as straight as possible). Hold arms straight out above your chest. This is the starting position.', '2022-11-10 20:53:39', '2022-11-10 20:53:39'),
(223, 56, ' Begin exercise by reaching for your toes by crunching your head and shoulders off the ground. Pause, then lower back down to starting position', '2022-11-10 20:53:39', '2022-11-10 20:53:39'),
(224, 56, 'asDFSACASDCSDC', '2022-11-10 20:53:39', '2022-11-10 20:53:39'),
(300, 5, 'step 1', '2021-03-12 22:29:30', '2021-03-12 22:29:30'),
(301, 5, 'step 2', '2021-03-12 22:29:30', '2021-03-12 22:29:30'),
(302, 5, 'step4', '2021-03-12 22:29:30', '2021-03-12 22:29:30'),
(303, 5, 'step5', '2021-03-12 22:29:30', '2021-03-12 22:29:30'),
(304, 6, 'Start in Adho Mukha Svanasana (Downward-Facing Dog). Exhale and step your right foot forward between your hands, aligning your knee over the heel. Keep your left leg strong and firm.', '2021-03-12 22:44:31', '2021-03-12 22:44:31'),
(305, 6, 'Inhale and raise your torso to upright. At the same time, sweep your arms wide to the sides and raise them overhead, palms facing.', '2021-03-12 22:44:31', '2021-03-12 22:44:31'),
(306, 6, 'Be careful not to over arch the lower back. Lengthen your tailbone toward the floor and reach back through your left heel. This will bring the shoulder blades deeper into the back and help support your chest. Look up toward your thumbs.', '2021-03-12 22:44:31', '2021-03-12 22:44:31'),
(307, 6, 'Be sure not to press the front ribs forward. Draw them down and into the torso. Lift the arms from the lower back ribs, reaching through your little fingers. Hold for 30 seconds to a minute.', '2021-03-12 22:44:31', '2021-03-12 22:44:31'),
(308, 6, 'Then exhale, release the torso to the right thigh, sweep your hands back onto the floor, and, with another exhale, step your right foot back and return to Down Dog. Hold for a few breaths and repeat with the left foot forward for the same length of time.', '2021-03-12 22:44:31', '2021-03-12 22:44:31'),
(309, 1, 'Start in Adho Mukha Svanasana (Downward-Facing Dog). Exhale and step your right foot forward between your hands, aligning your knee over the heel. Keep your left leg strong and firm.', '2021-03-16 00:40:33', '2021-03-16 00:40:33'),
(310, 1, 'Inhale and raise your torso to upright. At the same time, sweep your arms wide to the sides and raise them overhead, palms facing.', '2021-03-16 00:40:33', '2021-03-16 00:40:33'),
(311, 1, 'Be careful not to over arch the lower back. Lengthen your tailbone toward the floor and reach back through your left heel. This will bring the shoulder blades deeper into the back and help support your chest. Look up toward your thumbs.', '2021-03-16 00:40:33', '2021-03-16 00:40:33'),
(312, 1, 'Be sure not to press the front ribs forward. Draw them down and into the torso. Lift the arms from the lower back ribs, reaching through your little fingers. Hold for 30 seconds to a minute.', '2021-03-16 00:40:33', '2021-03-16 00:40:33'),
(313, 1, 'Then exhale, release the torso to the right thigh, sweep your hands back onto the floor, and, with another exhale, step your right foot back and return to Down Dog. Hold for a few breaths and repeat with the left foot forward for the same length of time.', '2021-03-16 00:40:33', '2021-03-16 00:40:33'),
(314, 57, 'Lay on the ground with your back flat to the ground and your arms and legs pointing straight up', '2021-03-31 02:13:01', '2021-03-31 02:13:01'),
(315, 57, ' At the same time, slowly lower your legs towards the ground. Make sure to keep your back flat to the ground—this is super important to maintain good form', '2021-03-31 02:13:01', '2021-03-31 02:13:01'),
(316, 57, 'As soon as you feel your back start to want to come off of the ground, hold that position. Your legs should be slightly off the ground (see photo). If you can’t get that close to the ground, keep practicing and you’ll get there with time.', '2021-03-31 02:13:01', '2021-03-31 02:13:01'),
(317, 57, 'Raise your arms above your head so that you end up in a banana-like position.', '2021-03-31 02:13:01', '2021-03-31 02:13:01'),
(318, 55, 'To start the motion of the classic bicycle kick, lift the knee of your non-dominant foot and push off the ground with your kicking foot. The higher you can lift your non-kicking foot the better, because this will help you get the momentum necessary to get your kicking foot up and over properly', '2021-03-31 02:15:31', '2021-03-31 02:15:31'),
(319, 55, 'As you raise your leg, throw your momentum backward, as if you’re trying to get away from the ball and flop back down on the ground. Be careful not to throw your head back too quickly, or to dip your body into a full-on flip. Stay focused on the kick and making contact with the ball, not falling back super-fast', '2021-03-31 02:15:31', '2021-03-31 02:15:31'),
(320, 54, 'Stand straight with your feet are shoulder-width apart and your feet are pointing outward.', '2021-03-31 02:17:15', '2021-03-31 02:17:15'),
(321, 54, 'Place the fingers of both your hands behind your head. Your elbows are pointing outwards to the sides of your body. Inhale deeply to contract your core muscles.', '2021-03-31 02:17:15', '2021-03-31 02:17:15'),
(322, 54, 'Now start exercising by raising your left knee upward to your chest height and simultaneously twist your torso to the left. Bring your right elbow towards the raised knee so that you feel the crunch. Keep exhaling during this movement and go back to the starting position.\r\n', '2021-03-31 02:17:15', '2021-03-31 02:17:15'),
(323, 54, 'Now repeat the same on the other side and keep switching the sides until you complete your repetitions', '2021-03-31 02:17:15', '2021-03-31 02:17:15'),
(324, 52, 'Begin in a squat position with a step in front of you and arms bent next to your side.', '2021-03-31 02:18:41', '2021-03-31 02:18:41'),
(325, 52, 'Jump up onto the step, swinging your arms to help. You should land in a squat position with both feet touching at the same time and keeping weight in your heels.', '2021-03-31 02:18:41', '2021-03-31 02:18:41'),
(326, 52, 'Step down and repeat.', '2021-03-31 02:18:41', '2021-03-31 02:18:41'),
(327, 51, 'Put Your Hands Together With Your Wrists Making 90 Degree Angles in Prayer Position\r\n', '2021-03-31 02:20:13', '2021-03-31 02:20:13'),
(328, 51, 'Extend Your Arms Outward With Your Hands Still Together', '2021-03-31 02:20:13', '2021-03-31 02:20:13'),
(329, 51, 'Flip Your Right Hand Over Your Left Hand So It Is Now on the Backside of Your Left Hand (palm of Right Hand Is Now Touching Backside of Left Hand)', '2021-03-31 02:20:13', '2021-03-31 02:20:13'),
(330, 51, 'Rotate Your Hands (keeping Them Together) 180 Degrees So That Your Palm on Your Left Hand Is Now Facing Left', '2021-03-31 02:20:13', '2021-03-31 02:20:13'),
(331, 71, 'go out side', '2023-01-08 10:49:49', '2023-01-08 10:49:49'),
(332, 71, 'run as fast as you can', '2023-01-08 10:50:15', '2023-01-08 10:50:15'),
(333, 71, 'go back home', '2023-01-08 10:50:41', '2023-01-08 10:50:41');

-- --------------------------------------------------------

--
-- Table structure for table `ex_categories`
--

CREATE TABLE `ex_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_icon` varchar(255) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ex_categories`
--

INSERT INTO `ex_categories` (`id`, `cat_icon`, `cat_name`, `level`, `description`, `is_deleted`, `created_at`, `updated_at`) VALUES
(56, 'category_1640669420.png', 'Beginner', 'Beginner', ' This is a beginner friendly version of the workout. We have replaced the harder exercises with alternatives that should be easier to perform.', 0, NULL, NULL),
(57, 'category_1640669407.png', 'Classic', 'Classic', ' Scientifically proven to improve health and fitness.', 0, NULL, NULL),
(58, 'category_1628664741.png', 'Abs', 'Abs', ' Want washboard abs? This is the workout for you. A short workout that targets every part of your abs.', 0, NULL, NULL),
(59, 'category_1628664711.png', 'Sweat', 'Sweat', ' High intensity workout that will get your heart rate up and make you sweat. Workout less but lose more!', 0, NULL, NULL),
(60, 'category_1640669391.png', 'Tabata', 'Tabata', ' A tabata inspired workout that includes a warmup and cooldown. Although short, this workout is intense. Make sure you are physically fit before attempting.', 0, NULL, NULL),
(61, 'category_1640669379.png', 'Complete', 'Complete', ' This is classic workout, but done 3 times in a row. Doing this complete workout will help you hit the doctor recommended 20 minute of exercise a day for better health', 0, NULL, NULL);

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
-- Table structure for table `history_payments`
--

CREATE TABLE `history_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date_time` varchar(255) DEFAULT NULL,
  `amount` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `history_payments`
--

INSERT INTO `history_payments` (`id`, `user_id`, `date_time`, `amount`, `created_at`, `updated_at`) VALUES
(2, 17, 'From 2022-12-13 11:47:34 To 2023-01-13 11:47:34', '100.00', '2022-12-13 09:47:34', '2022-12-13 09:47:34'),
(3, 17, 'From 2022-12-13 12:43:30 To 2023-01-13 12:43:30', '102.12', '2022-12-13 10:43:30', '2022-12-13 10:43:30'),
(4, 128, 'From 2022-12-27 08:16:43 To 2023-12-27 08:16:43', NULL, '2022-12-27 07:16:43', '2022-12-27 07:16:43'),
(5, 129, 'From 2022-12-27 08:19:04 To 2023-03-27 08:19:04', NULL, '2022-12-27 07:19:04', '2022-12-27 07:19:04'),
(6, 86, 'From 2022-12-27 10:49:21 To 2023-06-27 10:49:21', NULL, '2022-12-27 09:49:21', '2022-12-27 09:49:21'),
(7, 107, 'From 2022-12-27 10:49:51 To 2023-12-27 10:49:51', NULL, '2022-12-27 09:49:51', '2022-12-27 09:49:51'),
(8, 130, 'From 2022-12-27 12:23:53 To 2023-12-27 12:23:53', NULL, '2022-12-27 11:23:53', '2022-12-27 11:23:53'),
(9, 131, 'From 2022-12-27 12:49:14 To 2023-01-27 12:49:14', '100.00', '2022-12-27 11:49:14', '2022-12-27 11:49:14'),
(10, 131, 'From 2022-12-27 12:49:27 To 2023-01-27 12:49:27', '100.00', '2022-12-27 11:49:28', '2022-12-27 11:49:28'),
(11, 131, 'From 2022-12-27 12:52:36 To 2023-12-27 12:52:36', '300.00', '2022-12-27 11:52:36', '2022-12-27 11:52:36'),
(12, 107, 'From 2022-12-27 01:13:33 To 2023-03-27 01:13:33', '150.00', '2022-12-27 12:13:33', '2022-12-27 12:13:33'),
(13, 107, 'From 2022-12-27 01:15:21 To 2023-03-27 01:15:21', '150.00', '2022-12-27 12:15:21', '2022-12-27 12:15:21'),
(14, 131, 'From 2022-12-27 01:17:58 To 2023-06-27 01:17:58', '200.00', '2022-12-27 12:17:58', '2022-12-27 12:17:58'),
(15, 131, 'From 2022-12-27 01:26:30 To 2023-03-27 01:26:30', '150.00', '2022-12-27 12:26:30', '2022-12-27 12:26:30'),
(16, 128, 'From 2022-12-27 02:48:05 To 2023-12-27 02:48:05', '300.00', '2022-12-27 13:48:05', '2022-12-27 13:48:05'),
(17, 132, 'From 2022-12-27 02:56:06 To 2023-06-27 02:56:06', NULL, '2022-12-27 13:56:06', '2022-12-27 13:56:06'),
(18, 132, 'From 2022-12-27 03:08:32 To 2023-12-27 03:08:32', NULL, '2022-12-27 14:08:32', '2022-12-27 14:08:32'),
(19, 132, 'From 2022-12-27 03:19:14 To 2023-06-27 03:19:14', '200.00', '2022-12-27 14:19:14', '2022-12-27 14:19:14'),
(20, 132, 'From 2022-12-27 03:23:28 To 2023-01-27 03:23:28', '100.00', '2022-12-27 14:23:28', '2022-12-27 14:23:28'),
(21, 133, 'From 2022-12-27 03:45:47 To 2023-01-27 03:45:47', '100.00', '2022-12-27 14:45:47', '2022-12-27 14:45:47'),
(22, 136, 'From 2022-12-27 04:00:02 To 2023-12-27 04:00:02', '300.00', '2022-12-27 15:00:02', '2022-12-27 15:00:02'),
(23, 140, 'From 2022-12-28 09:59:33 To 2023-01-28 09:59:33', '100.00', '2022-12-28 08:59:33', '2022-12-28 08:59:33'),
(24, 141, 'From 2022-12-28 11:04:35 To 2023-03-28 11:04:35', '150.00', '2022-12-28 10:04:35', '2022-12-28 10:04:35'),
(25, 145, 'From 2023-01-08 11:36:09 To 2024-01-08 11:36:09', '300.00', '2023-01-08 10:36:09', '2023-01-08 10:36:09');

-- --------------------------------------------------------

--
-- Table structure for table `home_categories`
--

CREATE TABLE `home_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `tot_exercise` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `calories` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(58, '2014_10_12_000000_create_users_table', 1),
(59, '2014_10_12_100000_create_password_resets_table', 1),
(60, '2019_08_19_000000_create_failed_jobs_table', 1),
(61, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(62, '2022_11_09_175025_create_android_metadata_table', 1),
(63, '2022_11_09_175112_create_app_users_table', 1),
(64, '2022_11_09_175255_create_categories_table', 1),
(65, '2022_11_09_175420_create_complete_workouts_table', 1),
(66, '2022_11_09_175558_create_customworkouts_table', 1),
(67, '2022_11_09_175821_create_exercises_table', 1),
(68, '2022_11_09_180002_create_exercise_sets_table', 1),
(69, '2022_11_09_180127_create_exercise_steps_table', 1),
(70, '2022_11_09_180226_create_ex_categories_table', 1),
(71, '2022_11_09_180333_create_home_categories_table', 1),
(72, '2022_11_09_180500_create_notifications_table', 1),
(73, '2022_11_09_180544_create_send_notification_table', 1),
(74, '2022_11_09_180611_create_settings_table', 1),
(75, '2022_11_09_180658_create_tokandata_table', 1),
(76, '2022_11_10_164930_add_column_to_categories_table', 1),
(77, '2022_11_10_184823_add_column_to_exercises_table', 1),
(78, '2022_11_13_082550_add_role_column_to_users_table', 2),
(79, '2022_11_13_110557_create_admin_notifications_table', 3),
(82, '2022_11_13_111647_add_readed_column_to_admin_notifications_table', 4),
(83, '2022_11_13_145047_create_packages_table', 5),
(86, '2022_11_14_081511_create_customers_table', 6),
(87, '2022_11_14_081818_create_packages_table', 7),
(88, '2022_11_14_083534_create_exercise_packages_table', 8),
(89, '2022_11_14_110833_create_exercise_package_table', 9),
(93, '2019_05_03_000001_create_customer_columns', 10),
(94, '2019_05_03_000002_create_subscriptions_table', 10),
(95, '2019_05_03_000003_create_subscription_items_table', 10),
(96, '2022_11_14_141208_add_access_token_to_customers_table', 11),
(97, '2022_11_14_143029_add_password_column_to_customers_table', 12),
(104, '2022_11_15_112249_create_stripe_customers_table', 13),
(105, '2022_11_15_113356_create_stripe_charges_table', 13),
(106, '2022_11_16_081850_create_customer_subscribtion_table', 14),
(107, '2022_11_16_091357_add_status_column_to_subscriptions_table', 15),
(109, '2022_11_16_114115_add_email_column_to_customers_table', 16),
(110, '2022_11_16_114632_create_addresses_table', 17),
(111, '2022_11_16_133252_create_credit_cards_table', 18),
(113, '2022_11_17_102210_create_customer_notifications_table', 19),
(116, '2022_11_17_123037_create_prices_table', 20),
(117, '2022_12_04_093526_add_column_to_customers_table', 21),
(118, '2022_12_13_110907_create_history_payments_table', 22);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `android_key` varchar(255) NOT NULL,
  `ios_key` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `android_key`, `ios_key`, `created_at`, `updated_at`) VALUES
(8, 'BOn9iHofuD2LIfV_9QJvq5vdhHRCvEeWdA2JNauOTzLSxRCSBLzYQhqdhV2k6saeiiukkrUfasF-ExHeDE0Xpcg', '12233412', '2022-11-13 06:14:21', '2022-11-21 11:26:13');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `exercise_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `customer_id`, `category_id`, `exercise_id`, `created_at`, `updated_at`) VALUES
(207, 'New one', 127, NULL, 28, '2022-12-25 13:05:53', '2022-12-25 13:05:53'),
(208, 'New one', 127, NULL, 29, '2022-12-25 13:05:53', '2022-12-25 13:05:53'),
(209, 'New one', 127, NULL, 30, '2022-12-25 13:05:53', '2022-12-25 13:05:53'),
(210, 'New one', 127, NULL, 31, '2022-12-25 13:05:53', '2022-12-25 13:05:53'),
(211, 'New one', 127, NULL, 32, '2022-12-25 13:05:53', '2022-12-25 13:05:53'),
(212, 'New one', 127, NULL, 33, '2022-12-25 13:05:53', '2022-12-25 13:05:53'),
(213, 'New one', 127, NULL, 34, '2022-12-25 13:05:53', '2022-12-25 13:05:53'),
(214, 'New one', 127, NULL, 35, '2022-12-25 13:05:53', '2022-12-25 13:05:53'),
(215, 'New one', 127, NULL, 36, '2022-12-25 13:05:53', '2022-12-25 13:05:53'),
(216, 'New one', 127, NULL, 37, '2022-12-25 13:05:53', '2022-12-25 13:05:53'),
(217, 'New one', 127, NULL, 38, '2022-12-25 13:05:53', '2022-12-25 13:05:53'),
(234, 'acsacsacsacsacsac', 129, NULL, 28, '2022-12-27 07:42:51', '2022-12-27 07:42:51'),
(235, 'acsacsacsacsacsac', 129, NULL, 29, '2022-12-27 07:42:51', '2022-12-27 07:42:51'),
(236, 'acsacsacsacsacsac', 129, NULL, 30, '2022-12-27 07:42:51', '2022-12-27 07:42:51'),
(237, 'csasacsacsac', 17, NULL, 28, '2022-12-27 08:03:29', '2022-12-27 08:03:29'),
(238, 'csasacsacsac', 17, NULL, 31, '2022-12-27 08:03:29', '2022-12-27 08:03:29'),
(239, 'csasacsacsac', 17, NULL, 32, '2022-12-27 08:03:29', '2022-12-27 08:03:29'),
(240, 'csasacsacsac', 17, NULL, 33, '2022-12-27 08:03:29', '2022-12-27 08:03:29'),
(241, 'aaaaaaaaaaaaaa', 86, NULL, 28, '2022-12-27 09:49:33', '2022-12-27 09:49:33'),
(242, 'aaaaaaaaaaaaaa', 86, NULL, 30, '2022-12-27 09:49:33', '2022-12-27 09:49:33'),
(243, 'aaaaaaaaaaaaaa', 86, NULL, 31, '2022-12-27 09:49:33', '2022-12-27 09:49:33'),
(249, 'New package', 130, NULL, 28, '2022-12-27 11:24:24', '2022-12-27 11:24:24'),
(250, 'New package', 130, NULL, 29, '2022-12-27 11:24:24', '2022-12-27 11:24:24'),
(251, 'New package', 130, NULL, 30, '2022-12-27 11:24:24', '2022-12-27 11:24:24'),
(252, 'New package', 130, NULL, 31, '2022-12-27 11:24:24', '2022-12-27 11:24:24'),
(253, 'New package', 130, NULL, 33, '2022-12-27 11:24:24', '2022-12-27 11:24:24'),
(254, 'New package', 130, NULL, 36, '2022-12-27 11:24:24', '2022-12-27 11:24:24'),
(255, 'New package', 130, NULL, 37, '2022-12-27 11:24:24', '2022-12-27 11:24:24'),
(261, 'packkkk', 131, NULL, 31, '2022-12-27 13:25:57', '2022-12-27 13:25:57'),
(262, 'packkkk', 131, NULL, 35, '2022-12-27 13:25:57', '2022-12-27 13:25:57'),
(263, 'sacsac', 1, NULL, 29, '2022-12-27 13:49:57', '2022-12-27 13:49:57'),
(264, 'sacsac', 1, NULL, 37, '2022-12-27 13:49:57', '2022-12-27 13:49:57'),
(265, 'sacsac', 1, NULL, 38, '2022-12-27 13:49:57', '2022-12-27 13:49:57'),
(284, '465;,l', 132, NULL, 28, '2022-12-27 14:24:23', '2022-12-27 14:24:23'),
(285, '465;,l', 132, NULL, 29, '2022-12-27 14:24:23', '2022-12-27 14:24:23'),
(286, 'sac', 133, NULL, 30, '2022-12-27 14:48:06', '2022-12-27 14:48:06'),
(287, 'sac', 133, NULL, 31, '2022-12-27 14:48:06', '2022-12-27 14:48:06'),
(288, 'sac', 133, NULL, 32, '2022-12-27 14:48:06', '2022-12-27 14:48:06'),
(289, 'Kayan', 136, NULL, 32, '2022-12-27 15:01:18', '2022-12-27 15:01:18'),
(290, 'Kayan', 136, NULL, 33, '2022-12-27 15:01:18', '2022-12-27 15:01:18'),
(291, 'Kayan', 136, NULL, 34, '2022-12-27 15:01:18', '2022-12-27 15:01:18'),
(292, 'Kayan', 136, NULL, 36, '2022-12-27 15:01:18', '2022-12-27 15:01:18'),
(293, 'Kayan', 136, NULL, 38, '2022-12-27 15:01:18', '2022-12-27 15:01:18'),
(294, 'bbbb', 140, NULL, 28, '2022-12-28 09:01:14', '2022-12-28 09:01:14'),
(295, 'bbbb', 140, NULL, 29, '2022-12-28 09:01:14', '2022-12-28 09:01:14'),
(296, 'bbbb', 140, NULL, 30, '2022-12-28 09:01:14', '2022-12-28 09:01:14');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
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
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) DEFAULT '',
  `price` decimal(8,2) DEFAULT NULL,
  `price_three_months` decimal(8,2) DEFAULT NULL,
  `price_six_months` decimal(8,2) DEFAULT NULL,
  `price_year` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`id`, `type`, `price`, `price_three_months`, `price_six_months`, `price_year`, `created_at`, `updated_at`) VALUES
(1, 'month', '100.00', '150.00', '200.00', '300.00', '2022-11-20 21:41:14', '2022-12-27 08:21:21');

-- --------------------------------------------------------

--
-- Table structure for table `send_notifications`
--

CREATE TABLE `send_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `send_notifications`
--

INSERT INTO `send_notifications` (`id`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Notification aaaaaaaaaaaaaa', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stripe_charges`
--

CREATE TABLE `stripe_charges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `currency` varchar(255) NOT NULL DEFAULT 'usd',
  `stripe_customer_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stripe_charges`
--

INSERT INTO `stripe_charges` (`id`, `customer_id`, `amount`, `currency`, `stripe_customer_id`, `description`, `created_at`, `updated_at`) VALUES
(6, 1, 100, 'usd', 17, 'Test payment from itsolutionstuff.com.', '2022-11-15 12:32:48', '2022-11-15 12:32:48');

-- --------------------------------------------------------

--
-- Table structure for table `stripe_customers`
--

CREATE TABLE `stripe_customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `number` varchar(255) DEFAULT NULL,
  `exp_month` varchar(255) DEFAULT NULL,
  `exp_year` varchar(255) DEFAULT NULL,
  `cvc` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stripe_customers`
--

INSERT INTO `stripe_customers` (`id`, `customer_id`, `number`, `exp_month`, `exp_year`, `cvc`, `created_at`, `updated_at`) VALUES
(17, 1, '5112985160775959', '7', '2053', '2214', '2022-11-15 12:32:48', '2022-11-15 12:32:48');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `stripe_id` varchar(255) NOT NULL,
  `stripe_status` varchar(255) NOT NULL,
  `stripe_price` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('pending','approved','canceled') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_items`
--

CREATE TABLE `subscription_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subscription_id` bigint(20) UNSIGNED NOT NULL,
  `stripe_id` varchar(255) NOT NULL,
  `stripe_product` varchar(255) NOT NULL,
  `stripe_price` varchar(255) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tokan_data`
--

CREATE TABLE `tokan_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `token` text NOT NULL,
  `type` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `delivery_boyid` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tokan_data`
--

INSERT INTO `tokan_data` (`id`, `token`, `type`, `user_id`, `delivery_boyid`, `created_at`, `updated_at`) VALUES
(1, 'KFSq4aENcTXLi2ppDdBwp8ADI3Q1nQMYippgH2K0vkrWGHmL5FE99lExLCygsXhR', 'android', 0, 0, '2022-11-20 19:02:39', '2022-11-20 19:02:39'),
(2, 'JRWuzZEc9yhcnrsgWVvdwvniVIHpMwqY9HgKh9cqwtVeA0tZe3ADdkQCOkcGMg4w', 'android', 0, 0, '2022-11-20 19:02:42', '2022-11-20 19:02:42'),
(3, 'aaNu9UNYt5bFWRcsFgFTfX1KMS8Wn09rGaz2Mq3atY273pbAwaTUZWAsEczWzKYl', 'android', 0, 0, '2022-11-20 19:05:52', '2022-11-20 19:05:52'),
(4, 'xGDOipu7MBdtvlFTU9N8mqB9f9mkRGejWNG6MYe0QvkSaTKuxOEo6CSKdCzVyxbH', 'android', 0, 0, '2022-11-20 19:06:19', '2022-11-20 19:06:19'),
(5, 'hKV4bwm2KPtt6Aaz3tMgXSxbZBiwCOoW5EZRNDLb3mwU2VrJwcBqzZnC1WzF1iAr', 'android', 0, 0, '2022-11-20 19:09:03', '2022-11-20 19:09:03'),
(6, 'waTosF7s2LOe7gfAuw8g8ZvB6wDTI4gm2jNEqjAFzTIRvzTcVwkAL4Bj7Yl8hw4O', 'android', 0, 0, '2022-11-20 21:26:51', '2022-11-20 21:26:51'),
(7, 'MjXgfxeKYTmEKYBkZAOK0WzQNvPIHDEDVilmPpT0SHTAnTkqpS8abuR6gS7NwAQT', 'android', 0, 0, '2022-11-22 10:39:55', '2022-11-22 10:39:55'),
(8, 'hNsKFw5FyL1FA2VssFrstTewupwO1NuhjnYAtrC2Vvlec85aCDtJXrQI2OvStKiv', 'android', 0, 0, '2022-11-22 12:25:30', '2022-11-22 12:25:30'),
(9, 'Dbr1m2a3vefCXShQPfqISScbgqlRnLmuKOsKUzut5uEreExPycZv5z0nqccsTYjI', 'android', 0, 0, '2022-11-22 18:34:48', '2022-11-22 18:34:48'),
(10, 'KlO4NqtYYEAHwj5DEd4YLiSaVgitgu4MRpaY1nn4Svv0Qiaaj17CfBPnZjVcI690', 'android', 0, 0, '2022-11-23 08:15:21', '2022-11-23 08:15:21'),
(11, 'rgeTV82RROzh0Kt9r75CDHdDdwpZSWPWf3vShFlTOHwXRIuvqCdeNjXohsTUqppk', 'android', 0, 0, '2022-11-23 13:37:09', '2022-11-23 13:37:09'),
(12, 'xPnTxEr9w2YHuYZmLGhUJfYLyvGc8dm73mQNlEzu6HUHcN6LszmbfdMP050sOj3Y', 'android', 0, 0, '2022-11-23 14:45:23', '2022-11-23 14:45:23'),
(13, 'LTXPrDLi339C9ZcgesEaaWFVmTv98RnFDVrW3Ri7py8GPefZX5DfVdxYwhMAuYTj', 'android', 0, 0, '2022-11-24 09:41:34', '2022-11-24 09:41:34'),
(14, 'ESSSxeuOeg7ZE76AfCFlYRWdw2fcAoH1yJEuKqc0o8txw2mnwYCyIu2dfJL53Oku', 'android', 0, 0, '2022-11-24 12:03:43', '2022-11-24 12:03:43'),
(15, 'EceQaBROP0raYADlq4JsX1FnzMNVcBG002MakR6Jby3R3aEV5Y5p2Fb4OoK2RUu6', 'android', 0, 0, '2022-11-24 12:07:57', '2022-11-24 12:07:57'),
(16, 'Pk4LPOVcY486uCgjmm65O0V148K74fwWPxMg0z5WIw96WOluNar1NmZ5UjDCLkT7', 'android', 0, 0, '2022-11-24 12:49:19', '2022-11-24 12:49:19'),
(17, 'Erri8RikddjJShBBUYMIwF6JHTNIwOf8qS8vQI6lDmMS3vbBJC5iHkC1pksMnyyC', 'android', 0, 0, '2022-11-24 13:58:23', '2022-11-24 13:58:23'),
(18, 'M3yF2DWB56cDJyS8ArlIz7fPHm2sCxqOkzFHM95tZTN2zAcYt9qXBZaNq7aJUQft', 'android', 0, 0, '2022-11-26 10:43:45', '2022-11-26 10:43:45'),
(19, 'AcmEMR34axrPynpY1mlanPFQSlDj5mPxMApbv6SlFGkzrk1U0BZebZ2IKel7xTq3', 'android', 0, 0, '2022-11-27 07:29:22', '2022-11-27 07:29:22'),
(20, 't0FE56X8H1vzBEZZsZU2Ba90LlYOzgQBXnaN4v3wzT4CHO7dccdRTSs2YeeKQnhe', 'android', 0, 0, '2022-11-27 08:02:58', '2022-11-27 08:02:58'),
(21, 'bXK3YW9Ph4jKdOMiRsgEEPTXuJGQQHmB9v3msOsCT86gssqJf8z0qQBg9PZkJESe', 'android', 0, 0, '2022-11-27 08:33:26', '2022-11-27 08:33:26'),
(22, 'ZIqqMUV6wWTtfcBcOMnAMi9tMOZUo5AZONiyILz6XixZjascxObsd0qwUAnQyub2', 'android', 0, 0, '2022-11-27 08:40:23', '2022-11-27 08:40:23'),
(23, 'YsAhjJvu4uyx6AtQ98mp3Ngi6wjzEXV5JDqjfAFttDSXPgd2A04qVDjaMVoZYjD3', 'android', 0, 0, '2022-11-27 08:44:12', '2022-11-27 08:44:12'),
(24, 'Jvy4tQE5gVccqBJGm6xW4HsWT0U4VzcYQwMGkRCYuKU6QCTsxHXnZTeO47eEc77L', 'android', 0, 0, '2022-11-27 09:03:20', '2022-11-27 09:03:20'),
(25, '1OgIZwXEanAhaOeGo4dDNS2KqxsBQmvsjyaj0tZlaZ7WYnFsJz5WICzObWE47t4S', 'android', 0, 0, '2022-11-27 13:15:43', '2022-11-27 13:15:43'),
(26, 'GoPtY1EXY2B0LQMzH9HLVYByt0zgKvtB4SpGSiIVDCVVe9E90ahbcXoadmuHggVN', 'android', 0, 0, '2022-11-27 15:24:47', '2022-11-27 15:24:47'),
(27, 'pwx9PAF0XXJBhLAohK8TM7fnynaPvCVeV9M7MDrWpIJMOk4oU69nFHsZZiI1fGYZ', 'android', 0, 0, '2022-11-28 11:29:55', '2022-11-28 11:29:55'),
(28, 'kbf6LgyRl41dqh8Jmd1ykNEqnNdWqn5HrPLW5IEskMBOYBFzRz3xvR6c6fepmzZ8', 'android', 0, 0, '2022-11-28 14:39:33', '2022-11-28 14:39:33'),
(29, '7PyzTVwAUyga5KcLkHZFcD3N4OA5MNv5nFtsTlFSgFWjD6XuJ6au3LCjpdLgh0RW', 'android', 0, 0, '2022-11-28 15:05:45', '2022-11-28 15:05:45'),
(30, 'iEwfMunVc4pLJhsxSnyAITLPRLJs20p9uCobC61W3mVMfbTtUKT3njs68g5Ofiuh', 'android', 0, 0, '2022-11-28 15:42:54', '2022-11-28 15:42:54'),
(31, 'nKbpslhrculAVMKOIqVn0LeL4YcYIpfU1JikR5U2mYIWuWBhsd0666y2H5JL9DqV', 'android', 0, 0, '2022-11-28 18:48:01', '2022-11-28 18:48:01'),
(32, 'rb1LI88FEDU4lyh0GQUWPmm0KShJd0Fk9YlIF4Iq4SFw9CgYRhSK5WkVV7Aw5P2T', 'android', 0, 0, '2022-11-28 19:01:37', '2022-11-28 19:01:37'),
(33, 'zhgN2MeLxH8GbEpbqJq7GIwNzvsy6DzqDWlrR3yDa0QR7XU0qLvuO0QTmfheDTIG', 'android', 0, 0, '2022-11-28 19:23:18', '2022-11-28 19:23:18'),
(34, 'MultMNPE2s4zAN4vx9bREoOWl0qTSHyZXmZKjW3ANXlKYkDQ2DmujGZItNA5pXEk', 'android', 0, 0, '2022-11-28 20:44:14', '2022-11-28 20:44:14'),
(35, 'UjQYdkX3iEp0WGnP9n3mo9g1bslHVVFXulW42RkFdiJOfgVefGGlEsMAmCtiPRoB', 'android', 0, 0, '2022-11-29 07:31:40', '2022-11-29 07:31:40'),
(36, 'NduXUQ2aUTIZ59IMmmzGyLWcZ8Q3yIvs2UdwhaaJAWNEHMc4YsnTEBMdRWAZmFJC', 'android', 0, 0, '2022-11-29 07:47:33', '2022-11-29 07:47:33'),
(37, 's7OWG7W4DQtdqyEjiMigRSCkWk2sywmIYiZjPneRHWxm2ZZUkMOVuU5lISJrNoxG', 'android', 0, 0, '2022-11-29 08:24:37', '2022-11-29 08:24:37'),
(38, 'uA52ngN4ri2bN2QPU83MMWDMJvGVoD0iiuwyeeXe20hJv1foDXCZ6o408Gl1jh0N', 'android', 0, 0, '2022-11-29 08:37:42', '2022-11-29 08:37:42'),
(39, 'ZHKvCvvQjjXuXgei5YLQrU6PPs0zgaiIsS1IZ7rHQiwbhXyGLDcpX6Cd8Y8MScnz', 'android', 0, 0, '2022-11-29 08:41:46', '2022-11-29 08:41:46'),
(40, '2NkqZt3dtFA0hy4nOnm3Uv39gSMXbL7qAr0FnYyzxMrEIqOPlEGbp8qeqiX9wO2I', 'android', 0, 0, '2022-11-29 08:48:58', '2022-11-29 08:48:58'),
(41, 't7VcifgaPf2kYsb10fVOVwYMS0QTwhmNYwjUimEANPxILyxIT1UCC8G4P1cLAiqz', 'android', 0, 0, '2022-11-29 08:56:23', '2022-11-29 08:56:23'),
(42, 'LRivWzzT13rR8mIb3tDRhSWrSZasgbWDpYvAe45Haw3GgrilEb4swiw0DGgpmqtv', 'android', 0, 0, '2022-11-29 09:15:46', '2022-11-29 09:15:46'),
(43, 'RaZ4VeZvrettiUB60KWemARtYwwlRTP1LAoo6lMFARPkoY0LBRzFb9bnUeG6hwwj', 'android', 0, 0, '2022-11-29 10:40:33', '2022-11-29 10:40:33'),
(44, '0RlVmo3UNerzy9oTEESHmiHp3wpDmCncvAr1DDDVUIdgH47fwlw4HbrBi7qSQD2u', 'android', 0, 0, '2022-11-29 10:55:45', '2022-11-29 10:55:45'),
(45, 'BAvprCdt1pu0YDj73SABPWelBiyYNRvCA5yG0E44iAjkMMmhC9vtl5aie06sbcKv', 'android', 0, 0, '2022-11-29 11:34:56', '2022-11-29 11:34:56'),
(46, 'bXjeI5nTQxdWhDtcOUd4uwx4lgrmVMsPbVcanUTIHKonxMgPUF2Xe7QeevSVqdE3', 'android', 0, 0, '2022-11-29 11:43:03', '2022-11-29 11:43:03'),
(47, 'JtnwyqZGTtycdTy7xLR9Li3yHwzER1rocO7IoorGDCyzrO01hPk2xh7maqPITtkK', 'android', 0, 0, '2022-11-29 11:47:27', '2022-11-29 11:47:27'),
(48, 'goKL1bRvLx2l1cuBIWhx6QBSHeZa1ZcnAj1lPG1c5hmg4E66RHQulMGyTRmfzi3V', 'android', 0, 0, '2022-11-29 12:03:19', '2022-11-29 12:03:19'),
(49, 'kbzhKwbqmJ0AbbxRwiTZkssuQa1kXEpoziJCiQl5J0EKFlp6mDBNvqRriat4xqlD', 'android', 0, 0, '2022-11-30 08:23:51', '2022-11-30 08:23:51'),
(50, 'ydh0Qquih1IqKWqcwEzJKgEVRhyYPgQj0wliOCCdAwdLcuk1sIDCYg79Lcmp4895', 'android', 0, 0, '2022-12-27 07:12:36', '2022-12-27 07:12:36'),
(51, 'ckOqKnJmVeNreWRGzIJMzXdlFjJXlP9Fn98BdUnsk7gfl6Sm45YNrBJP2nmU6Zko', 'android', 0, 0, '2022-12-27 13:20:25', '2022-12-27 13:20:25'),
(52, 'KND4JJiZ9n9vSPZvHHlvnBKseZ5bw8vLTaEfoOiA3c4ohW1Sxan2h30RUjpLB9zK', 'android', 0, 0, '2022-12-27 13:31:00', '2022-12-27 13:31:00'),
(53, 'hNoKCUILptetWZ6kUkyipjvqrYiQSB1eiTwHGL65k7n4NQkHBdUCr6vgTZrzw9fs', 'android', 0, 0, '2022-12-27 13:36:43', '2022-12-27 13:36:43'),
(54, 'zcQvorh3YDY1r1KyeRbszJdTCffATmgaUNdcuUaOp0p5QElUS4sUcqBoTH64HTFc', 'android', 0, 0, '2022-12-27 13:43:00', '2022-12-27 13:43:00'),
(55, '3wtB9OGgXgCY85qx0yw02m7FB4TV3iNxl8ciaelDi7xsPA3N7ykm1J07JbPfC7nb', 'android', 0, 0, '2022-12-27 13:53:52', '2022-12-27 13:53:52'),
(56, 'gYf8uzcDLpGfhJPCjc1J6WtKWuop1I4iqmpCmJFx8O5r4nU6Itsx9PD2ZynRBllA', 'android', 0, 0, '2022-12-27 13:57:29', '2022-12-27 13:57:29'),
(57, 'l3cTB0YyTflqN6KkCfLPWlxG1KUiFmx8SBl2osTpyAKobnMVH7YZ4Aj2gtrfTEAd', 'android', 0, 0, '2022-12-27 14:44:26', '2022-12-27 14:44:26'),
(58, 'wzEr72cHx4lMWlLYtdxPFcqmJuQhnLpz4Gn6HoViWaDa9EgW1KeI3N5V5047c5Wq', 'android', 0, 0, '2022-12-27 14:47:00', '2022-12-27 14:47:00'),
(59, '6DB5LK4jolYLWHlaXLMdXtROVuYoNYfMvtN8aROPn7zKEoDLIa9TPVYQzb3w1MwI', 'android', 0, 0, '2022-12-27 14:52:50', '2022-12-27 14:52:50'),
(60, 'I7GcmsYpE776cVB2JyrXGX2qR4Sc5f646wIdKTAyNYnAqDhmIM5c6tueo2wnRySn', 'android', 0, 0, '2022-12-27 14:58:27', '2022-12-27 14:58:27'),
(61, '0LZ1XPLAklBGr5GxM18pkcH49f6yiS3sL4DzgNFRrCL8clWZun1sOTjESbaPiHGk', 'android', 0, 0, '2022-12-27 15:25:36', '2022-12-27 15:25:36'),
(62, 'Fiifp9BbWCyUqoEJm8HsZ1emh7h1tz7YEGsKGF5fJS1KmD6hwykkTrGrZIQcrD7Z', 'android', 0, 0, '2022-12-27 18:57:00', '2022-12-27 18:57:00'),
(63, 'sACCau9SOeEa90QPV0flos1zDITmdmygUFbrPvW3Y8k8f2Xim14g7geKptKDPNTx', 'android', 0, 0, '2022-12-27 19:31:50', '2022-12-27 19:31:50'),
(64, '6xDqfPaOflCJM5ICojklfQxK5Wm3SNb3u3RIhMWnBL9EA3lQTixatIjmrlpESoTW', 'android', 0, 0, '2022-12-27 20:25:33', '2022-12-27 20:25:33'),
(65, 'Ged44kRfLuOYvChjnSPUe3LIxrMURG025PUG7X3k97kk5P7QdakiLNRan7Z27eA1', 'android', 0, 0, '2022-12-27 20:29:15', '2022-12-27 20:29:15'),
(66, 'i64MYDxhLjbEFXXx5bCoBM2KuVApJIZKWX0FkJ2whZisgLkHaqNLglS9GSMrjNRS', 'android', 0, 0, '2022-12-27 20:48:04', '2022-12-27 20:48:04'),
(67, 'bqPCv3auR5d3uJ0rKPBkpjiGC5NoxNSYkP0fa10CwLtg1VIWEHaw4CNrVYwatclU', 'android', 0, 0, '2022-12-28 05:35:33', '2022-12-28 05:35:33'),
(68, 'CdSZjIkNsCrDMStcjztMIrr3EbOgQyRDY17lKgfD5tmPTWs8Rev1aFeh6iBMLfSx', 'android', 0, 0, '2022-12-28 05:41:15', '2022-12-28 05:41:15'),
(69, 'HESmLalAH6fV1aviCSaZs8JYpktJG2KEgDKyezLdskLxFAqIWQsulAxWDSqGPHFH', 'android', 0, 0, '2022-12-28 07:14:54', '2022-12-28 07:14:54'),
(70, 'wkPTGmbbvPNDxlsTLGdFhN7w8p4QhVwckgfH4Rwy6rc8Z0fw0lYZ8IO1eqFqIFW3', 'android', 0, 0, '2022-12-28 07:23:51', '2022-12-28 07:23:51'),
(71, 'zqvW9967JK5ICiiMs7gkCpaceHvfHWrbFKEtKtA6MDbPtReqjuHAnBnk6K3Lt4iM', 'android', 0, 0, '2022-12-28 07:24:11', '2022-12-28 07:24:11'),
(72, 'BwUwj7oIpMxNUBvsYqIKlF94AtYoNdbwfqEZxPywWw4t6kRBVeAMXdSGvNLAAwSu', 'android', 0, 0, '2022-12-28 08:17:34', '2022-12-28 08:17:34'),
(73, '1O3fAAseSx50TGm4HYI4ZWnb5h3xCmVW4r01Z9bM44Xp6xQZAcQmY7nQ8WC0JYvE', 'android', 0, 0, '2022-12-28 08:17:47', '2022-12-28 08:17:47'),
(74, 'HN4ymkdqy6oAYuiSE9sz4wKGyTsUlmk6OdhOsBOmJ9d0NbHUL7fnifrMhmaEBDRO', 'android', 0, 0, '2022-12-28 10:22:37', '2022-12-28 10:22:37'),
(75, 'P8da9UceoOX4MYlVsbJ6EUYYK5fGM2nve5nLN5tbeFXN9tixaM9P5w2HCs6ZZY1M', 'android', 0, 0, '2022-12-28 10:54:09', '2022-12-28 10:54:09'),
(76, '0VEbrKOSqDX1AF5tQSRzp4CVgZGnFgORT8r7qPVWLRgERSCyj5lwM5A0qoWJtRNO', 'android', 0, 0, '2022-12-28 15:50:14', '2022-12-28 15:50:14'),
(77, 'bwIGluKQVYdVt5Y3lIm4JNSri0HCVO05dAAf4HqzEI6mTADt9zuzaFrNI27lW0al', 'android', 0, 0, '2022-12-31 22:42:31', '2022-12-31 22:42:31'),
(78, 'hf6lyVRjXYEqxLr53PGAKMC8gpZnEMjky9rfzmDZzMJ713mUcx3ynTwZjMiFq2kX', 'android', 0, 0, '2023-01-02 17:25:09', '2023-01-02 17:25:09'),
(79, '8qTA0OB31XB7RWE1RQKzRBvvjNouStmufx0tAYLqWNOQ9Vho9tfvxcgOnMCOtR9P', 'android', 0, 0, '2023-01-02 18:41:26', '2023-01-02 18:41:26'),
(80, 'SndYxsuOTIBpfMYRG7T9UHZsiq3eSJfOk85AayCM66wFGpBGfbeAGtQTpwnLCd5K', 'android', 0, 0, '2023-01-04 08:48:11', '2023-01-04 08:48:11'),
(81, 't1Iv1rZKelbnxmqYwe6rihYa5j6XGhX63S5DFWDGvDLZbPIZwsZQdN7Jxg02LtfW', 'android', 0, 0, '2023-01-04 10:05:05', '2023-01-04 10:05:05'),
(82, '9qxOLvWWrFJiyrUVPUfQDjnUEgQ2CNuMUUyG7XiC6cVIWIMuza18f0ZMV6Ob6ZqU', 'android', 0, 0, '2023-01-05 07:12:44', '2023-01-05 07:12:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` enum('ADMIN','SUPER_ADMIN') NOT NULL DEFAULT 'ADMIN'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `currency`, `password`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(6, 'Admin', 'admin@gmail.com', 'EG', '$2y$10$OGzOZYKxQZRmTqONFw.rLuA0MckgfKbAO2tvplI0BE0tMxtGsU4oq', NULL, NULL, '2022-11-13 06:47:42', '2022-12-03 07:54:52', 'SUPER_ADMIN'),
(12, 'test adminss', 'test@gmail.com', 'EG', '$2y$10$0qHgEs.m9gCApZBrzNcAWuvY3qqDAkjaQhOwXhz3Iso8lJrScK26O', NULL, NULL, '2022-11-13 08:42:38', '2022-12-13 08:51:46', 'ADMIN'),
(13, 'test admin2', 'test2@gmail.com', 'EG', '$2y$10$VkntWHkJ/1NjgU6t5YQ5me/GZqvBL39iQGz9ag9CnNJALqacWPSY2', NULL, NULL, '2022-11-13 08:42:57', '2022-11-13 08:42:57', 'ADMIN'),
(14, 'test admin3', 'test3@gmail.com', 'EG', '$2y$10$VkntWHkJ/1NjgU6t5YQ5me/GZqvBL39iQGz9ag9CnNJALqacWPSY2', NULL, NULL, '2022-11-13 08:43:08', '2022-11-13 08:43:08', 'ADMIN'),
(15, 'test admin4', 'test4@gmail.com', 'EG', '$2y$10$VkntWHkJ/1NjgU6t5YQ5me/GZqvBL39iQGz9ag9CnNJALqacWPSY2', NULL, NULL, '2022-11-13 08:43:17', '2022-11-13 08:43:17', 'ADMIN'),
(17, 'Abdulrhman', 'a@gmail.com', 'EG', '$2y$10$bOSku.ynJvnZPOK4jRPTuutU2m8XjoiIbrKWZ57hAP6gKSbzyn/Zi', NULL, NULL, '2022-12-13 12:59:10', '2022-12-13 12:59:10', 'ADMIN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_notifications`
--
ALTER TABLE `admin_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `android_metadata`
--
ALTER TABLE `android_metadata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complete_workouts`
--
ALTER TABLE `complete_workouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_stripe_id_index` (`stripe_id`);

--
-- Indexes for table `customer_notifications`
--
ALTER TABLE `customer_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_subscribtion`
--
ALTER TABLE `customer_subscribtion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customworkouts`
--
ALTER TABLE `customworkouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exercises`
--
ALTER TABLE `exercises`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exercise_categories`
--
ALTER TABLE `exercise_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exercise_package`
--
ALTER TABLE `exercise_package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exercise_packages`
--
ALTER TABLE `exercise_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exercise_sets`
--
ALTER TABLE `exercise_sets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exercise_steps`
--
ALTER TABLE `exercise_steps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ex_categories`
--
ALTER TABLE `ex_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `history_payments`
--
ALTER TABLE `history_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_categories`
--
ALTER TABLE `home_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `send_notifications`
--
ALTER TABLE `send_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stripe_charges`
--
ALTER TABLE `stripe_charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stripe_customers`
--
ALTER TABLE `stripe_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscriptions_stripe_id_unique` (`stripe_id`),
  ADD KEY `subscriptions_user_id_stripe_status_index` (`user_id`,`stripe_status`);

--
-- Indexes for table `subscription_items`
--
ALTER TABLE `subscription_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscription_items_subscription_id_stripe_price_unique` (`subscription_id`,`stripe_price`),
  ADD UNIQUE KEY `subscription_items_stripe_id_unique` (`stripe_id`);

--
-- Indexes for table `tokan_data`
--
ALTER TABLE `tokan_data`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `admin_notifications`
--
ALTER TABLE `admin_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=280;

--
-- AUTO_INCREMENT for table `android_metadata`
--
ALTER TABLE `android_metadata`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `complete_workouts`
--
ALTER TABLE `complete_workouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `customer_notifications`
--
ALTER TABLE `customer_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=514;

--
-- AUTO_INCREMENT for table `customer_subscribtion`
--
ALTER TABLE `customer_subscribtion`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customworkouts`
--
ALTER TABLE `customworkouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exercises`
--
ALTER TABLE `exercises`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `exercise_categories`
--
ALTER TABLE `exercise_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `exercise_package`
--
ALTER TABLE `exercise_package`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `exercise_packages`
--
ALTER TABLE `exercise_packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exercise_sets`
--
ALTER TABLE `exercise_sets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `exercise_steps`
--
ALTER TABLE `exercise_steps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=334;

--
-- AUTO_INCREMENT for table `ex_categories`
--
ALTER TABLE `ex_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `history_payments`
--
ALTER TABLE `history_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `home_categories`
--
ALTER TABLE `home_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=311;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `send_notifications`
--
ALTER TABLE `send_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stripe_charges`
--
ALTER TABLE `stripe_charges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `stripe_customers`
--
ALTER TABLE `stripe_customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `subscription_items`
--
ALTER TABLE `subscription_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tokan_data`
--
ALTER TABLE `tokan_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
