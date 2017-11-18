-- MySQL dump 10.13  Distrib 5.6.33, for Linux (x86_64)
--
-- Host: localhost    Database: topshop
-- ------------------------------------------------------
-- Server version	5.6.33

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
-- Table structure for table `channel`
--

DROP TABLE IF EXISTS `channel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `channel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cname` varchar(32) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `channel`
--

LOCK TABLES `channel` WRITE;
/*!40000 ALTER TABLE `channel` DISABLE KEYS */;
INSERT INTO `channel` VALUES (49,'箱包皮具',0,'0'),(2,'名贵腕表',0,'0'),(3,'服装鞋帽',0,'0'),(4,'配件配饰',0,'0'),(5,'美妆香氛',0,'0'),(6,'品味生活',0,'0'),(38,'相机',36,'0_6_36'),(8,'提包',49,'0_49'),(9,'拉杆箱',49,'0_49'),(10,'机械表',2,'0_2'),(11,'石英表',2,'0_2'),(12,'上衣',3,'0_3'),(13,'裤装',3,'0_3'),(14,'内衣裤',3,'0_3'),(15,'鞋靴',3,'0_3'),(16,'眼镜',4,'0_4'),(17,'腰带',4,'0_4'),(18,'发饰',4,'0_4'),(19,'笔具',4,'0_4'),(20,'香水',5,'0_5'),(21,'护肤',5,'0_5'),(22,'彩妆',5,'0_5'),(23,'酒饮馆',6,'0_6'),(24,'家居馆',6,'0_6'),(25,'运动馆',6,'0_6'),(26,'保健馆',6,'0_6'),(36,'数码馆',6,'0_6'),(29,'肩包',49,'0_49'),(37,'配件',36,'0_6_36'),(35,'围丝',49,'0_49'),(34,'其他',4,'0_4'),(33,'钱包/钥匙包',49,'0_49'),(39,'电脑',36,'0_6_36'),(42,'mp3',39,'0_6_36_39'),(43,'mp4',39,'0_6_36_39'),(44,'mp5',39,'0_6_36_39'),(45,'苹果',42,'0_6_36_39_42'),(46,'炫音',42,'0_6_36_39_42'),(48,'欧派',42,'0_42');
/*!40000 ALTER TABLE `channel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detail`
--

DROP TABLE IF EXISTS `detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `oid` int(11) DEFAULT NULL,
  `gid` int(11) DEFAULT NULL,
  `name` varchar(32) DEFAULT NULL,
  `price` double(6,2) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=78 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail`
--

LOCK TABLES `detail` WRITE;
/*!40000 ALTER TABLE `detail` DISABLE KEYS */;
INSERT INTO `detail` VALUES (21,30,61,'Armani阿玛尼印记女士淡香水50ml',489.00,1),(22,31,64,'飞天茅台 53度 500ML',1159.00,1),(23,32,4,'SAINT LAURENT 圣罗兰 女士蓝色真皮单肩包 3260',3000.00,1),(24,33,12,'GUCCI（古驰） 男式啡色织物双G图案手拎包',9999.99,1),(25,34,50,'【官方授权】ALEXANDRE DE PARIS 亚历山大 塑胶',1440.00,1),(26,34,52,'COACH 蔻驰 多色波点图案iphone5手机壳 F64741',359.00,1),(27,35,72,'徕卡（Leica） V-Lux4 数码相机',9999.99,1),(28,36,70,'赛钛客（Saitek）美加狮 Mad Catz Cyborg R',1199.00,1),(29,36,68,'联想（Lenovo） Horizon 27英寸智能桌面（i5-3',867.00,1),(30,37,39,'Swarovski施华洛世奇红色心形零钱包1047565',453.00,1),(31,38,51,'BVLGARI宝格丽夜茉莉女士香水 30ml',295.00,1),(32,39,55,'BURBERRY 巴宝莉 棕色女士短款风衣 3811716 17',1929.00,1),(33,39,8,'欧米茄Omega 星座系列机械男表',9999.99,1),(35,41,61,'Armani阿玛尼印记女士淡香水50ml',489.00,1),(36,42,66,'Maruman RZ 2013新款男士高尔夫套杆 独家授权',9998.00,1),(37,43,18,'浪琴 Longines 嘉岚石英女表L4.209.4.87.6',2342.00,1),(38,44,8,'欧米茄Omega 星座系列机械男表',9999.99,1),(39,45,8,'欧米茄Omega 星座系列机械男表',9999.99,1),(59,57,13,'GUCCI（古驰） 男式棕色pvc配真皮双G图案肩背斜挎',9999.99,4),(41,47,39,'Swarovski施华洛世奇红色心形零钱包1047565',453.00,1),(42,48,58,'Calvin Klein 卡文克莱 女款红色渲染图案长款丝巾 A',1430.00,3),(43,48,49,'GUCCI（古驰） 中性款pvc米色配棕色双G图案银色双G扣头腰',2380.00,1),(60,58,65,'罗莱家纺 全棉色织大提花双人1.5米床婚庆六件套 T581R-6',3690.00,33),(58,56,8,'欧米茄Omega 星座系列机械男表',9999.99,4),(47,50,53,'Juicy Couture 橘滋 多色花朵图案iPad保护套 Y',519.00,1),(48,51,49,'GUCCI（古驰） 中性款pvc米色配棕色双G图案银色双G扣头腰',2380.00,4),(49,51,55,'BURBERRY 巴宝莉 棕色女士短款风衣 3811716 17',1929.00,1),(50,52,4,'SAINT LAURENT 圣罗兰 女士蓝色真皮单肩包 3260',3000.00,2),(51,52,6,'GUCCI（古驰） 女士蓝色织物配咖啡真皮滚边手提肩背包 211',4999.00,1),(52,52,3,'Salvatore Ferragamo 菲拉格慕女士黑色牛皮单肩',2342.00,1),(53,52,5,'GUCCI（古驰） 男式啡色真皮双G图案肩背斜挎休闲包 2236',2000.00,3),(54,53,55,'BURBERRY 巴宝莉 棕色女士短款风衣 3811716 17',1929.00,1),(55,53,8,'欧米茄Omega 星座系列机械男表',9999.99,5),(56,54,6,'GUCCI（古驰） 女士蓝色织物配咖啡真皮滚边手提肩背包 211',4999.00,1),(61,58,8,'欧米茄Omega 星座系列机械男表',9999.99,1),(62,59,65,'罗莱家纺 全棉色织大提花双人1.5米床婚庆六件套 T581R-6',3690.00,4),(64,61,61,'Armani阿玛尼印记女士淡香水50ml',489.00,2),(67,64,32,'古驰Gucci G-Timeless系列中码石英男式手表 YA1',9999.99,2),(68,65,1,'GUCCI 古驰 中性黑色肩背斜挎包 146309 F4F5R ',3549.00,2),(70,67,1,'GUCCI 古驰 中性黑色肩背斜挎包 146309 F4F5R ',3549.00,7),(71,67,49,'GUCCI（古驰） 中性款pvc米色配棕色双G图案银色双G扣头腰',2380.00,1),(72,68,9,'浪琴Longines 瑰丽系列自动机械男表',9999.99,1),(73,69,48,'GUCCI 古驰 女款经典时尚金属粉色镜架茶色渐变镜片太阳镜 G',1345.00,1),(74,70,4,'SAINT LAURENT 圣罗兰 女士蓝色真皮单肩包 3260',3000.00,2),(75,71,55,'BURBERRY 巴宝莉 棕色女士短款风衣 3811716 17',1929.00,2),(76,72,6,'GUCCI（古驰） 女士蓝色织物配咖啡真皮滚边手提肩背包 211',4999.00,1),(77,73,2,'GUCCI（古驰） 女士米色织物配咖啡色真皮滚边手提包 2240',500.00,1);
/*!40000 ALTER TABLE `detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discuss`
--

DROP TABLE IF EXISTS `discuss`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `discuss` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `gid` int(11) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `addtime` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discuss`
--

LOCK TABLES `discuss` WRITE;
/*!40000 ALTER TABLE `discuss` DISABLE KEYS */;
INSERT INTO `discuss` VALUES (1,41,8,'超喜欢。。。。。。。。。',1392074004,0),(3,41,9,'占楼占沙发，必须要顶！\r\n浪琴Longines 瑰丽系列自动机械男表浪琴Longines 瑰丽系列自动机械男表浪琴Longines 瑰丽系列自动机械男表浪琴Longines 瑰丽系列自动机械男表',1392074208,0),(6,48,65,'高端大气上档次',1392079620,0),(8,40,24,'bucuo',1392087807,1),(9,41,10,'增加一下人去',1392284586,0),(10,41,10,'顶啊',1392284826,1),(12,63,65,'我日 ',1392289958,1),(13,47,10,'ffff',1392297418,1),(14,47,10,'fff',1392297434,1),(15,64,1,'帅死了太贵了',1392314845,0),(16,40,6,'哈哈，不错哦',1405788502,0),(17,40,55,'bucuo!',1412431082,0),(18,73,2,'质量很差',1486980555,0);
/*!40000 ALTER TABLE `discuss` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `goods`
--

DROP TABLE IF EXISTS `goods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) DEFAULT NULL,
  `goods` varchar(32) DEFAULT NULL,
  `company` varchar(50) DEFAULT NULL,
  `descr` text,
  `price` double(8,2) DEFAULT NULL,
  `picname` varchar(255) DEFAULT NULL,
  `state` tinyint(1) NOT NULL DEFAULT '1',
  `store` int(11) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `clicknum` int(11) DEFAULT NULL,
  `addtime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `goods`
--

LOCK TABLES `goods` WRITE;
/*!40000 ALTER TABLE `goods` DISABLE KEYS */;
INSERT INTO `goods` VALUES (1,8,'GUCCI 古驰 中性黑色肩背斜挎包 146309 F4F5R ','美国','国际名牌 GUCCI 古驰！随手卖！ 中性黑色肩背斜挎包 146309 F4F5R 1060 YMGUCCI 古驰 中性黑色肩背斜挎包 146309 F4F5R 1060 YMGUCCI 古驰 中性黑色肩背斜挎包 146309 F4F5R 1060 YMGUCCI 古驰 中性黑色肩背斜挎包 146309 F4F5R 1060 YMGUCCI 古驰 中性黑色肩背斜挎包 146309 F4F5R 1060 YMGUCCI 古驰 中性黑色肩背斜挎包 146309 F4F5R 1060 YMGUCCI 古驰 中性黑色肩背斜挎包 146309 F4F5R 1060 YMGUCCI 古驰 中性黑色肩背斜挎包 146309 F4F5R 1060 YMGUCCI 古驰 中性黑色肩背斜挎包 146309 F4F5R 1060 YMGUCCI 古驰 中性黑色肩背斜挎包 146309 F4F5R 1060 YMGUCCI 古驰 中性黑色肩背斜挎包 146309 F4F5R 1060 YMGUCCI 古驰 中性黑色肩背斜挎包 146309 F4F5R 1060 YMGUCCI 古驰 中性黑色肩背斜挎包 146309 F4F5R 1060 YMGUCCI 古驰 中性黑色肩背斜挎包 146309 F4F5R 1060 YMGUCCI 古驰 中性黑色肩背斜挎包 146309 F4F5R 1060 YMGUCCI 古驰 中性黑色肩背斜挎包 146309 F4F5R 1060 YMGUCCI 古驰 中性黑色肩背斜挎包 146309 F4F5R 1060 YMGUCCI 古驰 中性黑色肩背斜挎包 146309 F4F5R 1060 YMGUCCI 古驰 中性黑色肩背斜挎包 146309 F4F5R 1060 YMGUCCI 古驰 中性黑色肩背斜挎包 146309 F4F5R 1060 YMGUCCI 古驰 中性黑色肩背斜挎包 146309 F4F5R 1060 YMGUCCI 古驰 中性黑色肩背斜挎包 146309 F4F5R 1060 YM',3549.00,'13917237901634.jpg',1,10,0,438,1391723790),(2,8,'GUCCI（古驰） 女士米色织物配咖啡色真皮滚边手提包 2240','美国','国际名牌 GUCCI 古驰！随手卖！ 中性黑色肩背斜挎包 146309 F4F5R 1060 YMGUCCI 古驰 中性黑色肩背斜挎包 146309 F4F5R 1060 YMGUCCI 古驰 中性黑色肩背斜挎包 146309 F4F5R 1060 YMGUCCI 古驰 中性黑色肩背斜挎包 146309 F4F5R 1060 YMGUCCI 古驰 中性黑色肩背斜挎包 146309 F4F5R 1060 YMGUCCI 古驰 中性黑色肩背斜挎包 146309 F4F5R 1060 YMGUCCI 古驰 中性黑色肩背斜挎包 146309 F4F5R 1060 YMGUCCI 古驰 中性黑色肩背斜挎包 146309 F4F5R 1060 YMGUCCI 古驰 中性黑色肩背斜挎包 146309 F4F5R 1060 YMGUCCI 古驰 中性黑色肩背斜挎包 146309 F4F5R 1060 YMGUCCI 古驰 中性黑色肩背斜挎包 146309 F4F5R 1060 YMGUCCI 古驰 中性黑色肩背斜挎包 146309 F4F5R 1060 YMGUCCI 古驰 中性黑色肩背斜挎包 146309 F4F5R 1060 YMGUCCI 古驰 中性黑色肩背斜挎包 146309 F4F5R 1060 YMGUCCI 古驰 中性黑色肩背斜挎包 146309 F4F5R 1060 YMGUCCI 古驰 中性黑色肩背斜挎包 146309 F4F5R 1060 YMGUCCI 古驰 中性黑色肩背斜挎包 146309 F4F5R 1060 YMGUCCI 古驰 中性黑色肩背斜挎包 146309 F4F5R 1060 YMGUCCI 古驰 中性黑色肩背斜挎包 146309 F4F5R 1060 YMGUCCI 古驰 中性黑色肩背斜挎包 146309 F4F5R 1060 YMGUCCI 古驰 中性黑色肩背斜挎包 146309 F4F5R 1060 YMGUCCI 古驰 中性黑色肩背斜挎包 146309 F4F5R 1060 YM',500.00,'13918601668242.jpg',2,4,0,355,1391724049),(3,8,'Salvatore Ferragamo 菲拉格慕女士黑色牛皮单肩','英国','Salvatore Ferragamo 菲拉格慕女士黑色牛皮单肩斜跨包 22B558 0494402 mlSalvatore Ferragamo 菲拉格慕女士黑色牛皮单肩斜跨包 22B558 0494402 mlSalvatore Ferragamo 菲拉格慕女士黑色牛皮单肩斜跨包 22B558 0494402 mlSalvatore Ferragamo 菲拉格慕女士黑色牛皮单肩斜跨包 22B558 0494402 mlSalvatore Ferragamo 菲拉格慕女士黑色牛皮单肩斜跨包 22B558 0494402 mlSalvatore Ferragamo 菲拉格慕女士黑色牛皮单肩斜跨包 22B558 0494402 ml',2342.00,'13918603554190.jpg',2,7,0,362,1391724118),(50,18,'【官方授权】ALEXANDRE DE PARIS 亚历山大 塑胶','法国','【官方授权】ALEXANDRE DE PARIS 亚历山大 塑胶镶水晶山茶花6公分发夹 AA6-15146-03 O【官方授权】ALEXANDRE DE PARIS 亚历山大 塑胶镶水晶山茶花6公分发夹 AA6-15146-03 O【官方授权】ALEXANDRE DE PARIS 亚历山大 塑胶镶水晶山茶花6公分发夹 AA6-15146-03 O【官方授权】ALEXANDRE DE PARIS 亚历山大 塑胶镶水晶山茶花6公分发夹 AA6-15146-03 O【官方授权】ALEXANDRE DE PARIS 亚历山大 塑胶镶水晶山茶花6公分发夹 AA6-15146-03 O',1440.00,'13918610073624.jpg',1,78,0,354,1391861008),(4,8,'SAINT LAURENT 圣罗兰 女士蓝色真皮单肩包 3260','英国','SAINT LAURENT 圣罗兰 女士蓝色真皮单肩包 326076 4908SAINT LAURENT 圣罗兰 女士蓝色真皮单肩包 326076 4908SAINT LAURENT 圣罗兰 女士蓝色真皮单肩包 326076 4908SAINT LAURENT 圣罗兰 女士蓝色真皮单肩包 326076 4908SAINT LAURENT 圣罗兰 女士蓝色真皮单肩包 326076 4908SAINT LAURENT 圣罗兰 女士蓝色真皮单肩包 326076 4908SAINT LAURENT 圣罗兰 女士蓝色真皮单肩包 326076 4908',3000.00,'13918604147130.jpg',2,2,0,318,1391724177),(48,16,'GUCCI 古驰 女款经典时尚金属粉色镜架茶色渐变镜片太阳镜 G','美国','GUCCI 古驰 女款经典时尚金属粉色镜架茶色渐变镜片太阳镜 GG2899/S 0Q342 58 ymGUCCI 古驰 女款经典时尚金属粉色镜架茶色渐变镜片太阳镜 GG2899/S 0Q342 58 ymGUCCI 古驰 女款经典时尚金属粉色镜架茶色渐变镜片太阳镜 GG2899/S 0Q342 58 ymGUCCI 古驰 女款经典时尚金属粉色镜架茶色渐变镜片太阳镜 GG2899/S 0Q342 58 ymGUCCI 古驰 女款经典时尚金属粉色镜架茶色渐变镜片太阳镜 GG2899/S 0Q342 58 ymGUCCI 古驰 女款经典时尚金属粉色镜架茶色渐变镜片太阳镜 GG2899/S 0Q342 58 ymGUCCI 古驰 女款经典时尚金属粉色镜架茶色渐变镜片太阳镜 GG2899/S 0Q342 58 ym',1345.00,'13918608041829.jpg',1,5,0,382,1391860804),(49,17,'GUCCI（古驰） 中性款pvc米色配棕色双G图案银色双G扣头腰','美国','GUCCI（古驰） 中性款pvc米色配棕色双G图案银色双G扣头腰带 114984 KGD1R 9643 HZ 100cmGUCCI（古驰） 中性款pvc米色配棕色双G图案银色双G扣头腰带 114984 KGD1R 9643 HZ 100cmGUCCI（古驰） 中性款pvc米色配棕色双G图案银色双G扣头腰带 114984 KGD1R 9643 HZ 100cmGUCCI（古驰） 中性款pvc米色配棕色双G图案银色双G扣头腰带 114984 KGD1R 9643 HZ 100cmGUCCI（古驰） 中性款pvc米色配棕色双G图案银色双G扣头腰带 114984 KGD1R 9643 HZ 100cmGUCCI（古驰） 中性款pvc米色配棕色双G图案银色双G扣头腰带 114984 KGD1R 9643 HZ 100cm',2380.00,'13918608822213.jpg',1,10,0,360,1391860882),(5,29,'GUCCI（古驰） 男式啡色真皮双G图案肩背斜挎休闲包 2236','美国','GUCCI（古驰） 男式啡色真皮双G图案肩背斜挎休闲包 223666 BNX1G 2145 HZGUCCI（古驰） 男式啡色真皮双G图案肩背斜挎休闲包 223666 BNX1G 2145 HZGUCCI（古驰） 男式啡色真皮双G图案肩背斜挎休闲包 223666 BNX1G 2145 HZGUCCI（古驰） 男式啡色真皮双G图案肩背斜挎休闲包 223666 BNX1G 2145 HZ',2000.00,'13917242946253.jpg',1,54,0,347,1391724294),(51,20,'BVLGARI宝格丽夜茉莉女士香水 30ml','法国','BVLGARI宝格丽夜茉莉女士香水 30mlBVLGARI宝格丽夜茉莉女士香水 30mlBVLGARI宝格丽夜茉莉女士香水 30mlBVLGARI宝格丽夜茉莉女士香水 30mlBVLGARI宝格丽夜茉莉女士香水 30mlBVLGARI宝格丽夜茉莉女士香水 30mlBVLGARI宝格丽夜茉莉女士香水 30mlBVLGARI宝格丽夜茉莉女士香水 30ml',295.00,'13918611501789.jpg',1,5,0,360,1391861150),(52,34,'COACH 蔻驰 多色波点图案iphone5手机壳 F64741','美国','COACH 蔻驰 多色波点图案iphone5手机壳 F64741-MTI rsCOACH 蔻驰 多色波点图案iphone5手机壳 F64741-MTI rsCOACH 蔻驰 多色波点图案iphone5手机壳 F64741-MTI rsCOACH 蔻驰 多色波点图案iphone5手机壳 F64741-MTI rsCOACH 蔻驰 多色波点图案iphone5手机壳 F64741-MTI rsCOACH 蔻驰 多色波点图案iphone5手机壳 F64741-MTI rsCOACH 蔻驰 多色波点图案iphone5手机壳 F64741-MTI rs',359.00,'13918612768851.jpg',1,89,0,340,1391861276),(6,8,'GUCCI（古驰） 女士蓝色织物配咖啡真皮滚边手提肩背包 211','美国','GUCCI（古驰） 女士蓝色织物配咖啡真皮滚边手提肩背包 211944 FAFXE mlGUCCI（古驰） 女士蓝色织物配咖啡真皮滚边手提肩背包 211944 FAFXE mlGUCCI（古驰） 女士蓝色织物配咖啡真皮滚边手提肩背包 211944 FAFXE mlGUCCI（古驰） 女士蓝色织物配咖啡真皮滚边手提肩背包 211944 FAFXE mlGUCCI（古驰） 女士蓝色织物配咖啡真皮滚边手提肩背包 211944 FAFXE ml',4999.00,'13918602301812.jpg',1,4,0,336,1391724357),(53,34,'Juicy Couture 橘滋 多色花朵图案iPad保护套 Y','法国','Juicy Couture 橘滋 多色花朵图案iPad保护套 YTRUT321-974 rsJuicy Couture 橘滋 多色花朵图案iPad保护套 YTRUT321-974 rsJuicy Couture 橘滋 多色花朵图案iPad保护套 YTRUT321-974 rsJuicy Couture 橘滋 多色花朵图案iPad保护套 YTRUT321-974 rsJuicy Couture 橘滋 多色花朵图案iPad保护套 YTRUT321-974 rsJuicy Couture 橘滋 多色花朵图案iPad保护套 YTRUT321-974 rsJuicy Couture 橘滋 多色花朵图案iPad保护套 YTRUT321-974 rsJuicy Couture 橘滋 多色花朵图案iPad保护套 YTRUT321-974 rsJuicy Couture 橘滋 多色花朵图案iPad保护套 YTRUT321-974 rsJuicy Couture 橘滋 多色花朵图案iPad保护套 YTRUT321-974 rs',519.00,'13918614025133.jpg',1,6,0,334,1391861403),(7,11,'欧米茄Omega 星座系列石英女表','美国','欧米茄Omega 星座系列石英女表欧米茄Omega 星座系列石英女表欧米茄Omega 星座系列石英女表欧米茄Omega 星座系列石英女表欧米茄Omega 星座系列石英女表',18095.00,'13918570947486.jpg',1,10,0,308,1391804492),(8,10,'欧米茄Omega 星座系列机械男表','美国','欧米茄Omega 星座系列机械男表欧米茄Omega 星座系列机械男表欧米茄Omega 星座系列机械男表欧米茄Omega 星座系列机械男表',24948.00,'13918571198465.jpg',1,1,0,438,1391804831),(9,10,'浪琴Longines 瑰丽系列自动机械男表','北京','浪琴Longines 瑰丽系列自动机械男表浪琴Longines 瑰丽系列自动机械男表浪琴Longines 瑰丽系列自动机械男表浪琴Longines 瑰丽系列自动机械男表',34334.00,'13918571326411.jpg',1,4,0,376,1391804875),(10,10,'美度MIDO舵手系列自动机械男表','南京','美度MIDO舵手系列自动机械男表美度MIDO舵手系列自动机械男表美度MIDO舵手系列自动机械男表美度MIDO舵手系列自动机械男表美度MIDO舵手系列自动机械男表',1009.00,'13918571479428.jpg',1,54,0,378,1391804937),(11,10,'美度MIDO 都瑞系列中性表 M2130.4.26.4','美国','美度MIDO 都瑞系列中性表 M2130.4.26.4美度MIDO 都瑞系列中性表 M2130.4.26.4美度MIDO 都瑞系列中性表 M2130.4.26.4美度MIDO 都瑞系列中性表 M2130.4.26.4美度MIDO 都瑞系列中性表 M2130.4.26.4',5008.00,'13918571642866.jpg',1,2,0,361,1391804981),(12,8,'GUCCI（古驰） 男式啡色织物双G图案手拎包','日本','GUCCI（古驰） 男式啡色织物双G图案手拎包 189669...',18035.00,'13918600284487.jpg',2,2,0,360,1391807161),(13,29,'GUCCI（古驰） 男式棕色pvc配真皮双G图案肩背斜挎','法国','GUCCI（古驰） 男式棕色pvc配真皮双G图案肩背斜挎...GUCCI（古驰） 男式棕色pvc配真皮双G图案肩背斜挎...GUCCI（古驰） 男式棕色pvc配真皮双G图案肩背斜挎...GUCCI（古驰） 男式棕色pvc配真皮双G图案肩背斜挎...',32424.00,'13918599034191.jpg',1,4,0,324,1391807266),(14,29,'GUCCI（古驰） 男式啡色真皮双G图案肩背斜挎','上海','GUCCI（古驰） 男式啡色真皮双G图案肩背斜挎休闲...GUCCI（古驰） 男式啡色真皮双G图案肩背斜挎休闲...GUCCI（古驰） 男式啡色真皮双G图案肩背斜挎休闲...GUCCI（古驰） 男式啡色真皮双G图案肩背斜挎休闲...GUCCI（古驰） 男式啡色真皮双G图案肩背斜挎休闲...GUCCI（古驰） 男式啡色真皮双G图案肩背斜挎休闲...GUCCI（古驰） 男式啡色真皮双G图案肩背斜挎休闲...GUCCI（古驰） 男式啡色真皮双G图案肩背斜挎休闲...GUCCI（古驰） 男式啡色真皮双G图案肩背斜挎休闲...GUCCI（古驰） 男式啡色真皮双G图案肩背斜挎休闲...GUCCI（古驰） 男式啡色真皮双G图案肩背斜挎休闲...GUCCI（古驰） 男式啡色真皮双G图案肩背斜挎休闲...',9998.00,'13918073234279.jpg',1,33,0,292,1391807323),(15,8,'ZEGNA SPORT 杰尼亚 男式蓝色织物手提肩背包','土耳其','ZEGNA SPORT 杰尼亚 男式蓝色织物手提肩背包 C08...ZEGNA SPORT 杰尼亚 男式蓝色织物手提肩背包 C08...ZEGNA SPORT 杰尼亚 男式蓝色织物手提肩背包 C08...ZEGNA SPORT 杰尼亚 男式蓝色织物手提肩背包 C08...ZEGNA SPORT 杰尼亚 男式蓝色织物手提肩背包 C08...ZEGNA SPORT 杰尼亚 男式蓝色织物手提肩背包 C08...ZEGNA SPORT 杰尼亚 男式蓝色织物手提肩背包 C08...ZEGNA SPORT 杰尼亚 男式蓝色织物手提肩背包 C08...ZEGNA SPORT 杰尼亚 男式蓝色织物手提肩背包 C08...',12035.00,'13918600733541.jpg',2,10,0,316,1391807444),(16,10,'美度MIDO 完美系列 自动机械女表 ','日本','美度MIDO 完美系列 自动机械女表 美度MIDO 完美系列 自动机械女表 美度MIDO 完美系列 自动机械女表 美度MIDO 完美系列 自动机械女表 美度MIDO 完美系列 自动机械女表 美度MIDO 完美系列 自动机械女表 美度MIDO 完美系列 自动机械女表 ',3458.00,'13918572754770.jpg',1,23,0,397,1391857275),(17,10,'浪琴Longines 名匠系列 自动机械女表L21285577','日本','浪琴Longines 名匠系列 自动机械女表L21285577浪琴Longines 名匠系列 自动机械女表L21285577浪琴Longines 名匠系列 自动机械女表L21285577浪琴Longines 名匠系列 自动机械女表L21285577浪琴Longines 名匠系列 自动机械女表L21285577浪琴Longines 名匠系列 自动机械女表L21285577',1805.00,'13918573805876.jpg',1,1,0,495,1391857380),(18,10,'浪琴 Longines 嘉岚石英女表L4.209.4.87.6','南京','浪琴 Longines 嘉岚石英女表L4.209.4.87.6浪琴 Longines 嘉岚石英女表L4.209.4.87.6浪琴 Longines 嘉岚石英女表L4.209.4.87.6浪琴 Longines 嘉岚石英女表L4.209.4.87.6',2342.00,'13918574196984.jpg',1,34,0,389,1391857419),(19,10,'豪雅TAG Heuer 卡莱拉系列机械男表 WV211A.BA0','北京','豪雅TAG Heuer 卡莱拉系列机械男表 WV211A.BA0787豪雅TAG Heuer 卡莱拉系列机械男表 WV211A.BA0787豪雅TAG Heuer 卡莱拉系列机械男表 WV211A.BA0787豪雅TAG Heuer 卡莱拉系列机械男表 WV211A.BA0787豪雅TAG Heuer 卡莱拉系列机械男表 WV211A.BA0787',14350.00,'13918574891631.jpg',1,34,0,352,1391857489),(20,10,'梅花Titoni 宇宙系列女表 728SY-DB-019','美国','梅花Titoni 宇宙系列女表 728SY-DB-019梅花Titoni 宇宙系列女表 728SY-DB-019梅花Titoni 宇宙系列女表 728SY-DB-019梅花Titoni 宇宙系列女表 728SY-DB-019',23234.00,'13918576886134.jpg',1,60,0,341,1391857689),(21,10,'浪琴(Longines)嘉岚系列石英女表L4.209.2.12.','美国','浪琴(Longines)嘉岚系列石英女表L4.209.2.12.7浪琴(Longines)嘉岚系列石英女表L4.209.2.12.7浪琴(Longines)嘉岚系列石英女表L4.209.2.12.7浪琴(Longines)嘉岚系列石英女表L4.209.2.12.7浪琴(Longines)嘉岚系列石英女表L4.209.2.12.7浪琴(Longines)嘉岚系列石英女表L4.209.2.12.7',15635.00,'13918577552429.jpg',1,5,0,318,1391857755),(22,11,'雷达RADO表真系列女装石英腕表 R27655732','英国','雷达RADO表真系列女装石英腕表 R27655732雷达RADO表真系列女装石英腕表 R27655732雷达RADO表真系列女装石英腕表 R27655732雷达RADO表真系列女装石英腕表 R27655732',13650.00,'13918580822953.jpg',1,34,0,326,1391858082),(23,11,'古驰Gucci U-Play系列中码石英女表 YA129407','美国','古驰Gucci U-Play系列中码石英女表 YA129407古驰Gucci U-Play系列中码石英女表 YA129407古驰Gucci U-Play系列中码石英女表 YA129407古驰Gucci U-Play系列中码石英女表 YA129407古驰Gucci U-Play系列中码石英女表 YA129407古驰Gucci U-Play系列中码石英女表 YA129407',13547.00,'13918581473359.jpg',1,8,0,366,1391858148),(24,10,'LONGINES 浪琴Master名匠系列全自动机械男表 L2.','日本','LONGINES 浪琴Master名匠系列全自动机械男表 L2.673.4.78.3LONGINES 浪琴Master名匠系列全自动机械男表 L2.673.4.78.3LONGINES 浪琴Master名匠系列全自动机械男表 L2.673.4.78.3LONGINES 浪琴Master名匠系列全自动机械男表 L2.673.4.78.3LONGINES 浪琴Master名匠系列全自动机械男表 L2.673.4.78.3LONGINES 浪琴Master名匠系列全自动机械男表 L2.673.4.78.3LONGINES 浪琴Master名匠系列全自动机械男表 L2.673.4.78.3LONGINES 浪琴Master名匠系列全自动机械男表 L2.673.4.78.3LONGINES 浪琴Master名匠系列全自动机械男表 L2.673.4.78.3LONGINES 浪琴Master名匠系列全自动机械男表 L2.673.4.78.3LONGINES 浪琴Master名匠系列全自动机械男表 L2.673.4.78.3LONGINES 浪琴Master名匠系列全自动机械男表 L2.673.4.78.3LONGINES 浪琴Master名匠系列全自动机械男表 L2.673.4.78.3LONGINES 浪琴Master名匠系列全自动机械男表 L2.673.4.78.3LONGINES 浪琴Master名匠系列全自动机械男表 L2.673.4.78.3LONGINES 浪琴Master名匠系列全自动机械男表 L2.673.4.78.3LONGINES 浪琴Master名匠系列全自动机械男表 L2.673.4.78.3LONGINES 浪琴Master名匠系列全自动机械男表 L2.673.4.78.3LONGINES 浪琴Master名匠系列全自动机械男表 L2.673.4.78.3LONGINES 浪琴Master名匠系列全自动机械男表 L2.673.4.78.3LONGINES 浪琴Master名匠系列全自动机械男表 L2.673.4.78.3LONGINES 浪琴Master名匠系列全自动机械男表 L2.673.4.78.3LONGINES 浪琴Master名匠系列全自动机械男表 L2.673.4.78.3LONGINES 浪琴Master名匠系列全自动机械男表 L2.673.4.78.3',7874.00,'13918582139795.jpg',1,2,0,306,1391858213),(25,10,'梅花（TITONI）Cosmo宇宙系列男装自动机械镀金腕表787','南京','梅花（TITONI）Cosmo宇宙系列男装自动机械镀金腕表787 SY-019梅花（TITONI）Cosmo宇宙系列男装自动机械镀金腕表787 SY-019梅花（TITONI）Cosmo宇宙系列男装自动机械镀金腕表787 SY-019梅花（TITONI）Cosmo宇宙系列男装自动机械镀金腕表787 SY-019梅花（TITONI）Cosmo宇宙系列男装自动机械镀金腕表787 SY-019梅花（TITONI）Cosmo宇宙系列男装自动机械镀金腕表787 SY-019梅花（TITONI）Cosmo宇宙系列男装自动机械镀金腕表787 SY-019梅花（TITONI）Cosmo宇宙系列男装自动机械镀金腕表787 SY-019梅花（TITONI）Cosmo宇宙系列男装自动机械镀金腕表787 SY-019梅花（TITONI）Cosmo宇宙系列男装自动机械镀金腕表787 SY-019梅花（TITONI）Cosmo宇宙系列男装自动机械镀金腕表787 SY-019梅花（TITONI）Cosmo宇宙系列男装自动机械镀金腕表787 SY-019梅花（TITONI）Cosmo宇宙系列男装自动机械镀金腕表787 SY-019梅花（TITONI）Cosmo宇宙系列男装自动机械镀金腕表787 SY-019梅花（TITONI）Cosmo宇宙系列男装自动机械镀金腕表787 SY-019梅花（TITONI）Cosmo宇宙系列男装自动机械镀金腕表787 SY-019',2342.00,'13918582749412.jpg',1,4,0,321,1391858274),(26,10,'浪琴Longines 名匠系列 自动机械男表L25185127','日本','浪琴Longines 名匠系列 自动机械男表L25185127浪琴Longines 名匠系列 自动机械男表L25185127浪琴Longines 名匠系列 自动机械男表L25185127浪琴Longines 名匠系列 自动机械男表L25185127浪琴Longines 名匠系列 自动机械男表L25185127浪琴Longines 名匠系列 自动机械男表L25185127浪琴Longines 名匠系列 自动机械男表L25185127浪琴Longines 名匠系列 自动机械男表L25185127浪琴Longines 名匠系列 自动机械男表L25185127',2324.00,'13918583447365.jpg',1,4,0,355,1391858344),(27,11,'卡地亚CARTIER 桑托斯SANTOS系列石英女表W20056','土耳其','卡地亚CARTIER 桑托斯SANTOS系列石英女表W20056D6卡地亚CARTIER 桑托斯SANTOS系列石英女表W20056D6卡地亚CARTIER 桑托斯SANTOS系列石英女表W20056D6卡地亚CARTIER 桑托斯SANTOS系列石英女表W20056D6',4545.00,'13918584145741.jpg',1,7,0,351,1391858414),(28,11,'卡地亚CARTIER 帕莎MISS PASHA系列石英女表W31','土耳其','卡地亚CARTIER 帕莎MISS PASHA系列石英女表W3140008卡地亚CARTIER 帕莎MISS PASHA系列石英女表W3140008卡地亚CARTIER 帕莎MISS PASHA系列石英女表W3140008卡地亚CARTIER 帕莎MISS PASHA系列石英女表W3140008卡地亚CARTIER 帕莎MISS PASHA系列石英女表W3140008',4566.00,'13918584744790.jpg',1,9,0,346,1391858475),(29,11,'卡地亚CARTIER 坦克TANK FRANCAISE系列石英女','土耳其','卡地亚CARTIER 坦克TANK FRANCAISE系列石英女表W51011Q3卡地亚CARTIER 坦克TANK FRANCAISE系列石英女表W51011Q3卡地亚CARTIER 坦克TANK FRANCAISE系列石英女表W51011Q3卡地亚CARTIER 坦克TANK FRANCAISE系列石英女表W51011Q3卡地亚CARTIER 坦克TANK FRANCAISE系列石英女表W51011Q3卡地亚CARTIER 坦克TANK FRANCAISE系列石英女表W51011Q3卡地亚CARTIER 坦克TANK FRANCAISE系列石英女表W51011Q3',1245.00,'13918585857000.jpg',1,23,0,341,1391858585),(30,10,'万国IWC 马克十七飞行员系列自动机械男表IW326501','美国','万国IWC 马克十七飞行员系列自动机械男表IW326501万国IWC 马克十七飞行员系列自动机械男表IW326501万国IWC 马克十七飞行员系列自动机械男表IW326501万国IWC 马克十七飞行员系列自动机械男表IW326501万国IWC 马克十七飞行员系列自动机械男表IW326501万国IWC 马克十七飞行员系列自动机械男表IW326501',45435.00,'13918586251392.jpg',1,3,0,312,1391858625),(31,10,'美度MIDO 贝伦赛丽系列自动机械男表M8690.3.13.8','北京','美度MIDO 贝伦赛丽系列自动机械男表M8690.3.13.8美度MIDO 贝伦赛丽系列自动机械男表M8690.3.13.8美度MIDO 贝伦赛丽系列自动机械男表M8690.3.13.8美度MIDO 贝伦赛丽系列自动机械男表M8690.3.13.8美度MIDO 贝伦赛丽系列自动机械男表M8690.3.13.8美度MIDO 贝伦赛丽系列自动机械男表M8690.3.13.8美度MIDO 贝伦赛丽系列自动机械男表M8690.3.13.8',5646.00,'13918586835066.jpg',1,2,0,380,1391858683),(32,10,'古驰Gucci G-Timeless系列中码石英男式手表 YA1','美国','古驰Gucci G-Timeless系列中码石英男式手表 YA126401古驰Gucci G-Timeless系列中码石英男式手表 YA126401古驰Gucci G-Timeless系列中码石英男式手表 YA126401古驰Gucci G-Timeless系列中码石英男式手表 YA126401古驰Gucci G-Timeless系列中码石英男式手表 YA126401古驰Gucci G-Timeless系列中码石英男式手表 YA126401',18467.00,'13918587543668.jpg',1,5,0,310,1391858754),(33,11,'古驰Gucci Coupe系列大码石英男表 YA131304','美国','古驰Gucci Coupe系列大码石英男表 YA131304古驰Gucci Coupe系列大码石英男表 YA131304古驰Gucci Coupe系列大码石英男表 YA131304古驰Gucci Coupe系列大码石英男表 YA131304古驰Gucci Coupe系列大码石英男表 YA131304古驰Gucci Coupe系列大码石英男表 YA131304古驰Gucci Coupe系列大码石英男表 YA131304古驰Gucci Coupe系列大码石英男表 YA131304古驰Gucci Coupe系列大码石英男表 YA131304',14567.00,'13918588096819.jpg',1,88,0,315,1391858809),(34,11,'古驰Gucci marina chain系列石英女表 YA121','美国','古驰Gucci marina chain系列石英女表 YA121309古驰Gucci marina chain系列石英女表 YA121309古驰Gucci marina chain系列石英女表 YA121309古驰Gucci marina chain系列石英女表 YA121309古驰Gucci marina chain系列石英女表 YA121309古驰Gucci marina chain系列石英女表 YA121309古驰Gucci marina chain系列石英女表 YA121309',14657.00,'13918588633829.jpg',1,45,0,348,1391858863),(35,11,'古驰Gucci G-Gucci系列小码石英女式手表 YA1255','美国','古驰Gucci G-Gucci系列小码石英女式手表 YA125503古驰Gucci G-Gucci系列小码石英女式手表 YA125503古驰Gucci G-Gucci系列小码石英女式手表 YA125503古驰Gucci G-Gucci系列小码石英女式手表 YA125503古驰Gucci G-Gucci系列小码石英女式手表 YA125503古驰Gucci G-Gucci系列小码石英女式手表 YA125503古驰Gucci G-Gucci系列小码石英女式手表 YA125503',23424.00,'13918589099617.jpg',1,10,0,374,1391858909),(36,11,'古驰Gucci 1921系列小码方形女表 YA130401','美国','古驰Gucci 1921系列小码方形女表 YA130401古驰Gucci 1921系列小码方形女表 YA130401古驰Gucci 1921系列小码方形女表 YA130401古驰Gucci 1921系列小码方形女表 YA130401古驰Gucci 1921系列小码方形女表 YA130401古驰Gucci 1921系列小码方形女表 YA130401古驰Gucci 1921系列小码方形女表 YA130401',12345.00,'13918589578326.jpg',1,54,0,316,1391858957),(37,11,'古驰Gucci G-Gucci系列中码石英女表 YA125407','美国','古驰Gucci G-Gucci系列中码石英女表 YA125407古驰Gucci G-Gucci系列中码石英女表 YA125407古驰Gucci G-Gucci系列中码石英女表 YA125407古驰Gucci G-Gucci系列中码石英女表 YA125407古驰Gucci G-Gucci系列中码石英女表 YA125407古驰Gucci G-Gucci系列中码石英女表 YA125407古驰Gucci G-Gucci系列中码石英女表 YA125407古驰Gucci G-Gucci系列中码石英女表 YA125407',12456.00,'13918590283438.jpg',1,42,0,332,1391859028),(38,10,'天梭TISSOT唯意系列机械男表T038.430.11.037.','南京','天梭TISSOT唯意系列机械男表T038.430.11.037.00天梭TISSOT唯意系列机械男表T038.430.11.037.00天梭TISSOT唯意系列机械男表T038.430.11.037.00天梭TISSOT唯意系列机械男表T038.430.11.037.00天梭TISSOT唯意系列机械男表T038.430.11.037.00天梭TISSOT唯意系列机械男表T038.430.11.037.00天梭TISSOT唯意系列机械男表T038.430.11.037.00',3515.00,'13918591496168.jpg',1,100,0,358,1391859149),(39,33,'Swarovski施华洛世奇红色心形零钱包1047565','美国','Swarovski施华洛世奇红色心形零钱包1047565Swarovski施华洛世奇红色心形零钱包1047565Swarovski施华洛世奇红色心形零钱包1047565Swarovski施华洛世奇红色心形零钱包1047565Swarovski施华洛世奇红色心形零钱包1047565Swarovski施华洛世奇红色心形零钱包1047565',453.00,'13918593575973.jpg',1,80,0,348,1391859357),(40,33,'GUCCI 古驰 钱包 yl 233181 FU4HR 1000','美国','GUCCI 古驰 钱包 yl 233181 FU4HR 1000GUCCI 古驰 钱包 yl 233181 FU4HR 1000GUCCI 古驰 钱包 yl 233181 FU4HR 1000GUCCI 古驰 钱包 yl 233181 FU4HR 1000GUCCI 古驰 钱包 yl 233181 FU4HR 1000GUCCI 古驰 钱包 yl 233181 FU4HR 1000GUCCI 古驰 钱包 yl 233181 FU4HR 1000',3434.00,'13918594129206.jpg',1,41,0,321,1391859413),(41,33,'LONGCHAMP 珑骧黑色女式钱包kt 3046 158 00','美国','LONGCHAMP 珑骧黑色女式钱包kt 3046 158 001LONGCHAMP 珑骧黑色女式钱包kt 3046 158 001LONGCHAMP 珑骧黑色女式钱包kt 3046 158 001LONGCHAMP 珑骧黑色女式钱包kt 3046 158 001LONGCHAMP 珑骧黑色女式钱包kt 3046 158 001LONGCHAMP 珑骧黑色女式钱包kt 3046 158 001LONGCHAMP 珑骧黑色女式钱包kt 3046 158 001',2334.00,'13918594594453.jpg',1,6,0,310,1391859460),(42,33,'BURBERRY 巴宝莉女士经典格纹全拉链折叠短钱包 37989','美国','BURBERRY 巴宝莉女士经典格纹全拉链折叠短钱包 3798989 eyBURBERRY 巴宝莉女士经典格纹全拉链折叠短钱包 3798989 eyBURBERRY 巴宝莉女士经典格纹全拉链折叠短钱包 3798989 eyBURBERRY 巴宝莉女士经典格纹全拉链折叠短钱包 3798989 eyBURBERRY 巴宝莉女士经典格纹全拉链折叠短钱包 3798989 eyBURBERRY 巴宝莉女士经典格纹全拉链折叠短钱包 3798989 eyBURBERRY 巴宝莉女士经典格纹全拉链折叠短钱包 3798989 eyBURBERRY 巴宝莉女士经典格纹全拉链折叠短钱包 3798989 eyBURBERRY 巴宝莉女士经典格纹全拉链折叠短钱包 3798989 eyBURBERRY 巴宝莉女士经典格纹全拉链折叠短钱包 3798989 ey',3436.00,'13918595153649.jpg',1,10,0,390,1391859516),(43,33,'COACH 蔻驰男士帆布卡其蓝色双折钱包钱夹 74249 KHD','美国','COACH 蔻驰男士帆布卡其蓝色双折钱包钱夹 74249 KHDE jnCOACH 蔻驰男士帆布卡其蓝色双折钱包钱夹 74249 KHDE jnCOACH 蔻驰男士帆布卡其蓝色双折钱包钱夹 74249 KHDE jnCOACH 蔻驰男士帆布卡其蓝色双折钱包钱夹 74249 KHDE jnCOACH 蔻驰男士帆布卡其蓝色双折钱包钱夹 74249 KHDE jnCOACH 蔻驰男士帆布卡其蓝色双折钱包钱夹 74249 KHDE jnCOACH 蔻驰男士帆布卡其蓝色双折钱包钱夹 74249 KHDE jn',8675.00,'13918595728844.jpg',1,5,0,319,1391859572),(44,29,'MCM 女式 中号绿色PVC配皮经典双肩背包 MMK 3SVE0','北京','MCM 女式 中号绿色PVC配皮经典双肩背包 MMK 3SVE01 GR001 wxMCM 女式 中号绿色PVC配皮经典双肩背包 MMK 3SVE01 GR001 wxMCM 女式 中号绿色PVC配皮经典双肩背包 MMK 3SVE01 GR001 wxMCM 女式 中号绿色PVC配皮经典双肩背包 MMK 3SVE01 GR001 wxMCM 女式 中号绿色PVC配皮经典双肩背包 MMK 3SVE01 GR001 wxMCM 女式 中号绿色PVC配皮经典双肩背包 MMK 3SVE01 GR001 wxMCM 女式 中号绿色PVC配皮经典双肩背包 MMK 3SVE01 GR001 wx',835.00,'13918596632265.jpg',1,7,0,345,1391859663),(45,29,'MCM 女式中号红色铆钉 双肩背包 MMK 2AVE01 RE0','北京','MCM 女式中号红色铆钉 双肩背包 MMK 2AVE01 RE001 wxMCM 女式中号红色铆钉 双肩背包 MMK 2AVE01 RE001 wxMCM 女式中号红色铆钉 双肩背包 MMK 2AVE01 RE001 wxMCM 女式中号红色铆钉 双肩背包 MMK 2AVE01 RE001 wxMCM 女式中号红色铆钉 双肩背包 MMK 2AVE01 RE001 wxMCM 女式中号红色铆钉 双肩背包 MMK 2AVE01 RE001 wxMCM 女式中号红色铆钉 双肩背包 MMK 2AVE01 RE001 wxMCM 女式中号红色铆钉 双肩背包 MMK 2AVE01 RE001 wx',676.00,'13918597538937.jpg',1,4,0,448,1391859753),(46,29,'OROBIANCO 奥伦比安克 女款红色尼龙织物拼接单肩包 休闲','美国','OROBIANCO 奥伦比安克 女款红色尼龙织物拼接单肩包 休闲斜挎女包GHO003510-03OROBIANCO 奥伦比安克 女款红色尼龙织物拼接单肩包 休闲斜挎女包GHO003510-03OROBIANCO 奥伦比安克 女款红色尼龙织物拼接单肩包 休闲斜挎女包GHO003510-03OROBIANCO 奥伦比安克 女款红色尼龙织物拼接单肩包 休闲斜挎女包GHO003510-03OROBIANCO 奥伦比安克 女款红色尼龙织物拼接单肩包 休闲斜挎女包GHO003510-03OROBIANCO 奥伦比安克 女款红色尼龙织物拼接单肩包 休闲斜挎女包GHO003510-03OROBIANCO 奥伦比安克 女款红色尼龙织物拼接单肩包 休闲斜挎女包GHO003510-03',999.00,'13918598072565.jpg',1,6,0,349,1391859807),(47,29,'GUCCI（古驰） 男式蓝色pvc双G图案肩背斜挎邮差包 223','美国','GUCCI（古驰） 男式蓝色pvc双G图案肩背斜挎邮差包 223666 KGDIN 4075 HZGUCCI（古驰） 男式蓝色pvc双G图案肩背斜挎邮差包 223666 KGDIN 4075 HZGUCCI（古驰） 男式蓝色pvc双G图案肩背斜挎邮差包 223666 KGDIN 4075 HZGUCCI（古驰） 男式蓝色pvc双G图案肩背斜挎邮差包 223666 KGDIN 4075 HZGUCCI（古驰） 男式蓝色pvc双G图案肩背斜挎邮差包 223666 KGDIN 4075 HZGUCCI（古驰） 男式蓝色pvc双G图案肩背斜挎邮差包 223666 KGDIN 4075 HZGUCCI（古驰） 男式蓝色pvc双G图案肩背斜挎邮差包 223666 KGDIN 4075 HZ',4565.00,'13918599833000.jpg',1,10,0,369,1391859983),(54,12,'BURBERRY 巴宝莉男士纯棉靛蓝色短袖POLO衫 34591','英国','BURBERRY 巴宝莉男士纯棉靛蓝色短袖POLO衫 3459164 ml XXXL码BURBERRY 巴宝莉男士纯棉靛蓝色短袖POLO衫 3459164 ml XXXL码BURBERRY 巴宝莉男士纯棉靛蓝色短袖POLO衫 3459164 ml XXXL码BURBERRY 巴宝莉男士纯棉靛蓝色短袖POLO衫 3459164 ml XXXL码BURBERRY 巴宝莉男士纯棉靛蓝色短袖POLO衫 3459164 ml XXXL码BURBERRY 巴宝莉男士纯棉靛蓝色短袖POLO衫 3459164 ml XXXL码BURBERRY 巴宝莉男士纯棉靛蓝色短袖POLO衫 3459164 ml XXXL码',1300.00,'13918616177648.jpg',1,50,0,341,1391861617),(55,12,'BURBERRY 巴宝莉 棕色女士短款风衣 3811716 17','英国','BURBERRY 巴宝莉 棕色女士短款风衣 3811716 175/96A xyBURBERRY 巴宝莉 棕色女士短款风衣 3811716 175/96A xyBURBERRY 巴宝莉 棕色女士短款风衣 3811716 175/96A xyBURBERRY 巴宝莉 棕色女士短款风衣 3811716 175/96A xyBURBERRY 巴宝莉 棕色女士短款风衣 3811716 175/96A xyBURBERRY 巴宝莉 棕色女士短款风衣 3811716 175/96A xyBURBERRY 巴宝莉 棕色女士短款风衣 3811716 175/96A xy',1929.00,'13918616822311.jpg',1,10,0,344,1391861682),(56,13,'BURBERRY 巴宝莉 女士七分牛仔裤 3698239 xy ','英国','BURBERRY 巴宝莉 女士七分牛仔裤 3698239 xy 30码BURBERRY 巴宝莉 女士七分牛仔裤 3698239 xy 30码BURBERRY 巴宝莉 女士七分牛仔裤 3698239 xy 30码BURBERRY 巴宝莉 女士七分牛仔裤 3698239 xy 30码BURBERRY 巴宝莉 女士七分牛仔裤 3698239 xy 30码',999.00,'13918617625020.jpg',1,20,0,391,1391861762),(57,15,'TOD\'S（托德斯） 女士紫红色白点磨砂真皮系绳豆豆鞋 XXW0','德国','TOD\'S（托德斯） 女士紫红色白点磨砂真皮系绳豆豆鞋 XXW0FW054701X9R008 HZ 36.5码TOD\'S（托德斯） 女士紫红色白点磨砂真皮系绳豆豆鞋 XXW0FW054701X9R008 HZ 36.5码TOD\'S（托德斯） 女士紫红色白点磨砂真皮系绳豆豆鞋 XXW0FW054701X9R008 HZ 36.5码TOD\'S（托德斯） 女士紫红色白点磨砂真皮系绳豆豆鞋 XXW0FW054701X9R008 HZ 36.5码TOD\'S（托德斯） 女士紫红色白点磨砂真皮系绳豆豆鞋 XXW0FW054701X9R008 HZ 36.5码TOD\'S（托德斯） 女士紫红色白点磨砂真皮系绳豆豆鞋 XXW0FW054701X9R008 HZ 36.5码TOD\'S（托德斯） 女士紫红色白点磨砂真皮系绳豆豆鞋 XXW0FW054701X9R008 HZ 36.5码',2780.00,'13918618136748.jpg',1,57,0,442,1391861814),(58,35,'Calvin Klein 卡文克莱 女款红色渲染图案长款丝巾 A','法国','Calvin Klein 卡文克莱 女款红色渲染图案长款丝巾 A3WS1091 rsCalvin Klein 卡文克莱 女款红色渲染图案长款丝巾 A3WS1091 rsCalvin Klein 卡文克莱 女款红色渲染图案长款丝巾 A3WS1091 rsCalvin Klein 卡文克莱 女款红色渲染图案长款丝巾 A3WS1091 rsCalvin Klein 卡文克莱 女款红色渲染图案长款丝巾 A3WS1091 rsCalvin Klein 卡文克莱 女款红色渲染图案长款丝巾 A3WS1091 rsCalvin Klein 卡文克莱 女款红色渲染图案长款丝巾 A3WS1091 rsCalvin Klein 卡文克莱 女款红色渲染图案长款丝巾 A3WS1091 rs',1430.00,'13918619955647.jpg',1,76,0,336,1391861995),(59,35,'COACH 蔻驰 女款双色丝巾 一面白色双C图案一面多色条纹图案','法国','COACH 蔻驰 女款双色丝巾 一面白色双C图案一面多色条纹图案 F83525 MTI rsCOACH 蔻驰 女款双色丝巾 一面白色双C图案一面多色条纹图案 F83525 MTI rsCOACH 蔻驰 女款双色丝巾 一面白色双C图案一面多色条纹图案 F83525 MTI rsCOACH 蔻驰 女款双色丝巾 一面白色双C图案一面多色条纹图案 F83525 MTI rsCOACH 蔻驰 女款双色丝巾 一面白色双C图案一面多色条纹图案 F83525 MTI rsCOACH 蔻驰 女款双色丝巾 一面白色双C图案一面多色条纹图案 F83525 MTI rs',978.00,'13918620606442.jpg',1,4,0,343,1391862061),(60,20,'ARMANI阿玛尼寄情女士香水30ml','法国','ARMANI阿玛尼寄情女士香水30mlARMANI阿玛尼寄情女士香水30mlARMANI阿玛尼寄情女士香水30mlARMANI阿玛尼寄情女士香水30mlARMANI阿玛尼寄情女士香水30mlARMANI阿玛尼寄情女士香水30mlARMANI阿玛尼寄情女士香水30mlARMANI阿玛尼寄情女士香水30ml',335.00,'13918621777615.jpg',1,55,0,344,1391862177),(61,20,'Armani阿玛尼印记女士淡香水50ml','法国','Armani阿玛尼印记女士淡香水50mlArmani阿玛尼印记女士淡香水50mlArmani阿玛尼印记女士淡香水50mlArmani阿玛尼印记女士淡香水50mlArmani阿玛尼印记女士淡香水50mlArmani阿玛尼印记女士淡香水50mlArmani阿玛尼印记女士淡香水50ml',489.00,'13918622299076.jpg',1,5,0,329,1391862230),(62,20,'Ferragamo菲拉格慕梦幻天堂女士淡香水30ml','法国','Ferragamo菲拉格慕梦幻天堂女士淡香水30mlFerragamo菲拉格慕梦幻天堂女士淡香水30mlFerragamo菲拉格慕梦幻天堂女士淡香水30mlFerragamo菲拉格慕梦幻天堂女士淡香水30mlFerragamo菲拉格慕梦幻天堂女士淡香水30mlFerragamo菲拉格慕梦幻天堂女士淡香水30mlFerragamo菲拉格慕梦幻天堂女士淡香水30ml',99.00,'13918623043613.jpg',1,100,0,462,1391862304),(63,22,'娇兰Guerlain幻彩流星美颜蜜粉饼 9g','法国','娇兰Guerlain幻彩流星美颜蜜粉饼 9g娇兰Guerlain幻彩流星美颜蜜粉饼 9g娇兰Guerlain幻彩流星美颜蜜粉饼 9g娇兰Guerlain幻彩流星美颜蜜粉饼 9g娇兰Guerlain幻彩流星美颜蜜粉饼 9g娇兰Guerlain幻彩流星美颜蜜粉饼 9g娇兰Guerlain幻彩流星美颜蜜粉饼 9g娇兰Guerlain幻彩流星美颜蜜粉饼 9g',677.00,'13918624265271.jpg',1,29,0,316,1391862426),(64,23,'飞天茅台 53度 500ML','北京','飞天茅台 53度 500ML飞天茅台 53度 500ML飞天茅台 53度 500ML飞天茅台 53度 500ML飞天茅台 53度 500ML飞天茅台 53度 500ML',1159.00,'13918625221900.jpg',1,50,0,362,1391862522),(65,24,'罗莱家纺 全棉色织大提花双人1.5米床婚庆六件套 T581R-6','法国','罗莱家纺 全棉色织大提花双人1.5米床婚庆六件套 T581R-6玉香飞罗莱家纺 全棉色织大提花双人1.5米床婚庆六件套 T581R-6玉香飞罗莱家纺 全棉色织大提花双人1.5米床婚庆六件套 T581R-6玉香飞罗莱家纺 全棉色织大提花双人1.5米床婚庆六件套 T581R-6玉香飞罗莱家纺 全棉色织大提花双人1.5米床婚庆六件套 T581R-6玉香飞罗莱家纺 全棉色织大提花双人1.5米床婚庆六件套 T581R-6玉香飞罗莱家纺 全棉色织大提花双人1.5米床婚庆六件套 T581R-6玉香飞',3690.00,'13918626126873.jpg',1,59,0,317,1391862612),(66,25,'Maruman RZ 2013新款男士高尔夫套杆 独家授权','德国','Maruman RZ 2013新款男士高尔夫套杆 独家授权Maruman RZ 2013新款男士高尔夫套杆 独家授权Maruman RZ 2013新款男士高尔夫套杆 独家授权Maruman RZ 2013新款男士高尔夫套杆 独家授权Maruman RZ 2013新款男士高尔夫套杆 独家授权Maruman RZ 2013新款男士高尔夫套杆 独家授权',9998.00,'13918626664822.jpg',1,5,0,356,1391862667),(67,26,'北京同仁堂冬虫夏草实木盒20g','北京','北京同仁堂冬虫夏草实木盒20g北京同仁堂冬虫夏草实木盒20g北京同仁堂冬虫夏草实木盒20g北京同仁堂冬虫夏草实木盒20g北京同仁堂冬虫夏草实木盒20g北京同仁堂冬虫夏草实木盒20g北京同仁堂冬虫夏草实木盒20g北京同仁堂冬虫夏草实木盒20g',12999.00,'13918627409968.jpg',1,100,0,340,1391862740),(68,36,'联想（Lenovo） Horizon 27英寸智能桌面（i5-3','北京','联想（Lenovo） Horizon 27英寸智能桌面（i5-3337U 8G 1T 2G独显 摄像头 蓝牙 Win8）联想（Lenovo） Horizon 27英寸智能桌面（i5-3337U 8G 1T 2G独显 摄像头 蓝牙 Win8）联想（Lenovo） Horizon 27英寸智能桌面（i5-3337U 8G 1T 2G独显 摄像头 蓝牙 Win8）联想（Lenovo） Horizon 27英寸智能桌面（i5-3337U 8G 1T 2G独显 摄像头 蓝牙 Win8）联想（Lenovo） Horizon 27英寸智能桌面（i5-3337U 8G 1T 2G独显 摄像头 蓝牙 Win8）联想（Lenovo） Horizon 27英寸智能桌面（i5-3337U 8G 1T 2G独显 摄像头 蓝牙 Win8）联想（Lenovo） Horizon 27英寸智能桌面（i5-3337U 8G 1T 2G独显 摄像头 蓝牙 Win8）',867.00,'13918628377566.jpg',1,30,0,355,1391862838),(69,39,'外星人(Alienware) ALW14R-3718R 14英寸','北京','外星人(Alienware) ALW14R-3718R 14英寸笔记本电脑（i7-3630QM 16GB 1TB GT650M 2G独显 蓝牙 W7）红色外星人(Alienware) ALW14R-3718R 14英寸笔记本电脑（i7-3630QM 16GB 1TB GT650M 2G独显 蓝牙 W7）红色外星人(Alienware) ALW14R-3718R 14英寸笔记本电脑（i7-3630QM 16GB 1TB GT650M 2G独显 蓝牙 W7）红色外星人(Alienware) ALW14R-3718R 14英寸笔记本电脑（i7-3630QM 16GB 1TB GT650M 2G独显 蓝牙 W7）红色外星人(Alienware) ALW14R-3718R 14英寸笔记本电脑（i7-3630QM 16GB 1TB GT650M 2G独显 蓝牙 W7）红色外星人(Alienware) ALW14R-3718R 14英寸笔记本电脑（i7-3630QM 16GB 1TB GT650M 2G独显 蓝牙 W7）红色外星人(Alienware) ALW14R-3718R 14英寸笔记本电脑（i7-3630QM 16GB 1TB GT650M 2G独显 蓝牙 W7）红色外星人(Alienware) ALW14R-3718R 14英寸笔记本电脑（i7-3630QM 16GB 1TB GT650M 2G独显 蓝牙 W7）红色外星人(Alienware) ALW14R-3718R 14英寸笔记本电脑（i7-3630QM 16GB 1TB GT650M 2G独显 蓝牙 W7）红色外星人(Alienware) ALW14R-3718R 14英寸笔记本电脑（i7-3630QM 16GB 1TB GT650M 2G独显 蓝牙 W7）红色',12000.00,'13918706865759.jpg',1,20,0,274,1391870686),(70,37,'赛钛客（Saitek）美加狮 Mad Catz Cyborg R','美国','赛钛客（Saitek）美加狮 Mad Catz Cyborg R.A.T.9 激光游戏鼠标 升级版赛钛客（Saitek）美加狮 Mad Catz Cyborg R.A.T.9 激光游戏鼠标 升级版赛钛客（Saitek）美加狮 Mad Catz Cyborg R.A.T.9 激光游戏鼠标 升级版赛钛客（Saitek）美加狮 Mad Catz Cyborg R.A.T.9 激光游戏鼠标 升级版赛钛客（Saitek）美加狮 Mad Catz Cyborg R.A.T.9 激光游戏鼠标 升级版赛钛客（Saitek）美加狮 Mad Catz Cyborg R.A.T.9 激光游戏鼠标 升级版赛钛客（Saitek）美加狮 Mad Catz Cyborg R.A.T.9 激光游戏鼠标 升级版',1199.00,'13918709076887.jpg',1,45,0,255,1391870908),(71,37,'BEATS Lady Gaga 心动（带咪） 900-00040','美国','BEATS Lady Gaga 心动（带咪） 900-00040-02 入耳式 白色BEATS Lady Gaga 心动（带咪） 900-00040-02 入耳式 白色BEATS Lady Gaga 心动（带咪） 900-00040-02 入耳式 白色BEATS Lady Gaga 心动（带咪） 900-00040-02 入耳式 白色BEATS Lady Gaga 心动（带咪） 900-00040-02 入耳式 白色BEATS Lady Gaga 心动（带咪） 900-00040-02 入耳式 白色',350.00,'13918709713198.jpg',1,4,0,288,1391870971),(72,38,'徕卡（Leica） V-Lux4 数码相机','北京','徕卡（Leica） V-Lux4 数码相机徕卡（Leica） V-Lux4 数码相机徕卡（Leica） V-Lux4 数码相机徕卡（Leica） V-Lux4 数码相机徕卡（Leica） V-Lux4 数码相机徕卡（Leica） V-Lux4 数码相机徕卡（Leica） V-Lux4 数码相机徕卡（Leica） V-Lux4 数码相机',25000.00,'13918710451464.jpg',1,70,0,281,1391871045);
/*!40000 ALTER TABLE `goods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `linkman` varchar(32) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `code` char(6) DEFAULT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `addtime` int(11) DEFAULT NULL,
  `total` double(8,2) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (30,40,'chen','北京昌平','10000','12345678',1391985908,489.00,1),(31,40,'chen','北京昌平','10000','12345678',1391985927,1159.00,2),(32,40,'chen','北京昌平','10000','12345678',1391985940,3000.00,1),(33,40,'chen','北京昌平','10000','12345678',1391985951,18035.00,0),(34,40,'chen','北京昌平','10000','12345678',1391985974,1799.00,1),(35,40,'chen','北京昌平','10000','12345678',1391985986,25000.00,0),(36,40,'chen','北京昌平','10000','12345678',1391986009,2066.00,2),(37,40,'chen','北京昌平','10000','12345678',1391986040,453.00,2),(38,40,'chen','北京昌平','10000','12345678',1391986054,295.00,3),(39,40,'chen','北京昌平','10000','12345678',1391987072,29657.00,3),(58,48,'徐璐','4费付v','12233','110',1392079493,146718.00,3),(54,40,'chen','北京昌平','10000','12345678',1392048502,4999.00,3),(42,40,'chen','北京昌平','10000','12345678',1391987123,9998.00,2),(43,41,'张三','北京市昌平区回龙观小区','23456','1345678765',1391991555,2342.00,2),(44,41,'张三','北京市昌平区回龙观小区','23456','1345678765',1391995164,24948.00,2),(45,44,'刘成','回龙观','','18600601446',1392002575,24948.00,1),(57,45,'徐璐','回龙观育荣教育园区','100010','18888888888',1392079316,129696.00,3),(47,40,'chen','北京昌平','10000','12345678',1392012863,453.00,2),(48,40,'chen','北京昌平','10000','12345678',1392013622,6670.00,2),(56,41,'王五','北京市昌平区回龙观小区','20000','1345678765',1392068999,99792.00,3),(50,40,'chen','北京昌平','10000','12345678',1392044096,519.00,2),(51,40,'chen','北京昌平','10000','12345678',1392044164,11449.00,3),(52,40,'chen','北京昌平','10000','12345678',1392046153,19341.00,3),(53,40,'chen','北京昌平','10000','12345678',1392047047,126669.00,3),(59,40,'chen','北京昌平','10000','12345678',1392080277,14760.00,2),(61,62,'王五','放松放松','3223','123452132',1392123388,978.00,1),(64,64,'yang','kk','','',1392314625,36934.00,1),(65,64,'yang','回龙观育荣教育园区','','111',1392314753,7098.00,1),(67,69,'test','测试测试测试测试测试才','568433','18987654567',1395902007,27223.00,1),(68,70,'你还','北京市朝阳区','629300','17880111458',1398087951,34334.00,2),(69,40,'chen','北京昌平','10000','15150173973',1406516244,1345.00,0),(70,40,'chen','北京昌平','10000','15150173973',1410679719,6000.00,1),(71,40,'chen','北京昌平','10000','15150173973',1412431018,3858.00,1),(72,72,'gig','斯里兰卡啦','10000','15150173973',1424417405,4999.00,2),(73,73,'陈伟','杭州市','211306','13185826384',1486980400,500.00,3);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL DEFAULT '',
  `truename` varchar(16) DEFAULT NULL,
  `password` char(32) NOT NULL DEFAULT '',
  `sex` tinyint(1) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `code` char(6) DEFAULT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `email` varchar(50) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `addtime` int(11) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=75 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (40,'chenwei','chen','fbdcc62a7d8c22b15c0e44504986d5ba',0,'北京昌平','10000','15150173973','916892988@qq.com',0,1391542718,'14057885658909.jpg'),(41,'admin','王五','e10adc3949ba59abbe56e057f20f883e',1,'北京市昌平区回龙观小区','20000','1345678765','32432432@qq.com',1,1391550264,'13922913135712.jpg'),(43,'tables',NULL,'e10adc3949ba59abbe56e057f20f883e',NULL,NULL,NULL,NULL,'345678@ddd.com',2,1391670227,NULL),(44,'liucheng','刘成','e10adc3949ba59abbe56e057f20f883e',NULL,'回龙观','','18600601446','',1,1392002480,NULL),(47,'adminadmin','','f6fdffe48c908deb0f4c3bd36c032e72',NULL,'','','','',1,1392079244,'13922913795959.jpg'),(48,'Ainnie','徐璐','6bd838edc969235f91bab78e3f1aa368',NULL,'4费付v','12233','110','',1,1392079308,NULL),(57,'一头小毛驴',NULL,'c8837b23ff8aaa8a2dde915473ce0991',NULL,NULL,NULL,NULL,'',1,1392120611,NULL),(58,'帅哥靓仔',NULL,'c8837b23ff8aaa8a2dde915473ce0991',NULL,NULL,NULL,NULL,'',1,1392120707,NULL),(59,'路绮欧呦',NULL,'c8837b23ff8aaa8a2dde915473ce0991',NULL,NULL,NULL,NULL,'',1,1392120772,NULL),(62,'我是歌手','王五','e10adc3949ba59abbe56e057f20f883e',NULL,'放松放松','3223','123452132','',1,1392121658,NULL),(63,'caocao','a','1abb3521ceb70ef277bec804912287ff',NULL,'aa','aaa','aa','',1,1392289843,NULL),(64,'yang','yang','e10adc3949ba59abbe56e057f20f883e',NULL,'','','','',1,1392314281,'13923147789863.jpg'),(65,'544523wo',NULL,'e10adc3949ba59abbe56e057f20f883e',NULL,NULL,NULL,NULL,'',1,1395224231,NULL),(66,'5080370501@qq.com',NULL,'61bc5a221f1fa240e91e8314be5b1701',NULL,NULL,NULL,NULL,'',1,1395455455,NULL),(67,'test222','李明','4edefd1254ebf8bdb04bf7c208a1f347',NULL,'541616','128422','13545678945','',1,1395455505,NULL),(68,'test',NULL,'e10adc3949ba59abbe56e057f20f883e',NULL,NULL,NULL,NULL,'',1,1395568621,NULL),(69,'test1','test','e10adc3949ba59abbe56e057f20f883e',NULL,'测试测试测试测试测试才','568433','18987654567','',1,1395901949,NULL),(70,'kbase','','c8837b23ff8aaa8a2dde915473ce0991',NULL,'','','','',1,1397624488,NULL),(71,'notall',NULL,'05fb4cb2646fa684a8e40c1a589ecf8c',NULL,NULL,NULL,NULL,'',1,1397983212,NULL),(72,'fqqq','gig','e10adc3949ba59abbe56e057f20f883e',NULL,'斯里兰卡啦','10000','15150173973','',1,1424417242,NULL),(73,'黄小燕1006','陈伟','192c4b6e984a177b7ddd9603fc26f1c6',NULL,'杭州市','211306','13185826384','',1,1486980200,'14869813553351.jpg'),(74,'chaoren',NULL,'acef76419a89220398200fab070e63a1',NULL,NULL,NULL,NULL,'',1,1486981254,'14869814563434.jpg');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-11-18 19:47:22
