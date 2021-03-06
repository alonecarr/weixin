<?php
/**
 * [WEIZAN System] Copyright (c) 2014 WEIZANCMS.COM
 
 */
defined('IN_IA') or exit('Access Denied');
$dos = array('display', 'post');
$do = in_array($do, $dos) ? $do : 'display';
if ($do == 'display') {
	$pindex = max(1, $_GPC['page']);
	$psize = 15;
	$start = ($pindex - 1) * $psize;
	$tsql = "SELECT COUNT(*) FROM ". tablename('account'). " WHERE isdeleted = 1 GROUP BY uniacid" ;
	$total = pdo_fetchALL($tsql, array());
	$total = count($total);
	if($_W['isfounder']){
		$sql = "SELECT * FROM ". tablename('account')." WHERE isdeleted = 1 GROUP BY uniacid LIMIT $start, $psize";
	}else{
		$sql = "SELECT * FROM ". tablename('account')." WHERE isdeleted = 1 and uniacid in (select uniacid from ".tablename('uni_account_users')." where uid=".$_W['uid']." and role='owner') GROUP BY uniacid LIMIT $start, $psize";
	}
	$uni_accounts = pdo_fetchall($sql, array());
	$del_accounts = array();
	foreach ($uni_accounts as $account) {
		$uni_info = pdo_get('uni_account', array('uniacid' => $account['uniacid']));
		$del_accounts[$account['uniacid']] = $uni_info;
		$sql = "SELECT * FROM ". tablename('account'). " as a LEFT JOIN ". tablename('account_wechats'). " as w ON a.acid = w.acid WHERE a.isdeleted = '1' AND a.uniacid = :uniacid";
		$del_accounts[$account['uniacid']]['del_accounts'] = pdo_fetchall($sql, array(':uniacid' => $account['uniacid']), 'acid');
		$del_accounts[$account['uniacid']]['is_uniacid'] = in_array($uni_info['default_acid'], array_keys($del_accounts[$account['uniacid']]['del_accounts'])) ? 1 : 0;
	}
	$pager = pagination($total, $pindex, $psize);
}
if ($do == 'post') {
	load()->model('account');
	$acid = intval($_GPC['acid']);
	$uniacid = intval($_GPC['uniacid']);
	$op = trim($_GPC['op']);
	if ($op == 'recover') {
		if (!empty($uniacid)) {
			$uid = pdo_getcolumn('uni_account_users', array('uniacid' => $uniacid, 'role' => 'owner'), 'uid');
			if (!empty($uid)) {
				$user = pdo_get('users', array('uid' => $uid));
				$group = pdo_fetch('SELECT * FROM ' . tablename('users_group') . ' WHERE id = :id', array(':id' => $user['groupid']));
				$uniacid_num = pdo_fetchcolumn('SELECT COUNT(*) FROM (SELECT u.uniacid, a.default_acid FROM ' . tablename('uni_account_users') . ' as u RIGHT JOIN '. tablename('uni_account').' as a  ON a.uniacid = u.uniacid  WHERE u.uid = :uid AND u.role = :role ) AS c LEFT JOIN '.tablename('account').' as d ON c.default_acid = d.acid WHERE d.isdeleted = 0', array(':uid' => $uid, ':role' => 'owner'));
				if (($uniacid_num+1) > $group['maxaccount']) {
					pdo_delete('uni_account_users', array('uniacid' => $uniacid, 'role' => 'owner', 'uid' => $uid));
					pdo_update('account', array('isdeleted' => 0), array('uniacid' => $uniacid));
					message('超过公众号创始人所能创建公众号的数量，此公众号归主管理员所有', referer());
				}
			}
			pdo_update('account', array('isdeleted' => 0), array('uniacid' => $uniacid));
		} else {
			pdo_update('account', array('isdeleted' => 0), array('acid' => $acid));
		}
		message('公众号恢复成功', referer(), 'success');
	}elseif ($op == 'delete') {
		if (!empty($acid)) {
			account_delete($acid);
		}
		message('删除公众号成功！', url('account/recycle/display'), 'success');
	}
}
template('account/recycle');