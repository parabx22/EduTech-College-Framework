-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 30, 2023 at 06:03 AM
-- Server version: 5.7.40
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `college`
--

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

DROP TABLE IF EXISTS `exam`;
CREATE TABLE IF NOT EXISTS `exam` (
  `exam_id` int(2) NOT NULL,
  `sem` int(2) NOT NULL,
  `sub_id` int(2) NOT NULL,
  `exam_type` varchar(30) NOT NULL,
  `RC` varchar(15) NOT NULL,
  PRIMARY KEY (`exam_id`),
  KEY `sub_id` (`sub_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`exam_id`, `sem`, `sub_id`, `exam_type`, `RC`) VALUES
(1, 1, 1, 'Repeat', '2019-20'),
(2, 2, 2, 'Regular', '2020-21');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

DROP TABLE IF EXISTS `faculty`;
CREATE TABLE IF NOT EXISTS `faculty` (
  `faculty_id` int(5) NOT NULL,
  `firstname` varchar(10) NOT NULL,
  `lastname` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL,
  `phone no` varchar(10) NOT NULL,
  `department` varchar(15) NOT NULL,
  PRIMARY KEY (`faculty_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `firstname`, `lastname`, `email`, `password`, `phone no`, `department`) VALUES
(1, 'Vivek', 'Jog', 'vivek12@gmail.com', '1234', '9988776655', 'Computer'),
(2, 'Sweta', 'Rane', 'sweta11@gmail.com', '1234', '8769876651', 'Computer'),
(3, 'Amey', 'Tilve', 'amey12@gmail.com', '1234', '7686970021', 'Computer'),
(4, 'Samantha', 'Gomez', 'sam12@gmail.com', '1234', '7687659876', 'ETC'),
(5, 'Satyesh', 'Kakodkar', 'Satyesh@gmail.com', '1234', '8877092233', 'Civil'),
(6, 'Saurabh ', 'Raikar', 'Saurabh@gmail.com', '1234', '9876543210', 'Mechanical');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `rollno` int(10) NOT NULL,
  `firstname` varchar(10) NOT NULL,
  `lastname` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `category` varchar(5) NOT NULL,
  `gender` varchar(3) NOT NULL,
  `department` varchar(15) NOT NULL,
  `sem` int(2) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `RC` varchar(15) NOT NULL,
  PRIMARY KEY (`rollno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`rollno`, `firstname`, `lastname`, `email`, `password`, `category`, `gender`, `department`, `sem`, `phone`, `RC`) VALUES
(1914001, 'Samiksha', 'Chari', 'sam@gmail.com', '1234', 'obc', 'F', 'Computer', 1, '9090887655', '2019-20');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
CREATE TABLE IF NOT EXISTS `subject` (
  `sub_id` int(5) NOT NULL,
  `Sub_name` varchar(50) NOT NULL,
  `sub_code` int(10) NOT NULL,
  `credits` int(3) NOT NULL,
  `sem` int(2) NOT NULL,
  `RC` varchar(15) NOT NULL,
  PRIMARY KEY (`sub_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
