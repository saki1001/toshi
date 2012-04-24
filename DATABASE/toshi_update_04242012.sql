-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 24, 2012 at 03:40 PM
-- Server version: 5.5.9
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `toshi_04202012`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounttype`
--

CREATE TABLE `accounttype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `accounttype`
--

INSERT INTO `accounttype` VALUES(1, 'Actors');
INSERT INTO `accounttype` VALUES(2, 'Musician');
INSERT INTO `accounttype` VALUES(3, 'Dj');
INSERT INTO `accounttype` VALUES(4, 'Bartender');
INSERT INTO `accounttype` VALUES(5, 'Comedian');
INSERT INTO `accounttype` VALUES(6, 'Singer');
INSERT INTO `accounttype` VALUES(7, 'Dancer');
INSERT INTO `accounttype` VALUES(8, 'Other');
INSERT INTO `accounttype` VALUES(9, 'tosh-ette');
INSERT INTO `accounttype` VALUES(10, 'tosh-hunk');
INSERT INTO `accounttype` VALUES(11, 'VJ');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL DEFAULT '',
  `password` varchar(25) NOT NULL DEFAULT '',
  `adminmail` varchar(255) DEFAULT NULL,
  `ordermail` varchar(255) DEFAULT NULL,
  `customermail` varchar(255) DEFAULT NULL,
  `metatext` longtext,
  `page_title` longtext,
  `free_ship_amt` varchar(255) NOT NULL DEFAULT '200',
  `refer1` longtext,
  `refer2` longtext,
  `refer3` longtext,
  `refer4` longtext,
  `tooltiptxt` longtext,
  `reviewmail` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` VALUES(1, 'admin', 'admin', 'rae@rpaxis.com', 'rae@rpaxis.com', 'rae@rpaxis.com', '', '', '150', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `url` varchar(250) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` VALUES(2, 'THE STAGE', '#', '67939555banner_superbowl_928x428.jpg', 'Home Page - Top Slider Banner', '');
INSERT INTO `banners` VALUES(3, 'THE BAR', '#', '583099153banner_the_bar.jpg', 'Home Page - Top Slider Banner', '');
INSERT INTO `banners` VALUES(4, 'THE CORNER', '', '1164168872banner_the_corner.jpg', 'Home Page - Top Slider Banner', '');
INSERT INTO `banners` VALUES(7, 'SPECIALS EVERY NIGHT', '', '933543692banner_the_drinks.jpg', 'Home Page - Top Slider Banner', '');
INSERT INTO `banners` VALUES(8, 'SPOTLIGHT', '', '566546962banner_the_performers.jpg', 'Home Page - Top Slider Banner', '');
INSERT INTO `banners` VALUES(9, 'MODELS AND AUDIENCES', '', '643583652banner_models.jpg', 'Home Page - Top Slider Banner', '');
INSERT INTO `banners` VALUES(10, 'TOSHI\\''S PRIVATE RESERVE', '', '558011820banner_toshi__s_private_wine.jpg', 'Home Page - Top Slider Banner', '');
INSERT INTO `banners` VALUES(11, 'THE FLATIRON', '', '1684480727banner_the_flatiron_hotel.jpg', 'Home Page - Top Slider Banner', '');

-- --------------------------------------------------------

--
-- Table structure for table `cardtype`
--

CREATE TABLE `cardtype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cardtype` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `cardtype`
--

INSERT INTO `cardtype` VALUES(1, 'Visa');
INSERT INTO `cardtype` VALUES(2, 'Master Card');
INSERT INTO `cardtype` VALUES(3, 'American Express');
INSERT INTO `cardtype` VALUES(4, 'Discover');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catname` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `parentid` int(11) NOT NULL DEFAULT '0',
  `picture` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `parentid` (`parentid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `category`
--


-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id_country` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(50) NOT NULL DEFAULT '',
  `cc` char(2) DEFAULT NULL,
  `display_number` int(11) DEFAULT NULL,
  `shippingcountry` char(1) NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id_country`),
  KEY `country_name` (`country_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='country name' AUTO_INCREMENT=178 ;

--
-- Dumping data for table `country`
--

INSERT INTO `country` VALUES(1, 'Afghanistan', 'af', NULL, 'Y');
INSERT INTO `country` VALUES(2, 'Albania', 'al', NULL, 'Y');
INSERT INTO `country` VALUES(3, 'Algeria', 'dz', NULL, 'Y');
INSERT INTO `country` VALUES(4, 'American Samoa', 'as', NULL, 'Y');
INSERT INTO `country` VALUES(5, 'Andorra', 'ad', NULL, 'Y');
INSERT INTO `country` VALUES(6, 'Angola', 'ao', NULL, 'Y');
INSERT INTO `country` VALUES(7, 'Anguilla', 'ai', NULL, 'Y');
INSERT INTO `country` VALUES(8, 'Antarctica', 'aq', NULL, 'Y');
INSERT INTO `country` VALUES(9, 'Antigua & Barbuda', 'ag', NULL, 'Y');
INSERT INTO `country` VALUES(10, 'Argentina', 'ar', NULL, 'Y');
INSERT INTO `country` VALUES(11, 'Armenia', 'am', NULL, 'Y');
INSERT INTO `country` VALUES(12, 'Aruba', 'aw', NULL, 'Y');
INSERT INTO `country` VALUES(13, 'Australia', 'au', NULL, 'Y');
INSERT INTO `country` VALUES(14, 'Austria', 'at', NULL, 'Y');
INSERT INTO `country` VALUES(15, 'Azerbaijan', 'az', NULL, 'Y');
INSERT INTO `country` VALUES(16, 'Bahamas', 'bs', NULL, 'Y');
INSERT INTO `country` VALUES(17, 'Bahrain', 'bh', NULL, 'Y');
INSERT INTO `country` VALUES(18, 'Bangladesh', 'bd', NULL, 'Y');
INSERT INTO `country` VALUES(19, 'Barbados', 'bb', NULL, 'Y');
INSERT INTO `country` VALUES(20, 'Belarus', 'by', NULL, 'Y');
INSERT INTO `country` VALUES(21, 'Belgium', 'be', NULL, 'Y');
INSERT INTO `country` VALUES(22, 'Belize', 'bz', NULL, 'Y');
INSERT INTO `country` VALUES(23, 'Benin', 'bj', NULL, 'Y');
INSERT INTO `country` VALUES(24, 'Bermuda', 'bm', NULL, 'Y');
INSERT INTO `country` VALUES(25, 'Bhutan', 'bt', NULL, 'Y');
INSERT INTO `country` VALUES(26, 'Bolivia', 'bo', NULL, 'Y');
INSERT INTO `country` VALUES(27, 'Bosnia-Herzegovina', 'ba', NULL, 'Y');
INSERT INTO `country` VALUES(28, 'Botswana', 'bw', NULL, 'Y');
INSERT INTO `country` VALUES(29, 'Brazil', 'br', NULL, 'Y');
INSERT INTO `country` VALUES(30, 'Brunei', 'bn', NULL, 'Y');
INSERT INTO `country` VALUES(31, 'Bulgaria', 'bg', NULL, 'Y');
INSERT INTO `country` VALUES(32, 'Burkina Faso', 'bf', NULL, 'Y');
INSERT INTO `country` VALUES(33, 'Burundi', 'bi', NULL, 'Y');
INSERT INTO `country` VALUES(34, 'Cambodia', 'kh', NULL, 'Y');
INSERT INTO `country` VALUES(35, 'Cameroon', 'cm', NULL, 'Y');
INSERT INTO `country` VALUES(36, 'Canada', 'ca', NULL, 'Y');
INSERT INTO `country` VALUES(37, 'Cape Verde', 'cv', NULL, 'Y');
INSERT INTO `country` VALUES(38, 'Cayman Islands', 'ky', NULL, 'Y');
INSERT INTO `country` VALUES(39, 'Central Africa', 'cf', NULL, 'Y');
INSERT INTO `country` VALUES(40, 'Chile', 'cl', NULL, 'Y');
INSERT INTO `country` VALUES(41, 'China', 'cn', NULL, 'Y');
INSERT INTO `country` VALUES(42, 'Colombia', 'co', NULL, 'Y');
INSERT INTO `country` VALUES(43, 'Comoros', 'km', NULL, 'Y');
INSERT INTO `country` VALUES(44, 'Congo', 'cg', NULL, 'Y');
INSERT INTO `country` VALUES(45, 'Congo (Dem. Rep.)', 'cd', NULL, 'Y');
INSERT INTO `country` VALUES(46, 'Cook Islands', 'ck', NULL, 'Y');
INSERT INTO `country` VALUES(47, 'Costa Rica', 'cr', NULL, 'Y');
INSERT INTO `country` VALUES(48, 'Croatia', 'hr', NULL, 'Y');
INSERT INTO `country` VALUES(49, 'Cuba', 'cu', NULL, 'Y');
INSERT INTO `country` VALUES(50, 'Cyprus', 'cy', NULL, 'Y');
INSERT INTO `country` VALUES(51, 'Czech Republic', 'cz', NULL, 'Y');
INSERT INTO `country` VALUES(52, 'Denmark', 'dk', NULL, 'Y');
INSERT INTO `country` VALUES(53, 'Djibouti', 'dj', NULL, 'Y');
INSERT INTO `country` VALUES(54, 'Dominica', 'dm', NULL, 'Y');
INSERT INTO `country` VALUES(55, 'Dominican Republic', 'do', NULL, 'Y');
INSERT INTO `country` VALUES(56, 'Ecuador', 'ec', NULL, 'Y');
INSERT INTO `country` VALUES(57, 'Egypt', 'eg', NULL, 'Y');
INSERT INTO `country` VALUES(58, 'Equatorial Guinea', 'gq', NULL, 'Y');
INSERT INTO `country` VALUES(59, 'Eritrea', 'er', NULL, 'Y');
INSERT INTO `country` VALUES(60, 'Estonia', 'ee', NULL, 'Y');
INSERT INTO `country` VALUES(61, 'Ethiopia', 'et', NULL, 'Y');
INSERT INTO `country` VALUES(62, 'Falkland Islands and dependencies', 'fk', NULL, 'Y');
INSERT INTO `country` VALUES(63, 'Faroe Islands', 'fo', NULL, 'Y');
INSERT INTO `country` VALUES(64, 'Fiji', 'fj', NULL, 'Y');
INSERT INTO `country` VALUES(65, 'Finland', 'fi', NULL, 'Y');
INSERT INTO `country` VALUES(66, 'France', 'fr', NULL, 'Y');
INSERT INTO `country` VALUES(67, 'French Guiana', 'gf', NULL, 'Y');
INSERT INTO `country` VALUES(68, 'French Polynesia', 'pf', NULL, 'Y');
INSERT INTO `country` VALUES(69, 'Gabon', 'ga', NULL, 'Y');
INSERT INTO `country` VALUES(70, 'Gambia', 'gm', NULL, 'Y');
INSERT INTO `country` VALUES(71, 'Georgia', 'ge', NULL, 'Y');
INSERT INTO `country` VALUES(72, 'Germany', 'de', NULL, 'Y');
INSERT INTO `country` VALUES(73, 'Ghana', 'gh', NULL, 'Y');
INSERT INTO `country` VALUES(74, 'Gibraltar', 'gi', NULL, 'Y');
INSERT INTO `country` VALUES(75, 'Greece', 'gr', NULL, 'Y');
INSERT INTO `country` VALUES(76, 'Greenland', 'gl', NULL, 'Y');
INSERT INTO `country` VALUES(77, 'Grenada', 'gd', NULL, 'Y');
INSERT INTO `country` VALUES(78, 'Guadeloupe', 'gp', NULL, 'Y');
INSERT INTO `country` VALUES(79, 'Guam', 'gu', NULL, 'Y');
INSERT INTO `country` VALUES(80, 'Guatemala', 'gt', NULL, 'Y');
INSERT INTO `country` VALUES(81, 'Guinea', 'gn', NULL, 'Y');
INSERT INTO `country` VALUES(82, 'Guinea Bissau', 'gw', NULL, 'Y');
INSERT INTO `country` VALUES(83, 'Guyana', 'gy', NULL, 'Y');
INSERT INTO `country` VALUES(84, 'Haiti', 'ht', NULL, 'Y');
INSERT INTO `country` VALUES(85, 'Honduras', 'hn', NULL, 'Y');
INSERT INTO `country` VALUES(86, 'Hungary', 'hu', NULL, 'Y');
INSERT INTO `country` VALUES(87, 'Iceland', 'is', NULL, 'Y');
INSERT INTO `country` VALUES(88, 'India', 'in', NULL, 'Y');
INSERT INTO `country` VALUES(89, 'Indonesia', 'id', NULL, 'Y');
INSERT INTO `country` VALUES(90, 'Iran', 'ir', NULL, 'Y');
INSERT INTO `country` VALUES(91, 'Iraq', 'iq', NULL, 'Y');
INSERT INTO `country` VALUES(92, 'Ireland', 'ie', NULL, 'Y');
INSERT INTO `country` VALUES(93, 'Italy', 'it', NULL, 'Y');
INSERT INTO `country` VALUES(94, 'Ivory Coast', 'ci', NULL, 'Y');
INSERT INTO `country` VALUES(95, 'Jamaica', 'jm', NULL, 'Y');
INSERT INTO `country` VALUES(177, 'Japan', NULL, NULL, 'Y');
INSERT INTO `country` VALUES(97, 'Jordan', 'jo', NULL, 'Y');
INSERT INTO `country` VALUES(98, 'Kazakhstan', 'kz', NULL, 'Y');
INSERT INTO `country` VALUES(99, 'Kenya', 'ke', NULL, 'Y');
INSERT INTO `country` VALUES(100, 'Kiribati', 'ki', NULL, 'Y');
INSERT INTO `country` VALUES(101, 'Korea (North)', 'kp', NULL, 'Y');
INSERT INTO `country` VALUES(102, 'Korea (South)', 'kr', NULL, 'Y');
INSERT INTO `country` VALUES(103, 'Kuwait', 'kw', NULL, 'Y');
INSERT INTO `country` VALUES(104, 'Kyrgyzstan', 'kg', NULL, 'Y');
INSERT INTO `country` VALUES(105, 'Laos', 'la', NULL, 'Y');
INSERT INTO `country` VALUES(106, 'Latvia', 'lv', NULL, 'Y');
INSERT INTO `country` VALUES(107, 'Lebanon', 'lb', NULL, 'Y');
INSERT INTO `country` VALUES(108, 'Lesotho', 'ls', NULL, 'Y');
INSERT INTO `country` VALUES(109, 'Liberia', 'lr', NULL, 'Y');
INSERT INTO `country` VALUES(110, 'Libya', 'ly', NULL, 'Y');
INSERT INTO `country` VALUES(111, 'Liechtenstein', 'li', NULL, 'Y');
INSERT INTO `country` VALUES(112, 'Lithuania', 'lt', NULL, 'Y');
INSERT INTO `country` VALUES(113, 'Luxembourg', 'lu', NULL, 'Y');
INSERT INTO `country` VALUES(114, 'Macedonia', 'mk', NULL, 'Y');
INSERT INTO `country` VALUES(115, 'Madagascar', 'mg', NULL, 'Y');
INSERT INTO `country` VALUES(116, 'Malawi', 'mw', NULL, 'Y');
INSERT INTO `country` VALUES(117, 'Malaysia', 'my', NULL, 'Y');
INSERT INTO `country` VALUES(118, 'Maldives', 'mv', NULL, 'Y');
INSERT INTO `country` VALUES(119, 'Mali', 'ml', NULL, 'Y');
INSERT INTO `country` VALUES(120, 'Malta', 'mt', NULL, 'Y');
INSERT INTO `country` VALUES(121, 'Marshall Islands', 'mh', NULL, 'Y');
INSERT INTO `country` VALUES(122, 'Martinique', 'mq', NULL, 'Y');
INSERT INTO `country` VALUES(123, 'Mauritania', 'mr', NULL, 'Y');
INSERT INTO `country` VALUES(124, 'Mauritius', 'mu', NULL, 'Y');
INSERT INTO `country` VALUES(125, 'Mexico', 'mx', NULL, 'Y');
INSERT INTO `country` VALUES(126, 'Micronesia', 'fm', NULL, 'Y');
INSERT INTO `country` VALUES(127, 'Moldova', 'md', NULL, 'Y');
INSERT INTO `country` VALUES(128, 'Monaco', 'mc', NULL, 'Y');
INSERT INTO `country` VALUES(129, 'Mongolia', 'mn', NULL, 'Y');
INSERT INTO `country` VALUES(130, 'Morocco', 'ma', NULL, 'Y');
INSERT INTO `country` VALUES(131, 'Mozambique', 'mz', NULL, 'Y');
INSERT INTO `country` VALUES(132, 'Myanmar', 'mm', NULL, 'Y');
INSERT INTO `country` VALUES(133, 'Namibia', 'na', NULL, 'Y');
INSERT INTO `country` VALUES(134, 'Nauru', 'nr', NULL, 'Y');
INSERT INTO `country` VALUES(135, 'Nepal', 'np', NULL, 'Y');
INSERT INTO `country` VALUES(136, 'Netherlands', 'nl', NULL, 'Y');
INSERT INTO `country` VALUES(137, 'Netherlands Antilles', 'an', NULL, 'Y');
INSERT INTO `country` VALUES(138, 'New Caledonia', 'nc', NULL, 'Y');
INSERT INTO `country` VALUES(139, 'New Zealand', 'nz', NULL, 'Y');
INSERT INTO `country` VALUES(140, 'Nicaragua', 'ni', NULL, 'Y');
INSERT INTO `country` VALUES(141, 'Niger', 'ne', NULL, 'Y');
INSERT INTO `country` VALUES(142, 'Nigeria', 'ng', NULL, 'Y');
INSERT INTO `country` VALUES(143, 'Niue', 'nu', NULL, 'Y');
INSERT INTO `country` VALUES(144, 'Norfolk', 'nf', NULL, 'Y');
INSERT INTO `country` VALUES(145, 'Northern Mariana Islands', 'mp', NULL, 'Y');
INSERT INTO `country` VALUES(146, 'Oman', 'om', NULL, 'Y');
INSERT INTO `country` VALUES(147, 'Pakistan', 'pk', NULL, 'Y');
INSERT INTO `country` VALUES(148, 'Palau', 'pw', NULL, 'Y');
INSERT INTO `country` VALUES(149, 'Palestine', 'ps', NULL, 'Y');
INSERT INTO `country` VALUES(150, 'Panama', 'pa', NULL, 'Y');
INSERT INTO `country` VALUES(151, 'Papua New Guinea', 'pg', NULL, 'Y');
INSERT INTO `country` VALUES(152, 'Paraguay', 'py', NULL, 'Y');
INSERT INTO `country` VALUES(153, 'Peru', 'pe', NULL, 'Y');
INSERT INTO `country` VALUES(154, 'Philippines', 'ph', NULL, 'Y');
INSERT INTO `country` VALUES(155, 'Poland', 'pl', NULL, 'Y');
INSERT INTO `country` VALUES(156, 'Portugal', 'pt', NULL, 'Y');
INSERT INTO `country` VALUES(157, 'Puerto Rico', 'pr', NULL, 'Y');
INSERT INTO `country` VALUES(158, 'Qatar', 'qa', NULL, 'Y');
INSERT INTO `country` VALUES(159, 'Reunion', 're', NULL, 'Y');
INSERT INTO `country` VALUES(160, 'Romania', 'ro', NULL, 'Y');
INSERT INTO `country` VALUES(161, 'Sahara', 'eh', NULL, 'Y');
INSERT INTO `country` VALUES(162, 'Saint Kitts and Nevis', 'kn', NULL, 'Y');
INSERT INTO `country` VALUES(163, 'Saint Lucia', 'lc', NULL, 'Y');
INSERT INTO `country` VALUES(164, 'Saint Pierre & Miquelon', 'pm', NULL, 'Y');
INSERT INTO `country` VALUES(165, 'Spain', 'es', NULL, 'Y');
INSERT INTO `country` VALUES(166, 'Sri Lanka', 'lk', NULL, 'Y');
INSERT INTO `country` VALUES(167, 'Switzerland', 'ch', NULL, 'Y');
INSERT INTO `country` VALUES(168, 'United Arab Emirates', 'ae', NULL, 'Y');
INSERT INTO `country` VALUES(169, 'United Kingdom', 'gb', NULL, 'Y');
INSERT INTO `country` VALUES(170, 'USA', 'us', 1, 'Y');
INSERT INTO `country` VALUES(171, 'Federated States of Micronesia', NULL, NULL, 'Y');
INSERT INTO `country` VALUES(172, 'Guam', NULL, NULL, 'Y');
INSERT INTO `country` VALUES(173, 'Marshall Islands', NULL, NULL, 'Y');
INSERT INTO `country` VALUES(174, 'Northern Mariana Islands', NULL, NULL, 'Y');
INSERT INTO `country` VALUES(175, 'Palau', NULL, NULL, 'Y');
INSERT INTO `country` VALUES(176, 'Virgin Islands', NULL, NULL, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `emailafriend`
--

CREATE TABLE `emailafriend` (
  `id` bigint(21) NOT NULL AUTO_INCREMENT,
  `friendname` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `friendemail` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `sendername` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `senderemail` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `emailsubject` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `message` text COLLATE latin1_general_ci,
  `eventid` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `userid` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `datesent` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `emailafriend`
--

INSERT INTO `emailafriend` VALUES(1, 'Rae Parth', 'rpaxis1@gmail.com', 'Parth Rae', 'rpaxis2@gmail.com', 'This is test for the email a friend', 'This is test for the email a friend', '4', '', '2012-02-28 08:21:03');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(21) NOT NULL AUTO_INCREMENT,
  `eventtype` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT 'Single',
  `name` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `userid` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `startdate` date NOT NULL DEFAULT '0000-00-00',
  `startdate_hour` int(11) NOT NULL DEFAULT '0',
  `startdate_minute` int(11) NOT NULL DEFAULT '0',
  `startdate_ampm` varchar(10) COLLATE latin1_general_ci NOT NULL DEFAULT 'pm',
  `enddate` date DEFAULT NULL,
  `enddate_hour` int(11) NOT NULL DEFAULT '0',
  `enddate_minute` int(11) NOT NULL DEFAULT '0',
  `enddate_ampm` varchar(10) COLLATE latin1_general_ci NOT NULL DEFAULT 'pm',
  `venueid` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `description` text COLLATE latin1_general_ci,
  `onsaledate` date DEFAULT NULL,
  `onsaledate_hour` int(11) NOT NULL DEFAULT '0',
  `onsaledate_minute` int(11) NOT NULL DEFAULT '0',
  `onsaledate_ampm` varchar(10) COLLATE latin1_general_ci NOT NULL DEFAULT 'pm',
  `immediately` char(3) COLLATE latin1_general_ci NOT NULL DEFAULT 'No',
  `salesclosedate` date DEFAULT NULL,
  `salesclosedate_hour` int(11) NOT NULL DEFAULT '0',
  `salesclosedate_minute` int(11) NOT NULL DEFAULT '0',
  `salesclosedate_ampm` varchar(10) COLLATE latin1_general_ci NOT NULL DEFAULT 'pm',
  `category` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `ages` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `website` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `picture_display` char(1) COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `delivery_mobile_type` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `delivery_mobile_extrainfo` text COLLATE latin1_general_ci,
  `delivery_mobile_startdate` date DEFAULT NULL,
  `delivery_mobile_startdate_hour` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `delivery_mobile_startdate_minute` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `delivery_mobile_startdate_ampm` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `delivery_mobile_enddate` date DEFAULT NULL,
  `delivery_mobile_enddate_hour` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `delivery_mobile_enddate_minute` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `delivery_mobile_enddate_ampm` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `delivery_printathome_type` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `delivery_printathome_extrainfo` text COLLATE latin1_general_ci,
  `delivery_printathome_startdate` date DEFAULT NULL,
  `delivery_printathome_startdate_hour` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `delivery_printathome_startdate_minute` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `delivery_printathome_startdate_ampm` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `delivery_printathome_enddate` date DEFAULT NULL,
  `delivery_printathome_enddate_hour` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `delivery_printathome_enddate_minute` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `delivery_printathome_enddate_ampm` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `delivery_willcall_type` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `delivery_willcall_extrainfo` text COLLATE latin1_general_ci,
  `delivery_willcall_startdate` date DEFAULT NULL,
  `delivery_willcall_startdate_hour` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `delivery_willcall_startdate_minute` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `delivery_willcall_startdate_ampm` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `delivery_willcall_enddate` date DEFAULT NULL,
  `delivery_willcall_enddate_hour` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `delivery_willcall_enddate_minute` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `delivery_willcall_enddate_ampm` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `donations_enable` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `donations_name` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `customfee_enable` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `customfee_enable_nameoffee` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `customfee_enable_type` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `customfee_enable_amount` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `customfee_enable_applyfee` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `additional_onlineservicefee` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `additional_boservicefee` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `additional_ticketnote` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `additional_ticket_tranlimit` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `additional_checkouttimelimit` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `additional_privateevent` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `addeddate` date NOT NULL DEFAULT '0000-00-00',
  `approve` char(1) COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `flickerurl` text COLLATE latin1_general_ci,
  `vimeourl` text COLLATE latin1_general_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` VALUES(12, 'Single', 'ToshiNow Fundraiser', '0', '2012-07-17', 7, 0, 'pm', '2012-07-17', 12, 0, 'am', '1', 'Praesent massa arcu, molestie ac semper vel; posuere vel lectus. Vivamus urna magna; accumsan eu sollicitudin in, semper vel felis. Suspendisse porta risus eu risus malesuada ut tempor odio viverra. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc arcu nibh, porttitor nec commodo ut, ullamcorper ut lectus? Duis porta.', '0000-00-00', 12, 0, 'pm', 'Yes', '0000-00-00', 12, 0, 'pm', '8', '18 and over', 'http://', '1650037513party_example_02.jpg', 'Y', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2012-04-10', 'Y', 'http://', 'http://');
INSERT INTO `events` VALUES(13, 'Single', 'Swing Night', '0', '2012-05-15', 12, 0, 'pm', '2012-05-30', 12, 0, 'pm', '1', 'Suspendisse ac ultricies purus. Pellentesque at ligula tellus, non auctor ante. Fusce pharetra, enim eu porta vestibulum, magna elit iaculis odio, eget placerat nunc elit id lectus. Quisque elit risus; pretium vitae porttitor hendrerit, placerat at est. Curabitur quis tristique mauris. Nam congue nunc id elit pellentesque malesuada. Vestibulum ante.', '0000-00-00', 12, 0, 'pm', 'Yes', '0000-00-00', 12, 0, 'pm', '11', 'All Ages', 'http://', '851263843dancing_example.jpg', 'Y', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2012-04-23', 'Y', 'http://', 'http://');
INSERT INTO `events` VALUES(11, 'Single', 'Colwell 2012 Spring Release Party', '0', '2012-04-30', 12, 0, 'pm', '2012-04-30', 11, 0, 'pm', '1', 'Etiam sit amet quam turpis. Integer elementum rutrum risus, eu vehicula nisl pulvinar sit amet. Donec ut quam nisl. Ut rhoncus congue risus at ullamcorper. Morbi sit amet metus quis libero fringilla dapibus. Fusce volutpat urna vehicula lacus semper ut scelerisque justo rutrum. Maecenas ullamcorper dignissim tortor eget ullamcorper. Cum.', '0000-00-00', 12, 0, 'pm', '', '0000-00-00', 12, 0, 'pm', '17', '18 and over', 'http://', '912698053fashion_example.jpg', 'Y', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2012-04-10', 'Y', 'http://', 'http://');
INSERT INTO `events` VALUES(9, 'Single', '11th april', '0', '2012-04-11', 12, 0, 'pm', '2012-04-11', 12, 0, 'pm', '1', '11th april', '0000-00-00', 12, 0, 'pm', '', '0000-00-00', 12, 0, 'pm', '18', 'All Ages', 'http://', NULL, 'Y', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2012-04-10', 'Y', 'http://', 'http://');
INSERT INTO `events` VALUES(10, 'Single', '90\\''s Dance Party', '0', '2012-04-12', 12, 0, 'pm', '2012-04-18', 12, 0, 'pm', '1', 'Nulla pulvinar risus scelerisque lorem varius convallis! Vivamus et neque libero. Suspendisse nunc sapien, ultricies non tempor vel, elementum eget sem. Nunc at risus sit amet magna feugiat dictum. Quisque sagittis justo vitae arcu interdum blandit! Cras venenatis ante eget erat vestibulum et gravida nunc euismod. Quisque auctor, lacus eu.', '0000-00-00', 12, 0, 'pm', 'Yes', '0000-00-00', 12, 0, 'pm', '17', '18 and over', 'http://', '334436366party_example.jpg', 'Y', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2012-04-10', 'Y', 'http://flickr.com/', 'http://vimeo.com/');
INSERT INTO `events` VALUES(7, 'Single', 'Blues Night', '0', '2012-05-14', 7, 0, 'pm', '2012-05-15', 12, 0, 'am', '1', 'Maecenas tempus dolor sit amet mauris porta a molestie mauris luctus? Maecenas justo lorem, placerat vel ullamcorper ac, ultrices vel dui. Vestibulum et lectus odio, in ultrices erat. Nam vel nulla lectus, eget semper tellus. Nam elementum cursus tempus. Cras a neque diam. Aenean cursus erat nec dui ultrices cursus.', '0000-00-00', 12, 0, 'pm', 'Yes', '0000-00-00', 12, 0, 'pm', '1', '21 and over', 'http://sakisato.com/', '1854348535music_example_01.jpg', 'Y', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2012-03-28', 'Y', 'http://', 'http://');

-- --------------------------------------------------------

--
-- Table structure for table `events_pictures`
--

CREATE TABLE `events_pictures` (
  `id` bigint(21) NOT NULL AUTO_INCREMENT,
  `eventid` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `picture` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `caption` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `addeddate` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=20 ;

--
-- Dumping data for table `events_pictures`
--

INSERT INTO `events_pictures` VALUES(1, '4', '23016919noimage_260_132.jpg', 'Test', '2012-02-28');
INSERT INTO `events_pictures` VALUES(2, '4', '1875087568noimage_260_132.jpg', 'test 2', '2012-02-28');
INSERT INTO `events_pictures` VALUES(19, '7', '2045250579music_example_02.jpg', '', '2012-04-24');
INSERT INTO `events_pictures` VALUES(4, '4', '1461455noimage_260_132.jpg', 'test 3', '2012-02-28');
INSERT INTO `events_pictures` VALUES(7, '6', '1051732501logo.png', '', '2012-04-05');
INSERT INTO `events_pictures` VALUES(13, '11', '1595615180fashion_example_02.jpg', '', '2012-04-24');
INSERT INTO `events_pictures` VALUES(14, '11', '1244788376fashion_example_03.jpg', '', '2012-04-24');
INSERT INTO `events_pictures` VALUES(15, '11', '1479916130fashion_example_04.jpg', '', '2012-04-24');
INSERT INTO `events_pictures` VALUES(16, '11', '1559863690fashion_example_05.jpg', '', '2012-04-24');
INSERT INTO `events_pictures` VALUES(17, '11', '1910229256fashion_example_06.jpg', '', '2012-04-24');
INSERT INTO `events_pictures` VALUES(18, '11', '1574372715fashion_example_07.jpg', '', '2012-04-24');

-- --------------------------------------------------------

--
-- Table structure for table `events_pricelevel`
--

CREATE TABLE `events_pricelevel` (
  `id` bigint(21) NOT NULL AUTO_INCREMENT,
  `userid` varchar(255) NOT NULL DEFAULT '',
  `eventid` varchar(255) NOT NULL DEFAULT '',
  `pricelevelname` varchar(255) NOT NULL DEFAULT '',
  `onlineprice` float(10,2) NOT NULL DEFAULT '0.00',
  `boxofficeprice` float(10,2) NOT NULL DEFAULT '0.00',
  `quantityavailable` int(11) NOT NULL DEFAULT '0',
  `perorderlimit` int(11) NOT NULL DEFAULT '0',
  `activeornot` varchar(10) NOT NULL DEFAULT 'Yes',
  `description` text NOT NULL,
  `earlybird_active` char(1) NOT NULL DEFAULT 'N',
  `earlybird_price` float(10,2) NOT NULL DEFAULT '0.00',
  `earlybird_startdate` date NOT NULL DEFAULT '0000-00-00',
  `earlybird_enddate` date NOT NULL DEFAULT '0000-00-00',
  `advanced_active` char(1) NOT NULL DEFAULT 'N',
  `advanced_price` float(10,2) NOT NULL DEFAULT '0.00',
  `advanced_startdate` date NOT NULL DEFAULT '0000-00-00',
  `advanced_enddate` date NOT NULL DEFAULT '0000-00-00',
  `full_active` char(1) NOT NULL DEFAULT 'N',
  `full_price` float(10,2) NOT NULL DEFAULT '0.00',
  `full_startdate` date NOT NULL DEFAULT '0000-00-00',
  `full_enddate` date NOT NULL DEFAULT '0000-00-00',
  `addeddate` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `events_pricelevel`
--

INSERT INTO `events_pricelevel` VALUES(10, '0', '7', 'Buy', 50.00, 70.00, 100, 5, 'Yes', '', '', 0.00, '0000-00-00', '0000-00-00', '', 0.00, '0000-00-00', '0000-00-00', '', 0.00, '0000-00-00', '0000-00-00', '2012-03-28');

-- --------------------------------------------------------

--
-- Table structure for table `events_timeslots`
--

CREATE TABLE `events_timeslots` (
  `id` bigint(21) NOT NULL AUTO_INCREMENT,
  `userid` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `eventid` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `slot_hour` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `slot_duration` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `slot_minute` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `slot_ampm` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `status` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `addeddate` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `events_timeslots`
--

INSERT INTO `events_timeslots` VALUES(4, '0', '3', '1', '30', '30', 'AM', 'Available', '2012-02-14');
INSERT INTO `events_timeslots` VALUES(3, '0', '3', '12', '15', '15', 'AM', 'Available', '2012-02-14');
INSERT INTO `events_timeslots` VALUES(5, '0', '3', '2', '45', '45', 'AM', 'Available', '2012-02-14');
INSERT INTO `events_timeslots` VALUES(6, '0', '3', '3', '45', '45', 'AM', 'Available', '2012-02-14');
INSERT INTO `events_timeslots` VALUES(7, '0', '3', '1', '15', '15', 'PM', 'Available', '2012-02-14');
INSERT INTO `events_timeslots` VALUES(8, '0', '3', '2', '60', '60', 'PM', 'Available', '2012-02-14');
INSERT INTO `events_timeslots` VALUES(9, '0', '4', '7', '15', '15', 'PM', 'Assigned', '2012-02-14');
INSERT INTO `events_timeslots` VALUES(10, '0', '4', '7', '15', '15', 'AM', 'Available', '2012-02-14');
INSERT INTO `events_timeslots` VALUES(11, '0', '1', '12', '15', '15', 'AM', 'Available', '2012-02-15');
INSERT INTO `events_timeslots` VALUES(12, '0', '1', '12', '15', '30', 'AM', 'Available', '2012-02-15');
INSERT INTO `events_timeslots` VALUES(13, '0', '8', '12', '15', '00', 'AM', 'Available', '2012-03-28');

-- --------------------------------------------------------

--
-- Table structure for table `events_timeslots_selected`
--

CREATE TABLE `events_timeslots_selected` (
  `id` bigint(21) NOT NULL AUTO_INCREMENT,
  `userid` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `eventid` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `timeslotid` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `slot_hour` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `slot_minute` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `slot_duration` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `slot_ampm` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `status` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `addeddate` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `events_timeslots_selected`
--

INSERT INTO `events_timeslots_selected` VALUES(4, '4', '4', '9', '7', '15', '15', 'PM', 'Pending', '2012-02-16');

-- --------------------------------------------------------

--
-- Table structure for table `events_videos`
--

CREATE TABLE `events_videos` (
  `id` bigint(21) NOT NULL AUTO_INCREMENT,
  `eventid` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `videofile` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `video` text COLLATE latin1_general_ci NOT NULL,
  `caption` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `addeddate` date NOT NULL DEFAULT '0000-00-00',
  `totalview` bigint(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `events_videos`
--

INSERT INTO `events_videos` VALUES(1, '4', NULL, '<iframe width=\\"560\\" height=\\"315\\" src=\\"http://www.youtube.com/embed/SGxd1Cm2_Sc\\" frameborder=\\"0\\" allowfullscreen></iframe>', 'test video', '2012-02-28', 0);
INSERT INTO `events_videos` VALUES(2, '4', NULL, '<iframe width=\\"560\\" height=\\"315\\" src=\\"http://www.youtube.com/embed/0K2aynMMBpo\\" frameborder=\\"0\\" allowfullscreen></iframe>', 'test video 2', '2012-02-28', 0);
INSERT INTO `events_videos` VALUES(3, '11', NULL, '<iframe src=\\"http://player.vimeo.com/video/39375730?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff\\" width=\\"580\\" height=\\"326\\" frameborder=\\"0\\" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>', 'Colwell Event', '2012-04-24', 0);
INSERT INTO `events_videos` VALUES(4, '7', NULL, '<iframe src=\\"http://player.vimeo.com/video/40538964?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff\\" width=\\"580\\" height=\\"326\\" frameborder=\\"0\\" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>', 'Funk Night', '2012-04-24', 0);

-- --------------------------------------------------------

--
-- Table structure for table `event_category`
--

CREATE TABLE `event_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `event_category`
--

INSERT INTO `event_category` VALUES(1, 'Art / Exhibit');
INSERT INTO `event_category` VALUES(2, 'Club Night');
INSERT INTO `event_category` VALUES(3, 'Comedy');
INSERT INTO `event_category` VALUES(4, 'Community');
INSERT INTO `event_category` VALUES(5, 'Concert');
INSERT INTO `event_category` VALUES(6, 'Conference');
INSERT INTO `event_category` VALUES(7, 'Festival');
INSERT INTO `event_category` VALUES(8, 'Fundraiser');
INSERT INTO `event_category` VALUES(9, 'Networking');
INSERT INTO `event_category` VALUES(10, 'Other');
INSERT INTO `event_category` VALUES(11, 'Party');
INSERT INTO `event_category` VALUES(12, 'Performing Arts');
INSERT INTO `event_category` VALUES(13, 'Raffle');
INSERT INTO `event_category` VALUES(14, 'Retreat');
INSERT INTO `event_category` VALUES(15, 'Reunion');
INSERT INTO `event_category` VALUES(16, 'Sporting');
INSERT INTO `event_category` VALUES(17, 'Trade Show');
INSERT INTO `event_category` VALUES(18, 'Workshop');

-- --------------------------------------------------------

--
-- Table structure for table `event_venues`
--

CREATE TABLE `event_venues` (
  `id` bigint(21) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `country` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `address` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `city` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `state` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `zipcode` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `timezone` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `contactname` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `description` text COLLATE latin1_general_ci,
  `status` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `capacity` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `url` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `email` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `seatingchart` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `addedby` int(11) NOT NULL DEFAULT '0',
  `addeddate` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `event_venues`
--

INSERT INTO `event_venues` VALUES(1, 'toshi\\''s Living Room', 'USA', '9 West 26th Street', 'New York', 'New York', '10010', 'America/New_York', '', 'Fusce rhoncus ante eu lorem scelerisque at pharetra libero fermentum. Nam quis sapien augue, et tempor nisi. Donec blandit arcu vel mi luctus at placerat elit sodales.\r\n', 'General Admission', '1500', '', '212.839.8000', '', 'rae@rpaxis.com', '541139945venueimage.jpg', '160129217seatingchart.jpg', 0, '2012-01-27');
INSERT INTO `event_venues` VALUES(2, 'test', 'USA', '96 east williston park', 'east williston', 'Florida', '11596', 'America/New_York', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2012-01-30');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=24 ;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` VALUES(1, 'All Genres');
INSERT INTO `genre` VALUES(2, 'Hip Hop');
INSERT INTO `genre` VALUES(3, 'Rock');
INSERT INTO `genre` VALUES(4, 'Pop');
INSERT INTO `genre` VALUES(5, 'Alternative');
INSERT INTO `genre` VALUES(6, 'Country');
INSERT INTO `genre` VALUES(7, 'Indie');
INSERT INTO `genre` VALUES(8, 'Rap');
INSERT INTO `genre` VALUES(9, 'R& B');
INSERT INTO `genre` VALUES(10, 'Metal');
INSERT INTO `genre` VALUES(11, 'Punk');
INSERT INTO `genre` VALUES(12, 'Hardcore');
INSERT INTO `genre` VALUES(13, 'Electronica');
INSERT INTO `genre` VALUES(14, 'Techno');
INSERT INTO `genre` VALUES(15, 'Reggae');
INSERT INTO `genre` VALUES(16, 'Latin');
INSERT INTO `genre` VALUES(17, 'Jazz');
INSERT INTO `genre` VALUES(18, 'Classic Rock');
INSERT INTO `genre` VALUES(19, 'Americana');
INSERT INTO `genre` VALUES(20, 'Blues');
INSERT INTO `genre` VALUES(21, 'Folk');
INSERT INTO `genre` VALUES(22, 'Christian');
INSERT INTO `genre` VALUES(23, 'Progressive');

-- --------------------------------------------------------

--
-- Table structure for table `labeltype`
--

CREATE TABLE `labeltype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `labeltype`
--

INSERT INTO `labeltype` VALUES(1, 'Unsigned');
INSERT INTO `labeltype` VALUES(2, 'Major');
INSERT INTO `labeltype` VALUES(3, 'Indie');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `pid` blob,
  `orderid` bigint(20) DEFAULT '0',
  `quantity` bigint(20) DEFAULT NULL,
  `color` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `size` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `cflag` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `status` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT 'In process',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `bill` decimal(12,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `orderid` (`orderid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` VALUES(5, 0x32, 3, 2, NULL, '1', NULL, 'In process', 50.00, 0.00);
INSERT INTO `orderdetail` VALUES(6, 0x32, 4, 1, NULL, '1', NULL, 'In process', 50.00, 0.00);
INSERT INTO `orderdetail` VALUES(7, 0x35, 4, 1, NULL, '8', NULL, 'In process', 20.00, 0.00);
INSERT INTO `orderdetail` VALUES(10, 0x36, 5, 2, NULL, '9', NULL, 'In process', 9.00, 0.00);
INSERT INTO `orderdetail` VALUES(12, 0x36, 6, 1, NULL, '9', NULL, 'In process', 10.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `ordermaster`
--

CREATE TABLE `ordermaster` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `userid` bigint(20) DEFAULT NULL,
  `orderdate` datetime DEFAULT NULL,
  `shippingcharge` double DEFAULT NULL,
  `shippingmethoad` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `promocodeid` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `total` double DEFAULT NULL,
  `grandtotal` double DEFAULT NULL,
  `ccname` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `cctype` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `ccnumber` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `ccmonth` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `ccyear` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `cvv` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `orderstatus` varchar(255) COLLATE latin1_general_ci DEFAULT 'pending',
  `ispaid` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT 'notpaid',
  `fname` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `mname` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `lname` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `address1` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `address2` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `city` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `state` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `country` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `zipcode` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `day_telephone` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `evening_telephone` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `companyname` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `ship_fname` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `ship_mname` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `ship_lname` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `ship_address1` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `ship_address2` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `ship_city` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `ship_state` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `ship_country` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `ship_zipcode` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `ship_day_telephone` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `ship_evening_telephone` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `ship_companyname` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `email` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `arriveby` date DEFAULT NULL,
  `statuschangedate` date DEFAULT NULL,
  `statuschange_mail` char(1) COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `trackingnumber` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `orderid` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `disctype` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `discamt` decimal(10,2) DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `tax` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `ordermaster`
--

INSERT INTO `ordermaster` VALUES(3, 0, '2012-02-06 00:04:57', 0, '', 'test', 100, 98, NULL, 'Visa', '4111111111111111', '01', '2014', '1123', 'New', 'notpaid', 'rae', NULL, 'parth', '96 east williston park', '', 'east williston', 'Florida', 'USA', '11596', '789-789-7980', NULL, NULL, 'rae', NULL, 'parth', '96 east williston park', '', 'east williston', 'Florida', 'USA', '11596', '789-789-7980', NULL, NULL, '', NULL, NULL, 'N', NULL, 'ORD0000003', '$', 2.00, 2.00, 0.00);
INSERT INTO `ordermaster` VALUES(4, 0, '2012-03-08 18:21:29', 0, '', '', 70, 70, NULL, 'Visa', '4111111111111111', '01', '2012', '176', 'In process', 'notpaid', 'Saki', NULL, 'Sato', '958 Lafayette Ave', 'Apt 2', 'Brooklyn', 'New York', 'USA', '11221', '5164292143', NULL, NULL, 'Saki', NULL, 'Sato', '958 Lafayette Ave', 'Apt 2', 'Brooklyn', 'New York', 'USA', '11221', '5164292143', NULL, NULL, 'sakiisato@gmail.com', NULL, NULL, 'N', NULL, 'ORD0000004', '', 0.00, 0.00, 0.00);
INSERT INTO `ordermaster` VALUES(5, 0, '2012-04-05 08:50:53', 0, '', '', 18, 18, NULL, '', '', '', '', '', 'In process', 'notpaid', 'Rae', NULL, 'Parth', '96 east williston park', '', 'New York', 'New York', 'USA', '', '789-789-1571', NULL, NULL, 'Rae', NULL, 'Parth', '96 east williston park', '', 'east williston', 'Florida', 'USA', '11596', '789-789-1571', NULL, NULL, 'rpaxis3@gmail.com', NULL, NULL, 'N', NULL, 'ORD0000005', '', 0.00, 0.00, 0.00);
INSERT INTO `ordermaster` VALUES(6, 0, '2012-04-10 11:46:56', 0, '', '', 10, 10, NULL, '', '', '', '', '', 'In process', 'notpaid', 'Saki', NULL, 'Sato', '1100 Broadway', '', 'Brooklyn', 'New York', 'USA', '', '516-429-2143', NULL, NULL, 'Saki', NULL, 'Sato', '1100 Broadway', '', 'Brooklyn', 'New York', 'USA', '11221', '516-429-2143', NULL, NULL, 'sakiisato@gmail.com', NULL, NULL, 'N', NULL, 'ORD0000006', '', 0.00, 0.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `orderstatus`
--

CREATE TABLE `orderstatus` (
  `status` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderstatus`
--

INSERT INTO `orderstatus` VALUES('Cancelled', 'Cancelled Orders');
INSERT INTO `orderstatus` VALUES('Cancellation in process', 'Cancellation in process');
INSERT INTO `orderstatus` VALUES('Delivered', 'Delivered orders');
INSERT INTO `orderstatus` VALUES('Exchanged', 'Exchanged');
INSERT INTO `orderstatus` VALUES('In process', 'In process');
INSERT INTO `orderstatus` VALUES('Not delivered', 'Not delivered');
INSERT INTO `orderstatus` VALUES('Shipped', 'Shipped');
INSERT INTO `orderstatus` VALUES('Returned', 'Returned');
INSERT INTO `orderstatus` VALUES('Returned to Buyer', 'Returned to Buyer');
INSERT INTO `orderstatus` VALUES('Received', 'Received');

-- --------------------------------------------------------

--
-- Table structure for table `press`
--

CREATE TABLE `press` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `date_added` date DEFAULT NULL,
  `date_display` date DEFAULT NULL,
  `description` text,
  `shortdesc` text,
  `thumbnail` varchar(255) DEFAULT NULL,
  `linktosite` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `publication` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `press`
--

INSERT INTO `press` VALUES(1, 'Come Up to His Room', '2012-03-12', '2008-09-20', '<p>Morbi aliquet metus quis mi ullamcorper quis consectetur est aliquet. Sed blandit semper cursus. Vestibulum a congue sem. Donec blandit metus at nisi ornare et aliquam est iaculis. Cras eros purus, consequat quis convallis vel, tristique et lacus. Nam risus nisl, ullamcorper eu auctor eget, porta commodo sapien. Maecenas ac eros libero? Suspendisse suscipit eros a elit aliquet a bibendum odio varius. Fusce nec accumsan mi.<br />\r\n<br />\r\nCras aliquam vestibulum vehicula. Praesent eget nunc a elit scelerisque sagittis eget quis ipsum. Nunc eu sollicitudin metus. Nullam justo sapien, ultricies eget fermentum non, ultrices in nisl. Nulla laoreet mauris sed diam commodo luctus. Nullam ultricies blandit metus id ultrices. Suspendisse placerat eros ut mi posuere adipiscing. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Maecenas risus sem, volutpat a ultricies vitae, consequat pretium mauris! Etiam vestibulum varius mauris. Quisque vitae nisl at massa aliquam mollis! Aliquam ipsum lorem, dictum id scelerisque at, bibendum eu elit.<br />\r\n<br />\r\nMorbi id erat orci, vel congue mauris. Nulla facilisi. Cras aliquam ipsum quis dolor luctus quis posuere lorem adipiscing. Suspendisse potenti. Etiam arcu arcu, hendrerit vel congue eu, ornare at erat. Quisque sollicitudin tristique libero mattis imperdiet. Vestibulum eu vulputate quam. Donec turpis nisi, varius ut faucibus eget, blandit id dui. Nulla porttitor lacinia quam, eget tempus lectus placerat bibendum. Etiam mollis quam in arcu lobortis adipiscing. Nunc volutpat nisl non ligula luctus mollis!<br />\r\n<br />\r\nSed turpis magna, venenatis vitae tincidunt id, imperdiet id massa? In purus velit, dignissim quis venenatis ut, viverra eu tortor. Sed aliquet sollicitudin tincidunt. Maecenas ullamcorper, mi eget imperdiet rhoncus, tellus mi semper dui, sed aliquam neque sem vitae risus. Phasellus sodales ullamcorper quam. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent non nisl mauris, quis fringilla risus! Curabitur faucibus euismod nibh, vitae hendrerit lectus lobortis sit amet. Quisque ullamcorper ligula justo. Aenean lacinia libero libero. Suspendisse condimentum justo sit amet arcu condimentum eleifend. Vestibulum malesuada odio vel est iaculis varius ullamcorper orci adipiscing! Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris pellentesque porttitor massa non laoreet. Pellentesque elit mauris, fringilla faucibus dapibus eu, eleifend eu odio. Nulla venenatis, sem sit amet pharetra posuere, orci lectus ultricies sapien, at fermentum justo dui ut lacus.<br />\r\n<br />\r\nInteger id lorem felis, vitae facilisis ipsum. Praesent consequat odio ut lacus egestas vestibulum. Nullam vel felis at lacus gravida rutrum id ac ante. Nullam mollis vulputate turpis ac iaculis. Suspendisse id nulla quis augue imperdiet elementum ut eget lorem. Proin nisl leo, tristique sed facilisis quis, congue vitae lectus. Etiam in neque tortor. Praesent erat massa, laoreet ut ornare eget, ultrices vitae ipsum. Aenean aliquet odio at est facilisis tempus. Integer quis quam aliquet enim hendrerit dapibus et ac arcu. Ut eleifend porta ligula dignissim mollis. Duis eget leo elit?<br />\r\n&nbsp;</p>', 'Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse...', '1156456579thumbnail_The_Globe___Canada_Press.jpg', 'http://', 'Tim Mckeough', 'The Globe and Mail', '1470210332presspdf_Dummy.pdf');
INSERT INTO `press` VALUES(4, 'Party to Pump Up St. Patrick\\''s Night', '2012-04-10', '2006-03-08', '<p>Nunc malesuada turpis ut quam rhoncus in semper mi laoreet. Integer fermentum, est sed sagittis commodo, eros mi faucibus lorem, eu lacinia augue arcu et tellus. Sed quis quam arcu. Quisque lacinia dui tempor sapien bibendum in luctus dolor facilisis. Donec semper pellentesque turpis, tincidunt porttitor nisl auctor sit amet? Nullam mattis nisi lectus, in blandit tortor. Nullam imperdiet urna semper nibh volutpat eget tincidunt leo pulvinar. Nulla tincidunt congue mollis! Quisque malesuada ligula vel tortor malesuada non faucibus turpis imperdiet. Aenean tempor, elit sit amet varius lobortis, massa felis aliquam est, ornare malesuada dolor neque sed libero. Sed consectetur sapien eget neque porttitor aliquet. Donec eleifend sapien enim? In pharetra convallis dapibus.</p>', 'Maecenas tempus dolor sit amet mauris porta a molestie mauris luctus? Maecenas justo lorem, placerat vel ullamcorper ac, ultrices vel dui. Vestibulum et lectus odio, in ultrices erat. Nam vel nulla lectus, eget semper tellus. Nam elementum cursus tempus. Cras a neque diam. Aenean cursus erat nec dui ultrices cursus.', '190527674thumbnail_irishvoice.jpg', 'http://news.com', 'Toshi', 'Irish Voice', '1716021009presspdf_Dummy.pdf');
INSERT INTO `press` VALUES(2, 'That\\''s a Roof with a View', '2012-03-28', '2009-06-21', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis rutrum dapibus erat. Pellentesque eget dolor dolor. Phasellus eu pharetra nunc. Nullam venenatis, urna ut fringilla tincidunt, sapien nulla rutrum leo, at ornare turpis sem a velit. Vivamus pretium nulla molestie augue vestibulum quis posuere lacus pellentesque. Suspendisse potenti. Nulla facilisi.<br />\r\n<br />\r\nSed iaculis venenatis dapibus. Vestibulum lacus mauris, auctor vestibulum tempor vel, congue eget massa? Vivamus porttitor urna ac justo viverra porttitor. Morbi ut faucibus lorem. Etiam vel nunc at sem mollis laoreet in vitae odio. Phasellus ac nisl in augue laoreet ultricies nec a lacus. Nam molestie consequat eros malesuada lacinia. Mauris commodo fermentum purus, eget porta libero vestibulum a. Proin vitae urna in risus vestibulum auctor. Quisque lobortis lobortis dictum. Proin tempor bibendum nunc sit amet aliquet? Fusce a ornare nunc. Morbi congue ornare nibh nec scelerisque! Phasellus venenatis viverra scelerisque.<br />\r\n<br />\r\nPhasellus ac velit massa, id iaculis risus. Curabitur tellus ipsum, convallis at convallis in, accumsan a mi. Vestibulum congue, urna dictum semper rutrum, felis mauris commodo est, eleifend fringilla nibh est sed felis! Mauris pellentesque mattis rutrum. Fusce bibendum ante id tortor laoreet volutpat! Quisque interdum vestibulum nisl, sed tempor mi egestas eu. Phasellus sit amet urna a mauris rhoncus pellentesque id ac ante? Integer convallis tortor at odio scelerisque tincidunt. Ut viverra dui lacus. Maecenas interdum, justo sit amet mollis lobortis, sapien leo scelerisque diam, quis pretium nisl diam ac purus.<br />\r\n<br />\r\nEtiam non felis mauris, et accumsan arcu. Etiam eu tortor erat, sit amet interdum nisl. Duis fermentum tempus sem eget rutrum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Phasellus ullamcorper sodales libero a pretium. Donec blandit dolor sit amet massa dictum semper. Phasellus ac elit dui, nec lobortis libero. Curabitur a dui libero. Vivamus in mauris dolor. Maecenas sed purus id dolor blandit vulputate! Etiam mollis lorem quis tortor lacinia ultrices ut at odio. Nunc dapibus egestas enim. Sed scelerisque nibh viverra leo scelerisque ac ullamcorper eros volutpat. Pellentesque eget est vel mauris rutrum cursus ut vel diam. Maecenas quis odio metus. Etiam tristique ipsum vitae elit tempor posuere.<br />\r\n<br />\r\nDonec sagittis metus vitae lacus elementum eu elementum nibh sollicitudin! Phasellus a egestas nibh. Donec ac pretium tortor. Donec malesuada magna ac sapien aliquet cursus. Nullam vel mi tortor, at auctor quam. Quisque nulla nisi, interdum sit amet cursus eget; dignissim placerat neque? Suspendisse potenti. Integer auctor, odio at tristique consectetur, turpis ipsum faucibus tortor, at mollis ligula est ac sem. Nulla at ipsum arcu, at convallis enim. Nunc dictum erat a lectus ullamcorper in rhoncus elit aliquam. Praesent dolor magna, euismod et elementum quis, tempor placerat justo. Sed hendrerit cursus faucibus. Integer sem elit, hendrerit et pulvinar nec, auctor ac augue. Cras convallis nibh vitae ligula molestie suscipit.<br />\r\n<br />\r\nSuspendisse luctus, nibh eu convallis tempus, neque nisl ullamcorper sapien, posuere tempus ligula diam a neque. Phasellus non malesuada tortor? Fusce id egestas leo. Etiam id pellentesque velit. Donec eget molestie odio. Nam ante orci, tempor sit amet rutrum in, adipiscing et eros. Cras in lorem eget turpis rhoncus consequat non quis arcu. Proin lectus urna, tempus quis lobortis et, laoreet vitae velit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed at nibh a nunc consequat ultrices. Maecenas augue tellus; scelerisque ac laoreet eu, varius quis est. Vivamus diam mauris, accumsan ut tincidunt quis, ornare malesuada odio.<br />\r\n&nbsp;</p>', 'Natus error sit voluptatem accusantium doloremque laudantium architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.\r\n', '1378305553thumbnail_nycdailynews_openair_thumb.jpg', 'http://', 'Ben Chapman', 'Daily News', '551741712presspdf_Dummy.pdf');
INSERT INTO `press` VALUES(3, 'A giver of Parties Now a Giver of Leases', '2012-03-28', '2012-03-30', '<p>Maecenas magna metus, bibendum id fringilla ut, ultrices vestibulum ipsum. Donec adipiscing venenatis nunc, quis lobortis lorem accumsan in. Nam hendrerit lorem in libero tristique quis feugiat elit rutrum? Cras eget mi lacus. Nunc malesuada enim dictum ipsum placerat scelerisque. Aenean congue consectetur justo ac congue. Sed in justo ligula, at porta dui. In vitae malesuada mi. Cras vehicula convallis luctus.<br />\r\n<br />\r\nNunc porttitor semper mi sed posuere. Suspendisse fringilla rhoncus semper. Donec sit amet commodo magna. Praesent vitae risus a libero dapibus aliquet sit amet at erat. Mauris velit felis, ornare nec sodales et, scelerisque eget justo! Ut condimentum erat vel enim tempor ultrices. Nunc sollicitudin odio et lectus tempor sit amet feugiat eros adipiscing. Vestibulum sed sapien sed orci commodo iaculis. Praesent vestibulum dignissim velit ut blandit. Praesent ultricies pharetra elit. Nam mauris libero, vestibulum et bibendum at; ornare sit amet elit. Aenean sapien velit; feugiat eu semper vel, sollicitudin at enim! Etiam non leo at diam ultricies placerat a feugiat est!<br />\r\n<br />\r\nUt tincidunt adipiscing leo, vel commodo orci dignissim ac. Curabitur vel eros eget ante hendrerit scelerisque? Sed iaculis eros vel dui hendrerit eget volutpat lorem volutpat. Mauris gravida convallis condimentum. Vivamus varius, dui sit amet tincidunt vehicula, justo neque suscipit orci, in gravida purus nisi at elit? Sed ut neque sit amet erat tincidunt pretium posuere quis odio. Nulla facilisi. Vestibulum tristique tristique euismod? Suspendisse potenti. Nunc id enim mi, vel lacinia erat. Nullam sagittis; velit in egestas ultrices, augue nisl elementum libero, vel tincidunt risus sem non leo! Duis rutrum, nisl nec adipiscing facilisis, sem lorem porttitor sem, at ornare mauris ligula vitae purus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed ullamcorper pulvinar consectetur. In vitae felis dui.<br />\r\n<br />\r\nCras mattis; est in ultricies commodo, ipsum massa mattis nibh, vel fringilla est dui eu leo. Mauris ut sapien velit. Vestibulum dolor elit, tempus eget imperdiet sed, euismod sed purus. Quisque varius tortor et massa commodo et pellentesque orci sagittis. Curabitur ac nibh ut massa consectetur bibendum nec non lorem! Mauris vitae neque justo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam quam leo, tempus eleifend egestas et, volutpat rhoncus risus! Cras non orci nisl. In pulvinar; neque ut luctus pellentesque, ipsum turpis luctus diam, ac rutrum massa magna at eros. Fusce nec arcu risus, molestie placerat felis. Fusce sed metus dictum ligula malesuada convallis. Fusce nisl risus, lacinia vel luctus ac, tempus et nisl. Nam ut mauris sit amet nisi tempus scelerisque at a arcu! Morbi congue, nulla eget aliquet porttitor, libero felis semper dolor, sed consequat nunc enim non mi? Pellentesque mattis magna vel orci condimentum at venenatis ipsum eleifend.<br />\r\n<br />\r\nPhasellus in enim sit amet nisi ullamcorper cursus at nec mauris. Sed interdum neque nec lectus porta aliquam. Suspendisse leo dolor, auctor sagittis adipiscing ut, scelerisque nec dolor. Nunc quis nisl sapien, non pharetra lacus. Proin dignissim feugiat nibh, ut adipiscing mi fringilla ut. Sed eu orci velit. Aliquam cursus scelerisque congue. Cras vehicula suscipit urna eget tempor. Vivamus ut hendrerit tortor. Fusce placerat ipsum quis libero cursus in varius justo fringilla. Vivamus at ante elit; nec ullamcorper purus. Nulla dapibus, urna mattis porta vulputate, ligula ante iaculis dui, eget feugiat nulla risus sed sem! Suspendisse egestas viverra ligula a convallis. Quisque ultrices, lectus ut tempor dapibus, ipsum dui egestas nibh, non lacinia lacus nisi et dolor. Proin tincidunt eros vitae nunc tristique ut consectetur purus porttitor!<br />\r\n<br />\r\nNunc mollis suscipit erat nec imperdiet. Donec varius gravida arcu ut porttitor. Pellentesque est nisl, pharetra quis vulputate non, luctus at lorem. Praesent vel sollicitudin ante. In tempus molestie massa sagittis malesuada. Etiam ut purus quis purus lobortis luctus. Duis od<br />\r\n&nbsp;</p>', 'Natus error sit voluptatem accusantium doloremque laudantium architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.\r\n', '1545814311thumbnail_New_York_Times_article.jpg', 'http://', '', '', '');
INSERT INTO `press` VALUES(5, 'Toshi in AM New York', '2012-04-23', '2004-06-24', '<p>In hac habitasse platea dictumst. Donec lorem libero, accumsan eget tincidunt accumsan, pretium at metus. Sed in neque non risus varius porttitor? Vestibulum sed arcu eget justo pulvinar laoreet. Nulla facilisi. Nullam porta nisi sed tortor dapibus eu fermentum dui ultrices. In pulvinar sapien at ante tincidunt non blandit lectus varius! Sed mi enim, eleifend quis blandit sed, venenatis quis est.<br />\r\n<br />\r\nAliquam tempus nibh a justo posuere non varius velit rutrum. Aliquam erat volutpat. Pellentesque at aliquet mi? Maecenas egestas varius ligula vitae cursus. Nunc vel magna ut turpis cursus consequat. Nam a tincidunt nibh. Vivamus in porttitor ante. Donec odio sapien, euismod sed mollis nec, venenatis et orci. Mauris odio justo, commodo vitae posuere vel, adipiscing et sapien.<br />\r\n<br />\r\nDonec cursus imperdiet luctus. Curabitur ac neque turpis, et malesuada dolor. Maecenas non mauris risus, auctor placerat orci. Fusce placerat massa et enim fringilla ultrices? Phasellus ullamcorper neque quis tortor lobortis nec pulvinar tellus vulputate! Aenean lorem lorem, sagittis sed varius eget, porttitor quis felis. Vivamus et sapien lacus. Nam feugiat accumsan diam sit amet posuere. Aliquam non dui nec ipsum imperdiet consequat. In turpis mauris, pharetra vitae scelerisque nec, semper cursus turpis. Aliquam placerat nisi felis; at malesuada lectus.<br />\r\n<br />\r\nCras interdum auctor tellus non condimentum. Phasellus sed metus vel eros tincidunt pharetra a a mi. Donec blandit lacus lacus, non cursus lectus. Cras placerat tincidunt eros; nec placerat erat pretium ac! Sed id magna enim, ut rhoncus elit. Vivamus ac est ac nisl hendrerit congue. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam erat volutpat. Nam rutrum mi orci. Nam molestie malesuada placerat. Pellentesque pretium interdum nisl id faucibus. Ut quis rhoncus quam. Aliquam molestie sollicitudin hendrerit? Nullam id elit nisl. Mauris gravida nulla ut urna rhoncus consectetur.</p>', 'Suspendisse volutpat neque pulvinar eros dictum sagittis at vel diam. Mauris ac dui quam, eu accumsan nulla. Pellentesque eget felis at purus euismod viverra eu rutrum dui! Etiam in lorem ut justo luctus semper luctus elementum magna. In nec sagittis metus. Vestibulum vel nisi augue. Quisque quis justo eu enim suscipit iaculis. Pellentesque commodo tempor ipsum eu posuere!', '1499457743thumbnail_AMNewYorktoshi.jpg', 'http://www.amnewyork.com', 'Justin Rocket Silverman', 'AM New York', '1058935746presspdf_Dummy.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `promotional`
--

CREATE TABLE `promotional` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `promocode` varchar(250) NOT NULL DEFAULT '',
  `disctype` varchar(5) NOT NULL DEFAULT '',
  `discamt` decimal(10,2) NOT NULL DEFAULT '0.00',
  `one_time` varchar(255) DEFAULT NULL,
  `expires` datetime DEFAULT NULL,
  `min_val` varchar(255) DEFAULT NULL,
  `usage` int(11) NOT NULL DEFAULT '0',
  `notes` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `promotional`
--

INSERT INTO `promotional` VALUES(27, 'test', 'D', 2.00, 'N', '2013-02-01 00:00:00', '1', 0, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id_state` int(11) NOT NULL AUTO_INCREMENT,
  `id_country` int(11) NOT NULL DEFAULT '0',
  `state_name` varchar(50) NOT NULL DEFAULT '',
  `state_html` varchar(100) DEFAULT NULL,
  `shippingstate` char(1) NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id_state`),
  KEY `id_country` (`id_country`),
  KEY `state_name` (`state_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='state name display country wise' AUTO_INCREMENT=2659 ;

--
-- Dumping data for table `state`
--

INSERT INTO `state` VALUES(1, 1, 'Nangarhar', '"Nangarh&#257;r"', 'Y');
INSERT INTO `state` VALUES(2, 1, 'Paktiya', '"Paktiy&#257;"', 'Y');
INSERT INTO `state` VALUES(3, 1, 'Farah', 'Farah', 'Y');
INSERT INTO `state` VALUES(4, 1, 'Baglan', '"Bagl&#257;n"', 'Y');
INSERT INTO `state` VALUES(5, 1, 'Faryab', 'Faryab', 'Y');
INSERT INTO `state` VALUES(6, 1, 'Jawzjan', '"Jawzj&#257;n"', 'Y');
INSERT INTO `state` VALUES(7, 1, 'Kunar', 'Kunar', 'Y');
INSERT INTO `state` VALUES(8, 1, 'HerÃ¢t', '"Her&#257;t"', 'Y');
INSERT INTO `state` VALUES(9, 1, 'Samangan', 'Samangan', 'Y');
INSERT INTO `state` VALUES(10, 1, 'Lawghar', 'Lawghar', 'Y');
INSERT INTO `state` VALUES(11, 1, 'Kabul', '"K&#257;bul"', 'Y');
INSERT INTO `state` VALUES(12, 1, 'Hilmand', 'Hilmand', 'Y');
INSERT INTO `state` VALUES(13, 1, 'Badgis', '"B&#257;dg&#299;s"', 'Y');
INSERT INTO `state` VALUES(14, 1, 'Balkh', '"Bal&#295;"', 'Y');
INSERT INTO `state` VALUES(15, 1, 'BÃ¢miyÃ¢n', '"B&#257;miy&#257;n"', 'Y');
INSERT INTO `state` VALUES(16, 1, 'Gawr', 'Gawr', 'Y');
INSERT INTO `state` VALUES(17, 1, 'Takhar', '"Ta&#295;&#257;r"', 'Y');
INSERT INTO `state` VALUES(18, 1, 'Nimruz', 'Nimruz', 'Y');
INSERT INTO `state` VALUES(19, 1, 'Parwan', '"Parw&#257;n"', 'Y');
INSERT INTO `state` VALUES(20, 1, 'Sar-e Pul', 'Sar-e Pul', 'Y');
INSERT INTO `state` VALUES(21, 1, 'Qunduz', '"Qund&#363;z"', 'Y');
INSERT INTO `state` VALUES(22, 1, 'Uruzgan', '"Ur&#363;zg&#257;n"', 'Y');
INSERT INTO `state` VALUES(23, 1, 'Badakhshan', '"Bada&#295;&#353;an"', 'Y');
INSERT INTO `state` VALUES(24, 1, 'Wardag', 'Wardag', 'Y');
INSERT INTO `state` VALUES(25, 1, 'GaznÃ®', '"Gazn&#299;"', 'Y');
INSERT INTO `state` VALUES(26, 1, 'Khawst', '"&#294;awst"', 'Y');
INSERT INTO `state` VALUES(27, 1, 'Kapisa', '"K&#257;p&#299;s&#257;"', 'Y');
INSERT INTO `state` VALUES(28, 1, 'Lagman', '"Lagm&#257;n"', 'Y');
INSERT INTO `state` VALUES(29, 1, 'Nuristan', '"N&#363;rist&#257;n"', 'Y');
INSERT INTO `state` VALUES(30, 1, 'Paktika', '"Pakt&#299;k&#257;"', 'Y');
INSERT INTO `state` VALUES(31, 1, 'Zabul', '"Z&#257;bul"', 'Y');
INSERT INTO `state` VALUES(32, 1, 'Qandahar', 'Qandahar', 'Y');
INSERT INTO `state` VALUES(33, 2, 'Tropoje', '"Tropoj&#235;"', 'Y');
INSERT INTO `state` VALUES(34, 2, 'Mallakaster', '"Mallakast&#235;r"', 'Y');
INSERT INTO `state` VALUES(35, 2, 'Berat', 'Berat', 'Y');
INSERT INTO `state` VALUES(36, 2, 'Devoll', 'Devoll', 'Y');
INSERT INTO `state` VALUES(37, 2, 'Bulqize', '"Bulqiz&#235;"', 'Y');
INSERT INTO `state` VALUES(38, 2, 'Mat', 'Mat', 'Y');
INSERT INTO `state` VALUES(39, 2, 'Elbasan', 'Elbasan', 'Y');
INSERT INTO `state` VALUES(40, 2, 'Skrapar', 'Skrapar', 'Y');
INSERT INTO `state` VALUES(41, 2, 'Delvine', '"Delvin&#235;"', 'Y');
INSERT INTO `state` VALUES(42, 2, 'Durres', '"Durr&#235;s"', 'Y');
INSERT INTO `state` VALUES(43, 2, 'Kolonje', '"Kolonj&#235;"', 'Y');
INSERT INTO `state` VALUES(44, 2, 'Fier', 'Fier', 'Y');
INSERT INTO `state` VALUES(45, 2, 'Puke', '"Puk&#235;"', 'Y');
INSERT INTO `state` VALUES(46, 2, 'Kruje', '"Kruj&#235;"', 'Y');
INSERT INTO `state` VALUES(47, 2, 'Gjirokaster', '"Gjirokast&#235;r"', 'Y');
INSERT INTO `state` VALUES(48, 2, 'Gramsh', 'Gramsh', 'Y');
INSERT INTO `state` VALUES(49, 2, 'Vlore', '"Vlor&#235;"', 'Y');
INSERT INTO `state` VALUES(50, 2, 'Tirane', '"Tiran&#235;"', 'Y');
INSERT INTO `state` VALUES(51, 2, 'Kavaje', '"Kavaj&#235;"', 'Y');
INSERT INTO `state` VALUES(52, 2, 'Permet', '"P&#235;rmet"', 'Y');
INSERT INTO `state` VALUES(53, 2, 'Sarande', '"Sarand&#235;"', 'Y');
INSERT INTO `state` VALUES(54, 2, 'Malsi e Madhe', 'Malsi e Madhe', 'Y');
INSERT INTO `state` VALUES(55, 2, 'Korce', '"Kor&#231;&#235;"', 'Y');
INSERT INTO `state` VALUES(56, 2, 'Has', 'Has', 'Y');
INSERT INTO `state` VALUES(57, 2, 'Kucove', '"Ku&#231;ov&#235;"', 'Y');
INSERT INTO `state` VALUES(58, 2, 'Kukes', '"Kuk&#235;s"', 'Y');
INSERT INTO `state` VALUES(59, 2, 'Mirdite', '"Mirdit&#235;"', 'Y');
INSERT INTO `state` VALUES(60, 2, 'Kurbin', 'Kurbin', 'Y');
INSERT INTO `state` VALUES(61, 2, 'Lezhe', '"Lezh&#235;"', 'Y');
INSERT INTO `state` VALUES(62, 2, 'Librazhd', 'Librazhd', 'Y');
INSERT INTO `state` VALUES(63, 2, 'Lushnje', '"Lushnj&#235;"', 'Y');
INSERT INTO `state` VALUES(64, 2, 'Tepelene', '"Tepelen&#235;"', 'Y');
INSERT INTO `state` VALUES(65, 2, 'Peqin', 'Peqin', 'Y');
INSERT INTO `state` VALUES(66, 2, 'Dibre', '"Dibr&#235;"', 'Y');
INSERT INTO `state` VALUES(67, 2, 'Pogradec', 'Pogradec', 'Y');
INSERT INTO `state` VALUES(68, 2, 'Shkoder', '"Shkod&#235;r"', 'Y');
INSERT INTO `state` VALUES(69, 3, 'Ayn Daflah', '<sup><small>c</small></sup>Ayn Daflah', 'Y');
INSERT INTO `state` VALUES(70, 3, 'Bashshar', '"Ba&#353;&#353;ar"', 'Y');
INSERT INTO `state` VALUES(71, 3, 'ash-Shalif', '"a&#353;-&#352;alif"', 'Y');
INSERT INTO `state` VALUES(72, 3, 'al-Bayadh', 'al-Baya<u>d</u>', 'Y');
INSERT INTO `state` VALUES(73, 3, 'Adrar', '"Adr&#257;r"', 'Y');
INSERT INTO `state` VALUES(74, 3, 'Al-Aghwat', '"al-A&#289;w&#257;t"', 'Y');
INSERT INTO `state` VALUES(75, 3, 'Blidah', '"Bl&#299;dah"', 'Y');
INSERT INTO `state` VALUES(76, 3, 'Buirah', '"B&#363;&#299;rah"', 'Y');
INSERT INTO `state` VALUES(77, 3, 'Tizi Wazu', '"T&#299;z&#299; Waz&#363;"', 'Y');
INSERT INTO `state` VALUES(78, 3, 'Bijayah', '"Bij&#257;yah"', 'Y');
INSERT INTO `state` VALUES(79, 3, 'Jijili', '"J&#299;j&#299;l&#299;"', 'Y');
INSERT INTO `state` VALUES(80, 3, 'Sakikdah', '"Sak&#299;kdah"', 'Y');
INSERT INTO `state` VALUES(81, 3, 'Ghalizan', '"&#288;&#257;liz&#257;n"', 'Y');
INSERT INTO `state` VALUES(82, 3, 'Ayn Tamushanat', '"<sup><small>c</small></sup>Ayn Tam&#363;&#353;anat"', 'Y');
INSERT INTO `state` VALUES(83, 3, 'Annabah', '"Ann&#257;bah"', 'Y');
INSERT INTO `state` VALUES(84, 3, 'Wahran', '"Wahr&#257;n"', 'Y');
INSERT INTO `state` VALUES(85, 3, 'Bumardas', 'Bumardas', 'Y');
INSERT INTO `state` VALUES(86, 3, 'Batnah', '"B&#257;tnah"', 'Y');
INSERT INTO `state` VALUES(87, 3, 'Burj Bu Arririj', '"Burj B&#363; Arr&#299;rij"', 'Y');
INSERT INTO `state` VALUES(88, 3, 'Tibissah', 'Tibissah', 'Y');
INSERT INTO `state` VALUES(89, 3, 'Biskrah', 'Biskrah', 'Y');
INSERT INTO `state` VALUES(90, 3, 'Tilimsan', '"T&#299;l&#299;ms&#257;n"', 'Y');
INSERT INTO `state` VALUES(91, 3, 'Qustantinah', '"Qustant&#299;nah"', 'Y');
INSERT INTO `state` VALUES(92, 3, 'Sidi ban-al-Abbas', '"S&#299;d&#299; ban-al-<sup><small>c</small></sup>Abbas"', 'Y');
INSERT INTO `state` VALUES(93, 3, 'Satif', '"Sat&#299;f"', 'Y');
INSERT INTO `state` VALUES(94, 3, 'Masilah', '"Mas&#299;lah"', 'Y');
INSERT INTO `state` VALUES(95, 3, 'Jilfah', 'Jilfah', 'Y');
INSERT INTO `state` VALUES(96, 3, 'Qalmah', 'Qalmah', 'Y');
INSERT INTO `state` VALUES(97, 3, 'Umm-al-Bawaghi', '"Umm-al-Baw&#257;&#289;&#299;"', 'Y');
INSERT INTO `state` VALUES(98, 3, 'Tibazah', '"Tib&#257;zah"', 'Y');
INSERT INTO `state` VALUES(99, 3, 'Midyah', 'Midyah', 'Y');
INSERT INTO `state` VALUES(100, 3, 'Tiyarat', '"Tiy&#257;rat"', 'Y');
INSERT INTO `state` VALUES(101, 3, 'Tamanghasat', '"Taman&#289;&#257;sat"', 'Y');
INSERT INTO `state` VALUES(102, 3, 'Naama', 'Naama', 'Y');
INSERT INTO `state` VALUES(103, 3, 'Mustaghanam', '"Musta&#289;anam"', 'Y');
INSERT INTO `state` VALUES(104, 3, 'Al Jaza\\''ir', '"al-Jaz&#257;<sup><small>c</small></sup>ir"', 'Y');
INSERT INTO `state` VALUES(105, 3, 'at-Tarif', 'at-Tarif', 'Y');
INSERT INTO `state` VALUES(106, 3, 'Al-Wad', '"al-W&#257;d"', 'Y');
INSERT INTO `state` VALUES(107, 3, 'Ghardayah', '"&#288;ard&#257;yah"', 'Y');
INSERT INTO `state` VALUES(108, 3, 'n.a.', 'n.a.', 'Y');
INSERT INTO `state` VALUES(109, 3, 'Muaskar', 'Muaskar', 'Y');
INSERT INTO `state` VALUES(110, 3, 'Milah', '"M&#299;lah"', 'Y');
INSERT INTO `state` VALUES(111, 3, 'Warqla', '"Warql&#257;"', 'Y');
INSERT INTO `state` VALUES(112, 3, 'Khanshalah', '"&#294;an&#353;alah"', 'Y');
INSERT INTO `state` VALUES(113, 3, 'Ilizi', 'Ilizi', 'Y');
INSERT INTO `state` VALUES(114, 3, 'Suq Ahras', '"S&#363;q Ahr&#257;s"', 'Y');
INSERT INTO `state` VALUES(115, 3, 'Tisamsilt', '"T&#299;sams&#299;lt"', 'Y');
INSERT INTO `state` VALUES(116, 3, 'TindÃ»f', '"Tind&#363;f"', 'Y');
INSERT INTO `state` VALUES(117, 4, 'n.a.', 'n.a.', 'Y');
INSERT INTO `state` VALUES(118, 4, 'Eastern', 'Eastern', 'Y');
INSERT INTO `state` VALUES(119, 4, 'Western', 'Western', 'Y');
INSERT INTO `state` VALUES(120, 4, 'Swains Island', 'Swains Island', 'Y');
INSERT INTO `state` VALUES(121, 5, 'Andorra la Vella', 'Andorra la Vella', 'Y');
INSERT INTO `state` VALUES(122, 5, 'Canillo', 'Canillo', 'Y');
INSERT INTO `state` VALUES(123, 5, 'Encamp', 'Encamp', 'Y');
INSERT INTO `state` VALUES(124, 5, 'La Massana', 'La Massana', 'Y');
INSERT INTO `state` VALUES(125, 5, 'Les Escaldes', 'Les Escaldes', 'Y');
INSERT INTO `state` VALUES(126, 5, 'Ordino', 'Ordino', 'Y');
INSERT INTO `state` VALUES(127, 5, 'Sant JuliÃ  de LÃ²ria', '"Sant Juli&#224; de L&#242;ria"', 'Y');
INSERT INTO `state` VALUES(128, 6, 'Benguela', 'Benguela', 'Y');
INSERT INTO `state` VALUES(129, 6, 'Huambo', 'Huambo', 'Y');
INSERT INTO `state` VALUES(130, 6, 'Cabinda', 'Cabinda', 'Y');
INSERT INTO `state` VALUES(131, 6, 'Huila', '"Hu&#237;la"', 'Y');
INSERT INTO `state` VALUES(132, 6, 'Uige', '"U&#237;ge"', 'Y');
INSERT INTO `state` VALUES(133, 6, 'Bie', '"Bi&#233;"', 'Y');
INSERT INTO `state` VALUES(134, 6, 'Bengo', 'Bengo', 'Y');
INSERT INTO `state` VALUES(135, 6, 'Moxico', 'Moxico', 'Y');
INSERT INTO `state` VALUES(136, 6, 'Luanda', 'Luanda', 'Y');
INSERT INTO `state` VALUES(137, 6, 'Lunda Norte', 'Lunda Norte', 'Y');
INSERT INTO `state` VALUES(138, 6, 'Malanje', 'Malanje', 'Y');
INSERT INTO `state` VALUES(139, 6, 'Zaire', 'Zaire', 'Y');
INSERT INTO `state` VALUES(140, 6, 'Kuando-Kubango', 'Kuando-Kubango', 'Y');
INSERT INTO `state` VALUES(141, 6, 'Namibe', 'Namibe', 'Y');
INSERT INTO `state` VALUES(142, 6, 'Kwanza Norte', 'Kwanza Norte', 'Y');
INSERT INTO `state` VALUES(143, 6, 'Cunene', 'Cunene', 'Y');
INSERT INTO `state` VALUES(144, 6, 'Lunda Sul', 'Lunda Sul', 'Y');
INSERT INTO `state` VALUES(145, 6, 'Kwanza Sul', 'Kwanza Sul', 'Y');
INSERT INTO `state` VALUES(146, 7, '', '', 'Y');
INSERT INTO `state` VALUES(147, 8, 'Sector claimed by Argentina/Chile/UK', 'Sector claimed by Argentina/Chile/UK', 'Y');
INSERT INTO `state` VALUES(148, 8, 'Unclaimed Sector', 'Unclaimed Sector', 'Y');
INSERT INTO `state` VALUES(149, 8, 'Sector claimed by Australia', 'Sector claimed by Australia', 'Y');
INSERT INTO `state` VALUES(150, 8, 'Sector claimed by France', 'Sector claimed by France', 'Y');
INSERT INTO `state` VALUES(151, 8, 'Sector claimed by Argentina/UK', 'Sector claimed by Argentina/UK', 'Y');
INSERT INTO `state` VALUES(152, 8, 'Sector claimed by New Zealand', 'Sector claimed by New Zealand', 'Y');
INSERT INTO `state` VALUES(153, 8, 'Sector claimed by Norway', 'Sector claimed by Norway', 'Y');
INSERT INTO `state` VALUES(154, 9, 'Saint John', 'Saint John', 'Y');
INSERT INTO `state` VALUES(155, 9, 'Saint Mary', 'Saint Mary', 'Y');
INSERT INTO `state` VALUES(156, 9, 'Saint George', 'Saint George', 'Y');
INSERT INTO `state` VALUES(157, 9, 'Barbuda', 'Barbuda', 'Y');
INSERT INTO `state` VALUES(158, 9, 'Saint Paul', 'Saint Paul', 'Y');
INSERT INTO `state` VALUES(159, 9, 'Saint Philip', 'Saint Philip', 'Y');
INSERT INTO `state` VALUES(160, 9, 'Saint Peter', 'Saint Peter', 'Y');
INSERT INTO `state` VALUES(161, 10, 'Cordova', '"C&#243;rdoba"', 'Y');
INSERT INTO `state` VALUES(162, 10, 'Buenos Aires', 'Buenos Aires', 'Y');
INSERT INTO `state` VALUES(163, 10, 'Distrito Federal / Buenos Aires', 'Distrito Federal / Buenos Aires', 'Y');
INSERT INTO `state` VALUES(164, 10, 'Catamarca', 'Catamarca', 'Y');
INSERT INTO `state` VALUES(165, 10, 'Chubut', 'Chubut', 'Y');
INSERT INTO `state` VALUES(166, 10, 'Entre Rios', '"Entre R&#237;os"', 'Y');
INSERT INTO `state` VALUES(167, 10, 'Corrientes', 'Corrientes', 'Y');
INSERT INTO `state` VALUES(168, 10, 'Neuquen', '"Neuqu&#233;n"', 'Y');
INSERT INTO `state` VALUES(169, 10, 'Misiones', 'Misiones', 'Y');
INSERT INTO `state` VALUES(170, 10, 'Formosa', 'Formosa', 'Y');
INSERT INTO `state` VALUES(171, 10, 'La Pampa', 'La Pampa', 'Y');
INSERT INTO `state` VALUES(172, 10, 'Rio Negro', '"R&#237;o Negro"', 'Y');
INSERT INTO `state` VALUES(173, 10, 'Jujuy', 'Jujuy', 'Y');
INSERT INTO `state` VALUES(174, 10, 'La Rioja', 'La Rioja', 'Y');
INSERT INTO `state` VALUES(175, 10, 'Mendoza', 'Mendoza', 'Y');
INSERT INTO `state` VALUES(176, 10, 'San Luis', 'San Luis', 'Y');
INSERT INTO `state` VALUES(177, 10, 'Chaco', 'Chaco', 'Y');
INSERT INTO `state` VALUES(178, 10, 'Santa Fe', '"Santa F&#233;"', 'Y');
INSERT INTO `state` VALUES(179, 10, 'Santa Cruz', 'Santa Cruz', 'Y');
INSERT INTO `state` VALUES(180, 10, 'Salta', 'Salta', 'Y');
INSERT INTO `state` VALUES(181, 10, 'San Juan', 'San Juan', 'Y');
INSERT INTO `state` VALUES(182, 10, 'Santiago del Estero', 'Santiago del Estero', 'Y');
INSERT INTO `state` VALUES(183, 10, 'Tucuman', '"Tucum&#225;n"', 'Y');
INSERT INTO `state` VALUES(184, 10, 'Tierra del Fuego', 'Tierra del Fuego', 'Y');
INSERT INTO `state` VALUES(185, 11, 'Kotaik', 'Kotaik', 'Y');
INSERT INTO `state` VALUES(186, 11, 'Lori', 'Lori', 'Y');
INSERT INTO `state` VALUES(187, 11, 'Syunik', 'Syunik', 'Y');
INSERT INTO `state` VALUES(188, 11, 'Ararat', 'Ararat', 'Y');
INSERT INTO `state` VALUES(189, 11, 'Armavir', 'Armavir', 'Y');
INSERT INTO `state` VALUES(190, 11, 'Shirak', 'Shirak', 'Y');
INSERT INTO `state` VALUES(191, 11, 'Aragatsotn', 'Aragatsotn', 'Y');
INSERT INTO `state` VALUES(192, 11, 'Tavush', 'Tavush', 'Y');
INSERT INTO `state` VALUES(193, 11, 'Gegharkunik', 'Gegharkunik', 'Y');
INSERT INTO `state` VALUES(194, 11, 'n.a.', 'n.a.', 'Y');
INSERT INTO `state` VALUES(195, 11, 'Vayots Dzor', 'Vayots Dzor', 'Y');
INSERT INTO `state` VALUES(196, 11, 'Yerevan', 'Yerevan', 'Y');
INSERT INTO `state` VALUES(197, 12, '', '', 'Y');
INSERT INTO `state` VALUES(198, 13, 'South Australia', 'South Australia', 'Y');
INSERT INTO `state` VALUES(199, 13, 'Western Australia', 'Western Australia', 'Y');
INSERT INTO `state` VALUES(200, 13, 'New South Wales', 'New South Wales', 'Y');
INSERT INTO `state` VALUES(201, 13, 'Northern Territory', 'Northern Territory', 'Y');
INSERT INTO `state` VALUES(202, 13, 'Victoria', 'Victoria', 'Y');
INSERT INTO `state` VALUES(203, 13, 'Queensland', 'Queensland', 'Y');
INSERT INTO `state` VALUES(204, 13, 'Tasmania', 'Tasmania', 'Y');
INSERT INTO `state` VALUES(205, 13, 'Australian Capital Territory', 'Australian Capital Territory', 'Y');
INSERT INTO `state` VALUES(206, 14, 'Tirol', 'Tirol', 'Y');
INSERT INTO `state` VALUES(207, 14, 'Salzburg', 'Salzburg', 'Y');
INSERT INTO `state` VALUES(208, 14, 'Oberosterreich', '"Ober&#246;sterreich"', 'Y');
INSERT INTO `state` VALUES(209, 14, 'Vorarlberg', 'Vorarlberg', 'Y');
INSERT INTO `state` VALUES(210, 14, 'Karnten', '"K&#228;rnten"', 'Y');
INSERT INTO `state` VALUES(211, 14, 'Niederosterreich', '"Nieder&#246;sterreich"', 'Y');
INSERT INTO `state` VALUES(212, 14, 'Steiermark', 'Steiermark', 'Y');
INSERT INTO `state` VALUES(213, 14, 'Burgenland', 'Burgenland', 'Y');
INSERT INTO `state` VALUES(214, 14, 'Wien', 'Wien', 'Y');
INSERT INTO `state` VALUES(215, 15, 'Mil-Qarabax', 'Mil-Qarabax', 'Y');
INSERT INTO `state` VALUES(216, 15, 'Sirvan', '"&#350;irvan"', 'Y');
INSERT INTO `state` VALUES(217, 15, 'n.a.', 'n.a.', 'Y');
INSERT INTO `state` VALUES(218, 15, 'Qazax', 'Qazax', 'Y');
INSERT INTO `state` VALUES(219, 15, 'Saki', '"&#350;&#477;ki"', 'Y');
INSERT INTO `state` VALUES(220, 15, 'Abseron', '"Ab&#351;eron"', 'Y');
INSERT INTO `state` VALUES(221, 15, 'Lankaran', '"L&#477;nk&#477;ran"', 'Y');
INSERT INTO `state` VALUES(222, 15, 'Priaraks', 'Priaraks', 'Y');
INSERT INTO `state` VALUES(223, 15, 'Mugan-Salyan', 'Mugan-Salyan', 'Y');
INSERT INTO `state` VALUES(224, 15, 'Kalbacar', '"K&#477;lb&#477;c&#477;r"', 'Y');
INSERT INTO `state` VALUES(225, 15, 'Naxcivan', '"Nax&#231;&#305;van"', 'Y');
INSERT INTO `state` VALUES(226, 15, 'Ganca', '"G&#477;nc&#477;"', 'Y');
INSERT INTO `state` VALUES(227, 15, 'XaÃ§maz', '"Xa&#231;maz"', 'Y');
INSERT INTO `state` VALUES(228, 15, 'Nagorni-Qarabax', 'Nagorni-Qarabax', 'Y');
INSERT INTO `state` VALUES(229, 16, 'Crooked Island', 'Crooked Island', 'Y');
INSERT INTO `state` VALUES(230, 16, 'Biminis', 'Biminis', 'Y');
INSERT INTO `state` VALUES(231, 16, 'Andros', 'Andros', 'Y');
INSERT INTO `state` VALUES(232, 16, 'Cat Island', 'Cat Island', 'Y');
INSERT INTO `state` VALUES(233, 16, 'Long Island', 'Long Island', 'Y');
INSERT INTO `state` VALUES(234, 16, 'San Salvador', 'San Salvador', 'Y');
INSERT INTO `state` VALUES(235, 16, 'Abaco', 'Abaco', 'Y');
INSERT INTO `state` VALUES(236, 16, 'Ragged Island', 'Ragged Island', 'Y');
INSERT INTO `state` VALUES(237, 16, 'Grand Bahama', 'Grand Bahama', 'Y');
INSERT INTO `state` VALUES(238, 16, 'Eleuthera', 'Eleuthera', 'Y');
INSERT INTO `state` VALUES(239, 16, 'Exuma and Cays', 'Exuma and Cays', 'Y');
INSERT INTO `state` VALUES(240, 16, 'Berry Islands', 'Berry Islands', 'Y');
INSERT INTO `state` VALUES(241, 16, 'Inagua Islands', 'Inagua Islands', 'Y');
INSERT INTO `state` VALUES(242, 16, 'New Providence', 'New Providence', 'Y');
INSERT INTO `state` VALUES(243, 16, 'Mayaguana', 'Mayaguana', 'Y');
INSERT INTO `state` VALUES(244, 16, 'Rum Cay', 'Rum Cay', 'Y');
INSERT INTO `state` VALUES(245, 16, 'Acklins Island', 'Acklins Island', 'Y');
INSERT INTO `state` VALUES(246, 17, 'Hidd', '"&#292;idd"', 'Y');
INSERT INTO `state` VALUES(247, 17, 'Isa', '"<sup><small>c</small></sup>&#298;s&#257;"', 'Y');
INSERT INTO `state` VALUES(248, 17, 'Jidd Hafs', '"Jidd &#292;af&#351;"', 'Y');
INSERT INTO `state` VALUES(249, 17, 'Al Manamah', '"al-Man&#257;mah"', 'Y');
INSERT INTO `state` VALUES(250, 17, 'al-Muharraq', '"al-Mu&#293;arraq"', 'Y');
INSERT INTO `state` VALUES(251, 17, 'ar-Rifa', 'ar-Rifa<sup><small>c</small></sup>a', 'Y');
INSERT INTO `state` VALUES(252, 17, 'Sitrah', 'Sitrah', 'Y');
INSERT INTO `state` VALUES(253, 18, 'Jessor', 'Jessor', 'Y');
INSERT INTO `state` VALUES(254, 18, 'Bogora', '"Bogor&#257;"', 'Y');
INSERT INTO `state` VALUES(255, 18, 'Chuadanga', '"Chu&#257;d&#257;ng&#257;"', 'Y');
INSERT INTO `state` VALUES(256, 18, 'Rangpur', '"Rangp&#363;r"', 'Y');
INSERT INTO `state` VALUES(257, 18, 'Bagar Hat', '"B&#257;gar H&#257;&#355;"', 'Y');
INSERT INTO `state` VALUES(258, 18, 'Kishorganj', 'Kishorganj', 'Y');
INSERT INTO `state` VALUES(259, 18, 'Bandarban', '"B&#257;ndarban"', 'Y');
INSERT INTO `state` VALUES(260, 18, 'Habiganj', '"Hab&#299;ganj"', 'Y');
INSERT INTO `state` VALUES(261, 18, 'Barguna', 'Barguna', 'Y');
INSERT INTO `state` VALUES(262, 18, 'Barisal', '"Ba&#343;&#299;s&#257;l"', 'Y');
INSERT INTO `state` VALUES(263, 18, 'Noakhali', '"No&#257;kh&#257;li"', 'Y');
INSERT INTO `state` VALUES(264, 18, 'Pabna', '"P&#257;bna"', 'Y');
INSERT INTO `state` VALUES(265, 18, 'Maimansingh', 'Maimansingh', 'Y');
INSERT INTO `state` VALUES(266, 18, 'Pirojpur', '"Pirojp&#363;r"', 'Y');
INSERT INTO `state` VALUES(267, 18, 'Faridpur', '"Far&#299;dp&#363;r"', 'Y');
INSERT INTO `state` VALUES(268, 18, 'Kushtiya', '"Kush&#355;iy&#257;"', 'Y');
INSERT INTO `state` VALUES(269, 18, 'Bhola', '"Bhol&#257;"', 'Y');
INSERT INTO `state` VALUES(270, 18, 'Chattagam', '"Ch&#257;&#355;&#355;ag&#257;m"', 'Y');
INSERT INTO `state` VALUES(271, 18, 'Dinajpur', '"Din&#257;jp&#363;r"', 'Y');
INSERT INTO `state` VALUES(272, 18, 'Brahman baria', '"Br&#257;hman B&#257;riya"', 'Y');
INSERT INTO `state` VALUES(273, 18, 'Chandpur', '"Ch&#257;ndp&#363;r"', 'Y');
INSERT INTO `state` VALUES(274, 18, 'Feni', '"Fen&#299;"', 'Y');
INSERT INTO `state` VALUES(275, 18, 'Sunamganj', '"S&#363;n&#257;mganj"', 'Y');
INSERT INTO `state` VALUES(276, 18, 'Kurigram', '"Ku&#343;&#299;gr&#257;m"', 'Y');
INSERT INTO `state` VALUES(277, 18, 'Dhaka', '"Dh&#257;ka"', 'Y');
INSERT INTO `state` VALUES(278, 18, 'Nilphamari', '"Nilph&#257;m&#257;ri"', 'Y');
INSERT INTO `state` VALUES(279, 18, 'Gaybanda', '"G&#257;yb&#257;nd&#257;"', 'Y');
INSERT INTO `state` VALUES(280, 18, 'Gazipur', 'Gazipur', 'Y');
INSERT INTO `state` VALUES(281, 18, 'Nawabganj', '"Naw&#257;bganj"', 'Y');
INSERT INTO `state` VALUES(282, 18, 'Gopalganj', '"Gop&#257;lganj"', 'Y');
INSERT INTO `state` VALUES(283, 18, 'Tangayal', '"Tang&#257;yal"', 'Y');
INSERT INTO `state` VALUES(284, 18, 'Nator', '"Na&#355;or"', 'Y');
INSERT INTO `state` VALUES(285, 18, 'Jaipur Hat', '"Jaip&#363;r H&#257;&#355;"', 'Y');
INSERT INTO `state` VALUES(286, 18, 'Jamalpur', '"Jam&#257;lp&#363;r"', 'Y');
INSERT INTO `state` VALUES(287, 18, 'Jhalakati', '"Jh&#257;l&#257;k&#257;&#355;&#299;"', 'Y');
INSERT INTO `state` VALUES(288, 18, 'Jhanaydah', '"Jhanayd&#257;h"', 'Y');
INSERT INTO `state` VALUES(289, 18, 'Naral', '"Nar&#257;l"', 'Y');
INSERT INTO `state` VALUES(290, 18, 'Rangamati', '"R&#257;ng&#257;m&#257;t&#299;"', 'Y');
INSERT INTO `state` VALUES(291, 18, 'Khagrachhari', 'Khagrachhari', 'Y');
INSERT INTO `state` VALUES(292, 18, 'Khulna', '"Khuln&#257;"', 'Y');
INSERT INTO `state` VALUES(293, 18, 'Koks Bazar', '"Koks B&#257;z&#257;r"', 'Y');
INSERT INTO `state` VALUES(294, 18, 'Komilla', '"Kom&#299;ll&#257;"', 'Y');
INSERT INTO `state` VALUES(295, 18, 'Lakshmipur', '"Lakshm&#299;p&#363;r"', 'Y');
INSERT INTO `state` VALUES(296, 18, 'Lalmanir Hat', '"L&#257;lman&#299;r H&#257;t"', 'Y');
INSERT INTO `state` VALUES(297, 18, 'Madaripur', '"Mad&#257;r&#299;p&#363;r"', 'Y');
INSERT INTO `state` VALUES(298, 18, 'Magura', '"M&#257;gura"', 'Y');
INSERT INTO `state` VALUES(299, 18, 'Manikganj', '"M&#257;&#326;ikganj"', 'Y');
INSERT INTO `state` VALUES(300, 18, 'Maulvi Bazar', '"Maulvi B&#257;z&#257;r"', 'Y');
INSERT INTO `state` VALUES(301, 18, 'Meherpur', 'Meherpur', 'Y');
INSERT INTO `state` VALUES(302, 18, 'Munshiganj', 'Munshiganj', 'Y');
INSERT INTO `state` VALUES(303, 18, 'Sherpur', '"Sherp&#363;r"', 'Y');
INSERT INTO `state` VALUES(304, 18, 'Narayanganj', '"N&#257;r&#257;yanganj"', 'Y');
INSERT INTO `state` VALUES(305, 18, 'Narsingdi', 'Narsingdi', 'Y');
INSERT INTO `state` VALUES(306, 18, 'Naugaon', '"Naug&#257;on"', 'Y');
INSERT INTO `state` VALUES(307, 18, 'Netrakona', '"Netr&#257;kon&#257;"', 'Y');
INSERT INTO `state` VALUES(308, 18, 'Shariatpur', '"Shariatp&#363;r"', 'Y');
INSERT INTO `state` VALUES(309, 18, 'Panchagarh', 'Panchagarh', 'Y');
INSERT INTO `state` VALUES(310, 18, 'Rajbari', '"Rajb&#257;&#343;&#299;"', 'Y');
INSERT INTO `state` VALUES(311, 18, 'Patuakhali', '"Pa&#355;&#363;&#257;kh&#257;l&#299;"', 'Y');
INSERT INTO `state` VALUES(312, 18, 'Thakurgaon', '"Th&#257;kurg&#257;on"', 'Y');
INSERT INTO `state` VALUES(313, 18, 'Rajshahi', '"R&#257;jsh&#257;h&#299;"', 'Y');
INSERT INTO `state` VALUES(314, 18, 'Satkhira', '"S&#257;tkh&#299;r&#257;"', 'Y');
INSERT INTO `state` VALUES(315, 18, 'Sirajganj', '"Sir&#257;jganj"', 'Y');
INSERT INTO `state` VALUES(316, 18, 'Silhat', '"Silha&#355;"', 'Y');
INSERT INTO `state` VALUES(317, 19, 'Saint Joseph', 'Saint Joseph', 'Y');
INSERT INTO `state` VALUES(318, 19, 'Saint John', 'Saint John', 'Y');
INSERT INTO `state` VALUES(319, 19, 'Saint Michael', 'Saint Michael', 'Y');
INSERT INTO `state` VALUES(320, 19, 'Saint George', 'Saint George', 'Y');
INSERT INTO `state` VALUES(321, 19, 'Saint Lucy', 'Saint Lucy', 'Y');
INSERT INTO `state` VALUES(322, 19, 'Saint Philip', 'Saint Philip', 'Y');
INSERT INTO `state` VALUES(323, 19, 'Saint Andrew', 'Saint Andrew', 'Y');
INSERT INTO `state` VALUES(324, 19, 'Saint Thomas', 'Saint Thomas', 'Y');
INSERT INTO `state` VALUES(325, 19, 'Saint James', 'Saint James', 'Y');
INSERT INTO `state` VALUES(326, 19, 'Christ Church', 'Christ Church', 'Y');
INSERT INTO `state` VALUES(327, 19, 'Saint Peter', 'Saint Peter', 'Y');
INSERT INTO `state` VALUES(328, 20, 'Mahiljow', 'Mahiljow', 'Y');
INSERT INTO `state` VALUES(329, 20, 'Hrodna', 'Hrodna', 'Y');
INSERT INTO `state` VALUES(330, 20, 'Vicebsk', 'Vicebsk', 'Y');
INSERT INTO `state` VALUES(331, 20, 'Brest', '"Br&#232;st"', 'Y');
INSERT INTO `state` VALUES(332, 20, 'Minsk', 'Minsk', 'Y');
INSERT INTO `state` VALUES(333, 21, 'Oost-Vlaanderen', 'Oost-Vlaanderen', 'Y');
INSERT INTO `state` VALUES(334, 21, 'Vlaams-Brabant', 'Vlaams-Brabant', 'Y');
INSERT INTO `state` VALUES(335, 21, 'Antwerpen', 'Antwerpen', 'Y');
INSERT INTO `state` VALUES(336, 21, 'Hainaut', 'Hainaut', 'Y');
INSERT INTO `state` VALUES(337, 21, 'Limburg', 'Limburg', 'Y');
INSERT INTO `state` VALUES(338, 21, 'West-Vlaanderen', 'West-Vlaanderen', 'Y');
INSERT INTO `state` VALUES(339, 21, 'LiÃ¨ge', '"Li&#232;ge"', 'Y');
INSERT INTO `state` VALUES(340, 21, 'Namur', 'Namur', 'Y');
INSERT INTO `state` VALUES(341, 21, 'Luxembourg', 'Luxembourg', 'Y');
INSERT INTO `state` VALUES(342, 21, 'Brabant Wallon', 'Brabant Wallon', 'Y');
INSERT INTO `state` VALUES(343, 21, 'Brussel', 'Brussel', 'Y');
INSERT INTO `state` VALUES(344, 22, 'Belize', 'Belize', 'Y');
INSERT INTO `state` VALUES(345, 22, 'Cayo', 'Cayo', 'Y');
INSERT INTO `state` VALUES(346, 22, 'Corozal', 'Corozal', 'Y');
INSERT INTO `state` VALUES(347, 22, 'Stann Creek', 'Stann Creek', 'Y');
INSERT INTO `state` VALUES(348, 22, 'Orange Walk', 'Orange Walk', 'Y');
INSERT INTO `state` VALUES(349, 22, 'Toledo', 'Toledo', 'Y');
INSERT INTO `state` VALUES(350, 23, 'Zou', 'Zou', 'Y');
INSERT INTO `state` VALUES(351, 23, 'Oueme', '"Ou&#233;m&#233;"', 'Y');
INSERT INTO `state` VALUES(352, 23, 'Atlantique', 'Atlantique', 'Y');
INSERT INTO `state` VALUES(353, 23, 'Couffo', 'Couffo', 'Y');
INSERT INTO `state` VALUES(354, 23, 'Mono', 'Mono', 'Y');
INSERT INTO `state` VALUES(355, 23, 'Atacora', 'Atacora', 'Y');
INSERT INTO `state` VALUES(356, 23, 'Borgou', 'Borgou', 'Y');
INSERT INTO `state` VALUES(357, 23, 'Littoral', 'Littoral', 'Y');
INSERT INTO `state` VALUES(358, 23, 'Collines', 'Collines', 'Y');
INSERT INTO `state` VALUES(359, 23, 'Donga', 'Donga', 'Y');
INSERT INTO `state` VALUES(360, 23, 'Alibori', 'Alibori', 'Y');
INSERT INTO `state` VALUES(361, 23, 'Plateau', 'Plateau', 'Y');
INSERT INTO `state` VALUES(362, 24, 'Hamilton', 'Hamilton', 'Y');
INSERT INTO `state` VALUES(363, 24, 'Saint George', 'Saint George', 'Y');
INSERT INTO `state` VALUES(364, 25, 'Chhukha', 'Chhukha', 'Y');
INSERT INTO `state` VALUES(365, 25, 'Chirang', 'Chirang', 'Y');
INSERT INTO `state` VALUES(366, 25, 'Punakha', 'Punakha', 'Y');
INSERT INTO `state` VALUES(367, 25, 'Geylegphug', 'Geylegphug', 'Y');
INSERT INTO `state` VALUES(368, 25, 'Ha', 'Ha', 'Y');
INSERT INTO `state` VALUES(369, 25, 'Bumthang', 'Bumthang', 'Y');
INSERT INTO `state` VALUES(370, 25, 'Lhuntshi', 'Lhuntshi', 'Y');
INSERT INTO `state` VALUES(371, 25, 'Mongar', 'Mongar', 'Y');
INSERT INTO `state` VALUES(372, 25, 'Rinpung', 'Rinpung', 'Y');
INSERT INTO `state` VALUES(373, 25, 'Pemagatsel', 'Pemagatsel', 'Y');
INSERT INTO `state` VALUES(374, 25, 'Samchi', 'Samchi', 'Y');
INSERT INTO `state` VALUES(375, 25, 'Samdrup Jongkhar', 'Samdrup Jongkhar', 'Y');
INSERT INTO `state` VALUES(376, 25, 'Shemgang', 'Shemgang', 'Y');
INSERT INTO `state` VALUES(377, 25, 'Daga', 'Daga', 'Y');
INSERT INTO `state` VALUES(378, 25, 'Tashigang', 'Tashigang', 'Y');
INSERT INTO `state` VALUES(379, 25, 'Timphu', 'Timphu', 'Y');
INSERT INTO `state` VALUES(380, 25, 'Tongsa', 'Tongsa', 'Y');
INSERT INTO `state` VALUES(381, 25, 'Wangdiphodrang', 'Wangdiphodrang', 'Y');
INSERT INTO `state` VALUES(382, 26, 'Santa Cruz', 'Santa Cruz', 'Y');
INSERT INTO `state` VALUES(383, 26, 'La Paz', 'La Paz', 'Y');
INSERT INTO `state` VALUES(384, 26, 'Cochabamba', 'Cochabamba', 'Y');
INSERT INTO `state` VALUES(385, 26, 'Potosi­', '"Potos&#237;"', 'Y');
INSERT INTO `state` VALUES(386, 26, 'Tarija', 'Tarija', 'Y');
INSERT INTO `state` VALUES(387, 26, 'Chuquisaca', 'Chuquisaca', 'Y');
INSERT INTO `state` VALUES(388, 26, 'Oruro', 'Oruro', 'Y');
INSERT INTO `state` VALUES(389, 26, 'Pando', 'Pando', 'Y');
INSERT INTO `state` VALUES(390, 26, 'Beni', 'Beni', 'Y');
INSERT INTO `state` VALUES(391, 27, 'Republika Srpska', 'Republika Srpska', 'Y');
INSERT INTO `state` VALUES(392, 27, 'Federacija Bosna i Hercegovina', 'Federacija Bosna i Hercegovina', 'Y');
INSERT INTO `state` VALUES(393, 28, 'Kgatleng', 'Kgatleng', 'Y');
INSERT INTO `state` VALUES(394, 28, 'Okavango', 'Okavango', 'Y');
INSERT INTO `state` VALUES(395, 28, 'Ghanzi', 'Ghanzi', 'Y');
INSERT INTO `state` VALUES(396, 28, 'Ngwaketse', 'Ngwaketse', 'Y');
INSERT INTO `state` VALUES(397, 28, 'Kweneng', 'Kweneng', 'Y');
INSERT INTO `state` VALUES(398, 28, 'Central Bobonong', 'Central Bobonong', 'Y');
INSERT INTO `state` VALUES(399, 28, 'Ngamiland', 'Ngamiland', 'Y');
INSERT INTO `state` VALUES(400, 28, 'Kgalagadi South', 'Kgalagadi South', 'Y');
INSERT INTO `state` VALUES(401, 28, 'Central Mahalapye', 'Central Mahalapye', 'Y');
INSERT INTO `state` VALUES(402, 28, 'Central Tutume', 'Central Tutume', 'Y');
INSERT INTO `state` VALUES(403, 28, 'North East', 'North East', 'Y');
INSERT INTO `state` VALUES(404, 28, 'Central Serowe-Palapye', 'Central Serowe-Palapye', 'Y');
INSERT INTO `state` VALUES(405, 28, 'Francistown', 'Francistown', 'Y');
INSERT INTO `state` VALUES(406, 28, 'Gaborone', 'Gaborone', 'Y');
INSERT INTO `state` VALUES(407, 28, 'Kgalagadi North', 'Kgalagadi North', 'Y');
INSERT INTO `state` VALUES(408, 28, 'Jwaneng', 'Jwaneng', 'Y');
INSERT INTO `state` VALUES(409, 28, 'Chobe', 'Chobe', 'Y');
INSERT INTO `state` VALUES(410, 28, 'South East', 'South East', 'Y');
INSERT INTO `state` VALUES(411, 28, 'Central Boteti', 'Central Boteti', 'Y');
INSERT INTO `state` VALUES(412, 28, 'Lobatse', 'Lobatse', 'Y');
INSERT INTO `state` VALUES(413, 28, 'Orapa', 'Orapa', 'Y');
INSERT INTO `state` VALUES(414, 28, 'Selibe Phikwe', 'Selibe Phikwe', 'Y');
INSERT INTO `state` VALUES(415, 28, 'Sowa', 'Sowa', 'Y');
INSERT INTO `state` VALUES(416, 29, 'Goias', '"Goi&#225;s"', 'Y');
INSERT INTO `state` VALUES(417, 29, 'Minas Gerais', 'Minas Gerais', 'Y');
INSERT INTO `state` VALUES(418, 29, 'Para', '"Par&#225;"', 'Y');
INSERT INTO `state` VALUES(419, 29, 'Pernambuco', 'Pernambuco', 'Y');
INSERT INTO `state` VALUES(420, 29, 'Maranhao', '"Maranh&#227;o"', 'Y');
INSERT INTO `state` VALUES(421, 29, 'Bahia', 'Bahia', 'Y');
INSERT INTO `state` VALUES(422, 29, 'Ceara', '"Cear&#225;"', 'Y');
INSERT INTO `state` VALUES(423, 29, 'Rio Grande do Norte', 'Rio Grande do Norte', 'Y');
INSERT INTO `state` VALUES(424, 29, 'Acre', 'Acre', 'Y');
INSERT INTO `state` VALUES(425, 29, 'Sao Paulo', '"S&#227;o Paulo"', 'Y');
INSERT INTO `state` VALUES(426, 29, 'Espirito Santo', '"Esp&#237;rito Santo"', 'Y');
INSERT INTO `state` VALUES(427, 29, 'Mato Grosso', 'Mato Grosso', 'Y');
INSERT INTO `state` VALUES(428, 29, 'Alagoas', 'Alagoas', 'Y');
INSERT INTO `state` VALUES(429, 29, 'Piaui­', '"Piau&#237;"', 'Y');
INSERT INTO `state` VALUES(430, 29, 'paraiba', '"Para&#237;ba"', 'Y');
INSERT INTO `state` VALUES(431, 29, 'Rio Grande do Sul', 'Rio Grande do Sul', 'Y');
INSERT INTO `state` VALUES(432, 29, 'Parana', '"Paran&#225;"', 'Y');
INSERT INTO `state` VALUES(433, 29, 'RondÃ´nia', '"Rond&#244;nia"', 'Y');
INSERT INTO `state` VALUES(434, 29, 'Roraima', 'Roraima', 'Y');
INSERT INTO `state` VALUES(435, 29, 'n.a.', 'n.a.', 'Y');
INSERT INTO `state` VALUES(436, 29, 'Amazonas', 'Amazonas', 'Y');
INSERT INTO `state` VALUES(437, 29, 'Tocantins', 'Tocantins', 'Y');
INSERT INTO `state` VALUES(438, 29, 'Mato Grosso do Sul', 'Mato Grosso do Sul', 'Y');
INSERT INTO `state` VALUES(439, 29, 'Amapa', '"Amap&#225;"', 'Y');
INSERT INTO `state` VALUES(440, 29, 'Rio de Janeiro', 'Rio de Janeiro', 'Y');
INSERT INTO `state` VALUES(441, 29, 'Sergipe', 'Sergipe', 'Y');
INSERT INTO `state` VALUES(442, 29, 'Santa Catarina', 'Santa Catarina', 'Y');
INSERT INTO `state` VALUES(443, 29, 'Distrito Federal', 'Distrito Federal', 'Y');
INSERT INTO `state` VALUES(444, 30, 'Brunei-Muara', 'Brunei-Muara', 'Y');
INSERT INTO `state` VALUES(445, 30, 'Temburong', 'Temburong', 'Y');
INSERT INTO `state` VALUES(446, 30, 'Belait', 'Belait', 'Y');
INSERT INTO `state` VALUES(447, 30, 'Tutong', 'Tutong', 'Y');
INSERT INTO `state` VALUES(448, 31, 'Burgas', 'Burgas', 'Y');
INSERT INTO `state` VALUES(449, 31, 'Silistra', 'Silistra', 'Y');
INSERT INTO `state` VALUES(450, 31, 'Targovishte', '"T&#259;rgovi&#353;te"', 'Y');
INSERT INTO `state` VALUES(451, 31, 'Lovech', '"Love&#269;"', 'Y');
INSERT INTO `state` VALUES(452, 31, 'Kardzhali', '"K&#259;rd&#382;ali"', 'Y');
INSERT INTO `state` VALUES(453, 31, 'Plovdiv', 'Plovdiv', 'Y');
INSERT INTO `state` VALUES(454, 31, 'Dobrich', '"Dobri&#269;"', 'Y');
INSERT INTO `state` VALUES(455, 31, 'Pernik', 'Pernik', 'Y');
INSERT INTO `state` VALUES(456, 31, 'Blagoevgrad', 'Blagoevgrad', 'Y');
INSERT INTO `state` VALUES(457, 31, 'Pazardzhik', '"Pazard&#382;ik"', 'Y');
INSERT INTO `state` VALUES(458, 31, 'Pleven', 'Pleven', 'Y');
INSERT INTO `state` VALUES(459, 31, 'Vidin', 'Vidin', 'Y');
INSERT INTO `state` VALUES(460, 31, 'Varna', 'Varna', 'Y');
INSERT INTO `state` VALUES(461, 31, 'Montana', 'Montana', 'Y');
INSERT INTO `state` VALUES(462, 31, 'Ruse', 'Ruse', 'Y');
INSERT INTO `state` VALUES(463, 31, 'Veliko Tarnovo', '"Veliko T&#259;rnovo"', 'Y');
INSERT INTO `state` VALUES(464, 31, 'Vraca', 'Vraca', 'Y');
INSERT INTO `state` VALUES(465, 31, 'Kjustendil', 'Kjustendil', 'Y');
INSERT INTO `state` VALUES(466, 31, 'Jambol', 'Jambol', 'Y');
INSERT INTO `state` VALUES(467, 31, 'Sofijska oblast', 'Sofijska oblast', 'Y');
INSERT INTO `state` VALUES(468, 31, 'Smoljan', 'Smoljan', 'Y');
INSERT INTO `state` VALUES(469, 31, 'Stara Zagora', 'Stara Zagora', 'Y');
INSERT INTO `state` VALUES(470, 31, 'Haskovo', 'Haskovo', 'Y');
INSERT INTO `state` VALUES(471, 31, 'Gabrovo', 'Gabrovo', 'Y');
INSERT INTO `state` VALUES(472, 31, 'Razgrad', 'Razgrad', 'Y');
INSERT INTO `state` VALUES(473, 31, 'Shumen', '"&#352;umen"', 'Y');
INSERT INTO `state` VALUES(474, 31, 'Sliven', 'Sliven', 'Y');
INSERT INTO `state` VALUES(475, 31, 'Sofija grad', 'Sofija grad', 'Y');
INSERT INTO `state` VALUES(476, 32, 'Soum', 'Soum', 'Y');
INSERT INTO `state` VALUES(477, 32, 'Comoe', '"Como&#233;"', 'Y');
INSERT INTO `state` VALUES(478, 32, 'Noumbiel', 'Noumbiel', 'Y');
INSERT INTO `state` VALUES(479, 32, 'Houet', 'Houet', 'Y');
INSERT INTO `state` VALUES(480, 32, 'Gnagna', 'Gnagna', 'Y');
INSERT INTO `state` VALUES(481, 32, 'Bale', '"Bal&#233;"', 'Y');
INSERT INTO `state` VALUES(482, 32, 'Namentenga', 'Namentenga', 'Y');
INSERT INTO `state` VALUES(483, 32, 'Kourweogo', '"Kourw&#233;ogo"', 'Y');
INSERT INTO `state` VALUES(484, 32, 'Ioba', 'Ioba', 'Y');
INSERT INTO `state` VALUES(485, 32, 'Mouhoun', 'Mouhoun', 'Y');
INSERT INTO `state` VALUES(486, 32, 'Tapoa', 'Tapoa', 'Y');
INSERT INTO `state` VALUES(487, 32, 'Bougouriba', 'Bougouriba', 'Y');
INSERT INTO `state` VALUES(488, 32, 'Seno', '"S&#233;no"', 'Y');
INSERT INTO `state` VALUES(489, 32, 'Gourma', 'Gourma', 'Y');
INSERT INTO `state` VALUES(490, 32, 'Sissili', 'Sissili', 'Y');
INSERT INTO `state` VALUES(491, 32, 'Poni', 'Poni', 'Y');
INSERT INTO `state` VALUES(492, 32, 'Boulgou', 'Boulgou', 'Y');
INSERT INTO `state` VALUES(493, 32, 'Komandjari', 'Komandjari', 'Y');
INSERT INTO `state` VALUES(494, 32, 'Oudalan', 'Oudalan', 'Y');
INSERT INTO `state` VALUES(495, 32, 'Zondoma', 'Zondoma', 'Y');
INSERT INTO `state` VALUES(496, 32, 'Tuy', 'Tuy', 'Y');
INSERT INTO `state` VALUES(497, 32, 'Sanmatenga', 'Sanmatenga', 'Y');
INSERT INTO `state` VALUES(498, 32, 'Kenedougou', '"K&#233;n&#233;dougou"', 'Y');
INSERT INTO `state` VALUES(499, 32, 'Bazega', '"Baz&#233;ga"', 'Y');
INSERT INTO `state` VALUES(500, 32, 'Bam', 'Bam', 'Y');
INSERT INTO `state` VALUES(501, 32, 'Boulkiemde', '"Boulkiemd&#233;"', 'Y');
INSERT INTO `state` VALUES(502, 32, 'Kouritenga', 'Kouritenga', 'Y');
INSERT INTO `state` VALUES(503, 32, 'Sourou', 'Sourou', 'Y');
INSERT INTO `state` VALUES(504, 32, 'Zoundweogo', '"Zoundw&#233;ogo"', 'Y');
INSERT INTO `state` VALUES(505, 32, 'n.a.', 'n.a.', 'Y');
INSERT INTO `state` VALUES(506, 32, 'Kossi', 'Kossi', 'Y');
INSERT INTO `state` VALUES(507, 32, 'Kadiogo', 'Kadiogo', 'Y');
INSERT INTO `state` VALUES(508, 32, 'Yatenga', 'Yatenga', 'Y');
INSERT INTO `state` VALUES(509, 32, 'Kompienga', 'Kompienga', 'Y');
INSERT INTO `state` VALUES(510, 32, 'Nahouri', 'Nahouri', 'Y');
INSERT INTO `state` VALUES(511, 32, 'Sanguie', '"Sangui&#233;"', 'Y');
INSERT INTO `state` VALUES(512, 32, 'Leraba', '"L&#233;raba"', 'Y');
INSERT INTO `state` VALUES(513, 32, 'Passore', '"Passor&#233;"', 'Y');
INSERT INTO `state` VALUES(514, 32, 'Oubritenga', 'Oubritenga', 'Y');
INSERT INTO `state` VALUES(515, 32, 'Ganzourgou', 'Ganzourgou', 'Y');
INSERT INTO `state` VALUES(516, 33, 'Bubanza', 'Bubanza', 'Y');
INSERT INTO `state` VALUES(517, 33, 'Bujumbura', 'Bujumbura', 'Y');
INSERT INTO `state` VALUES(518, 33, 'Bururi', 'Bururi', 'Y');
INSERT INTO `state` VALUES(519, 33, 'Cankuzo', 'Cankuzo', 'Y');
INSERT INTO `state` VALUES(520, 33, 'Cibitoke', 'Cibitoke', 'Y');
INSERT INTO `state` VALUES(521, 33, 'Gitega', 'Gitega', 'Y');
INSERT INTO `state` VALUES(522, 33, 'Karuzi', 'Karuzi', 'Y');
INSERT INTO `state` VALUES(523, 33, 'Kayanza', 'Kayanza', 'Y');
INSERT INTO `state` VALUES(524, 33, 'Kirundo', 'Kirundo', 'Y');
INSERT INTO `state` VALUES(525, 33, 'Makamba', 'Makamba', 'Y');
INSERT INTO `state` VALUES(526, 33, 'Muramvya', 'Muramvya', 'Y');
INSERT INTO `state` VALUES(527, 33, 'Muyinga', 'Muyinga', 'Y');
INSERT INTO `state` VALUES(528, 33, 'Ngozi', 'Ngozi', 'Y');
INSERT INTO `state` VALUES(529, 33, 'Rutana', 'Rutana', 'Y');
INSERT INTO `state` VALUES(530, 33, 'Ruyigi', 'Ruyigi', 'Y');
INSERT INTO `state` VALUES(531, 34, 'Rotanak Kiri', '"R&#244;tanak Kiri"', 'Y');
INSERT INTO `state` VALUES(532, 34, 'Bat Dambang', '"Bat D&#226;mb&#226;ng"', 'Y');
INSERT INTO `state` VALUES(533, 34, 'Kaoh Kong', '"Ka&#244;h K&#244;ng"', 'Y');
INSERT INTO `state` VALUES(534, 34, 'Kampong Cham', '"K&#226;mp&#243;ng Cham"', 'Y');
INSERT INTO `state` VALUES(535, 34, 'Kampong Chhnang', '"K&#226;mp&#243;ng Chhnang"', 'Y');
INSERT INTO `state` VALUES(536, 34, 'Kampong Spoeu', '"K&#226;mp&#243;ng Spoeu"', 'Y');
INSERT INTO `state` VALUES(537, 34, 'Kampong Thum', '"K&#226;mp&#243;ng Thum"', 'Y');
INSERT INTO `state` VALUES(538, 34, 'Kampot', '"K&#226;mp&#244;t"', 'Y');
INSERT INTO `state` VALUES(539, 34, 'Kracheh', '"Kr&#226;ch&#233;h"', 'Y');
INSERT INTO `state` VALUES(540, 34, 'Krong Kaeb', 'Krong Kaeb', 'Y');
INSERT INTO `state` VALUES(541, 34, 'Krong Pailin', 'Krong Pailin', 'Y');
INSERT INTO `state` VALUES(542, 34, 'Phnom Penh', '"Phnum P&#233;nh"', 'Y');
INSERT INTO `state` VALUES(543, 34, 'Otdar Mean Chey', 'Otdar Mean Chey', 'Y');
INSERT INTO `state` VALUES(544, 34, 'Takaev', 'Takaev', 'Y');
INSERT INTO `state` VALUES(545, 34, 'Pousat', 'Pousat', 'Y');
INSERT INTO `state` VALUES(546, 34, 'Krong Preah Sihanouk', 'Krong Preah Sihanouk', 'Y');
INSERT INTO `state` VALUES(547, 34, 'Prey Veaeng', 'Prey Veaeng', 'Y');
INSERT INTO `state` VALUES(548, 34, 'Mondol Kiri', '"M&#244;nd&#244;l Kiri"', 'Y');
INSERT INTO `state` VALUES(549, 34, 'Siem Reab', 'Siem Reab', 'Y');
INSERT INTO `state` VALUES(550, 34, 'Banteay Mean Chey', 'Banteay Mean Chey', 'Y');
INSERT INTO `state` VALUES(551, 34, 'Stueng Traeng', 'Stueng Traeng', 'Y');
INSERT INTO `state` VALUES(552, 34, 'Svay Rieng', '"Svay Ri&#283;ng"', 'Y');
INSERT INTO `state` VALUES(553, 34, 'Kandal', '"K&#226;ndal"', 'Y');
INSERT INTO `state` VALUES(554, 34, 'Preah Vihear', '"Preah Vih&#233;ar"', 'Y');
INSERT INTO `state` VALUES(555, 35, 'Est', 'Est', 'Y');
INSERT INTO `state` VALUES(556, 35, 'Sud', 'Sud', 'Y');
INSERT INTO `state` VALUES(557, 35, 'Centre', 'Centre', 'Y');
INSERT INTO `state` VALUES(558, 35, 'Ouest', 'Ouest', 'Y');
INSERT INTO `state` VALUES(559, 35, 'Nordouest', 'Nordouest', 'Y');
INSERT INTO `state` VALUES(560, 35, 'Adamaoua', 'Adamaoua', 'Y');
INSERT INTO `state` VALUES(561, 35, 'Nord ExtrÃ¨me', '"Nord Extr&#232;me"', 'Y');
INSERT INTO `state` VALUES(562, 35, 'Littoral', 'Littoral', 'Y');
INSERT INTO `state` VALUES(563, 35, 'Sudouest', 'Sudouest', 'Y');
INSERT INTO `state` VALUES(564, 35, 'Nord', 'Nord', 'Y');
INSERT INTO `state` VALUES(565, 36, 'British Columbia', 'British Columbia', 'Y');
INSERT INTO `state` VALUES(566, 36, 'Ontario', 'Ontario', 'Y');
INSERT INTO `state` VALUES(567, 36, 'Quebec', '"Qu&#233;bec"', 'Y');
INSERT INTO `state` VALUES(568, 36, 'Alberta', 'Alberta', 'Y');
INSERT INTO `state` VALUES(569, 36, 'Northwest Territories', 'Northwest Territories', 'Y');
INSERT INTO `state` VALUES(570, 36, 'Prince Edward Island', 'Prince Edward Island', 'Y');
INSERT INTO `state` VALUES(571, 36, 'Manitoba', 'Manitoba', 'Y');
INSERT INTO `state` VALUES(572, 36, 'Nova Scotia', 'Nova Scotia', 'Y');
INSERT INTO `state` VALUES(573, 36, 'Newfoundland and Labrador', 'Newfoundland and Labrador', 'Y');
INSERT INTO `state` VALUES(574, 36, 'Saskatchewan', 'Saskatchewan', 'Y');
INSERT INTO `state` VALUES(575, 36, 'New Brunswick', 'New Brunswick', 'Y');
INSERT INTO `state` VALUES(576, 36, 'Nunavut', 'Nunavut', 'Y');
INSERT INTO `state` VALUES(577, 36, 'Yukon', 'Yukon', 'Y');
INSERT INTO `state` VALUES(578, 37, 'Sao Tiago', '"S&#227;o Tiago"', 'Y');
INSERT INTO `state` VALUES(579, 37, 'Sao Vicente', '"S&#227;o Vicente"', 'Y');
INSERT INTO `state` VALUES(580, 37, 'Fogo', 'Fogo', 'Y');
INSERT INTO `state` VALUES(581, 37, 'Brava', 'Brava', 'Y');
INSERT INTO `state` VALUES(582, 37, 'Santo Antao', '"Santo Ant&#227;o"', 'Y');
INSERT INTO `state` VALUES(583, 37, 'Sao Nicolau', '"S&#227;o Nicolau"', 'Y');
INSERT INTO `state` VALUES(584, 37, 'Boavista', 'Boavista', 'Y');
INSERT INTO `state` VALUES(585, 37, 'Sal', 'Sal', 'Y');
INSERT INTO `state` VALUES(586, 37, 'Maio', 'Maio', 'Y');
INSERT INTO `state` VALUES(587, 38, 'Grand Cayman', 'Grand Cayman', 'Y');
INSERT INTO `state` VALUES(588, 39, 'Basse-Kotto', 'Basse-Kotto', 'Y');
INSERT INTO `state` VALUES(589, 39, 'Nana-Mambere', '"Nana-Mamb&#233;r&#233;"', 'Y');
INSERT INTO `state` VALUES(590, 39, 'Ouaka', 'Ouaka', 'Y');
INSERT INTO `state` VALUES(591, 39, 'Mbomou', 'Mbomou', 'Y');
INSERT INTO `state` VALUES(592, 39, 'Bangui', 'Bangui', 'Y');
INSERT INTO `state` VALUES(593, 39, 'Ouham', 'Ouham', 'Y');
INSERT INTO `state` VALUES(594, 39, 'Mambere-Kadei', '"Mamb&#233;r&#233;-Kad&#233;&#239;"', 'Y');
INSERT INTO `state` VALUES(595, 39, 'Ombella Mpoko', 'Ombella Mpoko', 'Y');
INSERT INTO `state` VALUES(596, 39, 'Vakaga', 'Vakaga', 'Y');
INSERT INTO `state` VALUES(597, 39, 'Ouham-Pende', '"Ouham-Pend&#233;"', 'Y');
INSERT INTO `state` VALUES(598, 39, 'Lobaye', 'Lobaye', 'Y');
INSERT INTO `state` VALUES(599, 39, 'Haute-Kotto', 'Haute-Kotto', 'Y');
INSERT INTO `state` VALUES(600, 39, 'KÃ©mo', '"K&#233;mo"', 'Y');
INSERT INTO `state` VALUES(601, 39, 'Nana-Gribizi', 'Nana-Gribizi', 'Y');
INSERT INTO `state` VALUES(602, 39, 'Bamingui-Bangoran', 'Bamingui-Bangoran', 'Y');
INSERT INTO `state` VALUES(603, 39, 'Sangha-Mbaere', '"Sangha-Mba&#233;r&#233;"', 'Y');
INSERT INTO `state` VALUES(604, 39, 'Haut-Mbomou', 'Haut-Mbomou', 'Y');
INSERT INTO `state` VALUES(605, 40, 'Aisen', '"Ais&#233;n"', 'Y');
INSERT INTO `state` VALUES(606, 40, 'Valparaiso', '"Valpara&#237;so"', 'Y');
INSERT INTO `state` VALUES(607, 40, 'Metropolitana', 'Metropolitana', 'Y');
INSERT INTO `state` VALUES(608, 40, 'Atacama', 'Atacama', 'Y');
INSERT INTO `state` VALUES(609, 40, 'Los Lagos', 'Los Lagos', 'Y');
INSERT INTO `state` VALUES(610, 40, 'Coquimbo', 'Coquimbo', 'Y');
INSERT INTO `state` VALUES(611, 40, 'Araucania', '"Araucan&#237;a"', 'Y');
INSERT INTO `state` VALUES(612, 40, 'Antofagasta', 'Antofagasta', 'Y');
INSERT INTO `state` VALUES(613, 40, 'Bio Bio', '"B&#237;o B&#237;o"', 'Y');
INSERT INTO `state` VALUES(614, 40, 'Tarapaca', '"Tarapac&#225;"', 'Y');
INSERT INTO `state` VALUES(615, 40, 'Magellanes', 'Magellanes', 'Y');
INSERT INTO `state` VALUES(616, 40, 'Maule', 'Maule', 'Y');
INSERT INTO `state` VALUES(617, 40, 'n.a.', 'n.a.', 'Y');
INSERT INTO `state` VALUES(618, 41, 'Heilongjiang', 'Heilongjiang', 'Y');
INSERT INTO `state` VALUES(619, 41, 'Xinjiang', 'Xinjiang', 'Y');
INSERT INTO `state` VALUES(620, 41, 'Nei Monggol', 'Nei Monggol', 'Y');
INSERT INTO `state` VALUES(621, 41, 'Guangdong', 'Guangdong', 'Y');
INSERT INTO `state` VALUES(622, 41, 'Hunan', 'Hunan', 'Y');
INSERT INTO `state` VALUES(623, 41, 'Sichuan', 'Sichuan', 'Y');
INSERT INTO `state` VALUES(624, 41, 'Shaanxi', 'Shaanxi', 'Y');
INSERT INTO `state` VALUES(625, 41, 'Hubei', 'Hubei', 'Y');
INSERT INTO `state` VALUES(626, 41, 'Anhui', 'Anhui', 'Y');
INSERT INTO `state` VALUES(627, 41, 'Shandong', 'Shandong', 'Y');
INSERT INTO `state` VALUES(628, 41, 'Liaoning', 'Liaoning', 'Y');
INSERT INTO `state` VALUES(629, 41, 'Guizhou', 'Guizhou', 'Y');
INSERT INTO `state` VALUES(630, 41, 'Henan', 'Henan', 'Y');
INSERT INTO `state` VALUES(631, 41, 'Zhejiang', 'Zhejiang', 'Y');
INSERT INTO `state` VALUES(632, 41, 'Aomen', 'Aomen', 'Y');
INSERT INTO `state` VALUES(633, 41, 'Guangxi', 'Guangxi', 'Y');
INSERT INTO `state` VALUES(634, 41, 'Jilin', 'Jilin', 'Y');
INSERT INTO `state` VALUES(635, 41, 'Gansu', 'Gansu', 'Y');
INSERT INTO `state` VALUES(636, 41, 'Fujian', 'Fujian', 'Y');
INSERT INTO `state` VALUES(637, 41, 'Hebei', 'Hebei', 'Y');
INSERT INTO `state` VALUES(638, 41, 'Jiangsu', 'Jiangsu', 'Y');
INSERT INTO `state` VALUES(639, 41, 'Chongqing', 'Chongqing', 'Y');
INSERT INTO `state` VALUES(640, 41, 'Beijing', 'Beijing', 'Y');
INSERT INTO `state` VALUES(641, 41, 'Shanxi', 'Shanxi', 'Y');
INSERT INTO `state` VALUES(642, 41, 'Hainan', 'Hainan', 'Y');
INSERT INTO `state` VALUES(643, 41, 'Yunnan', 'Yunnan', 'Y');
INSERT INTO `state` VALUES(644, 41, 'Ningxia Hui', 'Ningxia Hui', 'Y');
INSERT INTO `state` VALUES(645, 41, 'Jiangxi', 'Jiangxi', 'Y');
INSERT INTO `state` VALUES(646, 41, 'Tianjin', 'Tianjin', 'Y');
INSERT INTO `state` VALUES(647, 41, 'Xianggang', 'Xianggang', 'Y');
INSERT INTO `state` VALUES(648, 41, 'Shanghai', 'Shanghai', 'Y');
INSERT INTO `state` VALUES(649, 41, 'Xizang', 'Xizang', 'Y');
INSERT INTO `state` VALUES(650, 41, 'Qinghai', 'Qinghai', 'Y');
INSERT INTO `state` VALUES(651, 42, 'Antioquia', 'Antioquia', 'Y');
INSERT INTO `state` VALUES(652, 42, 'Norte de Santander', 'Norte de Santander', 'Y');
INSERT INTO `state` VALUES(653, 42, 'Meta', 'Meta', 'Y');
INSERT INTO `state` VALUES(654, 42, 'Choco', '"Choc&#243;"', 'Y');
INSERT INTO `state` VALUES(655, 42, 'Vaupes', '"Vaup&#233;s"', 'Y');
INSERT INTO `state` VALUES(656, 42, 'Huila', 'Huila', 'Y');
INSERT INTO `state` VALUES(657, 42, 'Bolivar', '"Bol&#237;var"', 'Y');
INSERT INTO `state` VALUES(658, 42, 'Cesar', '"C&#233;sar"', 'Y');
INSERT INTO `state` VALUES(659, 42, 'Santander', 'Santander', 'Y');
INSERT INTO `state` VALUES(660, 42, 'Caldas', 'Caldas', 'Y');
INSERT INTO `state` VALUES(661, 42, 'Cundinamarca', 'Cundinamarca', 'Y');
INSERT INTO `state` VALUES(662, 42, 'Casanare', 'Casanare', 'Y');
INSERT INTO `state` VALUES(663, 42, 'Narino', '"Nari&#241;o"', 'Y');
INSERT INTO `state` VALUES(664, 42, 'Caqueta', '"Caquet&#225;"', 'Y');
INSERT INTO `state` VALUES(665, 42, 'La Guajira', 'La Guajira', 'Y');
INSERT INTO `state` VALUES(666, 42, 'Valle del Cauca', 'Valle del Cauca', 'Y');
INSERT INTO `state` VALUES(667, 42, 'Magdalena', 'Magdalena', 'Y');
INSERT INTO `state` VALUES(668, 42, 'Cauca', 'Cauca', 'Y');
INSERT INTO `state` VALUES(669, 42, 'Boyaca', '"Boyac&#225;"', 'Y');
INSERT INTO `state` VALUES(670, 42, 'Tolima', 'Tolima', 'Y');
INSERT INTO `state` VALUES(671, 42, 'Risaralda', 'Risaralda', 'Y');
INSERT INTO `state` VALUES(672, 42, 'Arauca', 'Arauca', 'Y');
INSERT INTO `state` VALUES(673, 42, 'Quindio', '"Quindi&#243;"', 'Y');
INSERT INTO `state` VALUES(674, 42, 'Cordoba', '"C&#243;rdoba"', 'Y');
INSERT INTO `state` VALUES(675, 42, 'Atlantico', '"Atl&#225;ntico"', 'Y');
INSERT INTO `state` VALUES(676, 42, 'Bogota', '"Bogot&#225;"', 'Y');
INSERT INTO `state` VALUES(677, 42, 'Sucre', 'Sucre', 'Y');
INSERT INTO `state` VALUES(678, 42, 'Guaviare', 'Guaviare', 'Y');
INSERT INTO `state` VALUES(679, 42, 'Putumayo', 'Putumayo', 'Y');
INSERT INTO `state` VALUES(680, 42, 'Vichada', 'Vichada', 'Y');
INSERT INTO `state` VALUES(681, 42, 'Guainia', '"Guain&#237;a"', 'Y');
INSERT INTO `state` VALUES(682, 42, 'Amazonas', 'Amazonas', 'Y');
INSERT INTO `state` VALUES(683, 42, 'San Andres y Providencia', '"San Andr&#233;s y Providencia"', 'Y');
INSERT INTO `state` VALUES(684, 43, 'Nzwani', 'Nzwani', 'Y');
INSERT INTO `state` VALUES(685, 43, 'Mwali', 'Mwali', 'Y');
INSERT INTO `state` VALUES(686, 43, 'Njazidja', '"Njaz&#237;dja"', 'Y');
INSERT INTO `state` VALUES(687, 44, 'Pool', 'Pool', 'Y');
INSERT INTO `state` VALUES(688, 44, 'Brazzaville', 'Brazzaville', 'Y');
INSERT INTO `state` VALUES(689, 44, 'Plateaux', 'Plateaux', 'Y');
INSERT INTO `state` VALUES(690, 44, 'Likouala', 'Likouala', 'Y');
INSERT INTO `state` VALUES(691, 44, 'Cuvette', 'Cuvette', 'Y');
INSERT INTO `state` VALUES(692, 44, 'Sangha', 'Sangha', 'Y');
INSERT INTO `state` VALUES(693, 44, 'Niari', 'Niari', 'Y');
INSERT INTO `state` VALUES(694, 44, 'n.a.', 'n.a.', 'Y');
INSERT INTO `state` VALUES(695, 44, 'Kouilou', 'Kouilou', 'Y');
INSERT INTO `state` VALUES(696, 44, 'Bouenza', 'Bouenza', 'Y');
INSERT INTO `state` VALUES(697, 44, 'LÃ©koumou', '"L&#233;koumou"', 'Y');
INSERT INTO `state` VALUES(698, 45, 'Haut-Congo', 'Haut-Congo', 'Y');
INSERT INTO `state` VALUES(699, 45, 'Equateur', 'Bandundu', 'Y');
INSERT INTO `state` VALUES(700, 45, 'Equateur', '"&#201;quateur"', 'Y');
INSERT INTO `state` VALUES(701, 45, 'Nord-Kivu', 'Nord-Kivu', 'Y');
INSERT INTO `state` VALUES(702, 45, 'Bas-Congo', 'Bas-Congo', 'Y');
INSERT INTO `state` VALUES(703, 45, 'Katanga', 'Katanga', 'Y');
INSERT INTO `state` VALUES(704, 45, 'Sud-Kivu', 'Sud-Kivu', 'Y');
INSERT INTO `state` VALUES(705, 45, 'Kasai-Occidental', 'Kasai-Occidental', 'Y');
INSERT INTO `state` VALUES(706, 45, 'Kasai-Oriental', 'Kasai-Oriental', 'Y');
INSERT INTO `state` VALUES(707, 45, 'Maniema', 'Maniema', 'Y');
INSERT INTO `state` VALUES(708, 45, 'Kinshasa', 'Kinshasa', 'Y');
INSERT INTO `state` VALUES(709, 46, 'Aitutaki', 'Aitutaki', 'Y');
INSERT INTO `state` VALUES(710, 46, 'Atiu', 'Atiu', 'Y');
INSERT INTO `state` VALUES(711, 46, 'Rarotonga', 'Rarotonga', 'Y');
INSERT INTO `state` VALUES(712, 46, 'Mangaia', 'Mangaia', 'Y');
INSERT INTO `state` VALUES(713, 46, 'Mauke', 'Mauke', 'Y');
INSERT INTO `state` VALUES(714, 46, 'Mitiaro', 'Mitiaro', 'Y');
INSERT INTO `state` VALUES(715, 46, 'Nassau', 'Nassau', 'Y');
INSERT INTO `state` VALUES(716, 46, 'Tongareva', 'Tongareva', 'Y');
INSERT INTO `state` VALUES(717, 46, 'Rakahanga', 'Rakahanga', 'Y');
INSERT INTO `state` VALUES(718, 46, 'Pukapuka', 'Pukapuka', 'Y');
INSERT INTO `state` VALUES(719, 46, 'Manihiki', 'Manihiki', 'Y');
INSERT INTO `state` VALUES(720, 47, 'Cartago', 'Cartago', 'Y');
INSERT INTO `state` VALUES(721, 47, 'Alajuela', 'Alajuela', 'Y');
INSERT INTO `state` VALUES(722, 47, 'San Jose', '"San Jos&#233;"', 'Y');
INSERT INTO `state` VALUES(723, 47, 'Heredia', 'Heredia', 'Y');
INSERT INTO `state` VALUES(724, 47, 'Guanacaste', 'Guanacaste', 'Y');
INSERT INTO `state` VALUES(725, 47, 'Limon', '"Lim&#243;n"', 'Y');
INSERT INTO `state` VALUES(726, 47, 'Puntarenas', 'Puntarenas', 'Y');
INSERT INTO `state` VALUES(727, 48, 'Grad Zagreb', 'Grad Zagreb', 'Y');
INSERT INTO `state` VALUES(728, 48, 'Krapina-Zagorje', 'Krapina-Zagorje', 'Y');
INSERT INTO `state` VALUES(729, 48, 'Vukovar-Srijem', 'Vukovar-Srijem', 'Y');
INSERT INTO `state` VALUES(730, 48, 'Osijek-Baranja', 'Osijek-Baranja', 'Y');
INSERT INTO `state` VALUES(731, 48, 'Pozhega-Slavonija', '"Po&#382;ega-Slavonija"', 'Y');
INSERT INTO `state` VALUES(732, 48, 'Primorje-Gorski Kotar', 'Primorje-Gorski Kotar', 'Y');
INSERT INTO `state` VALUES(733, 48, 'Istra', 'Istra', 'Y');
INSERT INTO `state` VALUES(734, 48, 'Slavonski Brod-Posavina', 'Slavonski Brod-Posavina', 'Y');
INSERT INTO `state` VALUES(735, 48, 'Split-Dalmacija', 'Split-Dalmacija', 'Y');
INSERT INTO `state` VALUES(736, 48, 'Varazhdin', '"Vara&#382;din"', 'Y');
INSERT INTO `state` VALUES(737, 48, 'Medhimurje', 'Me<u>d</u>imurje', 'Y');
INSERT INTO `state` VALUES(738, 48, 'Zadar', 'Zadar', 'Y');
INSERT INTO `state` VALUES(739, 48, 'Zagreb', 'Zagreb', 'Y');
INSERT INTO `state` VALUES(740, 48, 'Shibenik-Knin', '"&#352;ibenik-Knin"', 'Y');
INSERT INTO `state` VALUES(741, 48, 'Bjelovar-Bilogora', 'Bjelovar-Bilogora', 'Y');
INSERT INTO `state` VALUES(742, 48, 'Dubrovnik-Neretva', 'Dubrovnik-Neretva', 'Y');
INSERT INTO `state` VALUES(743, 48, 'Virovitica-Podravina', 'Virovitica-Podravina', 'Y');
INSERT INTO `state` VALUES(744, 48, 'Sisak-Moslavina', 'Sisak-Moslavina', 'Y');
INSERT INTO `state` VALUES(745, 48, 'Lika-Senj', 'Lika-Senj', 'Y');
INSERT INTO `state` VALUES(746, 48, 'Karlovac', 'Karlovac', 'Y');
INSERT INTO `state` VALUES(747, 48, 'Koprivnica-Krizhevci', '"Koprivnica-Kri&#382;evci"', 'Y');
INSERT INTO `state` VALUES(748, 49, 'Matanzas', 'Matanzas', 'Y');
INSERT INTO `state` VALUES(749, 49, 'La Habana', 'La Habana', 'Y');
INSERT INTO `state` VALUES(750, 49, 'Las Tunas', 'Las Tunas', 'Y');
INSERT INTO `state` VALUES(751, 49, 'Holguin', '"Holgu&#237;n"', 'Y');
INSERT INTO `state` VALUES(752, 49, 'Pinar del Rio', '"Pinar del R&#237;o"', 'Y');
INSERT INTO `state` VALUES(753, 49, 'Guantanamo', '"Guant&#225;namo"', 'Y');
INSERT INTO `state` VALUES(754, 49, 'Ciego de Avila', '"Ciego de &#193;vila"', 'Y');
INSERT INTO `state` VALUES(755, 49, 'Granma', 'Granma', 'Y');
INSERT INTO `state` VALUES(756, 49, 'n.a.', 'n.a.', 'Y');
INSERT INTO `state` VALUES(757, 49, 'Sancti Spiritus', '"Sancti Sp&#237;ritus"', 'Y');
INSERT INTO `state` VALUES(758, 49, 'Villa Clara', 'Villa Clara', 'Y');
INSERT INTO `state` VALUES(759, 49, 'Camaguey', '"Camag&#252;ey"', 'Y');
INSERT INTO `state` VALUES(760, 49, 'Cienfuegos', 'Cienfuegos', 'Y');
INSERT INTO `state` VALUES(761, 49, 'Santiago de Cuba', 'Santiago de Cuba', 'Y');
INSERT INTO `state` VALUES(762, 49, 'Ciudad de la Habana', 'Ciudad de la Habana', 'Y');
INSERT INTO `state` VALUES(763, 49, 'Isla de la Juventud', 'Isla de la Juventud', 'Y');
INSERT INTO `state` VALUES(764, 50, 'Government controlled area', 'Government controlled area', 'Y');
INSERT INTO `state` VALUES(765, 50, 'Turkish controlled area', 'Turkish controlled area', 'Y');
INSERT INTO `state` VALUES(766, 51, 'Jihomoravsky', '"Jihomoravsk&#253;"', 'Y');
INSERT INTO `state` VALUES(767, 51, 'Karlovarsky', '"Karlovarsk&#253;"', 'Y');
INSERT INTO `state` VALUES(768, 51, 'Jihochesky', '"Jiho&#269;esk&#253;"', 'Y');
INSERT INTO `state` VALUES(769, 51, 'Stredochesky', '"Stredo&#269;esk&#253;"', 'Y');
INSERT INTO `state` VALUES(770, 51, 'Ustecky', '"Usteck&#253;"', 'Y');
INSERT INTO `state` VALUES(771, 51, 'Moravskoslezsky', '"Moravskoslezsk&#253;"', 'Y');
INSERT INTO `state` VALUES(772, 51, 'Kralovehradecky', '"Kralov&#233;hradeck&#253;"', 'Y');
INSERT INTO `state` VALUES(773, 51, 'Zlinsky', '"Zl&#237;nsk&#253;"', 'Y');
INSERT INTO `state` VALUES(774, 51, 'Vysochina', '"Vyso&#269;ina"', 'Y');
INSERT INTO `state` VALUES(775, 51, 'Liberecky', '"Libereck&#253;"', 'Y');
INSERT INTO `state` VALUES(776, 51, 'Pardubicky', '"Pardubick&#253;"', 'Y');
INSERT INTO `state` VALUES(777, 51, 'Plzensky', '"Plze&#328;sk&#253;"', 'Y');
INSERT INTO `state` VALUES(778, 51, 'Olomoucky', '"Olomouck&#253;"', 'Y');
INSERT INTO `state` VALUES(779, 51, 'Praha', 'Praha', 'Y');
INSERT INTO `state` VALUES(780, 52, 'Sonderjylland', '"S&#248;nderjylland"', 'Y');
INSERT INTO `state` VALUES(781, 52, 'Nordjylland', 'Nordjylland', 'Y');
INSERT INTO `state` VALUES(782, 52, 'Bornholm', 'Bornholm', 'Y');
INSERT INTO `state` VALUES(783, 52, 'Viborg', 'Viborg', 'Y');
INSERT INTO `state` VALUES(784, 52, 'Fyn', 'Fyn', 'Y');
INSERT INTO `state` VALUES(785, 52, 'Arhus', '"&#197;rhus"', 'Y');
INSERT INTO `state` VALUES(786, 52, 'Vestsjaelland', '"Vestsj&#230;lland"', 'Y');
INSERT INTO `state` VALUES(787, 52, 'Ringkobing', '"Ringk&#248;bing"', 'Y');
INSERT INTO `state` VALUES(788, 52, 'Ribe', 'Ribe', 'Y');
INSERT INTO `state` VALUES(789, 52, 'Frederiksborg', 'Frederiksborg', 'Y');
INSERT INTO `state` VALUES(790, 52, 'Roskilde', 'Roskilde', 'Y');
INSERT INTO `state` VALUES(791, 52, 'Vejle', 'Vejle', 'Y');
INSERT INTO `state` VALUES(792, 52, 'n.a.', 'n.a.', 'Y');
INSERT INTO `state` VALUES(793, 52, 'Kobenhavn', '"K&#248;benhavn"', 'Y');
INSERT INTO `state` VALUES(794, 52, 'Storstrom', '"Storstr&#248;m"', 'Y');
INSERT INTO `state` VALUES(795, 52, 'Kobenhavns kommune', '"K&#248;benhavns Kommune"', 'Y');
INSERT INTO `state` VALUES(796, 53, 'Ali Sabih', '"<sup><small>c</small></sup>Ali Sab&#299;&#293;"', 'Y');
INSERT INTO `state` VALUES(797, 53, 'Dikhil', '"Di&#295;il"', 'Y');
INSERT INTO `state` VALUES(798, 53, 'Jibuti', '"Jib&#363;ti"', 'Y');
INSERT INTO `state` VALUES(799, 53, 'Tajurah', '"Taj&#363;rah"', 'Y');
INSERT INTO `state` VALUES(800, 53, 'Ubuk', 'Ubuk', 'Y');
INSERT INTO `state` VALUES(801, 54, 'Saint Andrew', 'Saint Andrew', 'Y');
INSERT INTO `state` VALUES(802, 54, 'Saint Joseph', 'Saint Joseph', 'Y');
INSERT INTO `state` VALUES(803, 54, 'Saint Patrick', 'Saint Patrick', 'Y');
INSERT INTO `state` VALUES(804, 54, 'Saint David', 'Saint David', 'Y');
INSERT INTO `state` VALUES(805, 54, 'Saint Peter', 'Saint Peter', 'Y');
INSERT INTO `state` VALUES(806, 54, 'Saint Paul', 'Saint Paul', 'Y');
INSERT INTO `state` VALUES(807, 54, 'Saint Luke', 'Saint Luke', 'Y');
INSERT INTO `state` VALUES(808, 54, 'Saint John', 'Saint John', 'Y');
INSERT INTO `state` VALUES(809, 54, 'Saint George', 'Saint George', 'Y');
INSERT INTO `state` VALUES(810, 54, 'Saint Mark', 'Saint Mark', 'Y');
INSERT INTO `state` VALUES(811, 55, 'Azua', 'Azua', 'Y');
INSERT INTO `state` VALUES(812, 55, 'San Cristobal', '"San Crist&#243;bal"', 'Y');
INSERT INTO `state` VALUES(813, 55, 'Peravia', 'Peravia', 'Y');
INSERT INTO `state` VALUES(814, 55, 'Barahona', 'Barahona', 'Y');
INSERT INTO `state` VALUES(815, 55, 'Monte Plata', 'Monte Plata', 'Y');
INSERT INTO `state` VALUES(816, 55, 'Monsenor Nouel', '"Monse&#241;or Nouel"', 'Y');
INSERT INTO `state` VALUES(817, 55, 'Elias Pina', '"El&#237;as Pi&#241;a"', 'Y');
INSERT INTO `state` VALUES(818, 55, 'La Vega', 'La Vega', 'Y');
INSERT INTO `state` VALUES(819, 55, 'San Pedro de Macoris', '"San Pedro de Macor&#237;s"', 'Y');
INSERT INTO `state` VALUES(820, 55, 'Sanchez Ramirez', '"S&#225;nchez Ram&#237;rez"', 'Y');
INSERT INTO `state` VALUES(821, 55, 'Dajabon', '"Dajab&#243;n"', 'Y');
INSERT INTO `state` VALUES(822, 55, 'Independencia', 'Independencia', 'Y');
INSERT INTO `state` VALUES(823, 55, 'El Seybo', 'El Seybo', 'Y');
INSERT INTO `state` VALUES(824, 55, 'Valverde', 'Valverde', 'Y');
INSERT INTO `state` VALUES(825, 55, 'Hato Mayor', 'Hato Mayor', 'Y');
INSERT INTO `state` VALUES(826, 55, 'La Altagracia', 'La Altagracia', 'Y');
INSERT INTO `state` VALUES(827, 55, 'La Romana', 'La Romana', 'Y');
INSERT INTO `state` VALUES(828, 55, 'Duarte', 'Duarte', 'Y');
INSERT INTO `state` VALUES(829, 55, 'San Juan', 'San Juan', 'Y');
INSERT INTO `state` VALUES(830, 55, 'Espaillat', 'Espaillat', 'Y');
INSERT INTO `state` VALUES(831, 55, 'Monte Cristi', 'Monte Cristi', 'Y');
INSERT INTO `state` VALUES(832, 55, 'Maria Trinidad Sanchez', '"Mar&#237;a Trinidad S&#225;nchez"', 'Y');
INSERT INTO `state` VALUES(833, 55, 'Bahoruco', 'Bahoruco', 'Y');
INSERT INTO `state` VALUES(834, 55, 'Pedernales', 'Pedernales', 'Y');
INSERT INTO `state` VALUES(835, 55, 'Puerto Plata', 'Puerto Plata', 'Y');
INSERT INTO `state` VALUES(836, 55, 'Santiago Rodriguez', '"Santiago Rodr&#237;guez"', 'Y');
INSERT INTO `state` VALUES(837, 55, 'Salcedo', 'Salcedo', 'Y');
INSERT INTO `state` VALUES(838, 55, 'Samana', '"Saman&#225;"', 'Y');
INSERT INTO `state` VALUES(839, 55, 'Santiago', 'Santiago', 'Y');
INSERT INTO `state` VALUES(840, 55, 'Distrito Nacional', 'Distrito Nacional', 'Y');
INSERT INTO `state` VALUES(841, 56, 'Loja', 'Loja', 'Y');
INSERT INTO `state` VALUES(842, 56, 'Chimborazo', 'Chimborazo', 'Y');
INSERT INTO `state` VALUES(843, 56, 'Guayas', 'Guayas', 'Y');
INSERT INTO `state` VALUES(844, 56, 'Tungurahua', 'Tungurahua', 'Y');
INSERT INTO `state` VALUES(845, 56, 'Napo', 'Napo', 'Y');
INSERT INTO `state` VALUES(846, 56, 'El Oro', 'El Oro', 'Y');
INSERT INTO `state` VALUES(847, 56, 'Imbabura', 'Imbabura', 'Y');
INSERT INTO `state` VALUES(848, 56, 'Canar', '"Ca&#241;ar"', 'Y');
INSERT INTO `state` VALUES(849, 56, 'Los Rios', '"Los R&#237;os"', 'Y');
INSERT INTO `state` VALUES(850, 56, 'Manabi', '"Manab&#237;"', 'Y');
INSERT INTO `state` VALUES(851, 56, 'Pichincha', 'Pichincha', 'Y');
INSERT INTO `state` VALUES(852, 56, 'Azuay', 'Azuay', 'Y');
INSERT INTO `state` VALUES(853, 56, 'Carchi', 'Carchi', 'Y');
INSERT INTO `state` VALUES(854, 56, 'Esmeraldas', 'Esmeraldas', 'Y');
INSERT INTO `state` VALUES(855, 56, 'Morona Santiago', 'Morona Santiago', 'Y');
INSERT INTO `state` VALUES(856, 56, 'Bolivar', '"Bol&#237;var"', 'Y');
INSERT INTO `state` VALUES(857, 56, 'Cotopaxi', 'Cotopaxi', 'Y');
INSERT INTO `state` VALUES(858, 56, 'Sucumbios', '"Sucumb&#237;os"', 'Y');
INSERT INTO `state` VALUES(859, 56, 'Orellana', 'Orellana', 'Y');
INSERT INTO `state` VALUES(860, 56, 'Galapagos', '"Gal&#225;pagos"', 'Y');
INSERT INTO `state` VALUES(861, 56, 'Pastaza', 'Pastaza', 'Y');
INSERT INTO `state` VALUES(862, 56, 'Zamora Chinchipe', 'Zamora Chinchipe', 'Y');
INSERT INTO `state` VALUES(863, 57, 'Asyut', '"Asy&#363;t"', 'Y');
INSERT INTO `state` VALUES(864, 57, 'al-Buhayrah', 'al-Buhayrah', 'Y');
INSERT INTO `state` VALUES(865, 57, 'ash-Sharqiyah', '"a&#353;-&#352;arq&#299;yah"', 'Y');
INSERT INTO `state` VALUES(866, 57, 'Al Minya', '"al-Miny&#257;"', 'Y');
INSERT INTO `state` VALUES(867, 57, 'Sinai al-Janubiyah', '"Sina al-Jan&#363;b&#299;yah"', 'Y');
INSERT INTO `state` VALUES(868, 57, 'Al Qalyubiyah', '"al-Qaly&#363;biyah"', 'Y');
INSERT INTO `state` VALUES(869, 57, 'Al Gharbiyah', '"al-&#288;arb&#299;yah"', 'Y');
INSERT INTO `state` VALUES(870, 57, 'Sawhaj', '"Sawh&#257;j"', 'Y');
INSERT INTO `state` VALUES(871, 57, 'Ad Daqahliyah', '"ad-Daqahl&#299;yah"', 'Y');
INSERT INTO `state` VALUES(872, 57, 'Sina ash-ShamÃ¢lÃ®yah', '"Sina a&#353;-&#352;am&#257;l&#299;yah"', 'Y');
INSERT INTO `state` VALUES(873, 57, 'Qina', '"Qin&#257;"', 'Y');
INSERT INTO `state` VALUES(874, 57, 'Al Minufiyah', '"al-Min&#363;f&#299;yah"', 'Y');
INSERT INTO `state` VALUES(875, 57, 'Aswan', '"Asw&#257;n"', 'Y');
INSERT INTO `state` VALUES(876, 57, 'Al Jizah', '"al-J&#299;zah"', 'Y');
INSERT INTO `state` VALUES(877, 57, 'Bani Suwayf', '"Ban&#299; Suwayf"', 'Y');
INSERT INTO `state` VALUES(878, 57, 'Kafr-ash-Shaykh', '"Kafr-a&#353;-&#352;ay&#295;"', 'Y');
INSERT INTO `state` VALUES(879, 57, 'Bur Sa\\''id', '"B&#363;r Sa<sup><small>c</small></sup>&#299;d"', 'Y');
INSERT INTO `state` VALUES(880, 57, 'Matruh', '"Matr&#363;h"', 'Y');
INSERT INTO `state` VALUES(881, 57, 'Dumyat', '"Dumy&#257;t"', 'Y');
INSERT INTO `state` VALUES(882, 57, 'al-Ismailiyah', '"al-Ism&#257;&#299;l&#299;yah"', 'Y');
INSERT INTO `state` VALUES(883, 57, 'Al Fayyum', '"al-Fayy&#363;m"', 'Y');
INSERT INTO `state` VALUES(884, 57, 'al-Bahr-al-Ahmar', 'al-Bahr-al-Ahmar', 'Y');
INSERT INTO `state` VALUES(885, 57, 'al-Wadi al-Jadid', 'al-Wadi al-Jadid', 'Y');
INSERT INTO `state` VALUES(886, 57, 'Al Iskandariyah', '"al-Iskandar&#299;yah"', 'Y');
INSERT INTO `state` VALUES(887, 57, 'al-Qahira', 'al-Qahira', 'Y');
INSERT INTO `state` VALUES(888, 57, 'as-Suways', 'as-Suways', 'Y');
INSERT INTO `state` VALUES(889, 57, 'al-Uqsur', '"al-Uq&#351;ur"', 'Y');
INSERT INTO `state` VALUES(890, 58, 'Wele-Nzas', 'Wele-Nzas', 'Y');
INSERT INTO `state` VALUES(891, 58, 'Centro Sur', 'Centro Sur', 'Y');
INSERT INTO `state` VALUES(892, 58, 'Litoral', 'Litoral', 'Y');
INSERT INTO `state` VALUES(893, 58, 'Kie-Ntem', '"Ki&#233;-Ntem"', 'Y');
INSERT INTO `state` VALUES(894, 58, 'Bioko Sur', 'Bioko Sur', 'Y');
INSERT INTO `state` VALUES(895, 58, 'Bioko Norte', 'Bioko Norte', 'Y');
INSERT INTO `state` VALUES(896, 58, 'Annobon', '"Annob&#243;n"', 'Y');
INSERT INTO `state` VALUES(897, 59, 'Semien-Keih-Bahri', 'Semien-Keih-Bahri', 'Y');
INSERT INTO `state` VALUES(898, 59, 'Debub', 'Debub', 'Y');
INSERT INTO `state` VALUES(899, 59, 'Gash-Barka', 'Gash-Barka', 'Y');
INSERT INTO `state` VALUES(900, 59, 'Maekel', 'Maekel', 'Y');
INSERT INTO `state` VALUES(901, 59, 'Debub-Keih-Bahri', 'Debub-Keih-Bahri', 'Y');
INSERT INTO `state` VALUES(902, 59, 'Anseba', 'Anseba', 'Y');
INSERT INTO `state` VALUES(903, 60, 'Ida-Viru', 'Ida-Viru', 'Y');
INSERT INTO `state` VALUES(904, 60, 'Valga', 'Valga', 'Y');
INSERT INTO `state` VALUES(905, 60, 'Tartu', 'Tartu', 'Y');
INSERT INTO `state` VALUES(906, 60, 'Polva', '"P&#333;lva"', 'Y');
INSERT INTO `state` VALUES(907, 60, 'Harju', 'Harju', 'Y');
INSERT INTO `state` VALUES(908, 60, 'Laane-Viru', '"L&#228;&#228;ne-Viru"', 'Y');
INSERT INTO `state` VALUES(909, 60, 'Viljandi', 'Viljandi', 'Y');
INSERT INTO `state` VALUES(910, 60, 'Jogeva', '"J&#333;geva"', 'Y');
INSERT INTO `state` VALUES(911, 60, 'Rapla', 'Rapla', 'Y');
INSERT INTO `state` VALUES(912, 60, 'Parnu', '"P&#228;rnu"', 'Y');
INSERT INTO `state` VALUES(913, 60, 'Jarva', '"J&#228;rva"', 'Y');
INSERT INTO `state` VALUES(914, 60, 'Voru', '"V&#333;ru"', 'Y');
INSERT INTO `state` VALUES(915, 60, 'Saare', 'Saare', 'Y');
INSERT INTO `state` VALUES(916, 60, 'Hiiu', 'Hiiu', 'Y');
INSERT INTO `state` VALUES(917, 60, 'Laane', '"L&#228;&#228;ne"', 'Y');
INSERT INTO `state` VALUES(918, 61, 'Tigray', 'Tigray', 'Y');
INSERT INTO `state` VALUES(919, 61, 'Oromia', 'Oromia', 'Y');
INSERT INTO `state` VALUES(920, 61, 'Amhara', 'Amhara', 'Y');
INSERT INTO `state` VALUES(921, 61, 'Addis Abeba', 'Addis Abeba', 'Y');
INSERT INTO `state` VALUES(922, 61, 'Southern', 'Southern', 'Y');
INSERT INTO `state` VALUES(923, 61, 'n.a.', 'n.a.', 'Y');
INSERT INTO `state` VALUES(924, 61, 'Afar', 'Afar', 'Y');
INSERT INTO `state` VALUES(925, 61, 'Benishangul', 'Benishangul', 'Y');
INSERT INTO `state` VALUES(926, 61, 'Somali', 'Somali', 'Y');
INSERT INTO `state` VALUES(927, 61, 'Diredawa', 'Diredawa', 'Y');
INSERT INTO `state` VALUES(928, 61, 'Gambella', 'Gambella', 'Y');
INSERT INTO `state` VALUES(929, 61, 'Harar', 'Harar', 'Y');
INSERT INTO `state` VALUES(930, 62, 'Falkland Islands', 'Falkland Islands', 'Y');
INSERT INTO `state` VALUES(931, 62, 'South Georgia', 'South Georgia', 'Y');
INSERT INTO `state` VALUES(932, 63, 'Vaga', '"V&#225;ga"', 'Y');
INSERT INTO `state` VALUES(933, 63, 'Noroara Eysturoy', '"Nor&#240;ara Eysturoy"', 'Y');
INSERT INTO `state` VALUES(934, 63, 'Suouroy', '"Su&#240;uroy"', 'Y');
INSERT INTO `state` VALUES(935, 63, 'Syora Eysturoy', '"Sy&#240;ra Eysturoy"', 'Y');
INSERT INTO `state` VALUES(936, 63, 'Norooy', '"Nor&#240;oy"', 'Y');
INSERT INTO `state` VALUES(937, 63, 'Streymoy', 'Streymoy', 'Y');
INSERT INTO `state` VALUES(938, 63, 'Sandoy', 'Sandoy', 'Y');
INSERT INTO `state` VALUES(939, 63, 'Klaksvik', '"Klaksv&#237;k"', 'Y');
INSERT INTO `state` VALUES(940, 63, 'Torshavn', '"T&#243;rshavn"', 'Y');
INSERT INTO `state` VALUES(941, 64, 'Western', 'Western', 'Y');
INSERT INTO `state` VALUES(942, 64, 'Central', 'Central', 'Y');
INSERT INTO `state` VALUES(943, 64, 'Northern', 'Northern', 'Y');
INSERT INTO `state` VALUES(944, 64, 'Eastern', 'Eastern', 'Y');
INSERT INTO `state` VALUES(945, 64, 'n.a.', 'n.a.', 'Y');
INSERT INTO `state` VALUES(946, 65, 'Keski-Suomi', 'Keski-Suomi', 'Y');
INSERT INTO `state` VALUES(947, 65, 'Kymenlaakso', 'Kymenlaakso', 'Y');
INSERT INTO `state` VALUES(948, 65, 'Uusimaa', 'Uusimaa', 'Y');
INSERT INTO `state` VALUES(949, 65, 'Satakunta', 'Satakunta', 'Y');
INSERT INTO `state` VALUES(950, 65, 'Kanta-Hame', '"Kanta-H&#228;me"', 'Y');
INSERT INTO `state` VALUES(951, 65, 'Pohjois-Pohjanmaa', 'Pohjois-Pohjanmaa', 'Y');
INSERT INTO `state` VALUES(952, 65, 'PÃ¤ijÃ¤t-HÃ¤me', '"P&#228;ij&#228;t-H&#228;me"', 'Y');
INSERT INTO `state` VALUES(953, 65, 'Pohjois-Savo', 'Pohjois-Savo', 'Y');
INSERT INTO `state` VALUES(954, 65, 'Etela-Pohjanmaa', '"Etel&#228;-Pohjanmaa"', 'Y');
INSERT INTO `state` VALUES(955, 65, 'Etela-Karjala', '"Etel&#228;-Karjala"', 'Y');
INSERT INTO `state` VALUES(956, 65, 'Pohjois-Karjala', 'Pohjois-Karjala', 'Y');
INSERT INTO `state` VALUES(957, 65, 'Varsinais-Suomi', 'Varsinais-Suomi', 'Y');
INSERT INTO `state` VALUES(958, 65, 'Kainuu', 'Kainuu', 'Y');
INSERT INTO `state` VALUES(959, 65, 'Pirkanmaa', 'Pirkanmaa', 'Y');
INSERT INTO `state` VALUES(960, 65, 'Lappi', 'Lappi', 'Y');
INSERT INTO `state` VALUES(961, 65, 'Keski-Pohjanmaa', 'Keski-Pohjanmaa', 'Y');
INSERT INTO `state` VALUES(962, 65, 'Pohjanmaa', 'Pohjanmaa', 'Y');
INSERT INTO `state` VALUES(963, 65, 'Ita-Uusimaa', '"It&#228;-Uusimaa"', 'Y');
INSERT INTO `state` VALUES(964, 65, 'Ahvenanmaa', 'Ahvenanmaa', 'Y');
INSERT INTO `state` VALUES(965, 65, 'Etela-Savo', '"Etel&#228;-Savo"', 'Y');
INSERT INTO `state` VALUES(966, 66, 'Somme', 'Somme', 'Y');
INSERT INTO `state` VALUES(967, 66, 'Yvelines', 'Yvelines', 'Y');
INSERT INTO `state` VALUES(968, 66, 'Herault', '"H&#233;rault"', 'Y');
INSERT INTO `state` VALUES(969, 66, 'Lot-et-Garonne', 'Lot-et-Garonne', 'Y');
INSERT INTO `state` VALUES(970, 66, 'Pas-de-Calais', 'Pas-de-Calais', 'Y');
INSERT INTO `state` VALUES(971, 66, 'Bouches-du-Rhone', '"Bouches-du-Rh&#244;ne"', 'Y');
INSERT INTO `state` VALUES(972, 66, 'Savoie', 'Savoie', 'Y');
INSERT INTO `state` VALUES(973, 66, 'Corse-du-Sud', 'Corse-du-Sud', 'Y');
INSERT INTO `state` VALUES(974, 66, 'Tarn', 'Tarn', 'Y');
INSERT INTO `state` VALUES(975, 66, 'Orne', 'Orne', 'Y');
INSERT INTO `state` VALUES(976, 66, 'Gard', 'Gard', 'Y');
INSERT INTO `state` VALUES(977, 66, 'Val-de-Marne', 'Val-de-Marne', 'Y');
INSERT INTO `state` VALUES(978, 66, 'Sarthe', 'Sarthe', 'Y');
INSERT INTO `state` VALUES(979, 66, 'Gironde', 'Gironde', 'Y');
INSERT INTO `state` VALUES(980, 66, 'Ain', 'Ain', 'Y');
INSERT INTO `state` VALUES(981, 66, 'Indre-et-Loire', 'Indre-et-Loire', 'Y');
INSERT INTO `state` VALUES(982, 66, 'Loiret', 'Loiret', 'Y');
INSERT INTO `state` VALUES(983, 66, 'Moselle', 'Moselle', 'Y');
INSERT INTO `state` VALUES(984, 66, 'Loire', 'Loire', 'Y');
INSERT INTO `state` VALUES(985, 66, 'Maine-et-Loire', 'Maine-et-Loire', 'Y');
INSERT INTO `state` VALUES(986, 66, 'Pyrenees - Atlantiques', '"Pyr&#233;n&#233;es-Atlantiques"', 'Y');
INSERT INTO `state` VALUES(987, 66, 'Charente', 'Charente', 'Y');
INSERT INTO `state` VALUES(988, 66, 'Nord', 'Nord', 'Y');
INSERT INTO `state` VALUES(989, 66, 'Haute-Savoie', 'Haute-Savoie', 'Y');
INSERT INTO `state` VALUES(990, 66, 'Ardeche', '"Ard&#232;che"', 'Y');
INSERT INTO `state` VALUES(991, 66, 'Alpes-Maritimes', 'Alpes-Maritimes', 'Y');
INSERT INTO `state` VALUES(992, 66, 'Hauts-de-Seine', 'Hauts-de-Seine', 'Y');
INSERT INTO `state` VALUES(993, 66, 'Vaucluse', 'Vaucluse', 'Y');
INSERT INTO `state` VALUES(994, 66, 'Essonne', 'Essonne', 'Y');
INSERT INTO `state` VALUES(995, 66, 'Seine-Saint-Denis', 'Seine-Saint-Denis', 'Y');
INSERT INTO `state` VALUES(996, 66, 'Puy-de-Dome', '"Puy-de-D&#244;me"', 'Y');
INSERT INTO `state` VALUES(997, 66, 'Gers', 'Gers', 'Y');
INSERT INTO `state` VALUES(998, 66, 'Doubs', 'Doubs', 'Y');
INSERT INTO `state` VALUES(999, 66, 'Morbihan', 'Morbihan', 'Y');
INSERT INTO `state` VALUES(1000, 66, 'Cantal', 'Cantal', 'Y');
INSERT INTO `state` VALUES(1001, 66, 'Saone-et-Loire', '"Sa&#244;ne-et-Loire"', 'Y');
INSERT INTO `state` VALUES(1002, 66, 'Yonne', 'Yonne', 'Y');
INSERT INTO `state` VALUES(1003, 66, 'Seine-et-Marne', 'Seine-et-Marne', 'Y');
INSERT INTO `state` VALUES(1004, 66, 'Haute-Garonne', 'Haute-Garonne', 'Y');
INSERT INTO `state` VALUES(1005, 66, 'Seine-Maritime', 'Seine-Maritime', 'Y');
INSERT INTO `state` VALUES(1006, 66, 'Meuse', 'Meuse', 'Y');
INSERT INTO `state` VALUES(1007, 66, 'Haute-Corse', 'Haute-Corse', 'Y');
INSERT INTO `state` VALUES(1008, 66, 'Calvados', 'Calvados', 'Y');
INSERT INTO `state` VALUES(1009, 66, 'Oise', 'Oise', 'Y');
INSERT INTO `state` VALUES(1010, 66, 'Territoire de Belfort', 'Territoire de Belfort', 'Y');
INSERT INTO `state` VALUES(1011, 66, 'Dordogne', 'Dordogne', 'Y');
INSERT INTO `state` VALUES(1012, 66, 'Eure', 'Eure', 'Y');
INSERT INTO `state` VALUES(1013, 66, 'Landes', 'Landes', 'Y');
INSERT INTO `state` VALUES(1014, 66, 'Bas-Rhin', 'Bas-Rhin', 'Y');
INSERT INTO `state` VALUES(1015, 66, 'Loir-et-Cher', 'Loir-et-Cher', 'Y');
INSERT INTO `state` VALUES(1016, 66, 'Loire-Atlantique', 'Loire-Atlantique', 'Y');
INSERT INTO `state` VALUES(1017, 66, 'Cher', 'Cher', 'Y');
INSERT INTO `state` VALUES(1018, 66, 'Drome', '"Dr&#244;me"', 'Y');
INSERT INTO `state` VALUES(1019, 66, 'Isere', '"Is&#232;re"', 'Y');
INSERT INTO `state` VALUES(1020, 66, 'Deux Sevres', '"Deux-S&#232;vres"', 'Y');
INSERT INTO `state` VALUES(1021, 66, 'Finistere', '"Finist&#232;re"', 'Y');
INSERT INTO `state` VALUES(1022, 66, 'Hautes-Alpes', 'Hautes-Alpes', 'Y');
INSERT INTO `state` VALUES(1023, 66, 'Rhone', '"Rh&#244;ne"', 'Y');
INSERT INTO `state` VALUES(1024, 66, 'Var', 'Var', 'Y');
INSERT INTO `state` VALUES(1025, 66, 'Correze', '"Corr&#232;ze"', 'Y');
INSERT INTO `state` VALUES(1026, 66, 'Lot', 'Lot', 'Y');
INSERT INTO `state` VALUES(1027, 66, 'Aude', 'Aude', 'Y');
INSERT INTO `state` VALUES(1028, 66, 'Tarn-et-Garonne', 'Tarn-et-Garonne', 'Y');
INSERT INTO `state` VALUES(1029, 66, 'Haut-Rhin', 'Haut-Rhin', 'Y');
INSERT INTO `state` VALUES(1030, 66, 'Ille-et-Vilaine', 'Ille-et-Vilaine', 'Y');
INSERT INTO `state` VALUES(1031, 66, 'Vendee', '"Vend&#233;e"', 'Y');
INSERT INTO `state` VALUES(1032, 66, 'Marne', 'Marne', 'Y');
INSERT INTO `state` VALUES(1033, 66, 'Jura', 'Jura', 'Y');
INSERT INTO `state` VALUES(1034, 66, 'Ardennes', 'Ardennes', 'Y');
INSERT INTO `state` VALUES(1035, 66, 'Eure-et-Loir', 'Eure-et-Loir', 'Y');
INSERT INTO `state` VALUES(1036, 66, 'Mayenne', 'Mayenne', 'Y');
INSERT INTO `state` VALUES(1037, 66, 'Indre', 'Indre', 'Y');
INSERT INTO `state` VALUES(1038, 66, 'Aisne', 'Aisne', 'Y');
INSERT INTO `state` VALUES(1039, 66, 'Vienne', 'Vienne', 'Y');
INSERT INTO `state` VALUES(1040, 66, 'Haute-Marne', 'Haute-Marne', 'Y');
INSERT INTO `state` VALUES(1041, 66, 'Manche', 'Manche', 'Y');
INSERT INTO `state` VALUES(1042, 66, 'NiÃ¨vre', '"Ni&#232;vre"', 'Y');
INSERT INTO `state` VALUES(1043, 66, 'Allier', 'Allier', 'Y');
INSERT INTO `state` VALUES(1044, 66, 'Alpes-de-Haute-Provence', 'Alpes-de-Haute-Provence', 'Y');
INSERT INTO `state` VALUES(1045, 66, 'Meurthe-et-Moselle', 'Meurthe-et-Moselle', 'Y');
INSERT INTO `state` VALUES(1046, 66, 'Vosges', 'Vosges', 'Y');
INSERT INTO `state` VALUES(1047, 66, 'Ariege', '"Ari&#232;ge"', 'Y');
INSERT INTO `state` VALUES(1048, 66, 'Haute-Vienne', 'Haute-Vienne', 'Y');
INSERT INTO `state` VALUES(1049, 66, 'Creuse', 'Creuse', 'Y');
INSERT INTO `state` VALUES(1050, 66, 'Haute-Saone', '"Haute-Sa&#244;ne"', 'Y');
INSERT INTO `state` VALUES(1051, 66, 'Charente-Maritime', 'Charente-Maritime', 'Y');
INSERT INTO `state` VALUES(1052, 66, 'Haute-Loire', 'Haute-Loire', 'Y');
INSERT INTO `state` VALUES(1053, 66, 'Hautes-Pyrenees', '"Hautes-Pyr&#233;n&#233;es"', 'Y');
INSERT INTO `state` VALUES(1054, 66, 'Lozere', '"Loz&#232;re"', 'Y');
INSERT INTO `state` VALUES(1055, 66, 'Aveyron', 'Aveyron', 'Y');
INSERT INTO `state` VALUES(1056, 66, 'Paris', 'Paris', 'Y');
INSERT INTO `state` VALUES(1057, 66, 'Pyrenees-Orientales', '"Pyr&#233;n&#233;es-Orientales"', 'Y');
INSERT INTO `state` VALUES(1058, 66, 'Aube', 'Aube', 'Y');
INSERT INTO `state` VALUES(1059, 67, 'Saint-Laurent-du-Maroni', 'Saint-Laurent-du-Maroni', 'Y');
INSERT INTO `state` VALUES(1060, 67, 'n.a.', 'n.a.', 'Y');
INSERT INTO `state` VALUES(1061, 67, 'Cayenne', 'Cayenne', 'Y');
INSERT INTO `state` VALUES(1062, 68, 'Iles du Vent', '"&#206;les du Vent"', 'Y');
INSERT INTO `state` VALUES(1063, 68, 'Tuamotu', 'Tuamotu', 'Y');
INSERT INTO `state` VALUES(1064, 68, 'Tubuai', 'Tubuai', 'Y');
INSERT INTO `state` VALUES(1065, 68, 'Iles Sous le Vent', '"&#206;les sous le Vent"', 'Y');
INSERT INTO `state` VALUES(1066, 68, 'Marquesas', 'Marquesas', 'Y');
INSERT INTO `state` VALUES(1067, 69, 'Woleu-Ntem', 'Woleu-Ntem', 'Y');
INSERT INTO `state` VALUES(1068, 69, 'Ogooue-Ivindo', '"Ogoou&#233;-Ivindo"', 'Y');
INSERT INTO `state` VALUES(1069, 69, 'Estuaire', 'Estuaire', 'Y');
INSERT INTO `state` VALUES(1070, 69, 'Ngounie', '"Ngouni&#233;"', 'Y');
INSERT INTO `state` VALUES(1071, 69, 'Ogooue-Maritime', '"Ogoou&#233;-Maritime"', 'Y');
INSERT INTO `state` VALUES(1072, 69, 'Ogooue-Lolo', '"Ogoou&#233;-Lolo"', 'Y');
INSERT INTO `state` VALUES(1073, 69, 'Moyen-Ogooue', '"Moyen-Ogoou&#233;"', 'Y');
INSERT INTO `state` VALUES(1074, 69, 'Haut-Ogooue', '"Haut-Ogoou&#233;"', 'Y');
INSERT INTO `state` VALUES(1075, 69, 'Nyanga', 'Nyanga', 'Y');
INSERT INTO `state` VALUES(1076, 70, 'Kanifing', 'Kanifing', 'Y');
INSERT INTO `state` VALUES(1077, 70, 'Banjul', 'Banjul', 'Y');
INSERT INTO `state` VALUES(1078, 70, 'Janjanbureh', 'Janjanbureh', 'Y');
INSERT INTO `state` VALUES(1079, 70, 'Kerewan', 'Kerewan', 'Y');
INSERT INTO `state` VALUES(1080, 70, 'Basse', 'Basse', 'Y');
INSERT INTO `state` VALUES(1081, 70, 'Brikama', 'Brikama', 'Y');
INSERT INTO `state` VALUES(1082, 70, 'Kuntaur', 'Kuntaur', 'Y');
INSERT INTO `state` VALUES(1083, 70, 'Mansakonko', 'Mansakonko', 'Y');
INSERT INTO `state` VALUES(1084, 71, 'Samagrelo-Zemo Svaneti', 'Samagrelo-Zemo Svaneti', 'Y');
INSERT INTO `state` VALUES(1085, 71, 'Samche-Zhavaheti', '"Samche-&#381;avaheti"', 'Y');
INSERT INTO `state` VALUES(1086, 71, 'Abhasia', 'Abhasia', 'Y');
INSERT INTO `state` VALUES(1087, 71, 'Kaheti', 'Kaheti', 'Y');
INSERT INTO `state` VALUES(1088, 71, 'Racha', '"Ra&#269;a"', 'Y');
INSERT INTO `state` VALUES(1089, 71, 'Imereti', 'Imereti', 'Y');
INSERT INTO `state` VALUES(1090, 71, 'Ajaria', 'Ajaria', 'Y');
INSERT INTO `state` VALUES(1091, 71, 'Kvemo Kartli', 'Kvemo Kartli', 'Y');
INSERT INTO `state` VALUES(1092, 71, 'Shida Kartli', '"&#352;ida Kartli"', 'Y');
INSERT INTO `state` VALUES(1093, 71, 'Mcheta-Mtianeti', 'Mcheta-Mtianeti', 'Y');
INSERT INTO `state` VALUES(1094, 71, 'Guria', 'Guria', 'Y');
INSERT INTO `state` VALUES(1095, 71, 'Tbilisi', 'Tbilisi', 'Y');
INSERT INTO `state` VALUES(1096, 72, 'Nordrhein-Westfalen', 'Nordrhein-Westfalen', 'Y');
INSERT INTO `state` VALUES(1097, 72, 'Baden-Wurttemberg', '"Baden-W&#252;rttemberg"', 'Y');
INSERT INTO `state` VALUES(1098, 72, 'Bayern', 'Bayern', 'Y');
INSERT INTO `state` VALUES(1099, 72, 'Niedersachsen', 'Niedersachsen', 'Y');
INSERT INTO `state` VALUES(1100, 72, 'Schleswig-Holstein', 'Schleswig-Holstein', 'Y');
INSERT INTO `state` VALUES(1101, 72, 'Sachsen-Anhalt', 'Sachsen-Anhalt', 'Y');
INSERT INTO `state` VALUES(1102, 72, 'Hessen', 'Hessen', 'Y');
INSERT INTO `state` VALUES(1103, 72, 'ThÃ¼ringen', '"Th&#252;ringen"', 'Y');
INSERT INTO `state` VALUES(1104, 72, 'Rheinland-Pfalz', 'Rheinland-Pfalz', 'Y');
INSERT INTO `state` VALUES(1105, 72, 'Brandenburg', 'Brandenburg', 'Y');
INSERT INTO `state` VALUES(1106, 72, 'Mecklenburg-Vorpommern', 'Mecklenburg-Vorpommern', 'Y');
INSERT INTO `state` VALUES(1107, 72, 'Sachsen', 'Sachsen', 'Y');
INSERT INTO `state` VALUES(1108, 72, 'Saarland', 'Saarland', 'Y');
INSERT INTO `state` VALUES(1109, 72, 'Berlin', 'Berlin', 'Y');
INSERT INTO `state` VALUES(1110, 72, 'Bremen', 'Bremen', 'Y');
INSERT INTO `state` VALUES(1111, 72, 'Hamburg', 'Hamburg', 'Y');
INSERT INTO `state` VALUES(1112, 73, 'Western', 'Western', 'Y');
INSERT INTO `state` VALUES(1113, 73, 'Eastern', 'Eastern', 'Y');
INSERT INTO `state` VALUES(1114, 73, 'Greater Accra', 'Greater Accra', 'Y');
INSERT INTO `state` VALUES(1115, 73, 'Volta', 'Volta', 'Y');
INSERT INTO `state` VALUES(1116, 73, 'Ashanti', 'Ashanti', 'Y');
INSERT INTO `state` VALUES(1117, 73, 'Central', 'Central', 'Y');
INSERT INTO `state` VALUES(1118, 73, 'Upper East', 'Upper East', 'Y');
INSERT INTO `state` VALUES(1119, 73, 'Brong-Ahafo', 'Brong-Ahafo', 'Y');
INSERT INTO `state` VALUES(1120, 73, 'Northern', 'Northern', 'Y');
INSERT INTO `state` VALUES(1121, 73, 'Upper West', 'Upper West', 'Y');
INSERT INTO `state` VALUES(1122, 74, '', '', 'Y');
INSERT INTO `state` VALUES(1123, 75, 'Aitolia kai Akarnania', '"Aitol&#237;a kai Akarnan&#237;a"', 'Y');
INSERT INTO `state` VALUES(1124, 75, 'Attiki­', '"Attik&#237;"', 'Y');
INSERT INTO `state` VALUES(1125, 75, 'Ahaia', 'Ahaia', 'Y');
INSERT INTO `state` VALUES(1126, 75, 'Evros', '"&#201;vros"', 'Y');
INSERT INTO `state` VALUES(1127, 75, 'Fokis', '"Fok&#237;s"', 'Y');
INSERT INTO `state` VALUES(1128, 75, 'Thessaloniki', '"Thessalon&#237;ki"', 'Y');
INSERT INTO `state` VALUES(1129, 75, 'Argolis', 'Argolis', 'Y');
INSERT INTO `state` VALUES(1130, 75, 'Kefallinia', '"Kefallin&#237;a"', 'Y');
INSERT INTO `state` VALUES(1131, 75, 'Dodekanisos', '"Dodek&#225;nisos"', 'Y');
INSERT INTO `state` VALUES(1132, 75, 'Arta', '"&#193;rta"', 'Y');
INSERT INTO `state` VALUES(1133, 75, 'Lasithi', '"Las&#237;thi"', 'Y');
INSERT INTO `state` VALUES(1134, 75, 'Drama', '"Dr&#225;ma"', 'Y');
INSERT INTO `state` VALUES(1135, 75, 'Pella', '"P&#233;lla"', 'Y');
INSERT INTO `state` VALUES(1136, 75, 'Kiklades', '"Kikl&#225;des"', 'Y');
INSERT INTO `state` VALUES(1137, 75, 'Florina', '"Fl&#243;rina"', 'Y');
INSERT INTO `state` VALUES(1138, 75, 'Grevena', '"Greven&#225;"', 'Y');
INSERT INTO `state` VALUES(1139, 75, 'Evvoia', '"&#201;vvoia"', 'Y');
INSERT INTO `state` VALUES(1140, 75, 'Hania', '"Hani&#225;"', 'Y');
INSERT INTO `state` VALUES(1141, 75, 'Hios', '"H&#237;os"', 'Y');
INSERT INTO `state` VALUES(1142, 75, 'Thesprotia', '"Thesprot&#237;a"', 'Y');
INSERT INTO `state` VALUES(1143, 75, 'Ioannina', '"Io&#225;nnina"', 'Y');
INSERT INTO `state` VALUES(1144, 75, 'Iraklion', '"Ir&#225;klion"', 'Y');
INSERT INTO `state` VALUES(1145, 75, 'Messinia', '"Messin&#237;a"', 'Y');
INSERT INTO `state` VALUES(1146, 75, 'Karditsa', '"Kard&#237;tsa"', 'Y');
INSERT INTO `state` VALUES(1147, 75, 'Ayion Oros', '"&#193;yion &#211;ros"', 'Y');
INSERT INTO `state` VALUES(1148, 75, 'Evritania', '"Evritan&#237;a"', 'Y');
INSERT INTO `state` VALUES(1149, 75, 'Kastoria', '"Kastor&#237;a"', 'Y');
INSERT INTO `state` VALUES(1150, 75, 'Pieria', '"Pier&#237;a"', 'Y');
INSERT INTO `state` VALUES(1151, 75, 'Kavala', '"Kav&#225;la"', 'Y');
INSERT INTO `state` VALUES(1152, 75, 'Kerkira', '"K&#233;rkira"', 'Y');
INSERT INTO `state` VALUES(1153, 75, 'Kilkis', '"Kilk&#237;s"', 'Y');
INSERT INTO `state` VALUES(1154, 75, 'Rodopi', '"Rod&#243;pi"', 'Y');
INSERT INTO `state` VALUES(1155, 75, 'Korinthia', '"Korinth&#237;a"', 'Y');
INSERT INTO `state` VALUES(1156, 75, 'Kozani', '"Koz&#225;ni"', 'Y');
INSERT INTO `state` VALUES(1157, 75, 'Fthiotis', '"Fthi&#243;tis"', 'Y');
INSERT INTO `state` VALUES(1158, 75, 'Larisa', '"L&#225;risa"', 'Y');
INSERT INTO `state` VALUES(1159, 75, 'Voiotia', '"Voioti&#225;"', 'Y');
INSERT INTO `state` VALUES(1160, 75, 'levkas', '"Levk&#225;s"', 'Y');
INSERT INTO `state` VALUES(1161, 75, 'Lesvos', '"L&#233;svos"', 'Y');
INSERT INTO `state` VALUES(1162, 75, 'Ilia', '"Il&#237;a"', 'Y');
INSERT INTO `state` VALUES(1163, 75, 'Halkidiki­', '"Halkidik&#237;"', 'Y');
INSERT INTO `state` VALUES(1164, 75, 'Preveza', '"Pr&#233;veza"', 'Y');
INSERT INTO `state` VALUES(1165, 75, 'Rethimni', '"Reth&#237;mni"', 'Y');
INSERT INTO `state` VALUES(1166, 75, 'Samos', '"S&#225;mos"', 'Y');
INSERT INTO `state` VALUES(1167, 75, 'Serrai', '"S&#233;rrai"', 'Y');
INSERT INTO `state` VALUES(1168, 75, 'lakonia', '"Lakon&#237;a"', 'Y');
INSERT INTO `state` VALUES(1169, 75, 'Trikala', '"Tr&#237;kala"', 'Y');
INSERT INTO `state` VALUES(1170, 75, 'Arkadia', '"Arkad&#237;a"', 'Y');
INSERT INTO `state` VALUES(1171, 75, 'Imathia', '"Imath&#237;a"', 'Y');
INSERT INTO `state` VALUES(1172, 75, 'Magnisia', '"Magnis&#237;a"', 'Y');
INSERT INTO `state` VALUES(1173, 75, 'Xanthi', '"X&#225;nthi"', 'Y');
INSERT INTO `state` VALUES(1174, 75, 'Zakynthos', '"Z&#225;kinthos"', 'Y');
INSERT INTO `state` VALUES(1175, 76, 'Nanortalik', 'Nanortalik', 'Y');
INSERT INTO `state` VALUES(1176, 76, 'Upernavik', 'Upernavik', 'Y');
INSERT INTO `state` VALUES(1177, 76, 'Aasiaat', 'Aasiaat', 'Y');
INSERT INTO `state` VALUES(1178, 76, 'Narsaq', 'Narsaq', 'Y');
INSERT INTO `state` VALUES(1179, 76, 'Paamiut', 'Paamiut', 'Y');
INSERT INTO `state` VALUES(1180, 76, 'Maniitsoq', 'Maniitsoq', 'Y');
INSERT INTO `state` VALUES(1181, 76, 'Kangaatsiaq', 'Kangaatsiaq', 'Y');
INSERT INTO `state` VALUES(1182, 76, 'Qaqortoq', 'Qaqortoq', 'Y');
INSERT INTO `state` VALUES(1183, 76, 'Qasigiannguit', 'Qasigiannguit', 'Y');
INSERT INTO `state` VALUES(1184, 76, 'Uummannaq', 'Uummannaq', 'Y');
INSERT INTO `state` VALUES(1185, 76, 'Ammassalik', 'Ammassalik', 'Y');
INSERT INTO `state` VALUES(1186, 76, 'Ilulissat', 'Ilulissat', 'Y');
INSERT INTO `state` VALUES(1187, 76, 'Illoqqortoormiut', 'Illoqqortoormiut', 'Y');
INSERT INTO `state` VALUES(1188, 76, 'Sisimiut', 'Sisimiut', 'Y');
INSERT INTO `state` VALUES(1189, 76, 'Ivittuut', 'Ivittuut', 'Y');
INSERT INTO `state` VALUES(1190, 76, 'Nuuk', 'Nuuk', 'Y');
INSERT INTO `state` VALUES(1191, 76, 'Qeqertarsuaq', 'Qeqertarsuaq', 'Y');
INSERT INTO `state` VALUES(1192, 76, 'Qaanaaq', 'Qaanaaq', 'Y');
INSERT INTO `state` VALUES(1193, 76, 'Udenfor kommunal inddeling', 'Udenfor kommunal inddeling', 'Y');
INSERT INTO `state` VALUES(1194, 77, 'Saint John', 'Saint John', 'Y');
INSERT INTO `state` VALUES(1195, 77, 'Saint Andrew', 'Saint Andrew', 'Y');
INSERT INTO `state` VALUES(1196, 77, 'Carriacou-Petite Martinique', 'Carriacou-Petite Martinique', 'Y');
INSERT INTO `state` VALUES(1197, 77, 'Saint Davids', 'Saint Davids', 'Y');
INSERT INTO `state` VALUES(1198, 77, 'Saint Mark', 'Saint Mark', 'Y');
INSERT INTO `state` VALUES(1199, 77, 'Saint Patrick', 'Saint Patrick', 'Y');
INSERT INTO `state` VALUES(1200, 78, 'Grande-Terre', 'Grande-Terre', 'Y');
INSERT INTO `state` VALUES(1201, 78, 'Basse-Terre', 'Basse-Terre', 'Y');
INSERT INTO `state` VALUES(1202, 78, 'Marie-Galante', 'Marie-Galante', 'Y');
INSERT INTO `state` VALUES(1203, 78, 'La Desirade', '"La D&#233;sirade"', 'Y');
INSERT INTO `state` VALUES(1204, 78, 'Saint Martin', 'Saint Martin', 'Y');
INSERT INTO `state` VALUES(1205, 78, 'Saint Barthelemy', '"Saint Barth&#233;lemy"', 'Y');
INSERT INTO `state` VALUES(1206, 78, 'Iles des Saintes', '"&#206;les des Saintes"', 'Y');
INSERT INTO `state` VALUES(1207, 79, 'HagatÃ±a', '"Hagat&#241;a"', 'Y');
INSERT INTO `state` VALUES(1208, 79, 'Agana Heights', 'Agana Heights', 'Y');
INSERT INTO `state` VALUES(1209, 79, 'Agat', 'Agat', 'Y');
INSERT INTO `state` VALUES(1210, 79, 'Yigo', 'Yigo', 'Y');
INSERT INTO `state` VALUES(1211, 79, 'Santa Rita', 'Santa Rita', 'Y');
INSERT INTO `state` VALUES(1212, 79, 'n.a.', 'n.a.', 'Y');
INSERT INTO `state` VALUES(1213, 79, 'Dededo', 'Dededo', 'Y');
INSERT INTO `state` VALUES(1214, 79, 'Barrigada', 'Barrigada', 'Y');
INSERT INTO `state` VALUES(1215, 79, 'Chalan-Pago-Ordot', 'Chalan-Pago-Ordot', 'Y');
INSERT INTO `state` VALUES(1216, 79, 'Inarajan', 'Inarajan', 'Y');
INSERT INTO `state` VALUES(1217, 79, 'Mangilao', 'Mangilao', 'Y');
INSERT INTO `state` VALUES(1218, 79, 'Merizo', 'Merizo', 'Y');
INSERT INTO `state` VALUES(1219, 79, 'Mongmong-Toto-Maite', 'Mongmong-Toto-Maite', 'Y');
INSERT INTO `state` VALUES(1220, 79, 'Sinajana', 'Sinajana', 'Y');
INSERT INTO `state` VALUES(1221, 79, 'Talofofo', 'Talofofo', 'Y');
INSERT INTO `state` VALUES(1222, 79, 'Tamuning', 'Tamuning', 'Y');
INSERT INTO `state` VALUES(1223, 79, 'Yona', 'Yona', 'Y');
INSERT INTO `state` VALUES(1224, 80, 'Guatemala', 'Guatemala', 'Y');
INSERT INTO `state` VALUES(1225, 80, 'Sacatepequez', '"Sacatep&#233;quez"', 'Y');
INSERT INTO `state` VALUES(1226, 80, 'Jutiapa', 'Jutiapa', 'Y');
INSERT INTO `state` VALUES(1227, 80, 'Solola', '"Solol&#225;"', 'Y');
INSERT INTO `state` VALUES(1228, 80, 'Santa Rosa', 'Santa Rosa', 'Y');
INSERT INTO `state` VALUES(1229, 80, 'Chimaltenango', 'Chimaltenango', 'Y');
INSERT INTO `state` VALUES(1230, 80, 'Chiquimula', 'Chiquimula', 'Y');
INSERT INTO `state` VALUES(1231, 80, 'Alta Verapaz', 'Alta Verapaz', 'Y');
INSERT INTO `state` VALUES(1232, 80, 'Escuintla', 'Escuintla', 'Y');
INSERT INTO `state` VALUES(1233, 80, 'Peten', '"Pet&#233;n"', 'Y');
INSERT INTO `state` VALUES(1234, 80, 'El Progreso', 'El Progreso', 'Y');
INSERT INTO `state` VALUES(1235, 80, 'Huehuetenango', 'Huehuetenango', 'Y');
INSERT INTO `state` VALUES(1236, 80, 'Jalapa', 'Jalapa', 'Y');
INSERT INTO `state` VALUES(1237, 80, 'Suchitepequez', '"Suchitep&#233;quez"', 'Y');
INSERT INTO `state` VALUES(1238, 80, 'Izabal', 'Izabal', 'Y');
INSERT INTO `state` VALUES(1239, 80, 'Quezaltenango', 'Quezaltenango', 'Y');
INSERT INTO `state` VALUES(1240, 80, 'Quiche', '"Quich&#233;"', 'Y');
INSERT INTO `state` VALUES(1241, 80, 'Retalhuleu', 'Retalhuleu', 'Y');
INSERT INTO `state` VALUES(1242, 80, 'San Marcos', 'San Marcos', 'Y');
INSERT INTO `state` VALUES(1243, 80, 'Baja Verapaz', 'Baja Verapaz', 'Y');
INSERT INTO `state` VALUES(1244, 80, 'Totonicapan', '"Totonicap&#225;n"', 'Y');
INSERT INTO `state` VALUES(1245, 80, 'Zacapa', 'Zacapa', 'Y');
INSERT INTO `state` VALUES(1246, 81, 'Beyla', 'Beyla', 'Y');
INSERT INTO `state` VALUES(1247, 81, 'Boffa', 'Boffa', 'Y');
INSERT INTO `state` VALUES(1248, 81, 'Boke', '"Bok&#233;"', 'Y');
INSERT INTO `state` VALUES(1249, 81, 'Conakry', 'Conakry', 'Y');
INSERT INTO `state` VALUES(1250, 81, 'Coyah', 'Coyah', 'Y');
INSERT INTO `state` VALUES(1251, 81, 'Dabola', 'Dabola', 'Y');
INSERT INTO `state` VALUES(1252, 81, 'Dalaba', 'Dalaba', 'Y');
INSERT INTO `state` VALUES(1253, 81, 'Dinguiraye', 'Dinguiraye', 'Y');
INSERT INTO `state` VALUES(1254, 81, 'n.a.', 'n.a.', 'Y');
INSERT INTO `state` VALUES(1255, 81, 'Faranah', 'Faranah', 'Y');
INSERT INTO `state` VALUES(1256, 81, 'Forecariah', '"For&#233;cariah"', 'Y');
INSERT INTO `state` VALUES(1257, 81, 'Fria', 'Fria', 'Y');
INSERT INTO `state` VALUES(1258, 81, 'Gaoual', 'Gaoual', 'Y');
INSERT INTO `state` VALUES(1259, 81, 'Gueckedou', '"Gu&#233;ck&#233;dou"', 'Y');
INSERT INTO `state` VALUES(1260, 81, 'Kankan', 'Kankan', 'Y');
INSERT INTO `state` VALUES(1261, 81, 'Kerouane', '"K&#233;rouane"', 'Y');
INSERT INTO `state` VALUES(1262, 81, 'Kindia', 'Kindia', 'Y');
INSERT INTO `state` VALUES(1263, 81, 'Kissidougou', 'Kissidougou', 'Y');
INSERT INTO `state` VALUES(1264, 81, 'Koubia', 'Koubia', 'Y');
INSERT INTO `state` VALUES(1265, 81, 'Koundara', 'Koundara', 'Y');
INSERT INTO `state` VALUES(1266, 81, 'Kouroussa', 'Kouroussa', 'Y');
INSERT INTO `state` VALUES(1267, 81, 'Labe', '"Lab&#233;"', 'Y');
INSERT INTO `state` VALUES(1268, 81, 'Lola', 'Lola', 'Y');
INSERT INTO `state` VALUES(1269, 81, 'Macenta', 'Macenta', 'Y');
INSERT INTO `state` VALUES(1270, 81, 'Mali', 'Mali', 'Y');
INSERT INTO `state` VALUES(1271, 81, 'Mamou', 'Mamou', 'Y');
INSERT INTO `state` VALUES(1272, 81, 'Mandiana', 'Mandiana', 'Y');
INSERT INTO `state` VALUES(1273, 81, 'Nzerekore', '"Nz&#233;r&#233;kor&#233;"', 'Y');
INSERT INTO `state` VALUES(1274, 81, 'Pita', 'Pita', 'Y');
INSERT INTO `state` VALUES(1275, 81, 'Siguiri', 'Siguiri', 'Y');
INSERT INTO `state` VALUES(1276, 81, 'Telimele', '"T&#233;lim&#233;l&#233;"', 'Y');
INSERT INTO `state` VALUES(1277, 81, 'Tougue', '"Tougu&#233;"', 'Y');
INSERT INTO `state` VALUES(1278, 81, 'Yomou', 'Yomou', 'Y');
INSERT INTO `state` VALUES(1279, 82, 'Bafata', '"Bafat&#225;"', 'Y');
INSERT INTO `state` VALUES(1280, 82, 'Bissau', 'Bissau', 'Y');
INSERT INTO `state` VALUES(1281, 82, 'Oio', 'Oio', 'Y');
INSERT INTO `state` VALUES(1282, 82, 'Bolama', 'Bolama', 'Y');
INSERT INTO `state` VALUES(1283, 82, 'Quinara', 'Quinara', 'Y');
INSERT INTO `state` VALUES(1284, 82, 'Cacheu', 'Cacheu', 'Y');
INSERT INTO `state` VALUES(1285, 82, 'Tombali', 'Tombali', 'Y');
INSERT INTO `state` VALUES(1286, 82, 'Gabu', '"Gab&#250;"', 'Y');
INSERT INTO `state` VALUES(1287, 83, 'n.a.', 'n.a.', 'Y');
INSERT INTO `state` VALUES(1288, 83, 'Pomeroon-Supenaam', 'Pomeroon-Supenaam', 'Y');
INSERT INTO `state` VALUES(1289, 83, 'Upper Takutu-Upper Essequibo', 'Upper Takutu-Upper Essequibo', 'Y');
INSERT INTO `state` VALUES(1290, 83, 'Cuyuni-Mazaruni', 'Cuyuni-Mazaruni', 'Y');
INSERT INTO `state` VALUES(1291, 83, 'East Berbice-Corentyne', 'East Berbice-Corentyne', 'Y');
INSERT INTO `state` VALUES(1292, 83, 'Mahaica-Berbice', 'Mahaica-Berbice', 'Y');
INSERT INTO `state` VALUES(1293, 83, 'Demerara-Mahaica', 'Demerara-Mahaica', 'Y');
INSERT INTO `state` VALUES(1294, 83, 'Upper Demerara-Berbice', 'Upper Demerara-Berbice', 'Y');
INSERT INTO `state` VALUES(1295, 83, 'Barima-Waini', 'Barima-Waini', 'Y');
INSERT INTO `state` VALUES(1296, 83, 'Potaro-Siparuni', 'Potaro-Siparuni', 'Y');
INSERT INTO `state` VALUES(1297, 83, 'Essequibo Islands-West Demerara', 'Essequibo Islands-West Demerara', 'Y');
INSERT INTO `state` VALUES(1298, 84, 'Ouest', 'Ouest', 'Y');
INSERT INTO `state` VALUES(1299, 84, 'Sud', 'Sud', 'Y');
INSERT INTO `state` VALUES(1300, 84, 'Nord', 'Nord', 'Y');
INSERT INTO `state` VALUES(1301, 84, 'Nord-Est', 'Nord-Est', 'Y');
INSERT INTO `state` VALUES(1302, 84, 'Artibonite', 'Artibonite', 'Y');
INSERT INTO `state` VALUES(1303, 84, 'Centre', 'Centre', 'Y');
INSERT INTO `state` VALUES(1304, 84, 'Sud-Est', 'Sud-Est', 'Y');
INSERT INTO `state` VALUES(1305, 84, 'Nord-Ouest', 'Nord-Ouest', 'Y');
INSERT INTO `state` VALUES(1306, 85, 'Valle', 'Valle', 'Y');
INSERT INTO `state` VALUES(1307, 85, 'Olancho', 'Olancho', 'Y');
INSERT INTO `state` VALUES(1308, 85, 'Cortes', '"Cort&#233;s"', 'Y');
INSERT INTO `state` VALUES(1309, 85, 'Choluteca', 'Choluteca', 'Y');
INSERT INTO `state` VALUES(1310, 85, 'Comayagua', 'Comayagua', 'Y');
INSERT INTO `state` VALUES(1311, 85, 'Copan', '"Cop&#225;n"', 'Y');
INSERT INTO `state` VALUES(1312, 85, 'El Paraiso', '"El Para&#237;so"', 'Y');
INSERT INTO `state` VALUES(1313, 85, 'Yoro', 'Yoro', 'Y');
INSERT INTO `state` VALUES(1314, 85, 'Lempira', 'Lempira', 'Y');
INSERT INTO `state` VALUES(1315, 85, 'Francisco Morazan', '"Francisco Moraz&#225;n"', 'Y');
INSERT INTO `state` VALUES(1316, 85, 'Intibuca', '"Intibuc&#225;"', 'Y');
INSERT INTO `state` VALUES(1317, 85, 'Atlantida', '"Atl&#225;ntida"', 'Y');
INSERT INTO `state` VALUES(1318, 85, 'La Paz', 'La Paz', 'Y');
INSERT INTO `state` VALUES(1319, 85, 'Santa Barbara', '"Santa B&#225;rbara"', 'Y');
INSERT INTO `state` VALUES(1320, 85, 'Ocotepeque', 'Ocotepeque', 'Y');
INSERT INTO `state` VALUES(1321, 85, 'Gracias a Dios', 'Gracias a Dios', 'Y');
INSERT INTO `state` VALUES(1322, 85, 'Islas de la Bahia', '"Islas de la Bah&#237;a"', 'Y');
INSERT INTO `state` VALUES(1323, 85, 'Colon', '"Col&#243;n"', 'Y');
INSERT INTO `state` VALUES(1324, 85, 'Distrito Central', 'Distrito Central', 'Y');
INSERT INTO `state` VALUES(1325, 86, 'Fejer', '"Fej&#233;r"', 'Y');
INSERT INTO `state` VALUES(1326, 86, 'Jasz-Nagykun-Szolnok', '"J&#225;sz-Nagykun-Szolnok"', 'Y');
INSERT INTO `state` VALUES(1327, 86, 'Heves', 'Heves', 'Y');
INSERT INTO `state` VALUES(1328, 86, 'Borsod-Abauj-Zemplen', '"Borsod-Aba&#250;j-Zempl&#233;n"', 'Y');
INSERT INTO `state` VALUES(1329, 86, 'Pest', 'Pest', 'Y');
INSERT INTO `state` VALUES(1330, 86, 'Komarom-Esztergom', '"Kom&#225;rom-Esztergom"', 'Y');
INSERT INTO `state` VALUES(1331, 86, 'Somogy', 'Somogy', 'Y');
INSERT INTO `state` VALUES(1332, 86, 'Szabolcs-Szatmar-Bereg', '"Szabolcs-Szatm&#225;r-Bereg"', 'Y');
INSERT INTO `state` VALUES(1333, 86, 'Veszprem', '"Veszpr&#233;m"', 'Y');
INSERT INTO `state` VALUES(1334, 86, 'Bacs-Kiskun', '"B&#225;cs-Kiskun"', 'Y');
INSERT INTO `state` VALUES(1335, 86, 'Gyor-Moson-Sopron', '"Gy&#337;r-Moson-Sopron"', 'Y');
INSERT INTO `state` VALUES(1336, 86, 'Nograd', '"N&#243;gr&#225;d"', 'Y');
INSERT INTO `state` VALUES(1337, 86, 'Hajdu-Bihar', '"Hajd&#250;-Bihar"', 'Y');
INSERT INTO `state` VALUES(1338, 86, 'Tolna', 'Tolna', 'Y');
INSERT INTO `state` VALUES(1339, 86, 'Bekes', '"B&#233;k&#233;s"', 'Y');
INSERT INTO `state` VALUES(1340, 86, 'Zala', 'Zala', 'Y');
INSERT INTO `state` VALUES(1341, 86, 'Baranya', 'Baranya', 'Y');
INSERT INTO `state` VALUES(1342, 86, 'Budapest', 'Budapest', 'Y');
INSERT INTO `state` VALUES(1343, 86, 'Vas', 'Vas', 'Y');
INSERT INTO `state` VALUES(1344, 86, 'Csongrad', '"Csongr&#225;d"', 'Y');
INSERT INTO `state` VALUES(1345, 86, 'n.a.', 'n.a.', 'Y');
INSERT INTO `state` VALUES(1346, 87, 'Vesturland', 'Vesturland', 'Y');
INSERT INTO `state` VALUES(1347, 87, 'Norourland eystra', '"Nor&#240;urland eystra"', 'Y');
INSERT INTO `state` VALUES(1348, 87, 'HÃ¶fuÃ°borgarsvÃ¦Ã°i', '"H&#246;fu&#240;borgarsv&#230;&#240;i"', 'Y');
INSERT INTO `state` VALUES(1349, 87, 'Suourland', '"Su&#240;urland"', 'Y');
INSERT INTO `state` VALUES(1350, 87, 'Austurland', 'Austurland', 'Y');
INSERT INTO `state` VALUES(1351, 87, 'Vestfiroir', '"Vestfir&#240;ir"', 'Y');
INSERT INTO `state` VALUES(1352, 87, 'NorÃ°urland vestra', '"Nor&#240;urland vestra"', 'Y');
INSERT INTO `state` VALUES(1353, 87, 'Suournes', '"Su&#240;urnes"', 'Y');
INSERT INTO `state` VALUES(1354, 88, 'Maharashtra', 'Maharashtra', 'Y');
INSERT INTO `state` VALUES(1355, 88, 'Madhya Pradesh', 'Madhya Pradesh', 'Y');
INSERT INTO `state` VALUES(1356, 88, 'Tamil Nadu', 'Tamil Nadu', 'Y');
INSERT INTO `state` VALUES(1357, 88, 'Assam', 'Assam', 'Y');
INSERT INTO `state` VALUES(1358, 88, 'Uttar Pradesh', 'Uttar Pradesh', 'Y');
INSERT INTO `state` VALUES(1359, 88, 'Himachal Pradesh', 'Himachal Pradesh', 'Y');
INSERT INTO `state` VALUES(1360, 88, 'Arunachal Pradesh', 'Arunachal Pradesh', 'Y');
INSERT INTO `state` VALUES(1361, 88, 'Mizoram', 'Mizoram', 'Y');
INSERT INTO `state` VALUES(1362, 88, 'Andhra Pradesh', 'Andhra Pradesh', 'Y');
INSERT INTO `state` VALUES(1363, 88, 'Bangla', 'Bangla', 'Y');
INSERT INTO `state` VALUES(1364, 88, 'Goa', 'Goa', 'Y');
INSERT INTO `state` VALUES(1365, 88, 'Jharkhand', 'Jharkhand', 'Y');
INSERT INTO `state` VALUES(1366, 88, 'Rajasthan', 'Rajasthan', 'Y');
INSERT INTO `state` VALUES(1367, 88, 'Haryana', 'Haryana', 'Y');
INSERT INTO `state` VALUES(1368, 88, 'Karnataka', 'Karnataka', 'Y');
INSERT INTO `state` VALUES(1369, 88, 'Punjab', 'Punjab', 'Y');
INSERT INTO `state` VALUES(1370, 88, 'Bihar', 'Bihar', 'Y');
INSERT INTO `state` VALUES(1371, 88, 'Gujarat', 'Gujarat', 'Y');
INSERT INTO `state` VALUES(1372, 88, 'Uttaranchal', 'Uttaranchal', 'Y');
INSERT INTO `state` VALUES(1373, 88, 'Kerala', 'Kerala', 'Y');
INSERT INTO `state` VALUES(1374, 88, 'Meghalaya', 'Meghalaya', 'Y');
INSERT INTO `state` VALUES(1375, 88, 'Chhattisgarh', 'Chhattisgarh', 'Y');
INSERT INTO `state` VALUES(1376, 88, 'Jammu and Kashmir', 'Jammu and Kashmir', 'Y');
INSERT INTO `state` VALUES(1377, 88, 'Manipur', 'Manipur', 'Y');
INSERT INTO `state` VALUES(1378, 88, 'Dadra and Nagar Haveli', 'Dadra and Nagar Haveli', 'Y');
INSERT INTO `state` VALUES(1379, 88, 'Sikkim', 'Sikkim', 'Y');
INSERT INTO `state` VALUES(1380, 88, 'Delhi', 'Delhi', 'Y');
INSERT INTO `state` VALUES(1381, 88, 'Tripura', 'Tripura', 'Y');
INSERT INTO `state` VALUES(1382, 88, 'Orissa', 'Orissa', 'Y');
INSERT INTO `state` VALUES(1383, 88, 'Nagaland', 'Nagaland', 'Y');
INSERT INTO `state` VALUES(1384, 88, 'Pondicherry', 'Pondicherry', 'Y');
INSERT INTO `state` VALUES(1385, 89, 'Papua', 'Papua', 'Y');
INSERT INTO `state` VALUES(1386, 89, 'Jawa Tengah', 'Jawa Tengah', 'Y');
INSERT INTO `state` VALUES(1387, 89, 'Maluku', 'Maluku', 'Y');
INSERT INTO `state` VALUES(1388, 89, 'Jawa Timur', 'Jawa Timur', 'Y');
INSERT INTO `state` VALUES(1389, 89, 'Kalimantan Selatan', 'Kalimantan Selatan', 'Y');
INSERT INTO `state` VALUES(1390, 89, 'Jawa Barat', 'Jawa Barat', 'Y');
INSERT INTO `state` VALUES(1391, 89, 'Riau', 'Riau', 'Y');
INSERT INTO `state` VALUES(1392, 89, 'Kalimantan Timur', 'Kalimantan Timur', 'Y');
INSERT INTO `state` VALUES(1393, 89, 'Yogyakarta', 'Yogyakarta', 'Y');
INSERT INTO `state` VALUES(1394, 89, 'Aceh', 'Aceh', 'Y');
INSERT INTO `state` VALUES(1395, 89, 'Sumatera Utara', 'Sumatera Utara', 'Y');
INSERT INTO `state` VALUES(1396, 89, 'Lampung', 'Lampung', 'Y');
INSERT INTO `state` VALUES(1397, 89, 'Sulawesi Tengah', 'Sulawesi Tengah', 'Y');
INSERT INTO `state` VALUES(1398, 89, 'Riau Kepulauan', 'Riau Kepulauan', 'Y');
INSERT INTO `state` VALUES(1399, 89, 'Sumatera Selatan', 'Sumatera Selatan', 'Y');
INSERT INTO `state` VALUES(1400, 89, 'Sulawesi Tenggara', 'Sulawesi Tenggara', 'Y');
INSERT INTO `state` VALUES(1401, 89, 'Bengkulu', 'Bengkulu', 'Y');
INSERT INTO `state` VALUES(1402, 89, 'Nusa Tenggara Barat', 'Nusa Tenggara Barat', 'Y');
INSERT INTO `state` VALUES(1403, 89, 'Sulawesi Utara', 'Sulawesi Utara', 'Y');
INSERT INTO `state` VALUES(1404, 89, 'Sulawesi Selatan', 'Sulawesi Selatan', 'Y');
INSERT INTO `state` VALUES(1405, 89, 'Sumatera Barat', 'Sumatera Barat', 'Y');
INSERT INTO `state` VALUES(1406, 89, 'Banten', 'Banten', 'Y');
INSERT INTO `state` VALUES(1407, 89, 'Bali', 'Bali', 'Y');
INSERT INTO `state` VALUES(1408, 89, 'Nusa Tenggara Timur', 'Nusa Tenggara Timur', 'Y');
INSERT INTO `state` VALUES(1409, 89, 'Gorontalo', 'Gorontalo', 'Y');
INSERT INTO `state` VALUES(1410, 89, 'Jakarta', 'Jakarta', 'Y');
INSERT INTO `state` VALUES(1411, 89, 'Jambi', 'Jambi', 'Y');
INSERT INTO `state` VALUES(1412, 89, 'Kalimantan Tengah', 'Kalimantan Tengah', 'Y');
INSERT INTO `state` VALUES(1413, 89, 'Bangka-Belitung', 'Bangka-Belitung', 'Y');
INSERT INTO `state` VALUES(1414, 89, 'Kalimantan Barat', 'Kalimantan Barat', 'Y');
INSERT INTO `state` VALUES(1415, 89, 'Maluku Utara', 'Maluku Utara', 'Y');
INSERT INTO `state` VALUES(1416, 90, 'khuzestan', '"Kh&#363;zest&#257;n"', 'Y');
INSERT INTO `state` VALUES(1417, 90, 'Fars', '"F&#257;rs"', 'Y');
INSERT INTO `state` VALUES(1418, 90, 'Ilam', '"&#298;l&#257;m"', 'Y');
INSERT INTO `state` VALUES(1419, 90, 'Qazvin', '"Qazv&#299;n"', 'Y');
INSERT INTO `state` VALUES(1420, 90, 'Azarbayjan-e Khavari', '"Azarbayj&#257;n-e Khavari"', 'Y');
INSERT INTO `state` VALUES(1421, 90, 'Lorestan', '"Lorest&#257;n"', 'Y');
INSERT INTO `state` VALUES(1422, 90, 'Mazandaran', '"M&#257;zandar&#257;n"', 'Y');
INSERT INTO `state` VALUES(1423, 90, 'Zanjan', '"Zanj&#257;n"', 'Y');
INSERT INTO `state` VALUES(1424, 90, 'Golestan', '"Golest&#257;n"', 'Y');
INSERT INTO `state` VALUES(1425, 90, 'Markazi', '"Markaz&#299;"', 'Y');
INSERT INTO `state` VALUES(1426, 90, 'Ardabil', '"Ardab&#299;l"', 'Y');
INSERT INTO `state` VALUES(1427, 90, 'Yazd', 'Yazd', 'Y');
INSERT INTO `state` VALUES(1428, 90, 'Esfahan', '"E&#351;fah&#257;n"', 'Y');
INSERT INTO `state` VALUES(1429, 90, 'Hamadan', '"Hamad&#257;n"', 'Y');
INSERT INTO `state` VALUES(1430, 90, 'Gilan', '"G&#299;l&#257;n"', 'Y');
INSERT INTO `state` VALUES(1431, 90, 'Kerman', '"Kerm&#257;n"', 'Y');
INSERT INTO `state` VALUES(1432, 90, 'Hormozgan', '"Hormozg&#257;n"', 'Y');
INSERT INTO `state` VALUES(1433, 90, 'Bushehr', '"B&#363;shehr"', 'Y');
INSERT INTO `state` VALUES(1434, 90, 'Kordestan', '"Kordest&#257;n"', 'Y');
INSERT INTO `state` VALUES(1435, 90, 'Khorasan', '"Khor&#257;s&#257;n"', 'Y');
INSERT INTO `state` VALUES(1436, 90, 'Chaharmahal and Bakhtiari', '"Chah&#257;r Mah&#257;l-e Bakhtiari"', 'Y');
INSERT INTO `state` VALUES(1437, 90, 'Azarbayjan-E Bakhtari', '"Azarbayj&#257;n-e Bakhtari"', 'Y');
INSERT INTO `state` VALUES(1438, 90, 'Sistan-e Baluchestan', '"S&#299;st&#257;n-e Bal&#363;chest&#257;n"', 'Y');
INSERT INTO `state` VALUES(1439, 90, 'Tehran', '"Tehr&#257;n"', 'Y');
INSERT INTO `state` VALUES(1440, 90, 'Semnan', '"Semn&#257;n"', 'Y');
INSERT INTO `state` VALUES(1441, 90, 'Kohgiluyeh-e Boyerahmad', '"Kohg&#299;luyeh-e Boyerahmad"', 'Y');
INSERT INTO `state` VALUES(1442, 90, 'Kermanshah', '"Kerm&#257;nsh&#257;h"', 'Y');
INSERT INTO `state` VALUES(1443, 90, 'Qom', 'Qom', 'Y');
INSERT INTO `state` VALUES(1444, 91, 'al-Basrah', '"al-Ba&#351;rah"', 'Y');
INSERT INTO `state` VALUES(1445, 91, 'Al-Qadisiyah', '"al-Q&#257;dis&#299;yah"', 'Y');
INSERT INTO `state` VALUES(1446, 91, 'Maysan', 'Maysan', 'Y');
INSERT INTO `state` VALUES(1447, 91, 'Al Anbar', '"al-Anb&#257;r"', 'Y');
INSERT INTO `state` VALUES(1448, 91, 'At-Tamim', 'at-Ta<sup><small>c</small></sup>mim', 'Y');
INSERT INTO `state` VALUES(1449, 91, 'Wasit', '"W&#257;si&#355;"', 'Y');
INSERT INTO `state` VALUES(1450, 91, 'Baghdad', '"Ba&#289;d&#257;d"', 'Y');
INSERT INTO `state` VALUES(1451, 91, 'Salah ad Din', '"&#350;al&#257;&#293;-ad-D&#299;n"', 'Y');
INSERT INTO `state` VALUES(1452, 91, 'Diyala', '"Diyal&#257;"', 'Y');
INSERT INTO `state` VALUES(1453, 91, 'As Sulaymaniyah', '"as-Sulaym&#257;n&#299;yah"', 'Y');
INSERT INTO `state` VALUES(1454, 91, 'Irbil', '"Irb&#299;l"', 'Y');
INSERT INTO `state` VALUES(1455, 91, 'Dahuk', '"Dah&#363;k"', 'Y');
INSERT INTO `state` VALUES(1456, 91, 'Babil', '"B&#257;bil"', 'Y');
INSERT INTO `state` VALUES(1457, 91, 'Karbala', '"Karbal&#257;"', 'Y');
INSERT INTO `state` VALUES(1458, 91, 'an-Najaf', 'an-Najaf', 'Y');
INSERT INTO `state` VALUES(1459, 91, 'Ninawa', 'Ninawa', 'Y');
INSERT INTO `state` VALUES(1460, 91, 'Dhi Qar', '"<u>D</u>&#299; Q&#257;r"', 'Y');
INSERT INTO `state` VALUES(1461, 91, 'Al Muthanna', '"al-Mu<u>t</u>ann&#257;"', 'Y');
INSERT INTO `state` VALUES(1462, 92, 'Limerick', 'Limerick', 'Y');
INSERT INTO `state` VALUES(1463, 92, 'Laois', 'Laois', 'Y');
INSERT INTO `state` VALUES(1464, 92, 'Louth', 'Louth', 'Y');
INSERT INTO `state` VALUES(1465, 92, 'Wicklow', 'Wicklow', 'Y');
INSERT INTO `state` VALUES(1466, 92, 'Meath', 'Meath', 'Y');
INSERT INTO `state` VALUES(1467, 92, 'Galway', 'Galway', 'Y');
INSERT INTO `state` VALUES(1468, 92, 'Westmeath', 'Westmeath', 'Y');
INSERT INTO `state` VALUES(1469, 92, 'Kildare', 'Kildare', 'Y');
INSERT INTO `state` VALUES(1470, 92, 'Carlow', 'Carlow', 'Y');
INSERT INTO `state` VALUES(1471, 92, 'Cavan', 'Cavan', 'Y');
INSERT INTO `state` VALUES(1472, 92, 'Dublin', 'Dublin', 'Y');
INSERT INTO `state` VALUES(1473, 92, 'Roscommon', 'Roscommon', 'Y');
INSERT INTO `state` VALUES(1474, 92, 'Mayo', 'Mayo', 'Y');
INSERT INTO `state` VALUES(1475, 92, 'Donegal', 'Donegal', 'Y');
INSERT INTO `state` VALUES(1476, 92, 'Kerry', 'Kerry', 'Y');
INSERT INTO `state` VALUES(1477, 92, 'Offaly', 'Offaly', 'Y');
INSERT INTO `state` VALUES(1478, 92, 'Cork', 'Cork', 'Y');
INSERT INTO `state` VALUES(1479, 92, 'Tipperary South Riding', 'Tipperary South Riding', 'Y');
INSERT INTO `state` VALUES(1480, 92, 'Kilkenny', 'Kilkenny', 'Y');
INSERT INTO `state` VALUES(1481, 92, 'Monaghan', 'Monaghan', 'Y');
INSERT INTO `state` VALUES(1482, 92, 'Leitrim', 'Leitrim', 'Y');
INSERT INTO `state` VALUES(1483, 93, 'Veneto', 'Veneto', 'Y');
INSERT INTO `state` VALUES(1484, 93, 'Lombardia', 'Lombardia', 'Y');
INSERT INTO `state` VALUES(1485, 93, 'Campania', 'Campania', 'Y');
INSERT INTO `state` VALUES(1486, 93, 'Sicilia', 'Sicilia', 'Y');
INSERT INTO `state` VALUES(1487, 93, 'Puglia', 'Puglia', 'Y');
INSERT INTO `state` VALUES(1488, 93, 'Piemonte', 'Piemonte', 'Y');
INSERT INTO `state` VALUES(1489, 93, 'Calabria', 'Calabria', 'Y');
INSERT INTO `state` VALUES(1490, 93, 'Toscana', 'Toscana', 'Y');
INSERT INTO `state` VALUES(1491, 93, 'Liguria', 'Liguria', 'Y');
INSERT INTO `state` VALUES(1492, 93, 'Lazio', 'Lazio', 'Y');
INSERT INTO `state` VALUES(1493, 93, 'Abruzzo', 'Abruzzo', 'Y');
INSERT INTO `state` VALUES(1494, 93, 'Emilia-Romagna', 'Emilia-Romagna', 'Y');
INSERT INTO `state` VALUES(1495, 93, 'Sardegna', 'Sardegna', 'Y');
INSERT INTO `state` VALUES(1496, 93, 'Umbria', 'Umbria', 'Y');
INSERT INTO `state` VALUES(1497, 93, 'Marche', 'Marche', 'Y');
INSERT INTO `state` VALUES(1498, 93, 'Trentino-Alto Adige', 'Trentino-Alto Adige', 'Y');
INSERT INTO `state` VALUES(1499, 93, 'Friuli-Venezia Giulia', 'Friuli-Venezia Giulia', 'Y');
INSERT INTO `state` VALUES(1500, 93, 'Basilicata', 'Basilicata', 'Y');
INSERT INTO `state` VALUES(1501, 93, 'Molise', 'Molise', 'Y');
INSERT INTO `state` VALUES(1502, 94, 'Moyen-Comoe', '"Moyen-Como&#233;"', 'Y');
INSERT INTO `state` VALUES(1503, 94, 'Lagunes', 'Lagunes', 'Y');
INSERT INTO `state` VALUES(1504, 94, 'Sud-Comoe', '"Sud-Como&#233;"', 'Y');
INSERT INTO `state` VALUES(1505, 94, 'Agneby', '"Agn&#233;by"', 'Y');
INSERT INTO `state` VALUES(1506, 94, 'Denguele', '"Dengu&#233;l&#233;"', 'Y');
INSERT INTO `state` VALUES(1507, 94, 'Dix-huit Montagnes', 'Dix-huit Montagnes', 'Y');
INSERT INTO `state` VALUES(1508, 94, 'Vallee du Bandama', '"Vall&#233;e du Bandama"', 'Y');
INSERT INTO `state` VALUES(1509, 94, 'Zanzan', 'Zanzan', 'Y');
INSERT INTO `state` VALUES(1510, 94, 'Marahoue', '"Marahou&#233;"', 'Y');
INSERT INTO `state` VALUES(1511, 94, 'Savanes', 'Savanes', 'Y');
INSERT INTO `state` VALUES(1512, 94, 'Haut-Sassandra', 'Haut-Sassandra', 'Y');
INSERT INTO `state` VALUES(1513, 94, 'Sud-Bandama', 'Sud-Bandama', 'Y');
INSERT INTO `state` VALUES(1514, 94, 'Moyen-Cavally', 'Moyen-Cavally', 'Y');
INSERT INTO `state` VALUES(1515, 94, 'Fromager', 'Fromager', 'Y');
INSERT INTO `state` VALUES(1516, 94, 'Worodougou', 'Worodougou', 'Y');
INSERT INTO `state` VALUES(1517, 94, 'Lacs', 'Lacs', 'Y');
INSERT INTO `state` VALUES(1518, 94, 'Sassandra', 'Sassandra', 'Y');
INSERT INTO `state` VALUES(1519, 94, 'Bafing', 'Bafing', 'Y');
INSERT INTO `state` VALUES(1520, 95, 'Saint Mary', 'Saint Mary', 'Y');
INSERT INTO `state` VALUES(1521, 95, 'Trelawney', 'Trelawney', 'Y');
INSERT INTO `state` VALUES(1522, 95, 'Saint James', 'Saint James', 'Y');
INSERT INTO `state` VALUES(1523, 95, 'Saint Ann', 'Saint Ann', 'Y');
INSERT INTO `state` VALUES(1524, 95, 'Saint Elizabeth', 'Saint Elizabeth', 'Y');
INSERT INTO `state` VALUES(1525, 95, 'Saint Andrews', 'Saint Andrews', 'Y');
INSERT INTO `state` VALUES(1526, 95, 'Kingston', 'Kingston', 'Y');
INSERT INTO `state` VALUES(1527, 95, 'Hanover', 'Hanover', 'Y');
INSERT INTO `state` VALUES(1528, 95, 'Manchester', 'Manchester', 'Y');
INSERT INTO `state` VALUES(1529, 95, 'Clarendon', 'Clarendon', 'Y');
INSERT INTO `state` VALUES(1530, 95, 'Saint Thomas', 'Saint Thomas', 'Y');
INSERT INTO `state` VALUES(1531, 95, 'Portland', 'Portland', 'Y');
INSERT INTO `state` VALUES(1532, 95, 'Saint Catherine', 'Saint Catherine', 'Y');
INSERT INTO `state` VALUES(1533, 95, 'Westmoreland', 'Westmoreland', 'Y');
INSERT INTO `state` VALUES(1534, 177, 'Hokkaido', 'Hokkaido', 'Y');
INSERT INTO `state` VALUES(1535, 177, 'Chiba', 'Chiba', 'Y');
INSERT INTO `state` VALUES(1536, 177, 'Saitama', 'Saitama', 'Y');
INSERT INTO `state` VALUES(1537, 177, 'Mie', 'Mie', 'Y');
INSERT INTO `state` VALUES(1538, 177, 'Aichi', 'Aichi', 'Y');
INSERT INTO `state` VALUES(1539, 177, 'Kanagawa', 'Kanagawa', 'Y');
INSERT INTO `state` VALUES(1540, 177, 'Hyogo', '"Hy&#333;go"', 'Y');
INSERT INTO `state` VALUES(1541, 177, 'Kagoshima', 'Kagoshima', 'Y');
INSERT INTO `state` VALUES(1542, 177, 'Fukushima', 'Fukushima', 'Y');
INSERT INTO `state` VALUES(1543, 177, 'Tokushima', 'Tokushima', 'Y');
INSERT INTO `state` VALUES(1544, 177, 'Kochi', '"K&#333;chi"', 'Y');
INSERT INTO `state` VALUES(1545, 177, 'Tokyo', '"T&#333;ky&#333;"', 'Y');
INSERT INTO `state` VALUES(1546, 177, 'Akita', 'Akita', 'Y');
INSERT INTO `state` VALUES(1547, 177, 'Fukuoka', 'Fukuoka', 'Y');
INSERT INTO `state` VALUES(1548, 177, 'Ibaraki', 'Ibaraki', 'Y');
INSERT INTO `state` VALUES(1549, 177, 'Gumma', 'Gumma', 'Y');
INSERT INTO `state` VALUES(1550, 177, 'Aomori', 'Aomori', 'Y');
INSERT INTO `state` VALUES(1551, 177, 'Niigata', 'Niigata', 'Y');
INSERT INTO `state` VALUES(1552, 177, 'Kumamoto', 'Kumamoto', 'Y');
INSERT INTO `state` VALUES(1553, 177, 'Wakayama', 'Wakayama', 'Y');
INSERT INTO `state` VALUES(1554, 177, 'Shizuoka', 'Shizuoka', 'Y');
INSERT INTO `state` VALUES(1555, 177, 'Tochigi', 'Tochigi', 'Y');
INSERT INTO `state` VALUES(1556, 177, 'Kyoto', '"Ky&#333;to"', 'Y');
INSERT INTO `state` VALUES(1557, 177, 'Oita', '"&#332;ita"', 'Y');
INSERT INTO `state` VALUES(1558, 177, 'Okayama', 'Okayama', 'Y');
INSERT INTO `state` VALUES(1559, 177, 'Okinawa', 'Okinawa', 'Y');
INSERT INTO `state` VALUES(1560, 177, 'Nagano', 'Nagano', 'Y');
INSERT INTO `state` VALUES(1561, 177, 'Iwate', 'Iwate', 'Y');
INSERT INTO `state` VALUES(1562, 177, 'Osaka', '"&#332;saka"', 'Y');
INSERT INTO `state` VALUES(1563, 177, 'Miyazaki', 'Miyazaki', 'Y');
INSERT INTO `state` VALUES(1564, 177, 'Gifu', 'Gifu', 'Y');
INSERT INTO `state` VALUES(1565, 177, 'Yamanashi', 'Yamanashi', 'Y');
INSERT INTO `state` VALUES(1566, 177, 'Hiroshima', 'Hiroshima', 'Y');
INSERT INTO `state` VALUES(1567, 177, 'Nagasaki', 'Nagasaki', 'Y');
INSERT INTO `state` VALUES(1568, 177, 'Fukui', 'Fukui', 'Y');
INSERT INTO `state` VALUES(1569, 177, 'Toyama', 'Toyama', 'Y');
INSERT INTO `state` VALUES(1570, 177, 'Miyagi', 'Miyagi', 'Y');
INSERT INTO `state` VALUES(1571, 177, 'Nara', 'Nara', 'Y');
INSERT INTO `state` VALUES(1572, 177, 'Shimane', 'Shimane', 'Y');
INSERT INTO `state` VALUES(1573, 177, 'Yamaguchi', 'Yamaguchi', 'Y');
INSERT INTO `state` VALUES(1574, 177, 'Ishikawa', 'Ishikawa', 'Y');
INSERT INTO `state` VALUES(1575, 177, 'Yamagata', 'Yamagata', 'Y');
INSERT INTO `state` VALUES(1576, 177, 'Shiga', 'Shiga', 'Y');
INSERT INTO `state` VALUES(1577, 177, 'Ehime', 'Ehime', 'Y');
INSERT INTO `state` VALUES(1578, 177, 'Saga', 'Saga', 'Y');
INSERT INTO `state` VALUES(1579, 177, 'Kagawa', 'Kagawa', 'Y');
INSERT INTO `state` VALUES(1580, 177, 'Tottori', 'Tottori', 'Y');
INSERT INTO `state` VALUES(1581, 97, 'Ajlun', '"<sup><small>c</small></sup>Ajl&#363;n"', 'Y');
INSERT INTO `state` VALUES(1582, 97, 'Amman', '"<sup><small>c</small></sup>Amm&#257;n"', 'Y');
INSERT INTO `state` VALUES(1583, 97, 'al-Karak', 'al-Karak', 'Y');
INSERT INTO `state` VALUES(1584, 97, 'Irbid', 'Irbid', 'Y');
INSERT INTO `state` VALUES(1585, 97, 'Al \\''Aqabah', 'al-<sup><small>c</small></sup>Aqabah', 'Y');
INSERT INTO `state` VALUES(1586, 97, 'at-Tafilah', '"a&#355;-&#354;af&#299;lah"', 'Y');
INSERT INTO `state` VALUES(1587, 97, 'al-Mafraq', 'al-Mafraq', 'Y');
INSERT INTO `state` VALUES(1588, 97, 'Jarash', '"Jara&#353;"', 'Y');
INSERT INTO `state` VALUES(1589, 97, 'MaÂ´Ã¢n', '"Ma<sup><small>c</small></sup>&#257;n"', 'Y');
INSERT INTO `state` VALUES(1590, 97, 'Madaba', '"M&#257;dab&#257;"', 'Y');
INSERT INTO `state` VALUES(1591, 98, 'Karagandi', '"&#310;aragand&#305;"', 'Y');
INSERT INTO `state` VALUES(1592, 98, 'Ontustik Kazakstan', '"O&#326;t&#252;stik &#310;aza&#311;stan"', 'Y');
INSERT INTO `state` VALUES(1593, 98, 'AkmeÃ§et', '"Akme&#231;et"', 'Y');
INSERT INTO `state` VALUES(1594, 98, 'Batis Kazakstan', '"Bat&#305;s &#310;aza&#311;stan"', 'Y');
INSERT INTO `state` VALUES(1595, 98, 'Akmola', '"A&#311;mola"', 'Y');
INSERT INTO `state` VALUES(1596, 98, 'Mankistau', '"Ma&#326;&#311;&#305;stau"', 'Y');
INSERT INTO `state` VALUES(1597, 98, 'Aktobe', '"A&#311;t&#246;be"', 'Y');
INSERT INTO `state` VALUES(1598, 98, 'Almati', '"Almat&#305;"', 'Y');
INSERT INTO `state` VALUES(1599, 98, 'Kostanay', '"&#310;ostanay"', 'Y');
INSERT INTO `state` VALUES(1600, 98, 'Atirau', '"At&#305;rau"', 'Y');
INSERT INTO `state` VALUES(1601, 98, 'Sigis Kazakstan', '"&#350;&#305;g&#305;s &#310;aza&#311;stan"', 'Y');
INSERT INTO `state` VALUES(1602, 98, 'Soltustik Kazakstan', '"Solt&#252;sti&#311; &#310;azakstan"', 'Y');
INSERT INTO `state` VALUES(1603, 98, 'Taraz', 'Taraz', 'Y');
INSERT INTO `state` VALUES(1604, 98, 'Pavlodar', 'Pavlodar', 'Y');
INSERT INTO `state` VALUES(1605, 99, 'Eastern', 'Eastern', 'Y');
INSERT INTO `state` VALUES(1606, 99, 'Rift Valley', 'Rift Valley', 'Y');
INSERT INTO `state` VALUES(1607, 99, 'Western', 'Western', 'Y');
INSERT INTO `state` VALUES(1608, 99, 'Coast', 'Coast', 'Y');
INSERT INTO `state` VALUES(1609, 99, 'North Eastern', 'North Eastern', 'Y');
INSERT INTO `state` VALUES(1610, 99, 'Central', 'Central', 'Y');
INSERT INTO `state` VALUES(1611, 99, 'Nyanza', 'Nyanza', 'Y');
INSERT INTO `state` VALUES(1612, 99, 'Nairobi', 'Nairobi', 'Y');
INSERT INTO `state` VALUES(1613, 100, 'Tamana', 'Tamana', 'Y');
INSERT INTO `state` VALUES(1614, 100, 'Tarawa South', 'Tarawa South', 'Y');
INSERT INTO `state` VALUES(1615, 100, 'Abemana', 'Abemana', 'Y');
INSERT INTO `state` VALUES(1616, 100, 'Tarawa North', 'Tarawa North', 'Y');
INSERT INTO `state` VALUES(1617, 100, 'Tabiteuea South', 'Tabiteuea South', 'Y');
INSERT INTO `state` VALUES(1618, 100, 'Butaritari', 'Butaritari', 'Y');
INSERT INTO `state` VALUES(1619, 100, 'Onotoa', 'Onotoa', 'Y');
INSERT INTO `state` VALUES(1620, 100, 'Kiritimati', 'Kiritimati', 'Y');
INSERT INTO `state` VALUES(1621, 100, 'Makin', 'Makin', 'Y');
INSERT INTO `state` VALUES(1622, 100, 'Tabuaeran', 'Tabuaeran', 'Y');
INSERT INTO `state` VALUES(1623, 100, 'Banaba', 'Banaba', 'Y');
INSERT INTO `state` VALUES(1624, 100, 'Phoenix Islands', 'Phoenix Islands', 'Y');
INSERT INTO `state` VALUES(1625, 100, 'Marakei', 'Marakei', 'Y');
INSERT INTO `state` VALUES(1626, 100, 'Arorae', 'Arorae', 'Y');
INSERT INTO `state` VALUES(1627, 100, 'Nikunau', 'Nikunau', 'Y');
INSERT INTO `state` VALUES(1628, 100, 'Maiana', 'Maiana', 'Y');
INSERT INTO `state` VALUES(1629, 100, 'Kuria', 'Kuria', 'Y');
INSERT INTO `state` VALUES(1630, 100, 'Beru', 'Beru', 'Y');
INSERT INTO `state` VALUES(1631, 100, 'Abaiang', 'Abaiang', 'Y');
INSERT INTO `state` VALUES(1632, 100, 'Aranuka', 'Aranuka', 'Y');
INSERT INTO `state` VALUES(1633, 100, 'Nonouti', 'Nonouti', 'Y');
INSERT INTO `state` VALUES(1634, 100, 'Tabiteuea North', 'Tabiteuea North', 'Y');
INSERT INTO `state` VALUES(1635, 100, 'Teraina', 'Teraina', 'Y');
INSERT INTO `state` VALUES(1636, 101, 'Hamgyeongbukto', '"Hamgy&#335;ngbukto"', 'Y');
INSERT INTO `state` VALUES(1637, 101, 'Hwanghaenamdo', 'Hwanghaenamdo', 'Y');
INSERT INTO `state` VALUES(1638, 101, 'Hamgyeongnamdo', '"Hamgy&#335;ngnamdo"', 'Y');
INSERT INTO `state` VALUES(1639, 101, 'Yanggang', 'Yanggang', 'Y');
INSERT INTO `state` VALUES(1640, 101, 'Kaeseong', '"Kaes&#335;ng"', 'Y');
INSERT INTO `state` VALUES(1641, 101, 'Chagangdo', 'Chagangdo', 'Y');
INSERT INTO `state` VALUES(1642, 101, 'Nampo', 'Nampo', 'Y');
INSERT INTO `state` VALUES(1643, 101, 'Pyeongannamdo', '"Py&#335;ngannamdo"', 'Y');
INSERT INTO `state` VALUES(1644, 101, 'Pyeongyang', '"Py&#335;ngyang"', 'Y');
INSERT INTO `state` VALUES(1645, 101, 'Hwanghaebukto', 'Hwanghaebukto', 'Y');
INSERT INTO `state` VALUES(1646, 101, 'Pyeonganbukto', '"Py&#335;nganbukto"', 'Y');
INSERT INTO `state` VALUES(1647, 101, 'Kangweon', '"Kangw&#335;n"', 'Y');
INSERT INTO `state` VALUES(1648, 102, 'Cheju', 'Cheju', 'Y');
INSERT INTO `state` VALUES(1649, 102, 'Kyeongsangbuk', '"Ky&#335;ngsangbuk"', 'Y');
INSERT INTO `state` VALUES(1650, 102, 'Kyeonggi', '"Ky&#335;nggi"', 'Y');
INSERT INTO `state` VALUES(1651, 102, 'Chungcheongnam', '"Chungch&#335;ngnam"', 'Y');
INSERT INTO `state` VALUES(1652, 102, 'Kyeongsangnam', '"Ky&#335;ngsangnam"', 'Y');
INSERT INTO `state` VALUES(1653, 102, 'Chungcheongbuk', '"Chungch&#335;ngbuk"', 'Y');
INSERT INTO `state` VALUES(1654, 102, 'n.a.', 'n.a.', 'Y');
INSERT INTO `state` VALUES(1655, 102, 'Chollabuk', 'Chollabuk', 'Y');
INSERT INTO `state` VALUES(1656, 102, 'Kangweon', '"Kangw&#335;n"', 'Y');
INSERT INTO `state` VALUES(1657, 102, 'Chollanam', 'Chollanam', 'Y');
INSERT INTO `state` VALUES(1658, 102, 'Taegu', 'Taegu', 'Y');
INSERT INTO `state` VALUES(1659, 102, 'Incheon', '"Inch&#335;n"', 'Y');
INSERT INTO `state` VALUES(1660, 102, 'Pusan', 'Pusan', 'Y');
INSERT INTO `state` VALUES(1661, 102, 'Kwangju', 'Kwangju', 'Y');
INSERT INTO `state` VALUES(1662, 102, 'Ulsan', 'Ulsan', 'Y');
INSERT INTO `state` VALUES(1663, 102, 'Seoul', '"S&#335;ul"', 'Y');
INSERT INTO `state` VALUES(1664, 102, 'Taejeon', '"Taej&#335;n"', 'Y');
INSERT INTO `state` VALUES(1665, 103, 'Al Farwaniyah', '"al-F&#257;rwan&#299;yah"', 'Y');
INSERT INTO `state` VALUES(1666, 103, 'Al Ahmadi', '"al-A&#293;mad&#299;"', 'Y');
INSERT INTO `state` VALUES(1667, 103, 'al-Kuwayt', 'al-Kuwayt', 'Y');
INSERT INTO `state` VALUES(1668, 103, 'Al-Jahra', '"al-Jahr&#257;"', 'Y');
INSERT INTO `state` VALUES(1669, 103, 'Hawalli', '"Hawall&#299;"', 'Y');
INSERT INTO `state` VALUES(1670, 104, 'Issyk-Kul', 'Issyk-Kul', 'Y');
INSERT INTO `state` VALUES(1671, 104, 'Chui', 'Chui', 'Y');
INSERT INTO `state` VALUES(1672, 104, 'Jalal-Abad', 'Jalal-Abad', 'Y');
INSERT INTO `state` VALUES(1673, 104, 'Naryn', 'Naryn', 'Y');
INSERT INTO `state` VALUES(1674, 104, 'n.a.', 'n.a.', 'Y');
INSERT INTO `state` VALUES(1675, 104, 'Batken', 'Batken', 'Y');
INSERT INTO `state` VALUES(1676, 104, 'Bishkek', 'Bishkek', 'Y');
INSERT INTO `state` VALUES(1677, 104, 'Talas', 'Talas', 'Y');
INSERT INTO `state` VALUES(1678, 104, 'Osh', 'Osh', 'Y');
INSERT INTO `state` VALUES(1679, 105, 'Luang Prabang', 'Luang Prabang', 'Y');
INSERT INTO `state` VALUES(1680, 105, 'Oudomxay', 'Oudomxay', 'Y');
INSERT INTO `state` VALUES(1681, 105, 'Champasak', 'Champasak', 'Y');
INSERT INTO `state` VALUES(1682, 105, 'Bokeo', 'Bokeo', 'Y');
INSERT INTO `state` VALUES(1683, 105, 'Luang Nam Tha', 'Luang Nam Tha', 'Y');
INSERT INTO `state` VALUES(1684, 105, 'Viangchan Province', 'Viangchan Province', 'Y');
INSERT INTO `state` VALUES(1685, 105, 'Bolikhamsay', 'Bolikhamsay', 'Y');
INSERT INTO `state` VALUES(1686, 105, 'Xiang Khuang', 'Xiang Khuang', 'Y');
INSERT INTO `state` VALUES(1687, 105, 'Phongsaly', 'Phongsaly', 'Y');
INSERT INTO `state` VALUES(1688, 105, 'Attopu', 'Attopu', 'Y');
INSERT INTO `state` VALUES(1689, 105, 'Saravan', 'Saravan', 'Y');
INSERT INTO `state` VALUES(1690, 105, 'Savannakhet', 'Savannakhet', 'Y');
INSERT INTO `state` VALUES(1691, 105, 'Sekong', 'Sekong', 'Y');
INSERT INTO `state` VALUES(1692, 105, 'Khammouane', 'Khammouane', 'Y');
INSERT INTO `state` VALUES(1693, 105, 'Viangchan Prefecture', 'Viangchan Prefecture', 'Y');
INSERT INTO `state` VALUES(1694, 105, 'Xaignabury', 'Xaignabury', 'Y');
INSERT INTO `state` VALUES(1695, 105, 'Houaphanh', 'Houaphanh', 'Y');
INSERT INTO `state` VALUES(1696, 106, 'Limbazhu', '"Limba&#382;u"', 'Y');
INSERT INTO `state` VALUES(1697, 106, 'Aizkraukles', 'Aizkraukles', 'Y');
INSERT INTO `state` VALUES(1698, 106, 'Liepajas', '"Liep&#257;jas"', 'Y');
INSERT INTO `state` VALUES(1699, 106, 'Jekabspils', '"J&#275;kabspils"', 'Y');
INSERT INTO `state` VALUES(1700, 106, 'Aluksnes', '"Al&#363;ksnes"', 'Y');
INSERT INTO `state` VALUES(1701, 106, 'Dobeles', '"D&#333;beles"', 'Y');
INSERT INTO `state` VALUES(1702, 106, 'Rigas', '"R&#299;gas"', 'Y');
INSERT INTO `state` VALUES(1703, 106, 'Balvu', 'Balvu', 'Y');
INSERT INTO `state` VALUES(1704, 106, 'Bauskas', 'Bauskas', 'Y');
INSERT INTO `state` VALUES(1705, 106, 'Saldus', 'Saldus', 'Y');
INSERT INTO `state` VALUES(1706, 106, 'Cesu', '"C&#275;su"', 'Y');
INSERT INTO `state` VALUES(1707, 106, 'Madonas', 'Madonas', 'Y');
INSERT INTO `state` VALUES(1708, 106, 'Kraslavas', '"Kr&#257;slavas"', 'Y');
INSERT INTO `state` VALUES(1709, 106, 'Daugavpils City', 'Daugavpils City', 'Y');
INSERT INTO `state` VALUES(1710, 106, 'Gulbenes', 'Gulbenes', 'Y');
INSERT INTO `state` VALUES(1711, 106, 'n.a.', 'n.a.', 'Y');
INSERT INTO `state` VALUES(1712, 106, 'Daugavpils', 'Daugavpils', 'Y');
INSERT INTO `state` VALUES(1713, 106, 'Jelgava', 'Jelgava', 'Y');
INSERT INTO `state` VALUES(1714, 106, 'Jurmala City', '"J&#363;rmala City"', 'Y');
INSERT INTO `state` VALUES(1715, 106, 'Jelgavas', 'Jelgavas', 'Y');
INSERT INTO `state` VALUES(1716, 106, 'Tukuma', 'Tukuma', 'Y');
INSERT INTO `state` VALUES(1717, 106, 'Ludzas', 'Ludzas', 'Y');
INSERT INTO `state` VALUES(1718, 106, 'Ogres', 'Ogres', 'Y');
INSERT INTO `state` VALUES(1719, 106, 'Kuldigas', 'Kuldigas', 'Y');
INSERT INTO `state` VALUES(1720, 106, 'Liepaja', '"Liep&#257;ja"', 'Y');
INSERT INTO `state` VALUES(1721, 106, 'Preilu', '"Prei&#316;u"', 'Y');
INSERT INTO `state` VALUES(1722, 106, 'Valmieras', 'Valmieras', 'Y');
INSERT INTO `state` VALUES(1723, 106, 'Ventspils', 'Ventspils', 'Y');
INSERT INTO `state` VALUES(1724, 106, 'Rezekne', '"R&#275;zekne"', 'Y');
INSERT INTO `state` VALUES(1725, 106, 'Riga', '"R&#299;ga"', 'Y');
INSERT INTO `state` VALUES(1726, 106, 'Talsu', 'Talsu', 'Y');
INSERT INTO `state` VALUES(1727, 106, 'Valkas', 'Valkas', 'Y');
INSERT INTO `state` VALUES(1728, 106, 'Ventspils City', 'Ventspils City', 'Y');
INSERT INTO `state` VALUES(1729, 106, 'Rezeknes', '"R&#275;zeknes"', 'Y');
INSERT INTO `state` VALUES(1730, 107, 'Jabal Lubnan', 'Jabal Lubnan', 'Y');
INSERT INTO `state` VALUES(1731, 107, 'al-Biqa', 'al-Biqa', 'Y');
INSERT INTO `state` VALUES(1732, 107, 'ash-Shamal', '"a&#353;-&#352;amal"', 'Y');
INSERT INTO `state` VALUES(1733, 107, 'Bayrut', '"Bayr&#363;t"', 'Y');
INSERT INTO `state` VALUES(1734, 107, 'al-Janub', 'al-Janub', 'Y');
INSERT INTO `state` VALUES(1735, 107, 'an-Nabatiyah', 'an-Nabatiyah', 'Y');
INSERT INTO `state` VALUES(1736, 108, 'Butha-Buthe', 'Butha-Buthe', 'Y');
INSERT INTO `state` VALUES(1737, 108, 'Leribe', 'Leribe', 'Y');
INSERT INTO `state` VALUES(1738, 108, 'Mafeteng', 'Mafeteng', 'Y');
INSERT INTO `state` VALUES(1739, 108, 'Maseru', 'Maseru', 'Y');
INSERT INTO `state` VALUES(1740, 108, 'Mokhotlong', 'Mokhotlong', 'Y');
INSERT INTO `state` VALUES(1741, 108, 'Quthing', 'Quthing', 'Y');
INSERT INTO `state` VALUES(1742, 108, 'Berea', 'Berea', 'Y');
INSERT INTO `state` VALUES(1743, 108, 'Thaba-Tseka', 'Thaba-Tseka', 'Y');
INSERT INTO `state` VALUES(1744, 109, 'Maryland and Grand Kru', 'Maryland and Grand Kru', 'Y');
INSERT INTO `state` VALUES(1745, 109, 'Montserrado', 'Montserrado', 'Y');
INSERT INTO `state` VALUES(1746, 109, 'Grand Bassa', 'Grand Bassa', 'Y');
INSERT INTO `state` VALUES(1747, 109, 'Nimba', 'Nimba', 'Y');
INSERT INTO `state` VALUES(1748, 109, 'Bong', 'Bong', 'Y');
INSERT INTO `state` VALUES(1749, 109, 'Sinoe', 'Sinoe', 'Y');
INSERT INTO `state` VALUES(1750, 109, 'Margibi', 'Margibi', 'Y');
INSERT INTO `state` VALUES(1751, 109, 'Rivercess', 'Rivercess', 'Y');
INSERT INTO `state` VALUES(1752, 109, 'Grand Cape Mount', 'Grand Cape Mount', 'Y');
INSERT INTO `state` VALUES(1753, 109, 'n.a.', 'n.a.', 'Y');
INSERT INTO `state` VALUES(1754, 109, 'Bomi', 'Bomi', 'Y');
INSERT INTO `state` VALUES(1755, 109, 'Loffa', 'Loffa', 'Y');
INSERT INTO `state` VALUES(1756, 109, 'Grand Gedeh', 'Grand Gedeh', 'Y');
INSERT INTO `state` VALUES(1757, 110, 'Al Fatih', '"al-F&#257;t&#299;&#293;"', 'Y');
INSERT INTO `state` VALUES(1758, 110, 'Ajdabiya', '"Ajd&#257;biy&#257;"', 'Y');
INSERT INTO `state` VALUES(1759, 110, 'Awbari', '"Awb&#257;r&#299;"', 'Y');
INSERT INTO `state` VALUES(1760, 110, 'Al Aziziyah', '"al-<sup><small>c</small></sup>Az&#299;z&#299;yah"', 'Y');
INSERT INTO `state` VALUES(1761, 110, 'Banghazi', '"Ban&#289;&#257;zi"', 'Y');
INSERT INTO `state` VALUES(1762, 110, 'Sawfajjin', 'Sawfajjin', 'Y');
INSERT INTO `state` VALUES(1763, 110, 'Tubruq', '"&#354;ubruq"', 'Y');
INSERT INTO `state` VALUES(1764, 110, 'al-Jabal al Akhdar', '"al-Jabal al A&#295;d&#808;ar"', 'Y');
INSERT INTO `state` VALUES(1765, 110, 'Darnah', 'Darnah', 'Y');
INSERT INTO `state` VALUES(1766, 110, 'Ghadamis', '"&#288;ad&#257;mis"', 'Y');
INSERT INTO `state` VALUES(1767, 110, 'Gharyan', '"&#288;ary&#257;n"', 'Y');
INSERT INTO `state` VALUES(1768, 110, 'al-Khums', '"al-&#294;ums"', 'Y');
INSERT INTO `state` VALUES(1769, 110, 'al-Kufrah', 'al-Kufrah', 'Y');
INSERT INTO `state` VALUES(1770, 110, 'Misratah', '"Mi&#351;r&#257;tah"', 'Y');
INSERT INTO `state` VALUES(1771, 110, 'Murzuq', '"Murz&#363;q"', 'Y');
INSERT INTO `state` VALUES(1772, 110, 'Sabha', '"Sabh&#257;"', 'Y');
INSERT INTO `state` VALUES(1773, 110, 'An Nuqat al Khams', '"an-Nuq&#257;t al-&#294;ams"', 'Y');
INSERT INTO `state` VALUES(1774, 110, 'Surt', 'Surt', 'Y');
INSERT INTO `state` VALUES(1775, 110, 'Tarabulus', '"Tar&#257;bulus"', 'Y');
INSERT INTO `state` VALUES(1776, 110, 'Tarhunah', '"Tarh&#363;nah"', 'Y');
INSERT INTO `state` VALUES(1777, 110, 'al-Jufrah', 'al-Jufrah', 'Y');
INSERT INTO `state` VALUES(1778, 110, 'Yafran', 'Yafran', 'Y');
INSERT INTO `state` VALUES(1779, 110, 'az-Zawiyah', '"az-Z&#257;wiyah"', 'Y');
INSERT INTO `state` VALUES(1780, 110, 'Zlitan', '"Zl&#299;&#355;an"', 'Y');
INSERT INTO `state` VALUES(1781, 111, 'Balzers', 'Balzers', 'Y');
INSERT INTO `state` VALUES(1782, 111, 'Eschen', 'Eschen', 'Y');
INSERT INTO `state` VALUES(1783, 111, 'Gamprin', 'Gamprin', 'Y');
INSERT INTO `state` VALUES(1784, 111, 'Mauren', 'Mauren', 'Y');
INSERT INTO `state` VALUES(1785, 111, 'Planken', 'Planken', 'Y');
INSERT INTO `state` VALUES(1786, 111, 'Ruggell', 'Ruggell', 'Y');
INSERT INTO `state` VALUES(1787, 111, 'Schaan', 'Schaan', 'Y');
INSERT INTO `state` VALUES(1788, 111, 'Schellenberg', 'Schellenberg', 'Y');
INSERT INTO `state` VALUES(1789, 111, 'Triesen', 'Triesen', 'Y');
INSERT INTO `state` VALUES(1790, 111, 'Triesenberg', 'Triesenberg', 'Y');
INSERT INTO `state` VALUES(1791, 111, 'Vaduz', 'Vaduz', 'Y');
INSERT INTO `state` VALUES(1792, 112, 'Shiauliu', '"&#352;iauli&#371;"', 'Y');
INSERT INTO `state` VALUES(1793, 112, 'Alytaus', 'Alytaus', 'Y');
INSERT INTO `state` VALUES(1794, 112, 'Utenos', 'Utenos', 'Y');
INSERT INTO `state` VALUES(1795, 112, 'Kauno', 'Kauno', 'Y');
INSERT INTO `state` VALUES(1796, 112, 'Vilniaus', 'Vilniaus', 'Y');
INSERT INTO `state` VALUES(1797, 112, 'Panevezhio', '"Panev&#279;&#382;io"', 'Y');
INSERT INTO `state` VALUES(1798, 112, 'Klaipedos', '"Klaip&#279;dos"', 'Y');
INSERT INTO `state` VALUES(1799, 112, 'Marijampoles', '"Marijampol&#279;s"', 'Y');
INSERT INTO `state` VALUES(1800, 112, 'Taurages', '"Taurag&#279;s"', 'Y');
INSERT INTO `state` VALUES(1801, 112, 'Telshiu', '"Tel&#353;i&#371;"', 'Y');
INSERT INTO `state` VALUES(1802, 113, 'Esch-sur-Alzette', 'Esch-sur-Alzette', 'Y');
INSERT INTO `state` VALUES(1803, 113, 'Grevenmacher', 'Grevenmacher', 'Y');
INSERT INTO `state` VALUES(1804, 113, 'Clervaux', 'Clervaux', 'Y');
INSERT INTO `state` VALUES(1805, 113, 'Wiltz', 'Wiltz', 'Y');
INSERT INTO `state` VALUES(1806, 113, 'Echternach', 'Echternach', 'Y');
INSERT INTO `state` VALUES(1807, 113, 'Remich', 'Remich', 'Y');
INSERT INTO `state` VALUES(1808, 113, 'Luxembourg', 'Luxembourg', 'Y');
INSERT INTO `state` VALUES(1809, 113, 'Mersch', 'Mersch', 'Y');
INSERT INTO `state` VALUES(1810, 113, 'Redange', 'Redange', 'Y');
INSERT INTO `state` VALUES(1811, 113, 'Capellen', 'Capellen', 'Y');
INSERT INTO `state` VALUES(1812, 113, 'Diekirch', 'Diekirch', 'Y');
INSERT INTO `state` VALUES(1813, 113, 'Vianden', 'Vianden', 'Y');
INSERT INTO `state` VALUES(1814, 114, 'Skopje', 'Skopje', 'Y');
INSERT INTO `state` VALUES(1815, 114, 'Bitola', 'Bitola', 'Y');
INSERT INTO `state` VALUES(1816, 114, 'Ohrid', 'Ohrid', 'Y');
INSERT INTO `state` VALUES(1817, 114, 'Berovo', 'Berovo', 'Y');
INSERT INTO `state` VALUES(1818, 114, 'Vinica', 'Vinica', 'Y');
INSERT INTO `state` VALUES(1819, 114, 'Gevgelija', 'Gevgelija', 'Y');
INSERT INTO `state` VALUES(1820, 114, 'Veles', 'Veles', 'Y');
INSERT INTO `state` VALUES(1821, 114, 'Tetovo', 'Tetovo', 'Y');
INSERT INTO `state` VALUES(1822, 114, 'Strumica', 'Strumica', 'Y');
INSERT INTO `state` VALUES(1823, 114, 'Brod', 'Brod', 'Y');
INSERT INTO `state` VALUES(1824, 114, 'Gostivar', 'Gostivar', 'Y');
INSERT INTO `state` VALUES(1825, 114, 'Kochani', '"Ko&#269;ani"', 'Y');
INSERT INTO `state` VALUES(1826, 114, 'Debar', 'Debar', 'Y');
INSERT INTO `state` VALUES(1827, 114, 'Delchevo', '"Del&#269;evo"', 'Y');
INSERT INTO `state` VALUES(1828, 114, 'Struga', 'Struga', 'Y');
INSERT INTO `state` VALUES(1829, 114, 'Demir Hisar', 'Demir Hisar', 'Y');
INSERT INTO `state` VALUES(1830, 114, 'Negotino', 'Negotino', 'Y');
INSERT INTO `state` VALUES(1831, 114, 'Prilep', 'Prilep', 'Y');
INSERT INTO `state` VALUES(1832, 114, 'Kichevo', '"Ki&#269;evo"', 'Y');
INSERT INTO `state` VALUES(1833, 114, 'Kumanovo', 'Kumanovo', 'Y');
INSERT INTO `state` VALUES(1834, 114, 'Shtip', '"&#352;tip"', 'Y');
INSERT INTO `state` VALUES(1835, 114, 'Kavadarci', 'Kavadarci', 'Y');
INSERT INTO `state` VALUES(1836, 114, 'Radovish', '"Radovi&#353;"', 'Y');
INSERT INTO `state` VALUES(1837, 114, 'Kratovo', 'Kratovo', 'Y');
INSERT INTO `state` VALUES(1838, 114, 'Kriva Palanka', 'Kriva Palanka', 'Y');
INSERT INTO `state` VALUES(1839, 114, 'Krushevo', '"Kru&#353;evo"', 'Y');
INSERT INTO `state` VALUES(1840, 114, 'Sveti Nikole', 'Sveti Nikole', 'Y');
INSERT INTO `state` VALUES(1841, 114, 'Probishtip', '"Probi&#353;tip"', 'Y');
INSERT INTO `state` VALUES(1842, 114, 'Resen', 'Resen', 'Y');
INSERT INTO `state` VALUES(1843, 114, 'Valandovo', 'Valandovo', 'Y');
INSERT INTO `state` VALUES(1844, 115, 'Fianarantsoa', 'Fianarantsoa', 'Y');
INSERT INTO `state` VALUES(1845, 115, 'Antsiranana', '"Antsiran&#776;ana"', 'Y');
INSERT INTO `state` VALUES(1846, 115, 'Mahajanga', 'Mahajanga', 'Y');
INSERT INTO `state` VALUES(1847, 115, 'Antananarivo', 'Antananarivo', 'Y');
INSERT INTO `state` VALUES(1848, 115, 'Toamasina', 'Toamasina', 'Y');
INSERT INTO `state` VALUES(1849, 115, 'Toliary', 'Toliary', 'Y');
INSERT INTO `state` VALUES(1850, 116, 'Balaka', 'Balaka', 'Y');
INSERT INTO `state` VALUES(1851, 116, 'Blantyre City', 'Blantyre City', 'Y');
INSERT INTO `state` VALUES(1852, 116, 'Chikwawa', 'Chikwawa', 'Y');
INSERT INTO `state` VALUES(1853, 116, 'Karonga', 'Karonga', 'Y');
INSERT INTO `state` VALUES(1854, 116, 'Dedza', 'Dedza', 'Y');
INSERT INTO `state` VALUES(1855, 116, 'Chiradzulu', 'Chiradzulu', 'Y');
INSERT INTO `state` VALUES(1856, 116, 'Chitipa', 'Chitipa', 'Y');
INSERT INTO `state` VALUES(1857, 116, 'Dowa', 'Dowa', 'Y');
INSERT INTO `state` VALUES(1858, 116, 'Kasungu', 'Kasungu', 'Y');
INSERT INTO `state` VALUES(1859, 116, 'Lilongwe City', 'Lilongwe City', 'Y');
INSERT INTO `state` VALUES(1860, 116, 'Machinga', 'Machinga', 'Y');
INSERT INTO `state` VALUES(1861, 116, 'Thyolo', 'Thyolo', 'Y');
INSERT INTO `state` VALUES(1862, 116, 'Mangochi', 'Mangochi', 'Y');
INSERT INTO `state` VALUES(1863, 116, 'Mchinji', 'Mchinji', 'Y');
INSERT INTO `state` VALUES(1864, 116, 'Mulanje', 'Mulanje', 'Y');
INSERT INTO `state` VALUES(1865, 116, 'Mwanza', 'Mwanza', 'Y');
INSERT INTO `state` VALUES(1866, 116, 'Mzimba', 'Mzimba', 'Y');
INSERT INTO `state` VALUES(1867, 116, 'Mzuzu City', 'Mzuzu City', 'Y');
INSERT INTO `state` VALUES(1868, 116, 'Nkhata Bay', 'Nkhata Bay', 'Y');
INSERT INTO `state` VALUES(1869, 116, 'Nkhotakota', 'Nkhotakota', 'Y');
INSERT INTO `state` VALUES(1870, 116, 'Nsanje', 'Nsanje', 'Y');
INSERT INTO `state` VALUES(1871, 116, 'Ntcheu', 'Ntcheu', 'Y');
INSERT INTO `state` VALUES(1872, 116, 'Ntchisi', 'Ntchisi', 'Y');
INSERT INTO `state` VALUES(1873, 116, 'Phalombe', 'Phalombe', 'Y');
INSERT INTO `state` VALUES(1874, 116, 'Rumphi', 'Rumphi', 'Y');
INSERT INTO `state` VALUES(1875, 116, 'Salima', 'Salima', 'Y');
INSERT INTO `state` VALUES(1876, 116, 'Zomba Municipality', 'Zomba Municipality', 'Y');
INSERT INTO `state` VALUES(1877, 117, 'Melaka', 'Melaka', 'Y');
INSERT INTO `state` VALUES(1878, 117, 'Kedah', 'Kedah', 'Y');
INSERT INTO `state` VALUES(1879, 117, 'Selangor', 'Selangor', 'Y');
INSERT INTO `state` VALUES(1880, 117, 'Pulau Pinang', 'Pulau Pinang', 'Y');
INSERT INTO `state` VALUES(1881, 117, 'Perak', 'Perak', 'Y');
INSERT INTO `state` VALUES(1882, 117, 'Negeri Sembilan', 'Negeri Sembilan', 'Y');
INSERT INTO `state` VALUES(1883, 117, 'Pahang', 'Pahang', 'Y');
INSERT INTO `state` VALUES(1884, 117, 'Johor', 'Johor', 'Y');
INSERT INTO `state` VALUES(1885, 117, 'Sarawak', 'Sarawak', 'Y');
INSERT INTO `state` VALUES(1886, 117, 'Sabah', 'Sabah', 'Y');
INSERT INTO `state` VALUES(1887, 117, 'Terengganu', 'Terengganu', 'Y');
INSERT INTO `state` VALUES(1888, 117, 'Kelantan', 'Kelantan', 'Y');
INSERT INTO `state` VALUES(1889, 117, 'Perlis', 'Perlis', 'Y');
INSERT INTO `state` VALUES(1890, 117, 'Kuala Lumpur', 'Kuala Lumpur', 'Y');
INSERT INTO `state` VALUES(1891, 117, 'Labuan', 'Labuan', 'Y');
INSERT INTO `state` VALUES(1892, 118, 'Raa', 'Raa', 'Y');
INSERT INTO `state` VALUES(1893, 118, 'Haa Alif', 'Haa Alif', 'Y');
INSERT INTO `state` VALUES(1894, 118, 'Dhaal', 'Dhaal', 'Y');
INSERT INTO `state` VALUES(1895, 118, 'Faaf', 'Faaf', 'Y');
INSERT INTO `state` VALUES(1896, 118, 'Shaviyani', 'Shaviyani', 'Y');
INSERT INTO `state` VALUES(1897, 118, 'Alif Alif', 'Alif Alif', 'Y');
INSERT INTO `state` VALUES(1898, 118, 'Thaa', 'Thaa', 'Y');
INSERT INTO `state` VALUES(1899, 118, 'Gaaf Alif', 'Gaaf Alif', 'Y');
INSERT INTO `state` VALUES(1900, 118, 'Laam', 'Laam', 'Y');
INSERT INTO `state` VALUES(1901, 118, 'Alif Dhaal', 'Alif Dhaal', 'Y');
INSERT INTO `state` VALUES(1902, 118, 'Baa', 'Baa', 'Y');
INSERT INTO `state` VALUES(1903, 118, 'Kaaf', 'Kaaf', 'Y');
INSERT INTO `state` VALUES(1904, 118, 'Miim', 'Miim', 'Y');
INSERT INTO `state` VALUES(1905, 118, 'Gaaf Dhaal', 'Gaaf Dhaal', 'Y');
INSERT INTO `state` VALUES(1906, 118, 'Haa Dhaal', 'Haa Dhaal', 'Y');
INSERT INTO `state` VALUES(1907, 118, 'Vaav', 'Vaav', 'Y');
INSERT INTO `state` VALUES(1908, 118, 'Siin', 'Siin', 'Y');
INSERT INTO `state` VALUES(1909, 118, 'Nuun', 'Nuun', 'Y');
INSERT INTO `state` VALUES(1910, 118, 'Ghaviyani', 'Ghaviyani', 'Y');
INSERT INTO `state` VALUES(1911, 118, 'Lhaviyani', 'Lhaviyani', 'Y');
INSERT INTO `state` VALUES(1912, 118, 'Male', '"Mal&#233;"', 'Y');
INSERT INTO `state` VALUES(1913, 119, 'Tombouctou', 'Tombouctou', 'Y');
INSERT INTO `state` VALUES(1914, 119, 'Kayes', 'Kayes', 'Y');
INSERT INTO `state` VALUES(1915, 119, 'Bamako', 'Bamako', 'Y');
INSERT INTO `state` VALUES(1916, 119, 'Koulikoro', 'Koulikoro', 'Y');
INSERT INTO `state` VALUES(1917, 119, 'Mopti', 'Mopti', 'Y');
INSERT INTO `state` VALUES(1918, 119, 'Sikasso', 'Sikasso', 'Y');
INSERT INTO `state` VALUES(1919, 119, 'Gao', 'Gao', 'Y');
INSERT INTO `state` VALUES(1920, 119, 'Segou', '"S&#233;gou"', 'Y');
INSERT INTO `state` VALUES(1921, 119, 'Kidal', 'Kidal', 'Y');
INSERT INTO `state` VALUES(1922, 120, 'Western', 'Western', 'Y');
INSERT INTO `state` VALUES(1923, 120, 'Inner Harbour', 'Inner Harbour', 'Y');
INSERT INTO `state` VALUES(1924, 120, 'Outer Harbour', 'Outer Harbour', 'Y');
INSERT INTO `state` VALUES(1925, 120, 'South Eastern', 'South Eastern', 'Y');
INSERT INTO `state` VALUES(1926, 120, 'Gozo and Comino', 'Gozo and Comino', 'Y');
INSERT INTO `state` VALUES(1927, 120, 'Northern', 'Northern', 'Y');
INSERT INTO `state` VALUES(1928, 121, 'Jaluit', 'Jaluit', 'Y');
INSERT INTO `state` VALUES(1929, 121, 'Mili', 'Mili', 'Y');
INSERT INTO `state` VALUES(1930, 121, 'Ailinlaplap', 'Ailinlaplap', 'Y');
INSERT INTO `state` VALUES(1931, 121, 'Ailuk', 'Ailuk', 'Y');
INSERT INTO `state` VALUES(1932, 121, 'Maloelap', 'Maloelap', 'Y');
INSERT INTO `state` VALUES(1933, 121, 'Majuro', 'Majuro', 'Y');
INSERT INTO `state` VALUES(1934, 121, 'Kwajalein', 'Kwajalein', 'Y');
INSERT INTO `state` VALUES(1935, 121, 'Arno', 'Arno', 'Y');
INSERT INTO `state` VALUES(1936, 121, 'Aur', 'Aur', 'Y');
INSERT INTO `state` VALUES(1937, 121, 'Wotje', 'Wotje', 'Y');
INSERT INTO `state` VALUES(1938, 121, 'Ebon', 'Ebon', 'Y');
INSERT INTO `state` VALUES(1939, 121, 'Lae', 'Lae', 'Y');
INSERT INTO `state` VALUES(1940, 121, 'Bikini', 'Bikini', 'Y');
INSERT INTO `state` VALUES(1941, 121, 'Enewetak', 'Enewetak', 'Y');
INSERT INTO `state` VALUES(1942, 121, 'Jabat', 'Jabat', 'Y');
INSERT INTO `state` VALUES(1943, 121, 'Likiep', 'Likiep', 'Y');
INSERT INTO `state` VALUES(1944, 121, 'Kili', 'Kili', 'Y');
INSERT INTO `state` VALUES(1945, 121, 'Lib', 'Lib', 'Y');
INSERT INTO `state` VALUES(1946, 121, 'Mejit', 'Mejit', 'Y');
INSERT INTO `state` VALUES(1947, 121, 'Namorik', 'Namorik', 'Y');
INSERT INTO `state` VALUES(1948, 121, 'Namu', 'Namu', 'Y');
INSERT INTO `state` VALUES(1949, 121, 'Rongelap', 'Rongelap', 'Y');
INSERT INTO `state` VALUES(1950, 121, 'Ujae', 'Ujae', 'Y');
INSERT INTO `state` VALUES(1951, 121, 'Utrik', 'Utrik', 'Y');
INSERT INTO `state` VALUES(1952, 121, 'Wotho', 'Wotho', 'Y');
INSERT INTO `state` VALUES(1953, 122, 'La Trinite', '"La Trinit&#233;"', 'Y');
INSERT INTO `state` VALUES(1954, 122, 'Le Marin', 'Le Marin', 'Y');
INSERT INTO `state` VALUES(1955, 122, 'Fort-de-France', 'Fort-de-France', 'Y');
INSERT INTO `state` VALUES(1956, 122, 'Saint-Pierre', 'Saint-Pierre', 'Y');
INSERT INTO `state` VALUES(1957, 123, 'Brakna', 'Brakna', 'Y');
INSERT INTO `state` VALUES(1958, 123, 'Inshiri', '"In&#353;iri"', 'Y');
INSERT INTO `state` VALUES(1959, 123, 'Adrar', 'Adrar', 'Y');
INSERT INTO `state` VALUES(1960, 123, 'Hudh-al-Gharbi', '"Hu<u>d</u>-al-&#288;arbi"', 'Y');
INSERT INTO `state` VALUES(1961, 123, 'Tiris ZammÃ»r', '"Tiris Zamm&#363;r"', 'Y');
INSERT INTO `state` VALUES(1962, 123, 'Qidimagha', '"Qidima&#289;a"', 'Y');
INSERT INTO `state` VALUES(1963, 123, 'Qurqul', 'Qurqul', 'Y');
INSERT INTO `state` VALUES(1964, 123, 'Assaba', 'Assaba', 'Y');
INSERT INTO `state` VALUES(1965, 123, 'Hudh-ash-Sharqi', '"Hu<u>d</u>-a&#353;-&#352;arqi"', 'Y');
INSERT INTO `state` VALUES(1966, 123, 'Dhakhlat Nawadibu', '"<u>D</u>a&#295;lat Nawad&#299;bu"', 'Y');
INSERT INTO `state` VALUES(1967, 123, 'Nawakshut', '"Naw&#257;k&#353;&#363;t"', 'Y');
INSERT INTO `state` VALUES(1968, 123, 'Trarza', 'Trarza', 'Y');
INSERT INTO `state` VALUES(1969, 123, 'Taqant', 'Taqant', 'Y');
INSERT INTO `state` VALUES(1970, 124, 'Black River', 'Black River', 'Y');
INSERT INTO `state` VALUES(1971, 124, 'Riviere du Rempart', 'Riviere du Rempart', 'Y');
INSERT INTO `state` VALUES(1972, 124, 'Pamplempousses', 'Pamplempousses', 'Y');
INSERT INTO `state` VALUES(1973, 124, 'Savanne', 'Savanne', 'Y');
INSERT INTO `state` VALUES(1974, 124, 'Rodrigues', 'Rodrigues', 'Y');
INSERT INTO `state` VALUES(1975, 124, 'Grand Port', 'Grand Port', 'Y');
INSERT INTO `state` VALUES(1976, 124, 'Plaines Wilhelm', 'Plaines Wilhelm', 'Y');
INSERT INTO `state` VALUES(1977, 124, 'Flacq', 'Flacq', 'Y');
INSERT INTO `state` VALUES(1978, 124, 'Moka', 'Moka', 'Y');
INSERT INTO `state` VALUES(1979, 124, 'Port Louis', 'Port Louis', 'Y');
INSERT INTO `state` VALUES(1980, 125, 'Tamaulipas', 'Tamaulipas', 'Y');
INSERT INTO `state` VALUES(1981, 125, 'Guanajuato', 'Guanajuato', 'Y');
INSERT INTO `state` VALUES(1982, 125, 'Chiapas', 'Chiapas', 'Y');
INSERT INTO `state` VALUES(1983, 125, 'Mexico', '"M&#233;xico"', 'Y');
INSERT INTO `state` VALUES(1984, 125, 'Puebla', 'Puebla', 'Y');
INSERT INTO `state` VALUES(1985, 125, 'Guerrero', 'Guerrero', 'Y');
INSERT INTO `state` VALUES(1986, 125, 'Yucatan', '"Yucat&#225;n"', 'Y');
INSERT INTO `state` VALUES(1987, 125, 'Nayarit', 'Nayarit', 'Y');
INSERT INTO `state` VALUES(1988, 125, 'Jalisco', 'Jalisco', 'Y');
INSERT INTO `state` VALUES(1989, 125, 'Oaxaca', 'Oaxaca', 'Y');
INSERT INTO `state` VALUES(1990, 125, 'Hidalgo', 'Hidalgo', 'Y');
INSERT INTO `state` VALUES(1991, 125, 'Veracruz', 'Veracruz', 'Y');
INSERT INTO `state` VALUES(1992, 125, 'michoacan', '"Michoac&#225;n"', 'Y');
INSERT INTO `state` VALUES(1993, 125, 'Coahuila', 'Coahuila', 'Y');
INSERT INTO `state` VALUES(1994, 125, 'Chihuahua', 'Chihuahua', 'Y');
INSERT INTO `state` VALUES(1995, 125, 'Sinaloa', 'Sinaloa', 'Y');
INSERT INTO `state` VALUES(1996, 125, 'Sonora', 'Sonora', 'Y');
INSERT INTO `state` VALUES(1997, 125, 'Aguascalientes', 'Aguascalientes', 'Y');
INSERT INTO `state` VALUES(1998, 125, 'San Luis Potosi­', '"San Luis Potos&#237;"', 'Y');
INSERT INTO `state` VALUES(1999, 125, 'Tlaxcala', 'Tlaxcala', 'Y');
INSERT INTO `state` VALUES(2000, 125, 'Queretaro', '"Quer&#233;taro"', 'Y');
INSERT INTO `state` VALUES(2001, 125, 'Baja California', 'Baja California', 'Y');
INSERT INTO `state` VALUES(2002, 125, 'Nuevo Leon', '"Nuevo Le&#243;n"', 'Y');
INSERT INTO `state` VALUES(2003, 125, 'Morelos', 'Morelos', 'Y');
INSERT INTO `state` VALUES(2004, 125, 'Zacatecas', 'Zacatecas', 'Y');
INSERT INTO `state` VALUES(2005, 125, 'Tabasco', 'Tabasco', 'Y');
INSERT INTO `state` VALUES(2006, 125, 'Colima', 'Colima', 'Y');
INSERT INTO `state` VALUES(2007, 125, 'Quintana Roo', 'Quintana Roo', 'Y');
INSERT INTO `state` VALUES(2008, 125, 'Campeche', 'Campeche', 'Y');
INSERT INTO `state` VALUES(2009, 125, 'Durango', 'Durango', 'Y');
INSERT INTO `state` VALUES(2010, 125, 'Baja California Sur', 'Baja California Sur', 'Y');
INSERT INTO `state` VALUES(2011, 125, 'Distrito Federal', 'Distrito Federal', 'Y');
INSERT INTO `state` VALUES(2012, 126, 'Yap', 'Yap', 'Y');
INSERT INTO `state` VALUES(2013, 126, 'Pohnpei', 'Pohnpei', 'Y');
INSERT INTO `state` VALUES(2014, 126, 'Kusaie', 'Kusaie', 'Y');
INSERT INTO `state` VALUES(2015, 126, 'Chuuk', 'Chuuk', 'Y');
INSERT INTO `state` VALUES(2016, 127, 'Balti', '"B&#259;l&#355;i"', 'Y');
INSERT INTO `state` VALUES(2017, 127, 'Lapusna', '"L&#259;pu&#351;na"', 'Y');
INSERT INTO `state` VALUES(2018, 127, 'Edinet', '"Edine&#355;"', 'Y');
INSERT INTO `state` VALUES(2019, 127, 'Cahul', 'Cahul', 'Y');
INSERT INTO `state` VALUES(2020, 127, 'Ungheni', 'Ungheni', 'Y');
INSERT INTO `state` VALUES(2021, 127, 'Transnistria', 'Transnistria', 'Y');
INSERT INTO `state` VALUES(2022, 127, 'Tighina', 'Tighina', 'Y');
INSERT INTO `state` VALUES(2023, 127, 'Chisinau Oras', '"Chi&#351;in&#259;u Ora&#351;"', 'Y');
INSERT INTO `state` VALUES(2024, 127, 'Gagauzia', 'Gagauzia', 'Y');
INSERT INTO `state` VALUES(2025, 127, 'Soroca', 'Soroca', 'Y');
INSERT INTO `state` VALUES(2026, 127, 'Orhei', 'Orhei', 'Y');
INSERT INTO `state` VALUES(2027, 127, 'Chisinau', '"Chi&#351;in&#259;u"', 'Y');
INSERT INTO `state` VALUES(2028, 127, 'Taraclia', 'Taraclia', 'Y');
INSERT INTO `state` VALUES(2029, 128, 'Fontvieille', 'Fontvieille', 'Y');
INSERT INTO `state` VALUES(2030, 128, 'La Condamine', 'La Condamine', 'Y');
INSERT INTO `state` VALUES(2031, 128, 'Monaco-Ville', 'Monaco-Ville', 'Y');
INSERT INTO `state` VALUES(2032, 128, 'Monte Carlo', 'Monte Carlo', 'Y');
INSERT INTO `state` VALUES(2033, 129, 'Govi-Altaj', '"Gov&#301;-Altaj"', 'Y');
INSERT INTO `state` VALUES(2034, 129, 'Ovorhangaj', '"&#214;v&#246;rhangaj"', 'Y');
INSERT INTO `state` VALUES(2035, 129, 'Bajanhongor', 'Bajanhongor', 'Y');
INSERT INTO `state` VALUES(2036, 129, 'SÃ¼hbaatar', '"S&#252;hbaatar"', 'Y');
INSERT INTO `state` VALUES(2037, 129, 'Bulgan', 'Bulgan', 'Y');
INSERT INTO `state` VALUES(2038, 129, 'Arhangaj', 'Arhangaj', 'Y');
INSERT INTO `state` VALUES(2039, 129, 'Dornod', 'Dornod', 'Y');
INSERT INTO `state` VALUES(2040, 129, 'Govisumber', '"Gov&#301;sumber"', 'Y');
INSERT INTO `state` VALUES(2041, 129, 'Omnogovi', '"&#214;mn&#246;gov&#301;"', 'Y');
INSERT INTO `state` VALUES(2042, 129, 'Darhan-Uul', 'Darhan-Uul', 'Y');
INSERT INTO `state` VALUES(2043, 129, 'Orhon', 'Orhon', 'Y');
INSERT INTO `state` VALUES(2044, 129, 'Hovd', 'Hovd', 'Y');
INSERT INTO `state` VALUES(2045, 129, 'Dundgovi', '"Dundgov&#301;"', 'Y');
INSERT INTO `state` VALUES(2046, 129, 'Hovsgol', '"H&#246;vsg&#246;l"', 'Y');
INSERT INTO `state` VALUES(2047, 129, 'TÃ¶v', '"T&#246;v"', 'Y');
INSERT INTO `state` VALUES(2048, 129, 'Bajan-Ã–lgij', '"Bajan-&#214;lgij"', 'Y');
INSERT INTO `state` VALUES(2049, 129, 'Hentij', '"H&#232;ntij"', 'Y');
INSERT INTO `state` VALUES(2050, 129, 'Dornogovi', '"Dornogov&#301;"', 'Y');
INSERT INTO `state` VALUES(2051, 129, 'Selenge', '"S&#232;l&#232;ng&#232;"', 'Y');
INSERT INTO `state` VALUES(2052, 129, 'Zavhan', 'Zavhan', 'Y');
INSERT INTO `state` VALUES(2053, 129, 'Ulaanbaatar', 'Ulaanbaatar', 'Y');
INSERT INTO `state` VALUES(2054, 129, 'Uvs', 'Uvs', 'Y');
INSERT INTO `state` VALUES(2055, 130, 'n.a.', 'n.a.', 'Y');
INSERT INTO `state` VALUES(2056, 130, 'Souss Massa-Draa', '"Souss Massa-Dra&#226;"', 'Y');
INSERT INTO `state` VALUES(2057, 130, 'Oriental', 'Oriental', 'Y');
INSERT INTO `state` VALUES(2058, 130, 'Meknes-Tafilalet', 'Meknes-Tafilalet', 'Y');
INSERT INTO `state` VALUES(2059, 130, 'Tangier-Tetouan', '"Tangier-T&#233;touan"', 'Y');
INSERT INTO `state` VALUES(2060, 130, 'Doukkala-Abda', 'Doukkala-Abda', 'Y');
INSERT INTO `state` VALUES(2061, 130, 'Tadla-Azilal', 'Tadla-Azilal', 'Y');
INSERT INTO `state` VALUES(2062, 130, 'Marrakech-Tensift-Al Haouz', 'Marrakech-Tensift-Al Haouz', 'Y');
INSERT INTO `state` VALUES(2063, 130, 'Chaouia-Ouardigha', 'Chaouia-Ouardigha', 'Y');
INSERT INTO `state` VALUES(2064, 130, 'Casablanca', 'Casablanca', 'Y');
INSERT INTO `state` VALUES(2065, 130, 'Fes Boulemane', '"F&#232;s-Boulemane"', 'Y');
INSERT INTO `state` VALUES(2066, 130, 'Taza-Al Hoceima-Taounate', 'Taza-Al Hoceima-Taounate', 'Y');
INSERT INTO `state` VALUES(2067, 130, 'Guelmim', 'Guelmim', 'Y');
INSERT INTO `state` VALUES(2068, 130, 'Rabat-Sale-Zammour-Zaer', '"Rabat-Sal&#233;-Zammour-Zaer"', 'Y');
INSERT INTO `state` VALUES(2069, 130, 'Gharb-Chrarda-Beni Hssen', '"Gharb-Chrarda-B&#233;ni Hssen"', 'Y');
INSERT INTO `state` VALUES(2070, 131, 'Nampula', 'Nampula', 'Y');
INSERT INTO `state` VALUES(2071, 131, 'Sofala', 'Sofala', 'Y');
INSERT INTO `state` VALUES(2072, 131, 'Maputo Provincia', 'Maputo Provincia', 'Y');
INSERT INTO `state` VALUES(2073, 131, 'Gaza', 'Gaza', 'Y');
INSERT INTO `state` VALUES(2074, 131, 'Manica', 'Manica', 'Y');
INSERT INTO `state` VALUES(2075, 131, 'Niassa', 'Niassa', 'Y');
INSERT INTO `state` VALUES(2076, 131, 'Zambezia', 'Zambezia', 'Y');
INSERT INTO `state` VALUES(2077, 131, 'Inhambane', 'Inhambane', 'Y');
INSERT INTO `state` VALUES(2078, 131, 'Maputo', 'Maputo', 'Y');
INSERT INTO `state` VALUES(2079, 131, 'Cabo Delgado', 'Cabo Delgado', 'Y');
INSERT INTO `state` VALUES(2080, 131, 'Tete', 'Tete', 'Y');
INSERT INTO `state` VALUES(2081, 132, 'Rakhine', 'Rakhine', 'Y');
INSERT INTO `state` VALUES(2082, 132, 'Magway', 'Magway', 'Y');
INSERT INTO `state` VALUES(2083, 132, 'Bago', 'Bago', 'Y');
INSERT INTO `state` VALUES(2084, 132, 'Kachin', 'Kachin', 'Y');
INSERT INTO `state` VALUES(2085, 132, 'Ayeyarwady', 'Ayeyarwady', 'Y');
INSERT INTO `state` VALUES(2086, 132, 'Tanintharyi', 'Tanintharyi', 'Y');
INSERT INTO `state` VALUES(2087, 132, 'Chin', 'Chin', 'Y');
INSERT INTO `state` VALUES(2088, 132, 'Kayin', 'Kayin', 'Y');
INSERT INTO `state` VALUES(2089, 132, 'Sagaing', 'Sagaing', 'Y');
INSERT INTO `state` VALUES(2090, 132, 'Yangon', 'Yangon', 'Y');
INSERT INTO `state` VALUES(2091, 132, 'Shan', 'Shan', 'Y');
INSERT INTO `state` VALUES(2092, 132, 'Mon', 'Mon', 'Y');
INSERT INTO `state` VALUES(2093, 132, 'Mandalay', 'Mandalay', 'Y');
INSERT INTO `state` VALUES(2094, 132, 'Kayah', 'Kayah', 'Y');
INSERT INTO `state` VALUES(2095, 133, 'Kunene', 'Kunene', 'Y');
INSERT INTO `state` VALUES(2096, 133, 'Hardap', 'Hardap', 'Y');
INSERT INTO `state` VALUES(2097, 133, 'Karas', 'Karas', 'Y');
INSERT INTO `state` VALUES(2098, 133, 'Omaheke', 'Omaheke', 'Y');
INSERT INTO `state` VALUES(2099, 133, 'Otjozondjupa', 'Otjozondjupa', 'Y');
INSERT INTO `state` VALUES(2100, 133, 'Erongo', 'Erongo', 'Y');
INSERT INTO `state` VALUES(2101, 133, 'Caprivi', 'Caprivi', 'Y');
INSERT INTO `state` VALUES(2102, 133, 'Oshikoto', 'Oshikoto', 'Y');
INSERT INTO `state` VALUES(2103, 133, 'Omusati', 'Omusati', 'Y');
INSERT INTO `state` VALUES(2104, 133, 'Oshana', 'Oshana', 'Y');
INSERT INTO `state` VALUES(2105, 133, 'Ohangwena', 'Ohangwena', 'Y');
INSERT INTO `state` VALUES(2106, 133, 'Kavango', 'Kavango', 'Y');
INSERT INTO `state` VALUES(2107, 133, 'Khomas', 'Khomas', 'Y');
INSERT INTO `state` VALUES(2108, 134, 'Yaren', 'Yaren', 'Y');
INSERT INTO `state` VALUES(2109, 135, 'Mahakali', 'Mahakali', 'Y');
INSERT INTO `state` VALUES(2110, 135, 'Dhawalagiri', 'Dhawalagiri', 'Y');
INSERT INTO `state` VALUES(2111, 135, 'Bagmati', 'Bagmati', 'Y');
INSERT INTO `state` VALUES(2112, 135, 'Mechi', 'Mechi', 'Y');
INSERT INTO `state` VALUES(2113, 135, 'Narayani', 'Narayani', 'Y');
INSERT INTO `state` VALUES(2114, 135, 'Janakpur', 'Janakpur', 'Y');
INSERT INTO `state` VALUES(2115, 135, 'Koshi', 'Koshi', 'Y');
INSERT INTO `state` VALUES(2116, 135, 'Bheri', 'Bheri', 'Y');
INSERT INTO `state` VALUES(2117, 135, 'Lumbini', 'Lumbini', 'Y');
INSERT INTO `state` VALUES(2118, 135, 'Gandaki', 'Gandaki', 'Y');
INSERT INTO `state` VALUES(2119, 135, 'Seti', 'Seti', 'Y');
INSERT INTO `state` VALUES(2120, 135, 'Karnali', 'Karnali', 'Y');
INSERT INTO `state` VALUES(2121, 135, 'Sagarmatha', 'Sagarmatha', 'Y');
INSERT INTO `state` VALUES(2122, 135, 'Rapti', 'Rapti', 'Y');
INSERT INTO `state` VALUES(2123, 136, 'Drenthe', 'Drenthe', 'Y');
INSERT INTO `state` VALUES(2124, 136, 'Noord-Brabant', 'Noord-Brabant', 'Y');
INSERT INTO `state` VALUES(2125, 136, 'Noord-Holland', 'Noord-Holland', 'Y');
INSERT INTO `state` VALUES(2126, 136, 'Gelderland', 'Gelderland', 'Y');
INSERT INTO `state` VALUES(2127, 136, 'Utrecht', 'Utrecht', 'Y');
INSERT INTO `state` VALUES(2128, 136, 'Friesland', 'Friesland', 'Y');
INSERT INTO `state` VALUES(2129, 136, 'Zuid-Holland', 'Zuid-Holland', 'Y');
INSERT INTO `state` VALUES(2130, 136, 'Overijssel', 'Overijssel', 'Y');
INSERT INTO `state` VALUES(2131, 136, 'Flevoland', 'Flevoland', 'Y');
INSERT INTO `state` VALUES(2132, 136, 'Limburg', 'Limburg', 'Y');
INSERT INTO `state` VALUES(2133, 136, 'Groningen', 'Groningen', 'Y');
INSERT INTO `state` VALUES(2134, 136, 'Zeeland', 'Zeeland', 'Y');
INSERT INTO `state` VALUES(2135, 137, 'Bonaire', 'Bonaire', 'Y');
INSERT INTO `state` VALUES(2136, 137, 'Sint Eustatius', 'Sint Eustatius', 'Y');
INSERT INTO `state` VALUES(2137, 137, 'Sint Maarten', 'Sint Maarten', 'Y');
INSERT INTO `state` VALUES(2138, 137, 'Saba', 'Saba', 'Y');
INSERT INTO `state` VALUES(2139, 137, 'Curacao', '"Cura&#231;ao"', 'Y');
INSERT INTO `state` VALUES(2140, 138, 'Iles', '"&#206;les"', 'Y');
INSERT INTO `state` VALUES(2141, 138, 'Sud', 'Sud', 'Y');
INSERT INTO `state` VALUES(2142, 138, 'Nord', 'Nord', 'Y');
INSERT INTO `state` VALUES(2143, 139, 'n.a.', 'n.a.', 'Y');
INSERT INTO `state` VALUES(2144, 139, 'Otago', 'Otago', 'Y');
INSERT INTO `state` VALUES(2145, 139, 'Canterbury', 'Canterbury', 'Y');
INSERT INTO `state` VALUES(2146, 139, 'Auckland', 'Auckland', 'Y');
INSERT INTO `state` VALUES(2147, 139, 'Marlborough', 'Marlborough', 'Y');
INSERT INTO `state` VALUES(2148, 139, 'Waikato', 'Waikato', 'Y');
INSERT INTO `state` VALUES(2149, 139, 'Wellington', 'Wellington', 'Y');
INSERT INTO `state` VALUES(2150, 139, 'Manawatu-Wanganui', 'Manawatu-Wanganui', 'Y');
INSERT INTO `state` VALUES(2151, 139, 'Northland', 'Northland', 'Y');
INSERT INTO `state` VALUES(2152, 139, 'Gisborne', 'Gisborne', 'Y');
INSERT INTO `state` VALUES(2153, 139, 'Southland', 'Southland', 'Y');
INSERT INTO `state` VALUES(2154, 139, 'West Coast', 'West Coast', 'Y');
INSERT INTO `state` VALUES(2155, 139, 'Taranaki', 'Taranaki', 'Y');
INSERT INTO `state` VALUES(2156, 139, 'Bay of Plenty', 'Bay of Plenty', 'Y');
INSERT INTO `state` VALUES(2157, 139, 'Tasman', 'Tasman', 'Y');
INSERT INTO `state` VALUES(2158, 139, 'Nelson', 'Nelson', 'Y');
INSERT INTO `state` VALUES(2159, 139, 'Area Outside Region', 'Area Outside Region', 'Y');
INSERT INTO `state` VALUES(2160, 140, 'Chontales', 'Chontales', 'Y');
INSERT INTO `state` VALUES(2161, 140, 'Rivas', 'Rivas', 'Y');
INSERT INTO `state` VALUES(2162, 140, 'Atlantico Sur', '"Atl&#225;ntico Sur"', 'Y');
INSERT INTO `state` VALUES(2163, 140, 'Boaco', 'Boaco', 'Y');
INSERT INTO `state` VALUES(2164, 140, 'Atlantico Norte', '"Atl&#225;ntico Norte"', 'Y');
INSERT INTO `state` VALUES(2165, 140, 'Chinandega', 'Chinandega', 'Y');
INSERT INTO `state` VALUES(2166, 140, 'Matagalpa', 'Matagalpa', 'Y');
INSERT INTO `state` VALUES(2167, 140, 'Esteli­', '"Estel&#237;"', 'Y');
INSERT INTO `state` VALUES(2168, 140, 'Carazo', 'Carazo', 'Y');
INSERT INTO `state` VALUES(2169, 140, 'Granada', 'Granada', 'Y');
INSERT INTO `state` VALUES(2170, 140, 'Nueva Segovia', 'Nueva Segovia', 'Y');
INSERT INTO `state` VALUES(2171, 140, 'Leon', '"Le&#243;n"', 'Y');
INSERT INTO `state` VALUES(2172, 140, 'Jinotega', 'Jinotega', 'Y');
INSERT INTO `state` VALUES(2173, 140, 'Masaya', 'Masaya', 'Y');
INSERT INTO `state` VALUES(2174, 140, 'Managua', 'Managua', 'Y');
INSERT INTO `state` VALUES(2175, 140, 'Rio San Juan', '"R&#237;o San Juan"', 'Y');
INSERT INTO `state` VALUES(2176, 140, 'Madriz', 'Madriz', 'Y');
INSERT INTO `state` VALUES(2177, 141, 'Agadez', 'Agadez', 'Y');
INSERT INTO `state` VALUES(2178, 141, 'Maradi', 'Maradi', 'Y');
INSERT INTO `state` VALUES(2179, 141, 'Tillabery', '"Tillab&#233;ry"', 'Y');
INSERT INTO `state` VALUES(2180, 141, 'n.a.', 'n.a.', 'Y');
INSERT INTO `state` VALUES(2181, 141, 'Dosso', 'Dosso', 'Y');
INSERT INTO `state` VALUES(2182, 141, 'Tahoua', 'Tahoua', 'Y');
INSERT INTO `state` VALUES(2183, 141, 'Diffa', 'Diffa', 'Y');
INSERT INTO `state` VALUES(2184, 141, 'Zinder', 'Zinder', 'Y');
INSERT INTO `state` VALUES(2185, 141, 'Niamey', 'Niamey', 'Y');
INSERT INTO `state` VALUES(2186, 142, 'Abia', 'Abia', 'Y');
INSERT INTO `state` VALUES(2187, 142, 'Borno', 'Borno', 'Y');
INSERT INTO `state` VALUES(2188, 142, 'Abuja Federal Capital Territory', 'Abuja Federal Capital Territory', 'Y');
INSERT INTO `state` VALUES(2189, 142, 'Ebonyi', 'Ebonyi', 'Y');
INSERT INTO `state` VALUES(2190, 142, 'Ogun', 'Ogun', 'Y');
INSERT INTO `state` VALUES(2191, 142, 'n.a.', 'n.a.', 'Y');
INSERT INTO `state` VALUES(2192, 142, 'Imo', 'Imo', 'Y');
INSERT INTO `state` VALUES(2193, 142, 'Rivers', 'Rivers', 'Y');
INSERT INTO `state` VALUES(2194, 142, 'Ekiti', 'Ekiti', 'Y');
INSERT INTO `state` VALUES(2195, 142, 'Niger', 'Niger', 'Y');
INSERT INTO `state` VALUES(2196, 142, 'Delta', 'Delta', 'Y');
INSERT INTO `state` VALUES(2197, 142, 'Anambra', 'Anambra', 'Y');
INSERT INTO `state` VALUES(2198, 142, 'Enugu', 'Enugu', 'Y');
INSERT INTO `state` VALUES(2199, 142, 'Kogi', 'Kogi', 'Y');
INSERT INTO `state` VALUES(2200, 142, 'Kwara', 'Kwara', 'Y');
INSERT INTO `state` VALUES(2201, 142, 'Kano', 'Kano', 'Y');
INSERT INTO `state` VALUES(2202, 142, 'Cross River', 'Cross River', 'Y');
INSERT INTO `state` VALUES(2203, 142, 'Oyo', 'Oyo', 'Y');
INSERT INTO `state` VALUES(2204, 142, 'Gombe', 'Gombe', 'Y');
INSERT INTO `state` VALUES(2205, 142, 'Ondo', 'Ondo', 'Y');
INSERT INTO `state` VALUES(2206, 142, 'Nassarawa', 'Nassarawa', 'Y');
INSERT INTO `state` VALUES(2207, 142, 'Benue', 'Benue', 'Y');
INSERT INTO `state` VALUES(2208, 142, 'Bauchi', 'Bauchi', 'Y');
INSERT INTO `state` VALUES(2209, 142, 'Zamfara', 'Zamfara', 'Y');
INSERT INTO `state` VALUES(2210, 142, 'Osun', 'Osun', 'Y');
INSERT INTO `state` VALUES(2211, 142, 'Kebbi', 'Kebbi', 'Y');
INSERT INTO `state` VALUES(2212, 142, 'Edo', 'Edo', 'Y');
INSERT INTO `state` VALUES(2213, 142, 'Jigawa', 'Jigawa', 'Y');
INSERT INTO `state` VALUES(2214, 142, 'Lagos', 'Lagos', 'Y');
INSERT INTO `state` VALUES(2215, 142, 'Katsina', 'Katsina', 'Y');
INSERT INTO `state` VALUES(2216, 142, 'Taraba', 'Taraba', 'Y');
INSERT INTO `state` VALUES(2217, 142, 'Plateau', 'Plateau', 'Y');
INSERT INTO `state` VALUES(2218, 142, 'Sokoto', 'Sokoto', 'Y');
INSERT INTO `state` VALUES(2219, 142, 'Kaduna', 'Kaduna', 'Y');
INSERT INTO `state` VALUES(2220, 142, 'Bayelsa', 'Bayelsa', 'Y');
INSERT INTO `state` VALUES(2221, 142, 'Yobe', 'Yobe', 'Y');
INSERT INTO `state` VALUES(2222, 142, 'Adamawa', 'Adamawa', 'Y');
INSERT INTO `state` VALUES(2223, 142, 'Akwa Ibom', 'Akwa Ibom', 'Y');
INSERT INTO `state` VALUES(2224, 143, '', '', 'Y');
INSERT INTO `state` VALUES(2225, 144, '', '', 'Y');
INSERT INTO `state` VALUES(2226, 145, 'Saipan', 'Saipan', 'Y');
INSERT INTO `state` VALUES(2227, 145, 'n.a.', 'n.a.', 'Y');
INSERT INTO `state` VALUES(2228, 145, 'Tinian', 'Tinian', 'Y');
INSERT INTO `state` VALUES(2229, 145, 'Northern Islands', 'Northern Islands', 'Y');
INSERT INTO `state` VALUES(2230, 145, 'Rota', 'Rota', 'Y');
INSERT INTO `state` VALUES(2231, 146, 'Ad Dakhiliyah', '"ad-Da&#295;&#299;l&#299;yah"', 'Y');
INSERT INTO `state` VALUES(2232, 146, 'Al Batinah', '"al-B&#257;&#355;inah"', 'Y');
INSERT INTO `state` VALUES(2233, 146, 'Masqat', 'Masqat', 'Y');
INSERT INTO `state` VALUES(2234, 146, 'Adh-Dhahirah', '"a<u>d</u>-<u>D</u>ah&#299;rah"', 'Y');
INSERT INTO `state` VALUES(2235, 146, 'Musandam', 'Musandam', 'Y');
INSERT INTO `state` VALUES(2236, 146, 'Ash Sharqiyah', '"a&#353;-&#352;arq&#299;yah"', 'Y');
INSERT INTO `state` VALUES(2237, 146, 'Dhufar', '"<u>D</u>&#363;far"', 'Y');
INSERT INTO `state` VALUES(2238, 147, 'Punjab', 'Punjab', 'Y');
INSERT INTO `state` VALUES(2239, 147, 'North-West Frontier', 'North-West Frontier', 'Y');
INSERT INTO `state` VALUES(2240, 147, 'Sind', 'Sind', 'Y');
INSERT INTO `state` VALUES(2241, 147, 'Federally administered Tribal Areas', 'Federally administered Tribal Areas', 'Y');
INSERT INTO `state` VALUES(2242, 147, 'Baluchistan', 'Baluchistan', 'Y');
INSERT INTO `state` VALUES(2243, 147, 'Northern Areas', 'Northern Areas', 'Y');
INSERT INTO `state` VALUES(2244, 147, 'Federal Capital Area', 'Federal Capital Area', 'Y');
INSERT INTO `state` VALUES(2245, 147, 'Azad Kashmir', 'Azad Kashmir', 'Y');
INSERT INTO `state` VALUES(2246, 148, 'Airai', 'Airai', 'Y');
INSERT INTO `state` VALUES(2247, 148, 'Ngardmau', 'Ngardmau', 'Y');
INSERT INTO `state` VALUES(2248, 148, 'Sonsorol', 'Sonsorol', 'Y');
INSERT INTO `state` VALUES(2249, 148, 'Hatobohei', 'Hatobohei', 'Y');
INSERT INTO `state` VALUES(2250, 148, 'Ngerchelong', 'Ngerchelong', 'Y');
INSERT INTO `state` VALUES(2251, 148, 'Kayangel', 'Kayangel', 'Y');
INSERT INTO `state` VALUES(2252, 148, 'Peleliu', 'Peleliu', 'Y');
INSERT INTO `state` VALUES(2253, 148, 'Koror', 'Koror', 'Y');
INSERT INTO `state` VALUES(2254, 148, 'Melekeok', 'Melekeok', 'Y');
INSERT INTO `state` VALUES(2255, 148, 'Angaur', 'Angaur', 'Y');
INSERT INTO `state` VALUES(2256, 148, 'Ngchesar', 'Ngchesar', 'Y');
INSERT INTO `state` VALUES(2257, 148, 'Ngaraard', 'Ngaraard', 'Y');
INSERT INTO `state` VALUES(2258, 148, 'Ngiwal', 'Ngiwal', 'Y');
INSERT INTO `state` VALUES(2259, 148, 'Ngatpang', 'Ngatpang', 'Y');
INSERT INTO `state` VALUES(2260, 148, 'Ngaremlengui', 'Ngaremlengui', 'Y');
INSERT INTO `state` VALUES(2261, 148, 'Aimeliik', 'Aimeliik', 'Y');
INSERT INTO `state` VALUES(2262, 149, 'Ariha', '"Ar&#299;h&#257;"', 'Y');
INSERT INTO `state` VALUES(2263, 149, 'Khan Yunis', '"&#294;&#257;n Y&#363;nis"', 'Y');
INSERT INTO `state` VALUES(2264, 149, 'Ghazzah ash-Shamaliyah', '"&#288;azzah a&#353;-&#352;am&#257;liyah"', 'Y');
INSERT INTO `state` VALUES(2265, 149, 'Bayt Lahm', '"Bayt La&#293;m"', 'Y');
INSERT INTO `state` VALUES(2266, 149, 'Ram Allah wal-Birah', '"R&#257;m All&#257;h wal-B&#299;rah"', 'Y');
INSERT INTO `state` VALUES(2267, 149, 'Dayr-al-Balah', 'Dayr-al-Balah', 'Y');
INSERT INTO `state` VALUES(2268, 149, 'al-khalil', '"al-&#294;al&#299;l"', 'Y');
INSERT INTO `state` VALUES(2269, 149, 'Ghazzah', '"&#288;azzah"', 'Y');
INSERT INTO `state` VALUES(2270, 149, 'Janin', 'Janin', 'Y');
INSERT INTO `state` VALUES(2271, 149, 'al-Quds', 'al-Quds', 'Y');
INSERT INTO `state` VALUES(2272, 149, 'Nabulus', '"N&#257;bulus"', 'Y');
INSERT INTO `state` VALUES(2273, 149, 'Qalqilyah', '"Qalq&#299;lyah"', 'Y');
INSERT INTO `state` VALUES(2274, 149, 'Rafah', '"Rafa&#293;"', 'Y');
INSERT INTO `state` VALUES(2275, 149, 'Salfit', '"Salf&#299;t"', 'Y');
INSERT INTO `state` VALUES(2276, 149, 'Tubas', '"&#354;&#363;b&#257;s"', 'Y');
INSERT INTO `state` VALUES(2277, 149, 'Tulkarm', '"&#354;&#363;lkarm"', 'Y');
INSERT INTO `state` VALUES(2278, 150, 'Cocle', '"Cocl&#233;"', 'Y');
INSERT INTO `state` VALUES(2279, 150, 'Chiriqui­', '"Chiriqu&#237;"', 'Y');
INSERT INTO `state` VALUES(2280, 150, 'Panama', '"Panam&#225;"', 'Y');
INSERT INTO `state` VALUES(2281, 150, 'Veraguas', 'Veraguas', 'Y');
INSERT INTO `state` VALUES(2282, 150, 'Ngobe-Bugle', '"Ng&#246;be Bugl&#233;"', 'Y');
INSERT INTO `state` VALUES(2283, 150, 'Bocas del Toro', 'Bocas del Toro', 'Y');
INSERT INTO `state` VALUES(2284, 150, 'Herrera', 'Herrera', 'Y');
INSERT INTO `state` VALUES(2285, 150, 'Embera', '"Ember&#225;"', 'Y');
INSERT INTO `state` VALUES(2286, 150, 'Colon', '"Col&#243;n"', 'Y');
INSERT INTO `state` VALUES(2287, 150, 'Kuna Yala', 'Kuna Yala', 'Y');
INSERT INTO `state` VALUES(2288, 150, 'Darien', '"Dari&#233;n"', 'Y');
INSERT INTO `state` VALUES(2289, 150, 'Los Santos', 'Los Santos', 'Y');
INSERT INTO `state` VALUES(2290, 151, 'East Sepik', 'East Sepik', 'Y');
INSERT INTO `state` VALUES(2291, 151, 'Milne Bay', 'Milne Bay', 'Y');
INSERT INTO `state` VALUES(2292, 151, 'North Solomons', 'North Solomons', 'Y');
INSERT INTO `state` VALUES(2293, 151, 'Morobe', 'Morobe', 'Y');
INSERT INTO `state` VALUES(2294, 151, 'Fly River', 'Fly River', 'Y');
INSERT INTO `state` VALUES(2295, 151, 'Madang', 'Madang', 'Y');
INSERT INTO `state` VALUES(2296, 151, 'Eastern Highlands', 'Eastern Highlands', 'Y');
INSERT INTO `state` VALUES(2297, 151, 'West New Britain', 'West New Britain', 'Y');
INSERT INTO `state` VALUES(2298, 151, 'New Ireland', 'New Ireland', 'Y');
INSERT INTO `state` VALUES(2299, 151, 'Gulf', 'Gulf', 'Y');
INSERT INTO `state` VALUES(2300, 151, 'Oro', 'Oro', 'Y');
INSERT INTO `state` VALUES(2301, 151, 'East New Britain', 'East New Britain', 'Y');
INSERT INTO `state` VALUES(2302, 151, 'Simbu', 'Simbu', 'Y');
INSERT INTO `state` VALUES(2303, 151, 'Enga', 'Enga', 'Y');
INSERT INTO `state` VALUES(2304, 151, 'Manus', 'Manus', 'Y');
INSERT INTO `state` VALUES(2305, 151, 'Southern Highlands', 'Southern Highlands', 'Y');
INSERT INTO `state` VALUES(2306, 151, 'Western Highlands', 'Western Highlands', 'Y');
INSERT INTO `state` VALUES(2307, 151, 'National Capital District', 'National Capital District', 'Y');
INSERT INTO `state` VALUES(2308, 151, 'Sandaun', 'Sandaun', 'Y');
INSERT INTO `state` VALUES(2309, 152, 'Caazapa', '"Caazap&#225;"', 'Y');
INSERT INTO `state` VALUES(2310, 152, 'Paraguari­', '"Paraguar&#237;"', 'Y');
INSERT INTO `state` VALUES(2311, 152, 'San Pedro', 'San Pedro', 'Y');
INSERT INTO `state` VALUES(2312, 152, 'Neembucu', '"&#209;eembuc&#250;"', 'Y');
INSERT INTO `state` VALUES(2313, 152, 'Cordillera', 'Cordillera', 'Y');
INSERT INTO `state` VALUES(2314, 152, 'Itapua', '"Itap&#250;a"', 'Y');
INSERT INTO `state` VALUES(2315, 152, 'Central', 'Central', 'Y');
INSERT INTO `state` VALUES(2316, 152, 'Asuncion', '"Asunci&#243;n"', 'Y');
INSERT INTO `state` VALUES(2317, 152, 'Misiones', 'Misiones', 'Y');
INSERT INTO `state` VALUES(2318, 152, 'Concepcion', '"Concepci&#243;n"', 'Y');
INSERT INTO `state` VALUES(2319, 152, 'Amambay', 'Amambay', 'Y');
INSERT INTO `state` VALUES(2320, 152, 'Presidente Hayes', 'Presidente Hayes', 'Y');
INSERT INTO `state` VALUES(2321, 152, 'Guaira', '"Guair&#225;"', 'Y');
INSERT INTO `state` VALUES(2322, 152, 'Caaguazu', '"Caaguaz&#250;"', 'Y');
INSERT INTO `state` VALUES(2323, 152, 'Alto Parana', '"Alto Paran&#225;"', 'Y');
INSERT INTO `state` VALUES(2324, 152, 'Canendiyu', '"Canendiy&#250;"', 'Y');
INSERT INTO `state` VALUES(2325, 152, 'Boqueron', '"Boquer&#243;n"', 'Y');
INSERT INTO `state` VALUES(2326, 152, 'Alto Paraguay', 'Alto Paraguay', 'Y');
INSERT INTO `state` VALUES(2327, 153, 'Apurimac', '"Apur&#237;mac"', 'Y');
INSERT INTO `state` VALUES(2328, 153, 'Arequipa', 'Arequipa', 'Y');
INSERT INTO `state` VALUES(2329, 153, 'JunÃ­n', '"Jun&#237;n"', 'Y');
INSERT INTO `state` VALUES(2330, 153, 'Tumbes', 'Tumbes', 'Y');
INSERT INTO `state` VALUES(2331, 153, 'Huanuco', '"Hu&#225;nuco"', 'Y');
INSERT INTO `state` VALUES(2332, 153, 'Cusco', 'Cusco', 'Y');
INSERT INTO `state` VALUES(2333, 153, 'La Libertad', 'La Libertad', 'Y');
INSERT INTO `state` VALUES(2334, 153, 'Piura', 'Piura', 'Y');
INSERT INTO `state` VALUES(2335, 153, 'Ayacucho', 'Ayacucho', 'Y');
INSERT INTO `state` VALUES(2336, 153, 'Puno', 'Puno', 'Y');
INSERT INTO `state` VALUES(2337, 153, 'Amazonas', 'Amazonas', 'Y');
INSERT INTO `state` VALUES(2338, 153, 'Cajamarca', 'Cajamarca', 'Y');
INSERT INTO `state` VALUES(2339, 153, 'Lima y Callao', 'Lima y Callao', 'Y');
INSERT INTO `state` VALUES(2340, 153, 'Loreto', 'Loreto', 'Y');
INSERT INTO `state` VALUES(2341, 153, 'San MartÃ­n', '"San Mart&#237;n"', 'Y');
INSERT INTO `state` VALUES(2342, 153, 'Ucayali', 'Ucayali', 'Y');
INSERT INTO `state` VALUES(2343, 153, 'Ancash', 'Ancash', 'Y');
INSERT INTO `state` VALUES(2344, 153, 'Pasco', 'Pasco', 'Y');
INSERT INTO `state` VALUES(2345, 153, 'Lambayeque', 'Lambayeque', 'Y');
INSERT INTO `state` VALUES(2346, 153, 'Ica', 'Ica', 'Y');
INSERT INTO `state` VALUES(2347, 153, 'Huancavelica', 'Huancavelica', 'Y');
INSERT INTO `state` VALUES(2348, 153, 'Madre de Dios', 'Madre de Dios', 'Y');
INSERT INTO `state` VALUES(2349, 153, 'Tacna', 'Tacna', 'Y');
INSERT INTO `state` VALUES(2350, 153, 'Moquegua', 'Moquegua', 'Y');
INSERT INTO `state` VALUES(2351, 154, 'Central Luzon', 'Central Luzon', 'Y');
INSERT INTO `state` VALUES(2352, 154, 'Southern Tagalog', 'Southern Tagalog', 'Y');
INSERT INTO `state` VALUES(2353, 154, 'Western Visayas', 'Western Visayas', 'Y');
INSERT INTO `state` VALUES(2354, 154, 'Cordillera', 'Cordillera', 'Y');
INSERT INTO `state` VALUES(2355, 154, 'Central Visayas', 'Central Visayas', 'Y');
INSERT INTO `state` VALUES(2356, 154, 'Caraga', 'Caraga', 'Y');
INSERT INTO `state` VALUES(2357, 154, 'Northern Mindanao', 'Northern Mindanao', 'Y');
INSERT INTO `state` VALUES(2358, 154, 'Eastern Visayas', 'Eastern Visayas', 'Y');
INSERT INTO `state` VALUES(2359, 154, 'Central Mindanao', 'Central Mindanao', 'Y');
INSERT INTO `state` VALUES(2360, 154, 'Bicol', 'Bicol', 'Y');
INSERT INTO `state` VALUES(2361, 154, 'Ilocos', 'Ilocos', 'Y');
INSERT INTO `state` VALUES(2362, 154, 'Western Mindanao', 'Western Mindanao', 'Y');
INSERT INTO `state` VALUES(2363, 154, 'Southern Mindanao', 'Southern Mindanao', 'Y');
INSERT INTO `state` VALUES(2364, 154, 'National Capital Region', 'National Capital Region', 'Y');
INSERT INTO `state` VALUES(2365, 154, 'Cagayan', 'Cagayan', 'Y');
INSERT INTO `state` VALUES(2366, 154, 'Muslim Mindanao', 'Muslim Mindanao', 'Y');
INSERT INTO `state` VALUES(2367, 154, 'n.a.', 'n.a.', 'Y');
INSERT INTO `state` VALUES(2368, 155, 'Kujawsko-Pomorskie', 'Kujawsko-Pomorskie', 'Y');
INSERT INTO `state` VALUES(2369, 155, 'Lodzkie', '"&#321;&#243;dzkie"', 'Y');
INSERT INTO `state` VALUES(2370, 155, 'Malopolskie', '"Ma&#322;opolskie"', 'Y');
INSERT INTO `state` VALUES(2371, 155, 'Podlaskie', 'Podlaskie', 'Y');
INSERT INTO `state` VALUES(2372, 155, 'Zachodnio-Pomorskie', 'Zachodnio-Pomorskie', 'Y');
INSERT INTO `state` VALUES(2373, 155, 'Warminsko-Mazurskie', '"Warmi&#324;sko-Mazurskie"', 'Y');
INSERT INTO `state` VALUES(2374, 155, 'Slaskie', '"&#346;l&#261;skie"', 'Y');
INSERT INTO `state` VALUES(2375, 155, 'Lubelskie', 'Lubelskie', 'Y');
INSERT INTO `state` VALUES(2376, 155, 'Dolnoslaskie', '"Dolno&#347;l&#261;skie"', 'Y');
INSERT INTO `state` VALUES(2377, 155, 'Mazowieckie', 'Mazowieckie', 'Y');
INSERT INTO `state` VALUES(2378, 155, 'Opolskie', 'Opolskie', 'Y');
INSERT INTO `state` VALUES(2379, 155, 'Swietokrzyskie', '"&#346;wi&#281;tokrzyskie"', 'Y');
INSERT INTO `state` VALUES(2380, 155, 'Pomorskie', 'Pomorskie', 'Y');
INSERT INTO `state` VALUES(2381, 155, 'Wielkopolskie', 'Wielkopolskie', 'Y');
INSERT INTO `state` VALUES(2382, 155, 'Podkarpackie', 'Podkarpackie', 'Y');
INSERT INTO `state` VALUES(2383, 155, 'Lubuskie', 'Lubuskie', 'Y');
INSERT INTO `state` VALUES(2384, 156, 'Lisboa e Vale do Tejo', 'Lisboa e Vale do Tejo', 'Y');
INSERT INTO `state` VALUES(2385, 156, 'Centro', 'Centro', 'Y');
INSERT INTO `state` VALUES(2386, 156, 'Norte', 'Norte', 'Y');
INSERT INTO `state` VALUES(2387, 156, 'Algarve', 'Algarve', 'Y');
INSERT INTO `state` VALUES(2388, 156, 'Alentejo', 'Alentejo', 'Y');
INSERT INTO `state` VALUES(2389, 156, 'Acores', '"A&#231;ores"', 'Y');
INSERT INTO `state` VALUES(2390, 156, 'Madeira', 'Madeira', 'Y');
INSERT INTO `state` VALUES(2391, 157, 'Ponce', 'Ponce', 'Y');
INSERT INTO `state` VALUES(2392, 157, 'Mayaguez-Aguadilla', '"Mayag&#252;ez-Aguadilla"', 'Y');
INSERT INTO `state` VALUES(2393, 157, 'Humacao', 'Humacao', 'Y');
INSERT INTO `state` VALUES(2394, 157, 'Guayama', 'Guayama', 'Y');
INSERT INTO `state` VALUES(2395, 157, 'Arecibo', 'Arecibo', 'Y');
INSERT INTO `state` VALUES(2396, 157, 'Bayamon', '"Bayam&#243;n"', 'Y');
INSERT INTO `state` VALUES(2397, 157, 'n.a.', 'n.a.', 'Y');
INSERT INTO `state` VALUES(2398, 157, 'Carolina', 'Carolina', 'Y');
INSERT INTO `state` VALUES(2399, 157, 'San Juan', 'San Juan', 'Y');
INSERT INTO `state` VALUES(2400, 158, 'ad-Dawhah', 'ad-Dawhah', 'Y');
INSERT INTO `state` VALUES(2401, 158, 'al-Jumayliyah', '"al-Jumayl&#299;yah"', 'Y');
INSERT INTO `state` VALUES(2402, 158, 'Al Ghuwayriyah', '"al-&#288;uwayr&#299;yah"', 'Y');
INSERT INTO `state` VALUES(2403, 158, 'al-Khawr', '"al-&#294;awr"', 'Y');
INSERT INTO `state` VALUES(2404, 158, 'al-Wakrah', 'al-Wakrah', 'Y');
INSERT INTO `state` VALUES(2405, 158, 'Ar Rayyan', '"ar-Rayy&#257;n"', 'Y');
INSERT INTO `state` VALUES(2406, 158, 'ash Shamal', '"a&#353;-&#352;am&#257;l"', 'Y');
INSERT INTO `state` VALUES(2407, 158, 'Jarian-al-Batnah', 'Jarian-al-Batnah', 'Y');
INSERT INTO `state` VALUES(2408, 158, 'Umm Salal', '"Umm &#350;al&#257;l"', 'Y');
INSERT INTO `state` VALUES(2409, 159, 'Saint-Benoit', '"Saint-Beno&#238;t"', 'Y');
INSERT INTO `state` VALUES(2410, 159, 'Saint-Pierre', 'Saint-Pierre', 'Y');
INSERT INTO `state` VALUES(2411, 159, 'Saint-Denis', 'Saint-Denis', 'Y');
INSERT INTO `state` VALUES(2412, 159, 'Saint-Paul', 'Saint-Paul', 'Y');
INSERT INTO `state` VALUES(2413, 160, 'Bihor', 'Bihor', 'Y');
INSERT INTO `state` VALUES(2414, 160, 'Alba', 'Alba', 'Y');
INSERT INTO `state` VALUES(2415, 160, 'Satu Mare', 'Satu Mare', 'Y');
INSERT INTO `state` VALUES(2416, 160, 'Mures', '"Mure&#351;"', 'Y');
INSERT INTO `state` VALUES(2417, 160, 'Constanta', '"Constan&#355;a"', 'Y');
INSERT INTO `state` VALUES(2418, 160, 'Ialomita', '"Ialomi&#355;a"', 'Y');
INSERT INTO `state` VALUES(2419, 160, 'Suceava', 'Suceava', 'Y');
INSERT INTO `state` VALUES(2420, 160, 'Vrancea', 'Vrancea', 'Y');
INSERT INTO `state` VALUES(2421, 160, 'Prahova', 'Prahova', 'Y');
INSERT INTO `state` VALUES(2422, 160, 'Giurgiu', 'Giurgiu', 'Y');
INSERT INTO `state` VALUES(2423, 160, 'Dolj', 'Dolj', 'Y');
INSERT INTO `state` VALUES(2424, 160, 'Ilfov', 'Ilfov', 'Y');
INSERT INTO `state` VALUES(2425, 160, 'Neamt', '"Neam&#355;"', 'Y');
INSERT INTO `state` VALUES(2426, 160, 'Bacau', '"Bac&#259;u"', 'Y');
INSERT INTO `state` VALUES(2427, 160, 'Cluj', 'Cluj', 'Y');
INSERT INTO `state` VALUES(2428, 160, 'Sibiu', 'Sibiu', 'Y');
INSERT INTO `state` VALUES(2429, 160, 'Salaj', '"S&#259;laj"', 'Y');
INSERT INTO `state` VALUES(2430, 160, 'Covasna', 'Covasna', 'Y');
INSERT INTO `state` VALUES(2431, 160, 'Gorj', 'Gorj', 'Y');
INSERT INTO `state` VALUES(2432, 160, 'Arges', '"Arge&#351;"', 'Y');
INSERT INTO `state` VALUES(2433, 160, 'Botosani', '"Boto&#351;ani"', 'Y');
INSERT INTO `state` VALUES(2434, 160, 'Vaslui', 'Vaslui', 'Y');
INSERT INTO `state` VALUES(2435, 160, 'Teleorman', 'Teleorman', 'Y');
INSERT INTO `state` VALUES(2436, 160, 'Iasi', '"Ia&#351;i"', 'Y');
INSERT INTO `state` VALUES(2437, 160, 'Calarasi', '"C&#259;l&#259;ra&#351;i"', 'Y');
INSERT INTO `state` VALUES(2438, 160, 'Arad', 'Arad', 'Y');
INSERT INTO `state` VALUES(2439, 160, 'Valcea', '"V&#226;lcea"', 'Y');
INSERT INTO `state` VALUES(2440, 160, 'Buzau', '"Buz&#259;u"', 'Y');
INSERT INTO `state` VALUES(2441, 160, 'Caras-Severin', '"Cara&#351;-Severin"', 'Y');
INSERT INTO `state` VALUES(2442, 160, 'Dambovita', '"D&#226;mbovi&#355;a"', 'Y');
INSERT INTO `state` VALUES(2443, 160, 'Hunedoara', 'Hunedoara', 'Y');
INSERT INTO `state` VALUES(2444, 160, 'Brasov', '"Bra&#351;ov"', 'Y');
INSERT INTO `state` VALUES(2445, 160, 'Maramures', '"Maramure&#351;"', 'Y');
INSERT INTO `state` VALUES(2446, 160, 'Harghita', 'Harghita', 'Y');
INSERT INTO `state` VALUES(2447, 160, 'Tulcea', 'Tulcea', 'Y');
INSERT INTO `state` VALUES(2448, 160, 'Olt', 'Olt', 'Y');
INSERT INTO `state` VALUES(2449, 160, 'Mehedinti', '"Mehedin&#355;i"', 'Y');
INSERT INTO `state` VALUES(2450, 160, 'Galati', '"Gala&#355;i"', 'Y');
INSERT INTO `state` VALUES(2451, 160, 'Timis', '"Timi&#351;"', 'Y');
INSERT INTO `state` VALUES(2452, 160, 'Braila', '"Br&#259;ila"', 'Y');
INSERT INTO `state` VALUES(2453, 160, 'Bistrita-Nasaud', '"Bistri&#355;a-N&#259;s&#259;ud"', 'Y');
INSERT INTO `state` VALUES(2454, 160, 'Bucuresti', '"Bucure&#351;ti"', 'Y');
INSERT INTO `state` VALUES(2455, 161, 'Al Ayun', '"al-<sup><small>c</small></sup>Ay&#363;n"', 'Y');
INSERT INTO `state` VALUES(2456, 161, 'Bu Jaydur', '"B&#363; Jayd&#363;r"', 'Y');
INSERT INTO `state` VALUES(2457, 161, 'Wad-adh-Dhahab', 'Wad-a<u>d</u>-<u>D</u>ahab', 'Y');
INSERT INTO `state` VALUES(2458, 161, 'as-Samarah', '"as-Sam&#257;rah"', 'Y');
INSERT INTO `state` VALUES(2459, 162, 'Saint George Basseterre', 'Saint George Basseterre', 'Y');
INSERT INTO `state` VALUES(2460, 162, 'Trinity Palmetto Point', 'Trinity Palmetto Point', 'Y');
INSERT INTO `state` VALUES(2461, 162, 'Saint Mary Cayon', 'Saint Mary Cayon', 'Y');
INSERT INTO `state` VALUES(2462, 162, 'Saint Paul Charlestown', 'Saint Paul Charlestown', 'Y');
INSERT INTO `state` VALUES(2463, 162, 'Saint Thomas Lowland', 'Saint Thomas Lowland', 'Y');
INSERT INTO `state` VALUES(2464, 162, 'Saint John Capesterre', 'Saint John Capesterre', 'Y');
INSERT INTO `state` VALUES(2465, 162, 'Saint John Figtree', 'Saint John Figtree', 'Y');
INSERT INTO `state` VALUES(2466, 162, 'Saint George Gingerland', 'Saint George Gingerland', 'Y');
INSERT INTO `state` VALUES(2467, 162, 'Christ Church Nichola Town', 'Christ Church Nichola Town', 'Y');
INSERT INTO `state` VALUES(2468, 162, 'Saint Thomas Middle Island', 'Saint Thomas Middle Island', 'Y');
INSERT INTO `state` VALUES(2469, 162, 'Saint Peter Basseterre', 'Saint Peter Basseterre', 'Y');
INSERT INTO `state` VALUES(2470, 162, 'Saint James Windward', 'Saint James Windward', 'Y');
INSERT INTO `state` VALUES(2471, 162, 'Saint Paul Capesterre', 'Saint Paul Capesterre', 'Y');
INSERT INTO `state` VALUES(2472, 162, 'Saint Anne Sandy Point', 'Saint Anne Sandy Point', 'Y');
INSERT INTO `state` VALUES(2473, 163, 'Anse-la-Raye', 'Anse-la-Raye', 'Y');
INSERT INTO `state` VALUES(2474, 163, 'Canaries', 'Canaries', 'Y');
INSERT INTO `state` VALUES(2475, 163, 'Gros Inlet', 'Gros Inlet', 'Y');
INSERT INTO `state` VALUES(2476, 163, 'Castries', 'Castries', 'Y');
INSERT INTO `state` VALUES(2477, 163, 'Choiseul', 'Choiseul', 'Y');
INSERT INTO `state` VALUES(2478, 163, 'Dennery', 'Dennery', 'Y');
INSERT INTO `state` VALUES(2479, 163, 'Laborie', 'Laborie', 'Y');
INSERT INTO `state` VALUES(2480, 163, 'Micoud', 'Micoud', 'Y');
INSERT INTO `state` VALUES(2481, 163, 'SoufriÃ¨re', '"Soufri&#232;re"', 'Y');
INSERT INTO `state` VALUES(2482, 163, 'Vieux Fort', 'Vieux Fort', 'Y');
INSERT INTO `state` VALUES(2483, 164, 'Miquelon-Langlade', 'Miquelon-Langlade', 'Y');
INSERT INTO `state` VALUES(2484, 164, 'Saint-Pierre', 'Saint-Pierre', 'Y');
INSERT INTO `state` VALUES(2485, 165, 'Vizcaya', 'Vizcaya', 'Y');
INSERT INTO `state` VALUES(2486, 165, 'Murcia', 'Murcia', 'Y');
INSERT INTO `state` VALUES(2487, 165, 'Barcelona', 'Barcelona', 'Y');
INSERT INTO `state` VALUES(2488, 165, 'A Coruna', '"A Coru&#241;a"', 'Y');
INSERT INTO `state` VALUES(2489, 165, 'Santa Cruz de Tenerife', 'Santa Cruz de Tenerife', 'Y');
INSERT INTO `state` VALUES(2490, 165, 'Almeria', '"Almer&#237;a"', 'Y');
INSERT INTO `state` VALUES(2491, 165, 'Pontevedra', 'Pontevedra', 'Y');
INSERT INTO `state` VALUES(2492, 165, 'Cordoba', '"C&#243;rdoba"', 'Y');
INSERT INTO `state` VALUES(2493, 165, 'Las Palmas', 'Las Palmas', 'Y');
INSERT INTO `state` VALUES(2494, 165, 'Alacant', 'Alacant', 'Y');
INSERT INTO `state` VALUES(2495, 165, 'Valencia', 'Valencia', 'Y');
INSERT INTO `state` VALUES(2496, 165, 'Albacete', 'Albacete', 'Y');
INSERT INTO `state` VALUES(2497, 165, 'Granada', 'Granada', 'Y');
INSERT INTO `state` VALUES(2498, 165, 'Sevilla', 'Sevilla', 'Y');
INSERT INTO `state` VALUES(2499, 165, 'Madrid', 'Madrid', 'Y');
INSERT INTO `state` VALUES(2500, 165, 'Jaen', '"Ja&#233;n"', 'Y');
INSERT INTO `state` VALUES(2501, 165, 'Tarragona', 'Tarragona', 'Y');
INSERT INTO `state` VALUES(2502, 165, 'Teruel', 'Teruel', 'Y');
INSERT INTO `state` VALUES(2503, 165, 'Ciudad Real', 'Ciudad Real', 'Y');
INSERT INTO `state` VALUES(2504, 165, 'Balears', 'Balears', 'Y');
INSERT INTO `state` VALUES(2505, 165, 'La Rioja', 'La Rioja', 'Y');
INSERT INTO `state` VALUES(2506, 165, 'Cadiz', '"C&#225;diz"', 'Y');
INSERT INTO `state` VALUES(2507, 165, 'Malaga', '"M&#225;laga"', 'Y');
INSERT INTO `state` VALUES(2508, 165, 'Huelva', 'Huelva', 'Y');
INSERT INTO `state` VALUES(2509, 165, 'Asturias', 'Asturias', 'Y');
INSERT INTO `state` VALUES(2510, 165, 'Castello', '"Castell&#243;"', 'Y');
INSERT INTO `state` VALUES(2511, 165, 'Badajoz', 'Badajoz', 'Y');
INSERT INTO `state` VALUES(2512, 165, 'Alava', '"&#193;lava"', 'Y');
INSERT INTO `state` VALUES(2513, 165, 'Guipuzcoa', '"Guip&#250;zcoa"', 'Y');
INSERT INTO `state` VALUES(2514, 165, 'Navarra', 'Navarra', 'Y');
INSERT INTO `state` VALUES(2515, 165, 'Burgos', 'Burgos', 'Y');
INSERT INTO `state` VALUES(2516, 165, 'Leon', '"Le&#243;n"', 'Y');
INSERT INTO `state` VALUES(2517, 165, 'Avila', '"&#193;vila"', 'Y');
INSERT INTO `state` VALUES(2518, 165, 'Guadalajara', 'Guadalajara', 'Y');
INSERT INTO `state` VALUES(2519, 165, 'Lleida', 'Lleida', 'Y');
INSERT INTO `state` VALUES(2520, 165, 'Girona', 'Girona', 'Y');
INSERT INTO `state` VALUES(2521, 165, 'Huesca', 'Huesca', 'Y');
INSERT INTO `state` VALUES(2522, 165, 'Salamanca', 'Salamanca', 'Y');
INSERT INTO `state` VALUES(2523, 165, 'Zamora', 'Zamora', 'Y');
INSERT INTO `state` VALUES(2524, 165, 'Lugo', 'Lugo', 'Y');
INSERT INTO `state` VALUES(2525, 165, 'Caceres', '"C&#225;ceres"', 'Y');
INSERT INTO `state` VALUES(2526, 165, 'Zaragoza', 'Zaragoza', 'Y');
INSERT INTO `state` VALUES(2527, 165, 'Cantabria', 'Cantabria', 'Y');
INSERT INTO `state` VALUES(2528, 165, 'Ceuta', 'Ceuta', 'Y');
INSERT INTO `state` VALUES(2529, 165, 'Toledo', 'Toledo', 'Y');
INSERT INTO `state` VALUES(2530, 165, 'Segovia', 'Segovia', 'Y');
INSERT INTO `state` VALUES(2531, 165, 'Cuenca', 'Cuenca', 'Y');
INSERT INTO `state` VALUES(2532, 165, 'Palencia', 'Palencia', 'Y');
INSERT INTO `state` VALUES(2533, 165, 'Valladolid', 'Valladolid', 'Y');
INSERT INTO `state` VALUES(2534, 165, 'Melilla', 'Melilla', 'Y');
INSERT INTO `state` VALUES(2535, 165, 'Ourense', 'Ourense', 'Y');
INSERT INTO `state` VALUES(2536, 165, 'Soria', 'Soria', 'Y');
INSERT INTO `state` VALUES(2537, 166, 'Galla', '"G&#257;lla"', 'Y');
INSERT INTO `state` VALUES(2538, 166, 'Amparai', 'Amparai', 'Y');
INSERT INTO `state` VALUES(2539, 166, 'Anuradhapuraya', '"Anur&#257;dhap&#363;raya"', 'Y');
INSERT INTO `state` VALUES(2540, 166, 'Badulla', 'Badulla', 'Y');
INSERT INTO `state` VALUES(2541, 166, 'Ratnapuraya', '"Ratnap&#363;raya"', 'Y');
INSERT INTO `state` VALUES(2542, 166, 'Kolamba', 'Kolamba', 'Y');
INSERT INTO `state` VALUES(2543, 166, 'Kalatura', 'Kalatura', 'Y');
INSERT INTO `state` VALUES(2544, 166, 'Yapanaya', '"Y&#257;panaya"', 'Y');
INSERT INTO `state` VALUES(2545, 166, 'Gampaha', 'Gampaha', 'Y');
INSERT INTO `state` VALUES(2546, 166, 'Matale', 'Matale', 'Y');
INSERT INTO `state` VALUES(2547, 166, 'Madakalpuwa', '"Mad&#808;akalp&#363;wa"', 'Y');
INSERT INTO `state` VALUES(2548, 166, 'Maha Nuwara', 'Maha Nuwara', 'Y');
INSERT INTO `state` VALUES(2549, 166, 'Puttalama', '"P&#363;ttalama"', 'Y');
INSERT INTO `state` VALUES(2550, 166, 'Hambantota', 'Hambantota', 'Y');
INSERT INTO `state` VALUES(2551, 166, 'Kegalla', 'Kegalla', 'Y');
INSERT INTO `state` VALUES(2552, 166, 'Kilinochchi', 'Kilinochchi', 'Y');
INSERT INTO `state` VALUES(2553, 166, 'Kurunegala', 'Kurunegala', 'Y');
INSERT INTO `state` VALUES(2554, 166, 'Mannarama', '"Mann&#257;rama"', 'Y');
INSERT INTO `state` VALUES(2555, 166, 'Matara', 'Matara', 'Y');
INSERT INTO `state` VALUES(2556, 166, 'Monaragala', 'Monaragala', 'Y');
INSERT INTO `state` VALUES(2557, 166, 'Mullaitivu', 'Mullaitivu', 'Y');
INSERT INTO `state` VALUES(2558, 166, 'Nuwara Eliya', 'Nuwara Eliya', 'Y');
INSERT INTO `state` VALUES(2559, 166, 'Polonnaruwa', 'Polonnaruwa', 'Y');
INSERT INTO `state` VALUES(2560, 166, 'Tirikunamalaya', '"Tirikun&#257;malaya"', 'Y');
INSERT INTO `state` VALUES(2561, 166, 'Vavuniyawa', '"Vavuniy&#257;wa"', 'Y');
INSERT INTO `state` VALUES(2562, 167, 'Thurgau', 'Thurgau', 'Y');
INSERT INTO `state` VALUES(2563, 167, 'Aargau', 'Aargau', 'Y');
INSERT INTO `state` VALUES(2564, 167, 'Luzern', 'Luzern', 'Y');
INSERT INTO `state` VALUES(2565, 167, 'Zurich', '"Z&#252;rich"', 'Y');
INSERT INTO `state` VALUES(2566, 167, 'Basel-Landschaft', 'Basel-Landschaft', 'Y');
INSERT INTO `state` VALUES(2567, 167, 'Vaud', 'Vaud', 'Y');
INSERT INTO `state` VALUES(2568, 167, 'Obwalden', 'Obwalden', 'Y');
INSERT INTO `state` VALUES(2569, 167, 'Uri', 'Uri', 'Y');
INSERT INTO `state` VALUES(2570, 167, 'Schwyz', 'Schwyz', 'Y');
INSERT INTO `state` VALUES(2571, 167, 'Sankt Gallen', 'Sankt Gallen', 'Y');
INSERT INTO `state` VALUES(2572, 167, 'Appenzell Inner-Rhoden', 'Appenzell Inner-Rhoden', 'Y');
INSERT INTO `state` VALUES(2573, 167, 'Graubunden', '"Graub&#252;nden"', 'Y');
INSERT INTO `state` VALUES(2574, 167, 'Ticino', 'Ticino', 'Y');
INSERT INTO `state` VALUES(2575, 167, 'Zug', 'Zug', 'Y');
INSERT INTO `state` VALUES(2576, 167, 'Valais', 'Valais', 'Y');
INSERT INTO `state` VALUES(2577, 167, 'Solothurn', 'Solothurn', 'Y');
INSERT INTO `state` VALUES(2578, 167, 'Basel-Stadt', 'Basel-Stadt', 'Y');
INSERT INTO `state` VALUES(2579, 167, 'Bern', 'Bern', 'Y');
INSERT INTO `state` VALUES(2580, 167, 'geneve', '"Gen&#232;ve"', 'Y');
INSERT INTO `state` VALUES(2581, 167, 'Neuchatel', '"Neuch&#226;tel"', 'Y');
INSERT INTO `state` VALUES(2582, 167, 'Fribourg', 'Fribourg', 'Y');
INSERT INTO `state` VALUES(2583, 167, 'Nidwalden', 'Nidwalden', 'Y');
INSERT INTO `state` VALUES(2584, 167, 'Jura', 'Jura', 'Y');
INSERT INTO `state` VALUES(2585, 167, 'Glarus', 'Glarus', 'Y');
INSERT INTO `state` VALUES(2586, 167, 'Appenzell-Ausser Rhoden', 'Appenzell-Ausser Rhoden', 'Y');
INSERT INTO `state` VALUES(2587, 167, 'Schaffhausen', 'Schaffhausen', 'Y');
INSERT INTO `state` VALUES(2588, 168, 'Abu Zabi', '"Ab&#363; Z&#808;abi"', 'Y');
INSERT INTO `state` VALUES(2589, 168, 'Ajman', '<sup><small>c</small></sup>Ajman', 'Y');
INSERT INTO `state` VALUES(2590, 168, 'Dubayy', 'Dubayy', 'Y');
INSERT INTO `state` VALUES(2591, 168, 'al-Fujayrah', 'al-Fujayrah', 'Y');
INSERT INTO `state` VALUES(2592, 168, 'Ras al-Khaymah', '"Ras al-&#294;aymah"', 'Y');
INSERT INTO `state` VALUES(2593, 168, 'Ash Shariqah', '"a&#353;-&#352;&#257;riqah"', 'Y');
INSERT INTO `state` VALUES(2594, 168, 'Umm al Qaywayn', 'Umm al Qaywayn', 'Y');
INSERT INTO `state` VALUES(2595, 169, 'Wales', 'Wales', 'Y');
INSERT INTO `state` VALUES(2596, 169, 'Scotland', 'Scotland', 'Y');
INSERT INTO `state` VALUES(2597, 169, 'England', 'England', 'Y');
INSERT INTO `state` VALUES(2598, 169, 'Northern Ireland', 'Northern Ireland', 'Y');
INSERT INTO `state` VALUES(2599, 169, 'n.a.', 'n.a.', 'Y');
INSERT INTO `state` VALUES(2600, 170, 'New Mexico', 'New Mexico', 'Y');
INSERT INTO `state` VALUES(2601, 170, 'New Jersey', 'New Jersey', 'Y');
INSERT INTO `state` VALUES(2602, 170, 'New Hampshire', 'New Hampshire', 'Y');
INSERT INTO `state` VALUES(2603, 170, 'Nevada', 'Nevada', 'Y');
INSERT INTO `state` VALUES(2604, 170, 'Nebraska', 'Nebraska', 'Y');
INSERT INTO `state` VALUES(2605, 170, 'Montana', 'Montana', 'Y');
INSERT INTO `state` VALUES(2606, 170, 'Missouri', 'Missouri', 'Y');
INSERT INTO `state` VALUES(2607, 170, 'Mississippi', 'Mississippi', 'Y');
INSERT INTO `state` VALUES(2608, 170, 'Minnesota', 'Minnesota', 'Y');
INSERT INTO `state` VALUES(2609, 170, 'Michigan', 'Michigan', 'Y');
INSERT INTO `state` VALUES(2610, 170, 'Massachusetts', 'Massachusetts', 'Y');
INSERT INTO `state` VALUES(2611, 170, 'Maryland', 'Maryland', 'Y');
INSERT INTO `state` VALUES(2613, 170, 'Maine', 'Maine', 'Y');
INSERT INTO `state` VALUES(2614, 170, 'Louisiana', 'Louisiana', 'Y');
INSERT INTO `state` VALUES(2615, 170, 'Kentucky', 'Kentucky', 'Y');
INSERT INTO `state` VALUES(2616, 170, 'Kansas', 'Kansas', 'Y');
INSERT INTO `state` VALUES(2617, 170, 'Iowa', 'Iowa', 'Y');
INSERT INTO `state` VALUES(2618, 170, 'Indiana', 'Indiana', 'Y');
INSERT INTO `state` VALUES(2619, 170, 'Illinois', 'Illinois', 'Y');
INSERT INTO `state` VALUES(2620, 170, 'Idaho', 'Idaho', 'Y');
INSERT INTO `state` VALUES(2621, 170, 'Hawaii', 'Hawaii', 'Y');
INSERT INTO `state` VALUES(2623, 170, 'Georgia', 'Georgia', 'Y');
INSERT INTO `state` VALUES(2624, 170, 'Florida', 'Florida', 'Y');
INSERT INTO `state` VALUES(2626, 170, 'District of Columbia', 'District of Columbia', 'Y');
INSERT INTO `state` VALUES(2627, 170, 'Delaware', 'Delaware', 'Y');
INSERT INTO `state` VALUES(2628, 170, 'Connecticut', 'Connecticut', 'Y');
INSERT INTO `state` VALUES(2629, 170, 'Colorado', 'Colorado', 'Y');
INSERT INTO `state` VALUES(2630, 170, 'California', 'California', 'Y');
INSERT INTO `state` VALUES(2631, 170, 'Arkansas', 'Arkansas', 'Y');
INSERT INTO `state` VALUES(2632, 170, 'Arizona', 'Arizona', 'Y');
INSERT INTO `state` VALUES(2634, 170, 'Alaska', 'Alaska', 'Y');
INSERT INTO `state` VALUES(2635, 170, 'Alabama', 'Alabama', 'Y');
INSERT INTO `state` VALUES(2636, 170, 'New York', 'New York', 'Y');
INSERT INTO `state` VALUES(2637, 170, 'North Carolina', 'North Carolina', 'Y');
INSERT INTO `state` VALUES(2638, 170, 'North Dakota', 'North Dakota', 'Y');
INSERT INTO `state` VALUES(2640, 170, 'Ohio', 'Ohio', 'Y');
INSERT INTO `state` VALUES(2641, 170, 'Oklahoma', 'Oklahoma', 'Y');
INSERT INTO `state` VALUES(2642, 170, 'Oregon', 'Oregon', 'Y');
INSERT INTO `state` VALUES(2644, 170, 'Pennsylvania', 'Pennsylvania', 'Y');
INSERT INTO `state` VALUES(2645, 170, 'Puerto Rico', 'Puerto Rico', 'Y');
INSERT INTO `state` VALUES(2646, 170, 'Rhode Island', 'Rhode Island', 'Y');
INSERT INTO `state` VALUES(2647, 170, 'South Carolina', 'South Carolina', 'Y');
INSERT INTO `state` VALUES(2648, 170, 'South Dakota', 'South Dakota', 'Y');
INSERT INTO `state` VALUES(2649, 170, 'Tennessee', 'Tennessee', 'Y');
INSERT INTO `state` VALUES(2650, 170, 'Texas', 'Texas', 'Y');
INSERT INTO `state` VALUES(2651, 170, 'Utah', 'Utah', 'Y');
INSERT INTO `state` VALUES(2652, 170, 'Vermont', 'Vermont', 'Y');
INSERT INTO `state` VALUES(2654, 170, 'Virginia', 'Virginia', 'Y');
INSERT INTO `state` VALUES(2655, 170, 'Washington', 'Washington', 'Y');
INSERT INTO `state` VALUES(2656, 170, 'West Virginia', 'West Virginia', 'Y');
INSERT INTO `state` VALUES(2657, 170, 'Wisconsin', 'Wisconsin', 'Y');
INSERT INTO `state` VALUES(2658, 170, 'Wyoming', 'Wyoming', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `staticpage`
--

CREATE TABLE `staticpage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `content` longtext NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `staticpage`
--

INSERT INTO `staticpage` VALUES(1, 'About Us', '<p>About Us</p>');
INSERT INTO `staticpage` VALUES(4, 'News & Press', '<p>News &amp; Press</p>');
INSERT INTO `staticpage` VALUES(5, 'How to help', '<p>How to help</p>');
INSERT INTO `staticpage` VALUES(6, 'Jobs', '<p>Jobs listing will goes here</p>\r\n<p>&nbsp;</p>');
INSERT INTO `staticpage` VALUES(7, 'Return Policy', 'Coming soon');
INSERT INTO `staticpage` VALUES(8, 'How to order', 'Coming soon');
INSERT INTO `staticpage` VALUES(9, 'Where to Buy', '');
INSERT INTO `staticpage` VALUES(2, 'Contact Us', '<p>Contact Us</p>');
INSERT INTO `staticpage` VALUES(3, 'Our Mission', '<p>Our Mission</p>');
INSERT INTO `staticpage` VALUES(10, 'Activate Your Toshi''s PlayHouse Account', '<p>Hello [NAME],</p>\r\n<p>We\\''ve started an account for you.</p>\r\n<p>Once it\\''s activated, you can track all your Toshi''s PlayHouse activity, save profile information to save time in the future, and more.</p>\r\n<p>To complete the account, please confirm your email address by clicking [ACTIVATIONLINK].</p>\r\n<p>If you can\\''t click on the link, just copy and paste this URL into a web browser, and enter the key code. [ACTIVATIONURL]</p>\r\n<p>Thanks!</p>\r\n<p>Sincerely,<br />\r\nToshi''s PlayHouse Team.<br />\r\n[SITEURL]</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `subscriber`
--

CREATE TABLE `subscriber` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL DEFAULT '',
  `sdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `subscriber`
--

INSERT INTO `subscriber` VALUES(4, 'rpaxis2@gmail.com', '2012-02-11 00:23:32');
INSERT INTO `subscriber` VALUES(6, 'admin@admin.com', '2012-03-08 17:27:06');
INSERT INTO `subscriber` VALUES(5, 'Parth.are@gmail.com', '2012-02-13 08:52:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `regdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `firstname` varchar(100) NOT NULL DEFAULT '',
  `lastname` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(100) NOT NULL DEFAULT '',
  `address1` varchar(255) NOT NULL DEFAULT '',
  `address2` varchar(255) DEFAULT NULL,
  `city` varchar(100) NOT NULL DEFAULT '',
  `state` varchar(100) NOT NULL DEFAULT '',
  `zip` varchar(50) NOT NULL DEFAULT '',
  `country` varchar(100) NOT NULL DEFAULT '',
  `phone` varchar(100) NOT NULL DEFAULT '',
  `fax` varchar(100) DEFAULT NULL,
  `email` varchar(150) NOT NULL DEFAULT '',
  `dob` date DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `genre` varchar(255) DEFAULT NULL,
  `labeltype` varchar(255) DEFAULT NULL,
  `weight` varchar(255) DEFAULT NULL,
  `height` varchar(255) DEFAULT NULL,
  `accounttype` varchar(255) NOT NULL DEFAULT 'Actors',
  `picture` varchar(255) DEFAULT NULL,
  `newsletter` char(1) NOT NULL DEFAULT 'Y',
  `approve` char(1) NOT NULL DEFAULT 'N',
  `activationkey` varchar(255) DEFAULT NULL,
  `displayprofile` char(1) NOT NULL DEFAULT 'Y',
  `aboutme` text,
  `bust` varchar(255) DEFAULT NULL,
  `hips` varchar(255) DEFAULT NULL,
  `shoesize` varchar(255) DEFAULT NULL,
  `inseam` varchar(255) DEFAULT NULL,
  `neck` varchar(255) DEFAULT NULL,
  `sleeve` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`),
  KEY `firstname` (`firstname`),
  KEY `lastname` (`lastname`),
  KEY `state` (`state`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` VALUES(1, '2012-01-25 16:36:48', 'rae', 'parth', 'abc123', '', NULL, '', '', '', '', '', NULL, 'rpaxis1@gmail.com', '1980-01-03', 'Male', '', '', '80', '180', 'Actors', '1241874181PRO1633.jpg', '', 'Y', NULL, 'Y', 'I am an actor...', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES(4, '2012-02-06 08:30:27', 'steven', 'meyer', 'hummerh1', '', NULL, '', '', '', '', '', NULL, 'smeyer.nyc@gmail.com', '1985-11-28', 'Male', '', '', '240', '183', 'Actors', NULL, 'Y', 'Y', NULL, 'Y', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES(5, '2012-02-07 11:59:42', 'toshi', 'cell', '19731973', '', NULL, '', '', '', '', '', NULL, 'toshicell@gmail.com', '1983-08-31', 'Male', '', '', '148', '180', 'Actors', NULL, 'Y', 'Y', NULL, 'Y', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES(9, '2012-02-28 03:24:07', 'Rae', 'Parth', 'abc123', '', NULL, '', '', '', '', '', NULL, 'rpaxis2@gmail.com', '1983-01-01', 'Male', '', '', '185', '180', 'tosh-hunk', NULL, 'Y', 'Y', 'e237b2fc36ivol30pix00c8ghx2i7gz3croi5', 'Y', 'This is about me - test', 'test1', 'test1', 'test1', 'test1', 'test1', 'test1');
INSERT INTO `users` VALUES(8, '2012-02-13 08:52:38', 'Rae', 'Parth', 'abc123', '', NULL, '', '', '', '', '', NULL, 'Parth.are@gmail.com', '1977-03-05', 'Male', '', '', '210', '185', 'Dancer', NULL, 'Y', 'Y', 'gm1f0m6j5495706vxg8amnbq0kv9551fsvys', 'Y', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES(10, '2012-03-08 17:27:05', 'saki', 'saki', 'admin', '', NULL, '', '', '', '', '', NULL, 'admin@admin.com', '1902-02-03', 'Male', '', '', '9', '125', 'Comedian', NULL, 'Y', 'N', 't88hvz2juk3l1gz74gr8mj90l04h9sws6pz2js', 'Y', NULL, '', '', '', '', '', '');
INSERT INTO `users` VALUES(11, '2012-03-08 17:28:06', 'Saki', 'Sato', 'admin', '', NULL, '', '', '', '', '', NULL, 'sakiisato@gmail.com', '1900-01-01', 'Male', '', '', '77', '124', 'Actors', '1043254821200537359_002.jpg', '', 'Y', 'j2ef45ix4i4vhjjcvkucx2hjq27ifgu3jm3o6fr9', 'Y', 'hello! i am a web developer and artist who lives in brooklyn ny.', '55', '55', '55', '55', '55', '55');

-- --------------------------------------------------------

--
-- Table structure for table `users_musics`
--

CREATE TABLE `users_musics` (
  `id` bigint(21) NOT NULL AUTO_INCREMENT,
  `userid` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `music` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `caption` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `addeddate` date NOT NULL DEFAULT '0000-00-00',
  `totalview` bigint(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `users_musics`
--

INSERT INTO `users_musics` VALUES(8, '1', '1098737742WAKKAWAKKA.mp3', 'test', '2012-01-27', 0);
INSERT INTO `users_musics` VALUES(9, '5', '44919603514_Track_14.m4a', 'DJ Red track', '2012-02-10', 0);
INSERT INTO `users_musics` VALUES(10, '11', '286961738sting_brand_new_day.aif', 'sting', '2012-04-06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_pictures`
--

CREATE TABLE `users_pictures` (
  `id` bigint(21) NOT NULL AUTO_INCREMENT,
  `userid` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `picture` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `caption` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `addeddate` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `users_pictures`
--

INSERT INTO `users_pictures` VALUES(3, '1', '1626950438Love_wallpaper_Photoshop_Design_by_mrm.jpg', '', '2012-01-27');
INSERT INTO `users_pictures` VALUES(2, '1', '894714215FS631L.jpg', 'test2', '2012-01-27');
INSERT INTO `users_pictures` VALUES(4, '1', '1710852529heart_love_wallpaper_9.jpg', 'test3', '2012-01-27');
INSERT INTO `users_pictures` VALUES(5, '5', '1356959223cha_toshi_logo.jpg', 'toshi face', '2012-02-10');
INSERT INTO `users_pictures` VALUES(6, '11', '494532719rm1.jpg', 'Pulp Novel', '2012-04-05');
INSERT INTO `users_pictures` VALUES(7, '11', '1369358570michelle_green_2.jpg', 'Michelle Pfeiffer', '2012-04-05');
INSERT INTO `users_pictures` VALUES(8, '11', '1303834515valerie_dore.jpg', 'Valerie Dore', '2012-04-05');

-- --------------------------------------------------------

--
-- Table structure for table `users_videos`
--

CREATE TABLE `users_videos` (
  `id` bigint(21) NOT NULL AUTO_INCREMENT,
  `userid` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `videofile` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `video` text COLLATE latin1_general_ci NOT NULL,
  `caption` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `addeddate` date NOT NULL DEFAULT '0000-00-00',
  `totalview` bigint(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users_videos`
--

INSERT INTO `users_videos` VALUES(2, '1', NULL, '<iframe height=\\"390\\" frameborder=\\"0\\" width=\\"470\\" allowfullscreen=\\"\\" src=\\"http://www.youtube.com/embed/7Z2Z_3KzhVY\\" title=\\"YouTube video player\\"></iframe>', 'Test', '2012-01-27', 0);
INSERT INTO `users_videos` VALUES(3, '1', NULL, '<iframe width=\\"420\\" height=\\"315\\" src=\\"http://www.youtube.com/embed/IleQxygKiQk\\" frameborder=\\"0\\" allowfullscreen></iframe>', 'Playhouse', '2012-02-02', 0);
INSERT INTO `users_videos` VALUES(4, '11', NULL, '<iframe src=\\"http://player.vimeo.com/video/39157873?title=0&amp;byline=0&amp;portrait=0\\" width=\\"400\\" height=\\"225\\" frameborder=\\"0\\" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe><p><a href=\\"http://vimeo.com/39157873\\">IV.10</a> from <a href=\\"http://vimeo.com/beeple\\">beeple</a> on <a href=\\"http://vimeo.com\\">Vimeo</a>.</p>', 'Beeple', '2012-04-05', 0);
INSERT INTO `users_videos` VALUES(5, '11', '3203455floaters_ii__loop_version__640x480.mov', '', 'Floaters', '2012-04-12', 0);
