-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2014 at 10:49 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rpl`
--

-- --------------------------------------------------------

--
-- Table structure for table `cinemas`
--

CREATE TABLE IF NOT EXISTS `cinemas` (
  `idCinemas` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `images` varchar(45) DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(20) DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `modified_by` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `telephone` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idCinemas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cinemas`
--

INSERT INTO `cinemas` (`idCinemas`, `name`, `address`, `images`, `created`, `created_by`, `modified`, `modified_by`, `description`, `telephone`) VALUES
(1, 'Matos Cinema', 'Matos Malang', 'hotel3.jpg', '2014-10-20 17:20:47', 'admin', '0000-00-00 00:00:00', '', 'Matos Cinema', '0321287346'),
(2, 'Dieng Cinema', 'Dieng Plaza Malang', 'hotel1.jpg', '2014-10-20 17:21:18', 'admin', '0000-00-00 00:00:00', '', 'Dieng Plaza Cinema', '032178564');

-- --------------------------------------------------------

--
-- Table structure for table `complains`
--

CREATE TABLE IF NOT EXISTS `complains` (
  `idComplains` int(11) NOT NULL AUTO_INCREMENT,
  `idUsers` int(11) DEFAULT NULL,
  `idForums` int(11) DEFAULT NULL,
  `message` longtext,
  `status` varchar(10) DEFAULT NULL,
  `com_by` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idComplains`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `forums`
--

CREATE TABLE IF NOT EXISTS `forums` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE IF NOT EXISTS `movies` (
  `idMovies` int(11) NOT NULL AUTO_INCREMENT,
  `id_cinema` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `director` varchar(20) DEFAULT NULL,
  `content` longtext,
  `images` varchar(45) DEFAULT NULL,
  `categories` varchar(100) DEFAULT NULL,
  `play` date DEFAULT NULL,
  `create` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `create_by` varchar(20) DEFAULT NULL,
  `modifed` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `modified_by` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idMovies`),
  KEY `id_cinema` (`id_cinema`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`idMovies`, `id_cinema`, `name`, `director`, `content`, `images`, `categories`, `play`, `create`, `create_by`, `modifed`, `modified_by`) VALUES
(1, 2, 'Ada Apa dengan Naga Bonar', 'Ahmad Fauzi Badillah', 'FIlm terbaru', NULL, 'Action', '2014-10-28', '2014-10-30 00:31:53', 'admin', '2014-10-29 18:31:53', 'admin'),
(2, 1, 'Cinta Pocong', 'Riri RIza', 'FIlm Horor terbaru', NULL, 'Horor', '2014-10-28', '2014-10-30 00:31:45', 'admin', '2014-10-29 18:31:45', 'admin'),
(3, 2, 'Ketika CInta Bertasbih', 'Hanung', 'Film Fenomenal', NULL, 'CInta', '2014-10-29', '2014-10-30 00:30:51', 'admin', '2014-10-29 18:30:51', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE IF NOT EXISTS `ratings` (
  `idRating` int(11) NOT NULL AUTO_INCREMENT,
  `cinema_id` int(11) DEFAULT NULL,
  `comment` varchar(50) DEFAULT NULL,
  `reputation` int(11) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idRating`),
  KEY `cinema_id` (`cinema_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE IF NOT EXISTS `reply` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE IF NOT EXISTS `tickets` (
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
  `film` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idTickets`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_stock`
--

CREATE TABLE IF NOT EXISTS `ticket_stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `bioskop` varchar(20) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(15) DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `modified_by` varchar(15) DEFAULT NULL,
  `id_film` int(11) DEFAULT NULL,
  `id_bioskop` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ticket_stock`
--

INSERT INTO `ticket_stock` (`id`, `nama`, `harga`, `bioskop`, `stock`, `created`, `created_by`, `modified`, `modified_by`, `id_film`, `id_bioskop`) VALUES
(1, 'Ada Apa dengan Naga Bonar', 25000, 'Matos Cinema', 5, '2014-10-29 17:06:00', 'admin', NULL, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
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
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUser`, `username`, `password`, `name`, `address`, `city`, `email`, `jenis_kelamin`, `images`, `isAktif`, `level`, `description`, `reg_date`, `modified`) VALUES
(1, 'admin', '9c69c2e285', 'admin', 'kosmea 26', 'Malang', 'admin@mail.com', 'pria', 'no_image.jpg', 'yes', 1, 0, '2014-10-11 00:37:58', NULL),
(2, 'sukma', '14721c173c', 'sukma w', 'kosmea 25', 'Malang', 'sw_hp@yahoo.com', 'pria', 'arda.png', 'yes', 0, 0, '2014-10-11 22:45:53', '2014-10-11 17:45:53'),
(3, 'khafid', 'fa6126d450', 'khafid', 'kosmea 25', 'Malang', 'khafid@mail.com', 'pria', 'no_image.jpg', 'yes', 0, 0, '2014-10-31 22:47:01', '2014-10-31 22:47:01'),
(4, 'yunika', 'f508469a5b', 'yunika', 'malang', 'Malang', 'yunichaaza@gmail.', 'perempuan', 'no_image.jpg', 'no', 0, 0, '2014-10-23 22:33:53', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
