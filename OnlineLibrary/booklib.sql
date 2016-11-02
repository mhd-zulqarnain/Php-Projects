/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.5.5-10.1.10-MariaDB : Database - booklib
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`booklib` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `booklib`;

/*Table structure for table `books` */

DROP TABLE IF EXISTS `books`;

CREATE TABLE `books` (
  `book_ID` int(11) NOT NULL AUTO_INCREMENT,
  `book_title` tinytext NOT NULL,
  `book_author` tinytext NOT NULL,
  `cat_ID` int(11) NOT NULL,
  PRIMARY KEY (`book_ID`),
  KEY `cat_ID` (`cat_ID`),
  CONSTRAINT `books_ibfk_1` FOREIGN KEY (`cat_ID`) REFERENCES `categories` (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

/*Data for the table `books` */

insert  into `books`(`book_ID`,`book_title`,`book_author`,`cat_ID`) values (1,'Bara Afsanay','Ibnay Muneeb',2),(2,'Base Camp','Tariq Ismail Sagar',4),(3,'Iblees','Nimra Ahmad',2),(4,'Red Eye','Ahmed Shaheer',2),(5,'Caravan','MA Rahat',4),(6,'Sitamgar','Muhammad Farooq Anjum',2),(7,'Namal','Nimra Ahmad',5),(8,'Lalkar','Tahir Javed Mughal',4),(9,'Total Zero','Mazhar Kaleem MA',4),(10,'Idrak','Aliya Tauseef',2),(11,'Dasht e Aarzoo','Iqra Sagheer Ahmed',5),(12,'Black Day','Mazhar Kaleem MA',5),(13,'Mata e Dil','Nabila Abar Raja',5),(14,'Danger Plan','Khalid Noor',4),(15,'Fast Agent','Khalid Noor',4),(16,'Piyas','Aliya Tauseef',5),(17,'Sila','Aimen Ali',5),(18,'Action Agency','Mazhar Kaleem M.A',4),(19,'Adam Zad','Aitbar Sajid',2),(20,'Aatish Parast','Wajiha Sehar',2),(21,'Target Kahuta','Tariq Ismail Sagar',5),(22,'Safaid Gulab','Mehmood Zafar Iqbal Hashmi',5),(23,'Akass Bail','Shireen Haider',5),(24,'Sehar Ek Istara Hay','Umaira Ahmad',5),(25,'Hasil','Umaira Ahmed',5),(26,'Zindagi Gulzar Hey','Umaira Ahmed',5),(27,'Bazigar','Muhammad Azam Khan',5),(28,'Deewana Iblees','Sarfraz Ahmad Rahi',5),(29,'Aatish Parast','Aslam Rahi',5),(30,'Hum Safar','Farhat Ishtiaq',5),(31,'Doosri Fasal','Aleem ul Haq Haqqi',5),(32,'Mere Khaab Reza Reza','Maha Malik',2),(33,'Dr. Sabir Ali Hashmi','Zulmat Kada',2),(34,'Nadan Lahori','Ibnay Muneeb',6),(35,'Deewan e Ghalib','Mirza Ghalib',6),(36,'Kuliat e Iqbal','Allama Iqbal',6),(37,'Diwali','M.A Rahat',3),(38,'Champa Kali','A Hameed',3),(39,'Call Bell','Seema Ghazal',3),(40,'Muhammad Bin Qasim','Naseem Hijazi',1),(41,'Kaleesa Aur Aag','Naseem Hijazi',1),(42,'Daastan e Mujahid','Naseem Hijazi',1),(43,'Akhri Maarka','Naseem Hijazi',1),(44,'Yousaf Bin Tashfeen','Naseem Hijazi',1),(45,'Qaiser o Kisra','Naseem Hijazi',1),(46,'Safaid Jazeera','Naseem Hijazi',1),(47,'Bichoo','M.A Rahat',3),(48,'Harry Potter and the Chamber of Secrets','J.K Rowling',3),(49,'Akhri Chatan','Naseem Hijazi',1);

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(100) NOT NULL,
  PRIMARY KEY (`cat_id`),
  KEY `cat_id` (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `categories` */

insert  into `categories`(`cat_id`,`cat_name`) values (1,'Historical Fiction'),(2,'Litrature'),(3,'Mystries'),(4,'Thrillers'),(5,'Social Romantic'),(6,'Poetry');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
