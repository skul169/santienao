/*
Navicat MySQL Data Transfer

Source Server         : 45.63.34.172_3306
Source Server Version : 50552
Source Host           : 45.63.34.172:3306
Source Database       : santienao

Target Server Type    : MYSQL
Target Server Version : 50552
File Encoding         : 65001

Date: 2017-08-25 10:03:28
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for buys
-- ----------------------------
DROP TABLE IF EXISTS `buys`;
CREATE TABLE `buys` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `transaction_id` varchar(255) NOT NULL,
  `coin_number` double(20,9) NOT NULL,
  `money` int(11) NOT NULL,
  `coin_address` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of buys
-- ----------------------------

-- ----------------------------
-- Table structure for sells
-- ----------------------------
DROP TABLE IF EXISTS `sells`;
CREATE TABLE `sells` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `transaction_id` varchar(255) NOT NULL,
  `coin_number` double(20,9) NOT NULL,
  `bank_number` varchar(255) NOT NULL,
  `money` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sells
-- ----------------------------

-- ----------------------------
-- Table structure for settings
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usd_vnd_rate` int(11) NOT NULL,
  `buy_rate` double(3,1) NOT NULL,
  `sell_rate` double(3,1) NOT NULL,
  `eth_account_address` varchar(255) NOT NULL DEFAULT '0x8DC20E3AEc0346827763c10F879e681b98FF13Db',
  `vcb_account_id` varchar(255) NOT NULL DEFAULT '0011003743647',
  `vcb_account_name` varchar(255) NOT NULL DEFAULT 'VUONG THI LUYEN',
  `total_buy` int(11) NOT NULL DEFAULT '1',
  `total_sell` int(11) NOT NULL DEFAULT '1',
  `total_buy_24` int(11) NOT NULL DEFAULT '1',
  `total_sell_24` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of settings
-- ----------------------------
INSERT INTO `settings` VALUES ('1', '23000', '7.5', '-5.0', '0x8DC20E3AEc0346827763c10F879e681b98FF13Db', '0011003743647', 'VUONG THI LUYEN', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) DEFAULT '0' COMMENT '0 => chua kich hoat, 1 => da kich hoat',
  `profile_fields` text COLLATE utf8_unicode_ci NOT NULL,
  `group` int(11) NOT NULL,
  `last_login` int(11) NOT NULL,
  `login_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'test@gmail.com', 'test@gmail.com', 'HyeanX89H0/pEHl539v0rNTPm4+Gy4nU7bVXNuV985s=', '0', '', '0', '1503374350', '53a159e405aaf921b438326dd623331f6f01a134', '0', '0');