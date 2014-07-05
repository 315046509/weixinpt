<?php
class AlipaytypeAction extends BaseAction{
    public $token;
    public $wecha_id;
    public $alipayConfig;
    public function __construct(){
        $this -> token = $this -> _get('token');
        $this -> wecha_id = $this -> _get('wecha_id');
        if (!$this -> token){
            $product_cart_model = M('product_cart');
            $out_trade_no = $this -> _get('out_trade_no');
            $order = $product_cart_model -> where(array('orderid' => $out_trade_no)) -> find();
            if (!$order){
                $order = $product_cart_model -> where(array('id' => intval($this -> _get('out_trade_no')))) -> find();
            }
            $this -> token = $order['token'];
        }
        $alipay_config_db = M('Alipay_config');
        $this -> alipayConfig = $alipay_config_db -> where(array('token' => $this -> token)) -> find();
    }
    public function pay(){
        $price = $_GET['price'];
        $orderName = $_GET['orderName'];
        if (!$orderName){
            $orderName = microtime();
        }
        $orderid = $_GET['orderid'];
        if (!$orderid){
            $orderid = $_GET['single_orderid'];
        }
        $alipayConfig = $this -> alipayConfig;
        if(!$price)exit('必须有价格才能支付');
        import("@.ORG.Alipay.AlipaySubmit");
        $payment_type = "1";
        $notify_url = C('site_url') . '/index.php?g=Wap&m=Alipaytype&a=notify_url';
        $return_url = C('site_url') . '/index.php?g=Wap&m=Alipaytype&a=return_url&token=' . $_GET['token'] . '&wecha_id=' . $_GET['wecha_id'] . '&from=' . $_GET['from'];
        $seller_email = trim($alipayConfig['name']);
        $out_trade_no = $orderid;
        $subject = $orderName;
        $total_fee = floatval($price);
        $body = $orderName;
        $show_url = C('site_url') . U('Home/Index/price');
        $anti_phishing_key = "";
        $exter_invoke_ip = "";
        $body = $subject;
        $show_url = rtrim(C('site_url'), '/');
        $parameter = array("service" => "create_direct_pay_by_user", "partner" => trim($alipayConfig['pid']), "payment_type" => $payment_type, "notify_url" => $notify_url, "return_url" => $return_url, "seller_email" => $seller_email, "out_trade_no" => $out_trade_no, "subject" => $subject, "total_fee" => $total_fee, "body" => $body, "show_url" => $show_url, "anti_phishing_key" => $anti_phishing_key, "exter_invoke_ip" => $exter_invoke_ip, "_input_charset" => trim(strtolower('utf-8')));
        $alipaySubmit = new AlipaySubmit($this -> setconfig());
        $html_text = $alipaySubmit -> buildRequestForm($parameter, "get", "进行支付");
        echo '正在跳转到支付宝进行支付...<div style="display:none">' . $html_text . '</div>';
    }
    public function setconfig(){
        $alipay_config['partner'] = trim($this -> alipayConfig['pid']);
        $alipay_config['key'] = trim($this -> alipayConfig['key']);
        $alipay_config['sign_type'] = strtoupper('MD5');
        $alipay_config['input_charset'] = strtolower('utf-8');
        $alipay_config['cacert'] = getcwd() . '\\PigCms\\Lib\\ORG\\Alipay\\cacert.pem';
        $alipay_config['transport'] = 'http';
        return $alipay_config;
    }
    public function return_url (){
        import("@.ORG.Alipay.AlipayNotify");
        $alipayNotify = new AlipayNotify($this -> setconfig());
        $verify_result = $alipayNotify -> verifyReturn();
        $out_trade_no = $this -> _get('out_trade_no');
        $trade_no = $this -> _get('trade_no');
        $trade_status = $this -> _get('trade_status');
        if($this -> _get('trade_status') == 'TRADE_FINISHED' || $this -> _get('trade_status') == 'TRADE_SUCCESS'){
            $member_card_create_db = M('Member_card_create');
            $userCard = $member_card_create_db -> where(array('token' => $this -> token, 'wecha_id' => $this -> wecha_id)) -> find();
            $member_card_set_db = M('Member_card_set');
            $thisCard = $member_card_set_db -> where(array('id' => intval($userCard['cardid']))) -> find();
            $set_exchange = M('Member_card_exchange') -> where(array('cardid' => intval($thisCard['id']))) -> find();
            $arr['token'] = $this -> token;
            $arr['wecha_id'] = $this -> wecha_id;
            $arr['expense'] = $this -> _get('total_fee');
            $arr['time'] = time();
            $arr['cat'] = 99;
            $arr['staffid'] = 0;
            $arr['score'] = intval($set_exchange['reward']) * $arr['expense'];
            M('Member_card_use_record') -> add($arr);
            $userinfo_db = M('Userinfo');
            $thisUser = $userinfo_db -> where(array('token' => $thisCard['token'], 'wecha_id' => $arr['wecha_id'])) -> find();
            $userArr = array();
            $userArr['total_score'] = $thisUser['total_score'] + $arr['score'];
            $userArr['expensetotal'] = $thisUser['expensetotal'] + $arr['expense'];
            $userinfo_db -> where(array('token' => $thisCard['token'], 'wecha_id' => $arr['wecha_id'])) -> save($userArr);
            $from = $_GET['from'];
            $from = $from?$from:'Groupon';
            $from = $from != 'groupon'?$from:'Groupon';
            switch (strtolower($from)){
            default: case 'groupon': case 'store': $order_model = M('product_cart');
                break;
            case 'repast': $order_model = M('Dish_order');
                break;
            case 'hotels': $order_model = M('Hotels_order');
                break;
            case 'business': $order_model = M('Reservebook');
                break;
            }
            $order_model -> where(array('orderid' => $out_trade_no)) -> setField('paid', 1);
            $this -> redirect('/index.php?g=Wap&m=' . $from . '&a=payReturn&token=' . $_GET['token'] . '&wecha_id=' . $_GET['wecha_id'] . '&orderid=' . $out_trade_no);
        }else{
            exit('付款失败');
        }
    }
    public function notify_url(){
        echo "success";
        eixt();
    }
}
?>