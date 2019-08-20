-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2019 at 08:09 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dilitrust`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_aclrel`
--

CREATE TABLE IF NOT EXISTS `tb_aclrel` (
  `id` int(11) NOT NULL,
  `permId` int(11) DEFAULT NULL,
  `roleId` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_aclrel`
--

INSERT INTO `tb_aclrel` (`id`, `permId`, `roleId`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 1, 2),
(6, 2, 2),
(7, 3, 2),
(8, 1, 3),
(9, 3, 3),
(10, 2, 4),
(11, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_documents`
--

CREATE TABLE IF NOT EXISTS `tb_documents` (
  `id` int(11) NOT NULL,
  `documentName` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL,
  `documentPath` varchar(255) NOT NULL,
  `uploadedBy` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_documents`
--

INSERT INTO `tb_documents` (`id`, `documentName`, `document`, `documentPath`, `uploadedBy`, `date`) VALUES
(4, 'doc1', '681thEVLUN4f3YPk2EFZ4i5PUPoJiecVqV3U+inzoyhrVh0aYsJ4+GhFCR+MOqj3cOstmS0duACS+hS8hCUbFw==', 'C:/xampp/htdocs/dilitrust/assets/uploads/documents/Contract_36357803.pdf', 1, '2019-08-20 01:01:16'),
(5, 'asdas', 'jLnnr9ktjH1fT3fN/Vh+bvClnACgNtXuzPdZfhCUOq44fO3JpvA3Rz4Vmi38Txxk+/LSlkzEOSqsXhhq0CEreA==', 'C:/xampp/htdocs/dilitrust/assets/uploads/documents/CoverLetter.pdf', 9, '2019-08-20 01:37:13'),
(6, 'doc11', '1NmYtZmu1rFldPmHNQr2oWlo6UWIMfN5cfBpJeDwd+gSDl9vQ2Y1S2HViwba3pwu0WBeu9h84yWHKHir+FhIGQ==', 'C:/xampp/htdocs/dilitrust/assets/uploads/documents/1NmYtZmu1rFldPmHNQr2oWlo6UWIMfN5cfBpJeDwd+gSDl9vQ2Y1S2HViwba3pwu0WBeu9h84yWHKHir+FhIGQ==', 1, '2019-08-20 01:55:24'),
(7, 'document by gargi', 'nfdpjnc6/gSL9Yw3mcPIVL1djV1AJL4aw2hvNb8viwkmCJdz76/mkp1yUpQvOaXVLiUohTac5nb2LbHhPp2NmQ==', 'C:/xampp/htdocs/dilitrust/assets/uploads/documents/Contract_36357803.pdf', 2, '2019-08-20 04:23:47'),
(9, '<script>alert("hello");</script>', 'nEV8wH6w2h0aEq+4MAizvdxKwC5pOrrUcyWyVncVlxOdbC6upXNcWlQzh69PoNv4K5WO9qAkEaWEKU/WDpD+5Q==', 'C:/xampp/htdocs/dilitrust/assets/uploads/documents/CoverLetter.pdf', 3, '2019-08-20 16:10:50');

-- --------------------------------------------------------

--
-- Table structure for table `tb_perms`
--

CREATE TABLE IF NOT EXISTS `tb_perms` (
  `permId` int(11) NOT NULL,
  `permName` varchar(512) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_perms`
--

INSERT INTO `tb_perms` (`permId`, `permName`) VALUES
(1, 'Dashboard'),
(2, 'Documents'),
(3, 'Document Gallery'),
(4, 'Access Control System');

-- --------------------------------------------------------

--
-- Table structure for table `tb_roles`
--

CREATE TABLE IF NOT EXISTS `tb_roles` (
  `roleId` int(11) NOT NULL,
  `roleName` varchar(512) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_roles`
--

INSERT INTO `tb_roles` (`roleId`, `roleName`) VALUES
(1, 'admin'),
(2, 'User'),
(3, 'Manager'),
(4, 'vice manager');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE IF NOT EXISTS `tb_users` (
  `id` int(11) NOT NULL,
  `username` varchar(512) DEFAULT NULL,
  `password` varchar(512) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `roleName` varchar(512) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id`, `username`, `password`, `email`, `roleName`, `date`) VALUES
(1, 'user1', 'e10adc3949ba59abbe56e057f20f883e', 'aman18chd@gmail.com', '1', '2019-08-20 01:37:58'),
(2, 'gargi', 'e10adc3949ba59abbe56e057f20f883e', '', '2', '2019-08-20 04:23:04'),
(3, 'Ivan', 'e10adc3949ba59abbe56e057f20f883e', 'ivan@dilitrust.com', '2', '2019-08-20 16:06:43'),
(4, 'user2test', 'e10adc3949ba59abbe56e057f20f883e', '', '4', '2019-08-20 16:13:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_aclrel`
--
ALTER TABLE `tb_aclrel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_documents`
--
ALTER TABLE `tb_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_perms`
--
ALTER TABLE `tb_perms`
  ADD PRIMARY KEY (`permId`);

--
-- Indexes for table `tb_roles`
--
ALTER TABLE `tb_roles`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_aclrel`
--
ALTER TABLE `tb_aclrel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tb_documents`
--
ALTER TABLE `tb_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tb_perms`
--
ALTER TABLE `tb_perms`
  MODIFY `permId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_roles`
--
ALTER TABLE `tb_roles`
  MODIFY `roleId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
