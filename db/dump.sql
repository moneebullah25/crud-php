-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: db:3306
-- Generation Time: Sep 09, 2022 at 08:49 PM
-- Server version: 8.0.30
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: php_docker`
--

-- --------------------------------------------------------

--
-- Table structure for table `php_docker_table`
--

CREATE TABLE IF NOT EXISTS User (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Username VARCHAR(255) NOT NULL,
    Password VARCHAR(255) NOT NULL,
    Role VARCHAR(50) NOT NULL
);

-- User Information table
CREATE TABLE IF NOT EXISTS UserInformation (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    UserID INT,
    Name VARCHAR(255),
    Dob DATE,
    Email VARCHAR(255),
    Telephone VARCHAR(15),
    NextOfKin VARCHAR(255),
    Age INT,
    Illness VARCHAR(255),
    LastResidenceAddress VARCHAR(255),
    RecommendedSource VARCHAR(255),
    RecommendedSourceAddress VARCHAR(255),

    FOREIGN KEY (UserID) REFERENCES User(ID) ON DELETE CASCADE
);

-- Passport Photograph table
CREATE TABLE IF NOT EXISTS PassportPhotograph (
    PhotoID INT PRIMARY KEY AUTO_INCREMENT,
    UserID INT,
    Image BLOB,
    FOREIGN KEY (UserID) REFERENCES UserInformation(UserID) ON DELETE CASCADE
);


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;