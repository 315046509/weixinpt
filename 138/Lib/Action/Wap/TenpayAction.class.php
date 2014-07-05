<?php
class TenpayAction extends BaseAction{
    public $token;
    public $wecha_id;
    public $payConfig;
    public function __construct(){
        $this -> token = $this -> _get('token');
        $this -> wecha_id = $this -> _get('wecha_id');
        if (!$this -> token){
        }
        $pay_config_db = M('Alipay_config');
        $this -> payConfig = $pay_config_db -> where(array('token' => $this -> token)) -> find();
    }
    public function pay(){
        import("@.ORG.Tenpay.RequestHandler");
        import("@.ORG.Tenpay.client.ClientResponseHandler");
        import("@.ORG.Tenpay.client.TenpayHttpClient");
        $partner = $this -> payConfig['partnerid'];
        $key = $this -> payConfig['partnerkey'];
        $orderid = $_GET['orderid'];
        if (!$orderid){
            $orderid = $_GET['single_orderid'];
        }
        $out_trade_no = $orderid;
        $price = $_GET['price'];
        if(!$price)exit('必须有价格才能支付');
        $orderName = $_GET['orderName'];
        $total_fee = floatval($price);
        $reqHandler = new RequestHandler();
        $reqHandler -> init();
        $reqHandler -> setKey($key);
        $reqHandler -> setGateUrl("http://wap.tenpay.com/cgi-bin/wappayv2.0/wappay_init.cgi");
        $httpClient = new TenpayHttpClient();
        $resHandler = new ClientResponseHandler();
        $reqHandler -> setParameter("total_fee", $total_fee * 100);
        $reqHandler -> setParameter("spbill_create_ip", $_SERVER['REMOTE_ADDR']);
        $reqHandler -> setParameter("ver", "2.0");
        $reqHandler -> setParameter("bank_type", "0");
        $return_url = C('site_url') . '/index.php?g=Wap&m=Tenpay&a=return_url&token=' . $this -> token . '&wecha_id=' . $this -> wecha_id . '&from=' . $_GET['from'];
        $reqHandler -> setParameter("callback_url", $return_url);
        $reqHandler -> setParameter("bargainor_id", $partner);
        $reqHandler -> setParameter("sp_billno", $out_trade_no);
        $notify_url = C('site_url') . '/index.php?g=Wap&m=Tenpay&a=notify_url';
        $reqHandler -> setParameter("notify_url", $notify_url);
        $reqHandler -> setParameter("desc", $orderName?$orderName:'wechat');
        $reqHandler -> setParameter("attach", "");
        $httpClient -> setReqContent($reqHandler -> getRequestURL());
        if($httpClient -> call()){
            $resHandler -> setContent($httpClient -> getResContent());
            $token_id = $resHandler -> getParameter('token_id');
            $reqHandler -> setParameter("token_id", $token_id);
            $reqUrl = "http://wap.tenpay.com/cgi-bin/wappayv2.0/wappay_gate.cgi?token_id=" . $token_id;
        }
        header('Location:' . $reqUrl);
    }
    public function return_url (){
        import("@.ORG.Tenpay.ResponseHandler");
        import("@.ORG.Tenpay.WapResponseHandler");
        $partner = $this -> payConfig['partnerid'];
        $key = $this -> payConfig['partnerkey'];
        $resHandler = new WapResponseHandler();
        $resHandler -> setKey($key);
        if($resHandler -> isTenpaySign()){
            $out_trade_no = $resHandler -> getParameter("sp_billno");
            $transaction_id = $resHandler -> getParameter("transaction_id");
            $total_fee = $resHandler -> getParameter("total_fee");
            $pay_result = $resHandler -> getParameter("pay_result");
            if("0" == $pay_result){
                $member_card_create_db = M('Member_card_create');
                $userCard = $member_card_create_db -> where(array('token' => $this -> token, 'wecha_id' => $this -> wecha_id)) -> find();
                $member_card_set_db = M('Member_card_set');
                $thisCard = $member_card_set_db -> where(array('id' => intval($userCard['cardid']))) -> find();
                $set_exchange = M('Member_card_exchange') -> where(array('cardid' => intval($thisCard['id']))) -> find();
                $arr['token'] = $this -> token;
                $arr['wecha_id'] = $this -> wecha_id;
                $arr['expense'] = intval($total_fee / 100);
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
                $thisOrder = $order_model -> where(array('orderid' => $out_trade_no, 'token' => $this -> token)) -> find();
                $order_model -> where(array('orderid' => $out_trade_no)) -> setField('paid', 1);
                $this -> redirect('?g=Wap&m=' . $from . '&a=payReturn&token=' . $_GET['token'] . '&wecha_id=' . $thisOrder['wecha_id'] . '&orderid=' . $out_trade_no);
            }else{
                $string = "<br/>" . "支付失败" . "<br/>";
                echo $string;
            }
        }else{
            $string = "<br/>" . "认证签名失败" . "<br/>";
            echo $string;
        }
    }
    public function notify_url(){
        echo "success";
        eixt();
    }
}
?>