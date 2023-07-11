-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 04, 2023 at 01:37 PM
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
-- Table structure for table `rollno`
--

DROP TABLE IF EXISTS `rollno`;
CREATE TABLE IF NOT EXISTS `rollno` (
  `id` int(2) NOT NULL,
  `stud_rollno` int(7) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rollno`
--

INSERT INTO `rollno` (`id`, `stud_rollno`) VALUES
(1, 2023401),
(2, 2022401),
(3, 2021401),
(4, 2020401),
(5, 2023301),
(6, 2022301),
(7, 2021301),
(8, 2020301),
(9, 2023201),
(10, 2022201),
(11, 2021201),
(12, 2020201),
(13, 2023101),
(14, 2022101),
(15, 2021101),
(16, 2020101),
(1, 2023401),
(2, 2022401),
(3, 2021401),
(4, 2020401),
(5, 2023301),
(6, 2022301),
(7, 2021301),
(8, 2020301),
(9, 2023201),
(10, 2022201),
(11, 2021201),
(12, 2020201),
(13, 2023101),
(14, 2022101),
(15, 2021101),
(16, 2020101),
(1, 2023401),
(1, 2023402),
(1, 2023403),
(1, 2023404),
(1, 2023405),
(1, 2023406),
(1, 2023407),
(1, 2023408),
(1, 2023409),
(1, 2023410),
(1, 2023411),
(1, 2023412),
(1, 2023413),
(1, 2023414),
(1, 2023415),
(1, 2023416),
(1, 2023417),
(1, 2023418),
(1, 2023402),
(1, 2023403),
(1, 2023402),
(2, 2022402),
(2, 2022403),
(2, 2022404),
(2, 2022405),
(2, 2022406),
(2, 2022407),
(2, 2022408),
(2, 2022409),
(2, 2022410),
(2, 2022411),
(2, 2022412),
(2, 2022413),
(2, 2022414),
(2, 2022415),
(2, 2022416),
(2, 2022417),
(2, 2022418),
(2, 2022419),
(2, 2022420),
(2, 2022421),
(3, 2021402),
(3, 2021403),
(3, 2021404),
(3, 2021405),
(3, 2021406),
(3, 2021407),
(3, 2021408),
(3, 2021409),
(3, 2021410),
(3, 2021411),
(3, 2021412),
(3, 2021413),
(3, 2021414),
(3, 2021415),
(3, 2021416),
(3, 2021417),
(3, 2021418),
(3, 2021419),
(3, 2021420),
(4, 2020402),
(4, 2020403),
(4, 2020404),
(4, 2020405),
(4, 2020406),
(4, 2020407),
(4, 2020408),
(4, 2020409),
(4, 2020410),
(4, 2020411),
(4, 2020412),
(4, 2020413),
(4, 2020414),
(4, 2020415),
(4, 2020416),
(4, 2020417),
(4, 2020418),
(4, 2020419),
(1, 2023402),
(1, 2023403),
(1, 2023404),
(1, 2023405),
(1, 2023406),
(1, 2023407),
(1, 2023408),
(1, 2023409),
(1, 2023410),
(1, 2023411),
(1, 2023412),
(1, 2023413),
(1, 2023414),
(1, 2023415),
(1, 2023416),
(1, 2023417),
(1, 2023418),
(1, 2023419),
(1, 2023420),
(1, 2023421),
(1, 2023422),
(1, 2023423),
(1, 2023424),
(1, 2023425),
(1, 2023426),
(1, 2023427),
(1, 2023428),
(1, 2023429),
(1, 2023430),
(1, 2023431),
(2, 2022422),
(2, 2022423),
(2, 2022422),
(2, 2022423),
(2, 2022424),
(2, 2022425),
(2, 2022426),
(2, 2022427),
(2, 2022428),
(2, 2022429),
(2, 2022430),
(2, 2022431),
(2, 2022432),
(2, 2022433),
(2, 2022434),
(2, 2022435),
(2, 2022436),
(2, 2022437),
(2, 2022438),
(2, 2022439),
(2, 2022440),
(2, 2022441),
(2, 2022442),
(2, 2022443),
(2, 2022444),
(2, 2022445),
(2, 2022446),
(2, 2022447),
(2, 2022448),
(2, 2022449),
(2, 2022450),
(2, 2022451),
(1, 2023432),
(1, 2023433),
(1, 2023434),
(1, 2023435),
(1, 2023436),
(1, 2023437),
(1, 2023438),
(1, 2023439),
(1, 2023440),
(1, 2023441),
(1, 2023442),
(1, 2023443),
(1, 2023444),
(1, 2023445),
(1, 2023446),
(1, 2023447),
(1, 2023448),
(1, 2023449),
(1, 2023450),
(1, 2023451),
(1, 2023452),
(1, 2023453),
(1, 2023454),
(1, 2023455),
(1, 2023456),
(1, 2023457),
(1, 2023458),
(1, 2023459),
(1, 2023460),
(1, 2023461),
(3, 2021421),
(3, 2021422),
(3, 2021423),
(3, 2021424),
(3, 2021425),
(3, 2021426),
(3, 2021427),
(3, 2021428),
(3, 2021429),
(3, 2021430),
(3, 2021431),
(3, 2021432),
(3, 2021433),
(3, 2021434),
(3, 2021435),
(3, 2021436),
(3, 2021437),
(3, 2021438),
(3, 2021439),
(3, 2021440),
(3, 2021441),
(3, 2021442),
(3, 2021443),
(3, 2021444),
(3, 2021445),
(3, 2021446),
(3, 2021447),
(3, 2021448),
(3, 2021449),
(3, 2021450),
(3, 2021451),
(3, 2021452),
(3, 2021453),
(3, 2021454),
(3, 2021455),
(3, 2021456),
(3, 2021457),
(3, 2021458),
(3, 2021459),
(3, 2021460),
(4, 2020420),
(4, 2020421),
(4, 2020422),
(4, 2020423),
(4, 2020424),
(4, 2020425),
(4, 2020426),
(4, 2020427),
(4, 2020428),
(4, 2020429),
(4, 2020430),
(4, 2020431),
(4, 2020432),
(4, 2020433),
(4, 2020434),
(4, 2020435),
(4, 2020436),
(4, 2020437),
(4, 2020438),
(4, 2020439),
(4, 2020440),
(4, 2020441),
(4, 2020442),
(4, 2020443),
(4, 2020444),
(4, 2020445),
(4, 2020446),
(4, 2020447),
(4, 2020448),
(4, 2020449),
(4, 2020450),
(4, 2020451),
(4, 2020452),
(4, 2020453),
(4, 2020454),
(4, 2020455),
(4, 2020456);

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

DROP TABLE IF EXISTS `seat`;
CREATE TABLE IF NOT EXISTS `seat` (
  `id` int(5) NOT NULL,
  `class` varchar(20) NOT NULL,
  `capacity` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seat`
--

INSERT INTO `seat` (`id`, `class`, `capacity`) VALUES
(1, 'FE Comp', 40),
(2, 'SE Comp', 43),
(3, 'TE Comp', 45),
(4, 'BE Comp', 41),
(5, 'FE ETC', 42),
(6, 'SE ETC', 44),
(7, 'TE ETC', 46),
(8, 'BE ETC', 47),
(9, 'FE MECH', 48),
(10, 'SE MECH', 38),
(11, 'TE MECH', 49),
(12, 'BE MECH', 50),
(13, 'FE CIVIL', 51),
(14, 'SE CIVIL', 52),
(15, 'TE CIVIL', 53),
(16, 'BE CIVIL', 54);

-- --------------------------------------------------------

--
-- Table structure for table `seatingplan`
--

DROP TABLE IF EXISTS `seatingplan`;
CREATE TABLE IF NOT EXISTS `seatingplan` (
  `seat_number` int(5) NOT NULL,
  `row_number` int(7) NOT NULL,
  `available` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seatingplan`
--

INSERT INTO `seatingplan` (`seat_number`, `row_number`, `available`) VALUES
(1, 1914043, 20),
(1, 1914043, 20);

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
