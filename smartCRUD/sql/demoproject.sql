-- phpMyAdmin SQL Dump
-- version 2.8.2.4
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Jul 12, 2008 at 08:07 PM
-- Server version: 5.0.24
-- PHP Version: 5.1.6
-- 
-- Database: `crud_test`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `table_1`
-- 

CREATE TABLE `table_1` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) collate latin1_general_ci NOT NULL,
  `sex` enum('male','female') collate latin1_general_ci NOT NULL,
  `country` int(11) NOT NULL,
  `age` int(3) NOT NULL,
  `email` varchar(50) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `table_1`
-- 

INSERT INTO `table_1` VALUES (1, 'Murugan', 'male', 1, 27, 'phpinbox@gmail.com');
INSERT INTO `table_1` VALUES (2, 'Ganesan', 'male', 1, 21, 'rmdganesan@gmail.com');

-- --------------------------------------------------------

-- 
-- Table structure for table `table_2`
-- 

CREATE TABLE `table_2` (
  `countryId` int(11) NOT NULL auto_increment,
  `countryName` varchar(50) collate latin1_general_ci NOT NULL,
  KEY `countryId` (`countryId`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `table_2`
-- 

INSERT INTO `table_2` VALUES (1, 'Paraguay');
INSERT INTO `table_2` VALUES (2, 'Brazil');
INSERT INTO `table_2` VALUES (3, 'Argentina');
INSERT INTO `table_2` VALUES (4, 'Chile');
