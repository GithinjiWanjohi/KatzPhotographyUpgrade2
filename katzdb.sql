-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2018 at 11:48 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `katzdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` int(11) NOT NULL,
  `comment_body` varchar(1000) NOT NULL,
  `posted_at` datetime NOT NULL,
  `blog_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_comments`
--

INSERT INTO `blog_comments` (`id`, `comment_body`, `posted_at`, `blog_id`, `user_id`) VALUES
(1, 'why', '2018-06-04 09:29:58', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` int(11) NOT NULL,
  `blog_title` varchar(200) NOT NULL,
  `blog_body` varchar(2000) NOT NULL,
  `posted_at` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `cover_img` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `blog_title`, `blog_body`, `posted_at`, `user_id`, `category_id`, `cover_img`) VALUES
(1, 'trial post', '<p>trial post 1</p>\r\n', '2018-06-04 09:29:40', 1, 7, 'NONE');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_ID` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_ID`, `cat_name`, `description`) VALUES
(1, 'Wedding', NULL),
(2, 'Baby Bump', NULL),
(3, 'Sports Photography', NULL),
(4, 'Product Photography', NULL),
(5, 'Food Photography', NULL),
(6, 'Kids', NULL),
(7, 'Nature Photography', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `firstname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `email`, `phone`, `address`, `created`, `modified`, `status`, `firstname`, `lastname`, `description`) VALUES
(1, 'testuser@gmail.com', '9999999999', 'New York, NY, USA', '2016-08-17 08:21:25', '2016-08-17 08:21:25', '1', 'Test ', 'User', 'Very fragile. Hold Up.'),
(2, 'amoskibe@yahoo.com', '0711000333', 'Kenya meat Commission, 2nd floor', '2017-11-10 00:00:00', '2017-11-10 00:00:00', '1', 'Amos', 'Kibet', 'To be delivered by 9AM'),
(3, 'abellwasike@gmail.com', '0702675898', 'Langata Akila Room 4', '2017-11-14 04:21:45', '2017-11-14 04:22:57', '1', 'Abel', 'Wasike', 'Handle with Care'),
(4, 'cyril@gmail.com', '0702675898', 'Huddersfield, 2nd Floor', '2017-11-14 12:32:57', '2017-11-14 05:44:26', '1', 'Cyril', 'Odhiambo', '	Take your time\r\n		');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total_price` float(10,2) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `total_price`, `created`, `modified`, `status`) VALUES
(1, 1, 120.00, '2017-11-05 10:37:51', '2017-11-05 10:37:51', '1'),
(2, 1, 25.00, '2017-11-05 12:04:46', '2017-11-05 12:04:46', '1'),
(4, 1, 25.00, '2017-11-05 12:55:48', '2017-11-05 12:55:48', '1'),
(5, 1, 15.00, '2017-11-05 13:08:49', '2017-11-05 13:08:49', '1'),
(6, 1, 15.00, '2017-11-05 14:32:00', '2017-11-05 14:32:00', '1'),
(39, 1, 12.00, '2017-11-13 16:41:33', '2017-11-13 16:41:33', '1'),
(40, 3, 35.40, '2017-11-14 03:09:43', '2017-11-14 03:09:43', '1'),
(41, 4, 12.00, '2017-11-14 03:44:33', '2017-11-14 03:44:33', '1'),
(42, 4, 46.40, '2017-11-14 04:13:04', '2017-11-14 04:13:04', '1'),
(43, 4, 23.00, '2017-11-14 04:19:17', '2017-11-14 04:19:17', '1'),
(44, 4, 12.40, '2017-11-14 04:32:48', '2017-11-14 04:32:48', '1'),
(45, 4, 12.00, '2017-11-14 10:33:01', '2017-11-14 10:33:01', '1'),
(46, 4, 46.80, '2017-11-14 11:51:14', '2017-11-14 11:51:14', '1'),
(47, 4, 90.74, '2017-11-14 12:22:17', '2017-11-14 12:22:17', '1'),
(48, 4, 48.00, '2018-01-22 19:16:32', '2018-01-22 19:16:32', '1'),
(49, 4, 12.00, '2018-02-11 20:10:18', '2018-02-11 20:10:18', '1'),
(50, 4, 12.00, '2018-04-29 22:46:13', '2018-04-29 22:46:13', '1'),
(51, 4, 12.40, '2018-04-30 10:31:29', '2018-04-30 10:31:29', '1'),
(52, 4, 24.00, '2018-04-30 11:05:13', '2018-04-30 11:05:13', '1'),
(53, 4, 12.40, '2018-05-04 12:48:54', '2018-05-04 12:48:54', '1'),
(54, 4, 12.40, '2018-05-04 12:49:41', '2018-05-04 12:49:41', '1'),
(55, 4, 24.00, '2018-05-21 10:34:04', '2018-05-21 10:34:04', '1');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`) VALUES
(1, 1, 1, 3),
(2, 1, 2, 3),
(3, 2, 2, 1),
(6, 4, 2, 1),
(7, 5, 1, 1),
(8, 6, 1, 1),
(53, 39, 1, 1),
(54, 40, 5, 1),
(55, 40, 17, 1),
(56, 41, 1, 1),
(57, 42, 7, 1),
(58, 42, 5, 1),
(59, 43, 17, 1),
(60, 44, 5, 1),
(61, 45, 1, 1),
(62, 46, 4, 1),
(63, 46, 5, 2),
(64, 47, 7, 2),
(65, 47, 33, 2),
(66, 48, 1, 4),
(67, 49, 9, 1),
(68, 50, 9, 1),
(69, 51, 5, 1),
(70, 52, 1, 2),
(71, 53, 5, 1),
(72, 54, 5, 1),
(73, 55, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `photo_upload`
--

CREATE TABLE `photo_upload` (
  `photo_id` int(11) NOT NULL,
  `shoot_id` int(11) NOT NULL,
  `photoName` varchar(255) NOT NULL,
  `extension` varchar(4) NOT NULL,
  `dateTimePosted` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photo_upload`
--

INSERT INTO `photo_upload` (`photo_id`, `shoot_id`, `photoName`, `extension`, `dateTimePosted`) VALUES
(4, 37, 'andrzej-kryszpiniuk-222616-unsplash', 'jpg', '0000-00-00 00:00:00'),
(5, 37, 'daniela-castro-220160-unsplash', 'jpg', '0000-00-00 00:00:00'),
(6, 37, 'katerina-radvanska-364507-unsplash', 'jpg', '0000-00-00 00:00:00'),
(25, 37, 'daniela-castro-220160-unsplash', 'jpg', '0000-00-00 00:00:00'),
(26, 37, 'andrzej-kryszpiniuk-222616-unsplash', 'jpg', '0000-00-00 00:00:00'),
(27, 62, 'IMG_8811', 'jpg', '0000-00-00 00:00:00'),
(28, 62, 'IMG_8811-2', 'jpg', '0000-00-00 00:00:00'),
(29, 62, 'IMG_8811', 'jpg', '0000-00-00 00:00:00'),
(30, 62, 'IMG_8811-2', 'jpg', '0000-00-00 00:00:00'),
(31, 37, 'katerina-radvanska-364507-unsplash', 'jpg', '0000-00-00 00:00:00'),
(32, 37, 'andrzej-kryszpiniuk-222616-unsplash', 'jpg', '0000-00-00 00:00:00'),
(33, 37, 'daniela-castro-220160-unsplash', 'jpg', '0000-00-00 00:00:00'),
(34, 37, 'andrzej-kryszpiniuk-222616-unsplash', 'jpg', '0000-00-00 00:00:00'),
(35, 37, 'IMG_8811', 'jpg', '0000-00-00 00:00:00'),
(36, 37, 'IMG_8811-2', 'jpg', '0000-00-00 00:00:00'),
(37, 37, '', '', '0000-00-00 00:00:00'),
(38, 37, '', '', '0000-00-00 00:00:00'),
(39, 37, 'IMG_8811', 'jpg', '0000-00-00 00:00:00'),
(40, 37, 'IMG_8811-2', 'jpg', '0000-00-00 00:00:00'),
(41, 37, '', '', '0000-00-00 00:00:00'),
(42, 37, 'IMG_8811', 'jpg', '0000-00-00 00:00:00'),
(43, 37, 'IMG_8811-2', 'jpg', '0000-00-00 00:00:00'),
(44, 37, 'IMG_8811', 'jpg', '0000-00-00 00:00:00'),
(45, 37, 'IMG_8811-2', 'jpg', '0000-00-00 00:00:00'),
(46, 62, '', '', '0000-00-00 00:00:00'),
(47, 62, 'IMG_8811', 'jpg', '0000-00-00 00:00:00'),
(48, 62, 'IMG_8811-2', 'jpg', '0000-00-00 00:00:00'),
(49, 37, '', '', '0000-00-00 00:00:00'),
(50, 37, 'IMG_8811-2', 'jpg', '0000-00-00 00:00:00'),
(51, 37, 'IMG_8811', 'jpg', '0000-00-00 00:00:00'),
(52, 37, '', '', '0000-00-00 00:00:00'),
(53, 37, 'IMG_8811', 'jpg', '0000-00-00 00:00:00'),
(54, 37, 'IMG_8811-2', 'jpg', '0000-00-00 00:00:00'),
(55, 37, '', '', '0000-00-00 00:00:00'),
(56, 37, 'IMG_8811', 'jpg', '0000-00-00 00:00:00'),
(57, 37, 'IMG_8811-2', 'jpg', '0000-00-00 00:00:00'),
(58, 62, '', '', '0000-00-00 00:00:00'),
(59, 62, '', '', '0000-00-00 00:00:00'),
(60, 62, '', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Productid` int(11) NOT NULL,
  `Category` int(11) DEFAULT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `UnitPrice` float DEFAULT NULL,
  `Image` varchar(350) DEFAULT NULL,
  `date_added` datetime NOT NULL,
  `Deleted` int(11) DEFAULT NULL,
  `Featured` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Productid`, `Category`, `Name`, `UnitPrice`, `Image`, `date_added`, `Deleted`, `Featured`) VALUES
(1, 6, 'Hiking', 12, 'https://vangogh.teespring.com/v3/image/wl1DIZjW8RUSwrXakNvNfAiRGO0/560/560.jpg', '2017-11-04 16:00:00', 0, 1),
(2, 6, 'Hiking Boots', 26, 'https://vangogh.teespring.com/v3/image/kdkxjbCA7ym12TPlXIbWa31IDvk/560/560.jpg', '2017-11-04 16:01:00', 0, 1),
(3, 6, 'Lethal Adventure', 21, 'https://vangogh.teespring.com/v3/image/3dNioXPxFyJxWmlD7lm-CIr2t3Y/560/560.jpg', '2017-11-04 16:02:00', 0, 1),
(4, 6, 'Hiking Wonder', 22, 'https://vangogh.teespring.com/v3/image/shuKq1Y-BuwGCC-mm5SIZ4C3pM4/560/560.jpg', '2017-11-04 16:03:00', 0, 1),
(5, 7, 'Squad Goals', 12.4, 'https://vangogh.teespring.com/shirt_pic/6530006/7574976/370/6530/front.jpg?v=2016-08-12-18-25', '2017-11-04 16:05:00', 0, 1),
(6, 7, 'Sound Guy Music', 45.12, 'https://vangogh.teespring.com/v3/image/l90hjT8tASFvTHL6SDewEid1KbE/560/560.jpg', '0000-00-00 00:00:00', 0, 1),
(7, 8, 'Alkebulan (Africa)', 34, 'https://vangogh.teespring.com/v3/image/Me14K5lYHqeijyLhaC9eXUrAfKI/560/560.jpg', '2017-11-04 16:07:00', 0, 1),
(8, 8, 'Alchemical Mountain', 21, 'https://vangogh.teespring.com/v3/image/L0SJdUfEXEIfFlN_k6oVzKVw1Wk/560/560.jpg', '2017-11-04 16:08:00', 0, 1),
(9, 6, 'New Adventures', 12, 'https://vangogh.teespring.com/v3/image/zt31fgz4HVJf8KY18fzfhRAgdfI/560/560.jpg', '2017-11-04 16:09:00', 0, 1),
(10, 6, 'Explore', 25.98, 'https://vangogh.teespring.com/shirt_pic/12300163/13943843/369/6527/front.jpg?v=2017-01-17-22-04)', '2017-11-04 16:10:00', 0, 0),
(11, 6, 'Explore,travel,live', 10.11, 'https://vangogh.teespring.com/v3/image/-jTb6NqFCyMv_2ndMNwM8NV_3qc/560/560.jpg', '2017-11-04 16:10:04', 0, 0),
(12, 10, 'Courage', 15.14, 'https://vangogh.teespring.com/v3/image/SsfxZ5NyMWaOFLRfpx-zEY4dT78/560/560.jpg', '2017-11-04 16:11:00', 0, 1),
(13, 10, 'Work For Cause', 34, 'https://vangogh.teespring.com/v3/image/YkhgnXeo1vKobDZLQIROHemiO68/560/560.jpg', '2017-11-04 16:12:00', 0, 1),
(14, 6, 'Adventure Calling', 45, 'https://vangogh.teespring.com/v3/image/0Vonqi3CamA-54HdDu_RjWp9SY4/560/560.jpg', '2017-11-04 16:13:00', 0, 1),
(15, 6, 'Verified Traveller', 16.99, 'https://vangogh.teespring.com/v3/image/KxPH5sPEPa8a7VSnzXd9sNzSqeA/560/560.jpg', '2017-11-04 16:14:00', 0, 0),
(16, 7, 'Quiditch Training', 29.61, 'https://vangogh.teespring.com/v3/image/cc24s-mcI6aogtfEvPPReSWY3aE/560/560.jpg', '2017-11-04 16:15:00', 0, 0),
(17, 7, 'Catching Monsters', 23, 'https://vangogh.teespring.com/v3/image/fmWf_X7_qIbs1OgEGKZzhOUlCtw/560/560.jpg', '0000-00-00 00:00:00', 0, 1),
(18, 7, 'Charging Chuck', 12.45, 'https://vangogh.teespring.com/v3/image/mVjVU9mzvlvmhqH2CQtbqRTM7UI/560/560.jpg', '2017-11-04 16:18:00', 0, 0),
(19, 7, 'Double Digits', 34.21, 'https://vangogh.teespring.com/v3/image/YQnuT2n8aKUOXiEkdi8bq7VNnyM/560/560.jpg', '2017-11-04 16:19:00', 0, 0),
(20, 8, 'Bob', 12.54, 'https://vangogh.teespring.com/v3/image/0VaER62hchvyjgQKu7mBkUPNj_M/560/560.jpg', '2017-11-04 16:20:00', 0, 0),
(21, 8, 'Floral Goat', 34.54, 'https://vangogh.teespring.com/v3/image/wkRl1rMMgX3KMTDaPNWgZIF2Bi8/560/560.jpg', '2017-11-04 16:21:00', 0, 0),
(22, 8, 'Zeepsie c', 23.46, 'https://vangogh.teespring.com/v3/image/GRsBeeC7mh49DDsNl9W-hIy-mEY/560/560.jpg', '2017-11-04 16:22:00', 0, 0),
(23, 8, 'For Tiny', 12.78, 'https://vangogh.teespring.com/v3/image/6fp9Fo9QlOdKX0VDdFw0A_US8a4/560/560.jpg', '2017-11-04 16:23:00', 0, 0),
(24, 8, 'Maasai 101', 12.45, 'https://vangogh.teespring.com/v3/image/AHN5XCFplGA38UgAaEUHZn03Vm4/560/560.jpg', '2017-11-04 16:24:00', 0, 0),
(25, 8, 'Starry Night', 12.45, 'https://vangogh.teespring.com/v3/image/l-CUpG0NXfFjvTFV4L5tClAb8n0/560/560.jpg', '2017-11-04 16:24:00', 0, 0),
(26, 8, 'Santa\'s Helper', 15.11, 'https://vangogh.teespring.com/v3/image/SX2gMhagY6LjtpnI2LlADobpqk0/560/560.jpg', '2017-11-04 16:25:00', 0, 0),
(28, 37, '5-start Dad', 10.67, 'https://vangogh.teespring.com/static.jpg?height=570&image_url=https%3A%2F%2Fs3.amazonaws.com%2Fteespring-pub-custom%2F87c_15688645_product_317_6226_front.png&padded=false&signature=TZydJUj5RozdxbqhlZgiIpzeGCKzD1vghTftmlNjVC0%3D&version=2017-06-15-03-07&width=570', '2017-11-04 16:30:00', 0, 0),
(29, 37, 'Grumpy Man', 12.23, 'https://vangogh.teespring.com/static.jpg?height=570&image_url=https%3A%2F%2Fs3.amazonaws.com%2Fteespring-pub-custom%2F870_9505872_product_313_6296_front.png&padded=false&signature=me1zVOyz0V2TvhZ4qoAN%2BpqN0Kwc2aJy9qmc9u9TmzQ%3D&version=2017-06-26-04-44&width=570', '2017-11-04 16:31:00', 0, 0),
(30, 37, 'Jabuya Special', 34.11, 'https://vangogh.teespring.com/static.jpg?height=570&image_url=https%3A%2F%2Fs3.amazonaws.com%2Fteespring-pub-custom%2Fc23_12118046_product_317_6246_front.png&padded=false&signature=YFF6n%2BFdQuT0XECUmgDETKDABMV6kgWkYlCzwIGOOSg%3D&version=2017-08-30-03-17&width=570', '2017-11-04 16:32:00', 0, 0),
(31, 37, 'The Legend', 34.87, 'https://vangogh.teespring.com/static.jpg?height=570&image_url=https%3A%2F%2Fs3.amazonaws.com%2Fteespring-pub-custom%2F64c_15437632_product_313_6231_front.png&padded=false&signature=EGvNwz%2FzSH0LVf3Z%2BHUpfsylZy6%2F3klzqRnO7GxEADs%3D&version=2017-06-12-03-19&width=570', '2017-11-04 16:34:00', 0, 0),
(32, 37, 'Great Dad', 10.34, 'https://vangogh.teespring.com/static.jpg?height=570&image_url=https%3A%2F%2Fs3.amazonaws.com%2Fteespring-pub-custom%2F4ed_15642490_product_313_6231_front.png&padded=false&signature=D65haOmWuPJ53qenHXKzQYsf5f1po9FD5XTu00cskbI%3D&version=2017-06-30-03-18&width=570', '2017-11-04 16:36:00', 0, 0),
(33, 37, 'Autism Superhero', 11.37, 'https://vangogh.teespring.com/static.jpg?height=570&image_url=https%3A%2F%2Fs3.amazonaws.com%2Fteespring-pub-custom%2F702_15085086_product_317_6226_front.png&padded=false&signature=pw%2FRnpJxA3q9QjP8KLfwEQYtYsRMBz0WX2kUnkfADOk%3D&version=2017-06-09-03-19&width=570', '2017-11-04 16:39:00', 0, 1),
(34, 38, 'Golf Grandpa', 16.45, 'https://vangogh.teespring.com/v3/image/37QT1w-TKAPEY4e9BFIKZ8w2mko/560/560.jpg', '2017-11-04 16:40:00', 0, 0),
(35, 38, 'Football Dad', 78.21, 'https://vangogh.teespring.com/v3/image/rvnmc_gbHplNjFliM0sdUEBwGbw/560/560.jpg', '2017-11-04 16:41:00', 0, 0),
(36, 38, 'Sailer Dad', 78.06, 'https://vangogh.teespring.com/shirt_pic/7945696/9182152/212/5819/back.jpg?v=2016-10-27-06-58', '2017-11-04 16:39:31', 0, 0),
(37, 38, 'All Star Tennis', 65.98, 'https://vangogh.teespring.com/v3/image/uFGAaJpIn4gJzgiOO5YWcJyT45g/560/560.jpg', '2017-11-04 16:40:00', 0, 0),
(38, 38, 'Basketball Dad', 67.99, 'https://vangogh.teespring.com/v3/image/TqeAtOyJmCuSeUE9UPnm77eQejM/560/560.jpg', '2017-11-04 17:00:00', 0, 0),
(39, 38, 'Badminton Champ', 55.55, 'https://vangogh.teespring.com/shirt_pic/9868613/9674359/2/2397/front.jpg?v=2016-11-26-03-37', '2017-11-04 17:07:13', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `Categoryid` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Parent` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`Categoryid`, `Name`, `Parent`) VALUES
(1, 'Apparel', 0),
(2, 'Home Decor', 0),
(3, 'Socks', 0),
(4, 'Phone Cases', 0),
(5, 'Mugs', 0),
(6, 'Adventure', 1),
(7, 'Sports', 1),
(8, 'Artistic', 1),
(9, 'Tanks', 1),
(10, 'For A Cause Apparel', 1),
(11, 'Hoodies', 1),
(12, 'Canvas Prints', 2),
(13, 'Pillows', 2),
(14, 'Posters', 2),
(15, 'Tapestries', 2),
(16, 'Camo Socks', 3),
(17, 'Cat Socks', 3),
(18, 'Socks Exclusives', 3),
(19, 'Camo Phone Cases', 4),
(20, 'Digital Art Phone Cases', 4),
(21, 'Funny Phone Cases', 4),
(22, 'Animal Mugs', 5),
(24, 'Exclusive Mugs', 5),
(25, 'For A Cause Mugs', 5),
(26, 'Apparel Exclusives', 1),
(27, 'Hobbies', 1),
(28, 'Trending Collection', 1),
(29, 'Funny', 1),
(30, 'Animal Lovers', 1),
(31, 'Holiday', 1),
(32, 'Texture Phone Cases', 4),
(33, 'Accessories', 0),
(34, 'Tote Bags', 33),
(35, 'Beach Towels', 33),
(36, 'Father\'s Day', 0),
(37, 'Dad\'s Hats', 36),
(38, 'Dad\'s Sports', 36),
(39, 'Dad\'s Sweatshirts', 36);

-- --------------------------------------------------------

--
-- Table structure for table `shoot`
--

CREATE TABLE `shoot` (
  `shoot_id` int(11) NOT NULL,
  `cat_ID` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `shootName` varchar(255) NOT NULL,
  `hours` int(11) NOT NULL,
  `details` longtext NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shoot`
--

INSERT INTO `shoot` (`shoot_id`, `cat_ID`, `cust_id`, `shootName`, `hours`, `details`, `created_on`) VALUES
(7, 2, 1, 'Hey there little one', 6, '', '0000-00-00 00:00:00'),
(8, 5, 3, 'Make your drink!', 4, '', '0000-00-00 00:00:00'),
(9, 6, 2, 'Fun and Games', 3, '', '0000-00-00 00:00:00'),
(10, 3, 4, 'Make your shot', 2, '', '0000-00-00 00:00:00'),
(26, 5, 1, 'Smell the goodness', 2, 'Making you salivate.\r\nShot indoors', '0000-00-00 00:00:00'),
(27, 5, 1, 'Smell the goodness', 2, 'Making you salivate.\r\nShot indoors', '0000-00-00 00:00:00'),
(28, 5, 1, 'Smell the goodness', 2, 'Making you salivate.\r\nShot indoors', '0000-00-00 00:00:00'),
(29, 5, 1, 'Smell the goodness', 2, 'Making you salivate.\r\nShot indoors', '0000-00-00 00:00:00'),
(30, 5, 1, 'Smell the goodness', 2, 'Making you salivate.\r\nShot indoors', '0000-00-00 00:00:00'),
(31, 5, 1, 'Smell the goodness', 2, 'Making you salivate.\r\nShot indoors', '0000-00-00 00:00:00'),
(32, 5, 1, 'Smell the goodness', 2, 'Making you salivate.\r\nShot indoors', '0000-00-00 00:00:00'),
(33, 5, 1, 'Smell the goodness', 2, 'Making you salivate.\r\nShot indoors', '0000-00-00 00:00:00'),
(34, 5, 1, 'Smell the goodness', 2, 'Making you salivate.\r\nShot indoors', '0000-00-00 00:00:00'),
(35, 5, 1, 'Smell the goodness', 2, 'Making you salivate.\r\nShot indoors', '0000-00-00 00:00:00'),
(36, 5, 1, 'Smell the goodness', 2, 'Making you salivate.\r\nShot indoors', '0000-00-00 00:00:00'),
(37, 7, 3, 'Into the badlands', 2, 'A road trip', '0000-00-00 00:00:00'),
(38, 7, 3, 'Into the badlands', 2, 'A road trip', '0000-00-00 00:00:00'),
(39, 7, 3, 'Into the badlands', 2, 'A road trip', '0000-00-00 00:00:00'),
(40, 7, 3, 'Into the badlands', 2, 'A road trip', '0000-00-00 00:00:00'),
(59, 7, 3, 'Into the badlands', 2, 'Exploring the world', '0000-00-00 00:00:00'),
(60, 7, 3, 'Into the badlands', 2, 'Exploring the world', '0000-00-00 00:00:00'),
(61, 7, 3, 'Into the badlands', 2, 'Exploring the world', '0000-00-00 00:00:00'),
(62, 7, 3, 'A game of tones', 2, 'Blue tones', '0000-00-00 00:00:00'),
(63, 7, 2, 'A game of tones', 2, '', '0000-00-00 00:00:00'),
(64, 7, 2, 'A game of tones', 2, '', '0000-00-00 00:00:00'),
(65, 7, 2, 'A game of Tones', 3, 'Blue tones', '0000-00-00 00:00:00'),
(66, 7, 2, 'A game of Tones', 3, 'Blue tones', '0000-00-00 00:00:00'),
(67, 7, 2, 'A game of Tones', 3, 'Blue tones', '0000-00-00 00:00:00'),
(68, 7, 2, 'Into the badlands', 2, '', '0000-00-00 00:00:00'),
(69, 7, 2, 'Into the badlands', 2, '', '0000-00-00 00:00:00'),
(70, 7, 2, 'Into the badlands', 2, '', '0000-00-00 00:00:00'),
(71, 7, 2, 'Into the badlands', 2, 'Desert', '0000-00-00 00:00:00'),
(72, 7, 2, 'Into the badlands', 2, 'Desert', '0000-00-00 00:00:00'),
(73, 7, 2, 'A game of tones', 2, 'Blue tones', '0000-00-00 00:00:00'),
(74, 5, 2, 'Smell the goodness', 3, 'Savory', '0000-00-00 00:00:00'),
(75, 5, 3, 'Smell the goodness', 1, 'Savory', '0000-00-00 00:00:00'),
(76, 2, 3, 'Into the badlands', 6, 'hjsdbjhcsznl', '0000-00-00 00:00:00'),
(77, 2, 3, 'Into the badlands', 6, 'hjsdbjhcsznl', '0000-00-00 00:00:00'),
(78, 2, 2, 'Into the badlands', 6, 'baba', '0000-00-00 00:00:00'),
(79, 2, 2, 'Into the badlands', 6, 'baba', '0000-00-00 00:00:00'),
(80, 2, 2, 'Into the badlands', 6, 'baba', '0000-00-00 00:00:00'),
(81, 3, 3, 'Into the badlands', 4, 'ilhjkcsjn ', '0000-00-00 00:00:00'),
(82, 3, 3, 'Into the badlands', 4, 'ilhjkcsjn ', '0000-00-00 00:00:00'),
(83, 3, 3, 'Into the badlands', 4, 'ilhjkcsjn ', '0000-00-00 00:00:00'),
(84, 3, 2, 'Into the badlands', 1, 'kljbnd,s x', '0000-00-00 00:00:00'),
(85, 3, 2, 'Into the badlands', 1, 'kljbnd,s x', '0000-00-00 00:00:00'),
(86, 3, 2, 'Into the badlands', 1, 'kljbnd,s x', '0000-00-00 00:00:00'),
(87, 2, 3, 'Into the badlands', 1, 'johkwn,dso', '0000-00-00 00:00:00'),
(88, 2, 3, 'Into the badlands', 1, 'johkwn,dso', '0000-00-00 00:00:00'),
(89, 2, 3, 'Into the badlands', 1, 'johkwn,dso', '0000-00-00 00:00:00'),
(90, 1, 3, 'Into the badlands', 2, 'oiuhkszx', '0000-00-00 00:00:00'),
(91, 1, 3, 'Into the badlands', 2, 'oiuhkszx', '0000-00-00 00:00:00'),
(92, 1, 3, 'Into the badlands', 2, 'oiuhkszx', '0000-00-00 00:00:00'),
(93, 4, 2, 'Into the badlands', 6, 'ihlkdnds nldsz', '0000-00-00 00:00:00'),
(94, 4, 2, 'Into the badlands', 6, 'ihlkdnds nldsz', '0000-00-00 00:00:00'),
(95, 4, 2, 'Into the badlands', 6, 'ihlkdnds nldsz', '0000-00-00 00:00:00'),
(96, 2, 4, 'A game of Tones', 2, 'kndsa c,zx ', '0000-00-00 00:00:00'),
(97, 2, 4, 'A game of Tones', 2, 'kndsa c,zx ', '0000-00-00 00:00:00'),
(98, 2, 4, 'A game of Tones', 2, 'kndsa c,zx ', '0000-00-00 00:00:00'),
(99, 3, 4, 'Into the badlands', 4, 'hgkvmb', '0000-00-00 00:00:00'),
(100, 3, 4, 'Into the badlands', 4, 'hgkvmb', '0000-00-00 00:00:00'),
(101, 3, 4, 'Into the badlands', 4, 'hgkvmb', '0000-00-00 00:00:00'),
(102, 2, 3, 'Into the badlands', 1, 'viyjwhbcasdz ', '0000-00-00 00:00:00'),
(103, 2, 3, 'Into the badlands', 1, 'viyjwhbcasdz ', '0000-00-00 00:00:00'),
(104, 2, 3, 'Into the badlands', 1, 'viyjwhbcasdz ', '0000-00-00 00:00:00'),
(105, 2, 1, 'Into the badlands', 2, 'hiknfw as', '0000-00-00 00:00:00'),
(106, 2, 1, 'Into the badlands', 2, 'hiknfw as', '0000-00-00 00:00:00'),
(107, 2, 1, 'Into the badlands', 2, 'hiknfw as', '0000-00-00 00:00:00'),
(108, 5, 3, 'A game of Tones', 4, 'mjhguib  ijhmnhj', '0000-00-00 00:00:00'),
(109, 5, 3, 'A game of Tones', 4, 'mjhguib  ijhmnhj', '0000-00-00 00:00:00'),
(110, 5, 3, 'A game of Tones', 4, 'mjhguib  ijhmnhj', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `PhoneNumber` int(11) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Timestamp` datetime DEFAULT NULL,
  `UserType` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `FirstName`, `LastName`, `Email`, `PhoneNumber`, `Password`, `Timestamp`, `UserType`) VALUES
(1, 'Abell', 'Wasike', 'abellwasike@gmail.com', 702676898, '$2y$10$OuF2rOUS1ag56E61Go.xv.At5KUN/mcEvxG5A0skicIZemkNqreS2', '2018-05-21 00:53:13', 'admin'),
(4, 'kawhi', 'leo', 'kawhileo@gmail.com', 702675898, '$2y$10$rqBc9FOV9REuOcmB5pNt8er/JbXp5gr7euYvDWkO6C3XnyIzPCbhq', NULL, 'photographer'),
(5, 'Cyril', 'Odhiambo', 'cyril@gmail.com', 702675898, '$2y$10$OxOODQl.TVSxBMJrkcSk3OkozRzBSiBxShrl/jn.oirTSPiYoCgiy', NULL, 'user'),
(6, 'Tyreek', 'Hill', 'Thill@gmail.com', 709080706, '$2y$10$pWBmEV/kwETV0SzMhVDjWuwcdDMxW97DdkLzJmpsD4ejhEfKknQ86', NULL, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_ID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `photo_upload`
--
ALTER TABLE `photo_upload`
  ADD PRIMARY KEY (`photo_id`),
  ADD KEY `shoot_id` (`shoot_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Productid`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`Categoryid`);

--
-- Indexes for table `shoot`
--
ALTER TABLE `shoot`
  ADD PRIMARY KEY (`shoot_id`),
  ADD KEY `cat_ID` (`cat_ID`),
  ADD KEY `cust_id` (`cust_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `photo_upload`
--
ALTER TABLE `photo_upload`
  MODIFY `photo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `Categoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `shoot`
--
ALTER TABLE `shoot`
  MODIFY `shoot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `photo_upload`
--
ALTER TABLE `photo_upload`
  ADD CONSTRAINT `photo_upload_ibfk_1` FOREIGN KEY (`shoot_id`) REFERENCES `shoot` (`shoot_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shoot`
--
ALTER TABLE `shoot`
  ADD CONSTRAINT `shoot_ibfk_1` FOREIGN KEY (`cat_ID`) REFERENCES `categories` (`cat_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shoot_ibfk_2` FOREIGN KEY (`cust_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
