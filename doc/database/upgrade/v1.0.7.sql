### v1.0.7 ###


#新增 - 公众号关键字回复#
DROP TABLE IF EXISTS `hema_keyword`;
CREATE TABLE `hema_keyword` (
  `keyword_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '编号ID',
  `keyword` varchar(50) NOT NULL DEFAULT '' COMMENT '关键字',
  `type` varchar(10) NOT NULL DEFAULT 'text' COMMENT '消息类型 text=文字，image=图片，voice=音频，video=视频，music=音乐，news=图文',
  `is_open` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '是否开启 0=关闭，1=开启',
  `dataGroup` longtext NOT NULL COMMENT '配置数据',
  `wxapp_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '小程序id',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`keyword_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10001 DEFAULT CHARSET=utf8;


#新增 - 公众号素材表#
DROP TABLE IF EXISTS `hema_material`;
CREATE TABLE `hema_material` (
  `material_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '文件id',
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '素材名称',
  `file_type` tinyint(3) unsigned NOT NULL DEFAULT '10' COMMENT '文件类型 10=图片，20=音频，30=视频，40=图文',
  `file_name` varchar(50) NOT NULL DEFAULT '' COMMENT '本地文件名称',
  `media_id` varchar(50) NOT NULL DEFAULT '' COMMENT '素材media_id',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '素材网络地址',
  `text_no` varchar(20) NOT NULL DEFAULT '' COMMENT '图文素材编号',
  `introduction` varchar(255) NOT NULL DEFAULT '' COMMENT '视频素材描述',
  `wxapp_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '小程序id',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`material_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10001 DEFAULT CHARSET=utf8;

#新增 - 公众号图文素材详情表#
DROP TABLE IF EXISTS `hema_material_text`;
CREATE TABLE `hema_material_text` (
  `material_text_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '记录编号',
  `text_no` varchar(20) NOT NULL DEFAULT '' COMMENT '素材编号',
  `id` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '素材信息序号',
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '标题',
  `author` varchar(50) NOT NULL DEFAULT '' COMMENT '作者',
  `digest` varchar(100) NOT NULL DEFAULT '' COMMENT '摘要',
  `content` longtext NOT NULL COMMENT '正文',
  `media_id` varchar(50) NOT NULL DEFAULT '' COMMENT '素材media_id',
  `file_name` varchar(50) NOT NULL DEFAULT '' COMMENT '本地文件名称',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '封面网络地址',
  `content_source_url` varchar(255) NOT NULL DEFAULT '#' COMMENT '图文链接地址',
  `wxapp_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '微信小程序id',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`material_text_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10001 DEFAULT CHARSET=utf8;

#新增 - 公众号菜单表#
DROP TABLE IF EXISTS `hema_wechat_page`;
CREATE TABLE `hema_wechat_page` (
  `page_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '页面id',
  `page_data` longtext NOT NULL COMMENT '页面数据',
  `wxapp_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '微信小程序id',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10001 DEFAULT CHARSET=utf8;
