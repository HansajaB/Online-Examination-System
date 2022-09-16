-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2022 at 08:08 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineexaminationsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_msgs`
--

CREATE TABLE `contact_msgs` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL DEFAULT 0,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_msgs`
--

INSERT INTO `contact_msgs` (`id`, `userid`, `fname`, `lname`, `msg`) VALUES
(4, 1, 'Adithya', 'Bandara', 'ffdfd'),
(5, 1, 'Adithya', 'Bandara', 'ffdfd');

-- --------------------------------------------------------

--
-- Table structure for table `employeedetails`
--

CREATE TABLE `employeedetails` (
  `EmpID` int(20) NOT NULL,
  `Namewithintials` varchar(100) NOT NULL,
  `Fullname` varchar(100) NOT NULL,
  `DOB` date NOT NULL,
  `Gender` varchar(20) NOT NULL,
  `EmpAddress` varchar(100) NOT NULL,
  `EmpNIC` int(50) NOT NULL,
  `Email` text NOT NULL,
  `MobileNumber` int(10) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `profilepic` text NOT NULL DEFAULT '0',
  `usertype` varchar(100) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employeedetails`
--

INSERT INTO `employeedetails` (`EmpID`, `Namewithintials`, `Fullname`, `DOB`, `Gender`, `EmpAddress`, `EmpNIC`, `Email`, `MobileNumber`, `Username`, `Password`, `profilepic`, `usertype`) VALUES
(1, 'H.M.H.B Kandepola', 'Hansaja Bandara', '2001-08-20', 'male', '172/67,kamalpitiya waththa,meepe,padukka', 2001254587, 'hansaja4@gmail.com', 712288137, 'Hansaja', '65d6c8cdc02cac7904c750639f797b6c', 'userprofilepics/628a2cdb93be66.04873302.png', 'user'),
(2, 'Admin', 'Admin', '2022-05-02', 'male', 'asdvas davsasdv asd a', 200151515, 'admin@gmail.com', 703135183, 'Admin', 'e64b78fc3bc91bcbc7dc232ba8ec59e0', 'userprofilepics/628a2cdb93be66.04873302.png', 'main');

-- --------------------------------------------------------

--
-- Table structure for table `examdetails`
--

CREATE TABLE `examdetails` (
  `ExamID` int(11) NOT NULL,
  `empid` int(11) NOT NULL,
  `Examname` text NOT NULL,
  `Examdetails` text NOT NULL,
  `Startingdate` date NOT NULL,
  `Deadline` date NOT NULL,
  `startdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `examdetails`
--

INSERT INTO `examdetails` (`ExamID`, `empid`, `Examname`, `Examdetails`, `Startingdate`, `Deadline`, `startdate`) VALUES
(3, 2, 'Business Analyst Exam', 'Business analysts typicaly use IT resouces to help...', '2022-05-18', '2022-05-31', '2022-06-01'),
(4, 2, 'Banking Management Exam', 'The exam evaluates students Knowledge and understanding...', '2022-05-17', '2022-05-31', '2022-06-01'),
(5, 2, 'Project Management Exam', 'PMC exam is ideal for professionals with less experience in managing company fields..', '2022-05-31', '2022-06-10', '2022-06-20'),
(6, 2, 'Skilled Trade Exam', 'Proffesionals who skilled in trades usually earn more...', '2022-05-31', '2022-06-10', '2022-06-20'),
(7, 2, 'IELTS', 'IELTS', '2022-05-22', '2022-05-29', '2022-06-05');

-- --------------------------------------------------------

--
-- Table structure for table `examregistration`
--

CREATE TABLE `examregistration` (
  `regid` int(11) NOT NULL,
  `EmpID` int(11) NOT NULL,
  `ExamID` varchar(50) NOT NULL,
  `RegisteredDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `examregistration`
--

INSERT INTO `examregistration` (`regid`, `EmpID`, `ExamID`, `RegisteredDate`) VALUES
(8, 1, '4', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `examtype`
--

CREATE TABLE `examtype` (
  `id` int(11) NOT NULL,
  `examname` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `examtype`
--

INSERT INTO `examtype` (`id`, `examname`) VALUES
(1, 'Project Management'),
(2, 'Banking Management'),
(3, 'Business Analyst'),
(4, 'Skilled Trade'),
(5, 'Human Resource Certification');

-- --------------------------------------------------------

--
-- Table structure for table `registercancel`
--

CREATE TABLE `registercancel` (
  `id` int(11) NOT NULL,
  `examid` int(11) NOT NULL,
  `empid` int(11) NOT NULL,
  `reason` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registercancel`
--

INSERT INTO `registercancel` (`id`, `examid`, `empid`, `reason`) VALUES
(2, 1, 1, 'ava asdvasd ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_msgs`
--
ALTER TABLE `contact_msgs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employeedetails`
--
ALTER TABLE `employeedetails`
  ADD PRIMARY KEY (`EmpID`);

--
-- Indexes for table `examdetails`
--
ALTER TABLE `examdetails`
  ADD PRIMARY KEY (`ExamID`);

--
-- Indexes for table `examregistration`
--
ALTER TABLE `examregistration`
  ADD PRIMARY KEY (`regid`);

--
-- Indexes for table `examtype`
--
ALTER TABLE `examtype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registercancel`
--
ALTER TABLE `registercancel`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_msgs`
--
ALTER TABLE `contact_msgs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employeedetails`
--
ALTER TABLE `employeedetails`
  MODIFY `EmpID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `examdetails`
--
ALTER TABLE `examdetails`
  MODIFY `ExamID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `examregistration`
--
ALTER TABLE `examregistration`
  MODIFY `regid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `examtype`
--
ALTER TABLE `examtype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `registercancel`
--
ALTER TABLE `registercancel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
