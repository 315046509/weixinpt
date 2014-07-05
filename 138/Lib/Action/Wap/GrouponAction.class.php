<?php
class GrouponAction extends ProductAction{
    public $token;
    public $wecha_id;
    public $product_model;
    public $product_cat_model;
    public $isDining;
    public $tplid;
    public $pageSize;
    public function __construct(){
        parent :: __construct();
        $this -> pageSize = 8;
        $grouponConfig = F('grouponConfig' . $this -> token);
        $grouponDetailConfig = unserialize($grouponConfig['config']);
        $this -> tplid = intval($grouponDetailConfig['tplid']);
        $this -> assign('pageSize', $this -> pageSize);
        $this -> assign('wecha_id', $this -> _get('wecha_id'));
    }
    public function grouponIndex(){
        $where = array('token' => $this -> token, 'groupon' => 1);
        $where['endtime'] = array('gt', time());
        if (isset($_GET['catid'])){
            $catid = intval($_GET['catid']);
            $where['catid'] = $catid;
            $thisCat = $this -> product_cat_model -> where(array('id' => $catid)) -> find();
            $this -> assign('thisCat', $thisCat);
        }
        if (IS_POST){
            $key = $this -> _post('search_name');
            $this -> redirect('?g=Wap&m=Groupon&a=grouponIndex&token=' . $this -> token . '&keyword=' . $key);
        }
        if (isset($_GET['keyword'])){
            $where['name|intro|keyword'] = array('like', "%" . $_GET['keyword'] . "%");
            $this -> assign('isSearch', 1);
        }
        $count = $this -> product_model -> where($where) -> count();
        $this -> assign('count', $count);
        $method = isset($_GET['method']) && ($_GET['method'] == 'DESC' || $_GET['method'] == 'ASC')?$_GET['method']:'DESC';
        $orders = array('time', 'discount', 'price', 'salecount');
        $order = isset($_GET['order']) && in_array($_GET['order'], $orders)?$_GET['order']:'time';
        $this -> assign('order', $order);
        $this -> assign('method', $method);
        $products = $this -> product_model -> where($where) -> order($order . ' ' . $method) -> limit($this -> pageSize) -> select();
        $now = time();
        $i = 0;
        if ($products){
            foreach ($products as $p){
                $products[$i]['new'] = 0;
                if ($now - $p['time'] < 3 * 24 * 3600){
                    $products[$i]['new'] = 1;
                }
                $i++;
            }
        }
        $this -> assign('products', $products);
        $this -> assign('metaTitle', '团购');
        $this -> display('grouponIndex_' . $this -> tplid);
    }
    public function ajaxGrouponProducts(){
        $where = array('token' => $this -> token, 'groupon' => 1);
        $page = isset($_GET['page']) && intval($_GET['page']) > 1?intval($_GET['page']):2;
        $pageSize = isset($_GET['pagesize']) && intval($_GET['pagesize']) > 1?intval($_GET['pagesize']):$this -> pageSize;
        $start = ($page-1) * $pageSize;
        $method = isset($_GET['method']) && ($_GET['method'] == 'DESC' || $_GET['method'] == 'ASC')?$_GET['method']:'DESC';
        $method = $method == 'ASC'?'DESC':'ASC';
        $orders = array('time', 'discount', 'price', 'salecount');
        $order = isset($_GET['order']) && in_array($_GET['order'], $orders)?$_GET['order']:'time';
        $products = $this -> product_model -> where($where) -> order($order . ' ' . $method) -> limit($start . ',' . $pageSize) -> select();
        $str = '{"products":[';
        if ($products){
            $comma = '';
            foreach ($products as $p){
                $membercount = intval($p['salecount']) + intval($p['fakemembercount']);
                $str .= $comma . '{"id":"' . $p['id'] . '","catid":"' . $p['catid'] . '","storeid":"' . $p['storeid'] . '","name":"' . $p['name'] . '","price":"' . $p['price'] . '","token":"' . $p['token'] . '","keyword":"' . $p['keyword'] . '","salecount":"' . $p['salecount'] . '","logourl":"' . $p['logourl'] . '","time":"' . $p['time'] . '","oprice":"' . $p['oprice'] . '","fakemembercount":"' . $p['fakemembercount'] . '","membercount":"' . $membercount . '","enddate":"' . date('Y-m-d', $p['endtime']) . '"}';
                $comma = ',';
            }
        }
        $str .= ']}';
        $this -> show($str);
    }
    public function product(){
        $where = array('token' => $this -> token);
        if (isset($_GET['id'])){
            $id = intval($_GET['id']);
            $where['id'] = $id;
        }
        $product = $this -> product_model -> where($where) -> find();
        $this -> assign('product', $product);
        if ($product['endtime']){
            $leftSeconds = intval($product['endtime'] - time());
            $this -> assign('leftSeconds', $leftSeconds);
        }
        $this -> assign('metaTitle', $product['name']);
        $product['intro'] = str_replace(array('&lt;', '&gt;', '&quot;', '&amp;nbsp;'), array('<', '>', '"', ' '), $product['intro']);
        $intro = $this -> remove_html_tag($product['intro']);
        $intro = mb_substr($intro, 0, 30, 'utf-8');
        $this -> assign('intro', $intro);
        $company_model = M('Company');
        $where = array('token' => $this -> token);
        $thisCompany = $company_model -> where($where) -> find();
        $this -> assign('thisCompany', $thisCompany);
        $branchStoreCount = $company_model -> where(array('token' => $this -> token, 'isbranch' => 1)) -> count();
        $this -> assign('branchStoreCount', $branchStoreCount);
        $sameCompanyProductWhere = array('token' => $this -> token, 'id' => array('neq', $product['id']));
        if ($product['dining']){
            $sameCompanyProductWhere['dining'] = 1;
        }
        if ($product['groupon']){
            $sameCompanyProductWhere['groupon'] = 1;
        }
        if (!$product['groupon'] && !$product['dining']){
            $sameCompanyProductWhere['groupon'] = array('neq', 1);
            $sameCompanyProductWhere['dining'] = array('neq', 1);
        }
        $products = $this -> product_model -> where($sameCompanyProductWhere) -> limit('salecount DESC') -> limit('0,100') -> select();
        $this -> assign('products', $products);
        $this -> display('product_' . $this -> tplid);
    }
    public function detail(){
        $where = array('token' => $this -> token);
        if (isset($_GET['id'])){
            $id = intval($_GET['id']);
            $where['id'] = $id;
        }
        $product = $this -> product_model -> where($where) -> find();
        $product['intro'] = html_entity_decode($product['intro']);
        $this -> assign('product', $product);
        $this -> assign('metaTitle', $product['name']);
        $this -> display('detail_' . $this -> tplid);
    }
    public function my(){
        $product_cart_model = M('product_cart');
        $orders = $product_cart_model -> where(array('token' => $this -> token, 'groupon' => 1, 'wecha_id' => $this -> wecha_id)) -> order('time DESC') -> select();
        $unpaidCount = 0;
        $unusedCount = 0;
        if ($orders){
            foreach ($orders as $o){
                $products = unserialize($o['info']);
                if (!$o['paid']){
                    $unpaidCount++;
                }
                if (!$o['used']){
                    $unusedCount++;
                }
            }
        }
        $this -> assign('orders', $orders);
        $this -> assign('unpaidCount', $unpaidCount);
        $this -> assign('unusedCount', $unusedCount);
        $this -> assign('ordersCount', count($orders));
        $this -> assign('metaTitle', '我的订单');
        $alipay_config_db = M('Alipay_config');
        $alipayConfig = $alipay_config_db -> where(array('token' => $this -> token)) -> find();
        $this -> assign('alipayConfig', $alipayConfig);
        $this -> assign('hideTopButton', 1);
        $this -> display('my_' . $this -> tplid);
    }
    public function myOrders(){
        $alipay_config_db = M('Alipay_config');
        $alipayConfig = $alipay_config_db -> where(array('token' => $this -> token)) -> find();
        $this -> assign('alipayConfig', $alipayConfig);
        $where = array('token' => $this -> token, 'wecha_id' => $this -> wecha_id, 'groupon' => 1);
        if (isset($_GET['used'])){
            if (intval($_GET['used']) == 1){
                $title = '已使用团购';
            }else{
                $title = '未使用团购';
            }
            $where['handled'] = intval($_GET['used']);
        }elseif (isset($_GET['paid'])){
            $title = '待付款订单';
            $where['paid'] = intval($_GET['paid']);
        }else{
            $title = '全部订单';
        }
        $this -> assign('title', $title);
        $product_cart_model = M('product_cart');
        $orders = $product_cart_model -> where($where) -> order('time DESC') -> select();
        $productsIDs = array();
        if ($orders){
            foreach ($orders as $o){
                array_push($productsIDs, $o['productid']);
            }
        }
        if ($productsIDs){
            $products = M('Product') -> where(array('id' => array('in', $productsIDs))) -> select();
        }
        $productsByID = array();
        if ($products){
            foreach ($products as $p){
                $productsByID[$p['id']] = $p;
            }
        }
        if ($orders){
            $i = 0;
            foreach ($orders as $o){
                $orders[$i]['logourl'] = $productsByID[$o['productid']]['logourl'];
                $orders[$i]['productName'] = $productsByID[$o['productid']]['name'];
                if (!$o['paid'] && $alipayConfig && !$o['handled']){
                    $orders[$i]['needPay'] = 1;
                }else{
                    $orders[$i]['needPay'] = 0;
                }
                $i++;
            }
        }
        $this -> assign('orders', $orders);
        $this -> assign('unpaidCount', $unpaidCount);
        $this -> assign('unusedCount', $unusedCount);
        $this -> assign('ordersCount', count($orders));
        $this -> assign('metaTitle', '我的订单');
        $this -> assign('hideTopButton', 1);
        $this -> display('myOrders_' . $this -> tplid);
    }
    public function search(){
        $this -> display('search_' . $this -> tplid);
    }
    public function orderCart(){
        $userinfo_model = M('Userinfo');
        $thisUser = $userinfo_model -> where(array('token' => $this -> token, 'wecha_id' => $this -> wecha_id)) -> find();
        $this -> assign('thisUser', $thisUser);
        $alipay_config_db = M('Alipay_config');
        $alipayConfig = $alipay_config_db -> where(array('token' => $this -> token)) -> find();
        $this -> assign('alipayConfig', $alipayConfig);
        if (IS_POST){
            $row = array();
            $orderid = microtime();
            $row['orderid'] = $orderid;
            $orderid = $row['orderid'];
            $row['truename'] = $this -> _post('truename');
            $row['tel'] = $this -> _post('tel');
            $row['address'] = $this -> _post('address');
            $row['token'] = $this -> token;
            $row['wecha_id'] = $this -> wecha_id;
            if (!$row['wecha_id']){
                $row['wecha_id'] = 'null';
            }
            $time = time();
            $row['time'] = $time;
            $product_cart_model = M('product_cart');
            $row['total'] = intval($_POST['quantity']);
            $row['price'] = $row['total'] * floatval($_POST['price']);
            $row['diningtype'] = 0;
            $row['productid'] = intval($_POST['productid']);
            $row['code'] = substr($row['wecha_id'], 0, 6) . $time;
            $row['tableid'] = 0;
            $row['info'] = serialize(array(intval($_POST['productid']) => array('count' => $row['total'], 'price' => intval($_POST['price']))));
            $row['groupon'] = 1;
            $row['dining'] = 0;
            $product_cart_model -> add($row);
            $product_model = M('product');
            $product_cart_list_model = M('product_cart_list');
            $product_model -> where(array('id' => intval($_POST['productid']))) -> setInc('salecount', $_POST['quantity']);
            if ($_POST['saveinfo']){
                $userRow = array('tel' => $row['tel'], 'truename' => $row['truename'], 'address' => $row['address']);
                if ($thisUser){
                    $userinfo_model -> where(array('id' => $thisUser['id'])) -> save($userRow);
                }else{
                    $userRow['token'] = $this -> token;
                    $userRow['wecha_id'] = $this -> wecha_id;
                    $userRow['wechaname'] = '';
                    $userRow['qq'] = 0;
                    $userRow['sex'] = -1;
                    $userRow['age'] = 0;
                    $userRow['birthday'] = '';
                    $userRow['info'] = '';
                    $userRow['total_score'] = 0;
                    $userRow['sign_score'] = 0;
                    $userRow['expend_score'] = 0;
                    $userRow['continuous'] = 0;
                    $userRow['add_expend'] = 0;
                    $userRow['add_expend_time'] = 0;
                    $userRow['live_time'] = 0;
                    $userinfo_model -> add($userRow);
                }
            }
            $info = M('weiwosms') -> where(array('token' => $this -> token)) -> find();
            $phone = $info['phone'];
            $user = $info['name'];
            $pass = md5($info['password']);
            $smsstatus = $info['shangcheng'];
            $content = $this -> sms();
            if ($smsstatus == 1){
                if ($content){
                    $smsrs = file_get_contents('http://api.smsbao.com/sms?u=' . $user . '&p=' . $pass . '&m=' . $phone . '&c=' . urlencode($content));
                }
            }
            $info = M('weiwoemail') -> where(array('token' => $this -> token)) -> find();
            $emailstatus = $info['shangcheng'];
            $emailreceive = $info['receive'];
            $content = $this -> sms();
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
                    $mail -> Subject = '您的商城订单';
                    $mail -> Body = $content;
                    $mail -> AltBody = "";
                    if(!$mail -> Send()){
                        echo "Message could not be sent. <p>";
                        echo "Mailer Error: " . $mail -> ErrorInfo;
                        exit;
                    }
                    echo "Message has been sent";
                }
            }
            if ($alipayConfig['open']){
                $this -> redirect(U('Alipay/pay', array('token' => $this -> token, 'wecha_id' => $this -> wecha_id, 'success' => 1, 'price' => $row['price'], 'orderName' => $orderName, 'orderid' => $orderid)));
            }else{
                $this -> redirect(U('Groupon/my', array('token' => $_GET['token'], 'wecha_id' => $_GET['wecha_id'], 'success' => 1)));
            }
        }else{
            $where = array('token' => $this -> token);
            if (isset($_GET['id'])){
                $id = intval($_GET['id']);
                $where['id'] = $id;
            }
            $product = $this -> product_model -> where($where) -> find();
            $this -> assign('product', $product);
            $this -> display('orderCart_' . $this -> tplid);
        }
    }
    public function sms(){
        $where['token'] = $this -> token;
        $where['wecha_id'] = $this -> wecha_id;
        $where['printed'] = 0;
        $this -> product_cart_model = M('product_cart');
        $count = $this -> product_cart_model -> where($where) -> count();
        $orders = $this -> product_cart_model -> where($where) -> order('time DESC') -> limit(0, 1) -> select();
        $now = time();
        if ($orders){
            $thisOrder = $orders[0];
            switch ($thisOrder['diningtype']){
            case 0: $orderType = '购物';
                break;
            case 1: $orderType = '点餐';
                break;
            case 2: $orderType = '外卖';
                break;
            case 3: $orderType = '预定餐桌';
                break;
            }
            $product_diningtable_model = M('product_diningtable');
            if ($thisOrder['tableid']){
            $thisTable = $product_diningtable_model -> where(array('id' => $thisOrder['tableid'])) -> find();
            $thisOrder['tableName'] = $thisTable['name'];
        }else{
            $thisOrder['tableName'] = '未指定';
        }
        $str = "订单类型：" . $orderType . "\r\n订单编号：" . $thisOrder['id'] . "\r\n姓名：" . $thisOrder['truename'] . "\r\n电话：" . $thisOrder['tel'] . "\r\n地址：" . $thisOrder['address'] . "\r\n桌台：" . $thisOrder['tableName'] . "\r\n下单时间：" . date('Y-m-d H:i:s', $thisOrder['time']) . "\r\n";
        $carts = unserialize($thisOrder['info']);
        $totalFee = 0;
        $totalCount = 0;
        $products = array();
        $ids = array();
        foreach ($carts as $k => $c){
            if (is_array($c)){
                $productid = $k;
                $price = $c['price'];
                $count = $c['count'];
                if (!in_array($productid, $ids)){
                    array_push($ids, $productid);
                }
                $totalFee += $price * $count;
                $totalCount += $count;
            }
        }
        if (count($ids)){
            $products = $this -> product_model -> where(array('id' => array('in', $ids))) -> select();
        }
        if ($products){
            $i = 0;
            foreach ($products as $p){
                $products[$i]['count'] = $carts[$p['id']]['count'];
                $str .= $p['name'] . "  " . $products[$i]['count'] . "份  单价：" . $p['price'] . "元\r\n";
                $i++;
            }
        }
        $str .= "合计：" . $thisOrder['price'] . "元";
        return $str;
    }else{
        return '';
    }
}
public function deleteOrder(){
    $product_model = M('product');
    $product_cart_model = M('product_cart');
    $product_cart_list_model = M('product_cart_list');
    $thisOrder = $product_cart_model -> where(array('id' => intval($_GET['id']))) -> find();
    $id = $thisOrder['id'];
    if ($thisOrder['wecha_id'] != $this -> wecha_id || $thisOrder['handled'] == 1){
        exit();
    }
    $product_cart_model -> where(array('id' => $id)) -> delete();
    $product_cart_list_model -> where(array('cartid' => $id)) -> delete();
    $product_model -> where(array('id' => $k)) -> setDec('salecount', $thisOrder['total']);
    $this -> redirect($_SERVER['HTTP_REFERER']);
}
public function orderDetail(){
    $alipay_config_db = M('Alipay_config');
    $alipayConfig = $alipay_config_db -> where(array('token' => $this -> token)) -> find();
    $this -> assign('alipayConfig', $alipayConfig);
    $product_cart_model = M('product_cart');
    $thisOrder = $product_cart_model -> where(array('token' => $this -> token, 'wecha_id' => $this -> wecha_id, 'id' => intval($_GET['id']))) -> find();
    $product_model = M('product');
    $thisProduct = $product_model -> where(array('id' => $thisOrder['productid'])) -> find();
    $this -> assign('thisProduct', $thisProduct);
    if (!$thisOrder['paid'] && $alipayConfig && !$thisOrder['handled']){
        $thisOrder['needPay'] = 1;
    }else{
        $thisOrder['needPay'] = 0;
    }
    $this -> assign('thisOrder', $thisOrder);
    $this -> assign('hideTopButton', 1);
    $this -> display('orderDetail_' . $this -> tplid);
}
public function company($display = 1){
    $company_model = M('Company');
    $where = array('token' => $this -> token);
    if (isset($_GET['companyid'])){
        $where['id'] = intval($_GET['companyid']);
    }
    $thisCompany = $company_model -> where($where) -> find();
    $this -> assign('thisCompany', $thisCompany);
    $branchStores = $company_model -> where(array('token' => $this -> token, 'isbranch' => 1)) -> order('taxis ASC') -> select();
    $branchStoreCount = count($branchStores);
    $this -> assign('branchStoreCount', $branchStoreCount);
    $this -> assign('branchStores', $branchStores);
    $this -> assign('metaTitle', '公司信息');
    if($display){
        $this -> display('company_' . $this -> tplid);
    }
}
public function companyMap(){
    $this -> apikey = C('baidu_map_api');
    $this -> assign('apikey', $this -> apikey);
    $this -> company(0);
    $this -> assign('hideTopButton', 1);
    $this -> display('companyMap_' . $this -> tplid);
}
public function handle(){
    $product_cart_model = M('product_cart');
    if (IS_POST){
        $staff_db = M('Company_staff');
        $thisStaff = $staff_db -> where(array('username' => $this -> _post('username'), 'token' => $this -> _get('token'))) -> find();
        if (!$thisStaff){
            echo'{"success":-4,"msg":"用户名和密码不匹配"}';
            exit();
        }else{
            if (md5($this -> _post('password')) != $thisStaff['password']){
                echo'{"success":-4,"msg":"用户名和密码不匹配"}';
                exit();
            }else{
                $now = time();
                $arr['handleduid'] = $thisStaff['id'];
                $arr['handledtime'] = $time;
                $arr['handled'] = 1;
                $arr['sent'] = 1;
                $product_cart_model -> where(array('id' => intval($_POST['id']))) -> save($arr);
                echo'{"success":1,"msg":"处理成功"}';
                exit();
            }
        }
    }else{
        $alipay_config_db = M('Alipay_config');
        $alipayConfig = $alipay_config_db -> where(array('token' => $this -> token)) -> find();
        $this -> assign('alipayConfig', $alipayConfig);
        $thisOrder = $product_cart_model -> where(array('token' => $this -> token, 'wecha_id' => $this -> wecha_id, 'id' => intval($_GET['id']))) -> find();
        $product_model = M('product');
        $thisProduct = $product_model -> where(array('id' => $thisOrder['productid'])) -> find();
        $this -> assign('thisProduct', $thisProduct);
        if (!$thisOrder['paid'] && $alipayConfig && !$thisOrder['handled']){
            $thisOrder['needPay'] = 1;
        }else{
            $thisOrder['needPay'] = 0;
        }
        $this -> assign('thisOrder', $thisOrder);
        $this -> assign('hideTopButton', 1);
        $this -> display('handle_' . $this -> tplid);
    }
}
}
?>