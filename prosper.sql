
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

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







-- -- 1) Notifications table: stores each notification/announcement
-- CREATE TABLE IF NOT EXISTS `notification` (
--   `NID` INT(11) NOT NULL AUTO_INCREMENT,
--   `Title` VARCHAR(255) NOT NULL,
--   `Message` TEXT NOT NULL,
--   `EID` INT(11) DEFAULT NULL,                     -- optional link to an event
--   `CreatedByID` INT(11) NOT NULL,                 -- id of creator (see CreatedByType)
--   `CreatedByType` ENUM('admin','staff') NOT NULL, -- tells whether CreatedByID points to admin.AID or staff.StID
--   `CreatedAt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
--   PRIMARY KEY (`NID`),
--   KEY `idx_EID` (`EID`),
--   KEY `idx_CreatedBy` (`CreatedByID`,`CreatedByType`),
--   CONSTRAINT `fk_notification_event` FOREIGN KEY (`EID`) REFERENCES `event`(`EID`) ON DELETE SET NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- -- 2) Notification status: per-student read/unread status
-- CREATE TABLE IF NOT EXISTS `notification_status` (
--   `NID` INT(11) NOT NULL,
--   `SdID` INT(11) NOT NULL,
--   `IsRead` TINYINT(1) NOT NULL DEFAULT 0,  -- 0 = unread, 1 = read
--   `ReadAt` DATETIME DEFAULT NULL,
--   PRIMARY KEY (`NID`,`SdID`),
--   KEY `idx_SdID` (`SdID`),
--   CONSTRAINT `fk_notifstatus_notification` FOREIGN KEY (`NID`) REFERENCES `notification`(`NID`) ON DELETE CASCADE,
--   CONSTRAINT `fk_notifstatus_student` FOREIGN KEY (`SdID`) REFERENCES `student`(`SdID`) ON DELETE CASCADE
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


