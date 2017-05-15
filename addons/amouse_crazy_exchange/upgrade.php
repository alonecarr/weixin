<?php
$sql="CREATE TABLE IF NOT EXISTS `ims_amouse_exchange_creditshop_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `displayorder` int(11) DEFAULT '0',
  `title` varchar(255) DEFAULT '',
  `thumb` varchar(255) DEFAULT '',
  `price` decimal(10,2) DEFAULT '0.00',
  `type` tinyint(3) DEFAULT '0',
  `credit` int(11) DEFAULT '0',
  `credit2` int(11) DEFAULT '0',
  `money` decimal(10,2) DEFAULT '0.00',
  `total` int(11) DEFAULT '0',
  `totalday` int(11) DEFAULT '0',
  `detail` text,
  `status` tinyint(3) DEFAULT '0',
  `vip` tinyint(3) DEFAULT '0',
  `istop` tinyint(3) DEFAULT '0',
  `isrecommand` tinyint(3) DEFAULT '0',
  `createtime` int(11) DEFAULT '0',
  `endtime` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_endtime` (`endtime`),
  KEY `idx_createtime` (`createtime`),
  KEY `idx_status` (`status`),
  KEY `idx_displayorder` (`displayorder`),
  KEY `idx_istop` (`istop`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_amouse_exchange_creditshop_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `phone` varchar(255) DEFAULT '',
  `name` varchar(255) DEFAULT '' COMMENT '收货人',
  `addr` varchar(255) DEFAULT '' COMMENT '收货地址',
  `location_p` varchar(255) DEFAULT '' COMMENT '省',
  `location_c` varchar(255) DEFAULT '' COMMENT '市',
  `location_a` varchar(255) DEFAULT '' COMMENT '区',
  `openid` varchar(255) DEFAULT '',
  `goodsid` int(11) DEFAULT '0',
  `fansid` int(11) DEFAULT '0',
  `createtime` int(11) DEFAULT '0',
  `status` tinyint(3) DEFAULT '0' COMMENT '0-未发货 1-已发货 3 取消',
  `usetime` int(11) DEFAULT '0',
  `express` varchar(255) DEFAULT '',
  `expresscom` varchar(255) DEFAULT '',
  `expresssn` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_fansid` (`fansid`),
  KEY `idx_goodsid` (`goodsid`),
  KEY `idx_openid` (`openid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_amouse_exchange_lottery_sysset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `top_bg` varchar(100) DEFAULT '',
  `bg` varchar(100) DEFAULT '',
  `end_time` int(11) DEFAULT '0',
  `sets` longtext,
  `gundong` text,
  `moneys` longtext,
  `money_m_1` double DEFAULT '37.78',
  `money_rate_1` double DEFAULT '0',
  `money_m_2` double DEFAULT '4.99',
  `money_rate_2` double DEFAULT '0',
  `money_m_3` double DEFAULT '0',
  `money_rate_3` double DEFAULT '0',
  `money_m_4` double DEFAULT '0',
  `money_rate_4` double DEFAULT '0',
  `money_m_5` double DEFAULT '0',
  `money_rate_5` double DEFAULT '0',
  `money_m_6` double DEFAULT '0',
  `money_rate_6` double DEFAULT '0',
  `money_m_7` double DEFAULT '0',
  `money_rate_7` double DEFAULT '0',
  `money_m_8` double DEFAULT '0',
  `money_rate_8` double DEFAULT '0',
  `money_m_9` double DEFAULT '0',
  `cashs` longtext,
  `p_type` tinyint(2) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `indx_weid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_amouse_exchange_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `openid` varchar(100) NOT NULL,
  `from_user` varchar(100) NOT NULL,
  `unionid` varchar(100) NOT NULL,
  `nickname` varchar(100) NOT NULL,
  `wechatno` varchar(200) NOT NULL COMMENT '微信号',
  `mobile` varchar(13) NOT NULL COMMENT '手机号',
  `sex` tinyint(1) NOT NULL DEFAULT '0',
  `headimgurl` varchar(255) NOT NULL,
  `svip` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `dzp_number` int(11) NOT NULL DEFAULT '0' COMMENT '大转盘次数',
  `qhb_number` int(11) NOT NULL DEFAULT '0' COMMENT '抢红包次数',
  `createtime` int(10) unsigned NOT NULL DEFAULT '0',
  `last_time` int(10) unsigned NOT NULL DEFAULT '0',
  `totalnum` int(11) DEFAULT '0',
  `credit1` decimal(10,2) unsigned NOT NULL,
  `credit2` decimal(10,2) unsigned NOT NULL,
  `uid` int(11) DEFAULT '0',
  `ipcilent` varchar(20) DEFAULT '',
  `forever` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0为未购买过VIP',
  `ali` varchar(200) NOT NULL,
  `ali_username` varchar(200) NOT NULL,
  `money` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '获得的总金额',
  `tx_money` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '提现金额',
  `wtx_money` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '未提现金额',
  `user_status` int(1) NOT NULL DEFAULT '1' COMMENT '用户状态 1 正常，0拉黑',
  `parent_id` varchar(100) NOT NULL COMMENT '上级_id',
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `openid` (`openid`),
  KEY `user_status` (`user_status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_amouse_exchange_money_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `fansid` int(11) NOT NULL,
  `money` decimal(10,2) NOT NULL COMMENT '提现金额',
  `credit` tinyint(2) DEFAULT '0',
  `status` tinyint(2) DEFAULT '0',
  `ftype` tinyint(2) DEFAULT '0',
  `ipcilent` varchar(20) DEFAULT '',
  `openid` varchar(100) DEFAULT '',
  `par_openid` varchar(100) DEFAULT '',
  `module` varchar(100) NOT NULL DEFAULT '0',
  `createtime` int(11) DEFAULT '0',
  `remark` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_fansid` (`fansid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_amouse_exchange_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL COMMENT '公众账号',
  `openid` varchar(50) NOT NULL COMMENT '微信会员openID',
  `nickname` varchar(20) NOT NULL COMMENT '用户昵称',
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
  `typeid` int(10) unsigned DEFAULT '0' COMMENT '大转盘/抢红包ID',
  `memberid` int(10) unsigned DEFAULT '0' COMMENT '会员ID',
  `ordersn` varchar(20) NOT NULL COMMENT '订单编号',
  `status` smallint(4) NOT NULL DEFAULT '0' COMMENT '0已提交,1为已付款,2为未付款',
  `ispay` smallint(4) NOT NULL DEFAULT '0',
  `paytype` tinyint(1) unsigned NOT NULL COMMENT '1为余额支付,2为支付宝,3为微信支付,4为定价返还',
  `transid` varchar(100) NOT NULL COMMENT '微信订单号',
  `price` decimal(10,2) DEFAULT NULL,
  `wxnotify` varchar(200) DEFAULT NULL,
  `notifytime` int(10) DEFAULT '0',
  `from_user` varchar(50) NOT NULL COMMENT '微信会员openID',
  `tid` varchar(128) NOT NULL,
  `plid` bigint(11) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL COMMENT '充值时间',
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `openid` (`openid`),
  KEY `status` (`status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_amouse_exchange_poster_sysset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `bg` varchar(255) DEFAULT '',
  `data` text,
  `keyword` varchar(255) DEFAULT '',
  `createtime` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_createtime` (`createtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_amouse_exchange_promote_qr` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(3) NOT NULL,
  `acid` int(3) NOT NULL,
  `memberid` int(3) NOT NULL COMMENT '会员id',
  `openid` varchar(100) NOT NULL COMMENT 'openid',
  `sceneid` varchar(100) NOT NULL COMMENT 'sceneid',
  `ticket` varchar(1000) NOT NULL COMMENT 'ticket',
  `qr_img` varchar(500) NOT NULL COMMENT 'qrimg',
  `url` varchar(1000) NOT NULL COMMENT 'url',
  `status` int(1) NOT NULL COMMENT '默认状态',
  `model` tinyint(1) DEFAULT '2',
  `createtime` int(10) DEFAULT '0',
  `media_id` varchar(220) DEFAULT NULL,
  `media_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_amouse_exchange_redpacks_sysset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `apisec` text,
  `appid` varchar(500) DEFAULT '',
  `secret` varchar(500) DEFAULT '',
  `mchid` varchar(100) DEFAULT '',
  `password` varchar(255) DEFAULT '',
  `wishing` varchar(255) DEFAULT '',
  `createtime` int(11) DEFAULT '0',
  `ip` varchar(20) DEFAULT '',
  `tx_count` int(11) DEFAULT '0',
  `send_name` varchar(255) DEFAULT '',
  `act_name` varchar(255) DEFAULT '',
  `remark` varchar(255) DEFAULT '',
  `tx_money` decimal(10,2) DEFAULT '0.00',
  `min_money` decimal(10,2) DEFAULT '0.00',
  `max_money` decimal(10,2) DEFAULT '0.00',
  `min_money1` decimal(10,2) DEFAULT '0.00',
  `max_money1` decimal(10,2) DEFAULT '0.00',
  `total_money` decimal(10,2) DEFAULT '0.00',
  `tplid` varchar(255) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_createtime` (`createtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_amouse_exchange_slide` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `displayorder` tinyint(5) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `link` varchar(200) NOT NULL COMMENT '链接',
  `img` varchar(250) DEFAULT '' COMMENT '图标',
  `status` tinyint(1) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `weid` (`uniacid`),
  KEY `status` (`status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_amouse_exchange_sysset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weid` int(11) DEFAULT '0',
  `acid` int(11) DEFAULT '0',
  `oauthid` int(11) DEFAULT '0',
  `start_time` int(11) DEFAULT '0',
  `end_time` int(11) DEFAULT '0',
  `gundong` text,
  `iscash` tinyint(2) DEFAULT '0',
  `sets` longtext,
  PRIMARY KEY (`id`),
  KEY `indx_weid` (`weid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
";
pdo_run($sql);
if(!pdo_fieldexists('amouse_exchange_creditshop_goods',  'id')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_creditshop_goods')." ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('amouse_exchange_creditshop_goods',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_creditshop_goods')." ADD `uniacid` int(11) DEFAULT '0';");
}
if(!pdo_fieldexists('amouse_exchange_creditshop_goods',  'displayorder')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_creditshop_goods')." ADD `displayorder` int(11) DEFAULT '0';");
}
if(!pdo_fieldexists('amouse_exchange_creditshop_goods',  'title')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_creditshop_goods')." ADD `title` varchar(255) DEFAULT '';");
}
if(!pdo_fieldexists('amouse_exchange_creditshop_goods',  'thumb')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_creditshop_goods')." ADD `thumb` varchar(255) DEFAULT '';");
}
if(!pdo_fieldexists('amouse_exchange_creditshop_goods',  'price')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_creditshop_goods')." ADD `price` decimal(10,2) DEFAULT '0.00';");
}
if(!pdo_fieldexists('amouse_exchange_creditshop_goods',  'type')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_creditshop_goods')." ADD `type` tinyint(3) DEFAULT '0';");
}
if(!pdo_fieldexists('amouse_exchange_creditshop_goods',  'credit')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_creditshop_goods')." ADD `credit` int(11) DEFAULT '0';");
}
if(!pdo_fieldexists('amouse_exchange_creditshop_goods',  'credit2')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_creditshop_goods')." ADD `credit2` int(11) DEFAULT '0';");
}
if(!pdo_fieldexists('amouse_exchange_creditshop_goods',  'money')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_creditshop_goods')." ADD `money` decimal(10,2) DEFAULT '0.00';");
}
if(!pdo_fieldexists('amouse_exchange_creditshop_goods',  'total')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_creditshop_goods')." ADD `total` int(11) DEFAULT '0';");
}
if(!pdo_fieldexists('amouse_exchange_creditshop_goods',  'totalday')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_creditshop_goods')." ADD `totalday` int(11) DEFAULT '0';");
}
if(!pdo_fieldexists('amouse_exchange_creditshop_goods',  'detail')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_creditshop_goods')." ADD `detail` text;");
}
if(!pdo_fieldexists('amouse_exchange_creditshop_goods',  'status')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_creditshop_goods')." ADD `status` tinyint(3) DEFAULT '0';");
}
if(!pdo_fieldexists('amouse_exchange_creditshop_goods',  'vip')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_creditshop_goods')." ADD `vip` tinyint(3) DEFAULT '0';");
}
if(!pdo_fieldexists('amouse_exchange_creditshop_goods',  'istop')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_creditshop_goods')." ADD `istop` tinyint(3) DEFAULT '0';");
}
if(!pdo_fieldexists('amouse_exchange_creditshop_goods',  'isrecommand')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_creditshop_goods')." ADD `isrecommand` tinyint(3) DEFAULT '0';");
}
if(!pdo_fieldexists('amouse_exchange_creditshop_goods',  'createtime')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_creditshop_goods')." ADD `createtime` int(11) DEFAULT '0';");
}
if(!pdo_fieldexists('amouse_exchange_creditshop_goods',  'endtime')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_creditshop_goods')." ADD `endtime` int(11) DEFAULT '0';");
}
if(!pdo_indexexists('amouse_exchange_creditshop_goods',  'idx_uniacid')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_creditshop_goods')." ADD KEY `idx_uniacid` (`uniacid`);");
}
if(!pdo_indexexists('amouse_exchange_creditshop_goods',  'idx_endtime')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_creditshop_goods')." ADD KEY `idx_endtime` (`endtime`);");
}
if(!pdo_indexexists('amouse_exchange_creditshop_goods',  'idx_createtime')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_creditshop_goods')." ADD KEY `idx_createtime` (`createtime`);");
}
if(!pdo_indexexists('amouse_exchange_creditshop_goods',  'idx_status')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_creditshop_goods')." ADD KEY `idx_status` (`status`);");
}
if(!pdo_indexexists('amouse_exchange_creditshop_goods',  'idx_displayorder')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_creditshop_goods')." ADD KEY `idx_displayorder` (`displayorder`);");
}
if(!pdo_indexexists('amouse_exchange_creditshop_goods',  'idx_istop')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_creditshop_goods')." ADD KEY `idx_istop` (`istop`);");
}
if(!pdo_fieldexists('amouse_exchange_creditshop_log',  'id')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_creditshop_log')." ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('amouse_exchange_creditshop_log',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_creditshop_log')." ADD `uniacid` int(11) DEFAULT '0';");
}
if(!pdo_fieldexists('amouse_exchange_creditshop_log',  'phone')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_creditshop_log')." ADD `phone` varchar(255) DEFAULT '';");
}
if(!pdo_fieldexists('amouse_exchange_creditshop_log',  'name')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_creditshop_log')." ADD `name` varchar(255) DEFAULT '' COMMENT '收货人';");
}
if(!pdo_fieldexists('amouse_exchange_creditshop_log',  'addr')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_creditshop_log')." ADD `addr` varchar(255) DEFAULT '' COMMENT '收货地址';");
}
if(!pdo_fieldexists('amouse_exchange_creditshop_log',  'location_p')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_creditshop_log')." ADD `location_p` varchar(255) DEFAULT '' COMMENT '省';");
}
if(!pdo_fieldexists('amouse_exchange_creditshop_log',  'location_c')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_creditshop_log')." ADD `location_c` varchar(255) DEFAULT '' COMMENT '市';");
}
if(!pdo_fieldexists('amouse_exchange_creditshop_log',  'location_a')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_creditshop_log')." ADD `location_a` varchar(255) DEFAULT '' COMMENT '区';");
}
if(!pdo_fieldexists('amouse_exchange_creditshop_log',  'openid')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_creditshop_log')." ADD `openid` varchar(255) DEFAULT '';");
}
if(!pdo_fieldexists('amouse_exchange_creditshop_log',  'goodsid')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_creditshop_log')." ADD `goodsid` int(11) DEFAULT '0';");
}
if(!pdo_fieldexists('amouse_exchange_creditshop_log',  'fansid')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_creditshop_log')." ADD `fansid` int(11) DEFAULT '0';");
}
if(!pdo_fieldexists('amouse_exchange_creditshop_log',  'createtime')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_creditshop_log')." ADD `createtime` int(11) DEFAULT '0';");
}
if(!pdo_fieldexists('amouse_exchange_creditshop_log',  'status')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_creditshop_log')." ADD `status` tinyint(3) DEFAULT '0' COMMENT '0-未发货 1-已发货 3 取消';");
}
if(!pdo_fieldexists('amouse_exchange_creditshop_log',  'usetime')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_creditshop_log')." ADD `usetime` int(11) DEFAULT '0';");
}
if(!pdo_fieldexists('amouse_exchange_creditshop_log',  'express')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_creditshop_log')." ADD `express` varchar(255) DEFAULT '';");
}
if(!pdo_fieldexists('amouse_exchange_creditshop_log',  'expresscom')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_creditshop_log')." ADD `expresscom` varchar(255) DEFAULT '';");
}
if(!pdo_fieldexists('amouse_exchange_creditshop_log',  'expresssn')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_creditshop_log')." ADD `expresssn` varchar(255) DEFAULT '';");
}
if(!pdo_indexexists('amouse_exchange_creditshop_log',  'idx_uniacid')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_creditshop_log')." ADD KEY `idx_uniacid` (`uniacid`);");
}
if(!pdo_indexexists('amouse_exchange_creditshop_log',  'idx_fansid')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_creditshop_log')." ADD KEY `idx_fansid` (`fansid`);");
}
if(!pdo_indexexists('amouse_exchange_creditshop_log',  'idx_goodsid')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_creditshop_log')." ADD KEY `idx_goodsid` (`goodsid`);");
}
if(!pdo_indexexists('amouse_exchange_creditshop_log',  'idx_openid')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_creditshop_log')." ADD KEY `idx_openid` (`openid`);");
}
if(!pdo_fieldexists('amouse_exchange_lottery_sysset',  'id')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_lottery_sysset')." ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('amouse_exchange_lottery_sysset',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_lottery_sysset')." ADD `uniacid` int(11) DEFAULT '0';");
}
if(!pdo_fieldexists('amouse_exchange_lottery_sysset',  'top_bg')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_lottery_sysset')." ADD `top_bg` varchar(100) DEFAULT '';");
}
if(!pdo_fieldexists('amouse_exchange_lottery_sysset',  'bg')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_lottery_sysset')." ADD `bg` varchar(100) DEFAULT '';");
}
if(!pdo_fieldexists('amouse_exchange_lottery_sysset',  'end_time')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_lottery_sysset')." ADD `end_time` int(11) DEFAULT '0';");
}
if(!pdo_fieldexists('amouse_exchange_lottery_sysset',  'sets')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_lottery_sysset')." ADD `sets` longtext;");
}
if(!pdo_fieldexists('amouse_exchange_lottery_sysset',  'gundong')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_lottery_sysset')." ADD `gundong` text;");
}
if(!pdo_fieldexists('amouse_exchange_lottery_sysset',  'moneys')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_lottery_sysset')." ADD `moneys` longtext;");
}
if(!pdo_fieldexists('amouse_exchange_lottery_sysset',  'money_m_1')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_lottery_sysset')." ADD `money_m_1` double DEFAULT '37.78';");
}
if(!pdo_fieldexists('amouse_exchange_lottery_sysset',  'money_rate_1')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_lottery_sysset')." ADD `money_rate_1` double DEFAULT '0';");
}
if(!pdo_fieldexists('amouse_exchange_lottery_sysset',  'money_m_2')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_lottery_sysset')." ADD `money_m_2` double DEFAULT '4.99';");
}
if(!pdo_fieldexists('amouse_exchange_lottery_sysset',  'money_rate_2')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_lottery_sysset')." ADD `money_rate_2` double DEFAULT '0';");
}
if(!pdo_fieldexists('amouse_exchange_lottery_sysset',  'money_m_3')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_lottery_sysset')." ADD `money_m_3` double DEFAULT '0';");
}
if(!pdo_fieldexists('amouse_exchange_lottery_sysset',  'money_rate_3')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_lottery_sysset')." ADD `money_rate_3` double DEFAULT '0';");
}
if(!pdo_fieldexists('amouse_exchange_lottery_sysset',  'money_m_4')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_lottery_sysset')." ADD `money_m_4` double DEFAULT '0';");
}
if(!pdo_fieldexists('amouse_exchange_lottery_sysset',  'money_rate_4')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_lottery_sysset')." ADD `money_rate_4` double DEFAULT '0';");
}
if(!pdo_fieldexists('amouse_exchange_lottery_sysset',  'money_m_5')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_lottery_sysset')." ADD `money_m_5` double DEFAULT '0';");
}
if(!pdo_fieldexists('amouse_exchange_lottery_sysset',  'money_rate_5')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_lottery_sysset')." ADD `money_rate_5` double DEFAULT '0';");
}
if(!pdo_fieldexists('amouse_exchange_lottery_sysset',  'money_m_6')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_lottery_sysset')." ADD `money_m_6` double DEFAULT '0';");
}
if(!pdo_fieldexists('amouse_exchange_lottery_sysset',  'money_rate_6')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_lottery_sysset')." ADD `money_rate_6` double DEFAULT '0';");
}
if(!pdo_fieldexists('amouse_exchange_lottery_sysset',  'money_m_7')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_lottery_sysset')." ADD `money_m_7` double DEFAULT '0';");
}
if(!pdo_fieldexists('amouse_exchange_lottery_sysset',  'money_rate_7')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_lottery_sysset')." ADD `money_rate_7` double DEFAULT '0';");
}
if(!pdo_fieldexists('amouse_exchange_lottery_sysset',  'money_m_8')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_lottery_sysset')." ADD `money_m_8` double DEFAULT '0';");
}
if(!pdo_fieldexists('amouse_exchange_lottery_sysset',  'money_rate_8')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_lottery_sysset')." ADD `money_rate_8` double DEFAULT '0';");
}
if(!pdo_fieldexists('amouse_exchange_lottery_sysset',  'money_m_9')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_lottery_sysset')." ADD `money_m_9` double DEFAULT '0';");
}
if(!pdo_fieldexists('amouse_exchange_lottery_sysset',  'cashs')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_lottery_sysset')." ADD `cashs` longtext;");
}
if(!pdo_fieldexists('amouse_exchange_lottery_sysset',  'p_type')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_lottery_sysset')." ADD `p_type` tinyint(2) DEFAULT '0';");
}
if(!pdo_indexexists('amouse_exchange_lottery_sysset',  'indx_weid')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_lottery_sysset')." ADD KEY `indx_weid` (`uniacid`);");
}
if(!pdo_fieldexists('amouse_exchange_member',  'id')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_member')." ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('amouse_exchange_member',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_member')." ADD `uniacid` int(11) NOT NULL;");
}
if(!pdo_fieldexists('amouse_exchange_member',  'openid')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_member')." ADD `openid` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('amouse_exchange_member',  'from_user')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_member')." ADD `from_user` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('amouse_exchange_member',  'unionid')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_member')." ADD `unionid` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('amouse_exchange_member',  'nickname')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_member')." ADD `nickname` varchar(100) NOT NULL;");
}
if(!pdo_fieldexists('amouse_exchange_member',  'wechatno')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_member')." ADD `wechatno` varchar(200) NOT NULL COMMENT '微信号';");
}
if(!pdo_fieldexists('amouse_exchange_member',  'mobile')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_member')." ADD `mobile` varchar(13) NOT NULL COMMENT '手机号';");
}
if(!pdo_fieldexists('amouse_exchange_member',  'sex')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_member')." ADD `sex` tinyint(1) NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists('amouse_exchange_member',  'headimgurl')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_member')." ADD `headimgurl` varchar(255) NOT NULL;");
}
if(!pdo_fieldexists('amouse_exchange_member',  'svip')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_member')." ADD `svip` tinyint(1) unsigned NOT NULL DEFAULT '1';");
}
if(!pdo_fieldexists('amouse_exchange_member',  'dzp_number')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_member')." ADD `dzp_number` int(11) NOT NULL DEFAULT '0' COMMENT '大转盘次数';");
}
if(!pdo_fieldexists('amouse_exchange_member',  'qhb_number')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_member')." ADD `qhb_number` int(11) NOT NULL DEFAULT '0' COMMENT '抢红包次数';");
}
if(!pdo_fieldexists('amouse_exchange_member',  'createtime')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_member')." ADD `createtime` int(10) unsigned NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists('amouse_exchange_member',  'last_time')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_member')." ADD `last_time` int(10) unsigned NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists('amouse_exchange_member',  'totalnum')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_member')." ADD `totalnum` int(11) DEFAULT '0';");
}
if(!pdo_fieldexists('amouse_exchange_member',  'credit1')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_member')." ADD `credit1` decimal(10,2) unsigned NOT NULL;");
}
if(!pdo_fieldexists('amouse_exchange_member',  'credit2')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_member')." ADD `credit2` decimal(10,2) unsigned NOT NULL;");
}
if(!pdo_fieldexists('amouse_exchange_member',  'uid')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_member')." ADD `uid` int(11) DEFAULT '0';");
}
if(!pdo_fieldexists('amouse_exchange_member',  'ipcilent')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_member')." ADD `ipcilent` varchar(20) DEFAULT '';");
}
if(!pdo_fieldexists('amouse_exchange_member',  'forever')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_member')." ADD `forever` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0为未购买过VIP';");
}
if(!pdo_fieldexists('amouse_exchange_member',  'ali')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_member')." ADD `ali` varchar(200) NOT NULL;");
}
if(!pdo_fieldexists('amouse_exchange_member',  'ali_username')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_member')." ADD `ali_username` varchar(200) NOT NULL;");
}
if(!pdo_fieldexists('amouse_exchange_member',  'money')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_member')." ADD `money` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '获得的总金额';");
}
if(!pdo_fieldexists('amouse_exchange_member',  'tx_money')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_member')." ADD `tx_money` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '提现金额';");
}
if(!pdo_fieldexists('amouse_exchange_member',  'wtx_money')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_member')." ADD `wtx_money` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '未提现金额';");
}
if(!pdo_fieldexists('amouse_exchange_member',  'user_status')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_member')." ADD `user_status` int(1) NOT NULL DEFAULT '1' COMMENT '用户状态 1 正常，0拉黑';");
}
if(!pdo_fieldexists('amouse_exchange_member',  'parent_id')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_member')." ADD `parent_id` varchar(100) NOT NULL COMMENT '上级_id';");
}
if(!pdo_indexexists('amouse_exchange_member',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_member')." ADD KEY `uniacid` (`uniacid`);");
}
if(!pdo_indexexists('amouse_exchange_member',  'openid')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_member')." ADD KEY `openid` (`openid`);");
}
if(!pdo_indexexists('amouse_exchange_member',  'user_status')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_member')." ADD KEY `user_status` (`user_status`);");
}
if(!pdo_fieldexists('amouse_exchange_money_record',  'id')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_money_record')." ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('amouse_exchange_money_record',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_money_record')." ADD `uniacid` int(11) NOT NULL;");
}
if(!pdo_fieldexists('amouse_exchange_money_record',  'fansid')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_money_record')." ADD `fansid` int(11) NOT NULL;");
}
if(!pdo_fieldexists('amouse_exchange_money_record',  'money')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_money_record')." ADD `money` decimal(10,2) NOT NULL COMMENT '提现金额';");
}
if(!pdo_fieldexists('amouse_exchange_money_record',  'credit')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_money_record')." ADD `credit` tinyint(2) DEFAULT '0';");
}
if(!pdo_fieldexists('amouse_exchange_money_record',  'status')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_money_record')." ADD `status` tinyint(2) DEFAULT '0';");
}
if(!pdo_fieldexists('amouse_exchange_money_record',  'ftype')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_money_record')." ADD `ftype` tinyint(2) DEFAULT '0';");
}
if(!pdo_fieldexists('amouse_exchange_money_record',  'ipcilent')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_money_record')." ADD `ipcilent` varchar(20) DEFAULT '';");
}
if(!pdo_fieldexists('amouse_exchange_money_record',  'openid')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_money_record')." ADD `openid` varchar(100) DEFAULT '';");
}
if(!pdo_fieldexists('amouse_exchange_money_record',  'par_openid')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_money_record')." ADD `par_openid` varchar(100) DEFAULT '';");
}
if(!pdo_fieldexists('amouse_exchange_money_record',  'module')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_money_record')." ADD `module` varchar(100) NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists('amouse_exchange_money_record',  'createtime')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_money_record')." ADD `createtime` int(11) DEFAULT '0';");
}
if(!pdo_fieldexists('amouse_exchange_money_record',  'remark')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_money_record')." ADD `remark` varchar(100) NOT NULL;");
}
if(!pdo_indexexists('amouse_exchange_money_record',  'idx_uniacid')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_money_record')." ADD KEY `idx_uniacid` (`uniacid`);");
}
if(!pdo_indexexists('amouse_exchange_money_record',  'idx_fansid')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_money_record')." ADD KEY `idx_fansid` (`fansid`);");
}
if(!pdo_fieldexists('amouse_exchange_order',  'id')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_order')." ADD `id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('amouse_exchange_order',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_order')." ADD `uniacid` int(10) unsigned NOT NULL COMMENT '公众账号';");
}
if(!pdo_fieldexists('amouse_exchange_order',  'openid')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_order')." ADD `openid` varchar(50) NOT NULL COMMENT '微信会员openID';");
}
if(!pdo_fieldexists('amouse_exchange_order',  'nickname')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_order')." ADD `nickname` varchar(20) NOT NULL COMMENT '用户昵称';");
}
if(!pdo_fieldexists('amouse_exchange_order',  'uid')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_order')." ADD `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID';");
}
if(!pdo_fieldexists('amouse_exchange_order',  'typeid')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_order')." ADD `typeid` int(10) unsigned DEFAULT '0' COMMENT '大转盘/抢红包ID';");
}
if(!pdo_fieldexists('amouse_exchange_order',  'memberid')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_order')." ADD `memberid` int(10) unsigned DEFAULT '0' COMMENT '会员ID';");
}
if(!pdo_fieldexists('amouse_exchange_order',  'ordersn')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_order')." ADD `ordersn` varchar(20) NOT NULL COMMENT '订单编号';");
}
if(!pdo_fieldexists('amouse_exchange_order',  'status')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_order')." ADD `status` smallint(4) NOT NULL DEFAULT '0' COMMENT '0已提交,1为已付款,2为未付款';");
}
if(!pdo_fieldexists('amouse_exchange_order',  'ispay')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_order')." ADD `ispay` smallint(4) NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists('amouse_exchange_order',  'paytype')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_order')." ADD `paytype` tinyint(1) unsigned NOT NULL COMMENT '1为余额支付,2为支付宝,3为微信支付,4为定价返还';");
}
if(!pdo_fieldexists('amouse_exchange_order',  'transid')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_order')." ADD `transid` varchar(100) NOT NULL COMMENT '微信订单号';");
}
if(!pdo_fieldexists('amouse_exchange_order',  'price')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_order')." ADD `price` decimal(10,2) DEFAULT NULL;");
}
if(!pdo_fieldexists('amouse_exchange_order',  'wxnotify')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_order')." ADD `wxnotify` varchar(200) DEFAULT NULL;");
}
if(!pdo_fieldexists('amouse_exchange_order',  'notifytime')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_order')." ADD `notifytime` int(10) DEFAULT '0';");
}
if(!pdo_fieldexists('amouse_exchange_order',  'from_user')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_order')." ADD `from_user` varchar(50) NOT NULL COMMENT '微信会员openID';");
}
if(!pdo_fieldexists('amouse_exchange_order',  'tid')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_order')." ADD `tid` varchar(128) NOT NULL;");
}
if(!pdo_fieldexists('amouse_exchange_order',  'plid')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_order')." ADD `plid` bigint(11) unsigned NOT NULL;");
}
if(!pdo_fieldexists('amouse_exchange_order',  'createtime')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_order')." ADD `createtime` int(10) unsigned NOT NULL COMMENT '充值时间';");
}
if(!pdo_indexexists('amouse_exchange_order',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_order')." ADD KEY `uniacid` (`uniacid`);");
}
if(!pdo_indexexists('amouse_exchange_order',  'openid')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_order')." ADD KEY `openid` (`openid`);");
}
if(!pdo_indexexists('amouse_exchange_order',  'status')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_order')." ADD KEY `status` (`status`);");
}
if(!pdo_fieldexists('amouse_exchange_poster_sysset',  'id')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_poster_sysset')." ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('amouse_exchange_poster_sysset',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_poster_sysset')." ADD `uniacid` int(11) DEFAULT '0';");
}
if(!pdo_fieldexists('amouse_exchange_poster_sysset',  'bg')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_poster_sysset')." ADD `bg` varchar(255) DEFAULT '';");
}
if(!pdo_fieldexists('amouse_exchange_poster_sysset',  'data')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_poster_sysset')." ADD `data` text;");
}
if(!pdo_fieldexists('amouse_exchange_poster_sysset',  'keyword')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_poster_sysset')." ADD `keyword` varchar(255) DEFAULT '';");
}
if(!pdo_fieldexists('amouse_exchange_poster_sysset',  'createtime')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_poster_sysset')." ADD `createtime` int(11) DEFAULT '0';");
}
if(!pdo_indexexists('amouse_exchange_poster_sysset',  'idx_uniacid')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_poster_sysset')." ADD KEY `idx_uniacid` (`uniacid`);");
}
if(!pdo_indexexists('amouse_exchange_poster_sysset',  'idx_createtime')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_poster_sysset')." ADD KEY `idx_createtime` (`createtime`);");
}
if(!pdo_fieldexists('amouse_exchange_promote_qr',  'id')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_promote_qr')." ADD `id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('amouse_exchange_promote_qr',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_promote_qr')." ADD `uniacid` int(3) NOT NULL;");
}
if(!pdo_fieldexists('amouse_exchange_promote_qr',  'acid')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_promote_qr')." ADD `acid` int(3) NOT NULL;");
}
if(!pdo_fieldexists('amouse_exchange_promote_qr',  'memberid')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_promote_qr')." ADD `memberid` int(3) NOT NULL COMMENT '会员id';");
}
if(!pdo_fieldexists('amouse_exchange_promote_qr',  'openid')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_promote_qr')." ADD `openid` varchar(100) NOT NULL COMMENT 'openid';");
}
if(!pdo_fieldexists('amouse_exchange_promote_qr',  'sceneid')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_promote_qr')." ADD `sceneid` varchar(100) NOT NULL COMMENT 'sceneid';");
}
if(!pdo_fieldexists('amouse_exchange_promote_qr',  'ticket')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_promote_qr')." ADD `ticket` varchar(1000) NOT NULL COMMENT 'ticket';");
}
if(!pdo_fieldexists('amouse_exchange_promote_qr',  'qr_img')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_promote_qr')." ADD `qr_img` varchar(500) NOT NULL COMMENT 'qrimg';");
}
if(!pdo_fieldexists('amouse_exchange_promote_qr',  'url')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_promote_qr')." ADD `url` varchar(1000) NOT NULL COMMENT 'url';");
}
if(!pdo_fieldexists('amouse_exchange_promote_qr',  'status')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_promote_qr')." ADD `status` int(1) NOT NULL COMMENT '默认状态';");
}
if(!pdo_fieldexists('amouse_exchange_promote_qr',  'model')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_promote_qr')." ADD `model` tinyint(1) DEFAULT '2';");
}
if(!pdo_fieldexists('amouse_exchange_promote_qr',  'createtime')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_promote_qr')." ADD `createtime` int(10) DEFAULT '0';");
}
if(!pdo_fieldexists('amouse_exchange_promote_qr',  'media_id')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_promote_qr')." ADD `media_id` varchar(220) DEFAULT NULL;");
}
if(!pdo_fieldexists('amouse_exchange_promote_qr',  'media_time')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_promote_qr')." ADD `media_time` int(11) DEFAULT NULL;");
}
if(!pdo_fieldexists('amouse_exchange_redpacks_sysset',  'id')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_redpacks_sysset')." ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('amouse_exchange_redpacks_sysset',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_redpacks_sysset')." ADD `uniacid` int(11) DEFAULT '0';");
}
if(!pdo_fieldexists('amouse_exchange_redpacks_sysset',  'apisec')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_redpacks_sysset')." ADD `apisec` text;");
}
if(!pdo_fieldexists('amouse_exchange_redpacks_sysset',  'appid')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_redpacks_sysset')." ADD `appid` varchar(500) DEFAULT '';");
}
if(!pdo_fieldexists('amouse_exchange_redpacks_sysset',  'secret')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_redpacks_sysset')." ADD `secret` varchar(500) DEFAULT '';");
}
if(!pdo_fieldexists('amouse_exchange_redpacks_sysset',  'mchid')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_redpacks_sysset')." ADD `mchid` varchar(100) DEFAULT '';");
}
if(!pdo_fieldexists('amouse_exchange_redpacks_sysset',  'password')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_redpacks_sysset')." ADD `password` varchar(255) DEFAULT '';");
}
if(!pdo_fieldexists('amouse_exchange_redpacks_sysset',  'wishing')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_redpacks_sysset')." ADD `wishing` varchar(255) DEFAULT '';");
}
if(!pdo_fieldexists('amouse_exchange_redpacks_sysset',  'createtime')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_redpacks_sysset')." ADD `createtime` int(11) DEFAULT '0';");
}
if(!pdo_fieldexists('amouse_exchange_redpacks_sysset',  'ip')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_redpacks_sysset')." ADD `ip` varchar(20) DEFAULT '';");
}
if(!pdo_fieldexists('amouse_exchange_redpacks_sysset',  'tx_count')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_redpacks_sysset')." ADD `tx_count` int(11) DEFAULT '0';");
}
if(!pdo_fieldexists('amouse_exchange_redpacks_sysset',  'send_name')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_redpacks_sysset')." ADD `send_name` varchar(255) DEFAULT '';");
}
if(!pdo_fieldexists('amouse_exchange_redpacks_sysset',  'act_name')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_redpacks_sysset')." ADD `act_name` varchar(255) DEFAULT '';");
}
if(!pdo_fieldexists('amouse_exchange_redpacks_sysset',  'remark')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_redpacks_sysset')." ADD `remark` varchar(255) DEFAULT '';");
}
if(!pdo_fieldexists('amouse_exchange_redpacks_sysset',  'tx_money')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_redpacks_sysset')." ADD `tx_money` decimal(10,2) DEFAULT '0.00';");
}
if(!pdo_fieldexists('amouse_exchange_redpacks_sysset',  'min_money')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_redpacks_sysset')." ADD `min_money` decimal(10,2) DEFAULT '0.00';");
}
if(!pdo_fieldexists('amouse_exchange_redpacks_sysset',  'max_money')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_redpacks_sysset')." ADD `max_money` decimal(10,2) DEFAULT '0.00';");
}
if(!pdo_fieldexists('amouse_exchange_redpacks_sysset',  'min_money1')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_redpacks_sysset')." ADD `min_money1` decimal(10,2) DEFAULT '0.00';");
}
if(!pdo_fieldexists('amouse_exchange_redpacks_sysset',  'max_money1')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_redpacks_sysset')." ADD `max_money1` decimal(10,2) DEFAULT '0.00';");
}
if(!pdo_fieldexists('amouse_exchange_redpacks_sysset',  'total_money')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_redpacks_sysset')." ADD `total_money` decimal(10,2) DEFAULT '0.00';");
}
if(!pdo_fieldexists('amouse_exchange_redpacks_sysset',  'tplid')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_redpacks_sysset')." ADD `tplid` varchar(255) DEFAULT '0';");
}
if(!pdo_indexexists('amouse_exchange_redpacks_sysset',  'idx_uniacid')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_redpacks_sysset')." ADD KEY `idx_uniacid` (`uniacid`);");
}
if(!pdo_indexexists('amouse_exchange_redpacks_sysset',  'idx_createtime')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_redpacks_sysset')." ADD KEY `idx_createtime` (`createtime`);");
}
if(!pdo_fieldexists('amouse_exchange_slide',  'id')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_slide')." ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('amouse_exchange_slide',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_slide')." ADD `uniacid` int(11) NOT NULL;");
}
if(!pdo_fieldexists('amouse_exchange_slide',  'displayorder')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_slide')." ADD `displayorder` tinyint(5) unsigned NOT NULL DEFAULT '0' COMMENT '排序';");
}
if(!pdo_fieldexists('amouse_exchange_slide',  'link')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_slide')." ADD `link` varchar(200) NOT NULL COMMENT '链接';");
}
if(!pdo_fieldexists('amouse_exchange_slide',  'img')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_slide')." ADD `img` varchar(250) DEFAULT '' COMMENT '图标';");
}
if(!pdo_fieldexists('amouse_exchange_slide',  'status')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_slide')." ADD `status` tinyint(1) unsigned NOT NULL;");
}
if(!pdo_fieldexists('amouse_exchange_slide',  'createtime')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_slide')." ADD `createtime` int(10) unsigned NOT NULL DEFAULT '0';");
}
if(!pdo_indexexists('amouse_exchange_slide',  'weid')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_slide')." ADD KEY `weid` (`uniacid`);");
}
if(!pdo_indexexists('amouse_exchange_slide',  'status')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_slide')." ADD KEY `status` (`status`);");
}
if(!pdo_fieldexists('amouse_exchange_sysset',  'id')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_sysset')." ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('amouse_exchange_sysset',  'weid')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_sysset')." ADD `weid` int(11) DEFAULT '0';");
}
if(!pdo_fieldexists('amouse_exchange_sysset',  'acid')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_sysset')." ADD `acid` int(11) DEFAULT '0';");
}
if(!pdo_fieldexists('amouse_exchange_sysset',  'oauthid')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_sysset')." ADD `oauthid` int(11) DEFAULT '0';");
}
if(!pdo_fieldexists('amouse_exchange_sysset',  'start_time')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_sysset')." ADD `start_time` int(11) DEFAULT '0';");
}
if(!pdo_fieldexists('amouse_exchange_sysset',  'end_time')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_sysset')." ADD `end_time` int(11) DEFAULT '0';");
}
if(!pdo_fieldexists('amouse_exchange_sysset',  'gundong')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_sysset')." ADD `gundong` text;");
}
if(!pdo_fieldexists('amouse_exchange_sysset',  'iscash')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_sysset')." ADD `iscash` tinyint(2) DEFAULT '0';");
}
if(!pdo_fieldexists('amouse_exchange_sysset',  'sets')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_sysset')." ADD `sets` longtext;");
}
if(!pdo_indexexists('amouse_exchange_sysset',  'indx_weid')) {
	pdo_query("ALTER TABLE ".tablename('amouse_exchange_sysset')." ADD KEY `indx_weid` (`weid`);");
}

?>