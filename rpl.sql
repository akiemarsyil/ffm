/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50614
Source Host           : localhost:3306
Source Database       : rpl

Target Server Type    : MYSQL
Target Server Version : 50614
File Encoding         : 65001

Date: 2014-10-10 14:40:01
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for cinemas
-- ----------------------------
DROP TABLE IF EXISTS `cinemas`;
CREATE TABLE `cinemas` (
  `idCinemas` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `images` varchar(45) DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(20) DEFAULT NULL,
  `modifed` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `modified_by` varchar(20) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idCinemas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cinemas
-- ----------------------------

-- ----------------------------
-- Table structure for complains
-- ----------------------------
DROP TABLE IF EXISTS `complains`;
CREATE TABLE `complains` (
  `idComplains` int(11) NOT NULL AUTO_INCREMENT,
  `idUsers` int(11) DEFAULT NULL,
  `idForums` int(11) DEFAULT NULL,
  `message` longtext,
  `status` varchar(10) DEFAULT NULL,
  `com_by` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idComplains`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of complains
-- ----------------------------

-- ----------------------------
-- Table structure for forums
-- ----------------------------
DROP TABLE IF EXISTS `forums`;
CREATE TABLE `forums` (
  `idForums` int(11) NOT NULL AUTO_INCREMENT,
  `users` int(11) NOT NULL,
  `title` varchar(25) DEFAULT NULL,
  `categories` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `content` longtext,
  `created_by` varchar(20) DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `modified_by` varchar(20) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idForums`),
  KEY `users` (`users`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of forums
-- ----------------------------

-- ----------------------------
-- Table structure for movies
-- ----------------------------
DROP TABLE IF EXISTS `movies`;
CREATE TABLE `movies` (
  `idMovies` int(11) NOT NULL AUTO_INCREMENT,
  `id_cinema` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `director` varchar(20) DEFAULT NULL,
  `content` longtext,
  `images` varchar(45) DEFAULT NULL,
  `categories` varchar(100) DEFAULT NULL,
  `play` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `create` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `create_by` varchar(20) DEFAULT NULL,
  `modifed` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `modified_by` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idMovies`),
  KEY `id_cinema` (`id_cinema`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of movies
-- ----------------------------

-- ----------------------------
-- Table structure for ratings
-- ----------------------------
DROP TABLE IF EXISTS `ratings`;
CREATE TABLE `ratings` (
  `idRating` int(11) NOT NULL AUTO_INCREMENT,
  `cinema_id` int(11) DEFAULT NULL,
  `comment` varchar(50) DEFAULT NULL,
  `reputation` int(11) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idRating`),
  KEY `cinema_id` (`cinema_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ratings
-- ----------------------------

-- ----------------------------
-- Table structure for reply
-- ----------------------------
DROP TABLE IF EXISTS `reply`;
CREATE TABLE `reply` (
  `idReply` int(11) NOT NULL AUTO_INCREMENT,
  `id_forum` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `reply` longtext,
  `images` varchar(45) DEFAULT NULL,
  `rep_by` varchar(20) DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `modifed_by` varchar(255) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idReply`),
  KEY `id_user` (`id_user`),
  KEY `id_forum` (`id_forum`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of reply
-- ----------------------------

-- ----------------------------
-- Table structure for tickets
-- ----------------------------
DROP TABLE IF EXISTS `tickets`;
CREATE TABLE `tickets` (
  `idTickets` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `play` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `day` varchar(10) DEFAULT NULL,
  `cinema` varchar(20) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `oder_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `description` longtext,
  PRIMARY KEY (`idTickets`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tickets
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `city` varchar(15) DEFAULT NULL,
  `email` varchar(17) DEFAULT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL,
  `images` varchar(25) DEFAULT NULL,
  `isAktif` varchar(5) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `description` int(45) DEFAULT NULL,
  `reg_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', '9c69c2e285', 'admin', 'kosmea 26', 'Malang', 'admin@mail.com', 'pria', 'no_image.jpg', 'no', '0', '0', '2014-10-10 01:22:53');
