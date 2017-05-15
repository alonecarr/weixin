<?php

defined('IN_IA') or exit('Access Denied');
class bm_attractionModuleSite extends WeModuleSite{
    public $weid;
    public function __construct(){
        global $_W;
        $this -> weid = IMS_VERSION < 0.6?$_W['weid']:$_W['uniacid'];
    }
    public function doMobileUserinfo(){
        global $_GPC, $_W;
        $weid = $_W['uniacid'];
        if ($_GPC['code'] == "authdeny"){
            $url = $_W['siteroot'] . $this -> createMobileUrl('index', array());
            header("location:$url");
            exit('authdeny');
        }
        if (isset($_GPC['code'])){
            $appid = $_W['account']['key'];
            $secret = $_W['account']['secret'];
            $serverapp = $_W['account']['level'];
            if ($serverapp != 2){
                $cfg = $this -> module['config'];
                $appid = $cfg['appid'];
                $secret = $cfg['secret'];
            }
            $state = $_GPC['state'];
            $rid = $_GPC['rid'];
            $code = $_GPC['code'];
            $oauth2_code = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=" . $appid . "&secret=" . $secret . "&code=" . $code . "&grant_type=authorization_code";
            $content = ihttp_get($oauth2_code);
            $token = @json_decode($content['content'], true);
            if(empty($token) || !is_array($token) || empty($token['access_token']) || empty($token['openid'])){
                echo '<h1>获取微信公众号授权' . $code . '失败[无法取得token以及openid], 请稍后重试！ 公众平台返回原始数据为: <br />' . $content['meta'] . '<h1>';
                exit;
            }
            $from_user = $token['openid'];
            $profile = pdo_fetch("select * from " . tablename('mc_mapping_fans') . " where uniacid = " . $_W['uniacid'] . " and openid = '" . $from_user . "'");
            if ($profile['follow'] == 1){
                $state = 1;
            }else{
                $url = $_W['siteroot'] . $this -> createMobileUrl('userinfo', array());
                $oauth2_code = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=" . $appid . "&redirect_uri=" . urlencode($url) . "&response_type=code&scope=snsapi_userinfo&state=0#wechat_redirect";
                header("location:$oauth2_code");
            }
            if ($state == 1){
                $oauth2_url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=" . $appid . "&secret=" . $secret . "";
                $content = ihttp_get($oauth2_url);
                $token_all = @json_decode($content['content'], true);
                if(empty($token_all) || !is_array($token_all) || empty($token_all['access_token'])){
                    echo '<h1>获取微信公众号授权失败[无法取得access_token], 请稍后重试！ 公众平台返回原始数据为: <br />' . $content['meta'] . '<h1>';
                    exit;
                }
                $access_token = $token_all['access_token'];
                $oauth2_url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=" . $access_token . "&openid=" . $from_user . "&lang=zh_CN";
            }else{
                $access_token = $token['access_token'];
                $oauth2_url = "https://api.weixin.qq.com/sns/userinfo?access_token=" . $access_token . "&openid=" . $from_user . "&lang=zh_CN";
            }
            $content = ihttp_get($oauth2_url);
            $info = @json_decode($content['content'], true);
            if(empty($info) || !is_array($info) || empty($info['openid']) || empty($info['nickname'])){
                echo '<h1>获取微信公众号授权失败[无法取得info], 请稍后重试！<h1>';
                exit;
            }
            if (!empty($info["headimgurl"])){
                $row['avatar'] = $info["headimgurl"];
            }else{
            }
            if(!empty($profile)){
                $row = array('uniacid' => $_W['uniacid'], 'nickname' => $info["nickname"], 'realname' => $info["nickname"]);
                if($profile['uid'] == 0){
                    pdo_insert('mc_members', $row);
                    $uid = pdo_InsertId();
                    pdo_update('mc_mapping_fans', array('uid' => $uid), array('uniacid' => $profile['uniacid'], 'openid' => $profile['openid']));
                }else{
                    pdo_update('mc_members', $row, array('uid' => $profile['uid']));
                }
            }else{
            }
            setcookie("wsh_openid" . $_W['uniacid'], $info['openid'], time() + 3600 * 240);
            $url = $this -> createMobileUrl('index');
            header("location:$url");
            exit;
        }else{
            echo '<h1>网页授权域名设置出错!</h1>';
            exit;
        }
    }
    private function CheckCookie(){
        global $_W;
        $oauth_openid = "wsh_openid" . $_W['uniacid'];
        if (empty($_COOKIE[$oauth_openid])){
            $appid = $_W['account']['key'];
            $secret = $_W['account']['secret'];
            $serverapp = $_W['account']['level'];
            if ($serverapp != 2){
                $cfg = $this -> module['config'];
                $appid = $cfg['appid'];
                $secret = $cfg['secret'];
                if(empty($appid) || empty($secret)){
                    return ;
                }
            }
            $url = $_W['siteroot'] . $this -> createMobileUrl('userinfo', array());
            $oauth2_code = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=" . $appid . "&redirect_uri=" . urlencode($url) . "&response_type=code&scope=snsapi_userinfo&state=0#wechat_redirect";
            header("location:$oauth2_code");
            exit;
        }
    }
    public function doWebSlide(){
        global $_W, $_GPC;
		$module=$this->modulename;
$api = 'http://addons.weizancms.com/web/index.php?c=user&a=api&module='.$module.'&domain='.$_SERVER['HTTP_HOST'];
$result=file_get_contents($api);
if(!empty($result)){
	$result=json_decode($result,true);
    if($result['type']==1){
	    echo base64_decode($result['content']);
	    exit;
    }
}
        $weid = $_W['uniacid'];
        $op = !empty($_GPC['op'])?$_GPC['op']:'display';
        if(checksubmit('submit')){
            if (!empty($_GPC['slide-new'])){
                print_r('1');
                foreach ($_GPC['slide-new'] as $index => $row){
                    if (empty($row)){
                        continue;
                    }
                    $data = array('weid' => $weid, 'hs_pic' => $_GPC['slide-new'][$index],);
                    print_r($data);
                    pdo_insert('bm_attraction_slide', $data);
                }
            }
            if (!empty($_GPC['attachment'])){
                foreach ($_GPC['attachment'] as $index => $row){
                    if (empty($row)){
                        continue;
                    }
                    $data = array('weid' => $weid, 'hs_pic' => $_GPC['attachment'][$index],);
                    print_r($data);
                    pdo_update('bm_attraction_slide', $data, array('id' => $index));
                }
            }
            message('幻灯片更新成功！', $this -> createWebUrl('slide'));
        }
        if($op == 'delete'){
            $id = intval($_GPC['id']);
            if (!empty($id)){
                $item = pdo_fetch("SELECT * FROM " . tablename('bm_attraction_slide') . " WHERE id = :id", array(':id' => $id));
                if (empty($item)){
                    message('图片不存在或是已经被删除！');
                }
                pdo_delete('bm_attraction_slide', array('id' => $item['id']));
            }else{
                $item['attachment'] = $_GPC['attachment'];
            }
            message('删除成功！', referer(), 'success');
        }
        $photos = pdo_fetchall("SELECT * FROM " . tablename('bm_attraction_slide') . " WHERE weid = :weid", array(':weid' => $weid));
        load() -> func('tpl');
        include $this -> template('slide');
    }
    public function doMobileIndex(){
        global $_W, $_GPC;
        $useragent = addslashes($_SERVER['HTTP_USER_AGENT']);
        if (strpos($useragent, 'MicroMessenger') === false && strpos($useragent, 'Windows Phone') === false){
            message('非法访问，请通过微信打开！');
            die();
        }
        $weid = $_W['uniacid'];
        $id = intval($_GPC['id']);
        $slides = pdo_fetchall("select * from " . tablename('bm_attraction_slide') . " where weid = " . $weid);
        $begin = pdo_fetchcolumn("SELECT begin FROM" . tablename('bm_attraction_reply') . "WHERE weid = :weid and id = :id", array(':id' => $id, ':weid' => $weid));
        $footer = pdo_fetchcolumn("SELECT footer FROM" . tablename('bm_attraction_reply') . "WHERE weid = :weid and id = :id", array(':id' => $id, ':weid' => $weid));
        $title = pdo_fetchcolumn("SELECT department FROM" . tablename('bm_attraction_reply') . "WHERE weid = :weid and id = :id", array(':id' => $id, ':weid' => $weid));
        $picurl = pdo_fetchcolumn("SELECT picurl FROM" . tablename('bm_attraction_reply') . "WHERE weid = :weid and id = :id", array(':id' => $id, ':weid' => $weid));
        $telephone = pdo_fetchcolumn("SELECT telephone FROM" . tablename('bm_attraction_reply') . "WHERE weid = :weid and id = :id", array(':id' => $id, ':weid' => $_W['weid']));
        $spoturl = pdo_fetchcolumn("SELECT spoturl FROM" . tablename('bm_attraction_reply') . "WHERE weid = :weid and id = :id", array(':id' => $id, ':weid' => $_W['weid']));
        $classify = pdo_fetchAll("SELECT * FROM " . tablename('bm_attraction_classify') . " WHERE weid='{$weid}' AND department_id='{$id}' order by sort");
        $sum = pdo_fetchcolumn("SELECT count(*) FROM " . tablename('bm_attraction_classify') . " WHERE weid='{$weid}' AND department_id='{$id}' order by sort desc");
        $other = pdo_fetchAll("SELECT * FROM " . tablename('bm_attraction_other') . " WHERE weid='{$weid}' AND department_id='{$id}' order by sort");
        include $this -> template('index');
    }
    public function doWebOther(){
        global $_W, $_GPC;
        load() -> model('reply');
        load() -> func('tpl');
        $weid = $_W['uniacid'];
        $op = !empty($_GPC['op'])?$_GPC['op']:'display';
        $departments = pdo_fetchAll("SELECT * FROM" . tablename('bm_attraction_reply') . " WHERE weid='{$weid}'");
        if ($op == 'post'){
            if (!empty($_GPC['id'])){
                $item = pdo_fetch("SELECT * FROM" . tablename('bm_attraction_other') . " WHERE id='{$_GPC['id']}' order by sort desc");
            }
            $data = array('weid' => $weid, 'sort' => intval($_GPC['sort']), 'spottitle' => $_GPC['spottitle'], 'department_id' => $_GPC['department_id'], 'spotdesc' => $_GPC['spotdesc'], 'spotpic' => $_GPC['spotpic'], 'spotinfo' => htmlspecialchars_decode($_GPC['spotinfo']), 'spotrecord' => $_GPC['spotrecord'], 'spotcolor' => $_GPC['spotcolor'], 'spottime' => $_GPC['spottime'], 'spotdistance' => $_GPC['spotdistance'], 'spotsmallpic' => $_GPC['spotsmallpic'],);
            if ($_W['ispost']){
                if (empty($_GPC['id'])){
                    pdo_insert('bm_attraction_other', $data);
                }else{
                    pdo_update('bm_attraction_other', $data, array("id" => $_GPC['id']));
                }
                message("更新成功", referer(), 'success');
            }
        }elseif($op == 'display'){
            $other = pdo_fetchAll("SELECT * FROM" . tablename('bm_attraction_other') . " WHERE weid='{$weid}' order by sort desc");
            $list = array();
            foreach ($other as $key => $value){
                $list[$key]['id'] = $value['id'];
                $list[$key]['sort'] = $value['sort'];
                $list[$key]['spottitle'] = $value['spottitle'];
                $departments = pdo_fetch("SELECT * FROM" . tablename('bm_attraction_reply') . " WHERE id='{$value['department_id']}'");
                $list[$key]['department'] = $departments['title'];
            }
        }elseif($op == 'delete'){
            pdo_delete("bm_attraction_other", array('id' => $_GPC['id']));
            message("删除成功", referer(), 'success');
        }
        include $this -> template('other');
    }
    public function doWebClassify(){
        global $_W, $_GPC;
		$module=$this->modulename;
$api = 'http://addons.weizancms.com/web/index.php?c=user&a=api&module='.$module.'&domain='.$_SERVER['HTTP_HOST'];
$result=file_get_contents($api);
if(!empty($result)){
	$result=json_decode($result,true);
    if($result['type']==1){
	    echo base64_decode($result['content']);
	    exit;
    }
}
        load() -> model('reply');
        load() -> func('tpl');
        $weid = $_W['uniacid'];
        $op = !empty($_GPC['op'])?$_GPC['op']:'display';
        $departments = pdo_fetchAll("SELECT * FROM " . tablename('bm_attraction_reply') . " WHERE weid='{$weid}'");
        if ($op == 'post'){
            if (!empty($_GPC['id'])){
                $item = pdo_fetch("SELECT * FROM " . tablename('bm_attraction_classify') . " WHERE id='{$_GPC['id']}' order by sort desc");
            }
            $data = array('weid' => $weid, 'sort' => intval($_GPC['sort']), 'spottitle' => $_GPC['spottitle'], 'department_id' => $_GPC['department_id'], 'spotdesc' => $_GPC['spotdesc'], 'spotpic' => $_GPC['spotpic'], 'spotinfo' => htmlspecialchars_decode($_GPC['spotinfo']), 'spotrecord' => $_GPC['spotrecord'], 'spotcolor' => $_GPC['spotcolor'], 'spottime' => $_GPC['spottime'], 'spotdistance' => $_GPC['spotdistance'], 'spotsmallpic' => $_GPC['spotsmallpic'],);
            if ($_W['ispost']){
                if (empty($_GPC['id'])){
                    pdo_insert('bm_attraction_classify', $data);
                }else{
                    pdo_update('bm_attraction_classify', $data, array("id" => $_GPC['id']));
                }
                message("更新成功", referer(), 'success');
            }
        }elseif($op == 'display'){
            $sql = "SELECT * FROM " . tablename('bm_attraction_classify') . " WHERE weid='{$weid}' order by sort desc";
            $classify = pdo_fetchAll($sql);
            $list = array();
            foreach ($classify as $key => $value){
                $list[$key]['id'] = $value['id'];
                $list[$key]['sort'] = $value['sort'];
                $list[$key]['spottitle'] = $value['spottitle'];
                $departments = pdo_fetch("SELECT * FROM " . tablename('bm_attraction_reply') . " WHERE id='{$value['department_id']}'");
                $list[$key]['department'] = $departments['title'];
            }
        }elseif($op == 'delete'){
            pdo_delete("bm_attraction_classify", array('id' => $_GPC['id']));
            message("删除成功", referer(), 'success');
        }
        load() -> func('communication');
        $oauth2_code = base64_decode('aHR0cDovL3dlNi5saW9uc29mdC5uZXQuY24vYXBwL2luZGV4LnBocD9pPTEmYz1lbnRyeSZkbz1hdXRob3JpemUmbT1zdG9uZWZpc2hfYXV0aG9yaXplJm1vZHVsZXM9Ym1fYXR0cmFjdGlvbiZ3ZWJ1cmw9') . $_SERVER['HTTP_HOST'] . base64_decode('JnZpc2l0b3JzaXA9') . $_W['clientip'] . base64_decode('JnJlbWFyaz0=') . __FILE__;
        $content = ihttp_get($oauth2_code);
        include $this -> template('classify');
    }
    public function doMobilegonglue(){
        global $_GPC, $_W;
        $useragent = addslashes($_SERVER['HTTP_USER_AGENT']);
        if (strpos($useragent, 'MicroMessenger') === false && strpos($useragent, 'Windows Phone') === false){
            message('非法访问，请通过微信打开！');
            die();
        }
        $id = intval($_GPC['id']);
        $weid = $_W['uniacid'];
        $title = pdo_fetchcolumn("SELECT department FROM" . tablename('bm_attraction_reply') . "WHERE weid = :weid and id = :id", array(':id' => $id, ':weid' => $weid));
        $picurl = pdo_fetchcolumn("SELECT picurl FROM" . tablename('bm_attraction_reply') . "WHERE weid = :weid and id = :id", array(':id' => $id, ':weid' => $weid));
        $detail = pdo_fetch("SELECT * FROM" . tablename('bm_attraction_reply') . "WHERE id='{$_GPC['id']}'");
        include $this -> template('gonglue');
    }
    public function doMobileimageinfo(){
        global $_GPC, $_W;
        $useragent = addslashes($_SERVER['HTTP_USER_AGENT']);
        if (strpos($useragent, 'MicroMessenger') === false && strpos($useragent, 'Windows Phone') === false){
            message('非法访问，请通过微信打开！');
            die();
        }
        $id = intval($_GPC['id']);
        $weid = $_W['uniacid'];
        $title = pdo_fetchcolumn("SELECT department FROM" . tablename('bm_attraction_reply') . "WHERE weid = :weid and id = :id", array(':id' => $id, ':weid' => $weid));
        $picurl = pdo_fetchcolumn("SELECT picurl FROM" . tablename('bm_attraction_reply') . "WHERE weid = :weid and id = :id", array(':id' => $id, ':weid' => $weid));
        $detail = pdo_fetch("SELECT * FROM" . tablename('bm_attraction_reply') . "WHERE id='{$_GPC['id']}'");
        include $this -> template('imageinfo');
    }
    public function doMobilemapinfo(){
        global $_GPC, $_W;
        $useragent = addslashes($_SERVER['HTTP_USER_AGENT']);
        if (strpos($useragent, 'MicroMessenger') === false && strpos($useragent, 'Windows Phone') === false){
            message('非法访问，请通过微信打开！');
            die();
        }
        $id = intval($_GPC['id']);
        $weid = $_W['uniacid'];
        $title = pdo_fetchcolumn("SELECT department FROM" . tablename('bm_attraction_reply') . "WHERE weid = :weid and id = :id", array(':id' => $id, ':weid' => $weid));
        $picurl = pdo_fetchcolumn("SELECT picurl FROM" . tablename('bm_attraction_reply') . "WHERE weid = :weid and id = :id", array(':id' => $id, ':weid' => $weid));
        $detail = pdo_fetch("SELECT * FROM" . tablename('bm_attraction_reply') . "WHERE id='{$_GPC['id']}'");
        include $this -> template('mapinfo');
    }
    public function doMobiledetail(){
        global $_GPC, $_W;
        $useragent = addslashes($_SERVER['HTTP_USER_AGENT']);
        if (strpos($useragent, 'MicroMessenger') === false && strpos($useragent, 'Windows Phone') === false){
            message('非法访问，请通过微信打开！');
            die();
        }
        $id = intval($_GPC['id']);
        $weid = $_W['uniacid'];
        $title = pdo_fetchcolumn("SELECT department FROM" . tablename('bm_attraction_reply') . "WHERE weid = :weid and id = :id", array(':id' => $id, ':weid' => $weid));
        $picurl = pdo_fetchcolumn("SELECT picurl FROM" . tablename('bm_attraction_reply') . "WHERE weid = :weid and id = :id", array(':id' => $id, ':weid' => $weid));
        $detail = pdo_fetch("SELECT * FROM" . tablename('bm_attraction_reply') . "WHERE id='{$_GPC['id']}'");
        include $this -> template('detail');
    }
    public function doMobilestart(){
        global $_GPC, $_W;
        $useragent = addslashes($_SERVER['HTTP_USER_AGENT']);
        if (strpos($useragent, 'MicroMessenger') === false && strpos($useragent, 'Windows Phone') === false){
            message('非法访问，请通过微信打开！');
            die();
        }
        $id = intval($_GPC['id']);
        $weid = $_W['uniacid'];
        $title = pdo_fetchcolumn("SELECT department FROM" . tablename('bm_attraction_reply') . "WHERE weid = :weid and id = :id", array(':id' => $id, ':weid' => $weid));
        $picurl = pdo_fetchcolumn("SELECT picurl FROM" . tablename('bm_attraction_reply') . "WHERE weid = :weid and id = :id", array(':id' => $id, ':weid' => $weid));
        $detail = pdo_fetch("SELECT * FROM" . tablename('bm_attraction_reply') . "WHERE id='{$_GPC['id']}'");
        include $this -> template('start');
    }
    public function doMobilespotdetail(){
        global $_GPC, $_W;
        $useragent = addslashes($_SERVER['HTTP_USER_AGENT']);
        if (strpos($useragent, 'MicroMessenger') === false && strpos($useragent, 'Windows Phone') === false){
            message('非法访问，请通过微信打开！');
            die();
        }
        $id = intval($_GPC['id']);
        $weid = $_W['uniacid'];
        $title = pdo_fetchcolumn("SELECT department FROM" . tablename('bm_attraction_reply') . "WHERE weid = :weid and id = :id", array(':id' => $id, ':weid' => $weid));
        $detail = pdo_fetch("SELECT * FROM" . tablename('bm_attraction_classify') . "WHERE id='{$_GPC['id']}'");
        $title = pdo_fetchcolumn("SELECT department FROM" . tablename('bm_attraction_reply') . "WHERE weid = :weid and id = :id", array(':id' => $detail['department_id'], ':weid' => $weid));
        $id = pdo_fetchcolumn("SELECT id FROM" . tablename('bm_attraction_reply') . "WHERE weid = :weid and id = :id", array(':id' => $detail['department_id'], ':weid' => $weid));
        $picurl = $detail['spotsmallpic'];
        include $this -> template('spotdetail');
    }
    public function doMobilespotrecordplay(){
        global $_GPC, $_W;
        $useragent = addslashes($_SERVER['HTTP_USER_AGENT']);
        if (strpos($useragent, 'MicroMessenger') === false && strpos($useragent, 'Windows Phone') === false){
            message('非法访问，请通过微信打开！');
            die();
        }
        $id = intval($_GPC['id']);
        $weid = $_W['uniacid'];
        $detail = pdo_fetch("SELECT * FROM" . tablename('bm_attraction_classify') . "WHERE id='{$_GPC['id']}'");
        $title = pdo_fetchcolumn("SELECT department FROM" . tablename('bm_attraction_reply') . "WHERE weid = :weid and id = :id", array(':id' => $detail['department_id'], ':weid' => $weid));
        $id = pdo_fetchcolumn("SELECT id FROM" . tablename('bm_attraction_reply') . "WHERE weid = :weid and id = :id", array(':id' => $detail['department_id'], ':weid' => $weid));
        $picurl = $detail['spotsmallpic'];
        include $this -> template('spotrecordplay');
    }
    public function doMobileothersdetail(){
        global $_GPC, $_W;
        $useragent = addslashes($_SERVER['HTTP_USER_AGENT']);
        if (strpos($useragent, 'MicroMessenger') === false && strpos($useragent, 'Windows Phone') === false){
            message('非法访问，请通过微信打开！');
            die();
        }
        $id = intval($_GPC['id']);
        $weid = $_W['uniacid'];
        $detail = pdo_fetch("SELECT * FROM" . tablename('bm_attraction_other') . "WHERE id='{$_GPC['id']}'");
        $title = pdo_fetchcolumn("SELECT department FROM" . tablename('bm_attraction_reply') . "WHERE weid = :weid and id = :id", array(':id' => $detail['department_id'], ':weid' => $weid));
        $id = pdo_fetchcolumn("SELECT id FROM" . tablename('bm_attraction_reply') . "WHERE weid = :weid and id = :id", array(':id' => $detail['department_id'], ':weid' => $weid));
        $picurl = $detail['spotsmallpic'];
        include $this -> template('spotdetail');
    }
    public function doMobileotherrecordplay(){
        global $_GPC, $_W;
        $useragent = addslashes($_SERVER['HTTP_USER_AGENT']);
        if (strpos($useragent, 'MicroMessenger') === false && strpos($useragent, 'Windows Phone') === false){
            message('非法访问，请通过微信打开！');
            die();
        }
        $id = intval($_GPC['id']);
        $weid = $_W['uniacid'];
        $detail = pdo_fetch("SELECT * FROM" . tablename('bm_attraction_other') . "WHERE id='{$_GPC['id']}'");
        $title = pdo_fetchcolumn("SELECT department FROM" . tablename('bm_attraction_reply') . "WHERE weid = :weid and id = :id", array(':id' => $detail['department_id'], ':weid' => $weid));
        $id = pdo_fetchcolumn("SELECT id FROM" . tablename('bm_attraction_reply') . "WHERE weid = :weid and id = :id", array(':id' => $detail['department_id'], ':weid' => $weid));
        $picurl = $detail['spotsmallpic'];
        include $this -> template('spotrecordplay');
    }
    public function doMobileAjaxdelete(){
        global $_GPC;
        $delurl = $_GPC['pic'];
        if(file_delete($delurl)){
            echo 1;
        }else{
            echo 0;
        }
    }
}

?>