-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2024 at 08:31 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_feedback_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `assistant_register`
--

CREATE TABLE `assistant_register` (
  `id` int(50) NOT NULL,
  `First_Name` varchar(100) NOT NULL,
  `Last_Name` varchar(100) NOT NULL,
  `User_Name` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assistant_register`
--

INSERT INTO `assistant_register` (`id`, `First_Name`, `Last_Name`, `User_Name`, `Password`) VALUES
(1, 'john', 'smith', 'johnsmith', 'john123'),
(2, 'robert', 'brown', 'robertbrown', 'robert123');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `Course_Id` varchar(50) NOT NULL,
  `Course_Name` varchar(200) NOT NULL,
  `Course_Code` varchar(50) NOT NULL,
  `Department` varchar(50) NOT NULL,
  `Credits` enum('credit 02','credit 03','credit 04') NOT NULL,
  `Semester` enum('1st Semester','2nd Semester','3rd Semester','4th Semester','5th Semester','6th Semester','7th Semester','8th Semester') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`Course_Id`, `Course_Name`, `Course_Code`, `Department`, `Credits`, `Semester`) VALUES
('C001', 'Applied Electricity', 'EC1020', 'Computer Department', 'credit 03', '1st Semester'),
('C002', 'Engineering Metrology', 'ID1021', 'Civil Department', 'credit 03', '1st Semester'),
('C003', 'Engineering Drawing', 'ID1010', 'Mechanical Department', 'credit 03', '1st Semester'),
('C004', 'Mathematics', 'MC1020', 'Computer Department', 'credit 03', '1st Semester'),
('C005', 'Computing', 'EC1011', 'Computer Department', 'credit 03', '1st Semester'),
('C006', 'Material Science', 'ID2020', 'Civil Department', 'credit 03', '2nd Semester'),
('C007', 'Linear Algebra', 'MC2020', 'Computer Department', 'credit 02', '2nd Semester'),
('C008', 'Computer Programming', 'EC2010', 'Computer Department', 'credit 03', '2nd Semester'),
('C009', 'Thermodynamics', 'MP2010', 'Mechanical Department', 'credit 03', '2nd Semester'),
('C010', 'Software Construction', 'EC5080', 'Computer Department', 'credit 03', '5th Semester');

-- --------------------------------------------------------

--
-- Table structure for table `course_feedback`
--

CREATE TABLE `course_feedback` (
  `Id` int(50) NOT NULL,
  `User_Name` varchar(100) NOT NULL,
  `Lecture_Name` varchar(100) NOT NULL,
  `Semester` enum('1st semester','2nd semester','3rd semester','4th semester','5th semester','6th semester','7th semester','8th semester') NOT NULL,
  `Course_Name` varchar(200) NOT NULL,
  `Course_Code` varchar(50) NOT NULL,
  `A_1` enum('-2','-1','0','1','2') NOT NULL,
  `A_2` enum('-2','-1','0','1','2') NOT NULL,
  `A_3` enum('-2','-1','0','1','2') NOT NULL,
  `B_1` enum('-2','-1','0','1','2') NOT NULL,
  `B_2` enum('-2','-1','0','1','2') NOT NULL,
  `B_3` enum('-2','-1','0','1','2') NOT NULL,
  `C_1` enum('-2','-1','0','1','2') NOT NULL,
  `C_2` enum('-2','-1','0','1','2') NOT NULL,
  `D_1` enum('-2','-1','0','1','2') NOT NULL,
  `D_2` enum('-2','-1','0','1','2') NOT NULL,
  `D_3` enum('-2','-1','0','1','2') NOT NULL,
  `E_1` enum('-2','-1','0','1','2') NOT NULL,
  `E_2` enum('-2','-1','0','1','2') NOT NULL,
  `E_3` enum('-2','-1','0','1','2') NOT NULL,
  `E_4` enum('-2','-1','0','1','2') NOT NULL,
  `Other_Comment` varchar(1000) DEFAULT NULL,
  `Date_Time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_feedback`
--

INSERT INTO `course_feedback` (`Id`, `User_Name`, `Lecture_Name`, `Semester`, `Course_Name`, `Course_Code`, `A_1`, `A_2`, `A_3`, `B_1`, `B_2`, `B_3`, `C_1`, `C_2`, `D_1`, `D_2`, `D_3`, `E_1`, `E_2`, `E_3`, `E_4`, `Other_Comment`, `Date_Time`) VALUES
(1, 'emmajohnson', 'james thomas', '1st semester', 'Computer Programming', 'EC2010', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 'good', '2024-06-13 15:31:00'),
(2, 'emmajohnson', 'jeff bezon', '1st semester', 'Engineering Drawing', 'ID1010', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '2', '2', '1', '2', '2', 'abcd', '2024-06-13 15:33:00'),
(3, 'oliviasmith', 'james thomas', '1st semester', 'Computer Programming', 'EC2010', '0', '0', '1', '1', '1', '2', '1', '1', '1', '1', '1', '1', '1', '1', '1', 'aassdsdsdaasa qwwsss', '2024-06-13 16:49:00'),
(5, 'oliviasmith', 'jeff bezon', '1st semester', 'Engineering Drawing', 'ID1010', '0', '0', '1', '1', '2', '1', '1', '1', '1', '1', '0', '2', '1', '1', '1', '1234 gfggf ggfdfcvvb', '2024-06-13 16:56:00'),
(7, 'emmajohnson', 'david martinez', '1st semester', 'Applied Electricity', 'EC1020', '-2', '0', '-1', '-1', '-1', '1', '0', '0', '1', '-2', '0', '0', '0', '-1', '-1', 'Ilike lecturemethod', '2024-06-21 12:14:00'),
(10, 'didula13', 'david martinez', '1st semester', 'Applied Electricity', 'EC1020', '-1', '-2', '-1', '2', '1', '2', '0', '2', '1', '0', '1', '0', '1', '2', '2', 'I like your study method. ', '2024-06-30 23:26:00'),
(11, 'didula13', 'jeff bezon', '2nd semester', 'Mathematics', 'MC1020', '2', '2', '2', '1', '1', '1', '1', '1', '2', '2', '2', '2', '2', '2', '2', 'you teach many tricks to understand the lessons ', '2024-07-02 00:09:00');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `Feedback_No` varchar(50) NOT NULL,
  `Management_ID` varchar(50) NOT NULL,
  `Course_ID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lecture`
--

CREATE TABLE `lecture` (
  `Lecture_Id` varchar(50) NOT NULL,
  `User_Name` varchar(100) NOT NULL,
  `Password` varchar(15) NOT NULL,
  `First_Name` varchar(100) NOT NULL,
  `Last_Name` varchar(100) NOT NULL,
  `Department` enum('Computer Department','Electrical & Electronic Department','Mechanical Department','Civil Department') NOT NULL,
  `Course` varchar(50) NOT NULL,
  `Outlook_Address` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lecture`
--

INSERT INTO `lecture` (`Lecture_Id`, `User_Name`, `Password`, `First_Name`, `Last_Name`, `Department`, `Course`, `Outlook_Address`) VALUES
('L001', 'davidmartinez', 'david123', 'david', 'martinez', 'Computer Department', 'Computer Network , Signal & System', 'davidmartinez@gmail.com'),
('L002', 'sarahanderson', 'sarah123', 'sarah', 'anderson', 'Electrical & Electronic Department', 'Signal & System', 'sarahanderson@gmail.com'),
('L003', 'jamesthomas', 'james123', 'james', 'thomas', 'Mechanical Department', 'Engineering Drawing', 'jamesthomas@gmail.com'),
('L004', 'laurajackson', 'laura123', 'laura ', 'jackson', 'Civil Department', 'Environmental Pollution and Control', 'laurajackson@gmail.com'),
('L005', 'thomaslincoln', 'thomas123', 'thomas', 'lincoln', 'Electrical & Electronic Department', 'Applied Electricity', 'thomaslincoln@gmail.com'),
('L006', 'johnkennedy', 'john123', 'john', 'kennedy', 'Mechanical Department', 'Thermodynamics', 'johnkennedy@gmail.com'),
('L007', 'jeffbezon', 'jeff123', 'jeff', 'bezon', 'Computer Department', 'Computer Programming', 'jeffbezon1@gmail.com'),
('L008', 'kaveeshagimhan', 'kaveesha123', 'kaveesha', 'gimhan', 'Computer Department', 'Computer Programming', 'kaveesha@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `lecture_course`
--

CREATE TABLE `lecture_course` (
  `Lecture_ID` varchar(50) NOT NULL,
  `Course_ID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lecture_feedback`
--

CREATE TABLE `lecture_feedback` (
  `Id` int(50) NOT NULL,
  `Semester` enum('1st semester','2nd semester','3rd semester','4th semester','5th semester','6th semester','7th semester','8th semester') NOT NULL,
  `User_Name` varchar(100) NOT NULL,
  `Lecture_Name` varchar(250) NOT NULL,
  `Course_Code` varchar(200) NOT NULL,
  `A_1` enum('-2','-1','0','1','2') NOT NULL,
  `A_2` enum('-2','-1','0','1','2') NOT NULL,
  `A_3` enum('-2','-1','0','1','2') NOT NULL,
  `B_1` enum('-2','-1','0','1','2') NOT NULL,
  `B_2` enum('-2','-1','0','1','2') NOT NULL,
  `B_3` enum('-2','-1','0','1','2') NOT NULL,
  `C_1` enum('-2','-1','0','1','2') NOT NULL,
  `C_2` enum('-2','-1','0','1','2') NOT NULL,
  `C_3` enum('-2','-1','0','1','2') NOT NULL,
  `C_4` enum('-2','-1','0','1','2') NOT NULL,
  `D_1` enum('-2','-1','0','1','2') NOT NULL,
  `D_2` enum('-2','-1','0','1','2') NOT NULL,
  `Other_Comment` varchar(1000) DEFAULT NULL,
  `Date_Time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lecture_feedback`
--

INSERT INTO `lecture_feedback` (`Id`, `Semester`, `User_Name`, `Lecture_Name`, `Course_Code`, `A_1`, `A_2`, `A_3`, `B_1`, `B_2`, `B_3`, `C_1`, `C_2`, `C_3`, `C_4`, `D_1`, `D_2`, `Other_Comment`, `Date_Time`) VALUES
(1, '1st semester', 'emmajohnson', 'james thomas', 'EC2010-Computer Programming', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '2', '2', 'ok', '2024-06-13 10:08:00'),
(2, '1st semester', 'emmajohnson', 'jeff bezon', 'ID1010-Engineering Drawing', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '1', '2', 'abcd  qerrfff', '2024-06-13 10:09:00'),
(3, '1st semester', 'oliviasmith', 'james thomas', 'EC2010-Computer Programming', '-1', '0', '1', '1', '1', '0', '0', '1', '1', '1', '1', '2', 'asdf vhjjn weec', '2024-06-13 11:29:00'),
(4, '1st semester', 'oliviasmith', 'jeff bezon', 'ID1010-Engineering Drawing', '-1', '0', '1', '1', '1', '1', '1', '2', '1', '2', '1', '1', '1234  bass ', '2024-06-13 11:30:00'),
(8, '1st semester', 'damath11', 'james thomas', 'EC1020-Applied Electricity', '-2', '-1', '0', '1', '-1', '2', '1', '0', '-1', '-2', '-1', '1', 'I like your study method. ', '2024-06-21 12:38:00'),
(9, '1st semester', 'didula13', 'kaveesha gimhan', 'EC1020-Applied Electricity', '1', '1', '1', '1', '1', '2', '1', '1', '1', '1', '1', '1', 'I like your study method. ', '2024-06-30 18:07:00'),
(10, '2nd semester', 'didula13', 'jeff bezon', 'MC1020-Mathematics', '1', '2', '1', '1', '2', '1', '1', '2', '1', '2', '1', '2', 'good adviser to the students', '2024-07-01 18:44:00');

-- --------------------------------------------------------

--
-- Table structure for table `lecture_register`
--

CREATE TABLE `lecture_register` (
  `id` int(50) NOT NULL,
  `First_Name` varchar(100) NOT NULL,
  `Last_Name` varchar(100) NOT NULL,
  `User_Name` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lecture_register`
--

INSERT INTO `lecture_register` (`id`, `First_Name`, `Last_Name`, `User_Name`, `Password`) VALUES
(1, 'jeff', 'bezon', 'jeffbezon', 'jeff123'),
(2, 'kaveesha', 'gimhan', 'kaveeshagimhan', 'kaveesha123');

-- --------------------------------------------------------

--
-- Table structure for table `management_assistant`
--

CREATE TABLE `management_assistant` (
  `Id` varchar(50) NOT NULL,
  `User_Name` varchar(100) NOT NULL,
  `Password` varchar(15) NOT NULL,
  `First_Name` varchar(100) NOT NULL,
  `Last_Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `management_assistant`
--

INSERT INTO `management_assistant` (`Id`, `User_Name`, `Password`, `First_Name`, `Last_Name`) VALUES
('M001', 'johnsmith', 'john123', 'john', 'smith'),
('M002', 'janedoe', '6789', 'jane', 'doe'),
('M003', 'michaeljohnson', 'michael123', 'michael', 'johnson'),
('M004', 'emilydavis', 'emily123', 'emily', 'davis'),
('M005', 'robertbrown', 'robert123', 'robert', 'brown');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Id` varchar(50) NOT NULL,
  `User_Name` varchar(100) NOT NULL,
  `Password` varchar(15) NOT NULL,
  `First_Name` varchar(100) NOT NULL,
  `Last_Name` varchar(100) NOT NULL,
  `Registration_No` varchar(50) NOT NULL,
  `Date_of_Birth` date NOT NULL,
  `Address` varchar(250) NOT NULL,
  `Batch` varchar(10) NOT NULL,
  `Academic_Year` enum('1st Year','2nd Year','3rd Year','4th Year') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Id`, `User_Name`, `Password`, `First_Name`, `Last_Name`, `Registration_No`, `Date_of_Birth`, `Address`, `Batch`, `Academic_Year`) VALUES
('S001', 'emmajohnson', 'emma123', 'emma', 'johnson', '2019/E/001', '1997-02-03', 'New York City, New York', '7 batch', '3rd Year'),
('S002', 'oliviasmith', 'olivia123', 'olivia', 'smith', '2019/E/002', '1998-03-23', 'Los Angeles, California', '7 batch', '3rd Year'),
('S003', 'noahwillams', 'noah123', 'noah ', 'williams', '2018/E/023', '1997-08-12', 'Chicago, Illinois', '6 batch', '1st Year'),
('S004', 'liambrown', 'liam123', 'liam', 'brown', '2020/E/001', '1999-09-04', 'Houston, Texas', '8 batch', '2nd Year'),
('S005', 'avajones', 'ava123', 'ava', 'jones', '2020/E/002', '2000-09-12', 'Houston, Texas', '8 batch', '2nd Year'),
('S006', 'sophiamiller', 'sophia123', 'sophia', 'miller', '2020/E/003', '2002-01-12', 'Philadelphia, Pennsylvania', '8 batch', '2nd Year'),
('S007', 'isabelladavis', 'isabella123', 'isabella', 'davis', '2021/E/001', '2000-09-12', 'San Antonio, Texas', '9 batch', '1st Year'),
('S008', 'masongarcia', 'mason123', 'mason', 'garcia', '2021/E/002', '1999-12-30', 'New York City, New York', '9 batch', '1st Year'),
('S009', 'lucasmartin', 'lucas123', 'lucas', 'martin', '2021/E/003', '2001-02-12', 'San Antonio, Texas', '9 batch', '1st Year'),
('S011', 'kaveeshagimhan', 'kaveesha567', 'kaveesha', 'gimhan', '2021/E/159', '2001-07-20', 'San Antonio, Texas', '7 batch', '3rd Year'),
('S012', 'damath11', 'damath123', 'damath', 'sasadara', '2021/E/157', '1999-11-24', 'Los Angeles, California', '9 batch', '4th Year');

-- --------------------------------------------------------

--
-- Table structure for table `student_course`
--

CREATE TABLE `student_course` (
  `Student_ID` varchar(50) NOT NULL,
  `Course_ID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_lecture`
--

CREATE TABLE `student_lecture` (
  `Student_ID` varchar(50) NOT NULL,
  `Lecture_ID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_register`
--

CREATE TABLE `student_register` (
  `id` int(50) NOT NULL,
  `First_Name` varchar(100) NOT NULL,
  `Last_Name` varchar(100) NOT NULL,
  `User_Name` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_register`
--

INSERT INTO `student_register` (`id`, `First_Name`, `Last_Name`, `User_Name`, `Password`) VALUES
(1, 'emma', 'johnson', 'emmajohnson', 'emma123'),
(2, 'olivia', 'smith', 'oliviasmith', 'olivia123'),
(3, 'noah', 'williams', 'noahwillams', 'noah123'),
(5, 'kaveesha', 'gimhan', 'kaveeshagimhan', 'kaveesha567'),
(11, 'damath', 'sasadara', 'damath11', 'damath123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assistant_register`
--
ALTER TABLE `assistant_register`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `User_Name` (`User_Name`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`Course_Id`),
  ADD UNIQUE KEY `Course_Code` (`Course_Code`);

--
-- Indexes for table `course_feedback`
--
ALTER TABLE `course_feedback`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`Feedback_No`);

--
-- Indexes for table `lecture`
--
ALTER TABLE `lecture`
  ADD PRIMARY KEY (`Lecture_Id`),
  ADD UNIQUE KEY `Outlook_Address` (`Outlook_Address`),
  ADD UNIQUE KEY `User_Name` (`User_Name`);

--
-- Indexes for table `lecture_course`
--
ALTER TABLE `lecture_course`
  ADD PRIMARY KEY (`Lecture_ID`,`Course_ID`);

--
-- Indexes for table `lecture_feedback`
--
ALTER TABLE `lecture_feedback`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `lecture_register`
--
ALTER TABLE `lecture_register`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `User_Name` (`User_Name`);

--
-- Indexes for table `management_assistant`
--
ALTER TABLE `management_assistant`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `User_Name` (`User_Name`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `User_Name` (`User_Name`),
  ADD UNIQUE KEY `Registration_No` (`Registration_No`);

--
-- Indexes for table `student_course`
--
ALTER TABLE `student_course`
  ADD PRIMARY KEY (`Student_ID`,`Course_ID`);

--
-- Indexes for table `student_lecture`
--
ALTER TABLE `student_lecture`
  ADD PRIMARY KEY (`Student_ID`,`Lecture_ID`);

--
-- Indexes for table `student_register`
--
ALTER TABLE `student_register`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `User_Name` (`User_Name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assistant_register`
--
ALTER TABLE `assistant_register`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `course_feedback`
--
ALTER TABLE `course_feedback`
  MODIFY `Id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `lecture_feedback`
--
ALTER TABLE `lecture_feedback`
  MODIFY `Id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `lecture_register`
--
ALTER TABLE `lecture_register`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student_register`
--
ALTER TABLE `student_register`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
