/*
Navicat MySQL Data Transfer

Source Server         : Local
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : eway

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-08-15 15:06:32
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for e_products
-- ----------------------------
DROP TABLE IF EXISTS `e_products`;
CREATE TABLE `e_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `e_user_id` int(11) unsigned NOT NULL,
  `e_product_name` varchar(255) DEFAULT NULL,
  `e_product_price` decimal(10,0) DEFAULT NULL,
  `e_lat` decimal(10,0) DEFAULT NULL,
  `e_lng` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`e_user_id`),
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for e_users
-- ----------------------------
DROP TABLE IF EXISTS `e_users`;
CREATE TABLE `e_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) DEFAULT NULL,
  `user_lastname` varchar(255) DEFAULT NULL,
  `user_mobile_number` int(30) unsigned NOT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_register_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;
