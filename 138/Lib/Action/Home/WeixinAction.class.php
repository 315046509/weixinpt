<?php
 class WeixinAction extends Action{
    private $token;
    private $fun;
    private $data = array();
    public $fans;
    private $my = '小猪猪';
    public $wxuser;
    public $apiServer;
    public function index(){
        if (!class_exists('SimpleXMLElement')){
            exit('SimpleXMLElement class not exist');
        }
        if (!function_exists('dom_import_simplexml')){
            exit('dom_import_simplexml function not exist');
        }
        $this -> token = $this -> _get('token', "htmlspecialchars");
        if(!preg_match("/^[0-9a-zA-Z]{3,42}$/", $this -> token)){
            exit('error token');
        }
        $weixin = new Wechat($this -> token);
        $data = $weixin -> request();
        $this -> data = $weixin -> request();
        $this -> fans = S('fans_' . $this -> token . '_' . $this -> data['FromUserName']);
        if (!$this -> fans || 1){
            $this -> fans = M('Userinfo') -> where(array('token' => $this -> token, 'wecha_id' => $this -> data['FromUserName'])) -> find();
            S('fans_' . $this -> token . '_' . $this -> data['FromUserName'], $this -> fans);
        }
        $this -> wxuser = S('wxuser_' . $this -> token);
        if (!$this -> wxuser || 1){
            $this -> wxuser = D('Wxuser') -> where(array('token' => $this -> token)) -> find();
            S('wxuser_' . $this -> token, $this -> wxuser);
        }
        $this -> my = C('site_my');
        $this -> apiServer = apiServer :: getServerUrl();
        $open = M('Token_open') -> where(array('token' => $this -> _get('token'))) -> find();
        $this -> fun = $open['queryname'];
        list($content, $type) = $this -> reply($data);
        $weixin -> response($content, $type);
        if($this -> data){
            $data = $this -> data;
            Log :: record("=======================", Log :: DEBUG);
            foreach ($data as $key => $value){
                Log :: record($key . "=" . $value . "\n", Log :: DEBUG);
            }
            Log :: record("=======================", Log :: DEBUG);
            Log :: save();
            $zhaopianwall_result = S('zhaopianwall_' . $data['FromUserName']);
            if($zhaopianwall_result){
                $res = $this -> zhaopianwall($zhaopianwall_result);
            }else{
                $users = S($data['FromUserName'] . 'wxq');
                if($users != false){
                    $res = $this -> wxq($users);
                }else{
                    $res = $this -> reply($data);
                }
            }
            list($content, $type) = $res;
            $weixin -> response($content, $type);
        }
    }
    public function wxq($users){
        $wxqs = S('wxq' . $users['wxq_id']);
        if($wxqs == false){
            return array(htmlspecialchars_decode('本号微信墻可能已停止'), 'text');
        }
        $message = $this -> data;
        $con = array();
        $con = array('from_user' => $users['from_user']);
        if (!in_array($message['MsgType'], array('text', 'image', 'link'))){
            return array(htmlspecialchars_decode('你发送的数据类型墙面不允许'), 'text');
        }
        if (empty($users['nickname']) || ($users['isjoin'] == 0)){
            return array(htmlspecialchars_decode('你可能未参加任何墻或者直接发送上墙关键字看提示'), 'text');
        }
        if(strtolower($message['Content']) == strtolower($wxqs['quit_command']) or $message['Content'] == '退出'){
            M('Wxwall_members') -> where($con) -> save(array('isjoin' => 0, 'lastupdate' => strtotime("now")));
            S($users['from_user'] . 'wxq', null);
            return array(htmlspecialchars_decode($wxqs['quit_tips']), 'text');
        }
        if($message['Content'] == $wxqs['keyword']){
            return $this -> wxqLogin($users['wxq_id']);
        }
        $data = array('wxq_id' => $users['wxq_id'], 'from_user' => $message['FromUserName'], 'type' => $message['MsgType'], 'createtime' => strtotime("now"),);
        if (($wxqs['isshow'] == 0) && ($users['isblacklist'] == 0)){
            $data['isshow'] = 1;
        }else{
            $data['isshow'] = 0;
        }
        if ($message['MsgType'] == 'text'){
            $data['content'] = $message['Content'];
        }
        if($message['MsgType'] == 'image'){
            $data['content'] = $message['PicUrl'];
        }
        if ($message['MsgType'] == 'link'){
            $data['content'] = serialize(array('title' => $message['Title'], 'description' => $message['Description'], 'link' => $message['Url']));
        }
        $data['isshowed'] = 0;
        $addstatus = M('Wxwall_message') -> add($data);
        if($addstatus){
            $users['lastupdate'] = strtotime('now');
            S($users['from_user'] . 'wxq', $users, $wxqs['timeout']);
            return array($wxqs['send_tips'], 'text');
        }else{
            return array('发表失败,请稍后再试', 'text');
        }
        if ($users['isblacklist'] == 1){
            $str = '你已被列入黑名单，发送的消息需要管理员审核！';
            return array($str, 'text');
        }
    }
    public function wxqLogin($wxId){
        $users = $this -> data;
        $con = array();
        $con['from_user'] = array('eq', $users['FromUserName']);
        $con['wxq_id'] = array('eq', $wxId);
        $member = M('WxwallMembers') -> where($con) -> find();
        $wall = M('Wxq') -> where(array('id' => $wxId)) -> find();
        if (empty($wall)){
            return array(htmlspecialchars_decode('该公众号暂无上墙活动'), 'text');
        }
        if(empty($member)){
            $data = array('from_user' => $users['FromUserName'], 'wxq_id' => $wxId, 'lastupdate' => strtotime("now"), 'isjoin' => 1,);
            M('wxwall_members') -> add($data);
        }else{
            $data = array('lastupdate' => strtotime("now"), 'isjoin' => 1,);
            M('wxwall_members') -> where($con) -> save($data);
            if(!empty($member['nickname'])){
                $cache = S($users['FromUserName'] . 'wxq');
                if(isset($cache)){
                    S($users['FromUserName'] . 'wxq', NULL);
                }
                $mem = M('WxwallMembers') -> where($con) -> find();
                S($users['FromUserName'] . 'wxq', $mem, $wall['timeout']);
            }
        }
        $txt = $wall['enter_tips'] . (empty($member['nickname']) ? ' - 发表话题前请登记您的信息。' : ' 你的信息初始化已经完成，直接发送内容即可上墙');
        $url = C('site_url') . '/index.php?g=Wap&m=Wxq&a=register&token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName'] . '&id=' . $wxId;
        $info = array('title' => '请按照流程走', 'text' => $txt, 'pic' => $wall['background'], 'url' => $url);
        return array(array(array($info['title'], $info['text'], $info['pic'], $info['url'])), 'news');
    }
    private function reply($data){
        if('CLICK' == $data['Event']){
            $data['Content'] = $data['EventKey'];
            $this -> data['Content'] = $data['EventKey'];
        }elseif($data['Event'] == 'SCAN'){
            $data['Content'] = $this -> getRecognition($data['EventKey']);
            $this -> data['Content'] = $data['Content'];
        }elseif($data['Event'] == 'MASSSENDJOBFINISH'){
            M('Send_message') -> where(array('msg_id' => $data['msg_id'])) -> save(array('reachcount' => $data['SentCount']));
        }elseif('subscribe' == $data['Event']){
            $this -> behaviordata('follow', '1');
            $this -> requestdata('follownum');
            $follow_data = M('Areply') -> field('home,keyword,content') -> where(array('token' => $this -> token)) -> find();
            if(!(strpos($data['EventKey'], 'qrscene_') === FALSE)){
                $follow_data['keyword'] = $this -> getRecognition(str_replace('qrscene_', '', $data['EventKey']));
            }
            if($follow_data['home'] == 1){
                if(trim($follow_data['keyword']) == '首页' || $follow_data['keyword'] == 'home'){
                    return $this -> shouye();
                }elseif(trim($follow_data['keyword']) == '我要上网'){
                    return $this -> wysw();
                }
                return $this -> keyword($follow_data['keyword']);
            }else{
                return array(html_entity_decode($follow_data['content']), 'text');
            }
        }elseif('unsubscribe' == $data['Event']){
            $this -> requestdata('unfollownum');
        }elseif($data['Event'] == 'LOCATION'){
            return array('', 'text');
        }
        if('voice' == $data['MsgType']){
            $data['Content'] = $data['Recognition'];
            $this -> data['Content'] = $data['Recognition'];
        }
        if($data['Content'] == 'wechat ip'){
            return array($_SERVER['REMOTE_ADDR'], 'text');
        }
        if(!(strpos($this -> fun, 'api') === FALSE) && $data['Content']){
            $apiData = M('Api') -> where(array('token' => $this -> token, 'status' => 1)) -> select();
            foreach($apiData as $apiArray){
                if(!(strpos($data['Content'], $apiArray['keyword']) === FALSE)){
                    $api['type'] = $apiArray['type'];
                    $api['url'] = $apiArray['url'];
                    break;
                }
            }
            if($api != false){
                $vo['fromUsername'] = $this -> data['FromUserName'];
                $vo['Content'] = $this -> data['Content'];
                $vo['toUsername'] = $this -> token;
                if($api['type'] == 2){
                    $apidata = $this -> api_notice_increment($api['url'], $vo);
                    return array($apidata, 'text');
                }else{
                    $xml = file_get_contents("php://input");
                    $apidata = $this -> api_notice_increment($api['url'], $xml);
                    header("Content-type: text/xml");
                    exit($apidata);
                    return false;
                }
            }
        }
        if((!(strpos($data['Content'], 'shake') === FALSE) || !(strpos(strtolower($data['Content']), 'shake') === FALSE)) && strlen($data['Content']) == 16){
            $mp = str_replace('shake', '', strtolower($data['Content']));
            $thisShake = M('Shake') -> where(array('isopen' => 1, 'token' => $this -> token)) -> find();
            if ($thisShake){
                $shakeRt = M('Shake_rt') -> where(array('isopen' => 1, 'shakeid' => $thisShake['id'], 'token' => $this -> token, 'wecha_id' => $this -> data['FromUserName'])) -> find();
                $data = array();
                $data['token'] = $this -> token;
                $data['wecha_id'] = $this -> data['FromUserName'];
                $data['shakeid'] = $thisShake['id'];
                $data['phone'] = htmlspecialchars($mp);
                if ($shakeRt){
                    $srt = M('Shake_rt') -> where(array('shakeid' => $thisShake['id'], 'wecha_id' => $this -> data['FromUserName'])) -> save($data);
                    if ($srt){
                        return array(array(array($thisShake['title'] . '，点击参与活动', $thisShake['intro'] . '。您的手机号设置成功，点击即可参与活动', $thisShake['thumb'], C('site_url') . '/index.php?g=Wap&m=Shake&a=index&id=' . $thisShake['id'] . '&token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName'])), 'news');
                    }else{
                        return array('摇一摇活动手机号修改失败', 'text');
                    }
                }else{
                    $srt = M('Shake_rt') -> add($data);
                    if ($srt){
                        return array(array(array($thisShake['title'] . '，点击参与活动', $thisShake['intro'] . '。您的手机号设置成功，点击即可参与活动', $thisShake['thumb'], C('site_url') . '/index.php?g=Wap&m=Shake&a=index&id=' . $thisShake['id'] . '&token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName'])), 'news');
                    }else{
                        return array('摇一摇活动手机号设置失败', 'text');
                    }
                }
            }
        }
        if(strtolower($data['Content']) == 'wx#open'){
            M('Userinfo') -> where(array('token' => $this -> token, 'wecha_id' => $this -> data['FromUserName'])) -> save(array('wallopen' => 1));
            S('fans_' . $this -> token . '_' . $this -> data['FromUserName'], NULL);
            return array('您已进入微信墙对话模式，您下面发送的所有文字和图片信息都将会显示在大屏幕上，如需退出微信墙模式，请输入“wx#quit”', 'text');
        }elseif(strtolower($data['Content']) == 'wx#quit'){
            M('Userinfo') -> where(array('token' => $this -> token, 'wecha_id' => $this -> data['FromUserName'])) -> save(array('wallopen' => 0));
            S('fans_' . $this -> token . '_' . $this -> data['FromUserName'], NULL);
            return array('成功退出微信墙对话模式', 'text');
        }
        if ($this -> fans['wallopen']){
            $thisItem = M('Wall') -> where(array('token' => $this -> token, 'isopen' => 1)) -> find();
            if (!$thisItem){
                return array('微信墙活动不存在,如需退出微信墙模式，请输入“wx#quit”', 'text');
            }else{
                $memberRecord = M('Wall_member') -> where(array('wallid' => $thisItem['id'], 'wecha_id' => $this -> data['FromUserName'])) -> find();
                if (!$memberRecord){
                    return array('<a href="' . C('site_url') . '/index.php?g=Wap&m=Wall&a=index&token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName'] . '">点击这里完善信息后再参加此活动</a>', 'text');
                }else{
                    $row = array();
                    if ('image' != $data['MsgType']){
                        $message = str_replace('wx#', '', $data['Content']);
                    }else{
                        $message = '';
                        $row['picture'] = $data['PicUrl'];
                    }
                    $row['uid'] = $memberRecord['id'];
                    $row['wecha_id'] = $this -> data['FromUserName'];
                    $row['token'] = $this -> token;
                    $thisWall = $thisItem;
                    $thisMember = $memberRecord;
                    $row['wallid'] = $thisWall['id'];
                    $row['content'] = $message;
                    $row['uid'] = $thisMember['id'];
                    $row['time'] = time();
                    M('Wall_message') -> add($row);
                    return array('上墙成功，如需退出微信墙模式，请输入“wx#quit”', 'text');
                }
            }
        }
        if(!(strpos($data['Content'], '附近') === FALSE)){
            $this -> recordLastRequest($data['Content']);
            $return = $this -> fujin(array(str_replace('附近', '', $data['Content'])));
        }elseif(!(strpos($data['Content'], '公交') === FALSE) && (strpos($data['Content'], '坐公交') === FALSE)){
            $return = $this -> gongjiao(explode('公交', $data['Content']));
        }elseif(!(strpos($data['Content'], '域名') === FALSE)){
            $return = $this -> yuming(str_replace('域名', '', $data['Content']));
        }else{
            $check = $this -> user('connectnum');
            if($check['connectnum'] != 1){
                return array(C('connectout'), 'text');
            }
            $Pin = new GetPin();
            $key = $data['Content'];
            $datafun = explode(',', $this -> fun);
            $tags = $this -> get_tags($key);
            $back = explode(',', $tags);
            if ($key == '首页' || $key == 'home'){
                return $this -> home();
            }
            foreach($back as $keydata => $data){
                $string = $Pin -> Pinyin($data);
                if(in_array($string, $datafun) && $string){
                    if($string == 'fujin'){
                        $this -> recordLastRequest($key);
                    }
                    $this -> requestdata('textnum');
                    unset($back[$keydata]);
                    if (method_exists('WeixinAction', $string)){
                        eval('$return= $this->' . $string . '($back);');
                    }else{
                    }
                    break;
                }
            }
        }
        if(!empty($return)){
            if(is_array($return)){
                return $return;
            }else{
                return array($return, 'text');
            }
        }else{
            if(!(strpos($key, 'cheat') === FALSE)){
                $arr = explode(' ', $key);
                $datas['lid'] = intval($arr[1]);
                $lotteryPassword = $arr[2];
                $datas['prizetype'] = intval($arr[3]);
                $datas['intro'] = $arr[4];
                $datas['wecha_id'] = $this -> data['FromUserName'];
                $thisLottery = M('Lottery') -> where(array('id' => $datas['lid'])) -> find();
                if ($lotteryPassword == $thisLottery['parssword']){
                    $rt = M('Lottery_cheat') -> add($datas);
                    if ($rt){
                        return array('设置成功', 'text');
                    }
                    return array('设置失败:未知原因', 'text');
                }else{
                    return array('设置失败:密码不对', 'text');
                }
            }
            if($this -> data['Location_X']){
                $this -> recordLastRequest($this -> data['Location_Y'] . ',' . $this -> data['Location_X'], 'location');
                return $this -> map($this -> data['Location_X'], $this -> data['Location_Y']);
            }
            if(!(strpos($key, '开车去') === FALSE) || !(strpos($key, '坐公交') === FALSE) || !(strpos($key, '步行去') === FALSE)){
                $this -> recordLastRequest($key);
                $user_request_model = M('User_request');
                $loctionInfo = $user_request_model -> where(array('token' => $this -> _get('token'), 'msgtype' => 'location', 'uid' => $this -> data['FromUserName'])) -> find();
                if ($loctionInfo && intval($loctionInfo['time'] > (time()-60))){
                    $latLng = explode(',', $loctionInfo['keyword']);
                    return $this -> map($latLng[1], $latLng[0]);
                }
                return array('请发送您所在的位置', 'text');
            }
            switch($key){
            case '首页': case 'home': return $this -> home();
                break;
            case '主页': return $this -> home();
                break;
            case '地图': return $this -> companyMap();
            case '最近的': $this -> recordLastRequest($key);
                $user_request_model = M('User_request');
                $loctionInfo = $user_request_model -> where(array('token' => $this -> _get('token'), 'msgtype' => 'location', 'uid' => $this -> data['FromUserName'])) -> find();
                if ($loctionInfo && intval($loctionInfo['time'] > (time()-60))){
                    $latLng = explode(',', $loctionInfo['keyword']);
                    return $this -> map($latLng[1], $latLng[0]);
                }
                return array('请发送您所在的位置', 'text');
                break;
            case '帮助': return $this -> help();
                break;
            case 'help': return $this -> help();
                break;
            case '会员卡': return $this -> member();
                break;
            case '会员': return $this -> member();
                break;
            case '3g相册': return $this -> xiangce();
                break;
            case '笑话': return $this -> xiaohua();
                break;
            case '相册': return $this -> xiangce();
                break;
            case '商城': $pro = M('reply_info') -> where(array('infotype' => 'Shop', 'token' => $this -> token)) -> find();
                $url = C('site_url') . '/index.php?g=Wap&m=Store&a=index&token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName'] . '&sgssz=mp.weixin.qq.com';
                if ($pro['apiurl']){
                    $url = str_replace('&amp;', '&', $pro['apiurl']);
                }
                return array(array(array($pro['title'], strip_tags(htmlspecialchars_decode($pro['info'])), $pro['picurl'], $url)), 'news');
                break;
            case '订餐': $pro = M('reply_info') -> where(array('infotype' => 'Dining', 'token' => $this -> token)) -> find();
                $url = C('site_url') . '/index.php?g=Wap&m=Dining&a=index&dining=1&token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName'] . '&138wo=mp.weixin.qq.com';
                if ($pro['apiurl']){
                    $url = str_replace('&amp;', '&', $pro['apiurl']);
                }
                return array(array(array($pro['title'], strip_tags(htmlspecialchars_decode($pro['info'])), $pro['picurl'], $url)), 'news');
                break;
            case '外卖': $pro = M('reply_info') -> where(array('infotype' => 'waimai', 'token' => $this -> token)) -> find();
                $url = C('site_url') . '/index.php?g=Wap&m=Repast&a=index&token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName'] . '&sgssz=mp.weixin.qq.com';
                if ($pro['apiurl']){
                    $url = str_replace('&amp;', '&', $pro['apiurl']);
                }
                return array(array(array($pro['title'], strip_tags(htmlspecialchars_decode($pro['info'])), $pro['picurl'], $url)), 'news');
                break;
            case '留言': $pro = M('reply_info') -> where(array('infotype' => 'message', 'token' => $this -> token)) -> find();
                if($pro){
                    return array(array(array($pro['title'], strip_tags(htmlspecialchars_decode($pro['info'])), $pro['picurl'], C('site_url') . '/index.php?g=Wap&m=Reply&a=index&token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName'] . '&sgssz=mp.weixin.qq.com')), 'news');
                }else{
                    return array(array(array('留言板', '在线留言', rtrim(C('site_url'), '/') . '/tpl/Wap/default/common/css/style/images/ly.jpg', C('site_url') . '/index.php?g=Wap&m=Reply&a=index&token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName'] . '&sgssz=mp.weixin.qq.com')), 'news');
                }
                break;
            case '酒店': $pro = M('reply_info') -> where(array('infotype' => 'Hotels', 'token' => $this -> token)) -> find();
                if($pro){
                    return array(array(array($pro['title'], strip_tags(htmlspecialchars_decode($pro['info'])), $pro['picurl'], C('site_url') . '/index.php?g=Wap&m=Hotels&a=index&token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName'])), 'news');
                }else{
                    return array(array(array('酒店', '酒店在线预订', rtrim(C('site_url'), '/') . 'tpl/static/images/homelogo.png', C('site_url') . '/index.php?g=Wap&m=Hotels&a=index&token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName'])), 'news');
                }
                break;
            case '团购': $pro = M('reply_info') -> where(array('infotype' => 'Groupon', 'token' => $this -> token)) -> find();
                $url = C('site_url') . '/index.php?g=Wap&m=Groupon&a=grouponIndex&token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName'] . '&sgssz=mp.weixin.qq.com';
                if ($pro['apiurl']){
                    $url = str_replace('&amp;', '&', $pro['apiurl']);
                }
                return array(array(array($pro['title'], strip_tags(htmlspecialchars_decode($pro['info'])), $pro['picurl'], $url)), 'news');
                break;
            case '全景': $pro = M('reply_info') -> where(array('infotype' => 'panorama', 'token' => $this -> token)) -> find();
                if($pro){
                    return array(array(array($pro['title'], strip_tags(htmlspecialchars_decode($pro['info'])), $pro['picurl'], C('site_url') . '/index.php?g=Wap&m=Panorama&a=index&token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName'] . '&sgssz=mp.weixin.qq.com')), 'news');
                }else{
                    return array(array(array('360°全景看车看房', '通过该功能可以实现3D全景看车看房', rtrim(C('site_url'), '/') . '/tpl/User/default/common/images/panorama/360view.jpg', C('site_url') . '/index.php?g=Wap&m=Panorama&a=index&token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName'] . '&sgssz=mp.weixin.qq.com')), 'news');
                }
                break;
            case '密码': $pass = rand(1000, 9999);
                $aucode['authcode'] = $pass;
                $aucode['token'] = $this -> token;
                $codeModel = M('ap_authcode');
                $codeModel -> add($aucode);
                return array($pass, 'text');
                break;
            case 'p': $pass = rand(1000, 9999);
                $aucode['authcode'] = $pass;
                $aucode['token'] = $this -> token;
                $codeModel = M('ap_authcode');
                $codeModel -> add($aucode);
                return array($pass, 'text');
                break;
            case '微KTV': $Estate = M('Estate') -> where(array('token' => $this -> token, 'thetype' => 'ktv')) -> find();
                return array(array(array($Estate['title'], str_replace('&nbsp;', '', strip_tags(htmlspecialchars_decode($Estate['estate_desc']))), $Estate['cover'], C ('site_url') . '/index.php?g=Wap&m=Ktv&a=index&&token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName'] . '&hid=' . $Estate['id'] . '&sgssz=mp.weixin.qq.com')), 'news');
                break;
            case '微婚庆': $Estate = M('Estate') -> where(array('token' => $this -> token, 'thetype' => 'hunqing')) -> find();
                return array(array(array($Estate['title'], str_replace('&nbsp;', '', strip_tags(htmlspecialchars_decode($Estate['estate_desc']))), $Estate['cover'], C ('site_url') . '/index.php?g=Wap&m=Hunqing&a=index&&token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName'] . '&hid=' . $Estate['id'] . '&sgssz=mp.weixin.qq.com')), 'news');
                break;
            case '微食品': $Estate = M('Estate') -> where(array('token' => $this -> token, 'thetype' => 'shipin')) -> find();
                return array(array(array($Estate['title'], str_replace('&nbsp;', '', strip_tags(htmlspecialchars_decode($Estate['estate_desc']))), $Estate['cover'], C ('site_url') . '/index.php?g=Wap&m=Shipin&a=index&&token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName'] . '&hid=' . $Estate['id'] . '&sgssz=mp.weixin.qq.com')), 'news');
                break;
            case '微旅游': $Estate = M('Estate') -> where(array('token' => $this -> token, 'thetype' => 'lvyou')) -> find();
                return array(array(array($Estate['title'], str_replace('&nbsp;', '', strip_tags(htmlspecialchars_decode($Estate['estate_desc']))), $Estate['cover'], C ('site_url') . '/index.php?g=Wap&m=Lvyou&a=index&&token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName'] . '&hid=' . $Estate['id'] . '&sgssz=mp.weixin.qq.com')), 'news');
                break;
            case '微健身': $Estate = M('Estate') -> where(array('token' => $this -> token, 'thetype' => 'jianshen')) -> find();
                return array(array(array($Estate['title'], str_replace('&nbsp;', '', strip_tags(htmlspecialchars_decode($Estate['estate_desc']))), $Estate['cover'], C ('site_url') . '/index.php?g=Wap&m=Jianshen&a=index&&token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName'] . '&hid=' . $Estate['id'] . '&sgssz=mp.weixin.qq.com')), 'news');
                break;
            case '微政务': $Estate = M('Estate') -> where(array('token' => $this -> token, 'thetype' => 'zhengwu')) -> find();
                return array(array(array($Estate['title'], str_replace('&nbsp;', '', strip_tags(htmlspecialchars_decode($Estate['estate_desc']))), $Estate['cover'], C ('site_url') . '/index.php?g=Wap&m=Zhengwu&a=index&&token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName'] . '&hid=' . $Estate['id'] . '&sgssz=mp.weixin.qq.com')), 'news');
                break;
            case '微花店': $Estate = M('Estate') -> where(array('token' => $this -> token, 'thetype' => 'huadian')) -> find();
                return array(array(array($Estate['title'], str_replace('&nbsp;', '', strip_tags(htmlspecialchars_decode($Estate['estate_desc']))), $Estate['cover'], C ('site_url') . '/index.php?g=Wap&m=Huadian&a=index&&token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName'] . '&hid=' . $Estate['id'] . '&sgssz=mp.weixin.qq.com')), 'news');
                break;
            case '微教育': $Estate = M('Estate') -> where(array('token' => $this -> token, 'thetype' => 'jiaoyu')) -> find();
                return array(array(array($Estate['title'], str_replace('&nbsp;', '', strip_tags(htmlspecialchars_decode($Estate['estate_desc']))), $Estate['cover'], C ('site_url') . '/index.php?g=Wap&m=Jiaoyu&a=index&&token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName'] . '&hid=' . $Estate['id'] . '&sgssz=mp.weixin.qq.com')), 'news');
                break;
            case '微电影': $Estate = M('Estate') -> where(array('token' => $this -> token, 'thetype' => 'dianying')) -> find();
                return array(array(array($Estate['title'], str_replace('&nbsp;', '', strip_tags(htmlspecialchars_decode($Estate['estate_desc']))), $Estate['cover'], C ('site_url') . '/index.php?g=Wap&m=Dianying&a=index&&token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName'] . '&hid=' . $Estate['id'] . '&sgssz=mp.weixin.qq.com')), 'news');
                break;
            case '微房产': $Estate = M('Estate') -> where(array('token' => $this -> token)) -> find();
                return array(array(array($Estate['title'], str_replace('&nbsp;', '', strip_tags(htmlspecialchars_decode($Estate['estate_desc']))), $Estate['cover'], C('site_url') . '/index.php?g=Wap&m=Estate&a=index&&token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName'] . '&hid=' . $Estate['id'] . '&sgssz=mp.weixin.qq.com')), 'news');
                break;
            case '讨论社区': case '论坛': $fconfig = M('Forum_config') -> where(array('token' => $this -> token)) -> find();
                return array(array(array($fconfig['forumname'], str_replace('&nbsp;', '', strip_tags(htmlspecialchars_decode($fconfig['intro']))), $fconfig['picurl'], C('site_url') . '/index.php?g=Wap&m=Forum&a=index&&token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName'])), 'news');
                break;
            default: $check = $this -> user('diynum', $key);
                if($check['diynum'] != 1){
                    return array(C('connectout'), 'text');
                }else{
                    return $this -> keyword($key);
                }
            }
        }
    }
    private function xiangce(){
        $this -> behaviordata('album', '', '1');
        $photo = M('Photo') -> where(array('token' => $this -> token, 'status' => 1)) -> find();
        $data['title'] = $photo['title'];
        $data['keyword'] = $photo['info'];
        $data['url'] = rtrim(C('site_url'), '/') . U('Wap/Photo/index', array('token' => $this -> token, 'wecha_id' => $this -> data['FromUserName']));
        $data['picurl'] = $photo['picurl']?$photo['picurl']:rtrim(C('site_url'), '/') . '/tpl/static/images/yj.jpg';
        return array(array(array($data['title'], $data['keyword'], $data['picurl'], $data['url'])), 'news');
    }
    private function companyMap(){
        import("Home.Action.MapAction");
        $mapAction = new MapAction();
        return $mapAction -> staticCompanyMap();
    }
    private function shenhe($name){
        $this -> behaviordata('usernameCheck', '', '1');
        $name = implode('', $name);
        if(empty($name)){
            return '正确的审核帐号方式是：审核+帐号';
        }else{
            $user = M('Users') -> field('id') -> where(array('username' => $name)) -> find();
            if($user == false){
                return '主人' . $this -> my . "提醒您,您还没注册吧\n正确的审核帐号方式是：审核+帐号,不含+号";
            }else{
                $up = M('users') -> where(array('id' => $user['id'])) -> save(array('status' => 1, 'viptime' => strtotime("+1 day")));
                if($up != false){
                    return '主人' . $this -> my . '恭喜您,您的帐号已经审核,您现在可以登陆平台测试功能啦!';
                }else{
                    return '服务器繁忙请稍后再试';
                }
            }
        }
    }
    private function huiyuanka($name){
        return $this -> member();
    }
    private function member(){
        $card = M('member_card_create') -> where(array('token' => $this -> token, 'wecha_id' => $this -> data['FromUserName'])) -> find();
        $cardInfo = M('member_card_set') -> where(array('token' => $this -> token)) -> find();
        $this -> behaviordata('Member_card_set', $cardInfo['id']);
        $reply_info_db = M('Reply_info');
        if($card){
            $where_member = array('token' => $this -> token, 'infotype' => 'membercard');
            $memberConfig = $reply_info_db -> where($where_member) -> find();
            if (!$memberConfig){
                $memberConfig = array();
                $memberConfig['picurl'] = rtrim(C('site_url'), '/') . '/tpl/static/images/vip.jpg';
                $memberConfig['title'] = '会员卡,省钱，打折,促销，优先知道,有奖励哦';
                $memberConfig['info'] = '尊贵vip，是您消费身份的体现,会员卡,省钱，打折,促销，优先知道,有奖励哦';
            }
            $data['picurl'] = $memberConfig['picurl'];
            $data['title'] = $memberConfig['title'];
            $data['keyword'] = $memberConfig['info'];
            if (!$memberConfig['apiurl']){
                $data['url'] = rtrim(C('site_url'), '/') . U('Wap/Card/index', array('token' => $this -> token, 'wecha_id' => $this -> data['FromUserName']));
            }else{
                $data['url'] = str_replace('{wechat_id}', $this -> data['FromUserName'], $memberConfig['apiurl']);
            }
        }else{
            $where_unmember = array('token' => $this -> token, 'infotype' => 'membercard_nouse');
            $unmemberConfig = $reply_info_db -> where($where_unmember) -> find();
            if (!$unmemberConfig){
                $unmemberConfig = array();
                $unmemberConfig['picurl'] = rtrim(C('site_url'), '/') . '/tpl/static/images/member.jpg';
                $unmemberConfig['title'] = '申请成为会员';
                $unmemberConfig['info'] = '申请成为会员，享受更多优惠';
            }
            $data['picurl'] = $unmemberConfig['picurl'];
            $data['title'] = $unmemberConfig['title'];
            $data['keyword'] = $unmemberConfig['info'];
            if (!$unmemberConfig['apiurl']){
                $data['url'] = rtrim(C('site_url'), '/') . U('Wap/Card/index', array('token' => $this -> token, 'wecha_id' => $this -> data['FromUserName']));
            }else{
                $data['url'] = str_replace('{wechat_id}', $this -> data['FromUserName'], $unmemberConfig['apiurl']);
            }
        }
        return array(array(array($data['title'], $data['keyword'], $data['picurl'], $data['url'])), 'news');
    }
    private function taobao($name){
        $name = array_merge($name);
        $data = M('Taobao') -> where(array('token' => $this -> token)) -> find();
        if($data != false){
            if(strpos($data['keyword'], $name)){
                $url = $data['homeurl'] . '/search.htm?search=y&keyword=' . $name . '&lowPrice=&highPrice=';
            }else{
                $url = $data['homeurl'];
            }
            return array(array(array($data['title'], $data['keyword'], $data['picurl'], $url)), 'news');
        }else{
            return '商家还未及时更新淘宝店铺的信息,回复帮助,查看功能详情';
        }
    }
    private function choujiang($name){
        $data = M('lottery') -> field('id,keyword,info,title,starpicurl') -> where(array('token' => $this -> token, 'status' => 1, 'type' => 1)) -> order('id desc') -> find();
        if($data == false){
            return array('暂无抽奖活动', 'text');
        }
        $pic = $data['starpicurl']?$data['starpicurl']:rtrim(C('site_url'), '/') . '/tpl/User/default/common/images/img/activity-lottery-start.jpg';
        $url = rtrim(C('site_url'), '/') . U('Wap/Lottery/index', array('type' => 1, 'token' => $this -> token, 'id' => $data['id'], 'wecha_id' => $this -> data['FromUserName']));
        return array(array(array($data['title'], $data['info'], $pic, $url)), 'news');
    }
    private function keyword($key){
        $like['keyword'] = array('like', '%' . $key . '%');
        $like['token'] = $this -> token;
        $data = M('keyword') -> where($like) -> order('id desc') -> find();
        if($data != false){
            $this -> behaviordata($data['module'], $data['pid']);
            switch($data['module']){
            case 'Img': $this -> requestdata('imgnum');
                $img_db = M($data['module']);
                $back = $img_db -> field('id,text,pic,url,title') -> limit(9) -> order('usort desc') -> where($like) -> select();
                $idsWhere = 'id in (';
                $comma = '';
                foreach($back as $keya => $infot){
                    $idsWhere .= $comma . $infot['id'];
                    $comma = ',';
                    if($infot['url'] != false){
                        if(!(strpos($infot['url'], 'http') === FALSE)){
                            $url = $this -> getFuncLink(html_entity_decode($infot['url']));
                        }else{
                            $url = $this -> getFuncLink($infot['url']);
                        }
                    }else{
                        $url = rtrim(C('site_url'), '/') . U('Wap/Index/content', array('token' => $this -> token, 'id' => $infot['id'], 'wecha_id' => $this -> data['FromUserName']));
                    }
                    $return[] = array($infot['title'], $this -> handleIntro($infot['text']), $infot['pic'], $url);
                }
                $idsWhere .= ')';
                if ($back){
                    $img_db -> where($idsWhere) -> setInc('click');
                }
                return array($return, 'news');
                break;
            case 'Host': $this -> requestdata('other');
                $host = M('Host') -> where(array('id' => $data['pid'])) -> find();
                return array(array(array($host['name'], $host['info'], $host['ppicurl'], C('site_url') . '/index.php?g=Wap&m=Host&a=index&token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName'] . '&hid=' . $data['pid'] . '&sgssz=mp.weixin.qq.com')), 'news');
                break;
            case 'Wxq': $this -> requestdata('other');
                return $this -> wxqLogin($data['pid']);
                break;
            case 'Estate': $this -> requestdata('other');
                $Estate = M('Estate') -> where(array('id' => $data['pid'])) -> find();
                return array(array(array($Estate['title'], $Estate['estate_desc'], $Estate['cover'], C('site_url') . '/index.php?g=Wap&m=Estate&a=mian&token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName'] . '&sgssz=mp.weixin.qq.com'), array('楼盘介绍', $Estate['estate_desc'], $Estate['house_banner'], C('site_url') . '/index.php?g=Wap&m=Estate&a=index&&token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName'] . '&hid=' . $data['pid'] . '&sgssz=mp.weixin.qq.com'), array('专家点评', $Estate['estate_desc'], $Estate['cover'], C('site_url') . '/index.php?g=Wap&m=Estate&a=impress&&token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName'] . '&hid=' . $data['pid'] . '&sgssz=mp.weixin.qq.com'), array('楼盘3D全景', $Estate['estate_desc'], $Estate['banner'], C('site_url') . '/index.php?g=Wap&m=Panorama&a=index&token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName'] . '&hid=' . $data['pid'] . '&sgssz=mp.weixin.qq.com'), array('楼盘动态', $Estate['estate_desc'], $Estate['house_banner'], C('site_url') . '/index.php?g=Wap&m=Index&a=lists&classid=' . $Estate['classify_id'] . '&token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName'] . '&hid=' . $data['pid'] . '&sgssz=mp.weixin.qq.com'),), 'news');
                break;
            case 'Reservation': $this -> requestdata('other');
                $rt = M('Reservation') -> where(array('id' => $data['pid'])) -> find();
                return array(array(array($rt['title'], $rt['info'], $rt['picurl'], C('site_url') . '/index.php?g=Wap&m=Reservation&a=index&rid=' . $data['pid'] . '&token=' . $this -> token . '&thetype=' . $this -> thetype . '&wecha_id=' . $this -> data['FromUserName'] . '&sgssz=mp.weixin.qq.com'),), 'news');
                break;
            case 'Meirong': $this -> requestdata('other');
                $pro = M('yuyue') -> where(array('id' => $data['pid'])) -> find();
                return array(array(array($pro['title'], strip_tags(htmlspecialchars_decode($pro['info'])), $pro['topic'], C('site_url') . '/index.php?g=Wap&m=Meirong&a=index&token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName'] . '&id=' . $data['pid'])), 'news');
                break;
            case 'Jiuba': $this -> requestdata('other');
                $pro = M('yuyue') -> where(array('id' => $data['pid'])) -> find();
                return array(array(array($pro['title'], strip_tags(htmlspecialchars_decode($pro['info'])), $pro['topic'], C('site_url') . '/index.php?g=Wap&m=Jiuba&a=index&token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName'] . '&id=' . $data['pid'])), 'news');
                break;
            case 'Canting': $this -> requestdata('other');
                $pro = M('yuyue') -> where(array('id' => $data['pid'])) -> find();
                return array(array(array($pro['title'], strip_tags(htmlspecialchars_decode($pro['info'])), $pro['topic'], C('site_url') . '/index.php?g=Wap&m=Canting&a=index&token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName'] . '&id=' . $data['pid'])), 'news');
                break;
            case 'Diaoyan' : $this -> requestdata ('other');
                $pro = M ('diaoyan') -> where (array ('id' => $data ['pid'])) -> find ();
                return array (array (array ($pro ['title'], strip_tags (htmlspecialchars_decode ($pro ['sinfo'])), $pro ['pic'], C ('site_url') . '/index.php?g=Wap&m=Diaoyan&a=index&token=' . $this -> token . '&wecha_id=' . $this -> data ['FromUserName'] . '&id=' . $data ['pid'])) , 'news') ;
                break;
            case 'Text': $this -> requestdata('textnum');
                $info = M($data['module']) -> order('id desc') -> find($data['pid']);
                return array(htmlspecialchars_decode(str_replace('{wechat_id}', $this -> data['FromUserName'], $info['text'])), 'text');
                break;
            case 'Product': $this -> requestdata('other');
                $infos = M('Product') -> limit(9) -> order('id desc') -> where($like) -> select();
                if ($infos){
                    $return = array();
                    foreach ($infos as $info){
                        if (!$info['groupon']){
                            $url = C('site_url') . '/index.php?g=Wap&m=Store&a=product&token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName'] . '&id=' . $info['id'];
                        }else{
                            $url = C('site_url') . '/index.php?g=Wap&m=Groupon&a=product&token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName'] . '&id=' . $info['id'];
                        }
                        $return[] = array($info['name'], $this -> handleIntro(strip_tags(htmlspecialchars_decode($info['intro']))), $info['logourl'], $url);
                    }
                }
                return array($return, 'news');
                break;
            case 'Selfform': $this -> requestdata('other');
                $pro = M('Selfform') -> where(array('id' => $data['pid'])) -> find();
                return array(array(array($pro['name'], strip_tags(htmlspecialchars_decode($pro['intro'])), $pro['logourl'], C('site_url') . '/index.php?g=Wap&m=Selfform&a=index&token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName'] . '&id=' . $data['pid'] . '&sgssz=mp.weixin.qq.com')), 'news');
                break;
            case 'Panorama': $this -> requestdata('other');
                $pro = M('Panorama') -> where(array('id' => $data['pid'])) -> find();
                return array(array(array($pro['name'], strip_tags(htmlspecialchars_decode($pro['intro'])), $pro['frontpic'], C('site_url') . '/index.php?g=Wap&m=Panorama&a=item&token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName'] . '&id=' . $data['pid'] . '&sgssz=mp.weixin.qq.com')), 'news');
                break;
            case 'Wedding': $this -> requestdata('other');
                $wedding = M('Wedding') -> where(array('id' => $data['pid'])) -> find();
                return array(array(array($wedding['title'], strip_tags(htmlspecialchars_decode($wedding['word'])), $wedding['coverurl'], C('site_url') . '/index.php?g=Wap&m=Wedding&a=index&token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName'] . '&id=' . $data['pid'] . '&sgssz=mp.weixin.qq.com'), array('查看我的祝福', strip_tags(htmlspecialchars_decode($wedding['word'])), $wedding['picurl'], C('site_url') . '/index.php?g=Wap&m=Wedding&a=check&type=1&token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName'] . '&id=' . $data['pid'] . '&sgssz=mp.weixin.qq.com'), array('查看我的来宾', strip_tags(htmlspecialchars_decode($wedding['word'])), $wedding['picurl'], C('site_url') . '/index.php?g=Wap&m=Wedding&a=check&type=2&token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName'] . '&id=' . $data['pid'] . '&sgssz=mp.weixin.qq.com'),), 'news');
                break;
            case 'Vote': $this -> requestdata('other');
                $Vote = M('Vote') -> where(array('id' => $data['pid'])) -> order('id DESC') -> find();
                return array(array(array($Vote['title'], str_replace(array('&nbsp;', 'br /', '&amp;', 'gt;', 'lt;'), '', strip_tags(htmlspecialchars_decode($Vote['info']))), $Vote['picurl'], C('site_url') . '/index.php?g=Wap&m=Vote&a=index&token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName'] . '&id=' . $data['pid'] . '&sgssz=mp.weixin.qq.com')), 'news');
                break;
            case 'Greeting_card': $this -> requestdata('other');
                $Vote = M('Greeting_card') -> where(array('id' => $data['pid'])) -> order('id DESC') -> find();
                return array(array(array($Vote['title'], str_replace(array('&nbsp;', 'br /', '&amp;', 'gt;', 'lt;'), '', strip_tags(htmlspecialchars_decode($Vote['info']))), $Vote['picurl'], C('site_url') . '/index.php?g=Wap&m=Greeting_card&a=index&id=' . $data['pid'] . '&sgssz=mp.weixin.qq.com')), 'news');
                break;
            case 'Lottery': $this -> requestdata('other');
                $info = M('Lottery') -> find($data['pid']);
                if($info == false || $info['status'] == 3){
                    return array('活动可能已经结束或者被删除了', 'text');
                }
                switch($info['type']){
                case 1: $model = 'Lottery';
                    break;
                case 2: $model = 'Guajiang';
                    break;
                case 3: $model = 'Coupon';
                    break;
                case 4: $model = 'LuckyFruit';
                    break;
                case 5: $model = 'GoldenEgg';
                    break;
                }
                $id = $info['id'];
                $type = $info['type'];
                if($info['status'] == 1){
                $picurl = $info['starpicurl'] ;
                $title = $info['title'];
                $id = $info['id'];
                $info = $info['info'];
            }else{
            $picurl = $info['endpicurl'];
            $title = $info['endtite'];
            $info = $info['endinfo'];
        }
        $url = C('site_url') . U('Wap/' . $model . '/index', array('token' => $this -> token, 'type' => $type, 'wecha_id' => $this -> data['FromUserName'], 'id' => $id, 'type' => $type));
        return array(array(array($title, $info, $picurl, $url)), 'news');
        case 'Carowner': $this -> requestdata('other');
            $thisItem = M('Carowner') -> where(array('id' => $data['pid'])) -> find();
            return array(array(array($thisItem['title'], str_replace(array('&nbsp;', 'br /', '&amp;', 'gt;', 'lt;'), '', strip_tags(htmlspecialchars_decode($thisItem['info']))), $thisItem['head_url'], C('site_url') . '/index.php?g=Wap&m=Car&a=owner&token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName'] . '&id=' . $data['pid'] . '&sgssz=mp.weixin.qq.com')), 'news');
            break;
        case 'Carowner': $this -> requestdata('other');
            $thisItem = M('Carowner') -> where(array('id' => $data['pid'])) -> find();
            return array(array(array($thisItem['title'], str_replace(array('&nbsp;', 'br /', '&amp;', 'gt;', 'lt;'), '', strip_tags(htmlspecialchars_decode($thisItem['info']))), $thisItem['head_url'], C('site_url') . '/index.php?g=Wap&m=Car&a=owner&token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName'])), 'news');
            break;
        case 'Carset': $this -> requestdata('other');
            $thisItem = M('Carset') -> where(array('id' => $data['pid'])) -> find();
            $news = array();
            array_push($news, array($thisItem['title'], '', $thisItem['head_url'], $thisItem['url']?$thisItem['url']:C('site_url') . '/index.php?g=Wap&m=Car&a=index&token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName']));
            array_push($news, array($thisItem['title1'], '', $thisItem['head_url_1'], $thisItem['url1']?$thisItem['url1']:C('site_url') . '/index.php?g=Wap&m=Car&a=brands&token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName']));
            array_push($news, array($thisItem['title2'], '', $thisItem['head_url_2'], $thisItem['url2']?$thisItem['url2']:C('site_url') . '/index.php?g=Wap&m=Car&a=salers&token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName']));
            array_push($news, array($thisItem['title3'], '', $thisItem['head_url_3'], $thisItem['url3']?$thisItem['url3']:C('site_url') . '/index.php?g=Wap&m=Car&a=CarReserveBook&addtype=drive&token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName']));
            array_push($news, array($thisItem['title4'], '', $thisItem['head_url_4'], $thisItem['url4']?$thisItem['url4']:C('site_url') . '/index.php?g=Wap&m=Car&a=owner&token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName']));
            array_push($news, array($thisItem['title5'], '', $thisItem['head_url_5'], $thisItem['url5']?$thisItem['url5']:C('site_url') . '/index.php?g=Wap&m=Car&a=tool&token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName']));
            array_push($news, array($thisItem['title6'], '', $thisItem['head_url_6'], $thisItem['url6']?$thisItem['url6']:C('site_url') . '/index.php?g=Wap&m=Car&a=showcar&token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName']));
            return array($news, 'news');
            break;
        case 'medicalSet': $thisItem = M('Medical_set') -> where(array('id' => $data['pid'])) -> find();
            return array(array(array($thisItem['title'], str_replace(array('&nbsp;', 'br /', '&amp;', 'gt;', 'lt;'), '', strip_tags(htmlspecialchars_decode($thisItem['info']))), $thisItem['head_url'], C('site_url') . '/index.php?g=Wap&m=Medical&a=index&token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName'])), 'news');
            break;
        case 'Shake': $thisItem = M('Shake') -> where(array('id' => $data['pid'])) -> find();
            $shakeRecord = M('Shake_rt') -> where(array('shakeid' => $data['pid'], 'wecha_id' => $this -> data['FromUserName'])) -> find();
            if (!$shakeRecord){
                if ($this -> fans['tel']){
                    $shakeRtRow = array();
                    $shakeRtRow['token'] = $this -> token;
                    $shakeRtRow['wecha_id'] = $this -> data['FromUserName'];
                    $shakeRtRow['shakeid'] = $thisItem['id'];
                    $shakeRtRow['phone'] = htmlspecialchars($this -> fans['tel']);
                    M('Shake_rt') -> add($shakeRtRow);
                    return array(array(array($thisItem['title'], $thisItem['intro'] . '。您的电话为：' . $shakeRtRow['phone'] . ',如需修改请回复"shake+您的手机号"', $thisItem['thumb'], C('site_url') . '/index.php?g=Wap&m=Shake&a=index&id=' . $thisItem['id'] . '&token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName'])), 'news');
                }else{
                    return array('请回复shake加您的手机号参与活动', 'text');
                }
            }else{
                return array(array(array($thisItem['title'], $thisItem['intro'] . '。您的电话为：' . $this -> fans['tel'] . ',如需修改请回复"shake+您的手机号"', $thisItem['thumb'], C('site_url') . '/index.php?g=Wap&m=Shake&a=index&id=' . $thisItem['id'] . '&token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName'])), 'news');
            }
            break;
        case 'Wall': $thisItem = M('Wall') -> where(array('id' => $data['pid'])) -> find();
            if (!$thisItem['isopen']){
                return array('微信墙活动已关闭', 'text');
            }else{
                $memberRecord = M('Wall_member') -> where(array('wallid' => $data['pid'], 'wecha_id' => $this -> data['FromUserName'])) -> find();
                if (!$memberRecord || !$this -> fans){
                    return array('<a href="' . C('site_url') . U('Wap/Userinfo/index', array('token' => $this -> token, 'wecha_id' => $this -> data['FromUserName'], 'redirect' => 'Wall/person|id:' . intval($data['pid']))) . '">请点击这里完善信息后再参加此活动</a>', 'text');
                }else{
                    M('Userinfo') -> where(array('token' => $this -> token, 'wecha_id' => $this -> data['FromUserName'])) -> save(array('wallopen' => 1));
                    S('fans_' . $this -> token . '_' . $this -> data['FromUserName'], NULL);
                    return array('您已进入微信墙对话模式，您下面发送的所有文字和图片信息都将会显示在大屏幕上，如需退出微信墙模式，请输入“wx#quit”', 'text');
                }
            }
            break;
        case 'Recipe': $this -> requestdata('other');
            $thisItem = M('Recipe') -> where(array('id' => $data['pid'])) -> find();
            return array(array(array($thisItem['title'], str_replace(array('&nbsp;', 'br /', '&amp;', 'gt;', 'lt;'), '', strip_tags(htmlspecialchars_decode($thisItem['infos']))), $thisItem['headpic'], C('site_url') . '/index.php?g=Wap&m=Recipe&a=index&token=' . $this -> token . '&type=' . $thisItem['type'] . '&id=' . $thisItem['id'] . 'wecha_id=' . $this -> data['FromUserName'])), 'news');
            break;
        case 'Router_config': $routerUrl = Router :: login($this -> token, $this -> data['FromUserName']);
            $thisItem = M('Router_config') -> where(array('id' => $data['pid'])) -> find();
            return array(array(array($thisItem['title'], $thisItem['info'], $thisItem['picurl'], $routerUrl)), 'news');
            break;
        case 'Schoolset': $thisItem = M('School_set_index') -> where(array('setid' => $data['pid'])) -> find();
            return array(array(array($thisItem['title'], $thisItem['info'], $thisItem['head_url'], C('site_url') . U('Wap/School/index', array('token' => $this -> token, 'wecha_id' => $this -> data['FromUserName'])))), 'news');
            break;
        default: $this -> requestdata('videonum');
            $info = M($data['module']) -> order('id desc') -> find($data['pid']);
            return array(array($info['title'], $info['keyword'], $info['musicurl'], $info['hqmusicurl']), 'music');
        }
    }else{
        if ($this -> wxuser['transfer_customer_service']){
            return array('turn on transfer_customer_service', 'transfer_customer_service');
        }
        $chaFfunction = M('Function') -> where(array('funname' => 'liaotian')) -> find();
        if(!strpos($this -> fun, 'liaotian') || !$chaFfunction['status']){
            $other = M('Other') -> where(array('token' => $this -> token)) -> find();
            if($other == false){
                return array('', 'text');
            }else{
                if(empty($other['keyword'])){
                    return array($other['info'], 'text');
                }else{
                    $img = M('Img') -> field('id,text,pic,url,title') -> limit(5) -> order('id desc') -> where(array('token' => $this -> token, 'keyword' => array('like', '%' . $other['keyword'] . '%'))) -> select();
                    if($img == false){
                        return array('无此图文信息,请提醒商家，重新设定关键词', 'text');
                    }
                    foreach($img as $keya => $infot){
                        if($infot['url'] != false){
                            if(!(strpos($infot['url'], 'http') === FALSE)){
                                $url = $this -> getFuncLink(html_entity_decode($infot['url']));
                            }else{
                                $url = $this -> getFuncLink($infot['url']);
                            }
                        }else{
                            $url = rtrim(C('site_url'), '/') . U('Wap/Index/content', array('token' => $this -> token, 'id' => $infot['id'], 'wecha_id' => $this -> data['FromUserName']));
                        }
                        $return[] = array($infot['title'], $infot['text'], $infot['pic'], $url);
                    }
                    return array($return, 'news');
                }
            }
        }
        if (!C('not_support_chat')){
            $this -> selectService();
        }
        return array($this -> chat($key), 'text');
    }
}
private function getFuncLink($u){
    $urlInfos = explode(' ', $u);
    switch ($urlInfos[0]){
    default: $url = str_replace(array('{wechat_id}', '{siteUrl}', '&amp;'), array($this -> data['FromUserName'], C('site_url'), '&'), $urlInfos[0]);
        break;
    case '刮刮卡': $Lottery = M('Lottery') -> where(array('token' => $this -> token, 'type' => 2, 'status' => 1)) -> order('id DESC') -> find();
        $url = C('site_url') . U('Wap/Guajiang/index', array('token' => $this -> token, 'wecha_id' => $this -> data['FromUserName'], 'id' => $Lottery['id']));
        break;
    case '大转盘': $Lottery = M('Lottery') -> where(array('token' => $this -> token, 'type' => 1, 'status' => 1)) -> order('id DESC') -> find();
        $url = C('site_url') . U('Wap/Lottery/index', array('token' => $this -> token, 'wecha_id' => $this -> data['FromUserName'], 'id' => $Lottery['id']));
        break;
    case '商家订单': $url = C('site_url') . '/index.php?g=Wap&m=Host&a=index&token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName'] . '&hid=' . $urlInfos[1] . '&sgssz=mp.weixin.qq.com';
        break;
    case '优惠券': $Lottery = M('Lottery') -> where(array('token' => $this -> token, 'type' => 3, 'status' => 1)) -> order('id DESC') -> find();
        $url = C('site_url') . U('Wap/Coupon/index', array('token' => $this -> token, 'wecha_id' => $this -> data['FromUserName'], 'id' => $Lottery['id']));
        break;
    case '万能表单': $url = C('site_url') . U('Wap/Selfform/index', array('token' => $this -> token, 'wecha_id' => $this -> data['FromUserName'], 'id' => $urlInfos[1]));
        break;
    case '会员卡': $url = C('site_url') . U('Wap/Card/vip', array('token' => $this -> token, 'wecha_id' => $this -> data['FromUserName']));
        break;
    case '首页': $url = rtrim(C('site_url'), '/') . '/index.php?g=Wap&m=Index&a=index&token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName'];
        break;
    case '团购': $url = rtrim(C('site_url'), '/') . '/index.php?g=Wap&m=Groupon&a=grouponIndex&token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName'];
        break;
    case '商城': $url = rtrim(C('site_url'), '/') . '/index.php?g=Wap&m=Store&a=index&token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName'];
        break;
    case '订餐': $url = rtrim(C('site_url'), '/') . '/index.php?g=Wap&m=Product&a=dining&dining=1&token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName'];
    case '外卖': $url = rtrim(C('site_url'), '/') . '/index.php?g=Wap&m=Repast&a=index&dining=1&token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName'];
        break;
        break;
    case '相册': $url = rtrim(C('site_url'), '/') . '/index.php?g=Wap&m=Photo&a=index&token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName'];
        break;
    case '网站分类': $url = C('site_url') . U('Wap/Index/lists', array('token' => $this -> token, 'wecha_id' => $this -> data['FromUserName'], 'classid' => $urlInfos[1]));
        break;
    case 'LBS信息': if ($urlInfos[1]){
            $url = C('site_url') . U('Wap/Company/map', array('token' => $this -> token, 'wecha_id' => $this -> data['FromUserName'], 'companyid' => $urlInfos[1]));
        }else{
            $url = C('site_url') . U('Wap/Company/map', array('token' => $this -> token, 'wecha_id' => $this -> data['FromUserName']));
        }
        break;
    case 'DIY宣传页': $url = C('site_url') . '/index.php/show/' . $this -> token;
        break;
    case '婚庆喜帖': $url = C('site_url') . U('Wap/Wedding/index', array('token' => $this -> token, 'wecha_id' => $this -> data['FromUserName'], 'id' => $urlInfos[1]));
        break;
    case '投票': $url = C('site_url') . U('Wap/Vote/index', array('token' => $this -> token, 'wecha_id' => $this -> data['FromUserName'], 'id' => $urlInfos[1]));
        break;
    }
    return $url;
}
private function home(){
    return $this -> shouye();
}
private function shouye($name){
    $home = M('Home') -> where(array('token' => $this -> token)) -> find();
    $this -> behaviordata('home', '', '1');
    if($home == false){
        return array('商家未做首页配置，请稍后再试', 'text');
    }else{
        $imgurl = $home['picurl'];
        if($home['apiurl'] == false){
            if (!$home['advancetpl']){
                $url = rtrim(C('site_url'), '/') . '/index.php?g=Wap&m=Index&a=index&token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName'] . '&sgssz=mp.weixin.qq.com';
            }else{
                $url = rtrim(C('site_url'), '/') . '/cms/index.php?token=' . $this -> token . '&wecha_id=' . $this -> data['FromUserName'] . '&sgssz=mp.weixin.qq.com';
            }
        }else{
            $url = $home['apiurl'];
        }
    }
    return array(array(array($home['title'], $home['info'], $imgurl, $url)), 'news');
}
private function kuaidi($data){
    $data = array_merge($data);
    $str = file_get_contents('http://www.weinxinma.com/api/index.php?m=Express&a=index&name=' . $data[0] . '&number=' . $data[1]);
    if ($str == '不支持的快递公司'){
        $str = file_get_contents('http://www.weinxinma.com/api/index.php?m=Express&a=index&name=' . $data[1] . '&number=' . $data[0]);
    }
    return $str;
}
private function langdu($data){
    $data = implode('', $data);
    $mp3url = 'http://www.apiwx.com/aaa.php?w=' . urlencode($data);
    return array(array($data, '点听收听', $mp3url, $mp3url), 'music');
}
private function jiankang($data){
    if(empty($data))return '主人，' . $this -> my . "提醒您\n正确的查询方式是:\n健康+身高,+体重\n例如：健康170,65";
    $height = $data[1] / 100;
    $weight = $data[2];
    $Broca = ($height * 100-80) * 0.7;
    $kaluli = 66 + 13.7 * $weight + 5 * $height * 100-6.8 * 25;
    $chao = $weight - $Broca;
    $zhibiao = $chao * 0.1;
    $res = round($weight / ($height * $height), 1);
    if($res < 18.5){
        $info = '您的体形属于骨感型，需要增加体重' . $chao . '公斤哦!';
        $pic = 1;
    }elseif($res < 24){
        $info = '您的体形属于圆滑型的身材，需要减少体重' . $chao . '公斤哦!';
    }elseif($res > 24){
        $info = '您的体形属于肥胖型，需要减少体重' . $chao . '公斤哦!';
    }elseif($res > 28){
        $info = '您的体形属于严重肥胖，请加强锻炼，或者使用我们推荐的减肥方案进行减肥';
    }
    return $info;
}
private function fujin($keyword){
    $keyword = implode('', $keyword);
    if($keyword == false){
        return $this -> my . "很难过,无法识别主人的指令,正确使用方法是:输入【附近+关键词】当" . $this -> my . '提醒您输入地理位置的时候就OK啦';
    }
    $data = array();
    $data['time'] = time();
    $data['token'] = $this -> _get('token');
    $data['keyword'] = $keyword;
    $data['uid'] = $this -> data['FromUserName'];
    $re = M('Nearby_user');
    $user = $re -> where(array('token' => $this -> _get('token'), 'uid' => $data['uid'])) -> find();
    if($user == false){
        $re -> data($data) -> add();
    }else{
        $id['id'] = $user['id'];
        $re -> where($id) -> save($data);
    }
    return "主人【" . $this -> my . "】已经接收到你的指令\n请发送您的地理位置给我哈";
}
private function wysw(){
    $thisItem = M('Router_config') -> where(array('token' => $this -> token)) -> find();
    return array(array(array($thisItem['title'], $thisItem['info'], $thisItem['picurl'], $routerUrl)), 'news');
}
private function recordLastRequest($key, $msgtype = 'text'){
    $rdata = array();
    $rdata['time'] = time();
    $rdata['token'] = $this -> _get('token');
    $rdata['keyword'] = $key;
    $rdata['msgtype'] = $msgtype;
    $rdata['uid'] = $this -> data['FromUserName'];
    $user_request_model = M('User_request');
    $user_request_row = $user_request_model -> where(array('token' => $this -> _get('token'), 'msgtype' => $msgtype, 'uid' => $rdata['uid'])) -> find();
    if(!$user_request_row){
        $user_request_model -> add($rdata);
    }else{
        $rid['id'] = $user_request_row['id'];
        $user_request_model -> where($rid) -> save($rdata);
    }
}
function map($x, $y){
    $transUrl = 'http://api.map.baidu.com/ag/coord/convert?from=2&to=4&x=' . $x . '&y=' . $y;
    $json = Http :: fsockopenDownload($transUrl);
    if($json == false){
        $json = file_get_contents($transUrl);
    }
    $arr = json_decode($json, true);
    $x = base64_decode($arr['x']);
    $y = base64_decode($arr['y']);
    $user_request_model = M('User_request');
    $urWhere = array('token' => $this -> _get('token'), 'msgtype' => 'text', 'uid' => $this -> data['FromUserName']);
    $urWhere['time'] = array('gt', time()-5 * 60);
    $user_request_row = $user_request_model -> where($urWhere) -> find();
    if(!(strpos($user_request_row['keyword'], '附近') === FALSE)){
        $user = M('Nearby_user') -> where(array('token' => $this -> _get('token'), 'uid' => $this -> data['FromUserName'])) -> find();
        $keyword = $user['keyword'];
        $radius = 2000;
        $map = new baiduMap($keyword, $x, $y);
        $str = $map -> echoJson();
        $array = json_decode($str);
        $map = array();
        foreach($array as $key => $vo){
            $map[] = array($vo -> title, $key, rtrim(C('site_url'), '/') . '/tpl/static/images/home.jpg', $vo -> url);
        }
        if ($map){
            return array($map, 'news');
        }else{
            $str = file_get_contents(C('site_url') . '/map.php?keyword=' . urlencode($keyword) . '&x=' . $x . '&y=' . $y);
            $array = json_decode($str);
            $map = array();
            foreach($array as $key => $vo){
                $map[] = array($vo -> title, $key, rtrim(C('site_url'), '/') . '/tpl/static/images/home.jpg', $vo -> url);
            }
            if ($map){
                return array($map, 'news');
            }else{
                return array('附近信息无法调出，请稍候再试一下（关键词' . $keyword . ',坐标：' . $x . '-' . $y . ')', 'text');
            }
        }
    }else{
        import("Home.Action.MapAction");
        $mapAction = new MapAction();
        if(!(strpos($user_request_row['keyword'], '开车去') === FALSE) || !(strpos($user_request_row['keyword'], '坐公交') === FALSE) || !(strpos($user_request_row['keyword'], '步行去') === FALSE)){
            if (!(strpos($user_request_row['keyword'], '步行去') === FALSE)){
                $companyid = str_replace('步行去', '', $user_request_row['keyword']);
                if(!$companyid){
                    $companyid = 1;
                }
                return $mapAction -> walk($x, $y, $companyid);
            }
            if (!(strpos($user_request_row['keyword'], '开车去') === FALSE)){
                $companyid = str_replace('开车去', '', $user_request_row['keyword']);
                if(!$companyid){
                    $companyid = 1;
                }
                return $mapAction -> drive($x, $y, $companyid);
            }
            if (!(strpos($user_request_row['keyword'], '坐公交') === FALSE)){
                $companyid = str_replace('坐公交', '', $user_request_row['keyword']);
                if(!$companyid){
                    $companyid = 1;
                }
                return $mapAction -> bus($x, $y, $companyid);
            }
        }else{
            switch ($user_request_row['keyword']){
            default: return $this -> companyMap();
                break;
            case '最近的': return $mapAction -> nearest($x, $y);
                break;
            }
        }
    }
}
private function suanming($name){
    $name = implode('', $name);
    if(empty($name)){
        return '主人' . $this -> my . '提醒您正确的使用方法是[算命+姓名]';
    }
    $data = require_once(CONF_PATH . 'suanming.php');
    $num = mt_rand(0, 80);
    return $name . "\n" . trim($data[$num]);
}
private function yinle($name){
    $name = implode('', $name);
    $url = 'http://httop1.duapp.com/mp3.php?musicName=' . $name;
    $str = file_get_contents($url);
    $obj = json_decode($str);
    if (!strpos($obj -> url, '.mp3') && !strpos($obj -> url, '.MP3')){
        return array('找不到相应的音乐', 'text');
    }
    return array(array($name, $name, $obj -> url, $obj -> url), 'music');
}
function geci($n){
    $name = implode('', $n);
    @$str = 'http://www.lexun.cc/pgicms_api/api.php?key=free&appid=0&msg=' . urlencode('歌词' . $name);
    $json = json_decode(file_get_contents($str));
    $str = str_replace('{br}', "\n", $json -> content);
    return str_replace('mzxing_com', 'pigcms', $str);
}
private function yuming($n){
    $name = implode('', $n);
    @$str = 'http://www.lexun.cc/pgicms_api/api.php?key=free&appid=0&msg=' . urlencode('域名' . $name);
    $json = json_decode(file_get_contents($str));
    $str = str_replace('{br}', "\n", $json -> content);
    return str_replace('mzxing_com', 'pigcms', $str);
}
function tianqi($n){
    $name = implode('', $n);
    $url = 'http://api.map.baidu.com/telematics/v3/weather?location=' . urlencode($name) . '&output=json&ak=5slgyqGDENN7Sy7pw29IUvrZ';
    $weatherJson = file_get_contents($url);
    $weather = json_decode($weatherJson, true);
    $re = $weather['error'];
    if ($re == 0){
        $map = array ();
        $map1 = $weather['results']['0']['weather_data'];
        foreach ($map1 as $key => $vo){
            $map [] = array ($vo['date'] . $vo['weather'] . $vo['wind'] . $vo['temperature'], '', $vo['dayPictureUrl'], '') ;
        }
        $arr1 = array($weather['date'] . $weather['results']['0']['currentCity'] . "天气预报", '', '', '');
        array_unshift($map, $arr1);
        return array ($map, 'news') ;
    }else{
        $map = "亲，正确的输入方式是：城市+天气 例如：温州天气";
        return $map;
    }
}
private function shouji($n){
    $name = implode('', $n);
    @$str = 'http://www.lexun.cc/pgicms_api/api.php?key=free&appid=0&msg=' . urlencode('归属' . $name);
    $json = json_decode(file_get_contents($str));
    $str = str_replace('{br}', "\n", $json -> content);
    $str = str_replace('菲菲', $this -> my, str_replace('提示：', $this -> my . '提醒您:', str_replace('{br}', "\n", $str)));
    return $str;
}
private function shenfenzheng($n){
    $n = implode('', $n);
    if(count($n) > 1){
        $this -> error_msg($n) ;
        return false;
    };
    $str1 = file_get_contents('http://www.youdao.com/smartresult-xml/search.s?jsFlag=true&type=id&q=' . $n);
    $array = explode(':', $str1);
    $array[2] = rtrim($array[4], ",'gender'");
    $str = trim($array[3], ",'birthday'");
    if($str !== iconv('UTF-8', 'UTF-8', iconv('UTF-8', 'UTF-8', $str))) $str = iconv('GBK', 'UTF-8', $str);
    $str = '【身份证】 ' . $n . "\n" . '【地址】' . $str . "\n 【该身份证主人的生日】" . str_replace("'", '', $array[2]);
    return $str;
}
private function gongjiao($data){
    $data = array_merge($data);
    if(count($data) < 2){
        $this -> error_msg() ;
        return false;
    };
    $json = file_get_contents("http://www.twototwo.cn/bus/Service.aspx?format=json&action=QueryBusByLine&key=5da453b2-b154-4ef1-8f36-806ee58580f6&zone=" . $data[0] . "&line=" . $data[1]);
    $data = json_decode($json);
    $xianlu = $data -> Response -> Head -> XianLu;
    $xdata = get_object_vars($xianlu -> ShouMoBanShiJian);
    $xdata = $xdata['#cdata-section'];
    $piaojia = get_object_vars($xianlu -> PiaoJia);
    $xdata = $xdata . ' -- ' . $piaojia['#cdata-section'];
    $main = $data -> Response -> Main -> Item -> FangXiang;
    $xianlu = $main[0] -> ZhanDian;
    $str = "【本公交途经】\n";
    for($i = 0;$i < count($xianlu);$i++){
        $str .= "\n" . trim($xianlu[$i] -> ZhanDianMingCheng);
    }
    return $str;
}
private function huoche($data, $time = ''){
    $data = array_merge($data);
    $data[2] = date('Y', time()) . $time;
    if(count($data) != 3){
        $this -> error_msg($data[0] . '至' . $data[1]) ;
        return false;
    };
    $time = empty($time)?date('Y-m-d', time()):date('Y-', time()) . $time;
    $json = file_get_contents("http://www.twototwo.cn/train/Service.aspx?format=json&action=QueryTrainScheduleByTwoStation&key=5da453b2-b154-4ef1-8f36-806ee58580f6&startStation=" . $data[0] . "&arriveStation=" . $data[1] . "&startDate=" . $data[2] . "&ignoreStartDate=0&like=1&more=0");
    if($json){
        $data = json_decode($json);
        $main = $data -> Response -> Main -> Item;
        if(count($main) > 10){
            $conunt = 10;
        }else{
            $conunt = count($main);
        }
        for($i = 0;$i < $conunt;$i++){
            $str .= "\n 【编号】" . $main[$i] -> CheCiMingCheng . "\n 【类型】" . $main[$i] -> CheXingMingCheng . "\n【发车时间】:　" . $time . ' ' . $main[$i] -> FaShi . "\n【耗时】" . $main[$i] -> LiShi . ' 小时';
            $str .= "\n----------------------";
        }
    }else{
        $str = '没有找到 ' . $name . ' 至 ' . $toname . ' 的列车';
    }
    return $str;
}
private function fanyi($name){
    $name = array_merge($name);
    $url = "http://openapi.baidu.com/public/2.0/bmt/translate?client_id=kylV2rmog90fKNbMTuVsL934&q=" . $name[0] . "&from=auto&to=auto";
    $json = Http :: fsockopenDownload($url);
    if($json == false){
        $json = file_get_contents($url);
    }
    $json = json_decode($json);
    $str = $json -> trans_result;
    if($str[0] -> dst == false)return $this -> error_msg($name[0]);
    $mp3url = 'http://www.apiwx.com/aaa.php?w=' . $str[0] -> dst;
    if (strpos($mp3url, ' ')){
        return array($name[0] . ':' . $str[0] -> dst, 'text');
    }else{
        return array(array($str[0] -> src, $str[0] -> dst, $mp3url, $mp3url), 'music');
    }
}
private function caipiao($name){
    $name = array_merge($name);
    $url = "http://api2.sinaapp.com/search/lottery/?appkey=0020130430&appsecert=fa6095e113cd28fd&reqtype=text&keyword=" . $name[0];
    $json = Http :: fsockopenDownload($url);
    if($json == false){
        $json = file_get_contents($url);
    }
    $json = json_decode($json, true);
    $str = $json['text']['content'];
    return $str;
}
private function mengjian($name){
    $name = array_merge($name);
    if(empty($name))return '周公睡着了,无法解此梦,这年头神仙也偷懒';
    $data = M('Dream') -> field('content') -> where("`title` LIKE '%" . $name[0] . "%'") -> find();
    if(empty($data))return '周公无法解此梦';
    return $data['content'];
}
function gupiao($name){
    $url = "http://api2.sinaapp.com/search/stock/?appkey=0020130430&appsecert=fa6095e113cd28fd&reqtype=text&keyword=" . $name[1];
    $json = Http :: fsockopenDownload($url);
    if($json == false){
        $json = file_get_contents($url);
    }
    $json = json_decode($json, true);
    $str = $json['text']['content'];
    return $str;
}
function getmp3($data){
    $obj = new getYu();
    $ContentString = $obj -> getGoogleTTS($data);
    $randfilestring = 'mp3/' . time() . '_' . sprintf('%02d', rand(0, 999)) . ".mp3";
    return rtrim(C('site_url'), '/') . $randfilestring;
}
function xiaohua(){
    $name = implode('', $n);
    @$str = 'http://api.bd001.com/iMicms_com/api.php?key=free&appid=0&msg=' . urlencode ('笑话' . $name);
    $json = json_decode (file_get_contents ($str));
    $str = str_replace ('{br}', "\n", $json -> content);
    return str_replace(array('mzxing_com', '提示：按分类看笑话请发送“笑话分类”'), array('138wo', ''), $str);
}
private function liaotian($name){
    $name = array_merge($name);
    $this -> chat($name[0]);
}
private function chat($name){
    $function = M('Function') -> where(array('funname' => 'liaotian')) -> find();
    if (!$function['status']){
        return '';
    }
    $this -> requestdata('textnum');
    $check = $this -> user('connectnum');
    if ($check['connectnum'] != 1){
        return C('connectout');
    }
    if (!(strpos($name, '你是') === false)){
        return '咳咳，我是只能微信机器人';
    }
    if ($name == "你叫什么" || $name == "你是谁"){
        return '咳咳，我是聪明与智慧并存的美女，主人你可以叫我' . $this -> my . ',人家刚交男朋友,你不可追我啦';
    }elseif ($name == "你父母是谁" || $name == "你爸爸是谁" || $name == "你妈妈是谁"){
        return '主人,' . $this -> my . '是微我创造的,所以他们是我的父母,不过主人我属于你的';
    }elseif ($name == '糗事'){
        $name = '笑话';
    }elseif ($name == '网站' || $name == '官网' || $name == '网址' || $name == '3g网址'){
        return "【" . C('site_name') . "】\n" . C('site_name') . "\n【" . C('site_name') . "服务宗旨】\n化繁为简,让菜鸟也能使用强大的系统!";
    }
    $str = 'http://api.bd001.com/iMicms_com/api.php?key=free&appid=0&msg=' . urlencode ($name);
    $json = Http :: fsockopenDownload($str);
    if ($json == false){
        $json = file_get_contents($str);
    }
    $json = json_decode($json, true);
    $str = str_replace('菲菲', $this -> my, str_replace('提示：', $this -> my . '提醒您:', str_replace('{br}', "\n", $json['content'])));
    return str_replace('138wo_com', '138wo', $str);
}
private function fistMe($data){
    if('event' == $data['MsgType'] && 'subscribe' == $data['Event']){
        return $this -> help();
    }
}
private function help(){
    $this -> behaviordata('help', '', '1');
    $data = M('Areply') -> where(array('token' => $this -> token)) -> find();
    return array(preg_replace("/(\015\012)|(\015)|(\012)/", "\n", $data['content']), 'text');
}
private function error_msg($data){
    return '没有找到' . $data . '相关的数据';
}
private function user($action, $keyword = ''){
    $user = M('Wxuser') -> field('uid') -> where(array('token' => $this -> token)) -> find();
    $usersdata = M('Users');
    $dataarray = array('id' => $user['uid']);
    $users = $usersdata -> field('gid,diynum,connectnum,activitynum,viptime') -> where(array('id' => $user['uid'])) -> find();
    $group = M('User_group') -> where(array('id' => $users['gid'])) -> find();
    if($users['diynum'] < $group['diynum']){
        $data['diynum'] = 1;
        if($action == 'diynum'){
        }
    }
    if($users['connectnum'] < $group['connectnum']){
        $data['connectnum'] = 1;
        if($action == 'connectnum'){
            $usersdata -> where($dataarray) -> setInc('connectnum');
        }
    }
    if($users['viptime'] > time()){
        $data['viptime'] = 1;
    }
    return $data;
}
private function requestdata($field){
    $data['year'] = date('Y');
    $data['month'] = date('m');
    $data['day'] = date('d');
    $data['token'] = $this -> token;
    $mysql = M('Requestdata');
    $check = $mysql -> field('id') -> where($data) -> find();
    if($check == false){
        $data['time'] = time();
        $data[$field] = 1;
        $mysql -> add($data);
    }else{
        $mysql -> where($data) -> setInc($field);
    }
}
private function behaviordata($field, $id = '', $type = ''){
    $data['date'] = date('Y-m-d', time());
    $data['token'] = $this -> token;
    $data['openid'] = $this -> data['FromUserName'];
    $data['keyword'] = $this -> data['Content'];
    if (!$data['keyword']){
        $data['keyword'] = '用户关注';
    }
    $data['model'] = $field;
    if($id != false){
        $data['fid'] = $id;
    }
    if($type != false){
        $data['type'] = 1;
    }
    $mysql = M('Behavior');
    $check = $mysql -> field('id') -> where($data) -> find();
    $this -> updateMemberEndTime($data['openid']);
    if($check == false){
        $data['num'] = 1;
        $data['enddate'] = time();
        $mysql -> add($data);
    }else{
        $mysql -> where($data) -> setInc('num');
    }
}
private function updateMemberEndTime($openid){
    $mysql = M('Wehcat_member_enddate');
    $id = $mysql -> field('id') -> where(array('openid' => $openid)) -> find();
    $data['enddate'] = time();
    $data['openid'] = $openid;
    $data['token'] = $this -> token;
    if($id == false){
        $mysql -> add($data);
    }else{
        $data['id'] = $id['id'];
        $mysql -> save($data);
    }
}
private function selectService(){
    if (!C('without_chat')){
        $this -> behaviordata('chat', '');
        $sepTime = 30 * 60;
        $nowTime = time();
        $time = $nowTime - $sepTime;
        $where['token'] = $this -> token;
        $serviceUserWhere = array('token' => $this -> token, 'status' => 0);
        $serviceUserWhere['endJoinDate'] = array('gt', $time);
        $serviceUser = M('Service_user') -> field('id') -> where($serviceUserWhere) -> select();
        if($serviceUser != false){
            $list = M('wechat_group_list') -> field('id') -> where(array('openid' => $this -> data['FromUserName'], 'token' => $this -> token)) -> find();
            if($list == false){
                $this -> adddUserInfo();
            }
            $serviceJoinDate = M('wehcat_member_enddate') -> field('id,uid,joinUpDate') -> where(array('token' => $this -> token, 'openid' => $this -> data['FromUserName'])) -> find();
            if($serviceJoinDate['uid'] == false || $nowTime - $serviceJoinDate['joinUpDate'] > $sepTime){
                foreach($serviceUser as $key => $users){
                    $user[] = $users['id'];
                }
                if(count($user) == 1){
                    $id = $user[0];
                }else{
                    $rand = mt_rand(0, count($user)-1);
                    $id = $user[$rand];
                }
                $where['id'] = $serviceJoinDate['id'];
                $where['uid'] = $id;
                M('wehcat_member_enddate') -> data($where) -> save();
            }else{
                exit();
            }
        }
    }
}
private function baike($name){
    $name = implode('', $name);
    if($name == 'pigcms'){
        return '世界上最牛B的微信营销系统，两天前被腾讯收购，当然这只是一个笑话';
    }
    $name_gbk = iconv('utf-8', 'gbk', $name);
    $encode = urlencode($name_gbk);
    $url = 'http://baike.baidu.com/list-php/dispose/searchword.php?word=' . $encode . '&pic=1';
    $get_contents = $this -> httpGetRequest_baike($url);
    $get_contents_gbk = iconv('gbk', 'utf-8', $get_contents);
    preg_match("/URL=(\S+)'>/s", $get_contents_gbk, $out);
    $real_link = 'http://baike.baidu.com' . $out[1];
    $get_contents2 = $this -> httpGetRequest_baike($real_link);
    preg_match('#"Description"\scontent="(.+?)"\s\/\>#is', $get_contents2, $matchresult);
    if (isset($matchresult[1]) && $matchresult[1] != ""){
        return htmlspecialchars_decode($matchresult[1]);
    }else{
        return "抱歉，没有找到与“" . $name . "”相关的百科结果。";
    }
}
private function getRecognition($id){
    $GetDb = D('Recognition');
    $data = $GetDb -> field('keyword') -> where(array('id' => $id, 'status' => 0)) -> find();
    if($data != false){
        $GetDb -> where(array('id' => $id)) -> setInc('attention_num');
        return $data['keyword'];
    }else{
        return false;
    }
}
private function api_notice_increment($url, $data){
    $ch = curl_init();
    $header = "Accept-Charset: utf-8";
    if (strpos($url, '?')){
        $url .= '&token=' . $this -> token;
    }else{
        $url .= '?token=' . $this -> token;
    }
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $tmpInfo = curl_exec($ch);
    if (curl_errno($ch)){
        return false;
    }else{
        return $tmpInfo;
    }
}
private function httpGetRequest_baike($url){
    $headers = array("User-Agent: Mozilla/5.0 (Windows NT 5.1; rv:14.0) Gecko/20100101 Firefox/14.0.1", "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8", "Accept-Language: en-us,en;q=0.5", "Referer: http://www.baidu.com/");
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $output = curl_exec($ch);
    curl_close($ch);
    if ($output === FALSE){
        return "cURL Error: " . curl_error($ch);
    }
    return $output;
}
private function adddUserInfo(){
    $access_token = $this -> _getAccessToken();
    $url2 = 'https://api.weixin.qq.com/cgi-bin/user/info?openid=' . $this -> data['FromUserName'] . '&access_token=' . $access_token;
    $classData = json_decode($this -> curlGet($url2));
    $db = M('wechat_group_list');
    $data['token'] = $this -> token;
    $data['openid'] = $this -> data['FromUserName'];
    $item = $db -> where(array('token' => $this -> token, 'openid' => $this -> data['FromUserName'])) -> find();
    $data['nickname'] = str_replace("'", '', $classData -> nickname);
    $data['sex'] = $classData -> sex;
    $data['city'] = $classData -> city;
    $data['province'] = $classData -> province;
    $data['headimgurl'] = $classData -> headimgurl;
    $data['subscribe_time'] = $classData -> subscribe_time;
    $url3 = 'https://api.weixin.qq.com/cgi-bin/groups/getid?access_token=' . $access_token;
    $json2 = json_decode($this -> curlGet($url3, 'post', '{"openid":"' . $data['openid'] . '"}'));
    $data['g_id'] = $json -> groupid;
    if (!$data['g_id']){
        $data['g_id'] = 0;
    }
    if (!$item){
        $db -> data($data) -> add();
    }else{
        $db -> where(array('token' => $this -> token, 'openid' => $this -> data['FromUserName'])) -> save($data);
    }
}
private function _getAccessToken(){
    $where = array('token' => $this -> token);
    $this -> thisWxUser = M('Wxuser') -> where($where) -> find();
    $url_get = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=' . $this -> thisWxUser['appid'] . '&secret=' . $this -> thisWxUser['appsecret'];
    $json = json_decode($this -> curlGet($url_get));
    if (!$json -> errmsg){
    }else{
        $this -> error('获取access_token发生错误：错误代码' . $json -> errcode . ',微信返回错误信息：' . $json -> errmsg);
    }
    return $json -> access_token;
}
private function curlGet($url, $method = 'get', $data = ''){
    $ch = curl_init();
    $header = "Accept-Charset: utf-8";
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, strtoupper($method));
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $temp = curl_exec($ch);
    return $temp;
}
private function get_tags($title, $num = 10){
    vendor('Pscws.Pscws4', '', '.class.php');
    $pscws = new PSCWS4();
    $pscws -> set_dict(CONF_PATH . 'etc/dict.utf8.xdb');
    $pscws -> set_rule(CONF_PATH . 'etc/rules.utf8.ini');
    $pscws -> set_ignore(true);
    $pscws -> send_text($title);
    $words = $pscws -> get_tops($num);
    $pscws -> close();
    $tags = array();
    foreach ($words as $val){
        $tags[] = $val['word'];
    }
    return implode(',', $tags);
}
public function handleIntro($str){
    $search = array('&quot;', '&nbsp;');
    $replace = array('"', '');
    return str_replace($search, $replace, $str);
}
}
?>