-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2024 at 10:03 PM
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
-- Database: `projectdiploma`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AID` int(11) NOT NULL,
  `Ausername` varchar(255) NOT NULL,
  `Apassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AID`, `Ausername`, `Apassword`) VALUES
(1, 'administrator', 'Admin_12345678');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `EID` int(11) NOT NULL,
  `EName` varchar(255) NOT NULL,
  `EDisc` text NOT NULL,
  `EIMG` varchar(1000) DEFAULT NULL,
  `EMajor` varchar(255) NOT NULL,
  `Supervisor` varchar(35) NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `StID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`EID`, `EName`, `EDisc`, `EIMG`, `EMajor`, `Supervisor`, `StartDate`, `EndDate`, `StID`) VALUES
(1, 'lets read together!', 'The reading event is a cultural gathering aimed at promoting the habit of reading among individuals of all ages. This event is distinguished by the presence of designated reading areas that include mobile libraries containing a wide range of books across various literary genres. Visitors can choose books to read in a quiet and comfortable atmosphere, furnished with spacious seats and sofas.', 'readbook.jpg', 'IT', 'hanifa', '2024-05-01', '2024-05-02', 2),
(2, 'programming race', 'The programming competition is an exhilarating event designed to challenge and showcase the coding prowess of participants. Participants are presented with a series of complex algorithmic problems that test their problem-solving skills, creativity, and ability to write efficient code. Teams or individuals compete against each other within a specified time frame to solve as many problems as possible, often employing a variety of programming languages and techniques. The competition fosters collaboration, critical thinking, and innovation, offering participants an opportunity to demonstrate their technical expertise and compete for prestigious awards and recognition. Whether seasoned professionals or aspiring programmers, participants immerse themselves in an intellectually stimulating environment, where ingenuity and perseverance reign supreme.', 'OCPCcomp.jpg', 'IT', 'arwa alsariri', '2024-05-01', '2024-05-01', 1),
(3, 'Arduino race', 'Join us for the Arduino Race Competition, an electrifying event where participants design and build autonomous vehicles using Arduino microcontrollers. Showcasing creativity and innovation, this competition challenges engineers and enthusiasts to navigate through a thrilling racecourse using intricate circuitry and precise maneuvering. Don&#039;t miss this opportunity to race towards victory and glory in the ultimate test of speed and ingenuity!', '1715820750.jpeg', 'Engineering', 'Alya Al-Harthi', '2024-05-01', '2024-05-02', 1),
(5, 'Arduino race v2', 'Experience the adrenaline rush of Arduino Race v2! Design, build, and program your own autonomous vehicles using Arduino microcontrollers. Compete against fellow enthusiasts in a thrilling race to the finish line. Get ready for a day packed with high-speed action, creativity, and friendly competition. Don\'t miss out on this electrifying event!', 'arduino.jpeg', 'IT', 'Arwa Al-Sariri', '2024-05-01', '2024-05-03', 1),
(6, 'Arduino racev3', 'testdesc', '1715963354.jpeg', 'IT', 'Alya Al-Harthi', '2024-05-02', '2024-05-17', 6);

-- --------------------------------------------------------

--
-- Table structure for table `eventstudent`
--

CREATE TABLE `eventstudent` (
  `SdID` int(11) NOT NULL,
  `SDname` varchar(255) NOT NULL,
  `SDemail` varchar(255) NOT NULL,
  `EID` int(11) NOT NULL,
  `EName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eventstudent`
--

INSERT INTO `eventstudent` (`SdID`, `SDname`, `SDemail`, `EID`, `EName`) VALUES
(1, 'adadadadad akram aldah', 'asdfghjkl@utas.edu.om', 1, 'lets read together!'),
(1, 'adadadadad akram aldah', 'asdfghjkl@utas.edu.om', 2, 'programming race'),
(1, 'adadadadad akram aldah', 'asdfghjkl@utas.edu.om', 3, 'Arduino race'),
(1, 'adadadadad akram aldah', 'asdfghjkl@utas.edu.om', 6, 'Arduino racev3');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `StID` int(11) NOT NULL,
  `STName` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `STUsername` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `STEmail` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `STphone` int(8) NOT NULL,
  `STPassword` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `STmajor` varchar(11) NOT NULL,
  `STimg` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`StID`, `STName`, `STUsername`, `STEmail`, `STphone`, `STPassword`, `STmajor`, `STimg`) VALUES
(1, 'Ahmed nadir Akram', 'SweedWeed', 's2021293076@utas.edu.om', 91246323, '12345678', 'Engineering', 'ard.jpeg'),
(2, 'arwa Khalfan alsiriri', 'arwak', 's2010293015@utas.edu.om', 97445001, '987654321', 'IT', 'aass.jpeg'),
(6, 'Tamed Nader Akram', 'Tamer_1998', 'toztooz@gmail.com', 97949207, 'Tamer_nader1998', 'IT', 'OIG2.5QIaDQ7A4.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `SdID` int(11) NOT NULL,
  `SDname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `SDusername` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `SDemail` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `SDimg` varchar(1000) DEFAULT NULL,
  `SDphone` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `SDpassword` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `SDmajor` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`SdID`, `SDname`, `SDusername`, `SDemail`, `SDimg`, `SDphone`, `SDpassword`, `SDmajor`) VALUES
(1, 'adadadadad akram aldah', 'ahmed123', 'asdfghjkl@utas.edu.om', 'layered-waves-haikei-transformed.png', '65656565', '12345678', 'IT'),
(4, 'ayman Al-Mihrizy', 'Ayman_123', 's2021293001@utas.edu.om', NULL, '97446551', 'Ahmed_123', 'IT');

-- --------------------------------------------------------

--
-- Table structure for table `studentcertificate`
--

CREATE TABLE `studentcertificate` (
  `CID` int(11) NOT NULL,
  `SdID` int(11) NOT NULL,
  `Cname` varchar(100) NOT NULL,
  `Cimg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentcertificate`
--

INSERT INTO `studentcertificate` (`CID`, `SdID`, `Cname`, `Cimg`) VALUES
(1, 1, 'programming race', 'programmingrace.png'),
(2, 1, 'lets read together', 'letsreadtogether.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AID`),
  ADD UNIQUE KEY `Ausername` (`Ausername`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`EID`),
  ADD KEY `FKeyStID` (`StID`);

--
-- Indexes for table `eventstudent`
--
ALTER TABLE `eventstudent`
  ADD PRIMARY KEY (`SdID`,`EID`),
  ADD KEY `foreignkeyforES2` (`EID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`StID`),
  ADD UNIQUE KEY `SDUsername` (`STUsername`),
  ADD UNIQUE KEY `SdEmail` (`STEmail`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`SdID`),
  ADD UNIQUE KEY `SDEmail` (`SDemail`),
  ADD UNIQUE KEY `SDUsername` (`SDusername`),
  ADD UNIQUE KEY `SDusername_2` (`SDusername`);

--
-- Indexes for table `studentcertificate`
--
ALTER TABLE `studentcertificate`
  ADD PRIMARY KEY (`CID`,`SdID`),
  ADD KEY `foreignkeySID` (`SdID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `EID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `StID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `SdID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `studentcertificate`
--
ALTER TABLE `studentcertificate`
  MODIFY `CID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `FKeyStID` FOREIGN KEY (`StID`) REFERENCES `staff` (`StID`);

--
-- Constraints for table `eventstudent`
--
ALTER TABLE `eventstudent`
  ADD CONSTRAINT `eventstudent_ibfk_1` FOREIGN KEY (`SdID`) REFERENCES `student` (`SdID`),
  ADD CONSTRAINT `eventstudent_ibfk_2` FOREIGN KEY (`EID`) REFERENCES `event` (`EID`);

--
-- Constraints for table `studentcertificate`
--
ALTER TABLE `studentcertificate`
  ADD CONSTRAINT `studentcertificate_ibfk_1` FOREIGN KEY (`SdID`) REFERENCES `student` (`SdID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
