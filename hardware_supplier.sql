-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.16-MariaDB - mariadb.org binary distribution
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Dumping data for table hardware_supplier.bill: ~14 rows (approximately)
/*!40000 ALTER TABLE `bill` DISABLE KEYS */;
INSERT INTO `bill` (`bill_id`, `customer`, `date`, `card`, `security`, `amount`, `status`) VALUES
	(2, 25, '2016-12-25 21:45:46', 'a', 'b', 'c', 'To be dispatched'),
	(3, 25, '2016-12-25 21:54:24', '12345', '234', '47.9', 'To be dispatched'),
	(4, 25, '2016-12-25 21:57:13', '12516', '234', '8', 'Delivered'),
	(5, 25, '2016-12-25 22:19:08', 'a', 'c', '2.9', 'To be dispatched'),
	(6, 25, '2016-12-25 22:24:08', 'a', 'c', '452.9', 'Delivered'),
	(7, 25, '2016-12-25 22:24:46', 'a', 'c', '452.9', 'Delivered'),
	(8, 25, '2016-12-25 22:26:42', 'amilcar', 'amilcar', '10.3', 'Delivered'),
	(9, 25, '2016-12-25 23:37:17', '1234', 'aponte', '50.1', 'Dispatched'),
	(10, 25, '2016-12-26 19:47:59', '123', '432', '2.9', 'To be dispatched'),
	(11, 25, '2016-12-26 21:25:32', '123', '564', '930', 'To be despatched'),
	(12, 26, '2016-12-30 18:48:30', '2345', '345', '535.9', 'To be despatched'),
	(13, 25, '2016-12-30 18:59:50', '1234', '123', '2.9', 'To be despatched'),
	(14, 25, '2016-12-30 19:01:24', '1234', '1234', '232.9', 'To be despatched'),
	(15, 26, '2016-12-30 20:35:52', 'gdgvcvv', '434', '187.9', 'To be despatched');
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
INSERT INTO `detail` (`bill`, `item`) VALUES
	(2, 3),
	(8, 3),
	(8, 2),
	(9, 2),
	(9, 4),
	(10, 1),
	(11, 10),
	(11, 5),
	(11, 5),
	(12, 1),
	(12, 7),
	(12, 4),
	(12, 12),
	(12, 2),
	(12, 1),
	(13, 1),
	(14, 1),
	(14, 7),
	(15, 1),
	(15, 8),
	(15, 13);
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
INSERT INTO `product` (`product_id`, `Name`, `Description`, `Price`, `Available`) VALUES
	(1, 'Hammer', 'One Black Super Hammer', '2.90', 'Yes'),
	(2, 'Sand', 'One 25KG bag of sand', '5.10', 'Yes'),
	(3, 'Cement', '25KG bag of cement', '5.20', 'Yes'),
	(4, 'Copper Pipe', '25FT of copper pipe half inch', '45.00', 'No'),
	(5, 'Bathroom Sink', 'One complete bathroom ink', '450.00', 'No'),
	(6, 'Screw', 'a very long one', '1', 'No'),
	(7, 'Hub', 'A big one', '230', 'No'),
	(8, 'Hub', 'A small one', '135', 'Yes'),
	(9, 'Sink', 'A bad ass one', '75', 'No'),
	(10, 'Screw Driver', 'It does it without you', '30', 'No'),
	(11, 'a', 'b', 'c', 'No'),
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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- Dumping data for table hardware_supplier.user: ~3 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`user_id`, `name`, `surname`, `address`, `email`, `number`, `type`, `password`) VALUES
	(19, 'Amilcar', 'Aponte', 'Kinsealy', 'amilcar', '0831793239', 'staff', '2d0e94963745e4ad51eab709c021f62f'),
	(20, 'Kyle', 'Goslin', 'Dublin', 'kyle', '2126954400', 'delivery', 'f9437dad103b2372ce9e80254e264724'),
	(21, 'Michael', 'McGloin', 'Malahide', 'michael', '087227', 'admin', 'e6502807b8e2473ca494201965c728bb'),
	(25, 'Mayela', 'Izaguirre', 'Drumcondra', 'd', 'e', 'customer', 'db875d6788e0bd89df0439393bb0f194'),
	(26, 'Dani', 'Ela', 'Mi casa', 'Miemail@tuemail.com', '098766543', 'customer', 'da86355a1040bec079c6e663c819c032');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
hardware_supplier