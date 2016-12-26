<?php
namespace app\components;

use Yii;
class CTools
{



	//获取随机字符串
	public static function generateHash( $length = 8 ) {
		// 密码字符集，可任意添加你需要的字符
		$chars = "ABCDEFGHIJKLMNPQRSTUVWXYZ23456789";
		$password = "";
		for ( $i = 0; $i < $length; $i++ )
		{
			// 这里提供两种字符获取方式
			// 第一种是使用 substr 截取$chars中的任意一位字符；
			// 第二种是取字符数组 $chars 的任意元素
			// $password .= substr($chars, mt_rand(0, strlen($chars) – 1), 1);
			$password .= $chars[ mt_rand(0, strlen($chars) - 1) ];
		}
		return strtolower($password);
	}

	/**
	 * 获取毫秒时间戳
	 * @return float
	 */
	public static function getMillisecond() {
		list($t1, $t2) = explode(' ', microtime());
		return (float)sprintf('%.0f',(floatval($t1)+floatval($t2))*1000);
	}
	/**
	 * 获返回当前系统消耗内存
	 * @return float
	 */
	public static function currentMemory(){
		$size =memory_get_usage();
		$unit=array('b','kb','mb','gb','tb','pb');
		return @round($size/pow(1024,($i=floor(log($size,1024)))),2).' '.$unit[$i];
	}

	/**
	 * 批量SQL过滤
	 *
	 * @param $val
	 * @return string
	 */
	public static function sqlFilter($val){
		return addslashes($val);
	}



	/**
	 * 写日志，方便测试（看网站需求，也可以改成把记录存入数据库）
	 * 注意：服务器需要开通fopen配置
	 * @param $word 要写入日志里的文本内容 默认值：空值
	 */
	public  static function logResult($word='',$filename ="") {
		if(empty($filename)){
			return false;
		}
		$path = Yii::$app->basePath."/logs/";
		$fp = fopen($path.$filename,"a");
		flock($fp, LOCK_EX) ;
		fwrite($fp,$word."\r\n");
		flock($fp, LOCK_UN);
		fclose($fp);
	}

	/**
	 * UUID生成
	 *
	 * @param int $pid 项目ID
	 * @param int $mid 模块ID
	 * @return string  返回长度为30字符串
	 */
	public static function generalUuid($pid = 0, $mid = 0)
	{

		$pre = "{$pid}_{$mid}_";

		return $pre . self::generateHash(30 - strlen($pre));
	}
	/**
	 * 截取domain
	 *
	 * @param string $url
	 * @return bool
	 */
	public  static function getDomain($url='') {
		$pos = strpos($url,'://');
		if($pos > 0){
			$res = explode('/',$url);
			return $res[2];
		}else{
			return false;
		}
	}

	public static function str_get_html($content)
	{
		\Yii::$classMap['HtmlFactory'] = \Yii::$app->vendorPath.'/org/simple_html_dom/HtmlFactory.php';

		$obj = new \HtmlFactory();
		return $obj->str_get_html($content);
	}

	public static function recursiveMultiArray(array $array) {
		$res = array();
		foreach (new  \RecursiveIteratorIterator(new \RecursiveArrayIterator($array)) as $key => $value) {
			$res[] = $value;
		}
		return implode("<br/>",$res);
	}



}