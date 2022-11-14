
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `railway`
--

-- --------------------------------------------------------

--
-- Table structure for table `passengers`
--

CREATE TABLE IF NOT EXISTS `passengers` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_fname` varchar(30) DEFAULT NULL,
  `p_lname` varchar(30) DEFAULT NULL,
  `p_age` varchar(30) DEFAULT NULL,
  `p_contact` varchar(20) DEFAULT NULL,
  `p_gender` varchar(30) DEFAULT NULL,
  `adm_no` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `source` varchar(30) DEFAULT NULL,
  `avail_bal` int(11) DEFAULT 0,
  `book_status` int(1) DEFAULT 0,
  PRIMARY KEY (`p_id`),
  UNIQUE KEY `p_id` (`p_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;

--
-- Dumping data for table `passengers`
--

-- INSERT INTO `passengers` (`p_id`, `p_fname`, `p_lname`, `p_age`, `p_contact`, `p_gender`, `email`, `password`, `t_no`) VALUES
-- (1, 'Rahul', 'Dravid', '42', '9090909090', 'Male', 'rahul@dravid.com', '123123123', 16205),
-- (2, 'Rahul', 'Dravid', '29', '1010101010', 'Male', 'qwe@w.cc', '123123123', NULL),
-- (4, 'qwe', 'qwe', '19', '1010101010', 'Male', '123@123.cc', '123123123', NULL),
-- (5, 'abc', 'sbc', '19', '9090909090', 'Male', 'abc@g.cc', '123123123', 12951),
-- (6, 'sumit', 'sharma', '20', '9999999999', 'Male', 'sharma@gmail.com', '123123123', 12951),
-- (7, 'dhruv', 'mehta', '20', '9191919191', 'Male', 'dhruv@gmail.com', '123123123', 16205);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

-- CREATE TABLE IF NOT EXISTS `staff` (
--   `s_id` int(11) NOT NULL AUTO_INCREMENT,
--   `s_fname` varchar(10) DEFAULT NULL,
--   `s_lname` varchar(10) DEFAULT NULL,
--   `s_department` varchar(20) NOT NULL,
--   `s_salary` int(11) DEFAULT NULL,
--   PRIMARY KEY (`s_id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `station`
--

CREATE TABLE IF NOT EXISTS `cycle_station` (
  `s_no` int(11) NOT NULL ,
  `s_name` varchar(30) DEFAULT NULL,
  `s_no_of_cycles` int(11) DEFAULT 50,
  PRIMARY KEY (`s_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

INSERT INTO `cycle_station` VALUES
(1,'Jasper', 40),
(2,'Amber', 50),
(3,'Diamond', 40),
(4,'Academic Complex', 50),
(5,'Rock Garden', 40),
(6,'Health Centre', 20),
(7,'Library', 50),
(8,'NLHC', 50),
(9,'Rosaline', 40);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE IF NOT EXISTS `tickets` (
  `t_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `source` varchar(30),
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `age` varchar(30) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `gender` varchar(30) DEFAULT NULL,
  `adm_no` varchar(30),
  `email` varchar(30),
  UNIQUE KEY `t_id` (`t_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tickets`
--

-- INSERT INTO `tickets` (`PNR`, `t_status`, `t_fare`, `p_id`) VALUES
-- (8056124359, 'Confirmed', 650, 5),
-- (8851599875, 'Waiting', 540, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trains`
--

-- CREATE TABLE IF NOT EXISTS `trains` (
--   `t_no` decimal(5,0) NOT NULL,
--   `t_name` varchar(30) DEFAULT NULL,
--   `t_source` varchar(30) DEFAULT NULL,
--   `t_destination` varchar(30) DEFAULT NULL,
--   `t_type` varchar(30) DEFAULT NULL,
--   `t_status` varchar(20) DEFAULT 'On time',
--   `no_of_seats` int(11) DEFAULT NULL,
--   `t_duration` int(11) DEFAULT NULL,
--   PRIMARY KEY (`t_no`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trains`
--

-- INSERT INTO `trains` (`t_no`, `t_name`, `t_source`, `t_destination`, `t_type`, `t_status`, `no_of_seats`, `t_duration`) VALUES
-- (4971, 'garibrath', 'Udaipurr', 'Jammu Tawi', 'Express', 'On time', 550, 20),
-- (12284, 'duronto', 'Mumbai central', 'Ernakulum', 'AC superfast', 'On time', 800, 24),
-- (12859, 'geetanjali', 'CST', 'Kolkata', 'express', 'On time', 500, 25),
-- (12951, 'rajdhani', 'Mumbai Central', 'Delhi', 'Superfast', 'On time', 700, 15),
-- (16205, 'mysoreexp', 'Talguppa', 'Mysore JN', 'Express', 'On time', 475, 21);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
