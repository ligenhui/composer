<?php
/**
 * User: azhi
 * Date: 2016/10/02 10:20:15
 */
namespace Ligenhui\Package\yijipay\message\request;

use Ligenhui\Package\yijipay\message\IRequest;

class CommandPayTradeCreatePayRequest extends IRequest{
    
    /**
     * 买家外部会员id	字符串(1-64)	否	买家外部会员id	651654153
     * @var string
     */
    protected $outUserId;
    /**
     * 买家(易极付)用户id	字符串(20)	否	买家(易极付)用户id	20165489625847153698
     * @var string
     */
    protected $buyerUserId;
    /**
     * 买家真实姓名	字符串(1-64)	否	买家真实姓名	张三
     * @var string
     */
    protected $buyerRealName;
    /**
     * 用户终端ip	字符串(0-128)	否	用户终端ip	192.168.49.57
     * @var string
     */
    protected $userEndIp;
    /**
     * 交易信息	数组对象类型	是	交易信息    [{"merchOrderNo":"234...
     * @var array CommandPayOrder
     */
    protected $commandPayOrders;
    /**
     * 支付类型	字符串	是	支付类型    BALANCE
     * @var string
     */
    protected $paymentType;
    /**
     * 公众号用户标示	字符串	是	微信公众号与用户生...    12346216312
     * @var string
     */
    protected $openid;
    /**
     * 终端类型	字符串	否	默认为MOBILE	MOBILE
     * @var string
     */
    protected $userTerminalType;
    /**
     * 银行简称	字符串	是   PC专属参数，微信...    ABC
     * @var string
     */
    protected $bankCode;
    /**
     * 对公对私	字符串	否	对公对私	PERSONAL
     * @var string
     */
    protected $personalCorporateType;
    /**
     * 银行卡类型	字符串	否	银行卡类型   DEBIT
     * @var string
     */
    protected $cardType;
    /**
     * 交易号	字符串	是   本种模式为先创建交...    324342523sfdaf,142323...
     * @var string
     */
    protected $tradeNo;
    /**
     * 买家机构名	字符串	否	买家机构名	猪八戒科技有限公司
     * @var string
     */
    protected $buyerOrgName;

    
    function __construct(){
        //服务名
        $this->setService("commandPayTradeCreatePay");
        $this->setVersion("2.0");
    }
    

    /**
     * @return string
     */
    public function getOutUserId()
    {
        return $this->outUserId;
    }

    /**
     * @param string $outUserId
     */
    public function setOutUserId($outUserId)
    {
        $this->outUserId = $outUserId;
    }
    
    /**
     * @return string
     */
    public function getBuyerUserId()
    {
        return $this->buyerUserId;
    }

    /**
     * @param string $buyerUserId
     */
    public function setBuyerUserId($buyerUserId)
    {
        $this->buyerUserId = $buyerUserId;
    }
    
    /**
     * @return string
     */
    public function getBuyerRealName()
    {
        return $this->buyerRealName;
    }

    /**
     * @param string $buyerRealName
     */
    public function setBuyerRealName($buyerRealName)
    {
        $this->buyerRealName = $buyerRealName;
    }
    
    /**
     * @return string
     */
    public function getUserEndIp()
    {
        return $this->userEndIp;
    }

    /**
     * @param string $userEndIp
     */
    public function setUserEndIp($userEndIp)
    {
        $this->userEndIp = $userEndIp;
    }
    
    /**
     * @return array
     */
    public function getCommandPayOrders()
    {
        return $this->commandPayOrders;
    }

    /**
     * @param array $commandPayOrders
     */
    public function setCommandPayOrders($commandPayOrders)
    {
        $this->commandPayOrders = $commandPayOrders;
    }
    
    /**
     * @return string
     */
    public function getPaymentType()
    {
        return $this->paymentType;
    }

    /**
     * @param string $paymentType
     */
    public function setPaymentType($paymentType)
    {
        $this->paymentType = $paymentType;
    }
    
    /**
     * @return string
     */
    public function getOpenid()
    {
        return $this->openid;
    }

    /**
     * @param string $openid
     */
    public function setOpenid($openid)
    {
        $this->openid = $openid;
    }
    
    /**
     * @return string
     */
    public function getUserTerminalType()
    {
        return $this->userTerminalType;
    }

    /**
     * @param string $userTerminalType
     */
    public function setUserTerminalType($userTerminalType)
    {
        $this->userTerminalType = $userTerminalType;
    }
    
    /**
     * @return string
     */
    public function getBankCode()
    {
        return $this->bankCode;
    }

    /**
     * @param string $bankCode
     */
    public function setBankCode($bankCode)
    {
        $this->bankCode = $bankCode;
    }
    
    /**
     * @return string
     */
    public function getPersonalCorporateType()
    {
        return $this->personalCorporateType;
    }

    /**
     * @param string $personalCorporateType
     */
    public function setPersonalCorporateType($personalCorporateType)
    {
        $this->personalCorporateType = $personalCorporateType;
    }
    
    /**
     * @return string
     */
    public function getCardType()
    {
        return $this->cardType;
    }

    /**
     * @param string $cardType
     */
    public function setCardType($cardType)
    {
        $this->cardType = $cardType;
    }
    
    /**
     * @return string
     */
    public function getTradeNo()
    {
        return $this->tradeNo;
    }

    /**
     * @param string $tradeNo
     */
    public function setTradeNo($tradeNo)
    {
        $this->tradeNo = $tradeNo;
    }
    
    /**
     * @return string
     */
    public function getBuyerOrgName()
    {
        return $this->buyerOrgName;
    }

    /**
     * @param string $buyerOrgName
     */
    public function setBuyerOrgName($buyerOrgName)
    {
        $this->buyerOrgName = $buyerOrgName;
    }
    
}