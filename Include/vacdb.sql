-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2022 at 12:58 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vacdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `ID` int(10) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`ID`, `Name`) VALUES
(1, 'Cairo');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(10) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `UserType` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Username`, `Password`, `UserType`) VALUES
(1, 'AliGator', '12345', 2);

-- --------------------------------------------------------

--
-- Table structure for table `vaccinationcenter`
--

CREATE TABLE `vaccinationcenter` (
  `ContactNum` varchar(11) NOT NULL,
  `UserID` int(10) NOT NULL,
  `CityID` int(10) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vaccinationcenter`
--

INSERT INTO `vaccinationcenter` (`ContactNum`, `UserID`, `CityID`, `Name`, `Address`, `Type`) VALUES
('0100223344', 1, 1, 'Helwan International Vaccination Center', 'Helwan', 'Private');

-- --------------------------------------------------------

--
-- Table structure for table `vaccine`
--

CREATE TABLE `vaccine` (
  `ID` int(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Gap` int(10) NOT NULL,
  `Precautions` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vaccine`
--

INSERT INTO `vaccine` (`ID`, `Name`, `Gap`, `Precautions`) VALUES
(1, 'Vaccine19', 19, '');

-- --------------------------------------------------------

--
-- Table structure for table `vaccinereservation`
--

CREATE TABLE `vaccinereservation` (
  `ID` int(10) NOT NULL,
  `User_NationalID` int(14) NOT NULL,
  `Center_ContactNum` varchar(11) NOT NULL,
  `VaccineID` int(10) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vaccinereservation`
--

INSERT INTO `vaccinereservation` (`ID`, `User_NationalID`, `Center_ContactNum`, `VaccineID`, `Date`) VALUES
(1, 50505555, '0100223344', 1, '2022-12-08');

-- --------------------------------------------------------

--
-- Table structure for table `vaccineuser`
--

CREATE TABLE `vaccineuser` (
  `NationalID` int(14) NOT NULL,
  `UserID` int(10) NOT NULL,
  `CityID` int(10) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `PhoneNumber` varchar(11) NOT NULL,
  `DoseNumber` int(1) NOT NULL,
  `SecondDoseDate` date NOT NULL,
  `ReservationPath` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vaccineuser`
--

INSERT INTO `vaccineuser` (`NationalID`, `UserID`, `CityID`, `Name`, `Email`, `PhoneNumber`, `DoseNumber`, `SecondDoseDate`, `ReservationPath`) VALUES
(50505555, 1, 1, 'Ali Gator', 'AliGator@gmail.com', '010012345', 0, '0000-00-00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `Username_2` (`Username`);

--
-- Indexes for table `vaccinationcenter`
--
ALTER TABLE `vaccinationcenter`
  ADD PRIMARY KEY (`ContactNum`),
  ADD KEY `FK_CityID` (`CityID`),
  ADD KEY `FK_fUserID` (`UserID`);

--
-- Indexes for table `vaccine`
--
ALTER TABLE `vaccine`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `vaccinereservation`
--
ALTER TABLE `vaccinereservation`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_NationalID` (`User_NationalID`),
  ADD KEY `FK_ContactNum` (`Center_ContactNum`),
  ADD KEY `FK_VaccineID` (`VaccineID`);

--
-- Indexes for table `vaccineuser`
--
ALTER TABLE `vaccineuser`
  ADD PRIMARY KEY (`NationalID`),
  ADD KEY `FK_UserID` (`UserID`),
  ADD KEY `FK_fCityID` (`CityID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vaccine`
--
ALTER TABLE `vaccine`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vaccinereservation`
--
ALTER TABLE `vaccinereservation`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `vaccinationcenter`
--
ALTER TABLE `vaccinationcenter`
  ADD CONSTRAINT `FK_CityID` FOREIGN KEY (`CityID`) REFERENCES `city` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_fUserID` FOREIGN KEY (`UserID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vaccinereservation`
--
ALTER TABLE `vaccinereservation`
  ADD CONSTRAINT `FK_ContactNum` FOREIGN KEY (`Center_ContactNum`) REFERENCES `vaccinationcenter` (`ContactNum`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_NationalID` FOREIGN KEY (`User_NationalID`) REFERENCES `vaccineuser` (`NationalID`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_VaccineID` FOREIGN KEY (`VaccineID`) REFERENCES `vaccine` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `vaccineuser`
--
ALTER TABLE `vaccineuser`
  ADD CONSTRAINT `FK_UserID` FOREIGN KEY (`UserID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_fCityID` FOREIGN KEY (`CityID`) REFERENCES `city` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
