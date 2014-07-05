<?php
class HostAction extends BaseAction{
    public function index(){
        $agent = $_SERVER['HTTP_USER_AGENT'];
        if(!strpos($agent, "icroMessenger")){
        }
        $token = $this -> _get('token');
        $hid = $this -> _get('hid');
        $where = array('token' => $token, 'hid' => $hid);
        $list_add = M('Host_list_add') -> where($where) -> select();
        $hostset = M('Host') -> where(array('token' => $token, 'id' => $hid)) -> find();
        $this -> assign('list', $list_add);
        $company_db = M('Company');
        $thisCompany = $company_db -> where(array('token' => $token, 'isbranch' => 0)) -> find();
        $hostset['address'] = $thisCompany['address'];
        $this -> assign('set', $hostset);
        $this -> display();
    }
    public function online($display = 1){
        $agent = $_SERVER['HTTP_USER_AGENT'];
        if(!strpos($agent, "icroMessenger")){
        }
        $token = $this -> _get('token');
        if(empty($token)) $this -> error('非法操作');
        $where = array('token' => $token);
        $data = M('Host');
        $count = $data -> where($where) -> count();
        $Page = new Page($count, 7);
        $show = $Page -> show();
        $list = $data -> where($where) -> limit($Page -> firstRow . ',' . $Page -> listRows) -> select();
        $this -> assign('list', $list);
        $this -> assign('show', $show);
        $hid = $this -> _get('hid');
        $hostset = M('Host') -> where(array('token' => $token, 'id' => $hid)) -> find();
        $this -> assign('set', $hostset);
        if ($display){
            $this -> display();
        }
    }
    public function companyDetail(){
        $this -> online(0);
        $this -> display();
    }
    public function lists(){
        $agent = $_SERVER['HTTP_USER_AGENT'];
        if(!strpos($agent, "MicroMessenger")){
        }
        $id = $this -> _get('id');
        $token = $this -> _get('token');
        $hid = $this -> _get('hid');
        $wecha_id = $this -> _get('wecha_id');
        $userinfo = M('userinfo') -> where(array('wecha_id' => $wecha_id, 'token' => $token)) -> find();
        $host = M('Host') -> where(array('id' => $hid, 'token' => $token)) -> find();
        $where = array('id' => $id, 'token' => $token);
        $types = M('Host_list_add') -> where($where) -> find();
        $types['picurl'] = str_replace('&amp;', '&', $types['picurl']);
        $this -> assign('types', $types);
        $save_monery = $types['price'] - $types['yhprice'];
        $this -> assign('userinfo', $userinfo);
        $this -> assign('saves', $save_monery);
        $this -> assign('host', $host);
        $this -> display();
    }
    public function book(){
        $agent = $_SERVER['HTTP_USER_AGENT'];
        if(!strpos($agent, "MicroMessenger")){
            echo '此功能只能在微信浏览器中使用';
            exit;
        }
        if($_POST['action'] == 'book'){
            $data['wecha_id'] = $this -> _post('wecha_id');
            $data['book_people'] = $this -> _post('truename');
            $data['remarks'] = $this -> _post('remarks');
            $data['tel'] = $this -> _post('tel');
            $data['book_num'] = $this -> _post('nums');
            $data['book_time'] = strtotime($this -> _post('dateline'));
            $data['timepart'] = $this -> _post('timepart');
            $id = $this -> _post('id');
            $data['room_type'] = $this -> _post('roomtype');
            $data['order_status'] = 3 ;
            $data['hid'] = $this -> _get('hid');
            $data['token'] = $this -> _get('token');
            $price = M('Host_list_add') -> where(array('id' => $id, 'token' => $data['token'], 'hid' => $data['hid'])) -> find();
            $data['price'] = $price['yhprice'] * $data['book_num'];
            $order = M('Host_order') -> data($data) -> add();
            if($order){
                $content = "预订人：" . $data['book_people'] . "\r\n电话：" . $data['tel'] . "\r\n订单类型：" . $data['room_type'] . "\r\n预定日期：" . date('Y-m-d', $data['book_time']) . "\r\n预定时间：" . $data['timepart'] . "\r\n单价：" . $price['yhprice'] . "元\r\n数量：" . $data['book_num'] . "\r\n总价：" . $data['price'] . "元\r\n备注：" . $data['remarks'] ;
                $info = M('weiwosms') -> where(array('token' => $this -> _get('token'))) -> find();
                $phone = $info['phone'];
                $user = $info['name'];
                $pass = md5($info['password']);
                $smsstatus = $info['dingdan'];
                if ($smsstatus == 1){
                    if ($content){
                        $smsrs = file_get_contents('http://api.smsbao.com/sms?u=' . $user . '&p=' . $pass . '&m=' . $phone . '&c=' . urlencode($content));
                    }
                }
                $info = M('weiwoemail') -> where(array('token' => $this -> _get('token'))) -> find();
                $emailstatus = $info['dingdan'];
                $emailreceive = $info['receive'];
                if($info['type'] == 1){
                    $emailsmtpserver = $info['smtpserver'];
                    $emailport = $info['port'];
                    $emailsend = $info['name'];
                    $emailpassword = $info['password'];
                }else{
                    $emailsmtpserver = C('email_server');
                    $emailport = C('email_port');
                    $emailsend = C('email_user');
                    $emailpassword = C('email_pwd');
                }
                $emailuser = explode('@', $emailsend);
                $emailuser = $emailuser[0];
                if ($emailstatus == 1){
                    if ($content){
                        date_default_timezone_set('PRC');
                        require("class.phpmailer.php");
                        $mail = new PHPMailer();
                        $mail -> IsSMTP();
                        $mail -> Host = "$emailsmtpserver";
                        $mail -> SMTPAuth = true;
                        $mail -> Username = "$emailuser";
                        $mail -> Password = "$emailpassword";
                        $mail -> From = $emailsend;
                        $mail -> FromName = C('site_name');
                        $mail -> AddAddress("$emailreceive", "商户");
                        $mail -> AddReplyTo($emailsend, "Information");
                        $mail -> WordWrap = 50;
                        $mail -> IsHTML(false);
                        $mail -> Subject = '您有新的订单';
                        $mail -> Body = $content;
                        $mail -> AltBody = "";
                        if(!$mail -> Send()){
                        }
                    }
                }
                echo'{"success":1,"msg":"恭喜,预定成功。"}';
            }else{
                echo'{"success":0,"msg":"请从新预定。"}';
            }
            exit;
        }
    }
}
?>