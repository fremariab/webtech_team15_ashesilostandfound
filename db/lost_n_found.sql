-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2024 at 06:16 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lost_n_found`
--

-- --------------------------------------------------------

--
-- Table structure for table `found_items`
--

CREATE TABLE `found_items` (
  `itemid` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `time` time DEFAULT NULL,
  `location` varchar(255) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `found_status`
--

CREATE TABLE `found_status` (
  `sid` int(11) NOT NULL,
  `sname` varchar(50) NOT NULL DEFAULT 'Found'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `found_status`
--

INSERT INTO `found_status` (`sid`, `sname`) VALUES
(1, 'UnClaimed'),
(2, 'InProgress'),
(3, 'Claimed');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `image_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_size` int(11) NOT NULL,
  `file_type` varchar(50) NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`image_id`, `file_name`, `file_size`, `file_type`, `upload_date`) VALUES
(4, '../uploads/images.jpg', 3734, 'jpg', '2024-02-23 06:03:23'),
(5, '../uploads/glasses_image.jpg', 5233, 'jpg', '2024-02-23 06:04:02'),
(6, '../uploads/iphone.jpg', 5639, 'jpg', '2024-02-23 11:47:48'),
(7, '../uploads/mouse.jpg', 95304, 'jpg', '2024-03-07 16:11:06');

-- --------------------------------------------------------

--
-- Table structure for table `lost_items`
--

CREATE TABLE `lost_items` (
  `itemid` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `time` time DEFAULT NULL,
  `location` varchar(255) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lost_items`
--

INSERT INTO `lost_items` (`itemid`, `rid`, `sid`, `image_id`, `item_name`, `time`, `location`, `description`) VALUES
(4, 2, 1, 4, 'Bag', '00:20:24', 'NM207A', 'Brown Gucci Bag'),
(5, 2, 1, 4, 'Glasses', '00:20:24', 'RB100', 'Black Chanel Glasses'),
(6, 2, 1, 4, 'Phone', '00:20:24', 'RB100', 'Pink Iphone'),
(7, 2, 1, 4, 'Mouse', '00:20:24', 'Apt 216', 'black');

-- --------------------------------------------------------

--
-- Table structure for table `lost_status`
--

CREATE TABLE `lost_status` (
  `sid` int(11) NOT NULL,
  `sname` varchar(50) NOT NULL DEFAULT 'Lost'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lost_status`
--

INSERT INTO `lost_status` (`sid`, `sname`) VALUES
(1, 'Lost'),
(2, 'Searching'),
(3, 'Found');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `rid` int(11) NOT NULL,
  `rname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`rid`, `rname`) VALUES
(1, 'admin'),
(2, 'student'),
(3, 'teaching_staff'),
(4, 'non_teaching_staff'),
(5, 'visitor');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` int(11) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `passwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `rid`, `fname`, `lname`, `gender`, `tel`, `email`, `passwd`) VALUES
(1, 1, 'admin', '', 1, '1234567890', 'a@a.com', 'admin123'),
(2, 2, 'FredaMarie', 'Beecham', 0, '0555300887', 'fb@g.com', '$2y$10$w5AYvN5qn23N8yDGQWt87uTiBE2cnEcZojyr9PaoRehNBcdhXHXTy'),
(3, 2, 'Jay', 'Doe', 0, '1234567890', 'jb@g.com', '$2y$10$CwGIrwGYKIAi5hXE8/TCr.uev0ABoG2BY7G2OaQntSOoFiVrSqox2'),
(4, 2, 'Jackie', 'Chan', 0, '1234567890', 'jc@hotmail.com', '$2y$10$4rzD.6Uk5jVY9y9vo8n9BORkcv/e7tcN562qY8FHPOHnEUFpDJsEK'),
(5, 2, 'Jane', 'Doe', 0, '1234567890', 'jd@gmail.com', '$2y$10$X9fIVVcXC71afP0m9YRWCOxyBg9xOUu7zin0q4vDUiReOxuY9X4rq'),
(6, 2, 'Jeanette', 'Madeson', 0, '12321858991', 'a@admin.com', '$2y$10$rcBGRJ3YD8Bwxs3GEYZI7uaYxw8kvpibu/7a96bp4AEkijbhb9i2i');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `found_items`
--
ALTER TABLE `found_items`
  ADD PRIMARY KEY (`itemid`),
  ADD KEY `rid` (`rid`),
  ADD KEY `sid` (`sid`),
  ADD KEY `found_items_ibfk_3` (`image_id`);

--
-- Indexes for table `found_status`
--
ALTER TABLE `found_status`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `lost_items`
--
ALTER TABLE `lost_items`
  ADD PRIMARY KEY (`itemid`),
  ADD KEY `rid` (`rid`),
  ADD KEY `sid` (`sid`),
  ADD KEY `lost_items_ibfk_3` (`image_id`),
  ADD  UNIQUE KEY `unique_item` (`item_name`, `time`, `location`);


--
-- Indexes for table `lost_status`
--
ALTER TABLE `lost_status`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `rid` (`rid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `found_items`
--
ALTER TABLE `found_items`
  MODIFY `itemid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `found_status`
--
ALTER TABLE `found_status`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lost_items`
--
ALTER TABLE `lost_items`
  MODIFY `itemid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lost_status`
--
ALTER TABLE `lost_status`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `found_items`
--
ALTER TABLE `found_items`
  ADD CONSTRAINT `found_items_ibfk_1` FOREIGN KEY (`rid`) REFERENCES `role` (`rid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `found_items_ibfk_2` FOREIGN KEY (`sid`) REFERENCES `found_status` (`sid`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `found_items_ibfk_3` FOREIGN KEY (`image_id`) REFERENCES `image` (`image_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `lost_items`
--
ALTER TABLE `lost_items`
  ADD CONSTRAINT `lost_items_ibfk_1` FOREIGN KEY (`rid`) REFERENCES `role` (`rid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lost_items_ibfk_2` FOREIGN KEY (`sid`) REFERENCES `lost_status` (`sid`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `lost_items_ibfk_3` FOREIGN KEY (`image_id`) REFERENCES `image` (`image_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`rid`) REFERENCES `role` (`rid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
