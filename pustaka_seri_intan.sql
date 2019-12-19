-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2017 at 01:17 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pustaka_seri_intan`
--

-- --------------------------------------------------------

--
-- Table structure for table `cust_register`
--

CREATE TABLE `cust_register` (
  `name` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `date_of_birth` varchar(10) NOT NULL,
  `ic_num` varchar(14) NOT NULL,
  `phone_num` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `psi_t` int(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `expired_card` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cust_register`
--

INSERT INTO `cust_register` (`name`, `gender`, `date_of_birth`, `ic_num`, `phone_num`, `email`, `psi_t`, `password`, `expired_card`) VALUES
('Nur Amirah Natasha Binti Kamaruddin', 'Female', '09/06/1992', '920609-02-5428', '0145276399', 'amiranatasha@gmail.com', 1154, 'natashak', '09/12/2022'),
('Hasif bin Ahmad', 'Male', '21/12/1996', '961221-14-5411', '0199891314', 'hasif@ymail.com', 1303, '0000', '31/12/2020'),
('Nur Qasidah Binti Abu Bakar', 'Female', '14/02/1997', '970214-07-3428', '0128765439', 'nurq94@gmail.com', 2442, '9999', '10/01/2022'),
('Siti Jamilah Binti Ahmad ', 'Female', '06/01/1994', '940106-03-1234', '0125429877', 'sitij@hotmail.com', 4000, 'qwertyuiop', '09/09/2020'),
('Aisyah binti Amran', 'Female', '04/07/1990', '900704-02-9023', '0163749027', 'aisyah@gmail.com', 4311, 'aisyah', '13/02/2020'),
('Aminah Binti Abu Bakar', 'Female', '12/03/1998', '980312-11-5619', '0176390822', 'aminahab@yahoo.com', 5100, '52863', '03/04/2022'),
('Nur Aqilah Binti Hasbullah', 'Female', '13/06/1997', '970613-14-5286', '0176539388', 'qilahaliqa97@gmail.com', 5286, 'qilahaliqa', '31/12/2021'),
('Muhammad Nur Irfan Bin Abdullah', 'Male', '29/08/1995', '950829-14-5322', '0145778090', 'irfanabdullah@yahoo.com', 5402, 'abcd', '12/12/2018'),
('Syed Mohamad Amran Bin Syed Syakir', 'Male', '26/06/1997', '970626-10-1298', '0164298765', 'syedam@hotmail.com', 5654, 'syedam', '21/05/2021'),
('Farid Hashim Bin Omar', 'Male', '01/01/2000', '000101-12-8762', '0162972093', 'fhashim@gmail.com', 8888, 'password', '23/11/2022'),
('Muhammad Umar Bin Muhammad Zamir', 'Male', '13/10/1999', '991013-04-7654', '0129853092', 'umar99@yahoo.com', 9080, 'umarzamir9', '12/09/2019'),
('Ahmad Nasrin bin Hamzah', 'Male', '11/03/1998', '980311-11-5619', '0139001876', 'nasrin@gmail.com', 9088, '1111', '31/12/2020');

-- --------------------------------------------------------

--
-- Table structure for table `staff_register`
--

CREATE TABLE `staff_register` (
  `name` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `date_of_birth` date NOT NULL,
  `ic_num` varchar(14) NOT NULL,
  `email` varchar(30) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_register`
--

INSERT INTO `staff_register` (`name`, `gender`, `date_of_birth`, `ic_num`, `email`, `staff_id`, `password`) VALUES
('admin', '', '0000-00-00', '', '', 1111, '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cust_register`
--
ALTER TABLE `cust_register`
  ADD PRIMARY KEY (`psi_t`),
  ADD UNIQUE KEY `ic_num` (`ic_num`);

--
-- Indexes for table `staff_register`
--
ALTER TABLE `staff_register`
  ADD PRIMARY KEY (`staff_id`),
  ADD UNIQUE KEY `ic_num` (`ic_num`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cust_register`
--
ALTER TABLE `cust_register`
  MODIFY `psi_t` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=342324;
--
-- AUTO_INCREMENT for table `staff_register`
--
ALTER TABLE `staff_register`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1112;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
