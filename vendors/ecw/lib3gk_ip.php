<?php
/**
 * Ktai library, supports Japanese mobile phone sites coding.
 * It provides many functions such as a carrier check to use Referer or E-mail, 
 * conversion of an Emoji, and more.
 *
 * PHP versions 4 and 5
 *
 * Ktai Library for CakePHP1.2
 * Copyright 2009-2010, ECWorks.
 
 * Licensed under The GNU General Public Licence
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright		Copyright 2009-2010, ECWorks.
 * @link			http://www.ecworks.jp/ ECWorks.
 * @version			0.3.2
 * @lastmodified	$Date: 2010-05-17 14:00:00 +0900 (Mon, 17 May 2010) $
 * @license			http://www.gnu.org/licenses/gpl.html The GNU General Public Licence
 */

/**
 * defines
 */
require_once(dirname(__FILE__).'/lib3gk_def.php');


/**
 * IP table sub class
 */
class Lib3gkIp {
	
	//================================================================
	//Properties
	//================================================================
	//------------------------------------------------
	//Parameters
	//------------------------------------------------
	/**
	 * IPテーブル
	 *
	 * @var array
	 * @access public
	 */
	var $addr_table = array(
		
		//docomo
		//
		'1' => array(
			'210.153.84.0/24', 
			'210.136.161.0/24', 
			'210.153.86.0/24', 
			'124.146.174.0/24', 
			'124.146.175.0/24', 
			'202.229.176.0/24', 	//2010.05
			'202.229.177.0/24', 	//2010.05
			'202.229.178.0/24', 	//2010.05
		), 
		
		//EZWEB
		//
		'2' => array(
			'210.230.128.224/28', 
			'121.111.227.160/27', 
			'61.117.1.0/28', 
			'219.108.158.0/27', 
			'219.125.146.0/28', 
			'61.117.2.32/29', 
			'61.117.2.40/29', 
			'219.108.158.40/29', 
			'219.125.148.0/25', 
			'222.5.63.0/25', 
			'222.5.63.128/25', 
			'222.5.62.128/25', 
			'59.135.38.128/25', 
			'219.108.157.0/25', 
			'219.125.145.0/25', 
			'121.111.231.0/25', 
			'121.111.227.0/25', 
			'118.152.214.192/26', 
			'118.159.131.0/25', 
			'118.159.133.0/25', 
			'118.159.132.160/27', 
			'118.159.133.192/26', 	//2010.02
			'', 
			'', 
		), 
		
		//SoftBank
		//
		'3' => array(
			'123.108.236.0/24', 
			'123.108.237.0/27', 
			'202.179.204.0/24', 
			'202.253.96.224/27', 
			'210.146.7.192/26', 
			'210.146.60.192/26', 
			'210.151.9.128/26', 
			'210.175.1.128/25', 
			'211.8.159.128/25', 
		), 
		
		//emobile
		//
		'4' => array(
			'117.55.1.224/27', 
		), 
		
		//iPhone(via SoftBank network)
		//
		'5' => array(
			'126.240.0.0/12', 
		), 
		
		//PHS
		//
		'6' => array(
			'61.198.128.0/24', 
			'61.198.129.0/24', 
			'61.198.130.0/24', 
			'61.198.131.0/24', 
			'61.198.132.0/24', 
			'61.198.133.0/24', 
			'61.198.134.0/24', 
			'61.198.135.0/24', 
			'61.198.136.0/24', 
			'61.198.137.0/24', 
			'61.198.138.100/32', 
			'61.198.138.101/32', 
			'61.198.138.102/32', 
			'61.198.138.103/32', 
			'61.198.139.0/29', 
			'61.198.139.128/27', 
			'61.198.139.160/28', 
			'61.198.140.0/24', 
			'61.198.141.0/24', 
			'61.198.142.0/24', 
			'61.198.143.0/24', 
			'61.198.160.0/24', 
			'61.198.161.0/24', 
			'61.198.162.0/24', 
			'61.198.163.0/24', 
			'61.198.164.0/24', 
			'61.198.165.0/24', 
			'61.198.166.0/24', 
			'61.198.168.0/24', 
			'61.198.169.0/24', 
			'61.198.170.0/24', 
			'61.198.171.0/24', 
			'61.198.172.0/24', 
			'61.198.173.0/24', 
			'61.198.174.0/24', 
			'61.198.175.0/24', 
			'61.198.248.0/24', 
			'61.198.249.0/24', 
			'61.198.250.0/24', 
			'61.198.251.0/24', 
			'61.198.252.0/24', 
			'61.198.253.0/24', 
			'61.198.254.0/24', 
			'61.198.255.0/24', 
			'61.204.0.0/24', 
			'61.204.2.0/24', 
			'61.204.3.0/25', 
			'61.204.3.128/25', 
			'61.204.4.0/24', 
			'61.204.5.0/24', 
			'61.204.6.0/25', 
			'61.204.6.128/25', 
			'61.204.7.0/25', 
			'61.204.92.0/24', 
			'61.204.93.0/24', 
			'61.204.94.0/24', 
			'61.204.95.0/24', 
			'114.20.49.0/24', 
			'114.20.50.0/24', 
			'114.20.51.0/24', 
			'114.20.52.0/24', 
			'114.20.53.0/24', 
			'114.20.54.0/24', 
			'114.20.55.0/24', 
			'114.20.56.0/24', 
			'114.20.57.0/24', 
			'114.20.58.0/24', 
			'114.20.59.0/24', 
			'114.20.60.0/24', 
			'114.20.61.0/24', 
			'114.20.62.0/24', 
			'114.20.63.0/24', 
			'114.20.64.0/24', 
			'114.20.65.0/24', 
			'114.20.66.0/24', 
			'114.20.67.0/24', 
			'114.21.255.0/27', 
			'125.28.0.0/24', 
			'125.28.1.0/24', 
			'125.28.15.0/24', 
			'125.28.16.0/24', 
			'125.28.17.0/24', 
			'125.28.2.0/24', 
			'125.28.3.0/24', 
			'125.28.4.0/24', 
			'125.28.5.0/24', 
			'125.28.8.0/24', 
			'210.168.246.0/24', 
			'210.168.247.0/24', 
			'210.169.92.0/24', 
			'210.169.93.0/24', 
			'210.169.94.0/24', 
			'210.169.95.0/24', 
			'210.169.96.0/24', 
			'210.169.97.0/24', 
			'210.169.98.0/24', 
			'210.169.99.0/24', 
			'211.126.192.128/25', 
			'211.18.232.0/24', 
			'211.18.233.0/24', 
			'211.18.234.0/24', 
			'211.18.235.0/24', 
			'211.18.236.0/24', 
			'211.18.237.0/24', 
			'219.108.10.0/24', 
			'219.108.11.0/24', 
			'219.108.12.0/24', 
			'219.108.13.0/24', 
			'219.108.14.0/24', 
			'219.108.15.0/24', 
			'219.108.7.0/24', 
			'219.108.8.0/24', 
			'219.108.9.0/24', 
			'221.119.0.0/24', 
			'221.119.1.0/24', 
			'221.119.2.0/24', 
			'221.119.3.0/24', 
			'221.119.4.0/24', 
			'221.119.6.0/24', 
			'221.119.7.0/24', 
			'221.119.8.0/24', 
			'221.119.9.0/24', 
		), 
		
		//Clawlers
		//
		'7' => array(
			'72.14.199.0/25', 	//Google 2010/01/04
			'209.85.238.0/25', 
			
			'124.83.159.146', 	//Yahoo 2010/01/04
			'124.83.159.147', 
			'124.83.159.148', 
			'124.83.159.149', 
			'124.83.159.150', 
			'124.83.159.151', 
			'124.83.159.152', 
			'124.83.159.153', 
			'124.83.159.154', 
			'124.83.159.155', 
			'124.83.159.156', 
			'124.83.159.157', 
			'124.83.159.158', 
			'124.83.159.159', 
			'124.83.159.160', 
			'124.83.159.161', 
			'124.83.159.162', 
			'124.83.159.163', 
			'124.83.159.164', 
			'124.83.159.165', 
			'124.83.159.166', 
			'124.83.159.167', 
			'124.83.159.168', 
			'124.83.159.169', 
			'124.83.159.170', 
			'124.83.159.171', 
			'124.83.159.172', 
			'124.83.159.173', 
			'124.83.159.174', 
			'124.83.159.175', 
			'124.83.159.176', 
			'124.83.159.177', 
			'124.83.159.178', 
			'124.83.159.179', 
			'124.83.159.180', 
			'124.83.159.181', 
			'124.83.159.182', 
			'124.83.159.183', 
			'124.83.159.184', 
			'124.83.159.185', 
			'124.83.159.224', 
			'124.83.159.225', 
			'124.83.159.226', 
			'124.83.159.227', 
			'124.83.159.228', 
			'124.83.159.229', 
			'124.83.159.230', 
			'124.83.159.231', 
			'124.83.159.232', 
			'124.83.159.233', 
			'124.83.159.234', 
			'124.83.159.235', 
			'124.83.159.236', 
			'124.83.159.237', 
			'124.83.159.238', 
			'124.83.159.239', 
			'124.83.159.240', 
			'124.83.159.241', 
			'124.83.159.242', 
			'124.83.159.243', 
			'124.83.159.244', 
			'124.83.159.245', 
			'124.83.159.246', 
			'124.83.159.247', 
			
			'203.104.254.0/24', //livedoor 2010/01/04
			
			'210.150.10.32/27', //goo 2010/01/04
			'203.131.250.0/24', 
			'203.131.251.0/24', 
			'203.131.252.0/24', 
			'203.131.253.0/24', 
			'203.131.254.0/24', 
			'203.131.255.0/24', 
			
			'60.43.36.253', 	//froute 2010/01/04
			
			'202.238.103.126', 	//DeNA 2010/01/03
			'202.213.221.97', 
		
		), 
		
	);
	
	
	//================================================================
	//Methods
	//================================================================
	//------------------------------------------------
	//Basics
	//------------------------------------------------
	/**
	 * インスタンスの取得
	 *
	 * @return object 自分自身のインスタンス
	 * @access public
	 * @static
	 */
	function &get_instance(){
		static $instance = array();
		if(!$instance){
			$instance[0] =& new Lib3gkIp();
			$instance[0]->initialize();
		}
		return $instance[0];
	}
	
	
	/**
	 * 初期化
	 *
	 * @return (なし)
	 * @access public
	 */
	function initialize(){
	}
	
	
	/**
	 * 後始末
	 *
	 * @return (なし)
	 * @access public
	 */
	function shutdown(){
	}
	
	
	//------------------------------------------------
	//Lib3gkIp methods
	//------------------------------------------------
	/**
	 * IPアドレスを数値に変換
	 *
	 * @param $ip string IPアドレス(xxx.xxx.xxx.xxx[/xx])
	 * @return integer IPアドレスを32ビット数値にしたもの
	 * @access public
	 */
	function ip2long($ip){
		
		$value = ip2long($ip);
		if(version_compare(phpversion(), '5.0.0', '<') < 0){
			$value = false;
		}
		
		return $value;
	}
	
	
	/**
	 * IPアドレスが範囲内にあるかのチェック
	 *
	 * @param $ip string IPアドレス(xxx.xxx.xxx.xxx)
	 * @param $ip string 対象IP領域(xxx.xxx.xxx.xxx[/xx])
	 * @return boolean 範囲内の場合はtrue
	 * @access public
	 */
	function is_inclusive($ip, $check_addr){
		
		$check_ip_mask = 32;
		
		$no = Lib3gkIp::ip2long($ip);
		if($no === false){
			return false;
		}
		$arr = explode('/', $check_addr);
		if(isset($arr[0])){
			$check_no = Lib3gkIp::ip2long($arr[0]);
			if($check_no === false){
				return false;
			}
		}
		if(isset($arr[1])){
			if($arr[1] != ''){
				if(is_numeric($arr[1])){
					$check_ip_mask = $arr[1];
				}else{
					return false;
				}
			}
		}
		
		$check_ip_mask = 0xffffffff ^ (pow(2, 32 - $check_ip_mask) - 1);
		$no       = $no       & $check_ip_mask;
		$check_no = $check_no & $check_ip_mask;
		
		return $no == $check_no;
	}
	
	
	/**
	 * IPアドレスからキャリアコードを入手
	 *
	 * @param $ip string IPアドレス(xxx.xxx.xxx.xxx)
	 * @return integer キャリアコード
	 * @access public
	 */
	function ip2carrier($ip = null){
		
		$carrier = 0;
		
		if($ip === null){
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		
		foreach($this->addr_table as $c => $caddrs){
			foreach($caddrs as $check_addr){
				if(Lib3gkIp::is_inclusive($ip, $check_addr)){
					$carrier = $c;
					break 2;
				}
			}
		}
		
		return $carrier;
	}
	
	
}
