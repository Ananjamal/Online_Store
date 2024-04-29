-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2024 at 08:35 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zay_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `adresses`
--

CREATE TABLE `adresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address_line1` varchar(255) NOT NULL,
  `address_line2` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip_code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adresses`
--

INSERT INTO `adresses` (`id`, `user_id`, `order_id`, `firstname`, `lastname`, `email`, `phone`, `address_line1`, `address_line2`, `country`, `city`, `state`, `zip_code`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Consequatur Consequ', 'Itaque voluptas aspe', 'galy@mailinator.com', '89', 'Provident cupiditat', 'Voluptate sed ullam ', 'Afghanistan', 'Aperiam sint volupta', 'Dolor ea in aut aspe', 'Sed suscipit et pers', '2024-04-28 10:23:55', '2024-04-28 10:23:55'),
(2, 1, 2, 'aya', 'moner', 'aya@gmail.com', '0595513535', 'kjakjnhdjsfksd', 'sj,lfbnmnsdbf', 'Palestine', 'gaza', 'palestine', '970', '2024-04-28 12:56:03', '2024-04-28 12:56:03');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `device_id` varchar(255) DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `total` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `device_id`, `product_id`, `product_name`, `quantity`, `price`, `image`, `total`, `created_at`, `updated_at`) VALUES
(13, 1, NULL, 20, 'Old camera', 1, 1500.00, 'public/products/4qFcHDD2hNkd8GQEh8t9Q4X54nxxmqtSYwIQ8a8n.jpg', 1500.00, '2024-04-28 13:01:39', '2024-04-28 13:01:39');

-- --------------------------------------------------------

--
-- Table structure for table `cart_product`
--

CREATE TABLE `cart_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cart_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Women\'s Clothing', 'Trendy and stylish apparel including dresses, tops, bottoms, and lingerie for every occasion', 'public/categories/oB3XP4UYVmGYV59dwLxpDKHZOMq6bOXEvkXIRpgR.jpg', '2024-04-28 09:53:00', '2024-04-28 09:53:00'),
(2, 'Men\'s Clothing', 'Sophisticated and versatile attire ranging from suits and shirts to casual wear for men.', 'public/categories/V5YeaRtIrgvxTzdKbRrdppbjOj916wUETPAW9A6E.jpg', '2024-04-28 09:53:43', '2024-04-28 09:53:43'),
(3, 'Children\'s Clothing', 'Adorable and comfortable outfits for infants, toddlers, and kids of all ages.', 'public/categories/iUFdhurLIfaBAScvFEBUXDYLdSFqPQMHKGTcFg2L.jpg', '2024-04-28 09:56:43', '2024-04-28 09:56:43'),
(4, 'Shoes and Footwear', 'A diverse range of footwear options for men, women, and children, suitable for every style and activity.', 'public/categories/oMy8Xlb3FsIIYJFBv5x1ZicKRN0bitxrD4D2nc9C.jpg', '2024-04-28 09:57:26', '2024-04-28 12:57:37'),
(5, 'Accessories', ' Stunning jewelry, watches, handbags, and hats to add a finishing touch to any outfit.', 'public/categories/vzcpJ7GGwwQg2PqSNCRKJrobAmkFLgjRR0h0JNcl.jpg', '2024-04-28 09:58:15', '2024-04-28 09:58:15'),
(6, 'Sport Clothing', ' Vibrant swimwear and beachwear options for fun in...', 'public/categories/OnqfQVD0YDV7GTLsHLNFlsBXCYG41RfBpaL48THD.jpg', '2024-04-28 09:58:58', '2024-04-28 09:58:58');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `user_id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 1, 'Shelby Cannon', 'dafy@mailinator.com', 'Repudiandae laborum', 'Ea elit consectetur', '2024-04-28 09:59:37', '2024-04-28 09:59:37'),
(2, 1, 'aya', 'aya@gmail.com', 'jsdhkfjksdfjksdfh', 'skjfdhasjkdflasjkfd', '2024-04-28 12:56:45', '2024-04-28 12:56:45');

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
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `device_id` varchar(255) DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `device_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 16, '2024-04-28 10:23:28', '2024-04-28 10:23:28'),
(2, 1, NULL, 6, '2024-04-28 12:53:18', '2024-04-28 12:53:18'),
(3, 1, NULL, 7, '2024-04-28 12:53:32', '2024-04-28 12:53:32');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_02_03_084023_create_todos_table', 1),
(6, '2024_04_02_093508_create_categories_table', 1),
(7, '2024_04_02_093525_create_products_table', 1),
(8, '2024_04_02_093548_create_orders_table', 1),
(9, '2024_04_02_093613_create_order_product_table', 1),
(10, '2024_04_02_093627_create_carts_table', 1),
(11, '2024_04_02_093635_create_favorites_table', 1),
(12, '2024_04_02_093657_create_adresses_table', 1),
(13, '2024_04_02_093720_create_cart_product_table', 1),
(14, '2024_04_03_021533_create_permission_tables', 1),
(15, '2024_04_21_081325_create_contacts_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `shipping_price` decimal(8,2) NOT NULL,
  `total_price` decimal(8,2) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL DEFAULT 'pending',
  `payment_status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `shipping_price`, `total_price`, `payment_method`, `order_status`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, 1, 10.00, 570.00, 'on', 'cancelled', 0, '2024-04-28 10:23:55', '2024-04-28 12:59:48'),
(2, 1, 10.00, 5470.00, 'on', 'delivered', 0, '2024-04-28 12:56:03', '2024-04-28 12:59:31');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id`, `order_id`, `product_id`, `price`, `quantity`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 18, 70, 8, 560.00, '2024-04-28 10:23:55', '2024-04-28 10:23:55'),
(2, 2, 2, 80, 6, 480.00, '2024-04-28 12:56:03', '2024-04-28 12:56:03'),
(3, 2, 6, 150, 3, 450.00, '2024-04-28 12:56:03', '2024-04-28 12:56:03'),
(4, 2, 7, 120, 3, 360.00, '2024-04-28 12:56:03', '2024-04-28 12:56:03'),
(5, 2, 11, 60, 6, 360.00, '2024-04-28 12:56:03', '2024-04-28 12:56:03'),
(6, 2, 12, 150, 2, 300.00, '2024-04-28 12:56:03', '2024-04-28 12:56:03'),
(7, 2, 14, 320, 2, 640.00, '2024-04-28 12:56:03', '2024-04-28 12:56:03'),
(8, 2, 13, 300, 3, 900.00, '2024-04-28 12:56:03', '2024-04-28 12:56:03'),
(9, 2, 15, 500, 1, 500.00, '2024-04-28 12:56:03', '2024-04-28 12:56:03'),
(10, 2, 19, 150, 5, 750.00, '2024-04-28 12:56:03', '2024-04-28 12:56:03'),
(11, 2, 16, 180, 4, 720.00, '2024-04-28 12:56:03', '2024-04-28 12:56:03');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `image`, `price`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'T-shirt', 'very high qualityvery high qualityvery high qualit...', 'public/products/eXQH7gVzxiCpWuny3GECfg2uzMYZdJk6Om2hYy8K.jpg', 50.00, 3, '2024-04-28 10:01:34', '2024-04-28 10:02:48'),
(2, 'Dress', 'very high qualityvery high qualityvery high quality', 'public/products/rcIX7BUDyg27AjRXzyyq620JtiSaofqTu6Z1vtch.jpg', 80.00, 3, '2024-04-28 10:02:17', '2024-04-29 02:46:41'),
(3, 'Shirt', 'very high qualityvery high qualityvery high qualit...', 'public/products/nFOfs8bpslUOQj0c6o6FtwMuL8ef6qfaibVsE3ky.jpg', 70.00, 3, '2024-04-28 10:03:32', '2024-04-29 02:47:29'),
(4, 'T_shirt', 'very high qualityvery high qualityvery high quality', 'public/products/6qblnkFP4O9NNIsXHIBGPJ00cdjFb1Ywct1c83YE.jpg', 90.00, 1, '2024-04-28 10:05:16', '2024-04-28 10:05:16'),
(5, 'Shirt', 'very high qualityvery high qualityvery high quality', 'public/products/BA30dHGs10nvIpNedZMKuzpp3jFsowR2iVYOpdh1.jpg', 80.00, 1, '2024-04-28 10:06:36', '2024-04-28 10:06:36'),
(6, 'Dress', 'very high qualityvery high qualityvery high qualit...', 'public/products/easUftha2iI92wxGzstr6oq3hnLW7uQz25kW9BkG.jpg', 150.00, 1, '2024-04-28 10:07:01', '2024-04-28 10:07:01'),
(7, 'Casual-Shirt', 'very high qualityvery high qualityvery high qualit...', 'public/products/AP0nmNIkZx9Ld4j6xCmmRsiV6nu9ubqkzcuxzRmS.jpg', 120.00, 2, '2024-04-28 10:07:39', '2024-04-29 02:56:46'),
(8, 'Shirt', 'very high qualityvery high qualityvery high qualit...', 'public/products/IFnDIQYg7LFUfEoWyFC4LKKFBisqcyynQiO3NBb8.jpg', 180.00, 2, '2024-04-28 10:08:09', '2024-04-28 10:08:09'),
(9, 'Blue sute jakect', 'very high qualityvery high qualityvery high qualit...', 'public/products/8aIVe7RulZcF95COJ8PcXRq0TKg1eg5GW6qjaOF9.jpg', 450.00, 2, '2024-04-28 10:09:15', '2024-04-29 02:54:07'),
(10, 'Formal shoes', 'very high qualityvery high qualityvery high qualit...', 'public/products/C1QDbyVpX29MgWMZNUMlEsOcjMPNx8RFYcbUusU4.jpg', 200.00, 4, '2024-04-28 10:10:18', '2024-04-28 10:10:18'),
(11, 'Casual shose', 'very high qualityvery high qualityvery high qualit...', 'public/products/Rhmrtp7nTwlF29laWaYdpNLfmM04WluNZSxdPOA8.jpg', 60.00, 4, '2024-04-28 10:11:31', '2024-04-28 10:11:31'),
(12, 'Black shose', 'very high qualityvery high qualityvery high qualit...', 'public/products/AmBb8ZQTHsPu4wQGeL5Z3kQ53RzosWSOADOkUn2Q.jpg', 150.00, 4, '2024-04-28 10:12:00', '2024-04-28 10:12:00'),
(13, 'Black glasses', 'very high qualityvery high qualityvery high qualit...', 'public/products/W7BQFaursH4fvHUb5GChNp18tBqS38so97a12pzb.jpg', 300.00, 5, '2024-04-28 10:12:58', '2024-04-28 10:12:58'),
(14, 'Flash', 'very high qualityvery high qualityvery high qualit...', 'public/products/3M45VEhOCaVRZuOpLW0iDVPCL9ggUjdcGjoFNs6g.jpg', 320.00, 5, '2024-04-28 10:13:27', '2024-04-28 10:13:27'),
(15, 'Nikon camera', 'very high qualityvery high qualityvery high qualit...', 'public/products/Ss0rDPKlapsGwhIR9RYLF7WcZErsQ36XvYSEeb3O.jpg', 500.00, 5, '2024-04-28 10:14:05', '2024-04-28 10:14:05'),
(16, 'Adidas pant', 'very high qualityvery high qualityvery high qualit...', 'public/products/YqQySQ49S4sEY04grbHpMwgZZrpPXi1HwWaCNkqz.jpg', 180.00, 6, '2024-04-28 10:14:52', '2024-04-28 10:14:52'),
(17, 'Jacket with hat', 'very high qualityvery high qualityvery high qualit...', 'public/products/Po43NQmU7AMbkNxSlaUgcsabIynBt8bP6xEJFaWc.jpg', 300.00, 3, '2024-04-28 10:15:37', '2024-04-28 10:15:37'),
(18, 'White shirt', 'very high qualityvery high qualityvery high qualit...', 'public/products/GxZ8XvG38LHoQskyUnG9s7js9uNVpm9iZVD7mzVa.jpg', 70.00, 6, '2024-04-28 10:16:14', '2024-04-28 10:16:14'),
(19, 'Sport shirt', 'very high qualityvery high qualityvery high qualit...', 'public/products/LkTPNStQ8AsHqRifoMCuJQ5h4ktCfwNHeOuCi2Bq.jpg', 150.00, 6, '2024-04-28 10:17:13', '2024-04-28 10:17:13'),
(20, 'Old camera', 'very high quality very high quality very high qualit...', 'public/products/4qFcHDD2hNkd8GQEh8t9Q4X54nxxmqtSYwIQ8a8n.jpg', 1500.00, 5, '2024-04-28 13:01:17', '2024-04-28 13:01:17');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2024-04-28 09:45:28', '2024-04-28 09:45:28'),
(2, 'user', 'web', '2024-04-28 09:45:28', '2024-04-28 09:45:28');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `todos`
--

CREATE TABLE `todos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '2024-04-28 09:45:28', '$2y$10$zYY3ovBX2A3S9d0QRhYIFezytjU/8X9wPKQQ/tyvSXKIGgYDlra9i', NULL, '2024-04-28 09:45:29', '2024-04-28 09:45:29'),
(2, 'aya', 'aya@gmail.com', NULL, '$2y$10$jYo5bDGTvOksyZ56o25yLO.si4bORnXAyPAoGTIqFebdYZta84aAC', NULL, '2024-04-28 13:05:02', '2024-04-28 13:05:02'),
(3, 'sameh', 'sameh@gmail.com', NULL, '$2y$10$NT.8wjCcNmrBN7L/0vFxY.OAwzhqTRtM24YGqjN06fqCwdwWm9rjK', NULL, '2024-04-28 13:06:03', '2024-04-28 13:06:03'),
(4, 'mohameh', 'mohamed@gmail.com', NULL, '$2y$10$fJT/e/2R5gbyHMkLYapPL.gCMtc3nK8m36C.YHraPufyUN.op6LMe', NULL, '2024-04-28 13:07:31', '2024-04-28 13:07:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adresses`
--
ALTER TABLE `adresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adresses_user_id_foreign` (`user_id`),
  ADD KEY `adresses_order_id_foreign` (`order_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indexes for table `cart_product`
--
ALTER TABLE `cart_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_product_cart_id_foreign` (`cart_id`),
  ADD KEY `cart_product_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contacts_email_unique` (`email`),
  ADD KEY `contacts_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorites_user_id_foreign` (`user_id`),
  ADD KEY `favorites_product_id_foreign` (`product_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_product_order_id_foreign` (`order_id`),
  ADD KEY `order_product_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

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
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `todos`
--
ALTER TABLE `todos`
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
-- AUTO_INCREMENT for table `adresses`
--
ALTER TABLE `adresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cart_product`
--
ALTER TABLE `cart_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `todos`
--
ALTER TABLE `todos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adresses`
--
ALTER TABLE `adresses`
  ADD CONSTRAINT `adresses_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `adresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart_product`
--
ALTER TABLE `cart_product`
  ADD CONSTRAINT `cart_product_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favorites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
