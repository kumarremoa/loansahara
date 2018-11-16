-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 01, 2018 at 10:25 AM
-- Server version: 5.7.23-0ubuntu0.16.04.1
-- PHP Version: 7.0.32-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loan_sahara`
--

-- --------------------------------------------------------

--
-- Table structure for table `loan_account_details`
--

CREATE TABLE `loan_account_details` (
  `account_id` int(11) NOT NULL,
  `account_email` varchar(255) NOT NULL,
  `account_bank_name` varchar(255) NOT NULL,
  `account_holder_name` varchar(255) NOT NULL,
  `account_no` varchar(255) NOT NULL,
  `account_branch` text NOT NULL,
  `account_icfc` varchar(255) NOT NULL,
  `account_contact` varchar(255) NOT NULL,
  `account_pan_image` varchar(255) NOT NULL,
  `account_pan_no` varchar(255) NOT NULL,
  `account_adhar_no` varchar(255) NOT NULL,
  `account_adhar_image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_account_details`
--

INSERT INTO `loan_account_details` (`account_id`, `account_email`, `account_bank_name`, `account_holder_name`, `account_no`, `account_branch`, `account_icfc`, `account_contact`, `account_pan_image`, `account_pan_no`, `account_adhar_no`, `account_adhar_image`, `created_at`) VALUES
(1, 'pv16061995@gmail.com', '324324324', 'prateek  verma', '32432443543545435', 'sec 49', 'dsds3455', '9457120207', 'ee548fe062763777afbd9c13f87a7089.jpeg', '324234324', '32432432432', '92f0ae24edfd21e4f69a67f924f6a816.png', '2018-10-24 05:48:13');

-- --------------------------------------------------------

--
-- Table structure for table `loan_category`
--

CREATE TABLE `loan_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_category`
--

INSERT INTO `loan_category` (`id`, `name`, `image`, `description`) VALUES
(4, 'Home', '3dc0720048dbed7207c0631b2fec24db.png', 'Home'),
(6, 'Car', '33f4133157d42380628bfaec1fb0cb96.png', 'car dec'),
(7, 'Personal', 'fe5362fb33a9f6ab5ce5cb2a6650a39c.png', 'personal');

-- --------------------------------------------------------

--
-- Table structure for table `loan_city`
--

CREATE TABLE `loan_city` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `state_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_city`
--

INSERT INTO `loan_city` (`id`, `name`, `state_id`) VALUES
(1, 'Mumbai', 15),
(2, 'Delhi', 35),
(3, 'Bangalore', 12),
(4, 'Hyderabad', 38),
(5, 'Ahmedabad', 7),
(6, 'Chennai', 24),
(7, 'Kolkata', 28),
(8, 'Surat', 7),
(9, 'Pune', 15),
(10, 'Jaipur', 22),
(11, 'Lucknow', 27),
(12, 'Kanpur', 27),
(13, 'Nagpur', 15),
(14, 'Visakhapatnam', 1),
(15, 'Indore', 14),
(16, 'Thane', 15),
(17, 'Bhopal', 14),
(18, 'Pimpri-chinchwad', 15),
(19, 'Patna', 4),
(20, 'Vadodara', 7),
(21, 'Ghaziabad', 27),
(22, 'Ludhiana', 21),
(23, 'Coimbatore', 24),
(24, 'Agra', 27),
(25, 'Madurai', 24),
(26, 'Nashik', 15),
(27, 'Faridabad', 8),
(28, 'Meerut', 27),
(29, 'Rajkot', 7),
(30, 'Kalyan-Dombivali', 15),
(31, 'Vasai-Virar', 15),
(32, 'Varanasi', 27),
(33, 'Srinagar', 10),
(34, 'Aurangabad', 15),
(35, 'Dhanbad', 11),
(36, 'Amritsar', 21),
(37, 'Navi Mumbai', 15),
(38, 'Allahabad', 27),
(39, 'Ranchi', 11),
(40, 'Howrah?(city area)', 28),
(41, 'Jabalpur', 14),
(42, 'Gwalior', 14),
(43, 'Vijayawada', 1),
(44, 'Jodhpur', 22),
(45, 'Raipur', 5),
(46, 'Kota', 22),
(47, 'Guwahati', 3),
(48, 'Chandigarh', 32),
(49, 'Solapur', 15),
(50, 'Hubballi-Dharwad', 12),
(51, 'Tiruchirappalli', 24),
(52, 'Bareilly', 27),
(53, 'Mysore', 12),
(54, 'Tiruppur', 24),
(55, 'Gurgaon', 8),
(56, 'Aligarh', 27),
(57, 'Jalandhar', 21),
(58, 'Bhubaneswar', 20),
(59, 'Salem', 24),
(60, 'Mira-Bhayandar', 15),
(61, 'Warangal', 38),
(62, 'Thiruvananthapuram', 13),
(63, 'Guntur', 1),
(64, 'Bhiwandi', 15),
(65, 'Saharanpur', 27),
(66, 'Gorakhpur', 27),
(67, 'Bikaner', 22),
(68, 'Amravati', 15),
(69, 'Noida', 27),
(70, 'Jamshedpur', 11),
(71, 'Bhilai', 5),
(72, 'Cuttack', 20),
(73, 'Firozabad', 27),
(74, 'Kochi', 13),
(75, 'Nellore', 1),
(76, 'Bhavnagar', 7),
(77, 'Dehradun', 26),
(78, 'Durgapur', 28),
(79, 'Asansol', 28),
(80, 'Nanded', 15),
(81, 'Kolhapur', 15),
(82, 'Ajmer', 22),
(83, 'Akola', 15),
(84, 'Gulbarga', 12),
(85, 'Jamnagar', 7),
(86, 'Ujjain', 14),
(87, 'Loni', 27),
(88, 'Siliguri', 28),
(89, 'Jhansi', 27),
(90, 'Ulhasnagar', 15),
(91, 'Jumbo', 10),
(92, 'Sangli-Miraj & Kupwad', 15),
(93, 'Mangalore', 12),
(94, 'Erode', 24),
(95, 'Belgaum', 12),
(96, 'Ambattur', 24),
(97, 'Tirunelveli', 24),
(98, 'Malegaon', 15),
(99, 'Gaya', 4),
(100, 'Jalgaon', 15),
(101, 'Udaipur', 22),
(102, 'Maheshtala', 28),
(103, 'Davanagere', 12),
(104, 'Kozhikode', 13),
(105, 'Kurnool', 1),
(106, 'Rajpur Sonarpur', 28),
(107, 'Rajahmundry', 1),
(108, 'Bocaro', 11),
(109, 'South Dumdum', 28),
(110, 'Bellary', 12),
(111, 'Patiala', 21),
(112, 'Gopalpur', 28),
(113, 'Agartala', 25),
(114, 'Bhagalpur', 4),
(115, 'Muzaffarnagar', 27),
(116, 'Bhatpara', 28),
(117, 'Panihati', 28),
(118, 'Latur', 15),
(119, 'Dhule', 15),
(120, 'Tirupati', 1),
(121, 'Rohtak', 8),
(122, 'Korba', 5),
(123, 'Bhilwara', 22),
(124, 'Berhampur', 20),
(125, 'Muzaffarpur', 4),
(126, 'Ahmednagar', 15),
(127, 'Mathura', 27),
(128, 'Kollam', 13),
(129, 'Avadi', 24),
(130, 'Kadapa', 1),
(131, 'Kamarhati', 28),
(132, 'Sambalpur', 20),
(133, 'Bilaspur', 5),
(134, 'Shahjahanpur', 27),
(135, 'Satara', 15),
(136, 'Bijapur', 12),
(137, 'Rampur', 27),
(138, 'Shivamogga', 12),
(139, 'Chandrapur', 15),
(140, 'Junagadh', 7),
(141, 'Thrissur', 13),
(142, 'Alwar', 22),
(143, 'Bardhaman', 28),
(144, 'Kulti', 28),
(145, 'Kakinada', 1),
(146, 'Nizamabad', 38),
(147, 'Parbhani', 15),
(148, 'Tumkur', 12),
(149, 'Khammam', 38),
(150, 'Ozhukarai', 37),
(151, 'Bihar Sharif', 4),
(152, 'Panipat', 8),
(153, 'Darbhanga', 4),
(154, 'Bally', 28),
(155, 'Aizawl', 18),
(156, 'Dewas', 14),
(157, 'Ichalkaranji', 15),
(158, 'Karnal', 8),
(159, 'Bathinda', 21),
(160, 'Jalna', 15),
(161, 'Eluru', 1),
(162, 'Kirari Suleman Nagar', 35),
(163, 'Barasat', 28),
(164, 'Purnia', 4),
(165, 'Satna', 14),
(166, 'Mau', 27),
(167, 'Sonipat', 8),
(168, 'Farrukhabad', 27),
(169, 'Sagar', 14),
(170, 'Rourkela', 20),
(171, 'Durg', 5),
(172, 'Imphal', 16),
(173, 'Ratlam', 14),
(174, 'Hapur', 27),
(175, 'Arrah', 4),
(176, 'Karimnagar', 38),
(177, 'Anantapur', 1),
(178, 'Etawah', 27),
(179, 'Ambernath', 15),
(180, 'North Dumdum', 28),
(181, 'Bharatpur', 22),
(182, 'Begusarai', 4),
(183, 'New Delhi', 35),
(184, 'Gandhidham', 7),
(185, 'Baranagar', 28),
(186, 'Tiruvottiyur', 24),
(187, 'Pondicherry', 37),
(188, 'Cikar', 22),
(189, 'Thoothukudi', 24),
(190, 'Rewa', 14),
(191, 'Mirzapur', 27),
(192, 'Raichur', 12),
(193, 'Pali', 22),
(194, 'Ramagundam', 38),
(195, 'Haridwar', 26),
(196, 'Vijayanagaram', 1),
(197, 'Katihar', 4),
(198, 'Nagercoil', 24),
(199, 'Sri Ganganagar', 22),
(200, 'Karawal nagar', 35),
(201, 'Mango', 11),
(202, 'Thanjavur', 24),
(203, 'Bulandshahr', 27),
(204, 'Uluberia', 28),
(205, 'Murwara', 27),
(206, 'Sambhal', 27),
(207, 'Singrauli', 14),
(208, 'Nadiad', 7),
(209, 'Secunderabad', 38),
(210, 'Naihati', 28),
(211, 'Yamunanagar', 8),
(212, 'Bidhan Nagar', 28),
(213, 'Pallavaram', 24),
(214, 'Bidar', 12),
(215, 'Munger', 4),
(216, 'Panchkula', 8),
(217, 'Burhanpur', 14),
(218, 'Raurkela Industrial Township', 20),
(219, 'Kharagpur', 28),
(220, 'Dindigul', 24),
(221, 'Gandhinagar', 7),
(222, 'Hospet', 12),
(223, 'Nangloi Jat', 35),
(224, 'English Bazar', 28),
(225, 'Ongole', 1),
(226, 'Deoghar', 11),
(227, 'Chapra', 4),
(228, 'Haldia', 28),
(229, 'Khandwa', 14),
(230, 'Nandyal', 1),
(231, 'Chittoor', 1),
(232, 'Morena', 14),
(233, 'Amroha', 27),
(234, 'Anand', 7),
(235, 'Bhind', 14),
(236, 'Bhalswa Jahangir Pur', 35),
(237, 'Madhyamgram', 28),
(238, 'Bhiwani', 8),
(239, 'Navi Mumbai?Panvel Raigad', 15),
(240, 'Baharampur', 28),
(241, 'Ambala', 8),
(242, 'Morvi', 7),
(243, 'Fatehpur', 27),
(244, 'Rae Bareli', 27),
(245, 'Khora', 27),
(246, 'Bhusawal', 15),
(247, 'Orai', 27),
(248, 'Bahraich', 27),
(249, 'Vellore', 24),
(250, 'Mahesana', 7),
(251, 'Sambalpur', 20),
(252, 'Raiganj', 28),
(253, 'Sirsa', 8),
(254, 'Danapur', 4),
(255, 'Serampore', 28),
(256, 'Sultan Pur Majra', 35),
(257, 'Guna', 14),
(258, 'Junpur', 27),
(259, 'Panvel', 15),
(260, 'Shivpuri', 14),
(261, 'Surendranagar Dudhrej', 7),
(262, 'Unnao', 27),
(263, 'Hugli?and?Chinsurah', 28),
(264, 'Alappuzha', 13),
(265, 'Kottayam', 13),
(266, 'Machilipatnam', 1),
(267, 'Shimla', 9),
(268, 'Adoni', 1),
(269, 'Udupi', 12),
(270, 'Tenali', 1),
(271, 'Proddatur', 1),
(272, 'Saharsa', 4),
(273, 'Hindupur', 1),
(274, 'Sasaram', 4),
(275, 'Hajipur', 4),
(276, 'Bhimavaram', 1),
(277, 'Dehri', 4),
(278, 'Madanapalle', 1),
(279, 'Siwan', 4),
(280, 'Bettiah', 4),
(281, 'Guntakal', 1),
(282, 'Srikakulam', 1),
(283, 'Motihari', 4),
(284, 'Dharmavaram', 1),
(285, 'Gudivada', 1),
(286, 'Narasaraopet', 1),
(287, 'Suryapet', 38),
(288, 'Bagaha', 4),
(289, 'Tadipatri', 1),
(290, 'Kishanganj', 4),
(291, 'Karaikudi', 24),
(292, 'Miryalaguda', 38),
(293, 'Jamalpur', 4),
(294, 'Kavali', 1),
(295, 'Tadepalligudem', 1),
(296, 'Amaravati', 1),
(297, 'Buxar', 4),
(298, 'Jehanabad', 4),
(299, 'Aurangabad', 4);

-- --------------------------------------------------------

--
-- Table structure for table `loan_contact`
--

CREATE TABLE `loan_contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `discription` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_contact`
--

INSERT INTO `loan_contact` (`id`, `name`, `email`, `phone`, `discription`, `created_at`) VALUES
(1, 'shubham', 'php1@itcarewallet.com', '8585916263', 'demo', '2018-10-24 12:28:39'),
(2, 'shubham', 'php1@itcarewallet.com', '8585916263', 'demo', '2018-10-24 12:29:52');

-- --------------------------------------------------------

--
-- Table structure for table `loan_country`
--

CREATE TABLE `loan_country` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(10) NOT NULL,
  `code_3` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_country`
--

INSERT INTO `loan_country` (`id`, `name`, `code`, `code_3`) VALUES
(1, 'Afghanistan', 'AF', 'AFG'),
(2, 'Aland Islands', 'AX', 'ALA'),
(3, 'Albania', 'AL', 'ALB'),
(4, 'Algeria', 'DZ', 'DZA'),
(5, 'American Samoa', 'AS', 'ASM'),
(6, 'Andorra', 'AD', 'AND'),
(7, 'Angola', 'AO', 'AGO'),
(8, 'Anguilla', 'AI', 'AIA'),
(9, 'Antarctica', 'AQ', 'ATA'),
(10, 'Antigua and Barbuda', 'AG', 'ATG'),
(11, 'Argentina', 'AR', 'ARG'),
(12, 'Armenia', 'AM', 'ARM'),
(13, 'Aruba', 'AW', 'ABW'),
(14, 'Australia', 'AU', 'AUS'),
(15, 'Austria', 'AT', 'AUT'),
(16, 'Azerbaijan', 'AZ', 'AZE'),
(17, 'Bahamas', 'BS', 'BHS'),
(18, 'Bahrain', 'BH', 'BHR'),
(19, 'Bangladesh', 'BD', 'BGD'),
(20, 'Barbados', 'BB', 'BRB'),
(21, 'Belarus', 'BY', 'BLR'),
(22, 'Belgium', 'BE', 'BEL'),
(23, 'Belize', 'BZ', 'BLZ'),
(24, 'Benin', 'BJ', 'BEN'),
(25, 'Bermuda', 'BM', 'BMU'),
(26, 'Bhutan', 'BT', 'BTN'),
(27, 'Bolivia', 'BO', 'BOL'),
(28, 'Bosnia and Herzegovina', 'BA', 'BIH'),
(29, 'Botswana', 'BW', 'BWA'),
(30, 'Bouvet Island', 'BV', 'BVT'),
(31, 'Brazil', 'BR', 'BRA'),
(32, 'British Virgin Islands', 'VG', 'VGB'),
(33, 'British Indian Ocean Territory', 'IO', 'IOT'),
(34, 'Brunei Darussalam', 'BN', 'BRN'),
(35, 'Bulgaria', 'BG', 'BGR'),
(36, 'Burkina Faso', 'BF', 'BFA'),
(37, 'Burundi', 'BI', 'BDI'),
(38, 'Cambodia', 'KH', 'KHM'),
(39, 'Cameroon', 'CM', 'CMR'),
(40, 'Canada', 'CA', 'CAN'),
(41, 'Cape Verde', 'CV', 'CPV'),
(42, 'Cayman Islands', 'KY', 'CYM'),
(43, 'Central African Republic', 'CF', 'CAF'),
(44, 'Chad', 'TD', 'TCD'),
(45, 'Chile', 'CL', 'CHL'),
(46, 'China', 'CN', 'CHN'),
(47, 'Hong Kong, SAR China', 'HK', 'HKG'),
(48, 'Macao, SAR China', 'MO', 'MAC'),
(49, 'Christmas Island', 'CX', 'CXR'),
(50, 'Cocos (Keeling) Islands', 'CC', 'CCK'),
(51, 'Colombia', 'CO', 'COL'),
(52, 'Comoros', 'KM', 'COM'),
(53, 'Congo?(Brazzaville)', 'CG', 'COG'),
(54, 'Congo, (Kinshasa)', 'CD', 'COD'),
(55, 'Cook Islands', 'CK', 'COK'),
(56, 'Costa Rica', 'CR', 'CRI'),
(57, 'C?te d\'Ivoire', 'CI', 'CIV'),
(58, 'Croatia', 'HR', 'HRV'),
(59, 'Cuba', 'CU', 'CUB'),
(60, 'Cyprus', 'CY', 'CYP'),
(61, 'Czech Republic', 'CZ', 'CZE'),
(62, 'Denmark', 'DK', 'DNK'),
(63, 'Djibouti', 'DJ', 'DJI'),
(64, 'Dominica', 'DM', 'DMA'),
(65, 'Dominican Republic', 'DO', 'DOM'),
(66, 'Ecuador', 'EC', 'ECU'),
(67, 'Egypt', 'EG', 'EGY'),
(68, 'El Salvador', 'SV', 'SLV'),
(69, 'Equatorial Guinea', 'GQ', 'GNQ'),
(70, 'Eritrea', 'ER', 'ERI'),
(71, 'Estonia', 'EE', 'EST'),
(72, 'Ethiopia', 'ET', 'ETH'),
(73, 'Falkland Islands (Malvinas)', 'FK', 'FLK'),
(74, 'Faroe Islands', 'FO', 'FRO'),
(75, 'Fiji', 'FJ', 'FJI'),
(76, 'Finland', 'FI', 'FIN'),
(77, 'France', 'FR', 'FRA'),
(78, 'French Guiana', 'GF', 'GUF'),
(79, 'French Polynesia', 'PF', 'PYF'),
(80, 'French Southern Territories', 'TF', 'ATF'),
(81, 'Gabon', 'GA', 'GAB'),
(82, 'Gambia', 'GM', 'GMB'),
(83, 'Georgia', 'GE', 'GEO'),
(84, 'Germany', 'DE', 'DEU'),
(85, 'Ghana', 'GH', 'GHA'),
(86, 'Gibraltar', 'GI', 'GIB'),
(87, 'Greece', 'GR', 'GRC'),
(88, 'Greenland', 'GL', 'GRL'),
(89, 'Grenada', 'GD', 'GRD'),
(90, 'Guadeloupe', 'GP', 'GLP'),
(91, 'Guam', 'GU', 'GUM'),
(92, 'Guatemala', 'GT', 'GTM'),
(93, 'Guernsey', 'GG', 'GGY'),
(94, 'Guinea', 'GN', 'GIN'),
(95, 'Guinea-Bissau', 'GW', 'GNB'),
(96, 'Guyana', 'GY', 'GUY'),
(97, 'Haiti', 'HT', 'HTI'),
(98, 'Heard and Mcdonald Islands', 'HM', 'HMD'),
(99, 'Holy See?(Vatican City State)', 'VA', 'VAT'),
(100, 'Honduras', 'HN', 'HND'),
(101, 'Hungary', 'HU', 'HUN'),
(102, 'Iceland', 'IS', 'ISL'),
(103, 'India', 'IN', 'IND'),
(104, 'Indonesia', 'ID', 'IDN'),
(105, 'Islamic Republic of Iran', 'IR', 'IRN'),
(106, 'Iraq', 'IQ', 'IRQ'),
(107, 'Ireland', 'IE', 'IRL'),
(108, 'Isle of Man', 'IM', 'IMN'),
(109, 'Israel', 'IL', 'ISR'),
(110, 'Italy', 'IT', 'ITA'),
(111, 'Jamaica', 'JM', 'JAM'),
(112, 'Japan', 'JP', 'JPN'),
(113, 'Jersey', 'JE', 'JEY'),
(114, 'Jordan', 'JO', 'JOR'),
(115, 'Kazakhstan', 'KZ', 'KAZ'),
(116, 'Kenya', 'KE', 'KEN'),
(117, 'Kiribati', 'KI', 'KIR'),
(118, 'Korea?(North)', 'KP', 'PRK'),
(119, 'Korea?(South)', 'KR', 'KOR'),
(120, 'Kuwait', 'KW', 'KWT'),
(121, 'Kyrgyzstan', 'KG', 'KGZ'),
(122, 'Lao PDR', 'LA', 'LAO'),
(123, 'Latvia', 'LV', 'LVA'),
(124, 'Lebanon', 'LB', 'LBN'),
(125, 'Lesotho', 'LS', 'LSO'),
(126, 'Liberia', 'LR', 'LBR'),
(127, 'Libya', 'LY', 'LBY'),
(128, 'Liechtenstein', 'LI', 'LIE'),
(129, 'Lithuania', 'LT', 'LTU'),
(130, 'Luxembourg', 'LU', 'LUX'),
(131, 'Macedonia, Republic of', 'MK', 'MKD'),
(132, 'Madagascar', 'MG', 'MDG'),
(133, 'Malawi', 'MW', 'MWI'),
(134, 'Malaysia', 'MY', 'MYS'),
(135, 'Maldives', 'MV', 'MDV'),
(136, 'Mali', 'ML', 'MLI'),
(137, 'Malta', 'MT', 'MLT'),
(138, 'Marshall Islands', 'MH', 'MHL'),
(139, 'Martinique', 'MQ', 'MTQ'),
(140, 'Mauritania', 'MR', 'MRT'),
(141, 'Mauritius', 'MU', 'MUS'),
(142, 'Mayotte', 'YT', 'MYT'),
(143, 'Mexico', 'MX', 'MEX'),
(144, 'Federated States of Micronesia', 'FM', 'FSM'),
(145, 'Moldova', 'MD', 'MDA'),
(146, 'Monaco', 'MC', 'MCO'),
(147, 'Mongolia', 'MN', 'MNG'),
(148, 'Montenegro', 'ME', 'MNE'),
(149, 'Montserrat', 'MS', 'MSR'),
(150, 'Morocco', 'MA', 'MAR'),
(151, 'Mozambique', 'MZ', 'MOZ'),
(152, 'Myanmar', 'MM', 'MMR'),
(153, 'Namibia', 'NA', 'NAM'),
(154, 'Nauru', 'NR', 'NRU'),
(155, 'Nepal', 'NP', 'NPL'),
(156, 'Netherlands', 'NL', 'NLD'),
(157, 'Netherlands Antilles', 'AN', 'ANT'),
(158, 'New Caledonia', 'NC', 'NCL'),
(159, 'New Zealand', 'NZ', 'NZL'),
(160, 'Nicaragua', 'NI', 'NIC'),
(161, 'Niger', 'NE', 'NER'),
(162, 'Nigeria', 'NG', 'NGA'),
(163, 'Niue', 'NU', 'NIU'),
(164, 'Norfolk Island', 'NF', 'NFK'),
(165, 'Northern Mariana Islands', 'MP', 'MNP'),
(166, 'Norway', 'NO', 'NOR'),
(167, 'Oman', 'OM', 'OMN'),
(168, 'Pakistan', 'PK', 'PAK'),
(169, 'Palau', 'PW', 'PLW'),
(170, 'Palestinian Territory', 'PS', 'PSE'),
(171, 'Panama', 'PA', 'PAN'),
(172, 'Papua New Guinea', 'PG', 'PNG'),
(173, 'Paraguay', 'PY', 'PRY'),
(174, 'Peru', 'PE', 'PER'),
(175, 'Philippines', 'PH', 'PHL'),
(176, 'Pitcairn', 'PN', 'PCN'),
(177, 'Poland', 'PL', 'POL'),
(178, 'Portugal', 'PT', 'PRT'),
(179, 'Puerto Rico', 'PR', 'PRI'),
(180, 'Qatar', 'QA', 'QAT'),
(181, 'R?union', 'RE', 'REU'),
(182, 'Romania', 'RO', 'ROU'),
(183, 'Russian Federation', 'RU', 'RUS'),
(184, 'Rwanda', 'RW', 'RWA'),
(185, 'Saint-Barth?lemy', 'BL', 'BLM'),
(186, 'Saint Helena', 'SH', 'SHN'),
(187, 'Saint Kitts and Nevis', 'KN', 'KNA'),
(188, 'Saint Lucia', 'LC', 'LCA'),
(189, 'Saint-Martin (French part)', 'MF', 'MAF'),
(190, 'Saint Pierre and Miquelon', 'PM', 'SPM'),
(191, 'Saint Vincent and Grenadines', 'VC', 'VCT'),
(192, 'Samoa', 'WS', 'WSM'),
(193, 'San Marino', 'SM', 'SMR'),
(194, 'Sao Tome and Principe', 'ST', 'STP'),
(195, 'Saudi Arabia', 'SA', 'SAU'),
(196, 'Senegal', 'SN', 'SEN'),
(197, 'Serbia', 'RS', 'SRB'),
(198, 'Seychelles', 'SC', 'SYC'),
(199, 'Sierra Leone', 'SL', 'SLE'),
(200, 'Singapore', 'SG', 'SGP'),
(201, 'Slovakia', 'SK', 'SVK'),
(202, 'Slovenia', 'SI', 'SVN'),
(203, 'Solomon Islands', 'SB', 'SLB'),
(204, 'Somalia', 'SO', 'SOM'),
(205, 'South Africa', 'ZA', 'ZAF'),
(206, 'South Georgia and the South Sandwich Islands', 'GS', 'SGS'),
(207, 'South Sudan', 'SS', 'SSD'),
(208, 'Spain', 'ES', 'ESP'),
(209, 'Sri Lanka', 'LK', 'LKA'),
(210, 'Sudan', 'SD', 'SDN'),
(211, 'Suriname', 'SR', 'SUR'),
(212, 'Svalbard and Jan Mayen Islands', 'SJ', 'SJM'),
(213, 'Swaziland', 'SZ', 'SWZ'),
(214, 'Sweden', 'SE', 'SWE'),
(215, 'Switzerland', 'CH', 'CHE'),
(216, 'Syrian Arab Republic?(Syria)', 'SY', 'SYR'),
(217, 'Taiwan, Republic of China', 'TW', 'TWN'),
(218, 'Tajikistan', 'TJ', 'TJK'),
(219, 'United Republic of Tanzania', 'TZ', 'TZA'),
(220, 'Thailand', 'TH', 'THA'),
(221, 'Timor-Leste', 'TL', 'TLS'),
(222, 'Togo', 'TG', 'TGO'),
(223, 'Tokelau', 'TK', 'TKL'),
(224, 'Tonga', 'TO', 'TON'),
(225, 'Trinidad and Tobago', 'TT', 'TTO'),
(226, 'Tunisia', 'TN', 'TUN'),
(227, 'Turkey', 'TR', 'TUR'),
(228, 'Turkmenistan', 'TM', 'TKM'),
(229, 'Turks and Caicos Islands', 'TC', 'TCA'),
(230, 'Tuvalu', 'TV', 'TUV'),
(231, 'Uganda', 'UG', 'UGA'),
(232, 'Ukraine', 'UA', 'UKR'),
(233, 'United Arab Emirates', 'AE', 'ARE'),
(234, 'United Kingdom', 'GB', 'GBR'),
(235, 'United States of America', 'US', 'USA'),
(236, 'US Minor Outlying Islands', 'UM', 'UMI'),
(237, 'Uruguay', 'UY', 'URY'),
(238, 'Uzbekistan', 'UZ', 'UZB'),
(239, 'Vanuatu', 'VU', 'VUT'),
(240, 'Venezuela?(Bolivarian Republic)', 'VE', 'VEN'),
(241, 'Viet Nam', 'VN', 'VNM'),
(242, 'Virgin Islands, US', 'VI', 'VIR'),
(243, 'Wallis and Futuna Islands', 'WF', 'WLF'),
(244, 'Western Sahara', 'EH', 'ESH'),
(245, 'Yemen', 'YE', 'YEM'),
(246, 'Zambia', 'ZM', 'ZMB'),
(247, 'Zimbabwe', 'ZW', 'ZWE');

-- --------------------------------------------------------

--
-- Table structure for table `loan_information`
--

CREATE TABLE `loan_information` (
  `id` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `salary` double(10,2) NOT NULL,
  `amount` double(10,2) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `loan_type` varchar(100) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `city` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `country` int(11) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `created_date` varchar(255) NOT NULL,
  `approval_date` date NOT NULL,
  `approval_end_date` varchar(255) NOT NULL,
  `balance` double(10,2) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `api_key` varchar(255) NOT NULL,
  `kyc_status` enum('0','1','2') NOT NULL,
  `Property_detail` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `month_emi` varchar(255) NOT NULL,
  `intrest_rate` int(11) NOT NULL,
  `emi_type_payment` varchar(255) NOT NULL,
  `job_year` int(11) NOT NULL,
  `emi_amount` varchar(255) NOT NULL,
  `tenure` varchar(255) NOT NULL,
  `property` varchar(255) NOT NULL,
  `cibil` varchar(255) NOT NULL,
  `is_deleted` enum('0','1') NOT NULL,
  `parent_id` int(11) NOT NULL,
  `referal_id` varchar(200) NOT NULL,
  `wl_id` int(11) NOT NULL,
  `var_key` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_information`
--

INSERT INTO `loan_information` (`id`, `user_type`, `name`, `gender`, `salary`, `amount`, `email`, `dob`, `loan_type`, `mobile`, `password`, `address1`, `address2`, `city`, `state`, `country`, `pincode`, `created_date`, `approval_date`, `approval_end_date`, `balance`, `status`, `api_key`, `kyc_status`, `Property_detail`, `location`, `month_emi`, `intrest_rate`, `emi_type_payment`, `job_year`, `emi_amount`, `tenure`, `property`, `cibil`, `is_deleted`, `parent_id`, `referal_id`, `wl_id`, `var_key`) VALUES
(13, 4, 'shubham', '', 4400.00, 34324.00, 'sahutech8@gmail.com', '2018-10-28', 'Home', '8585916263', '', 'demo', '', 264, 13, 103, '', 'Sunday 28th of October 2018 05:15:22 AM', '2018-10-28', '', 40000.00, '0', '', '0', '1', 'Delhi', '11', 11, 'Online', 15, '48400', '6', '1', 'Good', '0', 0, '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `loan_message`
--

CREATE TABLE `loan_message` (
  `id` int(11) NOT NULL,
  `tkt_id` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_message`
--

INSERT INTO `loan_message` (`id`, `tkt_id`, `user_id`, `message`, `date_time`) VALUES
(8, 'tkt-hhuSmba-98020', 6, 'demo', '2018-10-29 17:32:43'),
(9, 'tkt-hhuSmba-98020', 3, 'sdsdsdsdewewewe', '2018-10-29 17:37:59'),
(10, 'tkt-hhuSmba-98020', 6, 'reewrewrewr', '2018-10-29 17:38:04'),
(20, 'tkt-mhuSbah-59071', 6, 'dsgsdsgdsfdsf', '2018-10-29 17:56:18'),
(21, 'tkt-mhuSbah-59071', 3, 'dsgfsdfdsf', '2018-10-29 17:56:26'),
(22, 'tkt-hhuSmba-98020', 3, 'dafdsfdsf', '2018-10-30 10:23:34'),
(23, 'tkt-hhuSmba-98020', 6, 'gvdsfgfdgfdgfd', '2018-10-30 10:23:43'),
(24, 'tkt-hhuSmba-98020', 6, 'sadfdsadfsads', '2018-10-30 11:14:15'),
(25, 'tkt-hhuSmba-98020', 3, 'hello', '2018-10-31 14:52:51'),
(26, 'tkt-hhuSmba-98020', 3, 'hello', '2018-10-31 14:55:21'),
(27, 'tkt-hhuSmba-98020', 3, 'hello', '2018-10-31 14:59:38'),
(28, 'tkt-hhuSmba-98020', 3, 'hello', '2018-10-31 14:59:56'),
(29, 'tkt-hhuSmba-98020', 3, 'hello', '2018-10-31 15:00:04'),
(30, 'tkt-hhuSmba-98020', 3, 'hello', '2018-10-31 15:00:12'),
(31, 'tkt-hhuSmba-98020', 3, 'safdasdfsad', '2018-10-31 15:00:47'),
(32, 'tkt-hhuSmba-98020', 3, 'sdsadsadsadasd', '2018-10-31 15:00:59'),
(33, 'tkt-hhuSmba-98020', 3, 'sadasdsadsad', '2018-10-31 15:03:37'),
(34, 'tkt-hhuSmba-98020', 3, 'wwwww', '2018-10-31 15:03:42'),
(35, 'tkt-mhufbah-59071', 3, 'dfgfdgfdgfdg', '2018-10-31 15:08:38'),
(36, 'tkt-mhufbah-59071', 3, 'hello dear', '2018-10-31 15:08:45'),
(37, 'tkt-mhufbah-59071', 3, 'asksdkhgsajd', '2018-10-31 15:08:55'),
(38, 'tkt-mhufbah-59071', 3, 'sasafsajhdgfjsadasdsadsad', '2018-10-31 15:10:04'),
(39, 'tkt-mhufbah-59071', 3, 'asrfsfrdsfdsfdsf', '2018-10-31 15:10:11');

-- --------------------------------------------------------

--
-- Table structure for table `loan_message_query`
--

CREATE TABLE `loan_message_query` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tkt_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `agent` varchar(255) NOT NULL,
  `agent_mobile` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_message_query`
--

INSERT INTO `loan_message_query` (`id`, `user_id`, `tkt_id`, `name`, `mobile`, `message`, `agent`, `agent_mobile`, `status`, `date_time`) VALUES
(9, 6, 'tkt-hhuSmba-98020', 'Shubham', '8585916263', 'I want to sort my database values in descending order using this query below in my model. However, it doesn\'t completely sort in descending order all the values in the database but when ascending is used, it works well.', 'asdsfasdsad', '9457120207', 1, '2018-10-29 15:24:45'),
(10, 6, 'tkt-mhufbah-59071', 'Shubham', '8585916263', 'I want to sort my database values in descending order using this query below in my model. However, it doesn\'t completely sort in descending order all the values in the database .', 'asdsfasdsad', '9457120207', 1, '2018-10-29 15:38:55'),
(11, 6, 'tkt-mhurbah-59071', 'Shubham', '8585916263', 'I want to sort my database values in descending order using this query below in my model. However, it doesn\'t completely sort in descending order all the values in the database but , it works well.', 'asdsfasdsad', '9457120207', 1, '2018-10-29 15:38:55'),
(12, 6, 'tkt-mhwSbah-59071', 'Shubham', '8585916263', 'I want to sort my database values in descending order using this query below in my model. However, it doesn\'t completely sort in  but when ascending is used, it works well.', 'asdsfasdsad', '9457120207', 1, '2018-10-29 15:38:55');

-- --------------------------------------------------------

--
-- Table structure for table `loan_news_cat`
--

CREATE TABLE `loan_news_cat` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `type` int(11) NOT NULL COMMENT '1=>news, 2=>blogs',
  `status` int(11) NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL,
  `wl_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `loan_news_details`
--

CREATE TABLE `loan_news_details` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL,
  `wl_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `loan_permissions`
--

CREATE TABLE `loan_permissions` (
  `id` int(10) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `data` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_permissions`
--

INSERT INTO `loan_permissions` (`id`, `user_type`, `data`) VALUES
(1, '1', '{"whitelabel":{"own_create":"1","own_read":"1","own_update":"1","own_delete":"1"},"reports":{"own_create":"1","own_read":"1","own_update":"1","own_delete":"1","all_read":"1","all_update":"1","all_delete":"1"},"dashboard":{"own_read":"1"},"settings":{"own_read":"1"},"usermanagement":{"own_read":"1","all_read":"1"},"sidebarmenumanagement":{"own_read":"1"},"customer":{"own_read":"1"},"um":{"own_read":"1","all_read":"1"},"agents":{"own_create":"1","own_read":"1","own_update":"1","own_delete":"1","all_read":"1"},"ccusers":{"own_create":"1","own_read":"1","own_update":"1","own_delete":"1","all_read":"1"},"loancategory":{"own_read":"1"},"support":{"own_read":"1","all_read":"1"},"loanApply":{"own_read":"1"},"loanapply":{"own_read":"1"},"payment":{"own_read":"1"},"loanpayment":{"own_read":"1"}}');

-- --------------------------------------------------------

--
-- Table structure for table `loan_setting`
--

CREATE TABLE `loan_setting` (
  `id` int(122) UNSIGNED NOT NULL,
  `keys` varchar(255) DEFAULT NULL,
  `value` longtext,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_setting`
--

INSERT INTO `loan_setting` (`id`, `keys`, `value`, `user_id`) VALUES
(1, 'website', 'localhost', 1),
(2, 'logo', 'logo_1532086536.png', 1),
(3, 'favicon', 'favicon_1532086536.ico', 1),
(4, 'SMTP_EMAIL', 'noreply@loansahara.pw', 1),
(5, 'HOST', 'mail.loansahara.pw', 1),
(6, 'PORT', '465', 1),
(7, 'SMTP_SECURE', 'ssl', 1),
(8, 'SMTP_PASSWORD', 'jK5qC$w39$C-', 1),
(9, 'mail_setting', 'simple_mail', 1),
(10, 'company_name', 'Loan Sahara', 1),
(11, 'preloader', 'preloader.gif', 1),
(12, 'EMAIL', 'care@bgc.ooo', 1),
(13, 'UserModules', 'yes', 1),
(14, 'register_allowed', '1', 1),
(15, 'email_invitation', '1', 1),
(16, 'admin_approval', '0', 1),
(17, 'user_type', '["Member"]', 1),
(18, 'version', '1.0', 1),
(19, 'company_api_url', 'http://13.127.79.121/itcare.net/', 1),
(20, 'api_key', '88a843b6dfedecc66dd699716b537bac', 1),
(21, 'title1', 'Loan', 1),
(22, 'title2', 'Sahara', 1),
(23, 'menu', '[{"text":"Dashboard","href":"dashboard","icon":"fa fa-dashboard","target":"_self","title":"Dashboard","permission_type":"DASHBOARD","segmentNo":"1","segmentName":""},{"text":"Reports","href":"#","icon":"fa fa-file-o","target":"_self","title":"Reports","permission_type":"Reports","segmentNo":"1","segmentName":""},{"text":"User Management","href":"#","icon":"fa fa-user-secret","target":"_self","title":"","permission_type":"um","segmentNo":"1","segmentName":"white-label-users","children":[{"text":"Agents","href":"agents","icon":"fa fa-circle-o","target":"_self","title":"Agents","permission_type":"AGENTS","segmentNo":"1","segmentName":""},{"text":"Customers","href":"customer","icon":"fa fa-circle-o","target":"_self","title":"","permission_type":"customer","segmentNo":"","segmentName":""},{"text":"Customer Care","href":"customer-care-users","icon":"fa fa-circle-o","target":"_self","title":"Customer Care","permission_type":"CCUSERS","segmentNo":"1","segmentName":""}]},{"text":"Communication System","href":"#","icon":"fa fa-wechat","target":"_self","title":"","permission_type":"COM","segmentNo":"","segmentName":""},{"text":"SMS ","href":"#","icon":"fa fa-envelope-o","target":"_self","title":"","permission_type":"","segmentNo":"","segmentName":""},{"text":"Settings","href":"#","icon":"fa fa-cogs","target":"_self","title":"","permission_type":"settings","segmentNo":"1","segmentName":"","children":[{"text":"User Permission Manager","href":"permission","icon":"fa fa-user-plus","target":"_self","title":"","permission_type":"usermanagement","segmentNo":"1","segmentName":"permission"},{"text":"Sidebar Menu","href":"admin-menu","icon":"fa fa-align-justify","target":"_self","title":"","permission_type":"sidebarmenumanagement","segmentNo":"1","segmentName":"admin-menu1"},{"text":"Profile","href":"profile","icon":"fa fa-credit-card","target":"_self","title":"","permission_type":"","segmentNo":"1","segmentName":"profile"},{"text":"Logout","href":"logout","icon":"fa fa-sign-in","target":"_self","title":"","permission_type":"","segmentNo":"1","segmentName":"logout"}]},{"text":"Feedback ","href":"#","icon":"fa fa-thumbs-up","target":"_self","title":"","permission_type":"","segmentNo":"","segmentName":""},{"text":"Support  Ticket","href":"#","icon":"fa fa-headphones","target":"_self","title":"","permission_type":"","segmentNo":"","segmentName":""},{"text":"Loan Category","href":"loancatagory","icon":"fa fa-adn","target":"_self","title":"","permission_type":"loancategory","segmentNo":"","segmentName":""},{"text":"Customer Support","href":"support","icon":"fa fa-align-right","target":"_self","title":"Customer Support","permission_type":"support","segmentNo":"","segmentName":""},{"text":"Loan Apply","href":"loanapply","icon":"fa fa-download","target":"_self","title":"Loan Apply","permission_type":"loanapply","segmentNo":"1","segmentName":""},{"text":"Loan Payment","href":"payment","icon":"fa fa-money","target":"_self","title":"Payment","permission_type":"loanpayment","segmentNo":"","segmentName":""}]', 1),
(24, 'color', '#d3312f', 1),
(71, 'address', 'ITCARE INFOTECH 8TH Floor Unit No :853 , Spaze I- Tech Park,Sohna Road, Gurgaon Hr.122018', 1),
(72, 'contact_no', '+91 9999417007', 1),
(73, 'toll_free_no', '1800-2702-853', 1),
(80, 'facebook', 'https://www.facebook.com/itcare.infotech.5', 1),
(81, 'twitter', 'https://twitter.com/account/suspended', 1),
(82, 'linkedin', 'https://www.linkedin.com/in/itcare-infotech-916b25164/', 1),
(83, 'instagram', '', 1),
(92, 'Corporate_website', '', 1),
(95, 'app_link', 'https://itcareapi.in/ItCare%20Agents.apk', 1),
(98, 'sms_api_key', '2d65ff3336016981a8d4e0464db1d538', 1),
(99, 'sms_sender_id', 'ITCARE', 1),
(100, 'sms_alerts', '0', 1),
(101, 'virtual_fund', '1', 1),
(102, 'mail_setting', 'php_mailer', 1),
(103, 'svg', '', 1),
(141, 'BDE_NAME', 'Prateek Verma', 1),
(142, 'BDE_EMAIL', 'development@bgc.ooo', 1),
(143, 'BDE_PHONE', '+91 8750123425', 1);

-- --------------------------------------------------------

--
-- Table structure for table `loan_state`
--

CREATE TABLE `loan_state` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `state_code` varchar(10) NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_state`
--

INSERT INTO `loan_state` (`id`, `name`, `state_code`, `country_id`) VALUES
(1, 'Andhra Pradesh', 'AP', 103),
(2, 'Arunachal Pradesh', 'AR', 103),
(3, 'Assam', 'AS', 103),
(4, 'Bihar', 'BR', 103),
(5, 'Chhattisgarh', 'CG', 103),
(6, 'Goa', 'GA', 103),
(7, 'Gujarat', 'GJ', 103),
(8, 'Haryana', 'HR', 103),
(9, 'Himachal Pradesh', 'HP', 103),
(10, 'Jammu and kashmir', 'JK', 103),
(11, 'Jharkhand', 'JH', 103),
(12, 'Karnataka', 'KA', 103),
(13, 'Kerala', 'KL', 103),
(14, 'Madhya Pradesh', 'MP', 103),
(15, 'Maharashtra', 'MH', 103),
(16, 'Manipur', 'MN', 103),
(17, 'Meghalaya', 'ML', 103),
(18, 'Mizoram', 'MZ', 103),
(19, 'Nagaland', 'NL', 103),
(20, 'Orissa', 'OR', 103),
(21, 'Punjab', 'PB', 103),
(22, 'Rajasthan', 'RJ', 103),
(23, 'Sikkim', 'SK', 103),
(24, 'Tamil Nadu', 'TN', 103),
(25, 'Tripura', 'TR', 103),
(26, 'Uttarakhand', 'UK', 103),
(27, 'Uttar Pradesh', 'UP', 103),
(28, 'West bengal', 'WB', 103),
(29, 'Tamil Nadu', 'TN', 103),
(30, 'Tripura', 'TR', 103),
(31, 'Andaman and Nicobar Islands', 'AN', 103),
(32, 'Chandigarh', 'CH', 103),
(33, 'Dadra and Nagar Haveli', 'DH', 103),
(34, 'Daman and Diu', 'DD', 103),
(35, 'Delhi', 'DL', 103),
(36, 'Lakshadweep', 'LD', 103),
(37, 'Pondicherry', 'PY', 103),
(38, 'Telangana', 'TS', 103);

-- --------------------------------------------------------

--
-- Table structure for table `loan_subcatgory`
--

CREATE TABLE `loan_subcatgory` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_subcatgory`
--

INSERT INTO `loan_subcatgory` (`id`, `cat_id`, `name`, `status`, `created_date`, `updated_date`) VALUES
(1, 1, 'Consulting & Coaching', 1, '2018-09-05 07:19:20', '2018-09-05 07:41:04'),
(2, 1, 'Services & Maintenance', 1, '2018-09-05 06:19:21', '2018-09-05 07:41:04'),
(3, 2, 'Fashion & Clothing', 1, '2018-09-05 07:19:17', '2018-09-05 07:42:58'),
(4, 2, 'Jewelry & Accessories', 1, '2018-09-05 07:19:20', '2018-09-05 07:42:58'),
(7, 3, 'Events & Portraits', 1, '2018-09-05 10:25:27', '2018-09-05 07:44:42'),
(8, 3, 'Commercial & Editorial', 1, '2018-09-05 07:18:21', '2018-09-05 07:44:42');

-- --------------------------------------------------------

--
-- Table structure for table `loan_ticketreplies`
--

CREATE TABLE `loan_ticketreplies` (
  `id` int(10) NOT NULL,
  `ticketid` int(10) DEFAULT NULL,
  `body` longtext COLLATE utf8_unicode_ci,
  `replier` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `replierid` int(10) DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loan_tickets`
--

CREATE TABLE `loan_tickets` (
  `id` int(10) NOT NULL,
  `ticket_code` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `subject` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `body` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `status` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `department` int(11) DEFAULT NULL,
  `reporter` int(10) DEFAULT '0',
  `priority` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `additional` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `attachment` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `archived_t` int(2) DEFAULT '0',
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `loan_users`
--

CREATE TABLE `loan_users` (
  `id` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `salary` double(10,2) NOT NULL,
  `emp_type` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `emp_occupation` varchar(255) NOT NULL,
  `bank_address` text NOT NULL,
  `amount` double(10,2) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `city` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `country` int(11) NOT NULL,
  `marital` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `last_login_date` datetime NOT NULL,
  `last_login_ip` varchar(255) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `balance` double(10,2) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `is_email_verified` enum('0','1') NOT NULL,
  `is_mobile_verified` enum('0','1') NOT NULL,
  `pan_no` varchar(200) NOT NULL,
  `pan_pic` varchar(200) NOT NULL,
  `aadhar_no` varchar(200) NOT NULL,
  `aadhar_pic` varchar(200) NOT NULL,
  `gst_no` varchar(200) NOT NULL,
  `api_key` varchar(255) NOT NULL,
  `kyc_status` enum('0','1','2') NOT NULL,
  `cibil_status_image` varchar(255) NOT NULL,
  `cibli_status` int(11) NOT NULL DEFAULT '0' COMMENT '0=>Pending, 1=>Good, 2=>Better,3=>Best,4=>poor, 5=>very Poor',
  `cibil` varchar(255) NOT NULL,
  `profile_status` int(11) NOT NULL DEFAULT '10',
  `is_deleted` enum('0','1') NOT NULL,
  `parent_id` int(11) NOT NULL,
  `referal_id` varchar(200) NOT NULL,
  `wl_id` int(11) NOT NULL,
  `var_key` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_users`
--

INSERT INTO `loan_users` (`id`, `user_type`, `name`, `gender`, `salary`, `emp_type`, `bank_name`, `emp_occupation`, `bank_address`, `amount`, `qualification`, `email`, `dob`, `mobile`, `password`, `address1`, `nationality`, `address2`, `city`, `state`, `country`, `marital`, `pincode`, `created_date`, `modified_date`, `last_login_date`, `last_login_ip`, `profile_pic`, `balance`, `status`, `is_email_verified`, `is_mobile_verified`, `pan_no`, `pan_pic`, `aadhar_no`, `aadhar_pic`, `gst_no`, `api_key`, `kyc_status`, `cibil_status_image`, `cibli_status`, `cibil`, `profile_status`, `is_deleted`, `parent_id`, `referal_id`, `wl_id`, `var_key`) VALUES
(1, 2, 'Itcare Website', '', 0.00, '', '', '', '', 0.00, '', 'care@itcarewallet.com', '', '9999417007', 'e10adc3949ba59abbe56e057f20f883e', 'Unit No - 853, Tower B2,', '', 'Sapze Itech Park, Sector 49', 55, 8, 103, '', '122001', '2018-08-14 15:35:24', '2018-09-28 11:51:39', '2018-10-25 11:18:38', '::1', '', 0.00, '1', '0', '0', '', '', '123456789111', '', '', '7fee196b3a3c809006898fc4f2022c3d', '1', '', 0, '', 0, '0', 1, '', 1, ''),
(2, 1, 'Prateek Verma', '', 0.00, '', '', '', '', 0.00, '', 'development@itcarewallet.com', '', '9999040313', '827ccb0eea8a706c4c34a16891f84e7b', 'Unit No - 853, Tower B2,', '', 'Sapze Itech Park, Sector 49', 55, 8, 103, '', '122001', '2018-07-23 09:32:36', '2018-09-27 13:06:40', '2018-11-01 10:15:00', '::1', '4b3c27a52fa20ad58666b1b384418947.jpg', 0.00, '1', '1', '1', 'AMJPA5585D', '66c2caa6f1a9ae6a728d91dc97e20f08.jpg', '432143214321', 'a9f6f9f65b1b9d2a059450907be8f2aa.jpg', '', '88a843b6dfedecc66dd699716b537bac', '1', '', 0, '', 0, '0', 0, '', 1, ''),
(3, 3, 'Prateek', '', 0.00, '', '', '', '', 0.00, '', 'pv16061995@gmail.com', '', '9457120207', 'e10adc3949ba59abbe56e057f20f883e', 'Spaze itech park', '', 'Sec 49', 2, 8, 103, '', '121212', '2018-09-28 10:42:48', '2018-09-28 10:53:39', '2018-10-25 15:06:23', '::1', '64348aa34827f400fdd37ae78869a7f5.png', 0.00, '1', '0', '0', '', '', '121212121212', '', '', '50e4b7bf992f7a7b729f3f948ea6d66b', '0', '', 0, '', 0, '0', 2, '', 1, ''),
(6, 4, 'Shubham', 'Male', 2.00, 'SALARIED_DOCTOR', 'HDFC Bank', 'Private', 'adsadsfdasfsdf', 0.00, 'Bachelors Degree', 'sahutech8@gmail.com', '2018-10-12', '8585916263', '827ccb0eea8a706c4c34a16891f84e7b', 'Spaze itech park', 'Indian', 'Sec 49', 14, 1, 103, 'Married', '121212', '2018-09-28 10:42:48', '2018-09-28 10:53:39', '2018-10-22 00:00:00', '', '64348aa34827f400fdd37ae78869a7f5.png', 100000.00, '1', '0', '0', '112222222222222222222222222', '4431edeb08db7be0794e3be84a844936.gif', '11111111111111111111111111', '9866bcc270bdf9ba759a07ca4402ac52.png', '', '50e4b7bf992f7a7b729f3f948ea6d66b', '0', '', 0, '', 30, '0', 3, '', 1, ''),
(13, 4, 'Shubham sahu', 'Male', 2.00, 'SALARIED_DOCTOR', 'HDFC Bank', 'Private', 'adsadsfdasfsdf', 0.00, 'Bachelors Degree', 'shubham8@gmail.com', '2018-10-12', '8585916264', '827ccb0eea8a706c4c34a16891f84e7b', 'Spaze itech park', 'Indian', 'Sec 49', 14, 1, 103, 'Married', '121212', '2018-09-28 10:42:48', '2018-09-28 10:53:39', '2018-10-22 00:00:00', '', '64348aa34827f400fdd37ae78869a7f5.png', 100000.00, '1', '0', '0', '112222222222222222222222222', '4431edeb08db7be0794e3be84a844936.gif', '11111111111111111111111111', '9866bcc270bdf9ba759a07ca4402ac52.png', '', '50e4b7bf992f7a7b729f3f948ea6d66b', '0', '', 0, '', 30, '0', 3, '', 1, ''),
(16, 4, '', '', 0.00, '', '', '', '', 0.00, '', 'shubhamsahu707@gmail.com', '', '8700292753', '787e0409fd2768981687d3ddd1775e9f', '', '', '', 0, 0, 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 0.00, '0', '0', '0', '', '', '', '', '', '', '0', '', 0, '', 10, '0', 0, '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `loan_user_login`
--

CREATE TABLE `loan_user_login` (
  `id` int(11) NOT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `ip_addr` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_user_login`
--

INSERT INTO `loan_user_login` (`id`, `mobile_no`, `ip_addr`, `date_time`) VALUES
(1, '8585916263', '::1', '2018-10-26 05:24:42'),
(2, '8585916263', '::1', '2018-10-28 06:20:59'),
(3, '8585916263', '::1', '2018-10-28 07:02:12'),
(4, '8585916263', '::1', '2018-10-28 17:36:44'),
(5, '8585916263', '::1', '2018-10-29 04:38:14'),
(6, '8585916263', '::1', '2018-10-29 10:53:19'),
(7, '8585916263', '::1', '2018-10-29 11:12:03'),
(8, '8585916263', '::1', '2018-10-30 04:50:47'),
(9, '8585916263', '::1', '2018-10-30 06:39:14'),
(10, '8585916263', '::1', '2018-10-31 05:26:24');

-- --------------------------------------------------------

--
-- Table structure for table `loan_user_permissions`
--

CREATE TABLE `loan_user_permissions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_user_permissions`
--

INSERT INTO `loan_user_permissions` (`id`, `name`) VALUES
(1, 'agents'),
(2, 'reports'),
(12, 'settings'),
(13, 'usermanagement'),
(14, 'sidebarmenumanagement'),
(27, 'customer'),
(29, 'um'),
(30, 'ccusers'),
(31, 'loancategory'),
(32, 'support'),
(33, 'loanapply'),
(34, 'loanpayment');

-- --------------------------------------------------------

--
-- Table structure for table `loan_user_type`
--

CREATE TABLE `loan_user_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_user_type`
--

INSERT INTO `loan_user_type` (`id`, `name`, `status`) VALUES
(1, 'Admin', '1'),
(2, 'Customer Care', '1'),
(3, 'Agent', '1'),
(4, 'Customer', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loan_account_details`
--
ALTER TABLE `loan_account_details`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `loan_category`
--
ALTER TABLE `loan_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_city`
--
ALTER TABLE `loan_city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_contact`
--
ALTER TABLE `loan_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_country`
--
ALTER TABLE `loan_country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_information`
--
ALTER TABLE `loan_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_message`
--
ALTER TABLE `loan_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_message_query`
--
ALTER TABLE `loan_message_query`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_news_cat`
--
ALTER TABLE `loan_news_cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_news_details`
--
ALTER TABLE `loan_news_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_permissions`
--
ALTER TABLE `loan_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_setting`
--
ALTER TABLE `loan_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_state`
--
ALTER TABLE `loan_state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_subcatgory`
--
ALTER TABLE `loan_subcatgory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_ticketreplies`
--
ALTER TABLE `loan_ticketreplies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_tickets`
--
ALTER TABLE `loan_tickets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ticket_code` (`ticket_code`);

--
-- Indexes for table `loan_users`
--
ALTER TABLE `loan_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_user_login`
--
ALTER TABLE `loan_user_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_user_permissions`
--
ALTER TABLE `loan_user_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_user_type`
--
ALTER TABLE `loan_user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `loan_account_details`
--
ALTER TABLE `loan_account_details`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `loan_category`
--
ALTER TABLE `loan_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `loan_city`
--
ALTER TABLE `loan_city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=300;
--
-- AUTO_INCREMENT for table `loan_contact`
--
ALTER TABLE `loan_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `loan_country`
--
ALTER TABLE `loan_country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;
--
-- AUTO_INCREMENT for table `loan_information`
--
ALTER TABLE `loan_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `loan_message`
--
ALTER TABLE `loan_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `loan_message_query`
--
ALTER TABLE `loan_message_query`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `loan_news_cat`
--
ALTER TABLE `loan_news_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `loan_news_details`
--
ALTER TABLE `loan_news_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `loan_permissions`
--
ALTER TABLE `loan_permissions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `loan_setting`
--
ALTER TABLE `loan_setting`
  MODIFY `id` int(122) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;
--
-- AUTO_INCREMENT for table `loan_state`
--
ALTER TABLE `loan_state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `loan_subcatgory`
--
ALTER TABLE `loan_subcatgory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `loan_ticketreplies`
--
ALTER TABLE `loan_ticketreplies`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `loan_tickets`
--
ALTER TABLE `loan_tickets`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `loan_users`
--
ALTER TABLE `loan_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `loan_user_login`
--
ALTER TABLE `loan_user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `loan_user_permissions`
--
ALTER TABLE `loan_user_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `loan_user_type`
--
ALTER TABLE `loan_user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
