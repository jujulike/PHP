### v1.0.5 ###

# wxapp：新增is_virtuals字段#
ALTER TABLE `hema_wxapp`
ADD COLUMN `is_virtuals` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '虚拟用户(0关闭 1开启)';

#新增数据表 - 虚拟用户表#

#虚拟用户表#
DROP TABLE IF EXISTS `hema_virtuals`;
CREATE TABLE `hema_virtuals` (
  `virtuals_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `nickName` varchar(255) NOT NULL DEFAULT '' COMMENT '昵称',
  `avatarUrl` varchar(255) NOT NULL DEFAULT '' COMMENT '头像',
  `doing` varchar(50) NOT NULL DEFAULT '' COMMENT '在做什么',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`virtuals_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10151 DEFAULT CHARSET=utf8;
INSERT INTO `hema_virtuals` VALUES ('10001', '急紅了臉', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10002', '找抽呢.', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10003', '瞅啥呢', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10004', '像旧时光', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10005', '饮醉酒', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10006', '天真', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10007', '吴家可归', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10008', '快乐都雷同', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10009', '那逼是挂', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10010', '这逼有炸', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10011', '豹纹', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10012', '予久愈旧', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10013', '不自欺', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10014', '不介意', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10015', '零度的忧伤', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10016', '落叶不随风', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10017', '俗世的流离', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10018', '不一样的天空', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10019', '决定放手了', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10020', '想到就心酸', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10021', '倾一池温柔', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10022', '花落不相离', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10023', '雨幕丅の邂逅', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10024', '夕颜为谁舞', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10025', '因莫而生', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10026', '你的笑', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10027', '绻思人', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10028', '当初的我', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10029', '消磨中过活', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10030', '爱你是习惯', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10031', '刚刚好', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10032', '往反方向', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10033', '贪我', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10034', '等待被叫醒', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10035', '然后离开', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10036', '错位的梦寐', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10037', '比如我爱你', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10038', '心里没了光', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10039', '无结果的追', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10040', '人生如梦', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10041', '闺怨无梦', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10042', '一别便不再见', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10043', '回忆我', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10044', '久伴！', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10045', '多一处划痕', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10046', '脱口告白', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10047', '送我些痛感', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10048', '我陪着你走', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10049', '浪归', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10050', '花开一场梦', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10051', '听风讲你', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10052', '忙着长大', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10053', '忙着可爱', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10054', '余生不走感情路', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10055', '女人要有范儿', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10056', '这一秒我哭了', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10057', '陪你共撑帆', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10058', '抱墙一个人睡', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10059', '红颜独憔悴', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10060', '配角而已', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10061', '何必入戏', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10062', '奈何桥上', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10063', '冬天旳、寂寞', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10064', '靑春怀旧', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10065', '往日情怀', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10066', '寂寞美少年', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10067', '无处依', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10068', '还会想你', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10069', '笑有多痛', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10070', '粥可暖', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10071', '丢了幸福的猪', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10072', '怎会相见', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10073', '无戏配角', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10074', '学会死心', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10075', '行同陌路', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10076', '自此以后', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10077', '葬花如无物', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10078', '流年', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10079', '是伱的吗', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10080', '心如荒岛', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10081', '咱不稀罕他', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10082', '好菇凉', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10083', '不能没有你', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10084', '何必死缠烂打', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10085', '彼此的过ke', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10086', '年少的欢喜', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10087', '旧街凉风', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10088', '执手闯天涯', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10089', '因为看清', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10090', '掌心的温暖', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10091', '烂人', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10092', '王权浪女', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10093', '腹黑浪女', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10094', '扛刀软妹', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10095', '终止放荡', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10096', '南街浪女', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10097', '女汉子', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10098', '黑寡妇', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10099', '巾帼英雄', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10100', '小巷女流氓', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10101', '霸气范', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10102', '温柔女人', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10103', '美胚控场', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10104', '只羡江中鸳', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10105', '夙缘', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10106', '聆厛ˋ彼岸花开', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10107', '画中妆容', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10108', '半城柳色半声笛', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10109', '烟雨颩飘渺', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10110', '雾隐失落天', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10111', '望断江南岸', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10112', '那季花落', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10113', '心伤透了', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10114', '泪颜葬相思', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10115', '世界这么嗨', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10116', '淡定真不该', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10117', '时光偷走初心', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10118', '不曾走远', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10119', '旧颜i', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10120', '花开淡墨', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10121', '撑一把纸伞', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10122', '青丝萦指', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10123', '一厢情愿', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10124', '放不下你', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10125', '放得下过去', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10126', '嗱什麼伪装', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10127', '丢了薇笑', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10128', '朱唇点点醉', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10129', '沧桑过后正年轻', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10130', '岁月之沉淀', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10131', '淡然一笑', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10132', '我怕的是人心', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10133', '曾天真现成熟', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10134', '不抽烟い', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10135', '转身、快乐', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10136', '思念满溢', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10137', '我要淡定', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10138', '扑了空', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10139', '微风', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10140', '茕茕孑立', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10141', '血狗', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10142', '我超可爱吖', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10143', '钟意', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10144', '醋话', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10145', '漫读', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10146', '大屌萝莉', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10147', '少女贩卖机', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10148', '乖不如野', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10149', '亲嘴', '', '', '0', '0');
INSERT INTO `hema_virtuals` VALUES ('10150', '热爱生命', '', '', '0', '0');