-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2020 at 12:32 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `avocadomc_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `TRN` int(200) NOT NULL,
  `appNum` int(11) NOT NULL,
  `StaffID` int(11) NOT NULL,
  `Date` varchar(12) NOT NULL,
  `Time` varchar(200) NOT NULL,
  `ReasonForVisit` varchar(100) NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`TRN`, `appNum`, `StaffID`, `Date`, `Time`, `ReasonForVisit`, `Status`) VALUES
(666666666, 1, 3, '2020-12-30', '6:00 PM', '', 'Active'),
(888888888, 2, 6, '2020-12-21', '6:15 PM', '', 'Active'),
(888888888, 3, 6, '2020-12-21', '6:15 PM', '', 'Cancelled'),
(888888888, 4, 6, '2020-12-21', '6:15 PM', '', 'Cancelled'),
(888888888, 5, 6, '2020-12-21', '6:15 PM', '', 'Pending'),
(777777777, 6, 3, '2020-12-24', '6:15 PM', '', 'Pending'),
(777777777, 7, 3, '2020-12-24', '6:15 PM', '', 'Pending'),
(999999993, 8, 3, '2020-12-29', '6:30 PM', '', 'Pending'),
(999999993, 9, 3, '2020-12-29', '6:30 PM', '', 'Pending'),
(999999993, 10, 3, '2020-12-29', '6:30 PM', '', 'Pending'),
(999999993, 11, 3, '2020-12-29', '6:30 PM', '', 'Pending'),
(999999993, 15, 3, '2020-12-29', '6:30 PM', '', 'Pending'),
(999999993, 18, 3, '2020-12-22', '6:30 PM', '', 'Pending'),
(999999993, 19, 3, '2020-12-29', '6:30 PM', '', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactno` bigint(12) DEFAULT NULL,
  `message` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `AdminRemark` mediumtext DEFAULT NULL,
  `LastupdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `IsRead` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `fullname`, `email`, `contactno`, `message`, `PostingDate`, `AdminRemark`, `LastupdationDate`, `IsRead`) VALUES
(4, 'Rohan Bedward', 'rohanbedward@gmail.com', 8763286920, ' ddccdc', '2020-12-06 20:07:34', 'vvvv', '2020-12-06 22:47:44', 1);

-- --------------------------------------------------------

--
-- Table structure for table `medicalhistory`
--

CREATE TABLE `medicalhistory` (
  `ID` int(10) NOT NULL,
  `TRN` int(11) DEFAULT NULL,
  `BloodPressure` varchar(200) DEFAULT NULL,
  `BloodSugar` varchar(200) NOT NULL,
  `Weight` varchar(100) DEFAULT NULL,
  `Temperature` varchar(200) DEFAULT NULL,
  `MedicalPres` mediumtext DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicalhistory`
--

INSERT INTO `medicalhistory` (`ID`, `TRN`, `BloodPressure`, `BloodSugar`, `Weight`, `Temperature`, `MedicalPres`, `CreationDate`) VALUES
(8, 666666666, '77/120', '5', '155', '99', 'You glucose level is a little low so i recommend you stay away from stressing activities for a while', '2020-12-05 03:03:41');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `TRN` int(11) NOT NULL,
  `StaffID` int(11) DEFAULT NULL,
  `Title` varchar(25) NOT NULL,
  `FirstName` varchar(25) NOT NULL,
  `LastName` varchar(25) NOT NULL,
  `DOB` varchar(10) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `TelNo` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`TRN`, `StaffID`, `Title`, `FirstName`, `LastName`, `DOB`, `Address`, `TelNo`, `Email`, `CreationDate`, `UpdationDate`) VALUES
(123424444, 8, 'Dr.', 'fjfkfkfkf', 'fkkkkkfk', '2020-12-31', '19 Richard Ware Avenue\r\nKingston 7', 2147483647, 'rom@gmail.com', '2020-12-06 17:47:25', NULL),
(123456789, NULL, 'Mr.', 'Stephan', 'Brown', '01/15/1978', 'Red Hills Road', 1234567, 'stephanbrown@gmail.com', '2020-12-04 23:09:51', '0000-00-00 00:00:00'),
(123456790, NULL, 'Miss', 'Hope', 'Brown', '07/01/2000', 'Old Hope Road', 2345678, 'hbrown@hotmail.com', '2020-12-04 23:09:51', '0000-00-00 00:00:00'),
(123456791, NULL, 'Dr.', 'Kadeen', 'Howitt', '12/12/1997', '27 Caledonia Road', 3456789, 'kadeenhowitt@yahoo.com', '2020-12-04 23:09:51', '0000-00-00 00:00:00'),
(123456792, NULL, 'Mrs.', 'Joy', 'Harvey', '02/05/1980', 'Gordon Town Road', 4567890, 'jharvey@outlook.com', '2020-12-04 23:09:51', '0000-00-00 00:00:00'),
(123456793, NULL, 'Dr.', 'Caroline', 'Forbes', '06/01/1970', '37 Caledonia Road', 5678901, 'forbesc@gmail.com', '2020-12-04 23:09:51', '0000-00-00 00:00:00'),
(666666666, 6, 'Miss', 'Kaydean', 'Smith', '2020-12-02', 'Red Berry District,\r\nPorus P.O.', 5678901, 'cadeansmith@gmail.com', '2020-12-05 00:48:53', '2020-12-05 02:20:14'),
(777777777, 6, 'Miss', 'idkk', 'asdasd', '2020-12-02', 'Red Berry District,\r\nPorus P.O.', 5678901, 'kavonmorris42@gmail.com', '2020-12-05 01:15:48', '0000-00-00 00:00:00'),
(888888888, 3, 'Mr.', 'Shandy', 'Morris', '2020-09-14', 'Red Berry District,\r\nPorus P.O.', 5678901, 'shandy.morris@yahoo.com', '2020-12-05 01:13:31', '0000-00-00 00:00:00'),
(999999993, 8, 'Dr.', 'mark', 'nash', '2020-12-30', '12 shall drive\r\nking 8', 2147483647, 'nash@gmail.com', '2020-12-06 18:29:44', NULL),
(999999995, 9, 'Dr.', 'Rohan', 'Bedward', '2020-12-18', '19 Richard Ware Avenue\r\nKingston 7', 2147483647, 'shelly@gmail.com', '2020-12-06 20:10:04', NULL),
(999999998, 3, 'Dr.', 'Rohan', 'Bedward', '2020-12-11', '19 Richard Ware Avenue\r\nKingston 7', 2147483647, 'some@gmail.com', '2020-12-06 21:39:38', NULL),
(999999999, 8, 'Dr.', 'Rohan', 'Bedward', '2020-12-22', '19 Richard Ware Avenue\r\nKingston 7', 2147483647, 'rohanbedward@gmail.com', '2020-12-06 17:45:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `StaffID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`StaffID`, `Name`, `Email`, `Password`, `Type`) VALUES
(1, 'Kingz Will', 'kingzwill41@gmail.com', 'Qwerty*1', 'Admin'),
(3, 'John Doe', 'johndoe@gmail.com', 'Qwerty*1', 'Doctor'),
(6, 'Jane Doe', 'janedoe@gmail.com', 'Qwerty*1', 'Doctor'),
(9, 'Jody Matthews', 'jodymatt@gmail.com', 'Qwerty*1', 'Nurse'),
(10, 'Admin', 'admin@gmail.com', 'Qwerty*1', 'Admin'),
(11, 'Roxeen Thompson', 'rthompson@yahoo.com', 'Qwerty*1', 'Nurse'),
(12, 'rogo', 'rogo@gmail.com', 'Qwerty*1', 'Nurse');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appNum`),
  ADD KEY `appointment_ibfk_2` (`StaffID`),
  ADD KEY `TRN` (`TRN`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicalhistory`
--
ALTER TABLE `medicalhistory`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `patientTRN_fk` (`TRN`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`TRN`),
  ADD KEY `TRN` (`TRN`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`StaffID`),
  ADD KEY `StaffID` (`StaffID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appNum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `medicalhistory`
--
ALTER TABLE `medicalhistory`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `TRN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000000000;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `StaffID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `TRN` FOREIGN KEY (`TRN`) REFERENCES `patient` (`TRN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`StaffID`) REFERENCES `staff` (`StaffID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `medicalhistory`
--
ALTER TABLE `medicalhistory`
  ADD CONSTRAINT `patientTRN_fk` FOREIGN KEY (`TRN`) REFERENCES `patient` (`TRN`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
