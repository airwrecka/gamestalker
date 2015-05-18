-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2015 at 08:37 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `evok`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `admin_type` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `username`, `password`, `admin_type`) VALUES
(1, 'hellomotto', 'hellomotto123', 1),
(2, 'hello', 'hello123', 3),
(3, 'haylo', '0', 2);

-- --------------------------------------------------------

--
-- Table structure for table `admin_type`
--

CREATE TABLE IF NOT EXISTS `admin_type` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `position` varchar(64) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `admin_type`
--

INSERT INTO `admin_type` (`ID`, `position`) VALUES
(1, 'Section Coordinator'),
(2, 'Faculty Member'),
(3, 'Student Council');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE IF NOT EXISTS `announcements` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `yr_level` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `venue` varchar(255) NOT NULL,
  `date_posted` date NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`ID`, `yr_level`, `title`, `description`, `date`, `time_start`, `time_end`, `venue`, `date_posted`) VALUES
(2, 0, 'justin', 'negros', '2014-12-25', '12:31:00', '15:23:00', 'bayawan ', '0000-00-00'),
(3, 1, '1', 'wala', '2014-12-31', '02:12:00', '14:12:00', 'rigney', '0000-00-00'),
(4, 1, '1st year', 'wala', '2013-01-31', '14:12:00', '00:12:00', 'rigney', '0000-00-00'),
(5, 2, '2', 'asjdjasd', '2014-02-12', '00:12:00', '12:12:00', 'rignry', '0000-00-00'),
(6, 2, '2nd year', 'jiasjd', '2014-12-31', '12:59:00', '12:59:00', 'rigney', '0000-00-00'),
(7, 3, '3', 'jaskdasd', '2014-12-31', '12:59:00', '12:58:00', 'ksjkd', '0000-00-00'),
(8, 3, '3rd year', 'asdasd', '2014-12-31', '12:59:00', '23:59:00', 'sadsd', '0000-00-00'),
(9, 4, '4', 'asdsd', '2015-12-31', '12:58:00', '12:59:00', 'ksjkd', '0000-00-00'),
(10, 4, 'fourth year', 'asdsd', '2015-12-31', '12:58:00', '12:59:00', 'ksjkd', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `stud_ID` int(11) NOT NULL,
  `first_name` varchar(64) NOT NULL,
  `middle_name` varchar(64) NOT NULL,
  `last_name` varchar(64) NOT NULL,
  `age` int(11) NOT NULL,
  `birthdate` date NOT NULL,
  `year_level` int(11) NOT NULL,
  `course` varchar(64) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`ID`, `stud_ID`, `first_name`, `middle_name`, `last_name`, `age`, `birthdate`, `year_level`, `course`) VALUES
(3, 123123, 'malou', 'c', 'barte', 22, '2014-12-31', 3, 'bscom'),
(4, 11103692, 'Erwin', 'Castanares', 'Barte', 20, '2014-12-31', 4, 'BSIT'),
(6, 987665, 'justin', 'c', 'barte', 19, '2015-12-31', 4, 'bsarch');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `user_type`) VALUES
(1, '', 'erwin', '785f0b13d4daf8eee0d11195f58302a4', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_temp`
--

CREATE TABLE IF NOT EXISTS `users_temp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL,
  `user_type` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `year_status`
--

CREATE TABLE IF NOT EXISTS `year_status` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `year` varchar(64) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `year_status`
--

INSERT INTO `year_status` (`ID`, `year`) VALUES
(1, 'First Year'),
(2, 'Second Year'),
(3, 'Third Year'),
(4, 'Fourth Year');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
