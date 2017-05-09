-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.19-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for hardware_supplier
CREATE DATABASE IF NOT EXISTS `hardware_supplier` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `hardware_supplier`;

-- Dumping structure for table hardware_supplier.bill
CREATE TABLE IF NOT EXISTS `bill` (
  `bill_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `card` char(50) NOT NULL DEFAULT '0',
  `security` char(50) NOT NULL DEFAULT '0',
  `amount` char(50) NOT NULL DEFAULT '0',
  `status` char(50) NOT NULL DEFAULT 'To be despatched',
  PRIMARY KEY (`bill_id`),
  KEY `FK__user` (`customer`),
  CONSTRAINT `FK__user` FOREIGN KEY (`customer`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Dumping data for table hardware_supplier.bill: ~14 rows (approximately)
/*!40000 ALTER TABLE `bill` DISABLE KEYS */;
REPLACE INTO `bill` (`bill_id`, `customer`, `date`, `card`, `security`, `amount`, `status`) VALUES
	(16, 27, '2017-05-09 08:22:05', '1234123412341234', '123', '13.2', 'To be despatched'),
	(17, 27, '2017-05-09 08:22:54', '1234123412341234', '123', '55.95', 'To be despatched');
/*!40000 ALTER TABLE `bill` ENABLE KEYS */;

-- Dumping structure for table hardware_supplier.detail
CREATE TABLE IF NOT EXISTS `detail` (
  `bill` int(11) DEFAULT NULL,
  `item` int(11) DEFAULT NULL,
  KEY `FK__bill` (`bill`),
  KEY `FK__product` (`item`),
  CONSTRAINT `FK__bill` FOREIGN KEY (`bill`) REFERENCES `bill` (`bill_id`),
  CONSTRAINT `FK__product` FOREIGN KEY (`item`) REFERENCES `product` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table hardware_supplier.detail: ~21 rows (approximately)
/*!40000 ALTER TABLE `detail` DISABLE KEYS */;
REPLACE INTO `detail` (`bill`, `item`) VALUES
	(16, 1),
	(16, 2),
	(16, 3),
	(17, 14),
	(17, 13);
/*!40000 ALTER TABLE `detail` ENABLE KEYS */;

-- Dumping structure for table hardware_supplier.product
CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` char(50) DEFAULT NULL,
  `Description` char(250) DEFAULT NULL,
  `Price` char(50) DEFAULT NULL,
  `Available` char(50) DEFAULT 'Yes',
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Dumping data for table hardware_supplier.product: ~14 rows (approximately)
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
REPLACE INTO `product` (`product_id`, `Name`, `Description`, `Price`, `Available`) VALUES
	(1, 'Hammer', 'One Black Super Hammer', '2.90', 'Yes'),
	(2, 'Sand', 'One 25KG bag of sand', '5.10', 'Yes'),
	(3, 'Cement', '25KG bag of cement', '5.20', 'Yes'),
	(4, 'Copper Pipe', '25FT of copper pipe half inch', '45.00', 'No'),
	(5, 'Bathroom Sink', 'One complete bathroom sink', '450.00', 'No'),
	(6, 'Screw', 'a very long one', '1', 'No'),
	(7, 'Hub', 'A big one', '230', 'No'),
	(8, 'Hub', 'A small one', '135', 'Yes'),
	(9, 'Sink', 'A bad ass one', '75', 'No'),
	(10, 'Screw Driver', 'Very good quality', '30', 'No'),
	(12, 'Drill', 'Very powerfull', '250', 'No'),
	(13, 'Table', 'small', '50', 'Yes'),
	(14, 'Ducktape', 'Grey', '5.95', 'Yes');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;

-- Dumping structure for table hardware_supplier.user
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(50) NOT NULL DEFAULT '0',
  `surname` char(50) NOT NULL DEFAULT '0',
  `address` char(50) NOT NULL DEFAULT '0',
  `email` char(50) NOT NULL DEFAULT '0',
  `number` char(50) NOT NULL DEFAULT '0',
  `type` char(50) NOT NULL DEFAULT 'customer',
  `password` char(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- Dumping data for table hardware_supplier.user: ~5 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
REPLACE INTO `user` (`user_id`, `name`, `surname`, `address`, `email`, `number`, `type`, `password`) VALUES
	(19, 'Amilcar', 'Aponte', 'Kinsealy', 'amilcar@gmail.com', '0831793239', 'staff', '2d0e94963745e4ad51eab709c021f62f'),
	(20, 'Kyle', 'Goslin', 'Dublin', 'kyle@gmail.com', '0831793239', 'delivery', 'f9437dad103b2372ce9e80254e264724'),
	(21, 'Michael', 'McGloin', 'Malahide', 'michael@gmail.com', '0831793239', 'admin', 'e6502807b8e2473ca494201965c728bb'),
	(27, 'Steve', 'Jobs', 'Silicon Valley', 'steve@apple.com', '0831793239', 'customer', 'bf8b451734339d5144fdce34e52e7c46');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
