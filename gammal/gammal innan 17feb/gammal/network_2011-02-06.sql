# Sequel Pro dump
# Version 2210
# http://code.google.com/p/sequel-pro
#
# Host: localhost (MySQL 5.1.44)
# Database: network
# Generation Time: 2011-02-06 17:58:27 +0100
# ************************************************************

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table ad
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ad`;

CREATE TABLE `ad` (
  `id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(200) NOT NULL,
  `body` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `publishdate` date NOT NULL,
  `lastdate` date NOT NULL,
  `salarytype` varchar(100) NOT NULL,
  `typeofemployment` varchar(100) NOT NULL,
  `orgnr_fk` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `ad` WRITE;
/*!40000 ALTER TABLE `ad` DISABLE KEYS */;
INSERT INTO `ad` (`id`,`title`,`body`,`city`,`publishdate`,`lastdate`,`salarytype`,`typeofemployment`,`orgnr_fk`)
VALUES
	(1,'Vi söker php kodare','Nu söker vi dig som är en fena på php.','stockholm','2010-12-06','0000-00-00','','',''),
	(2,'Webbyrå söker javascriptess','Vi har ett akut projekt och måste anställa dig nu.','göteborg','2011-01-02','0000-00-00','','',''),
	(3,'Är du duktig på javascript','Hör då av dig till oss..','malmö','2011-01-04','0000-00-00','','',''),
	(4,'Vi söker dig som kan css','Är css det bästa du vet, då är du rätt person för oss.','skåne','0000-00-00','0000-00-00','','','');

/*!40000 ALTER TABLE `ad` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table company
# ------------------------------------------------------------

DROP TABLE IF EXISTS `company`;

CREATE TABLE `company` (
  `orgnr` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `businessarea` varchar(100) NOT NULL,
  `adress` varchar(100) NOT NULL,
  `postalcode` int(11) NOT NULL,
  `city` varchar(50) NOT NULL,
  `adressvisible` bit(1) NOT NULL,
  `phone` int(11) NOT NULL,
  `phonevisible` bit(1) NOT NULL,
  `size` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `website` varchar(50) NOT NULL,
  `presentation` text,
  `image` varchar(50) DEFAULT NULL,
  `regdate` date NOT NULL,
  `lastonline` datetime NOT NULL,
  `isonline` bit(1) NOT NULL,
  `membervisible` bit(1) NOT NULL,
  PRIMARY KEY (`orgnr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table district
# ------------------------------------------------------------

DROP TABLE IF EXISTS `district`;

CREATE TABLE `district` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

LOCK TABLES `district` WRITE;
/*!40000 ALTER TABLE `district` DISABLE KEYS */;
INSERT INTO `district` (`id`,`name`)
VALUES
	(1,'Alla'),
	(2,'Stockholm'),
	(3,'Göteborg'),
	(4,'Malmö'),
	(5,'Blekinge'),
	(6,'Dalarna'),
	(7,'Gotland'),
	(8,'Gävleborg'),
	(9,'Halland'),
	(10,'Jämtland'),
	(11,'Jönköping'),
	(12,'Kalmar'),
	(13,'Kronoberg'),
	(14,'Norrbotten'),
	(15,'Skåne'),
	(16,'Södermanland'),
	(17,'Uppsala'),
	(18,'Värmland'),
	(19,'Västerbotten'),
	(20,'Västernorrland'),
	(21,'Västmanland'),
	(22,'Västra Götaland'),
	(23,'Örebro'),
	(24,'Östergötland');

/*!40000 ALTER TABLE `district` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table education
# ------------------------------------------------------------

DROP TABLE IF EXISTS `education`;

CREATE TABLE `education` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `school` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `personnr_fk` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table message
# ------------------------------------------------------------

DROP TABLE IF EXISTS `message`;

CREATE TABLE `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` varchar(11) NOT NULL,
  `reciever` varchar(11) NOT NULL,
  `header` varchar(200) NOT NULL,
  `body` text NOT NULL,
  `date` datetime NOT NULL,
  `read` bit(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table person
# ------------------------------------------------------------

DROP TABLE IF EXISTS `person`;

CREATE TABLE `person` (
  `personnummer` varchar(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `civil` int(11) DEFAULT NULL,
  `street` varchar(50) NOT NULL,
  `coadress` varchar(50) NOT NULL,
  `proffession` varchar(255) NOT NULL,
  `postalcode` int(11) NOT NULL,
  `city` varchar(50) NOT NULL,
  `adressvisible` int(1) NOT NULL,
  `phone` int(11) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `phonevisible` int(1) NOT NULL,
  `email` varchar(50) NOT NULL,
  `website` varchar(100) NOT NULL,
  `presentationheader` varchar(50) DEFAULT NULL,
  `presentation` text,
  `searchwords` varchar(255) NOT NULL,
  `drivinglicence` int(1) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `regdate` date NOT NULL,
  `lastonline` datetime NOT NULL,
  `isonline` int(1) NOT NULL,
  `membervisible` int(1) NOT NULL,
  `districtid_fk` int(11) NOT NULL,
  `age` int(3) NOT NULL,
  PRIMARY KEY (`personnummer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `person` WRITE;
/*!40000 ALTER TABLE `person` DISABLE KEYS */;
INSERT INTO `person` (`personnummer`,`username`,`password`,`firstname`,`lastname`,`gender`,`civil`,`street`,`coadress`,`proffession`,`postalcode`,`city`,`adressvisible`,`phone`,`mobile`,`phonevisible`,`email`,`website`,`presentationheader`,`presentation`,`searchwords`,`drivinglicence`,`image`,`regdate`,`lastonline`,`isonline`,`membervisible`,`districtid_fk`,`age`)
VALUES
	('7309255672','Daniel','541c57960bb997942655d14e3b9607f9','Daniel','Jansson','1',1,'Ödmårdsvägen 5','','Webbutvecklare',16737,'Stockholm',0,760194710,'0760194710',0,'janzon.daniel@gmail.com','','Passionerad webbutvecklare','Just nu studerar jag webbutveckling på Jensen Education yrkeshögskola. En tredjedel av utbildningen är avsatt för praktik.Innehållet i min utbildning består av både teori och föreläsningar (backend/frontend) och projektarbeten. När det gäller backend så arbetar vi med php/mysql och i frontend html, css, jquery och ajax. Webbutveckling är bland det bästa jag vet, det är ett stort intresse hos mig och något som jag verkligen brinner för.<br />\n<br />\nJag har tidigare arbetat som originalare men har blivit mer och mer intresserad av att arbeta med webben. Jag ser det som ett bra komplement att ha den bakgrunden.Som person är jag ansvarstagande, noggrann, kreativ och positiv. Jag tycker om att jobba hårt, se resultat och driva projekt. Min ambition är att arbeta som webbutvecklare i framtiden. Jag vill vara med och utveckla framtidens webbapplikationer och har ett stort driv att hela tiden utvecklas.','',1,NULL,'0000-00-00','0000-00-00 00:00:00',0,0,0,37);

/*!40000 ALTER TABLE `person` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table person_has_favourites
# ------------------------------------------------------------

DROP TABLE IF EXISTS `person_has_favourites`;

CREATE TABLE `person_has_favourites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `personr_fk` varchar(11) NOT NULL,
  `favouritenr_fk` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table person_wantwork_district
# ------------------------------------------------------------

DROP TABLE IF EXISTS `person_wantwork_district`;

CREATE TABLE `person_wantwork_district` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `personnr_fk` varchar(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table poll
# ------------------------------------------------------------

DROP TABLE IF EXISTS `poll`;

CREATE TABLE `poll` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `count` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

LOCK TABLES `poll` WRITE;
/*!40000 ALTER TABLE `poll` DISABLE KEYS */;
INSERT INTO `poll` (`id`,`name`,`count`)
VALUES
	(1,'PHP',24),
	(2,'ASP',18),
	(3,'Java',15),
	(4,'Python',5),
	(5,'Ruby',7),
	(6,'.NET',22),
	(7,'C++',6);

/*!40000 ALTER TABLE `poll` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table profession
# ------------------------------------------------------------

DROP TABLE IF EXISTS `profession`;

CREATE TABLE `profession` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `company` varchar(50) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `ongoing` bit(1) NOT NULL,
  `description` text NOT NULL,
  `personnr_fk` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;






/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
