### v1.0.8 ###

#store_user表 - 新增字段#
ALTER TABLE `hema_store_user`
ADD COLUMN `type` tinyint(3) unsigned NOT NULL DEFAULT '10' COMMENT '用户类型，10=超级管理，20=商户管理';
ADD COLUMN `expire_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '到期时间';

#store_user表 - 新增超级管理用户,原有账号密码停用 - 新账号admin,密码:hema -#
INSERT INTO `hema_store_user` VALUES ('', 'admin', '5264d8b3ffe7e543987d10334fc6fb43',20,'1529926348','1529926348','1529926348');

#config表 - 删除俩字段 - 废除原管理员账号密码#
ALTER TABLE `hema_config` 
DROP COLUMN `user_name`;
DROP COLUMN `password`;

#新增 - 角色用户表#
DROP TABLE IF EXISTS `hema_role`;
CREATE TABLE `hema_role` (
  `role_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `user_name` varchar(255) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` varchar(255) NOT NULL DEFAULT '' COMMENT '登录密码',
  `real_name` varchar(50) NOT NULL DEFAULT '' COMMENT '姓名',
  `role_category_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '角色分类',
  `store_user_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '上级',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`role_id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=InnoDB AUTO_INCREMENT=10001 DEFAULT CHARSET=utf8;

#新增 - 角色分类表#
DROP TABLE IF EXISTS `hema_role_category`;
CREATE TABLE `hema_role_category` (
  `role_category_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '分类id',
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '分类名称',
  `parent_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '上级分类id',
  `powers` text NOT NULL COMMENT '权利部署',
  `sort` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '排序方式(数字越小越靠前)',
  `store_user_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '所属管理员',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`role_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10001 DEFAULT CHARSET=utf8;

#新增 - 角色类目表#
DROP TABLE IF EXISTS `hema_rules`;
CREATE TABLE `hema_rules` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `text` varchar(50) NOT NULL DEFAULT '' COMMENT '名称',
  `parent` varchar(50) NOT NULL DEFAULT '#'  COMMENT '上级id',
  `sort` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '排序方式(数字越小越靠前)',
  `app_type` varchar(10) NOT NULL DEFAULT '' COMMENT '应用类型',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10001 DEFAULT CHARSET=utf8;










