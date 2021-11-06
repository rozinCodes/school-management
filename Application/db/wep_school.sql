-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2020 at 05:36 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wep_school`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'owner', 'dsasdasddd'),
(2, 'admin', 'admin'),
(3, 'member', 'members'),
(5, 'client', 'client');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `activation_code` varchar(40) NOT NULL,
  `forgotten_password_code` varchar(40) NOT NULL,
  `forgotten_password_time` int(11) NOT NULL,
  `remember_code` varchar(40) NOT NULL,
  `created_on` int(11) NOT NULL,
  `last_login` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `user_status` varchar(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `date_of_birth` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `groupsid` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `user_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `user_status`, `first_name`, `last_name`, `phone`, `date_of_birth`, `gender`, `groupsid`, `photo`, `user_type`) VALUES
(1, '::1', 'litan13', 'UHZVdVBOTWI0VkwrN0MvQjRRRUZkdz09', '', 'litan@gmail.com', '', '', 0, '', 1589568015, 0, 1, '', 'litan', 'sarkar', '', '05/06/2020', 'Male', 3, '', 'Free Member'),
(2, '::1', 'user12', 'UHZVdVBOTWI0VkwrN0MvQjRRRUZkdz09', '', 'user@gmail.com', '', '', 0, '', 1589712149, 1589774533, 1, '', 'user', 'one', '', '02/09/2000', 'male', 3, '', 'Free Member'),
(3, '::1', 'ghjjj7', 'VzV6MUxIS0ZEYVRGc1pGUGFMQ2l2Zz09', '', 'oukn@gmail.com', '', '', 0, '', 1589716193, 0, 1, '', 'ghjjj', 'yhhhh', '', '04/02/2008', 'male', 3, '', 'Free Member'),
(4, '::1', 'mr 13', 'UHZVdVBOTWI0VkwrN0MvQjRRRUZkdz09', '', 'admin@gmail.com', '', '', 0, '', 1589771827, 1591067403, 1, '', 'mr ', 'admin', '', '10/09/1999', 'male', 2, '', 'Free Member');

-- --------------------------------------------------------

--
-- Table structure for table `user_logins`
--

CREATE TABLE `user_logins` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `usersid` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `login_time` datetime NOT NULL,
  `device_name` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_logins`
--

INSERT INTO `user_logins` (`id`, `ip_address`, `usersid`, `username`, `login_time`, `device_name`, `browser`, `country`) VALUES
(2, '::1', 4, 'mr 13', '2020-05-18 10:10:36', '', '', ''),
(3, '::1', 4, 'mr 13', '2020-05-18 11:31:29', '', '', ''),
(4, '::1', 4, 'mr 13', '2020-05-18 16:24:49', '', '', ''),
(5, '::1', 4, 'mr 13', '2020-06-02 09:09:08', '', '', ''),
(6, '::1', 4, 'mr 13', '2020-06-02 09:10:03', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`) USING BTREE,
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_logins`
--
ALTER TABLE `user_logins`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_logins`
--
ALTER TABLE `user_logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
