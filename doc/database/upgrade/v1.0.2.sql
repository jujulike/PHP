### v1.0.2 ###

# 站点配置：对对机开发者账号密钥
ALTER TABLE `hema_config`
ADD COLUMN `ddj_appid` varchar(50) NOT NULL DEFAULT '' COMMENT '对对机开发者账号';
ADD COLUMN `ddj_appsecret` varchar(50) NOT NULL DEFAULT '' COMMENT '对对机开发者密钥';

#新增数据表 - 模板消息表#
DROP TABLE IF EXISTS `hema_tplmsg`;
CREATE TABLE `hema_tplmsg` (
  `tplmsg_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `tpl_type` tinyint(3) unsigned NOT NULL DEFAULT '10' COMMENT '类型(10支付通知，20发货通知

，30售后通知)',
  `template_id` varchar(50) NOT NULL DEFAULT '' COMMENT '模板消息ID',
  `wxapp_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '小程序id',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`tplmsg_id`),
  UNIQUE KEY `template_id` (`template_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10001 DEFAULT CHARSET=utf8;
