-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2019 at 02:17 AM
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
  `admin_type` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_compo_id`, `firstname`, `middlename`, `lastname`, `username`, `hash_password`, `password`, `photo`, `contact`, `email`, `admin_status`, `admin_type`) VALUES
(1, 'HHIADMIN1903020950212', 'Ivan Christian Jay', 'E', 'Funcion', 'ivan', '$2y$10$IdByTp0PggFSF0s4DLKb6u2MxJjMuwb3ZIEJwddJW/s1Z3rdW.hNS', '111', '48397479_270789970273327_4328910349525843968_n.jpg', '11111', 'ivan@gmail.com', 1, 'SUPERADMIN'),
(2, 'HHIADMIN1903030257008', 'Bartholomew Henry', 'F', 'Allen', 'scarlet_speedster', '$2y$10$TiF4RzaswJT6utx9qnsrS.4xfbaIN98NGlwywA9lszSpCP5dm2xYm', 'theflash', '', '0909002321', 'barryallen@gmail,com', 0, 'ADMIN');

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
  `data_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_clients`
--

INSERT INTO `tbl_clients` (`client_id`, `client_compo_id`, `firstname`, `middlename`, `lastname`, `company`, `position_in_company`, `company_size`, `industry`, `email`, `contact`, `zip_code`, `message`, `man_power_file`, `qualification_description_file`, `date_send`, `data_status`) VALUES
(1, 'CLIENT1903041053336', 'Bartholomew Henry', 'S', 'Allen', 'STAR LABS', 'forensics', '3', 'HEROES', 'barryallen@gmail,com', '09479888749', 124, 'Nothing', 'Manpower Request Form.xlsm', 'JD and Q.docx', '2019-03-04 22:54:15', 1),
(2, 'CLIENT1903041054599', 'Bartholomew Henry', 'S', 'Allen', 'STAR LABS', 'forensics', '8', 'HEROES', 'barryallen@gmail,com', '09479888749', 1234, 'sample', 'Manpower Request Form.xlsm', 'JD and Q.docx', '2019-03-04 22:56:31', 1),
(3, 'CLIENT1903050838195', 'James', 'Lawrence', 'Reid', 'Isa Isaa', 'Center', '12', 'Canteen', 'jamesreid@gmail.com', '09479888749', 1222, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'Manpower Request Form.xlsm', 'JD and Q.docx', '2019-03-05 09:05:37', 1);

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
  `date_send` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_inquiries`
--

INSERT INTO `tbl_inquiries` (`inquiries_id`, `inquiries_compo_id`, `name`, `email`, `message`, `date_send`) VALUES
(3, 'INQ1903040716597', 'iris west allen', 'irishwestallen@gmail.com', 'test 3', '2019-03-04 07:17:09'),
(4, 'INQ1903040727309', 'iris west allen', 'irishwestallen@gmail.com', 'blank message\r\n', '2019-03-04 07:41:00'),
(5, 'INQ1903040741001', 'iris west allen', 'irishwestallen@gmail.com', 'sige sige sige', '2019-03-04 07:41:17'),
(6, 'INQ1903040741179', 'iris west allen', 'irishwestallen@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '2019-03-04 08:08:35'),
(7, 'INQ1903040906107', 'iris west allen', 'irishwestallen@gmail.com', 'badfinfg', '2019-03-04 09:06:22'),
(8, 'INQ1903050912279', 'Wallace West', 'kidflash@gmail.com', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', '2019-03-05 09:12:51');

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
  `data_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jobseekers`
--

INSERT INTO `tbl_jobseekers` (`jobseeker_id`, `jobseeker_compo_id`, `firstname`, `middlename`, `lastname`, `gender`, `contact`, `email`, `subject`, `message`, `file`, `date_send`, `data_status`) VALUES
(2, 'JOBSEEKER1903040203051', 'Nora', 'West', 'Allen', 'female', '0909002321', 'norawestallen@gmail.com', 'nothing', 'important', 'Abbr.docx', '2019-03-04 14:03:33', 1),
(3, 'JOBSEEKER1903040303481', 'Nora', 'West', 'Allen', 'female', '09479888749', 'norawestallen@gmail.com', 'nothing', 'important', 'Abbr.docx', '2019-03-04 15:09:26', 1),
(4, 'JOBSEEKER1903050905430', 'James Carlos', 'Y', 'Yap', 'male', '09479888749', 'jcy18@gmail.com', 'Applying for Java Developer', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'Abbr.docx', '2019-03-05 09:09:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logs`
--

CREATE TABLE `tbl_logs` (
  `log_id` int(11) NOT NULL,
  `compo_log_id` varchar(45) NOT NULL,
  `log_date` datetime NOT NULL,
  `log_user` text NOT NULL,
  `log_usertype` varchar(45) NOT NULL,
  `log_action` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_clients`
--
ALTER TABLE `tbl_clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_inquiries`
--
ALTER TABLE `tbl_inquiries`
  MODIFY `inquiries_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_jobseekers`
--
ALTER TABLE `tbl_jobseekers`
  MODIFY `jobseeker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
