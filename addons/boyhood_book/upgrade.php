<?php
$sql="CREATE TABLE IF NOT EXISTS `ims_boyhood_book_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weid` int(11) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_boyhood_book_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weid` int(11) DEFAULT NULL,
  `cate` int(11) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `thumb` varchar(200) DEFAULT NULL,
  `oprice` float(11,2) DEFAULT NULL COMMENT '原价',
  `nprice` float(11,2) DEFAULT NULL COMMENT '现价',
  `content` text COMMENT '属性',
  `displayorder` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_boyhood_book_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weid` int(11) DEFAULT NULL,
  `rid` int(11) DEFAULT NULL,
  `lid` int(11) DEFAULT NULL,
  `realname` varchar(100) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `visitetime` varchar(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `createtime` varchar(11) DEFAULT NULL,
  `openid` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_boyhood_book_rule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weid` int(11) DEFAULT NULL,
  `rid` int(11) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `thumb` varchar(200) DEFAULT NULL,
  `description` text,
  `starttime` varchar(11) DEFAULT NULL,
  `endtime` varchar(11) DEFAULT NULL,
  `sharetitle` varchar(200) DEFAULT NULL,
  `sharethumb` varchar(200) DEFAULT NULL,
  `sharedesc` text,
  `cate` int(11) DEFAULT NULL COMMENT '预约内容列表',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
";
pdo_run($sql);
if(!pdo_fieldexists('boyhood_book_cate',  'id')) {
	pdo_query("ALTER TABLE ".tablename('boyhood_book_cate')." ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('boyhood_book_cate',  'weid')) {
	pdo_query("ALTER TABLE ".tablename('boyhood_book_cate')." ADD `weid` int(11) DEFAULT NULL;");
}
if(!pdo_fieldexists('boyhood_book_cate',  'title')) {
	pdo_query("ALTER TABLE ".tablename('boyhood_book_cate')." ADD `title` varchar(100) DEFAULT NULL;");
}
if(!pdo_fieldexists('boyhood_book_list',  'id')) {
	pdo_query("ALTER TABLE ".tablename('boyhood_book_list')." ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('boyhood_book_list',  'weid')) {
	pdo_query("ALTER TABLE ".tablename('boyhood_book_list')." ADD `weid` int(11) DEFAULT NULL;");
}
if(!pdo_fieldexists('boyhood_book_list',  'cate')) {
	pdo_query("ALTER TABLE ".tablename('boyhood_book_list')." ADD `cate` int(11) DEFAULT NULL;");
}
if(!pdo_fieldexists('boyhood_book_list',  'title')) {
	pdo_query("ALTER TABLE ".tablename('boyhood_book_list')." ADD `title` varchar(50) DEFAULT NULL;");
}
if(!pdo_fieldexists('boyhood_book_list',  'thumb')) {
	pdo_query("ALTER TABLE ".tablename('boyhood_book_list')." ADD `thumb` varchar(200) DEFAULT NULL;");
}
if(!pdo_fieldexists('boyhood_book_list',  'oprice')) {
	pdo_query("ALTER TABLE ".tablename('boyhood_book_list')." ADD `oprice` float(11,2) DEFAULT NULL COMMENT '原价';");
}
if(!pdo_fieldexists('boyhood_book_list',  'nprice')) {
	pdo_query("ALTER TABLE ".tablename('boyhood_book_list')." ADD `nprice` float(11,2) DEFAULT NULL COMMENT '现价';");
}
if(!pdo_fieldexists('boyhood_book_list',  'content')) {
	pdo_query("ALTER TABLE ".tablename('boyhood_book_list')." ADD `content` text COMMENT '属性';");
}
if(!pdo_fieldexists('boyhood_book_list',  'displayorder')) {
	pdo_query("ALTER TABLE ".tablename('boyhood_book_list')." ADD `displayorder` int(11) DEFAULT NULL;");
}
if(!pdo_fieldexists('boyhood_book_record',  'id')) {
	pdo_query("ALTER TABLE ".tablename('boyhood_book_record')." ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('boyhood_book_record',  'weid')) {
	pdo_query("ALTER TABLE ".tablename('boyhood_book_record')." ADD `weid` int(11) DEFAULT NULL;");
}
if(!pdo_fieldexists('boyhood_book_record',  'rid')) {
	pdo_query("ALTER TABLE ".tablename('boyhood_book_record')." ADD `rid` int(11) DEFAULT NULL;");
}
if(!pdo_fieldexists('boyhood_book_record',  'lid')) {
	pdo_query("ALTER TABLE ".tablename('boyhood_book_record')." ADD `lid` int(11) DEFAULT NULL;");
}
if(!pdo_fieldexists('boyhood_book_record',  'realname')) {
	pdo_query("ALTER TABLE ".tablename('boyhood_book_record')." ADD `realname` varchar(100) DEFAULT NULL;");
}
if(!pdo_fieldexists('boyhood_book_record',  'mobile')) {
	pdo_query("ALTER TABLE ".tablename('boyhood_book_record')." ADD `mobile` varchar(15) DEFAULT NULL;");
}
if(!pdo_fieldexists('boyhood_book_record',  'visitetime')) {
	pdo_query("ALTER TABLE ".tablename('boyhood_book_record')." ADD `visitetime` varchar(11) DEFAULT NULL;");
}
if(!pdo_fieldexists('boyhood_book_record',  'status')) {
	pdo_query("ALTER TABLE ".tablename('boyhood_book_record')." ADD `status` tinyint(1) DEFAULT '0';");
}
if(!pdo_fieldexists('boyhood_book_record',  'createtime')) {
	pdo_query("ALTER TABLE ".tablename('boyhood_book_record')." ADD `createtime` varchar(11) DEFAULT NULL;");
}
if(!pdo_fieldexists('boyhood_book_record',  'openid')) {
	pdo_query("ALTER TABLE ".tablename('boyhood_book_record')." ADD `openid` varchar(64) NOT NULL;");
}
if(!pdo_fieldexists('boyhood_book_rule',  'id')) {
	pdo_query("ALTER TABLE ".tablename('boyhood_book_rule')." ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('boyhood_book_rule',  'weid')) {
	pdo_query("ALTER TABLE ".tablename('boyhood_book_rule')." ADD `weid` int(11) DEFAULT NULL;");
}
if(!pdo_fieldexists('boyhood_book_rule',  'rid')) {
	pdo_query("ALTER TABLE ".tablename('boyhood_book_rule')." ADD `rid` int(11) DEFAULT NULL;");
}
if(!pdo_fieldexists('boyhood_book_rule',  'title')) {
	pdo_query("ALTER TABLE ".tablename('boyhood_book_rule')." ADD `title` varchar(50) DEFAULT NULL;");
}
if(!pdo_fieldexists('boyhood_book_rule',  'thumb')) {
	pdo_query("ALTER TABLE ".tablename('boyhood_book_rule')." ADD `thumb` varchar(200) DEFAULT NULL;");
}
if(!pdo_fieldexists('boyhood_book_rule',  'description')) {
	pdo_query("ALTER TABLE ".tablename('boyhood_book_rule')." ADD `description` text;");
}
if(!pdo_fieldexists('boyhood_book_rule',  'starttime')) {
	pdo_query("ALTER TABLE ".tablename('boyhood_book_rule')." ADD `starttime` varchar(11) DEFAULT NULL;");
}
if(!pdo_fieldexists('boyhood_book_rule',  'endtime')) {
	pdo_query("ALTER TABLE ".tablename('boyhood_book_rule')." ADD `endtime` varchar(11) DEFAULT NULL;");
}
if(!pdo_fieldexists('boyhood_book_rule',  'sharetitle')) {
	pdo_query("ALTER TABLE ".tablename('boyhood_book_rule')." ADD `sharetitle` varchar(200) DEFAULT NULL;");
}
if(!pdo_fieldexists('boyhood_book_rule',  'sharethumb')) {
	pdo_query("ALTER TABLE ".tablename('boyhood_book_rule')." ADD `sharethumb` varchar(200) DEFAULT NULL;");
}
if(!pdo_fieldexists('boyhood_book_rule',  'sharedesc')) {
	pdo_query("ALTER TABLE ".tablename('boyhood_book_rule')." ADD `sharedesc` text;");
}
if(!pdo_fieldexists('boyhood_book_rule',  'cate')) {
	pdo_query("ALTER TABLE ".tablename('boyhood_book_rule')." ADD `cate` int(11) DEFAULT NULL COMMENT '预约内容列表';");
}

?>