
-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 03, 2013 at 06:57 AM
-- Server version: 5.1.57
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `a5004221_carpool`
--

-- --------------------------------------------------------

--
-- Table structure for table `travel`
--

CREATE TABLE `travel` (
  `travelid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `fromstate` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `fromcity` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `starttime` time NOT NULL,
  `tostate` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tocity` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `totaltime` time NOT NULL,
  `day` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`travelid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `travel`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `lastname` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `age` varchar(3) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `users`
--

