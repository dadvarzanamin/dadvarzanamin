-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2023 at 03:17 PM
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
-- Database: `dadvarz_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `active_codes`
--

CREATE TABLE `active_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `code` int(10) UNSIGNED NOT NULL,
  `expired_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blugs`
--

CREATE TABLE `blugs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `file_link` varchar(191) NOT NULL,
  `description` text NOT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `user_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` text NOT NULL,
  `service_id` int(11) DEFAULT NULL,
  `portfo_id` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `countview` int(11) DEFAULT NULL,
  `tags` text DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `indexshow` int(11) NOT NULL DEFAULT 0,
  `sort` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `commentrates`
--

CREATE TABLE `commentrates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `commentable_id` varchar(255) NOT NULL,
  `commentable_type` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `approved` tinyint(1) NOT NULL,
  `item1` tinyint(4) NOT NULL,
  `item2` tinyint(4) NOT NULL,
  `item3` tinyint(4) NOT NULL,
  `item4` tinyint(4) NOT NULL,
  `item5` tinyint(4) NOT NULL,
  `item6` tinyint(4) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `commentable_id` varchar(255) NOT NULL,
  `commentable_type` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `parent_id` bigint(20) UNSIGNED NOT NULL,
  `approved` tinyint(1) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `tel2` varchar(20) DEFAULT NULL,
  `tel3` varchar(20) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `ceo` varchar(191) DEFAULT NULL,
  `meli_code` varchar(20) DEFAULT NULL,
  `eghtesadi_code` varchar(26) DEFAULT NULL,
  `date_sabt` varchar(12) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `telegram` varchar(191) DEFAULT NULL,
  `instagram` varchar(191) DEFAULT NULL,
  `facebook` varchar(191) DEFAULT NULL,
  `linkedin` varchar(191) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `favicon16` varchar(255) DEFAULT NULL,
  `favicon32` varchar(255) DEFAULT NULL,
  `summery` text DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `title`, `tel`, `tel2`, `tel3`, `mobile`, `email`, `ceo`, `meli_code`, `eghtesadi_code`, `date_sabt`, `address`, `telegram`, `instagram`, `facebook`, `linkedin`, `image`, `favicon16`, `favicon32`, `summery`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 'موسسه حقوقی دادورزان امین', '02188438191', NULL, NULL, '09124889431', 'info@dadvarzanamin.ir', 'مهدی علی اکبرزاده', NULL, NULL, NULL, 'تهران - خیابان شریعتی - کوچه جعفریان', NULL, NULL, NULL, NULL, 'companies/eb3FPlB6UQifUpGcrEpiM6WLTBdWJs.png', 'companies/nYMDSL5sTB0rKczG16OChA8AaXUCyZ.png', 'companies/a64cJlWpYXd8sc91gCcvsLMOii1p0c.png', 'ما اینجا هستیم تا دسترسی همه افراد به خدمات حقوقی تخصصی، با کیفیت و مقرون‌ به‌ صرفه را آسان کنیم. ما به‌ عنوان ارائه‌ دهنده آنلاین راهکارهای حقوقی تخصصی به شرکت‌ها و کسب‌ و کارهای ایران فعالیت می‌کنیم و تا امروز به بیش از 500 شرکت کوچک، متوسط و بزرگ ایرانی کمک کرده‌ایم تا راه بهتری برای رفع نیازهای قانونی خود بیابند.', 1, '2023-07-15 11:13:53', '2023-08-02 04:47:17');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `priority` int(10) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `logo_image` varchar(255) DEFAULT NULL,
  `file_link` varchar(255) DEFAULT NULL,
  `customer_type` int(10) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `description` text DEFAULT NULL,
  `click` bigint(20) DEFAULT 0,
  `home_show` tinyint(4) DEFAULT 0,
  `user_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `priority`, `name`, `image`, `logo_image`, `file_link`, `customer_type`, `status`, `description`, `click`, `home_show`, `user_id`, `created_at`, `updated_at`) VALUES
(82, 1, 'دومینو', 'customers/images/Jy8cQ4eBOLBqDM0DYqDIjkpGZNgWuT.png', NULL, NULL, NULL, 4, '<p>دومینو</p>', 0, 1, 1, '2023-07-29 16:40:48', '2023-07-29 16:40:48'),
(83, 2, 'همراه اول', 'customers/images/M4saSoeuOARSHQePAblxXdadf4AoTQ.png', NULL, NULL, NULL, 4, '<p>همراه اول</p>', 0, 1, 1, '2023-07-29 16:43:04', '2023-07-29 16:43:04'),
(84, 3, 'شرکت مخابرات ایران', 'customers/images/OZutmEbKpi8uAUUIQyOM8ZvEa2jzGk.png', NULL, NULL, NULL, 4, '<p>شرکت مخابرات ایران</p>', 0, 1, 1, '2023-07-29 16:43:53', '2023-07-29 16:43:53');

-- --------------------------------------------------------

--
-- Table structure for table `customertypes`
--

CREATE TABLE `customertypes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customertypes`
--

INSERT INTO `customertypes` (`id`, `name`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'حقیقی انفرادی', 1, '2023-07-20 04:21:32', '2023-07-20 04:48:12'),
(2, 'حقوقی', 1, '2023-07-20 04:21:49', '2023-07-20 04:21:49'),
(3, 'حقوقی شرکت ها', 1, '2023-07-20 04:21:58', '2023-07-20 04:21:58'),
(4, 'حقوقی موسسات غیر تجاری', 1, '2023-07-20 04:22:10', '2023-07-20 04:22:10'),
(5, 'حقوقی موسسات تجاری', 1, '2023-07-20 04:22:21', '2023-07-20 04:22:21'),
(6, 'حقوقی آموزشگاه ها', 1, '2023-07-20 04:22:33', '2023-07-20 04:22:33'),
(7, 'حقوقی کارخانجات', 1, '2023-07-20 04:22:43', '2023-07-20 04:22:43'),
(8, 'حقوقی کارگاه های صنعتی', 1, '2023-07-20 04:22:57', '2023-07-20 04:22:57'),
(9, 'حقوقی کارگاه های غیر صنعتی', 1, '2023-07-20 04:23:09', '2023-07-20 04:23:09'),
(10, 'حقوقی معادن', 1, '2023-07-20 04:23:12', '2023-07-20 04:23:12');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(191) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `file_link` varchar(255) DEFAULT NULL,
  `file_type` varchar(255) DEFAULT NULL,
  `file_size` varchar(255) DEFAULT NULL,
  `file_time` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `file_fake` varchar(255) DEFAULT NULL,
  `menu_id` bigint(20) UNSIGNED DEFAULT NULL,
  `submenu_id` bigint(20) UNSIGNED DEFAULT NULL,
  `free` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `title_text` varchar(255) DEFAULT NULL,
  `title_type` varchar(255) DEFAULT NULL,
  `clip_type` varchar(190) DEFAULT NULL,
  `folder` varchar(255) DEFAULT NULL,
  `pic` tinyint(1) DEFAULT NULL,
  `voice` tinyint(1) DEFAULT NULL,
  `video` tinyint(1) DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `item1` varchar(255) DEFAULT NULL,
  `item2` varchar(255) DEFAULT NULL,
  `item3` varchar(255) DEFAULT NULL,
  `item4` varchar(255) DEFAULT NULL,
  `item5` varchar(255) DEFAULT NULL,
  `item6` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `view` bigint(20) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `priority` bigint(20) UNSIGNED DEFAULT 0 COMMENT 'اولویت نمایش',
  `title` varchar(255) NOT NULL COMMENT 'عنوان ثبتی',
  `slug` varchar(255) NOT NULL COMMENT 'لینک صفحه',
  `tab_title` varchar(255) DEFAULT NULL COMMENT 'عنوان تب صفحه',
  `page_title` varchar(255) DEFAULT NULL COMMENT 'عنوان داخل صفحه',
  `class` varchar(255) DEFAULT NULL COMMENT 'کلاس کنترلر',
  `submenu` tinyint(1) NOT NULL COMMENT 'زیرمنو دارد یا ندارد',
  `submenu_route` tinyint(4) DEFAULT 0 COMMENT 'فعال کردن روت زیرمنو',
  `keycheck` varchar(255) DEFAULT NULL,
  `keyword` text DEFAULT NULL COMMENT 'کلمات کلیدی صفحه',
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'وضعیت نمایش',
  `description` text DEFAULT NULL COMMENT 'توضیحات صفحه',
  `col_style` varchar(255) DEFAULT NULL,
  `home_show` tinyint(1) DEFAULT NULL,
  `long_title` text DEFAULT NULL COMMENT 'توضیحات طولانی',
  `icon` varchar(190) DEFAULT NULL,
  `mega_manu` tinyint(1) DEFAULT 0,
  `service_name` varchar(191) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `route_active` tinyint(1) DEFAULT 0,
  `user_id` bigint(20) UNSIGNED NOT NULL COMMENT 'کاربر ثبت کننده',
  `page_description` varchar(255) DEFAULT NULL COMMENT 'توضیحات صفحه برای سئو',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `priority`, `title`, `slug`, `tab_title`, `page_title`, `class`, `submenu`, `submenu_route`, `keycheck`, `keyword`, `status`, `description`, `col_style`, `home_show`, `long_title`, `icon`, `mega_manu`, `service_name`, `route`, `route_active`, `user_id`, `page_description`, `created_at`, `updated_at`) VALUES
(1, 1, 'صفحه اصلی', '/', 'موسسه حقوقی دادورزان امین', 'صفحه اصلی', 'index', 0, 0, NULL, '[\"\\u0648\\u06a9\\u06cc\\u0644 \\u062d\\u0642\\u0648\\u0642\\u06cc\",\"\\u0648\\u06a9\\u06cc\\u0644 \\u062f\\u0627\\u062f\\u06af\\u0633\\u062a\\u0631\\u06cc\",\"\\u062d\\u0642\\u0648\\u0642\\u062f\\u0627\\u0646\",\"\\u0648\\u06a9\\u0627\\u0644\\u062a\",\"\\u0634\\u0631\\u06a9\\u062a \\u062d\\u0642\\u0648\\u0642\\u06cc\",\"\\u0645\\u0634\\u0627\\u0648\\u0631 \\u062d\\u0642\\u0648\\u0642\\u06cc\",\"\\u0627\\u0646\\u062c\\u0627\\u0645 \\u0645\\u0634\\u0627\\u0648\\u0631\\u0647 \\u062d\\u0642\\u0648\\u0642\\u06cc\",\"\\u062f\\u0627\\u062f\\u062e\\u0648\\u0627\\u0633\\u062a\",\"\\u062f\\u0627\\u062f\\u062e\\u0648\\u0627\\u0633\\u062a \\u0637\\u0644\\u0627\\u0642\",\"\\u067e\\u0631\\u0648\\u0646\\u062f\\u0647 \\u06a9\\u06cc\\u0641\\u0631\\u06cc\",\"\\u0645\\u0634\\u0627\\u0648\\u0631\\u0647 \\u062a\\u062c\\u0627\\u0631\\u06cc\",\"\\u0645\\u0634\\u0627\\u0648\\u0631\\u0647 \\u0645\\u0627\\u0644\\u06cc\",\"\\u0645\\u0634\\u0627\\u0648\\u0631\\u0647 \\u0645\\u0627\\u0644\\u06cc\\u0627\\u062a\\u06cc\",\"\\u062d\\u0642\\u0648\\u0642 \\u06a9\\u0627\\u0631\",\"\\u062d\\u0642\\u0648\\u0642 \\u0645\\u0647\\u0627\\u062c\\u0631\\u062a\\u06cc\",\"\\u0645\\u0634\\u0627\\u0648\\u0631\\u0647 \\u062a\\u0646\\u0638\\u06cc\\u0645 \\u0642\\u0631\\u0627\\u0631\\u062f\\u0627\\u062f\\u0647\\u0627\"]', 4, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 1, 1, 'شرکت حقوقی با وکلای حرفه‌ای و مجرب، حقوق مهاجرتی و مشاوره مالیاتی و مشاوره حقوقی دادگستری و کلیه امور وکالتی را انجام می‌دهد.', '2023-02-08 17:49:03', '2023-08-02 05:42:28'),
(61, 2, 'دپارتمان دعاوی', 'دپارتمان-دعاوی', 'خدمات حقوقی دادورزان امین', 'خدمات حقوقی دادورزان امین', NULL, 1, 1, NULL, '', 4, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 0, 1, NULL, '2023-07-16 16:58:56', '2023-08-03 10:10:00'),
(62, 3, 'دپارتمان قراردادها', 'دپارتمان-قراردادها', 'مطالب آموزشی موسسه حقوقی دادورزان امین', 'مطالب آموزشی موسسه حقوقی دادورزان امین', NULL, 1, 1, NULL, '', 4, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, 1, NULL, '2023-07-16 17:00:02', '2023-08-03 10:10:20'),
(63, 4, 'دپارتمان اموزش و پژوهش', 'دپارتمان-اموزش-و-پژوهش', 'سوالات متداول موسسه حقوقی دادورزان امین', 'سوالات متداول موسسه حقوقی دادورزان امین', NULL, 1, 1, NULL, '', 4, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, 1, NULL, '2023-07-16 17:00:54', '2023-08-03 10:10:36'),
(64, 5, 'خدمات', 'خدمات', 'درباره موسسه حقوقی دادورزان امین', 'درباره موسسه حقوقی دادورزان امین', NULL, 1, 1, NULL, '', 4, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, 1, NULL, '2023-07-16 17:01:17', '2023-08-03 10:11:38'),
(65, 6, 'تیم ما', 'تیم-ما', 'تماس با موسسه حقوقی دادورزان امین', 'تماس با موسسه حقوقی دادورزان امین', NULL, 1, 1, NULL, '', 4, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, 1, NULL, '2023-07-16 17:01:31', '2023-08-03 10:11:15');

-- --------------------------------------------------------

--
-- Table structure for table `menu_panels`
--

CREATE TABLE `menu_panels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `label` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `submenu` tinyint(1) DEFAULT 0,
  `keycheck` varchar(255) DEFAULT NULL,
  `namayesh` varchar(255) DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL,
  `controller` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_panels`
--

INSERT INTO `menu_panels` (`id`, `title`, `label`, `slug`, `icon`, `submenu`, `keycheck`, `namayesh`, `class`, `controller`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'پنل مدیریتی', 'panel', 'panel', 'dashboard', 0, NULL, 'panel', 'index', 'PanelController', 4, 1, '2023-01-30 11:19:37', '2023-02-17 13:50:08'),
(2, 'مدیریت داشبورد', 'dashboard-manage', 'dashboard-manage', 'local_library', 1, NULL, 'dashboard-manage', 'dashboard', 'PanelController', 4, 1, '2023-01-30 11:19:37', '2023-05-02 06:56:12'),
(3, 'مدیریت کاربران', 'users-manage', 'users-manage', 'description', 1, NULL, 'users-manage', 'user', 'PanelController', 4, 1, '2023-01-30 11:19:37', '2023-01-30 11:19:37'),
(4, 'مدیریت وب سایت', 'site-manage', 'site-manage', 'slideshow', 1, NULL, 'site-manage', 'site', 'PanelController', 4, 1, '2023-01-30 11:19:37', '2023-02-10 06:48:50'),
(5, 'پشتیبانی', 'service', 'service', 'service', 1, NULL, 'service', 'index', 'PanelController', 4, 1, '2023-05-02 01:11:35', '2023-06-16 06:18:30');

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
(49, '2013_01_21_900900_create_user_types_table', 1),
(50, '2014_10_12_000000_create_users_table', 1),
(51, '2014_10_12_100000_create_password_resets_table', 1),
(52, '2019_08_19_000000_create_failed_jobs_table', 1),
(53, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(54, '2023_01_21_000010_create_visitors_table', 1),
(55, '2023_01_21_051207_menus', 1),
(56, '2023_01_21_051208_create_submenus_table', 1),
(57, '2023_01_21_065958_create_categories_table', 1),
(58, '2023_01_21_070016_create_rates_table', 1),
(59, '2023_01_21_070160_create_courses_table', 1),
(60, '2023_01_21_070653_create_reasult_books_table', 1),
(61, '2023_01_21_073441_create_media_table', 1),
(62, '2023_01_21_084111_create_active_codes_table', 1),
(63, '2023_01_21_093816_create_commentrates_table', 1),
(64, '2023_01_21_093936_create_comments_table', 1),
(65, '2023_01_21_094100_create_mark_users_table', 1),
(66, '2023_01_21_094143_create_menu_panels_table', 1),
(67, '2023_01_21_094201_create_permissions_table', 1),
(68, '2023_01_21_094202_create_roles_table', 1),
(69, '2023_01_21_094211_create_permission_roles_table', 1),
(70, '2023_01_21_094236_create_role_users_table', 1),
(79, '2023_01_21_094317_slide', 2),
(80, '2023_01_21_094342_create_submenu_panels_table', 2),
(81, '2023_02_11_192145_create_categories_table', 3),
(82, '2023_02_11_192156_create_subcategories_table', 4),
(83, '2023_02_11_903628_create_gallerypics_table', 4),
(84, '2023_02_11_903700_create_gallerymusics_table', 4),
(85, '2023_02_11_903710_create_galleryclips_table', 5),
(86, '2023_02_24_202514_create_logos_table', 6),
(87, '2023_03_02_183914_create_original_categories_table', 7),
(88, '2023_03_07_063245_create_programs_table', 8),
(89, '2023_04_10_103044_subtitle', 9),
(90, '2023_06_30_162723_create_jobs_table', 10),
(91, '2023_07_20_072023_customer_type', 11);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `label` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `menu_panel_id` int(11) DEFAULT NULL,
  `submenu_panel_id` int(11) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `title`, `label`, `slug`, `menu_panel_id`, `submenu_panel_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'پنل مدیریت', 'panel', 'panel', 1, NULL, NULL, NULL, NULL),
(2, 'مدیریت داشبورد', 'dashboard-manage', 'dashboard-manage', 2, NULL, 1, NULL, '2023-05-02 06:56:12'),
(3, 'منو داشبورد', 'menu-dashboard', 'menu-dashboard', NULL, 1, NULL, NULL, NULL),
(4, 'زیرمنو داشبورد', 'submenu-dashboard', 'submenu-dashboard', NULL, 2, NULL, '2023-01-27 16:50:37', '2023-01-27 16:50:37'),
(5, 'پشتیبانی', 'service', 'service', 5, NULL, 1, '2023-05-02 01:11:35', '2023-05-02 01:11:35'),
(100, 'مدیریت کاربران', 'users-manage', 'users-manage', 3, NULL, 1, '2023-01-27 16:48:05', '2023-01-27 16:48:05'),
(101, 'دسترسی کاربران', 'role-dashboard', 'role-dashboard', NULL, 101, 1, '2023-01-27 16:48:05', '2023-05-03 13:14:48'),
(102, 'سطح کاربران', 'level user dashboard', 'level-user-dashboard', NULL, 102, 1, '2023-01-27 16:48:05', '2023-05-05 13:40:04'),
(103, 'کاربران داشبورد', 'user dashboard', 'user-dashboard', NULL, 103, 1, NULL, NULL),
(104, 'مدیریت پروفایل', 'profile', 'profile', NULL, 104, 1, '2023-01-27 16:48:05', '2023-01-27 16:48:05'),
(105, 'دسترسی', 'permission-dashboard-manage', 'permission-dashboard-manage', NULL, 105, NULL, '2023-01-27 16:48:05', '2023-01-27 16:48:05'),
(200, 'مدیریت سایت', 'site-manage', 'site-manage', 4, NULL, 1, '2023-01-27 16:48:05', '2023-01-27 16:48:05'),
(201, 'مدیریت منو سایت', 'menu-site-manage', 'menu-site-manage', NULL, 201, NULL, '2023-01-27 16:50:37', '2023-01-27 16:50:37'),
(202, 'مدیریت زیر منو سایت', 'submenu-site-manage', 'submenu-site-manage', NULL, 202, 1, NULL, NULL),
(203, 'مدیریت اسلایدها', 'slide-manage', 'slide-manage', NULL, 203, NULL, '2023-01-27 16:51:53', '2023-01-27 16:51:53'),
(204, 'مدیریت برند', 'company-manage', 'company-manage', NULL, 204, 1, '2023-02-24 16:52:48', '2023-07-14 13:52:36'),
(205, 'مدیریت پیام ها', 'comment-manage', 'comment-manage', NULL, 205, NULL, '2023-01-27 16:50:37', '2023-01-27 16:50:37'),
(206, 'مدیریت نظرات', 'commentrate-manage', 'commentrate-manage', NULL, 206, NULL, '2023-01-27 16:50:37', '2023-01-27 16:50:37'),
(207, 'مدیریت مشتریان', 'customer-manage', 'customer-manage', NULL, 207, 1, '2023-06-04 13:31:56', '2023-06-04 13:31:56'),
(208, 'مدیریت نمونه کارها', 'portfolio-manage', 'portfolio-manage', NULL, 208, 1, '2023-06-05 11:27:30', '2023-06-05 11:28:08'),
(209, 'مدیریت مقالات', 'blug-manage', 'blug-manage', NULL, 209, 1, '2023-06-06 06:39:55', '2023-06-06 06:39:55'),
(300, 'مدیریت دسته بندی', 'category-dashboard-manage', 'category-dashboard-manage', NULL, 300, NULL, '2023-01-27 16:48:05', '2023-01-27 16:48:05'),
(500, 'مدیریت دسترسی قسمت ها', 'permission-manage', 'permission-manage', NULL, NULL, NULL, '2023-01-27 16:48:05', '2023-01-27 16:48:05'),
(1000, 'مدیریت دسته بندی سایت', 'sitecategory-manage', 'sitecategory-manage', NULL, NULL, NULL, '2023-01-27 16:48:05', '2023-01-27 16:48:05'),
(1300, 'مدیریت کاربران سایت', 'user-site-manage', 'user-site-manage', NULL, NULL, NULL, '2023-01-27 16:50:37', '2023-01-27 16:50:37'),
(2915, 'مدیریت نوع مشتریان', 'customer-type-manage', 'customer-type-manage', NULL, 3003, 1, '2023-07-20 03:54:06', '2023-07-20 03:54:47');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 1, 3, NULL, NULL),
(4, 1, 4, NULL, NULL),
(100, 1, 100, NULL, NULL),
(200, 1, 200, NULL, NULL),
(201, 1, 101, NULL, NULL),
(294, 1, 102, NULL, NULL),
(295, 1, 103, NULL, NULL),
(296, 1, 104, NULL, NULL),
(298, 1, 201, NULL, NULL),
(299, 1, 202, NULL, NULL),
(304, 1, 204, NULL, NULL),
(306, 1, 205, NULL, NULL),
(307, 1, 206, NULL, NULL),
(308, 1, 500, NULL, NULL),
(309, 1, 1300, NULL, NULL),
(310, 1, 1000, NULL, NULL),
(336, 2, 1, NULL, NULL),
(337, 2, 104, NULL, NULL),
(338, 2, 200, NULL, NULL),
(339, 2, 201, NULL, NULL),
(340, 2, 202, NULL, NULL),
(341, 2, 500, NULL, NULL),
(342, 2, 1300, NULL, NULL),
(343, 2, 100, NULL, NULL),
(344, 1, 203, NULL, NULL),
(345, 1, 207, NULL, NULL),
(346, 1, 2915, NULL, NULL);

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
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `customer_id` bigint(20) DEFAULT NULL,
  `file_link` varchar(191) DEFAULT NULL,
  `videos` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `tags` text DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `menu_id` int(11) DEFAULT NULL,
  `submenu_id` int(11) DEFAULT NULL,
  `indexshow` int(11) NOT NULL DEFAULT 0,
  `user_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `slug`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'ادمین', 'supperadmin', NULL, '2023-01-27 16:30:03', '2023-01-27 16:30:03'),
(2, 'مدیر ارشد', 'chief', NULL, '2023-01-27 16:30:42', '2023-01-27 16:30:42'),
(3, 'مدیر', 'manager', NULL, '2023-01-27 16:30:42', '2023-01-27 16:30:42'),
(4, 'کارشناس ارشد', 'seniorexpert', NULL, '2023-01-27 16:30:42', '2023-01-27 16:30:42'),
(5, 'وکیل', 'Lawyer', NULL, '2023-01-27 16:30:42', '2023-01-27 16:30:42'),
(6, 'مشاور', 'Consultant', NULL, '2023-01-27 16:30:42', '2023-05-05 13:14:43'),
(7, 'کارشناس', 'expert', NULL, '2023-01-27 16:30:42', '2023-01-27 16:30:42'),
(8, 'میهمان', 'guest', NULL, '2023-01-27 16:30:42', '2023-01-27 16:30:42');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`) VALUES
(1, 1),
(2, 29),
(2, 30);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` text NOT NULL,
  `images` varchar(191) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title1` varchar(255) DEFAULT NULL,
  `title2` varchar(190) DEFAULT NULL,
  `title3` varchar(190) DEFAULT NULL,
  `word` text DEFAULT NULL,
  `text` text DEFAULT NULL,
  `file_link` varchar(255) NOT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `title1`, `title2`, `title3`, `word`, `text`, `file_link`, `menu_id`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(30, 'موسسه حقوقی دادورزان امین', 'بیش از 10 سال سابقه در کار وکالت', 'تجربه خدمات هوشمند و الکترونیک وکالت', '[\"\\u0642\\u0631\\u0627\\u0631\\u062f\\u0627\\u062f\\u0647\\u0627 \",\" \\u06a9\\u06cc\\u0641\\u0631\\u06cc \",\" \\u062d\\u0642\\u0648\\u0642\\u06cc \",\" \\u0645\\u0644\\u06a9\\u06cc \",\" \\u062f\\u0639\\u0627\\u0648\\u06cc \",\" \\u0645\\u0627\\u0644\\u06cc\\u0627\\u062a\\u06cc \",\" \\u0628\\u06cc\\u0645\\u0647 \\u0627\\u06cc\"]', NULL, 'slides/BazNJqjofsdKxLeARwl3Bv8DRf6I8E.jpg', 1, 4, 1, '2023-07-30 13:29:59', '2023-07-30 16:44:36');

-- --------------------------------------------------------

--
-- Table structure for table `submenus`
--

CREATE TABLE `submenus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `tab_title` varchar(255) DEFAULT NULL,
  `page_title` varchar(255) DEFAULT NULL,
  `keyword` text DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `class` varchar(191) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `route_active` tinyint(4) DEFAULT 0,
  `description` text DEFAULT NULL,
  `page_description` text DEFAULT NULL,
  `text` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `count` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `keycheck` tinyint(4) DEFAULT NULL,
  `mega_manu` tinyint(1) DEFAULT 0,
  `tags` text DEFAULT NULL,
  `footer_show` int(11) NOT NULL DEFAULT 0,
  `user_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `submenus`
--

INSERT INTO `submenus` (`id`, `menu_id`, `title`, `tab_title`, `page_title`, `keyword`, `slug`, `class`, `icon`, `route_active`, `description`, `page_description`, `text`, `image`, `count`, `status`, `keycheck`, `mega_manu`, `tags`, `footer_show`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 64, 'نظریه شورای حقوقی', 'نظریه شورای حقوقی', 'نظریه شورای حقوقی', '[\"\\u0646\\u0638\\u0631\\u06cc\\u0647 \\u0634\\u0648\\u0631\\u0627\\u06cc \\u062d\\u0642\\u0648\\u0642\\u06cc\"]', 'نظریه-شورای-حقوقی', NULL, NULL, 0, NULL, 'نظریه شورای حقوقی', NULL, 'submenus/ALDfbpAJrQJtmeKTMj4rjAJvtXkjxr.jpg', 0, 4, NULL, NULL, NULL, 0, 1, '2023-08-03 10:17:23', '2023-08-04 06:26:57'),
(4, 64, 'ایرانیان خارج از کشور', 'ایرانیان خارج از کشور', 'ایرانیان خارج از کشور', '[\"\\u0627\\u06cc\\u0631\\u0627\\u0646\\u06cc\\u0627\\u0646 \\u062e\\u0627\\u0631\\u062c \\u0627\\u0632 \\u06a9\\u0634\\u0648\\u0631\"]', 'ایرانیان-خارج-از-کشور', NULL, NULL, 0, NULL, 'ایرانیان خارج از کشور', NULL, 'submenus/U2TIILxKzkxFScKrBjm9guPd1Jvjto.jpg', 0, 4, NULL, NULL, NULL, 0, 1, '2023-08-03 10:17:49', '2023-08-04 06:47:54'),
(5, 64, 'تنظیم قرارداد', 'تنظیم قرارداد', 'تنظیم قرارداد', '[\"\\u062a\\u0646\\u0638\\u06cc\\u0645 \\u0642\\u0631\\u0627\\u0631\\u062f\\u0627\\u062f\"]', 'تنظیم-قرارداد', NULL, NULL, 0, NULL, 'تنظیم قرارداد', NULL, 'submenus/S5CE5b4BGhjrqZrTYqTdqfz47Eo3ez.jpg', 0, 4, NULL, NULL, NULL, 0, 1, '2023-08-03 10:18:05', '2023-08-04 06:35:53'),
(6, 64, 'تنظیم دادخواست', 'تنظیم دادخواست', 'تنظیم دادخواست', '[\"\\u062a\\u0646\\u0638\\u06cc\\u0645 \\u062f\\u0627\\u062f\\u062e\\u0648\\u0627\\u0633\\u062a\"]', 'تنظیم-دادخواست', NULL, NULL, 0, NULL, 'تنظیم دادخواست', NULL, 'submenus/edD7N0lmp4qCAoVj1AfPkAtLnATY4O.jpg', 0, 4, NULL, NULL, NULL, 0, 1, '2023-08-03 10:18:21', '2023-08-04 06:36:09'),
(7, 64, 'مشاوره', 'مشاوره', 'مشاوره', '[\"\\u0645\\u0634\\u0627\\u0648\\u0631\\u0647\"]', 'مشاوره', NULL, NULL, 0, NULL, 'مشاوره', NULL, 'submenus/uv460gIdEWFwmWy1g9jm2KzBPXrwjE.jpg', 0, 4, NULL, NULL, NULL, 0, 1, '2023-08-03 10:19:51', '2023-08-04 06:34:17'),
(8, 64, 'داوری', 'داوری', 'داوری', '[\"\\u062f\\u0627\\u0648\\u0631\\u06cc\"]', 'داوری', NULL, NULL, 0, NULL, 'داوری', NULL, 'submenus/IHbwtW6Z6YC7H4gLekyePvzDMWmapI.jpg', 0, 4, NULL, NULL, NULL, 0, 1, '2023-08-03 10:20:16', '2023-08-04 06:46:06'),
(9, 64, 'ثبت شرکت', 'ثبت شرکت', 'ثبت شرکت', '[\"\\u062b\\u0628\\u062a \\u0634\\u0631\\u06a9\\u062a\"]', 'ثبت-شرکت', NULL, NULL, 0, NULL, 'ثبت شرکت', NULL, 'submenus/RNvviajLt4jsh5SjQTVRlFS3X8Pri0.jpg', 0, 4, NULL, NULL, NULL, 0, 1, '2023-08-03 10:20:45', '2023-08-04 06:37:02'),
(10, 61, 'حقوقی اراضی', 'حقوقی اراضی', 'حقوقی اراضی', NULL, 'حقوقی-اراضی', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 4, NULL, NULL, NULL, 0, 1, '2023-08-03 10:21:49', '2023-08-03 10:21:49'),
(11, 61, 'حقوقی املاک', 'حقوقی املاک', 'حقوقی املاک', NULL, 'حقوقی-املاک', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 4, NULL, NULL, NULL, 0, 1, '2023-08-03 10:22:12', '2023-08-03 10:22:12'),
(12, 61, 'حقوقی خانواده', 'حقوقی خانواده', 'حقوقی خانواده', '[\"\\u062d\\u0642\\u0648\\u0642\\u06cc \\u062e\\u0627\\u0646\\u0648\\u0627\\u062f\\u0647\"]', 'حقوقی-خانواده', NULL, NULL, 0, NULL, 'حقوقی خانواده', NULL, NULL, 0, 4, NULL, NULL, NULL, 0, 1, '2023-08-03 10:22:37', '2023-08-03 10:22:37'),
(13, 61, 'حقوقی شهرداری', 'حقوقی شهرداری', 'حقوقی شهرداری', '[\"\\u062d\\u0642\\u0648\\u0642\\u06cc \\u0634\\u0647\\u0631\\u062f\\u0627\\u0631\\u06cc\"]', 'حقوقی-شهرداری', NULL, NULL, 0, NULL, 'حقوقی شهرداری', NULL, NULL, 0, 4, NULL, NULL, NULL, 0, 1, '2023-08-03 10:22:57', '2023-08-03 10:22:57'),
(14, 61, 'کیفری قاچاق', 'کیفری قاچاق', 'کیفری قاچاق', '[\"\\u06a9\\u06cc\\u0641\\u0631\\u06cc \\u0642\\u0627\\u0686\\u0627\\u0642\"]', 'کیفری-قاچاق', NULL, NULL, 0, NULL, 'کیفری قاچاق', NULL, NULL, 0, 4, NULL, NULL, NULL, 0, 1, '2023-08-03 10:25:26', '2023-08-03 10:25:26'),
(15, 61, 'کیفری جرائم سایبری', 'کیفری جرائم سایبری', 'کیفری جرائم سایبری', '[\"\\u06a9\\u06cc\\u0641\\u0631\\u06cc \\u062c\\u0631\\u0627\\u0626\\u0645 \\u0633\\u0627\\u06cc\\u0628\\u0631\\u06cc\"]', 'کیفری-جرائم-سایبری', NULL, NULL, 0, NULL, 'کیفری جرائم سایبری', NULL, NULL, 0, 4, NULL, NULL, NULL, 0, 1, '2023-08-03 10:25:48', '2023-08-03 10:25:48'),
(16, 61, 'کیفری جرائم پزشکی', 'کیفری جرائم پزشکی', 'کیفری جرائم پزشکی', '[\"\\u06a9\\u06cc\\u0641\\u0631\\u06cc \\u062c\\u0631\\u0627\\u0626\\u0645 \\u067e\\u0632\\u0634\\u06a9\\u06cc\"]', 'کیفری-جرائم-پزشکی', NULL, NULL, 0, NULL, 'کیفری جرائم پزشکی', NULL, NULL, 0, 4, NULL, NULL, NULL, 0, 1, '2023-08-03 10:26:09', '2023-08-03 10:26:09'),
(17, 61, 'کیفری جرائم اقتصادی', 'کیفری جرائم اقتصادی', 'کیفری جرائم اقتصادی', '[\"\\u06a9\\u06cc\\u0641\\u0631\\u06cc \\u062c\\u0631\\u0627\\u0626\\u0645 \\u0627\\u0642\\u062a\\u0635\\u0627\\u062f\\u06cc\"]', 'کیفری-جرائم-اقتصادی', NULL, NULL, 0, NULL, 'کیفری جرائم اقتصادی', NULL, NULL, 0, 4, NULL, NULL, NULL, 0, 1, '2023-08-03 10:26:28', '2023-08-03 10:26:28'),
(18, 61, 'کیفری کلاهبرداری', 'کیفری کلاهبرداری', 'کیفری کلاهبرداری', '[\"\\u06a9\\u06cc\\u0641\\u0631\\u06cc \\u06a9\\u0644\\u0627\\u0647\\u0628\\u0631\\u062f\\u0627\\u0631\\u06cc\"]', 'کیفری-کلاهبرداری', NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 4, NULL, NULL, NULL, 0, 1, '2023-08-03 10:26:47', '2023-08-03 11:16:49'),
(19, 61, 'تجاری مالیات', 'تجاری مالیات', 'تجاری مالیات', '[\"\\u062a\\u062c\\u0627\\u0631\\u06cc \\u0645\\u0627\\u0644\\u06cc\\u0627\\u062a\"]', 'تجاری-مالیات', NULL, NULL, 0, NULL, 'تجاری مالیات', NULL, NULL, 0, 4, NULL, NULL, NULL, 0, 1, '2023-08-03 10:27:16', '2023-08-03 10:27:16'),
(20, 61, 'تجاری گمرک', 'تجاری گمرک', 'تجاری گمرک', '[\"\\u062a\\u062c\\u0627\\u0631\\u06cc \\u06af\\u0645\\u0631\\u06a9\"]', 'تجاری-گمرک', NULL, NULL, 0, NULL, 'تجاری گمرک', NULL, NULL, 0, 4, NULL, NULL, NULL, 0, 1, '2023-08-03 10:27:36', '2023-08-03 10:27:36'),
(21, 61, 'تجاری بیمه بازرگانی', 'تجاری بیمه بازرگانی', 'تجاری بیمه بازرگانی', '[\"\\u062a\\u062c\\u0627\\u0631\\u06cc \\u0628\\u06cc\\u0645\\u0647 \\u0628\\u0627\\u0632\\u0631\\u06af\\u0627\\u0646\\u06cc\"]', 'تجاری-بیمه-بازرگانی', NULL, NULL, 0, NULL, 'تجاری بیمه بازرگانی', NULL, NULL, 0, 4, NULL, NULL, NULL, 0, 1, '2023-08-03 10:28:00', '2023-08-03 10:28:00'),
(22, 61, 'تجاری بورس', 'تجاری بورس', 'تجاری بورس', '[\"\\u062a\\u062c\\u0627\\u0631\\u06cc \\u0628\\u0648\\u0631\\u0633\"]', 'تجاری-بورس', NULL, NULL, 0, NULL, 'تجاری بورس', NULL, NULL, 0, 4, NULL, NULL, NULL, 0, 1, '2023-08-03 10:28:17', '2023-08-03 10:28:17'),
(23, 61, 'تجاری شرکت ها', 'تجاری شرکت ها', 'تجاری شرکت ها', '[\"\\u062a\\u062c\\u0627\\u0631\\u06cc \\u0634\\u0631\\u06a9\\u062a \\u0647\\u0627\"]', 'تجاری-شرکت-ها', NULL, NULL, 0, NULL, 'تجاری شرکت ها', NULL, NULL, 0, 4, NULL, NULL, NULL, 0, 1, '2023-08-03 10:28:34', '2023-08-03 10:28:34'),
(24, 61, 'تجاری اسناد تجاری', 'تجاری اسناد تجاری', 'تجاری اسناد تجاری', '[\"\\u062a\\u062c\\u0627\\u0631\\u06cc \\u0627\\u0633\\u0646\\u0627\\u062f \\u062a\\u062c\\u0627\\u0631\\u06cc\"]', 'تجاری-اسناد-تجاری', NULL, NULL, 0, NULL, 'تجاری اسناد تجاری', NULL, NULL, 0, 4, NULL, NULL, NULL, 0, 1, '2023-08-03 10:29:01', '2023-08-03 10:29:01'),
(25, 61, 'تجاری پولی و بانکی', 'تجاری پولی و بانکی', 'تجاری پولی و بانکی', '[\"\\u062a\\u062c\\u0627\\u0631\\u06cc \\u067e\\u0648\\u0644\\u06cc \\u0648 \\u0628\\u0627\\u0646\\u06a9\\u06cc\"]', 'تجاری-پولی-و-بانکی', NULL, NULL, 0, NULL, 'تجاری پولی و بانکی', NULL, NULL, 0, 4, NULL, NULL, NULL, 0, 1, '2023-08-03 10:29:24', '2023-08-03 10:29:24');

-- --------------------------------------------------------

--
-- Table structure for table `submenu_panels`
--

CREATE TABLE `submenu_panels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `label` varchar(255) DEFAULT NULL,
  `keycheck` varchar(255) DEFAULT NULL,
  `namayesh` varchar(255) DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL,
  `controller` varchar(255) DEFAULT NULL,
  `method` varchar(190) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `description` text DEFAULT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `submenu_panels`
--

INSERT INTO `submenu_panels` (`id`, `title`, `slug`, `label`, `keycheck`, `namayesh`, `class`, `controller`, `method`, `status`, `description`, `menu_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'منو داشبورد', 'menu-dashboard', NULL, '', 'menu-dashboard', NULL, 'MenudashboardController', 'resource', 4, '', 2, 1, '2023-01-30 08:13:43', '2023-01-30 08:13:43'),
(2, 'زیر منو داشبورد', 'submenu-dashboard', NULL, '', 'submenu-dashboard', NULL, 'SubmenudashboardController', 'resource', 4, '', 2, 1, '2023-01-30 08:13:43', '2023-01-30 08:13:43'),
(101, 'دسترسی کاربران', 'role-dashboard', 'role-dashboard', '', 'role-dashboard', 'index', 'RoleController', 'resource', 4, '', 3, 1, '2023-01-30 08:13:43', '2023-05-03 13:18:46'),
(102, 'سطح کاربران', 'level-user-dashboard', 'level user dashboard', '', 'level-user-dashboard', 'index', 'LevelManageController', 'resource', 4, '', 3, 1, '2023-01-30 08:13:43', '2023-05-05 13:35:46'),
(103, 'کاربران داشبورد', 'user-dashboard', 'userdashboard', '', 'user-dashboard', 'index', 'UserController', 'resource', 4, '', 3, 1, '2023-01-30 08:13:43', '2023-01-30 08:13:43'),
(104, 'نمایش پروفایل', 'profile', 'profile', '', 'profile', 'index', 'ProfileController', 'resource', 4, '', 3, 1, '2023-01-30 08:13:43', '2023-01-30 08:13:43'),
(105, 'مدیریت دسترسی', 'permission-dashboard-manage', NULL, '', 'permission-dashboard-manage', NULL, NULL, NULL, 4, '', 3, 1, '2023-01-30 08:13:43', '2023-01-30 08:13:43'),
(201, 'مدیریت منو سایت', 'menu-site-manage', NULL, '', 'menu-site-manage', NULL, 'MenuController', 'resource', 4, '', 4, 1, '2023-01-30 08:13:43', '2023-04-28 06:34:44'),
(202, 'مدیریت زیر منو سایت', 'submenu-site-manage', NULL, '', 'submenu-site-manage', NULL, 'SubmenuController', 'resource', 4, '', 4, 1, '2023-01-30 08:13:43', '2023-01-30 08:13:43'),
(203, 'مدیریت اسلاید ها', 'slide-manage', NULL, '', 'slide-manage', NULL, 'SlideController', 'resource', 4, '', 4, 1, '2023-02-04 12:10:38', '2023-02-04 12:15:07'),
(204, 'مدیریت برند', 'company-manage', 'company-manage', NULL, 'company-manage', 'company-manage', 'CompanyController', 'resource', 4, NULL, 2, 1, '2023-02-24 16:51:47', '2023-07-14 13:52:36'),
(207, 'مدیریت مشتریان', 'customer-manage', 'customer-manage', NULL, 'customer-manage', 'index', 'CustomerController', 'resource', 4, NULL, 4, 1, '2023-06-04 13:31:56', '2023-06-04 13:31:56'),
(208, 'مدیریت نمونه کارها', 'portfolio-manage', 'portfolio-manage', NULL, 'portfolio-manage', 'index', 'PortfolioController', 'resource', 4, NULL, 4, 1, '2023-06-05 11:27:30', '2023-06-05 11:28:08'),
(209, 'مدیریت مقالات', 'blug-manage', 'blug-manage', NULL, 'blug-manage', 'index', 'BlugController', 'resource', 4, NULL, 4, 1, '2023-06-06 06:39:55', '2023-06-06 06:39:55'),
(300, 'مدیریت دسته بندی', 'category-dashboard-manage', NULL, '', 'category-dashboard-manage', NULL, NULL, NULL, 4, '', 2, 1, '2023-01-30 08:13:43', '2023-01-30 08:13:43'),
(3003, 'مدیریت نوع مشتریان', 'customer-type-manage', 'customer-type-manage', NULL, 'customer-type-manage', NULL, 'CustomertypeController', 'resource', 4, NULL, 3, 1, '2023-07-20 03:54:06', '2023-07-20 03:54:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `api_token` varchar(255) DEFAULT NULL,
  `level` varchar(20) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verify` tinyint(4) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `nationalcode` varchar(10) DEFAULT NULL,
  `phone_verify` tinyint(1) DEFAULT NULL,
  `telphone` varchar(255) DEFAULT NULL,
  `type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `state_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `birthday` varchar(255) DEFAULT NULL,
  `gender` int(1) DEFAULT NULL,
  `age` int(2) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `whatsapp` varchar(191) DEFAULT NULL,
  `instagram` varchar(191) DEFAULT NULL,
  `telegram` varchar(191) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `academic_id` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `api_token`, `level`, `email`, `email_verify`, `email_verified_at`, `password`, `image`, `phone`, `nationalcode`, `phone_verify`, `telphone`, `type_id`, `state_id`, `city_id`, `birthday`, `gender`, `age`, `address`, `status`, `whatsapp`, `instagram`, `telegram`, `bio`, `academic_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'محمد حسین دیوان بیگی', 'hosseindbk', 'sFn72M45SwplaBxNUuZwCZmMdBVdT37XJvWgOtOBdH5a0H4db1fe9e1ldWO8QHRT643rfDGheA9z5dhU5qbi6HUaITqWs9yxdHmU', 'admin', 'hosseindbk@yahoo.com', 0, NULL, '$2y$10$aht8hinWz1ixIdvZ4oL5xedEcxkNkTjKaO8ecGCbN1oCMwdkvgLQW', NULL, '09128119938', NULL, 1, '02177247752', 1, NULL, NULL, '1371/04/16', 1, 31, 'نارمک خیابان دردشت بین کوچه 50 و 52 پلاک 53 طبقه اول', 4, '09128119938', '09128119938', '09128119938', 'نارمک خیابان دردشت بین کوچه 50 و 52 پلاک 53 طبقه اول', NULL, 'NlKb66kt0WOvlqF2Cl75CwT0urQcdwYKZn77K5KiR3DFEupNc45f2eKiKjPw', '2023-01-27 08:05:03', '2023-07-15 15:18:53'),
(29, 'مهدی اکبر زاده', 'mahdi_az', NULL, 'admin', 'mahdi_az@yahoo.com', 0, NULL, '$2y$10$KibwPsgCrRjOeqxpVox5Kesm/SKWu97tsqwHL1rKC96VWVZ9PQSvG', NULL, '09123456789', '0011223344', NULL, '02144556677', 2, NULL, NULL, NULL, 1, 30, 'ادرس', 4, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-11 16:34:31', '2023-07-11 16:34:31'),
(30, 'پریسا احمدی', 'parisa_a', NULL, 'admin', 'parisa_a@yahoo.com', 0, NULL, '$2y$10$xoJ4T1kI/sXvtYx7N6vau.xYdEzMCH.XqqtfVaKdNiicd9r0lnS9S', NULL, '09198122428', '2233445566', NULL, '02134567819', 2, NULL, NULL, NULL, 0, 34, 'ادرس', 4, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-11 16:36:16', '2023-07-11 16:36:16');

-- --------------------------------------------------------

--
-- Table structure for table `usertypes`
--

CREATE TABLE `usertypes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `title_fa` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `usertypes`
--

INSERT INTO `usertypes` (`id`, `title`, `title_fa`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'ادمین', '2023-01-27 08:04:57', '2023-01-27 08:04:57'),
(2, 'Chief', 'مدیر ارشد', '2023-01-27 08:04:57', '2023-01-27 08:04:57'),
(3, 'manager', 'مدیر', '2023-01-27 08:04:57', '2023-01-27 08:04:57'),
(4, 'Lawyer', 'وکیل', '2023-01-27 08:04:57', '2023-01-27 08:04:57'),
(5, 'Consultant', 'مشاور', '2023-01-27 08:04:57', '2023-01-27 08:04:57'),
(6, 'expert', 'کرشناس', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip` varchar(255) NOT NULL,
  `page_id` varchar(255) NOT NULL,
  `device` varchar(255) NOT NULL,
  `browser` varchar(255) NOT NULL,
  `from_page` varchar(255) NOT NULL,
  `to_page` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `active_codes`
--
ALTER TABLE `active_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `active_codes_user_id_foreign` (`user_id`);

--
-- Indexes for table `blugs`
--
ALTER TABLE `blugs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commentrates`
--
ALTER TABLE `commentrates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `logos_user_id_foreign` (`user_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customertypes`
--
ALTER TABLE `customertypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_user_id_foreign` (`user_id`),
  ADD KEY `media_submenu_id_foreign` (`submenu_id`),
  ADD KEY `menu_id` (`menu_id`) USING BTREE;

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_user_id_foreign` (`user_id`);

--
-- Indexes for table `menu_panels`
--
ALTER TABLE `menu_panels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_panels_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_roles_role_id_foreign` (`role_id`),
  ADD KEY `permission_roles_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD KEY `role_users_role_id_foreign` (`role_id`),
  ADD KEY `role_users_user_id_foreign` (`user_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slides_user_id_foreign` (`user_id`);

--
-- Indexes for table `submenus`
--
ALTER TABLE `submenus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submenu_panels`
--
ALTER TABLE `submenu_panels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `submenu_panels_menu_id_foreign` (`menu_id`),
  ADD KEY `submenu_panels_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `usertypes`
--
ALTER TABLE `usertypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `active_codes`
--
ALTER TABLE `active_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blugs`
--
ALTER TABLE `blugs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `commentrates`
--
ALTER TABLE `commentrates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `customertypes`
--
ALTER TABLE `customertypes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `menu_panels`
--
ALTER TABLE `menu_panels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2916;

--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=347;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `submenus`
--
ALTER TABLE `submenus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `submenu_panels`
--
ALTER TABLE `submenu_panels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3004;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `usertypes`
--
ALTER TABLE `usertypes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `active_codes`
--
ALTER TABLE `active_codes`
  ADD CONSTRAINT `active_codes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `logos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_ibfk_1` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
