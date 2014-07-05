<?php
class PrinterAction extends BaseAction{
	
	public function index(){
		//打印机访问页，请使用gb2312
		header("Content-Type:text/html;charset=gb2312");
		
		//sn为设备号
		$sn = get('sn');
		if($sn===null) {
			$this->show_msg('请填上打印机的sn参数。');
			return;
		}
		$ext_printer = M('ext_printer')->where(array('sn'=>$sn))->find();
		if(!$ext_printer) {
			$this->show_msg('该sn不存在！');
			return;
		}
		
		//id为订单流水号，有流水号时表示此流水号已经打印成功
		$id = intval(get('id'));
		
		//查询流水号,带流水号id上来表示此流水号已打印成功(可以独立一列作为流水号ID，或使用key id作为流水号)
		$ext_printer_task = M('ext_printer_task')->where(array('id'=>$id,'ext_printer_id'=>$ext_printer['id']))->find();
		if($ext_printer_task) {
			if(M('ext_printer_task')->where(array('id'=>$id))->save(array('print_status'=>2))) {
				M('ext_printer')->where(array('id'=>$ext_printer['id']))->setInc('seq_num', 1);
			}
			
			// 订单标记为已处理
			if($ext_printer['deal_order']==1) {
				M('product_cart')->where(array('id'=>$ext_printer_task['product_cart_id']))->save(array('handled'=>1));
			}
		}
		
		$time = time();
		if($time > $ext_printer['seq_date']) {
			$dateStr = date('Ymd', $time);
			$printer_data = array();
			$printer_data['seq_date'] = date_time($dateStr, 1) - 1;
			$printer_data['seq_num'] = 1;
			M('ext_printer')->where(array('id'=>$ext_printer['id']))->save($printer_data);
		}
		
		// 重新获取新设置的数据
		$ext_printer = M('ext_printer')->where(array('sn'=>$sn))->find();
		
		//下一条订单打印
		$days = C('ORDER_PRINT_DAYS') ? C('ORDER_PRINT_DAYS') : 1;
		$select_time = time() - $days * 24 * 3600;	// $days * 24小时内
		$ext_printer_task = M('ext_printer_task')->where(array('ext_printer_id'=>$ext_printer['id'], 'print_status'=>array('neq',2),'create_time'=>array('gt',$select_time)))->find();
		if($ext_printer_task) {
			$this->print_template($ext_printer_task, $ext_printer, $time);
		} else {
			//没有订单
			echo 'DATA#0DATA*';
		}
	}
	
	private function show_msg($msg) {
		echo 'DATA#0';
		echo iconv('UTF-8','GB2312',$msg);
		echo 'DATA*';
	}
	
	private function print_template($ext_printer_task, $ext_printer, $time) {
		$template = $ext_printer['template'];
		$s_pos = strpos($template, '{{');
		$e_pos = strpos($template, '}}');
		$part1 = substr($template, 0, $s_pos);
		$part2 = substr($template, $s_pos+1, $e_pos-$s_pos);
		$part3 = substr($template, $e_pos+2);
		
		$dateStr = date('Ymd', $time);
		
		$product_cart = M('product_cart')->find($ext_printer_task['product_cart_id']);
		$print_product_info = unserialize($ext_printer_task['print_product_info']);
		
		$auto_new_line = strpos($part2, "\n")===false ? true : false;
		$new_line = '';
		if($auto_new_line) {
			if(preg_match('/\}(.*)\{商品\}/', $part2, $mat1)===false) {
				$new_line = "\r\n";
			} else {
				$new_line = "\r\n".str_repeat(' ', zh_strlen($mat1[1]) + 1);
			}
		}
		preg_match('/\{商品\} */', $part2, $matches);
		if($matches) $name_var = $matches[0]; else $name_var = '{商品}';
		$total = 0;
		$print_part2 = '';
		$i = 1;
		foreach($print_product_info as $product_id => &$product_info) {
			$product = M('product')->field('name,price')->find($product_id);
			$name = $product['name'];$price=$product_info['price'];$count=$product_info['count'];$amount=$price*$count; 
			$listVars = get_print_replace_array($ext_printer,$name_var,$name,$auto_new_line,$new_line,$i++,$price,$count,$amount);
			if(!$listVars) return;
			if(strlen($print_part2)>0) $print_part2 .= "\r\n";
			$print_part2 .= str_replace(array_keys($listVars), array_values($listVars), $part2);
			$total += $amount;
		}
		
		$vars['{流水号}'] = $dateStr.sprintf("%04d", $ext_printer['seq_num']);
		$vars['{姓名}'] = $product_cart['truename'];
		$vars['{手机}'] = $product_cart['tel'];
		$vars['{地址}'] = $product_cart['address'];
		$vars['{下单时间}'] = date('Y-m-d H:i:s', $product_cart['time']);
		$vars['{合计}'] = sprintf("%6s",number_format($total, 2));
		$print_part1 = str_replace(array_keys($vars), array_values($vars), $part1);
		$print_part3 = str_replace(array_keys($vars), array_values($vars), $part3);
		$print_str = iconv('UTF-8','GB2312',$print_part1.$print_part2.$print_part3);
		$formatid = sprintf("%012d",$ext_printer_task['id']);
		echo 'DATA#1'.$ext_printer['print_count'].$formatid;
		echo $print_str;
		echo 'DATA*';
		
		M('ext_printer_task')->where(array('id'=>$ext_printer_task['id']))->save(array('print_time'=>$time,'print_status'=>1));
	}
	
	public function preview() {
		// 预览数据
		header("Content-Type:text/html;charset=gb2312");
		$template = <<<EOF
         外卖订餐
流水号：{流水号}
姓名：{姓名}
手机：{手机}
地址：{地址}
下单时间：{下单时间}
-------------------------------
商品         单价   数量   金额
{{序号}.{商品}
           {单价} {数量} {金额}}
-------------------------------
                   合计：{合计}
		
服务电话：88888888
EOF;
		$ext_printer['sn']='888888';
		$ext_printer['sn_encrypt'] = ' ';
		$s_pos = strpos($template, '{{');
		$e_pos = strpos($template, '}}');
		$part1 = substr($template, 0, $s_pos);
		$part2 = substr($template, $s_pos+1, $e_pos-$s_pos);
		$part3 = substr($template, $e_pos+2);
		
		$time = time();
		$dateStr = date('Ymd', $time);
		$auto_new_line = strpos($part2, "\n")===false ? true : false;
		$new_line = '';
		if($auto_new_line) {
			if(preg_match('/\}(.*)\{商品\}/', $part2, $mat1)===false) {
				$new_line = "\r\n";
			} else {
				$new_line = "\r\n".str_repeat(' ', zh_strlen($mat1[1]) + 1);
			}
		}
		preg_match('/\{商品\} */', $part2, $matches);
		if($matches) $name_var = $matches[0]; else $name_var = '{商品}';
		$total = 0;
		$print_part2 = '';
		$i = 1;
		
		$name = '商品1';	$price=10.0; $count=1;
		$amount = $price * $count;
		$listVars = get_print_replace_array($ext_printer,$name_var,$name,$auto_new_line,$new_line,$i++,$price,$count,$amount);
		if(strlen($print_part2)>0) $print_part2 .= "\r\n";
		$print_part2 .= str_replace(array_keys($listVars), array_values($listVars), $part2);
		$total += $amount;
		
		$name = '名称有点长的商品2';	$price=30.0; $count=2;
		$amount = $price * $count;
		$listVars = get_print_replace_array($ext_printer,$name_var,$name,$auto_new_line,$new_line,$i++,$price,$count,$amount);
		if(strlen($print_part2)>0) $print_part2 .= "\r\n";
		$print_part2 .= str_replace(array_keys($listVars), array_values($listVars), $part2);
		$total += $amount;
		
		$vars['{流水号}'] = $dateStr.sprintf("%04d", 1);
		$vars['{姓名}'] = '张三';
		$vars['{手机}'] = '13800138000';
		$vars['{地址}'] = '天朝帝都';
		$vars['{下单时间}'] = date('Y-m-d H:i:s', $time);
		$vars['{合计}'] = sprintf("%6s",number_format($total, 2));
		$print_part1 = str_replace(array_keys($vars), array_values($vars), $part1);
		$print_part3 = str_replace(array_keys($vars), array_values($vars), $part3);
		$print_str = iconv('UTF-8','GB2312',$print_part1.$print_part2.$print_part3);
		$formatid = sprintf("%012d",0);
		echo 'DATA#1'.'1'.$formatid;
		echo $print_str;
		echo 'DATA*';
	}

}