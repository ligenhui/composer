<?php
/**
 * User: azhi
 * Date: 2016/08/02 08:12:55
 */
namespace Ligenhui\Package\yijipay\message\request;

use Ligenhui\Package\yijipay\message\IRequest;

class FastPayTradeRefundRequest extends IRequest{
    
    /**
     * 用户客户端ip	字符串(0-128)	否	用户客户端ip	192.168.22.33
     * @var string
     */
    protected $userEndIp;
    /**
     * 交易流水号	字符串(20)	是	创建即时到账订单返...    P464742078516256741A53
     * @var string
     */
    protected $tradeNo;
    /**
     * 退款金额	money类型	是	退款金额	58888
     * @var string
     */
    protected $refundAmount;
    /**
     * 退款原因	字符串	是	退款原因	未收到货物
     * @var string
     */
    protected $refundReason;
    /**
     * 分润退款信息	字符串	否   分润最多支持10笔...    201265894795225817521...
     * @var string
     */
    protected $shareProfitRefunds;

    
    function __construct(){
        //服务名
        $this->setService("fastPayTradeRefund");

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
    public function getRefundAmount()
    {
        return $this->refundAmount;
    }

    /**
     * @param string $refundAmount
     */
    public function setRefundAmount($refundAmount)
    {
        $this->refundAmount = $refundAmount;
    }
    
    /**
     * @return string
     */
    public function getRefundReason()
    {
        return $this->refundReason;
    }

    /**
     * @param string $refundReason
     */
    public function setRefundReason($refundReason)
    {
        $this->refundReason = $refundReason;
    }
    
    /**
     * @return string
     */
    public function getShareProfitRefunds()
    {
        return $this->shareProfitRefunds;
    }

    /**
     * @param string $shareProfitRefunds
     */
    public function setShareProfitRefunds($shareProfitRefunds)
    {
        $this->shareProfitRefunds = $shareProfitRefunds;
    }
    
}