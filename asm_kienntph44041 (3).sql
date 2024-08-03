-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 03, 2024 at 09:02 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asm_kienntph44041`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `description`, `image_path`, `link`, `active`, `created_at`, `updated_at`) VALUES
(3, 'hi', 'ffffff', 'banners/x7uUDc3APrPGjID1UNxfgLiEzGUOjwVF2iG9W0lw.jpg', 'http://asm_kienntph44041.test/admin/banners/create', 1, '2024-08-03 00:28:00', '2024-08-03 00:29:49'),
(4, 'kien', 'dddd', 'banners/F6XNq928M6XufNMBQwGepn1JHWMPJ8fpdIyMmGsX.jpg', 'http://localhost/phpmyadmin/index.php?route=/table/change&db=asm_kienntph44041&table=banners', 1, '2024-08-03 00:30:10', '2024-08-03 00:30:10');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2024-08-01 23:06:14', '2024-08-01 23:06:14'),
(2, 5, '2024-08-02 07:47:07', '2024-08-02 07:47:07'),
(3, 6, '2024-08-02 12:01:03', '2024-08-02 12:01:03'),
(4, 4, '2024-08-02 13:41:18', '2024-08-02 13:41:18');

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` bigint UNSIGNED NOT NULL,
  `cart_id` bigint UNSIGNED NOT NULL,
  `product_variant_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`id`, `cart_id`, `product_variant_id`, `quantity`, `created_at`, `updated_at`) VALUES
(10, 3, 17, 1, '2024-08-02 12:01:13', '2024-08-02 12:01:13'),
(11, 4, 4, 118, '2024-08-02 13:41:18', '2024-08-03 01:11:35'),
(12, 3, 4, 146, '2024-08-02 18:51:59', '2024-08-02 20:29:32'),
(15, 2, 4, 3, '2024-08-02 22:52:45', '2024-08-03 00:48:28');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `cover`, `is_active`, `created_at`, `updated_at`) VALUES
(11, 'Quần jean', 'categories/CUdtYey2BWEL0C8z1uhkxgJEn0ArIALFDVO11EHO.jpg', 1, '2024-07-27 10:46:32', '2024-07-29 11:06:11'),
(12, 'Quần kaki', 'categories/FPlNblR2c0MEbDMNCmvdtvt9OCspzqZvdCjiScva.jpg', 1, '2024-07-27 10:46:32', '2024-07-29 11:05:42'),
(13, 'Áo phông', 'categories/6QYE8fyw01bJjY9Y1G2aTkwmNXavZXyz4sRekKRk.jpg', 1, '2024-07-27 10:46:32', '2024-07-29 11:04:57'),
(14, 'Quần thể thao', 'categories/Bd976cyB8i8ejDxeUWkWPbAbRjT8KQW55hRF8mHJ.jpg', 1, '2024-07-27 10:46:32', '2024-07-29 11:04:39'),
(16, 'Áo sơ mi', 'categories/ME72H5QV4VPlvRrEnAUDOOMuN1WpFQcLS7w5IFDK.jpg', 1, '2024-07-27 10:46:32', '2024-07-29 11:02:32'),
(19, 'Quần Âu', 'categories/eqVJH4XZVTf23egJSN1zdXI92HTaYKNOJNUPxcCG.jpg', 1, '2024-07-27 10:46:32', '2024-07-29 11:01:09'),
(20, 'Quần đùi', 'categories/dAiT2Uf9iqVs5nIs7XSIuujy6UPpsI6ril1FjGRb.jpg', 1, '2024-07-27 10:46:32', '2024-07-29 11:01:47'),
(21, 'Áo polo1', 'categories/UKIxjcXnNAmmLQkBC1k57k6kPTp4x32BLzvRzN2L.jpg', 0, '2024-07-29 10:50:05', '2024-08-01 10:14:23');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_07_12_052326_create_categories_table', 1),
(6, '2024_07_17_052942_create_products_table', 1),
(7, '2024_07_17_053112_create_product_galleries_table', 1),
(8, '2024_07_17_053121_create_product_colors_table', 1),
(9, '2024_07_17_071926_create_product_sizes_table', 1),
(10, '2024_07_17_073906_create_product_variants_table', 1),
(11, '2024_07_24_151524_create_carts_table', 1),
(12, '2024_07_24_151628_create_cart_items_table', 1),
(13, '2024_07_24_151701_create_orders_table', 1),
(14, '2024_07_24_151708_create_order_items_table', 1),
(17, '2014_10_12_100000_create_password_resets_table', 2),
(18, '2024_08_03_060301_create_promotions_table', 3),
(19, '2024_08_03_060604_create_banners_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `user_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `payment_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unpaid',
  `total_price` double(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `user_email`, `user_name`, `user_address`, `user_phone`, `receiver_email`, `receiver_name`, `receiver_address`, `receiver_phone`, `order_status`, `payment_status`, `total_price`, `created_at`, `updated_at`) VALUES
(1, 1, 'nchay823@gmail.com', 'kien2k4', 'ưedced', '0987654321', 'nkien9050@gmail.com', 'eeeeeeeeee', 'dddd', '09999999999', 'pending', 'unpaid', 2100000.00, '2024-08-02 07:29:26', '2024-08-02 07:29:26'),
(2, 1, 'nchqqqqqqqqq3@gmail.com', 'thiadmin', 'qqqqqqqqq', '0987654321', 'nkien9050@gmail.com', 'eeeeeeeeee', 'dddd', '09999999999', 'pending', 'unpaid', 4500000.00, '2024-08-02 08:21:18', '2024-08-02 08:21:18'),
(3, 6, 'kien@gmail.com', 'thiadmin', 'ddd-d77ee7e', '0385817566', 'kien44@gmail.com', 'kien ddd', 'ddd-d77edd', '0385817568', 'pending', 'unpaid', 0.00, '2024-08-02 11:29:46', '2024-08-02 11:29:46'),
(4, 6, 'kien@gmail.com', 'admin_shop', 'ddd-d77ee7e', '0385817566', 'kien@gmail.com', 'kien ddd', 'ddd-d77ee7e', '0385817566', 'pending', 'unpaid', 0.00, '2024-08-02 12:01:43', '2024-08-02 12:01:43'),
(5, 6, 'kien@gmail.com', 'thiadmin', 'ddd-d77ee7e', '0385817566', 'kien@gmail.com', 'kien ddd', 'ddd-d77ee7e', '0385817566', 'pending', 'unpaid', 0.00, '2024-08-02 12:07:15', '2024-08-02 12:07:15'),
(6, 6, 'kien@gmail.com', 'thiadmin', 'ddd-d77ee7e', '0385817566', 'kien@gmail.com', 'kien ddd', 'ddd-d77ee7e', '0385817566', 'pending', 'unpaid', 0.00, '2024-08-02 12:26:06', '2024-08-02 12:26:06'),
(7, 6, 'kien@gmail.com', 'thiadmin', 'ddd-d77ee7e', '0385817566', 'kien@gmail.com', 'kien ddd', 'ddd-d77ee7e', '0385817566', 'pending', 'unpaid', 0.00, '2024-08-02 12:40:33', '2024-08-02 12:40:33'),
(8, 4, 'kien@gmail.com', 'thiadmin', 'ddd-d77ee7e', '0385817566', 'kien@gmail.com', 'kien ddd', 'ddd-d77ee7e', '0385817566', 'pending', 'unpaid', 0.00, '2024-08-02 13:41:55', '2024-08-02 13:41:55'),
(9, 6, 'kien@gmail.com', 'thiadmin', 'ddd-d77ee7e', '0385817566', 'kien@gmail.com', 'kien ddd', 'ddd-d77ee7e', '0385817566', 'pending', 'unpaid', 0.00, '2024-08-02 18:52:22', '2024-08-02 18:52:22'),
(10, 6, 'kien@gmail.com', 'thiadmin', 'ddd-d77ee7e', '0385817566', 'kien@gmail.com', 'kien ddd', 'ddd-d77ee7e', '0385817566', 'pending', 'unpaid', 0.00, '2024-08-02 19:11:06', '2024-08-02 19:11:06'),
(11, 6, 'kien@gmail.com', 'admin_shop', 'ddd-d77ee7e', '0385817566', 'kien@gmail.com', 'kien ddd', 'ddd-d77ee7e', '0385817566', 'pending', 'unpaid', 0.00, '2024-08-02 19:11:15', '2024-08-02 19:11:15'),
(12, 6, 'kien@gmail.com', 'thiadmin', 'ddd-d77ee7e', '0385817566', 'kien@gmail.com', 'kien ddd', 'ddd-d77ee7e', '0385817566', 'pending', 'unpaid', 0.00, '2024-08-02 19:11:35', '2024-08-02 19:11:35'),
(13, 6, 'kien@gmail.com', 'admin_shop', 'ddd-d77ee7e', '0385817566', 'kien@gmail.com', 'kien ddd', 'ddd-d77ee7e', '0385817566', 'pending', 'unpaid', 0.00, '2024-08-02 19:12:47', '2024-08-02 19:12:47'),
(14, 6, 'kien@gmail.com', 'thiadmin', 'ddd-d77ee7e', '0385817566', 'kien@gmail.com', 'kien ddd', 'ddd-d77ee7e', '0385817566', 'pending', 'unpaid', 0.00, '2024-08-02 19:13:17', '2024-08-02 19:13:17'),
(15, 6, 'kien@gmail.com', 'admin_shop', 'ddd-d77ee7e', '0385817566', 'kien@gmail.com', 'kien ddd', 'ddd-d77ee7e', '0385817566', 'pending', 'unpaid', 0.00, '2024-08-02 19:22:00', '2024-08-02 19:22:00'),
(16, 6, 'kien@gmail.com', 'admin_shop', 'ddd-d77ee7e', '0385817566', 'kien@gmail.com', 'kien ddd', 'ddd-d77ee7e', '0385817566', 'pending', 'unpaid', 0.00, '2024-08-02 19:22:09', '2024-08-02 19:22:09'),
(17, 6, 'kin@gmail.com', 'thiadmi', 'dddd77ee7e', '0385817566', 'kie@gmail.com', 'kien dd', 'ddd-d77ee7', '0385819566', 'pending', 'unpaid', 0.00, '2024-08-02 19:29:27', '2024-08-02 19:29:27'),
(18, 6, 'kien@gmail.com', 'thiadmin', 'ddd-d77ee7e', '0385817566', 'kien@gmail.com', 'kien ddd', 'ddd-d77ee7e', '0385817566', 'pending', 'unpaid', 0.00, '2024-08-02 19:34:43', '2024-08-02 19:34:43'),
(19, 6, 'kien@gmail.com', 'admin_shop', 'ddd-d77ee7e', '0385817566', 'kien@gmail.com', 'kien ddd', 'ddd-d77ee7e', '0385817566', 'pending', 'unpaid', 0.00, '2024-08-02 20:08:39', '2024-08-02 20:08:39'),
(20, 6, 'kien@gmail.com', 'admin_shop', 'ddd-d77ee7e', '0385817566', 'kien@gmail.com', 'kien ddd', 'ddd-d77ee7e', '0385817566', 'pending', 'unpaid', 0.00, '2024-08-02 20:14:01', '2024-08-02 20:14:01'),
(21, 6, 'kien@gmail.com', 'admin_shop', 'ddd-d77ee7e', '0385817566', 'kien@gmail.com', 'kien ddd', 'ddd-d77ee7e', '0385817566', 'pending', 'unpaid', 0.00, '2024-08-02 20:14:52', '2024-08-02 20:14:52'),
(22, 5, 'kien@gmail.com', 'kien2k4', 'ddd-d77ee7', '0385817566', 'kien@gmail.com', 'kien ddd', 'ddd-d77ee7e', '0385817566', 'pending', 'unpaid', 0.00, '2024-08-02 20:48:29', '2024-08-02 20:48:29'),
(23, 5, 'kien@gmail.com', 'admin_shop', 'ddd-d77ee7e', '0385817566', 'kien@gmail.com', 'kien ddd', 'ddd-d77ee7e', '0385817566', 'pending', 'unpaid', 0.00, '2024-08-02 20:53:26', '2024-08-02 20:53:26'),
(24, 5, 'kien@gmail.com', 'thiadmin', 'ddd-d77ee7e', '0385817566', 'kien@gmail.com', 'kien', 'ddd-d77ee7e', '0385817566', 'pending', 'unpaid', 333300000.00, '2024-08-02 21:56:25', '2024-08-02 21:56:25'),
(25, 5, 'kien@gmail.com', 'thiadmin', 'ddd-d77ee7e', '0385817566', 'kien@gmail.com', 'kien ddd', 'ddd-d77ee7e', '0385817566', 'pending', 'unpaid', 0.00, '2024-08-02 22:25:45', '2024-08-02 22:25:45'),
(26, 5, 'kien@gmail.com', 'admin_shop', 'ddd-d77ee7e', '0385817566', 'kien@gmail.com', 'kien ddd', 'ddd-d77ee7e', '0385817566', 'pending', 'unpaid', 333300000.00, '2024-08-02 22:38:41', '2024-08-02 22:38:41'),
(27, 5, 'kien@gmail.com', 'thiadmin', 'ddd-d77ee7e', '0385817566', 'kien@gmail.com', 'kien ddd', 'ddd-d77ee7e', '0385817566', 'pending', 'unpaid', 333300000.00, '2024-08-02 22:40:44', '2024-08-02 22:40:44'),
(28, 5, 'kien@gmail.com', 'thiadmin', 'ddd-d77ee7e', '0385817566', 'kien@gmail.com', 'kien ddd', 'ddd-d77ee7e', '0385817566', 'pending', 'unpaid', 333300000.00, '2024-08-02 22:41:31', '2024-08-02 22:41:31'),
(29, 5, 'kien@gmail.com', 'thiadmin', 'ddd-d77ee7e', '0385817566', 'kien@gmail.com', 'kien ddd', 'ddd-d77ee7e', '0385817566', 'pending', 'unpaid', 333300000.00, '2024-08-02 22:41:34', '2024-08-02 22:41:34'),
(30, 5, 'kien@gmail.com', 'thiadmin', 'ddd-d77ee7e', '0385817566', 'kien@gmail.com', 'kien ddd', 'ddd-d77ee7e', '0385817566', 'pending', 'unpaid', 333300000.00, '2024-08-02 22:42:15', '2024-08-02 22:42:15'),
(31, 5, 'kien@gmail.com', 'thiadmin', 'ddd-d77ee7e', '0385817566', 'kien@gmail.com', 'kien ddd', 'ddd-d77ee7e', '0385817566', 'pending', 'unpaid', 333300000.00, '2024-08-02 22:42:46', '2024-08-02 22:42:46'),
(32, 5, 'kien@gmail.com', 'thiadmin', 'ddd-d77ee7e', '0385817566', 'kien@gmail.com', 'kien ddd', 'ddd-d77ee7e', '0385817566', 'pending', 'unpaid', 333300000.00, '2024-08-02 22:43:11', '2024-08-02 22:43:11'),
(33, 5, 'kien@gmail.com', 'thiadmin', 'ddd-d77ee7e', '0385817566', 'kien@gmail.com', 'kien ddd', 'ddd-d77ee7e', '0385817566', 'pending', 'unpaid', 333300000.00, '2024-08-02 22:43:24', '2024-08-02 22:43:24'),
(34, 5, 'kien@gmail.com', 'thiadmin', 'ddd-d77ee7e', '0385817566', 'kien@gmail.com', 'kien ddd', 'ddd-d77ee7e', '0385817566', 'pending', 'unpaid', 333300000.00, '2024-08-02 22:43:26', '2024-08-02 22:43:26'),
(35, 5, 'kien@gmail.com', 'thiadmin', 'ddd-d77ee7e', '0385817566', 'kien@gmail.com', 'kien ddd', 'ddd-d77ee7e', '0385817566', 'pending', 'unpaid', 333300000.00, '2024-08-02 22:43:41', '2024-08-02 22:43:41'),
(36, 5, 'kien@gmail.com', 'thiadmin', 'ddd-d77ee7e', '0385817566', 'kien@gmail.com', 'kien ddd', 'ddd-d77ee7e', '0385817566', 'pending', 'unpaid', 333300000.00, '2024-08-02 22:43:50', '2024-08-02 22:43:50'),
(37, 5, 'kien@gmail.com', 'thiadmin', 'ddd-d77ee7e', '0385817566', 'kien@gmail.com', 'kien ddd', 'ddd-d77ee7e', '0385817566', 'pending', 'unpaid', 333300000.00, '2024-08-02 22:44:07', '2024-08-02 22:44:07'),
(38, 5, 'kien@gmail.com', 'thiadmin', 'ddd-d77ee7e', '0385817566', 'kien@gmail.com', 'kien ddd', 'ddd-d77ee7e', '0385817566', 'pending', 'unpaid', 333300000.00, '2024-08-02 22:44:20', '2024-08-02 22:44:20'),
(39, 5, 'kien@gmail.com', 'thiadmin', 'ddd-d77ee7e', '0385817566', 'kien@gmail.com', 'kien ddd', 'ddd-d77ee7e', '0385817566', 'pending', 'unpaid', 333300000.00, '2024-08-02 22:44:26', '2024-08-02 22:44:26'),
(40, 5, 'kien@gmail.com', 'thiadmin', 'ddd-d77ee7e', '0385817566', 'kien@gmail.com', 'kien ddd', 'ddd-d77ee7e', '0385817566', 'pending', 'unpaid', 333300000.00, '2024-08-02 22:44:44', '2024-08-02 22:44:44'),
(41, 5, 'kien@gmail.com', 'thiadmin', 'ddd-d77ee7e', '0385817566', 'kien@gmail.com', 'kien ddd', 'ddd-d77ee7e', '0385817566', 'pending', 'unpaid', 333300000.00, '2024-08-02 22:47:03', '2024-08-02 22:47:03'),
(42, 5, 'kien@gmail.com', 'thiadmin', 'ddd-d77ee7e', '0385817566', 'kien@gmail.com', 'kien ddd', 'ddd-d77ee7e', '0385817566', 'pending', 'unpaid', 333300000.00, '2024-08-02 22:49:04', '2024-08-02 22:49:04'),
(43, 5, 'kien@gmail.com', 'admin_shop', 'ddd-d77ee7e', '0385817566', 'kien@gmail.com', 'kien ddd', 'ddd-d77ee7e', '0385817566', 'pending', 'unpaid', 333300000.00, '2024-08-02 22:49:21', '2024-08-02 22:49:21'),
(44, 5, 'kien@gmail.com', 'admin_shop', 'ddd-d77ee7e', '0385817566', 'kien@gmail.com', 'kien ddd', 'ddd-d77ee7e', '0385817566', 'pending', 'unpaid', 333300000.00, '2024-08-02 22:50:04', '2024-08-02 22:50:04'),
(45, 5, 'kien@gmail.com', 'admin_shop', 'ddd-d77ee7e', '0385817566', 'kien@gmail.com', 'kien ddd', 'ddd-d77ee7e', '0385817566', 'pending', 'unpaid', 333300000.00, '2024-08-02 22:50:58', '2024-08-02 22:50:58'),
(46, 5, 'kien@gmail.com', 'admin_shop', 'ddd-d77ee7e', '0385817566', 'kien@gmail.com', 'kien ddd', 'ddd-d77ee7e', '0385817566', 'pending', 'unpaid', 300000.00, '2024-08-02 22:51:36', '2024-08-02 22:51:36'),
(47, 5, 'kien@gmail.com', 'admin_shop', 'ddd-d77ee7e', '0385817566', 'kien@gmail.com', 'kien ddd', 'ddd-d77ee7e', '0385817566', 'pending', 'unpaid', 0.00, '2024-08-02 22:52:53', '2024-08-02 22:52:53'),
(48, 5, 'kien@gmail.com', 'thiadmin', 'ddd-d77ee7e', '0385817566', 'kien@gmail.com', 'kien ddd', 'ddd-d77ee7e', '0385817566', 'pending', 'unpaid', 0.00, '2024-08-02 22:55:57', '2024-08-02 22:55:57'),
(49, 4, 'kien@gmail.com', 'admin_shop', 'ddd-d77ee7e', '0385817566', 'kien@gmail.com', 'kien ddd', 'ddd-d77ee7e', '0385817566', 'pending', 'unpaid', 0.00, '2024-08-03 00:19:14', '2024-08-03 00:19:14'),
(50, 5, 'kien@gmail.com', 'admin_shop', 'ddd-d77ee7e', '0385817566', 'kien@gmail.com', 'kien ddd', 'ddd-d77ee7e', '0385817566', 'pending', 'unpaid', 0.00, '2024-08-03 00:48:43', '2024-08-03 00:48:43');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint UNSIGNED NOT NULL,
  `product_variant_id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `product_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_sku` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_img_thumb` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price_sale` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `variant_size_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `variant_color_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `product_variant_id`, `order_id`, `product_name`, `product_sku`, `product_img_thumb`, `product_price`, `product_price_sale`, `variant_size_name`, `variant_color_name`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 'Áo polo nam', 'JGJS1UIKI', 'products/Kpj3fWpAOwv4xJuxY6XdEMBzw3Q1Tn8MCUFzbOjQ.jpg', '320000', '300000', 'S', 'yellow', '7', '2024-08-02 07:29:26', '2024-08-02 07:29:26'),
(2, 4, 2, 'Áo polo nam', 'JGJS1UIKI', 'products/Kpj3fWpAOwv4xJuxY6XdEMBzw3Q1Tn8MCUFzbOjQ.jpg', '320000', '300000', 'S', 'yellow', '6', '2024-08-02 08:21:18', '2024-08-02 08:21:18'),
(3, 1, 2, 'Áo polo nam', 'JGJS1UIKI', 'products/Kpj3fWpAOwv4xJuxY6XdEMBzw3Q1Tn8MCUFzbOjQ.jpg', '320000', '300000', 'M', 'blue', '3', '2024-08-02 08:21:18', '2024-08-02 08:21:18'),
(4, 17, 2, 'Áo polo kimen', 'F2LD0UX2D', 'products/CaCBnIioqUcMWD6p4d0i20Ulvnj7ouvjhWIebBsa.jpg', '12000', '300000', 'S', 'white', '6', '2024-08-02 08:21:18', '2024-08-02 08:21:18'),
(5, 17, 45, 'Áo polo kimen', 'F2LD0UX2D', 'Default image_thumb', '12000', '300000', 'Default Size', 'Default Color', '1111', '2024-08-02 22:50:58', '2024-08-02 22:50:58'),
(6, 4, 46, 'Áo polo nam', 'JGJS1UIKI', 'Default image_thumb', '320000', '300000', 'Default Size', 'Default Color', '1', '2024-08-02 22:51:36', '2024-08-02 22:51:36');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('nkien050@gmail.com', '$2y$12$pKf.0h22snQgIur3AwP5D.SuOQW2CnbLIq.ZgEXWQmIbSdtDeleBq', '2024-08-02 20:44:11');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `img_thumb` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_sale` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `material` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `use_manual` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_best_sale` tinyint(1) NOT NULL DEFAULT '0',
  `is_40_sale` tinyint(1) NOT NULL DEFAULT '0',
  `is_hot_online` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `sku`, `category_id`, `img_thumb`, `price`, `price_sale`, `material`, `description`, `use_manual`, `is_active`, `is_best_sale`, `is_40_sale`, `is_hot_online`, `created_at`, `updated_at`) VALUES
(1, 'Culpa qui occaecati aut.', 'culpa-qui-occaecati-aut-bcbpyvzp', 'BCbPyVZP', 13, 'products/mgIE7pJm2CNfh1fANWuMuCppAD0fK9fmdCwgz3WT.jpg', '100000', '69000', 'Delectus in omnis fugiat eius. Dicta et eum laudantium et explicabo sit omnis.', 'Et vitae est blanditiis sed ad. Sunt nulla rerum omnis. Porro voluptatem praesentium quam quod.', 'Porro aliquid quia est. Sed dolor eum impedit quia id quia. Reiciendis sed est modi.', 0, 0, 1, 0, '2024-07-31 10:03:14', '2024-08-03 00:18:34'),
(2, 'Áo polo nam', 'ao-polo-nam-jgjs1uiki', 'JGJS1UIKI', 13, 'products/Kpj3fWpAOwv4xJuxY6XdEMBzw3Q1Tn8MCUFzbOjQ.jpg', '320000', '300000', NULL, 'Áo nữ là item không thể thiếu trong tủ đồ của các nàng. Mua áo nữ thời trang giá rẻ tại Shopee Việt Nam với nhiều ưu đãi giảm giá và', NULL, 1, 1, 1, 0, '2024-07-31 10:05:02', '2024-08-02 07:06:26'),
(3, 'Quần Âu', 'quan-au-indwtj6ni', 'INDWTJ6NI', 19, 'products/wi0SfZJxqqTBfEndvWOvicirkeJuMxnOCLWspjvI.jpg', '12000', '1222', NULL, NULL, NULL, 1, 0, 1, 0, '2024-08-01 07:31:38', '2024-08-01 07:31:38'),
(6, 'Áo polo kimen', 'ao-polo-kimen-f2ld0ux2d', 'F2LD0UX2D', 13, 'products/CaCBnIioqUcMWD6p4d0i20Ulvnj7ouvjhWIebBsa.jpg', '12000', '300000', NULL, NULL, NULL, 1, 0, 1, 0, '2024-08-01 08:52:23', '2024-08-02 01:48:57'),
(7, 'Kiên', 'kien-pgbewmdbh', 'PGBEWMDBH', 12, 'products/HnQ9mycT4QILcrHEQyNHO3jHqV1VyIILfwLwkXX4.jpg', '320000', '1222', NULL, NULL, NULL, 1, 0, 1, 0, '2024-08-01 09:18:29', '2024-08-02 01:49:40'),
(8, 'Kiên', 'kien-y4kqvbi2v', 'Y4KQVBI2V', 21, 'products/1A5QYGiA8db3bBxMLNANRTPPuNmJQnCak1LegiEa.jpg', '320000', '300000', NULL, NULL, NULL, 1, 0, 1, 1, '2024-08-01 10:27:12', '2024-08-01 10:27:12');

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE `product_colors` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_colors`
--

INSERT INTO `product_colors` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'black', '2024-07-31 10:03:14', '2024-07-31 10:03:14'),
(2, 'blue', '2024-07-31 10:03:14', '2024-07-31 10:03:14'),
(3, 'white', '2024-07-31 10:03:14', '2024-07-31 10:03:14'),
(4, 'gray', '2024-07-31 10:03:14', '2024-07-31 10:03:14'),
(5, 'yellow', '2024-07-31 10:03:14', '2024-07-31 10:03:14');

-- --------------------------------------------------------

--
-- Table structure for table `product_galleries`
--

CREATE TABLE `product_galleries` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_galleries`
--

INSERT INTO `product_galleries` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 2, 'product_galleries/5mqioBKKx2zGGwIsMvyxHgiVIqtNgln3Ulqc2IV8.jpg', '2024-07-31 10:05:02', '2024-07-31 10:05:02'),
(2, 2, 'product_galleries/n2i8cUFyAa69h0NpNvsONdPWgjC0zUl1ZHkaKRvV.jpg', '2024-07-31 10:05:02', '2024-07-31 10:05:02'),
(3, 2, 'product_galleries/afvmJ1SXS4zdnOEcFZOMLrwhJ4Y5jvWm7eQV4ZuM.jpg', '2024-07-31 10:05:02', '2024-07-31 10:05:02'),
(4, 2, 'product_galleries/y2DkGp0Gy6fLogNFiaWTDEQcyT7ixTsOYV8jCEmM.jpg', '2024-07-31 10:05:02', '2024-07-31 10:05:02'),
(5, 3, 'product_galleries/D85YOTLnOxcJ2OZToEyiUHQ2EVtFPa5pdrxOLgBl.jpg', '2024-08-01 07:31:38', '2024-08-01 07:31:38'),
(6, 3, 'product_galleries/ibHL4UXkuDpEXRY1BtJhpLkqbWB123IcD7KVNSVs.jpg', '2024-08-01 07:31:38', '2024-08-01 07:31:38'),
(7, 3, 'product_galleries/eIOrDatIjAOvGyk2lSqX6ZDzS2tp6UgfHCFfxTlE.jpg', '2024-08-01 07:31:38', '2024-08-01 07:31:38'),
(8, 6, 'product_galleries/sRvXkmcUDrQWYFs2YyxTICGskUjsfIbEwzxSahDv.jpg', '2024-08-01 08:52:23', '2024-08-01 08:52:23'),
(9, 6, 'product_galleries/8SVbX7Y1WLUnnnmTS0OSgF1dOp3zjR7i3HLvUw0m.jpg', '2024-08-01 08:52:23', '2024-08-01 08:52:23'),
(10, 6, 'product_galleries/0934WBUZlCvJaoWKyvvG1ereJyAy35jjdbtAkfOd.jpg', '2024-08-01 08:52:23', '2024-08-01 08:52:23'),
(11, 6, 'product_galleries/hAmXhIaorRWWZv22G16UHkdLd4dt5bNKFB4BvNdj.jpg', '2024-08-01 08:52:23', '2024-08-01 08:52:23'),
(12, 6, 'product_galleries/KzaVrRr4G9DGBn1WkqP2CQrWlBXLR1YyrIN1qqdO.webp', '2024-08-01 08:52:23', '2024-08-01 08:52:23'),
(13, 6, 'product_galleries/FCGbnvavMehdMaFiZW6Si5w2CAKnNRXGj4G4JHAD.jpg', '2024-08-01 08:52:23', '2024-08-01 08:52:23'),
(14, 6, 'product_galleries/NKcFcF0TpbDLGGIi5BcJufGCHnqxTcBiM3iOzOZr.jpg', '2024-08-01 08:52:23', '2024-08-01 08:52:23'),
(15, 6, 'product_galleries/3VcNAXYDL65myaSRQBHS0Zmbj8PCKKxGUADPs5qo.jpg', '2024-08-01 08:52:23', '2024-08-01 08:52:23'),
(16, 6, 'product_galleries/V9D48JmRkeboyDGrPkB0sin1TlHl4bDJMK4NSDFf.jpg', '2024-08-01 08:52:23', '2024-08-01 08:52:23'),
(17, 6, 'product_galleries/07Hy3NSNo8Sea4dZNXwIbtDFdWNjSSYkji3yt88X.webp', '2024-08-01 08:52:23', '2024-08-01 08:52:23'),
(18, 1, 'product_galleries/lGBkPpdyrTyN4nuCoKx6uK7GHz2eHfZlVf3Od9i3.webp', '2024-08-01 09:09:32', '2024-08-01 09:09:32'),
(19, 1, 'product_galleries/cZhjg0TSVygNo5psELQFeezV1wXJkyjE7zJmUAIs.jpg', '2024-08-01 09:09:32', '2024-08-01 09:09:32'),
(20, 7, 'product_galleries/dzISpN6RYuLWXre9c1waX7wLUlEFv6jdaX5mwzc4.jpg', '2024-08-01 09:18:29', '2024-08-01 09:18:29'),
(21, 8, 'product_galleries/FhEVFl2twYlNfNcZh2UoUjWmfz56RkOlQVpTHfGd.jpg', '2024-08-01 10:27:12', '2024-08-01 10:27:12'),
(22, 8, 'product_galleries/BX4T2s8Pqc4iImpPEBY15CNGAOSXCLQrK7mEpj2j.jpg', '2024-08-01 10:27:12', '2024-08-01 10:27:12'),
(23, 8, 'product_galleries/pCHriIVD1sI70Kn7tv5UmaRqyuqJv9MLWPYW9uEW.jpg', '2024-08-01 10:27:12', '2024-08-01 10:27:12'),
(24, 8, 'product_galleries/eEfrE5BPG8Cc8HbwF7yfIdPGLdrKuBRcMrjS1UYl.jpg', '2024-08-01 10:27:12', '2024-08-01 10:27:12'),
(25, 8, 'product_galleries/OmVCrcat6EOKEi7Ewc7pW1tWTNHnUNqbkelnKGEj.webp', '2024-08-01 10:27:12', '2024-08-01 10:27:12');

-- --------------------------------------------------------

--
-- Table structure for table `product_sizes`
--

CREATE TABLE `product_sizes` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sizes`
--

INSERT INTO `product_sizes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'S', '2024-07-31 10:03:14', '2024-07-31 10:03:14'),
(2, 'M', '2024-07-31 10:03:14', '2024-07-31 10:03:14'),
(3, 'L', '2024-07-31 10:03:14', '2024-07-31 10:03:14'),
(4, 'XL', '2024-07-31 10:03:14', '2024-07-31 10:03:14'),
(5, '2XL', '2024-07-31 10:03:14', '2024-07-31 10:03:14');

-- --------------------------------------------------------

--
-- Table structure for table `product_variants`
--

CREATE TABLE `product_variants` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `product_size_id` bigint UNSIGNED NOT NULL,
  `product_color_id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int NOT NULL DEFAULT '0',
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_variants`
--

INSERT INTO `product_variants` (`id`, `product_id`, `product_size_id`, `product_color_id`, `image`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 2, 'product_variants/RDZqRUGoZpFblAPsuJP8IL6WVIiFgepKZnWMZzuN.jpg', 344444, 1112.00, '2024-07-31 10:05:02', '2024-08-01 10:22:33'),
(2, 2, 3, 4, 'product_variants/CNtt8sZKA7mDd8APTDoLpLTIihXMvbhhurvl2iNb.jpg', 1112, 1111.00, '2024-07-31 10:05:02', '2024-08-01 10:22:33'),
(3, 2, 4, 3, 'product_variants/HnIRBTq1Okh8TC8pXiVxwiJQZSvNJ5eqlsYaEvXC.jpg', 121, 111.00, '2024-07-31 10:05:02', '2024-08-01 10:22:33'),
(4, 2, 1, 5, 'product_variants/IJL5zcs4VIwXRCrFud4qh4BNIdhHMcRnyD3WsMQS.webp', 1111, 11111.00, '2024-07-31 10:05:02', '2024-08-01 10:28:01'),
(5, 2, 5, 1, 'product_variants/NyxoPykxEbo533DwIL0WY2LDkjNEgBRYtC0Clert.jpg', 1, 1.00, '2024-07-31 10:05:02', '2024-08-01 10:28:01'),
(8, 3, 1, 2, '', 1, 1.00, '2024-08-01 07:31:38', '2024-08-01 07:31:38'),
(9, 3, 2, 5, '', 1, 1.00, '2024-08-01 07:31:38', '2024-08-01 07:31:38'),
(10, 3, 3, 4, '', 1, 1.00, '2024-08-01 07:31:38', '2024-08-01 07:31:38'),
(11, 3, 4, 3, '', 1, 1.00, '2024-08-01 07:31:38', '2024-08-01 07:31:38'),
(12, 3, 5, 1, '', 1, 1.00, '2024-08-01 07:31:38', '2024-08-01 07:31:38'),
(17, 6, 1, 3, 'product_variants/cfwjzxYk3A3GOWGhQOtjVq9MezEZGipIIDYDf6bc.jpg', 1, 1.00, '2024-08-01 08:52:23', '2024-08-02 01:48:57'),
(18, 6, 5, 4, 'product_variants/SXNShVcJcW9617W09nrYR8YlllQiwY1rIAOmshwV.jpg', 1111, 1.00, '2024-08-01 08:52:23', '2024-08-02 01:48:57'),
(19, 6, 4, 5, 'product_variants/iOs00vcQchx0ynWEuZf3LboyF7vZdf1BcVHh254u.jpg', 121, 1.00, '2024-08-01 08:52:23', '2024-08-02 01:48:57'),
(20, 6, 3, 2, 'product_variants/BAnsOwiAvSTkxgzdoYkpLMWQtiXy3FejnXbzrROc.jpg', 11, 1.00, '2024-08-01 08:52:23', '2024-08-02 01:48:57'),
(21, 6, 2, 1, 'product_variants/gpLoXdTreFfuVpNeDZwPYwnEVTBMRYV2LBGGa3lA.jpg', 111, 1.00, '2024-08-01 08:52:23', '2024-08-02 01:48:57'),
(23, 7, 1, 5, '', 6, 300000.00, '2024-08-01 09:18:29', '2024-08-01 09:18:29'),
(24, 7, 2, 4, '', 3444, 300000.00, '2024-08-01 09:18:29', '2024-08-01 09:18:29'),
(25, 7, 3, 3, '', 444, 300000.00, '2024-08-01 09:18:29', '2024-08-01 09:18:29'),
(26, 7, 4, 2, '', 4440, 300000.00, '2024-08-01 09:18:29', '2024-08-01 09:18:29'),
(27, 7, 5, 1, '', 550, 300000.00, '2024-08-01 09:18:29', '2024-08-01 09:18:29'),
(42, 8, 1, 2, '', 55, 5555.00, '2024-08-01 10:27:12', '2024-08-01 10:27:12'),
(43, 8, 5, 3, '', 555, 5555.00, '2024-08-01 10:27:12', '2024-08-01 10:27:12'),
(44, 8, 4, 4, '', 55, 5555.00, '2024-08-01 10:27:12', '2024-08-01 10:27:12'),
(45, 8, 3, 1, '', 55, 555.00, '2024-08-01 10:27:12', '2024-08-01 10:27:12'),
(46, 8, 2, 5, '', 555, 555.00, '2024-08-01 10:27:12', '2024-08-01 10:27:12');

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `discount_percentage` decimal(5,2) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`id`, `name`, `description`, `discount_percentage`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 'Kiên', 'gggg', '44.00', '2024-08-17', '2024-08-18', '2024-08-02 23:21:20', '2024-08-02 23:21:20'),
(2, 'Kiên', 'fffff', '33.00', '2024-08-08', '2024-08-10', '2024-08-02 23:28:51', '2024-08-02 23:28:51'),
(4, 'dddd', 'ddd', '32.00', '2024-08-09', '2024-08-10', '2024-08-03 00:51:25', '2024-08-03 00:51:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'kien', 'nkien050@gmail.com', '2024-08-14 06:05:52', '11111111', NULL, NULL, NULL, 'user'),
(2, 'Kiên', 'nkien900@gmail.com', NULL, '$2y$12$XU4iT4IXzoiuFtDHg8DVau0AXnMrQaPJUopUxEdcrBLtrIUL8Mj.6', 'kyAhOsTBh5XhWkSo6Ni45B49wsjTCVgDSkOx1Co1piFvxCmxKGWvPGUWvcWS', '2024-08-02 00:10:12', '2024-08-02 00:10:12', 'user'),
(3, 'admin', 'kienntph44041@fe.edu.vn', NULL, '$2y$12$Lc9obXXSllMaQc8HhvxuuOaDs3x.MIjii8dNQeVpQthbqCtl9f0uu', NULL, '2024-08-02 00:52:07', '2024-08-02 00:52:07', 'admin'),
(4, 'admin', 'admin@gmail.com', NULL, '$2y$12$H0MJRIwIeh8/cVC70iFo6uHiy7a7gFjANrcssTa8YSOaWS.kTz8vu', 'QAenPNVuysfB3FAi6ozITAmlpa7qhIk9Uc7OhXGL5PwUgZZqTaOkHEWu8qDw', '2024-08-02 01:46:17', '2024-08-02 01:46:17', 'admin'),
(5, 'Kiên1', 'nkien9050@gmail.com', NULL, '$2y$12$zwpjsCoe/CBlXZOZDheOh..9utw2bNcTKgZz2XelhddP2wgINrclC', 'Pu2I7iXaVKMihRzmInjoyx2QX8H5g6onoCfhnFwqwa7PzXI4NutetM313ZRR', '2024-08-02 07:01:55', '2024-08-02 20:45:55', 'user'),
(6, 'kien ddd', 'kien@gmail.com', NULL, '$2y$12$TWtpZx7n6EH/Yf456reWtO9iD9KDkKlJ5JEZvseRpDY4heaTcyyYO', 'vMGXahYI1epFONqtwtBiui47ZoekhggJxwzUSUN8C2CW4JcPxAgEAmS9RKOW', '2024-08-02 11:19:51', '2024-08-02 11:19:51', 'user'),
(7, 'Kiên22', 'nkien9020@gmail.com', NULL, '$2y$12$Nn8UFunsguBR5ykKGA.U3em72XUmLpc5n7YQIEhhmqLfQ/61l6LkW', NULL, '2024-08-02 18:58:19', '2024-08-02 18:58:19', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `carts_user_id_unique` (`user_id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_items_cart_id_foreign` (`cart_id`),
  ADD KEY `cart_items_product_variant_id_foreign` (`product_variant_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_product_variant_id_foreign` (`product_variant_id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD UNIQUE KEY `products_sku_unique` (`sku`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_galleries`
--
ALTER TABLE `product_galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_galleries_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_variant_unique` (`product_id`,`product_size_id`,`product_color_id`),
  ADD KEY `product_variants_product_size_id_foreign` (`product_size_id`),
  ADD KEY `product_variants_product_color_id_foreign` (`product_color_id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
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
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_galleries`
--
ALTER TABLE `product_galleries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`),
  ADD CONSTRAINT `cart_items_product_variant_id_foreign` FOREIGN KEY (`product_variant_id`) REFERENCES `product_variants` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_product_variant_id_foreign` FOREIGN KEY (`product_variant_id`) REFERENCES `product_variants` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `product_galleries`
--
ALTER TABLE `product_galleries`
  ADD CONSTRAINT `product_galleries_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD CONSTRAINT `product_variants_product_color_id_foreign` FOREIGN KEY (`product_color_id`) REFERENCES `product_colors` (`id`),
  ADD CONSTRAINT `product_variants_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `product_variants_product_size_id_foreign` FOREIGN KEY (`product_size_id`) REFERENCES `product_sizes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
