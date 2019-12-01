-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2019 at 08:51 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `professional_connect`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AD_ID` int(255) NOT NULL,
  `AD_NAME` varchar(200) NOT NULL,
  `PASSWORD` varchar(250) NOT NULL,
  `PICTURES` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AD_ID`, `AD_NAME`, `PASSWORD`, `PICTURES`, `EMAIL`) VALUES
(1, 'mustafa hasan', 'bXVzdGFmYTEy', '', 'mustafa12@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `back_list`
--

CREATE TABLE `back_list` (
  `BL_ID` int(255) NOT NULL,
  `CUSTOMER_ID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `connection`
--

CREATE TABLE `connection` (
  `CON_ID` int(255) NOT NULL,
  `TEXT` varchar(255) NOT NULL,
  `to_CUSTOMER_ID` int(255) NOT NULL,
  `DATE` date NOT NULL,
  `TIME` varchar(255) NOT NULL,
  `CUSTOMER_ID` int(200) NOT NULL,
  `TYPE` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `connection`
--

INSERT INTO `connection` (`CON_ID`, `TEXT`, `to_CUSTOMER_ID`, `DATE`, `TIME`, `CUSTOMER_ID`, `TYPE`) VALUES
(30, 'hello saad', 10, '2019-11-10', ' \r\n\r\n\r\n  02:28:05pm\r\n        ', 8, 'chat'),
(31, 'i am good', 8, '2019-11-10', ' \r\n\r\n\r\n  03:28:06pm\r\n        ', 10, 'chat'),
(32, 'whats about you', 8, '2019-11-10', ' \r\n\r\n\r\n  03:28:49pm\r\n        ', 10, 'chat'),
(33, 'i am good', 10, '2019-11-27', ' \r\n\r\n\r\n  12:28:59pm\r\n        ', 8, 'chat'),
(34, 'what is going on?', 8, '2019-11-27', ' \r\n\r\n\r\n  12:29:40pm\r\n        ', 10, 'chat'),
(35, 'reply', 8, '2019-11-27', ' \r\n\r\n\r\n  12:30:02pm\r\n        ', 10, 'chat'),
(36, 'hello', 8, '2019-11-27', ' \r\n\r\n\r\n  01:23:21pm\r\n        ', 9, 'chat'),
(37, 'hello', 0, '2019-11-29', ' \r\n\r\n\r\n  04:24:00pm\r\n        ', 8, 'chat');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CUSTOMER_ID` int(11) NOT NULL,
  `CUSTOMER_NAME` varchar(255) NOT NULL,
  `PICTURE` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `GENDER` varchar(255) NOT NULL,
  `CNIC_NUMBER` int(20) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `DATE_OF_BIRTH` varchar(255) NOT NULL,
  `CITY` varchar(255) NOT NULL,
  `COUNTRY` varchar(255) NOT NULL,
  `REVIEW` varchar(255) NOT NULL,
  `FEES` int(255) NOT NULL,
  `ROLE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CUSTOMER_ID`, `CUSTOMER_NAME`, `PICTURE`, `EMAIL`, `GENDER`, `CNIC_NUMBER`, `PASSWORD`, `DATE_OF_BIRTH`, `CITY`, `COUNTRY`, `REVIEW`, `FEES`, `ROLE`) VALUES
(8, 'mustafa', 'mustafa.jpg', 'mustafahassan12at@gmail.com', 'Male', 2147483647, 'bXVzdGFmYTEy', '1998-01-02', 'karachi', 'Pakistan', 'Review', 1000, 'professional'),
(9, 'Saad Alam', 'saadalam.jpg', 'saad_alam9522@yahoo.com', 'Male', 2147483647, 'cfbf799328dd0ae4b223099404b8bde9', '1995-01-01', 'karachi', 'Pakistan', 'Review', 1200, 'user'),
(10, 'Saad usmani', 'saadusmani.jpg', 'saadusmani@gmail.com', 'Male', 2147483647, 'cfbf799328dd0ae4b223099404b8bde9', '1995-01-01', 'karachi', 'Pakistan', 'Review', 2000, 'professional'),
(11, 'noman', '26444f66c8cfe2798e892a669e4df8cf.png', 'noman@gmail.com', 'Male', 2147483647, '2de4b80aee9060539dfb63958056a638', '1995-10-10', 'karachi', 'pakistan', 'Review', 500, 'user'),
(12, 'mohid', 'Matthew_school_boy-512.png', 'mohid@gmail.com', 'Male', 2147483647, '06811e1e08872a733a03a2692ef8cf66', '1998-02-05', 'Karachi', 'Pakistan', 'Review', 800, 'professional'),
(13, 'sadiq', 'Matthew_school_boy-512.png', 'sadiq@gmail.com', 'Male', 2147483647, '86dbc71895d9e5b8d173febc4f26a7b9', '1996-12-13', 'Karachi', 'Pakistan', 'Review', 2000, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `NOT_ID` int(255) NOT NULL,
  `PAYMENT` int(255) DEFAULT NULL,
  `to_CUSTOMER_ID` int(255) NOT NULL,
  `TEXT` varchar(255) NOT NULL,
  `CUSTOMER_ID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`NOT_ID`, `PAYMENT`, `to_CUSTOMER_ID`, `TEXT`, `CUSTOMER_ID`) VALUES
(1, NULL, 0, 'ntxt', 0),
(4, NULL, 8, 'chat start with', 10),
(8, NULL, 12, 'chat start with', 8),
(10, NULL, 10, 'chat start with', 8),
(15, 1000, 7, 'chat', 10);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PAY_ID` int(255) NOT NULL,
  `TRANSACTION` int(255) NOT NULL,
  `METHOD` varchar(2) NOT NULL,
  `MOBILE_NUMBER` int(200) NOT NULL,
  `RATE_ID` int(255) NOT NULL,
  `USER_ID` int(255) NOT NULL,
  `TIME` varchar(255) NOT NULL,
  `DATE` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `qualification`
--

CREATE TABLE `qualification` (
  `Q_ID` int(100) NOT NULL,
  `CUSTOMER_ID` int(100) NOT NULL,
  `PROFESSIONAL_TYPE` varchar(200) NOT NULL,
  `DEGREE` varchar(250) NOT NULL,
  `TYPE` varchar(200) NOT NULL,
  `DESIGNATION` varchar(150) NOT NULL,
  `EXPERINCE` varchar(200) NOT NULL,
  `MATRIC_CERTIFICATE` varchar(255) NOT NULL,
  `INTERMEDIATE_CERTIFICATE` varchar(255) NOT NULL,
  `UNIVERSITY_NAME` varchar(255) NOT NULL,
  `SCHOOL_NAME` varchar(255) NOT NULL,
  `COLLAGE_NAME` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `RATE_ID` int(255) NOT NULL,
  `REVIEW` varchar(255) NOT NULL,
  `CUSTOMER_ID` int(255) NOT NULL,
  `to_CUSTOMER_ID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `search`
--

CREATE TABLE `search` (
  `SEARCH_ID` int(255) NOT NULL,
  `NAME` varchar(255) DEFAULT NULL,
  `TYPE` varchar(255) DEFAULT NULL,
  `EXPERIENCE` int(11) DEFAULT NULL,
  `PROFFESSION` varchar(255) DEFAULT NULL,
  `DATE` varchar(255) NOT NULL,
  `TIME` varchar(255) NOT NULL,
  `CUSTOMER_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `search`
--

INSERT INTO `search` (`SEARCH_ID`, `NAME`, `TYPE`, `EXPERIENCE`, `PROFFESSION`, `DATE`, `TIME`, `CUSTOMER_ID`) VALUES
(1, 'name', NULL, NULL, NULL, 'ate', 'time', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `USER_ID` int(11) NOT NULL,
  `CUSTOMER_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`USER_ID`, `CUSTOMER_ID`) VALUES
(4, NULL),
(7, NULL),
(1, 1),
(2, 2),
(3, 3),
(5, 4),
(6, 5),
(8, 6),
(9, 7),
(10, 8),
(11, 9),
(12, 10),
(13, 11),
(14, 12),
(15, 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AD_ID`);

--
-- Indexes for table `back_list`
--
ALTER TABLE `back_list`
  ADD PRIMARY KEY (`BL_ID`),
  ADD UNIQUE KEY `FOREGIN KEY` (`CUSTOMER_ID`) USING BTREE;

--
-- Indexes for table `connection`
--
ALTER TABLE `connection`
  ADD PRIMARY KEY (`CON_ID`),
  ADD KEY `FOREIGN KEY` (`CUSTOMER_ID`) USING BTREE,
  ADD KEY `to_CUSTOMER_ID` (`to_CUSTOMER_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CUSTOMER_ID`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`NOT_ID`),
  ADD UNIQUE KEY `CUSTOMER_ID` (`to_CUSTOMER_ID`),
  ADD KEY `CUSTOMER_ID_2` (`CUSTOMER_ID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PAY_ID`),
  ADD UNIQUE KEY `RATE_ID` (`RATE_ID`),
  ADD UNIQUE KEY `FOREIGN KEY` (`USER_ID`) USING BTREE;

--
-- Indexes for table `qualification`
--
ALTER TABLE `qualification`
  ADD PRIMARY KEY (`Q_ID`),
  ADD KEY `FOREIGN KEY` (`CUSTOMER_ID`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`RATE_ID`),
  ADD UNIQUE KEY `FOREIGN KEY` (`CUSTOMER_ID`) USING BTREE,
  ADD UNIQUE KEY `to_CUSTOMER_ID` (`to_CUSTOMER_ID`);

--
-- Indexes for table `search`
--
ALTER TABLE `search`
  ADD PRIMARY KEY (`SEARCH_ID`),
  ADD UNIQUE KEY `FOREIGN KEY` (`CUSTOMER_ID`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`USER_ID`),
  ADD UNIQUE KEY `FOREIGN KEY` (`CUSTOMER_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AD_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `back_list`
--
ALTER TABLE `back_list`
  MODIFY `BL_ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `connection`
--
ALTER TABLE `connection`
  MODIFY `CON_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CUSTOMER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `NOT_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `PAY_ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qualification`
--
ALTER TABLE `qualification`
  MODIFY `Q_ID` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `RATE_ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `search`
--
ALTER TABLE `search`
  MODIFY `SEARCH_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `qualification`
--
ALTER TABLE `qualification`
  ADD CONSTRAINT `FOREIGN KEY` FOREIGN KEY (`CUSTOMER_ID`) REFERENCES `customer` (`CUSTOMER_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
