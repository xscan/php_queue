/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : test

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-10-11 21:15:12
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for t_order_queue
-- ----------------------------
DROP TABLE IF EXISTS `t_order_queue`;
CREATE TABLE `t_order_queue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` char(15) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `status` tinyint(2) DEFAULT NULL COMMENT '0 未处理 1 已处理 2 处理中',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=756 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_order_queue
-- ----------------------------
INSERT INTO `t_order_queue` VALUES ('706', '20181011211349', '15608461532', '2018-10-11 21:13:56', '2018-10-11 21:13:56', '1');
INSERT INTO `t_order_queue` VALUES ('707', '20181011211350', '15608428930', '2018-10-11 21:13:56', '2018-10-11 21:13:56', '1');
INSERT INTO `t_order_queue` VALUES ('708', '20181011211351', '15608180007', '2018-10-11 21:14:04', '2018-10-11 21:14:04', '1');
INSERT INTO `t_order_queue` VALUES ('709', '20181011211352', '15608258367', '2018-10-11 21:14:04', '2018-10-11 21:14:04', '1');
INSERT INTO `t_order_queue` VALUES ('710', '20181011211353', '15608291793', '2018-10-11 21:14:12', '2018-10-11 21:14:12', '1');
INSERT INTO `t_order_queue` VALUES ('711', '20181011211354', '15608883654', '2018-10-11 21:14:12', '2018-10-11 21:14:12', '1');
INSERT INTO `t_order_queue` VALUES ('712', '20181011211355', '15608976187', '2018-10-11 21:14:20', '2018-10-11 21:14:20', '1');
INSERT INTO `t_order_queue` VALUES ('713', '20181011211356', '15608248150', '2018-10-11 21:14:20', '2018-10-11 21:14:20', '1');
INSERT INTO `t_order_queue` VALUES ('714', '20181011211357', '15608359359', '2018-10-11 21:14:28', '2018-10-11 21:14:28', '1');
INSERT INTO `t_order_queue` VALUES ('715', '20181011211358', '15608204589', '2018-10-11 21:14:28', '2018-10-11 21:14:28', '1');
INSERT INTO `t_order_queue` VALUES ('716', '20181011211359', '15608589358', '2018-10-11 21:14:36', '2018-10-11 21:14:36', '1');
INSERT INTO `t_order_queue` VALUES ('717', '20181011211400', '15608890081', '2018-10-11 21:14:36', '2018-10-11 21:14:36', '1');
INSERT INTO `t_order_queue` VALUES ('718', '20181011211401', '15608411105', '2018-10-11 21:14:44', '2018-10-11 21:14:43', '1');
INSERT INTO `t_order_queue` VALUES ('719', '20181011211402', '15608501110', '2018-10-11 21:14:44', '2018-10-11 21:14:44', '1');
INSERT INTO `t_order_queue` VALUES ('720', '20181011211403', '15608341397', '2018-10-11 21:14:51', '2018-10-11 21:14:51', '1');
INSERT INTO `t_order_queue` VALUES ('721', '20181011211404', '15608468536', '2018-10-11 21:14:51', '2018-10-11 21:14:51', '1');
INSERT INTO `t_order_queue` VALUES ('722', '20181011211405', '15608643905', '2018-10-11 21:14:59', '2018-10-11 21:14:59', '1');
INSERT INTO `t_order_queue` VALUES ('723', '20181011211406', '15608732592', '2018-10-11 21:14:59', '2018-10-11 21:14:59', '1');
INSERT INTO `t_order_queue` VALUES ('724', '20181011211407', '15608204177', '2018-10-11 21:15:08', '2018-10-11 21:15:08', '1');
INSERT INTO `t_order_queue` VALUES ('725', '20181011211408', '15608417889', '2018-10-11 21:15:08', '2018-10-11 21:15:08', '1');
INSERT INTO `t_order_queue` VALUES ('726', '20181011211409', '15608804635', '2018-10-11 21:14:28', null, '2');
INSERT INTO `t_order_queue` VALUES ('727', '20181011211410', '15608308410', '2018-10-11 21:14:28', null, '2');
INSERT INTO `t_order_queue` VALUES ('728', '20181011211411', '15608599575', '2018-10-11 21:14:28', null, '2');
INSERT INTO `t_order_queue` VALUES ('729', '20181011211412', '15608822515', '2018-10-11 21:14:28', null, '2');
INSERT INTO `t_order_queue` VALUES ('730', '20181011211413', '15608190170', '2018-10-11 21:14:28', null, '2');
INSERT INTO `t_order_queue` VALUES ('731', '20181011211414', '15608887939', '2018-10-11 21:14:36', null, '2');
INSERT INTO `t_order_queue` VALUES ('732', '20181011211415', '15608599465', '2018-10-11 21:14:36', null, '2');
INSERT INTO `t_order_queue` VALUES ('733', '20181011211416', '15608416790', '2018-10-11 21:14:36', null, '2');
INSERT INTO `t_order_queue` VALUES ('734', '20181011211417', '15608347384', '2018-10-11 21:14:36', null, '2');
INSERT INTO `t_order_queue` VALUES ('735', '20181011211418', '15608980554', '2018-10-11 21:14:36', null, '2');
INSERT INTO `t_order_queue` VALUES ('736', '20181011211419', '15608625723', '2018-10-11 21:14:43', null, '2');
INSERT INTO `t_order_queue` VALUES ('737', '20181011211420', '15608185089', '2018-10-11 21:14:43', null, '2');
INSERT INTO `t_order_queue` VALUES ('738', '20181011211421', '15608573153', '2018-10-11 21:14:43', null, '2');
INSERT INTO `t_order_queue` VALUES ('739', '20181011211422', '15608445629', '2018-10-11 21:14:43', null, '2');
INSERT INTO `t_order_queue` VALUES ('740', '20181011211424', '15608650222', '2018-10-11 21:14:43', null, '2');
INSERT INTO `t_order_queue` VALUES ('741', '20181011211425', '15608661785', '2018-10-11 21:14:51', null, '2');
INSERT INTO `t_order_queue` VALUES ('742', '20181011211426', '15608614352', '2018-10-11 21:14:51', null, '2');
INSERT INTO `t_order_queue` VALUES ('743', '20181011211427', '15608492541', '2018-10-11 21:14:51', null, '2');
INSERT INTO `t_order_queue` VALUES ('744', '20181011211428', '15608194839', '2018-10-11 21:14:51', null, '2');
INSERT INTO `t_order_queue` VALUES ('745', '20181011211429', '15608131256', '2018-10-11 21:14:51', null, '2');
INSERT INTO `t_order_queue` VALUES ('746', '20181011211430', '15608667855', '2018-10-11 21:14:59', null, '2');
INSERT INTO `t_order_queue` VALUES ('747', '20181011211431', '15608980664', '2018-10-11 21:14:59', null, '2');
INSERT INTO `t_order_queue` VALUES ('748', '20181011211432', '15608131448', '2018-10-11 21:14:59', null, '2');
INSERT INTO `t_order_queue` VALUES ('749', '20181011211433', '15608927874', '2018-10-11 21:14:59', null, '2');
INSERT INTO `t_order_queue` VALUES ('750', '20181011211434', '15608480538', '2018-10-11 21:14:59', null, '2');
INSERT INTO `t_order_queue` VALUES ('751', '20181011211435', '15608419372', '2018-10-11 21:15:08', null, '2');
INSERT INTO `t_order_queue` VALUES ('752', '20181011211436', '15608881924', '2018-10-11 21:15:08', null, '2');
INSERT INTO `t_order_queue` VALUES ('753', '20181011211437', '15608436016', '2018-10-11 21:15:08', null, '2');
INSERT INTO `t_order_queue` VALUES ('754', '20181011211438', '15608249276', '2018-10-11 21:15:08', null, '2');
INSERT INTO `t_order_queue` VALUES ('755', '20181011211439', '15608468041', '2018-10-11 21:15:08', null, '2');
