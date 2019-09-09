<?php
namespace Ligenhui\Package\yijipay;

if (version_compare("5.5", PHP_VERSION, ">")) die("PHP 5.5 or greater is required!!!");

use Ligenhui\Package\yijipay\message\IRequest;
use Exception;

class YijipayClient {

	//网关
	private $gatewayUrl = "https://api.yiji.com/gateway.html";
	private $partnerId;
	private $md5Key;

	private $fileCharset = "UTF-8";
	private $postCharset = "UTF-8";

	public $debug = false;

	/**
	 * YijipayClient 构造函数
	 * @param $config array
	 */
	function __construct($config) {
		//检查参数是否设置
		if(!is_array($config)) die("请检查参数是否array.");
		if(!array_key_exists("partnerId", $config) || SignHelper::checkEmpty($config["partnerId"])) die("请检查config是否配置参数[partnerId]");
		if(!array_key_exists("md5Key", $config) || SignHelper::checkEmpty($config["md5Key"])) die("请检查config是否配置参数[md5Key]");

		$this->partnerId 	= $config["partnerId"];
		$this->md5Key 		= $config["md5Key"];
		$this->gatewayUrl 	= $config["gatewayUrl"];
	}


	/**
	 * @param $request \yijipay\message\IRequest
	 * @return bool|mixed
	 * @throws Exception
	 */
	public function execute($request) {
		// 如果两者编码不一致，会出现签名验签或者乱码
		if (strcasecmp($this->fileCharset, $this->postCharset)) {
			$this->writeLog("本地文件字符集编码与表单提交编码不一致，请务必设置成一样，属性名分别为postCharset!");
			throw new Exception("文件编码：[" . $this->fileCharset . "] 与表单提交编码：[" . $this->postCharset . "]两者不一致!");
		}

		//检查request中partnerId是否设置
		if(empty($request->getPartnerId())) $request->setPartnerId($this->partnerId);

		//计算签名
		$preSignStr = SignHelper::getPreSignStr($request->getVars());
		$sign = SignHelper::sign($preSignStr, $this->md5Key, $request->getSignType());
		$signStr = $preSignStr . "&sign=" . $sign;
		//echo "<br/>".$preSignStr."<br/>";

		$this->writeLog("原始请求(未加密)：". $preSignStr);
		$this->writeLog("原始请求sign：". $sign);

		//系统参数放入QueryString请求串
		$requestUrl = $this->gatewayUrl . "?" . $signStr;
		//发起HTTP请求
		try {
			$resp = $this->curl($requestUrl);
		} catch (Exception $e) {
			$this->logCommunicationError($request, $requestUrl, "HTTP_ERROR_" . $e->getCode(), $e->getMessage());
			throw $e;
		}
		// 将返回结果转换本地文件编码
		if($this->postCharset != $this->fileCharset){
			$resp = iconv($this->postCharset, $this->fileCharset . "//IGNORE", $resp);
		}
		$this->writeLog("原始响应：" . $resp);

		return $resp;
	}


	/**
	 * @param IRequest $request 跳转类接口的request
	 * @param string $httpMethod 两个值可选：post、get
	 * @return string QUERY_STRING|FORM_HTML 构建好的、签名后的最终跳转URL（GET）或String形式的form（POST）
	 * @throws Exception
	 */
	public function pageExecute($request, $httpMethod = "POST") {

		//$this->fileCharset = mb_detect_encoding($this->appId,"UTF-8,GBK");

		if (strcasecmp($this->fileCharset, $this->postCharset)) {
			throw new Exception("文件编码：[" . $this->fileCharset . "] 与表单提交编码：[" . $this->postCharset . "]两者不一致!");
		}

		//检查request中partnerId是否设置
		if(empty($request->getPartnerId())) $request->setPartnerId($this->partnerId);

		//待签名字符串
		$preSignStr = SignHelper::getPreSignStr($request);
		$sign = SignHelper::sign($preSignStr, $this->md5Key, $request->getSignType());

		$this->writeLog("原始请求(未加密)：" . $preSignStr);
		$this->writeLog("原始请求sign：" . $sign);

		if ("GET" == strtoupper($httpMethod)) {
			//拼接GET请求串
			$requestUrl = $this->gatewayUrl."?".$preSignStr."&sign=".$sign;
			return $requestUrl;
		} else {
			//参数
			$params = $request->getVars();
			$params = SignHelper::paramsFilter($params);
			foreach($params as $k => $v){
				if(!is_string($v)) {
					$params[$k] = json_encode($v, JSON_UNESCAPED_UNICODE);
				}
			}
			$params["sign"] = $sign;

			//拼接表单字符串
			return $this->buildRequestForm($params);
		}
	}

	/**
	 * 建立请求，以表单HTML形式构造（默认）
	 * @param $params array 请求参数数组
	 * @return string 提交表单HTML文本
	 */
	private function buildRequestForm($params) {
		$sHtml = "<form id='yijiForm' name='yijiForm' action='".$this->gatewayUrl."' method='POST'>";
		reset($params);
		while (list ($key, $val) = each ($params)) {
				$val = str_replace("'","&apos;",$val);
				$sHtml .= "<input type='hidden' name='".$key."' value='".$val."'/>\n";
		}
		//submit按钮控件请不要含有name属性
		$sHtml .= "<input type='submit' style='display:none;'></form>\n";
		$sHtml .= $sHtml."<script>document.forms['yijiForm'].submit();</script>\n";
		return $sHtml;
	}


	/**
	 * @param $resp string|array
	 * @return bool
	 */
	public function verify($resp){
		return SignHelper::verify($resp, $this->md5Key);
	}


	protected function curl($url) {

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_FAILONERROR, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

		//POST 请求
		curl_setopt($ch, CURLOPT_POST, true);

		//设置header
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('content-type: application/x-www-form-urlencoded;charset=' . $this->postCharset));

		$response = curl_exec($ch);

		if (curl_errno($ch)) {
			throw new Exception(curl_error($ch), 0);
		} else {
			$httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			if (302 === $httpStatusCode){
				$headers302 = curl_getinfo($ch);
				$response = $headers302['redirect_url'];
				//?直接跳转
				header("location:". $response);
				exit;
			}else if (200 !== $httpStatusCode) {
				throw new Exception($response, $httpStatusCode);
			}
		}
		curl_close($ch);
		return $response;
	}


	/**
	 * 记录日志
	 * @param $text
	 */
	function writeLog($text) {
		if($this->debug){
			echo "<br/>$text";
		}
		file_put_contents ( "logs/yipay.txt", date ( "Y-m-d H:i:s" ) . "  " . $text . "<br/>\n", FILE_APPEND );
	}

	/**
	 * 记录网络请求错误日志
	 * @param $request IRequest
	 * @param $requestUrl string
	 * @param $errorCode string
	 * @param $responseTxt string
	 */
	protected function logCommunicationError($request, $requestUrl, $errorCode, $responseTxt) {
		$logData = array(
			date("Y-m-d H:i:s"),
			$request->getService().'_'.$request->getVersion(),
			$requestUrl,
			$errorCode,
			str_replace("\n", "", $responseTxt)
		);
		$text = implode("\t", $logData);
		file_put_contents ( "logs/yipay_err.log", $text . "\n", FILE_APPEND );
	}

	

}