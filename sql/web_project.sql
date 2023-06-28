-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2023 at 08:56 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `user_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `day` datetime DEFAULT current_timestamp(),
  `title` varchar(10) DEFAULT 'Present'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `user_id`, `day`, `title`) VALUES
(0000000001, 0000000031, '2022-05-14 09:20:33', 'Present'),
(0000000002, 0000000032, '2022-05-14 10:30:19', 'Present'),
(0000000003, 0000000031, '2022-05-18 09:24:45', 'Present'),
(0000000004, 0000000033, '2022-05-18 10:31:22', 'Present'),
(0000000005, 0000000031, '2022-06-14 09:40:42', 'Present'),
(0000000006, 0000000033, '2022-06-14 10:27:24', 'Present'),
(0000000007, 0000000031, '2022-06-18 09:24:47', 'Present'),
(0000000008, 0000000032, '2022-06-18 09:57:17', 'Present'),
(0000000009, 0000000031, '2022-06-28 09:40:43', 'Present'),
(0000000010, 0000000034, '2022-06-28 09:57:29', 'Present'),
(0000000011, 0000000031, '2022-07-08 09:40:45', 'Present'),
(0000000012, 0000000032, '2022-07-08 10:37:18', 'Present'),
(0000000013, 0000000031, '2022-07-15 09:40:44', 'Present'),
(0000000014, 0000000034, '2022-07-15 10:17:28', 'Present'),
(0000000015, 0000000031, '2022-08-12 09:40:47', 'Present'),
(0000000016, 0000000034, '2022-08-12 10:14:26', 'Present'),
(0000000017, 0000000031, '2022-08-13 09:40:47', 'Present'),
(0000000019, 0000000033, '2022-08-13 09:57:21', 'Present');

-- --------------------------------------------------------

--
-- Table structure for table `career`
--

CREATE TABLE `career` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `career`
--

INSERT INTO `career` (`id`, `title`) VALUES
(201, 'role1'),
(202, 'role2'),
(203, 'role3'),
(204, 'role4'),
(205, 'role5'),
(206, 'role6');

-- --------------------------------------------------------

--
-- Table structure for table `persons`
--

CREATE TABLE `persons` (
  `user_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `gender_id` int(11) NOT NULL,
  `dob` date NOT NULL,
  `career_id` int(11) NOT NULL,
  `salary_id` int(11) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `persons`
--

INSERT INTO `persons` (`user_id`, `firstname`, `lastname`, `gender_id`, `dob`, `career_id`, `salary_id`, `avatar`) VALUES
(0000000000, 'admin', 'admin', 101, '1999-02-02', 201, 301, NULL),
(0000000031, 'ปฏิภาณ', 'คุ้มกล่ำ', 101, '2002-01-16', 201, 301, '/project-web/member/avatars/470fec86d4f7a6da830e808ad9b2e667.jpg'),
(0000000032, 'ธิติภัทร', 'ดีเสมอ', 101, '1999-02-19', 202, 302, '/project-web/member/avatars/da649dc75aa620c03410d34bf62f8b54.jpg'),
(0000000033, 'กรกนก', 'ทิพย์พิทักษ์', 102, '2006-06-09', 203, 303, '/project-web/member/avatars/87595d17812d5d78c95bf8d8202d11e0.jpg'),
(0000000034, 'เอ็มม่า', 'วัตสัน', 102, '1990-04-15', 206, 306, '/project-web/member/avatars/8af2c17f4344fc7fdc19b80fab92ed99.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `refers`
--

CREATE TABLE `refers` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `refers`
--

INSERT INTO `refers` (`id`, `title`) VALUES
(101, 'Male'),
(102, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(11) NOT NULL,
  `salary` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `salary`) VALUES
(301, 'salary1'),
(302, 'salary2'),
(303, 'salary3'),
(304, 'salary4'),
(305, 'salary5'),
(306, 'salary6');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `ID` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `manager` int(10) UNSIGNED ZEROFILL NOT NULL,
  `member` int(10) UNSIGNED ZEROFILL NOT NULL,
  `started_date` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) NOT NULL DEFAULT 'Waiting'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`ID`, `title`, `description`, `manager`, `member`, `started_date`, `status`) VALUES
(11, 'เขียนบันทึกการประชุม', 'เขียนบันทึกการประชุม ณ วันที่ 14 พฤษภาคม พ.ศ. 2565', 0000000031, 0000000032, '2022-05-14', 'Complete'),
(12, 'ตรวจสอบเอกสาร PR ', 'ตรวจสอบความถูกต้องของรายการในเอกสาร PR และส่งมอบให้กับฝ่ายจัดซื้อ', 0000000031, 0000000033, '2022-05-18', 'Complete'),
(13, 'ส่งมอบ Requirements', 'ส่งมอบ  Requirements ที่ต้องการทั้งหมด จากบริษัท Localhost จำกัด ให้กับฝ่าย dev', 0000000031, 0000000034, '2022-06-28', 'Complete'),
(14, 'นัดหมายลูกค้า', 'นัดหมายลูกค้าและค้นหาร้านอาหารที่เหมาะสมแก่การพูดคุย', 0000000031, 0000000034, '2022-07-15', 'Pending'),
(15, 'ประชาสัมพันธ์กับพนักงานทุกคน', 'ประชาสัมพันธ์เรื่อง วันหยุดพิเศษให้กับพนักงานทุกคนในองค์กร', 0000000031, 0000000034, '2023-08-12', 'Waiting'),
(16, 'ทำ powerpoint สำหรับนำเสนอ', 'ทำ powerpoint สำหรับนำเสนอ ตัวอย่างงานที่จะส่งมอบให้แก่บริษัท Php จำกัด', 0000000031, 0000000032, '2022-06-18', 'Pending'),
(17, 'เขียนอีเมลล์ส่งให้กับบริษัท Docker', 'เขียนอีเมลล์ส่งให้กับบริษัท Docker เรื่อง configurations', 0000000031, 0000000032, '2022-07-11', 'Waiting'),
(18, 'สอบถามความคืบหน้า', 'ตรวจสอบความคืบหน้าของงานจากบริษัท ความอดทนมี จำกัด ', 0000000031, 0000000033, '2022-08-13', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(100) DEFAULT 'employee',
  `user_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `role`, `user_id`, `created_at`) VALUES
(26, 'Admin', 'admin', '$2y$10$I2ywGHBFt./4lwwJSmEwoePY4GjiXLpr0h4zXj0VdCoZKyoX7fu5a', 'admin', 0000000000, '2022-05-26 21:04:04'),
(27, 'ปฏิภาณ', 'manager', '$2y$10$DesMk37FPlTO7Q72iK0Ye.OWSiR9y128vWT.NJ7j74P3XfU.k0y.y', 'manager', 0000000031, '2023-04-20 10:20:43'),
(28, 'ธิติภัทร', 'member1', '$2y$10$GWjdEtB.Yz.UUMCriNC0Wu3dqs6Z7A6EjWEpWv3RkDVf03QFjZ4l6', 'employee', 0000000032, '2023-06-28 21:59:12'),
(29, 'กรกนก ทิพย์พิทักษ์', 'member2', '$2y$10$1yNDaBkMTh5eVtNi9g/ncOw8oLHiDcWDa7ZHkh6pRLhNG8cKyP5/W', 'employee', 0000000033, '2023-06-28 22:02:22'),
(30, 'เอ็มม่า วัตสัน', 'member3', '$2y$10$swyWUIp.CBs3Bi.xq36NNuJkoFCbYf0ka99L2ypfVmXdiqEIZM/ze', 'employee', 0000000034, '2023-06-28 22:02:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `career`
--
ALTER TABLE `career`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `persons`
--
ALTER TABLE `persons`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `refers`
--
ALTER TABLE `refers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `member` (`member`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_ibfk_1` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `persons`
--
ALTER TABLE `persons`
  MODIFY `user_id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`member`) REFERENCES `persons` (`user_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `persons` (`user_id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
