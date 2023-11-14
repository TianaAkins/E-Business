-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 14, 2023 at 04:59 AM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `PawSalon`
--

-- --------------------------------------------------------

--
-- Table structure for table `Appointment`
--

CREATE TABLE `Appointment` (
  `AppointmentID` int(11) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `PetID` int(11) NOT NULL,
  `EmployeeID` int(11) NOT NULL,
  `ApptDate` date NOT NULL,
  `ApptTime` time NOT NULL,
  `ApptStatus` varchar(20) NOT NULL,
  `PaymentStatus` bit(1) NOT NULL,
  `TotalCost` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `AppointmentService`
--

CREATE TABLE `AppointmentService` (
  `AppointmentID` int(11) NOT NULL,
  `ServiceID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

CREATE TABLE `Customer` (
  `CustomerID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Phone` varchar(12) NOT NULL,
  `Active` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Employee`
--

CREATE TABLE `Employee` (
  `EmployeeID` int(11) NOT NULL,
  `EmpType` varchar(50) NOT NULL,
  `EmpFirst` int(50) NOT NULL,
  `EmpPhone` int(12) NOT NULL,
  `Active` bit(1) NOT NULL,
  `EmpLast` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `EmployeeAccount`
--

CREATE TABLE `EmployeeAccount` (
  `EmployeeID` int(11) NOT NULL,
  `Email` int(11) NOT NULL,
  `PasswordHash` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Pet`
--

CREATE TABLE `Pet` (
  `PetID` int(11) NOT NULL,
  `PetName` varchar(50) NOT NULL,
  `PetType` varchar(50) NOT NULL,
  `Breed` varchar(50) NOT NULL,
  `HairType` varchar(25) NOT NULL,
  `Weight` int(3) NOT NULL,
  `CustomerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Service`
--

CREATE TABLE `Service` (
  `ServiceID` int(11) NOT NULL,
  `ServiceName` int(11) NOT NULL,
  `Description` int(11) NOT NULL,
  `ServiceCost` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `UserAccount`
--

CREATE TABLE `UserAccount` (
  `CustomerID` int(11) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `PasswordHash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Appointment`
--
ALTER TABLE `Appointment`
  ADD PRIMARY KEY (`AppointmentID`),
  ADD KEY `FK_Appointment_Customer` (`CustomerID`),
  ADD KEY `FK_Appointment_Pet` (`PetID`),
  ADD KEY `FK_Appointment_Employee` (`EmployeeID`);

--
-- Indexes for table `AppointmentService`
--
ALTER TABLE `AppointmentService`
  ADD KEY `FK_AppointmentService_Appointment` (`AppointmentID`),
  ADD KEY `FK_AppointmentService_Service` (`ServiceID`);

--
-- Indexes for table `Customer`
--
ALTER TABLE `Customer`
  ADD PRIMARY KEY (`CustomerID`),
  ADD UNIQUE KEY `Phone` (`Phone`);

--
-- Indexes for table `Employee`
--
ALTER TABLE `Employee`
  ADD PRIMARY KEY (`EmployeeID`),
  ADD UNIQUE KEY `EmpPhone` (`EmpPhone`);

--
-- Indexes for table `EmployeeAccount`
--
ALTER TABLE `EmployeeAccount`
  ADD PRIMARY KEY (`EmployeeID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `Pet`
--
ALTER TABLE `Pet`
  ADD PRIMARY KEY (`PetID`),
  ADD KEY `FK_Pet_Customer` (`CustomerID`);

--
-- Indexes for table `Service`
--
ALTER TABLE `Service`
  ADD PRIMARY KEY (`ServiceID`);

--
-- Indexes for table `UserAccount`
--
ALTER TABLE `UserAccount`
  ADD PRIMARY KEY (`Email`),
  ADD UNIQUE KEY `CustomerID` (`CustomerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Appointment`
--
ALTER TABLE `Appointment`
  MODIFY `AppointmentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Customer`
--
ALTER TABLE `Customer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Employee`
--
ALTER TABLE `Employee`
  MODIFY `EmployeeID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Pet`
--
ALTER TABLE `Pet`
  MODIFY `PetID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Service`
--
ALTER TABLE `Service`
  MODIFY `ServiceID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Appointment`
--
ALTER TABLE `Appointment`
  ADD CONSTRAINT `FK_Appointment_Customer` FOREIGN KEY (`CustomerID`) REFERENCES `Customer` (`CustomerID`),
  ADD CONSTRAINT `FK_Appointment_Employee` FOREIGN KEY (`EmployeeID`) REFERENCES `Employee` (`EmployeeID`),
  ADD CONSTRAINT `FK_Appointment_Pet` FOREIGN KEY (`PetID`) REFERENCES `Pet` (`PetID`);

--
-- Constraints for table `AppointmentService`
--
ALTER TABLE `AppointmentService`
  ADD CONSTRAINT `FK_AppointmentService_Appointment` FOREIGN KEY (`AppointmentID`) REFERENCES `Appointment` (`AppointmentID`),
  ADD CONSTRAINT `FK_AppointmentService_Service` FOREIGN KEY (`ServiceID`) REFERENCES `Service` (`ServiceID`);

--
-- Constraints for table `EmployeeAccount`
--
ALTER TABLE `EmployeeAccount`
  ADD CONSTRAINT `FK_EmployeeAccount_Employee` FOREIGN KEY (`EmployeeID`) REFERENCES `Employee` (`EmployeeID`);

--
-- Constraints for table `Pet`
--
ALTER TABLE `Pet`
  ADD CONSTRAINT `FK_Pet_Customer` FOREIGN KEY (`CustomerID`) REFERENCES `Customer` (`CustomerID`);

--
-- Constraints for table `UserAccount`
--
ALTER TABLE `UserAccount`
  ADD CONSTRAINT `FK_UserAccount_Customer` FOREIGN KEY (`CustomerID`) REFERENCES `Customer` (`CustomerID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
