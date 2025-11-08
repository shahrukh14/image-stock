-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 23, 2023 at 12:58 PM
-- Server version: 10.4.27-MariaDB-log
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `viserstock`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `username` varchar(40) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `username`, `email_verified_at`, `image`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin@site.com', 'admin', NULL, '6238276ac25d11647847274.png', '$2y$10$vE/MTe2KWfdjDneTEa1RDer8DHrNAhf1L6w/GLCsAz0Tb9HLQB/aW', 'JR9ccul5ba7oM62bCa3eV5GpneSuaFUlBDMipjRjf1Cs4cIgWNYAqaN3cypZ', NULL, '2022-03-28 08:17:02');

-- --------------------------------------------------------

--
-- Table structure for table `admin_notifications`
--

CREATE TABLE `admin_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `title` varchar(255) DEFAULT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `click_url` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_notifications`
--

INSERT INTO `admin_notifications` (`id`, `user_id`, `title`, `is_read`, `click_url`, `created_at`, `updated_at`) VALUES
(1, 0, 'A new contact message has been submitted', 0, '/admin/ticket/view/1', '2023-11-06 21:34:08', '2023-11-06 21:34:08'),
(2, 0, 'A new contact message has been submitted', 0, '/admin/ticket/view/2', '2023-11-06 20:38:13', '2023-11-06 20:38:13'),
(3, 0, 'A new contact message has been submitted', 0, '/admin/ticket/view/3', '2023-11-07 01:25:18', '2023-11-07 01:25:18'),
(4, 0, 'A new contact message has been submitted', 0, '/admin/ticket/view/10', '2023-11-07 03:33:42', '2023-11-07 03:33:42'),
(5, 2, 'New member registered', 0, '/admin/users/detail/2', '2023-11-19 18:48:34', '2023-11-19 18:48:34'),
(6, 3, 'New member registered', 0, '/admin/users/detail/3', '2023-11-19 21:47:18', '2023-11-19 21:47:18'),
(7, 0, 'SMTP Error: Could not connect to SMTP host.', 0, '#', '2023-11-19 21:49:35', '2023-11-19 21:49:35'),
(8, 0, 'SMTP Error: Could not connect to SMTP host.', 0, '#', '2023-11-19 21:53:20', '2023-11-19 21:53:20'),
(9, 4, 'New member registered', 0, '/admin/users/detail/4', '2023-11-19 21:55:44', '2023-11-19 21:55:44'),
(10, 0, 'SMTP Error: Could not connect to SMTP host.', 0, '#', '2023-11-19 21:55:55', '2023-11-19 21:55:55'),
(11, 0, 'SMTP Error: Could not connect to SMTP host.', 0, '#', '2023-11-19 22:00:06', '2023-11-19 22:00:06'),
(12, 0, 'SMTP Error: Could not connect to SMTP host.', 0, '#', '2023-11-19 22:02:57', '2023-11-19 22:02:57'),
(13, 0, 'SMTP Error: Could not connect to SMTP host.', 0, '#', '2023-11-19 22:05:30', '2023-11-19 22:05:30'),
(14, 5, 'New member registered', 0, '/admin/users/detail/5', '2023-11-20 23:28:52', '2023-11-20 23:28:52');

-- --------------------------------------------------------

--
-- Table structure for table `admin_password_resets`
--

CREATE TABLE `admin_password_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `token` varchar(40) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 = image, 1 = script',
  `image` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `code` text DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `target_url` text DEFAULT NULL,
  `impressions` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `type`, `image`, `title`, `code`, `size`, `target_url`, `impressions`, `created_at`, `updated_at`) VALUES
(1, 0, '654b819632da31699447190.jpg', 'Test Ad', '', '728x90', 'https://www.facebook.com/', 160, '2023-11-08 02:09:50', '2023-11-23 00:20:05'),
(2, 0, '654b83ac28ba81699447724.jpg', 'Test Ads', '', '728x90', 'https://stackoverflow.com/', 160, '2023-11-08 01:13:49', '2023-11-23 00:20:05');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(25) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(200) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `feature_image` varchar(255) DEFAULT NULL,
  `blog_body` varchar(10000) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `seo_data` longtext DEFAULT NULL,
  `deleted_at` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `slug`, `date`, `author`, `feature_image`, `blog_body`, `category`, `seo_data`, `deleted_at`, `created_at`, `updated_at`) VALUES
(15, '76 free Lightroom presets you can download to save time on photo edit', '76-free-lightroom-presets-you-can-download-to-save-time-on-photo-edit-359190130', '2023-11-06', 'author', '20231113_820438018_.jpg', '<h2 style=\"margin-bottom: 16px; font-weight: 700; font-size: 32px; line-height: 1.188em; color: var(--neutral--800); font-family: Onest, sans-serif;\">What are the key differences between a DSLR camera and a mirrorless camera?</h2><p style=\"margin-top: 16px; margin-bottom: 16px; color: rgb(82, 82, 82); font-family: Onest, sans-serif; font-size: 16px;\">Suspendisse egestas suspendisse eleifend at in mattis magna odio gravida eu lacus, commodo tincidunt id eget tellus at sit vulputate sem magnis proin ut convallis netus ut cras porttitor consequat neque tincidunt adipiscing cursus odio in pulvinar metus aliquet quis aliquam odio posuere eleifend erat magna ultricies tellus non, ultrices eget ut eu commodo volutpat accumsan, vulputate aliquet.</p><h3 style=\"margin-bottom: 16px; font-weight: 700; margin-top: 48px; font-size: 24px; line-height: 1.5em; color: var(--neutral--800); font-family: Onest, sans-serif;\">Technical differences you should also take into account</h3><p style=\"margin-top: 16px; margin-bottom: 16px; color: rgb(82, 82, 82); font-family: Onest, sans-serif; font-size: 16px;\">Gravida in lectus bibendum dolor interdum nam amet nibh egestas gravida lacus aliquam nulla enim, dolor, nam suspendisse adipiscing donec eleifend nec tempor eget orci facilisis sodales tempor, sociis consectetur at nec risus faucibus sed facilisi ultricies metus malesuada egestas nisl aliquam semper tempus viverra dui elementum viverra sapien eleifend in nisl vulputate fermentum malesuada urna.</p><figure class=\"w-richtext-align-fullwidth w-richtext-figure-type-image\" style=\"margin: 48px auto; max-width: 100%; position: relative; width: 638px; text-align: center; clear: both; color: rgb(82, 82, 82); font-family: Onest, sans-serif;\"><div style=\"color: rgba(0, 0, 0, 0); font-size: 0px; display: inline-block; padding-bottom: inherit;\"><img src=\"http://image_stock.test/assets/images/app_images/rich-text-image-stock-x-webflow-template.jpg\" loading=\"lazy\" alt=\"\" style=\"border: 0px; display: inline-block; width: 638px;\"></div><figcaption style=\"margin-top: 24px; caption-side: bottom;\">Pellentesque tellus, aliquam cursus id viverra mauris viverra pellentesque et</figcaption></figure><h4 style=\"margin-bottom: 16px; font-weight: 700; margin-top: 48px; font-size: 20px; line-height: 1.5em; color: var(--neutral--800); font-family: Onest, sans-serif;\">Is there any difference in image quality or camera perfomance?</h4><p style=\"margin-top: 16px; margin-bottom: 16px; color: rgb(82, 82, 82); font-family: Onest, sans-serif; font-size: 16px;\">Blandit et aliquet semper pellentesque accumsan, maecenas duis tempor tincidunt egestas phasellus curabitur volutpat lorem enim lobortis lectus non augue facilisis ut mauris non a lacinia varius ut condimentum libero sed cras lacus ut consectetur cras blandit eget egestas orci erat est sagittis tempus vulputate suspendisse ultricies pellentesque neque massa in rhoncus nunc odio eget nec ultricies et vestibulum mauris semper et aliquet a suspendisse eget elit elementum blandit.</p><ol start=\"\" role=\"list\" style=\"margin-top: 20px; margin-bottom: 48px; padding-left: 40px; overflow: hidden; color: rgb(82, 82, 82); font-family: Onest, sans-serif;\"><li style=\"margin-bottom: 8px; padding-left: 8px;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Viverra risus viverra fames enim in a id elementum tincidunt morbi turpis pharetra</li><li style=\"margin-bottom: 8px; padding-left: 8px;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Turpis nulla libero a quam risus in viverra sed magnis varius morbi habitasse</li><li style=\"margin-bottom: 8px; padding-left: 8px;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Fermentum, vel blandit massa vestibulum hac consequat feugiat in egestas</li><li style=\"margin-bottom: 8px; padding-left: 8px;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Eget vulputate varius at bibendum tellus senectus et placerat a vitae</li></ol><blockquote style=\"border: 0px solid rgb(0, 0, 0); margin-top: 48px; margin-bottom: 48px; padding: 80px 50px; font-size: 20px; line-height: 1.5em; background-color: var(--accent--primary-1); color: var(--neutral--100); text-align: center; font-family: Onest, sans-serif;\">“Molestie magna dui vulputate vestibulum posuere eget accumsan nibh arcu vitae amet erat commodo enim, a eros lectus aliquam, vivamus vitae dui id ut tincidunt euismod sed cursus id arcu”</blockquote><h5 style=\"margin-bottom: 16px; font-weight: 700; margin-top: 48px; font-size: 18px; line-height: 1.333em; color: var(--neutral--800); font-family: Onest, sans-serif;\">What is the price difference from a mirrorless versus a DSLR?</h5><p style=\"margin-top: 16px; margin-bottom: 16px; color: rgb(82, 82, 82); font-family: Onest, sans-serif; font-size: 16px;\">Blandit et aliquet semper pellentesque accumsan, maecenas duis tempor tincidunt egestas phasellus curabitur volutpat lorem enim lobortis lectus non augue facilisis ut mauris non a lacinia varius ut condimentum libero sed cras lacus ut consectetur cras blandit eget egestas orci erat est sagittis tempus vulputate suspendisse ultricies pellentesque neque massa in rhoncus nunc odio eget nec ultricies et vestibulum mauris semper et aliquet a suspendisse eget elit elementum blandit.</p><h6 style=\"text-align: center; margin-bottom: 16px; font-weight: 700; margin-top: 48px; font-size: 16px; line-height: 1.375em; color: var(--neutral--800); font-family: Onest, sans-serif;\"><span style=\"color: var(--neutral--800);\"><br></span></h6><h6 style=\"text-align: center; margin-bottom: 16px; font-weight: 700; margin-top: 48px; font-size: 16px; line-height: 1.375em; color: var(--neutral--800); font-family: Onest, sans-serif;\"><span style=\"color: var(--neutral--800);\">Which camera do you use right now to shoot your photos and and videos?</span><br></h6><p style=\"text-align: center; margin-top: 16px; margin-bottom: 16px; color: rgb(82, 82, 82); font-family: Onest, sans-serif; font-size: 16px;\">Eros, in pulvinar aenean tempor ac fermentum a sagittis, sit enim, amet, elementum nunc nec mauris urna curabitur urna malesuada aliquam senectus aliquam turpis id urna ornare tellus, velit in proin egestas sed pellentesque ut ut enim sed egestas quam purus non at nulla congue nisl, risus at aliquam enim tellus erat tellus felis, felis tincidunt lacus aliquam purus consectetur auctor massa tincidunt.</p>', '4', NULL, NULL, '2023-11-06 01:32:49', '2023-11-13 01:24:27'),
(21, 'Lightroom presets you can download to save time on new photo', 'lightroom-presets-you-can-download-to-save-time-on-new-photo-1602352592', '2023-11-06', 'author', '20231113_1257802733_.jpg', '<h2 style=\"margin-bottom: 16px; font-weight: 700; font-size: 32px; line-height: 1.188em; color: var(--neutral--800); font-family: Onest, sans-serif;\">What are the key differences between a DSLR camera and a mirrorless camera?</h2><p style=\"margin-top: 16px; margin-bottom: 16px; color: rgb(82, 82, 82); font-family: Onest, sans-serif; font-size: 16px;\">Suspendisse egestas suspendisse eleifend at in mattis magna odio gravida eu lacus, commodo tincidunt id eget tellus at sit vulputate sem magnis proin ut convallis netus ut cras porttitor consequat neque tincidunt adipiscing cursus odio in pulvinar metus aliquet quis aliquam odio posuere eleifend erat magna ultricies tellus non, ultrices eget ut eu commodo volutpat accumsan, vulputate aliquet.</p><h3 style=\"margin-bottom: 16px; font-weight: 700; margin-top: 48px; font-size: 24px; line-height: 1.5em; color: var(--neutral--800); font-family: Onest, sans-serif;\">Technical differences you should also take into account</h3><p style=\"margin-top: 16px; margin-bottom: 16px; color: rgb(82, 82, 82); font-family: Onest, sans-serif; font-size: 16px;\">Gravida in lectus bibendum dolor interdum nam amet nibh egestas gravida lacus aliquam nulla enim, dolor, nam suspendisse adipiscing donec eleifend nec tempor eget orci facilisis sodales tempor, sociis consectetur at nec risus faucibus sed facilisi ultricies metus malesuada egestas nisl aliquam semper tempus viverra dui elementum viverra sapien eleifend in nisl vulputate fermentum malesuada urna.</p><figure class=\"w-richtext-align-fullwidth w-richtext-figure-type-image\" style=\"margin: 48px auto; max-width: 100%; position: relative; width: 638px; text-align: center; clear: both; color: rgb(82, 82, 82); font-family: Onest, sans-serif;\"><div style=\"color: rgba(0, 0, 0, 0); font-size: 0px; display: inline-block; padding-bottom: inherit;\"><img src=\"http://image_stock.test/assets/images/app_images/rich-text-image-stock-x-webflow-template.jpg\" loading=\"lazy\" alt=\"\" style=\"border: 0px; display: inline-block; width: 638px;\"></div><figcaption style=\"margin-top: 24px; caption-side: bottom;\">Pellentesque tellus, aliquam cursus id viverra mauris viverra pellentesque et</figcaption></figure><h4 style=\"margin-bottom: 16px; font-weight: 700; margin-top: 48px; font-size: 20px; line-height: 1.5em; color: var(--neutral--800); font-family: Onest, sans-serif;\">Is there any difference in image quality or camera perfomance?</h4><p style=\"margin-top: 16px; margin-bottom: 16px; color: rgb(82, 82, 82); font-family: Onest, sans-serif; font-size: 16px;\">Blandit et aliquet semper pellentesque accumsan, maecenas duis tempor tincidunt egestas phasellus curabitur volutpat lorem enim lobortis lectus non augue facilisis ut mauris non a lacinia varius ut condimentum libero sed cras lacus ut consectetur cras blandit eget egestas orci erat est sagittis tempus vulputate suspendisse ultricies pellentesque neque massa in rhoncus nunc odio eget nec ultricies et vestibulum mauris semper et aliquet a suspendisse eget elit elementum blandit.</p><ol start=\"\" role=\"list\" style=\"margin-top: 20px; margin-bottom: 48px; padding-left: 40px; overflow: hidden; color: rgb(82, 82, 82); font-family: Onest, sans-serif;\"><li style=\"margin-bottom: 8px; padding-left: 8px;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Viverra risus viverra fames enim in a id elementum tincidunt morbi turpis pharetra</li><li style=\"margin-bottom: 8px; padding-left: 8px;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Turpis nulla libero a quam risus in viverra sed magnis varius morbi habitasse</li><li style=\"margin-bottom: 8px; padding-left: 8px;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Fermentum, vel blandit massa vestibulum hac consequat feugiat in egestas</li><li style=\"margin-bottom: 8px; padding-left: 8px;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Eget vulputate varius at bibendum tellus senectus et placerat a vitae</li></ol><blockquote style=\"border: 0px solid rgb(0, 0, 0); margin-top: 48px; margin-bottom: 48px; padding: 80px 50px; font-size: 20px; line-height: 1.5em; background-color: var(--accent--primary-1); color: var(--neutral--100); text-align: center; font-family: Onest, sans-serif;\">“Molestie magna dui vulputate vestibulum posuere eget accumsan nibh arcu vitae amet erat commodo enim, a eros lectus aliquam, vivamus vitae dui id ut tincidunt euismod sed cursus id arcu”</blockquote><h5 style=\"margin-bottom: 16px; font-weight: 700; margin-top: 48px; font-size: 18px; line-height: 1.333em; color: var(--neutral--800); font-family: Onest, sans-serif;\">What is the price difference from a mirrorless versus a DSLR?</h5><p style=\"margin-top: 16px; margin-bottom: 16px; color: rgb(82, 82, 82); font-family: Onest, sans-serif; font-size: 16px;\">Blandit et aliquet semper pellentesque accumsan, maecenas duis tempor tincidunt egestas phasellus curabitur volutpat lorem enim lobortis lectus non augue facilisis ut mauris non a lacinia varius ut condimentum libero sed cras lacus ut consectetur cras blandit eget egestas orci erat est sagittis tempus vulputate suspendisse ultricies pellentesque neque massa in rhoncus nunc odio eget nec ultricies et vestibulum mauris semper et aliquet a suspendisse eget elit elementum blandit.</p><h6 style=\"text-align: center; margin-bottom: 16px; font-weight: 700; margin-top: 48px; font-size: 16px; line-height: 1.375em; color: var(--neutral--800); font-family: Onest, sans-serif;\"><span style=\"color: var(--neutral--800);\"><br></span></h6><h6 style=\"text-align: center; margin-bottom: 16px; font-weight: 700; margin-top: 48px; font-size: 16px; line-height: 1.375em; color: var(--neutral--800); font-family: Onest, sans-serif;\"><span style=\"color: var(--neutral--800);\">Which camera do you use right now to shoot your photos and and videos?</span><br></h6><p style=\"text-align: center; margin-top: 16px; margin-bottom: 16px; color: rgb(82, 82, 82); font-family: Onest, sans-serif; font-size: 16px;\">Eros, in pulvinar aenean tempor ac fermentum a sagittis, sit enim, amet, elementum nunc nec mauris urna curabitur urna malesuada aliquam senectus aliquam turpis id urna ornare tellus, velit in proin egestas sed pellentesque ut ut enim sed egestas quam purus non at nulla congue nisl, risus at aliquam enim tellus erat tellus felis, felis tincidunt lacus aliquam purus consectetur auctor massa tincidunt.</p>', '5', NULL, NULL, '2023-11-06 01:32:49', '2023-11-13 01:20:37'),
(23, 'presets you can download to save time on new photo', 'presets-you-can-download-to-save-time-on-new-photo-1049477681', '2023-11-06', 'author', '20231113_1050987243_.jpg', '<h2 style=\"margin-bottom: 16px; font-weight: 700; font-size: 32px; line-height: 1.188em; color: var(--neutral--800); font-family: Onest, sans-serif;\">What are the key differences between a DSLR camera and a mirrorless camera?</h2><p style=\"margin-top: 16px; margin-bottom: 16px; color: rgb(82, 82, 82); font-family: Onest, sans-serif; font-size: 16px;\">Suspendisse egestas suspendisse eleifend at in mattis magna odio gravida eu lacus, commodo tincidunt id eget tellus at sit vulputate sem magnis proin ut convallis netus ut cras porttitor consequat neque tincidunt adipiscing cursus odio in pulvinar metus aliquet quis aliquam odio posuere eleifend erat magna ultricies tellus non, ultrices eget ut eu commodo volutpat accumsan, vulputate aliquet.</p><h3 style=\"margin-bottom: 16px; font-weight: 700; margin-top: 48px; font-size: 24px; line-height: 1.5em; color: var(--neutral--800); font-family: Onest, sans-serif;\">Technical differences you should also take into account</h3><p style=\"margin-top: 16px; margin-bottom: 16px; color: rgb(82, 82, 82); font-family: Onest, sans-serif; font-size: 16px;\">Gravida in lectus bibendum dolor interdum nam amet nibh egestas gravida lacus aliquam nulla enim, dolor, nam suspendisse adipiscing donec eleifend nec tempor eget orci facilisis sodales tempor, sociis consectetur at nec risus faucibus sed facilisi ultricies metus malesuada egestas nisl aliquam semper tempus viverra dui elementum viverra sapien eleifend in nisl vulputate fermentum malesuada urna.</p><figure class=\"w-richtext-align-fullwidth w-richtext-figure-type-image\" style=\"margin: 48px auto; max-width: 100%; position: relative; width: 638px; text-align: center; clear: both; color: rgb(82, 82, 82); font-family: Onest, sans-serif;\"><div style=\"color: rgba(0, 0, 0, 0); font-size: 0px; display: inline-block; padding-bottom: inherit;\"><img src=\"http://image_stock.test/assets/images/app_images/rich-text-image-stock-x-webflow-template.jpg\" loading=\"lazy\" alt=\"\" style=\"border: 0px; display: inline-block; width: 638px;\"></div><figcaption style=\"margin-top: 24px; caption-side: bottom;\">Pellentesque tellus, aliquam cursus id viverra mauris viverra pellentesque et</figcaption></figure><h4 style=\"margin-bottom: 16px; font-weight: 700; margin-top: 48px; font-size: 20px; line-height: 1.5em; color: var(--neutral--800); font-family: Onest, sans-serif;\">Is there any difference in image quality or camera perfomance?</h4><p style=\"margin-top: 16px; margin-bottom: 16px; color: rgb(82, 82, 82); font-family: Onest, sans-serif; font-size: 16px;\">Blandit et aliquet semper pellentesque accumsan, maecenas duis tempor tincidunt egestas phasellus curabitur volutpat lorem enim lobortis lectus non augue facilisis ut mauris non a lacinia varius ut condimentum libero sed cras lacus ut consectetur cras blandit eget egestas orci erat est sagittis tempus vulputate suspendisse ultricies pellentesque neque massa in rhoncus nunc odio eget nec ultricies et vestibulum mauris semper et aliquet a suspendisse eget elit elementum blandit.</p><ol start=\"\" role=\"list\" style=\"margin-top: 20px; margin-bottom: 48px; padding-left: 40px; overflow: hidden; color: rgb(82, 82, 82); font-family: Onest, sans-serif;\"><li style=\"margin-bottom: 8px; padding-left: 8px;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Viverra risus viverra fames enim in a id elementum tincidunt morbi turpis pharetra</li><li style=\"margin-bottom: 8px; padding-left: 8px;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Turpis nulla libero a quam risus in viverra sed magnis varius morbi habitasse</li><li style=\"margin-bottom: 8px; padding-left: 8px;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Fermentum, vel blandit massa vestibulum hac consequat feugiat in egestas</li><li style=\"margin-bottom: 8px; padding-left: 8px;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Eget vulputate varius at bibendum tellus senectus et placerat a vitae</li></ol><blockquote style=\"border: 0px solid rgb(0, 0, 0); margin-top: 48px; margin-bottom: 48px; padding: 80px 50px; font-size: 20px; line-height: 1.5em; background-color: var(--accent--primary-1); color: var(--neutral--100); text-align: center; font-family: Onest, sans-serif;\">“Molestie magna dui vulputate vestibulum posuere eget accumsan nibh arcu vitae amet erat commodo enim, a eros lectus aliquam, vivamus vitae dui id ut tincidunt euismod sed cursus id arcu”</blockquote><h5 style=\"margin-bottom: 16px; font-weight: 700; margin-top: 48px; font-size: 18px; line-height: 1.333em; color: var(--neutral--800); font-family: Onest, sans-serif;\">What is the price difference from a mirrorless versus a DSLR?</h5><p style=\"margin-top: 16px; margin-bottom: 16px; color: rgb(82, 82, 82); font-family: Onest, sans-serif; font-size: 16px;\">Blandit et aliquet semper pellentesque accumsan, maecenas duis tempor tincidunt egestas phasellus curabitur volutpat lorem enim lobortis lectus non augue facilisis ut mauris non a lacinia varius ut condimentum libero sed cras lacus ut consectetur cras blandit eget egestas orci erat est sagittis tempus vulputate suspendisse ultricies pellentesque neque massa in rhoncus nunc odio eget nec ultricies et vestibulum mauris semper et aliquet a suspendisse eget elit elementum blandit.</p><h6 style=\"text-align: center; margin-bottom: 16px; font-weight: 700; margin-top: 48px; font-size: 16px; line-height: 1.375em; color: var(--neutral--800); font-family: Onest, sans-serif;\"><span style=\"color: var(--neutral--800);\"><br></span></h6><h6 style=\"text-align: center; margin-bottom: 16px; font-weight: 700; margin-top: 48px; font-size: 16px; line-height: 1.375em; color: var(--neutral--800); font-family: Onest, sans-serif;\"><span style=\"color: var(--neutral--800);\">Which camera do you use right now to shoot your photos and and videos?</span><br></h6><p style=\"text-align: center; margin-top: 16px; margin-bottom: 16px; color: rgb(82, 82, 82); font-family: Onest, sans-serif; font-size: 16px;\">Eros, in pulvinar aenean tempor ac fermentum a sagittis, sit enim, amet, elementum nunc nec mauris urna curabitur urna malesuada aliquam senectus aliquam turpis id urna ornare tellus, velit in proin egestas sed pellentesque ut ut enim sed egestas quam purus non at nulla congue nisl, risus at aliquam enim tellus erat tellus felis, felis tincidunt lacus aliquam purus consectetur auctor massa tincidunt.</p>', '5', NULL, NULL, '2023-11-06 01:32:49', '2023-11-13 01:24:42'),
(24, 'Test Blog', 'test-blog-1128277801', '2023-11-15', 'Mr Author', '20231115_2102324102_.jpg', 'Test Blog&nbsp;<span style=\"color: rgb(33, 37, 41);\">Test Blog&nbsp;</span><span style=\"color: rgb(33, 37, 41);\">Test Blog&nbsp;</span><span style=\"color: rgb(33, 37, 41);\">Test Blog&nbsp;</span><span style=\"color: rgb(33, 37, 41);\">Test Blog&nbsp;</span><span style=\"color: rgb(33, 37, 41);\">Test Blog&nbsp;</span><span style=\"color: rgb(33, 37, 41);\">Test Blog&nbsp;</span>', '4', '{\"seo_image\":null,\"keywords\":[\"freepik\",\"shutterstock\"],\"description\":\"GreenStock is a laravel Based Script for Ultimate Microstock Marketplace. You can run your own photo stock website within a minutes without any programming knowledge. Its an online Earning Platform for both Site owner and User. Our system is fully dynamic, Easy to use, User Friendly and 100% responsive.\",\"social_title\":\"GreenStock - Ultimate Microstock Marketplace\",\"social_description\":\"GreenStock is a laravel Based Script for Ultimate Microstock Marketplace. You can run your own photo stock website within a minutes without any programming knowledge. Its an online Earning Platform for both Site owner and User. Our system is fully dynamic, Easy to use, User Friendly and 100% responsive.\",\"image\":null}', NULL, '2023-11-14 20:37:12', '2023-11-14 20:53:23');

-- --------------------------------------------------------

--
-- Table structure for table `blog_category`
--

CREATE TABLE `blog_category` (
  `id` int(25) NOT NULL,
  `blog_category` varchar(255) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `blog_category`
--

INSERT INTO `blog_category` (`id`, `blog_category`, `slug`, `created_at`, `updated_at`) VALUES
(4, 'sci-fi-blog', 'sci-fi-blog', '2023-11-03 06:37:47', '2023-11-04 01:51:02'),
(5, 'gold loan', 'gold-loan-2040452965', '2023-11-03 06:38:01', '2023-11-06 03:01:30'),
(9, 'comedy', 'comedy-1867320933', '2023-11-04 01:53:16', '2023-11-06 03:00:32'),
(10, 'horror films', 'horror-films-16559220', '2023-11-06 03:02:05', '2023-11-06 03:02:05');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `slug` varchar(40) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Anime', 'Anime', '654b292b59fde1699424555.jpg', 1, '2023-11-07 19:52:35', '2023-11-07 19:52:35'),
(2, 'Cars', 'Cars', '654b29415829e1699424577.jpg', 1, '2023-11-07 19:52:57', '2023-11-07 19:52:57'),
(3, 'Bikes', 'Bikes', '654b294dafc3b1699424589.jpg', 1, '2023-11-07 19:53:09', '2023-11-07 19:53:09');

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `title` varchar(40) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `is_public` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `collection_images`
--

CREATE TABLE `collection_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `collection_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `image_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `color_code` varchar(40) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `color_code`, `created_at`, `updated_at`) VALUES
(1, 'Green', '04cf4f', '2023-11-07 19:53:35', '2023-11-07 19:53:35'),
(2, 'Blue', '0665f8', '2023-11-07 19:53:45', '2023-11-07 19:53:45'),
(3, 'Red', 'e70606', '2023-11-07 19:53:51', '2023-11-07 19:53:51'),
(4, 'Yellow', 'e9eb06', '2023-11-07 19:56:12', '2023-11-07 19:56:12');

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `plan_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `donation_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `period` varchar(40) DEFAULT NULL,
  `method_code` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `amount` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `method_currency` varchar(40) DEFAULT NULL,
  `charge` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `rate` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `final_amo` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `detail` text DEFAULT NULL,
  `btc_amo` varchar(255) DEFAULT NULL,
  `btc_wallet` varchar(255) DEFAULT NULL,
  `trx` varchar(40) DEFAULT NULL,
  `try` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1=>success, 2=>pending, 3=>cancel',
  `from_api` tinyint(1) NOT NULL DEFAULT 0,
  `admin_feedback` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `receiver_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `image_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `amount` decimal(10,0) UNSIGNED NOT NULL DEFAULT 0,
  `payment_info` text DEFAULT NULL,
  `sender` longtext DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1 - paid, 0 - initiate, 2 = pending ',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `downloads`
--

CREATE TABLE `downloads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_file_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `ip` text DEFAULT NULL,
  `contributor_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `premium` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `earning_logs`
--

CREATE TABLE `earning_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contributor_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `image_file_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `amount` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `earning_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `extensions`
--

CREATE TABLE `extensions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `act` varchar(40) DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `script` text DEFAULT NULL,
  `shortcode` text DEFAULT NULL COMMENT 'object',
  `support` text DEFAULT NULL COMMENT 'help section',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=>enable, 2=>disable',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `extensions`
--

INSERT INTO `extensions` (`id`, `act`, `name`, `description`, `image`, `script`, `shortcode`, `support`, `status`, `created_at`, `updated_at`) VALUES
(1, 'tawk-chat', 'Tawk.to', 'Key location is shown bellow', 'tawky_big.png', '<script>\r\n                        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();\r\n                        (function(){\r\n                        var s1=document.createElement(\"script\"),s0=document.getElementsByTagName(\"script\")[0];\r\n                        s1.async=true;\r\n                        s1.src=\"https://embed.tawk.to/{{app_key}}\";\r\n                        s1.charset=\"UTF-8\";\r\n                        s1.setAttribute(\"crossorigin\",\"*\");\r\n                        s0.parentNode.insertBefore(s1,s0);\r\n                        })();\r\n                    </script>', '{\"app_key\":{\"title\":\"App Key\",\"value\":\"--------------------\"}}', 'twak.png', 0, '2019-10-18 23:16:05', '2023-07-26 19:26:33'),
(2, 'google-recaptcha2', 'Google Recaptcha 2', 'Key location is shown bellow', 'recaptcha3.png', '\n<script src=\"https://www.google.com/recaptcha/api.js\"></script>\n<div class=\"g-recaptcha\" data-sitekey=\"{{site_key}}\" data-callback=\"verifyCaptcha\"></div>\n<div id=\"g-recaptcha-error\"></div>', '{\"site_key\":{\"title\":\"Site Key\",\"value\":\"--------------------\"},\"secret_key\":{\"title\":\"Secret Key\",\"value\":\"--------------------\"}}', 'recaptcha.png', 0, '2019-10-18 23:16:05', '2023-07-26 19:26:37'),
(3, 'custom-captcha', 'Custom Captcha', 'Just put any random string', 'customcaptcha.png', NULL, '{\"random_key\":{\"title\":\"Random String\",\"value\":\"SecureString\"}}', 'na', 0, '2019-10-18 23:16:05', '2023-07-25 21:24:43'),
(4, 'google-analytics', 'Google Analytics', 'Key location is shown bellow', 'google_analytics.png', '<script async src=\"https://www.googletagmanager.com/gtag/js?id={{app_key}}\"></script>\n                <script>\n                  window.dataLayer = window.dataLayer || [];\n                  function gtag(){dataLayer.push(arguments);}\n                  gtag(\"js\", new Date());\n                \n                  gtag(\"config\", \"{{app_key}}\");\n                </script>', '{\"app_key\":{\"title\":\"App Key\",\"value\":\"--------------------\"}}', 'ganalytics.png', 0, NULL, '2023-07-26 19:26:40');

-- --------------------------------------------------------

--
-- Table structure for table `follows`
--

CREATE TABLE `follows` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `following_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `act` varchar(40) DEFAULT NULL,
  `form_data` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `frontends`
--

CREATE TABLE `frontends` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `data_keys` varchar(40) DEFAULT NULL,
  `data_values` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `frontends`
--

INSERT INTO `frontends` (`id`, `data_keys`, `data_values`, `created_at`, `updated_at`) VALUES
(1, 'seo.data', '{\"seo_image\":\"1\",\"keywords\":[\"freepik\",\"shutterstock\",\"GreenStock\"],\"description\":\"GreenStock is a laravel Based Script for Ultimate Microstock Marketplace. You can run your own photo stock website within a minutes without any programming knowledge. Its an online Earning Platform for both Site owner and User. Our system is fully dynamic, Easy to use, User Friendly and 100% responsive.\",\"social_title\":\"GreenStock - Ultimate Microstock Marketplace\",\"social_description\":\"GreenStock is a laravel Based Script for Ultimate Microstock Marketplace. You can run your own photo stock website within a minutes without any programming knowledge. Its an online Earning Platform for both Site owner and User. Our system is fully dynamic, Easy to use, User Friendly and 100% responsive.\",\"image\":\"6544c87a9eba91699006586.png\"}', '2020-07-04 23:42:52', '2023-11-02 23:46:26'),
(28, 'counter.content', '{\"heading\":\"Latest News\",\"sub_heading\":\"Register New Account\"}', '2020-10-28 01:04:02', '2020-10-28 01:04:02'),
(33, 'feature.content', '{\"heading\":\"asdf\",\"sub_heading\":\"asdf\"}', '2021-01-03 23:40:54', '2021-01-03 23:40:55'),
(34, 'feature.element', '{\"title\":\"asdf\",\"description\":\"asdf\",\"feature_icon\":\"asdf\"}', '2021-01-03 23:41:02', '2021-01-03 23:41:02'),
(36, 'about.content', '{\"has_image\":\"1\",\"title\":\"About Us\",\"subtitle\":\"GreenStock provides a platform for creative people from all walks of life and companies of all kinds to do their finest work.\",\"image\":\"655c6d19601951700556057.png\"}', '2021-03-06 01:27:34', '2023-11-20 22:10:58'),
(39, 'banner.content', '{\"has_image\":\"1\",\"title\":\"Digital downloads for everyone\",\"left_image\":\"63197f37ab8471662615351.png\",\"right_image\":\"63197f38173e41662615352.png\"}', '2021-05-02 06:09:30', '2022-09-08 04:05:52'),
(41, 'cookie.data', '{\"short_desc\":\"We may use cookies or any other tracking technologies when you visit our website, including any other media form, mobile website, or mobile application related or connected to help customize the Site and improve your experience.\",\"description\":\"<div class=\\\"mb-5\\\" style=\\\"color: rgb(111, 111, 111); font-family: Nunito, sans-serif; margin-bottom: 3rem !important;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight: 600; line-height: 1.3; font-size: 24px; font-family: Exo, sans-serif; color: rgb(54, 54, 54);\\\">What information do we collect?<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right: 0px; margin-left: 0px; font-size: 18px !important;\\\">We gather data from you when you register on our site, submit a request, buy any services, react to an overview, or round out a structure. At the point when requesting any assistance or enrolling on our site, as suitable, you might be approached to enter your: name, email address, or telephone number. You may, nonetheless, visit our site anonymously.<\\/p><\\/div><div class=\\\"mb-5\\\" style=\\\"color: rgb(111, 111, 111); font-family: Nunito, sans-serif; margin-bottom: 3rem !important;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight: 600; line-height: 1.3; font-size: 24px; font-family: Exo, sans-serif; color: rgb(54, 54, 54);\\\">How do we protect your information?<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right: 0px; margin-left: 0px; font-size: 18px !important;\\\">All provided delicate\\/credit data is sent through Stripe.<br>After an exchange, your private data (credit cards, social security numbers, financials, and so on) won\'t be put away on our workers.<\\/p><\\/div><div class=\\\"mb-5\\\" style=\\\"color: rgb(111, 111, 111); font-family: Nunito, sans-serif; margin-bottom: 3rem !important;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight: 600; line-height: 1.3; font-size: 24px; font-family: Exo, sans-serif; color: rgb(54, 54, 54);\\\">Do we disclose any information to outside parties?<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right: 0px; margin-left: 0px; font-size: 18px !important;\\\">We don\'t sell, exchange, or in any case move to outside gatherings by and by recognizable data. This does exclude confided in outsiders who help us in working our site, leading our business, or adjusting you, since those gatherings consent to keep this data private. We may likewise deliver your data when we accept discharge is suitable to follow the law, implement our site strategies, or ensure our own or others\' rights, property, or wellbeing.<\\/p><\\/div><div class=\\\"mb-5\\\" style=\\\"color: rgb(111, 111, 111); font-family: Nunito, sans-serif; margin-bottom: 3rem !important;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight: 600; line-height: 1.3; font-size: 24px; font-family: Exo, sans-serif; color: rgb(54, 54, 54);\\\">Children\'s Online Privacy Protection Act Compliance<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right: 0px; margin-left: 0px; font-size: 18px !important;\\\">We are consistent with the prerequisites of COPPA (Children\'s Online Privacy Protection Act), we don\'t gather any data from anybody under 13 years old. Our site, items, and administrations are completely coordinated to individuals who are in any event 13 years of age or more established.<\\/p><\\/div><div class=\\\"mb-5\\\" style=\\\"color: rgb(111, 111, 111); font-family: Nunito, sans-serif; margin-bottom: 3rem !important;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight: 600; line-height: 1.3; font-size: 24px; font-family: Exo, sans-serif; color: rgb(54, 54, 54);\\\">Changes to our Privacy Policy<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right: 0px; margin-left: 0px; font-size: 18px !important;\\\">If we decide to change our privacy policy, we will post those changes on this page.<\\/p><\\/div><div class=\\\"mb-5\\\" style=\\\"color: rgb(111, 111, 111); font-family: Nunito, sans-serif; margin-bottom: 3rem !important;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight: 600; line-height: 1.3; font-size: 24px; font-family: Exo, sans-serif; color: rgb(54, 54, 54);\\\">How long we retain your information?<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right: 0px; margin-left: 0px; font-size: 18px !important;\\\">At the point when you register for our site, we cycle and keep your information we have about you however long you don\'t erase the record or withdraw yourself (subject to laws and guidelines).<\\/p><\\/div><div class=\\\"mb-5\\\" style=\\\"color: rgb(111, 111, 111); font-family: Nunito, sans-serif; margin-bottom: 3rem !important;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight: 600; line-height: 1.3; font-size: 24px; font-family: Exo, sans-serif; color: rgb(54, 54, 54);\\\">What we don\\u2019t do with your data<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right: 0px; margin-left: 0px; font-size: 18px !important;\\\">We don\'t and will never share, unveil, sell, or in any case give your information to different organizations for the promoting of their items or administrations.<\\/p><\\/div>\",\"status\":1}', '2020-07-04 23:42:52', '2022-03-30 11:23:12'),
(42, 'policy_pages.element', '{\"title\":\"Privacy Policy\",\"details\":\"<div class=\\\"mb-5\\\" style=\\\"color:rgb(111,111,111);font-family:Nunito, sans-serif;margin-bottom:3rem;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\"><span style=\\\"color:rgb(54,54,54);font-size:24px;\\\">What information do we collect?<\\/span><br \\/><\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">We gather data from you when you register on our site, submit a request, buy any services, react to an overview, or round out a structure. At the point when requesting any assistance or enrolling on our site, as suitable, you might be approached to enter your: name, email address, or telephone number. You may, nonetheless, visit our site anonymously.<\\/p><\\/div><div class=\\\"mb-5\\\" style=\\\"color:rgb(111,111,111);font-family:Nunito, sans-serif;margin-bottom:3rem;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">How do we protect your information?<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">All provided delicate\\/credit data is sent through Stripe.<br \\/>After an exchange, your private data (credit cards, social security numbers, financials, and so on) won\'t be put away on our workers.<\\/p><\\/div><div class=\\\"mb-5\\\" style=\\\"color:rgb(111,111,111);font-family:Nunito, sans-serif;margin-bottom:3rem;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">Do we disclose any information to outside parties?<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">We don\'t sell, exchange, or in any case move to outside gatherings by and by recognizable data. This does exclude confided in outsiders who help us in working our site, leading our business, or adjusting you, since those gatherings consent to keep this data private. We may likewise deliver your data when we accept discharge is suitable to follow the law, implement our site strategies, or ensure our own or others\' rights, property, or wellbeing.<\\/p><\\/div><div class=\\\"mb-5\\\" style=\\\"color:rgb(111,111,111);font-family:Nunito, sans-serif;margin-bottom:3rem;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">Children\'s Online Privacy Protection Act Compliance<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">We are consistent with the prerequisites of COPPA (Children\'s Online Privacy Protection Act), we don\'t gather any data from anybody under 13 years old. Our site, items, and administrations are completely coordinated to individuals who are in any event 13 years of age or more established.<\\/p><\\/div><div class=\\\"mb-5\\\" style=\\\"color:rgb(111,111,111);font-family:Nunito, sans-serif;margin-bottom:3rem;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">Changes to our Privacy Policy<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">If we decide to change our privacy policy, we will post those changes on this page.<\\/p><\\/div><div class=\\\"mb-5\\\" style=\\\"color:rgb(111,111,111);font-family:Nunito, sans-serif;margin-bottom:3rem;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">How long we retain your information?<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">At the point when you register for our site, we cycle and keep your information we have about you however long you don\'t erase the record or withdraw yourself (subject to laws and guidelines).<\\/p><\\/div><div class=\\\"mb-5\\\" style=\\\"color:rgb(111,111,111);font-family:Nunito, sans-serif;margin-bottom:3rem;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">What we don\\u2019t do with your data<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">We don\'t and will never share, unveil, sell, or in any case give your information to different organizations for the promoting of their items or administrations.<\\/p><\\/div>\"}', '2021-06-09 08:50:42', '2023-11-19 19:51:28'),
(43, 'policy_pages.element', '{\"title\":\"Terms And Condition\",\"details\":\"<div class=\\\"mb-5\\\" style=\\\"color:rgb(111,111,111);font-family:Nunito, sans-serif;margin-bottom:3rem;\\\"><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">We claim all authority to dismiss, end, or handicap any help with or without cause per administrator discretion. This is a Complete independent facilitating, on the off chance that you misuse our ticket or Livechat or emotionally supportive network by submitting solicitations or protests we will impair your record. The solitary time you should reach us about the seaward facilitating is if there is an issue with the worker. We have not many substance limitations and everything is as per laws and guidelines. Try not to join on the off chance that you intend to do anything contrary to the guidelines, we do check these things and we will know, don\'t burn through our own and your time by joining on the off chance that you figure you will have the option to sneak by us and break the terms.<\\/p><\\/div><div class=\\\"mb-5\\\" style=\\\"color:rgb(111,111,111);font-family:Nunito, sans-serif;margin-bottom:3rem;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">Information We Collect<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">Before getting to this site, you are consenting to be limited by these site Terms and Conditions of Use, every single appropriate law, and guidelines, and concur that you are answerable for consistency with any material neighborhood laws. If you disagree with any of these terms, you are restricted from utilizing or getting to this site.<\\/p><\\/div><div class=\\\"mb-5\\\" style=\\\"color:rgb(111,111,111);font-family:Nunito, sans-serif;margin-bottom:3rem;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">Support<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">Whenever you have downloaded our item, you may get in touch with us for help through email and we will give a valiant effort to determine your issue. We will attempt to answer using the Email for more modest bug fixes, after which we will refresh the center bundle. Content help is offered to confirmed clients by Tickets as it were. Backing demands made by email and Livechat.<\\/p><p class=\\\"my-3 font-18 font-weight-bold\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">On the off chance that your help requires extra adjustment of the System, at that point, you have two alternatives:<\\/p><ul class=\\\"font-18\\\" style=\\\"padding-left:15px;list-style-type:disc;font-size:18px;\\\"><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">Hang tight for additional update discharge.<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">Or on the other hand, enlist a specialist (We offer customization for extra charges).<\\/li><\\/ul><\\/div><div class=\\\"mb-5\\\" style=\\\"color:rgb(111,111,111);font-family:Nunito, sans-serif;margin-bottom:3rem;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">Warranty<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">We don\'t offer any guarantee or assurance of these Services in any way. When our Services have been modified we can\'t ensure they will work with all outsider plugins, modules, or internet browsers. Program similarity ought to be tried against the show formats on the demo worker. If you don\'t mind guarantee that the programs you use will work with the component, as we can not ensure that our systems will work with all program mixes.<\\/p><\\/div><div class=\\\"mb-5\\\" style=\\\"color:rgb(111,111,111);font-family:Nunito, sans-serif;margin-bottom:3rem;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">Unauthorized\\/Illegal Usage<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">You may not utilize our things for any illicit or unapproved reason or may you, in the utilization of the stage, disregard any laws in your locale (counting yet not restricted to copyright laws) just as the laws of your nation and International law. Specifically, it is disallowed to utilize the things on our foundation for pages that advance: brutality, illegal intimidation, hard sexual entertainment, bigotry, obscenity content or warez programming joins.<br \\/><br \\/>You can\'t imitate, copy, duplicate, sell, exchange or adventure any of our segment, utilization of the offered on our things, or admittance to the administration without the express composed consent by us or item proprietor.<br \\/><br \\/>Our Members are liable for all substance posted on the discussion and demo and movement that happens under your record.<br \\/><br \\/>We hold the chance of hindering your participation account quickly if we will think about a particularly not allowed conduct.<br \\/><br \\/>If you make a record on our site, you are liable for keeping up the security of your record, and you are completely answerable for all exercises that happen under the record and some other activities taken regarding the record. You should quickly inform us, of any unapproved employments of your record or some other penetrates of security.<\\/p><\\/div>\"}', '2021-06-09 08:51:18', '2023-11-19 20:08:47'),
(44, 'maintenance.data', '{\"description\":\"<div class=\\\"mb-5\\\" style=\\\"color: rgb(111, 111, 111); font-family: Nunito, sans-serif; margin-bottom: 3rem !important;\\\"><h3 class=\\\"mb-3\\\" style=\\\"text-align: center; font-weight: 600; line-height: 1.3; font-size: 24px; font-family: Exo, sans-serif; color: rgb(54, 54, 54);\\\">What information do we collect?<\\/h3><p class=\\\"font-18\\\" style=\\\"text-align: center; margin-right: 0px; margin-left: 0px; font-size: 18px !important;\\\">We gather data from you when you register on our site, submit a request, buy any services, react to an overview, or round out a structure. At the point when requesting any assistance or enrolling on our site, as suitable, you might be approached to enter your: name, email address, or telephone number. You may, nonetheless, visit our site anonymously.<\\/p><\\/div>\"}', '2020-07-04 23:42:52', '2022-05-11 03:57:17'),
(45, 'about.element', '{\"title\":\"High-quality stock content\",\"description\":\"Download scroll-stopping images of the best quality to make your projects look professional.\",\"icon\":\"<i class=\\\"lar la-star\\\"><\\/i>\"}', '2022-09-08 04:38:51', '2022-09-08 04:39:12'),
(46, 'about.element', '{\"title\":\"Ready-to-use assets\",\"description\":\"Access thousands of images and designs ready-to-publish and get your project ready double quick.\",\"icon\":\"<i class=\\\"las la-thumbs-up\\\"><\\/i>\"}', '2022-09-08 04:39:52', '2022-09-08 04:39:52'),
(47, 'about.element', '{\"title\":\"Guaranteed search results\",\"description\":\"There\\u2019s an image and style for every project, whatever your needs are.\",\"icon\":\"<i class=\\\"las la-search\\\"><\\/i>\"}', '2022-09-08 04:40:21', '2022-09-08 04:40:21'),
(48, 'about.element', '{\"title\":\"Fresh content everyday\",\"description\":\"Our library is updated on a daily basis so you can find the newest and trendiest photos and designs.\",\"icon\":\"<i class=\\\"las la-sync\\\"><\\/i>\"}', '2022-09-08 04:40:56', '2022-09-08 04:40:56'),
(49, 'service.content', '{\"title\":\"ViserStock Pro bundle offer\",\"subtitle\":\"Whether you\\u2019re looking for designs or photographs, you\\u2019ll find the perfect asset on ViserStock.\"}', '2022-09-08 04:58:50', '2022-09-08 04:58:50'),
(50, 'service.element', '{\"title\":\"Premium Content\",\"description\":\"Access our entire photo, element, video and audio library, no extra cost.\",\"icon\":\"<i class=\\\"las la-image\\\"><\\/i>\"}', '2022-09-08 04:59:12', '2022-09-08 04:59:12'),
(51, 'service.element', '{\"title\":\"Premium Video\",\"description\":\"Create, edit and save premium videos for any platform\",\"icon\":\"<i class=\\\"las la-play-circle\\\"><\\/i>\"}', '2022-09-08 04:59:36', '2022-09-08 04:59:36'),
(52, 'service.element', '{\"title\":\"Background Remover\",\"description\":\"Click to remove image backgrounds, perfect for product photos\",\"icon\":\"<i class=\\\"las la-snowflake\\\"><\\/i>\"}', '2022-09-08 05:00:06', '2022-09-08 05:00:06'),
(53, 'service.element', '{\"title\":\"Instant Animation\",\"description\":\"Animate your designs with one click then watch come to life.\",\"icon\":\"<i class=\\\"las la-sync\\\"><\\/i>\"}', '2022-09-08 05:00:29', '2022-09-08 05:00:29'),
(54, 'footer.content', '{\"title\":\"About Us\",\"description\":\"The best free stock photos shared by talented creators and join us to be a part of our huge community. Earn, Contribute and be the most talent creators of us.\"}', '2022-09-08 05:23:05', '2022-09-08 05:23:05'),
(55, 'social_icon.element', '{\"name\":\"Facebook\",\"url\":\"https:\\/\\/www.facebook.com\\/\",\"icon\":\"<i class=\\\"lab la-facebook-f\\\"><\\/i>\"}', '2022-09-08 05:23:43', '2023-11-21 19:39:33'),
(56, 'social_icon.element', '{\"name\":\"Twitter\",\"url\":\"https:\\/\\/www.twitter.com\\/\",\"icon\":\"<i class=\\\"lab la-twitter\\\"><\\/i>\"}', '2022-09-08 05:24:09', '2022-09-08 05:24:09'),
(57, 'social_icon.element', '{\"name\":\"Linkedin\",\"url\":\"https:\\/\\/www.linkedin.com\\/\",\"icon\":\"<i class=\\\"lab la-linkedin-in\\\"><\\/i>\"}', '2022-09-08 05:24:41', '2022-09-08 05:24:41'),
(58, 'social_icon.element', '{\"name\":\"Instagram\",\"url\":\"https:\\/\\/www.instagram.com\\/\",\"icon\":\"<i class=\\\"lab la-instagram\\\"><\\/i>\"}', '2022-09-08 05:25:10', '2022-09-08 05:25:10'),
(59, 'cta.content', '{\"has_image\":\"1\",\"title\":\"Sign up to download free weekly stock images\",\"subtitle\":\"Ready for a world of free vectors, photos and video from amazing artists all over the world? Sign up free today.\",\"button_text\":\"Sign Up Free\",\"button_url\":\"\\/user\\/register\",\"image\":\"63199667e8f591662621287.png\"}', '2022-09-08 05:44:47', '2022-09-08 05:44:48'),
(60, 'login.content', '{\"has_image\":\"1\",\"form_title\":\"Login\",\"background_image\":\"637861441138e1668833604.png\",\"image\":\"63786cd36ba941668836563.png\"}', '2022-09-08 07:18:09', '2022-11-19 03:12:43'),
(61, 'register.content', '{\"has_image\":\"1\",\"form_title\":\"Register Now\",\"background_image\":\"63786dd627ac21668836822.png\",\"image\":\"6378717557c1d1668837749.png\"}', '2022-09-08 07:53:31', '2022-11-19 03:32:29'),
(62, 'plan.content', '{\"title\":\"Plans for Stock Photos\",\"subtitle\":\"Whether you\\u2019re looking for designs or photographs, you\\u2019ll find the perfect asset on ViserStock\"}', '2022-09-08 09:19:59', '2022-09-08 09:19:59'),
(63, 'collection.content', '{\"title\":\"Popular Collection\",\"subtitle\":\"Whether you\\u2019re looking for designs or photographs, you\\u2019ll find the perfect asset on ViserStock.\"}', '2022-09-12 05:46:28', '2022-10-10 02:29:58'),
(64, 'member.content', '{\"title\":\"Explore our members and their portfolio of resources.\"}', '2022-09-12 10:20:30', '2022-09-12 10:20:31'),
(65, 'premium.content', '{\"title\":\"Explore our premium resources of the highest quality.\"}', '2022-09-14 11:20:13', '2022-09-14 11:20:13'),
(66, 'contributor.content', '{\"title\":\"Top Contributor of the Month\",\"subtitle\":\"Whether you\\u2019re looking for designs or photographs, you\\u2019ll find the perfect asset on ViserStock.\"}', '2022-10-10 02:53:39', '2022-10-10 02:53:39'),
(67, 'policy_pages.element', '{\"title\":\"Do not sell my personal information\",\"details\":\"<div class=\\\"mb-5\\\" style=\\\"margin-bottom:3rem;color:rgb(111,111,111);font-family:Nunito, sans-serif;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\"><span style=\\\"color:rgb(54,54,54);\\\">Support<\\/span><br \\/><\\/h3><\\/div><div class=\\\"mb-5\\\" style=\\\"margin-bottom:3rem;color:rgb(111,111,111);font-family:Nunito, sans-serif;\\\"><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">Whenever you have downloaded our item, you may get in touch with us for help through email and we will give a valiant effort to determine your issue. We will attempt to answer using the Email for more modest bug fixes, after which we will refresh the center bundle. Content help is offered to confirmed clients by Tickets as it were. Backing demands made by email and Livechat.<\\/p><p class=\\\"my-3 font-18 font-weight-bold\\\" style=\\\"margin-right:0px;margin-left:0px;font-weight:700;font-size:18px;\\\">On the off chance that your help requires extra adjustment of the System, at that point, you have two alternatives:<\\/p><ul class=\\\"font-18\\\" style=\\\"padding-left:15px;list-style-type:disc;font-size:18px;\\\"><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">Hang tight for additional update discharge.<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">Or on the other hand, enlist a specialist (We offer customization for extra charges).<\\/li><\\/ul><\\/div><div class=\\\"mb-5\\\" style=\\\"margin-bottom:3rem;color:rgb(111,111,111);font-family:Nunito, sans-serif;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">Ownership<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">You may not guarantee scholarly or selective possession of any of our items, altered or unmodified. All items are property, we created them. Our items are given \\\"with no guarantees\\\" without guarantee of any sort, either communicated or suggested. On no occasion will our juridical individual be subject to any harms including, however not restricted to, immediate, roundabout, extraordinary, accidental, or significant harms or different misfortunes emerging out of the utilization of or powerlessness to utilize our items.<\\/p><\\/div><div class=\\\"mb-5\\\" style=\\\"margin-bottom:3rem;color:rgb(111,111,111);font-family:Nunito, sans-serif;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">Warranty<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">We don\'t offer any guarantee or assurance of these Services in any way. When our Services have been modified we can\'t ensure they will work with all outsider plugins, modules, or internet browsers. Program similarity ought to be tried against the show formats on the demo worker. If you don\'t mind guarantee that the programs you use will work with the component, as we can not ensure that our systems will work with all program mixes.<\\/p><\\/div><div class=\\\"mb-5\\\" style=\\\"margin-bottom:3rem;color:rgb(111,111,111);font-family:Nunito, sans-serif;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">Unauthorized\\/Illegal Usage<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">You may not utilize our things for any illicit or unapproved reason or may you, in the utilization of the stage, disregard any laws in your locale (counting yet not restricted to copyright laws) just as the laws of your nation and International law. Specifically, it is disallowed to utilize the things on our foundation for pages that advance: brutality, illegal intimidation, hard sexual entertainment, bigotry, obscenity content or warez programming joins.<br \\/><br \\/>You can\'t imitate, copy, duplicate, sell, exchange or adventure any of our segment, utilization of the offered on our things, or admittance to the administration without the express composed consent by us or item proprietor.<br \\/><br \\/>Our Members are liable for all substance posted on the discussion and demo and movement that happens under your record.<br \\/><br \\/>We hold the chance of hindering your participation account quickly if we will think about a particularly not allowed conduct.<br \\/><br \\/>If you make a record on our site, you are liable for keeping up the security of your record, and you are completely answerable for all exercises that happen under the record and some other activities taken regarding the record. You should quickly inform us, of any unapproved employments of your record or some other penetrates of security.<\\/p><\\/div><div class=\\\"mb-5\\\" style=\\\"margin-bottom:3rem;color:rgb(111,111,111);font-family:Nunito, sans-serif;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">Fiverr, Seoclerks Sellers Or Affiliates<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">We do NOT ensure full SEO campaign conveyance within 24 hours. We make no assurance for conveyance time by any means. We give our best assessment to orders during the putting in of requests, anyway, these are gauges. We won\'t be considered liable for loss of assets, negative surveys or you being prohibited for late conveyance. If you are selling on a site that requires time touchy outcomes, utilize Our SEO Services at your own risk.<\\/p><\\/div><div class=\\\"mb-5\\\" style=\\\"margin-bottom:3rem;color:rgb(111,111,111);font-family:Nunito, sans-serif;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">Payment\\/Refund Policy<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">No refund or cash back will be made. After a deposit has been finished, it is extremely unlikely to invert it. You should utilize your equilibrium on requests our administrations, Hosting, SEO campaign. You concur that once you complete a deposit, you won\'t document a debate or a chargeback against us in any way, shape, or form.<br \\/><br \\/>If you document a debate or chargeback against us after a deposit, we claim all authority to end every single future request, prohibit you from our site. False action, for example, utilizing unapproved or taken charge cards will prompt the end of your record. There are no special cases.<\\/p><\\/div><div class=\\\"mb-5\\\" style=\\\"margin-bottom:3rem;color:rgb(111,111,111);font-family:Nunito, sans-serif;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">Free Balance \\/ Coupon Policy<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">We offer numerous approaches to get FREE Balance, Coupons and Deposit offers yet we generally reserve the privilege to audit it and deduct it from your record offset with any explanation we may it is a sort of misuse. If we choose to deduct a few or all of free Balance from your record balance, and your record balance becomes negative, at that point the record will naturally be suspended. If your record is suspended because of a negative Balance you can request to make a custom payment to settle your equilibrium to actuate your record.<\\/p><\\/div>\"}', '2022-10-10 03:23:22', '2023-11-19 20:29:12'),
(69, 'policy_pages.element', '{\"title\":\"Cookie Policy\",\"details\":\"<div class=\\\"mb-5\\\" style=\\\"margin-bottom:3rem;color:rgb(111,111,111);font-family:Nunito, sans-serif;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">Terms & Conditions for Users<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">Before getting to this site, you are consenting to be limited by these site Terms and Conditions of Use, every single appropriate law, and guidelines, and concur that you are answerable for consistency with any material neighborhood laws. If you disagree with any of these terms, you are restricted from utilizing or getting to this site.<\\/p><\\/div><div class=\\\"mb-5\\\" style=\\\"margin-bottom:3rem;color:rgb(111,111,111);font-family:Nunito, sans-serif;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">Support<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">Whenever you have downloaded our item, you may get in touch with us for help through email and we will give a valiant effort to determine your issue. We will attempt to answer using the Email for more modest bug fixes, after which we will refresh the center bundle. Content help is offered to confirmed clients by Tickets as it were. Backing demands made by email and Livechat.<\\/p><p class=\\\"my-3 font-18 font-weight-bold\\\" style=\\\"margin-right:0px;margin-left:0px;font-weight:700;font-size:18px;\\\">On the off chance that your help requires extra adjustment of the System, at that point, you have two alternatives:<\\/p><ul class=\\\"font-18\\\" style=\\\"padding-left:15px;list-style-type:disc;font-size:18px;\\\"><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">Hang tight for additional update discharge.<\\/li><li style=\\\"margin-top:0px;margin-right:0px;margin-left:0px;\\\">Or on the other hand, enlist a specialist (We offer customization for extra charges).<\\/li><\\/ul><\\/div><div class=\\\"mb-5\\\" style=\\\"margin-bottom:3rem;color:rgb(111,111,111);font-family:Nunito, sans-serif;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">Ownership<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">You may not guarantee scholarly or selective possession of any of our items, altered or unmodified. All items are property, we created them. Our items are given \\\"with no guarantees\\\" without guarantee of any sort, either communicated or suggested. On no occasion will our juridical individual be subject to any harms including, however not restricted to, immediate, roundabout, extraordinary, accidental, or significant harms or different misfortunes emerging out of the utilization of or powerlessness to utilize our items.<\\/p><\\/div><div class=\\\"mb-5\\\" style=\\\"margin-bottom:3rem;color:rgb(111,111,111);font-family:Nunito, sans-serif;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">Warranty<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">We don\'t offer any guarantee or assurance of these Services in any way. When our Services have been modified we can\'t ensure they will work with all outsider plugins, modules, or internet browsers. Program similarity ought to be tried against the show formats on the demo worker. If you don\'t mind guarantee that the programs you use will work with the component, as we can not ensure that our systems will work with all program mixes.<\\/p><\\/div><div class=\\\"mb-5\\\" style=\\\"margin-bottom:3rem;color:rgb(111,111,111);font-family:Nunito, sans-serif;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">Unauthorized\\/Illegal Usage<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">You may not utilize our things for any illicit or unapproved reason or may you, in the utilization of the stage, disregard any laws in your locale (counting yet not restricted to copyright laws) just as the laws of your nation and International law. Specifically, it is disallowed to utilize the things on our foundation for pages that advance: brutality, illegal intimidation, hard sexual entertainment, bigotry, obscenity content or warez programming joins.<br \\/><br \\/>You can\'t imitate, copy, duplicate, sell, exchange or adventure any of our segment, utilization of the offered on our things, or admittance to the administration without the express composed consent by us or item proprietor.<br \\/><br \\/>Our Members are liable for all substance posted on the discussion and demo and movement that happens under your record.<br \\/><br \\/>We hold the chance of hindering your participation account quickly if we will think about a particularly not allowed conduct.<br \\/><br \\/>If you make a record on our site, you are liable for keeping up the security of your record, and you are completely answerable for all exercises that happen under the record and some other activities taken regarding the record. You should quickly inform us, of any unapproved employments of your record or some other penetrates of security.<\\/p><\\/div><div class=\\\"mb-5\\\" style=\\\"margin-bottom:3rem;color:rgb(111,111,111);font-family:Nunito, sans-serif;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">Fiverr, Seoclerks Sellers Or Affiliates<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">We do NOT ensure full SEO campaign conveyance within 24 hours. We make no assurance for conveyance time by any means. We give our best assessment to orders during the putting in of requests, anyway, these are gauges. We won\'t be considered liable for loss of assets, negative surveys or you being prohibited for late conveyance. If you are selling on a site that requires time touchy outcomes, utilize Our SEO Services at your own risk.<\\/p><\\/div><div class=\\\"mb-5\\\" style=\\\"margin-bottom:3rem;color:rgb(111,111,111);font-family:Nunito, sans-serif;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">Payment\\/Refund Policy<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">No refund or cash back will be made. After a deposit has been finished, it is extremely unlikely to invert it. You should utilize your equilibrium on requests our administrations, Hosting, SEO campaign. You concur that once you complete a deposit, you won\'t document a debate or a chargeback against us in any way, shape, or form.<br \\/><br \\/>If you document a debate or chargeback against us after a deposit, we claim all authority to end every single future request, prohibit you from our site. False action, for example, utilizing unapproved or taken charge cards will prompt the end of your record. There are no special cases.<\\/p><\\/div><div class=\\\"mb-5\\\" style=\\\"margin-bottom:3rem;color:rgb(111,111,111);font-family:Nunito, sans-serif;\\\"><h3 class=\\\"mb-3\\\" style=\\\"font-weight:600;line-height:1.3;font-size:24px;font-family:Exo, sans-serif;color:rgb(54,54,54);\\\">Free Balance \\/ Coupon Policy<\\/h3><p class=\\\"font-18\\\" style=\\\"margin-right:0px;margin-left:0px;font-size:18px;\\\">We offer numerous approaches to get FREE Balance, Coupons and Deposit offers yet we generally reserve the privilege to audit it and deduct it from your record offset with any explanation we may it is a sort of misuse. If we choose to deduct a few or all of free Balance from your record balance, and your record balance becomes negative, at that point the record will naturally be suspended. If your record is suspended because of a negative Balance you can request to make a custom payment to settle your equilibrium to actuate your record.<\\/p><\\/div>\"}', '2022-10-10 03:24:16', '2023-11-19 20:13:56'),
(70, 'kyc_instruction.content', '{\"verification_instruction\":\"KYC is a mandatory process for identifying and verifying the identity of the client when sending money using our remittance site. After providing all of the information requested by the administrator, one of our administrators will verify it and declare you as KYC verified.\",\"pending_instruction\":\"Please be patient. Your KYC data has been accepted, one of our administrators will verify the authenticity and declare you as KYC verified.\"}', '2022-10-23 03:06:52', '2022-10-23 03:06:52'),
(71, 'default_images.content', '{\"has_image\":\"1\",\"cover_photo\":\"6555b0ad2955d1700114605.jpg\",\"loading_image\":\"6555b0ad4430a1700114605.jpg\"}', '2022-11-24 03:40:27', '2023-11-15 19:33:25'),
(72, 'contact.content', '{\"form_title\":\"Get in touch\",\"sub_title\":\"Follow us on our social media channels. We will respond within 24 hours.\",\"mobile\":\"(727) 219 - 2805\",\"email\":\"support@greenstockpro.com\"}', '2023-07-19 01:08:26', '2023-11-21 19:29:57'),
(74, 'social_icon.element', '{\"name\":\"You Tube\",\"url\":\"https:\\/\\/www.youtube.com\\/\"}', '2023-11-21 19:43:45', '2023-11-21 19:43:45'),
(75, 'social_icon.element', '{\"name\":\"Pinterest\",\"url\":\"https:\\/\\/www.pinterest.com\\/\"}', '2023-11-21 19:44:33', '2023-11-21 19:46:02'),
(76, 'license.content', '{\"title\":\"License\",\"sub_title\":\"Follow us on our social media channels. We will respond within 24 hours.\",\"description\":\"<div><span style=\\\"color:rgb(33,37,41);\\\"><b><font size=\\\"5\\\">Description<\\/font><\\/b><\\/span><\\/div>Our platforms make it easy for users to discover and collaborate on images, video, music, research and educational texts. This page highlights some of the best known platforms for sharing CC content. Content on these platforms is searchable and shareable.\"}', '2023-11-21 21:17:24', '2023-11-21 21:31:06'),
(77, 'policy_pages.element', '{\"title\":\"License\",\"details\":\"<div><strong style=\\\"margin:0px;padding:0px;color:rgb(0,0,0);font-family:\'Open Sans\', Arial, sans-serif;font-size:14px;text-align:justify;\\\">Lorem Ipsum<\\/strong><span style=\\\"color:rgb(0,0,0);font-family:\'Open Sans\', Arial, sans-serif;font-size:14px;text-align:justify;\\\">\\u00a0is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<\\/span><font size=\\\"5\\\"><b><br \\/><\\/b><\\/font><\\/div><div><span style=\\\"color:rgb(0,0,0);font-family:\'Open Sans\', Arial, sans-serif;font-size:14px;text-align:justify;\\\"><br \\/><\\/span><\\/div><div><span style=\\\"color:rgb(0,0,0);font-family:\'Open Sans\', Arial, sans-serif;font-size:14px;text-align:justify;\\\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \\\"de Finibus Bonorum et Malorum\\\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \\\"Lorem ipsum dolor sit amet..\\\", comes from a line in section 1.10.32.<\\/span><\\/div><div><span style=\\\"color:rgb(0,0,0);font-family:\'Open Sans\', Arial, sans-serif;font-size:14px;text-align:justify;\\\"><br \\/><\\/span><\\/div><div><span style=\\\"color:rgb(0,0,0);font-family:\'Open Sans\', Arial, sans-serif;font-size:14px;text-align:justify;\\\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.<\\/span><span style=\\\"color:rgb(0,0,0);font-family:\'Open Sans\', Arial, sans-serif;font-size:14px;text-align:justify;\\\"><br \\/><\\/span><\\/div><div><span style=\\\"color:rgb(0,0,0);font-family:\'Open Sans\', Arial, sans-serif;font-size:14px;text-align:justify;\\\"><br \\/><\\/span><\\/div><div><h2 style=\\\"margin-bottom:10px;padding:0px;font-family:DauphinPlain;font-size:24px;line-height:24px;color:rgb(0,0,0);\\\">Why do we use it?<\\/h2><p style=\\\"margin-right:0px;margin-bottom:15px;margin-left:0px;padding:0px;text-align:justify;color:rgb(0,0,0);font-family:\'Open Sans\', Arial, sans-serif;font-size:14px;\\\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).<\\/p><\\/div><div><span style=\\\"color:rgb(0,0,0);font-family:\'Open Sans\', Arial, sans-serif;font-size:14px;text-align:justify;\\\"><br \\/><\\/span><\\/div><div><span style=\\\"color:rgb(0,0,0);font-family:\'Open Sans\', Arial, sans-serif;font-size:14px;text-align:justify;\\\"><br \\/><\\/span><\\/div><div><font size=\\\"5\\\"><b><br \\/><\\/b><\\/font><\\/div>\"}', '2023-11-21 23:30:10', '2023-11-21 23:32:09');

-- --------------------------------------------------------

--
-- Table structure for table `gateways`
--

CREATE TABLE `gateways` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `form_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `code` int(11) DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL,
  `alias` varchar(40) NOT NULL DEFAULT 'NULL',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=>enable, 2=>disable',
  `gateway_parameters` text DEFAULT NULL,
  `supported_currencies` text DEFAULT NULL,
  `crypto` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: fiat currency, 1: crypto currency',
  `extra` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gateways`
--

INSERT INTO `gateways` (`id`, `form_id`, `code`, `name`, `alias`, `status`, `gateway_parameters`, `supported_currencies`, `crypto`, `extra`, `description`, `created_at`, `updated_at`) VALUES
(1, 0, 101, 'Paypal', 'Paypal', 0, '{\"paypal_email\":{\"title\":\"PayPal Email\",\"global\":true,\"value\":\"--------------------\"}}', '{\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CZK\":\"CZK\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"HKD\":\"HKD\",\"HUF\":\"HUF\",\"INR\":\"INR\",\"ILS\":\"ILS\",\"JPY\":\"JPY\",\"MYR\":\"MYR\",\"MXN\":\"MXN\",\"TWD\":\"TWD\",\"NZD\":\"NZD\",\"NOK\":\"NOK\",\"PHP\":\"PHP\",\"PLN\":\"PLN\",\"GBP\":\"GBP\",\"RUB\":\"RUB\",\"SGD\":\"SGD\",\"SEK\":\"SEK\",\"CHF\":\"CHF\",\"THB\":\"THB\",\"USD\":\"$\"}', 0, NULL, NULL, '2019-09-14 13:14:22', '2023-07-26 19:24:37'),
(2, 0, 102, 'Perfect Money', 'PerfectMoney', 0, '{\"passphrase\":{\"title\":\"ALTERNATE PASSPHRASE\",\"global\":true,\"value\":\"--------------------\"},\"wallet_id\":{\"title\":\"PM Wallet\",\"global\":false,\"value\":\"\"}}', '{\"USD\":\"$\",\"EUR\":\"\\u20ac\"}', 0, NULL, NULL, '2019-09-14 13:14:22', '2023-07-26 19:24:51'),
(3, 0, 103, 'Stripe Hosted', 'Stripe', 0, '{\"secret_key\":{\"title\":\"Secret Key\",\"global\":true,\"value\":\"--------------------\"},\"publishable_key\":{\"title\":\"PUBLISHABLE KEY\",\"global\":true,\"value\":\"--------------------\"}}', '{\"USD\":\"USD\",\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"INR\":\"INR\",\"JPY\":\"JPY\",\"MXN\":\"MXN\",\"MYR\":\"MYR\",\"NOK\":\"NOK\",\"NZD\":\"NZD\",\"PLN\":\"PLN\",\"SEK\":\"SEK\",\"SGD\":\"SGD\"}', 0, NULL, NULL, '2019-09-14 13:14:22', '2023-07-26 19:25:00'),
(4, 0, 104, 'Skrill', 'Skrill', 0, '{\"pay_to_email\":{\"title\":\"Skrill Email\",\"global\":true,\"value\":\"--------------------\"},\"secret_key\":{\"title\":\"Secret Key\",\"global\":true,\"value\":\"--------------------\"}}', '{\"AED\":\"AED\",\"AUD\":\"AUD\",\"BGN\":\"BGN\",\"BHD\":\"BHD\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"CZK\":\"CZK\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"HRK\":\"HRK\",\"HUF\":\"HUF\",\"ILS\":\"ILS\",\"INR\":\"INR\",\"ISK\":\"ISK\",\"JOD\":\"JOD\",\"JPY\":\"JPY\",\"KRW\":\"KRW\",\"KWD\":\"KWD\",\"MAD\":\"MAD\",\"MYR\":\"MYR\",\"NOK\":\"NOK\",\"NZD\":\"NZD\",\"OMR\":\"OMR\",\"PLN\":\"PLN\",\"QAR\":\"QAR\",\"RON\":\"RON\",\"RSD\":\"RSD\",\"SAR\":\"SAR\",\"SEK\":\"SEK\",\"SGD\":\"SGD\",\"THB\":\"THB\",\"TND\":\"TND\",\"TRY\":\"TRY\",\"TWD\":\"TWD\",\"USD\":\"USD\",\"ZAR\":\"ZAR\",\"COP\":\"COP\"}', 0, NULL, NULL, '2019-09-14 13:14:22', '2023-07-26 19:24:57'),
(5, 0, 105, 'PayTM', 'Paytm', 0, '{\"MID\":{\"title\":\"Merchant ID\",\"global\":true,\"value\":\"--------------------\"},\"merchant_key\":{\"title\":\"Merchant Key\",\"global\":true,\"value\":\"--------------------\"},\"WEBSITE\":{\"title\":\"Paytm Website\",\"global\":true,\"value\":\"--------------------\"},\"INDUSTRY_TYPE_ID\":{\"title\":\"Industry Type\",\"global\":true,\"value\":\"--------------------\"},\"CHANNEL_ID\":{\"title\":\"CHANNEL ID\",\"global\":true,\"value\":\"--------------------\"},\"transaction_url\":{\"title\":\"Transaction URL\",\"global\":true,\"value\":\"--------------------\"},\"transaction_status_url\":{\"title\":\"Transaction STATUS URL\",\"global\":true,\"value\":\"--------------------\"}}', '{\"AUD\":\"AUD\",\"ARS\":\"ARS\",\"BDT\":\"BDT\",\"BRL\":\"BRL\",\"BGN\":\"BGN\",\"CAD\":\"CAD\",\"CLP\":\"CLP\",\"CNY\":\"CNY\",\"COP\":\"COP\",\"HRK\":\"HRK\",\"CZK\":\"CZK\",\"DKK\":\"DKK\",\"EGP\":\"EGP\",\"EUR\":\"EUR\",\"GEL\":\"GEL\",\"GHS\":\"GHS\",\"HKD\":\"HKD\",\"HUF\":\"HUF\",\"INR\":\"INR\",\"IDR\":\"IDR\",\"ILS\":\"ILS\",\"JPY\":\"JPY\",\"KES\":\"KES\",\"MYR\":\"MYR\",\"MXN\":\"MXN\",\"MAD\":\"MAD\",\"NPR\":\"NPR\",\"NZD\":\"NZD\",\"NGN\":\"NGN\",\"NOK\":\"NOK\",\"PKR\":\"PKR\",\"PEN\":\"PEN\",\"PHP\":\"PHP\",\"PLN\":\"PLN\",\"RON\":\"RON\",\"RUB\":\"RUB\",\"SGD\":\"SGD\",\"ZAR\":\"ZAR\",\"KRW\":\"KRW\",\"LKR\":\"LKR\",\"SEK\":\"SEK\",\"CHF\":\"CHF\",\"THB\":\"THB\",\"TRY\":\"TRY\",\"UGX\":\"UGX\",\"UAH\":\"UAH\",\"AED\":\"AED\",\"GBP\":\"GBP\",\"USD\":\"USD\",\"VND\":\"VND\",\"XOF\":\"XOF\"}', 0, NULL, NULL, '2019-09-14 13:14:22', '2023-07-26 19:24:48'),
(6, 0, 106, 'Payeer', 'Payeer', 0, '{\"merchant_id\":{\"title\":\"Merchant ID\",\"global\":true,\"value\":\"--------------------\"},\"secret_key\":{\"title\":\"Secret key\",\"global\":true,\"value\":\"--------------------\"}}', '{\"USD\":\"USD\",\"EUR\":\"EUR\",\"RUB\":\"RUB\"}', 0, '{\"status\":{\"title\": \"Status URL\",\"value\":\"ipn.Payeer\"}}', NULL, '2019-09-14 13:14:22', '2023-07-26 19:22:47'),
(7, 0, 107, 'PayStack', 'Paystack', 0, '{\"public_key\":{\"title\":\"Public key\",\"global\":true,\"value\":\"--------------------\"},\"secret_key\":{\"title\":\"Secret key\",\"global\":true,\"value\":\"--------------------\"}}', '{\"USD\":\"USD\",\"NGN\":\"NGN\"}', 0, '{\"callback\":{\"title\": \"Callback URL\",\"value\":\"ipn.Paystack\"},\"webhook\":{\"title\": \"Webhook URL\",\"value\":\"ipn.Paystack\"}}\r\n', NULL, '2019-09-14 13:14:22', '2023-07-26 19:24:45'),
(8, 0, 108, 'VoguePay', 'Voguepay', 0, '{\"merchant_id\":{\"title\":\"MERCHANT ID\",\"global\":true,\"value\":\"--------------------\"}}', '{\"USD\":\"USD\",\"GBP\":\"GBP\",\"EUR\":\"EUR\",\"GHS\":\"GHS\",\"NGN\":\"NGN\",\"ZAR\":\"ZAR\"}', 0, NULL, NULL, '2019-09-14 13:14:22', '2023-07-26 19:25:14'),
(9, 0, 109, 'Flutterwave', 'Flutterwave', 0, '{\"public_key\":{\"title\":\"Public Key\",\"global\":true,\"value\":\"--------------------\"},\"secret_key\":{\"title\":\"Secret Key\",\"global\":true,\"value\":\"--------------------\"},\"encryption_key\":{\"title\":\"Encryption Key\",\"global\":true,\"value\":\"--------------------\"}}', '{\"BIF\":\"BIF\",\"CAD\":\"CAD\",\"CDF\":\"CDF\",\"CVE\":\"CVE\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"GHS\":\"GHS\",\"GMD\":\"GMD\",\"GNF\":\"GNF\",\"KES\":\"KES\",\"LRD\":\"LRD\",\"MWK\":\"MWK\",\"MZN\":\"MZN\",\"NGN\":\"NGN\",\"RWF\":\"RWF\",\"SLL\":\"SLL\",\"STD\":\"STD\",\"TZS\":\"TZS\",\"UGX\":\"UGX\",\"USD\":\"USD\",\"XAF\":\"XAF\",\"XOF\":\"XOF\",\"ZMK\":\"ZMK\",\"ZMW\":\"ZMW\",\"ZWD\":\"ZWD\"}', 0, NULL, NULL, '2019-09-14 13:14:22', '2023-07-26 19:24:13'),
(10, 0, 110, 'RazorPay', 'Razorpay', 0, '{\"key_id\":{\"title\":\"Key Id\",\"global\":true,\"value\":\"--------------------\"},\"key_secret\":{\"title\":\"Key Secret \",\"global\":true,\"value\":\"--------------------\"}}', '{\"INR\":\"INR\"}', 0, NULL, NULL, '2019-09-14 13:14:22', '2023-07-26 19:24:54'),
(11, 0, 111, 'Stripe Storefront', 'StripeJs', 0, '{\"secret_key\":{\"title\":\"Secret Key\",\"global\":true,\"value\":\"--------------------\"},\"publishable_key\":{\"title\":\"PUBLISHABLE KEY\",\"global\":true,\"value\":\"--------------------\"}}', '{\"USD\":\"USD\",\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"INR\":\"INR\",\"JPY\":\"JPY\",\"MXN\":\"MXN\",\"MYR\":\"MYR\",\"NOK\":\"NOK\",\"NZD\":\"NZD\",\"PLN\":\"PLN\",\"SEK\":\"SEK\",\"SGD\":\"SGD\"}', 0, NULL, NULL, '2019-09-14 13:14:22', '2023-07-26 19:25:04'),
(12, 0, 112, 'Instamojo', 'Instamojo', 0, '{\"api_key\":{\"title\":\"API KEY\",\"global\":true,\"value\":\"--------------------\"},\"auth_token\":{\"title\":\"Auth Token\",\"global\":true,\"value\":\"--------------------\"},\"salt\":{\"title\":\"Salt\",\"global\":true,\"value\":\"--------------------\"}}', '{\"INR\":\"INR\"}', 0, NULL, NULL, '2019-09-14 13:14:22', '2023-07-26 19:24:16'),
(13, 0, 501, 'Blockchain', 'Blockchain', 0, '{\"api_key\":{\"title\":\"API Key\",\"global\":true,\"value\":\"--------------------\"},\"xpub_code\":{\"title\":\"XPUB CODE\",\"global\":true,\"value\":\"--------------------\"}}', '{\"BTC\":\"BTC\"}', 1, NULL, NULL, '2019-09-14 13:14:22', '2023-07-26 19:23:53'),
(15, 0, 503, 'CoinPayments', 'Coinpayments', 0, '{\"public_key\":{\"title\":\"Public Key\",\"global\":true,\"value\":\"--------------------\"},\"private_key\":{\"title\":\"Private Key\",\"global\":true,\"value\":\"--------------------\"},\"merchant_id\":{\"title\":\"Merchant ID\",\"global\":true,\"value\":\"--------------------\"}}', '{\"BTC\":\"Bitcoin\",\"BTC.LN\":\"Bitcoin (Lightning Network)\",\"LTC\":\"Litecoin\",\"CPS\":\"CPS Coin\",\"VLX\":\"Velas\",\"APL\":\"Apollo\",\"AYA\":\"Aryacoin\",\"BAD\":\"Badcoin\",\"BCD\":\"Bitcoin Diamond\",\"BCH\":\"Bitcoin Cash\",\"BCN\":\"Bytecoin\",\"BEAM\":\"BEAM\",\"BITB\":\"Bean Cash\",\"BLK\":\"BlackCoin\",\"BSV\":\"Bitcoin SV\",\"BTAD\":\"Bitcoin Adult\",\"BTG\":\"Bitcoin Gold\",\"BTT\":\"BitTorrent\",\"CLOAK\":\"CloakCoin\",\"CLUB\":\"ClubCoin\",\"CRW\":\"Crown\",\"CRYP\":\"CrypticCoin\",\"CRYT\":\"CryTrExCoin\",\"CURE\":\"CureCoin\",\"DASH\":\"DASH\",\"DCR\":\"Decred\",\"DEV\":\"DeviantCoin\",\"DGB\":\"DigiByte\",\"DOGE\":\"Dogecoin\",\"EBST\":\"eBoost\",\"EOS\":\"EOS\",\"ETC\":\"Ether Classic\",\"ETH\":\"Ethereum\",\"ETN\":\"Electroneum\",\"EUNO\":\"EUNO\",\"EXP\":\"EXP\",\"Expanse\":\"Expanse\",\"FLASH\":\"FLASH\",\"GAME\":\"GameCredits\",\"GLC\":\"Goldcoin\",\"GRS\":\"Groestlcoin\",\"KMD\":\"Komodo\",\"LOKI\":\"LOKI\",\"LSK\":\"LSK\",\"MAID\":\"MaidSafeCoin\",\"MUE\":\"MonetaryUnit\",\"NAV\":\"NAV Coin\",\"NEO\":\"NEO\",\"NMC\":\"Namecoin\",\"NVST\":\"NVO Token\",\"NXT\":\"NXT\",\"OMNI\":\"OMNI\",\"PINK\":\"PinkCoin\",\"PIVX\":\"PIVX\",\"POT\":\"PotCoin\",\"PPC\":\"Peercoin\",\"PROC\":\"ProCurrency\",\"PURA\":\"PURA\",\"QTUM\":\"QTUM\",\"RES\":\"Resistance\",\"RVN\":\"Ravencoin\",\"RVR\":\"RevolutionVR\",\"SBD\":\"Steem Dollars\",\"SMART\":\"SmartCash\",\"SOXAX\":\"SOXAX\",\"STEEM\":\"STEEM\",\"STRAT\":\"STRAT\",\"SYS\":\"Syscoin\",\"TPAY\":\"TokenPay\",\"TRIGGERS\":\"Triggers\",\"TRX\":\" TRON\",\"UBQ\":\"Ubiq\",\"UNIT\":\"UniversalCurrency\",\"USDT\":\"Tether USD (Omni Layer)\",\"USDT.BEP20\":\"Tether USD (BSC Chain)\",\"USDT.ERC20\":\"Tether USD (ERC20)\",\"USDT.TRC20\":\"Tether USD (Tron/TRC20)\",\"VTC\":\"Vertcoin\",\"WAVES\":\"Waves\",\"XCP\":\"Counterparty\",\"XEM\":\"NEM\",\"XMR\":\"Monero\",\"XSN\":\"Stakenet\",\"XSR\":\"SucreCoin\",\"XVG\":\"VERGE\",\"XZC\":\"ZCoin\",\"ZEC\":\"ZCash\",\"ZEN\":\"Horizen\"}', 1, NULL, NULL, '2019-09-14 13:14:22', '2023-07-26 19:24:05'),
(16, 0, 504, 'CoinPayments Fiat', 'CoinpaymentsFiat', 0, '{\"merchant_id\":{\"title\":\"Merchant ID\",\"global\":true,\"value\":\"--------------------\"}}', '{\"USD\":\"USD\",\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"CLP\":\"CLP\",\"CNY\":\"CNY\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"INR\":\"INR\",\"ISK\":\"ISK\",\"JPY\":\"JPY\",\"KRW\":\"KRW\",\"NZD\":\"NZD\",\"PLN\":\"PLN\",\"RUB\":\"RUB\",\"SEK\":\"SEK\",\"SGD\":\"SGD\",\"THB\":\"THB\",\"TWD\":\"TWD\"}', 0, NULL, NULL, '2019-09-14 13:14:22', '2023-07-26 19:24:09'),
(17, 0, 505, 'Coingate', 'Coingate', 0, '{\"api_key\":{\"title\":\"API Key\",\"global\":true,\"value\":\"--------------------\"}}', '{\"USD\":\"USD\",\"EUR\":\"EUR\"}', 0, NULL, NULL, '2019-09-14 13:14:22', '2023-07-26 19:24:03'),
(18, 0, 506, 'Coinbase Commerce', 'CoinbaseCommerce', 0, '{\"api_key\":{\"title\":\"API Key\",\"global\":true,\"value\":\"--------------------\"},\"secret\":{\"title\":\"Webhook Shared Secret\",\"global\":true,\"value\":\"--------------------\"}}', '{\"USD\":\"USD\",\"EUR\":\"EUR\",\"JPY\":\"JPY\",\"GBP\":\"GBP\",\"AUD\":\"AUD\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"CNY\":\"CNY\",\"SEK\":\"SEK\",\"NZD\":\"NZD\",\"MXN\":\"MXN\",\"SGD\":\"SGD\",\"HKD\":\"HKD\",\"NOK\":\"NOK\",\"KRW\":\"KRW\",\"TRY\":\"TRY\",\"RUB\":\"RUB\",\"INR\":\"INR\",\"BRL\":\"BRL\",\"ZAR\":\"ZAR\",\"AED\":\"AED\",\"AFN\":\"AFN\",\"ALL\":\"ALL\",\"AMD\":\"AMD\",\"ANG\":\"ANG\",\"AOA\":\"AOA\",\"ARS\":\"ARS\",\"AWG\":\"AWG\",\"AZN\":\"AZN\",\"BAM\":\"BAM\",\"BBD\":\"BBD\",\"BDT\":\"BDT\",\"BGN\":\"BGN\",\"BHD\":\"BHD\",\"BIF\":\"BIF\",\"BMD\":\"BMD\",\"BND\":\"BND\",\"BOB\":\"BOB\",\"BSD\":\"BSD\",\"BTN\":\"BTN\",\"BWP\":\"BWP\",\"BYN\":\"BYN\",\"BZD\":\"BZD\",\"CDF\":\"CDF\",\"CLF\":\"CLF\",\"CLP\":\"CLP\",\"COP\":\"COP\",\"CRC\":\"CRC\",\"CUC\":\"CUC\",\"CUP\":\"CUP\",\"CVE\":\"CVE\",\"CZK\":\"CZK\",\"DJF\":\"DJF\",\"DKK\":\"DKK\",\"DOP\":\"DOP\",\"DZD\":\"DZD\",\"EGP\":\"EGP\",\"ERN\":\"ERN\",\"ETB\":\"ETB\",\"FJD\":\"FJD\",\"FKP\":\"FKP\",\"GEL\":\"GEL\",\"GGP\":\"GGP\",\"GHS\":\"GHS\",\"GIP\":\"GIP\",\"GMD\":\"GMD\",\"GNF\":\"GNF\",\"GTQ\":\"GTQ\",\"GYD\":\"GYD\",\"HNL\":\"HNL\",\"HRK\":\"HRK\",\"HTG\":\"HTG\",\"HUF\":\"HUF\",\"IDR\":\"IDR\",\"ILS\":\"ILS\",\"IMP\":\"IMP\",\"IQD\":\"IQD\",\"IRR\":\"IRR\",\"ISK\":\"ISK\",\"JEP\":\"JEP\",\"JMD\":\"JMD\",\"JOD\":\"JOD\",\"KES\":\"KES\",\"KGS\":\"KGS\",\"KHR\":\"KHR\",\"KMF\":\"KMF\",\"KPW\":\"KPW\",\"KWD\":\"KWD\",\"KYD\":\"KYD\",\"KZT\":\"KZT\",\"LAK\":\"LAK\",\"LBP\":\"LBP\",\"LKR\":\"LKR\",\"LRD\":\"LRD\",\"LSL\":\"LSL\",\"LYD\":\"LYD\",\"MAD\":\"MAD\",\"MDL\":\"MDL\",\"MGA\":\"MGA\",\"MKD\":\"MKD\",\"MMK\":\"MMK\",\"MNT\":\"MNT\",\"MOP\":\"MOP\",\"MRO\":\"MRO\",\"MUR\":\"MUR\",\"MVR\":\"MVR\",\"MWK\":\"MWK\",\"MYR\":\"MYR\",\"MZN\":\"MZN\",\"NAD\":\"NAD\",\"NGN\":\"NGN\",\"NIO\":\"NIO\",\"NPR\":\"NPR\",\"OMR\":\"OMR\",\"PAB\":\"PAB\",\"PEN\":\"PEN\",\"PGK\":\"PGK\",\"PHP\":\"PHP\",\"PKR\":\"PKR\",\"PLN\":\"PLN\",\"PYG\":\"PYG\",\"QAR\":\"QAR\",\"RON\":\"RON\",\"RSD\":\"RSD\",\"RWF\":\"RWF\",\"SAR\":\"SAR\",\"SBD\":\"SBD\",\"SCR\":\"SCR\",\"SDG\":\"SDG\",\"SHP\":\"SHP\",\"SLL\":\"SLL\",\"SOS\":\"SOS\",\"SRD\":\"SRD\",\"SSP\":\"SSP\",\"STD\":\"STD\",\"SVC\":\"SVC\",\"SYP\":\"SYP\",\"SZL\":\"SZL\",\"THB\":\"THB\",\"TJS\":\"TJS\",\"TMT\":\"TMT\",\"TND\":\"TND\",\"TOP\":\"TOP\",\"TTD\":\"TTD\",\"TWD\":\"TWD\",\"TZS\":\"TZS\",\"UAH\":\"UAH\",\"UGX\":\"UGX\",\"UYU\":\"UYU\",\"UZS\":\"UZS\",\"VEF\":\"VEF\",\"VND\":\"VND\",\"VUV\":\"VUV\",\"WST\":\"WST\",\"XAF\":\"XAF\",\"XAG\":\"XAG\",\"XAU\":\"XAU\",\"XCD\":\"XCD\",\"XDR\":\"XDR\",\"XOF\":\"XOF\",\"XPD\":\"XPD\",\"XPF\":\"XPF\",\"XPT\":\"XPT\",\"YER\":\"YER\",\"ZMW\":\"ZMW\",\"ZWL\":\"ZWL\"}\r\n\r\n', 0, '{\"endpoint\":{\"title\": \"Webhook Endpoint\",\"value\":\"ipn.CoinbaseCommerce\"}}', NULL, '2019-09-14 13:14:22', '2023-07-26 19:24:01'),
(24, 0, 113, 'Paypal Express', 'PaypalSdk', 0, '{\"clientId\":{\"title\":\"Paypal Client ID\",\"global\":true,\"value\":\"--------------------\"},\"clientSecret\":{\"title\":\"Client Secret\",\"global\":true,\"value\":\"--------------------\"}}', '{\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CZK\":\"CZK\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"HKD\":\"HKD\",\"HUF\":\"HUF\",\"INR\":\"INR\",\"ILS\":\"ILS\",\"JPY\":\"JPY\",\"MYR\":\"MYR\",\"MXN\":\"MXN\",\"TWD\":\"TWD\",\"NZD\":\"NZD\",\"NOK\":\"NOK\",\"PHP\":\"PHP\",\"PLN\":\"PLN\",\"GBP\":\"GBP\",\"RUB\":\"RUB\",\"SGD\":\"SGD\",\"SEK\":\"SEK\",\"CHF\":\"CHF\",\"THB\":\"THB\",\"USD\":\"$\"}', 0, NULL, NULL, '2019-09-14 13:14:22', '2023-07-26 19:24:41'),
(25, 0, 114, 'Stripe Checkout', 'StripeV3', 0, '{\"secret_key\":{\"title\":\"Secret Key\",\"global\":true,\"value\":\"--------------------\"},\"publishable_key\":{\"title\":\"PUBLISHABLE KEY\",\"global\":true,\"value\":\"--------------------\"},\"end_point\":{\"title\":\"End Point Secret\",\"global\":true,\"value\":\"--------------------\"}}', '{\"USD\":\"USD\",\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"INR\":\"INR\",\"JPY\":\"JPY\",\"MXN\":\"MXN\",\"MYR\":\"MYR\",\"NOK\":\"NOK\",\"NZD\":\"NZD\",\"PLN\":\"PLN\",\"SEK\":\"SEK\",\"SGD\":\"SGD\"}', 0, '{\"webhook\":{\"title\": \"Webhook Endpoint\",\"value\":\"ipn.StripeV3\"}}', NULL, '2019-09-14 13:14:22', '2023-07-26 19:25:07'),
(27, 0, 115, 'Mollie', 'Mollie', 0, '{\"mollie_email\":{\"title\":\"Mollie Email \",\"global\":true,\"value\":\"--------------------\"},\"api_key\":{\"title\":\"API KEY\",\"global\":true,\"value\":\"--------------------\"}}', '{\"AED\":\"AED\",\"AUD\":\"AUD\",\"BGN\":\"BGN\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"CZK\":\"CZK\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"HRK\":\"HRK\",\"HUF\":\"HUF\",\"ILS\":\"ILS\",\"ISK\":\"ISK\",\"JPY\":\"JPY\",\"MXN\":\"MXN\",\"MYR\":\"MYR\",\"NOK\":\"NOK\",\"NZD\":\"NZD\",\"PHP\":\"PHP\",\"PLN\":\"PLN\",\"RON\":\"RON\",\"RUB\":\"RUB\",\"SEK\":\"SEK\",\"SGD\":\"SGD\",\"THB\":\"THB\",\"TWD\":\"TWD\",\"USD\":\"USD\",\"ZAR\":\"ZAR\"}', 0, NULL, NULL, '2019-09-14 13:14:22', '2023-07-26 19:24:21'),
(30, 0, 116, 'Cashmaal', 'Cashmaal', 0, '{\"web_id\":{\"title\":\"Web Id\",\"global\":true,\"value\":\"--------------------\"},\"ipn_key\":{\"title\":\"IPN Key\",\"global\":true,\"value\":\"--------------------\"}}', '{\"PKR\":\"PKR\",\"USD\":\"USD\"}', 0, '{\"webhook\":{\"title\": \"IPN URL\",\"value\":\"ipn.Cashmaal\"}}', NULL, NULL, '2023-07-26 19:23:55'),
(36, 0, 117, 'Mercado Pago', 'MercadoPago', 0, '{\"access_token\":{\"title\":\"Access Token\",\"global\":true,\"value\":\"--------------------\"}}', '{\"USD\":\"USD\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"NOK\":\"NOK\",\"PLN\":\"PLN\",\"SEK\":\"SEK\",\"AUD\":\"AUD\",\"NZD\":\"NZD\"}', 0, NULL, NULL, NULL, '2023-07-26 19:24:18'),
(44, 0, 118, 'Authorize.net', 'Authorize', 0, '{\"login_id\":{\"title\":\"Login ID\",\"global\":true,\"value\":\"--------------------\"},\"transaction_key\":{\"title\":\"Transaction Key\",\"global\":true,\"value\":\"--------------------\"}}', '{\"USD\":\"USD\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"NOK\":\"NOK\",\"PLN\":\"PLN\",\"SEK\":\"SEK\",\"AUD\":\"AUD\",\"NZD\":\"NZD\"}', 0, NULL, NULL, NULL, '2023-07-26 19:23:48'),
(46, 0, 119, 'NMI', 'NMI', 0, '{\"api_key\":{\"title\":\"API Key\",\"global\":true,\"value\":\"--------------------\"}}', '{\"AED\":\"AED\",\"ARS\":\"ARS\",\"AUD\":\"AUD\",\"BOB\":\"BOB\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"CLP\":\"CLP\",\"CNY\":\"CNY\",\"COP\":\"COP\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"IDR\":\"IDR\",\"ILS\":\"ILS\",\"INR\":\"INR\",\"JPY\":\"JPY\",\"KRW\":\"KRW\",\"MXN\":\"MXN\",\"MYR\":\"MYR\",\"NOK\":\"NOK\",\"NZD\":\"NZD\",\"PEN\":\"PEN\",\"PHP\":\"PHP\",\"PLN\":\"PLN\",\"PYG\":\"PYG\",\"RUB\":\"RUB\",\"SEC\":\"SEC\",\"SGD\":\"SGD\",\"THB\":\"THB\",\"TRY\":\"TRY\",\"TWD\":\"TWD\",\"USD\":\"USD\",\"ZAR\":\"ZAR\"}', 0, NULL, NULL, NULL, '2023-07-26 19:24:25'),
(53, 0, 120, 'BTCPay', 'BTCPay', 0, '{\"store_id\":{\"title\":\"Store Id\",\"global\":true,\"value\":\"-------\"},\"api_key\":{\"title\":\"Api Key\",\"global\":true,\"value\":\"------\"},\"server_name\":{\"title\":\"Server Name\",\"global\":true,\"value\":\"--------------------\"},\"secret_code\":{\"title\":\"Secret Code\",\"global\":true,\"value\":\"----------\"}}', '{\"BTC\":\"Bitcoin\",\"LTC\":\"Litecoin\"}', 1, '{\"webhook\":{\"title\": \"IPN URL\",\"value\":\"ipn.BTCPay\"}}', NULL, NULL, '2023-07-26 19:23:51'),
(54, 0, 122, 'Now payments hosted', 'NowPaymentsHosted', 0, '{\"api_key\":{\"title\":\"API Key\",\"global\":true,\"value\":\"--------------------\"},\"secret_key\":{\"title\":\"Secret Key\",\"global\":true,\"value\":\"--------------------\"}}', '{\"BTG\":\"BTG\",\"ETH\":\"ETH\",\"XMR\":\"XMR\",\"ZEC\":\"ZEC\",\"XVG\":\"XVG\",\"ADA\":\"ADA\",\"LTC\":\"LTC\",\"BCH\":\"BCH\",\"QTUM\":\"QTUM\",\"DASH\":\"DASH\",\"XLM\":\"XLM\",\"XRP\":\"XRP\",\"XEM\":\"XEM\",\"DGB\":\"DGB\",\"LSK\":\"LSK\",\"DOGE\":\"DOGE\",\"TRX\":\"TRX\",\"KMD\":\"KMD\",\"REP\":\"REP\",\"BAT\":\"BAT\",\"ARK\":\"ARK\",\"WAVES\":\"WAVES\",\"BNB\":\"BNB\",\"XZC\":\"XZC\",\"NANO\":\"NANO\",\"TUSD\":\"TUSD\",\"VET\":\"VET\",\"ZEN\":\"ZEN\",\"GRS\":\"GRS\",\"FUN\":\"FUN\",\"NEO\":\"NEO\",\"GAS\":\"GAS\",\"PAX\":\"PAX\",\"USDC\":\"USDC\",\"ONT\":\"ONT\",\"XTZ\":\"XTZ\",\"LINK\":\"LINK\",\"RVN\":\"RVN\",\"BNBMAINNET\":\"BNBMAINNET\",\"ZIL\":\"ZIL\",\"BCD\":\"BCD\",\"USDT\":\"USDT\",\"USDTERC20\":\"USDTERC20\",\"CRO\":\"CRO\",\"DAI\":\"DAI\",\"HT\":\"HT\",\"WABI\":\"WABI\",\"BUSD\":\"BUSD\",\"ALGO\":\"ALGO\",\"USDTTRC20\":\"USDTTRC20\",\"GT\":\"GT\",\"STPT\":\"STPT\",\"AVA\":\"AVA\",\"SXP\":\"SXP\",\"UNI\":\"UNI\",\"OKB\":\"OKB\",\"BTC\":\"BTC\"}', 1, '', NULL, NULL, '2023-07-26 19:24:33'),
(55, 0, 509, 'Now payments checkout', 'NowPaymentsCheckout', 0, '{\"api_key\":{\"title\":\"API Key\",\"global\":true,\"value\":\"--------------------\"},\"secret_key\":{\"title\":\"Secret Key\",\"global\":true,\"value\":\"--------------------\"}}', '{\"BTG\":\"BTG\",\"ETH\":\"ETH\",\"XMR\":\"XMR\",\"ZEC\":\"ZEC\",\"XVG\":\"XVG\",\"ADA\":\"ADA\",\"LTC\":\"LTC\",\"BCH\":\"BCH\",\"QTUM\":\"QTUM\",\"DASH\":\"DASH\",\"XLM\":\"XLM\",\"XRP\":\"XRP\",\"XEM\":\"XEM\",\"DGB\":\"DGB\",\"LSK\":\"LSK\",\"DOGE\":\"DOGE\",\"TRX\":\"TRX\",\"KMD\":\"KMD\",\"REP\":\"REP\",\"BAT\":\"BAT\",\"ARK\":\"ARK\",\"WAVES\":\"WAVES\",\"BNB\":\"BNB\",\"XZC\":\"XZC\",\"NANO\":\"NANO\",\"TUSD\":\"TUSD\",\"VET\":\"VET\",\"ZEN\":\"ZEN\",\"GRS\":\"GRS\",\"FUN\":\"FUN\",\"NEO\":\"NEO\",\"GAS\":\"GAS\",\"PAX\":\"PAX\",\"USDC\":\"USDC\",\"ONT\":\"ONT\",\"XTZ\":\"XTZ\",\"LINK\":\"LINK\",\"RVN\":\"RVN\",\"BNBMAINNET\":\"BNBMAINNET\",\"ZIL\":\"ZIL\",\"BCD\":\"BCD\",\"USDT\":\"USDT\",\"USDTERC20\":\"USDTERC20\",\"CRO\":\"CRO\",\"DAI\":\"DAI\",\"HT\":\"HT\",\"WABI\":\"WABI\",\"BUSD\":\"BUSD\",\"ALGO\":\"ALGO\",\"USDTTRC20\":\"USDTTRC20\",\"GT\":\"GT\",\"STPT\":\"STPT\",\"AVA\":\"AVA\",\"SXP\":\"SXP\",\"UNI\":\"UNI\",\"OKB\":\"OKB\",\"BTC\":\"BTC\"}', 1, '', NULL, NULL, '2023-07-26 19:24:29'),
(56, 0, 121, '2Checkout', 'TwoCheckout', 0, '{\"merchant_code\":{\"title\":\"Merchant Code\",\"global\":true,\"value\":\"--------------------\"},\"secret_key\":{\"title\":\"Secret Key\",\"global\":true,\"value\":\"--------------------\"}}', '{\"AFN\": \"AFN\",\"ALL\": \"ALL\",\"DZD\": \"DZD\",\"ARS\": \"ARS\",\"AUD\": \"AUD\",\"AZN\": \"AZN\",\"BSD\": \"BSD\",\"BDT\": \"BDT\",\"BBD\": \"BBD\",\"BZD\": \"BZD\",\"BMD\": \"BMD\",\"BOB\": \"BOB\",\"BWP\": \"BWP\",\"BRL\": \"BRL\",\"GBP\": \"GBP\",\"BND\": \"BND\",\"BGN\": \"BGN\",\"CAD\": \"CAD\",\"CLP\": \"CLP\",\"CNY\": \"CNY\",\"COP\": \"COP\",\"CRC\": \"CRC\",\"HRK\": \"HRK\",\"CZK\": \"CZK\",\"DKK\": \"DKK\",\"DOP\": \"DOP\",\"XCD\": \"XCD\",\"EGP\": \"EGP\",\"EUR\": \"EUR\",\"FJD\": \"FJD\",\"GTQ\": \"GTQ\",\"HKD\": \"HKD\",\"HNL\": \"HNL\",\"HUF\": \"HUF\",\"INR\": \"INR\",\"IDR\": \"IDR\",\"ILS\": \"ILS\",\"JMD\": \"JMD\",\"JPY\": \"JPY\",\"KZT\": \"KZT\",\"KES\": \"KES\",\"LAK\": \"LAK\",\"MMK\": \"MMK\",\"LBP\": \"LBP\",\"LRD\": \"LRD\",\"MOP\": \"MOP\",\"MYR\": \"MYR\",\"MVR\": \"MVR\",\"MRO\": \"MRO\",\"MUR\": \"MUR\",\"MXN\": \"MXN\",\"MAD\": \"MAD\",\"NPR\": \"NPR\",\"TWD\": \"TWD\",\"NZD\": \"NZD\",\"NIO\": \"NIO\",\"NOK\": \"NOK\",\"PKR\": \"PKR\",\"PGK\": \"PGK\",\"PEN\": \"PEN\",\"PHP\": \"PHP\",\"PLN\": \"PLN\",\"QAR\": \"QAR\",\"RON\": \"RON\",\"RUB\": \"RUB\",\"WST\": \"WST\",\"SAR\": \"SAR\",\"SCR\": \"SCR\",\"SGD\": \"SGD\",\"SBD\": \"SBD\",\"ZAR\": \"ZAR\",\"KRW\": \"KRW\",\"LKR\": \"LKR\",\"SEK\": \"SEK\",\"CHF\": \"CHF\",\"SYP\": \"SYP\",\"THB\": \"THB\",\"TOP\": \"TOP\",\"TTD\": \"TTD\",\"TRY\": \"TRY\",\"UAH\": \"UAH\",\"AED\": \"AED\",\"USD\": \"USD\",\"VUV\": \"VUV\",\"VND\": \"VND\",\"XOF\": \"XOF\",\"YER\": \"YER\"}', 1, '{\"approved_url\":{\"title\": \"Approved URL\",\"value\":\"ipn.TwoCheckout\"}}', NULL, NULL, '2023-07-26 19:25:11'),
(57, 0, 124, 'Checkout', 'Checkout', 0, '{\"secret_key\":{\"title\":\"Secret Key\",\"global\":true,\"value\":\"--------------------\"},\"public_key\":{\"title\":\"PUBLIC KEY\",\"global\":true,\"value\":\"--------------------\"},\"processing_channel_id\":{\"title\":\"PROCESSING CHANNEL\",\"global\":true,\"value\":\"--------------------\"}}', '{\"USD\":\"USD\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"AUD\":\"AUD\",\"CAN\":\"CAN\",\"CHF\":\"CHF\",\"SGD\":\"SGD\",\"JPY\":\"JPY\",\"NZD\":\"NZD\"}', 0, NULL, NULL, NULL, '2023-07-26 19:23:57');

-- --------------------------------------------------------

--
-- Table structure for table `gateway_currencies`
--

CREATE TABLE `gateway_currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `currency` varchar(40) DEFAULT NULL,
  `symbol` varchar(40) DEFAULT NULL,
  `method_code` int(11) DEFAULT NULL,
  `gateway_alias` varchar(40) DEFAULT NULL,
  `min_amount` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `max_amount` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `percent_charge` decimal(5,2) NOT NULL DEFAULT 0.00,
  `fixed_charge` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `rate` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `image` varchar(255) DEFAULT NULL,
  `gateway_parameter` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_name` varchar(40) DEFAULT NULL,
  `cur_text` varchar(40) DEFAULT NULL COMMENT 'currency text',
  `cur_sym` varchar(40) DEFAULT NULL COMMENT 'currency symbol',
  `email_from` varchar(40) DEFAULT NULL,
  `email_template` text DEFAULT NULL,
  `sms_body` varchar(255) DEFAULT NULL,
  `sms_from` varchar(255) DEFAULT NULL,
  `base_color` varchar(40) DEFAULT NULL,
  `mail_config` text DEFAULT NULL COMMENT 'email configuration',
  `sms_config` text DEFAULT NULL,
  `global_shortcodes` text DEFAULT NULL,
  `socialite_credentials` text DEFAULT NULL,
  `kv` tinyint(1) NOT NULL DEFAULT 0,
  `ev` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'email verification, 0 - dont check, 1 - check',
  `en` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'email notification, 0 - dont send, 1 - send',
  `sv` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'mobile verication, 0 - dont check, 1 - check',
  `sn` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'sms notification, 0 - dont send, 1 - send',
  `multi_language` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `force_ssl` tinyint(1) NOT NULL DEFAULT 0,
  `maintenance_mode` tinyint(1) NOT NULL DEFAULT 0,
  `secure_password` tinyint(1) NOT NULL DEFAULT 0,
  `agree` tinyint(1) NOT NULL DEFAULT 0,
  `registration` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: Off	, 1: On',
  `active_template` varchar(40) DEFAULT NULL,
  `system_info` text DEFAULT NULL,
  `system_customized` tinyint(1) NOT NULL DEFAULT 0,
  `referral_system` tinyint(1) NOT NULL DEFAULT 0,
  `referral_commission` float NOT NULL DEFAULT 0,
  `instruction` text DEFAULT NULL,
  `ins_file` varchar(255) DEFAULT NULL,
  `per_download` decimal(18,8) NOT NULL DEFAULT 0.00000000,
  `auto_approval` tinyint(1) NOT NULL DEFAULT 1,
  `upload_limit` int(11) NOT NULL DEFAULT 0 COMMENT 'per day upload limit',
  `ftp` text DEFAULT NULL,
  `image_maximum_price` decimal(28,8) DEFAULT 0.00000000,
  `is_invoice_active` tinyint(1) NOT NULL DEFAULT 1,
  `wasabi` text DEFAULT NULL,
  `digital_ocean` text DEFAULT NULL,
  `vultr` text DEFAULT NULL,
  `storage_type` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1 = local storage;\r\n2 = ftp;\r\n3 = Wasabi;\r\n4 = Digital Ocean;',
  `watermark` tinyint(1) NOT NULL DEFAULT 0,
  `ads_script` text DEFAULT NULL,
  `ads_module` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `contact_system` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '1: Enable, 0:Disable',
  `donation_module` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '1: Enable, 0:Disable',
  `donation_setting` text DEFAULT NULL,
  `homepage_promo_1` varchar(255) DEFAULT NULL,
  `homepage_promo_2` varchar(255) DEFAULT NULL,
  `hero_banner_1` text DEFAULT NULL,
  `hero_banner_2` text DEFAULT NULL,
  `photos_setting` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `site_name`, `cur_text`, `cur_sym`, `email_from`, `email_template`, `sms_body`, `sms_from`, `base_color`, `mail_config`, `sms_config`, `global_shortcodes`, `socialite_credentials`, `kv`, `ev`, `en`, `sv`, `sn`, `multi_language`, `force_ssl`, `maintenance_mode`, `secure_password`, `agree`, `registration`, `active_template`, `system_info`, `system_customized`, `referral_system`, `referral_commission`, `instruction`, `ins_file`, `per_download`, `auto_approval`, `upload_limit`, `ftp`, `image_maximum_price`, `is_invoice_active`, `wasabi`, `digital_ocean`, `vultr`, `storage_type`, `watermark`, `ads_script`, `ads_module`, `contact_system`, `donation_module`, `donation_setting`, `homepage_promo_1`, `homepage_promo_2`, `hero_banner_1`, `hero_banner_2`, `photos_setting`, `created_at`, `updated_at`) VALUES
(1, 'GreenStock', 'USD', '$', 'info@greenstock.com', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"><meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"><meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"><title></title><style type=\"text/css\"> .ReadMsgBody{width: 100%; background-color: #ffffff;}.ExternalClass{width: 100%; background-color: #ffffff;}.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div{line-height: 100%;}html{width: 100%;}body{-webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0;}table{border-spacing: 0; table-layout: fixed; margin: 0 auto; border-collapse: collapse;}table table table{table-layout: auto;}.yshortcuts a{border-bottom: none !important;}img:hover{opacity: 0.9 !important;}a{color: #0087ff; text-decoration: none;}.textbutton a{font-family: \'open sans\', arial, sans-serif !important;}.btn-link a{color: #FFFFFF !important;}@media only screen and (max-width: 480px){body{width: auto !important;}*[class=\"table-inner\"]{width: 90% !important; text-align: center !important;}*[class=\"table-full\"]{width: 100% !important; text-align: center !important;}/* image */ img[class=\"img1\"]{width: 100% !important; height: auto !important;}}</style><table bgcolor=\"#414a51\" width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"50\"></td></tr><tr> <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td align=\"center\" width=\"600\"> <table class=\"table-inner\" width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td bgcolor=\"#0087ff\" style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" align=\"center\"> <table width=\"90%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"20\"></td></tr><tr> <td align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\">This is a System Generated Email</td></tr><tr> <td height=\"20\"></td></tr></tbody> </table> </td></tr></tbody> </table> <table class=\"table-inner\" width=\"95%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td bgcolor=\"#FFFFFF\" align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td height=\"35\"></td></tr><tr> <td align=\"center\" style=\"vertical-align:top;font-size:0;\">G</td></tr><tr> <td height=\"40\"><img src=\"https://i.imgur.com/2OiEetW.png\" width=\"143\"></td></tr><tr> <td align=\"center\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\">Hello{{fullname}}({{username}})</td></tr><tr> <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table width=\"40\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"20\" style=\" border-bottom:3px solid #0087ff;\"></td></tr></tbody> </table> </td></tr><tr> <td height=\"20\"></td></tr><tr> <td align=\"left\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\">{{message}}</td></tr><tr> <td height=\"40\"></td></tr></tbody> </table> </td></tr><tr> <td height=\"45\" align=\"center\" bgcolor=\"#f4f4f4\" style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\"> <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td height=\"10\"></td></tr><tr> <td class=\"preference-link\" align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\"> © 2021 <a href=\"#\">{{site_name}}</a>&nbsp;. All Rights Reserved. </td></tr><tr> <td height=\"10\"></td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr><tr> <td height=\"60\"></td></tr></tbody></table>', 'hi {{fullname}} ({{username}}), {{message}}', 'GreenStockAdmin', '63a544', '{\"name\":\"php\"}', '{\"name\":\"clickatell\",\"clickatell\":{\"api_key\":\"----------------\"},\"infobip\":{\"username\":\"--------------\",\"password\":\"-----------------\"},\"message_bird\":{\"api_key\":\"-------------------\"},\"nexmo\":{\"api_key\":\"----------------------\",\"api_secret\":\"----------------------\"},\"sms_broadcast\":{\"username\":\"----------------------\",\"password\":\"-----------------------------\"},\"twilio\":{\"account_sid\":\"-----------------------\",\"auth_token\":\"---------------------------\",\"from\":\"----------------------\"},\"text_magic\":{\"username\":\"-----------------------\",\"apiv2_key\":\"-------------------------------\"},\"custom\":{\"method\":\"get\",\"url\":\"https:\\/\\/hostname\\/demo-api-v1\",\"headers\":{\"name\":[\"api_key\"],\"value\":[\"test_api 555\"]},\"body\":{\"name\":[\"from_number\"],\"value\":[\"5657545757\"]}}}', '{\n    \"site_name\":\"Name of your site\",\n    \"site_currency\":\"Currency of your site\",\n    \"currency_symbol\":\"Symbol of currency\"\n}', '{\"google\":{\"client_id\":\"--------------------\",\"client_secret\":\"--------------------\",\"status\":1},\"facebook\":{\"client_id\":\"--------------------\",\"client_secret\":\"--------------------\",\"status\":1},\"linkedin\":{\"client_id\":\"--------------------\",\"client_secret\":\"--------------------\",\"status\":1}}', 0, 1, 1, 0, 0, 0, 0, 0, 0, 1, 1, 'basic', '[]', 0, 0, 1.55, '{\"heading\":\"Please read carefully before upload\",\"instruction\":\"For uploading please select or drop your original image into the drop zone. And also you have to wrap your picture with your PSD, Ai, XD etc, (if any) including this file below as a zip file. Then in the zip file section upload it. Otherwise, your image won\'t be approved\"}', 'license.txt', '30.00000000', 0, 20, NULL, '10.00000000', 1, '{\"driver\":\"s3\",\"key\":\"FJL9S664ES5E1YGCJ116\",\"secret\":\"AszSlYpAB5GQyTwPdCo2UeedAs4vEX7mApBGaAdu\",\"region\":\"us-east-1\",\"bucket\":\"greenstock-image\",\"endpoint\":\"https:\\/\\/s3.wasabisys.com\"}', '{\"driver\":\"--------------------\",\"key\":\"--------------------\",\"secret\":\"--------------------\",\"region\":\"--------------------\",\"bucket\":\"--------------------\",\"endpoint\":\"--------------------\"}', '{\"driver\":\"--------------------\",\"key\":\"--------------------\",\"secret\":\"--------------------\",\"bucket\":\"--------------------\",\"endpoint\":\"--------------------\"}', 3, 1, NULL, 1, 1, 1, '{\"item\":\"Coffee\",\"subtitle\":\"Support me on Buy Me a Coffee.\",\"icon\":\"<i class=\\\"las la-coffee\\\"><\\/i>\",\"amount\":\"50\"}', '{\"image\":\"20231114_2131941530_.png\",\"url\":\"https:\\/\\/www.youtube.com\\/\"}', '{\"image\":\"20231114_2131941530_.png\",\"url\":\"https:\\/\\/www.youtube.com\\/\"}', '{\"image\":\"20231116_1920705393_.jpg\",\"heading\":\"Find the best design resources for your project\",\"sub_heading\":\"Find Royalty-free photos and videos for your projects and social media content\",\"button_text\":\"Browser Stocks\",\"button_url\":\"http:\\/\\/localhost\\/image_stock\\/photos\"}', '{\"image\":\"20231114_1130948114_.jpg\",\"heading\":\"Browse our design resources we have for you\",\"sub_heading\":\"You can employ textured backgrounds and images to give users the impression that they are completely immersed in your designs.\",\"button_text\":\"Browse Stocks\",\"button_url\":\"http:\\/\\/localhost\\/image_stock\\/photos\"}', '{\"image\":\"20231116_1080749424_.jpg\",\"heading\":\"Photos\",\"sub_heading\":\"Good photos are vitalto express your message accurately.GreenStock provides the right stock photos for your projects , and social media posts and more.\"}', NULL, '2023-11-22 23:42:54');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `category_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `image_name` varchar(40) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `track_id` varchar(255) DEFAULT NULL,
  `title` varchar(40) DEFAULT NULL,
  `upload_date` date DEFAULT NULL,
  `image_width` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `image_height` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `extensions` varchar(255) DEFAULT '[]',
  `description` text DEFAULT NULL,
  `tags` text DEFAULT NULL,
  `colors` varchar(255) DEFAULT NULL,
  `total_like` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `attribution` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `total_view` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'pending => 0 , approved => 1, rejected => 3\r\n',
  `reason` text DEFAULT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `reviewer_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `user_id`, `category_id`, `image_name`, `thumb`, `track_id`, `title`, `upload_date`, `image_width`, `image_height`, `extensions`, `description`, `tags`, `colors`, `total_like`, `is_featured`, `attribution`, `total_view`, `status`, `reason`, `admin_id`, `reviewer_id`, `created_at`, `updated_at`) VALUES
(10, 1, 2, '2023/11/21/655c6fc6beb6c1700556742.jpg', '2023/11/21/thumb_655c6fc6beb6c1700556742.jpg', 'FQUSKSH5XZYG', 'Mahindra Thar', '2023-11-21', 600, 400, '[\"jpg\",\"jpeg\"]', 'DescriptionDescriptionDescriptionDescription', '[\"New\",\"Test\",\"Car\"]', '[\"0665f8\"]', 0, 0, 0, 7, 1, NULL, 1, 0, '2023-11-20 22:22:38', '2023-11-22 23:52:36');

-- --------------------------------------------------------

--
-- Table structure for table `image_files`
--

CREATE TABLE `image_files` (
  `id` bigint(20) NOT NULL,
  `track_id` varchar(255) DEFAULT NULL,
  `image_id` int(11) NOT NULL DEFAULT 0,
  `file` varchar(255) DEFAULT NULL,
  `resolution` varchar(255) DEFAULT NULL,
  `is_free` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=free, 0=premium',
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `total_downloads` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `price` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `image_files`
--

INSERT INTO `image_files` (`id`, `track_id`, `image_id`, `file`, `resolution`, `is_free`, `status`, `total_downloads`, `price`, `created_at`, `updated_at`) VALUES
(10, 'UVZ1C1JSSHK5', 10, '2023/11/21/655c6fd5e101f1700556757.zip', '6000*4000', 0, 1, 0, '10.00000000', '2023-11-20 22:22:38', '2023-11-20 22:24:01');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `code` varchar(40) DEFAULT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: not default language, 1: default language',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `code`, `is_default`, `created_at`, `updated_at`) VALUES
(1, 'English', 'en', 1, '2020-07-06 03:47:55', '2023-11-02 22:18:10'),
(12, 'Spanish', 'sp', 0, '2022-11-26 09:36:17', '2023-11-02 22:18:10'),
(13, 'Bengali', 'bn', 0, '2023-06-26 03:12:49', '2023-06-26 03:12:49'),
(14, 'Hindi', 'hn', 0, '2023-07-19 00:39:53', '2023-07-19 00:39:53');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `image_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification_logs`
--

CREATE TABLE `notification_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `sender` varchar(40) DEFAULT NULL,
  `sent_from` varchar(40) DEFAULT NULL,
  `sent_to` varchar(40) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `notification_type` varchar(40) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notification_logs`
--

INSERT INTO `notification_logs` (`id`, `user_id`, `sender`, `sent_from`, `sent_to`, `subject`, `message`, `notification_type`, `created_at`, `updated_at`) VALUES
(1, 1, 'php', 'info@greenstock.com', 'jhondoe@gmail.com', 'Image Approved Successfully', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"><meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"><meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"><title></title><style type=\"text/css\"> .ReadMsgBody{width: 100%; background-color: #ffffff;}.ExternalClass{width: 100%; background-color: #ffffff;}.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div{line-height: 100%;}html{width: 100%;}body{-webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0;}table{border-spacing: 0; table-layout: fixed; margin: 0 auto; border-collapse: collapse;}table table table{table-layout: auto;}.yshortcuts a{border-bottom: none !important;}img:hover{opacity: 0.9 !important;}a{color: #0087ff; text-decoration: none;}.textbutton a{font-family: \'open sans\', arial, sans-serif !important;}.btn-link a{color: #FFFFFF !important;}@media only screen and (max-width: 480px){body{width: auto !important;}*[class=\"table-inner\"]{width: 90% !important; text-align: center !important;}*[class=\"table-full\"]{width: 100% !important; text-align: center !important;}/* image */ img[class=\"img1\"]{width: 100% !important; height: auto !important;}}</style><table bgcolor=\"#414a51\" width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"50\"></td></tr><tr> <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td align=\"center\" width=\"600\"> <table class=\"table-inner\" width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td bgcolor=\"#0087ff\" style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" align=\"center\"> <table width=\"90%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"20\"></td></tr><tr> <td align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\">This is a System Generated Email</td></tr><tr> <td height=\"20\"></td></tr></tbody> </table> </td></tr></tbody> </table> <table class=\"table-inner\" width=\"95%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td bgcolor=\"#FFFFFF\" align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td height=\"35\"></td></tr><tr> <td align=\"center\" style=\"vertical-align:top;font-size:0;\">G</td></tr><tr> <td height=\"40\"><img src=\"https://i.imgur.com/2OiEetW.png\" width=\"143\"></td></tr><tr> <td align=\"center\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\">HelloJhon Doe (jhondoe)</td></tr><tr> <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table width=\"40\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"20\" style=\" border-bottom:3px solid #0087ff;\"></td></tr></tbody> </table> </td></tr><tr> <td height=\"20\"></td></tr><tr> <td align=\"left\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\"><div>Your image has been approved successfully.</div><div>Details of your Image:</div><div>&nbsp; &nbsp; &nbsp;Title : Bugatti Mistral,</div><div>&nbsp; &nbsp; &nbsp;Category: Cars</div></td></tr><tr> <td height=\"40\"></td></tr></tbody> </table> </td></tr><tr> <td height=\"45\" align=\"center\" bgcolor=\"#f4f4f4\" style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\"> <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td height=\"10\"></td></tr><tr> <td class=\"preference-link\" align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\"> © 2021 <a href=\"#\">GreenStock</a>&nbsp;. All Rights Reserved. </td></tr><tr> <td height=\"10\"></td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr><tr> <td height=\"60\"></td></tr></tbody></table>', 'email', '2023-11-07 19:57:45', '2023-11-07 19:57:45'),
(2, 1, 'php', 'info@greenstock.com', 'jhondoe@gmail.com', 'Image Approved Successfully', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"><meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"><meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"><title></title><style type=\"text/css\"> .ReadMsgBody{width: 100%; background-color: #ffffff;}.ExternalClass{width: 100%; background-color: #ffffff;}.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div{line-height: 100%;}html{width: 100%;}body{-webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0;}table{border-spacing: 0; table-layout: fixed; margin: 0 auto; border-collapse: collapse;}table table table{table-layout: auto;}.yshortcuts a{border-bottom: none !important;}img:hover{opacity: 0.9 !important;}a{color: #0087ff; text-decoration: none;}.textbutton a{font-family: \'open sans\', arial, sans-serif !important;}.btn-link a{color: #FFFFFF !important;}@media only screen and (max-width: 480px){body{width: auto !important;}*[class=\"table-inner\"]{width: 90% !important; text-align: center !important;}*[class=\"table-full\"]{width: 100% !important; text-align: center !important;}/* image */ img[class=\"img1\"]{width: 100% !important; height: auto !important;}}</style><table bgcolor=\"#414a51\" width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"50\"></td></tr><tr> <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td align=\"center\" width=\"600\"> <table class=\"table-inner\" width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td bgcolor=\"#0087ff\" style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" align=\"center\"> <table width=\"90%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"20\"></td></tr><tr> <td align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\">This is a System Generated Email</td></tr><tr> <td height=\"20\"></td></tr></tbody> </table> </td></tr></tbody> </table> <table class=\"table-inner\" width=\"95%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td bgcolor=\"#FFFFFF\" align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td height=\"35\"></td></tr><tr> <td align=\"center\" style=\"vertical-align:top;font-size:0;\">G</td></tr><tr> <td height=\"40\"><img src=\"https://i.imgur.com/2OiEetW.png\" width=\"143\"></td></tr><tr> <td align=\"center\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\">HelloJhon Doe (jhondoe)</td></tr><tr> <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table width=\"40\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"20\" style=\" border-bottom:3px solid #0087ff;\"></td></tr></tbody> </table> </td></tr><tr> <td height=\"20\"></td></tr><tr> <td align=\"left\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\"><div>Your image has been approved successfully.</div><div>Details of your Image:</div><div>&nbsp; &nbsp; &nbsp;Title : Mercedes Edo Competition,</div><div>&nbsp; &nbsp; &nbsp;Category: Cars</div></td></tr><tr> <td height=\"40\"></td></tr></tbody> </table> </td></tr><tr> <td height=\"45\" align=\"center\" bgcolor=\"#f4f4f4\" style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\"> <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td height=\"10\"></td></tr><tr> <td class=\"preference-link\" align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\"> © 2021 <a href=\"#\">GreenStock</a>&nbsp;. All Rights Reserved. </td></tr><tr> <td height=\"10\"></td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr><tr> <td height=\"60\"></td></tr></tbody></table>', 'email', '2023-11-07 20:00:57', '2023-11-07 20:00:57'),
(3, 1, 'php', 'info@greenstock.com', 'jhondoe@gmail.com', 'Image Approved Successfully', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"><meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"><meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"><title></title><style type=\"text/css\"> .ReadMsgBody{width: 100%; background-color: #ffffff;}.ExternalClass{width: 100%; background-color: #ffffff;}.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div{line-height: 100%;}html{width: 100%;}body{-webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0;}table{border-spacing: 0; table-layout: fixed; margin: 0 auto; border-collapse: collapse;}table table table{table-layout: auto;}.yshortcuts a{border-bottom: none !important;}img:hover{opacity: 0.9 !important;}a{color: #0087ff; text-decoration: none;}.textbutton a{font-family: \'open sans\', arial, sans-serif !important;}.btn-link a{color: #FFFFFF !important;}@media only screen and (max-width: 480px){body{width: auto !important;}*[class=\"table-inner\"]{width: 90% !important; text-align: center !important;}*[class=\"table-full\"]{width: 100% !important; text-align: center !important;}/* image */ img[class=\"img1\"]{width: 100% !important; height: auto !important;}}</style><table bgcolor=\"#414a51\" width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"50\"></td></tr><tr> <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td align=\"center\" width=\"600\"> <table class=\"table-inner\" width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td bgcolor=\"#0087ff\" style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" align=\"center\"> <table width=\"90%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"20\"></td></tr><tr> <td align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\">This is a System Generated Email</td></tr><tr> <td height=\"20\"></td></tr></tbody> </table> </td></tr></tbody> </table> <table class=\"table-inner\" width=\"95%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td bgcolor=\"#FFFFFF\" align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td height=\"35\"></td></tr><tr> <td align=\"center\" style=\"vertical-align:top;font-size:0;\">G</td></tr><tr> <td height=\"40\"><img src=\"https://i.imgur.com/2OiEetW.png\" width=\"143\"></td></tr><tr> <td align=\"center\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\">HelloJhon Doe (jhondoe)</td></tr><tr> <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table width=\"40\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"20\" style=\" border-bottom:3px solid #0087ff;\"></td></tr></tbody> </table> </td></tr><tr> <td height=\"20\"></td></tr><tr> <td align=\"left\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\"><div>Your image has been approved successfully.</div><div>Details of your Image:</div><div>&nbsp; &nbsp; &nbsp;Title : Bugatti Chiron,</div><div>&nbsp; &nbsp; &nbsp;Category: Cars</div></td></tr><tr> <td height=\"40\"></td></tr></tbody> </table> </td></tr><tr> <td height=\"45\" align=\"center\" bgcolor=\"#f4f4f4\" style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\"> <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td height=\"10\"></td></tr><tr> <td class=\"preference-link\" align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\"> © 2021 <a href=\"#\">GreenStock</a>&nbsp;. All Rights Reserved. </td></tr><tr> <td height=\"10\"></td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr><tr> <td height=\"60\"></td></tr></tbody></table>', 'email', '2023-11-07 20:10:35', '2023-11-07 20:10:35'),
(4, 1, 'php', 'info@greenstock.com', 'jhondoe@gmail.com', 'Image Approved Successfully', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"><meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"><meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"><title></title><style type=\"text/css\"> .ReadMsgBody{width: 100%; background-color: #ffffff;}.ExternalClass{width: 100%; background-color: #ffffff;}.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div{line-height: 100%;}html{width: 100%;}body{-webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0;}table{border-spacing: 0; table-layout: fixed; margin: 0 auto; border-collapse: collapse;}table table table{table-layout: auto;}.yshortcuts a{border-bottom: none !important;}img:hover{opacity: 0.9 !important;}a{color: #0087ff; text-decoration: none;}.textbutton a{font-family: \'open sans\', arial, sans-serif !important;}.btn-link a{color: #FFFFFF !important;}@media only screen and (max-width: 480px){body{width: auto !important;}*[class=\"table-inner\"]{width: 90% !important; text-align: center !important;}*[class=\"table-full\"]{width: 100% !important; text-align: center !important;}/* image */ img[class=\"img1\"]{width: 100% !important; height: auto !important;}}</style><table bgcolor=\"#414a51\" width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"50\"></td></tr><tr> <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td align=\"center\" width=\"600\"> <table class=\"table-inner\" width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td bgcolor=\"#0087ff\" style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" align=\"center\"> <table width=\"90%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"20\"></td></tr><tr> <td align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\">This is a System Generated Email</td></tr><tr> <td height=\"20\"></td></tr></tbody> </table> </td></tr></tbody> </table> <table class=\"table-inner\" width=\"95%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td bgcolor=\"#FFFFFF\" align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td height=\"35\"></td></tr><tr> <td align=\"center\" style=\"vertical-align:top;font-size:0;\">G</td></tr><tr> <td height=\"40\"><img src=\"https://i.imgur.com/2OiEetW.png\" width=\"143\"></td></tr><tr> <td align=\"center\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\">HelloJhon Doe (jhondoe)</td></tr><tr> <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table width=\"40\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"20\" style=\" border-bottom:3px solid #0087ff;\"></td></tr></tbody> </table> </td></tr><tr> <td height=\"20\"></td></tr><tr> <td align=\"left\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\"><div>Your image has been approved successfully.</div><div>Details of your Image:</div><div>&nbsp; &nbsp; &nbsp;Title : Ducati Panigale V4,</div><div>&nbsp; &nbsp; &nbsp;Category: Bikes</div></td></tr><tr> <td height=\"40\"></td></tr></tbody> </table> </td></tr><tr> <td height=\"45\" align=\"center\" bgcolor=\"#f4f4f4\" style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\"> <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td height=\"10\"></td></tr><tr> <td class=\"preference-link\" align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\"> © 2021 <a href=\"#\">GreenStock</a>&nbsp;. All Rights Reserved. </td></tr><tr> <td height=\"10\"></td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr><tr> <td height=\"60\"></td></tr></tbody></table>', 'email', '2023-11-07 20:10:46', '2023-11-07 20:10:46'),
(5, 1, 'php', 'info@greenstock.com', 'jhondoe@gmail.com', 'Image Approved Successfully', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"><meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"><meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"><title></title><style type=\"text/css\"> .ReadMsgBody{width: 100%; background-color: #ffffff;}.ExternalClass{width: 100%; background-color: #ffffff;}.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div{line-height: 100%;}html{width: 100%;}body{-webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0;}table{border-spacing: 0; table-layout: fixed; margin: 0 auto; border-collapse: collapse;}table table table{table-layout: auto;}.yshortcuts a{border-bottom: none !important;}img:hover{opacity: 0.9 !important;}a{color: #0087ff; text-decoration: none;}.textbutton a{font-family: \'open sans\', arial, sans-serif !important;}.btn-link a{color: #FFFFFF !important;}@media only screen and (max-width: 480px){body{width: auto !important;}*[class=\"table-inner\"]{width: 90% !important; text-align: center !important;}*[class=\"table-full\"]{width: 100% !important; text-align: center !important;}/* image */ img[class=\"img1\"]{width: 100% !important; height: auto !important;}}</style><table bgcolor=\"#414a51\" width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"50\"></td></tr><tr> <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td align=\"center\" width=\"600\"> <table class=\"table-inner\" width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td bgcolor=\"#0087ff\" style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" align=\"center\"> <table width=\"90%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"20\"></td></tr><tr> <td align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\">This is a System Generated Email</td></tr><tr> <td height=\"20\"></td></tr></tbody> </table> </td></tr></tbody> </table> <table class=\"table-inner\" width=\"95%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td bgcolor=\"#FFFFFF\" align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td height=\"35\"></td></tr><tr> <td align=\"center\" style=\"vertical-align:top;font-size:0;\">G</td></tr><tr> <td height=\"40\"><img src=\"https://i.imgur.com/2OiEetW.png\" width=\"143\"></td></tr><tr> <td align=\"center\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\">HelloJhon Doe (jhondoe)</td></tr><tr> <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table width=\"40\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"20\" style=\" border-bottom:3px solid #0087ff;\"></td></tr></tbody> </table> </td></tr><tr> <td height=\"20\"></td></tr><tr> <td align=\"left\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\"><div>Your image has been approved successfully.</div><div>Details of your Image:</div><div>&nbsp; &nbsp; &nbsp;Title : BMW S1000R,</div><div>&nbsp; &nbsp; &nbsp;Category: Bikes</div></td></tr><tr> <td height=\"40\"></td></tr></tbody> </table> </td></tr><tr> <td height=\"45\" align=\"center\" bgcolor=\"#f4f4f4\" style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\"> <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td height=\"10\"></td></tr><tr> <td class=\"preference-link\" align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\"> © 2021 <a href=\"#\">GreenStock</a>&nbsp;. All Rights Reserved. </td></tr><tr> <td height=\"10\"></td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr><tr> <td height=\"60\"></td></tr></tbody></table>', 'email', '2023-11-07 20:10:54', '2023-11-07 20:10:54'),
(6, 1, 'php', 'info@greenstock.com', 'jhondoe@gmail.com', 'Image Approved Successfully', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"><meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"><meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"><title></title><style type=\"text/css\"> .ReadMsgBody{width: 100%; background-color: #ffffff;}.ExternalClass{width: 100%; background-color: #ffffff;}.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div{line-height: 100%;}html{width: 100%;}body{-webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0;}table{border-spacing: 0; table-layout: fixed; margin: 0 auto; border-collapse: collapse;}table table table{table-layout: auto;}.yshortcuts a{border-bottom: none !important;}img:hover{opacity: 0.9 !important;}a{color: #0087ff; text-decoration: none;}.textbutton a{font-family: \'open sans\', arial, sans-serif !important;}.btn-link a{color: #FFFFFF !important;}@media only screen and (max-width: 480px){body{width: auto !important;}*[class=\"table-inner\"]{width: 90% !important; text-align: center !important;}*[class=\"table-full\"]{width: 100% !important; text-align: center !important;}/* image */ img[class=\"img1\"]{width: 100% !important; height: auto !important;}}</style><table bgcolor=\"#414a51\" width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"50\"></td></tr><tr> <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td align=\"center\" width=\"600\"> <table class=\"table-inner\" width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td bgcolor=\"#0087ff\" style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" align=\"center\"> <table width=\"90%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"20\"></td></tr><tr> <td align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\">This is a System Generated Email</td></tr><tr> <td height=\"20\"></td></tr></tbody> </table> </td></tr></tbody> </table> <table class=\"table-inner\" width=\"95%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td bgcolor=\"#FFFFFF\" align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td height=\"35\"></td></tr><tr> <td align=\"center\" style=\"vertical-align:top;font-size:0;\">G</td></tr><tr> <td height=\"40\"><img src=\"https://i.imgur.com/2OiEetW.png\" width=\"143\"></td></tr><tr> <td align=\"center\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\">HelloJhon Doe (jhondoe)</td></tr><tr> <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table width=\"40\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"20\" style=\" border-bottom:3px solid #0087ff;\"></td></tr></tbody> </table> </td></tr><tr> <td height=\"20\"></td></tr><tr> <td align=\"left\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\"><div>Your image has been approved successfully.</div><div>Details of your Image:</div><div>&nbsp; &nbsp; &nbsp;Title : Kawasaki Ninja ZX10r,</div><div>&nbsp; &nbsp; &nbsp;Category: Bikes</div></td></tr><tr> <td height=\"40\"></td></tr></tbody> </table> </td></tr><tr> <td height=\"45\" align=\"center\" bgcolor=\"#f4f4f4\" style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\"> <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td height=\"10\"></td></tr><tr> <td class=\"preference-link\" align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\"> © 2021 <a href=\"#\">GreenStock</a>&nbsp;. All Rights Reserved. </td></tr><tr> <td height=\"10\"></td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr><tr> <td height=\"60\"></td></tr></tbody></table>', 'email', '2023-11-07 20:11:04', '2023-11-07 20:11:04'),
(7, 1, 'php', 'info@greenstock.com', 'jhondoe@gmail.com', 'Image Approved Successfully', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"><meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"><meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"><title></title><style type=\"text/css\"> .ReadMsgBody{width: 100%; background-color: #ffffff;}.ExternalClass{width: 100%; background-color: #ffffff;}.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div{line-height: 100%;}html{width: 100%;}body{-webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0;}table{border-spacing: 0; table-layout: fixed; margin: 0 auto; border-collapse: collapse;}table table table{table-layout: auto;}.yshortcuts a{border-bottom: none !important;}img:hover{opacity: 0.9 !important;}a{color: #0087ff; text-decoration: none;}.textbutton a{font-family: \'open sans\', arial, sans-serif !important;}.btn-link a{color: #FFFFFF !important;}@media only screen and (max-width: 480px){body{width: auto !important;}*[class=\"table-inner\"]{width: 90% !important; text-align: center !important;}*[class=\"table-full\"]{width: 100% !important; text-align: center !important;}/* image */ img[class=\"img1\"]{width: 100% !important; height: auto !important;}}</style><table bgcolor=\"#414a51\" width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"50\"></td></tr><tr> <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td align=\"center\" width=\"600\"> <table class=\"table-inner\" width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td bgcolor=\"#0087ff\" style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" align=\"center\"> <table width=\"90%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"20\"></td></tr><tr> <td align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\">This is a System Generated Email</td></tr><tr> <td height=\"20\"></td></tr></tbody> </table> </td></tr></tbody> </table> <table class=\"table-inner\" width=\"95%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td bgcolor=\"#FFFFFF\" align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td height=\"35\"></td></tr><tr> <td align=\"center\" style=\"vertical-align:top;font-size:0;\">G</td></tr><tr> <td height=\"40\"><img src=\"https://i.imgur.com/2OiEetW.png\" width=\"143\"></td></tr><tr> <td align=\"center\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\">HelloJhon Doe (jhondoe)</td></tr><tr> <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table width=\"40\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"20\" style=\" border-bottom:3px solid #0087ff;\"></td></tr></tbody> </table> </td></tr><tr> <td height=\"20\"></td></tr><tr> <td align=\"left\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\"><div>Your image has been approved successfully.</div><div>Details of your Image:</div><div>&nbsp; &nbsp; &nbsp;Title : Tokito Muichiro,</div><div>&nbsp; &nbsp; &nbsp;Category: Anime</div></td></tr><tr> <td height=\"40\"></td></tr></tbody> </table> </td></tr><tr> <td height=\"45\" align=\"center\" bgcolor=\"#f4f4f4\" style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\"> <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td height=\"10\"></td></tr><tr> <td class=\"preference-link\" align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\"> © 2021 <a href=\"#\">GreenStock</a>&nbsp;. All Rights Reserved. </td></tr><tr> <td height=\"10\"></td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr><tr> <td height=\"60\"></td></tr></tbody></table>', 'email', '2023-11-07 20:21:32', '2023-11-07 20:21:32'),
(8, 1, 'php', 'info@greenstock.com', 'jhondoe@gmail.com', 'Image Approved Successfully', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"><meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"><meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"><title></title><style type=\"text/css\"> .ReadMsgBody{width: 100%; background-color: #ffffff;}.ExternalClass{width: 100%; background-color: #ffffff;}.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div{line-height: 100%;}html{width: 100%;}body{-webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0;}table{border-spacing: 0; table-layout: fixed; margin: 0 auto; border-collapse: collapse;}table table table{table-layout: auto;}.yshortcuts a{border-bottom: none !important;}img:hover{opacity: 0.9 !important;}a{color: #0087ff; text-decoration: none;}.textbutton a{font-family: \'open sans\', arial, sans-serif !important;}.btn-link a{color: #FFFFFF !important;}@media only screen and (max-width: 480px){body{width: auto !important;}*[class=\"table-inner\"]{width: 90% !important; text-align: center !important;}*[class=\"table-full\"]{width: 100% !important; text-align: center !important;}/* image */ img[class=\"img1\"]{width: 100% !important; height: auto !important;}}</style><table bgcolor=\"#414a51\" width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"50\"></td></tr><tr> <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td align=\"center\" width=\"600\"> <table class=\"table-inner\" width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td bgcolor=\"#0087ff\" style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" align=\"center\"> <table width=\"90%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"20\"></td></tr><tr> <td align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\">This is a System Generated Email</td></tr><tr> <td height=\"20\"></td></tr></tbody> </table> </td></tr></tbody> </table> <table class=\"table-inner\" width=\"95%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td bgcolor=\"#FFFFFF\" align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td height=\"35\"></td></tr><tr> <td align=\"center\" style=\"vertical-align:top;font-size:0;\">G</td></tr><tr> <td height=\"40\"><img src=\"https://i.imgur.com/2OiEetW.png\" width=\"143\"></td></tr><tr> <td align=\"center\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\">HelloJhon Doe (jhondoe)</td></tr><tr> <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table width=\"40\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"20\" style=\" border-bottom:3px solid #0087ff;\"></td></tr></tbody> </table> </td></tr><tr> <td height=\"20\"></td></tr><tr> <td align=\"left\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\"><div>Your image has been approved successfully.</div><div>Details of your Image:</div><div>&nbsp; &nbsp; &nbsp;Title : Rengoku,</div><div>&nbsp; &nbsp; &nbsp;Category: Anime</div></td></tr><tr> <td height=\"40\"></td></tr></tbody> </table> </td></tr><tr> <td height=\"45\" align=\"center\" bgcolor=\"#f4f4f4\" style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\"> <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td height=\"10\"></td></tr><tr> <td class=\"preference-link\" align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\"> © 2021 <a href=\"#\">GreenStock</a>&nbsp;. All Rights Reserved. </td></tr><tr> <td height=\"10\"></td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr><tr> <td height=\"60\"></td></tr></tbody></table>', 'email', '2023-11-07 20:21:40', '2023-11-07 20:21:40'),
(9, 1, 'php', 'info@greenstock.com', 'jhondoe@gmail.com', 'Image Approved Successfully', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"><meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"><meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"><title></title><style type=\"text/css\"> .ReadMsgBody{width: 100%; background-color: #ffffff;}.ExternalClass{width: 100%; background-color: #ffffff;}.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div{line-height: 100%;}html{width: 100%;}body{-webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0;}table{border-spacing: 0; table-layout: fixed; margin: 0 auto; border-collapse: collapse;}table table table{table-layout: auto;}.yshortcuts a{border-bottom: none !important;}img:hover{opacity: 0.9 !important;}a{color: #0087ff; text-decoration: none;}.textbutton a{font-family: \'open sans\', arial, sans-serif !important;}.btn-link a{color: #FFFFFF !important;}@media only screen and (max-width: 480px){body{width: auto !important;}*[class=\"table-inner\"]{width: 90% !important; text-align: center !important;}*[class=\"table-full\"]{width: 100% !important; text-align: center !important;}/* image */ img[class=\"img1\"]{width: 100% !important; height: auto !important;}}</style><table bgcolor=\"#414a51\" width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"50\"></td></tr><tr> <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td align=\"center\" width=\"600\"> <table class=\"table-inner\" width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td bgcolor=\"#0087ff\" style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" align=\"center\"> <table width=\"90%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"20\"></td></tr><tr> <td align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\">This is a System Generated Email</td></tr><tr> <td height=\"20\"></td></tr></tbody> </table> </td></tr></tbody> </table> <table class=\"table-inner\" width=\"95%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td bgcolor=\"#FFFFFF\" align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td height=\"35\"></td></tr><tr> <td align=\"center\" style=\"vertical-align:top;font-size:0;\">G</td></tr><tr> <td height=\"40\"><img src=\"https://i.imgur.com/2OiEetW.png\" width=\"143\"></td></tr><tr> <td align=\"center\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\">HelloJhon Doe (jhondoe)</td></tr><tr> <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table width=\"40\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"20\" style=\" border-bottom:3px solid #0087ff;\"></td></tr></tbody> </table> </td></tr><tr> <td height=\"20\"></td></tr><tr> <td align=\"left\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\"><div>Your image has been approved successfully.</div><div>Details of your Image:</div><div>&nbsp; &nbsp; &nbsp;Title : Zenitsu,</div><div>&nbsp; &nbsp; &nbsp;Category: Anime</div></td></tr><tr> <td height=\"40\"></td></tr></tbody> </table> </td></tr><tr> <td height=\"45\" align=\"center\" bgcolor=\"#f4f4f4\" style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\"> <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td height=\"10\"></td></tr><tr> <td class=\"preference-link\" align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\"> © 2021 <a href=\"#\">GreenStock</a>&nbsp;. All Rights Reserved. </td></tr><tr> <td height=\"10\"></td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr><tr> <td height=\"60\"></td></tr></tbody></table>', 'email', '2023-11-07 20:21:47', '2023-11-07 20:21:47'),
(10, 1, 'php', 'info@greenstock.com', 'jhondoe@gmail.com', 'Image Approved Successfully', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"><meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"><meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"><title></title><style type=\"text/css\"> .ReadMsgBody{width: 100%; background-color: #ffffff;}.ExternalClass{width: 100%; background-color: #ffffff;}.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div{line-height: 100%;}html{width: 100%;}body{-webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0;}table{border-spacing: 0; table-layout: fixed; margin: 0 auto; border-collapse: collapse;}table table table{table-layout: auto;}.yshortcuts a{border-bottom: none !important;}img:hover{opacity: 0.9 !important;}a{color: #0087ff; text-decoration: none;}.textbutton a{font-family: \'open sans\', arial, sans-serif !important;}.btn-link a{color: #FFFFFF !important;}@media only screen and (max-width: 480px){body{width: auto !important;}*[class=\"table-inner\"]{width: 90% !important; text-align: center !important;}*[class=\"table-full\"]{width: 100% !important; text-align: center !important;}/* image */ img[class=\"img1\"]{width: 100% !important; height: auto !important;}}</style><table bgcolor=\"#414a51\" width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"50\"></td></tr><tr> <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td align=\"center\" width=\"600\"> <table class=\"table-inner\" width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td bgcolor=\"#0087ff\" style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" align=\"center\"> <table width=\"90%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"20\"></td></tr><tr> <td align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\">This is a System Generated Email</td></tr><tr> <td height=\"20\"></td></tr></tbody> </table> </td></tr></tbody> </table> <table class=\"table-inner\" width=\"95%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td bgcolor=\"#FFFFFF\" align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td height=\"35\"></td></tr><tr> <td align=\"center\" style=\"vertical-align:top;font-size:0;\">G</td></tr><tr> <td height=\"40\"><img src=\"https://i.imgur.com/2OiEetW.png\" width=\"143\"></td></tr><tr> <td align=\"center\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\">HelloJhon Doe (jhondoe)</td></tr><tr> <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table width=\"40\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"20\" style=\" border-bottom:3px solid #0087ff;\"></td></tr></tbody> </table> </td></tr><tr> <td height=\"20\"></td></tr><tr> <td align=\"left\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\"><div>Your image has been approved successfully.</div><div>Details of your Image:</div><div>&nbsp; &nbsp; &nbsp;Title : Bugatti Mistral,</div><div>&nbsp; &nbsp; &nbsp;Category: Cars</div></td></tr><tr> <td height=\"40\"></td></tr></tbody> </table> </td></tr><tr> <td height=\"45\" align=\"center\" bgcolor=\"#f4f4f4\" style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\"> <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td height=\"10\"></td></tr><tr> <td class=\"preference-link\" align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\"> © 2021 <a href=\"#\">GreenStock</a>&nbsp;. All Rights Reserved. </td></tr><tr> <td height=\"10\"></td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr><tr> <td height=\"60\"></td></tr></tbody></table>', 'email', '2023-11-09 02:44:59', '2023-11-09 02:44:59'),
(11, 1, 'php', 'info@greenstock.com', 'jhondoe@gmail.com', 'Image Approved Successfully', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"><meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"><meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"><title></title><style type=\"text/css\"> .ReadMsgBody{width: 100%; background-color: #ffffff;}.ExternalClass{width: 100%; background-color: #ffffff;}.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div{line-height: 100%;}html{width: 100%;}body{-webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0;}table{border-spacing: 0; table-layout: fixed; margin: 0 auto; border-collapse: collapse;}table table table{table-layout: auto;}.yshortcuts a{border-bottom: none !important;}img:hover{opacity: 0.9 !important;}a{color: #0087ff; text-decoration: none;}.textbutton a{font-family: \'open sans\', arial, sans-serif !important;}.btn-link a{color: #FFFFFF !important;}@media only screen and (max-width: 480px){body{width: auto !important;}*[class=\"table-inner\"]{width: 90% !important; text-align: center !important;}*[class=\"table-full\"]{width: 100% !important; text-align: center !important;}/* image */ img[class=\"img1\"]{width: 100% !important; height: auto !important;}}</style><table bgcolor=\"#414a51\" width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"50\"></td></tr><tr> <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td align=\"center\" width=\"600\"> <table class=\"table-inner\" width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td bgcolor=\"#0087ff\" style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" align=\"center\"> <table width=\"90%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"20\"></td></tr><tr> <td align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\">This is a System Generated Email</td></tr><tr> <td height=\"20\"></td></tr></tbody> </table> </td></tr></tbody> </table> <table class=\"table-inner\" width=\"95%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td bgcolor=\"#FFFFFF\" align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td height=\"35\"></td></tr><tr> <td align=\"center\" style=\"vertical-align:top;font-size:0;\">G</td></tr><tr> <td height=\"40\"><img src=\"https://i.imgur.com/2OiEetW.png\" width=\"143\"></td></tr><tr> <td align=\"center\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\">HelloJhon Doe (jhondoe)</td></tr><tr> <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table width=\"40\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"20\" style=\" border-bottom:3px solid #0087ff;\"></td></tr></tbody> </table> </td></tr><tr> <td height=\"20\"></td></tr><tr> <td align=\"left\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\"><div>Your image has been approved successfully.</div><div>Details of your Image:</div><div>&nbsp; &nbsp; &nbsp;Title : Bugatti Mistral,</div><div>&nbsp; &nbsp; &nbsp;Category: Cars</div></td></tr><tr> <td height=\"40\"></td></tr></tbody> </table> </td></tr><tr> <td height=\"45\" align=\"center\" bgcolor=\"#f4f4f4\" style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\"> <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td height=\"10\"></td></tr><tr> <td class=\"preference-link\" align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\"> © 2021 <a href=\"#\">GreenStock</a>&nbsp;. All Rights Reserved. </td></tr><tr> <td height=\"10\"></td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr><tr> <td height=\"60\"></td></tr></tbody></table>', 'email', '2023-11-14 22:08:33', '2023-11-14 22:08:33');
INSERT INTO `notification_logs` (`id`, `user_id`, `sender`, `sent_from`, `sent_to`, `subject`, `message`, `notification_type`, `created_at`, `updated_at`) VALUES
(12, 1, 'php', 'info@greenstock.com', 'jhondoe@gmail.com', 'Image Approved Successfully', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"><meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"><meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"><title></title><style type=\"text/css\"> .ReadMsgBody{width: 100%; background-color: #ffffff;}.ExternalClass{width: 100%; background-color: #ffffff;}.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div{line-height: 100%;}html{width: 100%;}body{-webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0;}table{border-spacing: 0; table-layout: fixed; margin: 0 auto; border-collapse: collapse;}table table table{table-layout: auto;}.yshortcuts a{border-bottom: none !important;}img:hover{opacity: 0.9 !important;}a{color: #0087ff; text-decoration: none;}.textbutton a{font-family: \'open sans\', arial, sans-serif !important;}.btn-link a{color: #FFFFFF !important;}@media only screen and (max-width: 480px){body{width: auto !important;}*[class=\"table-inner\"]{width: 90% !important; text-align: center !important;}*[class=\"table-full\"]{width: 100% !important; text-align: center !important;}/* image */ img[class=\"img1\"]{width: 100% !important; height: auto !important;}}</style><table bgcolor=\"#414a51\" width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"50\"></td></tr><tr> <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td align=\"center\" width=\"600\"> <table class=\"table-inner\" width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td bgcolor=\"#0087ff\" style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" align=\"center\"> <table width=\"90%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"20\"></td></tr><tr> <td align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\">This is a System Generated Email</td></tr><tr> <td height=\"20\"></td></tr></tbody> </table> </td></tr></tbody> </table> <table class=\"table-inner\" width=\"95%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td bgcolor=\"#FFFFFF\" align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td height=\"35\"></td></tr><tr> <td align=\"center\" style=\"vertical-align:top;font-size:0;\">G</td></tr><tr> <td height=\"40\"><img src=\"https://i.imgur.com/2OiEetW.png\" width=\"143\"></td></tr><tr> <td align=\"center\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\">HelloJhon Doe (jhondoe)</td></tr><tr> <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table width=\"40\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"20\" style=\" border-bottom:3px solid #0087ff;\"></td></tr></tbody> </table> </td></tr><tr> <td height=\"20\"></td></tr><tr> <td align=\"left\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\"><div>Your image has been approved successfully.</div><div>Details of your Image:</div><div>&nbsp; &nbsp; &nbsp;Title : Bugatti Mistral,</div><div>&nbsp; &nbsp; &nbsp;Category: Cars</div></td></tr><tr> <td height=\"40\"></td></tr></tbody> </table> </td></tr><tr> <td height=\"45\" align=\"center\" bgcolor=\"#f4f4f4\" style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\"> <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td height=\"10\"></td></tr><tr> <td class=\"preference-link\" align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\"> © 2021 <a href=\"#\">GreenStock</a>&nbsp;. All Rights Reserved. </td></tr><tr> <td height=\"10\"></td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr><tr> <td height=\"60\"></td></tr></tbody></table>', 'email', '2023-11-14 22:16:08', '2023-11-14 22:16:08'),
(13, 1, 'php', 'info@greenstock.com', 'jhondoe@gmail.com', 'Image Approved Successfully', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"><meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"><meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"><title></title><style type=\"text/css\"> .ReadMsgBody{width: 100%; background-color: #ffffff;}.ExternalClass{width: 100%; background-color: #ffffff;}.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div{line-height: 100%;}html{width: 100%;}body{-webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0;}table{border-spacing: 0; table-layout: fixed; margin: 0 auto; border-collapse: collapse;}table table table{table-layout: auto;}.yshortcuts a{border-bottom: none !important;}img:hover{opacity: 0.9 !important;}a{color: #0087ff; text-decoration: none;}.textbutton a{font-family: \'open sans\', arial, sans-serif !important;}.btn-link a{color: #FFFFFF !important;}@media only screen and (max-width: 480px){body{width: auto !important;}*[class=\"table-inner\"]{width: 90% !important; text-align: center !important;}*[class=\"table-full\"]{width: 100% !important; text-align: center !important;}/* image */ img[class=\"img1\"]{width: 100% !important; height: auto !important;}}</style><table bgcolor=\"#414a51\" width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"50\"></td></tr><tr> <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td align=\"center\" width=\"600\"> <table class=\"table-inner\" width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td bgcolor=\"#0087ff\" style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" align=\"center\"> <table width=\"90%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"20\"></td></tr><tr> <td align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\">This is a System Generated Email</td></tr><tr> <td height=\"20\"></td></tr></tbody> </table> </td></tr></tbody> </table> <table class=\"table-inner\" width=\"95%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td bgcolor=\"#FFFFFF\" align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td height=\"35\"></td></tr><tr> <td align=\"center\" style=\"vertical-align:top;font-size:0;\">G</td></tr><tr> <td height=\"40\"><img src=\"https://i.imgur.com/2OiEetW.png\" width=\"143\"></td></tr><tr> <td align=\"center\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\">HelloJhon Doe (jhondoe)</td></tr><tr> <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table width=\"40\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"20\" style=\" border-bottom:3px solid #0087ff;\"></td></tr></tbody> </table> </td></tr><tr> <td height=\"20\"></td></tr><tr> <td align=\"left\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\"><div>Your image has been approved successfully.</div><div>Details of your Image:</div><div>&nbsp; &nbsp; &nbsp;Title : Zenitsu,</div><div>&nbsp; &nbsp; &nbsp;Category: Anime</div></td></tr><tr> <td height=\"40\"></td></tr></tbody> </table> </td></tr><tr> <td height=\"45\" align=\"center\" bgcolor=\"#f4f4f4\" style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\"> <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td height=\"10\"></td></tr><tr> <td class=\"preference-link\" align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\"> © 2021 <a href=\"#\">GreenStock</a>&nbsp;. All Rights Reserved. </td></tr><tr> <td height=\"10\"></td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr><tr> <td height=\"60\"></td></tr></tbody></table>', 'email', '2023-11-14 23:31:31', '2023-11-14 23:31:31'),
(14, 1, 'php', 'info@greenstock.com', 'jhondoe@gmail.com', 'Image Approved Successfully', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"><meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"><meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"><title></title><style type=\"text/css\"> .ReadMsgBody{width: 100%; background-color: #ffffff;}.ExternalClass{width: 100%; background-color: #ffffff;}.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div{line-height: 100%;}html{width: 100%;}body{-webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0;}table{border-spacing: 0; table-layout: fixed; margin: 0 auto; border-collapse: collapse;}table table table{table-layout: auto;}.yshortcuts a{border-bottom: none !important;}img:hover{opacity: 0.9 !important;}a{color: #0087ff; text-decoration: none;}.textbutton a{font-family: \'open sans\', arial, sans-serif !important;}.btn-link a{color: #FFFFFF !important;}@media only screen and (max-width: 480px){body{width: auto !important;}*[class=\"table-inner\"]{width: 90% !important; text-align: center !important;}*[class=\"table-full\"]{width: 100% !important; text-align: center !important;}/* image */ img[class=\"img1\"]{width: 100% !important; height: auto !important;}}</style><table bgcolor=\"#414a51\" width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"50\"></td></tr><tr> <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td align=\"center\" width=\"600\"> <table class=\"table-inner\" width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td bgcolor=\"#0087ff\" style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" align=\"center\"> <table width=\"90%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"20\"></td></tr><tr> <td align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\">This is a System Generated Email</td></tr><tr> <td height=\"20\"></td></tr></tbody> </table> </td></tr></tbody> </table> <table class=\"table-inner\" width=\"95%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td bgcolor=\"#FFFFFF\" align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td height=\"35\"></td></tr><tr> <td align=\"center\" style=\"vertical-align:top;font-size:0;\">G</td></tr><tr> <td height=\"40\"><img src=\"https://i.imgur.com/2OiEetW.png\" width=\"143\"></td></tr><tr> <td align=\"center\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\">HelloJhon Doe (jhondoe)</td></tr><tr> <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table width=\"40\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"20\" style=\" border-bottom:3px solid #0087ff;\"></td></tr></tbody> </table> </td></tr><tr> <td height=\"20\"></td></tr><tr> <td align=\"left\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\"><div>Your image has been approved successfully.</div><div>Details of your Image:</div><div>&nbsp; &nbsp; &nbsp;Title : Rengoku,</div><div>&nbsp; &nbsp; &nbsp;Category: Anime</div></td></tr><tr> <td height=\"40\"></td></tr></tbody> </table> </td></tr><tr> <td height=\"45\" align=\"center\" bgcolor=\"#f4f4f4\" style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\"> <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td height=\"10\"></td></tr><tr> <td class=\"preference-link\" align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\"> © 2021 <a href=\"#\">GreenStock</a>&nbsp;. All Rights Reserved. </td></tr><tr> <td height=\"10\"></td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr><tr> <td height=\"60\"></td></tr></tbody></table>', 'email', '2023-11-14 23:31:40', '2023-11-14 23:31:40'),
(15, 1, 'php', 'info@greenstock.com', 'jhondoe@gmail.com', 'Image Approved Successfully', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"><meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"><meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"><title></title><style type=\"text/css\"> .ReadMsgBody{width: 100%; background-color: #ffffff;}.ExternalClass{width: 100%; background-color: #ffffff;}.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div{line-height: 100%;}html{width: 100%;}body{-webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0;}table{border-spacing: 0; table-layout: fixed; margin: 0 auto; border-collapse: collapse;}table table table{table-layout: auto;}.yshortcuts a{border-bottom: none !important;}img:hover{opacity: 0.9 !important;}a{color: #0087ff; text-decoration: none;}.textbutton a{font-family: \'open sans\', arial, sans-serif !important;}.btn-link a{color: #FFFFFF !important;}@media only screen and (max-width: 480px){body{width: auto !important;}*[class=\"table-inner\"]{width: 90% !important; text-align: center !important;}*[class=\"table-full\"]{width: 100% !important; text-align: center !important;}/* image */ img[class=\"img1\"]{width: 100% !important; height: auto !important;}}</style><table bgcolor=\"#414a51\" width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"50\"></td></tr><tr> <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td align=\"center\" width=\"600\"> <table class=\"table-inner\" width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td bgcolor=\"#0087ff\" style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" align=\"center\"> <table width=\"90%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"20\"></td></tr><tr> <td align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\">This is a System Generated Email</td></tr><tr> <td height=\"20\"></td></tr></tbody> </table> </td></tr></tbody> </table> <table class=\"table-inner\" width=\"95%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td bgcolor=\"#FFFFFF\" align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td height=\"35\"></td></tr><tr> <td align=\"center\" style=\"vertical-align:top;font-size:0;\">G</td></tr><tr> <td height=\"40\"><img src=\"https://i.imgur.com/2OiEetW.png\" width=\"143\"></td></tr><tr> <td align=\"center\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\">HelloJhon Doe (jhondoe)</td></tr><tr> <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table width=\"40\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"20\" style=\" border-bottom:3px solid #0087ff;\"></td></tr></tbody> </table> </td></tr><tr> <td height=\"20\"></td></tr><tr> <td align=\"left\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\"><div>Your image has been approved successfully.</div><div>Details of your Image:</div><div>&nbsp; &nbsp; &nbsp;Title : Tokito Muichiro,</div><div>&nbsp; &nbsp; &nbsp;Category: Anime</div></td></tr><tr> <td height=\"40\"></td></tr></tbody> </table> </td></tr><tr> <td height=\"45\" align=\"center\" bgcolor=\"#f4f4f4\" style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\"> <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td height=\"10\"></td></tr><tr> <td class=\"preference-link\" align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\"> © 2021 <a href=\"#\">GreenStock</a>&nbsp;. All Rights Reserved. </td></tr><tr> <td height=\"10\"></td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr><tr> <td height=\"60\"></td></tr></tbody></table>', 'email', '2023-11-14 23:31:50', '2023-11-14 23:31:50'),
(16, 1, 'php', 'info@greenstock.com', 'jhondoe@gmail.com', 'Image Approved Successfully', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"><meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"><meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"><title></title><style type=\"text/css\"> .ReadMsgBody{width: 100%; background-color: #ffffff;}.ExternalClass{width: 100%; background-color: #ffffff;}.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div{line-height: 100%;}html{width: 100%;}body{-webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0;}table{border-spacing: 0; table-layout: fixed; margin: 0 auto; border-collapse: collapse;}table table table{table-layout: auto;}.yshortcuts a{border-bottom: none !important;}img:hover{opacity: 0.9 !important;}a{color: #0087ff; text-decoration: none;}.textbutton a{font-family: \'open sans\', arial, sans-serif !important;}.btn-link a{color: #FFFFFF !important;}@media only screen and (max-width: 480px){body{width: auto !important;}*[class=\"table-inner\"]{width: 90% !important; text-align: center !important;}*[class=\"table-full\"]{width: 100% !important; text-align: center !important;}/* image */ img[class=\"img1\"]{width: 100% !important; height: auto !important;}}</style><table bgcolor=\"#414a51\" width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"50\"></td></tr><tr> <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td align=\"center\" width=\"600\"> <table class=\"table-inner\" width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td bgcolor=\"#0087ff\" style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" align=\"center\"> <table width=\"90%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"20\"></td></tr><tr> <td align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\">This is a System Generated Email</td></tr><tr> <td height=\"20\"></td></tr></tbody> </table> </td></tr></tbody> </table> <table class=\"table-inner\" width=\"95%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td bgcolor=\"#FFFFFF\" align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td height=\"35\"></td></tr><tr> <td align=\"center\" style=\"vertical-align:top;font-size:0;\">G</td></tr><tr> <td height=\"40\"><img src=\"https://i.imgur.com/2OiEetW.png\" width=\"143\"></td></tr><tr> <td align=\"center\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\">HelloJhon Doe (jhondoe)</td></tr><tr> <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table width=\"40\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"20\" style=\" border-bottom:3px solid #0087ff;\"></td></tr></tbody> </table> </td></tr><tr> <td height=\"20\"></td></tr><tr> <td align=\"left\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\"><div>Your image has been approved successfully.</div><div>Details of your Image:</div><div>&nbsp; &nbsp; &nbsp;Title : Tokito Muichiro,</div><div>&nbsp; &nbsp; &nbsp;Category: Anime</div></td></tr><tr> <td height=\"40\"></td></tr></tbody> </table> </td></tr><tr> <td height=\"45\" align=\"center\" bgcolor=\"#f4f4f4\" style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\"> <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td height=\"10\"></td></tr><tr> <td class=\"preference-link\" align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\"> © 2021 <a href=\"#\">GreenStock</a>&nbsp;. All Rights Reserved. </td></tr><tr> <td height=\"10\"></td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr><tr> <td height=\"60\"></td></tr></tbody></table>', 'email', '2023-11-14 23:31:50', '2023-11-14 23:31:50'),
(17, 1, 'php', 'info@greenstock.com', 'jhondoe@gmail.com', 'Image Approved Successfully', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"><meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"><meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"><title></title><style type=\"text/css\"> .ReadMsgBody{width: 100%; background-color: #ffffff;}.ExternalClass{width: 100%; background-color: #ffffff;}.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div{line-height: 100%;}html{width: 100%;}body{-webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0;}table{border-spacing: 0; table-layout: fixed; margin: 0 auto; border-collapse: collapse;}table table table{table-layout: auto;}.yshortcuts a{border-bottom: none !important;}img:hover{opacity: 0.9 !important;}a{color: #0087ff; text-decoration: none;}.textbutton a{font-family: \'open sans\', arial, sans-serif !important;}.btn-link a{color: #FFFFFF !important;}@media only screen and (max-width: 480px){body{width: auto !important;}*[class=\"table-inner\"]{width: 90% !important; text-align: center !important;}*[class=\"table-full\"]{width: 100% !important; text-align: center !important;}/* image */ img[class=\"img1\"]{width: 100% !important; height: auto !important;}}</style><table bgcolor=\"#414a51\" width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"50\"></td></tr><tr> <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td align=\"center\" width=\"600\"> <table class=\"table-inner\" width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td bgcolor=\"#0087ff\" style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" align=\"center\"> <table width=\"90%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"20\"></td></tr><tr> <td align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\">This is a System Generated Email</td></tr><tr> <td height=\"20\"></td></tr></tbody> </table> </td></tr></tbody> </table> <table class=\"table-inner\" width=\"95%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td bgcolor=\"#FFFFFF\" align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td height=\"35\"></td></tr><tr> <td align=\"center\" style=\"vertical-align:top;font-size:0;\">G</td></tr><tr> <td height=\"40\"><img src=\"https://i.imgur.com/2OiEetW.png\" width=\"143\"></td></tr><tr> <td align=\"center\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\">HelloJhon Doe (jhondoe)</td></tr><tr> <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table width=\"40\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"20\" style=\" border-bottom:3px solid #0087ff;\"></td></tr></tbody> </table> </td></tr><tr> <td height=\"20\"></td></tr><tr> <td align=\"left\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\"><div>Your image has been approved successfully.</div><div>Details of your Image:</div><div>&nbsp; &nbsp; &nbsp;Title : Zenitsu,</div><div>&nbsp; &nbsp; &nbsp;Category: Anime</div></td></tr><tr> <td height=\"40\"></td></tr></tbody> </table> </td></tr><tr> <td height=\"45\" align=\"center\" bgcolor=\"#f4f4f4\" style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\"> <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td height=\"10\"></td></tr><tr> <td class=\"preference-link\" align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\"> © 2021 <a href=\"#\">GreenStock</a>&nbsp;. All Rights Reserved. </td></tr><tr> <td height=\"10\"></td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr><tr> <td height=\"60\"></td></tr></tbody></table>', 'email', '2023-11-14 23:33:43', '2023-11-14 23:33:43'),
(18, 3, 'php', 'info@greenstock.com', 'mohammedshahrukhalam@gmail.com', 'Please verify your email address', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"><meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"><meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"><title></title><style type=\"text/css\"> .ReadMsgBody{width: 100%; background-color: #ffffff;}.ExternalClass{width: 100%; background-color: #ffffff;}.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div{line-height: 100%;}html{width: 100%;}body{-webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0;}table{border-spacing: 0; table-layout: fixed; margin: 0 auto; border-collapse: collapse;}table table table{table-layout: auto;}.yshortcuts a{border-bottom: none !important;}img:hover{opacity: 0.9 !important;}a{color: #0087ff; text-decoration: none;}.textbutton a{font-family: \'open sans\', arial, sans-serif !important;}.btn-link a{color: #FFFFFF !important;}@media only screen and (max-width: 480px){body{width: auto !important;}*[class=\"table-inner\"]{width: 90% !important; text-align: center !important;}*[class=\"table-full\"]{width: 100% !important; text-align: center !important;}/* image */ img[class=\"img1\"]{width: 100% !important; height: auto !important;}}</style><table bgcolor=\"#414a51\" width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"50\"></td></tr><tr> <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td align=\"center\" width=\"600\"> <table class=\"table-inner\" width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td bgcolor=\"#0087ff\" style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" align=\"center\"> <table width=\"90%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"20\"></td></tr><tr> <td align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\">This is a System Generated Email</td></tr><tr> <td height=\"20\"></td></tr></tbody> </table> </td></tr></tbody> </table> <table class=\"table-inner\" width=\"95%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td bgcolor=\"#FFFFFF\" align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td height=\"35\"></td></tr><tr> <td align=\"center\" style=\"vertical-align:top;font-size:0;\">G</td></tr><tr> <td height=\"40\"><img src=\"https://i.imgur.com/2OiEetW.png\" width=\"143\"></td></tr><tr> <td align=\"center\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\">Hello (mohammedshahrukhalam)</td></tr><tr> <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table width=\"40\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"20\" style=\" border-bottom:3px solid #0087ff;\"></td></tr></tbody> </table> </td></tr><tr> <td height=\"20\"></td></tr><tr> <td align=\"left\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\"><br><div><div style=\"font-family: Montserrat, sans-serif;\">Thanks For joining us.<br></div><div style=\"font-family: Montserrat, sans-serif;\">Please use the below code to verify your email address.<br></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Your email verification code is:<font size=\"6\"><span style=\"font-weight: bolder;\">&nbsp;894412</span></font></div></div></td></tr><tr> <td height=\"40\"></td></tr></tbody> </table> </td></tr><tr> <td height=\"45\" align=\"center\" bgcolor=\"#f4f4f4\" style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\"> <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td height=\"10\"></td></tr><tr> <td class=\"preference-link\" align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\"> © 2021 <a href=\"#\">GreenStock</a>&nbsp;. All Rights Reserved. </td></tr><tr> <td height=\"10\"></td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr><tr> <td height=\"60\"></td></tr></tbody></table>', 'email', '2023-11-19 21:47:19', '2023-11-19 21:47:19'),
(19, 1, 'php', 'info@greenstock.com', 'jhondoe@gmail.com', 'Image Approved Successfully', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"><meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"><meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"><title></title><style type=\"text/css\"> .ReadMsgBody{width: 100%; background-color: #ffffff;}.ExternalClass{width: 100%; background-color: #ffffff;}.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div{line-height: 100%;}html{width: 100%;}body{-webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0;}table{border-spacing: 0; table-layout: fixed; margin: 0 auto; border-collapse: collapse;}table table table{table-layout: auto;}.yshortcuts a{border-bottom: none !important;}img:hover{opacity: 0.9 !important;}a{color: #0087ff; text-decoration: none;}.textbutton a{font-family: \'open sans\', arial, sans-serif !important;}.btn-link a{color: #FFFFFF !important;}@media only screen and (max-width: 480px){body{width: auto !important;}*[class=\"table-inner\"]{width: 90% !important; text-align: center !important;}*[class=\"table-full\"]{width: 100% !important; text-align: center !important;}/* image */ img[class=\"img1\"]{width: 100% !important; height: auto !important;}}</style><table bgcolor=\"#414a51\" width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"50\"></td></tr><tr> <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td align=\"center\" width=\"600\"> <table class=\"table-inner\" width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td bgcolor=\"#0087ff\" style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" align=\"center\"> <table width=\"90%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"20\"></td></tr><tr> <td align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\">This is a System Generated Email</td></tr><tr> <td height=\"20\"></td></tr></tbody> </table> </td></tr></tbody> </table> <table class=\"table-inner\" width=\"95%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td bgcolor=\"#FFFFFF\" align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td height=\"35\"></td></tr><tr> <td align=\"center\" style=\"vertical-align:top;font-size:0;\">G</td></tr><tr> <td height=\"40\"><img src=\"https://i.imgur.com/2OiEetW.png\" width=\"143\"></td></tr><tr> <td align=\"center\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\">HelloJhon Doe (jhondoe)</td></tr><tr> <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table width=\"40\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"20\" style=\" border-bottom:3px solid #0087ff;\"></td></tr></tbody> </table> </td></tr><tr> <td height=\"20\"></td></tr><tr> <td align=\"left\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\"><div>Your image has been approved successfully.</div><div>Details of your Image:</div><div>&nbsp; &nbsp; &nbsp;Title : Mahindra Thar,</div><div>&nbsp; &nbsp; &nbsp;Category: Cars</div></td></tr><tr> <td height=\"40\"></td></tr></tbody> </table> </td></tr><tr> <td height=\"45\" align=\"center\" bgcolor=\"#f4f4f4\" style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\"> <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td height=\"10\"></td></tr><tr> <td class=\"preference-link\" align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\"> © 2021 <a href=\"#\">GreenStock</a>&nbsp;. All Rights Reserved. </td></tr><tr> <td height=\"10\"></td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr><tr> <td height=\"60\"></td></tr></tbody></table>', 'email', '2023-11-20 22:24:01', '2023-11-20 22:24:01'),
(20, 5, 'php', 'info@greenstock.com', 'test@gmail.com', 'Please verify your email address', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"><meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"><meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"><title></title><style type=\"text/css\"> .ReadMsgBody{width: 100%; background-color: #ffffff;}.ExternalClass{width: 100%; background-color: #ffffff;}.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div{line-height: 100%;}html{width: 100%;}body{-webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0;}table{border-spacing: 0; table-layout: fixed; margin: 0 auto; border-collapse: collapse;}table table table{table-layout: auto;}.yshortcuts a{border-bottom: none !important;}img:hover{opacity: 0.9 !important;}a{color: #0087ff; text-decoration: none;}.textbutton a{font-family: \'open sans\', arial, sans-serif !important;}.btn-link a{color: #FFFFFF !important;}@media only screen and (max-width: 480px){body{width: auto !important;}*[class=\"table-inner\"]{width: 90% !important; text-align: center !important;}*[class=\"table-full\"]{width: 100% !important; text-align: center !important;}/* image */ img[class=\"img1\"]{width: 100% !important; height: auto !important;}}</style><table bgcolor=\"#414a51\" width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"50\"></td></tr><tr> <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td align=\"center\" width=\"600\"> <table class=\"table-inner\" width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td bgcolor=\"#0087ff\" style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" align=\"center\"> <table width=\"90%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"20\"></td></tr><tr> <td align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\">This is a System Generated Email</td></tr><tr> <td height=\"20\"></td></tr></tbody> </table> </td></tr></tbody> </table> <table class=\"table-inner\" width=\"95%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td bgcolor=\"#FFFFFF\" align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td height=\"35\"></td></tr><tr> <td align=\"center\" style=\"vertical-align:top;font-size:0;\">G</td></tr><tr> <td height=\"40\"><img src=\"https://i.imgur.com/2OiEetW.png\" width=\"143\"></td></tr><tr> <td align=\"center\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\">Hello (testtest)</td></tr><tr> <td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\"> <table width=\"40\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"> <tbody> <tr> <td height=\"20\" style=\" border-bottom:3px solid #0087ff;\"></td></tr></tbody> </table> </td></tr><tr> <td height=\"20\"></td></tr><tr> <td align=\"left\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\"><br><div><div style=\"font-family: Montserrat, sans-serif;\">Thanks For joining us.<br></div><div style=\"font-family: Montserrat, sans-serif;\">Please use the below code to verify your email address.<br></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Your email verification code is:<font size=\"6\"><span style=\"font-weight: bolder;\">&nbsp;705316</span></font></div></div></td></tr><tr> <td height=\"40\"></td></tr></tbody> </table> </td></tr><tr> <td height=\"45\" align=\"center\" bgcolor=\"#f4f4f4\" style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\"> <table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tbody> <tr> <td height=\"10\"></td></tr><tr> <td class=\"preference-link\" align=\"center\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#95a5a6; font-size:14px;\"> © 2021 <a href=\"#\">GreenStock</a>&nbsp;. All Rights Reserved. </td></tr><tr> <td height=\"10\"></td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr><tr> <td height=\"60\"></td></tr></tbody></table>', 'email', '2023-11-20 23:28:52', '2023-11-20 23:28:52');

-- --------------------------------------------------------

--
-- Table structure for table `notification_templates`
--

CREATE TABLE `notification_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `act` varchar(40) DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL,
  `subj` varchar(255) DEFAULT NULL,
  `email_body` text DEFAULT NULL,
  `sms_body` text DEFAULT NULL,
  `shortcodes` text DEFAULT NULL,
  `email_status` tinyint(1) NOT NULL DEFAULT 1,
  `sms_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notification_templates`
--

INSERT INTO `notification_templates` (`id`, `act`, `name`, `subj`, `email_body`, `sms_body`, `shortcodes`, `email_status`, `sms_status`, `created_at`, `updated_at`) VALUES
(1, 'BAL_ADD', 'Balance - Added', 'Your Account has been Credited', '<div><div style=\"font-family: Montserrat, sans-serif;\">{{amount}} {{site_currency}} has been added to your account .</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Transaction Number : {{trx}}</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><span style=\"color: rgb(33, 37, 41); font-family: Montserrat, sans-serif;\">Your Current Balance is :&nbsp;</span><font style=\"font-family: Montserrat, sans-serif;\"><span style=\"font-weight: bolder;\">{{post_balance}}&nbsp; {{site_currency}}&nbsp;</span></font><br></div><div><font style=\"font-family: Montserrat, sans-serif;\"><span style=\"font-weight: bolder;\"><br></span></font></div><div>Admin note:&nbsp;<span style=\"color: rgb(33, 37, 41); font-size: 12px; font-weight: 600; white-space: nowrap; text-align: var(--bs-body-text-align);\">{{remark}}</span></div>', '{{amount}} {{site_currency}} credited in your account. Your Current Balance {{post_balance}} {{site_currency}} . Transaction: #{{trx}}. Admin note is \"{{remark}}\"', '{\"trx\":\"Transaction number for the action\",\"amount\":\"Amount inserted by the admin\",\"remark\":\"Remark inserted by the admin\",\"post_balance\":\"Balance of the user after this transaction\"}', 1, 0, '2021-11-03 12:00:00', '2022-04-03 02:18:28'),
(2, 'BAL_SUB', 'Balance - Subtracted', 'Your Account has been Debited', '<div style=\"font-family: Montserrat, sans-serif;\">{{amount}} {{site_currency}} has been subtracted from your account .</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Transaction Number : {{trx}}</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><span style=\"color: rgb(33, 37, 41); font-family: Montserrat, sans-serif;\">Your Current Balance is :&nbsp;</span><font style=\"font-family: Montserrat, sans-serif;\"><span style=\"font-weight: bolder;\">{{post_balance}}&nbsp; {{site_currency}}</span></font><br><div><font style=\"font-family: Montserrat, sans-serif;\"><span style=\"font-weight: bolder;\"><br></span></font></div><div>Admin Note: {{remark}}</div>', '{{amount}} {{site_currency}} debited from your account. Your Current Balance {{post_balance}} {{site_currency}} . Transaction: #{{trx}}. Admin Note is {{remark}}', '{\"trx\":\"Transaction number for the action\",\"amount\":\"Amount inserted by the admin\",\"remark\":\"Remark inserted by the admin\",\"post_balance\":\"Balance of the user after this transaction\"}', 1, 1, '2021-11-03 12:00:00', '2022-04-03 02:24:11'),
(3, 'DEPOSIT_COMPLETE', 'Deposit - Automated - Successful', 'Deposit Completed Successfully', '<div>Your deposit of&nbsp;<span style=\"font-weight: bolder;\">{{amount}} {{site_currency}}</span>&nbsp;is via&nbsp;&nbsp;<span style=\"font-weight: bolder;\">{{method_name}}&nbsp;</span>has been completed Successfully.<span style=\"font-weight: bolder;\"><br></span></div><div><span style=\"font-weight: bolder;\"><br></span></div><div><span style=\"font-weight: bolder;\">Details of your Deposit :<br></span></div><div><br></div><div>Amount : {{amount}} {{site_currency}}</div><div>Charge:&nbsp;<font color=\"#000000\">{{charge}} {{site_currency}}</font></div><div><br></div><div>Conversion Rate : 1 {{site_currency}} = {{rate}} {{method_currency}}</div><div>Received : {{method_amount}} {{method_currency}}<br></div><div>Paid via :&nbsp; {{method_name}}</div><div><br></div><div>Transaction Number : {{trx}}</div><div><font size=\"5\"><span style=\"font-weight: bolder;\"><br></span></font></div><div><font size=\"5\">Your current Balance is&nbsp;<span style=\"font-weight: bolder;\">{{post_balance}} {{site_currency}}</span></font></div><div><br style=\"font-family: Montserrat, sans-serif;\"></div>', '{{amount}} {{site_currency}} Deposit successfully by {{method_name}}', '{\"trx\":\"Transaction number for the deposit\",\"amount\":\"Amount inserted by the user\",\"charge\":\"Gateway charge set by the admin\",\"rate\":\"Conversion rate between base currency and method currency\",\"method_name\":\"Name of the deposit method\",\"method_currency\":\"Currency of the deposit method\",\"method_amount\":\"Amount after conversion between base currency and method currency\",\"post_balance\":\"Balance of the user after this transaction\"}', 1, 1, '2021-11-03 12:00:00', '2022-04-03 02:25:43'),
(4, 'DEPOSIT_APPROVE', 'Deposit - Manual - Approved', 'Your Deposit is Approved', '<div style=\"font-family: Montserrat, sans-serif;\">Your deposit request of&nbsp;<span style=\"font-weight: bolder;\">{{amount}} {{site_currency}}</span>&nbsp;is via&nbsp;&nbsp;<span style=\"font-weight: bolder;\">{{method_name}}&nbsp;</span>is Approved .<span style=\"font-weight: bolder;\"><br></span></div><div style=\"font-family: Montserrat, sans-serif;\"><span style=\"font-weight: bolder;\"><br></span></div><div style=\"font-family: Montserrat, sans-serif;\"><span style=\"font-weight: bolder;\">Details of your Deposit :<br></span></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Amount : {{amount}} {{site_currency}}</div><div style=\"font-family: Montserrat, sans-serif;\">Charge:&nbsp;<font color=\"#FF0000\">{{charge}} {{site_currency}}</font></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Conversion Rate : 1 {{site_currency}} = {{rate}} {{method_currency}}</div><div style=\"font-family: Montserrat, sans-serif;\">Received : {{method_amount}} {{method_currency}}<br></div><div style=\"font-family: Montserrat, sans-serif;\">Paid via :&nbsp; {{method_name}}</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Transaction Number : {{trx}}</div><div style=\"font-family: Montserrat, sans-serif;\"><font size=\"5\"><span style=\"font-weight: bolder;\"><br></span></font></div><div style=\"font-family: Montserrat, sans-serif;\"><font size=\"5\">Your current Balance is&nbsp;<span style=\"font-weight: bolder;\">{{post_balance}} {{site_currency}}</span></font></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div>', 'Admin Approve Your {{amount}} {{site_currency}} payment request by {{method_name}} transaction : {{trx}}', '{\"trx\":\"Transaction number for the deposit\",\"amount\":\"Amount inserted by the user\",\"charge\":\"Gateway charge set by the admin\",\"rate\":\"Conversion rate between base currency and method currency\",\"method_name\":\"Name of the deposit method\",\"method_currency\":\"Currency of the deposit method\",\"method_amount\":\"Amount after conversion between base currency and method currency\",\"post_balance\":\"Balance of the user after this transaction\"}', 1, 1, '2021-11-03 12:00:00', '2022-04-03 02:26:07'),
(5, 'DEPOSIT_REJECT', 'Deposit - Manual - Rejected', 'Your Deposit Request is Rejected', '<div style=\"font-family: Montserrat, sans-serif;\">Your deposit request of&nbsp;<span style=\"font-weight: bolder;\">{{amount}} {{site_currency}}</span>&nbsp;is via&nbsp;&nbsp;<span style=\"font-weight: bolder;\">{{method_name}} has been rejected</span>.<span style=\"font-weight: bolder;\"><br></span></div><div><br></div><div><br></div><div style=\"font-family: Montserrat, sans-serif;\">Conversion Rate : 1 {{site_currency}} = {{rate}} {{method_currency}}</div><div style=\"font-family: Montserrat, sans-serif;\">Received : {{method_amount}} {{method_currency}}<br></div><div style=\"font-family: Montserrat, sans-serif;\">Paid via :&nbsp; {{method_name}}</div><div style=\"font-family: Montserrat, sans-serif;\">Charge: {{charge}}</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Transaction Number was : {{trx}}</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">if you have any queries, feel free to contact us.<br></div><br style=\"font-family: Montserrat, sans-serif;\"><div style=\"font-family: Montserrat, sans-serif;\"><br><br></div><span style=\"color: rgb(33, 37, 41); font-family: Montserrat, sans-serif;\">{{rejection_message}}</span><br>', 'Admin Rejected Your {{amount}} {{site_currency}} payment request by {{method_name}}\r\n\r\n{{rejection_message}}', '{\"trx\":\"Transaction number for the deposit\",\"amount\":\"Amount inserted by the user\",\"charge\":\"Gateway charge set by the admin\",\"rate\":\"Conversion rate between base currency and method currency\",\"method_name\":\"Name of the deposit method\",\"method_currency\":\"Currency of the deposit method\",\"method_amount\":\"Amount after conversion between base currency and method currency\",\"rejection_message\":\"Rejection message by the admin\"}', 1, 1, '2021-11-03 12:00:00', '2022-04-05 03:45:27'),
(6, 'DEPOSIT_REQUEST', 'Deposit - Manual - Requested', 'Deposit Request Submitted Successfully', '<div>Your deposit request of&nbsp;<span style=\"font-weight: bolder;\">{{amount}} {{site_currency}}</span>&nbsp;is via&nbsp;&nbsp;<span style=\"font-weight: bolder;\">{{method_name}}&nbsp;</span>submitted successfully<span style=\"font-weight: bolder;\">&nbsp;.<br></span></div><div><span style=\"font-weight: bolder;\"><br></span></div><div><span style=\"font-weight: bolder;\">Details of your Deposit :<br></span></div><div><br></div><div>Amount : {{amount}} {{site_currency}}</div><div>Charge:&nbsp;<font color=\"#FF0000\">{{charge}} {{site_currency}}</font></div><div>Payment via:&nbsp;{{method_name}}</div><div>Conversion Rate : 1 {{site_currency}} = {{rate}} {{method_currency}}</div><div>Payable : {{method_amount}} {{method_currency}}</div><div><br></div><div>Transaction Number : {{trx}}</div><div><br></div><div><br style=\"font-family: Montserrat, sans-serif;\"></div>', '{{amount}} {{site_currency}} Deposit requested by {{method_name}}. Charge: {{charge}} . Trx: {{trx}}', '{\"trx\":\"Transaction number for the deposit\",\"amount\":\"Amount inserted by the user\",\"charge\":\"Gateway charge set by the admin\",\"rate\":\"Conversion rate between base currency and method currency\",\"method_name\":\"Name of the deposit method\",\"method_currency\":\"Currency of the deposit method\",\"method_amount\":\"Amount after conversion between base currency and method currency\"}', 1, 1, '2021-11-03 12:00:00', '2023-07-26 19:17:23'),
(7, 'PASS_RESET_CODE', 'Password - Reset - Code', 'Password Reset', '<div style=\"font-family: Montserrat, sans-serif;\">We have received a request to reset the password for your account on&nbsp;<span style=\"font-weight: bolder;\">{{time}} .<br></span></div><div style=\"font-family: Montserrat, sans-serif;\">Requested From IP:&nbsp;<span style=\"font-weight: bolder;\">{{ip}}</span>&nbsp;using&nbsp;<span style=\"font-weight: bolder;\">{{browser}}</span>&nbsp;on&nbsp;<span style=\"font-weight: bolder;\">{{operating_system}}&nbsp;</span>.</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><br style=\"font-family: Montserrat, sans-serif;\"><div style=\"font-family: Montserrat, sans-serif;\"><div>Your account recovery code is:&nbsp;&nbsp;&nbsp;<font size=\"6\"><span style=\"font-weight: bolder;\">{{code}}</span></font></div><div><br></div></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\"><font size=\"4\" color=\"#CC0000\">If you do not wish to reset your password, please disregard this message.&nbsp;</font><br></div><div><font size=\"4\" color=\"#CC0000\"><br></font></div>', 'Your account recovery code is: {{code}}', '{\"code\":\"Verification code for password reset\",\"ip\":\"IP address of the user\",\"browser\":\"Browser of the user\",\"operating_system\":\"Operating system of the user\",\"time\":\"Time of the request\"}', 1, 0, '2021-11-03 12:00:00', '2022-03-20 20:47:05'),
(8, 'PASS_RESET_DONE', 'Password - Reset - Confirmation', 'You have reset your password', '<p style=\"font-family: Montserrat, sans-serif;\">You have successfully reset your password.</p><p style=\"font-family: Montserrat, sans-serif;\">You changed from&nbsp; IP:&nbsp;<span style=\"font-weight: bolder;\">{{ip}}</span>&nbsp;using&nbsp;<span style=\"font-weight: bolder;\">{{browser}}</span>&nbsp;on&nbsp;<span style=\"font-weight: bolder;\">{{operating_system}}&nbsp;</span>&nbsp;on&nbsp;<span style=\"font-weight: bolder;\">{{time}}</span></p><p style=\"font-family: Montserrat, sans-serif;\"><span style=\"font-weight: bolder;\"><br></span></p><p style=\"font-family: Montserrat, sans-serif;\"><span style=\"font-weight: bolder;\"><font color=\"#ff0000\">If you did not change that, please contact us as soon as possible.</font></span></p>', 'Your password has been changed successfully', '{\"ip\":\"IP address of the user\",\"browser\":\"Browser of the user\",\"operating_system\":\"Operating system of the user\",\"time\":\"Time of the request\"}', 1, 1, '2021-11-03 12:00:00', '2022-04-05 03:46:35'),
(9, 'ADMIN_SUPPORT_REPLY', 'Support - Reply', 'Reply Support Ticket', '<div><p><span data-mce-style=\"font-size: 11pt;\" style=\"font-size: 11pt;\"><span style=\"font-weight: bolder;\">A member from our support team has replied to the following ticket:</span></span></p><p><span style=\"font-weight: bolder;\"><span data-mce-style=\"font-size: 11pt;\" style=\"font-size: 11pt;\"><span style=\"font-weight: bolder;\"><br></span></span></span></p><p><span style=\"font-weight: bolder;\">[Ticket#{{ticket_id}}] {{ticket_subject}}<br><br>Click here to reply:&nbsp; {{link}}</span></p><p>----------------------------------------------</p><p>Here is the reply :<br></p><p>{{reply}}<br></p></div><div><br style=\"font-family: Montserrat, sans-serif;\"></div>', 'Your Ticket#{{ticket_id}} :  {{ticket_subject}} has been replied.', '{\"ticket_id\":\"ID of the support ticket\",\"ticket_subject\":\"Subject  of the support ticket\",\"reply\":\"Reply made by the admin\",\"link\":\"URL to view the support ticket\"}', 1, 1, '2021-11-03 12:00:00', '2022-03-20 20:47:51'),
(10, 'EVER_CODE', 'Verification - Email', 'Please verify your email address', '<br><div><div style=\"font-family: Montserrat, sans-serif;\">Thanks For joining us.<br></div><div style=\"font-family: Montserrat, sans-serif;\">Please use the below code to verify your email address.<br></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Your email verification code is:<font size=\"6\"><span style=\"font-weight: bolder;\">&nbsp;{{code}}</span></font></div></div>', '---', '{\"code\":\"Email verification code\"}', 1, 0, '2021-11-03 12:00:00', '2022-04-03 02:32:07'),
(11, 'SVER_CODE', 'Verification - SMS', 'Verify Your Mobile Number', 'Your phone verification code is: {{code}}', 'Your phone verification code is: {{code}}', '{\"code\":\"SMS Verification Code\"}', 1, 0, '2021-11-03 12:00:00', '2022-10-26 03:19:26'),
(12, 'WITHDRAW_APPROVE', 'Withdraw - Approved', 'Withdraw Request has been Processed and your money is sent', '<div style=\"font-family: Montserrat, sans-serif;\">Your withdraw request of&nbsp;<span style=\"font-weight: bolder;\">{{amount}} {{site_currency}}</span>&nbsp; via&nbsp;&nbsp;<span style=\"font-weight: bolder;\">{{method_name}}&nbsp;</span>has been Processed Successfully.<span style=\"font-weight: bolder;\"><br></span></div><div style=\"font-family: Montserrat, sans-serif;\"><span style=\"font-weight: bolder;\"><br></span></div><div style=\"font-family: Montserrat, sans-serif;\"><span style=\"font-weight: bolder;\">Details of your withdraw:<br></span></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Amount : {{amount}} {{site_currency}}</div><div style=\"font-family: Montserrat, sans-serif;\">Charge:&nbsp;<font color=\"#FF0000\">{{charge}} {{site_currency}}</font></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Conversion Rate : 1 {{site_currency}} = {{rate}} {{method_currency}}</div><div style=\"font-family: Montserrat, sans-serif;\">You will get: {{method_amount}} {{method_currency}}<br></div><div style=\"font-family: Montserrat, sans-serif;\">Via :&nbsp; {{method_name}}</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Transaction Number : {{trx}}</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">-----</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\"><font size=\"4\">Details of Processed Payment :</font></div><div style=\"font-family: Montserrat, sans-serif;\"><font size=\"4\"><span style=\"font-weight: bolder;\">{{admin_details}}</span></font></div>', 'Admin Approve Your {{amount}} {{site_currency}} withdraw request by {{method_name}}. Transaction {{trx}}', '{\"trx\":\"Transaction number for the withdraw\",\"amount\":\"Amount requested by the user\",\"charge\":\"Gateway charge set by the admin\",\"rate\":\"Conversion rate between base currency and method currency\",\"method_name\":\"Name of the withdraw method\",\"method_currency\":\"Currency of the withdraw method\",\"method_amount\":\"Amount after conversion between base currency and method currency\",\"admin_details\":\"Details provided by the admin\"}', 1, 1, '2021-11-03 12:00:00', '2022-03-20 20:50:16'),
(13, 'WITHDRAW_REJECT', 'Withdraw - Rejected', 'Withdraw Request has been Rejected and your money is refunded to your account', '<div style=\"font-family: Montserrat, sans-serif;\">Your withdraw request of&nbsp;<span style=\"font-weight: bolder;\">{{amount}} {{site_currency}}</span>&nbsp; via&nbsp;&nbsp;<span style=\"font-weight: bolder;\">{{method_name}}&nbsp;</span>has been Rejected.<span style=\"font-weight: bolder;\"><br></span></div><div style=\"font-family: Montserrat, sans-serif;\"><span style=\"font-weight: bolder;\"><br></span></div><div style=\"font-family: Montserrat, sans-serif;\"><span style=\"font-weight: bolder;\">Details of your withdraw:<br></span></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Amount : {{amount}} {{site_currency}}</div><div style=\"font-family: Montserrat, sans-serif;\">Charge:&nbsp;<font color=\"#FF0000\">{{charge}} {{site_currency}}</font></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Conversion Rate : 1 {{site_currency}} = {{rate}} {{method_currency}}</div><div style=\"font-family: Montserrat, sans-serif;\">You should get: {{method_amount}} {{method_currency}}<br></div><div style=\"font-family: Montserrat, sans-serif;\">Via :&nbsp; {{method_name}}</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Transaction Number : {{trx}}</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">----</div><div style=\"font-family: Montserrat, sans-serif;\"><font size=\"3\"><br></font></div><div style=\"font-family: Montserrat, sans-serif;\"><font size=\"3\">{{amount}} {{currency}} has been&nbsp;<span style=\"font-weight: bolder;\">refunded&nbsp;</span>to your account and your current Balance is&nbsp;<span style=\"font-weight: bolder;\">{{post_balance}}</span><span style=\"font-weight: bolder;\">&nbsp;{{site_currency}}</span></font></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">-----</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\"><font size=\"4\">Details of Rejection :</font></div><div style=\"font-family: Montserrat, sans-serif;\"><font size=\"4\"><span style=\"font-weight: bolder;\">{{admin_details}}</span></font></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\"><br><br><br><br><br></div><div></div><div></div>', 'Admin Rejected Your {{amount}} {{site_currency}} withdraw request. Your Main Balance {{post_balance}}  {{method_name}} , Transaction {{trx}}', '{\"trx\":\"Transaction number for the withdraw\",\"amount\":\"Amount requested by the user\",\"charge\":\"Gateway charge set by the admin\",\"rate\":\"Conversion rate between base currency and method currency\",\"method_name\":\"Name of the withdraw method\",\"method_currency\":\"Currency of the withdraw method\",\"method_amount\":\"Amount after conversion between base currency and method currency\",\"post_balance\":\"Balance of the user after fter this action\",\"admin_details\":\"Rejection message by the admin\"}', 1, 1, '2021-11-03 12:00:00', '2022-03-20 20:57:46'),
(14, 'WITHDRAW_REQUEST', 'Withdraw - Requested', 'Withdraw Request Submitted Successfully', '<div style=\"font-family: Montserrat, sans-serif;\">Your withdraw request of&nbsp;<span style=\"font-weight: bolder;\">{{amount}} {{site_currency}}</span>&nbsp; via&nbsp;&nbsp;<span style=\"font-weight: bolder;\">{{method_name}}&nbsp;</span>has been submitted Successfully.<span style=\"font-weight: bolder;\"><br></span></div><div style=\"font-family: Montserrat, sans-serif;\"><span style=\"font-weight: bolder;\"><br></span></div><div style=\"font-family: Montserrat, sans-serif;\"><span style=\"font-weight: bolder;\">Details of your withdraw:<br></span></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Amount : {{amount}} {{site_currency}}</div><div style=\"font-family: Montserrat, sans-serif;\">Charge:&nbsp;<font color=\"#FF0000\">{{charge}} {{site_currency}}</font></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Conversion Rate : 1 {{site_currency}} = {{rate}} {{method_currency}}</div><div style=\"font-family: Montserrat, sans-serif;\">You will get: {{method_amount}} {{method_currency}}<br></div><div style=\"font-family: Montserrat, sans-serif;\">Via :&nbsp; {{method_name}}</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Transaction Number : {{trx}}</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\"><font size=\"5\">Your current Balance is&nbsp;<span style=\"font-weight: bolder;\">{{post_balance}} {{site_currency}}</span></font></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\"><br><br><br></div>', '{{amount}} {{site_currency}} withdraw requested by {{method_name}}. You will get {{method_amount}} {{method_currency}} Trx: {{trx}}', '{\"trx\":\"Transaction number for the withdraw\",\"amount\":\"Amount requested by the user\",\"charge\":\"Gateway charge set by the admin\",\"rate\":\"Conversion rate between base currency and method currency\",\"method_name\":\"Name of the withdraw method\",\"method_currency\":\"Currency of the withdraw method\",\"method_amount\":\"Amount after conversion between base currency and method currency\",\"post_balance\":\"Balance of the user after fter this transaction\"}', 1, 1, '2021-11-03 12:00:00', '2022-03-21 04:39:03'),
(15, 'DEFAULT', 'Default Template', '{{subject}}', '{{message}}', '{{message}}', '{\"subject\":\"Subject\",\"message\":\"Message\"}', 1, 1, '2019-09-14 13:14:22', '2021-11-04 09:38:55'),
(16, 'KYC_APPROVE', 'KYC Approved', 'KYC has been approved', 'KYC data has been approved successfully.', 'KYC data has been approved successfully.', '[]', 1, 0, NULL, '2022-10-22 07:15:06'),
(17, 'KYC_REJECT', 'KYC Rejected Successfully', 'KYC has been rejected', 'Your kyc data has been rejected.', 'Your kyc data has been rejected.', '[]', 1, 0, NULL, '2022-10-22 07:14:42'),
(18, 'PLAN_PURCHASED', 'Plan Purchase - Successful', 'Plan Purchased Successfully', '<div><span style=\"font-weight: bolder;\">{{plan_name}}</span>&nbsp;plan has been purchased successfully via&nbsp;&nbsp;<span style=\"font-weight: bolder;\">{{method_name}} .</span><span style=\"font-weight: bolder;\"><br></span></div><div><span style=\"font-weight: bolder;\"><br></span></div><div><span style=\"font-weight: bolder;\">Purchase Details :</span></div><div><span style=\"font-weight: bolder;\"><br></span></div><div>Amount : {{amount}} {{site_currency}}</div><div>Charge:&nbsp;<font color=\"#000000\">{{charge}} {{site_currency}}</font></div><div><br></div><div>Plan expired at : {{expired_at}}</div><div><br></div><div>Transaction Number : {{trx}}</div><div><font size=\"5\"><span style=\"font-weight: bolder;\"><br></span></font></div><div><font size=\"5\">Your current balance is&nbsp;<span style=\"font-weight: bolder;\">{{post_balance}} {{site_currency}}</span></font></div><div><br style=\"font-family: Montserrat, sans-serif;\"></div>', '{{plan_name}} plan has been purchased successfully via  {{method_name}}', '{\r\n    \"plan_name\" : \"plan name\",\r\n    \"amount\" : \"amount\",\r\n    \"trx\" :\"Transaction number\",\r\n    \"charge\" : \"gateway charge\",\r\n    \"method_name\" : \"method name\",\r\n    \"post_balance\": \"user post balance\",\r\n    \"expired_at\" : \"expire date\"\r\n}', 1, 0, '2021-11-03 12:00:00', '2022-09-22 07:43:40'),
(19, 'PAYMENT_REQUEST', 'Payment - Manual - Requested', 'Payment Request Submitted Successfully', '<div>Your payment request for <span style=\"font-weight: bolder;\">{{plan_name}}</span> of&nbsp;<span style=\"font-weight: bolder;\">{{amount}} {{site_currency}}</span>&nbsp;is via&nbsp;&nbsp;<span style=\"font-weight: bolder;\">{{method_name}}&nbsp;</span>submitted successfully<span style=\"font-weight: bolder;\">&nbsp;.<br></span></div><div><span style=\"font-weight: bolder;\"><br></span></div><div><span style=\"font-weight: bolder;\">Details of your Payment:<br></span></div><div><br></div><div>Amount : {{amount}} {{site_currency}}</div><div>Charge:&nbsp;<font color=\"#FF0000\">{{charge}} {{site_currency}}</font></div><div><br></div><div>Conversion Rate : 1 {{site_currency}} = {{rate}} {{method_currency}}</div><div>Payable : {{method_amount}} {{method_currency}}<br></div><div>Pay via :&nbsp; {{method_name}}</div><div><br></div><div>Transaction Number : {{trx}}</div><div><br></div><div><br style=\"font-family: Montserrat, sans-serif;\"></div>', '{{amount}} {{site_currency}} Payment requested by {{method_name}}. Charge: {{charge}} . Trx: {{trx}}', '{\"trx\":\"Transaction number for the deposit\",\"amount\":\"Amount inserted by the user\",\"charge\":\"Gateway charge set by the admin\",\"rate\":\"Conversion rate between base currency and method currency\",\"method_name\":\"Name of the deposit method\",\"method_currency\":\"Currency of the deposit method\",\"method_amount\":\"Amount after conversion between base currency and method currency\", \"plan_name\":\"Plan name\"}', 1, 1, '2021-11-03 12:00:00', '2022-09-22 07:09:07'),
(20, 'PURCHASE_REQUEST_APPROVE', 'Plan Purchase Request - Manual - Approve', 'Plan Purchased Request has been Approved', '<div><span style=\"font-weight: bolder;\">{{plan_name}}</span>&nbsp;plan purchase request has been approved successfully via&nbsp;&nbsp;<span style=\"font-weight: bolder;\">{{method_name}} .</span><span style=\"font-weight: bolder;\"><br></span></div><div><span style=\"font-weight: bolder;\"><br></span></div><div><span style=\"font-weight: bolder;\">Purchase Request Details :</span></div><div><span style=\"font-weight: bolder;\"><br></span></div><div>Amount : {{amount}} {{site_currency}}</div><div>Charge:&nbsp;<font color=\"#000000\">{{charge}} {{site_currency}}</font></div><div><br></div><div>Plan expired at : {{expired_at}}</div><div><br></div><div>Transaction Number : {{trx}}</div><div><font size=\"5\"><span style=\"font-weight: bolder;\"><br></span></font></div><div><font size=\"5\">Your current balance is&nbsp;<span style=\"font-weight: bolder;\">{{post_balance}} {{site_currency}}</span></font></div><div><br style=\"font-family: Montserrat, sans-serif;\"></div>', '{{plan_name}} plan has been purchased successfully via  {{method_name}}', '{\r\n    \"plan_name\" : \"plan name\",\r\n    \"amount\" : \"amount\",\r\n    \"trx\" :\"Transaction number\",\r\n    \"charge\" : \"gateway charge\",\r\n    \"method_name\" : \"method name\",\r\n    \"post_balance\": \"user post balance\",\r\n    \"expired_at\" : \"expire date\"\r\n}', 1, 0, '2021-11-03 12:00:00', '2022-09-22 07:43:59'),
(21, 'PAYMENT_REJECT', 'Payment- Manual - Rejected', 'Your Payment Request is Rejected', '<div style=\"font-family: Montserrat, sans-serif;\">Your payment request for <span style=\"font-weight: bolder;\">{{plan_name}}</span> of&nbsp;<span style=\"font-weight: bolder;\">{{amount}} {{site_currency}}</span>&nbsp;is via&nbsp;&nbsp;<span style=\"font-weight: bolder;\">{{method_name}} has been rejected</span>.<span style=\"font-weight: bolder;\"><br></span></div><div><br></div><div><br></div><div style=\"font-family: Montserrat, sans-serif;\">Conversion Rate : 1 {{site_currency}} = {{rate}} {{method_currency}}</div><div style=\"font-family: Montserrat, sans-serif;\">Received : {{method_amount}} {{method_currency}}<br></div><div style=\"font-family: Montserrat, sans-serif;\">Paid via :&nbsp; {{method_name}}</div><div style=\"font-family: Montserrat, sans-serif;\">Charge: {{charge}}</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Transaction Number was : {{trx}}</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">if you have any queries, feel free to contact us.<br></div><br style=\"font-family: Montserrat, sans-serif;\"><div style=\"font-family: Montserrat, sans-serif;\"><br><br></div><span style=\"color: rgb(33, 37, 41); font-family: Montserrat, sans-serif;\">{{rejection_message}}</span><br>', 'Admin Rejected Your {{amount}} {{site_currency}} payment request by {{method_name}}\r\n\r\n{{rejection_message}}', '{\"trx\":\"Transaction number for the deposit\",\"amount\":\"Amount inserted by the user\",\"charge\":\"Gateway charge set by the admin\",\"rate\":\"Conversion rate between base currency and method currency\",\"method_name\":\"Name of the deposit method\",\"method_currency\":\"Currency of the deposit method\",\"method_amount\":\"Amount after conversion between base currency and method currency\",\"rejection_message\":\"Rejection message by the admin\",\r\n\"plan_name\" : \"Plan name\"}', 1, 1, '2021-11-03 12:00:00', '2022-09-22 07:48:28'),
(22, 'REFERRAL_COMMISSION', 'Referral Commission', 'Referral Commission Added Successfully', '<div>You have got referral commission for {{user}} \'s plan purchased.</div><br><div>Commisison amount : {{amount}} {{site_currency}}<br></div><div>Transaction Number : {{trx}}</div><div><font size=\"5\"><span style=\"font-weight: bolder;\"><br></span></font></div><div><font size=\"5\">Your current balance is&nbsp;<span style=\"font-weight: bolder;\">{{post_balance}} {{site_currency}}</span></font></div><div><br style=\"font-family: Montserrat, sans-serif;\"></div>', 'You have got {{amount}} {{site_currency}}  referral commission for {{user}} \'s plan purchased.', '{\r\n    \"user\" : \"User Fullname\",\r\n    \"trx\" : \"trx\",\r\n    \"amount\" : \"amount\",\r\n    \"post_balance\" : \" Post Balance \"\r\n}', 1, 0, '2021-11-03 12:00:00', '2022-09-24 03:16:59'),
(24, 'IMAGE_APPROVED', 'Image Approved', 'Image Approved Successfully', '<div>Your image has been approved successfully.</div><div>Details of your Image:</div><div>&nbsp; &nbsp; &nbsp;Title : {{title}},</div><div>&nbsp; &nbsp; &nbsp;Category: {{category}}</div>', 'Your image has been approved successfully.\r\nDetails of your Image:\r\n     Title : {{title}},\r\n     Category: {{category}}', '{ \"title\" : \"Image title\", \"category\" : \"Image Category\" }', 1, 0, '2021-11-03 12:00:00', '2022-11-14 09:21:16'),
(26, 'IMAGE_REJECT', 'Image Reject', 'Image Rejected Successfully', '<div><span style=\"color: rgb(33, 37, 41);\">Image has been rejected.</span><div><br></div><div>Details of your image:</div><div>&nbsp; &nbsp; &nbsp;Title: {{title}}</div><div>&nbsp; &nbsp; &nbsp;Category:{{category}}</div><div><br></div><div>Reason:</div><div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;{{reason}}</div></div>', 'Image has been rejected.\r\n\r\nDetails of your image:\r\n     Title: {{title}}\r\n     Category:{{category}}\r\n\r\nReason:\r\n         {{reason}}', '{ \"title\" : \"Image title\", \"category\" : \"Image Category\", \"reason\" : \"Reason\" }', 1, 0, '2021-11-03 12:00:00', '2022-11-14 09:24:33'),
(27, 'REVIEWER_CREATED', 'Reviewer Created', 'Reviewer Created Successfully', 'Admin created your account as a reviewer.&nbsp;<div>Created at: {{time}}</div>', 'Admin created your account as a reviewer. \r\nCreated at: {{time}}', '{ \"time\" : \"Created time\" }', 1, 0, '2021-11-03 12:00:00', '2022-11-15 09:59:09'),
(28, 'REVIEWER_PASSWORD_UPDATE', 'Reviewer Password Updated', 'Reviewer Password updated successfully', 'Admin updated your password.&nbsp;<div>Update time: {{time}}</div><div>Contact with admin.</div>', 'Admin updated your password. \r\nUpdate time: {{time}}\r\nContact with admin.', '{ \"time\" : \"Created time\" }', 1, 0, '2021-11-03 12:00:00', '2022-11-15 09:59:52'),
(29, 'PURCHASE_CHARGE', 'Image Purchase Charge', 'Charged For Image Purchase', '{{charge_amount}}&nbsp;&nbsp;{{site_currency}} is charged for download a premium image.<div><br></div><div>Image Title :&nbsp;&nbsp;{{image_title}}</div><div>Transaction Number : {{trx}}</div><div><br></div><div>Your post balance is:&nbsp;{{post_balance}}&nbsp;{{site_currency}}</div>', '{{charge_amount}}  {{site_currency}} is charged for download a premium image.\r\n\r\nImage Title :  {{image_title}}\r\nTransaction Number : {{trx}}\r\n\r\nYour post balance is: {{post_balance}} {{site_currency}}', '{ \"image_title\" : \"image title\", \"charge_amount\" : \"charge amount\", \"post_balance\": \"post balance\", \"trx\": \"transaction number\" }', 1, 0, '2021-11-03 12:00:00', '2022-11-16 02:50:02'),
(30, 'DONATION_RECEIVE', 'Donation-Receive', 'Donation Receive', 'Donation received from {{sender_name}}<div>Received : {{amount}} {{site_currency}}</div><div>Transaction Number: {{trx}}\r\n</div>', 'Donation received from {{sender_name}}\r\nReceived : {{amount}} {{site_currency}}\r\nTransaction Number: {{trx}}', '{ \"trx\": \"Transaction number for the donation\", \"amount\": \"Donation amount\", \"method_name\": \"Name of the deposit method\", \"post_balance\": \"Balance after receiving donation\", \"sender_name\": \"Donation sender name\" }', 1, 1, '2021-11-03 12:00:00', '2023-07-26 18:13:05'),
(31, 'DONATION_SENT', 'Donation-Sent', 'Donation Sent', 'Donation sent to {{receiver_name}}&nbsp;<div>Sent amount: {{amount}} {{site_currency}}</div><div>Transaction Number: {{trx}}\r\n</div>', 'Donation sent to {{receiver_name}}\r\nSent amount: {{amount}} {{site_currency}}\r\nTransaction Number: {{trx}}', '{ \"trx\": \"Transaction number for the donation\", \"amount\": \"Donation amount\", \"method_name\": \"Name of the deposit method\", \"receiver_name\": \"Donation sender name\" }', 1, 1, '2021-11-03 12:00:00', '2023-07-26 18:12:46'),
(32, 'DONATION_REJECT', 'Donation - Manual - Rejected', 'Your Donation Request is Rejected', '<div style=\"font-family: Montserrat, sans-serif;\">Your donation request of&nbsp;<span style=\"font-weight: bolder;\">{{amount}} {{site_currency}}</span>&nbsp;is via&nbsp;&nbsp;<span style=\"font-weight: bolder;\">{{method_name}} has been rejected</span>.<span style=\"font-weight: bolder;\"><br></span></div><div><br></div><div style=\"font-family: Montserrat, sans-serif;\">Conversion Rate : 1 {{site_currency}} = {{rate}} {{method_currency}}</div><div style=\"font-family: Montserrat, sans-serif;\">Received : {{method_amount}} {{method_currency}}</div><div style=\"font-family: Montserrat, sans-serif;\">Charge: {{charge}}</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">Transaction Number was : {{trx}}</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\">if you have any queries, feel free to contact us.<br></div><br style=\"font-family: Montserrat, sans-serif;\"><div style=\"font-family: Montserrat, sans-serif;\"><br><br></div><span style=\"color: rgb(33, 37, 41); font-family: Montserrat, sans-serif;\">{{rejection_message}}</span><br>', 'Your donation request of {{amount}} {{site_currency}} is via  {{method_name}} has been rejected.\r\n\r\n{{rejection_message}}', '{\"trx\":\"Transaction number for the deposit\",\"amount\":\"Amount inserted by the user\",\"charge\":\"Gateway charge set by the admin\",\"rate\":\"Conversion rate between base currency and method currency\",\"method_name\":\"Name of the deposit method\",\"method_currency\":\"Currency of the deposit method\",\"method_amount\":\"Amount after conversion between base currency and method currency\",\"rejection_message\":\"Rejection message by the admin\"}', 1, 1, '2021-11-03 12:00:00', '2023-07-25 19:55:59');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `slug` varchar(40) DEFAULT NULL,
  `tempname` varchar(40) DEFAULT NULL COMMENT 'template name',
  `secs` text DEFAULT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `slug`, `tempname`, `secs`, `is_default`, `created_at`, `updated_at`) VALUES
(1, 'HOME', '/', 'templates.basic.', '[\"about\",\"collection\",\"service\",\"cta\",\"contributor\"]', 1, '2020-07-11 06:23:58', '2022-10-10 03:06:18');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(40) DEFAULT NULL,
  `token` varchar(40) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('mohammedshahrukhalam@gmail.com', '506233', '2023-11-19 21:53:09');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `monthly_price` decimal(28,8) DEFAULT 0.00000000,
  `yearly_price` decimal(28,8) DEFAULT 0.00000000,
  `daily_limit` int(11) NOT NULL DEFAULT 0,
  `monthly_limit` int(11) NOT NULL DEFAULT 0,
  `description` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `name`, `title`, `monthly_price`, `yearly_price`, `daily_limit`, `monthly_limit`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Test Plan 1', 'Test Description Test Description Test Description Test Description', NULL, '400.00000000', 15, 500, NULL, '[\"20231123_1050478598.svg\"]', 1, '2023-11-23 02:19:13', '2023-11-23 02:19:13'),
(2, 'Test Plan 2', 'This is a test plan for testing purpose. Click on Buy Button for subscription', NULL, '300.00000000', 20, 500, NULL, '[\"20231123_1537762536.svg\"]', 1, '2023-11-23 02:20:03', '2023-11-23 02:25:53');

-- --------------------------------------------------------

--
-- Table structure for table `plan_purchases`
--

CREATE TABLE `plan_purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `plan_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `daily_limit` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `monthly_limit` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `trx` varchar(40) DEFAULT NULL,
  `amount` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `purchase_date` date DEFAULT NULL,
  `expired_at` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reasons`
--

CREATE TABLE `reasons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `referral_logs`
--

CREATE TABLE `referral_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `referee_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `amount` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT 0,
  `image_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `reason` text DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `reviewer_id` int(10) UNSIGNED DEFAULT 0,
  `admin_id` int(10) UNSIGNED DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviewers`
--

CREATE TABLE `reviewers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `username` varchar(40) DEFAULT NULL,
  `email` varchar(40) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL COMMENT 'contains full address',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0: banned, 1: active',
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviewer_password_resets`
--

CREATE TABLE `reviewer_password_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `social_links`
--

CREATE TABLE `social_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `facebook` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `created_at`, `updated_at`) VALUES
(2, 'golu@gmail.com', '2023-11-08 00:52:29', '2023-11-08 00:52:29');

-- --------------------------------------------------------

--
-- Table structure for table `support_attachments`
--

CREATE TABLE `support_attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `support_message_id` int(10) UNSIGNED DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `support_messages`
--

CREATE TABLE `support_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `support_ticket_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `admin_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `message` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `support_messages`
--

INSERT INTO `support_messages` (`id`, `support_ticket_id`, `admin_id`, `message`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 'pw', '2023-11-06 21:34:08', '2023-11-06 21:34:08'),
(2, 2, 0, 'viser test', '2023-11-06 20:38:13', '2023-11-06 20:38:13'),
(3, 2, 0, 'new chat', '2023-11-06 20:38:51', '2023-11-06 20:38:51'),
(4, 3, 0, 't', '2023-11-07 01:25:18', '2023-11-07 01:25:18'),
(5, 10, 0, 'zvzxv', '2023-11-07 03:33:42', '2023-11-07 03:33:42');

-- --------------------------------------------------------

--
-- Table structure for table `support_tickets`
--

CREATE TABLE `support_tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT 0,
  `name` varchar(40) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone` int(20) DEFAULT NULL,
  `ticket` varchar(40) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: Open, 1: Answered, 2: Replied, 3: Closed',
  `priority` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1 = Low, 2 = medium, 3 = heigh',
  `last_reply` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `support_tickets`
--

INSERT INTO `support_tickets` (`id`, `user_id`, `name`, `email`, `phone`, `ticket`, `subject`, `status`, `priority`, `last_reply`, `created_at`, `updated_at`) VALUES
(1, 0, 'raj', 'asus890raju@gmail.com', NULL, '51867488', 'pw', 0, 2, '2023-11-07 03:04:08', '2023-11-06 21:34:08', '2023-11-06 21:34:08'),
(5, 0, 'rajesh', 'rajesh@gmail.com', 657567, '10485307', 'rajesh', 0, 2, '2023-11-07 08:25:22', '2023-11-07 02:55:22', '2023-11-07 02:55:22'),
(6, 0, 'jhon', 'asus890raju@gmail.com', 74457457, '51370999', '123', 0, 2, '2023-11-07 08:49:15', '2023-11-07 03:19:15', '2023-11-07 03:19:15'),
(7, 0, 'jhon', 'asus890raju@gmail.com', 74457457, '16834055', '123', 0, 2, '2023-11-07 08:49:41', '2023-11-07 03:19:41', '2023-11-07 03:19:41'),
(8, 0, 'jhon', 'asus890raju@gmail.com', 74457457, '46034407', '123', 0, 2, '2023-11-07 08:59:25', '2023-11-07 03:29:25', '2023-11-07 03:29:25'),
(9, 0, 'jhon', 'asus890raju@gmail.com', 74457457, '75993909', '123', 0, 2, '2023-11-07 09:01:48', '2023-11-07 03:31:48', '2023-11-07 03:31:48'),
(10, 0, 'rajesh', 'sda@gmail.com', NULL, '34047507', 'sdfds', 0, 2, '2023-11-07 09:03:42', '2023-11-07 03:33:42', '2023-11-07 03:33:42');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `amount` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `charge` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `post_balance` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `trx_type` varchar(40) DEFAULT NULL,
  `trx` varchar(40) DEFAULT NULL,
  `details` varchar(255) DEFAULT NULL,
  `remark` varchar(40) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `update_logs`
--

CREATE TABLE `update_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(40) DEFAULT NULL,
  `update_log` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(40) DEFAULT NULL,
  `lastname` varchar(40) DEFAULT NULL,
  `username` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `role` int(1) NOT NULL DEFAULT 1 COMMENT '1 = user , 2 = contributor',
  `user_status` varchar(255) DEFAULT NULL,
  `country_code` varchar(40) DEFAULT NULL,
  `mobile` varchar(40) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `ref_by` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `balance` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `cover_photo` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL COMMENT 'contains full address',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0: banned, 1: active',
  `kyc_data` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `kv` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: KYC Unverified, 2: KYC pending, 1: KYC verified',
  `ev` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: email unverified, 1: email verified',
  `sv` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: mobile unverified, 1: mobile verified',
  `profile_complete` tinyint(1) NOT NULL DEFAULT 0,
  `ver_code` varchar(40) DEFAULT NULL COMMENT 'stores verification code',
  `ver_code_send_at` datetime DEFAULT NULL COMMENT 'verification send time',
  `ts` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: 2fa off, 1: 2fa on',
  `tv` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0: 2fa unverified, 1: 2fa verified',
  `tsc` varchar(255) DEFAULT NULL,
  `ban_reason` varchar(255) DEFAULT NULL,
  `is_featured` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `login_by` varchar(40) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `role`, `user_status`, `country_code`, `mobile`, `website`, `ref_by`, `balance`, `password`, `image`, `cover_photo`, `address`, `status`, `kyc_data`, `description`, `kv`, `ev`, `sv`, `profile_complete`, `ver_code`, `ver_code_send_at`, `ts`, `tv`, `tsc`, `ban_reason`, `is_featured`, `login_by`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jhon Doe', NULL, 'jhondoe', 'jhondoe@gmail.com', 2, '1', NULL, '909090909', 'www.jhondoe.com', 0, '0.00000000', '$2y$10$vE/MTe2KWfdjDneTEa1RDer8DHrNAhf1L6w/GLCsAz0Tb9HLQB/aW', NULL, NULL, '{\"country\":\"India\",\"address\":\"L108 , BHB Colony, Baramunda\",\"state\":\"Odish\",\"zip\":\"751003\",\"city\":\"Bhubaneswar\"}', 1, NULL, 'This is test description  This is test description  This is test description  This is test description  This is test description  This is test description  This is test description  This is test description  This is test description  This is test description  This is test description  This is test description  This is test description  This is test description', 1, 1, 1, 1, '123456', NULL, 0, 1, NULL, NULL, 0, NULL, NULL, '2023-11-02 21:05:08', '2023-11-03 02:17:16'),
(2, 'Peter', 'Parker', 'peterparker', 'peter@gmail.com', 1, '1', NULL, '988922', 'www.peterparker.com', 0, '0.00000000', '$2y$10$pUJOg8F5l9FuUAtCJTnv6uWl8MUkP3bg95X30JYF5gjgP1pRP8sbO', NULL, NULL, '{\"country\":\"India\",\"address\":\"L108 , BHB Colony, Baramunda\",\"state\":\"Odish\",\"zip\":\"751003\",\"city\":\"Bhubaneswar\"}', 1, NULL, 'Description Description Description Description', 1, 1, 1, 1, NULL, NULL, 0, 1, NULL, NULL, 0, NULL, NULL, '2023-11-19 18:48:34', '2023-11-19 19:19:17'),
(5, NULL, NULL, 'testtest', 'test@gmail.com', 1, NULL, NULL, NULL, NULL, 0, '0.00000000', '$2y$10$7pytNwqvP0K05lFgyHTdN.B/MymRX.9b5v/lluBACYTjCzxwXfv9C', NULL, NULL, '{\"country\":\"India\",\"address\":\"L108 , BHB Colony, Baramunda\",\"state\":\"Odish\",\"zip\":\"751003\",\"city\":\"Bhubaneswar\"}', 1, NULL, NULL, 1, 1, 1, 0, NULL, NULL, 0, 1, NULL, NULL, 0, NULL, NULL, '2023-11-20 23:28:52', '2023-11-20 23:29:22');

-- --------------------------------------------------------

--
-- Table structure for table `user_logins`
--

CREATE TABLE `user_logins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `user_ip` varchar(40) DEFAULT NULL,
  `city` varchar(40) DEFAULT NULL,
  `country` varchar(40) DEFAULT NULL,
  `country_code` varchar(40) DEFAULT NULL,
  `longitude` varchar(40) DEFAULT NULL,
  `latitude` varchar(40) DEFAULT NULL,
  `browser` varchar(40) DEFAULT NULL,
  `os` varchar(40) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_logins`
--

INSERT INTO `user_logins` (`id`, `user_id`, `user_ip`, `city`, `country`, `country_code`, `longitude`, `latitude`, `browser`, `os`, `created_at`, `updated_at`) VALUES
(1, 1, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-11-07 19:36:03', '2023-11-07 19:36:03'),
(2, 1, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-11-07 19:36:27', '2023-11-07 19:36:27'),
(3, 1, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-11-09 02:42:51', '2023-11-09 02:42:51'),
(4, 1, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-11-14 20:56:44', '2023-11-14 20:56:44'),
(5, 1, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-11-15 21:48:33', '2023-11-15 21:48:33'),
(6, 2, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-11-19 18:48:34', '2023-11-19 18:48:34'),
(7, 3, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-11-19 21:47:18', '2023-11-19 21:47:18'),
(8, 4, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-11-19 21:55:44', '2023-11-19 21:55:44'),
(9, 1, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-11-20 22:13:59', '2023-11-20 22:13:59'),
(10, 1, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-11-20 22:20:54', '2023-11-20 22:20:54'),
(11, 5, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-11-20 23:28:52', '2023-11-20 23:28:52'),
(12, 1, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-11-22 23:34:15', '2023-11-22 23:34:15'),
(13, 1, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-11-22 22:38:36', '2023-11-22 22:38:36'),
(14, 1, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-11-23 00:04:40', '2023-11-23 00:04:40'),
(15, 1, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-11-22 23:06:15', '2023-11-22 23:06:15'),
(16, 1, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-11-23 00:16:02', '2023-11-23 00:16:02'),
(17, 1, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-11-23 00:41:37', '2023-11-23 00:41:37'),
(18, 1, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-11-23 00:42:18', '2023-11-23 00:42:18'),
(19, 1, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-11-22 23:42:45', '2023-11-22 23:42:45'),
(20, 1, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-11-23 00:44:03', '2023-11-23 00:44:03'),
(21, 1, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-11-23 00:54:37', '2023-11-23 00:54:37'),
(22, 1, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-11-23 01:01:16', '2023-11-23 01:01:16'),
(23, 1, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-11-23 01:06:55', '2023-11-23 01:06:55'),
(24, 1, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-11-23 01:27:19', '2023-11-23 01:27:19'),
(25, 1, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-11-23 00:27:30', '2023-11-23 00:27:30'),
(26, 1, '127.0.0.1', '', '', '', '', '', 'Chrome', 'Windows 10', '2023-11-23 01:29:20', '2023-11-23 01:29:20');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawals`
--

CREATE TABLE `withdrawals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `method_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `amount` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `currency` varchar(40) DEFAULT NULL,
  `rate` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `charge` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `trx` varchar(40) DEFAULT NULL,
  `final_amount` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `after_charge` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `withdraw_information` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1=>success, 2=>pending, 3=>cancel,  ',
  `admin_feedback` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_methods`
--

CREATE TABLE `withdraw_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `form_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `name` varchar(40) DEFAULT NULL,
  `min_limit` decimal(28,8) DEFAULT 0.00000000,
  `max_limit` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `fixed_charge` decimal(28,8) DEFAULT 0.00000000,
  `rate` decimal(28,8) DEFAULT 0.00000000,
  `percent_charge` decimal(5,2) DEFAULT NULL,
  `currency` varchar(40) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`,`username`);

--
-- Indexes for table `admin_notifications`
--
ALTER TABLE `admin_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `blog_category`
--
ALTER TABLE `blog_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collection_images`
--
ALTER TABLE `collection_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `earning_logs`
--
ALTER TABLE `earning_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extensions`
--
ALTER TABLE `extensions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `follows`
--
ALTER TABLE `follows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frontends`
--
ALTER TABLE `frontends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gateways`
--
ALTER TABLE `gateways`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `gateway_currencies`
--
ALTER TABLE `gateway_currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_files`
--
ALTER TABLE `image_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_logs`
--
ALTER TABLE `notification_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_templates`
--
ALTER TABLE `notification_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan_purchases`
--
ALTER TABLE `plan_purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reasons`
--
ALTER TABLE `reasons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referral_logs`
--
ALTER TABLE `referral_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviewers`
--
ALTER TABLE `reviewers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reviewers_email_unique` (`email`),
  ADD UNIQUE KEY `reviewers_username_unique` (`username`);

--
-- Indexes for table `reviewer_password_resets`
--
ALTER TABLE `reviewer_password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_links`
--
ALTER TABLE `social_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `support_attachments`
--
ALTER TABLE `support_attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_messages`
--
ALTER TABLE `support_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_tickets`
--
ALTER TABLE `support_tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `update_logs`
--
ALTER TABLE `update_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`,`email`);

--
-- Indexes for table `user_logins`
--
ALTER TABLE `user_logins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraw_methods`
--
ALTER TABLE `withdraw_methods`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_notifications`
--
ALTER TABLE `admin_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `blog_category`
--
ALTER TABLE `blog_category`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `collection_images`
--
ALTER TABLE `collection_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `downloads`
--
ALTER TABLE `downloads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `earning_logs`
--
ALTER TABLE `earning_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `extensions`
--
ALTER TABLE `extensions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `follows`
--
ALTER TABLE `follows`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `frontends`
--
ALTER TABLE `frontends`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `gateways`
--
ALTER TABLE `gateways`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `gateway_currencies`
--
ALTER TABLE `gateway_currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `image_files`
--
ALTER TABLE `image_files`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification_logs`
--
ALTER TABLE `notification_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `notification_templates`
--
ALTER TABLE `notification_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `plan_purchases`
--
ALTER TABLE `plan_purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reasons`
--
ALTER TABLE `reasons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `referral_logs`
--
ALTER TABLE `referral_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviewers`
--
ALTER TABLE `reviewers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviewer_password_resets`
--
ALTER TABLE `reviewer_password_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `social_links`
--
ALTER TABLE `social_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `support_attachments`
--
ALTER TABLE `support_attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `support_messages`
--
ALTER TABLE `support_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `support_tickets`
--
ALTER TABLE `support_tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `update_logs`
--
ALTER TABLE `update_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_logins`
--
ALTER TABLE `user_logins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `withdraw_methods`
--
ALTER TABLE `withdraw_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
