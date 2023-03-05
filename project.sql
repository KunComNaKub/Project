-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 05, 2023 at 02:16 PM
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
(10, 20, 'ทดสอบ 1', 'ทดสอบ 2', 'ทดสอบ 3', 'ทดสอบ 4', 'ทดสอบ 5', '', '', '');

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
(13, 60, 'นาย', 'หมายเลขหนึ่ง', 'หนึ่ง', 'บริหารธุรกิจและเทคโนโลยีสารสนเทศ', 'วิทยาการสารสนเทศ', 1102002020, 'ภาคปกติ', 2556, 2147483647, 'testtestmail@gmail.com', 'images.jpg', 1, 0, 'ปริญญาตรี'),
(14, 61, 'นาง', 'หมายเลขสอง', 'สอง', 'บริหารธุรกิจและเทคโนโลยีสารสนเทศ', 'การตลาด', NULL, 'ภาคปกติ', 2556, NULL, NULL, NULL, 0, 0, 'ปริญญาตรี'),
(15, 62, 'นาย', 'หมายเลขสี่', 'สี่', 'บริหารธุรกิจและเทคโนโลยีสารสนเทศ', 'บัญชี', NULL, 'ภาคสมทบ', 2556, NULL, NULL, NULL, 0, 0, 'ปริญญาตรี'),
(16, 63, 'นางสาว', 'หมายเลขห้า', 'ห้า', 'บริหารธุรกิจและเทคโนโลยีสารสนเทศ', 'วิทยาการสารสนเทศ', NULL, 'ภาคปกติ', 2556, NULL, NULL, NULL, 1, 0, 'ปริญญาตรี'),
(19, 66, 'นาย', 'หมายเลขเจ็ด', 'เจ็ด', 'ศิลปะศาสตร์', 'การตลาด', NULL, 'ภาคสมทบ', 2556, 0, '', NULL, 1, 0, 'ปริญญาตรี'),
(20, 69, 'นางสาว', 'หมายเลขสาม', 'สาม', 'บริหารธุรกิจและเทคโนโลยีสารสนเทศ', 'วิทยาการสารสนเทศ', NULL, 'ภาคปกติ', 2556, NULL, NULL, NULL, 2, 1, 'ปวส'),
(21, 70, 'นาง', 'หมายเลขหก', 'หมายเลขหก', 'บริหารธุรกิจและเทคโนโลยีสารสนเทศ', 'การตลาด', NULL, 'ภาคสมทบ', 2556, NULL, NULL, NULL, 0, 0, 'ปวส');

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
(10, '00-11-001', 'สังคมกับเศรษฐกิจ', 'กลุ่มสังคมศาสตร์และมนุษย์ศาสตร์', 'รายวิชาสังคมศาสตร์', 'บริหารธุรกิจ', 'ศึกษาทั่วไป-บังคับ', 2556, 3, 'เพื่อการศึกษาค้นคว้าสังคมกับเศรษฐกิจ', 'ปริญญาตรี'),
(11, '00-11-002', 'สังคมกับกฎหมาย', 'กลุ่มสังคมศาสตร์และมนุษย์ศาสตร์', 'รายวิชาสังคมศาสตร์', 'บริหารธุรกิจ', 'ศึกษาทั่วไป-บังคับ', 2556, 3, 'เพื่อการศึกษาค้นคว้าสังคมกับกฎหมาย', 'ปริญญาตรี'),
(12, '00-11-003', 'สังคมวิทยาและมานุษยวิทยาเบื้องต้น', 'กลุ่มสังคมศาสตร์และมนุษย์ศาสตร์', 'รายวิชาสังคมศาสตร์', 'บริหารธุรกิจ', 'ศึกษาทั่วไป-บังคับ', 2556, 3, 'เพื่อการศึกษาค้นคว้าสังคมวิทยาและมานุษยวิทยาเบื้องต้น', 'ปริญญาตรี'),
(13, '00-12-002', 'ไทยศึกษา', 'กลุ่มสังคมศาสตร์และมนุษย์ศาสตร์', 'รายวิชามนุษศาสตร์', 'บริหารธุรกิจ', 'ศึกษาทั่วไป-เลือก', 2556, 3, 'เพื่อการศึกษาค้นคว้าไทยศึกษา', 'ปริญญาตรี'),
(14, '00-22-001', 'ภาษาอังกฤษเพื่อทักษะการเรียน', 'กลุ่มภาษา', 'รายวิชาบังคับ', 'บริหารธุรกิจ', 'ศึกษาทั่วไป-บังคับ', 2556, 3, 'เพื่อการศึกษาค้นคว้าภาษาอังกฤษเพื่อทักษะการเรียน', 'ปริญญาตรี'),
(15, '00-22-002', 'ภาษาอังกฤษเพื่อการสื่อสาร', 'กลุ่มภาษา', 'รายวิชาบังคับ', 'บริหารธุรกิจ', 'ศึกษาทั่วไป-บังคับ', 2556, 3, 'เพื่อการศึกษาค้นคว้าภาษาอังกฤษเพื่อการสื่อสาร', 'ปริญญาตรี'),
(16, '00-21-001', 'ภาษาไทยเพื่อการสื่อสาร', 'กลุ่มภาษา', 'รายวิชาภาษาไทย', 'บริหารธุรกิจ', 'ศึกษาทั่วไป-เลือก', 2556, 3, 'เพื่อการศึกษาค้นคว้าภาษาไทยเพื่อการสื่อสาร', 'ปริญญาตรี'),
(17, '00-22-004', 'ภาษาอังกฤษสำหรับสถานประกอบการ', 'กลุ่มภาษา', 'รายวิชาภาษาอังกฤษ', 'บริหารธุรกิจ', 'ศึกษาทั่วไป-เลือก', 2556, 3, 'เพื่อการศึกษาค้นคว้าภาษาอังกฤษสำหรับสถานประกอบการ', 'ปริญญาตรี'),
(18, '00-31-002', 'คณิตศาสตร์และสถิติในชีวิตประจำวัน', 'กลุ่มวิทยาศาสตร์และคณิตศาสตร์', 'รายวิชาบังคับ', 'บริหารธุรกิจ', 'ศึกษาทั่วไป-เลือก', 2556, 3, 'เพื่อการศึกษาค้นคณิตศาสตร์และสถิติในชีวิตประจำวัน', 'ปริญญาตรี'),
(19, '04-00-101', 'หลักการตลาด', 'กลุ่มสังคมศาสตร์และมนุษย์ศาสตร์', 'รายวิชาบังคับ', 'บริหารธุรกิจ', 'ศึกษาทั่วไป-บังคับ', 2556, 3, 'เพื่อการศึกษา', 'ปวส'),
(20, '04-00-102', 'หลักเศรษฐศาสตร์', 'กลุ่มสังคมศาสตร์และมนุษย์ศาสตร์', 'รายวิชาบังคับ', 'บริหารธุรกิจ', 'เฉพาะ-แกน', 2556, 3, 'เพื่อการศึกษา', 'ปวส'),
(21, '00-22-009', 'การอ่านภาษาอังกฤษในชีวิตประจำวัน', 'กลุ่มภาษา', 'รายวิชาภาษาอังกฤษ', 'บริหารธุรกิจ', 'ศึกษาทั่วไป-เลือก', 2556, 3, 'เพื่อการศึกษาการอ่านภาษาอังกฤษในชีวิตประจำวัน', 'ปวส'),
(22, '00-31-001', 'เทคโนโลยีสารสนเทศในยุคดิจิทัล', 'กลุ่มวิทยาศาสตร์และคณิตศาสตร์', 'รายวิชาวิทยาศาสตร์', 'บริหารธุรกิจ', 'ศึกษาทั่วไป-บังคับ', 2556, 3, 'เพื่อการศึกษาเทคโนโลยีสารสนเทศในยุคดิจิทัล', 'ปริญญาตรี'),
(23, '00-41-002', 'มหัศจรรย์แห่งบัว', 'กลุ่มบูรณาการ', ' รายวิชาบูรณาการ', 'บริหารธุรกิจ', 'ศึกษาทั่วไป-เลือก', 2556, 3, 'เพื่อการศึกษามหัศจรรย์แห่งบัว', 'ปริญญาตรี'),
(24, '04-00-104', 'กฎหมายธุรกิจและการภาษีอากร', 'กลุ่มวิชาแกน', 'วิชาแกน', 'บริหารธุรกิจ', 'เฉพาะ-แกน', 2556, 3, 'เพื่อการศึกษากฎหมายธุรกิจและการภาษีอากร', 'ปริญญาตรี');

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
(7, 67, 'นาย', 'อาจารย์หนึ่ง', 'หนึ่ง', 'บริหารธุรกิจและเทคโนโลยีสารสนเทศ', 'วิทยาการสารสนเทศ'),
(8, 68, 'ผศ.ดร.', 'อาจารย์สอง', 'สอง', 'บริหารธุรกิจและเทคโนโลยีสารสนเทศ', 'การตลาด');

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
(100, 19, 13, '01-220-001', 'จิตวิทยาทั่วไป', 3, 3.5, 2556, 'พิจารณา'),
(101, 19, 14, '01-320-101', 'ภาษาอังกฤษ 1', 3, 3.5, 2556, 'พิจารณา'),
(102, 19, 15, '01-320-102', 'ภาษาอังกฤษ 2', 3, 2.5, 2556, 'พิจารณา'),
(103, 16, 14, '01-320-101', 'ภาษาอังกฤษ 1', 3, 3.5, 2556, 'พิจารณา'),
(104, 16, 15, '01-320-102', 'ภาษาอังกฤษ 2', 3, 2.5, 2556, 'พิจารณา'),
(105, 20, 19, '13-010-120', 'คณิตศาสตร์ทั่วไป', 3, 3, 2556, 'ผ่าน'),
(106, 13, 23, '05-052-204', 'การประยุกต์ใช้อินเตอร์เน็ตและอินทราเน็ต', 3, 3.5, 2556, 'พิจารณา'),
(107, 13, 10, '01-220-001', 'จิตวิทยาทั่วไป', 3, 3.5, 2556, 'พิจารณา'),
(108, 13, 14, '01-320-101', 'ภาษาอังกฤษ 1', 3, 3.5, 2556, 'พิจารณา'),
(109, 13, 15, '01-320-102', 'ภาษาอังกฤษ 2', 3, 2.5, 2556, 'พิจารณา');

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
(55, 'admin2', 'admin2', 'admin'),
(60, '012345678901-2', '1234567890', 'student'),
(61, '012345678901-1', '98765432100', 'student'),
(62, '012345678901-3', '12345678901', 'student'),
(63, '012345678901-4', '12345678903', 'student'),
(66, '012345678901-7', '12345678905', 'student'),
(67, 'teacher01', 'teacher01', 'teacher'),
(68, 'teacher02', 'teacher02', 'teacher'),
(69, '012345678901-9', '123456789019', 'student'),
(70, '012345678901-8', '123456789018', 'student');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `student_detail`
--
ALTER TABLE `student_detail`
  MODIFY `Student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `Subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `Teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transfer_std`
--
ALTER TABLE `transfer_std`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

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
