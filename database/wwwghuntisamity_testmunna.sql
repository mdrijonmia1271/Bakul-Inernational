-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 13, 2021 at 04:39 AM
-- Server version: 10.3.27-MariaDB-log-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wwwghuntisamity_testmunna`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_info`
--

CREATE TABLE `access_info` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `login_period` datetime NOT NULL,
  `logout_period` datetime NOT NULL,
  `os` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `browser` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `access_info`
--

INSERT INTO `access_info` (`user_id`, `login_period`, `logout_period`, `os`, `browser`) VALUES
(59, '2021-01-07 22:07:22', '2021-01-07 22:07:30', 'Unknown Windows OS', 'Firefox'),
(59, '2021-01-10 10:09:13', '2021-01-10 10:09:24', 'Unknown Windows OS', 'Firefox'),
(59, '2021-01-10 10:27:06', '2021-01-10 10:27:14', 'Unknown Windows OS', 'Firefox'),
(59, '2021-01-10 10:27:59', '0000-00-00 00:00:00', 'Unknown Windows OS', 'Firefox'),
(59, '2021-01-10 15:39:51', '0000-00-00 00:00:00', 'Unknown Windows OS', 'Firefox'),
(59, '2021-01-10 18:56:59', '2021-01-10 20:28:01', 'Unknown Windows OS', 'Firefox'),
(59, '2021-01-10 20:30:30', '0000-00-00 00:00:00', 'Unknown Windows OS', 'Firefox'),
(59, '2021-01-10 21:19:26', '2021-01-10 21:23:47', 'Unknown Windows OS', 'Chrome'),
(59, '2021-01-11 09:18:35', '0000-00-00 00:00:00', 'Unknown Windows OS', 'Firefox'),
(59, '2021-01-11 09:29:21', '0000-00-00 00:00:00', 'Unknown Windows OS', 'Chrome'),
(59, '2021-01-12 12:10:26', '2021-01-12 17:18:24', 'Unknown Windows OS', 'Chrome'),
(59, '2021-01-12 16:02:37', '2021-01-12 17:18:07', 'Unknown Windows OS', 'Firefox'),
(59, '2021-01-13 01:02:44', '2021-01-13 01:24:56', 'Linux', 'Chrome'),
(59, '2021-01-13 11:39:36', '0000-00-00 00:00:00', 'Unknown Windows OS', 'Firefox'),
(59, '2021-01-13 12:08:12', '2021-01-13 16:45:47', 'Unknown Windows OS', 'Chrome'),
(59, '2021-01-13 20:42:50', '2021-01-13 21:24:48', 'Unknown Windows OS', 'Chrome'),
(59, '2021-01-14 12:21:17', '0000-00-00 00:00:00', 'Unknown Windows OS', 'Chrome'),
(59, '2021-01-15 21:15:43', '2021-01-15 21:31:45', 'Unknown Windows OS', 'Chrome'),
(59, '2021-01-16 19:42:42', '2021-01-16 20:20:33', 'Unknown Windows OS', 'Chrome'),
(59, '2021-01-16 20:22:03', '2021-01-16 20:33:11', 'Unknown Windows OS', 'Chrome'),
(59, '2021-01-17 10:36:15', '0000-00-00 00:00:00', 'Unknown Windows OS', 'Chrome'),
(59, '2021-01-18 15:26:29', '2021-01-18 21:43:49', 'Unknown Windows OS', 'Chrome'),
(59, '2021-01-19 13:32:14', '0000-00-00 00:00:00', 'Unknown Windows OS', 'Chrome'),
(59, '2021-01-24 17:47:06', '2021-01-24 18:17:36', 'Unknown Windows OS', 'Chrome'),
(59, '2021-01-24 20:48:04', '2021-01-24 21:28:33', 'Unknown Windows OS', 'Chrome'),
(59, '2021-01-25 11:55:01', '0000-00-00 00:00:00', 'Unknown Windows OS', 'Chrome'),
(59, '2021-01-26 11:40:20', '0000-00-00 00:00:00', 'Unknown Windows OS', 'Chrome'),
(59, '2021-01-26 20:32:11', '2021-01-26 21:14:39', 'Unknown Windows OS', 'Chrome'),
(59, '2021-01-27 11:52:06', '2021-01-27 14:45:13', 'Unknown Windows OS', 'Chrome'),
(59, '2021-01-27 17:47:02', '2021-01-27 20:49:36', 'Unknown Windows OS', 'Chrome'),
(59, '2021-01-28 14:22:25', '0000-00-00 00:00:00', 'Unknown Windows OS', 'Chrome'),
(59, '2021-01-30 19:26:19', '2021-01-30 19:26:35', 'Unknown Windows OS', 'Chrome'),
(59, '2021-01-31 11:03:14', '2021-01-31 16:52:32', 'Unknown Windows OS', 'Chrome'),
(59, '2021-01-31 17:30:33', '0000-00-00 00:00:00', 'Unknown Windows OS', 'Chrome'),
(59, '2021-02-01 11:31:43', '0000-00-00 00:00:00', 'Unknown Windows OS', 'Chrome'),
(59, '2021-02-01 19:39:17', '2021-02-01 21:33:06', 'Unknown Windows OS', 'Chrome'),
(59, '2021-02-03 11:48:21', '2021-02-03 14:41:21', 'Unknown Windows OS', 'Chrome'),
(59, '2021-02-03 14:41:33', '2021-02-03 14:41:56', 'Unknown Windows OS', 'Chrome'),
(59, '2021-02-03 16:00:08', '2021-02-03 16:20:44', 'Unknown Windows OS', 'Chrome'),
(59, '2021-02-03 16:21:14', '0000-00-00 00:00:00', 'Unknown Windows OS', 'Chrome'),
(59, '2021-02-04 11:39:53', '0000-00-00 00:00:00', 'Unknown Windows OS', 'Chrome'),
(59, '2021-02-06 11:31:57', '0000-00-00 00:00:00', 'Unknown Windows OS', 'Chrome'),
(59, '2021-02-06 11:52:38', '0000-00-00 00:00:00', 'Unknown Windows OS', 'Firefox'),
(59, '2021-02-06 14:23:54', '2021-02-06 14:49:53', 'Unknown Windows OS', 'Chrome'),
(59, '2021-02-06 14:54:37', '0000-00-00 00:00:00', 'Unknown Windows OS', 'Chrome'),
(59, '2021-02-06 16:15:42', '2021-02-06 21:43:14', 'Unknown Windows OS', 'Chrome'),
(59, '2021-02-07 12:54:28', '2021-02-07 16:21:33', 'Unknown Windows OS', 'Chrome'),
(59, '2021-02-07 14:12:51', '0000-00-00 00:00:00', 'Unknown Windows OS', 'Firefox'),
(59, '2021-02-07 14:37:11', '2021-02-07 17:01:26', 'Unknown Windows OS', 'Firefox'),
(59, '2021-02-07 16:25:09', '2021-02-07 16:38:51', 'Unknown Windows OS', 'Chrome'),
(59, '2021-02-07 20:14:43', '2021-02-07 21:10:39', 'Unknown Windows OS', 'Chrome'),
(59, '2021-02-08 10:38:22', '0000-00-00 00:00:00', 'Unknown Windows OS', 'Firefox'),
(59, '2021-02-08 12:31:14', '0000-00-00 00:00:00', 'Unknown Windows OS', 'Chrome'),
(59, '2021-02-08 14:06:25', '0000-00-00 00:00:00', 'Unknown Windows OS', 'Chrome'),
(59, '2021-02-09 14:20:33', '0000-00-00 00:00:00', 'Unknown Windows OS', 'Chrome'),
(59, '2021-02-11 13:07:09', '2021-02-11 21:18:46', 'Unknown Windows OS', 'Chrome'),
(59, '2021-02-11 21:38:10', '2021-02-11 21:46:54', 'Unknown Windows OS', 'Chrome'),
(59, '2021-02-13 10:38:55', '0000-00-00 00:00:00', 'Unknown Windows OS', 'Chrome'),
(59, '2021-02-13 14:18:59', '2021-02-13 14:40:39', 'Unknown Windows OS', 'Firefox'),
(59, '2021-02-13 14:41:07', '0000-00-00 00:00:00', 'Unknown Windows OS', 'Firefox'),
(59, '2021-02-14 16:16:12', '0000-00-00 00:00:00', 'Unknown Windows OS', 'Firefox'),
(59, '2021-02-14 16:55:12', '0000-00-00 00:00:00', 'Unknown Windows OS', 'Firefox'),
(59, '2021-03-10 15:14:00', '0000-00-00 00:00:00', 'Unknown Windows OS', 'Chrome'),
(59, '2021-03-11 20:55:36', '0000-00-00 00:00:00', 'Unknown Windows OS', 'Chrome');

-- --------------------------------------------------------

--
-- Table structure for table `add_trx`
--

CREATE TABLE `add_trx` (
  `id` int(11) NOT NULL,
  `godown_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `person_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` decimal(65,0) NOT NULL,
  `remark` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `advanced_payment`
--

CREATE TABLE `advanced_payment` (
  `id` int(100) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `year` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `month` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `emp_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `purpose` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'advanced',
  `amount` decimal(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` int(10) NOT NULL,
  `date` date NOT NULL,
  `bank_name` varchar(252) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `date`, `bank_name`) VALUES
(1, '2021-01-13', 'ISLAMI BANK BANGLADESH LTD'),
(2, '2021-01-13', 'DUTCH-BANGLA BANK LTD'),
(3, '2021-01-13', 'BRAC BANK LTD'),
(4, '2021-01-13', 'EXIM BANK LTD');

-- --------------------------------------------------------

--
-- Table structure for table `bank_account`
--

CREATE TABLE `bank_account` (
  `id` int(10) UNSIGNED NOT NULL,
  `datetime` date NOT NULL,
  `bank_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `branch_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `holder_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `account_number` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `init_balance` decimal(10,2) NOT NULL,
  `pre_balance` int(100) NOT NULL,
  `godown_code` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bank_account`
--

INSERT INTO `bank_account` (`id`, `datetime`, `bank_name`, `branch_name`, `holder_name`, `account_number`, `init_balance`, `pre_balance`, `godown_code`) VALUES
(1, '2021-01-13', 'ISLAMI BANK BANGLADESH LTD', 'MYMENSINGH ', 'M/S.MUNNA & BROTHERS', '20501400100818211', 12605.00, 12605, '0016'),
(2, '2021-01-13', 'DUTCH-BANGLA BANK LTD', 'MYMENSINGH ', 'M/S.MUNNA & BROTHERS', '156.110.17485', 2221.00, 2221, '0016'),
(3, '2021-01-13', 'EXIM BANK LTD', 'MYMENSINGH ', 'M/S.MUNNA & BROTHERS', '0013100005889', 2104.00, 2104, '0016');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `path` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `godown_code` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `date`, `path`, `godown_code`) VALUES
(19, '2019-09-22', 'public/banner/0001-15691424941075834378.png', '0001'),
(20, '2019-09-22', 'public/banner/0002-1569142504766368466.png', '0002'),
(23, '2020-09-03', 'public/banner/0015-1599112523607804809.png', '0015');

-- --------------------------------------------------------

--
-- Table structure for table `bonus`
--

CREATE TABLE `bonus` (
  `id` int(100) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `emp_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `year` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `month` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `bonus_percent` decimal(10,2) NOT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bonus_structure`
--

CREATE TABLE `bonus_structure` (
  `id` int(10) UNSIGNED NOT NULL,
  `eid` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `fields` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `percentage` decimal(10,2) NOT NULL,
  `remarks` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(45) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `brand` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trash` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `date`, `brand`, `trash`) VALUES
(1, '2021-01-10', 'Na', 0),
(2, '2021-01-10', 'HAMKO', 0),
(3, '2021-01-10', 'ULLASH', 0),
(4, '2021-01-10', 'MN&T', 0),
(5, '2021-01-10', 'LUMINOUS', 0),
(6, '2021-01-10', 'ESSENZA', 0),
(7, '2021-01-12', 'VOLVO', 0),
(8, '2021-01-12', 'LUCAS', 0),
(9, '2021-01-12', 'SPARK', 0),
(10, '2021-01-12', 'SAIF_POWER', 0),
(11, '2021-01-12', 'ORIGINAL', 0),
(12, '2021-01-13', 'POWER_BANK', 0),
(13, '2021-01-13', 'EVER_STAR', 0),
(14, '2021-02-11', 'GH_POWER', 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `date`, `category`, `position`) VALUES
(1, '2021-01-10', 'na', 0),
(6, '2021-01-10', 'ips', 0),
(7, '2021-01-10', 'dm_water', 0),
(8, '2021-01-10', 'battery', 0),
(9, '2021-01-10', 'solar_pannel', 0),
(10, '2021-01-10', 'solar_accessories', 0),
(13, '2021-02-07', 'lubricant', 0);

-- --------------------------------------------------------

--
-- Table structure for table `chalan`
--

CREATE TABLE `chalan` (
  `id` int(100) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `party_code` varchar(41) COLLATE utf8_unicode_ci NOT NULL,
  `chalan_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `trash` tinyint(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `closing`
--

CREATE TABLE `closing` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `opening` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `income` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `cost` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `bank_withdraw` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `bank_diposit` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `hand_cash` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `opening_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'auto',
  `showroom` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `commissions`
--

CREATE TABLE `commissions` (
  `id` int(11) NOT NULL,
  `year` int(4) NOT NULL,
  `month` int(4) NOT NULL,
  `brand` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` varchar(45) COLLATE utf8_unicode_ci DEFAULT 'open'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `commitments`
--

CREATE TABLE `commitments` (
  `id` int(11) NOT NULL,
  `godown_code` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `party_code` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `commitment` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `status` varchar(191) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'new',
  `trash` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `commitments`
--

INSERT INTO `commitments` (`id`, `godown_code`, `user_id`, `party_code`, `commitment`, `date`, `status`, `trash`) VALUES
(2, '0016', '59', '000002', 'sdfjkjlkdfjglk', '2021-02-01', 'new', 0),
(3, '0016', '59', '000002', 'sdfsdf', '2021-02-07', 'pending', 0);

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

CREATE TABLE `complain` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `complain` longtext COLLATE utf8_unicode_ci NOT NULL,
  `sale_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `complain`
--

INSERT INTO `complain` (`id`, `date`, `name`, `mobile`, `address`, `complain`, `sale_type`, `product_name`, `status`) VALUES
(5, '2021-03-13', 'Knox Pickett', '01710511241', 'Nisi beatae ullam ne', 'Dolorem adipisci qui', 'cash', 'Asperiores exercitat', 'New Complain'),
(6, '2021-03-13', 'Jena Pitts', '01715731878', 'Sunt officia quia bl', 'Aut quo quia omnis e', 'cash', 'Sint hic eiusmod et', 'New Complain'),
(7, '2021-03-13', 'Samson Malone', '01710511241', 'Dolores unde in quis', 'Omnis incididunt aut', 'cash', 'Voluptas rerum velit', 'New Complain'),
(8, '2021-03-13', 'test', '01710511241', 'Perferendis vero est', 'Excepteur velit non ', 'cash', 'Rerum praesentium bl', 'New Complain'),
(9, '2021-03-13', 'Tset', '01710511241', 'Sit molestias sed s', 'Sequi modi elit max', 'cash', 'Ut esse sint natus e', 'New Complain'),
(10, '2021-03-13', 'Plato Sawyer', '01912226436', 'Officiis dolor unde ', 'Ipsum ut ea vel rep', 'cash', 'Itaque officia maior', 'New Complain'),
(11, '2021-03-13', 'Jenette Estes', '01912226436', 'Vero eos quia asper', 'Quia exercitationem ', 'cash', 'Voluptas enim molest', 'New Complain'),
(12, '2021-03-13', 'Tst', '01912226436', 'Ut eos qui asperior', 'Provident excepteur', 'cash', 'Voluptates similique', 'New Complain'),
(13, '2021-03-13', 'Tucker Blake', '01912226436', 'Nisi rerum optio al', 'Eum cillum ut et vel', 'cash', 'Ullam proident sed ', 'New Complain'),
(14, '2021-03-13', 'Test', '01912226436', 'Nulla nesciunt ea d', 'Qui itaque dolorem d', 'cash', 'Eius neque corrupti', 'New Complain'),
(15, '2021-03-13', 'Test', '01912226436', 'Reprehenderit eos ', 'Esse sed earum maior', 'cash', 'Ad voluptatem Sunt ', 'New Complain'),
(16, '2021-03-13', 'tset', '01912226436', 'Laborum Dolorem mag', 'Adipisicing facilis ', 'cash', 'Hic sunt vitae deser', 'New Complain'),
(17, '2021-03-13', 'TESt', '01912226436', 'Rerum rerum totam qu', 'Id aperiam dolor et', 'cash', 'Suscipit sint verita', 'New Complain');

-- --------------------------------------------------------

--
-- Table structure for table `cost`
--

CREATE TABLE `cost` (
  `id` int(100) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `godown_code` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `cost_field` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cost_category` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `spend_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trash` tinyint(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cost_category`
--

CREATE TABLE `cost_category` (
  `id` int(10) NOT NULL,
  `cost_category` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cost_category`
--

INSERT INTO `cost_category` (`id`, `cost_category`) VALUES
(30, 'BAZAAR COSTS'),
(29, 'CUSTOMAR APPAYON'),
(28, 'জেনারেটর বিল'),
(27, 'SELL COMOSON/ DALALI'),
(26, 'TRANSPOT COST'),
(25, 'LEBAR BILL/ VAN BARA'),
(23, 'MOTORCIKEL COST'),
(24, 'PIKAB BARA/ PRIBET'),
(22, 'BETON/ BARA COST MASIK'),
(17, 'SHOWROOM COSTS'),
(18, 'HOOM / PERSONAL EXPENSES'),
(31, 'Client Discount');

-- --------------------------------------------------------

--
-- Table structure for table `cost_field`
--

CREATE TABLE `cost_field` (
  `id` int(100) UNSIGNED NOT NULL,
  `cost_category` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `cost_field` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cost_field`
--

INSERT INTO `cost_field` (`id`, `cost_category`, `cost_field`) VALUES
(5, 'LEBAR BILL/ VAN BARA', 'Lebar_Bill_Delibari'),
(8, 'SHOWROOM COSTS', 'PIKAP_COSTS'),
(9, 'SHOWROOM COSTS', 'MARKETING_COSTS'),
(10, 'HOOM / PERSONAL EXPENSES', 'PERSONAL_HOOM_COSTS'),
(12, 'SHOWROOM COSTS', 'MOBILE_RICHERS'),
(15, 'SHOWROOM COSTS', 'MONTHLY_SALARY_COSTS'),
(26, 'SHOWROOM COSTS', 'SHOWROOM_/_GODOWN_COSTS'),
(27, 'HOOM / PERSONAL EXPENSES', 'BAZAAR_COSTS'),
(28, 'SHOWROOM COSTS', 'OTHERS'),
(31, 'SHOWROOM COSTS', 'Guest/_আপ্যায়ন'),
(34, 'SHOWROOM COSTS', 'PIKAP/_GARE_VARA'),
(35, 'SHOWROOM COSTS', 'PRIBET_CAR'),
(37, 'SHOWROOM COSTS', 'দান'),
(38, 'BETON/ BARA COST MASIK', 'Biddot_Bill/_KARENT_BILL'),
(49, 'LEBAR BILL/ VAN BARA', 'VAN_BARA'),
(60, 'SHOWROOM COSTS', 'জেনারেটর_বিল'),
(62, 'SHOWROOM COSTS', 'CUSTOMAR_APPAYON'),
(64, 'SHOWROOM COSTS', 'SHOWROOM_VARA'),
(72, 'BETON/ BARA COST MASIK', 'INTERNET_BILL'),
(79, 'BETON/ BARA COST MASIK', 'Dealer');

-- --------------------------------------------------------

--
-- Table structure for table `damage_product`
--

CREATE TABLE `damage_product` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `product_code` varchar(252) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(10) NOT NULL,
  `unit` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `remark` mediumtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deduction_structure`
--

CREATE TABLE `deduction_structure` (
  `id` int(10) UNSIGNED NOT NULL,
  `eid` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `fields` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `remarks` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(45) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `trash` tinyint(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `due_collect`
--

CREATE TABLE `due_collect` (
  `id` int(11) NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `voucher_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `party_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `total_bill` decimal(10,2) NOT NULL,
  `previous_paid` decimal(10,2) NOT NULL,
  `paid` decimal(10,2) NOT NULL,
  `due` decimal(10,2) NOT NULL,
  `remission` decimal(10,2) NOT NULL,
  `godown_code` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `due_collect`
--

INSERT INTO `due_collect` (`id`, `date`, `voucher_no`, `party_code`, `total_bill`, `previous_paid`, `paid`, `due`, `remission`, `godown_code`) VALUES
(1, '2021-01-16', '2101000002', 'test', 150.00, 50.00, 0.00, 100.00, 0.00, '0016'),
(2, '2021-02-11', '000124', 'MD.MOFAZZAL_HOSSAIN', 29300.00, 27000.00, 2300.00, 0.00, 0.00, '0016'),
(3, '2021-02-11', '000068', 'FARUK_VAI_RAB', 5300.00, 2300.00, 1500.00, 1500.00, 0.00, '0016'),
(4, '2021-02-11', '000055', 'RAHAT/RIZON', 7003.38, 0.00, 7000.00, 3.38, 0.00, '0016'),
(5, '2021-02-11', '2101000005', 'Mustafiz_Sohe', 15675.00, 12675.00, 0.00, 3000.00, 0.00, '0016'),
(6, '2021-02-11', '000049', 'munna', 3903.50, 0.00, 3903.50, 0.00, 0.00, '0016'),
(7, '2021-02-11', '000066', 'NU', 1000.00, 900.00, 100.00, 0.00, 0.00, '0016'),
(8, '2021-02-11', '000048', '', 70.00, 0.00, 70.00, 0.00, 0.00, '0016'),
(9, '2021-02-11', '000018', 'developer', 30.00, 0.00, 30.00, 0.00, 0.00, '0016');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `emp_id` int(20) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `joining_date` date NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `present_address` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `permanent_address` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `employee_salary` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  `showroom_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exchange`
--

CREATE TABLE `exchange` (
  `id` int(15) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `receive_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `receiveqty` decimal(50,2) NOT NULL,
  `given_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `givenqty` decimal(50,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fixed_assate`
--

CREATE TABLE `fixed_assate` (
  `id` int(10) NOT NULL,
  `date` date NOT NULL,
  `field_fixed_assate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `spend_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trash` tinyint(11) NOT NULL DEFAULT 0,
  `godown_code` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fixed_assate_field`
--

CREATE TABLE `fixed_assate_field` (
  `id` int(10) NOT NULL,
  `field_fixed_assate` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fixed_assate_field`
--

INSERT INTO `fixed_assate_field` (`id`, `field_fixed_assate`) VALUES
(1, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `godowns`
--

CREATE TABLE `godowns` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prefix` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `manager` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `trash` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `godowns`
--

INSERT INTO `godowns` (`id`, `date`, `name`, `prefix`, `code`, `manager`, `mobile`, `address`, `trash`) VALUES
(16, '2021-01-07', 'M/S Munna & Brothers', 'MB', '0016', 'Md Munna', '01714090942, 01', '1/Ka, Congress Jubilee Road, Mymensingh', 0);

-- --------------------------------------------------------

--
-- Table structure for table `godown_balance`
--

CREATE TABLE `godown_balance` (
  `id` int(100) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `showroom_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `physical_cost` decimal(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `incentive_structure`
--

CREATE TABLE `incentive_structure` (
  `id` int(10) UNSIGNED NOT NULL,
  `eid` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `fields` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `percentage` decimal(10,2) NOT NULL,
  `remarks` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(45) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `id` int(11) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `godown_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `field` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `income_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trash` tinyint(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `income_field`
--

CREATE TABLE `income_field` (
  `id` int(11) UNSIGNED NOT NULL,
  `field` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `income_field`
--

INSERT INTO `income_field` (`id`, `field`) VALUES
(3, 'Battery_Charge'),
(4, 'IPS_Service');

-- --------------------------------------------------------

--
-- Table structure for table `initial_transaction`
--

CREATE TABLE `initial_transaction` (
  `id` int(10) UNSIGNED NOT NULL,
  `member` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `village` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `send` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `receive` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `type` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Bank/Person',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `branch` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `account_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `contact_info` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `loan_type` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Receive/Paid',
  `amount` decimal(10,2) NOT NULL,
  `loan_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Open',
  `remarks` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `trash` tinyint(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loan_new`
--

CREATE TABLE `loan_new` (
  `id` int(11) NOT NULL,
  `person_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `balance` decimal(64,0) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `godown_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loan_transaction`
--

CREATE TABLE `loan_transaction` (
  `id` int(10) NOT NULL,
  `date` date NOT NULL,
  `loan_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `transaction_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `trash` tinyint(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lpr`
--

CREATE TABLE `lpr` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `lpr_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `party_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `party_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `voucher_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `down_payment` decimal(10,2) NOT NULL,
  `total_bill` decimal(10,2) NOT NULL,
  `total_commission` decimal(10,2) NOT NULL,
  `total_paid` decimal(10,2) NOT NULL,
  `due` decimal(10,2) NOT NULL,
  `payment` decimal(10,2) NOT NULL,
  `remission` decimal(10,2) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `trash` tinyint(2) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `name` varchar(252) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(252) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `production_cost` decimal(10,2) NOT NULL,
  `unit` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'kg',
  `type` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(42) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'available',
  `trash` tinyint(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `messages_date` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `messages_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `messages_mobile` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `messages_text` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `messages_condition` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `monthly_commission_paid`
--

CREATE TABLE `monthly_commission_paid` (
  `id` int(100) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `party_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `year` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `month` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `trash` int(10) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `new_complain`
--

CREATE TABLE `new_complain` (
  `id` int(50) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `service_mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `problem` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `new_complain`
--

INSERT INTO `new_complain` (`id`, `name`, `mobile`, `service_mobile`, `address`, `brand`, `product`, `model`, `problem`, `status`, `date`) VALUES
(4, 'MD HASAN MAHMUD-DULAVAY', '01730020028', '01718360846', 'BAZAR ROD, MADHUPUR', '', '0001', 'WSI-RIVERINE-18C', 'STAN LAGATE HOBE', 'pending', '2020-01-16');

-- --------------------------------------------------------

--
-- Table structure for table `opening_balance`
--

CREATE TABLE `opening_balance` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `godown_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `opening_balance` decimal(10,2) NOT NULL,
  `closing_balance` decimal(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parties`
--

CREATE TABLE `parties` (
  `id` int(50) UNSIGNED NOT NULL,
  `opening` date NOT NULL,
  `code` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `id_card` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `zone` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `father_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `contact_person` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(42) COLLATE utf8_unicode_ci NOT NULL,
  `address` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `path` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `guarantor_code` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `guarantor_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `guarantor_mobile` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `guarantor_address` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `guarantor_code2` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `guarantor_name2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `guarantor_mobile2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `guarantor_address2` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `customer_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reference_dealer` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dealer_type` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `initial_balance` decimal(10,2) NOT NULL COMMENT 'positive sign(+) = receivable ; negative sign(-) = payable',
  `credit_limit` decimal(10,2) NOT NULL,
  `godown_code` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  `trash` tinyint(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `parties`
--

INSERT INTO `parties` (`id`, `opening`, `code`, `id_card`, `name`, `zone`, `father_name`, `contact_person`, `mobile`, `address`, `path`, `guarantor_code`, `guarantor_name`, `guarantor_mobile`, `guarantor_address`, `guarantor_code2`, `guarantor_name2`, `guarantor_mobile2`, `guarantor_address2`, `type`, `customer_type`, `reference_dealer`, `dealer_type`, `initial_balance`, `credit_limit`, `godown_code`, `status`, `trash`) VALUES
(1, '2021-07-01', 'MBS00001', '', 'CASH', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'supplier', '', '', '', -5.00, 0.00, '0016', 'active', 0),
(2, '2021-07-01', 'MBS00002', '', 'GLOBAL ENERGY LTD', '', '', '', '', 'FLAT-1,HOUSE-12,ROAD-9', '', '', '', '', '', '', '', '', '', 'supplier', '', '', '', -147.00, 0.00, '0016', 'active', 0),
(3, '2021-07-01', 'MBS00003', '', 'IFFAT TRADING', '', '', '', '01618899771', '17/A,RANKIN STREET', '', '', '', '', '', '', '', '', '', 'supplier', '', '', '', -50.00, 0.00, '0016', 'active', 0),
(4, '2021-07-01', 'MBS00004', '', 'JAMUNA ELECTRONICS', '', '', '', '01915526426', 'BAZIT PUR KISHOREGONJ', '', '', '', '', '', '', '', '', '', 'supplier', '', '', '', -5.00, 0.00, '0016', 'active', 0),
(5, '2021-07-01', 'MBS00005', '', 'MIND TOUCH LIMITED', '', '', '', '01742228829', '42,SENPARA PARBATA,MIRPUR', '', '', '', '', '', '', '', '', '', 'supplier', '', '', '', 17.00, 0.00, '0016', 'active', 0),
(6, '2021-07-01', 'MBS00006', '', 'NEW DHAKA ELECTRONICS', '', '', '', '01937060587', '94,JOBBAR ALI COMPLEX', '', '', '', '', '', '', '', '', '', 'supplier', '', '', '', -13.00, 0.00, '0016', 'active', 0),
(7, '2021-07-01', 'MBS00007', '', 'RAHIMAFROZ DISTRIBUTION LTD.', '', '', '', '', 'Globe Chamber,104 Motijheel C/A,Dhaka', '', '', '', '', '', '', '', '', '', 'supplier', '', '', '', 0.00, 0.00, '0016', 'active', 0),
(8, '2021-07-01', 'MBS00008', '', 'RAN TRADERS', '', '', '', '01920885631', '22,KAPTAN BAZAR COMPLEX BHABA', '', '', '', '', '', '', '', '', '', 'supplier', '', '', '', -101.00, 0.00, '0016', 'active', 0),
(9, '2021-07-01', 'MBS00009', '', 'RFL', '', '', '', '01924605116', 'PRAN-RFL CENTER', '', '', '', '', '', '', '', '', '', 'supplier', '', '', '', -110.00, 0.00, '0016', 'active', 0),
(10, '2021-07-01', 'MBS00010', '', 'RFL(BIZLI CABLE)', '', '', '', '01924606423', 'J C GUHO ROAD', '', '', '', '', '', '', '', '', '', 'supplier', '', '', '', 0.00, 0.00, '0016', 'active', 0),
(11, '2021-07-01', 'MBS00011', '', 'S Q WIRE& CABLE CO.LTD', '', '', '', '01777763810', '69 RAMBABU ROAD,MYM', '', '', '', '', '', '', '', '', '', 'supplier', '', '', '', 2.00, 0.00, '0016', 'active', 0),
(12, '2021-07-01', 'MBS00012', '', 'SS ELECTRIC', '', '', '', '01750838313', '1,GULISHTAN.NAWABPUR,DHAKA', '', '', '', '', '', '', '', '', '', 'supplier', '', '', '', 1.00, 0.00, '0016', 'active', 0),
(13, '2021-07-01', 'MBS00013', '', 'STAR SOLAR ENERGY', '', '', '', '01816644486', 'H#391,R#12,DOHS,MIRPUR-12', '', '', '', '', '', '', '', '', '', 'supplier', '', '', '', 10.00, 0.00, '0016', 'active', 0),
(14, '2021-01-13', 'MBS00014', '', 'CASH', '', '', 'MUNNA', '01714090942', 'Jubligat', '', '', '', '', '', '', '', '', '', 'supplier', '', '', '', 0.00, 0.00, '0016', 'active', 0),
(15, '2021-01-24', 'MBS00015', '', 'HAMKO CORPORATION LTD.(AUTOMETIVE)', '', '', 'NUR MOHAMMAD', '01755535602', 'DIGAR KANDA,DKAHA MYMENSINGH HIGH WAY ROAD', 'NULL', 'NULL', '', '', '', 'NULL', '', '', '', 'supplier', '', 'NULL', 'NULL', 0.00, 0.00, '0016', 'active', 0),
(16, '2021-01-24', 'MBS00016', '', 'HAMKO CORPORATION LTD.(SOLAR)', '', '', 'NUR MOHAMMAD', '01755535602', 'DIGAR KANDA,DHAKA MYMENSINGH HIGH WAY ROAD', 'NULL', 'NULL', '', '', '', 'NULL', '', '', '', 'supplier', '', 'NULL', 'NULL', 0.00, 0.00, '0016', 'active', 0),
(17, '2021-01-24', 'MBS00017', '', 'HAMKO CORPORATION LTD.(LUBRICANT)', '', '', 'NUR MOHAMMAD', '01755535602', 'DIGAR KAND,DHAKA MYMENSINGH HIGH WAY ROAD', 'NULL', 'NULL', '', '', '', 'NULL', '', '', '', 'supplier', '', 'NULL', 'NULL', 0.00, 0.00, '0016', 'active', 0),
(18, '2021-01-26', 'MBS00018', '', 'CASH', '', '', 'MUNNA', '01714090942', 'Jubligat', 'NULL', 'NULL', '', '', '', 'NULL', '', '', '', 'supplier', '', 'NULL', 'NULL', 0.00, 0.00, '0016', 'active', 0),
(19, '2021-02-11', 'MBS00019', '', 'GH POWER', '', '', 'IBNUL VAI', '01712847130', 'GULPUKUR PAR ,MYMENSINGH', 'NULL', 'NULL', '', '', '', 'NULL', '', '', '', 'supplier', '', 'NULL', 'NULL', 0.00, 0.00, '0016', 'active', 0),
(20, '2021-07-01', 'MBC00020', '', 'A.N.BATTERY HOUSE', 'mymensingh_sadar', 'a', '', '01973185044', 'GAITAL BUS STAND', '', '', '0', '0', '0', '', '0', '0', '0', 'client', 'dealer', '0', 'RE', -948.00, 10000000.00, '0016', 'active', 0),
(21, '2021-07-01', 'MBC00021', '', 'AKOTA CYCLE & ELECTRONICS HOUSE', 'mymensingh_sadar', '', '', '01921709565', 'DORGA PAR,MUKTAGACHA', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 400.00, 10000000.00, '0016', 'active', 0),
(22, '2021-07-01', 'MBC00022', '', 'AL-MADINA', 'mymensingh_sadar', 'AL-MADINA MOTORS', '', '01710715160', 'DHAKA BYPASS', '', '', '0', '0', '0', '', '0', '0', '0', 'client', 'dealer', '0', 'RE', 0.00, 10000000.00, '0016', 'active', 0),
(23, '2021-07-01', 'MBC00023', '', 'ALI MACHINARISE AND MOTORS', 'mymensingh_sadar', '', '', '01915925548', 'RAI BAZAR BUS STAND', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', -900.00, 10000000.00, '0016', 'active', 0),
(24, '2021-07-01', 'MBC00024', '', 'ALMAS VAI', 'mymensingh_sadar', '', '', '01721530349', 'KACHARI GHAT', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 7.00, 10000000.00, '0016', 'active', 0),
(25, '2021-07-01', 'MBC00025', '', 'ANIKA ELECRONICS', 'mymensingh_sadar', '', '', '01740821444', 'PATHGUDAM,MYM', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 5.00, 10000000.00, '0016', 'active', 0),
(26, '2021-07-01', 'MBC00026', '', 'ASHAR ALO', 'mymensingh_sadar', '', '', '01799106233', 'MODDINAGAR BAZAR,DHORMOPASHA', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 0.00, 10000000.00, '0016', 'active', 0),
(27, '2021-07-01', 'MBC00027', '', 'ATIK VAI', 'mymensingh_sadar', '', '', '', 'TOWN HALL', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 2.00, 10000000.00, '0016', 'active', 0),
(28, '2021-07-01', 'MBC00028', '', 'BABU MAMA', 'mymensingh_sadar', 'BABU MAMA', '', '01558227688', 'NATUNBAZAR,MYMENSINGH', '', '', '0', '0', '0', '', '0', '0', '0', 'client', 'user', '0', 'RE', 9.00, 10000000.00, '0016', 'active', 0),
(29, '2021-07-01', 'MBC00029', '', 'BACHCHU', 'mymensingh_sadar', '', '', '01712537379', 'NATUN BAZAR', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 1.00, 10000000.00, '0016', 'active', 0),
(30, '2021-07-01', 'MBC00030', '', 'BACHCHU KHAN', 'mymensingh_sadar', '', '', '01713587622', 'MYMENSINGH', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 7.00, 10000000.00, '0016', 'active', 0),
(31, '2021-07-01', 'MBC00031', '', 'BADHON DA', 'mymensingh_sadar', '', '', '01918871847', 'BARA BAZAR,MYM', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 500.00, 10000000.00, '0016', 'active', 0),
(32, '2021-07-01', 'MBC00032', '', 'BASED VAI', 'mymensingh_sadar', '', '', '01911279388', 'D.M.D.C', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 3.00, 10000000.00, '0016', 'active', 0),
(33, '2021-07-01', 'MBC00033', '', 'BASHAR', 'mymensingh_sadar', '', '', '01714414964', 'MYM', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 1.00, 10000000.00, '0016', 'active', 0),
(34, '2021-07-01', 'MBC00034', '', 'BHANDHU SOLAR', 'mymensingh_sadar', '', '', '', 'FULPUR,MYMENSINGH', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 267.00, 10000000.00, '0016', 'active', 0),
(35, '2021-07-01', 'MBC00035', '', 'Bikash babu', 'mymensingh_sadar', 'Bikash babu', '', '01715210485', 'MOTOR MALIK SHOMITY', '', '', '0', '0', '0', '', '0', '0', '0', 'client', 'dealer', '0', 'RE', 22000.00, 10000000.00, '0016', 'active', 0),
(36, '2021-07-01', 'MBC00036', '', 'BIPLOB VAI', 'mymensingh_sadar', '', '', '01710739882', 'POURO SUPER MARKET', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 3.00, 10000000.00, '0016', 'active', 0),
(37, '2021-07-01', 'MBC00037', '', 'CASH', 'mymensingh_sadar', '', '', '', '', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 27.00, 10000000.00, '0016', 'active', 0),
(38, '2021-07-01', 'MBC00038', '', 'CHANDRA PURI AUTO HOUSE & BATTERY', 'mymensingh_sadar', '', '', '01718530987', 'AQUA BYPASS,MYM', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', -100.00, 10000000.00, '0016', 'active', 0),
(39, '2021-07-01', 'MBC00039', '', 'COMILLA ELECTRONICS', 'mymensingh_sadar', '', '', '01740943753', 'JANANI MARKET,HOSPITAL ROAD', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 0.00, 10000000.00, '0016', 'active', 0),
(40, '2021-07-01', 'MBC00040', '', 'D.K ELECTRO', 'mymensingh_sadar', '', '', '01716516461', 'GIRLS HIGH SCHOOL ROAD,', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', -200.00, 10000000.00, '0016', 'active', 0),
(41, '2021-07-01', 'MBC00041', '', 'DADA MOTORS', 'mymensingh_sadar', '', '', '01834406391', 'MADHUPUR BUS STAND', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', -3.00, 10000000.00, '0016', 'active', 0),
(42, '2021-07-01', 'MBC00042', '', 'DIPU', 'mymensingh_sadar', '', '', '01755555883', 'CHECHUA,MUKTAGACHA', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 7.00, 10000000.00, '0016', 'active', 0),
(43, '2021-07-01', 'MBC00043', '', 'DR.PATHAN', 'mymensingh_sadar', '', '', '', 'AMIRABAD,MASHKANDA', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 33.00, 10000000.00, '0016', 'active', 0),
(44, '2021-07-01', 'MBC00044', '', 'DUDNATH KAKA', 'mymensingh_sadar', '', '', '', 'MOTOR MALIK SHOMITI', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 11.00, 10000000.00, '0016', 'active', 0),
(45, '2021-07-01', 'MBC00045', '', 'DULAL', 'mymensingh_sadar', '', '', '01688316030', 'JUBLIGHAT,MYM', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 1.00, 10000000.00, '0016', 'active', 0),
(46, '2021-07-01', 'MBC00046', '', 'ERSHAD', 'mymensingh_sadar', '', '', '', 'MYMENSINGH', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 14.00, 10000000.00, '0016', 'active', 0),
(47, '2021-07-01', 'MBC00047', '', 'FORAZI ELECTRONICS', 'mymensingh_sadar', '', '', '01723132022', 'KALIBARI,MUKTAGACHA', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 312.00, 10000000.00, '0016', 'active', 0),
(48, '2021-07-01', 'MBC00048', '', 'HASHEM VAI', 'mymensingh_sadar', '', '', '01921438051', 'MALIK SHOMITY', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 2.00, 10000000.00, '0016', 'active', 0),
(49, '2021-07-01', 'MBC00049', '', 'JAKIR', 'mymensingh_sadar', '', '', '01710416124', 'MK MOTORS', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 8.00, 10000000.00, '0016', 'active', 0),
(50, '2021-07-01', 'MBC00050', '', 'JEWEL', 'mymensingh_sadar', '', '', '01714798922', 'KISHORE GONJ', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 4.00, 10000000.00, '0016', 'active', 0),
(51, '2021-07-01', 'MBC00051', '', 'KASHEM BATTERY', 'mymensingh_sadar', '', '', '01721905655', 'DURGAPUR,NETROKONA', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', -156.00, 10000000.00, '0016', 'active', 0),
(52, '2021-07-01', 'MBC00052', '', 'KAWSAR', 'mymensingh_sadar', '', '', '', 'TOWNHALL,MYMENSINGH', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 23.00, 10000000.00, '0016', 'active', 0),
(53, '2021-07-01', 'MBC00053', '', 'KHADEMUL VAI', 'mymensingh_sadar', '', '', '01715088361', 'TOWN HALL', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 8.00, 10000000.00, '0016', 'active', 0),
(54, '2021-07-01', 'MBC00054', '', 'KHOKON MACHINARISE', 'mymensingh_sadar', '', '', '01720019878', 'SHAMGONJ,MYMENSINGH', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 4.00, 10000000.00, '0016', 'active', 0),
(55, '2021-07-01', 'MBC00055', '', 'KIBRIA', 'mymensingh_sadar', '', '', '', 'SHANKIPARA,MYM', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 9.00, 10000000.00, '0016', 'active', 0),
(56, '2021-07-01', 'MBC00056', '', 'LITON CHOUDHARY', 'mymensingh_sadar', '', '', '01911010924', 'PANDIT PARA,MYM', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 500.00, 10000000.00, '0016', 'active', 0),
(57, '2021-07-01', 'MBC00057', '', 'LIZA MOTORS', 'mymensingh_sadar', '', '', '', 'MUKTAGACHA', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', -815.00, 10000000.00, '0016', 'active', 0),
(58, '2021-07-01', 'MBC00058', '', 'M/S.AL-MADINA AUTO TRADERS', 'mymensingh_sadar', '', '', '01710715160', 'DIGAR KANDA,BYPASS MOR', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 1.00, 10000000.00, '0016', 'active', 0),
(59, '2021-07-01', 'MBC00059', '', 'M/S.ALEENA MOTORS', 'mymensingh_sadar', 'M/S.ALEENA MOTORS', '', '01791868580', 'CHOR KALI BARI(CHAINA MOUR)', '', '', '0', '0', '0', '', '0', '0', '0', 'client', 'dealer', '0', 'RE', -28969.00, 10000000.00, '0016', 'active', 0),
(60, '2021-07-01', 'MBC00060', '', 'MAHBUB KAKA', 'mymensingh_sadar', '', '', '01711027793', 'MALIK SHOMITY,MYM', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 8.00, 10000000.00, '0016', 'active', 0),
(61, '2021-07-01', 'MBC00061', '', 'MAHIN ELECTRONICS &SOLAR', 'mymensingh_sadar', '', '', '01713525752', 'SHAMGONJ,MOTHERGONJ', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 260.00, 10000000.00, '0016', 'active', 0),
(62, '2021-07-01', 'MBC00062', '', 'MANAN KAKA', 'mymensingh_sadar', '', '', '01977164614', 'POROSHOVA', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 1.00, 10000000.00, '0016', 'active', 0),
(63, '2021-07-01', 'MBC00063', '', 'MARHABA TRADERS', 'mymensingh_sadar', '', '', '01913773901', 'PANDIT BHABAN', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', -5.00, 10000000.00, '0016', 'active', 0),
(64, '2021-07-01', 'MBC00064', '', 'CITY CORPORATION', 'mymensingh_sadar', 'CITY CORPORATION', '', '01716625061', 'MYMENSINGH POUROSHOVA', '', '', '0', '0', '0', '', '0', '0', '0', 'client', 'dealer', '0', 'RE', 65862.00, 10000000.00, '0016', 'active', 0),
(65, '2021-07-01', 'MBC00065', '', 'MD,SHAHAN SHA', 'mymensingh_sadar', '', '', '', 'SARKAR BARI,MYM', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 1.00, 10000000.00, '0016', 'active', 0),
(66, '2021-07-01', 'MBC00066', '', 'MD.DULAL BHUYAN', 'mymensingh_sadar', '', '', '01917836166', 'ISHWARGONJ,MYM', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 1.00, 10000000.00, '0016', 'active', 0),
(67, '2021-07-01', 'MBC00067', '', 'MD.HASHEM', 'mymensingh_sadar', '', '', '01733168240', 'SORAB MOSHJID,AKUA', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 4.00, 10000000.00, '0016', 'active', 0),
(68, '2021-07-01', 'MBC00068', '', 'MD.JONAL ABEDIN', 'mymensingh_sadar', '', '', '', 'TOWNHALL,MYM', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 500.00, 10000000.00, '0016', 'active', 0),
(69, '2021-07-01', 'MBC00069', '', 'MD.KHALILUR RAHMAN', 'mymensingh_sadar', '', '', '', 'CHOR ISHORDIA,MYM', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 5.00, 10000000.00, '0016', 'active', 0),
(70, '2021-07-01', 'MBC00070', '', 'MD.MUJIBUR RAHMAN', 'mymensingh_sadar', '', '', '01853373944', 'CHOR KALIBARI.MYMENSINGH', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 10.00, 10000000.00, '0016', 'active', 0),
(71, '2021-07-01', 'MBC00071', '', 'MD.RASEL', 'mymensingh_sadar', '', '', '01686452915', 'TOWN HALL,MYM', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 7.00, 10000000.00, '0016', 'active', 0),
(72, '2021-07-01', 'MBC00072', '', 'MD.SHOHAG', 'mymensingh_sadar', '', '', '', 'MASHKANDA,MYM', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 3.00, 10000000.00, '0016', 'active', 0),
(73, '2021-07-01', 'MBC00073', '', 'MD.SHOHEL RANA', 'mymensingh_sadar', '', '', '01911542742', 'RAMGOPALPUR', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 10.00, 10000000.00, '0016', 'active', 0),
(74, '2021-07-01', 'MBC00074', '', 'MILON SOLAR', 'mymensingh_sadar', '', '', '01737309968', 'PORAN GONJ,MYMENSINGH', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 1.00, 10000000.00, '0016', 'active', 0),
(75, '2021-07-01', 'MBC00075', '', 'MINTU', 'mymensingh_sadar', '', '', '', 'TOWON HALL', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', -400.00, 10000000.00, '0016', 'active', 0),
(76, '2021-07-01', 'MBC00076', '', 'MISTER AUTO ELECTRIC WORKSHOP', 'mymensingh_sadar', '', '', '01944167226', 'PURATON SHAHEB BAZAR', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 1.00, 10000000.00, '0016', 'active', 0),
(77, '2021-07-01', 'MBC00077', '', 'MOMEN MAMA', 'mymensingh_sadar', '', '', '01711372453', 'NATUN BAZAR', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 23.00, 10000000.00, '0016', 'active', 0),
(78, '2021-07-01', 'MBC00078', '', 'MONIR SOLAR ELECTRONICS', 'mymensingh_sadar', '', '', '01731421653', 'TARAKANDA,MYMENSINGH', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 4.00, 10000000.00, '0016', 'active', 0),
(79, '2021-07-01', 'MBC00079', '', 'MONJU KAKA', 'mymensingh_sadar', '', '', '01736431860', 'ISHLAMI BANK', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 8.00, 10000000.00, '0016', 'active', 0),
(80, '2021-07-01', 'MBC00080', '', 'MOTIUR RAHMAN', 'mymensingh_sadar', '', '', '', 'MADHUPUR,TANGAIL', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', -3.00, 10000000.00, '0016', 'active', 0),
(81, '2021-07-01', 'MBC00081', '', 'MUNNA VAI', 'mymensingh_sadar', '', '', '01713164739', 'MALIK SHOMITY', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 2.00, 10000000.00, '0016', 'active', 0),
(82, '2021-07-01', 'MBC00082', '', 'MZMMS', 'mymensingh_sadar', '', '', '', 'JUBLIGHAT,MYMENSINGH', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 12.00, 10000000.00, '0016', 'active', 0),
(83, '2021-07-01', 'MBC00083', '', 'NOMAN', 'mymensingh_sadar', '', '', '01911700152', 'SHAMGONJ,MYM', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 2.00, 10000000.00, '0016', 'active', 0),
(84, '2021-07-01', 'MBC00084', '', 'NOVA SOLAR POWER ELECTRIC', 'mymensingh_sadar', '', '', '01734901730', 'Hogla Chowrasta,Purbadhola', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 6.00, 10000000.00, '0016', 'active', 0),
(85, '2021-07-01', 'MBC00085', '', 'PABEL ENTERPRISE', 'mymensingh_sadar', '', '', '', 'GORIPUR,MYMENSINGH', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 650.00, 10000000.00, '0016', 'active', 0),
(86, '2021-07-01', 'MBC00086', '', 'PAVEL ENTERPEISE', 'mymensingh_sadar', '', '', '01711704927', 'S.K.HOSPITAL', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 3.00, 10000000.00, '0016', 'active', 0),
(87, '2021-07-01', 'MBC00087', '', 'POLTU VAI', 'mymensingh_sadar', '', '', '01719719916', 'SHAMBHUGONJ,MYM', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 8.00, 10000000.00, '0016', 'active', 0),
(88, '2021-07-01', 'MBC00088', '', 'PRIO BABU', 'mymensingh_sadar', '', '', '01711141896', 'MALIK SHOMITY', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 1.00, 10000000.00, '0016', 'active', 0),
(89, '2021-07-01', 'MBC00089', '', 'PUTON DA', 'mymensingh_sadar', '', '', '01711660797', 'MALIK SHOMITY', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 9.00, 10000000.00, '0016', 'active', 0),
(90, '2021-07-01', 'MBC00090', '', 'RAHAT', 'mymensingh_sadar', '', '', '', 'PROTISROTI,', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 81.00, 10000000.00, '0016', 'active', 0),
(91, '2021-07-01', 'MBC00091', '', 'RAHUL VAI', 'mymensingh_sadar', '', '', '01711708687', 'PROTISROTI', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 300.00, 10000000.00, '0016', 'active', 0),
(92, '2021-07-01', 'MBC00092', '', 'RAJIB BATTERY', 'mymensingh_sadar', '', '', '01715695083', 'DURGAPUR,NETROKONA', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 300.00, 10000000.00, '0016', 'active', 0),
(93, '2021-07-01', 'MBC00093', '', 'RAM KRISHNA DA', 'mymensingh_sadar', '', '', '01714357999', 'MALIK SHOMITY', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 6.00, 10000000.00, '0016', 'active', 0),
(94, '2021-07-01', 'MBC00094', '', 'RANA VAI', 'mymensingh_sadar', '', '', '01675506053', 'MOFIZ UDDIN INDEX PLAZA', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 3.00, 10000000.00, '0016', 'active', 0),
(95, '2021-07-01', 'MBC00095', '', 'RASEL(TENO)', 'mymensingh_sadar', '', '', '01926384650', 'DIGAR KANDA', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 1.00, 10000000.00, '0016', 'active', 0),
(96, '2021-07-01', 'MBC00096', '', 'RASHED', 'mymensingh_sadar', '', '', '01772848151', 'TANGAIL', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 789.00, 10000000.00, '0016', 'active', 0),
(97, '2021-07-01', 'MBC00097', '', 'RATAN', 'mymensingh_sadar', '', '', '01914071653', 'JUBLIGHAT,MYM', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 19.00, 10000000.00, '0016', 'active', 0),
(98, '2021-07-01', 'MBC00098', '', 'RATRI BATTERY', 'mymensingh_sadar', '', '', '01735847451', 'CHARBARI KALBARI,SHAMBHUGONJ', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 2.00, 10000000.00, '0016', 'active', 0),
(99, '2021-07-01', 'MBC00099', '', 'RAZZAK', 'mymensingh_sadar', '', '', '01631941049', 'POUROSHOVA,MYM', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 3.00, 10000000.00, '0016', 'active', 0),
(100, '2021-07-01', 'MBC00100', '', 'REZA VAI', 'mymensingh_sadar', '', '', '01713826735', 'PUBALI BANK', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 12.00, 10000000.00, '0016', 'active', 0),
(101, '2021-07-01', 'MBC00101', '', 'RIPON', 'mymensingh_sadar', '', '', '01779198390', 'MYMENSINH', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 2.00, 10000000.00, '0016', 'active', 0),
(102, '2021-07-01', 'MBC00102', '', 'ROBI BATTERY', 'mymensingh_sadar', '', '', '01920383505', 'SHAM GONJ BAZAR,MAIN ROAD', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', -2.00, 10000000.00, '0016', 'active', 0),
(103, '2021-07-01', 'MBC00103', '', 'ROBIN', 'mymensingh_sadar', '', '', '01681824300', 'MYM', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 5.00, 10000000.00, '0016', 'active', 0),
(104, '2021-07-01', 'MBC00104', '', 'ROBIN BATTERY', 'mymensingh_sadar', '', '', '01816322221', 'ISHWARGONJ,MYM', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 5.00, 10000000.00, '0016', 'active', 0),
(105, '2021-07-01', 'MBC00105', '', 'RUHUL MAMA', 'mymensingh_sadar', '', '', '01751583303', 'MYMENSINGH', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 2.00, 10000000.00, '0016', 'active', 0),
(106, '2021-07-01', 'MBC00106', '', 'RUHUL VAI', 'mymensingh_sadar', '', '', '01911596945', '', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 4.00, 10000000.00, '0016', 'active', 0),
(107, '2021-07-01', 'MBC00107', '', 'SAIEM SAMDANI', 'mymensingh_sadar', '', '', '01711185471', 'Mymensingh', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 13.00, 10000000.00, '0016', 'active', 0),
(108, '2021-07-01', 'MBC00108', '', 'SAWKAT VAI', 'mymensingh_sadar', '', '', '01748971103', 'Baghmara,mym', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 2.00, 10000000.00, '0016', 'active', 0),
(109, '2021-07-01', 'MBC00109', '', 'SAYAD NURUL HUDA MUFTI', 'mymensingh_sadar', '', '', '01712532743', '55/7 MASHKANDA UTTARPARA', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 2.00, 10000000.00, '0016', 'active', 0),
(110, '2021-07-01', 'MBC00110', '', 'SHAHEEN ELECTRONICS', 'mymensingh_sadar', '', '', '0192520990', 'HOGLA BAZAR,KALIBARI', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 772.00, 10000000.00, '0016', 'active', 0),
(111, '2021-07-01', 'MBC00111', '', 'SHAJAHAN VAI', 'mymensingh_sadar', '', '', '01845973544', 'DMDC', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 7.00, 10000000.00, '0016', 'active', 0),
(112, '2021-07-01', 'MBC00112', '', 'SHAJJAD SIR', 'mymensingh_sadar', '', '', '01712462989', 'MYMENSINGH', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 5.00, 10000000.00, '0016', 'active', 0),
(113, '2021-07-01', 'MBC00113', '', 'SHAKIN MOTORS', 'mymensingh_sadar', '', '', '01713572604', 'JUBLIGHAT,MYM', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 2.00, 10000000.00, '0016', 'active', 0),
(114, '2021-07-01', 'MBC00114', '', 'SHAMOL KAKA', 'mymensingh_sadar', '', '', '01711682076', 'MALIK SHOMITY,MYM', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 14.00, 10000000.00, '0016', 'active', 0),
(115, '2021-07-01', 'MBC00115', '', 'SHAPLA MIKE & BATTERY', 'fulpur_mymensingh', 'SHAPLA MIKE & BATTERY', '', '01616309794', 'HOSPITAL ROAD,FULPUR', '', '', '0', '0', '0', '', '0', '0', '0', 'client', 'dealer', '0', 'RE', -28845.00, 10000000.00, '0016', 'active', 0),
(116, '2021-07-01', 'MBC00116', '', 'SHARIF BATTERY', 'mymensingh_sadar', '', '', '01710317394', 'PALLI BIDUT OFFICE', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 180.00, 10000000.00, '0016', 'active', 0),
(117, '2021-07-01', 'MBC00117', '', 'SHERPUR BATTERY HOUSE', 'mymensingh_sadar', '', '', '01913743072', 'SHERPUR', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', -980.00, 10000000.00, '0016', 'active', 0),
(118, '2021-07-01', 'MBC00118', '', 'SHIMONTO STORE', 'mymensingh_sadar', '', '', '01720034344', 'R.K.MISSON ROAD', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', -11.00, 10000000.00, '0016', 'active', 0),
(119, '2021-07-01', 'MBC00119', '', 'SHOHEL TARAKANDA', 'mymensingh_sadar', '', '', '01771937115', 'TARAKANDA', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 2.00, 10000000.00, '0016', 'active', 0),
(120, '2021-07-01', 'MBC00120', '', 'SHOHEL VAI', 'mymensingh_sadar', '', '', '01711586326', 'TOWN HALL,MYMENSINGH', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 2.00, 10000000.00, '0016', 'active', 0),
(121, '2021-07-01', 'MBC00121', '', 'SHUMNATH DA', 'mymensingh_sadar', '', '', '', 'JILA MOTOR MALIK SHOMITY', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 9.00, 10000000.00, '0016', 'active', 0),
(122, '2021-07-01', 'MBC00122', '', 'SHURJHANKER ENTERPRISE', 'mymensingh_sadar', '', '', '01716316639', 'STATION ROAD,GAFARGAON', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 767.00, 10000000.00, '0016', 'active', 0),
(123, '2021-07-01', 'MBC00123', '', 'SIDDIK VAI', 'mymensingh_sadar', '', '', '01713523560', 'SHAMBHUGONJ,MYMENSINGH', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 7.00, 10000000.00, '0016', 'active', 0),
(124, '2021-07-01', 'MBC00124', '', 'SUJON', 'mymensingh_sadar', '', '', '01703284022', 'GOURIPUR', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 2.00, 10000000.00, '0016', 'active', 0),
(125, '2021-07-01', 'MBC00125', '', 'SUJON VAI', 'mymensingh_sadar', '', '', '01719644140', 'RAILWAY STATION,MYM', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 2.00, 10000000.00, '0016', 'active', 0),
(126, '2021-07-01', 'MBC00126', '', 'SUMON VAI', 'mymensingh_sadar', '', '', '01716036560', 'ONNESHON SCHOOL', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 7.00, 10000000.00, '0016', 'active', 0),
(127, '2021-07-01', 'MBC00127', '', 'SURJER ALO SOLAR', 'mymensingh_sadar', '', '', '01782940249', 'ASHTHODAR BAZAR,MYM', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 2.00, 10000000.00, '0016', 'active', 0),
(128, '2021-07-01', 'MBC00128', '', 'SWAPON BABU', 'mymensingh_sadar', '', '', '01712775526', 'JUBLIGHAT,MYM', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 10.00, 10000000.00, '0016', 'active', 0),
(129, '2021-07-01', 'MBC00129', '', 'TUSHAR', 'mymensingh_sadar', '', '', '01711034457', 'TOWNHALL', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 1.00, 10000000.00, '0016', 'active', 0),
(130, '2021-07-01', 'MBC00130', '', 'USTAD SUMON', 'mymensingh_sadar', '', '', '01711148248', 'DIGARKANDA,MYM', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 30.00, 10000000.00, '0016', 'active', 0),
(131, '2021-07-01', 'MBC00131', '', 'UZZAL VAI', 'mymensingh_sadar', '', '', '01712055815', 'TOWN HALL', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 2.00, 10000000.00, '0016', 'active', 0),
(132, '2021-07-01', 'MBC00132', '', 'VAI VAI BATTERY HOUSE', 'mymensingh_sadar', '', '', '01819146569', 'K.B.ISHMAIL ROAD', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 100.00, 10000000.00, '0016', 'active', 0),
(133, '2021-07-01', 'MBC00133', '', 'ZIA AUTO MOBILE HOUSE', 'mymensingh_sadar', '', '', '01740936878', 'ZANZAIL BAZAR', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', -400.00, 10000000.00, '0016', 'active', 0),
(134, '2021-01-13', 'MBC00134', '', 'MANIK', 'sherpur_sadar', 'MANIK BATTERY', '', '01724101562', 'SAT ANI PARA,DHAKA BUS STAND,SHERPUR', '', '', '', '', '', '', '', '', '', 'client', 'dealer', '', 'RE', 0.00, 10000000.00, '0016', 'active', 0),
(135, '2021-01-19', 'MBC00135', '', 'MD.SHAJAHAN', 'gouripur_mymensingh', 'MUNNA & BROTHERS', 'NULL', '01910576289', 'GOURIPUR,MYMENSINGH', 'NULL', '0', '0', '0', '0', '0', '0', '0', '0', 'client', 'user', '0', 'RE', 0.00, 10000000.00, '0016', 'active', 0),
(136, '2021-01-27', 'MBC00136', '', 'PATHAN MOTORS', 'mymensingh_sadar', 'PATHAN MOTORS', 'NULL', '01712774339', 'BARA,BAZAR,MYMENSINGH', 'NULL', '0', '0', '0', '0', '0', '0', '0', '0', 'client', 'dealer', 'NULL', 'RE', 0.00, 10000000.00, '0016', 'active', 0),
(137, '2021-01-27', 'MBC00137', '', 'RIPON', 'gouripur_mymensingh', 'RIPON GOURIPUR', 'NULL', '01723925299', 'GOURIPUR,MYM', 'NULL', '0', '0', '0', '0', '0', '0', '0', '0', 'client', 'dealer', 'NULL', 'RE', 0.00, 10000000.00, '0016', 'active', 0),
(138, '2021-01-28', 'MBC00138', '', 'HAFIZ VAI', 'nandail_mymensingh', 'HAFIZ VAI', 'NULL', '01915577753', 'NANDAIL CHOWRASTA', 'NULL', '0', '0', '0', '0', '0', '0', '0', '0', 'client', 'dealer', 'NULL', 'RE', 0.00, 10000000.00, '0016', 'active', 0),
(139, '2021-02-06', 'MBC00139', '', 'MD.KAZI ALAM', 'mymensingh_sadar', 'MD.KAZI ALAM', 'NULL', '01711156309', 'BAGHMARA,MYMENSINGH', 'NULL', '0', '0', '0', '0', '0', '0', '0', '0', 'client', 'dealer', 'NULL', 'RE', 0.00, 10000000.00, '0016', 'active', 0),
(140, '2021-02-07', 'MBC00140', '', 'NURUDDIN', 'mymensingh_sadar', 'NURUDDIN', 'NULL', '01728526733', '', 'NULL', '0', '0', '0', '0', '0', '0', '0', '0', 'client', 'dealer', 'NULL', 'RE', 0.00, 10000000.00, '0016', 'active', 0),
(141, '2021-02-07', 'MBC00141', '', 'TATA BETTRY', 'mymensingh_sadar', 'TATA BETTRY', 'NULL', '01718591662', '', 'NULL', '0', '0', '0', '0', '0', '0', '0', '0', 'client', 'dealer', 'NULL', 'RE', 0.00, 10000000.00, '0016', 'active', 0),
(142, '2021-02-11', 'MBC00142', '', 'DRIVER RAFIK', 'mymensingh_sadar', 'TRUCK-253', 'NULL', '01716625061, 01930603385', '', 'NULL', '0', '0', '0', '0', '0', '0', '0', '0', 'client', 'sub_dealer', 'CITY CORPORATION', 'RE', 0.00, 10000000.00, '0016', 'active', 0),
(143, '2021-02-13', 'MBC00143', '', 'SHAHIN MOTORS', 'kendua_netrokona', 'SHAHIN MOTORS', 'NULL', '01723332566', '', 'NULL', '0', '0', '0', '0', '0', '0', '0', '0', 'client', 'dealer', 'NULL', 'RE', 0.00, 10000000.00, '0016', 'active', 0),
(144, '2021-02-13', 'MBC00144', '', 'SUCCESS COMPUTER & ENGINEERING', 'mymensingh_sadar', 'SUCCESS COMPUTER & ENGINEERING', 'NULL', '01711682184', 'NATUN BAZAR,MYMENSINGH', 'NULL', '0', '0', '0', '0', '0', '0', '0', '0', 'client', 'dealer', 'NULL', 'RE', 0.00, 10000000.00, '0016', 'active', 0);

-- --------------------------------------------------------

--
-- Table structure for table `partybalance`
--

CREATE TABLE `partybalance` (
  `id` int(50) NOT NULL,
  `code` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `initial_balance` decimal(10,2) NOT NULL COMMENT 'positive sign receivable and negative sign payable',
  `balance` decimal(10,2) NOT NULL COMMENT 'positive sign receivable and negative sign payable',
  `credit_limit` decimal(10,2) UNSIGNED NOT NULL COMMENT 'only for client and value goes to positive sign',
  `trash` tinyint(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `partymeta`
--

CREATE TABLE `partymeta` (
  `id` int(10) UNSIGNED NOT NULL,
  `party_code` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `meta_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_value` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `trash` tinyint(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `partytransaction`
--

CREATE TABLE `partytransaction` (
  `id` int(10) UNSIGNED NOT NULL,
  `inc_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lpr_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `transaction_at` date NOT NULL,
  `change_at` date NOT NULL,
  `party_code` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `credit` decimal(10,2) NOT NULL COMMENT 'both company and client positive sign = Receivable; for admin = negative ',
  `debit` decimal(10,2) NOT NULL COMMENT 'both company and client = negative ; for me = positive',
  `previous_balance` decimal(10,2) NOT NULL COMMENT 'Vendors: +(balance) = Receivable and -(balance) = Payable amount. Client: +(balance) = Payable and -(balance) = Receivable amount',
  `paid` decimal(10,2) NOT NULL,
  `current_balance` decimal(10,2) NOT NULL COMMENT 'Vendors: +(balance) = Receivable and -(balance) = Payable amount. Client: +(balance) = Payable and -(balance) = Receivable amount',
  `transaction_via` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `transaction_by` varchar(150) COLLATE utf8_unicode_ci NOT NULL COMMENT 'client or supplier',
  `transaction_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'installment or transaction',
  `relation` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'sale transaction format is: ''sale:voucher'' and cash transaction is ''transaction''',
  `remission` decimal(10,2) NOT NULL,
  `remark` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pr_no` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `serial` int(11) NOT NULL,
  `comission` decimal(10,2) NOT NULL,
  `godown_code` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `comment` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `trash` tinyint(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `partytransactionmeta`
--

CREATE TABLE `partytransactionmeta` (
  `id` int(10) UNSIGNED NOT NULL,
  `transaction_id` int(10) UNSIGNED NOT NULL,
  `meta_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_value` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `trash` tinyint(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `privileges`
--

CREATE TABLE `privileges` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `privilege_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `module_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `access` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `privileges`
--

INSERT INTO `privileges` (`id`, `date`, `privilege_name`, `module_name`, `access`, `user_id`) VALUES
(1, '2019-07-10', 'user', '', '{\"dashboard\":[\"todays_purchase\",\"supplier_paid\",\"bank_withdraw\",\"todays_income\"],\"category_menu\":[\"add-new\"],\"subCategory_menu\":[\"add-new\"],\"product_menu\":[\"add-new\"],\"supplier-menu\":[\"add\",\"all\"],\"client_menu\":[\"add\",\"all\"],\"income_menu\":[\"field\",\"new\",\"all\",\"rent\",\"all_rent\"],\"cost_menu\":[\"new\",\"all\"]}', '13'),
(2, '2020-06-16', 'user', '', '{\"dashboard\":[\"purchase\",\"stock\",\"retail_sale\"],\"category_menu\":[\"add-new\",\"all\"],\"client_menu\":[\"all\"],\"commitment_menu\":[\"add\",\"all\"],\"due_list_menu\":[\"cash\"],\"report_menu\":[\"purchase_report\",\"purchase_report_item\",\"sales_report\",\"sales_report_item\",\"income_report\",\"cost_report\",\"client_profit\",\"balance_report\"],\"privilege-menu\":[]}', '14'),
(3, '2019-09-14', 'user', '', '{\"category_menu\":[\"add-new\",\"all\"],\"subCategory_menu\":[\"add-new\",\"all\"],\"access_info\":[]}', '17'),
(4, '2019-09-16', 'admin', '', '{\"dashboard\":[\"todays_purchase\",\"todays_sale\",\"todays_due\",\"todays_total_paid\",\"bank_to_tt\",\"supplier_paid\",\"bank_withdraw\",\"client_collection\",\"bank_deposit\",\"total_due_collection\",\"todays_cost\",\"todays_income\"],\"category_menu\":[\"add-new\",\"all\"],\"subCategory_menu\":[\"add-new\",\"all\"],\"product_menu\":[\"add-new\",\"all\"],\"supplier-menu\":[\"add\",\"all\",\"all-transaction\"],\"client_menu\":[\"add\",\"all\",\"transaction\",\"all-transaction\"],\"purchase_menu\":[\"add-new\",\"all\",\"wise\",\"return\",\"all_return\"],\"raw_stock_menu\":[],\"sale_menu\":[\"retail\",\"hire\",\"all\",\"wise\"],\"income_menu\":[\"field\",\"new\",\"all\"],\"cost_menu\":[\"field\",\"new\",\"all\"],\"due_list_menu\":[\"cash\",\"credit\",\"supplier\"],\"bank_menu\":[\"add-bank\",\"add-new\",\"all-acc\",\"add\",\"ledger\"],\"ledger\":[\"company-ledger\",\"client-ledger\"],\"report_menu\":[\"purchase_report\",\"purchase_report_item\",\"sales_report\",\"sales_report_item\",\"income_report\",\"cost_report\",\"product_profit\",\"client_profit\",\"balance_report\"],\"complain_menu\":[\"new\",\"all\"],\"access_info\":[],\"privilege-menu\":[],\"theme_menu\":[\"logo\",\"tools\"],\"backup_menu\":[\"add-new\",\"all\"]}', '19'),
(5, '2019-09-21', 'admin', '', '{\"dashboard\":[\"todays_purchase\",\"todays_sale\",\"todays_due\",\"todays_total_paid\",\"bank_to_tt\",\"supplier_paid\",\"bank_withdraw\",\"client_collection\",\"bank_deposit\",\"total_due_collection\",\"todays_cost\",\"todays_income\"],\"category_menu\":[\"add-new\",\"all\"],\"subCategory_menu\":[\"add-new\",\"all\"],\"product_menu\":[\"add-new\",\"all\"],\"supplier-menu\":[\"add\",\"all\",\"transaction\",\"all-transaction\"],\"client_menu\":[\"add\",\"all\",\"transaction\",\"all-transaction\"],\"purchase_menu\":[\"add-new\",\"all\",\"wise\",\"return\",\"all_return\"],\"raw_stock_menu\":[],\"sale_menu\":[\"retail\",\"hire\",\"all\",\"wise\"],\"exchange_menu\":[\"add-new\",\"all\"],\"income_menu\":[\"field\",\"new\",\"all\"],\"cost_menu\":[\"field\",\"all_cost_category\",\"new\",\"all\"],\"due_list_menu\":[\"cash\",\"credit\",\"supplier\"],\"bank_menu\":[\"add-bank\",\"add-new\",\"all-acc\",\"add\",\"ledger\"],\"ledger\":[],\"report_menu\":[\"purchase_report\",\"purchase_report_item\",\"sales_report\",\"sales_report_item\",\"income_report\",\"cost_report\",\"product_profit\",\"client_profit\",\"balance_report\"],\"complain_menu\":[\"new\",\"all\"],\"access_info\":[],\"theme_menu\":[\"logo\",\"tools\"],\"backup_menu\":[\"add-new\",\"all\"]}', '4'),
(6, '2019-09-22', 'user', '', '{\"category_menu\":[\"add-new\"],\"subCategory_menu\":[\"add-new\"],\"product_menu\":[\"add-new\"],\"supplier-menu\":[\"add\"],\"client_menu\":[\"add\",\"all\",\"transaction\",\"all-transaction\"],\"raw_stock_menu\":[],\"exchange_menu\":[\"add-new\",\"all\"],\"cost_menu\":[\"new\",\"all\"]}', '5'),
(7, '2019-09-24', 'user', '', '{\"dashboard\":[\"todays_sale\",\"todays_cost\"],\"category_menu\":[\"add-new\",\"all\"],\"subCategory_menu\":[\"add-new\",\"all\"],\"client_menu\":[\"add\",\"transaction\"],\"purchase_menu\":[\"add-new\",\"all\"],\"sale_menu\":[\"retail\"],\"exchange_menu\":[\"add-new\",\"all\"],\"cost_menu\":[\"new\",\"all\"],\"due_list_menu\":[\"credit\",\"supplier\"],\"ledger\":[\"client-ledger\"],\"complain_menu\":[\"new\",\"all\"]}', '6'),
(8, '2019-09-25', 'admin', '', '{\"dashboard\":[\"todays_purchase\",\"todays_sale\",\"todays_due\",\"todays_total_paid\",\"bank_to_tt\",\"supplier_paid\",\"bank_withdraw\",\"client_collection\",\"bank_deposit\",\"total_due_collection\",\"todays_cost\",\"todays_income\"],\"category_menu\":[\"add-new\",\"all\"],\"subCategory_menu\":[\"add-new\",\"all\"],\"product_menu\":[\"add-new\",\"all\"],\"supplier-menu\":[\"add\",\"all\",\"transaction\",\"all-transaction\"],\"client_menu\":[\"add\",\"all\",\"transaction\",\"all-transaction\"],\"purchase_menu\":[\"add-new\",\"all\",\"wise\",\"return\",\"all_return\"],\"raw_stock_menu\":[],\"sale_menu\":[\"retail\",\"hire\",\"all\",\"wise\"],\"exchange_menu\":[\"add-new\",\"all\"],\"income_menu\":[\"field\",\"new\",\"all\"],\"cost_menu\":[\"field\",\"all_cost_category\",\"new\",\"all\"],\"due_list_menu\":[\"cash\",\"credit\",\"supplier\"],\"bank_menu\":[\"add-bank\",\"add-new\",\"all-acc\",\"add\",\"ledger\"],\"ledger\":[\"company-ledger\",\"client-ledger\"],\"report_menu\":[\"purchase_report\",\"purchase_report_item\",\"sales_report\",\"sales_report_item\",\"income_report\",\"cost_report\",\"product_profit\",\"client_profit\",\"balance_report\"],\"complain_menu\":[\"new\",\"all\"],\"access_info\":[],\"theme_menu\":[\"logo\",\"tools\"],\"backup_menu\":[\"add-new\",\"all\"]}', '7'),
(9, '2019-09-26', 'admin', '', '{\"dashboard\":[\"todays_purchase\",\"todays_sale\",\"todays_due\",\"todays_total_paid\",\"bank_to_tt\",\"supplier_paid\",\"bank_withdraw\",\"client_collection\",\"bank_deposit\",\"total_due_collection\",\"todays_cost\",\"todays_income\"],\"category_menu\":[\"add-new\",\"all\"],\"subCategory_menu\":[\"add-new\",\"all\"],\"product_menu\":[\"add-new\",\"all\"],\"supplier-menu\":[\"add\",\"all\",\"transaction\",\"all-transaction\"],\"client_menu\":[\"add\",\"all\",\"transaction\",\"all-transaction\"],\"purchase_menu\":[\"add-new\",\"all\",\"wise\",\"return\",\"all_return\"],\"raw_stock_menu\":[],\"sale_menu\":[\"retail\",\"hire\",\"all\",\"wise\"],\"exchange_menu\":[\"add-new\",\"all\"],\"income_menu\":[\"field\",\"new\",\"all\"],\"cost_menu\":[\"field\",\"all_cost_category\",\"new\",\"all\"],\"due_list_menu\":[\"cash\",\"credit\",\"supplier\"],\"bank_menu\":[\"add-bank\",\"add-new\",\"all-acc\",\"add\",\"ledger\"],\"ledger\":[\"company-ledger\",\"client-ledger\"],\"report_menu\":[\"purchase_report\",\"purchase_report_item\",\"sales_report\",\"sales_report_item\",\"income_report\",\"cost_report\",\"product_profit\",\"client_profit\",\"balance_report\"],\"complain_menu\":[\"new\",\"all\"],\"access_info\":[],\"privilege-menu\":[],\"theme_menu\":[\"logo\",\"tools\"]}', '8'),
(10, '2019-10-13', 'user', '', '{\"dashboard\":[\"todays_purchase\",\"todays_hire_sale\",\"todays_due\",\"todays_total_paid\",\"bank_to_tt\",\"supplier_paid\",\"bank_withdraw\",\"client_collection\",\"bank_deposit\",\"cash_to_tt\",\"todays_cost\",\"todays_income\",\"todays_installment_list\",\"todays_commitment_list\"],\"category_menu\":[\"add-new\",\"all\"],\"subCategory_menu\":[\"add-new\",\"all\"],\"brand_menu\":[\"add-new\",\"all\"],\"product_menu\":[\"add-new\",\"all\"],\"supplier-menu\":[\"add\",\"all\",\"transaction\",\"all-transaction\"],\"client_menu\":[\"add\",\"all\",\"transaction\",\"all-transaction\"],\"commitment_menu\":[\"add\",\"all\"],\"purchase_menu\":[\"add-new\",\"all\",\"wise\",\"return\",\"all_return\"],\"raw_stock_menu\":[],\"sale_menu\":[\"retail\",\"hire\",\"weekly\",\"dealer\",\"d_c\",\"all\",\"hire-all\",\"wise\",\"multi-return\",\"multi-return-all\"],\"income_menu\":[\"field\",\"new\",\"all\"],\"cost_menu\":[\"field\",\"all_cost_category\",\"new\",\"all\"],\"due_list_menu\":[\"cash\",\"credit\",\"supplier\"],\"bank_menu\":[\"add-bank\",\"add-new\",\"all-acc\",\"add\",\"ledger\"],\"ledger\":[\"company-ledger\",\"client-ledger\",\"customer-ledger\",\"dealer-ledger\"],\"report_menu\":[\"purchase_report\",\"purchase_report_item\",\"sales_report\",\"sales_report_item\",\"income_report\",\"cost_report\",\"product_profit\",\"client_profit\",\"balance_report\"],\"complain_menu\":[\"new\",\"all\"],\"access_info\":[],\"privilege-menu\":[],\"theme_menu\":[\"logo\",\"tools\"],\"backup_menu\":[\"add-new\",\"all\"]}', '9'),
(11, '2019-10-07', 'user', '', '{\"category_menu\":[\"add-new\",\"all\"],\"subCategory_menu\":[\"add-new\",\"all\"],\"brand_menu\":[\"add-new\",\"all\"],\"godown_menu\":[\"add-new\",\"all\"],\"product_menu\":[\"add-new\",\"all\"],\"sale_menu\":[\"retail\",\"hire\",\"d_c\",\"all\"],\"sms_menu\":[],\"complain_menu\":[\"new\",\"all\"]}', '10'),
(12, '2019-10-11', 'user', '', '{\"dashboard\":[\"todays_purchase\",\"todays_hire_sale\",\"todays_due\",\"todays_total_paid\",\"client_collection\"],\"product_menu\":[\"add-new\",\"all\"],\"supplier-menu\":[\"add\",\"transaction\",\"all-transaction\"],\"client_menu\":[\"add\",\"all\",\"transaction\",\"all-transaction\"],\"purchase_menu\":[\"add-new\",\"all\",\"return\"],\"raw_stock_menu\":[],\"sale_menu\":[\"retail\",\"hire\",\"all\"],\"income_menu\":[\"field\",\"new\",\"all\"],\"due_list_menu\":[\"credit\",\"supplier\"],\"ledger\":[\"client-ledger\"],\"report_menu\":[\"purchase_report\",\"sales_report\",\"income_report\",\"balance_report\"],\"complain_menu\":[\"new\",\"all\"],\"access_info\":[]}', '11'),
(13, '2019-10-06', 'user', '', '{\"dashboard\":[\"client_collection\"],\"commitment_menu\":[\"add\",\"all\"],\"due_list_menu\":[\"credit\",\"supplier\"],\"ledger\":[\"client-ledger\",\"customer-ledger\"],\"complain_menu\":[\"new\",\"all\"]}', '12'),
(14, '2019-10-27', 'admin', '', '{\"dashboard\":[\"todays_purchase\",\"todays_hire_sale\",\"todays_due\",\"todays_total_paid\",\"bank_to_tt\",\"supplier_paid\",\"bank_withdraw\",\"client_collection\",\"bank_deposit\",\"cash_to_tt\",\"todays_cost\",\"todays_income\",\"todays_installment_list\",\"todays_commitment_list\"],\"category_menu\":[\"add-new\",\"all\"],\"subCategory_menu\":[\"add-new\",\"all\"],\"brand_menu\":[\"add-new\",\"all\"],\"godown_menu\":[\"add-new\",\"all\"],\"product_menu\":[\"add-new\",\"all\"],\"supplier-menu\":[\"add\",\"all\",\"transaction\",\"all-transaction\"],\"client_menu\":[\"add\",\"all\",\"transaction\",\"all-transaction\"],\"commitment_menu\":[\"add\",\"all\"],\"purchase_menu\":[\"add-new\",\"all\",\"wise\",\"return\",\"all_return\"],\"raw_stock_menu\":[],\"sale_menu\":[\"retail\",\"hire\",\"weekly\",\"dealer\",\"d_c\",\"all\",\"hire-all\",\"wise\",\"client_search\",\"multi-return\",\"multi-return-all\"],\"income_menu\":[\"field\",\"new\",\"all\"],\"cost_menu\":[\"field\",\"all_cost_category\",\"new\",\"all\"],\"due_list_menu\":[\"cash\",\"credit\",\"supplier\"],\"bank_menu\":[\"add-bank\",\"add-new\",\"all-acc\",\"add\",\"ledger\"],\"loan-menu\":[\"add-new\",\"all\",\"trans\",\"all_trx\"],\"ledger\":[\"company-ledger\",\"client-ledger\",\"customer-ledger\",\"dealer-ledger\"],\"report_menu\":[\"purchase_report\",\"purchase_report_item\",\"sales_report\",\"sales_report_item\",\"income_report\",\"cost_report\",\"client_profit\",\"balance_report\"],\"sms_menu\":[\"send-sms\",\"custom-sms\",\"sms-report\"],\"complain_menu\":[\"new\",\"all\"],\"access_info\":[],\"privilege-menu\":[],\"theme_menu\":[\"logo\",\"tools\"],\"backup_menu\":[\"add-new\",\"all\"]}', '13'),
(15, '2019-10-10', 'user', '', '{\"dashboard\":[\"todays_hire_sale\",\"todays_due\",\"todays_total_paid\",\"todays_installment_list\",\"todays_commitment_list\"],\"client_menu\":[\"add\",\"all\",\"transaction\",\"all-transaction\"],\"commitment_menu\":[\"add\",\"all\"],\"purchase_menu\":[],\"raw_stock_menu\":[],\"sale_menu\":[\"retail\",\"hire\",\"dealer\",\"d_c\",\"all\",\"hire-all\"],\"cost_menu\":[\"field\",\"all_cost_category\",\"new\",\"all\"],\"due_list_menu\":[\"cash\",\"credit\"],\"ledger\":[\"client-ledger\",\"customer-ledger\",\"dealer-ledger\"],\"report_menu\":[\"sales_report\",\"income_report\",\"balance_report\"],\"complain_menu\":[\"new\",\"all\"]}', '15'),
(16, '2019-10-10', 'user', '', '{\"dashboard\":[\"todays_purchase\",\"todays_due\",\"todays_total_paid\",\"client_collection\",\"todays_installment_list\"],\"product_menu\":[\"add-new\",\"all\"],\"client_menu\":[\"add\",\"all\",\"transaction\",\"all-transaction\"],\"commitment_menu\":[\"add\",\"all\"],\"purchase_menu\":[\"add-new\",\"all\"],\"raw_stock_menu\":[],\"sale_menu\":[\"dealer\",\"d_c\",\"all\"],\"cost_menu\":[\"field\",\"all_cost_category\",\"new\",\"all\"],\"due_list_menu\":[\"cash\",\"credit\"],\"ledger\":[\"client-ledger\",\"dealer-ledger\"],\"report_menu\":[\"purchase_report\",\"purchase_report_item\",\"sales_report\"],\"complain_menu\":[\"new\",\"all\"]}', '16'),
(17, '2019-10-13', 'admin', '', '{\"dashboard\":[\"todays_purchase\",\"todays_hire_sale\",\"todays_due\",\"todays_total_paid\",\"bank_to_tt\",\"supplier_paid\",\"bank_withdraw\",\"client_collection\",\"bank_deposit\",\"cash_to_tt\",\"todays_cost\",\"todays_income\",\"todays_installment_list\",\"todays_commitment_list\"],\"category_menu\":[\"add-new\",\"all\"],\"subCategory_menu\":[\"add-new\",\"all\"],\"brand_menu\":[\"add-new\",\"all\"],\"product_menu\":[\"add-new\",\"all\"],\"supplier-menu\":[\"add\",\"all\",\"transaction\",\"all-transaction\"],\"client_menu\":[\"add\",\"all\",\"transaction\",\"all-transaction\"],\"commitment_menu\":[\"add\",\"all\"],\"purchase_menu\":[\"add-new\",\"all\",\"wise\",\"return\",\"all_return\"],\"raw_stock_menu\":[],\"sale_menu\":[\"retail\",\"hire\",\"weekly\",\"dealer\",\"d_c\",\"all\",\"hire-all\",\"wise\",\"multi-return\",\"multi-return-all\"],\"income_menu\":[\"field\",\"new\",\"all\"],\"cost_menu\":[\"field\",\"all_cost_category\",\"new\",\"all\"],\"due_list_menu\":[\"cash\",\"credit\",\"supplier\"],\"bank_menu\":[\"add-bank\",\"add-new\",\"all-acc\",\"add\",\"ledger\"],\"loan-menu\":[\"add-new\",\"all\",\"trans\",\"all_trx\"],\"ledger\":[\"company-ledger\",\"client-ledger\",\"customer-ledger\",\"dealer-ledger\"],\"report_menu\":[\"purchase_report\",\"purchase_report_item\",\"sales_report\",\"sales_report_item\",\"income_report\",\"cost_report\",\"product_profit\",\"client_profit\",\"balance_report\"],\"complain_menu\":[\"new\",\"all\"],\"privilege-menu\":[]}', '17'),
(18, '2019-10-19', 'user', '', '{\"dashboard\":[\"hire_sale\",\"weekly_sale\",\"todays_purchase\",\"todays_hire_sale\",\"todays_due\",\"todays_total_paid\",\"bank_to_tt\",\"supplier_paid\",\"bank_withdraw\",\"client_collection\",\"bank_deposit\",\"cash_to_tt\",\"todays_cost\",\"todays_income\",\"todays_installment_list\",\"todays_commitment_list\"],\"category_menu\":[\"add-new\",\"all\"],\"subCategory_menu\":[\"add-new\",\"all\"],\"brand_menu\":[\"add-new\",\"all\"],\"product_menu\":[\"add-new\",\"all\"],\"supplier-menu\":[\"add\",\"all\",\"transaction\",\"all-transaction\"],\"client_menu\":[\"add\",\"all\",\"transaction\",\"all-transaction\"],\"commitment_menu\":[\"add\",\"all\"],\"purchase_menu\":[\"add-new\",\"all\",\"return\",\"all_return\"],\"raw_stock_menu\":[],\"sale_menu\":[\"retail\",\"hire\",\"weekly\",\"dealer\",\"d_c\",\"all\",\"hire-all\",\"wise\",\"multi-return\",\"multi-return-all\"],\"income_menu\":[\"field\",\"new\",\"all\"],\"cost_menu\":[\"field\",\"all_cost_category\",\"new\",\"all\"],\"due_list_menu\":[\"cash\",\"credit\",\"supplier\"],\"bank_menu\":[\"add-bank\",\"add-new\",\"all-acc\",\"add\",\"ledger\"],\"ledger\":[\"company-ledger\",\"client-ledger\",\"customer-ledger\",\"dealer-ledger\"],\"report_menu\":[\"purchase_report\",\"purchase_report_item\",\"sales_report\",\"sales_report_item\",\"income_report\",\"cost_report\",\"client_profit\",\"balance_report\"],\"complain_menu\":[\"new\",\"all\"]}', '18'),
(19, '2019-10-24', 'admin', '', '{\"dashboard\":[\"purchase\",\"stock\",\"retail_sale\",\"hire_sale\",\"weekly_sale\",\"dealer_sale\",\"todays_purchase\",\"todays_hire_sale\",\"todays_due\",\"todays_total_paid\",\"bank_to_tt\",\"supplier_paid\",\"bank_withdraw\",\"client_collection\",\"bank_deposit\",\"cash_to_tt\",\"todays_cost\",\"todays_income\",\"todays_installment_list\",\"todays_commitment_list\"],\"category_menu\":[\"add-new\",\"all\"],\"subCategory_menu\":[\"add-new\",\"all\"],\"brand_menu\":[\"add-new\",\"all\"],\"godown_menu\":[\"add-new\",\"all\"],\"product_menu\":[\"add-new\",\"all\"],\"supplier-menu\":[\"add\",\"all\",\"transaction\",\"all-transaction\"],\"client_menu\":[\"add\",\"all\",\"transaction\",\"all-transaction\"],\"commitment_menu\":[\"add\",\"all\"],\"purchase_menu\":[\"add-new\",\"all\",\"wise\",\"return\",\"all_return\"],\"raw_stock_menu\":[],\"sale_menu\":[\"retail\",\"hire\",\"weekly\",\"dealer\",\"d_c\",\"all\",\"hire-all\",\"wise\",\"multi-return\",\"multi-return-all\"],\"income_menu\":[\"field\",\"new\",\"all\"],\"cost_menu\":[\"field\",\"all_cost_category\",\"new\",\"all\"],\"due_list_menu\":[\"cash\",\"credit\",\"supplier\"],\"bank_menu\":[\"add-bank\",\"add-new\",\"all-acc\",\"add\",\"ledger\"],\"loan-menu\":[\"add-new\",\"all\",\"trans\",\"all_trx\"],\"ledger\":[\"company-ledger\",\"client-ledger\",\"customer-ledger\",\"dealer-ledger\"],\"report_menu\":[\"purchase_report\",\"purchase_report_item\",\"sales_report\",\"sales_report_item\",\"income_report\",\"cost_report\",\"client_profit\",\"balance_report\"],\"sms_menu\":[\"send-sms\",\"custom-sms\",\"sms-report\"],\"complain_menu\":[\"new\",\"all\"]}', '20'),
(20, '2019-10-24', 'user', '', '{\"dashboard\":[\"purchase\",\"stock\",\"retail_sale\",\"hire_sale\",\"weekly_sale\",\"dealer_sale\",\"todays_purchase\",\"todays_hire_sale\",\"todays_due\",\"todays_total_paid\",\"bank_to_tt\",\"supplier_paid\",\"bank_withdraw\",\"client_collection\",\"bank_deposit\",\"cash_to_tt\",\"todays_cost\",\"todays_income\",\"todays_installment_list\",\"todays_commitment_list\"],\"category_menu\":[\"add-new\",\"all\"],\"subCategory_menu\":[\"add-new\",\"all\"],\"brand_menu\":[\"add-new\",\"all\"],\"godown_menu\":[\"add-new\",\"all\"],\"product_menu\":[\"add-new\",\"all\"],\"supplier-menu\":[\"add\",\"all\",\"transaction\",\"all-transaction\"],\"client_menu\":[\"add\",\"all\",\"transaction\",\"all-transaction\"],\"commitment_menu\":[\"add\",\"all\"],\"purchase_menu\":[\"add-new\",\"all\",\"wise\",\"return\",\"all_return\"],\"raw_stock_menu\":[],\"sale_menu\":[\"retail\",\"hire\",\"weekly\",\"dealer\",\"d_c\",\"all\",\"hire-all\",\"wise\",\"multi-return\",\"multi-return-all\"],\"income_menu\":[\"field\",\"new\",\"all\"],\"cost_menu\":[\"field\",\"all_cost_category\",\"new\",\"all\"],\"due_list_menu\":[\"cash\",\"credit\",\"supplier\"],\"bank_menu\":[\"add-bank\",\"add-new\",\"all-acc\",\"add\",\"ledger\"],\"loan-menu\":[\"add-new\",\"all\",\"trans\",\"all_trx\"],\"ledger\":[\"company-ledger\",\"client-ledger\",\"customer-ledger\",\"dealer-ledger\"],\"report_menu\":[\"purchase_report\",\"purchase_report_item\",\"sales_report\",\"sales_report_item\",\"income_report\",\"cost_report\",\"client_profit\",\"balance_report\"],\"sms_menu\":[\"send-sms\",\"custom-sms\",\"sms-report\"],\"complain_menu\":[\"new\",\"all\"]}', '20'),
(21, '2019-10-24', 'user', '', '{\"dashboard\":[\"purchase\",\"stock\",\"retail_sale\",\"hire_sale\",\"weekly_sale\",\"dealer_sale\",\"todays_purchase\",\"todays_hire_sale\",\"todays_due\",\"todays_total_paid\",\"bank_to_tt\",\"supplier_paid\",\"bank_withdraw\",\"client_collection\",\"bank_deposit\",\"cash_to_tt\",\"todays_cost\",\"todays_income\",\"todays_installment_list\",\"todays_commitment_list\"],\"category_menu\":[\"add-new\",\"all\"],\"subCategory_menu\":[\"add-new\",\"all\"],\"brand_menu\":[\"add-new\",\"all\"],\"godown_menu\":[\"add-new\",\"all\"],\"product_menu\":[\"add-new\",\"all\"],\"supplier-menu\":[\"add\",\"all\",\"transaction\",\"all-transaction\"],\"client_menu\":[\"add\",\"all\",\"transaction\",\"all-transaction\"],\"commitment_menu\":[\"add\",\"all\"],\"purchase_menu\":[\"add-new\",\"all\",\"wise\",\"return\",\"all_return\"],\"raw_stock_menu\":[],\"sale_menu\":[\"retail\",\"hire\",\"weekly\",\"dealer\",\"d_c\",\"all\",\"hire-all\",\"wise\",\"multi-return\",\"multi-return-all\"],\"income_menu\":[\"field\",\"new\",\"all\"],\"cost_menu\":[\"field\",\"all_cost_category\",\"new\",\"all\"],\"due_list_menu\":[\"cash\",\"credit\",\"supplier\"],\"bank_menu\":[\"add-bank\",\"add-new\",\"all-acc\",\"add\",\"ledger\"],\"loan-menu\":[\"add-new\",\"all\",\"trans\",\"all_trx\"],\"ledger\":[\"company-ledger\",\"client-ledger\",\"customer-ledger\",\"dealer-ledger\"],\"report_menu\":[\"purchase_report\",\"purchase_report_item\",\"sales_report\",\"sales_report_item\",\"income_report\",\"cost_report\",\"client_profit\",\"balance_report\"],\"sms_menu\":[\"send-sms\",\"custom-sms\",\"sms-report\"],\"complain_menu\":[\"new\",\"all\"]}', '19'),
(22, '2019-10-26', 'user', '', '{\"client_menu\":[\"add\"]}', '21'),
(23, '2019-11-03', 'user', '', '{\"dashboard\":[\"purchase\",\"stock\",\"dealer_sale\",\"todays_purchase\",\"todays_due\",\"todays_total_paid\",\"todays_installment_list\",\"todays_commitment_list\"],\"product_menu\":[\"add-new\",\"all\"],\"client_menu\":[\"add\",\"all\",\"transaction\",\"all-transaction\"],\"commitment_menu\":[\"add\",\"all\"],\"purchase_menu\":[\"add-new\",\"all\",\"wise\",\"return\",\"all_return\"],\"raw_stock_menu\":[],\"sale_menu\":[\"dealer\",\"d_c\",\"all\",\"wise\"],\"cost_menu\":[\"field\",\"all_cost_category\",\"new\",\"all\"],\"due_list_menu\":[\"cash\",\"credit\",\"supplier\"],\"ledger\":[\"company-ledger\",\"dealer-ledger\"],\"report_menu\":[\"purchase_report\",\"purchase_report_item\",\"sales_report\",\"sales_report_item\",\"income_report\",\"cost_report\",\"client_profit\",\"balance_report\"]}', '22'),
(24, '2019-11-04', 'user', '', '{\"dashboard\":[\"purchase\",\"stock\",\"retail_sale\",\"dealer_sale\",\"todays_purchase\",\"todays_due\",\"todays_total_paid\",\"client_collection\",\"todays_installment_list\"],\"product_menu\":[\"add-new\",\"all\"],\"client_menu\":[\"add\",\"transaction\",\"all-transaction\"],\"commitment_menu\":[\"add\",\"all\"],\"purchase_menu\":[\"add-new\",\"all\"],\"raw_stock_menu\":[],\"sale_menu\":[\"retail\",\"dealer\",\"d_c\",\"all\"],\"due_list_menu\":[\"credit\"],\"ledger\":[\"customer-ledger\",\"dealer-ledger\"],\"report_menu\":[\"purchase_report\",\"sales_report\",\"balance_report\"],\"complain_menu\":[\"new\",\"all\"]}', '23'),
(25, '2019-11-13', 'user', '', '{\"dashboard\":[\"purchase\",\"stock\",\"dealer_sale\",\"todays_purchase\",\"todays_due\"],\"product_menu\":[\"add-new\"],\"supplier-menu\":[\"transaction\",\"all-transaction\"],\"client_menu\":[\"add\",\"all\",\"transaction\",\"all-transaction\"],\"commitment_menu\":[\"add\",\"all\"],\"purchase_menu\":[\"add-new\",\"all\"],\"raw_stock_menu\":[],\"sale_menu\":[\"dealer\",\"d_c\",\"all\"],\"due_list_menu\":[\"credit\",\"supplier\"],\"ledger\":[\"dealer-ledger\"],\"report_menu\":[\"purchase_report\",\"sales_report\",\"balance_report\"],\"complain_menu\":[\"new\",\"all\"]}', '24'),
(26, '2019-11-14', 'user', '', '{\"dashboard\":[\"purchase\",\"stock\",\"retail_sale\",\"hire_sale\",\"weekly_sale\",\"dealer_sale\"],\"product_menu\":[\"add-new\",\"all\"],\"client_menu\":[\"add\",\"all\",\"transaction\",\"all-transaction\"],\"commitment_menu\":[\"add\",\"all\"],\"purchase_menu\":[\"add-new\",\"all\",\"return\"],\"raw_stock_menu\":[],\"sale_menu\":[\"retail\",\"hire\",\"weekly\",\"dealer\",\"d_c\",\"all\",\"hire-all\",\"multi-return\",\"multi-return-all\"],\"income_menu\":[\"field\",\"new\",\"all\"],\"cost_menu\":[\"field\",\"all_cost_category\",\"new\",\"all\"],\"due_list_menu\":[\"cash\",\"credit\",\"supplier\"],\"ledger\":[\"company-ledger\",\"client-ledger\",\"customer-ledger\",\"dealer-ledger\"],\"complain_menu\":[\"new\",\"all\"]}', '25'),
(27, '2019-12-08', 'user', '', '{\"dashboard\":[\"purchase\",\"stock\",\"retail_sale\",\"hire_sale\",\"weekly_sale\",\"todays_hire_sale\",\"todays_due\",\"todays_total_paid\",\"client_collection\",\"todays_installment_list\",\"todays_commitment_list\"],\"client_menu\":[\"add\",\"all\",\"transaction\",\"all-transaction\"],\"commitment_menu\":[\"add\",\"all\"],\"raw_stock_menu\":[],\"sale_menu\":[\"retail\",\"hire\",\"weekly\",\"all\",\"hire-all\",\"multi-return\",\"multi-return-all\"],\"income_menu\":[\"field\",\"new\",\"all\"],\"cost_menu\":[\"all_cost_category\",\"field\",\"new\",\"all\"],\"due_list_menu\":[\"cash\",\"credit\"],\"bank_menu\":[\"add-bank\",\"add-new\",\"all-acc\",\"add\",\"ledger\"],\"ledger\":[\"customer-ledger\"],\"report_menu\":[\"sales_report\",\"sales_report_item\",\"income_report\",\"cost_report\",\"balance_report\"],\"complain_menu\":[\"new\",\"all\"]}', '26'),
(28, '2020-01-13', 'user', '', '{\"commitment_menu\":[\"add\",\"all\"]}', '28'),
(29, '2019-12-28', 'user', '', '{\"client_menu\":[\"add\",\"transaction\"],\"commitment_menu\":[\"add\",\"all\"],\"raw_stock_menu\":[],\"sale_menu\":[\"dealer\",\"d_c\"],\"due_list_menu\":[\"cash\",\"credit\"],\"ledger\":[\"dealer-ledger\"],\"report_menu\":[\"sales_report\",\"balance_report\"],\"complain_menu\":[\"new\",\"all\"]}', '29'),
(30, '2020-07-03', 'user', '', '{\"dashboard\":[\"stock\",\"retail_sale\",\"hire_sale\",\"dealer_sale\",\"todays_hire_sale\",\"todays_due\",\"todays_total_paid\",\"bank_to_tt\",\"client_collection\",\"cash_to_tt\",\"todays_installment_list\",\"todays_commitment_list\"],\"product_menu\":[\"add-new\",\"all\"],\"supplier-menu\":[\"transaction\",\"all-transaction\"],\"client_menu\":[\"add\",\"all\",\"transaction\",\"all-transaction\"],\"commitment_menu\":[\"add\",\"all\"],\"purchase_menu\":[\"add-new\",\"all\",\"wise\",\"return\",\"all_return\"],\"raw_stock_menu\":[],\"raw_stock_menu_date\":[],\"sale_menu\":[\"retail\",\"hire\",\"weekly\",\"dealer\",\"d_c\",\"all\",\"hire-all\",\"multi-return\",\"multi-return-all\"],\"income_menu\":[\"field\",\"new\"],\"cost_menu\":[\"new\",\"all\"],\"due_list_menu\":[\"cash\",\"credit\"],\"bank_menu\":[\"add\",\"ledger\"],\"ledger\":[\"company-ledger\",\"customer-ledger\",\"dealer-ledger\"],\"report_menu\":[\"purchase_report\",\"purchase_report_item\",\"sales_report\",\"sales_report_item\",\"income_report\",\"cost_report\",\"client_profit\",\"balance_report\"],\"complain_menu\":[\"new\",\"all\"],\"access_info\":[]}', '30'),
(31, '2020-08-10', 'user', '', '{\"dashboard\":[\"retail_sale\",\"hire_sale\",\"weekly_sale\"],\"client_menu\":[\"add\",\"transaction\"],\"commitment_menu\":[\"add\",\"all\"],\"purchase_menu\":[\"add-new\"],\"sale_menu\":[\"retail\",\"hire\",\"weekly\",\"dealer\",\"d_c\"],\"cost_menu\":[\"new\"],\"due_list_menu\":[\"credit\"],\"bank_menu\":[\"add\"],\"ledger\":[\"customer-ledger\"],\"report_menu\":[\"balance_report\"],\"complain_menu\":[\"new\",\"all\"]}', '31'),
(32, '2019-12-31', 'user', '', '{\"dashboard\":[\"purchase\",\"stock\",\"retail_sale\",\"hire_sale\",\"weekly_sale\",\"dealer_sale\",\"todays_due\",\"todays_total_paid\",\"todays_installment_list\"],\"product_menu\":[\"add-new\"],\"client_menu\":[\"add\",\"all\",\"transaction\",\"all-transaction\"],\"commitment_menu\":[\"add\"],\"purchase_menu\":[\"add-new\",\"all\"],\"raw_stock_menu\":[],\"sale_menu\":[\"retail\",\"hire\"],\"cost_menu\":[\"new\",\"all\"],\"due_list_menu\":[\"cash\",\"credit\"],\"ledger\":[\"customer-ledger\"],\"report_menu\":[\"balance_report\"]}', '32'),
(33, '2020-02-15', 'user', '', '{\"dashboard\":[\"retail_sale\",\"hire_sale\",\"dealer_sale\",\"todays_installment_list\",\"todays_commitment_list\"],\"client_menu\":[\"add\",\"transaction\"],\"commitment_menu\":[\"add\",\"all\"],\"raw_stock_menu\":[],\"sale_menu\":[\"retail\",\"hire\",\"dealer\",\"d_c\"],\"cost_menu\":[\"new\"],\"due_list_menu\":[\"cash\",\"credit\"],\"bank_menu\":[\"add\",\"ledger\"],\"ledger\":[\"customer-ledger\",\"dealer-ledger\"],\"report_menu\":[\"sales_report\",\"balance_report\"]}', '33'),
(34, '2020-06-06', 'user', '', '{\"category_menu\":[\"add-new\",\"all\"],\"subCategory_menu\":[\"add-new\",\"all\"],\"brand_menu\":[\"add-new\",\"all\"],\"godown_menu\":[\"add-new\",\"all\"],\"product_menu\":[\"add-new\",\"all\"],\"supplier-menu\":[\"add\",\"all\",\"transaction\",\"all-transaction\"],\"client_menu\":[\"add\",\"all\",\"transaction\",\"all-transaction\"],\"commitment_menu\":[\"add\",\"all\"],\"purchase_menu\":[\"add-new\",\"all\",\"wise\",\"return\",\"all_return\"],\"raw_stock_menu\":[],\"raw_stock_menu_date\":[],\"sale_menu\":[\"retail\",\"hire\",\"weekly\",\"dealer\",\"d_c\",\"all\",\"hire-all\",\"wise\",\"client_search\",\"multi-return\",\"multi-return-all\"],\"income_menu\":[\"field\",\"new\",\"all\"],\"cost_menu\":[\"all_cost_category\",\"field\",\"new\",\"all\"],\"due_list_menu\":[\"cash\",\"credit\",\"supplier\"],\"bank_menu\":[\"add-bank\",\"add-new\",\"all-acc\",\"add\",\"ledger\"],\"loan-menu\":[\"add-new\",\"all\",\"trans\",\"all_trx\"],\"ledger\":[\"company-ledger\",\"client-ledger\",\"customer-ledger\",\"dealer-ledger\"],\"report_menu\":[\"purchase_report\",\"purchase_report_item\",\"sales_report\",\"sales_report_item\",\"income_report\",\"cost_report\",\"client_profit\",\"balance_report\"],\"sms_menu\":[\"send-sms\",\"custom-sms\",\"sms-report\"],\"complain_menu\":[\"new\",\"all\"],\"access_info\":[],\"theme_menu\":[],\"backup_menu\":[\"add-new\",\"all\"]}', '34'),
(35, '2020-01-07', 'user', '', '{\"dashboard\":[\"client_collection\",\"todays_installment_list\",\"todays_commitment_list\"],\"client_menu\":[\"transaction\"],\"commitment_menu\":[\"add\",\"all\"],\"report_menu\":[\"balance_report\"]}', '35'),
(36, '2020-07-31', 'user', '', '{\"dashboard\":[\"stock\",\"retail_sale\",\"hire_sale\",\"todays_hire_sale\",\"todays_total_paid\",\"client_collection\",\"todays_installment_list\",\"todays_commitment_list\"],\"supplier-menu\":[\"transaction\",\"all-transaction\"],\"client_menu\":[\"add\",\"all\",\"transaction\",\"all-transaction\"],\"commitment_menu\":[\"add\",\"all\"],\"purchase_menu\":[\"add-new\",\"all\",\"return\",\"all_return\"],\"raw_stock_menu\":[],\"sale_menu\":[\"retail\",\"hire\",\"dealer\",\"all\",\"hire-all\",\"multi-return\",\"multi-return-all\"],\"cost_menu\":[\"all_cost_category\",\"field\",\"new\",\"all\"],\"due_list_menu\":[\"cash\",\"credit\"],\"bank_menu\":[\"add\",\"ledger\"],\"ledger\":[\"customer-ledger\"],\"report_menu\":[\"purchase_report\",\"sales_report\",\"cost_report\",\"balance_report\"],\"complain_menu\":[\"new\",\"all\"]}', '36'),
(37, '2020-01-13', 'user', '', '{\"commitment_menu\":[\"add\",\"all\"]}', '37'),
(38, '2020-01-13', 'user', '', '{\"commitment_menu\":[\"add\",\"all\"]}', '38'),
(39, '2020-01-20', 'user', '', '{\"commitment_menu\":[\"add\",\"all\"]}', '39'),
(40, '2020-03-06', 'user', '', '{\"client_menu\":[\"add\",\"transaction\"],\"sale_menu\":[\"retail\",\"hire\"]}', '40'),
(41, '2020-06-19', 'user', '', '{\"dashboard\":[\"weekly_sale\"],\"client_menu\":[\"transaction\",\"all-transaction\"],\"commitment_menu\":[\"add\",\"all\"],\"due_list_menu\":[\"credit\"]}', '41'),
(42, '2020-05-19', 'user', '', '{\"due_list_menu\":[\"credit\"]}', '42'),
(43, '2020-06-01', 'user', '', '{\"dashboard\":[\"stock\",\"retail_sale\",\"hire_sale\",\"client_collection\"],\"client_menu\":[\"add\",\"transaction\"],\"commitment_menu\":[\"add\",\"all\"],\"purchase_menu\":[\"add-new\"],\"raw_stock_menu\":[],\"raw_stock_menu_date\":[],\"sale_menu\":[\"retail\",\"hire\",\"weekly\"],\"cost_menu\":[\"new\"],\"due_list_menu\":[\"cash\",\"credit\"],\"report_menu\":[\"purchase_report\",\"sales_report\",\"cost_report\",\"balance_report\"],\"complain_menu\":[\"new\",\"all\"]}', '43'),
(44, '2020-05-31', 'user', '', '{\"commitment_menu\":[\"add\",\"all\"]}', '44'),
(45, '2020-06-17', 'user', '', '{\"dashboard\":[\"purchase\",\"stock\",\"retail_sale\",\"hire_sale\",\"weekly_sale\",\"todays_hire_sale\",\"todays_due\",\"todays_total_paid\",\"bank_to_tt\",\"bank_withdraw\",\"client_collection\",\"bank_deposit\",\"todays_installment_list\",\"todays_commitment_list\"],\"product_menu\":[\"add-new\",\"all\"],\"client_menu\":[\"add\",\"all\",\"transaction\",\"all-transaction\"],\"commitment_menu\":[\"add\",\"all\"],\"purchase_menu\":[\"add-new\",\"all\",\"return\",\"all_return\"],\"raw_stock_menu\":[],\"raw_stock_menu_date\":[],\"sale_menu\":[\"retail\",\"hire\",\"weekly\",\"dealer\",\"all\",\"hire-all\",\"multi-return\",\"multi-return-all\"],\"cost_menu\":[\"new\",\"all\"],\"due_list_menu\":[\"cash\",\"credit\"],\"bank_menu\":[\"add-bank\",\"add-new\",\"all-acc\",\"add\",\"ledger\"],\"ledger\":[\"company-ledger\",\"client-ledger\",\"customer-ledger\",\"dealer-ledger\"],\"report_menu\":[\"purchase_report\",\"sales_report\",\"cost_report\",\"balance_report\"],\"complain_menu\":[\"new\",\"all\"]}', '45'),
(46, '2020-06-15', 'user', '', '{\"dashboard\":[\"stock\",\"weekly_sale\"],\"client_menu\":[\"add\",\"all\",\"transaction\",\"all-transaction\"],\"commitment_menu\":[\"add\",\"all\"],\"raw_stock_menu\":[],\"sale_menu\":[\"weekly\",\"all\",\"hire-all\"],\"cost_menu\":[\"new\",\"all\"],\"due_list_menu\":[\"credit\"],\"ledger\":[\"client-ledger\",\"customer-ledger\"],\"report_menu\":[\"sales_report\",\"balance_report\"]}', '46'),
(47, '2020-07-20', 'user', '', '{\"dashboard\":[\"purchase\",\"stock\",\"retail_sale\",\"hire_sale\",\"todays_hire_sale\",\"todays_due\",\"todays_total_paid\",\"bank_withdraw\",\"client_collection\",\"bank_deposit\",\"todays_cost\",\"todays_installment_list\",\"todays_commitment_list\"],\"supplier-menu\":[\"transaction\"],\"client_menu\":[\"add\",\"all\",\"transaction\",\"all-transaction\"],\"purchase_menu\":[\"add-new\"],\"sale_menu\":[\"retail\",\"hire\"],\"cost_menu\":[\"new\"],\"due_list_menu\":[\"cash\",\"credit\"],\"bank_menu\":[\"add-bank\",\"add-new\",\"all-acc\",\"add\"],\"ledger\":[\"client-ledger\",\"customer-ledger\"],\"report_menu\":[\"balance_report\"]}', '47'),
(48, '2020-06-19', 'admin', '', '{\"dashboard\":[\"retail_sale\",\"hire_sale\"],\"client_menu\":[\"add\",\"all\",\"transaction\",\"all-transaction\"],\"sale_menu\":[\"retail\",\"hire\",\"dealer\",\"d_c\",\"all\",\"hire-all\"]}', '48'),
(49, '2020-07-01', 'user', '', '{\"dashboard\":[\"retail_sale\",\"dealer_sale\"],\"category_menu\":[\"add-new\",\"all\"],\"subCategory_menu\":[\"add-new\",\"all\"],\"product_menu\":[\"add-new\",\"all\"],\"supplier-menu\":[\"add\",\"all\",\"transaction\",\"all-transaction\"],\"client_menu\":[\"add\",\"all\",\"transaction\",\"all-transaction\"],\"purchase_menu\":[\"add-new\",\"all\"],\"raw_stock_menu\":[],\"sale_menu\":[\"retail\",\"dealer\"],\"cost_menu\":[\"new\",\"all\"],\"due_list_menu\":[\"cash\",\"credit\"],\"bank_menu\":[],\"ledger\":[\"dealer-ledger\"],\"report_menu\":[\"balance_report\"]}', '49'),
(50, '2020-07-10', 'user', '', '{\"dashboard\":[\"retail_sale\",\"hire_sale\",\"weekly_sale\",\"todays_due\",\"todays_total_paid\",\"client_collection\",\"bank_deposit\",\"todays_cost\",\"todays_installment_list\",\"todays_commitment_list\"],\"client_menu\":[\"add\",\"all\",\"transaction\",\"all-transaction\"],\"commitment_menu\":[\"add\",\"all\"],\"purchase_menu\":[\"add-new\",\"all\",\"wise\"],\"raw_stock_menu\":[],\"raw_stock_menu_date\":[],\"sale_menu\":[\"retail\",\"hire\",\"weekly\",\"all\",\"hire-all\",\"multi-return\",\"multi-return-all\"],\"cost_menu\":[\"new\",\"all\"],\"due_list_menu\":[\"cash\",\"credit\"],\"bank_menu\":[\"add\",\"ledger\"],\"ledger\":[\"client-ledger\",\"customer-ledger\"],\"report_menu\":[\"purchase_report\",\"purchase_report_item\",\"sales_report\",\"sales_report_item\",\"cost_report\",\"balance_report\"],\"complain_menu\":[\"new\",\"all\"]}', '50'),
(51, '2020-07-24', 'user', '', '{\"dashboard\":[\"stock\"],\"category_menu\":[\"add-new\",\"all\"],\"subCategory_menu\":[\"add-new\",\"all\"],\"brand_menu\":[\"add-new\",\"all\"],\"product_menu\":[\"add-new\",\"all\"],\"supplier-menu\":[\"add\",\"all\",\"transaction\",\"all-transaction\"],\"client_menu\":[\"add\",\"all\",\"transaction\",\"all-transaction\"],\"commitment_menu\":[\"add\",\"all\"],\"purchase_menu\":[\"add-new\",\"all\",\"wise\",\"return\",\"all_return\"],\"raw_stock_menu\":[],\"sale_menu\":[\"dealer\",\"all\",\"multi-return\",\"multi-return-all\"],\"cost_menu\":[\"all_cost_category\",\"field\",\"new\",\"all\"],\"bank_menu\":[\"add-bank\",\"add-new\",\"all-acc\",\"add\",\"ledger\"],\"report_menu\":[\"balance_report\"],\"complain_menu\":[\"new\",\"all\"]}', '51'),
(52, '2020-10-24', 'admin', '', '{\"dashboard\":[\"purchase\",\"stock\",\"retail_sale\",\"hire_sale\",\"weekly_sale\",\"dealer_sale\",\"todays_purchase\",\"todays_hire_sale\",\"todays_due\",\"todays_total_paid\",\"bank_to_tt\",\"supplier_paid\",\"bank_withdraw\",\"client_collection\",\"bank_deposit\",\"cash_to_tt\",\"todays_cost\",\"todays_income\",\"todays_installment_list\",\"todays_commitment_list\"],\"category_menu\":[\"add-new\",\"all\"],\"subCategory_menu\":[\"add-new\",\"all\"],\"brand_menu\":[\"add-new\",\"all\"],\"product_menu\":[\"add-new\",\"all\"],\"supplier-menu\":[\"add\",\"all\",\"transaction\",\"all-transaction\"],\"zone_menu\":[\"add-new\",\"all\"],\"client_menu\":[\"add\",\"all\",\"transaction\",\"all-transaction\"],\"commitment_menu\":[\"add\",\"all\"],\"purchase_menu\":[\"add-new\",\"all\",\"wise\",\"return\",\"all_return\"],\"raw_stock_menu\":[],\"raw_stock_menu_date\":[],\"sale_menu\":[\"retail\",\"dealer\",\"d_c\",\"all\",\"wise\",\"client_search\",\"multi-return\",\"multi-return-all\"],\"income_menu\":[\"field\",\"new\",\"all\"],\"cost_menu\":[\"all_cost_category\",\"field\",\"new\",\"all\"],\"due_list_menu\":[\"cash\",\"credit\",\"supplier\"],\"bank_menu\":[\"add-bank\",\"add-new\",\"all-acc\",\"add\",\"ledger\"],\"ledger\":[\"company-ledger\",\"client-ledger\",\"customer-ledger\",\"dealer-ledger\"],\"report_menu\":[\"purchase_report\",\"sales_report\",\"income_report\",\"cost_report\",\"product_profit\",\"sale_profit\",\"balance_report\"],\"sms_menu\":[\"send-sms\",\"custom-sms\",\"sms-report\"],\"complain_menu\":[\"new\",\"all\"],\"access_info\":[],\"privilege-menu\":[],\"theme_menu\":[\"logo\",\"tools\"],\"backup_menu\":[\"add-new\"]}', '52'),
(53, '2020-09-29', 'user', '', '{\"dashboard\":[\"todays_purchase\",\"todays_hire_sale\",\"todays_due\",\"todays_total_paid\",\"supplier_paid\"],\"client_menu\":[\"add\",\"all\",\"transaction\",\"all-transaction\"],\"purchase_menu\":[\"add-new\",\"all\",\"wise\",\"return\",\"all_return\"],\"raw_stock_menu\":[],\"sale_menu\":[\"retail\",\"hire\",\"weekly\",\"dealer\",\"all\",\"hire-all\",\"wise\",\"client_search\",\"multi-return\",\"multi-return-all\"]}', '53'),
(54, '2020-10-03', 'user', '', '{\"dashboard\":[\"stock\",\"retail_sale\",\"dealer_sale\",\"client_collection\",\"todays_cost\"],\"sale_menu\":[\"retail\",\"dealer\",\"d_c\",\"multi-return\"],\"cost_menu\":[]}', '54'),
(55, '2020-12-09', 'admin', '', '{\"dashboard\":[\"purchase\",\"stock\",\"retail_sale\",\"hire_sale\",\"weekly_sale\",\"dealer_sale\",\"todays_purchase\",\"todays_hire_sale\",\"todays_due\",\"todays_total_paid\",\"bank_to_tt\",\"supplier_paid\",\"bank_withdraw\",\"client_collection\",\"bank_deposit\",\"cash_to_tt\",\"todays_cost\",\"todays_income\",\"todays_installment_list\",\"todays_commitment_list\"],\"category_menu\":[\"add-new\",\"all\"],\"subCategory_menu\":[\"add-new\",\"all\"],\"brand_menu\":[\"add-new\",\"all\"],\"product_menu\":[\"add-new\",\"all\"],\"supplier-menu\":[\"add\",\"all\",\"transaction\",\"all-transaction\"],\"zone_menu\":[\"add-new\",\"all\"],\"client_menu\":[\"add\",\"all\",\"transaction\",\"all-transaction\"],\"commitment_menu\":[\"add\",\"all\"],\"purchase_menu\":[\"add-new\",\"all\",\"wise\",\"return\",\"all_return\"],\"raw_stock_menu\":[],\"sale_menu\":[\"retail\",\"dealer\",\"d_c\",\"all\",\"wise\",\"client_search\",\"multi-return\",\"multi-return-all\"],\"income_menu\":[\"field\",\"new\",\"all\"],\"cost_menu\":[\"all_cost_category\",\"field\",\"new\",\"all\"],\"due_list_menu\":[\"cash\",\"credit\",\"supplier\"],\"bank_menu\":[\"add-bank\",\"add-new\",\"all-acc\",\"add\",\"ledger\"],\"loan-menu\":[\"add-new\",\"all\",\"trans\",\"all_trx\"],\"ledger\":[\"company-ledger\",\"client-ledger\",\"customer-ledger\",\"dealer-ledger\"],\"report_menu\":[\"purchase_report\",\"sales_report\",\"income_report\",\"cost_report\",\"product_profit\",\"sale_profit\",\"balance_report\"],\"sms_menu\":[\"send-sms\",\"custom-sms\",\"sms-report\"],\"complain_menu\":[\"new\",\"all\"],\"access_info\":[],\"privilege-menu\":[],\"theme_menu\":[\"logo\",\"tools\"],\"backup_menu\":[\"add-new\"]}', '55'),
(56, '2020-12-12', 'user', '', '{\"dashboard\":[\"retail_sale\",\"dealer_sale\",\"todays_hire_sale\",\"todays_due\",\"todays_total_paid\",\"client_collection\",\"todays_cost\"],\"client_menu\":[\"add\",\"all\",\"transaction\"],\"sale_menu\":[\"retail\",\"dealer\",\"d_c\",\"client_search\"],\"cost_menu\":[\"all_cost_category\",\"field\",\"new\",\"all\"],\"due_list_menu\":[\"cash\",\"credit\"],\"sms_menu\":[\"send-sms\",\"custom-sms\",\"sms-report\"],\"complain_menu\":[\"new\",\"all\"]}', '56'),
(57, '2021-01-02', 'user', '', '{\"dashboard\":[\"retail_sale\",\"dealer_sale\",\"todays_hire_sale\",\"todays_due\",\"todays_total_paid\",\"client_collection\",\"todays_cost\"],\"zone_menu\":[\"all\"],\"client_menu\":[\"add\",\"all\",\"transaction\",\"all-transaction\"],\"sale_menu\":[\"retail\",\"dealer\",\"d_c\"],\"cost_menu\":[\"all_cost_category\",\"field\",\"new\",\"all\"],\"due_list_menu\":[\"cash\",\"credit\"],\"sms_menu\":[\"send-sms\",\"custom-sms\",\"sms-report\"],\"complain_menu\":[\"new\",\"all\"],\"backup_menu\":[\"add-new\",\"all\"]}', '57'),
(58, '2021-02-14', 'admin', '', '{\"dashboard\":[\"purchase\",\"stock\",\"retail_sale\",\"dealer_sale\",\"todays_purchase\",\"todays_hire_sale\",\"todays_due\",\"todays_total_paid\",\"bank_to_tt\",\"supplier_paid\",\"bank_withdraw\",\"client_collection\",\"bank_deposit\",\"cash_to_tt\",\"todays_cost\",\"todays_income\",\"todays_commitment_list\"],\"category_menu\":[\"add-new\",\"all\"],\"subCategory_menu\":[\"add-new\",\"all\"],\"brand_menu\":[\"add-new\",\"all\"],\"product_menu\":[\"add-new\",\"all\"],\"party_menu\":[\"create\",\"list\",\"transaction-create\",\"transaction-list\"],\"zone_menu\":[\"add-new\",\"all\"],\"commitment_menu\":[\"add\",\"all\"],\"purchase_menu\":[\"add-new\",\"all\",\"wise\",\"return\",\"all_return\"],\"raw_stock_menu\":[],\"sale_menu\":[\"retail\",\"dealer\",\"d_c\",\"all\",\"wise\",\"client_search\",\"multi-return\",\"multi-return-all\"],\"income_menu\":[\"field\",\"new\",\"all\"],\"cost_menu\":[\"all_cost_category\",\"field\",\"new\",\"all\"],\"due_list_menu\":[\"cash\",\"credit\",\"supplier\"],\"bank_menu\":[\"add-bank\",\"add-new\",\"all-acc\",\"add\",\"ledger\"],\"loan-menu\":[\"add-new\",\"all\",\"trans\",\"all_trx\"],\"party-ledger\":[],\"report_menu\":[\"purchase_report\",\"sales_report\",\"income_report\",\"product_profit\",\"sale_profit\",\"balance_report\"],\"sms_menu\":[\"send-sms\",\"custom-sms\",\"sms-report\"],\"complain_menu\":[\"new\",\"all\"],\"access_info\":[],\"privilege-menu\":[],\"theme_menu\":[\"logo\",\"tools\"],\"backup_menu\":[\"add-new\"]}', '59');

-- --------------------------------------------------------

--
-- Table structure for table `production`
--

CREATE TABLE `production` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `batch_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `raw_material` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `raw_unit` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `raw_quantity` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `finish_product` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `finish_unit` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'available',
  `trash` tinyint(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_model` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `product_cat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subcategory` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `brand` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `purchase_price` decimal(10,2) NOT NULL,
  `sale_price` decimal(10,2) NOT NULL,
  `retail_sale_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `dealer_sale_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `unit` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_model`, `product_code`, `product_cat`, `subcategory`, `brand`, `purchase_price`, `sale_price`, `retail_sale_price`, `dealer_sale_price`, `unit`, `status`) VALUES
(2, 'Return Product', 'Return Product', '0002', 'na', 'Na', 'Na', 80.00, 90.00, 0.00, 0.00, 'Pcs', 'available'),
(3, 'ret prd 2', 'ret prd 2', '0003', 'na', 'Na', 'Na', 30.00, 50.00, 0.00, 0.00, 'Pcs', 'available'),
(4, 'HPD-200', 'HPD-200', '0004', 'battery', 'HPD', 'HAMKO', 18250.00, 0.00, 21180.00, 18100.00, 'Pcs', 'available'),
(5, 'Test-20', 'Test-20', '0005', 'na', 'OLD_BATTERY', 'ORIGINAL', 10.00, 11.00, 13.00, 19.00, 'Pcs', 'available'),
(6, 'Old NS40ZL', 'Old NS40ZL', '0006', 'old_battery', 'PP', 'Na', 0.00, 0.00, 0.00, 0.00, 'Pcs', 'available'),
(7, 'HPD-165', 'HPD-165', '0007', 'battery', 'HPD', 'HAMKO', 15750.00, 0.00, 18260.00, 15750.00, 'Pcs', 'available'),
(8, 'HPD-130', 'HPD-130', '0008', 'battery', 'HPD', 'HAMKO', 13000.00, 0.00, 15085.00, 13000.00, 'Pcs', 'available'),
(9, 'HPD-100', 'HPD-100', '0009', 'battery', 'HPD', 'HAMKO', 10135.00, 0.00, 11765.00, 10135.00, 'Pcs', 'available'),
(10, 'HPD-180', 'HPD-180', '0010', 'battery', 'HPD', 'HAMKO', 17060.00, 0.00, 19780.00, 17060.00, 'Pcs', 'available'),
(11, 'HPD-215', 'HPD-215', '0011', 'battery', 'HPD', 'HAMKO', 20400.00, 0.00, 23585.00, 20400.00, 'Pcs', 'available'),
(12, 'HPD-80', 'HPD-80', '0012', 'battery', 'HPD', 'HAMKO', 8500.00, 0.00, 9875.00, 8500.00, 'Pcs', 'available'),
(13, 'HPD-200T(24M)', 'HPD-200T(24M)', '0013', 'battery', 'HPD', 'HAMKO', 19000.00, 0.00, 22500.00, 19000.00, 'Pcs', 'available'),
(14, 'PCV-15', 'PCV-15', '0014', 'battery', 'PCV', 'HAMKO', 8200.00, 0.00, 9860.00, 8200.00, 'Pcs', 'available'),
(15, 'PCV-17', 'PCV-17', '0015', 'battery', 'PCV', 'HAMKO', 8950.00, 0.00, 10765.00, 8950.00, 'Pcs', 'available'),
(16, 'PCV-21', 'PCV-21', '0016', 'battery', 'PCV', 'HAMKO', 10925.00, 0.00, 13110.00, 10925.00, 'Pcs', 'available'),
(17, 'PCV-27', 'PCV-27', '0017', 'battery', 'PCV', 'HAMKO', 13575.00, 0.00, 16240.00, 13575.00, 'Pcs', 'available'),
(18, 'PCV-29', 'PCV-29', '0018', 'battery', 'PCV', 'HAMKO', 14975.00, 0.00, 17805.00, 14975.00, 'Pcs', 'available'),
(19, 'PCV-31', 'PCV-31', '0019', 'battery', 'PCV', 'HAMKO', 16400.00, 0.00, 19660.00, 16400.00, 'Pcs', 'available'),
(20, 'NS40ZL', 'NS40ZL', '0020', 'battery', 'PP', 'HAMKO', 3525.00, 0.00, 3800.00, 3525.00, 'Pcs', 'available'),
(21, 'NS60L', 'NS60L', '0021', 'battery', 'PP', 'HAMKO', 4950.00, 0.00, 7005.00, 4950.00, 'Pcs', 'available'),
(22, 'N50', 'N50', '0022', 'battery', 'PP', 'HAMKO', 5825.00, 0.00, 8160.00, 5825.00, 'Pcs', 'available'),
(23, 'N50ZL', 'N50ZL', '0023', 'battery', 'PP', 'HAMKO', 6530.00, 0.00, 9215.00, 6530.00, 'Pcs', 'available'),
(24, 'N65', 'N65', '0024', 'battery', 'PP', 'HAMKO', 6500.00, 0.00, 9145.00, 6500.00, 'Pcs', 'available'),
(25, 'N65L', 'N65L', '0025', 'battery', 'PP', 'HAMKO', 6600.00, 0.00, 9145.00, 6600.00, 'Pcs', 'available'),
(26, 'NS70/L', 'NS70/L', '0026', 'battery', 'PP', 'HAMKO', 7125.00, 0.00, 9995.00, 7125.00, 'Pcs', 'available'),
(27, 'N70', 'N70', '0027', 'battery', 'PP', 'HAMKO', 7650.00, 0.00, 10745.00, 7650.00, 'Pcs', 'available'),
(28, 'N70Z/L', 'N70Z/L', '0028', 'battery', 'PP', 'HAMKO', 8225.00, 0.00, 11490.00, 8225.00, 'Pcs', 'available'),
(29, 'NX120-7/L', 'NX120-7/L', '0029', 'battery', 'PP', 'HAMKO', 8240.00, 0.00, 11560.00, 8240.00, 'Pcs', 'available'),
(30, 'N80', 'N80', '0030', 'battery', 'PP', 'HAMKO', 7950.00, 0.00, 11150.00, 7950.00, 'Pcs', 'available'),
(31, 'N100(SUPER DC-18M)', 'N100(SUPER DC-18M)', '0031', 'battery', 'SUPER_DC(18M)', 'HAMKO', 10230.00, 0.00, 13195.00, 10230.00, 'Pcs', 'available'),
(32, 'N100Z(SUPER DC-18M)', 'N100Z(SUPER DC-18M)', '0032', 'battery', 'SUPER_DC(18M)', 'HAMKO', 10770.00, 0.00, 13890.00, 10770.00, 'Pcs', 'available'),
(33, 'N120(SUPER DC-18M)', 'N120(SUPER DC-18M)', '0033', 'battery', 'SUPER_DC(18M)', 'HAMKO', 13240.00, 0.00, 17075.00, 13240.00, 'Pcs', 'available'),
(34, 'N150(SUPER DC-18M)', 'N150(SUPER DC-18M)', '0034', 'battery', 'SUPER_DC(18M)', 'HAMKO', 15590.00, 0.00, 20110.00, 15590.00, 'Pcs', 'available'),
(35, 'N175(SUPER DC-18M)', 'N175(SUPER DC-18M)', '0035', 'battery', 'SUPER_DC(18M)', 'HAMKO', 16960.00, 0.00, 21870.00, 16960.00, 'Pcs', 'available'),
(36, 'N200S(SUPER DC-18M)', 'N200S(SUPER DC-18M)', '0036', 'battery', 'SUPER_DC(18M)', 'HAMKO', 16200.00, 0.00, 20895.00, 16200.00, 'Pcs', 'available'),
(37, 'N200(SUPER DC-18M)', 'N200(SUPER DC-18M)', '0037', 'battery', 'SUPER_DC(18M)', 'HAMKO', 18080.00, 0.00, 23325.00, 18080.00, 'Pcs', 'available'),
(38, 'DIN-55(15M)', 'DIN-55(15M)', '0038', 'battery', 'MEGA_POWER(15_M)', 'HAMKO', 7275.00, 0.00, 9215.00, 7275.00, 'Pcs', 'available'),
(39, 'DIN-66(15M)', 'DIN-66(15M)', '0039', 'battery', 'MEGA_POWER(15_M)', 'HAMKO', 8185.00, 0.00, 10480.00, 8185.00, 'Pcs', 'available'),
(40, 'DIN-88(15M)', 'DIN-88(15M)', '0040', 'battery', 'SUPER_DC(18M)', 'HAMKO', 10735.00, 0.00, 13760.00, 10735.00, 'Pcs', 'available'),
(41, 'N100(15M)', 'N100(15M)', '0041', 'battery', 'MEGA_POWER(15_M)', 'HAMKO', 9970.00, 0.00, 12845.00, 9970.00, 'Pcs', 'available'),
(42, 'N100Z(15M)', 'N100Z(15M)', '0042', 'battery', 'MEGA_POWER(15_M)', 'HAMKO', 10460.00, 0.00, 13475.00, 10460.00, 'Pcs', 'available'),
(43, 'N120(15M)', 'N120(15M)', '0043', 'battery', 'MEGA_POWER(15_M)', 'HAMKO', 12250.00, 0.00, 15780.00, 12250.00, 'Pcs', 'available'),
(44, 'N150(15M)', 'N150(15M)', '0044', 'battery', 'MEGA_POWER(15_M)', 'HAMKO', 14450.00, 0.00, 18620.00, 14450.00, 'Pcs', 'available'),
(45, 'N200S(15M)', 'N200S(15M)', '0045', 'battery', 'MEGA_POWER(15_M)', 'HAMKO', 15790.00, 0.00, 20360.00, 15790.00, 'Pcs', 'available'),
(46, 'N200(15M)', 'N200(15M)', '0046', 'battery', 'MEGA_POWER(15_M)', 'HAMKO', 16820.00, 0.00, 21685.00, 16820.00, 'Pcs', 'available'),
(47, 'NS60L-MF(18M)', 'NS60L-MF(18M)', '0047', 'battery', 'SILVA', 'HAMKO', 6225.00, 0.00, 8030.00, 6225.00, 'Pcs', 'available'),
(48, 'N50ZL-MF(18M)', 'N50ZL-MF(18M)', '0048', 'battery', 'SILVA', 'HAMKO', 8420.00, 0.00, 10860.00, 6225.00, 'Pcs', 'available'),
(49, 'NS70/L-MF(18M)', 'NS70/L-MF(18M)', '0049', 'battery', 'SILVA', 'HAMKO', 8475.00, 0.00, 10930.00, 8475.00, 'Pcs', 'available'),
(50, 'N70Z/L-MF(18M)', 'N70Z/L-MF(18M)', '0050', 'battery', 'SILVA', 'HAMKO', 9060.00, 0.00, 11690.00, 9060.00, 'Pcs', 'available'),
(51, 'NX120-7/L-MF(18M)', 'NX120-7/L-MF(18M)', '0051', 'battery', 'SILVA', 'HAMKO', 9600.00, 0.00, 12385.00, 9600.00, 'Pcs', 'available'),
(52, 'NS60L-MF(24M)', 'NS60L-MF(24M)', '0052', 'battery', 'SILVA', 'HAMKO', 6825.00, 0.00, 8805.00, 6825.00, 'Pcs', 'available'),
(53, 'NS50Z-MF(24M)', 'NS50Z-MF(24M)', '0053', 'battery', 'SILVA', 'HAMKO', 9325.00, 0.00, 12030.00, 9325.00, 'Pcs', 'available'),
(54, 'NS70/L-MF(24M)', 'NS70/L-MF(24M)', '0054', 'battery', 'SILVA', 'HAMKO', 9425.00, 0.00, 12160.00, 9425.00, 'Pcs', 'available'),
(55, 'NX120-7/L-MF(24M)', 'NX120-7/L-MF(24M)', '0055', 'battery', 'SILVA', 'HAMKO', 10725.00, 0.00, 13835.00, 10725.00, 'Pcs', 'available'),
(56, 'NS60L-MF', 'NS60L-MF', '0056', 'battery', 'TinCaGreen', 'HAMKO', 5350.00, 0.00, 6900.00, 5350.00, 'Pcs', 'available'),
(57, 'N50ZL-MF', 'N50ZL-MF', '0057', 'battery', 'TinCaGreen', 'HAMKO', 6990.00, 0.00, 9020.00, 6990.00, 'Pcs', 'available'),
(58, 'NS70/L-MF', 'NS70/L-MF', '0058', 'battery', 'TinCaGreen', 'HAMKO', 7550.00, 0.00, 9740.00, 7550.00, 'Pcs', 'available'),
(59, 'NX120-7/L-MF', 'NX120-7/L-MF', '0059', 'battery', 'TinCaGreen', 'HAMKO', 8575.00, 0.00, 11060.00, 8575.00, 'Pcs', 'available'),
(60, '12N9-4B CONVENTIONAL', '12N9-4B CONVENTIONAL', '0060', 'battery', 'MC', 'HAMKO', 1400.00, 0.00, 1490.00, 1400.00, 'Pcs', 'available'),
(61, '12N7-4B CONVENTIONAL', '12N7-4B CONVENTIONAL', '0061', 'battery', 'MC', 'HAMKO', 1300.00, 0.00, 1385.00, 1300.00, 'Pcs', 'available'),
(62, '12N5-3B CONVENTIONAL', '12N5-3B CONVENTIONAL', '0062', 'battery', 'MC', 'HAMKO', 1060.00, 0.00, 1130.00, 1060.00, 'Pcs', 'available'),
(63, '12YB 2.5LC CONVENTIONAL', '12YB 2.5LC CONVENTIONAL', '0063', 'battery', 'MC', 'HAMKO', 650.00, 0.00, 690.00, 650.00, 'Pcs', 'available'),
(64, '12N9-4B SMF', '12N9-4B SMF', '0064', 'battery', 'MC', 'HAMKO', 1600.00, 0.00, 1650.00, 1600.00, 'Pcs', 'available'),
(65, '12N7-4B SMF', '12N7-4B SMF', '0065', 'battery', 'MC', 'HAMKO', 1375.00, 0.00, 1400.00, 1375.00, 'Pcs', 'available'),
(66, '12N6.5-3B SMF', '12N6.5-3B SMF', '0066', 'battery', 'MC', 'HAMKO', 1250.00, 0.00, 1300.00, 1250.00, 'Pcs', 'available'),
(67, '12N5-3B SMF', '12N5-3B SMF', '0067', 'battery', 'MC', 'HAMKO', 1100.00, 0.00, 1200.00, 1100.00, 'Pcs', 'available'),
(68, '12N5-3B L-BS SMF', '12N5-3B L-BS SMF', '0068', 'battery', 'MC', 'HAMKO', 1200.00, 0.00, 1300.00, 1200.00, 'Pcs', 'available'),
(69, '12N4-3B SMF', '12N4-3B SMF', '0069', 'battery', 'MC', 'HAMKO', 1000.00, 0.00, 1200.00, 1000.00, 'Pcs', 'available'),
(70, '12YB 2.5LC SMF', '12YB 2.5LC SMF', '0070', 'battery', 'MC', 'HAMKO', 700.00, 0.00, 750.00, 700.00, 'Pcs', 'available'),
(71, '6N4-2A', '6N4-2A', '0071', 'battery', 'MC', 'HAMKO', 425.00, 0.00, 500.00, 425.00, 'Pcs', 'available'),
(72, 'EV-200', 'EV-200', '0072', 'battery', 'EASY_BIKE', 'HAMKO', 11250.00, 0.00, 10800.00, 11250.00, 'Pcs', 'available'),
(73, '6.DG.TR-160', '6.DG.TR-160', '0073', 'battery', '6.DG.TR', 'POWER_BANK', 8000.00, 0.00, 8500.00, 8000.00, 'Pcs', 'available'),
(74, '6.DG.TR-230', '6.DG.TR-230', '0074', 'battery', '6.DG.TR', 'POWER_BANK', 9050.00, 0.00, 9000.00, 9050.00, 'Pcs', 'available'),
(75, '6.DG.TR-250', '6.DG.TR-250', '0075', 'battery', 'EASY_BIKE', 'POWER_BANK', 11180.00, 0.00, 10800.00, 11180.00, 'Pcs', 'available'),
(76, '6.DG.TR-160', '6.DG.TR-160', '0076', 'battery', '6.DG.TR', 'EVER_STAR', 8000.00, 0.00, 8000.00, 8000.00, 'Pcs', 'available'),
(77, '6.DG.TR-230', '6.DG.TR-230', '0077', 'battery', '6.DG.TR', 'EVER_STAR', 9050.00, 0.00, 9000.00, 9050.00, 'Pcs', 'available'),
(78, '6.DG.TR-250', '6.DG.TR-250', '0078', 'battery', 'EASY_BIKE', 'EVER_STAR', 11180.00, 0.00, 10800.00, 11180.00, 'Pcs', 'available'),
(79, 'HPD-15', 'HPD-15', '0079', 'battery', 'SOLAR_BATTERY', 'HAMKO', 2600.00, 0.00, 2700.00, 2600.00, 'Pcs', 'available'),
(80, 'HPD-20T', 'HPD-20T', '0080', 'battery', 'SOLAR_BATTERY', 'HAMKO', 3100.00, 0.00, 3300.00, 3100.00, 'Pcs', 'available'),
(81, 'HPD-30T', 'HPD-30T', '0081', 'battery', 'SOLAR_BATTERY', 'HAMKO', 3430.00, 0.00, 3600.00, 3430.00, 'Pcs', 'available'),
(82, 'HPD-40T', 'HPD-40T', '0082', 'battery', 'SOLAR_BATTERY', 'HAMKO', 5100.00, 0.00, 5500.00, 5100.00, 'Pcs', 'available'),
(83, 'HPD-55T', 'HPD-55T', '0083', 'battery', 'SOLAR_BATTERY', 'HAMKO', 6600.00, 0.00, 6800.00, 6600.00, 'Pcs', 'available'),
(84, 'HPD-80T', 'HPD-80T', '0084', 'battery', 'SOLAR_BATTERY', 'HAMKO', 8600.00, 0.00, 9000.00, 8600.00, 'Pcs', 'available'),
(85, 'HPD-100T', 'HPD-100T', '0085', 'battery', 'SOLAR_BATTERY', 'HAMKO', 10700.00, 0.00, 11000.00, 10700.00, 'Pcs', 'available'),
(86, 'HPD-130T', 'HPD-130T', '0086', 'battery', 'SOLAR_BATTERY', 'HAMKO', 14000.00, 0.00, 15000.00, 14000.00, 'Pcs', 'available'),
(87, '5 LTR', '5 LTR', '0087', 'dm_water', 'DM_WATER', 'HAMKO', 65.00, 0.00, 100.00, 67.00, 'Pcs', 'available'),
(88, '2 LTR', '2 LTR', '0088', 'dm_water', 'DM_WATER', 'HAMKO', 35.00, 0.00, 45.00, 37.00, 'Pcs', 'available'),
(89, '1 LTR', '1 LTR', '0089', 'dm_water', 'DM_WATER', 'HAMKO', 18.00, 0.00, 25.00, 20.00, 'Pcs', 'available'),
(90, 'HAMKO IPS 400VA', 'HAMKO IPS 400VA', '0090', 'ips', 'COMBO', 'HAMKO', 6200.00, 0.00, 6500.00, 6200.00, 'Pcs', 'available'),
(91, 'HAMKO IPS 600 VA', 'HAMKO IPS 600 VA', '0091', 'ips', 'COMBO', 'HAMKO', 7550.00, 0.00, 8500.00, 7550.00, 'Pcs', 'available'),
(92, 'HAMKO IPS 800 VA', 'HAMKO IPS 800 VA', '0092', 'ips', 'COMBO', 'HAMKO', 9000.00, 0.00, 10500.00, 9000.00, 'Pcs', 'available'),
(93, 'HAMKO IPS 1000 VA', 'HAMKO IPS 1000 VA', '0093', 'ips', 'COMBO', 'HAMKO', 10800.00, 0.00, 12500.00, 10800.00, 'Pcs', 'available'),
(94, 'HAMKO IPS 1500 VA', 'HAMKO IPS 1500 VA', '0094', 'ips', 'COMBO', 'HAMKO', 15100.00, 0.00, 18500.00, 15500.00, 'Pcs', 'available'),
(95, 'HAMKO IPS1000 VA COMBO Z', 'HAMKO IPS1000 VA COMBO Z', '0095', 'ips', 'COMBO_Z', 'HAMKO', 10600.00, 0.00, 12500.00, 10800.00, 'Pcs', 'available'),
(96, 'HAMKO IPS 400VA COMBO Z', 'HAMKO IPS 400VA COMBO Z', '0096', 'ips', 'COMBO_Z', 'HAMKO', 6200.00, 0.00, 6500.00, 6200.00, 'Pcs', 'available'),
(97, 'HAMKO IPS 600 VA COMBO Z', 'HAMKO IPS 600 VA COMBO Z', '0097', 'ips', 'COMBO_Z', 'HAMKO', 7550.00, 0.00, 8500.00, 7550.00, 'Pcs', 'available'),
(98, 'HAMKO IPS 800 VA COMBO Z', 'HAMKO IPS 800 VA COMBO Z', '0098', 'ips', 'COMBO_Z', 'HAMKO', 9000.00, 0.00, 10500.00, 9000.00, 'Pcs', 'available'),
(99, 'HAMKO IPS 1500 VA COMBO Z', 'HAMKO IPS 1500 VA COMBO Z', '0099', 'ips', 'COMBO_Z', 'HAMKO', 15100.00, 0.00, 18500.00, 15500.00, 'Pcs', 'available'),
(100, 'HAMKO IPS 2000 VA', 'HAMKO IPS 2000 VA', '0100', 'ips', 'COMBO_Z', 'HAMKO', 22600.00, 0.00, 28000.00, 22600.00, 'Pcs', 'available'),
(101, 'HAMKO IPS 3000 VA', 'HAMKO IPS 3000 VA', '0101', 'ips', 'COMBO_Z', 'HAMKO', 31100.00, 0.00, 35000.00, 31100.00, 'Pcs', 'available'),
(102, ' ULLASH 1000 VA', ' ULLASH 1000 VA', '0102', 'ips', 'ULLASH', 'ULLASH', 7200.00, 0.00, 9500.00, 7600.00, 'Pcs', 'available'),
(103, 'LUMINOUS 1050 VA', 'LUMINOUS 1050 VA', '0103', 'ips', 'LUMINOUS', 'LUMINOUS', 6200.00, 0.00, 7500.00, 6500.00, 'Pcs', 'available'),
(104, 'LUMINOUS 650 VA', 'LUMINOUS 650 VA', '0104', 'ips', 'LUMINOUS', 'LUMINOUS', 4800.00, 0.00, 6000.00, 5200.00, 'Pcs', 'available'),
(105, 'OLD 40ZL', 'OLD 40ZL', '0105', 'battery', 'OLD_BATTERY', 'Na', 0.00, 0.00, 0.00, 0.00, 'KG', 'available'),
(106, 'OLD NS60L', 'OLD NS60L', '0106', 'battery', 'OLD_BATTERY', 'Na', 0.00, 0.00, 0.00, 0.00, 'KG', 'available'),
(107, 'OLD 50ZL', 'OLD 50ZL', '0107', 'battery', 'OLD_BATTERY', 'Na', 0.00, 0.00, 0.00, 0.00, 'KG', 'available'),
(108, 'OLD NS70', 'OLD NS70', '0108', 'battery', 'OLD_BATTERY', 'Na', 0.00, 0.00, 0.00, 0.00, 'KG', 'available'),
(109, 'OLD 70/NX120-7', 'OLD 70/NX120-7', '0109', 'battery', 'OLD_BATTERY', 'Na', 0.00, 0.00, 0.00, 0.00, 'KG', 'available'),
(110, 'OLD-17/100', 'OLD-17/100', '0110', 'battery', 'OLD_BATTERY', 'Na', 0.00, 0.00, 0.00, 0.00, 'KG', 'available'),
(111, 'OLD-21/130/120', 'OLD-21/130/120', '0111', 'battery', 'OLD_BATTERY', 'Na', 0.00, 0.00, 0.00, 0.00, 'KG', 'available'),
(112, 'OLD 27/165/150', 'OLD 27/165/150', '0112', 'battery', 'OLD_BATTERY', 'Na', 0.00, 0.00, 0.00, 0.00, 'KG', 'available'),
(113, 'OLD-29/200', 'OLD-29/200', '0113', 'battery', 'OLD_BATTERY', 'Na', 0.00, 0.00, 0.00, 0.00, 'KG', 'available'),
(114, 'DC FAN', 'DC FAN', '0114', 'solar_accessories', 'DC_FAN', 'HAMKO', 1000.00, 0.00, 1200.00, 1050.00, 'Pcs', 'available'),
(115, 'test 100', 'test 100', '0115', 'na', 'DC_FAN', 'VOLVO', 1000.00, 1200.00, 1150.00, 1100.00, 'Pcs', 'available'),
(116, 'Battery Charge', 'Battery Charge', '0116', 'na', 'Na', 'Na', 0.00, 0.00, 0.00, 0.00, 'Pcs', 'available'),
(117, 'Ips Service	', 'Ips Service	', '0117', 'na', 'Na', 'Na', 0.00, 0.00, 0.00, 0.00, 'Pcs', 'available'),
(118, 'lubricant 20w-50 20ltr', 'lubricant 20w-50 20ltr', '0118', 'lubricant', '20w-50', 'ESSENZA', 5200.00, 5500.00, 5500.00, 5200.00, 'Pcs', 'available'),
(119, '1000 VA', '1000 VA', '0119', 'ips', 'GH_POWER', 'GH_POWER', 7500.00, 12500.00, 12500.00, 8500.00, 'Pcs', 'available'),
(120, 'GH POWER 1000VA', 'GH POWER 1000VA', '0120', 'ips', 'GH_POWER', 'GH_POWER', 7500.00, 12500.00, 12500.00, 8500.00, 'Pcs', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_return`
--

CREATE TABLE `purchase_return` (
  `id` int(11) NOT NULL,
  `voucher_no` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `party_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `product_code` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `product_model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_serial` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantity` int(10) NOT NULL,
  `unit` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `purchase_price` decimal(10,2) NOT NULL,
  `previous_balance` decimal(10,2) NOT NULL,
  `grand_total` decimal(10,2) NOT NULL,
  `current_balance` decimal(10,2) NOT NULL,
  `godown_code` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(11) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `purchase_return`
--

INSERT INTO `purchase_return` (`id`, `voucher_no`, `date`, `party_code`, `product_code`, `product_model`, `product_serial`, `quantity`, `unit`, `purchase_price`, `previous_balance`, `grand_total`, `current_balance`, `godown_code`, `status`) VALUES
(1, '00001', '2021-02-14', 'MBS00002', '0121', 'Product 1', NULL, 5, 'Watt', 712.50, 82678.75, 4203.75, 78475.00, '0016', 'purchase re'),
(2, '00001', '2021-02-14', 'MBS00002', '0122', 'Product 2', NULL, 3, 'Set', 213.75, 82678.75, 4203.75, 78475.00, '0016', 'purchase re');

-- --------------------------------------------------------

--
-- Table structure for table `recharge_sms`
--

CREATE TABLE `recharge_sms` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `amount` varchar(192) COLLATE utf8_unicode_ci NOT NULL,
  `sms` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `recharge_sms`
--

INSERT INTO `recharge_sms` (`id`, `date`, `amount`, `sms`) VALUES
(1, '2021-01-12', '5000', '10000');

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

CREATE TABLE `rent` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `godown_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `year` year(4) NOT NULL,
  `month` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `received_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remark` longtext COLLATE utf8_unicode_ci NOT NULL,
  `field` longtext COLLATE utf8_unicode_ci NOT NULL,
  `trash` int(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salary_records`
--

CREATE TABLE `salary_records` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `year` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `month` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `eid` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `fields` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `amounts` decimal(10,2) NOT NULL,
  `bonus_amount` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `paid` decimal(10,2) NOT NULL,
  `remarks` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(45) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salary_structure`
--

CREATE TABLE `salary_structure` (
  `id` int(10) UNSIGNED NOT NULL,
  `eid` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `basic` decimal(10,2) NOT NULL,
  `incentive` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no',
  `deduction` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no',
  `bonus` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sale_return`
--

CREATE TABLE `sale_return` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `voucher_no` varchar(252) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(252) COLLATE utf8_unicode_ci NOT NULL,
  `client_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `previous_balance` decimal(8,2) NOT NULL,
  `current_balance` decimal(8,2) NOT NULL,
  `product_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `godown_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` varchar(252) COLLATE utf8_unicode_ci NOT NULL,
  `totalQty` decimal(8,2) NOT NULL,
  `product_price` decimal(8,2) NOT NULL,
  `return_price` decimal(8,2) NOT NULL,
  `total_return` decimal(8,2) NOT NULL,
  `return_amount` decimal(10,2) NOT NULL,
  `return_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `balance_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trash` int(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sale_return`
--

INSERT INTO `sale_return` (`id`, `date`, `voucher_no`, `code`, `client_code`, `previous_balance`, `current_balance`, `product_code`, `product_model`, `godown_code`, `quantity`, `totalQty`, `product_price`, `return_price`, `total_return`, `return_amount`, `return_type`, `balance_type`, `trash`) VALUES
(1, '2021-02-14', '210200001', '', 'MBD00001', 8385.00, 4635.00, '0121', 'Product 1', '0016', '5', 5.00, 750.00, 3750.00, 3750.00, 0.00, 'product_wise', 'Receivable', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sapitems`
--

CREATE TABLE `sapitems` (
  `id` int(11) UNSIGNED NOT NULL,
  `sap_at` date NOT NULL,
  `voucher_no` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `product_code` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `product_model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_serial` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `purchase_commission` decimal(10,2) NOT NULL,
  `quantity` int(11) UNSIGNED NOT NULL,
  `return_quantity_kg` double(10,2) NOT NULL,
  `unit` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `purchase_price` decimal(10,2) NOT NULL,
  `sale_price` decimal(10,2) NOT NULL,
  `retail_sale_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `dealer_sale_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `discount_percentage` decimal(10,2) NOT NULL COMMENT 'commission_percentage',
  `discount` decimal(10,2) NOT NULL COMMENT 'discount = commission',
  `godown_code` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `remark` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `sap_type` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Sale type = credit or cash',
  `status` varchar(45) COLLATE utf8_unicode_ci NOT NULL COMMENT 'sale or purchase',
  `trash` tinyint(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sapmeta`
--

CREATE TABLE `sapmeta` (
  `id` int(11) UNSIGNED NOT NULL,
  `voucher_no` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `meta_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_value` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `trash` tinyint(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `saprecords`
--

CREATE TABLE `saprecords` (
  `id` int(11) UNSIGNED NOT NULL,
  `sap_at` date NOT NULL,
  `change_at` date NOT NULL,
  `voucher_no` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `party_code` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `address` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `godown_code` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `total_quantity` int(10) NOT NULL,
  `total_bill` decimal(10,2) NOT NULL COMMENT 'total_bill = subtotal - total_discount + transport_cost',
  `total_return` decimal(10,2) NOT NULL,
  `transport_cost` decimal(10,2) NOT NULL,
  `commission_percentage` decimal(10,2) NOT NULL,
  `total_discount` decimal(10,2) NOT NULL,
  `party_balance` decimal(10,2) NOT NULL COMMENT 'positive balance => Receivable and negative balance => Payable',
  `paid` decimal(10,2) NOT NULL,
  `due` decimal(10,2) NOT NULL,
  `hire_price` decimal(10,2) NOT NULL COMMENT 'Only for Hire Sale',
  `promise_date` date NOT NULL,
  `remission` decimal(10,2) NOT NULL,
  `method` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `remark` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `sap_type` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Sale type = credit or cash',
  `status` varchar(45) COLLATE utf8_unicode_ci NOT NULL COMMENT 'sale or purchase',
  `due_status` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `installment_type` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `installment_day` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `installment_no` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `installment_amount` decimal(10,2) NOT NULL,
  `installment_date` date NOT NULL,
  `commitment_date` date DEFAULT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trash` tinyint(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `session_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `user_agent` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `user_data` mediumtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('2a373cc4075295ad2ef4500917d8c5b1', '27.123.255.252', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.82 Safari/537.36', 1615474531, 'a:12:{s:9:\"user_data\";s:0:\"\";s:7:\"user_id\";s:2:\"59\";s:12:\"login_period\";s:22:\"2021-03-11 20:55:36 pm\";s:4:\"name\";s:20:\"M/S Munna & Brothers\";s:5:\"email\";s:15:\"admin@gmail.com\";s:8:\"username\";s:8:\"munna124\";s:6:\"mobile\";s:11:\"01714090942\";s:9:\"privilege\";s:5:\"admin\";s:5:\"image\";s:28:\"public/profiles/munna124.png\";s:6:\"branch\";s:4:\"0016\";s:6:\"holder\";s:5:\"admin\";s:8:\"loggedin\";b:1;}'),
('5d217b0a9675e14996996a877fadb4d9', '203.89.120.5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:86.0) Gecko/20100101 Firefox/86.0', 1615626356, 'a:12:{s:9:\"user_data\";s:0:\"\";s:7:\"user_id\";i:1001;s:12:\"login_period\";s:22:\"2021-03-13 15:07:54 pm\";s:4:\"name\";s:16:\"Freelance IT Lab\";s:5:\"email\";s:19:\"mrskuet08@gmail.com\";s:8:\"username\";s:14:\"freelanceitlab\";s:6:\"mobile\";s:11:\"01937476716\";s:9:\"privilege\";s:5:\"super\";s:5:\"image\";s:27:\"private/images/pic-male.png\";s:6:\"branch\";s:1:\"1\";s:6:\"holder\";s:5:\"super\";s:8:\"loggedin\";b:1;}');

-- --------------------------------------------------------

--
-- Table structure for table `showroom`
--

CREATE TABLE `showroom` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `showroom_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `supervisor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `balance` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `site_meta`
--

CREATE TABLE `site_meta` (
  `id` int(10) UNSIGNED NOT NULL,
  `meta_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_value` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `site_meta`
--

INSERT INTO `site_meta` (`id`, `meta_key`, `meta_value`) VALUES
(13, 'logo', '{\"logo\":\"public\\/img\\/logo_607910.png\",\"faveicon\":\"public\\/img\\/favicon_732767.jpg\"}'),
(14, 'footer', '{\"l_footer_text\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry.\",\"addr_moblile\":\"01714090942, 01711031483\",\"addr_email\":\"admin@gmail.com\",\"addr_address\":\"1\\/Ka, Congress Jubilee Road, Mymensingh\",\"footer_img\":\"public\\/img\\/footer_498770.png\"}'),
(15, 'social_icon', '{\"s_facebook\":\"http:\\/\\/www.facebook.com\\/\",\"s_twitter\":\"http:\\/\\/www.twitter.com\\/\",\"s_gplus\":\"https:\\/\\/plus.google.com\\/\",\"s_pinterest\":\"https:\\/\\/www.pinterest.com\\/\",\"s_youtube\":\"http:\\/\\/www.youtube.com\\/\"}'),
(16, 'background_pattern', 'public/img/background.jpg'),
(17, 'login_background', 'public/img/background.jpg'),
(18, 'header', '{\"site_name\":\"M\\/S Munna Brothers\",\"place_name\":\"1\\/Ka, Congress Jubilee Road, Mymensingh\"}');

-- --------------------------------------------------------

--
-- Table structure for table `sms_record`
--

CREATE TABLE `sms_record` (
  `id` int(11) UNSIGNED NOT NULL,
  `delivery_date` date NOT NULL,
  `delivery_time` time NOT NULL,
  `mobile` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `godown_code` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `total_characters` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `total_messages` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `delivery_report` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sms_record`
--

INSERT INTO `sms_record` (`id`, `delivery_date`, `delivery_time`, `mobile`, `message`, `godown_code`, `total_characters`, `total_messages`, `delivery_report`) VALUES
(1, '2021-01-12', '16:57:12', '01714090942', '10002', '0016', '5', '1', '1'),
(2, '2021-01-12', '18:29:35', '01983667657', 'sd', '0016', '2', '1', '1'),
(3, '2021-01-12', '18:35:51', '01983667657', 'sdfsdf', '0016', '6', '1', '1'),
(4, '2021-01-13', '09:04:36', '01983667657', 'sdf', '0016', '3', '1', '1'),
(5, '2021-01-13', '09:07:37', '0', 'নামঃ Developer, বিল নংঃ 000017, বিল এমাউন্টঃ 30 Tk, , জমাঃ 0 Tk, মোট বাকীঃ 0 Tk,  তাংঃ 2021-01-13 মুন্না এন্ড ব্রাদার্স ।', '', '235', '2', '1'),
(6, '2021-01-13', '09:10:19', '01983667657', 'নামঃ Developer, বিল নংঃ 000018, বিল এমাউন্টঃ 30 Tk, , জমাঃ 0 Tk, মোট বাকীঃ 0 Tk,  তাংঃ 2021-01-13 মুন্না এন্ড ব্রাদার্স ।', '', '235', '2', '1'),
(7, '2021-01-13', '13:58:13', '01718046799', 'নামঃ Test Dealer, বিল নংঃ 210113020, বিল এমাউন্টঃ 130.00 Tk, , জমাঃ 10 Tk, অবশিষ্ট বাকীঃ 120 Tk, মোট বাকীঃ 1120 Tk,  তাংঃ 2021-01-13 মুন্না এন্ড ব্রাদার্স ।', '', '294', '2', '1'),
(8, '2021-01-13', '20:54:06', '01913865387', 'নামঃ MD.BILLAL, বিল নংঃ 000032, বিল এমাউন্টঃ 9236.5 Tk, , জমাঃ 0 Tk, মোট বাকীঃ 0 Tk,  তাংঃ 2021-01-13 মুন্না এন্ড ব্রাদার্স ।', '', '239', '2', '1'),
(9, '2021-01-13', '21:15:06', '01724101562', 'নামঃ MANIK, বিল নংঃ 210113034, বিল এমাউন্টঃ 25757.00 Tk, , জমাঃ 19798 Tk, অবশিষ্ট বাকীঃ 5959 Tk, মোট বাকীঃ 5959 Tk,  তাংঃ 2021-01-13 মুন্না এন্ড ব্রাদার্স ।', '', '294', '2', '1'),
(10, '2021-01-14', '12:27:38', '01713585142', 'নামঃ ABDUL BAREK, বিল নংঃ 000036, বিল এমাউন্টঃ 16520.4 Tk, , জমাঃ 16520.4 Tk, মোট বাকীঃ 0 Tk,  তাংঃ 2021-01-14 মুন্না এন্ড ব্রাদার্স ।', '', '248', '2', '1'),
(11, '2021-01-14', '12:38:42', '01777779112', 'নামঃ NIPRO JMI Phama Ltd., বিল নংঃ 000038, বিল এমাউন্টঃ 3553.25 Tk, , জমাঃ 0 Tk, মোট বাকীঃ 0 Tk,  তাংঃ 2021-01-14 মুন্না এন্ড ব্রাদার্স ।', '', '251', '2', '1'),
(12, '2021-01-16', '19:45:07', '01714090942', 'নামঃ Munna, বিল নংঃ 000049, বিল এমাউন্টঃ 3903.5 Tk, , জমাঃ 0 Tk, মোট বাকীঃ 0 Tk,  তাংঃ 2021-01-16 মুন্না এন্ড ব্রাদার্স ।', '', '235', '2', '1'),
(13, '2021-01-25', '12:01:24', '01723230497', 'নামঃ MD.ABDUR RAHIM, বিল নংঃ 000053, বিল এমাউন্টঃ 3504.21 Tk, , জমাঃ 3504.21 Tk, মোট বাকীঃ 0 Tk,  তাংঃ 2021-01-25 মুন্না এন্ড ব্রাদার্স ।', '', '251', '2', '1'),
(14, '2021-01-25', '12:12:42', '01716602536,01876295', 'নামঃ RAHAT/RIZON, বিল নংঃ 000055, বিল এমাউন্টঃ 7003.38 Tk, , জমাঃ 0 Tk, মোট বাকীঃ 0 Tk,  তাংঃ 2021-01-25 মুন্না এন্ড ব্রাদার্স ।', '', '242', '2', '1'),
(15, '2021-01-26', '11:48:50', '01616309794', 'নামঃ SHAPLA MIKE & BATTERY, জমাঃ  24000 Tk, বর্তমান ব্যাল্যান্সঃ 52845 Tk, তাংঃ 2021-01-26, মুন্না এন্ড ব্রাদার্স .', '', '215', '2', '1'),
(16, '2021-01-26', '11:55:14', '01616309794', 'নামঃ SHAPLA MIKE & BATTERY, বিল নংঃ 210126058, বিল এমাউন্টঃ 54257.00 Tk, , জমাঃ 0 Tk, অবশিষ্ট বাকীঃ 54257 Tk, মোট বাকীঃ 1412 Tk,  তাংঃ 2021-01-26 মুন্না এন্ড ব্রাদার্স ।', '', '307', '3', '1'),
(17, '2021-01-26', '11:58:11', '01616309794', 'নামঃ SHAPLA MIKE & BATTERY, বিল নংঃ 210100001, ফেরত বিল এমাউন্ট 0 Tk, , গ্রহণ : 0 Tk, পূর্বের ব্যালেন্স : 1412 Tk, বর্তমান ব্যালেন্স : 1412 Tk,  তাংঃ 2021-01-26 রফিক ইলেকট্রনিক্স.', '', '341', '3', '1'),
(18, '2021-01-26', '16:38:32', '01791868580', 'নামঃ M/S.ALEENA MOTORS, বিল নংঃ 210126069, বিল এমাউন্টঃ 20000.00 Tk, , জমাঃ 0 Tk, অবশিষ্ট বাকীঃ 20000 Tk, মোট বাকীঃ 8969 Tk,  তাংঃ 2021-01-26 মুন্না এন্ড ব্রাদার্স ।', '', '303', '2', '1'),
(19, '2021-01-26', '20:58:48', '01710317394', 'নামঃ SHARIF BATTERY, বিল নংঃ 210126071, বিল এমাউন্টঃ 2360.00 Tk, , জমাঃ 0 Tk, অবশিষ্ট বাকীঃ 2360 Tk, মোট বাকীঃ 2540 Tk,  তাংঃ 2021-01-26 মুন্না এন্ড ব্রাদার্স ।', '', '298', '2', '1'),
(20, '2021-01-27', '12:02:30', '01712774339', 'নামঃ PATHAN MOTORS, বিল নংঃ 210127073, বিল এমাউন্টঃ 7500.00 Tk, , জমাঃ 0 Tk, অবশিষ্ট বাকীঃ 7500 Tk, মোট বাকীঃ 7500 Tk,  তাংঃ 2021-01-27 মুন্না এন্ড ব্রাদার্স ।', '', '297', '2', '1'),
(21, '2021-01-27', '13:03:39', '01723925299', 'নামঃ RIPON, বিল নংঃ 210127075, বিল এমাউন্টঃ 1238.00 Tk, , জমাঃ 1238 Tk, অবশিষ্ট বাকীঃ 0 Tk, মোট বাকীঃ 0 Tk,  তাংঃ 2021-01-27 মুন্না এন্ড ব্রাদার্স ।', '', '286', '2', '1'),
(22, '2021-01-27', '13:11:51', '01743457773', 'নামঃ MISHUK ENTERPRISE, বিল নংঃ 000077, বিল এমাউন্টঃ 17992.5 Tk, , জমাঃ 0 Tk, মোট বাকীঃ 0 Tk,  তাংঃ 2021-01-27 মুন্না এন্ড ব্রাদার্স ।', '', '248', '2', '1'),
(23, '2021-01-27', '14:34:46', '01727911532', 'নামঃ MD.BACHCHU MIAH, বিল নংঃ 000079, বিল এমাউন্টঃ 2600 Tk, , জমাঃ 2600 Tk, মোট বাকীঃ 0 Tk,  তাংঃ 2021-01-27 মুন্না এন্ড ব্রাদার্স ।', '', '246', '2', '1'),
(24, '2021-01-27', '17:49:43', '01791868580', 'নামঃ M/S.ALEENA MOTORS, বিল নংঃ 210127080, বিল এমাউন্টঃ 22215.00 Tk, , জমাঃ 0 Tk, অবশিষ্ট বাকীঃ 22215 Tk, মোট বাকীঃ 13246 Tk,  তাংঃ 2021-01-27 মুন্না এন্ড ব্রাদার্স ।', '', '304', '2', '1'),
(25, '2021-01-27', '17:55:11', '01721152466', 'নামঃ MD.ARIFUZZAMAN, বিল নংঃ 000081, বিল এমাউন্টঃ 700 Tk, , জমাঃ 700 Tk, মোট বাকীঃ 0 Tk,  তাংঃ 2021-01-27 মুন্না এন্ড ব্রাদার্স ।', '', '243', '2', '1'),
(26, '2021-01-28', '14:31:36', '01915577753', 'নামঃ HAFIZ VAI, বিল নংঃ 210128084, বিল এমাউন্টঃ 5060.00 Tk, , জমাঃ 5060 Tk, অবশিষ্ট বাকীঃ 0 Tk, মোট বাকীঃ 0 Tk,  তাংঃ 2021-01-28 মুন্না এন্ড ব্রাদার্স ।', '', '290', '2', '1'),
(27, '2021-01-28', '14:33:15', '01997921930', 'নামঃ MD.SHAHIN, বিল নংঃ 000085, বিল এমাউন্টঃ 7800 Tk, , জমাঃ 7800 Tk, মোট বাকীঃ 0 Tk,  তাংঃ 2021-01-28 মুন্না এন্ড ব্রাদার্স ।', '', '240', '2', '1'),
(28, '2021-01-31', '11:05:41', '01772655160', 'নামঃ MD.JAHIDUL ISHLAM, বিল নংঃ 000086, বিল এমাউন্টঃ 6500 Tk, , জমাঃ 6500 Tk, মোট বাকীঃ 0 Tk,  তাংঃ 2021-01-31 মুন্না এন্ড ব্রাদার্স ।', '', '248', '2', '1'),
(29, '2021-02-01', '11:34:51', '01712112186', 'নামঃ MD.NURULLAH, বিল নংঃ 000087, বিল এমাউন্টঃ 5700 Tk, , জমাঃ 0 Tk, মোট বাকীঃ 0 Tk,  তাংঃ 2021-02-01 মুন্না এন্ড ব্রাদার্স ।', '', '239', '2', '1'),
(30, '2021-02-01', '11:47:39', '01710715160', 'নামঃ AL-MADINA, বিল নংঃ 210201088, বিল এমাউন্টঃ 6300.00 Tk, , জমাঃ 3000 Tk, অবশিষ্ট বাকীঃ 3300 Tk, মোট বাকীঃ 3300 Tk,  তাংঃ 2021-02-01 মুন্না এন্ড ব্রাদার্স ।', '', '296', '2', '1'),
(31, '2021-02-03', '11:50:07', '01713116352', 'নামঃ MD.RAFI, বিল নংঃ 000089, বিল এমাউন্টঃ 3200 Tk, , জমাঃ 0 Tk, মোট বাকীঃ 0 Tk,  তাংঃ 2021-02-03 মুন্না এন্ড ব্রাদার্স ।', '', '235', '2', '1'),
(32, '2021-02-03', '14:23:19', '01791868580', 'নামঃ M/S.ALEENA MOTORS, বিল নংঃ 210200001, ফেরত বিল এমাউন্ট 20000 Tk, , গ্রহণ : 0 Tk, পূর্বের ব্যালেন্স : 8754 Tk, বর্তমান ব্যালেন্স : 28754 Tk,  তাংঃ 2021-02-03 রফিক ইলেকট্রনিক্স.', '', '342', '3', '1'),
(33, '2021-02-03', '14:25:06', '01791868580', 'নামঃ M/S.ALEENA MOTORS, বিল নংঃ 210203090, বিল এমাউন্টঃ 4816.00 Tk, , জমাঃ 0 Tk, অবশিষ্ট বাকীঃ 4816 Tk, মোট বাকীঃ 23938 Tk,  তাংঃ 2021-02-03 মুন্না এন্ড ব্রাদার্স ।', '', '302', '2', '1'),
(34, '2021-02-03', '16:03:19', '01718245042', 'নামঃ MD.JAHANGIR, বিল নংঃ 000092, বিল এমাউন্টঃ 7200 Tk, , জমাঃ 0 Tk, মোট বাকীঃ 0 Tk,  তাংঃ 2021-02-03 মুন্না এন্ড ব্রাদার্স ।', '', '239', '2', '1'),
(35, '2021-02-04', '11:41:13', '01791868580', 'নামঃ M/S.ALEENA MOTORS, বিল নংঃ 210204093, বিল এমাউন্টঃ 13034.00 Tk, , জমাঃ 0 Tk, অবশিষ্ট বাকীঃ 13034 Tk, মোট বাকীঃ 10904 Tk,  তাংঃ 2021-02-04 মুন্না এন্ড ব্রাদার্স ।', '', '304', '2', '1'),
(36, '2021-02-04', '16:06:43', '01713028995', 'নামঃ MD.ATIK, বিল নংঃ 000094, বিল এমাউন্টঃ 13200 Tk, , জমাঃ 13200 Tk, মোট বাকীঃ 0 Tk,  তাংঃ 2021-02-04 মুন্না এন্ড ব্রাদার্স ।', '', '240', '2', '1'),
(37, '2021-02-06', '11:35:37', '01791868580', 'নামঃ M/S.ALEENA MOTORS, জমাঃ  14000 Tk, বর্তমান ব্যাল্যান্সঃ 30304 Tk, তাংঃ 2021-02-06, মুন্না এন্ড ব্রাদার্স .', '', '211', '2', '1'),
(38, '2021-02-06', '11:40:07', '01791868580', 'নামঃ M/S.ALEENA MOTORS, বিল নংঃ 210206097, বিল এমাউন্টঃ 14801.00 Tk, , জমাঃ 0 Tk, অবশিষ্ট বাকীঃ 14801 Tk, মোট বাকীঃ 15503 Tk,  তাংঃ 2021-02-06 মুন্না এন্ড ব্রাদার্স ।', '', '304', '2', '1'),
(39, '2021-02-06', '13:15:08', '01948134824', 'নামঃ MD.SAIDUR RAHMNA, বিল নংঃ 000098, বিল এমাউন্টঃ 1600 Tk, , জমাঃ 1600 Tk, মোট বাকীঃ 0 Tk,  তাংঃ 2021-02-06 মুন্না এন্ড ব্রাদার্স ।', '', '247', '2', '1'),
(40, '2021-02-06', '14:45:32', '01711156309', 'নামঃ MD.KAZI ALAM, বিল নংঃ 210206099, বিল এমাউন্টঃ 16500.00 Tk, , জমাঃ 16500 Tk, অবশিষ্ট বাকীঃ 0 Tk, মোট বাকীঃ 0 Tk,  তাংঃ 2021-02-06 মুন্না এন্ড ব্রাদার্স ।', '', '295', '2', '1'),
(41, '2021-02-06', '16:26:05', '01912708668', 'নামঃ SHAH A.N.M.ABDULLAH AL-MAHDI, বিল নংঃ 000101, বিল এমাউন্টঃ 22000 Tk, , জমাঃ 22000 Tk, মোট বাকীঃ 0 Tk,  তাংঃ 2021-02-06 মুন্না এন্ড ব্রাদার্স ।', '', '261', '2', '1'),
(42, '2021-02-06', '20:58:40', '01710317394', 'নামঃ SHARIF BATTERY, বিল নংঃ 210206103, বিল এমাউন্টঃ 64000.00 Tk, , জমাঃ 63000 Tk, অবশিষ্ট বাকীঃ 1000 Tk, মোট বাকীঃ 1000 Tk,  তাংঃ 2021-02-06 মুন্না এন্ড ব্রাদার্স ।', '', '303', '2', '1'),
(43, '2021-02-07', '13:56:50', '01708399927', 'নামঃ UTPAUL DUTTA, বিল নংঃ 000108, বিল এমাউন্টঃ 9500 Tk, , জমাঃ 0 Tk, মোট বাকীঃ 0 Tk,  তাংঃ 2021-02-07 মুন্না এন্ড ব্রাদার্স ।', '', '240', '2', '1'),
(44, '2021-02-07', '14:13:55', '01616309794', 'নামঃ SHAPLA MIKE & BATTERY, বিল নংঃ 210207110, বিল এমাউন্টঃ 9396.00 Tk, , জমাঃ 10000 Tk, অবশিষ্ট বাকীঃ 604 Tk, মোট বাকীঃ 808 Tk,  তাংঃ 2021-02-07 মুন্না এন্ড ব্রাদার্স ।', '', '307', '3', '1'),
(45, '2021-02-07', '14:42:15', '01791868580', 'নামঃ M/S.ALEENA MOTORS, বিল নংঃ 210207112, বিল এমাউন্টঃ 18520.00 Tk, , জমাঃ 0 Tk, অবশিষ্ট বাকীঃ 18520 Tk, মোট বাকীঃ 3017 Tk,  তাংঃ 2021-02-07 মুন্না এন্ড ব্রাদার্স ।', '', '303', '2', '1'),
(46, '2021-02-07', '16:26:54', '01740936878', 'নামঃ ZIA AUTO MOBILE HOUSE, জমাঃ  600 Tk, বর্তমান ব্যাল্যান্সঃ 1000 Tk, তাংঃ 2021-02-07, মুন্না এন্ড ব্রাদার্স .', '', '212', '2', '1'),
(47, '2021-02-07', '16:28:32', '01740936878', 'নামঃ ZIA AUTO MOBILE HOUSE, বিল নংঃ 210207114, বিল এমাউন্টঃ 12771.00 Tk, , জমাঃ 0 Tk, অবশিষ্ট বাকীঃ 12771 Tk, মোট বাকীঃ 11771 Tk,  তাংঃ 2021-02-07 মুন্না এন্ড ব্রাদার্স ।', '', '308', '3', '1'),
(48, '2021-02-07', '20:16:59', '01740936878', 'নামঃ ZIA AUTO MOBILE HOUSE, জমাঃ  12150 Tk, বর্তমান ব্যাল্যান্সঃ 379 Tk, তাংঃ 2021-02-07, মুন্না এন্ড ব্রাদার্স .', '', '213', '2', '1'),
(49, '2021-02-07', '20:55:19', '01718591662', 'নামঃ TATA BETTRY, বিল নংঃ 210207116, বিল এমাউন্টঃ 8274.00 Tk, , জমাঃ 0 Tk, অবশিষ্ট বাকীঃ 8274 Tk, মোট বাকীঃ 8274 Tk,  তাংঃ 2021-02-07 মুন্না এন্ড ব্রাদার্স ।', '', '295', '2', '1'),
(50, '2021-02-07', '21:07:52', '01718591662', 'নামঃ TATA BETTRY, জমাঃ  8274 Tk, বর্তমান ব্যাল্যান্সঃ 0 Tk, তাংঃ 2021-02-07, মুন্না এন্ড ব্রাদার্স .', '', '200', '2', '1'),
(51, '2021-02-08', '14:08:07', '01765567439', 'নামঃ Md.faruk, বিল নংঃ 000117, বিল এমাউন্টঃ 8000 Tk, , জমাঃ 8000 Tk, মোট বাকীঃ 0 Tk,  তাংঃ 2021-02-08 মুন্না এন্ড ব্রাদার্স ।', '', '239', '2', '1'),
(52, '2021-02-08', '14:50:37', '01711675971', 'নামঃ MD.YAKUB ALI, বিল নংঃ 000119, বিল এমাউন্টঃ 2200 Tk, , জমাঃ 2200 Tk, মোট বাকীঃ 0 Tk,  তাংঃ 2021-02-08 মুন্না এন্ড ব্রাদার্স ।', '', '243', '2', '1'),
(53, '2021-02-08', '16:07:31', '01772021551', 'নামঃ Test, বিল নংঃ 000121, বিল এমাউন্টঃ 10 Tk, , জমাঃ 0 Tk, মোট বাকীঃ 0 Tk,  তাংঃ 2021-02-08 মুন্না এন্ড ব্রাদার্স ।', '', '230', '2', '1'),
(54, '2021-02-09', '14:25:30', '01995127092', 'নামঃ MD.MOFAZZAL HOSSAIN, বিল নংঃ 000124, বিল এমাউন্টঃ 29300 Tk, , জমাঃ 27000 Tk, মোট বাকীঃ 0 Tk,  তাংঃ 2021-02-09 মুন্না এন্ড ব্রাদার্স ।', '', '252', '2', '1'),
(55, '2021-02-11', '13:10:28', '01769009880', 'নামঃ Cap.Jakir, বিল নংঃ 000126, বিল এমাউন্টঃ 4700 Tk, , জমাঃ 4700 Tk, মোট বাকীঃ 0 Tk,  তাংঃ 2021-02-11 মুন্না এন্ড ব্রাদার্স ।', '', '240', '2', '1'),
(56, '2021-02-11', '13:49:57', '01715210485', 'নামঃ Bikash Babu, জমাঃ  22000 Tk, বর্তমান ব্যাল্যান্সঃ 0 Tk, তাংঃ 2021-02-11, মুন্না এন্ড ব্রাদার্স .', '', '201', '2', '1'),
(57, '2021-02-11', '13:52:21', '01715210485', 'নামঃ Bikash Babu, বিল নংঃ 210211128, বিল এমাউন্টঃ 27000.00 Tk, , জমাঃ 0 Tk, অবশিষ্ট বাকীঃ 27000 Tk, মোট বাকীঃ 27000 Tk,  তাংঃ 2021-02-11 মুন্না এন্ড ব্রাদার্স ।', '', '298', '2', '1'),
(58, '2021-02-11', '14:10:40', '01716625061', 'নামঃ CITY CORPORATION, বিল নংঃ 210211129, বিল এমাউন্টঃ 10800.00 Tk, , জমাঃ 0 Tk, অবশিষ্ট বাকীঃ 10800 Tk, মোট বাকীঃ 76662 Tk,  তাংঃ 2021-02-11 মুন্না এন্ড ব্রাদার্স ।', '', '303', '2', '1'),
(59, '2021-02-11', '15:17:21', '01616309794', 'নামঃ SHAPLA MIKE & BATTERY, বিল নংঃ 210211131, বিল এমাউন্টঃ 82000.00 Tk, , জমাঃ 82000 Tk, অবশিষ্ট বাকীঃ 0 Tk, মোট বাকীঃ 808 Tk,  তাংঃ 2021-02-11 মুন্না এন্ড ব্রাদার্স ।', '', '306', '2', '1'),
(60, '2021-02-11', '16:26:56', '01969552552', 'নামঃ Abdullah Al Ahsan, বিল নংঃ 000132, বিল এমাউন্টঃ 3800 Tk, , জমাঃ 0 Tk, মোট বাকীঃ 3800 Tk,  তাংঃ 2021-02-11 মুন্না এন্ড ব্রাদার্স।', '', '247', '2', '1'),
(61, '2021-02-11', '20:25:57', '01791868580', 'নামঃ M/S.ALEENA MOTORS, বিল নংঃ 210211134, বিল এমাউন্টঃ 8640.00 Tk, , জমাঃ 0 Tk, অবশিষ্ট বাকীঃ 8640 Tk, মোট বাকীঃ 11657 Tk,  তাংঃ 2021-02-11 মুন্না এন্ড ব্রাদার্স ।', '', '302', '2', '1'),
(62, '2021-03-13', '15:16:27', '01710511241', 'Name: Knox Pickett<br>Mobile: 01710511241<br>Complain: Dolorem adipisci qui.', '', '76', '1', '1'),
(63, '2021-03-13', '15:18:00', '01715731878', 'Name: Jena Pitts<br>Mobile: 01715731878<br>Complain: Aut quo quia omnis e.', '', '74', '1', '1'),
(64, '2021-03-13', '15:18:12', '01710511241', 'Name: Samson Malone<br>Mobile: 01710511241<br>Complain: Omnis incididunt aut.', '', '77', '1', '1'),
(65, '2021-03-13', '15:19:00', '01710511241', 'Name: test\\n.Mobile: 01710511241\\n.Complain: Excepteur velit non .', '', '66', '1', '1'),
(66, '2021-03-13', '15:19:40', '01710511241', 'Name: Tset\\nMobile: 01710511241\\nComplain: Sequi modi elit max.', '', '63', '1', '1'),
(67, '2021-03-13', '15:21:19', '01912226436', 'Name: Plato Sawyer%0aMobile: 01912226436%0aComplain: Ipsum ut ea vel rep.', '', '73', '1', '1'),
(68, '2021-03-13', '15:22:33', '01912226436', 'Name: Jenette Estes\\nMobile: 01912226436\\nComplain: Quia exercitationem .', '', '73', '1', '1'),
(69, '2021-03-13', '15:23:56', '01912226436', 'Name: Tst\\r\\nMobile: 01912226436\\r\\nComplain: Provident excepteur.', '', '66', '1', '1'),
(70, '2021-03-13', '15:24:45', '01912226436', 'Name: Tucker Blake \\r\\nMobile: 01912226436 \\r\\nComplain: Eum cillum ut et vel.', '', '78', '1', '1'),
(71, '2021-03-13', '15:26:50', '01912226436', 'Name: Test%0aMobile: 01912226436%0aComplain: Qui itaque dolorem d.', '', '66', '1', '1'),
(72, '2021-03-13', '15:32:21', '01912226436', 'Name: Test%0aMobile: 01912226436%0aComplain: Esse sed earum maior.', '', '66', '1', '1'),
(73, '2021-03-13', '15:32:48', '01912226436', 'Name: tset\\nMobile: 01912226436\\nComplain: Adipisicing facilis .', '', '64', '1', '1'),
(74, '2021-03-13', '15:34:11', '01912226436', 'Name: TESt, Mobile: 01912226436, Complain: Id aperiam dolor et.', '', '63', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_serial` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `subcategory` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` varchar(150) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `unit` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `purchase_price` decimal(10,2) NOT NULL,
  `sell_price` decimal(10,2) NOT NULL,
  `retail_sale_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `dealer_sale_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `godown_code` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `category` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subcategory` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `trash` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `date`, `category`, `subcategory`, `trash`) VALUES
(1, '2021-01-10', NULL, 'Na', 0),
(2, '2021-01-10', NULL, 'HPD-200', 1),
(3, '2021-01-10', NULL, 'MC', 0),
(4, '2021-01-10', NULL, 'CONVENTIONAL', 1),
(5, '2021-01-10', NULL, 'PP', 0),
(6, '2021-01-10', NULL, 'PCV', 0),
(7, '2021-01-10', NULL, 'HPD', 0),
(8, '2021-01-12', NULL, 'OLD_NS40ZL', 1),
(9, '2021-01-12', NULL, 'OLD_NS60L', 1),
(10, '2021-01-12', NULL, 'OLD_NS70/50Z', 1),
(11, '2021-01-12', NULL, 'OLD_NX120-7/70', 1),
(12, '2021-01-12', NULL, 'OLD-100/17', 1),
(13, '2021-01-12', NULL, 'OLD-130/21/120', 1),
(14, '2021-01-12', NULL, 'OLD-165/27/150', 1),
(15, '2021-01-12', NULL, 'OLD-200/29', 1),
(16, '2021-01-12', NULL, 'SOLAR_BATTERY', 0),
(17, '2021-01-12', NULL, 'OLD_BATTERY', 0),
(18, '2021-01-13', NULL, 'SUPER_DC(18M)', 0),
(19, '2021-01-13', NULL, 'MEGA_POWER(15_M)', 0),
(20, '2021-01-13', NULL, 'SILVA', 0),
(21, '2021-01-13', NULL, 'TinCaGreen', 0),
(22, '2021-01-13', NULL, 'EASY_BIKE', 0),
(23, '2021-01-13', NULL, '6.DG.TR', 0),
(24, '2021-01-13', NULL, 'DM_WATER', 0),
(25, '2021-01-13', NULL, 'COMBO', 0),
(26, '2021-01-13', NULL, 'COMBO_Z', 0),
(27, '2021-01-13', NULL, 'ULLASH', 0),
(28, '2021-01-13', NULL, 'LUMINOUS', 0),
(29, '2021-01-13', NULL, 'DC_FAN', 0),
(30, '2021-02-07', NULL, '20w-50', 0),
(31, '2021-02-11', NULL, 'GH_POWER', 0);

-- --------------------------------------------------------

--
-- Table structure for table `supplier_commitments`
--

CREATE TABLE `supplier_commitments` (
  `id` int(11) NOT NULL,
  `godown_code` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `party_code` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `commitment` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `status` varchar(191) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'new',
  `trash` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `supplier_commitments`
--

INSERT INTO `supplier_commitments` (`id`, `godown_code`, `user_id`, `party_code`, `commitment`, `date`, `status`, `trash`) VALUES
(6, 'all', '', '015', 'Request', '2021-02-07', 'completed', 0),
(3, '0016', '59', '000002', 'sdfsdf', '2021-02-07', 'pending', 0),
(4, '0016', '', '000002', 'sfsdf', '2021-02-07', 'delivered', 0),
(5, '0016', '', '000002', 'sdfsdfsdf', '2021-02-07', 'completed', 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(10) UNSIGNED NOT NULL,
  `transaction_date` date NOT NULL,
  `godown_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bank` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `account_number` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `transaction_type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `transaction_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `remarks` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `opening` datetime NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `l_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `maritial_status` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `about` text COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `facecbook` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `twitter` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `privilege` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `branch` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `reset_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `opening`, `name`, `l_name`, `gender`, `birthday`, `maritial_status`, `position`, `about`, `website`, `facecbook`, `twitter`, `email`, `username`, `password`, `privilege`, `image`, `mobile`, `branch`, `reset_code`) VALUES
(59, '2021-01-07 10:04:51', 'M/S Munna & Brothers', '', '', '', '', '', '', '', '', '', 'admin@gmail.com', 'munna124', '53e3b71189d8d5814759ce10b2e94efa', 'admin', 'public/profiles/munna124.png', '01714090942', '0016', '');

-- --------------------------------------------------------

--
-- Table structure for table `visitor_comments`
--

CREATE TABLE `visitor_comments` (
  `id` int(100) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'unread'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `yearly_commission_paid`
--

CREATE TABLE `yearly_commission_paid` (
  `id` int(100) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `party_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `year` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `trash` int(10) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `zone`
--

CREATE TABLE `zone` (
  `id` int(10) NOT NULL,
  `zone` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `zone`
--

INSERT INTO `zone` (`id`, `zone`) VALUES
(2, 'mymensingh_sadar'),
(3, 'fulpur_mymensingh'),
(4, 'nandail_mymensingh'),
(5, 'fulbaria_mymensingh'),
(6, 'gouripur_mymensingh'),
(7, 'ishwargonj_mymensingh'),
(8, 'muktagachha_mymensingh'),
(9, 'tarakanda_mymensingh'),
(10, 'netrokona_sadar'),
(11, 'sherpur_sadar'),
(12, 'jamalpur_sadar'),
(13, 'durgapur_netrokona'),
(14, 'kendua_netrokona'),
(15, 'madan_netrokona'),
(16, 'mohongonj_netrokona');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_trx`
--
ALTER TABLE `add_trx`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advanced_payment`
--
ALTER TABLE `advanced_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_account`
--
ALTER TABLE `bank_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bonus`
--
ALTER TABLE `bonus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bonus_structure`
--
ALTER TABLE `bonus_structure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chalan`
--
ALTER TABLE `chalan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `closing`
--
ALTER TABLE `closing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commissions`
--
ALTER TABLE `commissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commitments`
--
ALTER TABLE `commitments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complain`
--
ALTER TABLE `complain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cost`
--
ALTER TABLE `cost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cost_category`
--
ALTER TABLE `cost_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cost_field`
--
ALTER TABLE `cost_field`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `damage_product`
--
ALTER TABLE `damage_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deduction_structure`
--
ALTER TABLE `deduction_structure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `due_collect`
--
ALTER TABLE `due_collect`
  ADD PRIMARY KEY (`id`),
  ADD KEY `voucher_no` (`voucher_no`),
  ADD KEY `total_bill` (`total_bill`),
  ADD KEY `date` (`date`),
  ADD KEY `godown_code` (`godown_code`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exchange`
--
ALTER TABLE `exchange`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `fixed_assate`
--
ALTER TABLE `fixed_assate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fixed_assate_field`
--
ALTER TABLE `fixed_assate_field`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `godowns`
--
ALTER TABLE `godowns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `code` (`code`);

--
-- Indexes for table `godown_balance`
--
ALTER TABLE `godown_balance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incentive_structure`
--
ALTER TABLE `incentive_structure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income_field`
--
ALTER TABLE `income_field`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `initial_transaction`
--
ALTER TABLE `initial_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_new`
--
ALTER TABLE `loan_new`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_transaction`
--
ALTER TABLE `loan_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lpr`
--
ALTER TABLE `lpr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monthly_commission_paid`
--
ALTER TABLE `monthly_commission_paid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_complain`
--
ALTER TABLE `new_complain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opening_balance`
--
ALTER TABLE `opening_balance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parties`
--
ALTER TABLE `parties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `code` (`code`),
  ADD KEY `godown_code` (`godown_code`),
  ADD KEY `type` (`type`),
  ADD KEY `customer_type` (`customer_type`),
  ADD KEY `dealer_type` (`dealer_type`),
  ADD KEY `status` (`status`),
  ADD KEY `trash` (`trash`),
  ADD KEY `zone` (`zone`);

--
-- Indexes for table `partymeta`
--
ALTER TABLE `partymeta`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `partytransaction`
--
ALTER TABLE `partytransaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_at` (`transaction_at`),
  ADD KEY `party_code` (`party_code`),
  ADD KEY `relation` (`relation`),
  ADD KEY `remark` (`remark`),
  ADD KEY `trash` (`trash`),
  ADD KEY `godown_code` (`godown_code`),
  ADD KEY `transaction_type` (`transaction_type`);

--
-- Indexes for table `partytransactionmeta`
--
ALTER TABLE `partytransactionmeta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`),
  ADD KEY `id_3` (`id`),
  ADD KEY `id_4` (`id`),
  ADD KEY `transaction_id` (`transaction_id`);

--
-- Indexes for table `privileges`
--
ALTER TABLE `privileges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `production`
--
ALTER TABLE `production`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`product_code`),
  ADD KEY `product_model` (`product_model`(191)),
  ADD KEY `status` (`status`),
  ADD KEY `product_cat` (`product_cat`);

--
-- Indexes for table `purchase_return`
--
ALTER TABLE `purchase_return`
  ADD PRIMARY KEY (`id`),
  ADD KEY `party_code` (`party_code`),
  ADD KEY `voucher_no` (`voucher_no`);

--
-- Indexes for table `recharge_sms`
--
ALTER TABLE `recharge_sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rent`
--
ALTER TABLE `rent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary_records`
--
ALTER TABLE `salary_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary_structure`
--
ALTER TABLE `salary_structure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_return`
--
ALTER TABLE `sale_return`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sapitems`
--
ALTER TABLE `sapitems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `voucher_no` (`voucher_no`),
  ADD KEY `product_code` (`product_code`),
  ADD KEY `product_model` (`product_model`),
  ADD KEY `trash` (`trash`),
  ADD KEY `status` (`status`),
  ADD KEY `sap_at` (`sap_at`),
  ADD KEY `sap_type` (`sap_type`),
  ADD KEY `godown_code` (`godown_code`);

--
-- Indexes for table `sapmeta`
--
ALTER TABLE `sapmeta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `voucher_no` (`voucher_no`),
  ADD KEY `meta_key` (`meta_key`),
  ADD KEY `trash` (`trash`);

--
-- Indexes for table `saprecords`
--
ALTER TABLE `saprecords`
  ADD PRIMARY KEY (`id`),
  ADD KEY `party_code` (`party_code`),
  ADD KEY `voucher_no` (`voucher_no`),
  ADD KEY `sap_at` (`sap_at`),
  ADD KEY `godown_code` (`godown_code`),
  ADD KEY `trash` (`trash`),
  ADD KEY `status` (`status`),
  ADD KEY `sap_type` (`sap_type`),
  ADD KEY `due_status` (`due_status`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `showroom`
--
ALTER TABLE `showroom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_record`
--
ALTER TABLE `sms_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`),
  ADD KEY `code` (`code`),
  ADD KEY `godown_code` (`godown_code`),
  ADD KEY `name` (`name`),
  ADD KEY `product_model` (`product_model`),
  ADD KEY `product_serial` (`product_serial`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_commitments`
--
ALTER TABLE `supplier_commitments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitor_comments`
--
ALTER TABLE `visitor_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yearly_commission_paid`
--
ALTER TABLE `yearly_commission_paid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zone`
--
ALTER TABLE `zone`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_trx`
--
ALTER TABLE `add_trx`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `advanced_payment`
--
ALTER TABLE `advanced_payment`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bank_account`
--
ALTER TABLE `bank_account`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `bonus`
--
ALTER TABLE `bonus`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bonus_structure`
--
ALTER TABLE `bonus_structure`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `chalan`
--
ALTER TABLE `chalan`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `closing`
--
ALTER TABLE `closing`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `commissions`
--
ALTER TABLE `commissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `commitments`
--
ALTER TABLE `commitments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `complain`
--
ALTER TABLE `complain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `cost`
--
ALTER TABLE `cost`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cost_category`
--
ALTER TABLE `cost_category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `cost_field`
--
ALTER TABLE `cost_field`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `damage_product`
--
ALTER TABLE `damage_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deduction_structure`
--
ALTER TABLE `deduction_structure`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `due_collect`
--
ALTER TABLE `due_collect`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exchange`
--
ALTER TABLE `exchange`
  MODIFY `id` int(15) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fixed_assate`
--
ALTER TABLE `fixed_assate`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fixed_assate_field`
--
ALTER TABLE `fixed_assate_field`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `godowns`
--
ALTER TABLE `godowns`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `godown_balance`
--
ALTER TABLE `godown_balance`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `incentive_structure`
--
ALTER TABLE `incentive_structure`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `income_field`
--
ALTER TABLE `income_field`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `initial_transaction`
--
ALTER TABLE `initial_transaction`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loan_new`
--
ALTER TABLE `loan_new`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loan_transaction`
--
ALTER TABLE `loan_transaction`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lpr`
--
ALTER TABLE `lpr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `monthly_commission_paid`
--
ALTER TABLE `monthly_commission_paid`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `new_complain`
--
ALTER TABLE `new_complain`
  MODIFY `id` int(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `opening_balance`
--
ALTER TABLE `opening_balance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parties`
--
ALTER TABLE `parties`
  MODIFY `id` int(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `partymeta`
--
ALTER TABLE `partymeta`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `partytransaction`
--
ALTER TABLE `partytransaction`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `partytransactionmeta`
--
ALTER TABLE `partytransactionmeta`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `privileges`
--
ALTER TABLE `privileges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `production`
--
ALTER TABLE `production`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `purchase_return`
--
ALTER TABLE `purchase_return`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `recharge_sms`
--
ALTER TABLE `recharge_sms`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rent`
--
ALTER TABLE `rent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salary_records`
--
ALTER TABLE `salary_records`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salary_structure`
--
ALTER TABLE `salary_structure`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sale_return`
--
ALTER TABLE `sale_return`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sapitems`
--
ALTER TABLE `sapitems`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sapmeta`
--
ALTER TABLE `sapmeta`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `saprecords`
--
ALTER TABLE `saprecords`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `showroom`
--
ALTER TABLE `showroom`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sms_record`
--
ALTER TABLE `sms_record`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `supplier_commitments`
--
ALTER TABLE `supplier_commitments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `visitor_comments`
--
ALTER TABLE `visitor_comments`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `yearly_commission_paid`
--
ALTER TABLE `yearly_commission_paid`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `zone`
--
ALTER TABLE `zone`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
