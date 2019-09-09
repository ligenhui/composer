<?php
namespace Ligenhui\Package\yijipay;

if (version_compare("5.5", PHP_VERSION, ">")) die("PHP 5.5 or greater is required!!!");

class SignHelper {

	/**
	 * 获取sign
	 * @param $preStr string 待签名字符串
	 * @param $key string 易极付分配的商户key
	 * @param $signType string [MD5/RSA]默认MD5
	 * @return null|string
	 */
	public static function sign($preStr, $key, $signType="MD5"){

		if(static::checkEmpty($key)) die("请检查config签名key是否配置.");

		if("MD5" == $signType){
			//MD5签名
			$data = $preStr . $key;
			$sign = md5($data);
		} elseif("RSA" == $signType){
			$res = "-----BEGIN RSA PRIVATE KEY-----\n" .
				wordwrap($key, 64, "\n", true) .
				"\n-----END RSA PRIVATE KEY-----";

			($res) or die('您使用的私钥格式错误，请检查RSA私钥配置');

			openssl_sign($preStr, $sign, $res);

			$sign = base64_encode($sign);

		}else{
			die("不支持的加密方式，目前仅支持[MD5, RSA]。");
		}

		return $sign;
	}


	/**
	 * 验签：将易极付返回结果（json-string或数组）进行签名验证
	 * 验签成功返回true，失败则返回false
	 *
	 * @param $resp string|array 待验证json-string或数组
	 * @param $key  string 易极付分配的商户key
	 * @return bool
	 */
	public static function verify($resp, $key){

		if(static::checkEmpty($resp)) die("验签输入参数不能为空");

		if(is_string($resp)){
			$resp = static::yiji_json_decode($resp);
		}

		//服务端验签失败响应结果不存在sign参数
		if(!array_key_exists("sign",$resp)) return false;

		$sign = $resp['sign'];
		$preStr = static::getPreSignStr($resp);
		$mySign = static::sign($preStr, $key, $resp["signType"]);

		return $mySign === $sign;
	}


	/**
	 * 获取待签名的请求参数字符串：
	 * 1) 去除空置和sign
	 * 2) 完成排序，增加签名
	 * 3) 签名
	 *
	 * @param $data array|\yijipay\message\IRequest 待签名数组
	 *
	 * @return string
	 */
	public static function getPreSignStr($data){
		if(is_subclass_of($data, "yijipay\\message\\IRequest")){
			$arr = $data->getVars();
		}else{
			$arr = $data;
		}
		$myArr = static::paramsFilter($arr);
		$str = static::createLinkString($myArr);
		return $str;
	}

	/**
	 * 校验$value是否非空
	 *  if not set ,return true;
	 *    if is null , return true;
	 * @param string $value
	 * @return bool
	 */
	public static function  checkEmpty($value) {
		if (!isset($value))
			return true;
		if ($value === null)
			return true;
		if (is_string($value) && trim($value) === "")
			return true;

		return false;
	}

	/**
	 * 把数组所有元素，按照“参数=参数值”的模式用“&”字符拼接成字符串
	 * @param $params array 需要拼接的数组
	 * @return string 拼接完成以后的字符串
	 */
	public static function createLinkString($params) {
		$strParams = "";
		foreach ($params as $key => $val) {
			if(is_array($val)){
				$val = json_encode($val, JSON_UNESCAPED_UNICODE);
			}else if(is_bool($val)){
				if($val) $val="true"; else $val="false";
			}
			$strParams .= "$key=" . ($val) . "&";
		}
		$strParams = substr($strParams, 0, -1);

		//如果存在转义字符，那么去掉转义
		if(get_magic_quotes_gpc()){$strParams = stripslashes($strParams);}
		return $strParams;
	}

	/**
	 * 除去数组中的空值和签名参数
	 * @param $params array 签名参数组
	 * @return array 去掉空值与签名参数后的新签名参数组
	 */
	public static function paramsFilter($params) {
		$para_filter = array();
		while (list ($key, $val) = self::fun_adm_each ($params)) {
			if($key == "sign" || static::checkEmpty($val)) continue;
			else	$para_filter[$key] = $params[$key];
		}
		ksort($para_filter);
		reset($para_filter);
		return $para_filter;
	}

	/**
	 * 自定义json_decode字符串，主要为了兼容易极付验签
	 * @param $str
	 * @return array|bool|null
	 */
	private static function  yiji_json_decode($str){
		switch (strtolower($str)) {
			case 'true':
				return true;
			case 'false':
				return false;
			case 'null':
				return null;
			default:
				$m = array();
				if (preg_match('/^\[.*\]$/s', $str) || preg_match('/^\{.*\}$/s', $str)) {
					// array, or object notation
					if ($str{0} == '[') {
						$stk = array(self::SERVICES_JSON_IN_ARR);
						$arr = array();
					} else {
						if (self::SERVICES_JSON_LOOSE_TYPE) {
							$stk = array(self::SERVICES_JSON_IN_OBJ);
							$obj = array();
						} else {
							$stk = array(self::SERVICES_JSON_IN_OBJ);
							$obj = new stdClass();
						}
					}

					array_push($stk, array('what'  => self::SERVICES_JSON_SLICE,
						'where' => 0,
						'delim' => false));

					$chrs = substr($str, 1, -1);

					if ($chrs == '') {
						if (reset($stk) == self::SERVICES_JSON_IN_ARR) {
							return $arr;

						} else {
							return $obj;

						}
					}

					//print("\nparsing {$chrs}\n");

					$strlen_chrs = strlen($chrs);

					for ($c = 0; $c <= $strlen_chrs; ++$c) {

						$top = end($stk);
						$substr_chrs_c_2 = substr($chrs, $c, 2);

						if (($c == $strlen_chrs) || (($chrs{$c} == ',') && ($top['what'] == self::SERVICES_JSON_SLICE))) {
							// found a comma that is not inside a string, array, etc.,
							// OR we've reached the end of the character list
							$slice = substr($chrs, $top['where'], ($c - $top['where']));
							array_push($stk, array('what' => self::SERVICES_JSON_SLICE, 'where' => ($c + 1), 'delim' => false));
							//print("Found split at {$c}: ".substr($chrs, $top['where'], (1 + $c - $top['where']))."\n");

							if (reset($stk) == self::SERVICES_JSON_IN_ARR) {
								// we are in an array, so just push an element onto the stack
								array_push($arr, decode($slice));

							} elseif (reset($stk) == self::SERVICES_JSON_IN_OBJ) {
								// we are in an object, so figure
								// out the property name and set an
								// element in an associative array,
								// for now
								$parts = array();

								if (preg_match('/^\s*(["\'].*[^\\\]["\'])\s*:\s*(\S.*),?$/Uis', $slice, $parts)) {
									// "name":value pair
									$key = preg_replace('/^"(.*)"$/', '\1', $parts[1]);
									$val = preg_replace('/^"(.*)"$/', '\1', $parts[2]);
									$obj[$key] = $val;
								}
							}
						} elseif ((($chrs{$c} == '"') || ($chrs{$c} == "'")) && ($top['what'] != self::SERVICES_JSON_IN_STR)) {
							// found a quote, and we are not inside a string
							array_push($stk, array('what' => self::SERVICES_JSON_IN_STR, 'where' => $c, 'delim' => $chrs{$c}));
							//print("Found start of string at {$c}\n");

						} elseif (($chrs{$c} == $top['delim']) &&
							($top['what'] == self::SERVICES_JSON_IN_STR) &&
							((strlen(substr($chrs, 0, $c)) - strlen(rtrim(substr($chrs, 0, $c), '\\'))) % 2 != 1)) {
							// found a quote, we're in a string, and it's not escaped
							// we know that it's not escaped becase there is _not_ an
							// odd number of backslashes at the end of the string so far
							array_pop($stk);
							//print("Found end of string at {$c}: ".substr($chrs, $top['where'], (1 + 1 + $c - $top['where']))."\n");

						} elseif (($chrs{$c} == '[') &&
							in_array($top['what'], array(self::SERVICES_JSON_SLICE, self::SERVICES_JSON_IN_ARR, self::SERVICES_JSON_IN_OBJ))) {
							// found a left-bracket, and we are in an array, object, or slice
							array_push($stk, array('what' => self::SERVICES_JSON_IN_ARR, 'where' => $c, 'delim' => false));
							//print("Found start of array at {$c}\n");

						} elseif (($chrs{$c} == ']') && ($top['what'] == self::SERVICES_JSON_IN_ARR)) {
							// found a right-bracket, and we're in an array
							array_pop($stk);
							//print("Found end of array at {$c}: ".substr($chrs, $top['where'], (1 + $c - $top['where']))."\n");

						} elseif (($chrs{$c} == '{') &&
							in_array($top['what'], array(self::SERVICES_JSON_SLICE, self::SERVICES_JSON_IN_ARR, self::SERVICES_JSON_IN_OBJ))) {
							// found a left-brace, and we are in an array, object, or slice
							array_push($stk, array('what' => self::SERVICES_JSON_IN_OBJ, 'where' => $c, 'delim' => false));
							//print("Found start of object at {$c}\n");

						} elseif (($chrs{$c} == '}') && ($top['what'] == self::SERVICES_JSON_IN_OBJ)) {
							// found a right-brace, and we're in an object
							array_pop($stk);
							//print("Found end of object at {$c}: ".substr($chrs, $top['where'], (1 + $c - $top['where']))."\n");

						} elseif (($substr_chrs_c_2 == '/*') &&
							in_array($top['what'], array(self::SERVICES_JSON_SLICE, self::SERVICES_JSON_IN_ARR, self::SERVICES_JSON_IN_OBJ))) {
							// found a comment start, and we are in an array, object, or slice
							array_push($stk, array('what' => self::SERVICES_JSON_IN_CMT, 'where' => $c, 'delim' => false));
							$c++;
							//print("Found start of comment at {$c}\n");

						} elseif (($substr_chrs_c_2 == '*/') && ($top['what'] == self::SERVICES_JSON_IN_CMT)) {
							// found a comment end, and we're in one now
							array_pop($stk);
							$c++;

							for ($i = $top['where']; $i <= $c; ++$i)
								$chrs = substr_replace($chrs, ' ', $i, 1);

							//print("Found end of comment at {$c}: ".substr($chrs, $top['where'], (1 + $c - $top['where']))."\n");

						}

					}
					if (reset($stk) == self::SERVICES_JSON_IN_ARR) {
						return $arr;
					} elseif (reset($stk) == self::SERVICES_JSON_IN_OBJ) {
						return $obj;
					}
				}
		}
	}

    //代替each方法
	public static function fun_adm_each(&$array)
    {
        $res = array();
        $key = key($array);
        if ($key !== null) {
            next($array);
            $res[1] = $res['value'] = $array[$key];
            $res[0] = $res['key'] = $key;
        } else {
            $res = false;
        }
        return $res;
    }



	const SERVICES_JSON_SLICE = 1;
	const SERVICES_JSON_IN_STR = 2;
	const SERVICES_JSON_IN_ARR = 3;
	const SERVICES_JSON_IN_OBJ = 4;
	const SERVICES_JSON_IN_CMT = 5;
	const SERVICES_JSON_LOOSE_TYPE = 16;

}