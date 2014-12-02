/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50614
Source Host           : localhost:3306
Source Database       : rpl

Target Server Type    : MYSQL
Target Server Version : 50614
File Encoding         : 65001

Date: 2014-11-29 06:39:02
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
  `created` timestamp NULL DEFAULT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL,
  `modified_by` varchar(20) NOT NULL,
  `description` varchar(225) NOT NULL,
  `telephone` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idCinemas`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cinemas
-- ----------------------------
INSERT INTO `cinemas` VALUES ('1', 'Matos Cinema', 'Matos Malang', 'hotel3.jpg', '2014-10-21 00:20:47', 'admin', '0000-00-00 00:00:00', '', 'Matos Cinema', '0321287346');
INSERT INTO `cinemas` VALUES ('2', 'Dieng Cinema', 'Dieng Plaza Malang', 'hotel1.jpg', '2014-10-21 00:21:18', 'admin', '0000-00-00 00:00:00', '', 'Dieng Plaza Cinema', '032178564');

-- ----------------------------
-- Table structure for complains
-- ----------------------------
DROP TABLE IF EXISTS `complains`;
CREATE TABLE `complains` (
  `idComplains` int(11) NOT NULL AUTO_INCREMENT,
  `idUsers` int(11) DEFAULT NULL,
  `idForums` int(11) DEFAULT NULL,
  `message` varchar(225) DEFAULT NULL,
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
  `date` timestamp NULL DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL,
  `modified_by` varchar(20) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idForums`),
  KEY `users` (`users`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of forums
-- ----------------------------
INSERT INTO `forums` VALUES ('1', '0', 'Film Lawas', 'action', null, '', '2', '0000-00-00 00:00:00', null, null, null);
INSERT INTO `forums` VALUES ('2', '0', 'Film Lawas', 'action', null, '<p>Dicari film lawas om jackie chan</p>\r\n', '2', '0000-00-00 00:00:00', null, null, null);

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
  `play` date DEFAULT NULL,
  `create` timestamp NULL DEFAULT NULL,
  `create_by` varchar(20) DEFAULT NULL,
  `modifed` timestamp NULL DEFAULT NULL,
  `modified_by` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idMovies`),
  KEY `id_cinema` (`id_cinema`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of movies
-- ----------------------------
INSERT INTO `movies` VALUES ('1', '2', 'Ada Apa dengan Naga Bonar', 'Ahmad Fauzi Badillah', 'FIlm terbaru', null, 'Action', '2014-10-28', '2014-10-30 07:31:53', 'admin', '2014-10-30 01:31:53', 'admin');
INSERT INTO `movies` VALUES ('2', '1', 'Cinta Pocong', 'Riri RIza', 'FIlm Horor terbaru', null, 'Horor', '2014-10-28', '2014-10-30 07:31:45', 'admin', '2014-10-30 01:31:45', 'admin');
INSERT INTO `movies` VALUES ('3', '2', 'Ketika CInta Bertasbih', 'Hanung', 'Film Fenomenal', null, 'CInta', '2014-10-29', '2014-10-30 07:30:51', 'admin', '2014-10-30 01:30:51', 'admin');

-- ----------------------------
-- Table structure for ratings
-- ----------------------------
DROP TABLE IF EXISTS `ratings`;
CREATE TABLE `ratings` (
  `idRating` int(11) NOT NULL AUTO_INCREMENT,
  `cinema_id` int(11) DEFAULT NULL,
  `comment` varchar(50) DEFAULT NULL,
  `reputation` int(11) DEFAULT NULL,
  `description` longtext,
  `by` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idRating`),
  KEY `cinema_id` (`cinema_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ratings
-- ----------------------------
INSERT INTO `ratings` VALUES ('1', '1', 'bagus om', '3', null, 'arda');
INSERT INTO `ratings` VALUES ('2', '2', 'bagus om', '4', null, 'yunika');
INSERT INTO `ratings` VALUES ('3', '2', 'jelek bos', '1', null, 'ando');
INSERT INTO `ratings` VALUES ('4', null, null, null, null, null);
INSERT INTO `ratings` VALUES ('5', null, null, null, null, null);
INSERT INTO `ratings` VALUES ('6', '1', 'Keren bos', '2', null, 'bos');

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
  `date` timestamp NULL DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL,
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
-- Table structure for schedule
-- ----------------------------
DROP TABLE IF EXISTS `schedule`;
CREATE TABLE `schedule` (
  `idSchedules` int(11) NOT NULL AUTO_INCREMENT,
  `id_cinema` int(11) DEFAULT NULL,
  `id_movie` int(11) DEFAULT NULL,
  `nama` varchar(25) DEFAULT NULL,
  `bioskop` varchar(15) DEFAULT NULL,
  `hari` varchar(10) DEFAULT NULL,
  `pukul` time DEFAULT NULL,
  `keterangan` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idSchedules`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of schedule
-- ----------------------------
INSERT INTO `schedule` VALUES ('2', '2', '2', 'Cinta Pocong', 'Dieng Cinema', 'kamis', '11:00:00', null);
INSERT INTO `schedule` VALUES ('3', '2', '2', 'Cinta Pocong', 'Dieng Cinema', 'rabu', '20:00:00', null);
INSERT INTO `schedule` VALUES ('4', '2', '2', 'Cinta Pocong', 'Dieng Cinema', 'senin', '12:55:00', null);
INSERT INTO `schedule` VALUES ('5', '1', '1', 'Ada Apa dengan Naga Bonar', 'Matos Cinema', 'selasa', '14:00:00', null);
INSERT INTO `schedule` VALUES ('6', '1', '1', 'Ada Apa dengan Naga Bonar', 'Matos Cinema', 'selasa', '12:00:00', null);
INSERT INTO `schedule` VALUES ('7', '1', '3', 'Ketika CInta Bertasbih', 'Matos Cinema', 'sabtu', '18:00:00', null);
INSERT INTO `schedule` VALUES ('8', '2', '3', 'Ketika CInta Bertasbih', 'Dieng Cinema', 'minggu', '17:00:00', null);

-- ----------------------------
-- Table structure for tickets
-- ----------------------------
DROP TABLE IF EXISTS `tickets`;
CREATE TABLE `tickets` (
  `idTickets` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `play` timestamp NULL DEFAULT NULL,
  `day` varchar(10) DEFAULT NULL,
  `cinema` varchar(20) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `oder_date` timestamp NULL DEFAULT NULL,
  `description` longtext,
  `film` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idTickets`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tickets
-- ----------------------------
INSERT INTO `tickets` VALUES ('1', '2', 'sukma w', '0000-00-00 00:00:00', 'minggu', 'Dieng Cinema', '26000', '2', '52000', '2014-11-14 00:33:31', null, 'Ketika CInta Bertasbih');
INSERT INTO `tickets` VALUES ('2', '2', 'sukma w', '0000-00-00 00:00:00', 'minggu', 'Dieng Cinema', '26000', '1', '26000', '2014-11-14 00:35:00', null, 'Ketika CInta Bertasbih');
INSERT INTO `tickets` VALUES ('3', '2', 'sukma w', '0000-00-00 00:00:00', 'minggu', 'Dieng Cinema', '26000', '3', '78000', '2014-11-14 01:00:35', null, 'Ketika CInta Bertasbih');
INSERT INTO `tickets` VALUES ('4', '2', 'sukma w', '0000-00-00 00:00:00', 'minggu', 'Dieng Cinema', '26000', '2', '52000', '2014-11-14 23:49:45', null, 'Ketika CInta Bertasbih');
INSERT INTO `tickets` VALUES ('5', '2', 'sukma w', '0000-00-00 00:00:00', 'minggu', 'Dieng Cinema', '26000', '2', '52000', '2014-11-15 08:59:19', null, 'Ketika CInta Bertasbih');

-- ----------------------------
-- Table structure for ticket_stock
-- ----------------------------
DROP TABLE IF EXISTS `ticket_stock`;
CREATE TABLE `ticket_stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `bioskop` varchar(20) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `created_by` varchar(15) DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL,
  `modified_by` varchar(15) DEFAULT NULL,
  `id_film` int(11) DEFAULT NULL,
  `id_bioskop` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ticket_stock
-- ----------------------------
INSERT INTO `ticket_stock` VALUES ('1', 'Ada Apa dengan Naga Bonar', '25000', 'Matos Cinema', '5', '2014-10-30 00:06:00', 'admin', null, null, '1', '1');
INSERT INTO `ticket_stock` VALUES ('2', 'Cinta Pocong', '29000', 'Matos Cinema', '10', '2014-11-09 19:58:06', 'admin', null, null, '2', '1');
INSERT INTO `ticket_stock` VALUES ('3', 'Cinta Pocong', '27000', 'Dieng Cinema', '12', '2014-11-09 13:56:10', 'admin', null, null, '2', '2');
INSERT INTO `ticket_stock` VALUES ('4', 'Ada Apa dengan Naga Bonar', '26500', 'Matos Cinema', '12', '2014-11-09 13:58:27', 'admin', null, null, '1', '1');
INSERT INTO `ticket_stock` VALUES ('5', 'Ketika CInta Bertasbih', '25000', 'Matos Cinema', '11', '2014-11-09 14:33:54', 'admin', null, null, '3', '1');
INSERT INTO `ticket_stock` VALUES ('6', 'Ketika CInta Bertasbih', '26000', 'Dieng Cinema', '4', '2014-11-09 14:34:07', 'admin', null, null, '3', '2');

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
  `description` int(45) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', '9c69c2e285', 'admin', 'kosmea 26', 'Malang', 'admin@mail.com', 'pria', 'no_image.jpg', 'yes', '1', '0', '2014-10-11 07:37:58', null);
INSERT INTO `users` VALUES ('2', 'sukma', '14721c173c', 'sukma w', 'kosmea 25', 'Malang', 'sw_hp@yahoo.com', 'pria', 'arda.png', 'yes', '0', '0', '2014-10-12 05:45:53', '2014-10-12 00:45:53');
INSERT INTO `users` VALUES ('3', 'khafid', 'fa6126d450', 'khafid', 'kosmea 25', 'Malang', 'khafid@mail.com', 'pria', 'no_image.jpg', 'yes', '0', '0', '2014-11-01 05:47:01', '2014-11-01 05:47:01');
INSERT INTO `users` VALUES ('4', 'yunika', 'f508469a5b', 'yunika', 'malang', 'Malang', 'yunichaaza@gmail.', 'perempuan', 'no_image.jpg', 'no', '0', '0', '2014-10-24 05:33:53', null);
