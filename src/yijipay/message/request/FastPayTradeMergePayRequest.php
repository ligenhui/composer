<?php

/**
 * fastPayMergeCreateTrade
 * User: azhi
 * Date: 16/11/27
 * Time: 下午3:31
 */
namespace Ligenhui\Package\yijipay\message\request;

use Ligenhui\Package\yijipay\message\IRequest;

class FastPayTradeMergePayRequest extends IRequest{

    /**
     * 外部会员号
     * 示例： "u651654153"
     */
    protected $outUserId;

    /**
     * 买家会员号
     * 示例："20165489625847153698"
     */
    protected $buyerUserId;

    /**
     * 买家真实姓名
     * 示例："张三"
     */
    protected $buyerRealName;

    /**
     * 买家机构名
     * 示例："猪八戒科技有限公司"
     */
    protected $buyerOrgName;

    /**
     * 交易信息
     */
    protected $tradeInfo;

    /**
     * 支付类型 字符串 必填
     * 示例："QUICKPAY"
     * 说明：
     * BALANCE:余额支付（仅供PC使用）
     * QUICKPAY:快捷支付（仅供PC使用）
     * ONLINEBANK:网银支付（仅供PC使用）
     * THIRDSCANPAY:扫码支付(仅支持单笔，仅供PC使用)
     * OFFLINEPAY:线下支付（仅供PC使用）
     * PAYMENT_TYPE_SUPER:聚合支付（仅供MOBILE使用）
     * PAYMENT_TYPE_YJ:易手富支付（仅供MOBILE使用）
     * PAYMENT_TYPE_WECHAT:微信支付（仅供MOBILE使用）
     * PAYMENT_TYPE_UPMP:银联支付（仅供MOBILE使用）
     *
     * @var string
     *
     */
    protected $paymentType;
    /**
     * 微信公众号用户openid 字符串 条件必填
     * paymentType = PAYMENT_TYPE_WECHAT时，此参数必填
     *
     * 示例："o6_bmjrPTlm6_2sgVt7hMZOPfL2M"
     *
     * @var string
     *
     */
    protected $openid;
    /**
     * 终端类型 字符串	否
     * 默认为 MOBILE
     * 说明：
     * PC:电脑平台
     * MOBILE:移动平台
     *
     * @var string
     *
     */
    protected $userTerminalType;
    /**
     * 场景识别行为 字符串(0-256)
     * 仅限于特殊业务场景使用，比如付款到中间账户，具体传值请联系易极付
     * @var string
     */
    protected $behavior;


    function __construct(){
        //服务名
        $this->setService("fastPayTradeMergePay");
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


    /**
     * @return list
     */
    public function getTradeInfo()
    {
        return $this->tradeInfo;
    }

    /**
     * @param array $tradeInfo
     */
    public function setTradeInfo($tradeInfo)
    {
        $this->tradeInfo = $tradeInfo;
    }

    /**
     * @return mixed
     */
    public function getPaymentType()
    {
        return $this->paymentType;
    }

    /**
     * @param mixed $paymentType
     */
    public function setPaymentType($paymentType)
    {
        $this->paymentType = $paymentType;
    }

    /**
     * @return mixed
     */
    public function getOpenid()
    {
        return $this->openid;
    }

    /**
     * @param mixed $openid
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
    public function getBehavior()
    {
        return $this->behavior;
    }

    /**
     * @param string $behavior
     */
    public function setBehavior($behavior)
    {
        $this->behavior = $behavior;
    }


    
}
