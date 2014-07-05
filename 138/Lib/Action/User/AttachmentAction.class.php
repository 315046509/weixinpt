<?php
class AttachmentAction extends UserAction
{
    public function _initialize()
    {
        parent::_initialize();
    }
    public function index()
    {
        $type = $_GET['type'];
        $type = $type ? $type : 'icon';
        $this->assign('type', $type);
        $folder = $_GET['folder'];
        $attachments = $this->files();
        $folders = array();
        $i = 0;
        foreach ($attachments[$type] as $k => $a) {
            array_push($folders, array('name' => $a['name'], 'folder' => $k));
            if ($i == 0 && !$folder) {
                $folder = $k;
            }
            $i++;
        }
        $this->assign('folders', $folders);
        $this->assign('folder', $folder);
        $files = $attachments[$type][$folder]['files'];
        $height = $attachments[$type][$folder]['height'];
        $this->assign('files', $files);
        $this->assign('height', $height);
        $this->assign('siteUrl', C('site_url'));
        $this->display();
    }
    public function files()
    {
        $icons = array('lovely' => array('name' => '卡通图标', 'height' => 60, 'files' => array('1.png', 'backpack-2.png', 'bill.png', 'bookmark.png', 'bookshelf.png', 'briefcase.png', 'bus.png', 'calc.png', 'candy.png', 'car.png', 'chalkboard.png', 'clock.png', 'cloud-check.png', 'cloud-down.png', 'cloud-error.png', 'cloud-refresh.png', 'cloud-up.png', 'donut.png', 'drop.png', 'eye.png', 'flag.png', 'glasses.png', 'glove.png', 'hamburger.png', 'hand.png', 'hotdog.png', 'knife.png', 'label.png', 'map.png', 'map2.png', 'marker.png', 'mcfly.png', 'medicine.png', 'mountain.png', 'muffin.png', 'open-letter.png', 'packman.png', 'paper-plane.png', 'photo.png', 'piggy.png', 'pin.png', 'pizza.png', 'r2d2.png', 'rocket.png', 'skull.png', 'speakers.png', 'store.png', 'tactics.png', 'toaster.png', 'train.png', 'umbrella.png', 'watch.png', 'www.png')), 'colorful' => array('name' => '彩色图标', 'height' => 70, 'files' => array('1.png', '2.png', '3.png', '4.png', '5.png', '6.png', '7.png', '8.png', '9.png', '10.png', '11.png')), 'white' => array('name' => '白色图标', 'height' => 50, 'files' => array('1.png', '2.png', '3.png', '4.png', '5.png', '6.png', '7.png', '8.png', '9.png', '10.png', '11.png', '12.png', '13.png', '14.png', '15.png', '16.png')), 'line' => array('name' => '线条图标', 'height' => 50, 'files' => array('banknote.png', 'bubble.png', 'bulb.png', 'calendar.png', 'camera.png', 'clip.png', 'clock.png', 'cloud.png', 'cup.png', 'data.png', 'diamond.png', 'display.png', 'eye.png', 'fire.png', 'food.png', 'heart.png', 'key.png', 'lab.png', 'like.png', 'location.png', 'lock.png', 'mail.png', 'megaphone.png', 'music.png', 'news.png', 'note.png', 'paperplane.png', 'params.png', 'pen.png', 'phone.png', 'photo.png', 'search.png', 'settings.png', 'shop.png', 'sound.png', 'stack.png', 'star.png', 'study.png', 't-shirt.png', 'tag.png', 'trash.png', 'truck.png', 'tv.png', 'user.png', 'vallet.png', 'video.png', 'vynil.png', 'world.png')),
	 'tubiao1' => array('name' => '3D图标', 'height' => 59, 'files' => array('1.png', '2.png', '3.png', '4.png', '5.png', '6.png', '7.png', '8.png', '9.png', '10.png', '11.png','12.png','13.png','14.png','15.png','16.png','17.png','18.png','19.png','20.png','21.png','22.png','23.png','24.png','25.png','26.png','27.png','28.png','29.png','30.png','31.png','32.png','33.png','34.png','35.png','36.png','37.png','38.png','39.png','40.png','41.png','42.png','43.png','44.png','45.png')),
	  'tubiao2' => array('name' => '扁平图标', 'height' => 59, 'files' => array('1.png', '2.png', '3.png', '4.png', '5.png', '6.png', '7.png', '8.png', '9.png', '10.png', '11.png','12.png','13.png','14.png','15.png','16.png','17.png','18.png','19.png','20.png','21.png','22.png','24.png','25.png','26.png','27.png','28.png')),
	  'tubiao5' => array('name' => '圆型图标', 'height' => 59, 'files' => array('1.png', '2.png', '3.png', '4.png', '5.png', '6.png', '7.png', '8.png', '9.png', '10.png', '11.png','12.png','13.png','14.png','15.png','16.png','17.png','18.png','19.png','20.png','21.png','22.png','23.png','24.png','25.png','26.png','27.png','28.png','29.png','30.png','31.png','32.png','33.png','34.png','35.png','36.png','37.png','38.png','39.png','40.png','41.png','42.png','43.png','44.png','45.png','46.png','47.png','48.png','49.png','50.png','51.png','52.png','53.png')),
	    'huise' => array('name' => '灰色图标', 'height' => 59, 'files' => array('1.png', '2.png', '3.png', '4.png', '5.png', '6.png', '7.png', '8.png', '9.png', '10.png', '11.png','12.png','13.png','14.png','15.png','16.png','17.png','18.png','19.png','20.png','21.png','22.png','23.png','24.png','25.png','26.png','27.png','28.png','29.png','30.png','31.png','32.png','33.png','34.png','35.png','36.png','37.png','38.png','39.png','40.png','41.png','42.png','43.png','44.png','45.png','46.png','47.png','48.png','49.png','50.png','51.png','52.png','53.png','54.png','55.png','56.png','57.png','58.png','59.png','60.png','61.png','62.png','63.png','64.png','65.png','66.png','67.png','68.png','69.png','70.png','71.png','72.png','73.png','74.png','75.png','76.png','77.png','78.png','79.png','80.png','81.png','82.png','83.png','84.png','85.png','86.png','87.png','88.png','89.png','90.png','91.png','92.png','93.png','94.png','95.png','96.png','97.png','98.png','99.png','100.png')),
		'tubiao7' => array('name' => '精致图标1', 'height' => 59, 'files' => array('1.png', '2.png', '3.png', '4.png', '5.png', '6.png', '7.png', '8.png', '9.png', '10.png', '11.png','12.png','13.png','14.png','15.png','16.png','17.png','18.png','19.png','20.png','21.png','22.png','24.png','25.png','26.png','27.png','28.png','29.png')),
		'tubiao8' => array('name' => '精致图标2', 'height' => 59, 'files' => array('1.png', '2.png', '3.png', '4.png', '5.png', '6.png', '7.png', '8.png', '9.png', '10.png', '11.png','12.png','13.png','14.png','15.png','16.png','17.png','18.png','19.png','20.png')), 'shouhui' => array('name' => '手绘图标', 'height' => 50, 'files' => array('1.png', '2.png', '3.png', '4.png', '5.png', '6.png', '7.png', '8.png', '9.png', '10.png', '11.png', '12.png', '13.png', '14.png', '15.png', '16.png', '17.png', '18.png', '19.png', '20.png', '21.png', '22.png', '23.png', '24.png', '25.png', '26.png', '27.png', '28.png', '29.png', '30.png', '31.png', '32.png', '33.png', '34.png', '35.png', '36.png', '37.png', '38.png', '39.png', '40.png', '41.png', '42.png', '43.png', '44.png', '45.png', '46.png', '47.png', '48.png', '49.png', '50.png', '51.png', '52.png', '53.png', '54.png', '55.png', '56.png', '57.png')),);
        $background = array('view' => array('name' => '背景风格①', 'height' => 108, 'files' => array('1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg', '6.jpg', '7.jpg', '8.jpg', '9.jpg','10.jpg','11.jpg','12.jpg','13.jpg','14.jpg','15.jpg','16.jpg','17.jpg','18.jpg','19.jpg','20.jpg','21.jpg','22.jpg','23.jpg','24.jpg','25.jpg','26.jpg','27.jpg','28.jpg','29.jpg','30.jpg','31.jpg','32.jpg','33.jpg','34.jpg','35.jpg','36.jpg','37.jpg','38.jpg','39.jpg')),
		'mm' => array('name' => '背景风格②', 'height' => 108, 'files' => array('1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg', '6.jpg', '7.jpg', '8.jpg', '9.jpg','10.jpg','11.jpg','12.jpg','13.jpg','14.jpg','15.jpg','16.jpg','17.jpg','18.jpg','19.jpg','20.jpg','21.jpg','22.jpg','23.jpg','24.jpg','25.jpg','26.jpg','27.jpg','28.jpg','29.jpg','30.jpg','31.jpg','33.jpg','34.jpg','35.jpg')));
        $focus = array('default' => array('name' => '默认', 'height' => 70, 'files' => array('1.gif', '2.jpg', '3.jpg', '4.jpg', '5.gif', '6.jpg')),'ceshi' => array('name' => '测试用720X400', 'height' => 70, 'files' => array('1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg')),);
        $music = array('default' => array('name' => '默认', 'files' => array(array('file' => '1.mp3', 'name' => '汪峰-一起摇摆'), array('file' => '2.mp3', 'name' => '方大同-明天我要嫁给你了'), array('file' => '3.mp3', 'name' => '今天你要嫁给我'),array('file' => '4.mp3', 'name' => 'Electric_Romeo'),array('file' => '5.mp3', 'name' => 'somewhere i belong'),array('file' => '6.mp3', 'name' => 'Love Is Easy'),array('file' => '7.mp3', 'name' => '风笛 爱尔兰 移民'),array('file' => '8.mp3', 'name' => '极度放松睡眠轻音乐'),array('file' => '9.mp3', 'name' => '加勒比海盗 - 小提琴'),array('file' => '10.mp3', 'name' => '南非世界杯主题曲'))));
		$url = array('default' => array('name' => '默认', 'files' => array(array('file' => '1.mp3', 'name' => '汪峰-一起摇摆'), array('file' => '2.mp3', 'name' => '方大同-明天我要嫁给你了'), array('file' => '3.mp3', 'name' => '陶喆-蔡依林-今天你要嫁给我'))));
		$hdbg = array('view' => array('name' => '默认', 'height' => 100, 'files' => array('1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg', '6.jpg', '7.jpg', '8.jpg', '9.jpg', '10.jpg', '11.jpg', '12.jpg')));
        return array('icon' => $icons, 'background' => $background, 'music' => $music, 'focus' => $focus, 'hdbg' => $hdbg, 'url' => $url);
    }
    public function my()
    {
        $db = M('Files');
        $where = array('token' => $this->token);
        $count = $db->where($where)->count();
        $Page = new Page($count, 5);
        $show = $Page->show();
        $list = $db->where($where)->limit(($Page->firstRow . ',') . $Page->listRows)->order('id DESC')->select();
        $this->assign('list', $list);
        $this->assign('page', $show);
        $this->assign('type', 'my');
        $this->display('index');
    }
	public function delete(){
		$id=intval($_GET['id']);
		$thisFile=M('Files')->where(array('id'=>$id))->find();
		M('Files')->where(array('id'=>$id,'token'=>$this->token))->delete();
		$url2=str_replace('http://','',$thisFile['url']);
		$url3s=explode('/',$url2);
		$url4=str_replace($url3s[0],'',$url2);
		@unlink($_SERVER['DOCUMENT_ROOT'].$url4);
		$this->success('删除成功');
	}
}
?>