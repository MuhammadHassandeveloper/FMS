-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2021 at 05:33 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `admin_replies`
--

CREATE TABLE `admin_replies` (
  `id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `reply` varchar(230) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_replies`
--

INSERT INTO `admin_replies` (`id`, `s_id`, `reply`) VALUES
(3, 2, 'yes boy'),
(4, 2, 'any query student'),
(5, 2, 'tell me in detail ');

-- --------------------------------------------------------

--
-- Table structure for table `challans`
--

CREATE TABLE `challans` (
  `id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `payment_type` varchar(200) NOT NULL,
  `name` varchar(300) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `semester` varchar(200) NOT NULL,
  `degree` varchar(300) NOT NULL,
  `course` varchar(200) NOT NULL,
  `subjects` varchar(300) NOT NULL,
  `reg_fee` varchar(33) NOT NULL,
  `sem_fee` varchar(33) NOT NULL,
  `payment_id` varchar(22) NOT NULL,
  `paying_amount` varchar(300) NOT NULL,
  `balance_transaction` varchar(200) NOT NULL,
  `total` varchar(33) NOT NULL,
  `status` varchar(33) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `fee_verified` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `challans`
--

INSERT INTO `challans` (`id`, `s_id`, `payment_type`, `name`, `fname`, `semester`, `degree`, `course`, `subjects`, `reg_fee`, `sem_fee`, `payment_id`, `paying_amount`, `balance_transaction`, `total`, `status`, `date`, `fee_verified`) VALUES
(9, 2, 'jazzcash', 'Mohsin Ali', 'Riaz', '1st Semester', 'BS Agriculture', 'bscs', 'math, computer introduction ,c++,Islamyaat', '12000', '300000', 'T20210618104755', '312000', '31200000', '31200000', 'success', '2021-06-18 05:48:37', 1),
(10, 4, 'jazzcash', 'asadullah', 'M Asghar', '8th Semester', 'BS CS', 'bscs', 'math, computer introduction ,c++,Islamyaat', '2300', '40000', 'T20210618112435', '42300', '4230000', '4230000', 'success', '2021-06-18 06:25:17', 1),
(11, 5, 'jazzcash', 'rehan', 'm arshad', '4th Semester', 'BS CS', 'bscs', 'math, computer introduction ,c++,Islamyaat', '3000', '12000', 'T20210618150322', '15000', '1500000', '1500000', 'success', '2021-06-18 10:04:04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `cours_id` int(11) NOT NULL,
  `course_name` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`cours_id`, `course_name`) VALUES
(2, 'bscs'),
(4, 'bs english'),
(5, 'bs physics'),
(7, 'bs software engeenring'),
(8, 'MBBS'),
(9, 'bs agriculture');

-- --------------------------------------------------------

--
-- Table structure for table `courses_details`
--

CREATE TABLE `courses_details` (
  `course_id` int(11) NOT NULL,
  `course` varchar(300) NOT NULL,
  `subjects` varchar(300) NOT NULL,
  `reg_fee` varchar(300) NOT NULL,
  `sem_fee` varchar(300) NOT NULL,
  `semester` varchar(200) NOT NULL,
  `file` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses_details`
--

INSERT INTO `courses_details` (`course_id`, `course`, `subjects`, `reg_fee`, `sem_fee`, `semester`, `file`) VALUES
(10, ' 2', 'math, computer introduction ,c++,Islamyaat', '12000', '300000', '1st Semester', 'Rivulet.docx'),
(12, ' 4', 'english introduction, computer introduction ,c,Islamyaat', '12000', '40000', '1st Semester', 'Rivulet.docx'),
(13, ' 8', 'biology,eng,math,islamyat,computer', '23000', '40000', '4th Semester', 'Rivulet.docx'),
(14, ' 8', ' bio, computer introduction ,c,Islamyaat', '2300', '45000', '1st Semester', 'Rivulet.docx'),
(15, ' 9', 'agri, computer introduction ,pak study,Islamyaat', '2000', '34000', '1st Semester', 'Rivulet.docx'),
(16, ' 2', 'math, computer introduction ,c++,Islamyaat', '2300', '40000', '8th Semester', 'Rivulet.docx'),
(17, ' 2', 'math, computer introduction ,c++,Islamyaat', '3000', '12000', '4th Semester', 'Rivulet.docx');

-- --------------------------------------------------------

--
-- Table structure for table `fines`
--

CREATE TABLE `fines` (
  `f_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `type` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fines`
--

INSERT INTO `fines` (`f_id`, `amount`, `type`) VALUES
(7, 366, 'card fine'),
(8, 500, 'general fine');

-- --------------------------------------------------------

--
-- Table structure for table `fine_challans`
--

CREATE TABLE `fine_challans` (
  `id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `fname` varchar(300) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `semester` varchar(200) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `payment_id` varchar(300) NOT NULL,
  `type` varchar(200) NOT NULL,
  `total` varchar(100) NOT NULL,
  `status` varchar(200) NOT NULL,
  `fine_verified` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fine_challans`
--

INSERT INTO `fine_challans` (`id`, `s_id`, `name`, `fname`, `phone`, `semester`, `amount`, `payment_id`, `type`, `total`, `status`, `fine_verified`) VALUES
(6, 5, 'rehan', 'm arshad', '03123456789', '4th Semester', '36600', 'T20210618162058', 'card fine', '366', 'success', 1);

-- --------------------------------------------------------

--
-- Table structure for table `results_attendance`
--

CREATE TABLE `results_attendance` (
  `r_id` int(11) NOT NULL,
  `cgpa` varchar(200) NOT NULL,
  `attendance` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `results_attendance`
--

INSERT INTO `results_attendance` (`r_id`, `cgpa`, `attendance`) VALUES
(3, '3.8', '73%'),
(4, '3.5', '63%'),
(5, '3.6', '37%');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `s_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `cnic` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(200) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `degree` varchar(200) NOT NULL,
  `image` varchar(300) NOT NULL,
  `verified` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`s_id`, `name`, `fname`, `phone`, `cnic`, `email`, `password`, `semester`, `degree`, `image`, `verified`) VALUES
(2, 'Mohsin Ali', 'Riaz', '03026944844', '345678098765', 'mohsincuisahiwal@gmail.com', '12345', '1st Semester', 'BS Agriculture', 'img.jpg', 1),
(4, 'asadullah', 'M Asghar', '03123456789', '123789098765', 'asadullah@gmail.com', '12345', '8th Semester', 'BS CS', 'img6.jpg', 1),
(5, 'rehan', 'm arshad', '03123456789', '123789', 'rehan@gmail.com', '12345', '4th Semester', 'BS CS', 'img7.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_courses`
--

CREATE TABLE `student_courses` (
  `id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `cours_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_courses`
--

INSERT INTO `student_courses` (`id`, `s_id`, `cours_id`) VALUES
(19, 1, 2),
(20, 2, 2),
(21, 4, 2),
(22, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `student_fines`
--

CREATE TABLE `student_fines` (
  `sf_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `f_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_fines`
--

INSERT INTO `student_fines` (`sf_id`, `s_id`, `f_id`) VALUES
(7, 1, 7),
(8, 2, 7),
(9, 5, 7);

-- --------------------------------------------------------

--
-- Table structure for table `student_msgs`
--

CREATE TABLE `student_msgs` (
  `msg_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_msgs`
--

INSERT INTO `student_msgs` (`msg_id`, `s_id`, `email`, `message`) VALUES
(2, 2, 'mohsincuisahiwal@gmail.com', 'hi admin i am bscs student '),
(3, 2, 'mohsincuisahiwal@gmail.com', 'i want to change fee payments');

-- --------------------------------------------------------

--
-- Table structure for table `student_results`
--

CREATE TABLE `student_results` (
  `id` int(11) NOT NULL,
  `s_id` int(20) NOT NULL,
  `result_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_results`
--

INSERT INTO `student_results` (`id`, `s_id`, `result_id`) VALUES
(13, 1, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `admin_replies`
--
ALTER TABLE `admin_replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `challans`
--
ALTER TABLE `challans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`cours_id`);

--
-- Indexes for table `courses_details`
--
ALTER TABLE `courses_details`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `fines`
--
ALTER TABLE `fines`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `fine_challans`
--
ALTER TABLE `fine_challans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results_attendance`
--
ALTER TABLE `results_attendance`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `student_courses`
--
ALTER TABLE `student_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_fines`
--
ALTER TABLE `student_fines`
  ADD PRIMARY KEY (`sf_id`);

--
-- Indexes for table `student_msgs`
--
ALTER TABLE `student_msgs`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `student_results`
--
ALTER TABLE `student_results`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_replies`
--
ALTER TABLE `admin_replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `challans`
--
ALTER TABLE `challans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `cours_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `courses_details`
--
ALTER TABLE `courses_details`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `fines`
--
ALTER TABLE `fines`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `fine_challans`
--
ALTER TABLE `fine_challans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `results_attendance`
--
ALTER TABLE `results_attendance`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student_courses`
--
ALTER TABLE `student_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `student_fines`
--
ALTER TABLE `student_fines`
  MODIFY `sf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `student_msgs`
--
ALTER TABLE `student_msgs`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_results`
--
ALTER TABLE `student_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
