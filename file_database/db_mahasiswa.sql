# Host: localhost  (Version 5.5.5-10.4.11-MariaDB)
# Date: 2021-03-04 15:18:26
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "biodata"
#

DROP TABLE IF EXISTS `biodata`;
CREATE TABLE `biodata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nim` int(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `umur` int(3) NOT NULL,
  `hobi` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

#
# Data for table "biodata"
#

INSERT INTO `biodata` VALUES (1,1812500187,'Rizki Pandiwa','Kebayoran lama',21,'Traveling'),(2,181250758,'Bimo Suprobo','Tangerang Selatan',21,'Bersepeda'),(3,18123004,'mustofa','ciledug',22,'olahraga');
