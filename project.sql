-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 21, 2022 at 05:47 PM
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
  `Major` enum('วิทยาการสารสนเทศ','การตลาด','บัญชี') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student_detail`
--

INSERT INTO `student_detail` (`Student_id`, `User_id`, `Fname`, `Lname`, `Faculty`, `Major`) VALUES
(1, 2, 'test2', 'test', 'บริหารธุรกิจ', 'วิทยาการสารสนเทศ'),
(3, 3, 'asd', 'asd', 'บริหารธุรกิจ', 'วิทยาการสารสนเทศ'),
(4, 12, 'asd1', 'asdasd', 'ศิลปะศาสตร์', 'วิทยาการสารสนเทศ'),
(9, 17, 'test5', 'test5', 'ศิลปะศาสตร์', 'การตลาด'),
(10, 18, 'test1', 'test1', '', 'บัญชี'),
(11, 19, 'test3', 'test3', 'บริหารธุรกิจ', 'วิทยาการสารสนเทศ');

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
  `Year` int(4) NOT NULL,
  `Credit` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(9, 'asdsaasds', 'asdasdasd', 'student'),
(10, 'test2', 'test2', 'student'),
(12, 'test4', 'test4', 'student'),
(17, 'test5', 'test5', 'student'),
(18, 'test1', 'test1', 'student'),
(19, 'test3', 'test3', 'student');

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
  MODIFY `Student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `Subject_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student_detail`
--
ALTER TABLE `student_detail`
  ADD CONSTRAINT `student_detail_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `user` (`User_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
