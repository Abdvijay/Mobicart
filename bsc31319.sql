-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 12, 2020 at 03:18 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bsc31319`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cid` int(255) NOT NULL auto_increment,
  `mobilebrand` varchar(255) NOT NULL,
  `mobilename` varchar(255) NOT NULL,
  `mobilecolor` varchar(255) NOT NULL,
  `mobileram` varchar(255) NOT NULL,
  `mobilerom` varchar(255) NOT NULL,
  `mobileprice` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `totalamount` varchar(255) NOT NULL,
  `uid` varchar(255) NOT NULL,
  PRIMARY KEY  (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cid`, `mobilebrand`, `mobilename`, `mobilecolor`, `mobileram`, `mobilerom`, `mobileprice`, `quantity`, `totalamount`, `uid`) VALUES
(12, 'vivo', 'z1 pro', 'white', '4gb', '64gb', '13999', 12, '167988', '4'),
(13, 'REDMI', 'Note 5 Pro', 'moon blue', '4gb', '64gb', '12999', 3, '38997', '4'),
(17, 'REDMI', 'Note 5 Pro', 'moon blue', '4gb', '64gb', '12999', 5, '64995', '1'),
(18, 'vivo', 'z1 pro', 'white', '4gb', '64gb', '13999', 2, '27998', '1');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`name`, `email`, `description`) VALUES
('vijay', 'abdvijay@gmail.com', 'Excellent page...Thank You...'),
('ravi', 'ravi@gmail.com', 'lsu payale....'),
('kalai', 'kalai@gmail.com', 'Hii...Kalai How you?'),
('madura ponnu', 'kalaivijay@gmail.com', 'Hii...You So Cute');

-- --------------------------------------------------------

--
-- Table structure for table `mobile`
--

CREATE TABLE `mobile` (
  `pid` int(255) NOT NULL auto_increment,
  `mobilecode` varchar(255) NOT NULL,
  `mobilebrand` varchar(255) NOT NULL,
  `mobilename` varchar(255) NOT NULL,
  `mobiledisplay` varchar(255) NOT NULL,
  `mobilecamera` varchar(255) NOT NULL,
  `mobilebattery` varchar(255) NOT NULL,
  `mobilesoc` varchar(255) NOT NULL,
  `mobileram` varchar(255) NOT NULL,
  `mobilerom` varchar(255) NOT NULL,
  `mobilecolor` varchar(255) NOT NULL,
  `mobileprice` varchar(255) NOT NULL,
  PRIMARY KEY  (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `mobile`
--

INSERT INTO `mobile` (`pid`, `mobilecode`, `mobilebrand`, `mobilename`, `mobiledisplay`, `mobilecamera`, `mobilebattery`, `mobilesoc`, `mobileram`, `mobilerom`, `mobilecolor`, `mobileprice`) VALUES
(1, 'rn5p', 'REDMI', 'Note 5 Pro', 'ips lcd display', '48mp', '4100mah', 'snapdragon 660', '4gb', '64gb', 'moon blue', '12999'),
(2, 'viz1p', 'vivo', 'z1 pro', 'ips lcd display', '48mp', '4500mah', 'snapdragon 660', '4gb', '64gb', 'white', '13999');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `oid` int(255) NOT NULL auto_increment,
  `dno` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `place` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `landmark` varchar(255) NOT NULL,
  `date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `uid` int(255) NOT NULL,
  PRIMARY KEY  (`oid`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `order`
--


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(255) NOT NULL auto_increment,
  `username` varchar(255) NOT NULL,
  `mailid` varchar(255) NOT NULL,
  `phoneno` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY  (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `username`, `mailid`, `phoneno`, `password`) VALUES
(1, 'vijay', 'abdvijay@gmail.com', '9080457889', 'vijay'),
(2, 'dayal', 'dayal@gmail.com', '9876543210', 'dayal'),
(3, 'raja', 'raja.esakki@gmail.com', '9807654321', 'raja'),
(4, 'kalai', 'kalai@gmail.com', '9080345689', 'kalai');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;
