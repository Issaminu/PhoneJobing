-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 29, 2022 at 03:26 PM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phonejobing`
--

-- --------------------------------------------------------

--
-- Table structure for table `calls`
--

DROP TABLE IF EXISTS `calls`;
CREATE TABLE IF NOT EXISTS `calls` (
  `id` int NOT NULL AUTO_INCREMENT,
  `callId` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` text COLLATE utf8mb4_unicode_ci,
  `result` text COLLATE utf8mb4_unicode_ci,
  `script` text COLLATE utf8mb4_unicode_ci,
  `callDate` date DEFAULT NULL,
  `callLength` text COLLATE utf8mb4_unicode_ci,
  `teleoperateurId` text COLLATE utf8mb4_unicode_ci,
  `clientId` text COLLATE utf8mb4_unicode_ci,
  `productId` text COLLATE utf8mb4_unicode_ci,
  `teamid` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `calls`
--

INSERT INTO `calls` (`id`, `callId`, `quantity`, `result`, `script`, `callDate`, `callLength`, `teleoperateurId`, `clientId`, `productId`, `teamid`, `created_at`, `updated_at`) VALUES
(40, '#APPEL024', '9', 'Vente réussie', 'Mon Script 7', '2022-03-15', '14:55', '25', '1', '11', '14', '2022-03-15 14:16:51', '2022-03-15 14:16:51'),
(39, '#APPEL023', '1', 'Vente réussie', 'Mon Script 7', '2022-03-15', '01:26', '40', '8', '16', '14', '2022-03-15 14:16:10', '2022-03-15 14:16:10'),
(6, '#APPEL003', '̶ ̶ ̶ ̶ ̶ ̶ ̶ ̶ ̶ ̶', 'Appel reporté', 'Bruh Inc', '2022-03-12', '00:17', '25', '1', NULL, '14', '2022-03-09 09:22:11', '2022-03-09 09:22:11'),
(7, '#APPEL004', '̶ ̶ ̶ ̶ ̶ ̶ ̶ ̶ ̶ ̶', 'Aucune réponse', 'Bruh Inc', '2022-03-12', '00:30', '51', '1', NULL, '14', '2022-03-09 09:22:29', '2022-03-09 09:22:29'),
(10, '#APPEL005', '̶ ̶ ̶ ̶ ̶ ̶ ̶ ̶ ̶ ̶', 'Vente non réalisée', 'Mon Script 1', '2022-03-12', '05:32', '25', '1', NULL, '14', '2022-03-10 09:47:54', '2022-03-10 09:47:54'),
(38, '#APPEL022', '6', 'Vente réussie', 'Mon Script 3', '2022-03-15', '03:57', '25', '10', '9', '14', '2022-03-15 14:15:36', '2022-03-15 14:15:36'),
(37, '#APPEL021', '3', 'Vente réussie', 'Mon Script 3', '2022-03-15', '19:30', '48', '10', '12', '14', '2022-03-15 14:15:22', '2022-03-15 14:15:22'),
(36, '#APPEL020', '̶ ̶ ̶ ̶ ̶ ̶ ̶ ̶ ̶ ̶', 'Appel reporté', 'Mon Script 5', '2022-03-15', '00:44', '25', '3', NULL, '14', '2022-03-15 14:13:12', '2022-03-15 14:13:12'),
(35, '#APPEL019', '3', 'Vente réussie', 'Mon Script 2', '2022-03-15', '05:04', '25', '6', '18', '14', '2022-03-15 14:13:00', '2022-03-15 14:13:00'),
(34, '#APPEL018', '̶ ̶ ̶ ̶ ̶ ̶ ̶ ̶ ̶ ̶', 'Vente non réalisée', 'Mon Script 4', '2022-03-15', '03:25', '25', '10', NULL, '14', '2022-03-15 14:12:50', '2022-03-15 14:12:50'),
(33, '#APPEL017', '3', 'Vente réussie', 'Mon Script 5', '2022-03-15', '13:41', '51', '9', '16', '14', '2022-03-15 14:12:39', '2022-03-15 14:12:39'),
(31, '#APPEL015', '2', 'Vente réussie', 'Mon Script 6', '2022-03-15', '08:30', '40', '7', '15', '14', '2022-03-15 13:55:06', '2022-03-15 13:55:06'),
(32, '#APPEL016', '2', 'Vente réussie', 'Mon Script 6', '2022-03-15', '09:12', '25', '7', '18', '14', '2022-03-15 13:55:16', '2022-03-15 13:55:16'),
(41, '#APPEL025', '4', 'Vente réussie', 'Mon Script 2', '2022-03-15', '06:18', '51', '3', '16', '14', '2022-03-15 14:17:04', '2022-03-15 14:17:04'),
(42, '#APPEL026', '̶ ̶ ̶ ̶ ̶ ̶ ̶ ̶ ̶ ̶', 'Mauvaise numéro', 'Mon Script 1', '2022-03-15', '00:10', '25', '1', NULL, '14', '2022-03-15 14:17:23', '2022-03-15 14:17:23'),
(43, '#APPEL027', '̶ ̶ ̶ ̶ ̶ ̶ ̶ ̶ ̶ ̶', 'Vente non réalisée', 'Mon Script 1', '2022-03-15', '00:30', '40', '1', NULL, '14', '2022-03-15 14:17:29', '2022-03-15 14:17:29'),
(44, '#APPEL028', '4', 'Vente réussie', 'Mon Script 6', '2022-03-15', '01:08', '25', '4', '12', '14', '2022-03-15 14:17:58', '2022-03-15 14:17:58'),
(45, '#APPEL029', '̶ ̶ ̶ ̶ ̶ ̶ ̶ ̶ ̶ ̶', 'Appel reporté', 'Mon Script 4', '2022-03-15', '00:10', '48', '9', NULL, '14', '2022-03-15 16:17:35', '2022-03-15 16:17:35'),
(46, '#APPEL030', '5', 'Vente réussie', 'Mon Script 4', '2022-03-15', '00:08', '48', '3', '18', '14', '2022-03-15 16:17:53', '2022-03-15 16:17:53'),
(47, '#APPEL031', '̶ ̶ ̶ ̶ ̶ ̶ ̶ ̶ ̶ ̶', 'Aucune réponse', 'Mon Script 3', '2022-03-15', '00:03', '48', '1', NULL, '14', '2022-03-15 16:18:25', '2022-03-15 16:18:25'),
(48, '#APPEL032', '7', 'Vente réussie', 'Mon Script 5', '2022-03-15', '00:05', '48', '1', '12', '14', '2022-03-15 16:18:45', '2022-03-15 16:18:45'),
(49, '#APPEL033', '̶ ̶ ̶ ̶ ̶ ̶ ̶ ̶ ̶ ̶', 'Vente non réalisée', 'Mon Script 1', '2022-03-15', '00:05', '48', '10', NULL, '14', '2022-03-15 16:19:33', '2022-03-15 16:19:33'),
(50, '#APPEL034', '757', 'Vente réussie', 'Mon Script 5', '2022-03-16', '00:26', '25', '10', '16', '14', '2022-03-16 10:25:07', '2022-03-16 10:25:07'),
(51, '#APPEL035', '4', 'Vente réussie', 'Mon Script 3', '2022-03-25', '00:08', '25', '3', '18', '14', '2022-03-25 16:36:07', '2022-03-25 16:36:07'),
(52, '#APPEL036', '2', 'Vente réussie', 'Mon Script 5', '2022-03-25', '00:05', '25', '7', '18', '14', '2022-03-25 17:27:05', '2022-03-25 17:27:05'),
(53, '#APPEL037', '3', 'Vente réussie', 'Mon Script 1', '2022-03-25', '00:07', '25', '11', '10', '14', '2022-03-25 17:27:19', '2022-03-25 17:27:19'),
(54, '#APPEL038', '̶ ̶ ̶ ̶ ̶ ̶ ̶ ̶ ̶ ̶', 'Appel reporté', 'Mon Script 1', '2022-03-25', '00:03', '25', '4', NULL, '14', '2022-03-25 17:27:29', '2022-03-25 17:27:29'),
(55, '#APPEL039', '̶ ̶ ̶ ̶ ̶ ̶ ̶ ̶ ̶ ̶', 'Vente non réalisée', 'Mon Script 7', '2022-03-25', '00:03', '25', '6', NULL, '14', '2022-03-25 17:27:39', '2022-03-25 17:27:39'),
(56, '#APPEL040', '1', 'Vente réussie', 'Mon Script 1', '2022-03-25', '00:21', '25', '1', '10', '14', '2022-03-25 17:36:22', '2022-03-25 17:36:22'),
(57, '#APPEL041', '̶ ̶ ̶ ̶ ̶ ̶ ̶ ̶ ̶ ̶', 'Vente non réalisée', 'Mon Script 3', '2022-03-25', '00:04', '25', '9', NULL, '14', '2022-03-25 17:36:34', '2022-03-25 17:36:34'),
(58, '#APPEL042', '̶ ̶ ̶ ̶ ̶ ̶ ̶ ̶ ̶ ̶', 'Aucune réponse', 'Mon Script 7', '2022-03-25', '00:01', '25', '11', NULL, '14', '2022-03-25 17:37:55', '2022-03-25 17:37:55'),
(59, '#APPEL043', '̶ ̶ ̶ ̶ ̶ ̶ ̶ ̶ ̶ ̶', 'Vente non réalisée', 'Mon Script 5', '2022-03-25', '00:05', '25', '3', NULL, '14', '2022-03-25 17:47:14', '2022-03-25 17:47:14'),
(60, '#APPEL044', '2', 'Vente réussie', 'Mon Script 1', '2022-03-25', '00:37', '25', '1', '14', '14', '2022-03-25 18:17:24', '2022-03-25 18:17:24'),
(61, '#APPEL045', '̶ ̶ ̶ ̶ ̶ ̶ ̶ ̶ ̶ ̶', 'Mauvaise numéro', 'Mon Script 1', '2022-03-25', '00:19', '25', '1', NULL, '14', '2022-03-25 18:33:02', '2022-03-25 18:33:02');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teleoperateur` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `teamid` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `company`, `position`, `phone`, `teleoperateur`, `email`, `gender`, `country`, `city`, `address`, `zip`, `teamid`, `created_at`, `updated_at`) VALUES
(1, 'Adil Qadour', 'Bruh Inc', 'CEO', '+212612345678', '25', 'AdilKerkach@gmail.com', 'Monsieur', 'Maroc', 'Casa', 'Bruh Str.', '23200', '14', '2022-02-26 14:02:50', '2022-03-28 12:05:01'),
(3, 'Khadija Qadour', 'Cheeze Inc', 'Chef Informatique', '+212612345678', '25', 'khadijaqadour@gmail.com', 'Madame', 'Maroc', 'Rabat', 'Bruh Quarter', '23571', '14', '2022-03-01 17:52:50', '2022-03-28 16:54:09'),
(4, 'Amaya Bode', 'Osinski', 'Coordinator', '+212770027478', '48', '33153@gmail.com', 'Monsieur', 'Senegal', 'West Lowell', '57494 Leffler Street', '92440-4602', '14', '2022-03-04 16:47:30', '2022-03-28 11:56:25'),
(11, 'Kip Kreiger', 'Kreiger Inc', 'National  Developer', '+212846907096', '49', '56184@gmail.com', 'Monsieur', 'Liberia', 'Veronicaton', '990 Margret Gardens', '49662', '14', '2022-03-05 13:04:11', '2022-03-28 12:26:26'),
(6, 'Simone Berg', 'Simone Farms', 'President', '+212623462434', '51', 'simonberg@gmail.com', 'Monsieur', 'France', 'Marseille', '95479 Weimann Point', '234587', '14', '2022-03-04 16:50:11', '2022-03-28 12:27:32'),
(7, 'Camren Nienow', 'DuBuque', 'Chief Technician', '+212889207240', '25', '14743@gmail.com', 'Monsieur', 'Norfolk Island', 'Lonnieport', '7699 Wiegand Fall', '35877-7393', '14', '2022-03-04 17:59:20', '2022-03-28 15:23:12'),
(8, 'Reyna Hilpert', 'Grimes - Grady', 'Functionality Producer', '+212469630890', NULL, '23116@gmail.com', 'Monsieur', 'Cape Verde', '76303-4387', '98 Dedrick Lights', '61191', '14', '2022-03-04 18:02:48', '2022-03-28 15:23:05'),
(9, 'Florencio Goodwin', 'Bailey And Bradtke', 'Code Assistant', '+212606825470', '40', '88732@gmail.com', 'Madame', 'Cocos', 'Daughberg', '11528 Julien River', '88228', '14', '2022-03-04 18:03:16', '2022-03-28 12:25:42'),
(10, 'Hassie Dubuque', 'Larkin And Sons', 'Marketing Officer', '+212541025638', '48', '80391@gmail.com', 'Monsieur', 'Mayotte', 'North Borough', '6376 Dillan View', '82271', '14', '2022-03-05 12:48:11', '2022-03-28 16:44:44');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_02_20_135340_products', 2),
(8, '2022_02_21_132156_create_clients_table', 3),
(9, '2022_03_01_202533_create_scripts_table', 4),
(11, '2022_03_08_135531_create_calls_table', 5),
(12, '2022_03_14_215158_create_sales_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('boubcher.issam@gmail.com', '$2y$10$duSpAsIxiFQJFsree7X9GOXNY9X.H1V71GoVoFabEuHhsVzoY6DEi', '2022-02-06 10:47:11');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `quantity` int NOT NULL,
  `teamid` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `quantity`, `teamid`, `created_at`, `updated_at`) VALUES
(10, 'HP V222vb', 1600.00, 96, '14', '2022-02-20 21:56:47', '2022-03-25 17:36:22'),
(9, 'HP V20 HD+', 1330.00, 45, '14', '2022-02-20 21:56:21', '2022-03-15 16:40:25'),
(8, 'HP Pavilion 15', 8880.00, 422, '14', '2022-02-20 21:56:05', '2022-03-15 16:39:25'),
(11, 'HP Pavilion x360', 6800.00, 2, '14', '2022-02-24 09:08:11', '2022-03-15 16:45:55'),
(12, 'HP DeskJet 415', 1270.00, 8751, '14', '2022-03-04 18:21:43', '2022-03-15 16:18:45'),
(13, 'HP Envy 6055e', 1650.00, 1170, '14', '2022-03-04 18:21:53', '2022-03-10 09:55:31'),
(14, 'HP OfficeJet 20', 4500.00, 2240, '14', '2022-03-04 18:22:12', '2022-03-25 18:17:24'),
(15, 'HP 65XL Black', 330.00, 60, '14', '2022-03-04 18:26:59', '2022-03-15 16:38:23'),
(16, 'HP 24mh FHD', 2110.00, 63, '14', '2022-03-04 18:27:32', '2022-03-25 18:14:42'),
(18, 'HP Pavilion', 9600.00, 254, '14', '2022-03-10 09:30:59', '2022-03-25 17:27:05');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
CREATE TABLE IF NOT EXISTS `sales` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `teleoperateurId` int NOT NULL,
  `callCount` int NOT NULL,
  `earnings` float NOT NULL,
  `saleCount` int NOT NULL,
  `productCount` int NOT NULL,
  `teamid` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `teleoperateurId`, `callCount`, `earnings`, `saleCount`, `productCount`, `teamid`, `created_at`, `updated_at`) VALUES
(1, 25, 22, 67950, 11, 793, '14', NULL, '2022-03-25 18:33:02'),
(2, 40, 3, 2770, 2, 3, '14', NULL, NULL),
(6, 51, 3, 15070, 2, 7, '14', NULL, NULL),
(7, 48, 17, 30700, 15, 15, '14', NULL, '2022-03-15 16:19:33'),
(8, 49, 13, 32000, 4, 4, '14', NULL, NULL),
(10, 44, 7, 13199, 6, 6, '14', NULL, NULL),
(12, 59, 2, 3211, 1, 1, '14', '2022-03-21 20:58:42', '2022-03-21 20:58:42');

-- --------------------------------------------------------

--
-- Table structure for table `scripts`
--

DROP TABLE IF EXISTS `scripts`;
CREATE TABLE IF NOT EXISTS `scripts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `teamid` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scripts`
--

INSERT INTO `scripts` (`id`, `name`, `content`, `teamid`, `created_at`, `updated_at`) VALUES
(12, 'Mon Script 1', '<p>Nulla facilisi. <strong>Pellentesque mollis fermentum quam sed imperdiet. </strong>Cras convallis libero non placerat ornare. Praesent vitae nisl faucibus erat iaculis tristique imperdiet eu magna. Nunc ut lacus fermentum, rutrum nibh a, sollicitudin tortor. Curabitur neque dolor, porta in ligula ac, consectetur porta elit. Etiam non lacinia nisl. Duis at ligula vestibulum<strong>, accumsan ligula sed, rhoncus dui. Quisque tempor facilisis quam, ac volutpat felis consequat a. </strong>Sed vitae lacus at nunc euismod molestie et eget sem. Nam quis posuere ligula, non consequat justo. Phasellus interdum, ex ut venenatis ultrices, <i>neque enim dignissim quam, eget placerat nulla leo non nisl.</i> Praesent rutrum rutrum lorem non fermentum. Aenean urna orci, vehicula pulvinar elementum a, bibendum non nunc. Donec eu sapien at orci lobortis rutrum sit amet non est. <a href=\"google.com\">Maecenas sit amet mauris dapibus, ultrices justo vitae</a>, volutpat metus.</p><p><strong>Lorem ipsum dolor sit amet consectetur adipisicing elit. </strong>Odio, maxime quidem? Facilis, sapiente quibusdam! Magni quam, aliquid expedita reiciendis placeat harum incidunt.<i> Consequatur minima eius tenetur suscipit laboriosam qui repellat. </i>Eveniet optio quos reprehenderit voluptatem, a vero sint sit! Amet, rerum? Fugit minima repellendus cumque nisi modi sunt quaerat itaque odit, laborum, dolores dolorem quidem harum vero? <strong>Architecto, velit unde. Recusandae aspernatur officia voluptas, numquam eveniet tempora natus sed perferendis, dolorum velit non ullam iste placeat vero debitis labore culpa totam qui porro asperiores alias. Numquam facere quas consectetur debitis.</strong></p><p>Atque placeat tenetur fuga, dolorum, et molestiae iure suscipit dignissimos quas delectus magnam veritatis velit temporibus ex non molestias minima officia doloremque cupiditate repellat voluptatibus ipsam vel excepturi. Sequi, nesciunt. Quam numquam eius quas repudiandae tenetur vero repellendus placeat, maiores porro laborum consequatur fugit nam at odit aperiam, maxime eos minus quis magnam laudantium ad atque in optio aut. Atque? Officiis nesciunt deleniti neque ratione eligendi corporis molestiae officia sunt maiores culpa molestias nulla laudantium, quas, <strong>vitae nostrum quaerat. Ratione, quaerat.</strong> Error libero ipsum nesciunt dolor itaque alias nisi non. Obcaecati consectetur eligendi numquam dicta tenetur nemo voluptate, odio in, esse sed soluta temporibus quis ratione ad eos velit nesciunt? Nisi harum voluptatum ut aliquam ratione a quis, officiis quod! Ipsa, est! Hic,<strong> a enim. Quis asperiores dignissimos modi aliquid beatae maiores id non ullam recusandae obcaecati?</strong> Nemo.</p>', '14', '2022-03-05 13:47:16', '2022-03-28 18:05:37'),
(13, 'Mon Script 5', '<p>In viverra faucibus lorem lobortis ultricies. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse porta lacinia diam ac eleifend. <strong>Nunc non molestie ipsum. Nam maximus massa purus, at commodo quam ultrices eu. Aenean ut mi felis. </strong>Maecenas ultricies tincidunt finibus. Aenean euismod dolor erat, vel ornare metus pharetra ornare. Donec id eleifend elit. Duis a interdum mauris. Integer <strong>vitae arcu quis velit bibendum pulvinar non id risus</strong>. <i>Maecenas sit amet facilisis lacus. </i>Sed convallis dui eu ante tempor rhoncus. Proin vitae dui sit amet lorem accumsan lacinia. Curabitur lacinia blandit lorem nec feugiat.</p><p>In viverra faucibus lorem lobortis ultricies. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse porta lacinia diam ac eleifend. Nunc non molestie ipsum<strong>. Nam maximus massa purus, at commodo quam ultrices eu. Aenean ut mi felis. Maecenas ultricies tincidunt finibus. Aenean euismod dolor erat, vel ornare metus pharetra ornare. Donec id eleifend elit. Duis a interdum mauris. Integer vitae arcu quis velit bibendum pulvinar non id risus. Maecenas sit amet facilisis lacus. Sed convallis dui eu ante tempor rhoncus. Proin vitae dui sit amet lorem accumsan lacinia. Curabitur lacinia blandit lorem nec feugiat.</strong></p><p>In viverra faucibus lorem lobortis ultricies. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse porta lacinia diam ac eleifend. Nunc non molestie ipsum. Nam maximus massa purus, at commodo quam ultrices eu. Aenean ut mi felis. Maecenas ultricies tincidunt finibus. Aenean euismod dolor erat, vel ornare metus pharetra ornare. Donec id eleifend elit. Duis a interdum mauris. Integer vitae arcu quis velit bibendum pulvinar non id risus. Maecenas sit amet facilisis lacus. Sed convallis dui eu ante tempor rhoncus. Proin vitae dui sit amet lorem accumsan lacinia. Curabitur lacinia blandit lorem nec feugiat.</p><p>In viverra faucibus lorem lobortis ultricies. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse porta lacinia diam ac eleifend. Nunc non molestie ipsum. Nam maximus massa purus, at commodo quam ultrices eu. Aenean ut mi felis. Maecenas ultricies tincidunt finibus. Aenean euismod dolor erat, vel ornare metus pharetra ornare. Donec id eleifend elit. Duis a interdum mauris. Integer vitae arcu quis velit bibendum pulvinar non id risus. Maecenas sit amet facilisis lacus. Sed convallis dui eu ante tempor rhoncus. Proin vitae dui sit amet lorem accumsan lacinia. Curabitur lacinia blandit lorem nec feugiat.</p>', '14', '2022-03-05 15:12:44', '2022-03-15 14:06:07'),
(2, 'Mon Script 2', '<h3>Aliquam suscipit, mi vitae tristique bibendum.</h3><p>&nbsp;Praesent <strong>Pellentesque sem metus, </strong><i>pellentesque quis pharetra id, bibendum at ex. Fusce hendrerit maximus semper. </i>Fusce at imperdiet eros.</p><ul><li>Aliquam suscipit, mi vitae tristique bibendum, est dolor rutrum odio.<ol><li>mi vitae tristique bibendum, est dolor rutrum odio.</li><li>Praesent accumsan nibh eget finibus congue.</li><li>vel mollis ante tincidunt sed.<ul><li>Atque placeat tenetur fuga.</li><li>maiores porro laborum consequatur fugit nam at odit aperiam.</li></ul></li></ol></li><li>Pellentesque quis pharetra id donec.</li><li>Nullam sed accumsan neque.</li></ul><h4>Dignissim faucibus accumsan semper</h4><p>Porttitor vitae libero. Proin vitae nibh tincidunt, sollicitudin ligula id, porttitor nisi<strong>.</strong></p><p>&nbsp;</p>', '14', '2022-03-05 11:18:41', '2022-03-28 18:05:50'),
(3, 'Mon Script 6', '<p><strong>Lorem ipsum dolor sit amet consectetur adipisicing elit. </strong>Odio, maxime quidem? Facilis, sapiente quibusdam! Magni quam, aliquid expedita reiciendis placeat harum incidunt.<i> Consequatur minima eius tenetur suscipit laboriosam qui repellat. </i>Eveniet optio quos reprehenderit voluptatem, a vero sint sit! Amet, rerum? Fugit minima repellendus cumque nisi modi sunt quaerat itaque odit, laborum, dolores dolorem quidem harum vero? <strong>Architecto, velit unde. Recusandae aspernatur officia voluptas, numquam eveniet tempora natus sed perferendis, dolorum velit non ullam iste placeat vero debitis labore culpa totam qui porro asperiores alias. Numquam facere quas consectetur debitis.</strong></p><p>Atque placeat tenetur fuga, dolorum, et molestiae iure suscipit dignissimos quas delectus magnam veritatis velit temporibus ex non molestias minima officia doloremque cupiditate repellat voluptatibus ipsam vel excepturi. Sequi, nesciunt. Quam numquam eius quas repudiandae tenetur vero repellendus placeat, maiores porro laborum consequatur fugit nam at odit aperiam, maxime eos minus quis magnam laudantium ad atque in optio aut. Atque? Officiis nesciunt deleniti neque ratione eligendi corporis molestiae officia sunt maiores culpa molestias nulla laudantium, quas, <strong>vitae nostrum quaerat. Ratione, quaerat.</strong> Error libero ipsum nesciunt dolor itaque alias nisi non. Obcaecati consectetur eligendi numquam dicta tenetur nemo voluptate, odio in, esse sed soluta temporibus quis ratione ad eos velit nesciunt? Nisi harum voluptatum ut aliquam ratione a quis, officiis quod! Ipsa, est! Hic,<strong> a enim. Quis asperiores dignissimos modi aliquid beatae maiores id non ullam recusandae obcaecati?</strong> Nemo, accusantium quibusdam autem ea veniam, voluptatibus, placeat explicabo ratione obcaecati velit adipisci? Nesciunt nam, dolorem et veritatis qui quaerat quidem officiis possimus doloribus itaque nisi vel amet optio nulla maiores temporibus asperiores consequatur placeat omnis quos praesentium. Sunt distinctio earum aspernatur fugiat. Tempore, illum. Officiis, ducimus optio? Necessitatibus ea sapiente labore temporibus asperiores molestiae aperiam fugit molestias, corporis eos dolorum ipsa velit commodi expedita sit ab distinctio quam ex neque similique.</p>', '14', '2022-03-05 11:20:29', '2022-03-15 14:06:19'),
(4, 'Mon Script 7', '<p><strong>Lorem ipsum dolor sit amet consectetur adipisicing elit. </strong>Odio, maxime quidem? Facilis, sapiente quibusdam! Magni quam, aliquid expedita reiciendis placeat harum incidunt.<i> Consequatur minima eius tenetur suscipit laboriosam qui repellat. </i>Eveniet optio quos reprehenderit voluptatem, a vero sint sit! Amet, rerum? Fugit minima repellendus cumque nisi modi sunt quaerat itaque odit, laborum, dolores dolorem quidem harum vero? <strong>Architecto, velit unde. Recusandae aspernatur officia voluptas, numquam eveniet tempora natus sed perferendis, dolorum velit non ullam iste placeat vero debitis labore culpa totam qui porro asperiores alias. Numquam facere quas consectetur debitis.</strong></p><p>Atque placeat tenetur fuga, dolorum, et molestiae iure suscipit dignissimos quas delectus magnam veritatis velit temporibus ex non molestias minima officia doloremque cupiditate repellat voluptatibus ipsam vel excepturi. Sequi, nesciunt. Quam numquam eius quas repudiandae tenetur vero repellendus placeat, maiores porro laborum consequatur fugit nam at odit aperiam, maxime eos minus quis magnam laudantium ad atque in optio aut. Atque? Officiis nesciunt deleniti neque ratione eligendi corporis molestiae officia sunt maiores culpa molestias nulla laudantium, quas, <strong>vitae nostrum quaerat. Ratione, quaerat.</strong> Error libero ipsum nesciunt dolor itaque alias nisi non. Obcaecati consectetur eligendi numquam dicta tenetur nemo voluptate, odio in, esse sed soluta temporibus quis ratione ad eos velit nesciunt? Nisi harum voluptatum ut aliquam ratione a quis, officiis quod! Ipsa, est! Hic,<strong> a enim. Quis asperiores dignissimos modi aliquid beatae maiores id non ullam recusandae obcaecati?</strong> Nemo, accusantium quibusdam autem ea veniam, voluptatibus, placeat explicabo ratione obcaecati velit adipisci? Nesciunt nam, dolorem et veritatis qui quaerat quidem officiis possimus doloribus itaque nisi vel amet optio nulla maiores temporibus asperiores consequatur placeat omnis quos praesentium. Sunt distinctio earum aspernatur fugiat. Tempore, illum. Officiis, ducimus optio? Necessitatibus ea sapiente labore temporibus asperiores molestiae aperiam fugit molestias, corporis eos dolorum ipsa velit commodi expedita sit ab distinctio quam ex neque similique.</p>', '14', '2022-03-05 11:23:20', '2022-03-15 14:06:33'),
(11, 'Mon Script 4', '<p><strong>Lorem ipsum dolor sit amet consectetur adipisicing elit. </strong>Odio, maxime quidem? Facilis, sapiente quibusdam! Magni quam, aliquid expedita reiciendis placeat harum incidunt.<i> Consequatur minima eius tenetur suscipit laboriosam qui repellat. </i>Eveniet optio quos reprehenderit voluptatem, a vero sint sit! Amet, rerum? Fugit minima repellendus cumque nisi modi sunt quaerat itaque odit, laborum, dolores dolorem quidem harum vero? <strong>Architecto, velit unde. Recusandae aspernatur officia voluptas, numquam eveniet tempora natus sed perferendis, dolorum velit non ullam iste placeat vero debitis labore culpa totam qui porro asperiores alias. Numquam facere quas consectetur debitis.</strong></p><p>Atque placeat tenetur fuga, dolorum, et molestiae iure suscipit dignissimos quas delectus magnam veritatis velit temporibus ex non molestias minima officia doloremque cupiditate repellat voluptatibus ipsam vel excepturi. Sequi, nesciunt. Quam numquam eius quas repudiandae tenetur vero repellendus placeat, maiores porro laborum consequatur fugit nam at odit aperiam, maxime eos minus quis magnam laudantium ad atque in optio aut. Atque? Officiis nesciunt deleniti neque ratione eligendi corporis molestiae officia sunt maiores culpa molestias nulla laudantium, quas, <strong>vitae nostrum quaerat. Ratione, quaerat.</strong> Error libero ipsum nesciunt dolor itaque alias nisi non. Obcaecati consectetur eligendi numquam dicta tenetur nemo voluptate, odio in, esse sed soluta temporibus quis ratione ad eos velit nesciunt? Nisi harum voluptatum ut aliquam ratione a quis, officiis quod! Ipsa, est! Hic,<strong> a enim. Quis asperiores dignissimos modi aliquid beatae maiores id non ullam recusandae obcaecati?</strong> Nemo, accusantium quibusdam autem ea veniam, voluptatibus, placeat explicabo ratione obcaecati velit adipisci? Nesciunt nam, dolorem et veritatis qui quaerat quidem officiis possimus doloribus itaque nisi vel amet optio nulla maiores temporibus asperiores consequatur placeat omnis quos praesentium. Sunt distinctio earum aspernatur fugiat. Tempore, illum. Officiis, ducimus optio? Necessitatibus ea sapiente labore temporibus asperiores molestiae aperiam fugit molestias, corporis eos dolorum ipsa velit commodi expedita sit ab distinctio quam ex neque similique.</p>', '14', '2022-03-05 13:35:35', '2022-03-28 18:00:06'),
(15, 'Mon Script 3', '<p><strong>Lorem ipsum dolor sit amet consectetur adipisicing elit. </strong>Odio, maxime quidem? Facilis, sapiente quibusdam! Magni quam, aliquid expedita reiciendis placeat harum incidunt.<i> Consequatur minima eius tenetur suscipit laboriosam qui repellat. </i>Eveniet optio quos reprehenderit voluptatem, a vero sint sit! Amet, rerum? Fugit minima repellendus cumque nisi modi sunt quaerat itaque odit, laborum, dolores dolorem quidem harum vero? <strong>Architecto, velit unde. Recusandae aspernatur officia voluptas, numquam eveniet tempora natus sed perferendis, dolorum velit non ullam iste placeat vero debitis labore culpa totam qui porro asperiores alias. Numquam facere quas consectetur debitis.</strong></p><p>Atque placeat tenetur fuga, dolorum, et molestiae iure suscipit dignissimos quas delectus magnam veritatis velit temporibus ex non molestias minima officia doloremque cupiditate repellat voluptatibus ipsam vel excepturi. Sequi, nesciunt. Quam numquam eius quas repudiandae tenetur vero repellendus placeat, maiores porro laborum consequatur fugit nam at odit aperiam, maxime eos minus quis magnam laudantium ad atque in optio aut. Atque? Officiis nesciunt deleniti neque ratione eligendi corporis molestiae officia sunt maiores culpa molestias nulla laudantium, quas, <strong>vitae nostrum quaerat. Ratione, quaerat.</strong> Error libero ipsum nesciunt dolor itaque alias nisi non. Obcaecati consectetur eligendi numquam dicta tenetur nemo voluptate, odio in, esse sed soluta temporibus quis ratione ad eos velit nesciunt? Nisi harum voluptatum ut aliquam ratione a quis, officiis quod! Ipsa, est! Hic,<strong> a enim. Quis asperiores dignissimos modi aliquid beatae maiores id non ullam recusandae obcaecati?</strong> Nemo, accusantium quibusdam autem ea veniam, voluptatibus, placeat explicabo ratione obcaecati velit adipisci? Nesciunt nam, dolorem et veritatis qui quaerat quidem officiis possimus doloribus itaque nisi vel amet optio nulla maiores temporibus asperiores consequatur placeat omnis quos praesentium. Sunt distinctio earum aspernatur fugiat. Tempore, illum. Officiis, ducimus optio? Necessitatibus ea sapiente labore temporibus asperiores molestiae aperiam fugit molestias, corporis eos dolorum ipsa velit commodi expedita sit ab distinctio quam ex neque similique.</p>', '14', '2022-03-05 15:29:10', '2022-03-15 14:05:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `teamid` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clients` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `company`, `type`, `teamid`, `phone`, `clients`, `country`, `city`, `address`, `zip`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(14, 'Issam Boubcher', 'manager@gmail.com', NULL, '$2y$10$mt679LM0xw9vk9QS8OBkG.6F.qIGPqahlDdV7eSs/f8MWxQdXWwN2', 'La Baggette', 'manager', '14', '+212612345678', NULL, '', '', '', NULL, 'U0NbtJ0Me2gItjq3ZeObjBAg.jpg', 'c7mOYZoI9l7TNpKGrMyV2zRN4dLE7S9y3kgYTMikZ1O2gaGTYhQxYWS5ahIo', '2022-02-07 12:48:42', '2022-03-19 19:45:52'),
(25, 'Keaton Dubuque', 'teleoperateur@gmail.com', NULL, '$2y$10$hLVbRDn0ilAOB3Vp6e.H3O2RrrD1gY5Zwx.wF5q37xWG1V9lzhdNq', 'La Baggette', 'teleoperateur', '14', '+212612345678', '[\"1\",\"7\",\"3\"]', 'Paraguay', 'Reichelfort', '6195 Mauricio Drives', '93774', 'YxdUbZ9HHDhopbechiQBzdKh.jpg', NULL, '2022-02-17 17:01:10', '2022-03-28 16:54:09'),
(12, 'Commercial', 'commercial@gmail.com', NULL, '$2y$10$oqIydMxREUyPzuGZUlZ8Su3/0pu0OUAxLbj/oqVzI1c/032.QzvIm', 'La Baggette', 'commercial', '14', '+212612345678', NULL, NULL, NULL, NULL, NULL, 'defaultPFP.webp', NULL, '2022-02-06 12:10:49', '2022-03-19 19:45:49'),
(11, 'William Chainsberg', 'boubcher.issam@gmail.com', NULL, '$2y$10$HINo82GtgGxHAjxpjY.K2OWI0W7YSILUkp9O2voZBsMTRtQDkrznS', NULL, 'manager', '11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-06 11:50:22', '2022-02-06 11:50:22'),
(10, 'sdvdvsd', 'fasafs@gege', NULL, '$2y$10$JGD7uvvJE5ZVjAPqfF5Wu.EOaURTOTzub3hsQFEDMIDC9VdtnbFku', NULL, 'manager', '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-06 11:23:59', '2022-02-06 11:23:59'),
(43, 'Hmidan Hmodan', 'hmadani@gmail.com', NULL, '$2y$10$udIGgTaTt0w/P9dh0kFXBes6fFytTS12b5VyaILSB.1bTnrmZ//Jm', 'La Baggette', 'commercial', '14', '+212612345678', NULL, '', '', '', NULL, 'lawPJDSh7xF6GEBkK6I9HOJm.webp', NULL, '2022-02-26 13:58:00', '2022-03-19 20:23:36'),
(41, 'Issam Qadour', 'issam-assoum@gmail.com', NULL, '$2y$10$zo.8dBYDuJ9YJizTV6ia.eQu6fYYo.Ggdqjtk.xfIdozbDlES5RiS', 'La Baggette', 'commercial', '14', '+212612345678', NULL, '', '', '', NULL, '2v1wAahxdP6N0MNThsTmZZC.jpg', NULL, '2022-02-26 13:37:47', '2022-03-19 20:21:39'),
(40, 'Omar Qadour', 'omarqadour@gmail.com', NULL, '$2y$10$rRXsH.ZWq8ddxWX/WTyza.ssOY6jPCtMA0q0/vkkpnX8CZNXY9OFe', 'La Baggette', 'teleoperateur', '14', '+212612345678', '[\"9\"]', 'Maroc', 'Fquih Ben Salah', 'Yassamine Str.', '23456', 'vgjFpdc4PVf0EMlR4R3npb5s.jpg', NULL, '2022-02-26 13:35:20', '2022-03-28 12:25:42'),
(33, 'plsWork', 'plsmaan@gmail.com', NULL, '$2y$10$2FllsKcYxvlJZhD1zw1Hj.E3NcGK6C5Ie5jxoHkfP3OVED8y5f7Au', NULL, 'manager', '33', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-24 08:48:18', '2022-02-24 08:48:18'),
(34, 'testtest', 'testmee@gmail.com', NULL, '$2y$10$XpuxuSe7gexoWzuTVRkoku8q8JOqJ9H5XfEsFJoNg51VlkP3NNd4W', NULL, 'manager', '34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-24 08:49:58', '2022-02-24 08:49:58'),
(35, 'Testinghee', 'testing@gmail.com', NULL, '$2y$10$8vv6HMssRxx4A/VwMgI4JOapbRNCw3bYPnD.Z.Tg.yHMiCAA3SDNi', NULL, 'teleoperateur', '34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-24 08:53:09', '2022-02-24 08:53:09'),
(49, 'Test Qadour', 'testqadour@gmail.com', NULL, '$2y$10$iS2XCbklkNcFX6W3.8YoJuLzR6F/Up0ihV/zZnZJ18Zgdl1RwzUlW', 'La Baggette', 'teleoperateur', '14', '+21262346342', '[\"11\"]', 'Maroc', 'Rabat', 'Test Str.', '23562', 'CDb4qddcCwAyJjguWuZCZ6L.jpg', NULL, '2022-03-01 18:07:46', '2022-03-28 12:27:13'),
(47, 'Halim Qadour', 'halimQadour@gmail.com', NULL, '$2y$10$V80pYoI5.FttWsx.5tCYsel8QfTQyET8fWM3wLnTi7bzuDbyd/jqK', 'La Baggette', 'commercial', '14', '+212612345678', NULL, '', '', '', NULL, 'wuCZ0svhyRPybIzLGUtrWv7k.jpg', NULL, '2022-02-27 21:47:01', '2022-03-19 19:45:49'),
(44, 'Mohammed Qadour', 'mohammedHamid@gmail.com', NULL, '$2y$10$XPge4RWh.X5ChFLcvuDHNOn4GkmviQDSLWbPcOAAxk/oMNbtEVP/u', 'La Baggette', 'teleoperateur', '14', '+212612345678', NULL, '', '', '', NULL, 'YiQCw5HmUcKfGoKGDsknK.jpg', NULL, '2022-02-27 14:43:56', '2022-03-21 20:52:23'),
(45, 'zdalalay', 'zdd@gmail.com', NULL, '$2y$10$w3W.aLfHJ9z9XfSZydH6zOxzKoZioK57heMLU9EICNg8ZUBrSrcTy', 'Bruh inc', 'manager', '45', '123124124124', NULL, 'maroc', 'Casa', 'Casa Street', '23523', 'F8CusS0pneDEpYnfzs53B.jpg', NULL, '2022-02-27 16:22:02', '2022-02-27 16:22:02'),
(46, 'Bruh Tele', 'tete@gmail.com', NULL, '$2y$10$47RyfgDIVtKFcVaJd9eLZe.cysNcQ8MCnTfylyDUkI.3B.0PXzUeu', 'Bruh inc', 'teleoperateur', '45', '34242351', NULL, 'Maroc', 'Bruh Ville', 'Bruh Str', '3423421', '5mO1is0e1eDelaOagfK519.jpg', NULL, '2022-02-27 16:28:47', '2022-02-27 16:28:47'),
(48, 'Hicham Doe', 'hichamdoe@gmail.com', NULL, '$2y$10$mt679LM0xw9vk9QS8OBkG.6F.qIGPqahlDdV7eSs/f8MWxQdXWwN2', 'La Baggette', 'teleoperateur', '14', '+212612345678', '[\"4\",\"10\"]', 'Maroc', 'Fquih Ben Salah', 'Yassamine Av.', '23411', 'ygszDrssl45qGHcym382l.jpg', NULL, '2022-03-01 15:33:24', '2022-03-28 20:32:11'),
(50, 'Testmanager Hey', 'testhey@gmail.com', NULL, '$2y$10$EHVY3hoOZ7gy44375cGmTuDbrPCmLi7ejamvn04ktWgmSpLeWaIOW', 'hey inc', 'manager', '50', '+212612345678', NULL, 'hehe', 'Qweqwe', 'Qweqwe', 'qweqwe', 'defaultPFP.webp', NULL, '2022-03-01 18:13:13', '2022-03-01 18:13:13'),
(51, 'Guiseppe Batz', '13078@gmail.com', NULL, '$2y$10$20F17TyLaU.CKvreusv0Lu0dUWsRQXMMGeNIeKQuau0br1QzDxstG', 'La Baggette', 'teleoperateur', '14', '550-918-7371', '[\"6\"]', 'Guernsey', 'South Helmerburgh', '709 Sheridan Trafficway', '12196-1856', 'yZ58AxzjZJcgkWAXJBLZEya0.png', NULL, '2022-03-04 16:47:00', '2022-03-28 12:27:32'),
(59, 'Zetta Rogahn', '38184@gmail.com', NULL, '$2y$10$wdiOy2MZ5O6Z/7NPTA8RUeTxfLFYEflITyckhP6v67qBadvXtMdWq', 'La Baggette', 'teleoperateur', '14', '+212918294646', NULL, 'Indonesia', 'West Jay', '365 Jessyca Rue', '61610', 'LhkD8luQt6MUsgYTe4DqMve0.webp', NULL, '2022-03-21 20:58:42', '2022-03-28 20:50:22');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
