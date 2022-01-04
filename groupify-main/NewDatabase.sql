-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Mar 24, 2021 at 04:11 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `CourseID` int(11) NOT NULL,
  `CourseName` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`CourseID`, `CourseName`) VALUES
(1, '999'),
(999, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `GroupID` varchar(20) NOT NULL DEFAULT '0',
  `StudentID` int(11) NOT NULL,
  `CourseID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`GroupID`, `StudentID`, `CourseID`) VALUES
('Group 7', 7, 999),
('Group 3', 8, 999),
('Group 0', 9, 999),
('Group 5', 10, 999),
('Group 1', 11, 999),
('Group 2', 13, 999),
('Group 3', 14, 999),
('Group 6', 15, 999),
('Group 4', 16, 999),
('Group 2', 17, 999),
('Group 4', 18, 999),
('Group 4', 19, 999),
('Group 2', 20, 999),
('Group 6', 21, 999),
('Group 3', 22, 999),
('Group 0', 23, 999),
('Group 5', 24, 999),
('Group 5', 25, 999),
('Group 1', 26, 999),
('Group 0', 27, 999),
('Group 6', 28, 999),
('Group 5', 29, 999),
('Group 1', 30, 999),
('Group 7', 31, 999),
('Group 7', 32, 999);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `UID` int(11) NOT NULL,
  `StudentName` varchar(80) DEFAULT NULL,
  `relevant_grades` float NOT NULL DEFAULT '0',
  `irrelevant_grades` float NOT NULL DEFAULT '0',
  `motivation` int(2) NOT NULL,
  `GroupID` varchar(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`UID`, `StudentName`, `relevant_grades`, `irrelevant_grades`, `motivation`, `GroupID`) VALUES
(7, 'Roman Tsypin', 1.12, 2.12, 2, '0'),
(8, 'Eric Telkkälä', 3.557, 2.655, 4, '0'),
(9, 'Topi Aila', 4.818, 3.503, 4, '0'),
(10, 'Samantha Bergdahl', 3.686, 2.221, 2, '0'),
(11, 'Cezar Budeci', 4.498, 2.99, 3, '0'),
(13, 'Tuuli Tapaninen', 4.318, 2.026, 5, '0'),
(14, 'Kaisa Otterklau', 2.801, 4.675, 5, '0'),
(15, 'Humble Harambe', 2.446, 4.44, 1, '0'),
(16, 'Moms Spaghetti', 2.981, 4.581, 3, '0'),
(17, 'Sanna Marin', 4.149, 2.944, 2, '0'),
(18, 'Wide Putin', 3.21, 4.764, 1, '0'),
(19, 'Peter Vesterbacka', 2.71, 4.904, 4, '0'),
(20, 'Timo Rally', 4.069, 4.697, 1, '0'),
(21, 'Emotional Table', 2.655, 3.627, 4, '0'),
(22, 'Bill Gates', 2.793, 4.79, 5, '0'),
(23, 'Elon Musk', 4.951, 3.654, 2, '0'),
(24, 'Mark Zuckerberg', 2.674, 4.402, 4, '0'),
(25, 'Ayn Rand', 2.635, 4.979, 3, '0'),
(26, 'Karl Marx', 4.2, 4.559, 4, '0'),
(27, 'David Ben-Gurion', 4.964, 3.39, 3, '0'),
(28, 'Ekaterina Shulman', 2.033, 2.724, 5, '0'),
(29, 'Tukhtaboy Juma', 3.332, 3.193, 2, '0'),
(30, 'Igor Smirnov', 4.254, 4.613, 1, '0'),
(31, 'Test2', 1.12, 4.54, 2, '0'),
(32, 'Test2', 1.12, 4.54, 2, '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`CourseID`),
  ADD UNIQUE KEY `CourseID_UNIQUE` (`CourseID`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD UNIQUE KEY `StudentID_UNIQUE` (`StudentID`),
  ADD KEY `Course ID_idx` (`CourseID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD UNIQUE KEY `UID_UNIQUE` (`UID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `CourseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `UID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `Course ID` FOREIGN KEY (`CourseID`) REFERENCES `courses` (`CourseID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Student ID` FOREIGN KEY (`StudentID`) REFERENCES `students` (`UID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
