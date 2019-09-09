<?php

/**
 * fastPayMergeCreateTrade
 * User: azhi
 * Date: 16/11/27
 * Time: 下午3:31
 */
namespace Ligenhui\Package\yijipay\message\request;

use Ligenhui\Package\yijipay\message\IRequest;

class CommandPayConfirmRequest extends IRequest{

    /**
     * 用户终端ip	字符串(0-128)	否	用户终端ip	192.168.49.56
     * @var string
     */
    protected $userEndIp;
    /**
     * 交易号	字符串	是	交易号	000700d01g0xeq59d800
     * @var string
     */
    protected $tradeNo;
    /**
     * 分润信息	字符串	否   分润最多支持10笔,单笔分润格式:userId1~amount1~memo1^userId2~amount2~memo2
     * @var string
     */
    protected $shareProfits;
    /**
     * 打款金额	money类型	否	单次打款金额
     * 使用条件：分批次打款时使用
     * @var string
     */
    protected $confirmPayAmount;


    function __construct(){
        //服务名
        $this->setService("commandPayConfirm");
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
    public function getShareProfits()
    {
        return $this->shareProfits;
    }

    /**
     * @param string $shareProfits
     */
    public function setShareProfits($shareProfits)
    {
        $this->shareProfits = $shareProfits;
    }

    /**
     * @return string
     */
    public function getConfirmPayAmount()
    {
        return $this->confirmPayAmount;
    }

    /**
     * @param string $confirmPayAmount
     */
    public function setConfirmPayAmount($confirmPayAmount)
    {
        $this->confirmPayAmount = $confirmPayAmount;
    }

}
