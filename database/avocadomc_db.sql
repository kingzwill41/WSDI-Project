-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 03, 2020 at 08:54 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

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

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `TRN` int(11) NOT NULL,
  `StaffID` int(11) NOT NULL,
  `Date` varchar(12) NOT NULL,
  `ReasonForVisit` varchar(100) NOT NULL,
  `Status` varchar(10) NOT NULL,
  PRIMARY KEY (`TRN`),
  KEY `appointment_ibfk_2` (`StaffID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `guest_appointment`
--

DROP TABLE IF EXISTS `guest_appointment`;
CREATE TABLE IF NOT EXISTS `guest_appointment` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Date` varchar(24) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guest_appointment`
--

INSERT INTO `guest_appointment` (`ID`, `FirstName`, `LastName`, `Date`) VALUES
(1, 'John', 'Doe', '2020-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `TRN` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(25) NOT NULL,
  `FirstName` varchar(25) NOT NULL,
  `LastName` varchar(25) NOT NULL,
  `DOB` varchar(10) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `TelNo` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  PRIMARY KEY (`TRN`),
  KEY `TRN` (`TRN`)
) ENGINE=InnoDB AUTO_INCREMENT=123456794 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`TRN`, `Title`, `FirstName`, `LastName`, `DOB`, `Address`, `TelNo`, `Email`) VALUES
(123456789, 'Mr.', 'Stephan', 'Brown', '01/15/1978', 'Red Hills Road', 1234567, 'stephanbrown@gmail.com'),
(123456790, 'Miss', 'Hope', 'Brown', '07/01/2000', 'Old Hope Road', 2345678, 'hbrown@hotmail.com'),
(123456791, 'Dr.', 'Kadeen', 'Howitt', '12/12/1997', '27 Caledonia Road', 3456789, 'kadeenhowitt@yahoo.com'),
(123456792, 'Mrs.', 'Joy', 'Harvey', '02/05/1980', 'Gordon Town Road', 4567890, 'jharvey@outlook.com'),
(123456793, 'Dr.', 'Caroline', 'Forbes', '06/01/1970', '37 Caledonia Road', 5678901, 'forbesc@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `StaffID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Type` varchar(15) NOT NULL,
  PRIMARY KEY (`StaffID`),
  KEY `StaffID` (`StaffID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`StaffID`, `Name`, `Email`, `Password`, `Type`) VALUES
(1, 'Kingz Will', 'kingzwill41@gmail.com', 'Qwerty*1', 'Admin'),
(3, 'John Doe', 'johndoe@gmail.com', 'Qwerty*1', 'Doctor'),
(6, 'Jane Doe', 'janedoe@gmail.com', 'Qwerty*1', 'Doctor'),
(8, 'James Matthews', 'jamesmatt@gmail.com', 'Qwerty*1', 'Nurse'),
(9, 'Jody Matthews', 'jodymatt@gmail.com', 'Qwerty*1', 'Nurse'),
(10, 'Admin', 'admin@gmail.com', 'Qwerty*1', 'Admin'),
(11, 'Roxeen Thompson', 'rthompson@yahoo.com', 'Qwerty*1', 'Nurse');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`TRN`) REFERENCES `patient` (`TRN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`StaffID`) REFERENCES `staff` (`StaffID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;