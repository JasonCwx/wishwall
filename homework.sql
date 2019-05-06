# Host: localhost  (Version: 5.5.53)
# Date: 2019-04-03 23:54:20
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "wish"
#

DROP TABLE IF EXISTS `wish`;
CREATE TABLE `wish` (
  `id` tinyint(5) unsigned zerofill NOT NULL AUTO_INCREMENT COMMENT '编号主键自增长',
  `username` varchar(30) NOT NULL COMMENT '?û?????׼Ϊ????Ψһ',
  `content` varchar(500) NOT NULL COMMENT '?û???Ը??????',
  `ctime` datetime NOT NULL COMMENT '????ʱ??',
  `colorId` enum('a1','a2','a3','a4','a5') NOT NULL DEFAULT 'a5' COMMENT '??????????ɫ',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `username_2` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

#
# Data for table "wish"
#

INSERT INTO `wish` VALUES (00001,'wfgwefg','awegaweg','2019-04-03 23:02:09','a2'),(00002,'小明','嘻嘻嘻哈哈哈','2019-04-03 23:14:32','a1'),(00003,'小新','自学PHP成功转行，加油！','2019-04-03 23:14:55','a5'),(00004,'小红','不知道该说什么。。。','2019-04-03 23:15:14','a4'),(00005,'小张','这下真不知道该说什么好了。。','2019-04-03 23:15:34','a3'),(00006,'老王','今晚去哪一家吃饭好呢？','2019-04-03 23:15:50','a5'),(00007,'小李','看来是时候出场了！！','2019-04-03 23:16:14','a5'),(00011,'小黄','努力自学PHP，一定要成功！','2019-04-03 23:18:55','a5'),(00012,'小廖','爱啊我二哥卡时间段和阿送货阿克苏加大V你啊我呢个会时代俊','2019-04-03 23:22:48','a5');
