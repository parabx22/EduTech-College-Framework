-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 28, 2023 at 11:12 AM
-- Server version: 8.0.31
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
-- Table structure for table `dept`
--

DROP TABLE IF EXISTS `dept`;
CREATE TABLE IF NOT EXISTS `dept` (
  `dept_id` int NOT NULL,
  `dept_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`dept_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dept`
--

INSERT INTO `dept` (`dept_id`, `dept_name`) VALUES
(1, 'Civil'),
(2, 'Mech'),
(3, 'Etc'),
(4, 'Comp');

-- --------------------------------------------------------

--
-- Table structure for table `exam_reg`
--

DROP TABLE IF EXISTS `exam_reg`;
CREATE TABLE IF NOT EXISTS `exam_reg` (
  `reg_id` int NOT NULL AUTO_INCREMENT,
  `reg_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sem` int NOT NULL,
  `rc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `categry` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `selected_subjects` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `rno` int NOT NULL,
  `dept` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `reg_date` date NOT NULL,
  `amount` int NOT NULL,
  PRIMARY KEY (`reg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam_reg`
--

INSERT INTO `exam_reg` (`reg_id`, `reg_type`, `sem`, `rc`, `categry`, `selected_subjects`, `rno`, `dept`, `reg_date`, `amount`) VALUES
(25, 'Regular', 2, 'RC 2019-20', 'OBC', 'Maths-2, Chemistry', 1914031, 'Computer Engineering', '2023-06-12', 1365),
(26, 'Regular', 2, 'RC 2019-20', 'OBC', 'Maths-2, Chemistry, Computer Programming, ICE, Chemistry-lab', 1914031, 'Computer Engineering', '2023-06-12', 2310),
(27, 'Regular', 8, 'RC 2019-20', 'General', 'crypto', 1914043, 'Computer Engineering', '2023-06-12', 1365),
(28, 'Regular', 2, 'RC 2019-20', 'OBC', 'Maths-2, Chemistry, Computer Programming, ICE, Chemistry-lab', 1914031, 'Computer Engineering', '2023-06-28', 2310),
(29, 'Regular', 2, 'RC 2019-20', 'OBC', 'Maths-2', 1914031, 'Computer Engineering', '2023-06-28', 945);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

DROP TABLE IF EXISTS `faculty`;
CREATE TABLE IF NOT EXISTS `faculty` (
  `faculty_id` int NOT NULL,
  `fname` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lname` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `faculty_email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phno` bigint NOT NULL,
  `dept_name` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`faculty_email`),
  UNIQUE KEY `faculty_id` (`faculty_id`),
  UNIQUE KEY `faculty_id_2` (`faculty_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `fname`, `lname`, `faculty_email`, `password`, `phno`, `dept_name`) VALUES
(1, 'Vivek', 'Jog', 'vivek12@gmail.com', '1234', 9988776655, 'Computer'),
(2, 'Sweta', 'Rane', 'sweta11@gmail.com', '1234', 8769876651, 'Computer'),
(3, 'Amey', 'Tilve', 'amey12@gmail.com', '1234', 7686970021, 'Computer'),
(4, 'Samantha', 'Gomez', 'sam12@gmail.com', '1234', 7687659876, 'ETC'),
(5, 'Satyesh', 'Kakodkar', 'Satyesh@gmail.com', '1234', 8877092233, 'Civil'),
(6, 'Saurabh ', 'Raikar', 'Saurabh@gmail.com', '1234', 9876543210, 'Mechanical');

-- --------------------------------------------------------

--
-- Table structure for table `fourthyear`
--

DROP TABLE IF EXISTS `fourthyear`;
CREATE TABLE IF NOT EXISTS `fourthyear` (
  `Roll_No` int DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fourthyear`
--

INSERT INTO `fourthyear` (`Roll_No`, `first_name`, `last_name`) VALUES
(1, 'Benjamin', 'Henry'),
(2, 'Raymond', 'Willis'),
(3, 'Alice', 'Edwards'),
(4, 'Michael', 'Ruiz'),
(5, 'Julie', 'Morris'),
(6, 'Jonathan', 'Bowman'),
(7, 'Tammy', 'Hill'),
(8, 'Ralph', 'Day'),
(9, 'Ronald', 'Gordon'),
(10, 'Wayne', 'Hudson'),
(11, 'Billy', 'Fowler'),
(12, 'Jason', 'Watson'),
(13, 'Sharon', 'Ward'),
(14, 'Julie', 'Sanders'),
(15, 'Douglas', 'Scott'),
(16, 'Katherine', 'Chavez'),
(17, 'Juan', 'Parker'),
(18, 'Sara', 'Harris'),
(19, 'Joan', 'Cox'),
(20, 'Teresa', 'Parker'),
(21, 'Christine', 'Smith'),
(22, 'Dennis', 'Simmons'),
(23, 'Jesse', 'Reed'),
(24, 'Nicholas', 'Stanley'),
(25, 'Patrick', 'Shaw'),
(26, 'Jack', 'Hughes'),
(27, 'James', 'Ruiz'),
(28, 'Steven', 'Greene'),
(29, 'Heather', 'Welch'),
(30, 'Cynthia', 'Hill'),
(31, 'Lisa', 'Fowler'),
(32, 'Shawn', 'Armstrong'),
(33, 'Alan', 'Williams'),
(34, 'Keith', 'Roberts'),
(35, 'Phyllis', 'Boyd'),
(36, 'Teresa', 'Wilson'),
(37, 'Earl', 'Holmes'),
(38, 'Matthew', 'Matthews'),
(39, 'Charles', 'Mitchell'),
(40, 'Shirley', 'Ferguson'),
(41, 'Arthur', 'Gardner'),
(42, 'Shirley', 'Andrews'),
(43, 'Christine', 'Thomas'),
(44, 'Frank', 'Freeman'),
(45, 'Jean', 'Willis'),
(46, 'Carolyn', 'Wilson'),
(47, 'Justin', 'Garcia'),
(48, 'Elizabeth', 'Elliott'),
(49, 'Rebecca', 'Barnes'),
(50, 'Debra', 'Washington'),
(51, 'John', 'Scott'),
(52, 'Steve', 'Smith'),
(53, 'Jose', 'Oliver'),
(54, 'Fred', 'Tucker'),
(55, 'Mary', 'Kim'),
(56, 'William', 'Perez'),
(57, 'Nancy', 'Perez'),
(58, 'Juan', 'Ramirez'),
(59, 'Joshua', 'Dean'),
(60, 'Albert', 'Fuller'),
(61, 'Juan', 'Franklin'),
(62, 'Doris', 'Kennedy'),
(63, 'Joseph', 'Banks'),
(64, 'Tammy', 'Palmer'),
(65, 'William', 'Ford'),
(66, 'Carolyn', 'Russell'),
(67, 'Thomas', 'Lane'),
(68, 'Lawrence', 'Rogers'),
(69, 'Teresa', 'Graham'),
(70, 'Patricia', 'Russell'),
(71, 'David', 'White'),
(72, 'Ronald', 'Price'),
(73, 'Jane', 'Johnston'),
(74, 'Mary', 'Williamson'),
(75, 'Earl', 'Alvarez'),
(76, 'John', 'Murphy'),
(77, 'Billy', 'Gilbert'),
(78, 'Brandon', 'Watkins'),
(79, 'Sean', 'Moreno'),
(80, 'Cheryl', 'Perez');

-- --------------------------------------------------------

--
-- Table structure for table `rollno`
--

DROP TABLE IF EXISTS `rollno`;
CREATE TABLE IF NOT EXISTS `rollno` (
  `id` int NOT NULL,
  `stud_rollno` int NOT NULL
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
  `id` int NOT NULL,
  `class` varchar(20) NOT NULL,
  `capacity` int NOT NULL
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
-- Table structure for table `secondyear`
--

DROP TABLE IF EXISTS `secondyear`;
CREATE TABLE IF NOT EXISTS `secondyear` (
  `Roll_No` int DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `secondyear`
--

INSERT INTO `secondyear` (`Roll_No`, `first_name`, `last_name`) VALUES
(1, 'Ronald', 'Mendoza'),
(2, 'Howard', 'Crawford'),
(3, 'Lois', 'Peters'),
(4, 'Rachel', 'Sims'),
(5, 'Joyce', 'Hanson'),
(6, 'Gerald', 'Morales'),
(7, 'Thomas', 'Lawrence'),
(8, 'Kimberly', 'Riley'),
(9, 'Roger', 'Woods'),
(10, 'Adam', 'Williamson'),
(11, 'Barbara', 'Young'),
(12, 'Elizabeth', 'Knight'),
(13, 'Frank', 'Baker'),
(14, 'Alan', 'Weaver'),
(15, 'Cynthia', 'Hernandez'),
(16, 'Patricia', 'Bryant'),
(17, 'George', 'Gordon'),
(18, 'Louis', 'Ford'),
(19, 'Anna', 'George'),
(20, 'Christina', 'Torres'),
(21, 'Marie', 'Reynolds'),
(22, 'Russell', 'Fernandez'),
(23, 'Robin', 'Edwards'),
(24, 'Thomas', 'Martinez'),
(25, 'Beverly', 'Rose'),
(26, 'Dennis', 'Murray'),
(27, 'Mark', 'Banks'),
(28, 'Christopher', 'Sullivan'),
(29, 'Samuel', 'Mcdonald'),
(30, 'Laura', 'Flores'),
(31, 'Mildred', 'Ruiz'),
(32, 'Joan', 'Hayes'),
(33, 'Justin', 'Jackson'),
(34, 'Thomas', 'Dunn'),
(35, 'Elizabeth', 'Edwards'),
(36, 'Brenda', 'Martinez'),
(37, 'Teresa', 'Owens'),
(38, 'Lawrence', 'Patterson'),
(39, 'Jonathan', 'Cox'),
(40, 'Lori', 'Rodriguez'),
(41, 'Eugene', 'Ortiz'),
(42, 'Catherine', 'Clark'),
(43, 'Kathryn', 'Gomez'),
(44, 'Sandra', 'Robertson'),
(45, 'Michael', 'Owens'),
(46, 'Margaret', 'Fernandez'),
(47, 'Stephen', 'Gibson'),
(48, 'Dorothy', 'Sullivan'),
(49, 'Sean', 'Carpenter'),
(50, 'Steven', 'James'),
(51, 'Edward', 'Berry'),
(52, 'Scott', 'Cole'),
(53, 'Cynthia', 'Murray'),
(54, 'Jacqueline', 'Diaz'),
(55, 'Melissa', 'Lynch'),
(56, 'Cynthia', 'Peterson'),
(57, 'Debra', 'Robinson'),
(58, 'Lawrence', 'Mendoza'),
(59, 'Jean', 'Griffin'),
(60, 'Annie', 'Burns'),
(61, 'Billy', 'Marshall'),
(62, 'Roger', 'Holmes'),
(63, 'David', 'Moreno'),
(64, 'Johnny', 'Wright'),
(65, 'Stephen', 'Mendoza'),
(66, 'Jose', 'Alvarez'),
(67, 'Russell', 'Pierce'),
(68, 'Brian', 'Spencer'),
(69, 'William', 'Brooks'),
(70, 'Chris', 'Fields'),
(71, 'Adam', 'Davis'),
(72, 'Harold', 'Price'),
(73, 'Tammy', 'Peters'),
(74, 'Louise', 'Watson'),
(75, 'Denise', 'Murphy'),
(76, 'Edward', 'Kelley'),
(77, 'Donald', 'Wallace'),
(78, 'Raymond', 'Foster'),
(79, 'Steven', 'Fowler'),
(80, 'Catherine', 'Oliver');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `fname` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lname` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `rno` int NOT NULL,
  `email` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dept` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sem` int NOT NULL,
  `gender` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phno` bigint NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `categry` varchar(10) NOT NULL,
  `rc` char(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`rno`),
  UNIQUE KEY `rno` (`rno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`fname`, `lname`, `rno`, `email`, `dept`, `sem`, `gender`, `phno`, `password`, `categry`, `rc`) VALUES
('Prachi', 'Parab', 1914031, '1914031@dbcegoa.ac.in', 'Computer Engineering', 8, 'F', 9923509272, 'e43cb225ebad7fa34ed46ef7daccbf77', 'OBC', 'RC 2019-20'),
('Samiksha', 'Chari', 1914043, '1914043@dbcegoa.ac.in', 'Computer Engineering', 8, 'F', 9090223123, 'a49f68b2df7df9d47b1d2e807d9934ba', 'General', 'RC 2019-20');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
CREATE TABLE IF NOT EXISTS `subject` (
  `sub_id` int NOT NULL,
  `sub_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sub_code` varchar(10) NOT NULL,
  `credits` int NOT NULL,
  `sem` int NOT NULL,
  `rc` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dept` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `faculty_id` int NOT NULL,
  PRIMARY KEY (`sub_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`sub_id`, `sub_name`, `sub_code`, `credits`, `sem`, `rc`, `dept`, `faculty_id`) VALUES
(110, 'Maths-1', 'FE110', 4, 1, 'RC 2019-20', 'All', 1),
(120, 'Physics', 'FE120', 4, 1, 'RC 2019-20', 'All', 2),
(130, 'BEEE', 'FE130', 3, 1, 'RC 2019-20', 'All', 3),
(140, 'BME', 'FE140', 3, 1, 'RC 2019-20', 'All', 4),
(150, 'Physics Lab', 'FE150', 1, 1, 'RC 2019-20', 'All', 2),
(160, 'Electronic lab', 'FE160', 1, 1, 'RC 2019-20', 'All', 3),
(170, 'Workshop-1', 'FE170', 1, 1, 'RC 2019-20', 'All', 4),
(210, 'Maths-2', 'FE210', 4, 2, 'RC 2019-20', 'All', 1),
(220, 'Chemistry', 'FE220', 4, 2, 'RC 2019-20', 'All', 5),
(230, 'Computer Programming', 'FE230', 4, 2, 'RC 2019-20', 'All', 6),
(240, 'ICE', 'FE240', 4, 2, 'RC 2019-20', 'All', 7),
(250, 'Chemistry-lab', 'FE250', 1, 2, 'RC 2019-20', 'All', 5),
(801, 'crypto', 'BE801', 4, 8, 'RC 2019-20', 'COMP', 80);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE IF NOT EXISTS `subjects` (
  `SubjectCode` varchar(20) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `ShortNames` varchar(10) NOT NULL,
  `Lecturer_Id` varchar(10) NOT NULL,
  PRIMARY KEY (`SubjectCode`),
  KEY `Lecturer_Id` (`Lecturer_Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`SubjectCode`, `Name`, `ShortNames`, `Lecturer_Id`) VALUES
('TEITC602', 'Distributed System', 'D.S', '1005'),
('TEITC604', 'Data mining and business Intelligence', 'D.M.B.I', '1002'),
('TEITC605', 'Advanced Internet Technology', 'A.I.T', '1004'),
('TEITC601', 'Software Engineering', 'S.E', '1001'),
('TEITC603', 'Software and Web Security', 'S.W.S', '1010'),
('BEITC701', 'Software Project Management', 'S.P.M', '1001'),
('BEITC702', 'Cloud Computing', 'C.C', '1005'),
('BEITC703', 'Intelligent System', 'I.S', '1005'),
('BEITC704', 'Wireless Technology', 'W.T', '1009'),
('BEITC705', 'Elective-1', 'E-1', '1008'),
('BEITC801', 'Storage Network Management and Retrieval', 'S.N.M.R', '1009'),
('BEITC802', 'Big Data Analytics', 'B.D.A', '1005'),
('BEITC803', 'Computer Simulation and Modeling', 'C.S.M', '1001'),
('BEITC804', 'Elective-2', 'E-2', '1001'),
('TEITC501', 'Computer Graphics And Virtual Reality', 'C.G.V.R', '1004'),
('TEITC502', 'Operating System', 'O.S', '1001'),
('TEITC503', 'Microcontroller and Embeded System', 'M.C.E.S', '1007'),
('TEITC504', 'Advanced Database Management Systems', 'A.D.B.M.S', '1010'),
('TEITC505', 'Open Source Technologies', 'O.S.T', '1002'),
('TEITC506', 'Business Communication And Ethics', 'B.C.E', ''),
('SEITC301', 'Applied Mathemetics 3', 'A.M 3', ''),
('SEITC302', 'Data Structure And Algorithm', 'D.S.A', '1008'),
('SEITC303', 'Object Oriented Programming Methodology', 'O.O.P.M', '1010'),
('SEITC304', 'Analog And Digital Circuits', 'A.D.C', '1007'),
('SEITC306', 'Principles Of Analog And Digital Comm', 'P.A.D.C', ''),
('SEITC305', 'Database Management System', 'D.B.M.S', '1010'),
('SEITC401', 'Applied Mathemetics 4', 'A.M 4', ''),
('SEITC402', 'Computer Networks', 'C.N', '1002'),
('SEITC403', 'Computer Organization And Architecture', 'C.O.A', '1007'),
('SEITC404', 'Automata Theory', 'A.T', '1006'),
('SEITC405', 'Web Programming', 'W.P', '1003'),
('SEITC406', 'Information Theory And Coding', 'I.T.C', '1010'),
('FEITC202', 'Mathematics', 'Maths', '1005'),
('FEITC203', 'Basics of Mechanical Engineering', 'B.M.E', '1002'),
('FEITC205', 'Physics', 'Phy', '1004'),
('FEITC107', 'Chemistry', 'Chem', '1005'),
('FEITC102', 'Basic of Electrical and Electronic Engg', 'B.E.E.E', '1002'),
('FEITC105', 'Programming with C', 'C Prog.', '1010');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `full_name`, `username`, `password`, `date_created`) VALUES
(1, 'admin', 'admin', 'admin', '2021-12-25 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attendance`
--

DROP TABLE IF EXISTS `tbl_attendance`;
CREATE TABLE IF NOT EXISTS `tbl_attendance` (
  `attendance_id` int NOT NULL AUTO_INCREMENT,
  `employee_qrcode` text NOT NULL,
  `time_in` text NOT NULL,
  `time_out` text NOT NULL,
  `logdate` text NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`attendance_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_attendance`
--

INSERT INTO `tbl_attendance` (`attendance_id`, `employee_qrcode`, `time_in`, `time_out`, `logdate`, `status`) VALUES
(10, 'HaKlQu4z', '07:08:PM', '', '2023-03-20', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

DROP TABLE IF EXISTS `tbl_department`;
CREATE TABLE IF NOT EXISTS `tbl_department` (
  `department_id` int NOT NULL AUTO_INCREMENT,
  `department_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`department_id`, `department_name`, `description`) VALUES
(2, 'Accounting Department', 'Accounting Description'),
(3, 'MIS Department', 'MIS  Description'),
(4, 'Computer Engineering', 'Comp'),
(5, 'Mechanical Engineering', 'Mech'),
(6, 'Electronics and Telecomunication Engineering', 'ETC'),
(8, 'Civil Engineering', 'Civil');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

DROP TABLE IF EXISTS `tbl_employee`;
CREATE TABLE IF NOT EXISTS `tbl_employee` (
  `employee_id` int NOT NULL AUTO_INCREMENT,
  `employee_idno` text NOT NULL,
  `password` text NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `bdate` text NOT NULL,
  `complete_address` varchar(255) NOT NULL,
  `cnumber` varchar(11) NOT NULL,
  `gender` text NOT NULL,
  `civilstatus` text NOT NULL,
  `datehire` text NOT NULL,
  `designation` text NOT NULL,
  `department` text NOT NULL,
  `qr_code` text NOT NULL,
  PRIMARY KEY (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`employee_id`, `employee_idno`, `password`, `first_name`, `middle_name`, `last_name`, `bdate`, `complete_address`, `cnumber`, `gender`, `civilstatus`, `datehire`, `designation`, `department`, `qr_code`) VALUES
(6, '602467', 'abcdef', 'Neru', 'Ddd', 'Yyy', '2000-07-23', 'shiroda', '8877995566', 'Male', 'Single', '2023-03-22', '8', 'Computer Engineering', '7zJyuniZ'),
(7, '919896', '123456', 'Samaira', 'Diksha', 'Naik', '2023-03-23', 'BLUE SAPPHIRE BLDG, COLMOROD, NAVELIM, SALCETE - GOA.', '07020062694', 'Female', 'Single', '2023-03-23', '7', 'Computer Engineering', 'wY1itcoS'),
(8, '379550', '123456', 'Samk', 'Tggf', 'Kjhg', '2023-03-17', 'dgf', '5566778899', 'Female', 'Single', '2023-03-23', '2', 'Computer Engineering', 'aeuOxDjU'),
(9, '525693', '55555555555', 'Sami', 'Ytr', 'Cha', '2023-03-30', 'uuug', '9988776655', 'Female', 'Single', '2023-03-24', '1', 'Computer Engineering', 'HaKlQu4z'),
(10, '698298', '0000000009', 'Halk', 'Tuhvbg', 'Hush', '2023-03-18', 'kjkjhftf', '0099887654', 'Female', 'Single', '2023-03-23', '1', 'Computer Engineering', 'SlCLZO1c'),
(11, '848104', '77777777777', 'Savi', 'Shet', 'Shirodkar', '2001-03-24', 'Shiroda', '88777665544', 'Female', 'Single', '2023-03-19', '6', 'Computer Engineering', 'n3wmi2Z4'),
(12, '854347', '123456', 'Pandharinath', 'Satish', 'Verlekar', '1997-07-23', 'BLUE SAPPHIRE BLDG, COLMOROD, NAVELIM, SALCETE - GOA.', '07875036204', 'Male', 'Single', '2023-03-17', '8', 'Computer Engineering', 'vgKzdhPY'),
(13, '463318', '123456', 'Prathamesh', 'Satish', 'Verlekar', '1997-07-23', 'BLUE SAPPHIRE BLDG, COLMOROD, NAVELIM, SALCETE - GOA.', '7875036204', 'Male', 'Single', '2020-08-18', '8', 'Computer Engineering', 'jPSCbB83');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
CREATE TABLE IF NOT EXISTS `teachers` (
  `EmpId` varchar(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Designation` varchar(20) NOT NULL,
  PRIMARY KEY (`EmpId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`EmpId`, `Name`, `Designation`) VALUES
('1001', 'Mahalaxmi', 'Lecturer'),
('1002', 'Tayyabali', 'Assistant Professor'),
('1003', 'Nilesh', 'Assistant Professor'),
('1004', 'Vaishali', 'Assistant Professor'),
('1005', 'Sunantha', 'Lecturer'),
('1006', 'Uday', 'Lecturer'),
('1007', 'Jhanavi', 'Head Of Department'),
('1008', 'Sushree', 'Assistant Professor'),
('1009', 'Prasad', 'Lecturer'),
('1010', 'Aruna', 'Assistant Lectuter');

-- --------------------------------------------------------

--
-- Table structure for table `thirdyear`
--

DROP TABLE IF EXISTS `thirdyear`;
CREATE TABLE IF NOT EXISTS `thirdyear` (
  `Roll_No` int DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thirdyear`
--

INSERT INTO `thirdyear` (`Roll_No`, `first_name`, `last_name`) VALUES
(1, 'Michelle', 'James'),
(2, 'Kimberly', 'Richardson'),
(3, 'Raymond', 'Coleman'),
(4, 'Arthur', 'Lynch'),
(5, 'Juan', 'Hicks'),
(6, 'Jennifer', 'Bishop'),
(7, 'Kelly', 'Burton'),
(8, 'Richard', 'Davis'),
(9, 'Frank', 'Weaver'),
(10, 'Martha', 'Schmidt'),
(11, 'Henry', 'Arnold'),
(12, 'Jacqueline', 'Morales'),
(13, 'Alice', 'Kim'),
(14, 'Cynthia', 'Kennedy'),
(15, 'Ryan', 'Miller'),
(16, 'Alan', 'Smith'),
(17, 'Jeremy', 'Jenkins'),
(18, 'Adam', 'Stephens'),
(19, 'Phyllis', 'Castillo'),
(20, 'Jeffrey', 'Williams'),
(21, 'Jimmy', 'Alvarez'),
(22, 'Christopher', 'Shaw'),
(23, 'Ann', 'Hanson'),
(24, 'Anna', 'Burns'),
(25, 'George', 'Gutierrez'),
(26, 'Bonnie', 'Nichols'),
(27, 'Annie', 'Castillo'),
(28, 'Chris', 'Austin'),
(29, 'Anna', 'Moore'),
(30, 'James', 'Cruz'),
(31, 'Fred', 'Smith'),
(32, 'Linda', 'Rice'),
(33, 'Thomas', 'Barnes'),
(34, 'Albert', 'Nichols'),
(35, 'Gregory', 'Rogers'),
(36, 'Lisa', 'Hughes'),
(37, 'Christine', 'Simmons'),
(38, 'Scott', 'Barnes'),
(39, 'James', 'Lynch'),
(40, 'Cheryl', 'Webb'),
(41, 'Annie', 'Alexander'),
(42, 'Matthew', 'Sanders'),
(43, 'Scott', 'Moreno'),
(44, 'Paula', 'Rose'),
(45, 'Betty', 'Lawson'),
(46, 'Walter', 'Sanders'),
(47, 'Jack', 'Porter'),
(48, 'Jean', 'Hernandez'),
(49, 'Anne', 'Sims'),
(50, 'Louis', 'Hart'),
(51, 'Joseph', 'Hernandez'),
(52, 'Larry', 'Murphy'),
(53, 'Stephen', 'Gonzales'),
(54, 'Tammy', 'Rogers'),
(55, 'Lori', 'Dunn'),
(56, 'Andrea', 'Willis'),
(57, 'Cheryl', 'Harrison'),
(58, 'Stephen', 'Miller'),
(59, 'Sharon', 'Ferguson'),
(60, 'Joseph', 'Roberts'),
(61, 'Ruby', 'Jones'),
(62, 'Brandon', 'Payne'),
(63, 'Joshua', 'Sims'),
(64, 'Lois', 'Cunningham'),
(65, 'Margaret', 'Lane'),
(66, 'Eugene', 'Frazier'),
(67, 'Marilyn', 'Torres'),
(68, 'John', 'Kennedy'),
(69, 'Diana', 'Turner'),
(70, 'Joyce', 'Hanson'),
(71, 'Jose', 'Anderson'),
(72, 'Lillian', 'Reyes'),
(73, 'Carolyn', 'Jacobs'),
(74, 'Ryan', 'Medina'),
(75, 'Marie', 'Murray'),
(76, 'Matthew', 'Hughes'),
(77, 'Anthony', 'Edwards'),
(78, 'Aaron', 'Bishop'),
(79, 'Linda', 'Mendoza'),
(80, 'Craig', 'Alvarez');

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

DROP TABLE IF EXISTS `timetable`;
CREATE TABLE IF NOT EXISTS `timetable` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Exam` varchar(20) NOT NULL,
  `Semester` varchar(5) NOT NULL,
  `Time1` varchar(10) DEFAULT NULL,
  `Time2` varchar(10) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=90 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `timings`
--

DROP TABLE IF EXISTS `timings`;
CREATE TABLE IF NOT EXISTS `timings` (
  `Year` varchar(10) NOT NULL,
  `StartTime` time(2) NOT NULL,
  `StartTime2` time(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timings`
--

INSERT INTO `timings` (`Year`, `StartTime`, `StartTime2`) VALUES
('FE', '09:00:00.00', '11:00:00.0'),
('SE', '14:00:00.00', '16:00:00.0'),
('TE', '14:00:00.00', '16:00:00.0'),
('BE', '09:00:00.00', '11:00:00.0');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
