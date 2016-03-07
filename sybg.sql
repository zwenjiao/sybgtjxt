-- MySQL dump 10.13  Distrib 5.5.20, for Win32 (x86)
--
-- Host: localhost    Database: sybg
-- ------------------------------------------------------
-- Server version	5.5.20-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `aid` varchar(20) NOT NULL,
  `aname` varchar(20) NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES ('20131308082','费玺'),('20131308081','张文娇'),('20131308085','姚静');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assignment`
--

DROP TABLE IF EXISTS `assignment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assignment` (
  `assignmentid` int(11) NOT NULL AUTO_INCREMENT,
  `cname` varchar(20) NOT NULL,
  `pro` varchar(20) NOT NULL,
  `rname` varchar(20) NOT NULL,
  `content` text NOT NULL,
  `aim` text NOT NULL,
  `grade` varchar(20) NOT NULL,
  PRIMARY KEY (`assignmentid`,`cname`,`pro`,`grade`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assignment`
--

LOCK TABLES `assignment` WRITE;
/*!40000 ALTER TABLE `assignment` DISABLE KEYS */;
INSERT INTO `assignment` VALUES (1,'c语言','计算机科学与技术','NAT','实现NAT','学生会组建网络','2013'),(2,'高等数学1','计算机科学与技术','数学','数学好没烦恼','学会数学','2013'),(1,'密码学','计算机科学与技术','学习','特','额额','2013'),(4,'影视鉴赏','计算机科学与技术','影视学习','看电影','学会营业','2013'),(5,'计算机网络','计算机科学与技术','学会使用网络','网络好','学习internet','2013'),(3,'大气概论','计算机科学与技术','大气概论','大气学习','学会大气','2013');
/*!40000 ALTER TABLE `assignment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `college`
--

DROP TABLE IF EXISTS `college`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `college` (
  `pro` varchar(20) NOT NULL,
  `col` varchar(20) NOT NULL,
  PRIMARY KEY (`pro`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `college`
--

LOCK TABLES `college` WRITE;
/*!40000 ALTER TABLE `college` DISABLE KEYS */;
INSERT INTO `college` VALUES ('计算机科学与技术','计软院'),('网络工程','计软院'),('软件工程','计软院');
/*!40000 ALTER TABLE `college` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `correct`
--

DROP TABLE IF EXISTS `correct`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `correct` (
  `tid` varchar(20) NOT NULL,
  `assignmentid` int(11) NOT NULL,
  `grade` varchar(20) NOT NULL,
  `mark` text NOT NULL,
  `pro` varchar(20) NOT NULL,
  `cname` varchar(20) NOT NULL,
  `sid` varchar(20) NOT NULL,
  `report_grade` int(11) NOT NULL,
  PRIMARY KEY (`tid`,`assignmentid`,`grade`,`pro`,`cname`,`sid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `correct`
--

LOCK TABLES `correct` WRITE;
/*!40000 ALTER TABLE `correct` DISABLE KEYS */;
INSERT INTO `correct` VALUES ('001',1,'2013','做的不错','计算机科学与技术','c语言','2013001',0),('001',2,'2013','做的不错','计算机科学与技术','高等数学1','2013001',0),('001',3,'2013','做的不错','计算机科学与技术','大气概论','2013001',0),('001',4,'2013','做的不错','计算机科学与技术','影视鉴赏','2013001',30),('001',5,'2013','做的不错','计算机科学与技术','计算机网络','2013001',30);
/*!40000 ALTER TABLE `correct` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course` (
  `cname` varchar(20) NOT NULL,
  `pro` varchar(20) NOT NULL,
  `grade` varchar(20) NOT NULL,
  PRIMARY KEY (`cname`,`pro`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course`
--

LOCK TABLES `course` WRITE;
/*!40000 ALTER TABLE `course` DISABLE KEYS */;
INSERT INTO `course` VALUES ('计算机网络','计算机科学与技术','2013'),('c语言','计算机科学与技术','2013'),('大气概论','计算机科学与技术','2013'),('影视鉴赏','计算机科学与技术','2013'),('高等数学1','计算机科学与技术','2013');
/*!40000 ALTER TABLE `course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `releaseassignment`
--

DROP TABLE IF EXISTS `releaseassignment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `releaseassignment` (
  `tid` varchar(20) NOT NULL,
  `assignmentid` int(11) NOT NULL AUTO_INCREMENT,
  `readate` date NOT NULL,
  `cutdate` date NOT NULL,
  `pro` varchar(20) NOT NULL,
  `grade` varchar(20) NOT NULL,
  `cname` varchar(20) NOT NULL,
  PRIMARY KEY (`tid`,`assignmentid`,`pro`,`grade`,`cname`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `releaseassignment`
--

LOCK TABLES `releaseassignment` WRITE;
/*!40000 ALTER TABLE `releaseassignment` DISABLE KEYS */;
INSERT INTO `releaseassignment` VALUES ('001',5,'2015-09-11','2015-09-18','计算机科学与技术','2013','计算机网络'),('001',1,'2015-09-11','2015-09-19','计算机科学与技术','2013','c语言'),('001',4,'2015-09-08','2015-09-12','计算机科学与技术','2013','影视鉴赏'),('001',3,'2015-09-08','2015-09-17','计算机科学与技术','2013','大气概论'),('001',2,'2015-09-11','2015-09-23','计算机科学与技术','2013','高等数学1'),('001',1,'2015-09-15','2015-09-17','计算机科学与技术','2013','密码学');
/*!40000 ALTER TABLE `releaseassignment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `report`
--

DROP TABLE IF EXISTS `report`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `report` (
  `sid` varchar(20) NOT NULL,
  `grade` varchar(20) NOT NULL,
  `assignmentid` int(11) NOT NULL,
  `rname` varchar(20) NOT NULL,
  `step` text NOT NULL,
  `result` text NOT NULL,
  `analyse` text NOT NULL,
  `pro` varchar(20) NOT NULL,
  `cname` varchar(20) NOT NULL,
  PRIMARY KEY (`sid`,`assignmentid`,`grade`,`pro`,`cname`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `report`
--

LOCK TABLES `report` WRITE;
/*!40000 ALTER TABLE `report` DISABLE KEYS */;
INSERT INTO `report` VALUES ('2013001','2013',5,'学会使用网络','打开电脑','成功完成','组建网络很复杂','计算机科学与技术','计算机网络'),('2013001','2013',4,'影视学习','Java语言的使用','完美解决','Java语言较难理解','计算机科学与技术','影视鉴赏'),('2013001','2013',3,'大气概论','认识链表','成功实现','链表是一种较常见的一种数据类型','计算机科学与技术','大气概论'),('2013001','2013',1,'NAT','我','我','我','计算机科学与技术','c语言'),('2013001','2013',2,'数学','认识链表','成功实现','链表是一种较常见的一种数据类型','计算机科学与技术','高等数学1');
/*!40000 ALTER TABLE `report` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `selectcourse`
--

DROP TABLE IF EXISTS `selectcourse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `selectcourse` (
  `sid` varchar(20) NOT NULL,
  `cname` varchar(20) NOT NULL,
  `pro` varchar(20) NOT NULL,
  `grade` varchar(20) NOT NULL,
  PRIMARY KEY (`sid`,`cname`,`pro`,`grade`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `selectcourse`
--

LOCK TABLES `selectcourse` WRITE;
/*!40000 ALTER TABLE `selectcourse` DISABLE KEYS */;
INSERT INTO `selectcourse` VALUES ('2013001','c语言','计算机科学与技术','2013'),('2013001','大气概论','计算机科学与技术','2013'),('2013001','影视鉴赏','计算机科学与技术','2013'),('2013001','计算机网络','计算机科学与技术','2013'),('2013001','高等数学1','计算机科学与技术','2013');
/*!40000 ALTER TABLE `selectcourse` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student` (
  `sid` varchar(20) NOT NULL,
  `sname` varchar(20) NOT NULL,
  `class` varchar(20) NOT NULL,
  `grade` varchar(20) NOT NULL,
  `pro` varchar(20) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` VALUES ('2013001','杨飞','3','2013','计算机科学与技术'),('2013002','小郭','3','2013','计算机科学与技术'),('2013003','小王','3','2013','计算机科学与技术'),('2013004','阿菲','2','2013','计算机科学与技术'),('2013005','华仔','1','2013','计算机科学与技术'),('20131308065','王凡','3','2013','计算机科学与技术'),('20131308066','王飞','3','2013','计算机科学与技术'),('20131308067','王华','3','2013','计算机科学与技术'),('20131308068','王磊','3','2013','计算机科学与技术'),('20131308069','王榕','3','2013','计算机科学与技术'),('20131308070','王晓芳','3','2013','计算机科学与技术'),('20131308071','王杨峰','3','2013','计算机科学与技术'),('20131308072','叶正舟','3','2013','计算机科学与技术'),('20131308073','刘璐','3','2013','计算机科学与技术'),('20131308074','刘一文','3','2013','计算机科学与技术'),('20131308075','刘昕玥','3','2013','计算机科学与技术'),('20131308077','杨城','3','2013','计算机科学与技术'),('20131308078','杨飞','3','2013','计算机科学与技术'),('20131308079','杨沁竺','3','2013','计算机科学与技术'),('20131308080','张涛','3','2013','计算机科学与技术'),('20131308081','张文娇','3','2013','计算机科学与技术'),('20131308082','费玺','3','2013','计算机科学与技术'),('20131308083','封启凡','3','2013','计算机科学与技术'),('20131308084','贺澎','3','2013','计算机科学与技术'),('20131308085','姚静','3','2013','计算机科学与技术'),('20131308086','郭书源','3','2013','计算机科学与技术'),('20131308087','郭倩云','3','2013','计算机科学与技术'),('20131308088','徐举','3','2013','计算机科学与技术'),('20131308089','徐磊','3','2013','计算机科学与技术'),('20131308090','徐舒','3','2013','计算机科学与技术'),('20131308091','徐玮','3','2013','计算机科学与技术'),('20131308092','徐敏皓','3','2013','计算机科学与技术'),('20131308093','袁琪','3','2013','计算机科学与技术'),('20131308094','曹磊','3','2013','计算机科学与技术'),('20131308095','韩旭东','3','2013','计算机科学与技术'),('20131308096','惠嘉彬','3','2013','计算机科学与技术'),('20121308053','陈思有','3','2013','计算机科学与技术');
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `submitreport`
--

DROP TABLE IF EXISTS `submitreport`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `submitreport` (
  `sid` varchar(20) NOT NULL,
  `assignmentid` int(11) NOT NULL,
  `subdate` date NOT NULL,
  `cname` varchar(20) NOT NULL,
  `pro` varchar(20) NOT NULL,
  `grade` varchar(20) NOT NULL,
  `is_modify` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sid`,`assignmentid`,`cname`,`pro`,`grade`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `submitreport`
--

LOCK TABLES `submitreport` WRITE;
/*!40000 ALTER TABLE `submitreport` DISABLE KEYS */;
INSERT INTO `submitreport` VALUES ('2013001',1,'2015-09-16','c语言','计算机科学与技术','2013',0),('2013001',3,'2015-09-16','大气概论','计算机科学与技术','2013',0),('2013001',4,'2015-09-16','影视鉴赏','计算机科学与技术','2013',1),('2013001',5,'2015-09-16','计算机网络','计算机科学与技术','2013',1),('2013001',2,'2015-09-24','高等数学1','计算机科学与技术','2013',1);
/*!40000 ALTER TABLE `submitreport` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teachcourse`
--

DROP TABLE IF EXISTS `teachcourse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teachcourse` (
  `tid` varchar(20) NOT NULL,
  `cname` varchar(20) NOT NULL,
  `pro` varchar(20) NOT NULL,
  `grade` varchar(20) NOT NULL,
  PRIMARY KEY (`tid`,`cname`,`pro`,`grade`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teachcourse`
--

LOCK TABLES `teachcourse` WRITE;
/*!40000 ALTER TABLE `teachcourse` DISABLE KEYS */;
INSERT INTO `teachcourse` VALUES ('001','c语言','计算机科学与技术','2013'),('001','大气概论','计算机科学与技术','2013'),('001','影视鉴赏','计算机科学与技术','2013'),('001','计算机网络','计算机科学与技术','2013'),('001','高等数学1','计算机科学与技术','2013');
/*!40000 ALTER TABLE `teachcourse` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teacher` (
  `tid` varchar(20) NOT NULL,
  `tname` varchar(20) NOT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teacher`
--

LOCK TABLES `teacher` WRITE;
/*!40000 ALTER TABLE `teacher` DISABLE KEYS */;
INSERT INTO `teacher` VALUES ('002','李含光'),('001','郑玉'),('003','韩进');
/*!40000 ALTER TABLE `teacher` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `uid` varchar(20) NOT NULL,
  `role` varchar(20) NOT NULL,
  `pwd` varchar(20) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('20131308082','admin','20131308082'),('2013001','stu','2013'),('002','tea','002'),('001','tea','001'),('003','tea','003');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-09-19 21:14:16
