-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 18, 2022 at 02:30 PM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `student_detail`
--

CREATE TABLE `student_detail` (
  `Student_id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `Fname` varchar(100) NOT NULL,
  `Lname` varchar(100) NOT NULL,
  `Faculty` enum('บริหารธุรกิจ','ศิลปะศาสตร์') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Major` enum('วิทยาการสารสนเทศ','การตลาด','บัญชี') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Student_idcard` int(13) DEFAULT NULL,
  `Student_year` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student_detail`
--

INSERT INTO `student_detail` (`Student_id`, `User_id`, `Fname`, `Lname`, `Faculty`, `Major`, `Student_idcard`, `Student_year`) VALUES
(3, 3, 'test23', 'test23', 'บริหารธุรกิจ', 'วิทยาการสารสนเทศ', 1102003170, 2556),
(11020031, 2, 'test2444', 'test23', 'บริหารธุรกิจ', 'วิทยาการสารสนเทศ', 1102003170, 2556),
(11020032, 32, 'test23', 'test23', 'บริหารธุรกิจ', 'วิทยาการสารสนเทศ', 1102003170, 2556);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `Subject_id` int(11) NOT NULL,
  `Course_code` char(11) NOT NULL,
  `Name_sub` char(100) NOT NULL,
  `Group_Category` enum('กลุ่มสังคมศาสตร์และมนุษย์ศาสตร์','กลุ่มภาษา','กลุ่มวิทยาศาสตร์และคณิตศาสตร์','กลุ่มบูรณาการ','กลุ่มวิชาแกน','กลุ่มวิชาฝึกงานและประสบการณ์') NOT NULL,
  `Group_sub` char(100) NOT NULL,
  `Faculty` enum('บริหารธุรกิจ','ศิลปะศาสตร์') NOT NULL,
  `Group_course` enum('ศึกษาทั่วไป-บังคับ','ศึกษาทั่วไป-เลือก','เฉพาะ-แกน','เฉพาะ-เลือก','เลือกเสรี') NOT NULL,
  `Sub_Year` int(4) NOT NULL,
  `Credit` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`Subject_id`, `Course_code`, `Name_sub`, `Group_Category`, `Group_sub`, `Faculty`, `Group_course`, `Sub_Year`, `Credit`) VALUES
(2, '02623', 'lnw', 'กลุ่มภาษา', 'รายวิชาภาษาต่างประเทศอื่น', 'ศิลปะศาสตร์', 'เฉพาะ-แกน', 2557, '3-0-8'),
(3, '011-01001', 'asdsadsadsasd', 'กลุ่มสังคมศาสตร์และมนุษย์ศาสตร์', 'รายวิชาบังคับ', 'บริหารธุรกิจ', 'ศึกษาทั่วไป-บังคับ', 2556, '3-0-3'),
(4, '011-0100', 'asdasddddd', 'กลุ่มสังคมศาสตร์และมนุษย์ศาสตร์', 'รายวิชาบังคับ', 'บริหารธุรกิจ', 'ศึกษาทั่วไป-บังคับ', 2556, '3-0-3'),
(7, '011-01001', 'สังคม', 'กลุ่มสังคมศาสตร์และมนุษย์ศาสตร์', 'รายวิชาสังคมศาสตร์', 'บริหารธุรกิจ', 'ศึกษาทั่วไป-เลือก', 2556, '3-0-3');

-- --------------------------------------------------------

--
-- Table structure for table `transfer_std`
--

CREATE TABLE `transfer_std` (
  `id` int(12) NOT NULL,
  `Student_id` int(11) NOT NULL,
  `Subjecttrans_id` int(11) NOT NULL,
  `Subject_idtran` varchar(15) NOT NULL,
  `Subject_nametran` varchar(100) NOT NULL,
  `Credit_tran` int(1) NOT NULL,
  `Gpa_tran` float NOT NULL,
  `Year_tran` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transfer_std`
--

INSERT INTO `transfer_std` (`id`, `Student_id`, `Subjecttrans_id`, `Subject_idtran`, `Subject_nametran`, `Credit_tran`, `Gpa_tran`, `Year_tran`) VALUES
(1, 3, 4, '01101-00', 'dsadss', 3, 3.5, 2556),
(2, 11020032, 4, '01101-00', 'test', 3, 4, 2556);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_id` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Role` enum('admin','student') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_id`, `Username`, `Password`, `Role`) VALUES
(1, 'Admin', 'adminpassword', 'admin'),
(2, 'test', 'test', 'student'),
(3, 'asd', 'asd', 'student'),
(32, 'saddd', 'asdasddddd', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_detail`
--
ALTER TABLE `student_detail`
  ADD PRIMARY KEY (`Student_id`),
  ADD KEY `User_id` (`User_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`Subject_id`);

--
-- Indexes for table `transfer_std`
--
ALTER TABLE `transfer_std`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Student_id` (`Student_id`),
  ADD KEY `Subject_id` (`Subjecttrans_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_detail`
--
ALTER TABLE `student_detail`
  MODIFY `Student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11020033;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `Subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transfer_std`
--
ALTER TABLE `transfer_std`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student_detail`
--
ALTER TABLE `student_detail`
  ADD CONSTRAINT `student_detail_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `user` (`User_id`);

--
-- Constraints for table `transfer_std`
--
ALTER TABLE `transfer_std`
  ADD CONSTRAINT `Student_id` FOREIGN KEY (`Student_id`) REFERENCES `student_detail` (`Student_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `Subject_id` FOREIGN KEY (`Subjecttrans_id`) REFERENCES `subject` (`Subject_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
