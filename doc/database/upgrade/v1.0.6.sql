### v1.0.6 ###

#新增 - 充值记录#
DROP TABLE IF EXISTS `hema_recharge`;
CREATE TABLE `hema_recharge` (
  `recharge_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '充值id',
  `order_no` varchar(20) NOT NULL DEFAULT '' COMMENT '订单号',
  `money` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '充值金额',
  `gift_money` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '赠送金额',
  `recharge_plan_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '套餐ID',
  `user_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
  `pay_status` tinyint(3) unsigned NOT NULL DEFAULT '10' COMMENT '支付状态(10待付款 20已付款)',
  `pay_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '支付时间',
  `transaction_id` varchar(30) NOT NULL DEFAULT '' COMMENT '微信支付交易号',
  `wxapp_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '小程序id',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`recharge_id`),
  UNIQUE KEY `order_no` (`order_no`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10001 DEFAULT CHARSET=utf8;