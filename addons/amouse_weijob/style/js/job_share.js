 document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
			<?php
				$_share = array();
				$_share['title'] = (empty($title)) ? $_W['account']['name'] : $title;
				$_share['link'] = 'http://'.$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . '&wxref=mp.weixin.qq.com';
				$_share['img'] = $_W['siteroot'] . 'addons/' . $_GPC['name'] . '/icon.jpg';
				$_share['content'] = $_share_content;
			?>
			{if !empty($_share_img)}
			var _share_img = "{$_share_img}";
			{else}
			var _share_img = $('body img:eq(0)').attr("src");
			if(typeof(_share_img) == "undefined") _share_img = "{$_share['img']}";
			if(_share_img.indexOf("http://") == -1 || _share_img.indexOf("https://") == -1 ) _share_img = "{$_W['siteroot']}" + _share_img;
			{/if}
			{if empty($_share['content'])}
			var _share_content = _removeHTMLTag($('body').html()).replace("{$_share['title']}",'');
			{else}
			var _share_content = "{php echo preg_replace('/\s/i', '', str_replace('	', '', cutstr(str_replace('&nbsp;', '', ihtmlspecialchars(strip_tags($_share['content']))), 60)));}";
			{/if}
            window.shareData = {  
                "imgUrl": _share_img, 
                "timeLineLink": "{$_share['link']}",
                "sendFriendLink": "{$_share['link']}",
                "weiboLink": "{$_share['link']}",
                "tTitle": "{$_share['title']}",
                "tContent": _share_content,
                "fTitle": "{$_share['title']}",
                "fContent": _share_content,
                "wContent": "{$_share['title']}" 
            };
            // 发送给好友
            WeixinJSBridge.on('menu:share:appmessage', function (argv) {
                WeixinJSBridge.invoke('sendAppMessage', { 
                    "img_url": window.shareData.imgUrl,
                    "img_width": "640",
                    "img_height": "640",
                    "link": window.shareData.sendFriendLink,
                    "desc": window.shareData.fContent,
                    "title": window.shareData.fTitle
                }, function (res) {
                    _report('send_msg', res.err_msg);
                })
            });

            // 分享到朋友圈
            WeixinJSBridge.on('menu:share:timeline', function (argv) {
                WeixinJSBridge.invoke('shareTimeline', {
                    "img_url": window.shareData.imgUrl,
                    "img_width": "640",
                    "img_height": "640",
                    "link": window.shareData.timeLineLink,
                    "desc": window.shareData.tContent,
                    "title": window.shareData.tTitle
                }, function (res) {
                    _report('timeline', res.err_msg);
                });
            });

            // 分享到微博
            WeixinJSBridge.on('menu:share:weibo', function (argv) {
                WeixinJSBridge.invoke('shareWeibo', {
                    "content": window.shareData.wContent,
                    "url": window.shareData.weiboLink,
                }, function (res) {
                    _report('weibo', res.err_msg);
                });
            });
        }, false)