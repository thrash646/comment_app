/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : fenix-test

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-05-12 22:03:28
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for feedback
-- ----------------------------
DROP TABLE IF EXISTS `feedback`;
CREATE TABLE `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `comment` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of feedback
-- ----------------------------
INSERT INTO `feedback` VALUES ('1', 'Steve Jobs', 'steve@apple.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pretium eu tortor at rutrum. Phasellus eu tellus ex. Fusce magna elit, consequat ut lorem ultricies, pretium viverra nibh. Aenean tincidu');
INSERT INTO `feedback` VALUES ('2', 'Randy Moss', 'randy@mail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pretium eu tortor at rutrum. Phasellus eu tellus ex. Fusce magna elit, consequat ut lorem ultricies, pretium viverra nibh. Aenean tincidu');
INSERT INTO `feedback` VALUES ('3', 'Tim Duncan', 'timmyd@email.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pretium eu tortor at rutrum. Phasellus eu tellus ex. Fusce magna elit, consequat ut lorem ultricies, pretium viverra nibh. Aenean tincidu');
INSERT INTO `feedback` VALUES ('4', 'Mike Corkum', 'MrCorks@email.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pretium eu tortor at rutrum. Phasellus eu tellus ex. Fusce magna elit, consequat ut lorem ultricies, pretium viverra nibh. Aenean tincidu');
INSERT INTO `feedback` VALUES ('5', 'Tony Parker', 'tonyp@email.com', 'I am getting old. I hope we can still win in spite of myself.');
INSERT INTO `feedback` VALUES ('6', 'Manu Ginobli', 'manuuuu@gmail.com', 'I may not be as old as Tim, but I\'m getting up there.');
INSERT INTO `feedback` VALUES ('7', 'E. Honda', 'bigboi@gmail.com', 'I love sushi and sumo wrestling. I am also a fictional Street Fighter.');
INSERT INTO `feedback` VALUES ('8', 'Kobe Bryant', 'bean@gmail.com', 'I was the best there ever was. Even better than Jordan. Ok not really.');
INSERT INTO `feedback` VALUES ('9', 'Roxy Slatcu', 'slats@email.com', 'This is my first comment! I want to win!');
