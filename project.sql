-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 07, 2023 at 03:48 AM
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
-- Table structure for table `admin_list`
--

CREATE TABLE `admin_list` (
  `Admin_id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `Prefix` text NOT NULL,
  `Fname` varchar(100) NOT NULL,
  `Lname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin_list`
--

INSERT INTO `admin_list` (`Admin_id`, `User_id`, `Prefix`, `Fname`, `Lname`) VALUES
(1, 55, 'นาย', 'admin2', 'admin2');

-- --------------------------------------------------------

--
-- Table structure for table `detail_confirm_tran`
--

CREATE TABLE `detail_confirm_tran` (
  `id` int(11) NOT NULL,
  `Student_id` int(11) NOT NULL,
  `name_advisor` varchar(100) NOT NULL,
  `name_chief` varchar(100) NOT NULL,
  `name_president` varchar(100) NOT NULL,
  `name_1` varchar(100) NOT NULL,
  `name_2` varchar(100) NOT NULL,
  `name_3` varchar(100) NOT NULL,
  `name_4` varchar(100) NOT NULL,
  `name_5` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `detail_confirm_tran`
--

INSERT INTO `detail_confirm_tran` (`id`, `Student_id`, `name_advisor`, `name_chief`, `name_president`, `name_1`, `name_2`, `name_3`, `name_4`, `name_5`) VALUES
(6, 4, 'asdasddasdas', 'dasasdasd', 'asdasdasd', 'asdasdasd', 'asdasdasdasd', 'asdasdasd', 'asdasdasd', 'asdasdasd'),
(7, 5, 'asd', 'asd', 'asdasdasd', 'asdasdasd', 'asdasdasd', '', '', ''),
(8, 11, 'กกกกกกก', 'ฟหกฟหก', 'ฟหกฟหกฟหก', 'ฟหกฟหกฟหก', 'กกกกกกก', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `student_detail`
--

CREATE TABLE `student_detail` (
  `Student_id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `Prefix` text NOT NULL,
  `Fname` varchar(100) NOT NULL,
  `Lname` varchar(100) NOT NULL,
  `Faculty` enum('บริหารธุรกิจและเทคโนโลยีสารสนเทศ','ศิลปะศาสตร์') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Major` enum('วิทยาการสารสนเทศ','การตลาด','บัญชี') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Student_idcard` int(13) DEFAULT NULL,
  `Supclass_std` text,
  `Student_year` int(4) NOT NULL,
  `Phone_std` int(11) DEFAULT NULL,
  `Email_std` text,
  `Pic_grad` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `std_confirm_tran` int(1) NOT NULL DEFAULT '0',
  `teacher_con` int(1) NOT NULL DEFAULT '0',
  `std_scheme` enum('ปริญญาตรี','ปวส') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student_detail`
--

INSERT INTO `student_detail` (`Student_id`, `User_id`, `Prefix`, `Fname`, `Lname`, `Faculty`, `Major`, `Student_idcard`, `Supclass_std`, `Student_year`, `Phone_std`, `Email_std`, `Pic_grad`, `std_confirm_tran`, `teacher_con`, `std_scheme`) VALUES
(3, 3, '', 'test23', 'test23', 'บริหารธุรกิจและเทคโนโลยีสารสนเทศ', 'วิทยาการสารสนเทศ', 11020031, 'ภาคสมทบ', 2556, 0, 'sss@hotmail.com', NULL, 0, 0, 'ปริญญาตรี'),
(4, 36, 'นาย', 'test12', 'test12', 'บริหารธุรกิจและเทคโนโลยีสารสนเทศ', 'วิทยาการสารสนเทศ', 110200, 'ภาคสมทบ', 2556, 0, 'sss@', '', 2, 0, 'ปริญญาตรี'),
(5, 37, 'นาย', 'asdasdasdasd', 'asdasdasdasd', 'บริหารธุรกิจและเทคโนโลยีสารสนเทศ', 'วิทยาการสารสนเทศ', 110200, 'ภาคสมทบ', 2556, 0, '', '44702b57549a1853df2f4766bf2767d3.jpg', 0, 1, 'ปริญญาตรี'),
(9, 51, 'นาย', 'teacher01', 'teacher01', 'บริหารธุรกิจและเทคโนโลยีสารสนเทศ', 'วิทยาการสารสนเทศ', NULL, 'ภาคสมทบ', 2556, 0, 'sss@hotmail.com', NULL, 0, 0, 'ปวส'),
(10, 56, 'นาย', 'test2', 'test2', 'บริหารธุรกิจและเทคโนโลยีสารสนเทศ', 'วิทยาการสารสนเทศ', NULL, 'ภาคปกติ', 2556, NULL, NULL, NULL, 0, 0, 'ปริญญาตรี'),
(11, 57, 'นาย', 'ทดสอบ', 'ทดสอบ', 'บริหารธุรกิจและเทคโนโลยีสารสนเทศ', 'วิทยาการสารสนเทศ', 1102002020, 'ภาคสมทบ', 2557, 123456, 'asasd@gmail.com', '44702b57549a1853df2f4766bf2767d3.jpg', 0, 1, 'ปวส'),
(12, 59, 'นาย', 'sooohoo', 'ssoloo', 'ศิลปะศาสตร์', 'วิทยาการสารสนเทศ', NULL, 'ภาคสมทบ', 2556, NULL, NULL, NULL, 0, 0, 'ปริญญาตรี');

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
  `Credit` int(1) NOT NULL,
  `Sub_descrip` text NOT NULL,
  `subject_scheme` enum('ปริญญาตรี','ปวส') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`Subject_id`, `Course_code`, `Name_sub`, `Group_Category`, `Group_sub`, `Faculty`, `Group_course`, `Sub_Year`, `Credit`, `Sub_descrip`, `subject_scheme`) VALUES
(3, '011-01001', 'asdsadsadsasd', 'กลุ่มสังคมศาสตร์และมนุษย์ศาสตร์', 'รายวิชาบังคับ', 'บริหารธุรกิจ', 'ศึกษาทั่วไป-บังคับ', 2556, 3, 'asdasdsdadsadasasds', 'ปริญญาตรี'),
(4, '011-0100', 'asdasddddd', 'กลุ่มวิทยาศาสตร์และคณิตศาสตร์', 'รายวิชาบังคับ', 'บริหารธุรกิจ', 'ศึกษาทั่วไป-บังคับ', 2556, 3, 'asdasdsdadsadasasds', 'ปริญญาตรี'),
(7, '011-01001', 'สังคม', 'กลุ่มสังคมศาสตร์และมนุษย์ศาสตร์', 'รายวิชาสังคมศาสตร์', 'บริหารธุรกิจ', 'ศึกษาทั่วไป-เลือก', 2556, 3, 'asdasdsdadsadasasds', 'ปริญญาตรี'),
(9, '011-01234', 'หัดเทพ', 'กลุ่มวิทยาศาสตร์และคณิตศาสตร์', 'รายวิชาบังคับ', 'บริหารธุรกิจ', 'ศึกษาทั่วไป-บังคับ', 2556, 3, 'เพื่อการศึกษา', 'ปวส');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `Teacher_id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `Prefix` text NOT NULL,
  `Fname` varchar(100) NOT NULL,
  `Lname` varchar(100) NOT NULL,
  `Faculty` enum('บริหารธุรกิจและเทคโนโลยีสารสนเทศ','ศิลปะศาสตร์') NOT NULL,
  `Major` enum('วิทยาการสารสนเทศ','การตลาด','บัญชี') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`Teacher_id`, `User_id`, `Prefix`, `Fname`, `Lname`, `Faculty`, `Major`) VALUES
(3, 52, 'นาง', 'teacher02', 'teacher02', 'บริหารธุรกิจและเทคโนโลยีสารสนเทศ', 'วิทยาการสารสนเทศ'),
(5, 54, 'ผศ.', 'teacher01', 'teacher01', 'บริหารธุรกิจและเทคโนโลยีสารสนเทศ', 'วิทยาการสารสนเทศ'),
(6, 58, 'ดร.', 'อาจารย์ศูนย์', 'อาจารย์ศูนย์', 'บริหารธุรกิจและเทคโนโลยีสารสนเทศ', 'วิทยาการสารสนเทศ');

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
  `Year_tran` int(4) NOT NULL,
  `Teacher_pass` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'พิจารณา'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transfer_std`
--

INSERT INTO `transfer_std` (`id`, `Student_id`, `Subjecttrans_id`, `Subject_idtran`, `Subject_nametran`, `Credit_tran`, `Gpa_tran`, `Year_tran`, `Teacher_pass`) VALUES
(78, 4, 3, '123', 'asdasd', 3, 3.5, 2556, 'ผ่าน'),
(83, 11, 3, '01-00-333354', 'ทดสอบ', 3, 3.5, 2557, 'ผ่าน'),
(89, 11, 7, '123-114-52', 'asdasda', 3, 3.5, 2557, 'พิจารณา');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_id` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Role` enum('admin','student','teacher') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_id`, `Username`, `Password`, `Role`) VALUES
(1, 'Admin', 'adminadmin', 'admin'),
(3, 'asd', 'asd', 'student'),
(36, '026230451', '1122334455', 'student'),
(37, '123456789', '1234567890', 'student'),
(51, 'teacher01teacher01', 'teacher01', 'student'),
(52, 'teacher02', 'teacher02', 'teacher'),
(54, 'teacher01', 'teacher01', 'teacher'),
(55, 'admin2', 'admin2', 'admin'),
(56, 'test2', 'test2', 'student'),
(57, '012345678900', '11020031', 'student'),
(58, 'testteacher01', 'testteacher01', 'teacher'),
(59, 'mr01', 'mr01', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_list`
--
ALTER TABLE `admin_list`
  ADD PRIMARY KEY (`Admin_id`);

--
-- Indexes for table `detail_confirm_tran`
--
ALTER TABLE `detail_confirm_tran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Student_id` (`Student_id`);

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
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`Teacher_id`),
  ADD KEY `User_id` (`User_id`);

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
-- AUTO_INCREMENT for table `admin_list`
--
ALTER TABLE `admin_list`
  MODIFY `Admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `detail_confirm_tran`
--
ALTER TABLE `detail_confirm_tran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student_detail`
--
ALTER TABLE `student_detail`
  MODIFY `Student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `Subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `Teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transfer_std`
--
ALTER TABLE `transfer_std`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_confirm_tran`
--
ALTER TABLE `detail_confirm_tran`
  ADD CONSTRAINT `detail_confirm_tran_ibfk_1` FOREIGN KEY (`Student_id`) REFERENCES `student_detail` (`Student_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `student_detail`
--
ALTER TABLE `student_detail`
  ADD CONSTRAINT `student_detail_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `user` (`User_id`);

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `user` (`User_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

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
