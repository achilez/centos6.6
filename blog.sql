-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 04, 2016 at 06:34 PM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mercader`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE IF NOT EXISTS `blogs` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `user_id` int(12) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `slug`, `content`, `user_id`, `created_date`, `updated_date`) VALUES
(1, 'Hello World', 'hello world', 'this is the content page', 1, '2016-04-04 13:51:31', NULL),
(2, 'Hello Dolly', 'hello-dolly', 'this is the hello dolly content page', 3, '2016-04-04 13:52:31', NULL),
(3, 'Brown Fox', 'broxn-fox', 'the quick brown fox jumps over the lazy dog', 3, '2016-04-04 13:53:31', NULL),
(4, 'Blog Blug', 'blog-blug', 'this is the blog blug content page', 1, '2016-04-04 13:54:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `blog_id` int(12) NOT NULL,
  `content` text NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `blog_id`, `content`, `created_date`, `updated_date`) VALUES
(1, 1, 'this is a good post', '2016-04-04 13:51:32', NULL),
(2, 1, 'i would like to share this', '2016-04-04 13:51:33', NULL),
(3, 1, 'this is interesting', '2016-04-04 13:51:34', NULL),
(4, 2, 'nice post', '2016-04-04 13:51:35', NULL),
(5, 2, 'keep it up!', '2016-04-04 13:51:36', NULL),
(6, 2, '2 thumbs up ', '2016-04-04 13:51:37', NULL),
(7, 2, 'great post', '2016-04-04 13:51:38', NULL),
(8, 3, 'awesome post', '2016-04-04 13:51:39', NULL),
(9, 3, 'one of a kind!', '2016-04-04 13:51:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `email_address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `deleted_flag` tinyint(3) NOT NULL DEFAULT '0',
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email_address`, `password`, `username`, `first_name`, `last_name`, `deleted_flag`, `created_date`, `updated_date`) VALUES
(1, 'user1@test.com', '24c9e15e52afc47c225b757e7bee1f9d', 'User1', 'User1 Fname', 'User1 LName', 0, NULL, NULL),
(2, 'test@demo.com', '098f6bcd4621d373cade4e832627b4f6', 'test', 'test', 'demo', 1, '2016-04-04 13:51:31', NULL),
(3, 'demo@demo.com', 'fe01ce2a7fbac8fafaed7c982a04e229', 'Demo Name', 'Demo Name', 'Demo Lname', 0, '2016-04-04 13:52:25', NULL),
(4, 'fox@john.com', '2b95d1f09b8b66c5c43622a4d9ec9a04', 'fox', '', '', 1, '2016-04-04 14:12:09', '2016-04-04 14:12:46');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
