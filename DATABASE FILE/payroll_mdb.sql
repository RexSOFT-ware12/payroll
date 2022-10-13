-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2022 at 04:50 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `payroll_mdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `wy_admin`
--

CREATE TABLE `wy_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_code` varchar(255) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wy_admin`
--

INSERT INTO `wy_admin` (`admin_id`, `admin_code`, `admin_name`, `admin_email`, `admin_password`, `admin_time`) VALUES
(1, 'Rex', 'Admin', 'admin@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2019-04-18 02:22:37');

-- --------------------------------------------------------

--
-- Table structure for table `wy_attendance`
--

CREATE TABLE `wy_attendance` (
  `attendance_id` int(11) NOT NULL,
  `emp_code` varchar(255) NOT NULL,
  `attendance_date` date NOT NULL,
  `action_name` enum('punchin','punchout') NOT NULL,
  `action_time` time NOT NULL,
  `emp_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wy_detected_faces`
--

CREATE TABLE `wy_detected_faces` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_time` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `wy_employees`
--

CREATE TABLE `wy_employees` (
  `emp_id` int(11) NOT NULL,
  `emp_code` varchar(255) NOT NULL,
  `emp_password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `gender` enum('male','female') NOT NULL DEFAULT 'male',
  `merital_status` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `address` longtext NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `identity_doc` varchar(255) NOT NULL,
  `identity_no` varchar(255) NOT NULL,
  `emp_type` varchar(255) NOT NULL,
  `joining_date` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `account_no` varchar(255) NOT NULL,
  `status` varchar(25) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wy_employees`
--

INSERT INTO `wy_employees` (`emp_id`, `emp_code`, `emp_password`, `first_name`, `last_name`, `dob`, `gender`, `merital_status`, `nationality`, `address`, `city`, `state`, `country`, `email`, `mobile`, `telephone`, `identity_doc`, `identity_no`, `emp_type`, `joining_date`, `photo`, `department`, `bank_name`, `account_no`, `status`, `created`) VALUES
(33, 'UENR-02', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'micheal', 'Gyamfi', '09/08/2022', 'male', 'Single', 'Ghanian', 'Aboadze Rd', 'Sekondi', 'Acrra', 'Ghana', 'Ps 21', '0245496063', 'Not Approved', 'SSNIT Card', '29034523435553', 'Part-time employee', '10/07/2022', 'UENR-02.png', '', '', '', '', '2022-10-01 18:43:41'),
(32, 'UENR-01', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Rexton', 'Itsiah', '09/22/2022', 'male', 'Married', 'Ghanian', 'Aboadze Rd', 'Sekondi', 'tg', 'Ghana', 'Ps 20', '0245496063', 'Not Approved', 'Voter Id', '1788112273', 'Intern', '01/29/2019', 'UENR-01.png', '', '', '', '', '2022-10-01 18:24:10'),
(34, 'UENR-03', 'b9add70531519c256186579d20bc7cec509b4bd3', 'gideon', 'yeboah', '10/18/2022', 'male', 'Single', 'Ghanian', 'techiman', 'techiman', 'Acrra', 'Ghana', 'Ps 12', '0594561424', 'Approved', 'Voter Id', '35353535', 'Part-time employee', '10/17/2022', 'UENR-03.jpeg', '', '', '', '', '2022-10-03 07:33:24');

-- --------------------------------------------------------

--
-- Table structure for table `wy_help`
--

CREATE TABLE `wy_help` (
  `help_id` int(11) NOT NULL,
  `help_title` varchar(25) NOT NULL,
  `help_desc` varchar(255) NOT NULL,
  `help_date` varchar(25) NOT NULL,
  `help_anwser` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wy_help`
--

INSERT INTO `wy_help` (`help_id`, `help_title`, `help_desc`, `help_date`, `help_anwser`) VALUES
(1, 'About the Travelling', 'sdddffffsdwdedfd', '09/14/2022', 'u'),
(2, 'sddfd', 'ewedfddeewssdfhhy', '09/12/2022', 'sssddrggyhyujiooijh'),
(3, 'sddfdgfgftrgf', 'hgtrgfgtrtgrf', '09/05/2022', 'fgdtrdffcxdrdgftrgdfy');

-- --------------------------------------------------------

--
-- Table structure for table `wy_holidays`
--

CREATE TABLE `wy_holidays` (
  `holiday_id` int(11) NOT NULL,
  `holiday_title` varchar(255) NOT NULL,
  `holiday_desc` varchar(255) NOT NULL,
  `holiday_date` varchar(50) NOT NULL,
  `holiday_type` enum('compulsory','restricted') NOT NULL DEFAULT 'compulsory'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wy_holidays`
--

INSERT INTO `wy_holidays` (`holiday_id`, `holiday_title`, `holiday_desc`, `holiday_date`, `holiday_type`) VALUES
(2, 'Thanksgiving Day', 'Thanksgiving Day 2020', '11/26/2020', 'restricted'),
(9, 'Independence Day', 'Independence Day 2020', '08/15/2020', 'compulsory'),
(16, 'Memorial Day', 'Memorial Day 2020', '05/25/2020', 'restricted'),
(17, 'Martin Luther King, Jr. Birthday', 'Martin Luther King, Jr. Birthday 2020', '01/20/2020', 'compulsory'),
(18, 'Christmas Day', 'Christmas Day 2020', '12/25/2020', 'compulsory'),
(21, 'New Year', 'New Year 2021', '01/01/2021', 'compulsory');

-- --------------------------------------------------------

--
-- Table structure for table `wy_leaves`
--

CREATE TABLE `wy_leaves` (
  `leave_id` int(11) NOT NULL,
  `emp_code` varchar(255) NOT NULL,
  `leave_subject` varchar(255) NOT NULL,
  `leave_dates` varchar(255) NOT NULL,
  `leave_message` longtext NOT NULL,
  `leave_type` varchar(255) NOT NULL,
  `leave_status` enum('pending','approve','reject') NOT NULL DEFAULT 'pending',
  `apply_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wy_leaves`
--

INSERT INTO `wy_leaves` (`leave_id`, `emp_code`, `leave_subject`, `leave_dates`, `leave_message`, `leave_type`, `leave_status`, `apply_date`) VALUES
(1, 'WY01', 'Requesting for leave days', '04/13/2021', 'this is a demo leave message', 'Sick Leave', 'approve', '2021-04-13 10:09:02'),
(3, 'WY03', 'Leave for 2 days', '04/15/2021,04/17/2021', 'Dear admin, i\'d like to apply leave for 2 days as i\'ve been a regular employee since my first day at office. And now, i finally got to rest and spend some time with my family too!', 'Casual Leave', 'reject', '2021-04-14 15:47:06'),
(4, 'WY05', 'Leave for a week', '04/15/2021,04/23/2021', 'i wont be able to join office as i\'ve been suffering from a rough common cold and fever. so, i\'d like to request a leave for week', 'Sick Leave', 'approve', '2021-04-14 19:15:11'),
(5, 'UENR-06', 'sick', '03/07/2034', 'am sick', 'Sick Leave', 'approve', '2022-09-17 23:26:15'),
(6, 'UENR-06', 'sick', '03/07/2034', 'am sick', 'Sick Leave', 'reject', '2022-09-17 23:26:17'),
(7, 'UENR-03', 'Travel', '09/28/2022', 'I will travel to USA', 'Leave Without Pay', 'approve', '2022-09-18 19:43:24'),
(8, 'UENR-04', 'sick', '09/28/2022', 'please i am sick', 'Sick Leave', 'reject', '2022-09-18 20:17:51'),
(9, 'UENR-04', 'sick', '09/28/2022', 'please i am sick', 'Sick Leave', 'approve', '2022-09-18 20:17:56'),
(10, 'UENR-02', 'Travel', '09/30/2022', 'Travelling for vacation', 'Leave Without Pay', 'approve', '2022-09-19 21:57:57');

-- --------------------------------------------------------

--
-- Table structure for table `wy_payheads`
--

CREATE TABLE `wy_payheads` (
  `payhead_id` int(11) NOT NULL,
  `payhead_name` varchar(255) NOT NULL,
  `payhead_desc` varchar(255) NOT NULL,
  `payhead_type` enum('earnings','deductions') NOT NULL DEFAULT 'earnings'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wy_payheads`
--

INSERT INTO `wy_payheads` (`payhead_id`, `payhead_name`, `payhead_desc`, `payhead_type`) VALUES
(1, 'Basic Salary', 'Basic Salary', 'earnings'),
(2, 'Dearness Allowance', 'Dearness Allowance', 'deductions'),
(3, 'House Rent Allowance', 'House Rent Allowance', 'deductions'),
(4, 'Conveyance Allowance', 'Conveyance Allowance', 'deductions'),
(5, 'Medical Allowance', 'Medical Allowance', 'deductions'),
(7, 'Overtime', 'Overtime', 'earnings'),
(8, 'Traveling Expenses', 'Traveling Expenses', 'earnings'),
(9, 'Loans & Advance', 'Loans & Advance', 'earnings'),
(10, 'Other Allowance', 'Other Allowance', 'earnings'),
(11, 'Professional Tax', 'Professional Tax', 'deductions'),
(12, 'Income Tax', 'Income Tax', 'deductions'),
(13, 'Employee Provident Fund', 'Employee Provident Fund', 'deductions'),
(14, 'Loans & Advance', 'Loans & Advance', 'deductions'),
(15, 'Other Deductions', 'Other Deductions', 'deductions'),
(16, 'Off Campus Allowance', 'Off Campus Allowance', 'earnings');

-- --------------------------------------------------------

--
-- Table structure for table `wy_pay_structure`
--

CREATE TABLE `wy_pay_structure` (
  `salary_id` int(11) NOT NULL,
  `emp_code` varchar(255) NOT NULL,
  `payhead_id` int(11) NOT NULL,
  `default_salary` float(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wy_pay_structure`
--

INSERT INTO `wy_pay_structure` (`salary_id`, `emp_code`, `payhead_id`, `default_salary`) VALUES
(129, 'WY01', 1, 45000.00),
(130, 'WY01', 15, 5000.00),
(131, 'WY03', 7, 5500.00),
(132, 'WY03', 1, 21000.00),
(133, 'WY05', 1, 51500.00),
(134, 'WY05', 7, 6500.00),
(135, 'WY05', 12, 5510.00),
(136, 'WY04', 1, 39000.00),
(137, 'WY04', 7, 5600.00),
(138, 'WY04', 12, 4250.00),
(139, 'WY02', 1, 21000.00),
(140, 'WY02', 7, 6500.00),
(156, 'UENR-06', 9, 1000.00),
(157, 'UENR-06', 1, 2334.00),
(158, 'UENR-06', 4, -233.00),
(159, 'UENR-03', 1, 10000.00),
(160, 'UENR-03', 2, -10.00),
(161, 'UENR-03', 3, -50.00),
(162, 'UENR-03', 5, -30.00),
(163, 'UENR-03', 4, -30.00),
(164, 'UENR-03', 7, 30.00),
(165, 'UENR-03', 8, 50.00),
(166, 'UENR-03', 9, 40.00),
(167, 'UENR-03', 10, 80.00),
(168, 'UENR-03', 11, -50.00),
(169, 'UENR-03', 12, -40.00),
(170, 'UENR-03', 13, -20.00),
(171, 'UENR-03', 14, -10.00),
(172, 'UENR-03', 15, -5.00),
(173, 'UENR-04', 1, 324434.00),
(174, 'UENR-04', 2, -45.00),
(175, 'UENR-04', 3, -56.00),
(176, 'UENR-04', 5, -64.00),
(177, 'UENR-04', 8, 566.00),
(178, 'UENR-04', 10, 877.00),
(179, 'UENR-02', 1, 100.00),
(180, 'UENR-02', 10, 56.00);

-- --------------------------------------------------------

--
-- Table structure for table `wy_salaries`
--

CREATE TABLE `wy_salaries` (
  `salary_id` int(11) NOT NULL,
  `emp_code` varchar(255) NOT NULL,
  `payhead_name` varchar(255) NOT NULL,
  `pay_amount` float(11,2) NOT NULL,
  `earning_total` float(11,2) NOT NULL,
  `deduction_total` float(11,2) NOT NULL,
  `net_salary` float(11,2) NOT NULL,
  `pay_type` enum('earnings','deductions') NOT NULL,
  `pay_month` varchar(255) NOT NULL,
  `generate_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wy_salaries`
--

INSERT INTO `wy_salaries` (`salary_id`, `emp_code`, `payhead_name`, `pay_amount`, `earning_total`, `deduction_total`, `net_salary`, `pay_type`, `pay_month`, `generate_date`) VALUES
(244, 'WY01', 'Basic Salary', 45000.00, 45000.00, 0.00, 45000.00, 'earnings', 'March, 2021', '2021-04-12 13:48:19'),
(245, 'WY03', 'Overtime', 5500.00, 39500.00, 0.00, 39500.00, 'earnings', 'March, 2021', '2021-04-14 16:09:02'),
(246, 'WY03', 'Basic Salary', 34000.00, 39500.00, 0.00, 39500.00, 'earnings', 'March, 2021', '2021-04-14 16:09:02'),
(247, 'WY05', 'Basic Salary', 51500.00, 58000.00, 5510.00, 52490.00, 'earnings', 'April, 2021', '2021-04-14 19:17:13'),
(248, 'WY05', 'Overtime', 6500.00, 58000.00, 5510.00, 52490.00, 'earnings', 'April, 2021', '2021-04-14 19:17:13'),
(249, 'WY05', 'Income Tax', 5510.00, 58000.00, 5510.00, 52490.00, 'deductions', 'April, 2021', '2021-04-14 19:17:14'),
(250, 'WY04', 'Basic Salary', 39000.00, 44600.00, 4250.00, 40350.00, 'earnings', 'April, 2021', '2021-04-14 19:22:25'),
(251, 'WY04', 'Overtime', 5600.00, 44600.00, 4250.00, 40350.00, 'earnings', 'April, 2021', '2021-04-14 19:22:25'),
(252, 'WY04', 'Income Tax', 4250.00, 44600.00, 4250.00, 40350.00, 'deductions', 'April, 2021', '2021-04-14 19:22:25'),
(253, 'WY01', 'Basic Salary', 45000.00, 45000.00, 5000.00, 40000.00, 'earnings', 'August, 2022', '2022-09-16 05:54:08'),
(254, 'WY01', 'Other Deductions', 5000.00, 45000.00, 5000.00, 40000.00, 'deductions', 'August, 2022', '2022-09-16 05:54:08'),
(255, 'UENR-06', 'Basic Salary', 100.00, 200.00, 100.00, 100.00, 'earnings', 'August, 2022', '2022-09-16 06:01:58'),
(256, 'UENR-06', 'Traveling Expenses', 100.00, 200.00, 100.00, 100.00, 'earnings', 'August, 2022', '2022-09-16 06:01:58'),
(257, 'UENR-06', 'Employee Provident Fund', 100.00, 200.00, 100.00, 100.00, 'deductions', 'August, 2022', '2022-09-16 06:01:58'),
(258, 'UENR-02', 'Basic Salary', 100.00, 1100.00, -100.00, 1200.00, 'earnings', 'September, 2022', '2022-09-16 22:39:20'),
(259, 'UENR-02', 'Overtime', 1000.00, 1100.00, -100.00, 1200.00, 'earnings', 'September, 2022', '2022-09-16 22:39:20'),
(260, 'UENR-02', 'Professional Tax', -100.00, 1100.00, -100.00, 1200.00, 'deductions', 'September, 2022', '2022-09-16 22:39:20'),
(261, 'UENR-06', 'Basic Salary', 100.00, 204.00, 104.00, 100.00, 'earnings', 'October, 2022', '2022-09-16 23:03:32'),
(262, 'UENR-06', 'Traveling Expenses', 100.00, 204.00, 104.00, 100.00, 'earnings', 'October, 2022', '2022-09-16 23:03:32'),
(263, 'UENR-06', 'Overtime', 4.00, 204.00, 104.00, 100.00, 'earnings', 'October, 2022', '2022-09-16 23:03:32'),
(264, 'UENR-06', 'Employee Provident Fund', 100.00, 204.00, 104.00, 100.00, 'deductions', 'October, 2022', '2022-09-16 23:03:32'),
(265, 'UENR-06', 'Professional Tax', 4.00, 204.00, 104.00, 100.00, 'deductions', 'October, 2022', '2022-09-16 23:03:32'),
(266, 'UENR-02', 'Basic Salary', 100.00, 1167.00, -100.00, 1267.00, 'earnings', 'October, 2022', '2022-09-17 23:05:45'),
(267, 'UENR-02', 'Overtime', 1000.00, 1167.00, -100.00, 1267.00, 'earnings', 'October, 2022', '2022-09-17 23:05:45'),
(268, 'UENR-02', 'Loans & Advance', 67.00, 1167.00, -100.00, 1267.00, 'earnings', 'October, 2022', '2022-09-17 23:05:46'),
(269, 'UENR-02', 'Professional Tax', -100.00, 1167.00, -100.00, 1267.00, 'deductions', 'October, 2022', '2022-09-17 23:05:46'),
(270, 'UENR-06', 'Loans & Advance', 1000.00, 3334.00, -233.00, 3567.00, 'earnings', 'September, 2022', '2022-09-17 23:14:01'),
(271, 'UENR-06', 'Basic Salary', 2334.00, 3334.00, -233.00, 3567.00, 'earnings', 'September, 2022', '2022-09-17 23:14:01'),
(272, 'UENR-06', 'Conveyance Allowance', -233.00, 3334.00, -233.00, 3567.00, 'deductions', 'September, 2022', '2022-09-17 23:14:01'),
(273, 'UENR-03', 'Basic Salary', 10000.00, 10200.00, -245.00, 10445.00, 'earnings', 'February, 2023', '2022-09-18 19:51:30'),
(274, 'UENR-03', 'Overtime', 30.00, 10200.00, -245.00, 10445.00, 'earnings', 'February, 2023', '2022-09-18 19:51:30'),
(275, 'UENR-03', 'Traveling Expenses', 50.00, 10200.00, -245.00, 10445.00, 'earnings', 'February, 2023', '2022-09-18 19:51:30'),
(276, 'UENR-03', 'Loans & Advance', 40.00, 10200.00, -245.00, 10445.00, 'earnings', 'February, 2023', '2022-09-18 19:51:30'),
(277, 'UENR-03', 'Other Allowance', 80.00, 10200.00, -245.00, 10445.00, 'earnings', 'February, 2023', '2022-09-18 19:51:30'),
(278, 'UENR-03', 'Dearness Allowance', -10.00, 10200.00, -245.00, 10445.00, 'deductions', 'February, 2023', '2022-09-18 19:51:30'),
(279, 'UENR-03', 'House Rent Allowance', -50.00, 10200.00, -245.00, 10445.00, 'deductions', 'February, 2023', '2022-09-18 19:51:30'),
(280, 'UENR-03', 'Medical Allowance', -30.00, 10200.00, -245.00, 10445.00, 'deductions', 'February, 2023', '2022-09-18 19:51:30'),
(281, 'UENR-03', 'Conveyance Allowance', -30.00, 10200.00, -245.00, 10445.00, 'deductions', 'February, 2023', '2022-09-18 19:51:30'),
(282, 'UENR-03', 'Professional Tax', -50.00, 10200.00, -245.00, 10445.00, 'deductions', 'February, 2023', '2022-09-18 19:51:30'),
(283, 'UENR-03', 'Income Tax', -40.00, 10200.00, -245.00, 10445.00, 'deductions', 'February, 2023', '2022-09-18 19:51:30'),
(284, 'UENR-03', 'Employee Provident Fund', -20.00, 10200.00, -245.00, 10445.00, 'deductions', 'February, 2023', '2022-09-18 19:51:30'),
(285, 'UENR-03', 'Loans & Advance', -10.00, 10200.00, -245.00, 10445.00, 'deductions', 'February, 2023', '2022-09-18 19:51:30'),
(286, 'UENR-03', 'Other Deductions', -5.00, 10200.00, -245.00, 10445.00, 'deductions', 'February, 2023', '2022-09-18 19:51:30'),
(287, 'UENR-04', 'Basic Salary', 324434.00, 325877.00, -165.00, 326042.00, 'earnings', 'September, 2022', '2022-09-18 20:22:02'),
(288, 'UENR-04', 'Traveling Expenses', 566.00, 325877.00, -165.00, 326042.00, 'earnings', 'September, 2022', '2022-09-18 20:22:02'),
(289, 'UENR-04', 'Other Allowance', 877.00, 325877.00, -165.00, 326042.00, 'earnings', 'September, 2022', '2022-09-18 20:22:02'),
(290, 'UENR-04', 'Dearness Allowance', -45.00, 325877.00, -165.00, 326042.00, 'deductions', 'September, 2022', '2022-09-18 20:22:02'),
(291, 'UENR-04', 'House Rent Allowance', -56.00, 325877.00, -165.00, 326042.00, 'deductions', 'September, 2022', '2022-09-18 20:22:02'),
(292, 'UENR-04', 'Medical Allowance', -64.00, 325877.00, -165.00, 326042.00, 'deductions', 'September, 2022', '2022-09-18 20:22:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wy_admin`
--
ALTER TABLE `wy_admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_email` (`admin_email`),
  ADD UNIQUE KEY `admin_code` (`admin_code`);

--
-- Indexes for table `wy_attendance`
--
ALTER TABLE `wy_attendance`
  ADD PRIMARY KEY (`attendance_id`),
  ADD KEY `emp_code` (`emp_code`);

--
-- Indexes for table `wy_detected_faces`
--
ALTER TABLE `wy_detected_faces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wy_employees`
--
ALTER TABLE `wy_employees`
  ADD PRIMARY KEY (`emp_id`),
  ADD UNIQUE KEY `emp_code` (`emp_code`);

--
-- Indexes for table `wy_help`
--
ALTER TABLE `wy_help`
  ADD PRIMARY KEY (`help_id`);

--
-- Indexes for table `wy_holidays`
--
ALTER TABLE `wy_holidays`
  ADD PRIMARY KEY (`holiday_id`);

--
-- Indexes for table `wy_leaves`
--
ALTER TABLE `wy_leaves`
  ADD PRIMARY KEY (`leave_id`);

--
-- Indexes for table `wy_payheads`
--
ALTER TABLE `wy_payheads`
  ADD PRIMARY KEY (`payhead_id`);

--
-- Indexes for table `wy_pay_structure`
--
ALTER TABLE `wy_pay_structure`
  ADD PRIMARY KEY (`salary_id`),
  ADD KEY `emp_code` (`emp_code`),
  ADD KEY `payhead_id` (`payhead_id`);

--
-- Indexes for table `wy_salaries`
--
ALTER TABLE `wy_salaries`
  ADD PRIMARY KEY (`salary_id`),
  ADD KEY `emp_code` (`emp_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wy_admin`
--
ALTER TABLE `wy_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wy_attendance`
--
ALTER TABLE `wy_attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `wy_detected_faces`
--
ALTER TABLE `wy_detected_faces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wy_employees`
--
ALTER TABLE `wy_employees`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `wy_help`
--
ALTER TABLE `wy_help`
  MODIFY `help_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wy_holidays`
--
ALTER TABLE `wy_holidays`
  MODIFY `holiday_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `wy_leaves`
--
ALTER TABLE `wy_leaves`
  MODIFY `leave_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `wy_payheads`
--
ALTER TABLE `wy_payheads`
  MODIFY `payhead_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `wy_pay_structure`
--
ALTER TABLE `wy_pay_structure`
  MODIFY `salary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT for table `wy_salaries`
--
ALTER TABLE `wy_salaries`
  MODIFY `salary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=293;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
