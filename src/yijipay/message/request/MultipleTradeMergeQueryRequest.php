<?php
/**
 * User: azhi
 * Date: 2016/10/02 10:20:15
 */
namespace Ligenhui\Package\yijipay\message\request;

use Ligenhui\Package\yijipay\message\IRequest;

class MultipleTradeMergeQueryRequest extends IRequest{
    
    /**
     * 多笔的交易流水号，以“，”隔开	字符串	否	最大100笔	000s01u01g6nkxnzlw00,...
     * @var string
     */
    protected $tradeNos;
    /**
     * 多笔业务订单号，以“，”隔开	字符串	否	最大100笔  0011472203888919,0011...
     * @var string
     */
    protected $merchantOrderNos;

    
    function __construct(){
        //服务名
        $this->setService("multipleTradeMergeQuery");

    }
    

    /**
     * @return string
     */
    public function getTradeNos()
    {
        return $this->tradeNos;
    }

    /**
     * @param string $tradeNos
     */
    public function setTradeNos($tradeNos)
    {
        $this->tradeNos = $tradeNos;
    }
    
    /**
     * @return string
     */
    public function getMerchantOrderNos()
    {
        return $this->merchantOrderNos;
    }

    /**
     * @param string $merchantOrderNos
     */
    public function setMerchantOrderNos($merchantOrderNos)
    {
        $this->merchantOrderNos = $merchantOrderNos;
    }
    
}