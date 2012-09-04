# --------------------------------------------------------
# Host:                         127.0.0.1
# Server version:               5.0.45-community-nt
# Server OS:                    Win32
# HeidiSQL version:             6.0.0.3603
# Date/time:                    2011-11-09 12:36:42
# --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

# Dumping database structure for db_busca_glavez
DROP DATABASE IF EXISTS `db_busca_glavez`;
CREATE DATABASE IF NOT EXISTS `db_busca_glavez` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_busca_glavez`;


# Dumping structure for table db_busca_glavez.tbl_juego
DROP TABLE IF EXISTS `tbl_juego`;
CREATE TABLE IF NOT EXISTS `tbl_juego` (
  `pk_juego` int(10) NOT NULL auto_increment,
  `dni` int(8) default NULL,
  `int_nivel` int(1) default NULL,
  `time_juego` time default NULL,
  `int_estado` int(1) default NULL COMMENT '1gano 0inconcluso',
  `txt_session` varchar(15) default NULL,
  `date_registro` datetime default NULL,
  PRIMARY KEY  (`pk_juego`),
  KEY `dni` (`dni`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

# Dumping data for table db_busca_glavez.tbl_juego: 0 rows
/*!40000 ALTER TABLE `tbl_juego` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_juego` ENABLE KEYS */;


# Dumping structure for table db_busca_glavez.tbl_log
DROP TABLE IF EXISTS `tbl_log`;
CREATE TABLE IF NOT EXISTS `tbl_log` (
  `pk_log` int(10) NOT NULL auto_increment,
  `int_dni` int(8) default NULL,
  `int_tipo` char(1) default NULL COMMENT '1inicio_sesion, 2',
  `ip` char(16) default NULL,
  `date_registro` datetime default NULL,
  PRIMARY KEY  (`pk_log`),
  KEY `int_dni` (`int_dni`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

# Dumping data for table db_busca_glavez.tbl_log: 4 rows
/*!40000 ALTER TABLE `tbl_log` DISABLE KEYS */;
INSERT INTO `tbl_log` (`pk_log`, `int_dni`, `int_tipo`, `ip`, `date_registro`) VALUES
	(1, 41050377, '1', '127.0.0.1', '2011-11-08 20:31:39'),
	(2, 41050377, '1', '127.0.0.1', '2011-11-08 20:35:05'),
	(3, 6229322, '1', '127.0.0.1', '2011-11-09 09:16:30'),
	(4, 41050377, '1', '127.0.0.1', '2011-11-09 11:28:40');
/*!40000 ALTER TABLE `tbl_log` ENABLE KEYS */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
