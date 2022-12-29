-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2019 at 10:40 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `step_shop_kopi`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_audit_log`
--

CREATE TABLE `ci_audit_log` (
  `audit_id` int(11) NOT NULL,
  `ip_address` varchar(50) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `time_record` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_audit_log`
--

INSERT INTO `ci_audit_log` (`audit_id`, `ip_address`, `user_id`, `username`, `description`, `time_record`) VALUES
(1, '::1', 1, 'superadmin', 'Register new user [ User ID=10]', '2019-09-08 03:30:57'),
(2, '::1', 8, 'admin', 'Update profile user [ User ID=9]', '2019-09-08 03:35:54'),
(3, '::1', 8, 'admin', 'Update profile user [ User ID=8]', '2019-09-08 03:37:07'),
(4, '::1', 8, 'admin', 'Search report daily transaction record.', '2019-09-08 03:41:52'),
(5, '::1', 8, 'admin', 'Search report vendor daily order', '2019-09-08 03:48:26'),
(6, '::1', 8, 'admin', 'Search daily sales report according vendor', '2019-09-08 03:48:51'),
(7, '::1', 1, 'superadmin', 'Search report client transaction record', '2019-09-08 03:53:00'),
(8, '::1', 8, 'admin', 'Search report daily transaction record [Date:2019-09-04]', '2019-09-08 04:07:34'),
(9, '::1', 8, 'admin', 'Search report daily transaction record <br>[Date:2019-09-04]', '2019-09-08 04:09:08'),
(10, '::1', 8, 'admin', 'Search vendor monthly sales report [Vendor ID:1,Month:08,Year:2019]', '2019-09-08 04:17:11'),
(11, '::1', 8, 'admin', 'Search report client transaction record [User ID:2]', '2019-09-08 04:19:16'),
(12, '::1', 8, 'admin', 'Search report daily transaction record [Date:2019-09-04]', '2019-09-08 04:21:24'),
(13, '::1', 8, 'admin', 'Print report daily transaction record [Date:2019-09-04]', '2019-09-08 04:21:27'),
(14, '::1', 8, 'admin', 'Add new vendor [ Vendor ID=4]', '2019-09-08 04:33:13'),
(15, '::1', 8, 'admin', 'Update vendor [ Vendor ID=4]', '2019-09-08 04:35:15'),
(16, '::1', 8, 'admin', 'Add new category product [ Category ID:3]', '2019-09-08 04:42:13'),
(17, '::1', 8, 'admin', 'Update category product [ Category ID:3]', '2019-09-08 04:42:20'),
(18, '::1', 8, 'admin', 'Add new product [Product ID:8]', '2019-09-08 04:50:31'),
(19, '::1', 8, 'admin', 'Update product [Product ID:1]', '2019-09-08 04:54:24'),
(20, '::1', 8, 'admin', 'Add new product [Product ID:9]', '2019-09-08 04:58:30'),
(21, '::1', 1, 'superadmin', 'Search report daily transaction record [Date:2019-09-04]', '2019-09-08 04:59:47'),
(22, '::1', 8, 'admin', 'Update product [Product ID:1]', '2019-09-08 06:21:35'),
(23, '::1', 1, 'superadmin', 'Add addition product image [Product ID:8,Image Addition ID:1]', '2019-09-08 06:26:54'),
(24, '::1', 1, 'superadmin', 'Delete addition product image [Product ID:8,Image Addition ID:1]', '2019-09-08 06:28:25'),
(25, '::1', 8, 'admin', 'Manage stock product [Inventory ID:49]', '2019-09-08 06:32:45'),
(26, '::1', 8, 'admin', 'Update order status to \"Processing\" [ Order ID:4]', '2019-09-08 06:39:47'),
(27, '::1', 8, 'admin', 'Update order status to \"Shipping out\" [Order ID:4]', '2019-09-08 06:46:24'),
(28, '::1', 8, 'admin', 'Update order status to \"Shipping out\" [Order ID:4]', '2019-09-08 06:46:24'),
(29, '::1', 8, 'admin', 'Update order status to \"Completed\" [Order ID:4]', '2019-09-08 06:50:44'),
(30, '::1', 8, 'admin', 'Print order details [Order ID:4]', '2019-09-08 06:53:10'),
(31, '::1', 1, 'superadmin', 'Update footer', '2019-09-08 07:03:34'),
(32, '::1', 1, 'superadmin', 'Update footer', '2019-09-08 07:04:15'),
(33, '::1', 1, 'superadmin', 'Update link menu', '2019-09-08 07:04:40'),
(34, '::1', 1, 'superadmin', 'Update link menu', '2019-09-08 07:05:12'),
(35, '::1', 8, 'admin', 'Change password [User ID:8]', '2019-09-08 07:22:41'),
(36, '::1', 8, 'admin', 'Update profile user [User ID:8]', '2019-09-08 07:22:41'),
(37, '::1', 8, 'admin', 'Change password [User ID:10]', '2019-09-08 07:26:58'),
(38, '::1', 8, 'admin', 'Update profile user [User ID:10]', '2019-09-08 07:26:58'),
(39, '::1', 8, 'admin', 'User logout', '2019-09-08 07:31:31'),
(40, '::1', 8, 'admin', 'User login', '2019-09-08 07:39:03'),
(41, '::1', 8, 'admin', 'User view Dashboard', '2019-09-08 07:45:30'),
(42, '::1', 8, 'admin', 'User view Dashboard', '2019-09-08 07:45:47'),
(43, '::1', 8, 'admin', 'User view Dashboard', '2019-09-08 07:45:55'),
(44, '::1', 8, 'admin', 'Search report daily transaction record [Date:2019-09-04]', '2019-09-08 07:45:55'),
(45, '::1', 8, 'admin', 'User view Vendors List', '2019-09-08 07:47:50'),
(46, '::1', 1, 'superadmin', 'User logout', '2019-09-08 08:23:52'),
(47, '::1', 8, 'admin', 'User login', '2019-09-08 08:24:51'),
(48, '::1', 8, 'admin', 'User logout', '2019-09-08 08:25:30'),
(49, '::1', 2, 'awie', 'User login', '2019-09-08 08:26:35'),
(50, '::1', 8, 'admin', 'User logout', '2019-09-08 08:27:21'),
(51, '::1', 1, 'superadmin', 'User login', '2019-09-08 08:27:36'),
(52, '::1', 1, 'superadmin', 'Update vendor [Vendor ID:1]', '2019-09-08 08:40:22'),
(53, '::1', 1, 'superadmin', 'User logout', '2019-09-08 09:02:17'),
(54, '::1', 8, 'admin', 'User login', '2019-09-10 01:38:32'),
(55, '::1', 8, 'admin', 'User login', '2019-09-10 01:41:18'),
(56, '::1', 8, 'admin', 'User logout', '2019-09-10 01:56:28'),
(57, '::1', 8, 'admin', 'User login', '2019-09-10 02:02:23'),
(58, '::1', 8, 'admin', 'User logout', '2019-09-10 02:03:12'),
(59, '::1', 8, 'admin', 'User login', '2019-09-10 02:05:03'),
(60, '::1', 8, 'admin', 'User logout', '2019-09-10 02:06:15'),
(61, '::1', 8, 'admin', 'User login', '2019-09-10 02:06:41'),
(62, '::1', 8, 'admin', 'User login', '2019-09-10 02:11:49'),
(63, '::1', 8, 'admin', 'User logout', '2019-09-10 02:11:53'),
(64, '::1', 8, 'admin', 'User login', '2019-09-10 02:12:11'),
(65, '::1', 8, 'admin', 'User logout', '2019-09-10 02:12:27'),
(66, '::1', 8, 'admin', 'User login', '2019-09-10 02:13:40'),
(67, '::1', 2, 'awie', 'User logout', '2019-09-10 02:23:35'),
(68, '::1', 8, 'admin', 'User login', '2019-09-10 02:24:34'),
(69, '::1', 8, 'admin', 'User logout', '2019-09-10 02:24:50'),
(70, '::1', 8, 'admin', 'User login', '2019-09-10 02:26:52'),
(71, '::1', 8, 'admin', 'User logout', '2019-09-10 02:27:12'),
(72, '::1', 8, 'admin', 'User login', '2019-09-10 02:28:24'),
(73, '::1', 8, 'admin', 'User logout', '2019-09-10 02:28:58'),
(74, '::1', 8, 'admin', 'User login', '2019-09-10 02:29:29'),
(75, '::1', 8, 'admin', 'User logout', '2019-09-10 02:30:33'),
(76, '::1', 2, 'awie', 'User logout', '2019-09-10 02:31:09'),
(77, '::1', 8, 'admin', 'User login', '2019-09-10 02:32:52'),
(78, '::1', 8, 'admin', 'User logout', '2019-09-10 02:33:02'),
(79, '::1', 8, 'admin', 'User login', '2019-09-10 04:23:55'),
(80, '::1', 8, 'admin', 'Update order status to \"Processing\" [Order ID:3]', '2019-09-10 06:21:22'),
(81, '::1', 8, 'admin', 'User logout', '2019-09-10 07:48:34'),
(82, '::1', 1, 'superadmin', 'User login', '2019-09-10 07:48:50'),
(83, '::1', 1, 'superadmin', 'Update category product [Category ID:2]', '2019-09-10 07:52:26'),
(84, '::1', 1, 'superadmin', 'User login', '2019-09-11 04:28:44'),
(85, '::1', 1, 'superadmin', 'User logout', '2019-09-11 04:34:41'),
(86, '::1', 8, 'admin', 'User login', '2019-09-11 04:34:54'),
(87, '::1', 8, 'admin', 'User logout', '2019-09-11 04:48:42'),
(88, '::1', 8, 'admin', 'User login', '2019-09-26 03:15:48'),
(89, '::1', 8, 'admin', 'User logout', '2019-09-26 03:18:30'),
(90, '::1', 8, 'admin', 'User login', '2019-10-01 07:38:13'),
(91, '::1', 8, 'admin', 'User logout', '2019-10-01 07:38:30'),
(92, '::1', 8, 'admin', 'User login', '2019-10-01 08:55:30'),
(93, '::1', 8, 'admin', 'User login', '2019-10-02 01:09:06'),
(94, '::1', 8, 'admin', 'User logout', '2019-10-02 04:44:44'),
(95, '::1', 2, 'awie', 'User logout', '2019-10-02 06:42:13'),
(96, '::1', 8, 'admin', 'User login', '2019-10-02 06:53:02'),
(97, '::1', 8, 'admin', 'User logout', '2019-10-02 06:53:12'),
(98, '::1', 2, 'awie', 'User logout', '2019-10-02 06:54:05'),
(99, '::1', 2, 'awie', 'User logout', '2019-10-02 08:27:00'),
(100, '::1', 2, 'awie', 'Add new product [Product ID:10]', '2019-10-02 08:45:51'),
(101, '::1', 2, 'awie', 'Manage stock product [Inventory ID:55]', '2019-10-02 09:00:29'),
(102, '::1', 2, 'awie', 'Update product [Product ID:10]', '2019-10-02 09:12:41'),
(103, '::1', 2, 'awie', 'Add addition product image [Product ID:10,Image Addition ID:2]', '2019-10-02 09:13:07'),
(104, '::1', 2, 'awie', 'Add new product [Product ID:11]', '2019-10-02 09:14:27'),
(105, '::1', 2, 'awie', 'Manage stock product [Inventory ID:57]', '2019-10-02 09:14:48'),
(106, '::1', 8, 'admin', 'User login', '2019-10-03 03:02:27'),
(107, '::1', 2, 'awie', 'User logout', '2019-10-03 07:48:50'),
(108, '::1', 11, 'z', 'Add new product [Product ID:12]', '2019-10-03 08:50:14'),
(109, '::1', 11, 'z', 'Manage stock product [Inventory ID:59]', '2019-10-03 08:50:28'),
(110, '::1', 11, 'z', 'Update product [Product ID:12]', '2019-10-03 08:57:20'),
(111, '::1', 8, 'admin', 'Add new product [Product ID:13]', '2019-10-03 09:01:05'),
(112, '::1', 8, 'admin', 'Manage stock product [Inventory ID:61]', '2019-10-03 09:01:34'),
(113, '::1', 8, 'admin', 'User login', '2019-10-06 03:22:12'),
(114, '::1', 8, 'admin', 'Manage stock product [Inventory ID:62]', '2019-10-06 04:03:21'),
(115, '::1', 8, 'admin', 'Update product [Product ID:10]', '2019-10-06 04:36:55'),
(116, '::1', 8, 'admin', 'Update product [Product ID:10]', '2019-10-06 04:37:29'),
(117, '::1', 8, 'admin', 'Add new product [Product ID:14]', '2019-10-06 04:54:45'),
(118, '::1', 8, 'admin', 'Manage stock product [Inventory ID:64]', '2019-10-06 04:55:10'),
(119, '::1', 8, 'admin', 'User logout', '2019-10-06 06:47:59'),
(120, '::1', 11, 'z', 'Update order status to \"Processing\" [Order ID:7]', '2019-10-06 07:19:18'),
(121, '::1', 11, 'z', 'Update order status to \"Shipping out\" [Order ID:7]', '2019-10-06 07:19:43'),
(122, '::1', 11, 'z', 'Update order status to \"Completed\" [Order ID:7]', '2019-10-06 07:19:56'),
(123, '::1', 11, 'z', 'Search report daily transaction record [Date:2019-10-06]', '2019-10-06 07:20:59'),
(124, '::1', 11, 'z', 'Search vendors list report', '2019-10-06 07:32:48'),
(125, '::1', 11, 'z', 'Search clients list report', '2019-10-06 07:33:30'),
(126, '::1', 2, 'awie', 'User logout', '2019-10-06 07:35:53'),
(127, '::1', 8, 'admin', 'User login', '2019-10-06 07:36:53'),
(128, '::1', 11, 'z', 'User logout', '2019-10-06 07:38:07'),
(129, '::1', 8, 'admin', 'Register new user [User ID:13]', '2019-10-06 07:54:45'),
(130, '::1', 8, 'admin', 'User logout', '2019-10-06 07:56:04'),
(131, '::1', 8, 'admin', 'User login', '2019-10-06 08:16:07'),
(132, '::1', 8, 'admin', 'User logout', '2019-10-06 08:16:35'),
(133, '::1', 1, 'superadmin', 'User login', '2019-10-06 08:16:58'),
(134, '::1', 1, 'superadmin', 'Search report daily transaction record [Date:2019-10-06]', '2019-10-06 08:33:13'),
(135, '::1', 8, 'admin', 'User login', '2019-10-07 02:21:42'),
(136, '::1', 8, 'admin', 'User logout', '2019-10-07 02:50:26'),
(137, '::1', 8, 'admin', 'User login', '2019-10-07 02:53:12'),
(138, '::1', 12, 'm', 'Add new product [Product ID:15]', '2019-10-07 03:06:19'),
(139, '::1', 12, 'm', 'Manage stock product [Inventory ID:68]', '2019-10-07 03:06:39'),
(140, '::1', 12, 'm', 'User logout', '2019-10-07 03:07:00'),
(141, '::1', 8, 'admin', 'User login', '2019-10-08 01:55:40'),
(142, '::1', 8, 'admin', 'User login', '2019-10-08 04:33:51'),
(143, '::1', 8, 'admin', 'User login', '2019-10-13 02:24:31'),
(144, '::1', 8, 'admin', 'Update order status to \"Processing\" [Order ID:10]', '2019-10-13 02:36:06'),
(145, '::1', 12, 'm', 'User logout', '2019-10-13 04:22:05'),
(146, '::1', 11, 'z', 'User logout', '2019-10-13 04:27:27'),
(147, '::1', 11, 'z', 'User logout', '2019-10-13 04:27:51'),
(148, '::1', 11, 'z', 'User logout', '2019-10-13 07:28:56'),
(149, '::1', 8, 'admin', 'Update order status to \"Processing\" [Order ID:17]', '2019-10-13 07:42:04'),
(150, '::1', 8, 'admin', 'Update order status to \"Processing\" [Order ID:17]', '2019-10-13 07:43:25'),
(151, '::1', 8, 'admin', 'Update order status to \"Processing\" [Order ID:17]', '2019-10-13 07:45:01'),
(152, '::1', 8, 'admin', 'Update order status to \"Processing\" [Order ID:18]', '2019-10-13 08:19:46'),
(153, '::1', 8, 'admin', 'Update order status to \"Shipping out\" [Order ID:17]', '2019-10-13 09:01:03'),
(154, '::1', 8, 'admin', 'User login', '2019-10-14 01:55:36'),
(155, '::1', 8, 'admin', 'Print order details [Order ID:17]', '2019-10-14 02:02:11'),
(156, '::1', 8, 'admin', 'Update order status to \"Completed\" [Order ID:17]', '2019-10-14 02:10:24'),
(157, '::1', 8, 'admin', 'Update order status to \"Completed\" [Order ID:17]', '2019-10-14 02:37:23'),
(158, '::1', 8, 'admin', 'Print order details [Order ID:18]', '2019-10-14 02:57:15'),
(159, '::1', 8, 'admin', 'Print order details [Order ID:17]', '2019-10-14 02:58:14'),
(160, '::1', 8, 'admin', 'Print order details [Order ID:17]', '2019-10-14 03:06:15'),
(161, '::1', 8, 'admin', 'Print order details [Order ID:17]', '2019-10-14 03:07:18'),
(162, '::1', 8, 'admin', 'Print order details [Order ID:18]', '2019-10-14 03:07:49'),
(163, '::1', 8, 'admin', 'Update order status to \"Shipping out\" [Order ID:18]', '2019-10-14 03:09:10'),
(164, '::1', 8, 'admin', 'Update order status to \"Processing\" [Order ID:18]', '2019-10-14 03:12:44'),
(165, '::1', 8, 'admin', 'Update order status to \"Shipping out\" [Order ID:18]', '2019-10-14 03:13:07'),
(166, '::1', 8, 'admin', 'Print order details [Order ID:18]', '2019-10-14 03:15:54'),
(167, '::1', 8, 'admin', 'User logout', '2019-10-14 03:27:15'),
(168, '::1', 8, 'admin', 'User logout', '2019-10-14 03:27:22'),
(169, '::1', 11, 'z', 'Update order status to \"Processing\" [Order ID:19]', '2019-10-14 03:48:12'),
(170, '::1', 11, 'z', 'Update order status to \"Shipping out\" [Order ID:19]', '2019-10-14 03:48:48'),
(171, '::1', 11, 'z', 'Print order details [Order ID:19]', '2019-10-14 03:49:05'),
(172, '::1', 11, 'z', 'Update order status to \"Completed\" [Order ID:19]', '2019-10-14 03:49:26'),
(173, '::1', 11, 'z', 'User logout', '2019-10-14 04:42:13'),
(174, '::1', 11, 'z', 'User logout', '2019-10-14 04:45:29'),
(175, '::1', 11, 'z', 'User logout', '2019-10-14 07:09:27'),
(176, '::1', 8, 'admin', 'User login', '2019-10-14 07:57:22'),
(177, '::1', 8, 'admin', 'User login', '2019-10-15 01:04:47'),
(178, '::1', 8, 'admin', 'Search report daily transaction record [Date:2019-10-14]', '2019-10-15 01:12:54'),
(179, '::1', 11, 'z', 'User logout', '2019-10-15 01:15:27'),
(180, '::1', 11, 'z', 'User logout', '2019-10-15 01:21:52'),
(181, '::1', 11, 'z', 'Update order status to \"Processing\" [Order ID:22]', '2019-10-15 02:05:37'),
(182, '::1', 11, 'z', 'Update order status to \"Shipping out\" [Order ID:22]', '2019-10-15 02:05:58'),
(183, '::1', 11, 'z', 'Update order status to \"Completed\" [Order ID:22]', '2019-10-15 02:06:13'),
(184, '::1', 8, 'admin', 'Search report daily transaction record [Date:2019-10-14]', '2019-10-15 02:06:50'),
(185, '::1', 8, 'admin', 'Search report daily transaction record [Date:2019-10-15]', '2019-10-15 02:07:00'),
(186, '::1', 8, 'admin', 'Search report daily transaction record [Date:2019-10-15]', '2019-10-15 02:22:37'),
(187, '::1', 8, 'admin', 'Search report daily transaction record [Date:2019-10-15]', '2019-10-15 02:24:42'),
(188, '::1', 8, 'admin', 'Search report daily transaction record [Date:2019-10-15]', '2019-10-15 02:25:55'),
(189, '::1', 8, 'admin', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-15 02:34:43'),
(190, '::1', 8, 'admin', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-15 02:43:37'),
(191, '::1', 8, 'admin', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-15 02:45:57'),
(192, '::1', 8, 'admin', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-15 02:46:30'),
(193, '::1', 8, 'admin', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-15 03:07:55'),
(194, '::1', 8, 'admin', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-15 03:08:33'),
(195, '::1', 8, 'admin', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-15 03:09:30'),
(196, '::1', 8, 'admin', 'Search report daily transaction record [Date:2019-10-15]', '2019-10-15 03:09:49'),
(197, '::1', 8, 'admin', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-15 03:10:01'),
(198, '::1', 8, 'admin', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-15 03:11:08'),
(199, '::1', 8, 'admin', 'Search report daily transaction record [Date:2019-10-15]', '2019-10-15 03:11:22'),
(200, '::1', 8, 'admin', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-15 03:11:31'),
(201, '::1', 8, 'admin', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-15 03:11:46'),
(202, '::1', 8, 'admin', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-15 03:12:30'),
(203, '::1', 8, 'admin', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-15 03:13:39'),
(204, '::1', 8, 'admin', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-15 03:14:45'),
(205, '::1', 8, 'admin', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-15 03:15:45'),
(206, '::1', 8, 'admin', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-15 03:17:09'),
(207, '::1', 8, 'admin', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-15 03:17:58'),
(208, '::1', 8, 'admin', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-15 03:18:29'),
(209, '::1', 8, 'admin', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-15 03:19:13'),
(210, '::1', 8, 'admin', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-15 03:19:30'),
(211, '::1', 8, 'admin', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-15 03:19:58'),
(212, '::1', 8, 'admin', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-15 03:20:29'),
(213, '::1', 8, 'admin', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-15 03:20:44'),
(214, '::1', 8, 'admin', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-15 03:21:18'),
(215, '::1', 8, 'admin', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-15 03:22:20'),
(216, '::1', 8, 'admin', 'Search report daily transaction record [Date:2019-10-12]', '2019-10-15 03:25:24'),
(217, '::1', 8, 'admin', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-15 03:26:24'),
(218, '::1', 8, 'admin', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-15 03:27:02'),
(219, '::1', 8, 'admin', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-15 03:27:44'),
(220, '::1', 8, 'admin', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-15 03:28:38'),
(221, '::1', 8, 'admin', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-15 03:28:54'),
(222, '::1', 8, 'admin', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-15 03:29:47'),
(223, '::1', 8, 'admin', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-15 03:30:38'),
(224, '::1', 8, 'admin', 'Update order status to \"Processing\" [Order ID:22]', '2019-10-15 03:32:31'),
(225, '::1', 8, 'admin', 'Update order status to \"Shipping out\" [Order ID:22]', '2019-10-15 03:32:48'),
(226, '::1', 8, 'admin', 'Update order status to \"Completed\" [Order ID:22]', '2019-10-15 03:33:00'),
(227, '::1', 8, 'admin', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-15 03:33:13'),
(228, '::1', 8, 'admin', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-15 03:34:10'),
(229, '::1', 8, 'admin', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-15 03:35:24'),
(230, '::1', 8, 'admin', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-15 03:36:44'),
(231, '::1', 8, 'admin', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-15 03:37:32'),
(232, '::1', 8, 'admin', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-15 03:38:43'),
(233, '::1', 8, 'admin', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-15 03:40:04'),
(234, '::1', 8, 'admin', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-15 03:40:43'),
(235, '::1', 8, 'admin', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-15 03:41:24'),
(236, '::1', 8, 'admin', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-15 03:42:27'),
(237, '::1', 8, 'admin', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-15 03:43:33'),
(238, '::1', 11, 'z', 'User logout', '2019-10-15 03:48:28'),
(239, '::1', 8, 'admin', 'Update order status to \"Processing\" [Order ID:23]', '2019-10-15 03:52:36'),
(240, '::1', 8, 'admin', 'Update order status to \"Shipping out\" [Order ID:23]', '2019-10-15 03:53:25'),
(241, '::1', 8, 'admin', 'Update order status to \"Completed\" [Order ID:23]', '2019-10-15 03:53:44'),
(242, '::1', 8, 'admin', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-15 03:54:13'),
(243, '::1', 8, 'admin', 'Search report daily transaction record [Date:2019-10-15]', '2019-10-15 03:54:25'),
(244, '::1', 8, 'admin', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-15 03:56:18'),
(245, '::1', 8, 'admin', 'Search daily sales report according vendor [Date:2019-10-15]', '2019-10-15 04:11:39'),
(246, '::1', 8, 'admin', 'Update product [Product ID:10]', '2019-10-15 04:31:46'),
(247, '::1', 8, 'admin', 'Update order status to \"Processing\" [Order ID:24]', '2019-10-15 05:29:28'),
(248, '::1', 8, 'admin', 'Update order status to \"Shipping out\" [Order ID:24]', '2019-10-15 05:29:44'),
(249, '::1', 8, 'admin', 'Update order status to \"Completed\" [Order ID:24]', '2019-10-15 05:29:57'),
(250, '::1', 8, 'admin', 'Update product [Product ID:12]', '2019-10-15 05:38:51'),
(251, '::1', 8, 'admin', 'Update product [Product ID:15]', '2019-10-15 05:40:10'),
(252, '::1', 8, 'admin', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-15 05:41:54'),
(253, '::1', 8, 'admin', 'Search daily sales report according vendor [Date:2019-10-15]', '2019-10-15 05:42:32'),
(254, '::1', 8, 'admin', 'Print daily sales report according vendor [Date:2019-10-15]', '2019-10-15 05:42:44'),
(255, '::1', 8, 'admin', 'Print daily sales report according vendor [Date:2019-10-15]', '2019-10-15 06:04:27'),
(256, '::1', 8, 'admin', 'Print daily sales report according vendor [Date:2019-10-15]', '2019-10-15 06:05:58'),
(257, '::1', 8, 'admin', 'Print daily sales report according vendor [Date:2019-10-15]', '2019-10-15 06:06:11'),
(258, '::1', 8, 'admin', 'Print daily sales report according vendor [Date:2019-10-15]', '2019-10-15 06:06:25'),
(259, '::1', 8, 'admin', 'Print daily sales report according vendor [Date:2019-10-15]', '2019-10-15 06:08:03'),
(260, '::1', 8, 'admin', 'Print daily sales report according vendor [Date:2019-10-15]', '2019-10-15 06:08:22'),
(261, '::1', 8, 'admin', 'Search report daily transaction record [Date:2019-10-15]', '2019-10-15 06:09:01'),
(262, '::1', 8, 'admin', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-15 06:09:09'),
(263, '::1', 8, 'admin', 'Search daily sales report according vendor [Date:2019-10-15]', '2019-10-15 06:09:17'),
(264, '::1', 8, 'admin', 'Print daily sales report according vendor [Date:2019-10-15]', '2019-10-15 06:10:52'),
(265, '::1', 8, 'admin', 'Print daily sales report according vendor [Date:2019-10-15]', '2019-10-15 06:12:00'),
(266, '::1', 8, 'admin', 'Print daily sales report according vendor [Date:2019-10-15]', '2019-10-15 06:12:16'),
(267, '::1', 8, 'admin', 'Print daily sales report according vendor [Date:2019-10-15]', '2019-10-15 06:12:28'),
(268, '::1', 8, 'admin', 'Print daily sales report according vendor [Date:2019-10-15]', '2019-10-15 06:14:27'),
(269, '::1', 8, 'admin', 'Print daily sales report according vendor [Date:2019-10-15]', '2019-10-15 06:14:50'),
(270, '::1', 8, 'admin', 'Print daily sales report according vendor [Date:2019-10-15]', '2019-10-15 06:15:06'),
(271, '::1', 8, 'admin', 'Print daily sales report according vendor [Date:2019-10-15]', '2019-10-15 06:18:14'),
(272, '::1', 8, 'admin', 'Print daily sales report according vendor [Date:2019-10-15]', '2019-10-15 06:19:02'),
(273, '::1', 8, 'admin', 'Print daily sales report according vendor [Date:2019-10-15]', '2019-10-15 06:20:26'),
(274, '::1', 8, 'admin', 'Print daily sales report according vendor [Date:2019-10-15]', '2019-10-15 06:20:59'),
(275, '::1', 8, 'admin', 'Print daily sales report according vendor [Date:2019-10-15]', '2019-10-15 06:25:14'),
(276, '::1', 8, 'admin', 'Print daily sales report according vendor [Date:2019-10-15]', '2019-10-15 06:25:47'),
(277, '::1', 8, 'admin', 'Print daily sales report according vendor [Date:2019-10-15]', '2019-10-15 06:26:13'),
(278, '::1', 8, 'admin', 'Print daily sales report according vendor [Date:2019-10-15]', '2019-10-15 06:27:24'),
(279, '::1', 8, 'admin', 'Print daily sales report according vendor [Date:2019-10-15]', '2019-10-15 06:27:40'),
(280, '::1', 8, 'admin', 'Print daily sales report according vendor [Date:2019-10-15]', '2019-10-15 06:43:09'),
(281, '::1', 8, 'admin', 'Print daily sales report according vendor [Date:2019-10-15]', '2019-10-15 06:43:58'),
(282, '::1', 8, 'admin', 'Search report vendor daily order [Seller ID:1,Date:2019-10-15]', '2019-10-15 06:54:52'),
(283, '::1', 8, 'admin', 'Search report vendor daily order [Seller ID:1,Date:2019-10-15]', '2019-10-15 06:59:08'),
(284, '::1', 8, 'admin', 'Search report vendor daily order [Seller ID:1,Date:2019-10-15]', '2019-10-15 07:00:51'),
(285, '::1', 8, 'admin', 'Search report vendor daily order [Seller ID:1,Date:2019-10-15]', '2019-10-15 07:01:17'),
(286, '::1', 8, 'admin', 'Search report vendor daily order [Seller ID:1,Date:2019-10-15]', '2019-10-15 07:02:12'),
(287, '::1', 8, 'admin', 'Search report vendor daily order [Seller ID:1,Date:2019-10-15]', '2019-10-15 07:02:36'),
(288, '::1', 8, 'admin', 'Search report vendor daily order [Seller ID:1,Date:2019-10-15]', '2019-10-15 07:03:10'),
(289, '::1', 8, 'admin', 'Search report daily transaction record [Date:2019-10-15]', '2019-10-15 07:04:50'),
(290, '::1', 8, 'admin', 'Search daily sales report according vendor [Date:2019-10-15]', '2019-10-15 07:05:11'),
(291, '::1', 8, 'admin', 'Search report vendor daily order [Seller ID:2,Date:2019-10-15]', '2019-10-15 07:05:32'),
(292, '::1', 8, 'admin', 'Print report vendor daily order [Vendor ID:2,Date:2019-10-15]', '2019-10-15 07:06:21'),
(293, '::1', 8, 'admin', 'Print report vendor daily order [Vendor ID:2,Date:2019-10-15]', '2019-10-15 07:15:24'),
(294, '::1', 8, 'admin', 'Print report vendor daily order [Vendor ID:2,Date:2019-10-15]', '2019-10-15 07:15:33'),
(295, '::1', 8, 'admin', 'Print report vendor daily order [Vendor ID:2,Date:2019-10-15]', '2019-10-15 07:19:30'),
(296, '::1', 8, 'admin', 'Print report vendor daily order [Vendor ID:2,Date:2019-10-15]', '2019-10-15 07:20:22'),
(297, '::1', 8, 'admin', 'Print report vendor daily order [Vendor ID:2,Date:2019-10-15]', '2019-10-15 07:20:32'),
(298, '::1', 8, 'admin', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-15 07:20:42'),
(299, '::1', 8, 'admin', 'Search report vendor daily order [Seller ID:1,Date:2019-10-15]', '2019-10-15 07:21:07'),
(300, '::1', 8, 'admin', 'Print report vendor daily order [Vendor ID:1,Date:2019-10-15]', '2019-10-15 07:21:50'),
(301, '::1', 8, 'admin', 'Print report vendor daily order [Vendor ID:1,Date:2019-10-15]', '2019-10-15 07:22:05'),
(302, '::1', 8, 'admin', 'Print report vendor daily order [Seller ID:1,Date:2019-10-15]', '2019-10-15 07:24:54'),
(303, '::1', 8, 'admin', 'Search report product type daily order [Category ID:1,Date:2019-10-15]', '2019-10-15 07:37:37'),
(304, '::1', 8, 'admin', 'Search report product type daily order [Category ID:1,Date:2019-10-15]', '2019-10-15 07:38:05'),
(305, '::1', 8, 'admin', 'Search report product type daily order [Category ID:1,Date:2019-10-15]', '2019-10-15 07:39:01'),
(306, '::1', 8, 'admin', 'Print report product type daily order [Category ID:1,Date:2019-10-15]', '2019-10-15 07:39:28'),
(307, '::1', 8, 'admin', 'Print report product type daily order [Category ID:1,Date:2019-10-15]', '2019-10-15 07:43:53'),
(308, '::1', 8, 'admin', 'Search report product type daily order [Category ID:3,Date:2019-10-15]', '2019-10-15 07:44:37'),
(309, '::1', 8, 'admin', 'Search report product type daily order [Category ID:1,Date:2019-10-15]', '2019-10-15 07:44:54'),
(310, '::1', 8, 'admin', 'Search report product type daily order [Category ID:2,Date:2019-10-15]', '2019-10-15 07:45:28'),
(311, '::1', 8, 'admin', 'Print report product type daily order [Category ID:2,Date:2019-10-15]', '2019-10-15 07:45:42'),
(312, '::1', 8, 'admin', 'Search monthly sales report [Month:10,Year:2019]', '2019-10-15 08:03:06'),
(313, '::1', 8, 'admin', 'Search monthly sales report [Month:10,Year:2019]', '2019-10-15 08:07:04'),
(314, '::1', 8, 'admin', 'Search monthly sales report [Month:10,Year:2019]', '2019-10-15 08:07:36'),
(315, '::1', 8, 'admin', 'Search monthly sales report [Month:10,Year:2019]', '2019-10-15 08:12:41'),
(316, '::1', 8, 'admin', 'Print monthly sales report [Month:10,Year:2019]', '2019-10-15 08:13:28'),
(317, '::1', 8, 'admin', 'Print monthly sales report [Month:10,Year:2019]', '2019-10-15 08:20:13'),
(318, '::1', 8, 'admin', 'Print monthly sales report [Month:10,Year:2019]', '2019-10-15 08:22:09'),
(319, '::1', 8, 'admin', 'Print monthly sales report [Month:10,Year:2019]', '2019-10-15 08:22:34'),
(320, '::1', 8, 'admin', 'Print monthly sales report [Month:10,Year:2019]', '2019-10-15 08:23:41'),
(321, '::1', 8, 'admin', 'Print monthly sales report [Month:10,Year:2019]', '2019-10-15 08:24:10'),
(322, '::1', 8, 'admin', 'Print monthly sales report [Month:10,Year:2019]', '2019-10-15 08:24:20'),
(323, '::1', 8, 'admin', 'Print monthly sales report [Month:10,Year:2019]', '2019-10-15 08:24:41'),
(324, '::1', 8, 'admin', 'Print monthly sales report [Month:10,Year:2019]', '2019-10-15 08:25:12'),
(325, '::1', 8, 'admin', 'Print monthly sales report [Month:10,Year:2019]', '2019-10-15 08:25:53'),
(326, '::1', 8, 'admin', 'Print monthly sales report [Month:10,Year:2019]', '2019-10-15 08:26:22'),
(327, '::1', 8, 'admin', 'Print monthly sales report [Month:10,Year:2019]', '2019-10-15 08:27:43'),
(328, '::1', 8, 'admin', 'Print monthly sales report [Month:10,Year:2019]', '2019-10-15 08:29:34'),
(329, '::1', 8, 'admin', 'Print monthly sales report [Month:10,Year:2019]', '2019-10-15 08:30:02'),
(330, '::1', 8, 'admin', 'Print monthly sales report [Month:10,Year:2019]', '2019-10-15 08:31:35'),
(331, '::1', 8, 'admin', 'Print monthly sales report [Month:10,Year:2019]', '2019-10-15 08:32:06'),
(332, '::1', 8, 'admin', 'Print monthly sales report [Month:10,Year:2019]', '2019-10-15 08:33:33'),
(333, '::1', 8, 'admin', 'Print monthly sales report [Month:10,Year:2019]', '2019-10-15 08:34:11'),
(334, '::1', 8, 'admin', 'Print monthly sales report [Month:10,Year:2019]', '2019-10-15 08:34:26'),
(335, '::1', 8, 'admin', 'Print monthly sales report [Month:10,Year:2019]', '2019-10-15 08:35:01'),
(336, '::1', 8, 'admin', 'Print monthly sales report [Month:10,Year:2019]', '2019-10-15 08:35:38'),
(337, '::1', 2, 'awie', 'Update order status to \"Processing\" [Order ID:25]', '2019-10-15 08:53:10'),
(338, '::1', 2, 'awie', 'Update order status to \"Shipping out\" [Order ID:25]', '2019-10-15 08:53:33'),
(339, '::1', 2, 'awie', 'Update order status to \"Completed\" [Order ID:25]', '2019-10-15 08:53:49'),
(340, '::1', 11, 'z', 'Update profile user [User ID:11]', '2019-10-16 01:09:55'),
(341, '::1', 8, 'admin', 'User login', '2019-10-16 01:11:44'),
(342, '::1', 8, 'admin', 'Search monthly sales report [Month:10,Year:2019]', '2019-10-16 01:12:18'),
(343, '::1', 8, 'admin', 'Print monthly sales report [Month:10,Year:2019]', '2019-10-16 01:12:27'),
(344, '::1', 8, 'admin', 'Search seller monthly sales report [Seller ID:1,Month:10,Year:2019]', '2019-10-16 01:25:31'),
(345, '::1', 8, 'admin', 'Search seller monthly sales report [Seller ID:1,Month:10,Year:2019]', '2019-10-16 01:27:12'),
(346, '::1', 8, 'admin', 'Search seller monthly sales report [Seller ID:1,Month:10,Year:2019]', '2019-10-16 01:28:44'),
(347, '::1', 8, 'admin', 'Print seller monthly sales report [Seller ID:1,Month:10,Year:2019]', '2019-10-16 01:29:19'),
(348, '::1', 8, 'admin', 'Print seller monthly sales report [Seller ID:1,Month:10,Year:2019]', '2019-10-16 01:32:05'),
(349, '::1', 8, 'admin', 'Search vendors list report', '2019-10-16 01:44:06'),
(350, '::1', 8, 'admin', 'Search sellers list report', '2019-10-16 01:45:36'),
(351, '::1', 8, 'admin', 'Print vendors list report', '2019-10-16 01:45:53'),
(352, '::1', 8, 'admin', 'Print vendors list report', '2019-10-16 01:48:17'),
(353, '::1', 8, 'admin', 'Search seller product list report [Seller ID:1]', '2019-10-16 01:53:18'),
(354, '::1', 8, 'admin', 'Print seller product list report [Seller ID:1]', '2019-10-16 01:54:29'),
(355, '::1', 8, 'admin', 'Search clients list report', '2019-10-16 01:55:41'),
(356, '::1', 8, 'admin', 'Search report client transaction record [User ID:2]', '2019-10-16 01:58:22'),
(357, '::1', 8, 'admin', 'Search report client transaction record [User ID:2]', '2019-10-16 02:01:39'),
(358, '::1', 8, 'admin', 'Search report client transaction record [User ID:11]', '2019-10-16 02:02:14'),
(359, '::1', 8, 'admin', 'Search report client transaction record [User ID:12]', '2019-10-16 02:02:26'),
(360, '::1', 8, 'admin', 'Print report client transaction record [User ID:12]', '2019-10-16 02:03:08'),
(361, '::1', 8, 'admin', 'Print report client transaction record [User ID:12]', '2019-10-16 02:05:23'),
(362, '::1', 11, 'z', 'Search report daily transaction record [Date:2019-10-15]', '2019-10-16 02:14:52'),
(363, '::1', 11, 'z', 'Search report daily transaction record [Date:2019-10-15]', '2019-10-16 02:23:27'),
(364, '::1', 8, 'admin', 'Search report daily transaction record [Date:2019-10-15]', '2019-10-16 02:23:41'),
(365, '::1', 11, 'z', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-16 02:29:48'),
(366, '::1', 11, 'z', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-16 02:30:47'),
(367, '::1', 8, 'admin', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-16 02:30:58'),
(368, '::1', 8, 'admin', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-16 02:31:29'),
(369, '::1', 11, 'z', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-16 02:31:41'),
(370, '127.0.0.1', 11, 'z', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-16 02:31:49'),
(371, '::1', 11, 'z', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-16 02:31:53'),
(372, '::1', 8, 'admin', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-16 02:33:30'),
(373, '::1', 11, 'z', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-16 02:34:08'),
(374, '::1', 11, 'z', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-16 02:36:05'),
(375, '::1', 8, 'admin', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-16 02:36:08'),
(376, '::1', 11, 'z', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-16 02:38:00'),
(377, '::1', 8, 'admin', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-16 02:38:14'),
(378, '::1', 8, 'admin', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-16 02:38:30'),
(379, '::1', 11, 'z', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-16 02:38:32'),
(380, '::1', 11, 'z', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-16 02:41:31'),
(381, '::1', 11, 'z', 'Print report daily transaction record [Date:2019-10-15]', '2019-10-16 02:42:39'),
(382, '::1', 11, 'z', 'Search report product type daily order [Category ID:1,Date:2019-10-15]', '2019-10-16 03:37:39'),
(383, '::1', 11, 'z', 'Search report product type daily order [Category ID:1,Date:2019-10-15]', '2019-10-16 03:39:48'),
(384, '::1', 11, 'z', 'Print report product type daily order [Category ID:1,Date:2019-10-15]', '2019-10-16 03:41:48'),
(385, '127.0.0.1', 11, 'z', 'Print report product type daily order [Category ID:1,Date:2019-10-15]', '2019-10-16 03:41:57'),
(386, '::1', 11, 'z', 'Print report product type daily order [Category ID:1,Date:2019-10-15]', '2019-10-16 03:42:02'),
(387, '::1', 11, 'z', 'Search monthly sales report [Month:10,Year:2019]', '2019-10-16 03:48:47'),
(388, '::1', 11, 'z', 'Search monthly sales report [Month:10,Year:2019]', '2019-10-16 03:51:42'),
(389, '::1', 11, 'z', 'Print monthly sales report [Month:10,Year:2019]', '2019-10-16 03:53:00'),
(390, '127.0.0.1', 11, 'z', 'Print monthly sales report [Month:10,Year:2019]', '2019-10-16 03:53:05'),
(391, '::1', 11, 'z', 'Print monthly sales report [Month:10,Year:2019]', '2019-10-16 03:53:10'),
(392, '::1', 11, 'z', 'Print monthly sales report [Month:10,Year:2019]', '2019-10-16 03:59:24'),
(393, '::1', 11, 'z', 'Print monthly sales report [Month:10,Year:2019]', '2019-10-16 04:02:19'),
(394, '::1', 8, 'admin', 'Search monthly sales report [Month:10,Year:2019]', '2019-10-16 04:03:10'),
(395, '::1', 11, 'z', 'Search report client transaction record [User ID:2]', '2019-10-16 04:08:05'),
(396, '::1', 8, 'admin', 'Search report client transaction record [User ID:2]', '2019-10-16 04:09:40'),
(397, '::1', 11, 'z', 'Print report client transaction record [User ID:2]', '2019-10-16 04:09:53'),
(398, '127.0.0.1', 11, 'z', 'Print report client transaction record [User ID:2]', '2019-10-16 04:09:58'),
(399, '::1', 11, 'z', 'Print report client transaction record [User ID:2]', '2019-10-16 04:10:03'),
(400, '::1', 11, 'z', 'Search report daily transaction record [Date:2019-10-15]', '2019-10-16 04:26:20'),
(401, '::1', 8, 'admin', 'User logout', '2019-10-16 08:47:57'),
(402, '::1', 8, 'admin', 'User logout', '2019-10-16 08:48:02'),
(403, '::1', 11, 'z', 'User logout', '2019-10-16 08:48:06'),
(404, '::1', 8, 'admin', 'User login', '2019-10-16 08:48:23'),
(405, '::1', 8, 'admin', 'User login', '2019-10-17 01:23:34'),
(406, '::1', 8, 'admin', 'Update order status to \"Processing\" [Order ID:29]', '2019-10-17 02:32:04'),
(407, '::1', 8, 'admin', 'Update order status to \"Shipping out\" [Order ID:29]', '2019-10-17 04:28:05'),
(408, '::1', 8, 'admin', 'User login', '2019-10-18 10:23:31'),
(409, '::1', 8, 'admin', 'Update order status to \"Processing\" [Order ID:30]', '2019-10-18 10:40:59'),
(410, '::1', 8, 'admin', 'Update order status to \"Shipping out\" [Order ID:30]', '2019-10-18 10:41:11'),
(411, '::1', 8, 'admin', 'Update order status to \"Completed\" [Order ID:30]', '2019-10-18 10:41:16'),
(412, '::1', 8, 'admin', 'Print order details [Order ID:30]', '2019-10-18 10:42:00'),
(413, '::1', 8, 'admin', 'Print order details [Order ID:30]', '2019-10-18 10:43:36'),
(414, '::1', 8, 'admin', 'Print order details [Order ID:30]', '2019-10-18 10:44:37'),
(415, '::1', 8, 'admin', 'Update profile user [User ID:11]', '2019-10-18 10:46:29'),
(416, '::1', 8, 'admin', 'Search report daily transaction record [Date:2019-10-18]', '2019-10-18 10:47:30'),
(417, '::1', 8, 'admin', 'Search report daily transaction record [Date:2019-10-18]', '2019-10-18 10:47:43'),
(418, '::1', 8, 'admin', 'Search daily sales report according seller [Date:2019-10-18]', '2019-10-18 10:47:57'),
(419, '::1', 8, 'admin', 'Search report daily transaction record [Date:2019-10-17]', '2019-10-18 10:52:49'),
(420, '::1', 8, 'admin', 'Print report daily transaction record [Date:2019-10-17]', '2019-10-18 10:52:56'),
(421, '::1', 8, 'admin', 'Search daily sales report according seller [Date:2019-10-17]', '2019-10-18 10:53:06'),
(422, '::1', 8, 'admin', 'Search report seller daily order [Seller ID:2,Date:2019-10-17]', '2019-10-18 10:53:19'),
(423, '::1', 8, 'admin', 'Search report product type daily order [Category ID:1,Date:2019-10-17]', '2019-10-18 10:53:29'),
(424, '::1', 8, 'admin', 'Search monthly sales report [Month:10,Year:2019]', '2019-10-18 10:53:37'),
(425, '::1', 8, 'admin', 'Search seller monthly sales report [Seller ID:2,Month:10,Year:2019]', '2019-10-18 10:53:49'),
(426, '::1', 8, 'admin', 'Search seller product list report [Seller ID:2]', '2019-10-18 10:53:56'),
(427, '::1', 8, 'admin', 'Search clients list report', '2019-10-18 10:54:02'),
(428, '::1', 8, 'admin', 'Search report client transaction record [User ID:2]', '2019-10-18 10:54:14'),
(429, '::1', 8, 'admin', 'User login', '2019-10-20 01:31:43'),
(430, '::1', 8, 'admin', 'Print order details [Order ID:30]', '2019-10-20 01:35:19'),
(431, '::1', 8, 'admin', 'Print order details [Order ID:30]', '2019-10-20 01:35:26'),
(432, '127.0.0.1', 8, 'admin', 'Print order details [Order ID:30]', '2019-10-20 01:35:28'),
(433, '::1', 8, 'admin', 'User logout', '2019-10-20 01:36:14'),
(434, '::1', 8, 'admin', 'User login', '2019-10-20 01:51:34'),
(435, '::1', 11, 'z', 'Update order status to \"Processing\" [Order ID:33]', '2019-10-20 04:16:48'),
(436, '::1', 11, 'z', 'Update order status to \"Shipping out\" [Order ID:33]', '2019-10-20 04:17:03'),
(437, '::1', 8, 'admin', 'User login', '2019-10-20 06:18:49'),
(438, '::1', 8, 'admin', 'Search report daily transaction record [Date:2019-10-20]', '2019-10-20 06:19:25'),
(439, '::1', 8, 'admin', 'User login', '2019-10-21 01:15:53'),
(440, '::1', 8, 'admin', 'Update order status to \"Processing\" [Order ID:36]', '2019-10-21 02:07:33'),
(441, '::1', 8, 'admin', 'Print order details [Order ID:36]', '2019-10-21 02:07:37'),
(442, '::1', 8, 'admin', 'Print order details [Order ID:36]', '2019-10-21 02:07:45'),
(443, '127.0.0.1', 8, 'admin', 'Print order details [Order ID:36]', '2019-10-21 02:07:47'),
(444, '::1', 8, 'admin', 'Print order details [Order ID:36]', '2019-10-21 02:16:32'),
(445, '::1', 8, 'admin', 'Print order details [Order ID:36]', '2019-10-21 02:18:37'),
(446, '127.0.0.1', 8, 'admin', 'Print order details [Order ID:36]', '2019-10-21 02:18:39'),
(447, '::1', 8, 'admin', 'Print order details [Order ID:36]', '2019-10-21 02:18:40'),
(448, '::1', 8, 'admin', 'Update order status to \"Processing\" [Order ID:36]', '2019-10-21 02:19:04'),
(449, '::1', 8, 'admin', 'Print order details [Order ID:36]', '2019-10-21 02:19:08'),
(450, '127.0.0.1', 8, 'admin', 'Print order details [Order ID:36]', '2019-10-21 02:19:09'),
(451, '::1', 8, 'admin', 'Print order details [Order ID:36]', '2019-10-21 02:19:10'),
(452, '::1', 8, 'admin', 'User login', '2019-10-21 08:24:24'),
(453, '::1', 11, 'z', 'Print order details [Order ID:36]', '2019-10-21 08:26:31');

-- --------------------------------------------------------

--
-- Table structure for table `ci_banner`
--

CREATE TABLE `ci_banner` (
  `banner_id` int(11) NOT NULL,
  `file_name` varchar(200) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_banner`
--

INSERT INTO `ci_banner` (`banner_id`, `file_name`, `title`, `description`) VALUES
(4, '7724aafc8f7cd70ba7cba46c11460be4.jpg', NULL, NULL),
(5, 'a3fbd4b96428255ec8170dadff220cb5.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ci_billing`
--

CREATE TABLE `ci_billing` (
  `billing_id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `bill_name` varchar(100) NOT NULL,
  `bill_email` varchar(200) NOT NULL,
  `bill_phone` varchar(20) NOT NULL,
  `bill_address` text NOT NULL,
  `bill_default` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ci_category`
--

CREATE TABLE `ci_category` (
  `category_id` int(11) NOT NULL,
  `category_type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_category`
--

INSERT INTO `ci_category` (`category_id`, `category_type`) VALUES
(1, 'Type A'),
(2, 'TYPE BBB'),
(3, 'TYPE CC');

-- --------------------------------------------------------

--
-- Table structure for table `ci_check_login`
--

CREATE TABLE `ci_check_login` (
  `id` int(11) NOT NULL,
  `login` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ci_footer`
--

CREATE TABLE `ci_footer` (
  `footer_id` int(11) NOT NULL,
  `site_description` text DEFAULT NULL,
  `facebook` varchar(150) DEFAULT NULL,
  `instagram` varchar(150) DEFAULT NULL,
  `twitter` varchar(150) DEFAULT NULL,
  `pinterest` varchar(150) DEFAULT NULL,
  `about_us` varchar(150) DEFAULT NULL,
  `shipping_return` varchar(150) DEFAULT NULL,
  `shipping_guide` varchar(150) DEFAULT NULL,
  `faq` varchar(150) DEFAULT NULL,
  `stay_connected` text DEFAULT NULL,
  `why_us` varchar(200) DEFAULT NULL,
  `contact_us` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_footer`
--

INSERT INTO `ci_footer` (`footer_id`, `site_description`, `facebook`, `instagram`, `twitter`, `pinterest`, `about_us`, `shipping_return`, `shipping_guide`, `faq`, `stay_connected`, `why_us`, `contact_us`) VALUES
(2, '7seasons goldsilver are sellers all type of gold & silver with most competitive prices in today’s real-time international market place.', '', '', '', '', 'https://coffee-fastlane.com', '', '', '', 'Gold-Fastlane’s corporate office is in London, UK with regional operations in Malaysia, Dubai, Thailand, Cambodia, India and Indonesia.', 'https://coffee-fastlane.com', 'https://coffee-fastlane.com');

-- --------------------------------------------------------

--
-- Table structure for table `ci_groups`
--

CREATE TABLE `ci_groups` (
  `id` int(11) NOT NULL,
  `group_role` int(11) DEFAULT NULL COMMENT '1 = Kgt, 2 = Wakalah',
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ci_images`
--

CREATE TABLE `ci_images` (
  `image_id` int(11) NOT NULL,
  `site_url` varchar(124) DEFAULT NULL,
  `file_name` varchar(124) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_images`
--

INSERT INTO `ci_images` (`image_id`, `site_url`, `file_name`, `status`) VALUES
(1, NULL, '8e73a3d02719d2031ed35c0630153c49.jpg', 0),
(2, NULL, '7b24d507b104782f6d93ed14c5ccb452.jpg', 0),
(3, NULL, '45c43352405dbb5aa25c3b37304d800a.jpg', 0),
(4, NULL, '62be6ad9fc8714cc9cb5c7c2d3936b41.jpg', 0),
(5, NULL, '2d18ec0a863d4d9d0259be5851e8c33a.jpg', 0),
(6, NULL, '71b179bb4d9da4f958a26b08d892a711.jpeg', 0),
(7, NULL, '56dd6d3476ba8bca43df0b2a58435154.jpg', 0),
(8, NULL, 'bafc1fd3d07ad6a2d043668de6ce73f4.jpg', 0),
(9, NULL, 'aa582a332931468a50314163260371aa.jpg', 0),
(10, NULL, '7df7dbf75770a71c18cecc4c49d20216.jpg', 0),
(11, NULL, 'da76d36919a8a32ad05cbf0e3c625f93.jpg', 0),
(12, NULL, '897b9517c7fcd13803888ca006a86cd4.jpg', 0),
(13, NULL, '12a9d655f18dd06ff9897556d1deff2e.jpg', 0),
(14, NULL, 'cc29eea3d8f68f0833fbd36cc1624065.jpg', 0),
(15, NULL, 'ee28a4420ba2d18f4bf1ce3914a24e2c.jpg', 0),
(16, NULL, '2d10e9652ae036f055a1b90e88a811d1.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ci_image_addition`
--

CREATE TABLE `ci_image_addition` (
  `image_add_id` int(11) NOT NULL,
  `image_add_file` varchar(200) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_image_addition`
--

INSERT INTO `ci_image_addition` (`image_add_id`, `image_add_file`, `product_id`) VALUES
(2, '594740d824653dfc8dd4934b35f64bad.jpg', 10);

-- --------------------------------------------------------

--
-- Table structure for table `ci_inventory`
--

CREATE TABLE `ci_inventory` (
  `inventory_id` int(11) NOT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `product_id` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `owner_type` varchar(16) NOT NULL COMMENT 'kgt, company,wakalah,customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_inventory`
--

INSERT INTO `ci_inventory` (`inventory_id`, `owner_id`, `created_date`, `product_id`, `qty`, `owner_type`) VALUES
(3, 1, '2019-07-23 20:08:33', 1, 1000, 'company'),
(11, 1, '2019-07-23 22:57:24', 2, 100, 'company'),
(13, 2, '2019-07-23 23:03:17', 3, 100, 'company'),
(34, 3, '2019-08-26 07:49:31', 4, NULL, 'company'),
(35, 3, '2019-08-26 07:49:39', 4, 20, 'company'),
(36, 1, '2019-08-26 07:56:58', 5, NULL, 'company'),
(37, 1, '2019-08-26 07:57:08', 5, 20, 'company'),
(38, 2, '2019-08-26 07:58:34', 6, NULL, 'company'),
(39, 2, '2019-08-26 07:58:43', 6, 20, 'company'),
(40, 3, '2019-08-26 08:00:32', 7, NULL, 'company'),
(41, 3, '2019-08-26 08:00:40', 7, 20, 'company'),
(42, 2, '2019-09-04 04:46:33', 2, 1, 'customer'),
(43, 1, '2019-09-04 04:46:33', 2, -1, 'company'),
(44, 2, '2019-09-04 07:45:50', 5, 1, 'customer'),
(45, 1, '2019-09-04 07:45:50', 5, -1, 'company'),
(46, 4, '2019-09-08 04:50:31', 8, NULL, 'company'),
(47, 4, '2019-09-08 04:51:10', 8, 11, 'company'),
(49, 4, '2019-09-08 06:32:45', 8, 1, 'company'),
(50, 2, '2019-09-08 06:39:47', 2, 1, 'customer'),
(51, 1, '2019-09-08 06:39:47', 2, -1, 'company'),
(52, 2, '2019-09-10 06:21:22', 3, 1, 'customer'),
(53, 2, '2019-09-10 06:21:22', 3, -1, 'company'),
(54, NULL, '2019-10-02 08:45:50', 10, NULL, 'company'),
(55, 1, '2019-10-02 09:00:29', 10, 100, 'company'),
(56, NULL, '2019-10-02 09:14:27', 11, NULL, 'company'),
(57, 1, '2019-10-02 09:14:48', 11, 100, 'company'),
(58, NULL, '2019-10-03 08:50:13', 12, NULL, 'company'),
(59, 2, '2019-10-03 08:50:28', 12, 100, 'company'),
(60, NULL, '2019-10-03 09:01:05', 13, NULL, 'company'),
(61, NULL, '2019-10-03 09:01:34', 13, 100, 'company'),
(62, NULL, '2019-10-06 04:03:21', 10, 1, 'company'),
(63, NULL, '2019-10-06 04:54:45', 14, NULL, 'company'),
(64, NULL, '2019-10-06 04:55:10', 14, 50, 'company'),
(65, 2, '2019-10-06 07:19:17', 12, 2, 'customer'),
(66, NULL, '2019-10-06 07:19:17', 12, -2, 'company'),
(67, NULL, '2019-10-07 03:06:19', 15, NULL, 'company'),
(68, 3, '2019-10-07 03:06:39', 15, 100, 'company'),
(69, 2, '2019-10-13 02:36:06', 12, 1, 'customer'),
(70, NULL, '2019-10-13 02:36:06', 12, -1, 'company'),
(71, 2, '2019-10-13 02:36:06', 13, 1, 'customer'),
(72, NULL, '2019-10-13 02:36:06', 13, -1, 'company'),
(73, 2, '2019-10-13 02:36:06', 15, 1, 'customer'),
(74, NULL, '2019-10-13 02:36:06', 15, -1, 'company'),
(75, 2, '2019-10-13 07:42:03', 13, 1, 'customer'),
(76, 2, '2019-10-13 07:42:03', 13, -1, 'company'),
(77, 2, '2019-10-13 07:42:03', 15, 1, 'customer'),
(78, 3, '2019-10-13 07:42:03', 15, -1, 'company'),
(79, 2, '2019-10-13 07:42:04', 12, 1, 'customer'),
(80, 2, '2019-10-13 07:42:04', 12, -1, 'company'),
(81, 2, '2019-10-13 07:43:25', 13, 1, 'customer'),
(82, 2, '2019-10-13 07:43:25', 13, -1, 'company'),
(83, 2, '2019-10-13 07:43:25', 15, 1, 'customer'),
(84, 3, '2019-10-13 07:43:25', 15, -1, 'company'),
(85, 2, '2019-10-13 07:43:25', 12, 1, 'customer'),
(86, 2, '2019-10-13 07:43:25', 12, -1, 'company'),
(87, 2, '2019-10-13 07:45:01', 13, 1, 'customer'),
(88, 2, '2019-10-13 07:45:01', 13, -1, 'company'),
(89, 2, '2019-10-13 07:45:01', 15, 1, 'customer'),
(90, 3, '2019-10-13 07:45:01', 15, -1, 'company'),
(91, 2, '2019-10-13 07:45:01', 12, 1, 'customer'),
(92, 2, '2019-10-13 07:45:01', 12, -1, 'company'),
(93, 2, '2019-10-13 08:19:45', 12, 2, 'customer'),
(94, 2, '2019-10-13 08:19:45', 12, -2, 'company'),
(95, 2, '2019-10-13 08:19:45', 15, 1, 'customer'),
(96, 3, '2019-10-13 08:19:45', 15, -1, 'company'),
(97, 2, '2019-10-14 03:12:43', 15, 1, 'customer'),
(98, 3, '2019-10-14 03:12:43', 15, -1, 'company'),
(99, 2, '2019-10-14 03:12:44', 12, 2, 'customer'),
(100, 2, '2019-10-14 03:12:44', 12, -2, 'company'),
(101, 2, '2019-10-14 03:48:11', 15, 1, 'customer'),
(102, 3, '2019-10-14 03:48:11', 15, -1, 'company'),
(103, 2, '2019-10-14 03:48:11', 12, 2, 'customer'),
(104, 2, '2019-10-14 03:48:11', 12, -2, 'company'),
(105, 2, '2019-10-15 02:05:37', 15, 1, 'customer'),
(106, 3, '2019-10-15 02:05:37', 15, -1, 'company'),
(107, 2, '2019-10-15 02:05:37', 13, 1, 'customer'),
(108, 2, '2019-10-15 02:05:37', 13, -1, 'company'),
(109, 2, '2019-10-15 02:05:37', 12, 1, 'customer'),
(110, 2, '2019-10-15 02:05:37', 12, -1, 'company'),
(111, 2, '2019-10-15 03:32:31', 15, 1, 'customer'),
(112, 3, '2019-10-15 03:32:31', 15, -1, 'company'),
(113, 2, '2019-10-15 03:32:31', 13, 1, 'customer'),
(114, 2, '2019-10-15 03:32:31', 13, -1, 'company'),
(115, 2, '2019-10-15 03:32:31', 12, 1, 'customer'),
(116, 2, '2019-10-15 03:32:31', 12, -1, 'company'),
(117, 12, '2019-10-15 03:52:36', 14, 2, 'customer'),
(118, 1, '2019-10-15 03:52:36', 14, -2, 'company'),
(119, 12, '2019-10-15 05:29:27', 10, 1, 'customer'),
(120, 1, '2019-10-15 05:29:28', 10, -1, 'company'),
(121, 11, '2019-10-15 08:53:10', 15, 1, 'customer'),
(122, 3, '2019-10-15 08:53:10', 15, -1, 'company'),
(123, 11, '2019-10-15 08:53:10', 14, 1, 'customer'),
(124, 1, '2019-10-15 08:53:10', 14, -1, 'company'),
(125, 2, '2019-10-17 02:32:04', 15, 1, 'customer'),
(126, 3, '2019-10-17 02:32:04', 15, -1, 'company'),
(127, 2, '2019-10-17 02:32:04', 13, 1, 'customer'),
(128, 2, '2019-10-17 02:32:04', 13, -1, 'company'),
(129, 2, '2019-10-17 02:32:04', 12, 2, 'customer'),
(130, 2, '2019-10-17 02:32:04', 12, -2, 'company'),
(131, 2, '2019-10-18 10:40:59', 12, 1, 'customer'),
(132, 2, '2019-10-18 10:40:59', 12, -1, 'company'),
(133, 2, '2019-10-20 04:16:47', 15, 1, 'customer'),
(134, 3, '2019-10-20 04:16:47', 15, -1, 'company'),
(135, 2, '2019-10-20 04:16:47', 13, 1, 'customer'),
(136, 2, '2019-10-20 04:16:48', 13, -1, 'company'),
(137, 2, '2019-10-21 02:07:32', 15, 1, 'customer'),
(138, 3, '2019-10-21 02:07:32', 15, -1, 'company'),
(139, 2, '2019-10-21 02:07:32', 13, 1, 'customer'),
(140, 2, '2019-10-21 02:07:32', 13, -1, 'company'),
(141, 2, '2019-10-21 02:07:32', 12, 1, 'customer'),
(142, 2, '2019-10-21 02:07:33', 12, -1, 'company'),
(143, 2, '2019-10-21 02:19:04', 15, 1, 'customer'),
(144, 3, '2019-10-21 02:19:04', 15, -1, 'company'),
(145, 2, '2019-10-21 02:19:04', 13, 1, 'customer'),
(146, 2, '2019-10-21 02:19:04', 13, -1, 'company'),
(147, 2, '2019-10-21 02:19:04', 12, 1, 'customer'),
(148, 2, '2019-10-21 02:19:04', 12, -1, 'company');

-- --------------------------------------------------------

--
-- Table structure for table `ci_logo`
--

CREATE TABLE `ci_logo` (
  `logo_id` int(11) NOT NULL,
  `image_file` varchar(200) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_logo`
--

INSERT INTO `ci_logo` (`logo_id`, `image_file`, `status`) VALUES
(1, '7df93dcdea3f56b7bbefc0f7f3f8442b.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ci_newslatter`
--

CREATE TABLE `ci_newslatter` (
  `newslatter_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_newslatter`
--

INSERT INTO `ci_newslatter` (`newslatter_id`, `email`) VALUES
(1, 'asd@asa');

-- --------------------------------------------------------

--
-- Table structure for table `ci_orders`
--

CREATE TABLE `ci_orders` (
  `order_id` int(11) NOT NULL,
  `created_by` int(11) UNSIGNED NOT NULL COMMENT 'User which create order',
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `total_weight` decimal(10,5) NOT NULL,
  `total_all` decimal(7,2) DEFAULT NULL,
  `delivery_status` int(11) DEFAULT NULL COMMENT '1 = Accepted',
  `type` int(11) DEFAULT NULL COMMENT '1=pesanan',
  `expired` int(2) NOT NULL,
  `opt` int(2) NOT NULL,
  `weightcost_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_orders`
--

INSERT INTO `ci_orders` (`order_id`, `created_by`, `created_date`, `total_weight`, `total_all`, `delivery_status`, `type`, `expired`, `opt`, `weightcost_id`) VALUES
(34, 2, '2019-10-20 07:33:05', '400.00000', '32.00', NULL, 1, 0, 0, 1),
(36, 2, '2019-10-20 08:33:13', '420.00000', '39.06', NULL, 1, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ci_order_items`
--

CREATE TABLE `ci_order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `ordered_price` decimal(15,2) NOT NULL,
  `modal_price` decimal(15,2) DEFAULT NULL,
  `discount_by_kgt` decimal(15,10) DEFAULT NULL COMMENT 'Pot. utk belian balik',
  `unit_price` decimal(15,2) DEFAULT NULL,
  `tax_price` decimal(15,2) DEFAULT NULL,
  `ship_price` decimal(15,2) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` decimal(15,2) NOT NULL,
  `gold_assayer` varchar(200) DEFAULT NULL,
  `updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_order_items`
--

INSERT INTO `ci_order_items` (`id`, `order_id`, `product_id`, `seller_id`, `ordered_price`, `modal_price`, `discount_by_kgt`, `unit_price`, `tax_price`, `ship_price`, `qty`, `subtotal`, `gold_assayer`, `updated`) VALUES
(69, 34, 13, 2, '20.00', '20.00', NULL, '20.00', '0.00', '0.00', 1, '20.00', NULL, '2019-10-20 07:33:05'),
(70, 34, 15, 3, '12.00', '10.00', NULL, '10.00', '1.00', '1.00', 1, '12.00', NULL, '2019-10-20 07:33:05'),
(73, 36, 13, 2, '20.00', '20.00', NULL, '20.00', '0.00', '0.00', 1, '20.00', NULL, '2019-10-20 08:33:14'),
(74, 36, 15, 3, '12.00', '10.00', NULL, '10.00', '1.00', '1.00', 1, '12.00', NULL, '2019-10-20 08:33:14'),
(75, 36, 12, 2, '7.06', '5.00', NULL, '6.00', '0.06', '1.00', 1, '7.06', NULL, '2019-10-20 08:33:14');

-- --------------------------------------------------------

--
-- Table structure for table `ci_order_status`
--

CREATE TABLE `ci_order_status` (
  `order_status_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_order_status`
--

INSERT INTO `ci_order_status` (`order_status_id`, `seller_id`, `order_id`, `order_status`) VALUES
(39, 2, 34, 5),
(40, 3, 34, 5),
(43, 2, 36, 2),
(44, 3, 36, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ci_payment`
--

CREATE TABLE `ci_payment` (
  `payment_id` int(11) NOT NULL,
  `payment_date` datetime DEFAULT NULL,
  `order_id` int(11) NOT NULL,
  `payment_type` varchar(60) NOT NULL COMMENT 'Bank Transfer, DDompet',
  `reference_note` varchar(256) DEFAULT NULL,
  `payment_amount` decimal(15,10) DEFAULT NULL,
  `verification_note` text DEFAULT NULL,
  `att_file` varchar(255) DEFAULT NULL,
  `recorded_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_payment`
--

INSERT INTO `ci_payment` (`payment_id`, `payment_date`, `order_id`, `payment_type`, `reference_note`, `payment_amount`, `verification_note`, `att_file`, `recorded_date`) VALUES
(29, NULL, 34, 'Cash Deposit', 'BANK ISLAM', NULL, NULL, 'fbc3b8bea09a28d659b44a8e4287f836.jpg', '2019-10-20 08:06:54'),
(31, NULL, 36, 'Cash Deposit', 'BANK ISLAM', NULL, NULL, '0d1417bc3bd802753342f7bd874f79a9.jpg', '2019-10-20 08:36:46');

-- --------------------------------------------------------

--
-- Table structure for table `ci_production`
--

CREATE TABLE `ci_production` (
  `production_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `weight` decimal(15,4) NOT NULL,
  `size` varchar(150) DEFAULT NULL,
  `add_cost` decimal(10,2) DEFAULT NULL,
  `shipping` decimal(10,2) DEFAULT NULL,
  `tax` decimal(10,2) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Production cost';

--
-- Dumping data for table `ci_production`
--

INSERT INTO `ci_production` (`production_id`, `product_id`, `category_id`, `weight`, `size`, `add_cost`, `shipping`, `tax`, `description`) VALUES
(10, 10, 2, '200.0000', '-', '12.00', '1.00', '0.02', '-'),
(11, 11, 1, '200.0000', '-', '10.00', '0.00', '0.00', '-'),
(12, 12, 1, '20.0000', '-', '6.00', '1.00', '0.01', '-'),
(13, 13, 2, '200.0000', '-', '20.00', '0.00', '0.00', '-'),
(14, 14, 1, '200.0000', '-', '5.00', '0.00', '0.00', '-'),
(15, 15, 1, '200.0000', '0', '10.00', '1.00', '0.10', '-');

-- --------------------------------------------------------

--
-- Table structure for table `ci_products`
--

CREATE TABLE `ci_products` (
  `product_id` int(11) NOT NULL,
  `item_code` varchar(60) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_code` varchar(60) DEFAULT NULL,
  `product_price` decimal(15,2) DEFAULT NULL COMMENT 'Harga modal',
  `seller_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_products`
--

INSERT INTO `ci_products` (`product_id`, `item_code`, `product_name`, `product_code`, `product_price`, `seller_id`, `status`, `created_date`) VALUES
(10, 'GENERAL', 'KATSU COFFEE SPECIAL', NULL, '10.00', 1, 1, '2019-10-15 04:31:46'),
(11, 'GENERAL', 'AFRESH KOPI', NULL, '10.00', 1, 1, '2019-10-02 09:14:27'),
(12, 'GENERAL', 'CAFE MOCHA', NULL, '5.00', 2, 1, '2019-10-15 05:38:51'),
(13, 'GENERAL', 'GREEN COFFEE', NULL, '20.00', 2, 1, '2019-10-03 09:01:05'),
(14, 'GENERAL', 'COFFEE PREMIX REGULAR', NULL, '5.00', 1, 1, '2019-10-06 04:54:44'),
(15, 'GENERAL', 'MUSETTI COFFEE', NULL, '10.00', 3, 1, '2019-10-15 05:40:10');

-- --------------------------------------------------------

--
-- Table structure for table `ci_product_images`
--

CREATE TABLE `ci_product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_product_images`
--

INSERT INTO `ci_product_images` (`id`, `product_id`, `image_id`) VALUES
(11, 10, 11),
(12, 11, 12),
(13, 12, 13),
(14, 13, 14),
(15, 14, 15),
(16, 15, 16);

-- --------------------------------------------------------

--
-- Table structure for table `ci_seller`
--

CREATE TABLE `ci_seller` (
  `seller_id` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `shop_name` varchar(200) DEFAULT NULL,
  `seller_type` varchar(200) DEFAULT NULL,
  `seller_bank` varchar(200) DEFAULT NULL,
  `seller_account` varchar(200) DEFAULT NULL,
  `seller_status` int(2) NOT NULL,
  `seller_verify` int(2) NOT NULL,
  `shop_image` varchar(200) DEFAULT NULL,
  `seller_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_seller`
--

INSERT INTO `ci_seller` (`seller_id`, `user_id`, `shop_name`, `seller_type`, `seller_bank`, `seller_account`, `seller_status`, `seller_verify`, `shop_image`, `seller_created`) VALUES
(1, 2, 'V Shop', 'Personal', NULL, NULL, 1, 1, NULL, '2019-10-03 02:09:35'),
(2, 11, 'Z Shop', 'Personal', 'MAYBANK', '3121231312312', 1, 1, '142f8794dfd8d5b72cf907353da779b5.png', '2019-10-03 02:52:35'),
(3, 12, 'M Shop', 'Personal', NULL, NULL, 1, 1, NULL, '2019-10-07 02:44:51');

-- --------------------------------------------------------

--
-- Table structure for table `ci_serial_no`
--

CREATE TABLE `ci_serial_no` (
  `record_id` int(11) NOT NULL,
  `serial_no` varchar(20) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(255) NOT NULL,
  `owner_id` int(11) DEFAULT NULL COMMENT 'user_id',
  `owner` varchar(16) NOT NULL COMMENT 'customer, company',
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_serial_no`
--

INSERT INTO `ci_serial_no` (`record_id`, `serial_no`, `product_id`, `order_id`, `owner_id`, `owner`, `created_date`) VALUES
(32, '23123', 13, 36, 2, 'customer', '2019-10-21 02:07:32'),
(33, '12312', 12, 36, 2, 'customer', '2019-10-21 02:07:32'),
(34, '211211', 15, 36, 2, 'customer', '2019-10-21 02:19:03');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `ai` bigint(20) UNSIGNED NOT NULL,
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Sessions table';

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`ai`, `id`, `ip_address`, `timestamp`, `data`) VALUES
(0, '8rae15q60jhijj7u9hisqrfbjff3nner', '::1', 1571210074, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313231303037343b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31363a22736164617364407961686f6f2e636f6d223b757365725f69647c733a313a2238223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731313031343837223b6c6173745f636865636b7c693a313537313138383330343b757365725f67726f75707c733a313a2231223b),
(0, '57bv5kdq0i59j1afeevcbn74h1v6f46n', '::1', 1571209369, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313230393336393b6964656e746974797c733a313a227a223b757365726e616d657c733a313a227a223b656d61696c7c733a32353a226861736e61776968617368696d343640676d61696c2e636f6d223b757365725f69647c733a323a223131223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731313239323734223b6c6173745f636865636b7c693a313537313138383133323b757365725f67726f75707c733a313a2232223b69647c733a323a223131223b),
(0, 'iuhj8tnsdr2ieruvbufksh9favncb717', '::1', 1571210006, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313231303030363b6964656e746974797c733a313a227a223b757365726e616d657c733a313a227a223b656d61696c7c733a32353a226861736e61776968617368696d343640676d61696c2e636f6d223b757365725f69647c733a323a223131223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731313239323734223b6c6173745f636865636b7c693a313537313138383133323b757365725f67726f75707c733a313a2232223b69647c733a323a223131223b),
(0, 'k075d1erarg7pulhej0sth2q4gipe74a', '::1', 1571210439, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313231303433393b6964656e746974797c733a313a227a223b757365726e616d657c733a313a227a223b656d61696c7c733a32353a226861736e61776968617368696d343640676d61696c2e636f6d223b757365725f69647c733a323a223131223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731313239323734223b6c6173745f636865636b7c693a313537313138383133323b757365725f67726f75707c733a313a2232223b69647c733a323a223131223b),
(0, '4gjur9etedvksi3jbv3q24fhdhb9ff9t', '::1', 1571210437, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313231303433373b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31363a22736164617364407961686f6f2e636f6d223b757365725f69647c733a313a2238223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731313031343837223b6c6173745f636865636b7c693a313537313138383330343b757365725f67726f75707c733a313a2231223b),
(0, '2gebd9cbj0e1bi9r5d5v9r29kqasvuqo', '::1', 1571210910, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313231303931303b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31363a22736164617364407961686f6f2e636f6d223b757365725f69647c733a313a2238223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731313031343837223b6c6173745f636865636b7c693a313537313138383330343b757365725f67726f75707c733a313a2231223b),
(0, 'mttnnv11mlfv337op4mq0p53tv3k565v', '::1', 1571210752, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313231303735323b6964656e746974797c733a313a227a223b757365726e616d657c733a313a227a223b656d61696c7c733a32353a226861736e61776968617368696d343640676d61696c2e636f6d223b757365725f69647c733a323a223131223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731313239323734223b6c6173745f636865636b7c693a313537313138383133323b757365725f67726f75707c733a313a2232223b69647c733a323a223131223b),
(0, 'p4v2a8e2o4fdfouc31gk8uuv3a2vg4sp', '::1', 1571211305, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313231313330353b6964656e746974797c733a313a227a223b757365726e616d657c733a313a227a223b656d61696c7c733a32353a226861736e61776968617368696d343640676d61696c2e636f6d223b757365725f69647c733a323a223131223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731313239323734223b6c6173745f636865636b7c693a313537313138383133323b757365725f67726f75707c733a313a2232223b69647c733a323a223131223b),
(0, '255qbce3b7l0ot5u40toe6f5hfifofgi', '::1', 1571211282, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313231313238323b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31363a22736164617364407961686f6f2e636f6d223b757365725f69647c733a313a2238223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731313031343837223b6c6173745f636865636b7c693a313537313138383330343b757365725f67726f75707c733a313a2231223b),
(0, 'rqcp94dak94dem16nuj4vqbkglct1jne', '::1', 1571211883, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313231313838333b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31363a22736164617364407961686f6f2e636f6d223b757365725f69647c733a313a2238223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731313031343837223b6c6173745f636865636b7c693a313537313138383330343b757365725f67726f75707c733a313a2231223b),
(0, 'do5jc6jbl6btdbl1di2ov0qbdq5ct958', '::1', 1571211660, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313231313636303b6964656e746974797c733a313a227a223b757365726e616d657c733a313a227a223b656d61696c7c733a32353a226861736e61776968617368696d343640676d61696c2e636f6d223b757365725f69647c733a323a223131223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731313239323734223b6c6173745f636865636b7c693a313537313138383133323b757365725f67726f75707c733a313a2232223b69647c733a323a223131223b),
(0, 'due38cvm0d59ed89q74gtnfu2mlhitlt', '::1', 1571212255, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313231323235353b6964656e746974797c733a313a227a223b757365726e616d657c733a313a227a223b656d61696c7c733a32353a226861736e61776968617368696d343640676d61696c2e636f6d223b757365725f69647c733a323a223131223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731313239323734223b6c6173745f636865636b7c693a313537313138383133323b757365725f67726f75707c733a313a2232223b69647c733a323a223131223b),
(0, '52hbj7487gt6qpffc12bvmlf2jo0ru14', '::1', 1571212316, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313231323331363b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31363a22736164617364407961686f6f2e636f6d223b757365725f69647c733a313a2238223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731313031343837223b6c6173745f636865636b7c693a313537313138383330343b757365725f67726f75707c733a313a2231223b),
(0, '3evjkihort90impnpnb0v86jkfnkiego', '::1', 1571214297, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313231343239373b6964656e746974797c733a313a227a223b757365726e616d657c733a313a227a223b656d61696c7c733a32353a226861736e61776968617368696d343640676d61696c2e636f6d223b757365725f69647c733a323a223131223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731313239323734223b6c6173745f636865636b7c693a313537313138383133323b757365725f67726f75707c733a313a2232223b69647c733a323a223131223b),
(0, '0n4ufsog3m8c4fhp74qne0khdkcf0g4v', '::1', 1571213116, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313231333131363b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31363a22736164617364407961686f6f2e636f6d223b757365725f69647c733a313a2238223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731313031343837223b6c6173745f636865636b7c693a313537313138383330343b757365725f67726f75707c733a313a2231223b),
(0, '8nrqs9u4rubgt0jvmbgonjjspdtc8qud', '::1', 1571214294, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313231343239343b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31363a22736164617364407961686f6f2e636f6d223b757365725f69647c733a313a2238223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731313031343837223b6c6173745f636865636b7c693a313537313138383330343b757365725f67726f75707c733a313a2231223b),
(0, 'aqptkk83vlpheqmdrcsg57ln967oqtjm', '::1', 1571215709, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313231353638323b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31363a22736164617364407961686f6f2e636f6d223b757365725f69647c733a313a2238223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731313838333034223b6c6173745f636865636b7c693a313537313231353730333b757365725f67726f75707c733a313a2231223b6d6573736167657c733a32393a223c703e4c6f6767656420496e205375636365737366756c6c793c2f703e223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d),
(0, 'd77vls94huh995rdv118fhmq4648jkmf', '::1', 1571216250, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313231363235303b6964656e746974797c733a313a227a223b757365726e616d657c733a313a227a223b656d61696c7c733a32353a226861736e61776968617368696d343640676d61696c2e636f6d223b757365725f69647c733a323a223131223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731313239323734223b6c6173745f636865636b7c693a313537313138383133323b757365725f67726f75707c733a313a2232223b69647c733a323a223131223b),
(0, '124odn71r2oej2bohtgn4jl7vf12ivil', '::1', 1571216573, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313231363537333b6964656e746974797c733a313a227a223b757365726e616d657c733a313a227a223b656d61696c7c733a32353a226861736e61776968617368696d343640676d61696c2e636f6d223b757365725f69647c733a323a223131223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731313239323734223b6c6173745f636865636b7c693a313537313138383133323b757365725f67726f75707c733a313a2232223b69647c733a323a223131223b636172745f636f6e74656e74737c613a343a7b733a31303a22636172745f746f74616c223b643a32323b733a31313a22746f74616c5f6974656d73223b643a323b733a33323a223635313262643433643963616136653032633939306230613832363532646361223b613a31343a7b733a323a226964223b733a323a223131223b733a343a226e616d65223b733a31313a22414652455348204b4f5049223b733a353a227072696365223b643a31303b733a333a22717479223b643a313b733a393a226974656d5f636f6465223b733a373a2247454e4552414c223b733a363a22776569676874223b733a383a223230302e30303030223b733a393a2273656c6c65725f6964223b733a313a2231223b733a393a2273686f705f6e616d65223b733a363a22562053686f70223b733a353a226d6f64616c223b733a353a2231302e3030223b733a31303a22756e69745f7072696365223b733a353a2231302e3030223b733a393a227461785f7072696365223b733a313a2230223b733a31303a22736869705f7072696365223b733a343a22302e3030223b733a353a22726f776964223b733a33323a223635313262643433643963616136653032633939306230613832363532646361223b733a383a22737562746f74616c223b643a31303b7d733a33323a223962663331633766663036323933366139366433633862643166386632666633223b613a31343a7b733a323a226964223b733a323a223135223b733a343a226e616d65223b733a31343a224d55534554544920434f46464545223b733a353a227072696365223b643a31323b733a333a22717479223b643a313b733a393a226974656d5f636f6465223b733a373a2247454e4552414c223b733a363a22776569676874223b733a383a223230302e30303030223b733a393a2273656c6c65725f6964223b733a313a2233223b733a393a2273686f705f6e616d65223b733a363a224d2053686f70223b733a353a226d6f64616c223b733a353a2231302e3030223b733a31303a22756e69745f7072696365223b733a353a2231302e3030223b733a393a227461785f7072696365223b733a313a2231223b733a31303a22736869705f7072696365223b733a343a22312e3030223b733a353a22726f776964223b733a33323a223962663331633766663036323933366139366433633862643166386632666633223b733a383a22737562746f74616c223b643a31323b7d7d7061796d656e74737c733a31323a2243617368204465706f736974223b66756c6c5f6e616d657c733a313a225a223b70686f6e657c733a31313a223031323132313231323132223b746f74616c5f616c6c7c733a323a223232223b746f74616c5f7765696768747c733a333a22343030223b6172725f6974656d49447c613a323a7b693a303b733a323a223131223b693a313b733a323a223135223b7d6172725f6974656d4e616d657c613a323a7b693a303b733a31313a22414652455348204b4f5049223b693a313b733a31343a224d55534554544920434f46464545223b7d6172725f6974656d5174797c613a323a7b693a303b733a313a2231223b693a313b733a313a2231223b7d6172725f6974656d50726963657c613a323a7b693a303b733a323a223130223b693a313b733a323a223132223b7d6172725f6974656d537562746f74616c7c613a323a7b693a303b733a323a223130223b693a313b733a323a223132223b7d6172725f6974656d4d6f64616c7c613a323a7b693a303b733a353a2231302e3030223b693a313b733a353a2231302e3030223b7d6172725f6974656d556e697450726963657c613a323a7b693a303b733a353a2231302e3030223b693a313b733a353a2231302e3030223b7d6172725f6974656d54617850726963657c613a323a7b693a303b733a313a2230223b693a313b733a313a2231223b7d6172725f6974656d5368697050726963657c613a323a7b693a303b733a343a22302e3030223b693a313b733a343a22312e3030223b7d6172725f73656c6c65725f69647c613a323a7b693a303b733a313a2231223b693a313b733a313a2233223b7d62696c6c5f6e616d657c733a313a225a223b62696c6c5f656d61696c7c733a32353a226861736e61776968617368696d343640676d61696c2e636f6d223b62696c6c5f616464726573737c733a323a224b42223b62696c6c5f70686f6e657c733a31313a223031323132313231323132223b736869705f6e616d657c733a313a225a223b736869705f616464726573737c733a323a224b42223b736869705f70686f6e657c733a31313a223031323132313231323132223b),
(0, 'bco5cjj4nrb2blsfcl0mrkckvi3878qq', '::1', 1571216623, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313231363537333b6964656e746974797c733a313a227a223b757365726e616d657c733a313a227a223b656d61696c7c733a32353a226861736e61776968617368696d343640676d61696c2e636f6d223b757365725f69647c733a323a223131223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731313239323734223b6c6173745f636865636b7c693a313537313138383133323b757365725f67726f75707c733a313a2232223b69647c733a323a223131223b636172745f636f6e74656e74737c613a343a7b733a31303a22636172745f746f74616c223b643a32323b733a31313a22746f74616c5f6974656d73223b643a323b733a33323a223635313262643433643963616136653032633939306230613832363532646361223b613a31343a7b733a323a226964223b733a323a223131223b733a343a226e616d65223b733a31313a22414652455348204b4f5049223b733a353a227072696365223b643a31303b733a333a22717479223b643a313b733a393a226974656d5f636f6465223b733a373a2247454e4552414c223b733a363a22776569676874223b733a383a223230302e30303030223b733a393a2273656c6c65725f6964223b733a313a2231223b733a393a2273686f705f6e616d65223b733a363a22562053686f70223b733a353a226d6f64616c223b733a353a2231302e3030223b733a31303a22756e69745f7072696365223b733a353a2231302e3030223b733a393a227461785f7072696365223b733a313a2230223b733a31303a22736869705f7072696365223b733a343a22302e3030223b733a353a22726f776964223b733a33323a223635313262643433643963616136653032633939306230613832363532646361223b733a383a22737562746f74616c223b643a31303b7d733a33323a223962663331633766663036323933366139366433633862643166386632666633223b613a31343a7b733a323a226964223b733a323a223135223b733a343a226e616d65223b733a31343a224d55534554544920434f46464545223b733a353a227072696365223b643a31323b733a333a22717479223b643a313b733a393a226974656d5f636f6465223b733a373a2247454e4552414c223b733a363a22776569676874223b733a383a223230302e30303030223b733a393a2273656c6c65725f6964223b733a313a2233223b733a393a2273686f705f6e616d65223b733a363a224d2053686f70223b733a353a226d6f64616c223b733a353a2231302e3030223b733a31303a22756e69745f7072696365223b733a353a2231302e3030223b733a393a227461785f7072696365223b733a313a2231223b733a31303a22736869705f7072696365223b733a343a22312e3030223b733a353a22726f776964223b733a33323a223962663331633766663036323933366139366433633862643166386632666633223b733a383a22737562746f74616c223b643a31323b7d7d7061796d656e74737c733a31323a2243617368204465706f736974223b66756c6c5f6e616d657c733a313a225a223b70686f6e657c733a31313a223031323132313231323132223b746f74616c5f616c6c7c733a323a223232223b746f74616c5f7765696768747c733a333a22343030223b6172725f6974656d49447c613a323a7b693a303b733a323a223131223b693a313b733a323a223135223b7d6172725f6974656d4e616d657c613a323a7b693a303b733a31313a22414652455348204b4f5049223b693a313b733a31343a224d55534554544920434f46464545223b7d6172725f6974656d5174797c613a323a7b693a303b733a313a2231223b693a313b733a313a2231223b7d6172725f6974656d50726963657c613a323a7b693a303b733a323a223130223b693a313b733a323a223132223b7d6172725f6974656d537562746f74616c7c613a323a7b693a303b733a323a223130223b693a313b733a323a223132223b7d6172725f6974656d4d6f64616c7c613a323a7b693a303b733a353a2231302e3030223b693a313b733a353a2231302e3030223b7d6172725f6974656d556e697450726963657c613a323a7b693a303b733a353a2231302e3030223b693a313b733a353a2231302e3030223b7d6172725f6974656d54617850726963657c613a323a7b693a303b733a313a2230223b693a313b733a313a2231223b7d6172725f6974656d5368697050726963657c613a323a7b693a303b733a343a22302e3030223b693a313b733a343a22312e3030223b7d6172725f73656c6c65725f69647c613a323a7b693a303b733a313a2231223b693a313b733a313a2233223b7d62696c6c5f6e616d657c733a313a225a223b62696c6c5f656d61696c7c733a32353a226861736e61776968617368696d343640676d61696c2e636f6d223b62696c6c5f616464726573737c733a323a224b42223b62696c6c5f70686f6e657c733a31313a223031323132313231323132223b736869705f6e616d657c733a313a225a223b736869705f616464726573737c733a323a224b42223b736869705f70686f6e657c733a31313a223031323132313231323132223b),
(0, 'b0gtltrfbaiv14g1c6gfq8kk2dh1oidg', '::1', 1571275403, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313237353430333b),
(0, 'r0hb1bn35rf039mij9ulnavsafmu72f3', '::1', 1571275862, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313237353836323b),
(0, 'q14708oh52uq4mfiff59r58pfgnp8im2', '::1', 1571275780, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313237353738303b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31363a22736164617364407961686f6f2e636f6d223b757365725f69647c733a313a2238223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731323135373033223b6c6173745f636865636b7c693a313537313237353431343b757365725f67726f75707c733a313a2231223b),
(0, 'vn1j5is4daq7l0jerrpqeb2hvppuf45u', '::1', 1571276756, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313237363735363b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31363a22736164617364407961686f6f2e636f6d223b757365725f69647c733a313a2238223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731323135373033223b6c6173745f636865636b7c693a313537313237353431343b757365725f67726f75707c733a313a2231223b),
(0, '5bvbd5mr6sl23833q9ihmacq9s53vn15', '::1', 1571276230, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313237363233303b6964656e746974797c733a343a2261776965223b757365726e616d657c733a343a2261776965223b656d61696c7c733a31353a22657265773840676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731313239353432223b6c6173745f636865636b7c693a313537313237353836383b757365725f67726f75707c733a313a2232223b636172745f636f6e74656e74737c613a353a7b733a31303a22636172745f746f74616c223b643a33392e30363b733a31313a22746f74616c5f6974656d73223b643a333b733a33323a226332306164346437366665393737353961613237613063393962666636373130223b613a31343a7b733a323a226964223b733a323a223132223b733a343a226e616d65223b733a31303a2243414645204d4f434841223b733a353a227072696365223b643a372e30363b733a333a22717479223b643a313b733a393a226974656d5f636f6465223b733a373a2247454e4552414c223b733a363a22776569676874223b733a373a2232302e30303030223b733a393a2273656c6c65725f6964223b733a313a2232223b733a393a2273686f705f6e616d65223b733a363a225a2053686f70223b733a353a226d6f64616c223b733a343a22352e3030223b733a31303a22756e69745f7072696365223b733a343a22362e3030223b733a393a227461785f7072696365223b733a343a22302e3036223b733a31303a22736869705f7072696365223b733a343a22312e3030223b733a353a22726f776964223b733a33323a226332306164346437366665393737353961613237613063393962666636373130223b733a383a22737562746f74616c223b643a372e30363b7d733a33323a226335316365343130633132346131306530646235653462393766633261663339223b613a31343a7b733a323a226964223b733a323a223133223b733a343a226e616d65223b733a31323a22475245454e20434f46464545223b733a353a227072696365223b643a32303b733a333a22717479223b643a313b733a393a226974656d5f636f6465223b733a373a2247454e4552414c223b733a363a22776569676874223b733a383a223230302e30303030223b733a393a2273656c6c65725f6964223b733a313a2232223b733a393a2273686f705f6e616d65223b733a363a225a2053686f70223b733a353a226d6f64616c223b733a353a2232302e3030223b733a31303a22756e69745f7072696365223b733a353a2232302e3030223b733a393a227461785f7072696365223b733a313a2230223b733a31303a22736869705f7072696365223b733a343a22302e3030223b733a353a22726f776964223b733a33323a226335316365343130633132346131306530646235653462393766633261663339223b733a383a22737562746f74616c223b643a32303b7d733a33323a223962663331633766663036323933366139366433633862643166386632666633223b613a31343a7b733a323a226964223b733a323a223135223b733a343a226e616d65223b733a31343a224d55534554544920434f46464545223b733a353a227072696365223b643a31323b733a333a22717479223b643a313b733a393a226974656d5f636f6465223b733a373a2247454e4552414c223b733a363a22776569676874223b733a383a223230302e30303030223b733a393a2273656c6c65725f6964223b733a313a2233223b733a393a2273686f705f6e616d65223b733a363a224d2053686f70223b733a353a226d6f64616c223b733a353a2231302e3030223b733a31303a22756e69745f7072696365223b733a353a2231302e3030223b733a393a227461785f7072696365223b733a313a2231223b733a31303a22736869705f7072696365223b733a343a22312e3030223b733a353a22726f776964223b733a33323a223962663331633766663036323933366139366433633862643166386632666633223b733a383a22737562746f74616c223b643a31323b7d7d7061796d656e74737c733a31323a2243617368204465706f736974223b66756c6c5f6e616d657c733a31343a224841534e4157492048415348494d223b70686f6e657c733a31303a2230313432393638333633223b746f74616c5f616c6c7c733a353a2233392e3036223b746f74616c5f7765696768747c733a333a22343230223b6172725f6974656d49447c613a333a7b693a303b733a323a223132223b693a313b733a323a223133223b693a323b733a323a223135223b7d6172725f6974656d4e616d657c613a333a7b693a303b733a31303a2243414645204d4f434841223b693a313b733a31323a22475245454e20434f46464545223b693a323b733a31343a224d55534554544920434f46464545223b7d6172725f6974656d5174797c613a333a7b693a303b733a313a2231223b693a313b733a313a2231223b693a323b733a313a2231223b7d6172725f6974656d50726963657c613a333a7b693a303b733a343a22372e3036223b693a313b733a323a223230223b693a323b733a323a223132223b7d6172725f6974656d537562746f74616c7c613a333a7b693a303b733a343a22372e3036223b693a313b733a323a223230223b693a323b733a323a223132223b7d6172725f6974656d4d6f64616c7c613a333a7b693a303b733a343a22352e3030223b693a313b733a353a2232302e3030223b693a323b733a353a2231302e3030223b7d6172725f6974656d556e697450726963657c613a333a7b693a303b733a343a22362e3030223b693a313b733a353a2232302e3030223b693a323b733a353a2231302e3030223b7d6172725f6974656d54617850726963657c613a333a7b693a303b733a343a22302e3036223b693a313b733a313a2230223b693a323b733a313a2231223b7d6172725f6974656d5368697050726963657c613a333a7b693a303b733a343a22312e3030223b693a313b733a343a22302e3030223b693a323b733a343a22312e3030223b7d6172725f73656c6c65725f69647c613a333a7b693a303b733a313a2232223b693a313b733a313a2232223b693a323b733a313a2233223b7d62696c6c5f6e616d657c733a31343a224841534e4157492048415348494d223b62696c6c5f656d61696c7c733a31353a22657265773840676d61696c2e636f6d223b62696c6c5f616464726573737c733a32333a2231363630204b4f4b204c414e41532c4b454c414e54414e223b62696c6c5f70686f6e657c733a31303a2230313432393638333633223b736869705f6e616d657c733a31343a224841534e4157492048415348494d223b736869705f616464726573737c733a32333a2231363630204b4f4b204c414e41532c4b454c414e54414e223b736869705f70686f6e657c733a31303a2230313432393638333633223b),
(0, 'dj9f2aehmpb4aib38ar0hjfdh3ubl014', '::1', 1571276542, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313237363534323b6964656e746974797c733a343a2261776965223b757365726e616d657c733a343a2261776965223b656d61696c7c733a31353a22657265773840676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731313239353432223b6c6173745f636865636b7c693a313537313237353836383b757365725f67726f75707c733a313a2232223b636172745f636f6e74656e74737c613a353a7b733a31303a22636172745f746f74616c223b643a34362e31323b733a31313a22746f74616c5f6974656d73223b643a343b733a33323a226332306164346437366665393737353961613237613063393962666636373130223b613a31343a7b733a323a226964223b733a323a223132223b733a343a226e616d65223b733a31303a2243414645204d4f434841223b733a353a227072696365223b643a372e30363b733a333a22717479223b643a323b733a393a226974656d5f636f6465223b733a373a2247454e4552414c223b733a363a22776569676874223b733a373a2232302e30303030223b733a393a2273656c6c65725f6964223b733a313a2232223b733a393a2273686f705f6e616d65223b733a363a225a2053686f70223b733a353a226d6f64616c223b733a343a22352e3030223b733a31303a22756e69745f7072696365223b733a343a22362e3030223b733a393a227461785f7072696365223b733a343a22302e3036223b733a31303a22736869705f7072696365223b733a343a22312e3030223b733a353a22726f776964223b733a33323a226332306164346437366665393737353961613237613063393962666636373130223b733a383a22737562746f74616c223b643a31342e31323b7d733a33323a226335316365343130633132346131306530646235653462393766633261663339223b613a31343a7b733a323a226964223b733a323a223133223b733a343a226e616d65223b733a31323a22475245454e20434f46464545223b733a353a227072696365223b643a32303b733a333a22717479223b643a313b733a393a226974656d5f636f6465223b733a373a2247454e4552414c223b733a363a22776569676874223b733a383a223230302e30303030223b733a393a2273656c6c65725f6964223b733a313a2232223b733a393a2273686f705f6e616d65223b733a363a225a2053686f70223b733a353a226d6f64616c223b733a353a2232302e3030223b733a31303a22756e69745f7072696365223b733a353a2232302e3030223b733a393a227461785f7072696365223b733a313a2230223b733a31303a22736869705f7072696365223b733a343a22302e3030223b733a353a22726f776964223b733a33323a226335316365343130633132346131306530646235653462393766633261663339223b733a383a22737562746f74616c223b643a32303b7d733a33323a223962663331633766663036323933366139366433633862643166386632666633223b613a31343a7b733a323a226964223b733a323a223135223b733a343a226e616d65223b733a31343a224d55534554544920434f46464545223b733a353a227072696365223b643a31323b733a333a22717479223b643a313b733a393a226974656d5f636f6465223b733a373a2247454e4552414c223b733a363a22776569676874223b733a383a223230302e30303030223b733a393a2273656c6c65725f6964223b733a313a2233223b733a393a2273686f705f6e616d65223b733a363a224d2053686f70223b733a353a226d6f64616c223b733a353a2231302e3030223b733a31303a22756e69745f7072696365223b733a353a2231302e3030223b733a393a227461785f7072696365223b733a313a2231223b733a31303a22736869705f7072696365223b733a343a22312e3030223b733a353a22726f776964223b733a33323a223962663331633766663036323933366139366433633862643166386632666633223b733a383a22737562746f74616c223b643a31323b7d7d7061796d656e74737c733a31323a2243617368204465706f736974223b66756c6c5f6e616d657c733a31343a224841534e4157492048415348494d223b70686f6e657c733a31303a2230313432393638333633223b746f74616c5f616c6c7c733a353a2234362e3132223b746f74616c5f7765696768747c733a333a22343230223b6172725f6974656d49447c613a333a7b693a303b733a323a223132223b693a313b733a323a223133223b693a323b733a323a223135223b7d6172725f6974656d4e616d657c613a333a7b693a303b733a31303a2243414645204d4f434841223b693a313b733a31323a22475245454e20434f46464545223b693a323b733a31343a224d55534554544920434f46464545223b7d6172725f6974656d5174797c613a333a7b693a303b733a313a2232223b693a313b733a313a2231223b693a323b733a313a2231223b7d6172725f6974656d50726963657c613a333a7b693a303b733a343a22372e3036223b693a313b733a323a223230223b693a323b733a323a223132223b7d6172725f6974656d537562746f74616c7c613a333a7b693a303b733a353a2231342e3132223b693a313b733a323a223230223b693a323b733a323a223132223b7d6172725f6974656d4d6f64616c7c613a333a7b693a303b733a343a22352e3030223b693a313b733a353a2232302e3030223b693a323b733a353a2231302e3030223b7d6172725f6974656d556e697450726963657c613a333a7b693a303b733a343a22362e3030223b693a313b733a353a2232302e3030223b693a323b733a353a2231302e3030223b7d6172725f6974656d54617850726963657c613a333a7b693a303b733a343a22302e3036223b693a313b733a313a2230223b693a323b733a313a2231223b7d6172725f6974656d5368697050726963657c613a333a7b693a303b733a343a22312e3030223b693a313b733a343a22302e3030223b693a323b733a343a22312e3030223b7d6172725f73656c6c65725f69647c613a333a7b693a303b733a313a2232223b693a313b733a313a2232223b693a323b733a313a2233223b7d62696c6c5f6e616d657c733a31343a224841534e4157492048415348494d223b62696c6c5f656d61696c7c733a31353a22657265773840676d61696c2e636f6d223b62696c6c5f616464726573737c733a32333a2231363630204b4f4b204c414e41532c4b454c414e54414e223b62696c6c5f70686f6e657c733a31303a2230313432393638333633223b736869705f6e616d657c733a31343a224841534e4157492048415348494d223b736869705f616464726573737c733a32333a2231363630204b4f4b204c414e41532c4b454c414e54414e223b736869705f70686f6e657c733a31303a2230313432393638333633223b),
(0, '3epru570mumejri0bdg76iror01rqvlg', '::1', 1571276630, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313237363534323b6964656e746974797c733a343a2261776965223b757365726e616d657c733a343a2261776965223b656d61696c7c733a31353a22657265773840676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731313239353432223b6c6173745f636865636b7c693a313537313237353836383b757365725f67726f75707c733a313a2232223b636172745f636f6e74656e74737c613a353a7b733a31303a22636172745f746f74616c223b643a34362e31323b733a31313a22746f74616c5f6974656d73223b643a343b733a33323a226332306164346437366665393737353961613237613063393962666636373130223b613a31343a7b733a323a226964223b733a323a223132223b733a343a226e616d65223b733a31303a2243414645204d4f434841223b733a353a227072696365223b643a372e30363b733a333a22717479223b643a323b733a393a226974656d5f636f6465223b733a373a2247454e4552414c223b733a363a22776569676874223b733a373a2232302e30303030223b733a393a2273656c6c65725f6964223b733a313a2232223b733a393a2273686f705f6e616d65223b733a363a225a2053686f70223b733a353a226d6f64616c223b733a343a22352e3030223b733a31303a22756e69745f7072696365223b733a343a22362e3030223b733a393a227461785f7072696365223b733a343a22302e3036223b733a31303a22736869705f7072696365223b733a343a22312e3030223b733a353a22726f776964223b733a33323a226332306164346437366665393737353961613237613063393962666636373130223b733a383a22737562746f74616c223b643a31342e31323b7d733a33323a226335316365343130633132346131306530646235653462393766633261663339223b613a31343a7b733a323a226964223b733a323a223133223b733a343a226e616d65223b733a31323a22475245454e20434f46464545223b733a353a227072696365223b643a32303b733a333a22717479223b643a313b733a393a226974656d5f636f6465223b733a373a2247454e4552414c223b733a363a22776569676874223b733a383a223230302e30303030223b733a393a2273656c6c65725f6964223b733a313a2232223b733a393a2273686f705f6e616d65223b733a363a225a2053686f70223b733a353a226d6f64616c223b733a353a2232302e3030223b733a31303a22756e69745f7072696365223b733a353a2232302e3030223b733a393a227461785f7072696365223b733a313a2230223b733a31303a22736869705f7072696365223b733a343a22302e3030223b733a353a22726f776964223b733a33323a226335316365343130633132346131306530646235653462393766633261663339223b733a383a22737562746f74616c223b643a32303b7d733a33323a223962663331633766663036323933366139366433633862643166386632666633223b613a31343a7b733a323a226964223b733a323a223135223b733a343a226e616d65223b733a31343a224d55534554544920434f46464545223b733a353a227072696365223b643a31323b733a333a22717479223b643a313b733a393a226974656d5f636f6465223b733a373a2247454e4552414c223b733a363a22776569676874223b733a383a223230302e30303030223b733a393a2273656c6c65725f6964223b733a313a2233223b733a393a2273686f705f6e616d65223b733a363a224d2053686f70223b733a353a226d6f64616c223b733a353a2231302e3030223b733a31303a22756e69745f7072696365223b733a353a2231302e3030223b733a393a227461785f7072696365223b733a313a2231223b733a31303a22736869705f7072696365223b733a343a22312e3030223b733a353a22726f776964223b733a33323a223962663331633766663036323933366139366433633862643166386632666633223b733a383a22737562746f74616c223b643a31323b7d7d7061796d656e74737c733a31323a2243617368204465706f736974223b66756c6c5f6e616d657c733a31343a224841534e4157492048415348494d223b70686f6e657c733a31303a2230313432393638333633223b746f74616c5f616c6c7c733a353a2234362e3132223b746f74616c5f7765696768747c733a333a22343230223b6172725f6974656d49447c613a333a7b693a303b733a323a223132223b693a313b733a323a223133223b693a323b733a323a223135223b7d6172725f6974656d4e616d657c613a333a7b693a303b733a31303a2243414645204d4f434841223b693a313b733a31323a22475245454e20434f46464545223b693a323b733a31343a224d55534554544920434f46464545223b7d6172725f6974656d5174797c613a333a7b693a303b733a313a2232223b693a313b733a313a2231223b693a323b733a313a2231223b7d6172725f6974656d50726963657c613a333a7b693a303b733a343a22372e3036223b693a313b733a323a223230223b693a323b733a323a223132223b7d6172725f6974656d537562746f74616c7c613a333a7b693a303b733a353a2231342e3132223b693a313b733a323a223230223b693a323b733a323a223132223b7d6172725f6974656d4d6f64616c7c613a333a7b693a303b733a343a22352e3030223b693a313b733a353a2232302e3030223b693a323b733a353a2231302e3030223b7d6172725f6974656d556e697450726963657c613a333a7b693a303b733a343a22362e3030223b693a313b733a353a2232302e3030223b693a323b733a353a2231302e3030223b7d6172725f6974656d54617850726963657c613a333a7b693a303b733a343a22302e3036223b693a313b733a313a2230223b693a323b733a313a2231223b7d6172725f6974656d5368697050726963657c613a333a7b693a303b733a343a22312e3030223b693a313b733a343a22302e3030223b693a323b733a343a22312e3030223b7d6172725f73656c6c65725f69647c613a333a7b693a303b733a313a2232223b693a313b733a313a2232223b693a323b733a313a2233223b7d62696c6c5f6e616d657c733a31343a224841534e4157492048415348494d223b62696c6c5f656d61696c7c733a31353a22657265773840676d61696c2e636f6d223b62696c6c5f616464726573737c733a32333a2231363630204b4f4b204c414e41532c4b454c414e54414e223b62696c6c5f70686f6e657c733a31303a2230313432393638333633223b736869705f6e616d657c733a31343a224841534e4157492048415348494d223b736869705f616464726573737c733a32333a2231363630204b4f4b204c414e41532c4b454c414e54414e223b736869705f70686f6e657c733a31303a2230313432393638333633223b),
(0, '7mrdqagnm3aebac6cslqpduq4qmd42mn', '::1', 1571278791, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313237383739313b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31363a22736164617364407961686f6f2e636f6d223b757365725f69647c733a313a2238223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731323135373033223b6c6173745f636865636b7c693a313537313237353431343b757365725f67726f75707c733a313a2231223b),
(0, 'nk1t815e8o8nv5qcnef3k8h22vl6l2pk', '::1', 1571279151, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313237393135313b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31363a22736164617364407961686f6f2e636f6d223b757365725f69647c733a313a2238223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731323135373033223b6c6173745f636865636b7c693a313537313237353431343b757365725f67726f75707c733a313a2231223b),
(0, 'sv39nv4vnu6l8p3c8uda0fd6kohlal31', '::1', 1571279484, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313237393438343b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31363a22736164617364407961686f6f2e636f6d223b757365725f69647c733a313a2238223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731323135373033223b6c6173745f636865636b7c693a313537313237353431343b757365725f67726f75707c733a313a2231223b),
(0, 'njahmkr69k5jqem7qc1fcovfgf15qlod', '::1', 1571280907, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313238303930373b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31363a22736164617364407961686f6f2e636f6d223b757365725f69647c733a313a2238223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731323135373033223b6c6173745f636865636b7c693a313537313237353431343b757365725f67726f75707c733a313a2231223b),
(0, 'm8eaare89c3mluohncqpdflar2qh6f5c', '::1', 1571285427, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313238353432373b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31363a22736164617364407961686f6f2e636f6d223b757365725f69647c733a313a2238223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731323135373033223b6c6173745f636865636b7c693a313537313237353431343b757365725f67726f75707c733a313a2231223b),
(0, 'b1dmmv5j2c42q3slkf39sll5jhnncbgp', '::1', 1571285741, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313238353734313b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31363a22736164617364407961686f6f2e636f6d223b757365725f69647c733a313a2238223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731323135373033223b6c6173745f636865636b7c693a313537313237353431343b757365725f67726f75707c733a313a2231223b),
(0, '1fmopne1mufhr1cj9tabidmu8raa6pu1', '::1', 1571286103, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313238363130333b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31363a22736164617364407961686f6f2e636f6d223b757365725f69647c733a313a2238223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731323135373033223b6c6173745f636865636b7c693a313537313237353431343b757365725f67726f75707c733a313a2231223b),
(0, '636pff4iddf45gao6dpt0bosjubiskp9', '::1', 1571287763, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313238373736333b6964656e746974797c733a343a2261776965223b757365726e616d657c733a343a2261776965223b656d61696c7c733a31353a22657265773840676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731323735383638223b6c6173745f636865636b7c693a313537313238353830303b757365725f67726f75707c733a313a2232223b),
(0, 'lr8d20ud7pssge8t8d0av9i04eblc54c', '::1', 1571286408, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313238363430383b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31363a22736164617364407961686f6f2e636f6d223b757365725f69647c733a313a2238223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731323135373033223b6c6173745f636865636b7c693a313537313237353431343b757365725f67726f75707c733a313a2231223b),
(0, 'fh06s59vmi7kcsrtv4l57hp029jc7ake', '::1', 1571287761, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313238373736313b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31363a22736164617364407961686f6f2e636f6d223b757365725f69647c733a313a2238223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731323135373033223b6c6173745f636865636b7c693a313537313237353431343b757365725f67726f75707c733a313a2231223b),
(0, '43ejgf3r7hub0tmkcjokmu1p42v3t99g', '::1', 1571292940, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313239323934303b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31363a22736164617364407961686f6f2e636f6d223b757365725f69647c733a313a2238223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731323135373033223b6c6173745f636865636b7c693a313537313237353431343b757365725f67726f75707c733a313a2231223b),
(0, 'j7e4jm40obsat5uv4sfghvqsu04smocu', '::1', 1571292943, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313239323934333b6964656e746974797c733a343a2261776965223b757365726e616d657c733a343a2261776965223b656d61696c7c733a31353a22657265773840676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731323735383638223b6c6173745f636865636b7c693a313537313238353830303b757365725f67726f75707c733a313a2232223b),
(0, '9d47v5btu590sb7jl97t8ici3n1clk1j', '::1', 1571296394, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313239363339343b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31363a22736164617364407961686f6f2e636f6d223b757365725f69647c733a313a2238223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731323135373033223b6c6173745f636865636b7c693a313537313237353431343b757365725f67726f75707c733a313a2231223b),
(0, 'k881p78fldckn3500sl5t2n83vi8d3br', '::1', 1571296411, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313239363431313b6964656e746974797c733a343a2261776965223b757365726e616d657c733a343a2261776965223b656d61696c7c733a31353a22657265773840676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731323735383638223b6c6173745f636865636b7c693a313537313238353830303b757365725f67726f75707c733a313a2232223b),
(0, 'nk4j1db6bgbirm9poq94nactb7lmlgag', '::1', 1571296991, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313239363939313b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31363a22736164617364407961686f6f2e636f6d223b757365725f69647c733a313a2238223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731323135373033223b6c6173745f636865636b7c693a313537313237353431343b757365725f67726f75707c733a313a2231223b),
(0, 'd56hldd7jl902bm8f0nod64hat8ovong', '::1', 1571298104, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313239383130343b6964656e746974797c733a343a2261776965223b757365726e616d657c733a343a2261776965223b656d61696c7c733a31353a22657265773840676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731323735383638223b6c6173745f636865636b7c693a313537313238353830303b757365725f67726f75707c733a313a2232223b),
(0, 'vr2i8h61lf7f9a8utin5s6pne3vhbmjd', '::1', 1571298989, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313239383938393b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31363a22736164617364407961686f6f2e636f6d223b757365725f69647c733a313a2238223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731323135373033223b6c6173745f636865636b7c693a313537313237353431343b757365725f67726f75707c733a313a2231223b),
(0, 'ld902ls7q9d8tdmrdcnpdsmn1u0519pa', '::1', 1571298415, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313239383431353b6964656e746974797c733a343a2261776965223b757365726e616d657c733a343a2261776965223b656d61696c7c733a31353a22657265773840676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731323735383638223b6c6173745f636865636b7c693a313537313238353830303b757365725f67726f75707c733a313a2232223b),
(0, 'q584de104d4dkpf0qjlvsrst3e2sho7n', '::1', 1571299662, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313239393636323b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31363a22736164617364407961686f6f2e636f6d223b757365725f69647c733a313a2238223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731323135373033223b6c6173745f636865636b7c693a313537313237353431343b757365725f67726f75707c733a313a2231223b69647c733a313a2238223b),
(0, 'lbcrps6p508ph35suhp069jrj6c9add2', '::1', 1571300636, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313330303633363b),
(0, 'amlbelufaesb617i5cpn8urnnbi11a1l', '::1', 1571300622, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313330303632323b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31363a22736164617364407961686f6f2e636f6d223b757365725f69647c733a313a2238223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731323135373033223b6c6173745f636865636b7c693a313537313237353431343b757365725f67726f75707c733a313a2231223b69647c733a313a2238223b),
(0, 'gk4ge5snv63fpt20p85h8kstvgpd17hn', '::1', 1571300941, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313330303934313b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31363a22736164617364407961686f6f2e636f6d223b757365725f69647c733a313a2238223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731323135373033223b6c6173745f636865636b7c693a313537313237353431343b757365725f67726f75707c733a313a2231223b69647c733a313a2238223b),
(0, 'n7pph7gtsiseb1vhojbc75bs973c80fa', '::1', 1571300948, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313330303934383b6964656e746974797c733a343a2261776965223b757365726e616d657c733a343a2261776965223b656d61696c7c733a31363a2265726577773840676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731323835383030223b6c6173745f636865636b7c693a313537313330303635313b757365725f67726f75707c733a313a2232223b),
(0, 'q2f3c3nrrfvhasi9unso1280iunr5nk6', '::1', 1571300945, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313330303934313b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31363a22736164617364407961686f6f2e636f6d223b757365725f69647c733a313a2238223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731323135373033223b6c6173745f636865636b7c693a313537313237353431343b757365725f67726f75707c733a313a2231223b69647c733a313a2238223b),
(0, 'cdtfvlb5ps4umoc3b0na0hki7u99bh76', '::1', 1571302834, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313330323833343b6964656e746974797c733a343a2261776965223b757365726e616d657c733a343a2261776965223b656d61696c7c733a31363a2265726577773840676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731323835383030223b6c6173745f636865636b7c693a313537313330303635313b757365725f67726f75707c733a313a2232223b636172745f636f6e74656e74737c613a333a7b733a31303a22636172745f746f74616c223b643a372e30363b733a31313a22746f74616c5f6974656d73223b643a313b733a33323a226332306164346437366665393737353961613237613063393962666636373130223b613a31343a7b733a323a226964223b733a323a223132223b733a343a226e616d65223b733a31303a2243414645204d4f434841223b733a353a227072696365223b643a372e30363b733a333a22717479223b643a313b733a393a226974656d5f636f6465223b733a373a2247454e4552414c223b733a363a22776569676874223b733a373a2232302e30303030223b733a393a2273656c6c65725f6964223b733a313a2232223b733a393a2273686f705f6e616d65223b733a363a225a2053686f70223b733a353a226d6f64616c223b733a343a22352e3030223b733a31303a22756e69745f7072696365223b733a343a22362e3030223b733a393a227461785f7072696365223b733a343a22302e3036223b733a31303a22736869705f7072696365223b733a343a22312e3030223b733a353a22726f776964223b733a33323a226332306164346437366665393737353961613237613063393962666636373130223b733a383a22737562746f74616c223b643a372e30363b7d7d),
(0, '2qte8kv7vtt2lisme92r5p3nm21jtspg', '::1', 1571303133, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313330323833343b6964656e746974797c733a343a2261776965223b757365726e616d657c733a343a2261776965223b656d61696c7c733a31363a2265726577773840676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731323835383030223b6c6173745f636865636b7c693a313537313330303635313b757365725f67726f75707c733a313a2232223b636172745f636f6e74656e74737c613a333a7b733a31303a22636172745f746f74616c223b643a372e30363b733a31313a22746f74616c5f6974656d73223b643a313b733a33323a226332306164346437366665393737353961613237613063393962666636373130223b613a31343a7b733a323a226964223b733a323a223132223b733a343a226e616d65223b733a31303a2243414645204d4f434841223b733a353a227072696365223b643a372e30363b733a333a22717479223b643a313b733a393a226974656d5f636f6465223b733a373a2247454e4552414c223b733a363a22776569676874223b733a373a2232302e30303030223b733a393a2273656c6c65725f6964223b733a313a2232223b733a393a2273686f705f6e616d65223b733a363a225a2053686f70223b733a353a226d6f64616c223b733a343a22352e3030223b733a31303a22756e69745f7072696365223b733a343a22362e3030223b733a393a227461785f7072696365223b733a343a22302e3036223b733a31303a22736869705f7072696365223b733a343a22312e3030223b733a353a22726f776964223b733a33323a226332306164346437366665393737353961613237613063393962666636373130223b733a383a22737562746f74616c223b643a372e30363b7d7d7061796d656e74737c733a31323a2243617368204465706f736974223b66756c6c5f6e616d657c733a31343a224841534e4157492048415348494d223b70686f6e657c733a31303a2230313432393638333633223b746f74616c5f616c6c7c733a343a22372e3036223b746f74616c5f7765696768747c733a323a223230223b6172725f6974656d49447c613a313a7b693a303b733a323a223132223b7d6172725f6974656d4e616d657c613a313a7b693a303b733a31303a2243414645204d4f434841223b7d6172725f6974656d5174797c613a313a7b693a303b733a313a2231223b7d6172725f6974656d50726963657c613a313a7b693a303b733a343a22372e3036223b7d6172725f6974656d537562746f74616c7c613a313a7b693a303b733a343a22372e3036223b7d6172725f6974656d4d6f64616c7c613a313a7b693a303b733a343a22352e3030223b7d6172725f6974656d556e697450726963657c613a313a7b693a303b733a343a22362e3030223b7d6172725f6974656d54617850726963657c613a313a7b693a303b733a343a22302e3036223b7d6172725f6974656d5368697050726963657c613a313a7b693a303b733a343a22312e3030223b7d6172725f73656c6c65725f69647c613a313a7b693a303b733a313a2232223b7d6172725f6f726465725f7374617475737c4e3b736869705f6e616d657c733a31343a224841534e4157492048415348494d223b736869705f616464726573737c733a32333a2231363630204b4f4b204c414e41532c4b454c414e54414e223b736869705f70686f6e657c733a31303a2230313432393638333633223b),
(0, '382nsu9udcv5iijtta9sjc3n134qirrn', '::1', 1571394079, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313339343037393b6964656e746974797c733a343a2261776965223b757365726e616d657c733a343a2261776965223b656d61696c7c733a31363a2265726577773840676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731333030363531223b6c6173745f636865636b7c693a313537313339333737343b757365725f67726f75707c733a313a2232223b),
(0, 'l14dig2mqkjoptgaetk2spc7buds3hln', '::1', 1571395332, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313339353333323b6964656e746974797c733a343a2261776965223b757365726e616d657c733a343a2261776965223b656d61696c7c733a31363a2265726577773840676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731333030363531223b6c6173745f636865636b7c693a313537313339333737343b757365725f67726f75707c733a313a2232223b),
(0, '2aoj4tqrdpclba5iv8sane9294llm1ug', '::1', 1571394532, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313339343533323b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31363a22736164617364407961686f6f2e636f6d223b757365725f69647c733a313a2238223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731323735343134223b6c6173745f636865636b7c693a313537313339343231313b757365725f67726f75707c733a313a2231223b),
(0, 'i2j0jmlih8ega3qea6u7avtdae51egvk', '::1', 1571394849, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313339343834393b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31363a22736164617364407961686f6f2e636f6d223b757365725f69647c733a313a2238223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731323735343134223b6c6173745f636865636b7c693a313537313339343231313b757365725f67726f75707c733a313a2231223b);
INSERT INTO `ci_sessions` (`ai`, `id`, `ip_address`, `timestamp`, `data`) VALUES
(0, 'qjphphoc3tnpjpb0jri5c65nq0d9sqav', '::1', 1571395163, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313339353136333b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31363a22736164617364407961686f6f2e636f6d223b757365725f69647c733a313a2238223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731323735343134223b6c6173745f636865636b7c693a313537313339343231313b757365725f67726f75707c733a313a2231223b),
(0, 'dlojtoi2rap6d269ou1q1jos068tnkoo', '::1', 1571395476, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313339353437363b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31363a22736164617364407961686f6f2e636f6d223b757365725f69647c733a313a2238223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731323735343134223b6c6173745f636865636b7c693a313537313339343231313b757365725f67726f75707c733a313a2231223b),
(0, 'n5tp23q6p7fcifqe7ic0ughds4c6l8i7', '::1', 1571395636, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313339353633363b6964656e746974797c733a343a2261776965223b757365726e616d657c733a343a2261776965223b656d61696c7c733a31363a2265726577773840676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731333030363531223b6c6173745f636865636b7c693a313537313339333737343b757365725f67726f75707c733a313a2232223b),
(0, 's2cl2d4532oki83ngcq3j122rj7g2040', '::1', 1571395932, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313339353933323b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31363a22736164617364407961686f6f2e636f6d223b757365725f69647c733a313a2238223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731323735343134223b6c6173745f636865636b7c693a313537313339343231313b757365725f67726f75707c733a313a2231223b69647c733a313a2238223b),
(0, 'p5i32d336g82fv14q8t2not6qquc8s0m', '::1', 1571395850, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313339353633363b6964656e746974797c733a343a2261776965223b757365726e616d657c733a343a2261776965223b656d61696c7c733a31363a2265726577773840676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731333030363531223b6c6173745f636865636b7c693a313537313339333737343b757365725f67726f75707c733a313a2232223b),
(0, 'mp36ia1tl6t9i9qitg7eeftckngodj1v', '::1', 1571396054, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313339353933323b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31363a22736164617364407961686f6f2e636f6d223b757365725f69647c733a313a2238223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731323735343134223b6c6173745f636865636b7c693a313537313339343231313b757365725f67726f75707c733a313a2231223b69647c733a313a2238223b),
(0, '4e31tjff7tbh4dgf2n6vj02ka3rdcg14', '::1', 1571535098, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313533353039383b),
(0, '4kk2teq76feh5ehl8dt7usslgvkj5vm1', '::1', 1571536021, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313533363032313b6964656e746974797c733a343a2261776965223b757365726e616d657c733a343a2261776965223b656d61696c7c733a31353a22657265777740676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731333933373734223b6c6173745f636865636b7c693a313537313533353430303b757365725f67726f75707c733a313a2232223b636172745f636f6e74656e74737c613a343a7b733a31303a22636172745f746f74616c223b643a33323b733a31313a22746f74616c5f6974656d73223b643a323b733a33323a223962663331633766663036323933366139366433633862643166386632666633223b613a31343a7b733a323a226964223b733a323a223135223b733a343a226e616d65223b733a31343a224d55534554544920434f46464545223b733a353a227072696365223b643a31323b733a333a22717479223b643a313b733a393a226974656d5f636f6465223b733a373a2247454e4552414c223b733a363a22776569676874223b733a383a223230302e30303030223b733a393a2273656c6c65725f6964223b733a313a2233223b733a393a2273686f705f6e616d65223b733a363a224d2053686f70223b733a353a226d6f64616c223b733a353a2231302e3030223b733a31303a22756e69745f7072696365223b733a353a2231302e3030223b733a393a227461785f7072696365223b733a313a2231223b733a31303a22736869705f7072696365223b733a343a22312e3030223b733a353a22726f776964223b733a33323a223962663331633766663036323933366139366433633862643166386632666633223b733a383a22737562746f74616c223b643a31323b7d733a33323a226335316365343130633132346131306530646235653462393766633261663339223b613a31343a7b733a323a226964223b733a323a223133223b733a343a226e616d65223b733a31323a22475245454e20434f46464545223b733a353a227072696365223b643a32303b733a333a22717479223b643a313b733a393a226974656d5f636f6465223b733a373a2247454e4552414c223b733a363a22776569676874223b733a383a223230302e30303030223b733a393a2273656c6c65725f6964223b733a313a2232223b733a393a2273686f705f6e616d65223b733a363a225a2053686f70223b733a353a226d6f64616c223b733a353a2232302e3030223b733a31303a22756e69745f7072696365223b733a353a2232302e3030223b733a393a227461785f7072696365223b733a313a2230223b733a31303a22736869705f7072696365223b733a343a22302e3030223b733a353a22726f776964223b733a33323a226335316365343130633132346131306530646235653462393766633261663339223b733a383a22737562746f74616c223b643a32303b7d7d7061796d656e74737c733a31323a2243617368204465706f736974223b66756c6c5f6e616d657c733a31343a224841534e4157492048415348494d223b70686f6e657c733a31303a2230313432393638333633223b746f74616c5f616c6c7c733a323a223332223b746f74616c5f7765696768747c733a333a22343030223b6172725f6974656d49447c613a323a7b693a303b733a323a223135223b693a313b733a323a223133223b7d6172725f6974656d4e616d657c613a323a7b693a303b733a31343a224d55534554544920434f46464545223b693a313b733a31323a22475245454e20434f46464545223b7d6172725f6974656d5174797c613a323a7b693a303b733a313a2231223b693a313b733a313a2231223b7d6172725f6974656d50726963657c613a323a7b693a303b733a323a223132223b693a313b733a323a223230223b7d6172725f6974656d537562746f74616c7c613a323a7b693a303b733a323a223132223b693a313b733a323a223230223b7d6172725f6974656d4d6f64616c7c613a323a7b693a303b733a353a2231302e3030223b693a313b733a353a2232302e3030223b7d6172725f6974656d556e697450726963657c613a323a7b693a303b733a353a2231302e3030223b693a313b733a353a2232302e3030223b7d6172725f6974656d54617850726963657c613a323a7b693a303b733a313a2231223b693a313b733a313a2230223b7d6172725f6974656d5368697050726963657c613a323a7b693a303b733a343a22312e3030223b693a313b733a343a22302e3030223b7d6172725f73656c6c65725f69647c613a323a7b693a303b733a313a2233223b693a313b733a313a2232223b7d6172725f6f726465725f7374617475737c4e3b736869705f6e616d657c733a31343a224841534e4157492048415348494d223b736869705f616464726573737c733a32333a2231363630204b4f4b204c414e41532c4b454c414e54414e223b736869705f70686f6e657c733a31303a2230313432393638333633223b),
(0, 'u7vdtq30vbq8htmikle848a9ese00jl4', '::1', 1571538154, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313533383135343b6964656e746974797c733a343a2261776965223b757365726e616d657c733a343a2261776965223b656d61696c7c733a31353a22657265777740676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731333933373734223b6c6173745f636865636b7c693a313537313533353430303b757365725f67726f75707c733a313a2232223b636172745f636f6e74656e74737c613a343a7b733a31303a22636172745f746f74616c223b643a33323b733a31313a22746f74616c5f6974656d73223b643a323b733a33323a223962663331633766663036323933366139366433633862643166386632666633223b613a31343a7b733a323a226964223b733a323a223135223b733a343a226e616d65223b733a31343a224d55534554544920434f46464545223b733a353a227072696365223b643a31323b733a333a22717479223b643a313b733a393a226974656d5f636f6465223b733a373a2247454e4552414c223b733a363a22776569676874223b733a383a223230302e30303030223b733a393a2273656c6c65725f6964223b733a313a2233223b733a393a2273686f705f6e616d65223b733a363a224d2053686f70223b733a353a226d6f64616c223b733a353a2231302e3030223b733a31303a22756e69745f7072696365223b733a353a2231302e3030223b733a393a227461785f7072696365223b733a313a2231223b733a31303a22736869705f7072696365223b733a343a22312e3030223b733a353a22726f776964223b733a33323a223962663331633766663036323933366139366433633862643166386632666633223b733a383a22737562746f74616c223b643a31323b7d733a33323a226335316365343130633132346131306530646235653462393766633261663339223b613a31343a7b733a323a226964223b733a323a223133223b733a343a226e616d65223b733a31323a22475245454e20434f46464545223b733a353a227072696365223b643a32303b733a333a22717479223b643a313b733a393a226974656d5f636f6465223b733a373a2247454e4552414c223b733a363a22776569676874223b733a383a223230302e30303030223b733a393a2273656c6c65725f6964223b733a313a2232223b733a393a2273686f705f6e616d65223b733a363a225a2053686f70223b733a353a226d6f64616c223b733a353a2232302e3030223b733a31303a22756e69745f7072696365223b733a353a2232302e3030223b733a393a227461785f7072696365223b733a313a2230223b733a31303a22736869705f7072696365223b733a343a22302e3030223b733a353a22726f776964223b733a33323a226335316365343130633132346131306530646235653462393766633261663339223b733a383a22737562746f74616c223b643a32303b7d7d7061796d656e74737c733a31323a2243617368204465706f736974223b66756c6c5f6e616d657c733a31343a224841534e4157492048415348494d223b70686f6e657c733a31303a2230313432393638333633223b746f74616c5f616c6c7c733a323a223332223b746f74616c5f7765696768747c733a333a22343030223b6172725f6974656d49447c613a323a7b693a303b733a323a223135223b693a313b733a323a223133223b7d6172725f6974656d4e616d657c613a323a7b693a303b733a31343a224d55534554544920434f46464545223b693a313b733a31323a22475245454e20434f46464545223b7d6172725f6974656d5174797c613a323a7b693a303b733a313a2231223b693a313b733a313a2231223b7d6172725f6974656d50726963657c613a323a7b693a303b733a323a223132223b693a313b733a323a223230223b7d6172725f6974656d537562746f74616c7c613a323a7b693a303b733a323a223132223b693a313b733a323a223230223b7d6172725f6974656d4d6f64616c7c613a323a7b693a303b733a353a2231302e3030223b693a313b733a353a2232302e3030223b7d6172725f6974656d556e697450726963657c613a323a7b693a303b733a353a2231302e3030223b693a313b733a353a2232302e3030223b7d6172725f6974656d54617850726963657c613a323a7b693a303b733a313a2231223b693a313b733a313a2230223b7d6172725f6974656d5368697050726963657c613a323a7b693a303b733a343a22312e3030223b693a313b733a343a22302e3030223b7d6172725f73656c6c65725f69647c613a323a7b693a303b733a313a2233223b693a313b733a313a2232223b7d6172725f6f726465725f7374617475737c4e3b736869705f6e616d657c733a31343a224841534e4157492048415348494d223b736869705f616464726573737c733a32333a2231363630204b4f4b204c414e41532c4b454c414e54414e223b736869705f70686f6e657c733a31303a2230313432393638333633223b),
(0, '1gt6ien699pib5kovdo20qlkgnvl40tq', '::1', 1571536294, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313533363238393b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31363a22736164617364407961686f6f2e636f6d223b757365725f69647c733a313a2238223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731353335313032223b6c6173745f636865636b7c693a313537313533363239343b757365725f67726f75707c733a313a2231223b6d6573736167657c733a32393a223c703e4c6f6767656420496e205375636365737366756c6c793c2f703e223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d),
(0, '390b28ragbnf88akq8dm5a9nd747jeia', '::1', 1571543676, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313534333637363b6964656e746974797c733a343a2261776965223b757365726e616d657c733a343a2261776965223b656d61696c7c733a31353a22657265777740676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731333933373734223b6c6173745f636865636b7c693a313537313533353430303b757365725f67726f75707c733a313a2232223b636172745f636f6e74656e74737c613a343a7b733a31303a22636172745f746f74616c223b643a33323b733a31313a22746f74616c5f6974656d73223b643a323b733a33323a223962663331633766663036323933366139366433633862643166386632666633223b613a31343a7b733a323a226964223b733a323a223135223b733a343a226e616d65223b733a31343a224d55534554544920434f46464545223b733a353a227072696365223b643a31323b733a333a22717479223b643a313b733a393a226974656d5f636f6465223b733a373a2247454e4552414c223b733a363a22776569676874223b733a383a223230302e30303030223b733a393a2273656c6c65725f6964223b733a313a2233223b733a393a2273686f705f6e616d65223b733a363a224d2053686f70223b733a353a226d6f64616c223b733a353a2231302e3030223b733a31303a22756e69745f7072696365223b733a353a2231302e3030223b733a393a227461785f7072696365223b733a313a2231223b733a31303a22736869705f7072696365223b733a343a22312e3030223b733a353a22726f776964223b733a33323a223962663331633766663036323933366139366433633862643166386632666633223b733a383a22737562746f74616c223b643a31323b7d733a33323a226335316365343130633132346131306530646235653462393766633261663339223b613a31343a7b733a323a226964223b733a323a223133223b733a343a226e616d65223b733a31323a22475245454e20434f46464545223b733a353a227072696365223b643a32303b733a333a22717479223b643a313b733a393a226974656d5f636f6465223b733a373a2247454e4552414c223b733a363a22776569676874223b733a383a223230302e30303030223b733a393a2273656c6c65725f6964223b733a313a2232223b733a393a2273686f705f6e616d65223b733a363a225a2053686f70223b733a353a226d6f64616c223b733a353a2232302e3030223b733a31303a22756e69745f7072696365223b733a353a2232302e3030223b733a393a227461785f7072696365223b733a313a2230223b733a31303a22736869705f7072696365223b733a343a22302e3030223b733a353a22726f776964223b733a33323a226335316365343130633132346131306530646235653462393766633261663339223b733a383a22737562746f74616c223b643a32303b7d7d7061796d656e74737c733a31323a2243617368204465706f736974223b66756c6c5f6e616d657c733a31343a224841534e4157492048415348494d223b70686f6e657c733a31303a2230313432393638333633223b746f74616c5f616c6c7c733a323a223332223b746f74616c5f7765696768747c733a333a22343030223b6172725f6974656d49447c613a323a7b693a303b733a323a223135223b693a313b733a323a223133223b7d6172725f6974656d4e616d657c613a323a7b693a303b733a31343a224d55534554544920434f46464545223b693a313b733a31323a22475245454e20434f46464545223b7d6172725f6974656d5174797c613a323a7b693a303b733a313a2231223b693a313b733a313a2231223b7d6172725f6974656d50726963657c613a323a7b693a303b733a323a223132223b693a313b733a323a223230223b7d6172725f6974656d537562746f74616c7c613a323a7b693a303b733a323a223132223b693a313b733a323a223230223b7d6172725f6974656d4d6f64616c7c613a323a7b693a303b733a353a2231302e3030223b693a313b733a353a2232302e3030223b7d6172725f6974656d556e697450726963657c613a323a7b693a303b733a353a2231302e3030223b693a313b733a353a2232302e3030223b7d6172725f6974656d54617850726963657c613a323a7b693a303b733a313a2231223b693a313b733a313a2230223b7d6172725f6974656d5368697050726963657c613a323a7b693a303b733a343a22312e3030223b693a313b733a343a22302e3030223b7d6172725f73656c6c65725f69647c613a323a7b693a303b733a313a2233223b693a313b733a313a2232223b7d6172725f6f726465725f7374617475737c4e3b736869705f6e616d657c733a31343a224841534e4157492048415348494d223b736869705f616464726573737c733a32333a2231363630204b4f4b204c414e41532c4b454c414e54414e223b736869705f70686f6e657c733a31303a2230313432393638333633223b),
(0, '00effcjrh6shdol6aplc2kfu1d4sjps0', '::1', 1571543677, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313534333637363b6964656e746974797c733a343a2261776965223b757365726e616d657c733a343a2261776965223b656d61696c7c733a31353a22657265777740676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731333933373734223b6c6173745f636865636b7c693a313537313533353430303b757365725f67726f75707c733a313a2232223b636172745f636f6e74656e74737c613a343a7b733a31303a22636172745f746f74616c223b643a33323b733a31313a22746f74616c5f6974656d73223b643a323b733a33323a223962663331633766663036323933366139366433633862643166386632666633223b613a31343a7b733a323a226964223b733a323a223135223b733a343a226e616d65223b733a31343a224d55534554544920434f46464545223b733a353a227072696365223b643a31323b733a333a22717479223b643a313b733a393a226974656d5f636f6465223b733a373a2247454e4552414c223b733a363a22776569676874223b733a383a223230302e30303030223b733a393a2273656c6c65725f6964223b733a313a2233223b733a393a2273686f705f6e616d65223b733a363a224d2053686f70223b733a353a226d6f64616c223b733a353a2231302e3030223b733a31303a22756e69745f7072696365223b733a353a2231302e3030223b733a393a227461785f7072696365223b733a313a2231223b733a31303a22736869705f7072696365223b733a343a22312e3030223b733a353a22726f776964223b733a33323a223962663331633766663036323933366139366433633862643166386632666633223b733a383a22737562746f74616c223b643a31323b7d733a33323a226335316365343130633132346131306530646235653462393766633261663339223b613a31343a7b733a323a226964223b733a323a223133223b733a343a226e616d65223b733a31323a22475245454e20434f46464545223b733a353a227072696365223b643a32303b733a333a22717479223b643a313b733a393a226974656d5f636f6465223b733a373a2247454e4552414c223b733a363a22776569676874223b733a383a223230302e30303030223b733a393a2273656c6c65725f6964223b733a313a2232223b733a393a2273686f705f6e616d65223b733a363a225a2053686f70223b733a353a226d6f64616c223b733a353a2232302e3030223b733a31303a22756e69745f7072696365223b733a353a2232302e3030223b733a393a227461785f7072696365223b733a313a2230223b733a31303a22736869705f7072696365223b733a343a22302e3030223b733a353a22726f776964223b733a33323a226335316365343130633132346131306530646235653462393766633261663339223b733a383a22737562746f74616c223b643a32303b7d7d7061796d656e74737c733a31323a2243617368204465706f736974223b66756c6c5f6e616d657c733a31343a224841534e4157492048415348494d223b70686f6e657c733a31303a2230313432393638333633223b746f74616c5f616c6c7c733a323a223332223b746f74616c5f7765696768747c733a333a22343030223b6172725f6974656d49447c613a323a7b693a303b733a323a223135223b693a313b733a323a223133223b7d6172725f6974656d4e616d657c613a323a7b693a303b733a31343a224d55534554544920434f46464545223b693a313b733a31323a22475245454e20434f46464545223b7d6172725f6974656d5174797c613a323a7b693a303b733a313a2231223b693a313b733a313a2231223b7d6172725f6974656d50726963657c613a323a7b693a303b733a323a223132223b693a313b733a323a223230223b7d6172725f6974656d537562746f74616c7c613a323a7b693a303b733a323a223132223b693a313b733a323a223230223b7d6172725f6974656d4d6f64616c7c613a323a7b693a303b733a353a2231302e3030223b693a313b733a353a2232302e3030223b7d6172725f6974656d556e697450726963657c613a323a7b693a303b733a353a2231302e3030223b693a313b733a353a2232302e3030223b7d6172725f6974656d54617850726963657c613a323a7b693a303b733a313a2231223b693a313b733a313a2230223b7d6172725f6974656d5368697050726963657c613a323a7b693a303b733a343a22312e3030223b693a313b733a343a22302e3030223b7d6172725f73656c6c65725f69647c613a323a7b693a303b733a313a2233223b693a313b733a313a2232223b7d6172725f6f726465725f7374617475737c4e3b736869705f6e616d657c733a31343a224841534e4157492048415348494d223b736869705f616464726573737c733a32333a2231363630204b4f4b204c414e41532c4b454c414e54414e223b736869705f70686f6e657c733a31303a2230313432393638333633223b),
(0, 'v80emh1hbhcl65mvh7uppmaidttng2h0', '::1', 1571544034, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313534343033343b6964656e746974797c733a313a227a223b757365726e616d657c733a313a227a223b656d61696c7c733a32353a226861736e61776968617368696d343640676d61696c2e636f6d223b757365725f69647c733a323a223131223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731313838313332223b6c6173745f636865636b7c693a313537313534333734343b757365725f67726f75707c733a313a2232223b),
(0, 'sb9bp764o3omha0kdvpkeopnl37tds58', '::1', 1571544489, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313534343438393b6964656e746974797c733a313a227a223b757365726e616d657c733a313a227a223b656d61696c7c733a32353a226861736e61776968617368696d343640676d61696c2e636f6d223b757365725f69647c733a323a223131223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731313838313332223b6c6173745f636865636b7c693a313537313534333734343b757365725f67726f75707c733a313a2232223b),
(0, '3v9pf3gh4l9m2scaj0qktknunplqi6e3', '::1', 1571544947, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313534343934373b6964656e746974797c733a313a227a223b757365726e616d657c733a313a227a223b656d61696c7c733a32353a226861736e61776968617368696d343640676d61696c2e636f6d223b757365725f69647c733a323a223131223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731313838313332223b6c6173745f636865636b7c693a313537313534333734343b757365725f67726f75707c733a313a2232223b),
(0, 'nsbf3098dha3q7iguc2qu1q56tbrncid', '::1', 1571547599, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313534373539393b6964656e746974797c733a313a227a223b757365726e616d657c733a313a227a223b656d61696c7c733a32353a226861736e61776968617368696d343640676d61696c2e636f6d223b757365725f69647c733a323a223131223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731313838313332223b6c6173745f636865636b7c693a313537313534333734343b757365725f67726f75707c733a313a2232223b),
(0, 'hudl3p9nmvr4b3mlb0t46am9k5f0ll1i', '::1', 1571552183, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313535323138333b6964656e746974797c733a313a227a223b757365726e616d657c733a313a227a223b656d61696c7c733a32353a226861736e61776968617368696d343640676d61696c2e636f6d223b757365725f69647c733a323a223131223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731313838313332223b6c6173745f636865636b7c693a313537313534333734343b757365725f67726f75707c733a313a2232223b),
(0, '5vsld2hagfp34henkoim3gn8ccd4n6cc', '::1', 1571553153, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313535333135333b),
(0, '80of1gb2qdq7hcnd8mttcdj81omhssqn', '::1', 1571555697, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313535353639373b6964656e746974797c733a313a227a223b757365726e616d657c733a313a227a223b656d61696c7c733a32353a226861736e61776968617368696d343640676d61696c2e636f6d223b757365725f69647c733a323a223131223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731313838313332223b6c6173745f636865636b7c693a313537313534333734343b757365725f67726f75707c733a313a2232223b),
(0, 'fsm6js74g2lhhb0npehbgqmtiejqpafs', '::1', 1571555568, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313535353536383b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31363a22736164617364407961686f6f2e636f6d223b757365725f69647c733a313a2238223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731353336323934223b6c6173745f636865636b7c693a313537313535323332393b757365725f67726f75707c733a313a2231223b),
(0, '1pl7npv71k7428g17bu8q3ap0fuf89er', '::1', 1571552312, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313535323330393b),
(0, 'vt74p7emd9siahf0bes5pi27vu1gc9v1', '::1', 1571555914, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313535353931343b6964656e746974797c733a343a2261776965223b757365726e616d657c733a343a2261776965223b656d61696c7c733a32303a2268616e6965733138313040676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731353335343030223b6c6173745f636865636b7c693a313537313535333135333b757365725f67726f75707c733a313a2232223b),
(0, 'sddfdb21iasv5ddo4tecfs2tmi9b9j8b', '::1', 1571555879, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313535353837393b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31363a22736164617364407961686f6f2e636f6d223b757365725f69647c733a313a2238223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731353336323934223b6c6173745f636865636b7c693a313537313535323332393b757365725f67726f75707c733a313a2231223b),
(0, 'pc3uh5q2h4g70u403mrlatcjt62j6tij', '::1', 1571558601, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313535383630313b6964656e746974797c733a313a227a223b757365726e616d657c733a313a227a223b656d61696c7c733a32353a226861736e61776968617368696d343640676d61696c2e636f6d223b757365725f69647c733a323a223131223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731313838313332223b6c6173745f636865636b7c693a313537313534333734343b757365725f67726f75707c733a313a2232223b),
(0, 'puto4v5i9v7kgomj568ql05ih0cgkdhv', '::1', 1571558597, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313535383539373b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31363a22736164617364407961686f6f2e636f6d223b757365725f69647c733a313a2238223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731353336323934223b6c6173745f636865636b7c693a313537313535323332393b757365725f67726f75707c733a313a2231223b),
(0, 'vudr1qgn52g0et0u4mvqd82s13ish7vk', '::1', 1571556784, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313535363738343b6964656e746974797c733a343a2261776965223b757365726e616d657c733a343a2261776965223b656d61696c7c733a32303a2268616e6965733138313040676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731353335343030223b6c6173745f636865636b7c693a313537313535333135333b757365725f67726f75707c733a313a2232223b636172745f636f6e74656e74737c613a343a7b733a31303a22636172745f746f74616c223b643a33323b733a31313a22746f74616c5f6974656d73223b643a323b733a33323a226335316365343130633132346131306530646235653462393766633261663339223b613a31343a7b733a323a226964223b733a323a223133223b733a343a226e616d65223b733a31323a22475245454e20434f46464545223b733a353a227072696365223b643a32303b733a333a22717479223b643a313b733a393a226974656d5f636f6465223b733a373a2247454e4552414c223b733a363a22776569676874223b733a383a223230302e30303030223b733a393a2273656c6c65725f6964223b733a313a2232223b733a393a2273686f705f6e616d65223b733a363a225a2053686f70223b733a353a226d6f64616c223b733a353a2232302e3030223b733a31303a22756e69745f7072696365223b733a353a2232302e3030223b733a393a227461785f7072696365223b733a313a2230223b733a31303a22736869705f7072696365223b733a343a22302e3030223b733a353a22726f776964223b733a33323a226335316365343130633132346131306530646235653462393766633261663339223b733a383a22737562746f74616c223b643a32303b7d733a33323a223962663331633766663036323933366139366433633862643166386632666633223b613a31343a7b733a323a226964223b733a323a223135223b733a343a226e616d65223b733a31343a224d55534554544920434f46464545223b733a353a227072696365223b643a31323b733a333a22717479223b643a313b733a393a226974656d5f636f6465223b733a373a2247454e4552414c223b733a363a22776569676874223b733a383a223230302e30303030223b733a393a2273656c6c65725f6964223b733a313a2233223b733a393a2273686f705f6e616d65223b733a363a224d2053686f70223b733a353a226d6f64616c223b733a353a2231302e3030223b733a31303a22756e69745f7072696365223b733a353a2231302e3030223b733a393a227461785f7072696365223b733a313a2231223b733a31303a22736869705f7072696365223b733a343a22312e3030223b733a353a22726f776964223b733a33323a223962663331633766663036323933366139366433633862643166386632666633223b733a383a22737562746f74616c223b643a31323b7d7d),
(0, '9ebaq46q0bhv4hvgemtu1nuhhta2ahnf', '::1', 1571557159, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313535373135393b6964656e746974797c733a343a2261776965223b757365726e616d657c733a343a2261776965223b656d61696c7c733a32303a2268616e6965733138313040676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731353335343030223b6c6173745f636865636b7c693a313537313535333135333b757365725f67726f75707c733a313a2232223b636172745f636f6e74656e74737c613a343a7b733a31303a22636172745f746f74616c223b643a33323b733a31313a22746f74616c5f6974656d73223b643a323b733a33323a226335316365343130633132346131306530646235653462393766633261663339223b613a31343a7b733a323a226964223b733a323a223133223b733a343a226e616d65223b733a31323a22475245454e20434f46464545223b733a353a227072696365223b643a32303b733a333a22717479223b643a313b733a393a226974656d5f636f6465223b733a373a2247454e4552414c223b733a363a22776569676874223b733a383a223230302e30303030223b733a393a2273656c6c65725f6964223b733a313a2232223b733a393a2273686f705f6e616d65223b733a363a225a2053686f70223b733a353a226d6f64616c223b733a353a2232302e3030223b733a31303a22756e69745f7072696365223b733a353a2232302e3030223b733a393a227461785f7072696365223b733a313a2230223b733a31303a22736869705f7072696365223b733a343a22302e3030223b733a353a22726f776964223b733a33323a226335316365343130633132346131306530646235653462393766633261663339223b733a383a22737562746f74616c223b643a32303b7d733a33323a223962663331633766663036323933366139366433633862643166386632666633223b613a31343a7b733a323a226964223b733a323a223135223b733a343a226e616d65223b733a31343a224d55534554544920434f46464545223b733a353a227072696365223b643a31323b733a333a22717479223b643a313b733a393a226974656d5f636f6465223b733a373a2247454e4552414c223b733a363a22776569676874223b733a383a223230302e30303030223b733a393a2273656c6c65725f6964223b733a313a2233223b733a393a2273686f705f6e616d65223b733a363a224d2053686f70223b733a353a226d6f64616c223b733a353a2231302e3030223b733a31303a22756e69745f7072696365223b733a353a2231302e3030223b733a393a227461785f7072696365223b733a313a2231223b733a31303a22736869705f7072696365223b733a343a22312e3030223b733a353a22726f776964223b733a33323a223962663331633766663036323933366139366433633862643166386632666633223b733a383a22737562746f74616c223b643a31323b7d7d7061796d656e74737c733a31323a2243617368204465706f736974223b66756c6c5f6e616d657c733a31343a224841534e4157492048415348494d223b70686f6e657c733a31303a2230313432393638333633223b746f74616c5f616c6c7c733a323a223332223b746f74616c5f7765696768747c733a333a22343030223b6172725f6974656d49447c613a323a7b693a303b733a323a223133223b693a313b733a323a223135223b7d6172725f6974656d4e616d657c613a323a7b693a303b733a31323a22475245454e20434f46464545223b693a313b733a31343a224d55534554544920434f46464545223b7d6172725f6974656d5174797c613a323a7b693a303b733a313a2231223b693a313b733a313a2231223b7d6172725f6974656d50726963657c613a323a7b693a303b733a323a223230223b693a313b733a323a223132223b7d6172725f6974656d537562746f74616c7c613a323a7b693a303b733a323a223230223b693a313b733a323a223132223b7d6172725f6974656d4d6f64616c7c613a323a7b693a303b733a353a2232302e3030223b693a313b733a353a2231302e3030223b7d6172725f6974656d556e697450726963657c613a323a7b693a303b733a353a2232302e3030223b693a313b733a353a2231302e3030223b7d6172725f6974656d54617850726963657c613a323a7b693a303b733a313a2230223b693a313b733a313a2231223b7d6172725f6974656d5368697050726963657c613a323a7b693a303b733a343a22302e3030223b693a313b733a343a22312e3030223b7d6172725f73656c6c65725f69647c613a323a7b693a303b733a313a2232223b693a313b733a313a2233223b7d736869705f6e616d657c733a31343a224841534e4157492048415348494d223b736869705f616464726573737c733a32333a2231363630204b4f4b204c414e41532c4b454c414e54414e223b736869705f70686f6e657c733a31303a2230313432393638333633223b),
(0, 'jup6ot5ekg85rii1l8tgvonkuec22s3q', '::1', 1571558813, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313535383831333b6964656e746974797c733a343a2261776965223b757365726e616d657c733a343a2261776965223b656d61696c7c733a32303a2268616e6965733138313040676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731353335343030223b6c6173745f636865636b7c693a313537313535333135333b757365725f67726f75707c733a313a2232223b636172745f636f6e74656e74737c613a343a7b733a31303a22636172745f746f74616c223b643a33323b733a31313a22746f74616c5f6974656d73223b643a323b733a33323a226335316365343130633132346131306530646235653462393766633261663339223b613a31343a7b733a323a226964223b733a323a223133223b733a343a226e616d65223b733a31323a22475245454e20434f46464545223b733a353a227072696365223b643a32303b733a333a22717479223b643a313b733a393a226974656d5f636f6465223b733a373a2247454e4552414c223b733a363a22776569676874223b733a383a223230302e30303030223b733a393a2273656c6c65725f6964223b733a313a2232223b733a393a2273686f705f6e616d65223b733a363a225a2053686f70223b733a353a226d6f64616c223b733a353a2232302e3030223b733a31303a22756e69745f7072696365223b733a353a2232302e3030223b733a393a227461785f7072696365223b733a313a2230223b733a31303a22736869705f7072696365223b733a343a22302e3030223b733a353a22726f776964223b733a33323a226335316365343130633132346131306530646235653462393766633261663339223b733a383a22737562746f74616c223b643a32303b7d733a33323a223962663331633766663036323933366139366433633862643166386632666633223b613a31343a7b733a323a226964223b733a323a223135223b733a343a226e616d65223b733a31343a224d55534554544920434f46464545223b733a353a227072696365223b643a31323b733a333a22717479223b643a313b733a393a226974656d5f636f6465223b733a373a2247454e4552414c223b733a363a22776569676874223b733a383a223230302e30303030223b733a393a2273656c6c65725f6964223b733a313a2233223b733a393a2273686f705f6e616d65223b733a363a224d2053686f70223b733a353a226d6f64616c223b733a353a2231302e3030223b733a31303a22756e69745f7072696365223b733a353a2231302e3030223b733a393a227461785f7072696365223b733a313a2231223b733a31303a22736869705f7072696365223b733a343a22312e3030223b733a353a22726f776964223b733a33323a223962663331633766663036323933366139366433633862643166386632666633223b733a383a22737562746f74616c223b643a31323b7d7d7061796d656e74737c733a31323a2243617368204465706f736974223b66756c6c5f6e616d657c733a31343a224841534e4157492048415348494d223b70686f6e657c733a31303a2230313432393638333633223b746f74616c5f616c6c7c733a323a223332223b746f74616c5f7765696768747c733a333a22343030223b6172725f6974656d49447c613a323a7b693a303b733a323a223133223b693a313b733a323a223135223b7d6172725f6974656d4e616d657c613a323a7b693a303b733a31323a22475245454e20434f46464545223b693a313b733a31343a224d55534554544920434f46464545223b7d6172725f6974656d5174797c613a323a7b693a303b733a313a2231223b693a313b733a313a2231223b7d6172725f6974656d50726963657c613a323a7b693a303b733a323a223230223b693a313b733a323a223132223b7d6172725f6974656d537562746f74616c7c613a323a7b693a303b733a323a223230223b693a313b733a323a223132223b7d6172725f6974656d4d6f64616c7c613a323a7b693a303b733a353a2232302e3030223b693a313b733a353a2231302e3030223b7d6172725f6974656d556e697450726963657c613a323a7b693a303b733a353a2232302e3030223b693a313b733a353a2231302e3030223b7d6172725f6974656d54617850726963657c613a323a7b693a303b733a313a2230223b693a313b733a313a2231223b7d6172725f6974656d5368697050726963657c613a323a7b693a303b733a343a22302e3030223b693a313b733a343a22312e3030223b7d6172725f73656c6c65725f69647c613a323a7b693a303b733a313a2232223b693a313b733a313a2233223b7d736869705f6e616d657c733a31343a224841534e4157492048415348494d223b736869705f616464726573737c733a32333a2231363630204b4f4b204c414e41532c4b454c414e54414e223b736869705f70686f6e657c733a31303a2230313432393638333633223b),
(0, 'h40g1l8m5tsk79gfmuaj29sr75j4gvl5', '::1', 1571559166, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313535393136363b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31363a22736164617364407961686f6f2e636f6d223b757365725f69647c733a313a2238223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731353336323934223b6c6173745f636865636b7c693a313537313535323332393b757365725f67726f75707c733a313a2231223b),
(0, 'b70a64q8kmt4vh96q6lqhnqfqt4oldf2', '::1', 1571559152, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313535393135323b6964656e746974797c733a313a227a223b757365726e616d657c733a313a227a223b656d61696c7c733a32353a226861736e61776968617368696d343640676d61696c2e636f6d223b757365725f69647c733a323a223131223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731313838313332223b6c6173745f636865636b7c693a313537313534333734343b757365725f67726f75707c733a313a2232223b),
(0, 'mueu27lj6maaa08tqapm3c2prg74qb0f', '::1', 1571559787, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313535393738373b6964656e746974797c733a343a2261776965223b757365726e616d657c733a343a2261776965223b656d61696c7c733a32303a2268616e6965733138313040676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731353335343030223b6c6173745f636865636b7c693a313537313535333135333b757365725f67726f75707c733a313a2232223b636172745f636f6e74656e74737c613a343a7b733a31303a22636172745f746f74616c223b643a33323b733a31313a22746f74616c5f6974656d73223b643a323b733a33323a226335316365343130633132346131306530646235653462393766633261663339223b613a31343a7b733a323a226964223b733a323a223133223b733a343a226e616d65223b733a31323a22475245454e20434f46464545223b733a353a227072696365223b643a32303b733a333a22717479223b643a313b733a393a226974656d5f636f6465223b733a373a2247454e4552414c223b733a363a22776569676874223b733a383a223230302e30303030223b733a393a2273656c6c65725f6964223b733a313a2232223b733a393a2273686f705f6e616d65223b733a363a225a2053686f70223b733a353a226d6f64616c223b733a353a2232302e3030223b733a31303a22756e69745f7072696365223b733a353a2232302e3030223b733a393a227461785f7072696365223b733a313a2230223b733a31303a22736869705f7072696365223b733a343a22302e3030223b733a353a22726f776964223b733a33323a226335316365343130633132346131306530646235653462393766633261663339223b733a383a22737562746f74616c223b643a32303b7d733a33323a223962663331633766663036323933366139366433633862643166386632666633223b613a31343a7b733a323a226964223b733a323a223135223b733a343a226e616d65223b733a31343a224d55534554544920434f46464545223b733a353a227072696365223b643a31323b733a333a22717479223b643a313b733a393a226974656d5f636f6465223b733a373a2247454e4552414c223b733a363a22776569676874223b733a383a223230302e30303030223b733a393a2273656c6c65725f6964223b733a313a2233223b733a393a2273686f705f6e616d65223b733a363a224d2053686f70223b733a353a226d6f64616c223b733a353a2231302e3030223b733a31303a22756e69745f7072696365223b733a353a2231302e3030223b733a393a227461785f7072696365223b733a313a2231223b733a31303a22736869705f7072696365223b733a343a22312e3030223b733a353a22726f776964223b733a33323a223962663331633766663036323933366139366433633862643166386632666633223b733a383a22737562746f74616c223b643a31323b7d7d7061796d656e74737c733a31323a2243617368204465706f736974223b66756c6c5f6e616d657c733a31343a224841534e4157492048415348494d223b70686f6e657c733a31303a2230313432393638333633223b746f74616c5f616c6c7c733a323a223332223b746f74616c5f7765696768747c733a333a22343030223b6172725f6974656d49447c613a323a7b693a303b733a323a223133223b693a313b733a323a223135223b7d6172725f6974656d4e616d657c613a323a7b693a303b733a31323a22475245454e20434f46464545223b693a313b733a31343a224d55534554544920434f46464545223b7d6172725f6974656d5174797c613a323a7b693a303b733a313a2231223b693a313b733a313a2231223b7d6172725f6974656d50726963657c613a323a7b693a303b733a323a223230223b693a313b733a323a223132223b7d6172725f6974656d537562746f74616c7c613a323a7b693a303b733a323a223230223b693a313b733a323a223132223b7d6172725f6974656d4d6f64616c7c613a323a7b693a303b733a353a2232302e3030223b693a313b733a353a2231302e3030223b7d6172725f6974656d556e697450726963657c613a323a7b693a303b733a353a2232302e3030223b693a313b733a353a2231302e3030223b7d6172725f6974656d54617850726963657c613a323a7b693a303b733a313a2230223b693a313b733a313a2231223b7d6172725f6974656d5368697050726963657c613a323a7b693a303b733a343a22302e3030223b693a313b733a343a22312e3030223b7d6172725f73656c6c65725f69647c613a323a7b693a303b733a313a2232223b693a313b733a313a2233223b7d736869705f6e616d657c733a31343a224841534e4157492048415348494d223b736869705f616464726573737c733a32333a2231363630204b4f4b204c414e41532c4b454c414e54414e223b736869705f70686f6e657c733a31303a2230313432393638333633223b),
(0, 'nrgb9ffbe3lkode3asr1gat0cdkb7mcp', '::1', 1571560408, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313536303430383b6964656e746974797c733a313a227a223b757365726e616d657c733a313a227a223b656d61696c7c733a32353a226861736e61776968617368696d343640676d61696c2e636f6d223b757365725f69647c733a323a223131223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731313838313332223b6c6173745f636865636b7c693a313537313534333734343b757365725f67726f75707c733a313a2232223b),
(0, 'ph1a5kqs26o8i5hjg6672ok2jch9lhge', '::1', 1571559568, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313535393536383b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31363a22736164617364407961686f6f2e636f6d223b757365725f69647c733a313a2238223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731353336323934223b6c6173745f636865636b7c693a313537313535323332393b757365725f67726f75707c733a313a2231223b),
(0, 'ltmcm36mjafd8ed0hmp83uraqhp87fq4', '::1', 1571559885, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313535393838353b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31363a22736164617364407961686f6f2e636f6d223b757365725f69647c733a313a2238223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731353336323934223b6c6173745f636865636b7c693a313537313535323332393b757365725f67726f75707c733a313a2231223b),
(0, 'tej9pmhg8mn2e2e5e8d8kq8tue92fneg', '::1', 1571560365, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313536303336353b6964656e746974797c733a343a2261776965223b757365726e616d657c733a343a2261776965223b656d61696c7c733a32303a2268616e6965733138313040676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731353335343030223b6c6173745f636865636b7c693a313537313535333135333b757365725f67726f75707c733a313a2232223b636172745f636f6e74656e74737c613a343a7b733a31303a22636172745f746f74616c223b643a33323b733a31313a22746f74616c5f6974656d73223b643a323b733a33323a226335316365343130633132346131306530646235653462393766633261663339223b613a31343a7b733a323a226964223b733a323a223133223b733a343a226e616d65223b733a31323a22475245454e20434f46464545223b733a353a227072696365223b643a32303b733a333a22717479223b643a313b733a393a226974656d5f636f6465223b733a373a2247454e4552414c223b733a363a22776569676874223b733a383a223230302e30303030223b733a393a2273656c6c65725f6964223b733a313a2232223b733a393a2273686f705f6e616d65223b733a363a225a2053686f70223b733a353a226d6f64616c223b733a353a2232302e3030223b733a31303a22756e69745f7072696365223b733a353a2232302e3030223b733a393a227461785f7072696365223b733a313a2230223b733a31303a22736869705f7072696365223b733a343a22302e3030223b733a353a22726f776964223b733a33323a226335316365343130633132346131306530646235653462393766633261663339223b733a383a22737562746f74616c223b643a32303b7d733a33323a223962663331633766663036323933366139366433633862643166386632666633223b613a31343a7b733a323a226964223b733a323a223135223b733a343a226e616d65223b733a31343a224d55534554544920434f46464545223b733a353a227072696365223b643a31323b733a333a22717479223b643a313b733a393a226974656d5f636f6465223b733a373a2247454e4552414c223b733a363a22776569676874223b733a383a223230302e30303030223b733a393a2273656c6c65725f6964223b733a313a2233223b733a393a2273686f705f6e616d65223b733a363a224d2053686f70223b733a353a226d6f64616c223b733a353a2231302e3030223b733a31303a22756e69745f7072696365223b733a353a2231302e3030223b733a393a227461785f7072696365223b733a313a2231223b733a31303a22736869705f7072696365223b733a343a22312e3030223b733a353a22726f776964223b733a33323a223962663331633766663036323933366139366433633862643166386632666633223b733a383a22737562746f74616c223b643a31323b7d7d7061796d656e74737c733a31323a2243617368204465706f736974223b66756c6c5f6e616d657c733a31343a224841534e4157492048415348494d223b70686f6e657c733a31303a2230313432393638333633223b746f74616c5f616c6c7c733a323a223332223b746f74616c5f7765696768747c733a333a22343030223b6172725f6974656d49447c613a323a7b693a303b733a323a223133223b693a313b733a323a223135223b7d6172725f6974656d4e616d657c613a323a7b693a303b733a31323a22475245454e20434f46464545223b693a313b733a31343a224d55534554544920434f46464545223b7d6172725f6974656d5174797c613a323a7b693a303b733a313a2231223b693a313b733a313a2231223b7d6172725f6974656d50726963657c613a323a7b693a303b733a323a223230223b693a313b733a323a223132223b7d6172725f6974656d537562746f74616c7c613a323a7b693a303b733a323a223230223b693a313b733a323a223132223b7d6172725f6974656d4d6f64616c7c613a323a7b693a303b733a353a2232302e3030223b693a313b733a353a2231302e3030223b7d6172725f6974656d556e697450726963657c613a323a7b693a303b733a353a2232302e3030223b693a313b733a353a2231302e3030223b7d6172725f6974656d54617850726963657c613a323a7b693a303b733a313a2230223b693a313b733a313a2231223b7d6172725f6974656d5368697050726963657c613a323a7b693a303b733a343a22302e3030223b693a313b733a343a22312e3030223b7d6172725f73656c6c65725f69647c613a323a7b693a303b733a313a2232223b693a313b733a313a2233223b7d736869705f6e616d657c733a31343a224841534e4157492048415348494d223b736869705f616464726573737c733a32333a2231363630204b4f4b204c414e41532c4b454c414e54414e223b736869705f70686f6e657c733a31303a2230313432393638333633223b),
(0, 'ftj2le25cpas3h5j8g4b1vae7pa6psrf', '::1', 1571560405, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313536303430353b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31363a22736164617364407961686f6f2e636f6d223b757365725f69647c733a313a2238223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731353336323934223b6c6173745f636865636b7c693a313537313535323332393b757365725f67726f75707c733a313a2231223b),
(0, 'renbcc2m9ebrb9g0b562b274jo1va2r4', '::1', 1571560609, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313536303336353b6964656e746974797c733a343a2261776965223b757365726e616d657c733a343a2261776965223b656d61696c7c733a32303a2268616e6965733138313040676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731353335343030223b6c6173745f636865636b7c693a313537313535333135333b757365725f67726f75707c733a313a2232223b636172745f636f6e74656e74737c613a353a7b733a31303a22636172745f746f74616c223b643a33392e30363b733a31313a22746f74616c5f6974656d73223b643a333b733a33323a226335316365343130633132346131306530646235653462393766633261663339223b613a31343a7b733a323a226964223b733a323a223133223b733a343a226e616d65223b733a31323a22475245454e20434f46464545223b733a353a227072696365223b643a32303b733a333a22717479223b643a313b733a393a226974656d5f636f6465223b733a373a2247454e4552414c223b733a363a22776569676874223b733a383a223230302e30303030223b733a393a2273656c6c65725f6964223b733a313a2232223b733a393a2273686f705f6e616d65223b733a363a225a2053686f70223b733a353a226d6f64616c223b733a353a2232302e3030223b733a31303a22756e69745f7072696365223b733a353a2232302e3030223b733a393a227461785f7072696365223b733a313a2230223b733a31303a22736869705f7072696365223b733a343a22302e3030223b733a353a22726f776964223b733a33323a226335316365343130633132346131306530646235653462393766633261663339223b733a383a22737562746f74616c223b643a32303b7d733a33323a223962663331633766663036323933366139366433633862643166386632666633223b613a31343a7b733a323a226964223b733a323a223135223b733a343a226e616d65223b733a31343a224d55534554544920434f46464545223b733a353a227072696365223b643a31323b733a333a22717479223b643a313b733a393a226974656d5f636f6465223b733a373a2247454e4552414c223b733a363a22776569676874223b733a383a223230302e30303030223b733a393a2273656c6c65725f6964223b733a313a2233223b733a393a2273686f705f6e616d65223b733a363a224d2053686f70223b733a353a226d6f64616c223b733a353a2231302e3030223b733a31303a22756e69745f7072696365223b733a353a2231302e3030223b733a393a227461785f7072696365223b733a313a2231223b733a31303a22736869705f7072696365223b733a343a22312e3030223b733a353a22726f776964223b733a33323a223962663331633766663036323933366139366433633862643166386632666633223b733a383a22737562746f74616c223b643a31323b7d733a33323a226332306164346437366665393737353961613237613063393962666636373130223b613a31343a7b733a323a226964223b733a323a223132223b733a343a226e616d65223b733a31303a2243414645204d4f434841223b733a353a227072696365223b643a372e30363b733a333a22717479223b643a313b733a393a226974656d5f636f6465223b733a373a2247454e4552414c223b733a363a22776569676874223b733a373a2232302e30303030223b733a393a2273656c6c65725f6964223b733a313a2232223b733a393a2273686f705f6e616d65223b733a363a225a2053686f70223b733a353a226d6f64616c223b733a343a22352e3030223b733a31303a22756e69745f7072696365223b733a343a22362e3030223b733a393a227461785f7072696365223b733a343a22302e3036223b733a31303a22736869705f7072696365223b733a343a22312e3030223b733a353a22726f776964223b733a33323a226332306164346437366665393737353961613237613063393962666636373130223b733a383a22737562746f74616c223b643a372e30363b7d7d7061796d656e74737c733a31323a2243617368204465706f736974223b66756c6c5f6e616d657c733a31343a224841534e4157492048415348494d223b70686f6e657c733a31303a2230313432393638333633223b746f74616c5f616c6c7c733a353a2233392e3036223b746f74616c5f7765696768747c733a333a22343230223b6172725f6974656d49447c613a333a7b693a303b733a323a223133223b693a313b733a323a223135223b693a323b733a323a223132223b7d6172725f6974656d4e616d657c613a333a7b693a303b733a31323a22475245454e20434f46464545223b693a313b733a31343a224d55534554544920434f46464545223b693a323b733a31303a2243414645204d4f434841223b7d6172725f6974656d5174797c613a333a7b693a303b733a313a2231223b693a313b733a313a2231223b693a323b733a313a2231223b7d6172725f6974656d50726963657c613a333a7b693a303b733a323a223230223b693a313b733a323a223132223b693a323b733a343a22372e3036223b7d6172725f6974656d537562746f74616c7c613a333a7b693a303b733a323a223230223b693a313b733a323a223132223b693a323b733a343a22372e3036223b7d6172725f6974656d4d6f64616c7c613a333a7b693a303b733a353a2232302e3030223b693a313b733a353a2231302e3030223b693a323b733a343a22352e3030223b7d6172725f6974656d556e697450726963657c613a333a7b693a303b733a353a2232302e3030223b693a313b733a353a2231302e3030223b693a323b733a343a22362e3030223b7d6172725f6974656d54617850726963657c613a333a7b693a303b733a313a2230223b693a313b733a313a2231223b693a323b733a343a22302e3036223b7d6172725f6974656d5368697050726963657c613a333a7b693a303b733a343a22302e3030223b693a313b733a343a22312e3030223b693a323b733a343a22312e3030223b7d6172725f73656c6c65725f69647c613a333a7b693a303b733a313a2232223b693a313b733a313a2233223b693a323b733a313a2232223b7d736869705f6e616d657c733a31343a224841534e4157492048415348494d223b736869705f616464726573737c733a32333a2231363630204b4f4b204c414e41532c4b454c414e54414e223b736869705f70686f6e657c733a31303a2230313432393638333633223b),
(0, 'qrdt06a478e18jacvmm62t2s51srpsup', '::1', 1571560823, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313536303832333b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31363a22736164617364407961686f6f2e636f6d223b757365725f69647c733a313a2238223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731353336323934223b6c6173745f636865636b7c693a313537313535323332393b757365725f67726f75707c733a313a2231223b),
(0, 'tkhtnsgm9qpn9kd77mmcg08fqg5jtmh3', '::1', 1571560788, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313536303738383b6964656e746974797c733a313a227a223b757365726e616d657c733a313a227a223b656d61696c7c733a32353a226861736e61776968617368696d343640676d61696c2e636f6d223b757365725f69647c733a323a223131223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731313838313332223b6c6173745f636865636b7c693a313537313534333734343b757365725f67726f75707c733a313a2232223b);
INSERT INTO `ci_sessions` (`ai`, `id`, `ip_address`, `timestamp`, `data`) VALUES
(0, '685sc6sqn1q6c6dsg30s11r2tq5c916e', '::1', 1571560789, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313536303738383b6964656e746974797c733a313a227a223b757365726e616d657c733a313a227a223b656d61696c7c733a32353a226861736e61776968617368696d343640676d61696c2e636f6d223b757365725f69647c733a323a223131223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731313838313332223b6c6173745f636865636b7c693a313537313534333734343b757365725f67726f75707c733a313a2232223b),
(0, 'ingjuugnbc6kgm9eo6d5130db533b9sg', '::1', 1571561949, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313536313934393b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31363a22736164617364407961686f6f2e636f6d223b757365725f69647c733a313a2238223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731353336323934223b6c6173745f636865636b7c693a313537313535323332393b757365725f67726f75707c733a313a2231223b),
(0, 'ipflno8otpn9iel0vli98u94ae9dvne7', '::1', 1571562206, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313536313934393b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31363a22736164617364407961686f6f2e636f6d223b757365725f69647c733a313a2238223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731353336323934223b6c6173745f636865636b7c693a313537313535323332393b757365725f67726f75707c733a313a2231223b),
(0, 'kl0m20umj7nddbkgu6vdrlotskem3od8', '::1', 1571620583, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313632303439353b6964656e746974797c733a343a2261776965223b757365726e616d657c733a343a2261776965223b656d61696c7c733a32303a2268616e6965733138313040676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731353533313533223b6c6173745f636865636b7c693a313537313632303537363b757365725f67726f75707c733a313a2232223b),
(0, 'vfl7u7u6hdu0n0ddh2aq81p7jkg0mbbf', '::1', 1571620847, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313632303834373b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31363a22736164617364407961686f6f2e636f6d223b757365725f69647c733a313a2238223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731353532333239223b6c6173745f636865636b7c693a313537313632303535333b757365725f67726f75707c733a313a2231223b6d6573736167657c733a32393a223c703e4c6f6767656420496e205375636365737366756c6c793c2f703e223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d),
(0, 'foljm7uecntsafdrd0cn2l8bi16lb1sf', '::1', 1571622238, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313632323233383b6964656e746974797c733a313a227a223b757365726e616d657c733a313a227a223b656d61696c7c733a32353a226861736e61776968617368696d343640676d61696c2e636f6d223b757365725f69647c733a323a223131223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731353433373434223b6c6173745f636865636b7c693a313537313632303536363b757365725f67726f75707c733a313a2232223b6d6573736167657c733a32393a223c703e4c6f6767656420496e205375636365737366756c6c793c2f703e223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d),
(0, '3h4fud30vbbmmfpqibdomupo9gnnd9t6', '::1', 1571621360, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313632313336303b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31363a22736164617364407961686f6f2e636f6d223b757365725f69647c733a313a2238223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731353532333239223b6c6173745f636865636b7c693a313537313632303535333b757365725f67726f75707c733a313a2231223b),
(0, '07j2i6mmi8fp4bdg7o3h3unoelfmad1v', '::1', 1571621663, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313632313636333b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31363a22736164617364407961686f6f2e636f6d223b757365725f69647c733a313a2238223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731353532333239223b6c6173745f636865636b7c693a313537313632303535333b757365725f67726f75707c733a313a2231223b),
(0, 'f95v318p7p81e667b3issb435ir6ikvv', '::1', 1571622165, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313632323136353b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31363a22736164617364407961686f6f2e636f6d223b757365725f69647c733a313a2238223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731353532333239223b6c6173745f636865636b7c693a313537313632303535333b757365725f67726f75707c733a313a2231223b),
(0, '3bj1tl8nv8c8s8q6svceg6c03c79c2ni', '::1', 1571622662, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313632323636323b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31363a22736164617364407961686f6f2e636f6d223b757365725f69647c733a313a2238223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731353532333239223b6c6173745f636865636b7c693a313537313632303535333b757365725f67726f75707c733a313a2231223b),
(0, 'r6ha4t808v8on3krg7ld1ep889t90vn6', '::1', 1571622732, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313632323733323b6964656e746974797c733a313a227a223b757365726e616d657c733a313a227a223b656d61696c7c733a32353a226861736e61776968617368696d343640676d61696c2e636f6d223b757365725f69647c733a323a223131223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731353433373434223b6c6173745f636865636b7c693a313537313632303536363b757365725f67726f75707c733a313a2232223b),
(0, '85akltshg43ev85dh8n0o4074pc595kk', '::1', 1571623223, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313632333232333b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31363a22736164617364407961686f6f2e636f6d223b757365725f69647c733a313a2238223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731353532333239223b6c6173745f636865636b7c693a313537313632303535333b757365725f67726f75707c733a313a2231223b),
(0, '4rlbilmrmhmqk4uq3mth8uvu2arabi5k', '::1', 1571622782, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313632323733323b6964656e746974797c733a313a227a223b757365726e616d657c733a313a227a223b656d61696c7c733a32353a226861736e61776968617368696d343640676d61696c2e636f6d223b757365725f69647c733a323a223131223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731353433373434223b6c6173745f636865636b7c693a313537313632303536363b757365725f67726f75707c733a313a2232223b),
(0, '90qmt33qr07hj2gr10phbfh7vfh3os0b', '::1', 1571623584, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313632333538343b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31363a22736164617364407961686f6f2e636f6d223b757365725f69647c733a313a2238223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731353532333239223b6c6173745f636865636b7c693a313537313632303535333b757365725f67726f75707c733a313a2231223b),
(0, 'r0te0rqbh6tvmg39tsm83u04dfvu0veq', '::1', 1571624094, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313632343039343b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31363a22736164617364407961686f6f2e636f6d223b757365725f69647c733a313a2238223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731353532333239223b6c6173745f636865636b7c693a313537313632303535333b757365725f67726f75707c733a313a2231223b),
(0, '705vulj1vsn82hqenj5rrjri9qenui10', '::1', 1571624376, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313632343039343b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31363a22736164617364407961686f6f2e636f6d223b757365725f69647c733a313a2238223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731353532333239223b6c6173745f636865636b7c693a313537313632303535333b757365725f67726f75707c733a313a2231223b),
(0, 'kq06niqpah83a6h89o2g1iuvcbqa8ao0', '::1', 1571639699, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313633393639323b),
(0, 'mts68m1ktub3bo5nti9a4r291mrrbjlf', '::1', 1571646418, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313634363231333b6964656e746974797c733a313a227a223b757365726e616d657c733a313a227a223b656d61696c7c733a32353a226861736e61776968617368696d343640676d61696c2e636f6d223b757365725f69647c733a323a223131223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731363230353636223b6c6173745f636865636b7c693a313537313634363231353b757365725f67726f75707c733a313a2232223b),
(0, '2boggsqr964dalnou1su5mhbedrtdn02', '::1', 1571646452, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537313634363234343b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31363a22736164617364407961686f6f2e636f6d223b757365725f69647c733a313a2238223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353731363230353533223b6c6173745f636865636b7c693a313537313634363236343b757365725f67726f75707c733a313a2231223b);

-- --------------------------------------------------------

--
-- Table structure for table `ci_shipping`
--

CREATE TABLE `ci_shipping` (
  `shipping_id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `ship_name` varchar(100) NOT NULL,
  `ship_phone` varchar(20) NOT NULL,
  `ship_address` text NOT NULL,
  `ship_default` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_shipping`
--

INSERT INTO `ci_shipping` (`shipping_id`, `user_id`, `order_id`, `ship_name`, `ship_phone`, `ship_address`, `ship_default`) VALUES
(1, 2, NULL, 'HASNAWI HASHIM', '0142968363', '1660 KOK LANAS,KELANTAN', 1),
(43, 11, NULL, 'Z', '01212121212', 'KB', 1),
(46, 12, NULL, 'M', '087868767', 'KB', 1),
(72, 2, 34, 'HASNAWI HASHIM', '0142968363', '1660 KOK LANAS,KELANTAN', NULL),
(74, 2, 36, 'HASNAWI HASHIM', '0142968363', '1660 KOK LANAS,KELANTAN', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ci_temp_siri`
--

CREATE TABLE `ci_temp_siri` (
  `record_id` int(11) NOT NULL,
  `serial_no` varchar(20) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(255) NOT NULL,
  `owner_id` int(11) DEFAULT NULL COMMENT 'customer_id',
  `owner` varchar(16) NOT NULL COMMENT 'customer, company',
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_temp_siri`
--

INSERT INTO `ci_temp_siri` (`record_id`, `serial_no`, `product_id`, `order_id`, `owner_id`, `owner`, `created_date`) VALUES
(32, '23123', 13, 36, 2, 'customer', '2019-10-21 02:07:32'),
(33, '12312', 12, 36, 2, 'customer', '2019-10-21 02:07:32'),
(34, '211211', 15, 36, 2, 'customer', '2019-10-21 02:19:03');

-- --------------------------------------------------------

--
-- Table structure for table `ci_tracking`
--

CREATE TABLE `ci_tracking` (
  `tracking_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `tracking_code` varchar(200) NOT NULL,
  `courier_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ci_transaction`
--

CREATE TABLE `ci_transaction` (
  `transaction_id` int(11) NOT NULL,
  `transaction_status` int(11) NOT NULL COMMENT '1=payment dibuat; 2=process order; 3=shipping dibuat; 4=transfer to seller; 5=cancel/refund',
  `transaction_record` timestamp NOT NULL DEFAULT current_timestamp(),
  `next_transaction` timestamp NULL DEFAULT current_timestamp(),
  `order_status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_transaction`
--

INSERT INTO `ci_transaction` (`transaction_id`, `transaction_status`, `transaction_record`, `next_transaction`, `order_status_id`) VALUES
(17, 0, '2019-10-20 07:33:06', '2019-10-21 07:33:06', 39),
(18, 0, '2019-10-20 07:33:08', '2019-10-21 07:33:08', 40),
(19, 5, '2019-10-20 08:06:54', '2019-10-23 08:06:54', 39),
(20, 5, '2019-10-20 08:06:55', '2019-10-23 08:06:55', 40),
(23, 0, '2019-10-20 08:33:15', '2019-10-21 08:33:15', 43),
(24, 0, '2019-10-20 08:33:15', '2019-10-21 08:33:15', 44),
(25, 5, '2019-10-20 08:36:47', '2019-10-23 08:36:47', 43),
(26, 5, '2019-10-20 08:36:47', '2019-10-23 08:36:47', 44),
(27, 1, '2019-10-21 01:46:27', '2019-10-24 01:46:27', 43),
(28, 2, '2019-10-21 02:07:32', '2019-10-24 01:46:27', 43),
(29, 1, '2019-10-21 02:18:54', '2019-10-24 02:18:54', 44),
(30, 2, '2019-10-21 02:19:04', '2019-10-24 02:18:54', 44);

-- --------------------------------------------------------

--
-- Table structure for table `ci_users`
--

CREATE TABLE `ci_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `ip_address` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `user_group` int(11) DEFAULT NULL COMMENT '0=superadmin,1 = Admin, 2 = Customer',
  `verify_acc` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_users`
--

INSERT INTO `ci_users` (`id`, `username`, `ip_address`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `user_group`, `verify_acc`) VALUES
(1, 'superadmin', '', '$2y$08$jkbMyu41SgYPC0U6eV18he12ltuzUdm945GwdoEp5.FQxoX2DRBba', NULL, 'ejoe2u@yahoo.com', NULL, NULL, NULL, NULL, 0, 1570349818, 1, 0, 1),
(2, 'awie', '::1', '$2y$08$viJ2QQ9StGJcVSNb360.J.Lw3yBQpwyA5mW62SOplUvOcKjqy6Lta', NULL, 'hanies1810@gmail.com', NULL, 'tmCUKUNt6JRL1s.s5QXM8.0be2e9e85cefeea200', 1567564192, NULL, 1563862544, 1571620576, 1, 2, 1),
(8, 'admin', '::1', '$2y$08$QsZMFo6oZW4vLh6uGDTru.3n2sFhU1.jrTex96WNAa9fRKozMXuA6', NULL, 'sadasd@yahoo.com', NULL, NULL, NULL, NULL, 1567907764, 1571646264, 1, 1, 1),
(9, 'asda', '::1', '$2y$08$CntOkhzETTHVbuWa4PlQD.TMNB.Sb1EuXLKp0j6bp.2IvyxWuFkx2', NULL, 'sadasqwe@gmail.com', NULL, NULL, NULL, NULL, 1567910461, NULL, 1, 1, 1),
(10, 'nhasnawi', '::1', '$2y$08$zdWAJLHsHIfnh1/F2uKf/OiF5uMG/PiiFcIJa3j9KcaGAyWayUqQe', NULL, 'hqsqnwi_24@yahoo.com', NULL, NULL, NULL, NULL, 1567913456, NULL, 1, 1, 1),
(11, 'z', '::1', '$2y$08$jsQ3MTxDbjpwYlVVPoEpJ.ftaw.ANk3WDTxeJgUmB4ammvNK2LysW', NULL, 'hasnawihashim46@gmail.com', NULL, NULL, NULL, NULL, 1570066264, 1571646215, 1, 2, 1),
(12, 'm', '::1', '$2y$08$2tasmYqX3699Qi.SdmvqeOshTTRB03y8KJITeuBM7Apx0rUBNgPvi', NULL, 'are.vie18@gmail.com', NULL, NULL, NULL, NULL, 1570347689, 1571111380, 1, 2, 1),
(13, 'k', '::1', '$2y$08$Mseq3IR.oNEznX8f8c.52uup8Rq9VmcA2t4tyPxs1QC063asx3UNy', NULL, 'k@gmail.com', NULL, NULL, NULL, NULL, 1570348485, NULL, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ci_users_groups`
--

CREATE TABLE `ci_users_groups` (
  `id` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ci_users_profile`
--

CREATE TABLE `ci_users_profile` (
  `member_id` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `nic_no` varchar(26) DEFAULT NULL,
  `phone` varchar(60) DEFAULT NULL,
  `address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_users_profile`
--

INSERT INTO `ci_users_profile` (`member_id`, `user_id`, `full_name`, `nic_no`, `phone`, `address`) VALUES
(1, 1, 'SUPERADMIN', NULL, '131231', 'KOTA BHARU, KELANTAN'),
(2, 2, 'HASNAWI HASHIM', NULL, '0142968363', '1660 KOK LANAS,KELANTAN'),
(8, 8, 'TEST ADMIN', NULL, '3123123', 'ASHGJH'),
(9, 9, 'SAJA SAJA', NULL, '13123', 'SDFSDF'),
(10, 10, 'NEW HASNAWI', NULL, '3123123123', '-'),
(11, 11, 'Z', NULL, '123123123', 'KOTA BHARU, KELANTAN'),
(12, 12, 'M', NULL, '087868767', 'KB'),
(13, 13, 'K', NULL, '98898889', 'K');

-- --------------------------------------------------------

--
-- Table structure for table `ci_vendor`
--

CREATE TABLE `ci_vendor` (
  `vendor_id` int(11) NOT NULL,
  `vendor_name` varchar(200) NOT NULL,
  `vendor_phone` varchar(20) DEFAULT NULL,
  `vendor_email` varchar(30) DEFAULT NULL,
  `vendor_address` text DEFAULT NULL,
  `vendor_logo` varchar(200) DEFAULT NULL,
  `vendor_status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ci_weightcost`
--

CREATE TABLE `ci_weightcost` (
  `weightcost_id` int(11) NOT NULL,
  `weightInitial_set` decimal(10,5) NOT NULL,
  `weightFinal_set` decimal(10,5) NOT NULL,
  `shipcost_set` decimal(5,3) NOT NULL,
  `premium_set` decimal(7,3) NOT NULL,
  `sst_set` decimal(5,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `data_seller`
-- (See below for the actual view)
--
CREATE TABLE `data_seller` (
`seller_id` int(11)
,`shop_name` varchar(200)
,`seller_type` varchar(200)
,`seller_status` int(2)
,`seller_verify` int(2)
,`shop_image` varchar(200)
,`seller_created` timestamp
,`user_id` int(11) unsigned
,`seller_bank` varchar(200)
,`seller_account` varchar(200)
,`username` varchar(100)
,`email` varchar(254)
,`full_name` varchar(255)
,`phone` varchar(60)
,`address` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `data_user`
-- (See below for the actual view)
--
CREATE TABLE `data_user` (
`id` int(11) unsigned
,`username` varchar(100)
,`ip_address` varchar(45)
,`password` varchar(255)
,`salt` varchar(255)
,`email` varchar(254)
,`activation_code` varchar(40)
,`forgotten_password_code` varchar(40)
,`forgotten_password_time` int(11) unsigned
,`remember_code` varchar(40)
,`created_on` int(11) unsigned
,`last_login` int(11) unsigned
,`active` tinyint(1) unsigned
,`user_group` int(11)
,`full_name` varchar(255)
,`nic_no` varchar(26)
,`phone` varchar(60)
,`address` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `generate_report`
-- (See below for the actual view)
--
CREATE TABLE `generate_report` (
`product_id` int(11)
,`product_name` varchar(255)
,`item_code` varchar(60)
,`ordered_price` decimal(15,2)
,`modal_price` decimal(15,2)
,`qty` decimal(32,0)
,`shipping` decimal(15,2)
,`tax` decimal(15,2)
,`sale_price` decimal(37,2)
,`modal_price2` decimal(25,2)
,`seller_id` int(11)
,`shop_name` varchar(200)
,`seller_status` int(2)
,`category_id` int(11)
,`category_type` varchar(200)
,`weight` decimal(15,4)
,`order_id` int(11)
,`created_by` int(11) unsigned
,`created_date` timestamp
,`total_weight` decimal(10,5)
,`total_all` decimal(7,2)
,`shipping_id` int(11)
,`ship_name` varchar(100)
,`ship_phone` varchar(20)
,`ship_address` text
,`full_name` varchar(255)
,`phone` varchar(60)
,`address` text
,`email` varchar(254)
);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Stand-in structure for view `sale_report`
-- (See below for the actual view)
--
CREATE TABLE `sale_report` (
`product_id` int(11)
,`product_name` varchar(255)
,`item_code` varchar(60)
,`ordered_price` decimal(15,2)
,`modal_price` decimal(15,2)
,`qty` decimal(32,0)
,`sale_price` decimal(37,2)
,`modal_price2` decimal(25,2)
,`tax` decimal(15,2)
,`shipping` decimal(15,2)
,`seller_id` int(11)
,`shop_name` varchar(200)
,`seller_status` int(2)
,`category_id` int(11)
,`category_type` varchar(200)
,`weight` decimal(15,4)
,`created_date` timestamp
,`order_id` int(11)
,`order_status` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_order`
-- (See below for the actual view)
--
CREATE TABLE `view_order` (
`order_id` int(11)
,`created_by` int(11) unsigned
,`created_date` timestamp
,`total_all` decimal(7,2)
,`delivery_status` int(11)
,`type` int(11)
,`expired` int(2)
,`opt` int(2)
,`weightcost_id` int(11)
,`email` varchar(254)
,`user_group` int(11)
,`full_name` varchar(255)
,`nic_no` varchar(26)
,`phone` varchar(60)
,`address` text
,`ship_name` varchar(100)
,`ship_phone` varchar(20)
,`ship_address` text
,`payment_id` int(11)
,`payment_date` datetime
,`payment_type` varchar(60)
,`reference_note` varchar(256)
,`payment_amount` decimal(15,10)
,`verification_note` text
,`att_file` varchar(255)
,`recorded_date` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_order_detail`
-- (See below for the actual view)
--
CREATE TABLE `view_order_detail` (
`product_id` int(11)
,`product_name` varchar(255)
,`product_status` int(11)
,`item_code` varchar(60)
,`product_code` varchar(60)
,`product_price` decimal(15,2)
,`total_price` decimal(22,4)
,`category_id` int(11)
,`category_type` varchar(200)
,`seller_id` int(11)
,`user_id` int(11) unsigned
,`shop_name` varchar(200)
,`seller_type` varchar(200)
,`seller_status` int(2)
,`seller_verify` int(2)
,`shop_image` varchar(200)
,`seller_created` timestamp
,`description` text
,`add_cost` decimal(10,2)
,`shipping` decimal(10,2)
,`tax` decimal(10,2)
,`stock` decimal(32,0)
,`weight` decimal(15,4)
,`size` varchar(150)
,`image_file` varchar(124)
,`order_id` int(11)
,`ordered_price` decimal(15,2)
,`modal_price` decimal(15,2)
,`unit_price` decimal(15,2)
,`tax_price` decimal(15,2)
,`ship_price` decimal(15,2)
,`qty` int(11)
,`subtotal` decimal(15,2)
,`gold_assayer` varchar(200)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vu_products_list`
-- (See below for the actual view)
--
CREATE TABLE `vu_products_list` (
`product_id` int(11)
,`product_name` varchar(255)
,`product_status` int(11)
,`item_code` varchar(60)
,`product_code` varchar(60)
,`product_price` decimal(15,2)
,`total_price` decimal(22,4)
,`category_id` int(11)
,`category_type` varchar(200)
,`seller_id` int(11)
,`user_id` int(11) unsigned
,`shop_name` varchar(200)
,`seller_type` varchar(200)
,`seller_status` int(2)
,`seller_verify` int(2)
,`shop_image` varchar(200)
,`seller_created` timestamp
,`description` text
,`add_cost` decimal(10,2)
,`shipping` decimal(10,2)
,`tax` decimal(10,2)
,`stock` decimal(32,0)
,`weight` decimal(15,4)
,`size` varchar(150)
,`image_file` varchar(124)
);

-- --------------------------------------------------------

--
-- Structure for view `data_seller`
--
DROP TABLE IF EXISTS `data_seller`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `data_seller`  AS  select `s`.`seller_id` AS `seller_id`,`s`.`shop_name` AS `shop_name`,`s`.`seller_type` AS `seller_type`,`s`.`seller_status` AS `seller_status`,`s`.`seller_verify` AS `seller_verify`,`s`.`shop_image` AS `shop_image`,`s`.`seller_created` AS `seller_created`,`s`.`user_id` AS `user_id`,`s`.`seller_bank` AS `seller_bank`,`s`.`seller_account` AS `seller_account`,`u`.`username` AS `username`,`u`.`email` AS `email`,`up`.`full_name` AS `full_name`,`up`.`phone` AS `phone`,`up`.`address` AS `address` from ((`ci_seller` `s` join `ci_users` `u` on(`u`.`id` = `s`.`user_id`)) join `ci_users_profile` `up` on(`up`.`user_id` = `s`.`user_id`)) group by `s`.`seller_id` ;

-- --------------------------------------------------------

--
-- Structure for view `data_user`
--
DROP TABLE IF EXISTS `data_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `data_user`  AS  select `u`.`id` AS `id`,`u`.`username` AS `username`,`u`.`ip_address` AS `ip_address`,`u`.`password` AS `password`,`u`.`salt` AS `salt`,`u`.`email` AS `email`,`u`.`activation_code` AS `activation_code`,`u`.`forgotten_password_code` AS `forgotten_password_code`,`u`.`forgotten_password_time` AS `forgotten_password_time`,`u`.`remember_code` AS `remember_code`,`u`.`created_on` AS `created_on`,`u`.`last_login` AS `last_login`,`u`.`active` AS `active`,`u`.`user_group` AS `user_group`,`up`.`full_name` AS `full_name`,`up`.`nic_no` AS `nic_no`,`up`.`phone` AS `phone`,`up`.`address` AS `address` from (`ci_users` `u` join `ci_users_profile` `up` on(`u`.`id` = `up`.`user_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `generate_report`
--
DROP TABLE IF EXISTS `generate_report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `generate_report`  AS  select `sr`.`product_id` AS `product_id`,`sr`.`product_name` AS `product_name`,`sr`.`item_code` AS `item_code`,`sr`.`ordered_price` AS `ordered_price`,`sr`.`modal_price` AS `modal_price`,`sr`.`qty` AS `qty`,`sr`.`shipping` AS `shipping`,`sr`.`tax` AS `tax`,`sr`.`sale_price` AS `sale_price`,`sr`.`modal_price2` AS `modal_price2`,`sr`.`seller_id` AS `seller_id`,`sr`.`shop_name` AS `shop_name`,`sr`.`seller_status` AS `seller_status`,`sr`.`category_id` AS `category_id`,`sr`.`category_type` AS `category_type`,`sr`.`weight` AS `weight`,`co`.`order_id` AS `order_id`,`co`.`created_by` AS `created_by`,`co`.`created_date` AS `created_date`,`co`.`total_weight` AS `total_weight`,`co`.`total_all` AS `total_all`,`cs`.`shipping_id` AS `shipping_id`,`cs`.`ship_name` AS `ship_name`,`cs`.`ship_phone` AS `ship_phone`,`cs`.`ship_address` AS `ship_address`,`cup`.`full_name` AS `full_name`,`cup`.`phone` AS `phone`,`cup`.`address` AS `address`,`cu`.`email` AS `email` from ((((`sale_report` `sr` join `ci_orders` `co` on(`co`.`order_id` = `sr`.`order_id`)) join `ci_shipping` `cs` on(`cs`.`order_id` = `co`.`order_id`)) join `ci_users_profile` `cup` on(`cup`.`user_id` = `co`.`created_by`)) join `ci_users` `cu` on(`cu`.`id` = `cup`.`user_id`)) order by `co`.`order_id` ;

-- --------------------------------------------------------

--
-- Structure for view `sale_report`
--
DROP TABLE IF EXISTS `sale_report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sale_report`  AS  select `vu`.`product_id` AS `product_id`,`vu`.`product_name` AS `product_name`,`vu`.`item_code` AS `item_code`,`coi`.`ordered_price` AS `ordered_price`,`coi`.`modal_price` AS `modal_price`,sum(`coi`.`qty`) AS `qty`,sum(`coi`.`subtotal`) AS `sale_price`,`coi`.`modal_price` * `coi`.`qty` AS `modal_price2`,`coi`.`tax_price` AS `tax`,`coi`.`ship_price` AS `shipping`,`vu`.`seller_id` AS `seller_id`,`vu`.`shop_name` AS `shop_name`,`vu`.`seller_status` AS `seller_status`,`vu`.`category_id` AS `category_id`,`vu`.`category_type` AS `category_type`,`vu`.`weight` AS `weight`,`co`.`created_date` AS `created_date`,`co`.`order_id` AS `order_id`,`os`.`order_status` AS `order_status` from (((`ci_orders` `co` join `ci_order_items` `coi` on(`co`.`order_id` = `coi`.`order_id`)) join `vu_products_list` `vu` on(`vu`.`product_id` = `coi`.`product_id`)) join `ci_order_status` `os` on(`os`.`order_id` = `coi`.`order_id`)) where `os`.`order_status` = 4 and `os`.`seller_id` = `coi`.`seller_id` group by `co`.`order_id`,`vu`.`product_id` order by `vu`.`product_id` ;

-- --------------------------------------------------------

--
-- Structure for view `view_order`
--
DROP TABLE IF EXISTS `view_order`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_order`  AS  select `ci_orders`.`order_id` AS `order_id`,`ci_orders`.`created_by` AS `created_by`,`ci_orders`.`created_date` AS `created_date`,`ci_orders`.`total_all` AS `total_all`,`ci_orders`.`delivery_status` AS `delivery_status`,`ci_orders`.`type` AS `type`,`ci_orders`.`expired` AS `expired`,`ci_orders`.`opt` AS `opt`,`ci_orders`.`weightcost_id` AS `weightcost_id`,`data_user`.`email` AS `email`,`data_user`.`user_group` AS `user_group`,`data_user`.`full_name` AS `full_name`,`data_user`.`nic_no` AS `nic_no`,`data_user`.`phone` AS `phone`,`data_user`.`address` AS `address`,`ci_shipping`.`ship_name` AS `ship_name`,`ci_shipping`.`ship_phone` AS `ship_phone`,`ci_shipping`.`ship_address` AS `ship_address`,`ci_payment`.`payment_id` AS `payment_id`,`ci_payment`.`payment_date` AS `payment_date`,`ci_payment`.`payment_type` AS `payment_type`,`ci_payment`.`reference_note` AS `reference_note`,`ci_payment`.`payment_amount` AS `payment_amount`,`ci_payment`.`verification_note` AS `verification_note`,`ci_payment`.`att_file` AS `att_file`,`ci_payment`.`recorded_date` AS `recorded_date` from (((`ci_orders` join `ci_shipping` on(`ci_shipping`.`order_id` = `ci_orders`.`order_id`)) join `ci_payment` on(`ci_payment`.`order_id` = `ci_orders`.`order_id`)) join `data_user` on(`data_user`.`id` = `ci_orders`.`created_by`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_order_detail`
--
DROP TABLE IF EXISTS `view_order_detail`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_order_detail`  AS  select `vu_products_list`.`product_id` AS `product_id`,`vu_products_list`.`product_name` AS `product_name`,`vu_products_list`.`product_status` AS `product_status`,`vu_products_list`.`item_code` AS `item_code`,`vu_products_list`.`product_code` AS `product_code`,`vu_products_list`.`product_price` AS `product_price`,`vu_products_list`.`total_price` AS `total_price`,`vu_products_list`.`category_id` AS `category_id`,`vu_products_list`.`category_type` AS `category_type`,`vu_products_list`.`seller_id` AS `seller_id`,`vu_products_list`.`user_id` AS `user_id`,`vu_products_list`.`shop_name` AS `shop_name`,`vu_products_list`.`seller_type` AS `seller_type`,`vu_products_list`.`seller_status` AS `seller_status`,`vu_products_list`.`seller_verify` AS `seller_verify`,`vu_products_list`.`shop_image` AS `shop_image`,`vu_products_list`.`seller_created` AS `seller_created`,`vu_products_list`.`description` AS `description`,`vu_products_list`.`add_cost` AS `add_cost`,`vu_products_list`.`shipping` AS `shipping`,`vu_products_list`.`tax` AS `tax`,`vu_products_list`.`stock` AS `stock`,`vu_products_list`.`weight` AS `weight`,`vu_products_list`.`size` AS `size`,`vu_products_list`.`image_file` AS `image_file`,`coi`.`order_id` AS `order_id`,`coi`.`ordered_price` AS `ordered_price`,`coi`.`modal_price` AS `modal_price`,`coi`.`unit_price` AS `unit_price`,`coi`.`tax_price` AS `tax_price`,`coi`.`ship_price` AS `ship_price`,`coi`.`qty` AS `qty`,`coi`.`subtotal` AS `subtotal`,`coi`.`gold_assayer` AS `gold_assayer` from (`vu_products_list` join `ci_order_items` `coi` on(`coi`.`product_id` = `vu_products_list`.`product_id`)) order by `coi`.`order_id` ;

-- --------------------------------------------------------

--
-- Structure for view `vu_products_list`
--
DROP TABLE IF EXISTS `vu_products_list`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vu_products_list`  AS  select `ci_products`.`product_id` AS `product_id`,`ci_products`.`product_name` AS `product_name`,`ci_products`.`status` AS `product_status`,`ci_products`.`item_code` AS `item_code`,`ci_products`.`product_code` AS `product_code`,`ci_products`.`product_price` AS `product_price`,`ci_production`.`add_cost` * `ci_production`.`tax` + `ci_production`.`add_cost` + `ci_production`.`shipping` AS `total_price`,`ci_production`.`category_id` AS `category_id`,`ci_category`.`category_type` AS `category_type`,`ci_seller`.`seller_id` AS `seller_id`,`ci_seller`.`user_id` AS `user_id`,`ci_seller`.`shop_name` AS `shop_name`,`ci_seller`.`seller_type` AS `seller_type`,`ci_seller`.`seller_status` AS `seller_status`,`ci_seller`.`seller_verify` AS `seller_verify`,`ci_seller`.`shop_image` AS `shop_image`,`ci_seller`.`seller_created` AS `seller_created`,`ci_production`.`description` AS `description`,`ci_production`.`add_cost` AS `add_cost`,`ci_production`.`shipping` AS `shipping`,`ci_production`.`tax` AS `tax`,sum(`ci_inventory`.`qty`) AS `stock`,max(`ci_production`.`weight`) AS `weight`,max(`ci_production`.`size`) AS `size`,`ci_images`.`file_name` AS `image_file` from ((((((`ci_products` join `ci_inventory` on(`ci_products`.`product_id` = `ci_inventory`.`product_id`)) join `ci_production` on(`ci_production`.`product_id` = `ci_products`.`product_id`)) join `ci_category` on(`ci_category`.`category_id` = `ci_production`.`category_id`)) join `ci_product_images` on(`ci_product_images`.`product_id` = `ci_products`.`product_id`)) join `ci_images` on(`ci_images`.`image_id` = `ci_product_images`.`image_id`)) join `ci_seller` on(`ci_seller`.`seller_id` = `ci_products`.`seller_id`)) where `ci_inventory`.`owner_type` = 'company' group by `ci_inventory`.`product_id`,`ci_products`.`product_id`,`ci_production`.`product_id`,`ci_product_images`.`image_id` order by `ci_products`.`seller_id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_audit_log`
--
ALTER TABLE `ci_audit_log`
  ADD PRIMARY KEY (`audit_id`);

--
-- Indexes for table `ci_banner`
--
ALTER TABLE `ci_banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `ci_billing`
--
ALTER TABLE `ci_billing`
  ADD PRIMARY KEY (`billing_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `ci_category`
--
ALTER TABLE `ci_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `ci_check_login`
--
ALTER TABLE `ci_check_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_footer`
--
ALTER TABLE `ci_footer`
  ADD PRIMARY KEY (`footer_id`);

--
-- Indexes for table `ci_groups`
--
ALTER TABLE `ci_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_images`
--
ALTER TABLE `ci_images`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `ci_image_addition`
--
ALTER TABLE `ci_image_addition`
  ADD PRIMARY KEY (`image_add_id`);

--
-- Indexes for table `ci_inventory`
--
ALTER TABLE `ci_inventory`
  ADD PRIMARY KEY (`inventory_id`),
  ADD KEY `ci_inventory_ibfk_1` (`product_id`);

--
-- Indexes for table `ci_logo`
--
ALTER TABLE `ci_logo`
  ADD PRIMARY KEY (`logo_id`);

--
-- Indexes for table `ci_newslatter`
--
ALTER TABLE `ci_newslatter`
  ADD PRIMARY KEY (`newslatter_id`);

--
-- Indexes for table `ci_orders`
--
ALTER TABLE `ci_orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `ci_order_items`
--
ALTER TABLE `ci_order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_order_items_ibfk_1` (`order_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `seller_id` (`seller_id`);

--
-- Indexes for table `ci_order_status`
--
ALTER TABLE `ci_order_status`
  ADD PRIMARY KEY (`order_status_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `ci_payment`
--
ALTER TABLE `ci_payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `ci_payment_ibfk_1` (`order_id`);

--
-- Indexes for table `ci_production`
--
ALTER TABLE `ci_production`
  ADD PRIMARY KEY (`production_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `ci_products`
--
ALTER TABLE `ci_products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `ci_product_images`
--
ALTER TABLE `ci_product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `image_id` (`image_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `ci_seller`
--
ALTER TABLE `ci_seller`
  ADD PRIMARY KEY (`seller_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `ci_serial_no`
--
ALTER TABLE `ci_serial_no`
  ADD PRIMARY KEY (`record_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `ci_serial_no_ibfk_1` (`order_id`);

--
-- Indexes for table `ci_shipping`
--
ALTER TABLE `ci_shipping`
  ADD PRIMARY KEY (`shipping_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `ci_temp_siri`
--
ALTER TABLE `ci_temp_siri`
  ADD PRIMARY KEY (`record_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `ci_serial_no_ibfk_1` (`order_id`);

--
-- Indexes for table `ci_tracking`
--
ALTER TABLE `ci_tracking`
  ADD PRIMARY KEY (`tracking_id`),
  ADD KEY `ci_tracking_ibfk_1` (`order_id`),
  ADD KEY `seller_id` (`seller_id`);

--
-- Indexes for table `ci_transaction`
--
ALTER TABLE `ci_transaction`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `order_status_id` (`order_status_id`);

--
-- Indexes for table `ci_users`
--
ALTER TABLE `ci_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_users_groups`
--
ALTER TABLE `ci_users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indexes for table `ci_users_profile`
--
ALTER TABLE `ci_users_profile`
  ADD PRIMARY KEY (`member_id`),
  ADD KEY `ci_users_profile_ibfk_1` (`user_id`);

--
-- Indexes for table `ci_vendor`
--
ALTER TABLE `ci_vendor`
  ADD PRIMARY KEY (`vendor_id`);

--
-- Indexes for table `ci_weightcost`
--
ALTER TABLE `ci_weightcost`
  ADD PRIMARY KEY (`weightcost_id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ci_audit_log`
--
ALTER TABLE `ci_audit_log`
  MODIFY `audit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=454;

--
-- AUTO_INCREMENT for table `ci_banner`
--
ALTER TABLE `ci_banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ci_billing`
--
ALTER TABLE `ci_billing`
  MODIFY `billing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `ci_category`
--
ALTER TABLE `ci_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ci_check_login`
--
ALTER TABLE `ci_check_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ci_footer`
--
ALTER TABLE `ci_footer`
  MODIFY `footer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ci_groups`
--
ALTER TABLE `ci_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ci_images`
--
ALTER TABLE `ci_images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ci_image_addition`
--
ALTER TABLE `ci_image_addition`
  MODIFY `image_add_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ci_inventory`
--
ALTER TABLE `ci_inventory`
  MODIFY `inventory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `ci_logo`
--
ALTER TABLE `ci_logo`
  MODIFY `logo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ci_newslatter`
--
ALTER TABLE `ci_newslatter`
  MODIFY `newslatter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ci_orders`
--
ALTER TABLE `ci_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `ci_order_items`
--
ALTER TABLE `ci_order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `ci_order_status`
--
ALTER TABLE `ci_order_status`
  MODIFY `order_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `ci_payment`
--
ALTER TABLE `ci_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `ci_production`
--
ALTER TABLE `ci_production`
  MODIFY `production_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `ci_products`
--
ALTER TABLE `ci_products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `ci_product_images`
--
ALTER TABLE `ci_product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ci_seller`
--
ALTER TABLE `ci_seller`
  MODIFY `seller_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ci_serial_no`
--
ALTER TABLE `ci_serial_no`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `ci_shipping`
--
ALTER TABLE `ci_shipping`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `ci_temp_siri`
--
ALTER TABLE `ci_temp_siri`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `ci_tracking`
--
ALTER TABLE `ci_tracking`
  MODIFY `tracking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `ci_transaction`
--
ALTER TABLE `ci_transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `ci_users`
--
ALTER TABLE `ci_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `ci_users_groups`
--
ALTER TABLE `ci_users_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ci_users_profile`
--
ALTER TABLE `ci_users_profile`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `ci_vendor`
--
ALTER TABLE `ci_vendor`
  MODIFY `vendor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ci_weightcost`
--
ALTER TABLE `ci_weightcost`
  MODIFY `weightcost_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ci_billing`
--
ALTER TABLE `ci_billing`
  ADD CONSTRAINT `ci_billing_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `ci_orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ci_billing_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `ci_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ci_orders`
--
ALTER TABLE `ci_orders`
  ADD CONSTRAINT `ci_orders_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `ci_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ci_order_items`
--
ALTER TABLE `ci_order_items`
  ADD CONSTRAINT `ci_order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `ci_orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ci_order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `ci_products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ci_order_items_ibfk_3` FOREIGN KEY (`seller_id`) REFERENCES `ci_seller` (`seller_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ci_order_status`
--
ALTER TABLE `ci_order_status`
  ADD CONSTRAINT `ci_order_status_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `ci_orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ci_payment`
--
ALTER TABLE `ci_payment`
  ADD CONSTRAINT `ci_payment_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `ci_orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ci_production`
--
ALTER TABLE `ci_production`
  ADD CONSTRAINT `ci_production_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `ci_products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ci_product_images`
--
ALTER TABLE `ci_product_images`
  ADD CONSTRAINT `ci_product_images_ibfk_1` FOREIGN KEY (`image_id`) REFERENCES `ci_images` (`image_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ci_product_images_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `ci_products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ci_seller`
--
ALTER TABLE `ci_seller`
  ADD CONSTRAINT `ci_seller_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `ci_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ci_serial_no`
--
ALTER TABLE `ci_serial_no`
  ADD CONSTRAINT `ci_serial_no_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `ci_orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ci_serial_no_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `ci_products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ci_shipping`
--
ALTER TABLE `ci_shipping`
  ADD CONSTRAINT `ci_shipping_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `ci_orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ci_shipping_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `ci_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ci_temp_siri`
--
ALTER TABLE `ci_temp_siri`
  ADD CONSTRAINT `ci_temp_siri_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `ci_orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ci_temp_siri_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `ci_products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ci_tracking`
--
ALTER TABLE `ci_tracking`
  ADD CONSTRAINT `ci_tracking_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `ci_orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ci_tracking_ibfk_2` FOREIGN KEY (`seller_id`) REFERENCES `ci_seller` (`seller_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ci_transaction`
--
ALTER TABLE `ci_transaction`
  ADD CONSTRAINT `ci_transaction_ibfk_1` FOREIGN KEY (`order_status_id`) REFERENCES `ci_order_status` (`order_status_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
