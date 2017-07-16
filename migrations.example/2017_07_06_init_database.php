<?php

use Walker\Foundation\DB;

// 文件名必须以YYYY_MM_DD格式开头，后接下划线分词
// 类名根据文件转化，格式系首字母大写的驼峰法
class InitDatabase
{
	public function up()
	{
		$sql = '
		/*
		Navicat MySQL Data Transfer

		Source Server         : homestead
		Source Server Version : 50717
		Source Host           : 192.168.10.10:3306
		Source Database       : homestead

		Target Server Type    : MYSQL
		Target Server Version : 50717
		File Encoding         : 65001

		Date: 2017-07-06 12:24:36
		*/

		SET FOREIGN_KEY_CHECKS=0;

		-- ----------------------------
		-- Table structure for mark_welcome
		-- ----------------------------
		DROP TABLE IF EXISTS `mark_welcome`;
		CREATE TABLE `mark_welcome` (
		  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
		  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
		  `welcomed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
		  `created_at` timestamp NULL DEFAULT NULL,
		  `updated_at` timestamp NULL DEFAULT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

		-- ----------------------------
		-- Records of mark_welcome
		-- ----------------------------
		INSERT INTO `mark_welcome` VALUES (\'1\', \'Delia Pagac\', \'2017-02-16 22:34:49\', \'2017-02-16 22:34:49\', \'2017-02-16 22:34:49\');
		INSERT INTO `mark_welcome` VALUES (\'2\', \'Delia Pagac\', \'2017-02-16 22:35:31\', \'2017-02-16 22:35:31\', \'2017-02-16 22:35:31\');
		INSERT INTO `mark_welcome` VALUES (\'3\', \'Delia Pagac\', \'2017-02-16 22:36:46\', \'2017-02-16 22:36:46\', \'2017-02-16 22:36:46\');
		INSERT INTO `mark_welcome` VALUES (\'4\', \'Delia Pagac\', \'2017-02-16 22:40:19\', \'2017-02-16 22:40:19\', \'2017-02-16 22:40:19\');
		INSERT INTO `mark_welcome` VALUES (\'5\', \'Delia Pagac\', \'2017-02-17 11:27:29\', \'2017-02-17 11:27:29\', \'2017-02-17 11:27:29\');

		-- ----------------------------
		-- Table structure for migrations
		-- ----------------------------
		DROP TABLE IF EXISTS `migrations`;
		CREATE TABLE `migrations` (
		  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
		  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
		  `batch` int(11) NOT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

		-- ----------------------------
		-- Records of migrations
		-- ----------------------------

		-- ----------------------------
		-- Table structure for password_resets
		-- ----------------------------
		DROP TABLE IF EXISTS `password_resets`;
		CREATE TABLE `password_resets` (
		  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
		  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
		  `created_at` timestamp NULL DEFAULT NULL,
		  KEY `password_resets_email_index` (`email`),
		  KEY `password_resets_token_index` (`token`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

		-- ----------------------------
		-- Records of password_resets
		-- ----------------------------

		-- ----------------------------
		-- Table structure for users
		-- ----------------------------
		DROP TABLE IF EXISTS `users`;
		CREATE TABLE `users` (
		  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
		  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
		  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
		  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
		  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
		  `created_at` timestamp NULL DEFAULT NULL,
		  `updated_at` timestamp NULL DEFAULT NULL,
		  PRIMARY KEY (`id`),
		  UNIQUE KEY `users_email_unique` (`email`)
		) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

		-- ----------------------------
		-- Records of users
		-- ----------------------------
		INSERT INTO `users` VALUES (\'1\', \'Delia Pagac\', \'grady.keira@example.org\', \'$2y$10$3vrGH4zvKf25bK.7S8pj4ueqV8dqr/yX2CQnrNrb6DlcLPTfDKQuS\', \'nliFGPwNlX\', \'2017-02-16 22:23:20\', \'2017-02-16 22:23:20\');
		INSERT INTO `users` VALUES (\'2\', \'liang\', \'123@123.com\', \'$2y$10$kNzsQm5CmZgHaK3sVW2P6elJ/GZWC0IJkPv4SfMNdwOHn/FU/zXoa\', null, \'2017-03-17 16:02:58\', \'2017-03-17 16:02:58\');

';
		DB::query($sql);
	}

	public function down()
	{

	}
}