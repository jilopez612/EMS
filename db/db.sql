/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.32-MariaDB : Database - ems
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ems` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `ems`;

/*Table structure for table `ems_data` */

DROP TABLE IF EXISTS `ems_data`;

CREATE TABLE `ems_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `position` enum('CEO','CFO','CMO','COO','Human Resources','IT Manager','Marketing Manager','Product Manager','Sales Manager','Admin Assistant','Accountant','Bookkeeper','Business Analyst','Sales Representative','Jr Software Engineer','Sr Software Engineer') DEFAULT NULL,
  `emial` varchar(50) DEFAULT NULL,
  `salary` double(11,2) DEFAULT NULL,
  `bday` date DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `status` enum('Single','Married','Separated','Widowed') DEFAULT NULL,
  `number` varchar(11) DEFAULT NULL,
  `endcontract` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `ems_data` */

insert  into `ems_data`(`id`,`name`,`age`,`position`,`email`,`salary`,`bday`,`gender`,`status`,`number`,`endcontract`) values 
(1,'Tina McFarland',57,'CEO','tina.mcfarland@example.com',146319.12,'1966-10-25','Female','Married','09924224874','2037-02-22'),
(2,'Christine Smith',49,'CFO','christine.smith@example.com',120714.02,'1975-04-17','Male','Single','09764269413','2045-03-26'),
(3,'Gene Jones',58,'CMO','gene.jones@example.com',148024.47,'1966-08-17','Female','Married','09899865602','2044-02-11'),
(4,'Amber Green',56,'COO','amber.green@example.com',136812.87,'1967-06-28','Female','Separated','09170905029','2025-07-04'),
(5,'Tamara Phillips',22,'Bookkeeper','tamara.phillips@example.com',80785.50,'2002-03-08','Male','Married','09521256383','2043-10-09'),
(6,'Brian Patel',39,'Sales Representative','brian.patel@example.com',39106.41,'1985-04-11','Female','Single','09274895412','2039-01-17'),
(7,'Stacey Johnson',29,'Bookkeeper','stacey.johnson@example.com',52912.05,'1995-05-03','Male','Single','09104200348','2044-03-06'),
(8,'Leslie Bridges',25,'Accountant','leslie.bridges@example.com',48695.03,'1999-01-15','Male','Separated','09790557661','2048-11-13'),
(9,'Patricia Griffin',36,'Admin Assistant','patricia.griffin@example.com',61878.80,'1988-02-27','Male','Widowed','09448294580','2028-11-08'),
(10,'Lynn Morgan',53,'Bookkeeper','lynn.morgan@example.com',82128.44,'1971-09-18','Male','Single','09252919024','2039-03-03'),
(11,'Nancy King',25,'Sales Manager','nancy.king@example.com',90684.12,'1999-01-24','Male','Widowed','09554839785','2033-04-27'),
(12,'Christy Wood',54,'Sales Representative','christy.wood@example.com',66571.46,'1970-06-26','Female','Married','09234640514','2037-03-29'),
(13,'Kim Johnson',42,'Sales Manager','kim.johnson@example.com',66782.04,'1982-01-17','Male','Separated','09707038845','2043-05-23'),
(14,'Michael Martinez',36,'Admin Assistant','michael.martinez@example.com',77832.28,'1988-11-18','Female','Single','09234899751','2042-09-27'),
(15,'Russell Williams',41,'Jr Software Engineer','russell.williams@example.com',33934.73,'1983-11-22','Female','Widowed','09317595009','2052-06-06'),
(16,'Andrew Ramirez',51,'Sr Software Engineer','andrew.ramirez@example.com',70749.49,'1973-04-25','Female','Widowed','09550264380','2051-05-24'),
(17,'Lauren Dillon DDS',30,'Human Resources','lauren.dillon.dds@example.com',63323.61,'1994-09-06','Female','Married','09233662933','2043-05-13'),
(18,'Dr. Zachary Diaz',34,'Sr Software Engineer','dr..zachary.diaz@example.com',49250.65,'1990-07-14','Male','Separated','09382130625','2030-03-20'),
(19,'Christine Melton',22,'IT Manager','christine.melton@example.com',45094.97,'2002-05-11','Female','Widowed','09433271852','2044-05-13'),
(20,'Lori Small',28,'Human Resources','lori.small@example.com',71744.87,'1996-01-27','Female','Married','09960704483','2026-04-23'),
(21,'Julie Padilla',35,'Product Manager','julie.padilla@example.com',73550.55,'1989-02-01','Female','Married','09176066326','2038-04-21'),
(22,'Kaitlin Evans',52,'Bookkeeper','kaitlin.evans@example.com',47390.17,'1972-09-18','Female','Separated','09331639289','2045-11-01'),
(23,'James Schaefer',43,'Marketing Manager','james.schaefer@example.com',47352.62,'1981-03-12','Male','Married','09880573508','2040-08-04'),
(24,'Lindsay Anderson',51,'Sales Manager','lindsay.anderson@example.com',53647.09,'1973-04-12','Female','Single','09128694240','2038-05-16'),
(25,'Eric Hudson',26,'Sales Representative','eric.hudson@example.com',38235.76,'1998-05-09','Female','Married','09506396315','2053-01-30'),
(26,'Henry Roy',22,'Human Resources','henry.roy@example.com',85916.13,'2002-10-06','Female','Single','09270891114','2031-12-24'),
(27,'Casey Edwards',60,'Marketing Manager','casey.edwards@example.com',39524.05,'1964-05-28','Male','Separated','09879183196','2045-11-08'),
(28,'William Schwartz',47,'Human Resources','william.schwartz@example.com',76324.86,'1977-09-13','Male','Single','09202080033','2038-05-27'),
(29,'William Drake',40,'Business Analyst','william.drake@example.com',91258.89,'1984-11-22','Male','Single','09623410886','2035-03-30'),
(30,'Stephen Johnson',57,'Sr Software Engineer','stephen.johnson@example.com',60596.86,'1967-09-06','Female','Married','09643813744','2028-12-29'),
(31,'Patrick Martinez',37,'Accountant','patrick.martinez@example.com',66150.86,'1987-06-06','Female','Single','09596116621','2038-03-19'),
(32,'Jason Neal',47,'Product Manager','jason.neal@example.com',71965.73,'1977-05-08','Male','Separated','09841157447','2041-06-27'),
(33,'Derrick Lewis',49,'Jr Software Engineer','derrick.lewis@example.com',58659.66,'1975-09-09','Female','Widowed','09286771905','2033-12-18'),
(34,'Lauren Richard',56,'Human Resources','lauren.richard@example.com',44878.08,'1968-09-12','Male','Separated','09787807633','2044-05-08'),
(35,'Diana Brown',25,'Sales Manager','diana.brown@example.com',66952.56,'1999-06-16','Male','Separated','09551682031','2050-07-19'),
(36,'Dakota Lopez',51,'Admin Assistant','dakota.lopez@example.com',37748.47,'1973-05-02','Male','Married','09565718673','2051-12-29'),
(37,'Amanda Ortiz',30,'Jr Software Engineer','amanda.ortiz@example.com',66327.78,'1994-05-03','Male','Single','09558905450','2031-12-20'),
(38,'Carlos Vega',41,'Sales Manager','carlos.vega@example.com',54811.21,'1983-10-07','Female','Separated','09267515596','2033-03-24'),
(39,'Amber Chavez',46,'Sr Software Engineer','amber.chavez@example.com',92060.90,'1978-02-05','Male','Separated','09763278640','2039-05-25'),
(40,'Catherine Walsh',24,'Sr Software Engineer','catherine.walsh@example.com',31342.77,'2000-07-16','Female','Married','09941301163','2043-09-06'),
(41,'Reginald Rodriguez',45,'Admin Assistant','reginald.rodriguez@example.com',46565.61,'1979-05-07','Female','Separated','09608405158','2038-12-08'),
(42,'Christian Ramirez',21,'Accountant','christian.ramirez@example.com',46119.26,'2003-08-10','Female','Separated','09107501919','2049-03-03'),
(43,'Joseph Floyd',48,'Sales Manager','joseph.floyd@example.com',94327.99,'1976-07-05','Female','Married','09579460940','2034-05-09'),
(44,'Patrick Chase',57,'IT Manager','patrick.chase@example.com',66675.45,'1967-03-02','Male','Separated','09248391459','2025-10-28'),
(45,'Steven Conner',53,'Accountant','steven.conner@example.com',77664.65,'1971-08-23','Male','Married','09465619382','2052-11-21'),
(46,'Ralph Hunter',23,'Marketing Manager','ralph.hunter@example.com',35307.26,'2001-04-25','Male','Married','09609519698','2033-09-12'),
(47,'Gary Landry',38,'Accountant','gary.landry@example.com',85159.58,'1986-05-20','Female','Married','09317269890','2025-05-03'),
(48,'Dustin Gonzalez',42,'Human Resources','dustin.gonzalez@example.com',61147.57,'1982-12-08','Female','Separated','09851382676','2051-07-05'),
(49,'Gregory Perez',38,'Bookkeeper','gregory.perez@example.com',52883.99,'1986-01-12','Male','Separated','09472717584','2044-07-04'),
(50,'Jennifer Myers',39,'Product Manager','jennifer.myers@example.com',61217.90,'1985-04-13','Female','Married','09521013879','2028-05-09'),
(51,'Matthew Porter',32,'Business Analyst','matthew.porter@example.com',96178.22,'1992-06-28','Male','Separated','09707515696','2044-06-07'),
(52,'Gabrielle Mcfarland',25,'Product Manager','gabrielle.mcfarland@example.com',54732.27,'1999-10-21','Female','Separated','09367496880','2027-02-02'),
(53,'Stephen Davila',24,'Sr Software Engineer','stephen.davila@example.com',30779.67,'2000-04-22','Male','Widowed','09777974707','2042-04-18'),
(54,'Ruth Morgan',49,'Jr Software Engineer','ruth.morgan@example.com',40057.59,'1975-08-27','Female','Single','09163465286','2030-09-16'),
(55,'Wayne Lopez',45,'Accountant','wayne.lopez@example.com',57925.25,'1979-02-20','Female','Widowed','09301173978','2048-09-11'),
(56,'Kimberly Johnson',29,'Accountant','kimberly.johnson@example.com',72995.11,'1995-04-18','Female','Separated','09355884357','2033-09-19'),
(57,'Mr. Brian Jackson MD',57,'Human Resources','mr..brian.jackson.md@example.com',43491.28,'1967-07-01','Male','Widowed','09488908432','2043-10-04'),
(58,'Martin Ochoa',29,'Business Analyst','martin.ochoa@example.com',63569.45,'1995-07-20','Male','Single','09846126758','2027-06-03'),
(59,'Robert Anderson',54,'Business Analyst','robert.anderson@example.com',34305.35,'1970-11-27','Male','Widowed','09419904948','2031-03-25'),
(60,'Kristen Smith',31,'Business Analyst','kristen.smith@example.com',89554.35,'1993-07-17','Female','Single','09334153747','2053-02-06'),
(61,'Joseph Sherman',43,'Sr Software Engineer','joseph.sherman@example.com',42534.53,'1981-06-12','Female','Separated','09294551138','2036-10-19'),
(62,'Ashley Vega',45,'Accountant','ashley.vega@example.com',59398.61,'1979-04-11','Male','Separated','09170687876','2036-06-18'),
(63,'Katrina King',41,'Bookkeeper','katrina.king@example.com',94940.14,'1983-08-24','Female','Widowed','09535873932','2032-01-27'),
(64,'Jeanette Jones',26,'Sr Software Engineer','jeanette.jones@example.com',46720.35,'1998-11-01','Female','Separated','09841546480','2035-11-23'),
(65,'Michelle Morton',53,'Business Analyst','michelle.morton@example.com',91242.11,'1971-02-23','Female','Single','09530341178','2037-08-12'),
(66,'Brandy Gutierrez',50,'Product Manager','brandy.gutierrez@example.com',79206.12,'1974-12-06','Male','Married','09303626427','2052-08-23'),
(67,'Melissa Davis',53,'Product Manager','melissa.davis@example.com',72386.57,'1971-04-20','Male','Married','09799406211','2036-03-01'),
(68,'Carol Ward',30,'Jr Software Engineer','carol.ward@example.com',93566.65,'1994-08-08','Female','Separated','09539914265','2044-05-05'),
(69,'Wesley Ward',42,'Sales Representative','wesley.ward@example.com',71568.50,'1982-03-26','Female','Single','09833388090','2038-02-06'),
(70,'Susan Jones',37,'Sales Representative','susan.jones@example.com',60046.26,'1987-06-10','Male','Separated','09511284859','2042-05-22'),
(71,'Thomas Meadows',35,'Accountant','thomas.meadows@example.com',88749.29,'1989-05-08','Female','Widowed','09382911049','2032-05-19'),
(72,'Mary Randall',56,'Admin Assistant','mary.randall@example.com',40967.39,'1968-12-03','Female','Widowed','09426909556','2051-09-26'),
(73,'Kelly Cunningham',21,'Sr Software Engineer','kelly.cunningham@example.com',90940.17,'2003-12-25','Male','Widowed','09897455897','2050-07-01'),
(74,'Nathan Webb',33,'Marketing Manager','nathan.webb@example.com',52947.85,'1991-02-21','Male','Separated','09949555467','2050-01-28'),
(75,'Katie Estes',59,'Sales Manager','katie.estes@example.com',38650.00,'1965-10-25','Female','Widowed','09672249259','2046-07-25'),
(76,'Alyssa Cardenas MD',30,'Sr Software Engineer','alyssa.cardenas.md@example.com',88227.85,'1994-12-19','Male','Married','09110596492','2031-06-29'),
(77,'Daniel Howe',30,'Bookkeeper','daniel.howe@example.com',52396.21,'1994-08-24','Male','Separated','09780145678','2048-05-27'),
(78,'Peter Roberson',53,'Business Analyst','peter.roberson@example.com',87862.07,'1971-09-13','Female','Widowed','09414414047','2034-03-25'),
(79,'Daniel Sawyer',20,'Marketing Manager','daniel.sawyer@example.com',72487.87,'2004-05-23','Male','Married','09884865759','2054-03-21'),
(80,'Mitchell Lee',32,'Marketing Manager','mitchell.lee@example.com',59363.11,'1992-08-26','Female','Single','09567786275','2049-08-17'),
(81,'David Moon',55,'Jr Software Engineer','david.moon@example.com',66748.95,'1969-09-13','Male','Married','09734941240','2040-10-14'),
(82,'Amanda Gonzalez',60,'Product Manager','amanda.gonzalez@example.com',50786.81,'1964-03-18','Female','Separated','09305819361','2052-08-24'),
(83,'Douglas Moore',24,'Admin Assistant','douglas.moore@example.com',70304.11,'2000-01-05','Female','Single','09904081260','2030-05-03'),
(85,'Amber Fitzpatrick',30,'Jr Software Engineer','amber.fitzpatrick@example.com',61494.79,'1994-07-03','Female','Married','09386027053','2048-10-02'),
(86,'Karen Escobar',31,'Marketing Manager','karen.escobar@example.com',76604.76,'1993-02-12','Male','Single','09274243101','2049-09-30'),
(87,'Robert Davis',21,'IT Manager','robert.davis@example.com',99561.79,'2003-04-14','Female','Married','09376307040','2045-06-10'),
(88,'John Taylor',24,'IT Manager','john.taylor@example.com',75897.86,'2000-08-27','Female','Married','09842226064','2030-10-25'),
(89,'Joshua Marshall',39,'Accountant','joshua.marshall@example.com',42038.49,'1985-04-22','Female','Separated','09990528534','2045-10-06'),
(90,'Maria Serrano',34,'Business Analyst','maria.serrano@example.com',45535.39,'1990-01-22','Female','Married','09154191121','2034-04-29'),
(91,'Derek Jones',60,'Business Analyst','derek.jones@example.com',99469.98,'1964-02-17','Male','Married','09250959876','2043-02-15'),
(92,'Stephen Johnson',38,'Sales Manager','stephen.johnson@example.com',51946.56,'1986-06-06','Male','Widowed','09386321718','2042-04-22'),
(93,'Brandon York',50,'Bookkeeper','brandon.york@example.com',42672.35,'1974-06-26','Female','Married','09362970821','2042-12-11'),
(95,'Amanda Anderson',50,'Product Manager','amanda.anderson@example.com',55916.35,'1974-10-01','Male','Separated','09424665722','2053-10-26'),
(96,'Angela Hall',31,'Accountant','angela.hall@example.com',50250.42,'1993-07-11','Male','Widowed','09624810228','2049-07-03'),
(97,'Brian Davis',22,'IT Manager','brian.davis@example.com',73198.07,'2002-06-15','Female','Widowed','09578208413','2047-02-26'),
(98,'Roy Carr',54,'Product Manager','roy.carr@example.com',92092.26,'1970-01-22','Male','Single','09844832522','2041-09-11'),
(100,'Jessica Griffith',23,'Jr Software Engineer','jessica.griffith@example.com',87371.49,'2000-06-25','Female','Widowed','09520466312','2046-02-01');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
