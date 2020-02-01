-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Feb 01, 2020 at 03:20 PM
-- Server version: 5.7.28
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taskman`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_rows`
--

DROP TABLE IF EXISTS `data_rows`;
CREATE TABLE IF NOT EXISTS `data_rows` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `data_type_id` int(10) UNSIGNED NOT NULL,
  `field` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `browse` tinyint(1) NOT NULL DEFAULT '1',
  `read` tinyint(1) NOT NULL DEFAULT '1',
  `edit` tinyint(1) NOT NULL DEFAULT '1',
  `add` tinyint(1) NOT NULL DEFAULT '1',
  `delete` tinyint(1) NOT NULL DEFAULT '1',
  `details` text COLLATE utf8mb4_unicode_ci,
  `order` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `data_rows_data_type_id_foreign` (`data_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_rows`
--

INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`) VALUES
(1, 1, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(2, 1, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(3, 1, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, NULL, 3),
(4, 1, 'password', 'password', 'Password', 1, 0, 0, 1, 1, 0, NULL, 4),
(5, 1, 'remember_token', 'text', 'Remember Token', 0, 0, 0, 0, 0, 0, NULL, 5),
(6, 1, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, NULL, 6),
(7, 1, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 7),
(8, 1, 'avatar', 'image', 'Avatar', 0, 1, 1, 1, 1, 1, NULL, 8),
(9, 1, 'user_belongsto_role_relationship', 'relationship', 'Role', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":0}', 10),
(10, 1, 'user_belongstomany_role_relationship', 'relationship', 'Roles', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}', 11),
(11, 1, 'settings', 'hidden', 'Settings', 0, 0, 0, 0, 0, 0, NULL, 12),
(12, 2, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(13, 2, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(14, 2, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(15, 2, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(16, 3, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(17, 3, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(18, 3, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(19, 3, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(20, 3, 'display_name', 'text', 'Display Name', 1, 1, 1, 1, 1, 1, NULL, 5),
(21, 1, 'role_id', 'text', 'Role', 1, 1, 1, 1, 1, 1, NULL, 9),
(22, 4, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(23, 4, 'name', 'text', 'Name', 0, 1, 1, 1, 1, 1, '{}', 2),
(24, 4, 'description', 'rich_text_box', 'Description', 0, 1, 1, 1, 1, 1, '{}', 3),
(26, 4, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 5),
(27, 4, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 6),
(28, 5, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(29, 5, 'title', 'text', 'Title', 0, 1, 1, 1, 1, 1, '{}', 2),
(30, 5, 'project_id', 'text', 'Project Id', 0, 0, 1, 1, 1, 1, '{}', 13),
(31, 5, 'user_id', 'text', 'User Id', 0, 0, 1, 1, 1, 1, '{}', 14),
(32, 5, 'status_id', 'text', 'Status Id', 0, 0, 1, 1, 1, 0, '{}', 15),
(33, 5, 'due_date', 'timestamp', 'Date', 0, 0, 1, 1, 1, 1, '{}', 8),
(34, 5, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 17),
(35, 5, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 19),
(36, 5, 'task_belongsto_user_relationship', 'relationship', 'User', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\User\",\"table\":\"users\",\"type\":\"belongsTo\",\"column\":\"user_id\",\"key\":\"id\",\"label\":\"email\",\"pivot_table\":\"data_rows\",\"pivot\":\"0\",\"taggable\":\"0\"}', 4),
(37, 5, 'images', 'multiple_images', 'Images', 0, 0, 1, 1, 1, 1, '{}', 7),
(38, 7, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(39, 7, 'name', 'text', 'Name', 0, 1, 1, 1, 1, 1, '{}', 2),
(40, 7, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 3),
(41, 7, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 4),
(42, 5, 'task_belongsto_status_relationship', 'relationship', 'Status', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Status\",\"table\":\"statuses\",\"type\":\"belongsTo\",\"column\":\"status_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"data_rows\",\"pivot\":\"0\",\"taggable\":\"0\"}', 5),
(43, 5, 'task_belongsto_project_relationship', 'relationship', 'Project', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Project\",\"table\":\"projects\",\"type\":\"belongsTo\",\"column\":\"project_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"data_rows\",\"pivot\":\"0\",\"taggable\":\"0\"}', 6),
(44, 8, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(45, 8, 'title', 'text', 'Title', 0, 1, 1, 1, 1, 1, '{}', 2),
(46, 8, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 3),
(47, 8, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 4),
(48, 9, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(49, 9, 'title', 'text', 'Title', 0, 1, 1, 1, 1, 1, '{}', 2),
(50, 9, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 3),
(51, 9, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 4),
(52, 5, 'task_belongsto_user_relationship_1', 'relationship', 'Reported by', 0, 0, 1, 1, 1, 1, '{\"model\":\"App\\\\User\",\"table\":\"users\",\"type\":\"belongsTo\",\"column\":\"reported_by\",\"key\":\"id\",\"label\":\"email\",\"pivot_table\":\"data_rows\",\"pivot\":\"0\",\"taggable\":\"0\"}', 11),
(53, 5, 'task_hasone_type_relationship', 'relationship', 'Type', 0, 0, 1, 1, 1, 1, '{\"model\":\"App\\\\Type\",\"table\":\"types\",\"type\":\"belongsTo\",\"column\":\"type_id\",\"key\":\"id\",\"label\":\"title\",\"pivot_table\":\"data_rows\",\"pivot\":\"0\",\"taggable\":\"0\"}', 10),
(54, 5, 'reported_by', 'text', 'Reported By', 0, 0, 1, 1, 1, 1, '{}', 16),
(55, 5, 'type_id', 'text', 'Type Id', 0, 0, 1, 1, 1, 1, '{}', 18),
(56, 5, 'link', 'text', 'Link', 0, 0, 1, 1, 1, 1, '{}', 9),
(57, 5, 'priority_id', 'text', 'Priority Id', 0, 0, 1, 1, 1, 1, '{}', 20),
(58, 5, 'code', 'text', 'Code', 0, 1, 1, 1, 1, 1, '{}', 3),
(59, 5, 'task_hasone_priority_relationship', 'relationship', 'Priority', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Priority\",\"table\":\"priorities\",\"type\":\"belongsTo\",\"column\":\"priority_id\",\"key\":\"id\",\"label\":\"title\",\"pivot_table\":\"data_rows\",\"pivot\":\"0\",\"taggable\":\"0\"}', 12),
(60, 4, 'images', 'multiple_images', 'Images', 0, 1, 1, 1, 1, 1, '{}', 4);

-- --------------------------------------------------------

--
-- Table structure for table `data_types`
--

DROP TABLE IF EXISTS `data_types`;
CREATE TABLE IF NOT EXISTS `data_types` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT '0',
  `server_side` tinyint(4) NOT NULL DEFAULT '0',
  `details` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `data_types_name_unique` (`name`),
  UNIQUE KEY `data_types_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_types`
--

INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `policy_name`, `controller`, `description`, `generate_permissions`, `server_side`, `details`, `created_at`, `updated_at`) VALUES
(1, 'users', 'users', 'User', 'Users', 'voyager-person', 'TCG\\Voyager\\Models\\User', 'TCG\\Voyager\\Policies\\UserPolicy', 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController', '', 1, 0, NULL, '2020-01-28 16:50:17', '2020-01-28 16:50:17'),
(2, 'menus', 'menus', 'Menu', 'Menus', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', NULL, '', '', 1, 0, NULL, '2020-01-28 16:50:17', '2020-01-28 16:50:17'),
(3, 'roles', 'roles', 'Role', 'Roles', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', NULL, '', '', 1, 0, NULL, '2020-01-28 16:50:17', '2020-01-28 16:50:17'),
(4, 'projects', 'projects', 'Project', 'Projects', 'voyager-treasure', 'App\\Project', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-02-01 11:29:07', '2020-02-01 13:10:05'),
(5, 'tasks', 'tasks', 'Task', 'Tasks', 'voyager-play', 'App\\Task', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-02-01 11:39:37', '2020-02-01 13:02:46'),
(6, 'status', 'status', 'Status', 'Statuses', 'voyager-bag', 'App\\Status', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2020-02-01 12:15:37', '2020-02-01 12:15:37'),
(7, 'statuses', 'statuses', 'Status', 'Statuses', 'voyager-bag', 'App\\Status', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2020-02-01 12:17:32', '2020-02-01 12:17:32'),
(8, 'types', 'types', 'Type', 'Task types', 'voyager-paper-plane', 'App\\Type', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-02-01 12:47:58', '2020-02-01 12:48:36'),
(9, 'priorities', 'priorities', 'Priority', 'Priorities', 'voyager-double-up', 'App\\Priority', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2020-02-01 12:51:20', '2020-02-01 12:51:20');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menus_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2020-01-28 16:50:18', '2020-01-28 16:50:18');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

DROP TABLE IF EXISTS `menu_items`;
CREATE TABLE IF NOT EXISTS `menu_items` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `menu_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `menu_items_menu_id_foreign` (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`) VALUES
(1, 1, 'Dashboard', '', '_self', 'voyager-boat', NULL, NULL, 1, '2020-01-28 16:50:18', '2020-01-28 16:50:18', 'voyager.dashboard', NULL),
(2, 1, 'Media', '', '_self', 'voyager-images', NULL, NULL, 9, '2020-01-28 16:50:18', '2020-02-01 12:51:33', 'voyager.media.index', NULL),
(3, 1, 'Users', '', '_self', 'voyager-person', NULL, NULL, 4, '2020-01-28 16:50:18', '2020-02-01 12:16:14', 'voyager.users.index', NULL),
(4, 1, 'Roles', '', '_self', 'voyager-lock', NULL, NULL, 8, '2020-01-28 16:50:18', '2020-02-01 12:51:33', 'voyager.roles.index', NULL),
(5, 1, 'Tools', '', '_self', 'voyager-tools', NULL, NULL, 10, '2020-01-28 16:50:18', '2020-02-01 12:51:29', NULL, NULL),
(6, 1, 'Menu Builder', '', '_self', 'voyager-list', NULL, 5, 1, '2020-01-28 16:50:18', '2020-02-01 11:34:19', 'voyager.menus.index', NULL),
(7, 1, 'Database', '', '_self', 'voyager-data', NULL, 5, 2, '2020-01-28 16:50:18', '2020-02-01 11:34:19', 'voyager.database.index', NULL),
(8, 1, 'Compass', '', '_self', 'voyager-compass', NULL, 5, 3, '2020-01-28 16:50:18', '2020-02-01 11:34:19', 'voyager.compass.index', NULL),
(9, 1, 'BREAD', '', '_self', 'voyager-bread', NULL, 5, 4, '2020-01-28 16:50:18', '2020-02-01 11:34:19', 'voyager.bread.index', NULL),
(10, 1, 'Settings', '', '_self', 'voyager-settings', NULL, NULL, 11, '2020-01-28 16:50:18', '2020-02-01 12:51:29', 'voyager.settings.index', NULL),
(11, 1, 'Hooks', '', '_self', 'voyager-hook', NULL, 5, 5, '2020-01-28 16:50:18', '2020-02-01 11:34:19', 'voyager.hooks', NULL),
(12, 1, 'Projects', '', '_self', 'voyager-treasure', '#000000', NULL, 2, '2020-02-01 11:29:07', '2020-02-01 11:34:55', 'voyager.projects.index', 'null'),
(13, 1, 'Tasks', '', '_self', 'voyager-play', NULL, NULL, 3, '2020-02-01 11:39:37', '2020-02-01 12:16:14', 'voyager.tasks.index', NULL),
(15, 1, 'Statuses', '', '_self', 'voyager-bag', NULL, NULL, 5, '2020-02-01 12:17:32', '2020-02-01 12:17:49', 'voyager.statuses.index', NULL),
(16, 1, 'Task types', '', '_self', 'voyager-paper-plane', '#000000', NULL, 6, '2020-02-01 12:47:58', '2020-02-01 12:51:38', 'voyager.types.index', 'null'),
(17, 1, 'Priorities', '', '_self', 'voyager-double-up', NULL, NULL, 7, '2020-02-01 12:51:20', '2020-02-01 12:51:38', 'voyager.priorities.index', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(48, '2014_10_12_000000_create_users_table', 1),
(49, '2014_10_12_100000_create_password_resets_table', 1),
(50, '2016_01_01_000000_add_voyager_user_fields', 1),
(51, '2016_01_01_000000_create_data_types_table', 1),
(52, '2016_05_19_173453_create_menu_table', 1),
(53, '2016_10_21_190000_create_roles_table', 1),
(54, '2016_10_21_190000_create_settings_table', 1),
(55, '2016_11_30_135954_create_permission_table', 1),
(56, '2016_11_30_141208_create_permission_role_table', 1),
(57, '2016_12_26_201236_data_types__add__server_side', 1),
(58, '2017_01_13_000000_add_route_to_menu_items_table', 1),
(59, '2017_01_14_005015_create_translations_table', 1),
(60, '2017_01_15_000000_make_table_name_nullable_in_permissions_table', 1),
(61, '2017_03_06_000000_add_controller_to_data_types_table', 1),
(62, '2017_04_21_000000_add_order_to_data_rows_table', 1),
(63, '2017_07_05_210000_add_policyname_to_data_types_table', 1),
(64, '2017_08_05_000000_add_group_to_settings_table', 1),
(65, '2017_11_26_013050_add_user_role_relationship', 1),
(66, '2017_11_26_015000_create_user_roles_table', 1),
(67, '2018_03_11_000000_add_user_settings', 1),
(68, '2018_03_14_000000_add_details_to_data_types_table', 1),
(69, '2018_03_16_000000_make_settings_value_nullable', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permissions_key_index` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`) VALUES
(1, 'browse_admin', NULL, '2020-01-28 16:50:18', '2020-01-28 16:50:18'),
(2, 'browse_bread', NULL, '2020-01-28 16:50:18', '2020-01-28 16:50:18'),
(3, 'browse_database', NULL, '2020-01-28 16:50:18', '2020-01-28 16:50:18'),
(4, 'browse_media', NULL, '2020-01-28 16:50:18', '2020-01-28 16:50:18'),
(5, 'browse_compass', NULL, '2020-01-28 16:50:18', '2020-01-28 16:50:18'),
(6, 'browse_menus', 'menus', '2020-01-28 16:50:18', '2020-01-28 16:50:18'),
(7, 'read_menus', 'menus', '2020-01-28 16:50:18', '2020-01-28 16:50:18'),
(8, 'edit_menus', 'menus', '2020-01-28 16:50:18', '2020-01-28 16:50:18'),
(9, 'add_menus', 'menus', '2020-01-28 16:50:18', '2020-01-28 16:50:18'),
(10, 'delete_menus', 'menus', '2020-01-28 16:50:18', '2020-01-28 16:50:18'),
(11, 'browse_roles', 'roles', '2020-01-28 16:50:18', '2020-01-28 16:50:18'),
(12, 'read_roles', 'roles', '2020-01-28 16:50:18', '2020-01-28 16:50:18'),
(13, 'edit_roles', 'roles', '2020-01-28 16:50:18', '2020-01-28 16:50:18'),
(14, 'add_roles', 'roles', '2020-01-28 16:50:18', '2020-01-28 16:50:18'),
(15, 'delete_roles', 'roles', '2020-01-28 16:50:18', '2020-01-28 16:50:18'),
(16, 'browse_users', 'users', '2020-01-28 16:50:18', '2020-01-28 16:50:18'),
(17, 'read_users', 'users', '2020-01-28 16:50:18', '2020-01-28 16:50:18'),
(18, 'edit_users', 'users', '2020-01-28 16:50:18', '2020-01-28 16:50:18'),
(19, 'add_users', 'users', '2020-01-28 16:50:18', '2020-01-28 16:50:18'),
(20, 'delete_users', 'users', '2020-01-28 16:50:18', '2020-01-28 16:50:18'),
(21, 'browse_settings', 'settings', '2020-01-28 16:50:18', '2020-01-28 16:50:18'),
(22, 'read_settings', 'settings', '2020-01-28 16:50:18', '2020-01-28 16:50:18'),
(23, 'edit_settings', 'settings', '2020-01-28 16:50:18', '2020-01-28 16:50:18'),
(24, 'add_settings', 'settings', '2020-01-28 16:50:18', '2020-01-28 16:50:18'),
(25, 'delete_settings', 'settings', '2020-01-28 16:50:18', '2020-01-28 16:50:18'),
(26, 'browse_hooks', NULL, '2020-01-28 16:50:18', '2020-01-28 16:50:18'),
(27, 'browse_projects', 'projects', '2020-02-01 11:29:07', '2020-02-01 11:29:07'),
(28, 'read_projects', 'projects', '2020-02-01 11:29:07', '2020-02-01 11:29:07'),
(29, 'edit_projects', 'projects', '2020-02-01 11:29:07', '2020-02-01 11:29:07'),
(30, 'add_projects', 'projects', '2020-02-01 11:29:07', '2020-02-01 11:29:07'),
(31, 'delete_projects', 'projects', '2020-02-01 11:29:07', '2020-02-01 11:29:07'),
(32, 'browse_tasks', 'tasks', '2020-02-01 11:39:37', '2020-02-01 11:39:37'),
(33, 'read_tasks', 'tasks', '2020-02-01 11:39:37', '2020-02-01 11:39:37'),
(34, 'edit_tasks', 'tasks', '2020-02-01 11:39:37', '2020-02-01 11:39:37'),
(35, 'add_tasks', 'tasks', '2020-02-01 11:39:37', '2020-02-01 11:39:37'),
(36, 'delete_tasks', 'tasks', '2020-02-01 11:39:37', '2020-02-01 11:39:37'),
(37, 'browse_status', 'status', '2020-02-01 12:15:38', '2020-02-01 12:15:38'),
(38, 'read_status', 'status', '2020-02-01 12:15:38', '2020-02-01 12:15:38'),
(39, 'edit_status', 'status', '2020-02-01 12:15:38', '2020-02-01 12:15:38'),
(40, 'add_status', 'status', '2020-02-01 12:15:38', '2020-02-01 12:15:38'),
(41, 'delete_status', 'status', '2020-02-01 12:15:38', '2020-02-01 12:15:38'),
(42, 'browse_statuses', 'statuses', '2020-02-01 12:17:32', '2020-02-01 12:17:32'),
(43, 'read_statuses', 'statuses', '2020-02-01 12:17:32', '2020-02-01 12:17:32'),
(44, 'edit_statuses', 'statuses', '2020-02-01 12:17:32', '2020-02-01 12:17:32'),
(45, 'add_statuses', 'statuses', '2020-02-01 12:17:32', '2020-02-01 12:17:32'),
(46, 'delete_statuses', 'statuses', '2020-02-01 12:17:32', '2020-02-01 12:17:32'),
(47, 'browse_types', 'types', '2020-02-01 12:47:58', '2020-02-01 12:47:58'),
(48, 'read_types', 'types', '2020-02-01 12:47:58', '2020-02-01 12:47:58'),
(49, 'edit_types', 'types', '2020-02-01 12:47:58', '2020-02-01 12:47:58'),
(50, 'add_types', 'types', '2020-02-01 12:47:58', '2020-02-01 12:47:58'),
(51, 'delete_types', 'types', '2020-02-01 12:47:58', '2020-02-01 12:47:58'),
(52, 'browse_priorities', 'priorities', '2020-02-01 12:51:20', '2020-02-01 12:51:20'),
(53, 'read_priorities', 'priorities', '2020-02-01 12:51:20', '2020-02-01 12:51:20'),
(54, 'edit_priorities', 'priorities', '2020-02-01 12:51:20', '2020-02-01 12:51:20'),
(55, 'add_priorities', 'priorities', '2020-02-01 12:51:20', '2020-02-01 12:51:20'),
(56, 'delete_priorities', 'priorities', '2020-02-01 12:51:20', '2020-02-01 12:51:20');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE IF NOT EXISTS `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_permission_id_index` (`permission_id`),
  KEY `permission_role_role_id_index` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1);

-- --------------------------------------------------------

--
-- Table structure for table `priorities`
--

DROP TABLE IF EXISTS `priorities`;
CREATE TABLE IF NOT EXISTS `priorities` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `priorities`
--

INSERT INTO `priorities` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Highest', '2020-02-01 12:52:30', '2020-02-01 12:52:30'),
(2, 'High', '2020-02-01 12:52:42', '2020-02-01 12:52:42'),
(3, 'Medium', '2020-02-01 12:52:53', '2020-02-01 12:52:53'),
(4, 'Low', '2020-02-01 12:53:04', '2020-02-01 12:53:04'),
(5, 'Lowest', '2020-02-01 12:53:13', '2020-02-01 12:53:13');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `images` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `description`, `images`, `created_at`, `updated_at`) VALUES
(1, 'Project 1', '<p>Description</p>', '[\"projects\\\\February2020\\\\UiVN65WeGDTDkGAMhtEo.jpg\"]', '2020-02-01 11:29:00', '2020-02-01 13:10:23');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '2020-01-28 16:50:18', '2020-01-28 16:50:18'),
(2, 'user', 'Normal User', '2020-01-28 16:50:18', '2020-01-28 16:50:18');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `details` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `group` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`, `group`) VALUES
(1, 'site.title', 'Site Title', 'TaskMan', '', 'text', 1, 'Site'),
(2, 'site.description', 'Site Description', 'Task management system', '', 'text', 2, 'Site'),
(3, 'site.logo', 'Site Logo', '', '', 'image', 3, 'Site'),
(4, 'site.google_analytics_tracking_id', 'Google Analytics Tracking ID', NULL, '', 'text', 4, 'Site'),
(5, 'admin.bg_image', 'Admin Background Image', '', '', 'image', 5, 'Admin'),
(6, 'admin.title', 'Admin Title', 'TaskMan', '', 'text', 1, 'Admin'),
(7, 'admin.description', 'Admin Description', 'Welcome to TaskMan. The task managent system', '', 'text', 2, 'Admin'),
(8, 'admin.loader', 'Admin Loader', '', '', 'image', 3, 'Admin'),
(9, 'admin.icon_image', 'Admin Icon Image', '', '', 'image', 4, 'Admin'),
(10, 'admin.google_analytics_client_id', 'Google Analytics Client ID (used for admin dashboard)', NULL, '', 'text', 1, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

DROP TABLE IF EXISTS `statuses`;
CREATE TABLE IF NOT EXISTS `statuses` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Backlog', '2020-02-01 12:18:26', '2020-02-01 12:18:26'),
(2, 'In progress', '2020-02-01 12:18:47', '2020-02-01 12:18:47'),
(3, 'Testing', '2020-02-01 12:18:58', '2020-02-01 12:18:58'),
(4, 'Done', '2020-02-01 12:19:07', '2020-02-01 12:19:07');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `due_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `images` text COLLATE utf8mb4_unicode_ci,
  `reported_by` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority_id` int(11) DEFAULT NULL,
  `code` varchar(280) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `project_id`, `user_id`, `status_id`, `due_date`, `created_at`, `updated_at`, `images`, `reported_by`, `type_id`, `link`, `priority_id`, `code`) VALUES
(1, 'Task number 1', 1, 1, 2, '2020-02-01 13:40:00', '2020-02-01 11:40:00', '2020-02-01 13:03:42', '[\"tasks\\\\February2020\\\\KZzngjWDcnv3tQJTr6D0.jpg\",\"tasks\\\\February2020\\\\dtLJiHZI672xTFXzRsKa.jpg\",\"tasks\\\\February2020\\\\lsoM1reT74mmE80sXxBA.jpg\",\"tasks\\\\February2020\\\\ZfEGlHdPdXUlvW2AIsNw.jpg\"]', 2, 3, 'www.google.ro', 3, 'KOP-344');

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

DROP TABLE IF EXISTS `translations`;
CREATE TABLE IF NOT EXISTS `translations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `table_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int(10) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

DROP TABLE IF EXISTS `types`;
CREATE TABLE IF NOT EXISTS `types` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Task', '2020-02-01 12:48:51', '2020-02-01 12:48:51'),
(2, 'Epic', '2020-02-01 12:48:58', '2020-02-01 12:48:58'),
(3, 'Bug', '2020-02-01 12:49:06', '2020-02-01 12:49:06'),
(4, 'Story', '2020-02-01 12:49:24', '2020-02-01 12:49:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `settings`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 'admin@admin.com', 'users/default.png', NULL, '$2y$10$WhDVS3UPiRu/YBcomfgIc.1VIlDTCH/9rjmCYqbNDyvmaoFX/GdBS', NULL, NULL, '2020-01-28 16:55:03', '2020-01-28 16:55:03'),
(2, 2, 'test', 'test@admin.com', 'users\\February2020\\1UGs81G5ZQTfTHIIIcah.jpg', NULL, '$2y$10$TThBf/RZIENhALIvp2946O3HOKD9PFTwAoxN0ssE5zFc8XcIK6c9.', NULL, '{\"locale\":\"en\"}', '2020-02-01 12:34:36', '2020-02-01 12:34:36');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
CREATE TABLE IF NOT EXISTS `user_roles` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `user_roles_user_id_index` (`user_id`),
  KEY `user_roles_role_id_index` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
