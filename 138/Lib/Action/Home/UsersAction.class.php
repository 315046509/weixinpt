<?php
 class UsersAction extends BaseAction{
    public function index(){
        header("Location: /");
    }
    public function companylogin(){
        $dbcom = D('Company');
        $where['username'] = $this -> _post('username', 'trim');
        $cid = $where['id'] = $this -> _post('cid', 'intval');
        $k = $this -> _post('k', 'trim, htmlspecialchars');
        if (empty($k) || $k != md5($where['id'] . $where['username'])){
            $this -> error('帐号密码错误', U('Home/Index/clogin', array('cid' => $cid, 'k' => $k)));
        }
        $pwd = $this -> _post('password', 'trim,md5');
        $company = $dbcom -> where($where) -> find();
        if($company && ($pwd === $company['password'])){
            if ($wxuser = D('Wxuser') -> where(array('token' => $company['token'])) -> find()){
                $uid = $wxuser['uid'];
                $db = D('Users');
                $res = $db -> where(array('id' => $uid)) -> find();
            }else{
                $this -> error('帐号密码错误', U('Home/Index/clogin', array('cid' => $cid, 'k' => $k)));
            }
            session('companyk', $k);
            session('companyLogin', 1);
            session('companyid', $company['id']);
            session('token', $company['token']);
            session('uid', $res['id']);
            session('gid', $res['gid']);
            session('uname', $res['username']);
            $info = M('user_group') -> find($res['gid']);
            session('diynum', $res['diynum']);
            session('connectnum', $res['connectnum']);
            session('activitynum', $res['activitynum']);
            session('viptime', $res['viptime']);
            session('gname', $info['name']);
            $now = time();
            $month = date('m', $now);
            if($month != $res['lastloginmonth'] && $res['lastloginmonth'] != 0){
                $data['id'] = $res['id'];
                $data['imgcount'] = 0;
                $data['diynum'] = 0;
                $data['textcount'] = 0;
                $data['musiccount'] = 0;
                $data['connectnum'] = 0;
                $data['activitynum'] = 0;
                $db -> save($data);
                session('diynum', 0);
                session('connectnum', 0);
                session('activitynum', 0);
            }
            $db -> where(array('id' => $res['id'])) -> save(array('lasttime' => $now, 'lastloginmonth' => $month, 'lastip' => $_SERVER['REMOTE_ADDR']));
            $this -> success('登录成功', U('User/Repast/index', array('cid' => $cid)));
        }else{
            $this -> error('帐号密码错误', U('Home/Index/clogin', array('cid' => $cid, 'k' => $k)));
        }
    }
    public function companyLogout(){
        $cid = session('companyid');
        $k = session('companyk');
        session(null);
        session_destroy();
        unset($_SESSION);
        if(session('?' . C('USER_AUTH_KEY'))){
            session(C('USER_AUTH_KEY'), null);
            redirect(U('Home/Index/clogin', array('cid' => $cid, 'k' => $k)));
        }else{
            $this -> success('已经登出！', U('Home/Index/clogin', array('cid' => $cid, 'k' => $k)));
        }
    }
    public function checklogin(){
        $db = D('Users');
        $where['username'] = $this -> _post('username', 'trim');
        $pwd = $this -> _post('password', 'trim,md5');
        $res = $db -> where($where) -> find();
        if($res && ($pwd === $res['password'])){
            if($res['status'] == 0){
                $this -> error('请联系在线客户，为你人工审核帐号');
                exit;
            }
            session('uid', $res['id']);
            session('gid', $res['gid']);
            session('uname', $res['username']);
            $info = M('user_group') -> find($res['gid']);
            session('diynum', $res['diynum']);
            session('connectnum', $res['connectnum']);
            session('activitynum', $res['activitynum']);
            session('viptime', $res['viptime']);
            session('gname', $info['name']);
            $now = time();
            $month = date('m', $now);
            if($month != $res['lastloginmonth'] && $res['lastloginmonth'] != 0){
                $data['id'] = $res['id'];
                $data['imgcount'] = 0;
                $data['diynum'] = 0;
                $data['textcount'] = 0;
                $data['musiccount'] = 0;
                $data['connectnum'] = 0;
                $data['activitynum'] = 0;
                $db -> save($data);
                session('diynum', 0);
                session('connectnum', 0);
                session('activitynum', 0);
            }
            $db -> where(array('id' => $res['id'])) -> save(array('lasttime' => $now, 'lastloginmonth' => $month, 'lastip' => $_SERVER['REMOTE_ADDR']));
            $this -> success('登录成功', U('User/Index/index'));
        }else{
            $this -> error('帐号密码错误', U('Index/index'));
        }
    }
    function randStr($randLength){
        $randLength = intval($randLength);
        $chars = 'abcdefghjkmnpqrstuvwxyz';
        $len = strlen($chars);
        $randStr = '';
        for ($i = 0;$i < $randLength;$i++){
            $randStr .= $chars[rand(0, $len-1)];
        }
        return $randStr;
    }
    public function checkreg(){
        $db = D('Users');
        $info = M('User_group') -> find(1);
        if (isset($_POST['mp'])){
            if (!preg_match('/^13[0-9]{9}$|^15[0-9]{9}$|^18[0-9]{9}$/', trim($_POST['mp']))){
                $this -> error('手机号填写不正确', U('Index/reg'));
            }
        }
        if ($this -> isAgent){
            $_POST['agentid'] = $this -> thisAgent['id'];
        }
        if (isset($_POST['invitecode'])){
            $inviteCode = $this -> _post('invitecode');
            if ($inviteCode && !ctype_alpha($inviteCode)){
                exit('invitecode colud not include other letter');
            }
            $inviter = $db -> where(array('invitecode' => $inviteCode)) -> find();
            $_POST['inviter'] = intval($inviter['id']);
        }else{
            $_POST['inviter'] = 0;
        }
        $_POST['invitecode'] = $this -> randStr(6);
        if($db -> create()){
            $id = $db -> add();
            if($id){
                if ($this -> isAgent){
                    M('Agent') -> where(array('id' => $this -> thisAgent['id'])) -> setInc('usercount');
                }
                if($this -> reg_needCheck){
                    $gid = $this -> minGroupid;
                    $this -> success('注册成功,请联系在线客服审核帐号', U('User/Index/index'));
                    exit;
                }else{
                    $viptime = time() + intval($this -> reg_validDays) * 24 * 3600;
                    $gid = $this -> minGroupid;
                    if ($this -> reg_groupid){
                        $gid = intval($this -> reg_groupid);
                    }
                    $db -> where(array('id' => $id)) -> save(array('viptime' => $viptime, 'status' => 1, 'gid' => $gid));
                }
                session('uid', $id);
                session('gid', $gid);
                session('uname', $_POST['username']);
                session('diynum', 0);
                session('connectnum', 0);
                session('activitynum', 0);
                session('gname', $info['name']);
                $this -> success('注册成功', U('User/Index/index'));
            }else{
                $this -> error('注册失败', U('Index/reg'));
            }
        }else{
            $this -> error($db -> getError(), U('Index/reg'));
        }
    }
    public function checkpwd(){
        $where['username'] = $this -> _post('username');
        $where['email'] = $this -> _post('email');
        $db = D('Users');
        $list = $db -> where($where) -> find();
        if($list == false) $this -> error('邮箱和帐号不正确', U('Index/regpwd'));
        $smtpserver = C('email_server');
        $port = C('email_port');
        $smtpuser = C('email_user');
        $smtppwd = C('email_pwd');
        $mailtype = "TXT";
        $sender = C('email_user');
        $smtp = new Smtp($smtpserver, $port, true, $smtpuser, $smtppwd, $sender);
        $to = $list['email'];
        $subject = C('pwd_email_title');
        $code = C('site_url') . U('Index/resetpwd', array('uid' => $list['id'], 'code' => md5($list['id'] . $list['password'] . $list['email']), 'resettime' => time()));
        $fetchcontent = C('pwd_email_content');
        $fetchcontent = str_replace('{username}', $where['username'], $fetchcontent);
        $fetchcontent = str_replace('{time}', date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']), $fetchcontent);
        $fetchcontent = str_replace('{code}', $code, $fetchcontent);
        $body = $fetchcontent;
        $send = $smtp -> sendmail($to, $sender, $subject, $body, $mailtype);
        $this -> success('请访问你的邮箱 ' . $list['email'] . ' 验证邮箱后登录!<br/>');
    }
    public function resetpwd(){
        $where['id'] = $this -> _post('uid', 'intval');
        $where['password'] = $this -> _post('password', 'md5');
        if(M('Users') -> save($where)){
            $this -> success('修改成功，请登录！', U('Index/index'));
        }else{
            $this -> error('密码修改失败！', U('Index/index'));
        }
    }
}
?>