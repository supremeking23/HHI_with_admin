-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2019 at 02:49 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `huntersdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_compo_id` varchar(45) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `middlename` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `hash_password` text NOT NULL,
  `password` varchar(45) NOT NULL,
  `photo` text NOT NULL,
  `contact` text NOT NULL,
  `email` varchar(45) NOT NULL,
  `admin_status` int(11) NOT NULL,
  `admin_type` varchar(45) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_compo_id`, `firstname`, `middlename`, `lastname`, `username`, `hash_password`, `password`, `photo`, `contact`, `email`, `admin_status`, `admin_type`, `date_added`) VALUES
(1, 'HHIADMIN1903020950212', 'Ivan Christian Jay', 'E', 'Funcion', 'ivan', '$2y$10$IdByTp0PggFSF0s4DLKb6u2MxJjMuwb3ZIEJwddJW/s1Z3rdW.hNS', '111', 'avatar5.png', '11111', 'ivan@gmail.com', 1, 'SUPERADMIN', '0000-00-00 00:00:00'),
(6, 'HHIADMIN1903130215504', 'Bartholomew Henry', 'S', 'Allen', 'barry', '$2y$10$ubalkAE5QENPCz2hN63DwuUfKP6GDBO.HgAn7shHolNysXtYqEXJS', 'barry', '', '09479888749', 'barryallen@gmail,com', 1, 'ADMIN', '0000-00-00 00:00:00'),
(7, 'HHIADMIN1903130218540', 'Violet', 'E', 'Evargarden', 'violet', '$2y$10$QChIEUzMyTC1WyZJVCfEje5Cs68Ntv3sw0.pCh1zYa7k493a6/Yei', 'violet', '', '09479888749', 'violet@gmail.com', 1, 'ADMIN', '0000-00-00 00:00:00'),
(8, 'HHIADMIN1903130219285', 'Kyrieq', 'Drew', 'Irving', 'uncledrew', '$2y$10$SMWKvsbVP/laNgMEq9faq.4e7Fd8yOYA/mjUZuOechQ4qxUZ1kxmm', 'uncledrew', '', '09479888749', 'uncledrew@gmail.com', 1, 'ADMIN', '2019-03-13 14:20:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clients`
--

CREATE TABLE `tbl_clients` (
  `client_id` int(11) NOT NULL,
  `client_compo_id` varchar(45) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `middlename` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `company` varchar(45) NOT NULL,
  `position_in_company` varchar(45) NOT NULL,
  `company_size` varchar(45) NOT NULL,
  `industry` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `contact` text NOT NULL,
  `zip_code` int(11) NOT NULL,
  `message` text NOT NULL,
  `man_power_file` text NOT NULL,
  `qualification_description_file` text NOT NULL,
  `date_send` datetime NOT NULL,
  `data_status` int(11) NOT NULL,
  `added_by` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_clients`
--

INSERT INTO `tbl_clients` (`client_id`, `client_compo_id`, `firstname`, `middlename`, `lastname`, `company`, `position_in_company`, `company_size`, `industry`, `email`, `contact`, `zip_code`, `message`, `man_power_file`, `qualification_description_file`, `date_send`, `data_status`, `added_by`) VALUES
(1, 'CLIENT1903041053336', 'Bartholomew Henry', 'S', 'Allen', 'STAR LABS', 'forensics', '3', 'HEROES', 'barryallen@gmail,com', '09479888749', 124, 'Nothing', 'Manpower Request Form.xlsm', 'JD and Q.docx', '2019-03-04 22:54:15', 1, ''),
(2, 'CLIENT1903041054599', 'Bartholomew Henry', 'S', 'Allen', 'STAR LABS', 'forensics', '8', 'HEROES', 'barryallen@gmail,com', '09479888749', 1234, 'sample', 'Manpower Request Form.xlsm', 'JD and Q.docx', '2019-03-04 22:56:31', 1, ''),
(3, 'CLIENT1903050838195', 'James', 'Lawrence', 'Reid', 'Isa Isaa', 'Center', '12', 'Canteen', 'jamesreid@gmail.com', '09479888749', 1222, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'Manpower Request Form.xlsm', 'JD and Q.docx', '2019-03-05 09:05:37', 1, ''),
(4, 'CLIENT1903091158176', 'Sansa', 'Howard', 'Stark', 'House of Stark', 'Center', '11', 'HEROES', 'sansastark', '09479888749', 1234, 'test test test', 'Man-Power-Request-Form.xlsm', '', '2019-03-09 11:59:31', 1, ''),
(5, 'CLIENT1903131045456', 'Joe', 'English', 'Ingles', 'STAR LABS', 'Forward', '', 'Stark', 'joenglish@gmail.com', '09479888749', 0, '', 'march.xlsx', '', '2019-03-13 22:46:08', 1, ''),
(6, 'CLIENT1903131056159', 'Bartholomew Henry', 'English', 'Allen', 'STAR LABS', 'Center', '', 'Stark', 'irishwestallen@gmail.com', '09479888749', 0, '', 'march.xlsx', '', '2019-03-13 22:56:36', 1, 'HHIADMIN1903020950212'),
(7, 'CLIENT1903131059128', 'Bartholomew Henry', 'English', 'Ingles', 'STAR LABS', 'Forward', '11', 'HEROES', 'irishwestallen@gmail.com', '09479888749', 1234, 'Based on the evaluation results, the following conclusion of evaluation result were drawn by the researchers. Results of four basic operations testing refers the behaviour output conducted on small query process up to huge data process with speed of internet. The results represented the objective of this study to known distinct difference when applied in a mobile environment on the basis of query process speed, accuracy and compatibility which can handle the big data and real-time database. The results have represented that there are many part which Firebase database is suitable for real-time database for its flexibility and is very easy to understand.', 'Ivan Christian Jay Funcion -  DTR(December).xlsx', '', '2019-03-13 22:59:40', 1, ''),
(8, 'CLIENT1903131108412', 'dsdaddada', 'sdadad', 'dsdsdad', 'STAR LABS', 'Forward', '', 'Stark', 'irishwestallen@gmail.com', '09479888749', 0, '', 'Ivan Christian Jay Funcion -  DTR(January).xlsx', '', '2019-03-13 23:09:00', 1, 'HHIADMIN1903020950212'),
(9, 'CLIENT1903131126407', 'sdad', 'English', 'Ingles', 'STAR LABS', 'Center', '', 'Stark', 'irishwestallen@gmail.com', '09479888749', 0, '', 'HHI -Ivan Christian Jay Funcion.xls', '', '2019-03-13 23:26:56', 0, 'HHIADMIN1903130215504');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_events`
--

CREATE TABLE `tbl_events` (
  `event_id` int(11) NOT NULL,
  `event_compo_id` varchar(45) NOT NULL,
  `event_name` varchar(45) NOT NULL,
  `event_description` text NOT NULL,
  `event_datestart` date NOT NULL,
  `event_dateend` date NOT NULL,
  `event_timestart` time NOT NULL,
  `event_timeend` time NOT NULL,
  `event_type` varchar(45) NOT NULL,
  `event_status` int(11) NOT NULL,
  `created_by` varchar(45) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_events`
--

INSERT INTO `tbl_events` (`event_id`, `event_compo_id`, `event_name`, `event_description`, `event_datestart`, `event_dateend`, `event_timestart`, `event_timeend`, `event_type`, `event_status`, `created_by`, `date_created`) VALUES
(2, 'EVENT1903070136435', 'Ivan', 'ahahaha', '2019-03-08', '0000-00-00', '13:30:00', '17:00:00', 'normal', 1, '', '0000-00-00 00:00:00'),
(8, 'EVENT1903070147418', 'Event Test 5', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32. ', '2019-03-07', '0000-00-00', '16:00:00', '18:00:00', 'normal', 1, '', '0000-00-00 00:00:00'),
(9, 'EVENT1903070253531', 'Event Test 6', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32. ', '2019-03-07', '0000-00-00', '17:00:00', '19:00:00', 'normal', 1, '', '0000-00-00 00:00:00'),
(11, 'EVENT1903080728517', 'Half day', 'Hahalf day ako', '2019-03-08', '0000-00-00', '12:00:00', '19:00:00', 'normal', 1, '', '0000-00-00 00:00:00'),
(12, 'EVENT1903091048585', 'Arcana South Expo', 'Arcana South North', '2019-03-22', '0000-00-00', '12:00:00', '21:00:00', 'normal', 1, '', '0000-00-00 00:00:00'),
(14, 'EVENT1903120315573', 'Event mo to', 'dasdasd', '2019-03-27', '0000-00-00', '00:00:00', '13:00:00', 'normal', 1, '', '0000-00-00 00:00:00'),
(15, 'EVENT1903120324223', 'Event mo to part 2', 'dasdasdd', '2019-03-14', '0000-00-00', '18:00:00', '21:00:00', 'normal', 1, '', '0000-00-00 00:00:00'),
(16, 'EVENT1903120347332', 'Event Test 5.6', 'dsadsdasdsd', '2019-03-27', '0000-00-00', '16:00:00', '20:00:00', 'urgent', 1, '', '0000-00-00 00:00:00'),
(17, 'EVENT1903130709134', 'Event 10', 'None', '2019-03-13', '0000-00-00', '09:00:00', '17:00:00', 'normal', 1, '', '0000-00-00 00:00:00'),
(18, 'EVENT1903130740126', 'march 28', 'sdadasdsadas', '2019-03-28', '0000-00-00', '14:00:00', '17:00:00', 'normal', 1, 'HHIADMIN1903020950212', '0000-00-00 00:00:00'),
(19, 'EVENT1903130743454', 'Expo', 'Expose', '2019-03-13', '0000-00-00', '08:00:00', '18:00:00', 'urgent', 1, 'HHIADMIN1903020950212', '0000-00-00 00:00:00'),
(20, 'EVENT1903130835422', 'Arcana South Expo part 2', 'dadasds', '2019-03-27', '0000-00-00', '10:00:00', '15:00:00', 'urgent', 1, 'HHIADMIN1903020950212', '0000-00-00 00:00:00'),
(21, 'EVENT1903130847054', 'Arcana South Expo part 3', '', '2019-03-21', '0000-00-00', '13:00:00', '16:00:00', '1', 0, 'HHIADMIN1903020950212', '2019-03-13 08:53:13'),
(22, 'EVENT1903141216091', 'Aliez', 'Ivan higga\r\n                   ', '2019-03-25', '2019-03-28', '06:00:00', '20:00:00', '1', 1, 'HHIADMIN1903020950212', '2019-03-14 00:16:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inquiries`
--

CREATE TABLE `tbl_inquiries` (
  `inquiries_id` int(11) NOT NULL,
  `inquiries_compo_id` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `message` text NOT NULL,
  `date_send` datetime NOT NULL,
  `data_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_inquiries`
--

INSERT INTO `tbl_inquiries` (`inquiries_id`, `inquiries_compo_id`, `name`, `email`, `message`, `date_send`, `data_status`) VALUES
(3, 'INQ1903040716597', 'iris west allen', 'irishwestallen@gmail.com', 'test 3', '2019-03-04 07:17:09', 1),
(4, 'INQ1903040727309', 'iris west allen', 'irishwestallen@gmail.com', 'blank message\r\n', '2019-03-04 07:41:00', 1),
(5, 'INQ1903040741001', 'iris west allen', 'irishwestallen@gmail.com', 'sige sige sige', '2019-03-04 07:41:17', 0),
(6, 'INQ1903040741179', 'iris west allen', 'irishwestallen@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '2019-03-04 08:08:35', 1),
(7, 'INQ1903040906107', 'iris west allen', 'irishwestallen@gmail.com', 'badfinfg', '2019-03-04 09:06:22', 0),
(8, 'INQ1903050912279', 'Wallace West', 'kidflash@gmail.com', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', '2019-03-05 09:12:51', 0),
(9, 'INQ1903160717089', 'Joy to the world', 'irishwestallen@gmail.com', 'daddaddsdsdasd', '2019-03-16 19:17:24', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobseekers`
--

CREATE TABLE `tbl_jobseekers` (
  `jobseeker_id` int(11) NOT NULL,
  `jobseeker_compo_id` varchar(45) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `middlename` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `contact` text NOT NULL,
  `email` varchar(45) NOT NULL,
  `subject` varchar(45) NOT NULL,
  `message` text NOT NULL,
  `file` text NOT NULL,
  `date_send` datetime NOT NULL,
  `data_status` int(11) NOT NULL,
  `added_by` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jobseekers`
--

INSERT INTO `tbl_jobseekers` (`jobseeker_id`, `jobseeker_compo_id`, `firstname`, `middlename`, `lastname`, `gender`, `contact`, `email`, `subject`, `message`, `file`, `date_send`, `data_status`, `added_by`) VALUES
(2, 'JOBSEEKER1903040203051', 'Nora', 'West', 'Allen', 'female', '0909002321', 'norawestallen@gmail.com', 'nothing', 'important', 'Abbr.docx', '2019-03-04 14:03:33', 1, ''),
(3, 'JOBSEEKER1903040303481', 'Nora', 'West', 'Allen', 'female', '09479888749', 'norawestallen@gmail.com', 'nothing', 'important', 'Abbr.docx', '2019-03-04 15:09:26', 1, ''),
(4, 'JOBSEEKER1903050905430', 'James Carlos', 'Y', 'Yap', 'male', '09479888749', 'jcy18@gmail.com', 'Applying for Java Developer', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'Abbr.docx', '2019-03-05 09:09:42', 0, ''),
(5, 'JOBSEEKER1903091138378', 'Francisco', 'Vibe', 'Ramon', 'male', '09479888749', 'vibecisco@gmail.com', 'Applying for Java Developer', 'test test test', '146-C00572-005.pdf', '2019-03-09 11:39:49', 1, ''),
(6, 'JOBSEEKER1903160222329', 'Violet', 'E', 'Evergarden', 'female', '09479888749', 'irishwestallen@gmail.com', 'Applying for Java Developer', '', 'FINAL_CHAPTER5.docx', '2019-03-16 14:22:59', 1, 'HHIADMIN1903020950212'),
(7, 'JOBSEEKER1903160223307', 'Mika', 'C', 'Kobayashi', 'female', '09479888749', 'irishwestallen@gmail.com', 'sdasdasdasddasds ivan', '', 'FINAL_CHAPTER2.docx', '2019-03-16 14:23:58', 1, 'HHIADMIN1903020950212'),
(8, 'JOBSEEKER1903160234583', 'Zeref', 'O', 'Endd', 'male', '09479888749', 'irishwestallen@gmail.com', 'Applying for Java Developer', '', 'FINAL_CHAPTER4.docx', '2019-03-16 14:35:23', 1, 'HHIADMIN1903020950212'),
(9, 'JOBSEEKER1903160236543', 'Hiroyuki', 'S', 'Sawano', 'male', '09479888749', 'irishwestallen@gmail.com', 'Applying for Java Developer', '', 'FINAL_CHAPTER3.docx', '2019-03-16 14:37:31', 0, 'HHIADMIN1903020950212');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logs`
--

CREATE TABLE `tbl_logs` (
  `log_id` int(11) NOT NULL,
  `log_compo_id` varchar(45) NOT NULL,
  `log_date` datetime NOT NULL,
  `log_user` text NOT NULL,
  `log_usertype` varchar(45) NOT NULL,
  `log_action` text NOT NULL,
  `log_userid` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_logs`
--

INSERT INTO `tbl_logs` (`log_id`, `log_compo_id`, `log_date`, `log_user`, `log_usertype`, `log_action`, `log_userid`) VALUES
(1, 'LOG1903110735108', '2019-03-11 07:35:10', 'ivan', 'SUPERADMIN', 'Login Successful', 'HHIADMIN1903020950212'),
(2, 'LOG1903110737277', '2019-03-11 07:37:27', 'ivan', 'SUPERADMIN', 'Logout Successful', 'HHIADMIN1903020950212'),
(3, 'LOG1903110738050', '2019-03-11 07:38:05', 'ivan', 'SUPERADMIN', 'Login Successful', 'HHIADMIN1903020950212'),
(4, 'LOG1903110741049', '2019-03-11 07:41:04', 'ivan', 'SUPERADMIN', 'Logout Successful', 'HHIADMIN1903020950212'),
(5, 'LOG1903110741087', '2019-03-11 07:41:08', 'scarlet_speedster', 'ADMIN', 'Login Successful', 'HHIADMIN1903030257008'),
(6, 'LOG1903110741312', '2019-03-11 07:41:31', 'scarlet_speedster', 'ADMIN', 'Logout Successful', 'HHIADMIN1903030257008'),
(7, 'LOG1903110741358', '2019-03-11 07:41:35', 'ivan', 'SUPERADMIN', 'Login Successful', 'HHIADMIN1903020950212'),
(8, 'LOG1903110746097', '2019-03-11 07:46:09', 'ivan', 'SUPERADMIN', 'Logout Successful', 'HHIADMIN1903020950212'),
(9, 'LOG1903110746152', '2019-03-11 07:46:15', 'scarlet_speedster', 'ADMIN', 'Login Successful', 'HHIADMIN1903030257008'),
(10, 'LOG1903110750523', '2019-03-11 07:50:52', 'scarlet_speedster', 'ADMIN', 'Logout Successful', 'HHIADMIN1903030257008'),
(11, 'LOG1903110750597', '2019-03-11 07:50:59', 'ivan', 'SUPERADMIN', 'Login Successful', 'HHIADMIN1903020950212'),
(12, 'LOG1903110751168', '2019-03-11 07:51:16', 'ivan', 'SUPERADMIN', 'Login Successful', 'HHIADMIN1903020950212'),
(13, 'LOG1903110752440', '2019-03-11 07:52:44', 'ivan', 'SUPERADMIN', 'Logout Successful', 'HHIADMIN1903020950212'),
(14, 'LOG1903110752514', '2019-03-11 07:52:51', 'scarlet_speedster', 'ADMIN', 'Login Successful', 'HHIADMIN1903030257008'),
(15, 'LOG1903110819310', '2019-03-11 08:19:31', 'ivan', 'SUPERADMIN', 'Logout Successful', 'HHIADMIN1903020950212'),
(16, 'LOG1903110840584', '2019-03-11 08:40:58', 'ivan', 'SUPERADMIN', 'Login Successful', 'HHIADMIN1903020950212'),
(17, 'LOG1903110844099', '2019-03-11 08:44:09', 'ivan', 'SUPERADMIN', 'Logout Successful', 'HHIADMIN1903020950212'),
(18, 'LOG1903110844498', '2019-03-11 08:44:49', 'scarlet_speedster', 'ADMIN', 'Login Successful', 'HHIADMIN1903030257008'),
(19, 'LOG1903110847321', '2019-03-11 08:47:32', 'scarlet_speedster', 'ADMIN', 'Logout Successful', 'HHIADMIN1903030257008'),
(20, 'LOG1903110847377', '2019-03-11 08:47:37', 'ivan', 'SUPERADMIN', 'Login Successful', 'HHIADMIN1903020950212'),
(21, 'LOG1903110240129', '2019-03-11 14:40:12', 'ivan', 'SUPERADMIN', 'Login Successful', 'HHIADMIN1903020950212'),
(22, 'LOG1903110907440', '2019-03-11 21:07:44', 'ivan', 'SUPERADMIN', 'Login Successful', 'HHIADMIN1903020950212'),
(23, 'LOG1903111021023', '2019-03-11 22:21:02', 'railey', 'ADMIN', 'Add new user HHIADMIN1903111020208', 'HHIADMIN1903111020208'),
(24, 'LOG1903121144251', '2019-03-12 11:44:25', 'ivan', 'SUPERADMIN', 'Login Successful', 'HHIADMIN1903020950212'),
(25, 'LOG1903120145472', '2019-03-12 13:45:47', 'ivan', 'SUPERADMIN', 'Login Successful', 'HHIADMIN1903020950212'),
(26, 'LOG1903120155120', '2019-03-12 13:55:12', 'barry', 'ADMIN', 'Add new user HHIADMIN1903120154421', 'HHIADMIN1903020950212'),
(27, 'LOG1903120207012', '2019-03-12 14:07:01', 'barry', '', 'Update Information for user HHIADMIN190312015', 'HHIADMIN1903020950212'),
(28, 'LOG1903120324220', '2019-03-12 15:24:22', '', '', 'Add new event EVENT1903120315573', 'HHIADMIN1903020950212'),
(29, 'LOG1903120324565', '2019-03-12 15:24:56', '', '', 'Add new event EVENT1903120324223', 'HHIADMIN1903020950212'),
(30, 'LOG1903120341067', '2019-03-12 15:41:06', 'ivan', 'SUPERADMIN', 'Login Successful', 'HHIADMIN1903020950212'),
(31, 'LOG1903120348541', '2019-03-12 15:48:54', '', '', 'Add new event EVENT1903120347332', 'HHIADMIN1903020950212'),
(32, 'LOG1903130708420', '2019-03-13 07:08:42', 'ivan', 'SUPERADMIN', 'Login Successful', 'HHIADMIN1903020950212'),
(33, 'LOG1903130730122', '2019-03-13 07:30:12', '', '', 'Add new event EVENT1903130709134', 'HHIADMIN1903020950212'),
(34, 'LOG1903130740502', '2019-03-13 07:40:50', '', '', 'Add new event EVENT1903130740126', 'HHIADMIN1903020950212'),
(35, 'LOG1903130744383', '2019-03-13 07:44:38', '', '', 'Add new event EVENT1903130743454', 'HHIADMIN1903020950212'),
(36, 'LOG1903130836038', '2019-03-13 08:36:03', '', '', 'Add new event EVENT1903130835422', 'HHIADMIN1903020950212'),
(37, 'LOG1903130853136', '2019-03-13 08:53:13', '', '', 'Add new event EVENT1903130847054', 'HHIADMIN1903020950212'),
(38, 'LOG1903130922197', '2019-03-13 09:22:19', '', '', 'Event has been deleted 4', 'HHIADMIN1903020950212'),
(39, 'LOG1903130938018', '2019-03-13 09:38:01', '', '', 'Event has been deleted ', 'HHIADMIN1903020950212'),
(40, 'LOG1903130938054', '2019-03-13 09:38:05', '', '', 'Event has been deleted EVENT1903070144542', 'HHIADMIN1903020950212'),
(41, 'LOG1903130938091', '2019-03-13 09:38:09', '', '', 'Event has been deleted EVENT1903070146519', 'HHIADMIN1903020950212'),
(42, 'LOG1903130214497', '2019-03-13 14:14:49', 'ivan', 'SUPERADMIN', 'Logout Successful', 'HHIADMIN1903020950212'),
(43, 'LOG1903130215394', '2019-03-13 14:15:39', 'ivan', 'SUPERADMIN', 'Login Successful', 'HHIADMIN1903020950212'),
(44, 'LOG1903130216116', '2019-03-13 14:16:11', 'barry', 'ADMIN', 'Add new user HHIADMIN1903130215504', 'HHIADMIN1903020950212'),
(45, 'LOG1903130216141', '2019-03-13 14:16:14', 'ivan', 'SUPERADMIN', 'Logout Successful', 'HHIADMIN1903020950212'),
(46, 'LOG1903130216192', '2019-03-13 14:16:19', 'barry', 'ADMIN', 'Login Successful', 'HHIADMIN1903130215504'),
(47, 'LOG1903130218339', '2019-03-13 14:18:33', 'barry', 'ADMIN', 'Logout Successful', 'HHIADMIN1903130215504'),
(48, 'LOG1903130218524', '2019-03-13 14:18:52', 'ivan', 'SUPERADMIN', 'Login Successful', 'HHIADMIN1903020950212'),
(49, 'LOG1903130219276', '2019-03-13 14:19:27', 'violet', 'ADMIN', 'Add new user HHIADMIN1903130218540', 'HHIADMIN1903020950212'),
(50, 'LOG1903130220581', '2019-03-13 14:20:58', 'uncledrew', 'ADMIN', 'Add new user HHIADMIN1903130219285', 'HHIADMIN1903020950212'),
(51, 'LOG1903131009253', '2019-03-13 22:09:25', 'ivan', 'SUPERADMIN', 'Login Successful', 'HHIADMIN1903020950212'),
(52, 'LOG1903131046084', '2019-03-13 22:46:08', 'ivan', 'SUPERADMIN', 'Add new client detail Client Id: CLIENT190313', 'HHIADMIN1903020950212'),
(53, 'LOG1903131056364', '2019-03-13 22:56:36', 'ivan', 'SUPERADMIN', 'Add new client detail Client Id: CLIENT190313', 'HHIADMIN1903020950212'),
(54, 'LOG1903131109006', '2019-03-13 23:09:00', 'ivan', 'SUPERADMIN', 'Add new client detail Client Id: CLIENT190313', 'HHIADMIN1903020950212'),
(55, 'LOG1903131126275', '2019-03-13 23:26:27', 'ivan', 'SUPERADMIN', 'Logout Successful', 'HHIADMIN1903020950212'),
(56, 'LOG1903131126339', '2019-03-13 23:26:33', 'barry', 'ADMIN', 'Login Successful', 'HHIADMIN1903130215504'),
(57, 'LOG1903131126563', '2019-03-13 23:26:56', 'barry', 'ADMIN', 'Add new client detail Client Id: CLIENT190313', 'HHIADMIN1903130215504'),
(58, 'LOG1903131142161', '2019-03-13 23:42:16', '', '', 'Event has been deleted EVENT1903070330386', 'HHIADMIN1903130215504'),
(59, 'LOG1903131144316', '2019-03-13 23:44:31', 'barry', 'ADMIN', 'Logout Successful', 'HHIADMIN1903130215504'),
(60, 'LOG1903131144406', '2019-03-13 23:44:40', 'ivan', 'SUPERADMIN', 'Login Successful', 'HHIADMIN1903020950212'),
(61, 'LOG1903131146288', '2019-03-13 23:46:28', 'ivan', 'SUPERADMIN', 'Login Successful', 'HHIADMIN1903020950212'),
(62, 'LOG1903131147012', '2019-03-13 23:47:01', 'ivan', 'SUPERADMIN', 'Logout Successful', 'HHIADMIN1903020950212'),
(63, 'LOG1903131153353', '2019-03-13 23:53:35', 'ivan', 'SUPERADMIN', 'Login Successful', 'HHIADMIN1903020950212'),
(64, 'LOG1903141216457', '2019-03-14 00:16:45', '', '', 'Add new event EVENT1903141216091', 'HHIADMIN1903020950212'),
(65, 'LOG1903141224220', '2019-03-14 00:24:22', 'ivan', 'SUPERADMIN', 'Logout Successful', 'HHIADMIN1903020950212'),
(66, 'LOG1903141224286', '2019-03-14 00:24:28', 'barry', 'ADMIN', 'Login Successful', 'HHIADMIN1903130215504'),
(67, 'LOG1903140704580', '2019-03-14 07:04:58', 'ivan', 'SUPERADMIN', 'Login Successful', 'HHIADMIN1903020950212'),
(68, 'LOG1903140714081', '2019-03-14 07:14:08', '', '', 'Event has been deleted EVENT1903071246301', 'HHIADMIN1903020950212'),
(69, 'LOG1903140932238', '2019-03-14 09:32:23', '', '', 'Update Event information for event: EVENT1903', 'HHIADMIN1903020950212'),
(70, 'LOG1903140932340', '2019-03-14 09:32:34', '', '', 'Update Event information for event: EVENT1903', 'HHIADMIN1903020950212'),
(71, 'LOG1903140934573', '2019-03-14 09:34:57', '', '', 'Update Event information for event: EVENT1903', 'HHIADMIN1903020950212'),
(72, 'LOG1903140935046', '2019-03-14 09:35:04', '', '', 'Update Event information for event: EVENT1903', 'HHIADMIN1903020950212'),
(73, 'LOG1903140936030', '2019-03-14 09:36:03', '', '', 'Update Event information for event: EVENT1903', 'HHIADMIN1903020950212'),
(74, 'LOG1903140936097', '2019-03-14 09:36:09', '', '', 'Update Event information for event: EVENT1903', 'HHIADMIN1903020950212'),
(75, 'LOG1903140936289', '2019-03-14 09:36:28', '', '', 'Update Event information for event: EVENT1903', 'HHIADMIN1903020950212'),
(76, 'LOG1903140938310', '2019-03-14 09:38:31', '', '', 'Update Event information for event: EVENT1903', 'HHIADMIN1903020950212'),
(77, 'LOG1903140942553', '2019-03-14 09:42:55', '', '', 'Update Event information for event: EVENT1903', 'HHIADMIN1903020950212'),
(78, 'LOG1903161111565', '2019-03-16 11:11:56', 'ivan', 'SUPERADMIN', 'Login Successful', 'HHIADMIN1903020950212'),
(79, 'LOG1903160235231', '2019-03-16 14:35:23', 'ivan', 'SUPERADMIN', 'Add new jobseeker detail Jobseeker Id: JOBSEE', 'HHIADMIN1903020950212'),
(80, 'LOG1903160237311', '2019-03-16 14:37:31', 'ivan', 'SUPERADMIN', 'Add new jobseeker detail Jobseeker Id: JOBSEEKER1903160236543', 'HHIADMIN1903020950212'),
(81, 'LOG1903160502548', '2019-03-16 17:02:54', '', '', 'Update Event information for event: EVENT1903130847054', 'HHIADMIN1903020950212'),
(82, 'LOG1903160820163', '2019-03-16 20:20:16', 'ivan', 'SUPERADMIN', 'Archive an inquiry data. Inquiry Id:<br /><b>Warning</b>:  urlencode() expects parameter 1 to be string, array given in <b>C:\\xampp\\htdocs\\HHI\\admin\\includes_admin\\functions.php</b> on line <b>21</b><br />', 'HHIADMIN1903020950212'),
(83, 'LOG1903160820373', '2019-03-16 20:20:37', 'ivan', 'SUPERADMIN', 'Archive an inquiry data. Inquiry Id:<br /><b>Warning</b>:  urlencode() expects parameter 1 to be string, array given in <b>C:\\xampp\\htdocs\\HHI\\admin\\includes_admin\\functions.php</b> on line <b>21</b><br />', 'HHIADMIN1903020950212'),
(84, 'LOG1903160823528', '2019-03-16 20:23:52', 'ivan', 'SUPERADMIN', 'Archive an inquiry data. Inquiry Id:INQ1903040906107', 'HHIADMIN1903020950212'),
(85, 'LOG1903160825126', '2019-03-16 20:25:12', 'ivan', 'SUPERADMIN', 'Archive an inquiry data. Inquiry Id:INQ1903040741001', 'HHIADMIN1903020950212'),
(86, 'LOG1903160905141', '2019-03-16 21:05:14', 'ivan', 'SUPERADMIN', 'Archive jobseeker file data. Jobseeker Id:JOBSEEKER1903160236543', 'HHIADMIN1903020950212'),
(87, 'LOG1903160905243', '2019-03-16 21:05:24', 'ivan', 'SUPERADMIN', 'Archive jobseeker file data. Jobseeker Id:JOBSEEKER1903050905430', 'HHIADMIN1903020950212'),
(88, 'LOG1903160936200', '2019-03-16 21:36:20', 'ivan', 'SUPERADMIN', 'Archive client file data. Client Id:CLIENT1903131108412', 'HHIADMIN1903020950212'),
(89, 'LOG1903160941076', '2019-03-16 21:41:07', 'ivan', 'SUPERADMIN', 'Archive client file data. Client Id:CLIENT1903131126407', 'HHIADMIN1903020950212'),
(90, 'LOG1903160941359', '2019-03-16 21:41:35', 'ivan', 'SUPERADMIN', 'Archive client file data. Client Id:CLIENT1903131126407', 'HHIADMIN1903020950212'),
(91, 'LOG1903160941594', '2019-03-16 21:41:59', 'ivan', 'SUPERADMIN', 'Archive client file data. Client Id:CLIENT1903131126407', 'HHIADMIN1903020950212'),
(92, 'LOG1903160943078', '2019-03-16 21:43:07', 'ivan', 'SUPERADMIN', 'Archive client file data. Client Id:CLIENT1903131126407', 'HHIADMIN1903020950212'),
(93, 'LOG1903160943530', '2019-03-16 21:43:53', 'ivan', 'SUPERADMIN', 'Archive client file data. Client Id:CLIENT1903131126407', 'HHIADMIN1903020950212');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_messages`
--

CREATE TABLE `tbl_messages` (
  `message_id` int(11) NOT NULL,
  `message_compo_id` varchar(45) NOT NULL,
  `sender_id` varchar(45) NOT NULL,
  `subject` varchar(45) NOT NULL,
  `message_body` varchar(45) NOT NULL,
  `date_send` varchar(45) NOT NULL,
  `message_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_messages`
--

INSERT INTO `tbl_messages` (`message_id`, `message_compo_id`, `sender_id`, `subject`, `message_body`, `date_send`, `message_status`) VALUES
(32, 'MSG1903110752370', 'HHIADMIN1903020950212', 'Applying for Java Developer', '<p>dadasdasdasddas<br></p>', '2019-03-11 07:52:37', 1),
(33, 'MSG1903110753268', 'HHIADMIN1903020950212', '2 people', '<p>s\r\nhere are many variations of passages of', '2019-03-11 07:53:26', 1),
(34, 'MSG1903110753263', 'HHIADMIN1903020950212', '2 people', '<p>s\r\nhere are many variations of passages of', '2019-03-11 07:53:26', 1),
(35, 'MSG1903110756057', 'HHIADMIN1903030257008', 'ivan', '<p>\r\nhere are many variations of passages of ', '2019-03-11 07:56:05', 1),
(36, 'MSG1903110756130', 'HHIADMIN1903020950212', '2 people', '<p>s\r\nhere are many variations of passages of', '2019-03-11 07:56:13', 1),
(37, 'MSG1903110844039', 'HHIADMIN1903020950212', 'sdfsdfsdfsdf', '<p>fsfdfsffsdfsdfsfsdfsdfsdfsdfsd</p>', '2019-03-11 08:44:03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_message_files`
--

CREATE TABLE `tbl_message_files` (
  `messagefile_id` int(11) NOT NULL,
  `attachment` text NOT NULL,
  `message_compo_id` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_message_files`
--

INSERT INTO `tbl_message_files` (`messagefile_id`, `attachment`, `message_compo_id`) VALUES
(41, 'FINAL_CHAPTER4.docx', 'MSG1903110752370'),
(42, 'FINAL_CHAPTER1.docx', 'MSG1903110753268'),
(43, 'FINAL_CHAPTER2.docx', 'MSG1903110753268'),
(44, 'FINAL_CHAPTER3.docx', 'MSG1903110753268'),
(45, 'FINAL_CHAPTER4.docx', 'MSG1903110753268'),
(46, 'FINAL_CHAPTER5.docx', 'MSG1903110753268'),
(47, 'FINAL_CHAPTER1.docx', 'MSG1903110753263'),
(48, 'FINAL_CHAPTER2.docx', 'MSG1903110753263'),
(49, 'FINAL_CHAPTER3.docx', 'MSG1903110753263'),
(50, 'FINAL_CHAPTER4.docx', 'MSG1903110753263'),
(51, 'FINAL_CHAPTER5.docx', 'MSG1903110753263'),
(52, 'FINAL_CHAPTER2.docx', 'MSG1903110756057'),
(53, 'FINAL_CHAPTER1.docx', 'MSG1903110756130'),
(54, 'FINAL_CHAPTER2.docx', 'MSG1903110756130'),
(55, 'FINAL_CHAPTER3.docx', 'MSG1903110756130'),
(56, 'FINAL_CHAPTER4.docx', 'MSG1903110756130'),
(57, 'FINAL_CHAPTER5.docx', 'MSG1903110756130'),
(58, 'CE - Angular JS.docx', 'MSG1903110844039'),
(59, 'JD and Q.docx', 'MSG1903110844039'),
(60, 'Manpower Request Form.xlsm', 'MSG1903110844039'),
(61, 'Man-Power-Request-Form.xlsm', 'MSG1903110844039');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_message_recipients`
--

CREATE TABLE `tbl_message_recipients` (
  `messagerecipient_id` int(11) NOT NULL,
  `recipient_id` varchar(45) NOT NULL,
  `recipient_message_status` int(11) NOT NULL,
  `message_compo_id` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_message_recipients`
--

INSERT INTO `tbl_message_recipients` (`messagerecipient_id`, `recipient_id`, `recipient_message_status`, `message_compo_id`) VALUES
(41, 'HHIADMIN1903030257008', 1, 'MSG1903110752370'),
(42, 'HHIADMIN1903030257008', 1, 'MSG1903110753268'),
(43, 'HHIADMIN1903050926412', 1, 'MSG1903110753268'),
(44, 'HHIADMIN1903030257008', 1, 'MSG1903110753263'),
(45, 'HHIADMIN1903050926412', 1, 'MSG1903110753263'),
(46, 'HHIADMIN1903020950212', 1, 'MSG1903110756057'),
(47, 'HHIADMIN1903030257008', 1, 'MSG1903110756130'),
(48, 'HHIADMIN1903050926412', 1, 'MSG1903110756130'),
(49, 'HHIADMIN1903030257008', 1, 'MSG1903110844039');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_clients`
--
ALTER TABLE `tbl_clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `tbl_events`
--
ALTER TABLE `tbl_events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `tbl_inquiries`
--
ALTER TABLE `tbl_inquiries`
  ADD PRIMARY KEY (`inquiries_id`);

--
-- Indexes for table `tbl_jobseekers`
--
ALTER TABLE `tbl_jobseekers`
  ADD PRIMARY KEY (`jobseeker_id`);

--
-- Indexes for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `tbl_messages`
--
ALTER TABLE `tbl_messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `tbl_message_files`
--
ALTER TABLE `tbl_message_files`
  ADD PRIMARY KEY (`messagefile_id`);

--
-- Indexes for table `tbl_message_recipients`
--
ALTER TABLE `tbl_message_recipients`
  ADD PRIMARY KEY (`messagerecipient_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_clients`
--
ALTER TABLE `tbl_clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_events`
--
ALTER TABLE `tbl_events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `tbl_inquiries`
--
ALTER TABLE `tbl_inquiries`
  MODIFY `inquiries_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_jobseekers`
--
ALTER TABLE `tbl_jobseekers`
  MODIFY `jobseeker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT for table `tbl_messages`
--
ALTER TABLE `tbl_messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `tbl_message_files`
--
ALTER TABLE `tbl_message_files`
  MODIFY `messagefile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `tbl_message_recipients`
--
ALTER TABLE `tbl_message_recipients`
  MODIFY `messagerecipient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
