<?php
namespace Ligenhui\Package\yijipay;

use Ligenhui\Package\yijipay\message\IRequest;

if (version_compare("5.5", PHP_VERSION, ">")) die("PHP 5.5 or greater is required!!!");

class Helper
{
    private $yiConfig = array(
        'partnerId' => '20170821020000793831', //商户ID
        'md5Key' => '6d4108e062023f8a38bd37a58738cf3d', //商户Key
        'gatewayUrl' => "http://merchantapi.yijifu.net/gateway.html",	//接口地址
        'notifyUrl' => "http://a.com/api/notify/yinotify"	//回调地址
    );

    protected $error;

    //代付
    public function yiPay($data)
    {
        $privSn = self::OutTradeNo();
        $pubSn = self::OutTradeNo();
        $arr = ['accountName' => $data['name'],'transAmount' => $data['amount'],'accountNo' => $data['bank_card'],'merchOrderNo' => $privSn,'purpose' => '代付！'];
        if($data['state'] == 1){
            //对私
            $arr['accountType'] = 'PRIVATE';
            $arr['certNo'] = $data['id_number'];
        }else{
            //对公
            $arr['accountType'] = 'PUBLIC';
            $arr['bankCode'] = $data['bank_account_v'];
        }
        $cli = new YijipayClient($this->yiConfig);
        $irequest = new IRequest();
        //设置服务代码
        $irequest->setService('loan');
        //设置回调地址
        $irequest->setNotifyUrl($this->yiConfig['notifyUrl']);
        //设置订单号
        $irequest->setOrderNo($pubSn);
        $irequest->setLoan($arr);
        //发送请求
        try {
            $resp = $cli->execute($irequest);
        } catch (\Exception $e) {
            $this->error = $e->getMessage();
            return false;
        }
        //验证服务器sign
        if(!$cli->verify($resp)){
            $this->error = '验签失败!';
            return false;
        }
        //验证转款是否成功
        $result = json_decode($resp);
        if($result->resultCode !== 'EXECUTE_SUCCESS'){
            $this->error = $result->resultMessage;
            return false;
        }
        return ['privSn' => $privSn,'pubSn' => $pubSn];
    }

    //代付查询
    public function yiPayQuery($privSn)
    {
        $cli = new YijipayClient($this->yiConfig);
        $irequest = new IRequest();
        //设置服务代码
        $irequest->setService('loanQuery');
        //设置订单号
        $irequest->setOrderNo(self::OutTradeNo());
        $irequest->setMerchOrderNo($privSn);
        //发送请求
        try {
            $resp = $cli->execute($irequest);
        } catch (\Exception $e) {
            $this->error = $e->getMessage();
            return false;
        }
        //验证服务器sign
        if(!$cli->verify($resp)){
            $this->error = '验签失败!';
            return false;
        }
        //验证转款是否成功
        $result = json_decode($resp);
        if(isset($result->serviceStatus) && $result->serviceStatus === 'REMITTANCE_SUCCESS'){
            return true;
        }
        $this->error = $result->resultMessage;
        return false;
    }

    //代付余额查询
    public function yiPayBalance($accountId = null)
    {
        $cli = new YijipayClient($this->yiConfig);
        $irequest = new IRequest();
        //设置服务代码
        $irequest->setService('yxtBalanceQuery');
        //设置订单号
        $irequest->setOrderNo(self::OutTradeNo());
        if($accountId !== null){
            $irequest->setAccountId($accountId);
        }else{
            $irequest->setAccountId($this->yiConfig['partnerId']);
        }
        //发送请求
        try {
            $resp = $cli->execute($irequest);
        } catch (\Exception $e) {
            $this->error = $e->getMessage();
            return false;
        }
        //验证服务器sign
        if(!$cli->verify($resp)){
            $this->error = '验签失败!';
            return false;
        }
        //验证转款是否成功
        $result = json_decode($resp);
        if(isset($result->success) && $result->success === true){
            return self::object_array($result);
        }
        $this->error = $result->resultMessage;
        return false;
    }

    public static function OutTradeNo()
    {
        $str = 'ABCDEFGHIJKLMNOPQRS'.time();
        $OutTradeNo = 'NXO'.str_shuffle($str);
        return $OutTradeNo;
    }

    public static function object_array($array) {
        if(is_object($array)) {
            $array = (array)$array;
        } if(is_array($array)) {
            foreach($array as $key=>$value) {
                $array[$key] = self::object_array($value);
            }
        }
        return $array;
    }

    public function getError()
    {
        return $this->error;
    }

    //银行
    public function getBankAccount($key)
    {
        $list = json_decode('{"ABC":"农业银行","BKSH":"上海银行","BOBJ":"北京银行","BOC":"中国银行","BOCD":"成都银行","BOGZ":"贵州银行","BTCB":"包商银行","CBHB":"渤海银行","CCB":"建设银行","CEB":"光大银行","CGB":"广发银行","CIB":"兴业银行","CITIC":"中信银行","CMB":"招商银行","CMBC":"民生银行","COMM":"交通银行","CQCB":"重庆银行","CQRCB":"重庆农商行","CQTGB":"重庆三峡银行","CSRCB":"常熟农商行","EBCL":"恒丰银行","FJNX":"福建农信","GYCB":"贵阳银行","GZCB":"广州银行","GZRCB":"广州农商行","HBCB":"哈尔滨银行","HSB":"徽商银行","HUBNX":"湖北农信社","HXB":"华夏银行","HZCB":"杭州银行","ICBC":"工商银行","JSRCU":"江苏农信社","KMNL":"昆明农联","MYCB":"绵阳商行","NJCB":"南京银行","PINGANBK":"平安银行","PSBC":"邮政储蓄银行","QZCB":"泉州银行","SDNX":"山东农信","SJZHRCB":"汇融农村合作银行","SPDB":"浦发银行","SXNX":"山西农信社","SZBK":"苏州银行","TZBK":"台州银行","WHCB":"汉口银行","YBYZB":"渝北银座村镇银行","ZHESHANGB":"浙商银行","ZJRCB":"浙江农信","ZZBK":"郑州银行"}',true);
        return $list[$key];
    }

    public function getConfig()
    {
        return $this->yiConfig;
    }
}