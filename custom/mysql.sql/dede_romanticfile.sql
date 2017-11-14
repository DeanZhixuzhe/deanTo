/*
Navicat MySQL Data Transfer

Source Server         : 云虚拟主机(年)
Source Server Version : 50148
Source Host           : hdm140015610.my3w.com:3306
Source Database       : hdm140015610_db

Target Server Type    : MYSQL
Target Server Version : 50148
File Encoding         : 65001

Date: 2017-11-12 07:57:53
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for dede_romanticfile
-- ----------------------------
DROP TABLE IF EXISTS `dede_romanticfile`;
CREATE TABLE `dede_romanticfile` (
  `rf_id` int(10) NOT NULL AUTO_INCREMENT,
  `ctime` int(10) NOT NULL,
  `youname` varchar(20) NOT NULL,
  `hename` varchar(20) NOT NULL,
  `youage` int(2) NOT NULL,
  `heage` int(2) NOT NULL,
  `youprofession` varchar(20) NOT NULL,
  `heprofession` varchar(20) DEFAULT NULL,
  `youphone` int(20) NOT NULL,
  `hephone` int(20) DEFAULT NULL,
  `youqq` varchar(30) NOT NULL,
  `heqq` varchar(30) DEFAULT NULL,
  `youaddress` varchar(100) DEFAULT NULL,
  `headdress` varchar(100) DEFAULT NULL,
  `hehobby` varchar(20) NOT NULL,
  `commonhobby` varchar(20) NOT NULL,
  `hespeciality` int(2) DEFAULT NULL,
  `youspeciality` int(2) DEFAULT NULL,
  `flower` varchar(20) NOT NULL,
  `color` varchar(20) NOT NULL,
  `style` int(20) NOT NULL,
  `star` int(20) NOT NULL,
  `song` varchar(30) NOT NULL,
  `movie` varchar(30) NOT NULL,
  `cartoon` varchar(100) NOT NULL,
  `experience` varchar(500) NOT NULL,
  `memorable` varchar(500) NOT NULL,
  `travel` varchar(500) NOT NULL,
  `place` varchar(500) NOT NULL,
  `wish` varchar(500) NOT NULL,
  `gift` varchar(500) NOT NULL,
  `photo50` varchar(500) NOT NULL,
  `romantictheme` varchar(30) NOT NULL,
  `cause` varchar(100) NOT NULL,
  `infosource` varchar(30) NOT NULL,
  `romanticcity` varchar(30) NOT NULL,
  `romantictool` varchar(30) NOT NULL,
  `proposedscenario` varchar(100) NOT NULL,
  `proposerequire` varchar(100) NOT NULL,
  `proposalform` varchar(30) NOT NULL,
  `isromanticmatter` varchar(100) NOT NULL,
  `proposebudget` varchar(30) NOT NULL,
  `proposetime` varchar(30) NOT NULL,
  `broswer` varchar(50) NOT NULL,
  `os` varchar(50) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `realip` varchar(20) NOT NULL,
  `agent` varchar(500) NOT NULL,
  PRIMARY KEY (`rf_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
