-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2021 at 04:42 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admissions`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_code` varchar(15) NOT NULL,
  `Description` varchar(50) DEFAULT NULL,
  `Faculty` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_code`, `Description`, `Faculty`) VALUES
('BA', 'Business Administration science', ' BUSINESS AND MANAGEMENT '),
('CS', 'Computer Science', 'Computing and Informatics'),
('CT', 'Information Technology', 'Computing and Informatics'),
('FD', 'Food and security', 'Biological and Physical Sciences'),
('MD', 'Medicine and Surgery', 'Medicine'),
('MDN', 'Nursing', 'Medicine'),
('PH', 'Pharmacy', 'Medicine');

-- --------------------------------------------------------

--
-- Table structure for table `health_records`
--

CREATE TABLE `health_records` (
  `User_ID` varchar(20) NOT NULL,
  `Inpatient_record` varchar(200) DEFAULT NULL,
  `Suffered_symptoms` varchar(200) DEFAULT NULL,
  `Details` varchar(200) DEFAULT NULL,
  `Medical_history` varchar(200) DEFAULT NULL,
  `Immunization` varchar(200) DEFAULT NULL,
  `Examination` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `personal_details`
--

CREATE TABLE `personal_details` (
  `User_ID` varchar(20) NOT NULL,
  `Surname` varchar(20) NOT NULL,
  `Firstname` varchar(20) DEFAULT NULL,
  `Lastname` varchar(20) DEFAULT NULL,
  `Gender` varchar(8) DEFAULT NULL,
  `sPword` varchar(100) DEFAULT '',
  `course_code` varchar(15) DEFAULT NULL,
  `Admission_year` year(4) DEFAULT NULL,
  `sRole` varchar(10) DEFAULT 'student',
  `DOB` date DEFAULT NULL,
  `IdNo` int(12) DEFAULT NULL,
  `ID_Attachment` varchar(50) DEFAULT NULL,
  `Photo` varchar(100) DEFAULT NULL,
  `Telephone` int(12) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `County` varchar(20) DEFAULT NULL,
  `Nationality` varchar(20) DEFAULT NULL,
  `Religion` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personal_details`
--

INSERT INTO `personal_details` (`User_ID`, `Surname`, `Firstname`, `Lastname`, `Gender`, `sPword`, `course_code`, `Admission_year`, `sRole`, `DOB`, `IdNo`, `ID_Attachment`, `Photo`, `Telephone`, `Email`, `County`, `Nationality`, `Religion`) VALUES
('BA/00001/2021', 'awaefrst', 'GWWEN', 'ghjhgfdsdfkj', 'Female', '48da9762632718ac187c07453848a3e7', 'BA', 2021, 'student', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('BA/00002/2021', 'Peranara', 'Tina', 'U', 'Female', '38bb69862c9b9220ec8443acc98f979c', 'BA', 2021, 'student', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('CT/00001/2021', 'Jonzo', 'BarretteJJ', 'OWEN', 'Female', 'beb06dc19cb192a9ec3286a73bb58476', 'CT', 2021, 'student', '2021-10-04', 33444, 'Screenshot (6).png', '', 72467854, 'weshraphael@gmail.com', 'Kericho', 'australian', 'Christianty'),
('PH/00001/2021', 'Juliana', 'Tina', 'Unna', 'Female', '2b29c55d7e7b5303a6b2f21e14561d75', 'PH', 2021, 'student', '2021-10-11', 3344455, 'images/', 'all_images/', 72467854, 'weshraphael@gmail.com', 'Nairobi City', 'kenyan', 'Christianty'),
('PH/00002/2021', 'Mweema', 'James', 'Jazkk', 'Male', '3dfa190d77b91c009abbddad29368712', 'PH', 2021, 'student', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('PH/00003/2021', 'Mweema', 'James', 'Mwama', 'Female', 'be837cc75364162b8c4a0d009636a6be', 'PH', 2021, 'student', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `referees`
--

CREATE TABLE `referees` (
  `User_ID` varchar(20) NOT NULL,
  `Firstname` varchar(20) DEFAULT NULL,
  `Lastname` varchar(20) DEFAULT NULL,
  `Relationship` varchar(20) DEFAULT NULL,
  `Telephone` int(12) DEFAULT NULL,
  `Address` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_ID` varchar(13) NOT NULL,
  `Role` varchar(15) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_ID`, `Role`, `password`) VALUES
('CF001', 'admin', '1f8d54e19d9103ce762b5f3edd879daf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_code`);

--
-- Indexes for table `health_records`
--
ALTER TABLE `health_records`
  ADD PRIMARY KEY (`User_ID`);

--
-- Indexes for table `personal_details`
--
ALTER TABLE `personal_details`
  ADD PRIMARY KEY (`User_ID`),
  ADD KEY `course_code` (`course_code`);

--
-- Indexes for table `referees`
--
ALTER TABLE `referees`
  ADD PRIMARY KEY (`User_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `health_records`
--
ALTER TABLE `health_records`
  ADD CONSTRAINT `health_records_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `personal_details` (`User_ID`);

--
-- Constraints for table `personal_details`
--
ALTER TABLE `personal_details`
  ADD CONSTRAINT `personal_details_ibfk_1` FOREIGN KEY (`course_code`) REFERENCES `courses` (`course_code`);

--
-- Constraints for table `referees`
--
ALTER TABLE `referees`
  ADD CONSTRAINT `referees_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `personal_details` (`User_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
