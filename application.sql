-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2019 at 08:06 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.0.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `application`
--

-- --------------------------------------------------------

--
-- Table structure for table `accusations`
--

CREATE TABLE `accusations` (
  `id` int(10) UNSIGNED NOT NULL,
  `t_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accusations`
--

INSERT INTO `accusations` (`id`, `t_name`, `created_at`, `updated_at`) VALUES
(1, 'السرقة', '2019-01-19 07:39:22', '2019-01-19 07:39:22'),
(2, 'ضرب', '2019-01-20 08:06:02', '2019-01-20 08:06:02'),
(3, 'القتل', '2019-02-13 10:39:09', '2019-02-13 10:39:09');

-- --------------------------------------------------------

--
-- Table structure for table `causes`
--

CREATE TABLE `causes` (
  `id` int(10) UNSIGNED NOT NULL,
  `number` varchar(191) CHARACTER SET utf8 NOT NULL,
  `child_id` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `prosection_id` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `referral_id` int(11) DEFAULT NULL,
  `victim_name` text CHARACTER SET utf8,
  `victim_id` text CHARACTER SET utf8,
  `victim_nationality` text CHARACTER SET utf8,
  `victim_birthday` text CHARACTER SET utf8mb4,
  `accused_name` text CHARACTER SET utf8,
  `accused_id` text CHARACTER SET utf8,
  `accused_nationality` text CHARACTER SET utf8,
  `accused_birthday` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `accused_name1` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `accused_id1` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accused_nationality1` int(20) DEFAULT NULL,
  `accused_birthday1` date DEFAULT NULL,
  `accused_name2` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `accused_id2` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accused_nationality2` int(20) DEFAULT NULL,
  `accused_birthday2` date DEFAULT NULL,
  `accused_name3` varchar(100) CHARACTER SET utf16 DEFAULT NULL,
  `accused_id3` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accused_nationality3` int(20) DEFAULT NULL,
  `accused_birthday3` date DEFAULT NULL,
  `victim_name1` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `victim_id1` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `victim_nationality1` int(20) DEFAULT NULL,
  `victim_birthday1` date DEFAULT NULL,
  `victim_name2` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `victim_id2` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `victim_nationality2` int(20) DEFAULT NULL,
  `victim_birthday2` date DEFAULT NULL,
  `victim_name3` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `victim_id3` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `victim_nationality3` int(20) DEFAULT NULL,
  `victim_birthday3` date DEFAULT NULL,
  `accused_name4` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `accused_id4` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accused_nationality4` int(20) DEFAULT NULL,
  `accused_birthday4` date DEFAULT NULL,
  `victim_name4` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `victim_id4` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `victim_nationality4` int(20) DEFAULT NULL,
  `victim_birthday4` date DEFAULT NULL,
  `accusation` int(10) UNSIGNED DEFAULT NULL,
  `description` text CHARACTER SET utf8,
  `author` varchar(191) CHARACTER SET utf8 DEFAULT NULL,
  `officer_id` int(10) UNSIGNED NOT NULL,
  `officer_date` date DEFAULT NULL,
  `act_date` date DEFAULT NULL,
  `act_place` varchar(191) CHARACTER SET utf8 DEFAULT NULL,
  `inc_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `user` varchar(200) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `causes`
--

INSERT INTO `causes` (`id`, `number`, `child_id`, `prosection_id`, `referral_id`, `victim_name`, `victim_id`, `victim_nationality`, `victim_birthday`, `accused_name`, `accused_id`, `accused_nationality`, `accused_birthday`, `accused_name1`, `accused_id1`, `accused_nationality1`, `accused_birthday1`, `accused_name2`, `accused_id2`, `accused_nationality2`, `accused_birthday2`, `accused_name3`, `accused_id3`, `accused_nationality3`, `accused_birthday3`, `victim_name1`, `victim_id1`, `victim_nationality1`, `victim_birthday1`, `victim_name2`, `victim_id2`, `victim_nationality2`, `victim_birthday2`, `victim_name3`, `victim_id3`, `victim_nationality3`, `victim_birthday3`, `accused_name4`, `accused_id4`, `accused_nationality4`, `accused_birthday4`, `victim_name4`, `victim_id4`, `victim_nationality4`, `victim_birthday4`, `accusation`, `description`, `author`, `officer_id`, `officer_date`, `act_date`, `act_place`, `inc_date`, `created_at`, `updated_at`, `status`, `user`) VALUES
(29, '3/1907', '3/1902', '1354', 0, 'dfg', 'dg', 'dg', 'dgf', 'dg', 'dg', 'd', 'dg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 1, 's', 'علي', 9, '2019-02-12', '2019-02-12', 'مخفر', NULL, '2019-02-10 06:18:23', '2019-02-10 06:18:23', 1, 'مستخدم عادي'),
(31, '1/2015', '1/1900', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 10, '2019-02-26', NULL, NULL, NULL, '2019-02-12 07:49:33', '2019-02-12 07:49:33', 1, 'الادمن'),
(32, '1/2015', '1/1900', NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sf', '3', NULL, NULL, 's', '3', NULL, '2019-02-03', 's', '3', NULL, '2019-02-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 's', 'علي', 10, '2019-02-11', NULL, 'مخفر', NULL, '2019-02-12 08:03:01', '2019-02-12 08:03:01', 1, 'الادمن'),
(39, '1/2015', '/2015', '33', NULL, '5\r\n12555121', '1215551\r\n1155512', 'ada\r\naaa', NULL, '5\r\n5ad', '5\r\n5aa', 'a5\r\n5a', '5/2/2008\r\n2/25/2009', '1', '1', 2, NULL, '2', '2', 2, NULL, '3', '3', 2, NULL, '1', '5', 2, NULL, '2', '5', 2, NULL, '3', '5', 2, NULL, '4', '4', 2, NULL, '4', '5', 2, NULL, 1, NULL, NULL, 10, '2019-02-04', NULL, NULL, NULL, '2019-02-12 11:41:45', '2019-02-13 06:55:29', 1, 'الادمن'),
(40, '2/2019', '3/2015', NULL, 2, 'دقاق', '5', 'مصر \r\nالبحرين', NULL, NULL, NULL, 'مصري\r\nسعودي', NULL, 'سبسبس', 'سبسبس', 3, '2019-02-03', 'سبس', 'سبس', 1, '2019-02-24', 'سبس', 'سبس', 1, '2019-02-24', 'عبدالرحيم', '1', 4, '2019-02-12', 'علي', '2', 1, '2019-02-12', 'عبدالله', '3', 1, '2019-02-05', 'سبس', 'سب', 1, '2019-02-17', 'محمد', '4', 1, '2019-02-12', 1, NULL, '2019-02-12', 10, '2019-02-26', NULL, NULL, '2019-01-26', '2019-02-12 12:30:34', '2019-02-13 14:32:59', 1, 'الادمن'),
(42, '3/2019', '2/2015', '13545', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'حسن احمد علي', '125555555', 1, '2019-02-01', NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, 'محمد علي احمد حسن', '28546585455', 1, '2019-02-08', 'الطيب عبدالله', '131463548625', 1, '2019-02-06', NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, 1, 'ضيط قضية قتل', 'محمد علي', 12, '2019-02-06', '2019-01-30', 'مخفر', '2019-02-15', '2019-02-13 07:57:13', '2019-02-13 10:31:58', 1, 'الادمن'),
(43, '4/2019', '1/2015', '123', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'خالد يوسف عبدالله', '635655652', 1, '2019-01-27', NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, 'محمد حسن', '1265984265', 1, '2019-02-04', NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, 1, 'قضية سرقة', 'محمد علي', 13, '2019-02-25', '2019-02-25', 'مخفر', '2019-02-13', '2019-02-13 13:10:13', '2019-02-13 13:10:13', 1, 'الادمن');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_01_14_073753_create_officers_table', 1),
(4, '2019_01_14_073811_create_causes_table', 1),
(5, '2019_01_16_120309_create_accusations_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nationals`
--

CREATE TABLE `nationals` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nationals`
--

INSERT INTO `nationals` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'الكويت', '2019-02-12 10:57:40', '2019-02-13 08:05:44'),
(2, 'غير كويتي', '2019-02-12 10:57:47', '2019-02-13 08:05:33'),
(3, 'السعودية', '2019-02-13 08:06:13', '2019-02-13 08:06:13'),
(4, 'الامارات العربية المتحدة', '2019-02-13 08:09:51', '2019-02-13 08:09:51'),
(5, 'البحرين', '2019-02-13 10:38:38', '2019-02-13 10:38:38'),
(6, 'قطر', '2019-02-14 06:16:35', '2019-02-14 06:16:35'),
(7, 'عمان', '2019-02-14 06:16:42', '2019-02-14 06:16:42'),
(8, 'مصر', '2019-02-14 06:16:50', '2019-02-14 06:16:50'),
(9, 'تونس', '2019-02-14 06:16:59', '2019-02-14 06:16:59'),
(10, 'المغرب', '2019-02-14 06:17:05', '2019-02-14 06:17:05'),
(11, 'الجزائر', '2019-02-14 06:17:13', '2019-02-14 06:17:13'),
(12, 'السودان', '2019-02-14 06:17:21', '2019-02-14 06:17:21'),
(13, 'سوريا', '2019-02-14 06:17:35', '2019-02-14 06:17:35'),
(14, 'الاردن', '2019-02-14 06:17:47', '2019-02-14 06:17:47'),
(15, 'فلسطين', '2019-02-14 06:18:17', '2019-02-14 06:18:17');

-- --------------------------------------------------------

--
-- Table structure for table `officers`
--

CREATE TABLE `officers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `officers`
--

INSERT INTO `officers` (`id`, `name`, `created_at`, `updated_at`) VALUES
(10, 'ملازم/ محمد', '2019-02-11 08:42:11', '2019-02-11 08:48:34'),
(11, 'نقيب/ عبدالله العامر محمد علي', '2019-02-11 08:42:48', '2019-02-11 08:42:48'),
(12, 'رائد/ محمد احمد', '2019-02-13 07:29:05', '2019-02-13 07:29:05'),
(13, 'رائد/ محمد الطيب خالد', '2019-02-13 10:38:55', '2019-02-13 10:38:55');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('ali@gmail.com', '$2y$10$Zlr2SmJeWVVMerQPBWHjcenhjogCx8ox2hscLHkzeVLODcxM0RCNS', '2019-01-26 08:20:30'),
('test@gmail.com', '$2y$10$HbTwbdII1X022Rsf033GDOTlouiuHYlJ0RdO91KPUM59ear3UIfDy', '2019-01-26 08:21:00'),
('admin@admin.com', '$2y$10$dAC8u6aVJr.ONZOLDrSfOuIWixIxpOMnRu9eMdCk0/QN35L/CEUda', '2019-01-27 10:08:00'),
('daggage2010@gmail.com', '$2y$10$SGSBHSdN7f75HFA8glmZ9u/4ED8vkovWLUAkUfg/7yL9iLIUKBj42', '2019-01-27 10:08:50');

-- --------------------------------------------------------

--
-- Table structure for table `referrals`
--

CREATE TABLE `referrals` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `referrals`
--

INSERT INTO `referrals` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'مستشفي الفروانية', '2019-02-11 11:54:50', '2019-02-11 12:18:04'),
(3, 'الادارة العامة للتحقيقات', '2019-02-13 10:39:40', '2019-02-13 10:39:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) UNSIGNED DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `name`, `email`, `password`, `image`, `remember_token`, `created_at`, `updated_at`, `status`) VALUES
(5, 'الادمن', 'admin', NULL, '$2y$10$mYns.8uBLQYlfJOeTqMBGOhx5N5hETBroklccMCBSyP4gbxmlELPe', '1548757308thumniul.png', 'sVqdvYDhqLqtatnD9AqhXebageueZBUO0HhFBjjlpiad5GgTc97mJQ9oOXrS', '2019-01-26 08:28:06', '2019-02-04 07:33:29', 1),
(7, 'مستخدم عادي', 'user', NULL, '$2y$10$bUq7HBv6mHCfgXDd9qjwxO2qWLzvJzNvPSSxl0u1spu3.aQxV60Iq', '1548759911thumniul.png', 'NqIsLSqm9dRYNDluZuqvGlFVBUoKLh4StkRAdIlyi369s6GRboRKTd9jFYfk', '2019-01-27 08:10:49', '2019-01-29 11:05:11', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accusations`
--
ALTER TABLE `accusations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `causes`
--
ALTER TABLE `causes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `causes_officer_id_foreign` (`officer_id`),
  ADD KEY `accusation` (`accusation`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nationals`
--
ALTER TABLE `nationals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `officers`
--
ALTER TABLE `officers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `referrals`
--
ALTER TABLE `referrals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accusations`
--
ALTER TABLE `accusations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `causes`
--
ALTER TABLE `causes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nationals`
--
ALTER TABLE `nationals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `officers`
--
ALTER TABLE `officers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `referrals`
--
ALTER TABLE `referrals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
