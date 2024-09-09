CREATE DATABASE IF NOT EXISTS `web_sqli`  DEFAULT CHARACTER SET latin1;

USE `web_sqli`;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_sqli`
--

-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `users` (
  `name` varchar(200) PRIMARY KEY,
  `pwd` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `real_flag_1s_here` varchar(128)
) DEFAULT CHARSET=utf8;


INSERT INTO `users`(`name`,`pwd`,`email`,`real_flag_1s_here`) VALUES('1dc4e6a21dbced2a1f22f224852af86b','9e8284055cd8e99dc8c338edc934e1d0','9f98e6a262fe2390f7bcd51a1cdb264b','xxx');
INSERT INTO `users`(`name`,`pwd`,`email`,`real_flag_1s_here`) VALUES('2dc4e6a21dbced2a1f22f224852af86b','9e8284055cd8e99dc8c338edc934e1d0','9f98e6a262fe2390f7bcd51a1cdb264b','xxx');
INSERT INTO `users`(`name`,`pwd`,`email`,`real_flag_1s_here`) VALUES('3dc4e6a21dbced2a1f22f224852af86b','9e8284055cd8e99dc8c338edc934e1d0','9f98e6a262fe2390f7bcd51a1cdb264b','xxx');
INSERT INTO `users`(`name`,`pwd`,`email`,`real_flag_1s_here`) VALUES('4dc4e6a21dbced2a1f22f224852af86b','9e8284055cd8e99dc8c338edc934e1d0','9f98e6a262fe2390f7bcd51a1cdb264b','xxx');
INSERT INTO `users`(`name`,`pwd`,`email`,`real_flag_1s_here`) VALUES('5dc4e6a21dbced2a1f22f224852af86b','9e8284055cd8e99dc8c338edc934e1d0','9f98e6a262fe2390f7bcd51a1cdb264b','xxx');
INSERT INTO `users`(`name`,`pwd`,`email`,`real_flag_1s_here`) VALUES('6dc4e6a21dbced2a1f22f224852af86b','9e8284055cd8e99dc8c338edc934e1d0','9f98e6a262fe2390f7bcd51a1cdb264b','xxx');
INSERT INTO `users`(`name`,`pwd`,`email`,`real_flag_1s_here`) VALUES('7dc4e6a21dbced2a1f22f224852af86b','9e8284055cd8e99dc8c338edc934e1d0','9f98e6a262fe2390f7bcd51a1cdb264b','xxx');
INSERT INTO `users`(`name`,`pwd`,`email`,`real_flag_1s_here`) VALUES('sdc4e6a21dbced2a1f22f224852af86b','9e8284055cd8e99dc8c338edc934e1d0','9f98e6a262fe2390f7bcd51a1cdb264b','flag{fake_flag}');

INSERT INTO `users`(`name`,`pwd`,`email`,`real_flag_1s_here`) VALUES('admin','adminsxxxxx','9f98e6a262fe2390f7bcd51a1cdb264b','xxx');

CREATE TABLE `flag`(
`flag` varchar(128) PRIMARY KEY
)DEFAULT CHARSET=utf8;
INSERT INTO `flag` VALUES('k1nz{Good job! But flag not here...}');


CREATE TABLE `article`(
`title` varchar(128) PRIMARY KEY,
`content` varchar(1000) NOT NULL
)DEFAULT CHARSET=utf8;


INSERT INTO `article` VALUES('lcsg','HELLO');

INSERT INTO `article` VALUES('wyzb','MY');

INSERT INTO `article` VALUES('zrtbf','FRIEND');