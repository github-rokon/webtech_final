-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2023 at 07:47 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admincontrol`
--

-- --------------------------------------------------------

--
-- Table structure for table `classtime`
--

CREATE TABLE `classtime` (
  `CourseID` int(11) NOT NULL,
  `Course_Name` varchar(50) NOT NULL,
  `FacultyID` int(11) NOT NULL,
  `DateTime_1` date NOT NULL,
  `DateTime_2` date NOT NULL,
  `Student_1` int(11) NOT NULL,
  `Student_2` int(11) NOT NULL,
  `Student_3` int(11) NOT NULL,
  `Student_4` int(11) NOT NULL,
  `Student_5` int(11) NOT NULL,
  `Student_6` int(11) DEFAULT NULL,
  `Student_7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `User_ID` int(11) NOT NULL,
  `First_Name` varchar(100) NOT NULL,
  `Last_Name` varchar(100) NOT NULL,
  `Gender` enum('Male','Female','Others') NOT NULL,
  `DateOfBirth` date NOT NULL,
  `Blood_Group` enum('A+','A-','B+','B-','AB+','AB-','O+','O-') NOT NULL,
  `Religion` enum('Islam','Hindu','Christian','Buddha') NOT NULL,
  `NID` int(100) NOT NULL,
  `Father_name` varchar(100) NOT NULL,
  `Mother_name` varchar(100) NOT NULL,
  `SSC_gpa` float NOT NULL,
  `HSC_gpa` float NOT NULL,
  `BSc_cgpa` float NOT NULL,
  `Msc_cgpa` float NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password_` varchar(255) NOT NULL,
  `Faculty` enum('FACULTY OF SCIENCE & TECHNOLOGY','FACULTY OF BUSINESS ADMINISTRATION','FACULTY OF ENGINEERING','FACULTY OF ARTS & SOCIAL SCIENCES') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`User_ID`, `First_Name`, `Last_Name`, `Gender`, `DateOfBirth`, `Blood_Group`, `Religion`, `NID`, `Father_name`, `Mother_name`, `SSC_gpa`, `HSC_gpa`, `BSc_cgpa`, `Msc_cgpa`, `Email`, `Password_`, `Faculty`) VALUES
(5001, 'Ahsan', 'Habib', 'Male', '2004-11-24', 'B+', 'Islam', 1100000001, 'Abu', 'A begum', 5, 5, 4, 3.8, 'ah@vb.com', '432', 'FACULTY OF SCIENCE & TECHNOLOGY'),
(5002, 'Ahsan', 'karim', 'Male', '2004-11-24', 'B+', 'Islam', 1100000031, 'Abu', 'A begum', 5, 5, 4, 4, 'ak@vb.com', '432', 'FACULTY OF SCIENCE & TECHNOLOGY'),
(5004, 'Md Rased Hasan', 'Rokon', 'Male', '2023-11-03', 'A+', 'Islam', 666666667, 'gdfgd', 'gdhgdh', 4.3, 4.11, 3.33, 3.13, 'rashedrokon01@gmail.com', '3654', 'FACULTY OF SCIENCE & TECHNOLOGY');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `User_ID` int(10) NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `Gender` enum('Male','Female','Others') NOT NULL,
  `DateOfBirth` date NOT NULL,
  `Blood_Group` enum('A+','A-','B+','B-','AB+','AB-','O+','O-') NOT NULL,
  `Religion` enum('Islam','Hindu','Christian','Buddha','Others') NOT NULL,
  `NID` int(50) NOT NULL,
  `Father_name` varchar(50) NOT NULL,
  `Mother_name` varchar(50) NOT NULL,
  `SSC_gpa` float NOT NULL,
  `HSC_gpa` float NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password_` varchar(255) NOT NULL,
  `Dept` enum('CSE (FST)','EEE (FE)','BBA (FBA)','LLB (FASS)') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`User_ID`, `First_Name`, `Last_Name`, `Gender`, `DateOfBirth`, `Blood_Group`, `Religion`, `NID`, `Father_name`, `Mother_name`, `SSC_gpa`, `HSC_gpa`, `Email`, `Password_`, `Dept`) VALUES
(1001, 'Mahmudul ', 'Hasan', 'Male', '2007-04-05', 'AB+', 'Islam', 2000000001, 'Kabir', 'a', 5, 4.8, 'mahmud@op.com', '12345', 'CSE (FST)'),
(1002, 'Pritom', 'Biswas', 'Male', '2016-10-02', 'B-', 'Hindu', 1100000006, 'Polash', 'c', 4.88, 5, 'pritom@em.com', '12345', 'EEE (FE)'),
(1004, 'Rudy ', 'Robertson', 'Male', '2003-11-11', 'O+', 'Christian', 2000000222, 'Mr Robert', 'Ms Robert', 4.88, 4.9, 'rob@yh.net', '656564', 'EEE (FE)'),
(1005, 'Sonya ', 'Bryant', 'Female', '2003-11-18', 'AB+', 'Christian', 10099999, 'Mr Bryant', 'Ms Bryant', 5, 5, 'sb@ny.com', '741963', 'LLB (FASS)'),
(1006, 'Ted', 'Robertson', 'Male', '2003-11-11', 'O-', 'Christian', 2000000223, 'Mr Robert', 'Ms Robert', 4.88, 4.9, 'tedr@gmail.net', '369987', 'EEE (FE)');

-- --------------------------------------------------------

--
-- Table structure for table `stuff`
--

CREATE TABLE `stuff` (
  `User_ID` int(10) NOT NULL,
  `First_Name` varchar(100) NOT NULL,
  `Last_Name` varchar(100) NOT NULL,
  `Gender` enum('Male','Female','Others') NOT NULL,
  `DateOfBirth` date NOT NULL,
  `Blood_Group` enum('A+','A-','B+','B-','AB+','AB-','O+','O-') NOT NULL,
  `Religion` enum('Islam','Hindu','Christian','Buddha','Others') NOT NULL,
  `NID` int(30) NOT NULL,
  `Father_name` varchar(100) NOT NULL,
  `Mother_name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password_` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stuff`
--

INSERT INTO `stuff` (`User_ID`, `First_Name`, `Last_Name`, `Gender`, `DateOfBirth`, `Blood_Group`, `Religion`, `NID`, `Father_name`, `Mother_name`, `Email`, `Password_`) VALUES
(8001, 'Rashed', 'Khan', 'Male', '2007-04-05', 'B-', 'Islam', 1000000001, 'Abdul Khan', 'Mina Begum', 'rashed@er.com', '684973'),
(8002, 'Rofiq', 'Khan', 'Male', '2007-04-05', 'B-', 'Islam', 1000000002, 'Abdul Khan', 'Mina Begum', 'rashed@er.com', '666666\r\n'),
(8003, 'Roger ', 'Todd', 'Male', '2013-11-15', 'B-', 'Christian', 1100004444, 'Abril Mcknight', 'Annabelle Frye', 'rog@jj.com', '6663399'),
(8004, 'Kyle', 'Choi', 'Female', '2010-10-01', 'A+', 'Buddha', 99999666, 'mr choi', 'ms choi', 'kchoi@gm.c', '775577'),
(8005, 'Roger ', 'Todd', 'Male', '2013-11-15', 'B-', 'Christian', 1100004444, 'Abril Mcknight', 'Annabelle Frye', 'rog@jj.com', '6663399'),
(8006, 'Irene ', 'Choi', 'Female', '2013-11-10', 'A+', 'Buddha', 9999999, 'mr choi', 'ms choi', 'ichoi@gm.c', '775577');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classtime`
--
ALTER TABLE `classtime`
  ADD PRIMARY KEY (`CourseID`),
  ADD KEY `FacID` (`FacultyID`),
  ADD KEY `StuID_1` (`Student_1`),
  ADD KEY `StuID_2` (`Student_2`),
  ADD KEY `StudID_3` (`Student_3`),
  ADD KEY `StuID_4` (`Student_4`),
  ADD KEY `StuID_5` (`Student_5`),
  ADD KEY `StuID_6` (`Student_6`),
  ADD KEY `StuID_7` (`Student_7`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`User_ID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`User_ID`);

--
-- Indexes for table `stuff`
--
ALTER TABLE `stuff`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classtime`
--
ALTER TABLE `classtime`
  MODIFY `CourseID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5014;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `User_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1009;

--
-- AUTO_INCREMENT for table `stuff`
--
ALTER TABLE `stuff`
  MODIFY `User_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8007;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classtime`
--
ALTER TABLE `classtime`
  ADD CONSTRAINT `FacID` FOREIGN KEY (`FacultyID`) REFERENCES `faculty` (`User_ID`),
  ADD CONSTRAINT `StuID_1` FOREIGN KEY (`Student_1`) REFERENCES `student` (`User_ID`),
  ADD CONSTRAINT `StuID_2` FOREIGN KEY (`Student_2`) REFERENCES `student` (`User_ID`),
  ADD CONSTRAINT `StuID_4` FOREIGN KEY (`Student_4`) REFERENCES `student` (`User_ID`),
  ADD CONSTRAINT `StuID_5` FOREIGN KEY (`Student_5`) REFERENCES `student` (`User_ID`),
  ADD CONSTRAINT `StuID_6` FOREIGN KEY (`Student_6`) REFERENCES `student` (`User_ID`),
  ADD CONSTRAINT `StuID_7` FOREIGN KEY (`Student_7`) REFERENCES `student` (`User_ID`),
  ADD CONSTRAINT `StudID_3` FOREIGN KEY (`Student_3`) REFERENCES `student` (`User_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
