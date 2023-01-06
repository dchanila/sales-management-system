-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2023 at 07:57 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wendeline`
--

-- --------------------------------------------------------

--
-- Table structure for table `blocks`
--

CREATE TABLE `blocks` (
  `id` int(255) DEFAULT NULL,
  `dates` date NOT NULL,
  `open_with` int(255) NOT NULL,
  `produced` int(255) NOT NULL,
  `sold` int(255) NOT NULL,
  `closed` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `budget`
--

CREATE TABLE `budget` (
  `id_budget` int(255) NOT NULL,
  `dates` date NOT NULL,
  `open_with` int(255) NOT NULL DEFAULT 0,
  `receive_from` varchar(255) NOT NULL,
  `amount_received` int(255) NOT NULL,
  `total` int(255) NOT NULL,
  `used` int(255) NOT NULL,
  `remaining` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `budget`
--

INSERT INTO `budget` (`id_budget`, `dates`, `open_with`, `receive_from`, `amount_received`, `total`, `used`, `remaining`) VALUES
(3, '2022-05-23', 1000, 'juma', 20000, 21000, 20000, 1000),
(4, '2022-05-23', 1000, 'juma', 20000, 21000, 21, 20979),
(7, '2022-06-05', 1000, 'juma', 20000, 21000, 2, 20998);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `com_id` int(255) NOT NULL,
  `reasons_id` int(255) NOT NULL,
  `from_table` varchar(255) NOT NULL,
  `reasons` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `timescom` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`com_id`, `reasons_id`, `from_table`, `reasons`, `comment`, `username`, `timescom`) VALUES
(22, 62, '', 'no cement', 'tt', 'emmanuel deus', '2022-05-23 13:59:06'),
(23, 62, '', 'no cement', 'ff', 'emmanuel deus', '2022-05-23 13:59:57'),
(24, 63, '', 'no cement', 'oky', 'Baraka chaula', '2022-05-23 20:59:48'),
(25, 66, '', 'accepted', 'nice', 'emmanuel deus', '2022-05-27 07:43:01'),
(26, 67, '', 'cement', 'oky', 'chanila ite', '2022-05-27 12:59:48'),
(27, 67, '', 'cement', 'tutaleta kesho', 'chanila ite', '2022-05-27 13:43:55'),
(28, 102, '', 'zz', 'xxxx', 'emmanuel deus', '2022-06-14 10:28:56'),
(29, 102, '', 'zz', 'fff', 'emmanuel deus', '2022-06-14 12:00:28'),
(30, 6, '', 'wa mwanza', 'eee', 'emmanuel deus', '2022-06-14 12:09:47'),
(31, 0, '', '', 'yy', 'emmanuel deus', '2022-06-14 12:10:33'),
(32, 0, '', '', 'ffff', 'emmanuel deus', '2022-06-14 12:13:07'),
(33, 0, '', '', 'ppp', 'emmanuel deus', '2022-06-14 12:14:01'),
(34, 6, '', 'wa mwanza', 'fffff', 'emmanuel deus', '2022-06-14 12:16:07'),
(35, 9, '', 'wa mwanza', 'dddd', 'emmanuel deus', '2022-06-14 12:17:53'),
(36, 9, '', 'wa mwanza', 'ee', 'emmanuel deus', '2022-06-14 12:22:29'),
(37, 0, '', '', 'kk', 'emmanuel deus', '2022-06-14 12:22:37'),
(38, 9, '', 'wa mwanza', 'vv', 'emmanuel deus', '2022-06-14 12:27:03'),
(39, 9, '', 'wa mwanza', 'vv', 'emmanuel deus', '2022-06-14 12:27:15'),
(40, 10, 'owed_customer', 'wa mwanza', 'rrrr', 'emmanuel deus', '2022-06-17 16:54:50'),
(41, 103, 'production', 'sss', 'ddd', 'emmanuel deus', '2022-06-17 16:59:46'),
(42, 11, 'owed_customer', 'wa mwanza', 'dddd', 'emmanuel deus', '2022-06-17 17:01:51'),
(43, 11, 'owed_customer', 'wa mwanza', 'ddddd', 'emmanuel deus', '2022-06-17 17:02:04'),
(44, 103, 'production', 'sss', 'ffffff', 'emmanuel deus', '2022-06-17 17:21:33'),
(45, 13, 'owed_customer', 'katumwa na frani', 'ok', 'emmanuel deus', '2022-06-18 07:29:57'),
(46, 14, 'owed_customer', 'katumwa na frani', 'oky', 'emmanuel deus', '2022-06-18 10:02:54'),
(47, 16, 'owed_customer', 'jilani', 'oky\r\n', 'emmanuel deus', '2022-06-19 10:27:12'),
(48, 104, 'production', 'rrrrrrr', 'oky', 'emmanuel deus', '2022-06-19 10:28:08'),
(49, 105, 'production', 'ww', 'sss', 'emmanuel deus', '2022-06-19 19:43:11');

-- --------------------------------------------------------

--
-- Table structure for table `comment_reply`
--

CREATE TABLE `comment_reply` (
  `id` int(255) NOT NULL,
  `com_id` int(255) NOT NULL,
  `reply` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `timereply` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `consuption`
--

CREATE TABLE `consuption` (
  `id` int(255) DEFAULT NULL,
  `consumption` int(255) NOT NULL,
  `amount` int(255) NOT NULL,
  `id_budget` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `estimate`
--

CREATE TABLE `estimate` (
  `id` int(255) NOT NULL,
  `dates` date NOT NULL,
  `to_date` date NOT NULL,
  `detail` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `price_per_each` int(255) NOT NULL,
  `total_amount` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `estimate`
--

INSERT INTO `estimate` (`id`, `dates`, `to_date`, `detail`, `quantity`, `price_per_each`, `total_amount`) VALUES
(6, '2022-05-23', '2022-05-23', 'mafuta site', 10, 1100, 11000),
(7, '2022-05-23', '2022-05-29', 'mafuta site', 10, 1100, 11000),
(8, '2022-05-01', '2022-05-31', 'mafuta site', 10, 1100, 11000),
(9, '2022-05-30', '2022-06-05', 'mafuta site', 10, 1200, 12000),
(12, '2022-06-05', '2022-06-05', 'mafuta site', 10, 1100, 11000),
(18, '2022-05-30', '2022-06-05', 'mafuta site', 6, 1100, 6600),
(19, '2022-06-13', '2022-06-19', 'mafuta site', 12, 1200, 14400),
(20, '2022-06-06', '2022-06-12', 'mafuta site', 12, 1200, 14400),
(21, '2022-06-06', '2022-06-06', 'mafuta site', 10, 1200, 12000),
(22, '2022-06-06', '2022-06-12', 'mafuta site', 10, 1200, 12000),
(23, '2022-06-06', '2022-06-12', 'mafuta site', 10, 1200, 12000);

-- --------------------------------------------------------

--
-- Table structure for table `fuel_site`
--

CREATE TABLE `fuel_site` (
  `id` int(255) NOT NULL,
  `dates` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `price_per_each` int(255) NOT NULL,
  `total` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fuel_site`
--

INSERT INTO `fuel_site` (`id`, `dates`, `description`, `quantity`, `price_per_each`, `total`) VALUES
(2, '2022-05-23', 'site', 10, 1100, 11000);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `activity` varchar(255) NOT NULL,
  `times` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `username`, `activity`, `times`) VALUES
(26, 'edchanila', 'loged out', '2022-04-27 19:25:01'),
(27, 'edchanila', 'loged in', '2022-04-27 19:25:22'),
(28, 'cpharis', 'loged in', '2022-04-27 19:25:52'),
(29, 'cpharis', 'loged out', '2022-04-27 19:26:13'),
(30, 'cpharis', 'loged in', '2022-04-27 19:26:48'),
(31, 'edchanila', 'loged in', '2022-04-27 19:27:30'),
(32, 'edchanila', 'loged out', '2022-04-27 19:27:39'),
(33, 'edchanila', 'loged in', '2022-04-27 19:31:16'),
(34, 'dchanila', 'loged in', '2022-04-27 19:32:55'),
(35, 'edchanila', 'loged in', '2022-04-27 19:34:38'),
(36, 'dchanila', 'loged out', '2022-04-27 19:46:54'),
(37, 'cpharis', 'loged out', '2022-04-27 19:47:16'),
(38, 'edchanila', 'loged out', '2022-04-27 19:47:50'),
(39, 'edchanila', 'loged in', '2022-04-27 19:49:18'),
(40, 'edchanila', 'loged in', '2022-04-27 19:50:01'),
(41, 'edchanila', 'loged out', '2022-04-27 19:50:46'),
(42, 'edchanila', 'loged in', '2022-04-27 19:50:55'),
(43, 'edchanila', 'loged in', '2022-04-27 19:51:55'),
(44, 'edchanila', 'loged out', '2022-04-27 20:03:25'),
(45, 'edchanila', 'loged in', '2022-04-27 20:05:44'),
(46, 'edchanila', 'loged out', '2022-04-27 21:08:42'),
(47, 'edchanila', 'loged in', '2022-04-27 21:16:10'),
(48, 'edchanila', 'loged in', '2022-04-27 22:17:35'),
(49, 'edchanila', 'loged out', '2022-04-27 22:26:38'),
(50, 'edchanila', 'loged in', '2022-04-27 22:27:19'),
(51, 'edchanila', 'loged out', '2022-04-27 22:27:57'),
(52, 'edchanila', 'loged in', '2022-04-27 22:28:18'),
(53, 'edchanila', 'add daily blocks production', '2022-04-28 08:02:06'),
(54, 'edchanila', 'add daily blocks production', '2022-04-28 08:04:28'),
(55, 'edchanila', 'add daily blocks production', '2022-04-28 08:07:01'),
(56, 'edchanila', 'add daily blocks production', '2022-04-28 12:23:51'),
(57, 'edchanila', 'add daily blocks production', '2022-04-28 12:25:57'),
(58, 'edchanila', 'add daily blocks production', '2022-04-28 12:28:50'),
(59, 'edchanila', 'add daily blocks production', '2022-04-28 12:32:14'),
(60, 'edchanila', 'add daily blocks production', '2022-04-28 13:12:11'),
(61, 'edchanila', 'loged in', '2022-04-28 14:40:53'),
(62, 'edchanila', 'add daily blocks production', '2022-04-28 14:45:13'),
(63, 'edchanila', 'loged out', '2022-04-28 16:01:00'),
(64, 'emmanuel deus', 'loged in', '2022-04-28 16:01:34'),
(65, 'emmanuel deus', 'loged out', '2022-04-28 16:07:48'),
(66, 'edchanila', 'loged in', '2022-04-28 16:14:03'),
(67, 'edchanila', 'loged in', '2022-04-28 17:34:48'),
(68, 'edchanila', 'add daily blocks production', '2022-04-29 05:58:36'),
(69, 'edchanila', 'loged out', '2022-04-29 06:04:25'),
(70, 'edchanila', 'loged in', '2022-04-29 06:07:20'),
(71, 'edchanila', 'loged out', '2022-04-29 10:42:21'),
(72, 'edchanila', 'loged in', '2022-04-29 10:54:28'),
(73, 'edchanila', 'loged out', '2022-04-29 10:54:46'),
(74, 'cpharis', 'loged in', '2022-04-29 10:55:05'),
(75, 'cpharis', 'add daily blocks production', '2022-04-29 11:14:42'),
(76, 'cpharis', 'add daily blocks production', '2022-04-29 11:22:05'),
(77, 'cpharis', 'loged out', '2022-04-29 11:22:23'),
(78, 'edchanila', 'loged in', '2022-04-29 11:22:50'),
(79, 'edchanila', 'loged in', '2022-04-29 11:26:49'),
(80, 'edchanila', 'loged in', '2022-04-29 11:30:05'),
(81, 'edchanila', 'loged in', '2022-04-29 11:51:47'),
(82, 'edchanila', 'loged in', '2022-04-29 12:48:56'),
(83, 'edchanila', 'loged in', '2022-04-29 12:58:37'),
(84, 'edchanila', 'add daily blocks production', '2022-05-01 08:53:42'),
(85, '', 'comment on daily reason', '2022-05-01 10:14:37'),
(86, 'edchanila', 'comment on daily reason', '2022-05-01 10:22:32'),
(87, 'edchanila', 'comment on daily reason', '2022-05-01 10:39:11'),
(88, 'edchanila', 'comment on daily reason', '2022-05-01 10:39:39'),
(89, 'edchanila', 'comment on daily reason', '2022-05-01 10:50:06'),
(90, 'edchanila', 'comment on daily reason', '2022-05-01 10:51:47'),
(91, '', 'comment on daily reason', '2022-05-01 10:59:28'),
(92, '', 'comment on daily reason', '2022-05-01 11:01:43'),
(93, '', 'comment on daily reason', '2022-05-01 11:03:23'),
(94, 'edchanila', 'add daily blocks production', '2022-05-01 12:25:05'),
(95, '', 'comment on daily reason', '2022-05-01 12:25:20'),
(96, 'edchanila', 'add daily blocks production', '2022-05-01 12:35:11'),
(97, '', 'add daily blocks product', '2022-05-01 12:59:21'),
(98, '', 'add daily pevement product', '2022-05-01 13:00:39'),
(99, 'edchanila', 'loged out', '2022-05-02 07:31:16'),
(100, 'edchanila', 'loged in', '2022-05-02 07:31:26'),
(101, 'edchanila', 'loged in', '2022-05-02 09:43:38'),
(102, 'edchanila', 'add daily blocks production', '2022-05-02 09:44:24'),
(103, 'edchanila', 'add daily blocks production', '2022-05-02 09:48:24'),
(104, 'edchanila', 'add daily  production', '2022-05-02 09:48:58'),
(105, 'edchanila', 'add daily  production', '2022-05-02 09:52:43'),
(106, 'edchanila', 'add daily blocks production', '2022-05-02 10:07:40'),
(107, 'edchanila', 'add daily  production', '2022-05-02 10:14:14'),
(108, 'edchanila', 'add daily pevement production', '2022-05-02 10:16:54'),
(109, 'edchanila', 'add daily blocks production', '2022-05-02 10:17:25'),
(110, 'edchanila', 'add daily blocks production', '2022-05-02 10:20:28'),
(111, 'edchanila', 'add daily blocks production', '2022-05-02 10:20:49'),
(112, '', 'comment on daily reason', '2022-05-02 10:47:57'),
(113, 'edchanila', 'add daily blocks sales', '2022-05-02 11:58:40'),
(114, 'edchanila', 'add daily blocks sales', '2022-05-02 12:02:47'),
(115, 'edchanila', 'add daily blocks sales', '2022-05-02 12:10:11'),
(116, 'edchanila', 'add daily blocks sales', '2022-05-02 12:13:14'),
(117, 'edchanila', 'add daily blocks sales', '2022-05-02 12:14:19'),
(118, 'edchanila', 'add daily blocks sales', '2022-05-02 12:14:57'),
(119, 'edchanila', 'add daily blocks sales', '2022-05-02 12:19:47'),
(120, 'edchanila', 'add daily blocks sales', '2022-05-02 12:20:50'),
(121, 'edchanila', 'add daily blocks sales', '2022-05-02 12:29:44'),
(122, 'edchanila', 'add daily blocks sales', '2022-05-02 12:33:58'),
(123, 'edchanila', 'add daily blocks sales', '2022-05-02 12:38:30'),
(124, 'edchanila', 'add daily blocks sales', '2022-05-02 12:43:03'),
(125, 'edchanila', 'add daily blocks sales', '2022-05-02 12:43:41'),
(126, 'edchanila', 'add daily blocks sales', '2022-05-02 12:46:57'),
(127, 'edchanila', 'add daily blocks sales', '2022-05-02 12:47:21'),
(128, 'edchanila', 'add daily blocks sales', '2022-05-02 12:48:44'),
(129, 'edchanila', 'add daily blocks sales', '2022-05-02 12:50:28'),
(130, 'edchanila', 'add daily blocks sales', '2022-05-02 12:53:00'),
(131, 'edchanila', 'add daily blocks sales', '2022-05-02 12:54:03'),
(132, 'edchanila', 'add daily blocks sales', '2022-05-02 13:19:33'),
(133, 'edchanila', 'add daily blocks sales', '2022-05-02 13:22:44'),
(134, 'edchanila', 'add daily blocks sales', '2022-05-02 13:27:22'),
(135, 'edchanila', 'add daily blocks sales', '2022-05-02 13:30:13'),
(136, 'edchanila', 'add daily blocks sales', '2022-05-02 13:32:24'),
(137, 'edchanila', 'add daily blocks sales', '2022-05-02 13:33:43'),
(138, 'edchanila', 'add daily blocks sales', '2022-05-02 13:37:12'),
(139, 'edchanila', 'add daily blocks sales', '2022-05-02 13:39:20'),
(140, 'edchanila', 'add daily blocks sales', '2022-05-02 13:42:54'),
(141, 'edchanila', 'add daily blocks sales', '2022-05-02 13:47:11'),
(142, 'edchanila', 'add daily blocks sales', '2022-05-02 14:27:56'),
(143, 'edchanila', 'add daily blocks sales', '2022-05-02 14:29:24'),
(144, 'edchanila', 'add daily blocks sales', '2022-05-02 14:44:04'),
(145, 'edchanila', 'add daily blocks sales', '2022-05-02 14:46:12'),
(146, 'edchanila', 'add daily blocks sales', '2022-05-02 14:46:45'),
(147, 'edchanila', 'add daily blocks sales', '2022-05-02 14:57:08'),
(148, 'edchanila', 'add daily blocks sales', '2022-05-02 15:02:58'),
(149, 'edchanila', 'add daily blocks sales', '2022-05-02 15:05:53'),
(150, 'edchanila', 'add daily blocks sales', '2022-05-02 15:06:30'),
(151, 'edchanila', 'add daily blocks sales', '2022-05-02 15:10:38'),
(152, 'edchanila', 'add daily blocks sales', '2022-05-02 15:24:17'),
(153, 'edchanila', 'add daily blocks sales', '2022-05-02 15:24:50'),
(154, 'edchanila', 'add daily blocks sales', '2022-05-02 16:15:03'),
(155, 'edchanila', 'add daily pevement production', '2022-05-02 16:19:17'),
(156, 'edchanila', 'add daily pevement sales', '2022-05-02 16:19:46'),
(157, 'edchanila', 'add daily pevement sales', '2022-05-02 16:22:40'),
(158, 'edchanila', 'add daily pevement sales', '2022-05-02 16:23:07'),
(159, '', 'comment on daily reason', '2022-05-02 16:36:03'),
(160, '', 'comment on daily reason', '2022-05-02 16:36:26'),
(161, '', 'comment on daily reason', '2022-05-02 16:36:49'),
(162, '', 'comment on daily reason', '2022-05-02 16:37:21'),
(163, 'edchanila', 'add daily pevement sales', '2022-05-02 16:43:31'),
(164, '', 'add daily cement', '2022-05-02 19:27:26'),
(165, '', 'add daily mchanga', '2022-05-02 19:46:51'),
(166, '', 'add daily kokoto', '2022-05-02 19:47:04'),
(167, '', 'add daily cement matarials', '2022-05-02 20:49:25'),
(168, '', 'add daily cement matarials', '2022-05-02 20:50:38'),
(169, '', 'add daily cement matarials', '2022-05-02 20:59:22'),
(170, '', 'add daily cement matarials', '2022-05-02 20:59:47'),
(171, '', 'add daily cement matarials', '2022-05-02 21:00:02'),
(172, '', 'add daily cement matarials', '2022-05-02 21:00:45'),
(173, '', 'add daily cement', '2022-05-02 21:07:48'),
(174, '', 'add daily mchanga', '2022-05-02 21:08:53'),
(175, '', 'add daily kokoto', '2022-05-02 21:09:00'),
(176, '', 'add truck name Tata', '2022-05-02 21:18:39'),
(177, '', 'add truck name FAW', '2022-05-02 21:21:42'),
(178, '', 'add   detail', '2022-05-02 21:55:54'),
(179, '', 'add   detail', '2022-05-02 22:00:47'),
(180, '', 'add   detail', '2022-05-02 22:04:28'),
(181, '', 'add   detail', '2022-05-02 22:32:20'),
(182, '', 'add   detail', '2022-05-02 22:38:23'),
(183, '', 'add   detail', '2022-05-02 22:44:16'),
(184, '', 'add   detail', '2022-05-02 22:45:00'),
(185, '', 'add   detail', '2022-05-02 22:49:50'),
(186, '', 'add   detail', '2022-05-02 22:53:11'),
(187, '', 'add   detail', '2022-05-02 22:54:42'),
(188, '', 'add   detail', '2022-05-02 22:55:50'),
(189, '', 'add daily blocks product', '2022-05-02 23:04:33'),
(190, '', 'add daily pevement product', '2022-05-02 23:05:21'),
(191, 'edchanila', 'add daily blocks production', '2022-05-02 23:07:50'),
(192, '', 'add  blocks order', '2022-05-03 10:13:38'),
(193, '', 'add  blocks order', '2022-05-03 10:15:07'),
(194, '', 'add  blocks order', '2022-05-03 10:19:56'),
(195, '', 'add   order', '2022-05-03 10:47:02'),
(196, '', 'add   order', '2022-05-03 10:52:03'),
(197, '', 'add   order', '2022-05-03 10:54:13'),
(198, '', 'add   order', '2022-05-03 11:05:27'),
(199, '', 'add   order', '2022-05-03 11:06:14'),
(200, '', 'add  blocks order', '2022-05-03 11:07:19'),
(201, '', 'add   order', '2022-05-03 11:08:26'),
(202, '', 'add  blocks order', '2022-05-03 11:11:46'),
(203, '', 'add  blocks order', '2022-05-03 11:12:05'),
(204, 'edchanila', 'add amaunt paid from 10000 to  20000  on ordername is  ', '2022-05-03 16:48:02'),
(205, 'edchanila', 'add amaunt paid from 10000 to  20000  on ordername is  ', '2022-05-03 16:48:38'),
(206, 'edchanila', 'add amaunt paid from 20000 to  30000  on ordername is  ', '2022-05-03 16:49:05'),
(207, 'edchanila', 'add amaunt paid from 20000 to  30000  on ordername is blocks ', '2022-05-03 16:53:08'),
(208, 'edchanila', 'add amaunt paid from 0 to  10000  on ordername is emma ', '2022-05-03 16:58:29'),
(209, 'edchanila', 'add amaunt paid from 0 to  10000  on ordername is emma ', '2022-05-03 16:58:43'),
(210, 'edchanila', 'add amaunt paid from 10000 to  20000  on ordername is emma ', '2022-05-03 16:59:59'),
(211, 'edchanila', 'add amaunt paid from 10000 to  20000  on ordername is emma ', '2022-05-03 17:08:04'),
(212, 'edchanila', 'add amaunt paid from 20000 to  30000  on ordername is emma ', '2022-05-03 17:08:41'),
(213, 'edchanila', 'add amaunt paid from 30000 to  40000  on ordername is emma ', '2022-05-03 17:19:18'),
(214, 'edchanila', 'add amaunt paid from 20000 to  30000  on ordername is emma ', '2022-05-03 17:22:22'),
(215, 'edchanila', 'add amaunt paid from 40000 to  50000  on ordername is emma ', '2022-05-03 17:30:27'),
(216, 'edchanila', 'add amaunt paid from 30000 to  40000  on ordername is emma ', '2022-05-03 17:30:37'),
(217, 'edchanila', 'add amaunt paid from 30000 to  40000  on ordername is emma ', '2022-05-03 17:30:46'),
(218, '', 'add  blocks order', '2022-05-03 17:31:20'),
(219, '', 'add  blocks order', '2022-05-03 18:26:17'),
(220, '', 'update order status from not confirmed to  confirmed  on ordername is emma ', '2022-05-03 20:24:08'),
(221, '', 'update order status from not confirmed to  confirmed  on ordername is emma ', '2022-05-03 20:24:28'),
(222, '', 'update order status from confirmed to  delivered  on ordername is emma ', '2022-05-03 20:24:45'),
(223, '', 'update order status from delivered to  delivered  on ordername is emma ', '2022-05-03 20:27:25'),
(224, '', 'update order status from delivered to  delivered  on ordername is emma ', '2022-05-03 20:27:28'),
(225, '', 'update order status from delivered to  delivered  on ordername is emma ', '2022-05-03 20:27:29'),
(226, 'edchanila', 'add daily blocks sales', '2022-05-03 21:42:28'),
(227, 'edchanila', 'add daily blocks production', '2022-05-03 21:44:09'),
(228, 'edchanila', 'add daily blocks sales', '2022-05-03 21:46:08'),
(229, 'edchanila', 'loged out', '2022-05-03 21:51:03'),
(230, 'edchanila', 'loged in', '2022-05-03 21:51:25'),
(231, 'edchanila', 'add daily blocks production', '2022-05-03 21:52:20'),
(232, 'edchanila', 'loged in', '2022-05-03 22:16:37'),
(233, 'edchanila', 'add daily blocks sales', '2022-05-03 22:17:21'),
(234, 'edchanila', 'add daily blocks sales', '2022-05-03 22:17:42'),
(235, 'edchanila', 'add daily blocks production', '2022-05-03 22:19:21'),
(236, 'edchanila', 'add daily blocks sales', '2022-05-03 22:19:48'),
(237, 'edchanila', 'add daily pevement production', '2022-05-04 09:15:19'),
(238, 'edchanila', 'add daily pevement sales', '2022-05-04 09:15:52'),
(239, 'edchanila', 'add daily pevement production', '2022-05-04 10:17:21'),
(240, 'edchanila', 'add daily pevement production', '2022-05-04 10:20:06'),
(241, 'edchanila', 'add daily blocks production', '2022-05-04 10:23:23'),
(242, 'edchanila', 'add daily pevement sales', '2022-05-04 10:24:41'),
(243, 'edchanila', 'add daily blocks sales', '2022-05-04 10:27:08'),
(244, 'edchanila', 'add daily pevement production', '2022-05-04 10:30:15'),
(245, 'edchanila', 'loged in', '2022-05-04 11:41:26'),
(246, 'edchanila', 'loged in', '2022-05-04 12:09:20'),
(247, 'edchanila', 'add daily blocks production', '2022-05-04 18:41:07'),
(248, 'edchanila', 'add daily blocks production', '2022-05-04 18:48:23'),
(249, 'edchanila', 'add daily pavement sales', '2022-05-04 20:04:09'),
(250, 'edchanila', 'add daily blocks sales', '2022-05-04 20:04:34'),
(251, 'edchanila', 'add daily pavement sales', '2022-05-04 23:27:17'),
(252, 'edchanila', 'add daily blocks production', '2022-05-04 23:33:02'),
(253, 'edchanila', 'add daily blocks sales', '2022-05-04 23:41:13'),
(254, 'edchanila', 'loged in', '2022-05-05 09:09:26'),
(255, 'edchanila', 'add daily blocks production', '2022-05-05 09:11:16'),
(256, '', 'add  blocks order', '2022-05-05 09:24:17'),
(257, 'edchanila', 'add amaunt paid from 0 to  10000  on ordername is ucsaf ', '2022-05-05 09:24:50'),
(258, '', 'update order status from not confirmed to  confirmed  on ordername is emma ', '2022-05-05 09:26:33'),
(259, '', 'update order status from confirmed to  delivered  on ordername is clement ', '2022-05-05 09:27:01'),
(260, '', 'add  blocks order', '2022-05-05 09:28:29'),
(261, 'edchanila', 'loged out', '2022-05-05 09:33:48'),
(262, 'cpharis', 'loged in', '2022-05-05 09:34:13'),
(263, 'cpharis', 'loged out', '2022-05-05 09:34:54'),
(264, 'edchanila', 'loged in', '2022-05-05 09:37:07'),
(265, '', 'add  blocks order', '2022-05-05 10:02:59'),
(266, '', 'update order status from not confirmed to  confirmed  on ordername is ucsaf ', '2022-05-05 10:04:32'),
(267, 'edchanila', 'add daily blocks sales', '2022-05-05 10:07:39'),
(268, '', 'add  cement matarials', '2022-05-05 10:14:37'),
(269, '', 'add   detail', '2022-05-05 10:16:16'),
(270, 'edchanila', 'loged out', '2022-05-05 10:20:01'),
(271, 'edchanila', 'loged in', '2022-05-05 10:22:16'),
(272, 'edchanila', 'loged in', '2022-05-05 10:51:33'),
(273, 'edchanila', 'loged out', '2022-05-05 11:03:49'),
(274, 'edchanila', 'loged in', '2022-05-05 11:05:10'),
(275, 'edchanila', 'loged in', '2022-05-05 11:43:34'),
(276, 'edchanila', 'loged in', '2022-05-05 17:18:12'),
(277, 'edchanila', 'loged in', '2022-05-05 18:21:03'),
(278, 'edchanila', 'loged in', '2022-05-05 18:22:17'),
(279, '', 'comment on daily reason', '2022-05-05 18:22:50'),
(280, 'edchanila', 'loged out', '2022-05-05 18:23:20'),
(281, 'edchanila', 'loged in', '2022-05-05 18:49:19'),
(282, 'edchanila', 'add daily blocks production', '2022-05-05 23:38:18'),
(283, '', 'comment on daily reason', '2022-05-05 23:38:45'),
(284, 'edchanila', 'add daily blocks sales', '2022-05-06 07:15:11'),
(285, 'edchanila', 'add daily pavement production', '2022-05-06 07:18:41'),
(286, 'edchanila', 'add daily blocks sales', '2022-05-06 17:16:12'),
(287, 'edchanila', 'add daily pavement sales', '2022-05-06 17:16:36'),
(288, '', 'add daily mafuta site', '2022-05-07 09:55:58'),
(289, 'edchanila', 'loged in', '2022-05-07 11:46:07'),
(290, 'edchanila', 'loged in', '2022-05-07 11:55:34'),
(291, 'edchanila', 'add daily blocks production', '2022-05-07 13:55:33'),
(292, 'edchanila', 'add daily pavement production', '2022-05-07 13:56:16'),
(293, 'edchanila', 'add daily blocks sales', '2022-05-07 14:03:16'),
(294, 'edchanila', 'add daily pavement sales', '2022-05-07 14:03:36'),
(295, 'edchanila', 'add daily blocks production', '2022-05-07 15:24:26'),
(296, 'edchanila', 'add daily blocks sales', '2022-05-07 15:25:15'),
(297, 'edchanila', 'add daily pavement sales', '2022-05-07 15:25:51'),
(298, 'edchanila', 'loged in', '2022-05-07 17:29:12'),
(299, 'edchanila', 'loged in', '2022-05-08 06:21:15'),
(300, '', 'update order status from confirmed to  delivered  on ordername is emma ', '2022-05-08 06:49:05'),
(301, '', 'update order status from not confirmed to  confirmed  on ordername is emma ', '2022-05-08 06:49:54'),
(302, '', 'add   root detail', '2022-05-08 08:11:11'),
(303, '', 'add   root detail', '2022-05-08 08:51:08'),
(304, '', 'add   root detail', '2022-05-08 09:24:53'),
(305, '', 'add   root detail', '2022-05-08 09:26:10'),
(306, '', 'add   fuel detail', '2022-05-08 09:42:14'),
(307, '', 'add   fuel detail', '2022-05-08 09:45:16'),
(308, '', 'add   service detail', '2022-05-08 10:29:16'),
(309, '', 'add   service detail', '2022-05-08 10:30:02'),
(310, '', 'add   service detail', '2022-05-08 10:32:10'),
(311, '', 'add   service detail', '2022-05-08 11:19:27'),
(312, '', 'add   fuel detail', '2022-05-08 11:49:16'),
(313, '', 'add   fuel detail', '2022-05-08 11:53:59'),
(314, '', 'add   fuel detail', '2022-05-08 11:54:18'),
(315, '', 'add   fuel detail', '2022-05-08 11:56:40'),
(316, '', 'add   fuel detail', '2022-05-08 11:56:57'),
(317, '', 'add   fuel detail', '2022-05-08 11:59:08'),
(318, '', 'add   fuel detail', '2022-05-08 11:59:49'),
(319, '', 'add   fuel detail', '2022-05-08 12:00:08'),
(320, 'edchanila', 'loged in', '2022-05-08 19:44:04'),
(321, 'edchanila', 'loged in', '2022-05-09 06:18:23'),
(322, 'edchanila', 'add daily blocks production', '2022-05-09 08:53:21'),
(323, 'edchanila', 'add daily blocks production', '2022-05-09 09:52:12'),
(324, 'edchanila', 'add daily pavement production', '2022-05-09 10:25:30'),
(325, 'edchanila', 'add daily blocks sales', '2022-05-09 10:26:14'),
(326, 'edchanila', 'add daily pavement sales', '2022-05-09 10:26:33'),
(327, '', 'add daily blocks production cost', '2022-05-09 12:59:22'),
(328, '', 'add daily blocks production cost', '2022-05-09 13:03:20'),
(329, '', 'add daily pavement production cost', '2022-05-09 13:03:51'),
(330, 'edchanila', 'add daily blocks sales', '2022-05-09 14:40:45'),
(331, 'edchanila', 'add daily blocks sales', '2022-05-09 14:41:23'),
(332, '', 'procure cement', '2022-05-09 16:35:14'),
(333, '', 'procure cement', '2022-05-09 16:57:27'),
(334, '', 'procure cement', '2022-05-09 17:00:47'),
(335, '', 'procure cement', '2022-05-09 17:01:52'),
(336, '', 'procure cement', '2022-05-09 17:05:27'),
(337, '', 'procure cement', '2022-05-09 17:06:50'),
(338, '', 'add  cement matarials used', '2022-05-09 19:36:58'),
(339, '', 'add  cement matarials used', '2022-05-09 19:43:16'),
(340, '', 'add  cement matarials used', '2022-05-09 20:08:52'),
(341, '', 'add  cement matarials used', '2022-05-09 20:10:33'),
(342, '', 'add  cement matarials used', '2022-05-09 20:12:58'),
(343, '', 'add  cement matarials used', '2022-05-09 20:19:16'),
(344, '', 'add  cement matarials used', '2022-05-09 20:22:06'),
(345, '', 'add  cement matarials used', '2022-05-09 20:23:20'),
(346, '', 'add  cement matarials used', '2022-05-09 20:24:52'),
(347, '', 'add  cement matarials used', '2022-05-09 20:25:15'),
(348, '', 'add  cement matarials used', '2022-05-09 20:50:55'),
(349, '', 'add  cement matarials used', '2022-05-09 20:51:05'),
(350, '', 'add  cement matarials used', '2022-05-09 21:04:42'),
(351, '', 'add  cement matarials used', '2022-05-09 21:04:51'),
(352, '', 'procure cement', '2022-05-09 21:05:32'),
(353, '', 'add  cement matarials used', '2022-05-09 21:06:00'),
(354, '', 'add   root detail', '2022-05-09 22:26:43'),
(355, '', 'add   fuel detail', '2022-05-09 22:28:07'),
(356, '', 'add   service detail', '2022-05-09 22:29:11'),
(357, '', 'add   fuel detail', '2022-05-09 22:30:08'),
(358, '', 'add  cement matarials used', '2022-05-09 22:32:32'),
(359, 'edchanila', 'add daily blocks production', '2022-05-10 06:58:45'),
(360, 'edchanila', 'add daily pavement production', '2022-05-10 06:59:44'),
(361, 'edchanila', 'add daily blocks sales', '2022-05-10 07:00:33'),
(362, 'edchanila', 'add daily pavement sales', '2022-05-10 07:01:16'),
(363, 'edchanila', 'add daily pavement sales', '2022-05-10 07:05:41'),
(364, '', 'add  site  detail', '2022-05-10 07:57:58'),
(365, '', 'add  site  detail', '2022-05-10 07:59:48'),
(366, '', 'add  site  detail', '2022-05-10 08:01:30'),
(367, '', 'add  site  detail', '2022-05-10 08:03:00'),
(368, '', 'procure cement', '2022-05-10 08:17:55'),
(369, '', 'add  site service detail', '2022-05-10 08:52:45'),
(370, '', 'add  site payment detail', '2022-05-10 09:28:46'),
(371, '', 'add  estimetion cost detail', '2022-05-10 11:39:08'),
(372, '', 'add  estimetion cost detail', '2022-05-10 11:39:59'),
(373, '', 'add  estimetion cost detail', '2022-05-10 11:45:44'),
(374, '', 'add  estimetion cost detail', '2022-05-10 11:56:43'),
(375, '', 'add  estimetion cost detail', '2022-05-10 11:57:44'),
(376, '', 'add  estimetion cost detail', '2022-05-10 12:03:08'),
(377, '', 'add  estimetion cost detail', '2022-05-10 13:17:12'),
(378, '', 'procure cement', '2022-05-10 14:50:07'),
(379, '', 'procure mchanga', '2022-05-10 14:51:14'),
(380, '', 'add   fuel detail', '2022-05-10 15:04:24'),
(381, '', 'add   payment detail', '2022-05-10 15:50:42'),
(382, '', 'add   payment detail', '2022-05-10 15:51:00'),
(383, '', 'add   service detail', '2022-05-10 20:07:50'),
(384, '', 'add   service detail', '2022-05-10 20:08:23'),
(385, '', 'add  money  detail', '2022-05-10 21:43:41'),
(386, '', 'add  money  detail', '2022-05-10 21:51:24'),
(387, '', 'add  money  detail', '2022-05-10 21:53:16'),
(388, 'edchanila', 'add daily blocks production', '2022-05-10 22:14:25'),
(389, 'edchanila', 'add daily pavement production', '2022-05-10 22:15:37'),
(390, 'edchanila', 'add daily blocks sales', '2022-05-10 22:16:20'),
(391, 'edchanila', 'add daily pavement sales', '2022-05-10 22:16:56'),
(392, 'edchanila', 'loged out', '2022-05-10 22:27:40'),
(393, 'Bchaula', 'loged in', '2022-05-10 22:28:32'),
(394, 'Bchaula', 'loged out', '2022-05-10 22:52:27'),
(395, 'Bchaula', 'loged in', '2022-05-10 22:52:57'),
(396, 'Bchaula', 'loged out', '2022-05-10 23:43:05'),
(397, 'Bchaula', 'loged in', '2022-05-10 23:44:36'),
(398, 'Bchaula', 'loged out', '2022-05-10 23:44:40'),
(399, 'Bchaula', 'loged in', '2022-05-10 23:46:11'),
(400, 'Bchaula', 'loged out', '2022-05-10 23:46:16'),
(401, 'Bchaula', 'loged in', '2022-05-10 23:51:46'),
(402, 'Bchaula', 'loged out', '2022-05-10 23:51:50'),
(403, 'Bchaula', 'loged in', '2022-05-10 23:52:43'),
(404, 'Bchaula', 'loged out', '2022-05-10 23:52:46'),
(405, 'edchanila', 'loged in', '2022-05-10 23:53:03'),
(406, 'edchanila', 'loged out', '2022-05-10 23:53:56'),
(407, 'Bchaula', 'loged in', '2022-05-10 23:54:25'),
(408, 'Bchaula', 'loged out', '2022-05-10 23:57:19'),
(409, 'bchaula', 'loged in', '2022-05-10 23:59:12'),
(410, 'bchaula', 'loged out', '2022-05-10 23:59:20'),
(411, 'bchaula', 'loged in', '2022-05-11 00:01:26'),
(412, 'bchaula', 'loged out', '2022-05-11 00:01:56'),
(413, 'edchanila', 'loged in', '2022-05-11 00:02:15'),
(414, 'edchanila', 'loged out', '2022-05-11 00:02:41'),
(415, 'bchaula', 'loged in', '2022-05-11 00:04:58'),
(416, 'bchaula', 'loged out', '2022-05-11 00:05:00'),
(417, 'edchanila', 'loged in', '2022-05-11 00:05:42'),
(418, 'edchanila', 'loged out', '2022-05-11 00:06:41'),
(419, 'bchaula', 'loged in', '2022-05-11 00:06:55'),
(420, 'bchaula', 'loged out', '2022-05-11 00:08:40'),
(421, 'bchaula', 'loged in', '2022-05-11 13:48:06'),
(422, 'bchaula', 'loged out', '2022-05-11 13:51:38'),
(423, 'edchanila', 'loged in', '2022-05-11 13:51:56'),
(424, 'edchanila', 'loged in', '2022-05-11 13:52:54'),
(425, 'edchanila', 'loged in', '2022-05-11 13:57:06'),
(426, 'edchanila', 'add daily blocks production', '2022-05-11 14:48:35'),
(427, '', 'comment on daily reason', '2022-05-11 14:49:44'),
(428, 'edchanila', 'loged out', '2022-05-11 14:50:39'),
(429, 'bchaula', 'loged in', '2022-05-11 14:50:55'),
(430, '', 'comment on daily reason', '2022-05-11 14:51:26'),
(431, 'bchaula', 'loged out', '2022-05-11 14:51:59'),
(432, 'edchanila', 'loged in', '2022-05-11 14:52:11'),
(433, 'edchanila', 'add daily blocks sales', '2022-05-11 14:53:17'),
(434, 'edchanila', 'add daily pavement sales', '2022-05-11 14:55:05'),
(435, 'edchanila', 'add daily blocks production', '2022-05-11 15:02:33'),
(436, 'edchanila', 'add daily blocks production', '2022-05-11 15:38:26'),
(437, 'edchanila', 'add daily blocks production', '2022-05-11 15:39:51'),
(438, 'edchanila', 'add daily blocks production', '2022-05-12 06:44:02'),
(439, 'edchanila', 'add daily pavement production', '2022-05-12 06:45:20'),
(440, 'edchanila', 'add daily blocks sales', '2022-05-12 06:46:01'),
(441, 'edchanila', 'add daily pavement sales', '2022-05-12 06:46:21'),
(442, '', 'comment on daily reason', '2022-05-12 11:28:07'),
(443, '', 'add  cement matarials used', '2022-05-12 11:33:13'),
(444, '', 'procure cement', '2022-05-12 11:34:12'),
(445, '', 'add  cement matarials used', '2022-05-12 11:34:39'),
(446, '', 'add  mchanga matarials used', '2022-05-12 11:35:19'),
(447, 'edchanila', 'loged out', '2022-05-12 12:12:54'),
(448, 'bchaula', 'loged in', '2022-05-12 12:13:18'),
(449, 'bchaula', 'loged out', '2022-05-12 12:14:14'),
(450, 'edchanila', 'loged in', '2022-05-12 12:15:50'),
(451, '', 'add daily blocks production cost', '2022-05-12 12:47:53'),
(452, '', 'add daily pavement production cost', '2022-05-12 12:50:42'),
(453, '', 'add daily blocks production cost', '2022-05-12 12:52:08'),
(454, '', 'add daily pavement production cost', '2022-05-12 12:52:30'),
(455, 'edchanila', 'add daily pavement production', '2022-05-12 13:23:39'),
(456, 'edchanila', 'loged out', '2022-05-12 13:35:26'),
(457, 'bchaula', 'loged in', '2022-05-12 13:50:32'),
(458, 'edchanila', 'loged in', '2022-05-15 19:09:41'),
(459, 'edchanila', 'add daily blocks sales', '2022-05-15 19:10:16'),
(460, 'edchanila', 'add daily pavement sales', '2022-05-15 19:10:48'),
(461, 'edchanila', 'add daily blocks production', '2022-05-15 19:12:41'),
(462, 'edchanila', 'add daily pavement production', '2022-05-15 19:13:51'),
(463, 'edchanila', 'add daily blocks production', '2022-05-16 05:09:18'),
(464, '', 'comment on daily reason', '2022-05-16 05:09:43'),
(465, 'edchanila', 'loged in', '2022-05-23 08:19:18'),
(466, 'edchanila', 'loged in', '2022-05-23 10:57:27'),
(467, 'edchanila', 'loged in', '2022-05-23 11:03:36'),
(468, 'edchanila', 'add daily blocks production', '2022-05-23 12:06:13'),
(469, 'edchanila', 'add daily blocks sales', '2022-05-23 12:55:00'),
(470, 'edchanila', 'add daily pavement production', '2022-05-23 12:56:11'),
(471, 'edchanila', 'add daily pavement sales', '2022-05-23 12:57:03'),
(472, 'edchanila', 'add daily blocks production', '2022-05-23 13:36:04'),
(473, 'edchanila', 'add daily blocks production', '2022-05-23 13:37:18'),
(474, '', 'add daily blocks 5d product', '2022-05-23 13:39:49'),
(475, '', 'add daily blocks production cost', '2022-05-23 13:42:34'),
(476, '', 'add daily blocks production cost', '2022-05-23 13:43:11'),
(477, '', 'comment on daily reason', '2022-05-23 13:59:06'),
(478, '', 'comment on daily reason', '2022-05-23 13:59:57'),
(479, '', 'add daily blocks production cost', '2022-05-23 14:00:43'),
(480, 'edchanila', 'add daily blocks sales', '2022-05-23 14:08:56'),
(481, 'edchanila', 'add daily blocks sales', '2022-05-23 14:09:43'),
(482, '', 'procure cement', '2022-05-23 14:49:11'),
(483, '', 'add  cement matarials used', '2022-05-23 14:58:11'),
(484, '', 'add  cement matarials used', '2022-05-23 14:58:53'),
(485, '', 'procure kokoto', '2022-05-23 14:59:46'),
(486, '', 'add  kokoto matarials used', '2022-05-23 15:00:20'),
(487, '', 'add   root detail', '2022-05-23 15:10:38'),
(488, '', 'add   fuel detail', '2022-05-23 15:24:42'),
(489, '', 'add   fuel detail', '2022-05-23 15:29:10'),
(490, '', 'add   service detail', '2022-05-23 15:42:48'),
(491, '', 'add   payment detail', '2022-05-23 15:54:49'),
(492, '', 'add   fuel detail', '2022-05-23 16:02:32'),
(493, '', 'add  site  detail', '2022-05-23 16:10:56'),
(494, '', 'add  site service detail', '2022-05-23 16:27:45'),
(495, '', 'add  site payment detail', '2022-05-23 16:40:17'),
(496, '', 'add  blocks order', '2022-05-23 16:52:17'),
(497, 'edchanila', 'add amaunt paid from 10000 to  20000  on ordername is emma ', '2022-05-23 16:55:16'),
(498, 'edchanila', 'add amaunt paid from 20000 to  30000  on ordername is emma ', '2022-05-23 16:55:58'),
(499, '', 'update order status from not confirmed to  confirmed  on ordername is emma ', '2022-05-23 17:00:00'),
(500, '', 'add  estimetion cost detail', '2022-05-23 17:09:06'),
(501, '', 'add  estimetion cost detail', '2022-05-23 17:10:49'),
(502, '', 'add  estimetion cost detail', '2022-05-23 17:12:39'),
(503, '', 'add  money  detail', '2022-05-23 17:27:14'),
(504, '', 'add  money  detail', '2022-05-23 17:28:54'),
(505, 'edchanila', 'Add member name is Freaddy , last na is Nolasco and user name is fnolasco ', '2022-05-23 20:19:52'),
(506, 'edchanila', 'Add member name is deus , last na is chanila and user name is dchanila ', '2022-05-23 20:20:36'),
(507, '', 'add daily blocks 6D product', '2022-05-23 20:28:26'),
(508, '', 'add daily blocks 6C product', '2022-05-23 20:28:52'),
(509, 'edchanila', 'loged out', '2022-05-23 20:30:32'),
(510, 'edchanila', 'loged in', '2022-05-23 20:31:43'),
(511, 'edchanila', 'loged out', '2022-05-23 20:31:47'),
(512, 'bchaula', 'loged in', '2022-05-23 20:32:00'),
(513, 'bchaula', 'loged in', '2022-05-23 20:36:19'),
(514, 'bchaula', 'loged in', '2022-05-23 20:37:43'),
(515, 'bchaula', 'loged out', '2022-05-23 20:41:58'),
(516, 'bchaula', 'loged in', '2022-05-23 20:43:49'),
(517, 'bchaula', 'loged out', '2022-05-23 20:43:55'),
(518, 'bchaula', 'loged in', '2022-05-23 20:45:30'),
(519, 'bchaula', 'loged out', '2022-05-23 20:45:33'),
(520, 'bchaula', 'loged in', '2022-05-23 20:46:41'),
(521, 'bchaula', 'loged out', '2022-05-23 20:46:45'),
(522, 'bchaula', 'loged in', '2022-05-23 20:47:28'),
(523, 'bchaula', 'loged out', '2022-05-23 20:47:33'),
(524, 'bchaula', 'loged in', '2022-05-23 20:48:38'),
(525, 'bchaula', 'loged out', '2022-05-23 20:48:46'),
(526, 'bchaula', 'loged in', '2022-05-23 20:50:15'),
(527, 'bchaula', 'loged out', '2022-05-23 20:50:19'),
(528, 'bchaula', 'loged in', '2022-05-23 20:50:38'),
(529, 'bchaula', 'loged in', '2022-05-23 20:52:33'),
(530, 'bchaula', 'loged out', '2022-05-23 20:52:36'),
(531, 'bchaula', 'loged in', '2022-05-23 20:52:54'),
(532, 'edchanila', 'loged out', '2022-05-23 20:55:29'),
(533, 'bchaula', 'loged in', '2022-05-23 20:55:51'),
(534, '', 'comment on daily reason', '2022-05-23 20:59:48'),
(535, 'bchaula', 'loged out', '2022-05-23 21:43:32'),
(536, 'bchaula', 'loged in', '2022-05-23 21:43:45'),
(537, 'edchanila', 'loged in', '2022-05-26 07:37:45'),
(538, 'edchanila', 'add daily pavement sales', '2022-05-26 07:38:31'),
(539, 'edchanila', 'add daily pavement sales', '2022-05-26 08:14:42'),
(540, '', 'add  cement matarials used', '2022-05-26 08:52:52'),
(541, 'edchanila', 'add daily pavement sales', '2022-05-27 07:41:17'),
(542, 'edchanila', 'add daily pavement sales', '2022-05-27 07:41:34'),
(543, 'edchanila', 'add daily pavement production', '2022-05-27 07:42:47'),
(544, '', 'comment on daily reason', '2022-05-27 07:43:01'),
(545, 'edchanila', 'add daily pavement sales', '2022-05-27 07:43:50'),
(546, 'edchanila', 'add daily blocks 5D production', '2022-05-27 07:45:13'),
(547, 'edchanila', 'add daily blocks 5D sales', '2022-05-27 07:46:05'),
(548, 'edchanila', 'loged out', '2022-05-27 07:52:53'),
(549, 'chanila', 'loged in', '2022-05-27 07:53:06'),
(550, 'chanila', 'add daily blocks 5C production', '2022-05-27 07:53:54'),
(551, 'chanila', 'add daily blocks 5C sales', '2022-05-27 07:54:49'),
(552, '', 'comment on daily reason', '2022-05-27 12:59:49'),
(553, 'edchanila', 'loged in', '2022-05-27 13:10:38'),
(554, '', 'comment on daily reason', '2022-05-27 13:43:56'),
(555, '', 'add   fuel detail', '2022-05-27 13:52:51'),
(556, 'edchanila', 'loged in', '2022-05-29 22:55:15'),
(557, 'edchanila', 'add daily blocks 5D production', '2022-05-29 22:56:13'),
(558, 'edchanila', 'add daily blocks 5D production', '2022-05-29 22:56:59'),
(559, 'edchanila', 'loged in', '2022-06-02 11:25:48'),
(560, 'edchanila', 'add daily blocks 6C production', '2022-06-02 11:47:56'),
(561, 'edchanila', 'loged in', '2022-06-02 11:53:42'),
(562, 'edchanila', 'add daily blocks 5C production', '2022-06-02 12:42:43'),
(563, 'edchanila', 'add daily blocks 5D sales', '2022-06-02 13:23:39'),
(564, '', 'add daily blocks 5D production cost', '2022-06-02 14:05:01'),
(565, 'edchanila', 'add daily blocks 6D production', '2022-06-02 14:24:15'),
(566, 'edchanila', 'add daily blocks 6D production', '2022-06-02 14:25:48'),
(567, 'edchanila', 'add daily blocks 6D production', '2022-06-02 14:58:42'),
(568, 'edchanila', 'add daily blocks 6D production', '2022-06-02 14:59:30'),
(569, 'edchanila', 'add daily blocks 6D production', '2022-06-02 15:03:34'),
(570, 'edchanila', 'add daily blocks 6D production', '2022-06-02 15:06:02'),
(571, 'edchanila', 'add daily blocks 6D production', '2022-06-02 15:08:08'),
(572, 'edchanila', 'add daily blocks 6D production', '2022-06-02 15:09:52'),
(573, 'edchanila', 'add daily blocks 6D production', '2022-06-02 15:10:17'),
(574, 'edchanila', 'add daily blocks 5D sales', '2022-06-03 07:20:50'),
(575, 'edchanila', 'add daily blocks 5D sales', '2022-06-03 07:24:45'),
(576, 'edchanila', 'add daily blocks 5D sales', '2022-06-03 07:31:44'),
(577, 'edchanila', 'add daily blocks 5D sales', '2022-06-03 07:33:38'),
(578, 'edchanila', 'add daily blocks 5D sales', '2022-06-03 07:33:48'),
(579, 'edchanila', 'add daily pavement sales', '2022-06-03 08:52:31'),
(580, 'edchanila', 'add daily pavement sales', '2022-06-03 08:55:59'),
(581, 'edchanila', 'add daily pavement sales', '2022-06-03 08:56:15'),
(582, '', 'add  money  detail', '2022-06-03 09:01:30'),
(583, '', 'add  money  detail', '2022-06-03 09:12:22'),
(584, '', 'add   root detail', '2022-06-03 09:34:14'),
(585, '', 'add   root detail', '2022-06-03 09:35:52'),
(586, '', 'add   root detail', '2022-06-03 09:36:01'),
(587, 'edchanila', 'add daily blocks 5D production', '2022-06-03 09:37:58'),
(588, 'edchanila', 'add daily blocks 5D production', '2022-06-03 09:38:17'),
(589, '', 'add   root detail', '2022-06-03 09:38:41'),
(590, '', 'add   root detail', '2022-06-03 09:38:53'),
(591, '', 'add   root detail', '2022-06-03 09:44:26'),
(592, 'edchanila', 'loged out', '2022-06-03 18:11:13'),
(593, 'bchaula', 'loged in', '2022-06-03 18:11:29'),
(594, 'bchaula', 'loged out', '2022-06-03 18:15:16'),
(595, 'edchanila', 'loged in', '2022-06-03 18:15:32'),
(596, 'edchanila', 'Add member name is neema , last na is ignas and user name is nignas ', '2022-06-03 18:16:16'),
(597, '', 'add   root detail', '2022-06-05 13:17:29'),
(598, '', 'add   fuel detail', '2022-06-05 13:25:17'),
(599, '', 'add   fuel detail', '2022-06-05 13:29:36'),
(600, '', 'add   fuel detail', '2022-06-05 13:29:44'),
(601, '', 'add  money  detail', '2022-06-05 14:06:57'),
(602, '', 'add  estimetion cost detail', '2022-06-05 14:07:41'),
(603, '', 'add   service detail', '2022-06-05 14:36:53'),
(604, '', 'add   service detail', '2022-06-05 14:38:56'),
(605, '', 'add   payment detail', '2022-06-05 14:46:26'),
(606, '', 'add  site  detail', '2022-06-05 14:55:56'),
(607, '', 'add  site service detail', '2022-06-05 15:05:19'),
(608, '', 'add  site service detail', '2022-06-05 15:05:30'),
(609, '', 'add  site service detail', '2022-06-05 15:05:42'),
(610, '', 'add  site service detail', '2022-06-05 15:06:40'),
(611, '', 'add  site service detail', '2022-06-05 15:06:40'),
(612, '', 'add  site service detail', '2022-06-05 15:06:57'),
(613, '', 'add  site payment detail', '2022-06-05 15:09:49'),
(614, '', 'add  site payment detail', '2022-06-05 15:14:06'),
(615, '', 'add  blocks 5D order', '2022-06-05 15:19:07'),
(616, '', 'add  blocks 5D order', '2022-06-05 15:26:21'),
(617, '', 'add  estimetion cost detail', '2022-06-05 15:37:55'),
(618, '', 'add  estimetion cost detail', '2022-06-05 15:40:06'),
(619, '', 'add  estimetion cost detail', '2022-06-05 15:42:47'),
(620, '', 'add  estimetion cost detail', '2022-06-05 15:49:02'),
(621, 'edchanila', 'add daily blocks 5D sales', '2022-06-05 17:32:39'),
(622, 'edchanila', 'add daily blocks 5D sales', '2022-06-05 17:32:51'),
(623, 'edchanila', 'add daily blocks 5D sales', '2022-06-05 17:32:59'),
(624, 'edchanila', 'loged out', '2022-06-05 17:37:43'),
(625, 'edchanila', 'loged in', '2022-06-05 17:38:09'),
(626, 'edchanila', 'add daily blocks 6C sales', '2022-06-05 17:53:22'),
(627, 'edchanila', 'add daily blocks 6C sales', '2022-06-05 17:53:29'),
(628, 'edchanila', 'add daily blocks 5D production', '2022-06-05 18:01:22'),
(629, 'edchanila', 'add daily blocks 5D production', '2022-06-05 18:02:07'),
(630, 'edchanila', 'add daily blocks 5D production', '2022-06-05 18:02:20'),
(631, 'edchanila', 'add daily blocks 5D sales', '2022-06-05 18:02:48'),
(632, 'edchanila', 'add daily blocks 5D sales', '2022-06-05 18:03:01'),
(633, 'edchanila', 'add daily blocks 5D production', '2022-06-05 18:08:44'),
(634, 'edchanila', 'add daily blocks 6D sales', '2022-06-05 18:09:27'),
(635, 'edchanila', 'add daily blocks 6D sales', '2022-06-05 18:11:39'),
(636, 'edchanila', 'add daily blocks 5D production', '2022-06-05 18:13:04'),
(637, 'edchanila', 'add daily blocks 5D sales', '2022-06-05 18:13:22'),
(638, 'edchanila', 'add daily blocks 5D sales', '2022-06-05 18:14:53'),
(639, 'edchanila', 'add daily blocks 5D sales', '2022-06-05 18:15:14'),
(640, 'edchanila', 'add daily blocks 5D production', '2022-06-05 18:18:17'),
(641, 'edchanila', 'add daily blocks 5C sales', '2022-06-05 18:19:38'),
(642, 'edchanila', 'add daily blocks 5C sales', '2022-06-05 18:20:00'),
(643, 'edchanila', 'add daily blocks 5D production', '2022-06-05 18:23:23'),
(644, 'edchanila', 'add daily blocks 5D sales', '2022-06-05 18:32:52'),
(645, 'edchanila', 'add daily blocks 5D sales', '2022-06-05 18:33:00'),
(646, 'edchanila', 'add daily blocks 5D production', '2022-06-05 18:41:54'),
(647, 'edchanila', 'add daily blocks 5D sales', '2022-06-05 18:42:09'),
(648, 'edchanila', 'add daily blocks 5D sales', '2022-06-05 18:42:32'),
(649, 'edchanila', 'add daily blocks 5D production', '2022-06-05 18:48:56'),
(650, 'edchanila', 'add daily blocks 5D sales', '2022-06-05 18:49:14'),
(651, 'edchanila', 'add daily blocks 5D sales', '2022-06-05 18:49:22'),
(652, 'edchanila', 'add daily blocks 5D sales', '2022-06-05 18:58:50'),
(653, 'edchanila', 'add daily blocks 5D production', '2022-06-05 19:01:52'),
(654, 'edchanila', 'add daily blocks 5D sales', '2022-06-05 19:02:34'),
(655, 'edchanila', 'add daily blocks 5D sales', '2022-06-05 19:02:42'),
(656, 'edchanila', 'add daily blocks 5D sales', '2022-06-05 19:02:51'),
(657, 'edchanila', 'add daily blocks 5D sales', '2022-06-05 19:37:40'),
(658, 'edchanila', 'add daily blocks 5D sales', '2022-06-05 19:38:32'),
(659, 'edchanila', 'add daily blocks 5D sales', '2022-06-05 19:38:42'),
(660, 'edchanila', 'add daily blocks 5D sales', '2022-06-05 19:39:32'),
(661, 'edchanila', 'add daily blocks 5D sales', '2022-06-05 19:39:56'),
(662, 'edchanila', 'add daily blocks 5D sales', '2022-06-05 19:40:08'),
(663, 'edchanila', 'add daily blocks 5D sales', '2022-06-05 19:41:41'),
(664, '', 'add  cement matarials used', '2022-06-05 21:44:16'),
(665, '', 'add  cement matarials used', '2022-06-05 21:44:35'),
(666, '', 'add  kokoto matarials used', '2022-06-05 22:07:52'),
(667, '', 'add  kokoto matarials used', '2022-06-05 22:21:28'),
(668, '', 'add  kokoto matarials used', '2022-06-05 22:21:35'),
(669, '', 'add  kokoto matarials used', '2022-06-05 22:21:43'),
(670, '', 'add  kokoto matarials used', '2022-06-05 22:21:53'),
(671, '', 'add  kokoto matarials used', '2022-06-05 22:24:12'),
(672, '', 'add  kokoto matarials used', '2022-06-05 22:24:19'),
(673, '', 'add  kokoto matarials used', '2022-06-05 22:24:26'),
(674, '', 'add  kokoto matarials used', '2022-06-05 22:24:34'),
(675, '', 'add  kokoto matarials used', '2022-06-05 22:24:41'),
(676, '', 'add  kokoto matarials used', '2022-06-05 22:24:47'),
(677, '', 'procure cement', '2022-06-06 07:17:05'),
(678, '', 'procure cement', '2022-06-06 07:17:21'),
(679, '', 'procure cement', '2022-06-06 07:38:17'),
(680, '', 'procure cement', '2022-06-06 07:39:23'),
(681, '', 'add  estimetion cost detail', '2022-06-06 09:03:26'),
(682, '', 'add  estimetion cost detail', '2022-06-06 09:16:02'),
(683, '', 'add  estimetion cost detail', '2022-06-06 09:16:17'),
(684, '', 'add  estimetion cost detail', '2022-06-06 09:28:38'),
(685, '', 'add  estimetion cost detail', '2022-06-06 09:30:24'),
(686, '', 'add  estimetion cost detail', '2022-06-06 09:35:43'),
(687, '', 'add  estimetion cost detail', '2022-06-06 09:36:30'),
(688, '', 'add  estimetion cost detail', '2022-06-06 12:34:20'),
(689, '', 'add  estimetion cost detail', '2022-06-06 12:36:23'),
(690, '', 'add  estimetion cost detail', '2022-06-06 12:41:23'),
(691, 'edchanila', 'loged in', '2022-06-06 17:51:15'),
(692, 'edchanila', 'add daily blocks 5D production', '2022-06-06 19:49:08'),
(693, 'edchanila', 'add daily blocks 5D sales', '2022-06-06 19:49:31'),
(694, 'edchanila', 'add daily blocks 5D sales', '2022-06-06 19:49:57'),
(695, 'edchanila', 'add daily pavement production', '2022-06-06 21:38:01'),
(696, 'edchanila', 'add daily pavement sales', '2022-06-06 21:38:21'),
(697, 'edchanila', 'add daily blocks 5D sales', '2022-06-07 05:05:08'),
(698, 'edchanila', 'loged in', '2022-06-07 17:53:28'),
(699, '', 'add  site service detail', '2022-06-07 17:54:37'),
(700, 'edchanila', 'add daily blocks 5C production', '2022-06-08 06:35:19'),
(701, 'edchanila', 'add daily blocks 5C production', '2022-06-08 06:37:33'),
(702, 'edchanila', 'add daily blocks 5C production', '2022-06-08 06:43:57'),
(703, 'edchanila', 'add daily blocks 5C production', '2022-06-08 06:44:48'),
(704, 'edchanila', 'add daily blocks 5C production', '2022-06-08 06:47:02'),
(705, 'edchanila', 'add daily blocks 5C production', '2022-06-08 06:48:51'),
(706, 'edchanila', 'loged in', '2022-06-12 07:15:16'),
(707, '', 'add  blocks 5D order', '2022-06-12 08:25:41'),
(708, 'edchanila', 'add amaunt paid from 10000 to  12000  on ordername is clement ', '2022-06-12 08:26:59'),
(709, 'edchanila', 'add amaunt paid from 12000 to  12000  on ordername is clement ', '2022-06-12 08:31:11'),
(710, '', 'update order status from not confirmed to  confirmed  on ordername is emma ', '2022-06-12 09:17:51'),
(711, 'edchanila', 'add daily blocks 5D sales', '2022-06-13 11:41:50'),
(712, 'edchanila', 'add daily blocks 5D sales', '2022-06-13 12:10:47'),
(713, 'edchanila', 'add daily blocks 5D sales', '2022-06-13 12:12:47'),
(714, 'edchanila', 'add daily blocks 5D sales', '2022-06-13 12:29:33'),
(715, 'edchanila', 'add daily blocks 5D sales', '2022-06-13 12:31:13'),
(716, 'edchanila', 'loged in', '2022-06-13 18:53:29'),
(717, 'edchanila', 'add daily blocks 5D sales', '2022-06-13 20:37:02'),
(718, 'edchanila', 'add daily blocks 5D sales', '2022-06-13 21:55:10'),
(719, 'edchanila', 'add daily blocks 5D sales', '2022-06-13 22:03:22'),
(720, 'edchanila', 'add daily blocks 5D sales', '2022-06-13 22:05:34'),
(721, 'edchanila', 'add daily blocks 5D sales', '2022-06-13 22:07:25'),
(722, 'edchanila', 'add daily blocks 5D sales', '2022-06-13 22:13:12'),
(723, 'edchanila', 'add daily blocks 5D sales', '2022-06-13 22:14:07'),
(724, 'edchanila', 'add daily blocks 5D sales', '2022-06-14 07:56:35'),
(725, 'edchanila', 'add daily blocks 5D sales', '2022-06-14 08:17:03'),
(726, 'edchanila', 'add daily blocks 5D sales', '2022-06-14 10:22:46'),
(727, 'edchanila', 'add daily blocks 5D production', '2022-06-14 10:28:30'),
(728, '', 'comment on daily reason', '2022-06-14 10:28:56'),
(729, '', 'comment on daily reason', '2022-06-14 12:00:28'),
(730, '', 'comment on daily reason', '2022-06-14 12:09:47'),
(731, '', 'comment on daily reason', '2022-06-14 12:10:33'),
(732, '', 'comment on daily reason', '2022-06-14 12:13:08'),
(733, '', 'comment on daily reason', '2022-06-14 12:14:01'),
(734, '', 'comment on daily reason', '2022-06-14 12:16:07'),
(735, 'edchanila', 'add daily blocks 5D sales', '2022-06-14 12:17:25'),
(736, '', 'comment on daily reason', '2022-06-14 12:17:53'),
(737, '', 'comment on daily reason', '2022-06-14 12:22:29'),
(738, '', 'comment on daily reason', '2022-06-14 12:22:37'),
(739, '', 'comment on daily reason', '2022-06-14 12:27:03'),
(740, '', 'comment on daily reason', '2022-06-14 12:27:15'),
(741, 'edchanila', 'add daily blocks 5C sales', '2022-06-17 16:54:19'),
(742, '', 'comment on daily reason', '2022-06-17 16:54:50'),
(743, 'edchanila', 'add daily blocks 5D production', '2022-06-17 16:59:33'),
(744, '', 'comment on daily reason', '2022-06-17 16:59:46'),
(745, 'edchanila', 'add daily blocks 5C sales', '2022-06-17 17:01:31'),
(746, '', 'comment on daily reason', '2022-06-17 17:01:51'),
(747, '', 'comment on daily reason', '2022-06-17 17:02:04'),
(748, '', 'comment on daily reason', '2022-06-17 17:21:33'),
(749, 'edchanila', 'add amaunt paid from 10000 to  11000  on ordername is emma ', '2022-06-17 17:41:15'),
(750, '', 'add  blocks 5D order', '2022-06-17 18:05:35'),
(751, 'edchanila', 'add daily blocks 5D sales', '2022-06-17 19:17:13'),
(752, 'edchanila', 'add daily blocks 5D sales', '2022-06-17 19:18:01'),
(753, 'edchanila', 'add daily blocks 5D sales', '2022-06-17 19:33:00'),
(754, 'edchanila', 'add daily blocks 5D sales', '2022-06-17 19:33:27'),
(755, 'edchanila', 'add daily blocks 5D sales', '2022-06-17 19:37:30'),
(756, 'edchanila', 'add daily blocks 5D sales', '2022-06-17 19:41:04'),
(757, 'edchanila', 'add daily blocks 5D sales', '2022-06-17 19:44:03'),
(758, 'edchanila', 'add daily blocks 5D sales', '2022-06-17 19:45:32'),
(759, 'edchanila', 'add daily blocks 5D sales', '2022-06-17 19:51:30'),
(760, 'edchanila', 'add daily blocks 5D sales', '2022-06-17 19:52:23'),
(761, 'edchanila', 'add daily blocks 5D sales', '2022-06-17 19:52:38'),
(762, 'edchanila', 'add daily blocks 5D sales', '2022-06-17 20:00:44'),
(763, 'edchanila', 'add daily blocks 5D sales', '2022-06-17 20:01:15'),
(764, 'edchanila', 'add daily blocks 5D sales', '2022-06-17 20:01:33'),
(765, 'edchanila', 'add daily blocks 5D sales', '2022-06-17 20:01:43'),
(766, 'edchanila', 'add amaunt paid from 2000 to  12000  on ordername is emma d ', '2022-06-17 20:13:29'),
(767, 'edchanila', 'add amaunt paid from 12000 to  24000  on ordername is emma d ', '2022-06-17 20:13:49'),
(768, 'edchanila', 'add daily blocks 5D sales', '2022-06-17 20:42:15'),
(769, 'edchanila', 'add daily blocks 5D sales', '2022-06-17 20:44:35'),
(770, 'edchanila', 'add daily blocks 5D sales', '2022-06-18 07:25:59'),
(771, 'edchanila', 'add daily blocks 5C sales', '2022-06-18 07:28:29'),
(772, '', 'comment on daily reason', '2022-06-18 07:29:57'),
(773, 'edchanila', 'add daily blocks 5C sales', '2022-06-18 07:34:30'),
(774, '', 'comment on daily reason', '2022-06-18 10:02:54'),
(775, 'edchanila', 'add daily blocks 5D sales', '2022-06-18 10:11:21'),
(776, 'edchanila', 'add amaunt paid from 24000 to  34000  on ordername is emma d ', '2022-06-18 10:21:11'),
(777, '', 'procure cement', '2022-06-18 19:18:13'),
(778, 'edchanila', 'add amaunt paid from 34000 to  240000  on ordername is emma d ', '2022-06-19 09:59:00'),
(779, 'edchanila', 'add daily blocks 5D sales', '2022-06-19 10:06:27'),
(780, '', 'add daily blocks 5D production cost', '2022-06-19 10:09:30'),
(781, '', 'procure cement', '2022-06-19 10:09:54'),
(782, '', 'add  cement matarials used', '2022-06-19 10:10:32'),
(783, '', 'add  cement matarials used', '2022-06-19 10:10:59'),
(784, 'edchanila', 'add daily blocks 5D sales', '2022-06-19 10:25:50'),
(785, '', 'comment on daily reason', '2022-06-19 10:27:13'),
(786, 'edchanila', 'add daily blocks 5D production', '2022-06-19 10:27:52'),
(787, '', 'comment on daily reason', '2022-06-19 10:28:09'),
(788, 'edchanila', 'add daily blocks 5D sales', '2022-06-19 14:56:58'),
(789, 'edchanila', 'loged in', '2022-06-19 16:59:04'),
(790, 'edchanila', 'add daily blocks 5D sales', '2022-06-19 17:15:31'),
(791, 'edchanila', 'add daily blocks 5D sales', '2022-06-19 19:35:41'),
(792, 'edchanila', 'add daily blocks 6D production', '2022-06-19 19:43:05'),
(793, '', 'comment on daily reason', '2022-06-19 19:43:11'),
(794, 'edchanila', 'add daily blocks 6D sales', '2022-06-20 06:29:42');

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `id` int(255) NOT NULL,
  `matarial_name` varchar(255) NOT NULL,
  `available` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`id`, `matarial_name`, `available`) VALUES
(5, 'cement', 14),
(6, 'kokoto', 7),
(7, 'mchanga', 0);

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` int(255) NOT NULL,
  `dates` date NOT NULL,
  `name` varchar(255) NOT NULL,
  `open` int(255) NOT NULL,
  `used` int(255) NOT NULL,
  `added` int(255) NOT NULL,
  `total` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `dates`, `name`, `open`, `used`, `added`, `total`) VALUES
(30, '2022-05-23', 'cement', 0, 2, 10, 8),
(31, '2022-05-23', 'cement', 0, 2, 10, 6),
(32, '2022-05-23', 'kokoto', 0, 3, 10, 7),
(33, '2022-05-26', 'cement', 6, 2, 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `material_procure`
--

CREATE TABLE `material_procure` (
  `id` int(255) NOT NULL,
  `dates` date NOT NULL,
  `material_type` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `price_per_each` int(255) NOT NULL,
  `total` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `material_procure`
--

INSERT INTO `material_procure` (`id`, `dates`, `material_type`, `quantity`, `price_per_each`, `total`) VALUES
(12, '2022-05-23', 'cement', 10, 1100, 11000),
(13, '2022-05-23', 'kokoto', 10, 3000, 30000);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(255) NOT NULL,
  `dates` date NOT NULL,
  `order_name` varchar(255) NOT NULL,
  `order_type` varchar(255) NOT NULL,
  `date_to_deliver` date NOT NULL,
  `quantity` int(255) NOT NULL,
  `price_per_each` int(255) NOT NULL,
  `total_amount` int(255) NOT NULL,
  `statuz` varchar(255) NOT NULL,
  `paid` varchar(255) NOT NULL,
  `amount_paid` int(255) NOT NULL,
  `remaining` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `dates`, `order_name`, `order_type`, `date_to_deliver`, `quantity`, `price_per_each`, `total_amount`, `statuz`, `paid`, `amount_paid`, `remaining`) VALUES
(17, '2022-06-17', 'emma', 'blocks 5D', '2022-05-23', 10, 1100, 11000, 'delivered', '272.7', 30000, -19000),
(18, '2022-06-05', 'emma', 'blocks 5D', '2022-05-05', 10, 1100, 11000, 'delivered', '100', 11000, 0),
(20, '2022-06-12', 'clement', 'blocks 5D', '2022-07-12', 10, 1200, 12000, 'delivered', '100', 12000, 0),
(21, '2022-06-17', 'emma d', 'blocks 5D', '2022-06-17', 200, 1200, 240000, 'delivered', '100', 240000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `owed_customer`
--

CREATE TABLE `owed_customer` (
  `id` int(255) NOT NULL,
  `dates` date NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `sales_id` int(255) NOT NULL,
  `quantity_taken` int(255) NOT NULL,
  `price_per_each` int(255) NOT NULL,
  `total` int(255) NOT NULL,
  `paid` int(255) NOT NULL,
  `percent` int(255) NOT NULL,
  `remain` int(255) NOT NULL,
  `commentz` varchar(255) NOT NULL,
  `tmz` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `owed_customer`
--

INSERT INTO `owed_customer` (`id`, `dates`, `customer_name`, `product`, `sales_id`, `quantity_taken`, `price_per_each`, `total`, `paid`, `percent`, `remain`, `commentz`, `tmz`, `username`) VALUES
(6, '2022-06-14', 'emmanuel deus chanila', 'blocks 5D', 198, 10, 1200, 12000, 12000, 100, 0, 'wa mwanza', '2022-06-14 14:04:37', ''),
(7, '2022-06-14', 'dcha', 'blocks 5D', 199, 15, 1200, 18000, 18000, 100, 0, 'wa mwanza', '2022-06-14 10:16:35', ''),
(8, '2022-06-14', 'd', 'blocks 5D', 200, 10, 1200, 12000, 12000, 100, 0, 'wa mwanza', '2022-06-14 10:26:33', 'edchanila'),
(9, '2022-06-14', 'deus', 'blocks 5D', 201, 15, 1200, 18000, 18000, 100, 0, 'wa mwanza', '2022-06-14 14:04:11', 'edchanila'),
(10, '2022-06-17', 'emmanuel deus chanila', 'blocks 5C', 202, 10, 1200, 12000, 12000, 100, 0, 'wa mwanza', '2022-06-17 17:00:50', 'edchanila'),
(11, '2022-06-17', 'dcha', 'blocks 5C', 203, 5, 1200, 6000, 6000, 100, 0, 'wa mwanza', '2022-06-18 07:26:39', 'edchanila'),
(13, '2022-06-18', 'emmanuel deus chanila', 'blocks 5C', 222, 10, 1200, 12000, 12000, 100, 0, 'katumwa na frani', '2022-06-18 10:00:01', 'edchanila'),
(14, '2022-06-18', 'deus', 'blocks 5C', 223, 5, 1200, 6000, 5600, 93, 400, 'katumwa na frani', '2022-06-19 17:53:20', 'edchanila'),
(15, '2022-06-18', 'emmanuel deus chanila', 'blocks 5D', 224, 100, 1200, 120000, 20000, 17, 100000, 'wa mwanza', '2022-06-19 10:23:58', 'edchanila'),
(16, '2022-06-19', 'dchanila', 'blocks 5D', 226, 15, 1200, 18000, 10000, 56, 8000, 'jilani', '2022-06-19 10:26:21', 'edchanila'),
(17, '2022-06-19', 'emmanuel deus chanila', 'blocks 5D', 228, 10, 1200, 12000, 10000, 83, 2000, 'wa mwanza', '2022-06-19 17:36:42', 'edchanila'),
(18, '2022-06-19', 'dcha', 'blocks 5D', 229, 10, 1200, 12000, 2000, 17, 10000, 'katumwa na frani', '2022-06-19 19:35:48', 'edchanila');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `open_with` int(255) NOT NULL,
  `produce` int(255) NOT NULL,
  `price` int(255) NOT NULL,
  `total` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `open_with`, `produce`, `price`, `total`) VALUES
(3, 'blocks 5D', 9050, 1500, 1200, 10530),
(4, 'pavement', 0, 6000, 19000, 3000),
(5, 'blocks 5C', 0, 1575, 1200, 1545),
(6, 'blocks 6D', 0, 1, 1500, 0),
(7, 'blocks 6C', 0, 0, 1500, 0);

-- --------------------------------------------------------

--
-- Table structure for table `production`
--

CREATE TABLE `production` (
  `id` int(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `dates` date NOT NULL,
  `timez` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `expected_no_of_bags_used` int(255) NOT NULL,
  `expected_no_of_blocks_produced` int(255) NOT NULL,
  `actual_no_of_bags_used` int(255) NOT NULL,
  `actual_no_of_blocks_produced` int(255) NOT NULL,
  `difference` int(255) NOT NULL,
  `reasons` varchar(255) NOT NULL,
  `tmz` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usersname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `production`
--

INSERT INTO `production` (`id`, `day`, `dates`, `timez`, `product`, `expected_no_of_bags_used`, `expected_no_of_blocks_produced`, `actual_no_of_bags_used`, `actual_no_of_blocks_produced`, `difference`, `reasons`, `tmz`, `usersname`) VALUES
(62, 'Monday', '2022-05-23', '01:00-02:00pm', 'blocks', 3, 200, 2, 150, -50, 'no cement', '2022-05-23 12:06:13', 'edchanila'),
(63, 'Monday', '2022-05-23', '01:00-02:00pm', 'pavement', 5, 200, 4, 180, -20, 'no cement', '2022-05-23 12:56:11', 'edchanila'),
(64, 'Monday', '2022-05-23', '02:00-03:00am', 'blocks', 10, 3000, 5, 1500, -1500, 'no cement', '2022-05-23 13:36:04', 'edchanila'),
(65, 'Monday', '2022-05-23', '02:00-03:00am', 'blocks', 9, 2000, 8, 1900, -100, 'no cement', '2022-05-23 13:37:18', 'edchanila'),
(66, 'Friday', '2022-05-27', '02:00-03:00am', 'pavement', 10, 3000, 9, 2500, -500, 'accepted', '2022-05-27 07:42:47', 'edchanila'),
(67, 'Friday', '2022-05-27', '02:00-03:00am', 'blocks 5D', 10, 3000, 9, 2500, -500, 'cement', '2022-05-27 07:45:12', 'edchanila'),
(68, 'Friday', '2022-05-27', '02:00-03:00am', 'blocks 5C', 10, 3000, 8, 2400, -600, 'cement', '2022-05-27 07:53:54', 'chanila'),
(69, 'Monday', '2022-05-30', '02:00-03:00am', 'blocks 5D', 10, 3000, 8, 2400, -600, 'ddddddddd', '2022-05-29 22:56:12', 'edchanila'),
(70, 'Monday', '2022-05-30', '02:00-03:00am', 'blocks 5D', 10, 3000, 5, 1500, -1500, 'WWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWW', '2022-05-29 22:56:59', 'edchanila'),
(93, 'Sunday', '2022-06-05', '02:00-03:00am', 'blocks 5D', 10, 3000, 20, 6000, 3000, 'aa', '2022-06-05 19:01:52', 'edchanila'),
(94, 'Monday', '2022-06-06', '02:00-03:00am', 'blocks 5D', 10, 3000, 20, 6000, 3000, 'tttt', '2022-06-06 19:49:08', 'edchanila'),
(95, 'Monday', '2022-06-06', '02:00-03:00am', 'pavement', 10, 3000, 20, 6000, 3000, 'ssss', '2022-06-06 21:38:00', 'edchanila'),
(98, 'Wednesday', '2022-06-08', '02:00-03:00am', 'blocks 5C', 10, 3000, 5, 1500, -1500, 'zz', '2022-06-08 06:43:57', 'edchanila'),
(99, 'Wednesday', '2022-06-08', '02:00-03:00am', 'blocks 5C', 4, 122, 2, 50, -72, 'ss', '2022-06-08 06:44:48', 'edchanila'),
(101, 'Wednesday', '2022-06-08', '02:00-03:00am', 'blocks 5C', 1, 25, 1, 25, 0, 'ww', '2022-06-08 06:48:49', 'edchanila'),
(102, 'Tuesday', '2022-06-14', '02:00-03:00am', 'blocks 5D', 10, 3000, 5, 1000, -2000, 'zz', '2022-06-14 10:28:30', 'edchanila'),
(103, 'Friday', '2022-06-17', '02:00-03:00am', 'blocks 5D', 10, 3000, 5, 1500, -1500, 'sss', '2022-06-17 16:59:33', 'edchanila'),
(104, 'Sunday', '2022-06-19', '02:00-03:00am', 'blocks 5D', 10, 3000, 5, 1500, -1500, 'rrrrrrr', '2022-06-19 10:27:51', 'edchanila'),
(105, 'Sunday', '2022-06-19', '02:00-03:00am', 'blocks 6D', 1, 1, 1, 1, 0, 'ww', '2022-06-19 19:43:04', 'edchanila');

-- --------------------------------------------------------

--
-- Table structure for table `production_cost`
--

CREATE TABLE `production_cost` (
  `id` int(255) NOT NULL,
  `dates` date NOT NULL,
  `product` varchar(255) NOT NULL,
  `type_of_charge` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `per_each` int(255) NOT NULL,
  `total` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `production_cost`
--

INSERT INTO `production_cost` (`id`, `dates`, `product`, `type_of_charge`, `quantity`, `per_each`, `total`) VALUES
(8, '2022-05-23', 'blocks', 'kumwagilia tofari', 10, 60, 600),
(9, '2022-05-23', 'blocks', 'kumwagilia tofari', 10, 60, 600),
(10, '2022-05-23', 'blocks', 'bampa', 10, 60, 600),
(12, '2022-06-19', 'blocks 5D', 'kumwagilia tofari', 10, 60, 600);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(255) NOT NULL,
  `dates` date NOT NULL,
  `product` varchar(255) NOT NULL,
  `open_with` int(255) NOT NULL,
  `produce` int(255) NOT NULL,
  `sold` int(255) NOT NULL,
  `price_per_each` int(255) NOT NULL,
  `subtotal_amount` int(255) NOT NULL,
  `amount_paid` int(255) NOT NULL,
  `percentz` int(255) NOT NULL,
  `remaining` int(255) NOT NULL,
  `closed_with` int(255) NOT NULL,
  `order_id` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `dates`, `product`, `open_with`, `produce`, `sold`, `price_per_each`, `subtotal_amount`, `amount_paid`, `percentz`, `remaining`, `closed_with`, `order_id`) VALUES
(113, '2022-05-23', 'blocks', 0, 150, 50, 1200, 60000, 0, 0, 0, 100, 0),
(114, '2022-05-23', 'pavement', 0, 180, 100, 1200, 120000, 0, 0, 0, 80, 0),
(115, '2022-05-23', 'blocks', 0, 3550, 2000, 1100, 2200000, 0, 0, 0, 1500, 0),
(116, '2022-05-23', 'blocks', 0, 3550, 2000, 1100, 2200000, 0, 0, 0, -500, 0),
(117, '2022-05-26', 'pavement', 80, 0, 40, 1200, 48000, 0, 0, 0, 40, 0),
(118, '2022-05-26', 'pavement', 80, 0, 10, 1200, 12000, 0, 0, 0, 30, 0),
(119, '2022-05-27', 'pavement', 30, 0, 10, 1200, 12000, 0, 0, 0, 20, 0),
(120, '2022-05-27', 'pavement', 30, 0, 10, 1200, 12000, 0, 0, 0, 10, 0),
(121, '2022-05-27', 'pavement', 30, 2500, 1000, 1200, 1200000, 0, 0, 0, 1510, 0),
(122, '2022-05-27', 'blocks 5D', 0, 2500, 500, 1200, 600000, 0, 0, 0, 2000, 0),
(123, '2022-05-27', 'blocks 5C', 0, 2400, 500, 1200, 600000, 0, 0, 0, 1900, 0),
(124, '2022-06-02', 'blocks 5D', 5900, 0, 10, 1200, 12000, 0, 0, 0, 5890, 0),
(125, '2022-06-03', 'blocks 5D', 5890, 0, 40, 1200, 48000, 0, 0, 0, 5850, 0),
(128, '2022-06-03', 'blocks 5D', 5890, 0, 40, 1200, 48000, 0, 0, 0, 5795, 0),
(162, '2022-06-05', 'blocks 5D', 10, 6000, 10, 1200, 12000, 0, 0, 0, 6000, 0),
(164, '2022-06-06', 'blocks 5D', 6000, 6000, 2000, 1200, 2400000, 0, 0, 0, 10000, 0),
(165, '2022-06-06', 'blocks 5D', 6000, 6000, 10, 1200, 12000, 0, 0, 0, 9990, 0),
(166, '2022-06-06', 'pavement', 0, 6000, 3000, 1100, 3300000, 0, 0, 0, 3000, 0),
(167, '2022-06-07', 'blocks 5D', 9990, 0, 3000, 1200, 3600000, 0, 0, 0, 6990, 0),
(185, '2022-06-08', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(188, '2022-06-13', 'blocks 5D', 6990, 0, 10, 1200, 12000, 10000, 83, 2000, 6980, 0),
(189, '2022-06-13', 'blocks 5D', 6990, 0, 5, 1200, 6000, 2000, 33, 4000, 6975, 0),
(190, '2022-06-13', 'blocks 5D', 6990, 0, 5, 1200, 6000, 5500, 92, 500, 6970, 0),
(191, '2022-06-13', 'blocks 5D', 6990, 0, 15, 1200, 18000, 10000, 56, 8000, 6955, 0),
(192, '2022-06-13', 'blocks 5D', 6990, 0, 10, 1200, 12000, 10000, 83, 2000, 6945, 0),
(198, '2022-06-14', 'blocks 5D', 6945, 0, 10, 1200, 12000, 12000, 100, 0, 6935, 0),
(199, '2022-06-14', 'blocks 5D', 6945, 0, 15, 1200, 18000, 18000, 100, 0, 6920, 0),
(200, '2022-06-14', 'blocks 5D', 6945, 0, 10, 1200, 12000, 12000, 100, 0, 6910, 0),
(201, '2022-06-14', 'blocks 5D', 6945, 1000, 15, 1200, 18000, 18000, 100, 0, 7895, 0),
(202, '2022-06-17', 'blocks 5C', 1575, 0, 10, 1200, 12000, 12000, 100, 0, 1565, 0),
(203, '2022-06-17', 'blocks 5C', 1575, 0, 5, 1200, 6000, 6000, 100, 0, 1560, 0),
(219, '2022-06-17', 'blocks 5D', 7895, 1500, 10, 1200, 12000, 12000, 100, 0, 9385, 20),
(220, '2022-06-17', 'blocks 5D', 7895, 1500, 10, 1100, 11000, 11000, 100, 0, 9375, 18),
(221, '2022-06-18', 'blocks 5D', 9375, 0, 10, 1100, 11000, 30000, 273, -19000, 9365, 17),
(222, '2022-06-18', 'blocks 5C', 1560, 0, 10, 1200, 12000, 12000, 100, 0, 1550, 0),
(223, '2022-06-18', 'blocks 5C', 1560, 0, 5, 1200, 6000, 5600, 93, 400, 1545, 0),
(224, '2022-06-18', 'blocks 5D', 9375, 0, 100, 1200, 120000, 20000, 17, 100000, 9265, 0),
(225, '2022-06-19', 'blocks 5D', 9265, 0, 200, 1200, 240000, 240000, 100, 0, 9065, 21),
(226, '2022-06-19', 'blocks 5D', 9265, 0, 15, 1200, 18000, 10000, 56, 8000, 9050, 0),
(228, '2022-06-19', 'blocks 5D', 9265, 1500, 10, 1200, 12000, 10000, 83, 2000, 10540, 0),
(229, '2022-06-19', 'blocks 5D', 9265, 1500, 10, 1200, 12000, 2000, 17, 10000, 10530, 0),
(230, '2022-06-20', 'blocks 6D', 1, 0, 1, 1200, 1200, 200, 17, 1000, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `service_site`
--

CREATE TABLE `service_site` (
  `id` int(255) NOT NULL,
  `dates` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `type_of_service` varchar(255) NOT NULL,
  `total_service` int(255) NOT NULL,
  `price_per_each` int(255) NOT NULL,
  `total` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_site`
--

INSERT INTO `service_site` (`id`, `dates`, `description`, `type_of_service`, `total_service`, `price_per_each`, `total`) VALUES
(2, '2022-05-23', 'site', 'kubadili taa', 2, 1100, 2200),
(9, '2022-06-07', 'site', 'kubadili taa', 2, 1200, 2400);

-- --------------------------------------------------------

--
-- Table structure for table `site_payment`
--

CREATE TABLE `site_payment` (
  `id` int(255) NOT NULL,
  `dates` date NOT NULL,
  `pay_for` varchar(255) NOT NULL,
  `amount` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `site_payment`
--

INSERT INTO `site_payment` (`id`, `dates`, `pay_for`, `amount`) VALUES
(2, '2022-05-23', 'ushuru', 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(255) NOT NULL,
  `statuz` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `statuz`) VALUES
(1, 'not confirmed'),
(6, 'confirmed'),
(7, 'delivered');

-- --------------------------------------------------------

--
-- Table structure for table `truck`
--

CREATE TABLE `truck` (
  `id` int(255) NOT NULL,
  `truck_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `truck`
--

INSERT INTO `truck` (`id`, `truck_name`) VALUES
(1, 'Tata'),
(2, 'FAW');

-- --------------------------------------------------------

--
-- Table structure for table `truck_fuel`
--

CREATE TABLE `truck_fuel` (
  `id` int(255) NOT NULL,
  `dates` date NOT NULL,
  `truck_name` varchar(255) NOT NULL,
  `liters` int(255) NOT NULL,
  `price_per_liter` int(255) NOT NULL,
  `total` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `truck_fuel`
--

INSERT INTO `truck_fuel` (`id`, `dates`, `truck_name`, `liters`, `price_per_liter`, `total`) VALUES
(4, '2022-05-23', 'Tata', 20, 3000, 60000),
(5, '2022-05-23', 'Tata', 20, 3000, 60000),
(6, '2022-05-23', 'Tata', 20, 3000, 60000),
(7, '2022-05-27', 'Tata', 20, 3000, 60000);

-- --------------------------------------------------------

--
-- Table structure for table `truck_payment`
--

CREATE TABLE `truck_payment` (
  `id` int(255) NOT NULL,
  `dates` date NOT NULL,
  `truck_name` varchar(255) NOT NULL,
  `pay_for` varchar(255) NOT NULL,
  `amount` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `truck_payment`
--

INSERT INTO `truck_payment` (`id`, `dates`, `truck_name`, `pay_for`, `amount`) VALUES
(9, '2022-05-23', 'Tata', 'ushuru', 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `truck_service`
--

CREATE TABLE `truck_service` (
  `id` int(255) NOT NULL,
  `dates` date NOT NULL,
  `truck_name` varchar(255) NOT NULL,
  `type_of_service` varchar(255) NOT NULL,
  `total_service` int(255) NOT NULL,
  `price_per_each` int(255) NOT NULL,
  `total` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `truck_service`
--

INSERT INTO `truck_service` (`id`, `dates`, `truck_name`, `type_of_service`, `total_service`, `price_per_each`, `total`) VALUES
(8, '2022-05-23', 'Tata', 'kubadili taa', 1, 3000, 3000),
(10, '2022-06-05', 'Tata', 'kubadili taa', 2, 1100, 2200);

-- --------------------------------------------------------

--
-- Table structure for table `userz`
--

CREATE TABLE `userz` (
  `id` int(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userz`
--

INSERT INTO `userz` (`id`, `first_name`, `last_name`, `username`, `position`, `gender`, `password`, `state`) VALUES
(3, 'Baraka', 'chaula', 'bchaula', 'C.E.O', 'Male', '12345', 'Offline'),
(7, 'clement', 'pharis', 'cpharis', 'manager', 'Male', '12345', 'Offline'),
(8, 'emmanuel', 'deus', 'edchanila', 'manager', 'Male', '123456', 'Online'),
(13, 'Freaddy', 'Nolasco', 'fnolasco', 'manager', 'Male', '12345', ''),
(15, 'chanila', 'ite', 'chanila', 'manager', 'Male', '12345', 'Online'),
(16, 'neema', 'ignas', 'nignas', 'walfare', 'Female', '12345', '');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `id` int(255) NOT NULL,
  `dates` date NOT NULL,
  `truck_name` varchar(255) NOT NULL,
  `froms` varchar(255) NOT NULL,
  `toz` varchar(255) NOT NULL,
  `cargo_type` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`id`, `dates`, `truck_name`, `froms`, `toz`, `cargo_type`) VALUES
(9, '2022-05-23', 'Tata', 'sinza', 'manzese', 'blocks'),
(11, '2022-06-03', '', 'sinza', 'manzese', 'blocks'),
(12, '2022-06-03', '', 'ubungo', 'posta', 'pevement'),
(15, '2022-06-03', 'Tata', 'ubungo', 'posta', 'pevement'),
(16, '2022-06-05', 'Tata', 'sinza', 'manzese', 'blocks');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `budget`
--
ALTER TABLE `budget`
  ADD PRIMARY KEY (`id_budget`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `comment_reply`
--
ALTER TABLE `comment_reply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estimate`
--
ALTER TABLE `estimate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fuel_site`
--
ALTER TABLE `fuel_site`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material_procure`
--
ALTER TABLE `material_procure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `owed_customer`
--
ALTER TABLE `owed_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `production`
--
ALTER TABLE `production`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `production_cost`
--
ALTER TABLE `production_cost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`);

--
-- Indexes for table `service_site`
--
ALTER TABLE `service_site`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_payment`
--
ALTER TABLE `site_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `truck`
--
ALTER TABLE `truck`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `truck_fuel`
--
ALTER TABLE `truck_fuel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `truck_payment`
--
ALTER TABLE `truck_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `truck_service`
--
ALTER TABLE `truck_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userz`
--
ALTER TABLE `userz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `budget`
--
ALTER TABLE `budget`
  MODIFY `id_budget` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `com_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `comment_reply`
--
ALTER TABLE `comment_reply`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `estimate`
--
ALTER TABLE `estimate`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `fuel_site`
--
ALTER TABLE `fuel_site`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=795;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `material_procure`
--
ALTER TABLE `material_procure`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `owed_customer`
--
ALTER TABLE `owed_customer`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `production`
--
ALTER TABLE `production`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `production_cost`
--
ALTER TABLE `production_cost`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=231;

--
-- AUTO_INCREMENT for table `service_site`
--
ALTER TABLE `service_site`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `site_payment`
--
ALTER TABLE `site_payment`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `truck`
--
ALTER TABLE `truck`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `truck_fuel`
--
ALTER TABLE `truck_fuel`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `truck_payment`
--
ALTER TABLE `truck_payment`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `truck_service`
--
ALTER TABLE `truck_service`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `userz`
--
ALTER TABLE `userz`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
