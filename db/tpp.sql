-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2021 at 10:29 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tpp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admint`
--

CREATE TABLE `admint` (
  `Aid` int(11) NOT NULL,
  `Username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Fullname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `APassword` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Atitle` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Office` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Contact` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admint`
--

INSERT INTO `admint` (`Aid`, `Username`, `Fullname`, `APassword`, `Atitle`, `Office`, `Contact`, `Email`) VALUES
(1, 'admin1', 'Test admin', '81dc9bdb52d04dc20036dbd8313ed055', 'Dr', 'B 201', '0767123456', 'admin@mail.com');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `Cid` int(11) NOT NULL,
  `Tid` int(11) NOT NULL,
  `Pid` int(11) NOT NULL,
  `Tcomment` text COLLATE utf8_unicode_ci NOT NULL,
  `Comby` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Cdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`Cid`, `Tid`, `Pid`, `Tcomment`, `Comby`, `Cdate`) VALUES
(9, 19, 45, 'Well done!', 'Supervisor', '2021-07-06'),
(10, 19, 45, 'waow', 'Test User2', '2021-07-06');

-- --------------------------------------------------------

--
-- Table structure for table `invite`
--

CREATE TABLE `invite` (
  `ID` int(11) NOT NULL,
  `Sender` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Receiver` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Pname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Pid` int(11) DEFAULT NULL,
  `Idesc` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `Irole` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SDate` date DEFAULT NULL,
  `Istatus` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `invite`
--

INSERT INTO `invite` (`ID`, `Sender`, `Receiver`, `Pname`, `Pid`, `Idesc`, `Irole`, `SDate`, `Istatus`) VALUES
(6, '2018-04-00001', '2018-04-00002', 'TPP ', NULL, 'Please join in my project', 'Designer', '2021-07-02', 'Accepted'),
(7, '2018-04-00001', '2018-04-00004', 'TPP ', NULL, 'Please join in my project of Team project management portal', 'Analyst', '2021-07-04', 'Pending'),
(8, '2018-04-00001', '2018-04-00005', 'VMS', NULL, 'Visitors Management System to manage Visitors in Organizations', 'Leader', '2021-07-04', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `pnotification`
--

CREATE TABLE `pnotification` (
  `Nid` int(11) NOT NULL,
  `Sender` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Receiver` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Nevent` text COLLATE utf8_unicode_ci NOT NULL,
  `nstatus` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ndate` date NOT NULL,
  `Pname` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pnotification`
--

INSERT INTO `pnotification` (`Nid`, `Sender`, `Receiver`, `Nevent`, `nstatus`, `ndate`, `Pname`) VALUES
(21, '2018-04-00001', '2018-04-00002', 'You have been assigned a task: Create a prototype', 'read', '2021-07-03', ''),
(22, '2018-04-00001', '2018-04-00002', 'You have been assigned a task: please introduce yourself', 'read', '2021-07-03', ''),
(23, '2018-04-00001', '2018-04-00002', 'You have been assigned a task: create Prototypes for the system', 'read', '2021-07-03', '');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `Pid` int(11) NOT NULL,
  `Pname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `PCategory` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `CreateD` date NOT NULL,
  `SDate` date NOT NULL,
  `EDate` date NOT NULL,
  `Duration` int(11) NOT NULL,
  `Pstatus` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Budget` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `PDesc` text COLLATE utf8_unicode_ci NOT NULL,
  `Client` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `PLeader` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `CreatedBy` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Allocated` int(11) NOT NULL,
  `Pprogress` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`Pid`, `Pname`, `PCategory`, `CreateD`, `SDate`, `EDate`, `Duration`, `Pstatus`, `Budget`, `PDesc`, `Client`, `PLeader`, `CreatedBy`, `Allocated`, `Pprogress`) VALUES
(45, 'TPP', 'Web', '2021-07-02', '2021-07-20', '2021-08-20', 31, 'Approved', '100000', 'Team project management portal web base system', 'UDSM', '2018-04-00001', '2018-04-00001', 45, 20),
(46, 'VMS', 'Web', '2021-07-04', '2021-07-10', '2021-09-25', 120, 'Denied', '100000', 'Visitors Management System to manage Visitors in Organizations', 'UDSM', '2018-04-00005', '2018-04-00001', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `Id` int(11) NOT NULL,
  `StudentId` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Skill` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SLevel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`Id`, `StudentId`, `Skill`, `SLevel`) VALUES
(4, '2018-04-00001', 'PHP', 50),
(6, '2018-04-00001', 'html', 95);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `StudentID` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Firstname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Lastname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Course` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `YoS` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Mobile` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Gender` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Expert` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Bio` text COLLATE utf8_unicode_ci NOT NULL,
  `Passwd` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Country` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `SLanguage` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Hobby` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`StudentID`, `Firstname`, `Lastname`, `Course`, `YoS`, `Mobile`, `Gender`, `Expert`, `Bio`, `Passwd`, `Email`, `Country`, `SLanguage`, `Hobby`) VALUES
('2018-04-00001', 'TEST', 'USER1', 'Bsc with Computer Science', 'Third Year', '0712121212', 'Male', 'Designing', 'new designer in making', '81dc9bdb52d04dc20036dbd8313ed055', 'testmail@mail.com', 'Tanzanian', 'Swahili', 'Football'),
('2018-04-00002', 'Test', 'User2', 'Bsc in Computer Science', 'Third Year', '0712121212', 'Female', 'Development', '', '81dc9bdb52d04dc20036dbd8313ed055', 'user2ttest@mail.com', '', '', ''),
('2018-04-00004', 'example ', 'Users', 'Bsc with Computer science', 'Third Year', '0767111222', 'Male', 'Analysis', '', '81dc9bdb52d04dc20036dbd8313ed055', 'exampleuser@mail.com', '', '', ''),
('2018-04-00005', 'John', 'Michael', 'Bsc in Computer Science', 'Third Year', '0767111222', 'Male', 'Development', '', '81dc9bdb52d04dc20036dbd8313ed055', 'johnmic@mail.com', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `taskreport`
--

CREATE TABLE `taskreport` (
  `Rid` int(11) NOT NULL,
  `tid` int(11) DEFAULT NULL,
  `Uploader` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Udate` date DEFAULT NULL,
  `Report` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Rstatus` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `taskreport`
--

INSERT INTO `taskreport` (`Rid`, `tid`, `Uploader`, `Udate`, `Report`, `Rstatus`) VALUES
(1, 18, '2018-04-00002', '2021-07-03', '2 Logistic.pdf', 'Approved'),
(2, 19, '2018-04-00001', '2021-07-04', '2 Logistic.pdf', 'Wait For Approval');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `tid` int(11) NOT NULL,
  `Tname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Pid` int(11) DEFAULT NULL,
  `Sdate` date DEFAULT NULL,
  `Edate` date DEFAULT NULL,
  `NOA` int(11) DEFAULT NULL,
  `Assignees` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TDesc` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `Attach` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TStatus` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Marks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`tid`, `Tname`, `Pid`, `Sdate`, `Edate`, `NOA`, `Assignees`, `TDesc`, `Attach`, `TStatus`, `Marks`) VALUES
(18, 'Design', 45, '2021-07-04', '2021-07-09', 6, '2018-04-00002', 'Create a prototype', '2 Logistic.pdf', 'Approved', 10),
(19, 'introduction', 45, '2021-07-10', '2021-07-17', 5, '2018-04-00002', 'please introduce yourself', '2 Logistic.pdf', 'Wait For Approval', 20),
(20, 'Design', 45, '2021-07-04', '2021-07-10', 5, '2018-04-00002', 'create Prototypes for the system', '1. Geohazards-Earthquake.pdf', 'Pending', 45);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `Tid` int(11) NOT NULL,
  `Pname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Member` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MemberType` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Tstatus` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`Tid`, `Pname`, `Member`, `MemberType`, `Tstatus`) VALUES
(1, 'TPP', '2018-04-00001', 'Leader', 'Active'),
(5, 'TPP ', '2018-04-00002', 'Member', 'Active'),
(6, 'TPP ', '2018-04-00004', 'Member', 'InActive'),
(7, 'VMS', '2018-04-00001', 'Member', 'Active'),
(8, 'VMS', '2018-04-00005', 'Leader', 'InActive');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admint`
--
ALTER TABLE `admint`
  ADD PRIMARY KEY (`Aid`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`Cid`),
  ADD KEY `Tid` (`Tid`),
  ADD KEY `Pid` (`Pid`);

--
-- Indexes for table `invite`
--
ALTER TABLE `invite`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Pid` (`Pid`);

--
-- Indexes for table `pnotification`
--
ALTER TABLE `pnotification`
  ADD PRIMARY KEY (`Nid`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`Pid`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `StudentId` (`StudentId`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`StudentID`);

--
-- Indexes for table `taskreport`
--
ALTER TABLE `taskreport`
  ADD PRIMARY KEY (`Rid`),
  ADD KEY `tid` (`tid`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`tid`),
  ADD KEY `Pid` (`Pid`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`Tid`),
  ADD KEY `Member` (`Member`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admint`
--
ALTER TABLE `admint`
  MODIFY `Aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `Cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `invite`
--
ALTER TABLE `invite`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pnotification`
--
ALTER TABLE `pnotification`
  MODIFY `Nid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `Pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `taskreport`
--
ALTER TABLE `taskreport`
  MODIFY `Rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `Tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`Pid`) REFERENCES `project` (`Pid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`Tid`) REFERENCES `tasks` (`tid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invite`
--
ALTER TABLE `invite`
  ADD CONSTRAINT `invite_ibfk_1` FOREIGN KEY (`Pid`) REFERENCES `project` (`Pid`) ON DELETE CASCADE;

--
-- Constraints for table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `skills_ibfk_1` FOREIGN KEY (`StudentId`) REFERENCES `students` (`StudentID`) ON DELETE CASCADE;

--
-- Constraints for table `taskreport`
--
ALTER TABLE `taskreport`
  ADD CONSTRAINT `taskreport_ibfk_1` FOREIGN KEY (`tid`) REFERENCES `tasks` (`tid`) ON DELETE CASCADE;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`Pid`) REFERENCES `project` (`Pid`) ON DELETE CASCADE;

--
-- Constraints for table `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `team_ibfk_1` FOREIGN KEY (`Member`) REFERENCES `students` (`StudentID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
