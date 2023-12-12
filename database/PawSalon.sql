-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 21, 2023 at 04:10 AM
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
  `ServiceID` int(11) NOT NULL,
  `ApptDate` date NOT NULL,
  `ApptTime` time NOT NULL,
  `ApptStatus` varchar(20) NOT NULL,
  `PaymentStatus` bit(1) NOT NULL,
  `TotalCost` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

CREATE TABLE `Customer` (
  `CustomerID` int(11) NOT NULL,
  `CustFirst` varchar(50) NOT NULL,
  `CustLast` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Phone` varchar(12) NOT NULL,
  `Active` bit(1) NOT NULL,
  `Password` varchar(15) NOT NULL
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
  `ServiceName` varchar(50) NOT NULL,
  `Description` varchar(75) NOT NULL,
  `ServiceCost` decimal(10,0) NOT NULL
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
  ADD KEY `FK_Appointment_Service` (`ServiceID`);

--
-- Indexes for table `Customer`
--
ALTER TABLE `Customer`
  ADD PRIMARY KEY (`CustomerID`),
  ADD UNIQUE KEY `Phone` (`Phone`),
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
  ADD CONSTRAINT `FK_Appointment_Pet` FOREIGN KEY (`PetID`) REFERENCES `Pet` (`PetID`),
  ADD CONSTRAINT `FK_Appointment_Service` FOREIGN KEY (`ServiceID`) REFERENCES `Service` (`ServiceID`);

--
-- Constraints for table `Pet`
--
ALTER TABLE `Pet`
  ADD CONSTRAINT `FK_Pet_Customer` FOREIGN KEY (`CustomerID`) REFERENCES `Customer` (`CustomerID`);
 
INSERT INTO `service` (`ServiceName`, `Description`, `ServiceCost`) VALUES 
('Nail Trim', 'Includes nail trim, file, and buffer', 25), ('Haircut', 'Includes cut and style', 50), 
('Bath and Brush', 'Includes deep shampoo and conditioner', 75), 
('Full Service Package', 'Includes nail services, bath, de-shed, haircut, and teeth cleaning', 90);

INSERT INTO `customer` (`CustFirst`, `CustLast`, `Email`, `Address`, `Phone`, `Active`, `Password`) VALUES ('John', 'Doe', 'johnd@gmail.com', '1234 Homewood Street, Killeen TX', '254-123-5457', b'1', 'Password');

INSERT INTO `pet` (`PetName`, `PetType`, `Breed`, `HairType`, `Weight`, `CustomerID`) VALUES ('Barkie', 'Dog', 'Pitbull', 'Short', '45', '1') , ('Spots', 'Dog', 'Bulldog', 'Short', '140', '1');

INSERT INTO `appointment` (`CustomerID`, `PetID`, `ServiceID`, `ApptDate`, `ApptTime`, `ApptStatus`, `PaymentStatus`, `TotalCost`) VALUES 
('1', '1', '8', '2023-10-09', '18:00:00', 'Completed', b'1', '50'), ('1', '2', '10', '2023-12-04', '11:00:00', 'Completed', b'1', '90');

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
