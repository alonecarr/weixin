<?php
$sql="CREATE TABLE IF NOT EXISTS `ims_aki_yzmye` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL DEFAULT '1',
  `uniacid` int(10) unsigned NOT NULL DEFAULT '1',
  `rid` int(10) unsigned NOT NULL DEFAULT '1',
  `title` varchar(16) NOT NULL DEFAULT '1',
  `content` int(4) unsigned NOT NULL DEFAULT '1',
  `time` varchar(16) NOT NULL DEFAULT '1',
  `stime` varchar(16) NOT NULL DEFAULT '1',
  `etime` varchar(16) NOT NULL DEFAULT '1',
  `nick_name` varchar(32) DEFAULT '',
  `send_name` varchar(32) DEFAULT '',
  `min_value` int(8) unsigned NOT NULL DEFAULT '0',
  `max_value` int(8) unsigned NOT NULL DEFAULT '0',
  `total_num` int(4) unsigned NOT NULL DEFAULT '1',
  `wishing` varchar(128) DEFAULT '',
  `act_name` varchar(32) DEFAULT '',
  `remark` varchar(128) DEFAULT '',
  `logo_imgurl` varchar(128) DEFAULT '',
  `share_content` varchar(256) DEFAULT '',
  `share_url` varchar(128) DEFAULT '',
  `share_imgurl` varchar(128) DEFAULT '',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_aki_yzmye_code` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL DEFAULT '1',
  `uniacid` int(10) unsigned NOT NULL DEFAULT '0',
  `code` varchar(64) NOT NULL DEFAULT '',
  `openid` varchar(64) NOT NULL DEFAULT '',
  `yzmyeid` int(4) unsigned NOT NULL DEFAULT '0',
  `yue` decimal(10,2) DEFAULT '0.00',
  `piciid` int(4) unsigned NOT NULL DEFAULT '0',
  `type` char(1) DEFAULT '',
  `time` varchar(16) NOT NULL DEFAULT '',
  `status` char(1) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_aki_yzmye_codenum` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL DEFAULT '1',
  `uniacid` int(10) unsigned NOT NULL DEFAULT '1',
  `hbid` int(4) unsigned NOT NULL DEFAULT '1',
  `count` int(10) unsigned NOT NULL DEFAULT '1',
  `yue` decimal(10,2) DEFAULT '0.00',
  `type` char(1) DEFAULT '',
  `usedcount` int(10) unsigned NOT NULL DEFAULT '0',
  `time` varchar(16) NOT NULL DEFAULT '1',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_aki_yzmye_sendlist` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL DEFAULT '1',
  `uniacid` int(10) unsigned NOT NULL DEFAULT '1',
  `piciid` int(10) DEFAULT '0',
  `codeid` int(10) DEFAULT '0',
  `openid` varchar(64) DEFAULT '',
  `yzmyeid` varchar(32) DEFAULT '',
  `yue` decimal(10,2) DEFAULT '0.00',
  `status` varchar(20) DEFAULT '',
  `time` varchar(20) DEFAULT '1',
  `mark` varchar(128) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_aki_yzmye_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL DEFAULT '1',
  `uniacid` int(10) unsigned NOT NULL DEFAULT '1',
  `openid` varchar(64) DEFAULT '',
  `nickname` varchar(64) DEFAULT '',
  `headimgurl` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
";
pdo_run($sql);
if(!pdo_fieldexists('aki_yzmye',  'id')) {
	pdo_query("ALTER TABLE ".tablename('aki_yzmye')." ADD `id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('aki_yzmye',  'uid')) {
	pdo_query("ALTER TABLE ".tablename('aki_yzmye')." ADD `uid` int(10) unsigned NOT NULL DEFAULT '1';");
}
if(!pdo_fieldexists('aki_yzmye',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('aki_yzmye')." ADD `uniacid` int(10) unsigned NOT NULL DEFAULT '1';");
}
if(!pdo_fieldexists('aki_yzmye',  'rid')) {
	pdo_query("ALTER TABLE ".tablename('aki_yzmye')." ADD `rid` int(10) unsigned NOT NULL DEFAULT '1';");
}
if(!pdo_fieldexists('aki_yzmye',  'title')) {
	pdo_query("ALTER TABLE ".tablename('aki_yzmye')." ADD `title` varchar(16) NOT NULL DEFAULT '1';");
}
if(!pdo_fieldexists('aki_yzmye',  'content')) {
	pdo_query("ALTER TABLE ".tablename('aki_yzmye')." ADD `content` int(4) unsigned NOT NULL DEFAULT '1';");
}
if(!pdo_fieldexists('aki_yzmye',  'time')) {
	pdo_query("ALTER TABLE ".tablename('aki_yzmye')." ADD `time` varchar(16) NOT NULL DEFAULT '1';");
}
if(!pdo_fieldexists('aki_yzmye',  'stime')) {
	pdo_query("ALTER TABLE ".tablename('aki_yzmye')." ADD `stime` varchar(16) NOT NULL DEFAULT '1';");
}
if(!pdo_fieldexists('aki_yzmye',  'etime')) {
	pdo_query("ALTER TABLE ".tablename('aki_yzmye')." ADD `etime` varchar(16) NOT NULL DEFAULT '1';");
}
if(!pdo_fieldexists('aki_yzmye',  'nick_name')) {
	pdo_query("ALTER TABLE ".tablename('aki_yzmye')." ADD `nick_name` varchar(32) DEFAULT '';");
}
if(!pdo_fieldexists('aki_yzmye',  'send_name')) {
	pdo_query("ALTER TABLE ".tablename('aki_yzmye')." ADD `send_name` varchar(32) DEFAULT '';");
}
if(!pdo_fieldexists('aki_yzmye',  'min_value')) {
	pdo_query("ALTER TABLE ".tablename('aki_yzmye')." ADD `min_value` int(8) unsigned NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists('aki_yzmye',  'max_value')) {
	pdo_query("ALTER TABLE ".tablename('aki_yzmye')." ADD `max_value` int(8) unsigned NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists('aki_yzmye',  'total_num')) {
	pdo_query("ALTER TABLE ".tablename('aki_yzmye')." ADD `total_num` int(4) unsigned NOT NULL DEFAULT '1';");
}
if(!pdo_fieldexists('aki_yzmye',  'wishing')) {
	pdo_query("ALTER TABLE ".tablename('aki_yzmye')." ADD `wishing` varchar(128) DEFAULT '';");
}
if(!pdo_fieldexists('aki_yzmye',  'act_name')) {
	pdo_query("ALTER TABLE ".tablename('aki_yzmye')." ADD `act_name` varchar(32) DEFAULT '';");
}
if(!pdo_fieldexists('aki_yzmye',  'remark')) {
	pdo_query("ALTER TABLE ".tablename('aki_yzmye')." ADD `remark` varchar(128) DEFAULT '';");
}
if(!pdo_fieldexists('aki_yzmye',  'logo_imgurl')) {
	pdo_query("ALTER TABLE ".tablename('aki_yzmye')." ADD `logo_imgurl` varchar(128) DEFAULT '';");
}
if(!pdo_fieldexists('aki_yzmye',  'share_content')) {
	pdo_query("ALTER TABLE ".tablename('aki_yzmye')." ADD `share_content` varchar(256) DEFAULT '';");
}
if(!pdo_fieldexists('aki_yzmye',  'share_url')) {
	pdo_query("ALTER TABLE ".tablename('aki_yzmye')." ADD `share_url` varchar(128) DEFAULT '';");
}
if(!pdo_fieldexists('aki_yzmye',  'share_imgurl')) {
	pdo_query("ALTER TABLE ".tablename('aki_yzmye')." ADD `share_imgurl` varchar(128) DEFAULT '';");
}
if(!pdo_fieldexists('aki_yzmye',  'status')) {
	pdo_query("ALTER TABLE ".tablename('aki_yzmye')." ADD `status` tinyint(4) NOT NULL DEFAULT '1';");
}
if(!pdo_fieldexists('aki_yzmye_code',  'id')) {
	pdo_query("ALTER TABLE ".tablename('aki_yzmye_code')." ADD `id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('aki_yzmye_code',  'uid')) {
	pdo_query("ALTER TABLE ".tablename('aki_yzmye_code')." ADD `uid` int(10) unsigned NOT NULL DEFAULT '1';");
}
if(!pdo_fieldexists('aki_yzmye_code',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('aki_yzmye_code')." ADD `uniacid` int(10) unsigned NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists('aki_yzmye_code',  'code')) {
	pdo_query("ALTER TABLE ".tablename('aki_yzmye_code')." ADD `code` varchar(64) NOT NULL DEFAULT '';");
}
if(!pdo_fieldexists('aki_yzmye_code',  'openid')) {
	pdo_query("ALTER TABLE ".tablename('aki_yzmye_code')." ADD `openid` varchar(64) NOT NULL DEFAULT '';");
}
if(!pdo_fieldexists('aki_yzmye_code',  'yzmyeid')) {
	pdo_query("ALTER TABLE ".tablename('aki_yzmye_code')." ADD `yzmyeid` int(4) unsigned NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists('aki_yzmye_code',  'yue')) {
	pdo_query("ALTER TABLE ".tablename('aki_yzmye_code')." ADD `yue` decimal(10,2) DEFAULT '0.00';");
}
if(!pdo_fieldexists('aki_yzmye_code',  'piciid')) {
	pdo_query("ALTER TABLE ".tablename('aki_yzmye_code')." ADD `piciid` int(4) unsigned NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists('aki_yzmye_code',  'type')) {
	pdo_query("ALTER TABLE ".tablename('aki_yzmye_code')." ADD `type` char(1) DEFAULT '';");
}
if(!pdo_fieldexists('aki_yzmye_code',  'time')) {
	pdo_query("ALTER TABLE ".tablename('aki_yzmye_code')." ADD `time` varchar(16) NOT NULL DEFAULT '';");
}
if(!pdo_fieldexists('aki_yzmye_code',  'status')) {
	pdo_query("ALTER TABLE ".tablename('aki_yzmye_code')." ADD `status` char(1) DEFAULT '';");
}
if(!pdo_indexexists('aki_yzmye_code',  'code')) {
	pdo_query("ALTER TABLE ".tablename('aki_yzmye_code')." ADD UNIQUE KEY `code` (`code`);");
}
if(!pdo_fieldexists('aki_yzmye_codenum',  'id')) {
	pdo_query("ALTER TABLE ".tablename('aki_yzmye_codenum')." ADD `id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('aki_yzmye_codenum',  'uid')) {
	pdo_query("ALTER TABLE ".tablename('aki_yzmye_codenum')." ADD `uid` int(10) unsigned NOT NULL DEFAULT '1';");
}
if(!pdo_fieldexists('aki_yzmye_codenum',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('aki_yzmye_codenum')." ADD `uniacid` int(10) unsigned NOT NULL DEFAULT '1';");
}
if(!pdo_fieldexists('aki_yzmye_codenum',  'hbid')) {
	pdo_query("ALTER TABLE ".tablename('aki_yzmye_codenum')." ADD `hbid` int(4) unsigned NOT NULL DEFAULT '1';");
}
if(!pdo_fieldexists('aki_yzmye_codenum',  'count')) {
	pdo_query("ALTER TABLE ".tablename('aki_yzmye_codenum')." ADD `count` int(10) unsigned NOT NULL DEFAULT '1';");
}
if(!pdo_fieldexists('aki_yzmye_codenum',  'yue')) {
	pdo_query("ALTER TABLE ".tablename('aki_yzmye_codenum')." ADD `yue` decimal(10,2) DEFAULT '0.00';");
}
if(!pdo_fieldexists('aki_yzmye_codenum',  'type')) {
	pdo_query("ALTER TABLE ".tablename('aki_yzmye_codenum')." ADD `type` char(1) DEFAULT '';");
}
if(!pdo_fieldexists('aki_yzmye_codenum',  'usedcount')) {
	pdo_query("ALTER TABLE ".tablename('aki_yzmye_codenum')." ADD `usedcount` int(10) unsigned NOT NULL DEFAULT '0';");
}
if(!pdo_fieldexists('aki_yzmye_codenum',  'time')) {
	pdo_query("ALTER TABLE ".tablename('aki_yzmye_codenum')." ADD `time` varchar(16) NOT NULL DEFAULT '1';");
}
if(!pdo_fieldexists('aki_yzmye_codenum',  'status')) {
	pdo_query("ALTER TABLE ".tablename('aki_yzmye_codenum')." ADD `status` tinyint(4) NOT NULL DEFAULT '1';");
}
if(!pdo_fieldexists('aki_yzmye_sendlist',  'id')) {
	pdo_query("ALTER TABLE ".tablename('aki_yzmye_sendlist')." ADD `id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('aki_yzmye_sendlist',  'uid')) {
	pdo_query("ALTER TABLE ".tablename('aki_yzmye_sendlist')." ADD `uid` int(10) unsigned NOT NULL DEFAULT '1';");
}
if(!pdo_fieldexists('aki_yzmye_sendlist',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('aki_yzmye_sendlist')." ADD `uniacid` int(10) unsigned NOT NULL DEFAULT '1';");
}
if(!pdo_fieldexists('aki_yzmye_sendlist',  'piciid')) {
	pdo_query("ALTER TABLE ".tablename('aki_yzmye_sendlist')." ADD `piciid` int(10) DEFAULT '0';");
}
if(!pdo_fieldexists('aki_yzmye_sendlist',  'codeid')) {
	pdo_query("ALTER TABLE ".tablename('aki_yzmye_sendlist')." ADD `codeid` int(10) DEFAULT '0';");
}
if(!pdo_fieldexists('aki_yzmye_sendlist',  'openid')) {
	pdo_query("ALTER TABLE ".tablename('aki_yzmye_sendlist')." ADD `openid` varchar(64) DEFAULT '';");
}
if(!pdo_fieldexists('aki_yzmye_sendlist',  'yzmyeid')) {
	pdo_query("ALTER TABLE ".tablename('aki_yzmye_sendlist')." ADD `yzmyeid` varchar(32) DEFAULT '';");
}
if(!pdo_fieldexists('aki_yzmye_sendlist',  'yue')) {
	pdo_query("ALTER TABLE ".tablename('aki_yzmye_sendlist')." ADD `yue` decimal(10,2) DEFAULT '0.00';");
}
if(!pdo_fieldexists('aki_yzmye_sendlist',  'status')) {
	pdo_query("ALTER TABLE ".tablename('aki_yzmye_sendlist')." ADD `status` varchar(20) DEFAULT '';");
}
if(!pdo_fieldexists('aki_yzmye_sendlist',  'time')) {
	pdo_query("ALTER TABLE ".tablename('aki_yzmye_sendlist')." ADD `time` varchar(20) DEFAULT '1';");
}
if(!pdo_fieldexists('aki_yzmye_sendlist',  'mark')) {
	pdo_query("ALTER TABLE ".tablename('aki_yzmye_sendlist')." ADD `mark` varchar(128) DEFAULT '';");
}
if(!pdo_fieldexists('aki_yzmye_user',  'id')) {
	pdo_query("ALTER TABLE ".tablename('aki_yzmye_user')." ADD `id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('aki_yzmye_user',  'uid')) {
	pdo_query("ALTER TABLE ".tablename('aki_yzmye_user')." ADD `uid` int(10) unsigned NOT NULL DEFAULT '1';");
}
if(!pdo_fieldexists('aki_yzmye_user',  'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('aki_yzmye_user')." ADD `uniacid` int(10) unsigned NOT NULL DEFAULT '1';");
}
if(!pdo_fieldexists('aki_yzmye_user',  'openid')) {
	pdo_query("ALTER TABLE ".tablename('aki_yzmye_user')." ADD `openid` varchar(64) DEFAULT '';");
}
if(!pdo_fieldexists('aki_yzmye_user',  'nickname')) {
	pdo_query("ALTER TABLE ".tablename('aki_yzmye_user')." ADD `nickname` varchar(64) DEFAULT '';");
}
if(!pdo_fieldexists('aki_yzmye_user',  'headimgurl')) {
	pdo_query("ALTER TABLE ".tablename('aki_yzmye_user')." ADD `headimgurl` varchar(255) DEFAULT '';");
}

?>