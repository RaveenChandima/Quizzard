-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2023 at 08:39 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quizzard`
--

-- --------------------------------------------------------

--
-- Table structure for table `mark`
--

CREATE TABLE `mark` (
  `Mark_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Quiz_ID` int(11) NOT NULL,
  `Marks_Total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mark`
--

INSERT INTO `mark` (`Mark_ID`, `User_ID`, `Quiz_ID`, `Marks_Total`) VALUES
(1, 5, 5, 80),
(2, 5, 6, 70),
(3, 5, 4, 56),
(4, 3, 1, 83),
(5, 3, 2, 70),
(6, 3, 3, 78),
(7, 3, 15, 65),
(8, 4, 7, 70),
(9, 4, 8, 81),
(10, 4, 9, 65),
(11, 6, 11, 89),
(12, 6, 12, 73),
(13, 6, 6, 65),
(14, 7, 13, 73),
(15, 7, 14, 67),
(16, 20, 16, 75),
(17, 18, 17, 70),
(18, 16, 18, 82),
(19, 19, 19, 70),
(20, 21, 20, 87);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `Question_ID` int(11) NOT NULL,
  `Quiz_ID` int(11) DEFAULT NULL,
  `Question` varchar(256) NOT NULL,
  `Correct_Answer` varchar(256) NOT NULL,
  `Wrong_Answer1` varchar(256) NOT NULL,
  `Wrong_Answer2` varchar(256) NOT NULL,
  `Wrong_Answer3` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `Quiz_ID` int(11) NOT NULL,
  `User_ID` int(11) DEFAULT NULL,
  `Subject_ID` int(11) DEFAULT NULL,
  `Quiz_Name` varchar(64) NOT NULL,
  `Quiz_Password` char(10) NOT NULL,
  `Start_Time` datetime DEFAULT NULL,
  `End_Time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`Quiz_ID`, `User_ID`, `Subject_ID`, `Quiz_Name`, `Quiz_Password`, `Start_Time`, `End_Time`) VALUES
(1, 3, 2, 'Web Application Development', '0WAD1#', '2023-07-31 10:00:00', '2023-07-31 12:00:00'),
(2, 3, 20, 'Python Programming', '0PY2#', '2023-08-02 13:00:00', '2023-08-02 14:00:00'),
(3, 3, 19, 'C++ Programming', '0C++P3#', '2023-08-01 09:00:00', '2023-08-01 11:00:00'),
(4, 5, 18, 'Java Programming', '0JP4#', '2023-08-03 11:00:00', '2023-08-03 13:00:00'),
(5, 5, 17, 'Data Structures', '0DS5#', '2023-08-01 09:00:00', '2023-08-01 11:00:00'),
(6, 5, 16, 'Operating Systems', '0OS6#', '2023-08-06 08:00:00', '2023-08-06 10:00:00'),
(7, 4, 15, 'Essential Mathematics', '0EM7#', '2023-08-02 13:00:00', '2023-08-02 14:00:00'),
(8, 4, 14, 'Java Script', '0JS8#', '2023-08-09 09:00:00', '2023-08-09 10:00:00'),
(9, 4, 13, 'Statistics', '0ST9#', '2023-08-01 09:00:00', '2023-08-01 11:00:00'),
(10, 6, 12, 'Rapid Application Development', '0RAD10#', '2023-08-16 14:00:00', '2023-08-16 15:00:00'),
(11, 6, 11, 'Database Management System', '0DBMS11#', '2023-08-03 11:00:00', '2023-08-03 13:00:00'),
(12, 6, 10, 'Electronics', '0EL12#', '2023-08-18 12:00:00', '2023-08-18 14:00:00'),
(13, 7, 9, 'Compiler Design', '0CD13#', '0000-00-00 00:00:00', '2023-08-07 12:00:00'),
(14, 7, 8, 'Computer Networks', '0CN14#', '2023-08-22 09:30:00', '2023-08-22 10:30:00'),
(15, 3, 1, 'C Programming ', '0CP15#', '2023-07-30 10:00:00', '2023-07-30 11:00:00'),
(16, 20, 6, 'Object Oriented Programming', '0OOP16#', '2023-08-25 10:00:00', '2023-08-25 11:00:00'),
(17, 18, 5, 'Algorithm Analysis and Design', '0AAD17#', '2023-08-28 09:00:00', '2023-08-28 10:00:00'),
(18, 16, 4, 'UX/UI Design', '0UXUI18#', '2023-08-03 11:00:00', '2023-08-03 13:00:00'),
(19, 19, 3, 'Cyber Security', '0CS19#', '2023-08-30 13:00:00', '2023-08-30 14:00:00'),
(20, 21, 18, 'Java Programming', '0JP20#', '2023-08-13 11:00:00', '2023-08-13 13:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `Subject_ID` int(11) NOT NULL,
  `Subject_Name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`Subject_ID`, `Subject_Name`) VALUES
(1, 'C Programming '),
(2, 'Web Application Development'),
(3, 'Cyber Security'),
(4, 'UX/UI Design'),
(5, 'Algorithm Analysis and Design'),
(6, 'Object Oriented Programming'),
(7, 'C Programming'),
(8, 'Computer Networks'),
(9, 'Compiler Design'),
(10, 'Electronics'),
(11, 'Database Management System'),
(12, 'Rapid Application Development'),
(13, 'Statistics'),
(14, 'Java Script'),
(15, 'Essential Mathematics'),
(16, 'Operating Systems'),
(17, 'Data Structures'),
(18, 'Java Programming'),
(19, 'C++ Programming'),
(20, 'Python Programming');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_ID` int(11) NOT NULL,
  `User_Name` varchar(64) NOT NULL,
  `Password` varchar(64) NOT NULL,
  `User_Role` varchar(64) DEFAULT 'Student'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_ID`, `User_Name`, `Password`, `User_Role`) VALUES
(2, 'Admin', '$2y$10$CcJU6FKxpfAp5RHdXIeC4erswaHkVTbDM.v5MRwNP6Q.m67vyK0OK', 'Admin'),
(3, 'cst20017', '$2y$10$m1kDQrJOkin7w6xazbFRPuNj74y7GxYE9B2NXXc2ksXmjRcJzyPfq', 'Student'),
(4, 'cst20049', '$2y$10$L6SrNPf0IOr0UYN3N4hcO.fmqS/2pI3hkix6ifZj0Rsyl3RhoTe3m', 'Student'),
(5, 'cst20066', '$2y$10$wwTZvOc6BGZkan47obJuHOhuoU269/7ihJ.6sxiViFJTRGY/EfSJO', 'Student'),
(6, 'cst20080', '$2y$10$weTwush1u8jgVL7Xyvg8Gef1FEXvdQhm5T71itSwCcVUN80TLqZqu', 'Student'),
(7, 'cst20079', '$2y$10$4qpVz3ksX/PAi1DQsmVgyen89A8b7ltgjfrKbh3L4PMW2UPZ5J1Hi', 'Student'),
(9, 'Lec.nisal', '$2y$10$KPZ7.ie1WLHfr3jJujE5PO8.qaePWYKpf0U2t4NER4ZpED1w4RqRO', 'Lecturer'),
(10, 'lec.subash', '$2y$10$Rx2SW9RdN24C8p4tajIo4uQGSMlHXly5xwfWaeTec8FZvErc7nLC6', 'Lecturer'),
(11, 'lec.suneth', '$2y$10$kBqKHstNyPYyHiARBz/7E.zcmuEiFFyFe6c7E8HpcedhWBime9et2', 'Lecturer'),
(12, 'lec.harshani', '$2y$10$EBnd8SsDAJcyCqqQIImFB.0.K1ophy4/K9o7NtqztzTTUa8c7Mzb.', 'Lecturer'),
(13, 'lec.umesh', '$2y$10$qoJv9rG4kM.tLE8jj7o/tejEqoIwOkQEUpwX2S6QEBvkr0fkfalWe', 'Lecturer'),
(14, 'lec.jagath', '$2y$10$7v9650UW.Vm326ZJ8GaW/ejR0pEFE.t6KO2g69pq2acAUR8/PZ5HO', 'Lecturer'),
(15, 'lec.Jayalath', '$2y$10$cchzT447xfr776wJBPu8ie/aCsqUeeOol/M2ABbMZ0A12aX7crYY.', 'Lecturer'),
(16, 'cst20069', '$2y$10$V65sw34AKUwFKlHV732eL.AE0IMCqf7muH2dn66tO0xtmexwe.mw2', 'Student'),
(18, 'cst20071', '$2y$10$dZFG0Ylcbm.VgpEltS3r5eLcHIkdzFFOu5MOlhpuWgZZJLfw7iPBG', 'Student'),
(19, 'cst20059', '$2y$10$EOwXNfRGRhmIWnry5flY1./4nI/xx/C6SCH/jSjMstJ4KmKOQe3ky', 'Student'),
(20, 'cst20068', '$2y$10$HdNGEd8jXUxAzDkfw2aj3OjEE/YugKbfPP.1yyVRxnzNNDfLmJGTq', 'Student'),
(21, 'cst20003', '$2y$10$/gu.BCL9npO.80juF14kW.XNERE0NmCChL0GhlwuUAY4g6AW1FTmK', 'Student'),
(25, 'test1', '$2y$10$TAjRBZBVCLZoq9ulIevbWOOF0YTz0k9B5eWJGAFG4pTbtU.yorw2W', 'Student'),
(27, 'a1', '$2y$10$4Je8Pp6cxoEblNDiURl5ceeinoEENreenbKGA480Y7f5mveRITuKW', 'Student'),
(29, 'test10', '$2y$10$IU3qvvG9KuDoGSMpGmgKLeQ9NsUMldkJ1NsgkP3nu7Olp2bIsGl8y', 'Student'),
(31, 'test25', '$2y$10$5vHAkUX.86DOeYfn.lWRt.9IM52fUrW6UPorZrSIRvVvPHgn28BwS', 'Student'),
(32, 'test30', '$2y$10$OblBoRt0ChU92haWXZe0sOH5gvAYtcIHzfNq5E3qY7tcF1/TsDeW.', 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `User_Details_ID` int(11) NOT NULL,
  `User_ID` int(11) DEFAULT NULL,
  `First_Name` varchar(64) NOT NULL,
  `Last_Name` varchar(64) NOT NULL,
  `Email` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`User_Details_ID`, `User_ID`, `First_Name`, `Last_Name`, `Email`) VALUES
(1, 2, 'admin', 'WAD', 'admin@gmail.com'),
(2, 3, 'Nethma', 'Kalpani', 'Kalpani@gmail.com'),
(3, 4, 'Lashan', 'Sachintha', 'Sachintha@gmail.com'),
(4, 5, 'Kavithra', 'Dimani', 'Dimani@gmail.com'),
(5, 6, 'Raveen', 'Rajapaksha', 'Rajapaksha@gmail.com'),
(6, 7, 'Maduwanthi', 'Ranaweera', 'Ranaweera@gmail.com'),
(8, 9, 'Nisal', 'Nandasena', 'Nisal@gmail.com'),
(9, 10, 'Subash', 'Ariyadasa', 'Subash@gmail.com'),
(10, 11, 'Suneth', 'Pathirana', 'Suneth@gmail.com'),
(11, 12, 'Harshani', 'Wickckramarathna', 'Harshani@gmail.com'),
(12, 13, 'Umesh', 'Eranda', 'Umesh@gmail.com'),
(13, 14, 'Jagath', 'Pitawal', 'Jagath@gmail.com'),
(14, 15, 'Jayalath', 'Ekanayaka', 'Jayalath@gmail.com'),
(15, 16, 'Nureka', 'Rodrigo', 'Nureka@gmail.com'),
(17, 18, 'Pabasara', 'Nayanahari', 'Pabasara@gmail.com'),
(18, 19, 'Miyuni', 'Tharushika', 'Miyuni@gmail.com'),
(19, 20, 'Dilshan', 'Kavindra', 'Dilshan@gmail.com'),
(20, 21, 'Kavindu', 'Manahara', 'Kavindu@gmail.com'),
(24, 25, 'Test1', 'test2', 'admin@gmail.com'),
(26, 27, 'a1', 'a1', 'jgamitha@gmail.com'),
(28, 29, 'test10', 'test10', 'admin@gmail.com'),
(30, 31, 'test25', 'test25', 'jgamitha@gmail.com'),
(31, 32, 'test30', 'test30', 'admin@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mark`
--
ALTER TABLE `mark`
  ADD PRIMARY KEY (`Mark_ID`,`User_ID`,`Quiz_ID`),
  ADD KEY `User_ID` (`User_ID`),
  ADD KEY `Quiz_ID` (`Quiz_ID`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`Question_ID`),
  ADD KEY `Quiz_ID` (`Quiz_ID`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`Quiz_ID`),
  ADD KEY `User_ID` (`User_ID`),
  ADD KEY `Subject_ID` (`Subject_ID`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`Subject_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_ID`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`User_Details_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `Question_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `Quiz_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `Subject_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `User_Details_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mark`
--
ALTER TABLE `mark`
  ADD CONSTRAINT `mark_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`),
  ADD CONSTRAINT `mark_ibfk_2` FOREIGN KEY (`Quiz_ID`) REFERENCES `quiz` (`Quiz_ID`);

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`Quiz_ID`) REFERENCES `quiz` (`Quiz_ID`);

--
-- Constraints for table `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `quiz_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`),
  ADD CONSTRAINT `quiz_ibfk_2` FOREIGN KEY (`Subject_ID`) REFERENCES `subject` (`Subject_ID`);

--
-- Constraints for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD CONSTRAINT `user_detail_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
