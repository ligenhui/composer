<?php

/**
 * User: azhi
 * Date: 16/11/27
 * Time: 下午3:31
 */
namespace Ligenhui\Package\yijipay\message;

class IRequest {

    /*************************************
     * 公共参数必填字段
     ************************************/
    //服务名称
    protected $service;

    //请求流水号: 标识商户请求的唯一性
    protected $orderNo;

    //商户ID
    protected $partnerId;

    //交易订单号（在有交易的场景必须填写。具有交易唯一性)
    protected $merchOrderNo;

    //签名类型
    protected $signType = "MD5";

    //签名
    protected $sign;

    /*************************************
     * 公共参数非必填字段
     ************************************/
    //服务协议（非必填)
    protected $protocol = "HTTP_FORM_JSON";

    //服务版本（非必填)
    protected $version = "1.0";

    //会话参数（调用端的API调用会话参数，请求参数任何合法值，在响应时会回传给调用端)
    protected $context;

    //通知地址(使用异步服务时必填)
    protected $notifyUrl;

    //回调地址(需要回跳到商户时必填)
    protected $returnUrl;


    protected $accountName;
    protected $transAmount;
    protected $accountType;
    protected $accountNo;
    protected $certNo;
    protected $accountId;


    /**
     * @return mixed
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @param mixed $service
     */
    public function setService($service)
    {
        $this->service = $service;
    }


    /**
     * @return string
     */
    public function getOrderNo()
    {
        return $this->orderNo;
    }

    /**
     * @param string $orderNo
     */
    public function setOrderNo($orderNo)
    {
        $this->orderNo = $orderNo;
    }

    /**
     * @return string
     */
    public function getPartnerId()
    {
        return $this->partnerId;
    }

    /**
     * @param string $partnerId
     */
    public function setPartnerId($partnerId)
    {
        $this->partnerId = $partnerId;
    }

    /**
     * @return string
     */
    public function getMerchOrderNo()
    {
        return $this->merchOrderNo;
    }

    /**
     * @param string $merchOrderNo
     */
    public function setMerchOrderNo($merchOrderNo)
    {
        $this->merchOrderNo = $merchOrderNo;
    }

    /**
     * @return string
     */
    public function getSignType()
    {
        return $this->signType;
    }

    /**
     * @param string $signType
     */
    public function setSignType($signType)
    {
        $this->signType = $signType;
    }

    /**
     * @return string
     */
    public function getSign()
    {
        return $this->sign;
    }

    /**
     * @param string $sign
     */
    public function setSign($sign)
    {
        $this->sign = $sign;
    }

    /**
     * @return string
     */
    public function getProtocol()
    {
        return $this->protocol;
    }

    /**
     * @param string $protocol
     */
    public function setProtocol($protocol)
    {
        $this->protocol = $protocol;
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param string $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }

    /**
     * @return string
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * @param string $context
     */
    public function setContext($context)
    {
        $this->context = $context;
    }


    /**
     * @return mixed
     */
    public function getNotifyUrl()
    {
        return $this->notifyUrl;
    }

    /**
     * @param mixed $notifyUrl
     */
    public function setNotifyUrl($notifyUrl)
    {
        $this->notifyUrl = $notifyUrl;
    }

    /**
     * @return mixed
     */
    public function getReturnUrl()
    {
        return $this->returnUrl;
    }

    /**
     * @param mixed $returnUrl
     */
    public function setReturnUrl($returnUrl)
    {
        $this->returnUrl = $returnUrl;
    }

    /**
     * 获取request的数组格式数据
     * @return array
     */
    public function getVars(){
        return get_object_vars($this);
    }

    public function setLoan($arr)
    {
        $this->accountName = $arr['accountName'];
        $this->transAmount = $arr['transAmount'];
        $this->accountType = $arr['accountType'];
        $this->accountNo = $arr['accountNo'];
        $this->merchOrderNo = $arr['merchOrderNo'];
        $this->certNo = $arr['certNo'];
    }

    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
    }
}