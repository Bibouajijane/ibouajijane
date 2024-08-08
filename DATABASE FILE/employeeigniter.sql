-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2021 at 07:39 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employeeigniter`
--

-- --------------------------------------------------------

--
-- Table structure for table `country_tbl`
--

CREATE TABLE `country_tbl` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country_tbl`
--

INSERT INTO `country_tbl` (`id`, `country_code`, `country_name`) VALUES
(1, 'AF', 'Payement Un-Complete'),
(2, 'AL', 'Payement Complete');

-- --------------------------------------------------------

--
-- Table structure for table `department_tbl`
--

CREATE TABLE `department_tbl` (
  `id` int(11) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department_tbl`
--

INSERT INTO `department_tbl` (`id`, `department_name`, `added_on`) VALUES
(1, 'Human Resources', '2021-05-27 15:34:10'),
(2, 'Back-End Development', '2021-05-27 15:22:55'),
(3, 'Designing', '2019-10-04 05:25:15'),
(4, 'Front-End Development', '2021-05-27 13:53:48'),
(5, 'Marketing', '2021-05-27 16:48:45'),
(6, 'Finance', '2021-05-27 17:27:43');

-- --------------------------------------------------------

--
-- Table structure for table `leave_tbl`
--

CREATE TABLE `leave_tbl` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `leave_reason` varchar(90) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `leave_from` date NOT NULL,
  `leave_to` date NOT NULL,
  `updated_on` date NOT NULL,
  `applied_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_tbl`
--

INSERT INTO `leave_tbl` (`id`, `staff_id`, `leave_reason`, `description`, `status`, `leave_from`, `leave_to`, `updated_on`, `applied_on`) VALUES
(1, 2, 'Sick', 'Not feeling well enough to join', 1, '2021-01-15', '2021-01-17', '0000-00-00', '2021-01-15'),
(2, 5, 'Casual Leave', 'been working for full hours since last month, got to free my mind for few days', 1, '2021-05-28', '2021-05-29', '0000-00-00', '2021-05-27'),
(3, 6, 'Day Off', 'Requesting for a day off as I need to join my pal\'s wedding!', 1, '2021-05-28', '2021-05-29', '0000-00-00', '2021-05-27'),
(4, 3, 'Casual Leave', 'for vacation, rest, and family events', 2, '2021-05-30', '2021-06-06', '0000-00-00', '2021-05-27'),
(5, 9, 'Quarantine', 'i need to quarantine myself for few weeks as i got some symptoms of covid-19', 1, '2021-05-28', '2021-06-11', '0000-00-00', '2021-05-27');

-- --------------------------------------------------------

--
-- Table structure for table `login_tbl`
--

CREATE TABLE `login_tbl` (
  `id` int(11) NOT NULL,
  `username` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL,
  `usertype` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_tbl`
--

INSERT INTO `login_tbl` (`id`, `username`, `password`, `usertype`, `status`) VALUES
(1, 'admin', 'password0101', 1, 1),
(2, 'steven@gmail.com', '7444440001', 2, 1),
(3, 'tatiana@gmail.com', '7402222220', 2, 1),
(4, 'christine@gmail.com', '8888877777', 2, 1),
(5, 'liam@gmail.com', '7410233333', 2, 1),
(6, 'barnes@gmail.com', '1010101010', 2, 1),
(7, 'samuel@gmail.com', '7410000010', 2, 1),
(8, 'markh@gmail.com', '7070707069', 2, 1),
(9, 'angela@gmail.com', '7417417417', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `salary_tbl`
--

CREATE TABLE `salary_tbl` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `email` bigint(20) NOT NULL,
  `basic_salary` bigint(20) NOT NULL,
  
  `total` bigint(20) NOT NULL,
  `added_by` int(11) NOT NULL,
  `updated_on` date NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary_tbl`
--



-- --------------------------------------------------------

--
-- Table structure for table `staff_tbl`
--

CREATE TABLE `staff_tbl` (
  `id` int(11) NOT NULL,
  `staff_name` varchar(150) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(150) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `dob` date NOT NULL,
  `doj` date NOT NULL,
  `address` text,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(50) NOT NULL,
  `department_id` int(11) NOT NULL,
  `pic` varchar(150) NOT NULL DEFAULT 'default-pic.jpg',
  `added_by` int(11) NOT NULL,
  `updated_on` date NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_tbl`
--

INSERT INTO `staff_tbl` (`id`, `staff_name`, `gender`, `email`, `mobile`, `dob`, `doj`, `address`, `city`, `state`, `country`, `department_id`, `pic`, `added_by`, `updated_on`, `added_on`) VALUES
(2, 'Steven Askew', 'Male', 'steven@gmail.com', 7444440001, '1990-02-18', '2020-11-27', '3721  Hill Croft Farm Road', 'BURLINGTON', 'MI', 'United States', 1, 'smportrait.jpg', 0, '0000-00-00', '2021-05-27 15:37:03'),
(3, 'Tatiana Breit', 'Female', 'tatiana@gmail.com', 7402222220, '1994-10-14', '2021-02-21', '3397  Happy Hollow Road', 'Jacksonville', 'NC', 'United States', 2, 'prtwm.jpg', 0, '0000-00-00', '2021-05-27 15:37:16'),
(4, 'Christine Moore', 'Female', 'christine@gmail.com', 8888877777, '1994-08-01', '2020-01-15', '4047  Timbercrest Road', 'Anchorage', 'AK', 'United States', 3, 'christen-freeimg.jpg', 0, '0000-00-00', '2021-05-27 15:31:20'),
(5, 'Liam Moore', 'Male', 'liam@gmail.com', 7410233333, '1994-12-02', '2021-04-04', '3474  Viking Drive', 'Worthington', 'OH', 'United States', 4, '7002489_preview.jpg', 1, '0000-00-00', '2021-05-27 13:55:22'),
(6, 'George J Barnes', 'Male', 'barnes@gmail.com', 1010101010, '1988-02-03', '2021-01-13', '3079  Chardonnay Drive', 'Ocala', 'FL', 'United States', 2, 'skport.jpg', 1, '0000-00-00', '2021-05-27 15:28:48'),
(7, 'Samuel Huntsman', 'Male', 'samuel@gmail.com', 7410000010, '1991-12-28', '2021-04-25', '2315  Cherry Tree Drive', 'Jacksonville', 'FL', 'United States', 5, 'dportrait.jpg', 1, '0000-00-00', '2021-05-27 16:52:18'),
(8, 'Mark Heiden', 'Male', 'markh@gmail.com', 7070707069, '1990-02-12', '2021-02-04', '2190  Laurel Lane', 'Midland', 'TX', 'United States', 2, 'pauptr.jpg', 1, '0000-00-00', '2021-05-27 16:53:57'),
(9, 'Angela Bridges', 'Female', 'angela@gmail.com', 7417417417, '1992-02-11', '2021-03-05', '3538 Melville Street', 'Jackson', 'TN', 'United States', 6, 'sm-freeimg.jpg', 1, '0000-00-00', '2021-05-27 17:29:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `country_tbl`
--
ALTER TABLE `country_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department_tbl`
--
ALTER TABLE `department_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_tbl`
--
ALTER TABLE `leave_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_tbl`
--
ALTER TABLE `login_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary_tbl`
--
ALTER TABLE `salary_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_tbl`
--
ALTER TABLE `staff_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `country_tbl`
--
ALTER TABLE `country_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;
--
-- AUTO_INCREMENT for table `department_tbl`
--
ALTER TABLE `department_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `leave_tbl`
--
ALTER TABLE `leave_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `login_tbl`
--
ALTER TABLE `login_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `salary_tbl`
--
ALTER TABLE `salary_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `staff_tbl`
--
ALTER TABLE `staff_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;