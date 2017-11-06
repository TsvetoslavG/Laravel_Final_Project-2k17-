-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2017 at 09:43 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_students`
--

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
(76, '2014_10_12_000000_create_users_table', 1),
(77, '2014_10_12_100000_create_password_resets_table', 1),
(78, '2017_10_29_153134_create_table_tests', 1),
(79, '2017_10_29_153159_create_table_specs', 1),
(80, '2017_10_29_153222_create_table_tests_users', 1),
(81, '2017_10_30_185853_add_spec_table_more_columns', 1),
(82, '2017_11_02_084023_add_specs_column_to_users', 1),
(83, '2017_11_02_084915_add_column_left_positions_to_specs', 1),
(84, '2017_11_02_164703_add_column_approved_to_tests_users', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `specs`
--

CREATE TABLE `specs` (
  `id` int(10) UNSIGNED NOT NULL,
  `spec_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spec_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `spec_positions` int(11) NOT NULL,
  `positions_left` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specs`
--

INSERT INTO `specs` (`id`, `spec_name`, `spec_desc`, `spec_positions`, `positions_left`, `created_at`, `updated_at`) VALUES
(1, 'Php', 'saasasas', 10, 8, '2017-11-02 14:57:52', '2017-11-04 13:18:11'),
(3, 'C++', ';jddsjs', 15, 14, '2017-11-02 15:52:59', '2017-11-02 15:55:40');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` int(10) UNSIGNED NOT NULL,
  `test_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spec_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `test_name`, `spec_id`, `created_at`, `updated_at`) VALUES
(1, 'Test1', 1, '2017-11-02 14:58:15', '2017-11-02 14:58:15'),
(2, 'Test2', 1, '2017-11-02 14:58:21', '2017-11-02 14:58:21'),
(3, 'Test3', 3, '2017-11-02 15:53:53', '2017-11-02 15:53:53');

-- --------------------------------------------------------

--
-- Table structure for table `tests_users`
--

CREATE TABLE `tests_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `spec_id` int(11) NOT NULL,
  `result_1` double DEFAULT NULL,
  `result_2` double DEFAULT NULL,
  `final_result` double DEFAULT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tests_users`
--

INSERT INTO `tests_users` (`id`, `user_id`, `test_id`, `spec_id`, `result_1`, `result_2`, `final_result`, `approved`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, 5, 0, 5, 0, '2017-11-04 13:14:10', '2017-11-06 18:35:01'),
(2, 1, 3, 3, NULL, NULL, NULL, 0, '2017-11-04 13:18:03', '2017-11-04 13:18:03'),
(3, 1, 2, 1, NULL, NULL, NULL, 0, '2017-11-04 13:18:46', '2017-11-04 13:18:46'),
(4, 1, 1, 1, 6, 0, 6, 1, '2017-11-04 13:19:29', '2017-11-06 18:35:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_specs` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '[]',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_specs`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ceko', 'ceko@abv.bg', '123', '["3","1"]', NULL, NULL, '2017-11-04 13:18:11'),
(2, 'Tisho', 'qni@abv.bg', '$2y$10$xJFiMz7AUpakcWuSKFIYZeIqwmvy49FID2eMeExHoQrnHL2ZClZlC', '["1"]', NULL, '2017-11-02 15:38:40', '2017-11-02 15:55:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `specs`
--
ALTER TABLE `specs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tests_users`
--
ALTER TABLE `tests_users`
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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT for table `specs`
--
ALTER TABLE `specs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tests_users`
--
ALTER TABLE `tests_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
