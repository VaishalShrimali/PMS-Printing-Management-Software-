-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2023 at 08:57 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'kamlesh', 'kamlesh@gmail.com', '$2y$10$nasnrC65aaaTkYUWnTlS3OVKyXULHDiFzHO9AZxpa1jDEc2f8qKTG', '2021-12-21 01:55:32', '2021-12-21 01:55:32'),
(2, 'jay', 'jay@gmail.com', '$2y$10$nasnrC65aaaTkYUWnTlS3OVKyXULHDiFzHO9AZxpa1jDEc2f8qKTG', '2021-12-21 01:55:32', '2021-12-21 01:55:32'),
(3, 'Vaishal', 'vaishal@gmail.com', '$2y$10$scCBUg4OPgZPH2yDhfVBMeK0h3NBK1zlsSxsdDEiV.HOdWCkvgEWC', '2023-04-20 00:35:11', '2023-04-20 00:35:11'),
(4, 'Tushar', 'mohite@gmail.com', '$2y$10$Hr4ouBvIxmn7.YrRmTe/PuAZLyW7t1JpjgfwpgOVNh7VslQtCCLFq', '2023-04-23 23:45:36', '2023-04-23 23:45:36');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `dispatch_time` varchar(200) NOT NULL,
  `category_img` text NOT NULL,
  `date_at` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `dispatch_time`, `category_img`, `date_at`, `created_at`, `updated_at`) VALUES
(1, 'Visiting Cards', '2-3 Days', '1677671758-VCC.jpg', '01-03-2023 11:55:58', '2023-03-01 06:25:58', '2023-03-02 01:19:03'),
(2, 'Pamphlets / Posters', '1-2 Days', '1677746036-aa.jpg', '02-03-2023 08:33:56', '2023-03-02 03:03:56', '2023-03-02 03:03:56'),
(3, 'Digital Paper Printing', '1 Day', '1678791181-Digital Paper Printing.jpeg', '14-03-2023 10:53:01', '2023-03-14 05:23:01', '2023-03-14 05:23:01'),
(4, 'Printed Pens', '4-7 Days', '1678791259-PenNewjfj.jpg', '14-03-2023 10:54:19', '2023-03-14 05:24:19', '2023-03-14 05:24:19'),
(5, 'ATM Pouch', '3-7 Days', '1678791308-ATM 02.png', '14-03-2023 10:55:08', '2023-03-14 05:25:08', '2023-03-14 05:25:08'),
(6, 'solvent print', 'same day', '1679036075-IMG-617a9ab881b277.61027537.jpg', '17-03-2023 06:54:35', '2023-03-17 01:24:35', '2023-03-17 01:24:35'),
(7, 'canopy', '2', '1679036445-IMG-617a9ab881b277.61027537.jpg', '17-03-2023 07:00:45', '2023-03-17 01:30:45', '2023-03-17 01:30:45');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_12_21_060353_create_admins_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `dealer_name` varchar(255) DEFAULT NULL,
  `shop_name` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `product` varchar(255) DEFAULT NULL,
  `height` varchar(255) DEFAULT NULL,
  `width` varchar(255) DEFAULT NULL,
  `length` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `total_area` varchar(255) DEFAULT NULL,
  `measurement_type` varchar(255) DEFAULT NULL,
  `rate` varchar(255) DEFAULT NULL,
  `total` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `printing` varchar(255) DEFAULT NULL,
  `cutting` varchar(255) DEFAULT NULL,
  `lamination` varchar(255) DEFAULT NULL,
  `pasting` varchar(255) DEFAULT NULL,
  `installation` varchar(255) DEFAULT NULL,
  `delivery` varchar(255) DEFAULT NULL,
  `order_mode` enum('B2B','B2C') DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('Completed','Pending') NOT NULL DEFAULT 'Pending',
  `assined` int(10) NOT NULL DEFAULT 1,
  `order_rec_by` int(11) NOT NULL,
  `contact` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `dealer_name`, `shop_name`, `address`, `product`, `height`, `width`, `length`, `area`, `total_area`, `measurement_type`, `rate`, `total`, `quantity`, `printing`, `cutting`, `lamination`, `pasting`, `installation`, `delivery`, `order_mode`, `image`, `status`, `assined`, `order_rec_by`, `contact`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Dealer Name', NULL, 'Sasa', '1', '12', '12', '11', '1584', '194832', 'inch', '12', '2337984', '123', 'Solvent Printing', 'Router Cutting', '16inch lamination', 'Paper Pasting', 'Outside Installation', 'Home', 'B2B', '1677306758-pexels-sebastiaan-stam-1097456.jpg', 'Pending', 3, 1, NULL, NULL, '2023-02-22 04:09:50', '2023-04-10 23:05:54'),
(4, 'Jay', 'DWW', 'Akgh', '1', '11', '1521', NULL, NULL, NULL, NULL, NULL, NULL, '11', 'Solvent Printing', 'Laser Cutting', '16inch lamination', 'Subboard Pasting', 'Side Installation', 'Home', 'B2B', '1678078397-angelo.jpg', 'Pending', 3, 1, NULL, NULL, '2023-03-05 23:23:17', '2023-03-05 23:23:46'),
(5, 'Jayraj', 'DWS', 'Aknfk', '1', '1', '2', NULL, NULL, NULL, NULL, NULL, NULL, '2', 'Solvent Printing', 'Laser Cutting', '16inch lamination', 'Subboard Pasting', 'Side Installation', 'Home', 'B2B', '1678080926-visa.png', 'Pending', 4, 1, NULL, NULL, '2023-03-06 00:05:26', '2023-03-06 00:36:16'),
(6, 'Kamlesh', 'Dww', 'dww', '1', '11', '21', NULL, NULL, NULL, NULL, NULL, NULL, '3', 'HP Latex', 'Laser Cutting', '16inch lamination', 'Subboard Pasting', 'Side Installation', 'Office', 'B2B', '1678096998-IMG-617a9ab881b277.61027537.jpg', 'Pending', 4, 1, NULL, NULL, '2023-03-06 04:33:18', '2023-03-06 05:34:16'),
(7, 'John Doe', 'w3 schools', 'New York , USA', '1', '15', '19', NULL, NULL, NULL, NULL, NULL, NULL, '6', 'Desolvent Prinrting', 'Laser Cutting', '18inch lamination', 'Paper Pasting', 'Side Installation', 'Home', 'B2B', '1678102188-webd.jpg', 'Completed', 9, 1, NULL, NULL, '2023-03-06 05:59:48', '2023-03-06 06:26:48'),
(8, 'Dummy', 'PMS', 'Vadodara', '1', '11', '12', NULL, NULL, NULL, NULL, NULL, NULL, '11', 'Solvent Printing', 'Laser Cutting', '16inch lamination', 'Subboard Pasting', 'Side Installation', 'Home', 'B2B', '1678181717-IMG-617a9ab881b277.61027537.jpg', 'Pending', 4, 1, NULL, NULL, '2023-03-07 04:05:17', '2023-03-07 04:12:07'),
(9, 'Jayraj Customer', NULL, 'New York,USA', '1', '11', '16', NULL, NULL, NULL, NULL, NULL, NULL, '4', 'Solvent Printing', 'Laser Cutting', '16inch lamination', 'Subboard Pasting', 'Side Installation', 'Home', 'B2C', '1679303129-Velvet.jpg', 'Pending', 1, 1, '9586413781', 'agrawaljayraj203@gmail.com', '2023-03-20 03:35:29', '2023-03-20 03:35:29'),
(10, 'Jayraj Customer', NULL, 'USA', '1', '11', '16', NULL, NULL, NULL, NULL, NULL, NULL, '4', 'Desolvent Printing', 'Router Cutting', '18inch lamination', 'Paper Pasting', 'Outside Installation', 'Office', 'B2C', '1679303272-ATM 02.png', 'Pending', 1, 1, '9586413711', 'jay@digitalwebweaver.com', '2023-03-20 03:37:52', '2023-03-20 03:37:52'),
(11, 'Dealr Name', NULL, 'Vadodara', '1', '12', '12', '11', '1584', NULL, 'inch', '110', '1210', '11', 'Solvent Printing', 'Router Cutting', '16inch lamination', 'Subboard Pasting', 'Side Installation', 'Home', 'B2B', '1680514283-1677298801-dummy.jpg', 'Pending', 1, 1, NULL, NULL, '2023-04-03 04:01:23', '2023-04-03 04:19:41'),
(13, 'Tushar', NULL, 'Vadodara', '5', '11', '11', '11', '1331', NULL, 'inch', '120', '1320', '11', 'Solvent Printing', 'Laser Cutting', '16inch lamination', 'Subboard Pasting', 'Side Installation', 'Home', 'B2C', '1680522662-WhatsApp Image 2023-02-28 at 1.22.13 PM.jpeg', 'Pending', 1, 1, '7845129637', 'shivam@gmail.com', '2023-04-03 06:21:03', '2023-04-03 06:21:03'),
(14, 'aa', NULL, 'Vadodara', '3', '11', '11', '11', '1331', NULL, 'inch', '120', '1320', '11', 'Solvent Printing', 'Laser Cutting', '16inch lamination', 'Subboard Pasting', 'Side Installation', 'Home', 'B2C', '1680523576-Untitledwd-1.png', 'Pending', 1, 1, '7845129637', 'tushar@gmail.com', '2023-04-03 06:36:16', '2023-04-03 06:36:16'),
(15, 'Monday', NULL, 'address', '2', '11', '11', '0', '121', '1210', 'cm', '12', '14520', '10', 'Solvent Printing', 'Laser Cutting', '16inch lamination', 'Paper Pasting', 'Side Installation', 'Office', 'B2B', '1681103864-bootstrap-logo-png-open-2000.png', 'Pending', 1, 1, NULL, NULL, '2023-04-09 23:47:44', '2023-04-09 23:52:01'),
(17, 'Demoi', NULL, 'wertgkb2gjh', '1', '20', '20', '20', '8000', '160000', 'inch', '50', '8000000', '20', 'Solvent Printing', 'Laser Cutting', '16inch lamination', 'Subboard Pasting', 'Side Installation', 'Home', 'B2B', '1682080442-04_1 Flyer DL Flyer.jpg', 'Pending', 3, 1, NULL, NULL, '2023-04-21 07:04:02', '2023-04-21 07:10:12'),
(18, 'Testing', NULL, 'tested wehflwef', '1', '20', '20', '20', '8000', '400000', 'inch', '90', '36000000', '50', 'Solvent Printing', 'Laser Cutting', '16inch lamination', 'Paper Pasting', 'Side Installation', 'Office', 'B2B', '1682142497-01_1 Flyer A4.jpg', 'Pending', 3, 1, NULL, NULL, '2023-04-22 00:18:17', '2023-04-22 00:19:44'),
(19, 'Tushar Mohite', NULL, 'Surat', '1', '11', '11', '11', '1331', '15972', 'inch', '12', '191664', '12', 'Solvent Printing', 'Laser Cutting', '16inch lamination', 'Subboard Pasting', 'Side Installation', 'Home', 'B2B', '1682310728-07_1 Visiting Card.jpg', 'Pending', 9, 1, NULL, NULL, '2023-04-23 23:02:08', '2023-04-23 23:09:10'),
(20, 'Temp', NULL, 'Vadodara', '1', '11', '11', '11', '1331', '15972', 'inch', '12', '191664', '12', 'Solvent Printing', 'Laser Cutting', '16inch lamination', 'Subboard Pasting', 'Outside Installation', 'Home', 'B2B', '1682404944-25_1 Table Menu.jpg|1682404944-26_1 Outdoor Banners - Copy.jpg|1682404944-26_1 Outdoor Banners.jpg|1682404944-27_1 Outdoor A Frame.jpg', 'Pending', 3, 1, NULL, NULL, '2023-04-24 23:16:25', '2023-04-25 04:43:41');

-- --------------------------------------------------------

--
-- Table structure for table `order_manage`
--

CREATE TABLE `order_manage` (
  `id` int(11) NOT NULL,
  `fstaff_id` int(11) NOT NULL,
  `frole_id` int(11) NOT NULL,
  `forder_id` int(11) NOT NULL,
  `status` enum('Pending','Approved','Requested','Completed') NOT NULL DEFAULT 'Pending',
  `created_at` varchar(70) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_manage`
--

INSERT INTO `order_manage` (`id`, `fstaff_id`, `frole_id`, `forder_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 1, 'Approved', '2023-03-03 09:45:38', '2023-04-03 00:29:05'),
(2, 2, 3, 4, 'Requested', '2023-03-06 04:53:46', '2023-03-06 05:29:49'),
(4, 2, 3, 5, 'Completed', '2023-03-06 05:50:25', '2023-03-06 00:36:16'),
(6, 3, 4, 5, 'Approved', '2023-03-06 06:06:16', '2023-03-06 04:26:02'),
(7, 2, 3, 6, 'Completed', '2023-03-06 10:11:16', '2023-03-06 05:34:16'),
(8, 3, 4, 6, 'Pending', '2023-03-06 11:04:16', '2023-03-06 05:34:16'),
(9, 2, 3, 7, 'Completed', '2023-03-06 11:31:52', '2023-03-06 06:02:49'),
(10, 3, 4, 7, 'Completed', '2023-03-06 11:32:49', '2023-03-06 06:23:04'),
(11, 4, 5, 7, 'Completed', '2023-03-06 11:53:04', '2023-03-06 06:23:57'),
(12, 5, 6, 7, 'Completed', '2023-03-06 11:53:57', '2023-03-06 06:24:37'),
(13, 6, 7, 7, 'Completed', '2023-03-06 11:54:37', '2023-03-06 06:25:13'),
(14, 7, 8, 7, 'Completed', '2023-03-06 11:55:13', '2023-03-06 06:25:57'),
(15, 8, 9, 7, 'Completed', '2023-03-06 11:55:57', '2023-03-06 06:26:48'),
(16, 2, 3, 8, 'Completed', '2023-03-07 09:36:03', '2023-03-07 04:12:07'),
(17, 3, 4, 8, 'Approved', '2023-03-07 09:42:07', '2023-03-07 04:14:24'),
(18, 2, 3, 17, 'Pending', '2023-04-21 12:40:12', '2023-04-21 07:10:12'),
(19, 2, 3, 18, 'Requested', '2023-04-22 05:49:44', '2023-04-22 00:20:13'),
(20, 2, 3, 18, 'Pending', '2023-04-24 04:28:39', '2023-04-23 22:58:39'),
(21, 2, 3, 19, 'Completed', '2023-04-24 04:33:21', '2023-04-23 23:04:47'),
(22, 3, 4, 19, 'Completed', '2023-04-24 04:34:47', '2023-04-23 23:06:36'),
(23, 4, 5, 19, 'Completed', '2023-04-24 04:36:36', '2023-04-23 23:07:16'),
(24, 5, 6, 19, 'Completed', '2023-04-24 04:37:16', '2023-04-23 23:07:56'),
(25, 6, 7, 19, 'Completed', '2023-04-24 04:37:56', '2023-04-23 23:08:33'),
(26, 7, 8, 19, 'Completed', '2023-04-24 04:38:33', '2023-04-23 23:09:10'),
(27, 8, 9, 19, 'Pending', '2023-04-24 04:39:10', '2023-04-23 23:09:10'),
(28, 2, 3, 20, 'Pending', '2023-04-25 10:13:41', '2023-04-25 04:43:41');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `sub_category` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `height` varchar(255) NOT NULL,
  `width` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `gst` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `min_amount` varchar(255) NOT NULL,
  `max_amount` varchar(255) NOT NULL,
  `remark` text DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `rate` varchar(255) NOT NULL,
  `product_status` enum('Published','Unpublished') NOT NULL DEFAULT 'Unpublished',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `category`, `sub_category`, `size`, `height`, `width`, `area`, `gst`, `total`, `image`, `min_amount`, `max_amount`, `remark`, `quantity`, `rate`, `product_status`, `updated_at`, `created_at`) VALUES
(1, 'Gold Foil Cards Without Die', '1', '1', 'Inches', '11', '50', '521', '18', '116', '1677747605-IMG-617a9ab881b277.61027537.jpg', '110', '120', NULL, NULL, '500', 'Unpublished', '2023-03-02 03:30:05', '2023-03-02 03:30:05'),
(2, 'printed canopy', '7', '9', 'Inches', '10', '10', '10', '10', '10', '1679036568-georgi.jpg', '10', '10', 'fgejerwogt', NULL, '10', 'Unpublished', '2023-03-17 01:32:48', '2023-03-17 01:32:48'),
(3, 'Temp_Product', '1', '1', 'Inches', '12', '12', '144', '12', '13.44', '1680516432-Untitledwd-1.png', '120', '150', 'aassaasd', NULL, '1200', 'Published', '2023-04-03 04:37:12', '2023-04-03 04:37:12'),
(4, 't1', '2', '7', 'Inches', '150', '180', '27000', '18', '23.6', '1680517025-1677241088-beautiful_nature_landscape_05_hd_picture_166223.jpg', '20', '26', 'jhgkjyuyt', NULL, '20', 'Published', '2023-04-03 04:47:05', '2023-04-03 04:47:05'),
(5, 'Remote', '1', '5', 'Inches', '125', '48', '6000', '18', '277.3', '1680521384-1677299093-beautiful_nature_landscape_05_hd_picture_166223.jpg', '250', '300', '4t3y3y335hy35hy4jh46tjh4j4qjhhq4jhh66ju57o57ikirjhhdhfgjfhjfdhdh', NULL, '235', 'Published', '2023-04-03 05:59:44', '2023-04-03 05:59:44'),
(6, 'test', '1', '2', 'Sq ft', '12', '12', '144', '12', '13.44', '1681193819-Untitledwd-1 (2).png', '120', '160', 'qqqq', NULL, '12', 'Published', '2023-04-11 00:46:59', '2023-04-11 00:46:59'),
(7, 'test23', '7', '9', 'Inches', '20', '20', '400', '18', '59', '1682144488-04_1 Flyer DL Flyer.jpg', '55', '70', 'wegwjgliwhrlih3r5', NULL, '50', 'Published', '2023-04-22 00:52:26', '2023-04-22 00:51:28');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role`, `updated_at`, `created_at`) VALUES
(1, 'Administrator', '2023-03-07 04:35:15', '2023-02-21 04:33:44'),
(3, 'DESIGNING', '2023-02-21 05:20:20', '2023-02-21 05:20:20'),
(4, 'PRINTING', '2023-02-21 05:20:43', '2023-02-21 05:20:43'),
(5, 'CUTTING', '2023-02-21 05:21:26', '2023-02-21 05:21:26'),
(6, 'LAMINATION', '2023-02-21 05:21:49', '2023-02-21 05:21:49'),
(7, 'PASTING', '2023-02-21 05:22:33', '2023-02-21 05:22:33'),
(8, 'INSTALLATION', '2023-02-21 05:23:19', '2023-02-21 05:23:19'),
(11, 'Delivery1', '2023-04-23 23:43:21', '2023-04-23 23:43:13');

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `f_roleid` varchar(200) NOT NULL,
  `date_at` varchar(100) NOT NULL,
  `status` enum('Block','Active') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`id`, `name`, `email`, `password`, `f_roleid`, `date_at`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Tushar Mohite', 'tushar@gmail.com', '$2y$10$XOPTZeTaBc8bh9kH0qovdepxRohAPT57auePFh6vIMj/HQhOjSlTy', '1', '28-02-2023 10:53:32', 'Active', '2023-02-28 05:23:32', '2023-04-21 07:03:01'),
(2, 'Designer', 'designer@gmail.com', '$2y$10$niGO.pCqToew4MDBauZYSODW8uml0Jf4nQ.8GSf3j9FpWCDDZ7NTi', '3', '28-02-2023 11:04:40', 'Active', '2023-02-28 05:34:40', '2023-02-28 05:34:40'),
(3, 'Printer', 'printer@gmail.com', '$2y$10$5pni0PmbbQMNrFlkbh/kEOelU.hniIV/KgD9Jg7EYGXSWDb86LyxS', '4', '06-03-2023 05:50:04', 'Active', '2023-03-06 00:20:04', '2023-03-06 00:20:04'),
(4, 'Cutter', 'cutter@gmail.com', '$2y$10$/TYY5/jemss29k7xta0xcuG0T.JClSpJ7rgyAr5A1Ji0ol7zecd8y', '5', '06-03-2023 11:17:39', 'Active', '2023-03-06 05:47:39', '2023-03-06 05:47:39'),
(5, 'Laminator', 'laminator@gmail.com', '$2y$10$RUUKtveiKNVOAbshq0Jb6uu2GXmyZQ7VEkadi1J/0DrDYKMLRvKN2', '6', '06-03-2023 11:18:04', 'Active', '2023-03-06 05:48:04', '2023-03-06 05:48:04'),
(6, 'Paster', 'paster@gmail.com', '$2y$10$yxeze/blsSjymFKiu6NU5eAWmb5KO/S5Zhp4ZT/qCwalv4Y3ejwj.', '7', '06-03-2023 11:18:29', 'Active', '2023-03-06 05:48:29', '2023-03-06 05:48:29'),
(7, 'Installer', 'installer@gmail.com', '$2y$10$N8Vcl51.sxb/eLRzJNaeAOktyGApZU7lRE3ZGeXt67cU2CjioZh92', '8', '06-03-2023 11:18:56', 'Active', '2023-03-06 05:48:56', '2023-03-06 05:48:56'),
(8, 'Deliver', 'deliver@gmail.com', '$2y$10$Zb7CeA/FRyBMacqyCOo4UuaNPyBoaPFn7pHeIZWOUBrGE2xwADYCa', '9', '06-03-2023 11:19:21', 'Active', '2023-03-06 05:49:21', '2023-03-06 05:49:21'),
(9, 'cutter2', 'cutter2@gmail.com', '$2y$10$HaOCX/nX9SoLG00JOIMgSOkNKdNhCJfXMne9bqLv6u4FRpQ6esISq', '5', '07-03-2023 10:00:34', 'Active', '2023-03-07 04:30:34', '2023-03-07 04:30:34'),
(10, 'Design2', 'designer2@gmail.com', '$2y$10$s4dMSi5ZxbHWo4ezUv6dBuci4.zBGzHzsRD542RM4WAebchIDrlvu', '3', '20-03-2023 06:03:15', 'Active', '2023-03-20 00:33:15', '2023-03-20 00:33:15'),
(12, 'martin', 'martin@gmail.com', '$2y$10$1ZCGcSFNnA0yDM.KDfNJBuY0/SUowsQCxRNPNR1ASVgqfqOrVEh2C', '7', '22-04-2023 05:55:51', 'Active', '2023-04-22 00:25:51', '2023-04-22 00:33:08'),
(13, 'Cutting Person', 'cutting2@gmail.com', '$2y$10$.8rmXlv/NxzI/nlVK3kZsuaKfWTlbi5McslzX0SstxYtzbQhF4ru6', '5', '24-04-2023 04:42:16', 'Active', '2023-04-23 23:12:16', '2023-04-23 23:12:16'),
(14, 'Temp_Staff', 'temp_staff@gmail.com', '$2y$10$Q1mv9yg74/xPUoQ54lHCquamLN6rU.2fJsKYINhgB6d81Id.3kVb6', '11', '24-04-2023 05:14:04', 'Active', '2023-04-23 23:44:04', '2023-04-23 23:44:26');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(11) NOT NULL,
  `sname` varchar(200) NOT NULL,
  `dispatch_time` varchar(200) NOT NULL,
  `scat_img` text NOT NULL,
  `f_catid` int(150) NOT NULL,
  `date_at` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `sname`, `dispatch_time`, `scat_img`, `f_catid`, `date_at`, `created_at`, `updated_at`) VALUES
(1, 'Gold Foil Cards', '3-6 Days', '1677738672-Gold uv india 3.jpg', 1, '02-03-2023 06:31:12', '2023-03-02 01:01:12', '2023-03-02 01:01:12'),
(2, 'UV Cards', '2-4 Days', '1677739571-UV Card 44.jpg', 1, '02-03-2023 06:46:11', '2023-03-02 01:16:11', '2023-03-02 01:16:11'),
(3, 'Texture Cards', '2-4 Days', '1677739659-Texture card 02.jpg', 1, '02-03-2023 06:47:39', '2023-03-02 01:17:39', '2023-03-02 01:17:39'),
(4, 'NT / PVC Cards', '2-5 Days', '1677739707-PVC.jpg', 1, '02-03-2023 06:48:27', '2023-03-02 01:18:27', '2023-03-02 01:18:27'),
(5, 'Velvet Lamination Cards', '2-4 Days', '1677739780-Velvet.jpg', 1, '02-03-2023 06:49:40', '2023-03-02 01:19:40', '2023-03-02 01:19:40'),
(6, 'Matt Lamination Cards', '2-4 Days', '1677739811-Matt.jpg', 1, '02-03-2023 06:50:11', '2023-03-02 01:20:11', '2023-03-02 01:20:11'),
(7, 'Pamphlet - 70 GSM, Maplitho', '1-2 Days', '1677746120-Club Papmhlet.jpg', 2, '02-03-2023 08:35:20', '2023-03-02 03:05:20', '2023-03-02 03:05:20'),
(8, 'normal flex', 'same day', '1679036143-IMG-617a973552fa32.26573540.jpg', 6, '17-03-2023 06:55:43', '2023-03-17 01:25:43', '2023-03-17 01:25:43'),
(9, 'printed canopy', '2', '1679036476-IMG-617a9ab881b277.61027537.jpg', 7, '17-03-2023 07:01:16', '2023-03-17 01:31:16', '2023-03-17 01:31:16'),
(10, 'test2', '2', '1682144105-03_1 Flyer A6.jpg', 6, '22-04-2023 06:15:05', '2023-04-22 00:45:05', '2023-04-22 00:45:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_manage`
--
ALTER TABLE `order_manage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `order_manage`
--
ALTER TABLE `order_manage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
