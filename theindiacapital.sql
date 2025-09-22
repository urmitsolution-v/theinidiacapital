-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2025 at 06:29 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `theindiacapital`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `link` text DEFAULT NULL,
  `status` enum('Y','N') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `description`, `image`, `link`, `status`, `created_at`, `updated_at`) VALUES
(6, 'Your Trusted Consulting Partner : Solutions for Success', 'Bhagodhan Foundation Consultancy Services', '1737537888_4 (1).jpg', 'contact', 'Y', '2025-01-22 09:24:48', '2025-01-22 09:51:15'),
(7, 'Recruitment, HR Advisory and Training, integrated and simplified', 'Bhagodhan Foundation Consultancy Services', '1737538044_3.jpg', 'contact', 'Y', '2025-01-22 09:27:24', '2025-01-22 09:27:24');

-- --------------------------------------------------------

--
-- Table structure for table `best_our_service`
--

CREATE TABLE `best_our_service` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text DEFAULT NULL,
  `sub_title` text DEFAULT NULL,
  `icon` text DEFAULT NULL,
  `status` enum('Y','N') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `best_our_service`
--

INSERT INTO `best_our_service` (`id`, `title`, `sub_title`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(1, 'CUTTING OUT', 'Physical Cutting: Removing something by cutting it away from a larger piece, such as cutting out fabric for a sewing project or paper for crafts.', '1735990075.png', 'Y', '2025-01-04 11:11:07', '2025-01-04 11:28:04'),
(2, 'MEASUREMENTS', 'Units of Quantity: Quantifying something using standardized units, such as meters, liters, or kilograms.', '1735990141.png', 'Y', '2025-01-04 11:29:01', '2025-01-04 11:41:13'),
(3, 'RESIZE', 'Likely refers to spandex cotton or a cotton blend with stretch properties due to the inclusion of spandex. SP cotton is commonly used in clothing for its comfort, breathability, and flexibility.', '1735990199.png', 'Y', '2025-01-04 11:29:59', '2025-01-04 11:29:59');

-- --------------------------------------------------------

--
-- Table structure for table `blogcomments`
--

CREATE TABLE `blogcomments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `message` text DEFAULT NULL,
  `status` enum('Y','N') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogcomments`
--

INSERT INTO `blogcomments` (`id`, `blog_id`, `name`, `email`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, '2', 'vikash', 'vikashtest@gmail.com', 'nice blog', 'Y', '2024-10-08 23:11:04', '2024-10-08 23:11:04'),
(2, '2', 'vikashsaini007', 'test@gmail.com', 'this blog is important for me', 'Y', '2024-10-08 23:12:24', '2024-10-08 23:12:24');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `admin` text NOT NULL,
  `short_description` text DEFAULT NULL,
  `banner` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `meta_title` text DEFAULT NULL,
  `meta_tags` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `status` enum('Y','N') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `slug`, `admin`, `short_description`, `banner`, `description`, `meta_title`, `meta_tags`, `meta_description`, `status`, `created_at`, `updated_at`, `category`, `image`) VALUES
(10, 'Trading Psychology: Mastering Your Mind for Profit', 'trading-psychology-mastering-your-mind-for-profit', 'Lokesh', 'Trading in financial markets involves a wide employ to make informed decisions.', '1737955853_2.avif', '<div class=\"blog__card\" style=\"color: rgb(182, 182, 182); font-family: Poppins, sans-serif; font-size: 16px; background-color: rgb(1, 3, 26);\"><div class=\"blog_news__content mt-5\" style=\"margin-top: 1.25rem !important;\"><p class=\"mb-7 mb-lg-8\" style=\"line-height: 24px; margin-right: 0px; margin-left: 0px; font-family: var(--body-font); color: rgba(var(--nw2), 1); margin-bottom: 2rem !important;\">rading can be a rewarding endeavor, but it\'s not without its challenges. Even experienced traders can fall victim to common mistakes that can negatively impact their portfolios. In this blog post, we\'ll highlight ten common trading mistakes and provide insights on how to avoid them to enhance your chances of success in the financial markets.</p><div class=\"border-start border-color border-4 ps-4 ps-lg-5 py-1\" style=\"--bs-border-width: 4px; border-color: rgba(var(--p1), 1) !important; padding-top: 0.25rem !important; padding-bottom: 0.25rem !important; padding-left: 1.25rem !important;\"><em class=\"fs-five fw_500 nw1-color\" style=\"font-size: 20px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">One of the most prevalent mistakes is trading without a well-defined plan. Trading without clear objectives, entry and exit strategies, and risk management guidelines can lead to impulsive decisions and losses.</em></div></div></div><div class=\"blog-details__inner\" style=\"color: rgb(182, 182, 182); font-family: Poppins, sans-serif; font-size: 16px; background-color: rgb(1, 3, 26);\"><h3 style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-weight: 700; line-height: 38.4px; font-size: 32px; font-family: var(--head-font); padding: 0px; transition: var(--transition);\">Navigating the Trading Jungle A Beginner\'s Guide</h3><p class=\"mt-3\" style=\"margin-bottom: 0px; line-height: 24px; margin-right: 0px; margin-left: 0px; font-family: var(--body-font); color: rgba(var(--nw2), 1); margin-top: 0.75rem !important;\">Before you venture into the trading world, it\'s crucial to grasp the fundamentals. Trading involves the buying and selling of financial assets, such as stocks, currencies, commodities, or cryptocurrencies, with the goal of making a profit.</p><div class=\"row mt-5\" style=\"--bs-gutter-x: 1.5rem; --bs-gutter-y: 0; margin-right: calc(-0.5 * var(--bs-gutter-x)); margin-left: calc(-0.5 * var(--bs-gutter-x)); margin-top: 1.25rem !important;\"><div class=\"col-md-6\" style=\"width: 379.99px; padding-right: calc(var(--bs-gutter-x) * 0.5); padding-left: calc(var(--bs-gutter-x) * 0.5); margin-top: var(--bs-gutter-y);\"><img src=\"http://127.0.0.1:8000/website/assets/images/blog_details_inner.png\" class=\"cus-rounded\" alt=\"Images\" style=\"max-width: 100%; height: auto;\"></div><div class=\"col-md-6\" style=\"width: 379.99px; padding-right: calc(var(--bs-gutter-x) * 0.5); padding-left: calc(var(--bs-gutter-x) * 0.5); margin-top: var(--bs-gutter-y);\"><img src=\"http://127.0.0.1:8000/website/assets/images/blog_details_inner2.png\" class=\"cus-rounded\" alt=\"Images\" style=\"max-width: 100%; height: auto;\"></div></div><p class=\"mt-5\" style=\"margin-bottom: 0px; line-height: 24px; margin-right: 0px; margin-left: 0px; font-family: var(--body-font); color: rgba(var(--nw2), 1); margin-top: 1.25rem !important;\">One of the most prevalent mistakes is trading without a well-defined plan. Trading without clear objectives and risk management guidelines can lead to impulsive decisions and losses.</p></div>', 'Stock Market', 'Stock Market', 'Stock Market', 'Y', '2025-01-27 05:30:53', '2025-01-27 05:31:32', '28', '1737955853_blog_news.png'),
(11, 'Trading Pitfalls Common Mistakes and How to Avoid Them', 'trading-pitfalls-common-mistakes-and-how-to-avoid-them', 'admin', 'Trading in financial markets involves a wide employ to make informed decisions.', '1737955985_2.avif', '<div class=\"blog__card\" style=\"color: rgb(182, 182, 182); font-family: Poppins, sans-serif; font-size: 16px; background-color: rgb(1, 3, 26);\"><div class=\"blog_news__content mt-5\" style=\"margin-top: 1.25rem !important;\"><p class=\"mb-7 mb-lg-8\" style=\"line-height: 24px; margin-right: 0px; margin-left: 0px; font-family: var(--body-font); color: rgba(var(--nw2), 1); margin-bottom: 2rem !important;\">rading can be a rewarding endeavor, but it\'s not without its challenges. Even experienced traders can fall victim to common mistakes that can negatively impact their portfolios. In this blog post, we\'ll highlight ten common trading mistakes and provide insights on how to avoid them to enhance your chances of success in the financial markets.</p><div class=\"border-start border-color border-4 ps-4 ps-lg-5 py-1\" style=\"--bs-border-width: 4px; border-color: rgba(var(--p1), 1) !important; padding-top: 0.25rem !important; padding-bottom: 0.25rem !important; padding-left: 1.25rem !important;\"><em class=\"fs-five fw_500 nw1-color\" style=\"font-size: 20px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">One of the most prevalent mistakes is trading without a well-defined plan. Trading without clear objectives, entry and exit strategies, and risk management guidelines can lead to impulsive decisions and losses.</em></div></div></div><div class=\"blog-details__inner\" style=\"color: rgb(182, 182, 182); font-family: Poppins, sans-serif; font-size: 16px; background-color: rgb(1, 3, 26);\"><h3 style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-weight: 700; line-height: 38.4px; font-size: 32px; font-family: var(--head-font); padding: 0px; transition: var(--transition);\">Navigating the Trading Jungle A Beginner\'s Guide</h3><p class=\"mt-3\" style=\"margin-bottom: 0px; line-height: 24px; margin-right: 0px; margin-left: 0px; font-family: var(--body-font); color: rgba(var(--nw2), 1); margin-top: 0.75rem !important;\">Before you venture into the trading world, it\'s crucial to grasp the fundamentals. Trading involves the buying and selling of financial assets, such as stocks, currencies, commodities, or cryptocurrencies, with the goal of making a profit.</p></div>', 'Stock Market', 'Stock Market', 'Stock Market', 'Y', '2025-01-27 05:33:05', '2025-01-27 06:13:26', '29', '1737955985_blog_news2.png'),
(12, 'tetsre', 'tetsre', 'testing', 'tetsre', '1737956038_2.avif', '<p>tetsre</p>', 'Stock Market', 'Stock Market', 'Stock Market', 'N', '2025-01-27 05:33:58', '2025-01-27 06:07:37', '29', '1737956038_c9ec19bdd57f588822bbc64065c919b6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text DEFAULT NULL,
  `status` enum('Y','N') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `status`, `created_at`, `updated_at`, `type`) VALUES
(11, 'nice', 'Y', '2024-11-15 16:49:51', '2024-11-15 16:49:51', 'project'),
(12, 'good', 'Y', '2024-11-15 16:52:05', '2024-11-15 16:52:05', 'project'),
(23, 'marketing', 'Y', '2025-01-24 11:53:48', '2025-01-24 11:53:53', 'service'),
(24, 'services', 'Y', '2025-01-24 11:54:10', '2025-01-24 11:54:10', 'service'),
(25, 'stock market', 'N', '2025-01-24 11:54:33', '2025-01-24 12:18:32', 'service'),
(26, 'Technical Analysis', 'N', '2025-01-25 09:24:54', '2025-09-09 13:09:22', 'blogs'),
(27, 'Technical Analysis', 'N', '2025-01-27 05:21:03', '2025-02-14 20:40:02', 'blogs'),
(28, 'Fundamental Analysis', 'N', '2025-01-27 05:22:09', '2025-09-09 13:09:16', 'blogs'),
(30, 'Cryptocurrency Trading', 'N', '2025-01-27 05:22:31', '2025-09-09 13:09:09', 'blogs'),
(31, 'Starter Package', 'Y', '2025-01-27 10:19:39', '2025-01-27 10:20:08', 'pricing'),
(32, 'Growth Package', 'Y', '2025-01-27 10:20:28', '2025-01-27 10:20:28', 'pricing'),
(33, 'Premium Package', 'Y', '2025-01-27 10:20:42', '2025-01-27 10:20:42', 'pricing'),
(36, 'Crop Package', 'Y', '2025-05-22 20:52:57', '2025-09-03 19:38:41', 'pricing');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` text DEFAULT NULL,
  `status` enum('Y','N') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(2, '1737553766.png', 'Y', '2025-01-22 13:48:53', '2025-01-22 14:01:26'),
(3, '1737553775.png', 'Y', '2025-01-22 13:49:17', '2025-01-22 13:49:47');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `url` text DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `url`, `comment`, `created_at`, `updated_at`) VALUES
(3, 'Rohit', 'user@gmail.com', 'http://127.0.0.1:8000/single-blog/weather-evident-smiling-bed-agains', 'Your email address will not be published.Your email address will not be published.', '2024-11-17 15:13:51', '2024-11-17 15:13:51');

-- --------------------------------------------------------

--
-- Table structure for table `commission_histories`
--

CREATE TABLE `commission_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `referrer_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `invest_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `month` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `commission_histories`
--

INSERT INTO `commission_histories` (`id`, `referrer_id`, `user_id`, `invest_id`, `amount`, `month`, `created_at`, `updated_at`) VALUES
(39, 101, 110, 127, 483.33, '2025-09', '2025-09-02 21:34:29', '2025-09-02 21:34:29'),
(40, 100, 103, 128, 120.00, '2025-09', '2025-09-13 11:35:51', '2025-09-13 11:35:51');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` text DEFAULT NULL,
  `lname` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `fname`, `lname`, `email`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(2, 'lokesh', 'yadav', 'ly0596232@gmail.com', '8769841472', 'hellow', '2025-01-28 05:54:46', '2025-01-28 05:54:46'),
(3, 'tetsre', 'tetsre', 'amanrawat1810@gmail.com', '9876547654', 'hellow', '2025-01-28 05:55:04', '2025-01-28 05:55:04'),
(4, 'ait', 'web', 'Shakeel.bankk@gmail.com', '9352264850', 'hellow users tetser', '2025-01-28 05:55:24', '2025-01-28 05:55:24'),
(5, NULL, NULL, NULL, NULL, NULL, '2025-02-21 17:53:06', '2025-02-21 17:53:06'),
(6, 'KIRAN', 'SHINDE', 'shelarsachin555.sg@gmail.com', '9075250101', 'ACCOUNT NUMBER CHANGE', '2025-09-03 12:02:24', '2025-09-03 12:02:24');

-- --------------------------------------------------------

--
-- Table structure for table `customer_payment`
--

CREATE TABLE `customer_payment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` varchar(255) DEFAULT NULL,
  `amount` text DEFAULT NULL,
  `payment_mode` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `utr` text DEFAULT NULL,
  `status` enum('pending','complete','reject') NOT NULL DEFAULT 'pending',
  `screenshot` longtext DEFAULT NULL,
  `rejection_reason` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_payment`
--

INSERT INTO `customer_payment` (`id`, `customer_id`, `amount`, `payment_mode`, `created_at`, `updated_at`, `payment_date`, `utr`, `status`, `screenshot`, `rejection_reason`) VALUES
(39, '100', '10000', NULL, '2025-09-02 13:54:42', '2025-09-02 13:55:00', NULL, '123456789012', 'complete', 'https://res.cloudinary.com/dgfvwnxhp/image/upload/v1756801481/wallet_payments/saizhumd07hijimc5vnn.png', NULL),
(40, '101', '20000', NULL, '2025-09-02 20:42:47', '2025-09-02 20:43:36', NULL, '256312547856', 'complete', 'https://res.cloudinary.com/dgfvwnxhp/image/upload/v1756825966/wallet_payments/nk7gcd9cyrmeqaowkcbm.jpg', NULL),
(41, '110', '50000', NULL, '2025-09-02 21:24:54', '2025-09-02 21:30:47', NULL, '632541589625', 'complete', 'https://res.cloudinary.com/dgfvwnxhp/image/upload/v1756828494/wallet_payments/stjawgpid9jmj5tlyt6z.png', NULL),
(42, '103', '20000', NULL, '2025-09-13 11:29:41', '2025-09-13 11:31:57', NULL, 'UTHU12345678', 'complete', 'https://res.cloudinary.com/dgfvwnxhp/image/upload/v1757762973/wallet_payments/nh3cpgfphl09tgbviamu.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `custom_interest_rates`
--

CREATE TABLE `custom_interest_rates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `invest_id` text DEFAULT NULL,
  `original_interest_rate` decimal(8,2) NOT NULL,
  `custom_interest_rate` decimal(8,2) NOT NULL,
  `effective_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `status` enum('active','expired','cancelled') NOT NULL DEFAULT 'active',
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `investment_amount` text DEFAULT NULL,
  `amount` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `custom_interest_rates`
--

INSERT INTO `custom_interest_rates` (`id`, `userid`, `invest_id`, `original_interest_rate`, `custom_interest_rate`, `effective_date`, `end_date`, `status`, `notes`, `created_at`, `updated_at`, `investment_amount`, `amount`) VALUES
(240, 100, '125', 0.00, 2.00, '2025-09-02', '2025-09-02', 'active', '10', '2025-09-02 14:00:25', '2025-09-02 14:00:25', '10200', '200'),
(241, 100, '125', 0.00, 1.20, '2025-09-02', NULL, 'active', 'SS TRADE', '2025-09-02 20:51:03', '2025-09-02 20:51:03', '9310.4', '110.4'),
(242, 101, '126', 0.00, 1.20, '2025-09-02', NULL, 'active', 'SS TRADE', '2025-09-02 20:51:03', '2025-09-02 20:51:03', '20240', '240'),
(243, 100, '125', 0.00, 2.50, '2025-09-02', NULL, 'active', 'demo trade', '2025-09-02 21:37:01', '2025-09-02 21:37:01', '9543.16', '232.76'),
(244, 101, '126', 0.00, 2.50, '2025-09-02', NULL, 'active', 'demo trade', '2025-09-02 21:37:01', '2025-09-02 21:37:01', '20746', '506'),
(245, 110, '127', 0.00, 2.50, '2025-09-02', NULL, 'active', 'demo trade', '2025-09-02 21:37:01', '2025-09-02 21:37:01', '51250', '1250'),
(246, 100, '125', 0.00, 0.42, '2025-09-03', NULL, 'active', 'n trade', '2025-09-03 11:09:27', '2025-09-03 11:09:27', '9583.24', '40.08'),
(247, 101, '126', 0.00, 0.42, '2025-09-03', NULL, 'active', 'n trade', '2025-09-03 11:09:27', '2025-09-03 11:09:27', '10791.13', '45.13'),
(248, 110, '127', 0.00, 0.42, '2025-09-03', NULL, 'active', 'n trade', '2025-09-03 11:09:27', '2025-09-03 11:09:27', '51465.25', '215.25'),
(249, 100, '125', 0.00, 2.00, '2025-09-03', NULL, 'active', NULL, '2025-09-03 13:56:51', '2025-09-03 13:56:51', '9774.9', '191.66'),
(250, 101, '126', 0.00, 2.00, '2025-09-03', NULL, 'active', NULL, '2025-09-03 13:56:51', '2025-09-03 13:56:51', '11006.95', '215.82'),
(251, 110, '127', 0.00, 2.00, '2025-09-03', NULL, 'active', NULL, '2025-09-03 13:56:51', '2025-09-03 13:56:51', '52494.56', '1029.31'),
(252, 100, '125', 0.00, 2.10, '2025-09-03', NULL, 'active', 'cg trade', '2025-09-03 23:50:17', '2025-09-03 23:50:17', '9980.17', '205.27'),
(253, 101, '126', 0.00, 2.10, '2025-09-03', NULL, 'active', 'cg trade', '2025-09-03 23:50:17', '2025-09-03 23:50:17', '11238.1', '231.15'),
(254, 110, '127', 0.00, 2.10, '2025-09-03', NULL, 'active', 'cg trade', '2025-09-03 23:50:17', '2025-09-03 23:50:17', '53596.95', '1102.39'),
(255, 100, '125', 0.00, 0.34, '2025-09-11', NULL, 'active', 'io trade', '2025-09-11 21:32:18', '2025-09-11 21:32:18', '10014.1', '33.93'),
(256, 101, '126', 0.00, 0.34, '2025-09-11', NULL, 'active', 'io trade', '2025-09-11 21:32:18', '2025-09-11 21:32:18', '10874.95', '36.85'),
(257, 110, '127', 0.00, 0.34, '2025-09-11', NULL, 'active', 'io trade', '2025-09-11 21:32:18', '2025-09-11 21:32:18', '53779.18', '182.23'),
(258, 100, '125', 0.00, 1.00, '2025-09-13', NULL, 'active', NULL, '2025-09-13 11:33:25', '2025-09-13 11:33:25', '10114.24', '100.14'),
(259, 101, '126', 0.00, 1.00, '2025-09-13', NULL, 'active', NULL, '2025-09-13 11:33:25', '2025-09-13 11:33:25', '10983.7', '108.75'),
(260, 110, '127', 0.00, 1.00, '2025-09-13', NULL, 'active', NULL, '2025-09-13 11:33:25', '2025-09-13 11:33:25', '54316.97', '537.79'),
(261, 100, '125', 0.00, 1.00, '2025-09-13', NULL, 'active', NULL, '2025-09-13 11:37:24', '2025-09-13 11:37:24', '10215.38', '101.14'),
(262, 101, '126', 0.00, 1.00, '2025-09-13', NULL, 'active', NULL, '2025-09-13 11:37:24', '2025-09-13 11:37:24', '11093.54', '109.84'),
(263, 103, '128', 0.00, 1.00, '2025-09-13', NULL, 'active', NULL, '2025-09-13 11:37:24', '2025-09-13 11:37:24', '20200', '200'),
(264, 110, '127', 0.00, 1.00, '2025-09-13', NULL, 'active', NULL, '2025-09-13 11:37:24', '2025-09-13 11:37:24', '54860.14', '543.17'),
(265, 100, '125', 0.00, 2.00, '2025-09-15', NULL, 'active', NULL, '2025-09-15 07:41:33', '2025-09-15 07:41:33', '10419.69', '204.31'),
(266, 101, '126', 0.00, 2.00, '2025-09-15', NULL, 'active', NULL, '2025-09-15 07:41:33', '2025-09-15 07:41:33', '11315.41', '221.87'),
(267, 103, '128', 0.00, 2.00, '2025-09-15', NULL, 'active', NULL, '2025-09-15 07:41:33', '2025-09-15 07:41:33', '20604', '404'),
(268, 110, '127', 0.00, 2.00, '2025-09-15', NULL, 'active', NULL, '2025-09-15 07:41:33', '2025-09-15 07:41:33', '55957.34', '1097.2');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `subject` text DEFAULT NULL,
  `message` text DEFAULT NULL,
  `status` enum('Y','N') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`id`, `name`, `email`, `phone`, `subject`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 'vikashsaini007', 'vikashsainiji116@gmail.com', '7357791943', 'test', 'hello', 'Y', '2024-09-30 01:50:10', '2024-09-30 01:50:10');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` enum('Y','N') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(12, 'test', 'test desc', 'N', '2024-11-23 12:27:40', '2025-09-09 13:13:11');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` text DEFAULT NULL,
  `status` enum('Y','N') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(4, '1737551247.png', 'Y', '2025-01-22 13:07:27', '2025-01-22 13:07:27'),
(5, '1737551330.png', 'Y', '2025-01-22 13:08:50', '2025-01-22 13:08:50'),
(6, '1737551390.png', 'Y', '2025-01-22 13:09:50', '2025-01-22 13:09:50'),
(7, '1737551497.png', 'N', '2025-01-22 13:11:37', '2025-01-22 13:18:25');

-- --------------------------------------------------------

--
-- Table structure for table `invested`
--

CREATE TABLE `invested` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `package_id` int(11) DEFAULT NULL,
  `amount` text DEFAULT NULL,
  `time` text DEFAULT NULL,
  `interest` double DEFAULT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'N',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `completestatus` enum('pending','complete') DEFAULT 'pending',
  `type` text DEFAULT NULL,
  `firstminus` enum('N','Y') DEFAULT 'N',
  `price` text DEFAULT NULL,
  `admin_added` text DEFAULT NULL,
  `earnings_per_second` text DEFAULT NULL,
  `start_time` text DEFAULT NULL,
  `earned_amount` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invested`
--

INSERT INTO `invested` (`id`, `userid`, `package_id`, `amount`, `time`, `interest`, `status`, `created_at`, `updated_at`, `completestatus`, `type`, `firstminus`, `price`, `admin_added`, `earnings_per_second`, `start_time`, `earned_amount`) VALUES
(125, 100, 3, '10000', 'Years', 4, 'Y', '2025-09-02 13:59:18', '2025-09-02 13:59:18', 'pending', 'business', 'N', NULL, NULL, '0', '2025-09-02 13:59:18', NULL),
(126, 101, 9, '20000', 'Years', 1, 'Y', '2025-09-02 20:44:52', '2025-09-02 20:44:52', 'pending', 'business', 'N', NULL, NULL, '0', '2025-09-02 20:44:52', NULL),
(127, 110, 9, '50000', 'Years', 1, 'Y', '2025-09-02 21:34:29', '2025-09-02 21:34:29', 'pending', 'business', 'N', NULL, NULL, '483.33', '2025-09-02 21:34:29', NULL),
(128, 103, 6, '20000', 'Months', 2, 'Y', '2025-09-13 11:35:51', '2025-09-13 11:35:51', 'pending', 'business', 'N', NULL, NULL, '120', '2025-09-13 17:05:51', NULL);

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
(1, '2024_10_14_113959_banners', 1),
(2, '2024_11_14_034400_events', 2),
(3, '2024_11_15_011822_create_projects', 3),
(4, '2024_11_15_031346_create_proje', 4),
(5, '2024_11_15_222859_create_faqs', 5),
(6, '2024_11_15_224621_create_faq', 6),
(7, '2024_11_16_000758_create_works', 7),
(9, '2024_11_17_023935_create_comments', 9),
(10, '2024_11_20_020530_create_pagesettings', 10),
(11, '2024_12_05_052843_customers', 11),
(12, '2024_12_09_172438_cutting_qty', 12),
(13, '2024_12_11_154245_property', 13),
(14, '2024_12_19_212924_workshop_cutting', 14),
(15, '2024_12_28_135136_customer_payment', 15),
(19, '2025_01_03_123701_create_process', 17),
(20, '2025_01_04_161451_create_best_our_service', 18),
(21, '2025_01_04_173012_create_gallery', 19),
(22, '2025_01_04_175721_create_videos', 20),
(23, '2025_01_22_185106_create_clients', 21),
(26, '2024_11_16_020551_create_contactus', 23),
(27, '2025_01_27_155408_create_pakeges', 24),
(28, '2025_02_01_154729_investing', 25),
(29, '2025_02_04_094546_withdraw', 26),
(30, '2025_03_03_122521_pnlhistory', 27),
(31, '2025_05_19_071356_create_custom_interest_rates_table', 28),
(32, '2025_07_03_160119_create_commission_histories_table', 29),
(33, '2025_07_14_160447_interest', 30);

-- --------------------------------------------------------

--
-- Table structure for table `pagesettings`
--

CREATE TABLE `pagesettings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `pagename` text DEFAULT NULL,
  `bradcump_title` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `meta` text DEFAULT NULL,
  `tag` text DEFAULT NULL,
  `meta_d` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `status` enum('Y','N') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pagesettings`
--

INSERT INTO `pagesettings` (`id`, `title`, `slug`, `pagename`, `bradcump_title`, `description`, `meta`, `tag`, `meta_d`, `image`, `status`, `created_at`, `updated_at`) VALUES
(2, 'About Us', 'about-us', 'About Us', 'We Work Hard And Make Your Home Beautiful', '<h5 class=\"card-title mb-0\" style=\"color: rgb(74, 90, 107); font-family: &quot;Public Sans&quot;, sans-serif;\"><span style=\"color: rgb(24, 35, 51); font-family: Poppins, Arial, Helvetica, sans-serif; font-size: 18px; font-weight: 400; text-align: center; background-color: rgb(248, 249, 250);\">Friendly customer service staff for your all questions!</span></h5>\"\"', 'About Us', 'About Us', 'About Us', '1732072174_ttm-pagetitle-bg.jpg', 'Y', '2024-11-20 14:40:59', '2024-11-21 10:56:49'),
(3, 'Services', 'services', 'Services', 'OUR SERVICES', '<h5 class=\"card-title mb-0\" style=\"color: rgb(74, 90, 107); font-family: &quot;Public Sans&quot;, sans-serif;\"><br></h5>\"\"\"', 'Services', 'Services', 'Services', '1732073480_ttm-pagetitle-bg.jpg', 'Y', '2024-11-20 14:41:21', '2024-11-21 10:59:36'),
(4, 'Projects', 'projects', 'Projects', 'Projects', '\"', 'Projects', 'Projects', 'Projects', '1732075787_ttm-pagetitle-bg.jpg', 'Y', '2024-11-20 16:09:47', '2024-11-21 11:02:20'),
(5, 'Blog', 'blog', 'Blog', 'Blog', '<p>Blog</p>\"', 'Blog', 'Blog', 'Blog', '1732075982_ttm-pagetitle-bg.jpg', 'Y', '2024-11-20 16:13:02', '2024-11-21 11:03:37'),
(6, 'FAQ,S', 'faqs', 'FAQ,S', 'FAQ,S', '\"', 'FAQ,S', 'FAQ,S', 'FAQ,S', '1732076108_ttm-pagetitle-bg.jpg', 'Y', '2024-11-20 16:15:08', '2024-11-21 11:05:31'),
(7, 'Terms & Conditions', 'terms-conditions', 'Terms & Conditions', 'Terms & Conditions', '<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(141, 146, 151); font-family: Poppins, Tahoma, Geneva, sans-serif; text-align: justify;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem, quibusdam vero tempore officia maiores omnis error atque amet et pariatur aliquid voluptas odit perferendis cum obcaecati hic autem, cupiditate sint nesciunt! Eaque eum voluptates quia? Ad error esse, ullam ducimus, provident quasi dignissimos temporibus reprehenderit aut consectetur, suscipit ipsam voluptate praesentium ipsum culpa ratione deserunt aliquam. Sit placeat hic quia sed est excepturi illo omnis error fugit! Quod maiores cumque porro nam non eveniet animi voluptates et quis cum laboriosam quidem nisi error voluptas eaque doloribus, earum dolores voluptatibus dolorem voluptate! Ratione et, tempora nulla enim quia provident obcaecati reprehenderit!</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(141, 146, 151); font-family: Poppins, Tahoma, Geneva, sans-serif; text-align: justify;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem, quibusdam vero tempore officia maiores omnis error atque amet et pariatur aliquid voluptas odit perferendis cum obcaecati hic autem, cupiditate sint nesciunt! Eaque eum voluptates quia? Ad error esse, ullam ducimus, provident quasi dignissimos temporibus reprehenderit aut consectetur, suscipit ipsam voluptate praesentium ipsum culpa ratione deserunt aliquam. Sit placeat hic quia sed est excepturi illo omnis error fugit! Quod maiores cumque porro nam non eveniet animi voluptates et quis cum laboriosam quidem nisi error voluptas eaque doloribus, earum dolores voluptatibus dolorem voluptate! Ratione et, tempora nulla enim quia provident obcaecati reprehenderit!</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(141, 146, 151); font-family: Poppins, Tahoma, Geneva, sans-serif; text-align: justify;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem, quibusdam vero tempore officia maiores omnis error atque amet et pariatur aliquid voluptas odit perferendis cum obcaecati hic autem, cupiditate sint nesciunt! Eaque eum voluptates quia? Ad error esse, ullam ducimus, provident quasi dignissimos temporibus reprehenderit aut consectetur, suscipit ipsam voluptate praesentium ipsum culpa ratione deserunt aliquam. Sit placeat hic quia sed est excepturi illo omnis error fugit! Quod maiores cumque porro nam non eveniet animi voluptates et quis cum laboriosam quidem nisi error voluptas eaque doloribus, earum dolores voluptatibus dolorem voluptate! Ratione et, tempora nulla enim quia provident obcaecati reprehenderit!</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(141, 146, 151); font-family: Poppins, Tahoma, Geneva, sans-serif; text-align: justify;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem, quibusdam vero tempore officia maiores omnis error atque amet et pariatur aliquid voluptas odit perferendis cum obcaecati hic autem, cupiditate sint nesciunt! Eaque eum voluptates quia? Ad error esse, ullam ducimus, provident quasi dignissimos temporibus reprehenderit aut consectetur, suscipit ipsam voluptate praesentium ipsum culpa ratione deserunt aliquam. Sit placeat hic quia sed est excepturi illo omnis error fugit! Quod maiores cumque porro nam non eveniet animi voluptates et quis cum laboriosam quidem nisi error voluptas eaque doloribus, earum dolores voluptatibus dolorem voluptate! Ratione et, tempora nulla enim quia provident obcaecati reprehenderit!</p>\"', 'Terms & Conditions', 'Terms & Conditions', 'Terms & Conditions', '1732077208_ttm-pagetitle-bg.jpg', 'Y', '2024-11-20 16:33:28', '2024-11-21 11:10:06'),
(8, 'Privacy Policy', 'privacy-policy', 'Privacy Policy', 'Privacy Policy', '<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(141, 146, 151); font-family: Poppins, Tahoma, Geneva, sans-serif; text-align: justify;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem, quibusdam vero tempore officia maiores omnis error atque amet et pariatur aliquid voluptas odit perferendis cum obcaecati hic autem, cupiditate sint nesciunt! Eaque eum voluptates quia? Ad error esse, ullam ducimus, provident quasi dignissimos temporibus reprehenderit aut consectetur, suscipit ipsam voluptate praesentium ipsum culpa ratione deserunt aliquam. Sit placeat hic quia sed est excepturi illo omnis error fugit! Quod maiores cumque porro nam non eveniet animi voluptates et quis cum laboriosam quidem nisi error voluptas eaque doloribus, earum dolores voluptatibus dolorem voluptate! Ratione et, tempora nulla enim quia provident obcaecati reprehenderit!</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(141, 146, 151); font-family: Poppins, Tahoma, Geneva, sans-serif; text-align: justify;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem, quibusdam vero tempore officia maiores omnis error atque amet et pariatur aliquid voluptas odit perferendis cum obcaecati hic autem, cupiditate sint nesciunt! Eaque eum voluptates quia? Ad error esse, ullam ducimus, provident quasi dignissimos temporibus reprehenderit aut consectetur, suscipit ipsam voluptate praesentium ipsum culpa ratione deserunt aliquam. Sit placeat hic quia sed est excepturi illo omnis error fugit! Quod maiores cumque porro nam non eveniet animi voluptates et quis cum laboriosam quidem nisi error voluptas eaque doloribus, earum dolores voluptatibus dolorem voluptate! Ratione et, tempora nulla enim quia provident obcaecati reprehenderit!</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(141, 146, 151); font-family: Poppins, Tahoma, Geneva, sans-serif; text-align: justify;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem, quibusdam vero tempore officia maiores omnis error atque amet et pariatur aliquid voluptas odit perferendis cum obcaecati hic autem, cupiditate sint nesciunt! Eaque eum voluptates quia? Ad error esse, ullam ducimus, provident quasi dignissimos temporibus reprehenderit aut consectetur, suscipit ipsam voluptate praesentium ipsum culpa ratione deserunt aliquam. Sit placeat hic quia sed est excepturi illo omnis error fugit! Quod maiores cumque porro nam non eveniet animi voluptates et quis cum laboriosam quidem nisi error voluptas eaque doloribus, earum dolores voluptatibus dolorem voluptate! Ratione et, tempora nulla enim quia provident obcaecati reprehenderit!</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(141, 146, 151); font-family: Poppins, Tahoma, Geneva, sans-serif; text-align: justify;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem, quibusdam vero tempore officia maiores omnis error atque amet et pariatur aliquid voluptas odit perferendis cum obcaecati hic autem, cupiditate sint nesciunt! Eaque eum voluptates quia? Ad error esse, ullam ducimus, provident quasi dignissimos temporibus reprehenderit aut consectetur, suscipit ipsam voluptate praesentium ipsum culpa ratione deserunt aliquam. Sit placeat hic quia sed est excepturi illo omnis error fugit! Quod maiores cumque porro nam non eveniet animi voluptates et quis cum laboriosam quidem nisi error voluptas eaque doloribus, earum dolores voluptatibus dolorem voluptate! Ratione et, tempora nulla enim quia provident obcaecati reprehenderit!</p>\"', 'Privacy Policy', 'Privacy-Policy', 'Privacy-Policy', '1732077468_ttm-pagetitle-bg.jpg', 'Y', '2024-11-20 16:37:48', '2024-11-21 11:12:38'),
(9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL),
(10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL),
(11, 'Contact Us', 'contact-us', 'Contact Us', 'Contact Us', '<h1 class=\"title\" style=\"margin-bottom: 10px; font-family: Poppins, Arial, Helvetica, sans-serif; font-weight: 600; line-height: 50px; color: rgb(255, 255, 255); font-size: 43px; text-transform: capitalize; padding-left: 20px; background-color: rgb(243, 247, 249);\">Contact Us</h1>', 'Contact Us', 'Contact Us', 'Contact Us', '1732144009_post-nine-450x600.jpg', 'Y', '2024-11-21 11:06:49', '2024-11-21 11:06:49'),
(13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pakeges`
--

CREATE TABLE `pakeges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` text DEFAULT NULL,
  `currency` text DEFAULT NULL,
  `formate` text DEFAULT NULL,
  `deac` text DEFAULT NULL,
  `ammount` text DEFAULT NULL,
  `max_amount` text DEFAULT NULL,
  `status` enum('Y','N') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `interest_rate` text DEFAULT NULL,
  `clint_criteria` text DEFAULT NULL,
  `benefit` text DEFAULT NULL,
  `ac_type` text DEFAULT NULL,
  `type` text DEFAULT NULL,
  `completestatus` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pakeges`
--

INSERT INTO `pakeges` (`id`, `category`, `currency`, `formate`, `deac`, `ammount`, `max_amount`, `status`, `created_at`, `updated_at`, `interest_rate`, `clint_criteria`, `benefit`, `ac_type`, `type`, `completestatus`) VALUES
(2, '33', '₹', 'Months', '<div class=\"feature\" style=\"margin: 1.5rem 0px; color: rgb(255, 255, 255); border-bottom: 1px dotted rgba(242, 242, 242, 0.25); padding: 10px 0px; font-family: Poppins, sans-serif; text-align: center; background-color: rgb(31, 31, 31);\">All Starter Package Features</div><div class=\"feature\" style=\"margin: 1.5rem 0px; color: rgb(255, 255, 255); border-bottom: 1px dotted rgba(242, 242, 242, 0.25); padding: 10px 0px; font-family: Poppins, sans-serif; text-align: center; background-color: rgb(31, 31, 31);\">Basic Risk Management Tools</div><div class=\"feature\" style=\"margin: 1.5rem 0px; color: rgb(255, 255, 255); border-bottom: 1px dotted rgba(242, 242, 242, 0.25); padding: 10px 0px; font-family: Poppins, sans-serif; text-align: center; background-color: rgb(31, 31, 31);\">Quarterly Portfolio Review</div><div class=\"feature\" style=\"margin: 1.5rem 0px; color: rgb(255, 255, 255); border-bottom: 1px dotted rgba(242, 242, 242, 0.25); padding: 10px 0px; font-family: Poppins, sans-serif; text-align: center; background-color: rgb(31, 31, 31);\">24/7 Customer Support</div><div class=\"feature\" style=\"margin: 1.5rem 0px; color: rgb(255, 255, 255); border-bottom: 1px dotted rgba(242, 242, 242, 0.25); padding: 10px 0px; font-family: Poppins, sans-serif; text-align: center; background-color: rgb(31, 31, 31);\">Monthly Portfolio Review</div>', '5000000', '9999999', 'Y', '2025-01-30 08:10:21', '2025-09-13 11:36:06', '4', 'Referal account mandatory', 'You earn 2% of the total amount of your referral\'s linked account.', NULL, NULL, NULL),
(3, '32', '₹', 'Months', '<div class=\"feature\" style=\"margin: 1.5rem 0px; color: rgb(255, 255, 255); border-bottom: 1px dotted rgba(242, 242, 242, 0.25); padding: 10px 0px; font-family: Poppins, sans-serif; text-align: center; background-color: rgb(31, 31, 31);\">Refer &amp; Earn Aavilble Also</div><div class=\"feature\" style=\"margin: 1.5rem 0px; color: rgb(255, 255, 255); border-bottom: 1px dotted rgba(242, 242, 242, 0.25); padding: 10px 0px; font-family: Poppins, sans-serif; text-align: center; background-color: rgb(31, 31, 31);\">All Starter Package Features</div><div class=\"feature\" style=\"margin: 1.5rem 0px; color: rgb(255, 255, 255); border-bottom: 1px dotted rgba(242, 242, 242, 0.25); padding: 10px 0px; font-family: Poppins, sans-serif; text-align: center; background-color: rgb(31, 31, 31);\">Basic Risk Management Tools</div><div class=\"feature\" style=\"margin: 1.5rem 0px; color: rgb(255, 255, 255); border-bottom: 1px dotted rgba(242, 242, 242, 0.25); padding: 10px 0px; font-family: Poppins, sans-serif; text-align: center; background-color: rgb(31, 31, 31);\">Quarterly Portfolio Review</div><div class=\"feature\" style=\"margin: 1.5rem 0px; color: rgb(255, 255, 255); border-bottom: 1px dotted rgba(242, 242, 242, 0.25); padding: 10px 0px; font-family: Poppins, sans-serif; text-align: center; background-color: rgb(31, 31, 31);\">24/7 Customer Support</div>', '500000', '4999999', 'Y', '2025-03-06 05:19:56', '2025-09-13 11:36:23', '3', 'Referal Account Mandatory', 'You  can earn 1% of the total amount of your referral\'s linked account.', NULL, NULL, NULL),
(6, '31', '₹', 'Months', '<div class=\"feature\" style=\"margin: 1.5rem 0px; color: rgb(255, 255, 255); border-bottom: 1px dotted rgba(242, 242, 242, 0.25); padding: 10px 0px; font-family: Poppins, sans-serif; text-align: center; background-color: rgb(31, 31, 31);\">Refer &amp; Earn Aavilble Also</div><div class=\"feature\" style=\"margin: 1.5rem 0px; color: rgb(255, 255, 255); border-bottom: 1px dotted rgba(242, 242, 242, 0.25); padding: 10px 0px; font-family: Poppins, sans-serif; text-align: center; background-color: rgb(31, 31, 31);\">All Starter Package Features</div><div class=\"feature\" style=\"margin: 1.5rem 0px; color: rgb(255, 255, 255); border-bottom: 1px dotted rgba(242, 242, 242, 0.25); padding: 10px 0px; font-family: Poppins, sans-serif; text-align: center; background-color: rgb(31, 31, 31);\">Basic Risk Management Tools</div><div class=\"feature\" style=\"margin: 1.5rem 0px; color: rgb(255, 255, 255); border-bottom: 1px dotted rgba(242, 242, 242, 0.25); padding: 10px 0px; font-family: Poppins, sans-serif; text-align: center; background-color: rgb(31, 31, 31);\">Quarterly Portfolio Review</div><div class=\"feature\" style=\"margin: 1.5rem 0px; color: rgb(255, 255, 255); border-bottom: 1px dotted rgba(242, 242, 242, 0.25); padding: 10px 0px; font-family: Poppins, sans-serif; text-align: center; background-color: rgb(31, 31, 31);\">24/7 Customer Support</div>', '10000', '499999', 'Y', '2025-03-22 16:08:45', '2025-09-13 11:35:23', '2', 'Referal account mandatory', 'Eligible for Business Benifite', NULL, NULL, NULL),
(8, '36', '₹', 'Months', '<div class=\"feature\" style=\"margin: 1.5rem 0px; color: rgb(255, 255, 255); border-bottom: 1px dotted rgba(242, 242, 242, 0.25); padding: 10px 0px; font-family: Poppins, sans-serif; text-align: center; background-color: rgb(31, 31, 31);\">All Starter Package Features</div><div class=\"feature\" style=\"margin: 1.5rem 0px; color: rgb(255, 255, 255); border-bottom: 1px dotted rgba(242, 242, 242, 0.25); padding: 10px 0px; font-family: Poppins, sans-serif; text-align: center; background-color: rgb(31, 31, 31);\">Basic Risk Management Tools</div><div class=\"feature\" style=\"margin: 1.5rem 0px; color: rgb(255, 255, 255); border-bottom: 1px dotted rgba(242, 242, 242, 0.25); padding: 10px 0px; font-family: Poppins, sans-serif; text-align: center; background-color: rgb(31, 31, 31);\">Quarterly Portfolio Review</div><div class=\"feature\" style=\"margin: 1.5rem 0px; color: rgb(255, 255, 255); border-bottom: 1px dotted rgba(242, 242, 242, 0.25); padding: 10px 0px; font-family: Poppins, sans-serif; text-align: center; background-color: rgb(31, 31, 31);\">24/7 Customer Support</div><div class=\"feature\" style=\"margin: 1.5rem 0px; color: rgb(255, 255, 255); border-bottom: 1px dotted rgba(242, 242, 242, 0.25); padding: 10px 0px; font-family: Poppins, sans-serif; text-align: center; background-color: rgb(31, 31, 31);\">Monthly Portfolio Review</div>', '1000', '9999', 'Y', '2025-05-22 20:54:39', '2025-09-03 19:45:52', '1', 'No any  Referal account mandatory', 'You can earn one percent of the total amount of your referral\'s linked account.', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `status` enum('Y','N') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `title`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'MESC', '1728026766_1.png', 'Y', '2024-10-04 01:56:06', '2024-10-04 01:56:06'),
(4, 'NSDC', '1728027682_nsdc.png', 'Y', '2024-10-04 01:59:11', '2024-10-04 02:11:22');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
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
-- Table structure for table `pnl_history`
--

CREATE TABLE `pnl_history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `amount` text DEFAULT NULL,
  `trade_balance` text DEFAULT NULL,
  `profit_amount` text DEFAULT NULL,
  `status` enum('pending','complete') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `invest` text DEFAULT NULL,
  `package_id` bigint(20) DEFAULT NULL,
  `percantage` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `process`
--

CREATE TABLE `process` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text DEFAULT NULL,
  `sub_title` text DEFAULT NULL,
  `icon` text DEFAULT NULL,
  `status` enum('Y','N') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `process`
--

INSERT INTO `process` (`id`, `title`, `sub_title`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Crafting Excellence', 'Our meticulous SP Cotton processing ensures the finest quality fabrics. From sourcing premium raw materials to employing advanced techniques,', '1735902289.png', 'Y', '2025-01-03 11:04:49', '2025-01-03 11:04:49');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `category` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `long_description` text DEFAULT NULL,
  `baner_img` text DEFAULT NULL,
  `icon` text DEFAULT NULL,
  `meta_title` text DEFAULT NULL,
  `meta_tags` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `status` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `status` enum('Y','N') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(7, 'Harly Rayans', '1731726265.jpg', 'Y', '2024-11-16 11:50:22', '2024-11-17 17:43:35'),
(9, 'rohit', '1732364997.png', 'N', '2024-11-17 16:32:06', '2025-01-04 15:13:49'),
(12, 'lokesh', '1736003616.jpg', 'Y', '2025-01-04 15:12:36', '2025-01-04 15:13:43');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text DEFAULT NULL,
  `destination` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `status` enum('Y','N') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `destination`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(16, 'THE INDIA CAPITAL', 'FOUNDER & CEO', '<p><span style=\"font-size: 16px;\">\'THE INDIA CAPITAL\'&nbsp; Is a Long term Investment Plane platform&nbsp;</span></p>', '1757403722_tic jpg.jpg', 'Y', '2025-03-08 13:15:42', '2025-09-09 13:12:02');

-- --------------------------------------------------------

--
-- Table structure for table `testing`
--

CREATE TABLE `testing` (
  `test` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `company_name` text DEFAULT NULL,
  `company_address` text DEFAULT NULL,
  `gstin` text DEFAULT NULL,
  `domain` text DEFAULT NULL,
  `codeid` text DEFAULT NULL,
  `customer_type_id` text DEFAULT NULL,
  `is_block` enum('N','Y') NOT NULL,
  `role` enum('user','hrms','crm','superadmin','team') NOT NULL,
  `status` enum('pending','approved','rejected') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` text DEFAULT NULL,
  `job_title` text DEFAULT NULL,
  `role_type` text DEFAULT NULL,
  `destination` varchar(200) DEFAULT NULL,
  `access_type` varchar(200) DEFAULT NULL,
  `first_name` text DEFAULT NULL,
  `last_name` text DEFAULT NULL,
  `account_holder_name` text DEFAULT NULL,
  `account_number` text DEFAULT NULL,
  `ifsc_code` text DEFAULT NULL,
  `branch_name` text DEFAULT NULL,
  `aadhar_card_number` text DEFAULT NULL,
  `pan_number` text DEFAULT NULL,
  `pan_card` text DEFAULT NULL,
  `aadhar_card` text DEFAULT NULL,
  `aadhar_card_back` text DEFAULT NULL,
  `wallet` text DEFAULT NULL,
  `referral_code` decimal(10,0) DEFAULT NULL,
  `referred_by` varchar(255) DEFAULT NULL,
  `refer_by` text DEFAULT NULL,
  `cancel_chaque` text DEFAULT NULL,
  `nominee_name` text DEFAULT NULL,
  `nominee_relation` text DEFAULT NULL,
  `nominee_age` text DEFAULT NULL,
  `nominee_contact` text DEFAULT NULL,
  `kyc_status` set('pending','complete','reject','apply') DEFAULT NULL,
  `kyc_time` date DEFAULT NULL,
  `reason` longtext DEFAULT NULL,
  `kyc_reason` longtext DEFAULT NULL,
  `refer_wallet` text DEFAULT NULL,
  `refer_by_wallet` text DEFAULT NULL,
  `bank_name` text DEFAULT NULL,
  `bank_identity` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `address`, `image`, `company_name`, `company_address`, `gstin`, `domain`, `codeid`, `customer_type_id`, `is_block`, `role`, `status`, `created_at`, `updated_at`, `remember_token`, `job_title`, `role_type`, `destination`, `access_type`, `first_name`, `last_name`, `account_holder_name`, `account_number`, `ifsc_code`, `branch_name`, `aadhar_card_number`, `pan_number`, `pan_card`, `aadhar_card`, `aadhar_card_back`, `wallet`, `referral_code`, `referred_by`, `refer_by`, `cancel_chaque`, `nominee_name`, `nominee_relation`, `nominee_age`, `nominee_contact`, `kyc_status`, `kyc_time`, `reason`, `kyc_reason`, `refer_wallet`, `refer_by_wallet`, `bank_name`, `bank_identity`) VALUES
(19, 'THE INDIA CAPITAL', 'admin@gmail.com', '$2y$10$fV6WpPL/28xVIQ6pNEfqiuJcwW9/cyzawJViT3CFKj3.G.gWTde72', '9075250101', NULL, NULL, NULL, NULL, NULL, NULL, '12345678', NULL, 'N', 'superadmin', 'approved', '2024-10-02 01:28:51', '2025-08-25 15:03:31', '6M0NU3JbAiMf8HMk5Bchl88CRuL92SbXVscFsZ1ghsr5zwOZeF14MjrqjvOu', 'UI Designer', 'admin', 'CEO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', NULL, NULL, NULL, '395.15', NULL, NULL, NULL),
(100, 'vikashsaini007', 'vikashsainiji116@gmail.com', '$2y$10$pqWcaF5oAyfQ9qAdTI/DEe166jiln5hM7V9FKkX46BdUozJry36tO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345678', NULL, 'N', 'user', 'approved', '2025-08-18 14:34:30', '2025-09-13 11:35:51', NULL, NULL, NULL, NULL, NULL, 'S', 'R', 'Vikash Kumar Saini', '789456123012', 'PYTM0123456', 'NOIDA', '256988995566', 'THWPS0123U', 'uploads/kyc/1756805522_pan.png', 'uploads/kyc/1756805522_aadhar.png', 'uploads/kyc/1756805522_aadhar_back.png', '120', NULL, NULL, '0', 'uploads/kyc/1756805522_cancel_cheque.png', NULL, NULL, NULL, NULL, 'apply', '2025-09-02', NULL, 'Applied For Kyc. Please wait for Tic verification.', '120', '0', 'Paytm Payment Bank', 'uploads/kyc/1756805522_bank_identity.png'),
(101, 'shelarsachin0101', 'alekarvishal0@gmail.com', '$2y$10$D7r25CWruOzAomrsQElCLuWu.I6/JHWdEmBOHG8vly8Vf/D09cgCK', '9075250101', NULL, '1755586157.jpg', NULL, NULL, NULL, NULL, 'SACHIN@0101', NULL, 'N', 'user', 'approved', '2025-08-19 12:15:58', '2025-09-08 14:05:29', NULL, NULL, NULL, NULL, NULL, 'SACHIN', 'SHELAR', 'SACHIN SOPAN SHELAR', '31221654896', 'SBIN000265', 'PUNE', '952036521452', 'DFGYU1221L', 'uploads/kyc/1755586411_pan.jpg', 'uploads/kyc/1755586411_aadhar.jpg', 'uploads/kyc/1755586411_aadhar_back.jpg', '483.33', NULL, NULL, '0', 'uploads/kyc/1755586411_cancel_cheque.jpg', 'SHELAR M  S', 'MOTHER', '49', '9100000000', 'complete', '2025-08-19', NULL, 'KYC DONE', '609.13', '0', 'STATE BANK OF INDIA', 'uploads/kyc/1755586411_bank_identity.png'),
(103, 'vikashsaini00011', 'targetvr43@gmail.com', '$2y$10$EJoGU76CyBebPvlI0OS42uNWMvpytD.xtt9kG.ULjlfZoy4vMXL9m', '7357791943', NULL, '1757756277.png', NULL, NULL, NULL, NULL, '12345678', NULL, 'N', 'user', 'approved', '2025-08-23 11:33:41', '2025-09-15 07:50:25', NULL, NULL, NULL, NULL, NULL, 'Vikash Kumar', 'Saini', 'Vikash Kumar Saini', '917357791943', 'PYTM0123456', 'Noida', '256899664455', 'HTPSH1234J', 'uploads/kyc/1757747512_pan.png', 'uploads/kyc/1757747512_aadhar.png', 'uploads/kyc/1757747512_aadhar_back.png', '0', NULL, NULL, '100', 'uploads/kyc/1757747512_cancel_cheque.png', 'Vikash Saini', 'Brother', '19', '7357791943', 'apply', '2025-09-13', NULL, 'Tic has been aprooved your kyc', NULL, '120', 'Paytm Payment Bank', 'uploads/kyc/1757747512_bank_identity.png'),
(104, 'manish001', 'rr8637217@gmail.com', '$2y$10$W/lC5KiohybQUa0O8RHHq.trYa.3Pl5bJKxcBYTnDmcQy5gLL7Eyu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345678', NULL, 'N', 'user', 'approved', '2025-08-25 14:50:58', '2025-08-25 14:52:54', NULL, NULL, NULL, NULL, NULL, 'Manish', 'Kumar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '112.9', NULL, NULL),
(105, 'mahendrakumar', 'bvm3344@gmail.com', '$2y$10$As23i4HiZBqn.FVYAgV4h.i.2usOta68B5bms4olLsVkd5q6bwhOO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345678', NULL, 'N', 'user', 'approved', '2025-08-25 14:58:49', '2025-08-25 15:33:54', NULL, NULL, NULL, NULL, NULL, 'Mahendra', 'Kumar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '282.25', NULL, NULL),
(108, 'tausifshaikh@123', 'varshatilekar0101@gmail.com', '$2y$10$xReG6B5gu51xVPEWotzuM.8XKPEa6s/GMEio00HBWaEnYgm/9DH2a', '9000000000', NULL, '1756542653.jpg', NULL, NULL, NULL, NULL, 'TAUSIF@123', NULL, 'N', 'user', 'approved', '2025-08-25 23:00:43', '2025-08-30 14:00:53', NULL, NULL, NULL, NULL, NULL, 'TOUSIF BHAI', 'SHAIKH', 'TAUSIF AMIN SHAIKH', '325569850101', 'SBIN000254', 'KASHTI', '954632562541', 'HYGFD5432D', 'uploads/kyc/1756534974_pan.jpg', 'uploads/kyc/1756534974_aadhar.jpg', 'uploads/kyc/1756534974_aadhar_back.jpg', '0', NULL, NULL, '101', 'uploads/kyc/1756534974_cancel_cheque.jpg', 'AMIN ISMAIL SHAIKH', 'FATHER', '66', '9122003366', 'complete', '2025-08-30', NULL, 'KYC APPROVED', NULL, '19.35', 'BOB', 'uploads/kyc/1756534974_bank_identity.png'),
(109, 'nilimapawar123', 'nilimapawar4545@gmail.com', '$2y$10$fbcJSP46s9ukZyJfW.XSs.cSuJhNqERC6fE5P/JpdwzGb5DS/to3u', '9000000000', NULL, '1756196248.jpg', NULL, NULL, NULL, NULL, 'NILIMA@123', NULL, 'N', 'user', 'approved', '2025-08-26 13:45:21', '2025-08-26 14:02:45', NULL, NULL, NULL, NULL, NULL, 'nilima', 'pawar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '101', NULL, 'PRITI S PAWAR', 'DAUTHER', '23', NULL, NULL, NULL, NULL, NULL, NULL, '38.71', NULL, NULL),
(110, 'rohananarthe123', 'LO@GMAIL.COM', '$2y$10$AGOQEgc0ZA/wFMMMvNeHSOYCJVWBPahnMpiLooNAa79nUapmOENXy', '9000000000', NULL, '1756827899.jpg', NULL, NULL, NULL, NULL, 'ROHAN@123', NULL, 'N', 'user', 'approved', '2025-09-02 21:09:18', '2025-09-02 21:34:29', NULL, NULL, NULL, NULL, NULL, 'ROHAN', 'ANARTHE', 'ROHAN KAILAS ANARTHE', '501002563254125', 'HDFC002536', 'PUNE', '945632102563', 'KJIUJ8765T', 'uploads/kyc/1756828007_pan.jpg', 'uploads/kyc/1756828007_aadhar.jpg', 'uploads/kyc/1756828007_aadhar_back.jpg', '0', NULL, NULL, '101', 'uploads/kyc/1756828007_cancel_cheque.jpg', 'KAILAS M  ANARTHE', 'FATHER 62', '35', '9000000000', 'complete', '2025-09-02', NULL, 'kyc apprroved', NULL, '483.33', 'HDFC BANK', 'uploads/kyc/1756828007_bank_identity.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `video` text DEFAULT NULL,
  `status` enum('Y','N') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `video`, `status`, `created_at`, `updated_at`) VALUES
(2, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/8l7kAx-jy9A?si=zl7kqlhdwNmWI61n\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', 'Y', '2025-01-04 12:46:55', '2025-01-04 12:50:36'),
(3, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/FqgKysYrIeY?si=G2UUSPeyzOkAtlgk\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', 'Y', '2025-01-04 12:51:05', '2025-01-04 12:51:05');

-- --------------------------------------------------------

--
-- Table structure for table `webinfo`
--

CREATE TABLE `webinfo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `info_one` text DEFAULT NULL,
  `info_two` text DEFAULT NULL,
  `info_three` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `banner` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `favicon` text DEFAULT NULL,
  `image_2` text DEFAULT NULL,
  `account_holder_name` text DEFAULT NULL,
  `account_number` text DEFAULT NULL,
  `ifsc_code` text DEFAULT NULL,
  `bank_name` text DEFAULT NULL,
  `branch_name` text DEFAULT NULL,
  `bank_address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `webinfo`
--

INSERT INTO `webinfo` (`id`, `info_one`, `info_two`, `info_three`, `image`, `banner`, `created_at`, `updated_at`, `favicon`, `image_2`, `account_holder_name`, `account_number`, `ifsc_code`, `bank_name`, `branch_name`, `bank_address`) VALUES
(1, '<div class=\"privacy-policy__part\" style=\"color: rgb(182, 182, 182); font-family: Poppins, sans-serif; font-size: 16px; background-color: rgb(31, 31, 31);\"><h5 class=\"mb-4\" style=\"font-weight: 700; line-height: 24px; font-size: 20px; font-family: var(--head-font); padding: 0px; margin-right: 0px; margin-left: 0px; transition: var(--transition); margin-bottom: 1rem !important;\">Agreement to Terms &amp; Condition</h5><p class=\"mt-3\" style=\"margin-bottom: 0px; line-height: 24px; margin-right: 0px; margin-left: 0px; font-family: var(--body-font); color: rgba(var(--nw2), 1); margin-top: 0.75rem !important;\">I apologize for any confusion, but as an AI language model, I don\'t have access specific gaming platforms, games, or online services can vary widely depending on the specific company and the jurisdiction they operate in.</p><p class=\"mt-3\" style=\"margin-bottom: 0px; line-height: 24px; margin-right: 0px; margin-left: 0px; font-family: var(--body-font); color: rgba(var(--nw2), 1); margin-top: 0.75rem !important;\">f you\'re looking for the terms and conditions of a particular gaming platform or game recommend visiting the official website of the platform or contacting their customer support. The terms and conditions are usually provided on their website,</p><p class=\"mt-3\" style=\"margin-bottom: 0px; line-height: 24px; margin-right: 0px; margin-left: 0px; font-family: var(--body-font); color: rgba(var(--nw2), 1); margin-top: 0.75rem !important;\">I\'d be happy to provide you with some general information about terms and conditions. terms and conditions of any particular service or organization. The terms and conditions specific company or service you are referring to.</p><p class=\"mt-3\" style=\"margin-bottom: 0px; line-height: 24px; margin-right: 0px; margin-left: 0px; font-family: var(--body-font); color: rgba(var(--nw2), 1); margin-top: 0.75rem !important;\">I\'d be happy to provide you with some general information about terms and conditions. However, please note that I am AI language model, and I don\'t have access to specific terms and conditions of any particular service or organization.</p></div><div class=\"privacy-policy__part\" style=\"color: rgb(182, 182, 182); font-family: Poppins, sans-serif; font-size: 16px; background-color: rgb(31, 31, 31);\"><h5 class=\"mb-4\" style=\"font-weight: 700; line-height: 24px; font-size: 20px; font-family: var(--head-font); padding: 0px; margin-right: 0px; margin-left: 0px; transition: var(--transition); margin-bottom: 1rem !important;\">User Representations</h5><p class=\"mt-4 mb-5\" style=\"line-height: 24px; margin-right: 0px; margin-left: 0px; font-family: var(--body-font); color: rgba(var(--nw2), 1); margin-top: 1rem !important; margin-bottom: 1.25rem !important;\">We use cookies and similar tracking technologies to enhance your experience on our platform and gather information about your interactions with our services.</p><ul class=\"ul-decimal mt-5 d-flex gap-3 flex-column\" style=\"padding: 0px; margin-bottom: 0px; margin-right: 0px; margin-left: 14px; list-style: none; margin-top: 1.25rem !important; gap: 0.75rem !important;\"><li style=\"list-style: decimal; font-size: inherit; line-height: 24px; margin: 0px; font-family: var(--body-font); color: rgba(var(--nw2), 1); font-weight: inherit;\">Acceptance: Users are typically required to agree to the terms and conditions before using a service. button or by simply using the service.</li><li style=\"list-style: decimal; font-size: inherit; line-height: 24px; margin: 0px; font-family: var(--body-font); color: rgba(var(--nw2), 1); font-weight: inherit;\">User rights and responsibilities: The terms and conditions specify the rights granted to users and the responsibilities they have while using the service.</li><li style=\"list-style: decimal; font-size: inherit; line-height: 24px; margin: 0px; font-family: var(--body-font); color: rgba(var(--nw2), 1); font-weight: inherit;\">your reviews should not contain offensive profanity, racist, offensive, or hate language;</li><li style=\"list-style: decimal; font-size: inherit; line-height: 24px; margin: 0px; font-family: var(--body-font); color: rgba(var(--nw2), 1); font-weight: inherit;\">Dispute resolution: Procedures for resolving disputes, such as arbitration or mediation, may be outlined in the terms and conditions.</li><li style=\"list-style: decimal; font-size: inherit; line-height: 24px; margin: 0px; font-family: var(--body-font); color: rgba(var(--nw2), 1); font-weight: inherit;\">Intellectual property: These sections outline the ownership and usage rights of intellectual property such as copyrights, trademarks, and patents associated with the service or content provided.</li></ul><p class=\"mt-5\" style=\"margin-bottom: 0px; line-height: 24px; margin-right: 0px; margin-left: 0px; font-family: var(--body-font); color: rgba(var(--nw2), 1); margin-top: 1.25rem !important;\">Remember that it\'s important to read and understand the specific terms and conditions of any service or product you use. If you have any questions or concerns about a particular set of terms clarification.</p></div><div class=\"privacy-policy__part\" style=\"color: rgb(182, 182, 182); font-family: Poppins, sans-serif; font-size: 16px; background-color: rgb(31, 31, 31);\"><h5 class=\"mb-4\" style=\"font-weight: 700; line-height: 24px; font-size: 20px; font-family: var(--head-font); padding: 0px; margin-right: 0px; margin-left: 0px; transition: var(--transition); margin-bottom: 1rem !important;\">Guideline for Reviews</h5><ul class=\"ul-decimal mt-5 d-flex gap-3 flex-column\" style=\"padding: 0px; margin-bottom: 0px; margin-right: 0px; margin-left: 14px; list-style: none; margin-top: 1.25rem !important; gap: 0.75rem !important;\"><li style=\"list-style: decimal; font-size: inherit; line-height: 24px; margin: 0px; font-family: var(--body-font); color: rgba(var(--nw2), 1); font-weight: inherit;\">you should have firsthand experience with the object being reviewed;</li><li style=\"list-style: decimal; font-size: inherit; line-height: 24px; margin: 0px; font-family: var(--body-font); color: rgba(var(--nw2), 1); font-weight: inherit;\">your reviews should not contain offensive profanity offensive, or hate language;</li><li style=\"list-style: decimal; font-size: inherit; line-height: 24px; margin: 0px; font-family: var(--body-font); color: rgba(var(--nw2), 1); font-weight: inherit;\">your reviews should not contain discriminatory references based on religion, race, gender, national origin, age, marital status, sexual orientation, or disability;</li><li style=\"list-style: decimal; font-size: inherit; line-height: 24px; margin: 0px; font-family: var(--body-font); color: rgba(var(--nw2), 1); font-weight: inherit;\">your reviews should not contain references to illegal activity;</li><li style=\"list-style: decimal; font-size: inherit; line-height: 24px; margin: 0px; font-family: var(--body-font); color: rgba(var(--nw2), 1); font-weight: inherit;\">you may not organize encouraging others to post reviews, whether positive or negative.</li></ul><p class=\"mt-4\" style=\"margin-bottom: 0px; line-height: 24px; margin-right: 0px; margin-left: 0px; font-family: var(--body-font); color: rgba(var(--nw2), 1); margin-top: 1rem !important;\">We may accept, reject, or remove reviews at our sole discretion. We have absolutely no obligation to screen reviews or to delete reviews, even if anyone considers reviews objectionable or inaccurate.</p></div><div class=\"privacy-policy__part\" style=\"color: rgb(182, 182, 182); font-family: Poppins, sans-serif; font-size: 16px; background-color: rgb(31, 31, 31);\"><h5 class=\"mb-4\" style=\"font-weight: 700; line-height: 24px; font-size: 20px; font-family: var(--head-font); padding: 0px; margin-right: 0px; margin-left: 0px; transition: var(--transition); margin-bottom: 1rem !important;\">Social Media</h5><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: 24px; font-family: var(--body-font); color: rgba(var(--nw2), 1);\">\r\nAs part of the functionality of the Site, you may link your account with online accounts you either: providing your Third-Party Account login information through the Site allowing us each Third-Party Account.</p><p class=\"mt-3\" style=\"margin-bottom: 0px; line-height: 24px; margin-right: 0px; margin-left: 0px; font-family: var(--body-font); color: rgba(var(--nw2), 1); margin-top: 0.75rem !important;\">You represent and warrant that you are entitled to disclose your Third-Party Account login you of any of the Terms and Conditions that govern your use of the applicable Third-Party Account, and without obligating us to pay any fees or making us subject to any usage service provider of the Third-Party Account.</p></div>', NULL, NULL, NULL, NULL, NULL, '2025-08-23 16:07:10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '<div class=\"privacy-policy__part\" style=\"color: rgb(182, 182, 182); font-family: Poppins, sans-serif; font-size: 16px; background-color: rgb(31, 31, 31);\"><h5 class=\"mb-4\" style=\"font-weight: 700; line-height: 24px; font-size: 20px; font-family: var(--head-font); padding: 0px; margin-right: 0px; margin-left: 0px; transition: var(--transition); margin-bottom: 1rem !important;\">Agreement to Privacy Policy</h5><p class=\"mt-3\" style=\"margin-bottom: 0px; line-height: 24px; margin-right: 0px; margin-left: 0px; font-family: var(--body-font); color: rgba(var(--nw2), 1); margin-top: 0.75rem !important;\">I apologize for any confusion, but as an AI language model, I don\'t have access specific gaming platforms, games, or online services can vary widely depending on the specific company and the jurisdiction they operate in.</p><p class=\"mt-3\" style=\"margin-bottom: 0px; line-height: 24px; margin-right: 0px; margin-left: 0px; font-family: var(--body-font); color: rgba(var(--nw2), 1); margin-top: 0.75rem !important;\">f you\'re looking for the terms and conditions of a particular gaming platform or game recommend visiting the official website of the platform or contacting their customer support. The terms and conditions are usually provided on their website,</p><p class=\"mt-3\" style=\"margin-bottom: 0px; line-height: 24px; margin-right: 0px; margin-left: 0px; font-family: var(--body-font); color: rgba(var(--nw2), 1); margin-top: 0.75rem !important;\">I\'d be happy to provide you with some general information about terms and conditions. terms and conditions of any particular service or organization. The terms and conditions specific company or service you are referring to.</p><p class=\"mt-3\" style=\"margin-bottom: 0px; line-height: 24px; margin-right: 0px; margin-left: 0px; font-family: var(--body-font); color: rgba(var(--nw2), 1); margin-top: 0.75rem !important;\">I\'d be happy to provide you with some general information about terms and conditions. However, please note that I am AI language model, and I don\'t have access to specific terms and conditions of any particular service or organization.</p></div><div class=\"privacy-policy__part\" style=\"color: rgb(182, 182, 182); font-family: Poppins, sans-serif; font-size: 16px; background-color: rgb(31, 31, 31);\"><h5 class=\"mb-4\" style=\"font-weight: 700; line-height: 24px; font-size: 20px; font-family: var(--head-font); padding: 0px; margin-right: 0px; margin-left: 0px; transition: var(--transition); margin-bottom: 1rem !important;\">User Representations</h5><p class=\"mt-4 mb-5\" style=\"line-height: 24px; margin-right: 0px; margin-left: 0px; font-family: var(--body-font); color: rgba(var(--nw2), 1); margin-top: 1rem !important; margin-bottom: 1.25rem !important;\">We use cookies and similar tracking technologies to enhance your experience on our platform and gather information about your interactions with our services.</p><ul class=\"ul-decimal mt-5 d-flex gap-3 flex-column\" style=\"padding: 0px; margin-bottom: 0px; margin-right: 0px; margin-left: 14px; list-style: none; margin-top: 1.25rem !important; gap: 0.75rem !important;\"><li style=\"list-style: decimal; font-size: inherit; line-height: 24px; margin: 0px; font-family: var(--body-font); color: rgba(var(--nw2), 1); font-weight: inherit;\">Acceptance: Users are typically required to agree to the terms and conditions before using a service. button or by simply using the service.</li><li style=\"list-style: decimal; font-size: inherit; line-height: 24px; margin: 0px; font-family: var(--body-font); color: rgba(var(--nw2), 1); font-weight: inherit;\">User rights and responsibilities: The terms and conditions specify the rights granted to users and the responsibilities they have while using the service.</li><li style=\"list-style: decimal; font-size: inherit; line-height: 24px; margin: 0px; font-family: var(--body-font); color: rgba(var(--nw2), 1); font-weight: inherit;\">your reviews should not contain offensive profanity, racist, offensive, or hate language;</li><li style=\"list-style: decimal; font-size: inherit; line-height: 24px; margin: 0px; font-family: var(--body-font); color: rgba(var(--nw2), 1); font-weight: inherit;\">Dispute resolution: Procedures for resolving disputes, such as arbitration or mediation, may be outlined in the terms and conditions.</li><li style=\"list-style: decimal; font-size: inherit; line-height: 24px; margin: 0px; font-family: var(--body-font); color: rgba(var(--nw2), 1); font-weight: inherit;\">Intellectual property: These sections outline the ownership and usage rights of intellectual property such as copyrights, trademarks, and patents associated with the service or content provided.</li></ul><p class=\"mt-5\" style=\"margin-bottom: 0px; line-height: 24px; margin-right: 0px; margin-left: 0px; font-family: var(--body-font); color: rgba(var(--nw2), 1); margin-top: 1.25rem !important;\">Remember that it\'s important to read and understand the specific terms and conditions of any service or product you use. If you have any questions or concerns about a particular set of terms clarification.</p></div><div class=\"privacy-policy__part\" style=\"color: rgb(182, 182, 182); font-family: Poppins, sans-serif; font-size: 16px; background-color: rgb(31, 31, 31);\"><h5 class=\"mb-4\" style=\"font-weight: 700; line-height: 24px; font-size: 20px; font-family: var(--head-font); padding: 0px; margin-right: 0px; margin-left: 0px; transition: var(--transition); margin-bottom: 1rem !important;\">Guideline for Reviews</h5><ul class=\"ul-decimal mt-5 d-flex gap-3 flex-column\" style=\"padding: 0px; margin-bottom: 0px; margin-right: 0px; margin-left: 14px; list-style: none; margin-top: 1.25rem !important; gap: 0.75rem !important;\"><li style=\"list-style: decimal; font-size: inherit; line-height: 24px; margin: 0px; font-family: var(--body-font); color: rgba(var(--nw2), 1); font-weight: inherit;\">you should have firsthand experience with the object being reviewed;</li><li style=\"list-style: decimal; font-size: inherit; line-height: 24px; margin: 0px; font-family: var(--body-font); color: rgba(var(--nw2), 1); font-weight: inherit;\">your reviews should not contain offensive profanity offensive, or hate language;</li><li style=\"list-style: decimal; font-size: inherit; line-height: 24px; margin: 0px; font-family: var(--body-font); color: rgba(var(--nw2), 1); font-weight: inherit;\">your reviews should not contain discriminatory references based on religion, race, gender, national origin, age, marital status, sexual orientation, or disability;</li><li style=\"list-style: decimal; font-size: inherit; line-height: 24px; margin: 0px; font-family: var(--body-font); color: rgba(var(--nw2), 1); font-weight: inherit;\">your reviews should not contain references to illegal activity;</li><li style=\"list-style: decimal; font-size: inherit; line-height: 24px; margin: 0px; font-family: var(--body-font); color: rgba(var(--nw2), 1); font-weight: inherit;\">you may not organize encouraging others to post reviews, whether positive or negative.</li></ul><p class=\"mt-4\" style=\"margin-bottom: 0px; line-height: 24px; margin-right: 0px; margin-left: 0px; font-family: var(--body-font); color: rgba(var(--nw2), 1); margin-top: 1rem !important;\">We may accept, reject, or remove reviews at our sole discretion. We have absolutely no obligation to screen reviews or to delete reviews, even if anyone considers reviews objectionable or inaccurate.</p></div><div class=\"privacy-policy__part\" style=\"color: rgb(182, 182, 182); font-family: Poppins, sans-serif; font-size: 16px; background-color: rgb(31, 31, 31);\"><h5 class=\"mb-4\" style=\"font-weight: 700; line-height: 24px; font-size: 20px; font-family: var(--head-font); padding: 0px; margin-right: 0px; margin-left: 0px; transition: var(--transition); margin-bottom: 1rem !important;\">Social Media</h5><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: 24px; font-family: var(--body-font); color: rgba(var(--nw2), 1);\">\r\nAs part of the functionality of the Site, you may link your account with online accounts you either: providing your Third-Party Account login information through the Site allowing us each Third-Party Account.</p><p class=\"mt-3\" style=\"margin-bottom: 0px; line-height: 24px; margin-right: 0px; margin-left: 0px; font-family: var(--body-font); color: rgba(var(--nw2), 1); margin-top: 0.75rem !important;\">You represent and warrant that you are entitled to disclose your Third-Party Account login you of any of the Terms and Conditions that govern your use of the applicable Third-Party Account, and without obligating us to pay any fees or making us subject to any usage service provider of the Third-Party Account.</p></div>', NULL, NULL, NULL, NULL, NULL, '2025-08-23 16:02:18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '{\"title\":\"Unlocking Potential Through Quality Education\",\"short_description\":\"To comprehend Tron, you might think of any major entertainment conglomerate that creates content across a range of industries. Tron functions like a major studio, with multiple production facilities that are essential for creating content for film, TV, games, animation, design, digital applications, and more. Content creation is our core learning tool. We place our education in outstanding facilities with master instructors and mentors, and we regularly update and realign curriculum to be in lockstep with the most current industry standards. This is all to help students originate, produce, and exhibit their best possible creative and technical work.\\r\\n\\r\\nFrom an education perspective, we are unassailable. Our programs go deep and are immersive, efficient, and transformational. This is no acci-dent. We have an inspired education department expert at curriculum design and preparing industry specialists to be effective instructors. In this, we stand alone.\\r\\n\\r\\nBy developing a well-rounded curriculum of visual, media and performing arts, Tron has created an educational environment that encourages collaboration between its programs of study. With a faculty and advisory board that draws directly from the relevant industries, Tron provides its students with the foundation and mentorship necessary to launch a career. Many Tron gradu\\u0002ates are now successful, creative professionals with credits on major feature films, directorial positions, and successful freelance careers around the world.\",\"our_story\":\"<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur odio natus ab amet provident vel. Officiis pariatur similique, beatae quis quas doloremque iure sint. Esse voluptatibus autem maxime odit illo vitae molestias exercitationem fugiat error tenetur rerum ipsum, cum assumenda. Numquam accusantium quisquam id nobis sequi enim ducimus porro exercitationem iure, facere modi, omnis blanditiis sunt nesciunt? Repellendus numquam illo cum quo non blanditiis voluptas deserunt ab officiis quae obcaecati sapiente, voluptatibus quos ut atque repellat distinctio maiores provident quod ad, sed et neque a consectetur. iste, amet nobis deserunt? Et laborum, ad mollitia quos quae laudantium. Ipsum excepturi fugit,<br><\\/p>\",\"our_mission\":\"Our mission at Toads Academy is to cultivate a new generation of artists and innovators by providing world-class education in Animation, VFX, and Game design. We are committed to delivering hands-on, industry-relevant training, guided by experienced professionals, and infused with the latest technological advancements.\",\"vision\":\"<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis dolores perspiciatis veniam voluptate, aspernatur possimus. Tenetur adipisci odit a, corrupti explicabo aspernatur veniam, officiis nulla tempora qui placeat quasi est non.<br><\\/p>\",\"core_value\":\"<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nulla sed quasi corrupti rerum, soluta iste rem consequuntur itaque non sequi temporibus reiciendis consequatur quos quibusdam fugit ipsum perspiciatis! Explicabo, deserunt. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nulla sed quasi corrupti rerum, soluta iste rem consequuntur itaque non sequi temporibus reiciendis consequatur quos quibusdam fugit ipsum perspiciatis! Explicabo, deserunt.<br><\\/p>\",\"exp_title\":\"15 years experience of Animation industry.\",\"placed_students\":\"12\",\"award_winning\":\"90\",\"toatl_companies\":\"10\",\"exp_description\":\"Tron School Of Animation, Graphics And Artology is the media & entertainment education brand of Tron Education And Research Pvt. Ltd., a global learning solutions provider that commenced its education and training business in 2015. Tron operates through a network of centres worldwide, and has prepared thousands of students for jobs in the media & entertainment industry. The Academy provides quality education in Animation, Visual Effects, Gaming, Filmmaking, Multimedia, Web Design, Graphic Design, AR\\/VR, and more through job-ori\\u0002ented courses. Students at Tron get the opportunity to work in a studio-like environment, practice on industry-specific software, attend course-specific workshops and participate in studio visits.\",\"meta_title\":\"Toads - About\",\"meta_tags\":\"test\",\"meta_description\":\"test\"}', NULL, NULL, '1727779369_\'.jpg', NULL, NULL, '2024-10-05 02:52:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '{\"title\":\"BECOME A TOADS ANIMATION FRANCHISEE\",\"description\":\"<p>Toads Education and Research Pvt. Ltd. is a multi-domain, premium vocational ed-tech training academy and education solutions company which helps teenagers and youth to bring out their creativity so that they become highly paid experts and achieve peace of mind, financial freedom and a career for life.<\\/p><p>Toads Education and Research Pvt. Ltd. has over 7 years of experience and helped in empowering over 7000 students. The corporate office of the academy is in Pune With Focus on imparting education for skill development that enables individual to gain in-depth knowledge well aligned with the latest requirement of the industry. Also, instilling the power of Entrepreneurship in the minds of the young souls to be able to contribute to the development of individuals, society and the country we will in.<br><\\/p>\",\"total_franchise\":\"199\",\"total_staff\":\"100\",\"placed_student\":\"1000\",\"b_title\":\"Together We Build Dreams\",\"b_description\":\"The animation, visual effects, gaming and comics (AVGC) industry has witnessed unprecedented growth rates in recent times. It has seen the entry of many global majors who have tapped into India\\u2019s talent pool for offshore delivery of services\",\"meta_title\":\"1\",\"meta_tags\":\"2\",\"meta_description\":\"3\"}', NULL, NULL, '1728018334_11.jpg', NULL, NULL, '2024-10-05 03:36:27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '{\"phone\":\"0123456789\",\"phone_2\":\"0123456789\",\"email\":\"support@theindiacapital.in\",\"location\":\"India\",\"location_iframe\":\"<iframe src=\\\"https:\\/\\/www.google.com\\/maps\\/embed?pb=!1m18!1m12!1m3!1d242117.70906191418!2d73.69814813607152!3d18.524870616285536!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2bf2e67461101%3A0x828d43bf9d9ee343!2sPune%2C%20Maharashtra!5e0!3m2!1sen!2sin!4v1735818891646!5m2!1sen!2sin\\\" width=\\\"600\\\" height=\\\"450\\\" style=\\\"border:0;\\\" allowfullscreen=\\\"\\\" loading=\\\"lazy\\\" referrerpolicy=\\\"no-referrer-when-downgrade\\\"><\\/iframe>\",\"meta_title\":\"The India Capital\",\"refer_amount\":\"1\",\"meta_tags\":\"TIC\",\"meta_description\":\"THE INDIA CAPITAL\",\"twitter\":\"\\/\",\"facebook\":\"\\/\",\"linkedin\":\"\\/\",\"youtube\":null,\"instagram\":\"\\/\",\"upiid\":\"theindiacapital@ybl\"}', NULL, NULL, '1738139775_logo.png', '1756718083_AccountQRCodeIDFC First Bank - 5081_DARK_THEME (2).png', NULL, '2025-09-01 21:54:39', '1738139775_logo.png', NULL, 'The India Capital', '1023147581', 'IDFC0000001', 'IDFC FIRST', 'BKC - Naman Chambers', 'MUMBAI'),
(6, '{\"title\":\"Toads Placements\",\"description\":\"<p>Toads provides job-oriented graphics, animation, VFX, and multimedia courses and career development training to prepare students for different job roles in the media and entertainment industry globally. Animation studios, gaming studios, publishing houses, TV channels, production houses, and advertising agencies are continuously looking out for photographers, UI designers, gaming experts, animators, filmmakers, website developers, VF X artists, photographers, and graphic designers to work with them. Tron helps such organizations to find skilled and talented individuals who knows the demand of the industry and work as professionals in their respective fields.<br><\\/p>\",\"yt_links\":\"https:\\/\\/www.youtube.com\\/embed\\/es4x5R-rV9s?si=NNqwpwX9gMl-GQKy\",\"meta_title\":\"Toads - Placement\",\"meta_tags\":\"test\",\"meta_description\":\"test\"}', NULL, NULL, '1728456389_1.jpg', NULL, NULL, '2024-10-09 01:25:53', NULL, '1728456389_2.jpg', NULL, NULL, NULL, NULL, NULL, NULL),
(7, '{\"title\":\"The India Capital\",\"sub_title\":null,\"link\":null,\"desc\":\"<div style=\\\"text-align: right;\\\"><br><\\/div>\",\"Our_mission\":null,\"our_vision\":null,\"core_value\":null,\"meta_title\":\"THE INDIA CAPITAL\",\"meta_tags\":\"THE INDIA CAPITAL\",\"meta_description\":\"THE INDIA CAPITAL\"}', NULL, NULL, '1737966330_why_trade.png', '1737964308_2.avif', NULL, '2025-09-04 13:07:27', '1731973105_author-sign.png', '1737566811_9.png', NULL, NULL, NULL, NULL, NULL, NULL),
(8, '{\"title\":\"Large Number of Services Provided\",\"desc\":\"We are a company providing a wide range of maintenance and many other services.\",\"btn\":\"More services\",\"btnurl\":\"https:\\/\\/construction.mywebwork.link\\/about-us\"}', NULL, NULL, NULL, NULL, '2024-11-19 13:50:50', '2024-11-28 17:32:25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, '{\"title\":\"10+ Years of Professional Experience\",\"desc\":\"10+ Years of\\r\\nProfessional Experience\",\"btn\":\"More About\",\"btnurl\":\"https:\\/\\/construction.mywebwork.link\\/about-us\"}', NULL, NULL, NULL, NULL, NULL, '2024-11-28 17:28:27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, '{\"title\":\"A Large Number of Grateful Customers\",\"desc\":\"We have been working for years to improve our skills, to expand the spheres of our work.\",\"btn\":\"More Data\",\"btnurl\":\"https:\\/\\/construction.mywebwork.link\\/about-us\"}', NULL, NULL, NULL, NULL, NULL, '2024-11-28 17:28:27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, '{\"title\":\"Professional Main Services\",\"desc\":\"EAGLE has 10+ years of experience with providing wide area of specialty services works listed below.\",\"btn\":\"werrwe\",\"image\":\"uploads\\/1731987203.jpg\"}', NULL, NULL, NULL, NULL, '2024-11-19 15:33:23', '2024-11-19 15:33:23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, '{\"title\":\"Plumber Services\",\"desc\":\"Plumbing is such a sphere in our houses that requires some\",\"btn\":\"View More\",\"btnurl\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/skillsadd\"}', NULL, NULL, NULL, NULL, '2024-11-19 15:33:23', '2024-11-19 15:33:23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, '{\"title\":\"A Large Number of Grateful Customers\",\"desc\":\"Plumbing is such a sphere in our houses that requires some\",\"btn\":\"View More\",\"btnurl\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/skillsadd\"}', NULL, NULL, NULL, NULL, '2024-11-19 15:33:23', '2024-11-19 15:33:23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, '{\"title\":\"Parivartan\",\"desc\":\"Parivartan\",\"subtitle\":\"Parivartan\",\"title1\":\"Working\",\"desc1\":\"Working\"}', NULL, NULL, '1732067172_event-custom.jpg', NULL, '2024-11-19 17:38:26', '2024-11-20 13:40:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, '{\"title\":\"Hello Yug Parivartan Samiti\",\"desc\":\"Hello Yug Parivartan SamitiHello Yug Parivartan Samiti\",\"subtitle\":\"Hello Yug Parivartan Samiti\"}', NULL, NULL, '1732067334_gallery-1.jpg', NULL, '2024-11-20 13:48:54', '2024-11-20 13:48:54', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, '{\"number1\":\"30\",\"number2\":\"68\",\"number3\":\"99\",\"number4\":\"23\"}', NULL, NULL, NULL, NULL, '2024-11-20 13:38:39', '2025-01-22 11:51:38', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, '{\"title\":\"Our Awards\",\"sub_title\":\"Our Agency Awards & Achievements\",\"desc\":\"<p class=\\\"awards-one__text count-box counted\\\" style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgb(104, 105, 108); position: relative; max-width: 256px; width: 256px; font-family: Rubik, serif; font-size: 16px; background-color: rgb(22, 23, 26);\\\">We\\u2019re Trusted by&nbsp;<span class=\\\"count-text\\\" data-stop=\\\"68000\\\" data-speed=\\\"1500\\\" style=\\\"font-weight: 600; color: var(--treck-base);\\\">68000<\\/span>&nbsp;Satisfied Clients Across the World for Best Jobs Provides<\\/p><ul class=\\\"awards-one__points list-unstyled\\\" style=\\\"margin-bottom: 0px; position: relative; margin-left: 37px; top: 4px; color: rgb(114, 114, 114); font-family: Rubik, serif; font-size: 16px; background-color: rgb(22, 23, 26);\\\"><li style=\\\"position: relative; display: flex; align-items: center;\\\"><div class=\\\"icon\\\" style=\\\"position: relative; display: inline-block; top: 2px;\\\"><span class=\\\"fa fa-check\\\" style=\\\"-webkit-font-smoothing: antialiased; display: inline-block; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; text-rendering: auto; line-height: 1; font-family: var(--fa-style-family,&quot;Font Awesome 6 Free&quot;); font-weight: var(--fa-style,900); --fa: &quot;\\\\f00c&quot;; position: relative; font-size: 20px; color: var(--treck-base);\\\"><\\/span><\\/div><div class=\\\"text\\\" style=\\\"margin-left: 10px;\\\"><p style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: var(--treck-white);\\\">Professional Consultants<\\/p><\\/div><\\/li><li style=\\\"position: relative; display: flex; align-items: center;\\\"><div class=\\\"icon\\\" style=\\\"position: relative; display: inline-block; top: 2px;\\\"><span class=\\\"fa fa-check\\\" style=\\\"-webkit-font-smoothing: antialiased; display: inline-block; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; text-rendering: auto; line-height: 1; font-family: var(--fa-style-family,&quot;Font Awesome 6 Free&quot;); font-weight: var(--fa-style,900); --fa: &quot;\\\\f00c&quot;; position: relative; font-size: 20px; color: var(--treck-base);\\\"><\\/span><\\/div><div class=\\\"text\\\" style=\\\"margin-left: 10px;\\\"><p style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: var(--treck-white);\\\">100% Job Guarantee<\\/p><\\/div><\\/li><li style=\\\"position: relative; display: flex; align-items: center;\\\"><div class=\\\"icon\\\" style=\\\"position: relative; display: inline-block; top: 2px;\\\"><span class=\\\"fa fa-check\\\" style=\\\"-webkit-font-smoothing: antialiased; display: inline-block; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; text-rendering: auto; line-height: 1; font-family: var(--fa-style-family,&quot;Font Awesome 6 Free&quot;); font-weight: var(--fa-style,900); --fa: &quot;\\\\f00c&quot;; position: relative; font-size: 20px; color: var(--treck-base);\\\"><\\/span><\\/div><div class=\\\"text\\\" style=\\\"margin-left: 10px;\\\"><p style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: var(--treck-white);\\\">Affordable Fees<\\/p><\\/div><\\/li><\\/ul>\",\"meta_title\":\"Bhagayodhan founction\",\"meta_tags\":\"Bhagayodhan founction\",\"meta_description\":\"Bhagayodhan founction\"}', NULL, NULL, '1737567276_awards-1-1.png', '1737567276_awards-1-3.png', NULL, '2025-01-23 05:10:56', NULL, '1737567276_awards-1-2.png', NULL, NULL, NULL, NULL, NULL, NULL),
(18, '{\"title\":null,\"sub_title\":null,\"desc\":null}', NULL, NULL, '1737971082_trade_on.png', NULL, NULL, '2025-09-10 12:47:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, '{\"main_title\":\"Millions of Users In India\",\"main_sub_title\":null,\"title\":null,\"desc\":null,\"video_url\":null}', NULL, NULL, NULL, NULL, NULL, '2025-09-10 12:48:04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, '{\"title\":\"Invest your money with higher return\",\"sub_title\":null,\"link\":null}', NULL, NULL, '1737973014_1.png', NULL, NULL, '2025-09-10 12:46:07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, '{\"title\":null,\"sub_title\":null,\"year\":null,\"year_2\":null,\"title_2\":null,\"sub_title_2\":null,\"year_3\":null,\"title_3\":null,\"sub_title_3\":null,\"year_4\":null,\"title_4\":null,\"sub_title_4\":null,\"year_5\":null,\"title_5\":null,\"sub_title_5\":null,\"year_6\":null,\"title_6\":null,\"sub_title_6\":null}', NULL, NULL, NULL, NULL, NULL, '2025-09-09 13:12:57', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `withdraw`
--

CREATE TABLE `withdraw` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `invest_id` bigint(20) UNSIGNED DEFAULT NULL,
  `package_id` int(11) DEFAULT NULL,
  `amount` text DEFAULT NULL,
  `status` enum('pending','complete','reject') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `amount_cut` enum('N','Y') NOT NULL DEFAULT 'N',
  `remark` text DEFAULT NULL,
  `utr` text DEFAULT NULL,
  `verify_time` datetime DEFAULT NULL,
  `type` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `withdraw`
--

INSERT INTO `withdraw` (`id`, `userid`, `invest_id`, `package_id`, `amount`, `status`, `created_at`, `updated_at`, `reason`, `amount_cut`, `remark`, `utr`, `verify_time`, `type`) VALUES
(74, 100, NULL, 0, '1000', 'complete', '2025-09-02 14:49:54', '2025-09-02 14:50:40', '1234', 'Y', 'Done', '254620356989', '2025-09-02 14:50:40', 'invest'),
(75, 101, NULL, 0, '10000', 'complete', '2025-09-02 22:00:00', '2025-09-02 22:02:18', 'Perrsonal use', 'Y', 'payment done', '365215485635', '2025-09-02 22:02:18', 'invest'),
(76, 101, NULL, 0, '400', 'complete', '2025-09-08 14:06:46', '2025-09-08 14:07:29', 'refferal', 'Y', 'payment done', '659632541258', '2025-09-08 14:07:29', 'invest');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `best_our_service`
--
ALTER TABLE `best_our_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogcomments`
--
ALTER TABLE `blogcomments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commission_histories`
--
ALTER TABLE `commission_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commission_histories_referrer_id_foreign` (`referrer_id`),
  ADD KEY `commission_histories_user_id_foreign` (`user_id`),
  ADD KEY `commission_histories_invest_id_foreign` (`invest_id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_payment`
--
ALTER TABLE `customer_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_interest_rates`
--
ALTER TABLE `custom_interest_rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invested`
--
ALTER TABLE `invested`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invested_userid_foreign` (`userid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pagesettings`
--
ALTER TABLE `pagesettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pakeges`
--
ALTER TABLE `pakeges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pnl_history`
--
ALTER TABLE `pnl_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pnl_history_userid_foreign` (`userid`);

--
-- Indexes for table `process`
--
ALTER TABLE `process`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webinfo`
--
ALTER TABLE `webinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraw`
--
ALTER TABLE `withdraw`
  ADD PRIMARY KEY (`id`),
  ADD KEY `withdraw_userid_foreign` (`userid`),
  ADD KEY `withdraw_invest_id_foreign` (`invest_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `best_our_service`
--
ALTER TABLE `best_our_service`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blogcomments`
--
ALTER TABLE `blogcomments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `commission_histories`
--
ALTER TABLE `commission_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer_payment`
--
ALTER TABLE `customer_payment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `custom_interest_rates`
--
ALTER TABLE `custom_interest_rates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=269;

--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `invested`
--
ALTER TABLE `invested`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `pagesettings`
--
ALTER TABLE `pagesettings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pakeges`
--
ALTER TABLE `pakeges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pnl_history`
--
ALTER TABLE `pnl_history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `process`
--
ALTER TABLE `process`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `webinfo`
--
ALTER TABLE `webinfo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `withdraw`
--
ALTER TABLE `withdraw`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commission_histories`
--
ALTER TABLE `commission_histories`
  ADD CONSTRAINT `commission_histories_invest_id_foreign` FOREIGN KEY (`invest_id`) REFERENCES `invested` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `commission_histories_referrer_id_foreign` FOREIGN KEY (`referrer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `commission_histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `invested`
--
ALTER TABLE `invested`
  ADD CONSTRAINT `invested_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pnl_history`
--
ALTER TABLE `pnl_history`
  ADD CONSTRAINT `pnl_history_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `withdraw`
--
ALTER TABLE `withdraw`
  ADD CONSTRAINT `withdraw_invest_id_foreign` FOREIGN KEY (`invest_id`) REFERENCES `invested` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `withdraw_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
